-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jan 05, 2023 at 01:03 PM
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
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `blog`
--

INSERT INTO `blog` (`id`, `title`, `description`, `image`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Id est laborum et dolorum', 'Fusce rutrum quam a ultrices rhoncus. Nulla eu ipsum tempus est et vitae nulla empus estsuscipit et dolor amet.', 'blog1.jpg', '2023-01-04 07:11:05', '2023-01-04 07:11:05', NULL),
(2, 'Deleniti atque corrupti', 'Fusce rutrum quam a ultrices rhoncus. Nulla eu ipsum tempus est et vitae nulla empus estsuscipit et dolor amet.', 'blog2.jpg', '2023-01-04 07:11:05', '2023-01-04 07:11:05', NULL),
(3, 'Et iusto odio dignissimos', 'Fusce rutrum quam a ultrices rhoncus. Nulla eu ipsum tempus est et vitae nulla empus estsuscipit et dolor amet.', 'blog3.jpg', '2023-01-04 07:11:05', '2023-01-04 07:11:05', NULL),
(4, 'At vero eos et accusamus', 'Fusce rutrum quam a ultrices rhoncus. Nulla eu ipsum tempus est et vitae nulla empus estsuscipit et dolor amet.', 'blog4.jpg', '2023-01-04 07:11:05', '2023-01-04 07:11:05', NULL),
(5, 'Id est laborum et dolorum', 'Fusce rutrum quam a ultrices rhoncus. Nulla eu ipsum tempus est et vitae nulla empus estsuscipit et dolor amet.', 'blog5.jpg', '2023-01-04 07:11:05', '2023-01-04 07:11:05', NULL),
(6, 'Deleniti atque corrupti', 'Fusce rutrum quam a ultrices rhoncus. Nulla eu ipsum tempus est et vitae nulla empus estsuscipit et dolor amet.', 'blog6.jpg', '2023-01-04 07:11:05', '2023-01-04 07:11:05', NULL),
(7, 'Et iusto odio dignissimos', 'Fusce rutrum quam a ultrices rhoncus. Nulla eu ipsum tempus est et vitae nulla empus estsuscipit et dolor amet.', 'blog7.jpg', '2023-01-04 07:11:06', '2023-01-04 07:11:06', NULL),
(8, 'At vero eos et accusamus', 'Fusce rutrum quam a ultrices rhoncus. Nulla eu ipsum tempus est et vitae nulla empus estsuscipit et dolor amet.', 'blog8.jpg', '2023-01-04 07:11:06', '2023-01-04 07:11:06', NULL),
(9, 'Id est laborum et dolorum', 'Fusce rutrum quam a ultrices rhoncus. Nulla eu ipsum tempus est et vitae nulla empus estsuscipit et dolor amet.', 'blog9.jpg', '2023-01-04 07:11:06', '2023-01-04 07:11:06', NULL),
(10, 'Deleniti atque corrupti', 'Fusce rutrum quam a ultrices rhoncus. Nulla eu ipsum tempus est et vitae nulla empus estsuscipit et dolor amet.', 'blog10.jpg', '2023-01-04 07:11:06', '2023-01-04 07:11:06', NULL),
(11, 'Et iusto odio dignissimos', 'Fusce rutrum quam a ultrices rhoncus. Nulla eu ipsum tempus est et vitae nulla empus estsuscipit et dolor amet.', 'blog11.jpg', '2023-01-04 07:11:06', '2023-01-04 07:11:06', NULL),
(12, 'At vero eos et accusamus', 'Fusce rutrum quam a ultrices rhoncus. Nulla eu ipsum tempus est et vitae nulla empus estsuscipit et dolor amet.', 'blog12.jpg', '2023-01-04 07:11:06', '2023-01-04 07:11:06', NULL),
(13, 'Id est laborum et dolorum', 'Fusce rutrum quam a ultrices rhoncus. Nulla eu ipsum tempus est et vitae nulla empus estsuscipit et dolor amet.', 'blog13.jpg', '2023-01-04 07:11:06', '2023-01-04 07:11:06', NULL),
(14, 'Deleniti atque corrupti', 'Fusce rutrum quam a ultrices rhoncus. Nulla eu ipsum tempus est et vitae nulla empus estsuscipit et dolor amet.', 'blog14.jpg', '2023-01-04 07:11:06', '2023-01-04 07:11:06', NULL),
(15, 'Et iusto odio dignissimos', 'Fusce rutrum quam a ultrices rhoncus. Nulla eu ipsum tempus est et vitae nulla empus estsuscipit et dolor amet.', 'blog15.jpg', '2023-01-04 07:11:06', '2023-01-04 07:11:06', NULL),
(16, 'At vero eos et accusamus', 'Fusce rutrum quam a ultrices rhoncus. Nulla eu ipsum tempus est et vitae nulla empus estsuscipit et dolor amet.', 'blog16.jpg', '2023-01-04 07:11:06', '2023-01-04 07:11:06', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `brand`
--

CREATE TABLE `brand` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `brand_name` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `brand_image` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `brand`
--

INSERT INTO `brand` (`id`, `brand_name`, `brand_image`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Nestle', 'tb1.png', '2023-01-04 07:11:06', '2023-01-04 07:11:06', NULL),
(2, 'Rowntrees', 'tb2.png', '2023-01-04 07:11:06', '2023-01-04 07:11:06', NULL),
(3, 'Cadbury', 'tb3.png', '2023-01-04 07:11:06', '2023-01-04 07:11:06', NULL),
(4, 'Flahavans', 'tb4.png', '2023-01-04 07:11:06', '2023-01-04 07:11:06', NULL),
(5, 'Baichelors', 'tb5.png', '2023-01-04 07:11:06', '2023-01-04 07:11:06', NULL),
(6, 'Daily Food', 'tb6.png', '2023-01-04 07:11:06', '2023-01-04 07:11:06', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `brand_id` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `categories_name` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `brand_id`, `categories_name`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, '1', 'Ready Meal & Mixes', '2023-01-04 07:11:06', '2023-01-04 07:11:06', NULL),
(2, '2', 'Food Combo', '2023-01-04 07:11:06', '2023-01-04 07:11:06', NULL),
(3, '3', 'Kitchen Tools', '2023-01-04 07:11:06', '2023-01-04 07:11:06', NULL),
(4, '4', 'Cookware', '2023-01-04 07:11:06', '2023-01-04 07:11:06', NULL),
(5, '5', 'Outdoor Cooking', '2023-01-04 07:11:06', '2023-01-04 07:11:06', NULL),
(6, '6', 'Hand Juicers', '2023-01-04 07:11:06', '2023-01-04 07:11:06', NULL),
(7, '1', 'Chocolates', '2023-01-04 07:11:06', '2023-01-04 07:11:06', NULL),
(8, '2', 'Dry Fruit, Nut & Seed', '2023-01-04 07:11:06', '2023-01-04 07:11:06', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `cms`
--

CREATE TABLE `cms` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('active','inactive') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cms`
--

INSERT INTO `cms` (`id`, `title`, `description`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'about_us', 'Infusion Analysts is a Technology/Data driven Web and Software Development Company. We as Infusion Analysts is one of the colonist software solution partners working with Assured Reliability. Infusion Analysts is an offshore Company having expertise in Enterprise Solutions, Web Development, Mobile Development, UI/UX Design Technologies having headquarters at India. Infusion Analysts is established with aim of providing smarter digital solutions to business by a group of young technocrats.We have expertise in developing Enterprise Solutions, Web Development, Mobile Development, UI/UX Design Technologies etc. We provide services to Startups, Small, Medium and Large Scale Enterprises. We have team of 40+ Developers having expertise in different technologies. We have served our services across the Globe and have delivered 92+ Projects successfully. We provide Solutions to the clients at reasonable price.We are Committed to Client amuse, which we accomplished through uncommon administration and superb nature of work.The stamp of our Unwavering quality is reflected in every method we pursue and in the outputs we deliver. Our Clients have been able to implement their ideas into reality with help of our consultants bringing IT and their business in sync. With help of our IT solutions, we help our clients to implement their strategies and achieve more.', 'active', '2023-01-04 07:11:06', '2023-01-04 07:11:06', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE `comment` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `blog_id` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `comment` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('read','unread') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'unread',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `first_name` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_name` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `message` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `faq`
--

CREATE TABLE `faq` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `question` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `answer` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('active','inactive') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `faq`
--

INSERT INTO `faq` (`id`, `question`, `answer`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Excepteur sint occaecat cupidatat non proident ?', 'But I must explain to you how all this mistaken idea of denouncing pleasure and praising pain was born and I will give you a complete account of the system, and expound the actual teachings of the great explorer of the truth, the master-builder of human happiness. No one rejects, dislikes, or avoids pleasure itself, because it is pleasure.', 'active', '2023-01-04 07:11:06', '2023-01-04 07:11:06', NULL),
(2, 'Quis nostrum exercitationem ullam corporis suscipit ?', 'But I must explain to you how all this mistaken idea of denouncing pleasure and praising pain was born and I will give you a complete account of the system, and expound the actual teachings of the great explorer of the truth, the master-builder of human happiness. No one rejects, dislikes, or avoids pleasure itself, because it is pleasure.', 'active', '2023-01-04 07:11:06', '2023-01-04 07:11:06', NULL),
(3, 'Nemo enim ipsam voluptatem quia voluptas sit ?', 'But I must explain to you how all this mistaken idea of denouncing pleasure and praising pain was born and I will give you a complete account of the system, and expound the actual teachings of the great explorer of the truth, the master-builder of human happiness. No one rejects, dislikes, or avoids pleasure itself, because it is pleasure.', 'active', '2023-01-04 07:11:06', '2023-01-04 07:11:06', NULL),
(4, 'Ut enim ad minima veniam, quis nostrum exercitationem ?', 'But I must explain to you how all this mistaken idea of denouncing pleasure and praising pain was born and I will give you a complete account of the system, and expound the actual teachings of the great explorer of the truth, the master-builder of human happiness. No one rejects, dislikes, or avoids pleasure itself, because it is pleasure.', 'active', '2023-01-04 07:11:06', '2023-01-04 07:11:06', NULL),
(5, 'Quis autem vel eum iure reprehenderit qui ?', 'But I must explain to you how all this mistaken idea of denouncing pleasure and praising pain was born and I will give you a complete account of the system, and expound the actual teachings of the great explorer of the truth, the master-builder of human happiness. No one rejects, dislikes, or avoids pleasure itself, because it is pleasure.', 'active', '2023-01-04 07:11:06', '2023-01-04 07:11:06', NULL),
(6, 'Sed ut perspiciatis unde omnis iste natus error sit ?', 'But I must explain to you how all this mistaken idea of denouncing pleasure and praising pain was born and I will give you a complete account of the system, and expound the actual teachings of the great explorer of the truth, the master-builder of human happiness. No one rejects, dislikes, or avoids pleasure itself, because it is pleasure.', 'active', '2023-01-04 07:11:06', '2023-01-04 07:11:06', NULL),
(7, 'Nam libero tempore, cum soluta nobis est ?', 'But I must explain to you how all this mistaken idea of denouncing pleasure and praising pain was born and I will give you a complete account of the system, and expound the actual teachings of the great explorer of the truth, the master-builder of human happiness. No one rejects, dislikes, or avoids pleasure itself, because it is pleasure.', 'active', '2023-01-04 07:11:06', '2023-01-04 07:11:06', NULL),
(8, 'At vero eos et accusamus et iusto odio dignissimos ?', 'But I must explain to you how all this mistaken idea of denouncing pleasure and praising pain was born and I will give you a complete account of the system, and expound the actual teachings of the great explorer of the truth, the master-builder of human happiness. No one rejects, dislikes, or avoids pleasure itself, because it is pleasure.', 'active', '2023-01-04 07:11:06', '2023-01-04 07:11:06', NULL),
(9, 'Itaque earum rerum hic tenetur a sapiente delectus ?', 'But I must explain to you how all this mistaken idea of denouncing pleasure and praising pain was born and I will give you a complete account of the system, and expound the actual teachings of the great explorer of the truth, the master-builder of human happiness. No one rejects, dislikes, or avoids pleasure itself, because it is pleasure.', 'active', '2023-01-04 07:11:06', '2023-01-04 07:11:06', NULL),
(10, 'vel illum qui dolorem eum fugiat quo voluptas nulla ?', 'But I must explain to you how all this mistaken idea of denouncing pleasure and praising pain was born and I will give you a complete account of the system, and expound the actual teachings of the great explorer of the truth, the master-builder of human happiness. No one rejects, dislikes, or avoids pleasure itself, because it is pleasure.', 'active', '2023-01-04 07:11:06', '2023-01-04 07:11:06', NULL),
(11, 'Ut enim ad minima veniam, quis nostrum exercitationem ?', 'But I must explain to you how all this mistaken idea of denouncing pleasure and praising pain was born and I will give you a complete account of the system, and expound the actual teachings of the great explorer of the truth, the master-builder of human happiness. No one rejects, dislikes, or avoids pleasure itself, because it is pleasure.', 'active', '2023-01-04 07:11:06', '2023-01-04 07:11:06', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(22, '0000_00_00_000000_create_settings_table', 1),
(23, '2014_10_12_100000_create_password_resets_table', 1),
(24, '2019_08_19_000000_create_failed_jobs_table', 1),
(25, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(26, '2022_12_07_070507_create_users_table', 1),
(27, '2022_12_07_070714_create_product_image_table', 1),
(28, '2022_12_07_070745_create_product_table', 1),
(29, '2022_12_07_070819_create_otps_table', 1),
(30, '2022_12_07_070849_create_order_product_table', 1),
(31, '2022_12_07_070923_create_order_table', 1),
(32, '2022_12_07_071000_create_faq_table', 1),
(33, '2022_12_07_071053_create_contact_table', 1),
(34, '2022_12_07_071116_create_cms_table', 1),
(35, '2022_12_07_071146_create_categories_table', 1),
(36, '2022_12_07_071213_create_brand_table', 1),
(37, '2022_12_07_071239_create_blog_table', 1),
(38, '2022_12_19_064157_create_comment_table', 1),
(39, '2022_12_20_061734_create_user_address_table', 1),
(40, '2022_12_22_095041_create_support_table', 1),
(41, '2022_12_27_081333_create_promo_table', 1),
(42, '2023_01_02_131608_create_promo_user_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE `order` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `invoice` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address_id` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `promo_id` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `comment` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `grandtotal` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `maintotal` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `promototal` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('processing','accepted','ontheway','delivered','cancelled') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'processing',
  `payment_mode` enum('cod','paypal') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'cod',
  `date` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order`
--

INSERT INTO `order` (`id`, `invoice`, `user_id`, `address_id`, `promo_id`, `comment`, `grandtotal`, `maintotal`, `promototal`, `status`, `payment_mode`, `date`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, '44272443297', '2', '1', NULL, 'Additional comments', '1750.00', '1750.00', '0', 'accepted', 'cod', '2023-01-11', '2023-01-04 07:12:09', '2023-01-04 07:14:14', NULL),
(3, '31092825628', '2', '1', NULL, NULL, '1750.00', '1750.00', '0', 'accepted', 'cod', '2023-01-11', '2023-01-04 07:13:47', '2023-01-04 07:14:14', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `order_product`
--

CREATE TABLE `order_product` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_id` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `category_id` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_image` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `qty` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `main_price` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `new_offer` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_product`
--

INSERT INTO `order_product` (`id`, `order_id`, `product_id`, `category_id`, `product_image`, `name`, `description`, `price`, `qty`, `main_price`, `new_offer`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, '1', '20', '1', 'e2.png', 'Cadbury Dairy Milk', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam', '950.00', '1', '950.00', 'new', '2023-01-04 07:12:09', '2023-01-04 07:12:09', NULL),
(2, '1', '19', '8', 'e1.png', 'Lays Onion Chips', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam', '450.00', '1', '450.00', 'new', '2023-01-04 07:12:09', '2023-01-04 07:12:09', NULL),
(3, '1', '18', '7', 'p1.png', 'Tata Sampann Poha', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam', '350.00', '1', '350.00', 'new', '2023-01-04 07:12:09', '2023-01-04 07:12:09', NULL),
(7, '3', '20', '1', 'e2.png', 'Cadbury Dairy Milk', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam', '950.00', '1', '950.00', 'new', '2023-01-04 07:13:47', '2023-01-04 07:13:47', NULL),
(8, '3', '19', '8', 'e1.png', 'Lays Onion Chips', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam', '450.00', '1', '450.00', 'new', '2023-01-04 07:13:47', '2023-01-04 07:13:47', NULL),
(9, '3', '18', '7', 'p1.png', 'Tata Sampann Poha', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam', '350.00', '1', '350.00', 'new', '2023-01-04 07:13:47', '2023-01-04 07:13:47', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `otps`
--

CREATE TABLE `otps` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `otp_number` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `otp_expire` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price` decimal(8,2) DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `category_id`, `name`, `price`, `description`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, '1', 'Red Chilli Powder', '180.00', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam', '2023-01-04 07:11:06', '2023-01-04 07:11:06', NULL),
(2, '2', 'Fortune Rice', '25.00', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam', '2023-01-04 07:11:06', '2023-01-04 07:11:06', NULL),
(3, '3', 'Freedom Oil', '810.00', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam', '2023-01-04 07:11:06', '2023-01-04 07:11:06', NULL),
(4, '4', 'Lipton Green Tea', '29.00', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam', '2023-01-04 07:11:06', '2023-01-04 07:11:06', NULL),
(5, '5', 'Amul Wheat Atta', '425.00', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam', '2023-01-04 07:11:06', '2023-01-04 07:11:06', NULL),
(6, '6', 'MOTHERS Mango Pickle', '400.00', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam', '2023-01-04 07:11:06', '2023-01-04 07:11:06', NULL),
(7, '2', 'Winterwear Liquid', '580.00', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam', '2023-01-04 07:11:06', '2023-01-04 07:11:06', NULL),
(8, '3', 'Dry Bucket Mop', '900.00', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam', '2023-01-04 07:11:06', '2023-01-04 07:11:06', NULL),
(9, '4', 'Surf excel Lq', '1500.00', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam', '2023-01-04 07:11:06', '2023-01-04 07:11:06', NULL),
(10, '5', 'Wooden Spatula', '840.00', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam', '2023-01-04 07:11:06', '2023-01-04 07:11:06', NULL),
(11, '6', 'Dry Cleaning Wipes', '660.00', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam', '2023-01-04 07:11:06', '2023-01-04 07:11:06', NULL),
(12, '7', 'GARBAGE BAG', '540.00', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam', '2023-01-04 07:11:06', '2023-01-04 07:11:06', NULL),
(13, '2', 'ProV Pistachios', '860.00', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam', '2023-01-04 07:11:06', '2023-01-04 07:11:06', NULL),
(14, '3', 'Himalayan Cashews', '775.00', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam', '2023-01-04 07:11:06', '2023-01-04 07:11:06', NULL),
(15, '4', 'Kernels Walnuts', '1452.00', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam', '2023-01-04 07:11:06', '2023-01-04 07:11:06', NULL),
(16, '5', 'Himalayan Almonds', '150.00', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam', '2023-01-04 07:11:06', '2023-01-04 07:11:06', NULL),
(17, '6', 'Yellow Arhar Dal', '250.00', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam', '2023-01-04 07:11:06', '2023-01-04 07:11:06', NULL),
(18, '7', 'Tata Sampann Poha', '350.00', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam', '2023-01-04 07:11:06', '2023-01-04 07:11:06', NULL),
(19, '8', 'Lays Onion Chips', '450.00', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam', '2023-01-04 07:11:06', '2023-01-04 07:11:06', NULL),
(20, '1', 'Cadbury Dairy Milk', '950.00', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam', '2023-01-04 07:11:06', '2023-01-04 07:11:06', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `product_image`
--

CREATE TABLE `product_image` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'default.png',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_image`
--

INSERT INTO `product_image` (`id`, `product_id`, `image`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, '1', 'pp1.png', '2023-01-04 07:11:06', '2023-01-04 07:11:06', NULL),
(2, '1', 'pp2.png', '2023-01-04 07:11:06', '2023-01-04 07:11:06', NULL),
(3, '1', 'pp1.png', '2023-01-04 07:11:06', '2023-01-04 07:11:06', NULL),
(4, '1', 'pp2.png', '2023-01-04 07:11:06', '2023-01-04 07:11:06', NULL),
(5, '1', 'pp1.png', '2023-01-04 07:11:06', '2023-01-04 07:11:06', NULL),
(6, '2', 'pp3.png', '2023-01-04 07:11:06', '2023-01-04 07:11:06', NULL),
(7, '2', 'pp4.png', '2023-01-04 07:11:06', '2023-01-04 07:11:06', NULL),
(8, '2', 'pp3.png', '2023-01-04 07:11:06', '2023-01-04 07:11:06', NULL),
(9, '2', 'pp4.png', '2023-01-04 07:11:06', '2023-01-04 07:11:06', NULL),
(10, '2', 'pp3.png', '2023-01-04 07:11:06', '2023-01-04 07:11:06', NULL),
(11, '3', 'pp5.png', '2023-01-04 07:11:06', '2023-01-04 07:11:06', NULL),
(12, '3', 'pp6.png', '2023-01-04 07:11:06', '2023-01-04 07:11:06', NULL),
(13, '3', 'pp5.png', '2023-01-04 07:11:06', '2023-01-04 07:11:06', NULL),
(14, '3', 'pp6.png', '2023-01-04 07:11:06', '2023-01-04 07:11:06', NULL),
(15, '3', 'pp5.png', '2023-01-04 07:11:06', '2023-01-04 07:11:06', NULL),
(16, '4', 'pp7.png', '2023-01-04 07:11:06', '2023-01-04 07:11:06', NULL),
(17, '4', 'pp8.png', '2023-01-04 07:11:06', '2023-01-04 07:11:06', NULL),
(18, '4', 'pp7.png', '2023-01-04 07:11:06', '2023-01-04 07:11:06', NULL),
(19, '4', 'pp8.png', '2023-01-04 07:11:06', '2023-01-04 07:11:06', NULL),
(20, '4', 'pp7.png', '2023-01-04 07:11:06', '2023-01-04 07:11:06', NULL),
(21, '5', 'pp9.png', '2023-01-04 07:11:06', '2023-01-04 07:11:06', NULL),
(22, '5', 'pp10.png', '2023-01-04 07:11:06', '2023-01-04 07:11:06', NULL),
(23, '5', 'pp9.png', '2023-01-04 07:11:06', '2023-01-04 07:11:06', NULL),
(24, '5', 'pp10.png', '2023-01-04 07:11:06', '2023-01-04 07:11:06', NULL),
(25, '5', 'pp9.png', '2023-01-04 07:11:06', '2023-01-04 07:11:06', NULL),
(26, '6', 'pp11.png', '2023-01-04 07:11:06', '2023-01-04 07:11:06', NULL),
(27, '6', 'pp12.png', '2023-01-04 07:11:06', '2023-01-04 07:11:06', NULL),
(28, '6', 'pp11.png', '2023-01-04 07:11:06', '2023-01-04 07:11:06', NULL),
(29, '6', 'pp12.png', '2023-01-04 07:11:06', '2023-01-04 07:11:06', NULL),
(30, '6', 'pp11.png', '2023-01-04 07:11:06', '2023-01-04 07:11:06', NULL),
(31, '7', 'pp1.png', '2023-01-04 07:11:06', '2023-01-04 07:11:06', NULL),
(32, '7', 'pp2.png', '2023-01-04 07:11:06', '2023-01-04 07:11:06', NULL),
(33, '7', 'pp1.png', '2023-01-04 07:11:06', '2023-01-04 07:11:06', NULL),
(34, '7', 'pp2.png', '2023-01-04 07:11:06', '2023-01-04 07:11:06', NULL),
(35, '7', 'pp1.png', '2023-01-04 07:11:06', '2023-01-04 07:11:06', NULL),
(36, '8', 'pp3.png', '2023-01-04 07:11:06', '2023-01-04 07:11:06', NULL),
(37, '8', 'pp4.png', '2023-01-04 07:11:06', '2023-01-04 07:11:06', NULL),
(38, '8', 'pp3.png', '2023-01-04 07:11:06', '2023-01-04 07:11:06', NULL),
(39, '8', 'pp4.png', '2023-01-04 07:11:06', '2023-01-04 07:11:06', NULL),
(40, '8', 'pp3.png', '2023-01-04 07:11:06', '2023-01-04 07:11:06', NULL),
(41, '9', 'pp5.png', '2023-01-04 07:11:06', '2023-01-04 07:11:06', NULL),
(42, '9', 'pp6.png', '2023-01-04 07:11:06', '2023-01-04 07:11:06', NULL),
(43, '9', 'pp5.png', '2023-01-04 07:11:06', '2023-01-04 07:11:06', NULL),
(44, '9', 'pp6.png', '2023-01-04 07:11:06', '2023-01-04 07:11:06', NULL),
(45, '9', 'pp5.png', '2023-01-04 07:11:06', '2023-01-04 07:11:06', NULL),
(46, '10', 'p1.png', '2023-01-04 07:11:06', '2023-01-04 07:11:06', NULL),
(47, '10', 'p2.png', '2023-01-04 07:11:06', '2023-01-04 07:11:06', NULL),
(48, '10', 'p1.png', '2023-01-04 07:11:06', '2023-01-04 07:11:06', NULL),
(49, '10', 'p2.png', '2023-01-04 07:11:06', '2023-01-04 07:11:06', NULL),
(50, '10', 'p1.png', '2023-01-04 07:11:06', '2023-01-04 07:11:06', NULL),
(51, '11', 'p3.png', '2023-01-04 07:11:06', '2023-01-04 07:11:06', NULL),
(52, '11', 'p4.png', '2023-01-04 07:11:06', '2023-01-04 07:11:06', NULL),
(53, '11', 'p3.png', '2023-01-04 07:11:06', '2023-01-04 07:11:06', NULL),
(54, '11', 'p4.png', '2023-01-04 07:11:06', '2023-01-04 07:11:06', NULL),
(55, '11', 'p3.png', '2023-01-04 07:11:06', '2023-01-04 07:11:06', NULL),
(56, '12', 'p5.png', '2023-01-04 07:11:06', '2023-01-04 07:11:06', NULL),
(57, '12', 'p6.png', '2023-01-04 07:11:06', '2023-01-04 07:11:06', NULL),
(58, '12', 'p5.png', '2023-01-04 07:11:06', '2023-01-04 07:11:06', NULL),
(59, '12', 'p6.png', '2023-01-04 07:11:06', '2023-01-04 07:11:06', NULL),
(60, '12', 'p5.png', '2023-01-04 07:11:06', '2023-01-04 07:11:06', NULL),
(61, '13', 'p7.png', '2023-01-04 07:11:06', '2023-01-04 07:11:06', NULL),
(62, '13', 'p8.png', '2023-01-04 07:11:06', '2023-01-04 07:11:06', NULL),
(63, '13', 'p7.png', '2023-01-04 07:11:06', '2023-01-04 07:11:06', NULL),
(64, '13', 'p8.png', '2023-01-04 07:11:06', '2023-01-04 07:11:06', NULL),
(65, '13', 'p7.png', '2023-01-04 07:11:06', '2023-01-04 07:11:06', NULL),
(66, '14', 'p9.png', '2023-01-04 07:11:06', '2023-01-04 07:11:06', NULL),
(67, '14', 'p10.png', '2023-01-04 07:11:06', '2023-01-04 07:11:06', NULL),
(68, '14', 'p9.png', '2023-01-04 07:11:06', '2023-01-04 07:11:06', NULL),
(69, '14', 'p10.png', '2023-01-04 07:11:06', '2023-01-04 07:11:06', NULL),
(70, '14', 'p9.png', '2023-01-04 07:11:06', '2023-01-04 07:11:06', NULL),
(71, '15', 'p11.png', '2023-01-04 07:11:06', '2023-01-04 07:11:06', NULL),
(72, '15', 'p12.png', '2023-01-04 07:11:06', '2023-01-04 07:11:06', NULL),
(73, '15', 'p11.png', '2023-01-04 07:11:06', '2023-01-04 07:11:06', NULL),
(74, '15', 'p12.png', '2023-01-04 07:11:06', '2023-01-04 07:11:06', NULL),
(75, '15', 'p11.png', '2023-01-04 07:11:06', '2023-01-04 07:11:06', NULL),
(76, '16', 'p3.png', '2023-01-04 07:11:06', '2023-01-04 07:11:06', NULL),
(77, '16', 'p4.png', '2023-01-04 07:11:06', '2023-01-04 07:11:06', NULL),
(78, '16', 'p3.png', '2023-01-04 07:11:06', '2023-01-04 07:11:06', NULL),
(79, '16', 'p4.png', '2023-01-04 07:11:06', '2023-01-04 07:11:06', NULL),
(80, '16', 'p3.png', '2023-01-04 07:11:06', '2023-01-04 07:11:06', NULL),
(81, '17', 'p5.png', '2023-01-04 07:11:06', '2023-01-04 07:11:06', NULL),
(82, '17', 'p6.png', '2023-01-04 07:11:06', '2023-01-04 07:11:06', NULL),
(83, '17', 'p5.png', '2023-01-04 07:11:06', '2023-01-04 07:11:06', NULL),
(84, '17', 'p6.png', '2023-01-04 07:11:06', '2023-01-04 07:11:06', NULL),
(85, '17', 'p5.png', '2023-01-04 07:11:06', '2023-01-04 07:11:06', NULL),
(86, '18', 'p1.png', '2023-01-04 07:11:06', '2023-01-04 07:11:06', NULL),
(87, '18', 'p2.png', '2023-01-04 07:11:07', '2023-01-04 07:11:07', NULL),
(88, '18', 'p1.png', '2023-01-04 07:11:07', '2023-01-04 07:11:07', NULL),
(89, '18', 'p2.png', '2023-01-04 07:11:07', '2023-01-04 07:11:07', NULL),
(90, '18', 'p1.png', '2023-01-04 07:11:07', '2023-01-04 07:11:07', NULL),
(91, '19', 'e1.png', '2023-01-04 07:11:07', '2023-01-04 07:11:07', NULL),
(92, '19', 'ee1.png', '2023-01-04 07:11:07', '2023-01-04 07:11:07', NULL),
(93, '19', 'e1.png', '2023-01-04 07:11:07', '2023-01-04 07:11:07', NULL),
(94, '19', 'ee1.png', '2023-01-04 07:11:07', '2023-01-04 07:11:07', NULL),
(95, '19', 'e1.png', '2023-01-04 07:11:07', '2023-01-04 07:11:07', NULL),
(96, '20', 'e2.png', '2023-01-04 07:11:07', '2023-01-04 07:11:07', NULL),
(97, '20', 'ee2.png', '2023-01-04 07:11:07', '2023-01-04 07:11:07', NULL),
(98, '20', 'e2.png', '2023-01-04 07:11:07', '2023-01-04 07:11:07', NULL),
(99, '20', 'ee2.png', '2023-01-04 07:11:07', '2023-01-04 07:11:07', NULL),
(100, '20', 'e2.png', '2023-01-04 07:11:07', '2023-01-04 07:11:07', NULL),
(101, '21', 'e3.png', '2023-01-04 07:11:07', '2023-01-04 07:11:07', NULL),
(102, '21', 'ee3.png', '2023-01-04 07:11:07', '2023-01-04 07:11:07', NULL),
(103, '21', 'e3.png', '2023-01-04 07:11:07', '2023-01-04 07:11:07', NULL),
(104, '21', 'ee3.png', '2023-01-04 07:11:07', '2023-01-04 07:11:07', NULL),
(105, '21', 'e3.png', '2023-01-04 07:11:07', '2023-01-04 07:11:07', NULL),
(106, '22', 'e4.png', '2023-01-04 07:11:07', '2023-01-04 07:11:07', NULL),
(107, '22', 'ee4.png', '2023-01-04 07:11:07', '2023-01-04 07:11:07', NULL),
(108, '22', 'e4.png', '2023-01-04 07:11:07', '2023-01-04 07:11:07', NULL),
(109, '22', 'ee4.png', '2023-01-04 07:11:07', '2023-01-04 07:11:07', NULL),
(110, '22', 'e4.png', '2023-01-04 07:11:07', '2023-01-04 07:11:07', NULL),
(111, '23', 'f1.png', '2023-01-04 07:11:07', '2023-01-04 07:11:07', NULL),
(112, '23', 'f11.png', '2023-01-04 07:11:07', '2023-01-04 07:11:07', NULL),
(113, '23', 'f1.png', '2023-01-04 07:11:07', '2023-01-04 07:11:07', NULL),
(114, '23', 'f11.png', '2023-01-04 07:11:07', '2023-01-04 07:11:07', NULL),
(115, '23', 'f1.png', '2023-01-04 07:11:07', '2023-01-04 07:11:07', NULL),
(116, '24', 'f2.png', '2023-01-04 07:11:07', '2023-01-04 07:11:07', NULL),
(117, '24', 'f22.png', '2023-01-04 07:11:07', '2023-01-04 07:11:07', NULL),
(118, '24', 'f2.png', '2023-01-04 07:11:07', '2023-01-04 07:11:07', NULL),
(119, '24', 'f22.png', '2023-01-04 07:11:07', '2023-01-04 07:11:07', NULL),
(120, '24', 'f2.png', '2023-01-04 07:11:07', '2023-01-04 07:11:07', NULL),
(121, '25', 'f3.png', '2023-01-04 07:11:07', '2023-01-04 07:11:07', NULL),
(122, '25', 'f33.png', '2023-01-04 07:11:07', '2023-01-04 07:11:07', NULL),
(123, '25', 'f3.png', '2023-01-04 07:11:07', '2023-01-04 07:11:07', NULL),
(124, '25', 'f33.png', '2023-01-04 07:11:07', '2023-01-04 07:11:07', NULL),
(125, '25', 'f3.png', '2023-01-04 07:11:07', '2023-01-04 07:11:07', NULL),
(126, '26', 'f4.png', '2023-01-04 07:11:07', '2023-01-04 07:11:07', NULL),
(127, '26', 'f44.png', '2023-01-04 07:11:07', '2023-01-04 07:11:07', NULL),
(128, '26', 'f4.png', '2023-01-04 07:11:07', '2023-01-04 07:11:07', NULL),
(129, '26', 'f44.png', '2023-01-04 07:11:07', '2023-01-04 07:11:07', NULL),
(130, '26', 'f4.png', '2023-01-04 07:11:07', '2023-01-04 07:11:07', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `promo`
--

CREATE TABLE `promo` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `code` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `promocodeimages` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `start_date` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `end_date` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `discount` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('active','inactive') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `promo_user`
--

CREATE TABLE `promo_user` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `promo_id` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` int(10) UNSIGNED NOT NULL,
  `code` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` enum('BOOLEAN','NUMBER','DATE','TEXT','SELECT','FILE','TEXTAREA') COLLATE utf8mb4_unicode_ci NOT NULL,
  `label` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `hidden` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `code`, `type`, `label`, `value`, `hidden`, `created_at`, `updated_at`) VALUES
(1, 'application_logo', 'FILE', 'Site Logo', 'application_logo.png', 0, '2023-01-04 07:11:07', '2023-01-04 07:11:07'),
(2, 'application_title', 'TEXT', 'Application Title', 'Grocery Mart', 0, '2023-01-04 07:11:07', '2023-01-04 07:11:07'),
(3, 'favicon_logo', 'FILE', 'Favicon Logo', 'favicon_logo.png', 0, '2023-01-04 07:11:07', '2023-01-04 07:11:07'),
(4, 'copyright', 'TEXT', 'Copy Right', 'Grocery Mart', 0, '2023-01-04 07:11:07', '2023-01-04 07:11:07');

-- --------------------------------------------------------

--
-- Table structure for table `site_setting`
--

CREATE TABLE `site_setting` (
  `id` int(11) NOT NULL,
  `meta_key` varchar(255) DEFAULT NULL,
  `meta_value` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `site_setting`
--

INSERT INTO `site_setting` (`id`, `meta_key`, `meta_value`, `created_at`, `updated_at`) VALUES
(1, 'site_maintenance', '0', '2023-01-05 09:54:46', '2023-01-05 06:21:30');

-- --------------------------------------------------------

--
-- Table structure for table `support`
--

CREATE TABLE `support` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `supportname` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `supportemail` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `supportmessage` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `first_name` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_name` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `avatar` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'default.png',
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'users',
  `status` enum('active','inactive') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `address_id` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `email`, `email_verified_at`, `avatar`, `password`, `user_type`, `status`, `address_id`, `remember_token`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Super', 'Admin', 'admin@admin.com', NULL, 'default.png', '$2y$10$mVpG1WWXksWEei3bgTV4fOcDdYpSTP6GFLiBYcjq4gHPlfsF.fEf.', 'superadmin', 'active', NULL, NULL, '2023-01-04 07:11:07', '2023-01-04 07:11:07', NULL),
(2, 'Jaymin', 'Modi', 'jaymin@gmail.com', NULL, 'default.png', '$2y$10$N6.ow6X8Rt0lpwleyqyPR.Z0gTPD04Sq6Nt9A2pmgj56kJniESk42', 'user', 'active', NULL, NULL, '2023-01-04 07:11:07', '2023-01-04 07:11:07', NULL),
(3, 'Sagar', 'Darji', 'sagar@gmail.com', NULL, 'default.png', '$2y$10$QnOzSJ8k2ZcEmDSyiOcYo.vhhfjoP4atD0RsPJVDz/lo5QmMcVr.2', 'user', 'active', NULL, NULL, '2023-01-04 07:11:07', '2023-01-04 07:11:07', NULL),
(4, 'Jainam', 'Darji', 'jainam@gmail.com', NULL, 'default.png', '$2y$10$4rbWzuaepxoWps5JA1fCWe3sSV4GdWAocjNc0ltPjaaWP5NdKj/Va', 'user', 'active', NULL, NULL, '2023-01-04 07:11:07', '2023-01-04 07:11:07', NULL),
(5, 'Bharat', 'Mevada', 'bharat@gmail.com', NULL, 'default.png', '$2y$10$G4ASFGGNBI3JA2WB4a0JmO8ZS6LsFWwt6vARXxdboPB20kn0uuZGe', 'user', 'active', NULL, NULL, '2023-01-04 07:11:07', '2023-01-04 07:11:07', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user_address`
--

CREATE TABLE `user_address` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `zip` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `street_address` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `optional` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `states` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_address`
--

INSERT INTO `user_address` (`id`, `user_id`, `zip`, `street_address`, `optional`, `city`, `states`, `country`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, '2', '380015', 'Shapath 4, Besides Crown Plaza Hotel, Sarkhej', NULL, 'Ahmedabad', 'Gujrat', 'india', '2023-01-04 07:11:36', '2023-01-04 07:11:36', NULL),
(2, '2', '384265', '4/2/25 salviwado ghee vala ni seri', NULL, 'Ahmedabad', 'Gujrat', 'india', '2023-01-04 07:11:51', '2023-01-04 07:11:51', NULL);

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
-- Indexes for table `cms`
--
ALTER TABLE `cms`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `faq`
--
ALTER TABLE `faq`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_product`
--
ALTER TABLE `order_product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `otps`
--
ALTER TABLE `otps`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD PRIMARY KEY (`id`),
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

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
-- Indexes for table `promo`
--
ALTER TABLE `promo`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `promo_user`
--
ALTER TABLE `promo_user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `settings_code_unique` (`code`);

--
-- Indexes for table `site_setting`
--
ALTER TABLE `site_setting`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `support`
--
ALTER TABLE `support`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `user_address`
--
ALTER TABLE `user_address`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `blog`
--
ALTER TABLE `blog`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `brand`
--
ALTER TABLE `brand`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `cms`
--
ALTER TABLE `cms`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `comment`
--
ALTER TABLE `comment`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `faq`
--
ALTER TABLE `faq`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `order`
--
ALTER TABLE `order`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `order_product`
--
ALTER TABLE `order_product`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `otps`
--
ALTER TABLE `otps`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `password_resets`
--
ALTER TABLE `password_resets`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `product_image`
--
ALTER TABLE `product_image`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=131;

--
-- AUTO_INCREMENT for table `promo`
--
ALTER TABLE `promo`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `promo_user`
--
ALTER TABLE `promo_user`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `site_setting`
--
ALTER TABLE `site_setting`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `support`
--
ALTER TABLE `support`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `user_address`
--
ALTER TABLE `user_address`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
