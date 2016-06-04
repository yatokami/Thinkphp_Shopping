<?php
namespace Home\Controller;
use Think\Controller;
class AuthController extends Controller {
    public function login() {
        $this->display();
    }

    public function getlogin() {
        $uname = I('post.uname');
        $pwd = I('post.pwd');
        $users = M('users');

        if($users->where(['uname' => $uname, 'pwd' => $pwd])->select()) {
            $_SESSION['uname'] = $uname;
            $this->success('登录成功','/Home/Index/index');
        } else {
            $this->error('登录失败，用户名或密码错误');
        }
        
    }

    public function register() {
        $this->display();
    }
    
    public function getregister() {
        
        $users = M('users');
        $data['uname'] = I('post.uname');
        $data['pwd'] = I('post.pwd');

        if(preg_match("/^[a-zA-Z][0-9a-zA-Z]{5,12}$/", $data['uname'])) {
            if(preg_match("/^[0-9a-zA-Z]{5,12}$/", $data['pwd'])) {
                if(!($users->where("uname ='%s'", $data['uname'])->select())) {

                    $userinfo = M('userinfo');
                    $data2['sex'] = I('post.sex');
                    $data2['realname'] = I('post.realname');
                    $data2['tel'] = I('tel');
                    $data2['email'] = I('email');
                    $data2['address'] = I('address');
                    $data2['postcode'] = I('postcode');
                    $data2['reg_time'] = time();     

                    $data2['uid'] = $users->add($data);

                    $count = $userinfo->add($data2);
                    $this->success('注册成功','login');
                } else {
                    $this->error('注册失败,用户名已存在');
                }
            } else {
                $this->error('注册失败,密码格式不正确');
            }
        } else {
            $this->error('注册失败,用户名格式不正确');
        }
    }

}