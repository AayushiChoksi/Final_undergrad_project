-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 18, 2023 at 01:29 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `style_sanctuary`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_user`
--

CREATE TABLE `admin_user` (
  `id` int(11) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `mobile_number` varchar(15) NOT NULL,
  `PASSWORD` varchar(255) DEFAULT NULL,
  `account_creation_time` datetime NOT NULL,
  `OTP` varchar(255) NOT NULL,
  `code` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin_user`
--

INSERT INTO `admin_user` (`id`, `first_name`, `last_name`, `email`, `mobile_number`, `PASSWORD`, `account_creation_time`, `OTP`, `code`) VALUES
(1, 'brijesh', 'chauhan', 'bchauhan772002@gmail.com', '9824114166', 'Brijesh@12345', '2023-01-24 09:53:36', '642103', ''),
(2, 'Sagar', 'Patel', 'itssagarpatel18@gmail.com', '9754716531', 'Admin@123', '2023-04-03 15:40:48', '867316', '8c798cebf196cf85e20989a2ee7d6a97');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `item_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `customer_id` varchar(10) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`item_id`, `product_id`, `customer_id`, `quantity`) VALUES
(2, 4, '6', 4);

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `customer_id` int(11) NOT NULL,
  `first_name` text NOT NULL,
  `last_name` text NOT NULL,
  `email` text NOT NULL,
  `mobile_number` varchar(255) NOT NULL,
  `password` text NOT NULL,
  `shipping_address` text NOT NULL,
  `is_expired` int(10) DEFAULT NULL,
  `creation_time` timestamp NOT NULL DEFAULT current_timestamp(),
  `otp` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`customer_id`, `first_name`, `last_name`, `email`, `mobile_number`, `password`, `shipping_address`, `is_expired`, `creation_time`, `otp`) VALUES
(2, 'deepak', 'singh', 'deepak19@gmail.com', 'IiABCoRa+b7tMmfcJY3ejQ==', 'Qk3WPx5SQ/DaEFdzNP9aDw==', 'Ahmedabad', NULL, '2023-04-03 06:16:39', NULL),
(3, 'deepak', 'patel', 'deepakpatel@gmail.com', 'bqTqBNFttxNlcxF42agPfA==', '8nJcX9D7+RBlPkTMV/7wwg==', 'Ahmedabad', NULL, '2023-04-03 06:17:43', NULL),
(4, 'Brijesh', 'Chauhan', 'bchauhan772002@gmail.com', 'JxskI6pSB2VsucVAqkHfWA==', '8nJcX9D7+RBlPkTMV/7wwg==', 'Ahmedabad', 1, '2023-04-03 09:15:44', '141812'),
(6, 'Sagar', 'Patel', 'itssagarpatel18@gmail.com', 'Oml0cNvohIwfmp8YMw/UaA==', '1mPVaB4ycgPiLStVOzIhsw==', 'A-12,Askar Society, Near Rajsuya Bunglows, Gota ', 1, '2023-04-18 11:01:13', '276251');

-- --------------------------------------------------------

--
-- Table structure for table `customer_logs`
--

CREATE TABLE `customer_logs` (
  `customer_id` int(11) NOT NULL,
  `log_message` varchar(255) NOT NULL,
  `log_level` varchar(255) NOT NULL,
  `log_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `customer_logs`
--

INSERT INTO `customer_logs` (`customer_id`, `log_message`, `log_level`, `log_date`) VALUES
(6, 'Invalid Login by user - itssagarpatel18@gmail.com', 'ERROR', '2023-04-18 16:10:38'),
(6, 'Invalid Login by user - itssagarpatel18@gmail.com', 'ERROR', '2023-04-18 16:10:58'),
(6, 'Successfully Login by user itssagarpatel18@gmail.com', 'LOGIN', '2023-04-18 12:41:34'),
(6, 'Customer itssagarpatel18@gmail.com Added to Cart Successfully ', 'ADD', '2023-04-18 12:41:42'),
(6, 'Customer itssagarpatel18@gmail.com Added to Cart Successfully ', 'ADD', '2023-04-18 12:41:46'),
(6, 'Cart Updated by user itssagarpatel18@gmail.com Successfully', 'UPDATE', '2023-04-18 12:41:52'),
(6, 'Cart Updated by user itssagarpatel18@gmail.com Successfully', 'UPDATE', '2023-04-18 12:41:56'),
(6, 'Product Deleted by user itssagarpatel18@gmail.com from Cart', 'DELETE', '2023-04-18 12:41:57'),
(6, 'User itssagarpatel18@gmail.com successfully logout ', 'LOGOUT', '2023-04-18 12:42:09'),
(6, 'Successfully Login by user itssagarpatel18@gmail.com', 'LOGIN', '2023-04-18 13:01:30'),
(6, 'User itssagarpatel18@gmail.com Ordered Successfully', 'ORDERED', '2023-04-18 13:17:09'),
(6, 'User itssagarpatel18@gmail.com Ordered Successfully', 'ORDERED', '2023-04-18 13:22:00'),
(6, 'User itssagarpatel18@gmail.com Added to Cart Successfully ', 'ADD', '2023-04-18 13:24:00'),
(6, 'User itssagarpatel18@gmail.com Added to Cart Successfully ', 'ADD', '2023-04-18 13:24:04'),
(6, 'Cart Updated by user itssagarpatel18@gmail.com Successfully', 'UPDATE', '2023-04-18 13:24:10'),
(6, 'Cart Updated by user itssagarpatel18@gmail.com Successfully', 'UPDATE', '2023-04-18 13:24:14'),
(6, 'Product Deleted by user itssagarpatel18@gmail.com from Cart', 'DELETE', '2023-04-18 13:24:15'),
(6, 'Cart Updated by user itssagarpatel18@gmail.com Successfully', 'UPDATE', '2023-04-18 13:26:43');

