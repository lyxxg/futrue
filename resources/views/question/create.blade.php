
<!DOCTYPE html>8
<html lang="zh">
<head>
    <meta charset="utf-8" />
    <title>Simple example - Editor.md examples</title>
    <link rel="stylesheet" href="/editor.md/css/editormd.css" />
    <link rel="stylesheet" href="http://cdn.static.runoob.com/libs/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="http://cdn.static.runoob.com/libs/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    <link rel="shortcut icon" href="/storage/defaultico/qiongmei.jpeg" type="image/x-icon" />
</head>
<body>
<div class="container">
<h1>提问</h1>

<div>
    @foreach($errors->all() as $error)
        <p>{{$error}}</p>
    @endforeach
</div>




    <form action="{{route('question.store')}}" method="post">
    {{csrf_field()}}
    <p>标题：<input type="text" name="title" value="{{old("title")}}" class="form-control" placeholder="标题 至少3个字符 最大30字符"></p>
    <p>问题描述<textarea name="descript"  cols="30"  class="form-control" rows="3" placeholder="问题描述 大概描述你的问题吧 至少5字符 最大100字符">{{old("descript")}}</textarea></p>


        <div>
            @foreach($types as $type)
                <div><h3>{{$type->type_name}}</h3></div>
                <div>
                    @foreach($type->Tags as $tag)
                        <label><input type="checkbox"  @if(in_array($tag->id,old("tag_id",[]))) checked @endif name="tag_id[]" value="{{$tag->id}}">{{$tag->name}}</label>
                    @endforeach
                </div>
            @endforeach
        </div>





    <p><div id="test-editormd">
                <textarea style="display:none;" name="content" >
{{old("content")}}
</textarea>

    </div></p>

    <p><input type="submit" value="提交"></p>
</form>
</div>





<script src="/js/jquery-3.2.1.min.js"></script>
<script src="/editor.md/editormd.min.js"></script>
<script type="text/javascript">
    var testEditor;

    $(function() {
        testEditor = editormd("test-editormd", {
            width   : "90%",
            height  : 640,
            syncScrolling : "single",
            path    : "/editor.md/lib/",
            imageUpload : true,
            imageFormats : ["jpg", "jpeg", "gif", "png", "bmp", "webp","PNG"],
            imageUploadURL : "/upload?_token={{ csrf_token() }}",
        });

    });
</script>
</body>
</html>