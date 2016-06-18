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
    .scroll {
        margin: 0 auto;
        width: 630px;
        height: 210px;
        position: relative;
        overflow: hidden;
    }

        .scroll #ul1 {
            list-style-type: none;
            padding: 0;
            margin: 0;
            position: absolute;
            top: 0;
            left: 0;
            width: 99999px;
            height: 210px;
        }

        .scroll li {
            float: left;
            width: 630px;
        }

    .prev {
        position: absolute;
        left: -2px;
        top: 84px;
    }

    .next {
        position: absolute;
        right: -2px;
        top: 84px;
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
  
    <div class="row row-offcanvas row-offcanvas-right">

    <div class="col-xs-12 col-sm-9">
        <p class="pull-right visible-xs">
            <button type="button" class="btn btn-primary btn-xs" data-toggle="offcanvas">Toggle nav</button>
        </p>
        <form id="form1" action="<?php echo U('Index/search');?>" method="get">
          <div class="input-group">
          <input type="text" name="search_name" class="form-control input-lg"><span class="input-group-addon btn btn-primary" onclick="document.getElementById('form1').submit();">搜索</span>
          </div>
        </form>
        <div class="jumbotron" style="background-color:white">
            <h3>端午大放送</h3>
            <div class="scroll">
                <ul id="ul1">
                    <li><img src="/Public/assets/img/Bulletin/temp_pic_1.jpg"  width="630" height="210"></li>

                    <li><img src="/Public/assets/img/Bulletin/temp_pic_2.jpg"  width="630" height="210"></li>

                    <li><img src="/Public/assets/img/Bulletin/temp_pic_3.jpg"  width="630" height="210"></li>

                    <li><img src="/Public/assets/img/Bulletin/temp_pic_4.jpg"  width="630" height="210"></li>

                    <li><img src="/Public/assets/img/Bulletin/temp_pic_5.jpg"  width="630" height="210"></li>

                </ul>

                <a href="#" class="prev"><img src="/Public/assets/img/Bulletin/arrow-prev.png" border="0"></a>

                <a href="#" class="next"><img src="/Public/assets/img/Bulletin/arrow-next.png" border="0"></a>

            </div>
        </div>
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
 
    <script type="text/javascript">
      
//兼容各种浏览器

  $(function(){

     var w=630;

      var l=0;

      var timer=null;

      var len=$("#ul1 li").length*2; //复制了一份图片，长度变了。

      //复制一份图片，是为了解决第一张图片切换到最后一张或 最后一张切换到第一张时，图片区域会出现空白，用户体验不友好。

      // 页面一加载，就把ul定位到追加图片的第一张（本身图片在前，追加图片在后。）

      //当图片位置到第一份图片第二张时，马上把图片定位到第二份的第一张,图片位置到最后一张时（第二份最后一张）时，就把图片定位到第一份最后一张,

      //这样图片后面或前面还有一张图片，切换时不会留下空白。（关键之处）

    //加载后图片排列像这样：1  2  3  4  5  1  2  3  4  5

     $("#ul1").append($("#ul1").html()).css({'width':len*w, 'left': -len*w/2});



    //自动每8秒切换一次

    timer=setInterval(init,8000);

    function init(){

         $(".scroll .next").trigger('click'); //当页面一加载就触发next按钮的点击事件，用trigger的好处是减少重复代码,如果不用，就要把按钮click事件里代码全部复制过来，因为加载的代码和点击next按钮代码和效果相同，所以就用trigger触发执行click里面代码。

    }



    $("#ul1 li").hover(function(){

         clearInterval(timer);

        },function(){

            timer=setInterval(init,8000);

       });



      $(".prev").click(function(){

          l=parseInt($("#ul1").css("left"))+w;  //这里要转成整数，因为后面带了px单位

             showCurrent(l);

          });

          $(".next").click(function(){

             l=parseInt($("#ul1").css("left"))-w;  //这里要转成整数，因为后面带了px单位

            showCurrent(l);

      });

       function showCurrent(l){     //把图片的左右切换封装成一个函数

       if($("#ul1").is(':animated')){ //当ul正在执行动画的过程中，阻止执行其它动作。关键之处，不然图片切换显示不完全，到最后图片空白不显示。

          return;

       }

          $("#ul1").animate({"left":l},500,function(){

                if(l==0){ //当图片位置到第一份图片第二张时，马上把图片定位到第二份的第一张。注意这里的设置的css一定到写在animate动画完成时的执行  //函数里。否则图片只是一瞬间回到第一张，但是没有向右的动画效果。 我在做的时候，用的不是css,而是用animate()定位到第二个第一张，结果切换时，是反方向的运动，一直觉得无论怎样，图片方向都会发生变化 ，弄得花了一天时间才找到原因，所以一定 要用css。

               $("#ul1").css("left",-len*w/2);



             }else if(l==(1-len)*w){ //图片位置到最后一张时（第二份最后一张）时，就把图片定位到第一份最后一张。从而显示的是第一份最后一张。

                 $("#ul1").css('left',(1-len/2)*w);

                }

            });

         }



      });

</script>

</body>
</html>