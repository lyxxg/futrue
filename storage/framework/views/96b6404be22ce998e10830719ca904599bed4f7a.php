<?php $__env->startSection("content"); ?>
    <section class="content-header">
        <h1>
            答案管理
            <small>全部答案</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo e(route('admin.article.index')); ?>"><i class="fa fa-home"></i> 主页</a></li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">

        <!-- Default box -->
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">文章</h3>

                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                            title="Collapse">
                        <i class="fa fa-minus"></i></button>
                    <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
                        <i class="fa fa-times"></i></button>
                </div>
            </div>

            <div class="box-body">

                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <td><i class="fa fa-circle">答案号</i></td>
                        <td><i class="fa fa-user">发布者</i></td>
                        <td><i class="fa fa-book">答案所属文章号</i></td>
                        <td><i class="fa fa-thumbs-up">赞</i></td>
                        <td><i class="fa fa-thumbs-down">踩</i></td>
                        <td><i class="fa fa-trash">删除</i></td>
                    </tr>
                    </thead>
                    <tbody>
                    <?php $__currentLoopData = $answers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $answer): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td><?php echo e($answer->id); ?></td>
                            <td><?php echo e($answer->user->info->nick); ?></td>
                            <td><?php echo e($answer->question_id); ?></td>
                            <td><?php echo e($answer->good); ?></td>
                            <td><?php echo e($answer->bad); ?></td>
                            <td>
                                <a href="#" class="btn btn-danger btn-sm btn-del">删除</a>
                                <form onsubmit="return confirm('您是否确定要删除该答案？')" action="<?php echo e(route('admin.answer.destroy',[$answer->id])); ?>" method="post">
                                    <?php echo e(csrf_field()); ?>

                                    <?php echo e(method_field('delete')); ?>

                                </form>
                            </td>

                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>

                </body>
                </html>


            </div>

            <!-- /.box-body -->
            <div class="box-footer">
                Footer
            </div>
            <!-- /.box-footer-->
        </div>
        <!-- /.box -->
        <?php echo e($answers->appends(['type'=>request()->get('type','last')])->links()); ?>

    </section>

<?php $__env->stopSection(); ?>
<?php $__env->startSection("js"); ?>

    <script src="http://lib.baomitu.com/jquery/3.2.0/jquery.min.js"></script>
    <script>
        $(function(){
            $(".btn-del").click(function () {
                $(this).siblings("form:first").submit();
            });
        });



    </script>
<?php echo $__env->make('admin.layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>