-- --------------------------------------------------------

--
-- Table structure for table `employee_user`
--

CREATE TABLE `employee_user` (
  `id` int(11) NOT NULL,
  `first_name` varchar(30) NOT NULL,
  `last_name` varchar(30) NOT NULL,
  `email` varchar(70) NOT NULL,
  `mobile_number` varchar(255) NOT NULL,
  `PASSWORD` varchar(70) NOT NULL,
  `account_creation_time` datetime NOT NULL DEFAULT current_timestamp(),
  `emp_role` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `employee_user`
--

INSERT INTO `employee_user` (`id`, `first_name`, `last_name`, `email`, `mobile_number`, `PASSWORD`, `account_creation_time`, `emp_role`) VALUES
(1, 'Brijesh', 'Chauhan', 'bchauhan77202@gmail.com', 'IiABCoRa+b7tMmfcJY3ejQ==', '8nJcX9D7+RBlPkTMV/7wwg==', '2023-04-03 11:37:28', 'support department'),
(2, 'vidhan', 'pancholi', 'vpancholi@gmail.com', 'BjRAxVJL7RKGD8pvoB60WQ==', '8nJcX9D7+RBlPkTMV/7wwg==', '2023-04-03 11:37:56', 'support department'),
(5, 'ajey', 'nager', 'agajnager12@gmail.com', 'yic11SMwk1NmovprRZEtGg==', '8nJcX9D7+RBlPkTMV/7wwg==', '2023-04-03 11:39:04', 'support department'),
(6, 'deepak', 'singh', 'deepak19@gmail.com', 'yJUBne5jYfpre24q3vWDrw==', 'HfmJqlhiKyKk87JkOc3k0Q==', '2023-04-03 11:39:53', 'support department'),
(7, 'raju', 'ram', 'ramraju@gmail.com', 'I+JuREiEyuFQVOBOD4Nd0A==', 'v2oVKMv81o6p9fgUV2ZAhg==', '2023-04-03 11:40:42', 'support department'),
(8, 'bheem', 'chota', 'bheem@gmail.com', 'SoM3OfgVRI9aYtTJUrltaw==', '8nJcX9D7+RBlPkTMV/7wwg==', '2023-04-03 11:41:15', 'management department'),
(9, 'Tony', 'stark', 'tonystark@gmail.com', 'tkoiQFiiq5y+gdaCJ5r5Ig==', 'GK2KXcqhyqQkKC4v3Tn7EA==', '2023-04-03 11:42:22', 'support department'),
(10, 'iron', 'man', 'ironman@gmail.com', '4Jw7NbzRl3qdsREFZyn/yQ==', '8nJcX9D7+RBlPkTMV/7wwg==', '2023-04-03 11:42:50', 'support department'),
(11, 'Shiva', 'Deva', 'shiv@gmail.com', 'bUbbSNqD13Cx50UpUduJCg==', '3TiKXMNKeexdovlNUv6mFQ==', '2023-04-03 11:43:56', 'management department'),
(12, 'Aayushi', 'choxi', 'aayushi19@gnu.ac.in', 'StsCiEFGWq3f1J8SJPVqfQ==', 'gYvioZJk6tZfDkmri0pMrw==', '2023-04-03 11:44:28', 'management department'),
(13, 'kashyap', 'Chauhan', 'kashyap@gmail.com', 'cxdzBsXQbDfexQg1f86ODQ==', 'Bkx5JLVIPruEXqOpOao8WQ==', '2023-04-03 11:51:57', 'support department');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `customer_id` int(11) DEFAULT NULL,
  `first_name` varchar(255) DEFAULT NULL,
  `last_name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `mobile_no` varchar(12) DEFAULT NULL,
  `shipping_address` varchar(255) DEFAULT NULL,
  `billing_address` varchar(255) DEFAULT NULL,
  `country` varchar(255) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `state` varchar(255) DEFAULT NULL,
  `zip` varchar(255) DEFAULT NULL,
  `order_total` varchar(255) DEFAULT NULL,
  `order_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `customer_id`, `first_name`, `last_name`, `email`, `mobile_no`, `shipping_address`, `billing_address`, `country`, `city`, `state`, `zip`, `order_total`, `order_date`, `status`) VALUES
