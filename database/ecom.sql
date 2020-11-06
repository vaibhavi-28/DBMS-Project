-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 06, 2020 at 08:04 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ecom`
--

-- --------------------------------------------------------

--
-- Table structure for table `address`
--

CREATE TABLE `address` (
  `customer_id` int(10) NOT NULL,
  `addressLine1` varchar(50) NOT NULL,
  `addressLine2` varchar(50) DEFAULT NULL,
  `country` varchar(20) NOT NULL,
  `city` varchar(20) NOT NULL,
  `statte` varchar(20) NOT NULL,
  `zipcode` int(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `address`
--

INSERT INTO `address` (`customer_id`, `addressLine1`, `addressLine2`, `country`, `city`, `statte`, `zipcode`) VALUES
(9, 'coep girls hostel', 'Shivaji Nagar', 'India', 'pune', 'Maharashtr', 411005),
(1, 'Sadguru Nagar', 'Main Road', 'India', 'Pandharpur', 'Maharashtr', 413304);

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(100) NOT NULL,
  `p_id` int(10) NOT NULL,
  `ip_add` varchar(250) NOT NULL,
  `user_id` int(10) NOT NULL,
  `qty` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `p_id`, `ip_add`, `user_id`, `qty`) VALUES
(11, 10007, '::1', 0, 1),
(12, 11422, '::1', 5, 1),
(13, 10007, '::1', 5, 1),
(14, 10003, '::1', 4, 1);

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `category_id` int(100) NOT NULL,
  `categoryName` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`category_id`, `categoryName`) VALUES
(10, 'Electronics'),
(11, 'Fashion'),
(12, 'Home Appliances');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `customer_id` int(100) NOT NULL,
  `person_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`customer_id`, `person_id`) VALUES
(1, 1),
(9, 9);

-- --------------------------------------------------------

--
-- Table structure for table `features`
--

CREATE TABLE `features` (
  `featureName` varchar(20) NOT NULL,
  `subcategory_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(10) NOT NULL,
  `orderDate` date NOT NULL,
  `orderQuantity` int(10) NOT NULL,
  `orderTotalCost` int(10) NOT NULL,
  `orderDiscount` int(10) NOT NULL,
  `orderStatus` varchar(25) NOT NULL,
  `customer_id` int(10) NOT NULL,
  `seller_id` int(10) NOT NULL,
  `addressLine1` varchar(50) NOT NULL,
  `addressLine2` varchar(50) NOT NULL,
  `country` varchar(10) NOT NULL,
  `city` varchar(10) NOT NULL,
  `statte` varchar(10) NOT NULL,
  `zipcode` int(6) NOT NULL,
  `product_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `orderDate`, `orderQuantity`, `orderTotalCost`, `orderDiscount`, `orderStatus`, `customer_id`, `seller_id`, `addressLine1`, `addressLine2`, `country`, `city`, `statte`, `zipcode`, `product_id`) VALUES
(1, '2020-11-01', 1, 12999, 4000, 'Success', 9, 1, 'coep girls hostel', '', 'India', 'pune', 'Maharashtr', 411005, 10001),
(2, '2020-11-01', 1, 999, 300, 'Success', 9, 1, 'coep girls hostel', '', 'India', 'pune', 'Maharashtr', 411005, 10001),
(3, '2020-11-01', 1, 999, 300, 'Success', 9, 1, 'coep girls hostel', '', 'India', 'pune', 'Maharashtr', 411005, 10001),
(4, '2020-11-01', 1, 799, 200, 'Success', 9, 1, 'coep girls hostel', '', 'India', 'pune', 'Maharashtr', 411005, 10001),
(5, '2020-11-01', 1, 12999, 4000, 'Success', 9, 1, 'coep girls hostel', '', 'India', 'pune', 'Maharashtr', 411005, 10001),
(6, '2020-11-01', 1, 12999, 4000, 'Success', 9, 1, 'coep girls hostel', '', 'India', 'pune', 'Maharashtr', 411005, 10001),
(7, '2020-11-01', 1, 12999, 4000, 'Success', 9, 1, 'coep girls hostel', '', 'India', 'pune', 'Maharashtr', 411005, 10001),
(8, '2020-11-01', 1, 12999, 4000, 'Success', 9, 1, 'coep girls hostel', '', 'India', 'pune', 'Maharashtr', 411005, 10001),
(9, '2020-11-01', 1, 12999, 4000, 'Success', 9, 1, 'coep girls hostel', '', 'India', 'pune', 'Maharashtr', 411005, 10001),
(10, '2020-11-06', 1, 12999, 2000, 'Success', 1, 1, '', '', '', '', '', 0, 10001),
(11, '2020-11-06', 1, 699, 50, 'Success', 9, 1, 'coep girls hostel', 'Shivaji Nagar', 'India', 'pune', 'Maharashtr', 411005, 10001),
(12, '2020-11-06', 1, 12999, 4000, 'Success', 1, 1, 'Sadguru Nagar', 'Main Road', 'India', 'Pandharpur', 'Maharashtr', 413304, 10001);

