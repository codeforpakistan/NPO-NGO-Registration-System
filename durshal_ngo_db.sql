-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 14, 2025 at 01:17 PM
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
-- Database: `durshal_ngo`
--

-- --------------------------------------------------------

--
-- Table structure for table `aim_objective_table`
--

CREATE TABLE `aim_objective_table` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `aim_objective_table`
--

INSERT INTO `aim_objective_table` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Promote Health and Well-being\r\n', '2025-01-29 02:35:42', '2025-01-29 02:35:42'),
(2, 'Support Vulnerable Populations\r\n', '2025-01-29 03:40:58', '2025-01-29 03:40:58'),
(3, 'Enhance Educational Opportunities\r\n', '2025-01-29 03:41:11', '2025-01-29 03:41:11'),
(4, 'Foster Community Development\r\n', '2025-01-29 03:41:16', '2025-01-29 03:41:16'),
(7, 'Provide Disaster Relief\r\n', '2025-01-29 03:41:45', '2025-01-29 03:41:45'),
(8, 'Promote Gender Equality', '2025-01-29 03:41:52', '2025-01-29 03:41:52'),
(9, 'Advocate for Social Justice', '2025-03-21 13:20:12', '2025-03-21 13:20:12');

-- --------------------------------------------------------

--
-- Table structure for table `application_timelines`
--

