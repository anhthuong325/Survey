-- MySQL dump 10.13  Distrib 5.7.40, for Win64 (x86_64)
--
-- Host: localhost    Database: survey
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
  PRIMARY KEY (`id`),
  KEY `department_id` (`department_id`),
  KEY `department_id_2` (`department_id`)
) ENGINE=InnoDB AUTO_INCREMENT=126 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `class`
--

LOCK TABLES `class` WRITE;
/*!40000 ALTER TABLE `class` DISABLE KEYS */;
INSERT INTO `class` VALUES (0,'Tất cả các lớp',0),(1,'CC16CCN01',7),(2,'CC16KTO01',3),(3,'CC16QTR01',3),(4,'CC17KTO01',3),(5,'CC17QTR01',3),(6,'CC18QTR01',3),(7,'CC19QTR01',3),(8,'CC16SAD01',8),(9,'CC16SSG01',12),(10,'DC14SSU01',12),(11,'DC14VAN01',12),(12,'DC15VAN01',12),(13,'DC15VNH01',12),(14,'DC16SVA01',12),(15,'DC17SVA01',12),(16,'DC17VNH01',12),(17,'DC18VNH01',12),(18,'DC19VNH01',12),(19,'DC20VNH01',12),(20,'DC21VNH01',12),(21,'DC22SVA01',12),(22,'DC22VNH01',12),(23,'DLV22SSU01',12),(24,'DLV22SVA01',12),(26,'CC16STK01',2),(27,'DC14CTT01',2),(28,'DC15CTT01',2),(29,'DC16CTT01',2),(30,'DC17CTT01',2),(31,'DC18CTT01',2),(32,'DC19CTT01',2),(33,'DC20CTT01',2),(34,'DC21CTT01',2),(35,'DC22CTT01',2),(36,'DC22STI01',2),(37,'DL20CTT01',2),(38,'DL20STI01',2),(39,'DLV22STI01',2),(40,'DLV22STI02',2),(41,'CC17GTC01',10),(42,'CC19GTC01',10),(43,'CC18GMN01',5),(44,'CC19GMN01',5),(45,'CC20GMN01',5),(46,'CC21GMN01',5),(47,'CC21GMN02',5),(48,'DC14GMN01',5),(49,'DC15GMN01',5),(50,'DC15GMN02',5),(51,'DC16GMN01',5),(52,'DC17GMN01',5),(53,'DC18GMN01',5),(54,'DC19GMN01',5),(55,'DC20GMN01',5),(56,'DC21GMN01',5),(57,'DC21GMN02',5),(58,'DC22GMN01',5),(59,'DL19GMN01',5),(60,'DL21GMN01',5),(61,'DC14GTH02',5),(62,'DC15GTH01',5),(63,'DC15GTH02',5),(64,'DC16GTH01',5),(65,'DC17GTH01',5),(66,'DL19GTH01',5),(67,'DLV20GTH01',5),(68,'DC18GTH01',9),(69,'DC19GTH01',9),(70,'DC20GTH01',9),(71,'DC21GTH01',9),(72,'DC21GTH02',9),(73,'DC21GTH03',9),(74,'DC22GTH01',9),(75,'DLV22GTH02',9),(76,'DLV22GTH03',9),(77,'DLV22GTH04',9),(78,'DLV22GTH05',9),(79,'DLV22GTH06',9),(80,'DBV22GTH01',9),(81,'DC22GTH02',9),(82,'DC22GTH03',9),(83,'DLV21GTH01',9),(84,'DLV22GTH01',9),(85,'DLV22STO01',11),(86,'DLV20STO01',11),(87,'DLV20SHO01',11),(88,'DLV19STO01',11),(89,'DL20STO01',11),(90,'DC22STO01',11),(91,'DC21STO01',11),(92,'DC20STO01',11),(93,'DC17STO01',11),(94,'DC16STO01',11),(95,'DC15HOA01',11),(96,'DC15CSI01',11),(97,'DC14STO02',11),(98,'DC14STO01',11),(99,'DC14HOA01',11),(100,'DC14CSI01',11),(101,'DLV22STA02',6),(102,'DLV22STA01',6),(103,'DLV19STA01',6),(104,'DL19STA01',6),(105,'DC22NNA01',6),(106,'DC21STA01',6),(107,'DC21NNA01',6),(108,'DC20STA01',6),(109,'DC20NNA01',6),(110,'DC19STA01',6),(111,'DC19NNA01',6),(112,'DC18NNA01',6),(113,'DC17STA01',6),(114,'DC17NNA01',6),(115,'DC16STA01',6),(116,'DC16NNA01',6),(117,'DC15STA01',6),(118,'DC15NNA01',6),(119,'DC14STA01',6),(120,'DBV20NNA01',6),(121,'DB22NNA02',6),(122,'DB22NNA01',6),(123,'DB21NNA01',6),(124,'DB20NNA02',6),(125,'DB20NNA01',6);
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
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `departments`
--

