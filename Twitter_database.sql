-- MySQL dump 10.13  Distrib 5.7.19, for Linux (x86_64)
--
-- Host: localhost    Database: Twitter
-- ------------------------------------------------------
-- Server version	5.7.19-0ubuntu0.16.04.1

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
-- Table structure for table `Comments`
--

DROP TABLE IF EXISTS `Comments`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Comments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tweet_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `text` text COLLATE utf8_polish_ci NOT NULL,
  `date` datetime DEFAULT CURRENT_TIMESTAMP,
  `username` varchar(255) COLLATE utf8_polish_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `tweet_id` (`tweet_id`),
  KEY `user_id` (`user_id`),
  CONSTRAINT `Comments_ibfk_1` FOREIGN KEY (`tweet_id`) REFERENCES `Tweets` (`id`),
  CONSTRAINT `Comments_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `Users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=164 DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Comments`
--

LOCK TABLES `Comments` WRITE;
/*!40000 ALTER TABLE `Comments` DISABLE KEYS */;
INSERT INTO `Comments` VALUES (10,27,2,'no chyba jednak przez przypadek nie był ostatni','2017-07-31 17:08:29','donka'),(11,27,2,'no chyba jednak przez przypadek nie był ostatni','2017-07-31 17:14:51','donka'),(12,27,1,'haha wygląda na to, że wkradła się mała pomyłka (F5)','2017-07-31 17:16:08','kuba'),(13,27,3,'oj ale to była pomyłka','2017-07-31 17:17:58','kubus'),(14,27,4,'działa?','2017-07-31 17:20:03','test'),(15,27,4,'super jest OK!','2017-07-31 17:20:49','test'),(16,19,1,'Komentarz nr 1','2017-07-31 18:00:52','kuba'),(17,19,1,'\'Komentarz nr 1\'','2017-07-31 18:04:00','donka'),(18,19,1,'Komentarz nr 1 od kuby','2017-07-31 18:23:50','kuba'),(19,20,1,'Komentarz nr 1 od kuby','2017-07-31 18:23:50','kuba'),(20,21,1,'Komentarz nr 1 od kuby','2017-07-31 18:23:50','kuba'),(21,22,1,'Komentarz nr 1 od kuby','2017-07-31 18:23:50','kuba'),(22,23,1,'Komentarz nr 1 od kuby','2017-07-31 18:23:50','kuba'),(23,24,1,'Komentarz nr 1 od kuby','2017-07-31 18:23:50','kuba'),(24,25,1,'Komentarz nr 1 od kuby','2017-07-31 18:23:50','kuba'),(25,26,1,'Komentarz nr 1 od kuby','2017-07-31 18:23:50','kuba'),(26,27,1,'Komentarz nr 1 od kuby','2017-07-31 18:23:50','kuba'),(27,28,1,'Komentarz nr 1 od kuby','2017-07-31 18:23:50','kuba'),(28,29,1,'Komentarz nr 1 od kuby','2017-07-31 18:23:51','kuba'),(29,30,1,'Komentarz nr 1 od kuby','2017-07-31 18:23:51','kuba'),(30,31,1,'Komentarz nr 1 od kuby','2017-07-31 18:23:51','kuba'),(31,32,1,'Komentarz nr 1 od kuby','2017-07-31 18:23:51','kuba'),(32,33,1,'Komentarz nr 1 od kuby','2017-07-31 18:23:51','kuba'),(33,34,1,'Komentarz nr 1 od kuby','2017-07-31 18:23:51','kuba'),(34,35,1,'Komentarz nr 1 od kuby','2017-07-31 18:23:51','kuba'),(35,36,1,'Komentarz nr 1 od kuby','2017-07-31 18:23:51','kuba'),(36,37,1,'Komentarz nr 1 od kuby','2017-07-31 18:23:51','kuba'),(37,38,1,'Komentarz nr 1 od kuby','2017-07-31 18:23:51','kuba'),(38,19,1,'Komentarz nr 1 od kuby','2017-07-31 18:25:53','kuba'),(39,20,1,'Komentarz nr 1 od kuby','2017-07-31 18:25:53','kuba'),(40,21,1,'Komentarz nr 1 od kuby','2017-07-31 18:25:53','kuba'),(41,22,1,'Komentarz nr 1 od kuby','2017-07-31 18:25:53','kuba'),(42,23,1,'Komentarz nr 1 od kuby','2017-07-31 18:25:53','kuba'),(43,24,1,'Komentarz nr 1 od kuby','2017-07-31 18:25:53','kuba'),(44,25,1,'Komentarz nr 1 od kuby','2017-07-31 18:25:53','kuba'),(45,26,1,'Komentarz nr 1 od kuby','2017-07-31 18:25:53','kuba'),(46,27,1,'Komentarz nr 1 od kuby','2017-07-31 18:25:53','kuba'),(47,28,1,'Komentarz nr 1 od kuby','2017-07-31 18:25:53','kuba'),(48,29,1,'Komentarz nr 1 od kuby','2017-07-31 18:25:53','kuba'),(49,30,1,'Komentarz nr 1 od kuby','2017-07-31 18:25:53','kuba'),(50,31,1,'Komentarz nr 1 od kuby','2017-07-31 18:25:53','kuba'),(51,32,1,'Komentarz nr 1 od kuby','2017-07-31 18:25:53','kuba'),(52,33,1,'Komentarz nr 1 od kuby','2017-07-31 18:25:53','kuba'),(53,34,1,'Komentarz nr 1 od kuby','2017-07-31 18:25:53','kuba'),(54,35,1,'Komentarz nr 1 od kuby','2017-07-31 18:25:53','kuba'),(55,36,1,'Komentarz nr 1 od kuby','2017-07-31 18:25:54','kuba'),(56,37,1,'Komentarz nr 1 od kuby','2017-07-31 18:25:54','kuba'),(57,38,1,'Komentarz nr 1 od kuby','2017-07-31 18:25:54','kuba'),(58,19,2,'Komentarz nr 1 od kuby','2017-07-31 18:25:54','donka'),(59,20,2,'Komentarz nr 1 od kuby','2017-07-31 18:25:54','donka'),(60,21,2,'Komentarz nr 1 od kuby','2017-07-31 18:25:54','donka'),(61,22,2,'Komentarz nr 1 od kuby','2017-07-31 18:25:54','donka'),(62,23,2,'Komentarz nr 1 od kuby','2017-07-31 18:25:54','donka'),(63,24,2,'Komentarz nr 1 od kuby','2017-07-31 18:25:54','donka'),(64,25,2,'Komentarz nr 1 od kuby','2017-07-31 18:25:54','donka'),(65,26,2,'Komentarz nr 1 od kuby','2017-07-31 18:25:54','donka'),(66,27,2,'Komentarz nr 1 od kuby','2017-07-31 18:25:54','donka'),(67,28,2,'Komentarz nr 1 od kuby','2017-07-31 18:25:54','donka'),(68,29,2,'Komentarz nr 1 od kuby','2017-07-31 18:25:54','donka'),(69,30,2,'Komentarz nr 1 od kuby','2017-07-31 18:25:55','donka'),(70,31,2,'Komentarz nr 1 od kuby','2017-07-31 18:25:55','donka'),(71,32,2,'Komentarz nr 1 od kuby','2017-07-31 18:25:55','donka'),(72,33,2,'Komentarz nr 1 od kuby','2017-07-31 18:25:55','donka'),(73,34,2,'Komentarz nr 1 od kuby','2017-07-31 18:25:55','donka'),(74,35,2,'Komentarz nr 1 od kuby','2017-07-31 18:25:55','donka'),(75,36,2,'Komentarz nr 1 od kuby','2017-07-31 18:25:55','donka'),(76,37,2,'Komentarz nr 1 od kuby','2017-07-31 18:25:55','donka'),(77,38,2,'Komentarz nr 1 od kuby','2017-07-31 18:25:55','donka'),(78,19,3,'Komentarz nr 1 od kuby','2017-07-31 18:25:55','kubus'),(79,20,3,'Komentarz nr 1 od kuby','2017-07-31 18:25:55','kubus'),(80,21,3,'Komentarz nr 1 od kuby','2017-07-31 18:25:55','kubus'),(81,22,3,'Komentarz nr 1 od kuby','2017-07-31 18:25:55','kubus'),(82,23,3,'Komentarz nr 1 od kuby','2017-07-31 18:25:55','kubus'),(83,24,3,'Komentarz nr 1 od kuby','2017-07-31 18:25:55','kubus'),(84,25,3,'Komentarz nr 1 od kuby','2017-07-31 18:25:56','kubus'),(85,26,3,'Komentarz nr 1 od kuby','2017-07-31 18:25:56','kubus'),(86,27,3,'Komentarz nr 1 od kuby','2017-07-31 18:25:56','kubus'),(87,28,3,'Komentarz nr 1 od kuby','2017-07-31 18:25:56','kubus'),(88,29,3,'Komentarz nr 1 od kuby','2017-07-31 18:25:56','kubus'),(89,30,3,'Komentarz nr 1 od kuby','2017-07-31 18:25:56','kubus'),(90,31,3,'Komentarz nr 1 od kuby','2017-07-31 18:25:56','kubus'),(91,32,3,'Komentarz nr 1 od kuby','2017-07-31 18:25:56','kubus'),(92,33,3,'Komentarz nr 1 od kuby','2017-07-31 18:25:56','kubus'),(93,34,3,'Komentarz nr 1 od kuby','2017-07-31 18:25:56','kubus'),(94,35,3,'Komentarz nr 1 od kuby','2017-07-31 18:25:56','kubus'),(95,36,3,'Komentarz nr 1 od kuby','2017-07-31 18:25:56','kubus'),(96,37,3,'Komentarz nr 1 od kuby','2017-07-31 18:25:56','kubus'),(97,38,3,'Komentarz nr 1 od kuby','2017-07-31 18:25:56','kubus'),(98,19,4,'Komentarz nr 1 od kuby','2017-07-31 18:25:56','test'),(99,20,4,'Komentarz nr 1 od kuby','2017-07-31 18:25:56','test'),(100,21,4,'Komentarz nr 1 od kuby','2017-07-31 18:25:56','test'),(101,22,4,'Komentarz nr 1 od kuby','2017-07-31 18:25:56','test'),(102,23,4,'Komentarz nr 1 od kuby','2017-07-31 18:25:56','test'),(103,24,4,'Komentarz nr 1 od kuby','2017-07-31 18:25:57','test'),(104,25,4,'Komentarz nr 1 od kuby','2017-07-31 18:25:57','test'),(105,26,4,'Komentarz nr 1 od kuby','2017-07-31 18:25:57','test'),(106,27,4,'Komentarz nr 1 od kuby','2017-07-31 18:25:57','test'),(107,28,4,'Komentarz nr 1 od kuby','2017-07-31 18:25:57','test'),(108,29,4,'Komentarz nr 1 od kuby','2017-07-31 18:25:57','test'),(109,30,4,'Komentarz nr 1 od kuby','2017-07-31 18:25:57','test'),(110,31,4,'Komentarz nr 1 od kuby','2017-07-31 18:25:57','test'),(111,32,4,'Komentarz nr 1 od kuby','2017-07-31 18:25:57','test'),(112,33,4,'Komentarz nr 1 od kuby','2017-07-31 18:25:57','test'),(113,34,4,'Komentarz nr 1 od kuby','2017-07-31 18:25:57','test'),(114,35,4,'Komentarz nr 1 od kuby','2017-07-31 18:25:57','test'),(115,36,4,'Komentarz nr 1 od kuby','2017-07-31 18:25:57','test'),(116,37,4,'Komentarz nr 1 od kuby','2017-07-31 18:25:57','test'),(117,38,4,'Komentarz nr 1 od kuby','2017-07-31 18:25:57','test'),(118,19,5,'Komentarz nr 1 od kuby','2017-07-31 18:25:57','rafal'),(119,20,5,'Komentarz nr 1 od kuby','2017-07-31 18:25:57','rafal'),(120,21,5,'Komentarz nr 1 od kuby','2017-07-31 18:25:58','rafal'),(121,22,5,'Komentarz nr 1 od kuby','2017-07-31 18:25:58','rafal'),(122,23,5,'Komentarz nr 1 od kuby','2017-07-31 18:25:58','rafal'),(123,24,5,'Komentarz nr 1 od kuby','2017-07-31 18:25:58','rafal'),(124,25,5,'Komentarz nr 1 od kuby','2017-07-31 18:25:58','rafal'),(125,26,5,'Komentarz nr 1 od kuby','2017-07-31 18:25:58','rafal'),(126,27,5,'Komentarz nr 1 od kuby','2017-07-31 18:25:58','rafal'),(127,28,5,'Komentarz nr 1 od kuby','2017-07-31 18:25:58','rafal'),(128,29,5,'Komentarz nr 1 od kuby','2017-07-31 18:25:58','rafal'),(129,30,5,'Komentarz nr 1 od kuby','2017-07-31 18:25:58','rafal'),(130,31,5,'Komentarz nr 1 od kuby','2017-07-31 18:25:58','rafal'),(131,32,5,'Komentarz nr 1 od kuby','2017-07-31 18:25:58','rafal'),(132,33,5,'Komentarz nr 1 od kuby','2017-07-31 18:25:58','rafal'),(133,34,5,'Komentarz nr 1 od kuby','2017-07-31 18:25:58','rafal'),(134,35,5,'Komentarz nr 1 od kuby','2017-07-31 18:25:58','rafal'),(135,36,5,'Komentarz nr 1 od kuby','2017-07-31 18:25:58','rafal'),(136,37,5,'Komentarz nr 1 od kuby','2017-07-31 18:25:58','rafal'),(137,38,5,'Komentarz nr 1 od kuby','2017-07-31 18:25:58','rafal'),(138,40,1,'Komentarz nr 1 od kuby','2017-07-31 18:32:00','kuba'),(139,41,1,'Komentarz nr 1 od kuby','2017-07-31 18:32:00','kuba'),(140,42,1,'Komentarz nr 1 od kuby','2017-07-31 18:32:00','kuba'),(141,43,1,'Komentarz nr 1 od kuby','2017-07-31 18:32:00','kuba'),(142,44,1,'Komentarz nr 1 od kuby','2017-07-31 18:32:00','kuba'),(143,40,2,'Komentarz nr 1 od kuby','2017-07-31 18:32:00','donka'),(144,41,2,'Komentarz nr 1 od kuby','2017-07-31 18:32:00','donka'),(145,42,2,'Komentarz nr 1 od kuby','2017-07-31 18:32:00','donka'),(146,43,2,'Komentarz nr 1 od kuby','2017-07-31 18:32:00','donka'),(147,44,2,'Komentarz nr 1 od kuby','2017-07-31 18:32:00','donka'),(148,40,3,'Komentarz nr 1 od kuby','2017-07-31 18:32:00','kubus'),(149,41,3,'Komentarz nr 1 od kuby','2017-07-31 18:32:00','kubus'),(150,42,3,'Komentarz nr 1 od kuby','2017-07-31 18:32:00','kubus'),(151,43,3,'Komentarz nr 1 od kuby','2017-07-31 18:32:00','kubus'),(152,44,3,'Komentarz nr 1 od kuby','2017-07-31 18:32:00','kubus'),(153,40,4,'Komentarz nr 1 od kuby','2017-07-31 18:32:00','test'),(154,41,4,'Komentarz nr 1 od kuby','2017-07-31 18:32:00','test'),(155,42,4,'Komentarz nr 1 od kuby','2017-07-31 18:32:01','test'),(156,43,4,'Komentarz nr 1 od kuby','2017-07-31 18:32:01','test'),(157,44,4,'Komentarz nr 1 od kuby','2017-07-31 18:32:01','test'),(158,40,5,'Komentarz nr 1 od kuby','2017-07-31 18:32:01','rafal'),(159,41,5,'Komentarz nr 1 od kuby','2017-07-31 18:32:01','rafal'),(160,42,5,'Komentarz nr 1 od kuby','2017-07-31 18:32:01','rafal'),(161,43,5,'Komentarz nr 1 od kuby','2017-07-31 18:32:01','rafal'),(162,44,5,'Komentarz nr 1 od kuby','2017-07-31 18:32:01','rafal'),(163,44,5,'będzie fanie','2017-07-31 18:55:02','rafal');
/*!40000 ALTER TABLE `Comments` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Messages`
--

