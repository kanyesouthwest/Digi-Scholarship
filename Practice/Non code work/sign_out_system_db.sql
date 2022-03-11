-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 11, 2022 at 08:56 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sign out system_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `student_details`
--

CREATE TABLE `student_details` (
  `student_ID` int(5) NOT NULL,
  `first_name` varchar(30) NOT NULL,
  `last_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `student_details`
--

INSERT INTO `student_details` (`student_ID`, `first_name`, `last_name`) VALUES
(1234, 'digs', 'mcgregor'),
(5252, 'timmy', 'jimmy'),
(5678, 'ryan', 'stewrat'),
(8293, 'michael', 'owen'),
(8373, 'Charlie', 'England'),
(8828, 'djb', 'monkey');

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
(1, 1234, 'digs', 'mcgregor', 'Lunch', '2022-03-11 20:44:21', '2022-03-11 20:44:47', 1),
(2, 5678, 'ryan', 'stewrat', 'Brass Monkey', '2022-03-11 20:44:36', '', 2),
(3, 8373, 'Charlie', 'England', 'Dinner', '2022-03-11 20:45:03', '', 2);

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
(1, 1, 1234, 'digs', 'mcgregor', 'Lunch', '2022-03-11 20:44:21', ''),
(2, 2, 5678, 'ryan', 'stewrat', 'Brass Monkey', '2022-03-11 20:44:36', ''),
(3, 1, 1234, '', '', '', '', '2022-03-11 20:44:47'),
(4, 3, 8373, 'Charlie', 'England', 'Dinner', '2022-03-11 20:45:03', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `student_details`
--
ALTER TABLE `student_details`
  ADD PRIMARY KEY (`student_ID`);

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
-- AUTO_INCREMENT for table `student_log`
--
ALTER TABLE `student_log`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `student_transactions`
--
ALTER TABLE `student_transactions`
  MODIFY `ID` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
