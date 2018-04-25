<?php $__env->startSection("content"); ?>
    <div class="page-title">
        <h2>反馈<span>未来笔记</span></h2>
    </div>

    <div class="post-foot well">
        <h3>在此输入你对本博客或意见或者建议</h3>
    <hr/>
        <form action="<?php echo e(route('feedbackdatacl')); ?>" method="post">
            <?php echo e(csrf_field()); ?>


            <script id="container" name="content" type="text/plain">

        </script>
            <button class="btn-primary">提交</button>
        </form>
    </div>
        <script type="text/javascript" src="<?php echo e(asset('baiduedit/ueditor.config.js')); ?>"></script>
        <!-- 编辑器源码文件 -->
        <script type="text/javascript" src="<?php echo e(asset('baiduedit/ueditor.all.js')); ?>"></script>
        <!-- 实例化编辑器 -->
        <script type="text/javascript">
            var ue = UE.getEditor('container', {
                toolbars: [
                    ['fullscreen','simpleupload', 'insertimage','insertcode','insertvideo' ]
                ],
                autoHeightEnabled: true,
                autoFloatEnabled: true,
            });
        </script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('Futrue.layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>