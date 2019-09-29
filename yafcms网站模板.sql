/*
Navicat MySQL Data Transfer

Source Server         : 139.129.91.150
Source Server Version : 50562
Source Host           : 139.129.91.150:3306
Source Database       : hszt

Target Server Type    : MYSQL
Target Server Version : 50562
File Encoding         : 65001

Date: 2019-09-29 18:47:59
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `hszt_admin`
-- ----------------------------
DROP TABLE IF EXISTS `hszt_admin`;
CREATE TABLE `hszt_admin` (
  `adminid` int(11) NOT NULL AUTO_INCREMENT,
  `adminname` varchar(255) NOT NULL DEFAULT '',
  `adminpass` varchar(255) NOT NULL DEFAULT '',
  `domainid` int(11) NOT NULL DEFAULT '0',
  `role_id` int(11) DEFAULT '0',
  PRIMARY KEY (`adminid`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COMMENT='系统管理员表';

-- ----------------------------
-- Records of hszt_admin
-- ----------------------------
INSERT INTO `hszt_admin` VALUES ('2', 'admin', '96E79218965EB72C92A549DD5A330112', '9000', '1');

-- ----------------------------
-- Table structure for `hszt_admin_role`
-- ----------------------------
DROP TABLE IF EXISTS `hszt_admin_role`;
CREATE TABLE `hszt_admin_role` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `is_all` int(1) DEFAULT '0',
  `roleinfo` text COMMENT '权限',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COMMENT='管理员角色表';

-- ----------------------------
-- Records of hszt_admin_role
-- ----------------------------
INSERT INTO `hszt_admin_role` VALUES ('1', '超级管理员', '1', 'a:18:{s:8:\"Userinfo\";a:6:{i:0;s:5:\"index\";i:1;s:7:\"tabPage\";i:2;s:3:\"add\";i:3;s:7:\"getById\";i:4;s:10:\"updateById\";i:5;s:6:\"delete\";}s:8:\"Roleinfo\";a:7:{i:0;s:5:\"index\";i:1;s:7:\"tabPage\";i:2;s:3:\"add\";i:3;s:7:\"getById\";i:4;s:11:\"checkedrole\";i:5;s:10:\"updateById\";i:6;s:6:\"delete\";}s:11:\"Actionadmin\";a:6:{i:0;s:5:\"index\";i:1;s:7:\"tabPage\";i:2;s:3:\"add\";i:3;s:7:\"getById\";i:4;s:10:\"updateById\";i:5;s:6:\"delete\";}s:9:\"Systemset\";a:7:{i:0;s:5:\"index\";i:1;s:7:\"tabPage\";i:2;s:3:\"add\";i:3;s:7:\"getById\";i:4;s:10:\"updateById\";i:5;s:6:\"delete\";i:6;s:6:\"upload\";}s:7:\"Homeimg\";a:4:{i:0;s:5:\"index\";i:1;s:7:\"addhtml\";i:2;s:6:\"delete\";i:3;s:6:\"upload\";}s:4:\"Link\";a:4:{i:0;s:5:\"index\";i:1;s:7:\"addhtml\";i:2;s:6:\"delete\";i:3;s:6:\"upload\";}s:4:\"Info\";a:8:{i:0;s:5:\"index\";i:1;s:7:\"tabPage\";i:2;s:3:\"add\";i:3;s:7:\"getById\";i:4;s:10:\"updateById\";i:5;s:6:\"delete\";i:6;s:9:\"uploadimg\";i:7;s:6:\"upload\";}s:5:\"Media\";a:8:{i:0;s:5:\"index\";i:1;s:7:\"tabPage\";i:2;s:3:\"add\";i:3;s:7:\"getById\";i:4;s:10:\"updateById\";i:5;s:6:\"delete\";i:6;s:9:\"uploadimg\";i:7;s:6:\"upload\";}s:4:\"Case\";a:8:{i:0;s:5:\"index\";i:1;s:7:\"tabPage\";i:2;s:3:\"add\";i:3;s:7:\"getById\";i:4;s:10:\"updateById\";i:5;s:6:\"delete\";i:6;s:9:\"uploadimg\";i:7;s:6:\"upload\";}s:4:\"News\";a:7:{i:0;s:5:\"index\";i:1;s:7:\"tabPage\";i:2;s:3:\"add\";i:3;s:7:\"getById\";i:4;s:10:\"updateById\";i:5;s:6:\"delete\";i:6;s:6:\"upload\";}s:7:\"Newgroy\";a:8:{i:0;s:5:\"index\";i:1;s:7:\"tabPage\";i:2;s:3:\"add\";i:3;s:7:\"getById\";i:4;s:10:\"updateById\";i:5;s:6:\"delete\";i:6;s:9:\"uploadimg\";i:7;s:6:\"upload\";}s:7:\"Newlist\";a:8:{i:0;s:5:\"index\";i:1;s:7:\"tabPage\";i:2;s:3:\"add\";i:3;s:7:\"getById\";i:4;s:10:\"updateById\";i:5;s:6:\"delete\";i:6;s:9:\"uploadimg\";i:7;s:6:\"upload\";}s:7:\"Contact\";a:7:{i:0;s:5:\"index\";i:1;s:7:\"tabPage\";i:2;s:3:\"add\";i:3;s:7:\"getById\";i:4;s:10:\"updateById\";i:5;s:6:\"delete\";i:6;s:6:\"upload\";}s:9:\"Categrouy\";a:8:{i:0;s:5:\"index\";i:1;s:7:\"tabPage\";i:2;s:3:\"add\";i:3;s:7:\"getById\";i:4;s:10:\"updateById\";i:5;s:6:\"delete\";i:6;s:9:\"uploadimg\";i:7;s:6:\"upload\";}s:8:\"Caselist\";a:8:{i:0;s:5:\"index\";i:1;s:7:\"tabPage\";i:2;s:3:\"add\";i:3;s:7:\"getById\";i:4;s:10:\"updateById\";i:5;s:6:\"delete\";i:6;s:9:\"uploadimg\";i:7;s:6:\"upload\";}s:10:\"Technology\";a:8:{i:0;s:5:\"index\";i:1;s:7:\"tabPage\";i:2;s:3:\"add\";i:3;s:7:\"getById\";i:4;s:10:\"updateById\";i:5;s:6:\"delete\";i:6;s:9:\"uploadimg\";i:7;s:6:\"upload\";}s:7:\"Project\";a:8:{i:0;s:5:\"index\";i:1;s:7:\"tabPage\";i:2;s:3:\"add\";i:3;s:7:\"getById\";i:4;s:10:\"updateById\";i:5;s:6:\"delete\";i:6;s:9:\"uploadimg\";i:7;s:6:\"upload\";}s:4:\"Auth\";a:8:{i:0;s:5:\"index\";i:1;s:7:\"tabPage\";i:2;s:3:\"add\";i:3;s:7:\"getById\";i:4;s:10:\"updateById\";i:5;s:6:\"delete\";i:6;s:9:\"uploadimg\";i:7;s:6:\"upload\";}}');
INSERT INTO `hszt_admin_role` VALUES ('2', '管理员', '1', 'a:35:{s:9:\"Mechanism\";a:5:{i:0;s:5:\"index\";i:1;s:7:\"tabPage\";i:2;s:3:\"add\";i:3;s:7:\"getById\";i:4;s:10:\"updateById\";}s:6:\"Export\";a:3:{i:0;s:5:\"index\";i:1;s:3:\"add\";i:2;s:7:\"getById\";}s:9:\"Workgroup\";a:10:{i:0;s:5:\"index\";i:1;s:7:\"tabPage\";i:2;s:3:\"add\";i:3;s:7:\"getById\";i:4;s:10:\"updateById\";i:6;s:5:\"index\";i:7;s:7:\"tabPage\";i:8;s:3:\"add\";i:9;s:7:\"getById\";i:10;s:10:\"updateById\";}s:7:\"Company\";a:6:{i:0;s:5:\"index\";i:1;s:7:\"tabPage\";i:2;s:3:\"add\";i:3;s:7:\"getById\";i:4;s:10:\"updateById\";i:6;s:6:\"upload\";}s:7:\"Imusers\";a:5:{i:0;s:5:\"index\";i:1;s:7:\"tabPage\";i:2;s:3:\"add\";i:3;s:7:\"getById\";i:4;s:10:\"updateById\";}s:8:\"Imfriend\";a:6:{i:0;s:5:\"index\";i:1;s:7:\"tabPage\";i:2;s:3:\"add\";i:3;s:7:\"getById\";i:4;s:8:\"finduser\";i:6;s:6:\"delete\";}s:6:\"Imchat\";a:6:{i:0;s:5:\"index\";i:1;s:7:\"tabPage\";i:2;s:3:\"add\";i:3;s:7:\"getById\";i:4;s:10:\"updateById\";i:6;s:6:\"upload\";}s:7:\"Meeting\";a:5:{i:0;s:5:\"index\";i:1;s:7:\"tabPage\";i:2;s:3:\"add\";i:3;s:7:\"getById\";i:4;s:10:\"updateById\";}s:5:\"Imvip\";a:5:{i:0;s:5:\"index\";i:1;s:7:\"tabPage\";i:2;s:3:\"add\";i:3;s:7:\"getById\";i:4;s:10:\"updateById\";}s:10:\"Memberinfo\";a:4:{i:0;s:5:\"index\";i:1;s:7:\"tabPage\";i:2;s:7:\"getById\";i:3;s:6:\"export\";}s:7:\"Patient\";a:4:{i:0;s:5:\"index\";i:1;s:7:\"tabPage\";i:2;s:7:\"getById\";i:3;s:6:\"export\";}s:6:\"Doctor\";a:4:{i:0;s:5:\"index\";i:1;s:7:\"tabPage\";i:2;s:7:\"getById\";i:3;s:6:\"export\";}s:8:\"Dpatient\";a:4:{i:0;s:5:\"index\";i:1;s:7:\"tabPage\";i:2;s:7:\"getById\";i:3;s:6:\"export\";}s:8:\"Systemip\";a:3:{i:0;s:5:\"index\";i:1;s:7:\"tabPage\";i:2;s:7:\"getById\";}s:9:\"Systemmsg\";a:4:{i:0;s:5:\"index\";i:1;s:7:\"tabPage\";i:2;s:6:\"export\";i:3;s:7:\"getById\";}s:6:\"Notice\";a:6:{i:0;s:5:\"index\";i:1;s:7:\"tabPage\";i:2;s:3:\"add\";i:3;s:7:\"getById\";i:4;s:10:\"updateById\";i:6;s:9:\"uploadimg\";}s:8:\"Ondemand\";a:5:{i:0;s:5:\"index\";i:1;s:7:\"tabPage\";i:2;s:3:\"add\";i:3;s:7:\"getById\";i:4;s:10:\"updateById\";}s:13:\"Livebroadcast\";a:5:{i:0;s:5:\"index\";i:1;s:7:\"tabPage\";i:2;s:3:\"add\";i:3;s:7:\"getById\";i:4;s:10:\"updateById\";}s:9:\"Systemset\";a:10:{i:0;s:5:\"index\";i:1;s:7:\"tabPage\";i:2;s:3:\"add\";i:3;s:7:\"getById\";i:4;s:10:\"updateById\";i:6;s:6:\"upload\";i:7;s:5:\"index\";i:8;s:7:\"tabPage\";i:9;s:7:\"getById\";i:10;s:10:\"updateById\";}s:9:\"Immessage\";a:5:{i:0;s:5:\"index\";i:1;s:7:\"tabPage\";i:2;s:3:\"add\";i:3;s:7:\"getById\";i:4;s:6:\"delete\";}s:5:\"Media\";a:6:{i:0;s:5:\"index\";i:1;s:7:\"tabPage\";i:2;s:3:\"add\";i:3;s:7:\"getById\";i:4;s:10:\"updateById\";i:6;s:6:\"upload\";}s:8:\"Business\";a:6:{i:0;s:5:\"index\";i:1;s:7:\"tabPage\";i:2;s:3:\"add\";i:3;s:7:\"getById\";i:4;s:10:\"updateById\";i:6;s:6:\"upload\";}s:8:\"Charging\";a:6:{i:0;s:5:\"index\";i:1;s:7:\"tabPage\";i:2;s:3:\"add\";i:3;s:7:\"getById\";i:4;s:10:\"updateById\";i:6;s:6:\"upload\";}s:7:\"Account\";a:6:{i:0;s:5:\"index\";i:1;s:7:\"tabPage\";i:2;s:3:\"add\";i:3;s:7:\"getById\";i:4;s:10:\"updateById\";i:5;s:6:\"delete\";}s:9:\"Cashapply\";a:5:{i:0;s:5:\"index\";i:1;s:7:\"tabPage\";i:2;s:3:\"add\";i:3;s:7:\"getById\";i:4;s:10:\"updateById\";}s:6:\"Friend\";a:4:{i:0;s:5:\"index\";i:1;s:7:\"tabPage\";i:2;s:7:\"getById\";i:3;s:10:\"updateById\";}s:5:\"Topic\";a:5:{i:0;s:5:\"index\";i:1;s:7:\"tabPage\";i:2;s:3:\"add\";i:3;s:7:\"getById\";i:4;s:10:\"updateById\";}s:10:\"Topicgroup\";a:5:{i:0;s:5:\"index\";i:1;s:7:\"tabPage\";i:2;s:3:\"add\";i:3;s:7:\"getById\";i:5;s:6:\"delete\";}s:5:\"Cloud\";a:7:{i:0;s:5:\"index\";i:1;s:7:\"tabPage\";i:2;s:6:\"uplode\";i:3;s:8:\"download\";i:4;s:7:\"getById\";i:5;s:10:\"updateById\";i:6;s:6:\"delete\";}s:12:\"Organization\";a:4:{i:0;s:5:\"index\";i:1;s:7:\"tabPage\";i:2;s:7:\"getById\";i:3;s:10:\"updateById\";}s:9:\"Videotape\";a:5:{i:0;s:5:\"index\";i:1;s:7:\"tabPage\";i:2;s:10:\"updateById\";i:3;s:7:\"getById\";i:4;s:8:\"download\";}s:11:\"Monitorrole\";a:3:{i:0;s:5:\"index\";i:1;s:7:\"tabPage\";i:2;s:7:\"getById\";}s:9:\"Telephone\";a:3:{i:0;s:5:\"index\";i:1;s:7:\"tabPage\";i:2;s:7:\"getById\";}s:6:\"Record\";a:3:{i:0;s:5:\"index\";i:1;s:7:\"tabPage\";i:2;s:7:\"getById\";}s:6:\"Browse\";a:3:{i:0;s:5:\"index\";i:1;s:7:\"tabPage\";i:2;s:7:\"getById\";}}');

-- ----------------------------
-- Table structure for `hszt_article`
-- ----------------------------
DROP TABLE IF EXISTS `hszt_article`;
CREATE TABLE `hszt_article` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '编号',
  `name` varchar(25) DEFAULT NULL COMMENT '名称',
  `title` varchar(50) DEFAULT NULL COMMENT '标题',
  `icon` varchar(100) DEFAULT NULL COMMENT '图标',
  `c_time` bigint(12) DEFAULT NULL COMMENT '创建时间',
  `u_time` bigint(12) DEFAULT NULL COMMENT '修改时间',
  `uid` int(11) DEFAULT NULL COMMENT '操作人',
  `p_id` int(11) DEFAULT NULL COMMENT '项目id',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of hszt_article
-- ----------------------------

-- ----------------------------
-- Table structure for `hszt_articleinfo`
-- ----------------------------
DROP TABLE IF EXISTS `hszt_articleinfo`;
CREATE TABLE `hszt_articleinfo` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '编号',
  `article_id` int(11) DEFAULT NULL COMMENT '分类id',
  `name` varchar(50) DEFAULT NULL COMMENT '名称',
  `title` varchar(50) DEFAULT NULL COMMENT '标题',
  `keywords` varchar(100) DEFAULT NULL COMMENT '关键字',
  `icon` varchar(100) DEFAULT NULL COMMENT '缩略图',
  `content` mediumtext COMMENT '文章内容',
  `status` tinyint(2) unsigned NOT NULL DEFAULT '2' COMMENT '文章状态：0-编辑中；1-审核中；2-审核通过（发布）；3-审核不通过 4-删除',
  `nstatus` tinyint(2) unsigned DEFAULT NULL COMMENT '公告显示状态：0不显示；1显示',
  `count` int(10) unsigned DEFAULT '0' COMMENT '阅读量',
  `c_time` bigint(12) DEFAULT NULL COMMENT '创建时间',
  `u_time` bigint(12) DEFAULT NULL COMMENT '修改时间',
  `v_time` bigint(12) DEFAULT NULL COMMENT '审核时间',
  `creater` int(11) DEFAULT NULL COMMENT '创建人',
  `modifyer` int(11) DEFAULT NULL COMMENT '修改人',
  `verifyer` int(11) DEFAULT NULL COMMENT '审核人',
  `static_url` varchar(255) DEFAULT NULL COMMENT '静态url',
  `p_id` int(11) DEFAULT NULL COMMENT '项目id',
  `level` int(11) DEFAULT '0' COMMENT '显示等级',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=521 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of hszt_articleinfo
-- ----------------------------
INSERT INTO `hszt_articleinfo` VALUES ('484', '1', 'PRODUCT INTRODUCTION', 'PRODUCT INTRODUCTION', 'PRODUCT INTRODUCTION', 'http://syj3jiaoxing.com/upload/article/484/avatar/6a22741f1a3e7aeb78526bbee1b689ba.png', 'PHAPRODUCT PRODUCT PRODUCT PRODUCT INTRODUCTIONPRODUCT INTRODUCTIONPRODUCT INTRODUCTIONPRODUCT INTRODUCTIONPRODUCT INTRODUCTIONPRODUCT INTRODUCTIONPRODUCT INTRODUCTIONPRODUCT PRODUCT INTRODUCTIONPRODUCT INTRODUCTIONPRODUCT INTRODUCTIONPRODUCT INTRODUCTIONPRODUCT INTRODUCTIONPRODUCT INTRODUCTIONPRODUCT INTRODUCTIONPRODUCT INTRODUCTION', '2', null, '0', '1511952915', '1512020882', null, '1', '1', null, null, null, '0');
INSERT INTO `hszt_articleinfo` VALUES ('485', '1', 'PRODUCT INTRODUCTION', 'PRODUCT INTRODUCTION', 'PRODUCT INTRODUCTION', 'http://syj3jiaoxing.com/upload/article/484/avatar/6a22741f1a3e7aeb78526bbee1b689ba.png', 'PHAPRODUCT INTRODUCTIONPRODUCT INTRODUCTIONPRODUCT INTRODUCTIONPRODUCT INTRODUCTIONPRODUCT INTRODUCTIONPRODUCT INTRODUCTIONPRODUCT INTRODUCTIONPRODUCT PRODUCT INTRODUCTIONPRODUCT INTRODUCTIONPRODUCT INTRODUCTIONPRODUCT INTRODUCTIONPRODUCT INTRODUCTIONPRODUCT INTRODUCTIONPRODUCT INTRODUCTIONPRODUCT INTRODUCTION', '2', null, '0', '1511952915', '1512020882', null, '1', '1', null, null, null, '0');
INSERT INTO `hszt_articleinfo` VALUES ('486', '1', 'PRODUCT INTRODUCTION', 'PRODUCT INTRODUCTION', 'PRODUCT INTRODUCTION', 'http://syj3jiaoxing.com/upload/article/484/avatar/6a22741f1a3e7aeb78526bbee1b689ba.png', 'PHAPRODUCT INTRODUCTIONPRODUCT INTRODUCTIONPRODUCT INTRODUCTIONPRODUCT INTRODUCTIONPRODUCT INTRODUCTIONPRODUCT INTRODUCTIONPRODUCT INTRODUCTIONPRODUCT PRODUCT INTRODUCTIONPRODUCT INTRODUCTIONPRODUCT INTRODUCTIONPRODUCT INTRODUCTIONPRODUCT INTRODUCTIONPRODUCT INTRODUCTIONPRODUCT INTRODUCTIONPRODUCT INTRODUCTION', '2', null, '0', '1511952915', '1512020882', null, '1', '1', null, null, null, '0');
INSERT INTO `hszt_articleinfo` VALUES ('487', '1', 'PRODUCT INTRODUCTION', 'PRODUCT INTRODUCTION', 'PRODUCT INTRODUCTION', 'http://syj3jiaoxing.com/upload/article/484/avatar/6a22741f1a3e7aeb78526bbee1b689ba.png', 'PHAPRODUCT INTRODUCTIONPRODUCT INTRODUCTIONPRODUCT INTRODUCTIONPRODUCT INTRODUCTIONPRODUCT INTRODUCTIONPRODUCT INTRODUCTIONPRODUCT INTRODUCTIONPRODUCT PRODUCT INTRODUCTIONPRODUCT INTRODUCTIONPRODUCT INTRODUCTIONPRODUCT INTRODUCTIONPRODUCT INTRODUCTIONPRODUCT INTRODUCTIONPRODUCT INTRODUCTIONPRODUCT INTRODUCTION', '2', null, '0', '1511952915', '1512020882', null, '1', '1', null, null, null, '0');
INSERT INTO `hszt_articleinfo` VALUES ('488', '1', 'PRODUCT INTRODUCTION', 'PRODUCT INTRODUCTION', 'PRODUCT INTRODUCTION', 'http://syj3jiaoxing.com/upload/article/484/avatar/6a22741f1a3e7aeb78526bbee1b689ba.png', 'PHAPRODUCT INTRODUCTIONPRODUCT INTRODUCTIONPRODUCT INTRODUCTIONPRODUCT INTRODUCTIONPRODUCT INTRODUCTIONPRODUCT INTRODUCTIONPRODUCT INTRODUCTIONPRODUCT PRODUCT INTRODUCTIONPRODUCT INTRODUCTIONPRODUCT INTRODUCTIONPRODUCT INTRODUCTIONPRODUCT INTRODUCTIONPRODUCT INTRODUCTIONPRODUCT INTRODUCTIONPRODUCT INTRODUCTION', '2', null, '0', '1511952915', '1512020882', null, '1', '1', null, null, null, '0');
INSERT INTO `hszt_articleinfo` VALUES ('489', '1', 'PRODUCT INTRODUCTION', 'PRODUCT INTRODUCTION', 'PRODUCT INTRODUCTION', 'http://syj3jiaoxing.com/upload/article/484/avatar/6a22741f1a3e7aeb78526bbee1b689ba.png', 'PHAPRODUCT INTRODUCTIONPRODUCT INTRODUCTIONPRODUCT INTRODUCTIONPRODUCT INTRODUCTIONPRODUCT INTRODUCTIONPRODUCT INTRODUCTIONPRODUCT INTRODUCTIONPRODUCT PRODUCT INTRODUCTIONPRODUCT INTRODUCTIONPRODUCT INTRODUCTIONPRODUCT INTRODUCTIONPRODUCT INTRODUCTIONPRODUCT INTRODUCTIONPRODUCT INTRODUCTIONPRODUCT INTRODUCTION', '2', null, '0', '1511952915', '1512020882', null, '1', '1', null, null, null, '0');
INSERT INTO `hszt_articleinfo` VALUES ('490', '1', 'PRODUCT INTRODUCTION', 'PRODUCT INTRODUCTION', 'PRODUCT INTRODUCTION', 'http://syj3jiaoxing.com/upload/article/484/avatar/6a22741f1a3e7aeb78526bbee1b689ba.png', 'PHAPRODUCT INTRODUCTIONPRODUCT INTRODUCTIONPRODUCT INTRODUCTIONPRODUCT INTRODUCTIONPRODUCT INTRODUCTIONPRODUCT INTRODUCTIONPRODUCT INTRODUCTIONPRODUCT PRODUCT INTRODUCTIONPRODUCT INTRODUCTIONPRODUCT INTRODUCTIONPRODUCT INTRODUCTIONPRODUCT INTRODUCTIONPRODUCT INTRODUCTIONPRODUCT INTRODUCTIONPRODUCT INTRODUCTION', '2', null, '0', '1511952915', '1512020882', null, '1', '1', null, null, null, '0');
INSERT INTO `hszt_articleinfo` VALUES ('491', '1', 'PRODUCT INTRODUCTION', 'PRODUCT INTRODUCTION', 'PRODUCT INTRODUCTION', 'http://syj3jiaoxing.com/upload/article/484/avatar/6a22741f1a3e7aeb78526bbee1b689ba.png', 'PHAPRODUCT INTRODUCTIONPRODUCT INTRODUCTIONPRODUCT INTRODUCTIONPRODUCT INTRODUCTIONPRODUCT INTRODUCTIONPRODUCT INTRODUCTIONPRODUCT INTRODUCTIONPRODUCT PRODUCT INTRODUCTIONPRODUCT INTRODUCTIONPRODUCT INTRODUCTIONPRODUCT INTRODUCTIONPRODUCT INTRODUCTIONPRODUCT INTRODUCTIONPRODUCT INTRODUCTIONPRODUCT INTRODUCTION', '2', null, '0', '1511952915', '1512020882', null, '1', '1', null, null, null, '0');
INSERT INTO `hszt_articleinfo` VALUES ('492', '1', 'PRODUCT INTRODUCTION', 'PRODUCT INTRODUCTION', 'PRODUCT INTRODUCTION', 'http://syj3jiaoxing.com/upload/article/484/avatar/6a22741f1a3e7aeb78526bbee1b689ba.png', 'PHAPRODUCT INTRODUCTIONPRODUCT INTRODUCTIONPRODUCT INTRODUCTIONPRODUCT INTRODUCTIONPRODUCT INTRODUCTIONPRODUCT INTRODUCTIONPRODUCT INTRODUCTIONPRODUCT PRODUCT INTRODUCTIONPRODUCT INTRODUCTIONPRODUCT INTRODUCTIONPRODUCT INTRODUCTIONPRODUCT INTRODUCTIONPRODUCT INTRODUCTIONPRODUCT INTRODUCTIONPRODUCT INTRODUCTION', '2', null, '0', '1511952915', '1512020882', null, '1', '1', null, null, null, '0');
INSERT INTO `hszt_articleinfo` VALUES ('493', '1', 'PRODUCT INTRODUCTION', 'PRODUCT INTRODUCTION', 'PRODUCT INTRODUCTION', 'http://syj3jiaoxing.com/upload/article/484/avatar/6a22741f1a3e7aeb78526bbee1b689ba.png', 'PHAPRODUCT INTRODUCTIONPRODUCT INTRODUCTIONPRODUCT INTRODUCTIONPRODUCT INTRODUCTIONPRODUCT INTRODUCTIONPRODUCT INTRODUCTIONPRODUCT INTRODUCTIONPRODUCT PRODUCT INTRODUCTIONPRODUCT INTRODUCTIONPRODUCT INTRODUCTIONPRODUCT INTRODUCTIONPRODUCT INTRODUCTIONPRODUCT INTRODUCTIONPRODUCT INTRODUCTIONPRODUCT INTRODUCTION', '2', null, '0', '1511952915', '1512020882', null, '1', '1', null, null, null, '0');
INSERT INTO `hszt_articleinfo` VALUES ('494', '1', 'PRODUCT INTRODUCTION', 'PRODUCT INTRODUCTION', 'PRODUCT INTRODUCTION', 'http://syj3jiaoxing.com/upload/article/484/avatar/6a22741f1a3e7aeb78526bbee1b689ba.png', 'PHAPRODUCT INTRODUCTIONPRODUCT INTRODUCTIONPRODUCT INTRODUCTIONPRODUCT INTRODUCTIONPRODUCT INTRODUCTIONPRODUCT INTRODUCTIONPRODUCT INTRODUCTIONPRODUCT PRODUCT INTRODUCTIONPRODUCT INTRODUCTIONPRODUCT INTRODUCTIONPRODUCT INTRODUCTIONPRODUCT INTRODUCTIONPRODUCT INTRODUCTIONPRODUCT INTRODUCTIONPRODUCT INTRODUCTION', '2', null, '0', '1511952915', '1512020882', null, '1', '1', null, null, null, '0');
INSERT INTO `hszt_articleinfo` VALUES ('495', '1', 'PRODUCT INTRODUCTION', 'PRODUCT INTRODUCTION', 'PRODUCT INTRODUCTION', 'http://syj3jiaoxing.com/upload/article/484/avatar/6a22741f1a3e7aeb78526bbee1b689ba.png', 'PHAPRODUCT INTRODUCTIONPRODUCT INTRODUCTIONPRODUCT INTRODUCTIONPRODUCT INTRODUCTIONPRODUCT INTRODUCTIONPRODUCT INTRODUCTIONPRODUCT INTRODUCTIONPRODUCT PRODUCT INTRODUCTIONPRODUCT INTRODUCTIONPRODUCT INTRODUCTIONPRODUCT INTRODUCTIONPRODUCT INTRODUCTIONPRODUCT INTRODUCTIONPRODUCT INTRODUCTIONPRODUCT INTRODUCTION', '2', null, '0', '1511952915', '1512020882', null, '1', '1', null, null, null, '0');
INSERT INTO `hszt_articleinfo` VALUES ('496', '1', 'PRODUCT INTRODUCTION', 'PRODUCT INTRODUCTION', 'PRODUCT INTRODUCTION', 'http://syj3jiaoxing.com/upload/article/484/avatar/6a22741f1a3e7aeb78526bbee1b689ba.png', 'PHAPRODUCT INTRODUCTIONPRODUCT INTRODUCTIONPRODUCT INTRODUCTIONPRODUCT INTRODUCTIONPRODUCT INTRODUCTIONPRODUCT INTRODUCTIONPRODUCT INTRODUCTIONPRODUCT PRODUCT INTRODUCTIONPRODUCT INTRODUCTIONPRODUCT INTRODUCTIONPRODUCT INTRODUCTIONPRODUCT INTRODUCTIONPRODUCT INTRODUCTIONPRODUCT INTRODUCTIONPRODUCT INTRODUCTION', '2', null, '0', '1511952915', '1512020882', null, '1', '1', null, null, null, '0');
INSERT INTO `hszt_articleinfo` VALUES ('497', '1', 'PRODUCT INTRODUCTION', 'PRODUCT INTRODUCTION', 'PRODUCT INTRODUCTION', 'http://syj3jiaoxing.com/upload/article/484/avatar/6a22741f1a3e7aeb78526bbee1b689ba.png', 'PHAPRODUCT INTRODUCTIONPRODUCT INTRODUCTIONPRODUCT INTRODUCTIONPRODUCT INTRODUCTIONPRODUCT INTRODUCTIONPRODUCT INTRODUCTIONPRODUCT INTRODUCTIONPRODUCT PRODUCT INTRODUCTIONPRODUCT INTRODUCTIONPRODUCT INTRODUCTIONPRODUCT INTRODUCTIONPRODUCT INTRODUCTIONPRODUCT INTRODUCTIONPRODUCT INTRODUCTIONPRODUCT INTRODUCTION', '2', null, '0', '1511952915', '1512020882', null, '1', '1', null, null, null, '0');
INSERT INTO `hszt_articleinfo` VALUES ('498', '1', 'PRODUCT INTRODUCTION', 'PRODUCT INTRODUCTION', 'PRODUCT INTRODUCTION', 'http://syj3jiaoxing.com/upload/article/484/avatar/6a22741f1a3e7aeb78526bbee1b689ba.png', 'PHAPRODUCT INTRODUCTIONPRODUCT INTRODUCTIONPRODUCT INTRODUCTIONPRODUCT INTRODUCTIONPRODUCT INTRODUCTIONPRODUCT INTRODUCTIONPRODUCT INTRODUCTIONPRODUCT PRODUCT INTRODUCTIONPRODUCT INTRODUCTIONPRODUCT INTRODUCTIONPRODUCT INTRODUCTIONPRODUCT INTRODUCTIONPRODUCT INTRODUCTIONPRODUCT INTRODUCTIONPRODUCT INTRODUCTION', '2', null, '0', '1511952915', '1512020882', null, '1', '1', null, null, null, '0');
INSERT INTO `hszt_articleinfo` VALUES ('499', '1', 'PRODUCT INTRODUCTION', 'PRODUCT INTRODUCTION', 'PRODUCT INTRODUCTION', 'http://syj3jiaoxing.com/upload/article/484/avatar/6a22741f1a3e7aeb78526bbee1b689ba.png', 'PHAPRODUCT INTRODUCTIONPRODUCT INTRODUCTIONPRODUCT INTRODUCTIONPRODUCT INTRODUCTIONPRODUCT INTRODUCTIONPRODUCT INTRODUCTIONPRODUCT INTRODUCTIONPRODUCT INTRODUCTION', '2', null, '0', '1511952915', '1512020882', null, '1', '1', null, null, null, '0');
INSERT INTO `hszt_articleinfo` VALUES ('500', '1', 'PRODUCT INTRODUCTION', 'PRODUCT INTRODUCTION', 'PRODUCT INTRODUCTION', 'http://syj3jiaoxing.com/upload/article/484/avatar/6a22741f1a3e7aeb78526bbee1b689ba.png', 'PHAPRODUCT INTRODUCTIONPRODUCT INTRODUCTIONPRODUCT INTRODUCTIONPRODUCT INTRODUCTIONPRODUCT INTRODUCTIONPRODUCT INTRODUCTIONPRODUCT INTRODUCTIONPRODUCT PRODUCT INTRODUCTIONPRODUCT INTRODUCTIONPRODUCT INTRODUCTIONPRODUCT INTRODUCTIONPRODUCT INTRODUCTIONPRODUCT INTRODUCTIONPRODUCT INTRODUCTIONPRODUCT INTRODUCTION', '2', null, '0', '1511952915', '1512020882', null, '1', '1', null, null, null, '0');
INSERT INTO `hszt_articleinfo` VALUES ('501', '1', 'PRODUCT INTRODUCTION', 'PRODUCT INTRODUCTION', 'PRODUCT INTRODUCTION', 'http://syj3jiaoxing.com/upload/article/484/avatar/6a22741f1a3e7aeb78526bbee1b689ba.png', 'PHAPRODUCT INTRODUCTIONPRODUCT INTRODUCTIONPRODUCT INTRODUCTIONPRODUCT INTRODUCTIONPRODUCT INTRODUCTIONPRODUCT INTRODUCTIONPRODUCT INTRODUCTIONPRODUCT INTRODUCTION', '2', null, '0', '1511952915', '1512020882', null, '1', '1', null, null, null, '0');
INSERT INTO `hszt_articleinfo` VALUES ('502', '1', 'PRODUCT INTRODUCTION', 'PRODUCT INTRODUCTION', 'PRODUCT INTRODUCTION', 'http://syj3jiaoxing.com/upload/article/484/avatar/6a22741f1a3e7aeb78526bbee1b689ba.png', 'PHAPRODUCT INTRODUCTIONPRODUCT INTRODUCTIONPRODUCT INTRODUCTIONPRODUCT INTRODUCTIONPRODUCT INTRODUCTIONPRODUCT INTRODUCTIONPRODUCT INTRODUCTIONPRODUCT INTRODUCTION', '2', null, '0', '1511952915', '1512020882', null, '1', '1', null, null, null, '0');
INSERT INTO `hszt_articleinfo` VALUES ('503', '1', 'PRODUCT INTRODUCTION', 'PRODUCT INTRODUCTION', 'PRODUCT INTRODUCTION', 'http://syj3jiaoxing.com/upload/article/484/avatar/6a22741f1a3e7aeb78526bbee1b689ba.png', 'PHA+PGltZyBzdHlsZT0iIiBzcmM9Imh0dHBzOi8vc3lqM2ppYW94aW5nLmNvbS91cGxvYWQvYXJ0aWNsZS80ODQvNmEyMjc0MWYxYTNlN2FlYjc4NTI2YmJlZTFiNjg5YmEucG5nIj4KCiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgIDwvcD4=', '2', null, '0', '1511952915', '1512020882', null, '1', '1', null, null, null, '0');
INSERT INTO `hszt_articleinfo` VALUES ('504', '1', 'PRODUCT INTRODUCTION', 'PRODUCT INTRODUCTION', 'PRODUCT INTRODUCTION', 'http://syj3jiaoxing.com/upload/article/484/avatar/6a22741f1a3e7aeb78526bbee1b689ba.png', 'PHA+PGltZyBzdHlsZT0iIiBzcmM9Imh0dHBzOi8vc3lqM2ppYW94aW5nLmNvbS91cGxvYWQvYXJ0aWNsZS80ODQvNmEyMjc0MWYxYTNlN2FlYjc4NTI2YmJlZTFiNjg5YmEucG5nIj4KCiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgIDwvcD4=', '2', null, '0', '1511952915', '1512020882', null, '1', '1', null, null, null, '0');
INSERT INTO `hszt_articleinfo` VALUES ('505', '1', 'PRODUCT INTRODUCTION', 'PRODUCT INTRODUCTION', 'PRODUCT INTRODUCTION', 'http://syj3jiaoxing.com/upload/article/484/avatar/6a22741f1a3e7aeb78526bbee1b689ba.png', 'PHA+PGltZyBzdHlsZT0iIiBzcmM9Imh0dHBzOi8vc3lqM2ppYW94aW5nLmNvbS91cGxvYWQvYXJ0aWNsZS80ODQvNmEyMjc0MWYxYTNlN2FlYjc4NTI2YmJlZTFiNjg5YmEucG5nIj4KCiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgIDwvcD4=', '2', null, '0', '1511952915', '1512020882', null, '1', '1', null, null, null, '0');
INSERT INTO `hszt_articleinfo` VALUES ('506', '1', 'PRODUCT INTRODUCTION', 'PRODUCT INTRODUCTION', 'PRODUCT INTRODUCTION', 'http://syj3jiaoxing.com/upload/article/484/avatar/6a22741f1a3e7aeb78526bbee1b689ba.png', 'PHAPRODUCT INTRODUCTIONPRODUCT INTRODUCTIONPRODUCT INTRODUCTIONPRODUCT INTRODUCTIONPRODUCT INTRODUCTIONPRODUCT INTRODUCTIONPRODUCT INTRODUCTIONPRODUCT INTRODUCTION', '2', null, '0', '1511952915', '1512020882', null, '1', '1', null, null, null, '0');
INSERT INTO `hszt_articleinfo` VALUES ('507', '1', 'PRODUCT INTRODUCTION', 'PRODUCT INTRODUCTION', 'PRODUCT INTRODUCTION', 'http://syj3jiaoxing.com/upload/article/484/avatar/6a22741f1a3e7aeb78526bbee1b689ba.png', 'PHAPRODUCT INTRODUCTIONPRODUCT INTRODUCTIONPRODUCT INTRODUCTIONPRODUCT INTRODUCTIONPRODUCT INTRODUCTIONPRODUCT INTRODUCTIONPRODUCT INTRODUCTIONPRODUCT INTRODUCTION', '2', null, '0', '1511952915', '1512020882', null, '1', '1', null, null, null, '0');
INSERT INTO `hszt_articleinfo` VALUES ('508', '1', 'PRODUCT INTRODUCTION', 'PRODUCT INTRODUCTION', 'PRODUCT INTRODUCTION', 'http://syj3jiaoxing.com/upload/article/484/avatar/6a22741f1a3e7aeb78526bbee1b689ba.png', 'PHAPRODUCT INTRODUCTIONPRODUCT INTRODUCTIONPRODUCT INTRODUCTIONPRODUCT INTRODUCTIONPRODUCT INTRODUCTIONPRODUCT INTRODUCTIONPRODUCT INTRODUCTIONPRODUCT INTRODUCTION', '2', null, '0', '1511952915', '1512020882', null, '1', '1', null, null, null, '0');
INSERT INTO `hszt_articleinfo` VALUES ('509', '1', 'PRODUCT INTRODUCTION', 'PRODUCT INTRODUCTION', 'PRODUCT INTRODUCTION', 'http://syj3jiaoxing.com/upload/article/484/avatar/6a22741f1a3e7aeb78526bbee1b689ba.png', 'PHAPRODUCT INTRODUCTIONPRODUCT INTRODUCTIONPRODUCT INTRODUCTIONPRODUCT INTRODUCTIONPRODUCT INTRODUCTIONPRODUCT INTRODUCTIONPRODUCT INTRODUCTIONPRODUCT INTRODUCTION', '2', null, '0', '1511952915', '1512020882', null, '1', '1', null, null, null, '0');
INSERT INTO `hszt_articleinfo` VALUES ('510', '1', 'PRODUCT INTRODUCTION', 'PRODUCT INTRODUCTION', 'PRODUCT INTRODUCTION', 'http://syj3jiaoxing.com/upload/article/484/avatar/6a22741f1a3e7aeb78526bbee1b689ba.png', 'PHAPRODUCT INTRODUCTIONPRODUCT INTRODUCTIONPRODUCT INTRODUCTIONPRODUCT INTRODUCTIONPRODUCT INTRODUCTIONPRODUCT INTRODUCTIONPRODUCT INTRODUCTIONPRODUCT INTRODUCTION', '2', null, '0', '1511952915', '1512020882', null, '1', '1', null, null, null, '0');
INSERT INTO `hszt_articleinfo` VALUES ('512', '1', 'PRODUCT INTRODUCTION', 'PRODUCT INTRODUCTION', 'PRODUCT INTRODUCTION', 'http://syj3jiaoxing.com/upload/article/484/avatar/6a22741f1a3e7aeb78526bbee1b689ba.png', 'PHAPRODUCT INTRODUCTIONPRODUCT INTRODUCTIONPRODUCT INTRODUCTIONPRODUCT INTRODUCTIONPRODUCT INTRODUCTIONPRODUCT INTRODUCTIONPRODUCT INTRODUCTIONPRODUCT INTRODUCTION', '2', null, '0', '1511952915', '1512020882', null, '1', '1', null, null, null, '0');
INSERT INTO `hszt_articleinfo` VALUES ('513', '1', 'PRODUCT INTRODUCTION', 'PRODUCT INTRODUCTION', 'PRODUCT INTRODUCTION', 'http://syj3jiaoxing.com/upload/article/484/avatar/6a22741f1a3e7aeb78526bbee1b689ba.png', 'PHAPRODUCT INTRODUCTIONPRODUCT INTRODUCTIONPRODUCT INTRODUCTIONPRODUCT INTRODUCTIONPRODUCT INTRODUCTIONPRODUCT INTRODUCTIONPRODUCT INTRODUCTIONPRODUCT INTRODUCTION', '2', null, '0', '1511952915', '1512020882', null, '1', '1', null, null, null, '0');
INSERT INTO `hszt_articleinfo` VALUES ('514', '1', 'PRODUCT INTRODUCTION', 'PRODUCT INTRODUCTION', 'PRODUCT INTRODUCTION', 'http://syj3jiaoxing.com/upload/article/484/avatar/6a22741f1a3e7aeb78526bbee1b689ba.png', 'PHAPRODUCT INTRODUCTIONPRODUCT INTRODUCTIONPRODUCT INTRODUCTIONPRODUCT INTRODUCTIONPRODUCT INTRODUCTIONPRODUCT INTRODUCTIONPRODUCT INTRODUCTIONPRODUCT INTRODUCTION', '2', null, '0', '1511952915', '1512020882', null, '1', '1', null, null, null, '0');
INSERT INTO `hszt_articleinfo` VALUES ('515', '1', 'PRODUCT INTRODUCTION', 'PRODUCT INTRODUCTION', 'PRODUCT INTRODUCTION', 'http://syj3jiaoxing.com/upload/article/484/avatar/6a22741f1a3e7aeb78526bbee1b689ba.png', 'UFJPRFVDVCBJTlRST0RVQ1RJT05QUk9EVUNUIElOVFJPRFVDVElPTlBST0RVQ1QgSU5UUk9EVUNUSU9OUFJPRFVDVCBJTlRST0RVQ1RJT05QUk9EVUNUIElOVFJPRFVDVElPTlBST0RVQ1QgSU5UUk9EVUNUSU9OUFJPRFVDVCBJTlRST0RVQ1RJT05QUk9EVUNUIElOVFJPRFVDVElPTlBST0RVQ1QgSU5UUk9EVUNUSU9OUFJPRFVDVCBJTlRST0RVQ1RJT05QUk9EVUNUIElOVFJPRFVDVElPTlBST0RVQ1QgSU5UUk9EVUNUSU9OUFJPRFVDVCBJTlRST0RVQ1RJT05QUk9EVUNUIElOVFJPRFVDVElPTlBST0RVQ1QgSU5UUk9EVUNUSU9OUFJPRFVDVCBJTlRST0RVQ1RJT04=', '2', null, '0', '1511952915', '1512038886', null, '1', '1', null, null, null, '0');
INSERT INTO `hszt_articleinfo` VALUES ('516', '1', 'PRODUCT INTRODUCTION', 'PRODUCT INTRODUCTION', 'PRODUCT INTRODUCTION', 'http://syj3jiaoxing.com/upload/article/484/avatar/6a22741f1a3e7aeb78526bbee1b689ba.png', 'PHAPRODUCT INTRODUCTIONPRODUCT INTRODUCTIONPRODUCT INTRODUCTIONPRODUCT INTRODUCTIONPRODUCT INTRODUCTIONPRODUCT INTRODUCTIONPRODUCT INTRODUCTIONPRODUCT INTRODUCTION', '2', null, '0', '1511952915', '1512020882', null, '1', '1', null, null, null, '0');
INSERT INTO `hszt_articleinfo` VALUES ('517', '1', 'PRODUCT INTRODUCTION', 'PRODUCT INTRODUCTION', 'PRODUCT INTRODUCTION', 'http://syj3jiaoxing.com/upload/article/484/avatar/6a22741f1a3e7aeb78526bbee1b689ba.png', 'PHAPRODUCT INTRODUCTIONPRODUCT INTRODUCTIONPRODUCT INTRODUCTIONPRODUCT INTRODUCTIONPRODUCT INTRODUCTIONPRODUCT INTRODUCTIONPRODUCT INTRODUCTIONPRODUCT INTRODUCTION', '2', null, '0', '1511952915', '1512020882', null, '1', '1', null, null, null, '0');
INSERT INTO `hszt_articleinfo` VALUES ('518', '1', 'PRODUCT INTRODUCTION', 'PRODUCT INTRODUCTION', 'PRODUCT INTRODUCTION', 'http://syj3jiaoxing.com/upload/article/484/avatar/6a22741f1a3e7aeb78526bbee1b689ba.png', 'PHAPRODUCT INTRODUCTIONPRODUCT INTRODUCTIONPRODUCT INTRODUCTIONPRODUCT INTRODUCTIONPRODUCT INTRODUCTIONPRODUCT INTRODUCTIONPRODUCT INTRODUCTIONPRODUCT INTRODUCTION', '2', null, '0', '1511952915', '1512020882', null, '1', '1', null, null, null, '0');
INSERT INTO `hszt_articleinfo` VALUES ('519', '1', 'PRODUCT INTRODUCTION', 'PRODUCT INTRODUCTION', 'PRODUCT INTRODUCTION', 'http://syj3jiaoxing.com/upload/article/484/avatar/6a22741f1a3e7aeb78526bbee1b689ba.png', 'PHAPRODUCT INTRODUCTIONPRODUCT INTRODUCTIONPRODUCT INTRODUCTIONPRODUCT INTRODUCTIONPRODUCT INTRODUCTIONPRODUCT INTRODUCTIONPRODUCT INTRODUCTIONPRODUCT INTRODUCTION', '2', null, '0', '1511952915', '1512020882', null, '1', '1', null, null, null, '0');
INSERT INTO `hszt_articleinfo` VALUES ('520', '1', 'PRODUCT INTRODUCTION', 'PRODUCT INTRODUCTION', 'PRODUCT INTRODUCTION', 'https://syj3jiaoxing.com/upload/article/520/avatar/a5e0718e701ef40040865a0745977d04.png', '', '2', null, '0', '1511952915', '1512388078', null, '1', '1', null, null, null, '0');

-- ----------------------------
-- Table structure for `hszt_audit`
-- ----------------------------
DROP TABLE IF EXISTS `hszt_audit`;
CREATE TABLE `hszt_audit` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '编号',
  `audit_type` int(3) DEFAULT NULL COMMENT '审核类型 0 视频 1 游戏 2 音乐 3财富 4购物',
  `audit_id` int(11) DEFAULT NULL COMMENT '审核内容id',
  `nstatus` int(2) DEFAULT NULL COMMENT '审核状态 0 未审核 1审核通过 2审核不通过',
  `c_time` bigint(12) DEFAULT NULL COMMENT '创建时间',
  `v_time` bigint(12) DEFAULT NULL COMMENT '通过时间',
  `uid` int(11) DEFAULT NULL COMMENT '操作人',
  `v_uid` int(11) DEFAULT NULL COMMENT '审核人',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=202 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of hszt_audit
-- ----------------------------
INSERT INTO `hszt_audit` VALUES ('1', '0', '465', '0', '1508730050', null, '1', null);
INSERT INTO `hszt_audit` VALUES ('2', '3', '376', '0', '1508731040', null, '1', null);
INSERT INTO `hszt_audit` VALUES ('3', '2', '4', '0', '1508731746', null, '1', null);
INSERT INTO `hszt_audit` VALUES ('4', '0', '464', '0', '1510019644', null, '6', null);
INSERT INTO `hszt_audit` VALUES ('6', '0', '460', '0', '1510019684', null, '6', null);
INSERT INTO `hszt_audit` VALUES ('7', '0', '459', '0', '1510019697', null, '6', null);
INSERT INTO `hszt_audit` VALUES ('8', '0', '458', '0', '1510019710', null, '6', null);
INSERT INTO `hszt_audit` VALUES ('9', '0', '457', '0', '1510019721', null, '6', null);
INSERT INTO `hszt_audit` VALUES ('10', '0', '456', '0', '1510019730', null, '6', null);
INSERT INTO `hszt_audit` VALUES ('11', '0', '455', '0', '1510019744', null, '6', null);
INSERT INTO `hszt_audit` VALUES ('12', '0', '454', '0', '1510019752', null, '6', null);
INSERT INTO `hszt_audit` VALUES ('13', '0', '453', '0', '1510019766', null, '6', null);
INSERT INTO `hszt_audit` VALUES ('14', '0', '451', '0', '1510019810', null, '6', null);
INSERT INTO `hszt_audit` VALUES ('15', '0', '450', '0', '1510019836', null, '6', null);
INSERT INTO `hszt_audit` VALUES ('16', '0', '447', '0', '1510019856', null, '6', null);
INSERT INTO `hszt_audit` VALUES ('17', '0', '446', '0', '1510019875', null, '6', null);
INSERT INTO `hszt_audit` VALUES ('18', '0', '445', '0', '1510019924', null, '6', null);
INSERT INTO `hszt_audit` VALUES ('19', '0', '443', '0', '1510019934', null, '6', null);
INSERT INTO `hszt_audit` VALUES ('20', '0', '442', '0', '1510019943', null, '6', null);
INSERT INTO `hszt_audit` VALUES ('21', '0', '441', '0', '1510019952', null, '6', null);
INSERT INTO `hszt_audit` VALUES ('22', '0', '440', '0', '1510019967', null, '6', null);
INSERT INTO `hszt_audit` VALUES ('23', '0', '438', '0', '1510019982', null, '6', null);
INSERT INTO `hszt_audit` VALUES ('24', '0', '429', '0', '1510019994', null, '6', null);
INSERT INTO `hszt_audit` VALUES ('25', '0', '428', '0', '1510020003', null, '6', null);
INSERT INTO `hszt_audit` VALUES ('26', '0', '427', '0', '1510020011', null, '6', null);
INSERT INTO `hszt_audit` VALUES ('27', '0', '426', '0', '1510020028', null, '6', null);
INSERT INTO `hszt_audit` VALUES ('28', '0', '425', '0', '1510020297', null, '6', null);
INSERT INTO `hszt_audit` VALUES ('29', '0', '424', '0', '1510020314', null, '6', null);
INSERT INTO `hszt_audit` VALUES ('30', '0', '423', '0', '1510020327', null, '6', null);
INSERT INTO `hszt_audit` VALUES ('31', '0', '422', '0', '1510020340', null, '6', null);
INSERT INTO `hszt_audit` VALUES ('32', '0', '421', '0', '1510020356', null, '6', null);
INSERT INTO `hszt_audit` VALUES ('33', '0', '420', '0', '1510020366', null, '6', null);
INSERT INTO `hszt_audit` VALUES ('34', '0', '419', '0', '1510020384', null, '6', null);
INSERT INTO `hszt_audit` VALUES ('35', '0', '418', '0', '1510020398', null, '6', null);
INSERT INTO `hszt_audit` VALUES ('36', '0', '417', '0', '1510020539', null, '6', null);
INSERT INTO `hszt_audit` VALUES ('37', '0', '416', '0', '1510020550', null, '6', null);
INSERT INTO `hszt_audit` VALUES ('38', '0', '415', '0', '1510020560', null, '6', null);
INSERT INTO `hszt_audit` VALUES ('39', '0', '414', '0', '1510020570', null, '6', null);
INSERT INTO `hszt_audit` VALUES ('40', '0', '413', '0', '1510020580', null, '6', null);
INSERT INTO `hszt_audit` VALUES ('41', '0', '412', '0', '1510020592', null, '6', null);
INSERT INTO `hszt_audit` VALUES ('42', '0', '411', '0', '1510020602', null, '6', null);
INSERT INTO `hszt_audit` VALUES ('43', '0', '410', '0', '1510020613', null, '6', null);
INSERT INTO `hszt_audit` VALUES ('44', '0', '306', '0', '1510020732', null, '6', null);
INSERT INTO `hszt_audit` VALUES ('45', '0', '230', '0', '1510020763', null, '6', null);
INSERT INTO `hszt_audit` VALUES ('46', '2', '5', '0', '1510644733', null, '1', null);
INSERT INTO `hszt_audit` VALUES ('47', '3', '377', '0', '1510829901', null, '5', null);
INSERT INTO `hszt_audit` VALUES ('48', '3', '378', '0', '1510830658', null, '5', null);
INSERT INTO `hszt_audit` VALUES ('49', '3', '379', '0', '1510830778', null, '5', null);
INSERT INTO `hszt_audit` VALUES ('50', '3', '380', '0', '1510830900', null, '5', null);
INSERT INTO `hszt_audit` VALUES ('51', '3', '381', '0', '1510831000', null, '5', null);
INSERT INTO `hszt_audit` VALUES ('52', '3', '382', '0', '1510831158', null, '5', null);
INSERT INTO `hszt_audit` VALUES ('53', '3', '383', '0', '1510831325', null, '5', null);
INSERT INTO `hszt_audit` VALUES ('54', '3', '384', '0', '1510831421', null, '5', null);
INSERT INTO `hszt_audit` VALUES ('55', '3', '385', '0', '1510831588', null, '5', null);
INSERT INTO `hszt_audit` VALUES ('56', '3', '386', '0', '1510831725', null, '5', null);
INSERT INTO `hszt_audit` VALUES ('57', '3', '387', '0', '1510831890', null, '5', null);
INSERT INTO `hszt_audit` VALUES ('58', '3', '388', '0', '1510831995', null, '5', null);
INSERT INTO `hszt_audit` VALUES ('59', '3', '389', '0', '1510832086', null, '5', null);
INSERT INTO `hszt_audit` VALUES ('60', '3', '390', '0', '1510832241', null, '5', null);
INSERT INTO `hszt_audit` VALUES ('65', '0', '470', '0', '1511859329', null, '6', null);
INSERT INTO `hszt_audit` VALUES ('66', '0', '471', '0', '1511859909', null, '6', null);
INSERT INTO `hszt_audit` VALUES ('69', '0', '482', '0', '1511920758', null, '6', null);
INSERT INTO `hszt_audit` VALUES ('71', '0', '484', '0', '1511952916', null, '1', null);
INSERT INTO `hszt_audit` VALUES ('74', '0', '487', '0', '1511953557', null, '1', null);
INSERT INTO `hszt_audit` VALUES ('75', '0', '515', '0', '1512038647', null, '1', null);
INSERT INTO `hszt_audit` VALUES ('76', '0', '520', '0', '1512388078', null, '1', null);
INSERT INTO `hszt_audit` VALUES ('79', '0', '522', '0', '1513233157', null, '1', null);
INSERT INTO `hszt_audit` VALUES ('83', '0', '564', '0', '1513257862', null, '1', null);
INSERT INTO `hszt_audit` VALUES ('84', '0', '563', '0', '1513257878', null, '1', null);
INSERT INTO `hszt_audit` VALUES ('85', '0', '566', '0', '1513259037', null, '1', null);
INSERT INTO `hszt_audit` VALUES ('86', '0', '565', '0', '1513267028', null, '1', null);
INSERT INTO `hszt_audit` VALUES ('87', '0', '567', '0', '1513267650', null, '1', null);
INSERT INTO `hszt_audit` VALUES ('89', '0', '569', '0', '1513270882', null, '1', null);
INSERT INTO `hszt_audit` VALUES ('90', '0', null, '0', '1513394602', null, '1', null);
INSERT INTO `hszt_audit` VALUES ('91', '0', null, '0', '1513395150', null, '1', null);
INSERT INTO `hszt_audit` VALUES ('92', '0', null, '0', '1513395509', null, '1', null);
INSERT INTO `hszt_audit` VALUES ('93', '0', null, '0', '1513400054', null, '1', null);
INSERT INTO `hszt_audit` VALUES ('94', '0', null, '0', '1513400132', null, '1', null);
INSERT INTO `hszt_audit` VALUES ('95', '0', null, '0', '1513400209', null, '1', null);
INSERT INTO `hszt_audit` VALUES ('97', '0', null, '0', '1513405773', null, '1', null);
INSERT INTO `hszt_audit` VALUES ('98', '0', null, '0', '1513407924', null, '1', null);
INSERT INTO `hszt_audit` VALUES ('99', '0', null, '0', '1513408045', null, '1', null);
INSERT INTO `hszt_audit` VALUES ('100', '0', null, '0', '1513408119', null, '1', null);
INSERT INTO `hszt_audit` VALUES ('101', '0', null, '0', '1513408745', null, '1', null);
INSERT INTO `hszt_audit` VALUES ('103', '0', null, '0', '1513409323', null, '1', null);
INSERT INTO `hszt_audit` VALUES ('105', '0', null, '0', '1513410511', null, '1', null);
INSERT INTO `hszt_audit` VALUES ('106', '0', null, '0', '1513415478', null, '1', null);
INSERT INTO `hszt_audit` VALUES ('107', '0', null, '0', '1513415565', null, '1', null);
INSERT INTO `hszt_audit` VALUES ('108', '0', null, '0', '1513415592', null, '1', null);
INSERT INTO `hszt_audit` VALUES ('109', '0', null, '0', '1513415593', null, '1', null);
INSERT INTO `hszt_audit` VALUES ('110', '0', null, '0', '1513415639', null, '1', null);
INSERT INTO `hszt_audit` VALUES ('111', '0', null, '0', '1513415666', null, '1', null);
INSERT INTO `hszt_audit` VALUES ('112', '0', null, '0', '1513415748', null, '1', null);
INSERT INTO `hszt_audit` VALUES ('113', '0', null, '0', '1513415783', null, '1', null);
INSERT INTO `hszt_audit` VALUES ('117', '0', null, '0', '1513416467', null, '1', null);
INSERT INTO `hszt_audit` VALUES ('118', '0', null, '0', '1513417819', null, '1', null);
INSERT INTO `hszt_audit` VALUES ('119', '0', null, '0', '1513492784', null, '1', null);
INSERT INTO `hszt_audit` VALUES ('120', '0', null, '0', '1513505127', null, '1', null);
INSERT INTO `hszt_audit` VALUES ('121', '0', null, '0', '1513505208', null, '1', null);
INSERT INTO `hszt_audit` VALUES ('122', '0', null, '0', '1513563617', null, '1', null);
INSERT INTO `hszt_audit` VALUES ('123', '0', null, '0', '1513597946', null, '1', null);
INSERT INTO `hszt_audit` VALUES ('124', '0', null, '0', '1513676594', null, '1', null);
INSERT INTO `hszt_audit` VALUES ('126', '0', null, '0', '1513950119', null, '1', null);
INSERT INTO `hszt_audit` VALUES ('127', '0', null, '0', '1513955192', null, '1', null);
INSERT INTO `hszt_audit` VALUES ('128', '0', null, '0', '1514099030', null, '1', null);
INSERT INTO `hszt_audit` VALUES ('129', '0', null, '0', '1514205642', null, '1', null);
INSERT INTO `hszt_audit` VALUES ('130', '0', null, '0', '1514535028', null, '1', null);
INSERT INTO `hszt_audit` VALUES ('131', '0', null, '0', '1514872723', null, '1', null);
INSERT INTO `hszt_audit` VALUES ('132', '0', null, '0', '1514872817', null, '1', null);
INSERT INTO `hszt_audit` VALUES ('133', '0', null, '0', '1515030333', null, '1', null);
INSERT INTO `hszt_audit` VALUES ('134', '0', null, '0', '1515030408', null, '1', null);
INSERT INTO `hszt_audit` VALUES ('135', '0', null, '0', '1515037629', null, '1', null);
INSERT INTO `hszt_audit` VALUES ('136', '0', null, '0', '1515044009', null, '1', null);
INSERT INTO `hszt_audit` VALUES ('137', '0', null, '0', '1515323161', null, '1', null);
INSERT INTO `hszt_audit` VALUES ('138', '0', null, '0', '1515384606', null, '1', null);
INSERT INTO `hszt_audit` VALUES ('139', '0', null, '0', '1515495559', null, '1', null);
INSERT INTO `hszt_audit` VALUES ('140', '0', null, '0', '1515584174', null, '1', null);
INSERT INTO `hszt_audit` VALUES ('141', '0', null, '0', '1515584882', null, '1', null);
INSERT INTO `hszt_audit` VALUES ('142', '0', null, '0', '1515585037', null, '1', null);
INSERT INTO `hszt_audit` VALUES ('143', '0', null, '0', '1515585160', null, '1', null);
INSERT INTO `hszt_audit` VALUES ('144', '0', null, '0', '1515585225', null, '1', null);
INSERT INTO `hszt_audit` VALUES ('145', '0', null, '0', '1515585363', null, '1', null);
INSERT INTO `hszt_audit` VALUES ('146', '0', null, '0', '1515585466', null, '1', null);
INSERT INTO `hszt_audit` VALUES ('147', '0', null, '0', '1515585518', null, '1', null);
INSERT INTO `hszt_audit` VALUES ('148', '0', null, '0', '1515586539', null, '1', null);
INSERT INTO `hszt_audit` VALUES ('149', '0', null, '0', '1515586616', null, '1', null);
INSERT INTO `hszt_audit` VALUES ('150', '0', null, '0', '1515586689', null, '1', null);
INSERT INTO `hszt_audit` VALUES ('151', '0', null, '0', '1515586721', null, '1', null);
INSERT INTO `hszt_audit` VALUES ('152', '0', null, '0', '1515586810', null, '1', null);
INSERT INTO `hszt_audit` VALUES ('153', '0', null, '0', '1515586874', null, '1', null);
INSERT INTO `hszt_audit` VALUES ('154', '0', null, '0', '1515587021', null, '1', null);
INSERT INTO `hszt_audit` VALUES ('155', '0', null, '0', '1515587776', null, '1', null);
INSERT INTO `hszt_audit` VALUES ('156', '0', null, '0', '1515587881', null, '1', null);
INSERT INTO `hszt_audit` VALUES ('157', '0', null, '0', '1515587888', null, '1', null);
INSERT INTO `hszt_audit` VALUES ('158', '0', null, '0', '1515588231', null, '1', null);
INSERT INTO `hszt_audit` VALUES ('159', '0', null, '0', '1515668275', null, '1', null);
INSERT INTO `hszt_audit` VALUES ('160', '0', null, '0', '1515668332', null, '1', null);
INSERT INTO `hszt_audit` VALUES ('161', '0', null, '0', '1515670005', null, '1', null);
INSERT INTO `hszt_audit` VALUES ('162', '0', null, '0', '1515746954', null, '1', null);
INSERT INTO `hszt_audit` VALUES ('163', '0', null, '0', '1515747176', null, '1', null);
INSERT INTO `hszt_audit` VALUES ('164', '0', null, '0', '1515823228', null, '1', null);
INSERT INTO `hszt_audit` VALUES ('165', '0', null, '0', '1515823412', null, '1', null);
INSERT INTO `hszt_audit` VALUES ('166', '0', null, '0', '1516032784', null, '1', null);
INSERT INTO `hszt_audit` VALUES ('167', '0', null, '0', '1516586771', null, '1', null);
INSERT INTO `hszt_audit` VALUES ('168', '0', null, '0', '1516586888', null, '1', null);
INSERT INTO `hszt_audit` VALUES ('169', '0', null, '0', '1516673865', null, '1', null);
INSERT INTO `hszt_audit` VALUES ('170', '0', null, '0', '1516712177', null, '1', null);
INSERT INTO `hszt_audit` VALUES ('171', '0', null, '0', '1517191112', null, '1', null);
INSERT INTO `hszt_audit` VALUES ('172', '0', null, '0', '1517291843', null, '1', null);
INSERT INTO `hszt_audit` VALUES ('173', '0', null, '0', '1517465729', null, '1', null);
INSERT INTO `hszt_audit` VALUES ('174', '0', null, '0', '1517568744', null, '1', null);
INSERT INTO `hszt_audit` VALUES ('175', '0', null, '0', '1517710526', null, '1', null);
INSERT INTO `hszt_audit` VALUES ('176', '0', null, '0', '1517790884', null, '1', null);
INSERT INTO `hszt_audit` VALUES ('177', '0', null, '0', '1517791024', null, '1', null);
INSERT INTO `hszt_audit` VALUES ('178', '0', null, '0', '1517812303', null, '1', null);
INSERT INTO `hszt_audit` VALUES ('179', '0', null, '0', '1517812418', null, '1', null);
INSERT INTO `hszt_audit` VALUES ('180', '0', null, '0', '1518102130', null, '1', null);
INSERT INTO `hszt_audit` VALUES ('181', '0', null, '0', '1518102234', null, '1', null);
INSERT INTO `hszt_audit` VALUES ('182', '0', null, '0', '1518102666', null, '1', null);
INSERT INTO `hszt_audit` VALUES ('183', '0', null, '0', '1518102849', null, '1', null);
INSERT INTO `hszt_audit` VALUES ('184', '0', null, '0', '1518103339', null, '1', null);
INSERT INTO `hszt_audit` VALUES ('185', '0', null, '0', '1518117540', null, '1', null);
INSERT INTO `hszt_audit` VALUES ('186', '0', null, '0', '1518141695', null, '1', null);
INSERT INTO `hszt_audit` VALUES ('187', '0', null, '0', '1518167555', null, '1', null);
INSERT INTO `hszt_audit` VALUES ('188', '0', null, '0', '1518227280', null, '1', null);
INSERT INTO `hszt_audit` VALUES ('189', '0', null, '0', '1518247801', null, '1', null);
INSERT INTO `hszt_audit` VALUES ('190', '0', null, '0', '1518247950', null, '1', null);
INSERT INTO `hszt_audit` VALUES ('191', '0', null, '0', '1518314136', null, '1', null);
INSERT INTO `hszt_audit` VALUES ('192', '0', null, '0', '1518314267', null, '1', null);
INSERT INTO `hszt_audit` VALUES ('193', '0', null, '0', '1518342459', null, '1', null);
INSERT INTO `hszt_audit` VALUES ('194', '0', null, '0', '1518508763', null, '1', null);
INSERT INTO `hszt_audit` VALUES ('195', '0', null, '0', '1518531231', null, '1', null);
INSERT INTO `hszt_audit` VALUES ('196', '0', null, '0', '1519650372', null, '1', null);
INSERT INTO `hszt_audit` VALUES ('197', '0', null, '0', '1520216789', null, '1', null);
INSERT INTO `hszt_audit` VALUES ('198', '0', null, '0', '1520216794', null, '1', null);
INSERT INTO `hszt_audit` VALUES ('199', '0', null, '0', '1520216795', null, '1', null);
INSERT INTO `hszt_audit` VALUES ('200', '0', null, '0', '1520216797', null, '1', null);
INSERT INTO `hszt_audit` VALUES ('201', '0', null, '0', '1520427771', null, '1', null);

-- ----------------------------
-- Table structure for `hszt_auth`
-- ----------------------------
DROP TABLE IF EXISTS `hszt_auth`;
CREATE TABLE `hszt_auth` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '编号',
  `title` tinytext,
  `c_time` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT '创建时间',
  `img` text COMMENT '图片',
  `info` text COMMENT '内容',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of hszt_auth
-- ----------------------------
INSERT INTO `hszt_auth` VALUES ('29', '', '2019-09-11 19:15:14', 'a:3:{i:0;s:67:\"http://www.huashizt.com:8080/upload/auth/logo_561e0d696418b-jpg.jpg\";i:1;s:71:\"http://www.huashizt.com:8080/upload/auth/logo_561e0d696418b (1)-jpg.jpg\";i:2;s:67:\"http://www.huashizt.com:8080/upload/auth/logo_561e1861c6227-jpg.jpg\";}', '');

-- ----------------------------
-- Table structure for `hszt_banner`
-- ----------------------------
DROP TABLE IF EXISTS `hszt_banner`;
CREATE TABLE `hszt_banner` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '主键',
  `img` varchar(200) NOT NULL COMMENT '新闻名称',
  `link` varchar(200) DEFAULT NULL COMMENT '链接',
  `c_time` bigint(20) NOT NULL COMMENT '创建时间',
  `creater` int(11) DEFAULT NULL COMMENT '创建人',
  `sort` int(10) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of hszt_banner
-- ----------------------------
INSERT INTO `hszt_banner` VALUES ('4', 'http://aacapi.bchunk.com/6a22741f1a3e7aeb78526bbee1b689ba.png', null, '1515423878', '1', '0');
INSERT INTO `hszt_banner` VALUES ('5', 'http://aacapi.bchunk.com/e887180149dd3d1eed48d86300b7b108.png', null, '1515423878', '1', '0');

-- ----------------------------
-- Table structure for `hszt_caselist`
-- ----------------------------
DROP TABLE IF EXISTS `hszt_caselist`;
CREATE TABLE `hszt_caselist` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '编号',
  `cid` int(11) NOT NULL DEFAULT '0',
  `title` tinytext,
  `img` text,
  `c_time` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT '创建时间',
  `info` text COMMENT '内容',
  `home` int(10) DEFAULT '0' COMMENT 'home',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=39 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of hszt_caselist
-- ----------------------------
INSERT INTO `hszt_caselist` VALUES ('27', '28', '衡水湖湿地生态科普馆展厅', 'http://www.huashizt.com:8080/upload/caselist/1550638734213258 (1)-jpg.jpg', '2019-09-11 20:00:34', '<p class=\"biao\">项目介绍</p><p></p><p><span><span>衡水湖湿地生态科普馆展厅总面积</span>2219<span>平方米，包括序厅、全球湿地、衡水湖湿地、物种基因库、湿地保护、衡水湖场景体验、尾厅七大板块。全球湿地板块设置了内投球互动展项，通过触摸查询，游客可以直接快速的了解世界及中国湿地的分布情况及知识。仿真造景和半景画利用灯光控制系统和音响效果，使游客沉浸在衡水湖四季变化的氛围。</span></span></p><p><img src=\"http://www.thefinders.cn/fj/ueditor/upload/image/20190220/1550638734213258.jpg\"></p><p><br></p>', '0');
INSERT INTO `hszt_caselist` VALUES ('28', '28', '山东小三线纪念馆', 'http://www.huashizt.com:8080/upload/caselist/1542103523351443-jpg.jpg', '2019-09-29 11:42:37', '<p class=\"biao\">项目介绍</p><p></p><p>展馆概况和展馆定位</p><p>&nbsp; 展览依托 709 厂旧址，以“共忆峥嵘岁月，传承三线精神”为主题，从时代背景引入，放眼全国大三线建设、小三线建设，聚焦山东小三线建设，重点展示典型小三线企业的建设历程及社会贡献，再现时代记忆，彰显三线精神，引起观众情感共鸣，打造内容丰富、主题突出、特色鲜明的红色教育基地。</p><p><img src=\"http://www.huashizt.com:8080/upload/caselist/22dcdf3b366b13f69c928658b7cd0094.jpg\" alt=\"http://www.huashizt.com:8080/upload/caselist/22dcdf3b366b13f69c928658b7cd0094.jpg\"><br></p>', '1');
INSERT INTO `hszt_caselist` VALUES ('29', '28', '山东国家电网经研院展厅项目', 'http://www.huashizt.com:8080/upload/caselist/1540450848994824-png.png', '2019-09-12 12:03:43', '<p class=\"biao\">项目介绍</p><p></p><p>国家电网经研院展厅，位于山东济南市，展厅面积350平米。 由我司完成多媒体展示前期策划，软硬件系统集成工作，展厅现已进入试运营阶段。</p><div><img src=\"http://www.huashizt.com:8080/upload/caselist/92cac41fc50efcf820067678a9dedb90.png\" alt=\"http://www.huashizt.com:8080/upload/caselist/92cac41fc50efcf820067678a9dedb90.png\"><br></div>', '0');
INSERT INTO `hszt_caselist` VALUES ('30', '28', '乐学', 'http://www.huashizt.com:8080/upload/caselist/1517802866820644-jpg.jpg', '2019-09-29 11:42:32', '<p><span><span>项目概述：</span></span></p><p><span><span>《乐学迷藏》影院项目以</span>360°环幕投影的方式展现，观众置身于环幕中央，沉浸感十足。</span></p><p><span><span>影片总共分为五个章节，分别是：神秘幽岚山（周口店幽兰山风光展示）、文明起源（周口店北京猿人生活复原）、迷失国度（金中都战争场景和女真文化展示）、美丽新世界（主题乐园、农场与野生动物园展示）、以及梦想中的乐谷（乐学谷新城</span>——乐学小镇展示）。通过这五个篇章来讲述周口店地区的过去、现在与未来。</span></p><p><span><span>影片整体风格应体现游乐性，充满惊喜和趣味，</span>“幽岚精灵”作为主人公进行故事的串联。</span></p><p><span>影片亮点是影像内容与机械模型的结合，影片过程中猛犸象，剑齿虎，远古战车机械模型分别从屏幕中推出、收回的过程，与影片内容配合进行表演。</span></p><p><span><img src=\"http://www.huashizt.com:8080/upload/caselist/79cf3b0bf320cc0c110e9b1e571030c7.jpg\" alt=\"http://www.huashizt.com:8080/upload/caselist/79cf3b0bf320cc0c110e9b1e571030c7.jpg\"><br></span></p>', '1');
INSERT INTO `hszt_caselist` VALUES ('31', '28', '沾化云端大数据中心', 'http://www.huashizt.com:8080/upload/caselist/1511242125682291-jpg.jpg', '2019-09-12 12:05:09', '<p class=\"biao\">项目介绍</p><p></p><p><span>项目名称：沾化云端大数据中心</span></p><p><span>地址：山东省滨州市沾化区</span></p><p><span>&nbsp;</span></p><p><span>苍茫渤海之滨，蓝黄交汇之地。曾创造了欠发达地区崛起新模式的沾化，正站在大数据浪潮的风尖浪头，正以工业化、信息化、城镇化、农业现代化的同步发展，加快融入滨州主城区，打造滨海新城市。</span></p><p><span>&nbsp;&nbsp;<span>整个展厅以大数据展示为主，有超大型地幕弧幕联动、沉浸式空间</span>LED<span>走廊、沉浸式</span><span>VR</span><span>漫游冬枣林、大屏互动联动、蓝牙定位智慧导览等。</span></span></p><p><span><span><br></span></span></p><p><span><span><img src=\"http://www.huashizt.com:8080/upload/caselist/b5c94bf30a7507ab7a1bff4c1c68f14e.jpg\" alt=\"http://www.huashizt.com:8080/upload/caselist/b5c94bf30a7507ab7a1bff4c1c68f14e.jpg\"><br></span></span></p>', '0');
INSERT INTO `hszt_caselist` VALUES ('32', '28', '中国法院博物馆', 'http://www.huashizt.com:8080/upload/caselist/1495449762867870-png.png', '2019-09-29 11:23:47', '<img src=\"http://www.huashizt.com:8080/upload/caselist/3f9edf6ae888f8da364571b4ebbfaa20.png\" alt=\"http://www.huashizt.com:8080/upload/caselist/3f9edf6ae888f8da364571b4ebbfaa20.png\">', '1');
INSERT INTO `hszt_caselist` VALUES ('34', '30', '美女', 'http://www.huashizt.com:8080/upload/caselist/mny1-jpeg.jpeg', '2019-09-12 13:53:00', '<img src=\"http://www.huashizt.com:8080/upload/caselist/bea4bf4ad59d1ab7e43d5829831f7eb2.jpeg\" alt=\"http://www.huashizt.com:8080/upload/caselist/bea4bf4ad59d1ab7e43d5829831f7eb2.jpeg\">', '0');
INSERT INTO `hszt_caselist` VALUES ('35', '29', '奥迪冰雪奇遇临展', 'http://www.huashizt.com:8080/upload/caselist/1500968100860176-jpg.jpg', '2019-09-12 13:32:28', '<p class=\"biao\">项目介绍</p><p></p><p>2016奥迪驾控汇冰雪体验活动在吉林查干湖，成功接待850余位媒体及社会各界嘉<span>宾，奥迪产品的优势在国内市场得到了广泛传播，深受广大消费者欢迎与认可。对</span><span>品牌传播、产品销售起到了巨大的推动作用</span></p><p>&nbsp; 公司承接奥迪展区全部多媒体项目制作</p><p>&nbsp;</p><p><span>《赛道纵横》项目将现场人物抠像与三维汽车模型结合，生成微信小视频，可分享至微信朋友圈。</span></p><p><span><img src=\"http://www.huashizt.com:8080/upload/caselist/e34fb70eedbdf3d4e432a5ccf80bdf19.jpg\" alt=\"http://www.huashizt.com:8080/upload/caselist/e34fb70eedbdf3d4e432a5ccf80bdf19.jpg\"><br></span></p>', '0');
INSERT INTO `hszt_caselist` VALUES ('36', '29', '2014 BMW Mission 3', 'http://www.huashizt.com:8080/upload/caselist/56ab0955ebaec-jpg.jpg', '2019-09-29 11:42:18', '<p class=\"biao\">项目介绍</p><p></p><p><span>&nbsp; &nbsp; &nbsp; &nbsp;创立7年的BMW 3行动已经成为行业内首屈一指的激情盛会。</span></p><p><span>&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;2011年，BMW 3行动终极之旅选择了欧洲，尽情体验纽博格林赛道的驾驭激情、米兰的时尚品位、维也纳的绿色环保和原汁原味的宝马汽车文化；</span></p><p><span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;2012年，遍访西欧奥运名城；</span></p><p><span>&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;2013年，穿越北欧小镇，尽享异国的纵情魅力。</span></p><p><span>&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;而今年，BMW 3行动的巅峰体验将回归赛道，邀民间高手驾驶新一代BMW 3系，去追寻这一传奇系列的荣耀。<br></span></p><p><span>&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;BMW 3系的巨大成功得益于其源于赛道的运动基因，它标志性的工程设计无不彰显赛道精神：和F1赛车相同的后轮驱动方式，可使发动机尽可能地靠后安置，从而实现50∶50前后轴重量分配、短前悬、长发动机罩、驾驶座椅居于车辆重心位置等设计目标，让车辆的前后轮各司其职，在获得更小的转弯半径的同时，实现更大的灵活性、最佳的车辆稳定性及动态性能。而动力组合一向是同级别的标杆，全新BMW 3系的主力车型装备—BMW连获“年度发动机大奖”的4缸2.0L发动机，融合了电子气门控制、高精度直喷和双涡管单涡轮增压3项尖端技术，配合平顺性极佳的8速手自动一体变速箱，赋予了BMW 3系极其敏捷的油门响应、凌厉的加速和卓越的动感。</span></p>', '1');
INSERT INTO `hszt_caselist` VALUES ('37', '29', '时尚旅游金榜晚会-互动墙', 'http://www.huashizt.com:8080/upload/caselist/56ab06c618bdb-jpg.jpg', '2019-09-29 11:23:35', '<p class=\"biao\">项目介绍</p><p></p><p><span>&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;国内最具影响力的旅游媒体、时尚传媒集团旗下《时尚旅游》杂志在2014年11月28日举办了第九届“2014中国旅游金榜”颁奖典礼。活动当天，60余家主流媒体及各大视频网站全程报道。嘉宾阵容包括国内外旅游局、境外国家驻京使馆、国际酒店集团、航空公司、邮轮公司、汽车及快消品行业等近300位代表，此外还有包括赵子琪、杨恭如、高云翔、童蕾、于小彤、车永莉、许飞、tasty组合、陈一玲、好妹妹乐队等阵容可观的国内外大牌演艺明星到场助阵。</span></p><p><span>&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;我公司承接制作其中多媒体大屏互动墙面软件，以及其集成服务，受到杂志高层领导及参与观众的高度好评。</span></p>', '1');
INSERT INTO `hszt_caselist` VALUES ('38', '30', '长春测绘局平台汇报片', 'http://www.huashizt.com:8080/upload/caselist/59351f8a81d65-jpg.jpg', '2019-09-29 11:23:23', '<p class=\"biao\">项目介绍</p><p></p><p><span><span>项目背景</span></span><span>：</span><span><span>长春市测绘局新研发的</span>“长春市多合一综合信息平台</span><span>”</span><span>需要通过影片的形式在一次重要会议中向市长汇报。</span></p><p><span><span>项目简介</span></span><span>：</span><span><span>影片通过二维动画和特效包装的形式，展现</span>“长春多合一综合信息平台”各个模块的功能以及在各个部门中发挥的重要作用。相比传统平面化PPT，影片的形式更加直观，生动，易懂。影片最终效果也得到领导认可!</span></p><div><span><br></span></div>', '1');

-- ----------------------------
-- Table structure for `hszt_categrouy`
-- ----------------------------
DROP TABLE IF EXISTS `hszt_categrouy`;
CREATE TABLE `hszt_categrouy` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '编号',
  `title` tinytext,
  `img` text,
  `c_time` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT '创建时间',
  `info` text COMMENT '内容',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of hszt_categrouy
-- ----------------------------
INSERT INTO `hszt_categrouy` VALUES ('28', '数字展厅', 'http://www.huashizt.com:8080/upload/categrouy/logo_561e15169a129-jpg.jpg', '2019-09-11 11:04:14', '将创意艺术设计与数字展示技术相融合，以体验为切入点，采用先进的数字展示技术，打造极具艺术感染力与互动科技性的展厅，开启一场生动震撼的数字艺术互动之旅。');
INSERT INTO `hszt_categrouy` VALUES ('29', '临展活动', 'http://www.huashizt.com:8080/upload/categrouy/logo_561e2bab3531b-jpg.jpg', '2019-09-11 11:05:04', '发展主营业务（数字展厅）的同时，积极开发数字多媒体技术在临展活动中的应用，在许多品牌服务的过程中，得到客户的一致好评。');
INSERT INTO `hszt_categrouy` VALUES ('30', '影视制作', 'http://www.huashizt.com:8080/upload/categrouy/logo_561e1521d6889-jpg.jpg', '2019-09-11 11:05:30', '多年服务于展览展示行业，将数字影视内容制作合理融入数字展厅，以设计师的意图为出发点，打造极具艺术感染力的数字影片。');

-- ----------------------------
-- Table structure for `hszt_contact`
-- ----------------------------
DROP TABLE IF EXISTS `hszt_contact`;
CREATE TABLE `hszt_contact` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '编号',
  `name` tinytext,
  `address` tinytext,
  `tel` tinytext,
  `email` tinytext,
  `c_time` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT '创建时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=37 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of hszt_contact
-- ----------------------------
INSERT INTO `hszt_contact` VALUES ('36', '华视中天', '北京市怀柔区喇叭沟门满族乡喇叭沟门村16号117室', '400-650-3559', 'hszt@qq.com', '2019-09-07 09:37:46');

-- ----------------------------
-- Table structure for `hszt_friend`
-- ----------------------------
DROP TABLE IF EXISTS `hszt_friend`;
CREATE TABLE `hszt_friend` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '编号',
  `uid` int(10) DEFAULT '0' COMMENT '用户关注',
  `title` text NOT NULL COMMENT '标题',
  `desc` text COMMENT '描述',
  `info` text COMMENT '内容',
  `c_time` bigint(12) NOT NULL DEFAULT '0' COMMENT '创建时间',
  `u_time` bigint(12) DEFAULT '0' COMMENT '修改时间',
  `uname` varchar(255) DEFAULT '' COMMENT '操作人',
  `follow` tinyint(10) DEFAULT '0' COMMENT '关注',
  `laud` tinyint(10) DEFAULT '0' COMMENT '点赞',
  `step` tinyint(10) DEFAULT '0' COMMENT '点赞',
  `forward` tinyint(10) DEFAULT '0' COMMENT '转发',
  `watch` tinyint(10) DEFAULT '0' COMMENT '观看过的人数',
  `ip` char(15) DEFAULT '0' COMMENT 'ip',
  `verify` tinyint(10) DEFAULT '0' COMMENT '后台管理员审核',
  `admin` varchar(255) DEFAULT '' COMMENT '后台审核操作用户',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=104 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of hszt_friend
-- ----------------------------
INSERT INTO `hszt_friend` VALUES ('92', '0', '国产电磁炮畅游长江，登上055为期不远？美军无奈祭出激光武器', '最近西亚强国土耳其公开了本国最新的电磁炮，备受关注。据介绍，其弹丸质量为1千克，射程超过50公里，炮口动能10兆焦耳。纸面数据相当不错，且已实现车载，某种程度上甚至快赶上美国。', '不过与我国相比土耳其还是逊色得多，我国电磁炮已登上现役军舰进行测试，目前主要在072型“海洋山”号坦克登陆舰上进行。早前“海洋山”号已进行过多次测试，最近又有网友发现它现身长江，且貌似远赴外海部署，很有可能是一次大型试射任务。我国在电磁炮领域成果卓越，美俄土等国的电磁炮都未达到我国的实验进度。即便如此，我国最新的055大驱上使用的依旧是一门130mm传统舰炮。要想让电磁炮登上055这样的主力舰艇还要解决很多技术难题，例如综合电力供应、储电、超级电容闪充 以及材料消耗等。目前我国电磁炮即将向25千克弹丸挑战，炮管寿命也达到了400次，这些成就都令人备受鼓舞。预计2023年国产电磁炮将完成测试，届时这种划时代兵器会正式粉墨登场。', '1555462941', '0', 'admin', '0', '0', '0', '0', '0', '183.198.25.106', '0', '');
INSERT INTO `hszt_friend` VALUES ('93', '0', '刺激战场：3条压枪小技巧，学会二次开火，每天都能吃鸡！', '在刺激战场中，玩家们最头疼的就是枪支的后坐力，尤其是刚落地找不到配件而恰巧又捡了一把不会使的AKM，可以说看着敌人近在眼前却又打不到的那种无力感真的是刻骨铭心，眼睁睁的就看着枪口飘到天上去了。今天大鱼兄就给大家讲一下压枪的一些技巧。', '首先，枪支的后坐力分为两种，一种是垂直后坐力，另一种是水平后坐力。垂直后坐力比较简单，就是射击后枪口向上方跳动，这时候玩家只要缓慢向下滑动准星多加练习就可以很大程度上解决垂直后坐力的问题。但是要注意不同枪支后坐力不同，要视使用的枪支来决定准星向下滑动幅度。另外一种后坐力就是水平后坐力，水平后坐力是不可避免也是无法预测的，因为水平后坐力不像垂直后坐力一样是一直向上而是左右晃动，因此即使是职业选手也无法做到很好的消除水平后坐力，不过他们会利用一些射击技巧来解决水平后坐力的问题。', '1555463024', '0', 'admin', '0', '0', '0', '0', '0', '183.198.25.106', '0', '');
INSERT INTO `hszt_friend` VALUES ('94', '0', '越南最先进战舰赴华受阅 是重视还是展示实力？还翻不起大浪', '距离4月23日中国海军节越来越近了，不少国家都已经确认派遣舰队出席。近日外媒报道，越南将要派出两艘最新型护卫舰，即015陈兴道号以及011丁先皇号，这两艘最新型军舰4月14号从越南最大海军基地出发，前来参加中国这一盛事。别看才两艘，但这已经是越南海军的一半阵容了。那么，越南海军派出如此先进的军舰参阅，到底有何考量呢？', '这次接受中国邀请前来中国参阅的猎豹3.9级护卫舰排水量为2100吨，主要装备8枚射程为130公里的“天王星-E”反舰导弹，1座“棕榈树”弹炮结合防空系统，其主要作战任务是搜索、跟踪和打击海空中目标，虽然属于轻型护卫舰，但具有航速快、续航和隐身能力强、火力强等诸多优点，很适合越南的海上防御作战。', '1555463104', '0', 'admin', '0', '0', '0', '0', '0', '183.198.25.106', '0', '');
INSERT INTO `hszt_friend` VALUES ('95', '0', '叙利亚老虎师总部遭空袭，F35证明自身实力，S300导弹拦截失败', '据以色列媒体4月14日报道，以色列空军于当地时间13日凌晨对叙利亚境内再次发动了空中打击，而此次以军出动的战机除了F-15和F-16之外，该国最先进的F-35战机也再次参战，据悉在之前的空袭中，俄苏-57隐形战斗机突然在叙利亚现身，使得以色列F-35战机措手不及，因此一度在叙利亚的上空销声匿迹，近期苏-57战机完成第二轮测试后返回国内，F-35也没有了后顾之忧，尤其是不久之前日本F-35A战机坠毁，使得美盟友对这款战机的性能产生较大质疑，因此美国方面此次特批F-35战机参战，也是为了证明自身的实力。', '据报道，当地时间13日凌晨，以色列F-35战机隐蔽从叙利亚西部的地中海接近，然后对部署有S-300防空导弹的叙利亚重镇马萨夫发动了突然空袭，据称在此次轰炸中，叙头号部队老虎师的总部也遭到了打击，但是损失情况暂时不明，与此同时马萨夫当地的军方仓库也遭到了轰炸，造成了多名叙军伤亡，此外以色列军方声称还炸毁了当地伊朗一座弹道导弹工厂，但是并未得到证实。', '1555463177', '0', 'admin', '0', '0', '0', '0', '0', '183.198.25.106', '0', '');
INSERT INTO `hszt_friend` VALUES ('96', '0', '郑秀文疑回应许志安出轨，将账号封面改黑色，引好友担心抑郁复发', '4月16日，许志安出轨黄心颖的消息席卷了整个娱乐圈，人们除了声讨痛斥许志安和黄心颖双双出轨之外，更多的能做的就是心疼郑秀文和马国明了。粉丝们都开始唏嘘了：我们还能相信爱情吗？', '16日晚上7点钟，许志安痛哭流涕道歉开记者会，更是不断说对不起郑秀文。称自己将暂停娱乐圈事业，直到找到真正的自己为止。在记者会上许志安不断的鞠躬道歉，不断的说对不起家人，对不起郑秀文，也是令人有点惋惜他们二十几年的爱情。', '1555463245', '0', 'admin', '0', '0', '0', '0', '0', '183.198.25.106', '1', '');
INSERT INTO `hszt_friend` VALUES ('97', '5', '杨紫被曝在机场被粉丝砸！因粉丝接机引发争议的明星都有谁？', '近日，网曝杨紫在机场被粉丝拿花砸到了脖子，还因为现场秩序混乱，杨紫的鞋也被踩掉了。今天上午，杨紫工作室回应网传杨紫在机场被粉丝砸，呼吁粉丝们在机场、车站等公共场合以安全为主。', '在娱乐圈中，接机现象是一件很正常的事情，无数粉丝纷纷在机场门口等待喜爱的明星，将路堵得水泄不通，但这也严重地影响到了机场秩序，妨碍他人出入，影响他人正常登机，甚至是危害到人身安全。有知情人士透露，很多 \\\" 粉丝 \\\" 都是用钱请来的群众演员，是用来提高名气的。因此，很多人都表示极度的不满。下面我们就一起来盘点因粉丝接机引发争议的八大明星，看看都有谁？你最同情谁？', '1555463324', '0', 'admin', '6', '2', '1', '0', '0', '183.198.25.106', '1', '');
INSERT INTO `hszt_friend` VALUES ('101', '0', '阵风战机即将到货，印飞行员得知一情报后拒驾机，6000亿或打水漂', '阵风战机即将到货，印飞行员得知一情报后拒驾机，6000亿或打水漂', '阵风战机即将到货，印飞行员得知一情报后拒驾机，6000亿或打水漂', '1555567559', '0', '', '0', '0', '0', '0', '0', '183.198.25.106', '1', '');
INSERT INTO `hszt_friend` VALUES ('102', '0', '阵风战机即将到货，印飞行员得知一情报后拒驾机，6000亿或打水漂', '阵风战机即将到货，印飞行员得知一情报后拒驾机，6000亿或打水漂', '阵风战机即将到货，印飞行员得知一情报后拒驾机，6000亿或打水漂', '1555567606', '0', 'jake', '0', '0', '0', '0', '0', '183.198.25.106', '1', '');
INSERT INTO `hszt_friend` VALUES ('103', '0', '阵风战机即将到货，印飞行员得知一情报后拒驾机，6000亿或打水漂', '阵风战机即将到货，印飞行员得知一情报后拒驾机，6000亿或打水漂', '阵风战机即将到货，印飞行员得知一情报后拒驾机，6000亿或打水漂', '1555567817', '0', 'jake', '0', '0', '0', '0', '0', '183.198.25.106', '1', '');

-- ----------------------------
-- Table structure for `hszt_global`
-- ----------------------------
DROP TABLE IF EXISTS `hszt_global`;
CREATE TABLE `hszt_global` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `permission` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of hszt_global
-- ----------------------------
INSERT INTO `hszt_global` VALUES ('1', 'a:4:{s:16:\"is_administortar\";s:1:\"1\";s:15:\"publish_product\";s:1:\"1\";s:12:\"edit_product\";s:1:\"1\";s:14:\"delete_product\";s:1:\"1\";}');

-- ----------------------------
-- Table structure for `hszt_hardware`
-- ----------------------------
DROP TABLE IF EXISTS `hszt_hardware`;
CREATE TABLE `hszt_hardware` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '编号',
  `name` varchar(25) DEFAULT NULL COMMENT '名称',
  `title` varchar(50) DEFAULT NULL COMMENT '标题',
  `keywords` varchar(100) DEFAULT NULL COMMENT '关键字',
  `icon` varchar(100) DEFAULT NULL COMMENT '缩略图',
  `content` text COMMENT '文章内容',
  `status` tinyint(2) unsigned NOT NULL DEFAULT '2' COMMENT '文章状态：0-编辑中；1-审核中；2-审核通过（发布）；3-审核不通过 4-删除',
  `nstatus` tinyint(2) unsigned DEFAULT '2' COMMENT '公告显示状态：0不显示；1显示',
  `count` int(10) unsigned DEFAULT '0' COMMENT '阅读量',
  `c_time` bigint(12) DEFAULT NULL COMMENT '创建时间',
  `u_time` bigint(12) DEFAULT NULL COMMENT '修改时间',
  `v_time` bigint(12) DEFAULT NULL COMMENT '审核时间',
  `creater` int(11) DEFAULT NULL COMMENT '创建人',
  `modifyer` int(11) DEFAULT NULL COMMENT '修改人',
  `verifyer` int(11) DEFAULT NULL COMMENT '审核人',
  `static_url` varchar(200) DEFAULT NULL COMMENT '静态url',
  `taobao_url` varchar(200) DEFAULT NULL COMMENT '淘宝url',
  `smt_url` varchar(200) DEFAULT NULL,
  `jd_url` varchar(200) DEFAULT NULL COMMENT '京东url',
  `p_id` int(11) DEFAULT NULL COMMENT '项目id',
  `level` int(11) DEFAULT '0' COMMENT '显示等级',
  `price` int(9) DEFAULT '0' COMMENT '价格',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of hszt_hardware
-- ----------------------------

-- ----------------------------
-- Table structure for `hszt_homeimg`
-- ----------------------------
DROP TABLE IF EXISTS `hszt_homeimg`;
CREATE TABLE `hszt_homeimg` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '编号',
  `title` tinytext,
  `c_time` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT '创建时间',
  `info` text COMMENT '图片',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=57 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of hszt_homeimg
-- ----------------------------
INSERT INTO `hszt_homeimg` VALUES ('50', null, '2019-09-29 10:57:52', 'http://www.huashizt.com:8080/upload/homeimg/575516f09a3b2-jpg.jpg');
INSERT INTO `hszt_homeimg` VALUES ('51', null, '2019-09-29 10:57:52', 'http://www.huashizt.com:8080/upload/homeimg/575516fb8e812-jpg.jpg');
INSERT INTO `hszt_homeimg` VALUES ('52', null, '2019-09-29 10:57:52', 'http://www.huashizt.com:8080/upload/homeimg/56e95a27584f1-jpg.jpg');
INSERT INTO `hszt_homeimg` VALUES ('53', null, '2019-09-29 17:05:33', 'http://www.huashizt.com:8080/upload/homeimg/55cdae0cb854b-jpg.jpg');
INSERT INTO `hszt_homeimg` VALUES ('54', null, '2019-09-29 17:05:33', 'http://www.huashizt.com:8080/upload/homeimg/55cdadbb48d5f-jpg.jpg');
INSERT INTO `hszt_homeimg` VALUES ('55', null, '2019-09-29 17:05:33', 'http://www.huashizt.com:8080/upload/homeimg/55cdae4e0220e-jpg.jpg');
INSERT INTO `hszt_homeimg` VALUES ('56', null, '2019-09-29 17:05:33', 'http://www.huashizt.com:8080/upload/homeimg/55cdadd1c338c-jpg.jpg');

-- ----------------------------
-- Table structure for `hszt_info`
-- ----------------------------
DROP TABLE IF EXISTS `hszt_info`;
CREATE TABLE `hszt_info` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '编号',
  `title` tinytext,
  `c_time` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT '创建时间',
  `info` text COMMENT '图片',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of hszt_info
-- ----------------------------

-- ----------------------------
-- Table structure for `hszt_link`
-- ----------------------------
DROP TABLE IF EXISTS `hszt_link`;
CREATE TABLE `hszt_link` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '编号',
  `link` text,
  `c_time` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT '创建时间',
  `img` text COMMENT '图片',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=55 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of hszt_link
-- ----------------------------
INSERT INTO `hszt_link` VALUES ('51', 'http://www.avic.com.cn/', '2019-09-29 18:01:40', 'http://www.huashizt.com:8080/upload/link/55cdadbb48d5f.jpg');
INSERT INTO `hszt_link` VALUES ('52', 'http://tv.cctv.com', '2019-09-29 18:01:40', 'http://www.huashizt.com:8080/upload/link/55cdadd1c338c.jpg');
INSERT INTO `hszt_link` VALUES ('53', 'http://www.chinapost.com.cn/', '2019-09-29 18:01:40', 'http://www.huashizt.com:8080/upload/link/55cdae0cb854b.jpg');
INSERT INTO `hszt_link` VALUES ('54', 'http://www.nlc.gov.cn/', '2019-09-29 18:01:40', 'http://www.huashizt.com:8080/upload/link/55cdae4e0220e.jpg');

-- ----------------------------
-- Table structure for `hszt_media`
-- ----------------------------
DROP TABLE IF EXISTS `hszt_media`;
CREATE TABLE `hszt_media` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '编号',
  `title` tinytext,
  `desc` tinytext,
  `img` text,
  `info` text,
  `c_time` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT '创建时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of hszt_media
-- ----------------------------
INSERT INTO `hszt_media` VALUES ('30', 'AR增强现实AUGMENTED REALITY', '增强现实也被称为混合现实，是一个相对来说较新的研究领域，它属于虚拟现实的一个分支。', 'http://www.huashizt.com:8080/upload/media/mny1-jpeg.jpeg', '<p style=\"text-align: justify;\"><span>增强现实也被称为混合现实，是一个相对来说较新的研究领域，它属于虚拟现实的一个分支。</span></p><p style=\"text-align: justify;\"><span>增强现实系统是利用附加的图形或文字信息，对周围真实世界的场景动态地进行增强。在增强现实的环境中，使用者可以在看到周围真实环境的同时，看到计算机产生的增强信息。这种增强的信息可以是在真实环境中与真实环境共存的虚拟物体，也可以是关于存在的真实物体的某种信息。</span></p><p style=\"text-align: justify;\"><span><span>增强现实展项特点主要包含两方面：实现虚拟事物和真实环境的结合，让真实世界和虚拟物体共存；</span><span>实现虚拟世界和真实世界的实时同步，满足用户在现实世界中真实地感受虚拟空间中模拟的事物，增强使用的趣味性和互动性。</span></span></p>', '2019-09-09 17:44:52');
INSERT INTO `hszt_media` VALUES ('31', 'RFID射频识别技术', '无线射频识别技术是一种非接触式的自动识别技术，它通过射频信号自动识别目标对象并获取相关数据，识别工作无须人工干预，作为条形码的无线版本，无线射频识别技术具有条形码所不具备', 'http://www.huashizt.com:8080/upload/media/j15-jpeg.jpeg', '<p><span>Radio Frequency Identification，直译“无线射频识别”，简称“​RFID”，是一种通信技术，可通过无线电讯号识别特定目标并读写相关数据，而不需要识别系统与特定目标之间建立机械或光学接触。</span></p>', '2019-09-12 15:12:39');

-- ----------------------------
-- Table structure for `hszt_menu`
-- ----------------------------
DROP TABLE IF EXISTS `hszt_menu`;
CREATE TABLE `hszt_menu` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '编号',
  `name` varchar(20) DEFAULT NULL COMMENT '名称（翻译）',
  `icon` varchar(50) DEFAULT NULL COMMENT '图标',
  `url` varchar(100) DEFAULT NULL COMMENT '路径',
  `p_id` int(9) NOT NULL COMMENT '父id',
  `level` int(11) DEFAULT NULL COMMENT '显示等级',
  `c_time` bigint(12) DEFAULT NULL COMMENT '创建时间',
  `uid` int(11) DEFAULT NULL COMMENT '创建人',
  `role` int(11) DEFAULT '0' COMMENT '权限 0是用户',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=38 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of hszt_menu
-- ----------------------------
INSERT INTO `hszt_menu` VALUES ('1', '主页', 'zmdi zmdi-home zmdi-hc-fw', '/admin/dashboard?menuid=1', '0', '0', null, '1', '0');
INSERT INTO `hszt_menu` VALUES ('2', '用户信息', null, '/admin/userinfo?menuid=2', '3', '1', null, '1', '9');
INSERT INTO `hszt_menu` VALUES ('3', '用户与权限管理', 'zmdi zmdi-accounts zmdi-hc-fw', '', '0', '1', null, '1', '9');
INSERT INTO `hszt_menu` VALUES ('4', '角色权限', null, '/admin/roleinfo?menuid=4', '3', '2', null, '1', '9');
INSERT INTO `hszt_menu` VALUES ('5', '活动管理', 'zmdi zmdi-favorite zmdi-hc-fw', '', '0', '2', null, '1', '9');
INSERT INTO `hszt_menu` VALUES ('6', '投票项目', null, '/admin/vote?menuid=6', '5', '1', null, '1', '9');
INSERT INTO `hszt_menu` VALUES ('7', '投票子项', null, '/admin/voteitem?menuid=7', '5', '2', null, '1', '9');
INSERT INTO `hszt_menu` VALUES ('8', '内容编辑', 'zmdi zmdi-collection-text zmdi-hc-fw', '', '0', '3', null, '1', '9');
INSERT INTO `hszt_menu` VALUES ('9', '新闻分类', null, '/admin/article?menuid=9', '8', '0', null, '1', '0');
INSERT INTO `hszt_menu` VALUES ('10', '新闻内容', null, '/admin/articleinfo?menuid=10', '8', '1', null, '1', '0');
INSERT INTO `hszt_menu` VALUES ('11', '成功案例', null, '/admin/success?menuid=11', '8', '2', null, '1', '3');
INSERT INTO `hszt_menu` VALUES ('12', '硬件产品', null, '/admin/hardware?menuid=18', '8', '3', null, '1', '3');
INSERT INTO `hszt_menu` VALUES ('13', 'Email管理', 'zmdi zmdi-favorite zmdi-hc-fw', '/admin/email?menuid=13', '0', '4', null, '1', '9');
INSERT INTO `hszt_menu` VALUES ('14', '区块链新闻公告', 'zmdi zmdi-collection-text zmdi-hc-fw', '', '0', '5', null, '1', '9');
INSERT INTO `hszt_menu` VALUES ('15', '公告管理', null, '/admin/zhaac?menuid=15', '14', '1', null, '1', '0');
INSERT INTO `hszt_menu` VALUES ('16', '钱包地址管理', 'zmdi zmdi-collection-text zmdi-hc-fw', null, '0', '8', null, '1', '0');
INSERT INTO `hszt_menu` VALUES ('17', '钱包记录', null, '/admin/aacmoney?menuid=22', '16', '1', null, '1', '0');
INSERT INTO `hszt_menu` VALUES ('19', '评论管理', 'zmdi zmdi-collection-text zmdi-hc-fw', null, '0', '7', null, '1', '9');
INSERT INTO `hszt_menu` VALUES ('20', '中文评论管理', null, '/admin/zhcomment?menuid=18', '19', '1', null, '1', '0');
INSERT INTO `hszt_menu` VALUES ('21', '英文评论管理', null, '/admin/encomment?menuid=19', '19', '2', null, '1', '0');
INSERT INTO `hszt_menu` VALUES ('22', '用户管理', 'zmdi zmdi-favorite zmdi-hc-fw', '/admin/register?menuid=22', '0', '8', '1', null, '0');
INSERT INTO `hszt_menu` VALUES ('25', '外部新闻管理', 'zmdi zmdi-home zmdi-hc-fw', '', '0', '12', null, '1', '9');
INSERT INTO `hszt_menu` VALUES ('26', '货币管理', 'zmdi zmdi-favorite zmdi-hc-fw', null, '0', '11', null, '1', '0');
INSERT INTO `hszt_menu` VALUES ('27', '货币类型', null, '/admin/currency?menuid=27', '26', '1', null, '1', '9');
INSERT INTO `hszt_menu` VALUES ('28', '订单管理', 'zmdi zmdi-favorite zmdi-hc-fw', null, '0', '12', null, '1', '0');
INSERT INTO `hszt_menu` VALUES ('29', '订单信息', null, '/admin/order?menuid=28', '28', '1', null, '1', '9');
INSERT INTO `hszt_menu` VALUES ('30', '产品管理', null, '/admin/setting?menuid=30', '34', '1', null, '1', '9');
INSERT INTO `hszt_menu` VALUES ('31', '广告管理', null, '/admin/banner?menuid=31', '34', '2', null, '1', '9');
INSERT INTO `hszt_menu` VALUES ('32', '最新动态', null, '/admin/newcomment?menuid=29', '25', '3', null, '1', '9');
INSERT INTO `hszt_menu` VALUES ('33', '最新活动', null, '/admin/linkimg?menuid=33', '25', '5', null, '1', '9');
INSERT INTO `hszt_menu` VALUES ('34', '全局设置', 'zmdi zmdi-home zmdi-hc-fw', null, '0', '2', null, '1', '9');
INSERT INTO `hszt_menu` VALUES ('35', 'Banner', null, '/admin/linkbanner?menuid=35', '25', '5', null, '1', '9');
INSERT INTO `hszt_menu` VALUES ('36', '邮件群发', null, '/admin/groupemail?menuid=36', '34', '3', null, '1', '9');
INSERT INTO `hszt_menu` VALUES ('37', '转账日志', null, '/admin/aaclog?menuid=37', '28', '2', null, '1', '9');

-- ----------------------------
-- Table structure for `hszt_newgroy`
-- ----------------------------
DROP TABLE IF EXISTS `hszt_newgroy`;
CREATE TABLE `hszt_newgroy` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '编号',
  `title` tinytext,
  `c_time` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT '创建时间',
  `info` text COMMENT '内容',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of hszt_newgroy
-- ----------------------------
INSERT INTO `hszt_newgroy` VALUES ('31', '公司新闻', '2019-09-12 23:14:20', '公司新闻');
INSERT INTO `hszt_newgroy` VALUES ('32', '行业新闻', '2019-09-12 23:14:53', '行业新闻');
INSERT INTO `hszt_newgroy` VALUES ('33', '新技术', '2019-09-12 23:15:22', '新技术');

-- ----------------------------
-- Table structure for `hszt_newlist`
-- ----------------------------
DROP TABLE IF EXISTS `hszt_newlist`;
CREATE TABLE `hszt_newlist` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '编号',
  `cid` int(11) NOT NULL DEFAULT '0',
  `title` tinytext,
  `home` int(10) DEFAULT '0' COMMENT '推荐',
  `img` text,
  `c_time` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT '创建时间',
  `info` text COMMENT '内容',
  `desc` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=43 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of hszt_newlist
-- ----------------------------
INSERT INTO `hszt_newlist` VALUES ('39', '32', '联想创新展示中心（新闻篇）', '0', 'http://www.huashizt.com:8080/upload/newlist/1568272361876543-jpeg.jpeg', '2019-09-29 12:05:52', '<p style=\"text-align: center;\"><img src=\"http://www.huashizt.com:8080/upload/newlist/10cc445eeb6ecf62a65d44c238d9c416.jpeg\" alt=\"http://www.huashizt.com:8080/upload/newlist/10cc445eeb6ecf62a65d44c238d9c416.jpeg\"></p>', '如果在工厂，通过HoloLens就能看到无人机、机器人等各种零部件实时匹配部不和谐的爆炸视图，那么，以后工厂的品控部门、评测机构以及各种DIY团队，还会有多大的存在价值?');
INSERT INTO `hszt_newlist` VALUES ('40', '31', '国家图书馆建馆110周年展', '0', 'http://www.huashizt.com:8080/upload/newlist/1568272529170360-jpg.jpg', '2019-09-29 12:05:42', '<img src=\"http://www.huashizt.com:8080/upload/newlist/7646cc668aaa9643c5f0c7a64e372877.jpg\" alt=\"http://www.huashizt.com:8080/upload/newlist/7646cc668aaa9643c5f0c7a64e372877.jpg\">', '如果在工厂，通过HoloLens就能看到无人机、机器人等各种零部件实时匹配部不和谐的爆炸视图，那么，以后工厂的品控部门、评测机构以及各种DIY团队，还会有多大的存在价值?');
INSERT INTO `hszt_newlist` VALUES ('41', '33', 'AR，VR，MR：今天咱们说MR，我司开放现场体验', '1', 'http://www.huashizt.com:8080/upload/newlist/1494427550398039-png.png', '2019-09-29 12:05:26', '<p>如果在工厂，通过HoloLens就能看到无人机、机器人等各种零部件实时匹配部不和谐的爆炸视图，那么，以后工厂的品控部门、评测机构以及各种DIY团队，还会有多大的存在价值?</p><p><br></p><p>Mixed reality with HoloLens</p><p class=\"c-paragraph-3\">Mixed reality brings people, places, and objects from your physical and digital worlds together. This blended environment becomes your canvas, where you can create and enjoy a wide range of experiences. Drag your mouse cursor over the image below to explore the galaxy.</p><p class=\"c-paragraph-3\"><img src=\"http://www.huashizt.com:8080/upload/newlist/3946d676ff041e103f90b25aaaaa65a6.png\" alt=\"http://www.huashizt.com:8080/upload/newlist/3946d676ff041e103f90b25aaaaa65a6.png\"><br></p>', '如果在工厂，通过HoloLens就能看到无人机、机器人等各种零部件实时匹配部不和谐的爆炸视图，那么，以后工厂的品控部门、评测机构以及各种DIY团队，还会有多大的存在价值?');

-- ----------------------------
-- Table structure for `hszt_news`
-- ----------------------------
DROP TABLE IF EXISTS `hszt_news`;
CREATE TABLE `hszt_news` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '编号',
  `title` tinytext,
  `home` int(10) DEFAULT '0' COMMENT '推荐',
  `desc` tinytext,
  `c_time` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT '创建时间',
  `info` text COMMENT '内容',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=40 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of hszt_news
-- ----------------------------
INSERT INTO `hszt_news` VALUES ('39', '西路军古浪战役纪念馆', '0', '', '2019-09-07 10:27:21', '<p class=\"biao\">项目介绍</p><p></p><p><span microsoft=\"\" stheiti=\"\" font-size:=\"\" letter-spacing:=\"\" text-indent:=\"\">红军西路军古浪战役纪念馆位于古浪县城西南角，占地面积8万多平方米，被列入“全国红色旅游经典景区一期名录”，属华夏文明传承创新区“红色文化弘扬”板块西路军“一综十二专”纪念馆之一，是甘肃省省级爱国主义教育基地，甘肃省中共党中央教育基地，武威市国防教育基地，爱国主义教育基地，国家AA级旅游景区。</span></p><p><span microsoft=\"\" stheiti=\"\" font-size:=\"\" letter-spacing:=\"\" text-indent:=\"\">&nbsp; 我司于2015年完成展厅内多媒体展项，包括：多通道沉浸式投影，触摸屏等。</span></p><p><span microsoft=\"\" stheiti=\"\" font-size:=\"\" letter-spacing:=\"\" text-indent:=\"\">下图为多通道投影影片截图</span></p>');

-- ----------------------------
-- Table structure for `hszt_project`
-- ----------------------------
DROP TABLE IF EXISTS `hszt_project`;
CREATE TABLE `hszt_project` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '编号',
  `title` tinytext,
  `c_time` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT '创建时间',
  `img` text COMMENT '图片',
  `info` text COMMENT '内容',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of hszt_project
-- ----------------------------
INSERT INTO `hszt_project` VALUES ('28', '', '2019-09-11 19:21:02', 'a:3:{i:0;s:70:\"http://www.huashizt.com:8080/upload/project/logo_561e0cb59a252-jpg.jpg\";i:1;s:70:\"http://www.huashizt.com:8080/upload/project/logo_561e15169a129-jpg.jpg\";i:2;s:65:\"http://www.huashizt.com:8080/upload/project/57551f9acf286-jpg.jpg\";}', '');

-- ----------------------------
-- Table structure for `hszt_setting`
-- ----------------------------
DROP TABLE IF EXISTS `hszt_setting`;
CREATE TABLE `hszt_setting` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '主键编号',
  `name` varchar(200) NOT NULL COMMENT '订单号',
  `text` varchar(200) NOT NULL COMMENT '配送方式',
  `options` varchar(200) NOT NULL COMMENT '物流公司',
  `c_time` bigint(20) NOT NULL COMMENT '创建时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of hszt_setting
-- ----------------------------
INSERT INTO `hszt_setting` VALUES ('4', 'quantity', '0', 'product', '1518320385');

-- ----------------------------
-- Table structure for `hszt_technology`
-- ----------------------------
DROP TABLE IF EXISTS `hszt_technology`;
CREATE TABLE `hszt_technology` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '编号',
  `title` tinytext,
  `c_time` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT '创建时间',
  `img` text COMMENT '图片',
  `info` text COMMENT '内容',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of hszt_technology
-- ----------------------------
INSERT INTO `hszt_technology` VALUES ('29', '', '2019-09-11 19:20:20', 'a:1:{i:0;s:71:\"http://www.huashizt.com:8080/upload/technology/1464243094748668-jpg.jpg\";}', '');

-- ----------------------------
-- Table structure for `hszt_user`
-- ----------------------------
DROP TABLE IF EXISTS `hszt_user`;
CREATE TABLE `hszt_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '编号',
  `login` varchar(11) DEFAULT NULL COMMENT '登录账号',
  `password` varchar(50) DEFAULT NULL COMMENT '密码',
  `c_time` bigint(20) DEFAULT NULL COMMENT '创建时间',
  `status` int(2) DEFAULT NULL COMMENT '状态',
  `access_token` varchar(100) DEFAULT NULL COMMENT 'api token',
  `role` tinyint(3) DEFAULT NULL,
  `salt` varchar(64) DEFAULT NULL COMMENT '盐',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of hszt_user
-- ----------------------------
INSERT INTO `hszt_user` VALUES ('1', 'admin', '8b589d7013317fd7cfae14d3a17e5dea78534e52', '1505716073', '0', null, '9', 'bdavgk');
INSERT INTO `hszt_user` VALUES ('5', 'liyue', '0d70d7e9c2967647a15cf39b543a5d84d3faee8b', null, '0', null, '9', 'itixjf');
INSERT INTO `hszt_user` VALUES ('6', 'liguiqiao', '54616aa853d26a3cee54bf7550316092c5ed6349', null, '0', null, '9', 'fypogg');
