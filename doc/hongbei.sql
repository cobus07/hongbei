/*
 Navicat Premium Data Transfer

 Source Server         : localhost
 Source Server Type    : MySQL
 Source Server Version : 50624
 Source Host           : localhost
 Source Database       : hongbei

 Target Server Type    : MySQL
 Target Server Version : 50624
 File Encoding         : utf-8

 Date: 11/24/2015 16:45:00 PM
*/

SET NAMES utf8;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
--  Table structure for `t_article`
-- ----------------------------
DROP TABLE IF EXISTS `t_article`;
CREATE TABLE `t_article` (
  `article_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `article_title` varchar(255) DEFAULT NULL,
  `article_content` text,
  `addtime` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `article_default` int(11) DEFAULT '0',
  `article_visit` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`article_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
--  Table structure for `t_article_comment`
-- ----------------------------
DROP TABLE IF EXISTS `t_article_comment`;
CREATE TABLE `t_article_comment` (
  `article_comment_id` int(11) NOT NULL AUTO_INCREMENT,
  `article_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `comment_content` text,
  `addtime` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`article_comment_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
--  Table structure for `t_article_like`
-- ----------------------------
DROP TABLE IF EXISTS `t_article_like`;
CREATE TABLE `t_article_like` (
  `like_id` int(11) NOT NULL AUTO_INCREMENT,
  `like_user_id` varchar(255) DEFAULT NULL,
  `like_time` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `article_id` int(11) NOT NULL,
  `ip` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`like_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
--  Table structure for `t_booking`
-- ----------------------------
DROP TABLE IF EXISTS `t_booking`;
CREATE TABLE `t_booking` (
  `booking_id` int(11) NOT NULL AUTO_INCREMENT,
  `baker_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `booking_date` date DEFAULT NULL COMMENT '上门日期',
  `booking_period` varchar(255) DEFAULT NULL COMMENT '预约时段',
  `create_time` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP COMMENT '创建时间',
  `booking_price` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`booking_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
--  Table structure for `t_cart`
-- ----------------------------
DROP TABLE IF EXISTS `t_cart`;
CREATE TABLE `t_cart` (
  `cart_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `cart_amount` int(11) DEFAULT NULL,
  `cart_price` decimal(8,2) DEFAULT NULL,
  `cart_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`cart_id`),
  KEY `FK_user_cart` (`user_id`),
  CONSTRAINT `t_cart_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `t_user` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
--  Table structure for `t_category`
-- ----------------------------
DROP TABLE IF EXISTS `t_category`;
CREATE TABLE `t_category` (
  `category_id` int(11) NOT NULL AUTO_INCREMENT,
  `category_name` varchar(255) DEFAULT NULL,
  `category_p_id` int(11) DEFAULT NULL,
  `baker_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`category_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
--  Table structure for `t_collect_baker`
-- ----------------------------
DROP TABLE IF EXISTS `t_collect_baker`;
CREATE TABLE `t_collect_baker` (
  `collect_id` int(11) NOT NULL DEFAULT '0',
  `user_id` int(11) DEFAULT NULL,
  `baker_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`collect_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
--  Table structure for `t_collect_product`
-- ----------------------------
DROP TABLE IF EXISTS `t_collect_product`;
CREATE TABLE `t_collect_product` (
  `collect_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`collect_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- ----------------------------
--  Table structure for `t_friend`
-- ----------------------------
DROP TABLE IF EXISTS `t_friend`;
CREATE TABLE `t_friend` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `friend_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
--  Table structure for `t_order`
-- ----------------------------
DROP TABLE IF EXISTS `t_order`;
CREATE TABLE `t_order` (
  `order_id` int(11) NOT NULL DEFAULT '0',
  `product_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `order_date` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `create_time` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `order_state` varchar(10) DEFAULT '0' COMMENT '订单状态：0等待付款，1:已付款(未收货)，2交易成功(确认收货)，3交易关闭',
  PRIMARY KEY (`order_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
--  Table structure for `t_order_item`
-- ----------------------------
DROP TABLE IF EXISTS `t_order_item`;
CREATE TABLE `t_order_item` (
  `item_id` int(1) NOT NULL AUTO_INCREMENT,
  `order_id` int(11) DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL,
  `price` float(8,2) DEFAULT NULL,
  `amount` int(11) DEFAULT NULL,
  `discount` float(3,2) DEFAULT NULL,
  PRIMARY KEY (`item_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
--  Table structure for `t_picture`
-- ----------------------------
DROP TABLE IF EXISTS `t_picture`;
CREATE TABLE `t_picture` (
  `picture_id` int(11) NOT NULL AUTO_INCREMENT,
  `picture` varchar(255) DEFAULT NULL,
  `picture_thumb` varchar(255) DEFAULT NULL,
  `addtime` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `introduce` text,
  `user_id` int(11) NOT NULL,
  `picture_default` int(11) DEFAULT '0',
  `picture_visit` int(11) NOT NULL DEFAULT '0',
  `product_id` int(255) NOT NULL,
  PRIMARY KEY (`picture_id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

-- ----------------------------
--  Table structure for `t_picture_comment`
-- ----------------------------
DROP TABLE IF EXISTS `t_picture_comment`;
CREATE TABLE `t_picture_comment` (
  `picture_comment_id` int(11) NOT NULL AUTO_INCREMENT,
  `picture_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `comment_content` text,
  `addtime` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`picture_comment_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

-- ----------------------------
--  Table structure for `t_picture_like`
-- ----------------------------
DROP TABLE IF EXISTS `t_picture_like`;
CREATE TABLE `t_picture_like` (
  `like_id` int(11) NOT NULL AUTO_INCREMENT,
  `like_user_id` varchar(255) DEFAULT NULL,
  `like_time` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `picture_id` int(11) NOT NULL,
  `ip` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`like_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
--  Table structure for `t_product`
-- ----------------------------
DROP TABLE IF EXISTS `t_product`;
CREATE TABLE `t_product` (
  `product_id` int(11) NOT NULL AUTO_INCREMENT,
  `product_name` varchar(50) DEFAULT NULL,
  `product_price` float(6,2) DEFAULT NULL,
  `product_introduce` varchar(255) DEFAULT NULL,
  `baker_id` int(11) unsigned zerofill DEFAULT NULL,
  `category_id` int(11) NOT NULL,
  `product_size` int(255) NOT NULL,
  `product_date` date DEFAULT NULL COMMENT '生产日期',
  `is_book` int(255) NOT NULL DEFAULT '1',
  `is_sell` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`product_id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

-- ----------------------------
--  Table structure for `t_product_category`
-- ----------------------------
DROP TABLE IF EXISTS `t_product_category`;
CREATE TABLE `t_product_category` (
  `product_category_id` int(11) NOT NULL AUTO_INCREMENT,
  `category_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  PRIMARY KEY (`product_category_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
--  Table structure for `t_product_comment`
-- ----------------------------
DROP TABLE IF EXISTS `t_product_comment`;
CREATE TABLE `t_product_comment` (
  `product_comment_id` int(11) NOT NULL AUTO_INCREMENT,
  `product_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `comment_content` text,
  `addtime` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `good_comment` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`product_comment_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
--  Table structure for `t_product_picture`
-- ----------------------------
DROP TABLE IF EXISTS `t_product_picture`;
CREATE TABLE `t_product_picture` (
  `product_picture_id` int(11) NOT NULL AUTO_INCREMENT,
  `picture` varchar(255) DEFAULT NULL,
  `picture_thumb` varchar(255) DEFAULT NULL,
  `introduce` text,
  `product_id` int(11) NOT NULL,
  `is_cover` varchar(1) DEFAULT '0' COMMENT '1表示做为封面',
  PRIMARY KEY (`product_picture_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
--  Table structure for `t_tag`
-- ----------------------------
DROP TABLE IF EXISTS `t_tag`;
CREATE TABLE `t_tag` (
  `tag_name` varchar(255) DEFAULT NULL,
  `tag_id` int(11) NOT NULL AUTO_INCREMENT,
  `category_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`tag_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
--  Table structure for `t_user`
-- ----------------------------
DROP TABLE IF EXISTS `t_user`;
CREATE TABLE `t_user` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `nickname` varchar(50) DEFAULT NULL,
  `realname` varchar(50) DEFAULT NULL,
  `idcard` varchar(50) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `tel` varchar(50) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `age` varchar(20) DEFAULT NULL,
  `province` varchar(20) DEFAULT NULL,
  `city` varchar(20) DEFAULT NULL,
  `sex` varchar(20) DEFAULT NULL,
  `birthday` date DEFAULT NULL,
  `user_pic_thumb` text,
  `is_baker` int(11) NOT NULL DEFAULT '0' COMMENT '0:普通用户，1:烘焙师',
  `baker_default` int(10) unsigned DEFAULT NULL,
  `level` int(50) DEFAULT '1',
  `visit` int(11) NOT NULL DEFAULT '0',
  `exp` varchar(50) NOT NULL DEFAULT '0',
  `points` varchar(50) NOT NULL DEFAULT '0',
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- ----------------------------
--  Table structure for `t_user_category`
-- ----------------------------
DROP TABLE IF EXISTS `t_user_category`;
CREATE TABLE `t_user_category` (
  `user_category_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`user_category_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
--  Table structure for `t_video`
-- ----------------------------
DROP TABLE IF EXISTS `t_video`;
CREATE TABLE `t_video` (
  `video_id` int(11) NOT NULL DEFAULT '0',
  `user_id` int(11) NOT NULL,
  `video_thumb` varchar(255) DEFAULT NULL,
  `video_url` varchar(255) DEFAULT NULL,
  `video_introduce` text,
  `addtime` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `video_default` int(11) DEFAULT '0',
  `video_visit` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`video_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
--  Table structure for `t_video_comment`
-- ----------------------------
DROP TABLE IF EXISTS `t_video_comment`;
CREATE TABLE `t_video_comment` (
  `video_comment_id` int(11) NOT NULL AUTO_INCREMENT,
  `video_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `comment_content` text,
  `addtime` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`video_comment_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
--  Table structure for `t_video_like`
-- ----------------------------
DROP TABLE IF EXISTS `t_video_like`;
CREATE TABLE `t_video_like` (
  `like_id` int(11) NOT NULL AUTO_INCREMENT,
  `like_user_id` varchar(255) DEFAULT NULL,
  `like_time` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `video_id` int(11) NOT NULL,
  `ip` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`like_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

SET FOREIGN_KEY_CHECKS = 1;
