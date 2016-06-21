<?php
namespace Admin\Controller;
use Think\Controller;
class UserController extends BaseController {
    public function index(){
    }

    //重置密码
    public function reset_pwd() {
        $uname = I('Uname');
        $Users = M('users');

        $data['pwd'] = md5('000000');
        $count = $Users->where(['uname' => $uname])->save($data);

        $this->ajaxReturn($count);
    }

    //新商品入库
    public function add_good() {
        $btn_sub = I('BtnSubmit');
        $data['goods_name'] = I('GoodsName');
        $data['price'] = I('Price');

        $upload = new \Think\Upload();// 实例化上传类
        $upload->maxSize   =     3145728 ;// 设置附件上传大小
        $upload->exts      =     array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型
        $upload->rootPath  =      './Public/images/'; // 设置附件上传根目录
        $upload->autoSub = false;
        $upload->saveName = $data['goods_name'];
        $upload->replace = true;

        if($btn_sub == "提交1") {
            $data['type_id'] = I('TypeID');

            $upload->savePath  =      $data['type_id'].'/'; // 设置附件上传（子）目录
            // 上传单个文件 
            $info   =   $upload->uploadOne($_FILES['GoodsPicture']);

            if(!$info) {// 上传错误提示错误信息
                $this->error($upload->getError());
            }else{// 上传成功 获取上传文件信息
                $data['goods_imgsrc'] = $info['savename'];
                $data['add_date'] = time();
                $data2['goods_id']  = M('goods')
                                        ->add($data);
                $count = M('wellbad')
                            ->add($data2);
                if($count > 0) {
                    $this->success("上传成功等待页面跳转", '/admin/Index/add_good');
                } else {
                    $this->error("上传失败等待页面跳转", '/admin/Index/add_good');
                }
            }
        } else if($btn_sub == "提交2"){
            $dirnum=0;
            $filename=0;
            $file_count = finddir("./Public/images", $dirnum, $filenum);
            $file_count = $file_count + 1;
            $upload->savePath  =      $file_count.'/';
            $info   =   $upload->uploadOne($_FILES['GoodsPicture']);
            if(!$info) {// 上传错误提示错误信息
                $this->error($upload->getError());
            }else{// 上传成功 获取上传文件信息
                $data1['type_name'] = I('TypeName');
                $data1['type_id'] = $file_count;
                $data['goods_imgsrc'] = $info['savename'];
                $data['add_date'] = time();

                $data['type_id'] = M('goodtype')
                                    ->add($data1);
                $data2['goods_id']  = M('goods')
                                        ->add($data);
                $count = M('wellbad')
                            ->add($data2);
                if($count > 0) {
                    $this->success("上传成功等待页面跳转", '/admin/Index/add_good');
                } else {
                    $this->error("上传失败等待页面跳转", '/admin/Index/add_good');
                }
            }
        } else {

        }
    }

    //修改商品信息
    public function update_good() {
        $data['price'] = I('price');
        $data['goods_name'] = I('goods_name');
        $map['goods_name'] = $data['goods_name'];
        $Goods = M('goods');
        $good = $Goods
                ->where($map)
                ->find();

        $upload = new \Think\Upload();// 实例化上传类
        $upload->maxSize   =     3145728 ;// 设置附件上传大小
        $upload->exts      =     array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型
        $upload->rootPath  =      './Public/images/'; // 设置附件上传根目录
        $upload->autoSub = false;
        $upload->replace = true;
        $upload->saveName = $data['goods_name'];
        $upload->savePath  =     $good['type_id'].'/'; // 设置附件上传（子）目录
        // 上传单个文件 
        $info   =   $upload->uploadOne($_FILES['GoodsPicture']);
        if($info['savename']) {
            $data['goods_imgsrc'] = $info['savename'];
            $count = $Goods->where($map)->save($data);
        } else {
            $count = $Goods->where($map)->save($data);
        }
        if($count == 1) {
            $this->success("修改成功等待页面跳转", '/admin/Index/update_good');
        } else {
            $this->error("修改失败等待页面跳转", '/admin/Index/add_good');
        }
    }

