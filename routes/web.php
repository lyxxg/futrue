<?php
use \Illuminate\Support\Facades\Session;

Route::get("/home",function (){
    return view("home");
});
Auth::routes();
Route::get("about","Futrue\AboutController@about");//关于
Route::get("feedback","Futrue\FeedBackController@feedback");//反馈
Route::get("feedbackyes","Futrue\FeedBackController@feedbackyes");//反馈发送成功之后跳转的界面
Route::post("feedbackdata","Futrue\FeedBackController@feedbackdata")
    ->name("feedbackdatacl");
Route::post("futruesearch","Futrue\FutrueController@futruesearch")
->name("futruesearch");
Route::get("tagarticle/{id}","Futrue\TagArticleController@tagarticle")
->name("tagarticle");//分类的文章
Route::post("collection/{id}","Futrue\UserController@collection")
    ->name("user.collection");//文章收藏
Route::any("collectionhis/{id}","Futrue\UserController@collectionhis")
->name("user.collectionhis");//收藏的查看
Route::get("fans/{id}","Futrue\Usercontroller@fans")
    ->name("user.fans");
Route::post("good","Futrue\AnswerController@good");//赞
Route::any("bad","Futrue\AnswerController@bad");//踩
Route::any("noticeready","Futrue\NoticesController@ready");//阅读通知
Route::resource("attention","Futrue\FollowerController");//粉丝 关注
Route::resource("msg","Futrue\MsgController");//私信
Route::resource("notices","Futrue\NoticesController");//通知
Route::resource("user","Futrue\UserController");//用户的个人中心
Route::resource("comment","Futrue\CommentController");//评论表信息
Route::resource("article",'Futrue\FutrueController');//文章主页
Route::resource("articlehistory","Futrue\ArticleHistoryController");
Route::resource("answer","Futrue\AnswerController");///答案表
Route::resource("tag","Futrue\TagController");//标签

Route::group(['prefix'=>'admin','namespace'=>'Admin','as'=>'admin.','middleware'=>["auth","role:admin"]],function (){
    Route::resource("article","FutrueController");//文章管理
    Route::resource("answer","AnswerController");//答案管理
    Route::resource("user","UserController");//用户管理
    Route::resource("tagtype","TagTypeController");//标签分类
    Route::resource("tag","TagController");//bug
    Route::resource("recover","RecoverController");//回收站
    Route::resource("hot","HotArticleController");//热门文章
    Route::resource("announcement","AnnouncementController");//公告
    Route::resource("banneduser","BanneduserController");//违禁用户
    Route::resource("focus","FocusController");//my_Focus焦点图管理
    Route::resource("feedback","FeedBackController");//反馈
    Route::resource("roles","UserRolesController");//权限添加或者删除
});
Route::group(['prefix'=>'tools'],function () {

    Route::get("blbl", "Tools\blblController@blblview")
        ->name("blbl");//blbl封面
    Route::get("wechatpublicnumber", "Tools\WeChatPublicNumberController@public")
        ->name("wechatpublic");//微信公众号
    Route::get("contactme", "Tools\ContactMeController@contactme")
        ->name("contactme");//联系我
  Route::post("contactmepost", "Tools\ContactmepostController@contactmepost")
    ->name("contactmepost");
Route::get("jobsearch","Tools\JobSearchController@JobSearch")
    ->name("jobsearch");

Route::get("nmap","Tools\NmapController@Nmap");


//微信登录
Route::get("wxlogin","Tools\WechatController@login");

Route::any("upload","Tools\ExtendedController@Qrscanning");

//二维码上传处理的视图
Route::get("uploadview","Tools\ExtendedController@QrView");

});

//聊天
Route::group(['prefix'=>'chat'],function () {
    Route::get("/","Chat\ChatController@index");
    Route::post("store","Chat\ChatController@store");
    Route::get("getmsg","Chat\ChatController@getmsg");
});




Route::get("useredit","Futrue\UserController@useredit");
Route::post("answer/accept/{question_id}/{answer_id}","Futrue\AnswerController@accept")
    ->name("answer.accept");

