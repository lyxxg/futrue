
<!DOCTYPE html>
<html lang="zh">
<head>
    <meta charset="utf-8" />
    <title>Simple example - Editor.md examples</title>
    <link rel="stylesheet" href="css/style.css" />
    <link rel="stylesheet" href="/editor.md/css/editormd.css" />
    <link rel="shortcut icon" href="https://pandao.github.io/editor.md/favicon.ico" type="image/x-icon" />
</head>
<body>
<div id="layout">
    <header>
        <h1>Simple example</h1>
    </header>
    <form action="" method="post">
        {{csrf_field()}}
    <div id="test-editormd">
                <textarea name="content" style="display:none;">#lmx
                    lmx
                </textarea>
    </div>
<input type="submit" value="提交">
    </form>
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
            imageFormats : ["jpg", "jpeg", "gif", "png", "bmp", "webp","jpeg" +
            "" +
            ""],
            imageUploadURL : "/upload?_token={{ csrf_token() }}",
        });

        /*
         // or
         testEditor = editormd({
         id      : "test-editormd",
         width   : "90%",
         height  : 640,
         path    : "/editor.md/lib/"
         });
         */
    });

        /*
        // or
        testEditor = editormd({
            id      : "test-editormd",
            width   : "90%",
            height  : 640,
            path    : "/editor.mdlib/"
        });
        */



</script>
</body>
</html>