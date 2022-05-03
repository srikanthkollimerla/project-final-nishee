-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 04, 2019 at 11:46 AM
-- Server version: 10.1.32-MariaDB
-- PHP Version: 5.6.36

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hemair`
--

-- --------------------------------------------------------

--
-- Table structure for table `activity_log`
--

CREATE TABLE `activity_log` (
  `id` int(11) NOT NULL,
  `pid` int(11) NOT NULL,
  `eid` varchar(50) NOT NULL,
  `time` varchar(50) NOT NULL,
  `action` text NOT NULL,
  `reason` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `activity_log`
--

INSERT INTO `activity_log` (`id`, `pid`, `eid`, `time`, `action`, `reason`) VALUES
(1, 0, 'qualityassurance@hemair.net', '2019-02-02 16:03:53', 'Login in', ''),
(2, 0, 'qualityassurance@hemair.net', '2019-02-02 16:05:47', 'Login in', ''),
(3, 0, '0', '2019-02-02 16:07:28', 'Login in', ''),
(4, 0, 'qualityassurance@hemair.net', '2019-02-02 16:10:00', 'Login in', ''),
(5, 0, 'qualityassurance@hemair.net', '2019-02-02 16:10:31', 'Login in', ''),
(6, 0, 'qualityassurance@hemair.net', '2019-02-02 16:11:04', 'Login in', ''),
(7, 0, 'qualityassurance@hemair.net', '2019-02-02 16:12:13', 'Login in', ''),
(8, 0, 'qualityassurance@hemair.net', '2019-02-02 16:12:39', 'Login in', ''),
(9, 0, 'sbhemair@gmail.com', '2019-02-02 16:14:32', 'Login in', ''),
(10, 0, 'qualityassurance@hemair.net', '2019-02-02 16:20:17', 'Login in', ''),
(11, 0, '2', '2019-02-04 11:13:03', 'Login in', ''),
(12, 0, '2', '2019-02-04 11:14:36', 'Login in', ''),
(13, 0, 'qualityassurance@hemair.net', '2019-02-04 11:15:24', 'Login in', ''),
(14, 0, 'qualityassurance@hemair.net', '2019-02-04 11:17:56', 'Login in', ''),
(15, 0, 'qualityassurance@hemair.net', '2019-02-04 11:18:42', 'Login in', ''),
(16, 0, 'qualityassurance@hemair.net', '2019-02-04 11:21:31', 'Login in', ''),
(17, 0, '2', '2019-02-04 11:22:19', 'Login in', ''),
(18, 1, 'admin', '2019-02-04 11:23:52', 'admin created 2 assemblies', 'New Project'),
(19, 0, 'qualityassurance@hemair.net', '2019-02-04 11:24:53', 'Login in', ''),
(20, 0, 'qualityassurance@hemair.net', '2019-02-04 11:26:09', 'Login in', ''),
(21, 0, '2', '2019-02-04 11:27:37', 'Login in', ''),
(22, 0, '0', '2019-02-04 11:29:08', 'Login in', ''),
(23, 0, 'qualityassurance@hemair.net', '2019-02-04 11:30:23', 'Login in', ''),
(24, 0, 'qualityassurance@hemair.net', '2019-02-04 11:33:05', 'Login in', ''),
(25, 1, 'admin', '2019-02-04 11:33:30', 'admin created 4 assemblies', 'New Project'),
(26, 0, 'qualityassurance@hemair.net', '2019-02-04 11:50:15', 'Login in', ''),
(27, 0, 'qualityassurance@hemair.net', '2019-02-04 12:15:26', 'Login in', ''),
(28, 2, 'admin', '2019-02-04 12:15:46', 'admin created 4 assemblies', 'New Project');

-- --------------------------------------------------------

--
-- Table structure for table `branch_address`
--

CREATE TABLE `branch_address` (
  `sno` int(11) NOT NULL,
  `pnostart` varchar(3) NOT NULL,
  `name` varchar(100) NOT NULL,
  `place` varchar(100) NOT NULL,
  `Address` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `branch_address`
--

INSERT INTO `branch_address` (`sno`, `pnostart`, `name`, `place`, `Address`) VALUES
(1, '2', 'Unit 2', 'Bollarum', 'Sy.No.296/7/6&7, I.D.A., Bollarum (Miyapur), Hyderabad - 502 325.'),
(2, '3', 'Unit 3', 'Pashamylaram', 'No. 16, Phase-III, Industrial Park, IDA Pashamylaram, Patancheru (M), Medak District, Hyderabad - 502 307.'),
(3, '8', 'Production', 'Adibatla', 'Plot No. 12, DTA, Sy No.656/A, Adibatla Village, Ibrahimpatnam Mandal, R.R. District - 501510.'),
(4, '7', 'Technical Center', 'Ravirayal', '8B Hard ware Park, Ravirayal (V), Srisailam Highway, Pahadi Sharief, Via: Kashavagiri, Hyderabad - 500 005');

-- --------------------------------------------------------

--
-- Table structure for table `component`
--

CREATE TABLE `component` (
  `modelno` varchar(50) NOT NULL,
  `make` varchar(50) NOT NULL,
  `name` text NOT NULL,
  `a_quantity` varchar(20) NOT NULL,
  `r_quantity` varchar(100) NOT NULL,
  `specification` text NOT NULL,
  `i_motality` varchar(3) NOT NULL,
  `tax` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `component`
--

INSERT INTO `component` (`modelno`, `make`, `name`, `a_quantity`, `r_quantity`, `specification`, `i_motality`, `tax`) VALUES
('0203250', 'Phoenix Contact', 'Shorting bridge', '', '30', '', '', 18),
('1201442', 'Phoenix Contact', 'DIN Rail End Clamps', '', '120', '', '', 18),
('1413285', 'Phoenix Contact', 'Partition plate', '', '60', '', '', 18),
('2277776', 'Phoenix Contact', 'Mains Current Sensor', '', '18', '', '', 18),
('2715092', 'Phoenix Contact', 'Three level Terminal Blocks', '', '240', '', '', 18),
('2814728', 'Phoenix Contact', 'Components Current Sensor', '', '18', '', '', 18),
('2817738', 'Phoenix Contact', 'Surge Suppressor Mounting Base', '', '24', '', '', 18),
('2817990', 'Phoenix Contact', 'Surge Suppressor - 1kV', '', '6', '', '', 18),
('2838843', 'Phoenix Contact', 'Surge Suppressor - 1.5kV', '', '18', '', '', 18),
('2866792', 'Phoenix Contact', 'SMPS (SMPS1 & SMPS2)', '', '12', '', '', 18),
('2891005', 'Phoenix Contact', 'Ethernet switch', '', '6', '', '', 18),
('2900291', 'Phoenix Contact', 'Relay, 24VDC', '', '72', '', '', 18),
('2902017', 'Phoenix Contact', 'Potentiometer Converter (POT to 4-20mA)', '', '6', '', '', 18),
('2904376', 'Phoenix Contact', 'SMPS  (SMPS1)', '', '6', '', '', 18),
('2966171', 'Phoenix Contact', 'Relay, 24VDC', '', '102', '', '', 18),
('2966207', 'Phoenix Contact', 'Relay, 230VAC', '', '18', '', '', 18),
('3214275', 'Phoenix Contact', 'Earth Terminal Block', '', '72', '', '', 18);

-- --------------------------------------------------------

--
-- Table structure for table `emp`
--

CREATE TABLE `emp` (
  `eid` varchar(30) NOT NULL,
  `ename` varchar(40) NOT NULL,
  `password` varchar(100) NOT NULL,
  `email` varchar(50) NOT NULL,
  `mobile` varchar(10) NOT NULL,
  `designation` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `emp`
--

INSERT INTO `emp` (`eid`, `ename`, `password`, `email`, `mobile`, `designation`) VALUES
('0', 'Dhanush', 'dqahemair', 'qualityassurance@hemair.net', '1234567890', 'Manager'),
('1', 'Santhosh', '1059', 'sbhemair@gmail.com', '7337551059', 'Technical'),
('2', 'Rajeev', '111', '1@g.com', '1234569870', 'Manager');

-- --------------------------------------------------------

--
-- Table structure for table `po_log`
--

CREATE TABLE `po_log` (
  `sno` int(11) NOT NULL,
  `pname` varchar(80) NOT NULL,
  `vid` varchar(3) NOT NULL,
  `unitno` varchar(2) NOT NULL,
  `acyr` varchar(5) NOT NULL,
  `pno` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `po_log`
--

INSERT INTO `po_log` (`sno`, `pname`, `vid`, `unitno`, `acyr`, `pno`) VALUES
(1, 'Liquid_Refrigeration_Cooling_Unit', '1', '7', '1819', '1'),
(2, 'Liquid_Refrigeration_Cooling_Unit', '1', '7', '1819', '2'),
(3, 'Liquid_Refrigeration_Cooling_Unit', '1', '7', '1819', '3');

-- --------------------------------------------------------

--
-- Table structure for table `po_response`
--

CREATE TABLE `po_response` (
  `sno` int(11) NOT NULL,
  `pname` varchar(100) NOT NULL,
  `vid` varchar(11) NOT NULL,
  `delivery` varchar(20) NOT NULL,
  `status` varchar(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

CREATE TABLE `projects` (
  `pid` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `date` varchar(100) NOT NULL,
  `progress` int(3) NOT NULL,
  `access_rights` longtext NOT NULL,
  `nick` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `projects`
--

INSERT INTO `projects` (`pid`, `name`, `date`, `progress`, `access_rights`, `nick`) VALUES
(2, 'Liquid_Refrigeration_Cooling_Unit', '2019-02-04 12:15:46', 0, '', 'LRCU');

-- --------------------------------------------------------

--
-- Table structure for table `tickets`
--

CREATE TABLE `tickets` (
  `id` int(3) NOT NULL,
  `msg` text NOT NULL,
  `target_file` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tickets`
