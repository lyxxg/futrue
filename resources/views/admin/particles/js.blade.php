<!-- jQuery 3 -->
<script src="http://lib.baomitu.com/jquery/3.2.0/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="http://lib.baomitu.com/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
<!-- SlimScroll -->
<script src="http://cdn.staticfile.org/jQuery-slimScroll/1.3.8/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="http://lib.baomitu.com/fastclick/1.0.6/fastclick.min.js"></script>
<!-- AdminLTE App -->
<script src="{{asset('adminlte/js/adminlte.min.js')}}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{asset('adminlte/js/demo.js')}}"></script>
<script>
    $(document).ready(function () {
        $('.sidebar-menu').tree()
    })
</script>
@yield("js")
