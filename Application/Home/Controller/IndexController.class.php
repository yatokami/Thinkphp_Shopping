<?php
namespace Home\Controller;
use Think\Controller;
class IndexController extends Controller {
    public function index(){
        import('ORG.Util.Page');
        if(islogin()) {
            $data['uname'] = session('uname');
        } else {
           
        }

        $Goods = M('goods');
        $type_id = I('get.type_id');

        if(empty($type_id)) {
            $goods = $Goods->select();
            $indexs = getrandom(count($goods));
            for($i = 0; $i < count($indexs); $i++) {
                $goodss[$i] =$Goods->where(['goods_id' => $indexs[$i]])->find();
            }
            $data['goods'] = $goodss;
        } else {
            $type_id = I('get.type_id');
            $map['type_id'] = $type_id;

            $count =$Goods->where($map)->count();
            $page = new \Think\PageBootcss($count, 6);
            $limit = $page->firstRow.','.$page->listRows;
            $goodss = $Goods->where($map)->order('goods_id DESC')->limit($limit)->select();

            $data['goods'] = $goodss;
            $this->page = $page->show();

            // $type_id = I('get.type_id');
            // $map['type_id'] = $type_id;
            // $goodss = $Goods->where($map)->order('goods_id')->page($_GET['p'].',6')->select();
          
        }

        
        $goodtype = M('goodtype')->select();

        // $data['goods'] = $goodss;
        $data['goodtype'] = $goodtype;
        $this->assign('data',$data);
        $this->display();
    }


    public function sessions() {
        session(null);
        $this->redirect('Auth/login',null,3,'等待跳转');
    }

    
}