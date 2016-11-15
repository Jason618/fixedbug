/*
 Navicat MySQL Data Transfer

 Source Server         : localhost
 Source Server Version : 50713
 Source Host           : 127.0.0.1
 Source Database       : fixedbug

 Target Server Version : 50713
 File Encoding         : utf-8

 Date: 11/15/2016 19:21:49 PM
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
  `update_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT '更新时间',
  `title` varchar(255) NOT NULL COMMENT '文章标题',
  `content` text NOT NULL COMMENT '文章内容',
  `category_id` int(11) NOT NULL COMMENT '文章分类id',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
--  Records of `fb_article`
-- ----------------------------
BEGIN;
INSERT INTO `fb_article` VALUES ('3', '12', '2016-11-14 18:07:23', '2016-11-14 18:07:23', 'html', 'html', '1');
COMMIT;

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
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;

-- ----------------------------
--  Records of `fb_user`
-- ----------------------------
BEGIN;
INSERT INTO `fb_user` VALUES ('12', 'test', '20161114/58298c103750b.jpg', 'test', '2016-11-14 18:04:00', 'test', 'e10adc3949ba59abbe56'), ('13', 'TEST', '20161114/5829921f40b67.jpg', '131241', '2016-11-14 18:29:51', 'ROOT', '73acd9a5972130b75066');
COMMIT;

SET FOREIGN_KEY_CHECKS = 1;
