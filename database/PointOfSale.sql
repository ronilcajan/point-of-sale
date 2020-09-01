-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Mar 30, 2020 at 04:26 PM
-- Server version: 10.3.16-MariaDB
-- PHP Version: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `PointOfSale`
--

-- --------------------------------------------------------

--
-- Table structure for table `cashflow`
--

CREATE TABLE `cashflow` (
  `transaction_id` int(11) NOT NULL,
  `description` text DEFAULT NULL,
  `amount` decimal(18,2) DEFAULT NULL,
  `username` varchar(30) DEFAULT NULL,
  `transaction_date` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cashflow`
--

INSERT INTO `cashflow` (`transaction_id`, `description`, `amount`, `username`, `transaction_date`) VALUES
(1, 'Cash-in', '10000.00', 'admin', '2019-04-08 15:51:58');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `customer_id` int(11) NOT NULL,
  `firstname` varchar(30) DEFAULT NULL,
  `lastname` varchar(30) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `contact_number` varchar(30) DEFAULT NULL,
  `image` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`customer_id`, `firstname`, `lastname`, `address`, `contact_number`, `image`) VALUES
(16, 'jersel', 'Bill', 'Philippines', '+63(09)1234-1234', 'user.png');

-- --------------------------------------------------------

--
-- Table structure for table `delivery`
--

CREATE TABLE `delivery` (
  `transaction_no` varchar(20) NOT NULL,
  `supplier_id` int(11) DEFAULT NULL,
  `username` varchar(20) DEFAULT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `delivery`
--

INSERT INTO `delivery` (`transaction_no`, `supplier_id`, `username`, `date`) VALUES
('5CAAFDA8CD697', 21, 'admin', '2019-04-08 15:52:40'),
('5CAAFDEEDB333', 22, 'admin', '2019-04-08 15:54:19'),
('5CAAFE37D21E8', 21, 'admin', '2019-04-08 15:55:28'),
('5E7F00084C934', 22, 'admin', '2020-03-28 15:43:22'),
('5E81DF2B7B8F7', 22, 'admin', '2020-03-30 20:00:48');

-- --------------------------------------------------------

--
-- Table structure for table `initial_products`
--

CREATE TABLE `initial_products` (
  `id` varchar(50) NOT NULL,
  `initial_quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `initial_products`
--

INSERT INTO `initial_products` (`id`, `initial_quantity`) VALUES
('1001', 100),
('10011', 200),
('10012', 100),
('1', 100),
('2', 200),
('3', 150),
('4', 125),
('5', 100),
('23213', 23),
('10000', 21);

-- --------------------------------------------------------

--
-- Table structure for table `logs`
--

CREATE TABLE `logs` (
  `id` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `purpose` varchar(30) NOT NULL,
  `logs_time` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `logs`
--

INSERT INTO `logs` (`id`, `username`, `purpose`, `logs_time`) VALUES
(851, 'admin', 'User admin login', '2019-04-08 15:48:04'),
(854, 'admin', 'User admin logout', '2019-04-08 15:49:48'),
(855, 'admin', 'User admin login', '2019-04-08 15:50:04'),
(856, 'admin', 'Supplier OrangeCompany added', '2019-04-08 15:50:54'),
(857, 'admin', 'Customer jersel Added', '2019-04-08 15:51:25'),
(858, 'admin', 'Cash-in', '2019-04-08 15:51:58'),
(859, 'admin', 'Delivery Added', '2019-04-08 15:52:40'),
(860, 'admin', 'Customer Bill Added', '2019-04-08 15:53:18'),
(861, 'admin', 'Delivery Added', '2019-04-08 15:54:19'),
(862, 'admin', 'Delivery Added', '2019-04-08 15:55:29'),
(863, 'admin', 'Product sold', '2019-04-08 15:56:39'),
(864, 'admin', 'User admin logout', '2019-04-08 15:57:38'),
(865, 'admin', 'User admin login', '2019-04-08 16:06:54'),
(866, 'admin', 'User admin login', '2019-04-08 20:28:36'),
(867, 'admin', 'Product sold', '2019-04-08 20:29:27'),
(868, 'admin', 'User admin login', '2020-03-23 16:04:06'),
(869, 'admin', 'User admin logout', '2020-03-23 16:04:24'),
(870, 'admin', 'User admin login', '2020-03-28 12:58:34'),
(871, 'admin', 'User admin logout', '2020-03-28 13:02:20'),
(872, 'admin', 'User admin login', '2020-03-28 13:02:26'),
(873, 'admin', 'User admin logout', '2020-03-28 13:02:59'),
(874, 'admin', 'User admin login', '2020-03-28 13:05:48'),
(875, 'admin', 'Product sold', '2020-03-28 14:06:26'),
(876, 'admin', 'Product sold', '2020-03-28 14:07:27'),
(877, 'admin', 'Product sold', '2020-03-28 14:08:09'),
(878, 'admin', 'Product sold', '2020-03-28 14:14:46'),
(879, 'admin', 'Product sold', '2020-03-28 14:22:55'),
(880, 'admin', 'Product sold', '2020-03-28 14:27:51'),
(881, 'admin', 'Delivery Added', '2020-03-28 15:43:22'),
(882, 'admin', 'Product sold', '2020-03-28 16:14:30'),
(883, 'admin', 'User admin login', '2020-03-29 09:26:29'),
(884, 'admin', 'User admin login', '2020-03-29 09:40:46'),
(885, 'admin', 'Product Coffee updated', '2020-03-29 09:53:36'),
(886, 'admin', 'Product Coffee updated', '2020-03-29 09:53:51'),
(887, 'admin', 'User admin login', '2020-03-30 09:05:52'),
(888, 'admin', 'Product sold', '2020-03-30 09:07:10'),
(889, 'admin', 'User admin login', '2020-03-30 19:59:24'),
(890, 'admin', 'Delivery Added', '2020-03-30 20:00:48'),
(891, 'admin', 'User admin login', '2020-03-30 22:26:03');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_no` varchar(50) NOT NULL,
  `product_name` varchar(30) DEFAULT NULL,
  `sell_price` decimal(18,2) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `unit` varchar(30) DEFAULT NULL,
  `min_stocks` int(11) DEFAULT NULL,
  `remarks` text DEFAULT NULL,
  `location` varchar(50) DEFAULT NULL,
  `images` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_no`, `product_name`, `sell_price`, `quantity`, `unit`, `min_stocks`, `remarks`, `location`, `images`) VALUES
('1', 'Coffee', '12.00', 70, 'sachet', 20, 'sfdsfdsf', 'fsdfdsfdsfds', NULL),
('10000', 'asdas', '25575.60', 21, 'KA', 29, NULL, NULL, NULL),
('1001', 'Glass', '22.00', 100, 'Box', 20, NULL, NULL, NULL),
('10011', 'Chair', '600.00', 198, 'Each', 20, NULL, NULL, NULL),
('10012', 'Sofa', '2400.00', 92, 'Each', 20, NULL, NULL, NULL),
('2', 'Tooth Paste', '24.00', 200, 'sachet', 10, NULL, NULL, NULL),
('23213', 'sdfsd', '42.24', 19, 'sdfsdf', 23, 'fdsfds', 'dffdf', NULL),
('3', 'Shampoo', '6.60', 148, 'sachet', 20, NULL, NULL, NULL),
('4', 'Soap', '17.25', 122, 'sachet', 20, NULL, NULL, NULL),
('5', 'Conditioner', '12.00', 100, 'sachet', 10, NULL, NULL, NULL);

--
-- Triggers `products`
--
DELIMITER $$
CREATE TRIGGER `delete` BEFORE DELETE ON `products` FOR EACH ROW DELETE FROM initial_products WHERE id=old.product_no
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `insert` AFTER INSERT ON `products` FOR EACH ROW INSERT INTO initial_products(id,initial_quantity) VALUES(new.product_no,new.quantity)
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `product_delivered`
--

CREATE TABLE `product_delivered` (
  `transaction_no` varchar(30) NOT NULL,
  `product_id` varchar(30) NOT NULL,
  `total_qty` int(11) NOT NULL,
  `buy_price` decimal(18,2) NOT NULL,
  `tax_rate` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product_delivered`
--

INSERT INTO `product_delivered` (`transaction_no`, `product_id`, `total_qty`, `buy_price`, `tax_rate`) VALUES
('5CAAFDA8CD697', '1001', 100, '20.00', 10),
('5CAAFDEEDB333', '10011', 200, '500.00', 20),
('5CAAFDEEDB333', '10012', 100, '2000.00', 20),
('5CAAFE37D21E8', '1', 100, '10.00', 20),
('5CAAFE37D21E8', '2', 200, '20.00', 20),
('5CAAFE37D21E8', '3', 150, '6.00', 10),
('5CAAFE37D21E8', '4', 125, '15.00', 15),
('5CAAFE37D21E8', '5', 100, '10.00', 20),
('5E7F00084C934', '23213', 23, '32.00', 32),
('5E81DF2B7B8F7', '10000', 21, '21313.00', 20);

-- --------------------------------------------------------

--
-- Table structure for table `sales`
--

CREATE TABLE `sales` (
  `reciept_no` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL DEFAULT 0,
  `username` varchar(30) NOT NULL,
  `discount` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sales`
--

INSERT INTO `sales` (`reciept_no`, `customer_id`, `username`, `discount`, `total`, `date`) VALUES
(20, 16, 'admin', 0, 0, '2019-04-08 07:56:39'),
(21, 16, 'admin', 0, 0, '2019-04-08 12:29:27'),
(22, 16, 'admin', 0, 0, '2020-03-28 06:06:26'),
(23, 16, 'admin', 0, 0, '2020-03-28 06:07:27'),
(24, 16, 'admin', 0, 0, '2020-03-28 06:08:08'),
(25, 16, 'admin', 10, 0, '2020-03-28 06:14:46'),
(26, 16, 'admin', 10, 0, '2020-03-28 06:22:55'),
(27, 16, 'admin', 10, 2160, '2020-03-28 06:27:51'),
(28, 16, 'admin', 20, 1920, '2020-03-28 08:14:30'),
(29, 16, 'admin', 20, 4017, '2020-03-30 01:07:10');

-- --------------------------------------------------------

--
-- Table structure for table `sales_product`
--

CREATE TABLE `sales_product` (
  `reciept_no` int(11) NOT NULL,
  `product_id` varchar(20) NOT NULL,
  `price` decimal(18,2) NOT NULL,
  `qty` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sales_product`
--

INSERT INTO `sales_product` (`reciept_no`, `product_id`, `price`, `qty`) VALUES
(20, '1', '12.00', 10),
(20, '10011', '600.00', 2),
(21, '1', '12.00', 20),
(22, '10012', '2400.00', 1),
(23, '3', '6.60', 2),
(24, '10012', '2400.00', 1),
(25, '10012', '2400.00', 1),
(26, '10012', '2400.00', 1),
(27, '10012', '2400.00', 1),
(28, '10012', '2400.00', 1),
(29, '10012', '2400.00', 2),
(29, '4', '17.25', 3),
(29, '23213', '42.24', 4);

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

CREATE TABLE `supplier` (
  `supplier_id` int(11) NOT NULL,
  `company_name` varchar(30) DEFAULT NULL,
  `firstname` varchar(30) DEFAULT NULL,
  `lastname` varchar(30) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `contact_number` varchar(30) DEFAULT NULL,
  `image` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `supplier`
--

INSERT INTO `supplier` (`supplier_id`, `company_name`, `firstname`, `lastname`, `address`, `contact_number`, `image`) VALUES
(21, 'OrangeCompany', 'Oracle', 'LTD', 'USA', '+63(09)1234-1234', 'Internship-Web-Graphic-01.png'),
(22, 'BrandName', 'Bill', 'Joe', 'Africa', '+63(09)1234-1234', 'multi-user-icon.png');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `firstname` varchar(30) NOT NULL,
  `lastname` varchar(30) NOT NULL,
  `position` varchar(20) NOT NULL,
  `contact_number` varchar(30) NOT NULL,
  `image` varchar(30) NOT NULL,
  `password` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `firstname`, `lastname`, `position`, `contact_number`, `image`, `password`) VALUES
(7, 'admin', 'Juan', 'Cruz', 'admin', '+63(09)1234-1234', 'Myprofile.jpg', '21232f297a57a5a743894a0e4a801fc3'),
(13, 'user', 'Chris', 'Doe', 'Employee', '+63(09)1234-1234', 'men-in-black.png', md5('user'));

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cashflow`
--
ALTER TABLE `cashflow`
  ADD PRIMARY KEY (`transaction_id`),
  ADD KEY `username` (`username`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`customer_id`);

--
-- Indexes for table `delivery`
--
ALTER TABLE `delivery`
  ADD PRIMARY KEY (`transaction_no`),
  ADD KEY `supplier_id` (`supplier_id`),
  ADD KEY `username` (`username`);

--
-- Indexes for table `initial_products`
--
ALTER TABLE `initial_products`
  ADD KEY `id` (`id`);

--
-- Indexes for table `logs`
--
ALTER TABLE `logs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `username` (`username`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_no`);

--
-- Indexes for table `product_delivered`
--
ALTER TABLE `product_delivered`
  ADD KEY `product_id` (`product_id`),
  ADD KEY `transaction_no` (`transaction_no`);

--
-- Indexes for table `sales`
--
ALTER TABLE `sales`
  ADD PRIMARY KEY (`reciept_no`),
  ADD KEY `customer_id` (`customer_id`),
  ADD KEY `username` (`username`);

--
-- Indexes for table `sales_product`
--
ALTER TABLE `sales_product`
  ADD KEY `product_id` (`product_id`),
  ADD KEY `reciept_no` (`reciept_no`);

--
-- Indexes for table `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`supplier_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD UNIQUE KEY `user_id` (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cashflow`
--
ALTER TABLE `cashflow`
  MODIFY `transaction_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `customer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `logs`
--
ALTER TABLE `logs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=892;

--
-- AUTO_INCREMENT for table `sales`
--
ALTER TABLE `sales`
  MODIFY `reciept_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `sales_product`
--
ALTER TABLE `sales_product`
  MODIFY `reciept_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `supplier`
--
ALTER TABLE `supplier`
  MODIFY `supplier_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cashflow`
--
ALTER TABLE `cashflow`
  ADD CONSTRAINT `cashflow_ibfk_1` FOREIGN KEY (`username`) REFERENCES `users` (`username`);

--
-- Constraints for table `delivery`
--
ALTER TABLE `delivery`
  ADD CONSTRAINT `delivery_ibfk_1` FOREIGN KEY (`supplier_id`) REFERENCES `supplier` (`supplier_id`),
  ADD CONSTRAINT `delivery_ibfk_2` FOREIGN KEY (`username`) REFERENCES `users` (`username`);

--
-- Constraints for table `initial_products`
--
ALTER TABLE `initial_products`
  ADD CONSTRAINT `initial_products_ibfk_1` FOREIGN KEY (`id`) REFERENCES `products` (`product_no`);

--
-- Constraints for table `logs`
--
ALTER TABLE `logs`
  ADD CONSTRAINT `logs_ibfk_1` FOREIGN KEY (`username`) REFERENCES `users` (`username`);

--
-- Constraints for table `product_delivered`
--
ALTER TABLE `product_delivered`
  ADD CONSTRAINT `product_delivered_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `products` (`product_no`),
  ADD CONSTRAINT `product_delivered_ibfk_2` FOREIGN KEY (`transaction_no`) REFERENCES `delivery` (`transaction_no`);

--
-- Constraints for table `sales`
--
ALTER TABLE `sales`
  ADD CONSTRAINT `sales_ibfk_2` FOREIGN KEY (`customer_id`) REFERENCES `customer` (`customer_id`),
  ADD CONSTRAINT `sales_ibfk_3` FOREIGN KEY (`username`) REFERENCES `users` (`username`);

--
-- Constraints for table `sales_product`
--
ALTER TABLE `sales_product`
  ADD CONSTRAINT `sales_product_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `products` (`product_no`),
  ADD CONSTRAINT `sales_product_ibfk_3` FOREIGN KEY (`reciept_no`) REFERENCES `sales` (`reciept_no`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
