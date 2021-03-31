<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use App\Models\OrderModel;
use ConsoleTVs\Charts\Facades\Charts;
use Illuminate\Http\Request;
use App\Models\SliderModel;
use App\Models\UserModel;
use App\Models\CategoryModel;
use App\Models\ArticleModel;
use Illuminate\Support\Facades\DB;


class DashboardController extends AdminController
{
    public function __construct()
    {
        $this->pathViewController = 'admin.pages.dashboard.';
        $this->controllerName = 'dashboard';
        parent::__construct();
    }

    public function indexs(Request $request)
    {
        $itemSliderCount   = SliderModel::countItemsDashboad(); 
        $itemUserCount     = UserModel::countItemsDashboad(); 
        $itemCategoryCount = CategoryModel::countItemsDashboad(); 
        $itemArticleCount  = ArticleModel::countItemsDashboad(); 
        
        return view($this->pathViewController .  'index', compact([
            'itemSliderCount', 'itemUserCount', 'itemCategoryCount', 'itemArticleCount'
        ]));
    }
    public function index(Request $request)
    {
        $order = OrderModel::where(DB::raw("(DATE_FORMAT(created,'%Y'))"),date('Y'))
            ->get();
        /*================================= thong ke dat hang theo thang =============================*/
        $chart = Charts::database($order, 'bar', 'highcharts')
            ->title("thống kê số đơn đặt hàng theo tháng")
            ->elementLabel("Số đơn đặt hàng")
            ->dimensions(800, 400)
            ->responsive(false)
            ->groupByMonth(date('Y'));


        /*================================= thong ke so luong bai viet moi table =====================*/
        $itemSliderCount   = SliderModel::countItemsDashboad();
        $itemUserCount     = UserModel::countItemsDashboad();
        $itemCategoryCount = CategoryModel::countItemsDashboad();
        $itemArticleCount  = ArticleModel::countItemsDashboad();
        $chart2=Charts::create('pie', 'highcharts')

            ->title('Tổng số record')
            ->labels(['Slider', 'User', 'Category','Article'])
            ->values([$itemSliderCount,$itemUserCount,$itemCategoryCount,$itemArticleCount])

            ->dimensions(800,400)
            ->colors(['#2196F3', '#F44336', '#FFC107','green'])
            ->responsive(false);

        return view($this->pathViewController.'index',compact('chart','chart2'));
    }

}