Route::any("edit.md",function (\Illuminate\Http\Request $request){
    if($request->isMethod("get"))
        return view("test");
    dd($request);
});

Route::any('captcha-test', function()
{
    if (Request::getMethod() == 'POST')
    {
        $rules = ['captcha' => 'required|captcha'];
        $validator = Validator::make(Request::all(), $rules);
        if ($validator->fails())
        {
            echo '<p style="color: #ff0000;">Incorrect!</p>';
        }
        else
        {
            echo '<p style="color: #00ff30;">Matched :)</p>';
        }
    }

    $form = '<form method="post" action="captcha-test">';
    $form .= '<input type="hidden" name="_token" value="' . csrf_token() . '">';
    $form .= '<p>' . captcha_img() . '</p>';
    $form .= '<p><input type="text" name="captcha"></p>';
    $form .= '<p><button type="submit" name="check">Check</button></p>';
    $form .= '</form>';
    return $form;
});//验证码


Route::any('captcha-test', function()
{
    if (Request::getMethod() == 'POST')
    {
        $rules = ['captcha' => 'required|captcha'];
        $validator = Validator::make(Input::all(), $rules);
        if ($validator->fails())
        {
            echo '<p style="color: #ff0000;">Incorrect!</p>';
        }
        else
        {
            echo '<p style="color: #00ff30;">Matched :)</p>';
        }
    }

    $form = '<form method="post" action="captcha-test">';
    $form .= '<input type="hidden" name="_token" value="' . csrf_token() . '">';
    $form .= '<p>' . captcha_img() . '</p>';
    $form .= '<p><input type="text" name="captcha"></p>';
    $form .= '<p><button type="submit" name="check">Check</button></p>';
    $form .= '</form>';
    return $form;
});





Route::post('upload1',function (\Illuminate\Http\Request $request){
    $path=$request->file('editormd-image-file')->store('question');
    header('Content-Type:application/json;charset=utf-8');
    return [
        'success'=>1,
        'message'=>"上传成功",
        'url'=>\Illuminate\Support\Facades\Storage::url($path)
    ];
    dd($request);
});

Route::post('upload',function (\Illuminate\Http\Request $request){
    $path=$request->file('editormd-image-file')->store('test');
    return [
        'success'=>1,
        'message'=>"上传成功",
        'url'=>\Illuminate\Support\Facades\Storage::url($path)
    ];
    //dd($request->allFiles());
});


Route::get("ss",function(){
//\Illuminate\Support\Facades\Log::info();
//    if(!Session::has('test')){
//   Session::put("test",str_random(20));}
//$test=Session::get("test");
//echo $test;
    if(!session('test1',false)){
//    session()->put('test1', str_random(10));
        session(['test2'=>str_random(30)]);
    }
//    }
    Log::info(session('test2'));


});


Route::get("cache",function (\Illuminate\Http\Request $request){
    //Cache::put('ip',$request->ip(),1);
    echo Cache::get('ip');
});
Route::get("cache1",function (\Illuminate\Http\Request $request){
    //Cache::put('ip',$request->ip(),1);
    echo Cache::get('ip');
});


Route::get('test/role',function(){


    $user=\App\Models\User::find(1);
    dump($user->hasRole("admin"));
    dump($user->can("admin"));
});

Route::get("add/permission",function (){
    $role=\App\Models\Role::find(1);
    //dd($role);
    $permission=\App\Models\Permission::find(2);
    $role->attachPermission($permission);
});
Route::get("test4",function (){
    \Illuminate\Support\Facades\Storage::disk('local')->put('file.txt', 'Contents');

});
Route::get("test5",function (){
    echo asset('storage/file.txt');
});

Route::get("test6",function (){
   return view("test2");
});

Route::get("test7",function (){
   return view("test.test");
});


Route::any("testajax","Test\Testcontroller@testajax");
Route::get("cache1",function(\Illuminate\Http\Request $request){
   //\Illuminate\Support\Facades\Cache::put('ip',$request->ip(),1);
   echo \Illuminate\Support\Facades\Cache::get('ip');
   // echo "1";
});


Route::get("test77",function(){
	echo "77";
	
});


Route::get("test8","Test\Test1Controller@test");