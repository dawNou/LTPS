-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Aug 21, 2024 at 12:55 AM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ltpsm12`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `category_id` int NOT NULL,
  `name` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`category_id`, `name`, `slug`, `created_at`, `updated_at`) VALUES
(48, 'lilin untuk upacara misa', 'lilin-untuk-upacara-misa', '2024-08-20 17:14:03', '2024-08-20 17:14:03'),
(49, 'lilin saat pemadaman listrik', 'lilin-saat-pemadaman-listrik', '2024-08-20 17:15:44', '2024-08-20 17:15:44'),
(50, 'durasi lilin', 'durasi-lilin', '2024-08-20 17:16:17', '2024-08-20 17:16:17'),
(51, 'harga lilin', 'harga-lilin', '2024-08-20 17:17:10', '2024-08-20 17:17:29'),
(52, 'lilin untuk penerangan malam', 'lilin-untuk-penerangan-malam', '2024-08-20 17:30:15', '2024-08-20 17:30:15');

-- --------------------------------------------------------

--
-- Table structure for table `category_keyword`
--

CREATE TABLE `category_keyword` (
  `category_keyword_id` int NOT NULL,
  `category_id` int DEFAULT NULL,
  `keyword_id` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `category_keyword`
--

INSERT INTO `category_keyword` (`category_keyword_id`, `category_id`, `keyword_id`, `created_at`, `updated_at`) VALUES
(55, 48, 100, NULL, NULL),
(56, 48, 120, NULL, NULL),
(57, 48, 267, NULL, NULL),
(58, 49, 100, NULL, NULL),
(59, 49, 124, NULL, NULL),
(60, 49, 125, NULL, NULL),
(61, 50, 100, NULL, NULL),
(62, 50, 106, NULL, NULL),
(63, 51, 100, NULL, NULL),
(64, 51, 112, NULL, NULL),
(65, 52, 100, NULL, NULL),
(66, 52, 107, NULL, NULL),
(67, 52, 173, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `ch_favorites`
--

CREATE TABLE `ch_favorites` (
  `id` char(36) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint NOT NULL,
  `favorite_id` bigint NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ch_messages`
--

