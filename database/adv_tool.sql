-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 01, 2021 at 05:56 PM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `adv_tool`
--
CREATE DATABASE IF NOT EXISTS `adv_tool` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `adv_tool`;

-- --------------------------------------------------------

--
-- Table structure for table `amount`
--

CREATE TABLE `amount` (
  `id` int(100) NOT NULL,
  `name_type` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `deposit` varchar(100) NOT NULL,
  `method` varchar(100) NOT NULL,
  `date` varchar(100) NOT NULL,
  `optional` varchar(100) NOT NULL,
  `c_qty` varchar(100) NOT NULL,
  `c_rate` varchar(100) NOT NULL,
  `delivery_adds` varchar(100) NOT NULL,
  `v_qty` varchar(100) NOT NULL,
  `v_rate` varchar(100) NOT NULL,
  `m_qty` varchar(100) NOT NULL,
  `m_rate` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `amount`
--

INSERT INTO `amount` (`id`, `name_type`, `name`, `deposit`, `method`, `date`, `optional`, `c_qty`, `c_rate`, `delivery_adds`, `v_qty`, `v_rate`, `m_qty`, `m_rate`) VALUES
(2, 'transport', 'UP 14 CT 7401', '30000', 'cash', '2019-01-03', '', '', '', '', '', '', '', ''),
(4, 'customer', 'DK', '5000', 'cashjkghkj', '2019-01-04', 'SASDS', '', '', '', '', '', '', ''),
(5, 'manufacture', 'BIJANDER', '20000', 'cash', '2019-01-10', 'asadsfergt', '', '', '', '', '', '', ''),
(6, 'customer', 'RG', '5000', 'cash', '2019-01-09', '', '', '', '', '', '', '', ''),
(7, 'customer', 'DK', '3000', 'cash', '2019-01-09', '', '', '', '', '', '', '', ''),
(8, 'customer', 'DK', '6000', 'cash', '2019-01-10', '', '', '', '', '', '', '', ''),
(9, 'customer', 'ABDUL', '20000', 'cash', '2019-01-01', '', '', '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `id` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `address` varchar(100) NOT NULL,
  `m_no` varchar(100) NOT NULL,
  `legal_name` varchar(100) NOT NULL,
  `GST_no` varchar(100) NOT NULL,
  `optional` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`id`, `name`, `address`, `m_no`, `legal_name`, `GST_no`, `optional`) VALUES
(3, 'DK', 'sector 22', '9312606060', 'GUJJAR', '987654321', 'ye sector 22 wala hai'),
(4, 'RG', 'sec-9', '65558845', 'GURUNANAK', '9dfdhty', ' zx ZCZXC'),
(5, 'ABDUL', 'nan', '9911225008', 'MALIK BUILDER', 'asdada', 'asdasd'),
(6, '', 'side pe y !51 pe', '', '', '', ''),
(7, '', '1', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `daily_entry`
--

CREATE TABLE `daily_entry` (
  `id` int(100) NOT NULL,
  `date` varchar(100) NOT NULL,
  `c_name` varchar(100) NOT NULL,
  `c_qty` varchar(100) NOT NULL,
  `c_rate` varchar(100) NOT NULL,
  `delivery_adds` varchar(100) NOT NULL,
  `vehicle_no` varchar(100) NOT NULL,
  `v_qty` varchar(100) NOT NULL,
  `v_rate` varchar(100) NOT NULL,
  `m_name` varchar(100) NOT NULL,
  `m_qty` varchar(100) NOT NULL,
  `m_rate` varchar(100) NOT NULL,
  `deposit` varchar(100) NOT NULL,
  `optional` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `daily_entry`
--

INSERT INTO `daily_entry` (`id`, `date`, `c_name`, `c_qty`, `c_rate`, `delivery_adds`, `vehicle_no`, `v_qty`, `v_rate`, `m_name`, `m_qty`, `m_rate`, `deposit`, `optional`) VALUES
(11, '2019-01-09', 'DK', '7000', '5', 'ye sector 12 me lagi', 'HR55 K 5556', '7000', '7000', 'KHEDA HATANA', '7000', '4', '', ''),
(12, '2019-01-08', 'RG', '6500', '5.1', 'SID EPE gayi', 'UP 14 CT 7401', '6500', '1.1', 'BACHOUR', '6500', '3.9', '', ''),
(13, '2019-01-10', 'RG', '2000', '5.1', 'GRETER KAILASH', 'UP 14 CT 7401', '2000', '.8', 'BIJANDER', '2000', '4', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `manufacture`
--

CREATE TABLE `manufacture` (
  `id` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `address` varchar(100) NOT NULL,
  `m_no` varchar(100) NOT NULL,
  `legal_name` varchar(100) NOT NULL,
  `GST_no` varchar(100) NOT NULL,
  `optional` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `manufacture`
--

INSERT INTO `manufacture` (`id`, `name`, `address`, `m_no`, `legal_name`, `GST_no`, `optional`) VALUES
(3, 'KHEDA HATANA', 'VILLAGE KHEDA HATANA BAGHPAT', '7500203444', 'SHUBHAM BRICK FIELD,KHEDA HATANA', 'SAMPLE GXT', ''),
(4, 'BACHOUR', 'VILLAGE BACHOUR', '9837818090', 'SHUBHAM BRICK FILED', 'GST NUMBER', 'OPTIONAL BACHOUR'),
(5, 'BIJANDER', 'BARAUT NEAR CANAL ROAD', '9876514894', 'HANUMAN BRICK FIELD', 'NAHI PTA', '');

-- --------------------------------------------------------

--
-- Table structure for table `report`
--

CREATE TABLE `report` (
  `id` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `address` varchar(100) NOT NULL,
  `total` int(100) NOT NULL,
  `amount_paid` int(100) NOT NULL,
  `balance_due` int(100) NOT NULL,
  `date` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `report`
--

INSERT INTO `report` (`id`, `name`, `address`, `total`, `amount_paid`, `balance_due`, `date`) VALUES
(1, 'DK', 'ye sector 12 me lagi', 35000, 5000, 30000, ''),
(2, 'UP 14 CT 7401', '', 8750, 30000, 21250, '2019-01-10'),
(3, 'BIJANDER', '', 8000, 20000, 12000, '2019-01-10'),
(4, 'DK', '', 35000, 5000, 30000, '2019-01-10'),
(5, 'DK', '', 105000, 6000, 99000, '2019-01-10'),
(6, 'DK', '', 105000, 6000, 99000, '2019-01-10'),
(7, 'UP 14 CT 7401', '', 8750, 30000, -21250, '2019-01-11'),
(8, 'DK', '', 35000, 3000, 32000, '2019-01-11'),
(9, 'DK', '', 35000, 14000, 21000, '2019-03-18');

-- --------------------------------------------------------

--
-- Table structure for table `transport`
--

CREATE TABLE `transport` (
  `id` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `m_no` varchar(100) NOT NULL,
  `vehicle_no` varchar(100) NOT NULL,
  `optional` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transport`
--

INSERT INTO `transport` (`id`, `name`, `m_no`, `vehicle_no`, `optional`) VALUES
(2, 'nitin', '9911225008', 'HR55 K 5556', 'THIS IS FOR TRANSPORT PURPOSE ONLY THEN EDIT'),
(3, 'NITIN', '9911225008', 'HR55 J 4782', ''),
(4, 'NITIN', '9911225008', 'UP17 AT 3576', ''),
(5, 'UP 14 CT 1726', '9911225008', 'UP 14 CT 1726', ''),
(6, 'UP 14 CT 7401', '9911225008', 'UP 14 CT 7401', '');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `time` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `password`, `time`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', '23-11-2018'),
(2, 'manager', '1d0258c2440a8d19e716292b231e3190', '23-11-2018');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `amount`
--
ALTER TABLE `amount`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `daily_entry`
--
ALTER TABLE `daily_entry`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `manufacture`
--
ALTER TABLE `manufacture`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `report`
--
ALTER TABLE `report`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transport`
--
ALTER TABLE `transport`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `amount`
--
ALTER TABLE `amount`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `daily_entry`
--
ALTER TABLE `daily_entry`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `manufacture`
--
ALTER TABLE `manufacture`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `report`
--
ALTER TABLE `report`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `transport`
--
ALTER TABLE `transport`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
