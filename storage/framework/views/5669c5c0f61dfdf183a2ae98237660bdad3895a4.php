<?php $__env->startSection("content"); ?>
    <div class="post-foot well">
        <!-- Social media icons -->
        <h2><?php echo e($user->info->nick); ?></h2>
        </div>

            <div class="card hovercard">
                <div class="cardheader">

                </div>


                <div class="avatar">

                    <img alt="" src="<?php echo e("storage/".$user->info->avatar); ?>" id="avatar">
                </div>
                <div class="info">
                    <div class="title">
                        <a target="_blank" href="" ><?php echo e($user->info->nick); ?></a>
                    </div>
                            <?php if($user->info->sex==0): ?>
                        <i class="fa fa-transgender" style="font-size: 23px;color: deeppink"></i>
                        <?php elseif($user->info->sex==1): ?>
                        <i class="fa fa-mars" style="font-size: 23px;color: deepskyblue"></i>
                            <?php else: ?>
                                <i class="fa fa-transgender" style="font-size: 23px;color: purple"></i>

                                <?php endif; ?>

                    <p></p>
                   <?php if($user->info->coins<60): ?>
                    <span class="badge badge-secondary">LV1</span>
                    <?php elseif($user->info->coins>=60&&$user->info->coins<=120): ?>
                        <span class="badge badge-success">LV2</span>
                    <?php elseif($user->info->coins>=120&&$user->info->coins<=360): ?>
                        <span class="badge badge-info">LV3</span>

                    <?php elseif($user->info->coins>360&&$user->info->coins<=1024): ?>
                        <span class="badge badge-warning">LV4</span>

                    <?php endif; ?>

                    <div class="desc"><?php echo e($user->info->description); ?></div>

                    <?php if($user->id!=Auth::id()): ?>

                        <a href="<?php echo e(route('msg.create',['user_id'=>$user->id])); ?>">
        ss                    <i class="fa fa-envelope" style="font-size: 25px"></i>
                        </a>
                            <div class="btn btn-inverse">关注</div></a>

                    <?php endif; ?>

                </div>


                <div class="bottom">
                    <div class="underline"></div>
                    <ul class="social_links">
                        <li class="twitter animated bounceIn wow delay-02s animated" style="visibility: visible; animation-name: bounceIn;"><a href="<?php echo e(route('articlehistory.index',['user_id'=>$user->id])); ?>">文章</a></li>
                        <li class="facebook animated bounceIn wow delay-03s animated" style="visibility: visible; animation-name: bounceIn;"><a href="<?php echo e(route("user.collectionhis",['user_id'=>$user->id])); ?>">收藏</a></li>
                        <li class="pinterest animated bounceIn wow delay-04s animated" style="visibility: visible; animation-name: bounceIn;"><a href="<?php echo e(route("user.fans",['user_id'=>$user->id])); ?>">粉丝</a></li>
                        <li class="gplus animated bounceIn wow delay-05s animated" style="visibility: visible; animation-name: bounceIn;"><a href="/useredit">编辑</a></li>
                    </ul>
                </div>
            </div>

    <script>
var avatar=document.getElementById("avatar");
avatar.onclick=function () {

}


    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('futrue.layouts.userapp', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>