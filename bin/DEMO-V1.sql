# ************************************************************
# Sequel Pro SQL dump
# Version 4541
#
# http://www.sequelpro.com/
# https://github.com/sequelpro/sequelpro
#
# Host: 127.0.0.1 (MySQL 5.7.23)
# Database: sqs_web_demo
# Generation Time: 2018-12-03 12:24:15 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table assigned_features
# ------------------------------------------------------------

DROP TABLE IF EXISTS `assigned_features`;

CREATE TABLE `assigned_features` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `feature_number` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `time_added` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `assigned_features` WRITE;
/*!40000 ALTER TABLE `assigned_features` DISABLE KEYS */;

INSERT INTO `assigned_features` (`id`, `feature_number`, `user_id`, `time_added`)
VALUES
	(1,2,6,'2018-12-03 02:54:40'),
	(2,8,6,'2018-12-03 03:22:05'),
	(3,105,6,'2018-12-03 02:54:41'),
	(4,109,6,'2018-12-03 02:54:42'),
	(5,116,6,'2018-12-03 02:54:43'),
	(6,2,1,'2018-12-03 02:54:40'),
	(7,8,1,'2018-12-03 03:22:05'),
	(8,105,1,'2018-12-03 02:54:41'),
	(9,109,1,'2018-12-03 02:54:42'),
	(10,116,1,'2018-12-03 02:54:43'),
	(11,2,2,'2018-12-03 02:54:40'),
	(12,8,2,'2018-12-03 03:22:05'),
	(13,105,2,'2018-12-03 02:54:41'),
	(14,109,2,'2018-12-03 02:54:42'),
	(15,116,2,'2018-12-03 02:54:43'),
	(16,1,3,'2018-12-03 02:54:40'),
	(17,6,3,'2018-12-03 03:22:05'),
	(18,103,3,'2018-12-03 02:54:41'),
	(19,109,3,'2018-12-03 02:54:42'),
	(20,115,3,'2018-12-03 02:54:43'),
	(21,3,4,'2018-12-03 02:54:40'),
	(22,7,4,'2018-12-03 03:22:05'),
	(23,103,4,'2018-12-03 02:54:41'),
	(24,109,4,'2018-12-03 02:54:42'),
	(25,115,4,'2018-12-03 02:54:43'),
	(26,3,5,'2018-12-03 02:54:40'),
	(27,7,5,'2018-12-03 03:22:05'),
	(28,103,5,'2018-12-03 02:54:41'),
	(29,110,5,'2018-12-03 02:54:42'),
	(30,115,5,'2018-12-03 02:54:43');

/*!40000 ALTER TABLE `assigned_features` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table features_available
# ------------------------------------------------------------

DROP TABLE IF EXISTS `features_available`;

CREATE TABLE `features_available` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(30) DEFAULT NULL,
  `description` varchar(500) DEFAULT NULL,
  `feature_group_name` varchar(45) DEFAULT '0',
  `version` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `unique_name` (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `features_available` WRITE;
/*!40000 ALTER TABLE `features_available` DISABLE KEYS */;

INSERT INTO `features_available` (`id`, `name`, `description`, `feature_group_name`, `version`)
VALUES
	(1,'youtube_0.php','Default embedded YouTube video of SQS holiday video.','youtube',0),
	(2,'youtube_1.php','Embedded YouTube video that does not autoplay.','youtube',1),
	(4,'youtube_2.php','','youtube',2),
	(5,'youtube_3.php','','youtube',3),
	(6,'youtube_4.php','','youtube',4),
	(7,'googlemap_0.php','Default embedded Google Map centered on Lexington, KY.','googlemap',0),
	(8,'googlemap_1.php','','googlemap',1),
	(100,'googlemap_2.php','','googlemap',2),
	(101,'googlemap_3.php','','googlemap',3),
	(102,'googlemap_4.php','','googlemap',4),
	(103,'groupcard_0.php','','groupcard',0),
	(104,'groupcard_1.php','','groupcard',1),
	(105,'groupcard_2.php','','groupcard',2),
	(106,'groupcard_3.php','','groupcard',3),
	(107,'groupcard_4.php','','groupcard',4),
	(109,'profilecard_0.php','','profilecard',0),
	(110,'profilecard_1.php','','profilecard',1),
	(111,'profilecard_2.php','','profilecard',2),
	(112,'profilecard_3.php','','profilecard',3),
	(113,'profilecard_4.php','','profilecard',4),
	(114,'profileedit_0.php','','profileedit',0),
	(115,'profileedit_1.php','','profileedit',1),
	(116,'profileedit_2.php','','profileedit',2),
	(117,'profileedit_3.php','','profileedit',3),
	(118,'profileedit_4.php','','profileedit',4);

/*!40000 ALTER TABLE `features_available` ENABLE KEYS */;
UNLOCK TABLES;
# Dump of table group_members
# ------------------------------------------------------------

DROP TABLE IF EXISTS `group_members`;

