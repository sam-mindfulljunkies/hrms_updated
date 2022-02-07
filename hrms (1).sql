-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Feb 07, 2022 at 01:34 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.0.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hrms`
--

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `leaves`
--

CREATE TABLE `leaves` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `from_date` date DEFAULT NULL,
  `type` int(11) DEFAULT NULL,
  `leave_cir_id` int(11) NOT NULL,
  `is_first_half` tinyint(4) DEFAULT NULL,
  `to_date` date DEFAULT NULL,
  `description` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `hours` int(11) NOT NULL,
  `days` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `leaves`
--

INSERT INTO `leaves` (`id`, `user_id`, `from_date`, `type`, `leave_cir_id`, `is_first_half`, `to_date`, `description`, `status`, `created_at`, `updated_at`, `hours`, `days`) VALUES
(10, 10, '2022-02-15', 1, 0, NULL, '2022-02-15', 'ds', 0, '2022-02-07 04:10:39', '2022-02-07 04:10:39', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `leave_circles`
--

CREATE TABLE `leave_circles` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `laeve_type_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `leave_circles`
--

INSERT INTO `leave_circles` (`id`, `name`, `laeve_type_id`) VALUES
(1, 'first_half', 2),
(2, 'secod_half', 2),
(3, 'morning', 3),
(4, 'evening', 3);

-- --------------------------------------------------------

--
-- Table structure for table `leave_types`
--

CREATE TABLE `leave_types` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `leave_types`
--

