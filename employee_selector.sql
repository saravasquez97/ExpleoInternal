-- MySQL dump 10.13  Distrib 5.7.24, for Linux (x86_64)
--
-- Host: mysql.cs.uky.edu    Database: sva252
-- ------------------------------------------------------
-- Server version	5.5.5-10.1.38-MariaDB-0ubuntu0.18.04.1

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `assigned_features`
--

DROP TABLE IF EXISTS `assigned_features`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `assigned_features` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `feature_number` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `time_added` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `assigned_features`
--

LOCK TABLES `assigned_features` WRITE;
/*!40000 ALTER TABLE `assigned_features` DISABLE KEYS */;
INSERT INTO `assigned_features` VALUES (1,2,6,'2018-12-03 07:54:40'),(2,8,6,'2018-12-03 08:22:05'),(3,105,6,'2018-12-03 07:54:41'),(4,109,6,'2018-12-03 07:54:42'),(5,116,6,'2018-12-03 07:54:43'),(6,2,1,'2018-12-03 07:54:40'),(7,8,1,'2018-12-03 08:22:05'),(8,105,1,'2018-12-03 07:54:41'),(9,109,1,'2018-12-03 07:54:42'),(10,116,1,'2018-12-03 07:54:43'),(11,2,2,'2018-12-03 07:54:40'),(12,8,2,'2018-12-03 08:22:05'),(13,105,2,'2018-12-03 07:54:41'),(14,109,2,'2018-12-03 07:54:42'),(15,114,2,'2018-12-03 07:54:43'),(16,1,3,'2018-12-03 07:54:40'),(17,7,3,'2018-12-03 08:22:05'),(18,103,3,'2018-12-03 07:54:41'),(19,109,3,'2018-12-03 07:54:42'),(20,115,3,'2018-12-03 07:54:43'),(21,1,4,'2018-12-03 07:54:40'),(22,7,4,'2018-12-03 08:22:05'),(23,103,4,'2018-12-03 07:54:41'),(24,109,4,'2018-12-03 07:54:42'),(25,114,4,'2018-12-03 07:54:43'),(26,1,5,'2018-12-03 07:54:40'),(27,7,5,'2018-12-03 08:22:05'),(28,103,5,'2018-12-03 07:54:41'),(29,109,5,'2018-12-03 07:54:42'),(30,114,5,'2018-12-03 07:54:43');
/*!40000 ALTER TABLE `assigned_features` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `features_available`
--

DROP TABLE IF EXISTS `features_available`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `features_available` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(30) DEFAULT NULL,
  `description` varchar(500) DEFAULT NULL,
  `feature_group_name` varchar(45) DEFAULT '0',
  `version` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `unique_name` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=119 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `features_available`
--

LOCK TABLES `features_available` WRITE;
/*!40000 ALTER TABLE `features_available` DISABLE KEYS */;
INSERT INTO `features_available` VALUES (1,'youtube_0.php','Default embedded YouTube video of SQS holiday video.','youtube',0),(2,'youtube_1.php','Embedded YouTube video that does not autoplay.','youtube',1),(4,'youtube_2.php','','youtube',2),(5,'youtube_3.php','','youtube',3),(6,'youtube_4.php','','youtube',4),(7,'googlemap_0.php','Default embedded Google Map centered on Lexington, KY.','googlemap',0),(8,'googlemap_1.php','','googlemap',1),(100,'googlemap_2.php','','googlemap',2),(101,'googlemap_3.php','','googlemap',3),(102,'googlemap_4.php','','googlemap',4),(103,'groupcard_0.php','','groupcard',0),(104,'groupcard_1.php','','groupcard',1),(105,'groupcard_2.php','','groupcard',2),(106,'groupcard_3.php','','groupcard',3),(107,'groupcard_4.php','','groupcard',4),(109,'profilecard_0.php','','profilecard',0),(110,'profilecard_1.php','','profilecard',1),(111,'profilecard_2.php','','profilecard',2),(112,'profilecard_3.php','','profilecard',3),(113,'profilecard_4.php','','profilecard',4),(114,'profileedit_0.php','','profileedit',0),(115,'profileedit_1.php','','profileedit',1),(116,'profileedit_2.php','','profileedit',2),(117,'profileedit_3.php','','profileedit',3),(118,'profileedit_4.php','','profileedit',4);
/*!40000 ALTER TABLE `features_available` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `group_members`
--

DROP TABLE IF EXISTS `group_members`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `group_members` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `group_id` int(11) DEFAULT NULL,
  `leader` tinyint(1) DEFAULT '0',
  `date_joined` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `uid` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `membership` (`group_id`,`uid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `group_members`
--

LOCK TABLES `group_members` WRITE;
/*!40000 ALTER TABLE `group_members` DISABLE KEYS */;
/*!40000 ALTER TABLE `group_members` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `groups`
--

DROP TABLE IF EXISTS `groups`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `groups` (
  `UID` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(30) NOT NULL,
  `date_established` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`UID`),
  UNIQUE KEY `name` (`name`),
  UNIQUE KEY `UID` (`UID`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `groups`
--

LOCK TABLES `groups` WRITE;
/*!40000 ALTER TABLE `groups` DISABLE KEYS */;
INSERT INTO `groups` VALUES (1,'Group A','2017-03-24 01:40:57'),(2,'Group B','2017-03-24 01:43:25'),(3,'Group C','2017-03-24 01:43:25');
/*!40000 ALTER TABLE `groups` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `hardware_skills`
--

DROP TABLE IF EXISTS `hardware_skills`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `hardware_skills` (
  `UID` int(11) NOT NULL AUTO_INCREMENT,
  `skill` char(30) NOT NULL,
  UNIQUE KEY `UID` (`UID`)
) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `hardware_skills`
--

LOCK TABLES `hardware_skills` WRITE;
/*!40000 ALTER TABLE `hardware_skills` DISABLE KEYS */;
INSERT INTO `hardware_skills` VALUES (1,'Computer Assembly'),(2,'Computer Maintenance'),(15,'Troubleshooting'),(4,'Printer & Cartage Refilling'),(5,'Operation Monitoring'),(6,'Network Processing'),(7,'Disaster Recovery'),(8,'Circuit Design Knowledge'),(9,'Systems Analysis'),(10,'Installing Applications'),(11,'Installing Components & Driver'),(12,'Backup Management');
/*!40000 ALTER TABLE `hardware_skills` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `phone_list`
--

DROP TABLE IF EXISTS `phone_list`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
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
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `phone_list`
--

LOCK TABLES `phone_list` WRITE;
/*!40000 ALTER TABLE `phone_list` DISABLE KEYS */;
INSERT INTO `phone_list` VALUES (1,'11111111111',1,'2018-12-01 21:13:40','AT&T','1',1),(3,'33333333333',3,'2018-12-01 21:13:40','AT&T','1',1);
/*!40000 ALTER TABLE `phone_list` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `software_skills`
--

DROP TABLE IF EXISTS `software_skills`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `software_skills` (
  `UID` int(11) NOT NULL AUTO_INCREMENT,
  `skill` varchar(30) NOT NULL,
  PRIMARY KEY (`UID`)
) ENGINE=MyISAM AUTO_INCREMENT=48 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `software_skills`
--

LOCK TABLES `software_skills` WRITE;
/*!40000 ALTER TABLE `software_skills` DISABLE KEYS */;
INSERT INTO `software_skills` VALUES (1,'C++'),(42,'C'),(3,'Python'),(46,'PHP'),(5,'Ruby'),(6,'Java'),(43,'C#'),(9,'Perl'),(10,'Graphics'),(11,'Javascript'),(12,'SQL'),(13,'.NET'),(14,'Visual Basic'),(15,'Prolog'),(16,'Animation'),(17,'R'),(18,'Swift'),(47,'Assembly'),(20,'Pascal'),(21,'Go'),(22,'Web Design'),(23,'HTML'),(24,'CSS'),(25,'Objective-C'),(26,'Shell'),(27,'MATLAB'),(28,'SAS'),(29,'Scratch'),(30,'Cloud Computing'),(31,'Microsoft Office'),(32,'Enterprise Systems'),(33,'Android'),(34,'IOS/MAC OS X'),(35,'Windows'),(36,'Linux'),(37,'Client/Server');
/*!40000 ALTER TABLE `software_skills` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
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
) ENGINE=InnoDB AUTO_INCREMENT=126 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES (1,'SuperAdmin','SuperAdmin','SuperAdmin@sqs.com','SUPERADMIN','superadmin',5,'Male','2001-01-01','1234 SuperAdmin Ln.','SuperAdminVille','AL',9999,NULL,50,NULL,1),(2,'Admin','Admin','Admin@sqs.com','ADMIN','admin',4,'Male','2001-01-01','1234 Admin Ln.','AdminVille','AL',56219,NULL,50,'1aa48fc4880bb0c9b8a3bf979d3b917e',1),(3,'SuperUser','SuperUser','SuperUser@sqs.com','SUPERUSER','super',3,'Male','2001-01-01','1234 SuperUser Ln.','SuperUserVille','AL',9999,NULL,50,NULL,1),(4,'User','User','User@sqs.com','USER','password',2,'Male','2001-01-01','1234 User Ln.','UserVille','AL',9999,NULL,50,NULL,1),(5,'Restricted','User','RestrictedUser@sqs.com','RESTRICTED','password',1,'Male','2001-01-01','1234 Restricted Ln.','RestrictedVille','AL',99999,NULL,50,NULL,1),(8,'Bruce','Wayne','lexitest1@gmail.com','USER','password',3,'Male','1965-09-12','300 University Circle','Louisville','KY',90001,NULL,50,NULL,1),(48,'Sales','Test','Sales@sqs.com','SALES','password',3,NULL,NULL,NULL,NULL,NULL,NULL,NULL,50,'d490d7b4576290fa60eb31b5fc917ad1',1),(107,'Peter','Parker','poodles@hotmail.com','USER','password',3,'Male','2002-02-02','123 New York Street','New York City','NY',12345,NULL,50,NULL,1),(109,'Ellie','Jones','ellie.jones@jones.com','SALES','password',3,NULL,NULL,NULL,NULL,NULL,NULL,NULL,50,NULL,1),(110,'Jane','Jacobs','jane.jacobs@jane.com','USER','password',3,'Other','1988-08-08','8 Jane Ave','Janeville','LA',88888,NULL,50,NULL,1),(112,'Nathan','Norberry','nathan.norberry@sqs.com','USER','password',3,NULL,NULL,NULL,NULL,NULL,NULL,NULL,50,NULL,1),(113,'Anthony','Stark','iamironman@stark.net','USER','password',3,NULL,NULL,NULL,NULL,NULL,NULL,NULL,50,NULL,1),(122,'William','Watts','electricity@gmail.com','USER','password',3,NULL,NULL,NULL,NULL,NULL,NULL,NULL,50,NULL,0),(124,'Tommy','Tutone','tommy.tutone@expleo.com','USER','password',3,'NULL','0000-00-00','','','NU',0,NULL,50,NULL,1),(125,'Brad','Button','brad.button@expleo.com','USER','password',3,'NULL','0000-00-00','','','NU',0,NULL,50,NULL,1);
/*!40000 ALTER TABLE `user` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user_hardware_skills`
--

DROP TABLE IF EXISTS `user_hardware_skills`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user_hardware_skills` (
  `UID` int(11) NOT NULL AUTO_INCREMENT,
  `skill_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `skill_level` varchar(30) NOT NULL DEFAULT 'N/A',
  `years_of_experience` int(11) NOT NULL,
  PRIMARY KEY (`UID`)
) ENGINE=MyISAM AUTO_INCREMENT=976 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_hardware_skills`
--

LOCK TABLES `user_hardware_skills` WRITE;
/*!40000 ALTER TABLE `user_hardware_skills` DISABLE KEYS */;
INSERT INTO `user_hardware_skills` VALUES (344,8,50,'N/A',0),(343,1,50,'N/A',0),(840,4,8,'Novice',3),(594,1,6,'N/A',0),(593,4,6,'N/A',0),(553,2,24,'N/A',0),(552,10,24,'N/A',0),(551,4,24,'N/A',0),(541,1,23,'N/A',0),(815,6,110,'Intermediate',1),(568,2,5,'Fundamental Awareness',10),(569,1,5,'Advanced',27),(570,7,5,'Advanced',18),(839,5,8,'Advanced',5),(837,10,8,'Intermediate',3),(835,12,8,'Intermediate',4),(587,15,88,'Intermediate',4),(588,7,88,'Fundamental Awareness',7),(589,11,88,'Novice',4),(972,2,2,'N/A',0),(814,2,110,'Novice',1),(973,15,124,'N/A',0),(974,6,124,'N/A',0),(969,7,16,'N/A',11),(965,12,100,'N/A',0),(964,7,100,'N/A',0),(963,5,100,'Expert',18),(962,15,100,'N/A',0),(961,9,100,'Advanced',6),(960,6,100,'Fundamental Awareness',1),(841,15,8,'Novice',3),(838,2,8,'Intermediate',3),(836,11,8,'Intermediate',3),(959,8,100,'N/A',0),(958,2,100,'Intermediate',5),(860,1,116,'Novice',4),(971,1,16,'N/A',9),(970,2,16,'N/A',8),(831,1,107,'Fundamental Awareness',1),(832,15,107,'Novice',2),(833,6,107,'Intermediate',3),(834,7,107,'Fundamental Awareness',2),(957,1,100,'N/A',0),(956,10,100,'Expert',20),(955,11,100,'Novice',3),(954,4,100,'Expert',20),(975,5,125,'Expert',6);
/*!40000 ALTER TABLE `user_hardware_skills` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user_software_skills`
--

DROP TABLE IF EXISTS `user_software_skills`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user_software_skills` (
  `UID` int(11) NOT NULL AUTO_INCREMENT,
  `skill_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `skill_level` varchar(30) NOT NULL DEFAULT 'N/A',
  `years_of_experience` int(11) NOT NULL,
  PRIMARY KEY (`UID`)
) ENGINE=MyISAM AUTO_INCREMENT=11303 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_software_skills`
--

LOCK TABLES `user_software_skills` WRITE;
/*!40000 ALTER TABLE `user_software_skills` DISABLE KEYS */;
INSERT INTO `user_software_skills` VALUES (77,33,60,'N/A',0),(78,16,60,'N/A',0),(10919,13,8,'Fundamental Awareness',2),(1877,24,50,'N/A',0),(1876,42,50,'N/A',0),(1874,1,50,'N/A',0),(1873,33,50,'N/A',0),(1872,13,50,'N/A',0),(11300,33,124,'Expert',6),(10058,3,5,'Novice',5),(3263,1,24,'N/A',0),(3262,5,24,'N/A',0),(3261,35,24,'N/A',0),(3260,28,24,'N/A',0),(10863,35,110,'Intermediate',7),(10862,31,110,'Advanced',8),(10861,46,110,'Intermediate',3),(3259,3,24,'N/A',0),(3258,46,24,'N/A',0),(11294,5,16,'Fundamental Awareness',0),(11284,16,100,'Novice',4),(11298,46,124,'Intermediate',4),(10075,36,88,'Expert',30),(10074,35,88,'Advanced',6),(10057,36,5,'Expert',30),(10059,43,5,'Intermediate',20),(10072,27,88,'Expert',7),(10073,31,88,'Novice',1),(10912,6,105,'Fundamental Awareness',3),(10910,11,107,'Novice',2),(10909,43,107,'Novice',2),(10908,1,107,'Fundamental Awareness',1),(10907,3,107,'Fundamental Awareness',0),(10906,42,107,'Fundamental Awareness',1),(11297,1,2,'N/A',0),(10966,36,116,'Expert',10),(11299,36,124,'Advanced',8),(11296,42,16,'Intermediate',0),(11295,6,16,'Novice',0),(11293,46,16,'Intermediate',0),(11292,3,16,'Novice',0),(11286,26,100,'N/A',0),(11285,43,100,'N/A',0),(11283,12,100,'N/A',0),(11282,14,100,'Novice',3),(11281,10,100,'Fundamental Awareness',1),(11280,22,100,'Novice',6),(11279,18,100,'Intermediate',8),(10860,36,110,'Novice',2),(10916,36,8,'Fundamental Awareness',2),(10917,29,8,'Fundamental Awareness',3),(10918,6,8,'Novice',4),(11277,28,100,'Novice',4),(11278,20,100,'Novice',3),(11276,30,100,'Intermediate',9),(11275,24,100,'Advanced',12),(11274,34,100,'Novice',3),(11271,36,100,'Intermediate',6),(11272,33,100,'Intermediate',8),(11273,32,100,'Novice',2),(11270,37,100,'Novice',10),(11269,35,100,'Novice',3),(11268,31,100,'Fundamental Awareness',1),(11267,29,100,'Fundamental Awareness',1),(11266,47,100,'Novice',6),(11265,21,100,'Fundamental Awareness',0),(11264,27,100,'Novice',7),(11263,17,100,'Novice',2),(11262,23,100,'Fundamental Awareness',0),(11261,25,100,'Novice',6),(11260,15,100,'Fundamental Awareness',1),(11259,13,100,'Fundamental Awareness',1),(11258,11,100,'Novice',4),(11257,9,100,'Fundamental Awareness',1),(11256,5,100,'Novice',8),(11255,6,100,'Fundamental Awareness',4),(11254,3,100,'N/A',0),(11253,1,100,'Fundamental Awareness',2),(11252,42,100,'N/A',0),(10911,1,105,'N/A',0),(10913,10,105,'Advanced',5),(10914,36,105,'Novice',2),(10915,33,105,'Intermediate',3),(11251,46,100,'Advanced',15),(11301,36,125,'Expert',13),(11302,33,125,'Intermediate',5);
/*!40000 ALTER TABLE `user_software_skills` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2019-04-24 13:45:11
