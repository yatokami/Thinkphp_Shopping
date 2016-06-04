<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>注册</title>
    <script src="//cdn.bootcss.com/jquery/1.11.3/jquery.min.js"></script>
	<script src="//cdn.bootcss.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="//cdn.bootcss.com/bootstrap/3.3.5/css/bootstrap.min.css">
<style type="text/css">
        .panel-body{
            padding: 30px 50px 0 50px;
        }
        .form-group{
            margin-bottom: 35px;
        }
        .panel-title{
            font-size: 24px;
            font-weight: bold;
        }
</style>
<script type="text/javascript">
</script>
</head>
<body>
<div class="container web-body" style="margin-top:100px;width: 580px;">
    <div class="row">
        <div class="col-lg-9 col-lg-offset-3">
            <div class="panel panel-default" >
                <div class="panel-heading" style="height: 50px;">
                    <div class="panel-title" style="text-align: left">用户注册</div>
                </div>
                <div class="panel-body">
                    <form action="<?php echo U('Auth/getregister');?>" class="form-horizontal" role="form" method="post" >
                        <div class="form-group">
                            <label>用户名（字母开头长度6-12）</label>
                            <input id="uname" type="text" class="form-control" name="uname" placeholder="用户名" />
                        </div>
                        <div class="form-group">
                            <label>密码（字母开头长度6-12）</label>
                            <input id="pwd" type="password" class="form-control" name="pwd"  placeholder="密码" />
                        </div>
                        <div class="form-group">
                            <label>性别</label>
                            <input type="radio" name="sex" class="iradio_minimal" value="1" checked>男
                            <input type="radio" name="sex" class="iradio_minimal" value="2">女
                            <input type="radio" name="sex" class="iradio_minimal" value="3">秀吉
                        </div>
                        <div class="form-group">
                            <label>真实姓名</label>
                            <input id="realname" type="text" class="form-control" name="realname"  placeholder="真实姓名" />
                        </div>
                        <div class="form-group">
                            <label>电话</label>
                            <input id="tel" type="text" class="form-control" name="tel"  placeholder="电话" />
                        </div>
                        <div class="form-group">
                            <label>Email</label>
                            <input id="email" type="text" class="form-control" name="email"  placeholder="Email" />
                        </div>
                         <div class="form-group">
                            <label>地址</label>
                            <input id="address" type="text" class="form-control" name="address"  placeholder="Email" />
                        </div>
                         <div class="form-group">
                            <label>邮编</label>
                            <input id="postcode" type="text" class="form-control" name="postcode"  placeholder="Email" />
                        </div>
                        <div class="form-group">
                            <input type="submit" class="btn btn-success btn-block" value="注 册" />
                            <a href="login" class="btn btn-primary" style="float: right;margin-top: 20px;">登 陆</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

</body>
</html>