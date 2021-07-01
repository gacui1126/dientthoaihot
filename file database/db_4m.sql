-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Máy chủ: localhost
-- Thời gian đã tạo: Th6 10, 2021 lúc 05:56 PM
-- Phiên bản máy phục vụ: 10.4.18-MariaDB
-- Phiên bản PHP: 7.3.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `db_4m`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `bills`
--

CREATE TABLE `bills` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_customer` int(11) DEFAULT NULL,
  `date_order` date DEFAULT NULL,
  `total` float DEFAULT NULL COMMENT 'tổng tiền',
  `payment` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'hình thức thanh toán',
  `note` varchar(500) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Đang đổ dữ liệu cho bảng `bills`
--

INSERT INTO `bills` (`id`, `id_customer`, `date_order`, `total`, `payment`, `note`, `created_at`, `updated_at`) VALUES
(21, 24, '2021-05-26', 150000, 'COD', 'ádasdas', '2021-05-26 12:05:03', '2021-05-26 12:05:03'),
(20, 23, '2021-05-26', 510000, 'COD', 'ád', '2021-05-26 11:50:54', '2021-05-26 11:50:54'),
(19, 22, '2021-05-26', 150000, 'ATM', 'Giao Nhanh cho chị', '2021-05-26 11:49:55', '2021-05-26 11:49:55'),
(18, 21, '2021-05-26', 150000, 'COD', 'Giao sớm giúp mình với ạ!!', '2021-05-26 11:40:37', '2021-05-26 11:40:37');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `bill_details`
--

CREATE TABLE `bill_details` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_bill` int(10) NOT NULL,
  `id_product` int(10) NOT NULL,
  `quantity` int(11) NOT NULL COMMENT 'số lượng',
  `unit_price` double NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Đang đổ dữ liệu cho bảng `bill_details`
--

INSERT INTO `bill_details` (`id`, `id_bill`, `id_product`, `quantity`, `unit_price`, `created_at`, `updated_at`) VALUES
(24, 21, 1, 1, 150000, '2021-05-26 12:05:03', '2021-05-26 12:05:03'),
(23, 20, 2, 2, 180000, '2021-05-26 11:50:54', '2021-05-26 11:50:54'),
(22, 20, 3, 1, 150000, '2021-05-26 11:50:54', '2021-05-26 11:50:54'),
(21, 19, 1, 1, 150000, '2021-05-26 11:49:55', '2021-05-26 11:49:55'),
(20, 18, 1, 1, 150000, '2021-05-26 11:40:37', '2021-05-26 11:40:37');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `customers`
--

CREATE TABLE `customers` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `gender` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `phone_number` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `note` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `customers`
--

INSERT INTO `customers` (`id`, `name`, `gender`, `email`, `address`, `phone_number`, `note`, `created_at`, `updated_at`) VALUES
(24, 'Nguyễn Trường Sơn', 'nam', 'ntson140298@gmail.com', '388 hà huy tập', '0343183285', 'ádasdas', '2021-05-26 12:05:03', '2021-05-26 12:05:03'),
(23, 'Nguyễn Trường Sơn', 'nam', 'ntson140298@gmail.com', '388 hà huy tập', '0343183285', 'ád', '2021-05-26 11:50:54', '2021-05-26 11:50:54'),
(22, 'Phạm Thị Hoàng Vi', 'nữ', 'hoangvi0328@gmail.com', '54 Phan Anh, Khuê Trung, Cẩm Lệ, Đà Nẵng', '0338513531', 'Giao Nhanh cho chị', '2021-05-26 11:49:55', '2021-05-26 11:49:55'),
(21, 'Nguyễn Trường Sơn', 'nam', 'ntson140298@gmail.com', '388 hà huy tập', '0343183285', 'Giao sớm giúp mình với ạ!!', '2021-05-26 11:40:37', '2021-05-26 11:40:37');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2021_05_27_123005_create_roles_table', 1),
(2, '2021_05_29_102659_add_column_deleted_at_table_producttype', 2),
(4, '2021_06_02_162447_create_slides_table', 3),
(5, '2021_06_04_200552_create_permissions_table', 4),
(6, '2021_06_04_200756_create_table_user_role', 4),
(7, '2021_06_04_200910_create_table_permission_role', 4),
(9, '2021_06_06_102227_add_column_parent_id_permission', 5),
(10, '2021_06_06_145239_add_column_key_permission_table', 6);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `news`
--

