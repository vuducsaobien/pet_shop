<?php

namespace App\Http\Controllers\News;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\CategoryModel;


class CategoryController extends Controller
{
    private $pathViewController = 'news.pages.category.';  // slider
    private $controllerName     = 'category';
    private $params             = [];
    private $model;

    public function __construct()
    {
        view()->share('controllerName', $this->controllerName);
    }

    public function index(Request $request)
    {   
        // $params["category_id"]  = $request->category_id;
        // $categoryModel  = new CategoryModel();
        

        // $itemCategory = $categoryModel->getItem($params, ['task' => 'news-get-item']);
        // if(empty($itemCategory))  return redirect()->route('home');
        
        // $itemsLatest   = $categoryModel->listItems(null, ['task'  => 'news-list-items-latest']);
        
        // $params["category_id"]  = $itemCategory['category_id'];
        // $itemCategory['related_categorys'] = $categoryModel->listItems($params, ['task' => 'news-list-items-related-in-category']);

        // $categoryModel = new CategoryModel();
        // $breadcrumbs = $categoryModel->listItems($params, ['task' => 'news-breadcrumbs']);
       
        return view($this->pathViewController .  'index', [
            // 'params'        => $this->params,
            // 'itemsLatest'   => $itemsLatest,
            // 'itemCategory'  => $itemCategory,
            // 'breadcrumbs'  => $breadcrumbs,
        ]);
    }

 
}