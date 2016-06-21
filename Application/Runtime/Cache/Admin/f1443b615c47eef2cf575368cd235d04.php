<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>

<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>后台管理界面</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.5 -->
    <link rel="stylesheet" type="text/css" href="/Public/admin/bootstrap/css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="/Public/content/css/font-awesome.min.css" />
    <link rel="stylesheet" type="text/css" href="/Public/content/css/ionicons.min.css" />
    <link rel="stylesheet" type="text/css" href="/Public/admin/dist/css/AdminLTE.css" />
    <link rel="stylesheet" type="text/css" href="/Public/admin/dist/css/skins/skin-blue.min.css" />


   
</head>
<body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">
        <header class="main-header">
    <!-- Logo -->
    <a href="#" class="logo">
        <!-- mini logo for sidebar mini 50x50 pixels -->
        <span class="logo-mini"><b>A</b>LT</span>
        <!-- logo for regular state and mobile devices -->
        <span class="logo-lg">商城管理后台</span>
    </a>

    <!-- Header Navbar -->
    <nav class="navbar navbar-static-top" role="navigation">
        <!-- Sidebar toggle button-->
        <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
        </a>
        <!-- Navbar Right Menu -->
        <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
              <li class="dropdown messages-menu">
                <!-- Menu toggle button -->
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <i class="fa fa-envelope-o"></i>
                  <span class="label label-success"><?php echo ($pro_count); ?></span>
                </a>
                <ul class="dropdown-menu">
                  <li class="header">You have <?php echo ($pro_count); ?> messages</li>
                  <li class="footer"><a href="<?php echo U('Index/pro_list');?>">See All Messages</a></li>
                </ul>
              </li><!-- /.messages-menu -->

                <!-- User Account Menu -->
                <li class="dropdown user user-menu">
                    <!-- Menu Toggle Button -->
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <!-- The user image in the navbar-->
                        <img src="/Public/dist/img/user2-160x160.jpg" class="user-image" alt="User Image">
                        <!-- hidden-xs hides the username on small devices so only the image appears. -->
                        <span class="hidden-xs"><?php echo ($uname); ?></span>
                    </a>
                    <ul class="dropdown-menu">
                        <!-- The user image in the menu -->
                        <li class="user-header">
                            <img src="/Public/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
                            <p>
                                <small>商城管理后台</small>
                            </p>
                        </li>

                        <!-- Menu Footer-->
                        <li class="user-footer">
                            <div class="pull-left">
                                <a href="#" class="btn btn-default btn-flat">Profile</a>
                            </div>
                            <div class="pull-right">
                                <a href="<?php echo U('Auth/logout');?>" class="btn btn-default btn-flat">Sign out</a>
                            </div>
                        </li>
                    </ul>
                </li>
                <!-- Control Sidebar Toggle Button -->
                <li>
                    <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
                </li>
            </ul>
        </div>
    </nav>
