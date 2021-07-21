-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 21, 2021 at 03:05 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bank`
--

-- --------------------------------------------------------

--
-- Table structure for table `customer_info`
--

CREATE TABLE `customer_info` (
  `id` int(100) NOT NULL,
  `name` varchar(10) NOT NULL,
  `email` varchar(18) NOT NULL,
  `balance` int(7) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer_info`
--

INSERT INTO `customer_info` (`id`, `name`, `email`, `balance`) VALUES
(1, 'Suresh', 'suresh@xyz.com', 10000),
(2, 'Ramesh', 'ramesh@xyz.com', 20000),
(3, 'Mahesh', 'mahesh@xyz.com', 30000),
(4, 'John', 'john@xyz.com', 40000),
(5, 'Juan', 'juan@xyz.com', 50000),
(6, 'Mike', 'mike@xyz.com', 60000),
(7, 'David', 'david@xyz.com', 70000),
(8, 'Alice', 'alice@xyz.com', 80000),
(9, 'Harry', 'harry@xyz.com', 90000),
(10, 'Joe', 'joe@xyz.com', 1000);

-- --------------------------------------------------------

--
-- Table structure for table `transanction_history`
--

CREATE TABLE `transanction_history` (
  `id` int(100) NOT NULL,
  `sender` varchar(10) NOT NULL,
  `reciever` varchar(10) NOT NULL,
  `amount` int(7) NOT NULL,
  `datetime` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customer_info`
--
ALTER TABLE `customer_info`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transanction_history`
--
ALTER TABLE `transanction_history`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customer_info`
--
ALTER TABLE `customer_info`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `transanction_history`
--
ALTER TABLE `transanction_history`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
