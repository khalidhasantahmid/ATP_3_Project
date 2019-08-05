-- phpMyAdmin SQL Dump
-- version 4.8.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 17, 2018 at 07:37 AM
-- Server version: 10.1.33-MariaDB
-- PHP Version: 7.2.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `laravel`
--

-- --------------------------------------------------------

--
-- Table structure for table `addresses`
--

CREATE TABLE `addresses` (
  `id` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `address` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `addresses`
--

INSERT INTO `addresses` (`id`, `email`, `address`) VALUES
(1, 'test2@gmail.com', 'test again'),
(2, 'test@gmail.com', 'test again'),
(5, 'test3@gmail.com', 'test 3 address'),
(7, 'test4@gmail.com', 'test 4 address'),
(8, 'test5@gmail.com', 'test 5 address'),
(11, 'khalid@gmail.com', 'admin address');

-- --------------------------------------------------------

--
-- Table structure for table `carts`
--

CREATE TABLE `carts` (
  `id` int(11) NOT NULL,
  `cartId` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `quantity` int(5) NOT NULL,
  `price` double NOT NULL,
  `total` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `carts`
--

INSERT INTO `carts` (`id`, `cartId`, `name`, `quantity`, `price`, `total`) VALUES
(1, '1544290589817', 'Who cares', 3, 250, 750),
(2, '1544290589817', 'Never', 7, 150, 1050),
(3, '1544294829888', 'Who cares', 5, 250, 1250),
(4, '1544294829888', 'Never', 4, 150, 600),
(5, '1544294829888', 'Need less', 3, 150, 450),
(6, '1544296396165', 'Never', 3, 150, 450),
(7, '1544296396165', 'Groot', 3, 250, 750);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(6) NOT NULL,
  `oStatus` varchar(10) NOT NULL,
  `cartId` varchar(100) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `cost` float NOT NULL,
  `cEmail` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `oStatus`, `cartId`, `date`, `cost`, `cEmail`) VALUES
(1, 'ordered', '1544290589817', '2018-12-08 17:36:31', 1800, 'test3@gmail.com'),
(2, 'ordered', '1544294829888', '2018-12-08 18:47:12', 2300, 'test@gmail.com'),
(3, 'ordered', '1544296396165', '2018-12-08 19:13:19', 1200, 'test3@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `tag` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `price` float NOT NULL,
  `description` varchar(150) NOT NULL,
  `path` varchar(150) NOT NULL,
  `addedDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `addedBy` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `tag`, `name`, `price`, `description`, `path`, `addedDate`, `addedBy`) VALUES
(4, 'Character', 'Popyeee', 250, 'hello', '8.jpg', '2018-11-01 12:21:23', 'khalid@gmail.com'),
(5, 'Character', 'Thanos', 100, 'A lol enemy', '9.jpg', '2018-11-01 13:38:54', 'khalid@gmail.com'),
(6, 'Bangla', 'Baundule', 150, 'childhood', '16.jpg', '2018-11-01 18:07:48', 'khalid@gmail.com'),
(7, 'Character', 'Messi', 250, 'One of the greatest footballer ', '15.jpg', '2018-11-01 18:08:58', 'khalid@gmail.com'),
(9, 'Character', 'Groot', 250, 'I am froot', '7.jpg', '2018-11-06 12:38:39', 'khalid@gmail.com'),
(10, 'Quotes', 'Need less', 150, 'Less is better', '13.jpg', '2018-11-06 12:39:22', 'khalid@gmail.com'),
(11, 'Quotes', 'Never', 150, 'Not going to', '20.jpg', '2018-11-06 12:40:20', 'khalid@gmail.com'),
(12, 'Bangla', 'Simple', 200, 'Simple', '23.jpg', '2018-11-06 12:41:26', 'khalid@gmail.com'),
(13, 'Quotes', 'Who cares', 250, 'Does anybody care', '12.jpg', '2018-11-28 12:45:58', 'khalid@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `type` varchar(50) NOT NULL DEFAULT 'customer'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `phone`, `email`, `password`, `type`) VALUES
(1, 'khalid', '0125', 'khalid@gmail.com', 'k', 'admin'),
(3, 'test2', '123122', 'test2@gmail.com', 't', 'customer'),
(4, 'testttt', '132132123', 'test@gmail.com', 't', 'customer'),
(14, 'test 3', '123121', 'test3@gmail.com', 't', 'customer');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `addresses`
--
ALTER TABLE `addresses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
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
-- AUTO_INCREMENT for table `addresses`
--
ALTER TABLE `addresses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `carts`
--
ALTER TABLE `carts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
