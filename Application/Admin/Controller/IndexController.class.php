<?php
namespace Admin\Controller;
use Think\Controller;
class IndexController extends Controller {

    //显示用户信息界面
    public function index(){
        $name = session('admin_name');
        $uname = I('post.Uname');
        $Users = M('users');
        $Userinfo = M('userinfo');

        $map['uname'] = array('like', "%$uname%");
        $count = $Users
                ->join('userinfo ON users.uid = userinfo.uid')
                ->where($map)
                ->count();
        $page = new \Think\PageBootcss($count, 10);
        $limit = $page->firstRow.','.$page->listRows;

        $data['users'] = $Users
                        ->join('userinfo ON users.uid = userinfo.uid')
                        ->where($map)
                        ->order('reg_time DESC')
                        ->limit($limit)
                        ->select();

        $this->page = $page->show();
        $this->user_active = "active";
        $this->user_info_active = "active";
        $this->uname = $name;
        $this->user_count = $count;
        $this->assign('data', $data);
        $this->display();
    }

    //显示用户密码重置界面
    public function reset_pwd() {
        $name = session('admin_name');
        $uname = I('post.Uname');
        $Users = M('users');

        $map['uname'] = array('like', "%$uname%");
        $count = $Users
                ->where($map)
                ->count();
        $page = new \Think\PageBootcss($count, 10);
        $limit = $page->firstRow.','.$page->listRows;

        $data['users'] = $Users
                        ->where($map)
                        ->order('uid DESC')
                        ->limit($limit)
                        ->select();

        $this->page = $page->show();
        $this->user_active = "active";
        $this->user_pwd_active = "active";
        $this->uname = $name;
        $this->user_count = $count;
        $this->assign('data', $data);
        $this->display();
    }

    //显示添加新商品界面
    public function add_good() {
        $GoodType = M('goodtype');

        $data['goodtype'] = $GoodType->select();

        $this->uname = session('admin_name');
        $this->goods_active = "active";
        $this->goods_add_active = "active";
        $this->assign('data', $data);
        $this->display();
    }

    //显示商品信息界面
    public function good() {
        $Goods = M('goods');
        $goods_name = I('get.GoodsName');
        $action = I('action');
        $map['goods_name'] = array('like', "%$goods_name%");
        $count = $Goods
                ->where($map)
                ->count();
        $page = new \Think\PageBootcss($count, 10);
        $limit = $page->firstRow.','.$page->listRows;
        $data['goods'] = $Goods
                        ->where($map)
                        ->order('goods_id asc')
                        ->limit($limit)
                        ->select();

        $this->page = $page->show();
        $this->goods_count = $count;
        $this->uname = session('admin_name');
        $this->goods_active = "active";
        $this->assign('data', $data);
        if($action == 'update') {
            $this->goods_update_active = "active";
            $this->display('update_good');
        } else if($action == 'select') {
            $this->goods_select_active = "active";
            $this->display('select_good');
        } else if($action == 'delete') {
            $this->goods_delete_active = "active";
            $this->display('delete_good');
        }
    }

    //显示订单信息页面
    public function order_info() {
        $Orders = M('orders');
        $uname = I('uname');
        $order_id = I('order_id');
        $map['uname'] = array('like', "%$uname%");
        if($order_id != "") {
            $map['order_id'] = $order_id;
        }
        $count = $Orders
                ->where($map)
                ->count();
        $page = new \Think\PageBootcss($count, 10);
        $limit = $page->firstRow.','.$page->listRows;
        $data['orders'] = $Orders
                        ->where($map)
                        ->order('order_id asc')
                        ->limit($limit)
                        ->select();

        $this->page = $page->show();
        $this->order_active = "active";
        $this->order_info_active = "active";
        $this->order_count = $count;
       $this->uname = session('admin_name');
        $this->assign('data', $data);
        $this->display();
    }

    //显示订单详情页面
    public function order_info_view() {
        $order_id = I('order_id');
        $Orders = M('orders');
        $Order_detail = M('orderdetail');
        if($order_id > $Orders->count()) {
            $order_id = $Orders->count();
        } else if($order_id < 1){
            $order_id = 1;
        }
        $order = $Orders
                ->where(['order_id' => $order_id])
                ->find();

        $order_detail = $Order_detail
                        ->join('goods ON orderdetail.goods_id = goods.goods_id')
                        ->where(['order_id' => $order_id])
                        ->select();

        $this->order_active = "active";
        $this->order_info_active = "active";
        $this->order_detail = $order_detail;
        $this->assign('data', $order);
        $this->order_id = $order_id;
        $this->uname = session('admin_name');
        $this->display();
    }

    //显示评论管理页面
    public function comment() {
        $uname = I('uname');
        $map['uname'] = array('like', "%$uname%");
        $Cmt = M('comment');

        $count = $Cmt
                ->join('goods ON comment.goods_id = goods.goods_id')
                ->where($map)
                ->count();
        $page = new \Think\PageBootcss($count, 10);
        $limit = $page->firstRow.','.$page->listRows;
        $data['cmt'] = $Cmt
                    ->join('goods ON comment.goods_id = goods.goods_id')
                    ->where($map)
                    ->order('cmt_id asc')
                    ->limit($limit)
                    ->select();

        $this->page = $page->show();
        $this->assign('data', $data);
        $this->cmt_count = $count;
        $this->cmt_del_active = "active";
        $this->cmt_active = "active";
        $this->uname = session('admin_name');
        $this->display('delete_comment');
    }

    //添加新商品页面
    public function add_bulletin() {
        $this->uname = session('admin_name');
        $this->bul_active = "active";
        $this->bul_add_active = "active";
        $this->display();
    }

    // public function insert() {
    //     // $Users = M('users');
    //     // $data['uname'] = 'ssss';
    //     // $data['pwd'] = '333';
    //     // $data['secret'] = '33';
    //     // $data['answer'] = 'dasd';
    //     // $data['rolecoode'] = '1222';
    //     // $data2['reg_time'] = time();
    //     // for($i = 1; $i < 10000; $i++) {
    //     //     $data2['uid'] = $Users->add($data);
    //     //     M('userinfo')->add($data2);
    //     // }
    //     // $Users->where(['uname' => 'ssss'])->delete();
    //     // for($i = 10015; $i <= 20013; $i++)
    //     // M('userinfo')->where(['uid' => $i])->delete();
    // }
}