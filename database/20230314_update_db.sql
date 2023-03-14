-- MariaDB dump 10.19  Distrib 10.4.27-MariaDB, for Win64 (AMD64)
--
-- Host: 127.0.0.1    Database: survey
-- ------------------------------------------------------
-- Server version	10.4.27-MariaDB

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
  `class_name` varchar(100) NOT NULL,
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
  `department_name` varchar(200) DEFAULT NULL,
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
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `form_survey_logs`
--

LOCK TABLES `form_survey_logs` WRITE;
/*!40000 ALTER TABLE `form_survey_logs` DISABLE KEYS */;
INSERT INTO `form_survey_logs` VALUES (1,1,1,1),(2,2,1,1),(3,3,1,1),(4,4,1,1),(5,5,1,1),(6,6,1,1),(7,7,1,1),(8,8,1,1),(9,9,1,1),(10,10,1,1),(11,11,1,1),(12,12,1,1),(13,13,1,1),(14,14,1,1),(15,15,1,1),(16,16,1,1);
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
  `title` varchar(1000) DEFAULT NULL,
  `topic_id` int(11) DEFAULT NULL,
  `time_start` date DEFAULT NULL,
  `time_end` date DEFAULT NULL,
  `department_id` int(11) NOT NULL,
  `class_id` int(11) NOT NULL,
  `all_users` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `form_surveys`
--

LOCK TABLES `form_surveys` WRITE;
/*!40000 ALTER TABLE `form_surveys` DISABLE KEYS */;
INSERT INTO `form_surveys` VALUES (1,'Khảo sát, thu thập ý kiến sinh viên năm học vừa qua',1,'2023-03-09','2023-03-10',0,0,0);
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
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `questions`
--

LOCK TABLES `questions` WRITE;
/*!40000 ALTER TABLE `questions` DISABLE KEYS */;
INSERT INTO `questions` VALUES (1,'Sinh viên được cung cấp đầy đủ đề cương chi tiết học phần và bài giảng',1,'Hoàn toàn không đồng ý','Không đồng ý','Không chắc chắn','Phân Vân','Đồng ý','Hoàn toàn đồng ý',6,'2023-03-09 15:49:56',NULL,NULL),(2,'Thời lượng giảng dạy phù hợp và đảm bảo kế hoạch học tập',1,'Hoàn toàn đồng ý','Không đồng ý','Không chắc chắn','Phân vân','Đồng ý ','Hoàn toàn đồng ý',6,'2023-03-09 15:50:54',NULL,NULL),(3,'Bạn được trang bị đủ kiến thức lý thuyết và kỹ năng thực hành từ học phần này',1,'Hoàn toàn không đồng ý','Không đồng ý','Không chắc','Phân vân','Đồng ý','Hoàn toàn đồng ý',6,'2023-03-09 15:51:40',NULL,NULL),(4,'Bạn đã đạt được mục tiêu và kết quả đưa ra trong đề cương chi tiết HP',1,'Hoàn toàn không đồng ý','Không đồng ý','Không chắc chắn','Đồng ý','Hoàn toàn đồng ý','',6,'2023-03-09 15:56:18',NULL,NULL),(5,'Nhận xét của giảng viên giúp bạn cải thiện việc học tập',1,'Hoàn toàn không đồng ý','Không đồng ý','Không chắc chắn','Đồng ý','Hoàn toàn đồng ý','',6,'2023-03-09 15:57:48',NULL,NULL),(6,'Bạn được thông báo đầy đủ thông tin về cách giảng viên đánh giá kết quả học tập (điểm giữa kỳ, điểm kiểm tra thường xuyên, thi kết thúc học phần)',1,'Hoàn toàn không đồng ý','Không đồng ý','Không chắc chắn','Đồng ý','Hoàn toàn đồng ý','',6,'2023-03-09 15:58:30',NULL,NULL),(7,'Bạn có đồng ý với cách đánh giá kết quả học tập của giảng viên',1,'Hoàn toàn không đồng ý','Không đồng ý','Không chắc chắn','Đồng ý','Hoàn toàn đồng ý','',6,'2023-03-09 16:00:18',NULL,NULL),(8,'Học phần giúp bạn phát triển kỹ năng làm việc nhóm',1,'Có','Không','','','','',2,'2023-03-09 16:00:31',NULL,NULL),(9,'Học phần giúp bạn phát triển kỹ năng thuyết trình',1,'Có ','Không','','','','',2,'2023-03-09 16:00:47',NULL,NULL),(10,'Học phần giúp bạn phát triển kỹ năng giải quyết vấn đề',1,'Có ','Không','','','','',2,'2023-03-09 16:15:31',NULL,NULL),(11,'Học phần giúp bạn phát triển kỹ năng tư duy sáng tạo',1,'Có','Không','','','','',2,'2023-03-09 16:15:59',NULL,NULL),(12,'Học phần giúp bạn phát triển kỹ năng tự học, tự phát triển, tự nghiên cứu',1,'Có','Không','','','','',2,'2023-03-09 16:16:20',NULL,NULL),(13,'Học phần giúp bạn phát triển kỹ năng đọc tài liệu bằng tiếng Anh',1,'Có','Không','','','','',2,'2023-03-09 16:16:35',NULL,NULL),(14,'Bạn trải nghiệm học phần này như thế nào',1,'Rất không tốt','Không tốt','Bình thường','Tốt','Rất tốt','',6,'2023-03-09 16:17:17',NULL,NULL),(15,'Góp ý của bạn nhằm cải thiện chất lượng giảng dạy của giảng viên (nội dung, PP giảng gạy, đánh giá kết quả học tập, nhận xét phản hồi cho người học)',1,'','','','','','',0,'2023-03-09 16:17:30',NULL,NULL),(16,'Góp ý nhằm cải thiện chất lượng học phần',1,'','','','','','',0,'2023-03-09 16:17:39',NULL,NULL);
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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `topics`
--

