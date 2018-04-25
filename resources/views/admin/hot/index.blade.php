@extends('admin.layouts.app')
@section("content")
    <section class="content-header">
        <h1 title="文章热度">
            文章热度管理
            <small title="文章热度">前15热度文章</small>
        </h1>
        <ol class="breadcrumb">
            <li title="主页">
                <a href="{{route('admin.article.index')}}"><i class="fa fa-home"></i>
                    主页</a></li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">

        <!-- Default box -->
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">热门文章</h3>

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

                        <td>排名</td>
                        <td><i class="fa fa-circle">文章号</i></td>
                        <td><i class="fa fa-user">作者</i></td>
                        <td><i class="fa fa-bookmark">标题</i></td>
                        <td><i class="fa fa-eye">阅读量</i></td>
                        <td><i class="fa fa-trash">置顶</i></td>
                    </tr>
                    </thead>
                    <tbody>
                    <span style="display: none">{{$hot=1}}</span>
                    @foreach($articles as $article)
                        <tr>
                            <td title="$hot">{{$hot++}}</td>
                            <td title="未来号:{{$article->id}}">{{$article->id}}</td>
                            <td title="编写者:{{$article->user->info->nick}}"><a href="{{route('user.index',['user_id'=>$article->user->id])}}">{{$article->user->info->nick}}</a></td>
                            <td title="{{$article->title}}">
                                <a href="{{route('article.show',$article->id)}}">
                                    {{str_limit($article->title, 6,'...')}}
                                </a>
                            </td>

                            <td title="阅读量:{{$article->view}}">{{$article->view}}</td>
                            <td>
                                <a href="#" class="btn btn-primary btn-sm btn-del" title="置顶{{$article->title}}">置顶</a>
                                <form onsubmit="return confirm('您是否确定要撤销该文章？')" action="{{route('admin.article.destroy',[$article->id])}}" method="post">
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