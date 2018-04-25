<?php

namespace App\Http\Controllers\App\login;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

header('Access-Control-Allow-Origin:*');

class CheckController extends Controller
{
    public function check(){
//  $user=$_POST['user'];
//  $password=$_POST['password'];
$user="lmx";
$pass='1234';
//        !Hash::check($request->old_password,$user->password)
////$users=Auth::where("user","")
////  echo (json_encode($_POST));
   if (Auth::attempt(array('username' => $user, 'password' =>$pass),false))
  {
  //   return Redirect::to('admin');
   }else{
       echo 's';
       exit;
   }
    }
}
