-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 08, 2024 at 02:24 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sprintsdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `username` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`id`, `username`, `title`, `message`, `created_at`, `updated_at`) VALUES
(2, 'hadeer ibraheem', 'it\'a test for bug', 'yarab tsht8l', '2024-09-03 11:12:16', '2024-09-03 11:12:16');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE `images` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `imageable_id` varchar(255) NOT NULL,
  `imageable_type` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `images`
--

INSERT INTO `images` (`id`, `imageable_id`, `imageable_type`, `name`, `created_at`, `updated_at`) VALUES
(1, '8', 'App\\Models\\User', 'users/17253547644682225902691_image.jpeg', '2024-09-03 06:12:44', '2024-09-03 06:12:44'),
(10, '6', 'App\\Models\\User', 'users/17255346266016405123008_image.png', '2024-09-05 08:10:26', '2024-09-05 08:10:26'),
(17, '14', 'App\\Models\\Products', 'products/17256011588013607912947_image.jpg', '2024-09-06 02:39:18', '2024-09-06 02:39:18'),
(18, '14', 'App\\Models\\Products', 'products/17256011587989817013406_image.jpg', '2024-09-06 02:39:18', '2024-09-06 02:39:18'),
(19, '14', 'App\\Models\\Products', 'products/17256011589410641676021_image.jpg', '2024-09-06 02:39:18', '2024-09-06 02:39:18'),
(21, '15', 'App\\Models\\Products', 'products/17256032877978614257096_image.jpg', '2024-09-06 03:14:47', '2024-09-06 03:14:47'),
(22, '15', 'App\\Models\\Products', 'products/17256133624745349112995_image.jpg', '2024-09-06 06:02:42', '2024-09-06 06:02:42'),
(23, '7', 'App\\Models\\Products', 'products/17256136032812045875633_image.jpg', '2024-09-06 06:06:43', '2024-09-06 06:06:43'),
(24, '7', 'App\\Models\\Products', 'products/17256136038813633210387_image.jpg', '2024-09-06 06:06:43', '2024-09-06 06:06:43'),
(25, '7', 'App\\Models\\Products', 'products/17256136031157146346543_image.jpg', '2024-09-06 06:06:43', '2024-09-06 06:06:43'),
(26, '6', 'App\\Models\\Products', 'products/17256136343468292095342_image.jpg', '2024-09-06 06:07:14', '2024-09-06 06:07:14'),
(27, '6', 'App\\Models\\Products', 'products/17256136347926052906817_image.jpg', '2024-09-06 06:07:14', '2024-09-06 06:07:14'),
(28, '6', 'App\\Models\\Products', 'products/1725613634714232924595_image.jpg', '2024-09-06 06:07:14', '2024-09-06 06:07:14'),
(29, '16', 'App\\Models\\Products', 'products/17257840909579666722252_image.jpg', '2024-09-08 05:28:10', '2024-09-08 05:28:10'),
(30, '16', 'App\\Models\\Products', 'products/17257840903034336855288_image.jpg', '2024-09-08 05:28:10', '2024-09-08 05:28:10'),
(31, '16', 'App\\Models\\Products', 'products/17257840903550078164927_image.jpg', '2024-09-08 05:28:10', '2024-09-08 05:28:10'),
(32, '17', 'App\\Models\\Products', 'products/17257841873843976395610_image.jpg', '2024-09-08 05:29:47', '2024-09-08 05:29:47'),
(33, '17', 'App\\Models\\Products', 'products/17257841877783548603135_image.jpg', '2024-09-08 05:29:47', '2024-09-08 05:29:47'),
(34, '17', 'App\\Models\\Products', 'products/17257841879778846169661_image.jpg', '2024-09-08 05:29:47', '2024-09-08 05:29:47'),
(35, '18', 'App\\Models\\Products', 'products/17257843455919851298421_image.jpg', '2024-09-08 05:32:25', '2024-09-08 05:32:25'),
(36, '18', 'App\\Models\\Products', 'products/17257843451016235311431_image.jpg', '2024-09-08 05:32:25', '2024-09-08 05:32:25'),
(37, '18', 'App\\Models\\Products', 'products/17257843459475751268692_image.jpg', '2024-09-08 05:32:25', '2024-09-08 05:32:25'),
(38, '19', 'App\\Models\\Products', 'products/17257844008127225363012_image.jpg', '2024-09-08 05:33:20', '2024-09-08 05:33:20'),
(39, '19', 'App\\Models\\Products', 'products/17257844002201703458967_image.jpg', '2024-09-08 05:33:20', '2024-09-08 05:33:20'),
(40, '19', 'App\\Models\\Products', 'products/1725784400895682768727_image.jpg', '2024-09-08 05:33:20', '2024-09-08 05:33:20'),
(41, '20', 'App\\Models\\Products', 'products/17257844494237857543777_image.jpg', '2024-09-08 05:34:09', '2024-09-08 05:34:09'),
(42, '20', 'App\\Models\\Products', 'products/17257844497496315042877_image.jpg', '2024-09-08 05:34:09', '2024-09-08 05:34:09'),
(43, '20', 'App\\Models\\Products', 'products/17257844492228452053135_image.jpg', '2024-09-08 05:34:09', '2024-09-08 05:34:09'),
(44, '21', 'App\\Models\\Products', 'products/1725784561319682653686_image.jpg', '2024-09-08 05:36:01', '2024-09-08 05:36:01'),
(45, '21', 'App\\Models\\Products', 'products/17257845614078317945432_image.jpg', '2024-09-08 05:36:01', '2024-09-08 05:36:01'),
(46, '21', 'App\\Models\\Products', 'products/17257845615892817719347_image.jpg', '2024-09-08 05:36:01', '2024-09-08 05:36:01'),
(47, '22', 'App\\Models\\Products', 'products/1725784625898190517645_image.jpg', '2024-09-08 05:37:05', '2024-09-08 05:37:05'),
(48, '22', 'App\\Models\\Products', 'products/17257846257357531074392_image.jpg', '2024-09-08 05:37:05', '2024-09-08 05:37:05'),
(49, '22', 'App\\Models\\Products', 'products/17257846251067145513757_image.jpg', '2024-09-08 05:37:05', '2024-09-08 05:37:05'),
(50, '23', 'App\\Models\\Products', 'products/17257846873455025629657_image.jpg', '2024-09-08 05:38:07', '2024-09-08 05:38:07'),
(51, '23', 'App\\Models\\Products', 'products/17257846878737984562986_image.jpg', '2024-09-08 05:38:07', '2024-09-08 05:38:07'),
(52, '23', 'App\\Models\\Products', 'products/17257846872272057327731_image.jpg', '2024-09-08 05:38:07', '2024-09-08 05:38:07'),
(53, '24', 'App\\Models\\Products', 'products/17257847387303020764706_image.jpg', '2024-09-08 05:38:58', '2024-09-08 05:38:58'),
(54, '24', 'App\\Models\\Products', 'products/17257847386667080303215_image.jpg', '2024-09-08 05:38:58', '2024-09-08 05:38:58'),
(55, '24', 'App\\Models\\Products', 'products/17257847389560809457966_image.jpg', '2024-09-08 05:38:58', '2024-09-08 05:38:58');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2024_08_30_074035_create_contacts_table', 1),
(6, '2024_09_01_171112_create_images_table', 2),
(7, '2024_09_03_152059_create_products_table', 3),
(8, '2024_09_08_081403_add_quantity_to_products_table', 4),
(9, '2024_09_08_091035_create_orders_table', 5),
(10, '2024_09_08_091505_create_order_items_table', 5);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `total_price` decimal(10,2) NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'Pending',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `total_price`, `status`, `created_at`, `updated_at`) VALUES
(2, 5, 39.00, 'processing', '2024-09-08 07:40:54', '2024-09-08 09:19:53'),
(3, 5, 78.00, 'Pending', '2024-09-08 07:42:31', '2024-09-08 07:42:31'),
(4, 5, 38.00, 'Pending', '2024-09-08 07:44:15', '2024-09-08 07:44:15'),
(5, 5, 38.00, 'Pending', '2024-09-08 07:48:19', '2024-09-08 07:48:19'),
(6, 5, 19.00, 'Pending', '2024-09-08 07:50:23', '2024-09-08 07:50:23');

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

