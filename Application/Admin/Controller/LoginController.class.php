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
        session('surl',$_SERVER['REQUEST_URI']);
        if(!isset($_SESSION['user'])){
            header('location:/index.php/Admin/Login/index');
            exit;
        }
    }

    public function index(){
        $this->display();
    }

    public function login(){
        $username = $_POST['username'];
        $password = $_POST['password'];
        //TODO  所有输入都应该防SQL注入  特殊字符过滤
        $md5Pass = substr(md5($password),7,10);
        $User = M('user');
        $data = $User->where('username="'.$username.'" AND password="'.$md5Pass.'"')->find();
        if($data){
            //设置session
            session('user',$data['username']); //设置username 为session标示
            $surl = session('surl');
            //$this->redirect($surl);  //redirect函数调用啦U函数生成新的URL   错误  原因还不知道
            header('location:'.$surl);
        }
    }
}