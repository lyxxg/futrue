<?php $__env->startSection("content"); ?>
    <section class="content-header">
        <h1>
            编辑标签
            <small>it all starts here</small>
        </h1>

    </section>

    <!-- Main content -->
    <section class="content">

        <!-- Default box -->
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">编辑标签</h3>

                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                            title="Collapse">
                        <i class="fa fa-minus"></i></button>
                    <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
                        <i class="fa fa-times"></i></button>
                </div>
            </div>

            <div class="box-body">

                <form class="form-horizontal" role="form" method="POST" action="<?php echo e(route('admin.tag.update',[$tag->id])); ?>" enctype="multipart/form-data">
                    <?php echo e(csrf_field()); ?>

                    <?php echo e(method_field("put")); ?>

                    <input type="hidden" name="id" value="<?php echo e($tag->id); ?>">
                    <div class="form-group<?php echo e($errors->has('name') ? ' has-error' : ''); ?>">
                        <label for="nick" class="col-md-4 control-label">标签名</label>

                        <div class="col-md-6">
                            <input id="name" type="text" class="form-control" name="name" value="<?php echo e(old('name',$tag->name)); ?>" placeholder="标签名">

                            <?php if($errors->has('name')): ?>
                                <span class="help-block">
                                        <strong><?php echo e($errors->first('name')); ?></strong>
                                    </span>
                            <?php endif; ?>
                        </div>
                    </div>

                    <div class="form-group<?php echo e($errors->has('type_name') ? ' has-error' : ''); ?>">
                        <label for="name" class="col-md-4 control-label">标签分类</label>
                        <div class="col-md-6">
                            <input id="type_name" type="text" class="form-control" name="type_name" value="<?php echo e(old('type_name',$tag->tag_type->type_name)); ?>"  requiredss>

                            <?php if($errors->has('type_name')): ?>
                                <span class="help-block">
                                        <strong><?php echo e($errors->first('type_name')); ?></strong>
                                    </span>
                            <?php endif; ?>
                        </div>
                    </div>



                    <div class="form-group<?php echo e($errors->has('ico') ? ' has-error' : ''); ?>">
                        <label for="name" class="col-md-4 control-label">标签图标</label>
                        <div class="col-md-6">
                        <input id="icofile" type="file" class="form-control" name="ico" value="<?php echo e(old('ico',$tag->ico)); ?>" onchange="ico2();" style="display:none;" >
                            <img src="<?php echo e(Storage::url($tag->ico)); ?>" width="30"  onclick="ico1()"  id="img"/>
                            <?php if($errors->has('ico')): ?>
                                <span class="help-block">
                                    <strong><?php echo e($errors->first('ico')); ?></strong>
                                    </span>
                            <?php endif; ?>
                        </div>
                    </div>







                        <div class="form-group<?php echo e($errors->has('baike') ? ' has-error' : ''); ?>">
                        <label for="description" class="col-md-4 control-label">标签描述</label>

                        <div class="col-md-6">
                            <textarea id="baike"  class="form-control" name="baike" >
<?php echo e(old('baike',$tag->baike)); ?>

                            </textarea>

                            <?php if($errors->has('baike')): ?>
                                <span class="help-block">
                                        <strong><?php echo e($errors->first('baike')); ?></strong>
                                    </span>
                            <?php endif; ?>
                        </div>
                    </div>



                    <div class="form-group">
                        <div class="col-md-6 col-md-offset-4">
                            <button type="submit" class="btn btn-primary">
                                确认编辑
                            </button>
                        </div>
                    </div>
                </form>




                </body>
                </html>
                <script src="http://apps.bdimg.com/libs/layer/2.1/layer.js"></script>
                <script src="https://cdn.bootcss.com/jquery/3.2.1/jquery.min.js"></script>
                <script>
                    $(function () {
                        $(".btn-del").click(function () {
                            $(this).siblings("form").submit();//form兄弟元素选择器
                        });
                    });
                </script>


            </div>

            <!-- /.box-body -->
            <div class="box-footer">
                Footer
            </div>
            <!-- /.box-footer-->
        </div>
        <!-- /.box -->

    </section>
<?php $__env->stopSection(); ?>
<?php $__env->startSection("js"); ?>
<?php $__env->stopSection(); ?>
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


<?php echo $__env->make('admin.layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>