DROP TABLE IF EXISTS `Messages`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Messages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sender_id` int(11) NOT NULL,
  `receiver_id` int(11) NOT NULL,
  `text` text COLLATE utf8_polish_ci NOT NULL,
  `date` datetime DEFAULT CURRENT_TIMESTAMP,
  `is_read` tinyint(4) DEFAULT '0',
  `sender_username` varchar(255) COLLATE utf8_polish_ci NOT NULL,
  `receiver_username` varchar(255) COLLATE utf8_polish_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `sender_id` (`sender_id`),
  KEY `receiver_id` (`receiver_id`),
  CONSTRAINT `Messages_ibfk_1` FOREIGN KEY (`sender_id`) REFERENCES `Users` (`id`),
  CONSTRAINT `Messages_ibfk_2` FOREIGN KEY (`receiver_id`) REFERENCES `Users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Messages`
--

LOCK TABLES `Messages` WRITE;
/*!40000 ALTER TABLE `Messages` DISABLE KEYS */;
INSERT INTO `Messages` VALUES (1,1,2,'Pierwsza wiadomość','2017-08-01 15:44:54',1,'kuba','donka'),(2,5,1,'Wiadomość od Rafała','2017-08-01 17:48:16',0,'rafal',''),(3,5,3,'Wiadomość od Rafała nr 3','2017-08-01 17:52:18',1,'rafal','kubus'),(4,3,4,'Wiadomośc od kubusia nr 1','2017-08-01 17:56:55',1,'kubus','test'),(5,4,5,'Wiadomość od testa do Rafała ','2017-08-01 18:12:06',0,'test','rafal'),(6,4,5,'Wiadomość od testa do Rafała ','2017-08-01 18:13:13',0,'test','rafal'),(7,4,1,'Wiadomość od testa do Kuby','2017-08-01 18:13:57',1,'test','kuba'),(8,1,2,'Wiadomosc do donki','2017-08-01 18:33:19',0,'kuba','donka'),(9,1,3,'message to kubus','2017-08-01 18:33:30',0,'kuba','kubus'),(10,1,4,'testowa wiadomosc od kuby','2017-08-01 18:33:45',0,'kuba','test'),(11,1,5,'wiadomosc do mentora nr 1','2017-08-01 18:33:59',1,'kuba','rafal'),(12,2,1,'wiadomosc do męża','2017-08-01 18:34:44',0,'donka','kuba'),(13,2,3,'wiadomośc do kochanka','2017-08-01 18:34:52',0,'donka','kubus'),(14,2,4,'test message','2017-08-01 18:35:00',0,'donka','test'),(15,2,5,'wiadomośc do mentora Kuby','2017-08-01 18:35:14',1,'donka','rafal'),(16,3,1,'wiadomość od k do k','2017-08-01 18:35:41',0,'kubus','kuba'),(17,3,2,'wiadomosc','2017-08-01 18:35:48',0,'kubus','donka'),(18,3,4,'kolejna wiadomość testowa','2017-08-01 18:35:58',0,'kubus','test'),(19,3,5,'mentor','2017-08-01 18:36:03',0,'kubus','rafal'),(20,4,1,'cos ciekawego','2017-08-01 18:36:36',0,'test','kuba'),(21,4,2,'wiadomośc od testa do D','2017-08-01 18:36:48',0,'test','donka'),(22,4,3,'send post to me','2017-08-01 18:37:09',0,'test','kubus'),(23,4,5,'wiadomośc do mentora','2017-08-01 18:37:20',1,'test','rafal'),(24,5,1,'dobrze Ci idą egzaminy','2017-08-01 18:39:48',1,'rafal','kuba'),(25,5,2,'musisz się douczyć','2017-08-01 18:39:56',0,'rafal','donka'),(26,5,3,'jesteś kiepski','2017-08-01 18:40:03',0,'rafal','kubus'),(27,5,4,'Ty jesteś tylko testowy','2017-08-01 18:40:16',0,'rafal','test'),(28,5,2,'super','2017-08-01 18:49:11',0,'rafal','donka'),(29,5,1,'to jest długa wiadomość która ma być skrócona do 30 znaków i wyświtlona cała dopiero po otwarciu','2017-08-01 18:51:31',0,'rafal','kuba');
/*!40000 ALTER TABLE `Messages` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Tweets`
--

