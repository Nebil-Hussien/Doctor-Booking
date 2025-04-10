-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 28, 2022 at 11:37 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `home`
--

-- --------------------------------------------------------

--
-- Table structure for table `activities`
--

CREATE TABLE `activities` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `subject` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `url` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `method` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ip` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` enum('WEBADMIN','ADMIN') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_by` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `activities`
--

INSERT INTO `activities` (`id`, `subject`, `url`, `method`, `ip`, `user_id`, `type`, `created_by`, `created_at`, `updated_at`) VALUES
(1, 'user login -2', 'http://localhost/asc_hotel_back/webadmin/loginSubmit', 'POST', '::1', '2', 'WEBADMIN', '2', '2021-12-14 06:27:14', '2021-12-14 06:27:14'),
(2, 'user logout -2', 'http://localhost/asc_hotel_back/webadmin/logout', 'GET', '::1', '2', 'WEBADMIN', '2', '2021-12-14 06:34:46', '2021-12-14 06:34:46'),
(3, 'user login -2', 'http://localhost/asc_hotel_back/webadmin/loginSubmit', 'POST', '::1', '2', 'WEBADMIN', '2', '2021-12-14 06:35:13', '2021-12-14 06:35:13'),
(4, 'create packages -2', 'http://localhost/asc_hotel_back/webadmin/create-new-packages', 'POST', '::1', '2', 'WEBADMIN', '2', '2021-12-14 06:52:58', '2021-12-14 06:52:58'),
(5, 'add multiple videos -2', 'http://localhost/asc_hotel_back/webadmin/add-multiple-videos', 'POST', '::1', '2', 'WEBADMIN', '2', '2021-12-14 06:58:50', '2021-12-14 06:58:50'),
(6, 'user login -2', 'http://localhost/asc_hotel_back/webadmin/loginSubmit', 'POST', '::1', '2', 'WEBADMIN', '2', '2021-12-14 07:32:28', '2021-12-14 07:32:28'),
(7, 'user logout -3', 'http://localhost/asc_hotel_back/webadmin/logout', 'GET', '::1', '3', 'WEBADMIN', '3', '2021-12-15 02:30:17', '2021-12-15 02:30:17'),
(8, 'user login -3', 'http://localhost/asc_hotel_back/webadmin/webadmin_access/Mw==', 'GET', '::1', '3', 'WEBADMIN', '3', '2021-12-15 02:30:24', '2021-12-15 02:30:24'),
(9, 'book status -3', 'http://localhost/asc_hotel_back/webadmin/book-status', 'POST', '::1', '3', 'WEBADMIN', '3', '2021-12-15 03:38:01', '2021-12-15 03:38:01'),
(10, 'book status -3', 'http://localhost/asc_hotel_back/webadmin/book-status', 'POST', '::1', '3', 'WEBADMIN', '3', '2021-12-15 03:38:07', '2021-12-15 03:38:07'),
(11, 'add room -3', 'http://localhost/asc_hotel_back/webadmin/add-room', 'POST', '::1', '3', 'WEBADMIN', '3', '2021-12-15 03:39:04', '2021-12-15 03:39:04'),
(12, 'room status -3', 'http://localhost/asc_hotel_back/webadmin/room-status', 'POST', '::1', '3', 'WEBADMIN', '3', '2021-12-15 03:39:14', '2021-12-15 03:39:14'),
(13, 'book status -3', 'http://localhost/asc_hotel_back/webadmin/book-status', 'POST', '::1', '3', 'WEBADMIN', '3', '2021-12-15 03:40:06', '2021-12-15 03:40:06'),
(14, 'book status -3', 'http://localhost/asc_hotel_back/webadmin/book-status', 'POST', '::1', '3', 'WEBADMIN', '3', '2021-12-15 03:40:10', '2021-12-15 03:40:10'),
(15, 'book status -3', 'http://localhost/asc_hotel_back/webadmin/book-status', 'POST', '::1', '3', 'WEBADMIN', '3', '2021-12-15 03:42:33', '2021-12-15 03:42:33'),
(16, 'book status -3', 'http://localhost/asc_hotel_back/webadmin/book-status', 'POST', '::1', '3', 'WEBADMIN', '3', '2021-12-15 03:43:21', '2021-12-15 03:43:21'),
(17, 'book status -3', 'http://localhost/asc_hotel_back/webadmin/book-status', 'POST', '::1', '3', 'WEBADMIN', '3', '2021-12-15 03:43:23', '2021-12-15 03:43:23'),
(18, 'book status -3', 'http://localhost/asc_hotel_back/webadmin/book-status', 'POST', '::1', '3', 'WEBADMIN', '3', '2021-12-15 03:43:24', '2021-12-15 03:43:24'),
(19, 'room status -3', 'http://localhost/asc_hotel_back/webadmin/room-status', 'POST', '::1', '3', 'WEBADMIN', '3', '2021-12-15 03:53:06', '2021-12-15 03:53:06'),
(20, 'room status -3', 'http://localhost/asc_hotel_back/webadmin/room-status', 'POST', '::1', '3', 'WEBADMIN', '3', '2021-12-15 03:53:09', '2021-12-15 03:53:09'),
(21, 'book status -3', 'http://localhost/asc_hotel_back/webadmin/book-status', 'POST', '::1', '3', 'WEBADMIN', '3', '2021-12-15 03:55:46', '2021-12-15 03:55:46'),
(22, 'book status -3', 'http://localhost/asc_hotel_back/webadmin/book-status', 'POST', '::1', '3', 'WEBADMIN', '3', '2021-12-15 03:55:47', '2021-12-15 03:55:47'),
(23, 'create packages -3', 'http://localhost/asc_hotel_back/webadmin/create-new-packages', 'POST', '::1', '3', 'WEBADMIN', '3', '2021-12-15 03:56:11', '2021-12-15 03:56:11'),
(24, 'add room -3', 'http://localhost/asc_hotel_back/webadmin/add-room', 'POST', '::1', '3', 'WEBADMIN', '3', '2021-12-15 03:56:59', '2021-12-15 03:56:59'),
(25, 'room status -3', 'http://localhost/asc_hotel_back/webadmin/room-status', 'POST', '::1', '3', 'WEBADMIN', '3', '2021-12-15 03:57:11', '2021-12-15 03:57:11'),
(26, 'book status -3', 'http://localhost/asc_hotel_back/webadmin/book-status', 'POST', '::1', '3', 'WEBADMIN', '3', '2021-12-15 03:58:34', '2021-12-15 03:58:34'),
(27, 'book status -3', 'http://localhost/asc_hotel_back/webadmin/book-status', 'POST', '::1', '3', 'WEBADMIN', '3', '2021-12-15 03:58:35', '2021-12-15 03:58:35'),
(28, 'delete booking -3', 'http://localhost/asc_hotel_back/webadmin/delete-book', 'POST', '::1', '3', 'WEBADMIN', '3', '2021-12-15 04:39:48', '2021-12-15 04:39:48'),
(29, 'user login -3', 'http://localhost/asc_hotel_back/webadmin/webadmin_access/Mw==', 'GET', '::1', '3', 'WEBADMIN', '3', '2021-12-15 05:12:35', '2021-12-15 05:12:35'),
(30, 'add multiple images -3', 'http://localhost/asc_hotel_back/webadmin/add-multiple-images', 'POST', '::1', '3', 'WEBADMIN', '3', '2021-12-15 05:13:44', '2021-12-15 05:13:44'),
(31, 'user logout -3', 'http://localhost/asc_hotel_back/webadmin/logout', 'GET', '::1', '3', 'WEBADMIN', '3', '2021-12-15 05:22:59', '2021-12-15 05:22:59'),
(32, 'user login -3', 'http://localhost/asc_hotel_back/webadmin/webadmin_access/Mw==', 'GET', '::1', '3', 'WEBADMIN', '3', '2021-12-15 06:01:15', '2021-12-15 06:01:15'),
(33, 'user login -3', 'http://localhost/asc_hotel_back/webadmin/webadmin_access/Mw==', 'GET', '::1', '3', 'WEBADMIN', '3', '2021-12-15 22:38:26', '2021-12-15 22:38:26'),
(34, 'user login -3', 'http://localhost/asc_hotel_back/webadmin/webadmin_access/Mw==', 'GET', '::1', '3', 'WEBADMIN', '3', '2021-12-16 01:40:44', '2021-12-16 01:40:44'),
(35, 'add room -2', 'http://localhost/asc_hotel_back/webadmin/add-room', 'POST', '::1', '2', 'WEBADMIN', '2', '2021-12-16 07:39:33', '2021-12-16 07:39:33'),
(36, 'create packages -2', 'http://localhost/asc_hotel_back/webadmin/create-new-packages', 'POST', '::1', '2', 'WEBADMIN', '2', '2021-12-16 07:40:57', '2021-12-16 07:40:57'),
(37, 'delete packages -2', 'http://localhost/asc_hotel_back/webadmin/remove-package', 'POST', '::1', '2', 'WEBADMIN', '2', '2021-12-16 07:41:19', '2021-12-16 07:41:19'),
(38, 'user login -2', 'http://localhost/asc_hotel_back/webadmin/loginSubmit', 'POST', '::1', '2', 'WEBADMIN', '2', '2021-12-16 22:41:32', '2021-12-16 22:41:32'),
(39, 'room status -2', 'http://localhost/asc_hotel_back/webadmin/room-status', 'POST', '::1', '2', 'WEBADMIN', '2', '2021-12-16 22:51:34', '2021-12-16 22:51:34'),
(40, 'room status -2', 'http://localhost/asc_hotel_back/webadmin/room-status', 'POST', '::1', '2', 'WEBADMIN', '2', '2021-12-16 22:51:38', '2021-12-16 22:51:38'),
(41, 'add multiple videos -2', 'http://localhost/asc_hotel_back/webadmin/add-multiple-videos', 'POST', '::1', '2', 'WEBADMIN', '2', '2021-12-16 22:54:06', '2021-12-16 22:54:06'),
(42, 'add multiple videos -2', 'http://localhost/asc_hotel_back/webadmin/add-multiple-videos', 'POST', '::1', '2', 'WEBADMIN', '2', '2021-12-16 22:54:06', '2021-12-16 22:54:06'),
(43, 'add multiple videos -2', 'http://localhost/asc_hotel_back/webadmin/add-multiple-videos', 'POST', '::1', '2', 'WEBADMIN', '2', '2021-12-16 22:54:06', '2021-12-16 22:54:06'),
(44, 'add multiple videos -2', 'http://localhost/asc_hotel_back/webadmin/add-multiple-videos', 'POST', '::1', '2', 'WEBADMIN', '2', '2021-12-16 22:54:07', '2021-12-16 22:54:07'),
(45, 'country status update -1', 'http://localhost/asc_hotel_back/admin/update_country_status', 'POST', '::1', '1', 'ADMIN', '1', '2021-12-16 23:53:50', '2021-12-16 23:53:50'),
(46, 'add room -1', 'http://localhost/asc_hotel_back/admin/add-room-category', 'POST', '::1', '1', 'ADMIN', '1', '2021-12-17 00:37:09', '2021-12-17 00:37:09'),
(47, 'status update -1', 'http://localhost/asc_hotel_back/admin/update_status', 'POST', '::1', '1', 'ADMIN', '1', '2021-12-17 00:37:18', '2021-12-17 00:37:18'),
(48, 'edit room  -1', 'http://localhost/asc_hotel_back/admin/edit-room-datageory', 'POST', '::1', '1', 'ADMIN', '1', '2021-12-17 00:37:30', '2021-12-17 00:37:30'),
(49, 'delete room -1', 'http://localhost/asc_hotel_back/admin/delete-room-datageory', 'POST', '::1', '1', 'ADMIN', '1', '2021-12-17 00:37:51', '2021-12-17 00:37:51'),
(50, 'country status update -1', 'http://localhost/asc_hotel_back/admin/update_country_status', 'POST', '::1', '1', 'ADMIN', '1', '2021-12-17 00:39:22', '2021-12-17 00:39:22'),
(51, 'hotel add -1', 'http://localhost/asc_hotel_back/admin/add_hotel_submit', 'POST', '::1', '1', 'ADMIN', '1', '2021-12-17 00:40:44', '2021-12-17 00:40:44'),
(52, 'hotel status update -1', 'http://localhost/asc_hotel_back/admin/update_status_hotel', 'POST', '::1', '1', 'ADMIN', '1', '2021-12-17 00:41:21', '2021-12-17 00:41:21'),
(53, 'hotel status update -1', 'http://localhost/asc_hotel_back/admin/update_status_hotel', 'POST', '::1', '1', 'ADMIN', '1', '2021-12-17 00:41:28', '2021-12-17 00:41:28'),
(54, 'hotel update -1', 'http://localhost/asc_hotel_back/admin/edit_hotel_submit', 'POST', '::1', '1', 'ADMIN', '1', '2021-12-17 00:42:00', '2021-12-17 00:42:00'),
(55, 'hotel delete -1', 'http://localhost/asc_hotel_back/admin/delete_hotel', 'POST', '::1', '1', 'ADMIN', '1', '2021-12-17 00:42:30', '2021-12-17 00:42:30'),
(56, 'country add -1', 'http://localhost/asc_hotel_back/admin/add_country', 'POST', '::1', '1', 'ADMIN', '1', '2021-12-17 00:52:53', '2021-12-17 00:52:53'),
(57, 'country update -1', 'http://localhost/asc_hotel_back/admin/edit_country_submit', 'POST', '::1', '1', 'ADMIN', '1', '2021-12-17 00:53:10', '2021-12-17 00:53:10'),
(58, 'country delete -1', 'http://localhost/asc_hotel_back/admin/delete_country_submit', 'POST', '::1', '1', 'ADMIN', '1', '2021-12-17 00:53:37', '2021-12-17 00:53:37'),
(59, 'room status -2', 'http://localhost/asc_hotel_back/webadmin/room-status', 'POST', '::1', '2', 'WEBADMIN', '2', '2021-12-17 01:43:13', '2021-12-17 01:43:13'),
(60, 'delete video -2', 'http://localhost/asc_hotel_back/webadmin/removeVideos', 'POST', '::1', '2', 'WEBADMIN', '2', '2021-12-17 01:45:22', '2021-12-17 01:45:22'),
(61, 'delete video -2', 'http://localhost/asc_hotel_back/webadmin/removeVideos', 'POST', '::1', '2', 'WEBADMIN', '2', '2021-12-17 01:45:42', '2021-12-17 01:45:42'),
(62, 'room status -2', 'http://localhost/asc_hotel_back/webadmin/room-status', 'POST', '::1', '2', 'WEBADMIN', '2', '2021-12-17 01:47:11', '2021-12-17 01:47:11'),
(63, 'create packages -2', 'http://localhost/asc_hotel_back/webadmin/create-new-packages', 'POST', '::1', '2', 'WEBADMIN', '2', '2021-12-17 01:49:27', '2021-12-17 01:49:27'),
(64, 'edit packages -2', 'http://localhost/asc_hotel_back/webadmin/edit-save', 'POST', '::1', '2', 'WEBADMIN', '2', '2021-12-17 01:55:18', '2021-12-17 01:55:18'),
(65, 'delete packages -2', 'http://localhost/asc_hotel_back/webadmin/remove-package', 'POST', '::1', '2', 'WEBADMIN', '2', '2021-12-17 01:55:47', '2021-12-17 01:55:47'),
(66, 'delete video -2', 'http://localhost/asc_hotel_back/webadmin/delete-video', 'POST', '::1', '2', 'WEBADMIN', '2', '2021-12-17 04:28:13', '2021-12-17 04:28:13'),
(67, 'delete video -2', 'http://localhost/asc_hotel_back/webadmin/delete-video', 'POST', '::1', '2', 'WEBADMIN', '2', '2021-12-17 04:33:14', '2021-12-17 04:33:14'),
(68, 'video status -2', 'http://localhost/asc_hotel_back/webadmin/video-status', 'POST', '::1', '2', 'WEBADMIN', '2', '2021-12-17 04:34:26', '2021-12-17 04:34:26'),
(69, 'video status -2', 'http://localhost/asc_hotel_back/webadmin/video-status', 'POST', '::1', '2', 'WEBADMIN', '2', '2021-12-17 04:34:35', '2021-12-17 04:34:35'),
(70, 'video status -2', 'http://localhost/asc_hotel_back/webadmin/video-status', 'POST', '::1', '2', 'WEBADMIN', '2', '2021-12-17 04:34:39', '2021-12-17 04:34:39'),
(71, 'video status -2', 'http://localhost/asc_hotel_back/webadmin/video-status', 'POST', '::1', '2', 'WEBADMIN', '2', '2021-12-17 04:35:22', '2021-12-17 04:35:22'),
(72, 'video status -2', 'http://localhost/asc_hotel_back/webadmin/video-status', 'POST', '::1', '2', 'WEBADMIN', '2', '2021-12-17 04:35:32', '2021-12-17 04:35:32'),
(73, 'video status -2', 'http://localhost/asc_hotel_back/webadmin/video-status', 'POST', '::1', '2', 'WEBADMIN', '2', '2021-12-17 04:39:33', '2021-12-17 04:39:33'),
(74, 'video status -2', 'http://localhost/asc_hotel_back/webadmin/video-status', 'POST', '::1', '2', 'WEBADMIN', '2', '2021-12-17 04:39:41', '2021-12-17 04:39:41'),
(75, 'user login -2', 'http://localhost/asc_hotel_back/webadmin/loginSubmit', 'POST', '::1', '2', 'WEBADMIN', '2', '2021-12-19 23:08:21', '2021-12-19 23:08:21'),
(76, 'delete video -2', 'http://localhost/asc_hotel_back/webadmin/delete-video', 'POST', '::1', '2', 'WEBADMIN', '2', '2021-12-19 23:09:42', '2021-12-19 23:09:42'),
(77, 'delete video -2', 'http://localhost/asc_hotel_back/webadmin/delete-video', 'POST', '::1', '2', 'WEBADMIN', '2', '2021-12-19 23:20:16', '2021-12-19 23:20:16'),
(78, 'video status -2', 'http://localhost/asc_hotel_back/webadmin/video-status', 'POST', '::1', '2', 'WEBADMIN', '2', '2021-12-19 23:44:33', '2021-12-19 23:44:33'),
(79, 'video status -2', 'http://localhost/asc_hotel_back/webadmin/video-status', 'POST', '::1', '2', 'WEBADMIN', '2', '2021-12-19 23:44:41', '2021-12-19 23:44:41'),
(80, 'video status -2', 'http://localhost/asc_hotel_back/webadmin/video-status', 'POST', '::1', '2', 'WEBADMIN', '2', '2021-12-19 23:44:49', '2021-12-19 23:44:49'),
(81, 'delete video -2', 'http://localhost/asc_hotel_back/webadmin/delete-video', 'POST', '::1', '2', 'WEBADMIN', '2', '2021-12-19 23:45:12', '2021-12-19 23:45:12'),
(82, 'delete video -2', 'http://localhost/asc_hotel_back/webadmin/delete-video', 'POST', '::1', '2', 'WEBADMIN', '2', '2021-12-20 00:24:46', '2021-12-20 00:24:46'),
(83, 'delete video -2', 'http://localhost/asc_hotel_back/webadmin/delete-video', 'POST', '::1', '2', 'WEBADMIN', '2', '2021-12-20 00:25:04', '2021-12-20 00:25:04'),
(84, 'delete video -2', 'http://localhost/asc_hotel_back/webadmin/removeVideos', 'POST', '::1', '2', 'WEBADMIN', '2', '2021-12-20 00:35:19', '2021-12-20 00:35:19'),
(85, 'delete video -2', 'http://localhost/asc_hotel_back/webadmin/removeVideos', 'POST', '::1', '2', 'WEBADMIN', '2', '2021-12-20 00:37:38', '2021-12-20 00:37:38'),
(86, 'room status -2', 'http://localhost/asc_hotel_back/webadmin/room-status', 'POST', '::1', '2', 'WEBADMIN', '2', '2021-12-20 00:41:22', '2021-12-20 00:41:22'),
(87, 'room status -2', 'http://localhost/asc_hotel_back/webadmin/room-status', 'POST', '::1', '2', 'WEBADMIN', '2', '2021-12-20 00:41:55', '2021-12-20 00:41:55'),
(88, 'video status -2', 'http://localhost/asc_hotel_back/webadmin/video-status', 'POST', '::1', '2', 'WEBADMIN', '2', '2021-12-20 01:17:28', '2021-12-20 01:17:28'),
(89, 'video status -2', 'http://localhost/asc_hotel_back/webadmin/video-status', 'POST', '::1', '2', 'WEBADMIN', '2', '2021-12-20 02:05:51', '2021-12-20 02:05:51'),
(90, 'video status -2', 'http://localhost/asc_hotel_back/webadmin/video-status', 'POST', '::1', '2', 'WEBADMIN', '2', '2021-12-20 02:06:04', '2021-12-20 02:06:04'),
(91, 'login -1', 'http://localhost/asc_hotel_back/admin/loginSubmit', 'POST', '::1', '1', 'ADMIN', '1', '2021-12-20 02:31:26', '2021-12-20 02:31:26'),
(92, 'status update -1', 'http://localhost/asc_hotel_back/admin/update_status', 'POST', '::1', '1', 'ADMIN', '1', '2021-12-20 02:32:06', '2021-12-20 02:32:06'),
(93, 'status update -1', 'http://localhost/asc_hotel_back/admin/update_status', 'POST', '::1', '1', 'ADMIN', '1', '2021-12-20 02:32:15', '2021-12-20 02:32:15'),
(94, 'status update -1', 'http://localhost/asc_hotel_back/admin/update_status', 'POST', '::1', '1', 'ADMIN', '1', '2021-12-20 02:32:23', '2021-12-20 02:32:23'),
(95, 'status update -1', 'http://localhost/asc_hotel_back/admin/update_status', 'POST', '::1', '1', 'ADMIN', '1', '2021-12-20 02:32:29', '2021-12-20 02:32:29'),
(96, 'room status -2', 'http://localhost/asc_hotel_back/webadmin/room-status', 'POST', '::1', '2', 'WEBADMIN', '2', '2021-12-20 04:34:46', '2021-12-20 04:34:46'),
(97, 'add room -2', 'http://localhost/asc_hotel_back/webadmin/add-room', 'POST', '::1', '2', 'WEBADMIN', '2', '2021-12-20 04:42:42', '2021-12-20 04:42:42'),
(98, 'room status -2', 'http://localhost/asc_hotel_back/webadmin/room-status', 'POST', '::1', '2', 'WEBADMIN', '2', '2021-12-20 04:43:10', '2021-12-20 04:43:10'),
(99, 'room status -2', 'http://localhost/asc_hotel_back/webadmin/room-status', 'POST', '::1', '2', 'WEBADMIN', '2', '2021-12-20 04:43:15', '2021-12-20 04:43:15'),
(100, 'video status -2', 'http://localhost/asc_hotel_back/webadmin/video-status', 'POST', '::1', '2', 'WEBADMIN', '2', '2021-12-20 05:39:28', '2021-12-20 05:39:28'),
(101, 'video status -2', 'http://localhost/asc_hotel_back/webadmin/video-status', 'POST', '::1', '2', 'WEBADMIN', '2', '2021-12-20 05:39:36', '2021-12-20 05:39:36'),
(102, 'city status -1', 'http://localhost/asc_hotel_back/admin/cities-status-update', 'POST', '::1', '1', 'ADMIN', '1', '2021-12-20 06:04:54', '2021-12-20 06:04:54'),
(103, 'city status -1', 'http://localhost/asc_hotel_back/admin/cities-status-update', 'POST', '::1', '1', 'ADMIN', '1', '2021-12-20 06:05:01', '2021-12-20 06:05:01'),
(104, 'country add -1', 'http://localhost/asc_hotel_back/admin/add_country', 'POST', '::1', '1', 'ADMIN', '1', '2021-12-20 06:05:57', '2021-12-20 06:05:57'),
(105, 'country add -1', 'http://localhost/asc_hotel_back/admin/add_country', 'POST', '::1', '1', 'ADMIN', '1', '2021-12-20 06:06:13', '2021-12-20 06:06:13'),
(106, 'video status -2', 'http://localhost/asc_hotel_back/webadmin/video-status', 'POST', '::1', '2', 'WEBADMIN', '2', '2021-12-20 06:14:13', '2021-12-20 06:14:13'),
(107, 'video status -2', 'http://localhost/asc_hotel_back/webadmin/video-status', 'POST', '::1', '2', 'WEBADMIN', '2', '2021-12-20 06:14:20', '2021-12-20 06:14:20'),
(108, 'video status -2', 'http://localhost/asc_hotel_back/webadmin/video-status', 'POST', '::1', '2', 'WEBADMIN', '2', '2021-12-20 06:14:22', '2021-12-20 06:14:22'),
(109, 'video status -2', 'http://localhost/asc_hotel_back/webadmin/video-status', 'POST', '::1', '2', 'WEBADMIN', '2', '2021-12-20 06:14:23', '2021-12-20 06:14:23'),
(110, 'video status -2', 'http://localhost/asc_hotel_back/webadmin/video-status', 'POST', '::1', '2', 'WEBADMIN', '2', '2021-12-20 06:22:35', '2021-12-20 06:22:35'),
(111, 'video status -2', 'http://localhost/asc_hotel_back/webadmin/video-status', 'POST', '::1', '2', 'WEBADMIN', '2', '2021-12-20 06:22:37', '2021-12-20 06:22:37'),
(112, 'delete video -2', 'http://localhost/asc_hotel_back/webadmin/delete-video', 'POST', '::1', '2', 'WEBADMIN', '2', '2021-12-20 06:22:43', '2021-12-20 06:22:43'),
(113, 'delete video -2', 'http://localhost/asc_hotel_back/webadmin/delete-video', 'POST', '::1', '2', 'WEBADMIN', '2', '2021-12-20 06:22:58', '2021-12-20 06:22:58'),
(114, 'video status -2', 'http://localhost/asc_hotel_back/webadmin/video-status', 'POST', '::1', '2', 'WEBADMIN', '2', '2021-12-20 06:26:33', '2021-12-20 06:26:33'),
(115, 'video status -2', 'http://localhost/asc_hotel_back/webadmin/video-status', 'POST', '::1', '2', 'WEBADMIN', '2', '2021-12-20 06:44:17', '2021-12-20 06:44:17'),
(116, 'video status -2', 'http://localhost/asc_hotel_back/webadmin/video-status', 'POST', '::1', '2', 'WEBADMIN', '2', '2021-12-20 06:44:36', '2021-12-20 06:44:36'),
(117, 'video status -2', 'http://localhost/asc_hotel_back/webadmin/video-status', 'POST', '::1', '2', 'WEBADMIN', '2', '2021-12-20 06:44:44', '2021-12-20 06:44:44'),
(118, 'video status -2', 'http://localhost/asc_hotel_back/webadmin/video-status', 'POST', '::1', '2', 'WEBADMIN', '2', '2021-12-20 06:45:13', '2021-12-20 06:45:13'),
(119, 'video status -2', 'http://localhost/asc_hotel_back/webadmin/video-status', 'POST', '::1', '2', 'WEBADMIN', '2', '2021-12-20 06:45:33', '2021-12-20 06:45:33'),
(120, 'video status -2', 'http://localhost/asc_hotel_back/webadmin/video-status', 'POST', '::1', '2', 'WEBADMIN', '2', '2021-12-20 06:46:02', '2021-12-20 06:46:02'),
(121, 'video status -2', 'http://localhost/asc_hotel_back/webadmin/video-status', 'POST', '::1', '2', 'WEBADMIN', '2', '2021-12-20 06:46:11', '2021-12-20 06:46:11'),
(122, 'video status -2', 'http://localhost/asc_hotel_back/webadmin/video-status', 'POST', '::1', '2', 'WEBADMIN', '2', '2021-12-20 06:46:51', '2021-12-20 06:46:51'),
(123, 'video status -2', 'http://localhost/asc_hotel_back/webadmin/video-status', 'POST', '::1', '2', 'WEBADMIN', '2', '2021-12-20 06:46:58', '2021-12-20 06:46:58'),
(124, 'video status -2', 'http://localhost/asc_hotel_back/webadmin/video-status', 'POST', '::1', '2', 'WEBADMIN', '2', '2021-12-20 06:48:06', '2021-12-20 06:48:06'),
(125, 'video status -2', 'http://localhost/asc_hotel_back/webadmin/video-status', 'POST', '::1', '2', 'WEBADMIN', '2', '2021-12-20 06:48:14', '2021-12-20 06:48:14'),
(126, 'user login -2', 'http://localhost/asc_hotel_back/webadmin/loginSubmit', 'POST', '::1', '2', 'WEBADMIN', '2', '2021-12-20 22:50:13', '2021-12-20 22:50:13'),
(127, 'user logout -2', 'http://localhost/asc_hotel_back/webadmin/logout', 'GET', '::1', '2', 'WEBADMIN', '2', '2021-12-20 23:23:21', '2021-12-20 23:23:21'),
(128, 'user login -3', 'http://localhost/asc_hotel_back/webadmin/loginSubmit', 'POST', '::1', '3', 'WEBADMIN', '3', '2021-12-20 23:23:39', '2021-12-20 23:23:39'),
(129, 'user logout -3', 'http://localhost/asc_hotel_back/webadmin/logout', 'GET', '::1', '3', 'WEBADMIN', '3', '2021-12-20 23:24:14', '2021-12-20 23:24:14'),
(130, 'user login -2', 'http://localhost/asc_hotel_back/webadmin/loginSubmit', 'POST', '::1', '2', 'WEBADMIN', '2', '2021-12-20 23:24:27', '2021-12-20 23:24:27'),
(131, 'login -1', 'http://localhost/asc_hotel_back/admin/loginSubmit', 'POST', '::1', '1', 'ADMIN', '1', '2021-12-20 23:26:20', '2021-12-20 23:26:20'),
(132, 'status update -1', 'http://localhost/asc_hotel_back/admin/update_status', 'POST', '::1', '1', 'ADMIN', '1', '2021-12-20 23:27:03', '2021-12-20 23:27:03'),
(133, 'status update -1', 'http://localhost/asc_hotel_back/admin/update_status', 'POST', '::1', '1', 'ADMIN', '1', '2021-12-20 23:27:09', '2021-12-20 23:27:09'),
(134, 'user login -2', 'http://localhost/asc_hotel_back/webadmin/loginSubmit', 'POST', '::1', '2', 'WEBADMIN', '2', '2022-01-04 03:45:01', '2022-01-04 03:45:01'),
(135, 'user logout -2', 'http://localhost/asc_hotel_back/webadmin/logout', 'GET', '::1', '2', 'WEBADMIN', '2', '2022-01-04 03:45:55', '2022-01-04 03:45:55'),
(136, 'user login -2', 'http://localhost/asc_hotel_back/webadmin/loginSubmit', 'POST', '::1', '2', 'WEBADMIN', '2', '2022-01-04 03:57:55', '2022-01-04 03:57:55'),
(137, 'add room -2', 'http://localhost/asc_hotel_back/webadmin/add-room', 'POST', '::1', '2', 'WEBADMIN', '2', '2022-01-04 04:00:25', '2022-01-04 04:00:25'),
(138, 'room status -2', 'http://localhost/asc_hotel_back/webadmin/room-status', 'POST', '::1', '2', 'WEBADMIN', '2', '2022-01-04 04:01:02', '2022-01-04 04:01:02'),
(139, 'user login -6', 'http://localhost/asc_hotel_back/webadmin/loginSubmit', 'POST', '::1', '6', 'WEBADMIN', '6', '2022-01-04 04:26:13', '2022-01-04 04:26:13'),
(140, 'add room -6', 'http://localhost/asc_hotel_back/webadmin/add-room', 'POST', '::1', '6', 'WEBADMIN', '6', '2022-01-04 04:29:22', '2022-01-04 04:29:22'),
(141, 'add multiple images -6', 'http://localhost/asc_hotel_back/webadmin/add-multiple-images', 'POST', '::1', '6', 'WEBADMIN', '6', '2022-01-04 04:31:01', '2022-01-04 04:31:01'),
(142, 'add multiple images -6', 'http://localhost/asc_hotel_back/webadmin/add-multiple-images', 'POST', '::1', '6', 'WEBADMIN', '6', '2022-01-04 04:32:34', '2022-01-04 04:32:34'),
(143, 'create packages -6', 'http://localhost/asc_hotel_back/webadmin/create-new-packages', 'POST', '::1', '6', 'WEBADMIN', '6', '2022-01-04 04:34:31', '2022-01-04 04:34:31'),
(144, 'user logout -6', 'http://localhost/asc_hotel_back/webadmin/logout', 'GET', '::1', '6', 'WEBADMIN', '6', '2022-01-04 04:59:21', '2022-01-04 04:59:21'),
(145, 'login -1', 'http://localhost/asc_hotel_back/admin/loginSubmit', 'POST', '::1', '1', 'ADMIN', '1', '2022-01-04 05:00:32', '2022-01-04 05:00:32'),
(146, 'login -1', 'http://localhost/asc_hotel_back/admin/loginSubmit', 'POST', '::1', '1', 'ADMIN', '1', '2022-01-04 05:13:30', '2022-01-04 05:13:30'),
(147, 'user login -6', 'http://localhost/asc_hotel_back/webadmin/loginSubmit', 'POST', '::1', '6', 'WEBADMIN', '6', '2022-01-04 05:14:47', '2022-01-04 05:14:47'),
(148, 'add room -1', 'http://localhost/asc_hotel_back/admin/hotel-store', 'POST', '::1', '1', 'ADMIN', '1', '2022-01-04 06:03:46', '2022-01-04 06:03:46'),
(149, 'edit room  -1', 'http://localhost/asc_hotel_back/admin/edit-hotel-datageory', 'POST', '::1', '1', 'ADMIN', '1', '2022-01-04 06:08:07', '2022-01-04 06:08:07'),
(150, 'edit room  -1', 'http://localhost/asc_hotel_back/admin/edit-hotel-datageory', 'POST', '::1', '1', 'ADMIN', '1', '2022-01-04 06:08:22', '2022-01-04 06:08:22'),
(151, 'status update -1', 'http://localhost/asc_hotel_back/admin/update_status', 'POST', '::1', '1', 'ADMIN', '1', '2022-01-04 06:10:33', '2022-01-04 06:10:33'),
(152, 'status update -1', 'http://localhost/asc_hotel_back/admin/update_status', 'POST', '::1', '1', 'ADMIN', '1', '2022-01-04 06:10:35', '2022-01-04 06:10:35'),
(153, 'delete room -1', 'http://localhost/asc_hotel_back/admin/delete-hotel-datageory', 'POST', '::1', '1', 'ADMIN', '1', '2022-01-04 06:19:37', '2022-01-04 06:19:37'),
(154, 'delete room -1', 'http://localhost/asc_hotel_back/admin/delete-hotel-datageory', 'POST', '::1', '1', 'ADMIN', '1', '2022-01-04 06:25:11', '2022-01-04 06:25:11'),
(155, 'status update -1', 'http://localhost/asc_hotel_back/admin/update_status', 'POST', '::1', '1', 'ADMIN', '1', '2022-01-04 06:25:25', '2022-01-04 06:25:25'),
(156, 'status update -1', 'http://localhost/asc_hotel_back/admin/update_status', 'POST', '::1', '1', 'ADMIN', '1', '2022-01-04 06:25:26', '2022-01-04 06:25:26'),
(157, 'delete room -1', 'http://localhost/asc_hotel_back/admin/delete-hotel-datageory', 'POST', '::1', '1', 'ADMIN', '1', '2022-01-04 06:41:09', '2022-01-04 06:41:09'),
(158, 'status update -1', 'http://localhost/asc_hotel_back/admin/update_status', 'POST', '::1', '1', 'ADMIN', '1', '2022-01-04 06:42:34', '2022-01-04 06:42:34'),
(159, 'status update -1', 'http://localhost/asc_hotel_back/admin/update_status', 'POST', '::1', '1', 'ADMIN', '1', '2022-01-04 06:42:36', '2022-01-04 06:42:36'),
(160, 'status update -1', 'http://localhost/asc_hotel_back/admin/update_status', 'POST', '::1', '1', 'ADMIN', '1', '2022-01-04 06:42:40', '2022-01-04 06:42:40'),
(161, 'status update -1', 'http://localhost/asc_hotel_back/admin/update_status', 'POST', '::1', '1', 'ADMIN', '1', '2022-01-04 06:42:42', '2022-01-04 06:42:42'),
(162, 'status update -1', 'http://localhost/asc_hotel_back/admin/update_status_hotels', 'POST', '::1', '1', 'ADMIN', '1', '2022-01-04 06:43:36', '2022-01-04 06:43:36'),
(163, 'status update -1', 'http://localhost/asc_hotel_back/admin/update_status', 'POST', '::1', '1', 'ADMIN', '1', '2022-01-04 06:43:41', '2022-01-04 06:43:41'),
(164, 'status update -1', 'http://localhost/asc_hotel_back/admin/update_status', 'POST', '::1', '1', 'ADMIN', '1', '2022-01-04 06:43:42', '2022-01-04 06:43:42'),
(165, 'add room -6', 'http://localhost/asc_hotel_back/webadmin/add-room', 'POST', '::1', '6', 'WEBADMIN', '6', '2022-01-04 07:40:43', '2022-01-04 07:40:43'),
(166, 'add room -6', 'http://localhost/asc_hotel_back/webadmin/add-room', 'POST', '::1', '6', 'WEBADMIN', '6', '2022-01-04 07:45:06', '2022-01-04 07:45:06'),
(167, 'edit room -6', 'http://localhost/asc_hotel_back/webadmin/edit-room', 'POST', '::1', '6', 'WEBADMIN', '6', '2022-01-04 07:53:38', '2022-01-04 07:53:38'),
(168, 'login -1', 'http://localhost/asc_hotel_back/admin/loginSubmit', 'POST', '127.0.0.1', '1', 'ADMIN', '1', '2022-01-04 22:41:51', '2022-01-04 22:41:51'),
(169, 'user login -6', 'http://localhost/asc_hotel_back/webadmin/loginSubmit', 'POST', '127.0.0.1', '6', 'WEBADMIN', '6', '2022-01-04 22:44:34', '2022-01-04 22:44:34'),
(170, 'user login -6', 'http://localhost/asc_hotel_back/webadmin/loginSubmit', 'POST', '127.0.0.1', '6', 'WEBADMIN', '6', '2022-01-04 23:18:28', '2022-01-04 23:18:28'),
(171, 'login -1', 'http://localhost/asc_hotel_back/admin/loginSubmit', 'POST', '127.0.0.1', '1', 'ADMIN', '1', '2022-01-04 23:55:13', '2022-01-04 23:55:13'),
(172, 'add room -1', 'http://localhost/asc_hotel_back/admin/hotel-store', 'POST', '127.0.0.1', '1', 'ADMIN', '1', '2022-01-04 23:55:42', '2022-01-04 23:55:42'),
(173, 'user login -6', 'http://localhost/asc_hotel_back/webadmin/loginSubmit', 'POST', '127.0.0.1', '6', 'WEBADMIN', '6', '2022-01-05 05:08:37', '2022-01-05 05:08:37'),
(174, 'user login -6', 'http://localhost/asc_hotel_back/webadmin/loginSubmit', 'POST', '::1', '6', 'WEBADMIN', '6', '2022-01-05 05:55:03', '2022-01-05 05:55:03'),
(175, 'user login -6', 'http://localhost/asc_hotel_back/webadmin/loginSubmit', 'POST', '127.0.0.1', '6', 'WEBADMIN', '6', '2022-01-05 22:27:36', '2022-01-05 22:27:36'),
(176, 'user login -6', 'http://localhost/asc_hotel_back/webadmin/loginSubmit', 'POST', '::1', '6', 'WEBADMIN', '6', '2022-01-06 00:27:14', '2022-01-06 00:27:14'),
(177, 'user logout -6', 'http://localhost/asc_hotel_back/webadmin/logout', 'GET', '::1', '6', 'WEBADMIN', '6', '2022-01-06 00:41:19', '2022-01-06 00:41:19'),
(178, 'user login -7', 'http://localhost/asc_hotel_back/webadmin/loginSubmit', 'POST', '::1', '7', 'WEBADMIN', '7', '2022-01-06 00:42:34', '2022-01-06 00:42:34'),
(179, 'user logout -7', 'http://localhost/asc_hotel_back/webadmin/logout', 'GET', '::1', '7', 'WEBADMIN', '7', '2022-01-06 01:01:38', '2022-01-06 01:01:38'),
(180, 'user login -7', 'http://localhost/asc_hotel_back/webadmin/loginSubmit', 'POST', '::1', '7', 'WEBADMIN', '7', '2022-01-06 03:39:58', '2022-01-06 03:39:58'),
(181, 'user logout -7', 'http://localhost/asc_hotel_back/webadmin/logout', 'GET', '::1', '7', 'WEBADMIN', '7', '2022-01-06 03:43:46', '2022-01-06 03:43:46'),
(182, 'user login -8', 'http://localhost/asc_hotel_back/webadmin/loginSubmit', 'POST', '::1', '8', 'WEBADMIN', '8', '2022-01-06 03:44:03', '2022-01-06 03:44:03'),
(183, 'user login -6', 'http://localhost/asc_hotel_back/webadmin/loginSubmit', 'POST', '127.0.0.1', '6', 'WEBADMIN', '6', '2022-01-06 23:36:08', '2022-01-06 23:36:08'),
(184, 'user login -6', 'http://localhost/asc_hotel_back/webadmin/loginSubmit', 'POST', '::1', '6', 'WEBADMIN', '6', '2022-01-06 23:48:56', '2022-01-06 23:48:56'),
(185, 'user login -6', 'http://localhost/asc_hotel_back/webadmin/loginSubmit', 'POST', '127.0.0.1', '6', 'WEBADMIN', '6', '2022-01-07 03:53:16', '2022-01-07 03:53:16'),
(186, 'user logout -6', 'http://localhost/asc_hotel_back/webadmin/logout', 'GET', '127.0.0.1', '6', 'WEBADMIN', '6', '2022-01-07 04:12:17', '2022-01-07 04:12:17'),
(187, 'login -1', 'http://localhost/asc_hotel_back/admin/loginSubmit', 'POST', '127.0.0.1', '1', 'ADMIN', '1', '2022-01-07 04:12:42', '2022-01-07 04:12:42'),
(188, 'login -1', 'http://localhost/asc_hotel_back/admin/loginSubmit', 'POST', '::1', '1', 'ADMIN', '1', '2022-01-07 04:19:07', '2022-01-07 04:19:07'),
(189, 'user login -6', 'http://localhost/asc_hotel_back/webadmin/loginSubmit', 'POST', '::1', '6', 'WEBADMIN', '6', '2022-01-07 04:41:49', '2022-01-07 04:41:49'),
(190, 'user login -9', 'http://localhost/asc_hotel_back/webadmin/loginSubmit', 'POST', '::1', '9', 'WEBADMIN', '9', '2022-01-07 06:29:44', '2022-01-07 06:29:44'),
(191, 'login -1', 'http://localhost/asc_hotel_back/admin/loginSubmit', 'POST', '127.0.0.1', '1', 'ADMIN', '1', '2022-01-07 07:17:34', '2022-01-07 07:17:34'),
(192, 'add Offer -1', 'http://localhost/asc_hotel_back/admin/offer_submit', 'POST', '127.0.0.1', '1', 'ADMIN', '1', '2022-01-07 07:19:08', '2022-01-07 07:19:08'),
(193, 'Booking Status Change -9', 'http://localhost/asc_hotel_back/webadmin/booking-status', 'POST', '::1', '9', 'WEBADMIN', '9', '2022-01-07 07:20:36', '2022-01-07 07:20:36'),
(194, 'Booking Status Change -9', 'http://localhost/asc_hotel_back/webadmin/booking-status', 'POST', '::1', '9', 'WEBADMIN', '9', '2022-01-07 07:23:38', '2022-01-07 07:23:38'),
(195, 'Booking Status Change -9', 'http://localhost/asc_hotel_back/webadmin/booking-status', 'POST', '::1', '9', 'WEBADMIN', '9', '2022-01-07 07:48:49', '2022-01-07 07:48:49'),
(196, 'Booking Status Change -9', 'http://localhost/asc_hotel_back/webadmin/booking-status', 'POST', '::1', '9', 'WEBADMIN', '9', '2022-01-07 07:48:57', '2022-01-07 07:48:57'),
(197, 'Booking Status Change -9', 'http://localhost/asc_hotel_back/webadmin/booking-status', 'POST', '::1', '9', 'WEBADMIN', '9', '2022-01-07 07:49:34', '2022-01-07 07:49:34'),
(198, 'Booking Status Change -9', 'http://localhost/asc_hotel_back/webadmin/booking-status', 'POST', '::1', '9', 'WEBADMIN', '9', '2022-01-07 07:50:55', '2022-01-07 07:50:55'),
(199, 'Booking Status Change -9', 'http://localhost/asc_hotel_back/webadmin/booking-status', 'POST', '::1', '9', 'WEBADMIN', '9', '2022-01-07 07:51:16', '2022-01-07 07:51:16'),
(200, 'Booking Status Change -9', 'http://localhost/asc_hotel_back/webadmin/booking-status', 'POST', '::1', '9', 'WEBADMIN', '9', '2022-01-07 07:51:21', '2022-01-07 07:51:21'),
(201, 'Booking Status Change -9', 'http://localhost/asc_hotel_back/webadmin/booking-status', 'POST', '::1', '9', 'WEBADMIN', '9', '2022-01-07 07:51:27', '2022-01-07 07:51:27'),
(202, 'Booking Status Change -9', 'http://localhost/asc_hotel_back/webadmin/booking-status', 'POST', '::1', '9', 'WEBADMIN', '9', '2022-01-07 07:51:30', '2022-01-07 07:51:30'),
(203, 'Booking Status Change -9', 'http://localhost/asc_hotel_back/webadmin/booking-status', 'POST', '::1', '9', 'WEBADMIN', '9', '2022-01-07 07:55:35', '2022-01-07 07:55:35'),
(204, 'Booking Status Change -9', 'http://localhost/asc_hotel_back/webadmin/booking-status', 'POST', '::1', '9', 'WEBADMIN', '9', '2022-01-07 07:56:19', '2022-01-07 07:56:19'),
(205, 'Booking Status Change -9', 'http://localhost/asc_hotel_back/webadmin/booking-status', 'POST', '::1', '9', 'WEBADMIN', '9', '2022-01-07 07:56:40', '2022-01-07 07:56:40'),
(206, 'Booking Status Change -9', 'http://localhost/asc_hotel_back/webadmin/booking-status', 'POST', '::1', '9', 'WEBADMIN', '9', '2022-01-07 07:57:57', '2022-01-07 07:57:57'),
(207, 'Booking Status Change -9', 'http://localhost/asc_hotel_back/webadmin/booking-status', 'POST', '::1', '9', 'WEBADMIN', '9', '2022-01-07 07:58:01', '2022-01-07 07:58:01'),
(208, 'Booking Status Change -9', 'http://localhost/asc_hotel_back/webadmin/booking-status', 'POST', '::1', '9', 'WEBADMIN', '9', '2022-01-07 07:58:43', '2022-01-07 07:58:43'),
(209, 'Booking Status Change -9', 'http://localhost/asc_hotel_back/webadmin/booking-status', 'POST', '::1', '9', 'WEBADMIN', '9', '2022-01-07 07:58:46', '2022-01-07 07:58:46'),
(210, 'Booking Status Change -9', 'http://localhost/asc_hotel_back/webadmin/booking-status', 'POST', '::1', '9', 'WEBADMIN', '9', '2022-01-07 07:58:55', '2022-01-07 07:58:55'),
(211, 'Booking Status Change -9', 'http://localhost/asc_hotel_back/webadmin/booking-status', 'POST', '::1', '9', 'WEBADMIN', '9', '2022-01-07 08:01:28', '2022-01-07 08:01:28'),
(212, 'Booking Status Change -9', 'http://localhost/asc_hotel_back/webadmin/booking-status', 'POST', '::1', '9', 'WEBADMIN', '9', '2022-01-07 08:01:44', '2022-01-07 08:01:44'),
(213, 'Booking Status Change -9', 'http://localhost/asc_hotel_back/webadmin/booking-status', 'POST', '::1', '9', 'WEBADMIN', '9', '2022-01-07 08:04:08', '2022-01-07 08:04:08'),
(214, 'Booking Status Change -9', 'http://localhost/asc_hotel_back/webadmin/booking-status', 'POST', '::1', '9', 'WEBADMIN', '9', '2022-01-07 08:04:15', '2022-01-07 08:04:15'),
(215, 'Booking Status Change -9', 'http://localhost/asc_hotel_back/webadmin/booking-status', 'POST', '::1', '9', 'WEBADMIN', '9', '2022-01-07 08:04:48', '2022-01-07 08:04:48'),
(216, 'Booking Status Change -9', 'http://localhost/asc_hotel_back/webadmin/booking-status', 'POST', '::1', '9', 'WEBADMIN', '9', '2022-01-07 08:04:51', '2022-01-07 08:04:51'),
(217, 'Booking Status Change -9', 'http://localhost/asc_hotel_back/webadmin/booking-status', 'POST', '::1', '9', 'WEBADMIN', '9', '2022-01-07 08:05:43', '2022-01-07 08:05:43'),
(218, 'Booking Status Change -9', 'http://localhost/asc_hotel_back/webadmin/booking-status', 'POST', '::1', '9', 'WEBADMIN', '9', '2022-01-07 08:05:55', '2022-01-07 08:05:55'),
(219, 'Booking Status Change -9', 'http://localhost/asc_hotel_back/webadmin/booking-status', 'POST', '::1', '9', 'WEBADMIN', '9', '2022-01-07 08:06:02', '2022-01-07 08:06:02'),
(220, 'Booking Status Change -9', 'http://localhost/asc_hotel_back/webadmin/booking-status', 'POST', '::1', '9', 'WEBADMIN', '9', '2022-01-07 08:07:08', '2022-01-07 08:07:08'),
(221, 'Booking Status Change -9', 'http://localhost/asc_hotel_back/webadmin/booking-status', 'POST', '::1', '9', 'WEBADMIN', '9', '2022-01-07 08:07:12', '2022-01-07 08:07:12'),
(222, 'Booking Status Change -9', 'http://localhost/asc_hotel_back/webadmin/booking-status', 'POST', '::1', '9', 'WEBADMIN', '9', '2022-01-07 08:07:28', '2022-01-07 08:07:28'),
(223, 'Booking Status Change -9', 'http://localhost/asc_hotel_back/webadmin/booking-status', 'POST', '::1', '9', 'WEBADMIN', '9', '2022-01-07 08:07:30', '2022-01-07 08:07:30'),
(224, 'Booking Status Change -9', 'http://localhost/asc_hotel_back/webadmin/booking-status', 'POST', '::1', '9', 'WEBADMIN', '9', '2022-01-07 08:07:32', '2022-01-07 08:07:32'),
(225, 'Booking Status Change -9', 'http://localhost/asc_hotel_back/webadmin/booking-status', 'POST', '::1', '9', 'WEBADMIN', '9', '2022-01-07 08:07:40', '2022-01-07 08:07:40'),
(226, 'Booking Status Change -9', 'http://localhost/asc_hotel_back/webadmin/booking-status', 'POST', '::1', '9', 'WEBADMIN', '9', '2022-01-07 08:07:47', '2022-01-07 08:07:47'),
(227, 'Booking Status Change -9', 'http://localhost/asc_hotel_back/webadmin/booking-status', 'POST', '::1', '9', 'WEBADMIN', '9', '2022-01-07 08:07:53', '2022-01-07 08:07:53'),
(228, 'Booking Status Change -9', 'http://localhost/asc_hotel_back/webadmin/booking-status', 'POST', '::1', '9', 'WEBADMIN', '9', '2022-01-07 08:08:34', '2022-01-07 08:08:34'),
(229, 'Booking Status Change -9', 'http://localhost/asc_hotel_back/webadmin/booking-status', 'POST', '::1', '9', 'WEBADMIN', '9', '2022-01-07 08:08:36', '2022-01-07 08:08:36'),
(230, 'Booking Status Change -9', 'http://localhost/asc_hotel_back/webadmin/booking-status', 'POST', '::1', '9', 'WEBADMIN', '9', '2022-01-07 08:08:38', '2022-01-07 08:08:38'),
(231, 'Booking Status Change -9', 'http://localhost/asc_hotel_back/webadmin/booking-status', 'POST', '::1', '9', 'WEBADMIN', '9', '2022-01-07 08:08:41', '2022-01-07 08:08:41'),
(232, 'Booking Status Change -9', 'http://localhost/asc_hotel_back/webadmin/booking-status', 'POST', '::1', '9', 'WEBADMIN', '9', '2022-01-07 08:08:43', '2022-01-07 08:08:43'),
(233, 'Booking Status Change -9', 'http://localhost/asc_hotel_back/webadmin/booking-status', 'POST', '::1', '9', 'WEBADMIN', '9', '2022-01-07 08:08:45', '2022-01-07 08:08:45'),
(234, 'Booking Status Change -9', 'http://localhost/asc_hotel_back/webadmin/booking-status', 'POST', '::1', '9', 'WEBADMIN', '9', '2022-01-07 08:08:47', '2022-01-07 08:08:47'),
(235, 'Booking Status Change -9', 'http://localhost/asc_hotel_back/webadmin/booking-status', 'POST', '::1', '9', 'WEBADMIN', '9', '2022-01-07 08:08:50', '2022-01-07 08:08:50'),
(236, 'Booking Status Change -9', 'http://localhost/asc_hotel_back/webadmin/booking-status', 'POST', '::1', '9', 'WEBADMIN', '9', '2022-01-07 08:10:04', '2022-01-07 08:10:04'),
(237, 'Booking Status Change -9', 'http://localhost/asc_hotel_back/webadmin/booking-status', 'POST', '::1', '9', 'WEBADMIN', '9', '2022-01-07 08:10:08', '2022-01-07 08:10:08'),
(238, 'Booking Status Change -9', 'http://localhost/asc_hotel_back/webadmin/booking-status', 'POST', '::1', '9', 'WEBADMIN', '9', '2022-01-07 08:10:13', '2022-01-07 08:10:13'),
(239, 'Booking Status Change -9', 'http://localhost/asc_hotel_back/webadmin/booking-status', 'POST', '::1', '9', 'WEBADMIN', '9', '2022-01-07 08:10:16', '2022-01-07 08:10:16'),
(240, 'Booking Status Change -9', 'http://localhost/asc_hotel_back/webadmin/booking-status', 'POST', '::1', '9', 'WEBADMIN', '9', '2022-01-07 08:10:22', '2022-01-07 08:10:22'),
(241, 'login -1', 'https://localhost/asc_hotel_back/admin/loginSubmit', 'POST', '127.0.0.1', '1', 'ADMIN', '1', '2022-01-09 22:20:16', '2022-01-09 22:20:16'),
(242, 'login -1', 'http://localhost/asc_hotel_back/admin/loginSubmit', 'POST', '::1', '1', 'ADMIN', '1', '2022-01-09 23:04:23', '2022-01-09 23:04:23'),
(243, 'user status -1', 'http://localhost/asc_hotel_back/admin/change-user-status', 'POST', '::1', '1', 'WEBADMIN', '1', '2022-01-09 23:40:28', '2022-01-09 23:40:28'),
(244, 'user status -1', 'http://localhost/asc_hotel_back/admin/change-user-status', 'POST', '::1', '1', 'WEBADMIN', '1', '2022-01-09 23:42:05', '2022-01-09 23:42:05'),
(245, 'user status -1', 'http://localhost/asc_hotel_back/admin/change-user-status', 'POST', '::1', '1', 'WEBADMIN', '1', '2022-01-09 23:42:22', '2022-01-09 23:42:22'),
(246, 'user status -1', 'http://localhost/asc_hotel_back/admin/change-user-status', 'POST', '::1', '1', 'WEBADMIN', '1', '2022-01-09 23:50:06', '2022-01-09 23:50:06'),
(247, 'user login -9', 'http://localhost/asc_hotel_back/webadmin/webadmin_access/OQ==', 'GET', '::1', '9', 'WEBADMIN', '9', '2022-01-09 23:55:47', '2022-01-09 23:55:47'),
(248, 'Booking Status Change -9', 'http://localhost/asc_hotel_back/webadmin/booking-status', 'POST', '::1', '9', 'WEBADMIN', '9', '2022-01-10 00:12:55', '2022-01-10 00:12:55'),
(249, 'Booking Status Change -9', 'http://localhost/asc_hotel_back/webadmin/booking-status', 'POST', '::1', '9', 'WEBADMIN', '9', '2022-01-10 00:14:03', '2022-01-10 00:14:03'),
(250, 'Booking Status Change -9', 'http://localhost/asc_hotel_back/webadmin/booking-status', 'POST', '::1', '9', 'WEBADMIN', '9', '2022-01-10 00:14:06', '2022-01-10 00:14:06'),
(251, 'Booking Status Change -9', 'http://localhost/asc_hotel_back/webadmin/booking-status', 'POST', '::1', '9', 'WEBADMIN', '9', '2022-01-10 00:15:14', '2022-01-10 00:15:14'),
(252, 'user login -9', 'http://localhost/asc_hotel_back/webadmin/webadmin_access/OQ==', 'GET', '::1', '9', 'WEBADMIN', '9', '2022-01-10 03:52:18', '2022-01-10 03:52:18'),
(253, 'login -1', 'http://localhost/asc_hotel_back/admin/loginSubmit', 'POST', '127.0.0.1', '1', 'ADMIN', '1', '2022-01-10 22:33:35', '2022-01-10 22:33:35'),
(254, 'user login -10', 'http://localhost/asc_hotel_back/webadmin/webadmin_access/MTA=', 'GET', '127.0.0.1', '10', 'WEBADMIN', '10', '2022-01-10 22:41:00', '2022-01-10 22:41:00'),
(255, 'login -1', 'http://localhost/asc_hotel_back/admin/loginSubmit', 'POST', '::1', '1', 'ADMIN', '1', '2022-01-10 22:56:25', '2022-01-10 22:56:25'),
(256, 'user login -9', 'http://localhost/asc_hotel_back/webadmin/webadmin_access/OQ==', 'GET', '::1', '9', 'WEBADMIN', '9', '2022-01-10 22:56:43', '2022-01-10 22:56:43'),
(257, 'user login -9', 'http://localhost/asc_hotel_back/webadmin/webadmin_access/OQ==', 'GET', '::1', '9', 'WEBADMIN', '9', '2022-01-11 00:38:22', '2022-01-11 00:38:22'),
(258, 'login -1', 'http://localhost/asc_hotel_back/admin/loginSubmit', 'POST', '127.0.0.1', '1', 'ADMIN', '1', '2022-01-11 00:46:33', '2022-01-11 00:46:33'),
(259, 'login -1', 'http://localhost/asc_hotel_back/admin/loginSubmit', 'POST', '127.0.0.1', '1', 'ADMIN', '1', '2022-01-11 01:10:13', '2022-01-11 01:10:13'),
(260, 'login -1', 'http://localhost/asc_hotel_back/admin/loginSubmit', 'POST', '::1', '1', 'ADMIN', '1', '2022-01-13 11:57:08', '2022-01-13 11:57:08'),
(261, 'Add Amenity -1', 'http://localhost/asc_hotel_back/admin/add-amenity', 'POST', '::1', '1', 'ADMIN', '1', '2022-01-13 12:17:19', '2022-01-13 12:17:19'),
(262, 'Delete Amenity -1', 'http://localhost/asc_hotel_back/admin/delete-amenity', 'POST', '::1', '1', 'ADMIN', '1', '2022-01-13 12:17:24', '2022-01-13 12:17:24'),
(263, 'Amenity status update -1', 'http://localhost/asc_hotel_back/admin/amenity-status', 'POST', '::1', '1', 'ADMIN', '1', '2022-01-13 12:17:27', '2022-01-13 12:17:27'),
(264, 'Amenity status update -1', 'http://localhost/asc_hotel_back/admin/amenity-status', 'POST', '::1', '1', 'ADMIN', '1', '2022-01-13 12:17:30', '2022-01-13 12:17:30'),
(265, 'Add Amenity -1', 'http://localhost/asc_hotel_back/admin/add-amenity', 'POST', '::1', '1', 'ADMIN', '1', '2022-01-13 12:21:17', '2022-01-13 12:21:17'),
(266, 'Amenity status update -1', 'http://localhost/asc_hotel_back/admin/amenity-status', 'POST', '::1', '1', 'ADMIN', '1', '2022-01-13 12:21:26', '2022-01-13 12:21:26'),
(267, 'Amenity status update -1', 'http://localhost/asc_hotel_back/admin/amenity-status', 'POST', '::1', '1', 'ADMIN', '1', '2022-01-13 12:21:27', '2022-01-13 12:21:27'),
(268, 'Amenity status update -1', 'http://localhost/asc_hotel_back/admin/amenity-status', 'POST', '::1', '1', 'ADMIN', '1', '2022-01-13 12:21:28', '2022-01-13 12:21:28'),
(269, 'Amenity status update -1', 'http://localhost/asc_hotel_back/admin/amenity-status', 'POST', '::1', '1', 'ADMIN', '1', '2022-01-13 12:21:30', '2022-01-13 12:21:30'),
(270, 'Edit Amenity -1', 'http://localhost/asc_hotel_back/admin/edit-amenity', 'POST', '::1', '1', 'ADMIN', '1', '2022-01-13 12:27:23', '2022-01-13 12:27:23'),
(271, 'Edit Amenity -1', 'http://localhost/asc_hotel_back/admin/edit-amenity', 'POST', '::1', '1', 'ADMIN', '1', '2022-01-13 14:08:45', '2022-01-13 14:08:45'),
(272, 'Delete Amenity -1', 'http://localhost/asc_hotel_back/admin/delete-amenity', 'POST', '::1', '1', 'ADMIN', '1', '2022-01-13 14:13:50', '2022-01-13 14:13:50'),
(273, 'Add Amenity -1', 'http://localhost/asc_hotel_back/admin/add-amenity', 'POST', '::1', '1', 'ADMIN', '1', '2022-01-13 14:14:10', '2022-01-13 14:14:10'),
(274, 'Amenity status update -1', 'http://localhost/asc_hotel_back/admin/amenity-status', 'POST', '::1', '1', 'ADMIN', '1', '2022-01-13 14:20:38', '2022-01-13 14:20:38'),
(275, 'Amenity status update -1', 'http://localhost/asc_hotel_back/admin/amenity-status', 'POST', '::1', '1', 'ADMIN', '1', '2022-01-13 14:20:40', '2022-01-13 14:20:40'),
(276, 'Amenity status update -1', 'http://localhost/asc_hotel_back/admin/amenity-status', 'POST', '::1', '1', 'ADMIN', '1', '2022-01-13 14:20:42', '2022-01-13 14:20:42'),
(277, 'Amenity status update -1', 'http://localhost/asc_hotel_back/admin/amenity-status', 'POST', '::1', '1', 'ADMIN', '1', '2022-01-13 14:20:43', '2022-01-13 14:20:43'),
(278, 'user login -9', 'http://localhost/asc_hotel_back/webadmin/webadmin_access/OQ==', 'GET', '::1', '9', 'WEBADMIN', '9', '2022-01-13 14:21:08', '2022-01-13 14:21:08'),
(279, 'Booking Status Change -9', 'http://localhost/asc_hotel_back/webadmin/hotel/booking', 'POST', '::1', '9', 'WEBADMIN', '9', '2022-01-13 15:18:13', '2022-01-13 15:18:13'),
(280, 'Booking Status Change -9', 'http://localhost/asc_hotel_back/webadmin/hotel/booking', 'POST', '::1', '9', 'WEBADMIN', '9', '2022-01-13 15:18:15', '2022-01-13 15:18:15'),
(281, 'user login -9', 'http://localhost/asc_hotel_back/webadmin/webadmin_access/OQ==', 'GET', '::1', '9', 'WEBADMIN', '9', '2022-01-13 15:20:51', '2022-01-13 15:20:51'),
(282, 'Edit Hotel Profile -9', 'http://localhost/asc_hotel_back/webadmin/edit-profile', 'POST', '::1', '9', 'WEBADMIN', '9', '2022-01-13 18:03:20', '2022-01-13 18:03:20'),
(283, 'login -1', 'http://localhost/asc_hotel_back/admin/loginSubmit', 'POST', '::1', '1', 'ADMIN', '1', '2022-01-13 21:45:38', '2022-01-13 21:45:38'),
(284, 'user login -9', 'http://localhost/asc_hotel_back/webadmin/webadmin_access/OQ==', 'GET', '::1', '9', 'WEBADMIN', '9', '2022-01-13 21:46:31', '2022-01-13 21:46:31'),
(285, 'login -1', 'http://localhost/asc_hotel_back/admin/loginSubmit', 'POST', '::1', '1', 'ADMIN', '1', '2022-01-16 21:52:14', '2022-01-16 21:52:14'),
(286, 'user login -9', 'http://localhost/asc_hotel_back/webadmin/webadmin_access/OQ==', 'GET', '::1', '9', 'WEBADMIN', '9', '2022-01-16 21:53:06', '2022-01-16 21:53:06'),
(287, 'delete video -9', 'http://localhost/asc_hotel_back/webadmin/delete-video', 'POST', '::1', '9', 'WEBADMIN', '9', '2022-01-16 22:33:48', '2022-01-16 22:33:48'),
(288, 'delete video -9', 'http://localhost/asc_hotel_back/webadmin/delete-video', 'POST', '::1', '9', 'WEBADMIN', '9', '2022-01-16 22:33:50', '2022-01-16 22:33:50'),
(289, 'delete video -9', 'http://localhost/asc_hotel_back/webadmin/delete-video', 'POST', '::1', '9', 'WEBADMIN', '9', '2022-01-16 23:55:36', '2022-01-16 23:55:36'),
(290, 'delete video -9', 'http://localhost/asc_hotel_back/webadmin/delete-video', 'POST', '::1', '9', 'WEBADMIN', '9', '2022-01-16 23:57:10', '2022-01-16 23:57:10'),
(291, 'delete video -9', 'http://localhost/asc_hotel_back/webadmin/delete-image', 'POST', '::1', '9', 'WEBADMIN', '9', '2022-01-17 00:00:37', '2022-01-17 00:00:37'),
(292, 'delete video -9', 'http://localhost/asc_hotel_back/webadmin/delete-image', 'POST', '::1', '9', 'WEBADMIN', '9', '2022-01-17 00:01:25', '2022-01-17 00:01:25'),
(293, 'Edit Hotel Profile -9', 'http://localhost/asc_hotel_back/webadmin/edit-profile', 'POST', '::1', '9', 'WEBADMIN', '9', '2022-01-17 00:52:16', '2022-01-17 00:52:16'),
(294, 'Edit Hotel Profile -9', 'http://localhost/asc_hotel_back/webadmin/edit-profile', 'POST', '::1', '9', 'WEBADMIN', '9', '2022-01-17 00:52:30', '2022-01-17 00:52:30'),
(295, 'Edit Hotel Profile -9', 'http://localhost/asc_hotel_back/webadmin/edit-profile', 'POST', '::1', '9', 'WEBADMIN', '9', '2022-01-17 00:54:13', '2022-01-17 00:54:13'),
(296, 'login -1', 'http://localhost/asc_hotel_back/admin/loginSubmit', 'POST', '::1', '1', 'ADMIN', '1', '2022-01-17 01:51:23', '2022-01-17 01:51:23'),
(297, 'Edit Amenity -1', 'http://localhost/asc_hotel_back/admin/edit-amenity', 'POST', '::1', '1', 'ADMIN', '1', '2022-01-17 01:52:46', '2022-01-17 01:52:46'),
(298, 'delete video -9', 'http://localhost/asc_hotel_back/webadmin/delete-image', 'POST', '::1', '9', 'WEBADMIN', '9', '2022-01-17 02:18:32', '2022-01-17 02:18:32'),
(299, 'login -1', 'http://localhost/asc_hotel_back/admin/loginSubmit', 'POST', '::1', '1', 'ADMIN', '1', '2022-01-17 02:59:10', '2022-01-17 02:59:10'),
(300, 'user login -10', 'http://localhost/asc_hotel_back/webadmin/webadmin_access/MTA=', 'GET', '::1', '10', 'WEBADMIN', '10', '2022-01-17 02:59:20', '2022-01-17 02:59:20'),
(301, 'login -1', 'http://localhost/asc_hotel_back/admin/loginSubmit', 'POST', '::1', '1', 'ADMIN', '1', '2022-01-17 07:20:03', '2022-01-17 07:20:03'),
(302, 'login -1', 'http://localhost/asc_hotel_back/admin/loginSubmit', 'POST', '127.0.0.1', '1', 'ADMIN', '1', '2022-01-17 07:20:03', '2022-01-17 07:20:03');
INSERT INTO `activities` (`id`, `subject`, `url`, `method`, `ip`, `user_id`, `type`, `created_by`, `created_at`, `updated_at`) VALUES
(303, 'user login -10', 'http://localhost/asc_hotel_back/webadmin/webadmin_access/MTA=', 'GET', '::1', '10', 'WEBADMIN', '10', '2022-01-17 07:20:18', '2022-01-17 07:20:18'),
(304, 'country add -1', 'http://localhost/asc_hotel_back/admin/add_country', 'POST', '::1', '1', 'ADMIN', '1', '2022-01-17 08:03:43', '2022-01-17 08:03:43'),
(305, 'country update -1', 'http://localhost/asc_hotel_back/admin/edit_country_submit', 'POST', '::1', '1', 'ADMIN', '1', '2022-01-17 08:16:20', '2022-01-17 08:16:20'),
(306, 'country update -1', 'http://localhost/asc_hotel_back/admin/edit_country_submit', 'POST', '::1', '1', 'ADMIN', '1', '2022-01-17 08:17:27', '2022-01-17 08:17:27'),
(307, 'country update -1', 'http://localhost/asc_hotel_back/admin/edit_country_submit', 'POST', '::1', '1', 'ADMIN', '1', '2022-01-17 08:20:37', '2022-01-17 08:20:37'),
(308, 'country update -1', 'http://localhost/asc_hotel_back/admin/edit_country_submit', 'POST', '::1', '1', 'ADMIN', '1', '2022-01-17 08:21:42', '2022-01-17 08:21:42'),
(309, 'country update -1', 'http://localhost/asc_hotel_back/admin/edit_country_submit', 'POST', '::1', '1', 'ADMIN', '1', '2022-01-17 08:23:39', '2022-01-17 08:23:39'),
(310, 'country update -1', 'http://localhost/asc_hotel_back/admin/edit_country_submit', 'POST', '::1', '1', 'ADMIN', '1', '2022-01-17 08:25:08', '2022-01-17 08:25:08'),
(311, 'country update -1', 'http://localhost/asc_hotel_back/admin/edit_country_submit', 'POST', '::1', '1', 'ADMIN', '1', '2022-01-17 08:26:19', '2022-01-17 08:26:19'),
(312, 'country update -1', 'http://localhost/asc_hotel_back/admin/edit_country_submit', 'POST', '::1', '1', 'ADMIN', '1', '2022-01-17 08:27:03', '2022-01-17 08:27:03'),
(313, 'country update -1', 'http://localhost/asc_hotel_back/admin/edit_country_submit', 'POST', '::1', '1', 'ADMIN', '1', '2022-01-17 08:28:12', '2022-01-17 08:28:12'),
(314, 'country add -1', 'http://localhost/asc_hotel_back/admin/add_country', 'POST', '::1', '1', 'ADMIN', '1', '2022-01-17 08:28:50', '2022-01-17 08:28:50'),
(315, 'city update -1', 'http://localhost/asc_hotel_back/admin/cities-update', 'POST', '::1', '1', 'ADMIN', '1', '2022-01-17 08:41:58', '2022-01-17 08:41:58'),
(316, 'city update -1', 'http://localhost/asc_hotel_back/admin/cities-update', 'POST', '::1', '1', 'ADMIN', '1', '2022-01-17 08:42:09', '2022-01-17 08:42:09'),
(317, 'city update -1', 'http://localhost/asc_hotel_back/admin/cities-update', 'POST', '::1', '1', 'ADMIN', '1', '2022-01-17 08:42:40', '2022-01-17 08:42:40'),
(318, 'city update -1', 'http://localhost/asc_hotel_back/admin/cities-update', 'POST', '::1', '1', 'ADMIN', '1', '2022-01-17 08:42:40', '2022-01-17 08:42:40'),
(319, 'city update -1', 'http://localhost/asc_hotel_back/admin/cities-update', 'POST', '::1', '1', 'ADMIN', '1', '2022-01-17 08:44:03', '2022-01-17 08:44:03'),
(320, 'city -1', 'http://localhost/asc_hotel_back/admin/add-city', 'POST', '::1', '1', 'ADMIN', '1', '2022-01-17 08:51:17', '2022-01-17 08:51:17'),
(321, 'city update -1', 'http://localhost/asc_hotel_back/admin/cities-update', 'POST', '::1', '1', 'ADMIN', '1', '2022-01-17 09:27:43', '2022-01-17 09:27:43'),
(322, 'city update -1', 'http://localhost/asc_hotel_back/admin/cities-update', 'POST', '::1', '1', 'ADMIN', '1', '2022-01-17 09:27:56', '2022-01-17 09:27:56'),
(323, 'city update -1', 'http://localhost/asc_hotel_back/admin/cities-update', 'POST', '::1', '1', 'ADMIN', '1', '2022-01-17 09:28:05', '2022-01-17 09:28:05'),
(324, 'login -1', 'http://localhost/asc_hotel_back/admin/loginSubmit', 'POST', '::1', '1', 'ADMIN', '1', '2022-01-17 21:27:05', '2022-01-17 21:27:05'),
(325, 'user login -10', 'http://localhost/asc_hotel_back/webadmin/webadmin_access/MTA=', 'GET', '::1', '10', 'WEBADMIN', '10', '2022-01-17 21:27:21', '2022-01-17 21:27:21'),
(326, 'login -1', 'http://localhost/asc_hotel_back/admin/loginSubmit', 'POST', '::1', '1', 'ADMIN', '1', '2022-01-17 23:41:04', '2022-01-17 23:41:04'),
(327, 'login -1', 'http://localhost/asc_hotel_back/admin/loginSubmit', 'POST', '::1', '1', 'ADMIN', '1', '2022-01-18 03:39:54', '2022-01-18 03:39:54'),
(328, 'user login -10', 'http://localhost/asc_hotel_back/webadmin/webadmin_access/MTA=', 'GET', '::1', '10', 'WEBADMIN', '10', '2022-01-18 06:42:30', '2022-01-18 06:42:30'),
(329, 'login -1', 'http://localhost/asc_hotel_back/admin/loginSubmit', 'POST', '::1', '1', 'ADMIN', '1', '2022-01-18 21:48:46', '2022-01-18 21:48:46'),
(330, 'user login -9', 'http://localhost/asc_hotel_back/webadmin/webadmin_access/OQ==', 'GET', '::1', '9', 'WEBADMIN', '9', '2022-01-18 21:51:52', '2022-01-18 21:51:52'),
(331, 'login -1', 'http://localhost/asc_hotel_back/admin/loginSubmit', 'POST', '::1', '1', 'ADMIN', '1', '2022-01-19 21:53:55', '2022-01-19 21:53:55'),
(332, 'login -1', 'http://localhost/asc_hotel_back/admin/loginSubmit', 'POST', '::1', '1', 'ADMIN', '1', '2022-01-20 01:58:24', '2022-01-20 01:58:24'),
(333, 'login -1', 'http://localhost/asc_hotel_back/admin/loginSubmit', 'POST', '::1', '1', 'ADMIN', '1', '2022-01-20 05:47:04', '2022-01-20 05:47:04'),
(334, 'login -1', 'http://localhost/asc_hotel_back/admin/loginSubmit', 'POST', '::1', '1', 'ADMIN', '1', '2022-01-20 07:26:44', '2022-01-20 07:26:44'),
(335, 'login -1', 'http://localhost/asc_hotel_back/admin/loginSubmit', 'POST', '::1', '1', 'ADMIN', '1', '2022-01-20 22:06:25', '2022-01-20 22:06:25'),
(336, 'Notification sent -1', 'http://localhost/asc_hotel_back/admin/storenotificationall', 'POST', '::1', '1', 'ADMIN', '1', '2022-01-20 23:48:15', '2022-01-20 23:48:15'),
(337, 'city deleted -1', 'http://localhost/asc_hotel_back/admin/deletenotificationall', 'POST', '::1', '1', 'ADMIN', '1', '2022-01-21 02:17:17', '2022-01-21 02:17:17'),
(338, 'city deleted -1', 'http://localhost/asc_hotel_back/admin/deletenotificationall', 'POST', '::1', '1', 'ADMIN', '1', '2022-01-21 02:17:25', '2022-01-21 02:17:25'),
(339, 'city deleted -1', 'http://localhost/asc_hotel_back/admin/deletenotificationall', 'POST', '::1', '1', 'ADMIN', '1', '2022-01-21 02:17:33', '2022-01-21 02:17:33'),
(340, 'Notification sent -1', 'http://localhost/asc_hotel_back/admin/storenotificationall', 'POST', '::1', '1', 'ADMIN', '1', '2022-01-21 02:38:07', '2022-01-21 02:38:07'),
(341, 'login -1', 'http://localhost/asc_hotel_back/admin/loginSubmit', 'POST', '::1', '1', 'ADMIN', '1', '2022-01-21 03:52:08', '2022-01-21 03:52:08'),
(342, 'user login -13', 'http://localhost/asc_hotel_back/webadmin/webadmin_access/MTM=', 'GET', '::1', '13', 'WEBADMIN', '13', '2022-01-21 03:55:22', '2022-01-21 03:55:22'),
(343, 'login -1', 'http://localhost/asc_hotel_back/admin/loginSubmit', 'POST', '::1', '1', 'ADMIN', '1', '2022-01-21 07:13:26', '2022-01-21 07:13:26'),
(344, 'user login -13', 'http://localhost/asc_hotel_back/webadmin/webadmin_access/MTM=', 'GET', '::1', '13', 'WEBADMIN', '13', '2022-01-21 07:14:29', '2022-01-21 07:14:29'),
(345, 'user login -9', 'http://localhost/asc_hotel_back/webadmin/webadmin_access/OQ==', 'GET', '::1', '9', 'WEBADMIN', '9', '2022-01-21 07:17:50', '2022-01-21 07:17:50'),
(346, 'Edit Hotel Profile -9', 'http://localhost/asc_hotel_back/webadmin/edit-profile', 'POST', '::1', '9', 'WEBADMIN', '9', '2022-01-21 07:27:29', '2022-01-21 07:27:29'),
(347, 'Edit Hotel Profile -9', 'http://localhost/asc_hotel_back/webadmin/edit-profile', 'POST', '::1', '9', 'WEBADMIN', '9', '2022-01-21 07:29:35', '2022-01-21 07:29:35'),
(348, 'Edit Hotel Profile -9', 'http://localhost/asc_hotel_back/webadmin/edit-profile', 'POST', '::1', '9', 'WEBADMIN', '9', '2022-01-21 07:46:22', '2022-01-21 07:46:22'),
(349, 'login -1', 'http://localhost/asc_hotel_back/admin/loginSubmit', 'POST', '::1', '1', 'ADMIN', '1', '2022-01-24 02:16:33', '2022-01-24 02:16:33'),
(350, 'user login -13', 'http://localhost/asc_hotel_back/webadmin/webadmin_access/MTM=', 'GET', '::1', '13', 'WEBADMIN', '13', '2022-01-24 02:16:53', '2022-01-24 02:16:53'),
(351, 'Edit Hotel Profile -13', 'http://localhost/asc_hotel_back/webadmin/edit-profile', 'POST', '::1', '13', 'WEBADMIN', '13', '2022-01-24 02:17:34', '2022-01-24 02:17:34'),
(352, 'login -1', 'http://localhost/asc_hotel_back/admin/loginSubmit', 'POST', '::1', '1', 'ADMIN', '1', '2022-01-25 00:49:27', '2022-01-25 00:49:27'),
(353, 'AboutUs update -1', 'http://localhost/asc_hotel_back/admin/aboutus/edit', 'POST', '::1', '1', 'ADMIN', '1', '2022-01-25 01:10:18', '2022-01-25 01:10:18'),
(354, 'AboutUs update -1', 'http://localhost/asc_hotel_back/admin/aboutus/edit', 'POST', '::1', '1', 'ADMIN', '1', '2022-01-25 01:11:35', '2022-01-25 01:11:35'),
(355, 'AboutUs update -1', 'http://localhost/asc_hotel_back/admin/aboutus/edit', 'POST', '::1', '1', 'ADMIN', '1', '2022-01-25 01:12:45', '2022-01-25 01:12:45'),
(356, 'AboutUs update -1', 'http://localhost/asc_hotel_back/admin/aboutus/edit', 'POST', '::1', '1', 'ADMIN', '1', '2022-01-25 01:14:22', '2022-01-25 01:14:22'),
(357, 'login -1', 'http://localhost/asc_hotel_back/admin/loginSubmit', 'POST', '::1', '1', 'ADMIN', '1', '2022-01-25 03:40:37', '2022-01-25 03:40:37'),
(358, 'AboutUs update -1', 'http://localhost/asc_hotel_back/admin/aboutus/edit', 'POST', '::1', '1', 'ADMIN', '1', '2022-01-25 03:40:59', '2022-01-25 03:40:59'),
(359, 'Contact Us update -1', 'http://localhost/asc_hotel_back/admin/contactus/edit', 'POST', '::1', '1', 'ADMIN', '1', '2022-01-25 04:29:40', '2022-01-25 04:29:40'),
(360, 'user login -9', 'http://localhost/asc_hotel_back/webadmin/webadmin_access/OQ==', 'GET', '::1', '9', 'WEBADMIN', '9', '2022-01-25 04:34:04', '2022-01-25 04:34:04'),
(361, 'login -1', 'http://localhost/asc_hotel_back/admin/loginSubmit', 'POST', '::1', '1', 'ADMIN', '1', '2022-01-27 02:18:53', '2022-01-27 02:18:53'),
(362, 'user login -9', 'http://localhost/asc_hotel_back/webadmin/webadmin_access/OQ==', 'GET', '::1', '9', 'WEBADMIN', '9', '2022-01-27 02:19:29', '2022-01-27 02:19:29'),
(363, 'Edit Hotel Profile -9', 'http://localhost/asc_hotel_back/webadmin/edit-profile', 'POST', '::1', '9', 'WEBADMIN', '9', '2022-01-27 05:38:51', '2022-01-27 05:38:51'),
(364, 'Edit Hotel Profile -9', 'http://localhost/asc_hotel_back/webadmin/edit-profile', 'POST', '::1', '9', 'WEBADMIN', '9', '2022-01-27 05:42:23', '2022-01-27 05:42:23'),
(365, 'Edit Hotel Profile -9', 'http://localhost/asc_hotel_back/webadmin/edit-profile', 'POST', '::1', '9', 'WEBADMIN', '9', '2022-01-27 05:44:29', '2022-01-27 05:44:29'),
(366, 'Edit Hotel Profile -9', 'http://localhost/asc_hotel_back/webadmin/edit-profile', 'POST', '::1', '9', 'WEBADMIN', '9', '2022-01-27 05:45:43', '2022-01-27 05:45:43'),
(367, 'user logout -9', 'http://localhost/asc_hotel_back/webadmin/logout', 'GET', '::1', '9', 'WEBADMIN', '9', '2022-01-27 05:49:27', '2022-01-27 05:49:27'),
(368, 'user login -24', 'http://localhost/asc_hotel_back/webadmin/loginSubmit', 'POST', '::1', '24', 'WEBADMIN', '24', '2022-01-27 07:43:55', '2022-01-27 07:43:55'),
(369, 'user login -9', 'http://localhost/asc_hotel_back/webadmin/webadmin_access/OQ==', 'GET', '::1', '9', 'WEBADMIN', '9', '2022-01-27 07:43:57', '2022-01-27 07:43:57'),
(370, 'login -1', 'http://localhost/asc_hotel_back/admin/loginSubmit', 'POST', '::1', '1', 'ADMIN', '1', '2022-01-28 00:02:11', '2022-01-28 00:02:11'),
(371, 'user login -24', 'http://localhost/asc_hotel_back/webadmin/webadmin_access/MjQ=', 'GET', '::1', '24', 'WEBADMIN', '24', '2022-01-28 00:02:37', '2022-01-28 00:02:37'),
(372, 'user logout -24', 'http://localhost/asc_hotel_back/webadmin/logout', 'GET', '::1', '24', 'WEBADMIN', '24', '2022-01-28 00:02:53', '2022-01-28 00:02:53'),
(373, 'user login -10', 'http://localhost/asc_hotel_back/webadmin/webadmin_access/MTA=', 'GET', '::1', '10', 'WEBADMIN', '10', '2022-01-28 00:03:00', '2022-01-28 00:03:00'),
(374, 'Edit Hotel Profile -10', 'http://localhost/asc_hotel_back/webadmin/edit-profile', 'POST', '::1', '10', 'WEBADMIN', '10', '2022-01-28 00:03:28', '2022-01-28 00:03:28'),
(375, 'user login -10', 'http://localhost/asc_hotel_back/webadmin/webadmin_access/MTA=', 'GET', '::1', '10', 'WEBADMIN', '10', '2022-01-28 00:10:53', '2022-01-28 00:10:53'),
(376, 'delete booking -10', 'http://localhost/asc_hotel_back/webadmin/delete-book', 'POST', '::1', '10', 'WEBADMIN', '10', '2022-01-28 00:42:11', '2022-01-28 00:42:11'),
(377, 'book status -10', 'http://localhost/asc_hotel_back/webadmin/book-status', 'POST', '::1', '10', 'WEBADMIN', '10', '2022-01-28 00:43:14', '2022-01-28 00:43:14'),
(378, 'book status -10', 'http://localhost/asc_hotel_back/webadmin/book-status', 'POST', '::1', '10', 'WEBADMIN', '10', '2022-01-28 00:43:18', '2022-01-28 00:43:18'),
(379, 'delete booking -10', 'http://localhost/asc_hotel_back/webadmin/delete-book', 'POST', '::1', '10', 'WEBADMIN', '10', '2022-01-28 02:04:24', '2022-01-28 02:04:24'),
(380, 'delete booking -10', 'http://localhost/asc_hotel_back/webadmin/delete-book', 'POST', '::1', '10', 'WEBADMIN', '10', '2022-01-28 02:04:55', '2022-01-28 02:04:55'),
(381, 'delete booking -10', 'http://localhost/asc_hotel_back/webadmin/delete-book', 'POST', '::1', '10', 'WEBADMIN', '10', '2022-01-28 04:29:42', '2022-01-28 04:29:42'),
(382, 'delete booking -10', 'http://localhost/asc_hotel_back/webadmin/delete-book', 'POST', '::1', '10', 'WEBADMIN', '10', '2022-01-28 04:29:48', '2022-01-28 04:29:48'),
(383, 'delete booking -10', 'http://localhost/asc_hotel_back/webadmin/delete-book', 'POST', '::1', '10', 'WEBADMIN', '10', '2022-01-28 04:30:44', '2022-01-28 04:30:44'),
(384, 'delete booking -10', 'http://localhost/asc_hotel_back/webadmin/delete-book', 'POST', '::1', '10', 'WEBADMIN', '10', '2022-01-28 04:32:45', '2022-01-28 04:32:45'),
(385, 'delete booking -10', 'http://localhost/asc_hotel_back/webadmin/delete-book', 'POST', '::1', '10', 'WEBADMIN', '10', '2022-01-28 04:33:40', '2022-01-28 04:33:40'),
(386, 'delete booking -10', 'http://localhost/asc_hotel_back/webadmin/delete-book', 'POST', '::1', '10', 'WEBADMIN', '10', '2022-01-28 04:34:56', '2022-01-28 04:34:56'),
(387, 'delete booking -10', 'http://localhost/asc_hotel_back/webadmin/delete-book', 'POST', '::1', '10', 'WEBADMIN', '10', '2022-01-28 04:37:16', '2022-01-28 04:37:16'),
(388, 'delete booking -10', 'http://localhost/asc_hotel_back/webadmin/delete-book', 'POST', '::1', '10', 'WEBADMIN', '10', '2022-01-28 04:38:42', '2022-01-28 04:38:42'),
(389, 'delete booking -10', 'http://localhost/asc_hotel_back/webadmin/delete-book', 'POST', '::1', '10', 'WEBADMIN', '10', '2022-01-28 04:39:06', '2022-01-28 04:39:06'),
(390, 'delete booking -10', 'http://localhost/asc_hotel_back/webadmin/delete-book', 'POST', '::1', '10', 'WEBADMIN', '10', '2022-01-28 04:40:38', '2022-01-28 04:40:38'),
(391, 'delete booking -10', 'http://localhost/asc_hotel_back/webadmin/delete-book', 'POST', '::1', '10', 'WEBADMIN', '10', '2022-01-28 04:49:00', '2022-01-28 04:49:00'),
(392, 'delete booking -10', 'http://localhost/asc_hotel_back/webadmin/delete-book', 'POST', '::1', '10', 'WEBADMIN', '10', '2022-01-28 04:50:10', '2022-01-28 04:50:10'),
(393, 'delete booking -10', 'http://localhost/asc_hotel_back/webadmin/delete-book', 'POST', '::1', '10', 'WEBADMIN', '10', '2022-01-28 04:53:42', '2022-01-28 04:53:42'),
(394, 'delete booking -10', 'http://localhost/asc_hotel_back/webadmin/delete-book', 'POST', '::1', '10', 'WEBADMIN', '10', '2022-01-28 04:56:59', '2022-01-28 04:56:59'),
(395, 'delete booking -10', 'http://localhost/asc_hotel_back/webadmin/delete-book', 'POST', '::1', '10', 'WEBADMIN', '10', '2022-01-28 05:01:01', '2022-01-28 05:01:01'),
(396, 'delete booking -10', 'http://localhost/asc_hotel_back/webadmin/delete-book', 'POST', '::1', '10', 'WEBADMIN', '10', '2022-01-28 05:01:33', '2022-01-28 05:01:33'),
(397, 'delete booking -10', 'http://localhost/asc_hotel_back/webadmin/delete-book', 'POST', '::1', '10', 'WEBADMIN', '10', '2022-01-28 05:04:11', '2022-01-28 05:04:11'),
(398, 'delete booking -10', 'http://localhost/asc_hotel_back/webadmin/delete-book', 'POST', '::1', '10', 'WEBADMIN', '10', '2022-01-28 05:05:04', '2022-01-28 05:05:04');

-- --------------------------------------------------------

--
-- Table structure for table `adminaboutuses`
--

CREATE TABLE `adminaboutuses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `about` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `adminaboutuses`
--

