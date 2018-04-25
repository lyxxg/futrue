@extends('admin.layouts.app')

@section("content")
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            标签分类列表
        </h1>
    </section>

    <!-- Main content -->
    <section class="content">

        <!-- Default box -->
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">标签分类列表</h3>
            </div>
            <div class="box-body">
                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <td>编号</td>
                        <td>标签分类名</td>
                        <td>操作</td>
                    </tr>
                    </thead>
                    <tbody>

                    @foreach($tagTypes as $tagType)
                        <tr>
                            <td>{{$tagType->id}}</td>
                            <td>{{$tagType->type_name}}</td>
                            <td> <a href="{{route("admin.tagtype.edit",[$tagType->id])}}" class="btn btn-warning btn-sm">编辑</a>
                                <a href="#" class="btn btn-danger btn-sm btn-del">删除</a>
                                <form onsubmit="return confirm('您是否确定要删除该标签？')" action="{{route('admin.tagtype.destroy',[$tagType->id])}}" method="post">
                                    {{csrf_field()}}
                                    {{method_field('delete')}}
                                </form>

                               </td>

                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            <!-- /.box-body -->
        </div>
        <!-- /.box -->
        <a href="{{route("admin.tagtype.create")}}" class="btn btn-success">添加标签分类</a>
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
