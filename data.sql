-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 25, 2020 at 02:09 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dienmay_laravel`
--

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
(3, '2020_11_17_102830_create_tbl_admin_table', 1),
(10, '2020_11_18_060121_create_admin_table', 2),
(14, '2020_11_18_062338_create_user_table', 3),
(25, '2014_10_12_000000_create_users_table', 4),
(26, '2014_10_12_100000_create_password_resets_table', 4),
(27, '2020_11_18_063813_create_admin_table', 4),
(28, '2020_11_18_074612_create_tbl_category_table', 4),
(29, '2020_11_18_133818_create_tbl_brand_product', 4),
(30, '2020_11_18_140033_create_tbl_product', 4),
(31, '2020_11_22_064017_create_tbl_customer', 5),
(32, '2020_11_22_070919_create_tbl_shipping', 6),
(33, '2020_11_24_051036_create_tbl_payment', 7),
(34, '2020_11_24_051058_create_tbl_order', 7),
(35, '2020_11_24_051130_create_tbl_order_details', 7),
(36, '2020_12_03_025227_tbl_comment', 8),
(37, '2020_12_04_061237_create_tbl_rating', 9);

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
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`id`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Huy', 'admin@gmail.com', '75d23af433e0cea4c0e45a56dba18b30', NULL, '2020-11-17 15:06:27', '2020-11-17 15:06:27');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_brand`
--