INSERT INTO `adminaboutuses` (`id`, `title`, `about`, `created_at`, `updated_at`) VALUES
(4, 'about us', 'What is Lorem Ipsum?\r\nLorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.\r\n\r\nWhy do we use it?\r\nIt is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).\r\n\r\n\r\nWhere does it come from?\r\nContrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", comes from a line in section 1.10.32.', NULL, '2022-01-25 03:40:57');

-- --------------------------------------------------------

--
-- Table structure for table `admincontactuses`
--

CREATE TABLE `admincontactuses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `app_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `website_url` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contactNumber` bigint(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admincontactuses`
--

INSERT INTO `admincontactuses` (`id`, `email`, `app_name`, `website_url`, `contactNumber`, `created_at`, `updated_at`) VALUES
(1, 'contacthelping@gmail.com', 'asc-home', 'https://freshercampus.in/asc_hotel/admin/', 91, NULL, '2022-01-25 04:29:38');

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `password`, `created_at`, `updated_at`) VALUES
(1, 'Xcrino', 'admin@gmail.com', '$2y$10$ATGq0UTnkzcVDyvZzmk/6u1VeyJRo6V0Gpoeo7mheav8m9GWFpi.q', NULL, '2022-01-07 04:41:41');

-- --------------------------------------------------------

