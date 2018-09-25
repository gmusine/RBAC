/*
SQLyog Community v13.0.1 (64 bit)
MySQL - 5.6.41-log : Database - application_list
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`application_list` /*!40100 DEFAULT CHARACTER SET utf8 */;

USE `application_list`;

/*Table structure for table `appl_auth_assignment` */

DROP TABLE IF EXISTS `appl_auth_assignment`;

CREATE TABLE `appl_auth_assignment` (
  `item_name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `user_id` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `fk_app_list` int(11) DEFAULT NULL,
  PRIMARY KEY (`item_name`,`user_id`),
  KEY `fk_app_list` (`fk_app_list`),
  CONSTRAINT `appl_auth_assignment_ibfk_1` FOREIGN KEY (`item_name`) REFERENCES `appl_auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `appl_auth_assignment_ibfk_2` FOREIGN KEY (`fk_app_list`) REFERENCES `appl_list` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Table structure for table `appl_auth_item` */

DROP TABLE IF EXISTS `appl_auth_item`;

CREATE TABLE `appl_auth_item` (
  `name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `type` int(11) NOT NULL,
  `description` text COLLATE utf8_unicode_ci,
  `rule_name` varchar(64) COLLATE utf8_unicode_ci DEFAULT NULL,
  `data` text COLLATE utf8_unicode_ci,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT NULL,
  `fk_app_list` int(11) DEFAULT NULL,
  PRIMARY KEY (`name`),
  KEY `rule_name` (`rule_name`),
  KEY `idx-auth_item-type` (`type`),
  KEY `fk_app_list` (`fk_app_list`),
  CONSTRAINT `appl_auth_item_ibfk_1` FOREIGN KEY (`rule_name`) REFERENCES `appl_auth_rule` (`name`) ON DELETE SET NULL ON UPDATE CASCADE,
  CONSTRAINT `appl_auth_item_ibfk_2` FOREIGN KEY (`fk_app_list`) REFERENCES `appl_list` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Table structure for table `appl_auth_item_child` */

DROP TABLE IF EXISTS `appl_auth_item_child`;

CREATE TABLE `appl_auth_item_child` (
  `parent` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `child` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`parent`,`child`),
  KEY `child` (`child`),
  CONSTRAINT `appl_auth_item_child_ibfk_1` FOREIGN KEY (`parent`) REFERENCES `appl_auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `appl_auth_item_child_ibfk_2` FOREIGN KEY (`child`) REFERENCES `appl_auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Table structure for table `appl_auth_rule` */

DROP TABLE IF EXISTS `appl_auth_rule`;

CREATE TABLE `appl_auth_rule` (
  `name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `data` text COLLATE utf8_unicode_ci,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Table structure for table `appl_list` */

DROP TABLE IF EXISTS `appl_list`;

CREATE TABLE `appl_list` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `app_name` varchar(50) NOT NULL COMMENT 'application name',
  `description` text COMMENT 'details of the application',
  `dev_framework` varchar(25) DEFAULT NULL COMMENT 'Development framework used',
  `owner` varchar(20) DEFAULT NULL COMMENT 'request owner/study owner',
  `url` varchar(50) DEFAULT NULL COMMENT 'application location',
  `fk_study` int(11) DEFAULT NULL COMMENT 'the dependant study',
  `date_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'date record created',
  `date_modified` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `feature_image` blob COMMENT 'image used on application feature',
  `status` int(1) DEFAULT '0' COMMENT '1= active , 0=inactive',
  PRIMARY KEY (`id`),
  KEY `lst_fk_study_ind` (`fk_study`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
