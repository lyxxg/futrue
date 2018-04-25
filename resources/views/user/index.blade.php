<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        .img{
            margin-top: 100px;
            width:200px;
             height:auto;
            border-radius:20px;
        }

    </style>
</head>
<body>
<div class="container">

    <p>头像<img src="{{Storage::url($user->info->avatar)}}" width="100" class="img" /></p>
    <p>用户名{{$user->info->nick}}</p>
    <p>邮箱{{$user->email}}</p>

</div>
</body>
</html>