--
-- Table structure for table `amenities`
--

CREATE TABLE `amenities` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `icon` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `amenities`
--

INSERT INTO `amenities` (`id`, `name`, `icon`, `status`, `created_at`, `updated_at`) VALUES
(2, 'wifi1', 'admin/amenity/61e51946d.png', '1', '2022-01-13 12:17:18', '2022-01-17 01:52:46'),
(4, 'wifi1', '/admin/amenity/61dfc332a.jpg', '1', '2022-01-13 14:14:10', '2022-01-13 14:20:43'),
(6, 'wifi1', '/admin/amenity/61dfc332a.jpg', '1', '2022-01-13 14:14:10', '2022-01-13 14:20:43'),
(7, 'Parking', '/admin/amenity/61dfc332a.jpg', '1', '2022-01-13 14:14:10', '2022-01-13 14:20:43'),
(8, 'Restaurant', '/admin/amenity/61dfc332a.jpg', '1', '2022-01-13 14:14:10', '2022-01-13 14:20:43');

-- --------------------------------------------------------

--
-- Table structure for table `bookings`
--

CREATE TABLE `bookings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `hotel_id` bigint(20) UNSIGNED NOT NULL,
  `cusname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cities_id` bigint(20) UNSIGNED DEFAULT NULL,
  `state_id` bigint(20) UNSIGNED DEFAULT NULL,
  `countries_id` bigint(20) UNSIGNED DEFAULT NULL,
  `zip` int(11) DEFAULT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `arrival_time` date NOT NULL,
  `departure_time` date NOT NULL,
  `adults` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `minors` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `number_room` int(20) DEFAULT NULL,
  `room_id` bigint(20) UNSIGNED DEFAULT NULL,
  `status` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `created_by` bigint(20) UNSIGNED DEFAULT NULL,
  `date` date DEFAULT NULL,
  `checkout` enum('1','0') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `remove` enum('1','0') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `reject_note` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `totalamount` double(8,2) DEFAULT NULL,
  `discount` double(8,2) DEFAULT NULL,
  `discounted_amount` double(8,2) DEFAULT NULL,
  `offerDetail` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `service_charge` double(8,2) DEFAULT NULL,
  `payment_status` enum('0','1') COLLATE utf8mb4_unicode_ci DEFAULT '0',
  `order_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payment_type` enum('coc','online') COLLATE utf8mb4_unicode_ci DEFAULT 'coc',
  `checkout_time` time DEFAULT NULL,
  `checkout_date` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cities`
