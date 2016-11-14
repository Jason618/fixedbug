<?php

/**
 * Created by PhpStorm.
 * User: lichengjun
 * Date: 16/11/14
 * Time: 上午10:57
 */
namespace Home\Model;

use Think\Model;

class UserModel extends Model{
    protected $fields = array('nickname', 'face','wechat_id');
}