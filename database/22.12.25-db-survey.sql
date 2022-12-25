-- MySQL dump 10.13  Distrib 5.7.40, for Win64 (x86_64)
--
-- Host: localhost    Database: survey612
-- ------------------------------------------------------
-- Server version	5.5.5-10.4.25-MariaDB

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
-- Table structure for table `cauhoi`
--

DROP TABLE IF EXISTS `cauhoi`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cauhoi` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `noi_dung` varchar(1000) CHARACTER SET utf8 NOT NULL,
  `id_chu_de` int(10) unsigned NOT NULL,
  `loai_cau_tra_loi` int(11) NOT NULL,
  `status` int(10) unsigned NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `created_by` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cauhoi`
--

LOCK TABLES `cauhoi` WRITE;
/*!40000 ALTER TABLE `cauhoi` DISABLE KEYS */;
INSERT INTO `cauhoi` VALUES (1,'hello',1,1,1,NULL,NULL,NULL),(2,'xin chào Loan',2,1,0,NULL,'2022-12-24 17:38:17',NULL),(3,'hãy đặt câu hỏi',2,2,0,NULL,NULL,NULL),(4,'hè tới',2,1,0,NULL,NULL,NULL),(7,'câu hỏi về trường lớp',4,2,1,NULL,NULL,NULL),(8,'Câu Hỏi B',2,1,0,'2022-12-18 14:12:43',NULL,NULL);
/*!40000 ALTER TABLE `cauhoi` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `chude`
--

DROP TABLE IF EXISTS `chude`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `chude` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `ten_chu_de` varchar(200) CHARACTER SET utf8 NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `created_by` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `chude`
--

LOCK TABLES `chude` WRITE;
/*!40000 ALTER TABLE `chude` DISABLE KEYS */;
INSERT INTO `chude` VALUES (1,'Điểm thi','2020-08-20 00:00:00',NULL),(2,'Môn học',NULL,NULL),(3,'Giáo Viên',NULL,NULL),(4,'Trường lớp',NULL,NULL),(5,'Nghề nghiệp cựu sinh viên sau tốt nghiệp','2022-12-19 04:05:09','0000-00-00 00:00:00'),(6,'Nghề nghiệp cựu sinh viên sau tốt nghiệp','2022-12-19 04:06:21','0000-00-00 00:00:00'),(7,'Nghề nghiệp sinh viên mới tốt nghiệp','2022-12-19 04:14:41','admin');
/*!40000 ALTER TABLE `chude` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `luachon`
--

DROP TABLE IF EXISTS `luachon`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `luachon` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `ten_lua_chon` varchar(100) CHARACTER SET utf8 NOT NULL,
  `status` int(10) unsigned NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `created_by` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `luachon`
--

LOCK TABLES `luachon` WRITE;
/*!40000 ALTER TABLE `luachon` DISABLE KEYS */;
INSERT INTO `luachon` VALUES (1,'Đồng ý',0,NULL,NULL),(2,'Không đồng ý',0,NULL,NULL),(3,'Không ý kiến',0,NULL,NULL),(4,'Theo số đông',0,NULL,NULL);
/*!40000 ALTER TABLE `luachon` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `traloi`
--

DROP TABLE IF EXISTS `traloi`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `traloi` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `cau_tra_loi` varchar(300) NOT NULL,
  `id_chu_de` int(10) unsigned NOT NULL,
  `id_cau_hoi` int(10) unsigned NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `created_by` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `traloi`
--

LOCK TABLES `traloi` WRITE;
/*!40000 ALTER TABLE `traloi` DISABLE KEYS */;
/*!40000 ALTER TABLE `traloi` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `full_name` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `role_id` int(11) NOT NULL,
  `email` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `birthdate` datetime NOT NULL,
  `khoa` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `active` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'admin','ADMIN',1,'admin@gmail.com','admin','0000-00-00 00:00:00','CNTT',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(2,'student','STUDENT',2,'student@gmail.com','student','0000-00-00 00:00:00','CNTT',1,'0000-00-00 00:00:00','0000-00-00 00:00:00');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2022-12-25 15:03:04
