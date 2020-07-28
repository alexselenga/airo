/*
SQLyog Ultimate v12.14 (64 bit)
MySQL - 5.7.25-log : Database - airo
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`airo` /*!40100 DEFAULT CHARACTER SET utf8 */;

USE `airo`;

/*Table structure for table `article` */

DROP TABLE IF EXISTS `article`;

CREATE TABLE `article` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `category_id` int(10) unsigned NOT NULL COMMENT 'Категория',
  `name` varchar(255) NOT NULL COMMENT 'Название',
  `description` text COMMENT 'Описание',
  `is_active` tinyint(1) NOT NULL DEFAULT '0' COMMENT 'Активность',
  PRIMARY KEY (`id`),
  KEY `article-category-idx` (`category_id`),
  CONSTRAINT `article-category-idx` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

/*Data for the table `article` */

insert  into `article`(`id`,`category_id`,`name`,`description`,`is_active`) values 
(1,3,'ww','www',1),
(2,2,'qq','qqq',0);

/*Table structure for table `category` */

DROP TABLE IF EXISTS `category`;

CREATE TABLE `category` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL COMMENT 'Название',
  `description` text COMMENT 'Описание',
  `is_active` tinyint(1) NOT NULL DEFAULT '0' COMMENT 'Активность',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

/*Data for the table `category` */

insert  into `category`(`id`,`name`,`description`,`is_active`) values 
(2,'q','qq',1),
(3,'w','ww',0),
(4,'r','rr',1),
(5,'y','yy',0);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
