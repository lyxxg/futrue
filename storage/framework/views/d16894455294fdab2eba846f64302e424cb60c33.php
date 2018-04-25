<?php $__env->startSection("content"); ?>
    <section class="content-header">
        <h1>
            反馈管理
            <small>反馈 </small>
        </h1>

    </section>

    <!-- Main content -->
    <section class="content">

        <!-- Default box -->
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">文章</h3>

                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                            title="收起">
                        <i class="fa fa-minus"></i></button>
                    <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="关闭">
                        <i class="fa fa-times"></i></button>
                </div>
            </div>

            <div class="box-body">

                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <td><i class="fa fa-circle">编号</i></td>
                        <td><i class="fa fa-user">用户</i></td>
                        <td><i class="fa fa-bookmark">内容</i></td>
                        <td><i class="fa fa-tag">时间</i></td>
                        <td><i class="fa fa-eye">回复</i></td>
                    </tr>
                    </thead>
                    <tbody>
                    <?php $__currentLoopData = $feedbacks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $feedback): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td title="编号:<?php echo e($feedback->id); ?>"><?php echo e($feedback->id); ?></td>
                            <td title="账号:<?php echo e($feedback->user->name); ?>">
                                <a href="<?php echo e(route('user.index',['user_id'=>$feedback->user_id])); ?>"><?php echo e($feedback->user->name); ?></a></td>
                            <td title="  <?php echo e(str_limit($feedback->content, 10,'...')); ?>">
                                <a href="<?php echo e(route('article.show',$feedback->content)); ?>">
                                    <?php echo str_limit($feedback->content, 30,'...'); ?>

                                </a>
                            </td>
                            <td title="反馈时间:<?php echo e($feedback ->view); ?>"><?php echo e($feedback->created_at); ?></td>
                            <td>
                                <a href="#" class="btn btn-primary btn-sm" title="撤销的文章可以在回收站恢复">回复</a>
                            </td>

                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>

                </body>
                </html>


            </div>

            <!-- /.box-footer-->
        </div>
        <!-- /.box -->
        <?php echo e($feedbacks->links()); ?>

    </section>


<?php $__env->stopSection(); ?>
<?php $__env->startSection("js"); ?>

<?php echo $__env->make('admin.layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>