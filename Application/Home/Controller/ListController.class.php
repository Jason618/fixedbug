<?php
namespace Home\Controller;
use Think\Controller;
class ListController extends Controller {
    public function index(){
        $name = 'List page';
        $this->assign('name',$name);
        $this->display();
    }
}