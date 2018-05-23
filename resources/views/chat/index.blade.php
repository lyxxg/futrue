<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>HTML5模拟微信聊天界面</title>

    <style>
        /**重置标签默认样式*/
        * {
            margin: 0;
            padding: 0;
            list-style: none;
            font-family: '微软雅黑'
        }
        #container {
            width: 100%;
            height: 6%;
            background: #eee;
            position: relative;
            box-shadow: 20px 20px 55px #777;
        }
        .header {
            background: #000;
            height: 40px;
            color: #fff;
            line-height: 34px;
            font-size: 20px;
            padding: 0 10px;
        }
        .footer {
            width: 430px;
            height: 50px;
            background: #666;
            position: absolute;
            bottom: 80;
            padding: 10px;
        }
        .footer input {
            width: 275px;
            height: 45px;
            outline: none;
            font-size: 20px;
            text-indent: 10px;
            position: absolute;
            border-radius: 6px;
            right: 80px;
        }
        .footer span {
            display: inline-block;
            width: 62px;
            height: 48px;
            background: #ccc;
            font-weight: 900;
            line-height: 45px;
            cursor: pointer;
            text-align: center;
            position: absolute;
            right: 10px;
            border-radius: 6px;
        }
        .footer span:hover {
            color: #fff;
            background: #999;
        }
        #user_face_icon {
            display: inline-block;
            background: red;
            width: 60px;
            height: 60px;
            border-radius: 30px;
            position: absolute;
            bottom: 6px;
            left: 14px;
            cursor: pointer;
            overflow: hidden;
        }
        img {
            width: 60px;
            height: 60px;
        }
        .content {
            font-size: 20px;
            width: 435px;
            height:500px;
            overflow: auto;
            padding: 5px;
        }
        .content li {
            margin-top: 10px;
            padding-left: 10px;
            width: 412px;
            display: block;
            clear: both;
            overflow: hidden;
        }
        .content li img {
            float:left;
        }
        .content li span{
            background: #7cfc00;
            padding: 10px;
            border-radius: 10px;
            float:left;
            margin: 6px 10px 0 10px;
            max-width: 70%;
            border: 1px solid #ccc;
            box-shadow: 0 0 3px #ccc;
            word-break: break-all;
        }


        @media screen and (max-device-width: 400px){

            .content {
                font-size: 20px;
                width: 200px;
                height:1000px;
                overflow: auto;
                padding: 5px;
            }
        }
    </style>

</head>
<body>
<div id="container">
    <div class="header">
        <span style="float: left;">未来笔记聊天室</span>
        <span style="display: none" id="token">{{csrf_token()}}</span>

        <span style="float: right;">14:21</span>
    </div>
    <ul class="content">

    </ul>
    <div class="footer">

        <div id="user_face_icon">
            <img src="http://www.xttblog.com/icons/favicon.ico" alt="">
        </div>
        <input id="text" type="text" placeholder="说点什么吧...">
        <span id="btn">发送</span>
    </div>
</div>
</body>
</html>
<script>
    var last_id=1;
    var token=document.getElementById("token").innerHTML;
    var arrIcon = ['http://www.xttblog.com/icons/favicon.ico','http://www.xttblog.com/wp-content/uploads/2016/03/123.png'];
    var num = 0;     //控制头像改变
    var iNow = -1;    //用来累加改变左右浮动
    var icon = document.getElementById('user_face_icon').getElementsByTagName('img');
    var btn = document.getElementById('btn');
    var text = document.getElementById('text');
    var content = document.getElementsByTagName('ul')[0];
    var img = content.getElementsByTagName('img');
    var span = content.getElementsByTagName('span');

    window.onload = function(){
       // getmsg();
        icon[0].onclick = function(){
            if(num==0){
                this.src = arrIcon[1];
                num = 1;
            }else if(num==1){
                this.src = arrIcon[0];
                num = 0;
            }
        }
        btn.onclick = function() {
            if (text.value == '') {
                alert('不能发送空消息');
            } else {

                var xhr = new XMLHttpRequest();
                xhr.open("POST", 'http://127.0.0.1/chat/store', true);
                xhr.setRequestHeader("content-type", "application/x-www-form-urlencoded");

                xhr.onreadystatechange = function () {
                    if (this.readyState == 4) {
//                        alert(this.responseText);

                    }
                }
                var msg="_token="+token+"&user_id="+"0"+"&msg="+text.value;
                xhr.send(msg);


                content.innerHTML += '<li><img src="'+arrIcon[num]+'"><span>'+text.value+'</span></li>';
                iNow++;
                if(num==0){
                    img[iNow].className += 'imgright';
                    span[iNow].className += 'spanright';
                }else {
                    img[iNow].className += 'imgleft';
                    span[iNow].className += 'spanleft';
                }
                text.value = '';
                // 内容过多时,将滚动条放置到最底端
                content.scrollTop=content.scrollHeight;
            }
        }
    }



    function getmsg(){
        var xhr = new XMLHttpRequest();

        xhr.open("get", 'http://127.0.0.1/chat/getmsg',true);
        //设置为同步 php脚本没结束就别给我返回

     //   xhr.setRequestHeader("content-type", "application/x-www-form-urlencoded");

        xhr.onreadystatechange = function () {
            if (this.readyState == 4) {
                var data=this.responseText;
                console.log(data);
                 msgdiv(data);
                    getmsg();

            }
        }
       xhr.send(null);

    }

    function msgdiv(data){//渲染到浏览器
   if(isJSON(data)!=false){
        if(data!=null) {
            var jsonObj = eval("(" + data + ")");
h5msg();

        }
    }}



    function isJSON(str) {
        if (typeof str == 'string') {
            try {
                var obj=JSON.parse(str);
                if(typeof obj == 'object' && obj ){
                    return true;
                }else{
                    return false;
                }

            } catch(e) {
                console.log('error：'+str+'!!!'+e);
                return false;
            }
        }
    return true;
    }



function msgtrue() {//消息发送成功后



    }


</script>