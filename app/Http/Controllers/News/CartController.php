<?php

namespace App\Http\Controllers\News;
use Illuminate\Http\Request;
use App\Models\OrderModel as MainModel;

class CartController extends FrontendController
{

    public function __construct()
    {
        $this->pathViewController = 'news.pages.cart.';
        $this->controllerName = 'cart';
        $this->model = new MainModel();
        parent::__construct();
    }

    public function index(Request $request)
    {   
        $items = '';
        // $breadcrumbs = $categoryModel->listItems($params, ['task' => 'news-breadcrumbs']);
        return view($this->pathViewController . 'index', compact('items'));
    }
 
}