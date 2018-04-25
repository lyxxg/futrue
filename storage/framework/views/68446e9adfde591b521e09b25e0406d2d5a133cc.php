<script>
    window.Laravel = <?php echo json_encode([
        'csrfToken' => csrf_token(),
    ]); ?>
</script>
<div class="navbar navbar-fixed-top">
            <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </a>

            <div class="nav-collapse collapse">

                <ul class="nav pull-right">
                    <?php if(Auth::guest()): ?>
                    <li><a href="<?php echo e(route('login')); ?>">点击登录</a></li>

                        <?php else: ?>

<?php endif; ?>
                        <?php if(!Auth::guest()): ?>
                            <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"> <?php echo e(Auth::user()->name); ?> <b class="caret"></b></a>

                            <ul class="dropdown-menu">

                                <li>
                                    <a href="<?php echo e(route('user.index',['user_id'=>Auth::id()])); ?>">
                                        个人中心</a>
                                </li>

                                <li>
                                    <a href="<?php echo e(url('/logout')); ?>"
                                       onclick="event.preventDefault();
                                           document.getElementById('logout-form').submit();">
                                        注销
                                    </a>

                                    <form id="logout-form" action="<?php echo e(url('/logout')); ?>" method="POST" style="display: none;">
                                        <?php echo e(csrf_field()); ?>

                                    </form>
                                </li>
                                </li>
                            </ul>
                    </li>
<?php endif; ?>

                </ul>
            </div>
        </div>
    </div>
</div>
