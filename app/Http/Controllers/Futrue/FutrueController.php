<?php

namespace App\Http\Controllers\Futrue;

use App\Events\QuestionViewEvent;
use App\Listeners\ArticleCreateListener;
use App\Models\Announcement;
use App\Models\Announcements;
use App\Models\Focu;
use App\Models\Tag;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Question;
use App\Models\QuestionTag;
use App\Models\TagType;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
class FutrueController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $articles=Question::where('del', 0)
            ->orderBy('created_at', 'desc')->paginate(6);
$focus = \Redis::get('focus');
        if ($focus == null)//焦点图不是经常要修改  因为我懒
            {
                $focus = Focu::all();
                \Redis::set("focus",$focus);
                }

                $focus=json_decode($focus);
        $taghots = Tag::all()->sortByDesc('hot')->take(10);
        return view('Futrue.article.index', compact('articles', 'taghots', 'focus'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {


        $types = TagType::all();
        return view('Futrue.article.create', compact('types'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $v = Validator::make($request->all(),[
            'title'=>'required|min:5|max:250',
            'content'=>'required|min:5|max:50000000',
            'tag_id.*'=>'exists:tags,id',
        ],[
            'tag_id.*.exists'=>'请选择合法的标签',
        ]);

        $v->validate();
        $data = $request->all();
        $data['user_id'] = Auth::id();
        $question = Question::create($data);
        if($question){
            if($request->tag_id==null){
             echo "未选择标签";
                return back();
            }
            foreach ($request->tag_id as $v){
  $taghot=Tag::find($v);
  $taghot->hot++;
                $qt = new QuestionTag();
                $qt->question_id = $question->id;
                $qt->tag_id = $v;
                event(new ArticleCreateListener());
                $qt->save();
                $taghot->save();
            }
        }


        //为了添加后马上可以看到，所以清空缓存
//        Cache::forget('question_list');//删除文章的缓存
     return redirect('article');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Question $article)
    {
        event(new QuestionViewEvent($article));
        return view("Futrue.article.article", compact('article'));
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

public function futruesearch(Request $request)
{
    $content=$request->content;
$articles=Question::where('title','like',"%$content%")->get();
    return view("Futrue.futruesearch", compact('articles'));

}

}
