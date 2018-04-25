<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<div>
    张三回答了你的问题
    <ul>
        @foreach($notices as $notice)
        <li>
            {{$notice->object_UserInfo->info->nick}}
            @if($notice->action=="answer")
                回-答了您的问题<span style="color: #adadad;">
                    <a href='question/{{$notice->object_question_id}}'>{{$notice->question->title}}></span>
            @elseif($notice->action=="comment")
                评论了关于您<span style="color: #adadad;">
                    {{$notice->comment->question->title}}></span>的答案  </li>
	        @elseif($notice->action=="reply")

            @endif
        @endforeach
    </ul>
</div>

</body>
</html>