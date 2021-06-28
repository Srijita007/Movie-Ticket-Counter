-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 28, 2021 at 01:13 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.3.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `srijita_68`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `Name` varchar(50) NOT NULL,
  `Contact` bigint(10) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`Name`, `Contact`, `Email`, `Password`) VALUES
('Srijita Chakrabarty', 1234567890, 'admin@gmail.com', 'abcd');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `Name` varchar(50) NOT NULL,
  `Address` text NOT NULL,
  `Pincode` int(6) NOT NULL,
  `Contact` bigint(10) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `Date_Time` datetime NOT NULL,
  `Name` varchar(50) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Address` text NOT NULL,
  `Contact` bigint(10) NOT NULL,
  `Items` int(11) NOT NULL,
  `Amount` bigint(20) NOT NULL,
  `Transaction_ID` text DEFAULT NULL,
  `Status` varchar(10) NOT NULL DEFAULT 'Unpaid'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `p_id` varchar(10) NOT NULL,
  `product_name` varchar(50) NOT NULL,
  `category` varchar(20) NOT NULL,
  `description` text NOT NULL,
  `price` bigint(20) NOT NULL,
  `status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`p_id`, `product_name`, `category`, `description`, `price`, `status`) VALUES
('M_101', 'Black Widow', 'action', 'MCU Movie', 230, 'Inactive'),
('M_102', 'Tenet', 'action', 'Christopher Nolan Sci-Fi', 500, 'Active'),
('M_103', 'Panther', 'action', 'Enjoy the action!', 350, 'Inactive'),
('M_104', 'Iron Man 3', 'action', 'It is the 3rd Iron man movie from marvel.', 300, 'Active'),
('M_111', 'Borat Subsequent Moviefilm', 'comedy', 'Comedy 1', 320, 'Active'),
('M_112', 'I Care a Lot', 'comedy', 'Comedy 2', 650, 'Active'),
('M_113', 'On the Rocks', 'comedy', 'Comedy 3', 110, 'Active'),
('M_114', 'Palm Springs', 'comedy', 'Comedy 4', 260, 'Active'),
('M_201', 'X-Men Origins', 'action', 'Another X-men movie from marvel!!', 400, 'Active');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`Email`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`Email`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`Date_Time`,`Email`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`p_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
