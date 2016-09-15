<?php
namespace Home\Controller;
use Think\Controller;
class DetailController extends Controller {
    public function index(){
        $name = 'detail page';
        $this->assign('name',$name);
        $this->display();
    }
}