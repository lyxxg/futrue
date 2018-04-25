<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>{{$question->title}}</title>
    <link rel="stylesheet" href="/editor.md/css/editormd.css" />
    <link rel="stylesheet" href="/editor.md/logo.css" />
    <link rel="stylesheet" href="http://cdn.static.runoob.com/libs/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="http://cdn.static.runoob.com/libs/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
<div class="container">
    <h3>{{$question->title}}</h3>

<div>发布者:{{$question->user->info->nick}} 发布时间:{{$question->created_at}} 浏览量:{{$question->view or 0}}</div>
<div>
    {!!$question->content !!}

</div>
    <div>
        <h3>回答</h3>
        <form class="form" action="{{route('answer.store')}}" method="post">
            {{csrf_field()}}
            <input type="hidden" name="question_id" value="{{$question->id}}">
            <div><textarea name="content" id="" rows="" class="form-control"></textarea></div>
            <div><button class="btn btn-primary">提交</button></div>
        </form>
    </div>
    <div class="row">
    <ul class="list-group">
    @foreach($question->answers as $answer)

        <li class="list-group-item">
            @if($answer->accept==1)
                <span style="color:red">已采纳</span>
            @endif

            <div><span>回答人:{{$answer->user->info->nick}}</span><span>回答时间:{{$answer->created_at}}</span></div>
            <div>
                回答内容:{!! $answer->content !!}
            </div>


            @if($question->status==0)
            <form action="{{route('answer.accept',['question_id'=>$question->id,'answer_id'=>$answer->id])}}" method="post">
                {{csrf_field()}}
                <input type="submit" class="btn btn-warning" value="采纳">
            </form>

@endif
                <div>
                    <a href="#" class="btn btn-sm btn-primary" data-answer-id={{$answer->id}} onclick="comment(this)">评论</a>
                </div>
                <div>
                    <ul class="list-group">
                        {{--{{dd(tree($answer->comments->toArray()))}}--}}

                    @foreach(tree($answer->comments) as $comment)

                        <li class="list-group-item">
                            <div><span>{{$comment->user->info->nick}}:</span>{{$comment->comment}}</div>
                            <div>
                                <a href="#" class="btn btn-sm btn-primary" date-answer-id="{{$comment->id}}" data-answer-id={{$answer->id}} onclick="comment(this)">回复</a>
                            </div>
 @if(isset($comment['sub']))
                            @foreach($comment['sub'] as $comment1)
     <ul cla="list-group">
         <li class="list-group-item">
             <div><span>{{$comment1->user->info->nick}}:</span>{{$comment1->comment}}</div>

         </li>
     </ul>
     @endforeach
@endif
                        </li>
                            @endforeach
                    </ul></div>
        </li>
        @endforeach

    </ul>

    </div>
</div>
<form  id="comment_form" action="{{route('comment.store')}}" method="post" style="display: none;">
{{csrf_field()}}

    <input type="hidden" name="answer_id" value="">
    <input type="hidden" name="comment_id" value="">

    <div><textarea name="comment" id="" class="form-control">
                        </textarea></div>
    <div><input type="submit" value="提交" class="comment_btn btn btn-warning"></div></form>



</body>
</html>
<script>
    function comment(obj) {

        var answer_id = $(obj).attr("data-answer-id");
        var comment_id = $(obj).attr("data-comment-id")?$(obj).attr("data-comment-id"):0;
        $("#now_form").siblings("a:first").css("display","inline-block");

        $("#now_form").remove();

        $(obj).css("display","none");
        var comment_from = $("#comment_form").clone();
  // $(comment_from).removeAttr("id");
        $(comment_from).attr("id","now_form");
        $(comment_from).css("display","block");
        $(comment_from).find("input[name='comment_id']").val(comment_id);
        $(comment_from).find("input[name='answer_id']").val(answer_id);
        $(obj).parent().append(comment_from);
    }
</script>

