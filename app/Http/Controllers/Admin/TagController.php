<?php

namespace App\Http\Controllers\Admin;

use App\Models\Tag;
use App\TagType;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;


/**
 * Class TagController
 * @package App\Http\Controllers\Admin
 */
class TagController extends Controller
{
//    function __construct()
//    {
//        $this->middleware("permission:admin.tags");
//    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {


        $tags = Tag::paginate(10);
        return view('admin.tag.index', compact('tags'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $types = TagType::all();
        \Redis::del("futruetags");
        return view('admin.tag.create', compact('types'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Validator::make($request->all(),
            [
                'name'=>'required|min:2|max:255',
                'ico'=>'image',
                'tag_type_id'=>'exists:tag_types,id',
                'baike'=>'max:1000'
            ],[
                'name.required'=>'标签名不能为空',
                'name.min'=>'标签名长度在2-255之间',
                'name.max'=>'标签名长度在2-255之间',
                'ico.image'=>'标签图标必须是一张图片',
                'tag_type_id.exists'=>'您选择的分类不存在，请刷新后重试',
                'baike.max'=>'标签介绍不能超过1000个字符'
            ])->validate();

        $data = $request->all();

        if($request->file('ico')){
            $data['ico'] = $request->file('ico')->store("ico");
        }

        Tag::create($data);

        \Redis::del("futruetags");
        return redirect(route('admin.tag.index'));
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
    public function edit(Tag $tag)
    {

        \Redis::del("futruetags");
        return view("admin.tag.edit", compact('tag'));
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
        //这个$id多余了  反正也不影响  还能骗大佬  我写的代码不会有问题的  我靠 怎么....
//        dd($request->all());
        $tag_id=$request->id;
        $tag_name=$request->name;
        $tag_type=$request->type_name;
        $tag_baike=$request->baike;
        $tag=Tag::find($request->id);//偏偏不用$id
        $tag->name=$tag_name;
    if($tag->ico!=null){
        $tag->ico=$request->file('ico')->store("tagico");}

        $tag->baike=$tag_baike;
        $tag->save();
        \Redis::del("futruetags");
        return redirect(route('admin.tag.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Tag::destroy($id);
        return redirect()->route('admin.tag.index');
    }
}
