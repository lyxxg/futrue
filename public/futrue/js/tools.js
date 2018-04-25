document.getElementById("blbl").onclick=function () {
var xhr=new XMLHttpRequest();
xhr.open('POST','http://193.112.93.32/wx2/public/blblav',true);
var name=document.getElementById("name").value;
//草  网上什么鬼正则
    xhr.setRequestHeader("Content-Type","application/x-www-form-urlencoded");

    xhr.onreadystatechange=function () {
        if(xhr.readyState==4)
        {
            document.getElementById("resultvalue").value=this.responseText;
            document.getElementById("result").style.display="block";
        }

    }

    xhr.send(name+"=0");
}

function copy() {
    var fm=document.getElementById("resultvalue");
    // document.getElementById("biao").focus();
    fm.select(); // 选择对象
    document.execCommand("Copy"); // 执行浏览器复制命令
    document.getElementById("resultvalue").value="已复制好，粘贴到浏览器可查看图片";
}
