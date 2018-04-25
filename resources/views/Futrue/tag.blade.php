@extends('Futrue.layouts.app')
@section("content")
    <div class="box-body">
        <div class="flexslider">
            <ul class="slides">
                <!-- Each slide should be enclosed inside li tag. -->

                <!-- Slide #1 -->
                <li>
                    <!-- Image -->
                    <img src="{{"http://127.0.0.1/futrue/public/Storage/".$tag->ico}}" alt="" class="futrue-tag"/>
                    <!-- Caption -->
                    <div class="flex-caption">
                        <div class="bor"></div>
                        <!-- Title -->
                        <h3>{{$tag->name}}</h3>
                        <!-- Para -->
                        <p>Hot:{{$tag->hot}}</p>
                    </div>
                </li>

                <!-- Slide #2 -->

        <h4>介绍</h4>

        <hr />

        <p>{!!$tag->baike!!}</p>
    </div>

    <!-- Content ends -->

    </div>
    </div>


@endsection("content")