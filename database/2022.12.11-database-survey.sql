--
-- Table structure for table `cauhoi`
--

DROP TABLE IF EXISTS `cauhoi`;
CREATE TABLE `cauhoi` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `noi_dung` varchar(1000) NOT NULL,
  `id_chu_de` int(10) unsigned NOT NULL,
  `loai_cau_tra_loi` int(11) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `created_by` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
LOCK TABLES `cauhoi` WRITE;
UNLOCK TABLES;
--
-- Table structure for table `chude`
--
DROP TABLE IF EXISTS `chude`;
CREATE TABLE `chude` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `ten_chu_de` varchar(200) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `created_by` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;
LOCK TABLES `chude` WRITE;
INSERT INTO `chude` VALUES (1,'Điểm thi',NULL,NULL),(2,'Môn học',NULL,NULL),(3,'Giáo Viên',NULL,NULL),(4,'Trường lớp',NULL,NULL);
UNLOCK TABLES;
--
-- Table structure for table `users`
--
DROP TABLE IF EXISTS `users`;
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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
LOCK TABLES `users` WRITE;
INSERT INTO `users` VALUES (1,'admin','ADMIN',1,'admin@gmail.com','admin','0000-00-00 00:00:00','CNTT',1,'0000-00-00 00:00:00','0000-00-00 00:00:00');
UNLOCK TABLES;