CREATE TABLE `application_timelines` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `basic_info_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `stage` enum('NGO Submission','DO Review','AD Review','DD Review','DG Review','Final Decision') NOT NULL,
  `status` enum('Submitted','Reversed','Forwarded','Accepted','Rejected') NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `application_timelines`
--

INSERT INTO `application_timelines` (`id`, `basic_info_id`, `user_id`, `stage`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 4, 'NGO Submission', 'Submitted', '2025-03-26 16:04:38', '2025-03-26 16:04:38'),
(2, 1, 2, 'DO Review', 'Forwarded', '2025-04-06 09:28:18', '2025-04-06 09:28:18'),
(4, 1, 2, 'DO Review', 'Reversed', '2025-04-06 12:58:39', '2025-04-06 12:58:39'),
(5, 1, 4, 'NGO Submission', 'Submitted', '2025-04-06 13:00:41', '2025-04-06 13:00:41'),
(6, 1, 2, 'DO Review', 'Forwarded', '2025-04-06 13:02:40', '2025-04-06 13:02:40'),
(7, 1, 5, 'AD Review', 'Reversed', '2025-04-07 06:25:37', '2025-04-07 06:25:37'),
(8, 1, 2, 'DO Review', 'Forwarded', '2025-04-07 06:26:38', '2025-04-07 06:26:38'),
(9, 1, 5, 'AD Review', 'Forwarded', '2025-04-07 06:28:05', '2025-04-07 06:28:05'),
(10, 1, 6, 'DD Review', 'Reversed', '2025-04-07 08:46:23', '2025-04-07 08:46:23'),
(11, 1, 5, 'AD Review', 'Forwarded', '2025-04-07 08:47:19', '2025-04-07 08:47:19'),
(12, 1, 6, 'DD Review', 'Forwarded', '2025-04-07 08:48:09', '2025-04-07 08:48:09'),
(13, 1, 3, 'DG Review', 'Reversed', '2025-04-07 11:40:06', '2025-04-07 11:40:06'),
(14, 1, 6, 'DD Review', 'Forwarded', '2025-04-07 11:41:37', '2025-04-07 11:41:37'),
(15, 1, 3, 'DG Review', 'Reversed', '2025-04-07 11:42:31', '2025-04-07 11:42:31'),
(16, 1, 6, 'DD Review', 'Forwarded', '2025-04-07 11:43:15', '2025-04-07 11:43:15'),
(17, 1, 3, 'DG Review', 'Rejected', '2025-04-07 11:57:39', '2025-04-07 11:57:39'),
(18, 1, 3, 'DG Review', 'Accepted', '2025-04-07 12:16:13', '2025-04-07 12:16:13'),
(19, 2, 4, 'NGO Submission', 'Submitted', '2025-04-08 04:12:03', '2025-04-08 04:12:03'),
(20, 2, 2, 'DO Review', 'Forwarded', '2025-04-08 04:13:59', '2025-04-08 04:13:59'),
(21, 2, 5, 'AD Review', 'Forwarded', '2025-04-08 04:16:13', '2025-04-08 04:16:13'),
(22, 2, 6, 'DD Review', 'Forwarded', '2025-04-08 04:17:19', '2025-04-08 04:17:19'),
(23, 2, 3, 'DG Review', 'Accepted', '2025-04-08 04:19:16', '2025-04-08 04:19:16');

-- --------------------------------------------------------

--
-- Table structure for table `application_workflows`
--

CREATE TABLE `application_workflows` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `basic_info_id` bigint(20) UNSIGNED NOT NULL,
  `from_user_id` bigint(20) UNSIGNED NOT NULL,
  `to_user_id` bigint(20) UNSIGNED NOT NULL,
  `action` enum('Forwarded','Reversed','Accepted','Rejected','Submitted') NOT NULL,
  `comments` text DEFAULT NULL,
  `attachment` varchar(150) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `application_workflows`
--

INSERT INTO `application_workflows` (`id`, `basic_info_id`, `from_user_id`, `to_user_id`, `action`, `comments`, `attachment`, `created_at`, `updated_at`) VALUES
(1, 1, 0, 2, 'Submitted', 'NGO Submitted the Application', NULL, '2025-04-01 12:04:52', '2025-04-01 12:04:52'),
(2, 1, 2, 3, 'Forwarded', 'saqib', 'uploads/1743949698_asfandyar_certificate__ID=650.pdf', '2025-04-06 09:28:18', '2025-04-06 09:28:18'),
(3, 1, 2, 0, 'Reversed', 'Reversed', 'uploads/1743962319_Interview.pdf', '2025-04-06 12:58:39', '2025-04-06 12:58:39'),
(4, 1, 0, 2, 'Submitted', 'NGO Submitted the Application', NULL, '2025-04-06 13:00:41', '2025-04-06 13:00:41'),
(5, 1, 2, 3, 'Forwarded', 'Forward to AD, for review', NULL, '2025-04-06 13:02:40', '2025-04-06 13:02:40'),
(6, 1, 3, 2, 'Reversed', 'Reversed to DO,', NULL, '2025-04-07 06:25:37', '2025-04-07 06:25:37'),
(7, 1, 2, 3, 'Forwarded', 'Corrected as you suggested.', 'uploads/1744025197_mpdf.pdf', '2025-04-07 06:26:38', '2025-04-07 06:26:38'),
(8, 1, 3, 4, 'Forwarded', 'Forwarding to DO', 'uploads/1744025285_AsadPrint.pdf', '2025-04-07 06:28:05', '2025-04-07 06:28:05'),
(9, 1, 4, 3, 'Reversed', 'Reverse To AD', NULL, '2025-04-07 08:46:23', '2025-04-07 08:46:23'),
(10, 1, 3, 4, 'Forwarded', 'Forward To DD Again, After Correction', NULL, '2025-04-07 08:47:19', '2025-04-07 08:47:19'),
(11, 1, 4, 5, 'Forwarded', 'Forward to DG for approval', 'uploads/1744033689_asfandyar_certificate__ID=650.pdf', '2025-04-07 08:48:09', '2025-04-07 08:48:09'),
(12, 1, 5, 4, 'Reversed', 'Reversed to DD for final review.', NULL, '2025-04-07 11:40:06', '2025-04-07 11:40:06'),
(13, 1, 4, 5, 'Forwarded', NULL, NULL, '2025-04-07 11:41:37', '2025-04-07 11:41:37'),
(14, 1, 5, 4, 'Reversed', 'Review Again DD.', 'uploads/1744044151_Interview.pdf', '2025-04-07 11:42:31', '2025-04-07 11:42:31'),
(15, 1, 4, 5, 'Forwarded', 'Corrected.', NULL, '2025-04-07 11:43:15', '2025-04-07 11:43:15'),
(16, 1, 5, 0, 'Rejected', 'I Found Some of the documents fake, I reject the application.', 'uploads/1744045059_mpdf.pdf', '2025-04-07 11:57:39', '2025-04-07 11:57:39'),
(17, 1, 5, 768, 'Accepted', 'Accepted', NULL, '2025-04-07 12:16:13', '2025-04-07 12:16:13'),
(18, 2, 0, 2, 'Submitted', 'NGO Submitted the Application', NULL, '2025-04-08 04:12:03', '2025-04-08 04:12:03'),
(19, 2, 2, 3, 'Forwarded', 'Forward to AD', 'uploads/1744103639_Jalal-TICKET.pdf.pdf', '2025-04-08 04:13:59', '2025-04-08 04:13:59'),
(20, 2, 3, 4, 'Forwarded', 'Forwarded to DD', NULL, '2025-04-08 04:16:13', '2025-04-08 04:16:13'),
(21, 2, 4, 5, 'Forwarded', 'Forward to DG', NULL, '2025-04-08 04:17:19', '2025-04-08 04:17:19'),
(22, 2, 5, 768, 'Accepted', 'All record Found Correct. Accepted.', NULL, '2025-04-08 04:19:16', '2025-04-08 04:19:16');

-- --------------------------------------------------------

--
-- Table structure for table `area_of_operations`
--

CREATE TABLE `area_of_operations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `area_of_operations`
--

