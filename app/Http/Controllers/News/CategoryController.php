<?php

namespace App\Http\Controllers\News;
use App\Http\Controllers\Controller;
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
        $itemsProduct = null;
        $itemCategory = null;

        $category_id = $request->category_id;

        if( $category_id == null) {
            $productModel = new ProductModel();
            $items = $productModel->getItem($this->params, ['task' => 'news-get-item-all-food']);
        } else {
            $params["category_id"]  = $request->category_id;
            $items = $this->getItem($params, ['task' => 'news-get-item']);
        }

        // echo '<pre style="color:red";>$itemsProduct === '; print_r($itemsProduct);echo '</pre>';
        // echo '<h3>Die is Called Category Controller</h3>';die;

        // $itemsLatest   = $categoryModel->listItems(null, ['task'  => 'news-list-items-latest']);
        // $params["category_id"]  = $itemCategory['category_id'];
        // $itemCategory['related_categorys'] = $categoryModel->listItems($params, ['task' => 'news-list-items-related-in-category']);
        // $categoryModel = new CategoryModel();
        // $breadcrumbs = $categoryModel->listItems($params, ['task' => 'news-breadcrumbs']);

        return view($this->pathViewController . 'index', compact(
            'items'
        ));

    }

 
}