<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>注册</title>
    <link rel="stylesheet" type="text/css" href="/Public/bootstrap/css/bootstrap.min.css" />
    <!-- jQuery文件。务必在bootstrap.min.js 之前引入 -->
    <script type="text/javascript" src="/Public/plugins/jQuery/jQuery-2.1.4.min.js"></script>
    <script type="text/javascript" src="/Public/bootstrap/js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="/Public/bootstrap/css/bootstrap-select.min.css" />
    <script type="text/javascript" src="/Public/bootstrap/js/bootstrap-select.min.js"></script>
    <script type="text/javascript" src="/Public/bootstrap/js/i18n/defaults-*.min.js"></script>
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
                            <input id="uname" type="text" class="form-control" name="uname" placeholder="用户名" required/>
                        </div>
                        <div class="form-group">
                            <label>密码（字母开头长度6-12）</label>
                            <input id="pwd" type="password" class="form-control" name="pwd"  placeholder="密码" required/>
                        </div>
                        <div class="form-group">
                            <label>性别</label>
                            <input type="radio" name="sex" class="iradio_minimal" value="1" checked>男
                            <input type="radio" name="sex" class="iradio_minimal" value="2">女
                            <input type="radio" name="sex" class="iradio_minimal" value="3">秀吉
                        </div>
                        <div class="form-group">
                            <label>真实姓名</label>
                            <input id="realname" type="text" class="form-control" name="realname"  placeholder="真实姓名" required/>
                        </div>
                        <div class="form-group">
                            <label>电话</label>
                            <input id="tel" type="text" class="form-control" name="tel"  placeholder="电话" required/>
                        </div>
                        <div class="form-group">
                            <label>Email</label>
                            <input id="email" type="text" class="form-control" name="email"  placeholder="Email" required/>
                        </div>
                        <div class="form-group">
                            <label>地址</label>
                            <input id="address" type="text" class="form-control" name="address"  placeholder="地址" required/>
                        </div>
                        <div class="form-group">
                            <label>邮编</label>
                            <input id="postcode" type="text" class="form-control" name="postcode"  placeholder="邮编" required/>
                        </div>
                        <div class="form-group">
                        <label>密保问题：</label>
                        <select name="Secret" class="selectpicker">
                        <option value="1">你的父亲是谁</option>
                        <option value="2">你最喜欢的球队</option>
                        <option value="3">你最喜欢的人</option>
                        </select>
                        </div>
                        <div class="form-group">
                        <label>密保答案：</label>
                            <input id="answer" type="text" class="form-control" name="Answer" required/>
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