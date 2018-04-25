<?php $__env->startSection('content'); ?>

    <div class="container-fluid">
        <div class="row-fluid">

            <div class="span12">

                <div class="well login-register">

                    <h5>注册</h5>
                    <hr />

                    <div class="form">
                        <!-- Register form (not working)-->
                        <form class="form-horizontal" method="POST" action="<?php echo e(route('register')); ?>">
                        <?php echo e(csrf_field()); ?>

                            <!-- Name -->
                            <?php if($errors->has('name')): ?>
                                <span class="help-block">
                                        <strong><?php echo e($errors->first('name')); ?></strong>
                                    </span>
                            <?php endif; ?>
                            <div class="control-group">
                                <label class="control-label" for="name">账号</label>
                                <div class="controls">
                                    <input type="text" class="input-large" id="name" placeholder="数字或者字母"
                                     name="name"      value="<?php echo e(old('name')); ?>" required autofocus>
                                </div>
                            </div>


                            <?php if($errors->has('email')): ?>
                                <span class="help-block">
                                        <strong><?php echo e($errors->first('email')); ?></strong>
                                    </span>
                        <?php endif; ?>
                            <!-- Email -->
                            <div class="control-group">
                                <label class="control-label" for="email">绑定邮箱</label>
                                <div class="controls">
                                    <input type="email" class="input-large" id="email"  placeholder="慎重!
密码忘记可以通过邮箱找回密码" name="email" value="<?php echo e(old('email')); ?>" required>
                                </div>
                            </div>

                            <!-- Password -->
                            <div class="control-group">
                                <label class="control-label" for="email">密码</label>
                                <div class="controls">
                                    <input type="password" class="input-large" id="password"
                                           name="password" required>
                                </div>
                            </div>

                            <div class="control-group">
                                <label class="control-label" for="email">确认密码</label>
                                <div class="controls">
                                    <input type="password" class="input-large" id="password"
                                           name="password_confirmation" required>
                                </div>
                            </div>

                            <!-- Checkbox -->
                            <div class="control-group">
                                <div class="controls">
                                    <label class="checkbox inline">
                                        
                             

                                    </label>
                                </div>
                            </div>

                            <!-- Buttons -->
                            <div class="form-actions">
                                <!-- Buttons -->
                                <button type="submit" class="btn">注册</button>
                                <button type="reset" class="btn">重新填写</button>
                            </div>
                        </form>
                        已有未来账号了? <a href="<?php echo e(route('login')); ?>" class="btn-link">登录</a>
                    </div>
                </div>

            </div>

        </div>

    </div>
    </div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('futrue.layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>