<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class Focuscontroller extends Controller
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
        $focus=DB::table('focus')->get();
        return view("admin.focus.index",compact('focus'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        //批量更改标题 焦点图不是经常更改  暂时不用优化这里
        $i=1;
        foreach ($request->titles as $title)
        {
  DB::table('focus')
      ->where('id',$i++)
      ->update(['title'=>$title]);
   }

        $i=1;
        foreach ($request->hrefs as $href)
        {
          //   echo $i;
            DB::table('focus')
                ->where('id',$i++)
                ->update(['href'=>$href]);
        }

        for($i=1;$i<=6;$i++){
          $ico="icos"."$i";
          if ($request->$ico!=null){
              DB::table('focus')
                  ->where('id',$i++)
                  ->update(['ico'=>$request->file($ico)->store("avatar")]);
           }

        }

\Redis::del("focus");
        return redirect('admin/focus/create');
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
