--
-- Table structure for table `roles`
--

DROP TABLE IF EXISTS `roles`;
CREATE TABLE `roles` (
    `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
    `ten_role` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
    `mo_ta` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
    `status` smallint(6) NOT NULL DEFAULT 1,
    PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
LOCK TABLES `roles` WRITE;
UNLOCK TABLES;
--
-- Table structure for table `khoa`
--
DROP TABLE IF EXISTS `khoa`;
CREATE TABLE `khoa` (
    `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
    `ten_khoa` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
    PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
LOCK TABLES `khoa` WRITE;
UNLOCK TABLES;
--
-- Table structure for table `monhoc`
--
DROP TABLE IF EXISTS `monhoc`;
CREATE TABLE `monhoc` (
    `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
    `ten_mon_hoc` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
    PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
LOCK TABLES `monhoc` WRITE;
UNLOCK TABLES;

--
-- Table structure for table `cauhoi`
--

DROP TABLE IF EXISTS `cauhoi`;
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
LOCK TABLES `cauhoi` WRITE;
UNLOCK TABLES;

--
-- Table structure for table `cauhoitn`
--

DROP TABLE IF EXISTS `cauhoitn`;
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
LOCK TABLES `cauhoitn` WRITE;
UNLOCK TABLES;
--
-- Table structure for table `cautraloi`
--

DROP TABLE IF EXISTS `cautraloi`;
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
LOCK TABLES `cautraloi` WRITE;
UNLOCK TABLES;
--
-- Table structure for table `cautraloitn`
--
DROP TABLE IF EXISTS `cautraloitn`;
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
LOCK TABLES `cautraloitn` WRITE;
UNLOCK TABLES;
--
-- Table structure for table `chuongtrinhdaotao`
--
DROP TABLE IF EXISTS `chuongtrinhdaotao`;
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
LOCK TABLES `chuongtrinhdaotao` WRITE;
UNLOCK TABLES;
--
-- Table structure for table `formmh`
--
DROP TABLE IF EXISTS `formmh`;
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
LOCK TABLES `formmh` WRITE;
UNLOCK TABLES;
--
-- Table structure for table `forms`
--
DROP TABLE IF EXISTS `forms`;
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
LOCK TABLES `forms` WRITE;
UNLOCK TABLES;
--
-- Table structure for table `giangvien`
--
DROP TABLE IF EXISTS `giangvien`;
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
LOCK TABLES `giangvien` WRITE;
UNLOCK TABLES;
--
-- Table structure for table `khaosat`
--
DROP TABLE IF EXISTS `khaosat`;
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
LOCK TABLES `khaosat` WRITE;
UNLOCK TABLES;

--
-- Table structure for table `loaiform`
--
DROP TABLE IF EXISTS `loaiform`;
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
LOCK TABLES `loaiform` WRITE;
UNLOCK TABLES;
--
-- Table structure for table `lop`
--
DROP TABLE IF EXISTS `lop`;
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
LOCK TABLES `lop` WRITE;
UNLOCK TABLES;


--
-- Table structure for table `phanhoi`
--
DROP TABLE IF EXISTS `phanhoi`;
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
LOCK TABLES `phanhoi` WRITE;
UNLOCK TABLES;


--
-- Table structure for table `sinhvien`
--

DROP TABLE IF EXISTS `sinhvien`;
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
LOCK TABLES `sinhvien` WRITE;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
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
LOCK TABLES `users` WRITE;
UNLOCK TABLES;