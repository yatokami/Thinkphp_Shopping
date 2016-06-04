<?php
namespace Home\Controller;
use Think\Controller;
class IndexController extends Controller {
    public function index(){
        if(islogin()) {
            $data['uname'] = session('uname');
        } else {
           
        }

        $goods = M('goods')->select();
        $goodtype = M('goodtype')->select();
        $indexs = getrandom(count($goods));
        for($i = 0; $i < count($indexs); $i++) {
            $goodss[$i] = M('goods')->where(['goods_id' => $indexs[$i]])->find();
        }

        $data['goods'] = $goodss;
        $data['goodtype'] = $goodtype;
        $this->assign('data',$data);
        $this->display();
    }

    public function menu() {
        $type_id = I('get.type_id');
        echo $type_id;
    }


    public function sessions() {
        session(null);
        $this->redirect('Auth/login',null,3,'等待跳转');
    }

    
}