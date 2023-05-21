-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 14, 2023 at 07:53 AM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 7.4.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `survey`
--

-- --------------------------------------------------------

--
-- Table structure for table `class`
--

CREATE TABLE `class` (
  `id` int(11) NOT NULL,
  `class_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `department_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `class`
--

INSERT INTO `class` (`id`, `class_name`, `department_id`) VALUES
(0, 'Tất cả các lớp', 0),
(1, 'DC19CTT01', 1),
(2, 'DC20CTT01', 1),
(3, 'CC20GMN01', 2),
(4, 'CC21GMN01', 2),
(5, 'DC20STA01', 3);

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

CREATE TABLE `departments` (
  `id` int(11) NOT NULL,
  `department_name` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `departments`
--

INSERT INTO `departments` (`id`, `department_name`) VALUES
(0, 'Tất cả các khoa'),
(1, 'Kĩ thuật - Công nghệ'),
(2, 'Giáo dục mần non'),
(3, 'Sư phạm');

-- --------------------------------------------------------

--
-- Table structure for table `form_surveys`
--

CREATE TABLE `form_surveys` (
  `id` int(11) NOT NULL,
  `title` varchar(1000) COLLATE utf8_unicode_ci DEFAULT NULL,
  `topic_id` int(11) DEFAULT NULL,
  `time_start` date DEFAULT NULL,
  `time_end` date DEFAULT NULL,
  `department_id` int(11) NOT NULL,
  `class_id` int(11) NOT NULL,
  `all_users` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `form_survey_logs`
--

CREATE TABLE `form_survey_logs` (
  `id` int(11) NOT NULL,
  `question_id` int(11) DEFAULT NULL,
  `form_id` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE `questions` (
  `id` int(10) UNSIGNED NOT NULL,
  `content` varchar(1000) NOT NULL,
  `topic_id` int(10) UNSIGNED NOT NULL,
  `option1` varchar(1000) NOT NULL,
  `option2` varchar(1000) NOT NULL,
  `option3` varchar(1000) NOT NULL,
  `option4` varchar(1000) NOT NULL,
  `option5` varchar(1000) NOT NULL,
  `option6` varchar(1000) NOT NULL,
  `number_option` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `created_by` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`id`, `content`, `topic_id`, `option1`, `option2`, `option3`, `option4`, `option5`, `option6`, `number_option`, `created_at`, `created_by`, `updated_at`) VALUES
(1, 'Sinh viên được cung cấp đầy đủ đề cương chi tiết học phần và bài giảng', 1, 'Hoàn toàn không đồng ý', 'Không đồng ý', 'Không chắc chắn', 'Phân Vân', 'Đồng ý', 'Hoàn toàn đồng ý', 6, '2023-03-09 15:49:56', NULL, NULL),
(2, 'Thời lượng giảng dạy phù hợp và đảm bảo kế hoạch học tập', 1, 'Hoàn toàn đồng ý', 'Không đồng ý', 'Không chắc chắn', 'Phân vân', 'Đồng ý ', 'Hoàn toàn đồng ý', 6, '2023-03-09 15:50:54', NULL, NULL),
(3, 'Bạn được trang bị đủ kiến thức lý thuyết và kỹ năng thực hành từ học phần này', 1, 'Hoàn toàn không đồng ý', 'Không đồng ý', 'Không chắc', 'Phân vân', 'Đồng ý', 'Hoàn toàn đồng ý', 6, '2023-03-09 15:51:40', NULL, NULL),
(4, 'Bạn đã đạt được mục tiêu và kết quả đưa ra trong đề cương chi tiết HP', 1, 'Hoàn toàn không đồng ý', 'Không đồng ý', 'Không chắc chắn', 'Đồng ý', 'Hoàn toàn đồng ý', '', 6, '2023-03-09 15:56:18', NULL, NULL),
(5, 'Nhận xét của giảng viên giúp bạn cải thiện việc học tập', 1, 'Hoàn toàn không đồng ý', 'Không đồng ý', 'Không chắc chắn', 'Đồng ý', 'Hoàn toàn đồng ý', '', 6, '2023-03-09 15:57:48', NULL, NULL),
(6, 'Bạn được thông báo đầy đủ thông tin về cách giảng viên đánh giá kết quả học tập (điểm giữa kỳ, điểm kiểm tra thường xuyên, thi kết thúc học phần)', 1, 'Hoàn toàn không đồng ý', 'Không đồng ý', 'Không chắc chắn', 'Đồng ý', 'Hoàn toàn đồng ý', '', 6, '2023-03-09 15:58:30', NULL, NULL),
(7, 'Bạn có đồng ý với cách đánh giá kết quả học tập của giảng viên', 1, 'Hoàn toàn không đồng ý', 'Không đồng ý', 'Không chắc chắn', 'Đồng ý', 'Hoàn toàn đồng ý', '', 6, '2023-03-09 16:00:18', NULL, NULL),
(8, 'Học phần giúp bạn phát triển kỹ năng làm việc nhóm', 1, 'Có', 'Không', '', '', '', '', 2, '2023-03-09 16:00:31', NULL, NULL),
(9, 'Học phần giúp bạn phát triển kỹ năng thuyết trình', 1, 'Có ', 'Không', '', '', '', '', 2, '2023-03-09 16:00:47', NULL, NULL),
(10, 'Học phần giúp bạn phát triển kỹ năng giải quyết vấn đề', 1, 'Có ', 'Không', '', '', '', '', 2, '2023-03-09 16:15:31', NULL, NULL),
(11, 'Học phần giúp bạn phát triển kỹ năng tư duy sáng tạo', 1, 'Có', 'Không', '', '', '', '', 2, '2023-03-09 16:15:59', NULL, NULL),
(12, 'Học phần giúp bạn phát triển kỹ năng tự học, tự phát triển, tự nghiên cứu', 1, 'Có', 'Không', '', '', '', '', 2, '2023-03-09 16:16:20', NULL, NULL),
(13, 'Học phần giúp bạn phát triển kỹ năng đọc tài liệu bằng tiếng Anh', 1, 'Có', 'Không', '', '', '', '', 2, '2023-03-09 16:16:35', NULL, NULL),
(14, 'Bạn trải nghiệm học phần này như thế nào', 1, 'Rất không tốt', 'Không tốt', 'Bình thường', 'Tốt', 'Rất tốt', '', 6, '2023-03-09 16:17:17', NULL, NULL),
(15, 'Góp ý của bạn nhằm cải thiện chất lượng giảng dạy của giảng viên (nội dung, PP giảng gạy, đánh giá kết quả học tập, nhận xét phản hồi cho người học)', 1, '', '', '', '', '', '', 0, '2023-03-09 16:17:30', NULL, NULL),
(16, 'Góp ý nhằm cải thiện chất lượng học phần', 1, '', '', '', '', '', '', 0, '2023-03-09 16:17:39', NULL, NULL),
(17, 'Cơ sở vật chất đạt chất lượng bậc mấy?', 2, '1', '2', '3', '4', '', '', 4, '2023-03-18 03:05:46', NULL, NULL),
(18, 'Cơ sở vật chất tại trường Đại học Phú Yên theo bạn là tốt chưa?', 2, 'Hoàn toàn không đồng ý', 'Không đồng ý', 'Không có ý kiến', 'Phân vân', 'Đồng ý', 'Hoàn toàn đồng ý', 6, '2023-03-18 03:07:35', NULL, NULL),
(19, 'Cơ sở vật chất cần cải thiện những gì. Cho ý kiến cụ thể.', 2, '', '', '', '', '', '', 0, '2023-03-18 03:07:59', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `topics`
--

CREATE TABLE `topics` (
  `id` int(10) UNSIGNED NOT NULL,
  `topic_name` varchar(200) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `created_by` varchar(50) DEFAULT NULL,
  `status` int(11) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `topics`
--

INSERT INTO `topics` (`id`, `topic_name`, `created_at`, `created_by`, `status`) VALUES
(1, 'Khảo sát ý kiến sinh viên', '2023-03-09 15:46:04', '', 1),
(2, 'Khảo sát cơ sở vật chất\r\n', '2023-03-18 03:05:11', 'admin', 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
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
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `user_name`, `full_name`, `role_id`, `email`, `password`, `birthdate`, `class_id`, `department_id`, `active`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'ADMIN', 1, 'admin@gmail.com', 'DHPY@123', '2023-03-10', 0, 0, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `user_feedback`
--

CREATE TABLE `user_feedback` (
  `id` int(11) NOT NULL,
  `user_name` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `form_survey_id` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user_feedback_logs`
--

CREATE TABLE `user_feedback_logs` (
  `id` int(11) NOT NULL,
  `user_feedback_id` int(11) DEFAULT NULL,
  `question_id` int(11) DEFAULT NULL,
  `option` int(11) DEFAULT NULL,
  `value` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `class`
--
ALTER TABLE `class`
  ADD PRIMARY KEY (`id`),
  ADD KEY `department_id` (`department_id`),
  ADD KEY `department_id_2` (`department_id`);

--
-- Indexes for table `departments`
--
ALTER TABLE `departments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `form_surveys`
--
ALTER TABLE `form_surveys`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `form_survey_logs`
--
ALTER TABLE `form_survey_logs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `topics`
--
ALTER TABLE `topics`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_feedback`
--
ALTER TABLE `user_feedback`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_feedback_logs`
--
ALTER TABLE `user_feedback_logs`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `class`
--
ALTER TABLE `class`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `departments`
--
ALTER TABLE `departments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `form_surveys`
--
ALTER TABLE `form_surveys`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `form_survey_logs`
--
ALTER TABLE `form_survey_logs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `questions`
--
ALTER TABLE `questions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `topics`
--
ALTER TABLE `topics`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `user_feedback`
--
ALTER TABLE `user_feedback`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user_feedback_logs`
--
ALTER TABLE `user_feedback_logs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
