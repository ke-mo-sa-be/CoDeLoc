/*
 SQLyog Ultimate v11.33 (64 bit)
 MySQL - 5.5.8-log : Database - db_contagious
 *********************************************************************
 */
/*!40101 SET NAMES utf8 */
;
/*!40101 SET SQL_MODE=''*/
;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */
;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */
;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */
;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */
;
CREATE DATABASE
/*!32312 IF NOT EXISTS*/
`db_contagious`
/*!40100 DEFAULT CHARACTER SET latin1 */
;
USE `db_contagious`;
/*Table structure for table `markers` */
DROP TABLE IF EXISTS `markers`;
CREATE TABLE `markers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(60) NOT NULL,
  `address` varchar(80) NOT NULL,
  `lat` float(10, 6) NOT NULL,
  `lng` float(10, 6) NOT NULL,
  `type` varchar(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE = MyISAM AUTO_INCREMENT = 9 DEFAULT CHARSET = latin1;
/*Data for the table `markers` */
insert into `markers`(`id`, `name`, `address`, `lat`, `lng`, `type`)
values (
    1,
    'Love.Fish',
    '580 Darling Street, Rozelle, NSW',
    -33.861034,
    151.171936,
    'restaurant'
  ),
(
    2,
    'Young Henrys',
    '76 Wilford Street, Newtown, NSW',
    -33.898113,
    151.174469,
    'bar'
  ),
(
    3,
    'Hunter Gatherer',
    'Greenwood Plaza, 36 Blue St, North Sydney NSW',
    -33.840282,
    151.207474,
    'bar'
  ),
(
    4,
    'The Potting Shed',
    '7A, 2 Huntley Street, Alexandria, NSW',
    -33.910751,
    151.194168,
    'bar'
  ),
(
    5,
    'Nomad',
    '16 Foster Street, Surry Hills, NSW',
    -33.879917,
    151.210449,
    'bar'
  ),
(
    6,
    'Three Blue Ducks',
    '43 Macpherson Street, Bronte, NSW',
    -33.906357,
    151.263763,
    'restaurant'
  ),
(
    7,
    'Single Origin Roasters',
    '60-64 Reservoir Street, Surry Hills, NSW',
    -33.881123,
    151.209656,
    'restaurant'
  ),
(
    8,
    'Red Lantern',
    '60 Riley Street, Darlinghurst, NSW',
    -33.874737,
    151.215530,
    'restaurant'
  );
/*Table structure for table `tb_complaint` */
DROP TABLE IF EXISTS `tb_complaint`;
CREATE TABLE `tb_complaint` (
  `comp_id` int(100) NOT NULL AUTO_INCREMENT,
  `pub_id` varchar(200) DEFAULT NULL,
  `subject` varchar(200) DEFAULT NULL,
  `status` varchar(200) DEFAULT NULL,
  `content` varchar(200) DEFAULT NULL,
  `date` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`comp_id`)
) ENGINE = InnoDB AUTO_INCREMENT = 3 DEFAULT CHARSET = latin1;
/*Data for the table `tb_complaint` */
insert into `tb_complaint`(
    `comp_id`,
    `pub_id`,
    `subject`,
    `status`,
    `content`,
    `date`
  )
values (
    1,
    '2',
    'trippin',
    'Pending',
    'some guys going for trips nearby frequently',
    '24/07/20  09:07 am'
  ),
(
    2,
    '2',
    'Trippin Boys',
    'Pending',
    'Bad Boys running around despite curfew',
    '24/07/20  09:07 am'
  );
/*Table structure for table `tb_district` */
DROP TABLE IF EXISTS `tb_district`;
CREATE TABLE `tb_district` (
  `dist_id` int(10) NOT NULL AUTO_INCREMENT,
  `dist_name` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`dist_id`)
) ENGINE = InnoDB AUTO_INCREMENT = 15 DEFAULT CHARSET = latin1;
/*Data for the table `tb_district` */
insert into `tb_district`(`dist_id`, `dist_name`)
values (1, 'Alapuzha'),
(2, 'Ernakulam'),
(3, 'Idukki'),
(4, 'Kannur'),
(5, 'Kasargod'),
(6, 'Kollam '),
(7, 'Kottayam'),
(8, 'Kozhikode'),
(9, 'Malapuram'),
(10, 'Palakkad'),
(11, 'Pathanamthitta'),
(12, 'Thiruvanathapuram'),
(13, 'Trissur'),
(14, 'Wayanad');
/*Table structure for table `tb_locality` */
DROP TABLE IF EXISTS `tb_locality`;
CREATE TABLE `tb_locality` (
  `loc_id` int(100) NOT NULL AUTO_INCREMENT,
  `locality` varchar(100) DEFAULT NULL,
  `district` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`loc_id`)
) ENGINE = InnoDB AUTO_INCREMENT = 6 DEFAULT CHARSET = latin1;
/*Data for the table `tb_locality` */
insert into `tb_locality`(`loc_id`, `locality`, `district`)
values (1, 'Cheranellur', '2'),
(2, 'Edappally', '2'),
(3, 'Aluva', '2'),
(4, 'Thycaud', '12'),
(5, 'Thambaanur', '12');
/*Table structure for table `tb_login` */
DROP TABLE IF EXISTS `tb_login`;
CREATE TABLE `tb_login` (
  `log_id` int(200) NOT NULL AUTO_INCREMENT,
  `user_phone` varchar(200) DEFAULT NULL,
  `user_pass` varchar(200) DEFAULT NULL,
  `reg_id` varchar(200) DEFAULT NULL COMMENT 'Foriegn Key',
  `usertype` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`log_id`)
) ENGINE = InnoDB AUTO_INCREMENT = 7 DEFAULT CHARSET = latin1;
/*Data for the table `tb_login` */
insert into `tb_login`(
    `log_id`,
    `user_phone`,
    `user_pass`,
    `reg_id`,
    `usertype`
  )
values (1, '1231231231', '123123', '0', 'ADMIN'),
(3, '9544351997', '123123', '2', 'PUBLIC'),
(4, '9961263335', '123', '6', 'SQUAD'),
(5, '9567891230', '456', '7', 'SQUAD'),
(6, '7894561230', '789', '8', 'SQUAD');
/*Table structure for table `tb_news` */
DROP TABLE IF EXISTS `tb_news`;
CREATE TABLE `tb_news` (
  `newsid` int(200) NOT NULL AUTO_INCREMENT,
  `title` varchar(200) DEFAULT NULL,
  `content` varchar(200) DEFAULT NULL,
  `date` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`newsid`)
) ENGINE = InnoDB AUTO_INCREMENT = 6 DEFAULT CHARSET = latin1;
/*Data for the table `tb_news` */
insert into `tb_news`(`newsid`, `title`, `content`, `date`)
values (
    1,
    'Corona Spread ',
    'Be aware of community spread. all be careful.',
    '24/07/20'
  ),
(
    2,
    'COVID 19',
    'Vaccine soon to be released',
    '24/07/20'
  ),
(
    3,
    'Water Break',
    'String wind and tsunami detected',
    '24/07/20  08:51:am'
  ),
(
    4,
    'Water Break',
    'Stay Alert',
    '24/07/20  08:51:am'
  ),
(
    5,
    'Bad Weather Ahead',
    'Heavy Rain Expected\r\n',
    '24/07/20  09:07 am'
  );
/*Table structure for table `tb_public` */
DROP TABLE IF EXISTS `tb_public`;
CREATE TABLE `tb_public` (
  `pub_id` int(200) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) DEFAULT NULL,
  `contact` varchar(200) DEFAULT NULL,
  `email` varchar(200) DEFAULT NULL,
  `locality` varchar(100) DEFAULT NULL,
  `district` varchar(100) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `health` varbinary(200) DEFAULT 'normal',
  PRIMARY KEY (`pub_id`)
) ENGINE = InnoDB AUTO_INCREMENT = 3 DEFAULT CHARSET = latin1;
/*Data for the table `tb_public` */
insert into `tb_public`(
    `pub_id`,
    `name`,
    `contact`,
    `email`,
    `locality`,
    `district`,
    `password`,
    `health`
  )
values (
    1,
    'wersdfs',
    'sdfsdfsdf',
    'sdfsdfsd',
    '2',
    '2',
    'sdfsdfsdf',
    'normal'
  ),
(
    2,
    'Adrian',
    '9544351997',
    'adrian@hhh.in',
    '2',
    '2',
    '123123',
    'normal'
  );
/*Table structure for table `tb_quarantine` */
DROP TABLE IF EXISTS `tb_quarantine`;
CREATE TABLE `tb_quarantine` (
  `q_id` int(100) NOT NULL AUTO_INCREMENT,
  `pub_id` varchar(200) DEFAULT NULL,
  `date` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`q_id`)
) ENGINE = InnoDB DEFAULT CHARSET = latin1;
/*Data for the table `tb_quarantine` */
/*Table structure for table `tb_squad` */
DROP TABLE IF EXISTS `tb_squad`;
CREATE TABLE `tb_squad` (
  `squad_id` int(122) NOT NULL AUTO_INCREMENT,
  `sqname` varchar(100) DEFAULT NULL,
  `sqcontact` varchar(100) DEFAULT NULL,
  `sqpass` varchar(200) DEFAULT NULL,
  `dist_id` varchar(100) DEFAULT NULL,
  `loc_id` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`squad_id`)
) ENGINE = InnoDB AUTO_INCREMENT = 9 DEFAULT CHARSET = latin1;
/*Data for the table `tb_squad` */
insert into `tb_squad`(
    `squad_id`,
    `sqname`,
    `sqcontact`,
    `sqpass`,
    `dist_id`,
    `loc_id`
  )
values (6, 'A squad', '9961263335', '123', '2', '1'),
(7, 'Exile Pro', '9567891230', '456', '2', '3'),
(8, 'Flying Cops', '7894561230', '789', '12', '5');
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */
;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */
;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */
;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */
;