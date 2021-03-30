<?php

namespace App\Http\Controllers\News;
use Illuminate\Http\Request;
use App\Models\CategoryModel as MainModel;

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
        $params['slug']   = $request->category_slug;
                $all_slug = $this->model->getItem(null, ['task' => 'news-get-item-all-slug']);
        if (!in_array($params['slug'], $all_slug)) {
            return redirect()->route('home');
        }

        // All Food
        if( $params['slug'] == 'all-food') {
            $type  = 'all-food';
            $items = $this->model->getItem($this->params, ['task' => 'news-get-item-all-food']);
            // $items = $this->model->getItem($this->params, ['task' => 'news-get-item-all-food'])->toArray();
        // Food in Category
        } else {
            $type          = 'all-food-in-category-id';
            $this->params['category_id'] = $this->model->getItem($params, ['task' => 'get-category-id-form-slug']);
            $items = $this->model->getItem($this->params, ['task' => 'news-get-item-category-id']);
            // $items = $this->model->getItem($this->params, ['task' => 'news-get-item-category-id'])->toArray();
        }
        // echo '<pre style="color:red";>$items === '; print_r($items);echo '</pre>';
        // echo '<h3>Die is Called </h3>';die;

        // $breadcrumbs = $categoryModel->listItems($params, ['task' => 'news-breadcrumbs']);
        return view($this->pathViewController . 'index', compact('items', 'type'));
    }
 
}