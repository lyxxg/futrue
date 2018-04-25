<?php $__env->startSection("content"); ?>
    <div class="page-title">
        <h2>个人中心<span>未来笔记</span></h2>
    </div>

    <div class="post-foot well">
        <h1>未登陆  将跳转到登陆</h1>
        <span id="totalSecond" style="font-size: 20px;color: red">3</span>秒后返回
        <a href="<?php echo e(route('login')); ?>" style="font-size: 35px;color: cornflowerblue">登陆</a>
    </div>
    <script>
        var second = document.getElementById('totalSecond').textContent;
        if (navigator.appName.indexOf("Explorer") > -1)  //判断是IE浏览器还是Firefox浏览器，采用相应措施取得秒数
        {
            second = document.getElementById('totalSecond').innerText;
        } else
        {
            second = document.getElementById('totalSecond').textContent;
        }
        setInterval("redirect()", 1000);  //每1秒钟调用redirect()方法一次
        function redirect()
        {
            if (second < 0)
            {
                location.href = '<?php echo e(route('login')); ?>';
            } else
            {
                if (navigator.appName.indexOf("Explorer") > -1)
                {
                    document.getElementById('totalSecond').innerText = second--;
                } else
                {
                    document.getElementById('totalSecond').textContent = second--;
                }
            }
        }
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('futrue.layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>