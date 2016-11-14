<?php
namespace Admin\Controller;

use Think\Controller;
use Admin\Controller\LoginController;

class IndexController extends Controller
{
    public function _initialize()
    {
        \Admin\Controller\LoginController::isLogin();
    }

    public function index()
    {
        $this->display();
    }

    public function login()
    {
        $this->display();
    }
}