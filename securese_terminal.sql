-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 24, 2024 at 10:10 PM
-- Server version: 10.6.18-MariaDB
-- PHP Version: 8.1.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `securese_terminal`
--

-- --------------------------------------------------------

--
-- Table structure for table `billing_details`
--

CREATE TABLE `billing_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `invoice_id` bigint(20) UNSIGNED NOT NULL,
  `customer_id` bigint(20) UNSIGNED NOT NULL,
  `city` varchar(255) NOT NULL,
  `country` varchar(255) NOT NULL,
  `zip` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `billing_details`
--

INSERT INTO `billing_details` (`id`, `invoice_id`, `customer_id`, `city`, `country`, `zip`, `email`, `created_at`, `updated_at`) VALUES
(1, 2, 1, '80', 'Croatia', 'dumen@mailinator.com', 'fugyda@mailinator.com', '2024-03-14 17:21:41', '2024-03-14 17:21:41'),
(2, 5, 1, 'Karachi', 'Andorra', '39523', 'user@gmail.com', '2024-03-14 21:06:53', '2024-03-14 21:06:53'),
(3, 6, 1, 'London', 'Andorra', 'WC2 E9DA', 'ssss@gmail.com', '2024-03-15 18:06:04', '2024-03-15 18:06:04'),
(4, 12, 1, 'Repellendus Soluta', 'Canada', 'hivelisac@mailinator.com', 'cypin@mailinator.com', '2024-03-18 20:45:31', '2024-03-18 20:45:31'),
(5, 15, 4, 'ATHERTON', 'Albania', 'M46 9NS', 'dgrey1455@gmail.com', '2024-03-18 21:24:49', '2024-03-18 21:24:49'),
(6, 16, 1, 'Reprehenderit quis q', 'Ecuador', 'tyfozizuv@mailinator.com', 'jemewovagy@mailinator.com', '2024-03-20 17:52:48', '2024-03-20 17:52:48'),
(7, 18, 5, 'Karachi', 'Bhutan', '39523', 'user@gmail.com', '2024-03-20 19:52:46', '2024-03-20 19:52:46');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `transfer_user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `user_id`, `transfer_user_id`, `name`, `email`, `phone`, `title`, `created_at`, `updated_at`) VALUES
(1, 2, NULL, 'David', 'saledds@protecbaths.com', '42424224', '24242424', '2024-03-14 17:05:49', '2024-03-14 17:05:49'),
(3, 2, NULL, 'Kaseem Riley', 'jawozeqyfy@mailinator.com', '806', '+1 (715) 607-9742', '2024-03-15 21:40:18', '2024-03-18 19:43:00'),
(4, 3, NULL, 'Isaiah Orr', 'sazihuwap@mailinator.com', '1884884168', 'Xyz', '2024-03-18 17:19:43', '2024-03-18 20:02:14'),
(5, 6, NULL, 'testing', 'customer@example.com', NULL, NULL, '2024-03-20 19:51:32', '2024-03-20 19:51:32');

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
-- Table structure for table `invoices`
--

