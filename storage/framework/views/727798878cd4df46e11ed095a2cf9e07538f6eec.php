<?php $__env->startSection("content"); ?>
    <div class="row">
        <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            {
            <?php echo e($error); ?>

            }
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
    <h2>资料修改</h2>

    <form action="<?php echo e(route('user.update',$user->id)); ?>"  method="post" enctype="multipart/form-data">
        <?php echo e(csrf_field()); ?>

        <?php echo e(method_field("put")); ?>

        <input type="hidden" name="id" value="<?php echo e($user->id); ?>">
        <div class="form-group">
            <label for="nick">昵称</label>
            <input type="text" class="form-control" id="nick" name="nick" value="<?php echo e(old('nick',$user->info->nick)); ?>" placeholder="昵称">
        </div>

描述
        <textarea class="form-control" name="description" rows="3"><?php echo e(old('nick',$user->info->description)); ?></textarea>


        <div class="form-group">
            <label for="old_password">旧密码</label>
            <input type="password" class="form-control" id="old_password" name="old_password" placeholder="旧密码">
        </div>
        <div class="form-group">
            <label for="password">新密码</label>
            <input type="password" class="form-control" id="password" name="password" placeholder="新密码">
        </div>
        <div class="form-group">
            <label for="password_confirmation">确认密码</label>
            <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" placeholder="确认密码">
        </div>




        <button type="submit" class="btn btn-default">确认修改</button>
    </form>

<?php $__env->stopSection(); ?>


<?php echo $__env->make('futrue.layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>