CREATE TABLE `group_members` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `group_id` int(11) DEFAULT NULL,
  `leader` tinyint(1) DEFAULT '0',
  `date_joined` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `uid` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `membership` (`group_id`,`uid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `group_members` WRITE;
/*!40000 ALTER TABLE `group_members` DISABLE KEYS */;

INSERT INTO `group_members` (`id`, `group_id`, `leader`, `date_joined`, `uid`)
VALUES
	(101,12,0,'1979-09-20 04:02:26',1),
	(102,1,1,'1971-06-23 10:21:46',8),
	(103,12,1,'1988-03-06 12:46:27',9),
	(104,2,1,'1991-04-30 11:25:42',2),
	(105,12,1,'1989-11-01 16:32:31',5),
	(106,5,1,'1988-05-26 12:23:03',4),
	(108,5,1,'2017-10-24 02:17:57',6),
	(109,3,1,'1973-06-12 21:34:29',3),
	(110,12,1,'1993-04-26 01:31:56',6),
	(111,3,1,'2016-05-21 03:46:42',9),
	(112,5,0,'2003-02-17 10:43:28',1),
	(113,13,1,'2003-06-24 18:55:19',3),
	(114,8,1,'1988-12-08 06:17:26',8),
	(115,4,1,'2016-12-17 07:33:53',9),
	(117,12,0,'2004-06-08 21:55:01',8),
	(118,3,1,'1996-06-29 04:19:53',1),
	(119,12,1,'2002-07-03 01:34:47',7),
	(120,13,1,'2011-04-24 02:46:31',8),
	(121,11,0,'1978-10-10 15:39:05',2),
	(122,6,1,'2018-01-03 14:02:11',3),
	(123,6,1,'1972-05-03 16:04:36',7),
	(124,5,0,'1982-09-27 14:49:14',5),
	(125,4,1,'1992-12-12 12:24:51',8),
	(126,1,0,'1973-05-06 15:43:39',4),
	(127,4,0,'1997-01-23 20:44:16',6),
	(128,6,0,'2012-12-06 10:10:07',1),
	(130,14,0,'2013-02-07 15:44:29',7),
	(131,14,1,'2002-10-23 05:32:46',6),
	(132,15,1,'1970-06-26 16:16:14',6),
	(133,8,1,'1982-09-17 10:57:55',7),
	(135,11,0,'2005-04-01 11:59:05',0),
	(136,10,1,'2005-09-17 20:36:49',3),
	(138,2,0,'2017-07-01 16:53:45',8),
	(139,6,1,'1982-09-29 02:36:23',2),
	(140,8,1,'2013-08-06 23:21:03',3),
	(141,8,0,'2010-12-21 18:02:37',9),
	(142,15,1,'1974-02-27 22:01:09',5),
	(143,1,1,'1977-10-11 15:12:33',2),
	(144,7,1,'1978-06-24 10:35:50',9),
	(145,5,1,'2001-07-31 15:52:26',0),
	(146,5,0,'1997-12-07 20:23:08',9),
	(148,15,0,'1988-05-07 01:40:36',3),
	(150,6,1,'2001-10-28 23:13:42',5),
	(151,12,0,'1988-11-12 14:37:15',3),
	(152,8,0,'2017-04-26 06:36:37',5),
	(153,4,0,'2016-10-03 05:54:06',0),
	(154,1,1,'1977-05-12 21:27:40',9),
	(156,11,1,'1972-08-04 18:25:55',8),
	(157,13,0,'2002-12-18 12:33:47',2),
	(158,12,1,'2014-09-14 22:13:24',2),
	(162,13,1,'1995-06-19 06:41:40',9),
	(163,6,1,'1973-12-15 02:01:13',4),
	(164,7,1,'2014-01-27 01:31:32',3),
	(165,3,1,'1986-10-24 12:08:51',2),
	(166,4,0,'1996-11-07 15:26:22',1),
	(167,11,1,'2002-04-03 02:56:58',6),
	(168,5,1,'2002-08-09 20:10:36',3),
	(171,15,1,'2013-06-23 10:14:03',7),
	(175,15,1,'2001-12-18 16:55:26',9),
	(176,8,0,'2013-08-17 12:50:48',6),
	(177,3,1,'1991-07-30 03:56:15',5),
	(179,4,0,'2015-10-22 04:00:32',4),
	(182,14,0,'2012-10-08 22:43:54',8),
	(183,1,1,'1976-12-12 14:11:29',1),
	(184,10,1,'2011-12-10 16:33:07',7),
	(187,2,1,'2001-05-10 17:31:46',7),
	(188,12,0,'2003-07-30 12:01:50',4),
	(190,1,0,'2004-10-28 03:26:21',6),
	(191,9,1,'1970-04-04 08:06:20',8),
	(195,8,0,'1984-02-05 20:01:38',2),
	(196,13,1,'2012-11-21 05:05:28',4),
	(197,10,0,'1994-04-22 10:59:48',6),
	(199,3,0,'2010-04-20 04:58:24',4),
	(200,1,0,'2012-12-25 01:11:10',7),
	(302,15,1,'2015-08-21 05:54:44',4),
	(304,7,0,'1997-05-11 06:48:19',0),
	(306,7,0,'1973-02-25 01:10:00',6),
	(307,10,1,'2001-10-26 22:26:39',1),
	(308,7,1,'1982-12-31 05:02:18',8),
	(309,4,1,'2006-06-27 11:21:03',2),
	(313,14,0,'2018-01-27 18:52:33',9),
	(316,9,0,'1992-11-11 08:07:04',9),
	(320,8,0,'1983-04-20 02:25:38',4),
	(321,13,0,'1976-01-06 08:45:55',6),
	(327,9,1,'2008-04-25 06:47:19',3),
	(328,7,1,'2012-08-13 12:08:54',5),
	(329,3,1,'2014-05-09 07:18:55',8),
	(330,3,1,'1983-11-06 23:40:47',6),
	(332,2,0,'1986-03-27 01:19:46',0),
	(340,7,0,'1988-06-17 18:06:39',1),
	(341,14,0,'1975-10-11 00:26:47',3),
	(344,2,0,'1981-12-09 12:27:37',3),
	(346,8,0,'1987-08-08 21:26:26',1),
	(350,15,0,'2006-06-06 11:31:44',0),
	(353,6,1,'2016-01-28 15:22:14',9),
	(356,3,0,'2011-02-05 13:13:00',7),
	(361,11,1,'2005-05-09 11:27:51',9),
	(364,10,1,'2006-12-15 13:35:24',4),
	(367,6,0,'2011-06-21 07:04:57',6),
	(368,9,1,'1988-09-13 12:37:57',2),
	(372,6,0,'2014-05-30 02:04:05',8),
	(376,14,1,'1972-06-25 05:53:29',4),
	(381,10,0,'1988-07-12 21:23:21',5),
	(383,2,0,'2006-05-23 20:12:29',1),
	(386,15,0,'1996-05-26 09:59:53',2),
	(396,9,1,'2010-07-31 02:55:58',1),
	(398,14,1,'1978-12-19 02:48:33',1);

/*!40000 ALTER TABLE `group_members` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table groups
# ------------------------------------------------------------

DROP TABLE IF EXISTS `groups`;

CREATE TABLE `groups` (
  `UID` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(30) NOT NULL,
  `date_established` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`UID`),
  UNIQUE KEY `name` (`name`),
  UNIQUE KEY `UID` (`UID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `groups` WRITE;
/*!40000 ALTER TABLE `groups` DISABLE KEYS */;

INSERT INTO `groups` (`UID`, `name`, `date_established`)
VALUES
	(1,'Smitham PLC','1998-07-22 11:05:38'),
	(2,'Turner, Rempel and Zieme','1984-10-02 00:57:01'),
	(3,'Rogahn PLC','1998-04-17 19:01:38'),
	(4,'Ebert-Daugherty','1983-12-08 06:16:46'),
	(5,'Hahn LLC','2010-02-18 12:34:41'),
	(6,'Kihn, Konopelski and Crona','1975-05-15 15:00:09'),
	(7,'Schmidt and Sons','1971-01-16 19:35:04'),
	(8,'Ullrich Group','1980-07-22 20:04:28'),
	(9,'Kunze-Schultz','2014-02-10 19:29:42'),
	(10,'Williamson, Considine and Mill','1996-01-02 23:52:17'),
	(11,'Gutkowski Inc','2004-05-13 14:33:28'),
	(12,'Wintheiser, Haag and Spencer','1980-08-14 00:28:34'),
	(13,'Hahn-Ortiz','2009-02-05 01:23:03'),
	(14,'Blanda LLC','1986-07-07 05:25:31'),
	(15,'Douglas Group','2016-11-22 03:20:27');

/*!40000 ALTER TABLE `groups` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table hardware_skills
# ------------------------------------------------------------

DROP TABLE IF EXISTS `hardware_skills`;

CREATE TABLE `hardware_skills` (
  `UID` int(11) NOT NULL AUTO_INCREMENT,
  `skill` char(30) NOT NULL,
  UNIQUE KEY `UID` (`UID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

LOCK TABLES `hardware_skills` WRITE;
/*!40000 ALTER TABLE `hardware_skills` DISABLE KEYS */;

INSERT INTO `hardware_skills` (`UID`, `skill`)
VALUES
	(1,'Computer Assembly'),
	(2,'Computer Maintenance'),
	(15,'Troubleshooting'),
	(4,'Printer & Cartage Refilling'),
	(5,'Operation Monitoring'),
	(6,'Network Processing'),
	(7,'Disaster Recovery'),
	(8,'Circuit Design Knowledge'),
	(9,'Systems Analysis'),
	(10,'Installing Applications'),
	(11,'Installing Components & Driver'),
	(12,'Backup Management, Reporting &');

/*!40000 ALTER TABLE `hardware_skills` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table phone_list
# ------------------------------------------------------------

DROP TABLE IF EXISTS `phone_list`;

CREATE TABLE `phone_list` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `phone_number` varchar(20) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `date_added` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `carrier` varchar(10) DEFAULT NULL,
  `international_code` varchar(4) DEFAULT NULL,
  `primary_phone` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `u_phone_number` (`phone_number`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `phone_list` WRITE;
/*!40000 ALTER TABLE `phone_list` DISABLE KEYS */;

INSERT INTO `phone_list` (`id`, `phone_number`, `user_id`, `date_added`, `carrier`, `international_code`, `primary_phone`)
VALUES
	(1,'652-295-5291x18365',1,'1980-07-05 00:49:15','T-Mobile','1',0),
	(2,'006.558.9436',2,'1977-01-31 19:18:07','AT&T','1',1),
	(3,'256-369-7770x913',3,'2007-11-18 01:59:57','T-Mobile','1',1),
	(4,'1-513-447-2550',4,'1977-08-15 16:10:24','Sprint','1',1),
	(5,'967.706.7490',5,'2014-11-14 15:55:07','T-Mobile','1',0),
	(6,'350.846.8414',6,'1970-01-06 06:09:19','T-Mobile','1',0),
	(7,'960.640.9587x7725',7,'1993-05-01 09:10:12','Verizon','1',0),
	(8,'(761)336-9421x988',8,'1976-10-17 03:12:18','T-Mobile','1',0),
	(9,'849-228-6210x41200',9,'2017-01-16 02:30:28','AT&T','1',1),
	(10,'356.922.8324',10,'1972-01-16 21:17:47','T-Mobile','1',1),
	(11,'883.654.1049',11,'2017-12-25 18:42:28','Sprint','1',1),
	(12,'275.364.8079x47082',12,'1995-12-31 13:09:37','Verizon','1',0),
	(13,'1-842-490-0471x10557',13,'1979-11-01 17:36:23','T-Mobile','1',1),
	(14,'710.566.1147x40509',14,'1992-08-18 22:28:19','AT&T','1',0),
	(15,'801-673-7274x1177',15,'2017-02-08 11:17:43','AT&T','1',0),
	(16,'667.713.5060x940',16,'1991-10-16 20:55:51','T-Mobile','1',1),
	(17,'(626)537-3166x19841',17,'2012-05-14 05:53:40','Verizon','1',1),
	(18,'148-017-7192',18,'1973-03-03 18:32:52','Verizon','1',1),
	(19,'1-595-829-1394x731',19,'2012-04-09 13:35:05','Verizon','1',1),
	(20,'1-117-344-3444x6801',20,'1993-11-05 05:00:21','Verizon','1',1),
	(21,'602-057-5909x3284',21,'1985-02-24 07:53:04','Sprint','1',1),
	(22,'(860)157-2350x46424',22,'2017-07-23 22:52:55','Verizon','1',0),
	(23,'(259)267-8137',23,'1987-06-06 18:38:07','AT&T','1',1),
	(24,'(865)841-8363',24,'2018-02-13 12:49:54','T-Mobile','1',0),
	(25,'568.027.6893x05505',25,'1995-11-24 13:28:46','AT&T','1',0),
	(26,'(365)812-4918x35044',26,'1972-07-28 07:28:02','T-Mobile','1',0),
	(27,'1-489-819-8235x0975',27,'1978-04-14 19:17:30','T-Mobile','1',0),
	(28,'1-580-936-7676',28,'1973-01-26 06:17:40','Verizon','1',1),
	(29,'1-965-404-5720x1976',29,'1994-08-20 09:17:26','Verizon','1',1),
	(30,'264.560.8063x47415',30,'2013-10-14 15:38:25','Sprint','1',0),
	(31,'07079448545',31,'1991-05-13 08:50:02','Verizon','1',0),
	(32,'+42(5)2357569933',32,'2010-03-11 05:14:54','AT&T','1',1),
	(33,'+55(1)9949676414',33,'1977-12-02 09:14:35','T-Mobile','1',0),
	(34,'1-986-991-5541',34,'2017-05-29 05:46:00','T-Mobile','1',1),
	(35,'08186063973',35,'2006-04-19 04:37:33','T-Mobile','1',0),
	(36,'1-146-509-9686x930',36,'1999-08-27 14:34:43','T-Mobile','1',1),
	(37,'1-121-883-2481x5033',37,'1974-02-19 19:24:33','Sprint','1',1),
	(38,'1-588-896-3678x29765',38,'1994-02-03 08:39:36','Sprint','1',0),
	(39,'(139)344-0187',39,'1981-09-06 04:08:46','AT&T','1',1),
	(40,'616.542.6674x804',40,'1971-09-07 04:15:49','AT&T','1',0),
	(41,'069.888.4105x989',41,'2016-10-14 14:06:34','AT&T','1',1),
	(42,'(695)050-7818x609',42,'1980-12-31 21:36:09','AT&T','1',1),
	(43,'(710)205-2352x936',43,'1988-02-06 22:17:31','T-Mobile','1',0),
	(44,'470-180-6872x677',44,'2011-08-09 01:17:49','Verizon','1',1),
	(45,'+82(9)2475400140',45,'2016-07-20 05:03:29','T-Mobile','1',1),
	(46,'815-139-4839',46,'1979-07-30 21:01:53','T-Mobile','1',0),
	(47,'149-960-7359x41092',47,'2000-06-15 13:20:27','AT&T','1',1),
	(48,'651-398-3925x45706',48,'1970-09-10 14:53:06','Verizon','1',0),
	(49,'1-362-503-3130x25719',49,'2011-08-08 15:58:49','Sprint','1',0),
	(50,'1-995-415-2763',50,'1974-06-19 03:47:42','Verizon','1',0),
	(51,'(511)982-8476',51,'2001-12-19 21:15:48','Sprint','1',0),
	(52,'(683)890-6471x517',52,'1977-10-19 22:23:46','Verizon','1',0),
	(53,'179-385-2864',53,'1970-07-18 05:36:54','Sprint','1',1),
	(54,'(834)784-3407',54,'2002-03-05 01:36:36','AT&T','1',1),
	(55,'1-099-094-8886',55,'1974-03-03 02:53:43','AT&T','1',0),
	(56,'05570917797',56,'2013-06-05 22:59:32','Verizon','1',1),
	(57,'(061)900-7970',57,'1979-03-06 21:36:13','T-Mobile','1',1),
	(58,'791.787.2728',58,'2009-07-21 07:04:25','Sprint','1',0),
	(59,'567-075-5831x1900',59,'2000-07-02 12:12:29','AT&T','1',0),
	(60,'902.983.1493',60,'1982-05-01 13:50:02','T-Mobile','1',0),
	(61,'(965)309-8982x8396',61,'2008-11-25 23:22:00','Sprint','1',1),
	(62,'+51(8)6498256809',62,'1989-06-23 11:16:39','Sprint','1',1),
	(63,'1-325-181-0578x7284',63,'1974-12-15 11:58:36','T-Mobile','1',0),
	(64,'05761046070',64,'1975-03-12 13:02:58','Verizon','1',1),
	(65,'+89(3)5088319757',65,'1983-11-06 10:19:48','Sprint','1',0),
	(66,'1-945-339-7562x08378',66,'2018-06-01 10:00:28','Sprint','1',1),
	(67,'(919)256-6556x0671',67,'1994-04-25 04:12:25','Verizon','1',1),
	(68,'808-457-7709x25815',68,'1980-02-02 07:37:57','Verizon','1',1),
	(69,'488-614-7787x4752',69,'1985-05-29 20:44:24','T-Mobile','1',1),
	(70,'1-098-158-2143x5218',70,'1983-08-02 07:45:06','Verizon','1',0),
	(71,'402.626.1953x935',71,'1991-06-13 23:45:39','Verizon','1',0),
	(72,'(596)467-6770x53424',72,'1978-09-10 22:22:53','Verizon','1',0),
	(73,'893.880.7852',73,'2008-01-07 23:01:49','Verizon','1',1),
	(74,'1-268-601-7885x77484',74,'1977-06-05 07:06:26','Sprint','1',0),
	(75,'07006803612',75,'1976-12-06 14:26:41','Verizon','1',0),
	(76,'1-982-318-3595x98844',76,'2017-05-18 05:52:14','Verizon','1',0),
	(77,'1-388-758-2534',77,'2005-06-02 14:13:34','Verizon','1',0),
	(78,'310-586-1766',78,'1981-04-23 11:02:47','Verizon','1',1),
	(79,'(723)350-3144',79,'2012-02-06 19:34:48','Verizon','1',0),
	(80,'(271)606-4806x4177',80,'1983-12-08 19:16:21','T-Mobile','1',1),
	(81,'626.418.2000x537',81,'1995-01-09 04:20:54','AT&T','1',1),
	(82,'(021)788-3679',82,'1999-05-26 05:51:26','Verizon','1',1),
	(83,'551-098-4384',83,'1998-08-20 02:22:53','Sprint','1',0),
	(84,'1-343-439-0073x33403',84,'2000-10-07 19:00:17','T-Mobile','1',0),
	(85,'1-415-932-7511x081',85,'1998-12-19 03:55:21','AT&T','1',1),
	(86,'831.453.3272x056',86,'1978-12-16 02:28:47','AT&T','1',0),
	(87,'(646)106-3305x66799',87,'1976-06-30 10:01:22','T-Mobile','1',0),
	(88,'(660)095-0544',88,'1985-02-26 11:12:40','Sprint','1',0),
	(89,'321.739.2053x1845',89,'1974-10-31 07:16:21','AT&T','1',1),
	(90,'323-104-3115x5814',90,'1984-03-15 21:07:42','Sprint','1',0),
	(91,'+05(6)1976309196',91,'2008-08-30 04:02:49','Verizon','1',0),
	(92,'289-013-8691x657',92,'1998-04-27 22:19:45','T-Mobile','1',0),
	(93,'1-257-199-2501',93,'2003-04-01 20:01:46','AT&T','1',0),
	(94,'+47(2)3635392457',94,'1996-01-18 19:34:24','AT&T','1',1),
	(95,'+46(9)5734296815',95,'1975-06-01 23:54:50','Verizon','1',0),
	(96,'+94(4)9017237533',96,'2001-09-11 08:04:50','AT&T','1',0),
	(97,'1-018-751-4720',97,'1987-03-09 06:23:15','T-Mobile','1',0),
	(98,'03982503659',98,'1989-09-06 20:13:33','Sprint','1',0),
	(99,'331.006.6159',99,'1991-07-01 23:01:19','AT&T','1',1),
	(100,'684.515.2140x90085',100,'1998-12-24 05:39:33','AT&T','1',1);

/*!40000 ALTER TABLE `phone_list` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table software_skills
# ------------------------------------------------------------

DROP TABLE IF EXISTS `software_skills`;

CREATE TABLE `software_skills` (
  `UID` int(11) NOT NULL AUTO_INCREMENT,
  `skill` varchar(30) NOT NULL,
  PRIMARY KEY (`UID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

LOCK TABLES `software_skills` WRITE;
/*!40000 ALTER TABLE `software_skills` DISABLE KEYS */;

INSERT INTO `software_skills` (`UID`, `skill`)
VALUES
	(1,'C++'),
	(42,'C'),
	(3,'Python'),
	(46,'PHP'),
	(5,'Ruby'),
	(6,'Java'),
	(43,'C#'),
	(9,'Perl'),
	(10,'Graphics'),
	(11,'Javascript'),
	(12,'SQL'),
	(13,'.NET'),
	(14,'Visual Basic'),
	(15,'Prolog'),
	(16,'Animation'),
	(17,'R'),
	(18,'Swift'),
	(47,'Assembly'),
	(20,'Pascal'),
	(21,'Go'),
	(22,'Web Design'),
	(23,'HTML'),
	(24,'CSS'),
	(25,'Objective-C'),
	(26,'Shell'),
	(27,'MATLAB'),
	(28,'SAS'),
	(29,'Scratch'),
	(30,'Cloud Computing'),
	(31,'Microsoft Office'),
	(32,'Enterprise Systems'),
	(33,'Android'),
	(34,'IOS/MAC OS X'),
	(35,'Windows'),
	(36,'Linux'),
	(37,'Client/Server');

/*!40000 ALTER TABLE `software_skills` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table user
# ------------------------------------------------------------

DROP TABLE IF EXISTS `user`;

CREATE TABLE `user` (
  `UID` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(25) NOT NULL,
  `last_name` varchar(25) NOT NULL,
  `email` varchar(254) NOT NULL,
  `role` varchar(64) NOT NULL DEFAULT 'USER',
  `password` varchar(64) NOT NULL,
  `level` int(11) NOT NULL DEFAULT '3',
  `gender` varchar(10) DEFAULT NULL,
  `dateofbirth` date DEFAULT NULL,
  `address` varchar(256) DEFAULT NULL,
  `city` varchar(64) DEFAULT NULL,
  `state` varchar(2) DEFAULT NULL,
  `zip` int(5) DEFAULT NULL,
  `photo` varchar(256) DEFAULT NULL,
  `progress` int(11) NOT NULL DEFAULT '50',
  `hash` varchar(32) DEFAULT NULL,
  `verified` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`UID`),
  UNIQUE KEY `UID` (`UID`),
  UNIQUE KEY `Email` (`email`(54))
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;

INSERT INTO `user` (`UID`, `first_name`, `last_name`, `email`, `role`, `password`, `level`, `gender`, `dateofbirth`, `address`, `city`, `state`, `zip`, `photo`, `progress`, `hash`, `verified`)
VALUES
	(1,'Sven','Wiegand','tleuschke@example.net','SUPERUSER','excepturi',3,'Other','1974-01-09','064 Rebeca Way Apt. 706\nLake Darwin, VA 39599-0249','Carrollside','We',4,NULL,50,'5928d909585709721fc81f2a845c7e1d',1),
	(2,'Ryann','Zieme','demetris74@example.com','SUPERUSER','iusto',3,'Male','1989-05-16','79174 McLaughlin Terrace Suite 310\nNelstown, OR 02353-1927','North Isom','Io',8,NULL,50,'17382ff9dca5d98015bcf62c718c447c',1),
	(3,'Easton','Jaskolski','mina17@example.org','SUPERUSER','eaque',3,'Female','1985-01-04','94555 Edmond Bridge Suite 831\nEast Jada, LA 73465','West Laurine','Mi',6,NULL,50,'6a6746145d3ce72eb08bda6aa7f694ed',0),
	(4,'Maeve','Langosh','stracke.darian@example.org','SUPERUSER','molestias',3,'Other','1980-08-15','225 Marianna Mission\nMrazberg, DC 10990','North Mozelle','Ke',2,NULL,50,'12f049f715cfb4961c913c0a91ff4a62',0),
	(5,'Sunny','Grady','tod.koch@example.net','USER','praesentium',3,'Other','1999-08-16','139 Michaela Fords Apt. 625\nWilbertton, NY 93853','Weimannfurt','Fl',1,NULL,50,'d40cb96e97c69ddfd13fd7209031747f',0),
	(6,'Cordia','Schaden','ally.mante@example.com','RESTRICTED','et',3,'Female','1982-06-16','38645 Garrick Club\nMagdalenmouth, NY 64419','Prohaskaview','Il',9,NULL,50,'64d6f5cc968422284b2b628ee9829783',0),
	(7,'Hailey','Bergnaum','savanna.gaylord@example.com','SUPERUSER','rerum',3,'Female','2011-02-18','672 Lindgren Lights Apt. 733\nOlsonside, OK 29373-1754','Framitown','Wa',6,NULL,50,'60ac27fb1fb098b17a4cb143f41ab031',0),
	(8,'Myrtice','Witting','murphy.sibyl@example.com','SUPERUSER','ullam',3,'Female','1994-12-01','583 Stroman Lights\nShanamouth, ND 47783-1280','Aufderharstad','Ar',9,NULL,50,'dd8ad3a6d7caa37b193db0bd5140dc52',1),
	(9,'Bernice','White','boyer.tito@example.org','SUPERUSER','odio',3,'Male','1992-10-07','2780 Meda Crossing\nNew Levi, ND 80943','Jerdetown','Lo',5,NULL,50,'74c92c9fdeb1a613222dc8e6c4ee4a72',1),
	(10,'Florence','Larkin','wwisozk@example.net','USER','repellat',3,'Male','1979-09-10','76352 Stracke Mews\nWymanfurt, ND 99220-2773','Port Crawfordview','Ma',7,NULL,50,'8c46a0b8e00860b3b8a3590418ea5eaf',1),
	(11,'Vito','DuBuque','cristian81@example.net','USER','nostrum',3,'Female','1993-09-05','219 Brakus Underpass Suite 253\nNew Jaceyland, GA 43451','Stammbury','Ne',9,NULL,50,'bf150d8d5c8d376a5ebe9c514e76dcdb',1),
	(12,'Chris','Botsford','clemmie12@example.net','USER','omnis',3,'Female','1970-06-29','2402 Sammy Route Apt. 380\nLake Kelly, AK 44951-5479','New Jace','Ma',6,NULL,50,'ba677d4fa3bdba54244878bb04e17552',1),
	(13,'Jadon','Beier','beatty.garland@example.net','RESTRICTED','nobis',3,'Male','2001-06-12','864 Hills Estates Apt. 596\nDevinfurt, MN 71558','South Gerardberg','Ke',7,NULL,50,'5098879623b63b798a268c94b38c7ea2',0),
	(14,'Antwan','Considine','shane.witting@example.net','USER','voluptas',3,'Other','2015-02-19','220 Gladyce Inlet\nOlsonburgh, IL 05998','Kubland','Ne',7,NULL,50,'952cd9970bd97644b9acd5a70cee543e',0),
	(15,'Elbert','Koelpin','afay@example.net','RESTRICTED','iste',3,'Other','1982-07-14','9048 Eladio Field Apt. 417\nBradtkeview, TN 33341','Britneyberg','No',8,NULL,50,'93f84f161ea6de30998da4dd50f7ce84',0),
	(16,'Eugenia','Daugherty','schaden.katharina@example.net','SUPERUSER','est',3,'Male','1987-03-19','28819 Grant Harbors\nBernierburgh, GA 20249-6801','Emmerichton','Fl',9,NULL,50,'73f0f9d8c05884bc488c34b133e0facf',0),
	(17,'Beatrice','Ward','carmela.botsford@example.org','USER','rerum',3,'Female','2012-09-26','950 Larson Village\nWest Damianmouth, WY 36370','South Nils','Il',5,NULL,50,'969d707fb4c84b4a60dca4299c06ca70',1),
	(18,'Erika','Langworth','block.willy@example.org','SUPERUSER','eaque',3,'Female','1997-06-18','31733 Friedrich Cape Apt. 616\nNorth Alan, IN 11680-8106','New Daphneyfort','Al',8,NULL,50,'d18ec35986a73aeefb7a05503fe09edd',0),
	(19,'Camryn','Ratke','waino.medhurst@example.org','USER','cum',3,'Male','2018-10-09','949 Casper Trail\nMorganfurt, NV 04940','Erynview','We',5,NULL,50,'e696c6ebe5164e7546e71ca18f30a657',0),
	(20,'Koby','Lockman','malcolm83@example.org','SUPERUSER','optio',3,'Other','1999-07-11','07861 Alessandra Brooks\nMarcellemouth, VT 07186','North Soledadside','No',1,NULL,50,'1b1f5a0398f385d457ab8431852ed42f',1),
	(21,'Lue','Altenwerth','sauer.everardo@example.net','SUPERUSER','nostrum',3,'Other','1981-09-17','849 Reichert Loaf Suite 333\nEast Gloria, MS 12153-8867','East Jarrodmouth','Wa',8,NULL,50,'3d83c914e6a5daaaffb547f72860e47d',1),
	(22,'Rosamond','Dickinson','tracey.mcdermott@example.com','USER','incidunt',3,'Other','2015-03-23','96318 Brook Junctions Apt. 483\nWest Karleyport, AK 00540-3983','Lake Josianne','Wi',9,NULL,50,'62a67dc8b3ee3d97396d80cc93a523fc',1),
	(23,'Hank','Prohaska','jaskolski.abel@example.net','USER','consectetur',3,'Female','2005-03-16','9237 Kulas Forges\nHermanntown, DE 74454','Trompborough','Co',3,NULL,50,'c08491e310b8deb315e931971ae27c79',1),
	(24,'Alison','Jones','medhurst.nicholaus@example.com','RESTRICTED','molestias',3,'Other','2007-01-21','06480 Rice Dam\nWest Clarissa, AL 40900','New Chelsea','Ge',6,NULL,50,'0e7494b7c5a0f514ece8af306951d3b3',0),
	(25,'Shana','Hettinger','jordon53@example.com','RESTRICTED','quia',3,'Other','2000-03-15','16790 White Stream Suite 602\nCaesarview, WY 20840','Maximostad','Ha',3,NULL,50,'e0a45c2b7e8a0891415d72eef8d89a0b',1),
	(26,'Ernesto','Kreiger','qweber@example.net','RESTRICTED','modi',3,'Other','2003-07-06','41303 Levi Corner\nNorth Pansyberg, WV 68260','South Wyman','Lo',7,NULL,50,'27ebe24dc41b9d42addd26361b4872e7',1),
	(27,'Tyra','Hermann','tiffany.okeefe@example.org','SUPERUSER','accusantium',3,'Other','1982-05-29','843 Boehm Shore Apt. 078\nBeahanport, PA 16895','North Brendan','Ke',5,NULL,50,'9fb244380171de22993640cb301c2bd7',1),
	(28,'Kody','Beer','pdonnelly@example.net','RESTRICTED','reiciendis',3,'Male','1985-05-06','27296 Barton Road\nMedhurstfort, WI 54407-8773','Faybury','Wi',2,NULL,50,'4ff80efd26076c16ae78609686787ad3',1),
	(29,'Jennings','Champlin','reynolds.joelle@example.org','SUPERUSER','dolores',3,'Male','2002-03-28','25288 Dejon Trace Suite 970\nElenaberg, WA 33194-4013','New Vidal','Te',6,NULL,50,'7dc135850477935da61d66f5ad5628fd',1),
	(30,'Elenora','Lebsack','eldridge35@example.net','SUPERUSER','sit',3,'Female','2005-11-02','59375 Dare Road Suite 320\nWest Raphaelle, CO 09752','North Alycia','Ne',3,NULL,50,'537fa698dba1820c0a751f21bedf5020',1),
	(31,'Mckenna','Anderson','ferne.west@example.com','SUPERUSER','eos',3,'Other','1977-06-08','04227 Peter Isle\nPaolobury, AZ 07831-4408','Weissnattown','Id',6,NULL,50,'f9b178a744519debb83725afcc6060f7',1),
	(32,'Pearl','Glover','danyka.krajcik@example.net','SUPERUSER','quisquam',3,'Male','1986-12-19','79659 Madison Isle Suite 633\nWest Ramonaborough, KY 78916-9371','Dickimouth','Wi',2,NULL,50,'da4e3c9648ec5cd5f0d960115b581848',1),
	(33,'Jennings','Deckow','kody69@example.com','RESTRICTED','sapiente',3,'Female','2014-08-11','3513 Lon Ports\nLake Cleora, KY 30563-6092','West Jerrodview','Al',6,NULL,50,'5670bc1b4f54a196191dc68cd1d64a5d',1),
	(34,'Glenna','Hammes','vincenza53@example.org','RESTRICTED','rerum',3,'Male','1989-08-06','9404 Little Track\nMaciestad, NJ 17583-8241','West Burleyshire','Ma',2,NULL,50,'9f9861f3628a8eb244b9f84726365f73',1),
	(35,'River','Spencer','bstokes@example.net','SUPERUSER','et',3,'Female','2010-09-15','085 Bode Ridges Suite 778\nHermistonchester, NC 69720-0349','South Jaymetown','Il',9,NULL,50,'031622c0d69162c065edb72b212466ba',0),
	(36,'Lulu','Cummings','yost.aileen@example.org','RESTRICTED','enim',3,'Female','1977-04-18','9294 Quigley Stream Suite 769\nEast Gunnar, WV 38410','Liammouth','Or',1,NULL,50,'14debd7cdd9376b8e47d1fedacde0056',1),
	(37,'America','Wyman','anderson.maxie@example.org','SUPERUSER','maiores',3,'Female','1993-03-27','5324 Keeling Mount Suite 580\nPort Enoch, AK 29568','South Delphia','Il',1,NULL,50,'60e57bedc54e447cb8681be5f34de003',0),
	(38,'Ariel','Brekke','jolie.swift@example.com','RESTRICTED','aut',3,'Female','1998-10-29','459 Onie Tunnel Suite 851\nHarryport, ME 89345-0385','East Jacklyn','Co',4,NULL,50,'2463df187e6cde2ff39534778cfc9f4b',1),
	(39,'Clark','Sipes','shayna09@example.com','USER','accusantium',3,'Other','1977-12-12','0258 Mabel Station\nSouth Berry, OH 44113','New Treverburgh','So',9,NULL,50,'abbdbbd3535132dac514a75559cb0970',1),
	(40,'Dee','Larson','sfeil@example.org','USER','corporis',3,'Other','2006-10-14','13490 Blair Creek\nWest Maciborough, WI 20476-3369','East Franz','Mo',3,NULL,50,'b7612340855e5fd7237fbc3464207e8d',0),
	(41,'Chet','Paucek','dannie.hudson@example.com','SUPERUSER','labore',3,'Other','2014-10-11','2800 Bernier Plains\nAnkundingberg, MA 39286-0623','Wildermanmouth','Ma',2,NULL,50,'b39ad0acd55578541da82fbe28046e29',0),
	(42,'Lelia','Schaden','aracely33@example.org','USER','quo',3,'Other','1999-03-11','0665 Kunde Trafficway\nAngiemouth, CT 87467','West Adellport','Oh',9,NULL,50,'aaff0e791b6ac7a6e10c3a3260eb1d3a',0),
	(43,'Elias','Senger','lkeeling@example.com','SUPERUSER','omnis',3,'Female','1982-01-26','02625 Hilpert Lodge Apt. 055\nLake Saigemouth, AK 52741-2175','Port Nikolas','Mi',1,NULL,50,'d7e2ec5c184707e3f7259b07489ae2b6',0),
	(44,'Jordan','Farrell','breitenberg.ofelia@example.com','SUPERUSER','sed',3,'Other','2011-12-27','199 Runolfsson Bypass\nJanessamouth, SC 25045-1481','Lake Ayla','Ne',8,NULL,50,'8b48ca4a61644c7b5870271e61fb8778',0),
	(45,'Jakayla','Kiehn','janick.turcotte@example.com','SUPERUSER','qui',3,'Female','1987-09-03','690 Erdman Club\nMcKenziestad, AK 72949-0820','Lake Mollyshire','Te',9,NULL,50,'c9acb9f7bfa58d1479e61ff9319f0006',0),
	(46,'Salvador','Bogan','aletha.jones@example.net','SUPERUSER','ratione',3,'Other','1984-01-02','93339 Kasandra Landing\nSouth Rydershire, NH 18014','Andersonmouth','We',8,NULL,50,'7761733ef51cdf42292c888917995a14',0),
	(47,'Carter','Rogahn','monty.robel@example.org','USER','sapiente',3,'Female','2018-07-11','7931 Maia Mews Apt. 496\nWolfview, AK 77563-8735','Annaview','Co',2,NULL,50,'1dd6b406afaf9d27e0f788314a7c91f4',1),
	(48,'Nigel','Volkman','lwest@example.com','RESTRICTED','et',3,'Female','1983-09-17','309 Baron Heights\nRiceview, ID 60320-3937','Wardburgh','Ut',4,NULL,50,'03fdc4045293b63fd2901f2449659527',0),
	(49,'Clyde','Jacobson','fjerde@example.com','SUPERUSER','veniam',3,'Female','2005-11-05','540 Graciela Spring\nBernhardside, VA 15112','Port Elvie','Al',4,NULL,50,'12320e9a56bef962f3cf65a9609ef830',0),
	(50,'Carleton','Grimes','aurelie.reynolds@example.com','USER','odit',3,'Other','1972-07-04','400 Kamron Summit\nQuitzonfort, NJ 65957-5520','West Emerald','Co',8,NULL,50,'aebd478dc50e606a2117546d2847857a',0),
	(51,'Merritt','Parker','ikoelpin@example.net','USER','et',3,'Female','2000-06-09','906 Schmitt Brook\nPort Titobury, NY 47481-7737','Lake Masonborough','Ma',7,NULL,50,'aca22e1822a12dc4c14e294f27cff2fe',1),
	(52,'Suzanne','Gibson','daugherty.leo@example.net','RESTRICTED','eligendi',3,'Other','1980-03-09','1526 Kling Radial Apt. 442\nArmstrongmouth, MN 50700-0581','Luciuschester','Ma',3,NULL,50,'1660d0a7e6cb8707c76f18bca1cd28ba',0),
	(53,'Cleo','Gutmann','theodore.block@example.net','RESTRICTED','aut',3,'Other','1977-09-27','2129 Jacinthe Pike Apt. 825\nLake Vickychester, IN 12020','West Elaina','Pe',6,NULL,50,'01f72735ae8a9aa7189f20381a2788cb',1),
	(54,'Jaquelin','Carter','xhirthe@example.net','RESTRICTED','eum',3,'Male','1997-09-01','155 Conn Course Apt. 754\nBoscohaven, TX 60133-4440','New Abby','Ut',2,NULL,50,'9f1cd147fa3afee6dceb770f436ff73f',1),
	(55,'August','Streich','domingo.lebsack@example.com','SUPERUSER','libero',3,'Female','1980-02-14','20265 Mandy Course Apt. 089\nRempelmouth, IA 15512-5869','Hickleland','Ge',1,NULL,50,'26d9b3b5f253793d2fb10a392e981058',1),
	(56,'Jalen','Nitzsche','harmon.bosco@example.net','SUPERUSER','est',3,'Other','2015-11-27','45119 Alyce Rest Suite 742\nHirtheside, CT 03336','East Kris','Ke',1,NULL,50,'ef0dbc847498580ed79926f410d8f403',1),
	(57,'Diana','Renner','jbergnaum@example.com','SUPERUSER','est',3,'Female','1992-11-13','8352 West Run Apt. 699\nKeelinghaven, KY 26215','Beerview','Wa',9,NULL,50,'a0302da9379fc4a1e9e7348e6c103c55',1),
	(58,'Chasity','Thiel','adriana.kuhic@example.com','USER','velit',3,'Other','2004-07-31','3542 OConnell Plains\nPort Tre, NC 48472-5396','Ebertshire','Wa',4,NULL,50,'e141c1f7cbab308b6056959d3deefff7',0),
	(59,'Filiberto','Terry','lhilpert@example.com','SUPERUSER','minima',3,'Female','1975-02-05','283 Zita Fall\nHaagside, RI 98122-9993','Turnerside','Ut',2,NULL,50,'15b190a67ec0a31bfdde95afd57587b4',1),
	(60,'Raquel','Rath','yvonne64@example.org','USER','consequatur',3,'Other','1992-06-12','481 Cole Meadow Apt. 794\nNew Alhaven, MD 84757','Stammberg','Di',9,NULL,50,'d9b988cbb02401f1a8e51e1101181170',0),
	(61,'Charlene','Stamm','okon.dorian@example.com','RESTRICTED','aut',3,'Female','2002-08-13','5925 Ocie Prairie\nEast Gussieton, ME 41895-1289','Bartonport','So',4,NULL,50,'a4209e7383a201ec5e9cbff6d6afa668',0),
	(62,'Bartholome','Nolan','yorn@example.org','USER','neque',3,'Female','2007-06-02','78801 Hayes Mill Apt. 470\nGreggport, WI 51478-1876','Port Lauren','Mi',7,NULL,50,'5eea581057b6950fc6da34008da0faf8',0),
	(63,'Alexandrea','Armstrong','marlene24@example.net','SUPERUSER','laboriosam',3,'Male','1987-10-28','84681 Connelly Vista\nRowemouth, NC 84454-5866','Lake Remingtonborough','Co',4,NULL,50,'b78869c7671fc3abefcca0e8659832b7',1),
	(64,'Rosemary','Kuhic','ksauer@example.org','RESTRICTED','cumque',3,'Other','2007-04-04','238 Neil Wells Suite 171\nPort Karolann, ID 19190','Elouisebury','In',1,NULL,50,'12ab8ec424db4a403880d565a0633b09',0),
	(65,'Vincenza','Koepp','hagenes.einar@example.com','USER','odit',3,'Female','2002-04-02','7944 Marley Island Suite 547\nEast Jaleel, NH 44018','Bergehaven','Te',1,NULL,50,'8694d4eea77389e9d78c828bc754b5c8',0),
	(66,'Alexandro','Mohr','nshanahan@example.com','SUPERUSER','debitis',3,'Male','1971-09-21','268 Wilkinson Islands\nEast Amparo, NE 99000','Lake Chandlerside','In',7,NULL,50,'02e1ad53efc7ce7cd74ef015cf187a42',0),
	(67,'Moises','Casper','geovanny.koss@example.net','USER','odit',3,'Male','2010-11-15','7184 Lance Mission Apt. 031\nPort Josebury, IN 92426-4436','New Krista','Wa',9,NULL,50,'19332f56bd7a7e5d7698468d59d012e3',1),
	(68,'Yadira','Stanton','memard@example.com','USER','aperiam',3,'Female','1985-04-15','004 Lolita Trafficway\nHintzville, KY 04058-2961','Ethelynview','Ve',8,NULL,50,'769a7f9ea49fe23c9e1b8a67f8affc82',0),
	(69,'Lilla','Funk','kbogisich@example.com','RESTRICTED','vel',3,'Other','1998-01-21','62999 Kuhn Alley Apt. 232\nPort Devinview, WA 63578','North Aletha','Te',9,NULL,50,'3216235810e3a4a7a2ae24b395f602db',0),
	(70,'Carmel','Hackett','rwelch@example.org','USER','molestias',3,'Male','1971-11-25','2845 Hills Turnpike\nAshtontown, ID 11828-6704','Helmerport','Ge',7,NULL,50,'3343e8f94f64e74b2a657463e8d5beb9',0),
	(71,'General','Heaney','loren.ernser@example.com','USER','id',3,'Other','1978-12-17','739 Pollich Vista Apt. 854\nWest Maximo, IL 44259','Daphneeton','Te',8,NULL,50,'ad3333e871a6dd02431aa0b33293cc4b',0),
	(72,'Harley','Fisher','ikris@example.net','USER','aut',3,'Male','1988-04-15','04047 Kennedy Parkway\nHarrisport, NJ 16709-7438','Nelsonton','Ka',6,NULL,50,'555e67481c63cd81ddb190f3837d09ef',0),
	(73,'Deshawn','McClure','neva54@example.net','USER','natus',3,'Female','2016-12-16','0427 Lemke Mountains\nOswaldport, WI 55253-5714','North Lonnyborough','We',3,NULL,50,'02b6a46becc86451ece4e848221b918c',0),
	(74,'Lilian','Barrows','ischuster@example.net','RESTRICTED','quia',3,'Other','1985-07-27','9770 Delfina Corners Apt. 619\nPort Della, ID 70213-8170','Tommiefurt','So',1,NULL,50,'29fe52ceaa1dd234b23ce0f3dcd22d29',0),
	(75,'Karelle','Parisian','lenore.okuneva@example.org','RESTRICTED','et',3,'Female','2003-03-02','219 Considine Cape Apt. 467\nNorth Chadstad, DE 16207','New Kathleen','Te',9,NULL,50,'75f78a802e7202bcbe528ae83894c56e',0),
	(76,'Emmet','Hahn','viola.langworth@example.org','USER','aut',3,'Female','1994-11-22','76956 Skiles Shoal\nSouth Berryland, KY 83178-1255','Rosaleehaven','We',7,NULL,50,'0db656f81b8d09090e5dcdb8a5975da9',0),
	(77,'Skye','Mraz','hpurdy@example.org','USER','et',3,'Female','1985-09-23','552 Guillermo Skyway\nBethelview, RI 07343-1252','Vincenzotown','Ha',3,NULL,50,'c44408b4bef60bdb0171a657f3b153c1',1),
	(78,'Mara','Purdy','bessie.yost@example.com','RESTRICTED','ut',3,'Other','2016-11-17','866 Hermann Pines\nEast Edmouth, SC 69612-5856','Conroyport','Mi',9,NULL,50,'970b2fd51d7154abfff1815c357f4c4a',0),
	(79,'Aliza','Eichmann','curt.little@example.org','RESTRICTED','maxime',3,'Other','2016-05-02','3212 Tremblay Lake\nPort Courtney, KY 54108-8967','New Vernie','Mi',8,NULL,50,'28ae922008794dfc50759d96a0c999ea',1),
	(80,'Sister','Hilll','jennings.breitenberg@example.org','SUPERUSER','sapiente',3,'Other','1999-10-31','9537 Allan Fall\nLake Carmelo, ND 12190','Nicoletteborough','Te',1,NULL,50,'a16a48ac1c4f69029f38d9527e136ae0',0),
	(81,'Earnest','Rath','elisha.lind@example.com','SUPERUSER','ullam',3,'Other','2000-01-28','13593 Brionna Drives\nCasandraville, TN 51553-5309','West Julianne','Ge',2,NULL,50,'e9f671e7ab37ce9c8168f39c09a85517',1),
	(82,'Oswald','Frami','ophelia37@example.com','USER','et',3,'Male','1982-06-20','8348 Camren Ranch\nCandidahaven, MO 10195-8498','North Gunnerhaven','Mo',5,NULL,50,'7873b4d0298ae8e099e7f4c80e3907e5',1),
	(83,'Savanah','Glover','koelpin.erica@example.net','SUPERUSER','veniam',3,'Male','1987-03-23','8908 Vernon Locks\nMoenshire, OR 01453-4233','Odamouth','Mi',4,NULL,50,'529a1afac75f3d5bc442daf929626024',0),
	(84,'Rogelio','Swift','karina32@example.org','RESTRICTED','modi',3,'Male','2014-11-25','0403 Okuneva Heights\nPfefferchester, LA 35242-7426','Inesview','Mo',9,NULL,50,'2f469f05d10e93bbc9181b96a56b76dd',1),
	(85,'Leanne','Jast','elnora.kuhic@example.com','RESTRICTED','qui',3,'Female','2007-07-14','38808 Demarco Hill Suite 395\nQuitzonhaven, PA 75927','Audreyland','Mi',3,NULL,50,'f47fc9847e2532051a1c1b2f5578c608',0),
	(86,'Alberta','Morar','kuvalis.buddy@example.org','USER','dolore',3,'Other','1981-06-28','840 Dianna Mountain\nEast Silas, MA 52986-0630','Lake Cleve','No',3,NULL,50,'0c3452bdfffd752ab00c070c423f5190',0),
	(87,'Hazel','Kilback','little.amelie@example.net','RESTRICTED','qui',3,'Male','1998-11-07','669 Mann Locks Apt. 014\nAryannaland, WA 37811-2298','Wymanstad','Ka',3,NULL,50,'559a6404c98f5b510694d2061f9ae400',0),
	(88,'Adelle','Boyer','reichert.alaina@example.com','SUPERUSER','expedita',3,'Female','1970-02-01','7504 Schowalter Squares Suite 832\nArlostad, MA 50113','Fayfort','Ma',5,NULL,50,'e35cb43e29d809a286539832b2f04c4e',1),
	(89,'Eliza','Bergnaum','tmertz@example.net','USER','eaque',3,'Other','1979-04-22','82774 Roob Trafficway Suite 429\nLake Sanford, HI 19004-6932','Olsonberg','Pe',9,NULL,50,'c634fec4a429b3d990cf2f885aa1f6e6',0),
	(90,'Augustine','Buckridge','mclaughlin.alexanne@example.net','USER','occaecati',3,'Male','2006-07-30','35835 Kylee Wall Suite 489\nLake Deshaun, TX 27028','South Newtonport','Id',8,NULL,50,'39b8c4ee6fa55a805979a7a440ff18ea',1),
	(91,'Kay','Ziemann','martina23@example.net','USER','omnis',3,'Other','2005-01-16','88204 Keebler Trail Apt. 331\nLeohaven, MD 73223-4568','East Rosalee','Ma',9,NULL,50,'1731a6e8b1a6d6c631706b7b4285f7d2',0),
	(92,'Earline','Schmeler','bblock@example.org','SUPERUSER','aut',3,'Other','2012-02-20','8859 Little Meadows Suite 226\nWest Kenya, AL 91376-3448','North Lenora','Ca',5,NULL,50,'455e5d4ae5e91848ff38b72129717e04',0),
	(93,'Lambert','Bahringer','hamill.beryl@example.com','SUPERUSER','a',3,'Other','1986-03-12','77817 Baumbach Ferry Apt. 029\nNew Melyssatown, SC 83072','Sophieside','Ar',1,NULL,50,'0db633e0a52d9ec2a60b2c2aa773039f',0),
	(94,'Rollin','Ward','feil.dorris@example.com','SUPERUSER','dignissimos',3,'Female','2003-09-08','8582 Llewellyn Land\nWest Veda, ND 76000','New Allyfort','Ma',1,NULL,50,'d823a6137bd0804dba94cdcd13eba54c',1),
	(95,'Ford','Stiedemann','rernser@example.com','USER','et',3,'Female','2000-01-22','949 Talon Valleys Apt. 561\nPort Maiya, NE 10738','Kuhlmanshire','Mi',9,NULL,50,'c5a47a8c77a1d4a30d98a1aa768fa3f6',1),
	(96,'Elfrieda','Bashirian','cristina.zemlak@example.net','RESTRICTED','ea',3,'Female','1999-11-19','3397 Clementine Brook\nDemarcusview, NE 47872-1907','Murphyside','Te',3,NULL,50,'cb27736849c6b4f7f126c045b80b6da5',1),
	(97,'Sabina','Torphy','mcclure.maybelle@example.net','USER','veniam',3,'Female','2005-06-25','197 Dejah Point\nFramiburgh, MD 94065-2222','Annefurt','Co',5,NULL,50,'8713e71d80ff72ba077822d9b393fcbc',0),
	(98,'Ariel','Franecki','nienow.quinton@example.com','USER','et',3,'Female','1987-01-14','183 Upton Vista\nHoraciomouth, MS 92663','West Kip','Mi',8,NULL,50,'22b90bf446a582d80c5196141a1d911b',0),
	(99,'Bria','Nikolaus','lakin.elinore@example.net','USER','quaerat',3,'Female','2009-12-30','7916 Tremblay Wells Apt. 854\nCareybury, NH 49569-8546','New Brendonhaven','Pe',3,NULL,50,'289655836ca90a389f541d1234a98ba8',1),
	(100,'Simeon','Kautzer','dbeer@example.net','RESTRICTED','ipsam',3,'Other','1993-11-01','157 Izaiah Union\nBrucemouth, ID 10021-0648','Kuhicport','Te',7,NULL,50,'38ecfee179c0f5ca14f1f332f884fbd6',0),
  (101,'SuperAdmin','SuperAdmin','SuperAdmin@sqs.com','SUPERADMIN','superadmin',5,'Male','2001-01-01','1234 SuperAdmin Ln.','SuperAdminVille','AL',9999,NULL,50,NULL,1),
	(102,'Admin','Admin','Admin@sqs.com','ADMIN','admin',4,'Male','2001-01-01','1234 Admin Ln.','AdminVille','AL',9999,NULL,50,NULL,1),
	(103,'SuperUser','SuperUser','SuperUser@sqs.com','SUPERUSER','super',3,'Male','2001-01-01','1234 SuperUser Ln.','SuperUserVille','AL',9999,NULL,50,NULL,1),
	(104,'User','User','User@sqs.com','USER','password',2,'Male','2001-01-01','1234 User Ln.','UserVille','AL',9999,NULL,50,NULL,1),
	(105,'RestricedUser','RestrictedUser','RestrictedUser@sqs.com','RESTRICTED','password',1,'Male','2001-01-01','1234 Restricted Ln.','RestrictedVille','AL',9999,NULL,50,NULL,1);

/*!40000 ALTER TABLE `user` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table user_hardware_skills
# ------------------------------------------------------------

DROP TABLE IF EXISTS `user_hardware_skills`;

CREATE TABLE `user_hardware_skills` (
  `UID` int(11) NOT NULL AUTO_INCREMENT,
  `skill_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`UID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

LOCK TABLES `user_hardware_skills` WRITE;
/*!40000 ALTER TABLE `user_hardware_skills` DISABLE KEYS */;

INSERT INTO `user_hardware_skills` (`UID`, `skill_id`, `user_id`)
VALUES
	(344,8,50),
	(342,5,8),
	(341,2,8),
	(343,1,50),
	(340,4,8),
	(339,15,8),
	(480,1,6),
	(479,2,6),
	(478,15,6),
	(477,4,6),
	(476,5,6),
	(475,6,6),
	(474,7,6),
	(473,8,6),
	(472,9,6),
	(471,10,6),
	(470,11,6),
	(469,12,6);

/*!40000 ALTER TABLE `user_hardware_skills` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table user_software_skills
# ------------------------------------------------------------

DROP TABLE IF EXISTS `user_software_skills`;

CREATE TABLE `user_software_skills` (
  `UID` int(11) NOT NULL AUTO_INCREMENT,
  `skill_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`UID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

LOCK TABLES `user_software_skills` WRITE;
/*!40000 ALTER TABLE `user_software_skills` DISABLE KEYS */;

INSERT INTO `user_software_skills` (`UID`, `skill_id`, `user_id`)
VALUES
	(1871,37,8),
	(1870,36,8),
	(1869,35,8),
	(1868,34,8),
	(1867,33,8),
	(1866,32,8),
	(1865,31,8),
	(1864,30,8),
	(1863,29,8),
	(1862,28,8),
	(77,33,60),
	(78,16,60),
	(1861,27,8),
	(1860,26,8),
	(1859,25,8),
	(1858,24,8),
	(1857,23,8),
	(1856,22,8),
	(1855,21,8),
	(1854,20,8),
	(1852,18,8),
	(1851,17,8),
	(1850,16,8),
	(1849,15,8),
	(1848,14,8),
	(1847,6,8),
	(1846,42,8),
	(1845,3,8),
	(1844,46,8),
	(1843,43,8),
	(1842,9,8),
	(1841,10,8),
	(1840,11,8),
	(1839,12,8),
	(1838,5,8),
	(1837,1,8),
	(1836,13,8),
	(1877,24,50),
	(1876,42,50),
	(2377,3,6),
	(1874,1,50),
	(1873,33,50),
	(1872,13,50),
	(2376,1,6),
	(2375,37,6),
	(2374,36,6),
	(2373,35,6),
	(2372,34,6),
	(2371,33,6),
	(2370,32,6),
	(2369,31,6),
	(2368,30,6),
	(2367,29,6),
	(2366,28,6),
	(2365,27,6),
	(2364,26,6),
	(2363,25,6),
	(2362,24,6),
	(2361,23,6),
	(2360,22,6),
	(2359,21,6),
	(2358,20,6),
	(2357,47,6),
	(2356,18,6),
	(2355,17,6),
	(2354,16,6),
	(2353,15,6),
	(2352,14,6),
	(2351,13,6),
	(2350,12,6),
	(2349,11,6),
	(2348,10,6),
	(2347,9,6),
	(2346,6,6),
	(2345,5,6),
	(2344,46,6);

/*!40000 ALTER TABLE `user_software_skills` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
