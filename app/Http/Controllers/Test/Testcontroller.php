<?php

namespace App\Http\Controllers\Test;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Laravel\Socialite\Facades\Socialite;

class Testcontroller extends Controller
{
    public function testajax(){

	}
	public function auth(Request $request){

        return Socialite::with('weixinweb')->redirect();
    }
    public function callback(Request $request){
        dd("s");
$oauthUser=\Socialite::with('weixin ')->user();
        dd($request);
    }
}
