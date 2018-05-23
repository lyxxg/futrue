{{--这里不做了  中间键会废了--}}


@extends('admin.layouts.app')

@section("content")
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            管理员管理
        </h1>
    </section>

    <!-- Main content -->
    <section class="content">

        <!-- Default box -->
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">权限管理</h3>
            </div>
            <div class="box-body">
                <table class="table table-bordered">
                    <thead>
                    <tr>
                  只是改权限的名字
                        <td>编号</td>
                        <td>权限角色</td>
                        <td>操作</td>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($roles as $role)
@endforeach
                    </tbody>
                </table>
            </div>
            <!-- /.box-body -->
        </div>
        <!-- /.box -->
        <a href="{{route("admin.tagtype.create")}}" class="btn btn-success">添加管理员</a>
    </section>
    <!-- /.content -->
@endsection

@section("js")
    <script>
        $(function(){
            $(".btn-del").click(function () {
                $(this).siblings("form:first").submit();
            });
        });

    </script>
@endsection
