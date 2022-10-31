-- MySQL dump 10.13  Distrib 8.0.31, for Win64 (x86_64)
--
-- Host: localhost    Database: kssv
-- ------------------------------------------------------
-- Server version	5.5.5-10.4.25-MariaDB

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8 */;
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
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `cauhoi` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `ten_cau_hoi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `loai_cau_hoi` smallint(6) NOT NULL,
  `form_id` bigint(20) unsigned NOT NULL,
  `khaosat_id` bigint(20) unsigned NOT NULL,
  `phanhoi_id` bigint(20) unsigned NOT NULL,
  `mo_ta` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` smallint(6) NOT NULL DEFAULT 1,
  PRIMARY KEY (`id`),
  KEY `cauhoi_form_id_foreign` (`form_id`),
  KEY `cauhoi_khaosat_id_foreign` (`khaosat_id`),
  KEY `cauhoi_phanhoi_id_foreign` (`phanhoi_id`),
  CONSTRAINT `cauhoi_form_id_foreign` FOREIGN KEY (`form_id`) REFERENCES `forms` (`id`) ON DELETE CASCADE,
  CONSTRAINT `cauhoi_khaosat_id_foreign` FOREIGN KEY (`khaosat_id`) REFERENCES `khaosat` (`id`) ON DELETE CASCADE,
  CONSTRAINT `cauhoi_phanhoi_id_foreign` FOREIGN KEY (`phanhoi_id`) REFERENCES `phanhoi` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cauhoi`
--

LOCK TABLES `cauhoi` WRITE;
/*!40000 ALTER TABLE `cauhoi` DISABLE KEYS */;
/*!40000 ALTER TABLE `cauhoi` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cauhoitn`
--

DROP TABLE IF EXISTS `cauhoitn`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `cauhoitn` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `ten_nhom_tn` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `soluong_giatri` int(11) NOT NULL,
  `giatri_luachon` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cauhoi_id` bigint(20) unsigned NOT NULL,
  `phanhoi_id` bigint(20) unsigned NOT NULL,
  `mo_ta` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` smallint(6) NOT NULL DEFAULT 1,
  PRIMARY KEY (`id`),
  KEY `cauhoitn_cauhoi_id_foreign` (`cauhoi_id`),
  KEY `cauhoitn_phanhoi_id_foreign` (`phanhoi_id`),
  CONSTRAINT `cauhoitn_cauhoi_id_foreign` FOREIGN KEY (`cauhoi_id`) REFERENCES `cauhoi` (`id`) ON DELETE CASCADE,
  CONSTRAINT `cauhoitn_phanhoi_id_foreign` FOREIGN KEY (`phanhoi_id`) REFERENCES `phanhoi` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cauhoitn`
--

LOCK TABLES `cauhoitn` WRITE;
/*!40000 ALTER TABLE `cauhoitn` DISABLE KEYS */;
/*!40000 ALTER TABLE `cauhoitn` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cautraloi`
--

DROP TABLE IF EXISTS `cautraloi`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `cautraloi` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `cauhoi_id` bigint(20) unsigned NOT NULL,
  `phanhoi_id` bigint(20) unsigned NOT NULL,
  `traloivb` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mo_ta` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` smallint(6) NOT NULL DEFAULT 1,
  PRIMARY KEY (`id`),
  KEY `cautraloi_cauhoi_id_foreign` (`cauhoi_id`),
  KEY `cautraloi_phanhoi_id_foreign` (`phanhoi_id`),
  CONSTRAINT `cautraloi_cauhoi_id_foreign` FOREIGN KEY (`cauhoi_id`) REFERENCES `cauhoi` (`id`) ON DELETE CASCADE,
  CONSTRAINT `cautraloi_phanhoi_id_foreign` FOREIGN KEY (`phanhoi_id`) REFERENCES `phanhoi` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cautraloi`
--

LOCK TABLES `cautraloi` WRITE;
/*!40000 ALTER TABLE `cautraloi` DISABLE KEYS */;
/*!40000 ALTER TABLE `cautraloi` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cautraloitn`
--

