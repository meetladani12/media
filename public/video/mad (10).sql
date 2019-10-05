-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 04, 2019 at 05:43 AM
-- Server version: 10.3.15-MariaDB
-- PHP Version: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mad`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile_no` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `mobile_no`, `password`, `type`, `created_at`, `updated_at`) VALUES
(1, 'Meet Ladani', 'meet@gmail.com', '9000091111', '123', 'Super', '2019-07-30 18:30:00', '2019-09-24 04:01:56'),
(2, 'Nigam Kavar', 'nigamkavar@gmail.com', '9000091111', '123', 'Research', '2019-07-31 18:30:00', '2019-09-21 03:32:24'),
(3, 'Bhavya Chaudhary', 'bhavyachaudhary@gmail.com', '6000000000', '123', 'Education', '2019-07-31 18:30:00', '2019-09-21 03:32:48'),
(4, 'Darshit Tank', 'darshittank@gmail.com', '8888888881', '123', 'Extension Education', '2019-07-31 18:30:00', '2019-07-31 18:30:00');

-- --------------------------------------------------------

--
-- Table structure for table `answers`
--

CREATE TABLE `answers` (
  `id` int(10) UNSIGNED NOT NULL,
  `question_id` int(11) NOT NULL,
  `answer` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `answers`
--

INSERT INTO `answers` (`id`, `question_id`, `answer`, `created_at`, `updated_at`) VALUES
(26, 9, 'use pesticide', '2019-09-16 00:14:25', '2019-10-03 04:14:42'),
(27, 10, 'use pesticide', '2019-09-19 03:48:30', '2019-09-19 03:48:30'),
(28, 17, 'use pesticide', '2019-09-25 04:17:12', '2019-09-25 04:17:19'),
(29, 19, 'abcd', '2019-10-03 05:05:11', '2019-10-03 06:16:12'),
(30, 21, 'imigro imprex ig-395', '2019-10-03 06:08:51', '2019-10-03 06:09:06');

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

CREATE TABLE `departments` (
  `id` int(10) UNSIGNED NOT NULL,
  `department_type_id` int(11) NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `departments`
--

INSERT INTO `departments` (`id`, `department_type_id`, `name`, `created_at`, `updated_at`) VALUES
(4, 2, 'B. A. College of Agriculture, Anand', '2019-07-31 05:58:27', '2019-09-26 22:25:14'),
(5, 2, 'Polytechnic in Agricultural Engineering, AAU, Dahod', '2019-07-31 05:58:35', '2019-09-25 00:00:26'),
(6, 2, 'Sheth M.C. College of Dairy Science, Anand', '2019-07-31 05:58:45', '2019-07-31 05:58:45'),
(7, 3, 'Transfer of Technology Centre, Arnej', '2019-07-31 05:58:55', '2019-07-31 05:58:55'),
(8, 3, 'Krishi Vigyan Kendra, Devataj(Sojitra)', '2019-07-31 05:59:03', '2019-07-31 05:59:03'),
(9, 2, 'College of Veterinary Science & Animal Husbandry, Anand', '2019-08-01 05:47:54', '2019-08-01 05:47:54'),
(10, 2, 'College of Agricultural Information Technology, Anand', '2019-08-01 05:48:02', '2019-08-01 05:48:02'),
(11, 2, 'International Agribusiness Management Institute, Anand', '2019-08-01 05:48:11', '2019-08-01 05:48:11'),
(12, 2, 'College of Food Processing Technology & Bio Energy, Anand', '2019-08-01 05:48:22', '2019-08-01 05:48:22'),
(13, 2, 'College of Agricultural Engineering & Technology, Godhra', '2019-08-01 05:48:30', '2019-08-01 05:48:30'),
(14, 2, 'E-Courses for Post Graduate Studies', '2019-08-01 05:48:43', '2019-08-01 05:48:43'),
(15, 2, 'College of Agriculture, Vaso', '2019-08-01 05:48:53', '2019-08-01 05:48:53'),
(16, 2, 'Polytechnic in Food Science and Home Economics, AAU, Anand', '2019-08-01 05:49:02', '2019-08-01 05:49:02'),
(17, 2, 'Sheth M.C. Polytechnic in Agriculture, AAU, Anand', '2019-08-01 05:49:22', '2019-08-01 05:49:22'),
(18, 2, 'Sheth D.M. Polytechnic in Horticulture, AAU, Vadodara', '2019-08-01 05:49:31', '2019-08-01 05:49:31'),
(19, 2, 'Institute of Distance Education Anand ( IDEA)', '2019-08-01 05:49:40', '2019-08-01 05:49:40'),
(20, 2, 'Information Technology Center, Anand', '2019-08-01 05:49:50', '2019-08-01 05:49:50'),
(21, 2, 'College of Horticulture, Anand', '2019-08-01 05:50:00', '2019-08-01 05:50:00'),
(22, 2, 'College of Agriculture, Jabugam', '2019-08-01 05:50:07', '2019-08-01 05:50:07'),
(23, 2, 'Polytechnic in Agriculture, Vaso', '2019-08-01 05:50:15', '2019-08-01 05:50:15'),
(24, 1, 'Bidi Tobacco Research Station, Anand', '2019-08-01 05:51:42', '2019-08-01 05:51:42'),
(25, 1, 'Main Forage Research Station, Anand', '2019-08-01 05:51:50', '2019-08-01 05:51:50'),
(26, 1, 'Reproductive Biology Research Unit, Anand', '2019-08-01 05:51:59', '2019-08-01 05:51:59'),
(27, 1, 'Main Vegetable Research Station, Anand', '2019-08-01 05:52:07', '2019-09-26 22:50:46'),
(28, 1, 'Medicinal and Aromatic Plants Research Station, AAU, Anand', '2019-08-01 05:52:18', '2019-08-01 05:52:18'),
(29, 1, 'Bio Control Research Laboratory, Anand', '2019-08-01 05:52:33', '2019-08-01 05:52:33'),
(30, 1, 'Weed control Project, Anand', '2019-08-01 05:52:41', '2019-08-01 05:52:41'),
(31, 1, 'Micro Nutrient Project, Anand', '2019-08-01 05:52:51', '2019-08-01 05:52:51'),
(32, 1, 'Main Rice Research Station, Nawagam', '2019-08-01 05:53:00', '2019-08-01 05:53:00'),
(33, 1, 'Main Maize Research Station, Godhra', '2019-08-01 05:53:09', '2019-08-01 05:53:09'),
(34, 1, 'Regional Research Station, Arnej', '2019-08-01 05:53:16', '2019-08-01 05:53:16'),
(35, 1, 'Agricultural Research Station, Dahod', '2019-08-01 05:53:24', '2019-09-26 22:50:30'),
(36, 1, 'Regional Cotton Research Station, Viramgam', '2019-08-01 05:53:31', '2019-08-01 05:53:31'),
(37, 1, 'Agricultural Research Station, Derol', '2019-08-01 05:53:45', '2019-08-01 05:53:45'),
(38, 1, 'Agricultural Research Station, Dhandhuka', '2019-08-01 05:53:52', '2019-08-01 05:53:52'),
(39, 1, 'Agricultural Research Station for Irrigated Crops, Thasra', '2019-08-01 05:54:01', '2019-08-01 05:54:01'),
(40, 1, 'Pulse Research Station, Vadodara', '2019-08-01 05:54:19', '2019-08-01 05:54:19'),
(41, 1, 'Paddy Research Station, Dabhoi', '2019-08-01 05:54:26', '2019-08-01 05:54:26'),
(42, 1, 'Castor and Seed Spices Research Station, Sanand', '2019-08-01 05:54:36', '2019-08-01 05:54:36'),
(43, 1, 'Department of Agricultural Biotechnology, Anand', '2019-08-01 05:54:44', '2019-08-01 05:54:44'),
(44, 1, 'Narmada Irrigation Research station, Khandha', '2019-08-01 05:54:51', '2019-08-01 05:54:51'),
(45, 1, 'Kapila Gau Shanshodhan Kendra, Minawada', '2019-08-01 05:54:59', '2019-08-01 05:54:59'),
(46, 1, 'Pashu Sanshodhan Kendra, Ramnamuvada', '2019-08-01 05:55:10', '2019-08-01 05:55:10'),
(47, 1, 'AINP on Pesticide Residues, ICAR, Unit-9', '2019-08-01 05:55:17', '2019-08-01 05:55:17'),
(48, 1, 'Agricultural Research Station, Sansoli - Nenpur', '2019-08-01 05:55:26', '2019-08-01 05:55:26'),
(49, 1, 'Livestock Research Station', '2019-08-01 05:55:35', '2019-08-01 05:55:35'),
(50, 1, 'Poultry Complex', '2019-08-01 05:55:52', '2019-08-01 05:55:52'),
(51, 1, 'AINP on Agricultural Ornithology, Anand', '2019-08-01 05:56:01', '2019-08-01 05:56:01'),
(52, 1, 'Animal Nutrition Research Station, Anand', '2019-08-01 05:56:09', '2019-08-01 05:56:09'),
(53, 1, 'Tribal Research cum Training Centre, AAU, Devagadhbaria', '2019-08-01 05:56:17', '2019-08-01 05:56:17'),
(54, 3, 'Transfer of Technology Centre, Arnej', '2019-08-01 05:56:45', '2019-08-01 05:56:45'),
(55, 3, 'Krishi Vigyan Kendra, Devataj(Sojitra)', '2019-08-01 05:56:53', '2019-08-01 05:56:53'),
(56, 3, 'Krishi Vigyan Kendra, Arnej', '2019-08-01 05:57:01', '2019-08-01 05:57:01'),
(57, 3, 'Krishi Vigyan Kendra, Dahod', '2019-08-01 05:57:36', '2019-08-01 05:57:36'),
(58, 3, 'Tribal Training, Dahod', '2019-08-01 05:57:45', '2019-08-01 05:57:45'),
(59, 3, 'FARM TECHNOLOGY TRAINING CENTRE, NENPUR', '2019-08-01 05:57:58', '2019-08-01 05:57:58'),
(60, 3, 'PASHU VIGYAN KENDRA, Limkheda', '2019-08-01 05:58:09', '2019-08-01 05:58:09'),
(61, 3, 'Directorate of Extension Education', '2019-08-01 05:58:26', '2019-08-01 05:58:26'),
(62, 3, 'Sardar Smruti Kendra, Anand', '2019-08-01 05:58:36', '2019-08-01 05:58:36'),
(63, 3, 'Sardar Patel Agricultural Educational Museum, Anand', '2019-08-01 05:58:47', '2019-08-01 05:58:47'),
(64, 3, 'Agriculture Technology Information Center, Anand', '2019-08-01 05:58:56', '2019-08-01 05:58:56'),
(65, 3, 'Training & Visit Scheme', '2019-08-01 05:59:08', '2019-08-01 05:59:08'),
(66, 3, 'Extension Education Institute, Anand', '2019-08-01 05:59:15', '2019-08-01 05:59:15'),
(67, 3, 'Poultry Training Centre, Anand', '2019-08-01 05:59:22', '2019-08-01 05:59:22'),
(68, 3, 'School of Baking, Anand', '2019-08-01 05:59:31', '2019-08-01 05:59:31'),
(69, 3, 'Mali Training Centre , AAU', '2019-08-01 05:59:38', '2019-08-01 05:59:38'),
(70, 3, 'Tribal Research cum Training Centre, Devagadhbaria', '2019-08-01 05:59:48', '2019-08-01 05:59:48'),
(71, 1, 'Directorate of Research & Dean PG Studies', '2019-09-11 03:59:50', '2019-09-11 03:59:50'),
(72, 1, 'Regional Research Station, Anand', '2019-09-16 00:08:00', '2019-09-16 00:08:00');

-- --------------------------------------------------------

--
-- Table structure for table `department_types`
--

CREATE TABLE `department_types` (
  `id` int(10) UNSIGNED NOT NULL,
  `type` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `department_types`
--

INSERT INTO `department_types` (`id`, `type`, `created_at`, `updated_at`) VALUES
(1, 'Research', '2019-07-31 05:56:17', '2019-07-31 05:56:17'),
(2, 'Education', '2019-07-31 05:56:42', '2019-07-31 05:56:42'),
(3, 'Extension Education', '2019-07-31 05:56:50', '2019-07-31 05:56:50');

-- --------------------------------------------------------

--
-- Table structure for table `districts`
--

CREATE TABLE `districts` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `districts`
--

INSERT INTO `districts` (`id`, `name`, `created_at`, `updated_at`) VALUES
(3, 'Rajkot', '2019-07-31 05:50:13', '2019-09-24 22:47:13'),
(8, 'Porbandar', '2019-09-11 05:24:39', '2019-09-24 22:45:22'),
(9, 'Anand', '2019-09-11 22:28:55', '2019-09-24 03:30:40'),
(10, 'Jamnagar', '2019-09-15 23:47:46', '2019-09-15 23:47:46'),
(11, 'aravalli', '2019-09-16 04:45:42', '2019-09-16 04:45:42'),
(14, 'Surat', '2019-09-24 22:50:40', '2019-09-24 22:50:40');

-- --------------------------------------------------------

--
-- Table structure for table `farmers`
--

CREATE TABLE `farmers` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile_no` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `village_id` int(11) NOT NULL,
  `address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `flag` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `farmers`
--

INSERT INTO `farmers` (`id`, `name`, `email`, `mobile_no`, `village_id`, `address`, `password`, `flag`, `created_at`, `updated_at`) VALUES
(9, 'Meet Ladani', 'meetladani12@student.aau.in', '9624021922', 12, 'Valotra', '1234', 1, '2019-09-15 21:47:31', '2019-09-20 22:12:46'),
(10, 'Bhavyakumar', 'bhavychaudhary5@gmail.com', '9099111122', 7, 'Kolki', '123', 1, '2019-09-15 21:53:48', '2019-09-15 21:53:48'),
(20, 'Meet Ladani', 'meet@gmail.com10', '9624021922', 7, 'kl;', '123', 1, '2019-09-18 05:36:38', '2019-09-18 05:36:38'),
(29, 'Meet Ladani', 'virat1998@student.aau.in', '7877676576', 7, 'aaa fhjgjghjghjm', '123', 1, '2019-10-03 06:03:59', '2019-10-03 06:03:59');

-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

CREATE TABLE `groups` (
  `id` int(10) UNSIGNED NOT NULL,
  `group_type_id` int(11) NOT NULL,
  `name` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `groups`
--

INSERT INTO `groups` (`id`, `group_type_id`, `name`, `created_at`, `updated_at`) VALUES
(6, 8, 'Banana', '2019-07-31 06:03:13', '2019-09-24 23:56:23'),
(8, 4, 'Paddy', '2019-09-10 22:14:47', '2019-09-24 23:56:04'),
(9, 4, 'Millet', '2019-09-10 22:15:20', '2019-09-10 22:15:20'),
(10, 9, 'Groundnut', '2019-09-11 00:20:54', '2019-09-17 04:01:38'),
(11, 9, 'Caster', '2019-09-11 00:21:01', '2019-09-11 00:21:01'),
(12, 8, 'Mango', '2019-09-11 03:34:42', '2019-09-11 03:34:42'),
(13, 4, 'Wheat', '2019-09-16 00:13:38', '2019-09-16 00:13:38'),
(14, 6, 'cotton', '2019-09-24 23:53:39', '2019-09-24 23:53:39');

-- --------------------------------------------------------

--
-- Table structure for table `group_types`
--

CREATE TABLE `group_types` (
  `id` int(10) UNSIGNED NOT NULL,
  `type` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `group_types`
--

INSERT INTO `group_types` (`id`, `type`, `created_at`, `updated_at`) VALUES
(4, 'Cereal Crops', '2019-09-10 22:13:38', '2019-09-25 00:11:47'),
(6, 'Cash crop', '2019-09-10 23:35:15', '2019-09-10 23:35:15'),
(8, 'Fruit crop', '2019-09-10 23:40:10', '2019-09-10 23:40:10'),
(9, 'Oil seed crop', '2019-09-11 00:03:00', '2019-09-11 00:20:36'),
(11, 'Flower Crop', '2019-09-16 00:12:35', '2019-09-16 00:12:35');

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
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_07_31_105748_create_farmers_table', 2),
(4, '2019_07_31_105923_create_scientists_table', 3),
(5, '2019_07_31_110027_create_districts_table', 4),
(6, '2019_07_31_110056_create_talukas_table', 4),
(7, '2019_07_31_110139_create_villages_table', 4),
(8, '2019_07_31_110352_create_admins_table', 5),
(9, '2019_07_31_110516_create_department_types_table', 6),
(10, '2019_07_31_110540_create_departments_table', 6),
(11, '2019_07_31_110621_create_group_types_table', 6),
(12, '2019_07_31_110655_create_groups_table', 6),
(13, '2019_07_31_111837_create_admins_table', 7),
(14, '2019_07_31_112257_create_villages_table', 8),
(15, '2019_08_01_092105_create_questions_table', 9),
(16, '2019_08_03_054708_create_answers_table', 10),
(17, '2019_08_05_055740_create_questions_table', 11),
(18, '2019_08_13_091749_create_videos_table', 12),
(19, '2019_09_04_084457_create_questions_table', 13);

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE `questions` (
  `id` int(10) UNSIGNED NOT NULL,
  `farmer_id` int(11) NOT NULL,
  `scientist_id` int(11) NOT NULL,
  `group_id` int(11) NOT NULL,
  `question` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `path` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `flag` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`id`, `farmer_id`, `scientist_id`, `group_id`, `question`, `path`, `flag`, `created_at`, `updated_at`) VALUES
(9, 9, 16, 8, 'pink boll worm', '—Pngtree—vector cancel icon_3762800.png', 1, '2019-09-14 23:35:34', '2019-09-16 00:14:25'),
(10, 9, 16, 8, 'pink boll worm', '—Pngtree—dustbin line black icon_3767633.png', 1, '2019-09-14 04:49:28', '2019-09-19 03:48:30'),
(17, 9, 16, 8, 'hello', 'putin.png', 1, '2019-09-25 04:16:08', '2019-09-25 04:17:12'),
(19, 9, 17, 12, 'How are you?', 'drops_glare_glass_surface_119949_3840x2400.jpg', 1, '2019-09-30 03:51:35', '2019-10-03 05:05:11'),
(20, 10, 17, 12, 'dfv df', 'minion.jpg', 0, '2019-09-30 03:55:37', '2019-09-30 03:55:37'),
(21, 29, 23, 14, 'downy mildliyu', 'land.mp4', 1, '2019-10-03 06:06:04', '2019-10-03 06:08:51');

-- --------------------------------------------------------

--
-- Table structure for table `scientists`
--

CREATE TABLE `scientists` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone_no` varchar(12) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile_no` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `designation` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `department_id` int(11) NOT NULL,
  `date_of_join` date NOT NULL,
  `group_id` int(11) NOT NULL,
  `address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `flag` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `scientists`
--

INSERT INTO `scientists` (`id`, `name`, `email`, `phone_no`, `mobile_no`, `designation`, `department_id`, `date_of_join`, `group_id`, `address`, `password`, `flag`, `created_at`, `updated_at`) VALUES
(3, 'Sandip', 'sandip@gmail.com', '9099111122', '9099111122', 'b tech', 8, '2019-01-07', 6, 'xcg', '12', 1, '2019-08-01 00:57:11', '2019-08-01 01:08:46'),
(16, 'nilay', 'nilayb56@student.aau.in', '9213510020', '9213511111', 'B. Tech', 47, '2019-03-08', 8, 'AAU, Anand', '123', 1, '2019-09-15 22:04:37', '2019-09-20 23:13:01'),
(17, 'Darshit Tank', 'tankdarhit437@student.aau.in', '8888888888', '8888888888', 'Phd', 19, '2019-06-22', 12, 'AAU, Anand', '123', 1, '2019-09-15 22:06:10', '2019-10-03 06:14:25'),
(18, 'Ruchit Soni', 'Ruchit12@gmail.com', '9999999999', '9999999999', 'Phd', 70, '2019-07-19', 10, 'AAU, Anand', '123', 1, '2019-09-15 22:09:28', '2019-09-15 22:22:20'),
(23, 'Vinod Gelot', 'VinodGelot@gmail.com', '9999999999', '9213510020', 'B. Tech', 21, '2019-09-18', 14, 'xcf', '123', 1, '2019-09-25 04:08:17', '2019-09-25 04:08:17'),
(24, 'Virat', 'meetladani12@gmail.com', '9213510020', '9624021921', 'B. Tech', 25, '2014-01-01', 6, ';;;;;', '123', 1, '2019-09-30 09:11:08', '2019-09-30 09:22:09'),
(25, 'Yashpal', 'yashpal.ckalaswa@student.aau.in', '9099013260', '9099013260', 'ABC', 24, '2010-06-01', 12, 'Anand,Gujarat,bharat', '123456', 1, '2019-10-01 05:34:42', '2019-10-01 05:35:16');

-- --------------------------------------------------------

--
-- Table structure for table `talukas`
--

CREATE TABLE `talukas` (
  `id` int(10) UNSIGNED NOT NULL,
  `district_id` int(11) NOT NULL,
  `name` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `talukas`
--

INSERT INTO `talukas` (`id`, `district_id`, `name`, `created_at`, `updated_at`) VALUES
(5, 8, 'Ranavav', '2019-09-11 05:41:34', '2019-09-27 03:24:34'),
(6, 3, 'Upleta', '2019-09-11 22:29:45', '2019-09-11 22:29:45'),
(7, 3, 'Dhoraji', '2019-09-11 22:29:55', '2019-09-27 03:41:36'),
(13, 8, 'Kutiyana', '2019-09-27 00:41:39', '2019-09-27 03:40:44'),
(14, 3, 'Jetpur', '2019-09-27 03:42:52', '2019-09-27 03:42:58');

-- --------------------------------------------------------

--
-- Table structure for table `videos`
--

CREATE TABLE `videos` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `tags` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `file_name` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `youtube_video_id` varchar(11) COLLATE utf8mb4_unicode_ci NOT NULL,
  `scientist_id` int(11) NOT NULL,
  `group_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `videos`
--

INSERT INTO `videos` (`id`, `title`, `description`, `tags`, `file_name`, `youtube_video_id`, `scientist_id`, `group_id`, `created_at`, `updated_at`) VALUES
(18, 'df', 'df', 'df', 'demo_soil.mp4', 'vX1ph_dbq2c', 16, 8, '2019-08-20 03:39:07', '2019-08-20 03:39:24'),
(22, 'df', 'df', 'dsf', 'Geometry Part 11 - Orthocenter By Abhinay Sharma (Abhinay Maths).mp4', 'buYepF8jJhg', 17, 10, '2019-08-20 22:52:59', '2019-08-20 22:53:32'),
(23, 'demog', 'gfh', 'gfh', '4149a6ad-4530-4b8b-b5bb-347674457a64.mp4', 'zvmPQy7WdFY', 16, 6, '2019-08-20 22:57:58', '2019-08-20 22:59:03'),
(25, 'cvg', 'gf', 'gf', 'intro.mp4', 'TO_AAbkVHyo', 18, 10, '2019-08-21 22:26:25', '2019-08-21 22:27:14'),
(26, 'cgf', 'c', 'gf', 'weeding.mp4', '9nVkKbbe3wc', 17, 8, '2019-08-21 22:38:19', '2019-08-21 22:38:50'),
(27, 'dfgh', 'g', 'h', 'yield.mp4', 's4A5q4_boC0', 16, 6, '2019-08-21 22:52:39', '2019-08-21 22:52:39'),
(28, '9-[', '][', 'ab,cd', 'hal.mp4', 'A4EaejAr-QM', 16, 12, '2019-08-21 22:58:43', '2019-08-21 22:59:02'),
(31, 'm,', 'mj', 'J', 'h_m_planting_spacing.mp4', 'iMMMxHwS6a4', 17, 10, '2019-08-23 04:56:26', '2019-08-23 04:56:26'),
(32, 'sdf', 'ds', 'df', 'combine.mp4', 'CNL89AXhNbU', 3, 6, '2019-09-03 00:38:54', '2019-09-03 00:39:25'),
(33, 'drt', 'df', 'dfg', 'organic_land.mp4', 'NFONm2w-jXQ', 17, 12, '2019-09-03 23:10:30', '2019-09-03 23:10:55'),
(35, 'xzc', 'xc', 'zx', 'hqpm.mp4', 'LHAozej7beM', 16, 12, '2019-09-04 05:31:19', '2019-09-04 05:31:30'),
(36, 'tillage', 'df', 'dsf', 'Winter Sun Rising over Dartmoor - timelapse - 16th January 2016.mp4', '7r7mDlaYqRw', 18, 10, '2019-09-09 05:39:21', '2019-09-09 05:39:39'),
(37, 'bvvvv', 'hhhh', '1230', 'january.mp4', 'Q_mBn7-RXGI', 17, 12, '2019-09-16 04:50:46', '2019-09-16 04:51:08'),
(38, 'gh fgh', 'fgh', 'g,g', 'june.mp4', 'e81fCkCurU0', 16, 8, '2019-09-16 05:02:57', '2019-09-16 05:02:57'),
(39, 'dfg dfg df', 'sd', '1,2', 'september.mp4', 'Qjx1LeHyqrk', 16, 8, '2019-09-16 05:05:10', '2019-09-16 05:05:29'),
(40, 'Videoad', 'sfddddddddddd', 'sssss', 'december.mp4', 'auOxx3A1RSA', 16, 8, '2019-09-16 05:07:49', '2019-09-16 05:08:21'),
(42, 'cotton', 'vdf', 'ctn', 'planting_jivato_1.mp4', 'iSC6rZ4xi7I', 17, 12, '2019-09-24 05:04:51', '2019-09-24 05:05:19'),
(46, 'cotton tillage', 'tillage', 'fg', 'land.mp4', 's0I1tyeJ2r8', 17, 12, '2019-10-03 05:50:58', '2019-10-03 05:51:23');

-- --------------------------------------------------------

--
-- Table structure for table `villages`
--

CREATE TABLE `villages` (
  `id` int(10) UNSIGNED NOT NULL,
  `taluka_id` int(11) NOT NULL,
  `name` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `villages`
--

INSERT INTO `villages` (`id`, `taluka_id`, `name`, `created_at`, `updated_at`) VALUES
(7, 6, 'Kolki', '2019-09-11 22:30:52', '2019-09-27 03:45:16'),
(8, 6, 'Bhimora', '2019-09-11 22:31:05', '2019-09-11 22:31:05'),
(9, 7, 'Supedi', '2019-09-11 22:31:15', '2019-09-27 03:45:23'),
(10, 7, 'Zanzmer', '2019-09-11 22:31:28', '2019-09-11 22:31:28'),
(12, 5, 'Valotra', '2019-09-11 22:31:44', '2019-09-18 23:03:47'),
(13, 5, 'Rana Kandorana', '2019-09-11 22:32:00', '2019-09-12 22:46:24');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `answers`
--
ALTER TABLE `answers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `departments`
--
ALTER TABLE `departments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `department_types`
--
ALTER TABLE `department_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `districts`
--
ALTER TABLE `districts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `farmers`
--
ALTER TABLE `farmers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `groups`
--
ALTER TABLE `groups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `group_types`
--
ALTER TABLE `group_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `scientists`
--
ALTER TABLE `scientists`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `talukas`
--
ALTER TABLE `talukas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `videos`
--
ALTER TABLE `videos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `villages`
--
ALTER TABLE `villages`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `answers`
--
ALTER TABLE `answers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `departments`
--
ALTER TABLE `departments`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=75;

--
-- AUTO_INCREMENT for table `department_types`
--
ALTER TABLE `department_types`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `districts`
--
ALTER TABLE `districts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `farmers`
--
ALTER TABLE `farmers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `groups`
--
ALTER TABLE `groups`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `group_types`
--
ALTER TABLE `group_types`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `questions`
--
ALTER TABLE `questions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `scientists`
--
ALTER TABLE `scientists`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `talukas`
--
ALTER TABLE `talukas`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `videos`
--
ALTER TABLE `videos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `villages`
--
ALTER TABLE `villages`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
