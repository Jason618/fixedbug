<?php
return array(
	//'配置项'=>'配置值'
    //URL模式
//    'URL_MODEL'          => '2'
    //路由配置
    'URL_ROUTER_ON'   => true,
    'URL_ROUTE_RULES'=>array(
        'j/:uuid' => 'Home/Detail/index?uuid=:1',   //首页文章列表到文章详情
        'c/:cid' => 'Home/List/index?cid=:1'   //分类列表页
    )

);