--

CREATE TABLE `cities` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `countries` bigint(20) UNSIGNED NOT NULL,
  `state_id` bigint(20) UNSIGNED NOT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('1','0') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cities`
--

INSERT INTO `cities` (`id`, `countries`, `state_id`, `city`, `image`, `status`, `created_at`, `updated_at`) VALUES
(2, 1, 3, 'Dwarka', '/images/city/61e583fdc.jpg', '1', '2021-12-15 00:11:57', '2022-01-17 09:28:05'),
(3, 1, 2, 'Gaziabad', '/images/city/61e583f4a.jpg', '1', '2021-12-15 00:17:52', '2022-01-17 09:27:56'),
(4, 1, 2, 'rolecity', '/images/city/61e583e7a.jpg', '0', '2022-01-17 08:51:17', '2022-01-17 09:27:43');

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

CREATE TABLE `countries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `country` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `countries`
--

INSERT INTO `countries` (`id`, `country`, `image`, `status`, `created_at`, `updated_at`) VALUES
(1, 'India', '', '1', '2021-12-14 00:53:54', '2021-12-17 00:39:22'),
(4, 'Great Britain', '', '1', '2021-12-20 06:05:57', '2021-12-20 06:05:57'),
(5, 'usa', '/images/country/61e575f4a.jpg', '1', '2021-12-20 06:06:13', '2022-01-17 08:28:12'),
(6, 'new zeland', '/images/country/61e570372.jpg', '1', '2022-01-17 08:03:43', '2022-01-17 08:03:43'),
(7, 'africa', '/images/country/61e5761a5.jpg', '1', '2022-01-17 08:28:50', '2022-01-17 08:28:50');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `hotelamenities`
--

