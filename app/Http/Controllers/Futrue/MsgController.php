<?php

namespace App\Http\Controllers\Futrue;

use App\Models\Msg;
use App\Models\Notice2;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

use Barryvdh\Debugbar\Facade as Debugbar;
use Illuminate\Support\Facades\DB;

class MsgController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view("futrue.msg.create");
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {


        $user_object_id=$request->user_id;//被私聊用户的id
        //user_id是接收者  查询我接收的信息
       //DB::enableQueryLog();
//        Debugbar::display();
//dd($user_object_id);
        $msgs1=Msg::where("user_object_id",$user_object_id)//对方接收信息
            ->Where('user_id',Auth::id());//对方接受的信息
        $msg2=Msg::where("user_object_id",Auth::id())->Where("user_id",$user_object_id);
     $msgs=$msgs1
    ->union($msg2)->orderby("created_at")->get();
        //查询当前用户和包含我发送给消息的用户  并按照时间排序
        return view("Futrue.msg.create", compact('user_object_id','msgs'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user_object_id=$request->user_object_id;
        $user_id=Auth::id();//发送者
        $content=$request->content;//接受者
        $msg=new Msg();
        $msg->user_id=$user_id;//user_id是发送者
        $msg->msg=$content;
        $msg->user_object_id=$user_object_id;
        $notice2=new Notice2();
        $notice2->action="msg";
        $notice2->user_id=$user_id;//user_id发送者
        $notice2->user_object_id=$user_object_id;//user_object_id接收者
        $last=$msg->all()->last();
        if($last==null)
        $notice2->object_id=1;
        else
        $notice2->object_id = $last->id;
        $msg->save();
        $notice2->save();
    return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
