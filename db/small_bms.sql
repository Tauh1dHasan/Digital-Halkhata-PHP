-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Mar 08, 2020 at 10:27 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `small_bms`
--

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `customer_id` int(11) NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile` int(15) NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `picture` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `u_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`customer_id`, `name`, `email`, `mobile`, `address`, `picture`, `u_id`) VALUES
(1, 'Obama', 'obama@mail.com', 123, 'kamarpara, turag, dhaka, bangladesh', 'obama.png', 1),
(2, 'new2', 'new2@mail.com', 2345, 'kamarpara, turag, dhaka, bangladesh', 'Nihad_Portrate.jpg', 1),
(3, 'new2', 'new2@mail.com', 58796413, 'new2 address', 'Nihad_Portrate.jpg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `due_payment`
--

CREATE TABLE `due_payment` (
  `dp_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `action_date` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `due` int(11) DEFAULT NULL,
  `payment` int(11) DEFAULT NULL,
  `balance` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `due_payment`
--

INSERT INTO `due_payment` (`dp_id`, `customer_id`, `action_date`, `product`, `due`, `payment`, `balance`) VALUES
(1, 1, NULL, NULL, 500, NULL, -500),
(2, 2, NULL, NULL, NULL, NULL, NULL),
(3, 1, NULL, NULL, 250, NULL, -750),
(4, 1, NULL, NULL, 250, NULL, -1000),
(5, 1, '03/Mar/2020', 'chal 5 kg', 120, NULL, -1120),
(6, 1, '03/Mar/2020', 'dal 2 kg', 100, NULL, -1220),
(7, 1, '03/Mar/2020', 'dal 2 kg', 100, NULL, -1320),
(8, 1, '03/Mar/2020', 'dal 2 kg', 100, NULL, -1420),
(9, 1, '03/Mar/2020', 'Cigarate 1 pack', 200, NULL, -1620),
(10, 1, '03/Mar/2020', NULL, NULL, 1000, -620),
(11, 1, '03/Mar/2020', NULL, NULL, 1000, 380),
(12, 1, '04/Mar/2020', 'chal, dal, ata', 380, NULL, 0),
(13, 1, '04/Mar/2020', '1 kg dudh', 100, NULL, -100),
(14, 1, '04/Mar/2020', NULL, NULL, 100, 0),
(15, 3, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `earn_expense`
--

CREATE TABLE `earn_expense` (
  `ee_id` int(11) NOT NULL,
  `action_date` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `earn_cat` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `earn_amount` int(11) NOT NULL,
  `expense_cat` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `expense_amount` int(11) NOT NULL,
  `balance` int(11) NOT NULL,
  `u_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `earn_expense`
--

INSERT INTO `earn_expense` (`ee_id`, `action_date`, `earn_cat`, `earn_amount`, `expense_cat`, `expense_amount`, `balance`, `u_id`) VALUES
(1, '04/Mar/2020', 'Shop sales', 2000, '', 0, 2000, 1),
(2, '04/Mar/2020', '', 0, 'Cigarate case', 500, 1500, 1),
(3, '07/Mar/2020', 'Shop sales', 2000, 'Cigarate case', 500, 3000, 1);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `u_id` int(11) NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile` int(15) NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `picture` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`u_id`, `name`, `mobile`, `email`, `password`, `address`, `picture`) VALUES
(1, 'Tauhid Hasan edited', 1677163339, 'tauhid@softlooper.com', '4491e3be815743b1ed51a9f67dc538f5', 'Kamarpara, Uttara, Dhaka edited', 'truck-logo.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`customer_id`);

--
-- Indexes for table `due_payment`
--
ALTER TABLE `due_payment`
  ADD PRIMARY KEY (`dp_id`);

--
-- Indexes for table `earn_expense`
--
ALTER TABLE `earn_expense`
  ADD PRIMARY KEY (`ee_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`u_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `customer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `due_payment`
--
ALTER TABLE `due_payment`
  MODIFY `dp_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `earn_expense`
--
ALTER TABLE `earn_expense`
  MODIFY `ee_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `u_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