LOCK TABLES `topics` WRITE;
/*!40000 ALTER TABLE `topics` DISABLE KEYS */;
INSERT INTO `topics` VALUES (1,'Khảo sát ý kiến sinh viên','2023-03-09 15:46:04','');
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
  `user_name` varchar(50) DEFAULT NULL,
  `form_survey_id` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_feedback`
--

LOCK TABLES `user_feedback` WRITE;
/*!40000 ALTER TABLE `user_feedback` DISABLE KEYS */;
INSERT INTO `user_feedback` VALUES (1,'lat',1,'2023-03-12 15:19:14');
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
  `user_feedback_id` int(11) DEFAULT NULL,
  `question_id` int(11) DEFAULT NULL,
  `option` int(11) DEFAULT NULL,
  `value` varchar(500) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_feedback_logs`
--

LOCK TABLES `user_feedback_logs` WRITE;
/*!40000 ALTER TABLE `user_feedback_logs` DISABLE KEYS */;
INSERT INTO `user_feedback_logs` VALUES (1,1,1,6,NULL),(2,1,2,6,NULL),(3,1,3,6,NULL),(4,1,4,5,NULL),(5,1,5,5,NULL),(6,1,6,5,NULL),(7,1,7,5,NULL),(8,1,8,2,NULL),(9,1,9,2,NULL),(10,1,10,2,NULL),(11,1,11,2,NULL),(12,1,12,2,NULL),(13,1,13,2,NULL),(14,1,14,5,NULL),(15,1,15,NULL,'tôi rất tán thành'),(16,1,16,NULL,'không có góp ý gì cả');
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
  `user_name` varchar(45) NOT NULL,
  `full_name` varchar(45) NOT NULL,
  `role_id` int(11) NOT NULL,
  `email` varchar(45) NOT NULL,
  `password` varchar(45) NOT NULL,
  `birthdate` date NOT NULL,
  `class_id` int(11) NOT NULL,
  `department_id` int(11) NOT NULL,
  `active` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'admin','ADMIN',0,'admin@gmail.com','admin','0000-00-00',0,0,1,'0000-00-00 00:00:00'),(12,'lat','Thuong Le',1,'leanhthuong6@gmail.com','lat','2023-03-09',1,1,1,'2023-03-09 16:20:57');
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

-- Dump completed on 2023-03-14  7:37:07
