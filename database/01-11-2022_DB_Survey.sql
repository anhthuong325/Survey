-- MySQL dump 10.13  Distrib 5.7.40, for Win64 (x86_64)
--
-- Host: localhost    Database: khaosatsv
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
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role_id` int(11) unsigned NOT NULL,
  `rememberToken` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ngaytao` date DEFAULT NULL,
  `ngaycapnhat` date DEFAULT NULL,
  PRIMARY KEY (`id`),
  CONSTRAINT `role_id` FOREIGN KEY (`id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `roles`
--

DROP TABLE IF EXISTS `roles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `roles` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `ten_role` varchar(50) CHARACTER SET utf8 NOT NULL,
  `status` smallint(1) unsigned NOT NULL DEFAULT 0,
  `mo_ta` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `roles`
--

LOCK TABLES `roles` WRITE;
/*!40000 ALTER TABLE `roles` DISABLE KEYS */;
/*!40000 ALTER TABLE `roles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `khoa`
--

DROP TABLE IF EXISTS `khoa`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `khoa` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `ten_khoa` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mo_ta` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `khoa`
--

LOCK TABLES `khoa` WRITE;
/*!40000 ALTER TABLE `khoa` DISABLE KEYS */;
/*!40000 ALTER TABLE `khoa` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `monhoc`
--

DROP TABLE IF EXISTS `monhoc`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `monhoc` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `ten_mon_hoc` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `monhoc`
--

LOCK TABLES `monhoc` WRITE;
/*!40000 ALTER TABLE `monhoc` DISABLE KEYS */;
/*!40000 ALTER TABLE `monhoc` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `chuongtrinhdaotao`
--

DROP TABLE IF EXISTS `chuongtrinhdaotao`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `chuongtrinhdaotao` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `ten_ctdt` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `monhoc_ctdt_id` int(10) unsigned NOT NULL,
  `hocky` int(10) unsigned DEFAULT NULL,
  `nienkhoa` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  CONSTRAINT `monhoc_ctdt_id` FOREIGN KEY (`id`) REFERENCES `monhoc` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `chuongtrinhdaotao`
--

LOCK TABLES `chuongtrinhdaotao` WRITE;
/*!40000 ALTER TABLE `chuongtrinhdaotao` DISABLE KEYS */;
/*!40000 ALTER TABLE `chuongtrinhdaotao` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `lop`
--

DROP TABLE IF EXISTS `lop`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `lop` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `ten_lop` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `khoa_lop_id` int(10) unsigned NOT NULL,
  `ctdt_lop_id` int(10) unsigned NOT NULL,
  `ngaybatdau` date NOT NULL,
  `ngayketthuc` date NOT NULL,
  `mo_ta` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  CONSTRAINT `ctdt_lop_id` FOREIGN KEY (`id`) REFERENCES `chuongtrinhdaotao` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `khoa_lop_id` FOREIGN KEY (`id`) REFERENCES `khoa` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='				';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `lop`
--

LOCK TABLES `lop` WRITE;
/*!40000 ALTER TABLE `lop` DISABLE KEYS */;
/*!40000 ALTER TABLE `lop` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `giangvien`
--

DROP TABLE IF EXISTS `giangvien`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `giangvien` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `ten_gv` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `khoa_gv_id` int(10) unsigned NOT NULL,
  `ctdt_gv_id` int(10) unsigned NOT NULL,
  `user_gv_id` int(10) unsigned NOT NULL,
  `dia_chi` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gioi_tinh` smallint(1) unsigned DEFAULT 0,
  `ngay_sinh` date DEFAULT NULL,
  `status` smallint(1) unsigned NOT NULL DEFAULT 0,
  `mo_ta` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  CONSTRAINT `ctdt_gv_id` FOREIGN KEY (`id`) REFERENCES `chuongtrinhdaotao` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `khoa_gv_id` FOREIGN KEY (`id`) REFERENCES `khoa` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `user_gv_id` FOREIGN KEY (`id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `giangvien`
--

LOCK TABLES `giangvien` WRITE;
/*!40000 ALTER TABLE `giangvien` DISABLE KEYS */;
/*!40000 ALTER TABLE `giangvien` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sinhvien`
--

DROP TABLE IF EXISTS `sinhvien`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sinhvien` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `ten_sv` varchar(50) CHARACTER SET utf8 NOT NULL,
  `user_sv_id` int(10) unsigned NOT NULL,
  `khoa_sv_id` int(10) unsigned NOT NULL,
  `lop_sv_id` int(10) unsigned NOT NULL,
  `dia_chi` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  `gioi_tinh` smallint(1) unsigned DEFAULT 0,
  `ngay_sinh` date DEFAULT NULL,
  `namnhaphoc` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `namtotnghiep` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` smallint(1) unsigned NOT NULL DEFAULT 0,
  `mo_ta` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  PRIMARY KEY (`id`),
  CONSTRAINT `khoa_sv_id` FOREIGN KEY (`id`) REFERENCES `khoa` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `lop_sv_id` FOREIGN KEY (`id`) REFERENCES `lop` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `user_sv_id` FOREIGN KEY (`id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sinhvien`
--

LOCK TABLES `sinhvien` WRITE;
/*!40000 ALTER TABLE `sinhvien` DISABLE KEYS */;
/*!40000 ALTER TABLE `sinhvien` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `khaosat`
--

DROP TABLE IF EXISTS `khaosat`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `khaosat` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `ten_khaosat` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_ks_id` int(10) unsigned NOT NULL,
  `role_ks_id` int(10) unsigned NOT NULL,
  `ngaytaolap` date NOT NULL,
  `ngayhethan` date NOT NULL,
  `status` smallint(1) unsigned NOT NULL DEFAULT 0,
  `mo_ta` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  CONSTRAINT `role_ks_id` FOREIGN KEY (`id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `user_ks_id` FOREIGN KEY (`id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `khaosat`
--

LOCK TABLES `khaosat` WRITE;
/*!40000 ALTER TABLE `khaosat` DISABLE KEYS */;
/*!40000 ALTER TABLE `khaosat` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `loaiform`
--

DROP TABLE IF EXISTS `loaiform`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `loaiform` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `ten_loaiform` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role_lf_id` int(10) unsigned NOT NULL,
  `khaosat_lf_id` int(10) unsigned NOT NULL,
  `soluongform` int(11) unsigned DEFAULT NULL,
  `solan_sudung` int(11) unsigned DEFAULT NULL,
  `status` smallint(1) unsigned NOT NULL DEFAULT 0,
  `mo_ta` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  CONSTRAINT `khaosat_lf_id` FOREIGN KEY (`id`) REFERENCES `khaosat` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `role_lf_id` FOREIGN KEY (`id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `loaiform`
--

LOCK TABLES `loaiform` WRITE;
/*!40000 ALTER TABLE `loaiform` DISABLE KEYS */;
/*!40000 ALTER TABLE `loaiform` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `forms`
--

DROP TABLE IF EXISTS `forms`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `forms` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `ten_form` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `loaiform_form_id` int(10) unsigned NOT NULL,
  `user_form_id` int(10) unsigned NOT NULL,
  `role_form_id` int(10) unsigned NOT NULL,
  `solan_sudung` int(10) unsigned DEFAULT NULL,
  `status` smallint(1) unsigned NOT NULL DEFAULT 0,
  `mo_ta` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  CONSTRAINT `loaiform_form_id` FOREIGN KEY (`id`) REFERENCES `loaiform` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `role_form_id` FOREIGN KEY (`id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `user_form_id` FOREIGN KEY (`id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `forms`
--

LOCK TABLES `forms` WRITE;
/*!40000 ALTER TABLE `forms` DISABLE KEYS */;
/*!40000 ALTER TABLE `forms` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `formmh`
--

DROP TABLE IF EXISTS `formmh`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `formmh` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `ten_formmh` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ctdt_formmh_id` int(10) unsigned NOT NULL,
  `form_formmh_id` int(10) unsigned NOT NULL,
  `solan_sudung` int(11) DEFAULT NULL,
  `status` smallint(1) unsigned NOT NULL DEFAULT 0,
  `mo_ta` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  CONSTRAINT `ctdt_formmh_id` FOREIGN KEY (`id`) REFERENCES `chuongtrinhdaotao` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `form_formmh_id` FOREIGN KEY (`id`) REFERENCES `forms` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `formmh`
--

LOCK TABLES `formmh` WRITE;
/*!40000 ALTER TABLE `formmh` DISABLE KEYS */;
/*!40000 ALTER TABLE `formmh` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `responses`
--

DROP TABLE IF EXISTS `responses`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `responses` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `ten_resp` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `khaosat_resp_id` int(10) unsigned NOT NULL,
  `user_resp_id` int(10) unsigned NOT NULL,
  `status` smallint(1) unsigned NOT NULL DEFAULT 0,
  `mo_ta` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  CONSTRAINT `khaosat_resp_id` FOREIGN KEY (`id`) REFERENCES `khaosat` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `user_resp_id` FOREIGN KEY (`id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `responses`
--

LOCK TABLES `responses` WRITE;
/*!40000 ALTER TABLE `responses` DISABLE KEYS */;
/*!40000 ALTER TABLE `responses` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `questions`
--

DROP TABLE IF EXISTS `questions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `questions` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `ten_ques` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `loai_ques` smallint(1) unsigned NOT NULL DEFAULT 0,
  `form_ques_id` int(10) unsigned NOT NULL,
  `khaosat_ques_id` int(10) unsigned NOT NULL,
  `resp_ques_id` int(10) unsigned NOT NULL,
  `status` smallint(1) unsigned NOT NULL DEFAULT 0,
  `mo_ta` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  CONSTRAINT `form_ques_id` FOREIGN KEY (`id`) REFERENCES `forms` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `khaosat_ques_id` FOREIGN KEY (`id`) REFERENCES `khaosat` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `resp_ques_id` FOREIGN KEY (`id`) REFERENCES `responses` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `questions`
--

LOCK TABLES `questions` WRITE;
/*!40000 ALTER TABLE `questions` DISABLE KEYS */;
/*!40000 ALTER TABLE `questions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ques_optionsets`
--

DROP TABLE IF EXISTS `ques_optionsets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ques_optionsets` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `ten_optset` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `giatri_luachon` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `soluong_giatri` int(10) unsigned DEFAULT NULL,
  `question_qos_id` int(10) unsigned NOT NULL,
  `resp_qos_id` int(10) unsigned NOT NULL,
  `status` smallint(1) unsigned NOT NULL DEFAULT 0,
  `mo_ta` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  CONSTRAINT `question_qos_id` FOREIGN KEY (`id`) REFERENCES `questions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `resp_qos_id` FOREIGN KEY (`id`) REFERENCES `responses` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ques_optionsets`
--

LOCK TABLES `ques_optionsets` WRITE;
/*!40000 ALTER TABLE `ques_optionsets` DISABLE KEYS */;
/*!40000 ALTER TABLE `ques_optionsets` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `answers`
--

DROP TABLE IF EXISTS `answers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `answers` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `question_answer_id` int(10) unsigned NOT NULL,
  `resp_answer_id` int(10) unsigned NOT NULL,
  `detail_answer` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
  `status` smallint(1) unsigned DEFAULT 0,
  `mo_ta` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  CONSTRAINT `question_answer_id` FOREIGN KEY (`id`) REFERENCES `questions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `resp_answer_id` FOREIGN KEY (`id`) REFERENCES `responses` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `answers`
--

LOCK TABLES `answers` WRITE;
/*!40000 ALTER TABLE `answers` DISABLE KEYS */;
/*!40000 ALTER TABLE `answers` ENABLE KEYS */;
UNLOCK TABLES;


--
-- Table structure for table `ans_optionsets`
--

DROP TABLE IF EXISTS `ans_optionsets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ans_optionsets` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `question_aos_id` int(10) unsigned NOT NULL,
  `resp_aos_id` int(10) unsigned NOT NULL,
  `giatridachon` int(10) unsigned DEFAULT NULL,
  `status` smallint(1) unsigned DEFAULT 0,
  `mo_ta` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  CONSTRAINT `question_aos_id` FOREIGN KEY (`id`) REFERENCES `questions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `resp_aos_id` FOREIGN KEY (`id`) REFERENCES `responses` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ans_optionsets`
--

LOCK TABLES `ans_optionsets` WRITE;
/*!40000 ALTER TABLE `ans_optionsets` DISABLE KEYS */;
/*!40000 ALTER TABLE `ans_optionsets` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2022-11-01 17:00:24
-- Dump completed back in sorting /PK-FK/ 2022-11-01 17:20:00
