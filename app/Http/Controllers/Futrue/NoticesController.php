<?php

namespace App\Http\Controllers\Futrue;

use App\Models\Notice;
use App\Models\Notice2;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use function Sodium\compare;

class NoticesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      //查询当前用户的消息
        $user_id=Auth::id();
        $notice2s=Notice2::all()->whereIn('user_object_id',$user_id)->where('status','0');
        $notices=Notice::all()->whereIn('user_id',$user_id)->where('status','0');
        return view("Futrue.notices.index",compact('notices','notice2s'));
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
        //
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
    public function destroy()
    {
        echo "ss";
    }

    public function ready(){
       $user_id=Auth::id();
        $notices=Notice::all()->whereIn('user_id',$user_id);
        foreach($notices as $notice)
        {
      $notice->status=1;
        $notice->save();
        }

    }



}