CREATE TABLE `hotelamenities` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `hotel_id` bigint(20) NOT NULL,
  `amenties_id` bigint(20) NOT NULL,
  `amenties_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `amenties_image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `hotelamenities`
--

INSERT INTO `hotelamenities` (`id`, `hotel_id`, `amenties_id`, `amenties_name`, `amenties_image`, `created_at`, `updated_at`) VALUES
(15, 9, 2, 'wifi1', 'admin/amenity/61dfc1eda.jpg', NULL, NULL),
(20, 9, 6, 'wifi1', '/admin/amenity/61dfc332a.jpg', NULL, NULL),
(22, 9, 4, 'wifi1', '/admin/amenity/61dfc332a.jpg', NULL, NULL),
(23, 13, 2, 'wifi1', 'admin/amenity/61e51946d.png', NULL, NULL),
(24, 13, 6, 'wifi1', '/admin/amenity/61dfc332a.jpg', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `hotel_categories`
--

CREATE TABLE `hotel_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `discription` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_by` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `hotel_categories`
--

INSERT INTO `hotel_categories` (`id`, `name`, `status`, `discription`, `created_by`, `created_at`, `updated_at`) VALUES
(4, 'one star', '1', 'cdd', 1, '2022-01-04 06:03:46', '2022-01-04 06:43:36'),
(5, 'two star', '1', 'high luxury', 1, '2022-01-04 23:55:42', '2022-01-04 23:55:42');

-- --------------------------------------------------------

--
-- Table structure for table `manage_hotels`
--

CREATE TABLE `manage_hotels` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `return_policies` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `term` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `hotel_category` bigint(20) DEFAULT NULL,
  `country` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `state` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `zip` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `extras` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '[]',
  `website` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `base_price` bigint(20) DEFAULT NULL,
  `offered_price` bigint(20) DEFAULT NULL,
  `total_guest_in_room` int(20) DEFAULT NULL,
  `charge_per_guest` int(20) DEFAULT NULL,
  `service_charge` int(20) DEFAULT NULL,
  `hotel_contact` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `booking_status` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `total_number_guest` int(20) DEFAULT NULL,
  `total_number_room` int(20) DEFAULT NULL,
  `lat` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lon` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `manage_hotels`
--

INSERT INTO `manage_hotels` (`id`, `name`, `description`, `return_policies`, `term`, `hotel_category`, `country`, `state`, `city`, `zip`, `status`, `email`, `password`, `extras`, `website`, `address`, `base_price`, `offered_price`, `total_guest_in_room`, `charge_per_guest`, `service_charge`, `hotel_contact`, `booking_status`, `total_number_guest`, `total_number_room`, `lat`, `lon`, `created_at`, `updated_at`) VALUES
(9, 'testin1ghotel', 'just making a description for this hotel so that this field have some value in it', 'just making a description for this hotel so that this field have some value in it', 'hello bro just doing small talk with the system so that we can check wether it is working good or not', 4, '1', NULL, NULL, NULL, '1', 'testing@gmail.com', '$2y$10$toAfUxPatwhT/YbDqIznKeeWVt/tAW1xsPyViM3B/OIQc.giK/fI6', '[\"2\",\"3\"]', NULL, 'Dirnberger de Felice Grüber GmbH & Co KG, Margaretenplatz, Vienna, Austria', 200, 100, 3, 500, 20, '0000000000', '1', 2, 6, '48.1914703', '16.357805', '2022-01-07 06:29:41', '2022-01-27 05:45:43'),
(10, 'testinghotel', 'hello bro just doing small talk with the system so...t', 'just making a description for this hotel so that this field have some value in it testrinh', 'hello bro just doing small talk with the system so...testing', 4, '1', '2', '3', NULL, '1', 'testing@gmail.com', '$2y$10$toAfUxPatwhT/YbDqIznKeeWVt/tAW1xsPyViM3B/OIQc.giK/fI6', '[\"2\",\"3\"]', NULL, 'District Park Rohini Sector 20, Sector 20 Extension, Block P 1, Sector 20, Rohini, Delhi, India', 2000, 1000, 3, 240, 30, '0000000000', '1', 2, NULL, '28.7064106', '77.0723178', '2022-01-07 06:29:41', '2022-01-28 00:03:28'),
(11, 'tesing12', NULL, NULL, NULL, 4, '1', '2', '3', NULL, '1', 'tesing12@gmail.com', '$2y$10$c5d1PaUBOVoL1BnzxSX2oOYPAoVk3TrIFD7JpKA2NQtklrNx8aX4G', '[]', NULL, 'solo tryip', NULL, NULL, NULL, NULL, NULL, '1234344545', '1', NULL, NULL, NULL, NULL, '2022-01-18 06:50:53', '2022-01-18 06:50:53'),
(12, 'tesing12', NULL, NULL, NULL, 4, '1', '2', '3', NULL, '1', 'tesing12@gmail.com', '$2y$10$c5d1PaUBOVoL1BnzxSX2oOYPAoVk3TrIFD7JpKA2NQtklrNx8aX4G', '[]', NULL, 'solo tryip', NULL, NULL, NULL, NULL, NULL, '1234344545', '1', NULL, NULL, NULL, NULL, '2022-01-18 06:50:53', '2022-01-18 06:50:53'),
(13, 'testin1ghotel', 'just making a description for this hotel so that this field have some value in it', 'just making a description for this hotel so that this field have some value in it', 'hello bro just doing small talk with the system so that we can check wether it is working good or not', 4, '1', '2', NULL, NULL, '1', 'testing@gmail.com', '$2y$10$toAfUxPatwhT/YbDqIznKeeWVt/tAW1xsPyViM3B/OIQc.giK/fI6', '[\"2\",\"3\"]', NULL, 'ddfg\"\"\"\"\"', 200, 100, 4, 500, 29, '0000000000', '1', 2, 6, NULL, NULL, '2022-01-07 06:29:41', '2022-01-24 02:17:34'),
(14, 'testinghotel', 'hello bro just doing small talk with the system so...t', 'just making a description for this hotel so that this field have some value in it testrinh', 'hello bro just doing small talk with the system so...testing', 4, '1', '2', '3', NULL, '1', 'testing@gmail.com', '$2y$10$toAfUxPatwhT/YbDqIznKeeWVt/tAW1xsPyViM3B/OIQc.giK/fI6', '[\"2\",\"3\"]', NULL, 'ddfg', 2000, 1000, NULL, NULL, NULL, '0000000000', '1', 2, NULL, NULL, NULL, '2022-01-07 06:29:41', '2022-01-17 22:09:03'),
(15, 'testin1ghotel', 'just making a description for this hotel so that this field have some value in it', 'just making a description for this hotel so that this field have some value in it', 'hello bro just doing small talk with the system so that we can check wether it is working good or not', 4, '1', '2', '3', NULL, '1', 'testing@gmail.com', '$2y$10$toAfUxPatwhT/YbDqIznKeeWVt/tAW1xsPyViM3B/OIQc.giK/fI6', '[\"2\",\"3\"]', NULL, 'ddfg\"\"\"\"', 200, 100, NULL, NULL, NULL, '0000000000', '1', 2, 6, NULL, NULL, '2022-01-07 06:29:41', '2022-01-17 00:54:12'),
(16, 'testinghotel', 'hello bro just doing small talk with the system so...t', 'just making a description for this hotel so that this field have some value in it testrinh', 'hello bro just doing small talk with the system so...testing', 4, '1', '2', '3', NULL, '1', 'testing@gmail.com', '$2y$10$toAfUxPatwhT/YbDqIznKeeWVt/tAW1xsPyViM3B/OIQc.giK/fI6', '[\"2\",\"3\"]', NULL, 'ddfg', 2000, 1000, NULL, NULL, NULL, '0000000000', '1', 2, NULL, NULL, NULL, '2022-01-07 06:29:41', '2022-01-17 22:09:03'),
(17, 'tesing12', NULL, NULL, NULL, 4, '1', '2', '3', NULL, '1', 'tesing12@gmail.com', '$2y$10$c5d1PaUBOVoL1BnzxSX2oOYPAoVk3TrIFD7JpKA2NQtklrNx8aX4G', '[]', NULL, 'solo tryip', NULL, NULL, NULL, NULL, NULL, '1234344545', '1', NULL, NULL, NULL, NULL, '2022-01-18 06:50:53', '2022-01-18 06:50:53'),
(18, 'tesing12', NULL, NULL, NULL, 4, '1', '2', '3', NULL, '1', 'tesing12@gmail.com', '$2y$10$c5d1PaUBOVoL1BnzxSX2oOYPAoVk3TrIFD7JpKA2NQtklrNx8aX4G', '[]', NULL, 'solo tryip', NULL, NULL, NULL, NULL, NULL, '1234344545', '1', NULL, NULL, NULL, NULL, '2022-01-18 06:50:53', '2022-01-18 06:50:53'),
(19, 'tesing12', NULL, NULL, NULL, 4, '1', '2', '3', NULL, '1', 'tesing12@gmail.com', '$2y$10$c5d1PaUBOVoL1BnzxSX2oOYPAoVk3TrIFD7JpKA2NQtklrNx8aX4G', '[]', NULL, 'solo tryip', NULL, NULL, NULL, NULL, NULL, '1234344545', '1', NULL, NULL, NULL, NULL, '2022-01-18 06:50:53', '2022-01-18 06:50:53'),
(20, 'tesing12', NULL, NULL, NULL, 4, '1', '2', '3', NULL, '1', 'tesing12@gmail.com', '$2y$10$c5d1PaUBOVoL1BnzxSX2oOYPAoVk3TrIFD7JpKA2NQtklrNx8aX4G', '[]', NULL, 'solo tryip', NULL, NULL, NULL, NULL, NULL, '1234344545', '1', NULL, NULL, NULL, NULL, '2022-01-18 06:50:53', '2022-01-18 06:50:53'),
(21, 'tesing12', NULL, NULL, NULL, 4, '1', '2', '3', NULL, '1', 'tesing12@gmail.com', '$2y$10$c5d1PaUBOVoL1BnzxSX2oOYPAoVk3TrIFD7JpKA2NQtklrNx8aX4G', '[]', NULL, 'solo tryip', NULL, NULL, NULL, NULL, NULL, '1234344545', '1', NULL, NULL, NULL, NULL, '2022-01-18 06:50:53', '2022-01-18 06:50:53'),
(22, 'tesing12', NULL, NULL, NULL, 4, '1', '2', '3', NULL, '1', 'tesing12@gmail.com', '$2y$10$c5d1PaUBOVoL1BnzxSX2oOYPAoVk3TrIFD7JpKA2NQtklrNx8aX4G', '[]', NULL, 'solo tryip', NULL, NULL, NULL, NULL, NULL, '1234344545', '1', NULL, NULL, NULL, NULL, '2022-01-18 06:50:53', '2022-01-18 06:50:53'),
(24, 'lkl;kl11', NULL, NULL, NULL, 4, '1', '3', '2', NULL, '1', 'admin@gmail.com', '$2y$10$D97UtSbB5GUT3bpNr/JmyOteYk8Bt85YA2FHzOJBOtTFR37mxpABS', '[]', NULL, 'Dyker Heights Christmas Lights, 80th Street, Brooklyn, NY, USA', NULL, NULL, NULL, NULL, NULL, '111111111', '1', NULL, NULL, '40.6201334', '-74.015346', '2022-01-27 05:55:39', '2022-01-27 05:55:39');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
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
(5, '2021_12_08_113946_create_admins_table', 1),
(6, '2021_12_09_050417_create_web_admins_table', 1),
(7, '2021_12_09_1102410_create_manage_hotels_table', 2),
(8, '2021_12_10_102310_create_packages_table', 3),
(10, '2021_12_10_054054_create_room_categories_table', 5),
(11, '2021_12_13_093319_create_countries_table', 6),
(12, '2021_12_14_071705_create_states_table', 7),
(13, '2021_12_14_120922_create_cities_table', 8),
(14, '2021_12_13_045913_create_bookings_table', 9),
(16, '2021_12_16_055337_create_notifications_table', 10),
(17, '2022_01_04_105233_create_hotel_categories_table', 11),
(18, '2022_01_06_103311_create_offers_table', 12),
(19, '2022_01_11_062849_create_amenities_table', 13),
(20, '2022_01_14_055345_create_hotelamenities_table', 14),
(21, '2022_01_20_073837_create_notificationalls_table', 15),
(22, '2022_01_24_071634_create_paymentdetails_table', 16),
(23, '2022_01_25_050421_create_adminaboutuses_table', 17),
(24, '2022_01_25_050405_create_admincontactuses_table', 18);

-- --------------------------------------------------------

--
-- Table structure for table `notificationalls`
--

CREATE TABLE `notificationalls` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `body` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` enum('all','particular') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'all',
  `userId` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `notificationalls`
--

INSERT INTO `notificationalls` (`id`, `title`, `body`, `image`, `type`, `userId`, `created_at`, `updated_at`) VALUES
(13, 'ffgfd', 'scsd', '/images/notificationall/61ea40449.jpg', 'particular', 5, '2022-01-20 23:40:28', '2022-01-20 23:40:28'),
(14, 'ffgfd', 'scsd', '/images/notificationall/61ea40449.jpg', 'particular', 5, '2022-01-20 23:40:28', '2022-01-20 23:40:28'),
(18, 'testing', 'testing', '/images/notificationall/61ea69e71.jpg', 'all', NULL, '2022-01-21 02:38:07', '2022-01-21 02:38:07');

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `userId` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `body` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `offers`
--

CREATE TABLE `offers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `discount` double(8,2) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `discription` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `promo_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `created_by` bigint(20) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `offers`
--

INSERT INTO `offers` (`id`, `name`, `discount`, `start_date`, `end_date`, `image`, `discription`, `promo_code`, `status`, `created_by`, `created_at`, `updated_at`) VALUES
(4, 'offertestingadmin', 45.00, '2022-01-14', '2022-01-12', '/assets/offers/61d80b71f.png', 'dgreg', 'offertestingadmin', '0', 1, '2022-01-07 04:14:18', '2022-01-07 04:30:33'),
(6, 't', 10.00, '2022-01-20', '2022-01-28', '/assets/offers/61d836c48.jpg', '78', 't', '0', 1, '2022-01-07 07:19:08', '2022-01-24 05:00:41');

-- --------------------------------------------------------

--
-- Table structure for table `packages`
--

CREATE TABLE `packages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `package_desc` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `duration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_by` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `paymentdetails`
--

CREATE TABLE `paymentdetails` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `userId` bigint(20) UNSIGNED NOT NULL,
  `hotleId` bigint(20) UNSIGNED NOT NULL,
  `order_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `transaction_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `amount` double(8,2) NOT NULL,
  `status` enum('pending','complete','cancel') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `paymentdetails`
--

INSERT INTO `paymentdetails` (`id`, `userId`, `hotleId`, `order_id`, `transaction_id`, `amount`, `status`, `created_at`, `updated_at`) VALUES
(1, 5, 9, '000000000065852', NULL, 15120.00, 'complete', '2022-01-24 02:12:05', '2022-01-24 02:12:05'),
(2, 5, 9, '000000000082187', NULL, 13608.00, 'pending', '2022-01-24 07:33:34', '2022-01-24 07:33:34'),
(3, 5, 9, '000000000032440', '6h6fy6h', 13608.00, '', '2022-01-24 07:34:27', '2022-01-24 23:21:02'),
(5, 5, 9, '000000000047261', NULL, 13608.00, 'pending', '2022-01-25 04:34:24', '2022-01-25 04:34:24'),
(6, 5, 9, '000000000071292', NULL, 13608.00, 'pending', '2022-01-25 07:59:36', '2022-01-25 07:59:36'),
(7, 5, 9, '000000000049178', NULL, 13608.00, 'pending', '2022-01-28 04:04:52', '2022-01-28 04:04:52');

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `personal_access_tokens`
--

INSERT INTO `personal_access_tokens` (`id`, `tokenable_type`, `tokenable_id`, `name`, `token`, `abilities`, `last_used_at`, `created_at`, `updated_at`) VALUES
(1, 'App\\Models\\User', 4, 'token', '6bad8543ec29e52d6a67dbbd77943778c13fc5458f956a999337c396ba54932e', '[\"*\"]', '2022-01-17 07:51:55', '2022-01-17 07:41:54', '2022-01-17 07:51:55'),
(2, 'App\\Models\\User', 5, 'token', '0d2b7e30e62a85a06c1de74686765fb6f3a177ee775f332dfc3f2249fbdb976e', '[\"*\"]', '2022-01-18 02:34:34', '2022-01-17 23:59:40', '2022-01-18 02:34:34'),
(3, 'App\\Models\\User', 5, 'token', '332ae2f1c4c5804734cda836448584d741c4de104ca984f67af77b0320673e2f', '[\"*\"]', NULL, '2022-01-18 00:42:33', '2022-01-18 00:42:33'),
(4, 'App\\Models\\User', 5, 'token', '219c050376ee17f6112294a9e553d1105fa1f596f6240e78c81711483aaeac01', '[\"*\"]', '2022-01-19 00:24:09', '2022-01-19 00:05:59', '2022-01-19 00:24:09'),
(5, 'App\\Models\\User', 5, 'token', 'be057c30af26427cb749f6393c762fb955ab529635f46e74f693c03ca13a863c', '[\"*\"]', '2022-01-19 03:24:39', '2022-01-19 02:59:33', '2022-01-19 03:24:39'),
(6, 'App\\Models\\User', 5, 'token', 'd4715aaa89f08e56de264e5297f5732d4fb27e7823b1883f6ed8aaef6ebe6987', '[\"*\"]', '2022-01-19 03:59:23', '2022-01-19 03:32:29', '2022-01-19 03:59:23'),
(7, 'App\\Models\\User', 5, 'token', '4b9ada2dd0d74ddd7a0049cbbe46bb1355fe9ac1c42aad5371abbeedf1303513', '[\"*\"]', '2022-01-20 01:53:21', '2022-01-19 23:49:39', '2022-01-20 01:53:21'),
(8, 'App\\Models\\User', 5, 'token', '7588bfd0c1a9ac3b1dc84e8de95ae2f98716f25c56b1a7853d1ad15ac5c381cc', '[\"*\"]', NULL, '2022-01-21 00:15:45', '2022-01-21 00:15:45'),
(9, 'App\\Models\\User', 5, 'token', 'd4e70b336a95e6118a2ecfa9ee7b19b3f4caf80076149a49daf9393efbd0988f', '[\"*\"]', '2022-01-21 00:36:45', '2022-01-21 00:30:56', '2022-01-21 00:36:45'),
(10, 'App\\Models\\User', 5, 'token', '1308577b83be2a795f5b0f79657a5cba16be7c8f41a4062fd1f028f95c65e87d', '[\"*\"]', '2022-01-24 01:19:07', '2022-01-21 00:37:16', '2022-01-24 01:19:07'),
(11, 'App\\Models\\User', 5, 'token', 'f1a7fe7b154888d2665df25600a6d64f39318a43dd06b42b95cefeccecab9d19', '[\"*\"]', '2022-01-24 01:18:06', '2022-01-21 02:27:57', '2022-01-24 01:18:06'),
(12, 'App\\Models\\User', 5, 'token', 'b3809cbbe2d5186da04406daa8daa635b132d178e66f830bafb481e3c6275126', '[\"*\"]', '2022-01-24 01:21:03', '2022-01-24 01:18:42', '2022-01-24 01:21:03'),
(13, 'App\\Models\\User', 5, 'token', 'b6edd4a0e7838fbc00ec354640477b70cc13fdcaa1917409dabef3de82c80e01', '[\"*\"]', '2022-01-24 02:42:05', '2022-01-24 01:42:54', '2022-01-24 02:42:05'),
(14, 'App\\Models\\User', 5, 'token', '2d7f5cf71f09d4cc4e17dd9c831a87b258a48ce683ca1549da65d3d47555ab39', '[\"*\"]', '2022-01-24 23:21:01', '2022-01-24 07:05:52', '2022-01-24 23:21:01'),
(15, 'App\\Models\\User', 5, 'token', '95eba35357fb8097d9d2dabf4291a48037df143be49afd1aea485046b9aba033', '[\"*\"]', '2022-01-25 04:34:54', '2022-01-25 00:15:51', '2022-01-25 04:34:54'),
(16, 'App\\Models\\User', 5, 'token', 'ffab8ae4a8ca5865343380b99ae857e96098d413f3e2776a83d30a27876a9c3f', '[\"*\"]', '2022-01-25 08:04:55', '2022-01-25 07:57:06', '2022-01-25 08:04:55'),
(17, 'App\\Models\\User', 5, 'token', '7d0b908f51c01a8f3f0f92b9477ebf223eb414d956de3aca4a4472e9a18b4880', '[\"*\"]', NULL, '2022-01-27 23:50:09', '2022-01-27 23:50:09'),
(18, 'App\\Models\\User', 5, 'token', '4362e09186887520208425db389ee9fe06eaa85ba023f53b0b23587f3528c234', '[\"*\"]', NULL, '2022-01-27 23:50:54', '2022-01-27 23:50:54'),
(19, 'App\\Models\\User', 5, 'token', 'dbaad216d738c239d10721ff270056b1145ca61692cddbc0756ec25059b65d9c', '[\"*\"]', NULL, '2022-01-27 23:51:30', '2022-01-27 23:51:30'),
(20, 'App\\Models\\User', 5, 'token', '7fd0ac231c34d19b0c7c6e2359fb44bad381190fd87c80eccc8dddd6511d1001', '[\"*\"]', '2022-01-28 04:08:12', '2022-01-28 03:58:08', '2022-01-28 04:08:12');

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) DEFAULT NULL,
  `hotel_id` bigint(20) DEFAULT NULL,
  `point` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`id`, `user_id`, `hotel_id`, `point`, `description`, `status`, `created_at`, `updated_at`) VALUES
(6, 5, 9, '5', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has', '1', '2022-01-18 01:28:18', '2022-01-18 10:38:41'),
(7, 5, 9, '4.5', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has', '1', '2022-01-18 01:29:17', '2022-01-18 10:38:46'),
(8, 5, 9, '3', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has', '1', '2022-01-18 01:29:17', '2022-01-18 10:38:49');

-- --------------------------------------------------------

--
-- Table structure for table `rooms`
--

CREATE TABLE `rooms` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `room_no` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `offered_price` double(8,2) DEFAULT NULL,
  `original_price` double(8,2) DEFAULT NULL,
  `video` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `extra` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by` bigint(20) UNSIGNED DEFAULT NULL,
  `room_type` enum('luxury','deluxe') COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `booking_status` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `rooms`
--

INSERT INTO `rooms` (`id`, `room_no`, `image`, `description`, `offered_price`, `original_price`, `video`, `extra`, `created_by`, `room_type`, `status`, `booking_status`, `created_at`, `updated_at`) VALUES
(1, 'A01', 'webadmin/room/61b748dcb.png', 'New Rooms', NULL, NULL, NULL, '', 1, 'luxury', '1', '0', '2021-12-13 07:51:32', '2021-12-13 07:51:40'),
(2, 'A01', 'webadmin/room/61b817e94.png', 'New Test', NULL, NULL, NULL, '', 2, 'deluxe', '1', '0', '2021-12-13 22:34:57', '2021-12-13 22:35:07'),
(3, 'A001', 'webadmin/room/61b9b0b0d.png', 'New Room', NULL, NULL, NULL, '', 3, 'deluxe', '1', '0', '2021-12-15 03:39:04', '2021-12-15 04:29:21'),
(4, 'A002', '[\"\\/webadmin\\/room\\/163956502461b9c6e0caf1d.png\"]', 'Room size 343 mm', NULL, NULL, NULL, '', 3, 'luxury', '1', '0', '2021-12-15 03:56:59', '2021-12-15 05:13:44'),
(5, 'A34', 'webadmin/room/61bb3a8d5.jpg', 'zdk;jfnxkjvndjgfndljbg', NULL, NULL, 'C:\\xampp\\tmp\\php64AA.tmp', '[\"spa\",\"interconnect rooms\",\"bar\"]', 2, 'luxury', '1', '0', '2021-12-16 07:39:33', '2021-12-20 04:43:14'),
(6, 'A13', 'webadmin/room/61c0571a3.jpg', 'Description', NULL, NULL, NULL, '[\"spa\",\"wifi\",\"open Restaurent\",\"car parking\",\"swiming pool\",\"interconnect rooms\",\"multilingual staff\",\"club\",\"bar\",\"delicious food\",\"childcare options\",\"laundry bags\"]', 2, 'deluxe', '1', '0', '2021-12-20 04:42:42', '2021-12-20 04:43:10'),
(7, '1234', 'webadmin/room/61d413b1b.jpg', 'cghf', NULL, NULL, NULL, '[\"spa\",\"car parking\"]', 2, 'luxury', '1', '0', '2022-01-04 04:00:25', '2022-01-04 04:01:02'),
(8, '1', 'webadmin/room/61d41a7ab.jpg', 'room testing', NULL, NULL, NULL, '[\"spa\",\"wifi\",\"open Restaurent\",\"car parking\",\"swiming pool\",\"interconnect rooms\",\"multilingual staff\",\"club\",\"bar\",\"delicious food\",\"childcare options\",\"laundry bags\"]', 6, 'luxury', '0', '0', '2022-01-04 04:29:22', '2022-01-04 04:29:22'),
(9, '1', 'webadmin/room/61d447536.jpg', 'cc', NULL, NULL, NULL, '[\"spa\",\"laundry bags\"]', 6, 'deluxe', '0', '0', '2022-01-04 07:40:43', '2022-01-04 07:40:43'),
(10, '3', '', 'super lukury', 3000.00, 1000.00, NULL, '[\"spa\",\"delicious food\"]', 6, 'deluxe', '0', '0', '2022-01-04 07:45:06', '2022-01-04 07:53:38');

-- --------------------------------------------------------

--
-- Table structure for table `rooms_images`
--

CREATE TABLE `rooms_images` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `room_id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image_url` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `rooms_images`
--

INSERT INTO `rooms_images` (`id`, `room_id`, `title`, `image_url`, `created_at`, `updated_at`) VALUES
(1, 6, 'dfgfg', '/webadmin/room/163957404961b9ea21ece5b.jpg', '2021-12-15 07:44:09', '2021-12-15 07:44:09'),
(2, 6, 'Walss', '/webadmin/room/163963203361bacca1c46f6.jpg', '2021-12-15 23:50:33', '2021-12-15 23:50:33'),
(3, 6, 'hello bunny', '/webadmin/room/163963203361bacca1c7f94.jpg', '2021-12-15 23:50:33', '2021-12-15 23:50:33'),
(4, 6, 'dwqd', '/webadmin/room/163963207861baccce3d2cf.jpg', '2021-12-15 23:51:18', '2021-12-15 23:51:18'),
(6, 5, 'fggrf', '/webadmin/room/163963541861bad9daa6c2e.jpg', '2021-12-16 00:46:58', '2021-12-16 00:46:58'),
(7, 5, 'trh', '/webadmin/room/163963541861bad9daa9b42.jpg', '2021-12-16 00:46:58', '2021-12-16 00:46:58'),
(8, 5, 'dfedf', '/webadmin/room/163963731761bae145a51fe.jpg', '2021-12-16 01:18:37', '2021-12-16 01:18:37'),
(9, 5, 'efwfwfe', '/webadmin/room/163963732861bae150e5568.jpg', '2021-12-16 01:18:48', '2021-12-16 01:18:48'),
(10, 5, 'fewf', '/webadmin/room/163963739461bae1928fa50.jpg', '2021-12-16 01:19:54', '2021-12-16 01:19:54'),
(11, 8, 'title 1', '/webadmin/room/164129046061d41adce9f6c.jpg', '2022-01-04 04:31:00', '2022-01-04 04:31:00'),
(12, 8, 'title 2', '/webadmin/room/164129046161d41add0ef83.jpg', '2022-01-04 04:31:01', '2022-01-04 04:31:01'),
(13, 8, '5', '/webadmin/room/164129055461d41b3a6e9c1.jpg', '2022-01-04 04:32:34', '2022-01-04 04:32:34'),
(14, 8, '5', '/webadmin/room/164129055461d41b3a87456.jpg', '2022-01-04 04:32:34', '2022-01-04 04:32:34');

-- --------------------------------------------------------

--
-- Table structure for table `rooms_videos`
--

CREATE TABLE `rooms_videos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `room_id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `video_url` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `rooms_videos`
--

INSERT INTO `rooms_videos` (`id`, `room_id`, `title`, `video_url`, `created_at`, `updated_at`) VALUES
(1, 6, 'sadfadg', '/webadmin/room/video/163957322961b9e6ed56d64.mp4', '2021-12-15 07:30:29', '2021-12-15 07:30:29'),
(3, 6, 'regreg', '/webadmin/room/video/163957322961b9e6ed5e36d.mp4', '2021-12-15 07:30:29', '2021-12-15 07:30:29'),
(4, 6, 'Room Inner View', '/webadmin/room/video/163963122961bac97d1b574.mp4', '2021-12-15 23:37:09', '2021-12-15 23:37:09'),
(5, 6, 'Room Side view', '/webadmin/room/video/163963122961bac97d25f07.mp4', '2021-12-15 23:37:09', '2021-12-15 23:37:09'),
(6, 5, 'fefe', '/webadmin/room/video/163963537561bad9af546ff.mp4', '2021-12-16 00:46:15', '2021-12-16 00:46:15'),
(7, 5, 'rewtew', '/webadmin/room/video/163963537561bad9af58dfe.mp4', '2021-12-16 00:46:15', '2021-12-16 00:46:15');

-- --------------------------------------------------------

--
-- Table structure for table `room_categories`
--

CREATE TABLE `room_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `discription` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_by` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `room_categories`
--

INSERT INTO `room_categories` (`id`, `name`, `status`, `discription`, `created_by`, `created_at`, `updated_at`) VALUES
(2, 'King', '1', 'King', 1, '2021-12-13 23:13:54', '2021-12-20 02:32:29'),
(3, 'Queen', '1', 'Queen', 1, '2021-12-13 23:14:06', '2022-01-04 06:43:42');

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `hotel_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `videos` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by` bigint(20) UNSIGNED NOT NULL,
  `status` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `type` enum('image','videos') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'image',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `hotel_id`, `image`, `videos`, `created_by`, `status`, `type`, `created_at`, `updated_at`) VALUES
