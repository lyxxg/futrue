
@extends('Futrue.layouts.app')
@section("content")
    <div class="page-title">
        @foreach($msgs as $msg)
            <ul class="comment-list">
                <li class="comment reply">
                    <a class="pull-left" href="#">
                        <img class="avatar" src="{{\Illuminate\Support\Facades\Storage::url($msg->user->info->avatar)}}" content="futrue-avatar" style="border:solid 2px grey;height: 3em;width: 3em;text-decoration : none;cursor:url('http://127.0.0.1/futrue/public/futrue/ico/avatar.png'),auto;">
                    </a>
                    <div class="comment-author"><a href="#">{{$msg->user->info->nick}}
                        </a>        <span class="commentuser" title="{{$msg->created_at}}">
                            {{ date('h:m',strtotime($msg->created_at))}}
                        </span>                                          </div>
                    <div class="cmeta"></div>
                    <div data-comment-id="11" data-answer-id="5" data-typearticle="reply" data-belog="0" onclick="msgbox(1,this)">
{!!$msg->msg!!}
                        </div>

                </li>

                <hr/>
            </ul>
                @endforeach
    </div>
    <form action="{{route('msg.store',$user_object_id)}}" method="post">
        {{csrf_field()}}
<input type="hidden" name="user_object_id" value="{{$user_object_id}}">
        <script id="container" name="content" type="text/plain" class="futrue-editor">

        </script>
        <button class="btn-primary">提交</button>
    </form>

    <script type="text/javascript" src="{{asset('baiduedit/ueditor.config.js')}}"></script>
    <!-- 编辑器源码文件 -->
    <script type="text/javascript" src="{{asset('baiduedit/ueditor.all.js')}}"></script>
    <!-- 实例化编辑器 -->
    <script type="text/javascript">
        var ue = UE.getEditor('container', {
            toolbars: [
                ['simpleupload' ]
            ],
            autoHeightEnabled: true,
            autoFloatEnabled: true
        });
    </script>

@endsection