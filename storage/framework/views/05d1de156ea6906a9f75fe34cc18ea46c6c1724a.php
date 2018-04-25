<?php $__env->startSection("content"); ?>
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            标签分类列表
        </h1>
    </section>

    <!-- Main content -->
    <section class="content">

        <!-- Default box -->
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">标签分类列表</h3>
            </div>
            <div class="box-body">
                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <td>编号</td>
                        <td>标签名</td>
                        <td>标签分类名</td>
                        <td>标签图标</td>
                        <td>操作</td>
                    </tr>
                    </thead>
                    <tbody>

                    <?php $__currentLoopData = $tags; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tag): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td><?php echo e($tag->id); ?></td>
                            <td><?php echo e($tag->name); ?></td>
                            <td><?php echo e(($tag->TagType->type_name)); ?></td>
                            <td><img src="<?php echo e(Storage::url($tag->ico)); ?>" width="30" class="img" /></td>
                            <td> <a href="<?php echo e(route("admin.tag.edit",[$tag->id])); ?>" class="btn btn-primary btn-sm">编辑</a>
                                <a href="#" class="btn btn-danger btn-sm btn-del">删除</a>
                                <form onsubmit="return confirm('您是否确定要删除该标签？')" action="<?php echo e(route('admin.tag.destroy',[$tag->id])); ?>" method="post">
                                    <?php echo e(csrf_field()); ?>

                                    <?php echo e(method_field('delete')); ?>

                                </form>

                            </td>

                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>
            </div>
            <!-- /.box-body -->
        </div>
        <!-- /.box -->
        <a href="<?php echo e(route("admin.tagtype.create")); ?>" class="btn btn-success">添加标签分类</a>
    </section>
    <!-- /.content -->
<?php $__env->stopSection(); ?>

<?php $__env->startSection("js"); ?>
    <script>
        $(function(){
            $(".btn-del").click(function () {
                $(this).siblings("form:first").submit();
            });
        });



    </script>`
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>