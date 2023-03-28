-- MySQL dump 10.13  Distrib 5.7.40, for Win64 (x86_64)
--
-- Host: localhost    Database: survey1403
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
-- Table structure for table `class`
--

DROP TABLE IF EXISTS `class`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `class` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `class_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `department_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `class`
--

LOCK TABLES `class` WRITE;
/*!40000 ALTER TABLE `class` DISABLE KEYS */;
INSERT INTO `class` VALUES (0,'Tất cả các lớp',0),(1,'DC19CTT01',1),(2,'DC20CTT01',1),(3,'CC20GMN01',2),(4,'CC21GMN01',2),(5,'DC20STA01',3);
/*!40000 ALTER TABLE `class` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `departments`
--

DROP TABLE IF EXISTS `departments`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `departments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `department_name` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `departments`
--

LOCK TABLES `departments` WRITE;
/*!40000 ALTER TABLE `departments` DISABLE KEYS */;
INSERT INTO `departments` VALUES (0,'Tất cả các khoa'),(1,'Kĩ thuật - Công nghệ'),(2,'Giáo dục mần non'),(3,'Sư phạm');
/*!40000 ALTER TABLE `departments` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `form_survey_logs`
--

DROP TABLE IF EXISTS `form_survey_logs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `form_survey_logs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `question_id` int(11) DEFAULT NULL,
  `form_id` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `form_survey_logs`
--

LOCK TABLES `form_survey_logs` WRITE;
/*!40000 ALTER TABLE `form_survey_logs` DISABLE KEYS */;
INSERT INTO `form_survey_logs` VALUES (1,1,1,1),(2,2,1,1),(3,3,1,1),(4,4,1,1),(5,5,1,1),(6,6,1,1),(7,7,1,1),(8,8,1,1),(9,9,1,1),(10,10,1,1),(11,11,1,1),(12,12,1,1),(13,13,1,1),(14,14,1,1),(15,15,1,1),(16,16,1,1),(17,17,2,1),(18,18,2,1),(19,19,2,1);
/*!40000 ALTER TABLE `form_survey_logs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `form_surveys`
--

DROP TABLE IF EXISTS `form_surveys`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `form_surveys` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(1000) COLLATE utf8_unicode_ci DEFAULT NULL,
  `topic_id` int(11) DEFAULT NULL,
  `time_start` date DEFAULT NULL,
  `time_end` date DEFAULT NULL,
  `department_id` int(11) NOT NULL,
  `class_id` int(11) NOT NULL,
  `all_users` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `form_surveys`
--

LOCK TABLES `form_surveys` WRITE;
/*!40000 ALTER TABLE `form_surveys` DISABLE KEYS */;
INSERT INTO `form_surveys` VALUES (1,'Khảo sát, thu thập ý kiến sinh viên năm học vừa qua',1,'2023-03-09','2023-03-10',0,0,0),(2,'Khảo sát cơ sở vật chất',2,'2023-03-25','2023-03-30',0,0,0);
/*!40000 ALTER TABLE `form_surveys` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `questions`
--

DROP TABLE IF EXISTS `questions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `questions` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `content` varchar(1000) NOT NULL,
  `topic_id` int(10) unsigned NOT NULL,
  `option1` varchar(1000) NOT NULL,
  `option2` varchar(1000) NOT NULL,
  `option3` varchar(1000) NOT NULL,
  `option4` varchar(1000) NOT NULL,
  `option5` varchar(1000) NOT NULL,
  `option6` varchar(1000) NOT NULL,
  `number_option` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `created_by` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `questions`
--

LOCK TABLES `questions` WRITE;
/*!40000 ALTER TABLE `questions` DISABLE KEYS */;
INSERT INTO `questions` VALUES (1,'Sinh viên được cung cấp đầy đủ đề cương chi tiết học phần và bài giảng',1,'Hoàn toàn không đồng ý','Không đồng ý','Không chắc chắn','Phân Vân','Đồng ý','Hoàn toàn đồng ý',6,'2023-03-09 15:49:56',NULL,NULL),(2,'Thời lượng giảng dạy phù hợp và đảm bảo kế hoạch học tập',1,'Hoàn toàn đồng ý','Không đồng ý','Không chắc chắn','Phân vân','Đồng ý ','Hoàn toàn đồng ý',6,'2023-03-09 15:50:54',NULL,NULL),(3,'Bạn được trang bị đủ kiến thức lý thuyết và kỹ năng thực hành từ học phần này',1,'Hoàn toàn không đồng ý','Không đồng ý','Không chắc','Phân vân','Đồng ý','Hoàn toàn đồng ý',6,'2023-03-09 15:51:40',NULL,NULL),(4,'Bạn đã đạt được mục tiêu và kết quả đưa ra trong đề cương chi tiết HP',1,'Hoàn toàn không đồng ý','Không đồng ý','Không chắc chắn','Đồng ý','Hoàn toàn đồng ý','',6,'2023-03-09 15:56:18',NULL,NULL),(5,'Nhận xét của giảng viên giúp bạn cải thiện việc học tập',1,'Hoàn toàn không đồng ý','Không đồng ý','Không chắc chắn','Đồng ý','Hoàn toàn đồng ý','',6,'2023-03-09 15:57:48',NULL,NULL),(6,'Bạn được thông báo đầy đủ thông tin về cách giảng viên đánh giá kết quả học tập (điểm giữa kỳ, điểm kiểm tra thường xuyên, thi kết thúc học phần)',1,'Hoàn toàn không đồng ý','Không đồng ý','Không chắc chắn','Đồng ý','Hoàn toàn đồng ý','',6,'2023-03-09 15:58:30',NULL,NULL),(7,'Bạn có đồng ý với cách đánh giá kết quả học tập của giảng viên',1,'Hoàn toàn không đồng ý','Không đồng ý','Không chắc chắn','Đồng ý','Hoàn toàn đồng ý','',6,'2023-03-09 16:00:18',NULL,NULL),(8,'Học phần giúp bạn phát triển kỹ năng làm việc nhóm',1,'Có','Không','','','','',2,'2023-03-09 16:00:31',NULL,NULL),(9,'Học phần giúp bạn phát triển kỹ năng thuyết trình',1,'Có ','Không','','','','',2,'2023-03-09 16:00:47',NULL,NULL),(10,'Học phần giúp bạn phát triển kỹ năng giải quyết vấn đề',1,'Có ','Không','','','','',2,'2023-03-09 16:15:31',NULL,NULL),(11,'Học phần giúp bạn phát triển kỹ năng tư duy sáng tạo',1,'Có','Không','','','','',2,'2023-03-09 16:15:59',NULL,NULL),(12,'Học phần giúp bạn phát triển kỹ năng tự học, tự phát triển, tự nghiên cứu',1,'Có','Không','','','','',2,'2023-03-09 16:16:20',NULL,NULL),(13,'Học phần giúp bạn phát triển kỹ năng đọc tài liệu bằng tiếng Anh',1,'Có','Không','','','','',2,'2023-03-09 16:16:35',NULL,NULL),(14,'Bạn trải nghiệm học phần này như thế nào',1,'Rất không tốt','Không tốt','Bình thường','Tốt','Rất tốt','',6,'2023-03-09 16:17:17',NULL,NULL),(15,'Góp ý của bạn nhằm cải thiện chất lượng giảng dạy của giảng viên (nội dung, PP giảng gạy, đánh giá kết quả học tập, nhận xét phản hồi cho người học)',1,'','','','','','',0,'2023-03-09 16:17:30',NULL,NULL),(16,'Góp ý nhằm cải thiện chất lượng học phần',1,'','','','','','',0,'2023-03-09 16:17:39',NULL,NULL),(17,'Cơ sở vật chất đạt chất lượng bậc mấy?',2,'1','2','3','4','','',4,'2023-03-18 03:05:46',NULL,NULL),(18,'Cơ sở vật chất tại trường Đại học Phú Yên theo bạn là tốt chưa?',2,'Hoàn toàn không đồng ý','Không đồng ý','Không có ý kiến','Phân vân','Đồng ý','Hoàn toàn đồng ý',6,'2023-03-18 03:07:35',NULL,NULL),(19,'Cơ sở vật chất cần cải thiện những gì. Cho ý kiến cụ thể.',2,'','','','','','',0,'2023-03-18 03:07:59',NULL,NULL);
/*!40000 ALTER TABLE `questions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `topics`
--

DROP TABLE IF EXISTS `topics`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `topics` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `topic_name` varchar(200) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `created_by` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `topics`
--

LOCK TABLES `topics` WRITE;
/*!40000 ALTER TABLE `topics` DISABLE KEYS */;
INSERT INTO `topics` VALUES (1,'Khảo sát ý kiến sinh viên','2023-03-09 15:46:04',''),(2,'Khảo sát cơ sở vật chất\r\n','2023-03-18 03:05:11','admin');
/*!40000 ALTER TABLE `topics` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user_feedback`
--

DROP TABLE IF EXISTS `user_feedback`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user_feedback` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `form_survey_id` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_feedback`
--

LOCK TABLES `user_feedback` WRITE;
/*!40000 ALTER TABLE `user_feedback` DISABLE KEYS */;
INSERT INTO `user_feedback` VALUES (17,'lat',1,'2023-03-18 04:49:17'),(18,'lat',1,'2023-03-18 04:49:52'),(19,'pia',2,'2023-03-18 04:50:11'),(20,'pia',1,'2023-03-18 04:50:39'),(21,'lat',2,'2023-03-18 04:51:04'),(22,'pia',2,'2023-03-18 04:54:55'),(23,'linh',1,'2023-03-18 05:04:49'),(24,'linh',2,'2023-03-18 05:05:31'),(25,'lat',2,'2023-03-18 05:19:37');
/*!40000 ALTER TABLE `user_feedback` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user_feedback_logs`
--

DROP TABLE IF EXISTS `user_feedback_logs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user_feedback_logs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_feedback_times` int(11) DEFAULT NULL,
  `question_id` int(11) DEFAULT NULL,
  `option` int(11) DEFAULT NULL,
  `value` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=150 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_feedback_logs`
--

LOCK TABLES `user_feedback_logs` WRITE;
/*!40000 ALTER TABLE `user_feedback_logs` DISABLE KEYS */;
INSERT INTO `user_feedback_logs` VALUES (1,1,1,6,NULL),(2,1,2,6,NULL),(3,1,3,6,NULL),(4,1,4,5,NULL),(5,1,5,5,NULL),(6,1,6,5,NULL),(7,1,7,5,NULL),(8,1,8,2,NULL),(9,1,9,2,NULL),(10,1,10,2,NULL),(11,1,11,2,NULL),(12,1,12,2,NULL),(13,1,13,2,NULL),(14,1,14,5,NULL),(15,1,15,NULL,'tôi rất tán thành'),(16,1,16,NULL,'không có góp ý gì cả'),(17,2,1,5,NULL),(18,2,2,5,NULL),(19,2,3,5,NULL),(20,2,4,4,NULL),(21,2,5,4,NULL),(22,2,6,4,NULL),(23,2,7,4,NULL),(24,2,8,1,NULL),(25,2,9,1,NULL),(26,2,10,1,NULL),(27,2,11,1,NULL),(28,2,12,1,NULL),(29,2,13,1,NULL),(30,2,14,4,NULL),(31,2,15,NULL,'Không có ý kiến'),(32,2,16,NULL,'Không có ý kiến'),(33,3,1,1,NULL),(34,3,2,1,NULL),(35,3,3,1,NULL),(36,3,4,1,NULL),(37,3,5,1,NULL),(38,3,6,1,NULL),(39,3,7,1,NULL),(40,3,8,1,NULL),(41,3,9,1,NULL),(42,3,10,1,NULL),(43,3,11,1,NULL),(44,3,12,1,NULL),(45,3,13,1,NULL),(46,3,14,1,NULL),(47,3,15,NULL,'Tốt, không có ý kiến'),(48,3,16,NULL,'Tốt, không có ý kiến'),(49,4,1,3,NULL),(50,4,2,3,NULL),(51,4,3,3,NULL),(52,4,4,3,NULL),(53,4,5,3,NULL),(54,4,6,3,NULL),(55,4,7,3,NULL),(56,4,8,2,NULL),(57,4,9,2,NULL),(58,4,10,2,NULL),(59,4,11,2,NULL),(60,4,12,2,NULL),(61,4,13,2,NULL),(62,4,14,3,NULL),(63,4,15,NULL,'No Idea'),(64,4,16,NULL,'Good'),(65,5,17,3,NULL),(66,5,18,4,NULL),(67,5,19,NULL,'Bàn ghế nên đổi thành bàn ghế loại sắt'),(68,16,17,3,NULL),(69,16,18,4,NULL),(70,16,19,NULL,'Cần cải thiện hệ thống máy chiếu'),(71,17,1,3,NULL),(72,17,2,3,NULL),(73,17,3,3,NULL),(74,17,4,5,NULL),(75,17,5,5,NULL),(76,17,6,5,NULL),(77,17,7,5,NULL),(78,17,8,2,NULL),(79,17,9,2,NULL),(80,17,10,2,NULL),(81,17,11,2,NULL),(82,17,12,2,NULL),(83,17,13,2,NULL),(84,17,14,5,NULL),(85,17,15,NULL,'Không có ý kiên'),(86,17,16,NULL,'Tốt '),(87,18,1,5,NULL),(88,18,2,5,NULL),(89,18,3,5,NULL),(90,18,4,4,NULL),(91,18,5,4,NULL),(92,18,6,4,NULL),(93,18,7,4,NULL),(94,18,8,1,NULL),(95,18,9,1,NULL),(96,18,10,1,NULL),(97,18,11,1,NULL),(98,18,12,1,NULL),(99,18,13,1,NULL),(100,18,14,4,NULL),(101,18,15,NULL,'Tốt, không cần thiết thay đổi'),(102,18,16,NULL,'Tốt'),(103,19,17,3,NULL),(104,19,18,4,NULL),(105,19,19,NULL,'Không thay đổi gì cả'),(106,20,1,6,NULL),(107,20,2,6,NULL),(108,20,3,6,NULL),(109,20,4,4,NULL),(110,20,5,4,NULL),(111,20,6,4,NULL),(112,20,7,4,NULL),(113,20,8,1,NULL),(114,20,9,1,NULL),(115,20,10,1,NULL),(116,20,11,1,NULL),(117,20,12,1,NULL),(118,20,13,1,NULL),(119,20,14,3,NULL),(120,20,15,NULL,'Tốt'),(121,20,16,NULL,'Không thêm'),(122,21,17,4,NULL),(123,21,18,5,NULL),(124,21,19,NULL,'Thay đổi và cải thiện hệ thống máy chiếu, bàn ghế'),(125,22,17,4,NULL),(126,22,18,5,NULL),(127,22,19,NULL,'Không cần'),(128,23,1,6,NULL),(129,23,2,6,NULL),(130,23,3,6,NULL),(131,23,4,5,NULL),(132,23,5,5,NULL),(133,23,6,5,NULL),(134,23,7,5,NULL),(135,23,8,1,NULL),(136,23,9,1,NULL),(137,23,10,1,NULL),(138,23,11,1,NULL),(139,23,12,1,NULL),(140,23,13,1,NULL),(141,23,14,3,NULL),(142,23,15,NULL,'Không có ý kiến'),(143,23,16,NULL,'Không phản hồi'),(144,24,17,2,NULL),(145,24,18,4,NULL),(146,24,19,NULL,'Cải thiện chất lượng của dụng cụ giảng dạy. Tôi không thích chúng, bởi vì khăn lau bảng luôn thường xuyên bị mất cắp'),(147,25,17,1,NULL),(148,25,18,2,NULL),(149,25,19,NULL,'Không phản hồi gì thêm nữa');
/*!40000 ALTER TABLE `user_feedback_logs` ENABLE KEYS */;
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
  `birthdate` date NOT NULL,
  `class_id` int(11) NOT NULL,
  `department_id` int(11) NOT NULL,
  `active` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'admin','ADMIN',0,'admin@gmail.com','admin','2023-03-10',0,0,1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(12,'lat','Le A Thuong',1,'leanhthuong6@gmail.com','lat','2000-01-15',1,1,1,'2023-03-09 16:20:57','2023-03-18 02:12:43'),(13,'pia','Loan Pia',1,'lp@gmail.com','pia','2001-08-25',1,1,1,'2023-03-16 03:00:52','0000-00-00 00:00:00'),(14,'linh','Linh Tran',1,'lincoln@gmail.com','linh','2000-08-12',1,1,1,'2023-03-16 03:29:08','0000-00-00 00:00:00'),(15,'phanthanh','Phan Thanh Thuy',2,'phanthanh@gmail.com','phanthanh','1972-10-05',0,1,1,'2023-03-16 03:33:39','0000-00-00 00:00:00'),(16,'quocdung','Dung Tran',2,'tqd@gmail.com','quocdung','1983-03-10',0,1,1,'2023-03-16 03:36:17','0000-00-00 00:00:00'),(17,'kimanh','Le Thi Kim Anh',2,'lethikimanh@gmail.com','kimanh','1987-04-11',0,3,1,'2023-03-18 02:24:26',NULL);
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

-- Dump completed on 2023-03-18 13:34:28
