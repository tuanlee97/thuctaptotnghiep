-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th4 22, 2019 lúc 01:31 PM
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
-- Cấu trúc bảng cho bảng `cthoadon`
--

CREATE TABLE `cthoadon` (
  `idchitiet` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `tungay` datetime NOT NULL,
  `denngay` datetime NOT NULL,
  `csdau` double NOT NULL,
  `cscuoi` double NOT NULL,
  `tamtinh` double NOT NULL,
  `thue` double NOT NULL,
  `tongthanhtien` double NOT NULL,
  `dntt` double NOT NULL,
  `mahd` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `cthoadon`
--

INSERT INTO `cthoadon` (`idchitiet`, `tungay`, `denngay`, `csdau`, `cscuoi`, `tamtinh`, `thue`, `tongthanhtien`, `dntt`, `mahd`) VALUES
('CT0219123', '2019-01-13 00:00:00', '2019-02-13 00:00:00', 0, 35, 54215, 5421.5, 59636.5, 35, 'HD0219123'),
('CT0319087', '2019-02-13 00:00:00', '2019-03-15 00:00:00', 35, 70, 54215, 5421.5, 59636.5, 35, 'HD0319123');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `dienke`
--

CREATE TABLE `dienke` (
  `madk` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `tendk` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `ngaysx` datetime NOT NULL,
  `ngaylap` timestamp NULL DEFAULT NULL,
  `trangthai` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `makh` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `dienke`
--

INSERT INTO `dienke` (`madk`, `tendk`, `ngaysx`, `ngaylap`, `trangthai`, `makh`) VALUES
('DKCE-14G', 'CE-14G', '2018-04-11 00:00:00', '2019-04-13 17:00:00', '1', 'KH087'),
('DKCE-41G', 'CE-41G', '2018-01-11 00:00:00', '2019-01-13 11:26:47', '1', 'KH123');

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
(3, 'Bậc 3', 101, 200, 1858, '2017-12-28 00:00:00');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hoadon`
--

CREATE TABLE `hoadon` (
  `mahd` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `ky` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `ngaylap` datetime NOT NULL,
  `tongtien` double NOT NULL,
  `trangthai` tinyint(1) NOT NULL DEFAULT '0',
  `makh` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `manv` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `hoadon`
--

INSERT INTO `hoadon` (`mahd`, `ky`, `ngaylap`, `tongtien`, `trangthai`, `makh`, `manv`) VALUES
('HD0219123', '2019-02', '2019-02-13 00:00:00', 59637, 1, 'KH123', 'PE2002'),
('HD0319123', '2019-03', '2019-03-13 00:00:00', 59637, 0, 'KH123', 'PE2002');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `khachhang`
--

CREATE TABLE `khachhang` (
  `makh` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `tenkh` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `diachi` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `cmnd` varchar(9) COLLATE utf8_unicode_ci NOT NULL,
  `sdt` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `hinhanh` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `khachhang`
--

INSERT INTO `khachhang` (`makh`, `tenkh`, `diachi`, `cmnd`, `sdt`, `hinhanh`) VALUES
('KH087', 'Trọng Khang', 'Quận 8 Plus , HCM', '212552087', '0391233446', 'khang.jpg'),
('KH123', 'Diễm Tường', 'Quận 8 , HCM', '212552123', '0146563422', 'tuong.jpg'),
('KH647', 'Thế Vinh', 'Quận 8 , HCM', '212552647', '0967564426', 'vinh.jpg');

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
(2, '2019_04_09_025555_giadien', 1),
(3, '2019_04_09_145810_khachhang', 1),
(4, '2019_04_16_015756_dienke', 1),
(5, '2014_10_12_000000_create_users_table', 2),
(6, '2019_04_16_214628_hoadon', 2),
(7, '2019_04_16_214733_chitiethd', 2);

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
('PE1082', 'Lê Tuân', 'letuan@stu', '$2y$10$kMjZQFcCBL.cffalq98RPOeyP9tHM/QIrU.dI23d2MjqZkbosmq82', 'Bình Tân , HCM', '212579082', '0395563446', 'tuan.jpg', 1),
('PE2002', 'Huỳnh An', 'huynhan1996@stu', '$2y$10$eHruKUAFsC1gkcwF.oSjae2Yrw80bk.JL.nWqCoyfJhE7qhrMXgtK', 'Tân Phú , HCM', '212579002', '0145561261', 'an.jpg', 2),
('PE3003', 'Cẩm Tú', 'camtu@stu', '$2y$10$Tk9MJdqXUnD27jxHxHRtgOLVM/HiBC7ic4YivVQ19yuzkM90A3Lpa', 'Quận 8 , HCM', '212579003', '0135634145', 'tu.jpg', 3);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `chucvu`
--
ALTER TABLE `chucvu`
  ADD PRIMARY KEY (`macv`);

--
-- Chỉ mục cho bảng `cthoadon`
--
ALTER TABLE `cthoadon`
  ADD PRIMARY KEY (`idchitiet`),
  ADD KEY `cthoadon_mahd_foreign` (`mahd`);

--
-- Chỉ mục cho bảng `dienke`
--
ALTER TABLE `dienke`
  ADD PRIMARY KEY (`madk`),
  ADD KEY `dienke_makh_foreign` (`makh`);

--
-- Chỉ mục cho bảng `giadien`
--
ALTER TABLE `giadien`
  ADD PRIMARY KEY (`mabac`);

--
-- Chỉ mục cho bảng `hoadon`
--
ALTER TABLE `hoadon`
  ADD PRIMARY KEY (`mahd`),
  ADD KEY `hoadon_makh_foreign` (`makh`),
  ADD KEY `hoadon_manv_foreign` (`manv`);

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
  MODIFY `mabac` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `cthoadon`
--
ALTER TABLE `cthoadon`
  ADD CONSTRAINT `cthoadon_mahd_foreign` FOREIGN KEY (`mahd`) REFERENCES `hoadon` (`mahd`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `dienke`
--
ALTER TABLE `dienke`
  ADD CONSTRAINT `dienke_makh_foreign` FOREIGN KEY (`makh`) REFERENCES `khachhang` (`makh`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `hoadon`
--
ALTER TABLE `hoadon`
  ADD CONSTRAINT `hoadon_makh_foreign` FOREIGN KEY (`makh`) REFERENCES `khachhang` (`makh`) ON DELETE CASCADE,
  ADD CONSTRAINT `hoadon_manv_foreign` FOREIGN KEY (`manv`) REFERENCES `users` (`manv`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_chucvu_foreign` FOREIGN KEY (`chucvu`) REFERENCES `chucvu` (`macv`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
