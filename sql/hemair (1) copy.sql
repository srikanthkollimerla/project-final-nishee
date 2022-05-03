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
('0203250', 'Ford', 'Focus', '', '30', '', '', 18),
('1201442', 'Honda', 'Civic', '', '120', '', '', 18);

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
('0', 'test', 'test', 'test@gmail.com', '1234567890', 'Manager'),
('1', 'tech', 'tech', 'tech@gmail.com', '123456789', 'Technical');

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
