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
	
   <style type="text/css">
    .cart-heading {
        height: 40px;
        background-color: #EFEDED;
    }

    .cart-body {
        background-color: #F7F7F7;
    }

    .cart-body ul li {
        list-style-type: none;
        margin-left: -30px;
        width: 870px;
    }

    .cart-body ul li div {
        float: left;
        height: 80px;
    }

    .li-checkbox input {
        margin: 20px 5px 0 0;
    }

    .li-img a img {
        width: 60px;
        height: 70px;
    }

    .li-content {
        margin: 20px 0 0 15px;
        width: 115px;
    }

    .li-price {
        margin: 20px 0 0 15px;
        width: 40px;
    }

    li .li-quantity {
        margin: 20px 0 0 111px;
        width: 225px;
    }

    .li-del {
        margin: 20px 0 0 30px;
        width: 120px;
    }

    .li-date {
        margin: 20px 0 0 30px;
        width: 56px;
    }

    .li-img {
        margin: 0 0 0 0px;
        width:210px;
    }
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
  
 <div style="margin:50px auto;width: 1024px;">
    <div>
        <div>
            <div style="float:right;">
                <a class="btn  btn-xs btn-success" href="<?php echo U('User/order');?>" style="margin-right: 35px;">订单列表</a>
            </div>
            <h2>订单详情</h2>
            <hr>
        </div>
        <div>
            <div class="cart-heading">
                <div style="padding: 10px 0 0 10px">
                    <span style="margin-right: 160px;">商品图片</span>
                    <span style="margin-right: 175px;">商品名</span>
                    <span style="margin-right: 190px;">购买数量</span>
                    <span style="padding-right: 0px;">购买总价</span>
                </div>
            </div>
            <div class="cart-body">
                <ul>
                    <?php if(is_array($data["orderdetail"])): $i = 0; $__LIST__ = $data["orderdetail"];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li>
                            <div class="li-img">
                                <a href='<?php echo U('Index/good_info', array('goods_id' => $vo['goods_id']));?>'>
                                    <img class="li-img a img" src="/Public/images/<?php echo ($vo["type_id"]); ?>/<?php echo ($vo["goods_imgsrc"]); ?>">
                                </a>
                            </div>
                            <div class="li-content">
                                <span><?php echo ($vo["goods_name"]); ?></span>
                            </div>
                            <div class="li-quantity">
                                <span><?php echo ($vo["num"]); ?></span>
                            </div>
                            <div class="li-price">
                                <span><?php echo ($vo["totalmoney"]); ?></span>
                            </div>
                        </li><?php endforeach; endif; else: echo "" ;endif; ?>
                </ul>
            </div>
            <div style="float: right;height: 35px;width:330px;">
                <div class="btn-group" role="group" aria-label="...">
                    <ul class="pager">
                    </ul>
                </div>
            </div>
            </div>
         </div>
    </div>


 </div>
 

</body>
</html>