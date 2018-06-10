<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\UpdateUserRequest;
use App\Models\Banneduser;
use App\Models\User;
use App\Models\UserInfo;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $banneds=Banneduser::all();

        //被关进小黑屋的用户
        $bannedarr=[];
        foreach ($banneds as $banned){
            array_push($bannedarr,$banned->user_id);
        }

        $users = User::paginate(10);
        return view("admin.user.index", compact('users','bannedarr'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("admin.user.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $v =Validator::make($request->all(), [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:6|confirmed',
            'nick'=>'required|min:2|max:20'
        ],[
            'nick.min'=>'昵称字段最少2个字符长度',
        ]);

        if ($v->fails()) {
            return redirect(route('admin.users.create'))
                ->withErrors($v)
                ->withInput();
        }

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);

        $user_info = new UserInfo();
        $user_info->user_id = $user->id;
        $user_info->nick = $request->nick;

        $user_info->save();

        return redirect()->route("admin.users.index");

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        $user['info']=$user->info;
        return $user;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return view("admin.user.edit",compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateUserRequest $request, $id)
    {
        $user = User::find($id);
        $user->name = $request->name;
        $user->email = $request->email;
//        $user->password = $request->password==""?$user->password:$request->password;

        if($request->password!=""){
            $user->password = bcrypt($request->password);
        }

        $user->save();

        $info = $user->info;

        $info->nick = $request->nick;
        $info->coins = $request->coins;
        $info->description = $request->description;

        $info->save();

        return redirect()->route("admin.users.index");

    }



    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->info->delete();
        $user->delete();
        return redirect()->route("admin.users.index");
    }
}
