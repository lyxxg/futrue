<!-- Sidebar starts -->
<div class="sidebar">

    <!-- Logo -->
    <div class="logo">
        <a href="#"></a>
    </div>


    <div class="sidebar-dropdown"><a href="#">
            <i class="fa fa-chevron-right"></i>
            导航
            <span class="pull-right">
                        <i class="icon-chevron-right"></i></span></a>

        </a></div>

    <!--- Sidebar navigation -->
    <!-- If the main navigation has sub navigation, then add the class "has_sub" to "li" of main navigation. -->

    <!-- Colors: Add the class "br-red" or "br-blue" or "br-green" or "br-orange" or "br-purple" or "br-yellow" to anchor tags to create colorful left border -->
    <div class="s-content">

        <ul id="nav">
            <!-- Main menu with font awesome icon -->
            <li><a href="{{route('article.index')}}" class="open br-red"><i class="fa fa-home"></i> 主页</a>
            </li>
            <li>
                        @if (Auth::guest())
                    <a href="{{route('login')}}" class="br-yellow"><i class="fa fa-user">
                        </i> 登录/注册</a></li>

            @else
                <li style="margin-right: 8px"><a href="{{route('user.index',['user_id'=>Auth::id()])}}"
                    class="br-yellow">
                        <img  src="{{\Illuminate\Support\Facades\Storage::url(Auth::user()->info->avatar)}}" class="avatar1"
                              style="width: 2em;height: 2em;border-radius:50%;	box-shadow:2px 2px 2px yellow;overflow: hidden;">
                        个人中心</a></li>

                <li><a href="{{asset('article/create')}}" class="br-orange"><i class="fa fa-plus-square"></i>发表文章</a></li>
            @endif

            <li class="has_sub" id="fa-chevron-right"><a href="#" class="br-green">
                    <i class="fa fa-chevron-right"></i>
                    分类 <span class="pull-right">
                        <i class="icon-chevron-right"></i></span></a>
                <ul>

                    @foreach($futruetags as $tag)
                        <li class="futrue-li"><a href="{{route('tagarticle',$tag->id)}}">{{$tag->name}}</a></li>
                    @endforeach
                </ul>
            </li>


            <li><a href="{{asset('notices')}}" class="br-purple"><i class="fa fa-envelope"></i> 通知</a></li>

            <li><a href="{{asset('about')}}" class="br-blue"><i class="fa fa-address-book"></i> 关于此博客</a></li>
            <li><a href="{{asset('feedback')}}" class="br-yellow"><i class="fa fa-envelope-o"></i> 反馈建议</a></li>
            <li class="has_sub" id="fa-chevron-right"><a href="#" class="br-green">
                    <i class="fa fa-chevron-right"></i>
                    主题<span class="pull-right">
                        <i class="icon-chevron-right"></i></span></a>
                <ul class="futrue-li">
                    <li id="default" data-back='#333 url("{{asset('futrue/img/theme/green.png')}}'><a href="#" ><i class="fa fa-circle" style="color: black;" >默认模式</i></a></li>
                    <li id="night"  data-back='#333 url("{{asset('futrue/img/theme/b-sidebar-back.png')}}") repeat'><a href="#"><i class="fa fa-circle" style="color: darkolivegreen">夜间模式</i></a></li>
                    <li id="powder" data-back="rgb(241,158,194)"><a href="#"><i class="fa fa-circle" style="color:rgb(241,158,194)">少女粉</i></a></li>
                    <li id="red" data-back=''><a href="#"><i class="fa fa-circle" style="	color:#FF4500" >古朴</i></a></li>
                    <li id="yolk" data-back='url("{{asset('futrue/img/theme/bamboo.png')}}") repeat'><a href="#"><i class="fa fa-circle" style="color: 	#EEC900;" >竹木朽</i></a></li>
                    <li id="fatblue" data-back='url("{{asset('futrue/img/theme/blue.png')}}") repeat'><a href="#" ><i class="fa fa-circle" style="color:#87CEFF;" >胖次蓝</i></a></li>
                    <li id="Chiaki" data-back='url("{{asset('futrue/img/theme/yelo.jpg')}}") repeat'><a href="#" ><i class="fa fa-circle" style="color: #9B30FF;" >软绵白</i></a></li>

                </ul>
            </li>
        </ul>





        <!-- Sidebar search -->


        <form class="form-search" action="{{route('futruesearch')}}" method="post">
            {{csrf_field()}}
            <div class="input-append">

                <input type="search" class="input-small search-query input-futrue" name="content"
                       value="{{old('content')}}" placeholder="搜一下 你的知道" required autofocus>
                <button type="submit" class="btn btn-info btn-sm" >搜索</button>
            </div>
        </form>

        <!-- Sidebar widget -->

        <div class="s-widget">
            <h6>未来笔记</h6>
            <p>未来的日记全由你决定  未来做主</p>
            <canvas id="clock" height="200px" width="200px">
            </canvas>
            {{--电脑才显示时钟--}}
        </div>

    </div>


</div>

<script src="{{asset('futrue/js/clock.js')}}"></script>

<script>
    var i=0;//懒着用if了 直接用这个算了
    var j=0;
    document.getElementById("fa-chevron-right").onclick=function () {
        // /$(".fa-chevron-right").toggle("1000");
        if(i%2==0) {
//为了特效真麻烦
            $(".fa-chevron-right").css("-webkit-transform", "rotate(90deg)");
            i++;
        }else {
            $(".fa-chevron-right").css("-webkit-transform", "rotate(0deg)");
            i++;
        }
    }

    document.getElementById("futrue-notice").onclick=function () {

        // /$(".fa-chevron-right").toggle("1000");
        if(j%2==0) {
//为了特效真麻烦
//            alert("q");
            $("#futrue-notices").css("-webkit-transform", "rotate(90deg)");

            j++;
        }else {
            $("#futrue-notices").css("-webkit-transform", "rotate(0deg)");
            j++;
        }
    }



</script>
<!-- Sidebar ends -->