@extends('Futrue.layouts.app')
@section("content")
        <div class="js-tab tab" data-config='{
"triggerType":"mouseover",
"effect":"fade",
"invoke":3,
"auto":5000
		}' style="height: 500px;width:82%;overflow:auto">

            <ul class="tab-nav">
                <li class="activend"><a href="#">文章</a></li>
                <li><a href="#">私信</a></li>
                <li><a href="#">系统</a></li>
            </ul>
            <div class="content-wrap">
                <div class="content-item curremt">
                    @foreach($notices as $notice)
                        <div class="meta">
                            <a href="{{route('user.index',['user_id'=>$notice->user_id])}}" class="futrue-user">

                        <img src="{{\Illuminate\Support\Facades\Storage::url($notice->objectUser->info->avatar)}}" class="futrue-avatar"
                             title="点击查看{{$notice->objectUser->info->nick}}的资料">
                            {{$notice->objectUser->info->nick}}
                                        </a>{{$notice->created_at}}</div>

                        @if($notice->action=="answer")
                            回答了你发布的文章
                            <span class="noticearticle"><a href="{{route('article.show',$notice->object_id)}}" >
                                {{str_limit($notice->question->title, 30,'...   ')}}
                            </a>  </span>

                        @elseif($notice->action=="comment")
                            <a href="{{route('article.show',$notice->object_id)}}" >
                                评论了你的回答</a>
                            <a href="">{!!str_limit($notice->answer->content, 30,'...')!!}
                            </a>
                        @else
                            回复了你的评论: {!!str_limit($notice->comment->comment, 30,'...')!!}

                        @endif

                        <hr/>
                    @endforeach

                </div>

                <div class="content-item">
                    @foreach($notice2s as $notice2)
                        <div class="meta">
                            <a href="{{route('user.index',['user_id'=>$notice2->user_id])}}" class="futrue-user">

                                <img src="{{Storage::url($notice2->objectUser->info->avatar)}}" class="futrue-avatar" title="点击查看百度的资料">
                               {{$notice2->objectUser->info->nick}}
                            </a>{{$notice2->created_at}}</div>
                   {!!$notice2->object_notices->msg!!}
                        <hr/>
                    @endforeach

                </div>

                <div class="content-item">
                  暂无
                </div>
            </div>


            <!--tab结束-->

    </div>
    <script src="http://lib.baomitu.com/jquery/3.2.0/jquery.min.js"></script>
    <script>
        $(function(){
            var tab1=new Tab($(".js-tab").eq(0));//获取js-tab的数据
        });
    </script>

    <script src="{{asset('futrue/js/futruetab.js')}}"></script>

@endsection