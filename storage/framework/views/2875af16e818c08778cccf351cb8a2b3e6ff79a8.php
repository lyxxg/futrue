<?php $__env->startSection("content"); ?>
    <div class="page-title">
        <h2>404
            <span>页面不存在</span>
        </h2>
    </div>
    <hr/>
<img src="<?php echo e(asset('/futrue/img/ico/404.jpg')); ?>">
<hr/>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('futrue.layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>