CREATE TABLE `tbl_brand` (
  `brand_id` int(10) UNSIGNED NOT NULL,
  `brand_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `brand_desc` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `brand_status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_brand`
--

INSERT INTO `tbl_brand` (`brand_id`, `brand_name`, `brand_desc`, `brand_status`, `created_at`, `updated_at`) VALUES
(1, 'Panasonic', '<p><strong>Panasonic</strong>&nbsp;l&agrave; một thương hiệu điện tử được th&agrave;nh lập v&agrave;o năm 1923 c&oacute; trụ sở tại Kadoma, tỉnh Osaka, Nhật Bản.</p>', 1, NULL, NULL),
(2, 'SamSung', '<p><strong>Samsung</strong>&nbsp;l&agrave; một thương hiệu điện tử, viễn th&ocirc;ng c&oacute; trụ sở đặt tại h&agrave;n Quốc, được th&agrave;nh lập v&agrave;o năm 1938.</p>', 1, NULL, NULL),
(3, 'ToShiBa', '<p>Tập đo&agrave;n&nbsp;<strong>Toshiba</strong>&nbsp;được th&agrave;nh lập v&agrave;o năm 1873, c&oacute; trụ sở ch&iacute;nh tại Tokyo, Nhật Bản. Trải qua 140 năm h&igrave;nh th&agrave;nh v&agrave; ph&aacute;t triển, giờ đ&acirc;y&nbsp;<strong>Toshiba</strong>&nbsp;đ&atilde; l&agrave; một trong những thương hiệu h&agrave;ng đầu thế giới trong lĩnh vực kinh doanh sản phẩm điện v&agrave; điện tử gia dụng.</p>', 1, NULL, NULL),
(4, 'LG', '<p><strong>LG</strong>&nbsp;l&agrave; 1 thương hiệu chuy&ecirc;n sản xuất c&aacute;c thiết bị điện tử Tivi, điện thoại, Laptop,... đến từ H&agrave;n Quốc. C&ugrave;ng với Samsung,&nbsp;<strong>LG</strong>&nbsp;cũng được đ&aacute;nh gi&aacute; l&agrave; một &ocirc;ng lớn&nbsp;<strong>của</strong>&nbsp;thị trường điện tử Thế giới, đặc biệt l&agrave; ở mảng Tivi.</p>', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_category`
--

CREATE TABLE `tbl_category` (
  `category_id` int(10) UNSIGNED NOT NULL,
  `category_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_desc` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `category_status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_category`
--

INSERT INTO `tbl_category` (`category_id`, `category_name`, `category_desc`, `category_status`, `created_at`, `updated_at`) VALUES
(1, 'Tivi', '<p>C&aacute;c sản phẩm thuộc tivi</p>', 1, NULL, NULL),
(2, 'Tủ lạnh', '<p>C&aacute;c sản phẩm thuộc tủ lạnh</p>', 1, NULL, NULL),
(3, 'Máy giặt', '<p>C&aacute;c sản phẩm thuộc m&aacute;y giặt</p>', 1, NULL, NULL),
(4, 'Máy lạnh', '<p>C&aacute;c sản phẩm thuộc m&aacute;y lạnh</p>', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_comment`
--

CREATE TABLE `tbl_comment` (
  `comment_id` int(10) UNSIGNED NOT NULL,
  `comment` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `comment_name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `comment_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `comment_product_id` int(11) NOT NULL,
  `comment_parent_id` int(11) DEFAULT NULL,
  `comment_status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_comment`
--

INSERT INTO `tbl_comment` (`comment_id`, `comment`, `comment_name`, `comment_date`, `comment_product_id`, `comment_parent_id`, `comment_status`, `created_at`, `updated_at`) VALUES
(5, 'Tủ lạnh sài quá êm', 'Lưu Huyền Đức', '2020-12-03 07:02:28', 13, 0, 0, NULL, NULL),
(6, 'Tủ lạnh rẻ', 'Nguyễn Huy', '2020-12-03 07:02:29', 13, 0, 0, NULL, NULL),
(13, 'Cám ơn bạn', 'Admin', '2020-12-03 07:41:50', 13, 6, 0, NULL, NULL),
(14, 'Ok ban', 'Admin', '2020-12-03 08:03:01', 13, 5, 0, NULL, NULL),
(15, 'Tủ này có lạnh không?', 'Tào Mạnh Đức', '2020-12-03 08:19:53', 13, 0, 0, NULL, NULL),
(16, 'Có nhé', 'Admin', '2020-12-03 08:16:37', 13, 15, 0, NULL, NULL),
(17, 'Tủ lạnh này có lạnh không?', 'Nguyễn Huy', '2020-12-06 02:01:07', 11, 0, 0, NULL, NULL),
(18, 'Có nhé bạn', 'Admin', '2020-12-06 02:01:16', 11, 17, 0, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_customer`
--

CREATE TABLE `tbl_customer` (
  `customer_id` int(11) UNSIGNED NOT NULL,
  `customer_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `customer_email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `customer_password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `customer_phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_customer`
--

INSERT INTO `tbl_customer` (`customer_id`, `customer_name`, `customer_email`, `customer_password`, `customer_phone`, `created_at`, `updated_at`) VALUES
(1, 'Nguyen Huy', 'huyrua12a1@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '0374408793', NULL, NULL),
(2, 'LinhLinh', 'linh@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '0374408793', NULL, NULL),
(3, 'Van Teo', 'vanteo@gmail.com', '4b07ae23d36fabc8b7f2a944b3ceb756', '03474408714', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_order`
--

CREATE TABLE `tbl_order` (
  `order_id` int(10) UNSIGNED NOT NULL,
  `customer_id` int(11) UNSIGNED NOT NULL,
  `shipping_id` int(11) UNSIGNED NOT NULL,
  `order_status` int(11) NOT NULL,
  `order_code` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `order_day` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_order`
--

INSERT INTO `tbl_order` (`order_id`, `customer_id`, `shipping_id`, `order_status`, `order_code`, `order_day`, `created_at`, `updated_at`) VALUES
(9, 2, 9, 1, '0c008', '2020-12-09', NULL, NULL),
(10, 2, 10, 1, 'c9240', '2020-12-09', NULL, NULL),
(11, 2, 11, 1, 'ba506', '2020-12-09', NULL, NULL),
(16, 2, 16, 1, '74397', '2020-12-09', NULL, NULL),
(17, 2, 17, 1, '1b0eb', '2020-12-09', NULL, NULL),
(18, 2, 18, 1, 'c4a85', '2020-11-09', NULL, NULL),
(19, 2, 19, 1, '840bb', '2020-12-08', NULL, NULL),
(20, 2, 20, 1, 'c24fd', '2020-12-21', NULL, NULL),
(21, 2, 21, 1, '6ecb6', '2020-12-25', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_order_details`
--

CREATE TABLE `tbl_order_details` (
  `order_details_id` int(10) UNSIGNED NOT NULL,
  `order_id` int(11) UNSIGNED NOT NULL,
  `order_code` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_id` int(11) UNSIGNED NOT NULL,
  `product_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_price` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_sales_quantity` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_order_details`
--

INSERT INTO `tbl_order_details` (`order_details_id`, `order_id`, `order_code`, `product_id`, `product_name`, `product_price`, `product_sales_quantity`, `created_at`, `updated_at`) VALUES
(8, 9, '0c008', 11, 'Tủ lạnh Toshiba Inverter 409 lít', '14190000', 1, NULL, NULL),
(9, 9, '0c008', 12, 'Tủ lạnh Panasonic Inverter 255 lít', '11490000', 1, NULL, NULL),
(10, 10, 'c9240', 11, 'Tủ lạnh Toshiba Inverter 409 lít', '14190000', 3, NULL, NULL),
(11, 10, 'c9240', 12, 'Tủ lạnh Panasonic Inverter 255 lít', '11490000', 1, NULL, NULL),
(12, 11, 'ba506', 8, 'Máy lạnh Panasonic Inverter 1.5 HP', '19890000', 1, NULL, NULL),
(13, 11, 'ba506', 9, 'Máy lạnh Samsung Inverter 1 HP', '9090000', 1, NULL, NULL),
(22, 16, '74397', 15, 'Máy giặt Panasonic 9 kg', '7190000', 1, NULL, NULL),
(23, 16, '74397', 12, 'Tủ lạnh Panasonic Inverter 255 lít', '11490000', 1, NULL, NULL),
(24, 17, '1b0eb', 11, 'Tủ lạnh Toshiba Inverter 409 lít', '14190000', 1, NULL, NULL),
(25, 17, '1b0eb', 13, 'Tủ lạnh Samsung Inverter 236 lít', '6890000', 1, NULL, NULL),
(26, 18, 'c4a85', 4, 'Smart Tivi NanoCell LG 4K 49\"', '12690000', 1, NULL, NULL),
(27, 18, 'c4a85', 6, 'Smart Tivi NanoCell LG 4K 49', '15490000', 1, NULL, NULL),
(28, 19, '840bb', 12, 'Tủ lạnh Panasonic Inverter 255 lít', '11490000', 1, NULL, NULL),
(29, 19, '840bb', 13, 'Tủ lạnh Samsung Inverter 236 lít', '6890000', 1, NULL, NULL),
(30, 20, 'c24fd', 11, 'Tủ lạnh Toshiba Inverter 409 lít', '14190000', 1, NULL, NULL),
(31, 20, 'c24fd', 12, 'Tủ lạnh Panasonic Inverter 255 lít', '11490000', 1, NULL, NULL),
(32, 21, '6ecb6', 13, 'Tủ lạnh Samsung Inverter 236 lít', '6890000', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_product`
--

CREATE TABLE `tbl_product` (
  `product_id` int(10) UNSIGNED NOT NULL,
  `category_id` int(11) UNSIGNED NOT NULL,
  `brand_id` int(11) UNSIGNED NOT NULL,
  `product_name` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_desc` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_content` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_price` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_product`
--

INSERT INTO `tbl_product` (`product_id`, `category_id`, `brand_id`, `product_name`, `product_desc`, `product_content`, `product_price`, `product_image`, `product_status`, `created_at`, `updated_at`) VALUES
(1, 1, 2, 'Samsung Smart TV 43\"', '<p><strong>Đặc điểm nổi bật</strong></p>\r\n\r\n<p>- Thiết kế nhỏ gọn đi c&ugrave;ng với m&agrave;n h&igrave;nh 43 inch.</p>\r\n\r\n<p>- Độ ph&acirc;n giải&nbsp;<a href=\"https://cdn.tgdd.vn/Products/Images/1942/212647/samsung-ua43r6000-8.jpg\" target=\"_blank\">Full HD</a>&nbsp;r&otilde; n&eacute;t gấp 2 lần so với độ ph&acirc;n giải HD.</p>\r\n\r\n<p>- M&agrave;u sắc sống động với c&ocirc;ng nghệ&nbsp;<a href=\"https://cdn.tgdd.vn/Products/Images/1942/212647/samsung-ua43r6000-11.jpg\" target=\"_blank\">PurColor</a>.</p>\r\n\r\n<p>- H&igrave;nh ảnh c&oacute; độ tương phản cao với c&ocirc;ng nghệ&nbsp;<a href=\"https://cdn.tgdd.vn/Products/Images/1942/212647/samsung-ua43r6000-10.jpg\" target=\"_blank\">Micro Dimming Pro</a>.</p>\r\n\r\n<p>- &Acirc;m thanh v&ograve;m sống động với c&ocirc;ng nghệ Dolby Digital.</p>\r\n\r\n<p>- Hệ điều h&agrave;nh&nbsp;<a href=\"https://www.youtube.com/watch?v=Hs8h_NV6Ytg\" target=\"_blank\">Tizen OS</a>&nbsp;dễ sử dụng c&ugrave;ng với kho ứng dụng phong ph&uacute;.</p>\r\n\r\n<p>- Remote th&ocirc;ng minh hỗ trợ t&igrave;m kiếm giọng n&oacute;i tiếng Việt 3 miền (chỉ hỗ trợ tr&ecirc;n YouTube).</p>\r\n\r\n<p>- Điều khiển tivi bằng điện thoại với ứng dụng&nbsp;<a href=\"https://cdn.tgdd.vn/Products/Images/1942/212647/samsung-ua43r6000-223820-123851.jpg\" target=\"_blank\">SmartThings</a>.</p>\r\n\r\n<p>- Chiếu m&agrave;n h&igrave;nh điện thoại l&ecirc;n tivi với t&iacute;nh năng Screen Mirroring.</p>', '<p>Thiết kế</p>\r\n\r\n<p>- Loại Tivi:&nbsp;<a href=\"https://www.dienmayxanh.com/kinh-nghiem-hay/mot-so-loai-tivi-pho-bien-hien-nay-793656#smart-tivi\" target=\"_blank\">Smart Tivi</a></p>\r\n\r\n<p>- K&iacute;ch cỡ m&agrave;n h&igrave;nh: 43 inch</p>\r\n\r\n<p>- Độ ph&acirc;n giải:&nbsp;<a href=\"https://www.dienmayxanh.com/kinh-nghiem-hay/diem-mat-nhung-do-phan-giai-pho-bien-hien-nay-tren-577178#full-hd\" target=\"_blank\">Full HD</a></p>\r\n\r\n<p>Kết nối</p>\r\n\r\n<p>-&nbsp;<a href=\"https://www.dienmayxanh.com/kinh-nghiem-hay/bluetooth-tren-tivi-dung-de-lam-gi-841377\" target=\"_blank\">Bluetooth:</a>&nbsp;C&oacute; (Loa, chuột, b&agrave;n ph&iacute;m)</p>\r\n\r\n<p>- Kết nối Internet: C&oacute;</p>\r\n\r\n<p>-&nbsp;<a href=\"https://www.dienmayxanh.com/kinh-nghiem-hay/diem-mat-nhung-ket-noi-co-ban-tren-tivi-576709#HDMI\" target=\"_blank\">Cổng HDMI:</a>&nbsp;2 cổng</p>\r\n\r\n<p>- Cổng AV:&nbsp;<a href=\"https://www.dienmayxanh.com/kinh-nghiem-hay/diem-mat-nhung-ket-noi-co-ban-tren-tivi-phan-2-633476#component-tich-hop-composite\" target=\"_blank\">Cổng Composite t&iacute;ch hợp b&ecirc;n trong cổng Component</a></p>\r\n\r\n<p>- Cổng xuất &acirc;m thanh:&nbsp;<a href=\"https://www.dienmayxanh.com/kinh-nghiem-hay/nhung-dieu-can-biet-ve-cong-optical-tren-tivi-694602\" target=\"_blank\">Cổng Optical (Digital Audio Out)</a>,&nbsp;<a href=\"https://www.dienmayxanh.com/kinh-nghiem-hay/cong-hdmi-arc-tren-tivi-dung-de-lam-gi-874132\" target=\"_blank\">HDMI ARC</a></p>\r\n\r\n<p>-&nbsp;<a href=\"https://www.dienmayxanh.com/kinh-nghiem-hay/diem-mat-nhung-ket-noi-co-ban-tren-tivi-576709#usb\" target=\"_blank\">USB:</a>&nbsp;1 cổng</p>\r\n\r\n<p>- T&iacute;ch hợp đầu thu kỹ thuật số:&nbsp;<a href=\"https://www.dienmayxanh.com/kinh-nghiem-hay/dvb-t2-la-gi-574834\" target=\"_blank\">DVB-T2</a></p>', '7450000', 'tvsamsung196.jpg', 1, NULL, NULL),
(2, 1, 2, 'Smart Tivi QLED Samsung 4K 50\"', '<p>Đặc điểm nổi bật</p>\r\n\r\n<ol>\r\n	<li>Thiết kế tivi 50 inch kh&ocirc;ng viền 3 cạnh tinh giản, ho&agrave;n mỹ hơn, độ ph&acirc;n giải <a href=\"https://cdn.tgdd.vn/Products/Images/1942/218782/4k.jpg\" target=\"_blank\">Ultra HD 4K</a>.</li>\r\n	<li>Truyền tải trọn vẹn 100% dải m&agrave;u với c&ocirc;ng nghệ m&agrave;n h&igrave;nh chấm lượng tử <a href=\"https://www.youtube.com/embed/nwzNTrsfRjg\" target=\"_blank\">Quantum Dot</a>.</li>\r\n	<li>Tăng cường độ tương phản của h&igrave;nh ảnh bằng c&ocirc;ng nghệ đ&egrave;n nền Dual LED v&agrave; Quantum HDR.</li>\r\n	<li>H&igrave;nh ảnh tối ưu từng chi tiết s&aacute;ng tối qua c&ocirc;ng nghệ <a href=\"https://cdn.tgdd.vn/Products/Images/1942/218782/samsung-qa43q60tsupreme-uhd-dimming.jpg\" target=\"_blank\">Supreme UHD Dimming</a>.</li>\r\n	<li>H&igrave;nh ảnh chất lượng v&agrave; m&agrave;u sắc trọn vẹn với g&oacute;c nh&igrave;n si&ecirc;u rộng với c&ocirc;ng nghệ <a href=\"https://cdn.tgdd.vn/Products/Images/1942/218782/gocnhin.jpg\" target=\"_blank\">Wide Viewing Angle</a>.</li>\r\n	<li>Hệ điều h&agrave;nh <a href=\"https://cdn.tgdd.vn/Products/Images/1942/218782/samsung-qa43q60ttizen-os.jpg\" target=\"_blank\">Tizen OS</a> đơn giản, dễ sử dụng v&agrave; kho ứng dụng phong ph&uacute;.</li>\r\n	<li>Chiếu m&agrave;n h&igrave;nh điện thoại l&ecirc;n tivi qua t&iacute;nh năng Multi View (Trình chi&ecirc;́u đa màn hình), Tap View v&agrave; <a href=\"https://cdn.tgdd.vn/Products/Images/1942/218782/airplay.jpg\" target=\"_blank\">AirPlay 2</a>.</li>\r\n	<li>Đa dạng c&aacute;c <a href=\"https://cdn.tgdd.vn/Products/Images/1942/218782/samsung-qa43q60tcong-ket-noi.jpg\" target=\"_blank\">cổng kết nối</a>: Bluetooth, HDMI, Wifi,...</li>\r\n</ol>', '<p>Loại tivi:&nbsp;<a href=\"https://www.dienmayxanh.com/kinh-nghiem-hay/mot-so-loai-tivi-pho-bien-hien-nay-793656#smart-tivi\" target=\"_blank\">Smart Tivi QLED</a>, 50 inch</p>', '14900000', 'tvsamsung20.jpg', 1, NULL, NULL),
(3, 1, 2, 'Smart Tivi Samsung 4K 50', '<p>Đặc điểm nổi bật</p>\r\n\r\n<ol>\r\n	<li>Thiết kế kh&ocirc;ng viền 3 cạnh hiện đại, k&iacute;ch thước tivi 50 inch. Độ ph&acirc;n giải&nbsp;<a href=\"https://cdn.tgdd.vn/Products/Images/1942/219295/ultra-hd.jpg\" target=\"_blank\">Ultra HD 4K</a>&nbsp;r&otilde; n&eacute;t gấp 4 lần Full HD.</li>\r\n	<li>Cho h&igrave;nh ảnh chi tiết, sắc sảo hơn với c&ocirc;ng nghệ&nbsp;<a href=\"https://cdn.tgdd.vn/Products/Images/1942/219295/hdr10-1.jpg\" target=\"_blank\">HDR10+</a>.</li>\r\n	<li>Dải m&agrave;u sắc phong ph&uacute;, h&igrave;nh ảnh hiển thị sống động hơn với c&ocirc;ng nghệ m&agrave;u sắc&nbsp;<a href=\"https://cdn.tgdd.vn/Products/Images/1942/219295/crystal-display.jpg\" target=\"_blank\">Crystal Display</a>.</li>\r\n	<li>T&aacute;i hiện m&agrave;u sắc ch&iacute;nh x&aacute;c v&agrave; chi tiết hơn th&ocirc;ng qua bộ xử l&yacute;&nbsp;<a href=\"https://cdn.tgdd.vn/Products/Images/1942/219295/chip.jpg\" target=\"_blank\">Crystal 4K</a>.</li>\r\n	<li>Tối ưu độ tương phản,&nbsp;sắc n&eacute;t đến từng chi tiết nhờ c&ocirc;ng nghệ&nbsp;<a href=\"https://cdn.tgdd.vn/Products/Images/1942/219295/tu7000-mega-1.jpg\" target=\"_blank\">Mega Contrast</a>.</li>\r\n	<li>Tận hưởng m&agrave;n h&igrave;nh chơi game mượt m&agrave;, giảm mờ nh&ograve;e hay rung lắc nhờ c&ocirc;ng nghệ&nbsp;<a href=\"https://cdn.tgdd.vn/Products/Images/1942/219295/real-game-enhancer.jpg\" target=\"_blank\">Real Game Enhancer</a>.</li>\r\n	<li>Giao diện phẳng, đơn giản dễ d&ugrave;ng nhờ hệ điều h&agrave;nh&nbsp;<a href=\"https://www.youtube.com/embed/cAwRpgxPjeQ\" target=\"_blank\">Tizen OS</a>.</li>\r\n	<li>Nhiều&nbsp;<a href=\"https://cdn.tgdd.vn/Products/Images/1942/219295/samsung-ua50tu7000-192620-102618.jpg\" target=\"_blank\">cổng kết nối</a>&nbsp;th&ocirc;ng dụng: HDMI, USB,...</li>\r\n</ol>', '<p>Smart Tivi Samsung 4K 50 inch UA50TU7000</p>', '9500000', 'tvsamsung360.jpg', 1, NULL, NULL),
(4, 1, 4, 'Smart Tivi NanoCell LG 4K 49\"', '<p>Đặc điểm nổi bật</p>\r\n\r\n<ol>\r\n	<li>Thiết kế m&agrave;n h&igrave;nh 49 inch, viền mỏng chỉ 0.4 cm.</li>\r\n	<li>Độ ph&acirc;n giải&nbsp;Ultra HD&nbsp;<a href=\"https://www.youtube.com/embed/CDt4d8c0aD4\" target=\"_blank\">4K</a>&nbsp;cho h&igrave;nh ảnh sắc n&eacute;t, k&egrave;m c&ocirc;ng nghệ&nbsp;<a href=\"https://cdn.tgdd.vn/Products/Images/1942/71836/tivi-sony-kdl-50w800c-21.jpg\" target=\"_blank\">4K Active HDR</a>&nbsp;tăng cường độ tương phản, n&acirc;ng cao độ ch&acirc;n thực.</li>\r\n	<li>C&ocirc;ng nghệ m&agrave;n h&igrave;nh chấm lượng tử&nbsp;<a href=\"https://cdn.tgdd.vn/Products/Images/1942/203403/lg-49sm8100pta-011920-081924.jpg\" target=\"_blank\">NanoCell</a>&nbsp;cho dải m&agrave;u rộng, m&agrave;u sắc sống động rực rỡ.</li>\r\n	<li>Chi tiết h&igrave;nh ảnh r&otilde; r&agrave;ng, m&agrave;u sắc trung thực hơn với chip xử l&yacute; Quad Core.</li>\r\n	<li>C&ocirc;ng nghệ&nbsp;DTS Virtual:X&nbsp;cho người d&ugrave;ng được trải nghiệm chất lượng &acirc;m thanh trong trẻo, sống động.</li>\r\n	<li>Hệ điều h&agrave;nh&nbsp;<a href=\"https://www.youtube.com/embed/DrkOoAdOelw\" target=\"_blank\">WebOS</a>&nbsp;4.5 với kho ứng dụng phong ph&uacute;, dễ sử dụng, Magic Remote -&nbsp;<a href=\"https://www.youtube.com/embed/Ot5vvEFGF38\" target=\"_blank\">t&igrave;m kiếm bằng giọng n&oacute;i</a>&nbsp;c&oacute; hỗ trợ tiếng Việt.</li>\r\n	<li>C&ocirc;ng nghệ tr&iacute; tuệ nh&acirc;n tạo AI ThinQ + Google Assistant đem đến nhiều trải nghiệm tiện &iacute;ch.</li>\r\n	<li>Sử dụng điện thoại th&ocirc;ng minh để điều khiển tivi th&ocirc;ng qua ứng dụng&nbsp;<a href=\"https://www.youtube.com/embed/hfU1yy-bZF8\" target=\"_blank\">LG TV Plus</a>.</li>\r\n	<li>Chiếu m&agrave;n h&igrave;nh Screen Mirroring v&agrave; AirPlay 2 tr&igrave;nh chiếu h&igrave;nh ảnh, nội dung từ điện thoại l&ecirc;n tivi.</li>\r\n</ol>', '<p>Smart Tivi NanoCell LG 4K 49 inch 49SM8100PTA</p>', '12690000', 'tvlg184.jpg', 1, NULL, NULL),
(5, 1, 4, 'Smart Tivi LG 4K 43\"', '<p>Đặc điểm nổi bật</p>\r\n\r\n<ol>\r\n	<li>Thiết kế tivi LG 43 inch nhỏ gọn ph&ugrave; hợp với ph&ograve;ng ngủ, ph&ograve;ng kh&aacute;ch.</li>\r\n	<li>H&igrave;nh ảnh&nbsp;<a href=\"https://cdn.tgdd.vn/Products/Images/1942/224155/lg-43un7290ptf-094720-114727.jpg\" target=\"_blank\">4K</a>&nbsp;sắc n&eacute;t c&ugrave;ng tấm nền IPS bền bỉ, xem mọi g&oacute;c nh&igrave;n.</li>\r\n	<li>Chất lượng video n&acirc;ng cấp l&ecirc;n gần với 4K nhờ&nbsp;bộ xử l&yacute;&nbsp;<a href=\"https://cdn.tgdd.vn/Products/Images/1942/224155/lg-43un7290ptf-073220-093254.jpg\" target=\"_blank\">Quad Core 4K</a>&nbsp;v&agrave; 4K Upscaler.</li>\r\n	<li>Biến tivi th&agrave;nh trung t&acirc;m điều khiển tiện lợi bằng giọng n&oacute;i hỗ trợ tiếng Việt tr&ecirc;n Magic Remote v&agrave;&nbsp;<a href=\"https://cdn.tgdd.vn/Products/Images/1942/224155/lg-43un7290ptf-103920-123948.jpg\" target=\"_blank\">AI ThinQ</a>.</li>\r\n	<li>H&igrave;nh ảnh c&oacute; độ n&eacute;t v&agrave; độ tương phản cao hơn nhờ c&ocirc;ng nghệ 4K Active HDR.</li>\r\n	<li>Cảm nhận đ&uacute;ng &yacute; đồ đạo diễn muốn truyền tải qua c&aacute;c bộ phim với c&ocirc;ng nghệ&nbsp;<a href=\"https://cdn.tgdd.vn/Products/Images/1942/224155/lg-43un7290ptf-102120-122131.jpg\" target=\"_blank\">Filmmaker Mode</a>.</li>\r\n	<li>&Acirc;m thanh mạnh mẽ lan tỏa đều trong kh&ocirc;ng gian nhờ c&ocirc;ng nghệ&nbsp;<a href=\"https://cdn.tgdd.vn/Products/Images/1942/224155/lg-43un7290ptf-073520-093521.jpg\" target=\"_blank\">Ultra Surround</a>&nbsp;giả lập dạng v&ograve;m.</li>\r\n	<li>Hệ điều h&agrave;nh&nbsp;<a href=\"https://cdn.tgdd.vn/Products/Images/1942/224155/lg-43un7290ptf-073620-093631.jpg\" target=\"_blank\">WebOS</a>&nbsp;5.0 quen thuộc, dễ d&ugrave;ng v&agrave; kho ứng dụng đa dạng.</li>\r\n	<li><a href=\"https://cdn.tgdd.vn/Products/Images/1942/224155/lg-43un7290ptf-105020-125018.jpg\" target=\"_blank\">Chiếu m&agrave;n h&igrave;nh</a>&nbsp;điện thoại l&ecirc;n tivi qua t&iacute;nh năng Screen Mirroring (Android) v&agrave; Airplay 2 (iPhone).</li>\r\n</ol>', '<p>Smart Tivi LG 4K 43 inch 43UN7290PTF</p>', '9290000', 'tvlg264.jpg', 1, NULL, NULL),
(6, 1, 4, 'Smart Tivi NanoCell LG 4K 49', '<p>Đặc điểm nổi bật</p>\r\n\r\n<ol>\r\n	<li>M&agrave;n h&igrave;nh 49 inch, thiết kế thanh lịch, ch&acirc;n đế h&igrave;nh b&aacute;n nguyệt độc đ&aacute;o.</li>\r\n	<li>H&igrave;nh ảnh&nbsp;<a href=\"https://cdn.tgdd.vn/Products/Images/1942/224098/lg-49nano81tna-073120-053149.jpg\" target=\"_blank\">4K</a>&nbsp;c&oacute; m&agrave;u sắc thuần khiến, tự nhi&ecirc;n nhờ c&ocirc;ng nghệ&nbsp;<a href=\"https://cdn.tgdd.vn/Products/Images/1942/224098/lg-49nano81tna-073220-053212.jpg\" target=\"_blank\">NanoCell</a>.</li>\r\n	<li>N&acirc;ng cấp h&igrave;nh ảnh v&agrave; &acirc;m thanh với chip xử l&yacute;&nbsp;<a href=\"https://cdn.tgdd.vn/Products/Images/1942/224098/lg-49nano81tna-074420-104433.jpg\" target=\"_blank\">Quad Core (L&otilde;i tứ)</a>, độ tương phản cao hơn với c&ocirc;ng nghệ&nbsp;<a href=\"https://cdn.tgdd.vn/Products/Images/1942/224098/lg-49nano81tna-244920-094959.jpg\" target=\"_blank\">4K Active HDR</a>.</li>\r\n	<li>Kết nối c&aacute;c thiết bị th&ocirc;ng minh trong nh&agrave; tiện lợi với AI ThinQ.</li>\r\n	<li>Thưởng thức trọn vẹn &yacute; đồ những bộ phim điện ảnh muốn truyền tải bằng c&ocirc;ng nghệ Filmmaker Mode.</li>\r\n	<li>Trải nghiệm game ch&acirc;n thực với độ trễ đầu v&agrave;o thấp nhờ c&ocirc;ng nghệ&nbsp;<a href=\"https://cdn.tgdd.vn/Products/Images/1942/224098/lg-49nano81tna-073320-053306.jpg\" target=\"_blank\">HGiG</a>.</li>\r\n	<li>&Acirc;m thanh đa chiều mạnh mẽ với c&ocirc;ng nghệ DTS Virtual:X.</li>\r\n	<li>Hệ điều h&agrave;nh&nbsp;<a href=\"https://cdn.tgdd.vn/Products/Images/1942/224098/lg-49nano81tna-073220-053220.jpg\" target=\"_blank\">WebOS smart TV 5.0</a>&nbsp;trực quan v&agrave; dễ sử dụng.</li>\r\n	<li>ĐIều khiển tivi bằng giọng n&oacute;i tiếng Việt với Magic remote dễ d&agrave;ng.</li>\r\n	<li><a href=\"https://cdn.tgdd.vn/Products/Images/1942/224098/lg-49nano81tna-073120-053153.jpg\" target=\"_blank\">Chiếu m&agrave;n h&igrave;nh</a>&nbsp;điện thoại l&ecirc;n tivi qua t&iacute;nh năng AirPlay 2 (iPhone) v&agrave; Screen Mirroring (Android) dễ d&agrave;ng.</li>\r\n</ol>', '<p>Smart Tivi NanoCell LG 4K 49 inch 49NANO81TNA</p>', '15490000', 'tvlg398.jpg', 1, NULL, NULL),
(7, 4, 1, 'Máy lạnh Panasonic Inverter 1 HP', '<p>Đặc điểm nổi bật</p>\r\n\r\n<ol>\r\n	<li>C&ocirc;ng nghệ lọc kh&ocirc;ng kh&iacute;&nbsp;<a href=\"https://www.youtube.com/embed/YM56osOTbqo\" target=\"_blank\">Nanoe-G</a>&nbsp;cho bầu kh&ocirc;ng kh&iacute; sạch bụi bẩn, bụi mịn PM2.5.</li>\r\n	<li>Sử dụng như một chiếc m&aacute;y lọc kh&ocirc;ng kh&iacute; với hệ thống lọc kh&iacute; hoạt động độc lập.</li>\r\n	<li>C&ocirc;ng nghệ&nbsp;<a href=\"https://www.youtube.com/embed/_gC8G2l9gjA\" target=\"_blank\">Inverter</a>&nbsp;v&agrave; Eco t&iacute;ch hợp AI gi&uacute;p tiết kiệm điện tối đa.</li>\r\n	<li>L&agrave;m lạnh nhanh tức th&igrave; với chế độ Powerful.</li>\r\n	<li>Kh&ocirc;ng kh&iacute; tho&aacute;ng đ&atilde;ng, kh&ocirc; r&aacute;o khi thời tiết ẩm ướt với chế độ h&uacute;t ẩm.</li>\r\n	<li>Tiện lợi hơn với chế độ hẹn giờ bật/tắt m&aacute;y.</li>\r\n</ol>', '<p>M&aacute;y lạnh Panasonic Inverter 1 HP CU/CS-PU9WKH-8M&nbsp;</p>', '10590000', 'maylanh147.jpg', 1, NULL, NULL),
(8, 4, 1, 'Máy lạnh Panasonic Inverter 1.5 HP', '<p>Đặc điểm nổi bật</p>\r\n\r\n<ol>\r\n	<li>D&ograve;ng m&aacute;y lạnh cao cấp&nbsp;<a href=\"https://www.youtube.com/embed/1zZEdFr9ymY\" target=\"_blank\">Sky series</a>.</li>\r\n	<li>C&ocirc;ng nghệ&nbsp;<a href=\"https://www.youtube.com/embed/_gC8G2l9gjA\" target=\"_blank\">Inverter</a>&nbsp;- tiết kiệm điện, vận h&agrave;nh &ecirc;m, l&agrave;m lạnh s&acirc;u v&agrave; hơi lạnh lan tỏa đều.</li>\r\n	<li><a href=\"https://www.youtube.com/embed/Itjs_QGwPaA\" target=\"_blank\">L&agrave;m lạnh tản nhiệt</a>&nbsp;với cấu tạo c&aacute;nh đảo gi&oacute; Skywing linh hoạt.</li>\r\n	<li>C&ocirc;ng nghệ&nbsp;<a href=\"https://www.youtube.com/embed/EArmg6xWxBs\" target=\"_blank\">Nanoe-X</a>&nbsp;khử m&ugrave;i&nbsp;kh&oacute; chịu, diệt khuẩn trong kh&ocirc;ng kh&iacute;.</li>\r\n	<li>C&ocirc;ng nghệ&nbsp;<a href=\"https://www.youtube.com/embed/YM56osOTbqo\" target=\"_blank\">Nanoe-G</a>&nbsp;- lọc kh&ocirc;ng kh&iacute; trong l&agrave;nh, sạch bụi bẩn, bụi mịn PM2.5.</li>\r\n	<li>C&ocirc;ng nghệ&nbsp;<a href=\"https://www.youtube.com/embed/ZGZBeotjPYw\" target=\"_blank\">P-TECh</a>&nbsp;l&agrave;m lạnh mạnh mẽ v&agrave; nhanh ch&oacute;ng.</li>\r\n	<li>C&ocirc;ng nghệ&nbsp;<a href=\"https://www.youtube.com/embed/mbx8BfqsaKU\" target=\"_blank\">Dust Sensor</a>&nbsp;- cảm biến h&agrave;m lượng bụi trong kh&ocirc;ng kh&iacute;.</li>\r\n	<li>Sử dụng hệ thống lọc kh&iacute; độc lập như một chiếc m&aacute;y lọc kh&ocirc;ng kh&iacute;.</li>\r\n	<li>Chế độ ngủ đ&ecirc;m - Tự điều ch&igrave;nh nhiệt độ ph&ugrave; hợp với th&acirc;n nhiệt v&agrave; m&ocirc;i trường.</li>\r\n	<li><a href=\"https://cdn.tgdd.vn/Products/Images/2002/153819/Slider/vi-vn-panasonic-cu-cs-vu12ukh-8-18db.jpg\" target=\"_blank\">Vận h&agrave;nh si&ecirc;u &ecirc;m</a>&nbsp;với độ ồn chỉ ở mức 18dB.</li>\r\n</ol>', '<p>M&aacute;y lạnh Panasonic Inverter 1.5 HP CU/CS-VU12UKH-8</p>', '19890000', 'maylanh279.jpg', 1, NULL, NULL),
(9, 4, 2, 'Máy lạnh Samsung Inverter 1 HP', '<p>Đặc điểm nổi bật</p>\r\n\r\n<ol>\r\n	<li>Tiết kiệm điện, l&agrave;m lạnh nhanh nhờ động cơ&nbsp;<a href=\"https://www.youtube.com/embed/u3JtinaLEBo\" target=\"_blank\">Digital Inverter</a>&nbsp;v&agrave; chế độ Eco.</li>\r\n	<li>Vệ sinh dễ d&agrave;ng với lưới lọc bụi bẩn&nbsp;Easy Filter.</li>\r\n	<li>Loại bỏ vi khuẩn, m&ugrave;i h&ocirc;i bởi m&agrave;ng lọc kh&aacute;ng khuẩn Ag+.</li>\r\n	<li>Hơi lạnh lan toả đều v&agrave; xa với tự động đảo gi&oacute; 4 hướng.</li>\r\n	<li>Mang lại kh&ocirc;ng gian tho&aacute;ng đ&atilde;ng, thoải m&aacute;i những ng&agrave;y ẩm ướt với chế độ h&uacute;t ẩm.</li>\r\n	<li>Độ bền cao, vận h&agrave;nh hiệu quả nhờ chức năng tự l&agrave;m sạch.</li>\r\n	<li>Tiện lợi c&ugrave;ng chế độ tự khởi động lại khi c&oacute; điện.</li>\r\n</ol>', '<p>M&aacute;y lạnh Samsung Inverter 1 HP AR10TYHYCWKNSV</p>', '9090000', 'maylanh369.jpg', 1, NULL, NULL),
(10, 2, 3, 'Tủ lạnh Toshiba Inverter 180 lít', '<p>Đặc điểm nổi bật</p>\r\n\r\n<ol>\r\n	<li>Tiết kiệm điện, tủ &ecirc;m &aacute;i với c&ocirc;ng nghệ biến tần Inverter.</li>\r\n	<li>L&agrave;m lạnh thực phẩm to&agrave;n diện nhờ hệ thống kh&iacute; lạnh v&ograve;ng cung.</li>\r\n	<li>Diệt khuẩn v&agrave; khử m&ugrave;i hiệu quả nhờ c&ocirc;ng nghệ Ag+ Bio.</li>\r\n	<li>Bảo quản thịt c&aacute; tươi ngon, ăn trong ng&agrave;y kh&ocirc;ng cần r&atilde; đ&ocirc;ng với ngăn đ&ocirc;ng mềm -1 độ Ultra Cooling Zone.</li>\r\n	<li>Cửa tủ phủ sơn b&oacute;ng s&aacute;ng đẹp</li>\r\n</ol>', '<p>Tủ lạnh Toshiba Inverter 180 l&iacute;t GR-B22VU UKG</p>', '5690000', 'tulanhtsb173.jpg', 1, NULL, NULL),
(11, 2, 3, 'Tủ lạnh Toshiba Inverter 409 lít', '<p>Đặc điểm nổi bật</p>\r\n\r\n<ol>\r\n	<li>Tủ lạnh Inverter&nbsp;vận h&agrave;nh &ecirc;m &aacute;i, bền bỉ, cho khả năng l&agrave;m lạnh ổn định nhưng vẫn tiết kiệm năng lượng.</li>\r\n	<li>N&acirc;ng cao hiệu quả tiết kiệm điện với chế độ Eco.</li>\r\n	<li>C&ocirc;ng nghệ&nbsp;luồng kh&iacute; lạnh v&ograve;ng cung&nbsp;mang hơi lạnh tỏa ra đều khắp mọi ng&oacute;c ng&aacute;ch b&ecirc;n trong&nbsp;tủ lạnh.</li>\r\n	<li>Khử sạch m&ugrave;i h&ocirc;i v&agrave; vi khuẩn g&acirc;y hại với c&ocirc;ng nghệ Led Hybrid.</li>\r\n	<li>L&agrave;m lạnh nhanh thức uống, tr&aacute;i c&acirc;y hoặc thực phẩm tươi sống với&nbsp;ngăn l&agrave;m lạnh k&eacute;p Dual Cooling Zone.</li>\r\n	<li>Ngăn rau quả giữ ẩm&nbsp;gi&uacute;p cung cấp hơi ẩm th&iacute;ch hợp cho rau củ kh&ocirc;ng bị kh&ocirc; h&eacute;o v&agrave; lu&ocirc;n được mọng nước.</li>\r\n</ol>', '<p>Tủ lạnh Toshiba Inverter 409 l&iacute;t GR-AG46VPDZ XK1</p>', '14190000', 'tulanhtsb28.jpg', 1, NULL, NULL),
(12, 2, 1, 'Tủ lạnh Panasonic Inverter 255 lít', '<p>Đặc điểm nổi bật</p>\r\n\r\n<ol>\r\n	<li>Bảo quản thực phẩm kh&ocirc;ng cần r&atilde; đ&ocirc;ng khi sử dụng ngăn cấp đ&ocirc;ng mềm thế hệ mới Prime Fresh+.</li>\r\n	<li>Tiết kiệm điện tối đa với bộ 3 c&ocirc;ng nghệ Inverter, Multi Control v&agrave; cảm biến Econavi.</li>\r\n	<li>Ngăn chặn vi khuẩn, m&ugrave;i h&ocirc;i kh&oacute; chịu với c&ocirc;ng nghệ kh&aacute;ng khuẩn Ag Clean.</li>\r\n	<li>Hơi lạnh tỏa đều mọi vị tr&iacute; trong tủ th&ocirc;ng qua c&ocirc;ng nghệ l&agrave;m lạnh Panorama.</li>\r\n</ol>', '<p>Tủ lạnh Panasonic Inverter 255 l&iacute;t NR-BV280QSVN</p>', '11490000', 'tulanhpa10.jpg', 1, NULL, NULL),
(13, 2, 2, 'Tủ lạnh Samsung Inverter 236 lít', '<p>Đặc điểm nổi bật</p>\r\n\r\n<ol>\r\n	<li>Giữ thịt c&aacute; tươi ngon, ăn trong ng&agrave;y kh&ocirc;ng cần r&atilde; đ&ocirc;ng với ngăn đ&ocirc;ng mềm -1 độ C Optimal Fresh Zone.</li>\r\n	<li>Tiết kiệm điện năng, vận h&agrave;nh &ecirc;m &aacute;i với c&ocirc;ng nghệ&nbsp;<a href=\"https://www.youtube.com/embed/2w6kaM9cDIk\" target=\"_blank\">Digital Inverter</a>&nbsp;hiện đại.</li>\r\n	<li>Rau củ lu&ocirc;n tươi ngon, mọng nước với ngăn rau củ giữ ẩm Big box.</li>\r\n	<li>Hơi lạnh lan tỏa đều khắp tủ với c&ocirc;ng nghệ l&agrave;m lạnh v&ograve;m.</li>\r\n	<li>Kh&aacute;ng khuẩn, khử m&ugrave;i h&ocirc;i hiệu quả với bộ lọc than hoạt t&iacute;nh Deodorizer.</li>\r\n</ol>', '<p>Tủ lạnh Samsung Inverter 236 l&iacute;t RT22M4032BY/SV</p>', '6890000', 'tulanhss148.jpg', 1, NULL, NULL),
(14, 3, 3, 'Máy giặt Toshiba Inverter 8.5 Kg', '<p>Đặc điểm nổi bật</p>\r\n\r\n<ol>\r\n	<li>Great Waves t&iacute;ch hợp 3 c&ocirc;ng nghệ ti&ecirc;n tiến: Flush Waves tạo s&oacute;ng mạnh mẽ đ&aacute;nh bật vết bẩn, chế độ giặt Color Care giảm 39% độ phai m&agrave;u, c&ocirc;ng nghệ Real Inverter tiết kiệm điện, vận h&agrave;nh &ecirc;m, bền bỉ.</li>\r\n	<li>Giặt nhanh 15 ph&uacute;t - Giải ph&aacute;p ho&agrave;n hảo cho cuộc sống bận rộn.</li>\r\n	<li>T&iacute;nh năng&nbsp;vệ sinh lồng giặt&nbsp;tự động, tiết kiệm thời gian v&agrave; chi ph&iacute;.</li>\r\n	<li>T&ugrave;y chỉnh nhiệt độ nước 20~90 độ C.</li>\r\n	<li>Tiện lợi hơn với t&iacute;nh năng tự khởi động lại khi c&oacute; điện.</li>\r\n</ol>\r\n\r\n<ol>\r\n</ol>', '<p>M&aacute;y giặt Toshiba Inverter 8.5 Kg TW-BH95S2V WK</p>', '7990000', 'maygiattsb182.jpg', 1, NULL, NULL),
(15, 3, 1, 'Máy giặt Panasonic 9 kg', '<p>Đặc điểm nổi bật</p>\r\n\r\n<ol>\r\n	<li>Hệ thống Active Foam - thẩm thấu cực nhanh tr&ecirc;n quần &aacute;o, gi&uacute;p đ&aacute;nh bật ho&agrave;n to&agrave;n c&aacute;c vết bẩn cứng đầu.</li>\r\n	<li>Nh&agrave;o trộn, giặt sạch mạnh mẽ với luồng nước Dancing.</li>\r\n	<li>Chế độ sấy gi&oacute; 90 ph&uacute;t - tiết kiệm thời gian phơi quần &aacute;o.</li>\r\n	<li>Sử dụng tốt ngay cả những khu vực c&oacute; &aacute;p lực nước yếu.</li>\r\n	<li>Lồng giặt Sazanami bảo vệ quần &aacute;o khỏi hư tổn khi ma s&aacute;t trong qu&aacute; tr&igrave;nh giặt.</li>\r\n	<li>T&iacute;nh năng vệ sinh lồng giặt - gi&uacute;p loại bỏ c&aacute;c cặn b&atilde; t&iacute;ch tụ trong lồng giặt.</li>\r\n	<li>Bảng điều kiển ph&iacute;a sau hiện đại, tiện lợi lấy quần &aacute;o ra v&agrave;o.</li>\r\n</ol>', '<p>M&aacute;y giặt Panasonic 9 kg NA-F90A4GRV</p>', '7190000', 'maygiatpa140.jpg', 1, NULL, NULL),
(16, 3, 2, 'Máy giặt Samsung Inverter 9 kg', '<p>Đặc điểm nổi bật</p>\r\n\r\n<ol>\r\n	<li>C&ocirc;ng nghệ Digital Inverter gi&uacute;p tiết kiệm điện, giặt &ecirc;m v&agrave; sạch.</li>\r\n	<li>C&ocirc;ng nghệ giặt hơi nước gi&uacute;p diệt khuẩn, giảm nhăn quần &aacute;o.</li>\r\n	<li>C&ocirc;ng nghệ&nbsp;<a href=\"https://www.youtube.com/embed/DF_v9EnO6EU\" target=\"_blank\">Eco Bubble</a>&nbsp;ho&agrave; tan hiệu quả, hạn chế cặn bột giặt b&aacute;m v&agrave;o quần &aacute;o.</li>\r\n	<li>Lồng giặt kim cương bảo vệ sợi vải bền đẹp.</li>\r\n</ol>', '<p>M&aacute;y giặt Samsung Inverter 9 kg WW90J54E0BW/SV</p>', '8990000', 'maygiatss154.jpg', 1, NULL, NULL),
(17, 4, 4, 'Máy lạnh LG Inverter 1 HP V10ENH', '<p>Đặc điểm nổi bật</p>\r\n\r\n<ol>\r\n	<li><a href=\"https://www.youtube.com/embed/ecw_hL24RAQ\" target=\"_blank\">C&ocirc;ng nghệ Dual Inverter</a>&nbsp;n&acirc;ng cao hiệu quả tiết kiệm điện l&ecirc;n đến 70%.</li>\r\n	<li>L&agrave;m lạnh nhanh ch&oacute;ng chỉ trong 3 ph&uacute;t đồng hồ với&nbsp;c&ocirc;ng nghệ&nbsp;<a href=\"https://www.youtube.com/embed/BnY6he7UAHI\" target=\"_blank\">Jet Cool</a>.</li>\r\n	<li>Chế độ thổi gi&oacute; dễ chịu&nbsp;<a href=\"https://www.youtube.com/embed/o809kE9kLKU\" target=\"_blank\">Comfort Air</a>&nbsp;mang lại hơi lạnh &ecirc;m dịu, kh&ocirc;ng lo bị cảm lạnh.</li>\r\n	<li>T&iacute;nh năng tự động l&agrave;m sạch gi&uacute;p m&aacute;y lạnh lu&ocirc;n kh&ocirc; tho&aacute;ng, sạch sẽ.</li>\r\n	<li>Chế độ ngủ đ&ecirc;m - Tự điều ch&igrave;nh nhiệt độ ph&ugrave; hợp với th&acirc;n nhiệt v&agrave; m&ocirc;i trường.</li>\r\n	<li>T&iacute;nh năng tự khởi động lại khi c&oacute; điện - Ghi nhớ c&aacute;c chế độ hiện c&oacute;, kh&ocirc;ng cần c&agrave;i đặt lại.</li>\r\n	<li>Gas R32&nbsp;- an to&agrave;n, th&acirc;n thiện với m&ocirc;i trường.</li>\r\n</ol>', '<h3>Thiết kế nhỏ gọn, kh&ocirc;ng chiếm nhiều kh&ocirc;ng gian diện t&iacute;ch</h3>\r\n\r\n<p><a href=\"https://www.dienmayxanh.com/may-lanh/lg-v10enh\" target=\"_blank\">M&aacute;y lạnh LG Inverter 1 HP V10ENH</a>&nbsp;c&oacute; thiết kế đơn giản, nhỏ gọn sẽ kh&ocirc;ng chiếm nhiều kh&ocirc;ng gian diện t&iacute;ch của gia đ&igrave;nh bạn. Kết hợp với sắc trắng trung t&iacute;nh, m&aacute;y lạnh c&oacute; thể lắp đặt ở bất k&igrave; khu vực n&agrave;o trong gia đ&igrave;nh.</p>\r\n\r\n<p>Nếu bạn c&oacute; nhu cầu lắp m&aacute;y lạnh cho ph&ograve;ng c&oacute; diện t&iacute;ch dưới 15 m2 th&igrave; chiếc&nbsp;<a href=\"https://www.dienmayxanh.com/may-lanh-lg?g=1-hp\" target=\"_blank\">m&aacute;y lạnh LG 1 HP</a>&nbsp;n&agrave;y ch&iacute;nh l&agrave; một sự lựa chọn v&ocirc; c&ugrave;ng l&yacute; tưởng.</p>', '9090000', 'may-lanh-lg-v10enh-1-550x16037.jpg', 1, NULL, NULL),
(18, 4, 3, 'Máy lạnh Toshiba Inverter 1 HP RAS-H10D2KCVG-V', '<p>Đặc điểm nổi bật</p>\r\n\r\n<ol>\r\n	<li>Tiết kiệm điện năng, l&agrave;m lạnh hiệu quả với c&ocirc;ng nghệ&nbsp;<a href=\"https://www.youtube.com/embed/b_j_HxA_AGs\" target=\"_blank\">Hybrid Inverter.</a></li>\r\n	<li>Tối ưu tiết giảm điện năng ti&ecirc;u thụ với t&iacute;nh năng Eco.</li>\r\n	<li>Kh&ocirc;ng kh&iacute; trong l&agrave;nh v&agrave; giảm chi ph&iacute; bảo tr&igrave; với c&ocirc;ng nghệ chống b&aacute;m bẩn&nbsp;<a href=\"https://www.youtube.com/embed/OfzEEKa6lBk\" target=\"_blank\">Magic Coil</a>.</li>\r\n	<li>Tạo bầu kh&ocirc;ng kh&iacute; trong l&agrave;nh với bộ lọc&nbsp;<a href=\"https://www.youtube.com/embed/y0mitwbur2Q\" target=\"_blank\">Toshiba IAQ</a>.</li>\r\n	<li>L&agrave;m lạnh nhanh ch&oacute;ng với chế độ&nbsp;<a href=\"https://cdn.tgdd.vn/Products/Images/2002/92135/Slider/vi-vn-lam-lanh-nhanh.jpg\" target=\"_blank\">Hi Power</a>.</li>\r\n	<li>Hơi lạnh lan toả xa v&agrave; đều với&nbsp;<a href=\"https://www.youtube.com/embed/b4rhAv0fxCU\" target=\"_blank\">c&aacute;nh quạt xi&ecirc;n</a>&nbsp;v&agrave;&nbsp;<a href=\"https://www.youtube.com/embed/4ewr-M3Ruo8\" target=\"_blank\">cửa đảo gi&oacute; mở rộng 72 độ</a>.</li>\r\n	<li>L&agrave;m lạnh nhanh hơn với&nbsp;<a href=\"https://www.youtube.com/embed/51AgibiByzE\" target=\"_blank\">mật độ ống đồng tăng 25%</a>.</li>\r\n	<li>Tiện lợi với chế độ tự khởi động lại khi c&oacute; điện.</li>\r\n</ol>', '<h3>Thiết kế nhỏ gọn, trang nh&atilde;</h3>\r\n\r\n<p><a href=\"https://www.dienmayxanh.com/may-lanh/toshiba-ras-h10d2kcvg-v\" target=\"_blank\">M&aacute;y lạnh Toshiba Inverter 1 HP RAS-H10D2KCVG-V</a>&nbsp;với kiểu d&aacute;ng nhỏ gọn c&ugrave;ng t&ocirc;ng m&agrave;u s&aacute;ng trắng trang nh&atilde;, dễ d&agrave;ng lắp đặt trong căn nh&agrave; của bạn.<a href=\"https://www.dienmayxanh.com/may-lanh?g=1-hp\" target=\"_blank\">M&aacute;y lạnh c&ocirc;ng suất 1 HP</a>&nbsp;ph&ugrave; hợp cho những kh&ocirc;ng gian ph&ograve;ng ngủ hoặc ph&ograve;ng kh&aacute;ch&nbsp;c&oacute; diện t&iacute;ch nhỏ hơn 15m2.</p>', '9490000', 'toshiba-ras-h10d2kcvg-v-2-550x16044.jpg', 1, NULL, NULL),
(19, 3, 2, 'Máy giặt Samsung Inverter 9.5 kg WW95J42G0BX/SV', '<p>Đặc điểm nổi bật</p>\r\n\r\n<ol>\r\n	<li>Tiết kiệm năng lượng, vận h&agrave;nh &ecirc;m &aacute;i với c&ocirc;ng nghệ Digital Inverter.</li>\r\n	<li>Diệt vi khuẩn, t&aacute;c nh&acirc;n dị ứng, giảm nhăn quần &aacute;o với chế độ giặt hơi nước Steam.</li>\r\n	<li>Bảo vệ sợi vải với lồng giặt kim cương th&eacute;p kh&ocirc;ng gỉ.</li>\r\n	<li>Tốc độ quay vắt 1200 v&ograve;ng/ ph&uacute;t gi&uacute;p quần &aacute;o kh&ocirc; nhanh.</li>\r\n	<li>Chế độ tự động vệ sinh lồng giặt Eco Drum Clean.</li>\r\n	<li>Chẩn đo&aacute;n sự cố th&ocirc;ng minh qua ứng dụng điện thoại Smart Check.</li>\r\n</ol>', '<h3>Thiết kế sang trọng, hiện đại với m&agrave;u x&aacute;m thời thượng</h3>\r\n\r\n<p><a href=\"https://www.dienmayxanh.com/may-giat/samsung-ww95j42g0bx-sv\" target=\"_blank\">M&aacute;y giặt Samsung Inverter 9.5kg&nbsp;WW95J42G0BX/SV</a>&nbsp;c&oacute; thiết kế cửa trước hiện đại với m&agrave;u x&aacute;m thời thượng tạo điểm nhấn cho kh&ocirc;ng gian nội thất của bạn. Cửa k&iacute;nh chịu lực trong suốt v&agrave; tay cầm thiết kế ở vị tr&iacute; 45 độ gi&uacute;p người d&ugrave;ng thao t&aacute;c đ&oacute;ng mở dễ d&agrave;ng.</p>', '9770000', 'samsung-ww95j42g0bx-sv-300x3005.jpg', 1, NULL, NULL),
(20, 3, 4, 'Máy giặt LG Inverter 8.5 kg FV1408S4W', '<p>Đặc điểm nổi bật</p>\r\n\r\n<ol>\r\n	<li>Vận h&agrave;nh &ecirc;m, giảm thiểu hư tổn sợi vải nhờ c&ocirc;ng nghệ 6 chuyển động DD kết hợp tr&iacute; th&ocirc;ng minh nh&acirc;n tạo AI.</li>\r\n	<li>Tiết kiệm điện hiệu quả với c&ocirc;ng nghệ Inverter.</li>\r\n	<li>Diệt vi khuẩn, loại bỏ c&aacute;c t&aacute;c nh&acirc;n g&acirc;y dị ứng với c&ocirc;ng nghệ giặt hơi nước Steam.</li>\r\n	<li>Chuẩn đo&aacute;n v&agrave; xử l&yacute; nhanh c&aacute;c lỗi m&aacute;y giặt nhờ tiện &iacute;ch th&ocirc;ng minh Smart ThinQ.</li>\r\n	<li>Tiện lợi khi th&ecirc;m đồ giặt trong qu&aacute; tr&igrave;nh giặt.</li>\r\n</ol>', '<h3>Thiết kế tinh tế v&agrave; hiện&nbsp;đại</h3>\r\n\r\n<p>Với khối lượng giặt đến 8.5 Kg nhưng tổng thể&nbsp;<a href=\"https://www.dienmayxanh.com/may-giat\" target=\"_blank\">m&aacute;y giặt</a>&nbsp;vẫn v&ocirc; c&ugrave;ng nhỏ gọn. C&ugrave;ng với m&agrave;u trắng thanh tho&aacute;t, sẽ gi&uacute;p ng&ocirc;i nh&agrave; của bạn tr&ocirc;ng hiện đại hơn.</p>', '9490000', 'may-giat-lg-inverter-85-kg-fv1408s4w-8-300x30031.jpg', 1, NULL, NULL),
(21, 3, 3, 'Máy giặt Toshiba 10 Kg AW-H1100GV SM', '<p>Đặc điểm nổi bật</p>\r\n\r\n<ol>\r\n	<li>C&ocirc;ng nghệ giặt c&ocirc; đặc bằng bọt kh&iacute; gi&uacute;p tẩy sạch mọi vết bẩn.</li>\r\n	<li>Lồng giặt ng&ocirc;i sao pha l&ecirc; gi&uacute;p giặt sạch quần &aacute;o nhẹ nh&agrave;ng hơn.</li>\r\n	<li>M&acirc;m giặt Hybrid Powerful đảo đều đồ giặt nhanh ch&oacute;ng, giặt sạch hơn.</li>\r\n	<li>Hiệu ứng th&aacute;c nước đ&ocirc;i n&acirc;ng hiệu quả giặt sạch.</li>\r\n	<li>T&iacute;nh năng lưu giữ hương thơm Fragrance Course gi&uacute;p quần &aacute;o thơm tho v&agrave; mềm mại hơn.</li>\r\n	<li>Hộp lọc xơ vải tiện lợi v&agrave; th&aacute;o lắp dễ d&agrave;ng.</li>\r\n</ol>', '<h3>Thiết kế đơn giản thanh lịch</h3>\r\n\r\n<p><a href=\"https://www.dienmayxanh.com/may-giat/toshiba-aw-h1100gv-sm\" target=\"_blank\">M&aacute;y giặt Toshiba 10 Kg AW-H1100GV SM</a>&nbsp;với thiết kế đơn giản kết hợp t&ocirc;ng m&agrave;u đen của kim loại huyền b&iacute; tạo sự thanh lịch v&agrave; mang lại cảm gi&aacute;c mạnh mẽ, bền bỉ.</p>', '7090000', 'may-giat-toshiba-aw-h1100gv-sm-300x30041.jpg', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_rating`
--

CREATE TABLE `tbl_rating` (
  `rating_id` int(10) UNSIGNED NOT NULL,
  `product_id` int(11) NOT NULL,
  `rating` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_rating`
--

INSERT INTO `tbl_rating` (`rating_id`, `product_id`, `rating`, `created_at`, `updated_at`) VALUES
(1, 13, 3, NULL, NULL),
(2, 13, 3, NULL, NULL),
(3, 13, 2, NULL, NULL),
(4, 13, 4, NULL, NULL),
(5, 13, 2, NULL, NULL),
(6, 13, 5, NULL, NULL),
(7, 13, 4, NULL, NULL),
(8, 13, 1, NULL, NULL),
(9, 16, 5, NULL, NULL),
(10, 13, 5, NULL, NULL),
(11, 11, 5, NULL, NULL),
(12, 11, 4, NULL, NULL),
(13, 20, 4, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_shipping`
--

CREATE TABLE `tbl_shipping` (
  `shipping_id` int(10) UNSIGNED NOT NULL,
  `shipping_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `shipping_email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `shipping_address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `shipping_phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `shipping_note` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `shipping_method` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_shipping`
--

INSERT INTO `tbl_shipping` (`shipping_id`, `shipping_name`, `shipping_email`, `shipping_address`, `shipping_phone`, `shipping_note`, `shipping_method`, `created_at`, `updated_at`) VALUES
(9, 'Linh Linh', 'linh@gmail.com', 'KTX B trường ĐHCT', '0374408793', 'lll', 2, NULL, NULL),
(10, 'Linh Linh', 'linh@gmail.com', 'KTX B trường ĐHCT', '0374408793', 'hiuhuuh', 2, NULL, NULL),
(11, 'Linh Linh', 'linh@gmail.com', 'KTX B trường ĐHCT', '0374408793', '10101', 2, NULL, NULL),
(16, 'Linh Linh', 'linh@gmail.com', 'KTX B trường ĐHCT', '0374408793', '123', 2, NULL, NULL),
(17, 'Linh Linh', 'huyrua12a1@gmail.com', 'KTX B trường ĐHCT', '0374408793', '111', 2, NULL, NULL),
(18, 'Linh Linh', 'linh@gmail.com', 'KTX B trường ĐHCT', '0374408793', '00', 2, NULL, NULL),
(19, 'Linh Linh', 'linh@gmail.com', 'KTX B trường ĐHCT', '0374408793', '1111', 2, NULL, NULL),
(20, 'Linh Linh', 'linh@gmail.com', 'KTX B trường ĐHCT', '0374408793', 'hihiiiii', 1, NULL, NULL),
(21, 'Linh Linh', 'linh@gmail.com', 'KTX B trường ĐHCT', '0374408793', '21312', 2, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_slider`
--

CREATE TABLE `tbl_slider` (
  `slider_id` int(11) NOT NULL,
  `slider_name` varchar(100) NOT NULL,
  `slider_image` varchar(100) NOT NULL,
  `slider_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_slider`
--

INSERT INTO `tbl_slider` (`slider_id`, `slider_name`, `slider_image`, `slider_status`) VALUES
(3, 'slider2', 'slider141.png', 1),
(4, 'slider1', 'slider235.png', 1),
(6, 'slider3', 'slider37.png', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_statistical`
--

CREATE TABLE `tbl_statistical` (
  `id_statistical` int(11) NOT NULL,
  `order_date` varchar(100) NOT NULL,
  `sales` varchar(200) NOT NULL,
  `quantity` int(11) NOT NULL,
  `total_order` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_statistical`
--

INSERT INTO `tbl_statistical` (`id_statistical`, `order_date`, `sales`, `quantity`, `total_order`) VALUES
(78, '2020-11-09', '28180000', 2, 1),
(80, '2020-12-09', '148480000', 12, 5),
(81, '2020-12-08', '18380000', 2, 1),
(82, '2020-12-20', '0', 0, 0),
(83, '2020-12-21', '25680000', 2, 1),
(84, '2020-12-24', '0', 0, 0),
(85, '2020-12-25', '6890000', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_brand`
--
ALTER TABLE `tbl_brand`
  ADD PRIMARY KEY (`brand_id`);

--
-- Indexes for table `tbl_category`
--
ALTER TABLE `tbl_category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `tbl_comment`
--
ALTER TABLE `tbl_comment`
  ADD PRIMARY KEY (`comment_id`);

--
-- Indexes for table `tbl_customer`
--
ALTER TABLE `tbl_customer`
  ADD PRIMARY KEY (`customer_id`);

--
-- Indexes for table `tbl_order`
--
ALTER TABLE `tbl_order`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `foreign_key_tb_customer` (`customer_id`),
  ADD KEY `foreign_key_tb_shipping` (`shipping_id`);

--
-- Indexes for table `tbl_order_details`
--
ALTER TABLE `tbl_order_details`
  ADD PRIMARY KEY (`order_details_id`),
  ADD KEY `foreign_key_tb_product` (`product_id`),
  ADD KEY `foreign_key_tb_order` (`order_id`);

--
-- Indexes for table `tbl_product`
--
ALTER TABLE `tbl_product`
  ADD PRIMARY KEY (`product_id`),
  ADD KEY `foreign_key_tb_brand` (`brand_id`),
  ADD KEY `foreign_key_tb_category` (`category_id`);

--
-- Indexes for table `tbl_rating`
--
ALTER TABLE `tbl_rating`
  ADD PRIMARY KEY (`rating_id`);

--
-- Indexes for table `tbl_shipping`
--
ALTER TABLE `tbl_shipping`
  ADD PRIMARY KEY (`shipping_id`);

--
-- Indexes for table `tbl_slider`
--
ALTER TABLE `tbl_slider`
  ADD PRIMARY KEY (`slider_id`);

--
-- Indexes for table `tbl_statistical`
--
ALTER TABLE `tbl_statistical`
  ADD PRIMARY KEY (`id_statistical`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_brand`
--
ALTER TABLE `tbl_brand`
  MODIFY `brand_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_category`
--
ALTER TABLE `tbl_category`
  MODIFY `category_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_comment`
--
ALTER TABLE `tbl_comment`
  MODIFY `comment_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `tbl_customer`
--
ALTER TABLE `tbl_customer`
  MODIFY `customer_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_order`
--
ALTER TABLE `tbl_order`
  MODIFY `order_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `tbl_order_details`
--
ALTER TABLE `tbl_order_details`
  MODIFY `order_details_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `tbl_product`
--
ALTER TABLE `tbl_product`
  MODIFY `product_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `tbl_rating`
--
ALTER TABLE `tbl_rating`
  MODIFY `rating_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `tbl_shipping`
--
ALTER TABLE `tbl_shipping`
  MODIFY `shipping_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `tbl_slider`
--
ALTER TABLE `tbl_slider`
  MODIFY `slider_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_statistical`
--
ALTER TABLE `tbl_statistical`
  MODIFY `id_statistical` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=86;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_order`
--
ALTER TABLE `tbl_order`
  ADD CONSTRAINT `foreign_key_tb_customer` FOREIGN KEY (`customer_id`) REFERENCES `tbl_customer` (`customer_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `foreign_key_tb_shipping` FOREIGN KEY (`shipping_id`) REFERENCES `tbl_shipping` (`shipping_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_order_details`
--
ALTER TABLE `tbl_order_details`
  ADD CONSTRAINT `foreign_key_tb_order` FOREIGN KEY (`order_id`) REFERENCES `tbl_order` (`order_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `foreign_key_tb_product` FOREIGN KEY (`product_id`) REFERENCES `tbl_product` (`product_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_product`
--
ALTER TABLE `tbl_product`
  ADD CONSTRAINT `foreign_key_tb_brand` FOREIGN KEY (`brand_id`) REFERENCES `tbl_brand` (`brand_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `foreign_key_tb_category` FOREIGN KEY (`category_id`) REFERENCES `tbl_category` (`category_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
