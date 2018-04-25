@extends('Futrue.layouts.userapp')
@section("content")
    <section id="experience" class="timeline">
            <h2></h2>

       @foreach($articlehistorys as $article)
            {{$article->created_at}}
               <div class="message-item" id="m5">
            <div class="message-inner">
                <div class="msage-heades clearfix">
                            <div class="user-detail">
                                <a href="{{route('article.show',$article->id)}}"><h5 class="handle">{{$article->title}}</h5></a>
                                <div class="post-meta">
                                    <div class="asker-meta">
                                        <span class="qa-message-what"></span>
                                        <span class="qa-message-when">
												<span class="qa-message-when-data">{{$article->view}}</span>
											</span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="qa-message-content">
                            {{$article->descript}}
                        </div>
                    </div></div>

@endforeach



@endsection
