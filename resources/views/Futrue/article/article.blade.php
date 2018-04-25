
@extends('Futrue.layouts.app')
@section("content")
    <div class="box-body blog">
        <div class="row-fluid">

            <div class="span8">
                <div class="posts">

                    <!-- Each posts should be enclosed inside "entry" class" -->
                    <!-- Post one -->
                    <div class="entry">
                        <h2><a href="#">{{$article->title}}</a></h2>
                        <!-- Meta details -->
                        <div class="meta">
                            <a href="{{route('user.index',['user_id'=>$article->user->id])}}">
                                <img src="{{\Illuminate\Support\Facades\Storage::url($article->user->info->avatar)}}" class="futrue-avatar"
                                     title="点击查看{{$article->user->info->nick}}的资料">

                                <i class="fa fa-user" title="点击查看{{$article->user->info->nick}}的资料"></i> {{$article->user->info->nick}}</a>
                            @foreach($article->tags as $tag)
                                <a href="{{route("tag.show",$tag->id)}}"><i class="fa fa-tag"></i>{{$tag->name}}</a>
                                <!--加个标签链接-->
                            @endforeach

                            <i class="icon-calendar" title="发布于{{$article->created_at->diffForHumans()}}"></i>
                            {{$article->created_at->diffForHumans()}}
                            <span class="pull-right">
                            <i class="fa fa-eye" title="{{$article->view}}"></i> {{$article->view}}
                                <a href="#"><i class="fa fa-comment"></i> {{$article->answer}}</a>
                                <a href="#"><i class="fa fa-star"></i> {{$article->collection}}</a>

                        </div>
                        <!-- Thumbnail -->
                        <div class="bthumb">

                            {!! $article->content !!}                        </div>
                    </div>
                    <span style="display: none">{{$result=\App\Models\Collection::all()->whereIn('user_id',\Illuminate\Support\Facades\Auth::id())->whereIn('question_id',$article->id)}}
                    </span>

                    <form action="{{route('user.collection',['article'=>$article])}}" method="post">
                        {{csrf_field()}}

                    @if($result->first()!=null)
                            <button class="futrue-collection" title="感谢你的收藏 有{{$article->collection}}
                                    人和你一样明智的收藏了">
                                <img src="{{asset('/futrue/img/ico/22.gif')}}" class="futrue-collection-ico">
                            </button>

@else
                            <button class="futrue-collection">
                                <img src="{{asset('/futrue/img/ico/33.gif')}}" class="futrue-collection-ico" title="为什么你还不点收藏 快点我">

                            </button>
                        @endif
                    </form>
                    <div class="post-foot well">
                        <!-- Social media icons -->
                        <div class="social">

                            <a class="jiathis_button_cqq"><i class="fa fa-qq"></i></a>
                            <a class="jiathis_button_weixin"><i class="fa fa-wechat"></i></a>
                            <a class="jiathis_button_qzone"><i class="fa fa-star"></i></a>


                            <a href="#"><i class="icon-google-plus google-plus"></i></a>
                        </div>
                    </div>

                    <hr />

                    <!-- Comment section -->

                    <div class="comments">

                        <div class="title"><h5>{{$article->answer}}回答</h5></div>

                        <ul class="comment-list">
                            <!--回答内容-->
                            @foreach($article->answers as $answer)
                                <li class="list-group-item">

                                    <ul class="comment">
                                        <a class="pull-left" href="#">
                                            <a href="{{route('user.index',['user_id'=>$answer->user->id])}}">
                                            <img class="avatar" src="{{Storage::url($answer->user->info->avatar)}}"
                                           style="border:solid 2px grey;height: 3em;width: 3em;text-decoration : none;cursor:url('http://127.0.0.1/futrue/public/futrue/ico/avatar.png'),auto;" title="{{$answer->user->info->nick}}">
                                            </a>
                                            @if($answer->user->id==$article->user->id)<span class="commentuser" title="这是作者 ">(作者)</span>  @endif


                                        </a>
                                        <a href="{{route('user.index',['user_id'=>$answer->user->id])}}"  title="{{$answer->user->info->nick}}">
                                        <div class="comment-author">{{$answer->user->info->nick}}</div>
                                        </a>

                                        <div class="cmeta" title="发布于{{$answer->created_at->diffForHumans()}}">{{$answer->created_at->diffForHumans()}}</div>
                                        <p  >
                                           <div data-answer-id="{{$answer->id}}" data-answer-id={{$answer->id}} data-typearticle="comment"  data-belog="1" onclick="msgbox(1,this)">
                                            @if($article->status==0&&Auth::id()==$article->user_id)
                                                <form action="{{route('answer.accept',['question_id'=>$article->id,'answer_id'=>$answer->id])}}" method="post">
                                                    {{csrf_field()}}
                                                    <input type="submit" class="btn btn-warning" value="采纳" title="我觉得不错">
                                                </form>
                                            @endif

                                            <!--回答的-->{!! $answer-> content!!}
                 </div>
                                        @if($answer->accept==1)
                                            <span style="color:red">已采纳</span>
                                        @endif

                                        <div class="goodandbad">
