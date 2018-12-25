/*
 Navicat Premium Data Transfer

 Source Server         : localhost
 Source Server Type    : MySQL
 Source Server Version : 50617
 Source Host           : localhost:3306
 Source Schema         : sayyas_new

 Target Server Type    : MySQL
 Target Server Version : 50617
 File Encoding         : 65001

 Date: 25/12/2018 18:01:06
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for db_business
-- ----------------------------
DROP TABLE IF EXISTS `db_business`;
CREATE TABLE `db_business`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `village_id` int(11) NOT NULL COMMENT '报备的项目地址编号（小区）',
  `house_id` varchar(30) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL COMMENT '门牌号',
  `saleman_id` varchar(32) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL COMMENT '跟踪人员',
  `customer_id` int(11) NOT NULL COMMENT '客户',
  `status` int(1) DEFAULT 0 COMMENT '状态，状态变为1时将转为项目',
  `reason` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '失败原因',
  `star` int(5) DEFAULT 1 COMMENT '签单星级',
  `follow_time` date DEFAULT NULL COMMENT '跟踪时间',
  `update_time` datetime(0) DEFAULT NULL,
  `create_time` timestamp(0) DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP(0),
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `b_id`(`village_id`, `house_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 5 CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of db_business
-- ----------------------------
INSERT INTO `db_business` VALUES (1, 1, '12#', '76a3027bd3bf4892b92b72bf2ca3eba5', 1, 0, NULL, 5, '2018-10-12', NULL, '2018-11-19 14:16:22');
INSERT INTO `db_business` VALUES (3, 1, '8#', '3e658a414c5e4f11af03143bc4b7b1a7', 2, 0, '客户被说服了！', 4, '2018-08-10', NULL, '2018-12-03 14:24:21');
INSERT INTO `db_business` VALUES (4, 2, '9#', '76a3027bd3bf4892b92b72bf2ca3eba5', 3, 1, '没有说名啊啊', 1, NULL, NULL, '2018-11-14 09:39:45');

-- ----------------------------
-- Table structure for db_business_log
-- ----------------------------
DROP TABLE IF EXISTS `db_business_log`;
CREATE TABLE `db_business_log`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `business_id` int(11) DEFAULT NULL,
  `title` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '进度描述',
  `content` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `follow_time` date DEFAULT NULL,
  `create_time` timestamp(0) DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP(0),
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 11 CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of db_business_log
-- ----------------------------
INSERT INTO `db_business_log` VALUES (8, 1, '第一次跟踪', '客户注定打电话联系', '2018-10-03', '2018-10-29 16:32:40');
INSERT INTO `db_business_log` VALUES (9, 1, '第二次联系', '客户说等两天确认！', '2018-10-10', '2018-10-29 16:33:15');
INSERT INTO `db_business_log` VALUES (10, 4, '客户主动咨询', '客户到店里喝茶，然后咨询了一下产品的详细细节！', '2018-09-16', '2018-10-29 16:58:19');

-- ----------------------------
-- Table structure for db_customer
-- ----------------------------
DROP TABLE IF EXISTS `db_customer`;
CREATE TABLE `db_customer`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(30) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '客户名称',
  `tel` varchar(30) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '客户联系方式',
  `address` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL COMMENT '住址',
  `company` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL COMMENT '公司名称',
  `from` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL COMMENT '来源,介绍人',
  `remark` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL COMMENT '备注',
  `update_time` datetime(0) DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP(0) COMMENT '更新时间戳',
  `create_time` timestamp(0) DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`, `tel`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of db_customer
-- ----------------------------
INSERT INTO `db_customer` VALUES (1, '赵大本', '18352566666', '无锡', '京东', '1', '贼有钱啊！！', '2018-10-26 13:53:10', '2018-10-26 13:45:29');
INSERT INTO `db_customer` VALUES (2, '吴建建', '13851866425', '上海', '投资公司', '自己送上门', '投资住宅', NULL, '2018-10-26 14:26:17');
INSERT INTO `db_customer` VALUES (3, '李总', '15352218989', '无锡南方家园', NULL, NULL, '有希望！', NULL, '2018-10-26 14:53:09');

-- ----------------------------
-- Table structure for db_finance
-- ----------------------------
DROP TABLE IF EXISTS `db_finance`;
CREATE TABLE `db_finance`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL COMMENT '付款方方或收款方',
  `money` double NOT NULL,
  `type` varchar(10) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL COMMENT '收入或支出 income-收入 expense-支出',
  `description` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL COMMENT '描述',
  `trade_time` date DEFAULT NULL,
  `create_time` timestamp(0) NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP(0),
  `project_id` int(11) DEFAULT 0 COMMENT '流水涉及到的项目',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 8 CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of db_finance
-- ----------------------------
INSERT INTO `db_finance` VALUES (1, '阿里服饰有限公司', 3000, 'expense', '购买工服', '2018-10-11', '2018-10-30 19:44:28', 0);
INSERT INTO `db_finance` VALUES (4, '京东电子商务', 66000, 'income', '京东首付款', '2018-10-11', '2018-10-30 19:59:54', 12);
INSERT INTO `db_finance` VALUES (6, '苹果科技公司', 50000, 'expense', '购买搬动电脑', '2018-11-01', '2018-11-20 16:52:24', 0);
INSERT INTO `db_finance` VALUES (7, '预付款', 320, 'income', '项目预付款', '2018-11-10', '2018-11-20 16:53:30', 0);

-- ----------------------------
-- Table structure for db_group
-- ----------------------------
DROP TABLE IF EXISTS `db_group`;
CREATE TABLE `db_group`  (
  `id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` char(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '',
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `rules` char(80) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '',
  `can_del` int(1) DEFAULT 1,
  `description` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL COMMENT '描述',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of db_group
-- ----------------------------
INSERT INTO `db_group` VALUES (1, '超级管理员', 1, '1', 0, '超级管理员，拥有所有权限，不可修改！');
INSERT INTO `db_group` VALUES (2, '总经理', 1, '1,6', 1, NULL);
INSERT INTO `db_group` VALUES (3, '财务', 0, '1', 1, NULL);

-- ----------------------------
-- Table structure for db_group_access
-- ----------------------------
DROP TABLE IF EXISTS `db_group_access`;
CREATE TABLE `db_group_access`  (
  `uid` varchar(32) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `group_id` mediumint(8) UNSIGNED NOT NULL,
  UNIQUE INDEX `uid_group_id`(`uid`, `group_id`) USING BTREE,
  INDEX `uid`(`uid`) USING BTREE,
  INDEX `group_id`(`group_id`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of db_group_access
-- ----------------------------
INSERT INTO `db_group_access` VALUES ('5e5fe7c988ae4bdda9af291a66e8fc91', 1);
INSERT INTO `db_group_access` VALUES ('76a3027bd3bf4892b92b72bf2ca3eba5', 2);
INSERT INTO `db_group_access` VALUES ('317a32d7-8ca8-d81d-ea8c-06aaa8bc', 3);

-- ----------------------------
-- Table structure for db_log
-- ----------------------------
DROP TABLE IF EXISTS `db_log`;
CREATE TABLE `db_log`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL COMMENT '操作人的uuid',
  `content` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL COMMENT '操作内容',
  `create_time` timestamp(0) DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP(0),
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 14 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of db_log
-- ----------------------------
INSERT INTO `db_log` VALUES (1, 1, '登录了系统', '2018-11-01 09:42:31');
INSERT INTO `db_log` VALUES (2, 2, '登录了系统', '2018-11-01 09:55:25');
INSERT INTO `db_log` VALUES (3, 500000, '登录了系统', '2018-12-24 14:15:42');
INSERT INTO `db_log` VALUES (4, 500000, '登录了系统', '2018-12-24 15:00:54');
INSERT INTO `db_log` VALUES (5, 500000, '登录了系统', '2018-12-24 15:01:59');
INSERT INTO `db_log` VALUES (6, 500000, '登录了系统', '2018-12-24 15:02:41');
INSERT INTO `db_log` VALUES (7, 500000, '登录了系统', '2018-12-24 15:03:20');
INSERT INTO `db_log` VALUES (8, 500000, '登录了系统', '2018-12-24 15:07:19');
INSERT INTO `db_log` VALUES (9, 500000, '登录了系统', '2018-12-24 15:11:09');
INSERT INTO `db_log` VALUES (10, 500000, '登录了系统', '2018-12-24 15:18:20');
INSERT INTO `db_log` VALUES (11, 500000, '登录了系统', '2018-12-24 15:21:08');
INSERT INTO `db_log` VALUES (12, 500000, '登录了系统', '2018-12-25 09:30:31');
INSERT INTO `db_log` VALUES (13, 500000, '登录了系统', '2018-12-25 14:25:40');

-- ----------------------------
-- Table structure for db_project
-- ----------------------------
DROP TABLE IF EXISTS `db_project`;
CREATE TABLE `db_project`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `village_id` int(8) NOT NULL COMMENT '地址',
  `house_id` varchar(30) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL COMMENT '房号',
  `customer_id` int(11) NOT NULL COMMENT '客户名称',
  `saleman_id` varchar(32) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL COMMENT '销售人员',
  `left_money` double NOT NULL COMMENT '尾款',
  `money` double NOT NULL COMMENT '项目金额',
  `image` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '订单图片地址',
  `status` int(1) DEFAULT 1 COMMENT '标识项目状态1-进行中 2-售后',
  `sign_time` date NOT NULL COMMENT '签订日期',
  `sign_month` int(3) DEFAULT NULL,
  `sign_year` int(4) DEFAULT NULL,
  `contract` varchar(255) CHARACTER SET utf8 COLLATE utf8_croatian_ci DEFAULT '' COMMENT '合同',
  `business_id` int(11) DEFAULT NULL COMMENT '关联的业务ID，null表示没有！',
  `update_time` datetime(0) DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP(0),
  `create_time` timestamp(0) NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 17 CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of db_project
-- ----------------------------
INSERT INTO `db_project` VALUES (12, 1, '6#', 3, '76a3027bd3bf4892b92b72bf2ca3eba5', 34000, 800000, NULL, 1, '2018-10-04', 10, 2018, '', NULL, '2018-12-03 13:44:32', '2018-11-20 16:56:45');
INSERT INTO `db_project` VALUES (13, 2, '12#405', 3, '76a3027bd3bf4892b92b72bf2ca3eba5', 65000, 65000, NULL, 1, '2018-09-11', 9, 2018, '', NULL, '2018-11-27 17:47:28', '2018-07-12 15:57:21');
INSERT INTO `db_project` VALUES (16, 1, '8#', 2, '76a3027bd3bf4892b92b72bf2ca3eba5', 84320, 84320, NULL, 1, '2018-10-11', 10, 2018, '', 3, '2018-11-27 17:47:27', '2018-11-01 15:57:20');

-- ----------------------------
-- Table structure for db_project_log
-- ----------------------------
DROP TABLE IF EXISTS `db_project_log`;
CREATE TABLE `db_project_log`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `project_id` int(11) DEFAULT NULL COMMENT '所属项目',
  `title` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '进度描述',
  `content` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci COMMENT '详细描述',
  `build_time` date DEFAULT NULL COMMENT '日期',
  `create_time` timestamp(0) DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP(0),
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for db_project_service
-- ----------------------------
DROP TABLE IF EXISTS `db_project_service`;
CREATE TABLE `db_project_service`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `project_id` int(11) NOT NULL COMMENT '所属项目',
  `title` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `content` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `service_time` date DEFAULT NULL,
  `create_time` timestamp(0) DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP(0),
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for db_rule
-- ----------------------------
DROP TABLE IF EXISTS `db_rule`;
CREATE TABLE `db_rule`  (
  `id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` char(80) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '',
  `title` char(20) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '',
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `add_condition` char(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '',
  `belong` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL COMMENT '权限归属，如：财务部（配置在tp里面）',
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `name`(`name`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 9 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of db_rule
-- ----------------------------
INSERT INTO `db_rule` VALUES (1, 'App.Staff.Add', '添加员工', 1, '', 'zjb');
INSERT INTO `db_rule` VALUES (6, 'App.Village.GetDetailList', '获取地址列表', 1, '', 'cwb');
INSERT INTO `db_rule` VALUES (7, 'App.Staff.delete', '删除员工', 1, '', 'zjb');
INSERT INTO `db_rule` VALUES (8, 'App.Finance.add', '添加流水', 1, '', 'cwb');

-- ----------------------------
-- Table structure for db_user
-- ----------------------------
DROP TABLE IF EXISTS `db_user`;
CREATE TABLE `db_user`  (
  `id` varchar(32) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `password` varchar(30) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT '123456' COMMENT '密码',
  `tel` varchar(11) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `group_id` int(11) DEFAULT NULL,
  `company_id` int(8) DEFAULT NULL COMMENT '所属单位',
  `status` int(1) DEFAULT 1 COMMENT '状态 0-离职 1-在职',
  `sex` int(1) DEFAULT 2 COMMENT '2未知，0-男 1-女',
  `head_img` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT '' COMMENT '头像地址',
  `email` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `work_time` date DEFAULT NULL,
  `is_show` int(1) DEFAULT 1 COMMENT '是否显示',
  `last_read_notice_time` datetime(0) DEFAULT NULL COMMENT '上一次阅读通知的时间',
  `update_time` datetime(0) DEFAULT NULL,
  `create_time` timestamp(0) DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP(0),
  `is_root` int(1) DEFAULT 0,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `tel`(`tel`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of db_user
-- ----------------------------
INSERT INTO `db_user` VALUES ('317a32d7-8ca8-d81d-ea8c-06aaa8bc', '李小冉', '123456', '18651822552', 3, 1, 1, 1, '', '1235586@qq.com', '2018-11-01', 1, NULL, NULL, '2018-11-20 11:11:01', 0);
INSERT INTO `db_user` VALUES ('3e658a414c5e4f11af03143bc4b7b1a7', '朱沾沾', '123456', '15252217170', 2, 1, 1, 2, 'http://192.168.11.136/tx.jph', NULL, '2018-11-08', 1, NULL, NULL, '2018-11-13 15:27:28', 0);
INSERT INTO `db_user` VALUES ('5e5fe7c988ae4bdda9af291a66e8fc91', '张超', '123456', '18861843008', 1, 1, 1, 2, 'http://192.168.11.136/tx.jph', '294263387@qq.com', '2017-12-15', 1, NULL, NULL, '2018-11-13 15:12:42', 1);
INSERT INTO `db_user` VALUES ('76a3027bd3bf4892b92b72bf2ca3eba5', '李健', '123456', '18352566686', 2, 1, 1, 2, 'http://loclahost/tx.jph', '979963739@qq.com', '2017-12-10', 1, NULL, NULL, '2018-11-19 17:11:23', 0);

-- ----------------------------
-- Table structure for db_village
-- ----------------------------
DROP TABLE IF EXISTS `db_village`;
CREATE TABLE `db_village`  (
  `id` int(8) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '项目地址',
  `create_time` timestamp(0) DEFAULT CURRENT_TIMESTAMP,
  `status` int(11) DEFAULT 1 COMMENT '0-禁用 1-正常',
  `user_id` varchar(32) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '关联的uid',
  `first_letter` char(1) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '地址的首字母，用于排序',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 9 CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of db_village
-- ----------------------------
INSERT INTO `db_village` VALUES (1, '南方家园', '2018-11-12 15:07:27', 1, '5e5fe7c988ae4bdda9af291a66e8fc91', 'N');
INSERT INTO `db_village` VALUES (2, '新乐园', '2018-10-26 14:51:28', 0, '5e5fe7c988ae4bdda9af291a66e8fc91', 'X');
INSERT INTO `db_village` VALUES (3, '国家软件园', '2018-11-12 17:38:13', 0, '5e5fe7c988ae4bdda9af291a66e8fc91', 'G');
INSERT INTO `db_village` VALUES (4, '华府庄园', '2018-11-12 17:58:28', 1, '76a3027bd3bf4892b92b72bf2ca3eba5', 'H');
INSERT INTO `db_village` VALUES (5, '书香门第', '2018-11-12 17:59:45', 1, '5e5fe7c988ae4bdda9af291a66e8fc91', 'S');
INSERT INTO `db_village` VALUES (7, '清华园', '2018-11-13 14:03:37', 1, '5e5fe7c988ae4bdda9af291a66e8fc91', 'Q');
INSERT INTO `db_village` VALUES (8, '运河10号', '2018-11-13 14:05:20', 1, '5e5fe7c988ae4bdda9af291a66e8fc91', 'Y');

SET FOREIGN_KEY_CHECKS = 1;
