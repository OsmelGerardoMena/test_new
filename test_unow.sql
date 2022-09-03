/*
SQLyog Ultimate v11.11 (64 bit)
MySQL - 5.5.5-10.4.24-MariaDB : Database - test_unow
*********************************************************************
*/


/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`test_unow` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;

USE `test_unow`;

/*Table structure for table `appointments` */

DROP TABLE IF EXISTS `appointments`;

CREATE TABLE `appointments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_user_doc` int(11) DEFAULT NULL,
  `id_user_patient` int(11) DEFAULT NULL,
  `date` datetime DEFAULT NULL,
  `description` text DEFAULT NULL,
  `status` int(2) DEFAULT 0,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4;

/*Data for the table `appointments` */

insert  into `appointments`(`id`,`id_user_doc`,`id_user_patient`,`date`,`description`,`status`) values (1,2,1,'2022-09-03 13:00:00','prueba',1),(2,2,3,'2022-09-03 15:00:00','gdfgdfg',0),(6,2,1,'2022-09-03 16:00:00','sadasd',0),(7,2,1,'2022-09-03 17:00:00','sadasd',0),(8,2,1,'2022-09-03 17:30:00','sadasd',0);

/*Table structure for table `specialties` */

DROP TABLE IF EXISTS `specialties`;

CREATE TABLE `specialties` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

/*Data for the table `specialties` */

insert  into `specialties`(`id`,`name`,`description`) values (1,'Odontologo',' '),(2,'Pediatra',' ');

/*Table structure for table `status_appointments` */

DROP TABLE IF EXISTS `status_appointments`;

CREATE TABLE `status_appointments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

/*Data for the table `status_appointments` */

insert  into `status_appointments`(`id`,`title`) values (0,'Pendiente'),(1,'Confirmada'),(2,'Rechazada');

/*Table structure for table `user_type` */

DROP TABLE IF EXISTS `user_type`;

CREATE TABLE `user_type` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

/*Data for the table `user_type` */

insert  into `user_type`(`id`,`title`) values (1,'Paciente'),(2,'Doctor');

/*Table structure for table `usermeta` */

DROP TABLE IF EXISTS `usermeta`;

CREATE TABLE `usermeta` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) DEFAULT NULL,
  `meta_key` text DEFAULT NULL,
  `meta_value` text DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

/*Data for the table `usermeta` */

insert  into `usermeta`(`id`,`id_user`,`meta_key`,`meta_value`) values (1,1,'user_type','1'),(2,2,'user_type','2');

/*Table structure for table `users` */

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(100) DEFAULT NULL,
  `last_name` varchar(100) DEFAULT NULL,
  `email` varchar(100) NOT NULL,
  `phone` text DEFAULT NULL,
  `address` text DEFAULT NULL,
  `date_birth` date DEFAULT NULL,
  `date` datetime DEFAULT NULL,
  PRIMARY KEY (`id`,`email`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

/*Data for the table `users` */

insert  into `users`(`id`,`first_name`,`last_name`,`email`,`phone`,`address`,`date_birth`,`date`) values (1,'osmel','mena','g3rardo21@gmail.com','+584124662268','La croquera Palo negro','1992-03-03','2022-09-03 13:43:18'),(2,'Gerardo','Vera','doctosg@gmail.com','+5842436730477','Las delicias','2022-09-03','2022-09-03 13:44:28');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