-- --------------------------------------------------------

--
-- Table structure for table `person`
--

CREATE TABLE `person` (
  `person_id` int(100) NOT NULL,
  `firstName` varchar(20) NOT NULL,
  `middleName` varchar(20) DEFAULT NULL,
  `lastName` varchar(20) NOT NULL,
  `mobileNo` decimal(10,0) NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(50) NOT NULL,
  `registrationDate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `person`
--

INSERT INTO `person` (`person_id`, `firstName`, `middleName`, `lastName`, `mobileNo`, `email`, `password`, `registrationDate`) VALUES
(1, 'Admin', 'Admin', 'Admin', '8237217213', 'siddheshkhadake@gmail.com', 'admin', '2020-11-01'),
(9, 'vaibhavi', 's', 'ghumare', '7387392017', 'vaibhavighumare28@gmail.com', '1', '2020-11-01');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `product_id` int(100) NOT NULL,
  `productTitle` varchar(50) NOT NULL,
  `productCost` int(100) NOT NULL,
  `productDiscount` int(100) DEFAULT NULL,
  `productActualCost` int(100) NOT NULL,
  `quantity` int(10) NOT NULL DEFAULT 20,
  `productImage` text NOT NULL,
  `seller_id` int(10) NOT NULL,
  `subcategory_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`product_id`, `productTitle`, `productCost`, `productDiscount`, `productActualCost`, `quantity`, `productImage`, `seller_id`, `subcategory_id`) VALUES
