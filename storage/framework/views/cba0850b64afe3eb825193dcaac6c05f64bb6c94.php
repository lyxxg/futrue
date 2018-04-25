<?php $__env->startSection("content"); ?>
    <section class="content-header">
        <h1 title="这里管理焦点图">
            焦点图
            <small title="焦点图">Focus</small>
        </h1>
        <ol class="breadcrumb">
            <li title="主页"><a href="<?php echo e(route('admin.article.index')); ?>"><i class="fa fa-home"></i>
                    主页</a></li>
        </ol>
    </section>
    <span style="display: none"><?php echo e($i=1); ?></span>

        <!-- Main content -->
    <form action="<?php echo e(route('admin.focus.store')); ?>" method="post" enctype="multipart/form-data">
        <?php $__currentLoopData = $focus; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $focu): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

        <?php echo e(csrf_field()); ?>

            <section class="content adminfutrue">
                            <!-- general form elements -->
            <input type="hidden" value="<?php echo e($focu->id); ?>" name="id<?php echo e($focu->id); ?>">
                            <div class="box box-primary">
                                <div class="box-header with-border">
                                    <h3 class="box-title">焦点图<?php echo e($i++); ?></h3>
                                </div>
                                <!-- /.box-header -->
                                <!-- form start -->
                                    <div class="box-body">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">标题</label>
                                            <input type="text" class="form-control" id="exampleInputEmail1" placeholder="标题"
                                            value="<?php echo e($focu->title); ?>" name="titles[]">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">链接</label>
                                            <input type="text" class="form-control" id="exampleInputPassword1" placeholder="链接"
                                            value="<?php echo e($focu->href); ?>" name="hrefs[]">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputFile">上传焦点图</label>
                                            <input type="file" id="exampleInputFile<?php echo e($i); ?>" value="<?php echo e($focu->ico); ?>"
                                            name="icos<?php echo e($i-1); ?>">

<img src="<?php echo e(\Illuminate\Support\Facades\Storage::Url($focu->ico)); ?>" class="admin-futrue-focus" style="max-height: 2%;max-width: 5%" onclick="icoadmin<?php echo e($i); ?>()">
                                            <p class="help-block">请点击上方上传焦点图</p>
                                        </div>
                                    </div>
                                    <!-- /.box-body -->


                            </div>
        </section>
            <script>

                function icoadmin<?php echo e($i); ?>(){
                    document.getElementById("exampleInputFile<?php echo e($i); ?>").click();
                }

            </script>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

    <div class="box-footer">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>


        </form>

        </body>
        </html>

        <?php $__env->stopSection(); ?>
        <?php $__env->startSection("js"); ?>


<?php echo $__env->make('admin.layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>