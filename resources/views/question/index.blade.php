<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Bootstrap 实例 - 悬停表格</title>
    <link rel="stylesheet" href="http://cdn.static.runoob.com/libs/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="http://cdn.static.runoob.com/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="http://cdn.static.runoob.com/libs/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
<div class="table-responsive">
<table class="table">
    <caption>悬停表格布局</caption>
    <thead>
    <tr>
        <th>问题</th>
        <th>标签</th>
        <th>发布时间</th>
        <th>回答数</th>
    </tr>
    </thead>
    <tbody>
    @foreach($questions as $question)
    <tr>
        <td><a href="{{route('question.show',$question->id)}}" title={{$question->title}} target="_blank">{{$question->title}}</a></td>
        <td>@foreach($question->tags as $tag)<span class="label label-info">{{$tag->name}}</span>@endforeach</td>
        <td>{{$question->created_at->diffForHumans()}}</td>
        <td>{{$question->answer}}</td>
    </tr>

        @endforeach
    </tbody>
</table>
</div>
</body>
</html>
<div>
    {{$questions->appends(['type'=>request()->get('type','last')])->links()}}
</div>