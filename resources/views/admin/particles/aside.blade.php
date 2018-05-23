<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="{{\Illuminate\Support\Facades\Storage::Url(Auth::user()->info->avatar)}}" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
               <p> 管理员:{{ Auth::user()->name }} </p>
                <a href="#"><i class="fa fa-circle text-success"></i> 在线</a>
            </div>
        </div>
        <!-- search form -->
        <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="Search...">
                <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
            </div>
        </form>
        <!-- /.search form -->
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu" data-widget="tree">
            <li class="header">管理工具</li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-arrow-circle-left"></i> <span>文章管理</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{route('admin.article.index')}}"><i class="fa fa-circle-o"></i>文章</a></li>
                    <li><a href="{{route('admin.answer.index')}}"><i class="fa fa-circle-o"></i>回答</a></li>
                </ul>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-recycle"></i>
                    <span>回收站</span>
                    <span class="pull-right-container">
              <span class="label label-primary pull-right">4</span>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{route('admin.recover.index')}}"><i class="fa fa-book"></i> 文章</a></li>
                    <li><a href=""><i class="fa fa-anchor"></i> 回答</a></li>
                    <li><a href="../layout/fixed.html"><i class="fa fa-circle-o"></i> 评论</a></li>
                    <li><a href="../layout/collapsed-sidebar.html"><i class="fa fa-file-o"></i>文件</a></li>
                </ul>
            </li>
            <li>
                <a href="{{route("admin.hot.index")}}">
                    <i class="fa fa-fire"></i> <span>文章热度</span>
                    <span class="pull-right-container">
              <small class="label pull-right bg-green">Hot</small>
            </span>
                </a>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-circle-o-notch"></i>
                    <span>反馈</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{route('admin.feedback.index')}}"><i class="fa fa-circle-o"></i> 建议</a></li>
                    <li><a href="../charts/morris.html"><i class="fa fa-circle-o"></i> 投诉</a></li>
                  </ul>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-tags"></i>
                    <span>标签</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{route('admin.tag.index')}}"><i class="fa fa-tags"></i> 标签</a></li>
                    <li><a href="{{route('admin.tagtype.index')}}"><i class="fa fa-tags"></i> 标签分类</a></li>
                 </ul>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-edit"></i> <span>公告</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{route('admin.announcement.create')}}"><i class="fa fa-circle-o"></i>发布新公告</a></li>
                    <li><a href="{{route('admin.focus.create')}}"><i class="fa fa-circle-o"></i> 焦点图</a></li>
                    <li><a href="../forms/editors.html"><i class="fa fa-circle-o"></i> Editors</a></li>
                </ul>
            </li>
            <li class="treeview active">
                <a href="#">
                    <i class="fa fa-users"></i> <span>用户管理</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{route('admin.user.index')}}"><i class="fa fa-user"></i>用户</a></li>
                    <li><a href=""><i class="fa fa-user-circle"></i>高级用户</a></li>
                    <li><a href="{{route('admin.banneduser.index')}}"><i class="fa fa-user-times"></i>违规用户</a></li>
                    <li><a href="{{route('admin.roles.index')}}"><i class="fa fa-users"></i> 管理员</a></li>
                </ul>
            </li>

            <li class="treeview">
                <a href="#">
                    <i class="fa fa-edit"></i> <span>错误界面编辑</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="../forms/general.html"><i class="fa fa-circle-o"></i> 404</a></li>
                    <li><a href="../forms/advanced.html"><i class="fa fa-circle-o"></i> 403</a></li>
                    <li><a href="../forms/editors.html"><i class="fa fa-circle-o"></i> 500</a></li>
                </ul>
            </li>


        </ul>
              </section>
    <!-- /.sidebar -->
</aside>