DROP TABLE IF EXISTS `Tweets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Tweets` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `text` text COLLATE utf8_polish_ci NOT NULL,
  `date` datetime DEFAULT CURRENT_TIMESTAMP,
  `username` varchar(255) COLLATE utf8_polish_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  CONSTRAINT `Tweets_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `Users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=47 DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Tweets`
--

LOCK TABLES `Tweets` WRITE;
/*!40000 ALTER TABLE `Tweets` DISABLE KEYS */;
INSERT INTO `Tweets` VALUES (1,1,'To jest pierwszy wpis Kuby','2017-07-31 15:30:23','kuba'),(19,1,'super drugi wpis','2017-07-31 15:30:55','kuba'),(20,1,'ale mam dużo wpisów','2017-07-31 15:31:08','kuba'),(21,1,'szkoda że po usunięciu kilku wpisów nie cofa numeru id','2017-07-31 15:31:50','kuba'),(22,1,'ale i tak jest dobrze','2017-07-31 15:31:55','kuba'),(23,2,'Pierwszy wpis Donki','2017-07-31 15:53:03','donka'),(24,2,'Donka też potrafi dodawać wpisy','2017-07-31 15:53:13','donka'),(25,2,'To jest wpis o ukrytym id','2017-07-31 15:53:26','donka'),(26,2,'bo zwykły yżytkownik nie musi znać id, które potrzebne są mi i bazie','2017-07-31 15:53:48','donka'),(27,2,'i to będzie chyba ostatni wpis Donki','2017-07-31 15:53:57','donka'),(28,2,'i to będzie chyba ostatni wpis Donki','2017-07-31 15:56:33','donka'),(29,3,'wpis kubusia','2017-07-31 17:31:17','kubus'),(30,3,'lubie dodawać wpisy','2017-07-31 17:31:29','kubus'),(31,3,'komentarze bedą się dodawały automatycznie','2017-07-31 17:31:50','kubus'),(32,3,'tylko muszę napisać automat do tego','2017-07-31 17:32:01','kubus'),(33,3,'i już jest 5 wpis i tyle starczy','2017-07-31 17:32:09','kubus'),(34,4,'to jest komentarz testowy od testa','2017-07-31 17:32:29','test'),(35,4,'i test jest pozytywny','2017-07-31 17:32:37','test'),(36,4,'to jest po prostu tweet','2017-07-31 17:32:45','test'),(37,4,'jest ich dość sporo','2017-07-31 17:32:55','test'),(38,4,'dobrze że tylko 4 użytkowników','2017-07-31 17:33:04','test'),(40,5,'super wpis','2017-07-31 18:30:11','rafal'),(41,5,'wpis','2017-07-31 18:30:13','rafal'),(42,5,'teraz działą','2017-07-31 18:30:18','rafal'),(43,5,'JavaScript','2017-07-31 18:30:23','rafal'),(44,5,'juz w sobotę','2017-07-31 18:30:30','rafal'),(45,1,'wpis kuby ze strony z wsyzstkimi tweetami','2017-08-01 19:54:13','kuba'),(46,1,'wpis kuby ze strony z wsyzstkimi tweetami','2017-08-01 19:54:47','kuba');
/*!40000 ALTER TABLE `Tweets` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Users`
--

