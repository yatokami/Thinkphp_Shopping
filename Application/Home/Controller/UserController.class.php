<?php
namespace Home\Controller;
use Think\Controller;
class UserController extends BaseController {
    //信息界面显示
    public function info() {
        $data['uname'] = session("uname");
        $uid = M('users')
                ->field('uid')
                ->where(['uname' => $data['uname']])
                ->find();
        $data['info'] = M('userinfo')
                        ->where(['uid' => $uid['uid']])
                        ->select();
        $this->sex = $data['info'][0][sex];
        $this->uname =  $data['uname'];
        $this->assign('data',$data);
        // echo dump($data['info'][0]['sex']);
        $this->display();
    }

    //用户信息更新
    public function update() {
        $Users = M('users');
        $UserInfo = M('userinfo');

        $uname = session("uname");
        $data['uid'] = $Users
                        ->where(['uname' => $uname])
                        ->getField('uid');
        $data['realname'] = I('post.RealName');
        $data['tel'] = I('post.Tel');
        $data['sex'] = I('post.Sex');
        $data['eamil'] = I('post.Email');
        $data['address'] = I('post.Address');
        $data['postcode'] = I('post.PostCode');

        $UserInfo->where(['uid' => $data['uid']])->save($data);
        $this->success('更新信息成功','info');
    }

    //加入购物车
    public function add_cart() {
        $data['num'] = I('num');
        $data['goods_id'] = I('goods_id');
        $data['uname'] = session('uname');

        $Goods = M('goods');
        $BuyInfo = M('buyinfo');
        $Users = M('users');

        $data['uid'] = $Users->
                        where(['uname' => $data['uname']])
                        ->getField('uid');
        $good = $Goods->
                    where(['goods_id' => $data['goods_id']])
                    ->find();
        $data['price'] = $data['num'] * $good['price'];
        $data['buy_date'] = time(); 
        $id = $BuyInfo->add($data);
        
        $this->ajaxReturn($id);
    }

    //显示购物车
    public function cart() {
        $uname = session('uname');

        $BuyInfo = M('buyinfo');
        $map['uname'] = $uname;

        //分页效果
        $count =$BuyInfo
                    ->join('goods ON goods.goods_id = buyinfo.goods_id')
                    ->where($map)
                    ->count();
        $page = new \Think\PageBootcss($count, 5);
        $limit = $page->firstRow.','.$page->listRows;
        $buyinfo = $BuyInfo
                    ->join('goods ON goods.goods_id = buyinfo.goods_id')
                    ->where($map)->order('buy_id DESC')
                    ->limit($limit)
                    ->select();

        $data['buyinfo'] = $buyinfo;
        $this->page = $page->show();
        $this->a = 0;
        $this->uname = $uname;
        $this->assign('data',$data);
        $this->display();
    }

    //购物车结算
    public function clear() {
        $data = I('post.data');
        $paytype = I('post.paytype');
        $order['uname'] = session('uname');

        $Users = M('users');
        $UserInfo = M('userinfo');
        $Orders = M('orders');
        $OrderDetail = M('orderdetail');
        $Goods = M('goods');
        $BuyInfo = M('buyinfo');


        for($i = 0; $i < count($data); $i++) {
            $price = $Goods
                    ->where(['goods_id' => $data[$i]['goods_id']])
                    ->getField('price');
            $totalmoneys[$i] = $price * $data[$i]['num'];
            $totalmoney += $price * $data[$i]['num'];
        }
        if($totalmoney != 0) {
            $order['uid'] = $Users
                            ->where(['uname' => $order['uname']])
                            ->getField('uid');
            $userinfo = $UserInfo
                        ->where(['uid' => $order['uid']])
                        ->find();

            $order['totalmoney'] = $totalmoney;
            $order['order_date'] = time();
            $order['order_status'] = "未接单";
            $order['paytype'] = $paytype;
            $order['ispayed'] = "已付款";
            $order['rec_name'] = $userinfo['realname'];
            $order['rec_tel'] = $userinfo['tel'];
            $order['address'] = $userinfo['address'];
            $order['postcode'] = $userinfo['postcode'];
            $order['email'] = $userinfo['email'];

            $orderdetail['order_id'] = $Orders->add($order);

            for($j = 0; $j < count($data); $j++) {
                $orderdetail['num'] = $data[$j]['num'];
                $orderdetail['goods_id'] = $data[$j]['goods_id'];
                $orderdetail['totalmoney'] = $totalmoneys[$j];
                $count += $OrderDetail->add($orderdetail);

                $BuyInfo->where(['buy_id' => $data[$j]['buy_id']])->delete();
            } 
        
            if($count == count($data)) {
                $this->ajaxReturn(1);
            } else {
                $this->ajaxReturn(0);
            }
        } else {
            $this->ajaxReturn(-1);
        }
    }

