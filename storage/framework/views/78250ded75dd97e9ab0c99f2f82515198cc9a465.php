<?php $__env->startSection("content"); ?>
        <div class="js-tab tab" data-config='{
"triggerType":"mouseover",
"effect":"fade",
"invoke":3,
"auto":5000
		}' style="height: 500px;width:82%;overflow:auto">

            <ul class="tab-nav">
                <li class="activend"><a href="#">文章</a></li>
                <li><a href="#">私信</a></li>
                <li><a href="#">系统</a></li>
            </ul>
            <div class="content-wrap">
                <div class="content-item curremt">
                    <?php $__currentLoopData = $notices; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $notice): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="meta">
                            <a href="<?php echo e(route('user.index',['user_id'=>$notice->user_id])); ?>" class="futrue-user">

                        <img src="<?php echo e(\Illuminate\Support\Facades\Storage::url($notice->objectUser->info->avatar)); ?>" class="futrue-avatar"
                             title="点击查看<?php echo e($notice->objectUser->info->nick); ?>的资料">
                            <?php echo e($notice->objectUser->info->nick); ?>

                                        </a><?php echo e($notice->created_at); ?></div>

                        <?php if($notice->action=="answer"): ?>
                            回答了你发布的文章
                            <span class="noticearticle"><a href="<?php echo e(route('article.show',$notice->object_id)); ?>" >
                                <?php echo e(str_limit($notice->question->title, 30,'...   ')); ?>

                            </a>  </span>

                        <?php elseif($notice->action=="comment"): ?>
                            <a href="<?php echo e(route('article.show',$notice->object_id)); ?>" >
                                评论了你的回答</a>
                            <a href=""><?php echo str_limit($notice->answer->content, 30,'...'); ?>

                            </a>
                        <?php else: ?>
                            回复了你的评论: <?php echo str_limit($notice->comment->comment, 30,'...'); ?>


                        <?php endif; ?>

                        <hr/>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                </div>

                <div class="content-item">
                    <?php $__currentLoopData = $notice2s; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $notice2): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="meta">
                            <a href="<?php echo e(route('user.index',['user_id'=>$notice2->user_id])); ?>" class="futrue-user">

                                <img src="<?php echo e(Storage::url($notice2->objectUser->info->avatar)); ?>" class="futrue-avatar" title="点击查看百度的资料">
                               <?php echo e($notice2->objectUser->info->nick); ?>

                            </a><?php echo e($notice2->created_at); ?></div>
                   <?php echo $notice2->object_notices->msg; ?>

                        <hr/>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                </div>

                <div class="content-item">
                  暂无
                </div>
            </div>


            <!--tab结束-->

    </div>
    <script src="http://lib.baomitu.com/jquery/3.2.0/jquery.min.js"></script>
    <script>
        $(function(){
            var tab1=new Tab($(".js-tab").eq(0));//获取js-tab的数据
        });
    </script>

    <script src="<?php echo e(asset('futrue/js/futruetab.js')); ?>"></script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('Futrue.layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>