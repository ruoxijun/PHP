/*
Navicat MySQL Data Transfer

Source Server         : 本地
Source Server Version : 50553
Source Host           : 127.0.0.1:3306
Source Database       : studentdb

Target Server Type    : MYSQL
Target Server Version : 50553
File Encoding         : 65001

Date: 2020-06-08 08:35:00
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for t_classes
-- ----------------------------
DROP TABLE IF EXISTS `t_classes`;
CREATE TABLE `t_classes` (
  `class_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `class_name` varchar(30) NOT NULL COMMENT '班级名称',
  `in_year` year(4) DEFAULT NULL COMMENT '入学年份',
  `teacher` varchar(30) DEFAULT NULL COMMENT '班主任',
  `create_time` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `update_time` int(10) unsigned DEFAULT NULL,
  `delete_time` int(10) unsigned DEFAULT NULL,
  `prof_id` int(10) unsigned NOT NULL COMMENT '所属专业的ID',
  PRIMARY KEY (`class_id`),
  KEY `lx_name` (`class_name`),
  KEY `lx_del` (`delete_time`),
  KEY `lx_teacher` (`teacher`),
  KEY `lx_inyeaer` (`in_year`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COMMENT='班级表';

-- ----------------------------
-- Records of t_classes
-- ----------------------------
INSERT INTO `t_classes` VALUES ('1', '计应用ZK1701', '2018', null, '2019-03-06 09:33:22', null, null, '1');
INSERT INTO `t_classes` VALUES ('2', '计应用ZK1702', '2018', null, '2019-03-06 09:35:35', null, null, '1');
INSERT INTO `t_classes` VALUES ('3', '计应用ZK1703', '2018', null, '2019-03-06 09:35:58', null, null, '1');
INSERT INTO `t_classes` VALUES ('4', '大数据ZK1801', '2018', null, '2019-03-06 09:33:20', null, null, '2');
INSERT INTO `t_classes` VALUES ('5', '大数据ZK1802', '2018', null, '2019-03-06 09:36:44', null, '0', '2');
INSERT INTO `t_classes` VALUES ('6', '计应用ZK1801', '2019', null, '2020-04-26 15:08:17', null, null, '1');
INSERT INTO `t_classes` VALUES ('7', '计应用ZK1802', '2019', null, '2020-04-26 15:08:25', null, null, '1');
INSERT INTO `t_classes` VALUES ('8', '计应用ZK1803', '2019', null, '2020-04-26 17:08:12', null, null, '1');

-- ----------------------------
-- Table structure for t_professions
-- ----------------------------
DROP TABLE IF EXISTS `t_professions`;
CREATE TABLE `t_professions` (
  `prof_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `prof_code` varchar(10) NOT NULL COMMENT '专业代码',
  `prof_name` varchar(30) NOT NULL COMMENT '专业名称',
  `leader` varchar(30) DEFAULT NULL COMMENT '专业带头人',
  `master` varchar(30) DEFAULT NULL COMMENT '专业负责人',
  `intro` text COMMENT '专业简介',
  `plan` decimal(2,1) unsigned DEFAULT NULL COMMENT '学制(年)',
  `level` varchar(10) DEFAULT NULL COMMENT '层次(本科、专科)',
  `create_time` timestamp NULL DEFAULT CURRENT_TIMESTAMP COMMENT '添加时间',
  `update_time` int(10) unsigned DEFAULT NULL COMMENT '最后一次修改的时间',
  `delete_time` int(10) unsigned DEFAULT NULL COMMENT '软删除的时间',
  PRIMARY KEY (`prof_id`),
  KEY `lx_code` (`prof_code`),
  KEY `lx_name` (`prof_name`),
  KEY `lx_del` (`delete_time`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COMMENT='专业表';

-- ----------------------------
-- Records of t_professions
-- ----------------------------
INSERT INTO `t_professions` VALUES ('1', '20080001', '计算机应用技术', null, null, null, '3.0', null, '2019-03-06 09:01:00', null, null);
INSERT INTO `t_professions` VALUES ('2', '20170001', '大数据', null, null, null, null, null, '2019-03-06 09:01:26', null, null);
INSERT INTO `t_professions` VALUES ('3', '20170001', '软件技术', null, null, null, null, null, '2020-04-26 14:53:54', null, null);

-- ----------------------------
-- Table structure for t_students
-- ----------------------------
DROP TABLE IF EXISTS `t_students`;
CREATE TABLE `t_students` (
  `stu_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `class_id` int(10) unsigned NOT NULL COMMENT '所属班级ID',
  `stu_no` varchar(10) NOT NULL COMMENT '学号',
  `stu_name` varchar(30) NOT NULL COMMENT '姓名',
  `idcard` varchar(18) DEFAULT NULL COMMENT '身份证号码',
  `birthday` date DEFAULT NULL COMMENT '生日',
  `gender` bit(1) DEFAULT NULL COMMENT '性别(1:男 0:女)',
  `phone` varchar(11) DEFAULT NULL COMMENT '手机号',
  `create_time` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `update_time` int(10) unsigned DEFAULT NULL,
  `delete_time` int(10) unsigned DEFAULT NULL,
  `status` tinyint(3) unsigned DEFAULT '1' COMMENT '学籍状态(1:在籍, 2: 休学, 3: 退学, 4: 入伍，5：已毕业)',
  PRIMARY KEY (`stu_id`),
  KEY `lx_name` (`stu_name`),
  KEY `lx_no` (`stu_no`),
  KEY `lx_del` (`delete_time`)
) ENGINE=MyISAM AUTO_INCREMENT=152 DEFAULT CHARSET=utf8 COMMENT='学生表';

-- ----------------------------
-- Records of t_students
-- ----------------------------
INSERT INTO `t_students` VALUES ('1', '1', '201701001', '张书林', null, null, '', null, '2019-03-06 09:46:18', null, '1589511109', '1');
INSERT INTO `t_students` VALUES ('2', '1', '201701002', '蒲明', null, null, '\0', null, '2019-03-06 09:46:25', null, null, '1');
INSERT INTO `t_students` VALUES ('3', '1', '201701003', '陈豪', null, null, '\0', null, '2019-03-06 09:46:38', null, null, '1');
INSERT INTO `t_students` VALUES ('4', '2', '201702001', '余强', null, null, '', null, '2019-03-06 09:47:03', null, null, '1');
INSERT INTO `t_students` VALUES ('5', '2', '201702002', '李权泰', '123456200001011284', null, '\0', null, '2019-03-06 09:47:13', null, null, '1');
INSERT INTO `t_students` VALUES ('6', '2', '201702003', '张俊童', null, null, null, null, '2019-03-06 09:47:23', null, null, '1');
INSERT INTO `t_students` VALUES ('7', '2', '201702004', '白银松', null, null, '', null, '2019-03-06 09:47:31', null, null, '1');
INSERT INTO `t_students` VALUES ('8', '3', '201703001', '钱静', null, null, '\0', null, '2019-03-06 09:47:44', null, null, '1');
INSERT INTO `t_students` VALUES ('9', '3', '201703002', '熊英', null, null, '\0', null, '2019-03-06 09:47:52', null, null, '1');
INSERT INTO `t_students` VALUES ('10', '3', '201703003', '李卓', null, null, '', null, '2019-03-06 09:48:02', null, '1589511168', '1');
INSERT INTO `t_students` VALUES ('11', '4', '201801001', '杨飞', null, null, '', null, '2019-03-06 09:48:19', null, null, '1');
INSERT INTO `t_students` VALUES ('12', '4', '201801002', '汪涛', null, null, '', null, '2019-03-06 09:48:28', null, null, '1');
INSERT INTO `t_students` VALUES ('13', '5', '201802001', '蒲钰婷', null, null, '\0', null, '2019-03-06 09:48:42', null, null, '1');
INSERT INTO `t_students` VALUES ('14', '5', '201802002', '勾冰冰', null, null, '', null, '2019-03-06 09:48:44', null, null, '1');
INSERT INTO `t_students` VALUES ('15', '5', '201802003', '朱强', null, null, '', null, '2019-03-06 09:49:05', null, null, '1');
INSERT INTO `t_students` VALUES ('16', '6', '2018000139', '李磊', null, null, '', null, '2020-04-26 17:15:18', null, null, '1');
INSERT INTO `t_students` VALUES ('17', '6', '2018000155', '刘小兰', null, null, '\0', null, '2020-04-26 17:15:18', null, null, '1');
INSERT INTO `t_students` VALUES ('18', '6', '2018000172', '刘德雨', null, null, '', null, '2020-04-26 17:15:18', null, null, '1');
INSERT INTO `t_students` VALUES ('19', '6', '2018000176', '张钦', null, null, '', null, '2020-04-26 17:15:18', null, null, '1');
INSERT INTO `t_students` VALUES ('20', '6', '2018000194', '乐江南', null, null, '', null, '2020-04-26 17:15:18', null, null, '1');
INSERT INTO `t_students` VALUES ('21', '6', '2018000376', '刘尚高', null, null, '', null, '2020-04-26 17:15:18', null, '1589511286', '1');
INSERT INTO `t_students` VALUES ('22', '6', '2018000499', '杨巧云', null, null, '\0', null, '2020-04-26 17:15:18', null, null, '1');
INSERT INTO `t_students` VALUES ('23', '6', '2018000521', '王泽荣', null, null, '', null, '2020-04-26 17:15:18', null, null, '1');
INSERT INTO `t_students` VALUES ('24', '6', '2018001003', '张力姝', null, null, '\0', null, '2020-04-26 17:15:18', null, null, '1');
INSERT INTO `t_students` VALUES ('25', '6', '2018001419', '唐龙', null, null, '', null, '2020-04-26 17:15:18', null, null, '1');
INSERT INTO `t_students` VALUES ('26', '6', '2018001585', '何柳', null, null, '\0', null, '2020-04-26 17:15:18', null, null, '1');
INSERT INTO `t_students` VALUES ('27', '6', '2018001660', '张根来', null, null, '', null, '2020-04-26 17:15:18', null, null, '1');
INSERT INTO `t_students` VALUES ('28', '6', '2018001730', '罗义来', null, null, '', null, '2020-04-26 17:15:18', null, null, '1');
INSERT INTO `t_students` VALUES ('29', '6', '2018001733', '骆春欢', null, null, '\0', null, '2020-04-26 17:15:18', null, null, '1');
INSERT INTO `t_students` VALUES ('30', '6', '2018001744', '李正豪', null, null, '', null, '2020-04-26 17:15:18', null, null, '1');
INSERT INTO `t_students` VALUES ('31', '6', '2018001745', '敖文兴', null, null, '', null, '2020-04-26 17:15:18', null, null, '1');
INSERT INTO `t_students` VALUES ('32', '6', '2018001754', '张杜萍', null, null, '\0', null, '2020-04-26 17:15:18', null, null, '1');
INSERT INTO `t_students` VALUES ('33', '6', '2018001890', '吴俊葳', null, null, '', null, '2020-04-26 17:15:18', null, null, '1');
INSERT INTO `t_students` VALUES ('34', '6', '2018001899', '邓海洋', null, null, '', null, '2020-04-26 17:15:18', null, null, '1');
INSERT INTO `t_students` VALUES ('35', '6', '2018001903', '戴国礼', null, null, '', null, '2020-04-26 17:15:18', null, null, '1');
INSERT INTO `t_students` VALUES ('36', '6', '2018002034', '杨佳鑫', null, null, '', null, '2020-04-26 17:15:18', null, null, '1');
INSERT INTO `t_students` VALUES ('37', '6', '2018002144', '李锦涛', null, null, '', null, '2020-04-26 17:15:18', null, null, '1');
INSERT INTO `t_students` VALUES ('38', '6', '2018002221', '文海宇', null, null, '', null, '2020-04-26 17:15:18', null, null, '1');
INSERT INTO `t_students` VALUES ('39', '6', '2018002234', '向攀岳', null, null, '', null, '2020-04-26 17:15:18', null, null, '1');
INSERT INTO `t_students` VALUES ('40', '6', '2018002465', '周杰', null, null, '', null, '2020-04-26 17:15:18', null, null, '1');
INSERT INTO `t_students` VALUES ('41', '6', '2018002478', '黄翠平', null, null, '\0', null, '2020-04-26 17:15:18', null, null, '1');
INSERT INTO `t_students` VALUES ('42', '6', '2018002479', '陈敬', null, null, '\0', null, '2020-04-26 17:15:18', null, null, '1');
INSERT INTO `t_students` VALUES ('43', '6', '2018002487', '谭正燕', null, null, '\0', null, '2020-04-26 17:15:18', null, null, '1');
INSERT INTO `t_students` VALUES ('44', '6', '2018002488', '李双双', null, null, '\0', null, '2020-04-26 17:15:18', null, null, '1');
INSERT INTO `t_students` VALUES ('45', '6', '2018002502', '刘根豪', null, null, '', null, '2020-04-26 17:15:18', null, null, '1');
INSERT INTO `t_students` VALUES ('46', '6', '2018002522', '黎秋亭', null, null, '\0', null, '2020-04-26 17:15:18', null, null, '1');
INSERT INTO `t_students` VALUES ('47', '6', '2018002525', '王艳芳', null, null, '\0', null, '2020-04-26 17:15:18', null, null, '1');
INSERT INTO `t_students` VALUES ('48', '6', '2018002535', '周小琴', null, null, '\0', null, '2020-04-26 17:15:18', null, null, '1');
INSERT INTO `t_students` VALUES ('49', '6', '2018002538', '陈雪双', null, null, '\0', null, '2020-04-26 17:15:18', null, null, '1');
INSERT INTO `t_students` VALUES ('50', '6', '2018002548', '刘鹏', null, null, '', null, '2020-04-26 17:15:18', null, null, '1');
INSERT INTO `t_students` VALUES ('51', '6', '2018002549', '王加鑫', null, null, '', null, '2020-04-26 17:15:18', null, null, '1');
INSERT INTO `t_students` VALUES ('52', '6', '2018002554', '包云龙', null, null, '', null, '2020-04-26 17:15:18', null, null, '1');
INSERT INTO `t_students` VALUES ('53', '6', '2018002565', '张永泉', null, null, '', null, '2020-04-26 17:15:18', null, null, '1');
INSERT INTO `t_students` VALUES ('54', '6', '2018002567', '陈升林', null, null, '', null, '2020-04-26 17:15:18', null, null, '1');
INSERT INTO `t_students` VALUES ('55', '6', '2018002573', '张兴辉', null, null, '', null, '2020-04-26 17:15:18', null, null, '1');
INSERT INTO `t_students` VALUES ('56', '6', '2018003402', '岳杰', null, null, '', null, '2020-04-26 17:15:18', null, null, '1');
INSERT INTO `t_students` VALUES ('57', '6', 'Giffen', '周煜涛', null, null, '', null, '2020-04-26 17:15:18', null, null, '1');
INSERT INTO `t_students` VALUES ('58', '6', 'zhangyang', '张洋', null, null, '', null, '2020-04-26 17:15:18', null, null, '1');
INSERT INTO `t_students` VALUES ('59', '7', '2018000140', '朱俊枫', null, null, '', null, '2020-04-26 17:16:12', null, null, '1');
INSERT INTO `t_students` VALUES ('60', '7', '2018000200', '冉名聪', null, null, '', null, '2020-04-26 17:16:12', null, null, '1');
INSERT INTO `t_students` VALUES ('61', '7', '2018000219', '罗海洋', null, null, '', null, '2020-04-26 17:16:12', null, null, '1');
INSERT INTO `t_students` VALUES ('62', '7', '2018000265', '张影', null, null, '', null, '2020-04-26 17:16:12', null, null, '1');
INSERT INTO `t_students` VALUES ('63', '7', '2018000294', '郑国祥', null, null, '', null, '2020-04-26 17:16:12', null, null, '1');
INSERT INTO `t_students` VALUES ('64', '7', '2018000362', '包海力', null, null, '', null, '2020-04-26 17:16:12', null, null, '1');
INSERT INTO `t_students` VALUES ('65', '7', '2018000411', '杨晔', null, null, '', null, '2020-04-26 17:16:12', null, null, '1');
INSERT INTO `t_students` VALUES ('66', '7', '2018000457', '高宝川', null, null, '', null, '2020-04-26 17:16:12', null, null, '1');
INSERT INTO `t_students` VALUES ('67', '7', '2018000486', '杨浩', null, null, '', null, '2020-04-26 17:16:12', null, null, '1');
INSERT INTO `t_students` VALUES ('68', '7', '2018000489', '骄阳', null, null, '', null, '2020-04-26 17:16:12', null, null, '1');
INSERT INTO `t_students` VALUES ('69', '7', '2018000517', '邵子文', null, null, '', null, '2020-04-26 17:16:12', null, null, '1');
INSERT INTO `t_students` VALUES ('70', '7', '2018000523', '蔡志新', null, null, '', null, '2020-04-26 17:16:12', null, null, '1');
INSERT INTO `t_students` VALUES ('71', '7', '2018000525', '杨乾烽', null, null, '', null, '2020-04-26 17:16:12', null, null, '1');
INSERT INTO `t_students` VALUES ('72', '7', '2018000542', '王爱民', null, null, '', null, '2020-04-26 17:16:12', null, null, '1');
INSERT INTO `t_students` VALUES ('73', '7', '2018000989', '刘欢', null, null, '\0', null, '2020-04-26 17:16:12', null, null, '1');
INSERT INTO `t_students` VALUES ('74', '7', '2018001032', '秦双凤', null, null, '\0', null, '2020-04-26 17:16:12', null, null, '1');
INSERT INTO `t_students` VALUES ('75', '7', '2018001039', '张庆磊', null, null, '', null, '2020-04-26 17:16:12', null, null, '1');
INSERT INTO `t_students` VALUES ('76', '7', '2018001044', '金文利', null, null, '', null, '2020-04-26 17:16:12', null, null, '1');
INSERT INTO `t_students` VALUES ('77', '7', '2018001367', '杨英才', null, null, '', null, '2020-04-26 17:16:12', null, null, '1');
INSERT INTO `t_students` VALUES ('78', '7', '2018001425', '张煜鑫', null, null, '', null, '2020-04-26 17:16:12', null, null, '1');
INSERT INTO `t_students` VALUES ('79', '7', '2018001450', '张灿', null, null, '', null, '2020-04-26 17:16:12', null, null, '1');
INSERT INTO `t_students` VALUES ('80', '7', '2018001566', '周俊杰', null, null, '', null, '2020-04-26 17:16:12', null, null, '1');
INSERT INTO `t_students` VALUES ('81', '7', '2018001597', '何金海', null, null, '', null, '2020-04-26 17:16:12', null, null, '1');
INSERT INTO `t_students` VALUES ('82', '7', '2018001598', '陈绍伟', null, null, '', null, '2020-04-26 17:16:12', null, null, '1');
INSERT INTO `t_students` VALUES ('83', '7', '2018001599', '胡萍', null, null, '\0', null, '2020-04-26 17:16:12', null, null, '1');
INSERT INTO `t_students` VALUES ('84', '7', '2018001742', '侯真丽', null, null, '\0', null, '2020-04-26 17:16:12', null, null, '1');
INSERT INTO `t_students` VALUES ('85', '7', '2018001748', '谢鑫棚', null, null, '', null, '2020-04-26 17:16:12', null, null, '1');
INSERT INTO `t_students` VALUES ('86', '7', '2018001871', '唐洁', null, null, '\0', null, '2020-04-26 17:16:12', null, null, '1');
INSERT INTO `t_students` VALUES ('87', '7', '2018001886', '刘轩宇', null, null, '', null, '2020-04-26 17:16:12', null, null, '1');
INSERT INTO `t_students` VALUES ('88', '7', '2018001969', '陈柯', null, null, '', null, '2020-04-26 17:16:12', null, null, '1');
INSERT INTO `t_students` VALUES ('89', '7', '2018001979', '杨帮魁', null, null, '', null, '2020-04-26 17:16:12', null, null, '1');
INSERT INTO `t_students` VALUES ('90', '7', '2018002040', '朱政权', null, null, '', null, '2020-04-26 17:16:12', null, null, '1');
INSERT INTO `t_students` VALUES ('91', '7', '2018002059', '魏宗平', null, null, '', null, '2020-04-26 17:16:12', null, null, '1');
INSERT INTO `t_students` VALUES ('92', '7', '2018002128', '杨露', null, null, '', null, '2020-04-26 17:16:12', null, null, '1');
INSERT INTO `t_students` VALUES ('93', '7', '2018002227', '石强浩', null, null, '', null, '2020-04-26 17:16:12', null, null, '1');
INSERT INTO `t_students` VALUES ('94', '7', '2018002238', '姜军', null, null, '', null, '2020-04-26 17:16:12', null, null, '1');
INSERT INTO `t_students` VALUES ('95', '7', '2018002466', '胡永佳', null, null, '\0', null, '2020-04-26 17:16:12', null, null, '1');
INSERT INTO `t_students` VALUES ('96', '7', '2018002468', '杨春燕', null, null, '\0', null, '2020-04-26 17:16:12', null, null, '1');
INSERT INTO `t_students` VALUES ('97', '7', '2018002470', '邬小庆', null, null, '', null, '2020-04-26 17:16:12', null, null, '1');
INSERT INTO `t_students` VALUES ('98', '7', '2018002471', '王志远', null, null, '', null, '2020-04-26 17:16:12', null, null, '1');
INSERT INTO `t_students` VALUES ('99', '7', '2018002480', '郭浩然', null, null, '', null, '2020-04-26 17:16:12', null, null, '1');
INSERT INTO `t_students` VALUES ('100', '7', '2018002485', '李小林', null, null, '', null, '2020-04-26 17:16:12', null, null, '1');
INSERT INTO `t_students` VALUES ('101', '7', '2018002504', '陆勇', null, null, '', null, '2020-04-26 17:16:12', null, null, '1');
INSERT INTO `t_students` VALUES ('102', '7', '2018002534', '王玉龙', null, null, '', null, '2020-04-26 17:16:12', null, null, '1');
INSERT INTO `t_students` VALUES ('103', '7', '2018002543', '向海昭', null, null, '', null, '2020-04-26 17:16:12', null, null, '1');
INSERT INTO `t_students` VALUES ('104', '8', '2018000084', '张华', null, null, '', null, '2020-04-26 17:16:54', null, null, '1');
INSERT INTO `t_students` VALUES ('105', '8', '2018000100', '陈进', null, null, '', null, '2020-04-26 17:16:54', null, null, '1');
INSERT INTO `t_students` VALUES ('106', '8', '2018000156', '郭静', null, null, '\0', null, '2020-04-26 17:16:54', null, null, '1');
INSERT INTO `t_students` VALUES ('107', '8', '2018000235', '吴江龙', null, null, '', null, '2020-04-26 17:16:54', null, null, '1');
INSERT INTO `t_students` VALUES ('108', '8', '2018000266', '陈蕊', null, null, '\0', null, '2020-04-26 17:16:54', null, null, '1');
INSERT INTO `t_students` VALUES ('109', '8', '2018000277', '李强', null, null, '', null, '2020-04-26 17:16:54', null, null, '1');
INSERT INTO `t_students` VALUES ('110', '8', '2018000282', '代飞', null, null, '', null, '2020-04-26 17:16:54', null, null, '1');
INSERT INTO `t_students` VALUES ('111', '8', '2018000383', '罗继宇', null, null, '', null, '2020-04-26 17:16:54', null, null, '1');
INSERT INTO `t_students` VALUES ('112', '8', '2018000406', '全英豪', null, null, '', null, '2020-04-26 17:16:54', null, null, '1');
INSERT INTO `t_students` VALUES ('113', '8', '2018000407', '李信', null, null, '', null, '2020-04-26 17:16:54', null, null, '1');
INSERT INTO `t_students` VALUES ('114', '8', '2018000536', '陆忠琪', null, null, '\0', null, '2020-04-26 17:16:54', null, null, '1');
INSERT INTO `t_students` VALUES ('115', '8', '2018000662', '金远梅', null, null, '\0', null, '2020-04-26 17:16:54', null, null, '1');
INSERT INTO `t_students` VALUES ('116', '8', '2018001463', '高充', null, null, '', null, '2020-04-26 17:16:54', null, null, '1');
INSERT INTO `t_students` VALUES ('117', '8', '2018001529', '董泽勇', null, null, '', null, '2020-04-26 17:16:54', null, null, '1');
INSERT INTO `t_students` VALUES ('118', '8', '2018001626', '王鸿铭', null, null, '', null, '2020-04-26 17:16:54', null, null, '1');
INSERT INTO `t_students` VALUES ('119', '8', '2018001662', '李兴龙', null, null, '', null, '2020-04-26 17:16:54', null, null, '1');
INSERT INTO `t_students` VALUES ('120', '8', '2018001691', '潘小龙', null, null, '', null, '2020-04-26 17:16:54', null, null, '1');
INSERT INTO `t_students` VALUES ('121', '8', '2018001700', '李永兴', null, null, '', null, '2020-04-26 17:16:54', null, null, '1');
INSERT INTO `t_students` VALUES ('122', '8', '2018001731', '程新', null, null, '', null, '2020-04-26 17:16:54', null, null, '1');
INSERT INTO `t_students` VALUES ('123', '8', '2018001816', '杨洁', null, null, '\0', null, '2020-04-26 17:16:54', null, null, '1');
INSERT INTO `t_students` VALUES ('124', '8', '2018001949', '何孟恒', null, null, '', null, '2020-04-26 17:16:54', null, null, '1');
INSERT INTO `t_students` VALUES ('125', '8', '2018001960', '侯永浩', null, null, '', null, '2020-04-26 17:16:54', null, null, '1');
INSERT INTO `t_students` VALUES ('126', '8', '2018001989', '陈亚萍', null, null, '\0', null, '2020-04-26 17:16:54', null, null, '1');
INSERT INTO `t_students` VALUES ('127', '8', '2018002017', '曹杰', null, null, '', null, '2020-04-26 17:16:54', null, null, '1');
INSERT INTO `t_students` VALUES ('128', '8', '2018002158', '代纪元', null, null, '', null, '2020-04-26 17:16:54', null, null, '1');
INSERT INTO `t_students` VALUES ('129', '8', '2018002172', '张鸿鑫', null, null, '', null, '2020-04-26 17:16:54', null, null, '1');
INSERT INTO `t_students` VALUES ('130', '8', '2018002474', '李瀚翔', null, null, '', null, '2020-04-26 17:16:54', null, null, '1');
INSERT INTO `t_students` VALUES ('131', '8', '2018002477', '尤俊', null, null, '', null, '2020-04-26 17:16:54', null, null, '1');
INSERT INTO `t_students` VALUES ('132', '8', '2018002482', '邓太平', null, null, '\0', null, '2020-04-26 17:16:54', null, null, '1');
INSERT INTO `t_students` VALUES ('133', '8', '2018002489', '杨成', null, null, '', null, '2020-04-26 17:16:54', null, null, '1');
INSERT INTO `t_students` VALUES ('134', '8', '2018002503', '孙庭超', null, null, '', null, '2020-04-26 17:16:54', null, null, '1');
INSERT INTO `t_students` VALUES ('135', '8', '2018002517', '陈沛洋', null, null, '', null, '2020-04-26 17:16:54', null, null, '1');
INSERT INTO `t_students` VALUES ('136', '8', '2018002533', '王艾', null, null, '\0', null, '2020-04-26 17:16:54', null, null, '1');
INSERT INTO `t_students` VALUES ('137', '8', '2018002544', '柯琟', null, null, '', null, '2020-04-26 17:16:54', null, null, '1');
INSERT INTO `t_students` VALUES ('138', '8', '2018002580', '罗小庆', null, null, '\0', null, '2020-04-26 17:16:54', null, null, '1');
INSERT INTO `t_students` VALUES ('139', '8', '2018002588', '杨代燚', null, null, '', null, '2020-04-26 17:16:54', null, null, '1');
INSERT INTO `t_students` VALUES ('140', '8', '2018002594', '张艳', null, null, '\0', null, '2020-04-26 17:16:54', null, null, '1');
INSERT INTO `t_students` VALUES ('141', '8', '2018002865', '黄艾琳', null, null, '\0', null, '2020-04-26 17:16:54', null, null, '1');
INSERT INTO `t_students` VALUES ('142', '8', '2018002868', '邓江波', null, null, '', null, '2020-04-26 17:16:54', null, null, '1');
INSERT INTO `t_students` VALUES ('143', '8', '2018002877', '肖凌峰', null, null, '', null, '2020-04-26 17:16:54', null, null, '1');
INSERT INTO `t_students` VALUES ('144', '8', '2018002930', '李小龙', null, null, '', null, '2020-04-26 17:16:54', null, null, '1');
INSERT INTO `t_students` VALUES ('145', '8', 'BEIMING', '徐伟铭', null, null, '', null, '2020-04-26 17:16:54', null, null, '1');
INSERT INTO `t_students` VALUES ('146', '8', 'lixisngqia', '李向强', null, null, '', null, '2020-04-26 17:16:54', null, null, '1');
INSERT INTO `t_students` VALUES ('147', '8', 'Yu1234', '蔡微', null, null, '\0', null, '2020-04-26 17:16:54', null, null, '1');
INSERT INTO `t_students` VALUES ('148', '8', 'YuQingshan', '喻青山', null, null, '', null, '2020-04-26 17:16:54', null, null, '1');
INSERT INTO `t_students` VALUES ('149', '2', '12345', '李四POST', '123456200001011234', '2000-01-01', '', '13712345678', '2020-05-13 11:53:37', null, null, '1');
INSERT INTO `t_students` VALUES ('150', '2', '12345', '张三New', '123456200001011234', '2000-01-01', '', '13712345678', '2020-05-13 15:00:46', null, null, '1');
INSERT INTO `t_students` VALUES ('151', '4', '20171234', '李连杰', '123456200001011234', '1963-07-02', '', '13788888888', '2020-05-14 09:45:52', null, null, '1');

-- ----------------------------
-- Function structure for GET_GENDER_BY_BIT
-- ----------------------------
DROP FUNCTION IF EXISTS `GET_GENDER_BY_BIT`;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` FUNCTION `GET_GENDER_BY_BIT`(`bitgender` bit) RETURNS varchar(2) CHARSET utf8
    COMMENT '将BIT类型的性别转换为中文的性别'
BEGIN
	# 将BIT类型的性别转换为中文的性别
	# 声明变量：DECLARE关键字
	DECLARE cngender VARCHAR(2);

	# 判断1或0
	IF bitgender = 1 THEN
		# 使用SET语句赋值
		SET cngender = "男";
	ELSEIF bitgender = 0 THEN
		SET cngender = '女';
	ELSE
		SET cngender = '未知';
	END IF;

	# 返回处理的结果
	RETURN cngender;
END
;;
DELIMITER ;

-- ----------------------------
-- Function structure for GET_GENDER_BY_ID
-- ----------------------------
DROP FUNCTION IF EXISTS `GET_GENDER_BY_ID`;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` FUNCTION `GET_GENDER_BY_ID`(`idno` varchar(18)) RETURNS bit(1)
    COMMENT '从身份证号中提取性别，转换为BIT并返回'
BEGIN
	# 从身份证号中提取性别，转换为BIT并返回
	DECLARE strgender CHAR(1);
	DECLARE bitgender BIT;			# 所有变量的声明都必须放在函数体前面。

	# 1. 字符串截取：SUBSTRING(字符串,位置, 长度)
	SET strgender = SUBSTRING(idno, 17, 1);

	# 2. 除2取余: %
	SET bitgender = strgender % 2;			# MySQL在某些情况下，可以实现数据类型的自动转换。

	RETURN bitgender;
END
;;
DELIMITER ;

-- ----------------------------
-- Function structure for GET_STATUS
-- ----------------------------
DROP FUNCTION IF EXISTS `GET_STATUS`;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` FUNCTION `GET_STATUS`(`num` tinyint) RETURNS varchar(10) CHARSET utf8
BEGIN
	# 将tinying类型转换为中文的学籍状态
	# 学籍状态(1:在籍, 2: 休学, 3: 退学, 4: 入伍，5：已毕业)
	# 声明变量：DECLARE关键字
	DECLARE cnstatus VARCHAR(10);

	IF num = 1 THEN
		# 使用SET语句赋值
		SET cnstatus = "在籍";
	ELSEIF num = 2 THEN
		SET cnstatus = '休学';
	ELSEIF num = 3 THEN
		SET cnstatus = '退学';
	ELSEIF num = 4 THEN
		SET cnstatus = '入伍';
	ELSEIF num = 5 THEN
		SET cnstatus = '已毕业';
	ELSE
		SET cnstatus = '未知';
	END IF;

	# 返回处理的结果
	RETURN cnstatus;
END;

-- ----------------------------
-- View structure for v_classes
-- ----------------------------
DROP VIEW IF EXISTS `v_classes`;
CREATE ALGORITHM=MERGE DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_classes` AS select `t_classes`.`class_id` AS `classId`,`t_classes`.`class_name` AS `className`,`t_classes`.`create_time` AS `createTime`,`t_classes`.`update_time` AS `updateTime`,`t_classes`.`prof_id` AS `profId`,`t_classes`.`in_year` AS `in_year`,`t_classes`.`teacher` AS `teacher` from `t_classes` where isnull(`t_classes`.`delete_time`) order by `t_classes`.`class_name` ;

-- ----------------------------
-- View structure for v_professions
-- ----------------------------
DROP VIEW IF EXISTS `v_professions`;
CREATE ALGORITHM=MERGE DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_professions` AS select `t_professions`.`prof_id` AS `profId`,`t_professions`.`prof_code` AS `profCode`,`t_professions`.`prof_name` AS `profName`,`t_professions`.`create_time` AS `createTime`,`t_professions`.`update_time` AS `updateTime`,`t_professions`.`leader` AS `leader`,`t_professions`.`master` AS `master`,`t_professions`.`intro` AS `intro`,`t_professions`.`plan` AS `plan`,`t_professions`.`level` AS `level` from `t_professions` where isnull(`t_professions`.`delete_time`) order by `t_professions`.`prof_code` ;

-- ----------------------------
-- View structure for v_students
-- ----------------------------
DROP VIEW IF EXISTS `v_students`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_students` AS select `t_students`.`stu_id` AS `stuId`,`t_students`.`class_id` AS `classId`,`t_students`.`stu_no` AS `stuNo`,`t_students`.`stu_name` AS `stuName`,`t_students`.`idcard` AS `idcard`,`t_students`.`birthday` AS `birthday`,`GET_GENDER_BY_BIT`(`t_students`.`gender`) AS `gender`,`t_students`.`phone` AS `phone`,`t_students`.`create_time` AS `createTime`,`t_students`.`update_time` AS `updateTime`,`t_students`.`status` AS `statusId`,`GET_STATUS`(`t_students`.`status`) AS `status` from `t_students` where isnull(`t_students`.`delete_time`) order by `t_students`.`stu_no` ;

-- ----------------------------
-- View structure for v_class_profession
-- ----------------------------
DROP VIEW IF EXISTS `v_class_profession`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_class_profession` AS select `v_classes`.`classId` AS `classId`,`v_classes`.`className` AS `className`,`v_classes`.`createTime` AS `createTime`,`v_classes`.`updateTime` AS `updateTime`,`v_classes`.`profId` AS `profId`,`v_professions`.`profCode` AS `profCode`,`v_professions`.`profName` AS `profName`,`v_classes`.`in_year` AS `inYear`,`v_classes`.`teacher` AS `teacher` from (`v_professions` join `v_classes` on((`v_professions`.`profId` = `v_classes`.`profId`))) ;


-- ----------------------------
-- View structure for v_student_class_profession
-- ----------------------------
DROP VIEW IF EXISTS `v_student_class_profession`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_student_class_profession` AS select `v_students`.`classId` AS `classId`,`v_students`.`stuId` AS `stuId`,`v_students`.`stuNo` AS `stuNo`,`v_students`.`stuName` AS `stuName`,`v_students`.`idcard` AS `idcard`,`v_students`.`birthday` AS `birthday`,`v_students`.`gender` AS `gender`,`v_students`.`phone` AS `phone`,`v_students`.`createTime` AS `createTime`,`v_students`.`updateTime` AS `updateTime`,`v_class_profession`.`className` AS `className`,`v_class_profession`.`profCode` AS `profCode`,`v_class_profession`.`profName` AS `profName`,`v_students`.`status` AS `status`,`v_students`.`statusId` AS `statusId`,`v_class_profession`.`profId` AS `profId` from (`v_class_profession` join `v_students` on((`v_class_profession`.`classId` = `v_students`.`classId`))) ;

-- ----------------------------
-- View structure for v_class_gender
-- ----------------------------
DROP VIEW IF EXISTS `v_class_gender`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_class_gender` AS select `v_student_class_profession`.`className` AS `className`,`v_student_class_profession`.`gender` AS `gender`,count(`v_student_class_profession`.`gender`) AS `人数` from `v_student_class_profession` group by `v_student_class_profession`.`className`,`v_student_class_profession`.`gender` ;
;;
DELIMITER ;
