-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 02, 2023 at 08:45 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `laundry_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(500) NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(250) NOT NULL,
  `fname` varchar(50) NOT NULL,
  `lname` varchar(500) NOT NULL,
  `gender` varchar(500) NOT NULL,
  `dob` text NOT NULL,
  `contact` text NOT NULL,
  `address` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `email`, `password`, `fname`, `lname`, `gender`, `dob`, `contact`, `address`) VALUES
(1, 'admin', 'pragnya.admin@gmail.com', 'admin1234', 'Pragnya', 'Sahu', 'Female', '02-03-2002', '9423979339', 'Berahmpur');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `uid` varchar(100) NOT NULL,
  `id` int(100) NOT NULL,
  `fname` varchar(50) NOT NULL,
  `lname` varchar(100) NOT NULL,
  `contact` varchar(200) NOT NULL,
  `address` varchar(100) NOT NULL,
  `email` varchar(30) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `reset_token` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`uid`, `id`, `fname`, `lname`, `contact`, `address`, `email`, `password`, `reset_token`) VALUES
('0eeccc0b14ea3c551e02b10fe5af1d82231e94cb783bcbcbb128b14cbd384167', 27, 'Pragnya', 'Sahu', '8989000300', 'Bhubaneswar', 'pragnya@gmail.com', 'bb84d186a88b27036a855f97a68479f94134b46816949aed9f44d0248c38ffd3', ''),
('0eeccc0b14ea3c551e02b10fe5af1d82231e94cb783bcbcbb128b14cbd384177', 29, 'Pragnya', 'Sahu', '8989000300', 'Bhubaneswar', 'tyransen4@gmail.com', '550c0a27fbf364a253893b2ca517a4a735058357136df8976af7e1cd5e9ca1ab', '');

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE `order` (
  `id` int(100) NOT NULL,
  `uid` varchar(100) NOT NULL,
  `fname` varchar(100) NOT NULL,
  `lname` varchar(200) NOT NULL,
  `sname` varchar(100) NOT NULL,
  `address` varchar(100) NOT NULL,
  `description` varchar(200) NOT NULL,
  `price` varchar(50) NOT NULL,
  `delivery_date` date NOT NULL,
  `delivery_status` varchar(20) NOT NULL,
  `todays_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `order`
--

INSERT INTO `order` (`id`, `uid`, `fname`, `lname`, `sname`, `address`, `description`, `price`, `delivery_date`, `delivery_status`, `todays_date`) VALUES
(58, '0eeccc0b14ea3c551e02b10fe5af1d82231e94cb783bcbcbb128b14cbd384167', 'Pragnya', 'Sahu', 'washing', 'Berahmpur', 'Take care of the white cloth', '50', '2023-06-10', 'Accepted', '2023-06-02'),
(59, '0eeccc0b14ea3c551e02b10fe5af1d82231e94cb783bcbcbb128b14cbd384167', 'Pragnya', 'Sahu', 'washing', 'Berahmpur', 'Take care of the white cloth', '50', '2023-06-18', 'Accepted', '2023-06-02'),
(60, '0eeccc0b14ea3c551e02b10fe5af1d82231e94cb783bcbcbb128b14cbd384167', 'Pragnya', 'Sahu', 'washing', 'Berahmpur', 'Take care of the white cloth', '50', '2023-06-17', 'Accepted', '2023-06-02'),
(61, '0eeccc0b14ea3c551e02b10fe5af1d82231e94cb783bcbcbb128b14cbd384167', 'Pragnya', 'Sahu', 'rollpessing', 'Berahmpur', 'Take care of the white cloth', '160', '2023-06-11', 'Accepted', '2023-06-02'),
(62, '0eeccc0b14ea3c551e02b10fe5af1d82231e94cb783bcbcbb128b14cbd384167', 'Pragnya', 'Sahu', 'washing', 'Berahmpur', 'Take care of the white cloth', '50', '2023-06-16', 'Accepted', '2023-06-02'),
(63, '0eeccc0b14ea3c551e02b10fe5af1d82231e94cb783bcbcbb128b14cbd384167', 'Pragnya', 'Sahu', 'washing', 'Berahmpur', 'Take care of the white cloth', '50', '2023-06-10', 'Accepted', '2023-06-02'),
(64, '0eeccc0b14ea3c551e02b10fe5af1d82231e94cb783bcbcbb128b14cbd384167', 'Pragnya', 'Sahu', 'rollpessing', 'Bhubaneswar', 'Take care of the white cloth', '160', '2023-06-17', 'Accepted', '2023-06-02'),
(65, '0eeccc0b14ea3c551e02b10fe5af1d82231e94cb783bcbcbb128b14cbd384167', 'Pragnya', 'Sahu', 'washing', 'Bhubaneswar', 'Take care of the white cloth', '50', '2023-06-11', 'Accepted', '2023-06-02');

-- --------------------------------------------------------

--
-- Table structure for table `service`
--

CREATE TABLE `service` (
  `id` int(10) NOT NULL,
  `sname` varchar(50) NOT NULL,
  `price` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `service`
--

INSERT INTO `service` (`id`, `sname`, `price`) VALUES
(4, 'washing', '60'),
(14, 'rollpessing', '160'),
(15, 'ironing', '100'),
(16, 'Ironing', '20');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uid` (`uid`);

--
-- Indexes for table `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `service`
--
ALTER TABLE `service`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `order`
--
ALTER TABLE `order`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

--
-- AUTO_INCREMENT for table `service`
--
ALTER TABLE `service`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
