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
  
    <form method="post">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="myModalLabel">请在下面输入您的问题</h4>
        </div>
        <div class="modal-body" style="text-align:center">
             <textarea name="pro_content" id="pro_content" class="form-control" rows="5" required placeholder="内容"></textarea><br>
        </div>
        <div class="modal-footer">
            <input id='sub' type="button" class="btn btn-primary" value="提问">
        </div>
    </form>

 </div>
 
	<script type="text/javascript">
		$('#sub').click(function() {
			var pro_content = $('#pro_content').val()
            if(pro_content != "") {
			    var data = {'pro_content': pro_content}
    			$.ajax({
    				url: "<?php echo U('User/sub_question');?>",
    				type: "POST",
    				data: data,
    				success: function (data) {
                    	if(data > 0) {
                    		alert('提交成功，请等待客服人员处理')
                    		location.reload() 
                    	} else {
                    		alert('用户还未登录')
                    	}
                    },
                    error: function () {
                    	alert('提交出现异常')
                    }
    			})
            } else {
                alert('问题不能为空')
            }
		})
	</script>

</body>
</html>