<?php

//判断用户是否登录
function is_login() {
    return session('uname');
}

function is_admin_login() {
    return session('admin_name');
}

//生成6个随机数
function getrandom($max) {
    $numbers = range (1,$max); 
    //shuffle 将数组顺序随即打乱 
    shuffle ($numbers); 
    //array_slice 取该数组中的某一段 
    $num=6; 
    $result = array_slice($numbers,0,$num); 

    return $result;
}

//验证验证码
function check_verify($code, $id = ""){ 
    $verify = new \Think\Verify(); 
    return $verify->check($code, $id); 
} 
?>