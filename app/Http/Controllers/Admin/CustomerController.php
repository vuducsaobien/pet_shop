<?php

namespace App\Http\Controllers\Admin;
use App\Models\CustomerModel as MainModel;
use App\Http\Requests\CustomerRequest as MainRequest;

class CustomerController extends AdminController
{
    public function __construct()
    {
        $this->pathViewController = 'admin.pages.customer.';
        $this->controllerName = 'customer';
        $this->model = new MainModel();
        $this->params["pagination"]["totalItemsPerCustomer"] = 5;
        parent::__construct();
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