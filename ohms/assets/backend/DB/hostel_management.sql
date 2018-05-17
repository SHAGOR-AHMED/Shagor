-- phpMyAdmin SQL Dump
-- version 4.4.12
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 17, 2018 at 02:05 PM
-- Server version: 5.6.25
-- PHP Version: 5.6.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hostel_management`
--

-- --------------------------------------------------------

--
-- Table structure for table `group_sms`
--

CREATE TABLE IF NOT EXISTS `group_sms` (
  `id` int(11) NOT NULL,
  `receipent_type` int(11) NOT NULL,
  `mobile` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `created_by` int(11) NOT NULL,
  `created_datetime` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `group_sms`
--

INSERT INTO `group_sms` (`id`, `receipent_type`, `mobile`, `message`, `created_by`, `created_datetime`) VALUES
(1, 1, '881829159616', 'qwedqsasadasdas', 8, '2014-07-24 04:32:19'),
(4, 1, '881829159616', 'QASDASDCASDSAD', 8, '2014-07-24 04:33:55'),
(30, 1, '8801766535513', 'hi', 13, '2018-05-16 16:41:01'),
(31, 1, '8801814944730', 'hi', 13, '2018-05-16 16:41:01'),
(33, 2, '8801766535513', 'cgbdfgbv ', 13, '2018-05-16 18:00:39'),
(34, 2, '8801814944730', 'cgbdfgbv ', 13, '2018-05-16 18:00:39');

-- --------------------------------------------------------

--
-- Table structure for table `sms_configuration`
--

CREATE TABLE IF NOT EXISTS `sms_configuration` (
  `id` int(11) NOT NULL,
  `sms_gateway` varchar(255) NOT NULL,
  `sms_user_name` varchar(255) NOT NULL,
  `sms_password` varchar(255) NOT NULL,
  `sms_port` varchar(255) NOT NULL,
  `updated_by` int(11) NOT NULL,
  `updated_datetime` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sms_configuration`
--

INSERT INTO `sms_configuration` (`id`, `sms_gateway`, `sms_user_name`, `sms_password`, `sms_port`, `updated_by`, `updated_datetime`) VALUES
(1, 'http://bmp.issl.com.bd/api/curl/', 'shagor ahmed', '', '8080', 8, 2015);

-- --------------------------------------------------------

--
-- Table structure for table `specific_sms`
--