--

INSERT INTO `tickets` (`id`, `msg`, `target_file`) VALUES
(5, 'dsfnwekf', 'tickets/5b9f3c2b81f7c.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `vendor_details`
--

CREATE TABLE `vendor_details` (
  `vid` int(11) NOT NULL,
  `vname` varchar(500) NOT NULL,
  `make` varchar(500) NOT NULL,
  `contact_person` varchar(500) NOT NULL,
  `email` varchar(100) NOT NULL,
  `contact_no` varchar(20) NOT NULL,
  `location` varchar(25) NOT NULL,
  `rating` varchar(3) NOT NULL DEFAULT '0',
  `streetno` text NOT NULL,
  `area` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `vendor_details`
--

INSERT INTO `vendor_details` (`vid`, `vname`, `make`, `contact_person`, `email`, `contact_no`, `location`, `rating`, `streetno`, `area`) VALUES
(1, 'New Star Engineering Company', 'Phoenix Contact', 'Siddharth', 'starengg_123@yahoo.co.in', '8885504647', 'Secunderabad-500003', '0', '141/17 ,1st Floor, Durga Bhavan,', 'Opp Kotak Mahindra Bank, R.P.ROAD,'),
(2, 'Element14', 'Phoenix Contact', 'Girish Gajendran', 'GGajendran@element14.com', '08040003884', 'Bangalore - 560 029, Indi', '0', 'Theme House, 2nd Floor, #15, Krishnanagar ', 'Industrial Area Off Hosur Main Road,');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `activity_log`
--
ALTER TABLE `activity_log`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `branch_address`
--
ALTER TABLE `branch_address`
  ADD PRIMARY KEY (`sno`),
  ADD UNIQUE KEY `pnostart` (`pnostart`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `component`
--
ALTER TABLE `component`
  ADD PRIMARY KEY (`modelno`);

--
-- Indexes for table `emp`
--
ALTER TABLE `emp`
  ADD UNIQUE KEY `eid` (`eid`);

--
-- Indexes for table `po_log`
--
ALTER TABLE `po_log`
  ADD PRIMARY KEY (`acyr`,`pno`),
  ADD UNIQUE KEY `sno` (`sno`);

--
-- Indexes for table `po_response`
--
ALTER TABLE `po_response`
  ADD PRIMARY KEY (`pname`,`vid`),
  ADD UNIQUE KEY `sno` (`sno`);

--
-- Indexes for table `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`pid`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `tickets`
--
ALTER TABLE `tickets`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vendor_details`
--
ALTER TABLE `vendor_details`
  ADD PRIMARY KEY (`vid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `activity_log`
--
ALTER TABLE `activity_log`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `branch_address`
--
ALTER TABLE `branch_address`
  MODIFY `sno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `po_log`
--
ALTER TABLE `po_log`
  MODIFY `sno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `po_response`
--
ALTER TABLE `po_response`
  MODIFY `sno` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `projects`
--
ALTER TABLE `projects`
  MODIFY `pid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tickets`
--
ALTER TABLE `tickets`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `vendor_details`
--
ALTER TABLE `vendor_details`
  MODIFY `vid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
