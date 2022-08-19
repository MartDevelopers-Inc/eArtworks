-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Aug 19, 2022 at 09:01 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `eArtworks`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `category_id` int(200) NOT NULL,
  `category_code` varchar(200) NOT NULL,
  `category_name` varchar(200) NOT NULL,
  `category_details` longtext NOT NULL,
  `category_delete_status` int(5) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `mailer_settings`
--

CREATE TABLE `mailer_settings` (
  `mailer_id` int(200) NOT NULL,
  `mail_host` varchar(200) NOT NULL,
  `mail_port` varchar(200) NOT NULL,
  `mail_protocol` varchar(200) NOT NULL,
  `mail_username` varchar(200) NOT NULL,
  `mail_password` varchar(200) NOT NULL,
  `mail_from_name` varchar(200) NOT NULL,
  `mail_from_email` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(200) NOT NULL,
  `order_user_id` int(200) NOT NULL,
  `order_product_id` int(200) NOT NULL,
  `order_code` varchar(200) NOT NULL,
  `order_date` varchar(200) NOT NULL,
  `order_qty` varchar(200) NOT NULL,
  `order_cost` varchar(200) NOT NULL,
  `order_status` varchar(200) NOT NULL,
  `order_payment_status` varchar(200) NOT NULL,
  `order_delete_status` int(5) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `payment_id` int(200) NOT NULL,
  `payment_order_id` int(200) NOT NULL,
  `payment_means_id` int(200) NOT NULL,
  `payment_amount` varchar(200) NOT NULL,
  `payment_ref_code` varchar(200) NOT NULL,
  `payment_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `payment_delete_status` int(5) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `payment_means`
--

CREATE TABLE `payment_means` (
  `means_id` int(200) NOT NULL,
  `means_code` varchar(200) NOT NULL,
  `means_name` varchar(200) NOT NULL,
  `means_delete_status` int(5) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int(200) NOT NULL,
  `product_category_id` int(200) NOT NULL,
  `product_seller_id` int(200) NOT NULL,
  `product_sku_code` varchar(200) NOT NULL,
  `product_name` varchar(200) NOT NULL,
  `product_details` longtext NOT NULL,
  `product_qty_in_stock` varchar(200) NOT NULL,
  `product_price` varchar(200) NOT NULL,
  `product_delete_status` int(5) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `stores`
--

CREATE TABLE `stores` (
  `store_id` int(200) NOT NULL,
  `store_user_id` int(200) NOT NULL,
  `store_name` varchar(200) NOT NULL,
  `store_address` longtext NOT NULL,
  `store_status` varchar(200) NOT NULL,
  `store_delete_status` int(5) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `thirdparty_apis`
--

CREATE TABLE `thirdparty_apis` (
  `api_id` int(200) NOT NULL,
  `api_name` varchar(200) NOT NULL,
  `api_identification` longtext NOT NULL,
  `api_token` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(200) NOT NULL,
  `user_first_name` varchar(200) NOT NULL,
  `user_last_name` varchar(200) NOT NULL,
  `user_email` varchar(200) NOT NULL,
  `user_dob` varchar(200) NOT NULL,
  `user_phone_number` varchar(200) NOT NULL,
  `user_default_address` longtext NOT NULL,
  `user_password` varchar(200) NOT NULL,
  `user_password_reset_token` varchar(200) DEFAULT NULL,
  `user_email_status` varchar(200) NOT NULL DEFAULT 'Pending',
  `user_account_status` varchar(200) NOT NULL DEFAULT 'Active',
  `user_profile_picture` longtext DEFAULT NULL,
  `user_date_joined` timestamp NOT NULL DEFAULT current_timestamp(),
  `user_access_level` varchar(200) NOT NULL,
  `user_delete_status` int(5) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_first_name`, `user_last_name`, `user_email`, `user_dob`, `user_phone_number`, `user_default_address`, `user_password`, `user_password_reset_token`, `user_email_status`, `user_account_status`, `user_profile_picture`, `user_date_joined`, `user_access_level`, `user_delete_status`) VALUES
