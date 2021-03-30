<?php

namespace App\Http\Controllers\News;
use App\Http\Controllers\Controller;
use App\Models\CategoryModel;
use Illuminate\Http\Request;

use App\Models\CategoryModel as MainModel;
use App\Models\ProductModel;


class CategoryController extends FrontendController
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
        $category_id = $request->category_id;

        // All Food
        if( $category_id == null) {
            $productModel = new ProductModel();
            $items = $productModel->getItem($this->params, ['task' => 'news-get-item-all-food']);
            $type = 'all-food';

        // Food in Category
        } else {
            $this->params["category_id"]  = $request->category_id;

            $productModel = new ProductModel();
            $items = $productModel->getItem($this->params, ['task' => 'news-get-item-category-id']);
            $type = 'all-food-in-category-id';
        }

        // echo '<pre style="color:red";>$items === '; print_r($items);echo '</pre>';
        // echo '<h3>Die is Called Category Controller</h3>';die;

        // $categoryModel = new CategoryModel();
        // $breadcrumbs = $categoryModel->listItems($params, ['task' => 'news-breadcrumbs']);

        return view($this->pathViewController . 'index', compact(
            'items', 'type'
        ));

    }

    public function list(Request $request)
    {
        $params['slug']=$request->category_slug;
        $category=new CategoryModel();
        $itemCategory=$category->getItem($params,['task'=>'get-item-by-slug']);
        $data=$itemCategory->product->toArray(); //cac san pham co slug nhu tren
        dd($data);
        return 'slug cua category la '.$request->category_slug;

    }
 
}