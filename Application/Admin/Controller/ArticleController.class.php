<?php
/**
 * Created by PhpStorm.
 * User: lichengjun
 * Date: 16/11/14
 * Time: 下午4:39
 */

namespace Admin\Controller;

use Think\Controller;
use Admin\Controller\LoginController;

class ArticleController extends Controller
{
    public function _initialize()
    {
        \Admin\Controller\LoginController::isLogin();
    }

    public function index()
    {
        $Articles = M('article');
        //$data = $Articles->order('create_time')->page($_GET['page'].',20')->select(); //todo 分页
        $count = $Articles->where('status=1')->count();// 查询满足要求的总记录数
        $Page = new \Think\Page($count, 2);// 实例化分页类 传入总记录数和每页显示的记录数(2)
        $show = $Page->show();// 分页显示输出
        // 进行分页数据查询 注意limit方法的参数要使用Page类的属性   按文章加入时间倒序
        $list = $Articles->table('__ARTICLE__ as a')->field('a.id,a.title,a.content,u.nickname,u.face,c.name as category_name')->join('__USER__ as u ON a.user_id = u.id')->join('__CATEGORY__ as c ON a.category_id = c.id')->order('a.create_time desc')->limit($Page->firstRow . ',' . $Page->listRows)->select();
        $this->assign('list', $list);// 赋值数据集
        $this->assign('page', $show);// 赋值分页输出
        $this->display(); // 输出模板
    }

    // 新增文章
    public function add()
    {
        $userId = $_SESSION['loginId'] ? $_SESSION['loginId'] : '1'; //如果没有登陆用户 默认为test
        $title = $_POST['title'];
        $content = $_POST['content'];
        $categoryId = $_POST['category'];

        //非空验证
        if ($title == null) {
            $this->error('$title 为空');
        }
        if ($content == null) {
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