/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50614
Source Host           : localhost:3306
Source Database       : smjyzx_db

Target Server Type    : MYSQL
Target Server Version : 50614
File Encoding         : 65001

Date: 2015-02-04 15:13:19
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for articles
-- ----------------------------
DROP TABLE IF EXISTS `articles`;
CREATE TABLE `articles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category_id` int(11) NOT NULL DEFAULT '0',
  `name` varchar(255) NOT NULL,
  `refer` int(11) NOT NULL,
  `time` int(11) NOT NULL,
  `content` text NOT NULL,
  `pic` varchar(255) NOT NULL DEFAULT '',
  `show_in_index` tinyint(4) NOT NULL DEFAULT '0',
  `url` text,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of articles
-- ----------------------------

-- ----------------------------
-- Table structure for biao
-- ----------------------------
DROP TABLE IF EXISTS `biao`;
CREATE TABLE `biao` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `parent_id` int(11) NOT NULL,
  `number` varchar(32) NOT NULL,
  `name` varchar(255) NOT NULL,
  `category` int(11) NOT NULL,
  `start_time` int(11) NOT NULL,
  `location` int(11) NOT NULL,
  `time` int(11) NOT NULL,
  `content` text NOT NULL,
  `url` text,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of biao
-- ----------------------------

-- ----------------------------
-- Table structure for biao_category
-- ----------------------------
DROP TABLE IF EXISTS `biao_category`;
CREATE TABLE `biao_category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of biao_category
-- ----------------------------

-- ----------------------------
-- Table structure for biao_location
-- ----------------------------
DROP TABLE IF EXISTS `biao_location`;
CREATE TABLE `biao_location` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of biao_location
-- ----------------------------

-- ----------------------------
-- Table structure for category
-- ----------------------------
DROP TABLE IF EXISTS `category`;
CREATE TABLE `category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `parent_id` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=30 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of category
-- ----------------------------
INSERT INTO `category` VALUES ('1', '中心简介', '0');
INSERT INTO `category` VALUES ('2', '政策法规', '0');
INSERT INTO `category` VALUES ('29', '开标安排', '-1');
INSERT INTO `category` VALUES ('4', '服务指南', '0');
INSERT INTO `category` VALUES ('5', '滚动图片', '0');
INSERT INTO `category` VALUES ('6', '中心动态', '0');
INSERT INTO `category` VALUES ('7', '通知公告', '0');
INSERT INTO `category` VALUES ('8', '建设工程', '0');
INSERT INTO `category` VALUES ('9', '招标公告', '8');
INSERT INTO `category` VALUES ('10', '更正公告', '8');
INSERT INTO `category` VALUES ('11', '中标结果', '8');
INSERT INTO `category` VALUES ('12', '政府采购', '0');
INSERT INTO `category` VALUES ('14', '采购公告', '12');
INSERT INTO `category` VALUES ('15', '变更公告', '12');
INSERT INTO `category` VALUES ('16', '中标结果', '12');
INSERT INTO `category` VALUES ('17', '产权交易', '0');
INSERT INTO `category` VALUES ('18', '交易信息', '17');
INSERT INTO `category` VALUES ('19', '变更信息', '17');
INSERT INTO `category` VALUES ('20', '成交信息', '17');
INSERT INTO `category` VALUES ('21', '土地出让', '0');
INSERT INTO `category` VALUES ('22', '出让公告', '21');
INSERT INTO `category` VALUES ('23', '变更公告', '21');
INSERT INTO `category` VALUES ('24', '出让结果', '21');
INSERT INTO `category` VALUES ('25', '图片快讯', '0');
INSERT INTO `category` VALUES ('28', '场地预约', '-1');

-- ----------------------------
-- Table structure for digisky_admin
-- ----------------------------
DROP TABLE IF EXISTS `digisky_admin`;
CREATE TABLE `digisky_admin` (
  `admin_id` int(11) NOT NULL AUTO_INCREMENT,
  `admin_account` char(32) NOT NULL,
  `admin_pass` char(32) NOT NULL,
  `admin_init` tinyint(4) NOT NULL DEFAULT '0',
  `admin_starttime` int(11) NOT NULL,
  `admin_lastlogin` int(11) NOT NULL,
  PRIMARY KEY (`admin_id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of digisky_admin
-- ----------------------------
INSERT INTO `digisky_admin` VALUES ('1', 'admin', 'd93a5def7511da3d0f2d171d9c344e91', '1', '0', '1421917698');

-- ----------------------------
-- Table structure for download
-- ----------------------------
DROP TABLE IF EXISTS `download`;
CREATE TABLE `download` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `filepath` varchar(255) NOT NULL,
  `time` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of download
-- ----------------------------

-- ----------------------------
-- Table structure for links
-- ----------------------------
DROP TABLE IF EXISTS `links`;
CREATE TABLE `links` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `link` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of links
-- ----------------------------

-- ----------------------------
-- Table structure for refer
-- ----------------------------
DROP TABLE IF EXISTS `refer`;
CREATE TABLE `refer` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of refer
-- ----------------------------

-- ----------------------------
-- View structure for article_category
-- ----------------------------
DROP VIEW IF EXISTS `article_category`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER  VIEW `article_category` AS SELECT
articles.id,
articles.category_id,
articles.`name`,
articles.refer,
articles.time,
articles.content,
articles.pic,
category.`name` AS category_name,
articles.show_in_index,
articles.url,
refer.`name` AS refer_name
FROM
articles
INNER JOIN category ON articles.category_id = category.id
INNER JOIN refer ON articles.refer = refer.id ;

-- ----------------------------
-- View structure for biao_category_location
-- ----------------------------
DROP VIEW IF EXISTS `biao_category_location`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER  VIEW `biao_category_location` AS SELECT
biao.id,
biao.parent_id,
biao.number,
biao.`name`,
biao.category,
biao.start_time,
biao.location,
biao.time,
biao_category.`name` AS category_name,
biao_location.`name` AS location_name,
biao.content,
biao.url
FROM
biao
INNER JOIN biao_category ON biao.category = biao_category.id
INNER JOIN biao_location ON biao.location = biao_location.id ;
