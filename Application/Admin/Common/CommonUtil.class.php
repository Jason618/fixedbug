<?php

/**
 * Created by PhpStorm.
 * User: lichengjun
 * Date: 16/11/18
 * Time: 上午10:19
 */
class CommonUtil extends \Think\Controller
{
    public static function  upload($file){
        $upload = new \Think\Upload();// 实例化上传类
        $upload->maxSize = 3145728;// 设置附件上传大小
        $upload->exts = array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型
        $upload->rootPath = './Uploads/'; // 设置附件上传根目录
        $upload->savePath = ''; // 设置附件上传（子）目录
        // 上传文件
        $info = $upload->upload($file);
        if (!$info) {// 上传错误提示错误信息
            return ture;
        } else {// 上传成功
            return false;
        }
    }
}