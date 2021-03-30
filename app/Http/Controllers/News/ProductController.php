<?php

namespace App\Http\Controllers\News;

use Illuminate\Http\Request;
use App\Helpers\Functions;
use App\Models\ProductModel as MainModel;

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
        $params["product_slug"] = $request->product_slug;
        $params["product_id"]   = $request->product_id;

        $items = $this->model->getItem($params, ['task' => 'news-get-item-product-detail']);
        if(empty($items))  return redirect()->route('home');

        $items['list_images'] = $this->model->getItem($params, ['task' => 'get-list-thumb-product-detail']);
        $items['attribute']   = $this->model->getItem(null, ['task' => 'get-list-thumb-product-id-modal']);
        foreach ($items['attribute'] as $key => $value) $params['attribute_id'][] = $value['id'];
        $items['list_attribute'] = $this->model->getItem($params, ['task' => 'get-list-thumb-product-id-modal-array']);

        // Merge Attribute
        $merge_attribute = Functions::fixArray_01($items['list_attribute'], 'value');
        $allAttribute    = Functions::merge_Multidi_Array_02($items['attribute'], $merge_attribute);
        foreach ($allAttribute as $key => $value) {
            if (!array_key_exists("detail", $value) ) {
                unset($allAttribute[$key]);
            }
        }
        $items['all_attribute'] = Functions::implode_01($allAttribute, 'detail', ', ');
        $items['comment']       = $this->model->getComment($params, ['task' => 'in-product-detail']);
        $items['related']       = $this->model->listItems($params, ['task' => 'news-list-items-related-in-product']);

        return view($this->pathViewController . 'index', compact('items'));
    }

    public function get_image_modal(Request $request)
    {
        $params["product_id"]  = $request->product_id;
        $result  = $this->model->getItem($params, ['task' => 'news-get-items-modal']);

        return response()->json($result);

    }
 
}