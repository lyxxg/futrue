
<div class="slide-box" onclick="ready()" style="width: 324px;style="display:balok;">
@if (!Auth::guest())
    <span style="display: none">
    {{$notices=Auth::user()->notice->whereIn('status','0')}}
</span>

    <div class="bor" ></div>
    <div class="padd" >
        <div class="slide-box-button" style="background-color: navajowhite">
            <i class="fa fa-chevron-circle-left"></i>
                <span class="futrue-badge"></span></i>
        </div>

        <h5>           <i class="fa fa-commenting"  >
                @if($notices->count()!=null)
                <span style="color: red;font-size: 20px">{{$notices->count()}}</span>
           @else
                    <span style="color: white;font-size: 20px">暂无消息</span>
                @endif

            </i>
        </h5>
        <hr/>


    @foreach($notices as $notice)
                <a href="{{route('user.index',['user_id'=>$notice->user_id])}}" class="futrue-user">   {{$notice->objectUser->name}}</a>

            @if($notice->action=="answer")
                    <p>回答了关于你在 <p></p> <a href="{{route('article.show',$notice->object_id)}}" >
                        {{$notice->question->title}}</a></p>的文章
            @elseif($notice->action=="comment")
                    <p>评论了你的回答<p></p>{{$notice->answer->content}}</p>
           @else

                    <p>回复了你的评论:<p>{{$notice->comment->comment}}</p></p>

                @endif

<hr/>
        @endforeach
@else
            未登录，请登录
        @endif

    </div>
</div>
<script>
    function  ready() {
        var xhr=new XMLHttpRequest();
        xhr.open('GET',"http://127.0.0.1/noticeready",true);
        xhr.send();
    }
    </script>
    {{--哎 影响手机看文章的效果  只能切掉了--}}
