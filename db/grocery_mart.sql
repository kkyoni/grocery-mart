-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Nov 29, 2022 at 10:41 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `grocery_mart`
--

-- --------------------------------------------------------

--
-- Table structure for table `blog`
--

CREATE TABLE `blog` (
  `id` int(11) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `blog`
--

INSERT INTO `blog` (`id`, `title`, `description`, `image`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Id est laborum et dolorum', 'Sed luctus orci sit amet tempor luctus. Nullam non felis massa. Phasellus vitae fringilla sapien.\r\n\r\nSed luctus orci sit amet tempor luctus. Nullam non felis massa. Phasellus vitae fringilla sapien, quis dictum mi. Quisque consectetur egestas.Lorem ipsum dolor sit amet, consectetur adipiscing elit.', 'blog4.jpg', '2022-11-07 10:10:15', '2022-11-06 18:30:00', NULL),
(2, 'Deleniti atque corrupti', 'Sed luctus orci sit amet tempor luctus. Nullam non felis massa. Phasellus vitae fringilla sapien.\r\n\r\nSed luctus orci sit amet tempor luctus. Nullam non felis massa. Phasellus vitae fringilla sapien, quis dictum mi. Quisque consectetur egestas.Lorem ipsum dolor sit amet, consectetur adipiscing elit.', 'blog3.jpg', '2022-11-07 10:10:15', '2022-11-06 18:30:00', NULL),
(3, 'Et iusto odio dignissimos', 'Sed luctus orci sit amet tempor luctus. Nullam non felis massa. Phasellus vitae fringilla sapien.\r\n\r\nSed luctus orci sit amet tempor luctus. Nullam non felis massa. Phasellus vitae fringilla sapien, quis dictum mi. Quisque consectetur egestas.Lorem ipsum dolor sit amet, consectetur adipiscing elit.', 'blog2.jpg', '2022-11-07 10:10:15', '2022-11-06 18:30:00', NULL),
(4, 'At vero eos et accusamus', 'Sed luctus orci sit amet tempor luctus. Nullam non felis massa. Phasellus vitae fringilla sapien.\r\n\r\nSed luctus orci sit amet tempor luctus. Nullam non felis massa. Phasellus vitae fringilla sapien, quis dictum mi. Quisque consectetur egestas.Lorem ipsum dolor sit amet, consectetur adipiscing elit.', 'blog1.jpg', '2022-11-07 10:10:15', '2022-11-06 18:30:00', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `brand`
--

CREATE TABLE `brand` (
  `id` int(11) NOT NULL,
  `brand_name` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `brand`
--

INSERT INTO `brand` (`id`, `brand_name`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Adilaid', '2022-11-07 06:33:46', '2022-11-07 06:33:46', NULL),
(2, 'American Garden', '2022-11-07 06:33:46', '2022-11-07 06:33:46', NULL),
(3, 'Being Bania', '2022-11-07 06:33:46', '2022-11-07 06:33:46', NULL),
(4, 'BudhRam', '2022-11-07 06:33:46', '2022-11-07 06:33:46', NULL),
(5, 'Aachi', '2022-11-07 06:33:46', '2022-11-07 06:33:46', NULL),
(6, 'Daily Food', '2022-11-07 06:33:46', '2022-11-07 06:33:46', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `brand_id` varchar(255) DEFAULT NULL,
  `categories_name` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `brand_id`, `categories_name`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, '1', 'Ready Meal & Mixes', '2022-11-07 07:33:46', '2022-11-07 06:24:23', NULL),
(2, '2', 'Food Combo', '2022-11-07 07:33:46', '2022-11-07 06:24:23', NULL),
(3, '3', 'Kitchen Tools', '2022-11-07 07:33:46', '2022-11-07 06:24:23', NULL),
(4, '4', 'Cookware', '2022-11-07 07:33:46', '2022-11-07 06:24:23', NULL),
(5, '5', 'Outdoor Cooking', '2022-11-07 07:33:46', '2022-11-07 06:24:23', NULL),
(6, '6', 'Hand Juicers', '2022-11-07 07:33:46', '2022-11-07 06:24:23', NULL),
(7, '1', 'Chocolates', '2022-11-07 07:33:46', '2022-11-07 06:24:23', NULL),
(8, '2', 'Dry Fruit, Nut & Seed', '2022-11-07 07:33:46', '2022-11-07 06:24:23', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8_unicode_ci NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(36, '0000_00_00_000000_create_settings_table', 1),
(37, '2014_10_10_145334_create_states_table', 1),
(38, '2014_10_10_145359_create_cities_table', 1),
(39, '2014_10_11_000001_create_users_table', 1),
(40, '2014_10_12_000000_create_conversions_table', 1),
(41, '2014_10_12_000000_create_emergency_details_table', 1),
(42, '2014_10_12_000000_create_preferences_table', 1),
(43, '2014_10_12_000000_create_promocodes_table', 1),
(44, '2014_10_12_100000_create_password_resets_table', 1),
(45, '2019_10_12_000000_create_bookings_table', 1),
(46, '2019_10_12_000002_create_notifications_table', 1),
(47, '2019_10_12_000003_create_transaction_detail_table', 1),
(48, '2019_10_12_0000056_create_rating_reviews_table', 1),
(49, '2019_10_30_000000_create_vehicles_table', 1),
(50, '2019_11_05_102913_create_driver_details_table', 1),
(51, '2019_11_06_083424_create_wallets_table', 1),
(52, '2019_11_07_054656_create_card_details_table', 1),
(53, '2019_11_07_081813_create_jobs_table', 1),
(54, '2019_11_08_114737_create_otps_table', 1),
(55, '2019_11_14_160921_create_wallet_histories_table', 1),
(56, '2019_11_18_190624_create_driver_vehicle_documents_table', 1),
(57, '2019_11_19_174125_create_support_comments_table', 1),
(58, '2019_11_26_112334_create_driver_documents_table', 1),
(59, '2019_11_26_115621_create_support_categories_table', 1),
(60, '2019_11_26_124938_create_supports_table', 1),
(61, '2019_11_27_112628_create_company_details_table', 1),
(62, '2019_11_27_143516_create_parcel_details_table', 1),
(63, '2019_11_27_183125_create_parcel_images_table', 1),
(64, '2019_11_28_173353_create_cms_table', 1),
(65, '2019_11_29_135649_create_ride_settings_table', 1),
(66, '2019_11_30_114906_create_services_table', 1),
(67, '2019_11_30_115018_create_parcel_types_table', 1),
(68, '2019_11_30_152624_create_user_notifications_table', 1),
(69, '2019_12_13_142309_create_emergency_types_table', 1),
(70, '2019_12_13_142352_create_emergency_requests_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `otps`
--

CREATE TABLE `otps` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(191) COLLATE utf8_unicode_ci DEFAULT NULL,
  `otp_number` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `otp_expire` varchar(191) COLLATE utf8_unicode_ci DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `otps`
--

INSERT INTO `otps` (`id`, `email`, `otp_number`, `otp_expire`, `deleted_at`, `created_at`, `updated_at`) VALUES
(2, 'jaymin@gmail.com', '4902', '2022-11-29 06:36:56', NULL, '2022-11-04 04:40:52', '2022-11-29 01:42:05');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `categories_id` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `price` bigint(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `categories_id`, `name`, `price`, `description`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, '1', 'Red Chilli Powder', 180, 'Reference site about Lorem Ipsum, giving information on its origins.', '2022-11-07 13:27:53', '2022-11-03 18:30:00', NULL),
(2, '2', 'Fortune Rice', 25, 'Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', '2022-11-04 13:27:53', '2022-11-03 18:30:00', NULL),
(3, '3', 'Freedom Oil', 810, 'Reference site about Lorem Ipsum, giving information on its origins.', '2022-11-04 13:27:53', '2022-11-03 18:30:00', NULL),
(4, '4', 'Lipton Green Tea', 29, 'Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', '2022-11-04 13:27:53', '2022-11-06 18:30:00', NULL),
(5, '5', 'Amul Wheat Atta', 425, 'Reference site about Lorem Ipsum, giving information on its origins.', '2022-11-04 13:27:53', '2022-11-03 18:30:00', NULL),
(6, '6', 'MOTHERS Mango Pickle', 22, 'Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', '2022-11-04 13:27:53', '2022-11-03 18:30:00', NULL),
(7, '7', 'Fortune Rice', 25, 'Reference site about Lorem Ipsum, giving information on its origins.', '2022-11-04 13:27:53', '2022-11-06 18:30:00', NULL),
(8, '8', 'Red Chilli Powder', 180, 'Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', '2022-11-04 13:27:53', '2022-11-03 18:30:00', NULL),
(9, '3', 'Freedom Oil', 810, 'Reference site about Lorem Ipsum, giving information on its origins.', '2022-11-04 13:27:53', '2022-11-06 18:30:00', NULL),
(10, '4', 'Winterwear Liquid', 245, 'Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', '2022-11-04 13:27:53', '2022-11-04 13:27:53', NULL),
(11, '5', 'Dry Bucket Mop', 920, 'Reference site about Lorem Ipsum, giving information on its origins.', '2022-11-04 13:27:53', '2022-11-04 13:27:53', NULL),
(12, '6', 'Surf excel Lq', 180, 'Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', '2022-11-04 13:27:53', '2022-11-04 13:27:53', NULL),
(13, '1', 'Wooden Spatula', 145, 'Reference site about Lorem Ipsum, giving information on its origins.', '2022-11-04 13:27:53', '2022-11-06 18:30:00', NULL),
(14, '2', 'Dry Cleaning Wipes', 250, 'Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', '2022-11-04 13:27:53', '2022-11-04 13:27:53', NULL),
(15, '3', 'GARBAGE BAG', 15, 'Reference site about Lorem Ipsum, giving information on its origins.', '2022-11-04 13:27:53', '2022-11-04 13:27:53', NULL),
(16, '4', 'Dry Bucket Mop', 920, 'Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', '2022-11-04 13:27:53', '2022-11-04 13:27:53', NULL),
(17, '5', 'Surf excel Lq', 180, 'Reference site about Lorem Ipsum, giving information on its origins.', '2022-11-04 13:27:53', '2022-11-04 13:27:53', NULL),
(18, '6', 'Winterwear Liquid', 245, 'Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', '2022-11-06 18:30:00', '2022-11-06 18:30:00', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `product_image`
--

CREATE TABLE `product_image` (
  `id` int(11) NOT NULL,
  `product_id` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product_image`
--

INSERT INTO `product_image` (`id`, `product_id`, `image`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, '1', 'pp1.png', '2022-11-04 13:37:49', '2022-11-04 13:37:49', NULL),
(2, '1', 'pp2.png', '2022-11-04 13:37:49', '2022-11-04 13:37:49', NULL),
(3, '1', 'pp1.png', '2022-11-04 13:37:49', '2022-11-04 13:37:49', NULL),
(4, '1', 'pp2.png', '2022-11-04 13:37:49', '2022-11-04 13:37:49', NULL),
(5, '1', 'pp1.png', '2022-11-04 13:37:49', '2022-11-04 13:37:49', NULL),
(6, '2', 'pp3.png', '2022-11-04 13:37:49', '2022-11-04 13:37:49', NULL),
(7, '2', 'pp4.png', '2022-11-04 13:37:49', '2022-11-04 13:37:49', NULL),
(8, '2', 'pp3.png', '2022-11-04 13:37:49', '2022-11-04 13:37:49', NULL),
(9, '2', 'pp4.png', '2022-11-04 13:37:49', '2022-11-04 13:37:49', NULL),
(10, '2', 'pp3.png', '2022-11-04 13:37:49', '2022-11-04 13:37:49', NULL),
(11, '3', 'pp5.png', '2022-11-04 13:37:49', '2022-11-04 13:37:49', NULL),
(12, '3', 'pp6.png', '2022-11-04 13:37:49', '2022-11-04 13:37:49', NULL),
(13, '3', 'pp5.png', '2022-11-04 13:37:49', '2022-11-04 13:37:49', NULL),
(14, '3', 'pp6.png', '2022-11-04 13:37:49', '2022-11-04 13:37:49', NULL),
(15, '3', 'pp5.png', '2022-11-04 13:37:49', '2022-11-04 13:37:49', NULL),
(16, '4', 'pp7.png', '2022-11-04 13:37:49', '2022-11-04 13:37:49', NULL),
(17, '4', 'pp8.png', '2022-11-04 13:37:49', '2022-11-04 13:37:49', NULL),
(18, '4', 'pp7.png', '2022-11-04 13:37:49', '2022-11-04 13:37:49', NULL),
(19, '4', 'pp8.png', '2022-11-04 13:37:49', '2022-11-04 13:37:49', NULL),
(20, '4', 'pp7.png', '2022-11-04 13:37:49', '2022-11-04 13:37:49', NULL),
(21, '5', 'pp9.png', '2022-11-04 13:37:49', '2022-11-04 13:37:49', NULL),
(22, '5', 'pp10.png', '2022-11-04 13:37:49', '2022-11-04 13:37:49', NULL),
(23, '5', 'pp9.png', '2022-11-04 13:37:49', '2022-11-04 13:37:49', NULL),
(24, '5', 'pp10.png', '2022-11-04 13:37:49', '2022-11-04 13:37:49', NULL),
(25, '5', 'pp9.png', '2022-11-04 13:37:49', '2022-11-04 13:37:49', NULL),
(26, '6', 'pp11.png', '2022-11-04 13:37:49', '2022-11-04 13:37:49', NULL),
(27, '6', 'pp12.png', '2022-11-04 13:37:49', '2022-11-04 13:37:49', NULL),
(28, '6', 'pp11.png', '2022-11-04 13:37:49', '2022-11-04 13:37:49', NULL),
(29, '6', 'pp12.png', '2022-11-04 13:37:49', '2022-11-04 13:37:49', NULL),
(30, '6', 'pp11.png', '2022-11-04 13:37:49', '2022-11-04 13:37:49', NULL),
(31, '7', 'pp1.png', '2022-11-04 13:37:49', '2022-11-04 13:37:49', NULL),
(32, '7', 'pp2.png', '2022-11-04 13:37:49', '2022-11-04 13:37:49', NULL),
(33, '7', 'pp1.png', '2022-11-04 13:37:49', '2022-11-04 13:37:49', NULL),
(34, '7', 'pp2.png', '2022-11-04 13:37:49', '2022-11-04 13:37:49', NULL),
(35, '7', 'pp1.png', '2022-11-04 13:37:49', '2022-11-04 13:37:49', NULL),
(36, '8', 'pp3.png', '2022-11-04 13:37:49', '2022-11-04 13:37:49', NULL),
(37, '8', 'pp4.png', '2022-11-04 13:37:49', '2022-11-04 13:37:49', NULL),
(38, '8', 'pp3.png', '2022-11-04 13:37:49', '2022-11-04 13:37:49', NULL),
(39, '8', 'pp4.png', '2022-11-04 13:37:49', '2022-11-04 13:37:49', NULL),
(40, '8', 'pp3.png', '2022-11-04 13:37:49', '2022-11-04 13:37:49', NULL),
(41, '9', 'pp5.png', '2022-11-04 13:37:49', '2022-11-04 13:37:49', NULL),
(42, '9', 'pp6.png', '2022-11-04 13:37:49', '2022-11-04 13:37:49', NULL),
(43, '9', 'pp5.png', '2022-11-04 13:37:49', '2022-11-04 13:37:49', NULL),
(44, '9', 'pp6.png', '2022-11-04 13:37:49', '2022-11-04 13:37:49', NULL),
(45, '9', 'pp5.png', '2022-11-04 13:37:49', '2022-11-04 13:37:49', NULL),
(46, '10', 'p1.png', '2022-11-07 06:24:23', '2022-11-07 06:24:23', NULL),
(47, '10', 'p2.png', '2022-11-07 06:24:23', '2022-11-07 06:24:23', NULL),
(48, '10', 'p1.png', '2022-11-07 06:24:23', '2022-11-07 06:24:23', NULL),
(49, '10', 'p2.png', '2022-11-07 06:24:23', '2022-11-07 06:24:23', NULL),
(50, '10', 'p1.png', '2022-11-07 06:24:23', '2022-11-07 06:24:23', NULL),
(51, '11', 'p3.png', '2022-11-07 06:24:23', '2022-11-07 06:24:23', NULL),
(52, '11', 'p4.png', '2022-11-07 06:24:23', '2022-11-07 06:24:23', NULL),
(53, '11', 'p3.png', '2022-11-07 06:24:23', '2022-11-07 06:24:23', NULL),
(54, '11', 'p4.png', '2022-11-07 06:24:23', '2022-11-07 06:24:23', NULL),
(55, '11', 'p3.png', '2022-11-07 06:24:23', '2022-11-07 06:24:23', NULL),
(56, '12', 'p5.png', '2022-11-07 06:24:23', '2022-11-07 06:24:23', NULL),
(57, '12', 'p6.png', '2022-11-07 06:24:23', '2022-11-07 06:24:23', NULL),
(58, '12', 'p5.png', '2022-11-07 06:24:23', '2022-11-07 06:24:23', NULL),
(59, '12', 'p6.png', '2022-11-07 06:24:23', '2022-11-07 06:24:23', NULL),
(60, '12', 'p5.png', '2022-11-07 06:24:23', '2022-11-07 06:24:23', NULL),
(61, '13', 'p7.png', '2022-11-07 06:24:23', '2022-11-07 06:24:23', NULL),
(62, '13', 'p8.png', '2022-11-07 06:24:23', '2022-11-07 06:24:23', NULL),
(63, '13', 'p7.png', '2022-11-07 06:24:23', '2022-11-07 06:24:23', NULL),
(64, '13', 'p8.png', '2022-11-07 06:24:23', '2022-11-07 06:24:23', NULL),
(65, '13', 'p7.png', '2022-11-07 06:24:23', '2022-11-07 06:24:23', NULL),
(66, '14', 'p9.png', '2022-11-07 06:24:23', '2022-11-07 06:24:23', NULL),
(67, '14', 'p10.png', '2022-11-07 06:24:23', '2022-11-07 06:24:23', NULL),
(68, '14', 'p9.png', '2022-11-07 06:24:23', '2022-11-07 06:24:23', NULL),
(69, '14', 'p10.png', '2022-11-07 06:24:23', '2022-11-07 06:24:23', NULL),
(70, '14', 'p9.png', '2022-11-07 06:24:23', '2022-11-07 06:24:23', NULL),
(71, '15', 'p11.png', '2022-11-07 06:24:23', '2022-11-07 06:24:23', NULL),
(72, '15', 'p12.png', '2022-11-07 06:24:23', '2022-11-07 06:24:23', NULL),
(73, '15', 'p11.png', '2022-11-07 06:24:23', '2022-11-07 06:24:23', NULL),
(74, '15', 'p12.png', '2022-11-07 06:24:23', '2022-11-07 06:24:23', NULL),
(75, '15', 'p11.png', '2022-11-07 06:24:23', '2022-11-07 06:24:23', NULL),
(76, '16', 'p3.png', '2022-11-07 06:24:23', '2022-11-07 06:24:23', NULL),
(77, '16', 'p4.png', '2022-11-07 06:24:23', '2022-11-07 06:24:23', NULL),
(78, '16', 'p3.png', '2022-11-07 06:24:23', '2022-11-07 06:24:23', NULL),
(79, '16', 'p4.png', '2022-11-07 06:24:23', '2022-11-07 06:24:23', NULL),
(80, '16', 'p3.png', '2022-11-07 06:24:23', '2022-11-07 06:24:23', NULL),
(81, '17', 'p5.png', '2022-11-07 06:24:23', '2022-11-07 06:24:23', NULL),
(82, '17', 'p6.png', '2022-11-07 06:24:23', '2022-11-07 06:24:23', NULL),
(83, '17', 'p5.png', '2022-11-07 06:24:23', '2022-11-07 06:24:23', NULL),
(84, '17', 'p6.png', '2022-11-07 06:24:23', '2022-11-07 06:24:23', NULL),
(85, '17', 'p5.png', '2022-11-07 06:24:23', '2022-11-07 06:24:23', NULL),
(86, '18', 'p1.png', '2022-11-07 06:24:23', '2022-11-07 06:24:23', NULL),
(87, '18', 'p2.png', '2022-11-07 06:24:23', '2022-11-07 06:24:23', NULL),
(88, '18', 'p1.png', '2022-11-07 06:24:23', '2022-11-07 06:24:23', NULL),
(89, '18', 'p2.png', '2022-11-07 06:24:23', '2022-11-07 06:24:23', NULL),
(90, '18', 'p1.png', '2022-11-07 06:24:23', '2022-11-07 06:24:23', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_type` enum('superadmin','user') COLLATE utf8_unicode_ci DEFAULT NULL,
  `first_name` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `last_name` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8_unicode_ci DEFAULT NULL,
  `avatar` varchar(191) COLLATE utf8_unicode_ci DEFAULT 'default.png',
  `password` varchar(191) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` enum('active','inactive') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'active',
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `user_type`, `first_name`, `last_name`, `email`, `avatar`, `password`, `status`, `remember_token`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'superadmin', 'Admin', 'User', 'admin@admin.com', 'default.png', '$2y$10$TNPJDHGxtDP0vtJZn0oLDe4.3eDnmS2cHpg.8pu4Ag4M/XTEeeeLm', 'active', 'hMICMR9N6NhOpZy4j3rNdSE5CobDjugtm1tW9Err82Ox0FHBJK4lKWLTcvAU', '2019-12-18 00:29:48', '2021-08-12 11:02:09', NULL),
(2, 'user', 'Jaymin', 'Modi', 'jaymin@gmail.com', 'default.png', '$2y$10$P.FIj48v06zndXKA..OEnuMguiO9sT6E7WU2lrpYeGERHIyLgqwNO', 'active', NULL, '2020-02-18 12:57:07', '2022-11-03 06:46:53', NULL),
(5, 'user', 'Sagar', 'Darji', 'sagar@mailinator.com', 'default.png', '$2y$10$.gJs61x66blSmk8rBYXzQ.VkBpm4L3h2OGgJnDr0B/.oI3n6zsyWq', 'active', NULL, '2020-02-18 12:58:19', '2020-09-29 09:55:22', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `blog`
--
ALTER TABLE `blog`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `brand`
--
ALTER TABLE `brand`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `otps`
--
ALTER TABLE `otps`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_image`
--
ALTER TABLE `product_image`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `blog`
--
ALTER TABLE `blog`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `brand`
--
ALTER TABLE `brand`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;

--
-- AUTO_INCREMENT for table `otps`
--
ALTER TABLE `otps`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `product_image`
--
ALTER TABLE `product_image`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=91;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=480;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
