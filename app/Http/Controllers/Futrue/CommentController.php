<?php

namespace App\Http\Controllers\Futrue;

use App\Models\Comment;
use App\Models\Notice;
use App\Models\Question;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        dd("s");
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

        $data = $request->all();
     //   dd($data);
//        dd($data);
        $data['user_id'] = Auth::id();
        Comment::create($data);
        $notice=new Notice();
        //dd($request->answer_id);//回答的id
        $notice->user_id=$data['user_id'];//谁发送过来的评论
        $notice->object_user_id=Auth::id();//当前登录用户
        $notice->action=$request->type_article;
        $notice->object_id=$request->answer_id;//答案id

if($request->type_article=='reply'){
    $notice->object_id=$request->comment_id;//评论的id
}
      //  $article->answer++;
        $notice->save();

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
