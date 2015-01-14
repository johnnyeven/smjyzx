/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50614
Source Host           : localhost:3306
Source Database       : smjyzx_db

Target Server Type    : MYSQL
Target Server Version : 50614
File Encoding         : 65001

Date: 2015-01-14 14:40:30
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
  `refer` varchar(255) NOT NULL,
  `time` int(11) NOT NULL,
  `content` text NOT NULL,
  `pic` varchar(255) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of articles
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
) ENGINE=MyISAM AUTO_INCREMENT=28 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of category
-- ----------------------------
INSERT INTO `category` VALUES ('1', '中心简介', '0');
INSERT INTO `category` VALUES ('2', '政策法规', '0');
INSERT INTO `category` VALUES ('3', '交易场地预约', '0');
INSERT INTO `category` VALUES ('4', '服务指南', '0');
INSERT INTO `category` VALUES ('5', '滚动图片', '0');
INSERT INTO `category` VALUES ('6', '中心动态', '0');
INSERT INTO `category` VALUES ('7', '通知公告', '0');
INSERT INTO `category` VALUES ('8', '建设工程', '0');
INSERT INTO `category` VALUES ('9', '招标公告', '8');
INSERT INTO `category` VALUES ('10', '更正公告', '8');
INSERT INTO `category` VALUES ('11', '中标结果', '8');
INSERT INTO `category` VALUES ('12', '政府采购', '0');
INSERT INTO `category` VALUES ('13', '采购预公告', '12');
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
INSERT INTO `category` VALUES ('26', '开标安排', '0');
INSERT INTO `category` VALUES ('27', '横幅', '0');

-- ----------------------------
-- Table structure for download
-- ----------------------------
DROP TABLE IF EXISTS `download`;
CREATE TABLE `download` (
  `id` int(11) NOT NULL,
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
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `link` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of links
-- ----------------------------