(138, 1, 'brijesh', 'Chauhan', 'bchauhan772002@gmail.com', '9824114166', '44,abc flats ,opp bcd town, Ahmedabad', '444', 'India', 'ahmedabad', 'Gujarat', '3800002', '4960', '2023-04-07 08:55:05', 'PENDING'),
(147, 6, 'Sagar', 'Patel', 'vampire66@mt2015.com', '9038735476', 'A-205,Kumkum Nagar,Temple,Gota', 'A-205,Kumkum Nagar,Temple,Gota', 'India', 'Ahmedabad', 'GUJARAT', '', '1957', '2023-04-17 16:55:24', 'Pending');

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

CREATE TABLE `order_items` (
  `order_item_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `payment_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `amount` decimal(10,0) NOT NULL,
  `payment_method` text NOT NULL,
  `payment_status` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`payment_id`, `order_id`, `customer_id`, `amount`, `payment_method`, `payment_status`) VALUES
(47, 137, 8, '160', 'Credit/Debit Card', 'DONE'),
(48, 138, 1, '4960', 'Credit/Debit Card', 'DONE'),
(49, 140, 5, '2260', '', 'DONE'),
(51, 141, 5, '4560', 'UPI/Paytm', 'DONE'),
(52, 142, 5, '4560', 'UPI/Paytm', 'DONE'),
(56, 141, 5, '160', '', 'DONE'),
(57, 142, 5, '160', '', 'DONE'),
(58, 143, 5, '160', '', 'DONE'),
(59, 144, 5, '160', '', 'DONE'),
(60, 145, 6, '2260', 'Net Banking', 'DONE'),
(61, 145, 6, '1358', 'Credit/Debit Card', 'DONE'),
(62, 146, 6, '1358', 'Credit/Debit Card', 'DONE'),
(63, 146, 6, '1957', 'Credit/Debit Card', 'DONE'),
(64, 147, 6, '1957', 'Credit/Debit Card', 'DONE'),
(65, 147, 6, '2960', 'Net Banking', 'DONE'),
(66, 148, 6, '2960', 'Net Banking', 'DONE'),
(67, 147, 6, '2960', 'Net Banking', 'DONE'),
(68, 149, 6, '2960', 'Net Banking', 'DONE');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `product_id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `description` varchar(100) DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `product_keyword` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `category` varchar(100) DEFAULT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `status` varchar(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`product_id`, `name`, `description`, `price`, `product_keyword`, `image`, `category`, `date`, `status`) VALUES
(1, 'Mens Kurta', 'Extraordinary Kurtas with homemade designs', 300, 'mens kurta, kurta, design kurta, men\'s kurta, men kurta, mens kurtas, kurtas, design kurtas, men\'s kurtas, men kurtas, fashion kurta , designer kurtas, designer kurta', 'product_images/kurta.jpg', 'mens', '2023-03-05 10:42:42', 'true'),
(2, 'Cotton Jeans', 'Made With 100% Denim', 700, 'cotton jeans, mens jeans, jeans, men\'s jeans, denim jeans, ', 'product_images/jeans.jpg', 'mens', '2023-03-05 10:44:46', 'true'),
(4, 'T-Shirt', '100% Cotton. Inspired by NCS Music ', 599, 'tshirt, t-shirt ,t shirt, designer tshirt, T-Shirt,T-shirt,TSHIRT,TShirt,Tshirt', 'product_images/tshirt.jpg', 'mens', '2023-03-28 10:06:55', 'true'),
(5, 'Shirt', 'Comfortable, casual and made from 100% cotton', 799, 'Shirt,shirt,design shirt,mens-shirt,mens Shirt,mens shirt', 'product_images/shirt.jpg', 'mens', '2023-03-28 12:20:19', 'true'),
(6, 'Jacket', 'Sportive and Multifunctional Jacket', 1200, 'Jacket,jacket,mens-jacket,mens jacket', 'product_images/jacket.jpg', 'mens', '2023-03-28 13:24:55', 'true'),
(7, 'Dress', 'Created with special touch of design', 3000, 'Dress,dress,women dress,Women Dress,dresses,Dresses', 'product_images/dress.jpg', 'womens', '2023-03-28 14:49:21', 'true'),
(8, 'Saree', 'Classy, sensuous and versatile clothes', 2000, 'Saree,saree,women-saree,Women-saree,sarees,Sarees,Design-Saree', 'product_images/saree.jpg', 'womens', '2023-03-28 14:57:15', 'true'),
(9, 'Cotton Pant', 'Cotton Pant that paired with any style of tops. 100% Cotton', 900, 'Pants,Women-Pants,pants,pant,Pant,Women-pant,Cotton-pant', 'product_images/women_pant.jpg', 'womens', '2023-03-28 15:16:41', 'true'),
(10, 'Skirt', 'Designed in satin which skims the body, this skirt from Paul Costelloe has a timeless animal print.', 3500, 'skirt,Skirt,Women-Skirt,Women-skirt,women-skirt', 'product_images/skirt.jpg', 'womens', '2023-03-28 15:31:00', 'true'),
(11, 'V-Neck Top', 'Floral Print Fancy Top with comfortable Movements', 800, 'Top,top,Tops,tops,Womens-tops-Womens-Tops', 'product_images/top.jpg', 'womens', '2023-03-28 15:40:10', 'true');

-- --------------------------------------------------------

--
-- Table structure for table `user_logs`
--

CREATE TABLE `user_logs` (
  `id` int(11) NOT NULL,
  `Role` varchar(20) NOT NULL,
  `log_message` text NOT NULL,
  `log_level` varchar(20) NOT NULL,
  `log_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_logs`
--

INSERT INTO `user_logs` (`id`, `Role`, `log_message`, `log_level`, `log_date`) VALUES
(1, 'Employee', 'User Named bchauhan77202@gmail.com  has been successfully created', 'Create', '2023-04-03 08:07:29'),
(2, 'Employee', 'User Named vpancholi@gmail.com  has been successfully created', 'Create', '2023-04-03 08:07:56'),
(3, 'Employee', 'An Error Duplicate entry \'BjRAxVJL7RKGD8pvoB60WQ==\' for key \'mobile_number\' occure while creating ajey@gmail.com profile', 'ERROR', '2023-04-03 08:08:15'),
(4, 'Employee', 'An Error Duplicate entry \'IiABCoRa+b7tMmfcJY3ejQ==\' for key \'mobile_number\' occure while creating agajnager12@gmail.com profile', 'ERROR', '2023-04-03 08:08:40'),
(5, 'Employee', 'User Named agajnager12@gmail.com  has been successfully created', 'Create', '2023-04-03 08:09:04'),
(6, 'Employee', 'User Named deepak19@gmail.com  has been successfully created', 'Create', '2023-04-03 08:09:53'),
(7, 'Employee', 'User Named ramraju@gmail.com  has been successfully created', 'Create', '2023-04-03 08:10:42'),
(8, 'Employee', 'User Named bheem@gmail.com  has been successfully created', 'Create', '2023-04-03 08:11:15'),
(9, 'Employee', 'User Named tonystark@gmail.com  has been successfully created', 'Create', '2023-04-03 08:12:22'),
(10, 'Employee', 'User Named ironman@gmail.com  has been successfully created', 'Create', '2023-04-03 08:12:50'),
(11, 'Employee', 'User Named shiv@gmail.com  has been successfully created', 'Create', '2023-04-03 08:13:56'),
(12, 'Employee', 'User Named aayushi19@gnu.ac.in  has been successfully created', 'Create', '2023-04-03 08:14:29'),
(13, 'User', 'User Named bchauhan772002@gmail.com  has been successfully created', 'Create', '2023-04-03 08:14:59'),
(14, 'User', 'User Named deepak19@gmail.com  has been successfully created', 'Create', '2023-04-03 08:16:40'),
(15, 'User', 'User Named deepakpatel@gmail.com  has been successfully created', 'Create', '2023-04-03 08:17:43'),
(16, 'Employee', 'User Named kashyap@gmail.com  has been successfully created', 'Create', '2023-04-03 08:21:57'),
(17, 'User', 'User Named bchauhan772002@gmail.com  has been successfully created', 'Create', '2023-04-03 11:14:57');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_user`
--
ALTER TABLE `admin_user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `mobile_number` (`mobile_number`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`item_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`customer_id`);

--
-- Indexes for table `employee_user`
--
ALTER TABLE `employee_user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `mobile_number` (`mobile_number`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`order_item_id`),
  ADD KEY `order_id` (`order_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`payment_id`),
  ADD KEY `order_id` (`order_id`),
  ADD KEY `customer_id` (`customer_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `user_logs`
--
ALTER TABLE `user_logs`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_user`
--
ALTER TABLE `admin_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `item_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `customer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `employee_user`
--
ALTER TABLE `employee_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=150;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `payment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `user_logs`
--
ALTER TABLE `user_logs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
