<?php
namespace Home\Controller;
use Think\Controller;
class AuthController extends Controller {

    //登录页面
    public function login() {
        $this->display();
    }
    //用户登录
    public function getlogin() {
        $uname = I('post.uname');
        $pwd = md5(I('post.pwd'));
        $users = M('users');

        if($users->where(['uname' => $uname, 'pwd' => $pwd])->select()) {
            $_SESSION['uname'] = $uname;
            $this->success('登录成功','/Home/Index/index');
        } else {
            $this->error('登录失败，用户名或密码错误');
        }
        
    }

    //注册页面
    public function register() {
        $this->display();
    }
    
    //用户注册
    public function getregister() {
        
        $users = M('users');
        $data['uname'] = I('post.uname');
        $data['pwd'] = md5(I('post.pwd'));
        if(preg_match("/^[a-zA-Z][0-9a-zA-Z]{5,12}$/", $data['uname'])) {
            if(preg_match("/^[0-9a-zA-Z]{5,12}$/", I('post.pwd'))) {
                if(!($users->where("uname ='%s'", $data['uname'])->select())) {

                    $userinfo = M('userinfo');
                    $data2['sex'] = I('post.sex');
                    $data2['realname'] = I('post.realname');
                    $data2['tel'] = I('tel');
                    $data2['email'] = I('email');
                    $data2['address'] = I('address');
                    $data2['postcode'] = I('postcode');
                    $data2['reg_time'] = time();

                    $data['secret'] = I('Secret');
                    $data['answer'] = I('Answer');

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

    //找回密码页面
    public function retrieve() {
        $this->display();
    }

    //验证码
    public function verify_c() {    
        $Verify = new \Think\Verify();  
        $Verify->fontSize = 18;  
        $Verify->length   = 4;  
        $Verify->useNoise = false;  
        $Verify->codeSet = '0123456789';  
        $Verify->imageW = 130;  
        $Verify->imageH = 50;  
        //$Verify->expire = 600;  
        $Verify->entry();   
    }

    //修改密码
    public function change_password() {
        $data['uname'] = I('uname');
        $data['pwd'] = md5(I('password'));
        $data['secret'] = I('secret');
        $data['answer'] = I('answer');
        $verify = I('verify');
        $Users = M('users');
        $map['secret'] = $data['secret'];
        $map['answer'] = $data['answer'];

        if(check_verify($verify)) {
            $count1 = $Users->where(['uname' => $data['uname']])->count();
            if($count1 == 1) {
                $count2 = $Users->where($map)->count();
                if($count2 == 1) {
                    $count = $Users->where(['uname' => $data['uname']])->save($data);
                    $this->ajaxReturn($count);
                } else {
                    $this->ajaxReturn(-3);
                }
            } else {
                $this->ajaxReturn(-2);
            }
        } else {
            $this->ajaxReturn(-1);
        }
    }

    //退出
    public function logout() {
        session(null);
        $this->success('退出成功等待重新登录','../Auth/login');
    }
}