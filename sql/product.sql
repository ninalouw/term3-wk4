-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Oct 01, 2017 at 07:56 AM
-- Server version: 5.6.35
-- PHP Version: 7.0.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `yoga_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `product_tb`
--

CREATE TABLE `product_tb` (
  `product_id` int(11) NOT NULL,
  `title` varchar(20) NOT NULL,
  `image` text NOT NULL,
  `price` int(11) NOT NULL,
  `category_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `product_tb`
--

INSERT INTO `product_tb` (`product_id`, `title`, `image`, `price`, `category_id`) VALUES
(1, 'Yoga Top', '../img/top-1.jpeg', 76, 1),
(2, 'Workout Top', 'img/top-2.jpeg', 56, 1),
(3, 'Tank Top', 'img/top-3.jpeg', 65, 1),
(4, 'T-Shirt Top', 'img/top-4.jpeg', 58, 1),
(5, 'Wrap Top', 'img/top-5.jpeg', 45, 1),
(6, 'Yoga Pants', 'img/pants-1.jpeg', 87, 2),
(7, 'Stretch Pants', 'img/pants-2.jpeg', 77, 2),
(8, 'Sweat Pants', 'img/pants-3.jpeg', 67, 2),
(9, 'Patterned Pants', 'img/pants-4.jpeg', 89, 2),
(10, 'Yoga S Pants', 'img/pants-5.jpeg', 90, 2),
(11, 'Yoga Towel', 'img/towel-1.jpeg', 45, 3),
(12, 'Exercise Bag', 'img/bag-1.jpeg', 120, 3),
(13, 'Water Bottle', 'img/bottle-1.jpeg', 23, 3),
(14, 'Water Cooler', 'img/bottle-3.jpeg', 44, 3),
(15, 'Yoga Bag', 'img/bag-2.jpeg', 98, 3),
(16, 'Sports Bra', 'img/bra-1.jpeg', 53, 4),
(17, 'Patterned Bra', 'img/bra-2.jpeg', 54, 4),
(18, 'Yoga Bra', 'img/bra-3.jpeg', 59, 4),
(19, 'Stretch Bra', 'img/bra-4.jpeg', 54, 4),
(20, 'Cross Bra', 'img/bra-5.jpeg', 58, 4),
(21, 'Yoga Mat', 'img/mat-1.jpeg', 45, 5),
(22, 'Stretch Mat', 'img/mat-2.jpeg', 44, 5),
(23, 'Roll Mat', 'img/mat-3.jpeg', 43, 5),
(24, 'Feel Mat', 'img/mat-4.jpeg', 34, 5),
(27, 'Wonder Bag', '../img/bag-3.jpeg', 78, 3),
(29, 'Gray Bag', '../img/bag-1.jpeg', 99, 3),
(30, 'Spec Bra', '../img/bra-6.jpeg', 45, 4),
(31, 'Pink Top', '../img/top-6.jpeg', 67, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `product_tb`
--
ALTER TABLE `product_tb`
  ADD PRIMARY KEY (`product_id`),
  ADD KEY `category_id` (`category_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `product_tb`
--
ALTER TABLE `product_tb`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `product_tb`
--
ALTER TABLE `product_tb`
  ADD CONSTRAINT `fk_category_id` FOREIGN KEY (`category_id`) REFERENCES `category_tb` (`category_id`) ON DELETE CASCADE ON UPDATE CASCADE;