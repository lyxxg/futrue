<?php $__env->startSection("content"); ?>
    <div class="box-body">
        <div class="flexslider">
            <ul class="slides">
                <!-- Each slide should be enclosed inside li tag. -->

                <!-- Slide #1 -->
                <li>
                    <!-- Image -->
                    <img src="<?php echo e("http://127.0.0.1/futrue/public/Storage/".$tag->ico); ?>" alt="" class="futrue-tag"/>
                    <!-- Caption -->
                    <div class="flex-caption">
                        <div class="bor"></div>
                        <!-- Title -->
                        <h3><?php echo e($tag->name); ?></h3>
                        <!-- Para -->
                        <p>Hot:<?php echo e($tag->hot); ?></p>
                    </div>
                </li>

                <!-- Slide #2 -->

        <h4>介绍</h4>

        <hr />

        <p><?php echo $tag->baike; ?></p>
    </div>

    <!-- Content ends -->

    </div>
    </div>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('futrue.layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>