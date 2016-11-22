<?php
namespace Home\Controller;
use Think\Controller;
class IndexController extends Controller {
    public function index(){
        $Articles = M('article');
        //$data = $Articles->order('create_time')->page($_GET['page'].',20')->select(); //todo 分页
        $count = $Articles->where('status=1')->count();// 查询满足要求的总记录数
        $Page = new \Think\Page($count, 2);// 实例化分页类 传入总记录数和每页显示的记录数(2)
        $show = $Page->show();// 分页显示输出
        // 进行分页数据查询 注意limit方法的参数要使用Page类的属性   按文章加入时间倒序
        $list = $Articles->table('__ARTICLE__ as a')->field('a.id,a.uuid,a.title,a.content,u.nickname,u.face,c.name as category_name,c.id as category_id')->join('__USER__ as u ON a.user_id = u.id')->join('__CATEGORY__ as c ON a.category_id = c.id')->order('a.create_time desc')->limit($Page->firstRow . ',' . $Page->listRows)->select();

        /*$newList = array();
        foreach($list as $item){
            $item['uuid'] = md5($item['id'].'jason');    //文章详情UUID 又id+jason MD5
            array_push($newList,$item);
        }
        dump($newList);*/
        $categorys = \Home\Controller\ListController::cateList();
        //分类
        $this->assign('categorys',$categorys);
        $this->assign('list', $list);// 赋值数据集
        $this->assign('page', $show);// 赋值分页输出
        $this->display(); // 输出模板
    }
}