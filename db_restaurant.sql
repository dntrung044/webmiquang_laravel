-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th6 30, 2023 lúc 10:53 AM
-- Phiên bản máy phục vụ: 10.4.28-MariaDB
-- Phiên bản PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `db_restaurant`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `aboutus`
--

CREATE TABLE `aboutus` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `description` longtext NOT NULL,
  `address` varchar(800) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(100) NOT NULL,
  `openH` varchar(255) NOT NULL,
  `thumb` varchar(255) NOT NULL,
  `map` varchar(255) NOT NULL,
  `linkYT` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `aboutus`
--

INSERT INTO `aboutus` (`id`, `description`, `address`, `email`, `phone`, `openH`, `thumb`, `map`, `linkYT`, `created_at`, `updated_at`) VALUES
(2, '<h1>MỲ QUẢNG B&Agrave; MUA -&nbsp;<strong>Niềm Tự H&agrave;o Xứ Quảng</strong></h1>\r\n\r\n<p>Mỳ Quảng B&agrave; Mua đ&atilde; trở th&agrave;nh điểm ẩm thực th&acirc;n quen ở Đ&agrave; Nẵng. Mỳ quảng trở th&agrave;nh m&oacute;n ăn đặc trưng của cả miền Trung, trở th&agrave;nh m&oacute;n ngon kh&ocirc;ng thể bỏ lỡ nếu một lần nếm thử nếu bạn đến Đ&agrave; Nẵng, Mỳ Quảng với những đặc trưng của ri&ecirc;ng Quảng Nam - Đ&agrave; Nẵng đ&atilde; trở th&agrave;nh m&oacute;n ăn c&oacute; mặt ở khắp nơi v&agrave; cũng đ&atilde; c&oacute; những biến tấu kh&aacute;c nhau.</p>\r\n\r\n<p>Song khi rời khỏi v&ugrave;ng đất sinh ra n&oacute;, Mỳ Quảng kh&ocirc;ng c&ograve;n thuần t&uacute;y l&agrave; m&oacute;n ăn nữa, m&agrave; trở th&agrave;nh một trong những biểu tượng văn h&oacute;a của một v&ugrave;ng đất, l&agrave; c&aacute;i &ldquo;hồn&rdquo; nghệ thuật ẩm thực của v&ugrave;ng đất Quảng Nam&hellip;</p>', '✩40 Ngũ Hành Sơn, TP. Đà Nẵng (đầu cầu Trần Thị Lý)', 'theduongbamua1@gmail.com', '0905 005 773', '10 giờ - 21 giờ', '/storage/uploads/2021/12/14/my-quang-ba-mua-2.jpg', 'https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d7668.343494715024!2d108.208537!3d16.056575!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x9cea4dfcbb244799!2zTcOsIFF14bqjbmcgQsOgIE11YQ!5e0!3m2!1svi!2sus!4v1639476616537!5m2!1svi!2sus', 'https://www.youtube.com/watch?v=6E25jKwN4Nw', '2022-06-25 08:45:43', '2022-06-25 08:45:43');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `carts`
--

CREATE TABLE `carts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `transaction_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` int(11) NOT NULL,
  `total_item` int(11) NOT NULL,
  `total_price` int(11) NOT NULL,
  `feeship` int(11) DEFAULT NULL,
  `coupon` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `carts`
--

INSERT INTO `carts` (`id`, `transaction_id`, `product_id`, `total_item`, `total_price`, `feeship`, `coupon`) VALUES
(83, 103, 1, 2, 160000, NULL, NULL),
(84, 103, 2, 1, 29999, NULL, NULL),
(85, 104, 1, 2, 160000, NULL, NULL),
(86, 105, 1, 1, 80000, NULL, NULL),
(87, 106, 1, 1, 80000, NULL, NULL),
(88, 106, 12, 2, 60000, NULL, NULL),
(89, 107, 1, 5, 400000, NULL, NULL),
(90, 107, 13, 3, 135000, NULL, NULL),
(91, 108, 1, 3, 240000, NULL, NULL),
(92, 109, 2, 4, 119996, NULL, NULL),
(93, 109, 13, 3, 135000, NULL, NULL),
(94, 111, 13, 3, 45000, NULL, NULL),
(95, 112, 1, 4, 320000, NULL, NULL),
(96, 112, 16, 4, 276000, NULL, NULL),
(97, 113, 15, 2, 150000, NULL, NULL),
(98, 113, 16, 3, 207000, NULL, NULL),
(99, 114, 15, 5, 375000, NULL, NULL),
(100, 115, 15, 3, 225000, NULL, NULL),
(101, 116, 1, 1, 80000, NULL, NULL),
(102, 116, 13, 1, 45000, NULL, NULL),
(103, 117, 20, 6, 450000, NULL, NULL),
(104, 118, 12, 2, 60000, NULL, NULL),
(105, 118, 16, 3, 207000, NULL, NULL),
(106, 119, 1, 2, 160000, NULL, NULL),
(107, 119, 15, 2, 150000, NULL, NULL),
(108, 119, 16, 2, 138000, NULL, NULL),
(109, 120, 1, 2, 160000, NULL, NULL),
(110, 122, 12, 1, 30000, NULL, NULL),
(111, 122, 15, 4, 300000, NULL, NULL),
(112, 123, 15, 2, 150000, NULL, NULL),
(113, 123, 18, 4, 180000, NULL, NULL),
(114, 124, 15, 2, 150000, NULL, NULL),
(115, 124, 18, 2, 90000, NULL, NULL),
(116, 125, 1, 1, 80000, NULL, NULL),
(117, 125, 2, 1, 29999, NULL, NULL),
(118, 125, 13, 1, 45000, NULL, NULL),
(119, 126, 2, 3, 89997, NULL, NULL),
(120, 126, 13, 3, 135000, NULL, NULL),
(121, 126, 16, 6, 414000, NULL, NULL),
(122, 127, 15, 3, 75000, NULL, NULL),
(123, 127, 16, 1, 69000, NULL, NULL),
(124, 128, 15, 3, 75000, NULL, NULL),
(125, 128, 16, 1, 69000, NULL, NULL),
(126, 129, 15, 3, 75000, NULL, NULL),
(127, 129, 16, 1, 69000, NULL, NULL),
(128, 130, 15, 3, 75000, NULL, NULL),
(129, 130, 16, 1, 69000, NULL, NULL),
(130, 134, 13, 3, 45000, NULL, NULL),
(131, 135, 13, 3, 45000, NULL, NULL),
(132, 136, 13, 3, 45000, NULL, NULL),
(133, 137, 13, 3, 45000, 5521, 10000),
(134, 137, 16, 1, 69000, 5521, 10000),
(135, 138, 13, 3, 45000, 5521, 10000),
(136, 138, 16, 1, 69000, 5521, 10000),
(137, 139, 13, 3, 45000, 5521, 10000),
(138, 139, 16, 1, 69000, 5521, 10000),
(139, 140, 13, 3, 45000, 5521, 10000),
(140, 140, 16, 1, 69000, 5521, 10000),
(141, 141, 13, 3, 45000, 5521, 10),
(142, 141, 15, 3, 75000, 5521, 10),
(143, 142, 13, 1, 45000, 521, 10),
(144, 142, 15, 1, 75000, 521, 10),
(145, 143, 13, 1, 45000, 5555, NULL),
(146, 144, 13, 4, 45000, NULL, NULL),
(147, 145, 13, 4, 45000, NULL, NULL),
(148, 146, 15, 3, 75000, NULL, NULL),
(149, 148, 15, 2, 75000, NULL, NULL),
(150, 148, 16, 2, 69000, NULL, NULL),
(151, 149, 15, 2, 75000, NULL, NULL),
(152, 149, 16, 2, 69000, NULL, NULL),
(153, 150, 15, 2, 75000, NULL, NULL),
(154, 150, 16, 2, 69000, NULL, NULL),
(155, 151, 15, 2, 75000, NULL, NULL),
(156, 151, 16, 2, 69000, NULL, NULL),
(157, 159, 15, 2, 75000, NULL, 10),
(158, 160, 13, 2, 45000, NULL, 10),
(159, 160, 16, 2, 69000, NULL, 10),
(160, 161, 15, 4, 75000, NULL, 10),
(161, 161, 16, 5, 69000, NULL, 10);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `contacts`
--

CREATE TABLE `contacts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` int(11) NOT NULL,
  `content` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `contacts`
--

INSERT INTO `contacts` (`id`, `name`, `email`, `phone`, `content`, `created_at`, `updated_at`, `status`) VALUES
(3, 'xxh oanh xxi', 'xxh.oanhxxi@gmail.com', 314402151, 'Xử lý đơn hàng nhanh. Lầm t2 đặt hàng ở shop', '2021-12-22 10:13:23', '2021-12-31 01:28:23', 1),
(4, 'Châu Tinh', 'danchoi@gmail.com', 559549484, 'Xin chào cửa hàng tôi có chuyện muốn nói :))', '2021-12-24 06:49:53', '2021-12-24 07:03:17', 1),
(5, 'Đào Nhật Trung', 'trungdao9a1@gmail.com', 375307021, '5230', '2022-01-11 01:29:21', '2022-01-11 01:31:51', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `coupons`
--

CREATE TABLE `coupons` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `date_start` date NOT NULL,
  `date_end` date NOT NULL,
  `code` varchar(50) NOT NULL,
  `amount` int(50) NOT NULL,
  `number` int(11) NOT NULL,
  `condition` int(11) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `coupons`
--

INSERT INTO `coupons` (`id`, `name`, `date_start`, `date_end`, `code`, `amount`, `number`, `condition`, `status`) VALUES
(1, 'Mã giảm giá Vip 1', '0000-00-00', '2024-06-01', 'TRUNGDZ', 997, 10, 1, 1),
(2, 'Mã giảm giá Vip 2', '0000-00-00', '2022-06-21', 'TRUNGPRO', 10, 10000, 2, 1),
(3, 'Mã giảm giá Vip 3', '0000-00-00', '2022-06-30', 'TRUNGDZ1', 1000, 5, 1, 0),
(4, 'Mã giảm giá Vip 4', '0000-00-00', '2022-06-12', 'TRUNGDZ2', 1000, 50000, 2, 1),
(5, 'Mã giảm giá Vip 5', '2022-06-02', '2022-06-09', 'dsadsa', 142, 2452, 254245, 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `district_dn`
--

CREATE TABLE `district_dn` (
  `id` int(5) NOT NULL,
  `name` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `type` varchar(30) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Đang đổ dữ liệu cho bảng `district_dn`
--

INSERT INTO `district_dn` (`id`, `name`, `type`) VALUES
(1, 'Quận Liên Chiểu', 'Quận'),
(2, 'Quận Thanh Khê', 'Quận'),
(3, 'Quận Hải Châu', 'Quận'),
(4, 'Quận Sơn Trà', 'Quận'),
(5, 'Quận Ngũ Hành Sơn', 'Quận'),
(6, 'Quận Cẩm Lệ', 'Quận'),
(7, 'Huyện Hòa Vang', 'Huyện'),
(8, 'Huyện Hoàng Sa', 'Huyện');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `failed_jobs`
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
-- Cấu trúc bảng cho bảng `freship`
--

CREATE TABLE `freship` (
  `id` int(11) NOT NULL,
  `district_id` int(10) NOT NULL,
  `ward_id` int(10) NOT NULL,
  `feeship` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `freship`
--

INSERT INTO `freship` (`id`, `district_id`, `ward_id`, `feeship`) VALUES
(1, 2, 20207, '521'),
(2, 2, 20203, '32'),
(3, 2, 20203, '32'),
(4, 2, 20203, '32'),
(5, 2, 20206, '852'),
(6, 2, 20206, '852'),
(7, 2, 20206, '852'),
(8, 5, 20287, '10'),
(9, 2, 20203, '44'),
(10, 1, 20194, '5555');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `galleries`
--

CREATE TABLE `galleries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `thumb` varchar(255) NOT NULL,
  `active` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `galleries`
--

INSERT INTO `galleries` (`id`, `thumb`, `active`, `created_at`, `updated_at`) VALUES
(1, '/storage/uploads/2022/01/11/117950931-733146313923989-1517350468444567382-n-640x360.jpg', 0, '2022-01-11 14:53:23', '2022-01-11 14:54:51'),
(3, '/storage/uploads/2022/01/11/3.jpg', 1, '2022-01-11 15:18:29', '2022-01-11 15:18:29'),
(4, '/storage/uploads/2022/01/11/5.jpg', 0, '2022-01-11 15:18:55', '2022-01-11 15:27:53'),
(5, '/storage/uploads/2022/01/11/7.jpg', 1, '2022-01-11 15:19:04', '2022-01-11 15:34:55'),
(6, '/storage/uploads/2022/01/11/8.jpg', 1, '2022-01-11 15:19:14', '2022-01-11 15:19:14'),
(7, '/storage/uploads/2022/01/11/9.jpg', 0, '2022-01-11 15:19:23', '2022-01-11 15:26:43'),
(8, '/storage/uploads/2022/01/11/10.jpg', 0, '2022-01-11 15:19:32', '2022-01-11 15:26:06'),
(9, '/storage/uploads/2022/01/11/9.jpg', 0, '2022-01-11 15:19:50', '2022-01-11 15:26:16'),
(10, '/storage/uploads/2022/01/11/10.jpg', 1, '2022-01-11 15:19:58', '2022-01-11 15:19:58'),
(11, '/storage/uploads/2022/01/11/11.jpg', 1, '2022-01-11 15:20:12', '2022-01-11 15:20:12'),
(12, '/storage/uploads/2022/01/11/13.jpg', 1, '2022-01-11 15:20:28', '2022-01-11 15:20:28'),
(13, '/storage/uploads/2022/01/11/14.jpg', 1, '2022-01-11 15:20:43', '2022-01-11 15:20:43'),
(14, '/storage/uploads/2022/01/11/16.jpg', 1, '2022-01-11 15:20:54', '2022-01-11 15:20:54'),
(15, '/storage/uploads/2022/01/11/mon_quang_Ba_Mua_16.jpg', 1, '2022-01-11 15:21:03', '2022-01-11 15:21:03');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `liked_comments`
--

CREATE TABLE `liked_comments` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `comment_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `liked_comments`
--

INSERT INTO `liked_comments` (`id`, `user_id`, `comment_id`, `created_at`, `updated_at`) VALUES
(1, 1, 78, '2023-06-26 07:28:06', '2023-06-26 07:28:06'),
(3, 100, 78, '2023-06-26 08:55:15', '2023-06-26 08:55:15'),
(4, 100, 77, '2023-06-26 10:15:51', '2023-06-26 10:15:51'),
(5, 100, 76, '2023-06-26 10:16:47', '2023-06-26 10:16:47'),
(40, 100, 79, '2023-06-26 13:30:42', '2023-06-26 13:30:42'),
(50, 100, 75, '2023-06-26 13:40:42', '2023-06-26 13:40:42'),
(51, 1, 59, '2023-06-29 04:41:35', '2023-06-29 04:41:35'),
(53, 1, 79, '2023-06-29 06:55:09', '2023-06-29 06:55:09'),
(55, 1, 80, '2023-06-29 07:03:34', '2023-06-29 07:03:34'),
(57, 4, 84, '2023-06-29 14:52:10', '2023-06-29 14:52:10'),
(59, 40, 84, '2023-06-30 02:27:17', '2023-06-30 02:27:17'),
(60, 40, 85, '2023-06-30 02:27:19', '2023-06-30 02:27:19'),
(62, 1, 85, '2023-06-30 02:35:29', '2023-06-30 02:35:29'),
(63, 1, 84, '2023-06-30 02:35:35', '2023-06-30 02:35:35'),
(64, 1, 86, '2023-06-30 02:35:38', '2023-06-30 02:35:38'),
(66, 1, 89, '2023-06-30 08:48:27', '2023-06-30 08:48:27');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `menus`
--

CREATE TABLE `menus` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `active` int(11) NOT NULL,
  `thumb` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `link` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `menus`
--

INSERT INTO `menus` (`id`, `name`, `description`, `active`, `thumb`, `created_at`, `updated_at`, `link`) VALUES
(1, 'Về chúng tôi', 'Xem thông tin chi tiết về của hàng của chúng tôi', 1, '/storage/uploads/2022/01/03/hom1.jpg', NULL, '2022-01-03 09:22:17', '/gioi-thieu'),
(2, 'Đặt bàn ngay', 'Để có được chổ ngồi thưởng thức những món ngon của chúng tôi.', 1, '/storage/uploads/2022/01/03/img20180930114455321.jpg', '2021-12-12 04:49:31', '2022-01-03 09:22:32', '/dat-ban'),
(3, 'Liên hệ với chúng tôi', 'Nếu có bất kì thắc mắc hay câu hỏi cần giải quyết.', 1, '/storage/uploads/2022/05/26/start2.jpg', '2021-12-24 02:07:47', '2022-05-26 03:18:50', '/lien-he');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_admins_table', 1),
(2, '2014_10_12_000000_create_users_table', 1),
(3, '2014_10_12_100000_create_password_resets_table', 1),
(4, '2019_08_19_000000_create_failed_jobs_table', 1),
(5, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(6, '2021_11_03_103709_create_products_table', 1),
(7, '2021_11_06_084542_create_sliders_table', 1),
(8, '2021_11_14_172747_create_product_comments_table', 1),
(9, '2021_11_16_110042_create_postcategories_table', 1),
(10, '2021_11_16_110556_cerate_posts_table', 1),
(11, '2021_11_16_142838_create_menus_table', 1),
(12, '2021_11_21_140629_create_productcategories_table', 1),
(13, '2021_11_22_155319_create_customers_table', 1),
(14, '2021_11_22_155548_create_carts_table', 1),
(15, '2021_11_23_131839_create_jobs_table', 1),
(16, '2021_11_24_004512_create_aboutus_table', 1),
(17, '2021_12_16_222629_create_contacts_table', 2),
(19, '2021_12_17_174215_create_reservations_table', 3),
(20, '2022_01_11_210223_create_galleries_table', 4),
(21, '2022_07_03_220737_create_blog_comment_table', 5),
(22, '2022_07_12_094308_create_roles_table', 5),
(23, '2022_07_12_094420_create_permissions_table', 5),
(24, '2022_07_13_223722_add_column_key_permission_table', 6);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `parent_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `display_name` varchar(50) NOT NULL,
  `key_code` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `permissions`
--

INSERT INTO `permissions` (`id`, `parent_id`, `name`, `display_name`, `key_code`) VALUES
(1, 0, 'Quản lý món ăn', 'Quản lý món ăn', 'product'),
(2, 1, 'Thêm món ăn', 'Thêm món ăn', 'add_product'),
(3, 1, 'Sửa món ăn', 'Sửa món ăn', 'edit_product'),
(4, 1, 'Xóa món ăn', 'Xóa món ăn', 'delete_product'),
(5, 1, 'Xem món ăn', 'Xem món ăn', 'list_product'),
(6, 10, 'Thêm bài viết', 'Thêm bài viết', 'add_blog'),
(7, 10, 'Sửa bài viết', 'Sửa bài viết', 'edit_blog'),
(8, 10, 'Xóa bài viết', 'Xóa bài viết', 'delete_blog'),
(9, 10, 'Xem bài viết', 'Xem bài viết', 'list_blog'),
(10, 0, 'Quản lý bài viết', 'Quản lý bài viết', 'blog'),
(11, 0, 'About us', 'Quản lý thông tin nhà hàng', 'about'),
(12, 0, 'user', 'Quản lý tài khoản', 'user'),
(14, 0, 'permission', 'Quản lý quyền', 'permission'),
(15, 0, 'role', 'Quản lý Vai trò tài khoản', 'role'),
(16, 0, 'permission', 'Quản lý quyền', 'permission');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `permission_categories`
--

CREATE TABLE `permission_categories` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `parent_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `udpated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `permission_categories`
--

