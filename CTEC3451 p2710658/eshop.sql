-- Active: 1668230978777@@127.0.0.1@3306@world
-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- 主机： 127.0.0.1
-- 生成日期： 2023-04-11 08:22:09
-- 服务器版本： 10.4.27-MariaDB
-- PHP 版本： 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 数据库： `eshop`
--

-- --------------------------------------------------------

--
-- 表的结构 `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- 表的结构 `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `order_number` varchar(50) DEFAULT NULL,
  `delivery_or_not` tinyint(1) DEFAULT NULL,
  `whether_to_pay` tinyint(1) DEFAULT NULL,
  `total_amount` decimal(10,2) DEFAULT NULL,
  `shipping_time` datetime DEFAULT NULL,
  `submission_time` datetime DEFAULT NULL,
  `user_information` int(11) DEFAULT NULL,
  `product_information` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- 表的结构 `products`
--

CREATE TABLE `products` (
  `product_id` int(11) NOT NULL,
  `product_images` text DEFAULT NULL,
  `number_of_item_remaining` int(11) DEFAULT NULL,
  `total_number_of_products` int(11) DEFAULT NULL,
  `product_prices` decimal(10,2) DEFAULT NULL,
  `product_description` text DEFAULT NULL,
  `product_name` varchar(255) DEFAULT NULL,
  `product_range` enum('home_decor','furniture','lighting','home_accents','rugs','outdoors','holidays','gifts_events') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- 转存表中的数据 `products`
--

INSERT INTO `products` (`product_id`, `product_images`, `number_of_item_remaining`, `total_number_of_products`, `product_prices`, `product_description`, `product_name`, `product_range`) VALUES
(1, 'img/product1.jpg', 50, 100, '19.99', 'Beautiful and comfortable chair.', 'Comfortable Chair', 'furniture'),
(2, 'img/product2.jpg', 30, 50, '299.99', 'Stylish wooden table.', 'Wooden Table', 'furniture'),
(3, 'img/product3.jpg', 10, 20, '99.99', 'Modern floor lamp.', 'Floor Lamp', 'lighting'),
(4, 'img/product4.jpg', 20, 30, '49.99', 'Decorative wall clock.', 'Wall Clock', ''),
(5, 'img/product5.jpg', 40, 80, '129.99', 'Elegant mirror with a wooden frame.', 'Wooden Mirror', ''),
(6, 'img/product6.jpg', 15, 30, '59.99', 'Cozy and soft area rug.', 'Area Rug', 'rugs'),
(7, 'img/product7.jpg', 25, 50, '199.99', 'Outdoor patio set with table and chairs.', 'Patio Set', 'outdoors'),
(8, 'img/product8.jpg', 5, 10, '399.99', 'Modern and stylish sofa.', 'Modern Sofa', 'furniture'),
(9, 'img/product9.jpg', 20, 40, '89.99', 'Decorative table lamp.', 'Table Lamp', 'lighting'),
(10, 'img/product10.jpg', 10, 20, '69.99', 'Elegant and modern chandelier.', 'Chandelier', 'lighting'),
(11, 'img/product11.jpg', 35, 70, '79.99', 'Stylish bookshelf.', 'Bookshelf', 'furniture'),
(12, 'img/product12.jpg', 30, 60, '159.99', 'Outdoor fire pit for patio.', 'Fire Pit', 'outdoors'),
(13, 'img/product13.jpg', 40, 80, '29.99', 'Decorative throw pillow.', 'Throw Pillow', ''),
(14, 'img/product14.jpg', 50, 100, '199.99', 'Elegant and comfortable office chair.', 'Office Chair', 'furniture'),
(15, 'img/product15.jpg', 25, 50, '149.99', 'Cozy and modern armchair.', 'Modern Armchair', 'furniture'),
(16, 'img/product16.jpg', 45, 90, '39.99', 'Beautiful jewelry.', 'Jewelry', ''),
(17, 'img/product17.jpg', 20, 40, '249.99', 'Stylish furniture item.', 'Furniture', 'furniture'),
(18, 'img/product18.jpg', 60, 120, '15.99', 'High-quality makeup.', 'Makeup', ''),
(19, 'img/product19.jpg', 30, 60, '79.99', 'Reliable sport equipment.', 'Sport Equipment', '');

-- --------------------------------------------------------

--
-- 表的结构 `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `address` text DEFAULT NULL,
  `phone_number` varchar(15) DEFAULT NULL,
  `gender` enum('male','female','other') DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- 转存表中的数据 `users`
--

INSERT INTO `users` (`id`, `email`, `address`, `phone_number`, `gender`, `name`, `password`, `username`) VALUES
(12203743, 'jlianxm@163.com', 'NULL', '1800000000', 'male', 'echop', 'abc123', 'dx1'),
(12203745, 'dx2@qq.com', NULL, NULL, NULL, 'dx2', '123456789', 'dx2'),
(12203746, 'dx3@hotmail.com', NULL, NULL, NULL, 'dx3', '123456789', 'dx3');

--
-- 转储表的索引
--

--
-- 表的索引 `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `product_id` (`product_id`);

--
-- 表的索引 `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `user_information` (`user_information`),
  ADD KEY `product_information` (`product_information`);

--
-- 表的索引 `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);

--
-- 表的索引 `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `username` (`username`);

--
-- 在导出的表使用AUTO_INCREMENT
--

--
-- 使用表AUTO_INCREMENT `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- 使用表AUTO_INCREMENT `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- 使用表AUTO_INCREMENT `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- 使用表AUTO_INCREMENT `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12203747;

--
-- 限制导出的表
--

--
-- 限制表 `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `cart_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `products` (`product_id`);

--
-- 限制表 `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`user_information`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `orders_ibfk_2` FOREIGN KEY (`product_information`) REFERENCES `products` (`product_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