(50, '9', 'webadmin/setting/image/164239251661e4ebc44425c.jpg', NULL, 9, '0', 'image', '2022-01-16 22:38:36', '2022-01-16 22:38:36'),
(52, '9', 'webadmin/setting/image/164239771061e5000e6ab7d.jpg', NULL, 9, '1', 'image', '2022-01-17 00:05:10', '2022-01-17 00:05:10'),
(53, '9', 'webadmin/setting/image/164239880161e50451a3311.jpg', NULL, 9, '1', 'image', '2022-01-17 00:23:21', '2022-01-17 00:23:21'),
(55, '9', NULL, 'webadmin/setting/video/164239939361e506a1d057a.mp4', 9, '1', 'videos', '2022-01-17 00:33:13', '2022-01-17 00:33:13'),
(56, '9', NULL, 'webadmin/setting/video/164239982561e5085178dd6.mp4', 9, '1', 'videos', '2022-01-17 00:40:25', '2022-01-17 00:40:25');

-- --------------------------------------------------------

--
-- Table structure for table `states`
--

CREATE TABLE `states` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `countries_id` bigint(20) UNSIGNED NOT NULL,
  `state` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('1','0') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `states`
--

INSERT INTO `states` (`id`, `countries_id`, `state`, `image`, `status`, `created_at`, `updated_at`) VALUES
(2, 1, 'Uttar Pradesh', '', '1', '2021-12-14 03:52:28', '2021-12-14 04:39:20'),
(3, 1, 'New Delhi', '', '1', '2021-12-14 04:47:04', '2021-12-14 23:55:34'),
(6, 4, 'yorkshire', '', '1', '2021-12-20 06:06:47', '2021-12-20 06:06:47'),
(7, 5, 'indiana', '', '1', '2021-12-20 06:07:01', '2021-12-20 06:07:01'),
(8, 4, 'east london', '', '1', '2021-12-20 06:07:24', '2021-12-20 06:07:24'),
(9, 5, 'Washingtown D.C.', '', '1', '2021-12-20 06:08:34', '2021-12-20 06:08:34'),
(10, 1, 'Arunachal Pradesh', '', '1', '2021-12-20 06:09:24', '2021-12-20 06:09:24'),
(11, 1, 'meghalaya', '/images/city/61e584daa.jpg', '1', '2021-12-20 06:09:40', '2022-01-17 09:31:46'),
(12, 1, 'madhya pradesh', '/images/state/61e585194.jpg', '1', '2021-12-20 06:10:01', '2022-01-17 09:32:49'),
(14, 1, 'roletr', '/images/state/61e585091.jpg', '1', '2022-01-17 09:28:25', '2022-01-17 09:32:33');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gender` enum('male','female') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'male',
  `dob` date DEFAULT NULL,
  `profile_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cover_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` bigint(20) DEFAULT NULL,
  `status` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `forgetopt` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fcm_token` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `gender`, `dob`, `profile_image`, `cover_image`, `phone`, `status`, `forgetopt`, `fcm_token`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'testind', 'testind@gmail.com', NULL, 'sssss', 'male', '2022-01-12', 'webadmin/room/61d447536.jpg', 'webadmin/room/61d447536.jpg', 909293844, '1', NULL, NULL, NULL, NULL, '2022-01-09 23:42:22'),
