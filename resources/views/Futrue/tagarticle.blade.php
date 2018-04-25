@extends('Futrue.layouts.app')
@section("content")
    <div class="post-foot well">
        <!-- Social media icons -->

        @foreach($articles as $article)
            <p>   <a href="{{route('article.show',$article->question->id)}}">         {{$article->question->title}}</a></p>
            <p></p>

            <div class="meta">
                <a href="{{route('user.index',['user_id'=>$article->question->user_id])}}"> <i class="fa fa-user"></i>{{$article->question->user->name}} </a>
                    <a href="{{route("tag.show",$article->tag)}}">
                        <i class="fa fa-tag"></i>
                        {{$article->tag->name}}</a>
                    <!--加个标签链接-->
                <i class="fa fa-calendar"></i>
                {{$article->question->created_at->diffForHumans()}}
                <span class="pull-right">
                    <i class="fa fa-eye"></i> {{$article->question->view}}
                    <a href="#">
                        <i class="fa fa-comment"></i>
                        {{$article->question->answer}}</a>
                            </span>


            <hr/>
        </div>

        @endforeach
    </div>

    @endsection("content")