INSERT INTO `area_of_operations` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Peshawar', '2025-03-21 11:50:48', '2025-03-21 11:50:48'),
(3, 'Nowshera', '2025-03-21 12:07:25', '2025-03-21 12:07:25');

-- --------------------------------------------------------

--
-- Table structure for table `banks`
--

CREATE TABLE `banks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `banks`
--

INSERT INTO `banks` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Khyber Bank', '2025-01-28 00:38:25', '2025-01-28 00:38:25'),
(3, 'MCB', '2025-01-28 01:37:05', '2025-01-28 01:37:05'),
(4, 'HBL', '2025-01-28 01:37:10', '2025-01-28 01:37:10'),
(5, 'UBL', '2025-01-28 01:37:15', '2025-01-28 01:37:15'),
(7, 'ABL', '2025-03-21 12:30:30', '2025-03-21 12:30:30');

-- --------------------------------------------------------

--
-- Table structure for table `basics_aim`
--

CREATE TABLE `basics_aim` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `basic_info_id` bigint(20) UNSIGNED NOT NULL,
  `aim_obj_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `basics_aim`
--

INSERT INTO `basics_aim` (`id`, `basic_info_id`, `aim_obj_id`, `created_at`, `updated_at`) VALUES
(1, 1, 7, NULL, NULL),
(2, 1, 9, NULL, NULL),
(3, 2, 1, NULL, NULL),
(4, 2, 3, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `basic_information`
--

CREATE TABLE `basic_information` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `contact` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `constitution_file` varchar(255) DEFAULT NULL,
  `status` varchar(50) DEFAULT NULL,
  `reject` varchar(50) DEFAULT NULL,
  `district_id` varchar(50) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `basic_information`
--

INSERT INTO `basic_information` (`id`, `name`, `contact`, `address`, `constitution_file`, `status`, `reject`, `district_id`, `created_at`, `updated_at`, `user_id`) VALUES
(1, 'Saqib Foundation', '+9291630655', 'Park Rd, University Town, Peshawar, Pakistan', 'uploads/L8SVriLOpJwFOVdatdxPlECW8DC52yByd53uz1wa.pdf', '5', NULL, '1', '2025-03-26 15:09:03', '2025-04-07 12:16:13', 4),
(2, 'Abbas Foundation', '+923339163563', 'Park Rd, University Town, Peshawar, Pakistan', 'uploads/iCjVnnjs8xjhoU0DL9fK4sWbdcIQzhIyE2e5fwJq.pdf', '5', NULL, '1', '2025-04-08 04:06:29', '2025-04-08 04:19:16', 4);

-- --------------------------------------------------------

--
-- Table structure for table `certificates`
--

CREATE TABLE `certificates` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `basic_info_id` bigint(20) UNSIGNED NOT NULL,
  `issued_by` bigint(20) UNSIGNED NOT NULL,
  `certificate_number` varchar(50) NOT NULL,
  `certificate_file` varchar(255) NOT NULL,
  `status` enum('active','cancel') NOT NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cities`
--

CREATE TABLE `cities` (
  `city_id` bigint(20) UNSIGNED NOT NULL,
  `city_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cities`
--

INSERT INTO `cities` (`city_id`, `city_name`, `created_at`, `updated_at`) VALUES
(1, 'Peshawar', '2025-01-29 22:46:31', '2025-01-29 22:46:31'),
(2, 'Islamabad', '2025-01-31 01:29:36', '2025-01-31 01:29:36');

-- --------------------------------------------------------

--
-- Table structure for table `details`
--

CREATE TABLE `details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `father_name` varchar(255) DEFAULT NULL,
  `gender` enum('male','female','other') DEFAULT NULL,
  `date_of_birth` date DEFAULT NULL,
  `qualification` varchar(255) DEFAULT NULL,
  `designation` varchar(255) DEFAULT NULL,
  `occupation` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `contact` varchar(255) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `cnic` varchar(255) DEFAULT NULL,
  `cv` varchar(255) DEFAULT NULL,
  `city_id` bigint(20) UNSIGNED DEFAULT NULL,
  `status_id` bigint(20) UNSIGNED DEFAULT NULL,
  `reject` bigint(20) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `basic_info_id` bigint(20) UNSIGNED DEFAULT NULL,
  `police_verficaton` varchar(255) DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `details`
--

INSERT INTO `details` (`id`, `name`, `father_name`, `gender`, `date_of_birth`, `qualification`, `designation`, `occupation`, `email`, `contact`, `address`, `cnic`, `cv`, `city_id`, `status_id`, `reject`, `created_at`, `updated_at`, `basic_info_id`, `police_verficaton`, `user_id`) VALUES
(1, 'Muhammad Saqib', 'Muhammad Hadi', NULL, NULL, 'Bachelor\'s', 'Executive', 'Director', NULL, '+923339163563', 'Peshawar, Pakistan', 'uploads/gPJvD8hBuVdU8TTbGy8sFNVAJD4B9BjPMxUMPXn8.pdf', 'uploads/GsHXDSL24lspR9aVYKHWlNKwze4bj1Jrve7Q22Fj.pdf', NULL, 5, NULL, '2025-03-26 15:10:40', '2025-04-07 12:16:13', 1, 'uploads/REpgQpkI6UmYNxvrza9ehUxaFnkHfBDS49ptZol1.pdf', 4),
(2, 'Zaka ul Hasnain', NULL, NULL, NULL, NULL, NULL, 'Director', NULL, NULL, 'London, UK', 'uploads/cnic/QI6djSffuBlhP0VmNANc2IT4RgN707ahOt9vdZN7.pdf', NULL, NULL, 5, NULL, '2025-03-26 15:16:34', '2025-04-07 12:16:13', 1, NULL, 4),
(3, 'Muhammad Abubakkar', NULL, 'male', '2025-03-01', NULL, NULL, NULL, 'abubakkar@gmail.com', '+923453308120', 'Peshawar, Pakistan', '1720167797919', NULL, 1, 5, NULL, '2025-03-26 15:17:42', '2025-04-07 12:16:13', 1, NULL, 4),
(4, 'Saqib', 'M Hadi', NULL, NULL, 'BS', 'Executive', 'Employee', NULL, '+923339163563', 'Moh: Amir Abad Near Tiles Factory', 'uploads/IQCycCSTmIOpZHiVSXPEkjVfUzCntOw80ITG9aUb.pdf', 'uploads/XIhEd8wcsLN3IKEGIWTEO1jXY794ze74sclIsnvS.pdf', NULL, NULL, NULL, '2025-04-08 04:07:29', '2025-04-08 04:08:14', 1, 'uploads/OA3QRxTerVT1A7sA3c9zA5pvlSvwaIch38QtlWcQ.pdf', 4),
(5, 'Muhammad Hadi', NULL, NULL, NULL, NULL, NULL, 'Director', NULL, NULL, 'Peshawar, Pakistan', 'uploads/cnic/cnKllxlnzrVwsoJt48ycs8J9CGgfHTDdMtbIWbaq.pdf', NULL, NULL, 5, NULL, '2025-04-08 04:08:55', '2025-04-08 04:19:16', 2, NULL, 4),
(6, 'Shaheen', NULL, 'male', '2025-04-01', NULL, NULL, NULL, 'shaheen@gmail.com', '+923339163563', 'Moh: Amir Abad Near Tiles Factory', '1720167797919', NULL, 1, 5, NULL, '2025-04-08 04:09:54', '2025-04-08 04:19:16', 2, NULL, 4);

-- --------------------------------------------------------

--
-- Table structure for table `districts`
--

CREATE TABLE `districts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `districts`
--

INSERT INTO `districts` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Peshawar', '2025-03-21 14:35:47', '2025-03-21 14:35:47'),
(2, 'Nowshera', '2025-03-21 15:24:23', '2025-03-21 15:24:23'),
(3, 'Mardan', '2025-03-21 15:24:31', '2025-03-21 15:24:31');

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
-- Table structure for table `financials`
--

CREATE TABLE `financials` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `has_bank_account` tinyint(1) NOT NULL,
  `bank_id` bigint(20) UNSIGNED DEFAULT NULL,
  `branch_name` varchar(255) DEFAULT NULL,
  `branch_code` varchar(255) DEFAULT NULL,
  `income_expenditure_file` varchar(255) DEFAULT NULL,
  `prop_finan_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `basic_info_id` bigint(20) UNSIGNED DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `financials`
--

INSERT INTO `financials` (`id`, `has_bank_account`, `bank_id`, `branch_name`, `branch_code`, `income_expenditure_file`, `prop_finan_id`, `created_at`, `updated_at`, `basic_info_id`, `user_id`) VALUES
(1, 0, 4, 'Peshawar', '000012', 'uploads/tyWgi2oWe1hsprvIBLMIQgrksgAgJO7tZO9JR1lZ.pdf', 5, '2025-03-26 15:18:23', '2025-03-26 15:18:23', 1, 4),
(2, 0, 1, 'Peshawar', '000012', 'uploads/Qn9li3plbKnAsIw30BfoamDwQq7nNpJ9HlfJDnAq.pdf', 2, '2025-04-08 04:10:27', '2025-04-08 04:10:27', 2, 4);

-- --------------------------------------------------------

--
-- Table structure for table `members`
--

CREATE TABLE `members` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `details_id` bigint(20) UNSIGNED DEFAULT NULL,
  `member_type_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `members`
--

INSERT INTO `members` (`id`, `details_id`, `member_type_id`, `created_at`, `updated_at`) VALUES
(23, 1, 6, '2025-03-26 15:10:40', '2025-03-26 15:10:40'),
(24, 1, 7, '2025-03-26 15:14:37', '2025-03-26 15:14:37'),
(25, 2, 8, '2025-03-26 15:16:34', '2025-03-26 15:16:34'),
(26, 3, 5, '2025-03-26 15:17:42', '2025-03-26 15:17:42'),
(27, 4, 6, '2025-04-08 04:07:29', '2025-04-08 04:07:29'),
(28, 4, 7, '2025-04-08 04:08:14', '2025-04-08 04:08:14'),
(29, 5, 8, '2025-04-08 04:08:55', '2025-04-08 04:08:55'),
(30, 6, 5, '2025-04-08 04:09:54', '2025-04-08 04:09:54');

-- --------------------------------------------------------

--
-- Table structure for table `membership_types`
--

CREATE TABLE `membership_types` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `membership_types`
--

INSERT INTO `membership_types` (`id`, `name`, `created_at`, `updated_at`) VALUES
(5, 'Member', NULL, NULL),
(6, 'General Body', NULL, NULL),
(7, 'Executive Member', NULL, NULL),
(8, 'Founding Member', NULL, NULL);

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
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2025_01_08_130511_create_basic_information_table', 1),
(6, '2025_01_08_130551_create_aim_objectives_table', 1),
(7, '2025_01_08_130712_create_basics_aims_table', 1),
(8, '2025_01_09_073519_create_cities_table', 1),
(9, '2025_01_09_073520_create_statuses_table', 1),
(10, '2025_01_09_073552_create_details_table', 1),
(11, '2025_01_09_073633_create_membership_types_table', 1),
(12, '2025_01_09_073801_create_members_table', 1),
(13, '2025_01_20_164409_create_banks_table', 1),
(14, '2025_01_20_164410_create_proposed_finances_table', 1),
(15, '2025_01_20_164411_create_financials_table', 1),
(16, '2025_01_22_053454_create_area_of_operations_table', 1),
(17, '2025_01_22_053517_create_operations_table', 1),
(18, '2025_01_31_130451_add_phone_number_to_users_table', 2),
(19, '2025_01_31_171255_create_roles_table', 3),
(20, '2025_01_31_13451_add_phone_number_to_users_table', 4),
(21, '2025_02_04_121253_add_column_to_details_table', 5),
(22, '2025_02_04_122141_add_basic_info_id_to_financials_table', 6),
(23, '2025_02_04_12214_add_basic_info_id_to_financials_table', 7),
(24, '2025_02_04_12213_add_basic_info_id_to_financials_table', 8),
(25, '2025_02_04_123019_add_basic_info_id_to_operations_table', 9),
(26, '2025_02_05_060647_add_police_verfication_to_details_table', 10),
(27, '2025_02_05_060648_add_police_verfication_to_details_table', 11),
(28, '2025_02_10_074923_add_user_id_to_basic_information_table', 12),
(29, '2025_02_13_070615_add_user_id_to_operations_table', 13),
(30, '2025_02_17_044109_add_user_id_to_details_table', 14),
(31, '2025_02_17_120901_add_user_id_to_financials_table', 15),
(32, '2025_03_21_191938_create_districts_table', 16),
(33, '2025_03_25_215803_create_application_workflows_table', 17),
(34, '2025_03_25_220512_create_application_timelines_table', 18),
(35, '2025_03_25_221623_create_certificates_table', 19);

-- --------------------------------------------------------

--
-- Table structure for table `operations`
--

CREATE TABLE `operations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `area_of_operation_id` bigint(20) UNSIGNED NOT NULL,
  `future_plan_file` varchar(255) DEFAULT NULL,
  `plan_operation_file` varchar(255) DEFAULT NULL,
  `progress_report_file` varchar(255) DEFAULT NULL,
  `first_meeting_file` varchar(255) DEFAULT NULL,
  `last_meeting_file` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `basic_info_id` bigint(20) UNSIGNED DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `operations`
--

INSERT INTO `operations` (`id`, `area_of_operation_id`, `future_plan_file`, `plan_operation_file`, `progress_report_file`, `first_meeting_file`, `last_meeting_file`, `created_at`, `updated_at`, `basic_info_id`, `user_id`) VALUES
(1, 1, 'uploads/0IY2Y2ePVIRnKV6GugZrBoej1SyrnJntNqD5DHzk.pdf', 'uploads/7xbeyumS4WoScFwY2rVUzOVUGXwZEin5VrpJxsEs.pdf', 'uploads/TlVSanOLuJsVuAwBzHa5H81icYXt5w2zraJLoC7Y.pdf', 'uploads/E9KPI2KaCsfr4KylEll6Uqccaqj6odLASL8cXFAk.pdf', 'uploads/nqb0cOmF8ncD9X4TajGvXVB81UomEtuHAvRkjwQG.pdf', '2025-03-26 15:19:09', '2025-03-26 15:19:09', 1, 4),
(2, 1, 'uploads/Nwk3TLmDy25L8VOuxlvlyxVWYHpLK6XqHbQhNJQ6.pdf', 'uploads/iY3EYY5F8FDf67JNbUa6bJGYdsQmJm219fZDtibK.pdf', 'uploads/xAL952vmUcB8zqSq15uxjKxUY0MFBd7UxMbILThh.pdf', 'uploads/3nRk84MASQmm1ySsmRZSX3asGk9BBE9CRALeNJhy.pdf', 'uploads/maQKrgtx2ysgc9zhPt5moVNy9Chq0ZCtcZJ7Szzx.pdf', '2025-04-08 04:11:10', '2025-04-08 04:11:10', 2, 4);

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
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `proposed_finances`
--

CREATE TABLE `proposed_finances` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `proposed_finances`
--

INSERT INTO `proposed_finances` (`id`, `name`, `created_at`, `updated_at`) VALUES
(2, 'UBL', '2025-02-20 05:30:12', '2025-02-20 05:30:12'),
(4, 'ABL', '2025-03-21 12:37:29', '2025-03-21 12:37:29'),
(5, 'HBL', '2025-03-21 12:37:57', '2025-03-21 12:37:57');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Super Admin', '2025-02-01 08:57:08', '2025-02-01 08:57:08'),
(2, 'District Officer (DO)', '2025-02-01 08:57:49', '2025-02-01 08:57:49'),
(3, 'Assistant Director (AD)', '2025-03-21 15:18:28', '2025-03-21 15:18:28'),
(4, 'Deputy Director (DD)', '2025-03-21 15:18:54', '2025-03-21 15:18:54'),
(5, 'Director General (DG)', '2025-03-21 15:19:24', '2025-03-21 15:19:24');

-- --------------------------------------------------------

--
-- Table structure for table `statuses`
--

CREATE TABLE `statuses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone_number` varchar(255) DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `role_id` bigint(20) UNSIGNED DEFAULT NULL,
  `district_id` bigint(20) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `phone_number`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `role_id`, `district_id`) VALUES
