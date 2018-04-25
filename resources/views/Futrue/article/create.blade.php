@extends('Futrue.layouts.app')
@section("content")

    <h2>文章发布</h2>
    <div>
        @foreach($errors->all() as $error)
            <p>{{$error}}</p>
        @endforeach
    </div>




    <form action="{{route('article.store')}}" method="post">
        {{csrf_field()}}
        @if (Auth::guest())
            <p>
            <input type="text" name="title" value="{{old("title")}}" class="form-control" placeholder="未登陆  请先登陆"  readonly>
        </p>
@else
            <p>
                <input type="text" name="title" value="{{old("title")}}" class="form-control" placeholder="至少3个字符 最大10000   ">
            </p>
        @endif

        <div>
            <h5>分类:至少选择一个板块</h5>
<ul>
            @foreach($types as $type)
     <div>

                    @foreach($type->Tags as $tag)
          <li>
              <label class="futrue-float">
                  <input type="checkbox"
                         @if(in_array($tag->id,old("tag_id",[]))) checked @endif name="tag_id[]" value="{{$tag->id}}"
                         id="checkbox_a1" class="chk_1futrue" >
                  {{$tag->name}}
              </label>
          </li>
            @endforeach
                </div>
            @endforeach
</ul>
        </div>



        @if (Auth::guest())
        <script id="container" name="content" type="text/plain"
                contenteditable="false" >
     请先登陆再发帖
        </script>

            <p>
                <a href="{{route('login')}}" class="">
                    <input type="" value="登录" class="btn btn-inverse unlogin">
                </a>

        @else
            <script id="container" name="content" type="text/plain"
                    contenteditable="false" >
        </script>

            <p><input type="submit" value="发布" class="btn btn-inverse"></p>


        @endif

    </form>
</div>


<script type="text/javascript" src="{{asset('baiduedit/ueditor.config.js')}}"></script>
<!-- 编辑器源码文件 -->
<script type="text/javascript" src="{{asset('baiduedit/ueditor.all.min.js')}}"></script>
<!-- 实例化编辑器 -->
<script type="text/javascript">
    var ue = UE.getEditor('container', {

        autoHeightEnabled: true,
        autoFloatEnabled: true,


        @if (Auth::guest())

        readonly:true,
        @endif
          });
</script>
@endsection()
