<?php
/**
 * Created by PhpStorm.
 * User: lichengjun
 * Date: 16/11/14
 * Time: 下午1:23
 */

namespace Admin\Controller;
use Think\Controller;
use Admin\Controller\LoginController;

class UserController extends Controller
{
    public function _initialize()
    {
        \Admin\Controller\LoginController::isLogin();
    }
    public function index(){
        //显示所有的用户users
        $User = M("User");
        $data = $User->order('create_time')->select(); //  查找所有
        $this->assign('users',$data);
        $this->display();
    }

    public function update(){
        $userId = $_GET['id'];
        $User = M('User');
        $data = $User->where('id='.$userId)->find(); //  查找user
        dump($data);
        $this->assign('user',$data);
        $this->assign('test','show me ');
        $this->display();
    }

    public  function add(){
        $this->display();
    }
    //新增用户
    public  function addUser(){
        //TODO  新增是判断用户名或者微信号是否已经加入
        //TODO 特殊字符过滤 等
        //文件上传配置
        $config = array(
            'maxSize'    =>    3145728,
            'rootPath'   =>    './Uploads/',
            'savePath'   =>    '',
            'saveName'   =>    array('uniqid',''),
            'exts'       =>    array('jpg', 'gif', 'png', 'jpeg'),
            'autoSub'    =>    true,
            'subName'    =>    array('date','Ymd')
        );
        // 实例化上传类
        $upload = new \Think\Upload($config);
        $nickname = $_POST['nickname'];
        $username = $_POST['username'];
        $pass = $_POST['password'];

        //验证nickname
        if($nickname == null){
            $this->error('nickname 为空');
            exit;
        }

        //验证$username
        if($username == null){
            $this->error('$username 为空');
            exit;
        }
        //验证$pass
        if($pass == null){
            $this->error('password 为空');
            exit;
        }

        $face = $_POST['face'];
        $wechatId = $_POST['wechatiId'];

        //验证wechat_name  if have

        //头像文件上传
        $faceFile  =$_FILES['face'];
        $info = $upload->uploadOne($faceFile);
        if(!$info) {// 上传错误提示错误信息
            $this->error($upload->getError());
        }else{// 上传成功 获取上传文件信息
            //echo $info['savepath'].$info['savename'];
            $data['nickname'] = $nickname;
            $data['face'] = $info['savepath'].$info['savename'];
            $data['wechat_id'] = $wechatId;
            $data['username'] = $username;
            $data['password'] = substr(md5($pass),7,10);  //密码加密存储

            //实例化User
            $User = M("User");
            //存入数据库
            $User->add($data);

            $this->success('新增成功', 'index');  //页面跳转
            //重定向
            //redirect('/New/category/cate_id/2', 5, '页面跳转中...')

        }

    }

    //根据ID删除用户
    public function deleteUser(){
        $id = $_POST['id'];
        $User = M("User"); // 实例化User对象
        $User->where('id='.$id)->delete(); // 删除id为..的用户数据
        $return['status'] = '200'; //操作成功

        if(!$User){
            $return['status'] = '400';  //操作失败
        }
        $this->ajaxReturn($return);
    }

    //更新用户信息
    public function updateUser(){
        //TODO  新增是判断用户名或者微信号是否已经加入
        //TODO 特殊字符过滤 等
        //文件上传配置
        $config = array(
            'maxSize'    =>    3145728,
            'rootPath'   =>    './Uploads/',
            'savePath'   =>    '',
            'saveName'   =>    array('uniqid',''),
            'exts'       =>    array('jpg', 'gif', 'png', 'jpeg'),
            'autoSub'    =>    true,
            'subName'    =>    array('date','Ymd')
        );
        //
        $upload = new \Think\Upload($config); //实例化上传类
        $nickname = $_POST['nickname'];
        $username = $_POST['username'];
        $pass = $_POST['password'];
        $id = $_POST['id'];

        //验证nickname
        if($nickname == null){
            $this->error('nickname 为空');
            exit;
        }

        //验证$username
        if($username == null){
            $this->error('$username 为空');
            exit;
        }
        //验证$pass
        if($pass == null){
            $this->error('password 为空');
            exit;
        }

        $face = $_POST['face'];
        $wechatId = $_POST['wechatiId'];

        //验证wechat_name  if have

        //头像文件上传
        $faceFile  =$_FILES['face'];
        $info = $upload->uploadOne($faceFile);
        if(!$info) {// 上传错误提示错误信息
            $this->error($upload->getError());
        }else{// 上传成功 获取上传文件信息
            //echo $info['savepath'].$info['savename'];
            $data['nickname'] = $nickname;
            $data['face'] = $info['savepath'].$info['savename'];
            $data['wechat_id'] = $wechatId;
            $data['username'] = $username;
            $data['password'] = substr(md5($pass),7,10);  //密码加密存储

            //实例化User
            $User = M("User");
            //存入数据库
            $User->where('id='.$id)->save($data);

            $this->success('更新成功', 'index');  //页面跳转
            //重定向
            //redirect('/New/category/cate_id/2', 5, '页面跳转中...')

        }
    }
}