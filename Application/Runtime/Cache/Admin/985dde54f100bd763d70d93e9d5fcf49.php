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
                <!-- Messages: style can be found in dropdown.less-->
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
                                Alexander Pierce - Web Developer
                                <small>Member since Nov. 2012</small>
                            </p>
                        </li>

                        <!-- Menu Footer-->
                        <li class="user-footer">
                            <div class="pull-left">
                                <a href="#" class="btn btn-default btn-flat">Profile</a>
                            </div>
                            <div class="pull-right">
                                <a href="#" class="btn btn-default btn-flat">Sign out</a>
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
            <li class="<?php echo ($comment_active); ?> treeview">
                <a href="#"><i class="fa fa-link"></i> <span>评论管理</span> <i class="fa fa-angle-left pull-right"></i></a>
                <ul class="treeview-menu">
                    <li><a href="#"><i class="fa fa-circle-o"></i>删除评论</a></li>
                </ul>
            </li>
            <li class="treeview">
                <a href="#"><i class="fa fa-link"></i> <span>商城公告</span> <i class="fa fa-angle-left pull-right"></i></a>
                <ul class="treeview-menu">
                    <li><a href="#"><i class="fa fa-circle-o"></i>发布新公告</a></li>
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
                <small>订单详情</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i>管理界面</a></li>
                <li class="active">订单管理</li>
                <li class="active"><a href="<?php echo U('Index/order_info');?>">订单列表</a></li>
                <li class="active">订单详情</li>
            </ol>
        </section>
         <section class="content">

            <div class="row">
                <div class="col-xs-12">
                    <div class="box">
                        <div class="box-header">
                            <h3 class="box-title">订单详情</h3>
                        </div><!-- /.box-header -->
                        <div class="box-body">
                            <div class="row">
                                <div class="col-sm-6">
                                    <div id="example1_filter" class="dataTables_filter">
                                    	<a href='<?php echo U('Index/order_info_view', array('order_id' => $order_id-1));?>' name="pre" class="btn btn-info">上一条</a>
                                    	<a href='<?php echo U('Index/order_info_view', array('order_id' => $order_id+1));?>' name="next" class="btn btn-info">下一条</a>
                                    </div>
                                </div>
                            </div>
							<?php if($data != null): ?><table id="example2" class="table table-bordered table-hover">       
	                                <tbody>
	                                	<tr role="row" class="odd" style="background-color: #ddd">
	                               			<td colspan="4"  style="text-align:center;">订单基本信息</td>
	                                    </tr>
	                                    <tr role="row" class="odd">
	                               			<td>订单号:</td>
	                               			<td><?php echo ($data["order_id"]); ?></td>
	                               			<td>订单状态:</td>
	                               			<td><?php echo ($data["order_status"]); ?></td>
	                                    </tr>
	                                    <tr role="row" class="odd">
	                               			<td>购货人:</td>
	                               			<td><?php echo ($data["uname"]); ?></td>
	                               			<td>下单时间:</td>
	                               			<td><?php echo (date("y年m月d日h时m分s秒",$data["order_date"])); ?></td>
	                                    </tr>
	                                    <tr role="row" class="odd">
	                               			<td>支付方式:</td>
	                               			<td><?php echo ($data["paytype"]); ?></td>
	                               			<td>付款状态:</td>
	                               			<td><?php echo ($data["ispayed"]); ?></td>
	                                    </tr>
	                                    <tr role="row" class="odd" style="background-color: #ddd">
	                               			<td colspan="4"  style="text-align:center;">收货人基本信息<input type="button" id="edit" class="btn btn-info" value="编辑"></td>
	                                    </tr>
	                                    <tr role="row" class="odd">
	                               			<td>收货人:</td>
	                               			<td><input id="rec_name" name="rec_name" style="border-style:none" type="text" value="<?php echo ($data["rec_name"]); ?>" readonly="true"></td>
	                               			<td>电子邮件:</td>
	                               			<td><input id="email" name="email" style="border-style:none" type="text" value="<?php echo ($data["email"]); ?>" readonly="true" ></td>
	                                    </tr>
	                                    <tr role="row" class="odd">
	                               			<td>收货地址:</td>
	                               			<td><input id="address" name="address" style="border-style:none" type="text" value="<?php echo ($data["address"]); ?>" readonly="true"></td>
	                               			<td>邮编:</td>
	                               			<td><input id="postcode" name="postcode" style="border-style:none" type="text" value="<?php echo ($data["postcode"]); ?>" readonly="true"></td>
	                                    </tr>
	                                    <tr role="row" class="odd">
	                               			<td>电话:</td>
	                               			<td><input id="rec_tel" name="rec_tel" style="border-style:none" type="text" value="<?php echo ($data["rec_tel"]); ?>" readonly="true"></td>
	                               			<td><button onclick="edit()" class="btn btn-info">修改</button></td>
	                               			<td><input type="hidden" id="order_id" value="<?php echo ($data["order_id"]); ?>"></td>
	                                    </tr>
	                                    <tr role="row" class="odd" style="background-color: #ddd">
	                               			<td colspan="4"  style="text-align:center;">购买商品信息</td>
	                                    </tr>
	                                    <tr role="row" class="odd">
	                                        <td>商品型号</td>
	                                        <td>商品数量</td>
	                                        <td>商品单价</td>
	                                        <td>商品总价</td>
	                                    </tr>
	                                    <?php if(is_array($order_detail)): $i = 0; $__LIST__ = $order_detail;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr role="row" class="odd">
	                                        <td><?php echo ($vo["goods_name"]); ?></td>
	                                        <td><?php echo ($vo["num"]); ?></td>
	                                        <td><?php echo ($vo["price"]); ?></td>
	                                        <td><?php echo ($vo["totalmoney"]); ?></td>
	                                    </tr><?php endforeach; endif; else: echo "" ;endif; ?>
	                                    <tr role="row" class="odd">
	                                        <td></td>
	                                        <td></td>
	                                        <td>合计:</td>
	                                        <td><?php echo ($data["totalmoney"]); ?></td>
	                                    </tr>
	                                </tbody>
	                            </table>
                            <?php else: ?>
                             <table id="example2" class="table table-bordered table-hover">
                             <tbody>
                              <tr role="row" class="odd">
                              <td>本页面并没有什么东西请往前或后翻</td>
                              </tr>
                             </tbody>
                             </table><?php endif; ?>
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
    
