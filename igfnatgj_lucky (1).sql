-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Aug 07, 2024 at 05:21 PM
-- Server version: 10.6.18-MariaDB-cll-lve
-- PHP Version: 8.1.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `igfnatgj_lucky`
--

-- --------------------------------------------------------

--
-- Table structure for table `lucky_cau_hinh`
--

CREATE TABLE `lucky_cau_hinh` (
  `id` int(11) NOT NULL,
  `name` varchar(200) DEFAULT NULL,
  `content` varchar(200) DEFAULT NULL,
  `type` varchar(100) DEFAULT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `ghi_chu` longtext DEFAULT NULL,
  `image` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `lucky_cau_hinh`
--

INSERT INTO `lucky_cau_hinh` (`id`, `name`, `content`, `type`, `parent_id`, `ghi_chu`, `image`) VALUES
(16, 'Server', NULL, NULL, NULL, 'https://trongtre.top', NULL),
(42, 'Bật tắt âm thanh', '0', NULL, NULL, NULL, NULL),
(43, 'Guidelines', '', NULL, NULL, '<p class=\"text-justify\" style=\"line-height: 19px; color: rgb(33, 37, 41); font-family: Georama, sans-serif; background-color: rgba(255, 255, 255, 0.4);\">Lorem Ipsum&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of</p><p class=\"text-justify\" style=\"line-height: 19px; color: rgb(33, 37, 41); font-family: Georama, sans-serif; background-color: rgba(255, 255, 255, 0.4);\"><img src=\"https://lucky.khanhdv.asia/assets/lucky/img/guidelines.png\" alt=\"\" class=\"img-fluid\" style=\"text-align: start;\"><span style=\"text-align: start;\"></span></p><p class=\"text-justify mt-3\" style=\"line-height: 19px; color: rgb(33, 37, 41); font-family: Georama, sans-serif; background-color: rgba(255, 255, 255, 0.4);\">Lorem Ipsum&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of</p>', NULL),
(44, NULL, NULL, NULL, NULL, NULL, '/assets/lucky/img/2024/07/25/_j7TAQqwEn7CDdgXBhanY8Ekff6ihP20M.png');

-- --------------------------------------------------------

--
-- Table structure for table `lucky_chuc_nang`
--

CREATE TABLE `lucky_chuc_nang` (
  `id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `nhom` varchar(100) DEFAULT NULL,
  `controller_action` varchar(100) DEFAULT NULL,
  `ghi_chu` longtext DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `lucky_chuc_nang`
--

INSERT INTO `lucky_chuc_nang` (`id`, `name`, `nhom`, `controller_action`, `ghi_chu`) VALUES
(126, 'Quản lý đơn dịch vụ', 'Quản lý đơn dịch vụ', 'DonDichVu;Tao-don', 'Quyền tạo đơn mới'),
(127, 'Xem báo cáo đơn', 'Báo Cáo', 'BaoCao;Don-dich-vu', 'Quyền xem báo cáo của riêng các đơn của mình'),
(128, 'Giao việc', 'Quản lý đơn dịch vụ', 'DonDichVu;Dieu-giao-vien', 'Quyền Gán GV cho đơn'),
(129, 'Xem thông tin đơn', 'Quản lý đơn dịch vụ', 'DonDichVu;Chi-tiet', 'Quyền Xem thông tin đơn hàng'),
(130, 'Xem DS giáo viên', 'Giáo viên', 'GiaoVien;Danh-sach', 'Quyền quản lý danh sách giáo viên'),
(131, 'Xem tình trạng khóa học', 'Khóa học', 'DonDichVu;Tien-do-khoa-hoc', 'Quyền quản lý tình trạng khóa học'),
(132, 'Xem tình trạng đào tạo giáo viên', 'Đào tạo', 'DaoTao;Danh-sach-ket-qua-dao-tao', 'Quyền quản lý tình trạng đào tạo giáo viên'),
(133, 'Quản lý đào tạo GV', 'Đào tạo', 'DaoTao;Danh-sach', 'Quyền quản lý đào tạo giáo viên'),
(134, 'Quản lý giáo trình đào tạo GV', 'Đào tạo', 'DaoTao;Danh-sach-giao-trinh', 'Quyền quản lý giáo trình đào tạo giáo viên'),
(135, 'Quản lý chương trình học cho học sinh', 'Đào tạo', 'ChuongTrinhHoc;Danh-sach-chuong-trinh', 'Quyền quản lý chương trình học cho học sinh'),
(136, 'Quản lý giáo cụ', 'Giáo cụ', 'GiaoCu;Danh-sach', 'Quyền quản lý giáo cụ'),
(137, 'Xóa dịch vụ', 'Quản lý đơn dịch vụ', 'DichVu;Xoa-dich-vu', '');

-- --------------------------------------------------------

--
-- Table structure for table `lucky_daily_quest`
--

CREATE TABLE `lucky_daily_quest` (
  `id` int(11) NOT NULL,
  `title` text NOT NULL,
  `quantity_spin` int(11) NOT NULL DEFAULT 0,
  `min_total_money` decimal(10,0) DEFAULT 0,
  `min_total_spin` decimal(10,0) DEFAULT 0,
  `type` text DEFAULT NULL,
  `image` longtext DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `created` datetime DEFAULT current_timestamp(),
  `active` int(11) DEFAULT 1,
  `status` int(11) DEFAULT 1,
  `note` longtext DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `lucky_daily_quest`
--

INSERT INTO `lucky_daily_quest` (`id`, `title`, `quantity_spin`, `min_total_money`, `min_total_spin`, `type`, `image`, `user_id`, `created`, `active`, `status`, `note`) VALUES
(22, 'Top up Mytel (>= 2000 mmk)', 1, 2000, 0, 'recharge', '/assets/lucky/img/bid-1.png', 1, '2024-06-19 04:29:28', 1, 1, NULL),
(23, 'Cash in via bank( >= 10.000 mmk)', 1, 10000, 0, 'Cash in via bank', '/assets/lucky/img/cash.png', 1, '2024-06-19 04:35:37', 1, 1, NULL),
(24, 'Buy Aung Bar Lay Lottery', 1, 0, 0, 'Buy Aung Bar Lay Lottery', '/assets/lucky/img/lottery-1.png', 1, '2024-06-19 04:35:37', 1, 1, NULL),
(25, 'Bill electric', 1, 0, 0, NULL, '/assets/lucky/img/lottery-1.png', 1, '2024-06-19 04:35:37', 1, 1, NULL),
(26, 'Buy data pack ( >= 1000 mmk)', 1, 0, 0, NULL, '/assets/lucky/img/online-purchase-1.png', 1, '2024-06-19 04:35:37', 1, 1, NULL),
(27, 'Buy wheel (Buy 5 wheel)', 1, 0, 5, 'Buy wheel', '/assets/lucky/img/online-purchase-2.png', 1, '2024-06-19 04:35:37', 1, 1, NULL),
(28, 'Daily login', 1, 0, 0, 'Login', '/assets/lucky/img/enter.png', 1, '2024-06-19 04:35:37', 1, 1, NULL),
(31, 'Nhieu vu test', 0, 0, 0, NULL, 'upload-file/2024/06/26/_niOKWzR7FMdqtdHAZ5y5dm-Ni79qxAoc.png', 1, '2024-06-26 16:25:33', 0, 1, '12121'),
(32, 'Mote Pho', 0, 0, 0, NULL, '/assets/lucky/img/2024/08/06/_qforZW-RriuBC9fdX9O44YbMRVDOL1jI.png', 1, '2024-08-06 16:33:37', 1, 1, 'Give 100 %');

-- --------------------------------------------------------

--
-- Table structure for table `lucky_daily_quest_user`
--

CREATE TABLE `lucky_daily_quest_user` (
  `id` int(11) NOT NULL,
  `daily_quest_id` int(11) NOT NULL,
  `created` datetime DEFAULT current_timestamp(),
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `lucky_daily_quest_user`
--

INSERT INTO `lucky_daily_quest_user` (`id`, `daily_quest_id`, `created`, `user_id`) VALUES
(44, 22, '2024-07-08 17:27:46', 1),
(45, 23, '2024-07-08 17:27:47', 1),
(46, 24, '2024-07-08 17:27:48', 1),
(47, 25, '2024-07-08 17:27:49', 1),
(48, 22, '2024-07-17 15:01:08', 1),
(49, 23, '2024-07-17 15:01:09', 1),
(50, 24, '2024-07-17 15:01:15', 1),
(51, 25, '2024-07-17 15:01:16', 1),
(52, 26, '2024-07-17 15:01:18', 1),
(53, 27, '2024-07-17 15:01:19', 1),
(54, 28, '2024-07-17 15:01:20', 1),
(55, 22, '2024-07-27 10:27:22', 1),
(56, 23, '2024-07-27 10:27:23', 1),
(57, 24, '2024-07-27 10:27:24', 1),
(58, 25, '2024-07-27 10:27:25', 1),
(59, 26, '2024-07-27 10:27:26', 1),
(60, 27, '2024-07-27 10:27:27', 1),
(61, 28, '2024-07-27 10:27:28', 1),
(62, 24, '2024-08-01 16:16:36', 1),
(63, 25, '2024-08-01 16:16:38', 1),
(64, 26, '2024-08-01 16:16:41', 1),
(65, 27, '2024-08-01 16:16:42', 1),
(66, 28, '2024-08-01 16:16:44', 1),
(67, 22, '2024-08-01 16:18:58', 1),
(68, 23, '2024-08-01 16:18:59', 1),
(69, 26, '2024-08-02 00:03:49', 1),
(70, 22, '2024-08-05 14:47:49', 1),
(71, 23, '2024-08-05 14:47:50', 1),
(72, 24, '2024-08-05 14:47:51', 1),
(73, 25, '2024-08-05 14:47:53', 1),
(74, 26, '2024-08-05 14:47:55', 1),
(75, 27, '2024-08-05 14:47:56', 1),
(76, 28, '2024-08-05 14:47:59', 1);

-- --------------------------------------------------------

--
-- Table structure for table `lucky_danh_muc`
--

CREATE TABLE `lucky_danh_muc` (
  `id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `code` varchar(100) DEFAULT NULL,
  `type` enum('Dịch vụ','Loại tin tức','Chọn ca','Chọn khung giờ','Loại giáo viên','Ăn trưa','Thêm khung giờ','Thêm giờ','Hình thức thanh toán','Nhóm giáo viên','Độ tuổi','Phụ phí','Trạng thái đơn','Cấp độ','Phân loại học phần','Gói học','Thông báo','Chủ đề thông báo','Đánh giá','Trạng thái đơn phụ huynh','Trạng thái tiến độ khóa học','Trạng thái kết quả đào tạo','Trạng thái nhận lịch','Nạp tiền','Rút tiền','Trình độ','Trạng thái bàn giao','Loại dịch vụ','Giờ linh hoạt') DEFAULT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `active` int(11) NOT NULL DEFAULT 1,
  `image` text DEFAULT NULL,
  `ghi_chu` longtext DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `lucky_history`
--

CREATE TABLE `lucky_history` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `description` text DEFAULT NULL,
  `detail` text DEFAULT NULL,
  `history_ip` text NOT NULL,
  `device_name` text DEFAULT NULL,
  `created` datetime DEFAULT curdate(),
  `type` text DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `lucky_history`
--

INSERT INTO `lucky_history` (`id`, `description`, `detail`, `history_ip`, `device_name`, `created`, `type`, `user_id`) VALUES
(9490, 'dang khanh logging in', '{\"vai_tros\":null}', '1.54.210.123', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/126.0.0.0 Safari/537.36', '2024-06-27 00:00:00', 'login', 1),
(9491, 'dang khanh logging in', '{\"vai_tros\":null}', '116.97.203.253', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/126.0.0.0 Safari/537.36 Edg/126.0.0.0', '2024-07-02 00:00:00', 'login', 1),
(9492, 'dang khanh logging in', '{\"vai_tros\":null}', '205.169.39.21', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/117.0.5938.132 Safari/537.36', '2024-07-07 00:00:00', 'login', 1),
(9493, 'dang khanh logging in', '{\"vai_tros\":null}', '14.231.231.243', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/126.0.0.0 Safari/537.36 Edg/126.0.0.0', '2024-07-08 00:00:00', 'login', 1),
(9494, 'dang khanh logging in', '{\"vai_tros\":null}', '103.85.106.80', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/126.0.0.0 Safari/537.36', '2024-07-17 00:00:00', 'login', 1),
(9495, 'dang khanh logging in', '{\"vai_tros\":null}', '103.85.106.66', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:128.0) Gecko/20100101 Firefox/128.0', '2024-07-18 00:00:00', 'login', 1),
(9496, 'dang khanh logging in', '{\"vai_tros\":null}', '1.54.209.88', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/126.0.0.0 Safari/537.36', '2024-07-20 00:00:00', 'login', 1),
(9497, 'dang khanh logging in', '{\"vai_tros\":null}', '1.54.209.88', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/126.0.0.0 Safari/537.36', '2024-07-22 00:00:00', 'login', 1),
(9498, 'dang khanh logging in', '{\"vai_tros\":null}', '1.54.209.88', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/126.0.0.0 Safari/537.36', '2024-07-25 00:00:00', 'login', 1),
(9499, 'dang khanh logging in', '{\"vai_tros\":null}', '65.18.124.69', 'Mozilla/5.0 (iPhone; CPU iPhone OS 17_5_1 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/17.5 Mobile/15E148 Safari/604.1', '2024-07-27 00:00:00', 'login', 1),
(9500, 'dang khanh logging in', '{\"vai_tros\":null}', '152.42.244.38', 'Mozilla/5.0 (iPhone; CPU iPhone OS 17_5_1 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/17.5 Mobile/15E148 Safari/604.1', '2024-07-28 00:00:00', 'login', 1),
(9501, 'dang khanh logging in', '{\"vai_tros\":null}', '113.23.48.137', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/127.0.0.0 Safari/537.36', '2024-08-01 00:00:00', 'login', 1),
(9502, 'dang khanh logging in', '{\"vai_tros\":null}', '113.23.48.66', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/127.0.0.0 Safari/537.36', '2024-08-02 00:00:00', 'login', 1),
(9503, 'dang khanh logging in', '{\"vai_tros\":null}', '113.23.48.45', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/127.0.0.0 Safari/537.36', '2024-08-03 00:00:00', 'login', 1),
(9504, 'dang khanh logging in', '{\"vai_tros\":null}', '113.23.48.45', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/127.0.0.0 Safari/537.36', '2024-08-03 00:00:00', 'login', 1),
(9505, 'dang khanh logging in', '{\"vai_tros\":null}', '113.23.48.33', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/127.0.0.0 Safari/537.36', '2024-08-05 00:00:00', 'login', 1),
(9506, 'dang khanh logging in', '{\"vai_tros\":null}', '14.231.188.26', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/15.1 Safari/605.1.15', '2024-08-06 00:00:00', 'login', 1);

-- --------------------------------------------------------

--
-- Table structure for table `lucky_history_reward`
--

CREATE TABLE `lucky_history_reward` (
  `id` int(11) NOT NULL,
  `type` text NOT NULL,
  `user_id` int(11) NOT NULL,
  `reward_id` int(11) DEFAULT NULL,
  `created` datetime NOT NULL DEFAULT current_timestamp(),
  `point` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `lucky_history_reward`
--

INSERT INTO `lucky_history_reward` (`id`, `type`, `user_id`, `reward_id`, `created`, `point`, `status`) VALUES
(464, 'Package', 1, 1, '2024-06-27 00:56:53', NULL, 0),
(465, 'Spin', 1, 50, '2024-06-27 00:57:54', 1, 0),
(466, 'Spin', 1, 55, '2024-06-27 01:12:28', 1, 0),
(467, 'Package', 1, 1, '2024-07-02 14:01:02', NULL, 0),
(468, 'Spin', 1, 48, '2024-07-02 14:01:09', 1, 0),
(469, 'Spin', 1, 55, '2024-07-02 15:03:55', 1, 0),
(470, 'Buy', 1, 2, '2024-07-02 15:03:58', NULL, 0),
(471, 'Spin', 1, 48, '2024-07-02 15:04:06', 1, 0),
(472, 'Package', 1, 1, '2024-07-07 16:10:58', NULL, 0),
(473, 'Package', 1, 1, '2024-07-08 17:27:23', NULL, 0),
(474, 'Spin', 1, 14, '2024-07-08 17:27:30', 10, 0),
(475, 'Spin', 1, 54, '2024-07-08 17:27:38', 1, 0),
(476, 'Daily quest', 1, 22, '2024-07-08 17:27:46', NULL, 0),
(477, 'Daily quest', 1, 23, '2024-07-08 17:27:47', NULL, 0),
(478, 'Daily quest', 1, 24, '2024-07-08 17:27:48', NULL, 0),
(479, 'Daily quest', 1, 25, '2024-07-08 17:27:49', NULL, 0),
(480, 'Spin', 1, 50, '2024-07-08 17:30:26', 1, 0),
(481, 'Spin', 1, 49, '2024-07-08 17:30:37', 1, 0),
(482, 'Spin', 1, 51, '2024-07-08 17:30:45', 1, 0),
(483, 'Spin', 1, 15, '2024-07-08 17:31:32', 10, 1),
(484, 'Spin', 1, 54, '2024-07-08 17:31:44', 1, 0),
(485, 'Spin', 1, 54, '2024-07-08 17:37:13', 1, 0),
(486, 'Spin', 1, 51, '2024-07-08 17:37:20', 1, 0),
(487, 'Spin', 1, 54, '2024-07-08 17:39:00', 1, 0),
(488, 'Spin', 1, 52, '2024-07-08 17:39:06', 1, 0),
(489, 'Package', 1, 1, '2024-07-17 13:46:02', NULL, 0),
(490, 'Spin', 1, 14, '2024-07-17 13:46:11', 10, 0),
(491, 'Spin', 1, 15, '2024-07-17 13:47:34', 10, 0),
(492, 'Spin', 1, 53, '2024-07-17 13:47:45', 1, 0),
(493, 'Spin', 1, 53, '2024-07-17 13:52:39', 1, 0),
(494, 'Spin', 1, 50, '2024-07-17 15:00:28', 1, 0),
(495, 'Daily quest', 1, 22, '2024-07-17 15:01:08', NULL, 0),
(496, 'Daily quest', 1, 23, '2024-07-17 15:01:09', NULL, 0),
(497, 'Daily quest', 1, 24, '2024-07-17 15:01:15', NULL, 0),
(498, 'Daily quest', 1, 25, '2024-07-17 15:01:16', NULL, 0),
(499, 'Daily quest', 1, 26, '2024-07-17 15:01:18', NULL, 0),
(500, 'Daily quest', 1, 27, '2024-07-17 15:01:19', NULL, 0),
(501, 'Daily quest', 1, 28, '2024-07-17 15:01:20', NULL, 0),
(502, 'Spin', 1, 14, '2024-07-17 16:53:55', 10, 0),
(503, 'Spin', 1, 52, '2024-07-17 17:44:10', 1, 0),
(504, 'Spin', 1, 49, '2024-07-17 17:44:45', 1, 0),
(505, 'Spin', 1, 55, '2024-07-17 20:38:15', 1, 0),
(506, 'Spin', 1, 54, '2024-07-17 20:42:43', 1, 0),
(507, 'Spin', 1, 48, '2024-07-17 20:43:03', 1, 0),
(508, 'Spin', 1, 49, '2024-07-17 20:43:28', 1, 0),
(509, 'Package', 1, 1, '2024-07-18 09:18:45', NULL, 0),
(510, 'Package', 1, 1, '2024-07-20 23:46:06', NULL, 0),
(511, 'Grand quest', 1, 1, '2024-07-20 23:46:06', NULL, 0),
(512, 'Spin', 1, 51, '2024-07-20 23:46:16', 1, 0),
(513, 'Package', 1, 1, '2024-07-22 13:42:30', NULL, 0),
(514, 'Package', 1, 1, '2024-07-25 11:26:43', NULL, 0),
(515, 'Package', 1, 1, '2024-07-27 10:26:48', NULL, 0),
(516, 'Daily quest', 1, 22, '2024-07-27 10:27:22', NULL, 0),
(517, 'Daily quest', 1, 23, '2024-07-27 10:27:23', NULL, 0),
(518, 'Daily quest', 1, 24, '2024-07-27 10:27:24', NULL, 0),
(519, 'Daily quest', 1, 25, '2024-07-27 10:27:25', NULL, 0),
(520, 'Daily quest', 1, 26, '2024-07-27 10:27:26', NULL, 0),
(521, 'Daily quest', 1, 27, '2024-07-27 10:27:27', NULL, 0),
(522, 'Daily quest', 1, 28, '2024-07-27 10:27:28', NULL, 0),
(523, 'Spin', 1, 48, '2024-07-27 10:29:25', 1, 0),
(524, 'Package', 1, 1, '2024-07-28 18:49:27', NULL, 0),
(525, 'Package', 1, 1, '2024-08-01 15:48:53', NULL, 0),
(526, 'Spin', 1, 49, '2024-08-01 16:11:17', 1, 0),
(527, 'Spin', 1, 51, '2024-08-01 16:12:50', 1, 0),
(528, 'Spin', 1, 50, '2024-08-01 16:12:58', 1, 0),
(529, 'Spin', 1, 15, '2024-08-01 16:13:41', 10, 0),
(530, 'Spin', 1, 49, '2024-08-01 16:14:28', 1, 0),
(531, 'Spin', 1, 55, '2024-08-01 16:14:37', 1, 0),
(532, 'Spin', 1, 48, '2024-08-01 16:14:45', 1, 0),
(533, 'Spin', 1, 48, '2024-08-01 16:15:49', 1, 0),
(534, 'Daily quest', 1, 24, '2024-08-01 16:16:36', NULL, 0),
(535, 'Daily quest', 1, 25, '2024-08-01 16:16:38', NULL, 0),
(536, 'Daily quest', 1, 26, '2024-08-01 16:16:41', NULL, 0),
(537, 'Daily quest', 1, 27, '2024-08-01 16:16:42', NULL, 0),
(538, 'Daily quest', 1, 28, '2024-08-01 16:16:44', NULL, 0),
(539, 'Daily quest', 1, 22, '2024-08-01 16:18:58', NULL, 0),
(540, 'Daily quest', 1, 23, '2024-08-01 16:18:59', NULL, 0),
(541, 'Spin', 1, 50, '2024-08-01 16:19:24', 1, 0),
(542, 'Spin', 1, 15, '2024-08-01 16:19:32', 10, 0),
(543, 'Spin', 1, 49, '2024-08-01 16:21:14', 1, 0),
(544, 'Buy', 1, 2, '2024-08-01 16:23:46', NULL, 0),
(545, 'Spin', 1, 53, '2024-08-01 16:23:55', 1, 0),
(546, 'Spin', 1, 54, '2024-08-01 16:24:06', 1, 0),
(547, 'Spin', 1, 53, '2024-08-01 16:24:13', 1, 0),
(548, 'Package', 1, 1, '2024-08-02 00:03:40', NULL, 0),
(549, 'Daily quest', 1, 26, '2024-08-02 00:03:49', NULL, 0),
(550, 'Package', 1, 1, '2024-08-03 13:32:40', NULL, 0),
(551, 'Package', 1, 1, '2024-08-03 13:32:40', NULL, 0),
(552, 'Spin', 1, 52, '2024-08-03 13:32:46', 1, 0),
(553, 'Package', 1, 1, '2024-08-05 12:21:07', NULL, 0),
(554, 'Spin', 1, 53, '2024-08-05 14:38:04', 1, 1),
(555, 'Buy', 1, 1, '2024-08-05 14:42:23', NULL, 0),
(556, 'Daily quest', 1, 22, '2024-08-05 14:47:49', NULL, 0),
(557, 'Daily quest', 1, 23, '2024-08-05 14:47:50', NULL, 0),
(558, 'Daily quest', 1, 24, '2024-08-05 14:47:51', NULL, 0),
(559, 'Daily quest', 1, 25, '2024-08-05 14:47:53', NULL, 0),
(560, 'Daily quest', 1, 26, '2024-08-05 14:47:55', NULL, 0),
(561, 'Daily quest', 1, 27, '2024-08-05 14:47:56', NULL, 0),
(562, 'Daily quest', 1, 28, '2024-08-05 14:47:59', NULL, 0),
(563, 'Package', 1, 1, '2024-08-06 10:46:01', NULL, 0),
(564, 'Spin', 1, 15, '2024-08-06 10:46:14', 10, 0),
(565, 'Spin', 1, 14, '2024-08-06 10:46:29', 10, 0),
(566, 'Spin', 1, 49, '2024-08-06 10:47:09', 1, 0),
(567, 'Spin', 1, 14, '2024-08-06 13:37:34', 10, 0),
(568, 'Spin', 1, 53, '2024-08-06 13:37:43', 1, 0),
(569, 'Spin', 1, 52, '2024-08-06 13:37:50', 1, 0),
(570, 'Spin', 1, 53, '2024-08-06 14:12:25', 1, 0),
(571, 'Spin', 1, 14, '2024-08-06 15:40:02', 10, 0);

-- --------------------------------------------------------

--
-- Table structure for table `lucky_package`
--

CREATE TABLE `lucky_package` (
  `id` int(11) NOT NULL,
  `title` text NOT NULL,
  `total_spin` int(11) DEFAULT NULL,
  `price` decimal(20,0) DEFAULT NULL,
  `created` datetime NOT NULL DEFAULT current_timestamp(),
  `user_id` int(11) NOT NULL,
  `image` longtext DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `active` int(11) DEFAULT 1,
  `note` longtext DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `lucky_package`
--

INSERT INTO `lucky_package` (`id`, `title`, `total_spin`, `price`, `created`, `user_id`, `image`, `status`, `active`, `note`) VALUES
(1, 'Free/Month', 100, 1000, '2024-06-26 12:10:11', 1, '/assets/lucky/img/2024/06/27/_vp6c5kuI0jZ335LDU-hs0dxQdDXCr0bA.png', 1, 1, 'Get 10 spin/day'),
(2, 'ma ma su testing', 126, 1000, '2024-08-06 16:25:27', 1, '/assets/lucky/img/2024/08/06/_bgjvlYrBuuAqdaBLwGoQqC7zhWsa7zfk.png', 1, 1, 'will get more');

-- --------------------------------------------------------

--
-- Table structure for table `lucky_package_user`
--

CREATE TABLE `lucky_package_user` (
  `id` bigint(20) NOT NULL,
  `package_id` bigint(20) NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `created` datetime DEFAULT curdate()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `lucky_package_user`
--

INSERT INTO `lucky_package_user` (`id`, `package_id`, `user_id`, `created`) VALUES
(1, 1, 1, '2024-06-27 00:20:31');

-- --------------------------------------------------------

--
-- Table structure for table `lucky_phan_quyen`
--

CREATE TABLE `lucky_phan_quyen` (
  `id` int(11) NOT NULL,
  `vai_tro_id` int(11) DEFAULT NULL,
  `chuc_nang_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `lucky_phan_quyen`
--

INSERT INTO `lucky_phan_quyen` (`id`, `vai_tro_id`, `chuc_nang_id`) VALUES
(3305, 10, 133),
(3307, 13, 133),
(3309, 10, 134),
(3310, 12, 134),
(3311, 13, 134),
(3313, 13, 135),
(3321, 13, 126),
(3332, 12, 129),
(3333, 12, 128),
(3334, 12, 126),
(3335, 12, 130),
(3336, 12, 131),
(3337, 12, 132),
(3339, 1, 126),
(3340, 1, 127),
(3341, 1, 128),
(3342, 1, 129),
(3343, 1, 130),
(3344, 1, 131),
(3345, 1, 132),
(3346, 1, 133),
(3347, 1, 134),
(3348, 1, 135),
(3349, 1, 136),
(3353, 12, 135),
(3354, 12, 136);

-- --------------------------------------------------------

--
-- Table structure for table `lucky_price`
--

CREATE TABLE `lucky_price` (
  `title` text DEFAULT NULL,
  `image` longtext DEFAULT NULL,
  `id` int(11) NOT NULL,
  `created` datetime DEFAULT curdate(),
  `user_id` int(11) DEFAULT NULL,
  `note` longtext DEFAULT NULL,
  `status` int(11) DEFAULT 1,
  `active` int(11) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `lucky_price`
--

INSERT INTO `lucky_price` (`title`, `image`, `id`, `created`, `user_id`, `note`, `status`, `active`) VALUES
('Iphone 13', '/assets/lucky/img/iphone.png', 1, '2024-06-19 00:00:00', 1, 'Iphone 13 Pro', 1, 1),
('Ipod', '/assets/lucky/img/Ipod.png', 2, '2024-06-19 00:00:00', 1, 'Ipod 3 Pro', 1, 1),
('100 sms', '/assets/lucky/img/100sms.png', 3, '2024-06-19 00:00:00', 1, '100 - 1.000 - 10.000 - 100.000', 1, 1),
('Emoney', '/assets/lucky/img/emoney.png', 4, '2024-06-19 00:00:00', 1, '10 - 100', 1, 1),
('100 loyalty point', '/assets/lucky/img/loyalpoint.png', 6, '2024-06-19 00:00:00', 1, '100,500,1.000', 1, 1),
('Iphone 14', 'upload-file/2024/06/25/_3_QS0su7p743v4aFeakK5U0fDC36hyNu.png', 7, '2024-06-25 00:00:00', NULL, 'Iphone 14 Pro Max', 1, 0),
('Umbrella ', '/assets/lucky/img/2024/08/06/_iEOLDzo3WbVF-kG6vSsUm7qsP0F1rMwT.png', 8, '2024-08-06 00:00:00', NULL, '1000', 1, 1),
('Umbrella ', '/assets/lucky/img/2024/08/06/_MK9yWVuq6YXEzfZ4AoGzr33bvW-pT35y.png', 9, '2024-08-06 00:00:00', NULL, '1000', 1, 0),
('Pen', '/assets/lucky/img/2024/08/06/_uHhzulWsz8_dNUq5OUN9zwEH8BJsOWpc.png', 10, '2024-08-06 00:00:00', NULL, '123', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `lucky_quan_ly_user_vai_tro`
--

CREATE TABLE `lucky_quan_ly_user_vai_tro` (
  `id` int(11) DEFAULT NULL,
  `username` varchar(100) DEFAULT NULL,
  `leader_id` int(11) DEFAULT NULL,
  `trang_thai_vao_ca` enum('Đang trong khóa học','Đang rảnh') DEFAULT NULL,
  `anh_nguoi_dung` text DEFAULT NULL,
  `token_facebook` text DEFAULT NULL,
  `token_google` text DEFAULT NULL,
  `id_facebook` varchar(100) DEFAULT NULL,
  `id_google` varchar(100) DEFAULT NULL,
  `password_hash` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `is_finish` tinyint(2) DEFAULT NULL,
  `auth_key` varchar(32) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `hoten` varchar(100) DEFAULT NULL,
  `dien_thoai` varchar(20) DEFAULT NULL,
  `dia_chi` varchar(200) DEFAULT NULL,
  `active` tinyint(1) DEFAULT NULL,
  `mobile_token` text DEFAULT NULL,
  `ma_kich_hoat` varchar(10) DEFAULT NULL,
  `ngay_sinh` date DEFAULT NULL,
  `dien_thoai_du_phong` int(11) DEFAULT NULL,
  `trinh_do` int(11) DEFAULT NULL,
  `dich_vu` varchar(255) DEFAULT NULL,
  `danh_gia` varchar(20) DEFAULT NULL,
  `gioi_tinh` enum('Nam','Nữ','Khác') DEFAULT NULL,
  `vi_dien_tu` decimal(10,0) DEFAULT NULL,
  `cmnd_cccd` varchar(20) DEFAULT NULL,
  `bang_cap` text DEFAULT NULL,
  `khoa_tai_khoan` tinyint(2) DEFAULT NULL,
  `ghi_chu` text DEFAULT NULL,
  `ho_ten_con` varchar(255) DEFAULT NULL,
  `ngay_sinh_cua_con` date DEFAULT NULL,
  `is_admin` tinyint(2) DEFAULT NULL,
  `vai_tro_name` varchar(100) DEFAULT NULL,
  `trinh_do_name` varchar(100) DEFAULT NULL,
  `vai_tro` int(11) DEFAULT NULL,
  `quyen_han` varchar(19) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `lucky_quest`
--

CREATE TABLE `lucky_quest` (
  `id` int(11) NOT NULL,
  `title` text NOT NULL,
  `created` datetime DEFAULT current_timestamp(),
  `user_id` int(11) NOT NULL,
  `total_spin` int(11) DEFAULT 0,
  `image` longtext DEFAULT NULL,
  `total_success` int(11) DEFAULT 0,
  `type` text DEFAULT NULL,
  `active` int(11) DEFAULT 1,
  `status` int(11) DEFAULT 1,
  `note` longtext DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `lucky_quest`
--

INSERT INTO `lucky_quest` (`id`, `title`, `created`, `user_id`, `total_spin`, `image`, `total_success`, `type`, `active`, `status`, `note`) VALUES
(1, 'Log in 7 days', '2024-06-19 11:24:11', 1, 200, '/assets/lucky/img/log-7-day.png', 7, 'Login', 1, 1, NULL),
(2, 'FTTH ( >= 10,000 mmk)', '2024-06-19 11:25:39', 1, 300, '/assets/lucky/img/ftth.png', 7, 'Default', 1, 1, NULL),
(3, 'Link account bank – wallet', '2024-06-19 11:25:39', 1, 1000, '/assets/lucky/img/link-wallet.png', 7, 'Default', 1, 1, NULL),
(4, 'FTTH', '2024-08-06 16:38:50', 1, 0, '/assets/lucky/img/2024/08/06/_JZjcqTLc3UCpeWyshysFmh4tMkflUDaC', 0, NULL, 1, 1, 'FTTH payment');

-- --------------------------------------------------------

--
-- Table structure for table `lucky_quest_user`
--

CREATE TABLE `lucky_quest_user` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `created` datetime DEFAULT curdate(),
  `quest_id` int(11) DEFAULT NULL,
  `total_press` int(11) DEFAULT 0,
  `status` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `lucky_quest_user`
--

INSERT INTO `lucky_quest_user` (`id`, `user_id`, `created`, `quest_id`, `total_press`, `status`) VALUES
(10, 1, '2024-06-24 00:00:00', 1, 16, 1),
(11, 1, '2024-06-24 00:00:00', 2, 0, 0),
(12, 1, '2024-06-24 00:00:00', 3, 0, 0),
(13, 83, '2024-06-26 00:00:00', 1, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `lucky_rotation_config`
--

CREATE TABLE `lucky_rotation_config` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `image` longtext DEFAULT NULL,
  `percentage` decimal(10,2) DEFAULT NULL,
  `price` decimal(10,0) DEFAULT NULL,
  `total_quantity` int(11) DEFAULT 0,
  `created` datetime NOT NULL DEFAULT current_timestamp(),
  `updated` datetime NOT NULL DEFAULT current_timestamp(),
  `user_id` bigint(20) NOT NULL,
  `point` int(11) NOT NULL DEFAULT 1,
  `active` int(11) DEFAULT 1,
  `status` int(11) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `lucky_rotation_config`
--

INSERT INTO `lucky_rotation_config` (`id`, `title`, `image`, `percentage`, `price`, `total_quantity`, `created`, `updated`, `user_id`, `point`, `active`, `status`) VALUES
(1, '5 Spin', '/assets/lucky/img/bid-1.png', 0.10, 10000, 10, '2024-06-17 23:11:31', '2024-06-17 23:11:34', 1, 10, 1, 1),
(13, 'Good lucky', '/assets/lucky/img/goodluck.png', 0.10, 10000, 10, '2024-06-17 23:11:31', '2024-06-17 23:11:34', 1, 10, 1, 1),
(14, '01 Mercedes S650 Mayback 2024', '/assets/lucky/img/loyalpoint.png', 0.10, 10000, 2, '2024-06-17 23:11:31', '2024-06-17 23:11:34', 1, 10, 1, 1),
(15, '01 night with Miss Grand International 2023', '/assets/lucky/img/loyalpoint.png', 0.10, 10000, 5, '2024-06-17 23:11:31', '2024-06-17 23:11:34', 1, 10, 1, 1),
(48, '01 Mercedes G63 Black', '/assets/lucky/img/loyalpoint.png', 0.10, NULL, 0, '2024-06-19 02:00:29', '2024-06-19 02:00:29', 1, 1, 1, 0),
(49, '1 Golden city Apartment Condo', '/assets/lucky/img/bid-1.png', 0.10, NULL, 1, '2024-06-19 02:00:29', '2024-06-19 02:00:29', 1, 1, 1, 1),
(50, '1000 Iphone 15 Promax Limitted', '/assets/lucky/img/bid-1.png', 0.10, NULL, 4, '2024-06-19 02:00:29', '2024-06-19 02:00:29', 1, 1, 1, 1),
(51, '10 Bentley Flying Spur V8', '/assets/lucky/img/bid-1.png', 0.10, NULL, 3, '2024-06-19 02:00:29', '2024-06-19 02:00:29', 1, 1, 1, 1),
(52, '1 RollRoyce Ghost Coupe Convertible', '/assets/lucky/img/bid-1.png', 0.10, NULL, 3, '2024-06-19 02:00:29', '2024-06-19 02:00:29', 1, 1, 1, 1),
(53, '100 Mercedes GLC600 Maybach', '/assets/lucky/img/sms.png', 0.10, NULL, 2, '2024-06-19 02:00:29', '2024-06-19 02:00:29', 1, 1, 1, 1),
(54, '100 MMK', '/assets/lucky/img/sms.png', 0.10, NULL, 1, '2024-06-19 02:00:29', '2024-06-19 02:00:29', 1, 1, 1, 1),
(55, '1000 MMK', '/assets/lucky/img/bid-1.png', 0.10, NULL, 6, '2024-06-19 02:00:29', '2024-06-19 02:00:29', 1, 1, 1, 1),
(57, 'Dice ', '/assets/lucky/img/2024/08/06/_1ea1At8t3dt6L7TqAgcqINqrRGEIrvNt.png', 30.00, NULL, 23, '2024-08-06 16:28:29', '2024-08-06 16:28:29', 1, 34, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `lucky_setting_user`
--

CREATE TABLE `lucky_setting_user` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `value` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `lucky_setting_user`
--

INSERT INTO `lucky_setting_user` (`id`, `user_id`, `value`) VALUES
(1, 1, 1),
(2, 83, 0);

-- --------------------------------------------------------

--
-- Table structure for table `lucky_spin_price`
--

CREATE TABLE `lucky_spin_price` (
  `id` int(11) NOT NULL,
  `title` text NOT NULL,
  `quantity` int(11) NOT NULL DEFAULT 0,
  `price` decimal(10,0) NOT NULL DEFAULT 0,
  `user_id` int(11) NOT NULL,
  `created` datetime DEFAULT current_timestamp(),
  `image` longtext DEFAULT NULL,
  `active` int(11) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `lucky_spin_price`
--

INSERT INTO `lucky_spin_price` (`id`, `title`, `quantity`, `price`, `user_id`, `created`, `image`, `active`) VALUES
(1, '1 spin', 1, 100, 1, '2024-06-19 02:42:33', '/assets/lucky/img/online-purchase-2.png', 1),
(2, '5 spin', 5, 400, 1, '2024-06-19 02:42:54', '/assets/lucky/img/online-purchase-2.png', 1),
(3, 'Test', 0, 0, 1, '2024-06-26 15:59:58', 'upload-file/2024/06/26/_8RWygh0GEGMzYXYww9L_zcvH_9HE9IZH.png', 0),
(4, '2 Spins', 0, 150, 1, '2024-08-06 13:25:09', '/assets/lucky/img/2024/08/06/_8RD2Ol1h5SphjuYto6zKAeURZ6AbwPW2.png', 0),
(5, 'test spin', 0, 1500, 1, '2024-08-06 13:27:27', '/assets/lucky/img/2024/08/06/_UFLvPK6WjjQUJ1PxeJRMj4K-mpAZDhv6.png', 1);

-- --------------------------------------------------------

--
-- Table structure for table `lucky_user`
--

CREATE TABLE `lucky_user` (
  `id` int(11) NOT NULL,
  `username` varchar(100) DEFAULT NULL,
  `anh_nguoi_dung` text DEFAULT NULL,
  `password_hash` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `auth_key` varchar(32) DEFAULT NULL,
  `status` int(11) DEFAULT 10,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `hoten` varchar(100) DEFAULT NULL,
  `dien_thoai` varchar(20) DEFAULT NULL,
  `dia_chi` varchar(200) DEFAULT NULL,
  `active` tinyint(1) DEFAULT 1,
  `mobile_token` text DEFAULT NULL,
  `ma_kich_hoat` varchar(10) DEFAULT NULL,
  `ngay_sinh` date DEFAULT NULL,
  `gioi_tinh` enum('Nam','Nữ','Khác') DEFAULT NULL,
  `vi_dien_tu` decimal(10,0) DEFAULT 0,
  `ghi_chu` text DEFAULT NULL,
  `khoa_tai_khoan` tinyint(2) DEFAULT 0,
  `ten_ngan_hang` varchar(255) DEFAULT NULL,
  `so_tai_khoan` varchar(255) DEFAULT NULL,
  `chu_tai_khoan` varchar(255) DEFAULT NULL,
  `total_spin` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `lucky_user`
--

INSERT INTO `lucky_user` (`id`, `username`, `anh_nguoi_dung`, `password_hash`, `email`, `auth_key`, `status`, `created_at`, `updated_at`, `password`, `hoten`, `dien_thoai`, `dia_chi`, `active`, `mobile_token`, `ma_kich_hoat`, `ngay_sinh`, `gioi_tinh`, `vi_dien_tu`, `ghi_chu`, `khoa_tai_khoan`, `ten_ngan_hang`, `so_tai_khoan`, `chu_tai_khoan`, `total_spin`) VALUES
(1, 'admin', '2023/10/16/_7nK3mpj_vI75qPOLgppOw7F2cILfPBkC.jpg', '$2y$13$ionztb3HV1y80sDunpUmwuV33lDFV57oMr9joRptENSF/QK0P32XS', 'adc@b.com', 'C1xV2tT2MsigHdLUXVP8r7LjPshYtZ11', 10, '2022-07-25 13:47:45', '2024-08-06 15:40:02', NULL, 'dang khanh', '0909090901', 'HP', 1, NULL, NULL, '2002-04-19', NULL, 27000, NULL, 0, NULL, NULL, NULL, 1790),
(84, 'adc@b.com', NULL, '$2y$13$ionztb3HV1y80sDunpUmwuV33lDFV57oMr9joRptENSF/QK0P32XS', 'adc@b.com', 'n1HnFoW2WPJ4pQB4pFh7R8ilOgiLQ3GC', 10, '2023-09-29 10:44:07', NULL, NULL, 'LeaderKD 1', '0123032145', NULL, 1, NULL, NULL, NULL, NULL, 0, NULL, 0, NULL, NULL, NULL, 0),
(85, '0000000012', NULL, '$2y$13$oVhVIodt6Hvh5X/V/.baCe69KLOMjEXMbKLg5rcAjhtw0Xs8Xv0xi', NULL, NULL, 10, '2023-10-01 18:07:48', NULL, NULL, 'Đặng Khánh', '0000000012', NULL, 1, NULL, NULL, NULL, NULL, 0, NULL, 0, NULL, NULL, NULL, 0),
(86, '0000000015', '2023/10/01/_ke8nZ4rZVeeGZZYD1d7xxKoD18AWPqAj.jpg', '$2y$13$iAq/29RTj/SRLR8MePqwuO.OFKh3893JcVpFXLX4DT3ujOuT8xQc.', NULL, 'yOhaxfdZzUyDyUwkQUiNVQQ8RDefxY-X', 10, '2023-10-01 18:08:02', '2023-10-15 15:48:11', NULL, 'Đặng Khánh 123', '0000000015', NULL, 1, NULL, NULL, NULL, NULL, 0, NULL, 0, NULL, NULL, NULL, 0),
(87, 'adc@b.com', NULL, '$2y$13$Vjgk/75xipG03srL/cIR1uL1turqFRTr.aio1NOa50ey4vB.aIesG', 'anhkhanh5539574@gmail.com', 'EuNzu313fCXMVbwE4F1qqadTaPUgQz13', 10, '2023-10-01 19:53:10', NULL, NULL, 'Đặng Văn 123456', '0123032145', NULL, 1, 'c5hdIovjTPmqy46pMd9Y2P:APA91bFU8Jbpp1tU_epaEMxzfTSvDo69qi6ydTM6NZPSWOxTFL0HrOoMW5dTEoAUwiV2apkADAofFXNrO6qXMZ-OX4asG0xdFArmMfDni_qYoVKDr0U8MeAw6s-t4ZR_NgsuFqY1XCTH', '360446', NULL, NULL, 0, NULL, 1, NULL, NULL, NULL, 0),
(88, '0000000014', NULL, '$2y$13$D18riNZhQl7nuzm6R4uKdejvsf1tWzUK868ghdAPJQeAyXW2FVeEm', NULL, NULL, 10, '2023-10-02 13:57:51', NULL, NULL, 'Đặng Khánh', '0000000014', NULL, 1, NULL, NULL, NULL, NULL, 0, NULL, 0, NULL, NULL, NULL, 0),
(92, '0909090901', '2023/11/16/_S_w8Av4ksSwOwbE0Ad82n7I0SpwuL_11', '$2y$13$ionztb3HV1y80sDunpUmwuV33lDFV57oMr9joRptENSF/QK0P32XS', 'nguyenvana@gmail.com', 'yvlsCzjLFfTiBlFhVj1KhDy2Yv9u6KP6', 10, '2023-10-10 16:02:39', '2023-11-16 00:51:25', NULL, 'Nguyen van A', '0394290992', 'abcd', 1, NULL, NULL, '2000-11-16', NULL, 3743134, NULL, 1, NULL, NULL, NULL, 0),
(93, '0000000001', NULL, '$2y$13$K5sLvmnnAR9BZTVAcNRm1e1nH1mfdIwZBiyNJCTY6dLKm38owjmY6', NULL, NULL, 10, '2023-10-15 14:33:17', '2023-10-28 01:10:20', NULL, 'Cao sơn', '0000000001', NULL, 1, NULL, NULL, NULL, NULL, 0, NULL, 0, NULL, NULL, NULL, 0),
(94, '0000000010', '2023/10/15/_30pj8tHVK40YaoVkI79t7P1YzjLR2pGy.jpg', '$2y$13$e363qndqT4QqXYYhs9LUp.PtUvFLUESCzG2vmfFj8VysNXLGA8tkW', NULL, NULL, 10, '2023-10-15 14:34:04', NULL, NULL, 'Đặng Khánh', '0000000010', NULL, 1, NULL, NULL, NULL, NULL, 0, NULL, 0, NULL, NULL, NULL, 0),
(95, '0909090999', '2023/10/19/_D9JQLXjzhln8LNc3w0j4_1diKzKnUn9k.jpg', '$2y$13$dCRBAXLHCYqyqb3FfUofRuZ.vnqul93p8fGU9Z2o9T/u2Lq7pD8Re', 'anh@bcd.com1', 'yvlsCzjLFfTiBlFhVj1KhDy2Yv9u6KPs', 10, '2023-10-16 11:20:20', NULL, NULL, 'Nguyễn Hoàng Anh Thư1', '0123456781', 'Hải phòng', 1, NULL, NULL, '1991-05-12', NULL, 6012500, NULL, 0, 'Vietcombanh', '0000000000', 'NGUYEN HOANG ANH THU', 0),
(96, 'adc@bc.com1', NULL, '$2y$13$1u7NOQgceWhOHBRmGYXyPOsc1H5H5NyFrtxrap3gy.xQqOefvwQxW', 'khanh8757@st.com', '2uE0hz5uUOlW9cyoXFZgdc0yJT3YmFWx', 10, '2023-10-16 13:27:48', NULL, NULL, 'Đặng Văn Khánh', '0000000000', '', 1, NULL, NULL, NULL, NULL, 0, NULL, 0, NULL, NULL, NULL, 0),
(97, '0000000016', '2023/10/28/_B7lVypIRi2QkMjO3R_AW-Y_ITg1f0Nt3.png', '$2y$13$D9JI3Mv4DDJbxFPfvAu7leGWDMtMj8SXjyew8TnKvKNr6gxBFHkpm', NULL, NULL, 0, '2023-10-28 17:28:24', '2023-10-28 17:28:35', NULL, 'Cao sơn', '0000000016', NULL, 0, NULL, NULL, NULL, NULL, 0, NULL, 0, NULL, NULL, NULL, 0),
(98, '0000000016', '2023/10/28/_B7aAn4D4nEbXnx_-H9S0XxNPIZ_8rscX.png', '$2y$13$ynQYa76HJlqwu2wMg0Z/ae398LveuvCHTenOPd/hLegQhfk58/PHm', NULL, NULL, 0, '2023-10-28 17:41:31', '2023-10-28 17:41:49', NULL, 'Cao Văn Sơn', '0000000016', NULL, 0, NULL, NULL, NULL, NULL, 0, NULL, 0, NULL, NULL, NULL, 0),
(99, '0000000016', '2023/10/28/_t4xDF5xM-97uWSzznABFl3WUznwiN1ZF.png', '$2y$13$Y/NQ.TSlT37pkEPf7YuNDe2UllJ2pAv/bek00siqN/fjZ90qmxg2q', NULL, NULL, 10, '2023-10-28 17:45:15', '2023-10-31 21:32:56', NULL, 'Cao sơn', '0000000016', NULL, 1, NULL, NULL, NULL, NULL, 0, NULL, 0, NULL, NULL, NULL, 0);

-- --------------------------------------------------------

--
-- Stand-in structure for view `lucky_user_view`
-- (See below for the actual view)
--
CREATE TABLE `lucky_user_view` (
`id` int(11)
,`username` varchar(100)
,`anh_nguoi_dung` text
,`password_hash` varchar(100)
,`email` varchar(100)
,`auth_key` varchar(32)
,`status` int(11)
,`created_at` datetime
,`updated_at` datetime
,`password` varchar(100)
,`hoten` varchar(100)
,`dien_thoai` varchar(20)
,`dia_chi` varchar(200)
,`active` tinyint(1)
,`mobile_token` text
,`ma_kich_hoat` varchar(10)
,`ngay_sinh` date
,`gioi_tinh` enum('Nam','Nữ','Khác')
,`vi_dien_tu` decimal(10,0)
,`ghi_chu` text
,`khoa_tai_khoan` tinyint(2)
,`ten_ngan_hang` varchar(255)
,`so_tai_khoan` varchar(255)
,`chu_tai_khoan` varchar(255)
,`total_spin` int(11)
,`role` varchar(100)
,`point` decimal(32,0)
);

-- --------------------------------------------------------

--
-- Table structure for table `lucky_vaitrouser`
--

CREATE TABLE `lucky_vaitrouser` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `vaitro_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `lucky_vaitrouser`
--

INSERT INTO `lucky_vaitrouser` (`id`, `user_id`, `vaitro_id`) VALUES
(1, 1, 10),
(2, 83, 10),
(3, 84, 10),
(4, 85, 10),
(5, 86, 10),
(6, 87, 10),
(7, 88, 10),
(8, 92, 10),
(9, 93, 10),
(10, 94, 10),
(11, 95, 10),
(12, 96, 10),
(13, 97, 10),
(14, 98, 10),
(15, 99, 10);

-- --------------------------------------------------------

--
-- Table structure for table `lucky_vai_tro`
--

CREATE TABLE `lucky_vai_tro` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `lucky_vai_tro`
--

INSERT INTO `lucky_vai_tro` (`id`, `name`) VALUES
(1, 'Admin'),
(10, 'Free'),
(11, 'Pro');

-- --------------------------------------------------------

--
-- Structure for view `lucky_user_view`
--
DROP TABLE IF EXISTS `lucky_user_view`;

CREATE ALGORITHM=UNDEFINED DEFINER=`igfnatgj`@`localhost` SQL SECURITY DEFINER VIEW `lucky_user_view`  AS SELECT `t`.`id` AS `id`, `t`.`username` AS `username`, `t`.`anh_nguoi_dung` AS `anh_nguoi_dung`, `t`.`password_hash` AS `password_hash`, `t`.`email` AS `email`, `t`.`auth_key` AS `auth_key`, `t`.`status` AS `status`, `t`.`created_at` AS `created_at`, `t`.`updated_at` AS `updated_at`, `t`.`password` AS `password`, `t`.`hoten` AS `hoten`, `t`.`dien_thoai` AS `dien_thoai`, `t`.`dia_chi` AS `dia_chi`, `t`.`active` AS `active`, `t`.`mobile_token` AS `mobile_token`, `t`.`ma_kich_hoat` AS `ma_kich_hoat`, `t`.`ngay_sinh` AS `ngay_sinh`, `t`.`gioi_tinh` AS `gioi_tinh`, `t`.`vi_dien_tu` AS `vi_dien_tu`, `t`.`ghi_chu` AS `ghi_chu`, `t`.`khoa_tai_khoan` AS `khoa_tai_khoan`, `t`.`ten_ngan_hang` AS `ten_ngan_hang`, `t`.`so_tai_khoan` AS `so_tai_khoan`, `t`.`chu_tai_khoan` AS `chu_tai_khoan`, `t`.`total_spin` AS `total_spin`, `t2`.`name` AS `role`, sum(`t3`.`point`) AS `point` FROM (((`lucky_user` `t` left join `lucky_vaitrouser` `t1` on(`t`.`id` = `t1`.`user_id`)) left join `lucky_vai_tro` `t2` on(`t1`.`vaitro_id` = `t2`.`id`)) left join `lucky_history_reward` `t3` on(`t`.`id` = `t3`.`user_id`)) GROUP BY `t`.`id` ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `lucky_cau_hinh`
--
ALTER TABLE `lucky_cau_hinh`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lucky_chuc_nang`
--
ALTER TABLE `lucky_chuc_nang`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lucky_daily_quest`
--
ALTER TABLE `lucky_daily_quest`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `lucky_daily_quest_user`
--
ALTER TABLE `lucky_daily_quest_user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `daily_quest_id` (`daily_quest_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `lucky_danh_muc`
--
ALTER TABLE `lucky_danh_muc`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lucky_history`
--
ALTER TABLE `lucky_history`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lucky_history_reward`
--
ALTER TABLE `lucky_history_reward`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `reward_id` (`reward_id`);

--
-- Indexes for table `lucky_package`
--
ALTER TABLE `lucky_package`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lucky_package_user`
--
ALTER TABLE `lucky_package_user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lucky_price`
--
ALTER TABLE `lucky_price`
  ADD PRIMARY KEY (`id`),
  ADD KEY `lucky_price_user_id_index` (`user_id`);

--
-- Indexes for table `lucky_quest`
--
ALTER TABLE `lucky_quest`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `lucky_quest_user`
--
ALTER TABLE `lucky_quest_user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `lucky_quest_user_quest_id_index` (`quest_id`),
  ADD KEY `lucky_quest_user_user_id_index` (`user_id`);

--
-- Indexes for table `lucky_rotation_config`
--
ALTER TABLE `lucky_rotation_config`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `lucky_setting_user`
--
ALTER TABLE `lucky_setting_user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `lucky_spin_price`
--
ALTER TABLE `lucky_spin_price`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lucky_user`
--
ALTER TABLE `lucky_user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lucky_vaitrouser`
--
ALTER TABLE `lucky_vaitrouser`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lucky_vai_tro`
--
ALTER TABLE `lucky_vai_tro`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `lucky_cau_hinh`
--
ALTER TABLE `lucky_cau_hinh`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `lucky_daily_quest`
--
ALTER TABLE `lucky_daily_quest`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `lucky_daily_quest_user`
--
ALTER TABLE `lucky_daily_quest_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=77;

--
-- AUTO_INCREMENT for table `lucky_history`
--
ALTER TABLE `lucky_history`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9507;

--
-- AUTO_INCREMENT for table `lucky_history_reward`
--
ALTER TABLE `lucky_history_reward`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=572;

--
-- AUTO_INCREMENT for table `lucky_package`
--
ALTER TABLE `lucky_package`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `lucky_package_user`
--
ALTER TABLE `lucky_package_user`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `lucky_price`
--
ALTER TABLE `lucky_price`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `lucky_quest`
--
ALTER TABLE `lucky_quest`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `lucky_quest_user`
--
ALTER TABLE `lucky_quest_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `lucky_rotation_config`
--
ALTER TABLE `lucky_rotation_config`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT for table `lucky_setting_user`
--
ALTER TABLE `lucky_setting_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `lucky_spin_price`
--
ALTER TABLE `lucky_spin_price`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `lucky_vaitrouser`
--
ALTER TABLE `lucky_vaitrouser`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