DROP TABLE IF EXISTS `Users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(255) COLLATE utf8_polish_ci NOT NULL,
  `username` varchar(255) COLLATE utf8_polish_ci NOT NULL,
  `hash_pass` varchar(60) COLLATE utf8_polish_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Users`
--

LOCK TABLES `Users` WRITE;
/*!40000 ALTER TABLE `Users` DISABLE KEYS */;
INSERT INTO `Users` VALUES (1,'kuba@kuba.pl','kuba','$2y$10$h7CWzEsg4LXeyhf/9agqFeHp/fuNgvuP3G0MrQfjtJhRQ5EcgDZSm'),(2,'donka@donka.pl','donka','$2y$10$2gcL.Atm00zQTmNZcPeLX.J7gGNxFmFWSRWNTa2rDoG360jwdj.Y6'),(3,'kubus@kubus.pl','kubus','$2y$10$4Prby0P8nU8rgbsIBNXu3.aupE0sSCtN28DDYDV/xin5PEAvg72ja'),(4,'test@test.pl','test','$2y$10$AsJDHdkHBltU9nGBsZWuAetznMl.cZauiCiDD7D/fBpbql8t8oZ12'),(5,'rafal@rafal.pl','rafal','$2y$10$JE6DnpQ4iubWT/cIa1YteunnZH4nmStRiZ/M6TLByCjrhPvnyiDZe');
/*!40000 ALTER TABLE `Users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2017-08-01 20:24:56
