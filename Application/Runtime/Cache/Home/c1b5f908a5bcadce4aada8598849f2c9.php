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
                        <li><a href="<?php echo U('User/rep_info');?>">信息中心<span class="label label-success"><?php echo ($rep_count); ?></span></a></li>
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
  
    <div style="float:right;">
        <a class="btn  btn-ls btn-success" href="<?php echo U('Index/index');?>" style="margin-right: 35px;">商品页</a>
    </div>
	<div class="form-group">
    <input id="GoodsID" type="hidden" value="<?php echo ($good["goods_id"]); ?>" />
    <h2> 商品名称:<?php echo ($good["goods_name"]); ?></h2>
    <img style="width:300px;height:300px" class="img-rounded" src="/Public/images/<?php echo ($good["type_id"]); ?>/<?php echo ($good["goods_imgsrc"]); ?>" />
    <div class="li-price">
        <span>单价:</span><span><?php echo ($good["price"]); ?></span>
        <input id="price" type="hidden" value="<?php echo ($good["price"]); ?>}">
    </div>
    <div class="li-quantity">
        <a data-type="add" href="javascript:void(0);" class="btn btn-default btn-xs ">+</a>
        <input id="num" style="width: 40px;" type="text" value="1">
        <a data-type='subtr' href="javascript:void(0);" class="btn btn-default btn-xs">-</a>
    </div>
    </div>
    <div class="input-group">
        <button class="btn btn-danger" onclick="WellBad(1)" style="margin-right:5px"><span id="Well" class="glyphicon glyphicon-thumbs-up"><?php echo ($wellbad["wells"]); ?></span></button>
        <button class="btn btn-danger" onclick="WellBad(-1)" style="margin-right:5px"><span id="Bad" class="glyphicon glyphicon-thumbs-down"><?php echo ($wellbad["bads"]); ?></span></button>
        <input type="button"  class="btn btn-success" value="加入购物车" onclick="AddCart()">
    </div>
    <div class="input-group">
        总计：<p id="money" style="color: red;font-size: 25px"></p>
    </div>

    <div class="input-group">
        <span class="input-group-addon" id="basic-addon1">评论发表</span>
        <input type="text" id="Comment" name="Comment" class="form-control" placeholder="评论" aria-describedby="basic-addon1">
    </div>
    <div class="input-group">
        <input type="submit" class="btn btn-default" value="发表评论" onclick="Commit()">
    </div>
    <ul class="list-group">
        <?php if(is_array($comment)): $i = 0; $__LIST__ = $comment;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li class="list-group-item list-group-item-success">
                <div class="media">
                    <div class="media-left media-middle">
                        <a href="#">
                            <p id="p1"><?php echo ($vo["uname"]); ?></p>
                        </a>
                    </div>
                    <div class="media-body">
                        <h4 class="media-heading"><?php echo (date('Y-m-d H:i:s', $vo["cmt_startime"])); ?></h4>
                        <p id="p2"><?php echo ($vo["cmt_content"]); ?></p>
                    </div>
                </div>
            </li><?php endforeach; endif; else: echo "" ;endif; ?>
        <div class="btn-group" role="group" aria-label="...">
            <ul class="pager">
              <?php echo ($page); ?>
            </ul>
        </div>
    </ul>

 </div>
 
<script>
        function Commit() {
            var Comment = $("#Comment").val();
            var GoodsID = $("#GoodsID").val();

            var data = { "cmt_content": Comment, "goods_id": GoodsID }
            $.ajax ({
                url: "<?php echo U('User/commit');?>",
                type: "POST",
                data: data,
                success: function (data) {
                    if(data == -2) {
                        alert('用户评论过')
                    } else if(data == -3) {
                        alert('尚未购买商品无法评论')
                    } else if(data == -1) {
                        alert('点赞失败')
                    } else if(data > 0){
                        alert('评论成功')
                        location.reload();
                    } else {
                        alert('用户还未登录')
                    }
                },
                error: function () {

                }
            })

        }

		function ChangeWB(index, result) {
            if (index == 1)
                $("#Well").html(result)
            else if (index == -1)
                $("#Bad").html(result)
        }
		//异步提交点赞踩
        function WellBad(index) {
            var GoodsID = $("#GoodsID").val()
            var data = { "goods_id": GoodsID, "index": index }
            $.ajax({
                url: "<?php echo U('User/wellbad');?>",
                type: "POST",
                data: data,
                success: function (data) {
                    if(data == -2) {
                    	alert('用户已点赞过')
                    } else if(data == -3) {
                    	alert('尚未购买商品无法点赞')
                    } else if(data == -1) {
                    	alert('点赞失败')
                    } else if(data > 0) {
                    	if (index == 1) {
                        	ChangeWB(1, data)
	                    } else if (index == -1) {
	                        ChangeWB(-1, data)
	                    }
	                    alert('点赞成功')
                    } else {
                        alert('用户还未登录')
                    }
                },
                error: function () {
                    alert("点击失败")
                }
            })
        }



        $(function () {
            // 商品+-
            $('.li-quantity a').click(function () {
                var self = $(this);
                var type = self.attr('data-type'),
                    num = parseFloat(self.siblings('input').val())
                if (type == 'add') {
                    num += 1
                } else if (type == 'subtr') {
                    if (num > 1) {
                        num -= 1
                    } else {
                        return false
                    }
                }
                self.siblings('input').val(num)
                tamount()
            });
        });
        var sum = 0
        //计算商品总价格
        function tamount() {
            price = $("#price").val()
            num = $("#num").val()
            sum = (parseFloat(price) * parseFloat(num))
            $("#money").html('￥' + sum + '.00')
        }
        tamount()

        //加入购物车
        function AddCart() {
            var num = $("#num").val()
            var goods_id = $("#GoodsID").val()
            var data = { "num": num, "goods_id": goods_id }
            var jsondata = data
            $.ajax({
                url: "<?php echo U('User/add_cart');?>",
                type: "POST",
                data: jsondata,
                success: function (data) {
                	if(data > 0) {
                        alert('加入购物车成功')
                        location.reload() 
                    } else {
                        alert('用户还未登录')
                    }
                },
                error: function () {
                    alert("加入购物车失败")
                }
            })

        }
    </script>

</body>
</html>