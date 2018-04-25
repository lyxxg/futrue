<!-- Sidebar starts -->
<div class="sidebar">

    <!-- Logo -->
    <div class="logo">
        <a href="#"></a>
    </div>



    <div class="sidebar-dropdown"><a href="#">
                    <i class="fa fa-chevron-right"></i>
                    <导航></导航> <span class="pull-right">
                        <i class="icon-chevron-right"></i></span></a>

        </a></div>

    <!--- Sidebar navigation -->
    <!-- If the main navigation has sub navigation, then add the class "has_sub" to "li" of main navigation. -->

    <!-- Colors: Add the class "br-red" or "br-blue" or "br-green" or "br-orange" or "br-purple" or "br-yellow" to anchor tags to create colorful left border -->
    <div class="s-content">

        <ul id="nav">
            <!-- Main menu with font awesome icon -->
            <li><a href="<?php echo e(route('article.index')); ?>" class="open br-red"><i class="fa fa-home"></i> 主页</a>
            </li>
            <li><a href="<?php echo e(asset('article/create')); ?>" class="br-orange"><i class="fa fa-plus-square"></i>发表文章</a></li>


            <li class="has_sub" id="fa-chevron-right"><a href="#" class="br-green">
                    <i class="fa fa-chevron-right"></i>
                    分类 <span class="pull-right">
                        <i class="icon-chevron-right"></i></span></a>
                <ul>
                    <span style="display:none "><?php echo e($tags=\App\Models\Tag::all()); ?></span>
<?php $__currentLoopData = $tags; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tag): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li><a href="<?php echo e(route('tagarticle',$tag->id)); ?>"><?php echo e($tag->name); ?></a></li>
               <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>
            </li>




            <li><a href="<?php echo e(asset('notices')); ?>" class="br-purple"><i class="fa fa-address-book"></i> 通知</a></li>

            <li><a href="<?php echo e(asset('about')); ?>" class="br-blue"><i class="fa fa-address-book"></i> 关于此博客</a></li>
            <li><a href="<?php echo e(asset('feedback')); ?>" class="br-yellow"><i class="fa fa-envelope-o"></i> 反馈建议</a></li>
        </ul>





        <!-- Sidebar search -->


        <form class="form-search" action="<?php echo e(route('futruesearch')); ?>" method="post">
            <?php echo e(csrf_field()); ?>

            <div class="input-append">

                <input type="text" class="input-small search-query" name="content"
                    value="<?php echo e(old('content')); ?>" placeholder="搜一下 你的知道" required autofocus>
                <button type="submit" class="btn btn-info" >搜索</button>
            </div>
        </form>

        <!-- Sidebar widget -->

        <div class="s-widget">
            <h6>未来笔记</h6>
            <p>未来的日记全由你决定  未来做主</p>
        </div>

    </div>
</div>
<script>
    var i=0;//懒着用if了 直接用这个算了
var j=0;
    document.getElementById("fa-chevron-right").onclick=function () {
        // /$(".fa-chevron-right").toggle("1000");
        if(i%2==0) {
//为了特效真麻烦
            $(".fa-chevron-right").css("-webkit-transform", "rotate(90deg)");
            i++;
        }else {
            $(".fa-chevron-right").css("-webkit-transform", "rotate(0deg)");
            i++;
        }
    }

    document.getElementById("futrue-notice").onclick=function () {

        // /$(".fa-chevron-right").toggle("1000");
        if(j%2==0) {
//为了特效真麻烦
//            alert("q");
            $("#futrue-notices").css("-webkit-transform", "rotate(90deg)");

            j++;
        }else {
            $("#futrue-notices").css("-webkit-transform", "rotate(0deg)");
            j++;
        }
    }




</script>
<!-- Sidebar ends -->