(1, 'Martin', 'Mbithi', 'martinezmbithi@gmail.com', '1998-07-13', '0737229776', '120 Kikima', '', NULL, 'Pending', 'Active', NULL, '2022-08-19 06:51:39', 'Customer', 0),
(2, 'Martin', 'Mbithi', 'martinezmbithi@gmail.com', '2022-08-19', '08-6675-776579', '120 Kikima', 'a69681bcf334ae130217fea4505fd3c994f5683f', NULL, 'Pending', 'Active', NULL, '2022-08-19 06:52:45', 'Customer', 0),
(3, 'Maet', 'gbsefd', 'martdevelopers254@gmail.com', '2022-08-19', 'gdfgcv', '120 kikima', 'a69681bcf334ae130217fea4505fd3c994f5683f', NULL, 'Pending', 'Active', NULL, '2022-08-19 06:56:12', 'Customer', 0);

-- --------------------------------------------------------

--
-- Table structure for table `wishlists`
--

CREATE TABLE `wishlists` (
  `wishlist_id` int(200) NOT NULL,
  `wishlist_user_id` int(200) NOT NULL,
  `wishlist_product_id` int(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `mailer_settings`
--
ALTER TABLE `mailer_settings`
  ADD PRIMARY KEY (`mailer_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `Order User ID` (`order_user_id`),
  ADD KEY `Order Product ID` (`order_product_id`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`payment_id`),
  ADD KEY `Payment Order ID` (`payment_order_id`),
  ADD KEY `Payment Means ID` (`payment_means_id`);

--
-- Indexes for table `payment_means`
--
ALTER TABLE `payment_means`
  ADD PRIMARY KEY (`means_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`),
  ADD KEY `Product Category ID` (`product_category_id`),
  ADD KEY `Product Seller ID` (`product_seller_id`);

--
-- Indexes for table `stores`
--
ALTER TABLE `stores`
  ADD PRIMARY KEY (`store_id`),
  ADD KEY `Store Owner ID` (`store_user_id`);

--
-- Indexes for table `thirdparty_apis`
--
ALTER TABLE `thirdparty_apis`
  ADD PRIMARY KEY (`api_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `wishlists`
--
ALTER TABLE `wishlists`
  ADD PRIMARY KEY (`wishlist_id`),
  ADD KEY `WishList User ID` (`wishlist_user_id`),
  ADD KEY `Wishlist Product ID` (`wishlist_product_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `category_id` int(200) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `mailer_settings`
--
ALTER TABLE `mailer_settings`
  MODIFY `mailer_id` int(200) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(200) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `payment_id` int(200) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `payment_means`
--
ALTER TABLE `payment_means`
  MODIFY `means_id` int(200) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(200) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `stores`
--
ALTER TABLE `stores`
  MODIFY `store_id` int(200) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `thirdparty_apis`
--
ALTER TABLE `thirdparty_apis`
  MODIFY `api_id` int(200) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `wishlists`
--
ALTER TABLE `wishlists`
  MODIFY `wishlist_id` int(200) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `Order Product ID` FOREIGN KEY (`order_product_id`) REFERENCES `products` (`product_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `Order User ID` FOREIGN KEY (`order_user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `payments`
--
ALTER TABLE `payments`
  ADD CONSTRAINT `Payment Means ID` FOREIGN KEY (`payment_means_id`) REFERENCES `payment_means` (`means_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `Payment Order ID` FOREIGN KEY (`payment_order_id`) REFERENCES `orders` (`order_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `Product Category ID` FOREIGN KEY (`product_category_id`) REFERENCES `categories` (`category_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `Product Seller ID` FOREIGN KEY (`product_seller_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `stores`
--
ALTER TABLE `stores`
  ADD CONSTRAINT `Store Owner ID` FOREIGN KEY (`store_user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `wishlists`
--
ALTER TABLE `wishlists`
  ADD CONSTRAINT `WishList User ID` FOREIGN KEY (`wishlist_user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `Wishlist Product ID` FOREIGN KEY (`wishlist_product_id`) REFERENCES `products` (`product_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
