<?php
return array(
	//'配置项'=>'配置值'
    //路由配置
    'URL_ROUTER_ON'   => true,
    'URL_ROUTE_RULES'=>array(
        'Article/j/:uuid' => 'Article/detail',  //文章详情
        'Article/update/:uuid' => 'Article/update',  //文章详情
        'User/update/:id' => 'User/update' //用户信息详情
    ),
    'LOAD_EXT_FILE'=>'Admin'

);