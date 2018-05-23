<?php

namespace App\Http\Controllers\Chat;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ChatController extends Controller
{
    public function  index(){

        return view("chat.index");
}

public function store(){
        //处理发送过来的信息

    $user_id=$_POST['user_id'];
    $msg=$_POST['msg'];

     $isread=0;//默认未读
    $id=\Redis::incr("id");//自增1后的
    \Redis::set("msg_".$id,$msg);//设置消息id
    \Redis::set($user_id.'_'.$id,$user_id);//0_12
//    \Redis::lpush("isread","$user_id,$id");//未读的   加入到队列


    }

    public function getmsg()
    {
        set_time_limit(0);
        $id=$_GET['id'];
      echo $id;exit();
        while (1) {
            sleep(0.3);
//            if (!empty(\Redis::llen("isread"))) {//如果未读列表有数据

                $dataid = \Redis::brpop("isread", 2);
                $dataid = explode(',', $dataid[1]);
                $user_id = $dataid[0];
                $id = $dataid[1];
                $msg = \Redis::get("msg_$id");

                $data = array(
                    'user_id' => $user_id,
                    'msg' => $msg
                );
              return json_encode($data);
                //  print_r($data);exit();
    //            }
        }

    }












}
