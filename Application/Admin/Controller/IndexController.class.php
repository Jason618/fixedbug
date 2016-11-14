<?php
namespace Admin\Controller;
use Think\Controller;
class IndexController extends Controller {
    public  function _initialize(){
        checkLogin();
    }
    public function index(){
        $this->display();
    }
}