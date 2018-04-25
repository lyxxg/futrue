@extends('admin.layouts.app')
@section("content")
    <section class="content-header">
        <h1>
            文章管理
            <small>zz</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Examples</a></li>
            <li class="active">Blank page</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content" onload="a()">

        <!-- Default box -->
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">Title</h3>

                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                            title="Collapse">
                        <i class="fa fa-minus"></i></button>
                    <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
                        <i class="fa fa-times"></i></button>
                </div>
            </div>

            <div class="box-body">

                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <td>编号</td>
                        <td>用户名</td>
                        <td>昵称</td>
                        <td>邮箱</td>
                        <td>操作</td>

                    </tr>
                    </thead>
                    <tbody>
                    @foreach($articles as $article)
                    <tr>
                        <td>{{$tag->id}}</td>
                        <td>{{$tag->name}}</td>
                        <td>{{($tag->TagType->type_name)}}</td>
                        <td><img src="{{Storage::url($tag->ico)}}" width="30" class="img" /></td>
                        <td> <a href="{{route("admin.tag.edit",[$tag->id])}}" class="btn btn-primary btn-sm">编辑</a>
                            <a href="#" class="btn btn-danger btn-sm btn-del">删除</a>
                            <form onsubmit="return confirm('您是否确定要删除该标签？')" action="{{route('admin.tag.destroy',[$tag->id])}}" method="post">
                                {{csrf_field()}}
                                {{method_field('delete')}}
                            </form>

                        </td>

                    </tr>
@endforeach
                    </tbody>
                </table>

                </body>
                </html>
                <script src="https://cdn.bootcss.com/jquery/3.2.1/jquery.min.js"></script>

                <script>
function a() {
                       // $(".btn-del").click(function () {
                       //     $(this).siblings("form:first").submit();
                       // });

alert("1");
                   }

                </script>



            </div>

            <!-- /.box-body -->
            <div class="box-footer">
                Footer
            </div>
            <!-- /.box-footer-->
        </div>
        <!-- /.box -->

    </section>
@endsection
@section("js")
@endsection