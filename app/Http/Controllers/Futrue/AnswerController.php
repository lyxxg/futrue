<?php

namespace App\Http\Controllers\Futrue;

use App\Models\Answergoodandbad;
use App\Models\Bad;
use App\Models\Notice;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Answer;
use App\Models\Question;
use Illuminate\Support\Facades\Auth;

class AnswerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'question_id' => 'required|exists:questions,id',
            'content'=>'required|min:3|max:2000'
        ],[
            'question_id.exists'=>'我跟你讲 你别搞事情',
            'content.required'=>'答案内容不能为空',
            'content.min'=>'答案长度在3-2000字符之间',
            'content.max'=>'答案长度在3-2000字符之间',
        ]);

        $data = $request->all();
        $data['user_id'] = Auth::id();
//$request->question_id $data['user_id']
        Answer::create($data);

        //回答数+1
        $article = Question::find($request->question_id);
        $article->user_id;//文章发布者的id
        Auth::id();//回答者id
        $notice=new Notice();
        $notice->user_id=$article->user_id;
        $notice->object_user_id=Auth::id();//当前登录
        $notice->action='answer';
        $notice->object_id=$request->question_id;
        $article->answer++;
        if(Auth::id()!=$article->user_id) {//如果不是直接的问题回答  则保存进通知
           $notice->save();
       }
        $article->save();

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

    public function accept($question_id,$answer_id)
    {

        $answer = Answer::find($answer_id);
        //检测该回答是否属于该问题
        if ($answer->question_id != $question_id) {
            return back();
        }

        $question = Question::find($question_id);
        if ($question->status == 1) {
            return back();
        }

        //采纳该答案
        $answer->accept = 1;
        $answer->save();

        //把问题设置为已解决状态

        $question->status = 1;
        $question->save();

        return back();
    }

    public function good(){//赞
header('Access-Control-Allow-Origin:*');
$answer_id=$_POST['answer_id'];
$user_id=Auth::id();
$result=Answergoodandbad::all()->whereIn('user_id',$user_id)->whereIn('answer_id',$answer_id)->first();
        $answer=Answer::where('id',$answer_id)->first();
$goodandbad=new Answergoodandbad();
//dd($answer);
        if($result!=null){//此时已经点赞过了 取消
            $answer->good--;
            $result->delete();
             $answer->save();
            echo "0";
            exit();
}

        $answer->good++;
        $goodandbad->user_id=$user_id;
        $goodandbad->answer_id=$answer_id;
        $goodandbad->save();
        $answer->save();
echo 1;
    }

public function bad(){
//踩
    header('Access-Control-Allow-Origin:*');
    $answer_id=$_POST['answer_id'];
    $user_id=Auth::id();
    $result=Bad::all()->whereIn('user_id',$user_id)->where('answer_id',$answer_id)->first();
    $answer=Answer::where('id',$answer_id)->first();
//    /echo $user_id;
    $bad=new Bad();
  //  echo $result;
    if($result!=null){//此时已经点赞过了 取消
        $answer->bad--;
        $result->delete();
        $answer->save();
        echo "0";
        exit();
    }
    $answer->bad++;

    $bad->user_id=$user_id;
    $bad->answer_id=$answer_id;
    $bad->save();
    $answer->save();
    echo 1;

}

}
