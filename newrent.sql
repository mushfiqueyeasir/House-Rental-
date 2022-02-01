-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 21, 2020 at 04:34 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `newrent`
--

-- --------------------------------------------------------

--
-- Table structure for table `room_rental_registrations`
--

CREATE TABLE `room_rental_registrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `fullname` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `country` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rent` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deposit` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `accommodation` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `open_for_sharing` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `other` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `vacant` int(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp(),
  `user_id` int(10) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `room_rental_registrations`
--

INSERT INTO `room_rental_registrations` (`id`, `fullname`, `mobile`, `email`, `country`, `city`, `rent`, `deposit`, `address`, `accommodation`, `description`, `image`, `open_for_sharing`, `other`, `vacant`, `created_at`, `updated_at`, `user_id`) VALUES
(19, 'Mushfique Yeasir', '01624801466', 'ifatgame@gmail.com', 'Bangladesh', 'Aftabnagar', '15000', '9000', 'Aftabnagar, Block:b, Road:5, Hose:9', 'Water, Gash, Current', 'Very Good Place.', 'uploads/890761-priyankachopra-nickjonas-mansion1.jpg', NULL, NULL, 1, '2020-09-21 02:25:38', '2020-09-21 02:25:38', 2),
(18, 'Kashem Hossain', '01624801462', 'kashem_hossain@gmail.com', 'Bangladesh', 'Banasree', '20000', '10000', 'Banasree, Block:A, Road:5, House:5', 'Gas, Current, Lift', 'Its safe and good place to stay.', 'uploads/17tmag-portland-slide-1BO7-mobileMasterAt3x.jpg', NULL, NULL, 1, '2020-09-21 02:24:00', '2020-09-21 02:24:00', 1),
(20, 'Abul Hossain', '01624801461', 'abul_hossain@gmail.com', 'Bangladesh', 'Badda', '23000', '12000', 'Badda, Road:5', 'Gash, Current, Lift', 'Very Good Home To stay', 'uploads/interior-house-inside-design-duplex-designs_187636-670x400.jpg', NULL, NULL, 1, '2020-09-21 02:27:46', '2020-09-21 02:27:46', 3),
(21, 'Noyon Islam', '01624801463', 'noyon@gmail.com', 'Bangladesh', 'Gulshan', '30000', '15000', 'Gulshan, Road:5, House:10', 'Gash, Current, Lift', 'Good Place to stay.', 'uploads/PZ325BUIKII6TJEREXPWDR4NYQ.jpg', NULL, NULL, 1, '2020-09-21 02:29:29', '2020-09-21 02:29:29', 4),
(22, 'Korim Islam', '01624801464', 'korim@gmail.com', 'Bangladesh', 'Uttora', '40000', '25000', 'Uttora, Sector:11, Road:5, Hose:1', 'Gash, Current, Lift', 'Very Good Place.', 'uploads/stringio.jpg', NULL, NULL, 1, '2020-09-21 02:30:47', '2020-09-21 02:30:47', 5);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `fullname` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp(),
  `role` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT 'user',
  `status` int(1) NOT NULL DEFAULT 1
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `fullname`, `mobile`, `username`, `email`, `password`, `created_at`, `updated_at`, `role`, `status`) VALUES
(1, 'Kashem Hossain', '01624801462', 'kashem', 'kashem_hossain@gmail.com', '202cb962ac59075b964b07152d234b70', '2020-09-21 02:11:13', '2020-09-21 02:11:13', 'user', 1),
(2, 'Mushfique Yeasir', '01624801466', 'ifat', 'ifatgame@gmail.com', '202cb962ac59075b964b07152d234b70', '2020-09-21 02:09:58', '2020-09-21 02:09:58', 'user', 1),
(3, 'Abul Hossain', '01624801461', 'abul', 'abul_hossain@gmail.com', '202cb962ac59075b964b07152d234b70', '2020-09-21 02:10:41', '2020-09-21 02:10:41', 'user', 1),
(4, 'Noyon Islam', '01624801463', 'noyon', 'noyon@gmail.com', '202cb962ac59075b964b07152d234b70', '2020-09-21 02:12:02', '2020-09-21 02:12:02', 'user', 1),
(5, 'Korim Islam', '01624801464', 'korim', 'korim@gmail.com', '202cb962ac59075b964b07152d234b70', '2020-09-21 02:13:46', '2020-09-21 02:13:46', 'user', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `room_rental_registrations`
--
ALTER TABLE `room_rental_registrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `users_mobile_unique` (`mobile`),
  ADD UNIQUE KEY `users_username_unique` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `room_rental_registrations`
--
ALTER TABLE `room_rental_registrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
