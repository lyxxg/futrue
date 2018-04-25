<?php $__env->startSection("content"); ?>
    <section id="experience" class="timeline">
        <h2></h2>
        收藏时间:
        <?php $__currentLoopData = $collections; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $collection): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <?php echo e($collection->created_at); ?>

            <div class="message-item" id="m5">
                <div class="message-inner">
                    <div class="msage-heades clearfix">
                        <div class="user-detail">
                            <a href="<?php echo e(route('article.show',$collection->question->id)); ?>"><h5 class="handle"><?php echo e($collection->question->title); ?></h5></a>
                            <div class="post-meta">
                                <div class="asker-meta">
                                    <span class="qa-message-what"></span>
                                    <span class="qa-message-when">
												<span class="qa-message-when-data"><?php echo e($collection->question->view); ?></span>
											</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="qa-message-content">

                    </div>
                </div></div>

    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>



<?php $__env->stopSection(); ?>

<?php echo $__env->make('futrue.layouts.userapp', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>