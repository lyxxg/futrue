<?php $__env->startSection("content"); ?>
    <section class="content-header">
        <h1>
            文章恢复
            <small>恢复被撤销的文章</small>
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
                        <td><i class="fa fa-circle">文章号</i></td>
                        <td><i class="fa fa-user">作者</i></td>
                        <td><i class="fa fa-bookmark">标题</i></td>
                        <td><i class="fa fa-eye">阅读量</i></td>
                        <td><i class="fa fa-trash">恢复</i></td>
                    </tr>
                    </thead>
                    <tbody>
                    <?php $__currentLoopData = $articles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $article): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td><?php echo e($article->id); ?></td>
                            <td><?php echo e($article->user_id); ?></td>
                            <td><?php echo e(str_limit($article->title, 3,'...')); ?></td>
                            <td><?php echo e($article->view); ?></td>
                            <td>
                                <a href="#" class="btn btn-danger btn-sm btn-del">恢复</a>
                                <form onsubmit="return confirm('您是否确定要恢复该文章？')" action="<?php echo e(route('admin.article.destroy',[$article->id])); ?>" method="post">
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
        <?php echo e($articles->appends(['type'=>request()->get('type','last')])->links()); ?>

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