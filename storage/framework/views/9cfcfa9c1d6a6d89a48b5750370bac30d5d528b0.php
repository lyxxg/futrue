<?php $__env->startSection("content"); ?>
    <div class="box-body blog">
        <div class="row-fluid">

            <div class="span8">
                <div class="posts">

                    <!-- Each posts should be enclosed inside "entry" class" -->
                    <!-- Post one -->
                    <div class="entry">
                        <h2><a href="#"><?php echo e($article->title); ?></a></h2>
                        <!-- Meta details -->
                        <div class="meta">
                            <a href="<?php echo e(route('user.index',['user_id'=>$article->user->id])); ?>"> <i class="fa fa-user"></i> <?php echo e($article->user->name); ?></a>
                            <?php $__currentLoopData = $article->tags; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tag): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <a href="<?php echo e(route("tag.show",$tag->id)); ?>"><i class="fa fa-tag"></i><?php echo e($tag->name); ?></a>
                                <!--加个标签链接-->
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                            <i class="icon-calendar"></i>
                            <?php echo e($article->created_at->diffForHumans()); ?>

                            <span class="pull-right">
                            <i class="fa fa-eye"></i> <?php echo e($article->view); ?>

                                <a href="#"><i class="fa fa-comment"></i> <?php echo e($article->answer); ?></a>
                                <a href="#"><i class="fa fa-star"></i> <?php echo e($article->collection); ?></a>

                        </div>
                        <!-- Thumbnail -->
                        <div class="bthumb">
                            <a href="#"><img src="img/photos/blog1.jpg" alt="" /></a>

                            <?php echo $article->content; ?>                        </div>
                    </div>
                    <span style="display: none"><?php echo e($result=\App\Models\Collection::all()->whereIn('user_id',\Illuminate\Support\Facades\Auth::id())->whereIn('question_id',$article->id)); ?>

                    </span>

                    <form action="<?php echo e(route('user.collection',['article'=>$article])); ?>" method="post">
                        <?php echo e(csrf_field()); ?>


                    <?php if($result->first()!=null): ?>
                            <button class="futrue-collection" title="感谢你的收藏 有<?php echo e($article->collection); ?>人和你一样明智的收藏了">
                                <img src="<?php echo e(asset('/futrue/img/ico/22.gif')); ?>" class="futrue-collection-ico">
                            </button>

<?php else: ?>
                            <button class="futrue-collection">
                                <img src="<?php echo e(asset('/futrue/img/ico/33.gif')); ?>" class="futrue-collection-ico" title="为什么你还不点收藏 快点我">

                            </button>
                        <?php endif; ?>
                    </form>
                    <div class="post-foot well">
                        <!-- Social media icons -->
                        <div class="social">

                            <a href="#"></a>
                            <a href="#"><i class="jiathis_button_weixin"></i></a>
                            <a href="#"><i class="fa fa-share-alt-square"></i></a>
                            <a class="jiathis_button_tools_2"><i class="fa fa-qq"></i></a>
                            <a class="jiathis_button_weixin"><i class="fa fa-wechat"></i></a>
                            <a href="#"><i class="icon-google-plus google-plus"></i></a>
                        </div>
                    </div>

                    <hr />

                    <!-- Comment section -->

                    <div class="comments">

                        <div class="title"><h5><?php echo e($article->answer); ?>回答</h5></div>

                        <ul class="comment-list">
                            <!--回答内容-->
                            <?php $__currentLoopData = $article->answers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $answer): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li class="list-group-item">

                                    <ul class="comment">
                                        <a class="pull-left" href="#">
                                            <img class="avatar" src="http://placekitten.com/64/64" >
                                        </a>
                                        <div class="comment-author"><a href="#"><?php echo e($answer->user->name); ?></a></div>


                                        <div class="cmeta"><?php echo e($answer->created_at->diffForHumans()); ?></div>
                                        <p  >
                                           <div date-answer-id="<?php echo e($answer->id); ?>" data-answer-id=<?php echo e($answer->id); ?> data-typearticle="comment"  onclick="msgbox(1,this)">
                                            <?php if($article->status==0&&Auth::id()==$article->user_id): ?>
                                                <form action="<?php echo e(route('answer.accept',['question_id'=>$article->id,'answer_id'=>$answer->id])); ?>" method="post">
                                                    <?php echo e(csrf_field()); ?>

                                                    <input type="submit" class="btn btn-warning" value="采纳">
                                                </form>
                                            <?php endif; ?>

                                            <!--回答的--><?php echo $answer-> content; ?>

                 </div>
                                        <?php if($answer->accept==1): ?>
                                            <span style="color:red">已采纳</span>
                                        <?php endif; ?>

                                        <div class="goodandbad">
