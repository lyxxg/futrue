@extends('admin.layouts.app')
@section("content")
    <section class="content-header">
        <h1>
            文章恢复
            <small>恢复被撤销的文章</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{route('admin.article.index')}}"><i class="fa fa-home"></i> 主页</a></li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">

        <!-- Default box -->
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">文章</h3>

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
                        <td><i class="fa fa-circle">文章号</i></td>
                        <td><i class="fa fa-user">作者</i></td>
                        <td><i class="fa fa-bookmark">标题</i></td>
                        <td><i class="fa fa-eye">阅读量</i></td>
                        <td><i class="fa fa-trash">恢复</i></td>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($articles as $article)
                        <tr>
                            <td>{{$article->id}}</td>
                            <td>{{$article->user_id}}</td>
                            <td>{{str_limit($article->title, 3,'...')}}</td>
                            <td>{{$article->view}}</td>
                            <td>
                                <a href="#" class="btn btn-danger btn-sm btn-del">恢复</a>
                                <form onsubmit="return confirm('您是否确定要恢复该文章？')" action="{{route('admin.article.destroy',[$article->id])}}" method="post">
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


            </div>

            <!-- /.box-body -->
            <div class="box-footer">
                Footer
            </div>
            <!-- /.box-footer-->
        </div>
        <!-- /.box -->
        {{$articles->appends(['type'=>request()->get('type','last')])->links()}}
    </section>



@endsection
@section("js")

    <script src="http://lib.baomitu.com/jquery/3.2.0/jquery.min.js"></script>
    <script>
        $(function(){
            $(".btn-del").click(function () {
                $(this).siblings("form:first").submit();
            });
        });



    </script>