-- phpMyAdmin SQL Dump
-- version 4.4.15.10
-- https://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Sep 17, 2022 at 10:17 AM
-- Server version: 5.5.68-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mdrafm`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_drop_circular`
--

CREATE TABLE IF NOT EXISTS `tbl_drop_circular` (
  `id` int(11) NOT NULL,
  `circular_id` int(11) NOT NULL,
  `dept_id` int(11) NOT NULL,
  `group` int(11) NOT NULL,
  `sub_group` int(11) NOT NULL DEFAULT '0',
  `circular_no` varchar(100) NOT NULL,
  `year` varchar(10) NOT NULL,
  `date` date NOT NULL,
  `subject` varchar(300) NOT NULL,
  `file_name` varchar(20) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_drop_circular`
--

INSERT INTO `tbl_drop_circular` (`id`, `circular_id`, `dept_id`, `group`, `sub_group`, `circular_no`, `year`, `date`, `subject`, `file_name`, `status`) VALUES
(1, 3196, 10, 1, 1, '12345', '2022', '2022-09-12', 'test', '12345.pdf', 1),
(2, 3197, 10, 28, 0, '20665', '2022', '2022-08-20', 'Restructuring of Group "D" Posts in Government Establishments', '20665.pdf', 1),
(3, 3198, 10, 1, 2, '12345', '2022', '2022-09-15', 'tyest', '12345.pdf', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_drop_circular`
--
ALTER TABLE `tbl_drop_circular`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_drop_circular`
--
ALTER TABLE `tbl_drop_circular`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
