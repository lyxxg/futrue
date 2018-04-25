<?php $__env->startSection("content"); ?>
    <div class="meta">
        <h2 class="title-futrue">
        粉丝列表
        </h2>
    </div>
    <hr>
        <div class="box-body service">
        <?php $__currentLoopData = $fans; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $fan): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

            <div class="span3">

                <!-- Service block #1 -->
                <div class="service-block">

                    <!-- link -->
                    <a href="<?php echo e(route('user.index',['user_id'=>$fan->user_id])); ?>">
                        <div class="service-image b-blue">
                            <img  src="<?php echo e("http://192.168.43.132:1234/blog5/public/storage/".$fan->user->info->avatar); ?>" id="avatar">
                        </div>
                    </a>
                    <!--Title -->
                    <h4><a href="<?php echo e(route('user.index',['user_id'=>$fan->user_id])); ?>"><?php echo e($fan->user->info->nick); ?></a></h4>
                    <!-- Para -->
                    <p><?php echo e($fan->user->info->description); ?> </p>
                </div>

            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

        </div>


        </div>
   <?php $__env->stopSection(); ?>
<?php echo $__env->make('futrue.layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>