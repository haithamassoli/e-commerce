-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 04, 2021 at 09:12 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 7.3.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `e_commerce`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `admin_id` int(11) NOT NULL,
  `admin_name` varchar(255) NOT NULL,
  `admin_email` varchar(255) NOT NULL,
  `admin_password` varchar(255) NOT NULL,
  `admin_type` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`admin_id`, `admin_name`, `admin_email`, `admin_password`, `admin_type`) VALUES
(1, 'Sarah', 'sara_hab@gmail.com', '12345', 0),
(2, 'Donaldsa', 'sara.ahabash@gmail.com', '7777', 0);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(255) NOT NULL,
  `category_description` varchar(255) DEFAULT NULL,
  `category_image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`category_id`, `category_name`, `category_description`, `category_image`) VALUES
(1, 'women', NULL, 'images/banner-01.jpg'),
(2, 'Men', NULL, 'images/banner-02.jpg'),
(3, 'Accessories', NULL, 'images/banner-03.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `comment_id` int(11) NOT NULL,
  `comment` varchar(255) NOT NULL,
  `comment_image` varchar(255) DEFAULT NULL,
  `comment_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `comment_product_id` int(11) NOT NULL,
  `comment_user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int(11) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `product_description` varchar(255) NOT NULL,
  `product_price` varchar(255) NOT NULL,
  `product_quantity` int(11) NOT NULL,
  `product_rate` int(11) DEFAULT NULL,
  `product_main_image` varchar(255) NOT NULL,
  `product_desc_image_1` varchar(255) DEFAULT NULL,
  `product_desc_image_2` varchar(255) DEFAULT NULL,
  `product_desc_image_3` varchar(255) DEFAULT NULL,
  `product_tag` varchar(255) NOT NULL,
  `product_categorie_id` int(11) NOT NULL,
  `product_nd_color_image` varchar(255) DEFAULT NULL,
  `product_thd_color_image` varchar(255) DEFAULT NULL,
  `product_fourth_color_image` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `product_name`, `product_description`, `product_price`, `product_quantity`, `product_rate`, `product_main_image`, `product_desc_image_1`, `product_desc_image_2`, `product_desc_image_3`, `product_tag`, `product_categorie_id`, `product_nd_color_image`, `product_thd_color_image`, `product_fourth_color_image`) VALUES
(45, 'sara', 'wwwwww', '3', 77, 0, '../admin/uploads/61abbd25a42aegallery-06.jpg', '../admin/uploads/61abbd25a42d8gallery-02.jpg', '../admin/uploads/61abbd25a42dfgallery-08.jpg', '../admin/uploads/61abbd25a42e3gallery-01.jpg', 'sssss', 2, NULL, NULL, NULL),
(46, 'sara', 'wwwwww', '3', 66, 0, '../admin/uploads/61abbd5bb9401banner-05.jpg', '../admin/uploads/61abbd5bb9411product-02.jpg', '../admin/uploads/61abbd5bb9417gallery-07.jpg', '../admin/uploads/61abbd5bb941cgallery-05.jpg', 'style', 2, NULL, NULL, NULL),
(47, 'adeeb', 'wwwwww', '22', 55, NULL, '../admin/uploads/61abbe307db44banner-06.jpg', '../admin/uploads/61abbe307db51banner-06.jpg', '../admin/uploads/61abbe307db56banner-06.jpg', '../admin/uploads/61abbe307db5bbanner-06.jpg', 'style', 2, NULL, NULL, NULL),
(48, 'ttttttttt', 'rrrrrrrrrrggggggggg', '99', 300, 0, '../admin/uploads/61abc0a25866dgallery-07.jpg', '../admin/uploads/61abc0a25867egallery-06.jpg', '../admin/uploads/61abc0a258684blog-01.jpg', '../admin/uploads/61abc0a25868agallery-04.jpg', 'stylish', 3, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `user_password` varchar(255) NOT NULL,
  `user_mobile` int(14) DEFAULT NULL,
  `user_location` varchar(255) DEFAULT NULL,
  `user_image` varchar(255) NOT NULL,
  `user_gender` varchar(255) NOT NULL,
  `user_creation_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_name`, `user_email`, `user_password`, `user_mobile`, `user_location`, `user_image`, `user_gender`, `user_creation_date`) VALUES
(2, 'ali', 'ali@gmail.com', 'Aa123456', NULL, NULL, 'uploads/61a96980bfe2fdiscord.png', 'male', '2021-12-03 00:49:04');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`comment_id`),
  ADD KEY `comment_user` (`comment_user_id`),
  ADD KEY `comment_product` (`comment_product_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`),
  ADD KEY `product_category` (`product_categorie_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `user_email` (`user_email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `comment_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comment_product` FOREIGN KEY (`comment_product_id`) REFERENCES `products` (`product_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `comment_user` FOREIGN KEY (`comment_user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `product_category` FOREIGN KEY (`product_categorie_id`) REFERENCES `categories` (`category_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
