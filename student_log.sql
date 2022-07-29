-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 08, 2022 at 02:23 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

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
-- Table structure for table `student_log`
--

CREATE TABLE `student_log` (
  `ID` int(10) NOT NULL,
  `student_ID` int(5) NOT NULL,
  `first_name` varchar(30) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `reason` varchar(25) NOT NULL,
  `time_out` varchar(25) NOT NULL,
  `time_in` varchar(25) DEFAULT NULL,
  `in_school` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `student_log`
--

INSERT INTO `student_log` (`ID`, `student_ID`, `first_name`, `last_name`, `reason`, `time_out`, `time_in`, `in_school`) VALUES
(1, 4604059, 'Ashton', 'Threadwell', 'Lunch', '2022-07-07 12:21:25', '2022-07-07 12:21:27', 1),
(2, 4604138, 'Riley', 'Smith', 'Lunch', '2022-07-07 12:37:15', '2022-07-07 13:26:03', 1),
(3, 4603930, 'MacGregor', 'Matthews', 'Lunch', '2022-07-07 12:37:21', NULL, 2),
(4, 4604059, 'Ashton', 'Threadwell', 'Lunch', '2022-07-07 12:37:30', '2022-07-08 12:23:19', 1),
(5, 4604169, 'Michael', 'Owens', 'Lunch', '2022-07-07 12:37:36', NULL, 2),
(6, 4606750, 'Henry', 'Twiss', 'Lunch', '2022-07-07 12:37:42', NULL, 2),
(7, 4604806, 'Xavier', 'Ennals-Pellett', 'Lunch', '2022-07-07 12:37:48', '2022-07-07 12:50:43', 1),
(8, 4603986, 'Soichiro', 'Saito', 'Lunch', '2022-07-07 12:37:51', NULL, 2),
(9, 4604226, 'Maia', 'Columbus', 'Lunch', '2022-07-07 12:38:28', '2022-07-07 12:40:06', 1),
(10, 4604004, 'Finn', 'Bradshaw-Waugh', 'Lunch', '2022-07-07 12:39:28', '2022-07-07 13:17:13', 1),
(11, 4603977, 'Cameron', 'Blyth', 'Lunch', '2022-07-07 12:39:51', '2022-07-07 13:20:11', 1),
(12, 4604304, 'Sophie', 'Law', 'Lunch', '2022-07-07 12:43:41', '2022-07-07 13:27:27', 1),
(13, 4604022, 'Will', 'Heiler', 'Lunch', '2022-07-07 12:51:21', '2022-07-07 13:26:07', 1);

--
-- Indexes for dumped tables
--

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
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