CREATE TABLE `invoices` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_number` varchar(255) NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `amount` decimal(8,2) NOT NULL,
  `description` text NOT NULL,
  `brand` varchar(255) NOT NULL,
  `customer_name` varchar(255) NOT NULL,
  `customer_email` varchar(255) NOT NULL,
  `status` enum('paid','unpaid') NOT NULL DEFAULT 'unpaid',
  `owner_user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `payment_link` longtext DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `customer_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `invoices`
--

INSERT INTO `invoices` (`id`, `order_number`, `uuid`, `amount`, `description`, `brand`, `customer_name`, `customer_email`, `status`, `owner_user_id`, `payment_link`, `created_at`, `updated_at`, `user_id`, `customer_id`) VALUES
(6, 'INV-65F48DC2625D1', '2df87923-e259-4fa5-a3f2-17f4fcab669c', 22.00, 'Qui minim sed eius a', 'Creative Web Master', 'David', 'saledds@protecbaths.com', 'paid', NULL, 'http://terminals.secureserverinternal.com/invoices/payment/2df87923-e259-4fa5-a3f2-17f4fcab669c', '2024-03-15 18:04:50', '2024-03-15 18:06:04', 2, 1),
(7, 'INV-65F493755E779', '62fb0e1a-8045-4097-bc65-32cdaf5af560', 100.00, 'Short Course Short Term Project Long Term Project Publishing Editing & proofreading Book Printing Book', 'American Logo Artist', 'David', 'saledds@protecbaths.com', 'paid', NULL, 'http://terminals.secureserverinternal.com/invoices/payment/62fb0e1a-8045-4097-bc65-32cdaf5af560', '2024-03-15 18:29:09', '2024-03-15 18:29:11', 2, 1),
(8, 'INV-65F4B2B0A682D', 'f7e90448-6a88-41d3-a418-a69cfe423efe', 98.00, 'Dolores animi ut en', 'American Logo Artist', 'David', 'saledds@protecbaths.com', 'paid', NULL, 'https://terminals.secureserverinternal.com/invoices/payment/f7e90448-6a88-41d3-a418-a69cfe423efe', '2024-02-14 20:42:24', '2024-03-15 20:42:27', 2, 1),
(9, 'INV-65F4B2C02F33D', 'd4acbb92-21b7-4794-b4f4-df6c6d556403', 45.00, 'Consequatur maxime', 'Logo Wall Street', 'David', 'saledds@protecbaths.com', 'unpaid', NULL, 'https://terminals.secureserverinternal.com/invoices/payment/d4acbb92-21b7-4794-b4f4-df6c6d556403', '2024-03-15 20:42:40', '2024-03-15 20:42:40', 2, 1),
(10, 'INV-65F4C05E13476', '45102fe3-2fab-4691-9962-2060efc2b8c9', 38.00, 'Irure Nam unde sit r', 'American Logo Artist', 'Kaseem Riley', 'jawozeqyfy@mailinator.com', 'unpaid', NULL, 'https://terminals.secureserverinternal.com/invoices/payment/45102fe3-2fab-4691-9962-2060efc2b8c9', '2024-03-15 21:40:46', '2024-03-15 21:40:46', 2, 3),
(11, 'INV-65F87FD0D7956', '12ec2357-97dd-4953-bdec-d3ac507e8986', 20.00, 'sddsddsd', 'American Logo Artist', 'Kaseem Riley', 'jawozeqyfy@mailinator.com', 'unpaid', 2, 'http://terminals.secureserverinternal.com/invoices/payment/12ec2357-97dd-4953-bdec-d3ac507e8986', '2024-03-18 17:54:24', '2024-03-18 17:54:24', 3, 3),
(12, 'INV-65F8A6EA5113F', '072c76bc-e601-484f-8dc4-734527503243', 85.00, 'Odit totam vero earu', 'Creative Web Master', 'David', 'saledds@protecbaths.com', 'paid', NULL, 'https://terminals.secureserverinternal.com/invoices/payment/072c76bc-e601-484f-8dc4-734527503243', '2024-03-18 20:41:14', '2024-03-18 20:45:31', 2, 1),
(13, 'INV-65F8A81236D53', '19dc25f5-a8a8-47ca-84f6-39b0a0ab6129', 70.00, 'Sunt doloremque mag', 'Creative Web Master', 'David', 'saledds@protecbaths.com', 'paid', NULL, 'https://terminals.secureserverinternal.com/invoices/payment/19dc25f5-a8a8-47ca-84f6-39b0a0ab6129', '2024-03-18 20:46:10', '2024-03-18 20:46:12', 2, 1),
(14, 'INV-65F8A90A214EB', 'c66a8617-78bb-403e-8b57-a7080690f14f', 86.00, 'Soluta sapiente aut', 'Creative Web Master', 'Kaseem Riley', 'jawozeqyfy@mailinator.com', 'unpaid', NULL, 'https://terminals.secureserverinternal.com/invoices/payment/c66a8617-78bb-403e-8b57-a7080690f14f', '2024-03-18 20:50:18', '2024-03-18 20:50:18', 2, 3),
(15, 'INV-65F8B0E732251', '9411d1f3-4125-477a-8128-f142b6a7d943', 48.00, 'Possimus sapiente a', 'Logo Wall Street', 'Isaiah Orr', 'sazihuwap@mailinator.com', 'paid', NULL, 'https://terminals.secureserverinternal.com/invoices/payment/9411d1f3-4125-477a-8128-f142b6a7d943', '2024-03-18 21:23:51', '2024-03-18 21:24:49', 3, 4),
(16, 'INV-65FB224AE853D', '2e978e41-5412-4185-a08c-30c344fc2a00', 85.00, 'Et fugit ut reprehe', 'American Logo Artist', 'David', 'saledds@protecbaths.com', 'paid', NULL, 'https://terminals.secureserverinternal.com/invoices/payment/2e978e41-5412-4185-a08c-30c344fc2a00', '2024-03-20 17:52:10', '2024-03-20 17:52:48', 2, 1),
(17, 'INV-65FB23751DF8A', '3c014fa4-1a21-42ce-884e-e604935d82ac', 86.00, 'A quia eaque et nisi', 'American Logo Artist', 'David', 'saledds@protecbaths.com', 'paid', NULL, 'https://terminals.secureserverinternal.com/invoices/payment/3c014fa4-1a21-42ce-884e-e604935d82ac', '2024-03-20 17:57:09', '2024-03-20 17:57:11', 2, 1),
(18, 'INV-65FB3E5AC58F7', 'b02bf2e5-5bbd-4875-a6cd-bcef8bfe835d', 100.00, 'testing', 'Creative Web Master', 'testing', 'customer@example.com', 'paid', NULL, 'https://terminals.secureserverinternal.com/invoices/payment/b02bf2e5-5bbd-4875-a6cd-bcef8bfe835d', '2024-03-20 19:51:54', '2024-03-20 19:52:46', 6, 5),
(19, 'INV-660DCCE6A153F', '73c5b995-7204-420c-81f4-b108de2eca9d', 250.00, 'Businss cards', 'American Logo Artist', 'Kaseem Riley', 'jawozeqyfy@mailinator.com', 'unpaid', NULL, 'https://terminals.secureserverinternal.com/invoices/payment/73c5b995-7204-420c-81f4-b108de2eca9d', '2024-04-03 21:40:54', '2024-04-03 21:40:54', 2, 3);

-- --------------------------------------------------------

--
-- Table structure for table `invoice_services`
--

CREATE TABLE `invoice_services` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `invoice_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `invoice_services`
--

