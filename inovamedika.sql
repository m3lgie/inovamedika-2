-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 26, 2019 at 07:49 PM
-- Server version: 10.1.32-MariaDB
-- PHP Version: 7.2.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `inovamedika`
--

-- --------------------------------------------------------

--
-- Table structure for table `draft_transactions`
--

CREATE TABLE `draft_transactions` (
  `id` int(10) UNSIGNED NOT NULL,
  `draft_key` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `date` datetime NOT NULL,
  `customer_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `customer_phone` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `payment` int(10) UNSIGNED NOT NULL,
  `total` int(10) UNSIGNED NOT NULL,
  `notes` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` int(10) UNSIGNED NOT NULL,
  `created_by` int(10) UNSIGNED NOT NULL,
  `updated_by` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `draft_transaction_details`
--

CREATE TABLE `draft_transaction_details` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_draft_transaction` char(255) COLLATE utf8_unicode_ci NOT NULL,
  `id_product` char(255) COLLATE utf8_unicode_ci NOT NULL,
  `qty` int(10) UNSIGNED NOT NULL,
  `price` int(10) UNSIGNED NOT NULL,
  `disc` int(10) UNSIGNED NOT NULL,
  `created_by` int(10) UNSIGNED NOT NULL,
  `updated_by` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2019_11_25_091738_products', 1),
(2, '2019_11_25_091809_product_unit', 1),
(3, '2019_11_25_091832_transactions', 1),
(4, '2019_11_25_091840_draft_transactions', 1),
(5, '2019_11_25_093453_draft_transaction_details', 1),
(6, '2019_11_25_094830_transaction_details', 1);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `unit_id` int(10) UNSIGNED NOT NULL,
  `price` int(10) UNSIGNED NOT NULL,
  `notes` text COLLATE utf8_unicode_ci NOT NULL,
  `created_by` int(10) UNSIGNED NOT NULL,
  `updated_by` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `unit_id`, `price`, `notes`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(11, 'Monitor 21\"', 1, 1000000, '1', 1, 1, '2019-11-25 04:44:27', '2019-11-25 11:08:54'),
(12, 'harddisk 500gb', 1, 550000, '2', 1, 1, '2019-11-25 04:44:38', '2019-11-25 11:09:06'),
(14, 'Mouse', 1, 50000, 'Warna Hitam', 1, 0, '2019-11-26 09:38:03', '2019-11-26 09:38:03'),
(15, 'Speaker', 1, 100000, 'Simbada\r\n', 1, 0, '2019-11-26 09:38:19', '2019-11-26 09:38:19');

-- --------------------------------------------------------

--
-- Table structure for table `product_unit`
--

CREATE TABLE `product_unit` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `notes` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_by` int(10) UNSIGNED NOT NULL,
  `updated_by` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `product_unit`
--

INSERT INTO `product_unit` (`id`, `name`, `notes`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 'pcs', 'satuan', 1, 1, '2019-11-24 22:00:00', '2019-11-25 04:59:05'),
(7, 'box', '2', 1, 1, '2019-11-25 05:07:23', '2019-11-26 09:48:03'),
(9, 'Meter', '-', 1, 0, '2019-11-26 09:48:17', '2019-11-26 09:48:17');

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `id` int(10) UNSIGNED NOT NULL,
  `invoice_no` char(14) COLLATE utf8_unicode_ci NOT NULL,
  `date` datetime NOT NULL,
  `customer_name` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `customer_phone` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `payment` int(10) UNSIGNED NOT NULL,
  `total` int(10) UNSIGNED NOT NULL,
  `notes` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` int(10) UNSIGNED NOT NULL,
  `created_by` int(10) UNSIGNED NOT NULL,
  `updated_by` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `transactions`
--

INSERT INTO `transactions` (`id`, `invoice_no`, `date`, `customer_name`, `customer_phone`, `payment`, `total`, `notes`, `status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(14, 'VBUrb6RH', '2019-11-26 00:00:00', 'Melgisaputra Dwi Nanda', '082170423344', 7000000, 3650000, 'wqwqrnfdsmnfmnsdbmnfbsndfbnmsdf', 3, 1, 1, '2019-11-25 21:46:50', '2019-11-26 04:59:43'),
(28, 'P201911260019', '2019-11-26 10:57:54', 'Fian Agus Prihantoro', '082170423344', 2750000, 2750000, '-', 1, 1, 0, '2019-11-26 03:58:04', '2019-11-26 03:58:04'),
(29, 'P201911260020', '2019-11-26 10:59:58', 'Melgisaputra Dwi Nanda', '082170423344', 2999992, 2750000, '0', 1, 1, 0, '2019-11-26 04:00:13', '2019-11-26 04:00:13'),
(30, 'P201911260021', '2019-11-26 12:07:00', 'Melgisaputra Dwi Nanda', '082170423344', 3000000, 2684000, '22', 1, 1, 0, '2019-11-26 05:14:32', '2019-11-26 05:14:32'),
(31, 'P201911260022', '2019-11-26 12:24:23', 'coba', '082170423344', 350000, 495000, 'pembeli tidak jadi\r\n\r\n', 0, 1, 1, '2019-11-26 05:24:30', '2019-11-26 05:27:14'),
(32, 'P201911260023', '2019-11-26 16:39:36', 'Melgisaputra Dwi Nanda', '082170423344', 285000, 285000, '-', 1, 1, 0, '2019-11-26 09:39:43', '2019-11-26 09:39:43'),
(33, 'P201911260024', '2019-11-26 17:28:24', 'Melgisaputra Dwi Nanda', '082170423344', 1567500, 1567500, '-', 1, 1, 0, '2019-11-26 10:28:30', '2019-11-26 10:28:30');

-- --------------------------------------------------------

--
-- Table structure for table `transaction_details`
--

CREATE TABLE `transaction_details` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_transaction` char(255) COLLATE utf8_unicode_ci NOT NULL,
  `id_product` char(255) COLLATE utf8_unicode_ci NOT NULL,
  `qty` int(10) UNSIGNED NOT NULL,
  `price` int(10) UNSIGNED NOT NULL,
  `disc` int(10) UNSIGNED NOT NULL,
  `created_by` int(10) UNSIGNED NOT NULL,
  `updated_by` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `transaction_details`
--

INSERT INTO `transaction_details` (`id`, `id_transaction`, `id_product`, `qty`, `price`, `disc`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(21, '14', '11', 2, 1000000, 0, 1, 0, '2019-11-25 21:46:50', '2019-11-25 21:46:50'),
(22, '14', '12', 3, 550000, 0, 1, 0, '2019-11-25 21:46:50', '2019-11-25 21:46:50'),
(23, '15', '12', 3, 550000, 0, 1, 0, '2019-11-25 21:48:30', '2019-11-25 21:48:30'),
(24, '15', '11', 2, 1000000, 0, 1, 0, '2019-11-25 21:48:30', '2019-11-25 21:48:30'),
(25, '16', '11', 2, 1000000, 0, 1, 0, '2019-11-25 23:17:23', '2019-11-25 23:17:23'),
(26, '16', '12', 1, 550000, 0, 1, 0, '2019-11-25 23:17:23', '2019-11-25 23:17:23'),
(27, '17', '12', 2, 550000, 0, 1, 0, '2019-11-25 23:25:22', '2019-11-25 23:25:22'),
(28, '20', '12', 4, 550000, 0, 1, 0, '2019-11-25 23:28:54', '2019-11-25 23:28:54'),
(29, '21', '11', 3, 1000000, 0, 1, 0, '2019-11-25 23:30:06', '2019-11-25 23:30:06'),
(30, '22', '11', 3, 1000000, 0, 1, 0, '2019-11-26 00:03:27', '2019-11-26 00:03:27'),
(31, '22', '11', 3, 1000000, 0, 1, 0, '2019-11-26 00:03:27', '2019-11-26 00:03:27'),
(32, '22', '12', 2, 550000, 0, 1, 0, '2019-11-26 00:03:27', '2019-11-26 00:03:27'),
(33, '23', '11', 3, 1000000, 0, 1, 0, '2019-11-26 00:04:05', '2019-11-26 00:04:05'),
(34, '24', '11', 2, 1000000, 0, 1, 0, '2019-11-26 01:26:32', '2019-11-26 01:26:32'),
(35, '24', '12', 2, 550000, 0, 1, 0, '2019-11-26 01:26:32', '2019-11-26 01:26:32'),
(36, '25', '12', 3, 550000, 0, 1, 0, '2019-11-26 01:33:09', '2019-11-26 01:33:09'),
(37, '25', '11', 3, 1000000, 0, 1, 0, '2019-11-26 01:33:09', '2019-11-26 01:33:09'),
(38, '26', '12', 5, 550000, 15, 1, 0, '2019-11-26 03:32:23', '2019-11-26 03:32:23'),
(39, '26', '11', 2, 1000000, 10, 1, 0, '2019-11-26 03:32:23', '2019-11-26 03:32:23'),
(40, '27', '11', 1, 1000000, 0, 1, 0, '2019-11-26 03:52:30', '2019-11-26 03:52:30'),
(41, '28', '12', 5, 550000, 0, 1, 0, '2019-11-26 03:58:04', '2019-11-26 03:58:04'),
(42, '29', '12', 5, 550000, 0, 1, 0, '2019-11-26 04:00:13', '2019-11-26 04:00:13'),
(43, '30', '12', 5, 550000, 12, 1, 0, '2019-11-26 05:14:33', '2019-11-26 05:14:33'),
(44, '31', '12', 1, 550000, 10, 1, 0, '2019-11-26 05:24:30', '2019-11-26 05:24:30'),
(45, '32', '15', 3, 100000, 15, 1, 0, '2019-11-26 09:39:43', '2019-11-26 09:39:43'),
(46, '33', '12', 3, 550000, 15, 1, 0, '2019-11-26 10:28:30', '2019-11-26 10:28:30');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `username` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `level` int(11) NOT NULL,
  `gambar` text COLLATE utf8_unicode_ci NOT NULL,
  `status` int(11) NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `username`, `password`, `level`, `gambar`, `status`, `remember_token`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 'Melgisaputra Dwi Nanda', 'm3lgie@gmail.com', 'super', '$2y$10$BeTdJp0KbtAU5iKYRDD6fesmJXOzQdANfuy9wanlnmoJ72pHx0zdu', 0, 'user/images//super51495.jpg', 0, 'Un7Zmw940h4Rofo4jopPrH4wSvYDASeAcxACi8rat8xsd1p6rvJKVa79iaSC', 0, 1, '2017-01-30 01:52:38', '2019-11-26 10:12:33'),
(2, 'Administrator', 'admin@gmail.com', 'admin', '$2y$10$BeTdJp0KbtAU5iKYRDD6fesmJXOzQdANfuy9wanlnmoJ72pHx0zdu', 1, '', 0, 'gCn4PhjumenfRRO8NCNC9jdh8DxFDfylFZp3Ao7qjoHhkRmEThk6eFXO2WFm', 0, 2, '2017-01-31 05:52:59', '2017-07-23 20:18:08'),
(8, 'operator', 'operator@gmail.com', 'operator', '$2y$10$BeTdJp0KbtAU5iKYRDD6fesmJXOzQdANfuy9wanlnmoJ72pHx0zdu', 2, '', 0, 'vPSsVog8yGpH49ory1kjDvCtRSaMzffkqqX3jCuZlQjU2y2uLB8TIEcvljbJ', 0, 1, '2017-01-31 06:33:55', '2019-11-26 10:19:55'),
(9, 'Admin Staff', 'staff@gmail.com', 'staff', '$2y$10$BeTdJp0KbtAU5iKYRDD6fesmJXOzQdANfuy9wanlnmoJ72pHx0zdu', 3, '', 0, 'CyCkWGRN7w6AeNzUM9DrkZ1v3q8TApnfr2fX3nHp7FeEXzDnRlx9aiFRGue6', 0, 1, '2017-06-25 23:00:58', '2019-11-26 10:26:44');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `draft_transactions`
--
ALTER TABLE `draft_transactions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `draft_transaction_details`
--
ALTER TABLE `draft_transaction_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_unit`
--
ALTER TABLE `product_unit`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `transactions_invoice_no_unique` (`invoice_no`);

--
-- Indexes for table `transaction_details`
--
ALTER TABLE `transaction_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `draft_transactions`
--
ALTER TABLE `draft_transactions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `draft_transaction_details`
--
ALTER TABLE `draft_transaction_details`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=100;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `product_unit`
--
ALTER TABLE `product_unit`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `transaction_details`
--
ALTER TABLE `transaction_details`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
