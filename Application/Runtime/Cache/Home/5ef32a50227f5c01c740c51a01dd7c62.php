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
            width: 40px;
            height: 50px;
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
            width: 130px;
        }

        .li-del {
            margin: 20px 0 0 30px;
            width: 120px;
        }

        .li-date {
            margin: 20px 0 0 30px;
            width: 50px;
        }
        .li-img {
            margin: 0 0 0 75px;
        }
    </style>

</head>
<body data-spy="scroll" data-target="#myScrollspy">

<nav class="navbar navbar-default" role="navigation">
    <div class="navbar-header">
        <a class="navbar-brand" href="/Home/Index">手机电子商城</a>
    </div>
    <div class="navbar-right">
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
            <li><a href="#contact">联系客服</a></li>
        </ul>
    </div>
 </nav>


 <div class="container">
  
<div style="margin:50px auto;width: 1024px;">
    <div>
        <div>
            <div style="float:right;">
                <a class="btn  btn-xs btn-success" href="Index" style="margin-right: 35px;">商品页</a>
            </div>
            <h2>购物车</h2>
            <hr>
        </div>
        <div>
            <div class="cart-heading">
                <div style="padding: 10px 0 0 10px">
                    <span style="margin-right: 120px;">
                        <input id="CheckAll" type="checkbox"> 全选
                    </span>
                    <span style="margin-right: 150px;">商品</span>
                    <span style="margin-right: 150px;">价格</span>
                    <span style="margin-right: 100px;">数量</span>
                    <span style="margin-right: 120px;">操作</span>
                    <span style="padding-right: 0px;">加入购物车日期</span>
                </div>
            </div>
            <div class="cart-body">
                <ul>
                    <?php if(is_array($data["buyinfo"])): $i = 0; $__LIST__ = $data["buyinfo"];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li>
                        <div class="li-checkbox">
                            <input data-id="<?php echo ($vo["goods_id"]); ?>" data-index="<?php echo ++$a;?>" data-price="<?php echo ($vo["price"]); ?>" data-buyid="<?php echo ($vo["buy_id"]); ?>" name="chkItem" class="li-checkbox input" type="checkbox" />
                        </div>
                        <div class="li-img">
                            <a>
                                <img class="li-img a img" src="/Public/images/<?php echo ($vo["type_id"]); ?>/<?php echo ($vo["goods_imgsrc"]); ?>">
                            </a>
                        </div>
                        <div class="li-content">
                            <a><?php echo ($vo["goods_name"]); ?></a>
                        </div>
                        <div class="li-price">
                            <span><?php echo ($vo["price"]); ?></span>
                        </div>
                        <div class="li-quantity">
                            <a data-type="add" href="javascript:void(0);" class="btn btn-default btn-xs ">+</a>
                            <input id="Q<?php echo ($i); ?>" style="width: 40px;" type="text" value="<?php echo ($vo["num"]); ?>">
                            <a data-type='subtr' href="javascript:void(0);" class="btn btn-default btn-xs">-</a>
                        </div>
                        <div class="li-del">
                            <a href="" class="btn btn-primary btn-xs">删除</a>
                        </div>
                        <div class="li-date">
                            <span><?php echo ($vo["add_date"]); ?></span>
                        </div>
                    </li><?php endforeach; endif; else: echo "" ;endif; ?>
                </ul>

            </div>

            <div style="float: right;height: 35px;width:330px;">
                <div class="btn-group" role="group" aria-label="...">
                    <ul class="pager">
                       <?php echo ($page); ?>
                    </ul>
                </div>
                总计：<span id="money" style="color: red;font-size: 25px">￥0.00</span>
                <input type="button" style="width: 130px;float:right;" class="btn btn-success" onclick="Clearing();" value="结 算" />
            
            </div>
        </div>
    </div>
</div>


 </div>
 
<script type="text/javascript">
    $(function () {
        // 商品+-
        $('.li-quantity a').click(function () {
            var self = $(this)
            var type = self.attr('data-type'),
                num = parseFloat(self.siblings('input').val());
            if (type == 'add') {
                num += 1;
            } else if (type == 'subtr') {
                if (num > 1) {
                    num -= 1;
                } else {
                    return false;
                }
            }
            self.siblings('input').val(num)
            tamount()
        });

        //checkbox 单选事件
        $('input[name="chkItem"]:checkbox').click(function () {
            var isCheck = $('input[name="chkItem"]:not(:checked)').length ? false : true
            $('#CheckAll').prop("checked", isCheck)
            tamount()
        });

        //checkbox 全选事件
        $('#CheckAll').click(function () {
            var self = $(this)
            $('input[name="chkItem"]').each(function () {
                $(this).prop("checked", self.is(':checked'))
            })
            tamount()
        })

    })
    var sum = 0;
    //用户结算
    function Clearing() {
 
        var datas = []
        var k = 0
        // var GoodsIDs = "";
        // var Nums = "";
        // var BuyIDs = "";
        $('input[name="chkItem"]:checked').each(function () {
            var self = $(this),
                    index = self.attr('data-index'),
                    GoodsID = self.attr('data-id'),
                    BuyID = self.attr('data-buyid')
            var Num = $('#Q' + index).val()
            // GoodsIDs += GoodsID + ","
            // Nums += Num + ","
            // BuyIDs += BuyID + ","
            var row = {"goods_id": GoodsID, "num": Num, "buy_id": BuyID}
            datas.push(row)
        })
        // datas = { "GoodsIDs": GoodsIDs, "Nums": Nums, "BuyIDs": BuyIDs }
        data = {"datas": datas}
        $.ajax({
            type: 'post',
            url: "<?php echo U('User/clear');?>",
            data: data,
            success: function (data) {
                console.log(data)
            },
            error: function (data, status) {
                Clearing()
            }
        });
        // location.href = "Cart"
    }
    //计算商品总价格
    function tamount() {
        sum = 0
        $('input[name="chkItem"]:checked').each(function () {
            var self = $(this),
                price = self.attr('data-price'),
                index = self.attr('data-index')
            var quantity = $('#Q' + index).val()
            sum += (parseFloat(price) * parseFloat(quantity))
        })
        $("#money").html('￥' + sum + '.00')
    }
</script>

</body>
</html>