<?php $__env->startSection("content"); ?>
    <div class="page-title">
        <h2>反馈<span>未来笔记</span></h2>
    </div>

    <div class="post-foot well">
        <h3>发送成功 <span id="timeback">3</span>秒后自动跳转到<a href="<?php echo e(route('article.index')); ?>">
                <span class="feedbackyes">首页</span></a></h3>
    </div>
<script>
   document.getElementById("timeback").innerHTML="s";
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('futrue.layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>