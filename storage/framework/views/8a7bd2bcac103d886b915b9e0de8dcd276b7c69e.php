<?php $__env->startSection("content"); ?>
    <div class="post-foot well">
        <h3>发送邮件给我</h3>
        <hr/>
        <form action="<?php echo e(route('contactmepost')); ?>" method="post">
            <?php echo e(csrf_field()); ?>


            <script id="container" name="content" type="text/plain">

            </script>
            <div style="position: center">
            <button class="btn  btn-primary" style="width: 300px;height:55px;text-align: center;margin:auto;font-size: 80px;color: #000;">发送</button>
            </div>
        </form>
    </div>
    <script type="text/javascript" src="<?php echo e(asset('baiduedit/ueditor.config.js')); ?>"></script>
    <!-- 编辑器源码文件 -->
    <script type="text/javascript" src="<?php echo e(asset('baiduedit/ueditor.all.js')); ?>"></script>
    <!-- 实例化编辑器 -->
    <script type="text/javascript">
        var ue = UE.getEditor('container', {
            toolbars: [
                ['fullscreen','simpleupload', 'insertimage']
            ],
            autoHeightEnabled: true,
            autoFloatEnabled: true,
        });
    </script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('Futrue.layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>