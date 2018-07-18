-- phpMyAdmin SQL Dump
-- version 4.8.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 18, 2018 at 01:18 PM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 7.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `global_app`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_function_to_group`
--

DROP TABLE IF EXISTS `tbl_function_to_group`;
CREATE TABLE `tbl_function_to_group` (
  `ser_id` int(11) UNSIGNED NOT NULL,
  `tbl_system_controller_ser_id` int(11) UNSIGNED NOT NULL,
  `tbl_system_function_ser_id` int(11) UNSIGNED NOT NULL,
  `tbl_group_ser_id` int(11) UNSIGNED NOT NULL,
  `created_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Truncate table before insert `tbl_function_to_group`
--

TRUNCATE TABLE `tbl_function_to_group`;
-- --------------------------------------------------------

--
-- Table structure for table `tbl_group`
--

DROP TABLE IF EXISTS `tbl_group`;
CREATE TABLE `tbl_group` (
  `ser_id` int(11) UNSIGNED NOT NULL,
  `group_name` varchar(30) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Truncate table before insert `tbl_group`
--

TRUNCATE TABLE `tbl_group`;
--
-- Dumping data for table `tbl_group`
--

INSERT INTO `tbl_group` (`ser_id`, `group_name`) VALUES
(1, 'Super Admin'),
(2, 'Admin'),
(3, 'Default Group');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_login`
--

DROP TABLE IF EXISTS `tbl_login`;
CREATE TABLE `tbl_login` (
  `ser_id` int(11) UNSIGNED NOT NULL,
  `tbl_user_ser_id` int(11) UNSIGNED NOT NULL,
  `user_id` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `change_pass_status` tinyint(1) NOT NULL DEFAULT '0',
  `last_login` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Truncate table before insert `tbl_login`
--

TRUNCATE TABLE `tbl_login`;
--
-- Dumping data for table `tbl_login`
--

INSERT INTO `tbl_login` (`ser_id`, `tbl_user_ser_id`, `user_id`, `password`, `status`, `change_pass_status`, `last_login`) VALUES
(1, 1, 'super_admin', '280D44AB1E9F79B5CCE2DD4F58F5FE91F0FBACDAC9F7447DFFC318CEB79F2D02', 1, 0, '2018-07-18 02:29:53');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_menu`
--

DROP TABLE IF EXISTS `tbl_menu`;
CREATE TABLE `tbl_menu` (
  `ser_id` int(11) NOT NULL,
  `menu_label` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `menu_url` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `menu_icon` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `parent_menu` int(8) NOT NULL DEFAULT '0',
  `menu_level` int(6) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Truncate table before insert `tbl_menu`
--

TRUNCATE TABLE `tbl_menu`;
--
-- Dumping data for table `tbl_menu`
--

INSERT INTO `tbl_menu` (`ser_id`, `menu_label`, `menu_url`, `menu_icon`, `parent_menu`, `menu_level`) VALUES
(1, 'Home', '/', 'fa-home', 0, 0),
(2, 'Admin Console', '#', 'fa-cog', 0, 1),
(3, 'Group', 'auth/group', NULL, 2, 0),
(4, 'User', 'auth/user', NULL, 2, 1),
(5, 'System Controller', 'auth/controller', NULL, 2, 2);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_menu_to_group`
--

DROP TABLE IF EXISTS `tbl_menu_to_group`;
CREATE TABLE `tbl_menu_to_group` (
  `ser_id` int(11) UNSIGNED NOT NULL,
  `tbl_group_ser_id` int(11) UNSIGNED NOT NULL,
  `tbl_menu_ser_id` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Truncate table before insert `tbl_menu_to_group`
--

TRUNCATE TABLE `tbl_menu_to_group`;
-- --------------------------------------------------------

--
-- Table structure for table `tbl_system_controller`
--

DROP TABLE IF EXISTS `tbl_system_controller`;
CREATE TABLE `tbl_system_controller` (
  `ser_id` int(11) UNSIGNED NOT NULL,
  `controller_name` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `controller_desc` text COLLATE utf8_unicode_ci NOT NULL,
  `created_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Truncate table before insert `tbl_system_controller`
--

TRUNCATE TABLE `tbl_system_controller`;
--
-- Dumping data for table `tbl_system_controller`
--

INSERT INTO `tbl_system_controller` (`ser_id`, `controller_name`, `controller_desc`, `created_on`, `created_by`) VALUES
(1, 'Home', '', '2018-07-18 07:02:21', NULL),
(3, 'Auth', '', '2018-07-18 08:48:41', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_system_function`
--

DROP TABLE IF EXISTS `tbl_system_function`;
CREATE TABLE `tbl_system_function` (
  `ser_id` int(11) UNSIGNED NOT NULL,
  `tbl_system_controller_ser_id` int(11) NOT NULL,
  `function_name` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `created_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Truncate table before insert `tbl_system_function`
--

TRUNCATE TABLE `tbl_system_function`;
-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

DROP TABLE IF EXISTS `tbl_user`;
CREATE TABLE `tbl_user` (
  `ser_id` int(11) UNSIGNED NOT NULL,
  `user_id` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `user_name` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `gender` tinyint(3) DEFAULT '1',
  `designation` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `group_id` int(11) DEFAULT '0',
  `status` tinyint(1) NOT NULL,
  `created_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Truncate table before insert `tbl_user`
--

TRUNCATE TABLE `tbl_user`;
--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`ser_id`, `user_id`, `user_name`, `email`, `gender`, `designation`, `group_id`, `status`, `created_on`) VALUES
(1, 'super_admin', 'Super Admin', NULL, 1, 'Super Admin', 1, 1, '2018-07-11 08:07:32');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user_to_group`
--

DROP TABLE IF EXISTS `tbl_user_to_group`;
CREATE TABLE `tbl_user_to_group` (
  `ser_id` int(11) UNSIGNED NOT NULL,
  `tbl_user_ser_id` int(11) UNSIGNED NOT NULL,
  `tbl_group_ser_id` int(11) UNSIGNED NOT NULL,
  `created_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Truncate table before insert `tbl_user_to_group`
--

TRUNCATE TABLE `tbl_user_to_group`;
--
-- Dumping data for table `tbl_user_to_group`
--

INSERT INTO `tbl_user_to_group` (`ser_id`, `tbl_user_ser_id`, `tbl_group_ser_id`, `created_on`) VALUES
(1, 1, 1, '2018-07-11 08:09:12');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_function_to_group`
--
ALTER TABLE `tbl_function_to_group`
  ADD PRIMARY KEY (`ser_id`);

--
-- Indexes for table `tbl_group`
--
ALTER TABLE `tbl_group`
  ADD PRIMARY KEY (`ser_id`);

--
-- Indexes for table `tbl_login`
--
ALTER TABLE `tbl_login`
  ADD PRIMARY KEY (`ser_id`),
  ADD KEY `fk_tbl_user_ser_id` (`tbl_user_ser_id`);

--
-- Indexes for table `tbl_menu`
--
ALTER TABLE `tbl_menu`
  ADD PRIMARY KEY (`ser_id`),
  ADD KEY `fk_tbl_menu_parent_menu_id` (`parent_menu`);

--
-- Indexes for table `tbl_menu_to_group`
--
ALTER TABLE `tbl_menu_to_group`
  ADD PRIMARY KEY (`ser_id`),
  ADD KEY `fk_aauth_groups_id` (`tbl_group_ser_id`),
  ADD KEY `fk_tbl_menu_ser_id` (`tbl_menu_ser_id`);

--
-- Indexes for table `tbl_system_controller`
--
ALTER TABLE `tbl_system_controller`
  ADD PRIMARY KEY (`ser_id`);

--
-- Indexes for table `tbl_system_function`
--
ALTER TABLE `tbl_system_function`
  ADD PRIMARY KEY (`ser_id`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`ser_id`),
  ADD UNIQUE KEY `user_id` (`user_id`);

--
-- Indexes for table `tbl_user_to_group`
--
ALTER TABLE `tbl_user_to_group`
  ADD PRIMARY KEY (`ser_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_function_to_group`
--
ALTER TABLE `tbl_function_to_group`
  MODIFY `ser_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_group`
--
ALTER TABLE `tbl_group`
  MODIFY `ser_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_login`
--
ALTER TABLE `tbl_login`
  MODIFY `ser_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_menu`
--
ALTER TABLE `tbl_menu`
  MODIFY `ser_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_system_controller`
--
ALTER TABLE `tbl_system_controller`
  MODIFY `ser_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_system_function`
--
ALTER TABLE `tbl_system_function`
  MODIFY `ser_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `ser_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_user_to_group`
--
ALTER TABLE `tbl_user_to_group`
  MODIFY `ser_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_login`
--
ALTER TABLE `tbl_login`
  ADD CONSTRAINT `fk_tbl_user_ser_id` FOREIGN KEY (`tbl_user_ser_id`) REFERENCES `tbl_user` (`ser_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
