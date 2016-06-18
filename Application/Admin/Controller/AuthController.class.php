<?php
namespace Admin\Controller;
use Think\Controller;
class AuthController extends Controller {
    public function login(){
        $this->display();
    }
    public function getlogin() {
        $data['name'] = I('AdminName');
        $data['pwd'] = I('AdminPwd');
        $Admin = M('admin');

        $count = $Admin->where($data)->count();
        if($count == 1) {
            session('admin_name', $data['name']);
            $this->success('登录成功等待进入主页','/Admin/Index/index');
        } else {
            $this->error('登录失败，用户名或密码错误');
        }
    }

} 