CREATE TABLE `order_items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_items`
--

INSERT INTO `order_items` (`id`, `order_id`, `product_id`, `quantity`, `price`, `created_at`, `updated_at`) VALUES
(2, 2, 20, 3, 13.00, '2024-09-08 07:40:54', '2024-09-08 07:40:54'),
(3, 3, 19, 2, 39.00, '2024-09-08 07:42:31', '2024-09-08 07:42:31'),
(4, 4, 18, 2, 19.00, '2024-09-08 07:44:15', '2024-09-08 07:44:15'),
(5, 5, 18, 2, 19.00, '2024-09-08 07:48:19', '2024-09-08 07:48:19'),
(6, 6, 18, 1, 19.00, '2024-09-08 07:50:23', '2024-09-08 07:50:23');

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `info` text NOT NULL,
  `price` double(8,2) NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `quantity` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `user_id`, `name`, `info`, `price`, `deleted_at`, `created_at`, `updated_at`, `quantity`) VALUES
(16, 5, 'Dinosaur Toys', 'Dreamon Take Apart Dinosaur Toys for Kids with Storage Box Electric Drill DIY Construction Build Set Educational STEM Gifts for Boys Girls', 15.00, NULL, '2024-09-08 05:28:10', '2024-09-08 05:28:10', 20),
(17, 5, 'Foot Finders', 'Foot Finders & Wrist Rattles for Infants Developmental Texture Toys for Babies & Infant Toy Socks & Baby Wrist Rattle - Newborn Toys for Baby Girls Boys - Baby Boy Girl Toys 0-3 3-6 6-9 Months', 9.00, NULL, '2024-09-08 05:29:46', '2024-09-08 05:29:46', 50),
(18, 4, 'Water Marbling Pain', 'Water Marbling Paint for Kids - Arts and Crafts for Girls & Boys Crafts Kits Ideal Gifts for Kids Age 6+ 8-12', 19.00, NULL, '2024-09-08 05:32:25', '2024-09-08 07:50:23', 45),
(19, 4, 'Funko Advent Calendar', 'Funko Advent Calendar: Pixar 2024 - Pixar Collection - 24 Days Of Surprise - Collectable Vinyl Mini Figures - Mystery Box - Gift Idea - Holiday Xmas for Girls, Boys & Kids', 39.00, NULL, '2024-09-08 05:33:20', '2024-09-08 07:42:31', 13),
(20, 4, 'Funko Pop!', 'Funko Pop! Movies: Terrifier 2 - Art the Clown - Bloody - Collectable Vinyl Figure - Gift Idea - Official Merchandise - Toys for Kids & Adults - Movies Fans - Model Figure for Collectors and Display', 13.00, NULL, '2024-09-08 05:34:09', '2024-09-08 07:40:54', 10),
(21, 5, 'Zamasha Clear Pencil Case', 'Zamasha Clear Pencil Case Black with Strong Zipper | 22x4x9 cm Stylish, Practical and Transparent Pencil Case | Versatile Storage for Stationery, Toiletries, Makeup, Travel & Office Supplies', 4.00, NULL, '2024-09-08 05:36:01', '2024-09-08 05:36:01', 50),
(22, 5, 'Care Bears', 'Care Bears | Friend Forever Bear 35cm Medium Plush | Eco Friendly, Collectable Cuddly Toys for Children, Soft Toys for Girls Boys, Cute Teddies Suitable for Girls and Boys Ages 4+ | Basic Fun 22658', 19.00, NULL, '2024-09-08 05:37:05', '2024-09-08 05:37:05', 30),
(23, 5, 'Bearington Swings', 'Bearington Swings The Monkey Plush Monkey Stuffed Animal, 15 inch', 20.00, NULL, '2024-09-08 05:38:07', '2024-09-08 05:38:07', 30),
(24, 5, 'Classic Bear', 'NICI 46509 Animal Cuddly Soft Toy Classic Bear 50cm, Brown, 50 cm', 12.00, NULL, '2024-09-08 05:38:58', '2024-09-08 07:55:50', 10);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `email_verified_at`, `password`, `type`, `remember_token`, `deleted_at`, `created_at`, `updated_at`) VALUES
(4, 'Osama Mersal', 'osama@gmail.com', NULL, '$2y$10$I7GUKVoVj8PemAulgkhMD.AeImiMsv/N2LO59my55dxRFFTbe8cWq', 'client', NULL, NULL, '2024-09-03 01:31:02', '2024-09-03 01:31:02'),
(5, 'mohamed', 'mohamed@gmail.com', NULL, '$2y$10$skqv7qbPrzErnXydHBFDl.SUzffTu0zyNlv8I9lBMpYUCjxEzqADu', 'client', NULL, NULL, '2024-09-03 01:34:50', '2024-09-05 08:11:21'),
(6, 'Hadeer', 'hadeer@gmail.com', NULL, '$2y$10$vxDDlQrZZTXj6zYQ2GIFh.p/BRim0sKDlPFDhhsSE9i0Jg8.eBql2', 'admin', NULL, NULL, '2024-09-03 01:41:15', '2024-09-03 11:08:25');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `orders_user_id_foreign` (`user_id`);

--
-- Indexes for table `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_items_order_id_foreign` (`order_id`),
  ADD KEY `order_items_product_id_foreign` (`product_id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `products_user_id_foreign` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `images`
--
ALTER TABLE `images`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `order_items`
--
ALTER TABLE `order_items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `order_items`
--
ALTER TABLE `order_items`
  ADD CONSTRAINT `order_items_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `order_items_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
