-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jan 05, 2020 at 08:29 AM
-- Server version: 5.7.26
-- PHP Version: 7.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bookstore`
--

-- --------------------------------------------------------

--
-- Table structure for table `activations`
--

DROP TABLE IF EXISTS `activations`;
CREATE TABLE IF NOT EXISTS `activations` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `activation_code` int(11) NOT NULL,
  `activation_status` int(11) NOT NULL,
  `created_at` timestamp NOT NULL,
  `updated_at` timestamp NOT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

DROP TABLE IF EXISTS `books`;
CREATE TABLE IF NOT EXISTS `books` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cat_id` int(11) NOT NULL,
  `ISBN` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `author` varchar(255) NOT NULL,
  `publisher` varchar(255) NOT NULL,
  `publish_country` varchar(255) NOT NULL,
  `publish_date` date NOT NULL,
  `file_path` varchar(200) DEFAULT NULL,
  `cover_photo` varchar(255) DEFAULT NULL,
  `long_description` text,
  `created_at` timestamp NOT NULL,
  `updated_at` timestamp NOT NULL,
  PRIMARY KEY (`id`),
  KEY `ISBN` (`ISBN`),
  KEY `cat_id` (`cat_id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`id`, `cat_id`, `ISBN`, `title`, `author`, `publisher`, `publish_country`, `publish_date`, `file_path`, `cover_photo`, `long_description`, `created_at`, `updated_at`) VALUES
(1, 36, 5235, 'The Battle of ADWA', 'Tekletsadik Mekuria', 'ASTER NEGA Publishing', 'ETHIOPIA', '2019-01-15', NULL, NULL, 'This is description of the book', '2019-01-20 08:57:42', '2019-01-20 08:57:42'),
(2, 38, 3523246, 'Advanced Operating Systems', 'William Stalling', 'Wiley Publshing Inc.', 'United States', '2019-01-17', NULL, NULL, 'Advanced Operating systems is .....', '2019-01-20 08:59:08', '2019-01-20 08:59:08'),
(3, 39, 3523246, 'Strength of Materials, a Practical Guide', 'Tekletsadik Mekuria', 'Wiley Publshing Inc.', 'United States', '2019-01-23', NULL, NULL, 'This is the description of .....', '2019-01-20 09:01:26', '2019-01-20 09:01:26'),
(4, 46, 52353, 'Anicient literature and philosophy', 'William Shekispear', 'Wiley Publishing', 'England', '2019-01-09', NULL, NULL, 'This is description ....', '2019-01-21 13:43:54', '2019-01-21 13:43:54'),
(5, 36, 52353435, 'Italian occupation of Ethiopia (1928-1928)', 'Me as author', 'ASTER Nega', 'Ethiopia', '2019-01-15', 'uploads/0321832183.pdf', 'uploads/oop php.JPG', 'This is a description about this book', '2019-01-23 12:19:03', '2019-01-23 12:19:03'),
(6, 38, 553463, 'Object Oriented Programming with PHP', 'William Stalling', 'Wiley Publishing', 'GERMANY', '2019-01-17', 'uploads/0321832183.pdf', 'uploads/oop php.JPG', 'Description here. Description here. Description here.  ', '2019-01-23 12:26:28', '2019-01-23 12:26:28'),
(7, 38, 21313, 'Object oriented Methodologies', 'William Shekispear', 'ASTER Nega', 'England', '2019-01-10', 'uploads/STM-LECTURE NOTES_0_2.pdf', 'uploads/Object Oriented Methodologies.JPG', 'Description. Description. Description. Description. ', '2019-01-23 12:33:35', '2019-01-23 12:33:35'),
(8, 37, 3564, 'Introduction to Termodynamics', 'Yohannes Alemu', 'ASTER NEGA publishing', 'Ethiopia', '2019-12-01', 'uploads/Lab Exercise.pdf', 'uploads/termodynamics.JPG', 'dejwdfhjwdfjdw', '2019-01-25 07:29:30', '2019-01-25 07:29:30'),
(9, 59, 34434, 'Introduction to Astrophysics', 'Wobetu S.', 'Wiley Publishing', 'Ethiopia', '2019-01-11', 'uploads/Muluken Shiferaw - Curriculum Vitae.pdf', 'uploads/googlelogo_color_272x92dp.png', 'ftggvbhbh', '2019-01-25 19:30:14', '2019-01-25 19:30:14'),
(10, 62, 876565, 'Machine Learning Fundamentals', 'Univeristy of Alberta', 'ASTER NEGA', 'CANADA', '2019-12-17', 'uploads/ajax1_2.pdf', 'uploads/coverpage ML.JPG', 'This is sample book description for Machine Learning Fundamentals', '2019-12-28 07:43:34', '2019-12-28 07:43:34');

-- --------------------------------------------------------

--
-- Table structure for table `book_categories`
--

DROP TABLE IF EXISTS `book_categories`;
CREATE TABLE IF NOT EXISTS `book_categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cat_name` varchar(255) NOT NULL,
  `cat_description` text,
  `created_at` timestamp NOT NULL,
  `updated_at` timestamp NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=63 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `book_categories`
--

INSERT INTO `book_categories` (`id`, `cat_name`, `cat_description`, `created_at`, `updated_at`) VALUES
(36, 'History', 'Content description for history books', '2019-01-20 08:38:15', '2019-01-20 08:38:15'),
(37, 'Mechanical Engineering', 'Content description for Mechanical Engineering books', '2019-01-20 08:38:29', '2019-01-20 08:38:29'),
(38, 'Computer Sciences', 'Content description for Computer Science books', '2019-01-20 08:38:40', '2019-01-20 08:38:40'),
(39, 'Material Sciences', 'Content description for Material Science books', '2019-01-20 08:38:47', '2019-01-20 08:38:47'),
(43, 'Electronics', 'Electronics and Electrical Engineering, Hardware and Circuitry', '2019-01-20 09:57:57', '2019-01-20 09:57:57'),
(44, 'Business Management', 'Basiness management is an area of study .....\r\n', '2019-01-20 19:30:55', '2019-01-20 19:30:55'),
(45, 'Sociology and political sciences', 'Description about Sociology and political sciences ...', '2019-01-20 19:32:17', '2019-01-20 19:32:17'),
(46, 'Arts and Literature', 'This is description about Arts and Literature ....', '2019-01-21 13:41:33', '2019-01-21 13:41:33'),
(56, 'Civil Engineering', 'description. Name and type of organisation providing education and training', '2019-01-25 07:21:31', '2019-01-25 07:21:31'),
(57, '', '', '2019-01-25 09:53:03', '2019-01-25 09:53:03'),
(58, '', '', '2019-01-25 09:56:03', '2019-01-25 09:56:03'),
(59, 'Space Science', 'gfrdrdr', '2019-01-25 19:28:46', '2019-01-25 19:28:46'),
(60, 'Cat wobetu', 'asdabndsa', '2019-02-01 06:04:58', '2019-02-01 06:04:58'),
(61, 'History1232', 'ddf', '2019-03-12 11:19:36', '2019-03-12 11:19:36'),
(62, 'Artificial Intelligence', 'This is sample description', '2019-12-28 07:37:58', '2019-12-28 07:37:58');

-- --------------------------------------------------------

--
-- Table structure for table `prices`
--

DROP TABLE IF EXISTS `prices`;
CREATE TABLE IF NOT EXISTS `prices` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `book_id` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `effective` int(11) NOT NULL,
  `created_at` timestamp NOT NULL,
  `updated_at` timestamp NOT NULL,
  PRIMARY KEY (`id`),
  KEY `book_id` (`book_id`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `prices`
--

INSERT INTO `prices` (`id`, `book_id`, `price`, `effective`, `created_at`, `updated_at`) VALUES
(5, 6, 58, 0, '2019-01-25 08:09:19', '2019-01-25 08:09:19'),
(6, 6, 25, 0, '2019-01-25 08:09:54', '2019-01-25 08:09:54'),
(7, 6, 69, 0, '2019-01-25 08:23:10', '2019-01-25 08:23:10'),
(8, 6, 79, 0, '2019-01-25 08:23:50', '2019-01-25 08:23:50'),
(9, 6, 0, 0, '2019-01-25 08:27:39', '2019-01-25 08:27:39'),
(10, 7, 56, 0, '2019-01-25 19:20:08', '2019-01-25 19:20:08'),
(11, 5, 0, 0, '2019-01-25 19:21:17', '2019-01-25 19:21:17'),
(12, 5, 98, 0, '2019-01-25 19:23:07', '2019-01-25 19:23:07'),
(13, 5, 47, 1, '2019-01-25 19:26:49', '2019-01-25 19:26:49'),
(14, 1, 897, 1, '2019-01-25 19:27:21', '2019-01-25 19:27:21'),
(15, 8, 0, 1, '2019-01-25 19:27:49', '2019-01-25 19:27:49'),
(16, 9, 0, 0, '2019-01-25 19:30:33', '2019-01-25 19:30:33'),
(17, 9, 65, 0, '2019-01-25 19:32:20', '2019-01-25 19:32:20'),
(18, 9, 0, 0, '2019-01-25 19:34:16', '2019-01-25 19:34:16'),
(19, 6, 69, 1, '2019-01-27 07:47:03', '2019-01-27 07:47:03'),
(20, 7, 0, 1, '2019-02-01 06:03:18', '2019-02-01 06:03:18'),
(21, 10, 0, 0, '2019-12-28 07:44:11', '2019-12-28 07:44:11'),
(22, 10, 25, 1, '2019-12-28 07:44:30', '2019-12-28 07:44:30'),
(23, 4, 0, 1, '2019-12-28 07:52:20', '2019-12-28 07:52:20');

-- --------------------------------------------------------

--
-- Table structure for table `purchase_orders`
--

DROP TABLE IF EXISTS `purchase_orders`;
CREATE TABLE IF NOT EXISTS `purchase_orders` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `book_id` int(11) NOT NULL,
  `book_price` double NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` timestamp NOT NULL,
  `updated_at` timestamp NOT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  KEY `book_id` (`book_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `purchase_orders`
--

INSERT INTO `purchase_orders` (`id`, `user_id`, `book_id`, `book_price`, `status`, `created_at`, `updated_at`) VALUES
(1, 564, 2, 96, 0, '2019-01-25 08:50:19', '2019-01-25 08:50:19'),
(2, 564, 6, 96, 0, '2019-01-25 19:19:02', '2019-01-25 19:19:02'),
(3, 564, 5, 98, 0, '2019-01-25 19:24:12', '2019-01-25 19:24:12'),
(4, 564, 10, 25, 0, '2019-12-28 07:44:50', '2019-12-28 07:44:50'),
(5, 3456, 10, 25, 0, '2019-12-28 07:53:27', '2019-12-28 07:53:27');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

DROP TABLE IF EXISTS `roles`;
CREATE TABLE IF NOT EXISTS `roles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `role` varchar(255) NOT NULL,
  `role_name` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL,
  `updated_at` timestamp NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `role`, `role_name`, `created_at`, `updated_at`) VALUES
(2, 'admin', 'Administrator', '2019-01-01 20:46:06', '2019-01-01 20:46:06'),
(3, 'customer', 'Customer', '2019-01-01 20:46:06', '2019-01-01 20:46:06'),
(4, 'officer', 'Record Officer', '2019-01-01 20:46:48', '2019-01-01 20:46:48'),
(5, 'manager', 'Manager', '2019-01-01 20:46:48', '2019-01-01 20:46:48');

-- --------------------------------------------------------

--
-- Table structure for table `role_users`
--

DROP TABLE IF EXISTS `role_users`;
CREATE TABLE IF NOT EXISTS `role_users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL,
  `updated_at` timestamp NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `user_id` (`user_id`,`role_id`),
  KEY `role_id` (`role_id`)
) ENGINE=InnoDB AUTO_INCREMENT=47 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `role_users`
--

INSERT INTO `role_users` (`id`, `user_id`, `role_id`, `created_at`, `updated_at`) VALUES
(4, 4121, 2, '2019-01-01 21:43:01', '2019-01-01 21:43:01'),
(16, 564, 4, '2019-01-03 08:34:49', '2019-01-03 08:34:49'),
(19, 654, 5, '2019-01-03 08:37:41', '2019-01-03 08:37:41'),
(25, 5656, 3, '2019-01-12 10:12:03', '2019-01-12 10:12:03'),
(26, 5656, 4, '2019-01-13 08:09:31', '2019-01-13 08:09:31'),
(33, 25623, 5, '2019-01-13 22:21:58', '2019-01-13 22:21:58'),
(38, 6752, 2, '2019-01-21 12:11:08', '2019-01-21 12:11:08'),
(39, 12431, 2, '2019-03-12 11:15:16', '2019-03-12 11:15:16'),
(40, 342, 2, '2019-03-12 11:19:03', '2019-03-12 11:19:03'),
(41, 2143, 2, '2019-03-12 11:42:41', '2019-03-12 11:42:41'),
(42, 21431, 2, '2019-03-27 09:49:31', '2019-03-27 09:49:31'),
(43, 32424, 2, '2019-03-27 19:49:42', '2019-03-27 19:49:42'),
(44, 2312, 2, '2019-03-27 19:56:38', '2019-03-27 19:56:38'),
(45, 3456, 3, '2019-03-27 20:02:54', '2019-03-27 20:02:54'),
(46, 324, 2, '2019-03-27 20:18:21', '2019-03-27 20:18:21');

-- --------------------------------------------------------

--
-- Table structure for table `sales_transactions`
--

DROP TABLE IF EXISTS `sales_transactions`;
CREATE TABLE IF NOT EXISTS `sales_transactions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `book_id` int(11) NOT NULL,
  `price` decimal(10,0) NOT NULL,
  `currency` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL,
  `updated_at` timestamp NOT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  KEY `book_id` (`book_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `fname` varchar(255) DEFAULT NULL,
  `lname` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `mobile` varchar(255) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `state` varchar(255) DEFAULT NULL,
  `profile_pic` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `fname`, `lname`, `email`, `mobile`, `city`, `state`, `profile_pic`) VALUES
(324, 'csv', 'd41d8cd98f00b204e9800998ecf8427e', '', '', '', '', '', '', 'images/img_avatar599.png'),
(342, '242', '68595f6479e11e3d5818c3fadbbf3977', 'ddsfsd', 'sdfsd', 'myemail@gmail.com', '3254235', 'xcbxc', 'Amhara', 'images/52963508_10216435333868385_7641450464076103680_n.jpg'),
(564, 'officer1', '5ebe2294ecd0e0f08eab7690d2a6ee69', 'Rohamma', '', 'example@gmail.com', '3864346', 'Arbaminich', 'DEBUB', NULL),
(654, 'manager1', '5ebe2294ecd0e0f08eab7690d2a6ee69', 'Eyuel', '', 'eyuelkas@gmail.com', '324235', 'Debremarkos', 'Amhara', NULL),
(2143, '3214235', '92049debbe566ca5782a3045cf300a3c', '435fdg', 'sdfds', 'sdgfdsg@cv.com', '235235', 'Debremarkos', 'Amhara', 'images/53469144_2204317086319656_6861078464288522240_n.jpg'),
(2312, '', 'd41d8cd98f00b204e9800998ecf8427e', '', '', '', '', '', '', NULL),
(3456, 'ASTER', '5ebe2294ecd0e0f08eab7690d2a6ee69', 'ASTER ', 'NEGA', 'myemail@gmail.com', '3254235', 'Debremarkos', 'Amhara', 'images/img_avatar2.png'),
(4121, 'wobie123', '5ebe2294ecd0e0f08eab7690d2a6ee69', 'WOBETU', 'SHIFERAW', 'example@gmail.com', '724725', 'Debremarkos', 'AMHARA', ''),
(5656, 'user4545', '5ebe2294ecd0e0f08eab7690d2a6ee69', 'ASTER', 'AWOKE', 'asterawoke@gmail.com', '27467223', 'Addis Ababa', 'Addis Ababa', NULL),
(6752, 'USER99', '5ebe2294ecd0e0f08eab7690d2a6ee69', 'GETAHUN', 'ALEBACHEW', 'myemail@gmail.com', '5463254625', 'Addis Ababa', 'Addis Ababa', 'images/IMG_20170602_025022.jpg'),
(12431, 'cxv', '9b8024c5818bb6705286e58fe5a0c67e', '3wr', 'wdrds', 'sdfgsdg@ccvcxb.com', '234235', 'cxbdc', 'Amhara', NULL),
(21431, '213412', 'c8ffe9a587b126f152ed3d89a146b445', '', '', '', '', '', '', NULL),
(25623, 'USER5544', '5ebe2294ecd0e0f08eab7690d2a6ee69', 'AHMEDIN', 'MOHAMMED', 'myexample@example.com', '748347', 'Bahirdar', 'AMHARA', 'images/img_avatar3.png'),
(32424, '', 'd41d8cd98f00b204e9800998ecf8427e', '', '', '', '', '', '', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user_locations`
--

DROP TABLE IF EXISTS `user_locations`;
CREATE TABLE IF NOT EXISTS `user_locations` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `loc_country` varchar(255) NOT NULL,
  `loc_region` varchar(255) NOT NULL,
  `loc_zone` varchar(255) NOT NULL,
  `loc_city` varchar(255) NOT NULL,
  `loc_subcity` varchar(255) NOT NULL,
  `loc_kebele` varchar(255) DEFAULT NULL,
  `loc_house_no` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL,
  `updated_at` timestamp NOT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=61 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_locations`
--

INSERT INTO `user_locations` (`id`, `user_id`, `loc_country`, `loc_region`, `loc_zone`, `loc_city`, `loc_subcity`, `loc_kebele`, `loc_house_no`, `created_at`, `updated_at`) VALUES
(49, 25623, 'ETHIOPIA', 'TIGRAY', 'NORTH TIGRAY', 'ADWA', 'ADWA', 'ADWA', '354635', '2019-03-27 17:49:35', '2019-03-27 17:49:35'),
(50, 25623, 'ETHIOPIA', 'TIGRAY', 'NORTH TIGRAY', 'ADWA', 'ADWA', 'ADWA', '354635', '2019-03-27 17:50:29', '2019-03-27 17:50:29'),
(51, 564, 'ETHIOPIA', 'TIGRAY', 'NORTH TIGRAY', 'Debremarkos', 'ADWA', 'ADWA', '354635', '2019-03-27 17:52:53', '2019-03-27 17:52:53'),
(52, 564, 'ETHIOPIA', 'TIGRAY', 'NORTH TIGRAY', 'Debremarkos', 'ADWA', 'ADWA', '354635', '2019-03-27 17:53:36', '2019-03-27 17:53:36'),
(53, 6752, 'ETHIOPIA', 'TIGRAY', 'NORTH TIGRAY', 'ADWA', 'ADWA', 'ADWA', '354635', '2019-03-27 17:53:56', '2019-03-27 17:53:56'),
(54, 342, 'ETHIOPIA', 'TIGRAY', 'NORTH TIGRAY', 'Debremarkos', 'ADWA', 'ADWA', '354635', '2019-03-27 17:59:52', '2019-03-27 17:59:52'),
(55, 654, '', '', '', '', '', '', '', '2019-03-27 18:01:14', '2019-03-27 18:01:14'),
(56, 2143, '', '', '', '', '', '', '', '2019-03-27 18:07:47', '2019-03-27 18:07:47'),
(57, 4121, '', '', '', '', '', '', '', '2019-03-27 18:08:50', '2019-03-27 18:08:50'),
(58, 4121, 'ETHIOPIA', 'AMHARA', 'E/Gojjam', 'Debremarkos', 'DEBREMARKOS', '01', '3264732', '2019-03-27 18:10:07', '2019-03-27 18:10:07'),
(59, 5656, '', '', '', '', '', '', '', '2019-03-27 18:24:20', '2019-03-27 18:24:20'),
(60, 3456, 'Ethiopia', 'AMHARA', 'E/Gojjam', 'Debre Markos', 'ADAMA', '02', '4545', '2019-12-28 07:50:35', '2019-12-28 07:50:35');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `activations`
--
ALTER TABLE `activations`
  ADD CONSTRAINT `activations_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `books`
--
ALTER TABLE `books`
  ADD CONSTRAINT `books_ibfk_1` FOREIGN KEY (`cat_id`) REFERENCES `book_categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `prices`
--
ALTER TABLE `prices`
  ADD CONSTRAINT `prices_ibfk_1` FOREIGN KEY (`book_id`) REFERENCES `books` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `purchase_orders`
--
ALTER TABLE `purchase_orders`
  ADD CONSTRAINT `purchase_orders_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `purchase_orders_ibfk_2` FOREIGN KEY (`book_id`) REFERENCES `books` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `role_users`
--
ALTER TABLE `role_users`
  ADD CONSTRAINT `role_users_ibfk_2` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `role_users_ibfk_3` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `sales_transactions`
--
ALTER TABLE `sales_transactions`
  ADD CONSTRAINT `sales_transactions_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `sales_transactions_ibfk_2` FOREIGN KEY (`book_id`) REFERENCES `books` (`id`);

--
-- Constraints for table `user_locations`
--
ALTER TABLE `user_locations`
  ADD CONSTRAINT `user_locations_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
