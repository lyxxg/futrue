<?php $__env->startSection("content"); ?>

    <div class="post-foot well">
        <h1 style="text-align: center">小黑屋</h1>
        <p class="text-center">尊敬的:<span class="label label-info"><?php echo e($user->info->nick); ?></span></p>
        由于你 <span><?php echo e($banned->content); ?></span>
        被管理员<em class=""><?php echo e(\App\Models\User::find("$banned->object_user_id")->info->nick); ?></em>于
        <?php echo e($banned->created_at); ?>加入小黑屋

    </div>
    <?php $__env->stopSection(); ?>
<?php echo $__env->make('Futrue.layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>