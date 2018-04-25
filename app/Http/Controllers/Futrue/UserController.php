<?php

namespace App\Http\Controllers\Futrue;

use App\Http\Requests\attention;
use App\Models\Collection;
use App\Models\Follow;
use App\Models\Follower;
use App\Models\followers;
use App\Models\Question;
use App\Models\User;
use App\Models\UserInfo;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $id){
        if (!Auth::check()){
        return view("Futrue.back.loggin");
        exit();
        }
        $user =User::find($id->user_id);
        return view('Futrue.user.index',compact("user"));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

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
        dd($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */


    public function edit($id)
    {
if($id!=Auth::id()){
echo "别搞事情  361度极限滑稽害怕";
    exit();
}
$sexs=array(0=>"女",1=>"男",3=>"保密");
$user=User::find($id);
return view('Futrue.user.edit',compact('user','sexs'));

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
        $user = User::find($id);
        $sex=$request->sex;//麻痹的 早知道设计成字符串了
       if($sex=="男"){
           $sex1=1;
       }elseif ($sex=="女"){
           $sex1=0;
       }else{
           $sex1=3;
       }
        //如果用户要修改密码，则验证密码是否正确
        if($request->old_password!=""){
            //:disk('local')
            if(!Hash::check($request->old_password,$user->password)){
                return "旧密码错误";
            }

            $user->password = bcrypt($request->password);
        }

  //      $user->email = $request->email;
       // $info->sex=$sex1;
       // $info->nick = $request->nick;
     // if($user->info->avatar!=)
//        $info->save();
//dd("s");
       if($request->file('avatar')!=null) {
           UserInfo::where('user_id',$id)
               ->update(['avatar'=>$request->file('avatar')->store('avatar')]);
       }
        //$info->description = $request->description;
       //dd($request->description);
        UserInfo::where('user_id',$id)
            ->update
            (['sex'=>$sex1,'nick'=>$request->nick,'description'=>$request->description]);
       $user->save();

       return redirect()->route("user.index",['user_id'=>$id]);

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

public function collection(Request $article){
        $user_id=Auth::id();
        $question=Question::find($article->id);
$result=Collection::all()->whereIn('user_id',$user_id)->whereIn('question_id',$question);
   if($result->first()!=null){
        //已经存在了  所以这里取消收藏
$result->first()->delete();
return back();
exit();
	}

		$question->collection++;//=$question->collection+1;
    $collection=new Collection();
    $collection->user_id=$user_id;
    $collection->question_id=$article->id;
    $collection->save();
    $question->save();
return back();
}

    public function collectionhis(Request $user_id){
        $user_id=$user_id->id;
   $collections=Collection::all()->where('user_id','1');
        return view('Futrue.collection',compact("collections"));

    }






}

