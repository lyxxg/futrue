<?php

namespace App\Http\Controllers\Admin;

use App\Models\Permission;
use App\Models\Role;
use App\Models\Role_user;
use \App\Models\User;
use \Illuminate\Support\Facades;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Zizaco\Entrust\Entrust;

class UserRolesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $roles=Role_user::all();

        //被关进小黑屋的用户
        $rolearr=[];
        foreach ($roles as $role){
            array_push($rolearr,$role->user_id);
        }

        $users = \App\Models\User::paginate(10);
        return view("admin.roles.index", compact('users','rolearr'));
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
$user_id=$request->user_id;
//$user=User::find($user_id);
if(Facades\Auth::user()->hasRole('admin')){
//如果当前登录用户权限是admin
$admin=new Role_user();
$admin->user_id=$user_id;
$admin->role_id=1;
$admin->save();
    //attachRole
    return back();
}
echo "别搞事情 我害怕";

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
        if(Facades\Auth::user()->hasRole('admin')) {
            Role_user::Where("user_id",$id)->delete();
                        return redirect()->route('admin.roles.index');
        }            //
        echo "别搞事情 我害怕";
    }




}
