<?php $__env->startSection("content"); ?>
    <h2>文章发布</h2>
    <div>
        <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <p><?php echo e($error); ?></p>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>




    <form action="<?php echo e(route('article.store')); ?>" method="post">
        <?php echo e(csrf_field()); ?>

        <p><input type="text" name="title" value="<?php echo e(old("title")); ?>" class="form-control" placeholder="标题 至少3个字符 最大30字符"></p>
        <p><textarea name="descript"  cols="30"  class="form-control" rows="3" placeholder="问题描述 大概描述你的问题吧 至少5字符 最大100字符"><?php echo e(old("descript")); ?></textarea></p>


        <div>
            <h5>分类:至少选择一个分类</h5>
<ul>
            <?php $__currentLoopData = $types; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $type): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
     <li>
                <div class="futrue-float"><h3><?php echo e($type->type_name); ?></h3></div>
     </li>  <div>
                    <?php $__currentLoopData = $type->Tags; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tag): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <li>              <label class="futrue-float"><input type="checkbox"  <?php if(in_array($tag->id,old("tag_id",[]))): ?> checked <?php endif; ?> name="tag_id[]" value="<?php echo e($tag->id); ?>"><?php echo e($tag->name); ?></label>
          </li>  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</ul>
        </div>




        <script id="container" name="content" type="text/plain">

        </script>

        <p><input type="submit" value="提交" class="btn btn-inverse"></p>


    </form>
</div>


<script type="text/javascript" src="<?php echo e(asset('baiduedit/ueditor.config.js')); ?>"></script>
<!-- 编辑器源码文件 -->
<script type="text/javascript" src="<?php echo e(asset('baiduedit/ueditor.all.min.js')); ?>"></script>
<!-- 实例化编辑器 -->
<script type="text/javascript">
    var ue = UE.getEditor('container');
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('futrue.layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>