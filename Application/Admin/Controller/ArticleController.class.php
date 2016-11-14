<?php
/**
 * Created by PhpStorm.
 * User: lichengjun
 * Date: 16/11/14
 * Time: 下午4:39
 */

namespace Admin\Controller;

use Think\Controller;

class Article extends Controller
{
    public function index()
    {
//        $Articles = M('article');
//        //$data = $Articles->order('create_time')->page($_GET['page'].',20')->select(); //todo 分页
//        $data = $Articles->select();
//        $this->assign('articles', $data);
        $this->display();
    }
    // 新增文章
    public function add(){
        $title= $_POST['title'];
        $content = $_POST['content'];
        $author = $_POST['user'];
    }
}