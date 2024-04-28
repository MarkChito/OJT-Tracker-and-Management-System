-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 28, 2024 at 08:45 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ojt_tracker_and_management_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_ojttrackerandmanagementsystem_accounts`
--

CREATE TABLE `tbl_ojttrackerandmanagementsystem_accounts` (
  `id` int(11) NOT NULL,
  `created_at` varchar(19) NOT NULL,
  `modified_at` varchar(19) NOT NULL,
  `name` varchar(30) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(255) NOT NULL,
  `user_type` varchar(7) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_ojttrackerandmanagementsystem_accounts`
--

INSERT INTO `tbl_ojttrackerandmanagementsystem_accounts` (`id`, `created_at`, `modified_at`, `name`, `username`, `password`, `user_type`) VALUES
(1, '2024-04-26 00:00:00', '', 'Administrator', 'admin', '$2y$10$yGOJnAFnhrKKjh9hpPkKCuITAvGijEbp7O9gQU7Py6LfLP/icfnea', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_ojttrackerandmanagementsystem_attendance`
--

CREATE TABLE `tbl_ojttrackerandmanagementsystem_attendance` (
  `id` int(11) NOT NULL,
  `created_at` varchar(19) NOT NULL,
  `modified_at` varchar(19) NOT NULL,
  `account_id` int(11) NOT NULL,
  `time_in` varchar(19) NOT NULL,
  `time_out` varchar(19) NOT NULL,
  `status` varchar(3) NOT NULL,
  `login_location` varchar(255) NOT NULL,
  `logout_location` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_ojttrackerandmanagementsystem_studentlocations`
--

CREATE TABLE `tbl_ojttrackerandmanagementsystem_studentlocations` (
  `id` int(11) NOT NULL,
  `created_at` varchar(19) NOT NULL,
  `modified_at` varchar(19) NOT NULL,
  `account_id` int(11) NOT NULL,
  `latitude` varchar(255) NOT NULL,
  `longitude` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_ojttrackerandmanagementsystem_students`
--

CREATE TABLE `tbl_ojttrackerandmanagementsystem_students` (
  `id` int(11) NOT NULL,
  `created_at` varchar(19) NOT NULL,
  `modified_at` varchar(19) NOT NULL,
  `account_id` int(11) NOT NULL,
  `student_number` varchar(8) NOT NULL,
  `first_name` varchar(30) NOT NULL,
  `middle_name` varchar(30) NOT NULL,
  `last_name` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `mobile_number` varchar(11) NOT NULL,
  `program` varchar(255) NOT NULL,
  `school_branch` varchar(9) NOT NULL,
  `year_level` varchar(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_ojttrackerandmanagementsystem_accounts`
--
ALTER TABLE `tbl_ojttrackerandmanagementsystem_accounts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_ojttrackerandmanagementsystem_attendance`
--
ALTER TABLE `tbl_ojttrackerandmanagementsystem_attendance`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_ojttrackerandmanagementsystem_studentlocations`
--
ALTER TABLE `tbl_ojttrackerandmanagementsystem_studentlocations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_ojttrackerandmanagementsystem_students`
--
ALTER TABLE `tbl_ojttrackerandmanagementsystem_students`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_ojttrackerandmanagementsystem_accounts`
--
ALTER TABLE `tbl_ojttrackerandmanagementsystem_accounts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_ojttrackerandmanagementsystem_attendance`
--
ALTER TABLE `tbl_ojttrackerandmanagementsystem_attendance`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_ojttrackerandmanagementsystem_studentlocations`
--
ALTER TABLE `tbl_ojttrackerandmanagementsystem_studentlocations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_ojttrackerandmanagementsystem_students`
--
ALTER TABLE `tbl_ojttrackerandmanagementsystem_students`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
