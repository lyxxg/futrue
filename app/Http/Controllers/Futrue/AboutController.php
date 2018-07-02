<?php

namespace App\Http\Controllers\Futrue;

use App\Events\LoginEvent;
use App\Listeners\LoginListener;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AboutController extends Controller
{
    public function about(){
        $user=Auth::user();
        event(new LoginEvent('1'));//记录登录情况

        return view("Futrue.about");
    }
}
