<?php

namespace App\Http\Controllers\Tools;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class WeChatPublicNumberController extends Controller
{
    public function public(){
        return view("tools.wechatpublicnumber");
    }
}
