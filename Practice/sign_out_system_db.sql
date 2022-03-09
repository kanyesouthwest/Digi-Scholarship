-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 09, 2022 at 04:00 AM
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
(1, 1234, 'digs', 'mcgregor', 'Lunch', '12:08', '12:40', 0),
(2, 5678, 'ryan', 'stewrat', 'Appointment', '12:32', '', 1),
(3, 5252, 'timmy', 'jimmy', 'Lunch', '5:29', '', 1),
(4, 8293, 'michael', 'owen', 'Lunch', '5:41', '2022-03-09 08:52:05', 0),
(6, 8828, 'djb', 'monkey', 'Lunch', '2022-03-09 09:40:14', '2022-03-09 09:40:28', 0);

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
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `student_log`
--
ALTER TABLE `student_log`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
