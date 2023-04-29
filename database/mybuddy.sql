-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 29, 2023 at 03:54 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mybuddy`
--

-- --------------------------------------------------------

--
-- Table structure for table `password_reset`
--

CREATE TABLE `password_reset` (
  `id` bigint(20) NOT NULL,
  `password_reset_email` varchar(255) NOT NULL,
  `password_reset_selector` varchar(255) NOT NULL,
  `password_reset_token` longtext NOT NULL,
  `password_reset_expires` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE `post` (
  `id` bigint(20) NOT NULL,
  `post_title` varchar(255) NOT NULL,
  `post_content` longtext NOT NULL,
  `post_created_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `post_created_by` varchar(255) NOT NULL,
  `post_created_by_id` bigint(20) NOT NULL,
  `post_created_by_avatar` varchar(255) NOT NULL,
  `post_number_of_answers` bigint(20) DEFAULT 0,
  `post_notification_email_status` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`id`, `post_title`, `post_content`, `post_created_date`, `post_created_by`, `post_created_by_id`, `post_created_by_avatar`, `post_number_of_answers`, `post_notification_email_status`) VALUES
(1, 'What is Lorem Ipsum?', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', '2023-04-28 22:01:18', 'amonmunyai', 1, 'http://localhost/mybuddy/public/assets/images/1.jpg', 1, 1),
(2, 'Why do we use it?', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).', '2023-04-28 22:01:43', 'amonmunyai', 1, 'http://localhost/mybuddy/public/assets/images/1.jpg', 0, 0),
(3, 'Where can I get some?', 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn\'t anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.', '2023-04-29 00:50:23', 'amonmunyai', 1, 'http://localhost/mybuddy/public/assets/images/1.jpg', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `post_answer`
--

CREATE TABLE `post_answer` (
  `id` bigint(20) NOT NULL,
  `post_id` bigint(20) NOT NULL,
  `post_answer_content` longtext NOT NULL,
  `post_answer_created_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `post_answer_created_by` varchar(255) NOT NULL,
  `post_answer_created_by_id` varchar(255) NOT NULL,
  `post_answer_created_by_avatar` varchar(255) NOT NULL,
  `post_answer_number_of_votes` bigint(20) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `post_answer`
--

INSERT INTO `post_answer` (`id`, `post_id`, `post_answer_content`, `post_answer_created_date`, `post_answer_created_by`, `post_answer_created_by_id`, `post_answer_created_by_avatar`, `post_answer_number_of_votes`) VALUES
(11, 1, 'There is no one who loves pain itself, who seeks after it and wants to have it, simply because it is pain...', '2023-04-29 00:49:00', 'johndoe', '2', 'http://localhost/mybuddy/public/assets/images/2.jpg', 0);

-- --------------------------------------------------------

--
-- Table structure for table `post_answer_comment`
--

CREATE TABLE `post_answer_comment` (
  `id` bigint(20) NOT NULL,
  `post_answer_id` bigint(20) NOT NULL,
  `post_answer_comment_content` varchar(255) NOT NULL,
  `post_answer_comment_created_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `post_answer_comment_created_by` varchar(255) NOT NULL,
  `post_answer_comment_number_of_votes` bigint(20) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `post_answer_comment_vote`
--

CREATE TABLE `post_answer_comment_vote` (
  `id` bigint(20) NOT NULL,
  `post_answer__id` bigint(20) NOT NULL,
  `user_id` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `post_answer_vote`
--

CREATE TABLE `post_answer_vote` (
  `id` bigint(20) NOT NULL,
  `post_id` bigint(20) NOT NULL,
  `user_id` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user_account`
--

CREATE TABLE `user_account` (
  `id` int(11) NOT NULL,
  `user_firstname` varchar(255) NOT NULL,
  `user_lastname` varchar(255) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `user_password` varchar(255) NOT NULL,
  `user_avatar` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_account`
--

INSERT INTO `user_account` (`id`, `user_firstname`, `user_lastname`, `user_email`, `user_password`, `user_avatar`) VALUES
(1, 'amon', 'munyai', 'amonmunyai11@gmail.com', '$2y$10$EWp2v3xpD3xx793D6LuoneKTv4t42ItnxWz0vgVtsyH7sxozfypdK', 'http://localhost/mybuddy/public/assets/images/1.jpg'),
(2, 'john', 'doe', 'johndoe@gmail.com', '$2y$10$dw0zVYFggwACzM3zvRYXeO5Ifs4gads.3TKEaTj3hVDabJSc7kzRi', 'http://localhost/mybuddy/public/assets/images/2.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `user_notification`
--

CREATE TABLE `user_notification` (
  `id` bigint(20) NOT NULL,
  `user_notification_image` varchar(255) NOT NULL,
  `user_notification_message` varchar(255) NOT NULL,
  `user_notification_created_by_id` bigint(20) NOT NULL,
  `user_notification_link` varchar(255) NOT NULL,
  `user_id` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_notification`
--

INSERT INTO `user_notification` (`id`, `user_notification_image`, `user_notification_message`, `user_notification_created_by_id`, `user_notification_link`, `user_id`) VALUES
(11, 'http://localhost/mybuddy/public/assets/images/2.jpg', 'There is no one who loves pain its...', 2, 'http://localhost/mybuddy/post/question.php?id=1', '1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `password_reset`
--
ALTER TABLE `password_reset`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `post_answer`
--
ALTER TABLE `post_answer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `post_answer_comment`
--
ALTER TABLE `post_answer_comment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `post_answer_comment_vote`
--
ALTER TABLE `post_answer_comment_vote`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `post_answer_vote`
--
ALTER TABLE `post_answer_vote`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_account`
--
ALTER TABLE `user_account`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_notification`
--
ALTER TABLE `user_notification`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `password_reset`
--
ALTER TABLE `password_reset`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `post`
--
ALTER TABLE `post`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `post_answer`
--
ALTER TABLE `post_answer`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `post_answer_comment`
--
ALTER TABLE `post_answer_comment`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `post_answer_comment_vote`
--
ALTER TABLE `post_answer_comment_vote`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `post_answer_vote`
--
ALTER TABLE `post_answer_vote`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user_account`
--
ALTER TABLE `user_account`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user_notification`
--
ALTER TABLE `user_notification`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