CREATE TABLE `ch_messages` (
  `id` char(36) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `from_id` bigint NOT NULL,
  `to_id` bigint NOT NULL,
  `body` varchar(5000) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `attachment` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `seen` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ch_messages`
--

INSERT INTO `ch_messages` (`id`, `from_id`, `to_id`, `body`, `attachment`, `seen`, `created_at`, `updated_at`) VALUES
('2179067d-aa02-4c0b-9bc6-be01152c73fc', 9, 2, 'halo admin, ini helena', NULL, 1, '2024-08-18 16:51:18', '2024-08-18 16:51:25'),
('4214afbc-da9c-449c-9208-fbc861a12e43', 2, 9, 'halo helena, ada yang bisa dibantu?', NULL, 1, '2024-08-18 16:51:54', '2024-08-18 16:51:55'),
('4ec1c9d8-6ee5-45c7-88e6-0bf4e3ef05fb', 9, 2, 'ada min', NULL, 1, '2024-08-18 16:52:04', '2024-08-18 16:52:04'),
('f5e9db29-d79d-49af-83e2-d0cee6b55013', 3, 2, 'halo admin', NULL, 1, '2024-08-18 15:44:20', '2024-08-18 15:44:29'),
('f65026c9-0525-415a-8199-6ba280e8d41b', 2, 3, 'halo, ada yang bisa dibantu?', NULL, 1, '2024-08-18 15:44:51', '2024-08-18 15:44:54');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `feedback_id` int NOT NULL,
  `user_id` bigint DEFAULT NULL,
  `produk_id` int DEFAULT NULL,
  `pertanyaan_id` int DEFAULT NULL,
  `jawaban` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`feedback_id`, `user_id`, `produk_id`, `pertanyaan_id`, `jawaban`, `created_at`, `updated_at`) VALUES
(14, 3, 14, 13, 'Saya sangat puas dengan durasi pembakaran lilin penerangan ini. Lilin ini mampu menyala lebih lama dari yang saya perkirakan, sekitar 5-6 jam. Hal ini sangat membantu saat terjadi pemadaman listrik di rumah saya. Saya merasa durasinya sudah cukup sesuai dengan kebutuhan saya, dan bahkan melebihi ekspektasi saya karena sebelumnya saya menggunakan lilin lain yang hanya bertahan 3-4 jam. Menurut saya, ini merupakan salah satu keunggulan utama dari produk ini.', '2024-08-20 16:52:11', '2024-08-20 16:52:11'),
(15, 3, 14, 14, 'Harga lilin penerangan ini sedikit lebih mahal dibandingkan dengan lilin-lilin biasa yang tersedia di pasaran. Namun, saya merasa harga tersebut sebanding dengan kualitas yang diberikan. Lilin ini memiliki pembakaran yang stabil dan tidak mudah meleleh terlalu cepat, sehingga penggunaannya lebih hemat. Saya juga suka dengan aroma yang lembut dan tidak menyengat, yang menurut saya memberikan nilai tambah. Secara keseluruhan, saya merasa produk ini bernilai sesuai dengan harga yang ditawarkan', '2024-08-20 16:52:11', '2024-08-20 16:52:11'),
(16, 3, 14, 16, 'Saya memilih lilin penerangan ini karena rekomendasi dari teman yang pernah menggunakannya. Alasan utamanya adalah karena lilin ini dikenal memiliki durasi pembakaran yang lebih lama dan tidak mudah padam saat ada angin. Selain itu, produk ini juga memiliki beragam ukuran yang memudahkan saya untuk memilih sesuai kebutuhan. Pengalaman pertama saya menggunakan lilin ini sangat memuaskan, dan sejauh ini, produk ini telah memenuhi semua kebutuhan saya, terutama saat terjadi pemadaman listrik.', '2024-08-20 16:52:11', '2024-08-20 16:52:11'),
(17, 3, 14, 17, 'Pengalaman saya menggunakan lilin penerangan ini sangat positif. Saya sering menggunakannya saat listrik padam, dan lilin ini mampu menerangi ruangan dengan baik. Yang paling berkesan adalah stabilitas nyala lilin ini, yang tidak mudah padam meskipun ada sedikit hembusan angin. Namun, saya merasa perlu ada peningkatan pada kemasan lilin, karena terkadang lilin sulit dikeluarkan dari wadahnya saat ingin dinyalakan. Secara keseluruhan, saya puas dengan performanya.', '2024-08-20 16:52:11', '2024-08-20 16:52:11'),
(18, 3, 14, 18, 'Saya menggunakan lilin penerangan ini setidaknya sekali seminggu, terutama saat terjadi pemadaman listrik di daerah saya yang masih cukup sering terjadi. Selain itu, saya juga menggunakannya saat ingin menciptakan suasana yang tenang dan hangat di rumah. Lilin ini sangat sesuai dengan kebutuhan saya karena durasi nyala yang lama dan kualitas cahaya yang dihasilkan cukup baik untuk penerangan sementara.', '2024-08-20 16:52:11', '2024-08-20 16:52:11'),
(19, 3, 14, 19, 'Saya merasa lilin penerangan ini sudah cukup baik, tetapi jika ada sesuatu yang bisa ditingkatkan, saya berharap lilin ini bisa dilengkapi dengan lapisan anti bocor pada wadahnya. Kadang-kadang, jika lilin diletakkan miring, ada sedikit cairan lilin yang menetes keluar. Selain itu, akan sangat membantu jika produk ini memiliki variasi aroma yang lebih banyak untuk memberikan pilihan yang lebih personal bagi pengguna.', '2024-08-20 16:52:11', '2024-08-20 16:52:11'),
(20, 3, 14, 20, 'Dibandingkan dengan produk lilin sejenis yang pernah saya gunakan sebelumnya, lilin ini jelas lebih unggul dalam hal durasi pembakaran dan stabilitas nyala. Produk sebelumnya yang saya gunakan cenderung cepat habis dan lebih mudah padam saat ada sedikit angin. Selain itu, saya juga merasa lilin ini memiliki pembakaran yang lebih bersih dan tidak banyak menghasilkan asap. Perbedaan yang paling signifikan adalah ketahanan lilin ini yang jauh lebih lama, sehingga lebih efisien untuk digunakan.', '2024-08-20 16:52:11', '2024-08-20 16:52:11'),
(21, 9, 29, 21, 'Durasi pembakaran lilin altar yang saya gunakan mencapai sekitar 7 jam, sesuai dengan spesifikasi yang tertera pada kemasan. Durasi ini sangat memuaskan karena lilin dapat menyala sepanjang waktu kebaktian dan doa malam tanpa perlu diganti. Namun, saya berharap durasi bisa sedikit lebih lama untuk keperluan upacara yang berlangsung lebih lama.', '2024-08-20 16:54:45', '2024-08-20 16:54:45'),
(22, 9, 29, 22, 'Menurut saya, harga lilin altar ini cukup kompetitif dibandingkan dengan produk sejenis di pasaran. Kualitas lilin yang saya rasakan sangat baik, dengan pembakaran yang stabil dan tanpa asap yang mengganggu. Meskipun harganya sedikit lebih tinggi dari lilin biasa, saya merasa puas dengan nilai yang diberikan karena kualitasnya yang terjamin.', '2024-08-20 16:54:45', '2024-08-20 16:54:45'),
(23, 9, 29, 23, 'Alasan utama saya memilih lilin altar ini adalah reputasinya yang baik di komunitas gereja. Selain itu, saya tertarik dengan jaminan kualitas yang diberikan oleh produsen, seperti tidak adanya asap dan pembakaran yang lebih lama. Faktor lain adalah kemasannya yang praktis dan rapi, memudahkan penyimpanan dan penggunaan.', '2024-08-20 16:54:45', '2024-08-20 16:54:45'),
(24, 9, 29, 24, 'Saya menggunakan lilin altar ini selama misa malam di gereja. Salah satu momen yang sangat berkesan adalah saat lilin ini terus menyala dengan tenang meskipun ada angin yang cukup kencang. Lilin ini tetap stabil dan tidak menghasilkan asap, menciptakan suasana yang khusyuk dan sakral. Pengalaman ini membuat saya semakin yakin untuk terus menggunakan produk ini.', '2024-08-20 16:54:45', '2024-08-20 16:54:45'),
(25, 9, 29, 25, 'Secara umum, saya tidak mengalami kesulitan besar saat menggunakan lilin altar ini. Namun, saya merasa kemasannya bisa sedikit diperbaiki. Ada beberapa kali ketika lilin sulit dikeluarkan dari kemasan karena terlalu pas. Mungkin produsen bisa mempertimbangkan desain kemasan yang lebih fleksibel agar lebih mudah diambil.', '2024-08-20 16:54:45', '2024-08-20 16:54:45'),
(26, 9, 29, 26, 'Lilin altar ini memberikan nilai tambah yang signifikan pada setiap upacara yang saya lakukan. Pembakarannya yang stabil dan bebas asap membantu menciptakan suasana yang lebih khusyuk dan tenang, yang sangat penting dalam ritual keagamaan. Warna dan aromanya juga menambah dimensi spiritual yang membuat upacara terasa lebih sakral.', '2024-08-20 16:54:45', '2024-08-20 16:54:45'),
(27, 9, 29, 27, 'Saya akan merekomendasikan lilin altar ini sebagai pilihan terbaik bagi siapa saja yang mencari lilin berkualitas tinggi untuk keperluan upacara atau ritual keagamaan. Produk ini menawarkan pembakaran yang lama, bebas asap, dan stabil, yang semuanya berkontribusi pada pengalaman spiritual yang lebih mendalam. Dengan harga yang sesuai dengan kualitasnya, saya yakin produk ini akan memenuhi harapan banyak orang.', '2024-08-20 16:54:45', '2024-08-20 16:54:45');

-- --------------------------------------------------------

--
-- Table structure for table `katprods`
--

CREATE TABLE `katprods` (
  `katprod_id` int NOT NULL,
  `namakatprod` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `katprods`
--

INSERT INTO `katprods` (`katprod_id`, `namakatprod`, `slug`, `created_at`, `updated_at`) VALUES
(19, 'lilin', 'lilin', '2024-08-17 23:34:36', '2024-08-17 23:34:36'),
(21, 'benang lilin', 'benang-lilin', '2024-08-17 23:34:48', '2024-08-17 23:34:48'),
(23, 'lilin altar', 'lilin-altar', '2024-08-19 10:45:32', '2024-08-19 10:45:32'),
(24, 'kemasan produk', 'kemasan-produk', '2024-08-19 10:51:27', '2024-08-19 10:51:27'),
(25, 'bahan lilin', 'bahan-lilin', '2024-08-19 11:10:52', '2024-08-19 11:10:52'),
(26, 'mesin cetak lilin', 'mesin-cetak-lilin', '2024-08-19 11:19:49', '2024-08-20 16:47:17');

-- --------------------------------------------------------

--
-- Table structure for table `keywords`
--

CREATE TABLE `keywords` (
  `keyword_id` int NOT NULL,
  `keyword` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `frequency` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `keywords`
--

INSERT INTO `keywords` (`keyword_id`, `keyword`, `frequency`, `created_at`, `updated_at`) VALUES
(100, 'lilin', 36, NULL, NULL),
(101, 'lebih', 20, NULL, NULL),
(102, 'produk', 11, NULL, NULL),
(103, 'pembakaran', 9, NULL, NULL),
(104, 'merasa', 8, NULL, NULL),
(105, 'ada', 8, NULL, NULL),
(106, 'durasi', 7, NULL, NULL),
(107, 'penerangan', 7, NULL, NULL),
(108, 'menggunakan', 7, NULL, NULL),
(109, 'sedikit', 7, NULL, NULL),
(110, 'altar', 7, NULL, NULL),
(111, 'sesuai', 6, NULL, NULL),
(112, 'harga', 5, NULL, NULL),
(113, 'memiliki', 5, NULL, NULL),
(114, 'mudah', 5, NULL, NULL),
(115, 'bisa', 5, NULL, NULL),
(116, 'lama', 4, NULL, NULL),
(117, 'kualitas', 4, NULL, NULL),
(118, 'stabil', 4, NULL, NULL),
(119, 'pengalaman', 4, NULL, NULL),
(120, 'upacara', 4, NULL, NULL),
(121, 'puas', 3, NULL, NULL),
(122, 'menyala', 3, NULL, NULL),
(123, 'membantu', 3, NULL, NULL),
(124, 'pemadaman', 3, NULL, NULL),
(125, 'listrik', 3, NULL, NULL),
(126, 'kebutuhan', 3, NULL, NULL),
(127, 'menurut', 3, NULL, NULL),
(128, 'dibandingkan', 3, NULL, NULL),
(129, 'memberikan', 3, NULL, NULL),
(130, 'nilai', 3, NULL, NULL),
(131, 'secara', 3, NULL, NULL),
(132, 'memilih', 3, NULL, NULL),
(133, 'padam', 3, NULL, NULL),
(134, 'kemasan', 3, NULL, NULL),
(135, 'menciptakan', 3, NULL, NULL),
(136, 'suasana', 3, NULL, NULL),
(137, 'banyak', 3, NULL, NULL),
(138, 'gunakan', 3, NULL, NULL),
(139, 'asap', 3, NULL, NULL),
(140, 'mampu', 2, NULL, NULL),
(141, 'sekitar', 2, NULL, NULL),
(142, 'hal', 2, NULL, NULL),
(143, 'sebelumnya', 2, NULL, NULL),
(144, 'salah', 2, NULL, NULL),
(145, 'satu', 2, NULL, NULL),
(146, 'utama', 2, NULL, NULL),
(147, 'terlalu', 2, NULL, NULL),
(148, 'aroma', 2, NULL, NULL),
(149, 'pernah', 2, NULL, NULL),
(150, 'alasan', 2, NULL, NULL),
(151, 'memudahkan', 2, NULL, NULL),
(152, 'memenuhi', 2, NULL, NULL),
(153, 'terutama', 2, NULL, NULL),
(154, 'sering', 2, NULL, NULL),
(155, 'menggunakannya', 2, NULL, NULL),
(156, 'paling', 2, NULL, NULL),
(157, 'berkesan', 2, NULL, NULL),
(158, 'stabilitas', 2, NULL, NULL),
(159, 'nyala', 2, NULL, NULL),
(160, 'perlu', 2, NULL, NULL),
(161, 'sulit', 2, NULL, NULL),
(162, 'dikeluarkan', 2, NULL, NULL),
(163, 'ingin', 2, NULL, NULL),
(164, 'tenang', 2, NULL, NULL),
(165, 'baik', 2, NULL, NULL),
(166, 'berharap', 2, NULL, NULL),
(167, 'pilihan', 2, NULL, NULL),
(168, 'bagi', 2, NULL, NULL),
(169, 'sejenis', 2, NULL, NULL),
(170, 'dalam', 2, NULL, NULL),
(171, 'menghasilkan', 2, NULL, NULL),
(172, 'signifikan', 2, NULL, NULL),
(173, 'malam', 2, NULL, NULL),
(174, 'keperluan', 2, NULL, NULL),
(175, 'tinggi', 2, NULL, NULL),
(176, 'diberikan', 2, NULL, NULL),
(177, 'kemasannya', 2, NULL, NULL),
(178, 'terus', 2, NULL, NULL),
(179, 'khusyuk', 2, NULL, NULL),
(180, 'membuat', 2, NULL, NULL),
(181, 'yakin', 2, NULL, NULL),
(182, 'bebas', 2, NULL, NULL),
(183, 'ritual', 2, NULL, NULL),
(184, 'spiritual', 2, NULL, NULL),
(185, 'rumah', 1, NULL, NULL),
(186, 'durasinya', 1, NULL, NULL),
(187, 'bahkan', 1, NULL, NULL),
(188, 'melebihi', 1, NULL, NULL),
(189, 'ekspektasi', 1, NULL, NULL),
(190, 'hanya', 1, NULL, NULL),
(191, 'bertahan', 1, NULL, NULL),
(192, 'merupakan', 1, NULL, NULL),
(193, 'keunggulan', 1, NULL, NULL),
(194, 'mahal', 1, NULL, NULL),
(195, 'biasa', 1, NULL, NULL),
(196, 'tersedia', 1, NULL, NULL),
(197, 'sebanding', 1, NULL, NULL),
(198, 'meleleh', 1, NULL, NULL),
(199, 'penggunaannya', 1, NULL, NULL),
(200, 'suka', 1, NULL, NULL),
(201, 'lembut', 1, NULL, NULL),
(202, 'bernilai', 1, NULL, NULL),
(203, 'ditawarkan', 1, NULL, NULL),
(204, 'rekomendasi', 1, NULL, NULL),
(205, 'teman', 1, NULL, NULL),
(206, 'utamanya', 1, NULL, NULL),
(207, 'dikenal', 1, NULL, NULL),
(208, 'beragam', 1, NULL, NULL),
(209, 'ukuran', 1, NULL, NULL),
(210, 'pertama', 1, NULL, NULL),
(211, 'sejauh', 1, NULL, NULL),
(212, 'semua', 1, NULL, NULL),
(213, 'menerangi', 1, NULL, NULL),
(214, 'ruangan', 1, NULL, NULL),
(215, 'hembusan', 1, NULL, NULL),
(216, 'peningkatan', 1, NULL, NULL),
(217, 'terkadang', 1, NULL, NULL),
(218, 'wadahnya', 1, NULL, NULL),
(219, 'setidaknya', 1, NULL, NULL),
(220, 'sekali', 1, NULL, NULL),
(221, 'daerah', 1, NULL, NULL),
(222, 'hangat', 1, NULL, NULL),
(223, 'cahaya', 1, NULL, NULL),
(224, 'dihasilkan', 1, NULL, NULL),
(225, 'sesuatu', 1, NULL, NULL),
(226, 'dilengkapi', 1, NULL, NULL),
(227, 'lapisan', 1, NULL, NULL),
(228, 'anti', 1, NULL, NULL),
(229, 'bocor', 1, NULL, NULL),
(230, 'diletakkan', 1, NULL, NULL),
(231, 'cairan', 1, NULL, NULL),
(232, 'menetes', 1, NULL, NULL),
(233, 'variasi', 1, NULL, NULL),
(234, 'personal', 1, NULL, NULL),
(235, 'jelas', 1, NULL, NULL),
(236, 'unggul', 1, NULL, NULL),
(237, 'cenderung', 1, NULL, NULL),
(238, 'cepat', 1, NULL, NULL),
(239, 'habis', 1, NULL, NULL),
(240, 'bersih', 1, NULL, NULL),
(241, 'perbedaan', 1, NULL, NULL),
(242, 'ketahanan', 1, NULL, NULL),
(243, 'jauh', 1, NULL, NULL),
(244, 'efisien', 1, NULL, NULL),
(245, 'mencapai', 1, NULL, NULL),
(246, 'spesifikasi', 1, NULL, NULL),
(247, 'tertera', 1, NULL, NULL),
(248, 'memuaskan', 1, NULL, NULL),
(249, 'sepanjang', 1, NULL, NULL),
(250, 'waktu', 1, NULL, NULL),
(251, 'kebaktian', 1, NULL, NULL),
(252, 'doa', 1, NULL, NULL),
(253, 'berlangsung', 1, NULL, NULL),
(254, 'kompetitif', 1, NULL, NULL),
(255, 'rasakan', 1, NULL, NULL),
(256, 'harganya', 1, NULL, NULL),
(257, 'kualitasnya', 1, NULL, NULL),
(258, 'reputasinya', 1, NULL, NULL),
(259, 'komunitas', 1, NULL, NULL),
(260, 'tertarik', 1, NULL, NULL),
(261, 'jaminan', 1, NULL, NULL),
(262, 'seperti', 1, NULL, NULL),
(263, 'adanya', 1, NULL, NULL),
(264, 'faktor', 1, NULL, NULL),
(265, 'praktis', 1, NULL, NULL),
(266, 'penyimpanan', 1, NULL, NULL),
(267, 'misa', 1, NULL, NULL),
(268, 'momen', 1, NULL, NULL),
(269, 'angin', 1, NULL, NULL),
(270, 'tetap', 1, NULL, NULL),
(271, 'semakin', 1, NULL, NULL),
(272, 'mengalami', 1, NULL, NULL),
(273, 'kesulitan', 1, NULL, NULL),
(274, 'besar', 1, NULL, NULL),
(275, 'beberapa', 1, NULL, NULL),
(276, 'kali', 1, NULL, NULL),
(277, 'mungkin', 1, NULL, NULL),
(278, 'produsen', 1, NULL, NULL),
(279, 'mempertimbangkan', 1, NULL, NULL),
(280, 'desain', 1, NULL, NULL),
(281, 'fleksibel', 1, NULL, NULL),
(282, 'tambah', 1, NULL, NULL),
(283, 'setiap', 1, NULL, NULL),
(284, 'pembakarannya', 1, NULL, NULL),
(285, 'penting', 1, NULL, NULL),
(286, 'warna', 1, NULL, NULL),
(287, 'aromanya', 1, NULL, NULL),
(288, 'menambah', 1, NULL, NULL),
(289, 'dimensi', 1, NULL, NULL),
(290, 'merekomendasikan', 1, NULL, NULL),
(291, 'terbaik', 1, NULL, NULL),
(292, 'siapa', 1, NULL, NULL),
(293, 'saja', 1, NULL, NULL),
(294, 'mencari', 1, NULL, NULL),
(295, 'berkualitas', 1, NULL, NULL),
(296, 'menawarkan', 1, NULL, NULL),
(297, 'semuanya', 1, NULL, NULL),
(298, 'berkontribusi', 1, NULL, NULL),
(299, 'harapan', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(93, '2014_10_12_000000_create_users_table', 1),
(94, '2014_10_12_100000_create_password_resets_table', 2),
(95, '2019_08_19_000000_create_failed_jobs_table', 3),
(96, '2019_12_14_000001_create_personal_access_tokens_table', 4),
(97, '2024_04_27_141013_create_categories_table', 5),
(98, '2024_07_14_073244_create_keywords_table', 6),
(99, '2024_07_19_033826_create_katprods_table', 7),
(100, '2024_04_27_095640_create_posts_table', 8),
(101, '2024_07_07_041835_create_pertanyaans_table', 9),
(102, '2024_07_12_023621_create_produks_table', 10),
(103, '2024_07_13_074437_create_feedback_table', 11),
(104, '2024_07_21_002214_create_category_keyword_table', 12),
(105, '2024_07_21_005242_create_post_keyword_table', 13),
(106, '2024_06_16_053808_add_is_admin_to_users_table', 14),
(107, '2024_07_27_074802_add_is_pemilik_to_users_table', 15),
(108, '2024_08_18_999999_add_active_status_to_users', 16),
(109, '2024_08_18_999999_add_avatar_to_users', 16),
(110, '2024_08_18_999999_add_dark_mode_to_users', 16),
(111, '2024_08_18_999999_add_messenger_color_to_users', 16),
(112, '2024_08_18_999999_create_chatify_favorites_table', 16),
(113, '2024_08_18_999999_create_chatify_messages_table', 16),
(114, '2024_08_19_205703_create_penjualans_table', 17);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pertanyaans`
--

CREATE TABLE `pertanyaans` (
  `pertanyaan_id` int NOT NULL,
  `katprod_id` int DEFAULT NULL,
  `soal` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pertanyaans`
--

INSERT INTO `pertanyaans` (`pertanyaan_id`, `katprod_id`, `soal`, `slug`, `created_at`, `updated_at`) VALUES
(13, 19, 'Bagaimana anda menilai durasi pembakaran lilin penerangan yang anda gunakan? Apakah sesuai dengan ekspektasi anda? Jelaskan alasannya', 'bagaimana-anda-menilai-durasi-pembakaran-lilin-penerangan-yang-anda-gunakan-apakah-sesuai-dengan-ekspektasi-anda-jelaskan-alasannya', '2024-08-20 16:39:51', '2024-08-20 16:39:51'),
(14, 19, 'Bagaimana pendapat anda tentang harga produk lilin penerangan ini dibandingkan dengan kualitas yang anda dapatkan? Apakah anda merasa produk ini bernilai sesuai dengan harganya? Jelaskan.', 'bagaimana-pendapat-anda-tentang-harga-produk-lilin-penerangan-ini-dibandingkan-dengan-kualitas-yang-anda-dapatkan-apakah-anda-merasa-produk-ini-bernilai-sesuai-dengan-harganya-jelaskan-2', '2024-08-20 16:40:22', '2024-08-20 16:40:41'),
(16, 19, 'Apa alasan utama anda memilih produk lilin penerangan ini dibandingkan dengan produk lain yang sejenis? Bagaimana produk ini memenuhi kebutuhan anda?', 'apa-alasan-utama-anda-memilih-produk-lilin-penerangan-ini-dibandingkan-dengan-produk-lain-yang-sejenis-bagaimana-produk-ini-memenuhi-kebutuhan-anda', '2024-08-20 16:41:30', '2024-08-20 16:41:30'),
(17, 19, 'Ceritakan pengalaman anda menggunakan lilin penerangan ini. Apakah ada hal yang menurut anda sangat berkesan atau sebaliknya, perlu ditingkatkan?', 'ceritakan-pengalaman-anda-menggunakan-lilin-penerangan-ini-apakah-ada-hal-yang-menurut-anda-sangat-berkesan-atau-sebaliknya-perlu-ditingkatkan', '2024-08-20 16:41:58', '2024-08-20 16:41:58'),
(18, 19, 'Seberapa sering anda menggunakan lilin penerangan ini, dan dalam situasi apa saja anda menggunakannya? Apakah produk ini sesuai dengan kebutuhan anda?', 'seberapa-sering-anda-menggunakan-lilin-penerangan-ini-dan-dalam-situasi-apa-saja-anda-menggunakannya-apakah-produk-ini-sesuai-dengan-kebutuhan-anda', '2024-08-20 16:42:39', '2024-08-20 16:42:39'),
(19, 19, 'Apakah ada fitur atau kualitas tambahan yang anda harapkan dari lilin penerangan ini? Bagaimana menurut anda produk ini bisa lebih ditingkatkan?', 'apakah-ada-fitur-atau-kualitas-tambahan-yang-anda-harapkan-dari-lilin-penerangan-ini-bagaimana-menurut-anda-produk-ini-bisa-lebih-ditingkatkan', '2024-08-20 16:43:01', '2024-08-20 16:43:01'),
(20, 19, 'Bagaimana anda membandingkan lilin penerangan ini dengan produk sejenis yang pernah anda gunakan sebelumnya? Apakah ada perbedaan signifikan dalam kualitas atau pengalaman penggunaan?', 'bagaimana-anda-membandingkan-lilin-penerangan-ini-dengan-produk-sejenis-yang-pernah-anda-gunakan-sebelumnya-apakah-ada-perbedaan-signifikan-dalam-kualitas-atau-pengalaman-penggunaan', '2024-08-20 16:43:19', '2024-08-20 16:43:19'),
(21, 23, 'Bagaimana durasi waktu pembakaran lilin altar yang anda gunakan, dan apakah durasi tersebut sesuai dengan ekspektasi anda?', 'bagaimana-durasi-waktu-pembakaran-lilin-altar-yang-anda-gunakan-dan-apakah-durasi-tersebut-sesuai-dengan-ekspektasi-anda', '2024-08-20 16:44:50', '2024-08-20 16:44:57'),
(22, 23, 'Bagaimana anda menilai harga lilin altar ini dibandingkan dengan kualitas yang anda rasakan?', 'bagaimana-anda-menilai-harga-lilin-altar-ini-dibandingkan-dengan-kualitas-yang-anda-rasakan', '2024-08-20 16:45:58', '2024-08-20 16:46:07'),
(23, 23, 'Apa alasan utama anda memilih lilin altar ini dibandingkan produk serupa lainnya?', 'apa-alasan-utama-anda-memilih-lilin-altar-ini-dibandingkan-produk-serupa-lainnya', '2024-08-20 16:46:32', '2024-08-20 16:46:32'),
(24, 23, 'Ceritakan pengalaman anda menggunakan lilin altar ini dalam upacara atau ritual keagamaan. Apakah ada momen spesifik yang membuat anda terkesan?', 'ceritakan-pengalaman-anda-menggunakan-lilin-altar-ini-dalam-upacara-atau-ritual-keagamaan-apakah-ada-momen-spesifik-yang-membuat-anda-terkesan', '2024-08-20 16:46:59', '2024-08-20 16:46:59'),
(25, 23, 'Apakah anda mengalami kesulitan atau ketidaknyamanan saat menggunakan lilin altar ini? Jika ya, bagaimana menurut anda produk ini bisa ditingkatkan?', 'apakah-anda-mengalami-kesulitan-atau-ketidaknyamanan-saat-menggunakan-lilin-altar-ini-jika-ya-bagaimana-menurut-anda-produk-ini-bisa-ditingkatkan', '2024-08-20 16:47:59', '2024-08-20 16:47:59'),
(26, 23, 'Menurut anda, apakah lilin altar ini memberikan nilai tambah pada ritual atau upacara yang anda lakukan? Jelaskan mengapa atau mengapa tidak.', 'menurut-anda-apakah-lilin-altar-ini-memberikan-nilai-tambah-pada-ritual-atau-upacara-yang-anda-lakukan-jelaskan-mengapa-atau-mengapa-tidak', '2024-08-20 16:48:24', '2024-08-20 16:48:24'),
(27, 23, 'Jika anda diminta merekomendasikan lilin altar ini kepada orang lain, bagaimana anda akan menggambarkan produk ini?', 'jika-anda-diminta-merekomendasikan-lilin-altar-ini-kepada-orang-lain-bagaimana-anda-akan-menggambarkan-produk-ini', '2024-08-20 16:48:53', '2024-08-20 16:48:53');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `post_id` int NOT NULL,
  `category_id` int DEFAULT NULL,
  `user_id` bigint DEFAULT NULL,
  `title` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `excerpt` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `body` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `published_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`post_id`, `category_id`, `user_id`, `title`, `slug`, `image`, `excerpt`, `body`, `published_at`, `created_at`, `updated_at`) VALUES
(11, 48, 2, 'Memilih Lilin Altar Terbaik untuk Upacara Misa: Panduan Lengkap', 'memilih-lilin-altar-terbaik-untuk-upacara-misa-panduan-lengkap', 'post-images/BLybP4ZNQ9Z34XP86df24gX77l4nNOU5sTuMDQZP.jpg', 'Upacara Misa adalah momen sakral yang memerlukan persiapan matang, termasuk dalam pemilihan lilin altar. Lilin merupakan simbol penting dalam perayaan Misa, melambangkan terang Kristus yang menerangi...', '<div>Upacara Misa adalah momen sakral yang memerlukan persiapan matang, termasuk dalam pemilihan lilin altar. Lilin merupakan simbol penting dalam perayaan Misa, melambangkan terang Kristus yang menerangi dunia. Oleh karena itu, memilih lilin yang tepat sangatlah penting untuk menciptakan suasana khidmat dan penuh makna.&nbsp;<br><br>&nbsp;</div><div>Mengapa Lilin Altar Penting dalam Upacara Misa?<br><br></div><div>Lilin altar memiliki peran sentral dalam setiap upacara Misa. Selain sebagai simbol terang ilahi, lilin juga menambah estetika altar dan memperkuat suasana rohani. Menggunakan lilin berkualitas dapat memastikan bahwa perayaan Misa berjalan dengan lancar dan khidmat.<br><br></div><div>Tips Memilih Lilin Altar yang Tepat<br><br></div><div>Dalam memilih lilin altar untuk Misa, ada beberapa hal yang perlu diperhatikan:<br><br></div><ol><li><strong>Ukuran Lilin</strong>: Ukuran lilin altar sebaiknya disesuaikan dengan ukuran altar dan kebutuhan upacara. Kami menyediakan lilin altar dengan berbagai ukuran, mulai dari lilin kecil hingga lilin besar yang dapat menyala lebih lama.<br><br></li><li><strong>Kualitas Bahan</strong>: Pastikan lilin terbuat dari bahan berkualitas yang dapat terbakar dengan sempurna tanpa mengeluarkan asap yang mengganggu. Lilin altar kami terbuat dari bahan berkualitas tinggi yang memastikan nyala yang stabil dan tahan lama.<br><br></li><li><strong>Warna Lilin</strong>: Warna lilin juga memiliki makna tersendiri dalam liturgi. Biasanya, lilin putih digunakan dalam perayaan Misa, namun warna lain seperti merah atau ungu juga dapat dipilih sesuai dengan masa liturgi atau keperluan khusus.<br><br></li><li><strong>Ketahanan Api</strong>: Lilin yang digunakan dalam Misa harus memiliki ketahanan api yang baik, terutama jika digunakan dalam upacara yang berlangsung lama. Lilin altar kami dirancang untuk menyala lebih lama dan lebih stabil, memastikan perayaan Misa berjalan tanpa gangguan.<br><br></li></ol><div>Mengapa Memilih Lilin Altar dari Kami?<br><br></div><div>Kami menawarkan berbagai pilihan lilin altar yang dirancang khusus untuk memenuhi kebutuhan upacara Misa Anda. Berikut beberapa alasan mengapa lilin altar kami adalah pilihan terbaik:<br><br></div><ul><li><strong>Variasi Ukuran</strong>: Kami menyediakan lilin altar dalam berbagai ukuran, sesuai dengan kebutuhan Anda. Apakah Anda membutuhkan lilin kecil untuk perayaan singkat atau lilin besar untuk upacara panjang, kami memiliki semuanya.<br><br></li><li><strong>Kualitas Terbaik</strong>: Lilin altar kami terbuat dari bahan-bahan terbaik yang memastikan pembakaran yang bersih dan stabil. Nyala lilin kami tidak hanya indah tetapi juga tahan lama.<br><br></li><li><strong>Harga Terjangkau</strong>: Kami menawarkan lilin altar dengan harga yang kompetitif tanpa mengurangi kualitas. Dengan beragam pilihan ukuran, Anda dapat memilih lilin yang sesuai dengan anggaran Anda.<br><br></li><li><strong>Pelayanan Prima</strong>: Kami siap membantu Anda memilih lilin altar yang tepat sesuai dengan kebutuhan upacara Misa Anda. Tim kami akan dengan senang hati memberikan rekomendasi yang sesuai.<br><br></li></ul><div>Kesimpulan<br><br></div><div>Pemilihan lilin altar yang tepat sangat penting untuk menciptakan suasana Misa yang khidmat dan penuh makna. Dengan berbagai pilihan lilin altar yang kami tawarkan, Anda dapat menemukan lilin yang sempurna untuk setiap upacara. Percayakan kebutuhan lilin altar Anda kepada kami, dan rasakan perbedaannya dalam setiap perayaan Misa.<br><br></div><div><strong>Hubungi kami sekarang</strong> untuk memesan lilin altar yang sesuai dengan kebutuhan upacara Misa Anda. Kami siap membantu Anda menciptakan suasana sakral yang tak terlupakan!&nbsp;</div>', NULL, '2024-08-20 17:24:31', '2024-08-20 17:24:31'),
(12, 48, 2, 'Pentingnya Lilin Altar dalam Upacara Misa: Pilih yang Terbaik untuk Momen Sakral', 'pentingnya-lilin-altar-dalam-upacara-misa-pilih-yang-terbaik-untuk-momen-sakral', 'post-images/NgyH62z1maZkN44IzhmdoBdA3dSkklGA7iXcVGvy.jpg', 'Dalam setiap upacara Misa, lilin altar memegang peranan penting sebagai simbol terang Kristus yang menyinari dunia. Tidak hanya sekadar dekorasi, lilin altar memiliki makna mendalam yang menambah kekh...', '<div>Dalam setiap upacara Misa, lilin altar memegang peranan penting sebagai simbol terang Kristus yang menyinari dunia. Tidak hanya sekadar dekorasi, lilin altar memiliki makna mendalam yang menambah kekhusyukan dalam setiap perayaan Misa. Memilih lilin altar yang tepat adalah langkah penting untuk memastikan momen sakral ini berjalan dengan penuh kesan.&nbsp;<br><br>Mengapa Lilin Altar Sangat Diperlukan?<br><br></div><div>Lilin altar bukan hanya sekadar penerang, tetapi juga melambangkan kehadiran ilahi di tengah jemaat. Nyala lilin yang tenang dan stabil menciptakan atmosfer yang mendukung kekhidmatan ibadah. Lilin yang tepat dapat membantu memperkuat perasaan spiritual dan mengarahkan fokus jemaat pada perayaan yang berlangsung.<br><br></div><div>Pilihan Lilin Altar yang Tepat untuk Misa<br><br></div><div>Memilih lilin altar yang sesuai tidaklah sembarangan. Berikut beberapa hal yang perlu Anda perhatikan:<br><br></div><ol><li><strong>Ukuran dan Jenis Lilin</strong>: Ukuran lilin altar perlu disesuaikan dengan kebutuhan dan durasi upacara. Kami menyediakan lilin altar dengan berbagai ukuran, dari lilin kecil yang cocok untuk perayaan singkat, hingga lilin besar yang bisa bertahan lama untuk upacara panjang.<br><br></li><li><strong>Kualitas Bahan Lilin</strong>: Kualitas bahan sangat menentukan nyala lilin yang stabil dan bebas dari asap. Lilin altar kami terbuat dari bahan-bahan berkualitas tinggi yang memastikan pembakaran yang bersih dan tahan lama.<br><br></li><li><strong>Keindahan dan Ketahanan</strong>: Selain faktor spiritual, keindahan lilin juga berperan penting. Lilin altar yang kami tawarkan memiliki desain elegan dengan ketahanan nyala yang panjang, menjadikannya pilihan ideal untuk setiap upacara Misa.<br><br></li></ol><div>Lilin Altar Terbaik dari Kami untuk Kebutuhan Misa Anda<br><br></div><div>Kami memahami betapa pentingnya memilih lilin altar yang sesuai untuk upacara Misa. Oleh karena itu, kami menawarkan lilin altar yang dirancang khusus untuk memenuhi kebutuhan Anda, dengan berbagai pilihan ukuran dan kualitas terbaik. Berikut adalah beberapa keunggulan lilin altar kami:<br><br></div><ul><li><strong>Pilihan Ukuran yang Beragam</strong>: Kami menyediakan lilin altar dengan berbagai ukuran yang dapat disesuaikan dengan kebutuhan Anda. Apapun ukuran altar Anda, kami memiliki lilin yang tepat untuk Anda.<br><br></li><li><strong>Kualitas Unggul</strong>: Lilin altar kami terbuat dari bahan berkualitas yang tidak hanya memastikan pembakaran yang stabil, tetapi juga menghasilkan nyala yang indah dan tahan lama.<br><br></li><li><strong>Harga yang Bersahabat</strong>: Dengan berbagai pilihan ukuran dan kualitas, kami menawarkan lilin altar dengan harga yang kompetitif, memastikan Anda mendapatkan produk terbaik tanpa harus menguras kantong.<br><br></li><li><strong>Pelayanan yang Ramah dan Profesional</strong>: Tim kami siap membantu Anda memilih lilin altar yang sesuai dengan kebutuhan upacara Misa Anda. Kami berkomitmen untuk memberikan pelayanan terbaik dan memastikan kepuasan Anda.<br><br></li></ul><div>Kesimpulan<br><br></div><div>Lilin altar memegang peranan penting dalam menciptakan suasana khidmat dan penuh makna dalam setiap upacara Misa. Dengan memilih lilin altar dari kami, Anda tidak hanya mendapatkan produk berkualitas, tetapi juga pengalaman spiritual yang lebih mendalam. Percayakan kebutuhan lilin altar Anda kepada kami dan rasakan perbedaannya dalam setiap perayaan Misa.<br><br></div><div><strong>Jangan ragu untuk menghubungi kami</strong> untuk memesan lilin altar yang sempurna untuk upacara Misa Anda. Kami siap melayani Anda dengan produk terbaik dan harga yang terjangkau!</div>', NULL, '2024-08-20 17:27:09', '2024-08-20 17:27:09'),
(13, 48, 2, 'Cara Memilih Lilin Altar yang Sempurna untuk Upacara Misa Anda', 'cara-memilih-lilin-altar-yang-sempurna-untuk-upacara-misa-anda', 'post-images/w2QoN5TEpt5FYzLsTO2esWfCDKvv5qVUoDzW2672.jpg', 'Lilin altar adalah elemen yang tak terpisahkan dalam setiap upacara Misa, melambangkan terang Kristus yang menerangi umat-Nya. Selain sebagai simbol spiritual, lilin altar juga memainkan peran penting...', '<div>Lilin altar adalah elemen yang tak terpisahkan dalam setiap upacara Misa, melambangkan terang Kristus yang menerangi umat-Nya. Selain sebagai simbol spiritual, lilin altar juga memainkan peran penting dalam menciptakan suasana khidmat dan penuh makna. Memilih lilin altar yang tepat adalah langkah penting untuk memastikan setiap detail dalam upacara Misa berjalan dengan sempurna.&nbsp;<br><br>Pentingnya Lilin Altar dalam Upacara Misa<br><br></div><div>Setiap lilin altar yang dinyalakan selama Misa membawa simbolisme mendalam yang menghubungkan jemaat dengan terang Kristus. Nyala lilin yang stabil dan terang memfokuskan perhatian jemaat dan menambah nuansa sakral dalam liturgi. Oleh karena itu, pemilihan lilin altar harus dilakukan dengan cermat.<br><br></div><div>Panduan Memilih Lilin Altar yang Tepat<br><br></div><div>Berikut beberapa tips yang dapat membantu Anda memilih lilin altar yang paling sesuai untuk upacara Misa:<br><br></div><ol><li><strong>Sesuaikan dengan Ukuran Altar</strong>: Ukuran altar dan durasi upacara Misa harus menjadi pertimbangan utama. Kami menyediakan lilin altar dengan berbagai ukuran yang dapat disesuaikan dengan kebutuhan Anda, mulai dari lilin kecil untuk perayaan singkat hingga lilin besar untuk upacara yang lebih lama.<br><br></li><li><strong>Pilih Bahan Berkualitas Tinggi</strong>: Kualitas lilin sangat berpengaruh pada nyala api dan kestabilannya. Lilin altar kami dibuat dari bahan-bahan terbaik yang memastikan pembakaran bersih tanpa asap, memberikan nyala yang konsisten sepanjang upacara.<br><br></li><li><strong>Pertimbangkan Estetika dan Warna</strong>: Selain fungsi spiritual, lilin altar juga berfungsi sebagai elemen dekoratif yang memperindah altar. Kami menawarkan lilin dalam berbagai warna yang dapat disesuaikan dengan tema liturgi, meskipun lilin putih tetap menjadi pilihan utama untuk sebagian besar perayaan Misa.<br><br></li><li><strong>Pastikan Ketahanan Api</strong>: Upacara Misa yang berlangsung lama membutuhkan lilin yang memiliki ketahanan api yang baik. Lilin altar kami dirancang untuk menyala lebih lama, sehingga Anda tidak perlu khawatir lilin padam di tengah upacara.<br><br></li></ol><div>Kenapa Memilih Lilin Altar dari Kami?<br><br></div><div>Kami menawarkan berbagai pilihan lilin altar yang tidak hanya memenuhi kebutuhan spiritual Anda, tetapi juga memberikan nilai tambah dalam hal estetika dan ketahanan. Inilah beberapa alasan mengapa Anda harus memilih lilin altar dari kami:<br><br></div><ul><li><strong>Kualitas Premium</strong>: Lilin altar kami dibuat dari bahan berkualitas tinggi yang memastikan pembakaran yang stabil dan bebas dari asap. Nyala lilin kami tidak hanya indah tetapi juga tahan lama.<br><br></li><li><strong>Beragam Ukuran</strong>: Kami menyediakan lilin altar dengan berbagai ukuran, sehingga Anda dapat memilih yang paling sesuai dengan kebutuhan dan ukuran altar Anda.<br><br></li><li><strong>Harga Terjangkau</strong>: Meskipun kami menawarkan produk berkualitas tinggi, harga yang kami tawarkan tetap kompetitif dan sesuai dengan anggaran Anda.<br><br></li><li><strong>Pelayanan Pelanggan yang Prima</strong>: Kami berkomitmen untuk memberikan pelayanan terbaik kepada Anda. Tim kami siap membantu Anda memilih lilin altar yang tepat dan menjawab setiap pertanyaan yang mungkin Anda miliki.<br><br></li></ul><div>Kesimpulan<br><br></div><div>Lilin altar memainkan peran krusial dalam setiap upacara Misa, menciptakan suasana yang penuh khidmat dan makna. Dengan memilih lilin altar dari kami, Anda tidak hanya mendapatkan produk berkualitas, tetapi juga memastikan bahwa setiap detail upacara Misa Anda terpenuhi dengan sempurna.<br><br></div><div><strong>Segera hubungi kami</strong> untuk memesan lilin altar yang sesuai dengan kebutuhan upacara Misa Anda. Kami siap membantu Anda dalam menciptakan momen sakral yang tak terlupakan!</div>', NULL, '2024-08-20 17:29:45', '2024-08-20 17:29:45'),
(14, 49, 2, 'Lilin Penerangan: Solusi Terbaik Saat Pemadaman Listrik', 'lilin-penerangan-solusi-terbaik-saat-pemadaman-listrik', 'post-images/Gpl9ryk3iof6HsEqsIg2gcdjChoC5Dj7mZH2pCvc.jpg', 'Pemadaman listrik seringkali menjadi momen yang tidak menyenangkan, terutama saat kita membutuhkan penerangan untuk melanjutkan aktivitas sehari-hari. Salah satu solusi praktis yang dapat Anda andalka...', '<div>Pemadaman listrik seringkali menjadi momen yang tidak menyenangkan, terutama saat kita membutuhkan penerangan untuk melanjutkan aktivitas sehari-hari. Salah satu solusi praktis yang dapat Anda andalkan adalah lilin. Lilin tidak hanya memberikan cahaya, tetapi juga menciptakan suasana yang hangat dan nyaman.<br><br></div><div>Di toko kami, kami menawarkan berbagai jenis lilin penerangan yang dapat menjadi pilihan tepat untuk Anda. Dengan berbagai ukuran, lilin-lilin ini dirancang khusus untuk memberikan cahaya yang optimal dalam situasi darurat seperti pemadaman listrik.<br><br></div><div><strong>Mengapa Memilih Lilin Penerangan Kami?<br></strong><br></div><ol><li><strong>Beragam Ukuran</strong>: Kami menyediakan lilin dalam berbagai ukuran, mulai dari lilin kecil yang cocok untuk penggunaan pribadi hingga lilin besar yang dapat menerangi ruangan Anda secara efektif. Anda bisa memilih sesuai dengan kebutuhan dan tempat yang akan diterangi.<br><br></li><li><strong>Kualitas Terjamin</strong>: Lilin penerangan kami terbuat dari bahan berkualitas tinggi, memastikan bahwa lilin dapat menyala lebih lama dan memberikan cahaya yang stabil. Anda tidak perlu khawatir tentang lilin yang cepat habis saat Anda membutuhkannya.<br><br></li><li><strong>Desain Menarik</strong>: Selain fungsional, lilin-lilin ini juga hadir dengan desain yang menarik, sehingga Anda bisa menggunakannya sebagai dekorasi rumah saat tidak ada pemadaman listrik.<br><br></li></ol><div><strong>Tips Memilih Lilin Saat Pemadaman Listrik</strong>:<br><br></div><ul><li>Pilih ukuran lilin sesuai dengan luas ruangan. Lilin besar cocok untuk ruang tamu, sedangkan lilin kecil bisa diletakkan di meja atau kamar.</li><li>Pastikan untuk menempatkan lilin di permukaan yang stabil dan jauh dari bahan mudah terbakar.</li><li>Selalu awasi lilin yang menyala dan matikan jika tidak diperlukan lagi.</li></ul><div>Dengan memilih lilin penerangan dari kami, Anda tidak hanya mempersiapkan diri untuk menghadapi pemadaman listrik, tetapi juga menambah keindahan rumah Anda. Kunjungi toko kami dan temukan lilin yang paling sesuai dengan kebutuhan Anda.<br><br></div><div>Jadikan setiap pemadaman listrik sebagai kesempatan untuk menciptakan suasana yang hangat dan nyaman di rumah Anda dengan lilin penerangan kami!</div>', NULL, '2024-08-20 17:34:32', '2024-08-20 17:45:17'),
(15, 50, 2, 'Memahami Durasi Lilin: Pilih Lilin Penerangan yang Tepat untuk Kebutuhan Anda', 'memahami-durasi-lilin-penerangan-untuk-kebutuhan-anda', 'post-images/65m0YT9PhaJJwx58DoT8XhN2qhsJMcjNHTPxj0CG.jpg', 'Ketika berbicara tentang lilin, salah satu faktor terpenting yang perlu dipertimbangkan adalah durasi lilin. Durasi lilin mengacu pada berapa lama lilin dapat menyala sebelum habis, dan ini sangat pen...', '<div>Ketika berbicara tentang lilin, salah satu faktor terpenting yang perlu dipertimbangkan adalah durasi lilin. Durasi lilin mengacu pada berapa lama lilin dapat menyala sebelum habis, dan ini sangat penting, terutama saat Anda membutuhkannya sebagai sumber penerangan saat pemadaman listrik. Di toko kami, kami menyediakan berbagai lilin penerangan dengan durasi yang berbeda-beda, siap membantu Anda dalam situasi darurat.<br><br></div><div><strong>Mengapa Durasi Lilin Penting?<br></strong><br></div><ol><li><strong>Perencanaan yang Baik</strong>: Dengan memahami durasi lilin, Anda bisa merencanakan kebutuhan lilin yang tepat untuk menghadapi pemadaman listrik. Ini membantu Anda tetap tenang dan nyaman, mengetahui bahwa Anda memiliki sumber penerangan yang cukup.<br><br></li><li><strong>Efisiensi Penggunaan</strong>: Lilin dengan durasi lebih lama memungkinkan Anda menggunakan cahaya lilin untuk waktu yang lebih lama tanpa perlu menggantinya. Ini sangat berguna untuk menciptakan suasana hangat dan nyaman saat listrik padam.<br><br></li></ol><div><strong>Lilin Penerangan Kami dan Durasinya</strong>:<br><br></div><ul><li><strong>Lilin Kecil</strong>: Meskipun lebih kecil, lilin ini memiliki durasi yang cukup untuk penggunaan pribadi, cocok untuk ditempatkan di meja atau kamar. Ideal untuk situasi singkat.<br><br></li><li><strong>Lilin Besar</strong>: Dengan durasi yang lebih lama, lilin besar kami dapat memberikan cahaya untuk waktu yang lebih panjang, menjadikannya pilihan sempurna untuk ruang tamu atau area yang lebih luas.<br><br></li></ul><div><strong>Tips Memilih Lilin Berdasarkan Durasi</strong>:<br><br></div><ul><li>Pertimbangkan berapa lama Anda mungkin memerlukan penerangan. Jika pemadaman listrik berlangsung lama, pilihlah lilin dengan durasi yang lebih panjang.</li><li>Sesuaikan ukuran lilin dengan ruangan. Lilin besar untuk ruangan besar dan lilin kecil untuk tempat yang lebih terbatas.</li></ul><div>Dengan memilih lilin penerangan dari kami, Anda tidak hanya mendapatkan produk berkualitas tinggi tetapi juga memastikan bahwa Anda siap menghadapi pemadaman listrik dengan durasi yang tepat. Kunjungi toko kami dan temukan lilin yang sesuai dengan kebutuhan Anda, sehingga setiap momen pemadaman listrik dapat Anda lewati dengan nyaman!&nbsp;<br><br></div>', NULL, '2024-08-20 17:37:00', '2024-08-20 17:44:35'),
(16, 51, 2, 'Mengetahui Harga Lilin: Pilih Lilin Penerangan Berkualitas dengan Harga Terjangkau', 'mengetahui-harga-lilin-pilih-lilin-penerangan-berkualitas-dengan-harga-terjangkau', 'post-images/AgGkmkW4w33KLCFVgfCzUxA2RcZ1jlnnjWJqECwf.jpg', 'Ketika mencari lilin penerangan, salah satu faktor yang sering menjadi pertimbangan adalah harga. Memilih lilin yang tepat tidak hanya bergantung pada kualitas dan ukuran, tetapi juga pada harga yang...', '<div>Ketika mencari lilin penerangan, salah satu faktor yang sering menjadi pertimbangan adalah harga. Memilih lilin yang tepat tidak hanya bergantung pada kualitas dan ukuran, tetapi juga pada harga yang sesuai dengan anggaran Anda. Di toko kami, kami menawarkan berbagai lilin penerangan dengan harga yang terjangkau, sehingga Anda bisa mendapatkan produk berkualitas tanpa harus merogoh kocek terlalu dalam.<br><br></div><div><strong>Mengapa Mempertimbangkan Harga Lilin?<br></strong><br></div><ol><li><strong>Anggaran yang Efisien</strong>: Dengan mengetahui harga lilin, Anda dapat merencanakan anggaran dengan lebih baik. Ini memungkinkan Anda untuk membeli lilin yang sesuai dengan kebutuhan penerangan Anda tanpa menguras dompet.<br><br></li><li><strong>Pilihan Beragam</strong>: Harga yang beragam juga memberikan Anda fleksibilitas untuk memilih lilin berdasarkan ukuran dan jenis yang sesuai dengan kebutuhan Anda. Dari lilin kecil hingga lilin besar, semuanya tersedia dengan harga yang bersaing.<br><br></li></ol><div><strong>Produk Lilin Penerangan Kami</strong>:<br><br></div><ul><li><strong>Lilin Kecil</strong>: Lilin ini sangat terjangkau dan ideal untuk penggunaan pribadi atau di area kecil. Dengan harga yang bersahabat, Anda bisa membeli dalam jumlah banyak untuk memastikan ketersediaan saat pemadaman listrik.<br><br></li><li><strong>Lilin Besar</strong>: Lilin besar kami hadir dengan harga yang tetap terjangkau meskipun menawarkan durasi pembakaran yang lebih lama. Ini adalah pilihan yang tepat untuk menerangi ruangan besar tanpa harus mengeluarkan banyak uang.<br><br></li></ul><div><strong>Tips Memilih Lilin Berdasarkan Harga</strong>:<br><br></div><ul><li>Bandingkan harga dari berbagai ukuran dan jenis. Terkadang, membeli dalam jumlah lebih banyak dapat memberikan diskon yang lebih baik.</li><li>Pastikan untuk membaca informasi tentang kualitas lilin. Harga yang terjangkau tidak selalu berarti kualitas yang rendah.</li></ul><div>Dengan pilihan lilin penerangan dari kami, Anda bisa mendapatkan produk berkualitas dengan harga yang terjangkau. Kunjungi toko kami dan temukan lilin yang sesuai dengan kebutuhan Anda, sehingga Anda bisa bersiap menghadapi pemadaman listrik dengan nyaman dan ekonomis!<br><br></div>', NULL, '2024-08-20 17:39:41', '2024-08-20 17:45:40'),
(17, 52, 2, 'Lilin untuk Penerangan Malam: Solusi Ideal untuk Suasana Hangat dan Nyaman', 'lilin-untuk-penerangan-malam-solusi-ideal-untuk-suasana-hangat-dan-nyaman', 'post-images/2jrUPIavgxxYWY7pxGD3LSGbYzgjH1Zt4Gnv3lLI.jpg', 'Ketika malam tiba dan listrik padam, lilin menjadi salah satu solusi penerangan yang paling praktis dan memberikan suasana hangat di rumah. Memilih lilin yang tepat untuk penerangan malam sangat penti...', '<div>Ketika malam tiba dan listrik padam, lilin menjadi salah satu solusi penerangan yang paling praktis dan memberikan suasana hangat di rumah. Memilih lilin yang tepat untuk penerangan malam sangat penting, baik dari segi ukuran, harga, maupun kualitas. Di toko kami, kami menawarkan berbagai jenis lilin penerangan malam yang bisa memenuhi kebutuhan Anda.<br><br></div><div><strong>Mengapa Memilih Lilin untuk Penerangan Malam?<br></strong><br></div><ol><li><strong>Suasana yang Menenangkan</strong>: Cahaya lilin memberikan nuansa yang lebih hangat dan nyaman dibandingkan dengan penerangan biasa. Ini sangat cocok untuk menciptakan suasana santai saat berkumpul dengan keluarga atau saat bersantai sendiri.<br><br></li><li><strong>Fleksibilitas Penggunaan</strong>: Lilin dapat digunakan di berbagai tempat, baik di dalam rumah maupun di luar ruangan. Mereka sempurna untuk kegiatan malam seperti makan malam romantis, pesta, atau saat berkumpul bersama teman.<br><br></li></ol><div><strong>Produk Lilin Penerangan Malam Kami</strong>:<br><br></div><ul><li><strong>Lilin Mini</strong>: Dengan ukuran kecil dan harga terjangkau, lilin ini ideal untuk digunakan di meja samping atau sebagai aksesoris dekoratif. Anda dapat menyalakan beberapa lilin mini untuk menciptakan suasana yang lebih meriah.<br><br></li><li><strong>Lilin Ukuran Sedang</strong>: Lilin ini menawarkan pembakaran yang lebih lama dan lebih cocok untuk penggunaan sehari-hari di ruang tamu atau kamar tidur. Harganya tetap bersahabat, membuatnya menjadi pilihan yang populer di kalangan pelanggan.<br><br></li><li><strong>Lilin Besar</strong>: Untuk penerangan malam yang lebih maksimal, lilin besar kami adalah pilihan yang tepat. Dengan harga yang sedikit lebih tinggi, Anda mendapatkan durasi pembakaran yang lebih lama, sehingga tidak perlu khawatir tentang lilin habis saat Anda membutuhkan penerangan.<br><br></li></ul><div><strong>Tips Memilih Lilin untuk Penerangan Malam</strong>:<br><br></div><ul><li>Sesuaikan ukuran dan harga lilin dengan kebutuhan. Jika Anda merencanakan acara khusus, pertimbangkan untuk membeli lilin ukuran besar agar dapat menerangi ruang dengan lebih baik.<br><br></li><li>Perhatikan juga jenis bahan lilin. Lilin berbahan alami seperti lilin parafin atau lilin kedelai lebih ramah lingkungan dan aman digunakan di dalam rumah.<br><br></li></ul><div>Dengan berbagai pilihan lilin untuk penerangan malam yang kami tawarkan, Anda dapat menciptakan suasana hangat dan nyaman di rumah Anda. Kunjungi toko kami dan temukan lilin yang sesuai dengan kebutuhan dan anggaran Anda, sehingga malam Anda akan selalu terang dan berkesan!&nbsp;<br><br></div>', NULL, '2024-08-20 17:42:22', '2024-08-20 17:46:08'),
(18, 49, 2, 'Siap Menghadapi Pemadaman Listrik dengan Lilin Penerangan yang Tepat', 'siap-menghadapi-pemadaman-listrik-dengan-lilin-penerangan-yang-tepat', 'post-images/EtJcH8uXdqp3yrZXdZCuPa8vzpXYxVh0sTzBNjSv.jpg', 'Pemadaman listrik bisa terjadi kapan saja dan sering kali tanpa peringatan. Dalam situasi seperti ini, lilin penerangan menjadi solusi yang praktis dan efektif. Di toko kami, kami memiliki berbagai pi...', '<div>Pemadaman listrik bisa terjadi kapan saja dan sering kali tanpa peringatan. Dalam situasi seperti ini, lilin penerangan menjadi solusi yang praktis dan efektif. Di toko kami, kami memiliki berbagai pilihan lilin penerangan yang dapat memenuhi kebutuhan Anda selama pemadaman listrik.<br><br></div><div><strong>Mengapa Lilin Penerangan Penting?<br></strong><br></div><ol><li><strong>Sumber Penerangan Darurat</strong>: Lilin menyediakan cahaya yang cukup untuk menerangi ruangan Anda ketika listrik padam. Ini sangat membantu dalam menjaga kenyamanan dan keamanan, terutama saat malam hari.<br><br></li><li><strong>Menciptakan Suasana yang Hangat</strong>: Cahaya lilin memberikan nuansa yang berbeda dan menenangkan. Saat pemadaman listrik terjadi, Anda bisa menikmati momen berkualitas bersama keluarga dengan suasana yang lebih intim.<br><br></li></ol><div><strong>Produk Lilin Penerangan Kami</strong>:<br><br></div><ul><li><strong>Lilin Kecil</strong>: Cocok untuk diletakkan di meja atau kamar. Mudah dibawa dan tidak memakan banyak tempat.</li><li><strong>Lilin Besar</strong>: Memberikan cahaya lebih banyak dan ideal untuk ruang tamu atau area besar lainnya.</li></ul><div>Dengan memilih lilin penerangan dari kami, Anda akan selalu siap menghadapi pemadaman listrik. Pastikan untuk membeli lilin dengan ukuran dan jumlah yang sesuai dengan kebutuhan rumah Anda.&nbsp;<br><br></div>', NULL, '2024-08-20 17:44:04', '2024-08-20 17:44:04'),
(19, 51, 2, 'Harga Lilin: Temukan Lilin Penerangan Berkualitas dengan Budget Terjangkau', 'harga-lilin-temukan-lilin-penerangan-berkualitas-dengan-budget-terjangkau', 'post-images/bSRZ7PYSZyrAk6o0NwxcsrpcdOGKuIrSZAwy4Mek.jpg', 'Mencari lilin penerangan yang berkualitas tetapi tetap terjangkau? Salah satu aspek penting yang perlu Anda perhatikan adalah harga lilin. Dengan banyaknya pilihan yang ada, Anda bisa mendapatkan lili...', '<div>Mencari lilin penerangan yang berkualitas tetapi tetap terjangkau? Salah satu aspek penting yang perlu Anda perhatikan adalah harga lilin. Dengan banyaknya pilihan yang ada, Anda bisa mendapatkan lilin yang sesuai dengan kebutuhan tanpa harus mengeluarkan biaya besar. Di toko kami, kami menyediakan berbagai pilihan lilin penerangan dengan harga yang sangat bersaing.<br><br></div><div><strong>Mengapa Memilih Lilin Berdasarkan Harga?<br></strong><br></div><ol><li><strong>Keterjangkauan</strong>: Lilin penerangan dengan harga terjangkau memungkinkan Anda untuk memiliki stok yang cukup, sehingga Anda selalu siap menghadapi pemadaman listrik tanpa khawatir biaya yang tinggi.<br><br></li><li><strong>Kualitas dan Nilai</strong>: Harga yang terjangkau tidak selalu berarti kualitas yang rendah. Banyak lilin berkualitas tinggi yang ditawarkan dengan harga yang bersaing. Dengan memilih produk dari kami, Anda akan mendapatkan nilai terbaik untuk investasi Anda.<br><br></li></ol><div><strong>Pilihan Produk Lilin Penerangan Kami</strong>:<br><br></div><ul><li><strong>Lilin Mini</strong>: Dengan harga yang sangat ekonomis, lilin mini cocok untuk penggunaan sehari-hari. Anda bisa membeli dalam jumlah banyak untuk cadangan saat pemadaman listrik.<br><br></li><li><strong>Lilin Ukuran Sedang</strong>: Lilin ini menawarkan durasi yang lebih lama dengan harga yang tetap terjangkau. Cocok untuk digunakan di ruang tamu atau saat berkumpul bersama keluarga.<br><br></li></ul><div><strong>Tips Membeli Lilin Berdasarkan Harga</strong>:<br><br></div><ul><li>Selalu cek promosi atau diskon yang kami tawarkan. Ini bisa menjadi kesempatan bagus untuk membeli lebih banyak lilin dengan harga lebih murah.</li><li>Pertimbangkan ukuran dan kebutuhan Anda sebelum membeli. Pastikan Anda mendapatkan kombinasi terbaik antara harga dan kualitas.</li></ul><div>Dengan pilihan lilin penerangan yang kami tawarkan, Anda tidak perlu khawatir tentang biaya. Kunjungi toko kami dan temukan lilin yang sesuai dengan anggaran Anda, sehingga Anda siap menghadapi setiap pemadaman listrik dengan tenang!&nbsp;<br><br></div>', NULL, '2024-08-20 17:48:53', '2024-08-20 17:48:53'),
(20, 50, 2, 'Panduan Memilih Lilin Berdasarkan Durasi untuk Menghadapi Pemadaman Listrik', 'panduan-memilih-lilin-berdasarkan-durasi-untuk-menghadapi-pemadaman-listrik', 'post-images/8XZD2nX8kKDzqA7zzCjaa5rXmrSVQY8MYPhlvS0B.jpg', 'Pemadaman listrik dapat terjadi kapan saja, dan memiliki lilin sebagai sumber penerangan adalah pilihan bijak. Namun, penting untuk memahami durasi lilin sebelum memutuskan pilihan Anda. Durasi lilin...', '<div>Pemadaman listrik dapat terjadi kapan saja, dan memiliki lilin sebagai sumber penerangan adalah pilihan bijak. Namun, penting untuk memahami durasi lilin sebelum memutuskan pilihan Anda. Durasi lilin dapat menentukan seberapa efektif lilin Anda dalam menerangi ruang saat listrik padam.<br><br></div><div><strong>Kenapa Durasi Lilin Sangat Penting?<br></strong><br></div><ol><li><strong>Mempersiapkan Diri</strong>: Dengan mengetahui durasi lilin, Anda bisa mempersiapkan diri dengan lebih baik. Anda dapat menghitung jumlah lilin yang diperlukan untuk mengatasi pemadaman listrik yang mungkin berlangsung lama.<br><br></li><li><strong>Keamanan dan Kenyamanan</strong>: Durasi yang cukup memberikan rasa aman. Anda tidak perlu khawatir tentang kebosanan atau kekurangan penerangan saat menunggu listrik menyala kembali.<br><br></li></ol><div><strong>Lilin Penerangan Kami untuk Setiap Durasi</strong>:<br><br></div><ul><li><strong>Lilin Sedang</strong>: Lilin dengan durasi menengah cocok untuk penerangan sehari-hari. Ideal untuk digunakan di meja makan atau ruang tamu saat membutuhkan suasana hangat.<br><br></li><li><strong>Lilin Besar</strong>: Untuk kebutuhan durasi yang lebih panjang, lilin besar kami sangat ideal. Dengan waktu pembakaran yang lama, lilin ini dapat menerangi ruangan besar selama berjam-jam.<br><br></li></ul><div><strong>Cara Memilih Lilin Berdasarkan Durasi</strong>:<br><br></div><ul><li>Sesuaikan pilihan lilin dengan aktivitas Anda. Jika Anda merencanakan aktivitas di malam hari, pilih lilin dengan durasi yang lebih panjang.</li><li>Pastikan untuk memiliki cadangan lilin di rumah. Dengan begitu, Anda tidak akan terkejut jika pemadaman listrik berlangsung lebih lama dari yang diperkirakan.</li></ul><div>Dengan lilin penerangan dari kami, Anda akan selalu siap menghadapi pemadaman listrik. Kunjungi toko kami dan temukan lilin yang tepat sesuai dengan durasi yang Anda butuhkan, sehingga setiap momen tetap dapat diterangi dengan baik!&nbsp;<br><br></div>', NULL, '2024-08-20 17:53:36', '2024-08-20 17:53:36');

-- --------------------------------------------------------

--
-- Table structure for table `post_keyword`
--

CREATE TABLE `post_keyword` (
  `post_keyword_id` int NOT NULL,
  `post_id` int DEFAULT NULL,
  `keyword_id` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `post_keyword`
--

INSERT INTO `post_keyword` (`post_keyword_id`, `post_id`, `keyword_id`, `created_at`, `updated_at`) VALUES
(25, 11, 100, NULL, NULL),
(26, 11, 120, NULL, NULL),
(27, 11, 267, NULL, NULL),
(28, 12, 100, NULL, NULL),
(29, 12, 120, NULL, NULL),
(30, 12, 267, NULL, NULL),
(31, 13, 100, NULL, NULL),
(32, 13, 120, NULL, NULL),
(33, 13, 267, NULL, NULL),
(34, 14, 100, NULL, NULL),
(35, 14, 124, NULL, NULL),
(36, 14, 125, NULL, NULL),
(37, 15, 100, NULL, NULL),
(38, 15, 106, NULL, NULL),
(39, 16, 100, NULL, NULL),
(40, 16, 112, NULL, NULL),
(41, 17, 100, NULL, NULL),
(42, 17, 107, NULL, NULL),
(43, 17, 173, NULL, NULL),
(44, 18, 100, NULL, NULL),
(45, 18, 124, NULL, NULL),
(46, 18, 125, NULL, NULL),
(47, 19, 100, NULL, NULL),
(48, 19, 112, NULL, NULL),
(49, 20, 100, NULL, NULL),
(50, 20, 106, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `produks`
--

CREATE TABLE `produks` (
  `produk_id` int NOT NULL,
  `katprod_id` int DEFAULT NULL,
  `nama_produk` varchar(75) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(75) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `harga_produk` int NOT NULL,
  `image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `excerpt` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `body` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `produks`
--

INSERT INTO `produks` (`produk_id`, `katprod_id`, `nama_produk`, `slug`, `harga_produk`, `image`, `excerpt`, `body`, `created_at`, `updated_at`) VALUES
(12, 19, 'Lilin Jumbo Kecil', 'lilin-jumbo-kecil', 16500, 'post-images/scp9Azm7Ax6XFvAx1lbp9mZFtgyR81e9qSnczAru.jpg', 'Lilin Jumbo Kecil adalah pilihan sempurna untuk penerangan yang tahan lama dan efisien di berbagai situasi. Dengan ukuran yang kompak namun memberikan cahaya yang cukup terang, lilin ini ideal untuk d...', '<div><strong>Lilin Jumbo Kecil</strong> adalah pilihan sempurna untuk penerangan yang tahan lama dan efisien di berbagai situasi. Dengan ukuran yang kompak namun memberikan cahaya yang cukup terang, lilin ini ideal untuk digunakan saat darurat, pemadaman listrik, atau bahkan untuk menciptakan suasana yang tenang di rumah. Dibuat dari bahan berkualitas tinggi, lilin ini memiliki waktu bakar yang lama, sehingga Anda tidak perlu khawatir akan cepat habis. Desainnya yang sederhana dan praktis membuatnya mudah ditempatkan di berbagai tempat tanpa mengurangi estetika ruangan. Lilin Jumbo Kecil juga aman digunakan karena dirancang dengan sumbu yang stabil dan tidak mudah meleleh. Selain fungsinya sebagai sumber cahaya, lilin ini juga bisa menjadi tambahan dekorasi yang menarik di meja makan atau ruang tamu. Dengan <strong>Lilin Jumbo Kecil</strong>, Anda mendapatkan kombinasi sempurna antara fungsi dan keindahan dalam satu produk.&nbsp;</div>', '2024-08-17 23:37:58', '2024-08-19 10:56:33'),
(13, 19, 'Lilin Jumbo Tanggung', 'lilin-jumbo-tanggung', 19500, 'post-images/lrRE7PDi8hd2ecZjbEzJSZzhrvdTpUvYFQH6dBGv.jpg', 'Lilin Jumbo Sedang adalah pilihan sempurna untuk penerangan darurat maupun menciptakan suasana tenang di rumah Anda. Dengan ukuran yang lebih besar dari lilin biasa, lilin ini memiliki daya tahan yang...', '<div><strong>Lilin Jumbo Sedang</strong> adalah pilihan sempurna untuk penerangan darurat maupun menciptakan suasana tenang di rumah Anda. Dengan ukuran yang lebih besar dari lilin biasa, lilin ini memiliki daya tahan yang lama, memberikan cahaya yang stabil selama berjam-jam. Dibuat dari bahan berkualitas tinggi, lilin ini tidak mudah meleleh, sehingga aman digunakan di berbagai kondisi. Lilin ini juga menghasilkan nyala api yang terang dan konsisten, ideal untuk menerangi ruangan dengan pencahayaan yang nyaman. Desainnya yang klasik dan elegan membuatnya cocok ditempatkan di berbagai sudut ruangan. Selain itu, <strong>Lilin Jumbo Sedang</strong> hadir dengan aroma netral yang tidak mengganggu, memastikan kenyamanan pengguna. Produk ini adalah solusi praktis dan andal untuk kebutuhan penerangan Anda sehari-hari.&nbsp;</div>', '2024-08-17 23:39:05', '2024-08-19 10:56:47'),
(14, 19, 'Lilin Jumbo Besar', 'lilin-jumbo-besar', 20000, 'post-images/dVHoLINwUZNN7PRg9NPE8pcAjI9pbSFVI6KBjzXX.jpg', 'Lilin Jumbo Besar adalah solusi sempurna untuk kebutuhan penerangan dengan durasi panjang dan intensitas cahaya yang kuat. Dibuat dari bahan berkualitas tinggi, lilin ini dirancang untuk memberikan ny...', '<div><strong>Lilin Jumbo Besar</strong> adalah solusi sempurna untuk kebutuhan penerangan dengan durasi panjang dan intensitas cahaya yang kuat. Dibuat dari bahan berkualitas tinggi, lilin ini dirancang untuk memberikan nyala yang stabil dan tahan lama, cocok untuk digunakan di berbagai situasi, baik saat darurat maupun sebagai elemen dekoratif. Ukurannya yang besar memastikan nyala api yang lebih besar dan lebih terang dibandingkan lilin biasa, sehingga dapat menerangi ruangan dengan efektif. Lilin ini juga hadir dengan desain yang sederhana namun elegan, menambah kesan klasik pada lingkungan sekitar. Ideal untuk penggunaan di acara-acara outdoor, rumah ibadah, atau saat pemadaman listrik. Dengan <strong>Lilin Jumbo Besar</strong>, Anda mendapatkan penerangan yang handal sekaligus meningkatkan estetika ruang. Keamanannya juga terjamin, dengan bahan yang dipilih khusus untuk meminimalisir risiko percikan api atau asap berlebih.&nbsp;</div>', '2024-08-17 23:40:21', '2024-08-19 10:57:00'),
(15, 21, 'Benang Lilin', 'benang-lilin', 52000, 'post-images/tE2zqjzBY7dz5JRkHjNKEQRf23LNQReczgPgWv8N.jpg', 'Benang lilin adalah komponen esensial yang digunakan dalam produksi lilin berkualitas tinggi. Terbuat dari bahan yang kuat dan tahan lama, benang ini memastikan nyala api yang stabil dan merata pada l...', '<div><strong>Benang lilin</strong> adalah komponen esensial yang digunakan dalam produksi lilin berkualitas tinggi. Terbuat dari bahan yang kuat dan tahan lama, benang ini memastikan nyala api yang stabil dan merata pada lilin. Ketika dibakar, benang lilin menghasilkan sedikit asap, menjaga kualitas udara di sekitar tetap bersih. Selain itu, benang ini dirancang untuk membakar secara konsisten hingga lilin habis, tanpa menyebabkan lilin meleleh secara berlebihan. Bentuk dan ketebalan <strong>benang lilin</strong> juga dirancang agar sesuai dengan berbagai ukuran lilin, mulai dari lilin kecil hingga besar. Penggunaan <strong>benang lilin</strong> yang tepat akan memperpanjang umur lilin dan memberikan pengalaman yang lebih aman dan nyaman bagi pengguna. Oleh karena itu, benang lilin ini menjadi pilihan utama bagi para produsen lilin yang mengutamakan kualitas dan performa produk.&nbsp;</div>', '2024-08-17 23:42:25', '2024-08-19 10:57:10'),
(16, 25, 'Stearic Acid 1840', 'stearic-acid-1840', 725000, 'post-images/VNKGGBu0bnxuZdWXAF4tFFgn3Ffb83a1rdthCP6c.jpg', 'Bahan lilin Stearic Acid 1840 adalah bahan baku berkualitas tinggi yang sering digunakan dalam pembuatan lilin untuk meningkatkan kekuatan dan ketahanan lilin. Dengan kandungan stearat yang tinggi, ba...', '<div>Bahan lilin <strong>Stearic Acid 1840</strong> adalah bahan baku berkualitas tinggi yang sering digunakan dalam pembuatan lilin untuk meningkatkan kekuatan dan ketahanan lilin. Dengan kandungan stearat yang tinggi, bahan ini memberikan konsistensi dan kekerasan yang optimal pada lilin, memastikan hasil akhir yang halus dan tahan lama. <strong>Stearic Acid 1840</strong> juga berfungsi sebagai pengikat dan pembentuk struktur pada lilin, mencegah penyusutan dan mengurangi efek goresan pada permukaan lilin setelah proses pencetakan. Selain itu, bahan ini memiliki titik lebur yang tinggi, yang membuatnya ideal untuk pembuatan lilin dengan suhu tinggi. Dalam industri lilin, <strong>Stearic Acid 1840</strong> sering digunakan untuk menghasilkan lilin dengan kualitas yang lebih baik dan penampilan yang lebih profesional. Dengan sifatnya yang mudah dicampur dan stabil, <strong>Stearic Acid 1840</strong> memastikan setiap batch lilin yang diproduksi memiliki kualitas yang konsisten dan memuaskan.&nbsp;</div>', '2024-08-17 23:43:47', '2024-08-19 11:11:04'),
(21, 25, 'Stearic Acid 1800', 'stearic-acid-1800', 750000, 'post-images/RQDlnNlV3NroqD9929fXDjeIM5V6U0m9L0Cg6bRO.jpg', 'Stearic acid adalah bahan kimia yang sangat penting dalam industri lilin, digunakan untuk meningkatkan kualitas dan performa produk lilin. Dengan titik lebur sekitar 70°C, stearic acid memberikan keke...', '<div>Stearic acid adalah bahan kimia yang sangat penting dalam industri lilin, digunakan untuk meningkatkan kualitas dan performa produk lilin. Dengan titik lebur sekitar 70°C, stearic acid memberikan kekerasan dan kestabilan pada lilin, memastikan bahwa lilin tidak mudah meleleh di suhu ruangan. Dalam konteks pembuatan lilin, stearic acid membantu lilin membakar lebih lama dan merata, serta memberikan penampilan akhir yang halus dan mengkilap. Produk ini juga berfungsi sebagai agen pengemulsi, membantu mencampur bahan-bahan yang tidak larut dalam air dengan baik, sehingga menghasilkan lilin yang lebih homogen. Selain itu, stearic acid memiliki sifat antimikroba yang dapat membantu memperpanjang umur simpan lilin dengan menghambat pertumbuhan mikroorganisme. Dengan penggunaan yang tepat, stearic acid memastikan bahwa lilin yang dihasilkan tidak hanya menarik secara visual tetapi juga fungsional dan tahan lama. Ideal untuk berbagai aplikasi, dari lilin dekoratif hingga lilin untuk kebutuhan sehari-hari, stearic acid adalah komponen kunci dalam menciptakan produk lilin berkualitas tinggi.&nbsp;</div>', '2024-08-19 10:42:35', '2024-08-19 11:11:18'),
(22, 23, 'Lilin Altar Kecil', 'lilin-altar-kecil', 18500, 'post-images/TQz3dpZ4etq3jzAHGOjUwCx1WX8EW3JvrciEt3bl.jpg', 'Lilin altar kecil kami adalah pilihan ideal untuk menambah suasana spiritual dan damai di berbagai kesempatan. Dirancang dengan ukuran kompak, lilin ini cocok untuk digunakan di altar, ruang meditasi,...', '<div><strong>Lilin altar kecil</strong> kami adalah pilihan ideal untuk menambah suasana spiritual dan damai di berbagai kesempatan. Dirancang dengan ukuran kompak, lilin ini cocok untuk digunakan di altar, ruang meditasi, atau sebagai tambahan dalam ritual dan perayaan. Dibuat dari bahan berkualitas tinggi, lilin ini memberikan cahaya lembut yang menenangkan, dengan aroma yang dapat membantu menciptakan suasana tenang dan reflektif. Kemasan yang elegan dan fungsional memudahkan penempatan di berbagai lokasi, sementara desainnya yang sederhana membuatnya mudah dipadukan dengan dekorasi apapun. <strong>Lilin altar kecil</strong> ini juga merupakan pilihan yang baik sebagai hadiah untuk teman atau keluarga yang menghargai praktik spiritual atau meditasi. Dengan daya tahan yang baik dan pembakaran yang merata, lilin ini akan mendampingi momen-momen penting dalam hidup Anda dengan kehangatan dan kesederhanaan.&nbsp;</div>', '2024-08-19 10:48:48', '2024-08-19 11:25:17'),
(23, 24, 'Kemasan Bintang Garuda', 'kemasan-bintang-garuda', 9500, 'post-images/PKL07tFRODI9xWFzckTslAp4Ol7zsLppcbUUN1NA.jpg', 'Kemasan produk Bintang Garuda dirancang untuk memberikan kesan elegan dan berkualitas tinggi, mencerminkan komitmen kami terhadap keunggulan dan inovasi. Setiap paket dibungkus dengan bahan premium ya...', '<div><strong>Kemasan produk Bintang Garuda</strong> dirancang untuk memberikan kesan elegan dan berkualitas tinggi, mencerminkan komitmen kami terhadap keunggulan dan inovasi. Setiap paket dibungkus dengan bahan premium yang memberikan perlindungan optimal terhadap produk di dalamnya. Desain kemasan yang modern dan stylish memadukan warna-warna yang menarik dengan grafis yang mencolok, memastikan produk kami mudah dikenali dan menonjol di rak-rak toko. Informasi produk disajikan dengan jelas, termasuk deskripsi, spesifikasi, dan instruksi penggunaan, untuk memudahkan konsumen dalam membuat keputusan. Kemasan ini tidak hanya berfungsi untuk melindungi tetapi juga meningkatkan daya tarik visual produk, menjadikannya pilihan yang tepat untuk hadiah maupun penggunaan pribadi. Kami berkomitmen untuk mengurangi dampak lingkungan dengan menggunakan bahan daur ulang yang ramah lingkungan. Dengan <strong>Bintang Garuda</strong>, Anda tidak hanya mendapatkan produk berkualitas, tetapi juga pengalaman kemasan yang premium dan bertanggung jawab.&nbsp;</div>', '2024-08-19 11:00:52', '2024-08-19 11:00:52'),
(24, 24, 'Kemasan Lumba-Lumba', 'kemasan-lumba-lumba', 8500, 'post-images/7MynsFYjHlYPBIx3SSf1yIqExfdSaG23kcMR5pPP.jpg', 'Kemasan produk Lumba-Lumba dirancang dengan keindahan dan fungsi yang mengutamakan kualitas serta daya tarik visual. Terbuat dari bahan yang ramah lingkungan dan tahan lama, kemasan ini tidak hanya me...', '<div><strong>Kemasan produk Lumba-Lumba</strong> dirancang dengan keindahan dan fungsi yang mengutamakan kualitas serta daya tarik visual. Terbuat dari bahan yang ramah lingkungan dan tahan lama, kemasan ini tidak hanya melindungi produk dengan aman tetapi juga menonjolkan karakteristik uniknya. Dengan desain yang segar dan berwarna cerah, kemasan ini menampilkan ilustrasi lucu dari lumba-lumba yang membuatnya terlihat ceria dan menarik. Informasi produk disajikan dengan jelas dan mudah dibaca, termasuk deskripsi, bahan, dan petunjuk penggunaan, memastikan pelanggan mendapatkan semua informasi yang diperlukan dengan mudah. Kemasan ini juga dilengkapi dengan tutup yang rapat untuk menjaga kesegaran produk, serta fitur praktis untuk kemudahan penggunaan dan penyimpanan. Setiap detail pada kemasan, mulai dari material hingga desain grafis, dipilih dengan cermat untuk meningkatkan pengalaman pengguna dan menciptakan kesan yang menyenangkan.&nbsp;</div>', '2024-08-19 11:02:02', '2024-08-19 11:02:02'),
(25, 24, 'Kemasan Mahkota', 'kemasan-mahkota', 11000, 'post-images/YMcmPF5WltYvRjvI5CCZ8QCdPzdQajfsFEYzDlSg.jpg', 'Kemasan produk Mahkota dirancang dengan elegan dan praktis, mencerminkan kualitas premium dari produk di dalamnya. Setiap kemasan dilengkapi dengan desain yang modern dan menarik, menggunakan bahan be...', '<div><strong>Kemasan produk Mahkota</strong> dirancang dengan elegan dan praktis, mencerminkan kualitas premium dari produk di dalamnya. Setiap kemasan dilengkapi dengan desain yang modern dan menarik, menggunakan bahan berkualitas tinggi yang menjaga kesegaran dan keaslian produk. Dengan warna yang elegan dan detail yang halus, kemasan ini tidak hanya melindungi produk, tetapi juga meningkatkan daya tarik visualnya di rak toko. Label yang informatif dan mudah dibaca memudahkan konsumen untuk memahami informasi penting tentang produk, termasuk bahan, cara penggunaan, dan tanggal kedaluwarsa. Kemasan Mahkota juga mempertimbangkan keberlanjutan dengan menggunakan bahan ramah lingkungan yang dapat didaur ulang. Fitur tutup yang rapat memastikan bahwa produk tetap segar dan aman dari kontaminasi. Dengan kemasan ini, Mahkota tidak hanya menawarkan produk berkualitas, tetapi juga pengalaman pelanggan yang menyenangkan dan memuaskan.&nbsp;</div>', '2024-08-19 11:04:12', '2024-08-19 11:04:12'),
(26, 25, 'Stearic Acid 1805', 'stearic-acid-1805', 765000, 'post-images/jtlljFEUdqWVt5ub2kSMBJiRNa44o1mv0TvLH4fS.jpg', 'Stearic acid 1805 adalah bahan baku lilin yang dikenal karena kemurnian dan kualitasnya yang tinggi. Digunakan secara luas dalam industri pembuatan lilin, stearic acid berfungsi sebagai bahan pengikat...', '<div><strong>Stearic acid 1805</strong> adalah bahan baku lilin yang dikenal karena kemurnian dan kualitasnya yang tinggi. Digunakan secara luas dalam industri pembuatan lilin, stearic acid berfungsi sebagai bahan pengikat dan penguat struktur lilin, memberikan kekuatan dan kestabilan pada produk akhir. Dengan titik leleh yang stabil dan kemampuan untuk meningkatkan kekerasan lilin, stearic acid memastikan bahwa lilin yang dihasilkan memiliki penampilan yang konsisten dan tidak mudah meleleh pada suhu kamar. Selain itu, bahan ini juga memberikan efek glossy pada permukaan lilin, meningkatkan daya tarik visual produk. Cocok untuk berbagai jenis lilin, termasuk lilin aromaterapi dan dekoratif, <strong>stearic acid 1805</strong> memberikan performa yang dapat diandalkan dan hasil akhir yang memuaskan. Kualitas tinggi stearic acid juga menjadikannya pilihan ideal untuk aplikasi yang memerlukan konsistensi dan ketahanan dalam jangka panjang. Dengan kemasan yang aman dan mudah digunakan, bahan ini merupakan solusi efektif untuk meningkatkan kualitas dan daya tahan lilin yang diproduksi.&nbsp;<br><br></div>', '2024-08-19 11:08:47', '2024-08-19 11:11:28'),
(27, 25, 'Palm Wax', 'palm-wax', 685000, 'post-images/cgi1di1m5EwCeOWTwpzt36wmWBOPYerZQwuUZcYd.jpg', 'Palm wax adalah bahan lilin alami yang terbuat dari minyak kelapa sawit, yang dikenal karena keberlanjutannya dan ramah lingkungan. Palm wax menawarkan karakteristik unik seperti kepadatan yang tinggi...', '<div><strong>Palm wax</strong> adalah bahan lilin alami yang terbuat dari minyak kelapa sawit, yang dikenal karena keberlanjutannya dan ramah lingkungan. Palm wax menawarkan karakteristik unik seperti kepadatan yang tinggi dan daya tahan yang baik terhadap suhu, membuatnya ideal untuk pembuatan lilin yang berkualitas. Dengan penampilan yang berkilau dan tekstur yang rapuh, lilin <strong>palm wax</strong> memberikan efek estetik yang elegan dan mewah. Selain itu, lilin ini memiliki pembakaran yang bersih dan tidak menghasilkan jelaga, memberikan pengalaman yang lebih sehat dan aman bagi pengguna. <strong>Palm wax</strong> juga dapat dengan mudah dicampur dengan berbagai wewangian dan pewarna, memungkinkan kreativitas tanpa batas dalam pembuatan lilin. Keberadaan bahan ini dalam produk lilin menunjukkan komitmen terhadap keberlanjutan, karena produksi <strong>palm wax</strong> umumnya mengikuti praktik yang ramah lingkungan dan bertanggung jawab. Dalam industri lilin, palm wax semakin populer karena manfaat fungsional dan estetika yang ditawarkannya, serta kontribusinya terhadap upaya pelestarian lingkungan.&nbsp;</div>', '2024-08-19 11:16:40', '2024-08-19 11:17:24'),
(28, 26, 'Mesin Cetak Lilin', 'mesin-cetak-lilin', 1680000, 'post-images/MHAYmJLzSp6rh6Psh6f7p8GNisSh9v8mLvxKK4AQ.jpg', 'Mesin cetak lilin kami adalah solusi mutakhir untuk menghasilkan produk lilin dengan kualitas tinggi dan konsistensi yang optimal. Dirancang dengan teknologi canggih, mesin ini memungkinkan proses pen...', '<div>Mesin cetak lilin kami adalah solusi mutakhir untuk menghasilkan produk lilin dengan kualitas tinggi dan konsistensi yang optimal. Dirancang dengan teknologi canggih, mesin ini memungkinkan proses pencetakan lilin dengan presisi yang tinggi, memastikan bentuk dan ukuran lilin sesuai dengan spesifikasi yang diinginkan. Dengan fitur otomatisasi yang efisien, mesin ini mempercepat produksi dan mengurangi tenaga kerja manual, sementara sistem kontrol suhu dan tekanan yang terintegrasi menjaga kualitas cetakan pada tingkat tertinggi. Dilengkapi dengan berbagai mode cetak untuk memenuhi berbagai kebutuhan desain, mesin ini sangat cocok untuk pembuatan lilin aromaterapi, lilin dekoratif, dan lilin untuk keperluan lainnya. Kemudahan dalam pemeliharaan dan penggunaan menjadikannya pilihan ideal bagi produsen lilin yang ingin meningkatkan produktivitas dan efisiensi. Baik untuk skala kecil maupun besar, mesin cetak lilin kami menawarkan solusi yang handal dan terjangkau untuk memenuhi kebutuhan produksi lilin Anda.&nbsp;</div>', '2024-08-19 11:21:07', '2024-08-19 11:21:07'),
(29, 23, 'Lilin Altar Tanggung', 'lilin-altar-tanggung', 22000, 'post-images/8apfJVkhthaP6pxcYEjK3JvPS5pe4X7dTB9Qat17.jpg', 'Lilin Altar Tanggung adalah pilihan ideal untuk menciptakan suasana yang tenang dan sakral dalam setiap upacara atau meditasi. Dengan ukuran yang kompak namun memberikan pencahayaan yang memadai, lili...', '<div><strong>Lilin Altar Tanggung</strong> adalah pilihan ideal untuk menciptakan suasana yang tenang dan sakral dalam setiap upacara atau meditasi. Dengan ukuran yang kompak namun memberikan pencahayaan yang memadai, lilin ini dirancang khusus untuk altar atau ruang yang memerlukan cahaya lembut dan stabil. Terbuat dari bahan berkualitas tinggi, lilin ini menawarkan pembakaran yang merata dan tahan lama, memungkinkan Anda menikmati keindahan nyala api tanpa gangguan. Aroma wangi yang lembut dari lilin ini juga menambah suasana spiritual, membuat setiap momen berdoa atau bermeditasi menjadi lebih khusyuk. Desainnya yang elegan dan warna yang beragam memungkinkan lilin ini cocok dengan berbagai tema dekorasi, baik untuk penggunaan pribadi di rumah maupun dalam acara keagamaan. Lilin Altar Tanggung adalah pilihan yang tepat untuk meningkatkan pengalaman spiritual Anda dengan sentuhan keindahan dan kedamaian.&nbsp;</div>', '2024-08-19 11:23:12', '2024-08-19 11:23:12'),
(30, 23, 'Lilin Altar Besar', 'lilin-altar-besar', 24000, 'post-images/CSFr0JLOgAVpGaJB1UvwjvAqJVi3QlD0W9Of3ZBI.jpg', 'Lilin Altar Besar kami adalah pilihan ideal untuk kebutuhan spiritual dan dekoratif Anda, dirancang khusus untuk memberikan cahaya yang memancarkan kehangatan dan kedamaian. Terbuat dari bahan berkual...', '<div><strong>Lilin Altar Besar</strong> kami adalah pilihan ideal untuk kebutuhan spiritual dan dekoratif Anda, dirancang khusus untuk memberikan cahaya yang memancarkan kehangatan dan kedamaian. Terbuat dari bahan berkualitas tinggi, lilin ini menawarkan waktu pembakaran yang lama, menjadikannya sempurna untuk upacara keagamaan, meditasi, atau sebagai pusat perhatian dalam pengaturan altar. Dengan ukuran besar yang membuatnya mencolok, lilin ini memberikan cahaya yang merata dan tahan lama, menciptakan atmosfer yang tenang dan menenangkan. Kualitas pembuatan yang cermat memastikan bahwa lilin ini memiliki pembakaran yang bersih dan stabil tanpa menghasilkan asap berlebihan. Desainnya yang elegan dan warna yang serasi membuatnya cocok untuk berbagai tema dekorasi, menjadikannya tambahan yang sempurna untuk ruang Anda. Ideal untuk penggunaan di rumah, gereja, atau tempat ibadah, lilin altar besar ini adalah simbol spiritual yang menggabungkan fungsi dan estetika dalam satu produk berkualitas tinggi.&nbsp;</div>', '2024-08-19 11:24:33', '2024-08-19 11:24:33');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint NOT NULL,
  `name` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `is_admin` tinyint(1) NOT NULL DEFAULT '0',
  `is_pemilik` tinyint(1) NOT NULL DEFAULT '0',
  `active_status` tinyint(1) NOT NULL DEFAULT '0',
  `avatar` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'avatar.png',
  `dark_mode` tinyint(1) NOT NULL DEFAULT '0',
  `messenger_color` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `is_admin`, `is_pemilik`, `active_status`, `avatar`, `dark_mode`, `messenger_color`) VALUES
(1, 'pieter', 'kokoh', 'kokoh@gmail.com', NULL, '$2y$10$XzWSZhzweG3YG8qxtiAlwOF.nJhpMGvWVgf1vB.xLSpK0GF64MDUC', NULL, '2024-07-29 04:48:21', '2024-07-29 04:48:21', 0, 1, 0, 'avatar.png', 0, NULL),
(2, 'rizjar', 'dawn', 'dawn@gmail.com', NULL, '$2y$10$t42wwRsC.qk2B.YW6/LmPOt0Hftqyv/NIXKJNTkmFk5nSHU5ppceO', NULL, '2024-07-29 04:51:06', '2024-08-18 23:32:59', 1, 0, 1, 'avatar.png', 1, NULL),
(3, 'baskoro', 'gogox', 'gogox@gmail.com', NULL, '$2y$10$zJqeE9GpAnA5HaHH5dXiU.7FXsmmRG6iLRt3j5adEZmYMYo77f.eG', NULL, '2024-07-29 07:39:39', '2024-08-18 16:50:26', 0, 0, 1, 'avatar.png', 0, '#2180f3'),
(4, 'riko', 'logan', 'logan@gmail.com', NULL, '$2y$10$vLoS3ALtLggJRuE/KQvU5ei1BUhzIChn3qR8io8VuYUTbOwHGxOeS', NULL, '2024-07-29 09:22:39', '2024-07-29 09:22:39', 0, 0, 0, 'avatar.png', 0, NULL),
(5, 'razoredge', 'uncle', 'uncle@gmail.com', NULL, '$2y$10$y1y.39jkkm3r10CoRHBNS.rB8PFUGkKOPFCwSgJS4bP.G4qC/RB8m', NULL, '2024-07-29 10:55:58', '2024-08-20 17:05:27', 0, 0, 0, 'avatar.png', 0, NULL),
(6, 'evan', 'ryokatsu', 'ryokatsu@gmail.com', NULL, '$2y$10$.xEIJorme61WvvNf3gfNd.TDMvNffDyuhdPWUBXwehx3Hqx2Jq5zW', NULL, '2024-07-29 21:18:46', '2024-07-29 21:18:46', 0, 0, 0, 'avatar.png', 0, NULL),
(7, 'haze', 'goku', 'goku@gmail.com', NULL, '$2y$10$5jU0TSufn0n/xXOaMLcpregcykTfj6SoBDOan/N.dKqnfA0tR1Zii', NULL, '2024-07-30 00:34:12', '2024-07-30 00:34:12', 0, 0, 0, 'avatar.png', 0, NULL),
(8, 'bin', 'hiyou', 'bin@gmail.com', NULL, '$2y$10$7vhu5hbMOBtceo.8sR8VyukCezMxALFr3pVKL4RJHYVRP5IAVS/Ba', NULL, '2024-07-30 09:18:28', '2024-07-30 09:18:28', 0, 0, 0, 'avatar.png', 0, NULL),
(9, 'helena', 'helena', 'helena@gmail.com', NULL, '$2y$10$zhXxNqE/Kp1/iUuxFQeRxO8NMTLpCFokW/Kcj2mGdtSfYPxcwkZem', NULL, '2024-08-18 15:25:36', '2024-08-20 17:05:53', 0, 0, 0, 'avatar.png', 1, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`category_id`),
  ADD UNIQUE KEY `categories_name_unique` (`name`),
  ADD UNIQUE KEY `categories_slug_unique` (`slug`);

--
-- Indexes for table `category_keyword`
--
ALTER TABLE `category_keyword`
  ADD PRIMARY KEY (`category_keyword_id`),
  ADD KEY `category_keyword_category_id_foreign` (`category_id`),
  ADD KEY `category_keyword_keyword_id_foreign` (`keyword_id`);

--
-- Indexes for table `ch_favorites`
--
ALTER TABLE `ch_favorites`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ch_messages`
--
ALTER TABLE `ch_messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`feedback_id`),
  ADD KEY `feedback_pertanyaan_id_foreign` (`pertanyaan_id`),
  ADD KEY `feedback_produk_id_foreign` (`produk_id`),
  ADD KEY `feedback_user_id_foreign` (`user_id`);

--
-- Indexes for table `katprods`
--
ALTER TABLE `katprods`
  ADD PRIMARY KEY (`katprod_id`),
  ADD UNIQUE KEY `katprods_namakatprod_unique` (`namakatprod`),
  ADD UNIQUE KEY `katprods_slug_unique` (`slug`);

--
-- Indexes for table `keywords`
--
ALTER TABLE `keywords`
  ADD PRIMARY KEY (`keyword_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `pertanyaans`
--
ALTER TABLE `pertanyaans`
  ADD PRIMARY KEY (`pertanyaan_id`),
  ADD UNIQUE KEY `pertanyaans_soal_unique` (`soal`),
  ADD UNIQUE KEY `pertanyaans_slug_unique` (`slug`),
  ADD KEY `pertanyaans_katprod_id_foreign` (`katprod_id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`post_id`),
  ADD UNIQUE KEY `posts_slug_unique` (`slug`),
  ADD KEY `posts_category_id_foreign` (`category_id`),
  ADD KEY `posts_user_id_foreign` (`user_id`);

--
-- Indexes for table `post_keyword`
--
ALTER TABLE `post_keyword`
  ADD PRIMARY KEY (`post_keyword_id`),
  ADD KEY `post_keyword_keyword_id_foreign` (`keyword_id`),
  ADD KEY `post_keyword_post_id_foreign` (`post_id`);

--
-- Indexes for table `produks`
--
ALTER TABLE `produks`
  ADD PRIMARY KEY (`produk_id`),
  ADD UNIQUE KEY `produks_nama_produk_unique` (`nama_produk`),
  ADD UNIQUE KEY `produks_slug_unique` (`slug`),
  ADD KEY `produks_katprod_id_foreign` (`katprod_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_username_unique` (`username`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `category_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT for table `category_keyword`
--
ALTER TABLE `category_keyword`
  MODIFY `category_keyword_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `feedback_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `katprods`
--
ALTER TABLE `katprods`
  MODIFY `katprod_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `keywords`
--
ALTER TABLE `keywords`
  MODIFY `keyword_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=300;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=115;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pertanyaans`
--
ALTER TABLE `pertanyaans`
  MODIFY `pertanyaan_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `post_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `post_keyword`
--
ALTER TABLE `post_keyword`
  MODIFY `post_keyword_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `produks`
--
ALTER TABLE `produks`
  MODIFY `produk_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
