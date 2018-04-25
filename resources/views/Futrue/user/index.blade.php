@extends('Futrue.layouts.userapp')

@section("content")
    <script src="https://cdn.bootcss.com/jquery/3.2.1/jquery.min.js"></script>

    <div class="post-foot well">
        <!-- Social media icons -->
        <h2>{{$user->info->nick}}</h2>
        </div>

            <div class="card hovercard">
                <div class="cardheader">

                </div>

<div class="avatar" style="margin: 0 auto">
                    <img  src="{{\Illuminate\Support\Facades\Storage::url($user->info->avatar)}}" class="avatar1"
                 style="width: 13em;height: 13em;border-radius:50%;	box-shadow:2px 2px 2px yellow;overflow: hidden;">
</div>
                <div class="info">
                    <div class="title">
                        <a target="_blank" href="" >{{$user->info->nick}}</a>
                    </div>
                            @if($user->info->sex==0)
                        <i class="fa fa-transgender" style="font-size: 23px;color: deeppink"></i>
                        @elseif($user->info->sex==1)
                        <i class="fa fa-mars" style="font-size: 23px;color: deepskyblue"></i>
                            @else
                                <i class="fa fa-transgender" style="font-size: 23px;color: purple"></i>

                                @endif

                    <p></p>
                   @if($user->info->coins<60)
                    <span class="badge badge-secondary">LV1</span>
                    @elseif($user->info->coins>=60&&$user->info->coins<=120)
                        <span class="badge badge-success">LV2</span>
                    @elseif($user->info->coins>=120&&$user->info->coins<=360)
                        <span class="badge badge-info">LV3</span>

                    @elseif($user->info->coins>360&&$user->info->coins<=1024)
                        <span class="badge badge-warning">LV4</span>

                    @endif

                    <div class="desc">{{$user->info->description}}</div>

                    @if($user->id!=Auth::id())

                        <a href="{{route('msg.create',['user_id'=>$user->id])}}">
                    私信<i class="fa fa-envelope" style="font-size: 25px"></i>
                        </a>
@if(\App\Models\Follower::where("user_id",Auth::id())->where("follower_id",$user->id)->first()==null)

                        <form action="{{route('attention.store')}}" method="post">
   {{csrf_field()}}
    <input type="hidden" name="user_id" value="{{$user->id}}">
    <button class="btn btn-primary btn-sm">+关注</button>
</form>
    @else
                            <form action="{{route('attention.destroy',$user->id)}}" method="post">
                                {{csrf_field()}}
                                {{method_field('delete')}}
                                <input type="hidden" name="user_id" value="别搞事情  我害怕">
                                <button class="btn btn-primary btn-sm">-取消关注</button>
                            </form>
@endif
                    @endif

                </div>


                <div class="bottom">
                    <div class="underline"></div>
                    <ul class="social_links">
                        <li class="twitter animated bounceIn wow delay-02s animated" style="visibility: visible; animation-name: bounceIn;"><a href="{{route('articlehistory.index',['user_id'=>$user->id])}}">文章</a></li>
                        <li class="facebook animated bounceIn wow delay-03s animated" style="visibility: visible; animation-name: bounceIn;"><a href="{{route("user.collectionhis",['user_id'=>$user->id])}}">收藏</a></li>
                        <li class="pinterest animated bounceIn wow delay-04s animated" style="visibility: visible; animation-name: bounceIn;"><a href="{{route("attention.index",['user_id'=>$user->id])}}">粉丝</a></li>
                @if(Auth::id()==$user->id)
                        <li class="gplus animated bounceIn wow delay-05s animated" style="visibility: visible; animation-name: bounceIn;"><a href="{{route('user.edit',$user->id)}}">编辑</a></li>

                            <li class="gplus animated bounceIn wow delay-05s animated" style="visibility: visible; animation-name: bounceIn;">
                                <a href="{{ url('/logout') }}"
                                   onclick="event.preventDefault();
                                           document.getElementById('logout-form').submit();">
                                    注销
                                </a>

                                <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                    {{ csrf_field() }}
                                </form>
                                </li>
                   @endif
                    </ul>
                </div>
            </div>

    <script>
        function ico1() {
            //我靠 ico居然是关键字
            //onchange="fileSelected();"
            document.getElementById("icofile").click();
        }

        function ico2() {
            // 文件选择后触发次函数
            var $file = $("#icofile");
            var fileObj = $file[0];
            var windowURL = window.URL || window.webkitURL;
            var dataURL;

            var $img = $("#img");
            if (fileObj && fileObj.files && fileObj.files[0]) {
                dataURL = windowURL.createObjectURL(fileObj.files[0]);
                $img.attr('src', dataURL);

            } else {
                dataURL = $file.val();
                var imgObj = document.getElementById("preview");
                imgObj.style.filter = "progid:DXImageTransform.Microsoft.AlphaImageLoader(sizingMethod=scale)";
                imgObj.filters.item("DXImageTransform.Microsoft.AlphaImageLoader").src = dataURL;
            }
        }

    </script>
@endsection
