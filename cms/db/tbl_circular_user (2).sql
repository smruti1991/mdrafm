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
-- Table structure for table `tbl_circular_user`
--

CREATE TABLE IF NOT EXISTS `tbl_circular_user` (
  `id` int(11) NOT NULL,
  `dept_id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `create_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_circular_user`
--

INSERT INTO `tbl_circular_user` (`id`, `dept_id`, `username`, `name`, `email`, `password`, `status`, `create_on`) VALUES
(1, 10, 'finance', 'Finance Department', 'test@gmail.com', '$2y$10$KyG9nvG3Cuw3SxJj9eIiHOTqPFsITTaxqsoj0lEgffDJjgRvrm3ZK', 1, '2022-09-06 07:27:25');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_circular_user`
--
ALTER TABLE `tbl_circular_user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_circular_user`
--
ALTER TABLE `tbl_circular_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