    //删除商品
    public function delete_good() {
        $data['goods_id'] = I('goods_id');
        $map['goods_id'] = $data['goods_id'];
        $Goods = M('goods');

        $count = $Goods
                ->where($map)
                ->delete();

        $this->ajaxReturn($count);
    }

    //修改订单信息
    public function edit_order() {
        $data['order_id'] = I('order_id');
        $data['rec_name'] = I('rec_name');
        $data['rec_tel'] = I('rec_tel');
        $data['address'] = I('address');
        $data['postcode'] = I('postcode');
        $data['email'] = I('email');
        $Orders = M('orders');
        $map['order_id'] = $data['order_id'];

        $count = $Orders
                ->where($map)
                ->save($data);

        $this->ajaxReturn($count);
    }

    //删除订单
    public function delete_order() {
        $order_id = I('order_id');
        $Orders = M('orders');
        $map['order_id'] = $order_id;

        $count = $Orders
                ->where($map)
                ->delete();

        $this->ajaxReturn($count);
    }

    //操作订单列表
    public function action_order() {
        $order_ids = I('data');
        $action = I('action');
        $Orders = M('orders');

        if($action == "pass") {
            $data['order_status'] = "已审核";
            for($i = 0; $i < count($order_ids); $i++) {
                $count += $Orders
                        ->where(['order_id' => $order_ids[$i]['order_id']])
                        ->save($data);
            }
        } else if($action == "cancel"){
            $data['order_status'] = "未审核";
            for($i = 0; $i < count($order_ids); $i++) {
                $count += $Orders
                        ->where(['order_id' => $order_ids[$i]['order_id']])
                        ->save($data);
            }
        }
        $this->ajaxReturn($count);
    }

    //操作评论列表
    public function action_cmt() {
        $cmt_ids = I('data');
        $action = I('action');
        $Cmt = M('comment');

        if($action == "delete") {
            for($i = 0; $i < count($cmt_ids); $i++) {
                $count += $Cmt
                        ->where(['cmt_id' => $cmt_ids[$i]['cmt_id']])
                        ->delete();
            }
        }
        $this->ajaxReturn($count);
    }

    //添加新商品
    public function add_bulletin() {
        $data['bul_title'] = I('BulletinTitle');
        $data['bul_content'] = I('BulletinContent');
        $data['bul_startime'] = time();

        $upload = new \Think\Upload();// 实例化上传类
        $upload->maxSize   =     6145728 ;// 设置附件上传大小
        $upload->exts      =     array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型
        $upload->rootPath  =      './Public/bulletin/'; // 设置附件上传根目录
        $upload->replace   =     true;
        $upload->autoSub = false;
        $upload->savePath  =     ''; // 设置附件上传（子）目录

        $info   =   $upload->uploadOne($_FILES['BulletiImg']);
        if(!$info) {// 上传错误提示错误信息
            $this->error($upload->getError());
        }else{// 上传成功 获取上传文件信息
            $data['bul_imgsrc'] = $info['savename'];
            $count = M('bulletin')
                    ->add($data);
        }
        if($count > 0) {
            $this->success('发布新公告成功等待页面回跳', '/admin/Index/add_bulletin');
        } else {
            $this->error('发布新公告成功等待页面回跳', '/admin/Index/add_bulletin');
        }
    }

    //删除投诉
    public function action_pro() {
        $pro_ids = I('data');
        $action = I('action');
        $Problem = M('problem');

        if($action == "delete") {
            for($i = 0; $i < count($pro_ids); $i++) {
                $count += $Problem
                        ->where(['pro_id' => $pro_ids[$i]['pro_id']])
                        ->delete();
            }
        }
        $this->ajaxReturn($action);
    }

    //投诉问题回复
    public function reply() {
        $data['uname'] = I('uname');
        $data['pro_id'] = I('pro_id');
        $data['rep_content'] = I('reply_content');
        $data['rep_time'] = time();
        $Reply = M('reply');

        $count = $Reply->add($data);
        echo "<script>alert('回复成功');location.href='../index/pro_list'</script>";
    }
}