DROP TABLE IF EXISTS `cautraloitn`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `cautraloitn` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `cauhoi_id` bigint(20) unsigned NOT NULL,
  `phanhoi_id` bigint(20) unsigned NOT NULL,
  `giatridachon` smallint(6) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `cautraloitn_cauhoi_id_foreign` (`cauhoi_id`),
  KEY `cautraloitn_phanhoi_id_foreign` (`phanhoi_id`),
  CONSTRAINT `cautraloitn_cauhoi_id_foreign` FOREIGN KEY (`cauhoi_id`) REFERENCES `cauhoi` (`id`) ON DELETE CASCADE,
  CONSTRAINT `cautraloitn_phanhoi_id_foreign` FOREIGN KEY (`phanhoi_id`) REFERENCES `phanhoi` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cautraloitn`
--

LOCK TABLES `cautraloitn` WRITE;
/*!40000 ALTER TABLE `cautraloitn` DISABLE KEYS */;
/*!40000 ALTER TABLE `cautraloitn` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `chuongtrinhdaotao`
--

DROP TABLE IF EXISTS `chuongtrinhdaotao`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `chuongtrinhdaotao` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `ten_ctdt` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ma_mh` bigint(20) unsigned NOT NULL,
  `hoc_ky` int(11) NOT NULL,
  `nien_khoa` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `chuongtrinhdaotao_ma_mh_foreign` (`ma_mh`),
  CONSTRAINT `chuongtrinhdaotao_ma_mh_foreign` FOREIGN KEY (`ma_mh`) REFERENCES `monhoc` (`id`) ON DELETE CASCADE
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
-- Table structure for table `formmh`
--

DROP TABLE IF EXISTS `formmh`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `formmh` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `ma_ctdt` bigint(20) unsigned NOT NULL,
  `form_id` bigint(20) unsigned NOT NULL,
  `mo_ta` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `soluong` int(11) NOT NULL,
  `solandung` int(11) NOT NULL,
  `status` smallint(6) NOT NULL DEFAULT 1,
  PRIMARY KEY (`id`),
  KEY `formmh_ma_ctdt_foreign` (`ma_ctdt`),
  KEY `formmh_form_id_foreign` (`form_id`),
  CONSTRAINT `formmh_form_id_foreign` FOREIGN KEY (`form_id`) REFERENCES `forms` (`id`) ON DELETE CASCADE,
  CONSTRAINT `formmh_ma_ctdt_foreign` FOREIGN KEY (`ma_ctdt`) REFERENCES `chuongtrinhdaotao` (`id`) ON DELETE CASCADE
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
-- Table structure for table `forms`
--

