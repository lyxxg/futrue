<?php $__env->startSection("content"); ?>
    <div class="page-title">
        <h2>私信
            <span><?php echo e(\App\Models\User::find($user_object_id)->info->nick); ?></span>
        </h2>
    </div>
    <form action="<?php echo e(route('msg.store',$user_object_id)); ?>" method="post">
        <?php echo e(csrf_field()); ?>

<input type="hidden" name="user_object_id" value="<?php echo e($user_object_id); ?>">
        <script id="container" name="content" type="text/plain" class="futrue-editor">

        </script>
        <button class="btn-primary">提交</button>
    </form>

    <script type="text/javascript" src="<?php echo e(asset('baiduedit/ueditor.config.js')); ?>"></script>
    <!-- 编辑器源码文件 -->
    <script type="text/javascript" src="<?php echo e(asset('baiduedit/ueditor.all.js')); ?>"></script>
    <!-- 实例化编辑器 -->
    <script type="text/javascript">
        var ue = UE.getEditor('container', {
            toolbars: [
                ['simpleupload' ]
            ],
            autoHeightEnabled: true,
            autoFloatEnabled: true
        });
    </script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('futrue.layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>