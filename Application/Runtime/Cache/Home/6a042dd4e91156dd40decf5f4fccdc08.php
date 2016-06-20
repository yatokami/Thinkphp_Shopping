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
     
    <div class="row" >
        <div class="col-xs-3" id="myScrollspy">
            <ul class="nav nav-tabs nav-stacked" data-spy="affix" data-offset-top="10">
                <li class="active"><a href="<?php echo U('User/info');?>">用户个人信息修改</a></li>
                <li><a href="<?php echo U('User/order');?>">订单记录</a></li>
            </ul>
        </div>
        <div class="col-xs-9">
            <form role="form" action="<?php echo U('User/update');?>" method="post">
                <div class="form-group">
                    <h1>尊敬的 <?php echo ($data['uname']); ?></h1>
                </div>
                <div class="form-group">
                    <label for="name">真实姓名</label><input type="text" name="RealName" class="form-control" value="<?php echo ($data['info'][0]['realname']); ?>" required/>
                </div>
                <div class="form-group">
                    <label for="name">性别</label>
                    <div class="radio">
                        <label>
                            <input type="radio" name="Sex" id="optionsRadios1"
                                   value="1">  男
                        </label>
                        <label>
                            <input type="radio" name="Sex" id="optionsRadios2"
                                   value="2">
                            女
                        </label>
                        <label>
                            <input type="radio" name="Sex" id="optionsRadios3"
                                   value="3">
                            秀吉
                        </label>
                    </div>
                    <div class="form-group">
                        <label for="name">电话</label>
                        <input type="text" name="Tel" class="form-control" value="<?php echo ($data['info'][0]['tel']); ?>" required/>
                    </div>
                    <div class="form-group">
                        <label for="name">Email</label>
                        <input type="text" name="Email" class="form-control" value="<?php echo ($data['info'][0]['email']); ?>" required/>
                    </div>
                    <div class="form-group">
                        <label for="name">Address</label>
                        <input type="text" name="Address" class="form-control" value="<?php echo ($data['info'][0]['address']); ?>" required/>
                    </div>
                    <div class="form-group">
                        <label for="name">PostCode</label>
                        <input type="text" name="PostCode" class="form-control" value="<?php echo ($data['info'][0]['postcode']); ?>" required/>
                    </div>
                    <button type="submit" class="btn btn-default">提交</button>
                </div>
            </form>
</div>
</div>
<?php if($sex == 1): ?><script>$("input[name='Sex']").get(0).checked = true;    </script>
<?php elseif($sex == 2): ?>
    <script>$("input[name='Sex']").get(1).checked = true;    </script>
<?php elseif($sex == 3): ?>
    <script>$("input[name='Sex']").get(2).checked = true;    </script><?php endif; ?>
</if>

 </div>
 
</body>
</html>