(3, 'testind', 'testind1@gmail.com', NULL, 'sssss', 'female', '2022-01-12', 'webadmin/room/61d447536.jpg', 'webadmin/room/61d447536.jpg', 909093844, '0', NULL, NULL, NULL, NULL, '2022-01-09 23:50:06'),
(4, 'abc', 'jhgdhgdvhf@gmail.com', NULL, '$2y$10$J1IMoUMrZQ3qmawtLppd1eBL1jVriIml4tD26Gs7iDZm2IOzPQOK2', 'male', '2020-01-11', NULL, NULL, 8525653985, '1', NULL, NULL, NULL, '2022-01-17 07:41:28', '2022-01-17 07:46:54'),
(5, 'abc', 'alam@gmail.com', NULL, '$2y$10$jl6TU2yuBc90GiqD5OpDGOJwNAnfIPdeCgbWBJN12aeN0Tr6ZgCEO', 'female', '2020-01-11', 'webadmin/setting/image/164239251661e4ebc44425c.jpg', '/profile/61e66e707s.jpg', 8525653985, '1', NULL, 'hfghfghfghfhghfghfghfhf', NULL, '2022-01-17 23:59:19', '2022-01-28 03:58:08'),
(6, 'alam', 'alam2@gmail.com', NULL, '$2y$10$yStIzsQFv12t7ywIkmbX4eT/7Ibm2pvQRqDgcmE.kPlD6hB/xn5pC', 'male', NULL, NULL, NULL, 8178892779, '1', '502305', NULL, NULL, '2022-01-20 01:09:13', '2022-01-27 06:15:59');

