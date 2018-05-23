<!DOCTYPE html>
<html lang="en">
@include("Futrue.particles.head")
<body>

<!--头部-->
@include("Futrue.particles.top")

<!-- 右边的滑动框 -->
{{--@include("unsignedInteger.particles.right_side")--}}
{{--影响手机观看效果 只能切掉了--}}


<!-- Main content starts -->

<div class="content">
<!--侧边栏-->
    @include("Futrue.particles.sidebar")
  <div class="copyrights">Collect from <a href="http://www.cssmoban.com/" >Website Template</a></div>
  <!-- Mainbar starts -->
  <div class="mainbar">
      @section("content")
    <div class="matter">
      <div class="container-fluid">

          <!-- /.content -->

      </div>
    </div>
      @show
  </div>
    <!--页脚-->
@include("Futrue.particles.foot")
<!-- JS -->
<script src="{{asset('futrue/js/jquery.js')}}"></script>
<script src="{{asset('futrue/js/b93ootstrap.js')}}"></script> <!-- Bootstrap -->
<script src="{{asset('futrue/js/imageloaded.js')}}"></script> <!-- Imageloaded -->
<script src="{{asset('futrue/js/jquery.isotope.js')}}"></script> <!-- Isotope -->
<script src="{{asset('futrue/js/jquery.prettyPhoto.js')}}"></script> <!-- prettyPhoto -->
<script src="{{asset('futrue/js/jquery.flexslider-min.js')}}"></script> <!-- Flexslider -->
<script src="{{asset('futrue/js/custom.js')}}"></script> <!-- Main js file -->
</body>
</html>
