<?php

namespace App\Http\Controllers\News;

use Illuminate\Http\Request;
use App\Helpers\Functions;
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

        $params["product_slug"]  = $request->product_slug;
        $items = $this->model->getItem($params, ['task' => 'news-get-item-product-detail']);
        $params['product_id']=$items['id'];
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
        $productAttribute        = new ProductAttributeModel();
        $items['list_attribute'] = $productAttribute->getItem($params, ['task' => 'get-list-thumb-product-id-modal-array']);

        // Merge Attribute
        $merge_attribute = Functions::fixArray_01($items['list_attribute'], 'value');
        $allAttribute    = Functions::merge_Multidi_Array_02($items['attribute'], $merge_attribute);
        foreach ($allAttribute as $key => $value) {
            if (!array_key_exists("detail", $value) ) {
                unset($allAttribute[$key]);
            }
        }
        $items['all_attribute'] = Functions::implode_01($allAttribute, 'detail', ', ');
        
        // Get Comment
        $items['comment']  = $this->model->getComment($params, ['task' => 'in-product-detail']);

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