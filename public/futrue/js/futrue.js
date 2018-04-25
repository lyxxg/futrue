var ue = UE.getEditor('container', {
    toolbars: [
        ['fullscreen','simpleupload', 'insertimage','insertcode','insertvideo' ]
    ],
    autoHeightEnabled: true,
    autoFloatEnabled: true
});
var ue = UE.getEditor('reply', {
    toolbars: [
        ['fullscreen','insertcode','insertvideo' ]
    ],
    autoHeightEnabled: true,
    autoFloatEnabled: true
});

function msgbox(n,obj) {
    var belog=$(obj).attr("data-belog");
    var answer_id = $(obj).attr("data-answer-id");
    var comment_id = $(obj).attr("data-comment-id")?$(obj).attr("data-comment-id"):0;
    var typearticle=$(obj).attr("data-typearticle");
    document.getElementById("comment_id").value=comment_id;
    document.getElementById("answer_id").value=answer_id;
    document.getElementById("type_article").value=typearticle;
    document.getElementById("belog").value=belog;
    document.getElementById('futrue-commentinput').style.display = n ? 'block' : 'none';

}

function comment(obj) {
    var belog=$(obj).attr("data-belog");
    var answer_id = $(obj).attr("data-answer-id");
    var comment_id = $(obj).attr("data-comment-id")?$(obj).attr("data-comment-id"):0;
    var typearticle=$(obj).attr("data-typearticle");
    $("#now_form").siblings("a:first").css("display","inline-block");
    $("#now_form").remove();
    $(obj).css("display","none");
    var comment_from = $("#comment_form").clone();
    // $(comment_from).removeAttr("id");
    $(comment_from).attr("id","now_form");
    $(comment_from).css("display","block");
    $(comment_from).find("input[name='comment_id']").val(comment_id);
    $(comment_from).find("input[name='answer_id']").val(answer_id);
    $(comment_from).find("input[name='type_article']").val("s");
    $(comment_from).find("input[name='belog']").val(belog);
    $(obj).parent().append(comment_from);
}

function good(obj)
{
    var answer_id = $(obj).attr("data-answer-id");
    $.ajax({
        url:'http://127.0.0.1/futrue/public/good',
        type:'post',
        data:{'answer_id':answer_id},
        success:function (arg) {
//0取消赞  1点赞
            if(arg==0)
            {
                $('#futrue-thumbs'+answer_id).attr('class', 'fa fa-thumbs-o-up');
                var good=parseFloat($('#futrue-thumbs'+answer_id).html());
                $('#futrue-thumbs'+answer_id).html(good-1);

            }else if(arg==1){
                $('#futrue-thumbs'+answer_id).attr('class', 'fa fa-thumbs-up');
                var qxgood=parseFloat($('#futrue-thumbs'+answer_id).html());
                $('#futrue-thumbs'+answer_id).html(qxgood+1);
            }else{
                alert("点赞失败 请联系管理员");
            }
        }
    })

}





//踩
function bad(obj) {
    var answer_id = $(obj).attr("data-answer-id");
    $.ajax({
        url:'http://127.0.0.1/futrue/public/bad',
        type:'post',
        data:{'answer_id':answer_id},
        success:function (arg) {
            if (arg == 0)//0取消踩  增加踩
            {
                $('#futrue-bad'+answer_id).attr('class', 'fa fa-thumbs-o-down');
                var bad=parseFloat($('#futrue-bad'+answer_id).html());
                $('#futrue-bad'+answer_id).html(bad-1);
            }else if(arg==1){
                $('#futrue-bad'+answer_id).attr('class', 'fa fa-thumbs-down');
                var unbad=parseFloat($('#futrue-bad'+answer_id).html());
                $('#futrue-bad'+answer_id).html(unbad+1);
            }
        }
        });


}