(1, 'Admin', 'admin@gmail.com', '000000', NULL, '$2y$10$Eux.0OWdbUdoD6JoYjrwbOMIyW26t/rFRg99VjcV7olfXq.vya1Ia', NULL, '2025-02-01 21:35:28', '2025-02-01 21:35:28', 1, 1),
(2, 'District Officer (DO)', 'do@gmail.com', '+923331122333', NULL, '$2y$10$5Sm4zARmFFxVwoOCImobLOKobfEuHyjho5UqsduqZupAnuk3Su.IO', NULL, '2025-02-01 10:48:47', '2025-02-01 10:48:47', 2, 1),
(3, 'Director General (DG)', 'dg@gmail.com', '+923001111111', NULL, '$2y$10$pNygXWJBMG905cc3zSs0i.4Zxyga9mM9KkVOccIIxX3NMGaOjk6C.', NULL, '2025-02-01 21:36:13', '2025-02-01 21:36:13', 5, 1),
(4, 'Saqib SK', 'saqibsk@gmail.com', '+923339163563', NULL, '$2y$10$5eyEk8EyHp0DZHwGoymnSOkJpXRxXDECE6jLYFfMf1AGU/DFDAS0q', NULL, '2025-02-13 00:24:50', '2025-02-13 00:24:50', NULL, 1),
(5, 'Assistant Director (AD)', 'ad@gmail.com', '+923339163563', NULL, '$2y$10$7FDGvnn4IgNYN1Qws2XgO.Pw6CyGJzwIfuC.J/hXsFPkUp8OEMVdG', NULL, '2025-04-06 10:55:10', '2025-04-06 10:55:10', 3, 1),
(6, 'Deputy Director (DD)', 'dd@gmail.com', '+923339163563', NULL, '$2y$10$HshuqVaF9uKxj7ZgpYKMnuET71uubKxhLKh.sd6PmYC0E2cqOW94K', NULL, '2025-04-06 10:55:49', '2025-04-06 10:55:49', 4, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `aim_objective_table`
--
ALTER TABLE `aim_objective_table`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `application_timelines`
--
ALTER TABLE `application_timelines`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `application_workflows`
--
ALTER TABLE `application_workflows`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `area_of_operations`
--
ALTER TABLE `area_of_operations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `banks`
--
ALTER TABLE `banks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `basics_aim`
--
ALTER TABLE `basics_aim`
  ADD PRIMARY KEY (`id`),
  ADD KEY `basics_aim_basic_info_id_foreign` (`basic_info_id`),
  ADD KEY `basics_aim_aim_obj_id_foreign` (`aim_obj_id`);

--
-- Indexes for table `basic_information`
--
ALTER TABLE `basic_information`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `certificates`
--
ALTER TABLE `certificates`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `certificates_certificate_number_unique` (`certificate_number`);

--
-- Indexes for table `cities`
--
ALTER TABLE `cities`
  ADD PRIMARY KEY (`city_id`);

--
-- Indexes for table `details`
--
ALTER TABLE `details`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `details_email_unique` (`email`),
  ADD KEY `details_city_id_foreign` (`city_id`),
  ADD KEY `details_status_id_foreign` (`status_id`);

--
-- Indexes for table `districts`
--
ALTER TABLE `districts`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `districts_name_unique` (`name`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `financials`
--
ALTER TABLE `financials`
  ADD PRIMARY KEY (`id`),
  ADD KEY `financials_bank_id_foreign` (`bank_id`),
  ADD KEY `financials_prop_finan_id_foreign` (`prop_finan_id`);

--
-- Indexes for table `members`
--
ALTER TABLE `members`
  ADD PRIMARY KEY (`id`),
  ADD KEY `members_details_id_foreign` (`details_id`),
  ADD KEY `members_member_type_id_foreign` (`member_type_id`);

--
-- Indexes for table `membership_types`
--
ALTER TABLE `membership_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `operations`
--
ALTER TABLE `operations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `operations_area_of_operation_id_foreign` (`area_of_operation_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `proposed_finances`
--
ALTER TABLE `proposed_finances`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_unique` (`name`);

--
-- Indexes for table `statuses`
--
ALTER TABLE `statuses`
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
-- AUTO_INCREMENT for table `aim_objective_table`
--
ALTER TABLE `aim_objective_table`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `application_timelines`
--
ALTER TABLE `application_timelines`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `application_workflows`
--
ALTER TABLE `application_workflows`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `area_of_operations`
--
ALTER TABLE `area_of_operations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `banks`
--
ALTER TABLE `banks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `basics_aim`
--
ALTER TABLE `basics_aim`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `basic_information`
--
ALTER TABLE `basic_information`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `certificates`
--
ALTER TABLE `certificates`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `cities`
--
ALTER TABLE `cities`
  MODIFY `city_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `details`
--
ALTER TABLE `details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `districts`
--
ALTER TABLE `districts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `financials`
--
ALTER TABLE `financials`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `members`
--
ALTER TABLE `members`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `membership_types`
--
ALTER TABLE `membership_types`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `operations`
--
ALTER TABLE `operations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `proposed_finances`
--
ALTER TABLE `proposed_finances`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `statuses`
--
ALTER TABLE `statuses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `basics_aim`
--
ALTER TABLE `basics_aim`
  ADD CONSTRAINT `basics_aim_aim_obj_id_foreign` FOREIGN KEY (`aim_obj_id`) REFERENCES `aim_objective_table` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `basics_aim_basic_info_id_foreign` FOREIGN KEY (`basic_info_id`) REFERENCES `basic_information` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `details`
--
ALTER TABLE `details`
  ADD CONSTRAINT `details_city_id_foreign` FOREIGN KEY (`city_id`) REFERENCES `cities` (`city_id`) ON DELETE CASCADE;

--
-- Constraints for table `financials`
--
ALTER TABLE `financials`
  ADD CONSTRAINT `financials_bank_id_foreign` FOREIGN KEY (`bank_id`) REFERENCES `banks` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `financials_prop_finan_id_foreign` FOREIGN KEY (`prop_finan_id`) REFERENCES `proposed_finances` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `members`
--
ALTER TABLE `members`
  ADD CONSTRAINT `members_details_id_foreign` FOREIGN KEY (`details_id`) REFERENCES `details` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `members_member_type_id_foreign` FOREIGN KEY (`member_type_id`) REFERENCES `membership_types` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `operations`
--
ALTER TABLE `operations`
  ADD CONSTRAINT `operations_area_of_operation_id_foreign` FOREIGN KEY (`area_of_operation_id`) REFERENCES `area_of_operations` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
