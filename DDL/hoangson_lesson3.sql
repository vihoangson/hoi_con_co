-- MySQL dump 10.16  Distrib 10.1.10-MariaDB, for Win32 (AMD64)
--
-- Host: localhost    Database: hoangson_lesson_3
-- ------------------------------------------------------
-- Server version	10.1.10-MariaDB

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
-- Table structure for table `favorite`
--

DROP TABLE IF EXISTS `favorite`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `favorite` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `user_id` int(10) NOT NULL,
  `user_id_to` int(10) NOT NULL,
  `regist_datetime` datetime NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `favorite`
--

LOCK TABLES `favorite` WRITE;
/*!40000 ALTER TABLE `favorite` DISABLE KEYS */;
INSERT INTO `favorite` VALUES (2,1,3,'2015-08-25 04:32:31'),(6,1,4,'2015-08-25 04:51:05'),(8,1,7,'2015-08-25 04:52:07'),(9,1,8,'2015-08-25 04:52:09'),(11,1,10,'2015-08-25 04:52:13'),(13,2,3,'2015-08-25 10:44:49'),(15,2,1,'2015-08-25 10:53:50'),(16,2,9,'2015-08-25 10:59:54'),(17,1,2,'2015-08-25 12:08:35');
/*!40000 ALTER TABLE `favorite` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `follow`
--

DROP TABLE IF EXISTS `follow`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `follow` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `user_id` int(10) NOT NULL,
  `user_id_to` int(10) NOT NULL,
  `regist_datetime` datetime NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `follow`
--

LOCK TABLES `follow` WRITE;
/*!40000 ALTER TABLE `follow` DISABLE KEYS */;
INSERT INTO `follow` VALUES (2,1,3,'2015-08-25 06:03:30'),(3,1,4,'2015-08-25 06:03:34'),(5,2,1,'2015-08-25 10:53:51'),(7,1,2,'2015-08-25 12:08:36');
/*!40000 ALTER TABLE `follow` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `friend_relation`
--

DROP TABLE IF EXISTS `friend_relation`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `friend_relation` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `user_id` int(10) NOT NULL,
  `user_id_to` int(10) NOT NULL,
  `regist_datetime` date NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=63 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `friend_relation`
--

LOCK TABLES `friend_relation` WRITE;
/*!40000 ALTER TABLE `friend_relation` DISABLE KEYS */;
INSERT INTO `friend_relation` VALUES (21,3,6,'2015-08-25'),(22,6,3,'2015-08-25'),(23,3,1,'2015-08-25'),(25,3,4,'2015-08-25'),(26,4,3,'2015-08-25'),(27,2,4,'2015-08-25'),(28,4,2,'2015-08-25'),(31,6,2,'2015-08-25'),(32,2,6,'2015-08-25'),(33,2,26,'2015-08-25'),(34,26,2,'2015-08-25'),(35,26,3,'2015-08-25'),(36,3,26,'2015-08-25'),(37,1,7,'2015-08-25'),(38,7,1,'2015-08-25'),(39,7,26,'2015-08-25'),(40,26,7,'2015-08-25'),(41,2,11,'2015-08-25'),(42,11,2,'2015-08-25'),(43,3,11,'2015-08-25'),(44,11,3,'2015-08-25'),(45,4,11,'2015-08-25'),(46,11,4,'2015-08-25'),(47,3,12,'2015-08-25'),(48,12,3,'2015-08-25'),(49,4,12,'2015-08-25'),(50,12,4,'2015-08-25'),(51,1,4,'2015-08-25'),(52,4,1,'2015-08-25'),(53,1,11,'2015-08-25'),(54,11,1,'2015-08-25'),(55,9,2,'2015-08-25'),(56,2,9,'2015-08-25'),(57,9,3,'2015-08-25'),(58,3,9,'2015-08-25'),(59,1,9,'2015-08-25'),(60,9,1,'2015-08-25'),(61,1,3,'0000-00-00'),(62,2,2,'0000-00-00');
/*!40000 ALTER TABLE `friend_relation` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `friend_request`
--

DROP TABLE IF EXISTS `friend_request`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `friend_request` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `user_id` int(10) NOT NULL,
  `user_id_to` int(10) NOT NULL,
  `regist_datetime` date NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=40 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `friend_request`
--

LOCK TABLES `friend_request` WRITE;
/*!40000 ALTER TABLE `friend_request` DISABLE KEYS */;
INSERT INTO `friend_request` VALUES (4,3,5,'2015-08-25'),(18,1,6,'2015-08-25'),(30,11,12,'2015-08-25'),(34,2,7,'2015-08-25'),(35,2,8,'2015-08-25'),(36,2,3,'2015-08-25'),(37,2,5,'2015-08-25'),(38,2,5,'2015-08-25'),(39,1,2,'2015-08-25');
/*!40000 ALTER TABLE `friend_request` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `like_table`
--

DROP TABLE IF EXISTS `like_table`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `like_table` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `picture_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `regist_datetime` datetime NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`),
  UNIQUE KEY `picture_id_user_id` (`picture_id`,`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=179 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `like_table`
--

LOCK TABLES `like_table` WRITE;
/*!40000 ALTER TABLE `like_table` DISABLE KEYS */;
INSERT INTO `like_table` VALUES (14,17,1,'2015-08-24 05:53:45'),(17,14,2,'2015-08-24 05:53:50'),(19,12,2,'2015-08-24 05:53:52'),(20,10,1,'2015-08-24 05:53:58'),(21,15,1,'2015-08-24 05:54:12'),(22,15,2,'2015-08-24 05:54:15'),(23,15,3,'2015-08-24 05:54:28'),(25,16,3,'2015-08-24 05:54:39'),(26,14,3,'2015-08-24 05:54:57'),(27,17,3,'2015-08-24 05:55:26'),(28,10,3,'2015-08-24 05:56:55'),(29,12,3,'2015-08-24 05:56:58'),(30,18,1,'2015-08-24 05:57:25'),(31,19,1,'2015-08-24 05:58:07'),(32,20,20,'2015-08-24 06:54:43'),(34,10,17,'2015-08-25 04:55:25'),(35,14,17,'2015-08-25 04:55:26'),(36,16,1,'2015-08-25 07:00:47'),(37,22,2,'2015-08-25 09:33:13'),(43,16,2,'2015-08-25 11:04:01'),(44,11,1,'2015-08-25 12:08:23'),(47,88,2,'0000-00-00 00:00:00'),(66,76,2,'0000-00-00 00:00:00'),(67,75,2,'0000-00-00 00:00:00'),(78,79,2,'0000-00-00 00:00:00'),(80,81,2,'0000-00-00 00:00:00'),(81,85,2,'0000-00-00 00:00:00'),(82,84,2,'0000-00-00 00:00:00'),(90,71,2,'0000-00-00 00:00:00'),(93,10,2,'0000-00-00 00:00:00'),(94,11,2,'0000-00-00 00:00:00'),(104,95,2,'0000-00-00 00:00:00'),(105,108,2,'0000-00-00 00:00:00'),(106,107,2,'0000-00-00 00:00:00'),(107,106,2,'0000-00-00 00:00:00'),(116,113,2,'0000-00-00 00:00:00'),(120,114,2,'0000-00-00 00:00:00'),(123,104,2,'0000-00-00 00:00:00'),(124,103,2,'0000-00-00 00:00:00'),(127,74,2,'0000-00-00 00:00:00'),(130,117,2,'0000-00-00 00:00:00'),(131,116,2,'0000-00-00 00:00:00'),(132,118,2,'0000-00-00 00:00:00'),(133,112,2,'0000-00-00 00:00:00'),(134,72,2,'0000-00-00 00:00:00'),(135,132,2,'0000-00-00 00:00:00'),(136,119,1,'0000-00-00 00:00:00'),(137,120,1,'0000-00-00 00:00:00'),(138,121,1,'0000-00-00 00:00:00'),(139,122,1,'0000-00-00 00:00:00'),(149,121,3,'0000-00-00 00:00:00'),(150,120,3,'0000-00-00 00:00:00'),(170,134,21,'0000-00-00 00:00:00'),(173,80,1,'0000-00-00 00:00:00'),(176,139,1,'0000-00-00 00:00:00'),(177,138,1,'0000-00-00 00:00:00'),(178,137,1,'0000-00-00 00:00:00');
/*!40000 ALTER TABLE `like_table` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `notify`
--

DROP TABLE IF EXISTS `notify`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `notify` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `user_id_to` int(11) NOT NULL,
  `content` text NOT NULL,
  `is_read` tinyint(1) NOT NULL DEFAULT '1',
  `regist_datetime` datetime NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=61 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `notify`
--

LOCK TABLES `notify` WRITE;
/*!40000 ALTER TABLE `notify` DISABLE KEYS */;
INSERT INTO `notify` VALUES (1,1,3,'<a href=\'/lesson3/index.php?controller=users&action=showFriendDetail&id=3\'>Nguyen Ngoc Phuong Ly</a> send request make friend to <a href=\'/lesson3/index.php?controller=users&action=showFriendDetail&id=2\'>Nguyen Ngoc Mai Phuong</a>.',0,'2015-08-25 06:13:48'),(2,1,3,'<a href=\'/lesson3/index.php?controller=users&action=showFriendDetail&id=3\'>Nguyen Ngoc Phuong Ly</a> send request make friend to <a href=\'/lesson3/index.php?controller=users&action=showFriendDetail&id=4\'>Nguyen Thanh Hang</a>.',0,'2015-08-25 06:13:50'),(3,1,3,'<a href=\'/lesson3/index.php?controller=users&action=showFriendDetail&id=3\'>Nguyen Ngoc Phuong Ly</a> send request make friend to <a href=\'/lesson3/index.php?controller=users&action=showFriendDetail&id=6\'>Vo Danh 5</a>.',0,'2015-08-25 06:13:53'),(4,1,3,'<a href=\'/lesson3/index.php?controller=users&action=showFriendDetail&id=3\'>Nguyen Ngoc Phuong Ly</a> send request make friend to <a href=\'/lesson3/index.php?controller=users&action=showFriendDetail&id=5\'>Vo Danh 4</a>.',0,'2015-08-25 06:13:56'),(5,1,2,'<a href=\'/lesson3/index.php?controller=users&action=showFriendDetail&id=2\'>Nguyen Ngoc Mai Phuong</a> send request make friend to <a href=\'/lesson3/index.php?controller=users&action=showFriendDetail&id=4\'>Nguyen Thanh Hang</a>.',0,'2015-08-25 06:14:04'),(6,1,2,'<a href=\'/lesson3/index.php?controller=users&action=showFriendDetail&id=2\'>Nguyen Ngoc Mai Phuong</a> was unfriend <a href=\'/lesson3/index.php?controller=users&action=showFriendDetail&id=3\'>Nguyen Ngoc Phuong Ly</a>.',0,'2015-08-25 06:14:14'),(7,1,2,'<a href=\'/lesson3/index.php?controller=users&action=showFriendDetail&id=2\'>Nguyen Ngoc Mai Phuong</a> send request make friend to <a href=\'/lesson3/index.php?controller=users&action=showFriendDetail&id=3\'>Nguyen Ngoc Phuong Ly</a>.',0,'2015-08-25 06:16:47'),(8,1,3,'<a href=\'/lesson3/index.php?controller=users&action=showFriendDetail&id=3\'>Nguyen Ngoc Phuong Ly</a> was unfriend <a href=\'/lesson3/index.php?controller=users&action=showFriendDetail&id=2\'>Nguyen Ngoc Mai Phuong</a>.',0,'2015-08-25 06:17:37'),(9,1,2,'<a href=\'/lesson3/index.php?controller=users&action=showFriendDetail&id=2\'>Nguyen Ngoc Mai Phuong</a> send request make friend to <a href=\'/lesson3/index.php?controller=users&action=showFriendDetail&id=3\'>Nguyen Ngoc Phuong Ly</a>.',0,'2015-08-25 06:19:00'),(10,1,3,'<a href=\'/lesson3/index.php?controller=users&action=showFriendDetail&id=3\'>Nguyen Ngoc Phuong Ly</a> was unfriend <a href=\'/lesson3/index.php?controller=users&action=showFriendDetail&id=2\'>Nguyen Ngoc Mai Phuong</a>.',0,'2015-08-25 06:19:26'),(11,1,3,'<a href=\'/lesson3/index.php?controller=users&action=showFriendDetail&id=3\'>Nguyen Ngoc Phuong Ly</a> send request make friend to <a href=\'/lesson3/index.php?controller=users&action=showFriendDetail&id=2\'>Nguyen Ngoc Mai Phuong</a>.',0,'2015-08-25 06:19:32'),(12,1,3,'<a href=\'/lesson3/index.php?controller=users&action=showFriendDetail&id=3\'>Nguyen Ngoc Phuong Ly</a> was friend <a href=\'/lesson3/index.php?controller=users&action=showFriendDetail&id=2\'>Nguyen Ngoc Mai Phuong</a>.',0,'2015-08-25 06:21:26'),(13,1,3,'<a href=\'/lesson3/index.php?controller=users&action=showFriendDetail&id=3\'>Nguyen Ngoc Phuong Ly</a> was unfriend <a href=\'/lesson3/index.php?controller=users&action=showFriendDetail&id=2\'>Nguyen Ngoc Mai Phuong</a>.',0,'2015-08-25 06:32:37'),(14,1,3,'<a href=\'/lesson3/index.php?controller=users&action=showFriendDetail&id=3\'>Nguyen Ngoc Phuong Ly</a> send request make friend to <a href=\'/lesson3/index.php?controller=users&action=showFriendDetail&id=7\'>Vo Danh 6</a>.',0,'2015-08-25 06:34:38'),(15,1,3,'<a href=\'/lesson3/index.php?controller=users&action=showFriendDetail&id=3\'>Nguyen Ngoc Phuong Ly</a> was friend <a href=\'/lesson3/index.php?controller=users&action=showFriendDetail&id=7\'>Vo Danh 6</a>.',0,'2015-08-25 06:43:19'),(16,1,3,'<a href=\'/lesson3/index.php?controller=users&action=showFriendDetail&id=3\'>Nguyen Ngoc Phuong Ly</a> was friend <a href=\'/lesson3/index.php?controller=users&action=showFriendDetail&id=4\'>Nguyen Thanh Hang</a>.',0,'2015-08-25 06:43:58'),(17,1,2,'<a href=\'/lesson3/index.php?controller=users&action=showFriendDetail&id=2\'>Nguyen Ngoc Mai Phuong</a> was friend <a href=\'/lesson3/index.php?controller=users&action=showFriendDetail&id=4\'>Nguyen Thanh Hang</a>.',0,'2015-08-25 06:44:01'),(18,1,4,'<a href=\'/lesson3/index.php?controller=users&action=showFriendDetail&id=4\'>Nguyen Thanh Hang</a> send request make friend to <a href=\'/lesson3/index.php?controller=users&action=showFriendDetail&id=1\'>Nguyen Ngoc Minh Tuan</a>.',0,'2015-08-25 06:44:03'),(19,1,4,'<a href=\'/lesson3/index.php?controller=users&action=showFriendDetail&id=4\'>Nguyen Thanh Hang</a> was friend <a href=\'/lesson3/index.php?controller=users&action=showFriendDetail&id=1\'>Nguyen Ngoc Minh Tuan</a>.',0,'2015-08-25 06:44:09'),(20,1,4,'<a href=\'/lesson3/index.php?controller=users&action=showFriendDetail&id=4\'>Nguyen Thanh Hang</a> was unfriend <a href=\'/lesson3/index.php?controller=users&action=showFriendDetail&id=3\'>Nguyen Ngoc Phuong Ly</a>.',0,'2015-08-25 06:48:27'),(21,1,2,'<a href=\'/lesson3/index.php?controller=users&action=showFriendDetail&id=2\'>Nguyen Ngoc Mai Phuong</a> was unfriend <a href=\'/lesson3/index.php?controller=users&action=showFriendDetail&id=4\'>Nguyen Thanh Hang</a>.',0,'2015-08-25 06:49:03'),(22,1,2,'<a href=\'/lesson3/index.php?controller=users&action=showFriendDetail&id=2\'>Nguyen Ngoc Mai Phuong</a> send request make friend to <a href=\'/lesson3/index.php?controller=users&action=showFriendDetail&id=3\'>Nguyen Ngoc Phuong Ly</a>.',0,'2015-08-25 06:49:07'),(23,1,2,'<a href=\'/lesson3/index.php?controller=users&action=showFriendDetail&id=2\'>Nguyen Ngoc Mai Phuong</a> send request make friend to <a href=\'/lesson3/index.php?controller=users&action=showFriendDetail&id=4\'>Nguyen Thanh Hang</a>.',0,'2015-08-25 06:49:09'),(24,1,2,'<a href=\'/lesson3/index.php?controller=users&action=showFriendDetail&id=2\'>Nguyen Ngoc Mai Phuong</a> was friend <a href=\'/lesson3/index.php?controller=users&action=showFriendDetail&id=3\'>Nguyen Ngoc Phuong Ly</a>.',0,'2015-08-25 06:50:42'),(25,1,3,'<a href=\'/lesson3/index.php?controller=users&action=showFriendDetail&id=3\'>Nguyen Ngoc Phuong Ly</a> was friend <a href=\'/lesson3/index.php?controller=users&action=showFriendDetail&id=6\'>Vo Danh 5</a>.',0,'2015-08-25 06:50:57'),(26,1,3,'<a href=\'/lesson3/index.php?controller=users&action=showFriendDetail&id=3\'>Nguyen Ngoc Phuong Ly</a> was unfriend <a href=\'/lesson3/index.php?controller=users&action=showFriendDetail&id=6\'>Vo Danh 5</a>.',0,'2015-08-25 06:51:19'),(27,1,3,'<a href=\'/lesson3/index.php?controller=users&action=showFriendDetail&id=3\'>Nguyen Ngoc Phuong Ly</a> send request make friend to <a href=\'/lesson3/index.php?controller=users&action=showFriendDetail&id=6\'>Vo Danh 5</a>.',0,'2015-08-25 06:51:30'),(28,1,3,'<a href=\'/lesson3/index.php?controller=users&action=showFriendDetail&id=3\'>Nguyen Ngoc Phuong Ly</a> was friend <a href=\'/lesson3/index.php?controller=users&action=showFriendDetail&id=6\'>Vo Danh 5</a>.',0,'2015-08-25 06:51:38'),(29,1,3,'<a href=\'/lesson3/index.php?controller=users&action=showFriendDetail&id=3\'>Nguyen Ngoc Phuong Ly</a> send request make friend to <a href=\'/lesson3/index.php?controller=users&action=showFriendDetail&id=1\'>Nguyen Ngoc Minh Tuan</a>.',0,'2015-08-25 06:55:50'),(30,1,3,'<a href=\'/lesson3/index.php?controller=users&action=showFriendDetail&id=3\'>Nguyen Ngoc Phuong Ly</a> was friend <a href=\'/lesson3/index.php?controller=users&action=showFriendDetail&id=1\'>Nguyen Ngoc Minh Tuan</a>.',0,'2015-08-25 06:55:54'),(31,1,3,'<a href=\'/lesson3/index.php?controller=users&action=showFriendDetail&id=3\'>Nguyen Ngoc Phuong Ly</a> send request make friend to <a href=\'/lesson3/index.php?controller=users&action=showFriendDetail&id=4\'>Nguyen Thanh Hang</a>.',0,'2015-08-25 06:56:09'),(32,1,3,'<a href=\'/lesson3/index.php?controller=users&action=showFriendDetail&id=3\'>Nguyen Ngoc Phuong Ly</a> was friend <a href=\'/lesson3/index.php?controller=users&action=showFriendDetail&id=4\'>Nguyen Thanh Hang</a>.',0,'2015-08-25 06:56:20'),(33,1,2,'<a href=\'/lesson3/index.php?controller=users&action=showFriendDetail&id=2\'>Nguyen Ngoc Mai Phuong</a> was friend <a href=\'/lesson3/index.php?controller=users&action=showFriendDetail&id=4\'>Nguyen Thanh Hang</a>.',0,'2015-08-25 06:59:18'),(34,1,2,'<a href=\'/lesson3/index.php?controller=users&action=showFriendDetail&id=2\'>Nguyen Ngoc Mai Phuong</a> was friend <a href=\'/lesson3/index.php?controller=users&action=showFriendDetail&id=1\'>Nguyen Ngoc Minh Tuan</a>.',0,'2015-08-25 06:59:29'),(35,1,2,'<a href=\'/lesson3/index.php?controller=users&action=showFriendDetail&id=2\'>Nguyen Ngoc Mai Phuong</a> was friend <a href=\'/lesson3/index.php?controller=users&action=showFriendDetail&id=6\'>Vo Danh 5</a>.',0,'2015-08-25 06:59:55'),(36,1,2,'<a href=\'/lesson3/index.php?controller=users&action=showFriendDetail&id=2\'>Nguyen Ngoc Mai Phuong</a> send request make friend to <a href=\'/lesson3/index.php?controller=users&action=showFriendDetail&id=26\'>Vo Danh 25</a>.',0,'2015-08-25 07:02:16'),(37,1,2,'<a href=\'/lesson3/index.php?controller=users&action=showFriendDetail&id=2\'>Nguyen Ngoc Mai Phuong</a> was friend <a href=\'/lesson3/index.php?controller=users&action=showFriendDetail&id=26\'>Vo Danh 25</a>.',0,'2015-08-25 07:14:56'),(38,1,3,'<a href=\'/lesson3/index.php?controller=users&action=showFriendDetail&id=3\'>Nguyen Ngoc Phuong Ly</a> was friend <a href=\'/lesson3/index.php?controller=users&action=showFriendDetail&id=26\'>Vo Danh 25</a>.',0,'2015-08-25 07:15:18'),(39,1,2,'<a href=\'/lesson3/index.php?controller=users&action=showFriendDetail&id=2\'>Nguyen Ngoc Mai Phuong</a> send request make friend to <a href=\'/lesson3/index.php?controller=users&action=showFriendDetail&id=11\'>Vo Danh 10</a>.',0,'2015-08-25 09:19:24'),(40,1,3,'<a href=\'/lesson3/index.php?controller=users&action=showFriendDetail&id=3\'>Nguyen Ngoc Phuong Ly</a> send request make friend to <a href=\'/lesson3/index.php?controller=users&action=showFriendDetail&id=11\'>Vo Danh 10</a>.',0,'2015-08-25 09:19:37'),(41,1,3,'<a href=\'/lesson3/index.php?controller=users&action=showFriendDetail&id=3\'>Nguyen Ngoc Phuong Ly</a> send request make friend to <a href=\'/lesson3/index.php?controller=users&action=showFriendDetail&id=12\'>Vo Danh 11</a>.',0,'2015-08-25 09:19:41'),(42,1,4,'<a href=\'/lesson3/index.php?controller=users&action=showFriendDetail&id=4\'>Nguyen Thanh Hang</a> send request make friend to <a href=\'/lesson3/index.php?controller=users&action=showFriendDetail&id=11\'>Vo Danh 10</a>.',0,'2015-08-25 09:19:52'),(43,1,4,'<a href=\'/lesson3/index.php?controller=users&action=showFriendDetail&id=4\'>Nguyen Thanh Hang</a> send request make friend to <a href=\'/lesson3/index.php?controller=users&action=showFriendDetail&id=12\'>Vo Danh 11</a>.',0,'2015-08-25 09:19:56'),(44,1,2,'<a href=\'/lesson3/index.php?controller=users&action=showFriendDetail&id=2\'>Nguyen Ngoc Mai Phuong</a> was friend <a href=\'/lesson3/index.php?controller=users&action=showFriendDetail&id=11\'>Vo Danh 10</a>.',0,'2015-08-25 09:20:06'),(45,1,3,'<a href=\'/lesson3/index.php?controller=users&action=showFriendDetail&id=3\'>Nguyen Ngoc Phuong Ly</a> was friend <a href=\'/lesson3/index.php?controller=users&action=showFriendDetail&id=11\'>Vo Danh 10</a>.',0,'2015-08-25 09:20:08'),(46,1,4,'<a href=\'/lesson3/index.php?controller=users&action=showFriendDetail&id=4\'>Nguyen Thanh Hang</a> was friend <a href=\'/lesson3/index.php?controller=users&action=showFriendDetail&id=11\'>Vo Danh 10</a>.',0,'2015-08-25 09:20:10'),(47,1,3,'<a href=\'/lesson3/index.php?controller=users&action=showFriendDetail&id=3\'>Nguyen Ngoc Phuong Ly</a> was friend <a href=\'/lesson3/index.php?controller=users&action=showFriendDetail&id=12\'>Vo Danh 11</a>.',0,'2015-08-25 09:20:24'),(48,1,4,'<a href=\'/lesson3/index.php?controller=users&action=showFriendDetail&id=4\'>Nguyen Thanh Hang</a> was friend <a href=\'/lesson3/index.php?controller=users&action=showFriendDetail&id=12\'>Vo Danh 11</a>.',0,'2015-08-25 09:20:26'),(49,1,4,'<a href=\'/lesson3/index.php?controller=users&action=showFriendDetail&id=4\'>Nguyen Thanh Hang</a> was friend <a href=\'/lesson3/index.php?controller=users&action=showFriendDetail&id=1\'>Nguyen Ngoc Minh Tuan</a>.',0,'2015-08-25 09:23:08'),(50,1,2,'<a href=\'/lesson3/index.php?controller=users&action=showFriendDetail&id=2\'>Nguyen Ngoc Mai Phuong</a> was friend <a href=\'/lesson3/index.php?controller=users&action=showFriendDetail&id=9\'>Vo Danh 8</a>.',0,'2015-08-25 09:32:26'),(51,1,3,'<a href=\'/lesson3/index.php?controller=users&action=showFriendDetail&id=3\'>Nguyen Ngoc Phuong Ly</a> was friend <a href=\'/lesson3/index.php?controller=users&action=showFriendDetail&id=9\'>Vo Danh 8</a>.',0,'2015-08-25 09:32:37'),(52,1,2,'<a href=\'/lesson3/index.php?controller=users&action=showFriendDetail&id=2\'>Nguyen Ngoc Mai Phuong</a> send request make friend to <a href=\'/lesson3/index.php?controller=users&action=showFriendDetail&id=7\'>Vo Danh 6</a>.',0,'2015-08-25 10:53:54'),(53,1,2,'<a href=\'/lesson3/index.php?controller=users&action=showFriendDetail&id=2\'>Nguyen Ngoc Mai Phuong</a> send request make friend to <a href=\'/lesson3/index.php?controller=users&action=showFriendDetail&id=8\'>Vo Danh 7</a>.',0,'2015-08-25 10:53:56'),(54,1,2,'<a href=\'/lesson3/index.php?controller=users&action=showFriendDetail&id=2\'>Nguyen Ngoc Mai Phuong</a> was unfriend <a href=\'/lesson3/index.php?controller=users&action=showFriendDetail&id=3\'>Nguyen Ngoc Phuong Ly</a>.',0,'2015-08-25 10:57:37'),(55,1,2,'<a href=\'/lesson3/index.php?controller=users&action=showFriendDetail&id=2\'>Nguyen Ngoc Mai Phuong</a> was unfriend <a href=\'/lesson3/index.php?controller=users&action=showFriendDetail&id=3\'>Nguyen Ngoc Phuong Ly</a>.',0,'2015-08-25 10:57:41'),(56,1,2,'<a href=\'/lesson3/index.php?controller=users&action=showFriendDetail&id=2\'>Nguyen Ngoc Mai Phuong</a> send request make friend to <a href=\'/lesson3/index.php?controller=users&action=showFriendDetail&id=3\'>Nguyen Ngoc Phuong Ly</a>.',0,'2015-08-25 10:58:43'),(57,1,2,'<a href=\'/lesson3/index.php?controller=users&action=showFriendDetail&id=2\'>Nguyen Ngoc Mai Phuong</a> send request make friend to <a href=\'/lesson3/index.php?controller=users&action=showFriendDetail&id=5\'>Vo Danh 4</a>.',0,'2015-08-25 10:59:04'),(58,1,2,'<a href=\'/lesson3/index.php?controller=users&action=showFriendDetail&id=2\'>Nguyen Ngoc Mai Phuong</a> send request make friend to <a href=\'/lesson3/index.php?controller=users&action=showFriendDetail&id=5\'>Vo Danh 4</a>.',0,'2015-08-25 10:59:06'),(59,2,1,'<a href=\'/lesson3/index.php?controller=users&action=showFriendDetail&id=1\'>Nguyen Ngoc Minh Tuan</a> was unfriend <a href=\'/lesson3/index.php?controller=users&action=showFriendDetail&id=2\'>Nguyen Ngoc Mai Phuong</a>.',1,'2015-08-25 12:08:33'),(60,2,1,'<a href=\'/lesson3/index.php?controller=users&action=showFriendDetail&id=1\'>Nguyen Ngoc Minh Tuan</a> send request make friend to <a href=\'/lesson3/index.php?controller=users&action=showFriendDetail&id=2\'>Nguyen Ngoc Mai Phuong</a>.',1,'2015-08-25 12:08:34');
/*!40000 ALTER TABLE `notify` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `picture`
--

DROP TABLE IF EXISTS `picture`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `picture` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `url` text,
  `view` int(11) NOT NULL DEFAULT '0',
  `like_number` int(11) NOT NULL DEFAULT '0',
  `regist_datetime` datetime NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=140 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `picture`
--

LOCK TABLES `picture` WRITE;
/*!40000 ALTER TABLE `picture` DISABLE KEYS */;
INSERT INTO `picture` VALUES (72,6,'/assets/uploads/pictures/2.jpg',0,0,'0000-00-00 00:00:00'),(73,6,'/assets/uploads/pictures/234.png',0,0,'0000-00-00 00:00:00'),(74,6,'/assets/uploads/pictures/1.jpg',0,0,'0000-00-00 00:00:00'),(124,10,'/assets/uploads/pictures/3.jpg',0,0,'0000-00-00 00:00:00'),(125,10,'/assets/uploads/pictures/2.jpg',0,0,'0000-00-00 00:00:00'),(126,10,'/assets/uploads/pictures/1.jpg',0,0,'0000-00-00 00:00:00'),(128,2,'/assets/uploads/pictures/2.jpg',0,0,'0000-00-00 00:00:00'),(132,9,'/assets/uploads/pictures/3.jpg',0,0,'0000-00-00 00:00:00'),(133,2,'/assets/uploads/pictures/64014_457433020981807_1465113806_n.jpg',0,0,'0000-00-00 00:00:00'),(134,12,'/assets/uploads/pictures/6356_457430904315352_935312188_n.jpg',0,0,'0000-00-00 00:00:00'),(135,12,'/assets/uploads/pictures/307635_457433217648454_790203878_n.jpg',0,0,'0000-00-00 00:00:00');
/*!40000 ALTER TABLE `picture` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `username` varchar(40) NOT NULL,
  `password` varchar(32) NOT NULL,
  `fullname` varchar(32) NOT NULL,
  `sex` tinyint(1) unsigned NOT NULL DEFAULT '1',
  `birthday` date NOT NULL,
  `address` varchar(255) NOT NULL,
  `email` varchar(40) NOT NULL,
  `token` varchar(32) NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '0',
  `group_id` tinyint(1) NOT NULL DEFAULT '3',
  `avatar` varchar(255) DEFAULT NULL,
  `introduction` text,
  `position` varchar(500) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`),
  UNIQUE KEY `username` (`username`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=40 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES (1,'minhtuan0602','e10adc3949ba59abbe56e057f20f883e','Nguyá»…n Ngá»c Minh Tuáº¥n',0,'2016-04-08','23, Nguy123á»…n Phi Khanh, Quáº­n 1, HCM','vihoangson@gmail.com','8f600451ad856317f77bc4b44884b030',1,1,'/assets/uploads/profile/avatar-2015-08-20-9354e90.png','Albert Einstein (Tiếng Đức: [ˈalbɐt ˈaɪnʃtaɪn]  (Speaker Icon.svg nghe); 14 tháng 3 năm 1879–18 tháng 4 năm 1955) là nhà vật lý lý thuyết người Đức, người đã phát triển thuyết tương đối tổng quát, một trong hai trụ cột của vật lý hiện đại (trụ cột kia là cơ học lượng tử).[2][3] Mặc dù được biết đến nhiều nhất qua phương trình về sự tương đương khối lượng-năng lượng E = mc2 (được xem là &quot;phương trình nổi tiếng nhất thế giới&quot;),[4] ông lại được trao Giải Nobel Vật lý năm 1921 &quot;cho những cống hiến của ông đối với vật lý lý thuyết, và đặc biệt cho sự khám phá ra định luật của hiệu ứng quang điện&quot;.[5] Công trình về hiệu ứng quang điện của ông có tính chất bước ngoặt khai sinh ra lý thuyết lượng tử.\n\nKhi bước vào sự nghiệp của mình, Einstein đã nhận ra cơ học Newton không còn có thể thống nhất các định luật của cơ học cổ điển với các định luật của trường điện từ. Từ đó ông phát triển thuyết tương đối đặc biệt, với các bài báo đăng trong năm 1905. Tuy nhiên, ông nhận thấy nguyên lý tương đối có thể mở rộng cho cả trường hấp dẫn, và điều này dẫn đến sự ra đời của lý thuyết về hấp dẫn trong năm 1916, năm ông xuất bản một bài báo về thuyết tương đối tổng quát. Ông tiếp tục nghiên cứu các bài toán của cơ học thống kê và lý thuyết lượng tử, trong đó đưa ra những giải thích về lý thuyết hạt và sự chuyển động của các phân tử. Ông cũng nghiên cứu các tính chất nhiệt học của ánh sáng và đặt cơ sở cho lý thuyết lượng tử ánh sáng. Năm 1917, Einstein sử dụng thuyết tương đối tổng quát để miêu tả mô hình cấu trúc của toàn thể vũ trụ.[6] Cùng với Satyendra Nath Bose, năm 1924-1925 ông tiên đoán một trạng thái vật chất mới đó là ngưng tụ Bose-Einstein của những hệ lượng tử ở trạng thái gần độ không tuyệt đối.[7] Tuy cũng là cha đẻ của thuyết lượng tử, nhưng ông lại tỏ ra khắt khe với lý thuyết này. Điều này thể hiện qua những tranh luận của ông với Niels Bohr và nghịch lý EPR về lý thuyết lượng tử.[8]','[\"10.733245\",\"106.745438\"]'),(2,'vodanh1','e10adc3949ba59abbe56e057f20f883e','VÃ´ danh',0,'0000-00-00','Ná»™i dung Ä‘á»‹a chá»‰234134523','VÃ´ danh4123','8f600451ad856317f77bc4b44884b030',1,3,'/assets/uploads/profile/avatar-2015-08-20-9354e90.png','&lt;input type=&quot;text&quot; class=&quot;search-text&quot; placeholder=&quot;search friend&quot; name=&quot;query&quot; size=&quot;21&quot; maxlength=&quot;120&quot;&gt;','[\"10.769568\",\"106.677289\"]'),(3,'vodanh2','e10adc3949ba59abbe56e057f20f883e','Nguyen Ngoc Phuong Ly',1,'1991-10-31','Đại học bách khoa hồ chí minh','vodanh2@yahoo..com','8f600451ad856317f77bc4b44884b030',1,3,'/lesson3/resources/images/avatars/avatar-2015-08-20-7242da0.png','☜(ˆ▿ˆc)\n≧◠ᴥ◠≦✊\n（っ＾▿＾）\n(͠≖ ͜ʖ͠≖)',NULL),(4,'vodanh3','e10adc3949ba59abbe56e057f20f883e','Nguyen Thanh Hang',1,'1991-10-31','Quan 11 HCM','thanhhang0793@outlook.com','8f600451ad856317f77bc4b44884b030',1,3,'/lesson3/resources/images/avatars/avatar-2015-08-20-fca47ed.png',NULL,NULL),(5,'vodanh4','e10adc3949ba59abbe56e057f20f883e','Vo Danh 4',1,'1991-10-31','Quan 11 HCM','thanh_hang@gmail.com','8f600451ad856317f77bc4b44884b030',1,3,'/lesson3/resources/images/avatars/avatar-2015-08-20-fca47ed.png',NULL,NULL),(6,'vodanh5','e10adc3949ba59abbe56e057f20f883e','Vo Danh 5',1,'1991-10-31','Quan 11 HCM','thanh_hang_1@gmail.com','8f600451ad856317f77bc4b44884b030',1,3,'/lesson3/resources/images/avatars/avatar-2015-08-20-fca47ed.png',NULL,NULL),(7,'vodanh6','e10adc3949ba59abbe56e057f20f883e','Vo Danh 6',1,'1991-10-31','Quan 11 HCM','thanh_hang_2@gmail.com','8f600451ad856317f77bc4b44884b030',1,3,'/lesson3/resources/images/avatars/avatar-2015-08-20-fca47ed.png',NULL,NULL),(8,'vodanh7','e10adc3949ba59abbe56e057f20f883e','Vo Danh 7',1,'1991-10-31','Quan 11 HCM','thanh_hang_3@gmail.com','8f600451ad856317f77bc4b44884b030',1,3,'/assets/uploads/pictures/3.jpg',NULL,NULL),(9,'vodanh8','e10adc3949ba59abbe56e057f20f883e','Vo Danh 8',1,'1991-10-31','Quan 11 HCM','thanh_hang_4@gmail.com','8f600451ad856317f77bc4b44884b030',1,3,'/lesson3/resources/images/avatars/avatar-2015-08-20-fca47ed.png',NULL,NULL),(10,'vodanh9','e10adc3949ba59abbe56e057f20f883e','Vo Danh 9',1,'1991-10-31','Quan 11 HCM','thanh_hang_5@gmail.com','8f600451ad856317f77bc4b44884b030',1,3,'/assets/uploads/pictures/2.jpg',NULL,NULL),(11,'vodanh10','e10adc3949ba59abbe56e057f20f883e','Vo Danh 10',1,'1991-10-31','Quan 11 HCM','thanh_hang_6@gmail.com','8f600451ad856317f77bc4b44884b030',1,3,'/lesson3/resources/images/avatars/avatar-2015-08-20-fca47ed.png',NULL,NULL),(12,'vodanh11','e10adc3949ba59abbe56e057f20f883e','Vo Danh 11',1,'1991-10-31','Quan 11 HCM','thanh_hang_7@gmail.com','8f600451ad856317f77bc4b44884b030',1,3,'/assets/uploads/pictures/2.jpg',NULL,NULL),(13,'vodanh12','e10adc3949ba59abbe56e057f20f883e','Vo Danh 12',1,'1991-10-31','Quan 11 HCM','thanh_hang_8@gmail.com','8f600451ad856317f77bc4b44884b030',1,3,'/lesson3/resources/images/avatars/avatar-2015-08-20-fca47ed.png',NULL,NULL),(14,'vodanh13','e10adc3949ba59abbe56e057f20f883e','Vo Danh 13',1,'1991-10-31','Quan 11 HCM','thanh_hang_9@gmail.com','8f600451ad856317f77bc4b44884b030',1,3,'/lesson3/resources/images/avatars/avatar-2015-08-20-fca47ed.png',NULL,NULL),(15,'vodanh14','e10adc3949ba59abbe56e057f20f883e','Vo Danh 14',1,'1991-10-31','Quan 11 HCM','thanh_hang_10@gmail.com','8f600451ad856317f77bc4b44884b030',1,3,'/lesson3/resources/images/avatars/avatar-2015-08-20-fca47ed.png',NULL,NULL),(16,'vodanh15','e10adc3949ba59abbe56e057f20f883e','Vo Danh 15',1,'1991-10-31','Quan 11 HCM','thanh_hang_11@gmail.com','8f600451ad856317f77bc4b44884b030',1,3,'/lesson3/resources/images/avatars/avatar-2015-08-20-fca47ed.png',NULL,NULL),(17,'vodanh16','e10adc3949ba59abbe56e057f20f883e','Vo Danh 16',1,'1991-10-31','Quan 11 HCM','thanh_hang_12@gmail.com','8f600451ad856317f77bc4b44884b030',1,3,'/lesson3/resources/images/avatars/avatar-2015-08-20-fca47ed.png',NULL,NULL),(18,'vodanh17','e10adc3949ba59abbe56e057f20f883e','Vo Danh 17',1,'1991-10-31','Quan 11 HCM','thanh_hang_13@gmail.com','8f600451ad856317f77bc4b44884b030',1,3,'/lesson3/resources/images/avatars/avatar-2015-08-20-fca47ed.png',NULL,NULL),(19,'vodanh18','e10adc3949ba59abbe56e057f20f883e','Vo Danh 18',1,'1991-10-31','Quan 11 HCM','thanh_hang_14@gmail.com','8f600451ad856317f77bc4b44884b030',1,3,'/lesson3/resources/images/avatars/avatar-2015-08-20-fca47ed.png',NULL,NULL),(20,'vodanh19','e10adc3949ba59abbe56e057f20f883e','Vo Danh 19',1,'1991-10-31','Quan 11 HCM','thanh_hang_15@gmail.com','8f600451ad856317f77bc4b44884b030',1,3,'/lesson3/resources/images/avatars/avatar-2015-08-20-fca47ed.png',NULL,NULL),(21,'vodanh20','e10adc3949ba59abbe56e057f20f883e','Vo Danh 20',1,'1991-10-31','Quan 11 HCM','thanh_hang_16@gmail.com','8f600451ad856317f77bc4b44884b030',1,3,'/lesson3/resources/images/avatars/avatar-2015-08-20-fca47ed.png',NULL,NULL),(22,'vodanh21','e10adc3949ba59abbe56e057f20f883e','Vo Danh 21',1,'1991-10-31','Quan 11 HCM','thanh_hang_17@gmail.com','8f600451ad856317f77bc4b44884b030',1,3,'/lesson3/resources/images/avatars/avatar-2015-08-20-fca47ed.png',NULL,NULL),(23,'vodanh22','e10adc3949ba59abbe56e057f20f883e','Vo Danh 22',1,'1991-10-31','Quan 11 HCM','thanh_hang_18@gmail.com','8f600451ad856317f77bc4b44884b030',1,3,'/lesson3/resources/images/avatars/avatar-2015-08-20-fca47ed.png',NULL,NULL),(24,'vodanh23','e10adc3949ba59abbe56e057f20f883e','Vo Danh 23',1,'1991-10-31','Quan 11 HCM','thanh_hang_19@gmail.com','8f600451ad856317f77bc4b44884b030',1,3,'/lesson3/resources/images/avatars/avatar-2015-08-20-fca47ed.png',NULL,NULL),(25,'vodanh24','e10adc3949ba59abbe56e057f20f883e','Vo Danh 24',1,'1991-10-31','Quan 11 HCM','thanh_hang_20@gmail.com','8f600451ad856317f77bc4b44884b030',1,3,'/lesson3/resources/images/avatars/avatar-2015-08-20-fca47ed.png',NULL,NULL),(26,'vodanh25','e10adc3949ba59abbe56e057f20f883e','Vo Danh 25',1,'1991-10-31','Quan 11 HCM','thanh_hang_21@gmail.com','8f600451ad856317f77bc4b44884b030',1,3,'/lesson3/resources/images/avatars/avatar-2015-08-20-fca47ed.png',NULL,NULL),(27,'honagson','','',1,'0000-00-00','','honagson@gmail.com','',0,3,NULL,NULL,NULL),(28,'','','',1,'0000-00-00','','','',0,3,NULL,NULL,NULL);
/*!40000 ALTER TABLE `user` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2016-04-24 21:03:04
