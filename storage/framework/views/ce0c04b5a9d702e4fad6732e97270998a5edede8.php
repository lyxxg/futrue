<?php $__env->startSection("content"); ?>
    <section class="content-header">
        <h1>
            文章管理
            <small>zz</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Examples</a></li>
            <li class="active">Blank page</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">

        <!-- Default box -->
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">Title</h3>

                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                            title="Collapse">
                        <i class="fa fa-minus"></i></button>
                    <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
                        <i class="fa fa-times"></i></button>
                </div>
            </div>

            <div class="box-body">

                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <td>编号</td>
                        <td>用户名</td>
                        <td>昵称</td>
                        <td>邮箱</td>
                        <td>操作</td>

                    </tr>
                    </thead>
                    <tbody>

                    </tbody>
                </table>

                </body>
                </html>
                <script src="http://apps.bdimg.com/libs/layer/2.1/layer.js"></script>
                <script src="https://cdn.bootcss.com/jquery/3.2.1/jquery.min.js"></script>

                    <script>
                    $(function(){
                        $(".btn-del").click(function () {
                            $(this).siblings("form:first").submit();
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
<?php echo $__env->make('admin.layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>