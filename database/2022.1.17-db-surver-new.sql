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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
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
    `birthdate` datetime NOT NULL,
    `khoa` varchar(45) NOT NULL,
    `active` int(11) NOT NULL,
    `created_at` datetime NOT NULL,
    `updated_at` datetime NOT NULL,
    PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
LOCK TABLES `users` WRITE;

INSERT INTO `users` VALUES (1,'admin','ADMIN',1,'admin@gmail.com','admin','0000-00-00 00:00:00','CNTT',1,'0000-00-00 00:00:00','0000-00-00 00:00:00');
UNLOCK TABLES;