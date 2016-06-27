<?php
namespace Home\Controller;
use Think\Controller;
class BaseController extends Controller {
    function _initialize() {
        //使用Common下的公共方法
        if(!is_login()) {
            redirect('/Home/Auth/login?callback='.urlencode($_SERVER["REQUEST_URI"]));
        } else {

        }
    }
}