-- --------------------------------------------------------

--
-- Table structure for table `web_admins`
--

CREATE TABLE `web_admins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `wishlists`
--

CREATE TABLE `wishlists` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `hotel_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `wishlists`
--

INSERT INTO `wishlists` (`id`, `user_id`, `hotel_id`, `created_at`, `updated_at`) VALUES
(1, 11, 3, '2022-01-10 02:08:50', '2022-01-10 02:08:50'),
(2, 11, 3, '2022-01-10 02:09:30', '2022-01-10 02:09:30'),
(3, 11, 3, '2022-01-10 02:10:00', '2022-01-10 02:10:00'),
(4, 5, 10, '2022-01-10 02:10:20', '2022-01-10 02:10:20'),
(5, 5, 9, '2022-01-10 02:10:37', '2022-01-10 02:10:37');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `activities`
--
ALTER TABLE `activities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `adminaboutuses`
--
ALTER TABLE `adminaboutuses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admincontactuses`
--
ALTER TABLE `admincontactuses`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admincontactuses_email_unique` (`email`);

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admins_email_unique` (`email`);

--
-- Indexes for table `amenities`
--
ALTER TABLE `amenities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bookings`
--
ALTER TABLE `bookings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `bookings_hotel_id_foreign` (`hotel_id`),
  ADD KEY `bookings_cities_id_foreign` (`cities_id`),
  ADD KEY `bookings_state_id_foreign` (`state_id`),
  ADD KEY `bookings_countries_id_foreign` (`countries_id`),
  ADD KEY `bookings_room_id_foreign` (`room_id`),
  ADD KEY `bookings_created_by_foreign` (`created_by`),
  ADD KEY `userid` (`user_id`);

--
-- Indexes for table `cities`
--
ALTER TABLE `cities`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cities_countries_foreign` (`countries`),
  ADD KEY `cities_state_id_foreign` (`state_id`);

--
-- Indexes for table `countries`
--
ALTER TABLE `countries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `hotelamenities`
--
ALTER TABLE `hotelamenities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hotel_categories`
--
ALTER TABLE `hotel_categories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `hotel_categories_created_by_foreign` (`created_by`);

--
-- Indexes for table `manage_hotels`
--
ALTER TABLE `manage_hotels`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notificationalls`
--
ALTER TABLE `notificationalls`
  ADD PRIMARY KEY (`id`),
  ADD KEY `notificationalls_userid_foreign` (`userId`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `notifications_userid_foreign` (`userId`);

--
-- Indexes for table `offers`
--
ALTER TABLE `offers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `packages`
--
ALTER TABLE `packages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `packages_created_by_foreign` (`created_by`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `paymentdetails`
--
ALTER TABLE `paymentdetails`
  ADD PRIMARY KEY (`id`),
  ADD KEY `paymentdetails_userid_foreign` (`userId`),
  ADD KEY `paymentdetails_hotleid_foreign` (`hotleId`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rooms`
--
ALTER TABLE `rooms`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rooms_images`
--
ALTER TABLE `rooms_images`
  ADD PRIMARY KEY (`id`),
  ADD KEY `rooms_images_room_id_foreign` (`room_id`);

--
-- Indexes for table `rooms_videos`
--
ALTER TABLE `rooms_videos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `rooms_videos_room_id_foreign` (`room_id`);

--
-- Indexes for table `room_categories`
--
ALTER TABLE `room_categories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `room_categories_created_by_foreign` (`created_by`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `states`
--
ALTER TABLE `states`
  ADD PRIMARY KEY (`id`),
  ADD KEY `states_countries_id_foreign` (`countries_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `web_admins`
--
ALTER TABLE `web_admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `web_admins_email_unique` (`email`);

--
-- Indexes for table `wishlists`
--
ALTER TABLE `wishlists`
  ADD PRIMARY KEY (`id`),
  ADD KEY `wishlists_user_id_foreign` (`user_id`),
  ADD KEY `wishlists_hotel_id_foreign` (`hotel_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `activities`
--
ALTER TABLE `activities`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=399;

--
-- AUTO_INCREMENT for table `adminaboutuses`
--
ALTER TABLE `adminaboutuses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `admincontactuses`
--
ALTER TABLE `admincontactuses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `amenities`
--
ALTER TABLE `amenities`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `bookings`
--
ALTER TABLE `bookings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `cities`
--
ALTER TABLE `cities`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `countries`
--
ALTER TABLE `countries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `hotelamenities`
--
ALTER TABLE `hotelamenities`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `hotel_categories`
--
ALTER TABLE `hotel_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `manage_hotels`
--
ALTER TABLE `manage_hotels`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `notificationalls`
--
ALTER TABLE `notificationalls`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `offers`
--
ALTER TABLE `offers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `packages`
--
ALTER TABLE `packages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `paymentdetails`
--
ALTER TABLE `paymentdetails`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `rooms`
--
ALTER TABLE `rooms`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `rooms_images`
--
ALTER TABLE `rooms_images`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `rooms_videos`
--
ALTER TABLE `rooms_videos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `room_categories`
--
ALTER TABLE `room_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT for table `states`
--
ALTER TABLE `states`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `web_admins`
--
ALTER TABLE `web_admins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `wishlists`
--
ALTER TABLE `wishlists`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bookings`
--
ALTER TABLE `bookings`
  ADD CONSTRAINT `bookings_cities_id_foreign` FOREIGN KEY (`cities_id`) REFERENCES `cities` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `bookings_countries_id_foreign` FOREIGN KEY (`countries_id`) REFERENCES `countries` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `bookings_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `manage_hotels` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `bookings_hotel_id_foreign` FOREIGN KEY (`hotel_id`) REFERENCES `manage_hotels` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `bookings_room_id_foreign` FOREIGN KEY (`room_id`) REFERENCES `rooms` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `bookings_state_id_foreign` FOREIGN KEY (`state_id`) REFERENCES `states` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `userid` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `cities`
--
ALTER TABLE `cities`
  ADD CONSTRAINT `cities_countries_foreign` FOREIGN KEY (`countries`) REFERENCES `countries` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `cities_state_id_foreign` FOREIGN KEY (`state_id`) REFERENCES `states` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `hotel_categories`
--
ALTER TABLE `hotel_categories`
  ADD CONSTRAINT `hotel_categories_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `admins` (`id`);

--
-- Constraints for table `notificationalls`
--
ALTER TABLE `notificationalls`
  ADD CONSTRAINT `notificationalls_userid_foreign` FOREIGN KEY (`userId`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `notifications`
--
ALTER TABLE `notifications`
  ADD CONSTRAINT `notifications_userid_foreign` FOREIGN KEY (`userId`) REFERENCES `bookings` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `packages`
--
ALTER TABLE `packages`
  ADD CONSTRAINT `packages_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `manage_hotels` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `paymentdetails`
--
ALTER TABLE `paymentdetails`
  ADD CONSTRAINT `paymentdetails_hotleid_foreign` FOREIGN KEY (`hotleId`) REFERENCES `manage_hotels` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `paymentdetails_userid_foreign` FOREIGN KEY (`userId`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
