-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 15, 2018 at 07:10 AM
-- Server version: 10.1.35-MariaDB
-- PHP Version: 7.2.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ecommerce`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `username` varchar(20) NOT NULL,
  `password` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`username`, `password`) VALUES
('Dip', '21232f297a57a5a743894a0e4a801fc3');

-- --------------------------------------------------------

--
-- Table structure for table `billto`
--

CREATE TABLE `billto` (
  `bill_id` int(10) UNSIGNED NOT NULL,
  `bill_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bill_email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bill_addr` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bill_phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `billto`
--

INSERT INTO `billto` (`bill_id`, `bill_name`, `bill_email`, `bill_addr`, `bill_phone`, `created_at`, `updated_at`) VALUES
(9, 'Dipankar Saha', 'sahadipankar1059@gmail.com', 'dhaka', '01963265687', NULL, NULL),
(10, 'Johny', 'admin@ahdah', 'Khulna', '0196326568', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `brand`
--

CREATE TABLE `brand` (
  `brand_id` int(10) UNSIGNED NOT NULL,
  `brand_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `brand_des` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `brand_pub_stat` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `brand`
--

INSERT INTO `brand` (`brand_id`, `brand_name`, `brand_des`, `brand_pub_stat`, `created_at`, `updated_at`) VALUES
(1, 'Nike', 'This is Nike', 1, '2018-10-08 08:48:45', NULL),
(2, 'Lotto', 'This is Lotto', 1, '2018-10-08 08:50:13', NULL),
(3, 'adidas', 'This is adidas', 1, '2018-10-08 08:52:48', NULL),
(4, 'Apple', 'This is Apple', 1, '2018-10-08 08:54:42', NULL),
(5, 'SAMSUNG', 'This is SAMSUNG', 1, '2018-10-08 08:55:16', NULL),
(6, 'CA', 'Sports Brand', 1, '2018-10-09 08:42:30', NULL),
(7, 'SS', 'Sports Brand', 1, '2018-10-09 08:42:43', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `cat_id` int(10) UNSIGNED NOT NULL,
  `cat_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cat_des` varchar(4000) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cat_pub_stat` int(2) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`cat_id`, `cat_name`, `cat_des`, `cat_pub_stat`, `created_at`, `updated_at`) VALUES
(1, 'Men', 'This is not only for Men.', 1, '2018-10-07 08:19:19', NULL),
(2, 'Women', 'This is for Women Special.', 1, '2018-10-07 08:19:38', NULL),
(3, 'Children', 'This is for Children.', 1, '2018-10-07 16:24:12', NULL),
(4, 'Sports', 'This is Sports', 1, '2018-10-08 07:58:20', NULL),
(6, 'Electronics', 'This is Electronics', 1, '2018-10-08 08:00:08', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `cus_id` int(10) UNSIGNED NOT NULL,
  `cus_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cus_email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cus_pass` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cus_phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`cus_id`, `cus_name`, `cus_email`, `cus_pass`, `cus_phone`, `created_at`, `updated_at`) VALUES
(10, 'Dipankar Saha', 'sahadipankar1059@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', '01963265687', NULL, NULL),
(11, 'Johny', 'admin@ahdah', '21232f297a57a5a743894a0e4a801fc3', '0196326568', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2018_10_06_120714_create_category_table', 1),
(2, '2018_10_08_082717_create_brand_table', 2),
(3, '2018_10_08_092407_create_product_table', 3),
(4, '2018_10_14_164059_create_customer_table', 4),
(5, '2018_10_14_171059_create_billto_table', 5),
(6, '2018_10_14_174012_create_payment_table', 6),
(7, '2018_10_14_182610_create_order_table', 7),
(8, '2018_10_14_182634_create_order_details_table', 7);

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE `order` (
  `ord_id` int(10) UNSIGNED NOT NULL,
  `cus_id` int(11) NOT NULL,
  `bill_id` int(11) NOT NULL,
  `pay_id` int(11) NOT NULL,
  `ord_total` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ord_status` int(2) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order`
--

INSERT INTO `order` (`ord_id`, `cus_id`, `bill_id`, `pay_id`, `ord_total`, `ord_status`, `created_at`, `updated_at`) VALUES
(9, 10, 9, 8, '3,000.00', 0, NULL, NULL),
(10, 11, 10, 9, '3,500.00', 0, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE `order_details` (
  `ords_id` int(10) UNSIGNED NOT NULL,
  `ord_id` int(11) NOT NULL,
  `pro_id` int(11) NOT NULL,
  `pro_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pro_price` double(8,2) NOT NULL,
  `pro_qty` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_details`
--

INSERT INTO `order_details` (`ords_id`, `ord_id`, `pro_id`, `pro_name`, `pro_price`, `pro_qty`, `created_at`, `updated_at`) VALUES
(5, 9, 37, 'Polo Shirt', 500.00, 2, NULL, NULL),
(6, 9, 41, 'White Shoe', 2000.00, 1, NULL, NULL),
(7, 10, 49, 'Badminton Bat', 1500.00, 1, NULL, NULL),
(8, 10, 50, 'Cricket Bat', 2000.00, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `pay_id` int(10) UNSIGNED NOT NULL,
  `pay_method` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pay_status` int(2) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`pay_id`, `pay_method`, `pay_status`, `created_at`, `updated_at`) VALUES
(8, 'handcash', 0, '2018-10-15 03:53:46', NULL),
(9, 'handcash', 0, '2018-10-15 03:55:17', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `pro_id` int(10) UNSIGNED NOT NULL,
  `cat_id` int(11) NOT NULL,
  `brand_id` int(11) NOT NULL,
  `pro_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pro_des` longtext COLLATE utf8mb4_unicode_ci,
  `pro_price` double(8,2) NOT NULL,
  `pro_size` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pro_color` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pro_pub_stat` int(11) DEFAULT NULL,
  `pro_img` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`pro_id`, `cat_id`, `brand_id`, `pro_name`, `pro_des`, `pro_price`, `pro_size`, `pro_color`, `pro_pub_stat`, `pro_img`, `created_at`, `updated_at`) VALUES
(33, 6, 4, 'iPhone 7 plus', 'This is iPhone 7 plus', 89950.00, '5 inch', 'Black', 1, 'User/images/products/MTBfZCD4bKnBd414vvE1.jpg', '2018-10-09 06:10:40', NULL),
(34, 6, 5, 'Laptop', 'This is SAMSUNG\'s Laptop', 55500.00, '12 into 15 inch', 'Silver', 1, 'User/images/products/EPkfynTFb8Df0tbe47Sp.jpg', '2018-10-09 06:12:57', NULL),
(36, 2, 2, 'Ladies Pant', 'This is a Pant for Ladies', 1000.00, 'Free Size', 'Brown', 1, 'User/images/products/IB5ZV9kwMC8Bn8shHNgR.jpg', '2018-10-09 06:38:19', NULL),
(37, 1, 3, 'Polo Shirt', 'This is a Polo Shirt for Men from adidas brand', 500.00, 'Free Size', 'Blue', 1, 'User/images/products/odv94yF71fKqpe6w9Q3M.jpg', '2018-10-09 07:15:37', NULL),
(38, 2, 2, 'Top', 'Top for Women', 1500.00, 'Free Size', 'Orange', 1, 'User/images/products/due8ZF9FBgdRtWY1zid9.jpg', '2018-10-09 08:16:39', NULL),
(39, 2, 2, 'Top', 'Top for Women.', 1500.00, 'Free Size', 'Pink', 1, 'User/images/products/Wtuzgv6m1ZSEMHRIGhQv.jpg', '2018-10-09 08:17:48', NULL),
(41, 1, 3, 'White Shoe', 'Shoe for Men.', 2000.00, 'Free Size', 'White', 1, 'User/images/products/QUFKHnsqamcDaqwJJ7hS.jpg', '2018-10-09 08:20:38', NULL),
(42, 2, 1, 'Shoe', 'Shoe for Women', 2000.00, 'Free Size', 'Pink', 1, 'User/images/products/gdaIAdhDh4hKfzX8bo8g.jpg', '2018-10-09 08:21:22', NULL),
(43, 2, 1, 'High Heel', 'Shoe for Women', 2000.00, 'Free Size', 'Black', 1, 'User/images/products/ybVwRrLJuCKGiN1kjGqH.jpg', '2018-10-09 08:22:18', NULL),
(44, 3, 2, 'Girl\'s dress', 'Dress for Baby girls.', 1500.00, 'Free Size', 'Pink', 1, 'User/images/products/Cy4Qq00PhZpOJa3bocqA.jpg', '2018-10-09 08:24:20', NULL),
(45, 3, 2, 'Boy\'s Dress', 'Dress for Baby boys.', 2000.00, 'Free Size', 'As shown in the picture', 1, 'User/images/products/Zo6252YqX8IpCoMKVHmZ.jpg', '2018-10-09 08:26:20', NULL),
(46, 1, 1, 'Pant', 'Pant for men.', 1000.00, 'Free Size', 'Chocolate', 1, 'User/images/products/y2pdf6MtekfMF7bPhMQz.jpg', '2018-10-09 08:28:17', NULL),
(47, 1, 3, 'Trouser', 'Trousers for Men.', 800.00, 'Free Size', 'Ash', 1, 'User/images/products/rt7xHDKUB04uXjL3p4K1.jpg', '2018-10-09 08:30:01', NULL),
(48, 2, 1, 'Ladies Pant', 'Pant for Ladies', 1000.00, 'Free Size', 'black bluish', 1, 'User/images/products/1wo4kRto3jS7bd1UCeLx.jpg', '2018-10-09 08:31:50', NULL),
(49, 4, 3, 'Badminton Bat', 'Badminton Bat from adidas brand.', 1500.00, '2ft 5inch', 'As shown in the picture', 1, 'User/images/products/tpqFT6JBCwNxY8IaXNjx.jpg', '2018-10-09 08:41:46', NULL),
(50, 4, 6, 'Cricket Bat', 'Cricket Bat from CA brand.', 2000.00, '2.5ft', 'As shown in the picture', 1, 'User/images/products/MScuNaQtW4NWfVM8jli2.jpg', '2018-10-09 08:43:48', NULL),
(51, 4, 7, 'Cricket Bat', 'Cricket Bat from SS brand.', 2000.00, '2.5ft', 'As shown in the picture', 1, 'User/images/products/MA9H8Tuhc6iFJ8JEeqwS.jpg', '2018-10-09 08:44:46', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `billto`
--
ALTER TABLE `billto`
  ADD PRIMARY KEY (`bill_id`);

--
-- Indexes for table `brand`
--
ALTER TABLE `brand`
  ADD PRIMARY KEY (`brand_id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`cus_id`),
  ADD UNIQUE KEY `cus_email` (`cus_email`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`ord_id`);

--
-- Indexes for table `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`ords_id`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`pay_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`pro_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `billto`
--
ALTER TABLE `billto`
  MODIFY `bill_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `brand`
--
ALTER TABLE `brand`
  MODIFY `brand_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `cat_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `cus_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `order`
--
ALTER TABLE `order`
  MODIFY `ord_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `order_details`
--
ALTER TABLE `order_details`
  MODIFY `ords_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `pay_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `pro_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
