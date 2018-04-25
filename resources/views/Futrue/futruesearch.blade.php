@extends('Futrue.layouts.app')
@section("content")
    <div class="post-foot well">
        <!-- Social media icons -->

        @foreach($articles as $article)
            <p>   <a href="{{route('article.show',$article)}}">
                        {{$article->title}}</a></p>
            <p></p>

            <div class="meta">
                <a href="{{route('user.index',['user_id'=>$article->user_id])}}"> <i class="fa fa-user"></i>{{$article->user->name}} </a>
                @foreach($article->tags as $tag)
                    <a href="{{route("tag.show",$tag->id)}}">
                    <i class="fa fa-tag"></i>{{$tag->name}}</a>
                <!--加个标签链接-->
                @endforeach
                <i class="fa fa-calendar"></i> {{$article->created_at->diffForHumans()}}
                <span class="pull-right">
                                <i class="fa fa-eye"></i> {{$article->view}}
                    <a href="#"><i class="fa fa-comment"></i> {{$article->answer}}</a>
                            </span>


                <hr/>
            </div>

        @endforeach
    </div>

@endsection("content")