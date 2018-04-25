<?php $__env->startSection("content"); ?>
    <script src="<?php echo e(asset('baiduedit/ueditor.parse.js')); ?>"></script>
    <script>
        uParse('.content', {
            rootPath: '<?php echo e(asset("baiduedit")); ?>'
        })
    </script>



    <!-- Title starts -->
    <div class="page-title">
        <div id="myCarousel" class="carousel slide">
            <!-- 轮播（Carousel）指标 -->
            <ol class="carousel-indicators">
                <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                <li data-target="#myCarousel" data-slide-to="1"></li>
                <li data-target="#myCarousel" data-slide-to="2"></li>
            </ol>
            <!-- 轮播（Carousel）项目 -->
            <div class="carousel-inner">
                <div class="item active">
                    <img src="<?php echo e(asset('futrue/img/photos/1.jpg')); ?>" alt="First slide">
                    <div class="carousel-caption">
                    </div>

                </div>
                <div class="item">
                    <img src="<?php echo e(asset('futrue/img/photos/2.jpg')); ?>" alt="Second slide">
                    <div class="carousel-caption">
                    </div>
                </div>
                <div class="item">
                    <img src="<?php echo e(asset('futrue/img/photos/3.jpg')); ?>" alt="Third slide">
                    <div class="carousel-caption">

                    </div>
                </div>

                <div class="item">
                    <img src="<?php echo e(asset('futrue/img/photos/4.jpg')); ?>" alt="Third slide">
                    <div class="carousel-caption">

                    </div>
                </div>

                <div class="item">
                    <img src="<?php echo e(asset('futrue/img/photos/5.jpg')); ?>" alt="Third slide">
                    <div class="carousel-caption">

                    </div>
                </div>



            </div>
            <!-- 轮播（Carousel）导航 -->
            <a class="carousel-control left" href="#myCarousel"
               data-slide="prev">&lsaquo;</a>
            <a class="carousel-control right" href="#myCarousel"
               data-slide="next">&rsaquo;</a>



        </div>

    </div>
    <!-- Title ends -->
    <!-- Content starts -->


    <div class="futrue-circle">
        <i onclick="two()" onmousemove="futrurcircle1()" onmouseout="futrurcircle1out()" id="futrue-circle1" class="fa fa-circle-o" style="font-size: 25px"></i>
        <i onclick="two()" onmousemove="futrurcircle2()" id="futrue-circle2" onmouseout="futrurcircle2out()" class="fa fa-circle-o" style="font-size: 25px"></i>
        <i onclick="two()" onmousemove="futrurcircle3()" id="futrue-circle3" class="fa fa-circle-o" onmouseout="futrurcircle3out()" style="font-size: 25px"></i>
        <i onclick="two()" onmousemove="futrurcircle4()" id="futrue-circle4" class="fa fa-circle-o" onmouseout="futrurcircle4out()" style="font-size: 25px"></i>
        <i onclick="two()" onmousemove="futrurcircle5()" id="futrue-circle5" class="fa fa-circle-o" onmouseout="futrurcircle5out()" style="font-size: 25px"></i>

    </div>


    <div class="box-body blog">
        <div class="row-fluid">

            <div class="span8">
                <div class="posts">

                 <?php $__currentLoopData = $questions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $question): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="entry">
                        <h2><a href="#"><?php echo e($question->title); ?></a></h2>
                       <div class="meta">
                           <a href="<?php echo e(route('user.index',['user_id'=>$question->user->id])); ?>"> <i class="fa fa-user"></i> <?php echo e($question->user->name); ?></a>
                           <?php $__currentLoopData = $question->tags; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tag): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                               <a href="<?php echo e(route("tag.show",$tag->id)); ?>"><i class="fa fa-tag"></i><?php echo e($tag->name); ?></a>
                               <!--加个标签链接-->
                           <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <i class="icon-calendar"></i> <?php echo e($question->created_at->diffForHumans()); ?>

                            <span class="pull-right">
                                <i class="fa fa-eye"></i> <?php echo e($question->view); ?> <a href="#"><i class="fa fa-comment"></i> <?php echo e($question->answer); ?></a>
                            </span>
                         </div>

                        <!-- Thumbnail -->
                        <div class="bthumb">
                            <a href="#"><img src="img/photos/blog1.jpg" alt="" /></a>
                        </div>
<div class="futre-index">
                        <!-- Para -->
                       <?php echo $question->content; ?>

</div>
                        <!-- Read more -->
                        <a href="<?php echo e(route('article.show',$question->id)); ?>" class="btn btn-danger">查看更多</a>
                    </div>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <!-- Pagination -->

                    <div class="pagination">
                        <ul>
                            <?php echo e($questions->appends(['type'=>request()->get('type','last')])->links()); ?>

                        </ul>
                    </div>

                </div>
            </div>

            <div class="span4">

                <!-- Sidebar 2 -->

                <div class="blog-sidebar">
                    <!-- Widget -->
<div class="widget">
    <h4>公告</h4>
    <img src="<?php echo e(asset('futrue/img/photos/1.jpg')); ?>">
    坎坎坷坷扩扩扩扩扩扩扩扩扩扩扩扩扩扩扩扩扩扩扩扩扩扩扩扩扩扩扩扩扩扩扩扩扩扩扩扩扩扩扩扩扩扩扩扩扩扩扩扩扩扩
</div>


                    <div class="widget">
                        <h4>热门榜</h4>
                        <ul>
                            <?php $__currentLoopData = $questionhots; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $questionhot): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li>
                                    <i class="fa fa-paper-plane-o"></i>
                                    <a href="<?php echo e(route('article.show',$questionhot->id)); ?>">
                                    <?php echo e($questionhot->title); ?>

                                    </a>
                                </li>

                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </ul>
                    </div>

                </div>
            </div>



            <div class="span3">

                <!-- Sidebar 1 -->
                <div class="blog-sidebar">
                    <div class="widget">
                        <h4>热门标签</h4>
                        <ul>
                            <?php $__currentLoopData = $taghots; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $taghot): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <li> <a href="$taghot->id"><i class="fa fa-tag"></i><?php echo e($taghot->name); ?></a></li>

                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </ul>
                    </div>

                </div>
            </div>


        </div>
    </div>

<?php $__env->stopSection(); ?>
<script>
   function futrurcircle1(){
       $("#myCarousel").carousel(0);
       $('#futrue-circle1').attr('class', 'fa fa-circle');
   }function futrurcircle1out(){
       $('#futrue-circle1').attr('class', 'fa fa-circle-o');
   }

   function futrurcircle2() {
       $("#myCarousel").carousel(1);
       $('#futrue-circle2').attr('class', 'fa fa-circle');
   } function futrurcircle2out() {
       $('#futrue-circle2').attr('class', 'fa fa-circle-o');
   }
   function futrurcircle3() {
       $("#myCarousel").carousel(2);
       $('#futrue-circle3').attr('class', 'fa fa-circle');
   }
   function futrurcircle3out() {
       $('#futrue-circle3').attr('class', 'fa fa-circle-o');
   }



   function futrurcircle4() {
       $("#myCarousel").carousel(3);
       $('#futrue-circle4').attr('class', 'fa fa-circle');
   }
   function futrurcircle4out() {
       $('#futrue-circle4').attr('class', 'fa fa-circle-o');
   }



   function futrurcircle5() {
       $("#myCarousel").carousel(4);
       $('#futrue-circle5').attr('class', 'fa fa-circle');
   }
   function futrurcircle5out() {
       $('#futrue-circle5').attr('class', 'fa fa-circle-o');
   }

</script>


<?php echo $__env->make('futrue.layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>