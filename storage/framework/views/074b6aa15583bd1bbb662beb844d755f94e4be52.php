<?php $__env->startSection("content"); ?>
    <div class="post-foot well">
        <!-- Social media icons -->

        <?php $__currentLoopData = $articles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $article): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <p>   <a href="<?php echo e(route('article.show',$article->question->id)); ?>">         <?php echo e($article->question->title); ?></a></p>
            <p></p>

            <div class="meta">
                <a href="<?php echo e(route('user.index',['user_id'=>$article->question->user_id])); ?>"> <i class="fa fa-user"></i><?php echo e($article->question->user->name); ?> </a>
                    <a href="<?php echo e(route("tag.show",$article->tag)); ?>">
                        <i class="fa fa-tag"></i>
                        <?php echo e($article->tag->name); ?></a>
                    <!--加个标签链接-->
                <i class="fa fa-calendar"></i>
                <?php echo e($article->question->created_at->diffForHumans()); ?>

                <span class="pull-right">
                    <i class="fa fa-eye"></i> <?php echo e($article->question->view); ?>

                    <a href="#">
                        <i class="fa fa-comment"></i>
                        <?php echo e($article->question->answer); ?></a>
                            </span>


            <hr/>
        </div>

        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>

    <?php $__env->stopSection(); ?>
<?php echo $__env->make('Futrue.layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>