<?php $__env->startSection("content"); ?>
    <script src="https://cdn.bootcss.com/jquery/3.2.1/jquery.min.js"></script>

    <div class="post-foot well">
        <!-- Social media icons -->
        <h2><?php echo e($user->info->nick); ?></h2>
        </div>

            <div class="card hovercard">
                <div class="cardheader">

                </div>


                <div class="avatar">
                    <img  src="<?php echo e(\Illuminate\Support\Facades\Storage::url($user->info->avatar)); ?>" class="avatar1"
                 style="width: 13em;height: 13em;border-radius:50%;	box-shadow:2px 2px 2px yellow;overflow: hidden;"   >
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
                    私信<i class="fa fa-envelope" style="font-size: 25px"></i>
                        </a>
<form action="<?php echo e(route('attention')); ?>" method="post">
   <?php echo e(csrf_field()); ?>

    <input type="hidden" name="user_id" value="<?php echo e($user->id); ?>">
    <button class="btn btn-primary btn-sm">+关注</button>
</form>
                    <?php endif; ?>

                </div>


                <div class="bottom">
                    <div class="underline"></div>
                    <ul class="social_links">
                        <li class="twitter animated bounceIn wow delay-02s animated" style="visibility: visible; animation-name: bounceIn;"><a href="<?php echo e(route('articlehistory.index',['user_id'=>$user->id])); ?>">文章</a></li>
                        <li class="facebook animated bounceIn wow delay-03s animated" style="visibility: visible; animation-name: bounceIn;"><a href="<?php echo e(route("user.collectionhis",['user_id'=>$user->id])); ?>">收藏</a></li>
                        <li class="pinterest animated bounceIn wow delay-04s animated" style="visibility: visible; animation-name: bounceIn;"><a href="<?php echo e(route("user.fans",['user_id'=>$user->id])); ?>">粉丝</a></li>
                <?php if(Auth::id()==$user->id): ?>
                        <li class="gplus animated bounceIn wow delay-05s animated" style="visibility: visible; animation-name: bounceIn;"><a href="<?php echo e(route('user.edit',$user->id)); ?>">编辑</a></li>
                   <?php endif; ?>
                    </ul>
                </div>
            </div>

    <script>
        function ico1() {
            //我靠 ico居然是关键字
            //onchange="fileSelected();"
            document.getElementById("icofile").click();
        }

        function ico2() {
            // 文件选择后触发次函数
            var $file = $("#icofile");
            var fileObj = $file[0];
            var windowURL = window.URL || window.webkitURL;
            var dataURL;

            var $img = $("#img");
            if (fileObj && fileObj.files && fileObj.files[0]) {
                dataURL = windowURL.createObjectURL(fileObj.files[0]);
                $img.attr('src', dataURL);

            } else {
                dataURL = $file.val();
                var imgObj = document.getElementById("preview");
                imgObj.style.filter = "progid:DXImageTransform.Microsoft.AlphaImageLoader(sizingMethod=scale)";
                imgObj.filters.item("DXImageTransform.Microsoft.AlphaImageLoader").src = dataURL;
            }
        }

    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('futrue.layouts.userapp', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>