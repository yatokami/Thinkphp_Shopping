<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width" />
    <title></title>
	<link rel="stylesheet" type="text/css" href="/Public/bootstrap/css/bootstrap.min.css" />
    <!-- jQuery文件。务必在bootstrap.min.js 之前引入 -->
	<script type="text/javascript" src="/Public/plugins/jQuery/jQuery-2.1.4.min.js"></script>
	<script type="text/javascript" src="/Public/bootstrap/js/bootstrap.min.js"></script>

    <style>
    ul.nav-tabs{
        width: 140px;
        margin-top: 10px;
        border-radius: 4px;
        border: 1px solid #ddd;
        box-shadow: 0 1px 4px rgba(0, 0, 0, 0.067);
    }
    ul.nav-tabs li{
        margin: 0;
        border-top: 1px solid #ddd;
    }
    ul.nav-tabs li:first-child{
        border-top: none;
    }
    ul.nav-tabs li a{
        margin: 0;
        padding: 8px 16px;
        border-radius: 0;
    }
    ul.nav-tabs li.active a, ul.nav-tabs li.active a:hover{
        color: #fff;
        background: #0088cc;
        border: 1px solid #0088cc;
    }
    ul.nav-tabs li:first-child a{
        border-radius: 4px 4px 0 0;
    }
    ul.nav-tabs li:last-child a{
        border-radius: 0 0 4px 4px;
    }
    ul.nav-tabs.affix{
        top: 30px; /* Set the top position of pinned element */
    }
    .li-quantity{
            margin: 20px 0 0 130px;
            width: 100px;
        }
    </style>
	
</style>

</head>
<body data-spy="scroll" data-target="#myScrollspy">

<nav class="navbar navbar-default" role="navigation">
    <div class="navbar-header">
        <a class="navbar-brand" href="/Home/Index" style="padding:15px 150px">手机电子商城</a>
    </div>
    <div class="navbar-right" style="margin-right: 200px">
        <ul class="nav navbar-nav">
            <?php if($uname == null): ?><li><a href="<?php echo U('Auth/login');?>">登录</a></li>
            <?php else: ?>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><?php echo ($uname); ?><span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="<?php echo U('User/info');?>">账号管理</a></li>
                        <li><a href="<?php echo U('Auth/logout');?>">退出</a></li>
                    </ul>
                </li>
                <li><a href="<?php echo U('User/cart');?>">购物车</a></li><?php endif; ?>
            <li><a href="<?php echo U('Index/index');?>">主页</a></li>
            <li><a href="<?php echo U('Index/server_center');?>">联系客服</a></li>
        </ul>
    </div>
 </nav>


 <div class="container">
  
    <div class="row row-offcanvas row-offcanvas-right">
    <div class="col-xs-12 col-sm-9">
        <p class="pull-right visible-xs">
            <button type="button" class="btn btn-primary btn-xs" data-toggle="offcanvas">Toggle nav</button>
        </p>
        <form id="form1" action="<?php echo U('Index/search');?>" method="get">
          <div class="input-group" style="margin-bottom: 20px">
          <input type="text" name="search_name" class="form-control input-lg"><span class="input-group-addon btn btn-primary" onclick="document.getElementById('form1').submit();">搜索</span>
          </div>
        <form>
        <div class="row">
          <?php if(is_array($data["goods"])): $i = 0; $__LIST__ = $data["goods"];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><div class="col-sm-6 col-md-4">
                  <div class="thumbnail">
                      <img src="/Public/images/<?php echo ($vo["type_id"]); ?>/<?php echo ($vo["goods_imgsrc"]); ?>" class="img-rounded" style="height: 200px; width: 100%; display: block;" alt="...">
                      <div class="caption">
                          <h4>商品名称:<?php echo ($vo["goods_name"]); ?></h4>
                          <p>单价:<?php echo ($vo["price"]); ?></p>
                          <p><a href='<?php echo U('Index/good_info', array('goods_id' => $vo['goods_id']));?>' class="btn btn-primary" role="button">点击查看详情</a></p>
                      </div>
                  </div>
              </div><?php endforeach; endif; else: echo "" ;endif; ?>
        </div><!--/row-->
    </div><!--/.col-xs-12.col-sm-9-->

     <div class="col-xs-6 col-sm-3 sidebar-offcanvas" id="sidebar">
        <div class="list-group">
            <a  class="list-group-item" href="/Home/Index">首页</a>
            <?php if(is_array($data["goodtype"])): $i = 0; $__LIST__ = $data["goodtype"];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><a class="list-group-item" href='<?php echo U('Index/index', array('type_id' => $vo['type_id']));?>'><?php echo ($vo["type_name"]); ?></a><?php endforeach; endif; else: echo "" ;endif; ?>         
            <iframe id="tmp_downloadhelper_iframe" style="display: none;"></iframe>
        </div>
    </div><!--/.sidebar-offcanvas -->
</div>
<div class="btn-group" role="group" aria-label="...">
    <ul class="pager">
      <?php echo ($page); ?>
    </ul>
</div>

 </div>
 

</body>
</html>