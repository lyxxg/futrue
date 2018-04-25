@extends('admin.layouts.app')
@section("content")
    <section class="content-header">
        <h1>
            反馈管理
            <small>反馈 </small>
        </h1>

    </section>

    <!-- Main content -->
    <section class="content">

        <!-- Default box -->
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">文章</h3>

                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                            title="收起">
                        <i class="fa fa-minus"></i></button>
                    <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="关闭">
                        <i class="fa fa-times"></i></button>
                </div>
            </div>

            <div class="box-body">

                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <td><i class="fa fa-circle">编号</i></td>
                        <td><i class="fa fa-user">用户</i></td>
                        <td><i class="fa fa-bookmark">内容</i></td>
                        <td><i class="fa fa-tag">时间</i></td>
                        <td><i class="fa fa-eye">回复</i></td>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($feedbacks as $feedback)
                        <tr>
                            <td title="编号:{{$feedback->id}}">{{$feedback->id}}</td>
                            <td title="账号:{{$feedback->user->name}}">
                                <a href="{{route('user.index',['user_id'=>$feedback->user_id])}}">{{$feedback->user->name}}</a></td>
                            <td title="  {{str_limit($feedback->content, 10,'...')}}">
                                <a href="{{route('article.show',$feedback->content)}}">
                                    {!!str_limit($feedback->content, 30,'...')!!}
                                </a>
                            </td>
                            <td title="反馈时间:{{$feedback ->view}}">{{$feedback->created_at}}</td>
                            <td>
                                <a href="#" class="btn btn-primary btn-sm" title="撤销的文章可以在回收站恢复">回复</a>
                            </td>

                        </tr>
                    @endforeach
                    </tbody>
                </table>

                </body>
                </html>


            </div>

            <!-- /.box-footer-->
        </div>
        <!-- /.box -->
        {{$feedbacks->links()}}
    </section>


@endsection
@section("js")
