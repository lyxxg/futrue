@extends('admin.layouts.app')
@section("content")
    <section class="content-header">
        <h1 title="这里管理焦点图">
            焦点图
            <small title="焦点图">Focus</small>
        </h1>
        <ol class="breadcrumb">
            <li title="主页"><a href="{{route('admin.article.index')}}"><i class="fa fa-home"></i>
                    主页</a></li>
        </ol>
    </section>
    <span style="display: none">{{$i=1}}</span>

        <!-- Main content -->
    <form action="{{route('admin.focus.store')}}" method="post" enctype="multipart/form-data">
        @foreach($focus as $focu)

        {{csrf_field()}}
            <section class="content adminfutrue">
                            <!-- general form elements -->
            <input type="hidden" value="{{$focu->id}}" name="id{{$focu->id}}">
                            <div class="box box-primary">
                                <div class="box-header with-border">
                                    <h3 class="box-title">焦点图{{$i++}}</h3>
                                </div>
                                <!-- /.box-header -->
                                <!-- form start -->
                                    <div class="box-body">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">标题</label>
                                            <input type="text" class="form-control" id="exampleInputEmail1" placeholder="标题"
                                            value="{{$focu->title}}" name="titles[]">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">链接</label>
                                            <input type="text" class="form-control" id="exampleInputPassword1" placeholder="链接"
                                            value="{{$focu->href}}" name="hrefs[]">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputFile">上传焦点图</label>
                                            <input type="file" id="exampleInputFile{{$i}}" value="{{$focu->ico}}"
                                            name="icos{{$i-1}}">

<img src="{{\Illuminate\Support\Facades\Storage::Url($focu->ico)}}" class="admin-futrue-focus" style="max-height: 2%;max-width: 5%" onclick="icoadmin{{$i}}()">
                                            <p class="help-block">请点击上方上传焦点图</p>
                                        </div>
                                    </div>
                                    <!-- /.box-body -->


                            </div>
        </section>
            <script>

                function icoadmin{{$i}}(){
                    document.getElementById("exampleInputFile{{$i}}").click();
                }

            </script>
        @endforeach

    <div class="box-footer">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>


        </form>

        </body>
        </html>

        @endsection
        @section("js")

