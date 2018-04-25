@extends('Futrue.layouts.userapp')
@section("content")
    <section id="experience" class="timeline">
        <h2></h2>
        收藏时间:
        @foreach($collections as $collection)
          {{$collection->created_at}}
            <div class="message-item" id="m5">
                <div class="message-inner">
                    <div class="msage-heades clearfix">
                        <div class="user-detail">
                            <a href="{{route('article.show',$collection->question->id)}}"><h5 class="handle">{{$collection->question->title}}</h5></a>
                            <div class="post-meta">
                                <div class="asker-meta">
                                    <span class="qa-message-what"></span>
                                    <span class="qa-message-when">
												<span class="qa-message-when-data">{{$collection->question->view}}</span>
											</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="qa-message-content">

                    </div>
                </div></div>

    @endforeach



@endsection
