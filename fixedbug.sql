/*
 Navicat MySQL Data Transfer

 Source Server         : localhost
 Source Server Version : 50713
 Source Host           : 127.0.0.1
 Source Database       : fixedbug

 Target Server Version : 50713
 File Encoding         : utf-8

 Date: 11/01/2016 18:08:05 PM
*/

SET NAMES utf8;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
--  Table structure for `fb_article`
-- ----------------------------
DROP TABLE IF EXISTS `fb_article`;
CREATE TABLE `fb_article` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL COMMENT '作者id',
  `create_time` time NOT NULL COMMENT '创建时间',
  `update_time` time NOT NULL COMMENT '更新时间',
  `title` varchar(255) NOT NULL COMMENT '文章标题',
  `content` text NOT NULL COMMENT '文章内容',
  `category_id` int(11) NOT NULL COMMENT '文章分类id',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
--  Table structure for `fb_user`
-- ----------------------------
DROP TABLE IF EXISTS `fb_user`;
CREATE TABLE `fb_user` (
  `id` int(11) NOT NULL,
  `nickname` varchar(50) NOT NULL COMMENT '用户昵称',
  `face` varchar(200) DEFAULT NULL COMMENT '头像图片地址',
  `wechat_id` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

SET FOREIGN_KEY_CHECKS = 1;
