<?php

namespace App\Http\Controllers\News;

use App\Http\Controllers\Controller;
use App\Models\MenuModel;
use Illuminate\Http\Request;

use App\Models\SliderModel;
use App\Models\CategoryModel;

class HomeController extends Controller
{
    private $pathViewController = 'news.pages.home.';  // slider
    private $controllerName = 'home';
    private $params = [];
    private $model;

    public function __construct()
    {
        view()->share('controllerName', $this->controllerName);
    }

    public function index(Request $request)
    {
        /*================================= lay menu =============================*/
        $menuModel = new MenuModel();
        $itemsMenu = $menuModel->listItems(null, ['task' => 'news-list-items']);

        /*================================= lay category ==========================*/
        $categoryModel = new CategoryModel();
        $itemsCategory = $categoryModel->listItems(null, ['task' => 'news-list-items']);

        /*================================= lay slider ==========================*/
        $sliderModel = new SliderModel();
        $itemsSlider = $sliderModel->listItems(null, ['task' => 'news-list-items']);


        // $itemsSlider   = $sliderModel->listItems(null, ['task'   => 'news-list-items']);
        // $itemsCategory = $categoryModel->listItems(null, ['task' => 'news-list-items-is-home']);
        // $itemsFeatured = $articleModel->listItems(null, ['task'  => 'news-list-items-featured']);
        // $itemsLatest   = $articleModel->listItems(null, ['task'  => 'news-list-items-latest']);

        // foreach ($itemsCategory as $key => $category)
        //     $itemsCategory[$key]['articles'] = $articleModel->listItems(['category_id' => $category['id']], ['task' => 'news-list-items-in-category']);

        return view($this->pathViewController . 'index',
            compact(
                'itemsMenu',
                'itemsCategory',
                        'itemsSlider'


            )
        );
    }

    public function notFound(Request $request)
    {
        return view($this->pathViewController . 'not-found', [
        ]);
    }


}