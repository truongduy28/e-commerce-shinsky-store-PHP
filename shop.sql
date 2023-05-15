-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th1 05, 2023 lúc 04:14 AM
-- Phiên bản máy phục vụ: 10.4.27-MariaDB
-- Phiên bản PHP: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `shop`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `banner`
--

CREATE TABLE `banner` (
  `id_banner` int(11) NOT NULL,
  `hinhanhbanner1` text NOT NULL,
  `hinhanhbanner2` text NOT NULL,
  `hinhanhbanner3` text NOT NULL,
  `hinhanhbanner4` text NOT NULL,
  `hinhanhbanner5` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `banner`
--

INSERT INTO `banner` (`id_banner`, `hinhanhbanner1`, `hinhanhbanner2`, `hinhanhbanner3`, `hinhanhbanner4`, `hinhanhbanner5`) VALUES
(1, 'Upload2203021203449755.png', 'Upload22030212030267886.jpg', 'Upload22030212033910410.webp', 'Upload220302120339612.jpg', 'Upload22030212033975923.jpg');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chitietdonhang`
--

CREATE TABLE `chitietdonhang` (
  `id_donhang` varchar(150) DEFAULT NULL,
  `id_sanpham` int(11) DEFAULT NULL,
  `size` varchar(100) DEFAULT NULL,
  `sl` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `chitietdonhang`
--

INSERT INTO `chitietdonhang` (`id_donhang`, `id_sanpham`, `size`, `sl`) VALUES
('61fb541ec65e1', 21, 'M', 1),
('61fb541ec65e1', 20, 'M', 3),
('61fb64d9ca85d', 19, 'FREE SIZE', 2),
('61fb64d9ca85d', 17, 'L', 1),
('61fb64d9ca85d', 15, 'S', 1),
('61fcfc285de8e', 17, 'M', 1),
('61fcfc285de8e', 19, 'FREE SIZE', 1),
('61fcfc285de8e', 15, 'L', 1),
('61fcfc285de8e', 15, 'M', 3),
('61fcfca8b3273', 13, 'FREE SIZE', 1),
('61fcfca8b3273', 12, 'S', 1),
('61fcfca8b3273', 12, 'L', 1),
('61fe0785a4e88', 13, 'FREE SIZE', 1),
('61feb731eddcc', 12, 'S', 1),
('61feb731eddcc', 17, 'L', 1),
('61ff629f5cf96', 12, 'M', 1),
('62063c33ce6a2', 19, 'FREE SIZE', 1),
('620e54d8e9ede', 41, 'M', 1),
('620e54d8e9ede', 20, 'M', 6),
('620f18b127fda', 43, 'S', 1),
('621dc3f649949', 32, 'M', 1),
('621dc3f649949', 30, 'S', 1),
('621fa8ddadaaa', 14, 'L', 1),
('621fa8ddadaaa', 12, 'M', 4),
('622160ec86754', 25, 'FREE SIZE', 1),
('6222b5f84bb24', 43, 'M', 1),
('6222ba4aef156', 32, 'M', 12),
('6222ba4aef156', 43, 'M', 1),
('6399d2bfba3b1', 44, 'M', 1),
('6399d2bfba3b1', 34, 'M', 3),
('63aaa13787062', 44, 'M', 1),
('63aaa28515ecf', 44, 'L', 1),
('63aaa28537151', 44, 'L', 1),
('63aaa28561aac', 44, 'L', 1),
('63aaa2858a3b6', 44, 'L', 1),
('63aaa285afc4d', 44, 'L', 1),
('63aaa285dfbb2', 44, 'L', 1),
('63aaa28612e3a', 44, 'L', 1),
('63aaa28641cd8', 44, 'L', 1),
('63aaa35bbdb05', 36, 'FREE SIZE', 1),
('63aaa3a19475f', 33, 'FREE SIZE', 2),
('63aaaab71341e', 26, 'M', 1),
('63aaaab71341e', 28, 'FREE SIZE', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `danhgia`
--

CREATE TABLE `danhgia` (
  `id_danhgia` int(11) NOT NULL,
  `id_taikhoan` int(11) DEFAULT NULL,
  `id_donhang` varchar(150) NOT NULL,
  `id_sanpham` int(11) NOT NULL,
  `size` text NOT NULL,
  `chitietdanhgia` text DEFAULT NULL,
  `show_danhgia` int(11) DEFAULT 1,
  `ngaydanhgia` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `danhgia`
--

INSERT INTO `danhgia` (`id_danhgia`, `id_taikhoan`, `id_donhang`, `id_sanpham`, `size`, `chitietdanhgia`, `show_danhgia`, `ngaydanhgia`) VALUES
(1, 5, '61fb64d9ca85d', 0, '', '', 1, '2022-02-04'),
(2, 5, '61fcfc285de8e', 17, '', NULL, 1, '2022-02-04'),
(3, 5, '61fcfc285de8e', 19, '', NULL, 1, '2022-02-04'),
(4, 5, '61fcfc285de8e', 15, '', NULL, 1, '2022-02-04'),
(5, 5, '61fcfc285de8e', 15, '', NULL, 1, '2022-02-04'),
(6, 5, '61fcfca8b3273', 13, 'FREE SIZE', NULL, 1, '2022-02-04'),
(7, 5, '61fcfca8b3273', 12, 'S', '', 1, '2022-02-04'),
(8, 5, '61fcfca8b3273', 12, 'L', 'Chất lượn tuyệt vời', 1, '2022-02-04'),
(9, 6, '61fe0785a4e88', 13, 'FREE SIZE', NULL, 1, '2022-02-05'),
(10, 5, '61fcfca8b3273', 12, 'L', 'Chất lượn tuyệt vời', 1, '2022-02-04'),
(11, 5, '61fcfca8b3273', 12, 'L', 'Chất lượn tuyệt vời', 1, '2022-02-04'),
(12, 5, '61fcfca8b3273', 12, 'L', 'Chất lượn tuyệt vời', 1, '2022-02-04'),
(13, 5, '61fcfca8b3273', 12, 'L', 'Chất lượn tuyệt vời', 1, '2022-02-04'),
(14, 5, '61fcfca8b3273', 12, 'L', 'Chất lượn tuyệt vời', 1, '2022-02-04'),
(15, 5, '61fcfca8b3273', 12, 'L', 'Chất lượn tuyệt vời', 1, '2022-02-04'),
(16, 5, '61fcfca8b3273', 12, 'L', 'Chất lượn tuyệt vời', 1, '2022-02-04'),
(17, 5, '61fcfca8b3273', 12, 'L', 'Chất lượn tuyệt vời', 1, '2022-02-04'),
(18, 5, '61fcfca8b3273', 12, 'L', 'Chất lượn tuyệt vời', 1, '2022-02-04'),
(19, 5, '61fcfca8b3273', 12, 'L', 'abc', 1, '2022-02-04'),
(20, 5, '61fcfca8b3273', 12, 'L', 'Chất lượn tuyệt vời', 1, '2022-02-04'),
(21, 5, '61fcfca8b3273', 12, 'L', 'Chất lượn tuyệt vời', 1, '2022-02-04'),
(22, 5, '61fcfca8b3273', 12, 'L', 'Chất lượn tuyệt vời', 1, '2022-02-04'),
(23, 5, '61fcfca8b3273', 12, 'L', 'Chất lượn tuyệt vời', 1, '2022-02-04'),
(24, 6, '61feb731eddcc', 12, 'S', 'EMBROIDERED BOBUI LOGO POLO/ RED', 1, '2022-02-05'),
(25, 6, '61feb731eddcc', 17, 'L', 'Chất lượng tuyệt vời EMBROIDERED BOBUI LOGO POLO/ RED', 1, '2022-02-05'),
(26, 5, '61ff629f5cf96', 12, 'M', NULL, 1, '2022-02-06'),
(27, 9, '62063c33ce6a2', 19, 'FREE SIZE', NULL, 1, '2022-02-11'),
(28, 10, '620e54d8e9ede', 41, 'M', NULL, 1, '2022-02-17'),
(29, 10, '620e54d8e9ede', 20, 'M', 'Chất lượn tuyệt vời', 1, '2022-02-17'),
(30, 11, '620f18b127fda', 43, 'S', NULL, 1, '2022-02-18'),
(31, 9, '621dc3f649949', 32, 'M', NULL, 1, '2022-03-01'),
(32, 9, '621dc3f649949', 30, 'S', NULL, 1, '2022-03-01'),
(33, 8, '621fa8ddadaaa', 14, 'L', NULL, 1, '2022-03-02'),
(34, 8, '621fa8ddadaaa', 12, 'M', NULL, 1, '2022-03-02'),
(35, 9, '622160ec86754', 25, 'FREE SIZE', NULL, 1, '2022-03-04'),
(36, 9, '6222b5f84bb24', 43, 'M', 'Upload22030502032973264.png', 1, '2022-03-05'),
(37, 9, '6222ba4aef156', 32, 'M', NULL, 1, '2022-03-05'),
(38, 9, '6222ba4aef156', 43, 'M', 'Upload22030502032848027.jpg', 1, '2022-03-05'),
(39, 12, '6399d2bfba3b1', 44, 'M', NULL, 1, '2022-12-14'),
(40, 12, '6399d2bfba3b1', 34, 'M', NULL, 1, '2022-12-14'),
(41, 13, '63aaa13787062', 44, 'M', NULL, 1, '2022-12-27'),
(42, 8, '63aaa28515ecf', 44, 'L', NULL, 1, '2022-12-27'),
(43, 8, '63aaa28537151', 44, 'L', NULL, 1, '2022-12-27'),
(44, 8, '63aaa28561aac', 44, 'L', NULL, 1, '2022-12-27'),
(45, 8, '63aaa2858a3b6', 44, 'L', NULL, 1, '2022-12-27'),
(46, 8, '63aaa285afc4d', 44, 'L', NULL, 1, '2022-12-27'),
(47, 8, '63aaa285dfbb2', 44, 'L', NULL, 1, '2022-12-27'),
(48, 8, '63aaa28612e3a', 44, 'L', NULL, 1, '2022-12-27'),
(49, 8, '63aaa28641cd8', 44, 'L', NULL, 1, '2022-12-27'),
(50, 8, '63aaa35bbdb05', 36, 'FREE SIZE', NULL, 1, '2022-12-27'),
(51, 13, '63aaa3a19475f', 33, 'FREE SIZE', NULL, 1, '2022-12-27'),
(52, 13, '63aaaab71341e', 26, 'M', NULL, 1, '2022-12-27'),
(53, 13, '63aaaab71341e', 28, 'FREE SIZE', NULL, 1, '2022-12-27');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `danhmuc`
--

CREATE TABLE `danhmuc` (
  `id_danhmuc` int(11) NOT NULL,
  `tendanhmuc` varchar(200) DEFAULT NULL,
  `anhdanhmuc` text DEFAULT NULL,
  `show_danhmuc` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `danhmuc`
--

INSERT INTO `danhmuc` (`id_danhmuc`, `tendanhmuc`, `anhdanhmuc`, `show_danhmuc`) VALUES
(1, 'abc', 'Upload22012804014759262.jpg', 0),
(2, 'Áo thun mỹ', 'Upload22020606022851971.jpg', 1),
(3, 'Áo phông có tay', 'Upload22013107014881503.png', 0),
(4, 'Áo sơ mi', 'Upload22020103022247294.jpg', 1),
(5, 'Áo thun nữ', 'Upload22020103022785194.jpg', 1),
(6, 'Túi xách', 'logo_main.png', 0),
(7, 'sf', 'logo_main.png', 0),
(8, 'áo sơ mi', 'logo_main.png', 1),
(9, 'Áo sơ mi', 'logo_main.png', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `donhang`
--

CREATE TABLE `donhang` (
  `id_donhang` varchar(150) NOT NULL,
  `id_taikhoan` int(11) DEFAULT NULL,
  `tennguoinhan` varchar(200) NOT NULL,
  `sodienthoai` varchar(20) NOT NULL,
  `diachi` varchar(500) NOT NULL,
  `id_trangthaidonhang` int(11) DEFAULT NULL,
  `tongtien` double DEFAULT NULL,
  `ngaydathang` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `donhang`
--

INSERT INTO `donhang` (`id_donhang`, `id_taikhoan`, `tennguoinhan`, `sodienthoai`, `diachi`, `id_trangthaidonhang`, `tongtien`, `ngaydathang`) VALUES
('61fb541ec65e1', 5, 'duy', '0000', 'úadj', 2, 587000, '2022-02-03'),
('61fb64d9ca85d', 5, 'd', 'd', 'd', 1, 709000, '2022-02-03'),
('61fcfc285de8e', 5, 'duyi', '88', 'i9', 1, 1339000, '2022-02-04'),
('61fcfca8b3273', 5, 'vv', '00', '9', 3, 660000, '2022-02-04'),
('61fe0785a4e88', 6, 'duyv', 'mm', 'ịk', 4, 110000, '2022-02-05'),
('61feb731eddcc', 6, 'vv', '9', 'u8', 3, 389000, '2022-02-05'),
('61ff629f5cf96', 5, 'vvv', '000', 'yyy', 3, 290000, '2022-02-06'),
('62063c33ce6a2', 9, 'c', 'c', 'c', 4, 110000, '2022-02-11'),
('620e54d8e9ede', 10, 'oooo', '9999', '9999', 3, 884000, '2022-02-17'),
('620f18b127fda', 11, 'vvv', 'vvv', 'vvv', 4, 129000, '2022-02-18'),
('621dc3f649949', 9, 'jsjksbdq', 'nslfn', 'ábkf', 4, 580000, '2022-03-01'),
('621fa8ddadaaa', 8, 'c', '00', 'c', 1, 1259000, '2022-03-02'),
('622160ec86754', 9, 'vvv', '0000', 'úadj', 3, 110000, '2022-03-04'),
('6222b5f84bb24', 9, 'd', 'l', 'l', 3, 129000, '2022-03-05'),
('6222ba4aef156', 9, 's', 'k', 'k', 3, 3579000, '2022-03-05'),
('6399d2bfba3b1', 12, 'asd', 'asd', 'asd', 4, 587000, '2022-12-14'),
('63aaa13787062', 13, 'canh', '00000', '00000', 1, 290000, '2022-12-27'),
('63aaa28515ecf', 8, 'tao', '9', '9', 1, 290000, '2022-12-27'),
('63aaa28537151', 8, 'tao', '9', '9', 1, 290000, '2022-12-27'),
('63aaa28561aac', 8, 'tao', '9', '9', 1, 290000, '2022-12-27'),
('63aaa2858a3b6', 8, 'tao', '9', '9', 1, 290000, '2022-12-27'),
('63aaa285afc4d', 8, 'tao', '9', '9', 1, 290000, '2022-12-27'),
('63aaa285dfbb2', 8, 'tao', '9', '9', 1, 290000, '2022-12-27'),
('63aaa28612e3a', 8, 'tao', '9', '9', 1, 290000, '2022-12-27'),
('63aaa28641cd8', 8, 'tao', '9', '9', 1, 290000, '2022-12-27'),
('63aaa35bbdb05', 8, 'hạo', '0909090909', 'cần thơ', 1, 110000, '2022-12-27'),
('63aaa3a19475f', 13, 'Cảnh hello', '0909090909', 'HCM', 1, 190000, '2022-12-27'),
('63aaaab71341e', 13, 'canh', '0909090909', 'cần thơ', 3, 209000, '2022-12-27');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `giohang`
--

CREATE TABLE `giohang` (
  `id_taikhoan` int(11) DEFAULT NULL,
  `id_sanpham` int(11) DEFAULT NULL,
  `size` varchar(50) DEFAULT NULL,
  `sl` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `giohang`
--

INSERT INTO `giohang` (`id_taikhoan`, `id_sanpham`, `size`, `sl`) VALUES
(3, 12, 'M', 1),
(3, 14, 'L', 1),
(3, 19, 'FREE SIZE', 3),
(5, 14, 'L', 1),
(5, 22, 'FREE SIZE', 1),
(11, 34, 'S', 1),
(11, 42, 'FREE SIZE', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `loinhan`
--

CREATE TABLE `loinhan` (
  `id_loinhan` int(11) NOT NULL,
  `tennguoigui` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `loinhan` text DEFAULT NULL,
  `ngaygui` date DEFAULT NULL,
  `show_loinhan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `loinhan`
--

INSERT INTO `loinhan` (`id_loinhan`, `tennguoigui`, `email`, `loinhan`, `ngaygui`, `show_loinhan`) VALUES
(1, '', 'vv', 'vv', NULL, 0),
(2, 'vvv', 'đ', 'd', NULL, 0),
(3, 'vvvs', 'sss', 'ss', NULL, 0),
(4, 'v', 'vvv', 'v', NULL, 0),
(5, 'v', 'vvv', 'v', NULL, 0),
(6, 'v', 'v', 'v', NULL, 1),
(7, 's', 's', 's', NULL, 0),
(8, 'â', 'â', 'aa', NULL, 0),
(9, 'q', 'd', 'd', '2022-02-18', 0),
(10, 'du', '99.asnahsdashdjas@hasgas.com', 'Chúc mừng năm mới\r\n +9090909090\r\nFB\r\nINS\r\nTW\r\nYTB\r\n\r\n\r\nQUẢN TRỊ\r\nad\r\nTRANG CHỦ\r\nDANH MỤC\r\nSẢN PHẨM\r\nĐƠN HÀNG CỦA TÔI\r\nLIÊN HỆ\r\nĐể lại lời nhắn cho chúng tôi\r\n\r\nTên của bạn:\r\ndu\r\nĐịa chỉ email:\r\n99.asnahsdashdjas@hasgas.com\r\nLời nhắn:\r\nHoặc liên hệ trực tiếp qua:\r\n\r\nEmail: lienhe@abc.info\r\nSDT: 9090909090\r\nĐịa chỉ: 9, ngõ 7, thnafh phố BAC, NSN\r\nGIẢM GIÁ SHOCK\r\n\r\nEMBROIDERED BOBUI LOGO POLO/ RED\r\n98,000đ\r\n\r\n99,000đ\r\n\r\n\r\nEMBROIDERED BOBUI LOGO POLO/ RED\r\n98,000đ\r\n\r\n99,000đ\r\n\r\n\r\nEMBROIDERED LOGO SWEATER/ WHITE MELANGE\r\n50,000đ\r\n\r\n80,000đ\r\n\r\n\r\nEMBROIDERED LOGO SWEATER/ WHITE MELANGE\r\n50,000đ\r\n\r\n80,000đ\r\n\r\n\r\nEMBROIDERED LOGO SWEATER/ WHITE MELANGE\r\n50,000đ\r\n\r\n80,000đ\r\n\r\n\r\nLIGHTNING SKULL LOGO TEES/ BLACK\r\n90,000đ\r\n\r\n290,000đ\r\n\r\nXem nhiều hơn các sản phẩm...\r\n\r\n\r\n\r\n\r\n\r\nLiên kết:\r\n\r\nChính sách - Điều khoản\r\nKênh thương mại điện tử Shopee\r\nĐịa chỉ cửa hàng:\r\nSố 22/2 đường Nguyễn Tri Phương, Thành phố ABC, tỉnh CBCB\r\n\r\nEmail: abcd@info.com\r\nCOPYRIGHT © 2021 TRUONGDUY ® ALL RIGHT RESERVED.', '2022-03-02', 0),
(11, 'Bãi xe số 1 ', 'truongduy.vithanhcity@gmail.com', 'Chúc mừng năm mới\r\n +9090909090\r\nFB\r\nINS\r\nTW\r\nYTB\r\n\r\n\r\nQUẢN TRỊ\r\nad\r\nTRANG CHỦ\r\nDANH MỤC\r\nSẢN PHẨM\r\nĐƠN HÀNG CỦA TÔI\r\nLIÊN HỆ\r\nĐể lại lời nhắn cho chúng tôi\r\n\r\nTên của bạn:\r\ndu\r\nĐịa chỉ email:\r\n99.asnahsdashdjas@hasgas.com\r\nLời nhắn:\r\nHoặc liên hệ trực tiếp qua:\r\n\r\nEmail: lienhe@abc.info\r\nSDT: 9090909090\r\nĐịa chỉ: 9, ngõ 7, thnafh phố BAC, NSN\r\nGIẢM GIÁ SHOCK\r\n\r\nEMBROIDERED BOBUI LOGO POLO/ RED\r\n98,000đ\r\n\r\n99,000đ\r\n\r\n\r\nEMBROIDERED BOBUI LOGO POLO/ RED\r\n98,000đ\r\n\r\n99,000đ\r\n\r\n\r\nEMBROIDERED LOGO SWEATER/ WHITE MELANGE\r\n50,000đ\r\n\r\n80,000đ\r\n\r\n\r\nEMBROIDERED LOGO SWEATER/ WHITE MELANGE\r\n50,000đ\r\n\r\n80,000đ\r\n\r\n\r\nEMBROIDERED LOGO SWEATER/ WHITE MELANGE\r\n50,000đ\r\n\r\n80,000đ\r\n\r\n\r\nLIGHTNING SKULL LOGO TEES/ BLACK\r\n90,000đ\r\n\r\n290,000đ\r\n\r\nXem nhiều hơn các sản phẩm...\r\n\r\n\r\n\r\n\r\n\r\nLiên kết:\r\n\r\nChính sách - Điều khoản\r\nKênh thương mại điện tử Shopee\r\nĐịa chỉ cửa hàng:\r\nSố 22/2 đường Nguyễn Tri Phương, Thành phố ABC, tỉnh CBCB\r\n\r\nEmail: abcd@info.com\r\nCOPYRIGHT © 2021 TRUONGDUY ® ALL RIGHT RESERVED.', '2022-03-02', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sanpham`
--

CREATE TABLE `sanpham` (
  `id_sanpham` int(11) NOT NULL,
  `id_danhmuc` int(11) NOT NULL,
  `id_nguoitao` int(11) DEFAULT NULL,
  `tensanpham` varchar(500) DEFAULT NULL,
  `giacu` double DEFAULT NULL,
  `giamoi` double DEFAULT NULL,
  `anhsanpham1` text DEFAULT NULL,
  `anhsanpham2` text DEFAULT NULL,
  `anhsanpham3` text DEFAULT NULL,
  `anhsizechart` text DEFAULT NULL,
  `size_1` varchar(50) NOT NULL,
  `size_2` varchar(50) NOT NULL,
  `size_3` varchar(50) NOT NULL,
  `size_4` varchar(50) NOT NULL,
  `size_5` varchar(50) NOT NULL,
  `size_6` varchar(50) NOT NULL,
  `chitietsanpham` text DEFAULT NULL,
  `ngaytao` date DEFAULT NULL,
  `show_sanpham` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `sanpham`
--

INSERT INTO `sanpham` (`id_sanpham`, `id_danhmuc`, `id_nguoitao`, `tensanpham`, `giacu`, `giamoi`, `anhsanpham1`, `anhsanpham2`, `anhsanpham3`, `anhsizechart`, `size_1`, `size_2`, `size_3`, `size_4`, `size_5`, `size_6`, `chitietsanpham`, `ngaytao`, `show_sanpham`) VALUES
(12, 5, 1, 'LIGHTNING SKULL LOGO TEES/ BLACK', 90000, 290000, 'Upload22020103025032475.png', 'Upload22020103025081509.jpg', 'Upload22020103025011576.jpg', 'logo_main.png', 'S', 'M', 'L', '', '', '', '<p>VẢI CHÍNH (2 CHIỀU): 100% COTTON\\</p>\r\n\r\n<p><br />\r\nBO C&Ocirc;̉: 100% COTTON</p>\r\n\r\n<p><br />\r\nHỌA TI&Ecirc;́T SKULL: KỸ THUẬT K&Eacute;O LỤA THỦ C&Ocirc;NG KIỂU TRAME</p>\r\n\r\n<p><br />\r\nFORM OVERSIZED</p>\r\n', '2022-02-01', 1),
(13, 5, 1, 'EMBROIDERED LOGO SWEATER/ WHITE MELANGE', 50000, 80000, 'Upload22020103020519914.png', 'Upload2202010302051449.jpg', 'Upload22020103020581298.jpg', 'logo_main.png', 'FREE SIZE', '', '', '', '', '', '<p>VẢI CHÍNH: 95% MELANGE COTTON, 5% SPANDEX<br />\r\nBO C&Ocirc;̉: 95% MELANGE COTTON, 5% SPANDEX<br />\r\nBO TAY: 95% MELANGE COTTON, 5% SPANDEX<br />\r\nBO VẠT &Aacute;O: 95% MELANGE COTTON, 5% SPANDEX<br />\r\nANGEL MẶT TRƯỚC TH&Ecirc;U &Aacute;NH KIM<br />\r\nLOSTANGEL BO TAY: TH&Ecirc;U VI T&Iacute;NH<br />\r\nFORM BOXY</p>\r\n', '2022-02-01', 1),
(14, 5, 1, ' EMBROIDERED BOBUI LOGO POLO/ RED', 98000, 99000, 'Upload22020103025879227.png', 'Upload2202010302581030.jpg', 'Upload22020103025870722.jpg', 'logo_main.png', 'S', 'M', 'L', '', '', '', '<p>VẢI CHÍNH: 95% COTTON, 5% SPANDEX<br />\r\nBO C&Ocirc;̉: 95% COTTON, 5% SPANDEX<br />\r\nHỌA TI&Ecirc;́T LOGO NGỰC TR&Aacute;I: TH&Ecirc;U VI TÍNH<br />\r\nHỌA TIẾT KẼM BO CỔ: TH&Ecirc;U VI T&Iacute;NH<br />\r\nN&Uacute;T KHUY BOBUI<br />\r\nFORM OVERSIZED</p>\r\n', '2022-02-01', 1),
(15, 5, 1, 'LIGHTNING SKULL LOGO TEES/ BLACK', 90000, 290000, 'Upload22020103025032475.png', 'Upload22020103025081509.jpg', 'Upload22020103025011576.jpg', 'logo_main.png', 'S', 'M', 'L', '', '', '', '<p>VẢI CHÍNH (2 CHIỀU): 100% COTTON\\</p>\r\n\r\n<p><br />\r\nBO C&Ocirc;̉: 100% COTTON</p>\r\n\r\n<p><br />\r\nHỌA TI&Ecirc;́T SKULL: KỸ THUẬT K&Eacute;O LỤA THỦ C&Ocirc;NG KIỂU TRAME</p>\r\n\r\n<p><br />\r\nFORM OVERSIZED</p>\r\n', '2022-02-01', 1),
(16, 5, 1, 'EMBROIDERED LOGO SWEATER/ WHITE MELANGE', 50000, 80000, 'Upload22020103020519914.png', 'Upload2202010302051449.jpg', 'Upload22020103020581298.jpg', 'logo_main.png', 'FREE SIZE', '', '', '', '', '', '<p>VẢI CHÍNH: 95% MELANGE COTTON, 5% SPANDEX<br />\r\nBO C&Ocirc;̉: 95% MELANGE COTTON, 5% SPANDEX<br />\r\nBO TAY: 95% MELANGE COTTON, 5% SPANDEX<br />\r\nBO VẠT &Aacute;O: 95% MELANGE COTTON, 5% SPANDEX<br />\r\nANGEL MẶT TRƯỚC TH&Ecirc;U &Aacute;NH KIM<br />\r\nLOSTANGEL BO TAY: TH&Ecirc;U VI T&Iacute;NH<br />\r\nFORM BOXY</p>\r\n', '2022-02-01', 1),
(17, 5, 1, ' EMBROIDERED BOBUI LOGO POLO/ RED', 98000, 99000, 'Upload22020103025879227.png', 'Upload2202010302581030.jpg', 'Upload22020103025870722.jpg', 'logo_main.png', 'S', 'M', 'L', '', '', '', '<p>VẢI CHÍNH: 95% COTTON, 5% SPANDEX<br />\r\nBO C&Ocirc;̉: 95% COTTON, 5% SPANDEX<br />\r\nHỌA TI&Ecirc;́T LOGO NGỰC TR&Aacute;I: TH&Ecirc;U VI TÍNH<br />\r\nHỌA TIẾT KẼM BO CỔ: TH&Ecirc;U VI T&Iacute;NH<br />\r\nN&Uacute;T KHUY BOBUI<br />\r\nFORM OVERSIZED</p>\r\n', '2022-02-01', 1),
(18, 5, 1, 'LIGHTNING SKULL LOGO TEES/ BLACK', 90000, 290000, 'Upload22020103025032475.png', 'Upload22020103025081509.jpg', 'Upload22020103025011576.jpg', 'logo_main.png', 'S', 'M', 'L', '', '', '', '<p>VẢI CHÍNH (2 CHIỀU): 100% COTTON\\</p>\r\n\r\n<p><br />\r\nBO C&Ocirc;̉: 100% COTTON</p>\r\n\r\n<p><br />\r\nHỌA TI&Ecirc;́T SKULL: KỸ THUẬT K&Eacute;O LỤA THỦ C&Ocirc;NG KIỂU TRAME</p>\r\n\r\n<p><br />\r\nFORM OVERSIZED</p>\r\n', '2022-02-01', 1),
(19, 5, 1, 'EMBROIDERED LOGO SWEATER/ WHITE MELANGE', 50000, 80000, 'Upload22020103020519914.png', 'Upload2202010302051449.jpg', 'Upload22020103020581298.jpg', 'logo_main.png', 'FREE SIZE', '', '', '', '', '', '<p>VẢI CHÍNH: 95% MELANGE COTTON, 5% SPANDEX<br />\r\nBO C&Ocirc;̉: 95% MELANGE COTTON, 5% SPANDEX<br />\r\nBO TAY: 95% MELANGE COTTON, 5% SPANDEX<br />\r\nBO VẠT &Aacute;O: 95% MELANGE COTTON, 5% SPANDEX<br />\r\nANGEL MẶT TRƯỚC TH&Ecirc;U &Aacute;NH KIM<br />\r\nLOSTANGEL BO TAY: TH&Ecirc;U VI T&Iacute;NH<br />\r\nFORM BOXY</p>\r\n', '2022-02-01', 1),
(20, 5, 1, ' EMBROIDERED BOBUI LOGO POLO/ RED', 98000, 99000, 'Upload22020103025879227.png', 'Upload2202010302581030.jpg', 'Upload22020103025870722.jpg', 'logo_main.png', 'S', 'M', 'L', '', '', '', '<p>VẢI CHÍNH: 95% COTTON, 5% SPANDEX<br />\r\nBO C&Ocirc;̉: 95% COTTON, 5% SPANDEX<br />\r\nHỌA TI&Ecirc;́T LOGO NGỰC TR&Aacute;I: TH&Ecirc;U VI TÍNH<br />\r\nHỌA TIẾT KẼM BO CỔ: TH&Ecirc;U VI T&Iacute;NH<br />\r\nN&Uacute;T KHUY BOBUI<br />\r\nFORM OVERSIZED</p>\r\n', '2022-02-01', 1),
(21, 5, 1, 'LIGHTNING SKULL LOGO TEES/ BLACK', 90000, 290000, 'Upload22020103025032475.png', 'Upload22020103025081509.jpg', 'Upload22020103025011576.jpg', 'logo_main.png', 'S', 'M', 'L', '', '', '', '<p>VẢI CHÍNH (2 CHIỀU): 100% COTTON\\</p>\r\n\r\n<p><br />\r\nBO C&Ocirc;̉: 100% COTTON</p>\r\n\r\n<p><br />\r\nHỌA TI&Ecirc;́T SKULL: KỸ THUẬT K&Eacute;O LỤA THỦ C&Ocirc;NG KIỂU TRAME</p>\r\n\r\n<p><br />\r\nFORM OVERSIZED</p>\r\n', '2022-02-01', 1),
(22, 5, 1, 'EMBROIDERED LOGO SWEATER/ WHITE MELANGE', 50000, 80000, 'Upload22020103020519914.png', 'Upload2202010302051449.jpg', 'Upload22020103020581298.jpg', 'logo_main.png', 'FREE SIZE', '', '', '', '', '', '<p>VẢI CHÍNH: 95% MELANGE COTTON, 5% SPANDEX<br />\r\nBO C&Ocirc;̉: 95% MELANGE COTTON, 5% SPANDEX<br />\r\nBO TAY: 95% MELANGE COTTON, 5% SPANDEX<br />\r\nBO VẠT &Aacute;O: 95% MELANGE COTTON, 5% SPANDEX<br />\r\nANGEL MẶT TRƯỚC TH&Ecirc;U &Aacute;NH KIM<br />\r\nLOSTANGEL BO TAY: TH&Ecirc;U VI T&Iacute;NH<br />\r\nFORM BOXY</p>\r\n', '2022-02-01', 1),
(23, 5, 1, ' EMBROIDERED BOBUI LOGO POLO/ RED', 98000, 99000, 'Upload22020103025879227.png', 'Upload2202010302581030.jpg', 'Upload22020103025870722.jpg', 'logo_main.png', 'S', 'M', 'L', '', '', '', '<p>VẢI CHÍNH: 95% COTTON, 5% SPANDEX<br />\r\nBO C&Ocirc;̉: 95% COTTON, 5% SPANDEX<br />\r\nHỌA TI&Ecirc;́T LOGO NGỰC TR&Aacute;I: TH&Ecirc;U VI TÍNH<br />\r\nHỌA TIẾT KẼM BO CỔ: TH&Ecirc;U VI T&Iacute;NH<br />\r\nN&Uacute;T KHUY BOBUI<br />\r\nFORM OVERSIZED</p>\r\n', '2022-02-01', 1),
(24, 3, 1, 'LIGHTNING SKULL LOGO TEES/ BLACK', 90000, 290000, 'Upload22020103025032475.png', 'Upload22020103025081509.jpg', 'Upload22020103025011576.jpg', 'logo_main.png', 'S', 'M', 'L', '', '', '', '<p>VẢI CHÍNH (2 CHIỀU): 100% COTTON\\</p>\r\n\r\n<p><br />\r\nBO C&Ocirc;̉: 100% COTTON</p>\r\n\r\n<p><br />\r\nHỌA TI&Ecirc;́T SKULL: KỸ THUẬT K&Eacute;O LỤA THỦ C&Ocirc;NG KIỂU TRAME</p>\r\n\r\n<p><br />\r\nFORM OVERSIZED</p>\r\n', '2022-02-01', 1),
(25, 5, 1, 'EMBROIDERED LOGO SWEATER/ WHITE MELANGE', 50000, 80000, 'Upload22020103020519914.png', 'Upload2202010302051449.jpg', 'Upload22020103020581298.jpg', 'logo_main.png', 'FREE SIZE', '', '', '', '', '', '<p>VẢI CHÍNH: 95% MELANGE COTTON, 5% SPANDEX<br />\r\nBO C&Ocirc;̉: 95% MELANGE COTTON, 5% SPANDEX<br />\r\nBO TAY: 95% MELANGE COTTON, 5% SPANDEX<br />\r\nBO VẠT &Aacute;O: 95% MELANGE COTTON, 5% SPANDEX<br />\r\nANGEL MẶT TRƯỚC TH&Ecirc;U &Aacute;NH KIM<br />\r\nLOSTANGEL BO TAY: TH&Ecirc;U VI T&Iacute;NH<br />\r\nFORM BOXY</p>\r\n', '2022-02-01', 1),
(26, 5, 1, ' EMBROIDERED BOBUI LOGO POLO/ RED', 98000, 99000, 'Upload22020103025879227.png', 'Upload2202010302581030.jpg', 'Upload22020103025870722.jpg', 'logo_main.png', 'S', 'M', 'L', '', '', '', '<p>VẢI CHÍNH: 95% COTTON, 5% SPANDEX<br />\r\nBO C&Ocirc;̉: 95% COTTON, 5% SPANDEX<br />\r\nHỌA TI&Ecirc;́T LOGO NGỰC TR&Aacute;I: TH&Ecirc;U VI TÍNH<br />\r\nHỌA TIẾT KẼM BO CỔ: TH&Ecirc;U VI T&Iacute;NH<br />\r\nN&Uacute;T KHUY BOBUI<br />\r\nFORM OVERSIZED</p>\r\n', '2022-02-01', 1),
(27, 5, 1, 'LIGHTNING SKULL LOGO TEES/ BLACK', 90000, 290000, 'Upload22020103025032475.png', 'Upload22020103025081509.jpg', 'Upload22020103025011576.jpg', 'logo_main.png', 'S', 'M', 'L', '', '', '', '<p>VẢI CHÍNH (2 CHIỀU): 100% COTTON\\</p>\r\n\r\n<p><br />\r\nBO C&Ocirc;̉: 100% COTTON</p>\r\n\r\n<p><br />\r\nHỌA TI&Ecirc;́T SKULL: KỸ THUẬT K&Eacute;O LỤA THỦ C&Ocirc;NG KIỂU TRAME</p>\r\n\r\n<p><br />\r\nFORM OVERSIZED</p>\r\n', '2022-02-01', 1),
(28, 5, 1, 'EMBROIDERED LOGO SWEATER/ WHITE MELANGE', 50000, 80000, 'Upload22020103020519914.png', 'Upload2202010302051449.jpg', 'Upload22020103020581298.jpg', 'logo_main.png', 'FREE SIZE', '', '', '', '', '', '<p>VẢI CHÍNH: 95% MELANGE COTTON, 5% SPANDEX<br />\r\nBO C&Ocirc;̉: 95% MELANGE COTTON, 5% SPANDEX<br />\r\nBO TAY: 95% MELANGE COTTON, 5% SPANDEX<br />\r\nBO VẠT &Aacute;O: 95% MELANGE COTTON, 5% SPANDEX<br />\r\nANGEL MẶT TRƯỚC TH&Ecirc;U &Aacute;NH KIM<br />\r\nLOSTANGEL BO TAY: TH&Ecirc;U VI T&Iacute;NH<br />\r\nFORM BOXY</p>\r\n', '2022-02-01', 1),
(29, 5, 1, ' EMBROIDERED BOBUI LOGO POLO/ RED', 98000, 99000, 'Upload22020103025879227.png', 'Upload2202010302581030.jpg', 'Upload22020103025870722.jpg', 'logo_main.png', 'S', 'M', 'L', '', '', '', '<p>VẢI CHÍNH: 95% COTTON, 5% SPANDEX<br />\r\nBO C&Ocirc;̉: 95% COTTON, 5% SPANDEX<br />\r\nHỌA TI&Ecirc;́T LOGO NGỰC TR&Aacute;I: TH&Ecirc;U VI TÍNH<br />\r\nHỌA TIẾT KẼM BO CỔ: TH&Ecirc;U VI T&Iacute;NH<br />\r\nN&Uacute;T KHUY BOBUI<br />\r\nFORM OVERSIZED</p>\r\n', '2022-02-01', 1),
(30, 5, 1, 'LIGHTNING SKULL LOGO TEES/ BLACK', 90000, 290000, 'Upload22020103025032475.png', 'Upload22020103025081509.jpg', 'Upload22020103025011576.jpg', 'logo_main.png', 'S', 'M', 'L', '', '', '', '<p>VẢI CHÍNH (2 CHIỀU): 100% COTTON\\</p>\r\n\r\n<p><br />\r\nBO C&Ocirc;̉: 100% COTTON</p>\r\n\r\n<p><br />\r\nHỌA TI&Ecirc;́T SKULL: KỸ THUẬT K&Eacute;O LỤA THỦ C&Ocirc;NG KIỂU TRAME</p>\r\n\r\n<p><br />\r\nFORM OVERSIZED</p>\r\n', '2022-02-01', 1),
(31, 5, 1, 'EMBROIDERED LOGO SWEATER/ WHITE MELANGE', 50000, 80000, 'Upload22020103020519914.png', 'Upload2202010302051449.jpg', 'Upload22020103020581298.jpg', 'logo_main.png', 'FREE SIZE', '', '', '', '', '', '<p>VẢI CHÍNH: 95% MELANGE COTTON, 5% SPANDEX<br />\r\nBO C&Ocirc;̉: 95% MELANGE COTTON, 5% SPANDEX<br />\r\nBO TAY: 95% MELANGE COTTON, 5% SPANDEX<br />\r\nBO VẠT &Aacute;O: 95% MELANGE COTTON, 5% SPANDEX<br />\r\nANGEL MẶT TRƯỚC TH&Ecirc;U &Aacute;NH KIM<br />\r\nLOSTANGEL BO TAY: TH&Ecirc;U VI T&Iacute;NH<br />\r\nFORM BOXY</p>\r\n', '2022-02-01', 0),
(32, 5, 1, 'LIGHTNING SKULL LOGO TEES/ BLACK', 90000, 290000, 'Upload22020103025032475.png', 'Upload22020103025081509.jpg', 'Upload22020103025011576.jpg', 'logo_main.png', 'S', 'M', 'L', '', '', '', '<p>VẢI CHÍNH (2 CHIỀU): 100% COTTON\\</p>\r\n\r\n<p><br />\r\nBO C&Ocirc;̉: 100% COTTON</p>\r\n\r\n<p><br />\r\nHỌA TI&Ecirc;́T SKULL: KỸ THUẬT K&Eacute;O LỤA THỦ C&Ocirc;NG KIỂU TRAME</p>\r\n\r\n<p><br />\r\nFORM OVERSIZED</p>\r\n', '2022-02-01', 1),
(33, 5, 1, 'EMBROIDERED LOGO SWEATER/ WHITE MELANGE', 50000, 80000, 'Upload22020103020519914.png', 'Upload2202010302051449.jpg', 'Upload22020103020581298.jpg', 'logo_main.png', 'FREE SIZE', '', '', '', '', '', '<p>VẢI CHÍNH: 95% MELANGE COTTON, 5% SPANDEX<br />\r\nBO C&Ocirc;̉: 95% MELANGE COTTON, 5% SPANDEX<br />\r\nBO TAY: 95% MELANGE COTTON, 5% SPANDEX<br />\r\nBO VẠT &Aacute;O: 95% MELANGE COTTON, 5% SPANDEX<br />\r\nANGEL MẶT TRƯỚC TH&Ecirc;U &Aacute;NH KIM<br />\r\nLOSTANGEL BO TAY: TH&Ecirc;U VI T&Iacute;NH<br />\r\nFORM BOXY</p>\r\n', '2022-02-01', 1),
(34, 5, 1, ' EMBROIDERED BOBUI LOGO POLO/ RED', 98000, 99000, 'Upload22020103025879227.png', 'Upload2202010302581030.jpg', 'Upload22020103025870722.jpg', 'logo_main.png', 'S', 'M', 'L', '', '', '', '<p>VẢI CHÍNH: 95% COTTON, 5% SPANDEX<br />\r\nBO C&Ocirc;̉: 95% COTTON, 5% SPANDEX<br />\r\nHỌA TI&Ecirc;́T LOGO NGỰC TR&Aacute;I: TH&Ecirc;U VI TÍNH<br />\r\nHỌA TIẾT KẼM BO CỔ: TH&Ecirc;U VI T&Iacute;NH<br />\r\nN&Uacute;T KHUY BOBUI<br />\r\nFORM OVERSIZED</p>\r\n', '2022-02-01', 1),
(35, 5, 1, 'LIGHTNING SKULL LOGO TEES/ BLACK', 90000, 290000, 'Upload22020103025032475.png', 'Upload22020103025081509.jpg', 'Upload22020103025011576.jpg', 'logo_main.png', 'S', 'M', 'L', '', '', '', '<p>VẢI CHÍNH (2 CHIỀU): 100% COTTON\\</p>\r\n\r\n<p><br />\r\nBO C&Ocirc;̉: 100% COTTON</p>\r\n\r\n<p><br />\r\nHỌA TI&Ecirc;́T SKULL: KỸ THUẬT K&Eacute;O LỤA THỦ C&Ocirc;NG KIỂU TRAME</p>\r\n\r\n<p><br />\r\nFORM OVERSIZED</p>\r\n', '2022-02-01', 1),
(36, 5, 1, 'EMBROIDERED LOGO SWEATER/ WHITE MELANGE', 50000, 80000, 'Upload22020103020519914.png', 'Upload2202010302051449.jpg', 'Upload22020103020581298.jpg', 'logo_main.png', 'FREE SIZE', '', '', '', '', '', '<p>VẢI CHÍNH: 95% MELANGE COTTON, 5% SPANDEX<br />\r\nBO C&Ocirc;̉: 95% MELANGE COTTON, 5% SPANDEX<br />\r\nBO TAY: 95% MELANGE COTTON, 5% SPANDEX<br />\r\nBO VẠT &Aacute;O: 95% MELANGE COTTON, 5% SPANDEX<br />\r\nANGEL MẶT TRƯỚC TH&Ecirc;U &Aacute;NH KIM<br />\r\nLOSTANGEL BO TAY: TH&Ecirc;U VI T&Iacute;NH<br />\r\nFORM BOXY</p>\r\n', '2022-02-01', 1),
(37, 5, 1, ' EMBROIDERED BOBUI LOGO POLO/ RED', 98000, 99000, 'Upload22020103025879227.png', 'Upload2202010302581030.jpg', 'Upload22020103025870722.jpg', 'logo_main.png', 'S', 'M', 'L', '', '', '', '<p>VẢI CHÍNH: 95% COTTON, 5% SPANDEX<br />\r\nBO C&Ocirc;̉: 95% COTTON, 5% SPANDEX<br />\r\nHỌA TI&Ecirc;́T LOGO NGỰC TR&Aacute;I: TH&Ecirc;U VI TÍNH<br />\r\nHỌA TIẾT KẼM BO CỔ: TH&Ecirc;U VI T&Iacute;NH<br />\r\nN&Uacute;T KHUY BOBUI<br />\r\nFORM OVERSIZED</p>\r\n', '2022-02-01', 1),
(38, 5, 1, 'LIGHTNING SKULL LOGO TEES/ BLACK', 90000, 290000, 'Upload22020103025032475.png', 'Upload22020103025081509.jpg', 'Upload22020103025011576.jpg', 'logo_main.png', 'S', 'M', 'L', '', '', '', '<p>VẢI CHÍNH (2 CHIỀU): 100% COTTON\\</p>\r\n\r\n<p><br />\r\nBO C&Ocirc;̉: 100% COTTON</p>\r\n\r\n<p><br />\r\nHỌA TI&Ecirc;́T SKULL: KỸ THUẬT K&Eacute;O LỤA THỦ C&Ocirc;NG KIỂU TRAME</p>\r\n\r\n<p><br />\r\nFORM OVERSIZED</p>\r\n', '2022-02-01', 1),
(39, 5, 1, 'EMBROIDERED LOGO SWEATER/ WHITE MELANGE', 50000, 80000, 'Upload22020103020519914.png', 'Upload2202010302051449.jpg', 'Upload22020103020581298.jpg', 'logo_main.png', 'FREE SIZE', '', '', '', '', '', '<p>VẢI CHÍNH: 95% MELANGE COTTON, 5% SPANDEX<br />\r\nBO C&Ocirc;̉: 95% MELANGE COTTON, 5% SPANDEX<br />\r\nBO TAY: 95% MELANGE COTTON, 5% SPANDEX<br />\r\nBO VẠT &Aacute;O: 95% MELANGE COTTON, 5% SPANDEX<br />\r\nANGEL MẶT TRƯỚC TH&Ecirc;U &Aacute;NH KIM<br />\r\nLOSTANGEL BO TAY: TH&Ecirc;U VI T&Iacute;NH<br />\r\nFORM BOXY</p>\r\n', '2022-02-01', 0),
(40, 1, 1, ' EMBROIDERED BOBUI LOGO POLO/ RED', 98000, 99000, 'Upload22020103025879227.png', 'Upload2202010302581030.jpg', 'Upload22020103025870722.jpg', 'logo_main.png', 'S', 'M', 'L', '', '', '', '<p>VẢI CHÍNH: 95% COTTON, 5% SPANDEX<br />\r\nBO C&Ocirc;̉: 95% COTTON, 5% SPANDEX<br />\r\nHỌA TI&Ecirc;́T LOGO NGỰC TR&Aacute;I: TH&Ecirc;U VI TÍNH<br />\r\nHỌA TIẾT KẼM BO CỔ: TH&Ecirc;U VI T&Iacute;NH<br />\r\nN&Uacute;T KHUY BOBUI<br />\r\nFORM OVERSIZED</p>\r\n', '2022-02-01', 0),
(41, 4, 1, 'LIGHTNING SKULL LOGO TEES/ BLACK', 90000, 290000, 'Upload22020103025032475.png', 'Upload22020103025081509.jpg', 'Upload22020103025011576.jpg', 'logo_main.png', 'S', 'M', 'L', '', '', '', '<p>VẢI CHÍNH (2 CHIỀU): 100% COTTON\\</p>\r\n\r\n<p><br />\r\nBO C&Ocirc;̉: 100% COTTON</p>\r\n\r\n<p><br />\r\nHỌA TI&Ecirc;́T SKULL: KỸ THUẬT K&Eacute;O LỤA THỦ C&Ocirc;NG KIỂU TRAME</p>\r\n\r\n<p><br />\r\nFORM OVERSIZED</p>\r\n', '2022-02-01', 0),
(42, 1, 1, 'EMBROIDERED ', 50000, 80000, 'Upload22020103020519914.png', 'Upload2202010302051449.jpg', 'Upload22020103020581298.jpg', 'logo_main.png', 'FREE SIZE', '', '', '', '', '', '<p>VẢI CHÍNH: 95% MELANGE COTTON, 5% SPANDEX<br />\r\nBO C&Ocirc;̉: 95% MELANGE COTTON, 5% SPANDEX<br />\r\nBO TAY: 95% MELANGE COTTON, 5% SPANDEX<br />\r\nBO VẠT &Aacute;O: 95% MELANGE COTTON, 5% SPANDEX<br />\r\nANGEL MẶT TRƯỚC TH&Ecirc;U &Aacute;NH KIM<br />\r\nLOSTANGEL BO TAY: TH&Ecirc;U VI T&Iacute;NH<br />\r\nFORM BOXY</p>\r\n', '2022-02-01', 1),
(43, 2, 1, ' EMBROIDERED BOBUI LOGO POLO/ RED', 98000, 99000, 'Upload22121605123126260.jpg', 'Upload22121605123180369.jpg', 'Upload22020103025870722.jpg', 'logo_main.png', 'S', 'M', 'L', '', '', '', '<p>VẢI CHÍNH: 95% COTTON, 5% SPANDEX<br />\r\nBO C&Ocirc;̉: 95% COTTON, 5% SPANDEX<br />\r\nHỌA TI&Ecirc;́T LOGO NGỰC TR&Aacute;I: TH&Ecirc;U VI TÍNH<br />\r\nHỌA TIẾT KẼM BO CỔ: TH&Ecirc;U VI T&Iacute;NH<br />\r\nN&Uacute;T KHUY BOBUI<br />\r\nFORM OVERSIZED</p>\r\n', '2022-02-01', 1),
(44, 4, 1, 'LIGHTNING SKULL LOGO TEES/ BLACK', 90000, 290000, 'Upload22020103025032475.png', 'Upload22020103025081509.jpg', 'Upload22020103025011576.jpg', 'logo_main.png', 'S', 'M', 'L', '', '', '', '<p>VẢI CHÍNH (2 CHIỀU): 100% COTTON\\</p>\r\n\r\n<p><br />\r\nBO C&Ocirc;̉: 100% COTTON</p>\r\n\r\n<p><br />\r\nHỌA TI&Ecirc;́T SKULL: KỸ THUẬT K&Eacute;O LỤA THỦ C&Ocirc;NG KIỂU TRAME</p>\r\n\r\n<p><br />\r\nFORM OVERSIZED</p>\r\n', '2022-02-01', 1),
(45, 4, 1, 'EMBROIDERED LOGO SWEATER/ WHITE MELANGE', 50000, 80000, 'Upload22020103020519914.png', 'Upload2202010302051449.jpg', 'Upload22020103020581298.jpg', 'logo_main.png', 'FREE SIZE', '', '', '', '', '', '<p>VẢI CHÍNH: 95% MELANGE COTTON, 5% SPANDEX<br />\r\nBO C&Ocirc;̉: 95% MELANGE COTTON, 5% SPANDEX<br />\r\nBO TAY: 95% MELANGE COTTON, 5% SPANDEX<br />\r\nBO VẠT &Aacute;O: 95% MELANGE COTTON, 5% SPANDEX<br />\r\nANGEL MẶT TRƯỚC TH&Ecirc;U &Aacute;NH KIM<br />\r\nLOSTANGEL BO TAY: TH&Ecirc;U VI T&Iacute;NH<br />\r\nFORM BOXY</p>\r\n', '2022-02-01', 0),
(46, 4, 1, 'Áo Khoác Lá Cổ Y Nguyên Bản 18+ Ver71', 179000, 169000, 'Upload22121402125424555.jpg', 'Upload22121402125475748.jpg', 'logo_main.png', 'logo_main.png', 'S', 'M', 'L', '', '', '', '<p>M&ocirc; tả sản phẩm</p>\r\n\r\n<p>&Aacute;o Kho&aacute;c L&aacute; Cổ Y Nguy&ecirc;n Bản 18+ Ver71<br />\r\nChất liệu: CRINKLE NYLON<br />\r\nTh&agrave;nh phần: 100% Nylon<br />\r\n- Độ bền<br />\r\n- Chống tia UV<br />\r\n- Trượt nước<br />\r\n(*) Nước c&oacute; thể thấm qua d&acirc;y k&eacute;o đường may<br />\r\n+ Họa tiết th&ecirc;u thường + viền g&acirc;n phản quang<br />\r\n+ Lớp l&oacute;t lưới b&ecirc;n trong<br />\r\n+ Thun co gi&atilde;n cổ tay v&agrave; gấu &aacute;o<br />\r\n+ Hai t&uacute;i trước c&oacute; d&acirc;y k&eacute;o</p>\r\n', '2022-12-14', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `taikhoan`
--

CREATE TABLE `taikhoan` (
  `id_taikhoan` int(11) NOT NULL,
  `tentaikhoan` varchar(100) DEFAULT NULL,
  `matkhau` text DEFAULT NULL,
  `email` text NOT NULL,
  `lv` int(11) NOT NULL,
  `ngaytao` date DEFAULT NULL,
  `show_taikhoan` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `taikhoan`
--

INSERT INTO `taikhoan` (`id_taikhoan`, `tentaikhoan`, `matkhau`, `email`, `lv`, `ngaytao`, `show_taikhoan`) VALUES
(1, 'duy', NULL, '', 0, NULL, NULL),
(3, 'duyko', '00ddf8d8e0431012fe47630031ab9245', '', 1, '2022-02-01', 1),
(4, 'duyko', '89a9a7ad2092ad98fdd54f1519f589de', '', 1, '2022-02-01', 1),
(5, 'tduy', 'dcfcd07e645d245babe887e5e2daa016', '', 1, '2022-02-03', 1),
(6, 'duyabc', 'dcfcd07e645d245babe887e5e2daa016', '', 1, '2022-02-05', 1),
(7, 'zzz', '839ad0a86347fe9f6b8d16123d098287', '', 1, '2022-02-09', 1),
(8, 'ad', '28c8edde3d61a0411511d3b1866f0636', '', 2, '2022-02-09', 1),
(9, 'abc', '28c8edde3d61a0411511d3b1866f0636', '', 1, '2022-02-11', 1),
(10, 'truongduy', '82f26dea803018bec9e6c135c540b4cd', '', 2, '2022-02-16', 1),
(11, 'bbb', 'c1c25df8f8f22eefed0ef135c19b8394', 'bb', 1, '2022-02-18', 0),
(12, 'bayeu', 'c97cccbc3080944fc4b312467034fc84', 'ba@b.com', 2, '2022-12-14', 1),
(13, 'canh', 'dcfcd07e645d245babe887e5e2daa016', '0', 2, '2022-12-27', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tokens`
--

CREATE TABLE `tokens` (
  `id_token` int(11) NOT NULL,
  `id_taikhoan` int(11) DEFAULT NULL,
  `token` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tokens`
--

INSERT INTO `tokens` (`id_token`, `id_taikhoan`, `token`) VALUES
(1, 3, '9f2f53dafbeedd5098282c29f31463fa'),
(2, 5, 'cb875270dadf239955b8899d3e838164'),
(3, 5, 'a0f53756c04b4f8c72c03a2e4f831fba'),
(4, 5, '858f2e61e4fdccda6af9a515cb3e5f91'),
(5, 5, ''),
(6, 6, ''),
(7, 5, ''),
(8, 7, ''),
(9, 8, ''),
(10, 9, ''),
(11, 8, 'ea25f52e5958f833f97a84fa72417bd3'),
(12, 8, ''),
(13, 9, ''),
(14, 8, ''),
(15, 10, ''),
(16, 10, ''),
(17, 11, ''),
(18, 11, ''),
(19, 11, ''),
(20, 11, ''),
(21, 8, 'a2e67e25c2604af5fca30886a52a05c5'),
(22, 9, ''),
(23, 8, 'b30525be9ca8ff5b3cff113bfdf9c0d6'),
(24, 9, ''),
(25, 8, '49aa7542e31cc665866c5a1f35845664'),
(26, 8, ''),
(27, 9, ''),
(28, 9, ''),
(29, 8, ''),
(30, 9, ''),
(31, 8, '8287d27bbefe7b0aa9687235bdbcefbf'),
(32, 9, '85fdc732fb5fdeb3ffcedf9aa65cf7ed'),
(33, 8, ''),
(34, 8, ''),
(35, 8, '002f36ec7b8e8afd87ad41b84a762bf8'),
(36, 8, '6804348d48eaf955060c94333f5b9964'),
(37, 12, ''),
(38, 12, ''),
(39, 12, ''),
(40, 12, '0c544d360670826abf49e0fea829bdf6'),
(41, 8, ''),
(42, 13, ''),
(43, 8, ''),
(44, 13, ''),
(45, 8, ''),
(46, 13, '4f274f9734fdcfe48c139b576e5a19ae'),
(47, 8, ''),
(48, 8, ''),
(49, 13, '0ecd3a3e55702a9c8a2e4d6059b00e8c');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `trangthaidonhang`
--

CREATE TABLE `trangthaidonhang` (
  `id_trangthaidonhang` int(11) NOT NULL,
  `tentrangthaidonhang` varchar(150) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `trangthaidonhang`
--

INSERT INTO `trangthaidonhang` (`id_trangthaidonhang`, `tentrangthaidonhang`) VALUES
(1, 'Đã xác nhận'),
(2, 'Đang giao hàng'),
(3, 'Hoàn thành'),
(4, 'Đã hủy');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `banner`
--
ALTER TABLE `banner`
  ADD PRIMARY KEY (`id_banner`);

--
-- Chỉ mục cho bảng `chitietdonhang`
--
ALTER TABLE `chitietdonhang`
  ADD KEY `id_donhang` (`id_donhang`),
  ADD KEY `id_sanpham` (`id_sanpham`);

--
-- Chỉ mục cho bảng `danhgia`
--
ALTER TABLE `danhgia`
  ADD PRIMARY KEY (`id_danhgia`);

--
-- Chỉ mục cho bảng `danhmuc`
--
ALTER TABLE `danhmuc`
  ADD PRIMARY KEY (`id_danhmuc`);

--
-- Chỉ mục cho bảng `donhang`
--
ALTER TABLE `donhang`
  ADD PRIMARY KEY (`id_donhang`),
  ADD KEY `id_taikhoan` (`id_taikhoan`),
  ADD KEY `id_trangthaidonhang` (`id_trangthaidonhang`);

--
-- Chỉ mục cho bảng `loinhan`
--
ALTER TABLE `loinhan`
  ADD PRIMARY KEY (`id_loinhan`);

--
-- Chỉ mục cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  ADD PRIMARY KEY (`id_sanpham`),
  ADD KEY `id_danhmuc` (`id_danhmuc`),
  ADD KEY `id_nguoitao` (`id_nguoitao`);

--
-- Chỉ mục cho bảng `taikhoan`
--
ALTER TABLE `taikhoan`
  ADD PRIMARY KEY (`id_taikhoan`);

--
-- Chỉ mục cho bảng `tokens`
--
ALTER TABLE `tokens`
  ADD PRIMARY KEY (`id_token`),
  ADD KEY `id_taikhoan` (`id_taikhoan`);

--
-- Chỉ mục cho bảng `trangthaidonhang`
--
ALTER TABLE `trangthaidonhang`
  ADD PRIMARY KEY (`id_trangthaidonhang`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `banner`
--
ALTER TABLE `banner`
  MODIFY `id_banner` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `danhgia`
--
ALTER TABLE `danhgia`
  MODIFY `id_danhgia` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT cho bảng `danhmuc`
--
ALTER TABLE `danhmuc`
  MODIFY `id_danhmuc` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT cho bảng `loinhan`
--
ALTER TABLE `loinhan`
  MODIFY `id_loinhan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  MODIFY `id_sanpham` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT cho bảng `taikhoan`
--
ALTER TABLE `taikhoan`
  MODIFY `id_taikhoan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT cho bảng `tokens`
--
ALTER TABLE `tokens`
  MODIFY `id_token` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT cho bảng `trangthaidonhang`
--
ALTER TABLE `trangthaidonhang`
  MODIFY `id_trangthaidonhang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `chitietdonhang`
--
ALTER TABLE `chitietdonhang`
  ADD CONSTRAINT `chitietdonhang_ibfk_1` FOREIGN KEY (`id_donhang`) REFERENCES `donhang` (`id_donhang`),
  ADD CONSTRAINT `chitietdonhang_ibfk_2` FOREIGN KEY (`id_sanpham`) REFERENCES `sanpham` (`id_sanpham`);

--
-- Các ràng buộc cho bảng `donhang`
--
ALTER TABLE `donhang`
  ADD CONSTRAINT `donhang_ibfk_1` FOREIGN KEY (`id_taikhoan`) REFERENCES `taikhoan` (`id_taikhoan`),
  ADD CONSTRAINT `donhang_ibfk_2` FOREIGN KEY (`id_trangthaidonhang`) REFERENCES `trangthaidonhang` (`id_trangthaidonhang`);

--
-- Các ràng buộc cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  ADD CONSTRAINT `sanpham_ibfk_1` FOREIGN KEY (`id_danhmuc`) REFERENCES `danhmuc` (`id_danhmuc`),
  ADD CONSTRAINT `sanpham_ibfk_2` FOREIGN KEY (`id_nguoitao`) REFERENCES `taikhoan` (`id_taikhoan`);

--
-- Các ràng buộc cho bảng `tokens`
--
ALTER TABLE `tokens`
  ADD CONSTRAINT `tokens_ibfk_1` FOREIGN KEY (`id_taikhoan`) REFERENCES `taikhoan` (`id_taikhoan`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