LOCK TABLES `departments` WRITE;
/*!40000 ALTER TABLE `departments` DISABLE KEYS */;
INSERT INTO `departments` VALUES (0,'Tất cả các khoa'),(1,'Đào Tạo'),(2,'Kỹ Thuật - Công Nghệ'),(3,'Kinh Tế'),(4,'Lý Luận Chính Trị'),(5,'Giáo Dục Mầm Non'),(6,'Ngoại Ngữ'),(7,'Nông Nghiệp'),(8,'Nghệ Thuật'),(9,'Sư Phạm'),(10,'Giáo Dục Thể Chất'),(11,'Tự Nhiên'),(12,'Xã Hội - Nhân Văn');
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `form_survey_logs`
--

LOCK TABLES `form_survey_logs` WRITE;
/*!40000 ALTER TABLE `form_survey_logs` DISABLE KEYS */;
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `form_surveys`
--

LOCK TABLES `form_surveys` WRITE;
/*!40000 ALTER TABLE `form_surveys` DISABLE KEYS */;
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
) ENGINE=InnoDB AUTO_INCREMENT=38 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `questions`
--

LOCK TABLES `questions` WRITE;
/*!40000 ALTER TABLE `questions` DISABLE KEYS */;
INSERT INTO `questions` VALUES (1,'CVHT có hướng dẫn sinh viên tìm hiểu và triển khai các quy chế, quy định về đào tạo tín chỉ, các quy định của Nhà trường liên quan đến quyền và nghĩa vụ của sinh viên',1,'Không thực hiện','Không đạt','Đạt','Tốt','','',4,'2023-06-10 06:09:50',NULL,NULL),(2,'CVHT có tư vấn cho sinh viên các phương pháp học đại học, cao đẳng, phương pháp tự học và kỹ năng nghiên cứu khoa học, kỹ năng thu thập, xử lý thông tin, tài liệu học tập, việc lựa chọn và khai thác tài nguyên phục vụ cho việc học tập như giáo trình, tài liệu tham khảo, thiết bị thực hành, các công cụ hỗ trợ, ….',1,'Không thực hiện','Không đạt','Đạt','Tốt','','',4,'2023-06-10 06:10:30',NULL,NULL),(3,'CVHT có hướng dẫn cho sinh viên của lớp nắm vững chương trình giáo dục toàn khóa học, cách lựa chọn học phần tuân thủ các điều kiện tiên quyết của từng học phần, xây dựng kế hoạch học tập',1,'Không thực hiện','Không đạt','Đạt','Tốt','','',4,'2023-06-10 06:11:02',NULL,NULL),(4,'CVHT có hướng dẫn cho sinh viên truy cập vào trang đăng ký môn học trực tuyến, cách thức đăng ký học phần, rút bớt học phần,  đăng ký học lại, xây dựng kế hoạch học tập trong từng học kỳ và điều chỉnh kế hoạch học tập cho phù hợp với năng lực và điều kiện cá nhân',1,'Không thực hiện','Không đạt','Đạt','Tốt','','',4,'2023-06-10 06:11:39',NULL,NULL),(5,'CVHT có giải đáp những thắc mắc, yêu cầu của sinh viên về học tập trong phạm vi thẩm quyền của mình hoặc hướng dẫn cho sinh viên tham khảo ý kiến ở những bộ phận có trách nhiệm giải quyết',1,'Không thực hiện','Không đạt','Đạt','Tốt','','',4,'2023-06-10 06:12:15',NULL,NULL),(6,'CVHT có hướng dẫn sinh viên về các thủ tục đăng ký, đề nghị, kiến nghị về học tập và ký xác nhận trước khi gửi đến các bộ phận liên quan',1,'Không thực hiện','Không đạt','Đạt','Tốt','','',4,'2023-06-10 06:17:04',NULL,NULL),(7,'CVHT có nhắc nhở sinh viên khi thấy kết quả học tập của sinh viên bị giảm sút',1,'Không thực hiện','Không đạt','Đạt','Tốt','','',4,'2023-06-10 06:17:33',NULL,NULL),(8,'CVHT có nắm đầy đủ các thông tin cá nhân sinh viên của lớp, đề xuất danh sách ban cán sự lớp và tổ chức sinh hoạt lớp định kỳ 1 tháng/ 1 lần',2,'Không thực hiện','Không đạt','Đạt','Tốt','','',4,'2023-06-10 06:20:04',NULL,NULL),(9,'CVHT có theo dõi, ghi nhận kết quả hoạt động Đoàn, Hội, của khoa của sinh viên, lớp để đánh giá toàn diện kết quả học tập và rèn luyện của sinh viên cuối học kỳ, năm học',2,'Không thực hiện','Không đạt','Đạt','Tốt','','',4,'2023-06-10 06:20:18',NULL,NULL),(10,'CVHT có chủ trì các cuộc họp lớp trong việc xét khen thưởng, kỉ luật và đề xuất hình thức khen thưởng, kỉ luật sinh viên',2,'Không thực hiện','Không đạt','Đạt','Tốt','','',4,'2023-06-10 06:20:33',NULL,NULL),(11,'CVHT có hướng dẫn, theo dõi, khuyến khích và tạo điều kiện cho sinh viên tham gia các hoạt động đoàn thể, hoạt động xã hội, hoạt động ngoại khóa, các hoạt động NCKH, ….',2,'Không thực hiện','Không đạt','Đạt','Tốt','','',4,'2023-06-10 06:20:45',NULL,NULL),(12,'CVHT có thường xuyên kiểm tra việc thực hiện văn hóa học đường của sinh viên, kịp thời nhắc nhở sinh viên vi phạm các quy định và biểu dương khen thưởng những sinh viên thực hiện nghiêm túc',2,'Không thực hiện','Không đạt','Đạt','Tốt','','',4,'2023-06-10 06:21:00',NULL,NULL),(13,'CVHT có thông báo công khai cho sinh viên về thời gian biểu làm việc và lịch tiếp sinh viên, địa điểm tiếp sinh viên định kỳ, cung cấp cho sinh viên só điện thoại, email để sinh viên liên lạc khi cần thiết',2,'Không thực hiện','Không đạt','Đạt','Tốt','','',4,'2023-06-10 06:21:13',NULL,NULL),(14,'Những nhận xét và góp ý với CVHT và nhà trường để công tác CVHT được tốt hơn',2,'','','','','','',0,'2023-06-10 06:21:34',NULL,NULL),(15,'Nếu có thể, em vẫn muốn được có CVHT như thế này trong các năm học sau',1,'Có','Không','','','','',2,'2023-06-10 06:21:47',NULL,NULL),(16,'Cảm nhận chung của anh (chị) về cố vấn học tập của lớp',1,'','','','','','',0,'2023-06-10 06:21:55',NULL,NULL),(17,'Đảm bảo lên lớp đúng giờ và giảng dạy đủ thời gian theo quy định',3,'Rất không đồng ý','Không đồng ý','Phân vân','Đồng ý','Rất đồng ý','Không có ý kiến',6,'2023-06-10 07:42:48',NULL,NULL),(18,'Thực hiện giảng dạy theo đúng thời khóa biểu, khi thay đổi lịch học có thông báo trước',3,'Rất không đồng ý','Không đồng ý','Phân vân','Đồng ý','Rất đồng ý','Không có ý kiến',6,'2023-06-10 07:43:19',NULL,NULL),(19,'Nhiệt tình và có trách nhiệm trong giảng dạy, quản lý lớp học',3,'Rất không đồng ý','Không đồng ý','Phân vân','Đồng ý','Rất đồng ý','Không có ý kiến',6,'2023-06-10 07:44:25',NULL,NULL),(20,'Có thái độ thân thiện, tôn trọng và khuyến khích người học tham gia phát biểu ý kiến',3,'Rất không đồng ý','Không đồng ý','Phân vân','Đồng ý','Rất đồng ý','Không có ý kiến',6,'2023-06-10 07:46:36',NULL,NULL),(21,'Giọng nói, cách trình bày bảng rõ ràng, mạch lạc',3,'Rất không đồng ý','Không đồng ý','Phân vân','Đồng ý','Rất đồng ý','Không có ý kiến',6,'2023-06-10 07:48:36',NULL,NULL),(22,'Quan tâm tổ chức các hoạt động nhóm',3,'Rất không đồng ý','Không đồng ý','Phân vân','Đồng ý','Rất đồng ý','Không có ý kiến',6,'2023-06-10 07:49:12',NULL,NULL),(23,'Giảng dạy kết hợp với giáo dục nhân cách, đạo đức',3,'Rất không đồng ý','Không đồng ý','Phân vân','Đồng ý','Rất đồng ý','Không có ý kiến',6,'2023-06-10 07:51:25',NULL,NULL),(24,'',0,'','','','','','',NULL,'2023-06-10 07:51:36',NULL,NULL),(25,'Công bố Đề cương chi tiết HP ( Mục tiêu HP, Giáo trình chính,  Tài liệu tham khảo, cách thức kiểm tra đánh giá) khi bắt đầu giảng dạy',4,'Rất không đồng ý','Không đồng ý','Phân vân','Đồng ý','Rất đồng ý','Không có ý kiến',6,'2023-06-10 07:51:50',NULL,NULL),(26,'Giảng dạy khoa học, rõ ràng, dễ hiểu, nội dung bài học thiết thực, tạo hứng thú học tập cho người học',4,'Rất không đồng ý','Không đồng ý','Phân vân','Đồng ý','Rất đồng ý','Không có ý kiến',6,'2023-06-10 07:52:17',NULL,NULL),(27,'Kiến thức HP có tính hiện đại, cập nhật và ứng dụng được trong thực tiễn',4,'Rất không đồng ý','Không đồng ý','Phân vân','Đồng ý','Rất đồng ý','Không có ý kiến',6,'2023-06-10 07:52:10',NULL,NULL),(28,'Có kiến thức vững vàng giúp người học nắm vững trọng tâm, giải đáp các thắc mắc một cách thỏa đáng',4,'Rất không đồng ý','Không đồng ý','Phân vân','Đồng ý','Rất đồng ý','Không có ý kiến',6,'2023-06-10 07:52:17',NULL,NULL),(29,'Bám sát mục tiêu và nội dung HP theo đúng tiến độ như Đề cương chi tiết HP',4,'Rất không đồng ý','Không đồng ý','Phân vân','Đồng ý','Rất đồng ý','Không có ý kiến',6,'2023-06-10 07:52:38',NULL,NULL),(30,'Sử dụng có hiệu quả các phương tiện dạy học (bảng, máy chiếu, mô hình…)',4,'Rất không đồng ý','Không đồng ý','Phân vân','Đồng ý','Rất đồng ý','Không có ý kiến',6,'2023-06-10 07:53:03',NULL,NULL),(31,'Dạy học theo hướng phát huy tính tích cực, chủ động, tự nghiên cứu của người học',4,'Rất không đồng ý','Không đồng ý','Phân vân','Đồng ý','Rất đồng ý','Không có ý kiến',6,'2023-06-10 07:53:19',NULL,NULL),(32,'Đề thi, kiểm tra phù hợp với nội dung, tích hợp kiến thức của HP và khuyến khích tính sáng tạo',5,'Rất không đồng ý','Không đồng ý','Phân vân','Đồng ý','Rất đồng ý','Không có ý kiến',6,'2023-06-10 07:54:08',NULL,NULL),(33,'Đánh giá đúng mực, công bằng, đầy đủ điểm bộ phận theo yêu cầu của HP',5,'Rất không đồng ý','Không đồng ý','Phân vân','Đồng ý','Rất đồng ý','Không có ý kiến',6,'2023-06-10 07:54:23',NULL,NULL),(34,'Kết quả kiểm tra  thường xuyên, thi giữa học phần  được thông báo đến người học kịp thời trong quá trình giảng dạy',5,'Rất không đồng ý','Không đồng ý','Phân vân','Đồng ý','Rất đồng ý','Không có ý kiến',6,'2023-06-10 07:54:40',NULL,NULL),(35,'Cảm nhận chung của anh/chị về chất lượng giảng dạy của HP này',4,'','','','','','',0,'2023-06-10 07:55:40',NULL,NULL),(36,'Anh/chị vui lòng cho biết điều mà anh/chị thích nhất ở giảng viên giảng dạy HP này',3,'','','','','','',0,'2023-06-10 07:56:00',NULL,NULL),(37,'Anh/chị vui lòng đưa ra một vài đề nghị cải tiến hoặc sửa đổi để dạy và học tốt hơn HP này',4,'','','','','','',0,'2023-06-10 07:56:16',NULL,NULL);
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
  `status` int(11) DEFAULT 1,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `topics`
--

LOCK TABLES `topics` WRITE;
/*!40000 ALTER TABLE `topics` DISABLE KEYS */;
INSERT INTO `topics` VALUES (1,'Chất lượng đào tạo của Giảng viên','2023-06-10 06:08:41','admin',1),(2,'Công tác quản lý sinh viên','2023-06-10 06:19:25','admin',1),(3,'Tác phong sư phạm','2023-06-10 07:42:03','admin',1),(4,'Phương pháp giảng dạy\r\n','2023-06-10 07:50:31','admin',1),(5,'Kết quả học tập người học','2023-06-10 07:53:46','admin',1);
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_feedback`
--

LOCK TABLES `user_feedback` WRITE;
/*!40000 ALTER TABLE `user_feedback` DISABLE KEYS */;
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
  `value` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_feedback_logs`
--

LOCK TABLES `user_feedback_logs` WRITE;
/*!40000 ALTER TABLE `user_feedback_logs` DISABLE KEYS */;
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
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'admin','ADMIN',1,'admin@gmail.com','admin','2023-03-10',0,0,1,'0000-00-00 00:00:00','0000-00-00 00:00:00');
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

-- Dump completed on 2023-06-10 14:45:08
