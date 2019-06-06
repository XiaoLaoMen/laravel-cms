/*
Navicat MySQL Data Transfer

Source Server         : 本地
Source Server Version : 50553
Source Host           : localhost:3306
Source Database       : yuhe

Target Server Type    : MYSQL
Target Server Version : 50553
File Encoding         : 65001

Date: 2019-05-26 20:25:57
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for admins
-- ----------------------------
DROP TABLE IF EXISTS `admins`;
CREATE TABLE `admins` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) NOT NULL,
  `email` varchar(191) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `admins_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of admins
-- ----------------------------
INSERT INTO `admins` VALUES ('1', 'admin', 'admin@admin.com', null, '$2y$10$vPi9jZOpQf4jT6kkA1W0AeZ8ReEa5hYYTxakc6dc5LJY0yku.cZBu', null, null, null, null);
INSERT INTO `admins` VALUES ('2', 'xxxdfsad', 'xxx@xxx.com', null, '$2y$10$MXmo.3V54SykMcnTt7pBKuH05uS8ue6sRWv0v4XQG4.IPoVyu25We', null, '2019-05-26 11:04:42', '2019-05-26 04:38:40', '2019-05-26 11:04:42');
INSERT INTO `admins` VALUES ('3', 'nicaine', 'nicaine@qq.com', null, '$2y$10$rlYeSub1VrM7wTdJHAd.EusnBuLjJpJHtlYPlblbHplAHPZdHWGKy', null, null, '2019-05-26 11:04:32', '2019-05-26 11:04:32');