@if(\App\Models\Answergoodandbad::all()->whereIn('user_id',Auth::id())->whereIn('answer_id',$answer->id)->first()!=null)
                                        <i class="fa fa-thumbs-up" id="futrue-thumbs{{$answer->id}}" data-answer-id="{{$answer->id}}"  onclick="good(this);" title="感觉牛皮 已经给他赞了">
                                            {{$answer->good}}</i>
                                            @else
    {{--还没有点赞的时候--}}
                                                <i class="fa fa-thumbs-o-up"  data-answer-id="{{$answer->id}}"  onclick="good(this);" id="futrue-thumbs{{$answer->id}}" title="感觉牛皮 别拦我 我要点赞{{$answer->user->info->nick}}">
                                                    {{$answer->good}}</i>
                                            @endif

{{--踩--}}
    @if(\App\Models\Bad::all()->whereIn('user_id',Auth::id())->whereIn('answer_id',$answer->id)->first()!=null)

                                            <i class="fa fa-thumbs-down" id="futrue-bad{{$answer->id}}" data-answer-id="{{$answer->id}}" onclick="bad(this);"
                                            title="好像错怪了  取消踩">
                                                {{$answer->bad}}
                                            </i>
@else
        <i class="fa fa-thumbs-o-down" id="futrue-bad{{$answer->id}}" data-answer-id="{{$answer->id}}" onclick="bad(this);"
        title="渣渣 什么鬼回答 踩">
            {{$answer->bad}}
        </i>
    @endif
                                        </div>
                                            </p>
                                    </ul>
                                    </ul>

                                        <div class="clearfix"></div>


                                    </ul>
                                    <!--评论者-->
                                @foreach($answer->comments as $comment)

                                    <li class="comment reply">
                                        <a class="pull-left" href="#">
                                            <a href="{{route('user.index',['user_id'=>$comment->user->id])}}">
                                                <img class="avatar" src="{{Storage::url($comment->user->info->avatar)}}" content="futrue-avatar"
                                            style="border:solid 2px grey;height: 3em;width: 3em;text-decoration : none;cursor:url('http://127.0.0.1/futrue/public/futrue/ico/avatar.png'),auto;">
                                            </a>
                                        </a>
                                        <div class="comment-author"><a href="#">{{$comment->user->info->nick}}
                                            </a>        @if($comment->user->id==$article->user->id)<span class="commentuser">(作者)</span>  @endif
                                        </div>
                                        <div class="cmeta">{{$comment->create}}</div>
                                        <div data-comment-id="{{$comment->id}}" data-answer-id={{$answer->id}}  data-typearticle="reply" data-belog="0" onclick="msgbox(1,this)">

                                         @if($comment->belog==1)
   {!!$comment->comment!!}</div>

                                    @else
                                        <!--评论的-->
                                            {!!"<span style='color:gren'>回复</span>".'<span class="user-comment">'.$comment->fathercomment->user->info->nick!!}</span>

                            {!!$comment->comment!!}</div>

                                    @endif
                                    </li>

                                        <div class="clearfix"></div>
                                    </li>
                                @endforeach





                                    </li>
                                    @endforeach
                        </ul>

                        </ul>
                    </div>
                @if (Auth::guest())<!--如果没有登陆-->
                    <div class="respond well">
                        <div class="title"><h5>你未登录 无法
                                <span class="futrueout">回答/评论/回复</span>
                                <a href="{{route('login')}}" class="futruelogin">登录</a>或
                                <a href="{{route('register')}}" class="futruelogin">注册</a></h5>


                        </div>
                    </div>
                    @else
                        <hr/>
                        <h3>回答</h3>



                        <form action="{{route('answer.store')}}" method="post">
                            {{csrf_field()}}
                            <input type="hidden" name="question_id" value="{{$article->id}}">
                            <script id="container" name="content" type="text/plain">
                            </script>
                            <button class="btn btn-primary">回答</button>
                        </form>



                @endif



                <!---回复的表单提交-->

                    <form id="futrue_comment" action="{{route('comment.store')}}" method="post">
                        {{csrf_field()}}
                        <div id='futrue-commentinput' class="futrue-box" >
                            <a class='futrue-x' href=''; onclick="msgbox(0,this); return false;">关闭</a>
                            <input type="hidden" id="belog" name="belog" value="">
                            <input type="hidden" id="type_article" name="type_article" value="">
                            <input type="hidden" id="answer_id" name="answer_id" value="">
                            <input type="hidden" id="comment_id" name="comment_id" value="">
                            <script id="reply" name="comment" type="text/plain">
                            </script>
                            <button class="btn btn-info" >回复</button>

                        </div>

                    </form>
                    <!-- Navigation -->



                    <div class="clearfix"></div>

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


                    <div class="widget">
                        <h4>提示</h4>
                        <ul>
                                <li>
                                    <i class="fa fa-paper-plane-o"></i>
                                点击用户发送的内容  可以回复/评论
                                 </li>

                        </ul>
                    </div>



                </div>
            </div>



        </div></div>

    </div>
    </div>

        </div>


    </div>
    <script type="text/javascript" src="http://v3.jiathis.com/code/jia.js?uid=1" charset="utf-8"></script>

    <script type="text/javascript" src="{{asset('baiduedit/ueditor.config.js')}}"></script>
    <!-- 编辑器源码文件 -->
    <script type="text/javascript" src="{{asset('baiduedit/ueditor.all.js')}}"></script>
    <!-- 实例化编辑器 -->
    <script type="text/javascript" src="{{asset('futrue/js/futrue.js')}}"></script>


@endsection
