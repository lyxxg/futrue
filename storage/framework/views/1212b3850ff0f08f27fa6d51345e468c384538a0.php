<?php $__env->startSection("content"); ?>
    <div class="post-foot well">
        <!-- Social media icons -->

        <?php $__currentLoopData = $articles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $article): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <p>   <a href="<?php echo e(route('article.show',$article)); ?>">
                        <?php echo e($article->title); ?></a></p>
            <p></p>

            <div class="meta">
                <a href="<?php echo e(route('user.index',['user_id'=>$article->user_id])); ?>"> <i class="fa fa-user"></i><?php echo e($article->user->name); ?> </a>
                <?php $__currentLoopData = $article->tags; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tag): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <a href="<?php echo e(route("tag.show",$tag->id)); ?>">
                    <i class="fa fa-tag"></i><?php echo e($tag->name); ?></a>
                <!--加个标签链接-->
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <i class="fa fa-calendar"></i> <?php echo e($article->created_at->diffForHumans()); ?>

                <span class="pull-right">
                                <i class="fa fa-eye"></i> <?php echo e($article->view); ?>

                    <a href="#"><i class="fa fa-comment"></i> <?php echo e($article->answer); ?></a>
                            </span>


                <hr/>
            </div>

        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('futrue.layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>