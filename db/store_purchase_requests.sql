-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Feb 12, 2016 at 08:01 AM
-- Server version: 10.1.9-MariaDB
-- PHP Version: 5.6.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `polychem`
--

-- --------------------------------------------------------

--
-- Table structure for table `store_purchase_requests`
--

CREATE TABLE `store_purchase_requests` (
  `id` int(11) NOT NULL,
  `department` varchar(255) NOT NULL,
  `date` varchar(255) NOT NULL,
  `category_id` int(11) NOT NULL,
  `material_id` int(11) NOT NULL,
  `quantity` float NOT NULL,
  `available_quantity` float NOT NULL,
  `issued_quantity` float NOT NULL DEFAULT '0',
  `issued_date` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `opening_stock` varchar(255) NOT NULL DEFAULT '0',
  `consumption` varchar(255) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `store_purchase_requests`
--

INSERT INTO `store_purchase_requests` (`id`, `department`, `date`, `category_id`, `material_id`, `quantity`, `available_quantity`, `issued_quantity`, `issued_date`, `status`, `opening_stock`, `consumption`) VALUES
(1, 'calendar', '2072-09-09', 3, 6, 121, 1212, 1212, '2072-11-20', 0, '0', '0'),
(2, '', '2072-09-01', 3, 6, 12, 1111, 12, '2072-10-11', 0, '0', '0'),
(3, '', '2072-09-09', 1, 2, 1212, 1111, 100, '0000-00-00', 0, '0', '0'),
(6, 'rexin', '2072-09-18', 1, 2, 679800, 76879, 800, '0000-00-00', 0, '500', '0'),
(7, 'calender', '2072-09-18', 2, 1, 56789, 5678, 56780, '2072-9-21', 0, '0', '0'),
(8, 'laminating', '2072-09-18', 3, 6, 456789, 56789, 12, '2072-10-11', 0, '0', '0'),
(9, 'laminating', '2072-09-18', 2, 5, 500, 2, 10, '2072-09-20', 0, '0', '0'),
(10, 'inspection', '2072-09-23', 4, 10, 10, 100, 8, '2072-10-11', 0, '0', '0'),
(11, 'papertube', '2072-09-23', 2, 4, 98, 78, 67, '2072-10-11', 0, '0', '0'),
(12, 'office', '2072-09-23', 2, 2, 90, 1, 90, '2072-10-11', 0, '0', '0'),
(13, 'gen10kva', '2072-09-23', 3, 7, 16, 19, 10, '2072-9-26', 0, '0', '0'),
(14, 'gen180kva', '2072-09-23', 3, 7, 100, 10, 10, '2072-9-26', 0, '0', '0'),
(15, 'gen1250kva', '2072-09-23', 3, 7, 190, 90, 100, '2072-10-11', 0, '0', '0'),
(16, 'general', '2072-09-23', 10, 354, 100, 8, 12, '2072-10-12', 0, '0', '0'),
(17, 'scrap', '2072-09-23', 2, 5, 56, 9, 0, '', 0, '0', '0'),
(18, 'boiler', '2072-09-23', 6, 24, 99, 6, 0, '', 0, '0', '0'),
(19, 'electrical', '2072-09-23', 11, 379, 100, 10, 0, '', 0, '0', '0'),
(20, 'mechanical', '2072-09-23', 15, 413, 18, 9, 0, '', 0, '0', '0'),
(21, 'rexin', '2072-09-26', 5, 22, 10, 9, 0, '', 0, '0', '0'),
(22, 'calender', '', 2, 4, 10, 19, 0, '', 0, '0', '0'),
(23, 'calender', '2072-09-26', 9, 50, 12, 1, 0, '', 0, '0', '0'),
(27, 'rexin', '2072-09-27', 0, 408, 87, 0, 0, '', 0, '0', '0'),
(28, 'store', '2072-10-10', 90, 34, 89, 0, 0, '', 0, '0', '0'),
(29, 'rexin', '2072-10-10', 0, 7, 11, 0, 11, '2072-10-28', 0, '0', '0'),
(30, 'printing', '2072-10-25', 12, 394, 100, 0, 0, '', 0, '0', '0'),
(31, 'laminating', '2072-10-15', 0, 5, 12, 0, 0, '', 0, '0', '0'),
(32, 'mixing', '2072-10-19', 5, 21, 12, 0, 0, '', 0, '0', '0'),
(33, 'calender', '2072-10-18', 0, 22, 1.8, 0, 0, '', 0, '0', '0'),
(34, 'calender', '2072-10-18', 0, 408, 9.7, 0, 0, '', 0, '0', '0'),
(35, 'calender', '2072-10-18', 0, 408, 1.8, 0, 0, '', 0, '0', '0'),
(36, 'calender', '2072-10-18', 0, 29, 1, 0, 0, '', 0, '0', '0'),
(37, 'mixing', '2072-10-19', 5, 21, 211, 0, 0, '', 0, '0', '0'),
(38, 'mixing', '2072-10-19', 7, 28, 2, 0, 0, '', 0, '0', '0'),
(39, 'mixing', '2072-10-19', 8, 29, 21, 0, 0, '', 0, '0', '0'),
(40, 'store', '2072-10-20', 10, 346, 43, 0, 0, '', 0, '0', '0'),
(41, 'mixing', '2072-10-25', 13, 409, 21, 0, 0, '', 0, '0', '0'),
(42, 'rexin', '2072-10-28', 1, 1, 100, 0, 255, '2072-10-28', 0, '1200', '110'),
(43, 'rexin', '2072-10-28', 1, 1, 500, 0, 110, '2072-10-28', 0, '1200', '0'),
(47, 'rexin', '2072-10-28', 4, 9, 500, 0, 500, '2072-10-28', 0, '0', '50'),
(48, 'rexin', '2072-10-29', 4, 9, 200, 0, 100, '2072-10-29', 0, '250', '0'),
(49, 'rexin', '2072-11-01', 2, 2, 0, 0, 0, '0', 0, '0', '0'),
(50, 'rexin', '2072-11-01', 0, 0, 0, 0, 0, '0', 0, '0', '0'),
(51, 'rexin', '2072-11-01', 1, 1, 0, 0, 0, '0', 0, '1505', '0'),
(52, 'rexin', '2072-11-01', 4, 9, 0, 0, 0, '0', 0, '338', '12'),
(53, 'rexin', '2072-11-01', 0, 0, 0, 0, 0, '0', 0, '0', '0'),
(54, 'rexin', '2072-11-01', 0, 0, 0, 0, 0, '0', 0, '0', '0'),
(55, 'rexin', '2072-11-01', 0, 0, 0, 0, 0, '0', 0, '0', '0'),
(56, 'rexin', '2072-11-01', 0, 0, 0, 0, 0, '0', 0, '0', '0'),
(57, 'rexin', '2072-11-01', 0, 0, 0, 0, 0, '0', 0, '0', '0'),
(58, 'rexin', '2072-11-01', 5, 21, 0, 0, 0, '0', 0, '0', '0'),
(59, 'rexin', '2072-11-01', 0, 0, 0, 0, 0, '0', 0, '0', '0'),
(60, 'rexin', '2072-11-01', 0, 0, 0, 0, 0, '0', 0, '0', '0'),
(61, 'rexin', '2072-11-01', 0, 0, 0, 0, 0, '0', 0, '0', '0'),
(62, 'rexin', '2072-11-01', 0, 0, 0, 0, 0, '0', 0, '0', '0'),
(63, 'rexin', '2072-11-01', 0, 0, 0, 0, 0, '0', 0, '0', '0'),
(64, 'rexin', '2072-11-01', 0, 0, 0, 0, 0, '0', 0, '0', '0'),
(65, 'rexin', '2072-11-01', 0, 0, 0, 0, 0, '0', 0, '0', '0'),
(66, 'rexin', '2072-11-01', 0, 0, 0, 0, 0, '0', 0, '0', '0'),
(67, 'rexin', '2072-11-01', 0, 0, 0, 0, 0, '0', 0, '0', '0'),
(68, 'rexin', '2072-11-01', 0, 0, 0, 0, 0, '0', 0, '0', '0'),
(69, 'rexin', '2072-11-01', 0, 0, 0, 0, 0, '0', 0, '0', '0'),
(70, 'rexin', '2072-11-01', 0, 0, 0, 0, 0, '0', 0, '0', '0'),
(71, 'rexin', '2072-11-01', 0, 0, 0, 0, 0, '0', 0, '0', '0'),
(72, 'rexin', '2072-11-01', 0, 0, 0, 0, 0, '0', 0, '0', '0'),
(73, 'rexin', '2072-11-01', 0, 0, 0, 0, 0, '0', 0, '0', '0'),
(74, 'rexin', '2072-11-01', 0, 0, 0, 0, 0, '0', 0, '0', '0'),
(75, 'rexin', '2072-11-01', 0, 0, 0, 0, 0, '0', 0, '0', '0'),
(76, 'rexin', '2072-11-01', 0, 0, 0, 0, 0, '0', 0, '0', '0'),
(77, 'rexin', '2072-11-01', 0, 0, 0, 0, 0, '0', 0, '0', '0'),
(78, 'rexin', '2072-11-01', 0, 0, 0, 0, 0, '0', 0, '0', '0'),
(79, 'rexin', '2072-11-01', 0, 0, 0, 0, 0, '0', 0, '0', '0'),
(80, 'rexin', '2072-11-01', 0, 0, 0, 0, 0, '0', 0, '0', '0'),
(81, 'rexin', '2072-11-01', 0, 0, 0, 0, 0, '0', 0, '0', '0'),
(82, 'rexin', '2072-11-01', 0, 0, 0, 0, 0, '0', 0, '0', '0'),
(83, 'rexin', '2072-11-02', 2, 2, 0, 0, 0, '0', 0, '0', '0'),
(84, 'rexin', '2072-11-02', 0, 0, 0, 0, 0, '0', 0, '0', '0'),
(85, 'rexin', '2072-11-02', 1, 1, 0, 0, 0, '0', 1, '1504', '1'),
(86, 'rexin', '2072-11-02', 4, 9, 0, 0, 0, '0', 1, '227', '112'),
(87, 'rexin', '2072-11-02', 0, 0, 0, 0, 0, '0', 0, '0', '0'),
(88, 'rexin', '2072-11-02', 0, 0, 0, 0, 0, '0', 0, '0', '0'),
(89, 'rexin', '2072-11-02', 0, 0, 0, 0, 0, '0', 0, '0', '0'),
(90, 'rexin', '2072-11-02', 0, 0, 0, 0, 0, '0', 0, '0', '0'),
(91, 'rexin', '2072-11-02', 0, 0, 0, 0, 0, '0', 0, '0', '0'),
(92, 'rexin', '2072-11-02', 5, 21, 0, 0, 0, '0', 0, '0', '0'),
(93, 'rexin', '2072-11-02', 0, 0, 0, 0, 0, '0', 0, '0', '0'),
(94, 'rexin', '2072-11-02', 0, 0, 0, 0, 0, '0', 0, '0', '0'),
(95, 'rexin', '2072-11-02', 0, 0, 0, 0, 0, '0', 0, '0', '0'),
(96, 'rexin', '2072-11-02', 0, 0, 0, 0, 0, '0', 0, '0', '0'),
(97, 'rexin', '2072-11-02', 0, 0, 0, 0, 0, '0', 0, '0', '0'),
(98, 'rexin', '2072-11-02', 0, 0, 0, 0, 0, '0', 0, '0', '0'),
(99, 'rexin', '2072-11-02', 0, 0, 0, 0, 0, '0', 0, '0', '0'),
(100, 'rexin', '2072-11-02', 0, 0, 0, 0, 0, '0', 0, '0', '0'),
(101, 'rexin', '2072-11-02', 0, 0, 0, 0, 0, '0', 0, '0', '0'),
(102, 'rexin', '2072-11-02', 0, 0, 0, 0, 0, '0', 0, '0', '0'),
(103, 'rexin', '2072-11-02', 0, 0, 0, 0, 0, '0', 0, '0', '0'),
(104, 'rexin', '2072-11-02', 0, 0, 0, 0, 0, '0', 0, '0', '0'),
(105, 'rexin', '2072-11-02', 0, 0, 0, 0, 0, '0', 0, '0', '0'),
(106, 'rexin', '2072-11-02', 0, 0, 0, 0, 0, '0', 0, '0', '0'),
(107, 'rexin', '2072-11-02', 0, 0, 0, 0, 0, '0', 0, '0', '0'),
(108, 'rexin', '2072-11-02', 0, 0, 0, 0, 0, '0', 0, '0', '0'),
(109, 'rexin', '2072-11-02', 0, 0, 0, 0, 0, '0', 0, '0', '0'),
(110, 'rexin', '2072-11-02', 0, 0, 0, 0, 0, '0', 0, '0', '0'),
(111, 'rexin', '2072-11-02', 0, 0, 0, 0, 0, '0', 0, '0', '0'),
(112, 'rexin', '2072-11-02', 0, 0, 0, 0, 0, '0', 0, '0', '0'),
(113, 'rexin', '2072-11-02', 0, 0, 0, 0, 0, '0', 0, '0', '0'),
(114, 'rexin', '2072-11-02', 0, 0, 0, 0, 0, '0', 0, '0', '0'),
(115, 'rexin', '2072-11-02', 0, 0, 0, 0, 0, '0', 0, '0', '0'),
(116, 'rexin', '2072-11-02', 0, 0, 0, 0, 0, '0', 0, '0', '0');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `store_purchase_requests`
--
ALTER TABLE `store_purchase_requests`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_id` (`category_id`),
  ADD KEY `material_id` (`material_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `store_purchase_requests`
--
ALTER TABLE `store_purchase_requests`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=117;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
