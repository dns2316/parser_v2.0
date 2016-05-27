/*
SQLyog Community v12.2.4 (64 bit)
MySQL - 5.6.17 : Database - php_dns
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`php_dns` /*!40100 DEFAULT CHARACTER SET utf8 */;

USE `php_dns`;

/*Table structure for table `habra_post` */

DROP TABLE IF EXISTS `habra_post`;

CREATE TABLE `habra_post` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `title` char(250) NOT NULL,
  `text_body` mediumtext NOT NULL,
  `reg_date` char(11) NOT NULL,
  `full_text` varchar(5000) NOT NULL,
  `next_date` char(11) NOT NULL,
  `link` tinytext NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

/*Data for the table `habra_post` */

insert  into `habra_post`(`id`,`title`,`text_body`,`reg_date`,`full_text`,`next_date`,`link`) values 
(1,'Заголовок','текст','2016-06-27','Весь текст','2016-06-28','https://habrahabr.ru/company/jugru/blog/301754/');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
