-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th4 12, 2019 lúc 07:56 AM
-- Phiên bản máy phục vụ: 10.1.38-MariaDB
-- Phiên bản PHP: 7.1.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `tinhtiendien`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chucvu`
--

CREATE TABLE `chucvu` (
  `macv` int(10) UNSIGNED NOT NULL,
  `tencv` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `chucvu`
--

INSERT INTO `chucvu` (`macv`, `tencv`) VALUES
(1, 'Admin'),
(2, 'Ghi số điện'),
(3, 'Thu ngân');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `giadien`
--

CREATE TABLE `giadien` (
  `mabac` int(10) UNSIGNED NOT NULL,
  `tenbac` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `tusokw` int(11) NOT NULL,
  `densokw` int(11) NOT NULL,
  `dongia` double NOT NULL,
  `ngayapdung` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `giadien`
--

INSERT INTO `giadien` (`mabac`, `tenbac`, `tusokw`, `densokw`, `dongia`, `ngayapdung`) VALUES
(1, 'Bậc 1', 0, 50, 1549, '2017-12-30 00:00:00'),
(2, 'Bậc 2', 51, 100, 1600, '2017-12-29 00:00:00'),
(3, 'Bậc 3', 101, 200, 1858, '2017-12-28 00:00:00'),
(4, 'Bậc 42', 201, 300, 2340, '2019-04-09 00:00:00');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `khachhang`
--

CREATE TABLE `khachhang` (
  `makh` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `tenkh` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `diachi` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `cmnd` int(11) NOT NULL,
  `sdt` int(11) NOT NULL,
  `hinhanh` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `khachhang`
--

INSERT INTO `khachhang` (`makh`, `tenkh`, `diachi`, `cmnd`, `sdt`, `hinhanh`) VALUES
('KH087', 'Trọng Khang', 'Quận 8 Plus , HCM', 212552087, 391233446, 'khang.jpg'),
('KH123', 'Diễm Tường', 'Quận 8S , HCM', 212552123, 146563422, 'tuong.jpg'),
('KH647', 'Thế Vinh', 'Quận 8 , HCM', 212552647, 967564426, 'vinh.jpg');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2019_04_08_064731_chucvu', 1),
(7, '2019_04_09_025555_giadien', 4),
(12, '2019_04_09_145810_khachhang', 6),
(13, '2014_10_12_000000_create_users_table', 7);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `manv` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `tennv` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `diachi` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `cmnd` varchar(9) COLLATE utf8_unicode_ci NOT NULL,
  `sdt` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `hinhanh` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `chucvu` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`manv`, `tennv`, `email`, `password`, `diachi`, `cmnd`, `sdt`, `hinhanh`, `chucvu`) VALUES
('PE1082', 'Lê Tuân', 'letuan@stu', '$2y$10$IFgeLr89k4jz0Vjt9bAwiee8ljxBrvGtoWVL0QRmM7Riz9YReopnC', 'Bình Tân , HCM', '212579082', '395563446', 'tuan.jpg', 1),
('PE2002', 'Huỳnh An', 'huynhan1996@stu', '$2y$10$lPmHZQtS7xSA1v5./wbdd.i2wIqP81SSmSJKxUBH6kr.CsLN2xt2W', 'Tân Phú , HCM', '212579002', '395563446', 'an.jpg', 2),
('PE3003', 'Cẩm Tú', 'camtu@stu', '$2y$10$DaOcILatc2EEP.3Hw4GU2OcxRJAqi0Lek67G7iy9X2r77./DR2CXS', 'Quận 8 , HCM', '212579003', '395563446', 'tu.jpg', 3);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `chucvu`
--
ALTER TABLE `chucvu`
  ADD PRIMARY KEY (`macv`);

--
-- Chỉ mục cho bảng `giadien`
--
ALTER TABLE `giadien`
  ADD PRIMARY KEY (`mabac`);

--
-- Chỉ mục cho bảng `khachhang`
--
ALTER TABLE `khachhang`
  ADD PRIMARY KEY (`makh`);

--
-- Chỉ mục cho bảng `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`manv`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `users_chucvu_foreign` (`chucvu`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `chucvu`
--
ALTER TABLE `chucvu`
  MODIFY `macv` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `giadien`
--
ALTER TABLE `giadien`
  MODIFY `mabac` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_chucvu_foreign` FOREIGN KEY (`chucvu`) REFERENCES `chucvu` (`macv`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
