<?php

namespace App\Http\Controllers\News;

use App\Http\Controllers\Controller;
use App\Mail\MailService;
use App\Models\SettingModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use App\Models\ContactModel as MainModel;

class ContactController extends Controller
{
    private $pathViewController = 'news.pages.contact.';
    private $controllerName = 'contact';
    private $params = [];
    private $model;

    public function __construct()
    {
        $this->model = new MainModel();
        View::share('controllerName', $this->controllerName);
    }

    public function index()
    {
        $data = [
            'name' => 'abc',
            'email' => 'huysdakmil@gmail.com',
            'subject' => 'tieu de',
            'message' => 'noi dung tin nhan',
        ];
        $mailService = new MailService();
        $mailService->sendContactConfirm($data);

        $setting=new SettingModel();
        $setting_general=$setting->getItem(['type'=>'general'],null);

        return view($this->pathViewController . 'index',compact(
            'setting_general'
        ));
    }

    public function postContact(Request $request)
    {
         $data = [
             'name' => $request->name,
             'email' => $request->email,
             'subject' => $request->subject,
             'message' => $request->message,
         ];

         $this->model->saveItem($data, ['task' => 'news-add-item']);

         $mailService = new MailService();
         $mailService->sendContactConfirm($data);
         $mailService->sendContactInfo($data);

        return redirect()->route($this->controllerName . '/index')->with('news_notify', 'Cảm ơn bạn đã gửi thông tin liên. Chúng tôi sẽ liên hệ bạn trong thời gian sớm nhất.');
    }
}
