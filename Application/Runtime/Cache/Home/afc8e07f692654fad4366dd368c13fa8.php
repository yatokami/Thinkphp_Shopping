<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>修改密码</title>
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
	<div class="container web-body" style="margin-top:100px;width: 900px;">
    <div class="row">
        <div class="col-lg-6 col-lg-offset-3">
            <div class="panel panel-default">
                <div class="panel-heading" style="height: 50px;">
                    <div class="panel-title" style="text-align: left">找回密码</div>
                </div>
                <div class="panel-body">
                    <div class="form-group">
                        <label>用户名:</label>
                        <input id="uname" type="text" class="form-control" name="Uname" />
                    </div>
                    <div class="form-group">
                        <label>密保问题：</label>
                        <select id="secret" class="selectpicker">
                        <option value="1">你的父亲是谁</option>
                        <option value="2">你最喜欢的球队</option>
                        <option value="3">你最喜欢的人</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>密保答案：</label>
                        <input id="answer" type="text" class="form-control" name="Answer" />
                    </div>
                    <div class="form-group">
                        <label>新密码：</label>
                        <input id="password" type="text" class="form-control" name="PassWord" />
                    </div>
                    <div class="form-group">
                        <p class="top15 captcha" id="captcha-container">  
                        <label>验证码：</label>
                        <input id="verify" name="verify" width="50%" height="50" class="form-control" placeholder="验证码" type="text">                  
                        <img id="imgs" width="30%" class="left15" height="50" alt="验证码" src="<?php echo U('Auth/verify_c',array());?>" onclick="verifys()" title="点击刷新">  
                        </p>  
                    </div>
                    <div class="form-group">
                        <input type="button" class="btn btn-success btn-block"  value="提交" onclick="sub()" />
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    <script type="text/javascript">

        function verifys() {
            var captcha_img = $('#captcha-container').find('img')  
            var verifyimg = captcha_img.attr("src");  
            captcha_img.attr('title', '点击刷新'); 
            if(verifyimg.indexOf('?')>0){  
                $('#imgs').attr("src", verifyimg+'&random='+Math.random());  
            }else{  
                $('#imgs').attr("src", verifyimg.replace(/\?.*$/,'')+'?'+Math.random());  
            }  
        }

        function sub() {
            var secret = $('#secret').val();
            var uname = $('#uname').val();
            var answer = $('#answer').val();
            var password = $('#password').val();
            var verify = $('#verify').val();
            var data = {
                'secret' : secret,
                'uname' : uname,
                'answer' : answer,
                'password' : password,
                'verify' : verify
            }
            $.ajax({
                type: 'post',
                url: "<?php echo U('Auth/change_password');?>",
                data: data,
                success: function (data) {
                    var result = $.parseJSON(data)
                    if(result == 1) {
                        alert('修改成功')
                        location.href = "<?php echo U('Auth/login');?>"
                    } else if(result == -1) {
                        alert('验证码错误')
                        verifys()
                    } else if(result == -2) {
                        alert('该用户名不存在')
                        verifys()
                    } else if(result == -3) {
                        alert('密保问题回答错误')
                        verifys()
                    } else {
                        alert('出现异常')
                        verifys()
                    }
                },
                error: function (data, status) {
                    alert('提交时出现异常')
                    verifys()
                }
            })
        }
    </script>
</body>
</html>