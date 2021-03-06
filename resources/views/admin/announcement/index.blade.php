@extends('admin.layouts.app')
@section("content")
    <section class="content-header">
        <h1>
            公告管理
            <small>发布公告 </small>
        </h1>

    </section>

    <!-- Main content -->
    <section class="content">

        <!-- Default box -->
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">发布公告</h3>

                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                            title="Collapse">
                        <i class="fa fa-minus"></i></button>
                    <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
                        <i class="fa fa-times"></i></button>
                </div>
            </div>

            <div class="box-body">
                <form class="form-horizontal" role="form" method="POST" action="{{route('admin.announcement.store') }}">
                    {{ csrf_field() }}




                    <div class="form-group{{ $errors->has('order_id') ? ' has-error' : '' }}">
                        <label for="order_id" class="col-md-4 control-label"></label>

                        <div class="col-md-6">

                            @if ($errors->has('content'))
                                <span class="help-block">
                                            <strong>{{ $errors->first('content') }}</strong>
                                        </span>
                            @endif
                            <script id="container" name="content" type="text/plain">

                            </script>
                            @if ($errors->has('order_id'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('order_id') }}</strong>
                                    </span>
                            @endif
                        </div>
                    </div>



                    <div class="form-group">
                        <div class="col-md-6 col-md-offset-4">
                            <button type="submit" class="btn btn-primary">
                                发布
                            </button>
                        </div>
                    </div>
                </form>


            </div>

        </div>
            </body>
            </html>


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
            initialFrameHeight:150
        });
    </script>

@endsection
@section("js")
