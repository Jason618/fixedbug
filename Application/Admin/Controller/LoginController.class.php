<?php
/**
 * Created by PhpStorm.
 * User: lichengjun
 * Date: 16/11/14
 * Time: 下午7:04
 */

namespace Admin\Controller;


use Think\Controller;

class LoginController extends Controller
{
    public static function isLogin()
    {
        if(!isset($_SESSION['user'])){
            header('location:/index.php/Admin/Login/index');
            exit;
        }
    }

    public function index(){
        $this->display();
    }
}