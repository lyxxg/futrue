
@extends('Futrue.layouts.app')
@section("content")
    <div class="meta">
        <h2 class="title-futrue">
      {{$user[0]->nick}}的粉丝
        </h2>
    </div>
    <hr>
        <div class="box-body service">
        @foreach($fans as $fan)

            <div class="span3">

                <!-- Service block #1 -->
                <div class="service-block">

                    <!-- link -->
                    <a href="{{route('user.index',['user_id'=>$fan->user_id])}}">
                        <div class="service-image b-blue">
                            <img  src="{{Storage::url($fan->user->info->avatar)}}" id="avatar" class="futrue-avatars">
                        </div>
                    </a>
                    <!--Title -->
                    <h4><a href="{{route('user.index',['user_id'=>$fan->user_id])}}">{{$fan->user->info->nick}}</a></h4>
                    <!-- Para -->
                    <p>{{$fan->user->info->description}} </p>
                </div>

            </div>
            @endforeach

        </div>


        </div>
   @endsection()