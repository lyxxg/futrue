<?php $__env->startSection("content"); ?>
    <section class="content-header">
        <h1>
            创建标签分类
            <small>it all starts here</small>
        </h1>

    </section>

    <!-- Main content -->
    <section class="content">

        <!-- Default box -->
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">创建标签分类</h3>

                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                            title="Collapse">
                        <i class="fa fa-minus"></i></button>
                    <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
                        <i class="fa fa-times"></i></button>
                </div>
            </div>

            <div class="box-body">

                <form class="form-horizontal" role="form" method="POST" action="<?php echo e(route('admin.tagtype.store')); ?>">
                    <?php echo e(csrf_field()); ?>

                    <div class="form-group<?php echo e($errors->has('type_name') ? ' has-error' : ''); ?>">
                        <label for="type_name" class="col-md-4 control-label">标签分类名</label>

                        <div class="col-md-6">
                            <input id="type_name" type="text" class="form-control" name="type_name" value="<?php echo e(old('type_name')); ?>" required autofocus>

                            <?php if($errors->has('type_name')): ?>
                                <span class="help-block">
                                        <strong><?php echo e($errors->first('type_name')); ?></strong>
                                    </span>
                            <?php endif; ?>
                        </div>
                    </div>



                    <div class="form-group<?php echo e($errors->has('order_id') ? ' has-error' : ''); ?>">
                        <label for="order_id" class="col-md-4 control-label">排序编号</label>

                        <div class="col-md-6">
                            <input id="order_id" type="text" class="form-control" name="order_id" value="<?php echo e(old('order_id')); ?>" required >

                            <?php if($errors->has('order_id')): ?>
                                <span class="help-block">
                                        <strong><?php echo e($errors->first('order_id')); ?></strong>
                                    </span>
                            <?php endif; ?>
                        </div>
                    </div>



                    <div class="form-group">
                        <div class="col-md-6 col-md-offset-4">
                            <button type="submit" class="btn btn-primary">
                                创建
                            </button>
                        </div>
                    </div>
                </form>


            </div>


            </body>
            </html>
            <script src="http://apps.bdimg.com/libs/layer/2.1/layer.js"></script>
            <script src="https://cdn.bootcss.com/jquery/3.2.1/jquery.min.js"></script>
            <script>
                $(function () {
                    $(".btn-del").click(function () {
                        $(this).siblings("form").submit();//form兄弟元素选择器
                    });
                });
            </script>


        </div>

        <!-- /.box-body -->
        <div class="box-footer">
            Footer
        </div>
        <!-- /.box-footer-->
        </div>
        <!-- /.box -->

    </section>
<?php $__env->stopSection(); ?>
<?php $__env->startSection("js"); ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>