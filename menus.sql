/*
Navicat MySQL Data Transfer

Source Server         : 本地
Source Server Version : 50553
Source Host           : localhost:3306
Source Database       : yuhe

Target Server Type    : MYSQL
Target Server Version : 50553
File Encoding         : 65001

Date: 2019-05-26 19:00:15
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for menus
-- ----------------------------
DROP TABLE IF EXISTS `menus`;
CREATE TABLE `menus` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `pid` int(11) NOT NULL,
  `name` varchar(191) NOT NULL COMMENT '菜单名称',
  `icon` varchar(191) NOT NULL COMMENT '图标',
  `url` varchar(191) NOT NULL COMMENT '导航地址',
  `sort` int(11) NOT NULL,
  `status` int(11) NOT NULL COMMENT '状态 0显示 1不显示',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of menus
-- ----------------------------
INSERT INTO `menus` VALUES ('1', '0', '后台管理', '&#xe696;', 'admin/xx/xx', '0', '0', '2019-05-26 03:57:19', '2019-05-26 10:49:59');
INSERT INTO `menus` VALUES ('2', '1', '菜单管理', '&#xe6a7;', 'backstage/menu/index', '0', '0', '2019-05-26 03:59:40', '2019-05-26 04:30:24');
INSERT INTO `menus` VALUES ('3', '2', '添加', '&#xe6a7;', 'backstage/menu/create', '0', '1', '2019-05-26 12:00:22', '2019-05-26 12:00:24');
INSERT INTO `menus` VALUES ('4', '2', '新增', '&#xe6a7;', 'backstage/menu/store', '0', '1', '2019-05-26 12:01:01', '2019-05-26 12:01:07');
INSERT INTO `menus` VALUES ('5', '2', '编辑', '&#xe6a7;', 'backstage/menu/edit', '0', '1', '2019-05-26 12:01:27', '2019-05-26 12:01:29');
INSERT INTO `menus` VALUES ('6', '2', '修改', '&#xe6a7;', 'backstage/menu/update', '0', '1', '2019-05-26 12:01:52', '2019-05-26 12:01:54');
INSERT INTO `menus` VALUES ('7', '2', '删除', '&#xe6a7;', 'backstage/menu/del', '0', '1', '2019-05-26 12:03:16', '2019-05-26 12:03:18');
INSERT INTO `menus` VALUES ('8', '1', '角色管理', '&#xe6a7;', 'backstage/role/index', '0', '0', '2019-05-26 03:59:40', '2019-05-26 03:59:40');
INSERT INTO `menus` VALUES ('9', '8', '添加', '&#xe6a7;', 'backstage/role/create', '0', '1', '2019-05-26 12:00:22', '2019-05-26 12:00:24');
INSERT INTO `menus` VALUES ('10', '8', '新增', '&#xe6a7;', 'backstage/role/store', '0', '1', '2019-05-26 12:01:01', '2019-05-26 12:01:07');
INSERT INTO `menus` VALUES ('11', '8', '编辑', '&#xe6a7;', 'backstage/role/edit', '0', '1', '2019-05-26 12:01:27', '2019-05-26 12:01:29');
INSERT INTO `menus` VALUES ('12', '8', '修改', '&#xe6a7;', 'backstage/role/update', '0', '1', '2019-05-26 12:01:52', '2019-05-26 12:01:54');
INSERT INTO `menus` VALUES ('13', '8', '删除', '&#xe6a7;', 'backstage/role/del', '0', '1', '2019-05-26 12:03:16', '2019-05-26 12:03:18');
INSERT INTO `menus` VALUES ('14', '8', '授权', '&#xe6a7;', 'backstage/permission/roleauthorize', '0', '1', '2019-05-26 12:03:16', '2019-05-26 12:03:18');
INSERT INTO `menus` VALUES ('15', '8', '授权修改', '&#xe6a7;', 'backstage/permission/roleauthorizeupdate', '0', '1', '2019-05-26 12:03:16', '2019-05-26 12:03:18');
INSERT INTO `menus` VALUES ('16', '1', '管理员', '&#xe6a7;', 'backstage/admin/index', '0', '0', '2019-05-26 03:59:40', '2019-05-26 03:59:40');
INSERT INTO `menus` VALUES ('17', '16', '添加', '&#xe6a7;', 'backstage/admin/create', '0', '1', '2019-05-26 12:00:22', '2019-05-26 12:00:24');
INSERT INTO `menus` VALUES ('18', '16', '新增', '&#xe6a7;', 'backstage/admin/store', '0', '1', '2019-05-26 12:01:01', '2019-05-26 12:01:07');
INSERT INTO `menus` VALUES ('19', '16', '编辑', '&#xe6a7;', 'backstage/admin/edit', '0', '1', '2019-05-26 12:01:27', '2019-05-26 12:01:29');
INSERT INTO `menus` VALUES ('20', '16', '修改', '&#xe6a7;', 'backstage/admin/update', '0', '1', '2019-05-26 12:01:52', '2019-05-26 12:01:54');
INSERT INTO `menus` VALUES ('21', '16', '加入回收站', '&#xe6a7;', 'backstage/admin/del', '0', '1', '2019-05-26 12:03:16', '2019-05-26 12:03:18');
INSERT INTO `menus` VALUES ('22', '16', '移除回收站', '&#xe6a7;', 'backstage/admin/restore', '0', '1', '2019-05-26 12:03:16', '2019-05-26 12:03:18');
