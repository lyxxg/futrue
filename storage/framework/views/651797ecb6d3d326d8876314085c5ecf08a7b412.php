<?php $__env->startSection("content"); ?>
    <?php $__currentLoopData = $notices; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $notice): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <a href="<?php echo e(route('user.index',['user_id'=>$article->user->id])); ?>"> <?php echo e($notice->objectUser->name); ?>

    <hr/>
    <?php if($notice->action=="answer"): ?>
        <p>回答了关于你在  <?php echo e($notice->question->title); ?></p>
    <?php else: ?>
        <p>评论了你的回答<?php echo e($notice->comment); ?></p>

    <?php endif; ?>

        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    <?php $__env->stopSection(); ?>
<?php echo $__env->make('futrue.layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>