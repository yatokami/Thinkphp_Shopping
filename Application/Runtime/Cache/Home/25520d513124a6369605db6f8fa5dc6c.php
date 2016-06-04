<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>登陆</title>
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
	<div class="container web-body" style="margin-top:100px;width: 900px;">
    <div class="row">
        <div class="col-lg-6 col-lg-offset-3">
            <div class="panel panel-default">
                <div class="panel-heading" style="height: 50px;">
                    <div class="panel-title" style="text-align: left">用户登录<?php echo ($name); ?></div>
                </div>
                <div class="panel-body">
                    <form action="<?php echo U('Auth/getlogin');?>" class="form-horizontal" role="form" method="post" >
                        <div class="form-group">
                            <input id="uname"  type="text" class="form-control" name="uname" placeholder="用户名" />
                        </div>
                        <div class="form-group">
                            <input id="pwd" value="" type="password" class="form-control" name="pwd" autocomplete="off" placeholder="密码" />
                        </div>
                        <div class="form-group">
                            <input type="submit" class="btn btn-success btn-block" value="登 陆" />
                            <a href="register" class="btn btn-primary" style="float: right;margin-top: 20px;">注 册</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>
</body>
</html>