<script>

	$('#edit').click(function () {
		if($('#edit').val() == "编辑") {
			$('td input').each(function () {
	            $(this).removeAttr("readonly")
	            $(this).css("border-style","")
	            $('#edit').attr("value", "取消编辑")
	    	})
		} else {
			$('td input').each(function () {
	            $(this).attr("readonly","readonly")
	            $(this).css("border-style","none")
	            $('#edit').attr("value", "编辑")
	    	})
		}
	})

	function edit() {
		var data = {
			'order_id' : $('#order_id').val(),
			'rec_name' : $('#rec_name').val(),
			'email' : $('#email').val(),
			'address' : $('#address').val(),
			'postcode' : $('#postcode').val(),
			'rec_tel' : $('#rec_tel').val()
		}

		$.ajax({
			type: 'post',
            url: "<?php echo U('User/edit_order');?>",
            data: data,
            success: function (data) {
        	var result = $.parseJSON(data)
                if(result == 1) {
                	alert('修改成功')
    		        location.reload()
                } else {
                	alert('修改失败')
                }
            },
            error: function (data, status) {
               alert('修改时出现异常')
            }
		})
	}
</script>


    <!-- Optionally, you can add Slimscroll and FastClick plugins.
         Both of these plugins are recommended to enhance the
         user experience. Slimscroll is required when using the
         fixed layout. -->

</body>
</html>