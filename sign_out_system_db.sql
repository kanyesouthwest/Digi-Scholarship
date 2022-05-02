-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 03, 2022 at 01:19 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sign_out_system_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `student_details`
--

CREATE TABLE `student_details` (
  `ID` int(5) NOT NULL,
  `student_ID` int(4) NOT NULL,
  `first_name` varchar(30) NOT NULL,
  `last_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `student_details`
--

INSERT INTO `student_details` (`ID`, `student_ID`, `first_name`, `last_name`) VALUES
(1, 1234, 'Digs', 'Mcgregor'),
(2, 5678, 'Ryan', 'Stewrat'),
(3, 5252, 'timmy', 'jimmy'),
(4, 4604059, 'Ashton', 'Threadwell'),
(5, 4604052, 'DJB', 'Monkey'),
(6, 4604169, 'Michael', 'Owens');

-- --------------------------------------------------------

--
-- Table structure for table `student_log`
--

CREATE TABLE `student_log` (
  `ID` int(10) NOT NULL,
  `student_ID` int(5) NOT NULL,
  `first_name` varchar(30) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `reason` varchar(25) NOT NULL,
  `time_out` varchar(25) NOT NULL,
  `time_in` varchar(25) NOT NULL,
  `in_school` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `student_log`
--

INSERT INTO `student_log` (`ID`, `student_ID`, `first_name`, `last_name`, `reason`, `time_out`, `time_in`, `in_school`) VALUES
(1, 1234, 'Digs', 'Mcgregor', 'lunch', '2022-03-30 09:56:38', '2022-03-30 09:56:41', 1),
(2, 5678, 'ryan', 'stewrat\r', 'Dinner', '2022-03-31 12:28:11', '2022-03-31 12:28:16', 1),
(3, 5252, 'timmy', 'jimmy', 'Trip', '2022-04-01 13:32:16', '2022-04-01 13:32:19', 1),
(4, 4604059, 'Ashton', 'Threadwell', 'Lunch', '2022-04-07 11:40:55', '2022-04-07 11:41:05', 1),
(5, 4604059, 'Ashton', 'Threadwell', 'Dentist', '2022-04-07 11:53:53', '2022-04-07 11:54:26', 1),
(6, 4604059, 'Ashton', 'Threadwell', 'Lunch', '2022-04-07 11:59:07', '2022-04-07 11:59:19', 1),
(7, 4604052, 'DJB', 'Monkey', 'Lunch', '2022-04-07 12:05:40', '2022-04-07 12:09:01', 1),
(8, 4604052, 'DJB', 'Monkey', 'Lunch', '2022-04-07 12:10:43', '2022-04-07 12:10:49', 1),
(9, 1234, 'Digs', 'Mcgregor', 'lunch', '2022-04-08 09:16:42', '2022-04-08 09:16:58', 1),
(10, 5678, 'Ryan', 'Stewrat', 'school', '2022-04-08 09:18:44', '2022-04-08 09:18:51', 1),
(11, 4604169, 'Michael', 'Owens', 'sick', '2022-04-08 10:54:08', '2022-04-08 10:54:26', 1),
(12, 4604059, 'Ashton', 'Threadwell', 'lunch', '2022-04-08 10:55:52', '2022-04-08 10:56:02', 1),
(13, 4604169, 'Michael', 'Owens', 'sports', '2022-04-08 11:06:10', '2022-04-08 11:06:24', 1);

-- --------------------------------------------------------

--
-- Table structure for table `student_transactions`
--

CREATE TABLE `student_transactions` (
  `ID` int(1) NOT NULL,
  `group_ID` int(5) NOT NULL,
  `student_ID` int(5) NOT NULL,
  `first_name` varchar(30) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `reason` varchar(25) NOT NULL,
  `time_out` varchar(25) NOT NULL,
  `time_in` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `student_transactions`
--

INSERT INTO `student_transactions` (`ID`, `group_ID`, `student_ID`, `first_name`, `last_name`, `reason`, `time_out`, `time_in`) VALUES
(1, 1, 4604059, 'Ashton', 'Threadwell', 'Dentist', '2022-04-07 11:53:53', ''),
(2, 1, 4604059, '', '', '', '', '2022-04-07 11:54:26'),
(3, 2, 4604059, 'Ashton', 'Threadwell', 'Lunch', '2022-04-07 11:59:08', ''),
(4, 2, 4604059, '', '', '', '', '2022-04-07 11:59:19'),
(5, 3, 4604052, 'DJB', 'Monkey', 'Lunch', '2022-04-07 12:05:40', ''),
(6, 3, 4604052, '', '', '', '', '2022-04-07 12:09:01'),
(7, 4, 4604052, 'DJB', 'Monkey', 'Lunch', '2022-04-07 12:10:43', ''),
(8, 4, 4604052, '', '', '', '', '2022-04-07 12:10:49'),
(9, 5, 1234, 'Digs', 'Mcgregor', 'lunch', '2022-04-08 09:16:42', ''),
(10, 5, 1234, '', '', '', '', '2022-04-08 09:16:58'),
(11, 6, 5678, 'Ryan', 'Stewrat', 'school', '2022-04-08 09:18:44', ''),
(12, 6, 5678, '', '', '', '', '2022-04-08 09:18:51'),
(13, 7, 4604169, 'Michael', 'Owens', 'sick', '2022-04-08 10:54:08', ''),
(14, 7, 4604169, '', '', '', '', '2022-04-08 10:54:26'),
(15, 8, 4604059, 'Ashton', 'Threadwell', 'lunch', '2022-04-08 10:55:52', ''),
(16, 8, 4604059, '', '', '', '', '2022-04-08 10:56:02'),
(17, 9, 4604169, 'Michael', 'Owens', 'sports', '2022-04-08 11:06:10', ''),
(18, 9, 4604169, '', '', '', '', '2022-04-08 11:06:24');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `student_details`
--
ALTER TABLE `student_details`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `student_log`
--
ALTER TABLE `student_log`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `student_transactions`
--
ALTER TABLE `student_transactions`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `student_details`
--
ALTER TABLE `student_details`
  MODIFY `ID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `student_log`
--
ALTER TABLE `student_log`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `student_transactions`
--
ALTER TABLE `student_transactions`
  MODIFY `ID` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

DELIMITER $$
--
-- Events
--
CREATE DEFINER=`root`@`localhost` EVENT `drop_table` ON SCHEDULE EVERY '0 10' DAY_HOUR STARTS '2022-04-06 11:23:01' ON COMPLETION NOT PRESERVE ENABLE DO TRUNCATE student_details$$

DELIMITER ;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
