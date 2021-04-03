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
        $display = 'grid';
        $search  = $request->search;

        if ( $search == null ) {

            $params['slug']   = $request->category_slug;
                    $all_slug = $this->model->getItem(null, ['task' => 'news-get-item-all-slug']);
            if (!in_array($params['slug'], $all_slug)) {
                return redirect()->route('home');
            }

            // All Food
            if( $params['slug'] == 'all-food') {
                $items = $this->model->getItem($this->params, ['task' => 'news-get-item-all-food']);
            // Food in Category
            } else {
                $this->params['category_id'] = $this->model->getItem($params, ['task' => 'get-category-id-form-slug']);

                $items   = $this->model->getItem($this->params, ['task' => 'news-get-item-category-id']);
                $display = $this->model->getItem($this->params['category_id'], ['task' => 'news-get-item-category-display']);
            }

            // $breadcrumbs = $categoryModel->listItems($params, ['task' => 'news-breadcrumbs']);
            return view($this->pathViewController . 'index', compact('items', 'search', 'display'));
            
        }else{
            $this->params['search']  = $search;
            $items     = $this->model->getItem($this->params, ['task' => 'news-get-item-search-all-food']);
            return view($this->pathViewController . 'index', compact('items', 'search', 'display'));
        }
    }
 
}