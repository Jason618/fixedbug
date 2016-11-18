<?php
/**
 * Created by PhpStorm.
 * User: lichengjun
 * Date: 16/11/18
 * Time: 下午12:05
 * @info  该文件所有方法为全局通用方法  命名规则commmon + methodName
 */
/*
 * @desc  文件上传公共方法
 * @desc 保存路径 根目录Uploads     文件夹名称年月日   文件名称唯一文件名
 * */
function commonUpload($file){
    $config = array(
        'maxSize'    =>    3145728,
        'rootPath'   =>    './Uploads/',
        'savePath'   =>    '',
        'saveName'   =>    array('uniqid',''),
        'exts'       =>    array('jpg', 'gif', 'png', 'jpeg'),
        'autoSub'    =>    true,
        'subName'    =>    array('date','Ymd')
    );
    $upload = new \Think\Upload($config);// 实例化上传类

    // 上传文件
    $info = $upload->uploadOne($file);
    return $info;
}