INSERT INTO `invoice_services` (`id`, `invoice_id`, `name`, `created_at`, `updated_at`) VALUES
(62, 6, 'Short Course', '2024-03-15 18:04:50', '2024-03-15 18:04:50'),
(63, 6, 'Short Term Project', '2024-03-15 18:04:50', '2024-03-15 18:04:50'),
(64, 6, 'Long Term Project', '2024-03-15 18:04:50', '2024-03-15 18:04:50'),
(65, 6, 'Publishing', '2024-03-15 18:04:50', '2024-03-15 18:04:50'),
(66, 6, 'Editing & proofreading', '2024-03-15 18:04:50', '2024-03-15 18:04:50'),
(67, 6, 'Book Printing', '2024-03-15 18:04:50', '2024-03-15 18:04:50'),
(68, 6, 'Book Publishing', '2024-03-15 18:04:50', '2024-03-15 18:04:50'),
(69, 6, 'Writing', '2024-03-15 18:04:50', '2024-03-15 18:04:50'),
(70, 6, 'Book marketing', '2024-03-15 18:04:50', '2024-03-15 18:04:50'),
(71, 6, 'Illustrations', '2024-03-15 18:04:50', '2024-03-15 18:04:50'),
(72, 6, 'Website Development', '2024-03-15 18:04:50', '2024-03-15 18:04:50'),
(73, 6, 'Brochure Design', '2024-03-15 18:04:50', '2024-03-15 18:04:50'),
(74, 6, 'Project Status', '2024-03-15 18:04:50', '2024-03-15 18:04:50'),
(75, 6, 'Content Writing', '2024-03-15 18:04:50', '2024-03-15 18:04:50'),
(76, 6, 'Copy Right Design', '2024-03-15 18:04:50', '2024-03-15 18:04:50'),
(77, 7, 'Website Development', '2024-03-15 18:29:09', '2024-03-15 18:29:09'),
(78, 7, 'Website Design', '2024-03-15 18:29:09', '2024-03-15 18:29:09'),
(79, 8, 'Long Term Project', '2024-03-15 20:42:24', '2024-03-15 20:42:24'),
(80, 8, 'Academic Writing Questionnaire', '2024-03-15 20:42:24', '2024-03-15 20:42:24'),
(81, 8, 'Book Publishing', '2024-03-15 20:42:24', '2024-03-15 20:42:24'),
(82, 8, 'Video Production', '2024-03-15 20:42:24', '2024-03-15 20:42:24'),
(83, 8, 'Writing', '2024-03-15 20:42:24', '2024-03-15 20:42:24'),
(84, 8, 'Illustrations', '2024-03-15 20:42:24', '2024-03-15 20:42:24'),
(85, 8, 'Client Questionnaire', '2024-03-15 20:42:24', '2024-03-15 20:42:24'),
(86, 8, 'Logo Design', '2024-03-15 20:42:24', '2024-03-15 20:42:24'),
(87, 8, 'Stationery Design', '2024-03-15 20:42:24', '2024-03-15 20:42:24'),
(88, 8, 'Project Status', '2024-03-15 20:42:24', '2024-03-15 20:42:24'),
(89, 8, 'Content Writing', '2024-03-15 20:42:24', '2024-03-15 20:42:24'),
(90, 8, 'Social Media Design', '2024-03-15 20:42:24', '2024-03-15 20:42:24'),
(91, 8, 'Copy Right Design', '2024-03-15 20:42:24', '2024-03-15 20:42:24'),
(92, 9, 'Short Course', '2024-03-15 20:42:40', '2024-03-15 20:42:40'),
(93, 9, 'Complete Course', '2024-03-15 20:42:40', '2024-03-15 20:42:40'),
(94, 9, 'Short Term Project', '2024-03-15 20:42:40', '2024-03-15 20:42:40'),
(95, 9, 'Editing & proofreading', '2024-03-15 20:42:40', '2024-03-15 20:42:40'),
(96, 9, 'SEO Questionnaire', '2024-03-15 20:42:40', '2024-03-15 20:42:40'),
(97, 9, 'Academic Writing Questionnaire', '2024-03-15 20:42:40', '2024-03-15 20:42:40'),
(98, 9, 'Book Marketing', '2024-03-15 20:42:40', '2024-03-15 20:42:40'),
(99, 9, 'Book Writing', '2024-03-15 20:42:40', '2024-03-15 20:42:40'),
(100, 9, 'Writing', '2024-03-15 20:42:40', '2024-03-15 20:42:40'),
(101, 9, 'Book marketing', '2024-03-15 20:42:40', '2024-03-15 20:42:40'),
(102, 9, 'Audiobook', '2024-03-15 20:42:40', '2024-03-15 20:42:40'),
(103, 9, 'Website Development', '2024-03-15 20:42:40', '2024-03-15 20:42:40'),
(104, 9, 'Website Design', '2024-03-15 20:42:40', '2024-03-15 20:42:40'),
(105, 9, 'Stationery Design', '2024-03-15 20:42:40', '2024-03-15 20:42:40'),
(106, 9, 'Brochure Design', '2024-03-15 20:42:40', '2024-03-15 20:42:40'),
(107, 9, 'Copy Right Design', '2024-03-15 20:42:40', '2024-03-15 20:42:40'),
(108, 10, 'Audiobook', '2024-03-15 21:40:46', '2024-03-15 21:40:46'),
(109, 10, 'Website Development', '2024-03-15 21:40:46', '2024-03-15 21:40:46'),
(110, 10, 'Copy Right Design', '2024-03-15 21:40:46', '2024-03-15 21:40:46'),
(111, 11, 'SEO Questionnaire', '2024-03-18 17:54:24', '2024-03-18 17:54:24'),
(112, 11, 'Book Marketing', '2024-03-18 17:54:24', '2024-03-18 17:54:24'),
(113, 11, 'Video Production', '2024-03-18 17:54:24', '2024-03-18 17:54:24'),
(114, 12, 'Complete Course', '2024-03-18 20:41:14', '2024-03-18 20:41:14'),
(115, 12, 'Short Term Project', '2024-03-18 20:41:14', '2024-03-18 20:41:14'),
(116, 12, 'Publishing', '2024-03-18 20:41:14', '2024-03-18 20:41:14'),
(117, 12, 'Editing & proofreading', '2024-03-18 20:41:14', '2024-03-18 20:41:14'),
(118, 12, 'SEO Questionnaire', '2024-03-18 20:41:14', '2024-03-18 20:41:14'),
(119, 12, 'Book Printing', '2024-03-18 20:41:14', '2024-03-18 20:41:14'),
(120, 12, 'Book Publishing', '2024-03-18 20:41:14', '2024-03-18 20:41:14'),
(121, 12, 'Book Writing', '2024-03-18 20:41:14', '2024-03-18 20:41:14'),
(122, 12, 'Writing', '2024-03-18 20:41:14', '2024-03-18 20:41:14'),
(123, 12, 'Book marketing', '2024-03-18 20:41:14', '2024-03-18 20:41:14'),
(124, 12, 'Audiobook', '2024-03-18 20:41:14', '2024-03-18 20:41:14'),
(125, 12, 'Website Development', '2024-03-18 20:41:14', '2024-03-18 20:41:14'),
(126, 12, 'Logo Design', '2024-03-18 20:41:14', '2024-03-18 20:41:14'),
(127, 12, 'Stationery Design', '2024-03-18 20:41:14', '2024-03-18 20:41:14'),
(128, 12, 'Content Writing', '2024-03-18 20:41:14', '2024-03-18 20:41:14'),
(129, 12, 'Copy Right Design', '2024-03-18 20:41:14', '2024-03-18 20:41:14'),
(130, 13, 'Publishing', '2024-03-18 20:46:10', '2024-03-18 20:46:10'),
(131, 13, 'Book Marketing', '2024-03-18 20:46:10', '2024-03-18 20:46:10'),
(132, 13, 'Writing', '2024-03-18 20:46:10', '2024-03-18 20:46:10'),
(133, 13, 'Book marketing', '2024-03-18 20:46:10', '2024-03-18 20:46:10'),
(134, 13, 'Website Development', '2024-03-18 20:46:10', '2024-03-18 20:46:10'),
(135, 13, 'Email Marketing Questionnaire', '2024-03-18 20:46:10', '2024-03-18 20:46:10'),
(136, 14, 'Short Term Project', '2024-03-18 20:50:18', '2024-03-18 20:50:18'),
(137, 14, 'Publishing', '2024-03-18 20:50:18', '2024-03-18 20:50:18'),
(138, 14, 'Book Printing', '2024-03-18 20:50:18', '2024-03-18 20:50:18'),
(139, 14, 'Book Writing', '2024-03-18 20:50:18', '2024-03-18 20:50:18'),
(140, 14, 'Writing', '2024-03-18 20:50:18', '2024-03-18 20:50:18'),
(141, 14, 'Dolore iste non aliq', '2024-03-18 20:50:18', '2024-03-18 20:50:18'),
(142, 15, 'Book marketing', '2024-03-18 21:23:51', '2024-03-18 21:23:51'),
(143, 15, 'Logo Design', '2024-03-18 21:23:51', '2024-03-18 21:23:51'),
(144, 15, 'Website Design', '2024-03-18 21:23:51', '2024-03-18 21:23:51'),
(145, 15, 'Copy Right Design', '2024-03-18 21:23:51', '2024-03-18 21:23:51'),
(146, 16, 'Short Term Project', '2024-03-20 17:52:10', '2024-03-20 17:52:10'),
(147, 16, 'Long Term Project', '2024-03-20 17:52:10', '2024-03-20 17:52:10'),
(148, 16, 'Publishing', '2024-03-20 17:52:10', '2024-03-20 17:52:10'),
(149, 17, 'Short Course', '2024-03-20 17:57:09', '2024-03-20 17:57:09'),
(150, 17, 'Book marketing', '2024-03-20 17:57:09', '2024-03-20 17:57:09'),
(151, 17, 'Stationery Design', '2024-03-20 17:57:09', '2024-03-20 17:57:09'),
(152, 18, 'Editing & proofreading', '2024-03-20 19:51:54', '2024-03-20 19:51:54'),
(153, 18, 'SEO Questionnaire', '2024-03-20 19:51:54', '2024-03-20 19:51:54'),
(154, 19, 'Website Development', '2024-04-03 21:40:54', '2024-04-03 21:40:54');

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
(23, '2014_10_12_000000_create_users_table', 1),
(24, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(25, '2014_10_12_100000_create_password_resets_table', 1),
(26, '2019_08_19_000000_create_failed_jobs_table', 1),
(27, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(28, '2023_05_17_164551_create_invoices_table', 1),
(29, '2024_01_26_204213_add_userid_to_invoices', 1),
(30, '2024_03_06_193223_create_permission_tables', 1),
(31, '2024_03_07_164549_create_customers_table', 1),
(32, '2024_03_08_171329_add_image_on_users', 1),
(33, '2024_03_08_230509_create_invoice_services_table', 1),
(34, '2024_03_09_003215_create_stripe_details_table', 1),
(35, '2024_03_11_235209_create_billing_details_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(1, 'App\\Models\\User', 1),
(2, 'App\\Models\\User', 6),
(4, 'App\\Models\\User', 3),
(5, 'App\\Models\\User', 2);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `guard_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
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
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `guard_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'web', '2024-03-14 16:47:43', '2024-03-14 16:47:43'),
(2, 'user', 'web', '2024-03-14 16:47:43', '2024-03-14 16:47:43'),
(3, 'payment', 'web', '2024-03-14 16:47:43', '2024-03-14 16:47:43'),
(4, 'not_access', 'web', '2024-03-14 16:47:43', '2024-03-14 16:47:43'),
(5, 'all_access', 'web', '2024-03-14 16:47:43', '2024-03-14 16:47:43');

-- --------------------------------------------------------

--
-- Table structure for table `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `stripe_details`
--

CREATE TABLE `stripe_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `customer_id` bigint(20) UNSIGNED NOT NULL,
  `customer_stripe_id` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `stripe_details`
--

INSERT INTO `stripe_details` (`id`, `customer_id`, `customer_stripe_id`, `created_at`, `updated_at`) VALUES
(3, 1, 'cus_Pk9RkTfz9X9849', '2024-03-15 18:06:04', '2024-03-15 18:06:04'),
(4, 1, 'cus_PlJhwxKVAPy84p', '2024-03-18 20:45:31', '2024-03-18 20:45:31'),
(5, 4, 'cus_PlKKjsnWMPjxJO', '2024-03-18 21:24:49', '2024-03-18 21:24:49'),
(6, 1, 'cus_Pm1MP1w1BgpdW0', '2024-03-20 17:52:48', '2024-03-20 17:52:48'),
(7, 5, 'cus_Pm3IohwwutumBl', '2024-03-20 19:52:46', '2024-03-20 19:52:46');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `creater_id` bigint(20) UNSIGNED DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `image` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `creater_id`, `remember_token`, `created_at`, `updated_at`, `image`) VALUES
(1, 'Admin', 'admin@gmail.com', NULL, '$2y$10$vM1LQhPVmWgjMHcrJSvsFOKZt056VKScfQDCP3DGQhH8nqHfip//2', NULL, NULL, '2024-03-14 16:47:57', '2024-03-20 19:38:07', 'https://terminals.secureserverinternal.com/public/storage/profile/93qJaMtEDepgz49u6oGVgMUDYntPDKpH4Eigzl8b.png'),
(2, 'Umer', 'umer@gmail.com', NULL, '$2y$10$9rZbih6cz6PAMgszMg4u5eO1kNSzHyLshRndroQz29c1TKml3BN9u', 1, NULL, '2024-03-14 16:59:19', '2024-03-20 19:39:04', 'https://terminals.secureserverinternal.com/public/storage/profile/8jiIHrjqg7iX6jkJKl5SVvTxYObo15lo4HhNDmZB.jpg'),
(3, 'Zubair', 'test@gmail.com', NULL, '$2y$10$ZG8oqj9WjRDfTFcaKl7s2ujI.ycvQJ9gkoJSlBTFfrOMM79KqaqC.', 2, NULL, '2024-03-14 17:49:10', '2024-03-18 21:39:42', NULL),
(6, 'Test', 'test2@gmail.com', NULL, '$2y$10$xJxx4ZLUviYBcIbMeVgAGeJYD9ngDJ5fIzoBRw3LPNywOzZiPGXwG', 1, NULL, '2024-03-20 19:50:27', '2024-03-20 19:50:27', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `billing_details`
--
ALTER TABLE `billing_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `customers_user_id_foreign` (`user_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `invoices`
--
ALTER TABLE `invoices`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `invoice_services`
--
ALTER TABLE `invoice_services`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  ADD KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  ADD KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Indexes for table `stripe_details`
--
ALTER TABLE `stripe_details`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT for table `billing_details`
--
ALTER TABLE `billing_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `invoices`
--
ALTER TABLE `invoices`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `invoice_services`
--
ALTER TABLE `invoice_services`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=155;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `stripe_details`
--
ALTER TABLE `stripe_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `customers`
--
ALTER TABLE `customers`
  ADD CONSTRAINT `customers_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
