<?php $__env->startSection("content"); ?>
    <section class="content-header">
        <h1 title="这里用户">
            用户管理
            <small title="小黑屋的用户可以在回收站恢复">全部文章</small>
        </h1>
        <ol class="breadcrumb">
            <li title="主页"><a href="<?php echo e(route('admin.article.index')); ?>"><i class="fa fa-home"></i>
                    主页</a></li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">

        <!-- Default box -->


            <div class="box-body">

                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <td><i class="fa fa-circle">用户编号</i></td>
                        <td><i class="fa fa-user">用户名</i></td>
                        <td><i class="fa fa-bookmark">昵称</i></td>
                        <td><i class="fa fa-tag">头像</i></td>
                        <td><i class="fa fa-eye">积分</i></td>
                        <td><i class="fa fa-trash">操作</i></td>
                    </tr>
                    </thead>
                    <tbody>
                    <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td title="用户编号:<?php echo e($user->id); ?>"><?php echo e($user->id); ?></td>
                            <td title="用户名:<?php echo e($user->name); ?>">
                                <a href="<?php echo e(route('user.index',['user_id'=>$user->id])); ?>">
                                    <?php echo e($user->name); ?></a></td>
                            <td title="<?php echo e($user->info->nick); ?>">
                                <a href="<?php echo e(route('user.index',['user_id'=>$user->id])); ?>">
                                    <?php echo e(str_limit($user->info->nick, 6,'...')); ?>

                                </a>
                            </td>
                            <td>
                                <img src="<?php echo e(Storage::url($user->info->avatar)); ?>" width="30px">

                            </td>

                            <td title="积分:<?php echo e($user->info->coins); ?>"><?php echo e($user->info->coins); ?></td>
                            <td>
                   <?php if(!in_array($user->id,$bannedarr)): ?>
                                <a href="#" class="btn btn-danger btn-sm btn-del" title="小黑屋">小黑屋</a>
                                <form onsubmit="return confirm('您是否确定要将该用户加入小黑屋')" action="<?php echo e(route('admin.banneduser.destroy',$user->id)); ?>" method="post">
                                    <?php echo e(csrf_field()); ?>

                                    <?php echo e(method_field('delete')); ?>

                                </form>

                                <?php else: ?>
                                    <a href="#" class="btn btn-primary btn-sm btn-del" title="放出小黑屋">放出小黑屋</a>
                                    <form onsubmit="return confirm('您是否确定要将该用户放出小黑屋?')" action="<?php echo e(route('admin.banneduser.destroy',$user->id)); ?>"  method="post">
                              <input type="hidden" value="1" name="status">
                                        <?php echo e(csrf_field()); ?>

                                        <?php echo e(method_field('delete')); ?>

                                    </form>
                                <?php endif; ?>


                            </td>

                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>
            </div>

        </div>
        </body>
        </html>

        <?php $__env->stopSection(); ?>
        <?php $__env->startSection("js"); ?>

            <script src="http://lib.baomitu.com/jquery/3.2.0/jquery.min.js"></script>
            <script>
                $(function(){
                    $(".btn-del").click(function () {

                        $(this).siblings("form:first").submit();
                    });
                });


                $(function () {
                    $(".btn-add").click(function () {
                        $(this).siblings("form:last").submit();
                    })
                })


            </script>
<?php echo $__env->make('admin.layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>