    //订单列表
    public function order() {
        $Orders = M('orders');
        $OrderDetail = M('orderdetail');
        $uname = session('uname');
        $map['uname'] = $uname;

        //分页效果
        $count = $Orders->where($map)->count();
        $page = new \Think\PageBootcss($count, 5);
        $limit = $page->firstRow.','.$page->listRows;
        $order = $Orders
                    ->where($map)
                    ->order('order_id DESC')
                    ->limit($limit)
                    ->select();

        //计算订单内商品总数量
        for($i = 0; $i < count($order); $i++){
            $num = $OrderDetail
                    ->field('sum(num)')
                    ->where(['order_id' => $order[$i]['order_id']])
                    ->group('order_id')
                    ->find();

            $order[$i]['num'] = $num["sum(num)"];
        }

        $data['order'] = $order;
        $this->uname = $uname;
        $this->page = $page->show();
        $this->assign('data',$data);
        $this->display();
    }

    //订单明细
    public function orderdetail() {
        $order_id = I('order_id');
        $uname = session('uname');
        $Goods = M('goods');
        $OrderDetail = M('orderdetail');
        $map['order_id'] = $order_id;

        $orderdetail = $Goods
                        ->join('orderdetail ON goods.goods_id = orderdetail.goods_id')
                        ->where($map)
                        ->select();
        
        $data['orderdetail'] = $orderdetail;
        $this->uname = $uname;
        $this->assign('data',$data);
        $this->display();
    }

    //用户点赞
    public function wellbad() {
        $goods_id = I('goods_id');
        $index = I('index');
        $WellBad = M('wellbad');
        $Orders = M('orders');
        $User_Produce1 = M('user_produce1');
        $uname = session('uname');
        $map1['orderdetail.goods_id'] = $goods_id;
        $map1['orders.uname'] = $uname;
        $map2['goods_id'] = $goods_id;
        $map2['uname'] = $uname;

        //查看用户是否购买过商品
        $count1 = $Orders
                    ->join('orderdetail ON orders.order_id = orderdetail.order_id')
                    ->where($map1)
                    ->count();
        //查看用户是否已经点赞过
        $count2 = $User_Produce1->where($map2)->count();
        if($count1 >= 1 && $count2 == 0) {
            if($index == 1) {
                //满足条件自增1
                $WellBad->where(['goods_id' => $goods_id])->setInc('wells');
                $count = $WellBad
                            ->where(['goods_id' => $goods_id])
                            ->getField('wells');
            } else if($index == -1) {
                $WellBad->where(['goods_id' => $goods_id])->setInc('bads');
                $count = $WellBad
                            ->where(['goods_id' => $goods_id])
                            ->getField('bads');
            } else {
                $this->ajaxReturn(-1);
            }
            $User_Produce1->add($map2);
            $this->ajaxReturn($count);
        } else if($count1 >= 1 && $count2 == 1){
            $this->ajaxReturn(-2);
        } else if($count1 == 0) {
            $this->ajaxReturn(-3);
        }
    }

    //用户评论
    public function commit() {
        $goods_id = I('goods_id');
        $cmt_content = I('cmt_content');
        $uname = session('uname');
        $Comment = M('comment');
        $Orders = M('orders');
        $User_Produce2 = M('user_produce2');
        $map1['orderdetail.goods_id'] = $goods_id;
        $map1['orders.uname'] = $uname;
        $map2['goods_id'] = $goods_id;
        $map2['uname'] = $uname;

        $data['cmt_content'] = $cmt_content;
        $data['cmt_startime'] = time();
        $data['goods_id'] = $goods_id;
        $data['uname'] = $uname;

        //查看用户是否购买过商品
        $count1 = $Orders
                    ->join('orderdetail ON orders.order_id = orderdetail.order_id')
                    ->where($map1)
                    ->count();
        
        //查看用户是否已经评论过
        $count2 = $User_Produce2->where($map2)->count();
        if($count1 >= 1 && $count2 == 0) {
            $count = $Comment->add($data);
            $User_Produce2->add($map2);
            $this->ajaxReturn($count);
        } else if($count1 >= 1 && $count2 == 1){
            $this->ajaxReturn(-2);
        } else if($count1 == 0) {
            $this->ajaxReturn(-3);
        }
    }

    //删除购物车中物品
    public function delete() {
        $buy_id = I('buy_id');
        $BuyInfo = M('buyinfo');
        $map['buy_id'] = $buy_id;
        $count = $BuyInfo
                    ->where($map)
                    ->delete();

        $this->ajaxReturn($count);
    }

    //用户提问
    public function sub_question() {
        $pro_content = I('post.pro_content');
        if(strlen($pro_content) <= 60) {
            $uname = session('uname');
            $Problem = M('problem');

            $data['uname'] = $uname;
            $data['pro_content'] = $pro_content;
            $data['pro_time'] = time();

            $count = $Problem->add($data);
            $this->ajaxReturn($count);
        } else {
            $this->ajaxReturn(0);
        }

    }

    // public function getwell() {
    //     $Goods = M('goods');
    //     $WellBad = M('wellbad');

    //     $count = $Goods->where(1)->count();
    //     $data['wells'] = 0;
    //     $data['bads'] = 0;
    //     for($i = 1; $i <= $count; $i++) {
    //         $data['goods_id'] = $i;
    //         $WellBad->add($data);
    //     }
    // }
}