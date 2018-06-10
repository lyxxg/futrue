<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use function Composer\Autoload\includeFile;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use App\Http\Controllers\model;
class LoginController extends Controller
{
    protected $maxLoginAttempts = 5;//每分钟最多登陆2次
    protected $lockoutTime = 600;//6分钟再登陆
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/article';

    /**
     * Create a new controller instance.
     *
     * @return void

     */






    public function authenticate()
    {

        if (Auth::attempt(['email' => $email, 'password' => $password])) {
            // 认证通过...
            return redirect()->intended('dashboard');
        }


    }



    public function username()
    {
        return "name";
    }



    protected function validateLogin(Request $request)
    {

//        include ("CaptchaClient.php");


        /**构造入参为appId和appSecret
         * appId和前端验证码的appId保持一致，appId可公开
         * appSecret为秘钥，请勿公开
         * token在前端完成验证后可以获取到，随业务请求发送到后台，token有效期为两分钟**/
        $appId = "9eb369e65c776c2f3bfaef1d944b3e2a";
        $appSecret = "e5f3b03d9bdd1ddd06cdbf2025268fcd";
        $client = new \CaptchaClient($appId,$appSecret);
        $client->setTimeOut(2);      //设置超时时间，默认2秒
        $client->setCaptchaUrl("http://cap.dingxiang-inc.com/api/tokenVerify");
//特殊情况可以额外指定服务器，默认情况下不需要设置
        $response = $client->verifyToken($_POST['token']);
       // echo $response->serverStatus;
//确保验证状态是SERVER_SUCCESS，SDK中有容错机制，在网络出现异常的情况会返回通过
        if($response->result){
            $this->validate($request, [
                $this->username() => 'required',
                'password' => 'required',
            ],[
                'password.required' =>'密码不能为空',
                //'captcha.captcha' =>"验证码错误"
            ]);




        }else{
    echo "验证码失败";
///exit();
return back();
        }
      }


    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }





}