INSERT INTO `permission_categories` (`id`, `name`, `parent_id`, `created_at`, `udpated_at`) VALUES
(1, 'thêm', 0, NULL, NULL),
(2, 'thêm', 0, NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `permission_role`
--

CREATE TABLE `permission_role` (
  `id` bigint(20) NOT NULL,
  `role_id` int(11) NOT NULL,
  `permission_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `permission_role`
--

INSERT INTO `permission_role` (`id`, `role_id`, `permission_id`, `created_at`, `updated_at`) VALUES
(9, 1, 10, '2023-06-30 06:41:15', NULL),
(10, 28, 6, '2022-07-14 02:22:18', NULL),
(11, 29, 2, '2022-07-14 02:22:19', NULL),
(12, 29, 6, '2022-07-14 02:22:19', NULL),
(13, 30, 2, '2022-07-14 02:39:07', NULL),
(14, 30, 9, '2022-07-14 02:39:07', NULL),
(15, 31, 2, '2022-07-16 15:23:56', NULL),
(16, 31, 6, '2022-07-16 15:23:56', NULL),
(17, 32, 3, '2022-07-16 15:27:09', NULL),
(18, 32, 9, '2022-07-16 15:27:09', NULL),
(19, 1, 1, '2023-06-30 07:20:27', NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `personal_access_tokens`
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
-- Cấu trúc bảng cho bảng `posts`
--

CREATE TABLE `posts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `content` longtext NOT NULL,
  `category_id` int(10) UNSIGNED NOT NULL,
  `active` int(11) NOT NULL,
  `thumb` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `view` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `posts`
--

INSERT INTO `posts` (`id`, `name`, `description`, `content`, `category_id`, `active`, `thumb`, `created_at`, `updated_at`, `view`) VALUES
(1, 'Cách nấu mỳ quảng chay ngon', 'Đi Đà Nẵng về mua được ít củ nén nên mình nấu mì Quảng vì Cô nói mì Quảng phải có củ nén mới ngon.', '<p>Nguy&ecirc;n liệu:</p>\r\n\r\n<ul>\r\n	<li>200g m&igrave; Quảng</li>\r\n	<li>1 b&igrave;a đậu phụ</li>\r\n	<li>1 l&aacute; t&agrave;u hủ ky</li>\r\n	<li>100g nấm rơm</li>\r\n	<li>100g gi&aacute; sống</li>\r\n	<li>1 th&igrave;a c&agrave; ph&ecirc; boa-r&ocirc; băm</li>\r\n	<li>1 th&igrave;a c&agrave; ph&ecirc; dầu điều</li>\r\n	<li>1 th&igrave;a s&uacute;p lạc rang</li>\r\n	<li>300ml nước d&ugrave;ng chay</li>\r\n	<li>1 th&igrave;a c&agrave; ph&ecirc; muối ti&ecirc;u</li>\r\n	<li>B&aacute;nh đa m&egrave;</li>\r\n	<li>Rau ăn k&egrave;m: X&agrave; l&aacute;ch, rau thơm, hoa chuối, bắp cải xắt sợi, h&uacute;ng lủi</li>\r\n	<li>Dầu để chi&ecirc;n</li>\r\n</ul>\r\n\r\n<p><img alt=\"\" src=\"https://monquang.com.vn/medias/user_files/images/1/my-quang-chay.jpg\" /></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Thực HIện:</p>\r\n\r\n<p>&ndash; Đậu phụ cắt l&aacute;t mỏng, chi&ecirc;n v&agrave;ng</p>\r\n\r\n<p>&ndash; T&agrave;u hủ ky chi&ecirc;n v&agrave;ng, b&oacute;p miếng</p>\r\n\r\n<p>&ndash; Nấm rơm cắt ch&acirc;n kỹ , loại bỏ phần rơm v&agrave; c&aacute;c chất kh&aacute;c d&iacute;nh v&agrave;o, rửa sạch, ng&acirc;m nước muối lo&atilde;ng 5 ph&uacute;t. Vớt ra rổ vẩy r&aacute;o, bổ đ&ocirc;i từng b&uacute;p nấm&nbsp;Bắc chảo, cho một&nbsp;th&igrave;a s&uacute;p dầu ăn(nếu c&oacute; dầu lạc th&igrave; c&agrave;ng ngon hơn)&nbsp;v&agrave; dầu m&agrave;u điều v&agrave;o phi thơm boa-r&ocirc;. Thả nấm, đậu phụ v&agrave; t&agrave;u hủ ky v&agrave;o x&agrave;o, n&ecirc;m muối ti&ecirc;u Khi đồ x&agrave;o đ&atilde; thấm, cho nước d&ugrave;ng chay v&agrave;o nấu s&ocirc;i, nếm lại vừa ăn</p>\r\n\r\n<p>&ndash; Xếp rau gi&aacute; b&ecirc;n dưới, bỏ c&aacute;c loại rau sống như cải son, rau b&uacute;p chuối. Cho &iacute;t m&igrave; l&ecirc;n tr&ecirc;n. Chang nước nhưng mỳ vừa phải để cho sợi mỳ ngấm. Ch&uacute;ng ta c&oacute; thể để một m&atilde;nh b&aacute;nh tr&aacute;ng hay 1 b&aacute;nh hồng t&ocirc;m. Khi ăn người d&ugrave;ng c&oacute; thể thưởng thức 2 loại b&aacute;nh n&agrave;y trước rồi sẽ cảm nhận sự thơm ngon của từng sợi mỳ ho&agrave; quyện với nước l&egrave;o thơm ngon cho mỗi t&ocirc;&nbsp;<a href=\"https://monquang.com.vn/chuyen-muc-san-pham/my-quang\">mỳ quảng</a>.</p>', 1, 1, '/storage/uploads/2021/12/14/my-quang-ba-mua-2.jpg', '2021-12-14 10:55:49', '2023-06-23 05:41:01', 4),
(2, 'Cách làm Mỳ Quảng gà ngon', 'Hương vị để lại khi thưởng thức một tô mỳ quảng gà để lại là sự hoà quyện của các nguyên liệu được làm từ sản phẩm đơn giản có sẵn trong vườn nhà', '<p style=\"text-align:start\"><span style=\"font-size:13px\"><span style=\"color:#333333\"><span style=\"background-color:#ffffff\"><span style=\"font-family:sans-serif,Arial,Verdana,&quot;Trebuchet MS&quot;\"><span style=\"font-family:times new roman\"><span style=\"font-size:medium\">Hương vị để lại khi thưởng thức một t&ocirc; mỳ quảng g&agrave; để lại l&agrave; sự ho&agrave; quyện của c&aacute;c nguy&ecirc;n liệu được l&agrave;m từ sản phẩm đơn giản c&oacute; sẵn trong vườn nh&agrave;. Sợi mỳ phải c&oacute; độ dẽo được l&agrave;m từ gạo qu&ecirc; đặc biệt. Kh&ocirc;ng thể kh&ocirc;ng n&oacute;i đến nước nh&acirc;n chan, chế biến thịt g&agrave;, rau ăn k&egrave;m v&agrave; nước mắm chang. Mỗi người sẽ c&oacute; mỗi c&aacute;ch thưởng thức mỳ kh&aacute;c nhau nhưng sẽ lu&ocirc;n cảm nhận được sự đặc biệt trong c&aacute;ch chế biến&nbsp;<a href=\"https://monquang.com.vn/chi-tiet-tin/cach-lam-mi-quang-ga-ngon\" style=\"box-sizing:border-box; -webkit-tap-highlight-color:transparent; color:#333333; text-decoration:none; transition:all 0.1s ease 0s\">mỳ Quảng G&agrave;</a>. Ch&uacute;ng ta c&oacute; thể t&igrave;m hiểu c&aacute;ch l&agrave;m mỳ Quảng g&agrave; để c&oacute; thể cho gia đ&igrave;nh, bạn b&egrave; hoặc những dịp lễ hội c&oacute; những m&oacute;n ăn ngon.</span></span></span></span></span></span></p>\r\n\r\n<div style=\"text-align:start\"><span style=\"font-size:13px\"><span style=\"color:#333333\"><span style=\"background-color:#ffffff\"><span style=\"font-family:sans-serif,Arial,Verdana,&quot;Trebuchet MS&quot;\"><span style=\"font-family:&quot;times new roman&quot;\"><span style=\"font-size:medium\">Nguy&ecirc;n liệu:</span></span></span></span></span></span></div>\r\n\r\n<div style=\"text-align:start\"><span style=\"font-size:13px\"><span style=\"color:#333333\"><span style=\"background-color:#ffffff\"><span style=\"font-family:sans-serif,Arial,Verdana,&quot;Trebuchet MS&quot;\">&nbsp;</span></span></span></span></div>\r\n\r\n<div style=\"text-align:start\"><span style=\"font-size:13px\"><span style=\"color:#333333\"><span style=\"background-color:#ffffff\"><span style=\"font-family:sans-serif,Arial,Verdana,&quot;Trebuchet MS&quot;\"><span style=\"font-family:&quot;times new roman&quot;\"><span style=\"font-size:medium\">&ndash; Một con g&agrave; ta khoảng 1kg (cho 5-6 người ăn)</span></span></span></span></span></span></div>\r\n\r\n<div style=\"text-align:start\"><span style=\"font-size:13px\"><span style=\"color:#333333\"><span style=\"background-color:#ffffff\"><span style=\"font-family:sans-serif,Arial,Verdana,&quot;Trebuchet MS&quot;\"><span style=\"font-family:&quot;times new roman&quot;\"><span style=\"font-size:medium\">&ndash; 4-5 củ h&agrave;nh kh&ocirc;, 2 củ tỏi, ớt tươi, dầu phộng (dầu lạc), ớt m&agrave;u (ớt bột kh&ocirc; xay nhuyễn)</span></span></span></span></span></span></div>\r\n\r\n<div style=\"text-align:start\"><span style=\"font-size:13px\"><span style=\"color:#333333\"><span style=\"background-color:#ffffff\"><span style=\"font-family:sans-serif,Arial,Verdana,&quot;Trebuchet MS&quot;\"><span style=\"font-family:&quot;times new roman&quot;\"><span style=\"font-size:medium\">&ndash; M&igrave; Quảng tr&aacute;ng sẵn, đậu phộng rang (lạc rang), b&aacute;nh tr&aacute;ng nướng (b&aacute;nh đa)</span></span></span></span></span></span></div>\r\n\r\n<div style=\"text-align:start\"><span style=\"font-size:13px\"><span style=\"color:#333333\"><span style=\"background-color:#ffffff\"><span style=\"font-family:sans-serif,Arial,Verdana,&quot;Trebuchet MS&quot;\"><span style=\"font-family:&quot;times new roman&quot;\"><span style=\"font-size:medium\">&ndash; H&agrave;nh ng&ograve;, hạt ti&ecirc;u, muối, nước mắm ngon, bột ngọt, đường, một tr&aacute;i chanh</span></span></span></span></span></span></div>\r\n\r\n<div style=\"text-align:start\"><span style=\"font-size:13px\"><span style=\"color:#333333\"><span style=\"background-color:#ffffff\"><span style=\"font-family:sans-serif,Arial,Verdana,&quot;Trebuchet MS&quot;\"><span style=\"font-family:&quot;times new roman&quot;\"><span style=\"font-size:medium\">&ndash; Rau ăn k&egrave;m gồm x&agrave; l&aacute;ch, rau h&uacute;ng lủi, bắp chuối b&agrave;o, gi&aacute;, cải non</span></span></span></span></span></span></div>\r\n\r\n<div style=\"text-align:start\"><span style=\"font-size:13px\"><span style=\"color:#333333\"><span style=\"background-color:#ffffff\"><span style=\"font-family:sans-serif,Arial,Verdana,&quot;Trebuchet MS&quot;\"><span style=\"font-family:&quot;times new roman&quot;\"><span style=\"font-size:medium\">C&aacute;c bước thực hiện:</span></span></span></span></span></span></div>\r\n\r\n<div style=\"text-align:start\"><span style=\"font-size:13px\"><span style=\"color:#333333\"><span style=\"background-color:#ffffff\"><span style=\"font-family:sans-serif,Arial,Verdana,&quot;Trebuchet MS&quot;\"><span style=\"font-family:&quot;times new roman&quot;\"><span style=\"font-size:medium\">Bước 1</span></span></span></span></span></span></div>\r\n\r\n<div style=\"text-align:start\"><span style=\"font-size:13px\"><span style=\"color:#333333\"><span style=\"background-color:#ffffff\"><span style=\"font-family:sans-serif,Arial,Verdana,&quot;Trebuchet MS&quot;\">&nbsp;</span></span></span></span></div>\r\n\r\n<div style=\"text-align:start\"><span style=\"font-size:13px\"><span style=\"color:#333333\"><span style=\"background-color:#ffffff\"><span style=\"font-family:sans-serif,Arial,Verdana,&quot;Trebuchet MS&quot;\"><span style=\"font-family:&quot;times new roman&quot;\"><span style=\"font-size:medium\">&ndash; Thịt g&agrave; l&agrave;m sạch. cắt từng miếng nhỏ vừa ăn. Xương g&agrave; c&oacute; thể kết hợp nấu trong nồi nước chan để c&oacute; th&ecirc;m hương vị ngọt tự nhi&ecirc;n của xương g&agrave; đem lại.</span></span></span></span></span></span></div>\r\n\r\n<div style=\"text-align:start\"><span style=\"font-size:13px\"><span style=\"color:#333333\"><span style=\"background-color:#ffffff\"><span style=\"font-family:sans-serif,Arial,Verdana,&quot;Trebuchet MS&quot;\">&nbsp;</span></span></span></span></div>\r\n\r\n<div style=\"text-align:start\"><span style=\"font-size:13px\"><span style=\"color:#333333\"><span style=\"background-color:#ffffff\"><span style=\"font-family:sans-serif,Arial,Verdana,&quot;Trebuchet MS&quot;\"><span style=\"font-family:&quot;times new roman&quot;\"><span style=\"font-size:medium\">&ndash; Ướp g&agrave; c&ugrave;ng với tỏi, h&agrave;ng, ớt tươi được băm nhỏ. Kết hợp với ti&ecirc;u đường, bột ngọt, nước mắm. Ướp thịt trong gi&agrave;n gian l&acirc;u khoản hơn 25 ph&uacute;t.</span></span></span></span></span></span></div>\r\n\r\n<div style=\"text-align:start\"><span style=\"font-size:13px\"><span style=\"color:#333333\"><span style=\"background-color:#ffffff\"><span style=\"font-family:sans-serif,Arial,Verdana,&quot;Trebuchet MS&quot;\">&nbsp;</span></span></span></span></div>\r\n\r\n<div style=\"text-align:start\"><span style=\"font-size:13px\"><span style=\"color:#333333\"><span style=\"background-color:#ffffff\"><span style=\"font-family:sans-serif,Arial,Verdana,&quot;Trebuchet MS&quot;\"><span style=\"font-family:&quot;times new roman&quot;\"><span style=\"font-size:medium\">&ndash; Rau ăn c&ugrave;ng như x&agrave; l&aacute;ch cắt miếng nhỏ, rau cải son, rau bắp chuối, c&ugrave;ng với một số loại rau kh&aacute;c.</span></span></span></span></span></span></div>\r\n\r\n<div style=\"text-align:start\"><span style=\"font-size:13px\"><span style=\"color:#333333\"><span style=\"background-color:#ffffff\"><span style=\"font-family:sans-serif,Arial,Verdana,&quot;Trebuchet MS&quot;\"><span style=\"font-family:&quot;times new roman&quot;\"><span style=\"font-size:medium\">Bước 2</span></span></span></span></span></span></div>\r\n\r\n<div style=\"text-align:start\"><span style=\"font-size:13px\"><span style=\"color:#333333\"><span style=\"background-color:#ffffff\"><span style=\"font-family:sans-serif,Arial,Verdana,&quot;Trebuchet MS&quot;\">&nbsp;</span></span></span></span></div>\r\n\r\n<div style=\"text-align:start\"><span style=\"font-size:13px\"><span style=\"color:#333333\"><span style=\"background-color:#ffffff\"><span style=\"font-family:sans-serif,Arial,Verdana,&quot;Trebuchet MS&quot;\"><span style=\"font-family:&quot;times new roman&quot;\"><span style=\"font-size:medium\">Ch&uacute;ng ta n&ecirc;n ướp v&agrave; nấu dầu lạc( dầu phộng) để m&oacute;n ăn đươc ngon hơn.</span></span></span></span></span></span></div>\r\n\r\n<div style=\"text-align:start\"><span style=\"font-size:13px\"><span style=\"color:#333333\"><span style=\"background-color:#ffffff\"><span style=\"font-family:sans-serif,Arial,Verdana,&quot;Trebuchet MS&quot;\">&nbsp;</span></span></span></span></div>\r\n\r\n<div style=\"text-align:start\"><span style=\"font-size:13px\"><span style=\"color:#333333\"><span style=\"background-color:#ffffff\"><span style=\"font-family:sans-serif,Arial,Verdana,&quot;Trebuchet MS&quot;\"><span style=\"font-family:&quot;times new roman&quot;\"><span style=\"font-size:medium\">&ndash; Lấy một c&aacute;i nồi nhỏ để nấu nước nh&acirc;n, cho dầu phộng v&agrave;o nồi,&nbsp;để s&ocirc;i dầu để&nbsp;khử&nbsp;m&ugrave;i. cho h&agrave;nh tỏi v&agrave;o phi để c&oacute; m&ugrave;i thơm. cho 1 muỗng cafe ớt m&agrave;u cho miếng g&agrave; sau khi nấu được đẹp hơn. Cho g&agrave; miếng v&agrave;o ngồi trộn đều, nấu g&agrave; cho săn lại sau đ&oacute; cho một &iacute;t nước d&ugrave;ng v&agrave;o để cho g&agrave; được thấm trong khi nấu. Nấu khoảng 15 ph&uacute;t để cho g&agrave; mềm. Nước nh&acirc;n phải s&aacute;ng, c&oacute; hương thơm, v&agrave; m&agrave;u sắc đẹp.</span></span></span></span></span></span></div>\r\n\r\n<div style=\"text-align:start\"><span style=\"font-size:13px\"><span style=\"color:#333333\"><span style=\"background-color:#ffffff\"><span style=\"font-family:sans-serif,Arial,Verdana,&quot;Trebuchet MS&quot;\">&nbsp;</span></span></span></span></div>\r\n\r\n<div style=\"text-align:start\"><span style=\"font-size:13px\"><span style=\"color:#333333\"><span style=\"background-color:#ffffff\"><span style=\"font-family:sans-serif,Arial,Verdana,&quot;Trebuchet MS&quot;\"><span style=\"font-family:&quot;times new roman&quot;\"><span style=\"font-size:medium\">&ndash; Lấy một c&aacute;i nồi lớn để nấu nước chan. Nguy&ecirc;n liệu được nấu gồm xương g&agrave;, c&aacute;c c&ocirc;ng đoạn được l&agrave;m giống như tr&ecirc;n nhưng nước được cho v&agrave;o nồi nhiều hơn. nấu l&acirc;u cho xương mềm. Để c&oacute; nước ngọt hơn, c&oacute; thể nấu c&ugrave;ng xương heo để c&oacute; nồi nước hầm ngon tuyệt. Mỳ Quảng ăn hơi kh&ocirc; nước n&ecirc;n chỉ cần nấu lượng nước cho vừa phải để chan vừa ngấm sợi mỳ trong t&ocirc; l&agrave; được. Kh&ocirc;ng chan nhiều nước như b&uacute;n r&ecirc;u hay b&uacute;n b&ograve;.</span></span></span></span></span></span></div>\r\n\r\n<div style=\"text-align:start\"><span style=\"font-size:13px\"><span style=\"color:#333333\"><span style=\"background-color:#ffffff\"><span style=\"font-family:sans-serif,Arial,Verdana,&quot;Trebuchet MS&quot;\">&nbsp;</span></span></span></span></div>\r\n\r\n<div style=\"text-align:start\"><span style=\"font-size:13px\"><span style=\"color:#333333\"><span style=\"background-color:#ffffff\"><span style=\"font-family:sans-serif,Arial,Verdana,&quot;Trebuchet MS&quot;\"><span style=\"font-family:&quot;times new roman&quot;\"><span style=\"font-size:medium\">Bước 3</span></span></span></span></span></span></div>\r\n\r\n<div style=\"text-align:start\"><span style=\"font-size:13px\"><span style=\"color:#333333\"><span style=\"background-color:#ffffff\"><span style=\"font-family:sans-serif,Arial,Verdana,&quot;Trebuchet MS&quot;\"><span style=\"font-family:&quot;times new roman&quot;\"><span style=\"font-size:medium\">L&agrave;m nước mắm để ăn c&ugrave;ng mỳ: Giả &iacute;t tỏi c&ugrave;ng với ớt xanh - nếu c&oacute; được ớt từ Đại Lộc th&igrave; rất tuyệt v&igrave; ớt c&oacute; hương vị cay thơm nồng ho&agrave; th&ecirc;m chất ngọt đọng lại tr&ecirc;n đầu lưỡi khi ăn. Cho &iacute;t nước cốt chanh, cho ch&uacute;t đường. đ&aacute;nh đều l&ecirc;n để c&aacute;c hương vị quyện lại&nbsp;với nhau tạo n&ecirc;n một chất keo. Khi đ&oacute; ta cho th&ecirc;m nước mắm v&agrave;o. Đ&aacute;nh đều l&ecirc;n. Ch&eacute;n nước mắm sẽ toả l&ecirc;n một hương thơm nồng của c&aacute;c hương liệu ho&agrave; quyện lại.</span></span></span></span></span></span></div>\r\n\r\n<div style=\"text-align:start\"><span style=\"font-size:13px\"><span style=\"color:#333333\"><span style=\"background-color:#ffffff\"><span style=\"font-family:sans-serif,Arial,Verdana,&quot;Trebuchet MS&quot;\"><span style=\"font-family:times new roman\"><span style=\"font-size:medium\">Lấy một c&aacute;i t&ocirc;, cho rau sống xuống dưới: Rau cải son, rau bắp chuối,... Cho một &iacute;t mỳ l&ecirc;n tr&ecirc;n. Chan nước nh&acirc;n c&ugrave;ng thịt g&agrave; l&ecirc;n tr&ecirc;n sao cho nước vừa phải, thường th&igrave; nước chang kh&ocirc;ng được ngập sợi mỳ. Rắc &iacute;t đậu phộng, h&agrave;nh ng&ograve; l&ecirc;n tr&ecirc;n. C&oacute; thể chan th&ecirc;m nước mắm để c&oacute; hương vị đặc biệt tuỳ theo khẩu vị của mỗi thực kh&aacute;c. C&oacute; thể kết hợp với miếng b&aacute;nh tr&aacute;ng để tăng th&ecirc;m sự hấp dẫn. V&agrave; cuối c&ugrave;ng ngồi thưởng thức m&oacute;n mỳ ngon tuyệt được l&agrave;m từ những nguy&ecirc;n liệu thơm ngon của đồng qu&ecirc;.</span></span></span></span></span></span></div>\r\n\r\n<div style=\"text-align:start\"><span style=\"font-size:13px\"><span style=\"color:#333333\"><span style=\"background-color:#ffffff\"><span style=\"font-family:sans-serif,Arial,Verdana,&quot;Trebuchet MS&quot;\"><span style=\"font-family:&quot;times new roman&quot;\"><span style=\"font-size:medium\"><img alt=\"\" src=\"https://monquang.com.vn/medias/user_files/images/1/my-quang-ba-mua.jpg\" style=\"-webkit-tap-highlight-color:transparent; border-style:none; box-sizing:border-box; cursor:default; height:auto; max-width:100%; vertical-align:middle\" /></span></span></span></span></span></span></div>\r\n\r\n<div style=\"text-align:start\"><span style=\"font-size:13px\"><span style=\"color:#333333\"><span style=\"background-color:#ffffff\"><span style=\"font-family:sans-serif,Arial,Verdana,&quot;Trebuchet MS&quot;\"><span style=\"font-family:&quot;times new roman&quot;\"><span style=\"font-size:medium\">C&aacute;c bạn c&oacute; thể gh&eacute; đến Mỳ Quảng B&agrave; Mua ở c&aacute;c địa chỉ sau để thưởng thức:</span></span></span></span></span></span></div>\r\n\r\n<div style=\"text-align:start\">\r\n<div class=\"ms-site-info\">\r\n<ul>\r\n	<li><span style=\"font-size:13px\"><span style=\"color:#333333\"><span style=\"background-color:#ffffff\"><span style=\"font-family:sans-serif,Arial,Verdana,&quot;Trebuchet MS&quot;\">19 Trần B&igrave;nh Trọng - Đ&agrave; Nẵng</span></span></span></span></li>\r\n	<li><span style=\"font-size:13px\"><span style=\"color:#333333\"><span style=\"background-color:#ffffff\"><span style=\"font-family:sans-serif,Arial,Verdana,&quot;Trebuchet MS&quot;\">44 L&ecirc; Đ&igrave;nh Dương - Đ&agrave; Nẵng</span></span></span></span></li>\r\n	<li><span style=\"font-size:13px\"><span style=\"color:#333333\"><span style=\"background-color:#ffffff\"><span style=\"font-family:sans-serif,Arial,Verdana,&quot;Trebuchet MS&quot;\">231 Đống Đa - Đ&agrave; Nẵng</span></span></span></span></li>\r\n	<li><span style=\"font-size:13px\"><span style=\"color:#333333\"><span style=\"background-color:#ffffff\"><span style=\"font-family:sans-serif,Arial,Verdana,&quot;Trebuchet MS&quot;\">259 Hồ Nghinh - Đ&agrave; Nẵng</span></span></span></span></li>\r\n</ul>\r\n</div>\r\n</div>', 2, 1, '/storage/uploads/2021/12/14/my-quang-ba-mua.jpg', '2021-12-12 04:50:15', '2023-06-23 05:50:31', 7),
(3, 'Mỳ Quảng Bà Mua - Niềm Tự Hào Xứ Quảng', 'Mỳ Quảng là món ăn đậm hương vị riêng của xứ Quảng. Mỳ Quảng Bà Mua là hương vị khó quên mỗi khi du khách đến Đà Nẵng.', '<p>&nbsp;</p>\r\n\r\n<p>Về xứ Quảng, thưởng thức những m&oacute;n ăn d&acirc;n d&atilde; v&agrave; kh&aacute;m ph&aacute; t&igrave;m hiểu đất v&agrave; t&igrave;nh người ở đ&acirc;y. Từ những hương vị mộc mạc ấy đ&atilde; tạo n&ecirc;n n&eacute;t văn ho&aacute; đặc trưng của địa phương, n&eacute;t đặc trưng về văn ho&aacute; ẩm thực.</p>\r\n\r\n<p>V&agrave; khi nhắc đến ẩm thực xứ Quảng,&nbsp;<a href=\"https://monquang.com.vn/san-pham\">Mỳ Quảng B&agrave; Mua</a>&nbsp;được nhiều du kh&aacute;ch lu&ocirc;n gh&eacute; đếm thưởng thức mỗi khi đến Đ&agrave; Nẵng.&nbsp;Mỳ Quảng được l&agrave;m từ những nguy&ecirc;n liệu rất d&acirc;n gi&atilde;, mộc mạc, lu&ocirc;n lu&ocirc;n c&oacute; sẵn do người d&acirc;n tự cung tự cấp. Từ những sản phẩm hằng ng&agrave;y gắn liền với người d&acirc;n. Mỳ Quảng B&agrave; Mua được biến tấu với những hương vị đặc biệt tạo n&ecirc;n n&eacute;t ri&ecirc;ng cho đặc sản Mỳ Quảng Đ&agrave; Nẵng.</p>\r\n\r\n<p><img alt=\"\" src=\"https://monquang.com.vn/medias/user_files/images/1/my-quang-ech.jpg\" /></p>\r\n\r\n<p><a href=\"https://monquang.com.vn/chuyen-muc-san-pham/my-quang\">M&oacute;n ngon Mỳ Quảng</a></p>\r\n\r\n<p>Từ những nguy&ecirc;n liệu d&acirc;n giả, theo sở th&iacute;ch v&agrave; khẩu vị của người d&ugrave;ng. Do vậy, Mỳ Quảng c&oacute; nhiều loại được kết hợp ho&agrave; quyện với nhau để tạo n&ecirc;n mỗi m&oacute;n c&oacute; những hương vị ri&ecirc;ng cho những kh&aacute;ch h&agrave;ng gh&eacute; qu&aacute;n thưởng thức.</p>\r\n\r\n<p><img alt=\"\" src=\"https://monquang.com.vn/medias/user_files/images/1/2019-04-25-222510banh-trang-cuon-thit-heo.jpg\" /></p>\r\n\r\n<p><a href=\"https://monquang.com.vn/chuyen-muc-san-pham/banh-trang-cuon-thit-heo\">B&aacute;nh tr&aacute;ng cuốn thịt heo B&agrave; Mua</a></p>\r\n\r\n<p>Sự đặt biệt của nước l&egrave;o chang mỳ tạo n&ecirc;n n&eacute;t ri&ecirc;n cho m&oacute;n mỳ Xứ Quảng. Nước phải cps hương vị ri&ecirc;ng cho từng loại. Nước nhưng đực chang vừa phải đủ ngấm sợ mỳ. Nước d&ugrave;ng được chế biến rất cẩn thận được kết hợp từ nhiều hương lịệu v&agrave; nguy&ecirc;n liệu kh&aacute;c nhau để tạo n&ecirc;n n&eacute;t ri&ecirc;ng cho từng t&ocirc; mỳ Quảng. Cho n&ecirc;n mỗi loại mỳ c&oacute; những biến tấu kh&aacute;c nhau ho&agrave; quỵện v&agrave;o kh&ocirc;ng gian Mỳ Quảng.</p>\r\n\r\n<p><a href=\"https://www.youtube.com/watch?v=B8roIGrNirs\" title=\"Mỳ Quảng Bà Mua - Niềm Tự Hào Xứ Quảng\"><img alt=\"Mỳ Quảng Bà Mua - Niềm Tự Hào Xứ Quảng\" src=\"https://monquang.com.vn/medias/user_files/images/1/mon-quang-ba-mua.jpg\" /></a></p>\r\n\r\n<p><a href=\"https://monquang.com.vn/san-pham\">M&oacute;n Quảng - B&agrave; Mua</a></p>\r\n\r\n<p>Mỳ Quảng B&agrave; Mua đ&atilde; được du kh&aacute;ch y&ecirc;u th&iacute;ch v&agrave; lu&ocirc;n được h&agrave;i l&ograve;ng mỗi khi đến qu&aacute;n để cảm nhận hương vị ri&ecirc;ng cho mỗi t&ocirc; mỳ.</p>\r\n\r\n<p>Để thưởng thức Mỳ Quảng c&ugrave;ng với những m&oacute;n ăn đậm đ&agrave; hương vị xứ Quảng. C&aacute;c bạn c&oacute; để đến c&aacute;c địa chỉ sau:</p>\r\n\r\n<ul>\r\n	<li><strong>19 Trần B&igrave;nh Trọng - Đ&agrave; Nẵng</strong></li>\r\n	<li><strong>44 L&ecirc; Đ&igrave;nh Dương - Đ&agrave; Nẵng</strong></li>\r\n	<li><strong>231 Đống Đa - Đ&agrave; Nẵng</strong></li>\r\n	<li><strong>259 Hồ Nghinh - Đ&agrave; Nẵng</strong></li>\r\n</ul>', 2, 1, '/storage/uploads/2021/12/14/my-quang-ech.jpg', '2021-12-14 10:58:25', '2023-06-29 13:43:38', 676),
(4, 'Đặc sản Chả Bò', 'Đà Nẵng nổi tiếng với nền ẩm thực phong phú, một trong những đặc sản không thể kể đến là chả bò Đà nẵng', '<p><a href=\"https://monquang.com.vn/chi-tiet-tin/dac-san-cha-bo\">Chả b&ograve;</a>&nbsp;l&agrave; m&oacute;n ăn nỗi tiếng của người Đ&agrave; Nẵng. Được chế biến từ thịt b&ograve; tươi, thơm ngon để tạo n&ecirc;n hương vị ri&ecirc;ng của m&oacute;n ăn. Ch&uacute;ng ta h&atilde;y c&ugrave;ng nhau t&igrave;m hiểu để c&oacute; thể l&agrave;m được m&oacute;n chả b&ograve; ngon.</p>\r\n\r\n<p>Nguy&ecirc;n liệu l&agrave;m chả b&ograve; Đ&agrave; Nẵng:</p>\r\n\r\n<p>- 500g thịt b&ograve; xay sẵn thịt c&oacute; đ&iacute;nh mỡ th&igrave; hương vị chả l&agrave;m ra sẽ ngon hơn.</p>\r\n\r\n<p>- Hai muỗng canh nước mắm thơm ngon.</p>\r\n\r\n<p>- 1,5 muỗng c&agrave; ph&ecirc; bột n&ecirc;m.</p>\r\n\r\n<p>- Một muỗng c&agrave; ph&ecirc; hạt ti&ecirc;u đ&atilde; đập dập. Hương ti&ecirc;u sẽ tạo n&ecirc;n sự cay nồng đặc biệt cho m&oacute;n chả.</p>\r\n\r\n<p>- Tỏi t&eacute;p b&oacute;c vỏ để chả b&ograve; thơ</p>\r\n\r\n<p>- 1,5 muỗng c&agrave; ph&ecirc; đường.</p>\r\n\r\n<p>- Một muỗng c&agrave; ph&ecirc; bột nổi.</p>\r\n\r\n<p>- Hai muỗng bột năng.</p>\r\n\r\n<p>- Bảy muỗng c&agrave; ph&ecirc; nước lạnh.</p>\r\n\r\n<p>Nguy&ecirc;n liệu - Chả b&ograve; Đ&agrave; Nẵng</p>\r\n\r\n<p>C&aacute;ch l&agrave;m chả b&ograve; Đ&agrave; Nẵng</p>\r\n\r\n<p>Lấy thịt b&ograve; xay ướp nước mắm, hạt ti&ecirc;u, đường tỏi, trộn cho đều. Để hương bị thơm ngon hơn ta c&oacute; thể cho v&agrave;o t&uacute;i ni l&ocirc;ng để trong ngăn đ&aacute; trong 1 giờ đến hai giờ cho nguy&ecirc;n liệu thấm.</p>\r\n\r\n<p>Vị hơi ngọt nhưng rất đậm đ&agrave;, gi&ograve;n v&agrave; dai của chả b&ograve; Đ&agrave; Nẵng</p>\r\n\r\n<p>Lấy thịt ra xay th&ecirc;m 1 lần nữa để cho nguy&ecirc;n liệu thơm v&agrave; dẽo l&agrave; đ&atilde; đạt y&ecirc;u cầu.</p>\r\n\r\n<p>D&ugrave;ng l&aacute; chuối hoặc giấy nh&ocirc;m để g&oacute;i chả. Nhớ quấn chả thật chặt để hạn chế nữa lỗ hở tr&ecirc;n c&acirc;y chả. Đem v&agrave;o hấp khoảng 30 ph&uacute;t cho chả ch&iacute;n. Sau đ&oacute; lấy chả ra để nguộc tự nhi&ecirc;n cho nước tiếc hết ra cho sau n&agrave;y chả kh&ocirc;ng bị th&acirc;m&nbsp;đen.</p>\r\n\r\n<p>M&oacute;n chả n&agrave;y ăn với b&aacute;nh m&igrave;.</p>\r\n\r\n<p>Chả b&ograve; sau khi chế biến cẩn thận sẽ c&oacute; m&ugrave;i thơm ngon. Ch&uacute; ta c&oacute; thể ăn với v&agrave;i hạt ti&ecirc;u, t&eacute;p tỏi, những loại rau ăn k&egrave;m để tăng th&ecirc;m sự hấp dẫn cho m&oacute;n ăn.</p>\r\n\r\n<p><img alt=\"\" src=\"https://monquang.com.vn/medias/user_files/images/1/cha---mi-quang-ba-mua.jpg\" /></p>\r\n\r\n<p>Ch&uacute;ng ta c&ugrave;ng thưởng thức hương vị thơm ngon của m&oacute;n chả tự chế biến.</p>', 1, 1, '/storage/uploads/2021/12/14/cha---mi-quang-ba-mua.jpg', '2021-12-14 10:59:19', '2023-06-23 05:20:21', 2),
(6, 'Du lịch Đà Nẵng đẹp, thú vị và nổi tiếng check-in siêu đẹp', 'Đà Nẵng là thành phố đã phát triển về du lịch từ lâu, với số lượng khách du lịch hàng năm lên đến con số vài triệu người', '<ol>\r\n	<li>\r\n	<h2><strong>Địa điểm vui chơi ở Đ&agrave; Nẵng</strong></h2>\r\n	</li>\r\n</ol>\r\n\r\n<p>Đ&agrave; Nẵng l&agrave; th&agrave;nh phố đ&atilde; ph&aacute;t triển về du lịch từ l&acirc;u, với số lượng kh&aacute;ch du lịch h&agrave;ng năm l&ecirc;n đến con số v&agrave;i triệu người, thế n&ecirc;n ở Đ&agrave; Nẵng c&oacute; kh&aacute; nhiều khu vui chơi giải tr&iacute; hấp dẫn nhằm phục vụ nhu cầu của du kh&aacute;ch:</p>\r\n\r\n<ol>\r\n	<li>\r\n	<h3><strong>Asia Park</strong></h3>\r\n	</li>\r\n</ol>\r\n\r\n<p>Asia Park l&agrave; khu tổ hợp vui chơi giải tr&iacute; lớn bậc nhất ở Đ&agrave; Nẵng, với 3 hạng mục ch&iacute;nh l&agrave; c&ocirc;ng vi&ecirc;n vui chơi giải tr&iacute;, khu Sun Wheel (v&ograve;ng quay mặt trời) v&agrave; khu vui chơi trong nh&agrave;.</p>\r\n\r\n<p><img alt=\"Asia Park - Đà Nẵng\" src=\"https://myquangbamua.com.vn/wp-content/uploads/2020/08/asia-park-da-nang.jpg\" title=\"Asia Park - Đà Nẵng\" /><br />\r\n<em>Asia Park</em></p>\r\n\r\n<ul>\r\n	<li>Ở c&ocirc;ng vi&ecirc;n vui chơi giải tr&iacute;, c&oacute; đến gần 20 tr&ograve; chơi cực vui v&agrave; th&uacute; vị để bạn kh&aacute;m ph&aacute;, từ những tr&ograve; chơi nhẹ nh&agrave;ng cho trẻ em như Happy Choo Choo, Love Lock&hellip; đến những tr&ograve; chơi cảm gi&aacute;c mạnh cho người lớn cực hay ho như Singapore Sling, Angry Motor&hellip;</li>\r\n</ul>\r\n\r\n<p><img alt=\"Trò chơi Singapore Sling ở Asia Park\" src=\"https://myquangbamua.com.vn/wp-content/uploads/2020/08/tro-choi-singapore-sling.jpg\" title=\"Trò chơi Singapore Sling ở Asia Park\" /><br />\r\n<em>Tr&ograve; chơi Singapore Slings</em></p>\r\n\r\n<ul>\r\n	<li>Đến khu Sun Wheel, bạn sẽ được thử cảm gi&aacute;c cheo leo, ch&ecirc;nh v&ecirc;nh tr&ecirc;n v&ograve;ng quay khổng lồ v&agrave; ngắm to&agrave;n bộ khung cảnh tuyệt đẹp của Đ&agrave; Nẵng từ tr&ecirc;n cao. Ngo&agrave;i ra, ở khu Sun Wheen c&ograve;n c&oacute; một số c&ocirc;ng tr&igrave;nh tuyệt t&aacute;c rất đ&aacute;ng để ngắm nh&igrave;n như Thuyền Rồng, Th&aacute;p Đồng Hồ, Tượng Phật&hellip;</li>\r\n	<li>Khu vui chơi giải tr&iacute; trong nh&agrave; sẽ khiến bạn cảm thấy phấn kh&iacute;ch với những tr&ograve; chơi cực kỳ vui nhộn như bắn banh Sun Blaster, Soft Play, Canival Game&hellip;</li>\r\n</ul>\r\n\r\n<ol>\r\n	<li>\r\n	<h3><strong>Fantasy Park</strong></h3>\r\n	</li>\r\n</ol>\r\n\r\n<p>Fantasy Park l&agrave; khu vui chơi giải tr&iacute; tr&ecirc;n B&agrave; N&agrave; Hill. Bước v&agrave;o Fantasy Park, bạn sẽ thấy giống như m&igrave;nh đang lạc v&agrave;o thế giới thần ti&ecirc;n trong truyện cổ t&iacute;ch, với những khu rừng Thần Ti&ecirc;n, c&ocirc;ng vi&ecirc;n khủng long&hellip; hay thử th&aacute;ch l&ograve;ng dũng cảm của m&igrave;nh bằng c&aacute;ch chinh phục những tr&ograve; chơi như Th&aacute;p Tự Do v&agrave; hơn 90 tr&ograve; chơi miễn ph&iacute; kh&aacute;c.</p>\r\n\r\n<p><img alt=\"Fantasy Park ở Bà Nà Hills\" src=\"https://myquangbamua.com.vn/wp-content/uploads/2020/08/fantasy-park-da-nang.jpg\" title=\"Fantasy Park ở Bà Nà Hills\" /><br />\r\n<em>Fantasy Park tr&ecirc;n B&agrave; N&agrave; Hills</em></p>\r\n\r\n<p>Trong Fantasy Park c&ograve;n c&oacute; rạp chiếu phim 2D, 3D v&agrave; 5D v&ocirc; c&ugrave;ng hiện đại, mang đến cho bạn v&agrave; gia đ&igrave;nh những ph&uacute;t gi&acirc;y thư gi&atilde;n thoải m&aacute;i khi đến du lịch Đ&agrave; Nẵng.</p>\r\n\r\n<ol>\r\n	<li>\r\n	<h3><strong>B&atilde;i biển Mỹ Kh&ecirc;</strong></h3>\r\n	</li>\r\n</ol>\r\n\r\n<p>B&atilde;i biển Mỹ Kh&ecirc; l&agrave; 1 trong số những b&atilde;i biển đẹp nhất ở Đ&agrave; Nẵng, v&agrave; sẽ thật l&agrave; qu&aacute; tiếc nuối nếu như bạn đến Đ&agrave; Nẵng m&agrave; kh&ocirc;ng được tắm biển cũng như vui chơi ở b&atilde;i biển Mỹ Kh&ecirc; 1 lần.</p>\r\n\r\n<p><img alt=\"Bãi biển Mỹ Khê Đà Nẵng\" src=\"https://myquangbamua.com.vn/wp-content/uploads/2020/08/bai-bien-my-khe-da-nang.jpg\" title=\"Bãi biển Mỹ Khê Đà Nẵng\" /><br />\r\n<em>B&atilde;i biển Mỹ Kh&ecirc; Đ&agrave; Nẵng</em></p>\r\n\r\n<ol>\r\n	<li>\r\n	<h3><strong>B&atilde;i tắm Non Nước</strong></h3>\r\n	</li>\r\n</ol>\r\n\r\n<p>B&atilde;i tắm Non Nước cũng l&agrave; một địa điểm vui chơi, tắm biển v&ocirc; c&ugrave;ng đẹp ở th&agrave;nh phố Đ&agrave; Nẵng.</p>\r\n\r\n<p><img alt=\"Bãi biển Non Nước - Đà Nẵng\" src=\"https://myquangbamua.com.vn/wp-content/uploads/2020/08/bai-bien-non-nuoc-da-nang.jpg\" title=\"Bãi biển Non Nước - Đà Nẵng\" /><br />\r\n<em>B&atilde;i biển Non Nước</em></p>\r\n\r\n<ol>\r\n	<li>\r\n	<h3><strong>Suối kho&aacute;ng n&oacute;ng N&uacute;i Thần T&agrave;i</strong></h3>\r\n	</li>\r\n</ol>\r\n\r\n<p>Một địa điểm kh&aacute;c ở Đ&agrave; Nẵng sẽ mang đến cho bạn những ph&uacute;t gi&acirc;y nghỉ ngơi, thư gi&atilde;n v&ocirc; c&ugrave;ng tuyệt vời, đ&oacute; l&agrave; suối kho&aacute;ng n&oacute;ng tr&ecirc;n N&uacute;i Thần T&agrave;i.</p>\r\n\r\n<p><img alt=\"Suối khoáng nóng Núi Thần Tài\" src=\"https://myquangbamua.com.vn/wp-content/uploads/2020/08/suoi-khoang-nong-nui-than-tai.jpg\" title=\"Suối khoáng nóng Núi Thần Tài\" /></p>\r\n\r\n<p><em>Suối kho&aacute;ng n&oacute;ng N&uacute;i Thần T&agrave;i​</em></p>\r\n\r\n<p>Đến đ&acirc;y, bạn sẽ được tận hưởng giảm gi&aacute;c ng&acirc;m m&igrave;nh trong l&agrave;n nước n&oacute;ng tự nhi&ecirc;n chảy từ đỉnh n&uacute;i B&agrave; N&agrave; rất tốt cho sức khỏe v&agrave; tinh thần của bạn.</p>\r\n\r\n<h3><strong>6. Th&aacute;c nước H&ograve;a Ph&uacute; Th&agrave;nh</strong></h3>\r\n\r\n<p><img alt=\"Thác nước Hòa Phú Thành, Đà Nẵng\" src=\"https://myquangbamua.com.vn/wp-content/uploads/2020/08/thac-nuoc-hoa-phu-thanh.jpg\" title=\"Thác nước Hòa Phú Thành, Đà Nẵng\" /><br />\r\n<em>Trải nghiệm cảm gi&aacute;c ch&ecirc;nh v&ecirc;nh, ch&ograve;ng ch&agrave;nh tr&ecirc;n th&aacute;c nước H&ograve;a Ph&uacute; Th&agrave;nh sẽ gi&uacute;p bạn refresh lại đầu &oacute;c sau những ng&agrave;y l&agrave;m việc căng thẳng đấy!</em></p>\r\n\r\n<ol>\r\n	<li>\r\n	<h2><strong>Cảnh đẹp nhất định phải chụp ảnh check in khi đến Đ&agrave; Nẵng</strong></h2>\r\n	</li>\r\n</ol>\r\n\r\n<p>Ở Đ&agrave; Nẵng, c&oacute; những địa điểm phải n&oacute;i l&agrave; đẹp như trong phim H&agrave;n Quốc, rất th&iacute;ch hợp để c&aacute;c bạn trẻ đến đ&acirc;y v&agrave; check in sống ảo.</p>\r\n\r\n<p>Những địa điểm đ&oacute; l&agrave;:</p>\r\n\r\n<ol>\r\n	<li>\r\n	<h3><strong>Cầu Rồng</strong></h3>\r\n	</li>\r\n</ol>\r\n\r\n<p>Cầu Rồng với những &aacute;nh đ&egrave;n lấp l&aacute;nh đủ m&agrave;u sắc sẽ l&agrave; một địa điểm đi chơi v&agrave; check in đẹp tuyệt vời ở Đ&agrave; Nẵng v&agrave;o buổi tối đấy!</p>\r\n\r\n<p><img alt=\"Cầu Rồng Đà Nẵng\" src=\"https://myquangbamua.com.vn/wp-content/uploads/2020/08/cau-rong-da-nang.jpg\" title=\"Cầu Rồng Đà Nẵng\" /><br />\r\n<em>Vẻ đẹp của Cầu Rồng v&agrave;o buổi tối</em></p>\r\n\r\n<ol>\r\n	<li>\r\n	<h3><strong>Khu l&agrave;ng Ph&aacute;p tr&ecirc;n B&agrave; N&agrave; Hills</strong></h3>\r\n	</li>\r\n</ol>\r\n\r\n<p>Ở Việt Nam m&agrave; cứ ngỡ như đang ở Ph&aacute;p với những ng&ocirc;i nh&agrave; mang đậm kiến tr&uacute;c Ph&aacute;p xinh đẹp tr&ecirc;n n&uacute;i B&agrave; N&agrave;. Đ&acirc;y kh&ocirc;ng chỉ l&agrave; một địa điểm check in đẹp m&agrave; c&ograve;n l&agrave; một nơi rất th&uacute; vị để bạn vui chơi v&agrave; kh&aacute;m ph&aacute; khi đến Đ&agrave; Nẵng.</p>\r\n\r\n<p><img alt=\"Khu làng Pháp trên Bà Nà Hills\" src=\"https://myquangbamua.com.vn/wp-content/uploads/2020/08/khu-lang-phap.jpg\" title=\"Khu làng Pháp trên Bà Nà Hills\" /><br />\r\n<em>Khu l&agrave;ng Ph&aacute;p đẹp v&agrave; l&atilde;ng mạn&nbsp;như trong truyện cổ t&iacute;ch</em><img alt=\"Khu làng Pháp ở Đà Nẵng nhìn từ xa\" src=\"https://myquangbamua.com.vn/wp-content/uploads/2020/08/khu-lang-phap-trong-ba-na-hills.jpg\" title=\"Khu làng Pháp ở Đà Nẵng nhìn từ xa\" /><br />\r\nNg&ocirc;i l&agrave;ng Ph&aacute;p nh&igrave;n từ xa</p>\r\n\r\n<ol>\r\n	<li>\r\n	<h3><strong>L&agrave;ng hoa t&igrave;nh y&ecirc;u</strong></h3>\r\n	</li>\r\n</ol>\r\n\r\n<p>L&agrave;ng hoa T&igrave;nh Y&ecirc;u tr&ecirc;n n&uacute;i B&agrave; N&agrave; đẹp kh&ocirc;ng thua k&eacute;m g&igrave; những vườn hoa rực rỡ ở Đ&agrave; Lạt. Đến đ&acirc;y, chắc chắn bạn sẽ cho&aacute;ng ngợp bởi sắc m&agrave;u của c&aacute;c lo&agrave;i hoa, v&agrave; sẽ c&oacute; những tấm ảnh check in đẹp để đời để mang về khoe với bạn b&egrave;.</p>\r\n\r\n<p><img alt=\"Làng hoa Tình Yêu Đà Nẵng\" src=\"https://myquangbamua.com.vn/wp-content/uploads/2020/08/lang-hoa-tinh-yeu-da-nang.jpg\" title=\"Làng hoa Tình Yêu Đà Nẵng\" /><br />\r\n<em>L&agrave;ng hoa T&igrave;nh Y&ecirc;u Đ&agrave; Nẵng​</em></p>\r\n\r\n<ol>\r\n	<li>\r\n	<h3><strong>Đ&egrave;o Hải V&acirc;n</strong></h3>\r\n	</li>\r\n</ol>\r\n\r\n<p>Đ&egrave;o Hải V&acirc;n xanh ngắt một m&agrave;u, b&ecirc;n tr&ecirc;n l&agrave; những dải m&acirc;y bồng bềnh lững thững tr&ocirc;i, tạo n&ecirc;n một khung cảnh v&ocirc; c&ugrave;ng tuyệt vời.</p>\r\n\r\n<p><img alt=\"Đèo Hải Vân\" src=\"https://myquangbamua.com.vn/wp-content/uploads/2020/08/deo-hai-van.jpg\" title=\"Đèo Hải Vân\" /><br />\r\n<em>Đ&egrave;o Hải V&acirc;n với một b&ecirc;n l&agrave; b&atilde;i biển trải d&agrave;i, một b&ecirc;n l&agrave; v&aacute;ch n&uacute;i dựng đứng xanh ngắt một m&agrave;u</em></p>\r\n\r\n<p>Đ&acirc;y cũng sẽ l&agrave; một background tuyệt đẹp cho những tấm ảnh check in của bạn đấy!</p>\r\n\r\n<ol>\r\n	<li>\r\n	<h3><strong>Cầu T&igrave;nh Y&ecirc;u</strong></h3>\r\n	</li>\r\n</ol>\r\n\r\n<p>Được đến cầu T&igrave;nh Y&ecirc;u với một nửa của m&igrave;nh sẽ l&agrave; một cảm gi&aacute;c v&ocirc; c&ugrave;ng hạnh ph&uacute;c. Khung cảnh tr&ecirc;n cầu v&ocirc; c&ugrave;ng l&atilde;ng mạn, với những c&acirc;y cột đ&egrave;n h&igrave;nh tr&aacute;i tim, những chiếc kh&oacute;a b&ecirc;n hai lan can cầu minh chứng cho t&igrave;nh y&ecirc;u của rất nhiều cặp đ&ocirc;i sẽ l&agrave; một địa điểm chụp ảnh v&ocirc; c&ugrave;ng tuyệt vời d&agrave;nh cho bạn.</p>\r\n\r\n<p><img alt=\"Cầu Tình Yêu Đà Nẵng\" src=\"https://myquangbamua.com.vn/wp-content/uploads/2020/08/cau-tinh-yeu-da-nang.jpg\" title=\"Cầu Tình Yêu Đà Nẵng\" /><br />\r\n<em>Cầu T&igrave;nh Y&ecirc;u l&atilde;ng mạn như trong phim H&agrave;n Quốc</em></p>\r\n\r\n<ol>\r\n	<li>\r\n	<h3><strong>Cầu Nguyễn Văn Trỗi</strong></h3>\r\n	</li>\r\n</ol>\r\n\r\n<p>Cầu Nguyễn Văn Trỗi mang tr&ecirc;n m&igrave;nh thiết kế độc đ&aacute;o n&ecirc;n n&oacute; cũng trở th&agrave;nh một địa điểm check in của rất nhiều bạn trẻ khi đến với Đ&agrave; Nẵng.</p>\r\n\r\n<p><img alt=\"Cầu Nguyễn Văn Trỗi Đà Nẵng\" src=\"https://myquangbamua.com.vn/wp-content/uploads/2020/08/cau-nguyen-van-troi.jpg\" title=\"Cầu Nguyễn Văn Trỗi Đà Nẵng\" /><br />\r\n<em>Cầu Nguyễn Văn Trỗi với thiết kế độc đ&aacute;o l&agrave; địa điểm check in y&ecirc;u th&iacute;ch của rất nhiều bạn trẻ</em><img alt=\"Check in ở cầu Nguyễn Văn Trỗi Đà Nẵng\" src=\"https://myquangbamua.com.vn/wp-content/uploads/2020/08/check-in-o-cau-nguyen-van-troi.jpg\" title=\"Check in ở cầu Nguyễn Văn Trỗi Đà Nẵng\" /><br />\r\nCheck in ở cầu Nguyễn Văn Trỗi</p>\r\n\r\n<blockquote>\r\n<p><em>&gt;&gt;&gt; Th&ocirc;ng tin hữu &iacute;ch n&ecirc;n tham khảo:&nbsp;<a href=\"http://anbinhtravel.com/goc-du-lich/mon-an-ngon-va-quan-an-ngon-o-da-nang.html\" title=\"Món ăn ngon và quán ăn ngon Đà Nẵng - Anbinh Travel\">100+ m&oacute;n ăn ngon v&agrave; qu&aacute;n ăn ngon ở Đ&agrave; Nẵng nhất định phải thử</a></em></p>\r\n</blockquote>\r\n\r\n<ol>\r\n	<li>\r\n	<h2><strong>C&aacute;c địa điểm phượt v&ocirc; c&ugrave;ng th&uacute; vị ở Đ&agrave; Nẵng</strong></h2>\r\n	</li>\r\n</ol>\r\n\r\n<p>Nhắc tới những địa điểm du lịch phượt dưới đ&acirc;y, chắc hẳn nhiều bạn sẽ phải &aacute; ố rằng, ơ sao Đ&agrave; Nẵng lại c&oacute; những điểm du lịch phượt lạ thế n&agrave;y &aacute;, gi&aacute; m&agrave; m&igrave;nh biết sớm hơn&hellip;</p>\r\n\r\n<ol>\r\n	<li>\r\n	<h3><strong>C&ugrave; Lao Ch&agrave;m</strong></h3>\r\n	</li>\r\n</ol>\r\n\r\n<p>Ở C&ugrave; Lao Ch&agrave;m c&oacute; rất nhiều h&ograve;n đảo nhỏ c&ograve;n hoang sơ, rất th&iacute;ch hợp cho những chuyến du lịch kh&aacute;m ph&aacute; v&agrave; phượt như H&ograve;n Lao, H&ograve;n D&agrave;i, H&ograve;n Chồng, H&ograve;n Yến v&agrave; l&agrave;ng Ch&agrave;i.</p>\r\n\r\n<p><img alt=\"Cù Lao Chàm - Đà Nẵng\" src=\"https://myquangbamua.com.vn/wp-content/uploads/2020/08/cu-lao-cham.jpg\" title=\"Cù Lao Chàm - Đà Nẵng\" /><br />\r\n<em>Vẻ đẹp hoang sơ của C&ugrave; Lao Ch&agrave;m</em><img alt=\"Đảo Hòn Lao - Cù Lao Chàm\" src=\"https://myquangbamua.com.vn/wp-content/uploads/2020/08/dao-hon-lao-cu-lao-cham.jpg\" title=\"Đảo Hòn Lao - Cù Lao Chàm\" /><br />\r\nĐảo H&ograve;n Lao &ndash; C&ugrave; Lao Ch&agrave;m​<img alt=\"Hòn Chồng, Cù Lao Chàm - Đà Nẵng\" src=\"https://myquangbamua.com.vn/wp-content/uploads/2020/08/hon-chong-da-nang.jpg\" title=\"Hòn Chồng, Cù Lao Chàm - Đà Nẵng\" /><br />\r\nH&ograve;n Chồng</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<ol>\r\n	<li>\r\n	<h3><strong>Rạn Nam &Ocirc;</strong></h3>\r\n	</li>\r\n</ol>\r\n\r\n<p>&nbsp;<img alt=\"Rạn Nam Ô Đà Nẵng\" src=\"https://myquangbamua.com.vn/wp-content/uploads/2020/08/ran-nam-o-da-nang.jpg\" title=\"Rạn Nam Ô Đà Nẵng\" /><br />\r\n<em>Rạn Nam &Ocirc; với những ghềnh đ&aacute; hoang sơ, những con s&oacute;ng bạc đầu đẹp rạng ngời trong ho&agrave;ng h&ocirc;n hay nắng sớm</em></p>\r\n\r\n<ol>\r\n	<li>\r\n	<h3><strong>Đồng Nghệ</strong></h3>\r\n	</li>\r\n</ol>\r\n\r\n<p>&nbsp;<img alt=\"Đồng Nghệ Đà Nẵng\" src=\"https://myquangbamua.com.vn/wp-content/uploads/2020/08/dong-nghe-da-nang.jpg\" title=\"Đồng Nghệ Đà Nẵng\" /><br />\r\n<em>Đồng Nghệ &ndash; Đ&agrave; Nẵng</em></p>\r\n\r\n<ol>\r\n	<li>\r\n	<h3><strong>L&agrave;ng V&acirc;n</strong></h3>\r\n	</li>\r\n</ol>\r\n\r\n<p>&nbsp;<img alt=\"Làng Vân Đà Nẵng\" src=\"https://myquangbamua.com.vn/wp-content/uploads/2020/08/lang-van-da-nang.jpg\" title=\"Làng Vân Đà Nẵng\" /><br />\r\n<em>L&agrave;ng V&acirc;n Đ&agrave; Nẵng nằm ngay dưới ch&acirc;n đ&egrave;o Hải V&acirc;n</em></p>\r\n\r\n<ol>\r\n	<li>\r\n	<h3><strong>Ghềnh B&agrave;ng</strong></h3>\r\n	</li>\r\n</ol>\r\n\r\n<p>&nbsp;<img alt=\"Ghềnh Bàng Đà Nẵng\" src=\"https://myquangbamua.com.vn/wp-content/uploads/2020/08/ghenh-bang-da-nang.jpg\" title=\"Ghềnh Bàng Đà Nẵng\" /><br />\r\n<em>Vẻ đẹp hoang sơ của Ghềnh B&agrave;ng</em></p>\r\n\r\n<ol>\r\n	<li>\r\n	<h3><strong>L&agrave;ng cổ Phong Nam</strong></h3>\r\n	</li>\r\n</ol>\r\n\r\n<p>&nbsp;<img alt=\"Làng cổ Phong Nam - Đà Nẵng\" src=\"https://myquangbamua.com.vn/wp-content/uploads/2020/08/lang-co-phong-nam-da-nang.jpg\" title=\"Làng cổ Phong Nam - Đà Nẵng\" /><br />\r\n<em>L&agrave;ng cổ Phong Nam với qu&aacute; nhiều điều tuyệt vời đang chờ đ&oacute;n bạn đến kh&aacute;m ph&aacute;</em></p>\r\n\r\n<ol>\r\n	<li>\r\n	<h3><strong>L&agrave;ng B&iacute;ch Họa</strong></h3>\r\n	</li>\r\n</ol>\r\n\r\n<p>&nbsp;<img alt=\"Làng Bích Họa Đà Nẵng\" src=\"https://myquangbamua.com.vn/wp-content/uploads/2020/08/lang-bich-hoa-da-nang.jpg\" title=\"Làng Bích Họa Đà Nẵng\" /><br />\r\n<em>L&agrave;ng ch&agrave;i B&iacute;ch Họa với vẻ đẹp lạ lẫm, cuốn h&uacute;t rất nhiều bạn trẻ v&agrave; kh&aacute;ch du lịch</em></p>\r\n\r\n<ol>\r\n	<li>\r\n	<h3><strong>Rừng ngập mặn nguy&ecirc;n sinh Tam Giang</strong></h3>\r\n	</li>\r\n</ol>\r\n\r\n<p>&nbsp;<img alt=\"Rừng ngập mặn nguyên sinh Tam Giang\" src=\"https://myquangbamua.com.vn/wp-content/uploads/2020/08/rung-ngap-man-nguyen-sinh-tam-giang.jpg\" title=\"Rừng ngập mặn nguyên sinh Tam Giang\" /><br />\r\n<em>Rừng ngập mặn nguy&ecirc;n sinh Tam Giang</em></p>\r\n\r\n<ol>\r\n	<li>\r\n	<h3><strong>B&atilde;i Rạng</strong></h3>\r\n	</li>\r\n</ol>\r\n\r\n<p>&nbsp;<img alt=\"Bãi Rạng Đà Nẵng\" src=\"https://myquangbamua.com.vn/wp-content/uploads/2020/08/bai-rang-da-nang.jpg\" title=\"Bãi Rạng Đà Nẵng\" /><br />\r\n<em>B&atilde;i Rạng Đ&agrave; Nẵng</em></p>\r\n\r\n<ol>\r\n	<li>\r\n	<h3><strong>Giếng trời</strong></h3>\r\n	</li>\r\n</ol>\r\n\r\n<p>&nbsp;<img alt=\"Giếng trời Đà Nẵng\" src=\"https://myquangbamua.com.vn/wp-content/uploads/2020/08/gieng-troi-da-nang.jpg\" title=\"Giếng trời Đà Nẵng\" /><br />\r\n<em>Giếng Trời Đ&agrave; Nẵng</em></p>\r\n\r\n<ol>\r\n	<li>\r\n	<h3><strong>Đỉnh Bạch M&atilde;</strong></h3>\r\n	</li>\r\n</ol>\r\n\r\n<p>&nbsp;<img alt=\"Đỉnh Bạch Mã Đà Nẵng\" src=\"https://myquangbamua.com.vn/wp-content/uploads/2020/08/dinh-bach-ma-da-nang.jpg\" title=\"Đỉnh Bạch Mã Đà Nẵng\" /><br />\r\n<em>Đỉnh Bạch M&atilde; Đ&agrave; Nẵng</em></p>\r\n\r\n<ol>\r\n	<li>\r\n	<h3><strong>Đỉnh B&agrave;n Cờ</strong></h3>\r\n	</li>\r\n</ol>\r\n\r\n<p><img alt=\"Đỉnh Bàn Cờ Đà Nẵng\" src=\"https://myquangbamua.com.vn/wp-content/uploads/2020/08/dinh-ban-co-da-nang.jpg\" title=\"Đỉnh Bàn Cờ Đà Nẵng\" /><br />\r\n<em>Đỉnh B&agrave;n Cờ &ndash; bạn đ&atilde; bao giờ check in ở đ&acirc;y chưa?</em></p>\r\n\r\n<h3><strong>13. Hồ H&ograve;a Trung</strong></h3>\r\n\r\n<p><em><img alt=\"Hồ Hòa Trung Đà Nẵng\" src=\"https://myquangbamua.com.vn/wp-content/uploads/2020/08/ho-hoa-trung-da-nang.jpg\" title=\"Hồ Hòa Trung Đà Nẵng\" /><br />\r\nVẻ đẹp hoang sơ của hồ H&ograve;a Trung, Đ&agrave; Nẵng</em></p>\r\n\r\n<p><strong>Tr&iacute;ch từ&nbsp;Anbinhtravel</strong></p>', 0, 1, '/storage/uploads/2022/01/10/dinh-ban-co-da-nang-720x360.jpg', '2022-01-10 13:32:35', '2023-06-29 13:51:14', 87);
INSERT INTO `posts` (`id`, `name`, `description`, `content`, `category_id`, `active`, `thumb`, `created_at`, `updated_at`, `view`) VALUES
(7, 'Du lịch Đà Nẵng ăn gì ngon, bổ, rẻ?', 'Đà Nẵng được xem là tâm điểm của ba di sản thế giới: Cố đô Huế, phố cổ Hội An và thánh địa Mỹ Sơn,...', '<h2>Đ&agrave; Nẵng được xem l&agrave; t&acirc;m điểm của ba di sản thế giới: Cố đ&ocirc; Huế, phố cổ Hội An v&agrave; th&aacute;nh địa Mỹ Sơn, trở th&agrave;nh điểm du lịch l&yacute; tưởng. Tới Đ&agrave; Nẵng bạn ho&agrave;n to&agrave;n y&ecirc;n t&acirc;m khi băn khoăn&nbsp;ăn g&igrave; khi du lịch Đ&agrave; Nẵng?&nbsp;bởi đồ ăn ở đ&acirc;y đ&uacute;ng theo ti&ecirc;u ch&iacute; ngon &ndash; bổ -rẻ đặc biệt người d&acirc;n Đ&agrave; Nẵng rất th&acirc;n thiện v&agrave; mến kh&aacute;ch du lịch. Tới Đ&agrave; Nẵng c&aacute;c bạn n&ecirc;n thưởng thức những m&oacute;n ăn nổi tiếng như:</h2>\r\n\r\n<p><img alt=\"Địa điểm ăn uống ngon và rẻ ở Đà Nẵng\" src=\"https://myquangbamua.com.vn/wp-content/uploads/2020/08/du-lich-da-nang-an-gi-ngon-bo-re-2.jpg\" /></p>\r\n\r\n<p><em><strong>Đặc sản nổi tiếng v&agrave; rẻ ở Đ&agrave; Nẵng</strong></em></p>\r\n\r\n<p>+&nbsp;M&igrave; Quảng&nbsp;l&agrave; m&oacute;n ăn nổi tiếng của mảnh đất Đ&agrave; Th&agrave;nh, được biến tấu với nhiều hương vị kh&aacute;c nhau như m&igrave; Quảng lươn, m&igrave; Quảng chả cua trong đ&oacute; phổ biến nhất l&agrave; m&igrave; Quảng t&ocirc;m, g&agrave;, trứng, thịt ăn k&egrave;m với b&aacute;nh tr&aacute;ng nướng v&agrave; đậu phộng rang. Dưới đ&acirc;y, l&agrave; một số&nbsp;qu&aacute;n ăn ngon ở Đ&agrave; Nẵng:</p>\r\n\r\n<ul>\r\n	<li><a href=\"https://myquangbamua.com.vn/thuc-don\">Qu&aacute;n m&igrave; Quảng B&agrave; Mua</a>&nbsp;(Địa chỉ 95A Nguyễn Tri Phương, Quận Hải Ch&acirc;u, Đ&agrave; Nẵng) nổi tiếng tại Đ&agrave; Nẵng, m&igrave; thơm&nbsp;ngon&nbsp;v&agrave; gi&aacute; khoảng 25.000&nbsp;&ndash; 30.000đ/ t&ocirc;.</li>\r\n	<li>Qu&aacute;n m&igrave; Quảng Thi (địa chỉ 251 Ho&agrave;ng Diệu, Quận Hải Ch&acirc;u, Đ&agrave; Nẵng) nổi tiếng ngon v&agrave; đ&ocirc;ng kh&aacute;ch. M&igrave; ở đ&acirc;y rất ngon, gi&aacute; rẻ chỉ khoảng 18.000-30.000 t&ocirc; m&igrave; lớn, với nhiều vị kh&aacute;c nhau như m&igrave; g&agrave;, m&igrave; ếch, m&igrave; c&aacute; l&oacute;c&hellip;</li>\r\n	<li>Qu&aacute;n m&igrave; B&agrave; Vị (địa chỉ 166 L&ecirc; Đ&igrave;nh Dương, Quận Hải Ch&acirc;u, Đ&agrave; Nẵng) rất đ&ocirc;ng kh&aacute;ch, m&igrave; ngon khỏi ch&ecirc;, một t&ocirc; m&igrave; c&oacute; gi&aacute; dao động từ 25k/t&ocirc;.</li>\r\n	<li>Hay qu&aacute;n m&igrave; Quảng 1A, Hải Ph&ograve;ng, Quận Hải Ch&acirc;u, qu&aacute;n m&igrave; Quảng Đại Lộc L&ecirc; Phước Phượng, 277 Đống Đa, quận Hải Ch&acirc;u, Đ&agrave; Nẵng đều l&agrave; những qu&aacute;n m&igrave; Quảng ngon, nổi tiếng v&agrave; gi&aacute; kh&aacute; b&igrave;nh d&acirc;n.</li>\r\n</ul>\r\n\r\n<p>+ Gỏi c&aacute; Nam &Ocirc;: l&agrave; m&oacute;n ăn ngon, nếu ăn một lần rồi rất dễ nghiện, tuy nhi&ecirc;n kh&ocirc;ng phải ai cũng d&aacute;m thưởng thức m&oacute;n ăn n&agrave;y v&igrave; được l&agrave;m từ c&aacute; sống.<br />\r\nM&oacute;n gỏi c&aacute; Nam &Ocirc; c&oacute; thể ăn với rau c&aacute;c loại cuối b&aacute;nh tr&aacute;ng hoặc trộn c&aacute; với rau v&agrave; nước chấm, hương vị ngọt m&aacute;t, b&ugrave;i, cay thơm kh&oacute; tả khi hương vị thấm v&agrave;o từng đầu lưỡi.</p>\r\n\r\n<p>Nhắc tới gỏi c&aacute; Nam &Ocirc; phải kể tới địa chỉ 972 Nguyễn Lương Bằng, Quận Li&ecirc;n Chiểu, Đ&agrave; Nẵng, rất đ&ocirc;ng kh&aacute;ch, mỗi suất c&oacute; gi&aacute; từ 50-100.000 đồng. Hay qu&aacute;n gỏi c&aacute; Thanh Hương, 1029 Nguyễn Lương Bằng,&nbsp;Quận Li&ecirc;n Chiểu, Đ&agrave; Nẵng ngon nổi tiếng, mỗi suất gỏi c&aacute; 100.000 đồng, nếu gọi những m&oacute;n kh&aacute;c từ 45-145.000 đồng t&ugrave;y theo bạn lựa chọn.</p>\r\n\r\n<p><img alt=\"Những quán ăn ngon, rẻ ở Đà Nẵng\" src=\"https://myquangbamua.com.vn/wp-content/uploads/2020/08/du-lich-da-nang-an-gi-ngon-bo-re-3.jpg\" /></p>\r\n\r\n<p><em><strong>Địa điểm ăn ngon v&agrave; nổi tiếng ở Đ&agrave; Nẵng</strong></em></p>\r\n\r\n<p>+ B&uacute;n chả c&aacute;&nbsp;kh&ocirc;ng phải l&agrave; m&oacute;n ăn lạ, tuy nhi&ecirc;n b&uacute;n chả c&aacute; ở Đ&agrave; Nẵng c&oacute; hương vị ri&ecirc;ng biệt m&agrave; kh&ocirc;ng nơi n&agrave;o c&oacute; được, do đ&oacute; đối với mỗi du kh&aacute;ch khi tới Đ&agrave; Nẵng đều kh&ocirc;ng qu&ecirc;n thưởng thức m&oacute;n ăn n&agrave;y. T&ocirc; b&uacute;n kết hợp với vị ngọt thanh của rau củ quả v&agrave; vị đậm đ&agrave; của nước l&egrave;o ăn một lần rồi nhớ m&atilde;i.</p>\r\n\r\n<p>Những qu&aacute;n ăn&nbsp;ngon v&agrave; rẻ ở Đ&agrave; Nẵng&nbsp;phải kể tới:&nbsp;Qu&aacute;n b&uacute;n chả c&aacute; tr&ecirc;n đường H&ugrave;ng Vương b&aacute;n cả ng&agrave;y từ 7h-21h hay tr&ecirc;n đường Trần Cao V&acirc;n đối diện chợ Tam H&ograve;a cũng rất ngon v&agrave; rẻ tuy nhi&ecirc;n chỉ b&aacute;n buổi s&aacute;ng c&oacute; gi&aacute; từ 15.000 đồng/t&ocirc;.</p>\r\n\r\n<p>+ B&aacute;nh tr&aacute;ng cuốn thịt heo:&nbsp;l&agrave; m&oacute;n nổi tiếng ở Đ&agrave; Nẵng với c&aacute;ch l&agrave;m đơn giản nhưng rất dễ ăn. Được l&agrave;m từ những nguy&ecirc;n liệu được chọn kĩ lưỡng tạo hương vị đặc trưng ri&ecirc;ng cho m&oacute;n ăn ăn k&egrave;m với rau, củ, đặc biệt b&iacute; quyết nếm nước chấm ch&iacute;nh l&agrave; tuyệt chi&ecirc;u l&agrave;m n&ecirc;n sự hấp dẫn của m&oacute;n b&aacute;nh tr&aacute;ng cuốn thịt heo ở Đ&agrave; Nẵng.</p>\r\n\r\n<p>Những địa chỉ b&aacute;nh tr&aacute;ng cuốn thịt heo nổi tiếng v&agrave; gi&aacute; rẻ ở Đ&agrave; Nẵng:</p>\r\n\r\n<ul>\r\n	<li><a href=\"https://myquangbamua.com.vn/thuc-don\">Qu&aacute;n m&igrave; Quảng B&agrave; Mua</a>&nbsp;(Địa chỉ 95A Nguyễn Tri Phương, Quận Hải Ch&acirc;u, Đ&agrave; Nẵng) kh&ocirc;ng chỉ nổi tiếng về m&oacute;n mỳ Quảng v&agrave; c&ograve;n b&aacute;nh tr&aacute;ng thịt heo cũng hết &yacute;, một suất ăn&nbsp;gi&aacute;&nbsp;35.000đ/phần.</li>\r\n	<li>Qu&aacute;n B&aacute;nh Tr&aacute;ng Thịt Heo Mậu (Địa chỉ&nbsp;35 Đỗ th&uacute;c Tịnh, Quận Cẩm Lệ, Đ&agrave; Nẵng) l&uacute;c n&agrave;o cũng rất đ&ocirc;ng kh&aacute;ch, ngon, nước chấm đặc biệt, gi&aacute; cả hấp dẫn chỉ với 55.000/suất ăn no.</li>\r\n	<li>Qu&aacute;n Qu&ecirc; Nh&agrave; (Địa chỉ&nbsp;K72/1C H&agrave;m Nghi,&nbsp;Quận Thanh Kh&ecirc;, Đ&agrave; Nẵng) ngon nổi tiếng, nhiều thịt, một suất chỉ c&oacute; gi&aacute; 35 ngh&igrave;n/người ăn no.</li>\r\n	<li>Qu&aacute;n B&aacute;nh tr&aacute;ng Thịt Heo B&agrave; Hường &ndash; 364 2 th&aacute;ng 9, Quận Hải Ch&acirc;u, Đ&agrave; Nẵng rất ngon một suất c&oacute; gi&aacute; 50 ngh&igrave;n.</li>\r\n</ul>\r\n\r\n<p>+ B&aacute;nh x&egrave;o:&nbsp;tới Đ&agrave; Nẵng kh&ocirc;ng thể kh&ocirc;ng thưởng thức m&oacute;n b&aacute;nh x&egrave;o ngon nổi tiếng, được l&agrave;m theo c&ocirc;ng thức đặc biệt ăn một lần nhớ m&atilde;i.</p>\r\n\r\n<ul>\r\n	<li>Qu&aacute;n b&aacute;nh x&egrave;o b&agrave; Dưỡng (Địa chỉ&nbsp; K280/23, Ho&agrave;ng Diệu, Quận Hải Ch&acirc;u, Đ&agrave; Nẵng) được nhiều du kh&aacute;ch đ&aacute;nh gi&aacute; ngon v&agrave; rẻ, gi&aacute; một suất khoảng 20 ngh&igrave;n, nếu hai người ăn chỉ 50 ngh&igrave;n l&agrave; no căng.</li>\r\n	<li>B&aacute;nh x&egrave;o Quảng c&ocirc; Mười (địa chỉ&nbsp;23 Ch&acirc;u Thị Vĩnh Tế, Quận Ngũ H&agrave;nh Sơn, Đ&agrave; Nẵng) ngon kh&ocirc;ng k&eacute;m c&oacute; gi&aacute; 15 ngh&igrave;n/c&aacute;i, bạn c&oacute; thể thưởng thức th&ecirc;m m&oacute;n nem lụi ngay tại qu&aacute;n.</li>\r\n	<li>Qu&aacute;n B&agrave; Hồng &ndash; 84 L&ecirc; Độ, Quận Thanh Kh&ecirc;, Đ&agrave; Nẵng c&oacute; gi&aacute; kh&aacute; rẻ 5 ngh&igrave;n/c&aacute;i nước chấm ngon, đặc biệt qu&aacute;n c&ograve;n b&aacute;n b&uacute;n thịt nướng v&agrave; nem lụi c&aacute;c bạn c&oacute; thể thỏa th&iacute;ch lựa chọn.</li>\r\n	<li>Qu&aacute;n B&aacute;nh X&egrave;o T&ocirc;m Nhảy (Đặc Sản Quy Nhơn) &ndash; 140 Nguyễn Đức Trung, Quận Thanh Kh&ecirc;, Đ&agrave; Nẵng c&oacute; hương vị đặc trưng n&ecirc;n rất đ&ocirc;ng kh&aacute;ch.</li>\r\n</ul>\r\n\r\n<p>+ Ch&egrave; xoa xoa hạt lựu:&nbsp;được nấu từ rau c&acirc;u, hạt lựu được l&agrave;m từ bột lọc, thạch đen v&agrave; nước cốt dừa tạo n&ecirc;n hương vị thơm ngon, m&aacute;t l&agrave;nh của m&ograve;n ch&egrave; xoa xoa hạt lựu. Khi ăn, độ gi&ograve;n gi&ograve;n của thạch, nước dừa v&agrave; đậu xanh đ&aacute;nh b&eacute;o ngậy cộng th&ecirc;m c&aacute;i dai dai của hạt lựu l&agrave;m cho người ăn qu&ecirc;n hết mệt mỏi.<br />\r\nĐể thưởng thức m&oacute;n ch&egrave; n&agrave;y ngon v&agrave; rẻ c&aacute;c bạn n&ecirc;n tới chợ Cồn hoặc tr&ecirc;n đường Trần B&igrave;nh Trọng, Phan Thanh&hellip;c&oacute; gi&aacute; 5000 đồng/cốc.</p>\r\n\r\n<p>+ Ốc h&uacute;t&nbsp;l&agrave; m&oacute;n ăn đặc biệt m&agrave; bất k&igrave; du kh&aacute;ch n&agrave;o tới Đ&agrave; Nẵng cũng muốn thưởng thức. Đ&oacute; l&agrave; m&oacute;n ốc x&agrave;o sả ớt, ốc bươu, ốc đắng&hellip;b&ecirc;n vỉa h&egrave; h&uacute;t ốc bằng tay vừa ăn vừa cảm nhận hương vị cay mặn tuyệt vời.<br />\r\nHay thưởng thức m&oacute;n m&iacute;t trộn được l&agrave;m từ m&iacute;t non trộn gỏi thịt hoặc t&ocirc;m, đậu phụ v&agrave; h&agrave;nh phi, gia vị, rau thơm&hellip;tạo hương vị quyến rũ, bắt mắt. Để thưởng thức m&oacute;n ăn vặt nổi tiếng n&agrave;y v&agrave;o buổi tối tr&ecirc;n đường &ocirc;ng &Iacute;ch Khi&ecirc;m, Phạm Văn Nghị&hellip;c&oacute; gi&aacute; rất b&igrave;nh d&acirc;n chỉ khoảng 25.000 đồng/đĩa ốc, 10.000 đồng/ đĩa m&iacute;t.</p>\r\n\r\n<p>Hoặc thưởng thức c&agrave; ph&ecirc;, tr&agrave; c&aacute;c bạn n&ecirc;n tới Tr&uacute;c L&acirc;m Vi&ecirc;n 5 Trần Qu&yacute; C&aacute;p, qu&aacute;n tr&agrave; cafe nh&agrave; cổ, kh&ocirc;ng gian đẹp, đồ uống gi&aacute; hợp l&yacute;.</p>\r\n\r\n<p>my&nbsp;quang, my quang ba mua, my&nbsp;quang ba mua da nang, mỳ quảng b&agrave; mua, m&oacute;n ngon đ&agrave; nẵng, đặc sản đ&agrave; nẵng.</p>', 3, 1, '/storage/uploads/2022/01/10/du-lich-da-nang-an-gi-ngon-bo-re-2-600x360.jpg', '2022-01-10 13:36:41', '2023-06-30 08:47:57', 157);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `post_categories`
--

CREATE TABLE `post_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(100) NOT NULL,
  `active` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `post_categories`
--

INSERT INTO `post_categories` (`id`, `name`, `active`, `created_at`, `updated_at`) VALUES
(1, 'Đặc sản Món Quảng', 4, NULL, NULL),
(2, 'Món ăn', 1, '2021-12-19 09:47:34', '2021-12-19 09:47:34'),
(3, 'Địa danh', 1, '2022-01-05 06:56:10', '2022-01-05 06:56:10'),
(6, 'Về cửa hàng', 1, '2022-01-10 13:51:56', '2022-01-10 13:51:56');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `post_comments`
--

CREATE TABLE `post_comments` (
  `id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `content` varchar(255) NOT NULL,
  `reply_id` int(11) DEFAULT NULL,
  `number_like` int(11) NOT NULL,
  `active` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `post_comments`
--

INSERT INTO `post_comments` (`id`, `post_id`, `user_id`, `content`, `reply_id`, `number_like`, `active`, `created_at`, `updated_at`) VALUES
(46, 3, 41, 'cap 1a', 0, 0, 0, '2022-07-05 13:28:24', '2022-07-05 13:28:24'),
(47, 3, 41, 'cap 2', 46, 0, 0, '2022-07-05 13:29:28', '2022-07-05 13:29:28'),
(48, 6, 41, 'du-lich-da-nang-dep-thu-vi-va-noi-tieng-check-in-sieu-dep', 0, 0, 0, '2022-07-05 13:51:53', '2022-07-05 13:51:53'),
(49, 6, 41, 'du-lich-da-nang-dep-thu-vi-va-noi-tieng-check-in-sieu-dep', 0, 0, 0, '2022-07-05 13:51:58', '2022-07-05 13:51:58'),
(50, 3, 41, 'dsad', 46, 0, 0, '2022-07-05 15:09:30', '2022-07-05 15:09:30'),
(51, 3, 41, 'dsad', 0, 0, 0, '2022-07-05 15:09:33', '2022-07-05 15:09:33'),
(52, 3, 41, 'new', 51, 0, 0, '2022-07-05 15:09:42', '2022-07-05 15:09:42'),
(53, 3, 41, '22', 46, 0, 0, '2022-07-05 15:45:20', '2022-07-05 15:45:20'),
(54, 3, 41, 'Để thưởng thức Mỳ Quảng cùng với nhữn', 0, 0, 0, '2022-07-05 15:46:25', '2022-07-05 15:46:25'),
(55, 3, 41, 'Để thưởng thức Mỳ Quảng cùng với nhữnĐể thưởng thức Mỳ Quảng cùng với những món ăn đậm đà hương vị xứ Quảng. Các bạn có để đến các địa chỉ sau:\n\n19 Trần Bình Trọng - Đà Nẵng', 0, 0, 0, '2022-07-05 15:46:34', '2022-07-05 15:46:34'),
(56, 3, 41, 'casp 2\ndsa \ndsa', 55, 0, 0, '2022-07-05 16:40:25', '2022-07-05 16:40:25'),
(57, 3, 41, 'dsadsa', 52, 0, 0, '2022-07-05 16:46:21', '2022-07-05 16:46:21'),
(58, 3, 41, 'dsadsa', 51, 0, 0, '2022-07-05 16:46:35', '2022-07-05 16:46:35'),
(59, 3, 41, 'dsadsa', 52, 1, 0, '2022-07-05 16:46:42', '2023-06-29 04:41:35'),
(60, 3, 41, '19 Trần Bình Trọng - Đà Nẵng', 0, 0, 0, '2022-07-05 16:50:07', '2022-07-05 16:50:07'),
(61, 3, 41, '19 Trần Bình Trọng - Đà Nẵng', 0, 0, 0, '2022-07-05 16:50:10', '2022-07-05 16:50:10'),
(62, 3, 41, '19 Trần Bình Trọng - Đà Nẵng', 0, 0, 0, '2022-07-05 16:50:26', '2022-07-05 16:50:26'),
(63, 3, 41, '19 Trần Bình Trọng - Đà Nẵng 2', 62, 0, 0, '2022-07-05 17:01:52', '2022-07-05 17:01:52'),
(64, 3, 41, '19 Trần Bình Trọng - Đà Nẵng 2', 62, 0, 0, '2022-07-05 17:01:53', '2022-07-05 17:01:53'),
(65, 3, 41, '19 Trần Bình Trọng - Đà Nẵng 3', 64, 0, 0, '2022-07-05 17:02:05', '2022-07-05 17:02:05'),
(66, 3, 41, '19 Trần Bình Trọng - Đà Nẵng 4', 65, 0, 0, '2022-07-05 17:02:15', '2022-07-05 17:02:15'),
(67, 6, 41, '2', 49, 0, 0, '2022-07-05 23:46:22', '2022-07-05 23:46:22'),
(68, 6, 41, '2', 67, 0, 0, '2022-07-05 23:46:27', '2022-07-05 23:46:27'),
(69, 3, 1, 'dsadsa', NULL, 0, 1, '2023-06-23 09:44:11', '2023-06-23 09:44:11'),
(70, 3, 1, 'dsadsadsad', NULL, 0, 1, '2023-06-23 09:44:14', '2023-06-23 09:44:14'),
(71, 3, 1, 'kk', NULL, 0, 1, '2023-06-23 09:44:41', '2023-06-23 09:44:41'),
(72, 3, 1, 'đasa', 0, 0, 1, '2023-06-23 09:55:40', '2023-06-23 09:55:40'),
(73, 3, 1, '1', 0, 0, 1, '2023-06-23 09:57:54', '2023-06-26 13:40:34'),
(74, 3, 1, '2', 0, 0, 1, '2023-06-23 10:03:03', '2023-06-26 13:40:40'),
(75, 3, 1, '3', 0, 1, 1, '2023-06-24 12:36:22', '2023-06-26 13:40:42'),
(76, 3, 1, '4', 0, 1, 1, '2023-06-24 12:47:53', '2023-06-26 10:16:47'),
(77, 3, 1, '5', 0, 1, 1, '2023-06-24 15:08:52', '2023-06-26 10:15:51'),
(78, 3, 1, '6', 0, 2, 1, '2023-06-24 15:09:54', '2023-06-26 08:55:15'),
(79, 3, 1, '7', 0, 2, 1, '2023-06-24 15:11:03', '2023-06-29 06:55:09'),
(80, 3, 1, 's', 0, 1, 1, '2023-06-29 07:03:19', '2023-06-29 07:03:34'),
(81, 3, 1, 'dsa', 0, 0, 1, '2023-06-29 13:39:19', '2023-06-29 13:39:19'),
(84, 7, 4, '1', 0, 3, 1, '2023-06-29 14:23:45', '2023-06-30 02:35:35'),
(85, 7, 1, '2', 0, 2, 1, '2023-06-30 01:29:18', '2023-06-30 02:35:29'),
(86, 7, 1, '3', 0, 1, 1, '2023-06-30 02:26:24', '2023-06-30 02:35:38'),
(87, 7, 40, '4', 0, 0, 1, '2023-06-30 02:27:10', '2023-06-30 02:27:10'),
(88, 7, 40, '5', 0, 0, 1, '2023-06-30 02:29:36', '2023-06-30 02:29:36'),
(89, 7, 1, '7', 0, 1, 1, '2023-06-30 08:48:11', '2023-06-30 08:48:27');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `post_comment_replies`
--

CREATE TABLE `post_comment_replies` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `number_like` int(11) NOT NULL,
  `comment_id` int(11) NOT NULL,
  `content` varchar(500) NOT NULL,
  `active` int(11) NOT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `post_comment_replies`
--

INSERT INTO `post_comment_replies` (`id`, `user_id`, `number_like`, `comment_id`, `content`, `active`, `updated_at`, `created_at`) VALUES
(1, 1, 0, 74, 'http://127.0.0.1:8000/blog/3-my-quang-ba-mua-niem-tu-hao-xu-quang#', 1, '2023-06-23 16:08:11', '2023-06-23 16:08:11'),
(2, 1, 0, 73, 'dsa', 1, '2023-06-23 16:08:35', '2023-06-23 16:08:35'),
(3, 1, 0, 74, 'dsa', 1, '2023-06-23 16:10:57', '2023-06-23 16:10:57'),
(4, 1, 0, 72, 'dsadsa', 1, '2023-06-24 12:34:13', '2023-06-24 12:34:13'),
(5, 1, 0, 76, 'elo trung', 1, '2023-06-24 12:56:37', '2023-06-24 12:56:37'),
(6, 1, 0, 76, 'hello trung', 1, '2023-06-24 12:57:51', '2023-06-24 12:57:51'),
(7, 1, 0, 76, 'ddsa', 1, '2023-06-24 13:08:30', '2023-06-24 13:08:30'),
(8, 1, 0, 76, 'dsa', 1, '2023-06-24 13:09:38', '2023-06-24 13:09:38'),
(9, 1, 0, 76, 'sada', 1, '2023-06-24 13:13:32', '2023-06-24 13:13:32'),
(10, 1, 0, 76, '5', 1, '2023-06-24 13:13:58', '2023-06-24 13:13:58'),
(11, 1, 0, 76, '6', 1, '2023-06-24 13:18:02', '2023-06-24 13:18:02'),
(12, 1, 0, 76, '7', 1, '2023-06-24 13:18:47', '2023-06-24 13:18:47'),
(13, 1, 0, 76, '8', 1, '2023-06-24 13:19:37', '2023-06-24 13:19:37'),
(14, 1, 0, 76, '9', 1, '2023-06-24 13:20:50', '2023-06-24 13:20:50'),
(15, 1, 0, 76, '10', 1, '2023-06-24 13:22:12', '2023-06-24 13:22:12'),
(16, 4, 0, 84, 'dsa', 1, '2023-06-29 14:39:48', '2023-06-29 14:39:48'),
(17, 4, 0, 84, '2', 1, '2023-06-29 14:50:37', '2023-06-29 14:50:37'),
(18, 4, 0, 84, '3', 1, '2023-06-29 15:56:20', '2023-06-29 15:56:20'),
(19, 4, 0, 84, '4', 1, '2023-06-29 15:56:32', '2023-06-29 15:56:32'),
(20, 4, 0, 84, '5', 1, '2023-06-29 15:58:53', '2023-06-29 15:58:53'),
(21, 1, 0, 84, '6', 1, '2023-06-30 01:24:34', '2023-06-30 01:24:34'),
(22, 1, 0, 85, '01', 1, '2023-06-30 01:29:36', '2023-06-30 01:29:36'),
(23, 1, 0, 85, 'dsa', 1, '2023-06-30 08:40:45', '2023-06-30 08:40:45');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `productcategories`
--

CREATE TABLE `productcategories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `active` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `productcategories`
--

INSERT INTO `productcategories` (`id`, `name`, `active`, `created_at`, `updated_at`) VALUES
(5, 'Mì Quảng', 1, '2021-12-14 13:11:49', '2021-12-14 13:20:34'),
(7, 'Bánh tráng thịt heo', 1, '2021-12-14 13:12:12', '2021-12-14 13:12:12'),
(8, 'thức uống', 1, '2021-12-14 13:12:28', '2021-12-14 13:12:28'),
(11, 'Món ăn dân dã', 1, '2021-12-28 03:12:25', '2021-12-28 03:12:25'),
(12, 'Bánh Xèo', 1, '2021-12-28 03:12:49', '2021-12-31 08:57:21');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `content` longtext NOT NULL,
  `cat_id` int(11) NOT NULL,
  `price` int(11) DEFAULT NULL,
  `price_sale` int(11) DEFAULT NULL,
  `active` int(11) NOT NULL,
  `thumb` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `total_number` int(255) NOT NULL,
  `total_rating` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `products`
--

INSERT INTO `products` (`id`, `name`, `description`, `content`, `cat_id`, `price`, `price_sale`, `active`, `thumb`, `created_at`, `updated_at`, `total_number`, `total_rating`) VALUES
(1, 'Bánh tráng cuốn thịt heo da', 'Bánh tráng cuốn thịt heo là món ăn nổi tiếng ở Đà Nẵng, mà bất kì du khách nào cũng muốn thưởng thức khi đi du lịch.', 'Bánh tráng cuốn thịt heo là món ăn nổi tiếng ở Đà Nẵng, mà bất kì du khách nào cũng     ', 7, 100000, 80000, 1, '/storage/uploads/2021/12/31/2019-04-26-072519banh-trang-cuon-thit-heo.jpg', NULL, '2022-01-11 03:36:54', 0, 0),
(2, 'Ram cuốn thịt', 'Ram cuốn cải, một cái tên nghe không mấy xa lạ đối với người dân và khách du lịch Đà  ', 'Ram cuốn cải, một cái tên nghe không mấy xa lạ đối với người dân và khách du lịch Đà  ', 12, 30000, 29999, 1, '/storage/uploads/2021/12/28/Ram-cuon-thit-nam.jpg', '2021-12-12 04:52:55', '2021-12-30 00:37:14', 0, 0),
(12, 'Bún mắm thịt luộc', 'Giữa thành phố tấp nập, tồn tại một quán bún mắm bà Mua với tuổi đời rất lâu và nổi tiếng. Quán được nhiều thực khách mệnh danh là “đỉnh cao của bún mắm Đà Thành”.', 'Giữa thành phố tấp nập, tồn tại một quán bún mắm bà Mua với tuổi đời rất lâu và nổi tiếng. Quán được nhiều thực khách mệnh danh là “đỉnh cao của bún mắm Đà Thành”.\r\n\r\nBún mắm nơi đây dùng thịt heo quay làm nguyên liệu chủ yếu. Khác hẳn với bún mắm nêm truyền thống có nguyên liệu là thịt ba chỉ luộc và mít non. Bún mắm ở đây nổi bật bởi hương vị mắm nêm thơm ngon. Hương vị mắm đặc trưng khó có thể nhầm lẫn vào đâu được. Thịt heo quay vàng giòn rụm, rau sống đủ vị và luôn tươi mới. Bên cạnh thịt heo quay ngon giòn thì còn có nem và chả ăn kèm với bún ngon không cưỡng. Quán với hương vị mắm nêm thơm ngon, thịt heo quay ăn giòn ngon. Chế biến hợp vệ sinh, phục vụ rất vui vẻ. Gía cả của quán lại khá bình dân. Vì thế, quán bún mắm bà Mua là một trong những quán ăn bạn nhất định phải ghé thử khi đến Đà Nẵng.', 11, 32000, 30000, 1, '/storage/uploads/2022/01/01/Bun-mam-heo-quay.jpg', '2021-12-27 10:30:34', '2022-01-01 09:39:37', 0, 0),
(13, 'Mỳ quảng Ếch', 'Mỳ quảng Ếch là món ngon được nhiều người ưu thích khi nói đến Mì Quảng.\r\n\r\nĐến với không gian Mỳ Quảng Bà Mua, Các bạn sẽ được thưởng thức những món ngon xứ Quảng.', 'Nấu mỳ Quảng ếch không phải là khó nhưng để ngon và tròn vị nhất bạn phải nắm được công thức bí truyền của món ăn này. Ngay sau đây, chúng tôi xin chia sẻ một chút về cách thực hiện nó. Cách nấu mì Quảng ếch đầy hấp dẫn Nguyên liệu cần chuẩn bị - Thịt ếch: 1kg - Sợi mỳ Quảng: 1kg', 5, 55000, 45000, 1, '/storage/uploads/2021/12/31/my-quang-ech.jpg', '2021-12-27 10:30:54', '2022-06-11 13:31:58', 30, 8),
(14, 'Bánh tráng cuốn thịt heo quay', 'Bánh tráng cuốn thịt heo quay đặc biệt với vị giòn tan của bì thịt quay tươi mới.\r\nNguyên liệu:\r\n\r\n Thịt heo: Thịt đươc chọn miếng thịt có cả nạc, mỡ và bì.\r\n Rau sống: đủ các loại như giá, dưa leo, chuối chát, cải xanh, xà lách, húng, quế, diếp cá, hành lá, rau thơm, thiếu bắp chuối thái mỏng.\r\n Mắm nêm: Đây là nguyên liệu chính, quyết định chất lượng món ăn này.\r\n Bánh dùng để cuốn: bánh tráng & bánh phở\r\n Chanh, thơm/dứa, tỏi, ớt làm tăng thêm vị riêng của mỗi người thưởng thức Bánh tráng cuốn thịt heo', 'Nguyên liệu:\r\n\r\n Thịt heo: Thịt đươc chọn miếng thịt có cả nạc, mỡ và bì.\r\n Rau sống: đủ các loại như giá, dưa leo, chuối chát, cải xanh, xà lách, húng, quế, diếp cá, hành lá, rau thơm, thiếu bắp chuối thái mỏng.\r\n Mắm nêm: Đây là nguyên liệu chính, quyết định chất lượng món ăn này.\r\n Bánh dùng để cuốn: bánh tráng & bánh phở\r\n Chanh, thơm/dứa, tỏi, ớt làm tăng thêm vị riêng của mỗi người thưởng thức Bánh tráng cuốn thịt heo', 7, 120000, 115000, 1, '/storage/uploads/2021/12/28/banh-trang-cuon-thit-heo-quay.jpg', '2021-12-27 10:31:21', '2021-12-28 03:01:15', 0, 0),
(15, 'Mỳ Quảng Thố', 'Mì Quảng là một món ăn đặc trưng của Quảng Nam, Việt Nam, cùng với món cao lầu.', 'Mì Quảng thường được làm từ sợi mì bằng bột gạo xay mịn và tráng thành từng lớp bánh mỏng, sau đó thái theo chiều ngang để có những sợi mì mỏng khoảng 2mm. Sợi mì làm bằng bột mỳ được trộn thêm một số phụ gia cho đạt độ giòn, dai. Dưới lớp mì là các loại rau sống, trên mì là thịt heo nạc, tôm, thịt gà , thịt ếch , thịt cá lóc ( hay còn được gọi là cá tràu , cá quả , cá chuối ,...) cùng với nước dùng được hầm từ xương heo. Người ta còn bỏ thêm đậu phụng rang khô và giã dập, hành lá thái nhỏ, rau thơm, ớt đỏ... Thông thường nước dùng được gọi là nước nhưn , đây cũng là một loại nước lèo nhưng rất cô đặc , ít nước .', 5, 85000, 75000, 1, '/storage/uploads/2021/12/31/My-Quang-Tho---My-Quang-Ba-Mua.jpg', '2021-12-31 08:39:39', '2022-05-29 13:29:25', 9, 2),
(16, 'Mỳ gà rút xương', 'Chân gà rút xương cùng một vài nguyên liệu đơn giản, là bạn có thể chế biến được rất nhiều món ăn thơm ngon khác nhau.', 'Chân gà rút xương làm món gì ngon Bước 2 : Nấu hỗn hợp 200ml nước + 150ml giấm + 2 muỗng đường kính trên bếp cho sôi đều. Sau đó bắt xuống và để nguội.\r\n\r\nChân gà rút xương: 10 chiếc\r\nChanh vàng thái lát: 3 quả\r\nLá chanh thái nhỏ: 5 lá\r\nSả thái lát: 3 nhánh\r\nGừng thái miếng: 1 củ nhỏ\r\nỚt cắt khoanh: 2 quả\r\nGia vị: nước mắm, giấm gạo, đường trắng', 5, 70000, 69000, 1, '/storage/uploads/2021/12/31/my-ga-rut-xuong.jpg', '2021-12-31 08:43:48', '2021-12-31 08:43:48', 0, 0),
(18, 'Mỳ Quảng Bò', 'Bò cuộn nấm kim châm thơm ngon với phần ngọt của nấm thấm đều vào từng thớ thịt, sẽ là món ăn đặc biệt cho gia đình vào ngày cuối tuần.', 'Mỳ Quảng bò thịt bò • trứng gà • cà chua • sợi mỳ • Rau: xà lách, rau thơm, bắp chuối bào, giá • Đậu phộng rang, bánh tráng mè nướng • Hành ngò • Hành tỏi băm 4 phần ăn Hoàng Ngọc Mì quảng thịt bò thịt bò bắp • xương bò • mì • hành lá, đậu phộng, dầu ăn, nước mắm, đường, tiêu', 5, 48000, 45000, 1, '/storage/uploads/2021/12/31/my-bo.jpg', '2021-12-31 08:48:12', '2022-05-30 09:03:01', 4, 1),
(20, 'Bánh tráng cuốn heo Đại Lộc', 'Món thịt heo ở quán đậm hương vị thơm ngon. Bởi thịt heo Đại Lộc có mùi thơm dai và ngọt.', 'Món thịt heo ở quán đậm hương vị thơm ngon. Bởi thịt heo Đại Lộc có mùi thơm dai và ngọt. Những miếng thịt heo ba chỉ được luộc chín vẫn giữ nguyên màu sắc vốn có. Bày biện gọn gàng trong chiếc đĩa nhỏ. Bánh tráng mềm dẻo, đượm hương gạo quê. Và thứ nhận được nhiều lời khen từ thực khách nhất đó chính là rau sống. Rau sống của quán khá ngon với đầy đủ những loại rau tươi xanh. Đĩa rau sống đầy đủ hương vị của húng, cải, quế, diếp cá, hành, chuối chát, dưa leo,…Khi ăn chủ quán cho rất nhiều rau sống, hết có thể xin thêm. Mắm nêm đậm đà, không quá ngọt, quá cay, vẫn còn vương vương mùi cá cơm nguyên chất.', 7, 80000, 75000, 1, '/storage/uploads/2021/12/31/2019-04-25-222510banh-trang-cuon-thit-heo.jpg', '2021-12-31 08:55:31', '2022-04-07 02:17:56', 0, 0),
(21, 'Đào Nhật Trung', '', '', 0, NULL, NULL, 0, '', '2022-06-29 13:51:45', '2022-06-29 13:51:45', 0, 0),
(22, 'Đào Nhật Trung', '', '', 0, NULL, NULL, 0, '', '2022-06-29 13:54:00', '2022-06-29 13:54:00', 0, 0),
(23, 'Đào Nhật Trung', '', '', 0, NULL, NULL, 0, '', '2022-06-29 14:00:11', '2022-06-29 14:00:11', 0, 0),
(24, 'dsa', '', '', 0, NULL, NULL, 0, '', '2022-06-29 14:03:03', '2022-06-29 14:03:03', 0, 0),
(25, 'dsa', '', '', 0, NULL, NULL, 0, '', '2022-06-29 14:09:19', '2022-06-29 14:09:19', 0, 0),
(26, 'dsad', '', '', 0, NULL, NULL, 0, '', '2022-06-29 14:10:33', '2022-06-29 14:10:33', 0, 0),
(27, 'dsa', '452', '4545', 11, 58745, 5876, 1, '/storage/uploads/2022/06/29/chim.jpg', '2022-06-29 14:13:26', '2022-06-29 14:13:26', 0, 0),
(28, 'dsa', '452', '4545', 11, 58745, 5876, 1, '/storage/uploads/2022/06/29/chim.jpg', '2022-06-29 14:14:14', '2022-06-29 14:14:14', 0, 0),
(29, 'Đào Nhật Trung', '20', '5120', 5, 5120, 5876, 0, '/storage/uploads/2022/06/29/chim.jpg', '2022-06-29 14:14:32', '2022-06-29 14:14:32', 0, 0),
(30, 'dsass', '21', 'dsa', 5, 523, 12, 1, '/storage/uploads/2022/06/29/chim.jpg', '2022-06-29 14:19:22', '2022-06-29 14:19:22', 0, 0),
(31, 'dsass', '21', 'dsa', 5, 523, 12, 1, '/storage/uploads/2022/06/29/chim.jpg', '2022-06-29 14:20:04', '2022-06-29 14:20:04', 0, 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product_comments`
--

CREATE TABLE `product_comments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` int(10) UNSIGNED DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `content` varchar(255) NOT NULL,
  `rating` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `active` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `product_comments`
--

INSERT INTO `product_comments` (`id`, `product_id`, `email`, `name`, `content`, `rating`, `created_at`, `updated_at`, `active`) VALUES
(1, 2, 'dntrung.20it6@vku.udn.vn', 'Trung Dao', 'dsadsa', 4, '2021-12-18 11:05:09', '2022-01-10 08:24:11', 1),
(2, 2, 'trungdao10aa1@gmail.com', 'dsadas', '232332020320', 5, '2021-12-19 00:38:56', '2022-01-02 15:25:01', 1),
(12, 15, 'dntrung.20it6@vku.udn.vn', 'trung đào nhật', 'olala', 4, '2022-05-29 13:29:25', '2022-05-29 13:45:10', 1),
(13, 18, 'dntrung.20it6@vku.udn.vn', 'trung đào nhật', 'dsadas', 4, '2022-05-30 09:03:01', '2022-05-30 09:03:16', 1),
(14, 13, 'dntrung.20it6@vku.udn.vn', 'trung đào nhật', 'xàm', 4, '2022-06-11 13:08:04', '2022-06-11 13:08:04', 0),
(15, 13, 'dntrung.20it6@vku.udn.vn', 'trung đào nhật', 'dá', 3, '2022-06-11 13:19:41', '2022-06-11 13:19:41', 0),
(16, 13, 'dntrung.20it6@vku.udn.vn', 'trung đào nhật', 'dsa', 4, '2022-06-11 13:20:28', '2022-06-11 13:20:28', 0),
(17, 13, 'dntrung.20it6@vku.udn.vn', 'trung đào nhật', 'dsa', 4, '2022-06-11 13:22:48', '2022-06-11 13:22:48', 0),
(18, 13, 'dntrung.20it6@vku.udn.vn', 'trung đào nhật', 'dsa', 5, '2022-06-11 13:24:17', '2022-06-11 13:24:17', 0),
(19, 13, 'dntrung.20it6@vku.udn.vn', 'trung đào nhật', 'dsa', 4, '2022-06-11 13:31:58', '2022-06-11 13:31:58', 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `reservations`
--

CREATE TABLE `reservations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `date` varchar(20) NOT NULL,
  `time` varchar(20) NOT NULL,
  `people` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` int(11) NOT NULL,
  `content` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `reservations`
--

INSERT INTO `reservations` (`id`, `date`, `time`, `people`, `name`, `email`, `phone`, `content`, `created_at`, `updated_at`, `status`) VALUES
(6, '12/24/20212021', '19.00', 2, 'Trung Dao', 'dntrung.20it6@vku.udn.vn', 2147483647, 'á', '2021-12-17 14:39:46', '2021-12-18 09:18:30', 1),
(7, '12/24/20212021', '20.00', 4, 'Nguyễn Văn Tèo', 'teoem@gmail.com', 982655144, 'Cho tôi đặt bàn ở nơi có ảnh sáng tốt. Cảm ơn!', '2021-12-24 10:43:44', '2022-01-11 01:32:16', 1),
(8, '01/19/20222022', '10.30', 4, 'Đào Nhật Trung', 'trungdao9a1@gmail.com', 375307021, 'bàn rộng', '2022-01-11 01:28:29', '2022-01-11 01:32:01', 1),
(9, '3', '3', 2147483647, 'h', 'dsa', 6, 'hhh', '2022-05-18 00:43:37', '2022-05-18 00:43:37', 0),
(10, '56623', '5588', 2147483647, 'sd', 'sad', 372, 'dsa', '2022-05-18 01:46:32', '2022-05-18 01:46:32', 0),
(11, '56623', '5588', 2147483647, 'sd', 'sad', 372, 'dsa', '2022-05-18 01:46:38', '2022-05-18 11:15:59', 1),
(12, '3', '5', 2147483647, 't', 't', 22, 't', '2022-05-18 14:02:23', '2022-05-18 14:02:23', 0),
(13, '4', '4', 2147483647, '44', '44@gmail.com', 44, '44', '2022-05-18 14:19:39', '2022-05-18 14:19:39', 0),
(14, '5', '5', 2147483647, '5', '5@gmail.com', 55, '555', '2022-05-18 14:23:35', '2022-05-18 14:23:35', 0),
(15, '44', '44', 2147483647, 'rtungkt', 'dsad@gmail.com', 333, '333', '2022-05-18 14:30:00', '2022-05-18 14:30:15', 1),
(16, '55', '55', 2147483647, '55', '55', 55, '55', '2022-05-20 08:44:51', '2022-05-20 08:44:51', 0),
(17, '55', '55', 2147483647, '55', '55', 55, '55', '2022-05-20 08:44:55', '2022-05-20 08:44:55', 0),
(18, '66', '66', 2147483647, '66', '66@gmail.com', 6666, '66', '2022-05-20 08:49:43', '2022-05-20 08:49:43', 0),
(19, '22', '22', 2147483647, 'trung', 'trung@gmail.com', 22, '22', '2022-05-20 08:53:59', '2022-05-20 08:53:59', 0),
(20, '77', '77', 2147483647, 'rtungdao', 'trung@gmail.com', 12, 'stet', '2022-05-20 09:22:04', '2022-05-25 00:14:42', 1),
(21, '05/26/20222022', '20.00', 3, 'dsa', 'dsa@gmail.com', 0, 'asdas', '2022-05-25 00:17:42', '2022-05-25 00:17:42', 0),
(22, '05/31/20222022', '19.00', 3, 'trung đào nhật', 'dntrung.20it6@vku.udn.vn', 37515032, 'dsa', '2022-05-30 04:09:20', '2022-05-30 04:09:20', 0),
(23, '2', '18:00', 2147483647, 'tr', 'y', 5, 'g', '2022-06-09 01:26:45', '2022-06-09 01:26:45', 0),
(24, '2', '5:00', 2147483647, 'gg', 'gg', 55, 'gg', '2022-06-09 03:45:53', '2022-06-09 03:46:21', 1),
(25, '2', '22:22', 2147483647, 'trung', 'trung@gmail.com', 355556, 'ffhg', '2022-06-09 15:08:42', '2022-06-09 15:08:59', 1),
(26, '3', '10:00', 2147483647, 'T', 'trng@gmali.com', 3212, 'noi dung', '2022-06-09 15:16:21', '2022-06-09 15:16:29', 1),
(27, '5', '10:30', 2147483647, 'Trung', 'trung@gmail.com', 6346455, 'ok', '2022-06-09 15:29:22', '2022-06-09 15:29:32', 1),
(28, '06/17/20222022', '19.00', 3, 'trung đào nhật', 'dntrung.20it6@vku.udn.vn', 37515032, '333', '2022-06-11 13:24:45', '2022-06-15 05:30:30', 1),
(29, '06/23/20222022', '19.00', 3, 'trung đào nhật', 'dntrung.20it6@vku.udn.vn', 37515032, '333', '2022-06-11 13:26:38', '2022-06-11 13:26:38', 0),
(30, '5', '10:00', 2147483647, 'trung', 'truzg@gmail.com', 2147483647, 'gg', '2022-06-14 10:26:09', '2022-06-15 05:30:21', 1),
(31, '5', '10:30', 2147483647, 'Trungdz', '1', 3753070, 'gg', '2022-06-15 05:29:49', '2022-06-15 05:30:01', 1),
(32, '06/28/20232023', '11.30', 4, '120', 'trungdao10a1@gmail.com', 45120, 'h', '2023-06-26 12:46:39', '2023-06-26 12:46:39', 0),
(33, '06/30/20232023', '19.00', 3, 'Bà Mua', 'bamua@gmail.com', 0, 'd', '2023-06-30 02:36:49', '2023-06-30 02:36:49', 0),
(34, '06/30/20232023', '19.00', 3, 'Bà Mua', 'bamua@gmail.com', 0, 'd', '2023-06-30 03:53:11', '2023-06-30 03:53:11', 0),
(35, '06/30/20232023', '19.00', 3, 'Đào Nhật Trung', 'trungdao10a1@gmail.com', 375307021, 'ds', '2023-06-30 08:41:45', '2023-06-30 08:41:45', 0),
(36, '06/30/20232023', '20.00', 4, 'Đào Nhật Trung', 'trungdao10a1@gmail.com', 375307021, 'd', '2023-06-30 08:50:09', '2023-06-30 08:50:39', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `roles`
--

INSERT INTO `roles` (`id`, `name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'Quản trị hệ thống', NULL, '2023-06-30 07:37:04'),
(2, 'guest', 'Khách hàng', NULL, NULL),
(3, 'developer', 'Phát tiển hệ thống', NULL, NULL),
(4, 'content', 'Chỉnh sửa nội dung', NULL, NULL),
(7, 'name', 'd', '2022-07-13 20:16:00', '2022-07-13 20:16:00');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `role_user`
--

CREATE TABLE `role_user` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `role_user`
--

INSERT INTO `role_user` (`id`, `user_id`, `role_id`, `created_at`, `updated_at`) VALUES
(1, 1, 1, '2023-06-30 06:30:34', NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sliders`
--

CREATE TABLE `sliders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `url` varchar(255) DEFAULT NULL,
  `thumb` varchar(255) NOT NULL,
  `sort_by` int(11) NOT NULL,
  `active` int(11) NOT NULL,
  `description` text NOT NULL,
  `button` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `sliders`
--

INSERT INTO `sliders` (`id`, `name`, `url`, `thumb`, `sort_by`, `active`, `description`, `button`, `created_at`, `updated_at`) VALUES
(2, 'Chào mừng bạn<br> đến với mì Quảng - Bà Mua', '/gioi-thieu', '/storage/uploads/2022/01/09/9.jpg', 1, 1, 'Các địa điểm nhà hàng chúng tôi sau để thưởng :<br>\r\n19 Trần Bình Trọng - Đà Nẵng <br>\r\n44 Lê Đình Dương - Đà Nẵng<br>\r\n231 Đống Đa - Đà Nẵng<br>\r\n259 Hồ Nghinh - Đà Nẵng', 'Về cửa hàng', '2021-12-18 09:25:59', '2022-01-09 11:51:38'),
(3, 'Mỳ Quảng - Ẩm thực -<br> Đặc sản món Quảng', '/thuc-don', '/storage/uploads/2022/01/03/photo3-4.jpg', 3, 1, 'Mỳ Quảng không còn thuần túy là món ăn nữa, mà trở thành <br> một trong những biểu tượng văn hóa của một vùng đất,<br>  là cái “hồn” nghệ thuật ẩm thực của vùng đất Quảng Nam…', 'Xem thực đơn', '2021-12-18 09:26:13', '2022-01-03 09:06:47'),
(4, 'dsadsa', 'dsad', '/storage/uploads/2021/12/22/backhome.jpg', 1, 1, 'dsad', 'dsaddsadsa', '2021-12-18 09:26:26', '2022-06-16 08:23:43'),
(5, 'Mỳ Quảng Bà Mua <br> Niềm Tự Hào Xứ Quảng', '/dat-ban', '/storage/uploads/2021/12/22/hom1.jpg', 2, 1, 'Mỳ Quảng Bà Mua đã trở thành điểm ẩm thực thân quen ở Đà Nẵng. <br> trở thành món ngon không thể bỏ lỡ nếu một lần nếm thử nếu bạn đến Đà Nẵng', 'Đặt bàn ngay', '2021-12-22 10:41:59', '2022-01-03 09:07:57');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `transactions`
--

CREATE TABLE `transactions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(200) NOT NULL,
  `phone` int(15) NOT NULL,
  `user_id` int(11) NOT NULL,
  `content` text DEFAULT NULL,
  `total_price` int(11) NOT NULL,
  `total_item` int(11) NOT NULL,
  `payment_type` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` varchar(20) DEFAULT NULL,
  `method` varchar(100) DEFAULT NULL,
  `time` varchar(20) NOT NULL,
  `day` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `transactions`
--

INSERT INTO `transactions` (`id`, `name`, `email`, `phone`, `user_id`, `content`, `total_price`, `total_item`, `payment_type`, `created_at`, `updated_at`, `status`, `method`, `time`, `day`) VALUES
(103, '0', '', 0, 28, NULL, 189999, 3, 'pay_later', '2022-06-07 13:46:39', '2022-06-08 07:28:39', 'CANCELLED', 'Giao hàng tận nơi', '', ''),
(104, '0', '', 0, 28, NULL, 160000, 2, 'pay_later', '2022-06-07 13:49:15', '2022-06-13 13:28:37', 'CANCELLED', 'Giao hàng tận nơi', '', ''),
(105, '0', '', 0, 28, NULL, 80000, 1, 'pay_later', '2022-06-07 13:58:29', '2022-06-13 13:28:32', 'CANCELLED', 'Giao hàng tận nơi', '', ''),
(106, '0', '', 0, 28, NULL, 140000, 3, 'pay_later', '2022-06-07 14:00:34', '2022-06-13 13:28:27', 'CANCELLED', 'Giao hàng tận nơi', '', ''),
(107, '0', '', 0, 43, 'y', 535000, 8, 'pay_later', '2022-06-09 03:45:24', '2022-06-09 09:27:22', 'DEFAULT', 'Giao hàng tận nơi', '', ''),
(108, '0', '', 0, 43, NULL, 240000, 3, 'pay_later', '2022-06-09 07:35:22', '2022-06-09 09:28:56', 'CANCELLED', 'Giao hàng tận nơi', '', ''),
(109, '0', '', 0, 43, 'a', 254996, 7, 'pay_later', '2022-06-09 07:51:29', '2022-06-09 09:28:47', 'CANCELLED', 'Mua hàng mang về', '', ''),
(110, '0', '', 0, 0, NULL, 0, 0, 'pay_later', '2022-06-09 13:14:41', '2022-06-09 13:14:41', 'DEFAULT', NULL, '', ''),
(111, '0', '', 0, 0, NULL, 0, 0, 'pay_later', '2022-06-09 13:16:21', '2022-06-13 13:28:23', 'DONE', NULL, '', ''),
(112, '0', '', 0, 44, 'gg', 596000, 8, 'pay_later', '2022-06-09 14:38:34', '2022-06-09 14:39:04', 'CANCELLED', 'Giao hàng tận nơi', '', ''),
(113, '0', '', 0, 47, 'ff', 357000, 5, 'pay_later', '2022-06-09 14:55:42', '2022-06-09 14:56:00', 'CANCELLED', 'Mua hàng mang về', '', ''),
(114, '0', '', 0, 48, 'gg', 375000, 5, 'pay_later', '2022-06-09 15:02:38', '2022-06-09 15:02:38', 'DEFAULT', 'Giao hàng tận nơi', '', ''),
(115, '0', '', 0, 49, 'gg', 225000, 3, 'pay_later', '2022-06-09 15:07:33', '2022-06-09 15:07:55', 'CANCELLED', 'Giao hàng tận nơi', '', ''),
(116, '0', '', 0, 49, NULL, 125000, 2, 'pay_later', '2022-06-09 15:09:19', '2022-06-09 15:09:33', 'DONE', 'Giao hàng tận nơi', '', ''),
(117, '0', '', 0, 50, 'nhanh', 450000, 6, 'pay_later', '2022-06-09 15:15:04', '2022-06-09 15:15:26', 'CANCELLED', 'Giao hàng tận nơi', '', ''),
(118, '0', '', 0, 52, 'nhanh', 267000, 5, 'pay_later', '2022-06-09 15:28:14', '2022-06-09 15:28:32', 'CANCELLED', 'Giao hàng tận nơi', '', ''),
(119, '0', '', 0, 52, 'gg', 448000, 6, 'pay_later', '2022-06-09 15:30:06', '2022-06-09 15:30:15', 'DONE', 'Mua hàng mang về', '', ''),
(120, '0', '', 0, 52, NULL, 160000, 2, 'pay_later', '2022-06-10 03:48:56', '2022-06-10 03:53:11', 'CANCELLED', 'Giao hàng tận nơi', '', ''),
(122, '0', '', 0, 52, 'giao trc 12h nha', 330000, 5, 'pay_later', '2022-06-10 15:00:01', '2022-06-13 12:15:15', 'DONE', 'Giao hàng tận nơi', '', ''),
(123, '0', '', 0, 52, 'rr', 330000, 6, 'pay_later', '2022-06-13 07:48:42', '2022-06-13 07:48:42', 'DONE', 'Mua hàng mang về', '', ''),
(124, '0', '', 0, 53, 'gg', 240000, 4, 'pay_later', '2022-06-14 10:25:09', '2022-06-14 10:25:31', 'CANCELLED', 'Giao hàng tận nơi', '', ''),
(125, '0', '', 0, 28, 'ghn', 154999, 3, 'pay_later', '2022-06-15 00:55:15', '2022-06-15 00:55:15', 'DEFAULT', 'Giao hàng tận nơi', '', ''),
(126, '0', '', 0, 28, 'rr', 638997, 12, 'pay_later', '2022-06-15 05:23:40', '2022-06-15 05:24:15', 'DONE', 'Mua hàng mang về', '', ''),
(127, '0', '', 0, 0, '485120', 0, 0, 'online_payment', '2022-06-21 15:05:19', '2022-06-21 15:05:19', NULL, NULL, '11:00', ''),
(128, '0', '', 0, 0, '485120', 0, 0, 'pay_later', '2022-06-21 15:05:27', '2022-06-21 15:05:27', NULL, NULL, '11:00', ''),
(129, '0', '', 0, 0, '485120', 0, 0, 'pay_later', '2022-06-21 15:05:39', '2022-06-21 15:05:39', NULL, NULL, '11:00', ''),
(130, '0', '', 0, 0, 'dsa', 0, 0, 'pay_later', '2022-06-21 15:05:54', '2022-06-21 15:05:54', NULL, NULL, '11:00', ''),
(131, '0', '', 0, 0, NULL, 0, 0, 'online_payment', '2022-06-22 03:44:59', '2022-06-22 03:44:59', NULL, NULL, '11:00', ''),
(132, '0', '', 0, 0, NULL, 0, 0, 'online_payment', '2022-06-22 03:45:17', '2022-06-22 03:45:17', NULL, NULL, '11:00', ''),
(133, '0', '', 0, 0, NULL, 0, 0, 'online_payment', '2022-06-22 03:49:09', '2022-06-22 03:49:09', NULL, NULL, '11:00', ''),
(134, '0', '', 0, 0, NULL, 0, 0, 'online_payment', '2022-06-22 03:51:12', '2022-06-22 03:51:12', NULL, NULL, '11:00', ''),
(135, '0', '', 0, 0, 'dsa', 0, 0, 'pay_later', '2022-06-22 03:53:19', '2022-06-22 03:53:19', NULL, NULL, '11:00', ''),
(136, '0', '', 0, 0, 'dsa', 0, 0, 'pay_later', '2022-06-22 05:26:51', '2022-06-22 05:26:51', NULL, NULL, '11:00', ''),
(137, '0', '', 0, 2, 'dsa', 199521, 4, 'pay_later', '2022-06-22 08:20:13', '2022-06-22 08:20:13', 'DEFAULT', NULL, '11:00', 'hôm nay'),
(138, '0', '', 0, 2, 'dsa', 199521, 4, 'pay_later', '2022-06-22 08:21:59', '2022-06-22 08:21:59', 'DEFAULT', NULL, '11:00', 'hôm nay'),
(139, '0', '', 0, 2, 'dsa', 199521, 4, 'pay_later', '2022-06-22 08:22:39', '2022-06-22 08:22:39', 'DEFAULT', NULL, '11:00', 'hôm nay'),
(140, '0', '', 0, 2, 'dsa', 199521, 4, 'pay_later', '2022-06-22 08:22:51', '2022-06-22 08:22:51', 'DEFAULT', NULL, '11:00', 'hôm nay'),
(141, '0', '', 0, 2, 'dsa', 329521, 6, 'pay_later', '2022-06-22 10:29:20', '2022-06-22 10:29:20', 'DEFAULT', NULL, '12:00', 'ngày mai'),
(142, '0', '', 0, 2, 'dsa', 108521, 2, 'pay_later', '2022-06-22 10:35:25', '2022-06-22 10:35:25', 'DEFAULT', NULL, '12:00', 'hôm nay'),
(143, '0', '', 0, 54, NULL, 50555, 1, 'pay_later', '2022-06-22 13:41:35', '2022-06-22 13:41:35', 'DEFAULT', NULL, '11:30', 'ngày mai'),
(144, '0', '', 0, 1, '524', 215000, 4, 'counter_payment', '2022-06-24 15:06:28', '2022-06-24 15:06:28', 'DEFAULT', NULL, '11:00', 'hôm nay'),
(145, '0', '', 0, 1, '524', 215000, 4, 'counter_payment', '2022-06-24 15:06:46', '2022-06-24 15:06:46', 'DEFAULT', NULL, '11:00', 'hôm nay'),
(146, '0', '', 0, 2, NULL, 240000, 3, 'online_payment', '2022-06-25 08:16:35', '2022-06-25 08:16:35', 'DEFAULT', NULL, '11:30', 'ngày mai'),
(147, '0', '', 0, 2, '52', 15000, 0, 'online_payment', '2022-06-25 08:17:57', '2022-06-25 08:17:57', 'DEFAULT', NULL, '10:30', 'hôm nay'),
(148, '0', '', 0, 2, '952', 308000, 4, 'online_payment', '2022-06-25 08:18:48', '2022-06-25 08:18:48', 'DEFAULT', NULL, '11:30', 'ngày mai'),
(149, '0', '', 0, 2, '952', 308000, 4, 'online_payment', '2022-06-25 08:20:04', '2022-06-25 08:20:04', 'DEFAULT', NULL, '11:30', 'ngày mai'),
(150, '0', '', 0, 2, 'dsa', 308000, 4, 'online_payment', '2022-06-25 08:20:53', '2022-06-25 08:20:53', 'DEFAULT', NULL, '11:00', 'hôm nay'),
(151, 'trung', 'trungdao9a1@gmail.com', 0, 2, '952', 308000, 4, 'online_payment', '2022-06-25 08:27:11', '2022-06-25 10:27:36', 'DONE', NULL, '11:30', 'ngày mai'),
(152, '', '', 0, 1, 'ds', 150000, 2, 'later_payment', '2023-06-30 04:03:46', '2023-06-30 04:03:46', 'DEFAULT', NULL, '12:00', 'ngày mai'),
(153, '', '', 0, 1, 'ds', 150000, 2, 'later_payment', '2023-06-30 04:10:09', '2023-06-30 04:33:11', 'DONE', NULL, '12:00', 'ngày mai'),
(154, '', '', 0, 1, 'ds', 150000, 2, 'later_payment', '2023-06-30 04:10:53', '2023-06-30 04:10:53', 'DEFAULT', NULL, '12:00', 'ngày mai'),
(155, '', '', 0, 1, 'ds', 150000, 2, 'later_payment', '2023-06-30 04:11:49', '2023-06-30 08:51:01', 'DONE', NULL, '12:00', 'ngày mai'),
(156, '', '', 0, 1, 'ds', 150000, 2, 'later_payment', '2023-06-30 04:13:26', '2023-06-30 04:13:26', 'DEFAULT', NULL, '12:00', 'ngày mai'),
(157, '', '', 0, 1, 'ds', 150000, 2, 'later_payment', '2023-06-30 04:14:37', '2023-06-30 04:14:37', 'DEFAULT', NULL, '12:00', 'ngày mai'),
(158, '', '', 0, 1, 'ds', 150000, 2, 'later_payment', '2023-06-30 04:14:52', '2023-06-30 04:14:52', 'DEFAULT', NULL, '12:00', 'ngày mai'),
(159, '', '', 0, 1, 'ds', 150000, 2, 'later_payment', '2023-06-30 04:14:57', '2023-06-30 04:14:57', 'DEFAULT', NULL, '12:00', 'ngày mai'),
(160, '', '', 0, 1, 'tt', 225200, 4, 'later_payment', '2023-06-30 08:39:14', '2023-06-30 08:39:14', 'DEFAULT', NULL, '11:30', 'ngày mai'),
(161, '', '', 0, 1, 'dd', 610500, 9, 'later_payment', '2023-06-30 08:49:44', '2023-06-30 08:49:44', 'DEFAULT', NULL, '18:30', 'hôm nay');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `avatar` text DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` int(50) NOT NULL,
  `google_id` varchar(255) DEFAULT NULL,
  `facebook_id` varchar(255) DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `active` int(11) DEFAULT NULL,
  `level` int(11) DEFAULT NULL,
  `district` varchar(50) DEFAULT NULL,
  `ward` varchar(25) DEFAULT NULL,
  `street` varchar(50) DEFAULT NULL,
  `fee` int(11) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `avatar`, `name`, `email`, `phone`, `google_id`, `facebook_id`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `active`, `level`, `district`, `ward`, `street`, `fee`, `deleted_at`) VALUES
(1, 'https://static.vecteezy.com/system/resources/previews/002/002/297/large_2x/beautiful-woman-avatar-character-icon-free-vector.jpg', 'Admin', 'admin@gmail.com', 0, '', '', NULL, '$2y$10$Eo0BBzQjY.5l3uNnH318r.My1O1JJ5VS19Qu6Qzcv7KbDp75Yyplq', '8NieXjYvATFrIGMGXc989WCM7xaQEJvABOKIikxPt72TwQYoxTrRkEBqAMMB', '2021-12-31 04:42:53', '2023-06-30 08:39:37', 1, 1, 'Quận Hải Châu', 'Phường Nam Dương', '21', 15000, NULL),
(2, 'https://lh3.googleusercontent.com/a-/AOh14GjWznZwPJ21Ps0QnfiGhrSwhB6GeKOdjdKMgl17=s96-c', 'Đào Nhật Trung', 'dntrung.20it6@vku.udn.vn', 375307021, '101581940241819211089', '', NULL, '', NULL, '2021-12-12 04:55:05', '2022-06-25 04:20:25', 1, 1, 'Quận Liên Chiểu', 'Phường Hòa Khánh Bắc', '454 hoa s', 15000, NULL),
(4, NULL, 'Trung Dao', 'dntrung.20it7@vku.udn.vn', 2147483647, NULL, '', NULL, '$2y$10$Uxg1DyhsIDEqBzDTMy73X.f1bMA8c5pkRRfVL6axMorcsd4B/1VCO', NULL, '2021-12-13 10:22:30', '2021-12-13 10:22:30', 1, 1, '', '', 'dsa', 0, NULL),
(6, NULL, 'testlevel', 'testlevel@vku.udn.vn', 2147483647, NULL, '', NULL, '$2y$10$V/cHSTmYck9dblU1OKK.EO6AyVUShrnnr3AG1RuH22hVyLBMYnSTu', NULL, '2021-12-14 07:39:00', '2021-12-14 07:39:00', 1, 0, '', '', 'dsa2', 0, NULL),
(10, 'https://lh3.googleusercontent.com/a-/AOh14GhWFHcAw5-S1dhz8TEaVb2I2yS1gLTBvBDBixeI=s96-c', 'F e e L', 'trungdao10a2@gmail.com', 0, '113691282438939207802', NULL, NULL, '', NULL, '2021-12-26 07:24:25', '2021-12-26 07:24:25', 0, 0, '', '', '', 0, NULL),
(11, NULL, 'Lee Sin', 'sin@gmail.com', 325964666, NULL, NULL, NULL, '$2y$10$M/JueBcfwJ7JQhIv3W77d.h0XdsMAcndMoCR4YDfA3DFi09jIbiXi', NULL, '2021-12-26 09:05:18', '2021-12-26 09:05:18', 1, 0, '', '', '', 0, NULL),
(12, NULL, 'Hello', 'a@gmail.com', 31202, NULL, NULL, NULL, '$2y$10$14Auc7jy2vSG/NPK0YqB7esj8bzW1ystUwiSOmlVU.IKgOURLuR.G', NULL, '2021-12-26 10:57:45', '2021-12-26 10:57:45', 1, 1, '', '', '', 0, NULL),
(13, NULL, 'zuka', '3@gmail.com', 2147483647, NULL, NULL, NULL, '$2y$10$ArE0ZbaZ25OVliHtyVWAzOYzAO5Co3neL0STGW.1EldNDDtFVveDW', NULL, '2021-12-26 11:35:14', '2021-12-26 11:35:14', 1, 0, '', '', '', 0, NULL),
(14, NULL, 'sda', 'dsass@vku.udn.vn', 2147483647, NULL, NULL, NULL, '$2y$10$M1CQ8IansPJCBgARncda7uZ1wPPSIFKQ8d7al3OW2HX27Ozx72Oi2', NULL, '2021-12-26 12:08:23', '2023-06-30 07:19:58', 1, 0, '', '', '', 0, '2023-06-30 07:19:58'),
(16, NULL, 'dsadas', 'trungdao10aa1@gmail.com', 1220, NULL, NULL, NULL, '$2y$10$eX8YUc2we6UXhNsGH/U24uJjF21tnEcGanGDWuPKIevXI8Z23L/1u', NULL, '2021-12-26 13:23:03', '2021-12-26 13:23:03', 1, 0, '', '', '', 0, NULL),
(17, NULL, 'Trung Dao', 'dntdsarung.20it6@vku.udn.vn', 204, NULL, NULL, NULL, '$2y$10$eIm0SpzGDu7rpMDciiOoxO8P9rg5Dmz6KuxDMdC2ybEJHIZmA1xnm', NULL, '2021-12-26 13:26:09', '2021-12-26 13:26:09', 1, 0, '', '', '', 0, NULL),
(19, NULL, 'dsadsa', 'dsdsadasdsa@vku.udn.vn', 2147483647, NULL, NULL, NULL, '$2y$10$GA0WHqgDqyGQMS6VDyVjKewkcDmVsftYNhJKz/L18snJvESBp64YC', NULL, '2022-01-03 12:22:48', '2022-01-03 12:22:48', 1, 0, '', '', '', 0, NULL),
(21, NULL, 'dsadsa', '5asdsa@vku.udn.vn', 2147483647, NULL, NULL, NULL, '$2y$10$T6LfMghhHWaE7YVN2Mr8vOofFd9oRFGTDCluiU7S2Po4BGd63iT0q', NULL, '2022-01-03 14:41:44', '2022-01-03 14:41:44', 1, 0, '', '', '', 0, NULL),
(28, NULL, 'Trungdz', '1', 3753070, NULL, NULL, NULL, '$2y$10$TZDgLuqpXOx1YpyMxSg.CObpyXn1q/xskYo.C65EtSMJrm3ESbFEy', NULL, '2022-05-03 15:00:36', '2022-05-03 15:00:36', NULL, NULL, '', '', NULL, 0, NULL),
(30, NULL, 'rtung', 'trung1@gmail.ocm', 0, NULL, NULL, NULL, '$2y$10$Yg42GvYogE512cKBWqYfFOkkcNUA4WkZ2r4qU/hF9wZ7w6jFQ88VG', NULL, '2022-05-18 13:59:49', '2022-05-18 13:59:49', NULL, NULL, '', '', NULL, 0, NULL),
(31, NULL, 'rtungdao', 'trungl@gaiml.com', 0, NULL, NULL, NULL, '$2y$10$NgZKIxXXEaZ1MI5bzxfoveUgro67ABMZc7vM4lQRXZGGjjOuHZJk2', NULL, '2022-05-18 14:16:06', '2022-05-18 14:16:06', NULL, NULL, '', '', NULL, 0, NULL),
(32, NULL, 'trun', 'tr@gmail.com', 0, NULL, NULL, NULL, '$2y$10$W3sjko9Go/2YVCdavqo.5uzty5w704HR5qDyuMREuER1cLCWCKc4q', NULL, '2022-05-18 14:18:26', '2022-05-18 14:18:26', NULL, NULL, '', '', NULL, 0, NULL),
(33, NULL, 'm@gmail.com', '12', 0, NULL, NULL, NULL, '$2y$10$zATVcwQ0LruFW7UjWhofO.uSjf5.hQH6w8qrpFZ28bbUPg8oxBhKu', NULL, '2022-05-18 14:21:56', '2022-05-18 14:21:56', NULL, NULL, '', '', NULL, 0, NULL),
(34, NULL, 'k', 'k@gmail.com', 0, NULL, NULL, NULL, '$2y$10$Bb09eRybdX7T.ql8wY1dGuXqK8BeL3pSNHChIyhpKYEoSn.koubvi', NULL, '2022-05-18 14:28:27', '2022-05-18 14:28:27', NULL, NULL, '', '', NULL, 0, NULL),
(35, NULL, 'dsa', 'dsada', 0, NULL, NULL, NULL, '$2y$10$M5vn6Jk5H8SSz0fm1eLRH.YHdzt5Pa7h5iJ6kUtGYmF70iBWoYLjq', NULL, '2022-05-20 08:43:15', '2022-05-20 08:43:15', NULL, NULL, '', '', NULL, 0, NULL),
(37, NULL, 'trung', 'tsrung@gmail.com', 0, NULL, NULL, NULL, '$2y$10$mO3cWSorDnxkrU9psp.C5OxQmHJSbTnd8NiJIjfNlaEQIiDVYNAti', NULL, '2022-05-20 08:52:04', '2022-05-20 08:52:04', NULL, NULL, '', '', NULL, 0, NULL),
(38, NULL, 'trung', 'rtunglol@gmail.com', 0, NULL, NULL, NULL, '$2y$10$u9jMUvvCxO2JE0gh5T6hJeDphoQtH4/H.FFkA/9JEWgnk6t.Ggvcu', NULL, '2022-05-20 09:17:42', '2022-05-26 14:13:26', 1, NULL, '', '', NULL, 0, NULL),
(39, NULL, 'trung', 'trun@gmail.com', 0, NULL, NULL, NULL, '$2y$10$Lr3NZ17LRuq0s4euIbG7r.ehMmjP050pu/d5F92g2ukL87I6AYA1i', NULL, '2022-05-20 09:19:54', '2022-05-26 14:13:20', 1, NULL, '', '', NULL, 0, NULL),
(40, NULL, 'Đào Nhật Trung', 'truz@gmail.com', 375307021, NULL, NULL, NULL, '$2y$10$JgyAuZMYpPBaHVQ6yI8T0OJuwe3gPAV/AT1T4zYHxKSvz2lotsvbW', NULL, '2022-05-25 00:58:27', '2022-05-25 00:58:27', 1, 0, '', '', NULL, 0, NULL),
(41, NULL, 'dsad', 'dsa@gmail.com', 963, NULL, NULL, NULL, '$2y$10$M6a16vACfbEGw6Hs.p7bCOUa8KwA6CCs6KUY0feLnYyVy/PZHrKNe', 'wuWZAI00KXXRzfoidkAWZmIxKnTuZRjLqVdGClzQIjlzHLJmteD8KleOqCvj', '2022-05-25 01:08:37', '2022-05-25 01:08:37', 1, 0, '', '', NULL, 0, NULL),
(42, NULL, 'dsa', 'dsa@gmail.c', 254, NULL, NULL, NULL, '$2y$10$VRYuviCi2iQc87D0F5mF6OA4AEjyr6J.hVgE5BB2XsYAj5HQ9HulK', NULL, '2022-05-25 01:09:49', '2022-05-30 02:45:24', 0, 1, '', '', NULL, 0, NULL),
(43, NULL, 'Toi', '32@gmail.com', 123, NULL, NULL, NULL, '$2y$10$YcGSyPAeZrheiQBh76KI.utAc9gMLaOJzQW5w2JSwa2iB1.6/f6e.', NULL, '2022-06-09 03:44:06', '2022-06-09 03:44:06', NULL, NULL, '', '', NULL, 0, NULL),
(44, NULL, 'trung', 'trung@gmail.com', 375307022, NULL, NULL, NULL, '$2y$10$dBgQJCeUjScC6HNhploUQeQlg7CnrmT.CBYdhZ5NS4PjncDycD9FS', NULL, '2022-06-09 14:37:28', '2022-06-09 14:37:28', NULL, NULL, '', '', NULL, 0, NULL),
(45, NULL, 'trung', 'trunggg@gmail,com', 2147483647, NULL, NULL, NULL, '$2y$10$GlN/m1agL5RrzIhh4qe.nempevQzc/oKI1YbzWMwCRcGx2kXWEFbq', NULL, '2022-06-09 14:45:46', '2022-06-09 14:45:46', NULL, NULL, '', '', NULL, 0, NULL),
(46, NULL, 'Trung', 'trung04@gmail.com', 123456789, NULL, NULL, NULL, '$2y$10$aWh5VTP11u5psQHbJ.oqP..oikSVE1RC8P0drLzXeResuCFN2IclS', NULL, '2022-06-09 14:49:42', '2022-06-09 14:49:42', NULL, NULL, '', '', NULL, 0, NULL),
(52, NULL, 'Trungdz', 'trungdz@gmail.com', 2147483647, NULL, NULL, NULL, '$2y$10$2K9LEPNmgGoE687UXfB3XunVB4pCFP98Whh7lko9q2f1/SuRxKDP.', NULL, '2022-06-09 15:27:16', '2022-07-12 21:11:22', 0, NULL, '', '', NULL, 0, NULL),
(53, NULL, 'trung', 'truzg@gmail.com', 2147483647, NULL, NULL, NULL, '$2y$10$vtQ/g.eWxzek44gfhffhx.szYul9b.cTzLbNAkbBxRmyS6MWVL9iK', NULL, '2022-06-14 10:23:58', '2022-06-14 10:23:58', NULL, NULL, '', '', NULL, 0, NULL),
(72, NULL, 'cho  meo', 'acquy@gmaio.com', 65032020, NULL, NULL, NULL, '$2y$10$1uKko/f4iaxIIUwIZRIYyO9FJKqgRnLOtIHWSueqGtkZvD/wDk4bq', 'AXLGVB9V8BEV0QW', '2022-07-10 00:29:41', '2022-07-10 00:29:41', 0, 0, NULL, NULL, NULL, NULL, NULL),
(100, NULL, '120', 'trungdao10a1@gmail.com', 45120, NULL, NULL, NULL, '$2y$10$7/u1eTj7O18xqeQPPFdJH.hpEyWW6knu0KdXzkMvyMg9Vi6qHg/UG', 'YEJIXDECUJCPM7E', '2022-07-11 22:10:25', '2022-07-22 02:10:12', 0, 0, NULL, NULL, NULL, NULL, NULL),
(101, 'https://lh3.googleusercontent.com/a/AAcHTtdamTCXKjv4SlTWPq9G-TTyFPacCJua6qvD4Pb2=s96-c', 'bảo Trần', 'phongzboy.26@gmail.com', 0, '104350290708949382278', '104350290708949382278', NULL, '', NULL, '2023-06-26 12:49:17', '2023-06-26 12:49:17', NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `ward_dn`
--

CREATE TABLE `ward_dn` (
  `ward_id` int(5) NOT NULL,
  `name` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `type` varchar(30) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `district_name` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Đang đổ dữ liệu cho bảng `ward_dn`
--

INSERT INTO `ward_dn` (`ward_id`, `name`, `type`, `district_name`) VALUES
(1, 'Phường Hòa Hiệp Bắc', 'Phường', 'Quận Liên Chiểu'),
(2, 'Phường Hòa Hiệp Nam', 'Phường', 'Quận Liên Chiểu'),
(3, 'Phường Hòa Khánh Bắc', 'Phường', 'Quận Liên Chiểu'),
(4, 'Phường Hòa Khánh Nam', 'Phường', 'Quận Liên Chiểu'),
(5, 'Phường Hòa Minh', 'Phường', 'Quận Liên Chiểu'),
(6, 'Phường Tam Thuận', 'Phường', 'Quận Thanh Khê'),
(7, 'Phường Thanh Khê Tây', 'Phường', 'Quận Thanh Khê'),
(8, 'Phường Thanh Khê Đông', 'Phường', 'Quận Thanh Khê'),
(9, 'Phường Xuân Hà', 'Phường', 'Quận Thanh Khê'),
(10, 'Phường Tân Chính', 'Phường', 'Quận Thanh Khê'),
(11, 'Phường Chính Gián', 'Phường', 'Quận Thanh Khê'),
(12, 'Phường Vĩnh Trung', 'Phường', 'Quận Thanh Khê'),
(13, 'Phường Thạc Gián', 'Phường', 'Quận Thanh Khê'),
(14, 'Phường An Khê', 'Phường', 'Quận Thanh Khê'),
(15, 'Phường Hòa Khê', 'Phường', 'Quận Thanh Khê'),
(16, 'Phường Thanh Bình', 'Phường', 'Quận Hải Châu'),
(17, 'Phường Thuận Phước', 'Phường', 'Quận Hải Châu'),
(18, 'Phường Thạch Thang', 'Phường', 'Quận Hải Châu'),
(19, 'Phường Hải Châu  I', 'Phường', 'Quận Hải Châu'),
(20, 'Phường Hải Châu II', 'Phường', 'Quận Hải Châu'),
(21, 'Phường Phước Ninh', 'Phường', 'Quận Hải Châu'),
(22, 'Phường Hòa Thuận Tây', 'Phường', 'Quận Hải Châu'),
(23, 'Phường Hòa Thuận Đông', 'Phường', 'Quận Hải Châu'),
(24, 'Phường Nam Dương', 'Phường', 'Quận Hải Châu'),
(25, 'Phường Bình Hiên', 'Phường', 'Quận Hải Châu'),
(20254, 'Phường Bình Thuận', 'Phường', 'Quận Hải Châu'),
(20257, 'Phường Hòa Cường Bắc', 'Phường', 'Quận Hải Châu'),
(20258, 'Phường Hòa Cường Nam', 'Phường', 'Quận Hải Châu'),
(20260, 'Phường Khuê Trung', 'Phường', 'Quận Cẩm Lệ'),
(20263, 'Phường Thọ Quang', 'Phường', 'Quận Sơn Trà'),
(20266, 'Phường Nại Hiên Đông', 'Phường', 'Quận Sơn Trà'),
(20269, 'Phường Mân Thái', 'Phường', 'Quận Sơn Trà'),
(20272, 'Phường An Hải Bắc', 'Phường', 'Quận Sơn Trà'),
(20275, 'Phường Phước Mỹ', 'Phường', 'Quận Sơn Trà'),
(20278, 'Phường An Hải Tây', 'Phường', 'Quận Sơn Trà'),
(20281, 'Phường An Hải Đông', 'Phường', 'Quận Sơn Trà'),
(20284, 'Phường Mỹ An', 'Phường', 'Quận Ngũ Hành Sơn'),
(20285, 'Phường Khuê Mỹ', 'Phường', 'Quận Ngũ Hành Sơn'),
(20287, 'Phường Hoà Quý', 'Phường', 'Quận Ngũ Hành Sơn'),
(20290, 'Phường Hoà Hải', 'Phường', 'Quận Ngũ Hành Sơn'),
(20293, 'Xã Hòa Bắc', 'Xã', 'Huyện Hòa Vang'),
(20296, 'Xã Hòa Liên', 'Xã', 'Huyện Hòa Vang'),
(20299, 'Xã Hòa Ninh', 'Xã', 'Huyện Hòa Vang'),
(20302, 'Xã Hòa Sơn', 'Xã', 'Huyện Hòa Vang'),
(20305, 'Phường Hòa Phát', 'Phường', 'Quận Cẩm Lệ'),
(20306, 'Phường Hòa An', 'Phường', 'Quận Cẩm Lệ'),
(20308, 'Xã Hòa Nhơn', 'Xã', 'Quận Cẩm Lệ'),
(20311, 'Phường Hòa Thọ Tây', 'Phường', 'Quận Cẩm Lệ'),
(20312, 'Phường Hòa Thọ Đông', 'Phường', 'Quận Cẩm Lệ'),
(20314, 'Phường Hòa Xuân', 'Phường', 'Quận Cẩm Lệ'),
(20317, 'Xã Hòa Phú', 'Xã', '7'),
(20320, 'Xã Hòa Phong', 'Xã', '7'),
(20323, 'Xã Hòa Châu', 'Xã', '7'),
(20326, 'Xã Hòa Tiến', 'Xã', '7'),
(20329, 'Xã Hòa Phước', 'Xã', '7'),
(20332, 'Xã Hòa Khương', 'Xã', '7');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `aboutus`
--
ALTER TABLE `aboutus`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `carts_customer_id_foreign` (`transaction_id`);

--
-- Chỉ mục cho bảng `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `coupons`
--
ALTER TABLE `coupons`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `district_dn`
--
ALTER TABLE `district_dn`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Chỉ mục cho bảng `freship`
--
ALTER TABLE `freship`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `galleries`
--
ALTER TABLE `galleries`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Chỉ mục cho bảng `liked_comments`
--
ALTER TABLE `liked_comments`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `menus`
--
ALTER TABLE `menus`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Chỉ mục cho bảng `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `permission_categories`
--
ALTER TABLE `permission_categories`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `permission_role`
--
ALTER TABLE `permission_role`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Chỉ mục cho bảng `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `post_categories`
--
ALTER TABLE `post_categories`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `post_comments`
--
ALTER TABLE `post_comments`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `post_comment_replies`
--
ALTER TABLE `post_comment_replies`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `productcategories`
--
ALTER TABLE `productcategories`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `product_comments`
--
ALTER TABLE `product_comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_id` (`product_id`);

--
-- Chỉ mục cho bảng `reservations`
--
ALTER TABLE `reservations`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `role_user`
--
ALTER TABLE `role_user`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `sliders`
--
ALTER TABLE `sliders`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Chỉ mục cho bảng `ward_dn`
--
ALTER TABLE `ward_dn`
  ADD PRIMARY KEY (`ward_id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `aboutus`
--
ALTER TABLE `aboutus`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `carts`
--
ALTER TABLE `carts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=162;

--
-- AUTO_INCREMENT cho bảng `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `coupons`
--
ALTER TABLE `coupons`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `freship`
--
ALTER TABLE `freship`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT cho bảng `galleries`
--
ALTER TABLE `galleries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT cho bảng `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `liked_comments`
--
ALTER TABLE `liked_comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;

--
-- AUTO_INCREMENT cho bảng `menus`
--
ALTER TABLE `menus`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT cho bảng `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT cho bảng `permission_categories`
--
ALTER TABLE `permission_categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `permission_role`
--
ALTER TABLE `permission_role`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT cho bảng `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `posts`
--
ALTER TABLE `posts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT cho bảng `post_categories`
--
ALTER TABLE `post_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `post_comments`
--
ALTER TABLE `post_comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=90;

--
-- AUTO_INCREMENT cho bảng `post_comment_replies`
--
ALTER TABLE `post_comment_replies`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT cho bảng `productcategories`
--
ALTER TABLE `productcategories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT cho bảng `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT cho bảng `product_comments`
--
ALTER TABLE `product_comments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT cho bảng `reservations`
--
ALTER TABLE `reservations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT cho bảng `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT cho bảng `role_user`
--
ALTER TABLE `role_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT cho bảng `sliders`
--
ALTER TABLE `sliders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `transactions`
--
ALTER TABLE `transactions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=162;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=102;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `carts`
--
ALTER TABLE `carts`
  ADD CONSTRAINT `carts_customer_id_foreign` FOREIGN KEY (`transaction_id`) REFERENCES `transactions` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
