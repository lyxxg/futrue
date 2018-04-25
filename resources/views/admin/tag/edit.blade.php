@extends('admin.layouts.app')
@section("content")
    <section class="content-header">
        <h1>
            编辑标签
            <small>it all starts here</small>
        </h1>

    </section>

    <!-- Main content -->
    <section class="content">

        <!-- Default box -->
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">编辑标签</h3>

                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                            title="Collapse">
                        <i class="fa fa-minus"></i></button>
                    <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
                        <i class="fa fa-times"></i></button>
                </div>
            </div>

            <div class="box-body">

                <form class="form-horizontal" role="form" method="POST" action="{{ route('admin.tag.update',[$tag->id]) }}" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    {{method_field("put")}}
                    <input type="hidden" name="id" value="{{$tag->id}}">
                    <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                        <label for="nick" class="col-md-4 control-label">标签名</label>

                        <div class="col-md-6">
                            <input id="name" type="text" class="form-control" name="name" value="{{ old('name',$tag->name) }}" placeholder="标签名">

                            @if ($errors->has('name'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group{{ $errors->has('type_name') ? ' has-error' : '' }}">
                        <label for="name" class="col-md-4 control-label">标签分类</label>
                        <div class="col-md-6">
                            <input id="type_name" type="text" class="form-control" name="type_name" value="{{ old('type_name',$tag->TagType->type_name) }}"  requiredss>

                            @if ($errors->has('type_name'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('type_name') }}</strong>
                                    </span>
                            @endif
                        </div>
                    </div>



                    <div class="form-group{{ $errors->has('ico') ? ' has-error' : '' }}">
                        <label for="name" class="col-md-4 control-label">标签图标</label>
                        <div class="col-md-6">
                        <input id="icofile" type="file" class="form-control" name="ico" value="{{ old('ico',$tag->ico) }}" onchange="ico2();" style="display:none;" >

                                </div>
                            <img src="{{Storage::url($tag->ico)}}" width="30"  onclick="ico1()"  id="img"/>

                                @if ($errors->has('ico'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('ico') }}</strong>
                                    </span>
                            @endif
                        </div>
                    </div>







                        <div class="form-group{{ $errors->has('baike') ? ' has-error' : '' }}">
                        <label for="description" class="col-md-4 control-label">标签描述</label>

                        <div class="col-md-6">
                            <textarea id="baike"  class="form-control" name="baike" >
{{old('baike',$tag->baike)}}
                            </textarea>

                            @if ($errors->has('baike'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('baike') }}</strong>
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
<script>
    function ico1() {
        //我靠 ico居然是关键字
        //onchange="fileSelected();"
        document.getElementById("icofile").click();
    }

    function ico2() {
        // 文件选择后触发次函数
        var $file = $("#icofile");
        var fileObj = $file[0];
        var windowURL = window.URL || window.webkitURL;
        var dataURL;

        var $img = $("#img");
        if (fileObj && fileObj.files && fileObj.files[0]) {
            dataURL = windowURL.createObjectURL(fileObj.files[0]);
            $img.attr('src', dataURL);

        } else {
            dataURL = $file.val();
            var imgObj = document.getElementById("preview");
            imgObj.style.filter = "progid:DXImageTransform.Microsoft.AlphaImageLoader(sizingMethod=scale)";
            imgObj.filters.item("DXImageTransform.Microsoft.AlphaImageLoader").src = dataURL;
        }
    }


</script>

