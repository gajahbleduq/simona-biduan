-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 27, 2023 at 11:37 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `commist`
--

-- --------------------------------------------------------

--
-- Table structure for table `t_instansi`
--

CREATE TABLE `t_instansi` (
  `id` int(11) NOT NULL,
  `instansi` varchar(250) DEFAULT NULL,
  `type` int(11) DEFAULT NULL COMMENT '1: kementerian, 2: deputi',
  `created_at` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `deleted_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `t_instansi`
--

INSERT INTO `t_instansi` (`id`, `instansi`, `type`, `created_at`, `created_by`, `updated_at`, `updated_by`, `deleted_at`, `deleted_by`) VALUES
(1, 'Kementerian Dalam Negeri', 1, '2023-09-20 20:24:51', NULL, NULL, NULL, NULL, NULL),
(2, 'Kementerian Luar Negeri', 1, '2023-09-24 13:28:50', 1, NULL, NULL, NULL, NULL),
(3, 'Kementerian Pertahanan', 1, NULL, NULL, NULL, NULL, NULL, NULL),
(4, 'Kementerian Hukum dan HAM', 1, NULL, NULL, NULL, NULL, NULL, NULL),
(5, 'Kementerian Komunikasi dan Informatika', 1, NULL, NULL, NULL, NULL, NULL, NULL),
(6, 'Kementerian PAN RB', 1, NULL, NULL, NULL, NULL, NULL, NULL),
(7, 'Kejaksaan Agung', 1, NULL, NULL, NULL, NULL, NULL, NULL),
(8, 'TNI', 1, NULL, NULL, NULL, NULL, NULL, NULL),
(9, 'POLRI', 1, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `t_report`
--

CREATE TABLE `t_report` (
  `id` int(11) NOT NULL,
  `no_ticket` varchar(15) DEFAULT NULL,
  `title` varchar(500) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `date` datetime DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `deleted_by` int(11) DEFAULT NULL,
  `is_finished` tinyint(4) DEFAULT 0,
  `finished_at` datetime DEFAULT NULL,
  `finished_by` int(11) DEFAULT NULL,
  `followed_up_to` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `t_report`
--

INSERT INTO `t_report` (`id`, `no_ticket`, `title`, `description`, `date`, `status`, `created_at`, `created_by`, `updated_at`, `updated_by`, `deleted_at`, `deleted_by`, `is_finished`, `finished_at`, `finished_by`, `followed_up_to`) VALUES
(1, '20230908021', 'Test Laporan', 'Test Laporan', '2023-09-08 00:00:00', 1, '2023-09-08 04:52:21', 2, '2023-09-08 04:52:21', NULL, NULL, NULL, 0, NULL, NULL, NULL),
(2, '202309121725372', 'Test Laporan 2', 'Test Laporan 2', '2023-09-12 12:00:00', 1, '2023-09-12 17:25:37', 2, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL),
(3, '2023091423', 'Laporan 3', 'Test Laporan 3', '2023-09-01 09:00:00', 1, '2023-09-14 06:20:04', 2, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL),
(4, '2023091424', 'Laporan 3', 'Test Laporan 3', '2023-09-01 09:00:00', 1, '2023-09-14 06:23:45', 2, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL),
(5, '2023091425', 'Laporan 3', 'Test Laporan 3', '2023-09-01 09:00:00', 1, '2023-09-14 06:24:22', 2, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL),
(6, '2023091426', 'Laporan 6', 'Laporan 6', '2023-09-01 12:00:00', 1, '2023-09-14 06:30:27', 2, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL),
(7, '2023091427', 'Laporan 7', 'Laporan 7', '2023-09-02 12:00:00', 1, '2023-09-14 06:33:01', 2, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL),
(8, '2023091428', 'Laporan 8', '', NULL, 3, '2023-09-14 06:39:48', 2, '2023-09-24 21:15:16', 1, NULL, NULL, 1, '2023-09-24 21:15:16', 1, NULL),
(9, '2023091429', 'Laporan 10', 'Test Laporan 10 Nih', '2023-09-01 12:00:00', 2, '2023-09-14 07:24:45', 2, '2023-09-24 21:15:00', 1, NULL, NULL, 0, NULL, NULL, NULL),
(10, '20230914210', 'Laporan tanpa file', 'Laporan tanpa file', '2023-09-01 12:00:00', 3, '2023-09-14 07:30:22', 2, '2023-09-20 22:08:50', 1, NULL, NULL, 1, '2023-09-20 22:08:50', 1, NULL),
(11, '20230914211', 'Laporan 11 edited', 'Ini adalah laporan 11', '2023-09-04 14:30:00', 7, '2023-09-14 21:51:17', 2, '2023-09-24 21:19:28', 3, NULL, NULL, 1, '2023-09-24 21:19:28', 3, 1),
(12, '20230914212', 'Laporan 12 Tanpa File edited updated ubah 2', 'Laporan 12 Tanpa File', '2023-09-09 15:05:00', 2, '2023-09-14 21:58:05', 2, '2023-09-24 14:31:24', 1, NULL, NULL, 0, NULL, NULL, NULL),
(13, '20230915213', 'Laporan 13 Tanpa judul file', 'Laporan 13', '2023-09-15 16:15:00', 4, '2023-09-15 16:15:59', 2, '2023-09-17 21:25:03', 1, NULL, NULL, 1, '2023-09-22 06:06:58', 1, NULL),
(14, '20230915214', 'Laporan 14', 'Laporan 14 Laporan 14', '2023-09-15 20:53:00', 6, '2023-09-15 20:53:16', 2, '2023-09-22 06:15:52', 1, NULL, NULL, 0, NULL, NULL, NULL),
(15, '20230915215', 'Laporan 14 Tanpa File', 'Laporan 14 Tanpa File', '2023-09-15 20:54:00', 7, '2023-09-15 20:54:33', 2, '2023-09-17 21:14:45', 1, NULL, NULL, 0, NULL, NULL, NULL),
(16, '20230915216', 'Laporan Malam Tanpa File edited', 'Laporan Malam Tanpa File edited', '2023-09-15 21:56:00', 3, '2023-09-15 21:56:04', 2, '2023-09-17 03:08:43', 1, NULL, NULL, 1, '2023-09-20 22:07:37', 1, NULL),
(17, '20230915217', 'Laporan Malam dengan File edited', 'Laporan Malam dengan File', '2023-09-15 21:56:00', 7, '2023-09-15 21:57:01', 2, '2023-09-17 04:02:04', 1, NULL, NULL, 0, NULL, NULL, NULL),
(18, '20230922218', 'Laporan 22 Sept', 'Laporan 22 Sept adalah lorem ipsum', '2023-09-22 21:55:00', 5, '2023-09-22 21:55:51', 2, '2023-09-24 13:42:51', 1, NULL, NULL, 0, NULL, NULL, NULL),
(19, '2023092719', 'dadas', 'dsad', '2023-09-27 14:25:00', 1, '2023-09-27 14:27:25', NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `t_report_file`
--

CREATE TABLE `t_report_file` (
  `id` int(11) NOT NULL,
  `report_log_id` int(11) DEFAULT NULL,
  `type` varchar(500) DEFAULT NULL,
  `file_name` varchar(500) DEFAULT NULL,
  `path` varchar(500) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `deleted_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `t_report_file`
--

INSERT INTO `t_report_file` (`id`, `report_log_id`, `type`, `file_name`, `path`, `created_at`, `created_by`, `deleted_at`, `deleted_by`) VALUES
(9, 7, 'image', 'Gambar 1', 'http://localhost/commist/assets/images/file_2_7_20230914063301_0.png', '2023-09-14 06:33:01', 2, NULL, NULL),
(10, 7, 'image', 'Gambar 2', 'http://localhost/commist/assets/images/file_2_7_20230914063301_1.png', '2023-09-14 06:33:01', 2, NULL, NULL),
(11, 7, 'file', 'File PDF 1', 'http://localhost/commist/assets/files/file_2_7_20230914063301_2.pdf', '2023-09-14 06:33:01', 2, NULL, NULL),
(12, 8, 'file', '1', 'http://localhost/commist/assets/files/file_2_8_20230914063948_0.pdf', '2023-09-14 06:39:48', 2, NULL, NULL),
(13, 9, 'image', 'File 1', 'http://localhost/commist/assets/images/file_2_9_20230914072445_0.webp', '2023-09-14 07:24:45', 2, NULL, NULL),
(14, 9, 'file', 'File 2 PDF', 'http://localhost/commist/assets/files/file_2_9_20230914072445_1.pdf', '2023-09-14 07:24:45', 2, NULL, NULL),
(15, 11, 'image', 'File Gambar', 'http://localhost/commist/assets/images/file_2_11_20230914215118_0.png', '2023-09-14 21:51:18', 2, NULL, NULL),
(16, 11, 'file', 'File PDF', 'http://localhost/commist/assets/files/file_2_11_20230914215118_1.pdf', '2023-09-14 21:51:18', 2, NULL, NULL),
(17, 13, 'file', '', 'http://localhost/commist/assets/files/file_2_13_20230915161559_0.pdf', '2023-09-15 16:15:59', 2, NULL, NULL),
(18, 11, 'image', 'File Gambar 2', 'http://localhost/commist/assets/images/file_2_11_20230914215118_0.png', '2023-09-14 21:51:18', 2, '2023-09-15 21:40:35', 2),
(19, 14, 'image', 'Gambar Laporan 14', 'http://localhost/commist/assets/images/file_2_14_20230915205316_0.png', '2023-09-15 20:53:16', 2, NULL, NULL),
(20, 14, 'file', 'File Laporan 14', 'http://localhost/commist/assets/files/file_2_14_20230915205316_1.pdf', '2023-09-15 20:53:16', 2, NULL, NULL),
(21, 11, 'file', 'File PDF 2', 'http://localhost/commist/assets/files/file_2_20230915210726_0.pdf', '2023-09-15 21:07:26', 2, '2023-09-15 21:40:35', 2),
(22, 11, 'image', 'File Gambar 3', 'http://localhost/commist/assets/images/file_2_20230915210726_1.png', '2023-09-15 21:07:26', 2, '2023-09-15 21:40:35', 2),
(23, 11, 'image', 'File Baru', 'http://localhost/commist/assets/images/file_2_20230915212122_0.png', '2023-09-15 21:21:22', 2, NULL, NULL),
(24, 21, 'file', 'File Malam 1', 'http://localhost/commist/assets/files/file_2_20230915215701_0.pdf', '2023-09-15 21:57:01', 2, NULL, NULL),
(25, 21, 'image', 'Gambar Malam 1', 'http://localhost/commist/assets/images/file_2_20230915215701_1.jpg', '2023-09-15 21:57:01', 2, '2023-09-15 21:57:42', 2),
(26, 21, 'image', 'Gambar Malam 2', 'http://localhost/commist/assets/images/file_2_20230915215724_0.webp', '2023-09-15 21:57:24', 2, NULL, NULL),
(27, 21, 'image', 'Gambar Malam 3', 'http://localhost/commist/assets/images/file_2_20230915215742_0.webp', '2023-09-15 21:57:42', 2, NULL, NULL),
(30, 26, 'file', 'File 1', 'http://localhost/commist/assets/files/file_1_20230917030843_0.pdf', '2023-09-17 03:08:43', 1, NULL, NULL),
(31, 26, 'image', 'Gambar 1', 'http://localhost/commist/assets/images/file_1_20230917030843_1.png', '2023-09-17 03:08:43', 1, NULL, NULL),
(32, 29, 'image', 'Gambar 1', 'http://localhost/commist/assets/images/file_1_20230917034919_0.png', '2023-09-17 03:49:19', 1, NULL, NULL),
(33, 30, 'image', 'Gambar 1', 'http://localhost/commist/assets/images/file_1_20230917035634_0.png', '2023-09-17 03:56:34', 1, NULL, NULL),
(34, 30, 'file', 'Berkas 1', 'http://localhost/commist/assets/files/file_1_20230917035634_1.pdf', '2023-09-17 03:56:34', 1, NULL, NULL),
(35, 31, 'file', 'Berkas', 'http://localhost/commist/assets/files/file_1_20230917040204_0.pdf', '2023-09-17 04:02:04', 1, NULL, NULL),
(36, 34, 'image', 'gambar 1', 'http://localhost/commist/assets/images/file_1_20230917211327_0.webp', '2023-09-17 21:13:27', 1, NULL, NULL),
(37, 45, 'image', 'Gambar 1', 'http://localhost/commist/assets/images/file_1_20230922061552_0.png', '2023-09-22 06:15:52', 1, NULL, NULL),
(38, 46, 'image', 'Image', 'http://localhost/commist/assets/images/file_1_20230922212937_0.png', '2023-09-22 21:29:37', 1, NULL, NULL),
(39, 46, 'file', 'File', 'http://localhost/commist/assets/files/file_1_20230922212937_1.pdf', '2023-09-22 21:29:37', 1, NULL, NULL),
(40, 47, 'image', 'Gambar 1', 'http://localhost/commist/assets/images/file_2_20230922215550_0.webp', '2023-09-22 21:55:51', 2, NULL, NULL),
(41, 47, 'image', 'Gambar 2', 'http://localhost/commist/assets/images/file_2_20230922215551_1.png', '2023-09-22 21:55:51', 2, NULL, NULL),
(42, 30, 'file', 'Berkas 1', 'http://localhost/commist/assets/files/file_1_20230917035634_1.pdf', '2023-09-17 03:56:34', 1, NULL, NULL),
(43, 30, 'file', 'Berkas 1', 'http://localhost/commist/assets/files/file_1_20230917035634_1.pdf', '2023-09-17 03:56:34', 1, NULL, NULL),
(44, 30, 'file', 'Berkas 1', 'http://localhost/commist/assets/files/file_1_20230917035634_1.pdf', '2023-09-17 03:56:34', 1, NULL, NULL),
(45, 30, 'file', 'Berkas 1', 'http://localhost/commist/assets/files/file_1_20230917035634_1.pdf', '2023-09-17 03:56:34', 1, NULL, NULL),
(46, 30, 'file', 'Berkas 1', 'http://localhost/commist/assets/files/file_1_20230917035634_1.pdf', '2023-09-17 03:56:34', 1, NULL, NULL),
(47, 30, 'file', 'Berkas 1', 'http://localhost/commist/assets/files/file_1_20230917035634_1.pdf', '2023-09-17 03:56:34', 1, NULL, NULL),
(48, 30, 'file', 'Berkas 1', 'http://localhost/commist/assets/files/file_1_20230917035634_1.pdf', '2023-09-17 03:56:34', 1, NULL, NULL),
(49, 30, 'image', 'Gambar 1', 'http://localhost/commist/assets/images/file_1_20230917035634_0.png', '2023-09-17 03:56:34', 1, NULL, NULL),
(50, 30, 'image', 'Gambar 1', 'http://localhost/commist/assets/images/file_1_20230917035634_0.png', '2023-09-17 03:56:34', 1, NULL, NULL),
(51, 30, 'image', 'Gambar 1', 'http://localhost/commist/assets/images/file_1_20230917035634_0.png', '2023-09-17 03:56:34', 1, NULL, NULL),
(52, 30, 'image', 'Gambar 1', 'http://localhost/commist/assets/images/file_1_20230917035634_0.png', '2023-09-17 03:56:34', 1, NULL, NULL),
(53, 30, 'image', 'Gambar 1', 'http://localhost/commist/assets/images/file_1_20230917035634_0.png', '2023-09-17 03:56:34', 1, NULL, NULL),
(54, 64, 'image', 'Bukti File', 'http://localhost/commist/assets/images/file_3_20230924211928_0.png', '2023-09-24 21:19:28', 3, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `t_report_item`
--

CREATE TABLE `t_report_item` (
  `id` int(11) NOT NULL,
  `report_log_id` int(11) DEFAULT NULL,
  `title` varchar(500) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `date` datetime DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `deleted_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `t_report_item`
--

INSERT INTO `t_report_item` (`id`, `report_log_id`, `title`, `description`, `date`, `created_at`, `created_by`, `updated_at`, `updated_by`, `deleted_at`, `deleted_by`) VALUES
(1, 53, 'Diskusi Awal', 'Diskusi Awal Banget', '2023-09-02 12:00:00', '2023-09-23 15:02:17', 1, NULL, NULL, NULL, NULL),
(2, 54, 'Diskusi Awal Kedua', 'Diskusi awal kedua nih', '2023-09-05 12:00:00', '2023-09-23 15:17:17', 1, NULL, NULL, '2023-09-23 21:18:53', 1),
(3, 55, 'Diskusi 3', 'Diskusi 3', '2023-09-14 12:00:00', '2023-09-23 15:18:28', 1, NULL, NULL, '2023-09-23 21:37:20', 1),
(4, 56, 'Diskusi Terakhir', 'Diskusi Terakhir', '2023-09-18 12:00:00', '2023-09-23 15:25:39', 1, NULL, NULL, NULL, NULL),
(5, 57, 'Diskusi Kelima', 'diskusi ke lima', '2023-09-20 12:00:00', '2023-09-23 15:29:16', 1, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `t_report_item_file`
--

CREATE TABLE `t_report_item_file` (
  `id` int(11) NOT NULL,
  `report_item_id` int(11) DEFAULT NULL,
  `type` varchar(500) DEFAULT NULL,
  `file_name` varchar(500) DEFAULT NULL,
  `path` varchar(500) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `deleted_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `t_report_item_file`
--

INSERT INTO `t_report_item_file` (`id`, `report_item_id`, `type`, `file_name`, `path`, `created_at`, `created_by`, `deleted_at`, `deleted_by`) VALUES
(1, 1, 'image', 'Bukti Foto 1', 'http://localhost/commist/assets/images/file_diskusi_1_20230923150217_0.png', '2023-09-23 15:02:17', 1, NULL, NULL),
(2, 1, 'image', 'Bukti Foto 2', 'http://localhost/commist/assets/images/file_diskusi_1_20230923150217_1.webp', '2023-09-23 15:02:17', 1, NULL, NULL),
(3, 2, 'image', 'Bukti Foto 1', 'http://localhost/commist/assets/images/file_diskusi_1_20230923151717_0.png', '2023-09-23 15:17:17', 1, NULL, NULL),
(4, 3, 'image', 'Gambar', 'http://localhost/commist/assets/images/file_diskusi_1_20230923151828_0.png', '2023-09-23 15:18:28', 1, NULL, NULL),
(5, 4, 'image', 'Foto', 'http://localhost/commist/assets/images/file_diskusi_1_20230923152539_0.png', '2023-09-23 15:25:39', 1, '2023-09-23 17:04:07', 1),
(6, 5, 'image', 'Foto', 'http://localhost/commist/assets/images/file_diskusi_1_20230923152916_0.png', '2023-09-23 15:29:16', 1, NULL, NULL),
(7, 5, 'file', 'File', 'http://localhost/commist/assets/files/file_2_7_20230914063301_2.pdf', '2023-09-23 15:29:16', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `t_report_log`
--

CREATE TABLE `t_report_log` (
  `id` int(11) NOT NULL,
  `report_id` int(11) DEFAULT NULL,
  `from` int(11) DEFAULT NULL,
  `to` int(11) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `t_report_log`
--

INSERT INTO `t_report_log` (`id`, `report_id`, `from`, `to`, `description`, `created_at`, `created_by`) VALUES
(1, 1, NULL, 1, 'Laporan dibuat pada tanggal 08 September 2022 05:00 ', '2023-09-08 04:52:45', 2),
(2, 2, 0, 1, 'The report Test Laporan 2 has been created.', '2023-09-12 17:25:37', 2),
(3, 3, 0, 1, 'Ticket Laporan 3 has been created with number', '2023-09-14 06:20:04', 2),
(4, 4, 0, 1, 'Ticket Laporan 3 has been created with number', '2023-09-14 06:23:45', 2),
(5, 5, 0, 1, 'Ticket Laporan 3 has been created with number', '2023-09-14 06:24:22', 2),
(6, 6, 0, 1, 'Ticket Laporan 7 has been created with number 2023091426', '2023-09-14 06:30:27', 2),
(7, 7, 0, 1, 'Ticket Laporan 7 has been created with number 2023091427', '2023-09-14 06:33:01', 2),
(8, 8, 0, 1, 'Ticket Laporan 8 has been created with number 2023091428', '2023-09-14 06:39:48', 2),
(9, 9, 0, 1, 'Ticket Laporan 10 has been created with number 2023091429', '2023-09-14 07:24:45', 2),
(10, 10, 0, 1, 'Ticket Laporan tanpa file has been created with number 20230914210', '2023-09-14 07:30:22', 2),
(11, 11, 0, 1, 'Ticket Laporan 11 has been created with number 20230914211', '2023-09-14 21:51:17', 2),
(12, 12, 0, 1, 'Ticket Laporan 12 Tanpa File has been created with number 20230914212', '2023-09-14 21:58:05', 2),
(13, 13, 0, 1, 'Ticket Laporan 13 Tanpa judul file has been created with number 20230915213', '2023-09-15 16:15:59', 2),
(14, 14, 0, 1, 'Ticket Laporan 14 has been created with number 20230915214', '2023-09-15 20:53:16', 2),
(15, 15, 0, 1, 'Ticket Laporan 14 Tanpa File has been created with number 20230915215', '2023-09-15 20:54:33', 2),
(16, 12, 0, 1, 'The report Laporan 12 Tanpa File edited has been updated.', '2023-09-15 21:18:25', 2),
(17, 11, 0, 1, 'The report Laporan 11 has been updated.', '2023-09-15 21:21:22', 2),
(18, 11, 0, 1, 'The report Laporan 11 edited has been updated.', '2023-09-15 21:40:35', 2),
(19, 16, 0, 1, 'Ticket Laporan Malam Tanpa File has been created with number 20230915216', '2023-09-15 21:56:04', 2),
(20, 16, 0, 1, 'The report Laporan Malam Tanpa File edited has been updated.', '2023-09-15 21:56:23', 2),
(21, 17, 0, 1, 'Ticket Laporan Malam dengan File has been created with number 20230915217', '2023-09-15 21:57:01', 2),
(22, 17, 0, 1, 'The report Laporan Malam dengan File edited has been updated.', '2023-09-15 21:57:24', 2),
(23, 17, 0, 1, 'The report Laporan Malam dengan File edited has been updated.', '2023-09-15 21:57:42', 2),
(26, 16, 1, 3, 'Laporan di reject karena tidak ada file attachment', '2023-09-17 03:08:43', 1),
(27, 17, 1, 2, 'Laporan diterima, tunggu sampai besok', '2023-09-17 03:11:48', 1),
(28, 17, 2, 4, '', '2023-09-17 03:40:37', 1),
(29, 17, 4, 5, 'Laporan telah di process, bukti telah dilampirkan', '2023-09-17 03:49:19', 1),
(30, 17, 5, 6, 'Laporan telah didiskusikan, selanjutnya akan di follow up sama tim terkait', '2023-09-17 03:56:34', 1),
(31, 17, 6, 7, 'Laporan ini akan direkomendasikan ke kementrian terkait. Akan dilampirkan berkas', '2023-09-17 04:02:04', 1),
(32, 15, 1, 2, 'tes', '2023-09-17 21:12:19', 1),
(33, 15, 2, 4, '', '2023-09-17 21:12:47', 1),
(34, 15, 4, 5, 'laporan telah didiskusikan', '2023-09-17 21:13:27', 1),
(35, 15, 5, 6, '', '2023-09-17 21:14:21', 1),
(36, 15, 6, 7, '', '2023-09-17 21:14:45', 1),
(37, 14, 1, 2, '', '2023-09-17 21:19:27', 1),
(38, 14, 2, 4, '', '2023-09-17 21:19:34', 1),
(39, 14, 4, 5, '', '2023-09-17 21:19:41', 1),
(40, 13, 1, 2, '', '2023-09-17 21:24:38', 1),
(41, 13, 2, 4, '', '2023-09-17 21:25:03', 1),
(42, 10, 1, 3, 'Laporan tidak jelas, harap tambahkan lampiran', '2023-09-20 22:08:50', 1),
(43, 11, 1, 2, '', '2023-09-20 22:09:38', 1),
(44, 11, 2, 4, '', '2023-09-20 23:44:43', 1),
(45, 14, 5, 6, '', '2023-09-22 06:15:52', 1),
(46, 11, 4, 5, 'Lanjut ke tahap diskusi', '2023-09-22 21:29:37', 1),
(47, 18, 0, 1, 'Tiket Laporan 22 Sept telah dibuat dengan nomor 20230922218', '2023-09-22 21:55:51', 2),
(48, 18, 1, 2, 'Laporan Diterima', '2023-09-22 22:06:56', 1),
(49, 12, 0, 1, 'Tiket Laporan 12 Tanpa File edited updated telah diperbarui.', '2023-09-22 22:31:30', 2),
(50, 12, 0, 1, 'Tiket Laporan 12 Tanpa File edited updated ubah telah diperbarui.', '2023-09-22 22:32:10', 2),
(51, 12, 0, 1, 'Tiket Laporan 12 Tanpa File edited updated ubah 2 telah diperbarui.', '2023-09-22 22:32:28', 2),
(52, 18, 2, 4, '', '2023-09-23 14:59:56', 1),
(53, 11, 5, 0, 'Diskusi ke', '2023-09-23 15:02:17', 1),
(56, 11, 5, 0, 'Diskusi ke', '2023-09-23 15:25:39', 1),
(57, 11, 5, 0, 'Diskusi ke', '2023-09-23 15:29:16', 1),
(58, 18, 4, 5, 'Lanjut Diskusi', '2023-09-24 13:42:51', 1),
(59, 11, 5, 6, 'Lanjut ke tahap rekomendasi', '2023-09-24 14:11:29', 1),
(60, 12, 1, 2, '', '2023-09-24 14:31:24', 1),
(61, 11, 6, 7, 'kita teruskan laporan ini ke kementerian lain', '2023-09-24 14:52:45', 1),
(62, 9, 1, 2, '', '2023-09-24 21:15:00', 1),
(63, 8, 1, 3, '', '2023-09-24 21:15:16', 1),
(64, 11, 7, 7, 'Laporan diterima', '2023-09-24 21:19:28', 3);

-- --------------------------------------------------------

--
-- Table structure for table `t_report_status`
--

CREATE TABLE `t_report_status` (
  `id` int(11) NOT NULL,
  `name` varchar(500) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `icon` varchar(100) DEFAULT NULL,
  `color` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `t_report_status`
--

INSERT INTO `t_report_status` (`id`, `name`, `created_at`, `icon`, `color`) VALUES
(1, 'Diajukan', '2023-09-08 04:11:57', 'file-plus', 'primary'),
(2, 'Diterima', '2023-09-08 04:12:06', 'check', 'success'),
(3, 'Ditolak', '2023-09-08 04:12:30', 'x', 'danger'),
(4, 'Diproses', '2023-09-08 04:12:41', 'clock', 'dark'),
(5, 'Didiskusikan', '2023-09-08 04:12:58', 'users', 'info'),
(6, 'Direkomendasikan', '2023-09-08 04:14:25', 'skip-forward', 'secondary'),
(7, 'Diteruskan', '2023-09-08 04:14:34', 'trending-up', 'warning');

-- --------------------------------------------------------

--
-- Table structure for table `t_role`
--

CREATE TABLE `t_role` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `t_role`
--

INSERT INTO `t_role` (`id`, `name`, `created_at`) VALUES
(1, 'Admin', '2023-09-07 21:42:04'),
(2, 'Warga', '2023-09-07 21:42:09'),
(3, 'Instansi', '2023-09-20 20:33:11');

-- --------------------------------------------------------

--
-- Table structure for table `t_survey`
--

CREATE TABLE `t_survey` (
  `survey_id` int(11) NOT NULL,
  `answer` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `no_ticket` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `t_survey`
--

INSERT INTO `t_survey` (`survey_id`, `answer`, `created_at`, `created_by`, `no_ticket`) VALUES
(1, 4, '2023-09-24 22:05:35', 2, '2023091428'),
(2, 5, '2023-09-24 22:05:35', 2, '2023091428');

-- --------------------------------------------------------

--
-- Table structure for table `t_survey_question`
--

CREATE TABLE `t_survey_question` (
  `id` int(11) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `question` text DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `deleted_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `t_survey_question`
--

INSERT INTO `t_survey_question` (`id`, `title`, `question`, `created_at`, `created_by`, `updated_at`, `updated_by`, `deleted_at`, `deleted_by`) VALUES
(1, 'Kepuasan Stakeholder', 'Apakah anda puas dengan penanganan tiket laporan anda ?', '2023-09-24 21:48:12', 1, NULL, NULL, NULL, NULL),
(2, 'Kecepatan Penyelesaian', 'Apakah anda puas dengan kecepatan penyelesaian dari tiket laporan anda ?', '2023-09-24 21:49:05', 1, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `t_ticket`
--

CREATE TABLE `t_ticket` (
  `id` int(11) NOT NULL,
  `no_ticket` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `phone` varchar(100) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `t_ticket`
--

INSERT INTO `t_ticket` (`id`, `no_ticket`, `email`, `phone`, `created_at`) VALUES
(1, 'BUJ2802155', 'admin@admin.com', '12333', '2023-09-27 14:00:12');

-- --------------------------------------------------------

--
-- Table structure for table `t_user`
--

CREATE TABLE `t_user` (
  `id` int(11) NOT NULL,
  `email` varchar(500) DEFAULT NULL,
  `hash` varchar(500) DEFAULT NULL,
  `full_name` varchar(500) DEFAULT NULL,
  `address` varchar(500) DEFAULT NULL,
  `phone` varchar(15) DEFAULT NULL,
  `photo` varchar(500) DEFAULT NULL,
  `instansi_id` int(11) DEFAULT NULL,
  `is_active` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `deleted_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `t_user`
--

INSERT INTO `t_user` (`id`, `email`, `hash`, `full_name`, `address`, `phone`, `photo`, `instansi_id`, `is_active`, `created_at`, `created_by`, `updated_at`, `updated_by`, `deleted_at`, `deleted_by`) VALUES
(1, 'admin@admin.com', '827ccb0eea8a706c4c34a16891f84e7b', 'Admin', 'Jakarta', '0812345678', NULL, NULL, 1, '2023-09-07 21:45:24', NULL, '2023-09-07 21:45:24', NULL, NULL, NULL),
(2, 'stakeholder@mail.com', '827ccb0eea8a706c4c34a16891f84e7b', 'Stakeholder', 'Jakarta', '08123456789', NULL, NULL, 1, '2023-09-07 21:45:57', NULL, '2023-09-12 02:48:04', 2, NULL, NULL),
(3, 'user.kemendagri@mail.com', '827ccb0eea8a706c4c34a16891f84e7b', 'User Kemendagri', 'Jakarta', '0', NULL, 1, 1, '2023-09-24 00:24:10', 1, NULL, NULL, NULL, NULL),
(18, 'admin@admin.com', NULL, 'dsadas', 'dsada', '12333', NULL, NULL, 0, '2023-09-27 15:10:15', NULL, NULL, NULL, NULL, NULL),
(19, 'admin@admin.com', NULL, 'dasda', 'dasda', '12333', NULL, NULL, 0, '2023-09-27 15:11:41', NULL, NULL, NULL, NULL, NULL),
(20, 'admin@admin.com', NULL, 'dsada', 'dsada', '12333', NULL, NULL, 0, '2023-09-27 15:12:52', NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `t_user_role`
--

CREATE TABLE `t_user_role` (
  `user_id` int(11) NOT NULL,
  `role_id` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `t_user_role`
--

INSERT INTO `t_user_role` (`user_id`, `role_id`, `created_at`) VALUES
(1, 1, '2023-09-07 21:46:22'),
(2, 2, '2023-09-07 21:46:33'),
(3, 3, '2023-09-24 00:24:10');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `t_instansi`
--
ALTER TABLE `t_instansi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `t_report`
--
ALTER TABLE `t_report`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `t_report_file`
--
ALTER TABLE `t_report_file`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `t_report_item`
--
ALTER TABLE `t_report_item`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `t_report_item_file`
--
ALTER TABLE `t_report_item_file`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `t_report_log`
--
ALTER TABLE `t_report_log`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `t_role`
--
ALTER TABLE `t_role`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `t_survey`
--
ALTER TABLE `t_survey`
  ADD PRIMARY KEY (`survey_id`);

--
-- Indexes for table `t_survey_question`
--
ALTER TABLE `t_survey_question`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `t_ticket`
--
ALTER TABLE `t_ticket`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `t_user`
--
ALTER TABLE `t_user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `t_user_role`
--
ALTER TABLE `t_user_role`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `t_instansi`
--
ALTER TABLE `t_instansi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `t_report`
--
ALTER TABLE `t_report`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `t_report_file`
--
ALTER TABLE `t_report_file`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT for table `t_report_item`
--
ALTER TABLE `t_report_item`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `t_report_item_file`
--
ALTER TABLE `t_report_item_file`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `t_report_log`
--
ALTER TABLE `t_report_log`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;

--
-- AUTO_INCREMENT for table `t_survey`
--
ALTER TABLE `t_survey`
  MODIFY `survey_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `t_survey_question`
--
ALTER TABLE `t_survey_question`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `t_ticket`
--
ALTER TABLE `t_ticket`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `t_user`
--
ALTER TABLE `t_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `t_user_role`
--
ALTER TABLE `t_user_role`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
