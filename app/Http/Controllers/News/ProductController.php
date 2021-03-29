<?php

namespace App\Http\Controllers\News;

use Illuminate\Http\Request;
use App\Models\ProductModel as MainModel;

class ProductController extends FrontendController
{
    public function __construct()
    {
        $this->pathViewController = 'news.pages.category.';
        $this->controllerName = 'category';
        $this->model = new MainModel();
        parent::__construct();
    }

    public function index(Request $request)
    {   
        // $params["product_id"]  = $request->product_id;
        // $productModel  = new ProductModel();
        

        // $itemProduct = $productModel->getItem($params, ['task' => 'news-get-item']);
        // if(empty($itemProduct))  return redirect()->route('home');
        
        // $itemsLatest   = $productModel->listItems(null, ['task'  => 'news-list-items-latest']);
        
        // $params["product_id"]  = $itemProduct['product_id'];
        // $itemProduct['related_products'] = $productModel->listItems($params, ['task' => 'news-list-items-related-in-product']);

        // $productModel = new ProductModel();
        // $breadcrumbs = $productModel->listItems($params, ['task' => 'news-breadcrumbs']);
       
        return view($this->pathViewController .  'index', [
            // 'params'        => $this->params,
            // 'itemsLatest'   => $itemsLatest,
            // 'itemProduct'  => $itemProduct,
            // 'breadcrumbs'  => $breadcrumbs,
        ]);
    }

    public function detail(Request $request)
    {
         $params["id"]  = $request->product_id;
         $productModel  = new MainModel();

         //product o chi tiet san pham
         $item = $productModel->getItem($params, ['task' => 'news-get-item']);
         $params['category_id']=$item->category_id;

        //product related
        $itemsRelatedProduct = $productModel->listItems($params, ['task' => 'news-list-items-related-in-product']);
       
        return view($this->pathViewController .  'detail', compact(
            'item',
            'itemsRelatedProduct'



            )
        );
    }

    public function get_image_modal(Request $request)
    {
        $params["product_id"]  = $request->product_id;
        $result  = $this->model->getItem($params, ['task' => 'news-get-items-modal']);

        return response()->json($result);

    }
 
}