<?php
namespace App\Models;
use App\Helpers\Template;
use App\Models\AdminModel;
use App\Models\ProductImageModel;
use App\Models\AttributeModel;
use App\Models\ProductAttributeModel;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use DB; 
class ProductModel extends AdminModel
{
    protected $table               = 'product';
    protected $folderUpload        = 'product' ;
    protected $fieldSearchAccepted = ['id', 'name', 'description', 'link'];
    protected $crudNotAccepted     = ['changeInfo','changeCategory','changePrice','changeAttribute','changeSpecial','changeDropzone','dropzone','_token','thumb_current','id','attribute','nameImage','alt','res'];

    public function attribute()
    {
        return $this->hasMany(ProductAttributeModel::class,'product_id');
    }

    public function image()
    {
        return $this->hasMany(ProductImageModel::class,'product_id');
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
        //lay san pham gan nhat o trang chu
        if($options['task'] == 'news-list-items') {
            $query = $this->select('id', 'name', 'price', 'sale', 'thumb')
                        ->where('status', '=', 'active' )
                        ->limit(8);

            $result = $query->get();
        }
        //lay san pham lien quan o trang chi tiet san pham
        if($options['task'] == 'news-list-items-related-in-product') {

            $query = $this->select('id', 'name', 'price', 'thumb', 'sale')
                ->where('status', '=', 'active')
                ->where('id', '!=', $params['id'])
                ->where('category_id', '=', $params['category_id'])
                ->take(4)
            ;
            $result = $query->get();
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
       //form add-edit product
        if($options['task'] == 'get-item') {
            $result = self::where('id', $params['id'])
                ->with('attribute')
                ->first();
        }

        //get info for product detail
        if($options['task'] == 'news-get-item') {
            $result = self::where('id', $params['id'])
                ->with('attribute','image')
                ->first();
        }

        if($options['task'] == 'get-thumb') {
            $result = self::select('id', 'thumb')->where('id', $params['id'])->first();
        }

        //get all food for menu All Food
        if($options['task'] == 'news-get-item-all-food') {
            $result = self::select('id', 'product_code', 'name', 'thumb', 'price', 'price_sale', 'sale', 'slug', 'short_description')
            ->where('status','active')
            ->orderBy('ordering', 'desc')
            ->paginate($params['pagination']['totalItemsPerPage']);
            // ->paginate($params['pagination']['totalItemsPerPage'])->toArray();

        }

        if($options['task'] == 'news-get-items-modal') {
            $result = self::select('id', 'name', 'price', 'price_sale', 'sale', 'slug', 'short_description')
                ->where('id', $params['product_id'])
                ->where('status', 'active')
                // ->get()->toArray();
                ->first();
            
            $productImage = new ProductImageModel();
            $result['list_images'] = $productImage->getItem($params, ['task' => 'get-list-thumb-product-id-modal']);
             
            $attribute = new AttributeModel();
            $result['attribute'] = $attribute->getItem(null, ['task' => 'get-list-thumb-product-id-modal']);
            // $listAttribute = $attribute->getItem(null, ['task' => 'get-list-thumb-product-id-modal']);

            foreach ($result['attribute'] as $key => $value) {
                $params['attribute_id'][] = $value['id'];
                // $params['attribute_id'] = $key;
            }

            // $params['attribute_id'] = [$listAttribute];

            $productAttribute = new ProductAttributeModel();
            $result['list_attribute'] = $productAttribute->getItem($params, ['task' => 'get-list-thumb-product-id-modal']);

        }

        return $result;


    }

    public function saveItem($params = null, $options = null) { 

        if($options['task'] == 'add-item') {

            $params['thumb']='/images/product/'.array_column($params['dropzone'],'name')[0];

            self::insert($this->prepareParams($params));
            /*================================= dropzone =============================*/
            $product=$this->find($lastId=DB::getPdo()->lastInsertId());
            $product->image()->createMany($params['dropzone']);

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
            ProductImageModel::where('product_id',$params['id'])->delete();
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
            ProductImageModel::where('product_id',$params['id'])->delete();


//            $item   = self::getItem($params, ['task'=>'get-thumb']); //
//            $this->deleteThumb($item['thumb']);
            self::where('id', $params['id'])->delete();
        }
    }

}

