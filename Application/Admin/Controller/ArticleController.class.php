<?php
/**
 * Created by PhpStorm.
 * User: lichengjun
 * Date: 16/11/14
 * Time: 下午4:39
 */

namespace Admin\Controller;

use Think\Controller;

class ArticleController extends Controller
{
    public function _initialize() {
        checklogin();
    }
    public function index()
    {
        $Articles = M('article');
        //$data = $Articles->order('create_time')->page($_GET['page'].',20')->select(); //todo 分页
        $data = $Articles->select();   //关联查询
        $this->assign('articles', $data);
        $this->display();
    }
    // 新增文章
    public function add(){
        $userId = $_SESSION['loginId'] ? $_SESSION['loginId'] : '12'; //如果没有登陆用户 默认为test
        $title= $_POST['title'];
        $content = $_POST['content'];
        $categoryId = $_POST['category'];

        //非空验证
        if($title == null){
            $this->error('$title 为空');
        }
        if($content == null){
            $this->error('$content 为空');
        }

        $Article = M('article');

        $data['user_id'] = $userId;
        $data['title'] = $title;
        $data['content'] = $content;
        $data['category_id'] = $categoryId;

        $Article->add($data);
        $this->success('新增成功', 'index');  //页面跳转

    }
}