<?php if(\App\Models\Answergoodandbad::all()->whereIn('user_id',Auth::id())->whereIn('answer_id',$answer->id)->first()!=null): ?>
                                        <i class="fa fa-thumbs-up" id="futrue-thumbs<?php echo e($answer->id); ?>" data-answer-id="<?php echo e($answer->id); ?>"  onclick="good(this);">
                                            <?php echo e($answer->good); ?></i>
                                            <?php else: ?>
    
                                                <i class="fa fa-thumbs-o-up"  data-answer-id="<?php echo e($answer->id); ?>"  onclick="good(this);" id="futrue-thumbs<?php echo e($answer->id); ?>">
                                                    <?php echo e($answer->good); ?></i>
                                            <?php endif; ?>


    <?php if(\App\Models\Bad::all()->whereIn('user_id',Auth::id())->whereIn('answer_id',$answer->id)->first()!=null): ?>

                                            <i class="fa fa-thumbs-down" id="futrue-bad<?php echo e($answer->id); ?>" data-answer-id="<?php echo e($answer->id); ?>" onclick="bad(this);">
                                                <?php echo e($answer->bad); ?>

                                            </i>
<?php else: ?>
        <i class="fa fa-thumbs-o-down" id="futrue-bad<?php echo e($answer->id); ?>" data-answer-id="<?php echo e($answer->id); ?>" onclick="bad(this);">
            <?php echo e($answer->bad); ?>

        </i>
    <?php endif; ?>
                                        </div>
                                            </p>
                                    </ul>
                                    </ul>

                                        <div class="clearfix"></div>


                                    </ul>
                                    <!--评论者-->
                                <?php $__currentLoopData = $answer->comments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $comment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                    <li class="comment reply">
                                        <a class="pull-left" href="#">
                                            <img class="avatar" src="http://placekitten.com/64/64">
                                        </a>
                                        <div class="comment-author"><a href="#"><?php echo e($comment->user->info->nick); ?></a></div>

                                        <div class="cmeta"><?php echo e($comment->create); ?></div>
                                        <div data-comment-id="<?php echo e($comment->id); ?>" data-answer-id=<?php echo e($answer->id); ?>  data-typearticle="reply" onclick="msgbox(1,this)">

                                          <!--评论的--> <?php echo e("@".$answer->user->info->nick); ?>:</span>

                                            <?php echo $comment->comment; ?></div>
                                    </li>

                                        <div class="clearfix"></div>
                                    </li>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>





                                    </li>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </ul>

                        </ul>
                    </div>
                <?php if(Auth::guest()): ?><!--如果没有登陆-->
                    <div class="respond well">
                        <div class="title"><h5>你未登录 无法评论 请登录</h5></div>

                        <div class="form">
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
                                    <a class="btn btn-link" href="<?php echo e(url('/register')); ?>">
                                        注册
                                    </a>
                                </div>
                            </form>
                        </div>
                    </div>
                    <?php else: ?>
                        <hr/>
                        <h3>回答</h3>



                        <form action="<?php echo e(route('answer.store')); ?>" method="post">
                            <?php echo e(csrf_field()); ?>

                            <input type="hidden" name="question_id" value="<?php echo e($article->id); ?>">

                            <script id="container" name="content" type="text/plain">
                            </script>
                            <button class="btn-primary">回答</button>
                        </form>



                <?php endif; ?>



                <!---回复的表单提交-->
                    <form id="futrue_comment" action="<?php echo e(route('comment.store')); ?>" method="post">
                        <?php echo e(csrf_field()); ?>

                        <div id='futrue-commentinput' class="futrue-box" >
                            <a class='futrue-x' href=''; onclick="msgbox(0,this); return false;">关闭</a>
                            <input type="hidden" id="type_article" name="type_article" value="">
                            <input type="hidden" id="answer_id" name="answer_id" value="">
                            <input type="hidden" id="comment_id" name="comment_id" value="">
                            <script id="reply" name="comment" type="text/plain">
                            </script>
                            <button class="btn btn-info" >回复</button>

                        </div>

                    </form>
                    <!-- Navigation -->



                    <div class="clearfix"></div>

                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript" src="http://v3.jiathis.com/code/jia.js?uid=1" charset="utf-8"></script>

    <script type="text/javascript" src="<?php echo e(asset('baiduedit/ueditor.config.js')); ?>"></script>
    <!-- 编辑器源码文件 -->
    <script type="text/javascript" src="<?php echo e(asset('baiduedit/ueditor.all.js')); ?>"></script>
    <!-- 实例化编辑器 -->
    <script type="text/javascript" src="<?php echo e(asset('futrue/js/futrue.js')); ?>"></script>


<?php $__env->stopSection(); ?>

<?php echo $__env->make('futrue.layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>