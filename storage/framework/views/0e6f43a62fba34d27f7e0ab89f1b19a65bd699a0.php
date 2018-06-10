<script type="text/javascript" src="<?php echo e(asset('futrue/my/myfocus-2.0.4.full.js')); ?>"></script><!--引入myFocus库-->

<?php $__env->startSection("content"); ?>
    <script type="text/javascript" src="<?php echo e(asset('baiduedit/ueditor.parse.js')); ?>"></script>

    <script>
        uParse('.content', {
            rootPath: '<?php echo e(asset("baiduedit")); ?>'
        })
    </script>


    <!-- 焦点图盒子 -->

    <div class="box-body blog">

        <div class="row-fluid">

            <div class="span8">
                <div id="boxID">
                    <!-- 载入中的Loading图片(可选) -->
                    <!-- 内容列表 -->
                    <div class="pic">
                        <ul>
                            <?php $__currentLoopData = $focus; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $focu): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li>
                                    <a href="//<?php echo e($focu->href); ?>">
                                        <img src="<?php echo e(\Illuminate\Support\Facades\Storage::url($focu->ico)); ?>" alt="<?php echo e($focu->title); ?>"id="futruefocusimg"  />
                                    </a> </li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </ul>
                    </div>
                </div>

                <div class="posts">

                    <?php $__currentLoopData = $articles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $article): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="entry">
                            <h2><a href="#"><?php echo e($article->title); ?></a></h2>
                            <div class="meta">
                                <a href="<?php echo e(route('user.index',['user_id'=>$article->user->id])); ?>">
                                    <img src="<?php echo e(\Illuminate\Support\Facades\Storage::url($article->user->info->avatar)); ?>" class="futrue-avatar"
                                         title="点击查看<?php echo e($article->user->info->nick); ?>的资料">
                                </a>
                                <a href="<?php echo e(route('user.index',['user_id'=>$article->user->id])); ?>" title="点击查看<?php echo e($article->user->name); ?>的资料">
                                    <i class="fa fa-user" ></i>
                                    <?php echo e($article->user->info->nick); ?>


                                </a>
                                <?php $__currentLoopData = $article->tags; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tag): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <a href="<?php echo e(route("tag.show",$tag->id)); ?>"><i class="fa fa-tag"
                                                                                title="点击查看<?php echo e($tag->name); ?>的介绍"></i><?php echo e($tag->name); ?></a>
                                    <!--加个标签链接-->
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <i class="icon-calendar" title="发布于<?php echo e($article->created_at->diffForHumans()); ?>"></i> <?php echo e($article->created_at->diffForHumans()); ?>

                                <span class="pull-right">
                                <i class="fa fa-eye" title="<?php echo e($article->view); ?>"></i> <?php echo e($article->view); ?>

                                    <a href="#"><i class="fa fa-comment"></i> <?php echo e($article->answer); ?></a>
                            </span>
                            </div>

                            <!-- Thumbnail -->
                            <div class="futre-index">
                                <!-- Para -->
                                <?php echo $article->content; ?>

                            </div>
                            <!--Read more -->
                            <div class="futrue-btn">
                            <a href="<?php echo e(route('article.show',$article->id)); ?>" >查看更多</a>
                            </div>
                            </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <!-- Pagination -->

                    <div class="pagination">
                        <ul>
                            <?php echo e($articles->appends(['type'=>request()->get('type','last')])->links()); ?>

                        </ul>
                    </div>

                </div>
            </div>

            <div class="span4">
                <!-- Sidebar 2 -->

                <div class="blog-sidebar">
                    <!-- Widget -->
                    <div class="widget">
                        <h4>公告</h4>
                        <?php if($announcement!=null): ?>
                            <span class="announcement">
                        <?php echo $announcement->content; ?>

                      </span>
                        <?php else: ?>
                            暂无公告
                        <?php endif; ?>
                    </div>


                    <div class="widget">
                        <h4>热门榜</h4>
                        <ul>
                            <?php $__currentLoopData = $questionhots; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $questionhot): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li>
                                    <i class="fa fa-paper-plane-o"></i>
                                    <a href="<?php echo e(route('article.show',$questionhot->id)); ?>">
                                        <?php echo e($questionhot->title); ?>

                                    </a>
                                </li>

                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </ul>
                    </div>





                </div>
            </div>



        </div></div>

    </div>
    </div>

<?php $__env->stopSection(); ?>


<script type="text/javascript">
    myFocus.set({
        id:'boxID',//焦点图盒子ID
        pattern:'mF_dleung',//风格应用的名称
        time:2,//切换时间间隔(秒)
        height:210,
        trigger:'mouseover',//触发切换模式:'click'(点击)/'mouseover'(悬停)
        txtHeight:'30',//文字层高度设置(像素),'default'为默认高度，0为隐藏
        delay:0,
        warp:true,
        });
</script>
<style>
    #vjs_video_4{
        max-width: 100%;
    }

    </style>
<?php echo $__env->make('Futrue.layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>