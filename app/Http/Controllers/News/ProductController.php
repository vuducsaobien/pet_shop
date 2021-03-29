<?php

namespace App\Http\Controllers\News;

use Illuminate\Http\Request;
use App\Models\ProductModel as MainModel;
use App\Models\AttributeModel;
use App\Models\ProductAttributeModel;
use App\Models\ProductImageModel;

class ProductController extends FrontendController
{
    public function __construct()
    {
        $this->pathViewController = 'news.pages.product.';
        $this->controllerName     = 'product';
        $this->model              = new MainModel();
        parent::__construct();
    }

    public function index(Request $request)
    {   
        $params["product_id"]  = $request->product_id;
        // $productModel  = new ProductModel();
        // echo '<pre style="color:red";>$params === '; print_r($params);echo '</pre>';
        // echo '<h3>Die is Called Product Controller</h3>';die;
        $items= $this->model->getItem($params, ['task' => 'news-get-item-product-detail']);
        if(empty($items))  return redirect()->route('home');

        //Get List Image
        $productImage = new ProductImageModel();
        $items['list_images'] = $productImage->getItem($params, ['task' => 'get-list-thumb-product-detail']);

        // Get Attribute
        $attribute = new AttributeModel();
        $items['attribute'] = $attribute->getItem(null, ['task' => 'get-list-thumb-product-id-modal']);

        // Get Attribute Value
        foreach ($items['attribute'] as $key => $value) {
            $params['attribute_id'][] = $value['id'];
        }
        $productAttribute = new ProductAttributeModel();
        $items['list_attribute'] = $productAttribute->getItem($params, ['task' => 'get-list-thumb-product-id-modal-array']);

        // echo '<pre style="color:red";>$items === '; print_r($items);echo '</pre>';
        // echo '<h3>Die is Called Product Controler</h3>';die;

        // $itemsLatest   = $productModel->listItems(null, ['task'  => 'news-list-items-latest']);
        // $params["product_id"]  = $itemProduct['product_id'];
        // $itemProduct['related_products'] = $productModel->listItems($params, ['task' => 'news-list-items-related-in-product']);

        // $productModel = new ProductModel();
        // $breadcrumbs = $productModel->listItems($params, ['task' => 'news-breadcrumbs']);
       
        return view($this->pathViewController . 'index', compact(
            // 'item', 'itemsRelatedProduct'
            'items'
        ));
    }

    public function get_image_modal(Request $request)
    {
        $params["product_id"]  = $request->product_id;
        $result  = $this->model->getItem($params, ['task' => 'news-get-items-modal']);

        return response()->json($result);

    }
 
}