CREATE TABLE `news` (
  `id` int(10) NOT NULL,
  `title` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL COMMENT 'tiêu đề',
  `content` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL COMMENT 'nội dung',
  `image` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL COMMENT 'hình',
  `create_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `update_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `news`
--

INSERT INTO `news` (`id`, `title`, `content`, `image`, `create_at`, `update_at`) VALUES
(1, 'Mùa trung thu năm nay, Hỷ Lâm Môn muốn gửi đến quý khách hàng sản phẩm mới xuất hiện lần đầu tiên tại Việt nam \"Bánh trung thu Bơ Sữa HongKong\".', 'Những ý tưởng dưới đây sẽ giúp bạn sắp xếp tủ quần áo trong phòng ngủ chật hẹp của mình một cách dễ dàng và hiệu quả nhất. ', 'sample1.jpg', '2017-03-11 06:20:23', '0000-00-00 00:00:00'),
(2, 'Tư vấn cải tạo phòng ngủ nhỏ sao cho thoải mái và thoáng mát', 'Chúng tôi sẽ tư vấn cải tạo và bố trí nội thất để giúp phòng ngủ của chàng trai độc thân thật thoải mái, thoáng mát và sáng sủa nhất. ', 'sample2.jpg', '2016-10-20 02:07:14', '0000-00-00 00:00:00'),
(3, 'Đồ gỗ nội thất và nhu cầu, xu hướng sử dụng của người dùng', 'Đồ gỗ nội thất ngày càng được sử dụng phổ biến nhờ vào hiệu quả mà nó mang lại cho không gian kiến trúc. Xu thế của các gia đình hiện nay là muốn đem thiên nhiên vào nhà ', 'sample3.jpg', '2016-10-20 02:07:14', '0000-00-00 00:00:00'),
(4, 'Hướng dẫn sử dụng bảo quản đồ gỗ, nội thất.', 'Ngày nay, xu hướng chọn vật dụng làm bằng gỗ để trang trí, sử dụng trong văn phòng, gia đình được nhiều người ưa chuộng và quan tâm. Trên thị trường có nhiều sản phẩm mẫu ', 'sample4.jpg', '2016-10-20 02:07:14', '0000-00-00 00:00:00'),
(5, 'Phong cách mới trong sử dụng đồ gỗ nội thất gia đình', 'Đồ gỗ nội thất gia đình ngày càng được sử dụng phổ biến nhờ vào hiệu quả mà nó mang lại cho không gian kiến trúc. Phong cách sử dụng đồ gỗ hiện nay của các gia đình hầu h ', 'sample5.jpg', '2016-10-20 02:07:14', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `parent_id` int(11) NOT NULL DEFAULT 0,
  `auth_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `key_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `created_at`, `updated_at`, `parent_id`, `auth_name`, `key_code`) VALUES
(1, 'Danh mục', NULL, NULL, 0, 'Danh mục', ''),
(2, 'Danh sách danh mục', NULL, NULL, 1, 'Danh sách danh mục', 'list_category'),
(3, 'Thêm danh mục', NULL, NULL, 1, 'Thêm danh mục', 'create_category'),
(4, 'Sửa danh mục', NULL, NULL, 1, 'Sửa danh mục', 'edit_category'),
(5, 'Xoá danh mục', NULL, NULL, 1, 'Xoá danh mục', 'delete_category'),
(6, 'Sản phẩm', NULL, NULL, 0, 'Sản phẩm', ''),
(7, 'Danh sách sản phẩm', NULL, NULL, 6, 'Danh sách sản phẩm', 'list_product'),
(8, 'Thêm sản phẩm', NULL, NULL, 6, 'Thêm sản phẩm', 'create_product'),
(9, 'Sửa sản phẩm', NULL, NULL, 6, 'Sửa sản phẩm', 'edit_product'),
(10, 'Xoá sản phẩm', NULL, NULL, 6, 'Xoá sản phẩm', 'delete_product'),
(11, 'Slide', NULL, NULL, 0, 'Slide', ''),
(12, 'Danh sách slide', NULL, NULL, 11, 'Danh sách slide', 'list_slide'),
(13, 'Thêm slide', NULL, NULL, 11, 'Thêm slide', 'create_slide'),
(14, 'Sửa slide', NULL, NULL, 11, 'Sửa slide', 'edit_slide'),
(15, 'Xoá slide', NULL, NULL, 11, 'Xoá slide', 'delete_slide'),
(16, 'Thành viên', NULL, NULL, 0, 'Thành viên', ''),
(17, 'Danh sách thành viên', NULL, NULL, 16, 'Danh sách thành viên', 'list_user'),
(18, 'Thêm thành viên', NULL, NULL, 16, 'Thêm thành viên', 'create_user'),
(19, 'Sửa thành viên', NULL, NULL, 16, 'Sửa thành viên', 'edit_user'),
(20, 'Xoá thành viên', NULL, NULL, 16, 'Xoá thành viên', 'delete_user'),
(21, 'Phân quyền', NULL, NULL, 0, 'Phân quyền', ''),
(22, 'Danh sách phân quyền', NULL, NULL, 21, 'Danh sách phân quyền', 'list_role'),
(23, 'Thêm phân quyền', NULL, NULL, 21, 'Thêm phân quyền', 'create_role'),
(24, 'Sửa phân quyền', NULL, NULL, 21, 'Sửa phân quyền', 'edit_role'),
(25, 'Xoá phân quyền', NULL, NULL, 21, 'Xoá phân quyền', 'delete_role');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `permission_role`
--

CREATE TABLE `permission_role` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_role` int(11) NOT NULL,
  `id_permission` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `permission_role`
--

INSERT INTO `permission_role` (`id`, `id_role`, `id_permission`, `created_at`, `updated_at`) VALUES
(1, 9, 22, NULL, NULL),
(2, 9, 23, NULL, NULL),
(3, 9, 24, NULL, NULL),
(4, 9, 25, NULL, NULL),
(5, 7, 4, NULL, NULL),
(7, 4, 3, NULL, NULL),
(8, 4, 7, NULL, NULL),
(9, 4, 8, NULL, NULL),
(10, 4, 12, NULL, NULL),
(11, 4, 13, NULL, NULL),
(13, 1, 3, NULL, NULL),
(14, 1, 4, NULL, NULL),
(15, 1, 5, NULL, NULL),
(16, 1, 7, NULL, NULL),
(17, 1, 8, NULL, NULL),
(18, 1, 9, NULL, NULL),
(19, 1, 10, NULL, NULL),
(20, 1, 12, NULL, NULL),
(21, 1, 13, NULL, NULL),
(22, 1, 14, NULL, NULL),
(23, 1, 15, NULL, NULL),
(24, 1, 17, NULL, NULL),
(25, 1, 18, NULL, NULL),
(26, 1, 19, NULL, NULL),
(27, 1, 20, NULL, NULL),
(28, 1, 22, NULL, NULL),
(29, 1, 23, NULL, NULL),
(30, 1, 24, NULL, NULL),
(31, 1, 25, NULL, NULL),
(33, 4, 2, NULL, NULL),
(35, 3, 2, NULL, NULL),
(36, 3, 3, NULL, NULL),
(37, 3, 4, NULL, NULL),
(38, 3, 5, NULL, NULL),
(39, 3, 7, NULL, NULL),
(40, 3, 8, NULL, NULL),
(41, 3, 9, NULL, NULL),
(42, 3, 10, NULL, NULL),
(43, 3, 12, NULL, NULL),
(44, 3, 13, NULL, NULL),
(45, 3, 14, NULL, NULL),
(46, 3, 15, NULL, NULL),
(47, 3, 17, NULL, NULL),
(48, 4, 4, NULL, NULL),
(49, 4, 9, NULL, NULL),
(50, 4, 14, NULL, NULL),
(51, 1, 2, NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `products`
--

CREATE TABLE `products` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `product_code` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `id_type` int(10) UNSIGNED DEFAULT NULL,
  `id_user` int(11) NOT NULL,
  `description` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `unit_price` float DEFAULT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `unit` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `new` tinyint(4) DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `image_path` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `products`
--

INSERT INTO `products` (`id`, `name`, `product_code`, `id_type`, `id_user`, `description`, `unit_price`, `image`, `unit`, `new`, `created_at`, `updated_at`, `image_path`) VALUES
(97, 'Iphone 8', 'vh01', 1, 7, 'Iphone 8', 10000000, 'iphone 8 plus.jpeg', NULL, 1, '2021-06-08 15:07:55', '2021-06-08 15:07:55', '/storage/product/owi4DPJV5LMpgLvm8YHpEDyWwK4I7yXBFApVKFpF.jpeg');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product_types`
--

CREATE TABLE `product_types` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `parent_id` int(11) NOT NULL DEFAULT 0,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `product_types`
--

INSERT INTO `product_types` (`id`, `name`, `created_at`, `updated_at`, `parent_id`, `deleted_at`) VALUES
(1, 'Quần', '2021-01-01 12:01:26', '2021-01-01 02:16:15', 0, NULL),
(2, 'Quần jean', NULL, NULL, 1, NULL),
(3, 'Quần đùi', NULL, NULL, 1, NULL),
(5, 'Áo', '2021-01-28 04:00:00', '2021-05-31 09:44:32', 0, NULL),
(6, 'Áo thun', NULL, NULL, 5, NULL),
(7, 'Áo sơmi', NULL, NULL, 5, NULL),
(8, 'Quần short', NULL, '2021-06-05 15:17:26', 1, '2021-06-05 15:17:26'),
(11, 'Quần ống le', '2021-05-31 09:30:39', '2021-05-31 09:33:13', 1, NULL),
(12, 'Váy', '2021-05-31 09:48:40', '2021-05-31 09:48:40', 0, NULL),
(13, 'Đồ ngủ', '2021-05-31 09:49:44', '2021-05-31 09:49:44', 0, NULL),
(14, 'Váy ngắn', '2021-05-31 09:49:58', '2021-05-31 09:49:58', 12, NULL),
(15, 'Đầm', '2021-05-31 09:50:11', '2021-06-07 14:42:15', 12, '2021-06-07 14:42:15'),
(16, 'Váy hồng cổ v', '2021-06-02 03:10:26', '2021-06-02 03:10:28', 0, '2021-06-02 03:10:28'),
(17, 'Nguyễn Trường Sơn', '2021-06-02 09:52:09', '2021-06-02 09:52:12', 2, '2021-06-02 09:52:12');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `auth_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `roles`
--

INSERT INTO `roles` (`id`, `name`, `auth_name`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'Quản trị hệ thống', NULL, NULL),
(2, 'guest', 'Khách hàng', NULL, NULL),
(3, 'developer', 'Phát triển hệ thống', NULL, NULL),
(4, 'content', 'Chỉnh sửa nội dung', NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `role_user`
--

CREATE TABLE `role_user` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_role` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `role_user`
--

INSERT INTO `role_user` (`id`, `id_user`, `id_role`, `created_at`, `updated_at`) VALUES
(3, 12, 2, NULL, NULL),
(4, 12, 3, NULL, NULL),
(5, 13, 2, NULL, NULL),
(7, 14, 2, NULL, NULL),
(8, 14, 4, NULL, NULL),
(9, 19, 2, NULL, NULL),
(10, 19, 3, NULL, NULL),
(11, 28, 3, NULL, NULL),
(12, 28, 4, NULL, NULL),
(13, 7, 1, NULL, NULL),
(14, 8, 4, NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `slides`
--

CREATE TABLE `slides` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image_path` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `slides`
--

INSERT INTO `slides` (`id`, `name`, `image_path`, `image`, `created_at`, `updated_at`) VALUES
(1, 'slide-tra-gop-1', '/storage/slide/sjyQAeNWrBZ4GyrU2qSAtS5OsABKHlVMQMFwdSKZ.jpeg', 'slider_1.jpeg', '2021-06-05 13:27:45', '2021-06-05 13:27:45');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `full_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `full_name`, `email`, `password`, `phone`, `address`, `remember_token`, `created_at`, `updated_at`) VALUES
(7, 'Admin', 'admin@gmail.com', '$2y$10$0Uv3f6i.3YmBcJauGda5oeuV2PLvApqzC4q/rMTEzpAtuVjmUJ81G', '0343183285', '388 hà huy tập', NULL, '2021-05-26 13:48:52', '2021-06-06 14:34:43'),
(8, 'Nguyễn Trường Sơn', 'son1402@gmail.com', '$2y$10$ulofbflzrTghzUu50H3mdu1sKG3NSS1x39O36lhgIpPjfng1zMxCK', '0343183285', '388 hà huy tập', NULL, '2021-05-26 13:49:31', '2021-06-06 14:34:59'),
(9, 'Phạm Thị Hoàng Vi', 'hoangvi0328@gmail.com', '$2y$10$QBuUCF0aClXTg6QS4SQ.pOntUFAXKKTqqlQfqhKcoH7tA930mU2g6', '0343183285', '56 Phan Anh', NULL, '2021-05-26 13:50:37', '2021-05-26 13:50:37'),
(12, 'Sơn123', 'son1@gmail.com', '$2y$10$Bqjr9DZOYfLMx.sVnWa7UueiSANLdlvoenV/qXHX3kASDnH7x.oVq', NULL, NULL, NULL, '2021-06-05 13:21:27', '2021-06-05 13:21:27'),
(13, 'Sơn Sâu Sắc', 'son11@gmail.com', '$2y$10$K7Sc8vqlDhXK2gwlU8IhLO.Lsx59/C7d4/nl2h033WMEdLMIfXiHu', NULL, NULL, NULL, '2021-06-05 13:24:58', '2021-06-06 14:29:34'),
(29, 'Nguyễn Trường Sơn', 'son1144@gmail.com', '$2y$10$BiRYBmRmxQLn5qM2YGMozOIhdpezait43lpEuXNASHb6szAu7UHuW', '0343183285', '388 hà huy tập', NULL, '2021-06-09 01:51:35', '2021-06-09 01:51:35');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `bills`
--
ALTER TABLE `bills`
  ADD PRIMARY KEY (`id`),
  ADD KEY `bills_ibfk_1` (`id_customer`);

--
-- Chỉ mục cho bảng `bill_details`
--
ALTER TABLE `bill_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `bill_detail_ibfk_2` (`id_product`);

--
-- Chỉ mục cho bảng `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `permission_role`
--
ALTER TABLE `permission_role`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `products_id_type_foreign` (`id_type`);

--
-- Chỉ mục cho bảng `product_types`
--
ALTER TABLE `product_types`
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
-- Chỉ mục cho bảng `slides`
--
ALTER TABLE `slides`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `bills`
--
ALTER TABLE `bills`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT cho bảng `bill_details`
--
ALTER TABLE `bill_details`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT cho bảng `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT cho bảng `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT cho bảng `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=123;

--
-- AUTO_INCREMENT cho bảng `permission_role`
--
ALTER TABLE `permission_role`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT cho bảng `products`
--
ALTER TABLE `products`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=98;

--
-- AUTO_INCREMENT cho bảng `product_types`
--
ALTER TABLE `product_types`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT cho bảng `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT cho bảng `role_user`
--
ALTER TABLE `role_user`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT cho bảng `slides`
--
ALTER TABLE `slides`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_id_type_foreign` FOREIGN KEY (`id_type`) REFERENCES `product_types` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
