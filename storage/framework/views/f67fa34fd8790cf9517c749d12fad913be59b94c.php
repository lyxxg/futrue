<?php $__env->startSection("content"); ?>

        <div class="js-tab tab" data-config='{
"triggerType":"mouseover",
"effect":"fade",
"invoke":3,
"auto":5000
		}'>
            <ul class="tab-nav">
                <li class="activend"><a href="#">文章</a></li>
                <li><a href="#">私信</a></li>
                <li><a href="#">系统</a></li>
            </ul>
            <div class="content-wrap">

                <div class="content-item curremt">
<?php $__currentLoopData = $notices; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $notice): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                        <a href="<?php echo e(route('user.index',['user_id'=>$notice->user_id])); ?>" class="futrue-user">
                            <?php echo e($notice->objectUser->name); ?></a>
                        <?php if($notice->action=="answer"): ?>
                           回答了关于你在
                            <a href="<?php echo e(route('article.show',$notice->object_id)); ?>" >
                                <?php echo e($notice->question->title); ?></a>的文章
                        <?php elseif($notice->action=="comment"): ?>
                            <p>评论了你的回答<p></p><?php echo e($notice->answer->content); ?></p>
                        <?php else: ?>

                            <p>回复了你的评论:<p><?php echo e($notice->comment->comment); ?></p></p>

                        <?php endif; ?>

                        <hr/>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                </div>

                <div class="content-item">
<?php $__currentLoopData = $notice2s; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $notice2): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    sdf
    sdf
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
sdf
                </div>

                <div class="content-item">
                qqqq
                    q
                    q

                    q
                    q
                    q

                </div>
            </div>


            <!--tab结束-->
        </div>
        </body>
        </html>
        <script src="http://lib.baomitu.com/jquery/3.2.0/jquery.min.js"></script>
        <script>
            $(function(){
                var tab1=new Tab($(".js-tab").eq(0));//获取js-tab的数据
            });
        </script>

        <script src="<?php echo e(asset('futrue/js/futruetab.js')); ?>"></script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('futrue.layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>