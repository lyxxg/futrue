//未来笔记主题  bug开始写

var background=localStorage.getItem("background");//back
if(background!=null){
    window.onload=backgroundload(background);
    $("body").css("color","black");
    $(".sidebar").css("color","black");
    $("#nav>li").css("color","black");
    $(".blog-sidebar>.widget").css("color","black");
    $(".foot").css("color","black");
    $("#nav>li>a").css("color","black");
    $(".blog-sidebar").css("color","black");
    $(".pic").css("color","black");
    $(".txt>ul>li").css("color","black");
    $(".pagination>li>a").css("color","black");
    $(".syntaxhighlighter>tbody").css("color","black");
    $(".futrue-li").css("color","black");
    $(".entry>h2>a").css("color","black");
    $(".meta>*").css("color","black");
    $(".col-l").css("color","red");
    $(".span4 a").css("color","red");

}
//10   10---10   play==10
function backgroundload(background) {
    background=background;
    $("body").css({
        'background':background,


    });
    $(".sidebar").css(
        'background',background


    );


    $("#nav>li").css("background",background);
    $(".blog-sidebar>.widget").css("background",background);
    $(".foot").css("background",background);
    $("#nav>li>a").css("background",background);
    $(".blog-sidebar").css("background",background);
    $(".pic").css("background",background);
    $(".txt>ul>li").css("background",background);
    $(".pagination>li>a").css("background",background);
    $(".syntaxhighlighter>tbody").css("background",background);
    $(".futrue-li").css("background",background);
    $(".post-foot").css("background",background);
}
$("#night").mousemove(function () {
    var background= $("#night").attr("data-back");//back
    localStorage.setItem("background",background);//修改背景缓存
    //如果刷新本界面就太low了
    backgroundload(background);

});
$("#default").mouseover(function () {
    var background= $("#default").attr("data-back");
    localStorage.setItem("background",background);//修改背景缓存
    backgroundload(background);
});
$("#powder").mouseover(function () {
    var background= $("#powder").attr("data-back");
    localStorage.setItem("background",background);//修改背景缓存
    backgroundload(background);
});

$("#red").mouseover(function () {
    var background= $("#red").attr("data-back");
    localStorage.setItem("background",background);//修改背景缓存
    backgroundload(background);
});

$("#yolk").mouseover(function () {
    var background= $("#yolk").attr("data-back");
    localStorage.setItem("background",background);//修改背景缓存
    backgroundload(background);
});


$("#green").mouseover(function () {
    var background= $("#green").attr("data-back");
    localStorage.setItem("background",background);//修改背景缓存
    backgroundload(background);
});

$("#fatblue").mouseover(function () {
    var background= $("#fatblue").attr("data-back");
    localStorage.setItem("background",background);//修改背景缓存
    backgroundload(background);
});

$("#Chiaki").mouseover(function () {
    var background= $("#Chiaki").attr("data-back");
    localStorage.setItem("background",background);//修改背景缓存
    backgroundload(background);
});

// $("#night").click(function () {
//     var background= $("#night").attr("data-back");
//     localStorage.setItem("background",background);
//     $("body").css("background","red");
//     $(".sidebar").css("background","red");
//     $("#nav>li").css("background","red");
//     $(".blog-sidebar>.widget").css("background","red");
//     $(".foot").css("background","red");
//     $("#nav>li>a").css("background","red");
//     $(".blog-sidebar").css("background","red");
//     $(".pic").css("background","red");
//     $(".txt>ul>li").css("background","red");
//     $(".pagination>li>a").css("background","red");
//     $(".syntaxhighlighter>tbody").css("background","red");
// });


