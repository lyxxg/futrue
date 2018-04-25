@extends('Futrue.layouts.app')
@section("content")
    <div class="page-title">
        <h2>反馈<span>未来笔记</span></h2>
    </div>

    <div class="post-foot well">
        <h3>在此输入你对本博客或意见或者建议</h3>
    <hr/>
        <form action="{{route('feedbackdatacl')}}" method="post">
            {{csrf_field()}}

            <script id="container" name="content" type="text/plain">

        </script>
            <button class="btn-primary">提交</button>
        </form>
    </div>
        <script type="text/javascript" src="{{asset('baiduedit/ueditor.config.js')}}"></script>
        <!-- 编辑器源码文件 -->
        <script type="text/javascript" src="{{asset('baiduedit/ueditor.all.js')}}"></script>
        <!-- 实例化编辑器 -->
        <script type="text/javascript">
            var ue = UE.getEditor('container', {
                toolbars: [
                    ['fullscreen','simpleupload', 'insertimage','insertcode','insertvideo' ]
                ],
                autoHeightEnabled: true,
                autoFloatEnabled: true,
            });
        </script>

@endsection("content")