</header>

         <!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

        <!-- Sidebar user panel (optional) -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="/Public/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
                <p>Admin</p>
                <!-- Status -->
                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>

        <!-- search form (Optional) -->
        <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="Search...">
                <span class="input-group-btn">
                    <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i></button>
                </span>
            </div>
        </form>
        <!-- /.search form -->
        <!-- Sidebar Menu -->
        <ul class="sidebar-menu">
            <li class="header">HEADER</li>
            <!-- Optionally, you can add icons to the links -->
            <li class="<?php echo ($user_active); ?> treeview">
                <a href="#"><i class="fa fa-link "></i> <span>用户管理</span><i class="fa fa-angle-left pull-right"></i></a>
                <ul class="treeview-menu">
                    <li class="<?php echo ($user_info_active); ?>"><a href="<?php echo U('Index/index');?>"><i class="fa fa-circle-o"></i>用户信息查看</a></li>
                    <li class="<?php echo ($user_pwd_active); ?>"><a href="<?php echo U('Index/reset_pwd');?>"><i class="fa fa-circle-o"></i>用户密码重置</a></li>
                </ul>
            </li>
            <li class="<?php echo ($goods_active); ?> treeview">
                <a href="#"><i class="fa fa-link"></i> <span>商品管理</span> <i class="fa fa-angle-left pull-right"></i></a>
                <ul class="treeview-menu">
                    <li class="<?php echo ($goods_add_active); ?>"><a href="<?php echo U('Index/add_good');?>"><i class="fa fa-circle-o"></i>新商品入库</a></li>
                    <li class="<?php echo ($goods_update_active); ?>"><a href='<?php echo U('Index/good', array('action' => 'update'));?>'><i class="fa fa-circle-o"></i>修改商品信息</a></li>
                    <li class="<?php echo ($goods_select_active); ?>"><a href='<?php echo U('Index/good', array('action' => 'select'));?>'><i class="fa fa-circle-o"></i>查询商品信息</a></li>
                    <li class="<?php echo ($goods_delete_active); ?>"><a href='<?php echo U('Index/good', array('action' => 'delete'));?>'><i class="fa fa-circle-o"></i>删除旧商品</a></li>
                </ul>
            </li>
            <li class="<?php echo ($order_active); ?> treeview">
                <a href="#"><i class="fa fa-link"></i> <span>订单管理</span> <i class="fa fa-angle-left pull-right"></i></a>
                <ul class="treeview-menu">
                    <li class="<?php echo ($order_info_active); ?>"><a href="<?php echo U('Index/order_info');?>"><i class="fa fa-circle-o"></i>用户订单详情</a></li>
                </ul>
            </li>
            <li class="<?php echo ($cmt_active); ?> treeview">
                <a href="#"><i class="fa fa-link"></i> <span>评论管理</span> <i class="fa fa-angle-left pull-right"></i></a>
                <ul class="treeview-menu">
                    <li class="<?php echo ($cmt_del_active); ?>"><a href="<?php echo U('Index/comment');?>"><i class="fa fa-circle-o"></i>删除评论</a></li>
                </ul>
            </li>
            <li class="<?php echo ($bul_active); ?> treeview">
                <a href="#"><i class="fa fa-link"></i> <span>商城公告</span> <i class="fa fa-angle-left pull-right"></i></a>
                <ul class="treeview-menu">
                    <li class="<?php echo ($bul_add_active); ?>"><a href="<?php echo U('Index/add_bulletin');?>"><i class="fa fa-circle-o"></i>发布新公告</a></li>
                </ul>
            </li>
        </ul><!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
</aside>
        
<div class="content-wrapper">
	<section class="content-header">
        <h1>
           信息管理
            <small>用户问题回复</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i>管理界面</a></li>
            <li class="active"><a href="<?php echo U('Index/pro_list');?>">信息管理</a></li>
            <li class="active">用户问题回复</li>
        </ol>
    </section>
     <section class="content">
        <div class="row">
			<div class="modal-header">
		            <div class="box-header">
                            <h3 class="box-title">用户问题</h3>
                    </div>
                    <div class="modal-body" style="text-align:center">
		             <textarea name="pro_content" id="pro_content" class="form-control" rows="5" placeholder="内容" readonly><?php echo ($pro["pro_content"]); ?></textarea>
		    		</div>
		    </div>
		    <div class="modal-body">
		    <form action="<?php echo U('User/reply');?>" method="post">
		    	<input name="pro_id" type="hidden" value="<?php echo ($pro["pro_id"]); ?>">
		    	<input name="uname" type="hidden" value="<?php echo ($pro["uname"]); ?>">
		    	<div class="box-header">
                    <h3 class="box-title">客服回答</h3>
                </div>
	            <textarea name="reply_content" id="pro_content" class="form-control" rows="5" placeholder="内容"></textarea>
		    </div>
		    <div class="modal-footer">
	            <input id='sub' type="submit" class="btn btn-primary" value="回复">
		    </div>
		    </form>
	    </div>
    </section>
</div>


    </div>

    <script type="text/javascript" src="/Public/admin/plugins/jQuery/jQuery-2.1.4.min.js"></script>
    <script type="text/javascript" src="/Public/admin/bootstrap/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="/Public/admin/dist/js/app.min.js"></script>
    <script type="text/javascript" src="/Public/admin/plugins/datatables/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="/Public/admin/plugins/datatables/dataTables.bootstrap.min.js"></script>
    <script type="text/javascript" src="/Public/admin/plugins/slimScroll/jquery.slimscroll.min.js"></script>
    <script type="text/javascript" src="/Public/admin/plugins/fastclick/fastclick.min.js"></script>
    <script type="text/javascript" src="/Public/admin/dist/js/demo.js"></script>
    


    <!-- Optionally, you can add Slimscroll and FastClick plugins.
         Both of these plugins are recommended to enhance the
         user experience. Slimscroll is required when using the
         fixed layout. -->

</body>
</html>