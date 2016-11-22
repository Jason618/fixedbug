<?php
namespace Home\Controller;
use Think\Controller;
class DetailController extends Controller {
    public function index(){
        $Articles = M('article');
        $uuid = $_GET['uuid'];
        $data =$Articles->table('__ARTICLE__ as a')->field('a.id,a.uuid,a.title,a.content,u.nickname,u.face,c.name as category_name,c.id as category_id')->join('__USER__ as u ON a.user_id = u.id')->join('__CATEGORY__ as c ON a.category_id = c.id')->where('a.uuid="'.$uuid.'"')->find();

        $categorys = \Home\Controller\ListController::cateList();
        //分类
        $this->assign('categorys',$categorys);

        $this->assign('article',$data);
        $this->display(); // 输出模板
    }
}