(10001, 'Mobile', 12999, 4000, 16999, 17, 'product01.jpg', 1, 100),
(10002, 'Mobile', 16999, 1000, 17999, 20, 'product02.jpg', 1, 100),
(10003, 'Mobile', 8999, 500, 9499, 20, 'product03.jpg', 1, 100),
(10004, 'Mobile', 17499, 3000, 20999, 20, 'product04.jpg', 1, 100),
(10005, 'Mobile', 49999, 5000, 54999, 20, 'product05.jpg', 1, 100),
(10006, 'Mobile', 26999, 3000, 29999, 20, 'product06.jpg', 1, 100),
(10007, 'iPhone', 89999, 10000, 99999, 20, 'product07.jpg', 1, 100),
(10008, 'Tabs', 20999, 6000, 26999, 20, 'product08.jpg', 1, 100),
(10009, 'Tabs', 9999, 1000, 10999, 20, 'product09.jpg', 1, 100),
(10101, 'Laptop', 42999, 2000, 44999, 20, 'product11.jpg', 1, 101),
(10102, 'Laptop', 32999, 4000, 36999, 20, 'product12.jpg', 1, 101),
(10103, 'Laptop', 22999, 5000, 27999, 20, 'product13.jpg', 1, 101),
(10104, 'Laptop', 52999, 4000, 56999, 20, 'product14.jpg', 1, 101),
(10105, 'Laptop', 72999, 6000, 78999, 20, 'product15.jpg', 1, 101),
(10106, 'Laptop', 62999, 3000, 65999, 20, 'product16.jpg', 1, 101),
(10107, 'Laptop', 12999, 4000, 16999, 20, 'product17.jpg', 1, 101),
(10201, 'Laptop', 12999, 2000, 14999, 19, 'product21.jpg', 1, 102),
(10202, 'Tabs', 19999, 5000, 24999, 20, 'product22.jpg', 1, 102),
(10203, 'Tabs', 14999, 4000, 18999, 20, 'product23.jpg', 1, 102),
(10204, 'Tabs', 42999, 10000, 52999, 20, 'product24.jpg', 1, 102),
(10301, 'Refrigerator', 29999, 5000, 34999, 20, 'product31.jpg', 1, 103),
(11401, 'Jeans', 1999, 400, 2399, 20, 'product41.jpg', 1, 114),
(11402, 'Jeans', 1499, 500, 1999, 20, 'product42.jpg', 1, 114),
(11403, 'Jeans', 999, 100, 1099, 20, 'product43.jpg', 1, 114),
(11404, 'Jeans', 699, 50, 749, 19, 'product44.jpg', 1, 114),
(11405, 'Shirt', 999, 200, 1199, 20, 'product45.jpg', 1, 114),
(11406, 'Jeans', 1299, 300, 1599, 20, 'product46.jpg', 1, 114),
(11407, 'Jeans', 1199, 300, 1499, 20, 'product47.jpg', 1, 114),
(11408, 'Jeans', 499, 50, 549, 20, 'product48.jpg', 1, 114),
(11409, 'Jeans', 799, 200, 999, 20, 'product49.jpg', 1, 114),
(11410, 'Jeans', 899, 100, 999, 20, 'product410.jpg', 1, 114),
(11411, 'Jeans', 899, 100, 999, 20, 'product411.jpg', 1, 114),
(11412, 'Jeans', 1999, 200, 2399, 20, 'product412.jpg', 1, 114),
(11413, 'Jeans', 999, 300, 1299, 20, 'product413.jpg', 1, 114),
(11414, 'Shirt', 249, 50, 299, 20, 'product414.jpg', 1, 114),
(11415, 'T-Shirt', 1999, 400, 2399, 20, 'product415.jpg', 1, 114),
(11416, 'T-Shirt', 699, 300, 999, 20, 'product416.jpg', 1, 114),
(11417, 'Shirt', 1999, 400, 2399, 20, 'product417.jpg', 1, 114),
(11418, 'Shirt', 1499, 500, 1999, 20, 'product418.jpg', 1, 114),
(11419, 'Shirt', 999, 400, 1399, 20, 'product419.jpg', 1, 114),
(11420, 'Shirt', 1999, 500, 2499, 20, 'product420.jpg', 1, 114),
(11421, 'Shirt', 1999, 400, 2399, 20, 'product421.jpg', 1, 114),
(11422, 'Shirt', 3499, 200, 3699, 20, 'product422.jpg', 1, 114),
(11423, 'Shirt', 3999, 100, 4099, 20, 'product423.jpg', 1, 114),
(11501, 'Onepiece', 1199, 300, 1499, 20, 'product51.jpg', 1, 115),
(11502, 'Onepiece', 999, 300, 1299, 20, 'product52.jpg', 1, 115),
(11503, 'Onepiece', 799, 200, 999, 20, 'product53.jpg', 1, 115),
(11504, 'Dress', 399, 100, 499, 20, 'product54.jpg', 1, 115),
(11505, 'Onepiece', 1199, 100, 1499, 20, 'product55.jpg', 1, 115),
(11506, 'Dress', 1199, 200, 1499, 20, 'product56.jpg', 1, 115),
(11507, 'Onepiece', 899, 100, 999, 20, 'product57.jpg', 1, 115),
(11508, 'Onepiece', 1199, 300, 1499, 20, 'product58.jpg', 1, 115),
(11509, 'Onepiece', 1299, 200, 1499, 20, 'product59.jpg', 1, 115),
(11510, 'Dress', 1499, 500, 1999, 20, 'product510.jpg', 1, 115),
(11511, 'Onepiece', 699, 300, 999, 20, 'product511.jpg', 1, 115),
(11512, 'Shirt', 1199, 300, 1499, 20, 'product512.jpg', 1, 115),
(11513, 'Shirt', 1199, 300, 1499, 20, 'product513.jpg', 1, 115),
(11514, 'Shirt', 399, 50, 349, 20, 'product514.jpg', 1, 115),
(11515, 'Shirt', 1199, 300, 1499, 20, 'product515.jpg', 1, 115),
(11516, 'Dress', 1249, 250, 1499, 20, 'product516.jpg', 1, 115),
(11517, 'Dress', 1199, 200, 1399, 20, 'product517.jpg', 1, 115),
(11518, 'Dress', 1199, 300, 1499, 20, 'product518.jpg', 1, 115),
(11519, 'Dress', 1149, 350, 1499, 20, 'product519.jpg', 1, 115),
(11520, 'Dress', 1149, 350, 1499, 20, 'product520.jpg', 1, 115),
(11601, 'Hells', 499, 100, 599, 20, 'product61.jpg', 1, 116),
(11602, 'Hells', 499, 100, 599, 20, 'product62.jpg', 1, 116),
(11603, 'Hells', 499, 50, 549, 20, 'product63.jpg', 1, 116),
(11604, 'Hells', 499, 50, 549, 20, 'product64.jpg', 1, 116),
(11605, 'Hells', 799, 200, 999, 20, 'product65.jpg', 1, 116),
(11606, 'Hells', 499, 300, 599, 20, 'product66.jpg', 1, 116),
(11607, 'Hells', 499, 100, 599, 20, 'product67.jpg', 1, 116),
(11608, 'Shoes', 499, 200, 699, 20, 'product68.jpg', 1, 116),
(11609, 'Shoes', 999, 100, 1099, 20, 'product69.jpg', 1, 116),
(11610, 'Shoes', 1299, 200, 1499, 20, 'product610.jpg', 1, 116),
(11611, 'Shoes', 899, 100, 999, 20, 'product611.jpg', 1, 116),
(11701, 'Watch', 899, 100, 999, 20, 'product71.jpg', 1, 117),
(11702, 'Watch', 899, 100, 999, 20, 'product72.jpg', 1, 117),
(11703, 'Watch', 899, 100, 999, 20, 'product73.jpg', 1, 117),
(11704, 'Watch', 899, 100, 999, 20, 'product74.jpg', 1, 117),
(11705, 'Watch', 899, 100, 999, 20, 'product75.jpg', 1, 117),
(11706, 'Watch', 899, 100, 999, 20, 'product76.jpg', 1, 117),
(12801, 'Furniture', 1899, 100, 1999, 20, 'product81.jpg', 1, 128),
(12802, 'Furniture', 2899, 500, 33999, 20, 'product82.jpg', 1, 128),
(12803, 'Furniture', 1699, 300, 1999, 20, 'product83.jpg', 1, 128),
(12804, 'Furniture', 1299, 200, 1499, 20, 'product84.jpg', 1, 128),
(12805, 'Furniture', 2899, 100, 999, 20, 'product85.jpg', 1, 128),
(12901, 'Mixer', 899, 100, 999, 20, 'product91.jpg', 1, 129),
(12902, 'Mixer', 899, 100, 999, 20, 'product92.jpg', 1, 129),
(12903, 'New Laptop', 18000, 2000, 20000, 20, 'Nick_Fury_featured.png', 1, 101);

