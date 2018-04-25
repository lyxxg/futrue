<!DOCTYPE html>
<html lang="en">
<?php echo $__env->make("futrue.particles.userhead", array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<body>

<!--头部-->
<?php echo $__env->make("futrue.particles.top", array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

<!-- 右边的滑动框 -->

<!-- Main content starts -->

<div class="content">
    <!--侧边栏-->
    <?php echo $__env->make("futrue.particles.sidebar", array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <div class="copyrights">Collect from <a href="http://www.cssmoban.com/" >Website Template</a></div>
    <!-- Mainbar starts -->
    <div class="mainbar">
        <?php $__env->startSection("content"); ?>
            <div class="matter">
                <div class="container-fluid">

                    <!-- /.content -->

                </div>
            </div>
        <?php echo $__env->yieldSection(); ?>
    </div>
    <!--页脚-->
<?php echo $__env->make("futrue.particles.foot", array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<!-- JS -->
    <script src="<?php echo e(asset('futrue/js/jquery.js')); ?>"></script>
    <script src="<?php echo e(asset('futrue/js/bootstrap.js')); ?>"></script> <!-- Bootstrap -->
    <script src="<?php echo e(asset('futrue/js/imageloaded.js')); ?>"></script> <!-- Imageloaded -->
    <script src="<?php echo e(asset('futrue/js/jquery.isotope.js')); ?>"></script> <!-- Isotope -->
    <script src="<?php echo e(asset('futrue/js/jquery.prettyPhoto.js')); ?>"></script> <!-- prettyPhoto -->
    <script src="<?php echo e(asset('futrue/js/jquery.flexslider-min.js')); ?>"></script> <!-- Flexslider -->
    <script src="<?php echo e(asset('futrue/js/custom.js')); ?>"></script> <!-- Main js file -->
</body>
</html>
