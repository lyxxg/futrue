<?php $__env->startSection("content"); ?>
    <div class="page-title">
        <?php $__currentLoopData = $msgs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $msg): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <ul class="comment-list">
                <li class="comment reply">
                    <a class="pull-left" href="#">
                        <img class="avatar" src="<?php echo e(\Illuminate\Support\Facades\Storage::url($msg->user->info->avatar)); ?>" content="futrue-avatar" style="border:solid 2px grey;height: 3em;width: 3em;text-decoration : none;cursor:url('http://127.0.0.1/futrue/public/futrue/ico/avatar.png'),auto;">
                    </a>
                    <div class="comment-author"><a href="#"><?php echo e($msg->user->info->nick); ?>

                        </a>        <span class="commentuser" title="<?php echo e($msg->created_at); ?>">
                            <?php echo e(date('h:m',strtotime($msg->created_at))); ?>

                        </span>                                          </div>
                    <div class="cmeta"></div>
                    <div data-comment-id="11" data-answer-id="5" data-typearticle="reply" data-belog="0" onclick="msgbox(1,this)">
<?php echo $msg->msg; ?>

                        </div>

                </li>

                <hr/>
            </ul>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
    <form action="<?php echo e(route('msg.store',$user_object_id)); ?>" method="post">
        <?php echo e(csrf_field()); ?>

<input type="hidden" name="user_object_id" value="<?php echo e($user_object_id); ?>">
        <script id="container" name="content" type="text/plain" class="futrue-editor">

        </script>
        <button class="btn-primary">提交</button>
    </form>

    <script type="text/javascript" src="<?php echo e(asset('baiduedit/ueditor.config.js')); ?>"></script>
    <!-- 编辑器源码文件 -->
    <script type="text/javascript" src="<?php echo e(asset('baiduedit/ueditor.all.js')); ?>"></script>
    <!-- 实例化编辑器 -->
    <script type="text/javascript">
        var ue = UE.getEditor('container', {
            toolbars: [
                ['simpleupload' ]
            ],
            autoHeightEnabled: true,
            autoFloatEnabled: true
        });
    </script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('Futrue.layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>