CREATE TABLE IF NOT EXISTS `specific_sms` (
  `id` int(11) NOT NULL,
  `reg_no` varchar(255) NOT NULL,
  `mobile_no` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `created_by` int(11) NOT NULL,
  `created_datetime` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `specific_sms`
--

INSERT INTO `specific_sms` (`id`, `reg_no`, `mobile_no`, `message`, `created_by`, `created_datetime`) VALUES
(1, '875005', '881829159616', 'lkfjlasd flkasdjfla sdfksdalkfj sldk;afjkldsfj ldsfkjasdlf lsad', 8, '2014-07-20 10:58:59'),
(3, '875005', '881829159616', 'asdfdsafdasf', 8, '2014-07-20 11:19:23'),
(4, '875005', '881829159616', ';lksdfjlksdajflkjasdklf', 8, '2014-07-20 11:23:45'),
(5, '875005', '881829159616', 'sisf daslfjlsdaf lkdsf', 8, '2014-07-20 11:24:06');

-- --------------------------------------------------------

--
-- Table structure for table `student_payment`
--

CREATE TABLE IF NOT EXISTS `student_payment` (
  `id` int(10) unsigned NOT NULL,
  `student` varchar(255) NOT NULL,
  `title` text NOT NULL,
  `amount` int(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `mounth` varchar(255) NOT NULL,
  `session` varchar(255) NOT NULL,
  `created_by` int(255) NOT NULL,
  `updated_by` int(255) NOT NULL,
  `created_datetime` datetime NOT NULL,
  `updated_datetime` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student_payment`
--

INSERT INTO `student_payment` (`id`, `student`, `title`, `amount`, `status`, `mounth`, `session`, `created_by`, `updated_by`, `created_datetime`, `updated_datetime`) VALUES
(3, '0', 'fees', 400, '1', '', '', 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(4, '0', 'fee', 300, '1', '', '', 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(5, '2', 'fee', 3000, '1', '9', '2015-2016', 0, 8, '0000-00-00 00:00:00', '2015-01-22 10:03:17'),
(7, '2', 'dgh', 4, '1', '9', '2015-2016', 0, 8, '0000-00-00 00:00:00', '2015-02-17 12:20:04'),
(8, '5', 'fee', 700, '1', '6', '4', 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(9, '2', 'dfg', 600, '0', '10', '2014-2015', 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(10, '2', 'dsgfh', 45646, '1', '9', '2016-2017', 8, 0, '2015-01-22 11:35:38', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_market_cost`
--

CREATE TABLE IF NOT EXISTS `tbl_market_cost` (
  `market_cost_id` int(3) NOT NULL,
  `member_id` int(3) NOT NULL,
  `market_date` varchar(32) NOT NULL,
  `market_cost` int(11) NOT NULL,
  `created_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_market_cost`
--

INSERT INTO `tbl_market_cost` (`market_cost_id`, `member_id`, `market_date`, `market_cost`, `created_time`) VALUES
(1, 3, '04/06/2018', 500, '2018-04-06 14:02:51'),
(2, 1, '04/06/2018', 600, '2018-04-06 14:03:58'),
(3, 1, '05/15/2018', 500, '2018-05-15 07:01:47');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_meal`
--

CREATE TABLE IF NOT EXISTS `tbl_meal` (
  `meal_id` int(3) NOT NULL,
  `member_id` int(3) NOT NULL,
  `date` varchar(32) NOT NULL,
  `morning` int(3) NOT NULL,
  `lunch` int(3) NOT NULL,
  `dinner` int(3) NOT NULL,
  `total` int(3) NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_meal`
--

INSERT INTO `tbl_meal` (`meal_id`, `member_id`, `date`, `morning`, `lunch`, `dinner`, `total`, `created_date`) VALUES
(1, 1, '04/07/2018', 1, 1, 1, 3, '2018-05-10 10:06:52'),
(2, 1, '04/11/2018', 1, 2, 1, 4, '2018-05-10 10:06:57'),
(3, 3, '05/10/2018', 1, 2, 1, 4, '2018-05-10 10:07:04'),
(4, 1, '05/10/2018', 1, 2, 3, 6, '2018-05-10 10:06:35'),
(5, 3, '05/13/2018', 1, 1, 1, 3, '2018-05-13 12:19:50'),
(6, 1, '05/14/2018', 1, 1, 2, 4, '2018-05-14 07:32:11'),
(7, 4, '05/17/2018', 2, 2, 1, 5, '2018-05-17 11:59:32');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_members`
--

CREATE TABLE IF NOT EXISTS `tbl_members` (
  `mem_id` int(11) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `user_name` varchar(32) NOT NULL,
  `password` varchar(255) NOT NULL,
  `mobile` varchar(32) NOT NULL,
  `email` varchar(50) NOT NULL,
  `gardian_name` varchar(50) NOT NULL,
  `gardian_contact` varchar(20) NOT NULL,
  `gardian_email` varchar(50) NOT NULL,
  `address` text CHARACTER SET utf8 NOT NULL,
  `father_name` varchar(50) NOT NULL,
  `mother_name` varchar(50) NOT NULL,
  `photo` varchar(255) NOT NULL,
  `relation_with_gardian` varchar(255) NOT NULL,
  `created_datetime` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_members`
--

INSERT INTO `tbl_members` (`mem_id`, `first_name`, `last_name`, `user_name`, `password`, `mobile`, `email`, `gardian_name`, `gardian_contact`, `gardian_email`, `address`, `father_name`, `mother_name`, `photo`, `relation_with_gardian`, `created_datetime`) VALUES
(1, 'Ekramul ', 'Hoque', 'ekram', 'e10adc3949ba59abbe56e057f20f883e', '8801766535513', 'akramul.haq5@gmail.com', 'Moksudur Rahman', '8801789456321', 'moksudur.rahman@gmail.com', 'Feni, Chittagong, Bangladesh', 'Shirajul Hoque', 'Shamsun Nehar', 'assets/backend/uploads/29571317_426784331101963_4529298534892181206_n.jpg', 'Uncle', '2014-07-08 07:52:39'),
(4, 'dfdfg', 'dgfdgd', 'solaman', 'e10adc3949ba59abbe56e057f20f883e', '101445', 'shagor@gmail.com', 'sha alam', '032154415', 'dash@gmail.com', 'feni', 'md babul mia', 'shopna akter', './assets/backend/uploads/011.jpg', 'brother', '2018-05-17 11:50:30');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_notices`
--

CREATE TABLE IF NOT EXISTS `tbl_notices` (
  `notice_id` int(3) NOT NULL,
  `purpose_notice` varchar(100) NOT NULL,
  `notices` text NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_notices`
--

INSERT INTO `tbl_notices` (`notice_id`, `purpose_notice`, `notices`, `status`, `created_date`) VALUES
(1, 'Notice for pay your payment', 'Dear all members please pay your payment.\r\nThanks', 1, '2018-05-15 11:30:19'),
(2, 'কালকে সবার মিল বন্ধ থাকবে|', 'দুঃখিত কালকে মিল বন্ধ থাকবে সবার। দুঃখিত কালকে মিল বন্ধ থাকবে সবার।\r\nThanks', 1, '2018-05-15 11:29:55');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_paid_payment`
--

CREATE TABLE IF NOT EXISTS `tbl_paid_payment` (
  `paid_id` int(3) NOT NULL,
  `member_id` int(3) NOT NULL,
  `payment_date` text NOT NULL,
  `amount` int(10) NOT NULL,
  `payment_method` int(2) NOT NULL,
  `payment_for` varchar(32) NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_paid_payment`
--

INSERT INTO `tbl_paid_payment` (`paid_id`, `member_id`, `payment_date`, `amount`, `payment_method`, `payment_for`, `created_date`) VALUES
(1, 1, '05/14/2018', 5000, 1, 'Seat,Meal,Internet,Internet', '2018-05-15 12:01:39'),
(2, 3, '05/14/2018', 5500, 1, 'Seat,Meal,Internet,Internet', '2018-05-15 12:01:42'),
(3, 4, '05/17/2018', 4000, 1, 'Seat,Meal,Internet,Internet', '2018-05-17 12:00:44');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_payment`
--

CREATE TABLE IF NOT EXISTS `tbl_payment` (
  `payment_id` int(3) NOT NULL,
  `member_id` int(3) NOT NULL,
  `payment_date` text NOT NULL,
  `seat_rent` int(5) NOT NULL,
  `meal_cost` int(5) NOT NULL,
  `other_cost` int(5) NOT NULL,
  `total_payment` int(32) NOT NULL,
  `payment_for` varchar(32) NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_payment`
--

INSERT INTO `tbl_payment` (`payment_id`, `member_id`, `payment_date`, `seat_rent`, `meal_cost`, `other_cost`, `total_payment`, `payment_for`, `created_date`) VALUES
(2, 3, '05/13/2018', 2800, 1900, 625, 5325, 'Seat,Meal,Internet,Internet', '2018-05-13 12:22:49'),
(3, 1, '05/14/2018', 2800, 2500, 625, 5925, 'Seat,Meal,Internet,Internet', '2018-05-14 08:28:57'),
(4, 4, '05/17/2018', 2800, 250, 650, 3700, 'Seat,Meal,Internet,Internet', '2018-05-17 12:00:25');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `password` varchar(32) NOT NULL,
  `email` varchar(255) NOT NULL,
  `contact` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `photo` varchar(255) CHARACTER SET utf8 NOT NULL,
  `created_datetime` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `first_name`, `last_name`, `user_name`, `password`, `email`, `contact`, `address`, `photo`, `created_datetime`) VALUES
(7, 'Tawhidur', 'Rahman', 'tawhid', 'e10adc3949ba59abbe56e057f20f883e', 'tawhidur.rahman@swapnoloke.com', '8801756167187', 'Mirpur-2, Dhaka', './assets/backend/uploads/8_54a8e2f9b014d.jpg', '2014-06-24 01:11:30'),
(8, 'Akramul', 'Hoque', 'akram', 'e10adc3949ba59abbe56e057f20f883e', 'akramul.haq@gmail.com', '8801766542625', 'Mirpur-2,Dhaka', './assets/backend/uploads/8_53c6f3f51024c.jpg', '0000-00-00 00:00:00'),
(13, 'Shagor', 'Badsha', 'shagor', '827ccb0eea8a706c4c34a16891f84e7b', 'cloudnumber0707@gmail.com', '8801682281374', 'dhanmondi', './assets/backend/uploads/me1.jpg', '2015-02-25 12:49:54');

-- --------------------------------------------------------

--
-- Table structure for table `user_group`
--

CREATE TABLE IF NOT EXISTS `user_group` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `info` varchar(255) NOT NULL,
  `updated_by` int(11) NOT NULL,
  `updated_datetime` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_group`
--

INSERT INTO `user_group` (`id`, `name`, `info`, `updated_by`, `updated_datetime`) VALUES
(1, 'Super Admin', 'Super Admin', 8, '2014-07-08 03:11:33'),
(2, 'Admin', 'Admin', 0, '0000-00-00 00:00:00'),
(3, 'Student', 'Student', 0, '0000-00-00 00:00:00'),
(4, 'Guardian', 'Guardian', 0, '0000-00-00 00:00:00'),
(5, 'Stuff', 'Stuff', 0, '0000-00-00 00:00:00'),
(6, 'Manager', '', 0, '0000-00-00 00:00:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `group_sms`
--
ALTER TABLE `group_sms`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sms_configuration`
--
ALTER TABLE `sms_configuration`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `specific_sms`
--
ALTER TABLE `specific_sms`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student_payment`
--
ALTER TABLE `student_payment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_market_cost`
--
ALTER TABLE `tbl_market_cost`
  ADD PRIMARY KEY (`market_cost_id`);

--
-- Indexes for table `tbl_meal`
--
ALTER TABLE `tbl_meal`
  ADD PRIMARY KEY (`meal_id`);

--
-- Indexes for table `tbl_members`
--
ALTER TABLE `tbl_members`
  ADD PRIMARY KEY (`mem_id`);

--
-- Indexes for table `tbl_notices`
--
ALTER TABLE `tbl_notices`
  ADD PRIMARY KEY (`notice_id`);

--
-- Indexes for table `tbl_paid_payment`
--
ALTER TABLE `tbl_paid_payment`
  ADD PRIMARY KEY (`paid_id`);

--
-- Indexes for table `tbl_payment`
--
ALTER TABLE `tbl_payment`
  ADD PRIMARY KEY (`payment_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_group`
--
ALTER TABLE `user_group`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `group_sms`
--
ALTER TABLE `group_sms`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=35;
--
-- AUTO_INCREMENT for table `sms_configuration`
--
ALTER TABLE `sms_configuration`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `specific_sms`
--
ALTER TABLE `specific_sms`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `student_payment`
--
ALTER TABLE `student_payment`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `tbl_market_cost`
--
ALTER TABLE `tbl_market_cost`
  MODIFY `market_cost_id` int(3) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `tbl_meal`
--
ALTER TABLE `tbl_meal`
  MODIFY `meal_id` int(3) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `tbl_members`
--
ALTER TABLE `tbl_members`
  MODIFY `mem_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `tbl_notices`
--
ALTER TABLE `tbl_notices`
  MODIFY `notice_id` int(3) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tbl_paid_payment`
--
ALTER TABLE `tbl_paid_payment`
  MODIFY `paid_id` int(3) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `tbl_payment`
--
ALTER TABLE `tbl_payment`
  MODIFY `payment_id` int(3) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `user_group`
--
ALTER TABLE `user_group`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
