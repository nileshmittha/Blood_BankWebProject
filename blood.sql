-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 30, 2021 at 02:20 PM
-- Server version: 10.4.10-MariaDB
-- PHP Version: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `blood`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `s_no` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(250) NOT NULL,
  `password` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`s_no`, `name`, `email`, `password`) VALUES
(1, 'Admin', 'admin@gmail.com', 'admin@123');

-- --------------------------------------------------------

--
-- Table structure for table `blood`
--

CREATE TABLE `blood` (
  `id` int(30) NOT NULL,
  `blood_group` varchar(10) NOT NULL,
  `volume` float NOT NULL,
  `status` int(200) NOT NULL,
  `request_id` int(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `blood`
--

INSERT INTO `blood` (`id`, `blood_group`, `volume`, `status`, `request_id`) VALUES
(1, 'A+', 450, 1, 0),
(2, 'A-', 450, 1, 0),
(3, 'B+', 450, 0, 0),
(4, 'B-', 450, 0, 0),
(5, 'O+', 450, 2, 0),
(6, 'O-', 450, 1, 0),
(7, 'AB+', 450, 0, 0),
(8, 'AB-', 450, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `doner`
--

CREATE TABLE `doner` (
  `d_id` int(11) NOT NULL,
  `d_name` varchar(255) NOT NULL,
  `d_gender` varchar(50) NOT NULL,
  `d_bgroup` varchar(200) NOT NULL,
  `d_mobile` varchar(255) NOT NULL,
  `d_email` varchar(100) NOT NULL,
  `d_image` varchar(250) NOT NULL,
  `d_add` varchar(255) NOT NULL,
  `d_date` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `doner`
--

INSERT INTO `doner` (`d_id`, `d_name`, `d_gender`, `d_bgroup`, `d_mobile`, `d_email`, `d_image`, `d_add`, `d_date`) VALUES
(1, 'ali bagwan', 'female', '1', '00000000', 'ali@gamil.com', 'upload/1624970611.png', 'solapur', '2021-06-29'),
(3, 'shrihari shigatekar', 'male', '6', '00000000', 'hari@gamil.com', 'upload/1624974330.jpg', 'solapur', '2021-06-29'),
(4, 'yuvraj', 'male', '4', '00000000', 'yuvraj@gamil.com', 'upload/1624978245.png', 'solapur', '2021-06-29'),
(5, 'nilesh mita', 'male', '2', '00000000', 'nelesh@gamil.com', 'upload/1624978849.png', 'solapur', '2021-06-29'),
(6, 'vishal gangji', 'male', '5', '00000000', 'vishal@gmailcom', 'upload/1625044557.png', 'solapur', '2021-06-30'),
(7, 'ishwar swami ', 'male', '5', '00000000', 'ishwar@gmail.com', 'upload/1625048229.png', 'solapur', '2021-06-30');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`s_no`);

--
-- Indexes for table `blood`
--
ALTER TABLE `blood`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `doner`
--
ALTER TABLE `doner`
  ADD PRIMARY KEY (`d_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `s_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `blood`
--
ALTER TABLE `blood`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `doner`
--
ALTER TABLE `doner`
  MODIFY `d_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
