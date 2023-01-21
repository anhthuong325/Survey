--
-- Table structure for table `class`
--
DROP TABLE IF EXISTS `class`;
CREATE TABLE `class` (
    `id` int(11) NOT NULL AUTO_INCREMENT,
    `class_name` varchar(100) NOT NULL,
    `department_id` int(11) NOT NULL,
    PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
LOCK TABLES `class` WRITE;
INSERT INTO `class` VALUES (1,'DC19CTT01',1),(2,'DC20CTT01',1),(3,'CC20GMN01',2),(4,'CC21GMN01',2),(5,'DC20STA01',3);
UNLOCK TABLES;
--
-- Table structure for table `departments`
--
DROP TABLE IF EXISTS `departments`;
CREATE TABLE `departments` (
    `id` int(11) NOT NULL AUTO_INCREMENT,
    `department_name` varchar(200) DEFAULT NULL,
    PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
LOCK TABLES `departments` WRITE;
INSERT INTO `departments` VALUES (1,'Kĩ thuật - Công nghệ'),(2,'Giáo dục mần non'),(3,'Sư phạm');
UNLOCK TABLES;
--
-- Table structure for table `questions`
--
DROP TABLE IF EXISTS `questions`;
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
LOCK TABLES `questions` WRITE;
UNLOCK TABLES;
--
-- Table structure for table `topics`
--
DROP TABLE IF EXISTS `topics`;
CREATE TABLE `topics` (
    `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
    `topic_name` varchar(200) NOT NULL,
    `created_at` datetime DEFAULT NULL,
    `created_by` varchar(50) DEFAULT NULL,
    PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
LOCK TABLES `topics` WRITE;
UNLOCK TABLES;
--
-- Table structure for table `users`
--
DROP TABLE IF EXISTS `users`;
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
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
LOCK TABLES `users` WRITE;
INSERT INTO `users` VALUES (1,'admin','ADMIN',0,'admin@gmail.com','admin','0000-00-00',0,0,1,'0000-00-00 00:00:00');
UNLOCK TABLES;