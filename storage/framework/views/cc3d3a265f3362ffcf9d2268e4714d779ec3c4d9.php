<?php $__env->startSection("content"); ?>

    <h2>文章发布</h2>
    <div>
        <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <p><?php echo e($error); ?></p>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>




    <form action="<?php echo e(route('article.store')); ?>" method="post">
        <?php echo e(csrf_field()); ?>

        <?php if(Auth::guest()): ?>
            <p>
            <input type="text" name="title" value="<?php echo e(old("title")); ?>" class="form-control" placeholder="未登陆  请先登陆"  readonly>
        </p>
<?php else: ?>
            <p>
                <input type="text" name="title" value="<?php echo e(old("title")); ?>" class="form-control" placeholder="至少3个字符 最大10000   ">
            </p>
        <?php endif; ?>

        <div>
            <h5>分类:至少选择一个板块</h5>
<ul>
            <?php $__currentLoopData = $types; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $type): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
     <div>

                    <?php $__currentLoopData = $type->Tags; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tag): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <li>
              <label class="futrue-float">
                  <input type="checkbox"
                         <?php if(in_array($tag->id,old("tag_id",[]))): ?> checked <?php endif; ?> name="tag_id[]" value="<?php echo e($tag->id); ?>"
                         id="checkbox_a1" class="chk_1futrue" >
                  <?php echo e($tag->name); ?>

              </label>
          </li>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</ul>
        </div>



        <?php if(Auth::guest()): ?>
        <script id="container" name="content" type="text/plain"
                contenteditable="false" >
     请先登陆再发帖
        </script>

            <p>
                <a href="<?php echo e(route('login')); ?>" class="">
                    <input type="" value="登录" class="btn btn-inverse unlogin">
                </a>

        <?php else: ?>
            <script id="container" name="content" type="text/plain"
                    contenteditable="false" >
        </script>

            <p><input type="submit" value="发布" class="btn btn-inverse"></p>


        <?php endif; ?>

    </form>
</div>


<script type="text/javascript" src="<?php echo e(asset('baiduedit/ueditor.config.js')); ?>"></script>
<!-- 编辑器源码文件 -->
<script type="text/javascript" src="<?php echo e(asset('baiduedit/ueditor.all.min.js')); ?>"></script>
<!-- 实例化编辑器 -->
<script type="text/javascript">
    var ue = UE.getEditor('container', {

        autoHeightEnabled: true,
        autoFloatEnabled: true,


        <?php if(Auth::guest()): ?>

        readonly:true,
        <?php endif; ?>
          });
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('Futrue.layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>