<?php


//判断是否属手机
function is_mobile() {
    $user_agent = $_SERVER['HTTP_USER_AGENT'];
    $mobile_agents = Array("240x320","acer","acoon","acs-","abacho","ahong","airness","alcatel","amoi","android","anywhereyougo.com","applewebkit/525","applewebkit/532","asus","audio","au-mic","avantogo","becker","benq","bilbo","bird","blackberry","blazer","bleu","cdm-","compal","coolpad","danger","dbtel","dopod","elaine","eric","etouch","fly ","fly_","fly-","go.web","goodaccess","gradiente","grundig","haier","hedy","hitachi","htc","huawei","hutchison","inno","ipad","ipaq","ipod","jbrowser","kddi","kgt","kwc","lenovo","lg ","lg2","lg3","lg4","lg5","lg7","lg8","lg9","lg-","lge-","lge9","longcos","maemo","mercator","meridian","micromax","midp","mini","mitsu","mmm","mmp","mobi","mot-","moto","nec-","netfront","newgen","nexian","nf-browser","nintendo","nitro","nokia","nook","novarra","obigo","palm","panasonic","pantech","philips","phone","pg-","playstation","pocket","pt-","qc-","qtek","rover","sagem","sama","samu","sanyo","samsung","sch-","scooter","sec-","sendo","sgh-","sharp","siemens","sie-","softbank","sony","spice","sprint","spv","symbian","tablet","talkabout","tcl-","teleca","telit","tianyu","tim-","toshiba","tsm","up.browser","utec","utstar","verykool","virgin","vk-","voda","voxtel","vx","wap","wellco","wig browser","wii","windows ce","wireless","xda","xde","zte");
    $is_mobile = false;
    foreach ($mobile_agents as $device) {
        if (stristr($user_agent, $device)) {
            $is_mobile = true;
            break;
        }
    }
    return $is_mobile;
}

if(!is_mobile() ){
//如果是电脑的话 因为懒
    ?>
<style>
    .box{
        float: left;
        position: absolute;
        right: 50%;
        z-index: 999;
    }
</style>
<?php
}
?>
@extends('Futrue.layouts.app')
<style>
    #progress{
        width: 100%;
        height: 20px;
        border: 2px solid black;
    }
    #bar{
        width: 0%;
        height: 100%;
        background-color: red;
    }


</style>


<h3 style="text-align: center">Tools 二维码扫描</h3>
<div class="box">
    <div id="progress"><div id="bar"><div class="futrue" id="futrue">0%</div></div></div>

<input type="file" name="pic" onchange="selfile();"/>
<hr/>
    扫描结果<hr/><div id="debug" class="debug"></div>
</div>

<script>
    function selfile() {
        var fd=new FormData();
        var pic=document.getElementsByTagName('input')[0].files[0];
        fd.append('pic',pic);
        var xhr=new XMLHttpRequest();
        xhr.open('POST','upload',true);
        xhr.onreadystatechange=function () {
            if(this.readyState==4)
            {

//                window.clipboardData.setData("Text",this.responseText);
               document.getElementById("debug").innerHTML=this.responseText;
            }
        }

        xhr.upload.onprogress=function (ev) {
            var percent=100*ev.loaded/ev.total;
            var percentfutrue=percent.toFixed(2);
            console.log(percentfutrue);
            //$("#bar").width("100px");

            document.getElementById("futrue").innerHTML=percentfutrue+"%";
            document.getElementById("bar").style.width=percentfutrue+'%';
        }
        xhr.send(fd);
    }



</script>