-- --------------------------------------------------------

--
-- Table structure for table `productfeatures`
--

CREATE TABLE `productfeatures` (
  `featureValue` varchar(10) NOT NULL,
  `product_id` int(10) NOT NULL,
  `featureName` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `seller`
--

CREATE TABLE `seller` (
  `seller_id` int(100) NOT NULL,
  `person_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `seller`
--

INSERT INTO `seller` (`seller_id`, `person_id`) VALUES
(1, 1),
(9, 9);

-- --------------------------------------------------------

--
-- Table structure for table `subcategory`
--

CREATE TABLE `subcategory` (
  `subcategory_id` int(100) NOT NULL,
  `subcategoryName` varchar(20) NOT NULL,
  `category_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subcategory`
--

INSERT INTO `subcategory` (`subcategory_id`, `subcategoryName`, `category_id`) VALUES
(100, 'Mobiles', 10),
(101, 'Laptops', 10),
(102, 'Tabs', 10),
(103, 'Refrigerators', 10),
(114, 'Mens Wear', 11),
(115, 'Womens Wear', 11),
(116, 'Footware', 11),
(117, 'Watches', 11),
(128, 'farnicure', 12),
(129, 'Cookware', 12);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `address`
--
ALTER TABLE `address`
  ADD KEY `customer_id` (`customer_id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`customer_id`),
  ADD KEY `person_id` (`person_id`);

--
-- Indexes for table `features`
--
ALTER TABLE `features`
  ADD PRIMARY KEY (`featureName`),
  ADD KEY `subcategory_id` (`subcategory_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `customer_id` (`customer_id`),
  ADD KEY `seller_id` (`seller_id`);

--
-- Indexes for table `person`
--
ALTER TABLE `person`
  ADD PRIMARY KEY (`person_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`product_id`),
  ADD KEY `seller_id` (`seller_id`),
  ADD KEY `subcategory_id` (`subcategory_id`);

--
-- Indexes for table `productfeatures`
--
ALTER TABLE `productfeatures`
  ADD KEY `product_id` (`product_id`),
  ADD KEY `featureName` (`featureName`);

--
-- Indexes for table `seller`
--
ALTER TABLE `seller`
  ADD PRIMARY KEY (`seller_id`),
  ADD KEY `person_id` (`person_id`);

--
-- Indexes for table `subcategory`
--
ALTER TABLE `subcategory`
  ADD PRIMARY KEY (`subcategory_id`),
  ADD KEY `category_id` (`category_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `category_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `customer_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `person`
--
ALTER TABLE `person`
  MODIFY `person_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `product_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12904;

--
-- AUTO_INCREMENT for table `seller`
--
ALTER TABLE `seller`
  MODIFY `seller_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `subcategory`
--
ALTER TABLE `subcategory`
  MODIFY `subcategory_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=130;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `address`
--
ALTER TABLE `address`
  ADD CONSTRAINT `customer_id` FOREIGN KEY (`customer_id`) REFERENCES `customer` (`customer_id`);

--
-- Constraints for table `customer`
--
ALTER TABLE `customer`
  ADD CONSTRAINT `person_id` FOREIGN KEY (`person_id`) REFERENCES `person` (`person_id`);

--
-- Constraints for table `features`
--
ALTER TABLE `features`
  ADD CONSTRAINT `subcategory_id` FOREIGN KEY (`subcategory_id`) REFERENCES `subcategory` (`subcategory_id`);

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `customer` (`customer_id`),
  ADD CONSTRAINT `seller_id` FOREIGN KEY (`seller_id`) REFERENCES `seller` (`seller_id`);

--
-- Constraints for table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `seller` FOREIGN KEY (`seller_id`) REFERENCES `seller` (`seller_id`),
  ADD CONSTRAINT `subcat` FOREIGN KEY (`subcategory_id`) REFERENCES `subcategory` (`subcategory_id`);

--
-- Constraints for table `productfeatures`
--
ALTER TABLE `productfeatures`
  ADD CONSTRAINT `featureName` FOREIGN KEY (`featureName`) REFERENCES `features` (`featureName`),
  ADD CONSTRAINT `product_id` FOREIGN KEY (`product_id`) REFERENCES `product` (`product_id`);

--
-- Constraints for table `seller`
--
ALTER TABLE `seller`
  ADD CONSTRAINT `seller_ibfk_1` FOREIGN KEY (`person_id`) REFERENCES `person` (`person_id`);

--
-- Constraints for table `subcategory`
--
ALTER TABLE `subcategory`
  ADD CONSTRAINT `category_id` FOREIGN KEY (`category_id`) REFERENCES `category` (`category_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
