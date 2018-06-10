@extends('admin.layouts.app')
@section("content")
    <section class="content-header">
        <h1 title="这里用户">
            用户管理
            <small title="小黑屋的用户可以在回收站恢复">全部文章</small>
        </h1>
        <ol class="breadcrumb">
            <li title="主页"><a href="{{route('admin.article.index')}}"><i class="fa fa-home"></i>
                    主页</a></li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">

        <!-- Default box -->


            <div class="box-body">

                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <td><i class="fa fa-circle">用户编号</i></td>
                        <td><i class="fa fa-user">用户名</i></td>
                        <td><i class="fa fa-bookmark">昵称</i></td>
                        <td><i class="fa fa-tag">头像</i></td>
                        <td><i class="fa fa-eye">积分</i></td>
                        <td><i class="fa fa-trash">操作</i></td>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($users as $user)
                        <tr>
                            <td title="用户编号:{{$user->id}}">{{$user->id}}</td>
                            <td title="用户名:{{$user->name}}">
                                <a href="{{route('user.index',['user_id'=>$user->id])}}">
                                    {{$user->name}}</a></td>
                            <td title="{{$user->info->nick}}">
                                <a href="{{route('user.index',['user_id'=>$user->id])}}">
                                    {{str_limit($user->info->nick, 6,'...')}}
                                </a>
                            </td>
                            <td>
                                <img src="{{Storage::url($user->info->avatar)}}" width="30px">

                            </td>

                            <td title="积分:{{$user->info->coins}}">{{$user->info->coins}}</td>
                            <td>
                   @if(!in_array($user->id,$bannedarr))
                                <a href="#" class="btn btn-danger btn-sm btn-del" title="小黑屋">小黑屋</a>
                                <form onsubmit="return confirm('您是否确定要将该用户加入小黑屋')" action="{{route('admin.banneduser.destroy',$user->id)}}" method="post">
                                    {{csrf_field()}}
                                    {{method_field('delete')}}
                                </form>

                                @else
                                    <a href="#" class="btn btn-primary btn-sm btn-del" title="放出小黑屋">放出小黑屋</a>
                                    <form onsubmit="return confirm('您是否确定要将该用户放出小黑屋?')" action="{{route('admin.banneduser.destroy',$user->id)}}"  method="post">
                              <input type="hidden" value="1" name="status">
                                        {{csrf_field()}}
                                        {{method_field('delete')}}
                                    </form>
                                @endif
                       <a href="#" class="btn btn-primary btn-sm btn-add" title="添加到管理员">添加到管理员</a>
                       <form onsubmit="return confirm('您是否确定要将该用户添加到管理员')" action="{{route('admin.roles.store',$user->id)}}"  method="post">
                           {{csrf_field()}}
                      <input type="hidden" value="{{$user->id}}" name="user_id">
                           {{method_field('post')}}
                       </form>

                            </td>

                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>

        </div>
        </body>
        </html>

        @endsection
        @section("js")

            <script src="http://lib.baomitu.com/jquery/3.2.0/jquery.min.js"></script>
            <script>
                $(function(){
                    $(".btn-del").click(function () {

                        $(this).siblings("form:first").submit();
                    });
                });


                $(function () {
                    $(".btn-add").click(function () {
                        $(this).siblings("form:last").submit();
                    })
                })


            </script>