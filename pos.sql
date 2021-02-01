-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Feb 01, 2021 at 06:42 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pos`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_customer`
--

CREATE TABLE `tb_customer` (
  `id_customer` int(11) NOT NULL,
  `name` varchar(128) NOT NULL,
  `gender` enum('L','P') NOT NULL,
  `phone` varchar(128) NOT NULL,
  `address` text NOT NULL,
  `created` datetime NOT NULL DEFAULT current_timestamp(),
  `updated` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_customer`
--

INSERT INTO `tb_customer` (`id_customer`, `name`, `gender`, `phone`, `address`, `created`, `updated`) VALUES
(1, 'Bambang', 'L', '085123456781', 'Pakishaji, Malang', '2021-01-28 19:39:52', '2021-01-28 13:45:00'),
(2, 'Lina', 'P', '085987654321', 'Kepanjen, Malang', '2021-01-28 19:44:10', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tb_product_category`
--

CREATE TABLE `tb_product_category` (
  `id_category` int(11) NOT NULL,
  `name` varchar(128) NOT NULL,
  `created` datetime NOT NULL DEFAULT current_timestamp(),
  `updated` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_product_category`
--

INSERT INTO `tb_product_category` (`id_category`, `name`, `created`, `updated`) VALUES
(7, 'Ekonomi', '2021-01-30 15:07:33', NULL),
(8, 'Non Ekonomi', '2021-01-30 15:08:38', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tb_product_item`
--

CREATE TABLE `tb_product_item` (
  `id_item` int(11) NOT NULL,
  `barcode` varchar(128) DEFAULT NULL,
  `name` varchar(128) DEFAULT NULL,
  `category_id` int(11) NOT NULL,
  `unit_id` int(11) NOT NULL,
  `price` int(11) DEFAULT NULL,
  `stock` int(10) NOT NULL DEFAULT 0,
  `image` varchar(128) DEFAULT NULL,
  `created` datetime NOT NULL DEFAULT current_timestamp(),
  `updated` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_product_item`
--

INSERT INTO `tb_product_item` (`id_item`, `barcode`, `name`, `category_id`, `unit_id`, `price`, `stock`, `image`, `created`, `updated`) VALUES
(9, 'RS001', 'RESTU Panda', 7, 9, 123456, 0, 'item-210130-b6ca2697f5.jpeg', '2021-01-30 15:20:07', NULL),
(10, 'RS002', 'RESTU Panda', 8, 8, 123456, 0, 'item-210130-a613cbc8d3.jpeg', '2021-01-30 15:20:41', NULL),
(11, 'RS003', 'RESTU Panda', 8, 8, 123456, 0, 'item-210130-b07fba4231.jpeg', '2021-01-30 15:21:13', NULL),
(12, 'RS004', 'RESTU Panda', 8, 8, 1234564, 0, 'item-210130-8026d9a3e9.jpeg', '2021-01-30 15:22:00', NULL),
(13, 'RS005', 'RESTU Panda', 7, 9, 123456, 0, 'item-210130-ea7ab28993.jpeg', '2021-01-30 15:22:43', NULL),
(14, 'RS006', 'RESTU Panda', 7, 9, 123456, 0, 'item-210130-198da5049b.jpeg', '2021-01-30 15:23:28', NULL),
(15, 'RS007', 'RESTU Panda', 7, 11, 123456, 0, 'item-210130-a335c0dab1.jpeg', '2021-01-30 15:24:05', NULL),
(16, 'HR001', 'Harapan Baru', 7, 11, 123456, 0, 'item-210130-751673402e.jpeg', '2021-01-30 17:35:20', '2021-01-30 12:18:39'),
(17, 'HR002', 'Harapan Baru', 7, 11, 123456, 0, 'item-210130-64f4568612.jpeg', '2021-01-30 18:14:00', NULL),
(18, 'HR003', 'Harapan Baru', 7, 11, 123456, 0, 'item-210130-1f65c26347.jpeg', '2021-01-30 18:15:29', NULL),
(19, 'HR004', 'Harapan Baru', 7, 11, 123456, 0, 'item-210130-98adc1e990.jpeg', '2021-01-30 18:17:47', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tb_product_unit`
--

CREATE TABLE `tb_product_unit` (
  `id_unit` int(11) NOT NULL,
  `name` varchar(128) NOT NULL,
  `created` datetime NOT NULL DEFAULT current_timestamp(),
  `updated` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_product_unit`
--

INSERT INTO `tb_product_unit` (`id_unit`, `name`, `created`, `updated`) VALUES
(8, 'Malang - Surabaya - Ponorogo', '2021-01-30 15:08:15', '2021-01-30 09:09:29'),
(9, 'Malang - Surabaya', '2021-01-30 15:08:59', NULL),
(10, 'Malang - Surabaya - Semarang', '2021-01-30 15:09:10', NULL),
(11, 'Blitar -Malang - Surabaya', '2021-01-30 15:19:14', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tb_supplier`
--

CREATE TABLE `tb_supplier` (
  `id_supplier` int(11) NOT NULL,
  `name` varchar(128) NOT NULL,
  `phone` varchar(128) NOT NULL,
  `address` varchar(256) NOT NULL,
  `description` text DEFAULT NULL,
  `created` datetime NOT NULL DEFAULT current_timestamp(),
  `updated` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_supplier`
--

INSERT INTO `tb_supplier` (`id_supplier`, `name`, `phone`, `address`, `description`, `created`, `updated`) VALUES
(1, 'Toko A', '085123456789', 'Malang', NULL, '2021-01-24 15:36:08', NULL),
(2, 'Toko B', '085159951159', 'Surabaya', 'Toko ATK Besar', '2021-01-24 15:36:08', NULL),
(4, 'Toko C', '085963369963', 'Sidoarjo', NULL, '2021-01-24 17:27:16', '2021-01-24 12:12:01');

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE `tb_user` (
  `id_user` int(11) NOT NULL,
  `username` varchar(128) NOT NULL,
  `password` varchar(256) NOT NULL,
  `name` varchar(128) NOT NULL,
  `address` varchar(256) DEFAULT NULL,
  `level` int(1) NOT NULL COMMENT '1=admin; 2=kasir;'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`id_user`, `username`, `password`, `name`, `address`, `level`) VALUES
(1, 'admin', 'd033e22ae348aeb5660fc2140aec35850c4da997', 'Sudrajad Dwi Sasmita', 'Klojen, Malang', 1),
(2, 'kasir1', '874c0ac75f323057fe3b7fb3f5a8a41df2b94b1d', 'Budi', 'Singasari, Malang', 2),
(3, 'kasir2', '98becfb9553ea96eae7bb63c5b3465c3a03b3ba8', 'Bambang', 'Lowokwaru, Malang', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_customer`
--
ALTER TABLE `tb_customer`
  ADD PRIMARY KEY (`id_customer`);

--
-- Indexes for table `tb_product_category`
--
ALTER TABLE `tb_product_category`
  ADD PRIMARY KEY (`id_category`);

--
-- Indexes for table `tb_product_item`
--
ALTER TABLE `tb_product_item`
  ADD PRIMARY KEY (`id_item`),
  ADD UNIQUE KEY `barcode` (`barcode`),
  ADD KEY `category_id` (`category_id`),
  ADD KEY `unit_id` (`unit_id`);

--
-- Indexes for table `tb_product_unit`
--
ALTER TABLE `tb_product_unit`
  ADD PRIMARY KEY (`id_unit`);

--
-- Indexes for table `tb_supplier`
--
ALTER TABLE `tb_supplier`
  ADD PRIMARY KEY (`id_supplier`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_customer`
--
ALTER TABLE `tb_customer`
  MODIFY `id_customer` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tb_product_category`
--
ALTER TABLE `tb_product_category`
  MODIFY `id_category` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tb_product_item`
--
ALTER TABLE `tb_product_item`
  MODIFY `id_item` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `tb_product_unit`
--
ALTER TABLE `tb_product_unit`
  MODIFY `id_unit` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tb_supplier`
--
ALTER TABLE `tb_supplier`
  MODIFY `id_supplier` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tb_product_item`
--
ALTER TABLE `tb_product_item`
  ADD CONSTRAINT `tb_product_item_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `tb_product_category` (`id_category`),
  ADD CONSTRAINT `tb_product_item_ibfk_2` FOREIGN KEY (`unit_id`) REFERENCES `tb_product_unit` (`id_unit`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