DROP TABLE IF EXISTS `forms`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `forms` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `ten_form` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mo_ta` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `loaiform_id` bigint(20) unsigned NOT NULL,
  `user_id` bigint(20) unsigned NOT NULL,
  `role_id` bigint(20) unsigned NOT NULL,
  `soluong` int(11) NOT NULL,
  `solandung` int(11) NOT NULL,
  `status` smallint(6) NOT NULL DEFAULT 1,
  PRIMARY KEY (`id`),
  KEY `forms_loaiform_id_foreign` (`loaiform_id`),
  KEY `forms_user_id_foreign` (`user_id`),
  KEY `forms_role_id_foreign` (`role_id`),
  CONSTRAINT `forms_loaiform_id_foreign` FOREIGN KEY (`loaiform_id`) REFERENCES `loaiform` (`id`) ON DELETE CASCADE,
  CONSTRAINT `forms_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE,
  CONSTRAINT `forms_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
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
-- Table structure for table `giangvien`
--

DROP TABLE IF EXISTS `giangvien`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `giangvien` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `ten_giang_vien` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ma_khoa` bigint(20) unsigned NOT NULL,
  `ma_ctdt` bigint(20) unsigned NOT NULL,
  `user_id` bigint(20) unsigned NOT NULL,
  `dia_chi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gioi_tinh` smallint(6) NOT NULL DEFAULT 1,
  `ngay_sinh` date NOT NULL,
  `status` smallint(6) NOT NULL DEFAULT 1,
  PRIMARY KEY (`id`),
  KEY `giangvien_ma_khoa_foreign` (`ma_khoa`),
  KEY `giangvien_ma_ctdt_foreign` (`ma_ctdt`),
  KEY `giangvien_user_id_foreign` (`user_id`),
  CONSTRAINT `giangvien_ma_ctdt_foreign` FOREIGN KEY (`ma_ctdt`) REFERENCES `chuongtrinhdaotao` (`id`) ON DELETE CASCADE,
  CONSTRAINT `giangvien_ma_khoa_foreign` FOREIGN KEY (`ma_khoa`) REFERENCES `khoa` (`id`) ON DELETE CASCADE,
  CONSTRAINT `giangvien_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
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
-- Table structure for table `khaosat`
--

DROP TABLE IF EXISTS `khaosat`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `khaosat` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `ten_khao_sat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mo_ta` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` bigint(20) unsigned NOT NULL,
  `role_id` bigint(20) unsigned NOT NULL,
  `ngay_tao_lap` date DEFAULT NULL,
  `ngay_het_han` date DEFAULT NULL,
  `status` smallint(6) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `khaosat_user_id_foreign` (`user_id`),
  KEY `khaosat_role_id_foreign` (`role_id`),
  CONSTRAINT `khaosat_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE,
  CONSTRAINT `khaosat_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
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
-- Table structure for table `khoa`
--

DROP TABLE IF EXISTS `khoa`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `khoa` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `ten_khoa` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
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
-- Table structure for table `loaiform`
--

DROP TABLE IF EXISTS `loaiform`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `loaiform` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `ten_loai_form` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `giatri_loaiform` smallint(6) NOT NULL,
  `khaosat_id` bigint(20) unsigned NOT NULL,
  `mo_ta` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `soluong` int(11) NOT NULL,
  `solandung` int(11) NOT NULL,
  `status` smallint(6) NOT NULL DEFAULT 1,
  PRIMARY KEY (`id`),
  KEY `loaiform_khaosat_id_foreign` (`khaosat_id`),
  CONSTRAINT `loaiform_khaosat_id_foreign` FOREIGN KEY (`khaosat_id`) REFERENCES `khaosat` (`id`) ON DELETE CASCADE
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
-- Table structure for table `lop`
--

