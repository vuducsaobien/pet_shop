<?php

namespace App\Models;

use App\Models\AdminModel;
use App\Models\ProductModel;
use App\Models\CustomerModel;
use App\Models\AttributeModel;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB; 

class CartModel extends AdminModel
{
    protected $table               = 'cart';
    protected $folderUpload        = 'cart' ;
    protected $fieldSearchAccepted = ['id', 'name', 'description', 'link'];
    protected $crudNotAccepted     = ['_token','name', 'thumb', 'id', 'attribute', 'total_price', 'product_code', 'slug'];

    public function customer()
    {
        return $this->belongsTo(CustomerModel::class);
    }
    public function payment()
    {
        return $this->belongsTo(PaymentModel::class);
    }

    public function products()
    {
        return $this->belongsToMany(ProductModel::class,'order_product','order_code','product_id','order_code')->withPivot(['quantity','price']);
    }
    public function listItems($params = null, $options = null) {
     
        $result = null;

        if($options['task'] == "admin-list-items") {
            $query = $this->select('id', 'status','note','quantity','amount','order_code',
                'customer_id','payment_id','created', 'created_by', 'modified', 'modified_by')
              ->with(['customer','payment','products']);
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
                            ->paginate($params['pagination']['totalItemsPerOrder']);

        }

        if($options['task'] == 'news-list-items') {
            $query = $this->select('id', 'name', 'description', 'link', 'thumb')
                        ->where('status', '=', 'active' )
                        ->limit(5);

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
        
        if($options['task'] == 'get-item') {
            $result = self::with('products')->select('id','note','quantity','amount','order_code','customer_id','payment_id', 'status')->where('id', $params['id'])->first();
        }

        if($options['task'] == 'get-thumb') {
            $result = self::select('id', 'thumb')->where('id', $params['id'])->first();
        }

        if($options['task'] == 'news-list-items-get-product-info-in-cart') {
            $productModel = new ProductModel();
            $result       = $productModel->listItems($params, ['task' => 'news-list-items-get-product-info-in-cart']);
        }

        if($options['task'] == 'news-list-items-get-product-attribute-in-cart') {
            $productModel = new ProductModel();
            $result       = $productModel->listItems($params, ['task' => 'news-list-items-get-product-attribute-in-cart']);
        }

        if($options['task'] == 'news-list-items-get-product-attribute-value-in-cart') {
            $productModel = new ProductModel();
            // echo '<pre style="color:red";>$params === '; print_r($params);echo '</pre>';
            // echo '<h3>Die is Called </h3>';die;
            $result       = $productModel->listItems($params, ['task' => 'news-list-items-get-product-attribute-value-in-cart']);
        }

        return $result;
    }

    public function saveItem($params = null, $options = null) { 
        if($options['task'] == 'change-status') {
            $status = ($params['currentStatus'] == "active") ? "inactive" : "active";
            self::where('id', $params['id'])->update(['status' => $status ]);
            return  [
                'id' => $params['id'],
                'status' => ['name' => config("zvn.template.status.$status.name"), 'class' => config("zvn.template.status.$status.class")],
                'link' => route($params['controllerName'] . '/status', ['status' => $status, 'id' => $params['id']]),
                'message' => config('zvn.notify.success.update')
            ];
        }

        if($options['task'] == 'add-item') {
            $params['created_by'] = session('userInfo')['username'];
            $params['created']    = date('Y-m-d');
            self::insert($this->prepareParams($params));
        }

        if($options['task'] == 'edit-item') {

            /* if(!empty($params['thumb'])){
                $this->deleteThumb($params['thumb_current']);
                $params['thumb'] = $this->uploadThumb($params['thumb']);
            }*/
            $params['modified_by'] = session('userInfo')['username'];
            $params['modified']    = date('Y-m-d');
            self::where('id', $params['id'])->update($this->prepareParams($params));
        }

        if($options['task'] == 'news-add-item-customer-model') {

            $params['order_code'] = Str::random(7);
            $params['ip']         = $_SERVER['REMOTE_ADDR'];
            $params['status']     = 'inactive';
            $params['created']    = date('Y-m-d H:i:s');
            $params['ip']         = $_SERVER['REMOTE_ADDR'];

            $customerModel = new CustomerModel();
            $prepare       = $customerModel->prepareParams($params);
            $customerModel::insert($prepare);

            return $order_code = $params['order_code'];
        }

        if($options['task'] == 'news-add-item-cart-model') {

            $cart = $params['cart'];
            foreach ($cart as $value) {
                $attributeModel = new AttributeModel();
                $attribute_id   = $attributeModel->getItem($value['attribute'], ['task' => 'get-attribute-id-from-attribute-name']);
                $value['product_id']      = $value['id'];
                $value['order_code']      = $params['order_code'];
                $value['price']           = $value['total_price'];
                $value['attribute_id']    = json_encode($attribute_id, JSON_UNESCAPED_UNICODE);
                $value['attribute_value'] = json_encode($value['attribute_value'], JSON_UNESCAPED_UNICODE);

                $prepare = $this->prepareParams($value);

                // echo '<pre style="color:red";>$prepare === '; print_r($prepare);echo '</pre>';
                // echo '<h3>Die is Called </h3>';die;
                self::insert($prepare);
            }

        }


    }

    public function deleteItem($params = null, $options = null) 
    { 
        if($options['task'] == 'delete-item') {
            /* $item   = self::getItem($params, ['task'=>'get-thumb']); //
            $this->deleteThumb($item['thumb']);*/
            self::where('id', $params['id'])->delete();
        }
    }

}

