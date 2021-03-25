<?php

namespace App\Http\Controllers\News;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\ProductModel;


class ProductController extends Controller
{
    private $pathViewController = 'news.pages.product.';  // slider
    private $controllerName     = 'product';
    private $params             = [];
    private $model;

    public function __construct()
    {
        view()->share('controllerName', $this->controllerName);
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
         $productModel  = new ProductModel();

         //product o chi tiet san pham
         $item = $productModel->getItem($params, ['task' => 'news-get-item']);
         $params['category_id']=$item->category_id;

        //product related
        $itemsRelatedProduct = $productModel->listItems($params, ['task' => 'news-list-items-related-in-product']);

        // if(empty($itemProduct))  return redirect()->route('home');
        
        // $itemsLatest   = $productModel->listItems(null, ['task'  => 'news-list-items-latest']);
        
        // $params["product_id"]  = $itemProduct['product_id'];
        // $itemProduct['related_products'] = $productModel->listItems($params, ['task' => 'news-list-items-related-in-product']);

        // $productModel = new ProductModel();
        // $breadcrumbs = $productModel->listItems($params, ['task' => 'news-breadcrumbs']);
       
        return view($this->pathViewController .  'detail', compact(
            'item',
            'itemsRelatedProduct'



            )
        );
    }


 
}