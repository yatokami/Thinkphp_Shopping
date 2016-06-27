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
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                订单管理
                <small>订单列表</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i>管理界面</a></li>
                <li class="active">订单管理</li>
                <li class="active">订单列表</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">

            <div class="row">
                <div class="col-xs-12">
                    <div class="box">
                        <div class="box-header">
                            <h3 class="box-title">订单列表</h3>
                        </div><!-- /.box-header -->
                        <div class="box-body">
                            <div class="row">
                                <form action="<?php echo U('Index/order_info');?>" method="post">
                                    <div class="col-sm-6">
                                        <div id="example1_filter" class="dataTables_filter">
                                            <label>根据用户查询:<input id="searchtxt1" name="uname" type="search" class="form-control input-sm" placeholder="" aria-controls="example1"></label>
                                            <label>根据订单号查询:<input id="searchtxt2" name="order_id" type="search" class="form-control input-sm" aria-controls="example1"></label>
                                            <button id="search" type="submit" class="btn btn-block btn-info" style="width:70px;">查询</button>
                                        </div>
                                    </div>
                                </form>
                            </div>

                            <table id="example2" class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                    	<th><input id="CheckAll" type="checkbox">全选订单号</th>
                                    	<th>下单时间</th>
                                    	<th>收货人</th>
                                    	<th>总金额</th>
                                    	<th>订单状态</th>
                                    	<th>操作</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if(is_array($data["orders"])): $i = 0; $__LIST__ = $data["orders"];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr role="row" class="odd">
                                   			<td><input data-id="<?php echo ($vo["order_id"]); ?>" data-index="<?php echo ++$a;?>"name="chkItem" class="li-checkbox input" type="checkbox" /><?php echo ($vo["order_id"]); ?></td>
                                   			<td><?php echo (date("y年m月d日h时m分s秒",$vo["order_date"])); ?></td>
                                   			<td><?php echo ($vo["uname"]); ?><br><?php echo ($vo["address"]); ?></td>
                                   			<td><?php echo ($vo["totalmoney"]); ?></td>
                                   			<td><?php echo ($vo["order_status"]); ?></td>
                                   			<td><a href='<?php echo U('Index/order_info_view', array('order_id' => $vo['order_id']));?>' name="select" class="btn btn-primary">查看</a>
                                   			<button name="<?php echo ($vo["order_id"]); ?>" onclick="delete_order(this)" class="btn btn-primary">移除</button></td>
                                        </tr><?php endforeach; endif; else: echo "" ;endif; ?>
                                </tbody>
                            </table>

                            <div class="row">
                                <div class="col-sm-5">
                                    <div class="dataTables_info" id="example2_info" role="status" aria-live="polite">
                                    <button id="pass" name="pass" class="btn btn-primary" onclick="action(this)">确认</button>
                                    <button id="cancel" name="cancel" class="btn btn-primary" onclick="action(this)">取消</button>
                                        总共有 <?php echo ($order_count); ?> 条数据
                                    </div>
                                </div>
                                <div class="col-sm-7">
                                    <div class="dataTables_paginate paging_simple_numbers" id="example2_paginate">
                                    </div>
                                    <ul class="pagination">
										<?php echo ($page); ?>
                                    </ul>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>

        </section><!-- /.content -->
    </div><!-- /.content-wrapper -->

    </div>

    <script type="text/javascript" src="/Public/admin/plugins/jQuery/jQuery-2.1.4.min.js"></script>
    <script type="text/javascript" src="/Public/admin/bootstrap/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="/Public/admin/dist/js/app.min.js"></script>
    <script type="text/javascript" src="/Public/admin/plugins/datatables/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="/Public/admin/plugins/datatables/dataTables.bootstrap.min.js"></script>
    <script type="text/javascript" src="/Public/admin/plugins/slimScroll/jquery.slimscroll.min.js"></script>
    <script type="text/javascript" src="/Public/admin/plugins/fastclick/fastclick.min.js"></script>
    <script type="text/javascript" src="/Public/admin/dist/js/demo.js"></script>
    
<script type="text/javascript">
	$(function () {
        $("#example1").DataTable()
        $('#example2').DataTable({
            "paging": false,
            "lengthChange": false,
            "searching": false,
            "ordering": false,
            "info": false,
            "autoWidth": true
        })
    })

	 //checkbox 单选事件
        $('input[name="chkItem"]:checkbox').click(function () {
            var isCheck = $('input[name="chkItem"]:not(:checked)').length ? false : true
            $('#CheckAll').prop("checked", isCheck)
        });

        //checkbox 全选事件
        $('#CheckAll').click(function () {
            var self = $(this)
            $('input[name="chkItem"]').each(function () {
                $(this).prop("checked", self.is(':checked'))
            })
        })
    function delete_order(obj) {
        $order_id = obj.name;
        var data = {
            'order_id' : $order_id
        }
        $.ajax({
            type: 'post',
            url: "<?php echo U('User/delete_order');?>",
            data: data,
            success: function (data) {
            var result = $.parseJSON(data)
                if(result == 1) {
                    alert('移除成功')
                    location.reload()
                } else {
                    alert('移除失败')
                }
            },
            error: function (data, status) {
               alert('移除时出现异常')
            }
        })
    }

    function action(obj) {
        var action = obj.name
        var datas = []
        $('input[name="chkItem"]:checked').each(function () {
            var self = $(this),
                    order_id = self.attr('data-id')
            var row = {"order_id": order_id}
            datas.push(row)
        })

        data = {"data": datas , "action" : action}
        console.log(data)
        $.ajax({
            type: 'post',
            url: "<?php echo U('User/action_cmt');?>",
            data: data,
            success: function (data) {
                console.log(data);
                if(data > 1) {
                    alert('操作成功')
                } else {
                    alert('操作失败')
                }
                location.reload();
            },
            error: function (data, status) {
               alert('操作时出现异常')
            }
        });
    }


</script>


    <!-- Optionally, you can add Slimscroll and FastClick plugins.
         Both of these plugins are recommended to enhance the
         user experience. Slimscroll is required when using the
         fixed layout. -->

</body>
</html>