<?php

namespace App\Http\Controllers\Tools;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;


class ContactmepostController extends Controller
{
    public function  __construct(){
        $this->middleware('throttle:2');
        return \App\User::all();
    }

    public function contactmepost(Request $request){
        $content1=$request->content;
        $content=$content1;
       // $name="未来笔记";
        $a=Mail::send('mail.contactme',['content'=>$content],function($message) {
            $to = '449399575@qq.com';
            $message->to($to)->subject('测试邮件');
        });

        dd("s");
    }
}
