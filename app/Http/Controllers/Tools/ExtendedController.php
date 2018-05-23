<?php

namespace App\Http\Controllers\Tools;

use function GuzzleHttp\Psr7\str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
header("Access-Control-Allow-Origin: *");
class ExtendedController extends Controller
{

    public function Qrscanning(Request $request){
        $file=$request->file('pic');
        $ext =$file->getClientOriginalExtension();//获取文件后缀
        $ext=strtoupper($ext);
        if($ext=='JPEG'||$ext=='JPG'||$ext=='PNG') {
            //生成随机文件名
        $filename =date("m/d/s").str_random(15).'.'.$ext;

        $url =  Storage::disk("qiniu")->putFileAs('futrue',$file,$filename);
        $url = Storage::disk("qiniu")->url($url);
            //输出显
        $qrcode=new \QrReader($url);
        $text=$qrcode->text();
       if(empty($text)){
       echo "无法识别  请确认二维码是否正确";
           echo "你上次的二维码<hr/><img src='{$url}' />";
           exit();
           }
           echo $text;exit();
       }
       echo "只支持jpg jpeg png格式";

  }

public function Qrview(){
        return view("tools.QrView");
}

}
