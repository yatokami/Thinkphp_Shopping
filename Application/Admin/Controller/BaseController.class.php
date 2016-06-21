<?php
namespace Admin\Controller;
use Think\Controller;
class BaseController extends Controller {
    function _initialize() {
        if(!is_admin_login()) {
            redirect('/admin/Auth/login?callback='.urlencode($_SERVER["REQUEST_URI"]));
        } else {

        }
    }
}