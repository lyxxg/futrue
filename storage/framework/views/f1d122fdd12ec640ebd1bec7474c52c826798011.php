    

    <?php $__env->startSection("content"); ?>
        <div class="content">

            <div class="container-fluid">
                <div class="row-fluid">

                    <div class="span12">

                        <div class="well login-register">

                            <h5>登录</h5>
                            <hr />

                            <!-- Login form -->
                            <form class="form-horizontal" role="form" method="POST" action="<?php echo e(url('/login')); ?>">
                                <?php echo e(csrf_field()); ?>



                                <?php if($errors->has('name')): ?>
                                    <span class="help-block">
                                            <strong><?php echo e($errors->first('name')); ?></strong>
                                        </span>
                                <?php endif; ?>
                                <div class="futrue-form">
                                    <label class="futrue-input" for="name"></label>
                                    <div class="futrue-form">
                                        <input type="text" id="inputEmail" class="futrue-input" name="name" placeholder="邮箱/账号" value="<?php echo e(old('name')); ?>" required autofocus>

                                    </div>
                                </div>

                                <?php if($errors->has('password')): ?>
                                    <span class="help-block">
                                            <strong><?php echo e($errors->first('password')); ?></strong>
                                        </span>
                            <?php endif; ?>

                            <!-- Password -->
                                <div class="futrue-from">
                                    <label class="future-input" for="inputPassword"></label>
                                    <div class="futrue-from" class="futrue-input">
                                        <input type="password" id="inputPassword" name="password"  placeholder="密码"  name="password" class="futrue-input" >
                                    </div>
                                </div>


                                <!-- Remember me checkbox and sign in button -->
                                <div class="control-group">
                                    <div class="controls">
                                        <label class="checkbox">
                                            <input type="checkbox" name="remember" <?php echo e(old('remember') ? 'checked' : ''); ?>> 记住我
                                        </label>
                                        <br>
                                        <button type="submit" class="btn btn-inverse">登录</button>
                                    </div>
                                    <a class="btn btn-link" href="<?php echo e(url('/password/reset')); ?>">
                                        忘记密码?
                                    </a>

                                </div>
                            </form>

                        </div>

                    </div>

                </div>
            </div>

        </div>

        <div class="clearfix"></div>

    <?php $__env->stopSection(); ?>

<?php echo $__env->make('futrue.layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>