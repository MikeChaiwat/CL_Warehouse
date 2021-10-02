-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 27, 2020 at 03:12 PM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.3.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `php_project`
--
CREATE DATABASE IF NOT EXISTS `php_project` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `php_project`;

-- --------------------------------------------------------

--
-- Table structure for table `exportproduct`
--

DROP TABLE IF EXISTS `exportproduct`;
CREATE TABLE IF NOT EXISTS `exportproduct` (
  `export_id` int(11) NOT NULL AUTO_INCREMENT,
  `product_id` int(11) NOT NULL,
  `export_qty` int(11) NOT NULL,
  `time` date NOT NULL,
  `warehouse_id` int(11) NOT NULL,
  PRIMARY KEY (`export_id`)
) ENGINE=InnoDB AUTO_INCREMENT=59 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `exportproduct`
--

INSERT INTO `exportproduct` (`export_id`, `product_id`, `export_qty`, `time`, `warehouse_id`) VALUES
(1, 1, 5, '2020-02-01', 1),
(2, 7, 5, '2020-01-11', 2),
(3, 1, 1, '2020-02-01', 2),
(4, 4, 10, '2020-12-24', 1),
(5, 1, 5, '2020-01-02', 1),
(6, 2, 10, '2020-02-05', 2),
(7, 3, 15, '2020-03-10', 1),
(8, 4, 20, '2020-04-13', 2),
(9, 5, 25, '2020-05-17', 1),
(10, 6, 30, '2020-06-20', 2),
(11, 7, 35, '2020-07-24', 1),
(12, 8, 40, '2020-08-27', 2),
(13, 9, 45, '2020-09-30', 1),
(14, 10, 50, '2020-11-03', 2),
(15, 11, 5, '2020-12-07', 1),
(16, 12, 10, '2020-10-10', 2),
(17, 13, 15, '2020-01-03', 1),
(18, 14, 20, '2020-02-05', 2),
(19, 15, 25, '2020-03-09', 1),
(20, 16, 30, '2020-04-11', 2),
(21, 17, 35, '2020-05-14', 1),
(22, 18, 40, '2020-06-16', 2),
(23, 19, 45, '2020-07-19', 1),
(24, 20, 50, '2020-08-21', 2),
(25, 21, 5, '2020-09-23', 1),
(26, 22, 10, '2020-10-26', 2),
(27, 23, 15, '2020-11-28', 1),
(28, 24, 20, '2020-12-31', 2),
(29, 25, 25, '2020-11-28', 1),
(30, 26, 30, '2020-12-31', 2),
(31, 27, 35, '2020-01-03', 1),
(32, 28, 40, '2020-02-05', 2),
(33, 29, 45, '2020-03-09', 1),
(34, 30, 50, '2020-04-11', 2),
(35, 31, 5, '2020-05-14', 1),
(36, 32, 10, '2020-06-16', 2),
(37, 33, 15, '2020-07-19', 1),
(38, 34, 20, '2020-08-21', 2),
(39, 35, 25, '2020-09-23', 1),
(40, 36, 30, '2020-10-26', 2),
(41, 37, 35, '2020-11-28', 1),
(42, 38, 40, '2020-12-31', 2),
(43, 39, 45, '2020-11-28', 1),
(44, 40, 50, '2020-12-31', 2),
(45, 41, 5, '2020-01-03', 1),
(46, 42, 10, '2020-02-05', 2),
(47, 43, 15, '2020-03-09', 1),
(48, 44, 20, '2020-04-11', 2),
(49, 45, 25, '2020-05-14', 1),
(50, 46, 30, '2020-06-16', 2),
(51, 47, 35, '2020-07-19', 1),
(52, 0, 0, '0000-00-00', 0),
(53, 0, 0, '0000-00-00', 0),
(54, 0, 0, '0000-00-00', 0),
(55, 0, 0, '0000-00-00', 0),
(56, 0, 0, '0000-00-00', 0),
(57, 0, 0, '0000-00-00', 0),
(58, 0, 0, '0000-00-00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

DROP TABLE IF EXISTS `product`;
CREATE TABLE IF NOT EXISTS `product` (
  `product_id` int(11) NOT NULL AUTO_INCREMENT,
  `product_name` varchar(50) NOT NULL,
  `product_qty` int(11) NOT NULL,
  `time` date NOT NULL,
  `type_id` int(11) NOT NULL,
  `warehouse_id` int(11) NOT NULL,
  PRIMARY KEY (`product_id`)
) ENGINE=InnoDB AUTO_INCREMENT=55 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`product_id`, `product_name`, `product_qty`, `time`, `type_id`, `warehouse_id`) VALUES
(1, 'Milk-A', 40, '2020-12-30', 1, 1),
(2, 'Coffee-A', 30, '2020-01-15', 1, 1),
(3, 'Tea-A', 20, '2020-02-01', 1, 1),
(4, 'Milk-B', 10, '2020-03-02', 1, 2),
(5, 'Coffee-B', 23, '2020-04-03', 1, 2),
(6, 'Tea-B', 54, '2020-05-04', 1, 2),
(7, 'Milk-C', 66, '2020-06-05', 1, 3),
(8, 'Coffee-C', 79, '2020-07-06', 1, 3),
(9, 'Tea-C', 80, '2020-08-07', 1, 3),
(10, 'Milk-D', 90, '2020-09-08', 1, 4),
(11, 'Coffee-D', 100, '2020-10-09', 1, 4),
(12, 'Tea-D', 80, '2020-01-10', 1, 4),
(13, 'Shirt-A', 40, '2020-01-11', 2, 1),
(14, 'Dress-A', 55, '2020-02-12', 2, 3),
(15, 'Suit-A', 80, '2020-03-13', 2, 2),
(16, 'Shirt-B', 20, '2020-04-14', 2, 4),
(17, 'Dress-B', 30, '2020-05-15', 2, 2),
(18, 'Suit-B', 25, '2020-06-16', 2, 3),
(19, 'Shirt-C', 80, '2020-07-17', 2, 4),
(20, 'Dress-C', 90, '2020-08-18', 2, 2),
(21, 'Suit-C', 200, '2020-09-19', 2, 3),
(22, 'Shirt-D', 150, '2020-10-20', 2, 1),
(23, 'Dress-D', 80, '2020-11-21', 2, 4),
(24, 'Suit-D', 70, '2020-12-22', 2, 2),
(25, 'Nike-A', 60, '2020-01-01', 3, 1),
(26, 'Adidas-A', 50, '2020-02-02', 3, 4),
(27, 'Puma-A', 70, '2020-03-05', 3, 3),
(28, 'Nike-B', 40, '2020-04-06', 3, 2),
(29, 'Adidas-B', 60, '2020-05-08', 3, 4),
(30, 'Puma-B', 100, '2020-06-09', 3, 3),
(31, 'Nike-C', 120, '2020-07-11', 3, 2),
(32, 'Adidas-C', 140, '2020-08-12', 3, 4),
(33, 'Puma-C', 15, '2020-09-13', 3, 3),
(34, 'Nike-D', 20, '2020-10-15', 3, 4),
(35, 'Adidas-D', 30, '2020-11-16', 3, 1),
(36, 'Puma-D', 45, '2020-12-18', 3, 1),
(37, 'Math-A', 55, '2020-01-03', 4, 1),
(38, 'Science-A', 65, '2020-02-04', 4, 3),
(39, 'Eng-A', 75, '2020-03-07', 4, 4),
(40, 'Math-B', 80, '2020-04-08', 4, 2),
(41, 'Science-B', 90, '2020-05-10', 4, 4),
(42, 'Eng-B', 40, '2020-06-11', 4, 2),
(43, 'Math-C', 35, '2020-07-13', 4, 3),
(44, 'Science-C', 25, '2020-08-14', 4, 1),
(45, 'Eng-C', 10, '2020-09-15', 4, 4),
(46, 'Math-D', 80, '2020-10-17', 4, 2),
(47, 'Science-D', 155, '2020-11-18', 4, 3),
(48, 'Eng-D', 125, '2020-12-20', 4, 4),
(49, 'Art-a', 50, '2020-02-27', 4, 1),
(50, 'TEST', 200, '2020-05-07', 4, 1),
(51, 'test2', 200, '2020-06-18', 4, 1),
(52, '7UP', 25, '2020-07-01', 1, 1),
(53, 'LOL', 100, '2020-08-05', 4, 1),
(54, 'test', 200, '2020-07-16', 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `typeproduct`
--

DROP TABLE IF EXISTS `typeproduct`;
CREATE TABLE IF NOT EXISTS `typeproduct` (
  `type_id` int(11) NOT NULL AUTO_INCREMENT,
  `type_name` varchar(50) NOT NULL,
  PRIMARY KEY (`type_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `typeproduct`
--

INSERT INTO `typeproduct` (`type_id`, `type_name`) VALUES
(1, 'เครื่องดื่ม'),
(2, 'เสื้อผ้า'),
(3, 'รองเท้า'),
(4, 'หนังสือ');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `userid` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(40) NOT NULL,
  `password` varchar(40) NOT NULL,
  `email` varchar(50) NOT NULL,
  PRIMARY KEY (`userid`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`userid`, `username`, `password`, `email`) VALUES
(1, 'admin', 'mike', 'test_admin@hotmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `warehouse`
--

DROP TABLE IF EXISTS `warehouse`;
CREATE TABLE IF NOT EXISTS `warehouse` (
  `warehouse_id` int(11) NOT NULL AUTO_INCREMENT,
  `warehouse_name` varchar(50) NOT NULL,
  `warehouse_place` varchar(50) NOT NULL,
  `warehouse_image` varchar(50) NOT NULL,
  `warehouse_detail` varchar(100) NOT NULL,
  `warehouse_used` int(11) NOT NULL,
  `warehouse_max` int(11) NOT NULL,
  `zone_id` int(11) NOT NULL,
  PRIMARY KEY (`warehouse_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `warehouse`
--

INSERT INTO `warehouse` (`warehouse_id`, `warehouse_name`, `warehouse_place`, `warehouse_image`, `warehouse_detail`, `warehouse_used`, `warehouse_max`, `zone_id`) VALUES
(1, 'Star Platinum Warehouse', '11/22 Bangkok', 'Warehouse-5e57c12f264a6.jpg', 'ora ora ora ora ora ora ora ora ora ora ora ora ora ora ora ora ora ora !!!', 725, 2000, 1);

-- --------------------------------------------------------

--
-- Table structure for table `zone`
--

DROP TABLE IF EXISTS `zone`;
CREATE TABLE IF NOT EXISTS `zone` (
  `zone_id` int(11) NOT NULL AUTO_INCREMENT,
  `zone_name` varchar(40) NOT NULL,
  PRIMARY KEY (`zone_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `zone`
--

INSERT INTO `zone` (`zone_id`, `zone_name`) VALUES
(1, 'ภาคกลาง'),
(2, 'ภาคตะวันออก'),
(3, 'ภาคใต้'),
(4, 'ภาคเหนือ');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
