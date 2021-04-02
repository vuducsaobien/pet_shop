<?php
namespace App\Mail;

use App\Models\SettingModel;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Mail;

class MailService
{
    private $fromTitle;

    public function __construct()
    {
        $this->fromTitle = 'Pet Shop Marten';
    }

    public function sendContactConfirm($data)
    {
        $mail = json_decode(SettingModel::where('key_value', 'setting-email')->first()->value, true);
        if (empty($mail))
            return false;
        else {
            Mail::send([], [], function ($message) use ($mail, $data) {
                $message->from($mail['username'], $this->fromTitle);
                $message->to($data['email']);
                $message->subject($this->fromTitle . ' Thông báo gửi liên hệ thành công');

                $content = sprintf('
                <p>Xin chào, %s</p>
                <p>Pet Shop Marten đã nhận được thông tin liên hệ từ bạn và sẽ phản hồi bạn trong thời gian sớm nhất</p>
                <p>Cảm ơn!</p>
                ', $data['name']);
                $message->setBody($content, 'text/html');
            });
            return true;
        }
    }

    public function sendContactInfo($data)
    {
        $mail = json_decode(SettingModel::where('key_value', 'setting-email')->first()->value, true);
        if (empty($mail))
            return false;
        else {
            Mail::send([], [], function ($message) use ($mail, $data) {
                $message->from($mail['username'], $this->fromTitle);

                $bcc = explode(',', SettingModel::where('key_value', 'setting-bcc')->first()->value);
                $message->bcc($bcc);

                $message->subject('Thông tin liên hệ từ ' . $data['name']);
                $content = sprintf('
                <p>Name: %s</p>
                <p>Email: %s</p>
                <p>Subject: %s</p>
                <p>Message: %s</p>
                ', $data['name'], $data['email'], $data['subject'], $data['message']);
                $message->setBody($content, 'text/html');
            });
            return true;
        }
    }

    public function sendOrderConfirm($data)
    {
        $mail = json_decode(SettingModel::where('key_value', 'setting-email')->first()->value, true);
        if (empty($mail))
            return false;
        else {
            Mail::send([], [], function ($message) use ($mail, $data) {
                $message->from($mail['username'], $this->fromTitle);
                $message->to($data['email']);
                $message->subject($this->fromTitle . ' Thông báo Đặt Hàng Thành Công !!');

                $content = sprintf('
                <p>Xin chào, %s</p>
                <p>Pet Shop Marten Cám ơn bạn đã Đặt Hàng. </p>
                <h5>Thông tin Đơn Hàng : </h5>
                <ul>
                    <li>Mã Đơn Hàng : </li>
                    <li>Mã Đơn Hàng : </li>
                    <li>Mã Đơn Hàng : </li>
                    <li>Mã Đơn Hàng : </li>
                    <li>Mã Đơn Hàng : </li>
                <ul>
                <p>Cảm ơn!</p>
                ', $data['name']);
                $message->setBody($content, 'text/html');
            });
            return true;
        }
    }




    // Mailer::sendContactConfirm($data);
    // Mailer::sendContactInfo($data);
}