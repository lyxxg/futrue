<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- 上述3个meta标签*必须*放在最前面，任何其他内容都*必须*跟随其后！ -->
    <title>Bootstrap 101 Template</title>

    <!-- 最新版本的 Bootstrap 核心 CSS 文件 -->
    <link rel="stylesheet" href="https://cdn.bootcss.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <!-- 可选的 Bootstrap 主题文件（一般不用引入） -->
    <script src="https://cdn.bootcss.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://cdn.bootcss.com/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>
<div class="container">
    <div class="row">
        @foreach($errors->all() as $error)
            {
            {{$error}}
            }
        @endforeach
    </div>
    <h1>你好，世界！</h1>
    <form action="" method="post" method="post" enctype="multipart/form-data">
        {{csrf_field()}}
        {{method_field("put")}}
        <input type="hidden" name="id" value="{{$user->id}}">
        <div class="form-group">
            <label for="nick">昵称</label>
            <input type="text" class="form-control" id="nick" name="nick" value="{{old('nick',$user->info->nick)}}" placeholder="昵称">
        </div>
        <div class="form-group">
            <label for="email">邮箱</label>
            <input type="email" class="form-control" id="email" name="email" value="{{old('email',$user->email)}}" placeholder="email">
        </div>


        <textarea class="form-control" name="description" rows="3">{{old('nick',$user->info->description)}}</textarea>


        <div class="form-group">
            <label for="old_password">旧密码</label>
            <input type="password" class="form-control" id="old_password" name="old_password" placeholder="旧密码">
        </div>
        <div class="form-group">
            <label for="password">新密码</label>
            <input type="password" class="form-control" id="password" name="password" placeholder="新密码">
        </div>
        <div class="form-group">
            <label for="password_confirmation">确认密码</label>
            <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" placeholder="确认密码">
        </div>

        <div class="form-group">
            <label for="avatar">选择头像</label>
            <input type="file" id="avatar" name="avatar">
            <p class="help-block">选择头像</p>
        </div>





        <button type="submit" class="btn btn-default">确认修改</button>
    </form>
</div>





</body>
</html>



<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://cdn.bootcss.com/jquery/1.12.4/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<!-- 最新的 Bootstrap 核心 JavaScript 文件 -->
<script src="https://cdn.bootcss.com/bootstrap/3.3.7/js/bootstrap.min.js" ></script>