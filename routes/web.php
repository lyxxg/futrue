<?php
use \Illuminate\Support\Facades\Session;

Route::get("/home",function (){
    return view("home");
});
Auth::routes();
Route::get("about","Futrue\AboutController@about");//关于
Route::get("feedback","Futrue\FeedBackController@feedback");//反馈
Route::get("feedbackyes","Futrue\FeedBackController@feedbackyes");//反馈发送成功之后跳转的界面
Route::get("banneduser","Futrue\UserController@banneduser");//关进小黑屋显示的界面


Route::group(['middleware'=>['banneduser','cachemlddlewarekey:20']],function () {
//没进入小黑屋才能通过

    Route::post("feedbackdata", "Futrue\FeedBackController@feedbackdata")
        ->name("feedbackdatacl");
Route::post("futruesearch", "Futrue\FutrueController@futruesearch")
    ->name("futruesearch");
Route::get("tagarticle/{id}", "Futrue\TagArticleController@tagarticle")
    ->name("tagarticle");//分类的文章
Route::post("collection/{id}", "Futrue\UserController@collection")
    ->name("user.collection");//文章收藏
Route::any("collectionhis/{id}", "Futrue\UserController@collectionhis")
    ->name("user.collectionhis");//收藏的查看
Route::get("fans/{id}", "Futrue\Usercontroller@fans")
    ->name("user.fans");
Route::post("good", "Futrue\AnswerController@good");//赞
Route::any("bad", "Futrue\AnswerController@bad");//踩
Route::any("noticeready", "Futrue\NoticesController@ready");//阅读通知
Route::resource("attention", "Futrue\FollowerController");//粉丝 关注
Route::resource("msg", "Futrue\MsgController");//私信
Route::resource("notices", "Futrue\NoticesController");//通知
Route::resource("user", "Futrue\UserController");//用户的个人中心
Route::resource("comment", "Futrue\CommentController");//评论表信息
Route::resource("article", 'Futrue\FutrueController');//文章主页
Route::resource("articlehistory", "Futrue\ArticleHistoryController");
Route::resource("answer", "Futrue\AnswerController");///答案表
Route::resource("tag", "Futrue\TagController");//标签


});


Route::group(['prefix'=>'admin','namespace'=>'Admin','as'=>'admin.','middleware'=>["auth","role:admin",'banneduser']],function (){
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
    Route::resource("roles","UserRolesController");//添加管理员
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
Route::get("uploadview","Tools\ExtendedController@QrView")
->name("qrview");

});

Route::get("auth/wx","Test\TestController@auth");
Route:: get("/auth/callback","Test\TestController@callback");


//聊天室  有bug
Route::group(['prefix'=>'chat'],function () {
    Route::get("/","Chat\ChatController@index");
    Route::post("store","Chat\ChatController@store");
    Route::get("getmsg","Chat\ChatController@getmsg");
});



Route::get("useredit","Futrue\UserController@useredit");
Route::post("answer/accept/{question_id}/{answer_id}","Futrue\AnswerController@accept")
    ->name("answer.accept");




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
