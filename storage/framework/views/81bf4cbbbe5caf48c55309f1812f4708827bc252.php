
<div class="slide-box" onclick="ready()" style="width: 324px;style="display:balok;">
<?php if(!Auth::guest()): ?>
    <span style="display: none">
    <?php echo e($notices=Auth::user()->notice->whereIn('status','0')); ?>

</span>

    <div class="bor" ></div>
    <div class="padd" >
        <div class="slide-box-button" style="background-color: navajowhite">
            <i class="fa fa-chevron-circle-left"></i>
                <span class="futrue-badge"></span></i>
        </div>

        <h5>           <i class="fa fa-commenting"  >
                <?php if($notices->count()!=null): ?>
                <span style="color: red;font-size: 20px"><?php echo e($notices->count()); ?></span>
           <?php else: ?>
                    <span style="color: white;font-size: 20px">暂无消息</span>
                <?php endif; ?>

            </i>
        </h5>
        <hr/>


    <?php $__currentLoopData = $notices; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $notice): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <a href="<?php echo e(route('user.index',['user_id'=>$notice->user_id])); ?>" class="futrue-user">   <?php echo e($notice->objectUser->name); ?></a>

            <?php if($notice->action=="answer"): ?>
                    <p>回答了关于你在 <p></p> <a href="<?php echo e(route('article.show',$notice->object_id)); ?>" >
                        <?php echo e($notice->question->title); ?></a></p>的文章
            <?php elseif($notice->action=="comment"): ?>
                    <p>评论了你的回答<p></p><?php echo e($notice->answer->content); ?></p>
           <?php else: ?>

                    <p>回复了你的评论:<p><?php echo e($notice->comment->comment); ?></p></p>

                <?php endif; ?>

<hr/>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php else: ?>
            未登录，请登录
        <?php endif; ?>

    </div>
</div>
<script>
    function  ready() {
        var xhr=new XMLHttpRequest();
        xhr.open('GET',"http://127.0.0.1/noticeready",true);
        xhr.send();
    }
    </script>