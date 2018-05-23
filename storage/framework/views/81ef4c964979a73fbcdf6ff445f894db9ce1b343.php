<?php $__env->startSection("content"); ?>
    <style>
        /*懒*/
        body{
       text-align: center;
        }
        </style>
    <h3>Tools Nmap扫描</h3>



    <!-- Name -->
    <?php if($errors->has('name')): ?>
        <span class="help-block">
                                        <strong><?php echo e($errors->first('name')); ?></strong>
                                    </span>
    <?php endif; ?>
    <div style="">
        <input type="text" class="input-large" id="nmap" placeholder="请输入av号"
               name="name"      value="<?php echo e(old('name')); ?>" required autofocus>
        <button class="btn btn-primary" id="nmap">扫描</button>
    </div>
    <p>
    </p>
    <div >

    </div>
    <p></p>
    <div  style="display: none;margin-left: 20px" id="result">
        <textarea class="input-large" rows="2" id="resultvalue"></textarea>
        <button class="btn btn-secondary" id="blbl" onclick="copy()">复制链接</button>
    </div>
    <script src="<?php echo e(asset('futrue/js/tools.js')); ?>">
    </script>


<?php $__env->stopSection(); ?>

<?php echo $__env->make('Futrue.layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>