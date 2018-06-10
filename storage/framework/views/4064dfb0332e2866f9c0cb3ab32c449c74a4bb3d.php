<?php $__env->startSection("content"); ?>
    <h5 style="text-align: center">个人简历(蓝色字体是超链接)</h5>

    <link rel="stylesheet" href="<?php echo e(asset('futrue/job/css/general.css')); ?>"/>

    <div id="objective">
        <h2>个人简历</h2>
        <img src="<?php echo e(asset('futrue/job/lmx.jpg')); ?>" style="width:80px;height:79px;
        border-radius: 50%;margin-top:22px;margin-bottom: 22px;border:1px solid green ">

        <p>姓名:骆美学</p>
        <p>年龄:<span class="age">18</span></p>
        <p>姓别:男</p>
        <p>学历:中专</p>

    </div>
    <div id="skillareas">

        <h2>技能</h2>
        <ol>
            <li class="skill">
                <h3>主要技能</h3>
                <ul class="skillset">
                    <li>精通larvel/ PHP/redis /队列 /文件缓存 /熟悉thinkphp
                          <a href="<?php echo e(asset('article')); ?>"  target="_blank">此站</a>就是本人独自花费3个多月使用Laravel编写的的
                        此项目<a href="https://coding.net/u/lyxxxh/p/futrue/git?public=true"  target="_blank">地址</a></li>
                    <li>熟练使用HTTP协议 使用http模仿<a href="https://www.bilibili.com/video/av19942924"  target="_blank">哔哩哔哩评论</a> </li>
                    <li>反向ajax聊天室 json xml解析 </li>
                    <li>跨域脚本攻击 xxs sql注入原理</li>
                    <li>微信公众号开发 创建并维护<a href="<?php echo e(route('wechatpublic')); ?>"  target="_blank">黑客美学</a></li></li>
                    <li>良好代码书写习惯 习惯使用git 熟悉svn</li>
                    <li>熟悉c语言 目前已获得全国计算机二级c</li>
                    <li>Linux操作 熟练配置站点端口</li>
                    <li>H5离线缓存---此站主题 websql等 css js perl</li>
                    <li>了解sqlserver ps</li>

                </ul>
            </li>
        </ol>

          </div>
    <div id="history">
        <h2>学历</h2>
        <ol>
            <li class="job">
                <h3>学历:中专实习</h3>
                <div class="employer"><a href="http://xy01.cn"  target="_blank">珠海斗门新盈中等职业学校</a></div>
               </li>
        </ol>
    </div>
    <div id="awards">
        <h2>个人评价</h2>
        <ol>
            <li class="award">
                <h3>热爱编程 几乎时间都是打代码</h3>
                <div class="date">学历虽然低了  但是技术不是很低</div>
                <div class="date">能吃苦耐劳，学习能力强</div>
                <div class="date"><a href="<?php echo e(route('contactme')); ?>" style="color: blue">联系我</a>
                    qq:449399575 微信&电话:13112368007
                </div>
            </li>
        </ol>
    </div>


<?php $__env->stopSection(); ?>

<?php echo $__env->make('Futrue.layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>