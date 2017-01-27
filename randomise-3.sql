-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jan 27, 2017 at 11:24 AM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 5.6.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `randomise`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_access_log`
--

CREATE TABLE `tbl_access_log` (
  `ID` bigint(20) NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `ip_address` text COLLATE utf8_unicode_ci NOT NULL,
  `device` text COLLATE utf8_unicode_ci NOT NULL,
  `user_agent` text COLLATE utf8_unicode_ci NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_access_log`
--

INSERT INTO `tbl_access_log` (`ID`, `user_id`, `ip_address`, `device`, `user_agent`, `date`) VALUES
(1, 1, '::1', 'Desktop/Laptop', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/54.0.2840.99 Safari/537.36', '2016-11-27 18:57:40'),
(2, 1, '::1', 'Desktop/Laptop', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/54.0.2840.99 Safari/537.36', '2016-11-28 17:00:06'),
(3, 10000415750, '::1', 'Desktop/Laptop', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/54.0.2840.99 Safari/537.36', '2016-11-28 17:40:30'),
(4, 1, '::1', 'Desktop/Laptop', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/54.0.2840.99 Safari/537.36', '2016-11-28 17:41:26'),
(5, 1, '::1', 'Desktop/Laptop', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/54.0.2840.99 Safari/537.36', '2016-11-28 18:24:02'),
(6, 10000415750, '::1', 'Desktop/Laptop', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/54.0.2840.99 Safari/537.36', '2016-11-28 18:24:15'),
(7, 1, '::1', 'Desktop/Laptop', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/54.0.2840.99 Safari/537.36', '2016-11-28 18:24:38'),
(8, 10000415750, '::1', 'Desktop/Laptop', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/54.0.2840.99 Safari/537.36', '2016-11-28 18:25:43'),
(9, 1, '::1', 'Desktop/Laptop', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/54.0.2840.99 Safari/537.36', '2016-11-28 18:30:48'),
(10, 10000415750, '::1', 'Desktop/Laptop', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/54.0.2840.99 Safari/537.36', '2016-11-28 18:31:02'),
(11, 1, '123.136.199.77', 'Desktop/Laptop', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/54.0.2840.99 Safari/537.36', '2016-11-28 18:46:46'),
(12, 10000415750, '81.109.32.89', 'Desktop/Laptop', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:47.0) Gecko/20100101 Firefox/47.0', '2016-11-28 18:50:14'),
(13, 1, '81.109.32.89', 'Desktop/Laptop', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:47.0) Gecko/20100101 Firefox/47.0', '2016-11-28 21:38:25'),
(14, 10000415750, '81.109.32.89', 'Desktop/Laptop', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:47.0) Gecko/20100101 Firefox/47.0', '2016-11-28 21:40:51'),
(15, 1, '81.109.32.89', 'Desktop/Laptop', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:47.0) Gecko/20100101 Firefox/47.0', '2016-11-28 21:43:06'),
(16, 1, '171.61.11.192', 'Desktop/Laptop', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/54.0.2840.99 Safari/537.36', '2016-11-29 09:15:37'),
(17, 10000415750, '171.61.11.192', 'Desktop/Laptop', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/54.0.2840.99 Safari/537.36', '2016-11-29 09:16:16'),
(18, 1, '::1', 'Desktop/Laptop', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/54.0.2840.99 Safari/537.36', '2016-11-29 17:24:32'),
(19, 10000415750, '::1', 'Desktop/Laptop', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/54.0.2840.99 Safari/537.36', '2016-11-29 18:38:14'),
(20, 1, '123.136.200.224', 'Desktop/Laptop', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/54.0.2840.99 Safari/537.36', '2016-11-29 18:48:32'),
(21, 1, '81.109.32.89', 'Desktop/Laptop', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:47.0) Gecko/20100101 Firefox/47.0', '2016-11-29 19:10:16'),
(22, 10000415750, '81.109.32.89', 'Desktop/Laptop', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:47.0) Gecko/20100101 Firefox/47.0', '2016-11-29 19:12:40'),
(23, 1, '81.109.32.89', 'Desktop/Laptop', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:47.0) Gecko/20100101 Firefox/47.0', '2016-11-29 19:17:14'),
(24, 10000415750, '81.109.32.89', 'Desktop/Laptop', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:47.0) Gecko/20100101 Firefox/47.0', '2016-11-29 19:19:48'),
(25, 1, '81.109.32.89', 'Desktop/Laptop', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:47.0) Gecko/20100101 Firefox/47.0', '2016-11-29 19:20:40'),
(26, 10000415750, '81.109.32.89', 'Desktop/Laptop', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:47.0) Gecko/20100101 Firefox/47.0', '2016-11-29 19:22:39'),
(27, 1, '81.109.32.89', 'Desktop/Laptop', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:47.0) Gecko/20100101 Firefox/47.0', '2016-11-29 19:27:33'),
(28, 1, '81.109.32.89', 'Desktop/Laptop', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:47.0) Gecko/20100101 Firefox/47.0', '2016-11-29 19:31:35'),
(29, 10000415750, '81.109.32.89', 'Desktop/Laptop', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:47.0) Gecko/20100101 Firefox/47.0', '2016-11-29 19:33:48'),
(30, 1, '81.109.32.89', 'Desktop/Laptop', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:47.0) Gecko/20100101 Firefox/47.0', '2016-11-29 19:37:16'),
(31, 1, '::1', 'Desktop/Laptop', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10.9; rv:18.0) Gecko/20100101 Firefox/18.0', '2016-12-01 12:02:59'),
(32, 10000896157, '::1', 'Desktop/Laptop', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10.9; rv:18.0) Gecko/20100101 Firefox/18.0', '2016-12-01 12:14:42'),
(33, 1, '::1', 'Desktop/Laptop', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_9_5) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/54.0.2840.98 Safari/537.36', '2016-12-01 12:15:46'),
(34, 1, '127.0.0.1', 'Desktop/Laptop', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10.9; rv:18.0) Gecko/20100101 Firefox/18.0', '2016-12-06 11:18:42'),
(35, 10000896157, '::1', 'Desktop/Laptop', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10.9; rv:18.0) Gecko/20100101 Firefox/18.0', '2016-12-06 11:40:22'),
(36, 1, '::1', 'Desktop/Laptop', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10.9; rv:18.0) Gecko/20100101 Firefox/18.0', '2016-12-06 11:41:46'),
(37, 10000896157, '::1', 'Desktop/Laptop', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10.9; rv:18.0) Gecko/20100101 Firefox/18.0', '2016-12-06 11:42:34'),
(38, 1, '::1', 'Desktop/Laptop', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10.9; rv:18.0) Gecko/20100101 Firefox/18.0', '2016-12-06 11:44:56'),
(39, 1, '::1', 'Desktop/Laptop', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10.12; rv:18.0) Gecko/20100101 Firefox/18.0', '2016-12-12 11:29:44'),
(40, 1, '::1', 'Desktop/Laptop', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10.12; rv:18.0) Gecko/20100101 Firefox/18.0', '2016-12-13 13:26:13'),
(41, 1, '::1', 'Desktop/Laptop', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10.12; rv:18.0) Gecko/20100101 Firefox/18.0', '2016-12-16 10:40:15'),
(42, 1, '::1', 'Desktop/Laptop', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10.12; rv:18.0) Gecko/20100101 Firefox/18.0', '2016-12-16 11:36:33'),
(43, 10000201680, '::1', 'Desktop/Laptop', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_12_1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/55.0.2883.95 Safari/537.36', '2016-12-16 11:37:11'),
(44, 10000896157, '::1', 'Desktop/Laptop', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_12_1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/55.0.2883.95 Safari/537.36', '2016-12-16 15:24:45'),
(45, 10000201680, '::1', 'Desktop/Laptop', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_12_1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/55.0.2883.95 Safari/537.36', '2016-12-16 15:53:45'),
(46, 1, '::1', 'Desktop/Laptop', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10.12; rv:18.0) Gecko/20100101 Firefox/18.0', '2016-12-19 11:45:36'),
(47, 10000201680, '::1', 'Desktop/Laptop', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_12_1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/55.0.2883.95 Safari/537.36', '2016-12-19 12:23:39'),
(48, 1, '::1', 'Desktop/Laptop', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_12_1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/55.0.2883.95 Safari/537.36', '2016-12-20 11:25:19'),
(49, 10000433114, '::1', 'Desktop/Laptop', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10.12; rv:18.0) Gecko/20100101 Firefox/18.0', '2016-12-20 11:50:49'),
(50, 10000800380, '::1', 'Desktop/Laptop', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10.12; rv:18.0) Gecko/20100101 Firefox/18.0', '2016-12-20 13:06:15'),
(51, 1, '::1', 'Desktop/Laptop', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_12_1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/55.0.2883.95 Safari/537.36', '2016-12-20 13:37:35'),
(52, 10000433114, '::1', 'Desktop/Laptop', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10.12; rv:18.0) Gecko/20100101 Firefox/18.0', '2016-12-20 13:38:03'),
(53, 10000815458, '::1', 'Desktop/Laptop', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_12_1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/55.0.2883.95 Safari/537.36', '2016-12-20 14:08:25'),
(54, 10000815458, '::1', 'Desktop/Laptop', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10.12; rv:18.0) Gecko/20100101 Firefox/18.0', '2016-12-23 11:56:22'),
(55, 1, '127.0.0.1', 'Desktop/Laptop', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10.11; rv:50.0) Gecko/20100101 Firefox/50.0', '2016-12-24 19:06:53'),
(56, 10000815458, '127.0.0.1', 'Desktop/Laptop', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10.11; rv:50.0) Gecko/20100101 Firefox/50.0', '2016-12-25 00:52:46'),
(57, 1, '127.0.0.1', 'Desktop/Laptop', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10.11; rv:50.0) Gecko/20100101 Firefox/50.0', '2016-12-26 00:35:42'),
(58, 1, '127.0.0.1', 'Desktop/Laptop', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10.11; rv:50.0) Gecko/20100101 Firefox/50.0', '2016-12-26 00:36:55'),
(59, 10000815458, '127.0.0.1', 'Desktop/Laptop', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10.11; rv:50.0) Gecko/20100101 Firefox/50.0', '2016-12-26 03:55:44'),
(60, 10000815458, '127.0.0.1', 'Desktop/Laptop', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10.11; rv:50.0) Gecko/20100101 Firefox/50.0', '2016-12-27 10:17:21'),
(61, 1, '127.0.0.1', 'Desktop/Laptop', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_11_6) AppleWebKit/602.1.50 (KHTML, like Gecko) Version/10.0 Safari/602.1.50', '2016-12-27 11:58:40'),
(62, 10000433114, '127.0.0.1', 'Desktop/Laptop', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10.11; rv:50.0) Gecko/20100101 Firefox/50.0', '2016-12-27 12:25:04'),
(63, 10000800380, '127.0.0.1', 'Desktop/Laptop', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10.11; rv:50.0) Gecko/20100101 Firefox/50.0', '2016-12-27 12:26:10'),
(64, 1, '::1', 'Desktop/Laptop', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10.12; rv:18.0) Gecko/20100101 Firefox/18.0', '2016-12-28 11:18:00'),
(65, 10000815458, '::1', 'Desktop/Laptop', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_12_1) AppleWebKit/602.2.14 (KHTML, like Gecko) Version/10.0.1 Safari/602.2.14', '2016-12-30 14:03:00'),
(66, 10000815458, '::1', 'Desktop/Laptop', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_12_1) AppleWebKit/602.2.14 (KHTML, like Gecko) Version/10.0.1 Safari/602.2.14', '2016-12-30 14:26:27'),
(67, 1, '::1', 'Desktop/Laptop', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10.11; rv:50.0) Gecko/20100101 Firefox/50.0', '2017-01-03 04:35:20'),
(68, 1, '::1', 'Desktop/Laptop', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_12_1) AppleWebKit/602.2.14 (KHTML, like Gecko) Version/10.0.1 Safari/602.2.14', '2017-01-06 14:07:45'),
(69, 1, '::1', 'Desktop/Laptop', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10.11; rv:50.0) Gecko/20100101 Firefox/50.0', '2017-01-07 13:45:06'),
(70, 1, '::1', 'Desktop/Laptop', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10.12; rv:18.0) Gecko/20100101 Firefox/18.0', '2017-01-09 10:14:38'),
(71, 10000815458, '::1', 'Desktop/Laptop', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_12_1) AppleWebKit/602.2.14 (KHTML, like Gecko) Version/10.0.1 Safari/602.2.14', '2017-01-09 10:36:58'),
(72, 1, '::1', 'Desktop/Laptop', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_12_1) AppleWebKit/602.2.14 (KHTML, like Gecko) Version/10.0.1 Safari/602.2.14', '2017-01-10 10:19:18'),
(73, 1, '::1', 'Desktop/Laptop', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10.12; rv:18.0) Gecko/20100101 Firefox/18.0', '2017-01-16 16:27:08'),
(74, 1, '::1', 'Desktop/Laptop', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_12_2) AppleWebKit/602.3.12 (KHTML, like Gecko) Version/10.0.2 Safari/602.3.12', '2017-01-17 10:18:33'),
(75, 10000646644, '::1', 'Desktop/Laptop', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_12_2) AppleWebKit/602.3.12 (KHTML, like Gecko) Version/10.0.2 Safari/602.3.12', '2017-01-17 10:24:23'),
(76, 10000027446, '::1', 'Desktop/Laptop', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_12_2) AppleWebKit/602.3.12 (KHTML, like Gecko) Version/10.0.2 Safari/602.3.12', '2017-01-17 11:45:58'),
(77, 1, '::1', 'Desktop/Laptop', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_12_2) AppleWebKit/602.3.12 (KHTML, like Gecko) Version/10.0.2 Safari/602.3.12', '2017-01-17 14:08:55'),
(78, 1, '::1', 'Desktop/Laptop', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_12_2) AppleWebKit/602.3.12 (KHTML, like Gecko) Version/10.0.2 Safari/602.3.12', '2017-01-23 10:30:56'),
(79, 1, '::1', 'Desktop/Laptop', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_12_2) AppleWebKit/602.3.12 (KHTML, like Gecko) Version/10.0.2 Safari/602.3.12', '2017-01-23 10:40:20'),
(80, 1, '::1', 'Desktop/Laptop', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_12_2) AppleWebKit/602.3.12 (KHTML, like Gecko) Version/10.0.2 Safari/602.3.12', '2017-01-25 09:07:08'),
(81, 1, '::1', 'Desktop/Laptop', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_12_2) AppleWebKit/602.3.12 (KHTML, like Gecko) Version/10.0.2 Safari/602.3.12', '2017-01-25 09:09:16'),
(82, 10000643562, '::1', 'Desktop/Laptop', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_12_2) AppleWebKit/602.3.12 (KHTML, like Gecko) Version/10.0.2 Safari/602.3.12', '2017-01-25 10:43:29'),
(83, 1, '::1', 'Desktop/Laptop', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10.12; rv:18.0) Gecko/20100101 Firefox/18.0', '2017-01-25 10:55:05'),
(84, 1, '::1', 'Desktop/Laptop', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_12_2) AppleWebKit/602.3.12 (KHTML, like Gecko) Version/10.0.2 Safari/602.3.12', '2017-01-25 14:03:49'),
(85, 1, '::1', 'Desktop/Laptop', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_12_2) AppleWebKit/602.3.12 (KHTML, like Gecko) Version/10.0.2 Safari/602.3.12', '2017-01-25 14:05:01'),
(86, 10000643562, '::1', 'Desktop/Laptop', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_12_2) AppleWebKit/602.3.12 (KHTML, like Gecko) Version/10.0.2 Safari/602.3.12', '2017-01-25 14:05:15'),
(87, 10000643562, '::1', 'Desktop/Laptop', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_12_2) AppleWebKit/602.3.12 (KHTML, like Gecko) Version/10.0.2 Safari/602.3.12', '2017-01-25 18:24:03'),
(88, 10000643562, '::1', 'Desktop/Laptop', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_12_2) AppleWebKit/602.3.12 (KHTML, like Gecko) Version/10.0.2 Safari/602.3.12', '2017-01-26 11:58:48'),
(89, 10000785321, '::1', 'Desktop/Laptop', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_12_2) AppleWebKit/602.3.12 (KHTML, like Gecko) Version/10.0.2 Safari/602.3.12', '2017-01-26 14:02:27'),
(90, 10000785321, '::1', 'Desktop/Laptop', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10.12; rv:18.0) Gecko/20100101 Firefox/18.0', '2017-01-26 14:35:05'),
(91, 1, '::1', 'Desktop/Laptop', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10.12; rv:18.0) Gecko/20100101 Firefox/18.0', '2017-01-26 14:35:19'),
(92, 1, '::1', 'Desktop/Laptop', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_12_2) AppleWebKit/602.3.12 (KHTML, like Gecko) Version/10.0.2 Safari/602.3.12', '2017-01-26 14:47:38'),
(93, 1, '::1', 'Desktop/Laptop', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10.12; rv:18.0) Gecko/20100101 Firefox/18.0', '2017-01-26 15:10:07'),
(94, 10000785321, '::1', 'Desktop/Laptop', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_12_2) AppleWebKit/602.3.12 (KHTML, like Gecko) Version/10.0.2 Safari/602.3.12', '2017-01-26 16:01:33'),
(95, 1, '::1', 'Desktop/Laptop', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_12_2) AppleWebKit/602.3.12 (KHTML, like Gecko) Version/10.0.2 Safari/602.3.12', '2017-01-26 17:27:36');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_bookings`
--

CREATE TABLE `tbl_bookings` (
  `ID` bigint(20) NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `clinic` bigint(20) NOT NULL,
  `status` int(1) NOT NULL DEFAULT '1',
  `created_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `actual` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_clinics`
--

CREATE TABLE `tbl_clinics` (
  `ID` bigint(20) NOT NULL,
  `hospital` bigint(20) NOT NULL,
  `trial` bigint(20) NOT NULL,
  `schedule` text NOT NULL,
  `room` bigint(20) NOT NULL,
  `created_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `expected` int(11) NOT NULL,
  `treatment` varchar(999) NOT NULL,
  `booked` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_done`
--

CREATE TABLE `tbl_done` (
  `ID` int(11) NOT NULL,
  `TrialID` varchar(999) NOT NULL,
  `HospitalID` varchar(999) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_hospitals`
--

CREATE TABLE `tbl_hospitals` (
  `ID` bigint(20) NOT NULL,
  `name` varchar(1024) NOT NULL,
  `description` text NOT NULL,
  `rooms` text NOT NULL,
  `trials` text NOT NULL,
  `created_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `ClinicsNum` text
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_key`
--

CREATE TABLE `tbl_key` (
  `ID` int(11) NOT NULL,
  `KeyVal` varchar(999) NOT NULL,
  `TreatmentID` varchar(999) NOT NULL,
  `TrialID` varchar(999) NOT NULL,
  `HospitalID` varchar(999) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_notifications`
--

CREATE TABLE `tbl_notifications` (
  `ID` bigint(20) NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `title` text NOT NULL,
  `notification` text NOT NULL,
  `read` int(1) NOT NULL DEFAULT '0',
  `hide` int(1) NOT NULL DEFAULT '0',
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_notifications`
--

INSERT INTO `tbl_notifications` (`ID`, `user_id`, `title`, `notification`, `read`, `hide`, `date`) VALUES
(1, 1, 'Users Capabilities Updated', 'You have successfully updated users capabilities.', 1, 1, '2016-11-27 19:30:27'),
(2, 1, 'New Hospital Created ', 'You have successfully created a new hospital (Hospital A).', 1, 1, '2016-11-28 17:21:51'),
(3, 1, 'New Admin Account Created', 'You have successfully created a new admin account (Aarav Mehra).', 1, 1, '2016-11-28 17:24:23'),
(4, 1, 'Admin Account Details Updated', 'You have successfully updated (Aarav Mehra) account details.', 1, 1, '2016-11-28 17:36:59'),
(5, 1, 'Admin Account Details Updated', 'You have successfully updated (Aarav Mehra) account details.', 1, 1, '2016-11-28 17:37:56'),
(6, 1, 'Admin Account Details Updated', 'You have successfully updated (Aarav Mehra) account details.', 1, 1, '2016-11-28 17:38:25'),
(7, 1, 'Admin Account Details Updated', 'You have successfully updated (Aarav Mehra) account details.', 1, 1, '2016-11-28 17:39:14'),
(8, 1, 'Admin Account Details Updated', 'You have successfully updated (Aarav Mehra) account details.', 1, 1, '2016-11-28 17:40:08'),
(9, 1, 'Admin Account Password Reset', 'You have successfully changed (Aarav Mehra) account password.', 1, 1, '2016-11-28 17:40:16'),
(10, 1, 'Admin Account Details Updated', 'You have successfully updated (Aarav Mehra) account details.', 1, 1, '2016-11-28 17:40:16'),
(11, 10000415750, 'Account Details Updated', 'You have successfully update your account details.', 0, 0, '2016-11-28 17:41:12'),
(12, 1, 'New Room Created ', 'You have successfully created a new room (Room A).', 1, 1, '2016-11-28 18:23:33'),
(13, 1, 'Users Capabilities Updated', 'You have successfully updated users capabilities.', 1, 1, '2016-11-28 18:31:13'),
(14, 10000415750, 'New Room Created ', 'You have successfully created a new room (Room B).', 0, 0, '2016-11-28 18:33:39'),
(15, 10000415750, 'Room Updated', 'You have successfully updated room (Room A).', 0, 0, '2016-11-28 18:41:02'),
(16, 1, 'General Setting Updated', 'You have successfully updated website general settings.', 1, 1, '2016-11-28 18:47:02'),
(17, 1, 'Users Capabilities Updated', 'You have successfully updated users capabilities.', 1, 1, '2016-11-28 18:47:32'),
(18, 1, 'Users Capabilities Updated', 'You have successfully updated users capabilities.', 1, 1, '2016-11-28 18:51:37'),
(19, 1, 'Users Capabilities Updated', 'You have successfully updated users capabilities.', 1, 1, '2016-11-28 18:54:59'),
(20, 10000415750, 'Hospital Updated', 'You have successfully updated hospital (Hospital A).', 0, 0, '2016-11-28 18:56:37'),
(21, 1, 'Users Capabilities Updated', 'You have successfully updated users capabilities.', 1, 1, '2016-11-28 18:58:02'),
(22, 1, 'Users Capabilities Updated', 'You have successfully updated users capabilities.', 1, 1, '2016-11-28 18:59:19'),
(23, 1, 'Users Capabilities Updated', 'You have successfully updated users capabilities.', 1, 1, '2016-11-28 19:00:39'),
(24, 10000415750, 'Room Updated', 'You have successfully updated room (Room B).', 0, 0, '2016-11-28 19:01:40'),
(25, 10000415750, 'Room Deleted', 'You have successfully deleted (Room A) class details.', 0, 0, '2016-11-28 19:01:48'),
(26, 10000415750, 'New Room Created ', 'You have successfully created a new room (Room A).', 0, 0, '2016-11-28 19:01:57'),
(27, 1, 'Users Capabilities Updated', 'You have successfully updated users capabilities.', 1, 1, '2016-11-28 19:06:20'),
(28, 1, 'Admin Account Details Updated', 'You have successfully updated (Aarav Mehra) account details.', 1, 1, '2016-11-28 21:40:37'),
(29, 10000415750, 'New Trial Type Created ', 'You have successfully created a new trial type (Clinical Trial).', 0, 0, '2016-11-28 21:41:42'),
(30, 10000415750, 'New Trial Type Created ', 'You have successfully created a new trial type (Batch Trial).', 0, 0, '2016-11-28 21:41:58'),
(31, 10000415750, 'New Trial Created ', 'You have successfully created a new trial (New Trial).', 0, 0, '2016-11-28 21:42:33'),
(32, 1, 'Users Capabilities Updated', 'You have successfully updated users capabilities.', 1, 1, '2016-11-29 09:16:00'),
(33, 1, 'Users Capabilities Updated', 'You have successfully updated users capabilities.', 1, 1, '2016-11-29 09:16:56'),
(34, 1, 'Admin Account Details Updated', 'You have successfully updated (Aarav Mehra) account details.', 1, 1, '2016-11-29 09:19:52'),
(35, 1, 'Users Capabilities Updated', 'You have successfully updated users capabilities.', 1, 1, '2016-11-29 09:20:53'),
(36, 1, 'Users Capabilities Updated', 'You have successfully updated users capabilities.', 1, 1, '2016-11-29 09:21:10'),
(37, 1, 'Users Capabilities Updated', 'You have successfully updated users capabilities.', 1, 1, '2016-11-29 09:21:20'),
(38, 1, 'Users Capabilities Updated', 'You have successfully updated users capabilities.', 1, 1, '2016-11-29 09:21:35'),
(39, 1, 'Users Capabilities Updated', 'You have successfully updated users capabilities.', 1, 1, '2016-11-29 09:21:46'),
(40, 1, 'Users Capabilities Updated', 'You have successfully updated users capabilities.', 1, 1, '2016-11-29 09:22:01'),
(41, 1, 'Users Capabilities Updated', 'You have successfully updated users capabilities.', 1, 1, '2016-11-29 09:22:36'),
(42, 1, 'New Treatment Created ', 'You have successfully created a new treatment (ggr).', 1, 1, '2016-11-29 17:46:34'),
(43, 1, 'New Trial Created ', 'You have successfully created a new trial (Trial B).', 1, 1, '2016-11-29 17:51:08'),
(44, 1, 'New Trial Created ', 'You have successfully created a new trial (Trial C).', 1, 1, '2016-11-29 17:51:25'),
(45, 1, 'New Treatment Created ', 'You have successfully created a new treatment (Treat B).', 1, 1, '2016-11-29 17:51:43'),
(46, 1, 'New Treatment Created ', 'You have successfully created a new treatment (Treat  C).', 1, 1, '2016-11-29 17:51:52'),
(47, 1, 'Treatment Updated', 'You have successfully updated treatment (Update).', 1, 1, '2016-11-29 18:00:22'),
(48, 1, 'New Clinic Created ', 'You have successfully created a new clinic (#10000684386).', 1, 1, '2016-11-29 18:20:28'),
(49, 1, 'Admin Account Details Updated', 'You have successfully updated (Aarav Mehra) account details.', 1, 1, '2016-11-29 18:38:25'),
(50, 10000415750, 'New Clinic Booking', 'You have successfully booked a clinic (#10000684386).', 0, 0, '2016-11-29 18:38:35'),
(51, 1, 'Users Capabilities Updated', 'You have successfully updated users capabilities.', 1, 1, '2016-11-29 18:49:23'),
(52, 1, 'Users Capabilities Updated', 'You have successfully updated users capabilities.', 1, 1, '2016-11-29 18:49:29'),
(53, 1, 'New Clinic Created ', 'You have successfully created a new clinic (#10000038812).', 1, 1, '2016-11-29 19:12:03'),
(54, 1, 'Admin Account Details Updated', 'You have successfully updated (Aarav Mehra) account details.', 1, 1, '2016-11-29 19:12:22'),
(55, 1, 'New Hospital Created ', 'You have successfully created a new hospital (Hospital B).', 1, 1, '2016-11-29 19:18:25'),
(56, 1, 'Hospital Updated', 'You have successfully updated hospital (Hospital B).', 1, 1, '2016-11-29 19:19:28'),
(57, 1, 'Admin Account Details Updated', 'You have successfully updated (Aarav Mehra) account details.', 1, 1, '2016-11-29 19:21:02'),
(58, 1, 'Admin Account Details Updated', 'You have successfully updated (Aarav Mehra) account details.', 1, 1, '2016-11-29 19:33:35'),
(59, 1, 'Trial Updated', 'You have successfully updated trial (Trial C).', 1, 1, '2016-11-29 19:37:54'),
(60, 1, 'General Setting Updated', 'You have successfully updated website general settings.', 1, 1, '2016-12-01 12:03:30'),
(61, 1, 'General Setting Updated', 'You have successfully updated website general settings.', 1, 1, '2016-12-01 12:03:39'),
(62, 1, 'Account Details Updated', 'You have successfully update your account details.', 1, 1, '2016-12-01 12:04:02'),
(63, 1, 'Account Details Updated', 'You have successfully update your account details.', 1, 1, '2016-12-01 12:04:09'),
(64, 1, 'Admin Account Details Updated', 'You have successfully updated (Other Guy) account details.', 1, 1, '2016-12-01 12:07:18'),
(65, 1, 'Admin Account Details Updated', 'You have successfully updated (Other Guy) account details.', 1, 1, '2016-12-01 12:07:34'),
(66, 1, 'New Admin Account Created', 'You have successfully created a new admin account (Bob One).', 1, 1, '2016-12-01 12:08:01'),
(67, 1, 'Admin Account Password Reset', 'You have successfully changed (Bob One) account password.', 1, 1, '2016-12-01 12:14:34'),
(68, 1, 'Admin Account Details Updated', 'You have successfully updated (Bob One) account details.', 1, 1, '2016-12-01 12:14:34'),
(69, 1, 'Clinic Updated', 'You have successfully updated clinic (#10000038812).', 1, 1, '2016-12-01 12:16:27'),
(70, 1, 'Clinic Updated', 'You have successfully updated clinic (#10000038812).', 1, 1, '2016-12-01 12:16:36'),
(71, 1, 'Clinic Updated', 'You have successfully updated clinic (#10000038812).', 1, 1, '2016-12-01 12:17:01'),
(72, 10000896157, 'New Clinic Booking', 'You have successfully booked a clinic (#10000038812).', 0, 0, '2016-12-01 12:18:11'),
(73, 1, 'Clinic Deleted', 'You have successfully deleted (#10000684386) clinic details.', 1, 1, '2016-12-01 12:18:36'),
(74, 1, 'New Clinic Created ', 'You have successfully created a new clinic (#10000285870).', 1, 1, '2016-12-01 13:14:39'),
(75, 1, 'New Clinic Created ', 'You have successfully created a new clinic (#10000342506).', 1, 1, '2016-12-01 13:21:34'),
(76, 1, 'Clinic Updated', 'You have successfully updated clinic (#10000342506).', 1, 1, '2016-12-01 13:44:33'),
(77, 1, 'Admin Account Details Updated', 'You have successfully updated (Another Guy) account details.', 1, 1, '2016-12-01 15:23:46'),
(78, 1, 'Hospital Updated', 'You have successfully updated hospital (Master Hospital).', 1, 1, '2016-12-06 11:30:58'),
(79, 1, 'Treatment Deleted', 'You have successfully deleted (Treat  C) treatment details.', 1, 1, '2016-12-06 11:31:24'),
(80, 1, 'New Treatment Created ', 'You have successfully created a new treatment (Treatment A).', 1, 1, '2016-12-06 11:31:45'),
(81, 1, 'New Treatment Created ', 'You have successfully created a new treatment (Treatment B).', 1, 1, '2016-12-06 11:32:06'),
(82, 1, 'Treatment Deleted', 'You have successfully deleted (Treat B) treatment details.', 1, 1, '2016-12-06 11:32:16'),
(83, 1, 'Treatment Deleted', 'You have successfully deleted (Update) treatment details.', 1, 1, '2016-12-06 11:32:19'),
(84, 1, 'Treatment Updated', 'You have successfully updated treatment (Treatment A).', 1, 1, '2016-12-06 11:32:31'),
(85, 1, 'Treatment Updated', 'You have successfully updated treatment (Treatment B).', 1, 1, '2016-12-06 11:32:47'),
(86, 1, 'New Room Created ', 'You have successfully created a new room (Hospital B - New Room).', 1, 1, '2016-12-06 11:38:07'),
(87, 1, 'Hospital Updated', 'You have successfully updated hospital (Hospital B).', 1, 1, '2016-12-06 11:38:37'),
(88, 1, 'Hospital Updated', 'You have successfully updated hospital (Hospital B).', 1, 1, '2016-12-06 11:38:45'),
(89, 1, 'Admin Account Details Updated', 'You have successfully updated (Another Guy) account details.', 1, 1, '2016-12-06 11:39:43'),
(90, 1, 'Admin Account Details Updated', 'You have successfully updated (Another Guy) account details.', 1, 1, '2016-12-06 11:41:59'),
(91, 1, 'Users Capabilities Updated', 'You have successfully updated users capabilities.', 1, 1, '2016-12-06 11:45:34'),
(92, 1, 'New Admin Account Created', 'You have successfully created a new admin account (Staff Person).', 1, 1, '2016-12-16 11:27:45'),
(93, 1, 'Admin Account Password Reset', 'You have successfully changed (Staff Person) account password.', 1, 1, '2016-12-16 11:28:19'),
(94, 1, 'Admin Account Details Updated', 'You have successfully updated (Staff Person) account details.', 1, 1, '2016-12-16 11:28:19'),
(95, 1, 'Admin Account Details Updated', 'You have successfully updated (Staff Person) account details.', 1, 1, '2016-12-16 11:35:31'),
(96, 1, 'Admin Account Details Updated', 'You have successfully updated (Staff Persin) account details.', 1, 1, '2016-12-16 11:47:11'),
(97, 1, 'Admin Account Details Updated', 'You have successfully updated (Staff Person) account details.', 1, 1, '2016-12-16 11:47:30'),
(98, 1, 'Admin Account Details Updated', 'You have successfully updated (Some Person) account details.', 1, 1, '2016-12-16 11:57:19'),
(99, 10000201680, 'New Clinic Booking', 'You have successfully booked a clinic (#10000342506).', 0, 0, '2016-12-16 11:59:15'),
(100, 10000201680, 'New Clinic Booking', 'You have successfully booked a clinic (#10000285870).', 0, 0, '2016-12-16 11:59:17'),
(101, 1, 'Hospital Updated', 'You have successfully updated hospital (Hospital B).', 1, 1, '2016-12-16 13:15:38'),
(102, 1, 'Hospital Updated', 'You have successfully updated hospital (Master Hospital).', 1, 1, '2016-12-16 14:56:00'),
(103, 1, 'New Hospital Created ', 'You have successfully created a new hospital (Royal Surrey County Hospital).', 1, 1, '2016-12-16 14:56:36'),
(104, 1, 'New Room Created ', 'You have successfully created a new room (Hello).', 1, 1, '2016-12-16 14:59:36'),
(105, 1, 'Hospital Updated', 'You have successfully updated hospital (Royal Surrey County Hospital).', 1, 1, '2016-12-16 15:03:51'),
(106, 1, 'Hospital Updated', 'You have successfully updated hospital (Royal Surrey County Hospital).', 1, 1, '2016-12-16 15:04:37'),
(107, 1, 'Hospital Updated', 'You have successfully updated hospital (Royal Surrey County Hospital).', 1, 1, '2016-12-16 15:05:16'),
(108, 10000896157, 'New Clinic Created ', 'You have successfully created a new clinic (#10000134575).', 0, 0, '2016-12-16 15:40:56'),
(109, 10000896157, 'Room Updated', 'You have successfully updated room (New Room).', 0, 0, '2016-12-16 15:49:21'),
(110, 10000201680, 'New Clinic Booking', 'You have successfully booked a clinic (#10000134575).', 0, 0, '2016-12-16 16:04:03'),
(111, 10000201680, 'Booking Cancelled', 'You have successfully cancelled booking (#10000938713)', 0, 0, '2016-12-16 16:04:19'),
(112, 1, 'New Clinic Created ', 'You have successfully created a new clinic (#10000572178).', 1, 1, '2016-12-19 12:22:58'),
(113, 10000201680, 'New Clinic Booking', 'You have successfully booked a clinic (#10000572178).', 0, 0, '2016-12-19 13:17:57'),
(114, 10000201680, 'Booking Cancelled', 'You have successfully cancelled booking (#10000938713)', 0, 0, '2016-12-19 13:18:33'),
(115, 10000201680, 'Booking Cancelled', 'You have successfully cancelled booking (#10000066138)', 0, 0, '2016-12-19 13:20:21'),
(116, 10000201680, 'Booking Cancelled', 'You have successfully cancelled booking (#10000112169)', 0, 0, '2016-12-19 13:20:26'),
(117, 10000201680, 'Booking Cancelled', 'You have successfully cancelled booking (#10000519686)', 0, 0, '2016-12-19 13:20:31'),
(118, 1, 'New Clinic Created ', 'You have successfully created a new clinic (#10000909088).', 1, 1, '2016-12-19 13:23:29'),
(119, 1, 'New Clinic Created ', 'You have successfully created a new clinic (#10000009834).', 1, 1, '2016-12-19 13:23:45'),
(120, 1, 'New Clinic Created ', 'You have successfully created a new clinic (#10000953672).', 1, 1, '2016-12-19 13:23:58'),
(121, 1, 'New Clinic Created ', 'You have successfully created a new clinic (#10000910436).', 1, 1, '2016-12-19 13:24:32'),
(122, 10000201680, 'New Clinic Booking', 'You have successfully booked a clinic (#10000953672).', 0, 0, '2016-12-19 13:26:06'),
(123, 10000201680, 'New Clinic Booking', 'You have successfully booked a clinic (#10000909088).', 0, 0, '2016-12-19 13:51:03'),
(124, 10000201680, 'Booking Cancelled', 'You have successfully cancelled booking (#10000572846)', 0, 0, '2016-12-19 13:56:36'),
(125, 10000201680, 'New Clinic Booking', 'You have successfully booked a clinic (#10000910436).', 0, 0, '2016-12-19 14:56:30'),
(126, 10000201680, 'New Clinic Booking', 'You have successfully booked a clinic (#10000009834).', 0, 0, '2016-12-19 14:56:34'),
(127, 1, 'New Hospital Created ', 'You have successfully created a new hospital (Kingston   Hospital).', 1, 1, '2016-12-20 10:20:33'),
(128, 1, 'Treatment Updated', 'You have successfully updated treatment (Treatment A).', 1, 1, '2016-12-20 11:22:25'),
(129, 1, 'Treatment Updated', 'You have successfully updated treatment (Treatment B).', 1, 1, '2016-12-20 11:22:38'),
(130, 1, 'New Hospital Created ', 'You have successfully created a new hospital (Royal Surrey County Hospital).', 1, 1, '2016-12-20 11:28:00'),
(131, 1, 'New Trial Created ', 'You have successfully created a new trial (2D + 3D vs 2D).', 1, 1, '2016-12-20 11:31:16'),
(132, 1, 'New Treatment Created ', 'You have successfully created a new treatment (2D Mammogram).', 1, 1, '2016-12-20 11:36:43'),
(133, 1, 'Treatment Updated', 'You have successfully updated treatment (2D Mammogra).', 1, 1, '2016-12-20 11:37:00'),
(134, 1, 'Treatment Updated', 'You have successfully updated treatment (2D Mammogram).', 1, 1, '2016-12-20 11:37:06'),
(135, 1, 'Treatment Deleted', 'You have successfully deleted (2D Mammogram) treatment details.', 1, 1, '2016-12-20 11:37:10'),
(136, 1, 'New Treatment Created ', 'You have successfully created a new treatment (2D Mammogram).', 1, 1, '2016-12-20 11:37:24'),
(137, 1, 'New Treatment Created ', 'You have successfully created a new treatment (2D + 3D Mammogram).', 1, 1, '2016-12-20 11:38:35'),
(138, 1, 'Hospital Updated', 'You have successfully updated hospital (Royal Surrey County Hospital).', 1, 1, '2016-12-20 11:38:50'),
(139, 1, 'New Hospital Created ', 'You have successfully created a new hospital (Kingston Hospital).', 1, 1, '2016-12-20 11:44:36'),
(140, 1, 'New Admin Account Created', 'You have successfully created a new admin account (Site Manager).', 1, 1, '2016-12-20 11:50:12'),
(141, 1, 'Admin Account Password Reset', 'You have successfully changed (Site Manager) account password.', 1, 1, '2016-12-20 11:50:25'),
(142, 1, 'Admin Account Details Updated', 'You have successfully updated (Site Manager) account details.', 1, 1, '2016-12-20 11:50:25'),
(143, 10000433114, 'New Room Created ', 'You have successfully created a new room (Reception 1).', 0, 0, '2016-12-20 11:51:16'),
(144, 10000433114, 'New Room Created ', 'You have successfully created a new room (Reception 2).', 0, 0, '2016-12-20 11:51:25'),
(145, 1, 'Hospital Updated', 'You have successfully updated hospital (Kingston Hospital).', 1, 1, '2016-12-20 11:52:16'),
(146, 1, 'Trial Updated', 'You have successfully updated trial (2D + 3D vs 2D).', 1, 1, '2016-12-20 11:52:35'),
(147, 1, 'New Treatment Created ', 'You have successfully created a new treatment (2D+3D Mamography).', 1, 1, '2016-12-20 12:05:09'),
(148, 1, 'New Treatment Created ', 'You have successfully created a new treatment (2D Mamography).', 1, 1, '2016-12-20 12:05:26'),
(149, 1, 'Trial Type Updated', 'You have successfully updated trial type (Batch Trial).', 1, 1, '2016-12-20 12:10:34'),
(150, 1, 'Trial Type Updated', 'You have successfully updated trial type (Clinical Trial).', 1, 1, '2016-12-20 12:10:39'),
(151, 1, 'New Hospital Created ', 'You have successfully created a new hospital (St Georges).', 1, 1, '2016-12-20 13:05:05'),
(152, 1, 'New Admin Account Created', 'You have successfully created a new admin account (Site Manager 2).', 1, 1, '2016-12-20 13:05:34'),
(153, 1, 'Admin Account Password Reset', 'You have successfully changed (Site Manager 2) account password.', 1, 1, '2016-12-20 13:06:13'),
(154, 1, 'Admin Account Details Updated', 'You have successfully updated (Site Manager 2) account details.', 1, 1, '2016-12-20 13:06:14'),
(155, 1, 'Trial Updated', 'You have successfully updated trial (2D + 3D vs 2D).', 1, 1, '2016-12-20 13:24:48'),
(156, 1, 'Trial Updated', 'You have successfully updated trial (2D + 3D vs 2D).', 1, 1, '2016-12-20 13:25:33'),
(157, 1, 'Trial Updated', 'You have successfully updated trial (2D + 3D vs 2D).', 1, 1, '2016-12-20 13:26:57'),
(158, 1, 'Trial Updated', 'You have successfully updated trial (2D + 3D vs 2D).', 1, 1, '2016-12-20 13:52:37'),
(159, 10000433114, 'New Clinic Created ', 'You have successfully created a new clinic (#10000827799).', 0, 0, '2016-12-20 14:01:58'),
(160, 10000433114, 'New Clinic Created ', 'You have successfully created a new clinic (#10000582659).', 0, 0, '2016-12-20 14:02:15'),
(161, 10000433114, 'New Clinic Created ', 'You have successfully created a new clinic (#10000757226).', 0, 0, '2016-12-20 14:02:32'),
(162, 10000433114, 'New Clinic Created ', 'You have successfully created a new clinic (#10000298221).', 0, 0, '2016-12-20 14:02:56'),
(163, 1, 'New Admin Account Created', 'You have successfully created a new admin account (Staff One).', 1, 1, '2016-12-20 14:03:47'),
(164, 1, 'Trial Deleted', 'You have successfully deleted (2D + 3D vs 2D) trial details.', 1, 1, '2016-12-21 15:16:57'),
(165, 1, 'New Treatment Created ', 'You have successfully created a new treatment (test).', 1, 1, '2016-12-22 11:15:15'),
(166, 1, 'Treatment Deleted', 'You have successfully deleted (test) treatment details.', 1, 1, '2016-12-22 11:40:16'),
(167, 1, 'New Treatment Created ', 'You have successfully created a new treatment (ewr).', 1, 1, '2016-12-23 11:41:08'),
(168, 1, 'New Treatment Created ', 'You have successfully created a new treatment (retert).', 1, 1, '2016-12-23 11:41:17'),
(169, 1, 'Treatment Deleted', 'You have successfully deleted (retert) treatment details.', 1, 1, '2016-12-23 13:03:43'),
(170, 1, 'Treatment Deleted', 'You have successfully deleted (ewr) treatment details.', 1, 1, '2016-12-23 13:03:48'),
(171, 10000815458, 'New Clinic Booking', 'You have successfully booked a clinic (#10000757226).', 0, 0, '2016-12-23 13:22:14'),
(172, 1, 'New Clinic Created ', 'You have successfully created a new clinic (#10000930032).', 1, 1, '2016-12-23 13:41:54'),
(173, 1, 'Clinic Deleted', 'You have successfully deleted (#10000930032) clinic details.', 1, 1, '2016-12-23 13:42:59'),
(174, 1, 'New Clinic Created ', 'You have successfully created a new clinic (#10000859937).', 1, 1, '2016-12-23 13:43:13'),
(175, 1, 'New Clinic Created ', 'You have successfully created a new clinic (#10000394432).', 1, 1, '2016-12-23 13:46:07'),
(176, 1, 'New Clinic Created ', 'You have successfully created a new clinic (#10000831494).', 1, 1, '2016-12-23 13:46:43'),
(177, 1, 'New Clinic Created ', 'You have successfully created a new clinic (#10000915326).', 1, 1, '2016-12-23 14:22:43'),
(178, 1, 'New Clinic Created ', 'You have successfully created a new clinic (#10000396369).', 1, 1, '2016-12-23 14:24:36'),
(179, 1, 'New Clinic Created ', 'You have successfully created a new clinic (#10000584563).', 1, 1, '2016-12-23 14:26:08'),
(180, 1, 'New Clinic Created ', 'You have successfully created a new clinic (#10000092300).', 1, 1, '2016-12-23 14:29:55'),
(181, 1, 'New Clinic Created ', 'You have successfully created a new clinic (#10000244211).', 1, 1, '2016-12-23 14:47:03'),
(182, 1, 'New Clinic Created ', 'You have successfully created a new clinic (#10000880753).', 1, 1, '2016-12-23 14:47:44'),
(183, 1, 'New Clinic Created ', 'You have successfully created a new clinic (#10000558828).', 1, 1, '2016-12-23 14:47:58'),
(184, 1, 'New Clinic Created ', 'You have successfully created a new clinic (#10000633512).', 1, 1, '2016-12-23 14:48:11'),
(185, 1, 'New Clinic Created ', 'You have successfully created a new clinic (#10000569813).', 1, 1, '2016-12-23 14:48:23'),
(186, 1, 'New Clinic Created ', 'You have successfully created a new clinic (#10000783867).', 1, 1, '2016-12-23 14:48:40'),
(187, 1, 'New Clinic Created ', 'You have successfully created a new clinic (#10000525982).', 1, 1, '2016-12-23 14:48:55'),
(188, 1, 'New Clinic Created ', 'You have successfully created a new clinic (#10000818510).', 1, 1, '2016-12-23 16:59:56'),
(189, 1, 'New Clinic Created ', 'You have successfully created a new clinic (#10000550378).', 1, 1, '2016-12-23 17:00:44'),
(190, 10000815458, 'New Clinic Booking', 'You have successfully booked a clinic (#10000880753).', 0, 0, '2016-12-25 00:55:10'),
(191, 10000815458, 'New Clinic Booking', 'You have successfully booked a clinic (#10000244211).', 0, 0, '2016-12-25 01:22:22'),
(192, 10000815458, 'New Clinic Booking', 'You have successfully booked a clinic (#10000558828).', 0, 0, '2016-12-25 01:22:25'),
(193, 10000815458, 'New Clinic Booking', 'You have successfully booked a clinic (#10000633512).', 0, 0, '2016-12-25 01:22:28'),
(194, 10000815458, 'New Clinic Booking', 'You have successfully booked a clinic (#10000569813).', 0, 0, '2016-12-25 01:22:31'),
(195, 10000815458, 'New Clinic Booking', 'You have successfully booked a clinic (#10000783867).', 0, 0, '2016-12-25 01:22:32'),
(196, 10000815458, 'New Clinic Booking', 'You have successfully booked a clinic (#10000794588).', 0, 0, '2016-12-28 14:42:02'),
(197, 10000815458, 'New Clinic Booking', 'You have successfully booked a clinic (#10000246567).', 0, 0, '2016-12-28 14:42:04'),
(198, 10000815458, 'New Clinic Booking', 'You have successfully booked a clinic (#10000759823).', 0, 0, '2016-12-28 14:42:08'),
(199, 10000815458, 'New Clinic Booking', 'You have successfully booked a clinic (#10000996662).', 0, 0, '2016-12-28 14:42:10'),
(200, 1, 'New Clinic Created ', 'You have successfully created a new clinic (#10000391132).', 1, 1, '2016-12-28 14:45:49'),
(201, 1, 'New Clinic Created ', 'You have successfully created a new clinic (#10000917589).', 1, 1, '2016-12-28 14:46:30'),
(202, 1, 'New Clinic Created ', 'You have successfully created a new clinic (#10000726917).', 1, 1, '2016-12-28 14:46:45'),
(203, 1, 'New Clinic Created ', 'You have successfully created a new clinic (#10000719373).', 1, 1, '2016-12-30 14:01:57'),
(204, 1, 'New Clinic Created ', 'You have successfully created a new clinic (#10000912512).', 1, 1, '2016-12-30 14:02:11'),
(205, 1, 'New Clinic Created ', 'You have successfully created a new clinic (#10000370576).', 1, 1, '2016-12-30 14:02:23'),
(206, 10000815458, 'New Clinic Booking', 'You have successfully booked a clinic (#10000370576).', 0, 0, '2016-12-30 14:03:35'),
(207, 10000815458, 'New Clinic Booking', 'You have successfully booked a clinic (#10000719373).', 0, 0, '2016-12-30 14:03:43'),
(208, 1, 'New Clinic Created ', 'You have successfully created a new clinic (#10000123322).', 1, 1, '2016-12-30 14:04:47'),
(209, 10000815458, 'New Clinic Booking', 'You have successfully booked a clinic (#10000123322).', 0, 0, '2016-12-30 14:05:01'),
(210, 1, 'New Clinic Created ', 'You have successfully created a new clinic (#10000124727).', 1, 1, '2016-12-30 14:05:37'),
(211, 10000815458, 'New Clinic Booking', 'You have successfully booked a clinic (#10000124727).', 0, 0, '2016-12-30 14:05:51'),
(212, 1, 'New Clinic Created ', 'You have successfully created a new clinic (#10000094915).', 1, 1, '2016-12-30 14:26:06'),
(213, 1, 'Admin Account Details Updated', 'You have successfully updated (Staff One) account details.', 1, 1, '2016-12-30 14:26:17'),
(214, 10000815458, 'New Clinic Booking', 'You have successfully booked a clinic (#10000094915).', 0, 0, '2016-12-30 14:27:05'),
(215, 10000815458, 'New Clinic Booking', 'You have successfully booked a clinic (#10000912512).', 0, 0, '2016-12-30 14:27:08'),
(216, 1, 'Hospital Deleted', 'You have successfully deleted (St Georges) class details.', 1, 1, '2017-01-06 14:10:58'),
(217, 1, 'New Hospital Created ', 'You have successfully created a new hospital (St George ).', 1, 1, '2017-01-06 14:11:28'),
(218, 1, 'Hospital Deleted', 'You have successfully deleted (St George ) class details.', 1, 1, '2017-01-06 14:15:38'),
(219, 1, 'New Hospital Created ', 'You have successfully created a new hospital (rewr).', 1, 1, '2017-01-06 14:16:38'),
(220, 1, 'Hospital Deleted', 'You have successfully deleted (rewr) class details.', 1, 1, '2017-01-06 14:19:47'),
(221, 1, 'New Hospital Created ', 'You have successfully created a new hospital (ewrwer).', 1, 1, '2017-01-06 14:20:28'),
(222, 1, 'New Hospital Created ', 'You have successfully created a new hospital (123tr).', 1, 1, '2017-01-06 14:20:45'),
(223, 1, 'Hospital Deleted', 'You have successfully deleted (123tr) class details.', 1, 1, '2017-01-06 14:21:03'),
(224, 1, 'Hospital Deleted', 'You have successfully deleted (ewrwer) class details.', 1, 1, '2017-01-06 14:21:09'),
(225, 1, 'Hospital Deleted', 'You have successfully deleted (Kingston Hospital) class details.', 1, 1, '2017-01-06 14:31:56'),
(226, 1, 'Hospital Deleted', 'You have successfully deleted (Royal Surrey County Hospital) class details.', 1, 1, '2017-01-06 14:31:58'),
(227, 1, 'New Hospital Created ', 'You have successfully created a new hospital (Kingston Hospital).', 1, 1, '2017-01-06 14:32:18'),
(228, 1, 'New Hospital Created ', 'You have successfully created a new hospital (Royal Surrey County Hospital).', 1, 1, '2017-01-06 14:32:50'),
(229, 1, 'Treatment Updated', 'You have successfully updated treatment (2D+3D Mamography).', 1, 1, '2017-01-06 15:25:13'),
(230, 1, 'Treatment Updated', 'You have successfully updated treatment (2D Mamography).', 1, 1, '2017-01-06 15:25:19'),
(231, 1, 'Treatment Updated', 'You have successfully updated treatment (test1).', 1, 1, '2017-01-06 15:25:24'),
(232, 1, 'Treatment Updated', 'You have successfully updated treatment (test2).', 1, 1, '2017-01-06 15:25:28'),
(233, 1, 'Clinic Deleted', 'You have successfully deleted (#10000412035) clinic details.', 1, 1, '2017-01-08 04:28:02'),
(234, 1, 'New Clinic Created ', 'You have successfully created a new clinic (#10000718887).', 1, 1, '2017-01-08 04:29:02'),
(235, 10000815458, 'New Clinic Booking', 'You have successfully booked a clinic (#10000718887).', 0, 0, '2017-01-09 10:37:08'),
(236, 1, 'New Clinic Created ', 'You have successfully created a new clinic (#10000509958).', 1, 1, '2017-01-09 10:54:20'),
(237, 10000815458, 'New Clinic Booking', 'You have successfully booked a clinic (#10000509958).', 0, 0, '2017-01-09 10:54:42'),
(238, 1, 'New Clinic Created ', 'You have successfully created a new clinic (#10000857512).', 1, 1, '2017-01-09 10:56:30'),
(239, 1, 'New Clinic Created ', 'You have successfully created a new clinic (#10000618094).', 1, 1, '2017-01-09 10:59:45'),
(240, 10000815458, 'New Clinic Booking', 'You have successfully booked a clinic (#10000857512).', 0, 0, '2017-01-09 16:11:20'),
(241, 10000815458, 'New Clinic Booking', 'You have successfully booked a clinic (#10000618094).', 0, 0, '2017-01-09 16:15:51'),
(242, 1, 'Treatment Deleted', 'You have successfully deleted (2D+3D Mamography) treatment details.', 1, 1, '2017-01-10 10:17:00'),
(243, 1, 'Treatment Deleted', 'You have successfully deleted (2D Mamography) treatment details.', 1, 1, '2017-01-10 10:17:02'),
(244, 1, 'Treatment Deleted', 'You have successfully deleted (test1) treatment details.', 1, 1, '2017-01-10 10:17:05'),
(245, 1, 'Treatment Deleted', 'You have successfully deleted (test2) treatment details.', 1, 1, '2017-01-10 10:17:08'),
(246, 1, 'New Hospital Created ', 'You have successfully created a new hospital (Kingston Hospital).', 1, 1, '2017-01-16 16:29:49'),
(247, 1, 'New Trial Created ', 'You have successfully created a new trial (test).', 1, 1, '2017-01-16 16:32:23'),
(248, 1, 'Hospital Updated', 'You have successfully updated hospital (Kingston Hospital).', 1, 1, '2017-01-16 16:33:05'),
(249, 1, 'New Hospital Created ', 'You have successfully created a new hospital (Royal Surrey County Hospital).', 1, 1, '2017-01-16 16:34:04'),
(250, 1, 'New Treatment Created ', 'You have successfully created a new treatment (2D).', 1, 1, '2017-01-16 16:36:45'),
(251, 1, 'New Treatment Created ', 'You have successfully created a new treatment (3D).', 1, 1, '2017-01-16 16:36:57'),
(252, 1, 'New Hospital Created ', 'You have successfully created a new hospital (St George Hospital).', 1, 1, '2017-01-16 16:37:29'),
(253, 1, 'Hospital Deleted', 'You have successfully deleted (Royal Surrey County Hospital) class details.', 1, 1, '2017-01-16 16:38:56'),
(254, 1, 'New Hospital Created ', 'You have successfully created a new hospital (Royal Surrey County Hospital).', 1, 1, '2017-01-16 16:40:55'),
(255, 1, 'New Trial Created ', 'You have successfully created a new trial (New Trial).', 1, 1, '2017-01-16 18:01:57'),
(256, 1, 'Hospital Updated', 'You have successfully updated hospital (St George Hospital).', 1, 1, '2017-01-16 18:02:17'),
(257, 1, 'Hospital Updated', 'You have successfully updated hospital (Royal Surrey County Hospital).', 1, 1, '2017-01-16 18:02:36'),
(258, 1, 'Hospital Updated', 'You have successfully updated hospital (Kingston Hospital).', 1, 1, '2017-01-16 18:02:58'),
(259, 1, 'New Room Created ', 'You have successfully created a new room (test).', 1, 1, '2017-01-17 10:21:39'),
(260, 1, 'Clinic Deleted', 'You have successfully deleted (#10000030788) clinic details.', 1, 1, '2017-01-17 10:22:41'),
(261, 1, 'New Clinic Created ', 'You have successfully created a new clinic (#10000811350).', 1, 1, '2017-01-17 10:23:09'),
(262, 1, 'New Admin Account Created', 'You have successfully created a new admin account (Test Account).', 1, 1, '2017-01-17 10:23:52'),
(263, 1, 'Admin Account Password Reset', 'You have successfully changed (Test Account) account password.', 1, 1, '2017-01-17 10:24:18'),
(264, 1, 'Admin Account Details Updated', 'You have successfully updated (Test Account) account details.', 1, 1, '2017-01-17 10:24:18'),
(265, 10000646644, 'New Clinic Booking', 'You have successfully booked a clinic (#10000811350).', 0, 0, '2017-01-17 10:24:35'),
(266, 1, 'Account Deleted', 'You have successfully deleted (Test Account) account.', 1, 1, '2017-01-17 11:35:54'),
(267, 1, 'New Admin Account Created', 'You have successfully created a new admin account (Test User).', 1, 1, '2017-01-17 11:36:10'),
(268, 1, 'Account Deleted', 'You have successfully deleted (Test User) account.', 1, 1, '2017-01-17 11:41:51'),
(269, 1, 'New Admin Account Created', 'You have successfully created a new admin account (Test User).', 1, 1, '2017-01-17 11:42:13'),
(270, 1, 'New Admin Account Created', 'You have successfully created a new admin account (Ta Nk).', 1, 1, '2017-01-17 11:45:49'),
(271, 1, 'New Admin Account Created', 'You have successfully created a new admin account (Tank You).', 1, 1, '2017-01-17 11:49:38'),
(272, 1, 'Account Deleted', 'You have successfully deleted (Tank You) account.', 1, 1, '2017-01-17 11:49:55'),
(273, 1, 'Treatment Deleted', 'You have successfully deleted (2D) treatment details.', 1, 1, '2017-01-25 09:08:22'),
(274, 1, 'Treatment Deleted', 'You have successfully deleted (3D) treatment details.', 1, 1, '2017-01-25 09:08:25'),
(275, 1, 'New Hospital Created ', 'You have successfully created a new hospital (Royal Surrey County Hospital).', 0, 0, '2017-01-25 10:38:33'),
(276, 1, 'New Trial Created ', 'You have successfully created a new trial (New Trial).', 0, 0, '2017-01-25 10:38:52'),
(277, 1, 'New Admin Account Created', 'You have successfully created a new admin account (Bob Dylan).', 0, 0, '2017-01-25 10:42:49'),
(278, 1, 'Admin Account Details Updated', 'You have successfully updated (Bob Dylan) account details.', 0, 0, '2017-01-25 10:47:56'),
(279, 1, 'New Treatment Created ', 'You have successfully created a new treatment (2D).', 0, 0, '2017-01-25 10:54:43'),
(280, 1, 'New Treatment Created ', 'You have successfully created a new treatment (3D).', 0, 0, '2017-01-25 10:55:47'),
(281, 1, 'New Room Created ', 'You have successfully created a new room (Room A).', 0, 0, '2017-01-25 10:57:12'),
(282, 1, 'New Room Created ', 'You have successfully created a new room (Room B).', 0, 0, '2017-01-25 10:57:22'),
(283, 1, 'New Hospital Created ', 'You have successfully created a new hospital (Kingston Hopsital).', 0, 0, '2017-01-25 11:01:19'),
(284, 1, 'Clinic Deleted', 'You have successfully deleted (#10000295118) clinic details.', 0, 0, '2017-01-25 11:02:45'),
(285, 1, 'New Clinic Created ', 'You have successfully created a new clinic (#10000446673).', 0, 0, '2017-01-25 11:03:17'),
(286, 10000643562, 'New Clinic Booking', 'You have successfully booked a clinic (#10000446673).', 0, 0, '2017-01-25 12:55:14'),
(287, 10000643562, 'Booking Cancelled', 'You have successfully cancelled booking (#10000785296)', 0, 0, '2017-01-25 12:57:54'),
(288, 1, 'New Clinic Created ', 'You have successfully created a new clinic (#10000010200).', 0, 0, '2017-01-25 13:00:05'),
(289, 1, 'New Clinic Created ', 'You have successfully created a new clinic (#10000544625).', 0, 0, '2017-01-25 13:00:20'),
(290, 1, 'Clinic Deleted', 'You have successfully deleted (#10000010200) clinic details.', 0, 0, '2017-01-25 13:06:35'),
(291, 1, 'Clinic Updated', 'You have successfully updated clinic (#10000948066).', 0, 0, '2017-01-25 14:07:21'),
(292, 1, 'Clinic Updated', 'You have successfully updated clinic (#10000948066).', 0, 0, '2017-01-25 14:07:32'),
(293, 1, 'Clinic Deleted', 'You have successfully deleted (#10000948066) clinic details.', 0, 0, '2017-01-25 14:07:48'),
(294, 1, 'New Clinic Created ', 'You have successfully created a new clinic (#10000025261).', 0, 0, '2017-01-25 14:08:04'),
(295, 10000643562, 'New Clinic Booking', 'You have successfully booked a clinic (#10000544625).', 0, 0, '2017-01-25 14:09:09'),
(296, 10000643562, 'New Clinic Booking', 'You have successfully booked a clinic (#10000025261).', 0, 0, '2017-01-25 14:18:57'),
(297, 1, 'Clinic Deleted', 'You have successfully deleted (#10000544625) clinic details.', 0, 0, '2017-01-25 14:26:55'),
(298, 1, 'Clinic Deleted', 'You have successfully deleted (#10000025261) clinic details.', 0, 0, '2017-01-25 14:26:57'),
(299, 1, 'New Clinic Created ', 'You have successfully created a new clinic (#10000821573).', 0, 0, '2017-01-25 14:27:11'),
(300, 1, 'New Clinic Created ', 'You have successfully created a new clinic (#10000884392).', 0, 0, '2017-01-25 14:27:23'),
(301, 10000643562, 'New Clinic Booking', 'You have successfully booked a clinic (#10000821573).', 0, 0, '2017-01-25 15:21:16'),
(302, 10000643562, 'New Clinic Booking', 'You have successfully booked a clinic (#10000884392).', 0, 0, '2017-01-25 15:22:06'),
(303, 1, 'New Clinic Created ', 'You have successfully created a new clinic (#10000405832).', 0, 0, '2017-01-25 15:30:07'),
(304, 1, 'New Clinic Created ', 'You have successfully created a new clinic (#10000277120).', 0, 0, '2017-01-25 15:30:19'),
(305, 10000643562, 'New Clinic Booking', 'You have successfully booked a clinic (#10000277120).', 0, 0, '2017-01-25 15:37:10'),
(306, 10000643562, 'New Clinic Booking', 'You have successfully booked a clinic (#10000277120,num).', 0, 0, '2017-01-25 15:51:12'),
(307, 10000643562, 'New Clinic Booking', 'You have successfully booked a clinic (#10000277120,num).', 0, 0, '2017-01-25 15:51:50'),
(308, 10000643562, 'New Clinic Booking', 'You have successfully booked a clinic (#10000405832,num).', 0, 0, '2017-01-25 15:52:02'),
(309, 10000643562, 'New Clinic Booking', 'You have successfully booked a clinic (#10000277120,num).', 0, 0, '2017-01-25 15:55:55'),
(310, 10000643562, 'New Clinic Booking', 'You have successfully booked a clinic (#10000277120).', 0, 0, '2017-01-25 15:57:13'),
(311, 10000643562, 'New Clinic Booking', 'You have successfully booked a clinic (#10000277120).', 0, 0, '2017-01-25 16:00:38'),
(312, 10000643562, 'New Clinic Booking', 'You have successfully booked a clinic (#10000277120).', 0, 0, '2017-01-25 16:01:16'),
(313, 10000643562, 'New Clinic Booking', 'You have successfully booked a clinic (#10000405832).', 0, 0, '2017-01-25 16:01:29'),
(314, 10000643562, 'New Clinic Booking', 'You have successfully booked a clinic (#10000277120).', 0, 0, '2017-01-25 16:02:16'),
(315, 10000643562, 'New Clinic Booking', 'You have successfully booked a clinic (#10000277120).', 0, 0, '2017-01-25 16:11:48'),
(316, 10000643562, 'New Clinic Booking', 'You have successfully booked a clinic (#10000405832).', 0, 0, '2017-01-25 16:12:15'),
(317, 10000643562, 'New Clinic Booking', 'You have successfully booked a clinic (#10000277120).', 0, 0, '2017-01-25 16:14:47'),
(318, 10000643562, 'New Clinic Booking', 'You have successfully booked a clinic (#10000277120).', 0, 0, '2017-01-25 16:19:08'),
(319, 10000643562, 'New Clinic Booking', 'You have successfully booked a clinic (#10000405832).', 0, 0, '2017-01-25 16:20:09'),
(320, 10000643562, 'New Clinic Booking', 'You have successfully booked a clinic (#10000277120).', 0, 0, '2017-01-25 16:20:43'),
(321, 10000643562, 'New Clinic Booking', 'You have successfully booked a clinic (#10000277120).', 0, 0, '2017-01-25 16:23:26'),
(322, 10000643562, 'New Clinic Booking', 'You have successfully booked a clinic (#10000405832).', 0, 0, '2017-01-25 16:24:50'),
(323, 10000643562, 'New Clinic Booking', 'You have successfully booked a clinic (#10000277120).', 0, 0, '2017-01-25 16:25:25'),
(324, 10000643562, 'New Clinic Booking', 'You have successfully booked a clinic (#10000405832).', 0, 0, '2017-01-25 16:26:20'),
(325, 10000643562, 'New Clinic Booking', 'You have successfully booked a clinic (#10000405832).', 0, 0, '2017-01-25 16:26:38'),
(326, 10000643562, 'New Clinic Booking', 'You have successfully booked a clinic (#10000277120).', 0, 0, '2017-01-25 16:28:41'),
(327, 10000643562, 'New Clinic Booking', 'You have successfully booked a clinic (#10000277120).', 0, 0, '2017-01-25 16:32:45'),
(328, 10000643562, 'New Clinic Booking', 'You have successfully booked a clinic (#<php echo $data->ID;?>).', 0, 0, '2017-01-25 16:45:10'),
(329, 10000643562, 'New Clinic Booking', 'You have successfully booked a clinic (#<php echo $data->ID;?>).', 0, 0, '2017-01-25 16:46:09'),
(330, 10000643562, 'New Clinic Booking', 'You have successfully booked a clinic (#<php echo $data->ID;?>).', 0, 0, '2017-01-25 16:50:41'),
(331, 10000643562, 'New Clinic Booking', 'You have successfully booked a clinic (#10000277120).', 0, 0, '2017-01-25 16:51:55'),
(332, 10000643562, 'New Clinic Booking', 'You have successfully booked a clinic (#10000277120).', 0, 0, '2017-01-25 17:02:36'),
(333, 10000643562, 'New Clinic Booking', 'You have successfully booked a clinic (#10000277120).', 0, 0, '2017-01-25 17:16:32'),
(334, 10000643562, 'New Clinic Booking', 'You have successfully booked a clinic (#10000277120).', 0, 0, '2017-01-25 17:23:19'),
(335, 10000643562, 'New Clinic Booking', 'You have successfully booked a clinic (#10000277120).', 0, 0, '2017-01-25 17:25:03'),
(336, 10000643562, 'New Clinic Booking', 'You have successfully booked a clinic (#10000277120).', 0, 0, '2017-01-25 17:31:47'),
(337, 10000643562, 'New Clinic Booking', 'You have successfully booked a clinic (#10000277120).', 0, 0, '2017-01-25 17:36:08'),
(338, 10000643562, 'New Clinic Booking', 'You have successfully booked a clinic (#10000405832).', 0, 0, '2017-01-25 17:37:02'),
(339, 10000643562, 'New Clinic Booking', 'You have successfully booked a clinic (#10000277120).', 0, 0, '2017-01-25 17:39:26'),
(340, 10000643562, 'New Clinic Booking', 'You have successfully booked a clinic (#10000277120).', 0, 0, '2017-01-25 17:40:50'),
(341, 10000643562, 'New Clinic Booking', 'You have successfully booked a clinic (#10000277120).', 0, 0, '2017-01-25 17:41:22'),
(342, 10000643562, 'New Clinic Booking', 'You have successfully booked a clinic (#10000277120).', 0, 0, '2017-01-25 17:45:16'),
(343, 10000643562, 'New Clinic Booking', 'You have successfully booked a clinic (#10000277120).', 0, 0, '2017-01-25 17:48:43'),
(344, 10000643562, 'New Clinic Booking', 'You have successfully booked a clinic (#10000277120).', 0, 0, '2017-01-25 17:49:39'),
(345, 10000643562, 'New Clinic Booking', 'You have successfully booked a clinic (#10000277120).', 0, 0, '2017-01-25 17:51:08'),
(346, 10000643562, 'New Clinic Booking', 'You have successfully booked a clinic (#10000405832).', 0, 0, '2017-01-25 17:51:20'),
(347, 10000643562, 'New Clinic Booking', 'You have successfully booked a clinic (#10000277120).', 0, 0, '2017-01-25 17:54:52'),
(348, 10000643562, 'New Clinic Booking', 'You have successfully booked a clinic (#10000277120).', 0, 0, '2017-01-25 17:57:46'),
(349, 10000643562, 'New Clinic Booking', 'You have successfully booked a clinic (#10000405832).', 0, 0, '2017-01-25 17:58:15'),
(350, 10000643562, 'New Clinic Booking', 'You have successfully booked a clinic (#10000277120).', 0, 0, '2017-01-25 17:58:57'),
(351, 10000643562, 'New Clinic Booking', 'You have successfully booked a clinic (#10000277120).', 0, 0, '2017-01-25 17:59:19'),
(352, 10000643562, 'New Clinic Booking', 'You have successfully booked a clinic (#10000277120).', 0, 0, '2017-01-25 17:59:38'),
(353, 10000643562, 'New Clinic Booking', 'You have successfully booked a clinic (#10000277120).', 0, 0, '2017-01-25 18:00:20'),
(354, 10000643562, 'New Clinic Booking', 'You have successfully booked a clinic (#10000277120).', 0, 0, '2017-01-25 18:01:35'),
(355, 10000643562, 'New Clinic Booking', 'You have successfully booked a clinic (#10000405832).', 0, 0, '2017-01-25 18:01:45'),
(356, 10000643562, 'New Clinic Booking', 'You have successfully booked a clinic (#10000277120).', 0, 0, '2017-01-25 18:02:20'),
(357, 10000643562, 'New Clinic Booking', 'You have successfully booked a clinic (#10000277120).', 0, 0, '2017-01-25 18:04:28'),
(358, 10000643562, 'New Clinic Booking', 'You have successfully booked a clinic (#10000405832).', 0, 0, '2017-01-25 18:05:04'),
(359, 10000643562, 'New Clinic Booking', 'You have successfully booked a clinic (#10000277120).', 0, 0, '2017-01-25 18:06:44'),
(360, 10000643562, 'New Clinic Booking', 'You have successfully booked a clinic (#10000277120).', 0, 0, '2017-01-25 18:08:31'),
(361, 10000643562, 'New Clinic Booking', 'You have successfully booked a clinic (#10000277120).', 0, 0, '2017-01-25 18:09:44'),
(362, 10000643562, 'New Clinic Booking', 'You have successfully booked a clinic (#10000405832).', 0, 0, '2017-01-25 18:10:02'),
(363, 10000643562, 'New Clinic Booking', 'You have successfully booked a clinic (#10000277120).', 0, 0, '2017-01-25 18:10:24'),
(364, 10000643562, 'New Clinic Booking', 'You have successfully booked a clinic (#10000405832).', 0, 0, '2017-01-25 18:10:29'),
(365, 10000643562, 'New Clinic Booking', 'You have successfully booked a clinic (#10000277120).', 0, 0, '2017-01-25 18:11:39'),
(366, 10000643562, 'New Clinic Booking', 'You have successfully booked a clinic (#10000405832).', 0, 0, '2017-01-25 18:11:44'),
(367, 10000643562, 'New Clinic Booking', 'You have successfully booked a clinic (#10000405832).', 0, 0, '2017-01-25 18:11:57'),
(368, 10000643562, 'New Clinic Booking', 'You have successfully booked a clinic (#10000277120).', 0, 0, '2017-01-25 18:12:35'),
(369, 10000643562, 'New Clinic Booking', 'You have successfully booked a clinic (#10000277120).', 0, 0, '2017-01-25 18:13:01'),
(370, 10000643562, 'New Clinic Booking', 'You have successfully booked a clinic (#10000277120).', 0, 0, '2017-01-25 18:13:37'),
(371, 10000643562, 'New Clinic Booking', 'You have successfully booked a clinic (#10000277120).', 0, 0, '2017-01-25 18:14:25'),
(372, 10000643562, 'New Clinic Booking', 'You have successfully booked a clinic (#10000405832).', 0, 0, '2017-01-25 18:14:33'),
(373, 10000643562, 'New Clinic Booking', 'You have successfully booked a clinic (#10000277120).', 0, 0, '2017-01-25 18:14:54'),
(374, 10000643562, 'New Clinic Booking', 'You have successfully booked a clinic (#10000277120).', 0, 0, '2017-01-25 18:16:26'),
(375, 10000643562, 'New Clinic Booking', 'You have successfully booked a clinic (#10000277120).', 0, 0, '2017-01-25 18:17:16'),
(376, 10000643562, 'New Clinic Booking', 'You have successfully booked a clinic (#10000277120).', 0, 0, '2017-01-25 18:18:29'),
(377, 10000643562, 'New Clinic Booking', 'You have successfully booked a clinic (#10000405832).', 0, 0, '2017-01-25 18:18:38'),
(378, 10000643562, 'New Clinic Booking', 'You have successfully booked a clinic (#10000277120).', 0, 0, '2017-01-25 18:19:51'),
(379, 10000643562, 'New Clinic Booking', 'You have successfully booked a clinic (#10000405832).', 0, 0, '2017-01-25 18:24:30'),
(380, 10000643562, 'New Clinic Booking', 'You have successfully booked a clinic (#10000277120).', 0, 0, '2017-01-25 18:27:07'),
(381, 10000643562, 'New Clinic Booking', 'You have successfully booked a clinic (#10000277120).', 0, 0, '2017-01-25 18:28:21'),
(382, 10000643562, 'New Clinic Booking', 'You have successfully booked a clinic (#10000405832).', 0, 0, '2017-01-25 18:28:36'),
(383, 10000643562, 'New Clinic Booking', 'You have successfully booked a clinic (#10000277120).', 0, 0, '2017-01-25 18:31:31'),
(384, 10000643562, 'New Clinic Booking', 'You have successfully booked a clinic (#10000405832).', 0, 0, '2017-01-25 18:33:39'),
(385, 10000643562, 'New Clinic Booking', 'You have successfully finalised a Clinic (#10000277120).', 0, 0, '2017-01-26 12:07:27'),
(386, 10000643562, 'New Clinic Booking', 'You have successfully finalised a Clinic (#10000405832).', 0, 0, '2017-01-26 13:31:02'),
(387, 10000643562, 'New Clinic Booking', 'You have successfully finalised a Clinic (#10000277120).', 0, 0, '2017-01-26 13:31:13'),
(388, 1, 'Treatment Deleted', 'You have successfully deleted (2D) treatment details.', 0, 0, '2017-01-26 13:40:51'),
(389, 1, 'Treatment Deleted', 'You have successfully deleted (3D) treatment details.', 0, 0, '2017-01-26 13:40:54'),
(390, 1, 'New Hospital Created ', 'You have successfully created a new hospital (Royal Surrey County Hospital).', 0, 0, '2017-01-26 13:44:57'),
(391, 1, 'New Trial Created ', 'You have successfully created a new trial (New Trial).', 0, 0, '2017-01-26 13:45:46'),
(392, 1, 'Trial Deleted', 'You have successfully deleted (New Trial) trial details.', 0, 0, '2017-01-26 13:48:51'),
(393, 1, 'New Trial Created ', 'You have successfully created a new trial (New Trial).', 0, 0, '2017-01-26 13:49:09'),
(394, 1, 'New Hospital Created ', 'You have successfully created a new hospital (Kingston Hospital).', 0, 0, '2017-01-26 13:52:54'),
(395, 1, 'New Treatment Created ', 'You have successfully created a new treatment (2D).', 0, 0, '2017-01-26 13:55:02'),
(396, 1, 'New Treatment Created ', 'You have successfully created a new treatment (3D).', 0, 0, '2017-01-26 13:55:13'),
(397, 1, 'New Room Created ', 'You have successfully created a new room (Room 1a).', 0, 0, '2017-01-26 13:58:35'),
(398, 1, 'New Room Created ', 'You have successfully created a new room (Room 1b).', 0, 0, '2017-01-26 13:58:42'),
(399, 1, 'New Room Created ', 'You have successfully created a new room (room 1a).', 0, 0, '2017-01-26 13:58:51'),
(400, 1, 'New Room Created ', 'You have successfully created a new room (room 1b).', 0, 0, '2017-01-26 13:58:56'),
(401, 1, 'New Clinic Created ', 'You have successfully created a new clinic (#10000682319).', 0, 0, '2017-01-26 13:59:17'),
(402, 1, 'New Clinic Created ', 'You have successfully created a new clinic (#10000224483).', 0, 0, '2017-01-26 14:00:09');
INSERT INTO `tbl_notifications` (`ID`, `user_id`, `title`, `notification`, `read`, `hide`, `date`) VALUES
(403, 1, 'New Admin Account Created', 'You have successfully created a new admin account (David Bowie).', 0, 0, '2017-01-26 14:01:49'),
(404, 10000785321, 'New Clinic Booking', 'You have successfully finalised a Clinic (#10000224483).', 0, 0, '2017-01-26 14:08:38'),
(405, 1, 'New Treatment Created ', 'You have successfully created a new treatment (dfsfs).', 0, 0, '2017-01-26 15:32:07'),
(406, 1, 'Treatment Deleted', 'You have successfully deleted (dfsfs) treatment details.', 0, 0, '2017-01-26 15:32:12'),
(407, 1, 'New Treatment Created ', 'You have successfully created a new treatment (coffee).', 0, 0, '2017-01-26 15:34:46'),
(408, 1, 'Treatment Deleted', 'You have successfully deleted (coffee) treatment details.', 0, 0, '2017-01-26 15:50:14'),
(409, 1, 'Treatment Updated', 'You have successfully updated treatment (3D).', 0, 0, '2017-01-26 15:50:39'),
(410, 1, 'Treatment Updated', 'You have successfully updated treatment (2D).', 0, 0, '2017-01-26 15:50:46'),
(411, 1, 'Treatment Updated', 'You have successfully updated treatment (3D).', 0, 0, '2017-01-26 15:56:53'),
(412, 10000785321, 'New Clinic Booking', 'You have successfully finalised a Clinic (#10000682319).', 0, 0, '2017-01-26 16:39:25'),
(413, 1, 'Treatment Deleted', 'You have successfully deleted (2D) treatment details.', 0, 0, '2017-01-27 10:23:50'),
(414, 1, 'Treatment Deleted', 'You have successfully deleted (3D) treatment details.', 0, 0, '2017-01-27 10:23:53');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_options`
--

CREATE TABLE `tbl_options` (
  `ID` bigint(20) NOT NULL,
  `option_name` text NOT NULL,
  `option_value` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_options`
--

INSERT INTO `tbl_options` (`ID`, `option_name`, `option_value`) VALUES
(1, 'maintenance_mode', '0'),
(2, 'site_name', 'Prospects'),
(3, 'site_url', 'http://localhost/mexa'),
(4, 'admin_email', 'info@prospectstrails.com'),
(5, 'website_contact_email', ''),
(6, 'website_contact_phone', ''),
(7, 'website_domain', ''),
(8, 'site_description', 'Clinical Trial Platform and Management Portal'),
(9, 'site_contact_email', 'info@prospectstrails.com'),
(10, 'site_contact_phone', '010234234'),
(11, 'site_domain', 'prospectstrails.com'),
(12, 'users_capabilities', 's:1883:"a:3:{s:12:"site_manager";a:25:{s:13:"view_hospital";i:0;s:13:"edit_hospital";i:0;s:9:"view_room";i:1;s:8:"add_room";i:1;s:9:"edit_room";i:1;s:11:"delete_room";i:1;s:10:"view_trial";i:1;s:9:"add_trial";i:0;s:10:"edit_trial";i:0;s:12:"delete_trial";i:0;s:15:"view_trial_type";i:0;s:14:"add_trial_type";i:0;s:15:"edit_trial_type";i:0;s:17:"delete_trial_type";i:0;s:14:"view_treatment";i:1;s:13:"add_treatment";i:0;s:14:"edit_treatment";i:0;s:16:"delete_treatment";i:0;s:11:"view_clinic";i:1;s:10:"add_clinic";i:1;s:11:"edit_clinic";i:1;s:13:"delete_clinic";i:1;s:12:"view_booking";i:0;s:12:"make_booking";i:0;s:14:"cancel_booking";i:1;}s:13:"trial_manager";a:25:{s:13:"view_hospital";i:0;s:13:"edit_hospital";i:0;s:9:"view_room";i:0;s:8:"add_room";i:0;s:9:"edit_room";i:0;s:11:"delete_room";i:0;s:10:"view_trial";i:1;s:9:"add_trial";i:1;s:10:"edit_trial";i:1;s:12:"delete_trial";i:1;s:15:"view_trial_type";i:1;s:14:"add_trial_type";i:1;s:15:"edit_trial_type";i:1;s:17:"delete_trial_type";i:1;s:14:"view_treatment";i:1;s:13:"add_treatment";i:1;s:14:"edit_treatment";i:1;s:16:"delete_treatment";i:1;s:11:"view_clinic";i:1;s:10:"add_clinic";i:1;s:11:"edit_clinic";i:1;s:13:"delete_clinic";i:1;s:12:"view_booking";i:0;s:12:"make_booking";i:0;s:14:"cancel_booking";i:0;}s:5:"staff";a:25:{s:13:"view_hospital";i:0;s:13:"edit_hospital";i:0;s:9:"view_room";i:0;s:8:"add_room";i:0;s:9:"edit_room";i:0;s:11:"delete_room";i:0;s:10:"view_trial";i:0;s:9:"add_trial";i:0;s:10:"edit_trial";i:0;s:12:"delete_trial";i:0;s:15:"view_trial_type";i:0;s:14:"add_trial_type";i:0;s:15:"edit_trial_type";i:0;s:17:"delete_trial_type";i:0;s:14:"view_treatment";i:0;s:13:"add_treatment";i:0;s:14:"edit_treatment";i:0;s:16:"delete_treatment";i:0;s:11:"view_clinic";i:0;s:10:"add_clinic";i:0;s:11:"edit_clinic";i:0;s:13:"delete_clinic";i:0;s:12:"view_booking";i:1;s:12:"make_booking";i:1;s:14:"cancel_booking";i:1;}}";');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_randomised`
--

CREATE TABLE `tbl_randomised` (
  `ID` int(11) NOT NULL,
  `HospitalID` text NOT NULL,
  `TrialID` text NOT NULL,
  `TotTreat` int(100) DEFAULT NULL,
  `ClinicsNum` text,
  `RandomString` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_rand_types`
--

CREATE TABLE `tbl_rand_types` (
  `ID` bigint(20) NOT NULL,
  `hospital` bigint(20) DEFAULT NULL,
  `name` varchar(1024) NOT NULL,
  `description` text NOT NULL,
  `created_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_rand_types`
--

INSERT INTO `tbl_rand_types` (`ID`, `hospital`, `name`, `description`, `created_on`) VALUES
(10000481395, 10000426296, 'By Site', '', '2016-11-28 21:41:42');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_rooms`
--

CREATE TABLE `tbl_rooms` (
  `ID` bigint(20) NOT NULL,
  `hospital` bigint(20) NOT NULL,
  `name` text NOT NULL,
  `created_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_test`
--

CREATE TABLE `tbl_test` (
  `ID` int(11) NOT NULL,
  `data1` int(11) NOT NULL,
  `data2` int(11) NOT NULL,
  `data3` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_treatments`
--

CREATE TABLE `tbl_treatments` (
  `ID` bigint(20) NOT NULL,
  `hospital` bigint(20) NOT NULL,
  `trial` bigint(20) NOT NULL,
  `name` varchar(1024) NOT NULL,
  `weight` int(2) NOT NULL,
  `created_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `colour` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_trials`
--

CREATE TABLE `tbl_trials` (
  `ID` bigint(20) NOT NULL,
  `hospital` text NOT NULL,
  `name` varchar(1024) NOT NULL,
  `description` text NOT NULL,
  `type` bigint(20) NOT NULL,
  `participants` bigint(20) NOT NULL,
  `created_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `randomised` tinyint(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_trial_types`
--

CREATE TABLE `tbl_trial_types` (
  `ID` bigint(20) NOT NULL,
  `hospital` bigint(20) NOT NULL,
  `name` varchar(1024) NOT NULL,
  `description` text NOT NULL,
  `created_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_trial_types`
--

INSERT INTO `tbl_trial_types` (`ID`, `hospital`, `name`, `description`, `created_on`) VALUES
(10000481395, 10000328661, 'Clinical Trial', '', '2016-11-28 21:41:42'),
(10000912547, 10000328661, 'Batch Trial', '', '2016-11-28 21:41:58');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_usermeta`
--

CREATE TABLE `tbl_usermeta` (
  `ID` bigint(20) NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `meta_key` text NOT NULL,
  `meta_value` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_usermeta`
--

INSERT INTO `tbl_usermeta` (`ID`, `user_id`, `meta_key`, `meta_value`) VALUES
(1, 2147483647, 'gender', 'Male'),
(2, 2147483647, 'dob', '2016-11-01 12:00:00'),
(3, 2147483647, 'user_phone', ''),
(4, 2147483647, 'profile_img', ''),
(5, 10000415750, 'gender', 'Male'),
(6, 10000415750, 'dob', '2016-11-01 12:00:00'),
(7, 10000415750, 'user_phone', ''),
(8, 10000415750, 'profile_img', '/content/assets/img/user.png'),
(9, 1, 'gender', 'Male'),
(10, 1, 'dob', '2016-12-14 12:00:00'),
(11, 1, 'user_phone', ''),
(12, 1, 'profile_img', '/content/assets/img/user.png'),
(13, 10000896157, 'gender', 'Female'),
(14, 10000896157, 'dob', '1987-12-08 12:00:00'),
(15, 10000896157, 'user_phone', ''),
(16, 10000896157, 'profile_img', '/content/assets/img/user.png'),
(17, 10000201680, 'gender', 'Male'),
(18, 10000201680, 'dob', '2016-12-04 12:00:00'),
(19, 10000201680, 'user_phone', '02081231234'),
(20, 10000201680, 'profile_img', '/content/assets/img/user.png'),
(21, 10000433114, 'gender', 'Male'),
(22, 10000433114, 'dob', '2016-11-15 12:00:00'),
(23, 10000433114, 'user_phone', ''),
(24, 10000433114, 'profile_img', '/content/assets/img/user.png'),
(25, 10000800380, 'gender', 'Female'),
(26, 10000800380, 'dob', '2016-12-12 12:00:00'),
(27, 10000800380, 'user_phone', ''),
(28, 10000800380, 'profile_img', '/content/assets/img/user.png'),
(29, 10000815458, 'gender', 'Male'),
(30, 10000815458, 'dob', '2016-09-05 12:00:00'),
(31, 10000815458, 'user_phone', ''),
(32, 10000815458, 'profile_img', '/content/assets/img/user.png'),
(43, 10000081100, 'user_phone', ''),
(44, 10000081100, 'profile_img', ''),
(42, 10000081100, 'dob', '2017-01-15 12:00:00'),
(41, 10000081100, 'gender', 'Male'),
(45, 10000027446, 'gender', 'Male'),
(46, 10000027446, 'dob', '2017-01-09 12:00:00'),
(47, 10000027446, 'user_phone', ''),
(48, 10000027446, 'profile_img', ''),
(55, 10000643562, 'user_phone', ''),
(54, 10000643562, 'dob', '2017-01-01 12:00:00'),
(53, 10000643562, 'gender', 'Male'),
(56, 10000643562, 'profile_img', '/content/assets/img/user.png'),
(57, 10000785321, 'gender', 'Male'),
(58, 10000785321, 'dob', '1998-01-23 12:00:00'),
(59, 10000785321, 'user_phone', ''),
(60, 10000785321, 'profile_img', '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_users`
--

CREATE TABLE `tbl_users` (
  `ID` bigint(20) NOT NULL,
  `user_email` varchar(512) NOT NULL,
  `user_pass` varchar(512) NOT NULL,
  `first_name` varchar(256) NOT NULL,
  `last_name` varchar(256) NOT NULL,
  `user_role` varchar(256) NOT NULL,
  `user_status` int(11) NOT NULL,
  `hospital` bigint(20) NOT NULL,
  `registered_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_users`
--

INSERT INTO `tbl_users` (`ID`, `user_email`, `user_pass`, `first_name`, `last_name`, `user_role`, `user_status`, `hospital`, `registered_at`) VALUES
(1, 'admin@admin.com', '21232f297a57a5a743894a0e4a801fc3', 'Mazen', 'Sehgal', 'admin', 1, 0, '2016-06-14 09:35:48');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_access_log`
--
ALTER TABLE `tbl_access_log`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tbl_bookings`
--
ALTER TABLE `tbl_bookings`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tbl_clinics`
--
ALTER TABLE `tbl_clinics`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tbl_done`
--
ALTER TABLE `tbl_done`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tbl_hospitals`
--
ALTER TABLE `tbl_hospitals`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tbl_key`
--
ALTER TABLE `tbl_key`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tbl_notifications`
--
ALTER TABLE `tbl_notifications`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tbl_options`
--
ALTER TABLE `tbl_options`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tbl_randomised`
--
ALTER TABLE `tbl_randomised`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tbl_rand_types`
--
ALTER TABLE `tbl_rand_types`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tbl_rooms`
--
ALTER TABLE `tbl_rooms`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tbl_test`
--
ALTER TABLE `tbl_test`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tbl_trials`
--
ALTER TABLE `tbl_trials`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tbl_trial_types`
--
ALTER TABLE `tbl_trial_types`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tbl_usermeta`
--
ALTER TABLE `tbl_usermeta`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tbl_users`
--
ALTER TABLE `tbl_users`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_access_log`
--
ALTER TABLE `tbl_access_log`
  MODIFY `ID` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=96;
--
-- AUTO_INCREMENT for table `tbl_bookings`
--
ALTER TABLE `tbl_bookings`
  MODIFY `ID` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10000685221;
--
-- AUTO_INCREMENT for table `tbl_clinics`
--
ALTER TABLE `tbl_clinics`
  MODIFY `ID` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10000682320;
--
-- AUTO_INCREMENT for table `tbl_done`
--
ALTER TABLE `tbl_done`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `tbl_hospitals`
--
ALTER TABLE `tbl_hospitals`
  MODIFY `ID` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10000999074;
--
-- AUTO_INCREMENT for table `tbl_key`
--
ALTER TABLE `tbl_key`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=394;
--
-- AUTO_INCREMENT for table `tbl_notifications`
--
ALTER TABLE `tbl_notifications`
  MODIFY `ID` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=415;
--
-- AUTO_INCREMENT for table `tbl_options`
--
ALTER TABLE `tbl_options`
  MODIFY `ID` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `tbl_randomised`
--
ALTER TABLE `tbl_randomised`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=331;
--
-- AUTO_INCREMENT for table `tbl_rand_types`
--
ALTER TABLE `tbl_rand_types`
  MODIFY `ID` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10000912549;
--
-- AUTO_INCREMENT for table `tbl_rooms`
--
ALTER TABLE `tbl_rooms`
  MODIFY `ID` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10000875749;
--
-- AUTO_INCREMENT for table `tbl_test`
--
ALTER TABLE `tbl_test`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_trials`
--
ALTER TABLE `tbl_trials`
  MODIFY `ID` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10000963611;
--
-- AUTO_INCREMENT for table `tbl_trial_types`
--
ALTER TABLE `tbl_trial_types`
  MODIFY `ID` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10000912548;
--
-- AUTO_INCREMENT for table `tbl_usermeta`
--
ALTER TABLE `tbl_usermeta`
  MODIFY `ID` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;
--
-- AUTO_INCREMENT for table `tbl_users`
--
ALTER TABLE `tbl_users`
  MODIFY `ID` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10000896158;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
