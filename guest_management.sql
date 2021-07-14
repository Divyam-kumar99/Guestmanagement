-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 10, 2021 at 09:31 AM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `guest_management`
--

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(13) NOT NULL,
  `address` varchar(250) NOT NULL,
  `password` varchar(250) NOT NULL,
  `role` int(1) NOT NULL DEFAULT 1,
  `created` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`id`, `name`, `email`, `phone`, `address`, `password`, `role`, `created`) VALUES
(1, 'Divyam', 'divyam@ajatus.co.in', '9658012616', 'Keonjhar', '123', 1, '2021-07-02 05:31:36'),
(2, 'Girish', 'girish@ajatus.co.in', '1234567890', 'Ajatus', '123', 0, '2021-07-01 10:45:41'),
(3, 'Sunita', 'sunita@ajatus.co.in', '9632587410', 'Acharjya ', '123', 2, '2021-07-02 09:04:40'),
(6, 'Trilochan Parida', 'Trilochan@ajatus.co.in', '969696999', 'Ajatus office', '123', 0, '2021-07-02 04:57:12');

-- --------------------------------------------------------

--
-- Table structure for table `guest_employee_mapping`
--

CREATE TABLE `guest_employee_mapping` (
  `id` int(11) NOT NULL,
  `phone` varchar(13) NOT NULL,
  `name` varchar(100) NOT NULL,
  `address` varchar(250) NOT NULL,
  `purpose` varchar(350) NOT NULL,
  `status` int(1) NOT NULL DEFAULT 0,
  `created` timestamp NOT NULL DEFAULT current_timestamp(),
  `emp_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `guest_employee_mapping`
--

INSERT INTO `guest_employee_mapping` (`id`, `phone`, `name`, `address`, `purpose`, `status`, `created`, `emp_id`) VALUES
(2, '0011', 'Sona', 'USA', 'kill the employee', 1, '2021-07-10 14:30:00', 1),
(3, '9658012616', 'Baisnavee Panda', 'Keonjhar', 'kill the employee', 2, '2021-07-31 06:30:00', 6),
(5, '123456789', 'temp', 'temp', 'temp', 0, '2021-07-28 10:44:00', 1),
(6, '07849073455', 'SHREYA KUMARI', 'trident ', 'Parcel', 0, '2021-07-03 10:08:14', 6),
(7, '7894561230', 'Random', 'random', 'random', 1, '2021-07-22 14:43:00', 1),
(8, '1234567890', 'Rahul', 'bbsr', 'Say hello', 3, '2021-07-05 04:27:06', 2),
(11, '4561237890', 'Shreyas', 'BBSR', 'Say hello 22 times', 2, '2021-07-30 05:13:00', 1),
(12, '7410258963', 'hello Divyam', 'Divyam house', 'say hello', 0, '2021-07-08 10:30:00', 1),
(13, '5555555555', 'helluu', 'heluuu', 'kill', 3, '2021-07-07 07:55:36', 2),
(14, '9658012616', 'Baisnavee Panda', 'Keonjhar', 'shreyas hello', 0, '2021-07-07 10:47:59', 6);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `guest_employee_mapping`
--
ALTER TABLE `guest_employee_mapping`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `guest_employee_mapping`
--
ALTER TABLE `guest_employee_mapping`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
