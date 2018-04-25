<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<div>
    张三回答了你的问题
    <ul>
        <?php $__currentLoopData = $notices; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $notice): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <li>
            <?php echo e($notice->object_UserInfo->info->nick); ?>

            <?php if($notice->action=="answer"): ?>
                回答了您的问题<span style="color: #adadad;">
                    <a href='question/<?php echo e($notice->object_question_id); ?>'><?php echo e($notice->question->title); ?>></span>
            <?php elseif($notice->action=="comment"): ?>
                评论了关于您<span style="color: #adadad;">
                    <?php echo e($notice->comment->question->title); ?>></span>的答案  </li>
	        <?php elseif($notice->action=="reply"): ?>

            <?php endif; ?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </ul>
</div>

</body>
</html>