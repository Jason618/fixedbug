/*
 Navicat MySQL Data Transfer

 Source Server         : localhost
 Source Server Version : 50713
 Source Host           : 127.0.0.1
 Source Database       : fixedbug

 Target Server Version : 50713
 File Encoding         : utf-8

 Date: 11/22/2016 14:30:29 PM
*/

SET NAMES utf8;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
--  Table structure for `fb_article`
-- ----------------------------
DROP TABLE IF EXISTS `fb_article`;
CREATE TABLE `fb_article` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL COMMENT '作者id',
  `create_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT '创建时间',
  `title` varchar(255) NOT NULL COMMENT '文章标题',
  `content` text NOT NULL COMMENT '文章内容',
  `category_id` int(11) NOT NULL COMMENT '文章分类id',
  `status` int(2) NOT NULL DEFAULT '1' COMMENT '1上线状态 其他表示下线',
  `uuid` varchar(25) NOT NULL COMMENT '根据时间戳md5后前20位 用于查找文章详情  不实用ID字段',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

-- ----------------------------
--  Table structure for `fb_category`
-- ----------------------------
DROP TABLE IF EXISTS `fb_category`;
CREATE TABLE `fb_category` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL COMMENT '分类名称',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
--  Records of `fb_category`
-- ----------------------------
BEGIN;
INSERT INTO `fb_category` VALUES ('1', 'HTML'), ('2', 'Javascript'), ('3', 'CSS');
COMMIT;

-- ----------------------------
--  Table structure for `fb_user`
-- ----------------------------
DROP TABLE IF EXISTS `fb_user`;
CREATE TABLE `fb_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nickname` varchar(50) NOT NULL COMMENT '用户昵称',
  `face` varchar(200) DEFAULT NULL COMMENT '头像图片地址',
  `wechat_id` varchar(100) DEFAULT NULL,
  `create_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT '创建用户时间',
  `username` char(50) NOT NULL DEFAULT '' COMMENT '用于登陆编辑后台',
  `password` char(50) NOT NULL COMMENT '登陆密码',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8;

-- ----------------------------
--  Records of `fb_user`
-- ----------------------------
BEGIN;
INSERT INTO `fb_user` VALUES ('15', 'test', '20161116/582c2d056cb2e.png', 'te', '2016-11-16 17:55:17', 'test', '949ba59abb'), ('16', 'tes', '20161118/582e80bde55a2.png', 'tat', '2016-11-18 12:17:23', '123', '949ba59abb');
COMMIT;

SET FOREIGN_KEY_CHECKS = 1;