INSERT INTO `leave_types` (`id`, `name`) VALUES
(1, 'full_day'),
(2, 'half_day'),
(3, 'quaterly');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(7, '2014_10_12_000000_create_users_table', 1),
(8, '2014_10_12_100000_create_password_resets_table', 1),
(9, '2019_08_19_000000_create_failed_jobs_table', 1),
(10, '2021_01_02_161944_role_table_migration', 1),
(11, '2021_01_05_160532_report_table_migration', 1),
(12, '2021_01_08_155015_notification_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `new_added_leaves`
--

CREATE TABLE `new_added_leaves` (
  `id` int(11) NOT NULL,
  `leaves` varchar(255) NOT NULL,
  `hours` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `from` bigint(20) UNSIGNED NOT NULL,
  `to` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `subject` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `extra` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `hide` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`id`, `from`, `to`, `subject`, `description`, `extra`, `hide`, `created_at`, `updated_at`) VALUES
(1, 1, '2', 'asd', 'sd', NULL, 0, '2021-01-09 12:17:37', '2021-01-09 12:17:37'),
(2, 1, '2', 'asd', 'sd', NULL, 0, '2021-01-09 12:18:03', '2021-01-09 12:18:03'),
(3, 1, '10', 'zd', 'sd', NULL, 1, '2021-01-09 12:19:05', '2021-02-13 22:14:41'),
(4, 1, '2,7', 'Finals TEST', 'cvjhkl', NULL, 0, '2021-01-28 13:04:25', '2021-01-28 13:04:25'),
(5, 1, '2,10', 'Leave on 13th', 'Leave for sunday', NULL, 0, '2021-02-11 10:47:28', '2021-02-11 10:47:28'),
(6, 1, '8', 'Approve Leave Request', 'dZFfqWMNAFApproved on Date : ', NULL, 0, '2022-02-04 08:12:07', '2022-02-04 08:12:07'),
(7, 10, '1', 'Applied leaved', 'samAdded Leave on Date : 2022-02-10', NULL, 0, '2022-02-04 08:13:17', '2022-02-04 08:13:17'),
(8, 1, '9', 'Approve Leave Request', 'dZFfqWMNAFApproved on Date : ', NULL, 0, '2022-02-06 23:58:33', '2022-02-06 23:58:33'),
(9, 10, '1', 'Applied leaved', 'samAdded Leave on Date : 2022-02-15', NULL, 0, '2022-02-07 04:10:39', '2022-02-07 04:10:39'),
(10, 10, '1', 'Applied leaved', 'samAdded Leave on Date : 2022-02-07', NULL, 0, '2022-02-07 04:11:02', '2022-02-07 04:11:02'),
(11, 10, '1', 'Applied leaved', 'samAdded Leave on Date : 2022-02-08', NULL, 0, '2022-02-07 04:13:37', '2022-02-07 04:13:37'),
(12, 10, '1', 'Applied leaved', 'samAdded Leave on Date : 2022-02-15', NULL, 0, '2022-02-07 04:14:15', '2022-02-07 04:14:15');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `reports`
--

CREATE TABLE `reports` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` date DEFAULT NULL,
  `time` time DEFAULT NULL,
  `start_time` time DEFAULT NULL,
  `end_time` time DEFAULT NULL,
  `hours` int(11) DEFAULT NULL,
  `project` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `reports`
--

INSERT INTO `reports` (`id`, `user_id`, `description`, `date`, `time`, `start_time`, `end_time`, `hours`, `project`, `image`, `created_at`, `updated_at`) VALUES
(1, 2, 'fbgjdgd', '2021-01-28', '18:32:45', '01:03:00', '02:09:00', 1, 'test', '8aca45271c6573a58821fd30558f444a.jpg', '2021-01-28 13:02:45', '2021-01-28 13:02:45'),
(2, 2, 'TEST', '2021-02-10', '07:38:08', '13:07:00', '13:08:00', 1, 'TEST', 'download.png', '2021-02-10 13:38:08', '2021-02-10 13:38:08'),
(3, 2, 'This is the', '2021-02-11', '04:44:41', '00:43:00', '23:43:00', 12, 'HRMS', '1.jpg', '2021-02-11 10:44:41', '2021-02-11 10:44:41'),
(4, 12, 'Order processing, and customer support', '2022-01-14', '17:39:56', '22:00:00', '07:00:00', 9, 'Dentira', NULL, '2022-01-15 00:39:56', '2022-01-15 00:39:56');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `role_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `role_name`, `created_at`, `updated_at`) VALUES
(1, 'ADMIN', NULL, NULL),
(2, 'EMPLOYEE', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `fname` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lname` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `username` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `gender` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pincode` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contact` bigint(20) DEFAULT NULL,
  `bank_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `account_no` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ifsc` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `salary` int(11) DEFAULT NULL,
  `role_id` int(11) NOT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `api_token` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `aadhar_verify` tinyint(4) NOT NULL DEFAULT 0,
  `aadhar` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pancard_verify` tinyint(4) NOT NULL DEFAULT 0,
  `pancard` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `election_verify` tinyint(4) NOT NULL DEFAULT 0,
  `election_card` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `passport_verify` tinyint(4) NOT NULL DEFAULT 0,
  `passport` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `driving_licence` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `licence_verify` int(11) NOT NULL DEFAULT 0,
  `certificate` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `certificate_verify` tinyint(4) NOT NULL DEFAULT 0,
  `is_deleted` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `fname`, `lname`, `username`, `email`, `password`, `gender`, `address`, `pincode`, `contact`, `bank_name`, `account_no`, `ifsc`, `salary`, `role_id`, `remember_token`, `api_token`, `aadhar_verify`, `aadhar`, `pancard_verify`, `pancard`, `election_verify`, `election_card`, `passport_verify`, `passport`, `driving_licence`, `licence_verify`, `certificate`, `certificate_verify`, `is_deleted`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin', 'dZFfqWMNAF', 'admin@gmail.com', '$2y$10$Gl/y8eeaMtCF4LDWWKJ5ae1IPWKDAyihlI0PmhXjlxywQthrkuJpe', 'male', 'Q6JOoMNjkm GEJn6', '798947', 9142282977, 'TEST ADMIN', 'Gvlxqf244Y35Pz', 'Dea6sBRzKZ', 22660, 1, NULL, '7MdaYn8Aosn0te9RnvhGE5JEhG4c5h2GaZYBronp', 0, NULL, 0, NULL, 0, NULL, 0, NULL, NULL, 0, NULL, 0, 0, NULL, '2021-02-13 21:39:21'),
(10, 'sameer', 'bhatt', 'sam', 'sameer@gmail.com', '$2y$10$Gl/y8eeaMtCF4LDWWKJ5ae1IPWKDAyihlI0PmhXjlxywQthrkuJpe', 'male', 'maninagar', '38008', 7874360046, 'DENA', '7845632156336989788553', 'BKDNO', NULL, 2, NULL, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, NULL, 0, NULL, 0, 0, '2021-02-13 21:40:24', '2021-02-13 21:40:24'),
(11, 'Manish', 'Kumar', 'manish.kumar', 'manish.kumar@mindfulljunkies.com', '$2y$10$MiMA2uezhBqWb7zHsC0npeNFJaf0r5OqUdkQRpL4cVBJGdfteIir2', 'male', 'f', NULL, NULL, NULL, NULL, NULL, NULL, 2, NULL, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, NULL, 0, NULL, 0, 0, '2021-08-04 13:43:06', '2021-08-04 13:43:06'),
(12, 'Jaspreet', 'Kaur', 'jaspreet.kaur@mindfulljunkies.com', 'jaspreet.kaur@mindfulljunkies.com', '$2y$10$BaVeiV8Zcb.N1dLKs9JsV.agsvZqyoAWPh40H46FjPDyAgQFmJWYi', 'female', 'Tajowal', NULL, 7814659069, 'SBI', NULL, NULL, NULL, 2, NULL, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, NULL, 0, NULL, 0, 0, '2022-01-15 00:29:55', '2022-01-15 00:29:55'),
(13, 'Jaspreet', 'Kaur', 'jaspreet.kaur@mindfulljunkies.com', 'jaspreet.kaur@mindfulljunkies.com', '$2y$10$f4o2L3ecM7yixWDQdRfG5.ic.BS1vdqwiBTwlHsot7dw1riDwoyGi', 'female', 'Tajowal', NULL, 7814659069, 'SBI', NULL, NULL, NULL, 2, NULL, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, NULL, 0, NULL, 0, 1, '2022-01-15 00:30:02', '2022-01-15 00:34:19'),
(14, 'Jaspreet', 'Kaur', 'jaspreet.kaur@mindfulljunkies.com', 'jaspreet.kaur@mindfulljunkies.com', '$2y$10$ogDkUpwHf98m3f4C9BCQguGQWfgTc7tJNDdYOM8rRtUXKT2Dqa/CS', 'female', 'Tajowal', NULL, 7814659069, 'SBI', NULL, NULL, NULL, 2, NULL, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, NULL, 0, NULL, 0, 1, '2022-01-15 00:30:12', '2022-01-15 00:34:19'),
(15, 'Jaspreet', 'Kaur', 'jaspreet.kaur@mindfulljunkies.com', 'jaspreet.kaur@mindfulljunkies.com', '$2y$10$6elVjUKFjyHEWCC6OuX87ejNaS47OhTHS/ETjAPstFSDBEqIdiVqy', 'female', 'Tajowal', NULL, 7814659069, 'SBI', NULL, NULL, NULL, 2, NULL, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, NULL, 0, NULL, 0, 1, '2022-01-15 00:30:19', '2022-01-15 00:34:18'),
(16, 'Jaspreet', 'Kaur', 'jaspreet.kaur@mindfulljunkies.com', 'jaspreet.kaur@mindfulljunkies.com', '$2y$10$TwRjeZDYpRnI2ibMJJ1PrO5ylcZBx2uK9WDqtFQN95fJIQAa9bjSK', 'female', 'Tajowal', NULL, 7814659069, 'SBI', NULL, NULL, NULL, 2, NULL, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, NULL, 0, NULL, 0, 1, '2022-01-15 00:30:20', '2022-01-15 00:34:14'),
(17, 'Jaspreet', 'Kaur', 'jaspreet.kaur@mindfulljunkies.com', 'jaspreet.kaur@mindfulljunkies.com', '$2y$10$kDOTS6XLFn5q4aYisiBBwuDI48Cs7tuk.VcZKqyW0eWsOpU5.dgRq', 'female', 'Tajowal', NULL, 7814659069, 'SBI', '89493587589834', '783487bj', 232, 2, NULL, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, NULL, 0, NULL, 0, 1, '2022-01-15 00:32:10', '2022-01-15 00:34:12'),
(18, 'Jasleen', 'Sawhney', 'admin@gmail.com', 'jasleen@mindfulljunkies.com', '$2y$10$7RFK5mPKkqb8qL6Xtl3mKODnMbSqXz9FTiQm.GwoYG5zN/EeS2GBe', 'male', '2839 Pointe Harbour Dr', '46229', 31482787100000, 'PNC', NULL, NULL, NULL, 2, NULL, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, NULL, 0, NULL, 0, 0, '2022-01-18 08:20:51', '2022-01-18 08:20:51');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `leaves`
--
ALTER TABLE `leaves`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `leave_circles`
--
ALTER TABLE `leave_circles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `leave_types`
--
ALTER TABLE `leave_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `new_added_leaves`
--
ALTER TABLE `new_added_leaves`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reports`
--
ALTER TABLE `reports`
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
-- AUTO_INCREMENT for table `leaves`
--
ALTER TABLE `leaves`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `leave_circles`
--
ALTER TABLE `leave_circles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `leave_types`
--
ALTER TABLE `leave_types`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `new_added_leaves`
--
ALTER TABLE `new_added_leaves`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `reports`
--
ALTER TABLE `reports`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