DROP TABLE IF EXISTS `lop`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `lop` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `ten_lop` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ma_khoa` bigint(20) unsigned NOT NULL,
  `ma_ctdt` bigint(20) unsigned NOT NULL,
  `ngay_bat_dau` date DEFAULT NULL,
  `ngay_ket_thuc` date DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `lop_ma_khoa_foreign` (`ma_khoa`),
  KEY `lop_ma_ctdt_foreign` (`ma_ctdt`),
  CONSTRAINT `lop_ma_ctdt_foreign` FOREIGN KEY (`ma_ctdt`) REFERENCES `chuongtrinhdaotao` (`id`) ON DELETE CASCADE,
  CONSTRAINT `lop_ma_khoa_foreign` FOREIGN KEY (`ma_khoa`) REFERENCES `khoa` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `lop`
--

LOCK TABLES `lop` WRITE;
/*!40000 ALTER TABLE `lop` DISABLE KEYS */;
/*!40000 ALTER TABLE `lop` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (1,'2014_10_09_032519_create_roles_table',1),(2,'2014_10_12_000000_create_users_table',1),(3,'2019_12_14_000001_create_personal_access_tokens_table',1),(4,'2022_10_09_024246_create_khoa_table',1),(5,'2022_10_09_024540_create_monhoc_table',1),(6,'2022_10_09_024541_create_chuongtrinhdaotao_table',1),(7,'2022_10_09_024720_create_lop_table',1),(8,'2022_10_09_030019_create_giangvien_table',1),(9,'2022_10_09_031727_create_sinhvien_table',1),(10,'2022_10_09_131822_create_khaosat_table',1),(11,'2022_10_09_131823_create_loaiform_table',1),(12,'2022_10_09_131937_create_forms_table',1),(13,'2022_10_09_133644_create_formmh_table',1),(14,'2022_10_09_134208_create_phanhoi_table',1),(15,'2022_10_09_134227_create_cauhoi_table',1),(16,'2022_10_09_140847_create_cauhoitn_table',1),(17,'2022_10_09_145014_create_cautraloi_table',1),(18,'2022_10_09_145022_create_cautraloitn_table',1);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `monhoc`
--

DROP TABLE IF EXISTS `monhoc`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `monhoc` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `ten_mon_hoc` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
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
-- Table structure for table `personal_access_tokens`
--

DROP TABLE IF EXISTS `personal_access_tokens`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `personal_access_tokens`
--

LOCK TABLES `personal_access_tokens` WRITE;
/*!40000 ALTER TABLE `personal_access_tokens` DISABLE KEYS */;
/*!40000 ALTER TABLE `personal_access_tokens` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `phanhoi`
--

DROP TABLE IF EXISTS `phanhoi`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `phanhoi` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `khaosat_id` bigint(20) unsigned NOT NULL,
  `user_id` bigint(20) unsigned NOT NULL,
  `mo_ta` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` smallint(6) NOT NULL DEFAULT 1,
  PRIMARY KEY (`id`),
  KEY `phanhoi_khaosat_id_foreign` (`khaosat_id`),
  KEY `phanhoi_user_id_foreign` (`user_id`),
  CONSTRAINT `phanhoi_khaosat_id_foreign` FOREIGN KEY (`khaosat_id`) REFERENCES `khaosat` (`id`) ON DELETE CASCADE,
  CONSTRAINT `phanhoi_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `phanhoi`
--

LOCK TABLES `phanhoi` WRITE;
/*!40000 ALTER TABLE `phanhoi` DISABLE KEYS */;
/*!40000 ALTER TABLE `phanhoi` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `roles`
--

DROP TABLE IF EXISTS `roles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `roles` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `ten_role` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mo_ta` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` smallint(6) NOT NULL DEFAULT 1,
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
-- Table structure for table `sinhvien`
--

DROP TABLE IF EXISTS `sinhvien`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `sinhvien` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `ten_sv` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) unsigned NOT NULL,
  `ma_khoa` bigint(20) unsigned NOT NULL,
  `ma_lop` bigint(20) unsigned NOT NULL,
  `dia_chi` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gioi_tinh` smallint(6) NOT NULL DEFAULT 1,
  `ngay_sinh` date NOT NULL,
  `nam_nhap_hoc` date DEFAULT NULL,
  `nam_tot_nghiep` date DEFAULT NULL,
  `status` smallint(6) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `sinhvien_user_id_foreign` (`user_id`),
  KEY `sinhvien_ma_khoa_foreign` (`ma_khoa`),
  KEY `sinhvien_ma_lop_foreign` (`ma_lop`),
  CONSTRAINT `sinhvien_ma_khoa_foreign` FOREIGN KEY (`ma_khoa`) REFERENCES `khoa` (`id`) ON DELETE CASCADE,
  CONSTRAINT `sinhvien_ma_lop_foreign` FOREIGN KEY (`ma_lop`) REFERENCES `lop` (`id`) ON DELETE CASCADE,
  CONSTRAINT `sinhvien_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
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
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role_id` bigint(20) unsigned NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`),
  KEY `users_role_id_foreign` (`role_id`),
  CONSTRAINT `users_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
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

-- Dump completed on 2022-10-31  9:14:36
