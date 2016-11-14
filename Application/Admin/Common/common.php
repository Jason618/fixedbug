<?php
/**
 * Created by PhpStorm.
 * User: lichengjun
 * Date: 16/11/14
 * Time: 下午6:25
 */

//检查登录
function checkLogin() {
    if (!isset($_SESSION['user'])) {
        header('location:' . __URL__ . '/login');
        exit();
    }
}

?>