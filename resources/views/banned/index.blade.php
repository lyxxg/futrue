@extends('Futrue.layouts.app')
@section("content")

    <div class="post-foot well">
        <h1 style="text-align: center">小黑屋</h1>
        <p class="text-center">尊敬的:<span class="label label-info">{{$user->info->nick}}</span></p>
        由于你 <span>{{$banned->content}}</span>
        被管理员<em class="">{{\App\Models\User::find("$banned->object_user_id")->info->nick}}</em>于
        {{$banned->created_at}}加入小黑屋

    </div>
    @endsection("content")