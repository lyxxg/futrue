<?php $__env->startSection("content"); ?>
    <section id="experience" class="timeline">
            <h2></h2>

       <?php $__currentLoopData = $articlehistorys; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $article): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php echo e($article->created_at); ?>

               <div class="message-item" id="m5">
            <div class="message-inner">
                <div class="msage-heades clearfix">
                            <div class="user-detail">
                                <a href="<?php echo e(route('article.show',$article->id)); ?>"><h5 class="handle"><?php echo e($article->title); ?></h5></a>
                                <div class="post-meta">
                                    <div class="asker-meta">
                                        <span class="qa-message-what"></span>
                                        <span class="qa-message-when">
												<span class="qa-message-when-data"><?php echo e($article->view); ?></span>
											</span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="qa-message-content">
                            <?php echo e($article->descript); ?>

                        </div>
                    </div></div>

<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>



<?php $__env->stopSection(); ?>

<?php echo $__env->make('futrue.layouts.userapp', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>