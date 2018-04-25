<?php

namespace App\Http\Controllers\Admin;

use App\Models\TagType;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class TagTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tagTypes = TagType::paginate(10);
        return view('admin.tagtype.index', compact('tagTypes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("admin.tagtype.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Validator::make($request->all(),[
            'type_name'=>'required|min:2|max:100'
        ], [
            'type_name.required'=>'标签分类名称不能为空',
            'type_name.min'=>'标签分类名称长度在2-100字符之间',
            'type_name.max'=>'标签分类名称长度在2-100字符之间',
        ])->validate();

        TagType::create($request->all());

        return redirect()->route('admin.tagtype.index');
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
    public function edit(TagType $tagType)
    {
        return view('admin.tagtype.edit',compact('tagType'));
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
        dd($id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        TagType::destroy($id);
        return redirect()->route('admin.tagtype.index');
    }
}
