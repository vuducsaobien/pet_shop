<?php

namespace App\Models;

use App\Helpers\Template;
use App\Models\AdminModel;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use DB; 
class ProductModel extends AdminModel
{
    public function __construct() {
        $this->table               = 'product';
        $this->folderUpload        = 'product' ; 
        $this->fieldSearchAccepted = ['id', 'name', 'description', 'link']; 
        $this->crudNotAccepted     = ['changeInfo','changeCategory','changePrice','changeAttribute','changeSpecial','changeDropzone','dropzone','_token','thumb_current','id','attribute','nameImage','alt','res'];
    }


    public function attribute()
    {
        return $this->hasMany(ProductAttributeModel::class,'product_id');
    }
    public function image()
    {
        return $this->hasMany(ImageModel::class,'product_id');
    }
    public function listItems($params = null, $options = null) {
     
        $result = null;

        if($options['task'] == "admin-list-items") {
            $query = $this->select('id', 'name','price','category_id','thumb','status')->with('image');

            if ($params['filter']['status'] !== "all")  {
                $query->where('status', '=', $params['filter']['status'] );
            }

            if ($params['search']['value'] !== "")  {
                if($params['search']['field'] == "all") {
                    $query->where(function($query) use ($params){
                        foreach($this->fieldSearchAccepted as $column){
                            $query->orWhere($column, 'LIKE',  "%{$params['search']['value']}%" );
                        }
                    });
                } else if(in_array($params['search']['field'], $this->fieldSearchAccepted)) { 
                    $query->where($params['search']['field'], 'LIKE',  "%{$params['search']['value']}%" );
                } 
            }

            $result =  $query->orderBy('id', 'desc')
                            ->paginate($params['pagination']['totalItemsPerPage']);

        }

        if($options['task'] == 'news-list-items') {
            $query = $this->select('id', 'name', 'description', 'link', 'thumb')
                        ->where('status', '=', 'active' )
                        ->limit(5);

            $result = $query->get()->toArray();
        }



        return $result;
    }

    public function countItems($params = null, $options  = null) {
     
        $result = null;

        if($options['task'] == 'admin-count-items-group-by-status') {
         
            $query = $this::groupBy('status')
                        ->select( DB::raw('status , COUNT(id) as count') );

            if ($params['search']['value'] !== "")  {
                if($params['search']['field'] == "all") {
                    $query->where(function($query) use ($params){
                        foreach($this->fieldSearchAccepted as $column){
                            $query->orWhere($column, 'LIKE',  "%{$params['search']['value']}%" );
                        }
                    });
                } else if(in_array($params['search']['field'], $this->fieldSearchAccepted)) { 
                    $query->where($params['search']['field'], 'LIKE',  "%{$params['search']['value']}%" );
                } 
            }

            $result = $query->get()->toArray();
           

        }

        return $result;
    }

    public function getItem($params = null, $options = null) { 
        $result = null;
        
        if($options['task'] == 'get-item') {
            $result = self::where('id', $params['id'])
                ->with('attribute')
                ->first();
        }

        if($options['task'] == 'get-thumb') {
            $result = self::select('id', 'thumb')->where('id', $params['id'])->first();
        }

        return $result;
    }

    public function saveItem($params = null, $options = null) { 

        if($options['task'] == 'add-item') {

            self::insert($this->prepareParams($params));

        }
        /*================================= EDIT =============================*/
        if($options['task']=='change-info-product'){
            $params['special']=isset($params['special'])?1:0;
            self::where('id', $params['id'])->update($this->prepareParams($params));
        }
        /*================================= change dropzone =============================*/
        if($options['task'] == 'edit-item') {

            self::where('id', $params['id'])->update($this->prepareParams($params));

            /*================================= dropzone =============================*/
            ImageModel::where('product_id',$params['id'])->delete();
            $product=$this->find($params['id']);
            $product->image()->createMany($params['dropzone']);
            
        }
        /*================================= attribute =============================*/
        if($options['task'] == 'change-attribute-product') {
            if(isset($params['attribute'])){
                $productAttr=new ProductAttributeModel();
                $productAttr->saveItem(['attr'=>$params['attribute'],'id'=>$params['id']],['task'=>'edit-item']);
            }
        }
        /*================================= status index =============================*/
        if ($options['task'] == 'change-status') {
            $status = $params['currentStatus'] == 'active' ? 'inactive' : 'active';
            $this->where('id', $params['id'])->update(['status' => $status]);

            $result = [
                'id' => $params['id'],
                'status' => ['name' => config("zvn.template.status.$status.name"), 'class' => config("zvn.template.status.$status.class")],
                'link' => route($params['controllerName'] . '/status', ['status' => $status, 'id' => $params['id']]),
                'message' => config('zvn.notify.success.update')
            ];

            return $result;
        }
        /*================================= change category =============================*/
        if ($options['task'] == 'change-category') {
//            $params['modified_by']  = session('userInfo')['username'];
//            $params['modified']     = date('Y-m-d H:i:s');
            $this->where('id', $params['id'])->update($this->prepareParams($params));

            $result = [
                'id' => $params['id'],
//                'modified' => Template::showItemHistory($params['modified_by'], $params['modified']),
                'message' => config('zvn.notify.success.update')
            ];

            return $result;
        }


    }

    public function deleteItem($params = null, $options = null) 
    { 
        if($options['task'] == 'delete-item') {

            
            
            /*================================= xoa image va xoa row =============================*/
            $image=$this->where('id',$params['id'])->first()->image->toArray();
            foreach ($image as $item) {
                $this->deleteThumb($item['name']);
            }
            ImageModel::where('product_id',$params['id'])->delete();


//            $item   = self::getItem($params, ['task'=>'get-thumb']); //
//            $this->deleteThumb($item['thumb']);
            self::where('id', $params['id'])->delete();
        }
    }

}

