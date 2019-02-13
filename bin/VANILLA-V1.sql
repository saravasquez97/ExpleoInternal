# ************************************************************
# Sequel Pro SQL dump
# Version 4541
#
# http://www.sequelpro.com/
# https://github.com/sequelpro/sequelpro
#
# Host: 127.0.0.1 (MySQL 5.7.23)
# Database: sqs_web_vanilla
# Generation Time: 2018-12-03 12:24:37 +0000
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
	(1,'Group A','2017-03-23 21:40:57');

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
	(1,'1233456789',1,'2018-12-01 16:13:40','AT&T','1',1);

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
  `gender` varchar(6) DEFAULT NULL,
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
	(1,'SuperAdmin','SuperAdmin','SuperAdmin@sqs.com','SUPERADMIN','superadmin',5,'Male','2001-01-01','1234 SuperAdmin Ln.','SuperAdminVille','AL',9999,NULL,50,NULL,1);

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
