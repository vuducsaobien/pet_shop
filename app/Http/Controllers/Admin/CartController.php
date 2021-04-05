<?php

namespace App\Http\Controllers\Admin;
use App\Models\CartModel as MainModel;
use App\Http\Requests\CartRequest as MainRequest;
use Illuminate\Http\Request;

class CartController extends AdminController
{
    public function __construct()
    {
        $this->pathViewController = 'admin.pages.cart.';
        $this->controllerName = 'cart';
        $this->model = new MainModel();
        parent::__construct();
    }

    public function index(Request $request)
    {
        $this->params['filter']['status']   = $request->input('filter_status', 'all' ) ;
        $this->params['filter']['category'] = $request->input('filter_category', 'all' ) ;
        $this->params['search']['field']    = $request->input('search_field', '' ) ;        // all id description
        $this->params['search']['value']    = $request->input('search_value', '' ) ;

        $items          = $this->model->listItems($this->params, ['task'  => 'admin-list-items']);
        $attribute_name = $this->model->listItems(null, ['task'  => 'admin-list-items-get-all-attribute-name']);
        $prepareParams  = $this->model->fixArray($items, ['task' => 'fix-array-01']);

        $params['main']           = $prepareParams;
        $params['attribute_name'] = $attribute_name;

        $params    = $this->model->fixArray($params, ['task' => 'fix-array-02']);
        $attribute = $this->model->fixArray($params, ['task' => 'fix-array-03']);

        // echo '<pre style="color:red";>$items === '; print_r($items);echo '</pre>';
        // echo '<pre style="color:red";>$attribute === '; print_r($attribute);echo '</pre>';
        // echo '<h3>Die is Called Controller</h3>';die;

        $itemsStatusCount   = $this->model->countItems($this->params, ['task' => 'admin-count-items-group-by-status']); // [ ['status', 'count']]

        return view($this->pathViewController .  'index', [
            'params'           => $this->params,
            'items'            => $items,
            'itemsStatusCount' => $itemsStatusCount,
            'attribute'        => $attribute
        ]);
    }

    public function save(MainRequest $request)
    {
        if ($request->method() == 'POST') {
            $params = $request->all();
            
            $task   = "add-item";
            $notify = "Thêm phần tử thành công!";

            if($params['id'] !== null) {
                $task   = "edit-item";
                $notify = "Cập nhật phần tử thành công!";
            }
            $this->model->saveItem($params, ['task' => $task]);
            return redirect()->route($this->controllerName)->with("zvn_notify", $notify);
        }
    }
}