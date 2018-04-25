@extends('Futrue.layouts.app')

@section("content")
    <div class="row">
        @foreach($errors->all() as $error)
            {
            {{$error}}
            }
        @endforeach
    </div>
    <h2>资料修改</h2>


    <form action="{{route('user.update',$user->id)}}"  method="post" enctype="multipart/form-data">
        {{csrf_field()}}
        {{method_field("put")}}
        <input type="hidden" name="id" value="{{$user->id}}">
        <div class="form-group">
            <label for="nick">点击头像可更换头像</label>

            <input type="file" class="form-control"  name="avatar" value="" placeholder="头像" style="display: none"
                   id="icofile"      onchange="ico2();">
            <div class="avatar">

                <img  src="{{\Illuminate\Support\Facades\Storage::url($user->info->avatar)}}" class="avatar1"
                      style="width: 13em;height: 13em;border-radius:50%;	box-shadow:2px 2px 2px yellow;overflow: hidden;"  id="img"
                onclick="ico1()"></div>
        </div>



        <div class="form-group">
            <label for="nick">昵称</label>
            <input type="text" class="useredit" id="nick" name="nick" class="input-large" value="{{old('nick',$user->info->nick)}}" placeholder="昵称"
            style="height:34px;width: 80%;color: green";>
        </div>

个性签名
        <textarea class="form-control" name="description" rows="3">{{old('nick',$user->info->description)}}</textarea>

        <div class="control-group">
            <label class="control-label" for="select">性别</label>
            <div class="controls">
                <select name="sex">
                    <span style="display: none"></span>
                    <span style="display: none">{{$sex=$user->info->sex}}</span>
                    <option>
                    @if($sex==0)
                        女
                        @elseif($sex==1)
                            else 男
                    @else
                        保密
                    @endif
                    @foreach($sexs as $sex1)
                        <option>{{$sex1}}</option>
                   @endforeach
                </select>
            </div>
        </div>


        <div class="form-group">
            <label for="old_password">旧密码</label>
            <input type="password" class="form-control" id="old_password" name="old_password" placeholder="旧密码"
                   style="height:34px;width: 80%;color: green";>
        </div>
        <div class="form-group">
            <label for="password" >新密码</label>
            <input type="password" class="form-control" id="password" name="password" style="height:34px;width: 80%;color: green"placeholder="新密码">
        </div>
        <div class="form-group">
            <label for="password_confirmation">确认密码</label>
            <input type="password" class="form-control" id="password_confirmation" name="password_confirmation"style="height:34px;width: 80%;color: green";  placeholder="确认密码">
        </div>




        <button type="submit" class="btn btn-default">确认修改</button>
    </form>

@endsection()
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

