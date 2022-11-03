-- MySQL dump 10.13  Distrib 5.7.40, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: kssv111
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
-- Dumping data for table `ans_optionsets`
--

LOCK TABLES `ans_optionsets` WRITE;
/*!40000 ALTER TABLE `ans_optionsets` DISABLE KEYS */;
/*!40000 ALTER TABLE `ans_optionsets` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `answers`
--

LOCK TABLES `answers` WRITE;
/*!40000 ALTER TABLE `answers` DISABLE KEYS */;
/*!40000 ALTER TABLE `answers` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `chuongtrinhdaotao`
--

LOCK TABLES `chuongtrinhdaotao` WRITE;
/*!40000 ALTER TABLE `chuongtrinhdaotao` DISABLE KEYS */;
INSERT INTO `chuongtrinhdaotao` VALUES (1,'dai hoc chinh quy',1,2,'2020-2021');
/*!40000 ALTER TABLE `chuongtrinhdaotao` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `formmh`
--

LOCK TABLES `formmh` WRITE;
/*!40000 ALTER TABLE `formmh` DISABLE KEYS */;
INSERT INTO `formmh` VALUES (1,'khao sat mon hoc hk1 nam 2020',1,1,NULL,0,NULL);
/*!40000 ALTER TABLE `formmh` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `forms`
--

LOCK TABLES `forms` WRITE;
/*!40000 ALTER TABLE `forms` DISABLE KEYS */;
INSERT INTO `forms` VALUES (1,'khao sat the luc mua dong thang 10 nam 2020',2,3,3,NULL,0,NULL);
/*!40000 ALTER TABLE `forms` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `giangvien`
--

LOCK TABLES `giangvien` WRITE;
/*!40000 ALTER TABLE `giangvien` DISABLE KEYS */;
INSERT INTO `giangvien` VALUES (1,'Nguyen Quoc Dung',1,1,2,NULL,0,NULL,0,NULL);
/*!40000 ALTER TABLE `giangvien` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `khaosat`
--

LOCK TABLES `khaosat` WRITE;
/*!40000 ALTER TABLE `khaosat` DISABLE KEYS */;
INSERT INTO `khaosat` VALUES (1,'khao sat the luc',3,3,'0000-00-00','0000-00-00',0,NULL),(2,'khao sat chuyen di thuc te ',3,3,'0000-00-00','0000-00-00',0,NULL);
/*!40000 ALTER TABLE `khaosat` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `khoa`
--

LOCK TABLES `khoa` WRITE;
/*!40000 ALTER TABLE `khoa` DISABLE KEYS */;
INSERT INTO `khoa` VALUES (1,'cntt',NULL);
/*!40000 ALTER TABLE `khoa` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `loaiform`
--

LOCK TABLES `loaiform` WRITE;
/*!40000 ALTER TABLE `loaiform` DISABLE KEYS */;
INSERT INTO `loaiform` VALUES (1,'mau trac nghiem',3,1,NULL,NULL,0,NULL),(2,'mau text',3,1,NULL,NULL,0,NULL);
/*!40000 ALTER TABLE `loaiform` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `lop`
--

LOCK TABLES `lop` WRITE;
/*!40000 ALTER TABLE `lop` DISABLE KEYS */;
INSERT INTO `lop` VALUES (1,'dc20ctt01',1,1,'2020-09-05','2024-07-07',NULL);
/*!40000 ALTER TABLE `lop` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `monhoc`
--

LOCK TABLES `monhoc` WRITE;
/*!40000 ALTER TABLE `monhoc` DISABLE KEYS */;
INSERT INTO `monhoc` VALUES (1,'do an mon hoc');
/*!40000 ALTER TABLE `monhoc` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `ques_optionsets`
--

LOCK TABLES `ques_optionsets` WRITE;
/*!40000 ALTER TABLE `ques_optionsets` DISABLE KEYS */;
INSERT INTO `ques_optionsets` VALUES (1,'dong y','1',1,1,1,0,NULL);
/*!40000 ALTER TABLE `ques_optionsets` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `questions`
--

LOCK TABLES `questions` WRITE;
/*!40000 ALTER TABLE `questions` DISABLE KEYS */;
INSERT INTO `questions` VALUES (1,'the luc cua ban sau khi trai qua mon giao duc',0,1,1,1,0,NULL);
/*!40000 ALTER TABLE `questions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `responses`
--

LOCK TABLES `responses` WRITE;
/*!40000 ALTER TABLE `responses` DISABLE KEYS */;
INSERT INTO `responses` VALUES (1,'luot tra loi duoc xac thuc',1,1,0,NULL);
/*!40000 ALTER TABLE `responses` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `roles`
--

LOCK TABLES `roles` WRITE;
/*!40000 ALTER TABLE `roles` DISABLE KEYS */;
INSERT INTO `roles` VALUES (1,'admin',1,NULL),(2,'giang vien',0,NULL),(3,'sinh vien',0,NULL);
/*!40000 ALTER TABLE `roles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `sinhvien`
--

LOCK TABLES `sinhvien` WRITE;
/*!40000 ALTER TABLE `sinhvien` DISABLE KEYS */;
INSERT INTO `sinhvien` VALUES (1,'lat',3,1,1,NULL,0,NULL,'','',0,NULL);
/*!40000 ALTER TABLE `sinhvien` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'admin','admin','123456',1,NULL,NULL,NULL),(2,'ngdung1','ngdung1','123456',2,NULL,NULL,NULL),(3,'lat','lat','123456',3,NULL,NULL,NULL);
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

-- Dump completed on 2022-11-02 21:32:15
