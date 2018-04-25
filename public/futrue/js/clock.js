var dom=document.getElementById("clock");
var cxt=dom.getContext("2d");
var width=cxt.canvas.width;//获取正方形的宽度
var height=cxt.canvas.height;//正方形的高度
var r=width/2;//因为是正方形 所以这个肯定是中心了
var rem=width/200;
function drawBackground(){
    cxt.save();
    cxt.translate(r,r);//改变坐标 设置正方形的的中心为0,0
    cxt.beginPath();//起始一条路径
    cxt.lineWidth=10*rem//线条10像素
    cxt.arc(0,0,r-cxt.lineWidth/2,0,2*Math.PI,false);//中心 半径是r  0起始点 顺时针画
    cxt.stroke();

    var hourNumbers=[3,4,5,6,7,8,9,10,11,12,1,2];
    hourNumbers.forEach(function(number,i){
        var rad=2*Math.PI/12*i;
        var x=Math.cos(rad)*(r-30*rem);
        var y=Math.sin(rad)*(r-30*rem);
        cxt.font=18*rem+'px Arial';
        cxt.textAlign='center';
        cxt.textBaseline='middle';
        cxt.fillText(number,x,y);//把文字放上去

    });


    for(var i=0;i<60;i++){
        var rad=2*Math.PI/60*i;
        var x=Math.cos(rad)*(r-18*rem);
        var y=Math.sin(rad)*(r-18*rem);
        cxt.beginPath();
        if(i%5===0){//每个点一个圆   所以每个小时的圆变成红色
            cxt.fillStyle='red';
            cxt.arc(x,y,2*rem,0,2*Math.PI,false);
        }else{
            cxt.fillStyle='#ccc';
            cxt.arc(x,y,2*rem,0,2*Math.PI,false);
        }
        cxt.fill();
    }
}
function drawHour(huor,minute){
    cxt.save();
    cxt.beginPath();
    var rad=2*Math.PI/12*huor;//360除以12 就是每个小时的弧度 如果是2小时 则是除以2
    var mrad=2*Math.PI/12/60*minute;
    cxt.rotate(rad+mrad);
    cxt.lineWidth=5*rem;
    cxt.lineCap="round";//线条结束的样式 以圆结束
    cxt.moveTo(0,10);
    cxt.lineTo(0,-r/2)*rem;
    cxt.stroke();
    cxt.restore();
}

function drawMinute(minute){
    cxt.save();
    cxt.beginPath();
    var rad=2*Math.PI/60*minute;//360除以12 就是每个小时的弧度 如果是2小时 则是除以2
    cxt.rotate(rad);
    cxt.lineWidth=3*rem;
    //cxt.lineCap="round";//线条结束的样式 以圆结束
    cxt.moveTo(0,10*rem);
    cxt.lineTo(0,-r+40*rem);
    cxt.stroke();
    cxt.restore();
}

function drawSecond(second){
    cxt.save();
    cxt.beginPath();
    cxt.fillStyle="red";
    var rad=2*Math.PI/60*second;//360除以12 就是每个小时的弧度 如果是2小时 则是除以2
    cxt.rotate(rad);
    cxt.moveTo(-2*rem,20*rem);
    cxt.lineTo(2*rem,20*rem);
    cxt.lineTo(1,-r+18*rem);
    cxt.lineTo(1,-r+18*rem);
    cxt.fill();
    cxt.restore();
}

function drawDot(){
    cxt.save();
    cxt.beginPath();
    cxt.fillStyle="#FFFFFF";
    cxt.arc(0,0,3*rem,0,2*Math.PI,false);
    cxt.fill();
    cxt.restore();
}

function draw(){
    cxt.clearRect(0,0,width,height);
    drawBackground();//背景
    drawDot();//中心圆点
    var now=new Date();
    var huor=now.getHours();
    var minute=now.getMinutes();
    var second=now.getSeconds();
//调用函数
    drawHour(huor,minute);
    drawMinute(minute);
    drawSecond(second);
    cxt.restore();
}
setInterval(draw,1000);
