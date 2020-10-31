<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Mail\DemoEmail;
use App\Mail\ResetPassword;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{
    public static  function send($scheduleDate)
    {
        $objDemo = new \stdClass();
        $objDemo->scheduleDate = $scheduleDate;
        $objDemo->sender = 'SenderUserName';
        $objDemo->receiver = 'ReceiverUserName';
        Mail::to("hoangtrunga1k55@gmail.com")->send(new DemoEmail($objDemo));
    }
    public  static function  resetPassword($link){
        $objDemo = new \stdClass();
        $objDemo->link = $link;
        $objDemo->sender = 'SenderUserName';
        $objDemo->receiver = 'ReceiverUserName';
        Mail::to("hoangtrunga1k55@gmail.com")->send(new ResetPassword($objDemo));
    }
}