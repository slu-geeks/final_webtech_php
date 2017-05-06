-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 05, 2017 at 04:19 PM
-- Server version: 5.7.14
-- PHP Version: 5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `webtek-final`
--

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `feedback_id` int(10) NOT NULL,
  `ranking` int(2) DEFAULT NULL,
  `contacting_phone_number` varchar(20) DEFAULT NULL,
  `feedback_messages` longtext,
  `account_id` int(10) DEFAULT NULL,
  `feedback_date` date NOT NULL,
  `consideration_date` date DEFAULT NULL,
  `feedback_status` int(2) NOT NULL,
  `checked_description` longtext,
  `checker_account_id` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`feedback_id`, `ranking`, `contacting_phone_number`, `feedback_messages`, `account_id`, `feedback_date`, `consideration_date`, `feedback_status`, `checked_description`, `checker_account_id`) VALUES
(1, 5, '09062652263', '34e20', 2, '2017-03-31', NULL, 1, NULL, NULL),
(2, 1, '09062652216', '87c8f', 10, '2017-04-01', NULL, 1, NULL, NULL),
(3, 7, '09062652251', 'd9608', 6, '2017-04-12', NULL, 1, NULL, NULL),
(4, 4, '09062652210', '96109', 1, '2017-04-02', NULL, 1, NULL, NULL),
(5, 4, '09062652238', '98a8f', 1, '2017-04-14', NULL, 1, NULL, NULL),
(6, 9, '09062652288', '37f98', 2, '2017-04-02', NULL, 1, NULL, NULL),
(7, 2, '09062652224', '33470', 3, '2017-04-03', NULL, 1, NULL, NULL),
(8, 4, '09062652221', '073be', 7, '2017-04-06', NULL, 1, NULL, NULL),
(9, 7, '09062652283', 'dadb5', 6, '2017-04-06', NULL, 1, NULL, NULL),
(10, 8, '09062652280', 'c3afa', 3, '2017-04-13', NULL, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `pet_service`
--

CREATE TABLE `pet_service` (
  `service_id` int(10) NOT NULL,
  `service_name` varchar(45) NOT NULL,
  `service_description` varchar(45) NOT NULL,
  `service_price` int(10) DEFAULT NULL,
  `service_duration_from` date NOT NULL,
  `service_duration_to` date NOT NULL,
  `service_picture` longblob
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `pet_service`
--

INSERT INTO `pet_service` (`service_id`, `service_name`, `service_description`, `service_price`, `service_duration_from`, `service_duration_to`, `service_picture`) VALUES
(1, '50a7f', '176a0', 142, '2017-04-20', '2017-04-25', NULL),
(2, 'f7cf9', '4db39', 238, '2017-04-17', '2017-04-25', NULL),
(3, 'a9776', '85d54', 176, '2017-04-16', '2017-04-25', NULL),
(4, 'a7f2e', 'd739a', 127, '2017-04-19', '2017-04-25', NULL),
(5, '43986', '1f6fe', 399, '2017-04-15', '2017-04-25', NULL),
(6, '8a371', 'e55b8', 187, '2017-04-20', '2017-04-25', NULL),
(7, 'd2e34', '15c51', 258, '2017-04-18', '2017-04-25', NULL),
(8, '5b8a1', '2457f', 362, '2017-04-16', '2017-04-25', NULL),
(9, '9e770', '49a9d', 377, '2017-04-18', '2017-04-25', NULL),
(10, 'da19c', '2bbb5', 336, '2017-04-15', '2017-04-25', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `role_id` int(11) NOT NULL,
  `role_name` varchar(20) CHARACTER SET latin1 NOT NULL,
  `description` varchar(255) CHARACTER SET latin1 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`role_id`, `role_name`, `description`) VALUES
(1, 'customer', 'Customer role with limited access right'),
(2, 'service provider', 'service provider role with servicing right'),
(3, 'admin', 'admin role with admin access right');

-- --------------------------------------------------------

--
-- Table structure for table `service_request`
--

CREATE TABLE `service_request` (
  `request_id` int(10) NOT NULL,
  `start_servicing` date DEFAULT NULL,
  `end_servicing` date DEFAULT NULL,
  `request_status` int(2) UNSIGNED ZEROFILL NOT NULL,
  `service_id` int(10) DEFAULT NULL,
  `account_id` int(10) DEFAULT NULL,
  `cust_id` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `service_request`
--

INSERT INTO `service_request` (`request_id`, `start_servicing`, `end_servicing`, `request_status`, `service_id`, `account_id`, `cust_id`) VALUES
(1, '2017-04-03', '2017-04-18', 01, 3, 2, '02'),
(2, '2017-04-10', '2017-04-19', 01, 2, 2, '02'),
(3, '2017-04-03', '2017-04-18', 01, 2, 9, '02'),
(4, '2017-04-13', '2017-04-18', 01, 8, 10, '02'),
(5, '2017-04-04', '2017-04-22', 01, 7, 10, '02'),
(6, '2017-04-09', '2017-04-22', 01, 2, 6, '02'),
(7, '2017-04-06', '2017-04-16', 01, 9, 6, '02'),
(8, '2017-03-31', '2017-04-19', 01, 7, 3, '02'),
(9, '2017-04-08', '2017-04-17', 01, 7, 8, '02'),
(10, '2017-03-31', '2017-04-16', 01, 6, 1, '02'),
(11, '2017-05-20', '2017-06-02', 01, 9, 11, '02'),
(12, '2017-05-30', '2017-06-02', 02, 3, 11, '02'),
(13, '2017-05-27', '2017-06-02', 01, 4, 11, '02');

-- --------------------------------------------------------

--
-- Table structure for table `user_account`
--

CREATE TABLE `user_account` (
  `account_id` int(11) NOT NULL,
  `username` varchar(45) CHARACTER SET latin1 DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `address` longtext NOT NULL,
  `first_name` varchar(45) NOT NULL,
  `last_name` varchar(45) NOT NULL,
  `middle_name` varchar(45) DEFAULT NULL,
  `status` int(2) UNSIGNED ZEROFILL NOT NULL,
  `email_address` varchar(100) NOT NULL,
  `birthday` date DEFAULT NULL,
  `phone_number` varchar(20) DEFAULT NULL,
  `role_id` int(11) DEFAULT NULL,
  `user_picture` longblob
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user_account`
--

INSERT INTO `user_account` (`account_id`, `username`, `password`, `address`, `first_name`, `last_name`, `middle_name`, `status`, `email_address`, `birthday`, `phone_number`, `role_id`, `user_picture`) VALUES
(1, '4d144', '9ece9', '98b09', '87475', '0045b', '347f9', 01, '4fed7', '2017-04-25', '09062354522', 1, NULL),
(2, '60d83', '92fa8', 'f087f', 'c26de', '3223b', '36ec6', 01, '43142', '2017-04-25', '09062354590', 1, NULL),
(3, '96f22', '924dd', '083ee', '7653f', '1e1d2', 'a1ad9', 01, 'c8239', '2017-04-25', '09062354577', 1, NULL),
(4, '58f7d', 'c7705', '9891a', '885df', '2f222', '01ff1', 01, '13a50', '2017-04-25', '09062354553', 1, NULL),
(5, '3d114', 'ae997', '313ec', '19460', '1c765', '9b127', 01, '0f50c', '2017-04-25', '09062354518', 1, NULL),
(6, '92426', '7f3a9', '88aed', '3bece', 'd5f59', '1c1dc', 01, 'a13b7', '2017-04-25', '09062354584', 1, NULL),
(7, 'eab0f', '758e8', 'c3eb5', '5c8cb', 'd45ca', '53353', 01, '3faa2', '2017-04-25', '09062354525', 1, NULL),
(8, '62b3e', '73352', 'bca2b', 'b6463', '694a1', '37afb', 01, '26e0d', '2017-04-25', '09062354531', 1, NULL),
(9, '00e57', '8a0e5', 'e0f2d', '1fa68', '68b64', '5f4a2', 01, 'a7116', '2017-04-25', '09062354593', 1, NULL),
(10, '655dc', 'c5d7d', '54064', '90514', '2220a', '75e2d', 01, 'f8f3b', '2017-04-25', '09062354549', 1, NULL),
(11, 'mehdi', '123', 'baguio', 'Mehdi', 'Afsari', '', 01, 'mehdi@mail.com', '1986-07-29', '09062658383', 1, '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`feedback_id`),
  ADD KEY `FK_feedback_giver_idx` (`account_id`),
  ADD KEY `FK_feedback_checker_idx` (`checker_account_id`);

--
-- Indexes for table `pet_service`
--
ALTER TABLE `pet_service`
  ADD PRIMARY KEY (`service_id`),
  ADD UNIQUE KEY `service_name_UNIQUE` (`service_name`),
  ADD UNIQUE KEY `service_description_UNIQUE` (`service_description`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`role_id`),
  ADD UNIQUE KEY `role_name_UNIQUE` (`role_name`),
  ADD UNIQUE KEY `description_UNIQUE` (`description`);

--
-- Indexes for table `service_request`
--
ALTER TABLE `service_request`
  ADD PRIMARY KEY (`request_id`),
  ADD KEY `FK_user_account_idx` (`account_id`),
  ADD KEY `FK_pet_service_idx` (`service_id`);

--
-- Indexes for table `user_account`
--
ALTER TABLE `user_account`
  ADD PRIMARY KEY (`account_id`),
  ADD UNIQUE KEY `email_address_UNIQUE` (`email_address`),
  ADD UNIQUE KEY `username_UNIQUE` (`username`),
  ADD KEY `FK_user_account_role_idx` (`role_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `feedback_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `pet_service`
--
ALTER TABLE `pet_service`
  MODIFY `service_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `service_request`
--
ALTER TABLE `service_request`
  MODIFY `request_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `user_account`
--
ALTER TABLE `user_account`
  MODIFY `account_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `feedback`
--
ALTER TABLE `feedback`
  ADD CONSTRAINT `FK_feedback_checker` FOREIGN KEY (`checker_account_id`) REFERENCES `user_account` (`account_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `FK_feedback_giver` FOREIGN KEY (`account_id`) REFERENCES `user_account` (`account_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `service_request`
--
ALTER TABLE `service_request`
  ADD CONSTRAINT `FK_cust_account` FOREIGN KEY (`account_id`) REFERENCES `user_account` (`account_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `FK_pet_service` FOREIGN KEY (`service_id`) REFERENCES `pet_service` (`service_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `FK_user_account` FOREIGN KEY (`account_id`) REFERENCES `user_account` (`account_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `user_account`
--
ALTER TABLE `user_account`
  ADD CONSTRAINT `FK_user_account_role` FOREIGN KEY (`role_id`) REFERENCES `role` (`role_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
