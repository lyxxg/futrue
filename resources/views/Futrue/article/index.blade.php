<script type="text/javascript" src="{{asset('futrue/my/myfocus-2.0.4.full.js')}}"></script><!--引入myFocus库-->
@extends('Futrue.layouts.app')
@section("content")
    <script type="text/javascript" src="{{asset('baiduedit/ueditor.parse.js')}}"></script>

    <script>
        uParse('.content', {
            rootPath: '{{asset("baiduedit")}}'
        })
    </script>


    <!-- 焦点图盒子 -->

    <div class="box-body blog">

        <div class="row-fluid">

            <div class="span8">
                <div id="boxID">
                    <!-- 载入中的Loading图片(可选) -->
                    <!-- 内容列表 -->
                    <div class="pic">
                        <ul>
                            @foreach($focus as $focu)
                                <li>
                                    <a href="//{{$focu->href}}">
                                        <img src="{{\Illuminate\Support\Facades\Storage::url($focu->ico)}}" alt="{{$focu->title}}"id="futruefocusimg"  />
                                    </a> </li>
                            @endforeach
                        </ul>
                    </div>
                </div>

                <div class="posts">

                    @foreach($articles as $article)
                        <div class="entry">
                            <h2><a href="#">{{$article->title}}</a></h2>
                            <div class="meta">
                                <a href="{{route('user.index',['user_id'=>$article->user->id])}}">
                                    <img src="{{\Illuminate\Support\Facades\Storage::url($article->user->info->avatar)}}" class="futrue-avatar"
                                         title="点击查看{{$article->user->name}}的资料">
                                </a>
                                <a href="{{route('user.index',['user_id'=>$article->user->id])}}" title="点击查看{{$article->user->name}}的资料">
                                    <i class="fa fa-user" ></i>
                                    {{$article->user->name}}

                                </a>
                                @foreach($article->tags as $tag)
                                    <a href="{{route("tag.show",$tag->id)}}"><i class="fa fa-tag"
                                                                                title="点击查看{{$tag->name}}的介绍"></i>{{$tag->name}}</a>
                                    <!--加个标签链接-->
                                @endforeach
                                <i class="icon-calendar" title="发布于{{$article->created_at->diffForHumans()}}"></i> {{$article->created_at->diffForHumans()}}
                                <span class="pull-right">
                                <i class="fa fa-eye" title="{{$article->view}}"></i> {{$article->view}}
                                    <a href="#"><i class="fa fa-comment"></i> {{$article->answer}}</a>
                            </span>
                            </div>

                            <!-- Thumbnail -->
                            <div class="futre-index">
                                <!-- Para -->
                                {!! $article->content !!}
                            </div>
                            <!--Read more -->
                            <div class="futrue-btn">
                            <a href="{{route('article.show',$article->id)}}" >查看更多</a>
                            </div>
                            </div>
                @endforeach
                <!-- Pagination -->

                    <div class="pagination">
                        <ul>
                            {{$articles->appends(['type'=>request()->get('type','last')])->links()}}
                        </ul>
                    </div>

                </div>
            </div>

            <div class="span4">
                <!-- Sidebar 2 -->

                <div class="blog-sidebar">
                    <!-- Widget -->
                    <div class="widget">
                        <h4>公告</h4>
                        @if($announcement!=null)
                            <span class="announcement">
                        {!!$announcement->content!!}
                      </span>
                        @else
                            暂无公告
                        @endif
                    </div>


                    <div class="widget">
                        <h4>热门榜</h4>
                        <ul>
                            @foreach($questionhots as $questionhot)
                                <li>
                                    <i class="fa fa-paper-plane-o"></i>
                                    <a href="{{route('article.show',$questionhot->id)}}">
                                        {{$questionhot->title}}
                                    </a>
                                </li>

                            @endforeach
                        </ul>
                    </div>





                </div>
            </div>



        </div></div>

    </div>
    </div>

@endsection


<script type="text/javascript">
    myFocus.set({
        id:'boxID',//焦点图盒子ID
        pattern:'mF_dleung',//风格应用的名称
        time:2,//切换时间间隔(秒)
        height:210,
        trigger:'mouseover',//触发切换模式:'click'(点击)/'mouseover'(悬停)
        txtHeight:'30',//文字层高度设置(像素),'default'为默认高度，0为隐藏
        delay:0,
        warp:true,
        });
</script>
<style>
    #vjs_video_4{
        max-width: 100%;
    }

    </style>