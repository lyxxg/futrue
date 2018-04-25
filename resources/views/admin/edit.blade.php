@extends('admin.layouts.app')
@section("content")
    <section class="content-header">
        <h1>
            添加用户
            <small>it all starts here</small>
        </h1>

    </section>

    <!-- Main content -->
    <section class="content">

        <!-- Default box -->
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">添加用户</h3>

                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                            title="Collapse">
                        <i class="fa fa-minus"></i></button>
                    <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
                        <i class="fa fa-times"></i></button>
                </div>
            </div>

            <div class="box-body">

                <form class="form-horizontal" role="form" method="POST" action="{{ route('admin.users.update',[$user->id]) }}">
                    {{ csrf_field() }}
                    {{method_field("put")}}
                    <input type="hidden" name="id" value="{{$user->id}}">

                    <div class="form-group{{ $errors->has('nick') ? ' has-error' : '' }}">
                        <label for="nick" class="col-md-4 control-label">Nick</label>

                        <div class="col-md-6">
                            <input id="name" type="text" class="form-control" name="nick" value="{{ old('nick',$user->info->nick) }}" required autofocus>

                            @if ($errors->has('nick'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('nick') }}</strong>
                                    </span>
                            @endif
                        </div>
                    </div>



                    <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                        <label for="name" class="col-md-4 control-label">Name</label>

                        <div class="col-md-6">
                            <input id="name" type="text" class="form-control" name="name" value="{{ old('name',$user->name) }}" required >

                            @if ($errors->has('name'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                        <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                        <div class="col-md-6">
                            <input id="email" type="email" class="form-control" name="email" value="{{old('email',$user->email)}}" placeholder="email">

                            @if ($errors->has('email'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                            @endif
                        </div>
                    </div>




                    <div class="form-group{{ $errors->has('coins') ? ' has-error' : '' }}">
                        <label for="name" class="col-md-4 control-label">coins</label>

                        <div class="col-md-6">
                            <input id="coins" type="text" class="form-control" name="coins" value="{{ old('coins',$user->info->coins) }}"  >

                            @if ($errors->has('coins'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('coins') }}</strong>
                                    </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                        <label for="password" class="col-md-4 control-label">Password</label>

                        <div class="col-md-6">
                            <input id="password" type="password" class="form-control" name="password" >

                            @if ($errors->has('password'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                            @endif
                        </div>
                    </div>




                    <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
                        <label for="description" class="col-md-4 control-label">描述</label>

                        <div class="col-md-6">
                            <textarea id="description"  class="form-control" name="description" >
{{old('descript',$user->info->description)}}
                            </textarea>

                        @if ($errors->has('description'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('description') }}</strong>
                                    </span>
                            @endif
                        </div>
                    </div>



                    <div class="form-group">
                        <div class="col-md-6 col-md-offset-4">
                            <button type="submit" class="btn btn-primary">
                                确认编辑
                            </button>
                        </div>
                    </div>
                </form>




                </body>
                </html>
                <script src="http://apps.bdimg.com/libs/layer/2.1/layer.js"></script>
                <script src="https://cdn.bootcss.com/jquery/3.2.1/jquery.min.js"></script>
                <script>
                    $(function () {
                        $(".btn-del").click(function () {
                            $(this).siblings("form").submit();//form兄弟元素选择器
                        });
                    });
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