-- phpMyAdmin SQL Dump
-- version 4.4.15.10
-- https://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Sep 17, 2022 at 10:16 AM
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
-- Table structure for table `tbl_circular_group`
--

CREATE TABLE IF NOT EXISTS `tbl_circular_group` (
  `id` int(11) NOT NULL,
  `dept_id` int(11) NOT NULL,
  `group_name` varchar(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=97 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_circular_group`
--

INSERT INTO `tbl_circular_group` (`id`, `dept_id`, `group_name`) VALUES
(1, 10, 'Advances'),
(2, 10, 'Allowance'),
(3, 10, 'Assistance'),
(4, 10, 'Audit'),
(5, 10, 'Austerity Measures'),
(6, 10, 'Budget'),
(7, 10, 'C&I'),
(8, 10, 'Commercial Taxes'),
(9, 10, 'Contingency'),
(10, 10, 'Dearness Allowance & T.I'),
(11, 10, 'Delegation of Financial Power Rules'),
(12, 10, 'Direct Benefit Transfer'),
(13, 10, 'Externally Aided Project (EAP)'),
(14, 10, 'Fund'),
(15, 10, 'Funds'),
(16, 10, 'General Provident Fund(GPF)'),
(17, 10, 'Group Insurance Sheme (GIS)'),
(18, 10, 'IEC Activities'),
(19, 10, 'Income Tax'),
(20, 10, 'Institutional Finance'),
(21, 10, 'Legal matters'),
(22, 10, 'Loans'),
(23, 10, 'Miscellaneous'),
(24, 10, 'OBFA'),
(25, 10, 'Odihsa State Tax on professions, Trades, Callings '),
(26, 10, 'Odisha General Financial Rules (OGFR)'),
(27, 10, 'Odisha Revised Scales of Pay (ORSP)'),
(28, 10, 'Odisha Service Code'),
(29, 10, 'Odisha Travelling Allowance Rules (OTA)'),
(30, 10, 'Pension'),
(31, 10, 'Posts'),
(32, 10, 'Protection Of Interest of Depositors'),
(33, 10, 'PU&IF'),
(34, 10, 'Resources'),
(35, 10, 'Rules regulating Control and use of Government Veh'),
(36, 10, 'Service Rules'),
(37, 10, 'Small Savings'),
(38, 10, 'State Finance Commission(SFC)'),
(39, 10, 'Timeline for drawal'),
(40, 10, 'Treasury'),
(41, 10, 'Vehicle'),
(42, 10, 'Ways & Means'),
(43, 10, 'Works'),
(44, 2, 'Miscellaneous'),
(45, 2, 'Heads of Department'),
(46, 2, 'Regularization'),
(47, 2, 'Combined Competitive Recruitment Examination'),
(48, 2, 'Departmental Promotion Committee'),
(49, 2, 'Reserved Categories'),
(50, 2, 'Rehabilitation Assistance'),
(51, 2, 'Disciplinary Measures'),
(52, 2, 'Inter-se- seniority'),
(53, 2, 'Regularisation'),
(54, 2, 'Conduct Rules'),
(55, 2, 'Group-D employees'),
(56, 2, 'Incentive'),
(57, 2, 'Criteria for Promotion'),
(58, 2, 'Combined Competitive Recruitment Examination Rules'),
(59, 2, 'Contractual Appointment'),
(60, 2, 'Disciplinary / criminal proceeding'),
(61, 2, 'Preventive measures to be taken to contain of Novel Corona Virus (COVID-19)- regarding'),
(62, 2, 'Postopone of official tours/visit abroad as a precautionary measure to check contagious Corona Virus'),
(63, 2, 'The Biometric system of attendance- Instruction regarding'),
(64, 2, 'Promotion Adalat'),
(65, 2, 'District cadre'),
(66, 2, 'FAQ'),
(67, 2, 'Promotion Adalats'),
(68, 2, 'Guidelines for reference of departmental inquiries to the Commissioner for Departmental Inquiries(C.'),
(69, 2, 'Odisha Service Manual'),
(70, 2, 'Heads of Departments Cadres'),
(71, 2, 'General Conditions of Services'),
(72, 2, 'Contractual Appointment Rules'),
(73, 2, 'Transfer & Posting'),
(74, 2, 'Integration of HoDs with A/Ds'),
(75, 2, 'Young Professionals'),
(76, 2, 'Grant of permission to government servants for travel outside India'),
(77, 2, 'Sports Persons'),
(78, 2, 'Rescheduling of working hours in Offices'),
(79, 2, 'Engagement of retired Government servants.'),
(80, 2, 'Miscellaneous Matters'),
(81, 2, 'General Conditions of Service'),
(82, 2, 'Posts'),
(83, 2, 'Criteria for Entry into Government Service'),
(84, 2, 'Work-charged Employees'),
(85, 2, 'Heads of Department Cadre'),
(86, 2, 'District  Cadre'),
(87, 2, 'Group "D" Employees'),
(88, 2, 'Diploma Engineers'),
(89, 2, 'Staff Selection Commission'),
(90, 2, 'Transfer and Posting'),
(91, 2, 'Premature Retirement'),
(92, 2, 'Defence of Government Servants in Legal Proceedings'),
(93, 2, 'Engagement of Retired  Officers'),
(94, 2, 'Rehabiliation Assistance'),
(95, 2, 'Recruitment'),
(96, 10, 'Honorarium');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_circular_group`
--
ALTER TABLE `tbl_circular_group`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_circular_group`
--
ALTER TABLE `tbl_circular_group`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=97;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
