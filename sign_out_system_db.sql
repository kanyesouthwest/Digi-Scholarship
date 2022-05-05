-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 05, 2022 at 05:23 AM
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
(1, 1234, 'Digs', 'Mcgregor', 'lunch', '2022-05-05 14:17:52', '2022-05-05 14:18:13', 1);

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
(1, 0, 1234, '', '', '', '', '2022-05-05 14:08:13'),
(2, 0, 1234, '', '', '', '', '2022-05-05 14:08:18'),
(3, 1, 1234, 'Digs', 'Mcgregor', 'lunch', '2022-05-05 14:17:52', ''),
(4, 1, 1234, '', '', '', '', '2022-05-05 14:17:55'),
(5, 1, 1234, '', '', '', '', '2022-05-05 14:18:13');

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
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `student_transactions`
--
ALTER TABLE `student_transactions`
  MODIFY `ID` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

DELIMITER $$
--
-- Events
--
CREATE DEFINER=`root`@`localhost` EVENT `drop_table` ON SCHEDULE EVERY 24 HOUR STARTS '2022-05-05 13:50:00' ON COMPLETION NOT PRESERVE ENABLE DO TRUNCATE student_log$$

DELIMITER ;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
