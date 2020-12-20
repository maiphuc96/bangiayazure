-- phpMyAdmin SQL Dump
-- version 4.6.6
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:54876
-- Generation Time: Jul 14, 2020 at 09:51 AM
-- Server version: 5.7.9
-- PHP Version: 5.6.40

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bangiayversion2`
--

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `tongTienGioHang` (`idgiohang` INT(11))  BEGIN
	DECLARE tongbd INT DEFAULT 0;
    DECLARE tongkm INT DEFAULT 0;
	set tongbd = tongbd + (SELECT sum(so_luong*gia_ban_dau)
						FROM chitietgiohang ct,giohang gh,sanpham sp
						WHERE ct.id_gio_hang = gh.id_gio_hang and ct.id_san_pham = sp.id_san_pham and gh.id_gio_hang=idgiohang AND sp.san_pham_khuyen_mai=0);
	set tongkm = tongkm + (SELECT sum(so_luong*gia_khuyen_mai)
						FROM chitietgiohang ct,giohang gh,sanpham sp
						WHERE ct.id_gio_hang = gh.id_gio_hang and ct.id_san_pham = sp.id_san_pham and gh.id_gio_hang=idgiohang AND sp.san_pham_khuyen_mai=1);
                        
	select (tongbd+tongkm);
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `baocao`
--

CREATE TABLE `baocao` (
  `id_bao_cao` int(11) NOT NULL,
  `id_san_pham` int(11) NOT NULL,
  `ten_san_pham` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ngay` date NOT NULL,
  `so_luong` int(11) NOT NULL,
  `doanh_thu` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `baocao`
--

INSERT INTO `baocao` (`id_bao_cao`, `id_san_pham`, `ten_san_pham`, `ngay`, `so_luong`, `doanh_thu`) VALUES
(8, 5, 'Converse hà lan loại 2', '2020-06-20', 1, 2000),
(9, 6, 'Converse châu âu', '2020-06-20', 1, 200000),
(10, 9, 'Puma hàn quốc', '2020-06-20', 1, 2000),
(11, 25, 'Sản phẩm puma 1', '2020-06-20', 11, 1100000),
(12, 25, 'Sản phẩm puma 1', '2020-06-20', 1, 100000),
(13, 25, 'Sản phẩm puma 1', '2020-06-20', 1, 100000),
(14, 25, 'Sản phẩm puma 1', '2020-06-20', 2, 200000),
(15, 2, 'Puma đức', '2020-06-20', 2, 1998000),
(16, 25, 'Sản phẩm puma 1', '2020-06-20', 1, 100000),
(17, 5, 'Converse hà lan loại 2', '2020-06-20', 1, 2000),
(18, 25, 'Sản phẩm puma 1', '2020-06-20', 6, 600000),
(19, 24, 'sản phẩm mới1', '2020-06-20', 1, 269000);

-- --------------------------------------------------------

--
-- Table structure for table `binhluan`
--

CREATE TABLE `binhluan` (
  `id_binh_luan` int(11) NOT NULL,
  `id_nguoi_dung` int(11) NOT NULL,
  `noi_dung_binh_luan` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_san_pham` int(11) NOT NULL,
  `thoi_gian_tao` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ngay_tao` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `binhluan`
--

INSERT INTO `binhluan` (`id_binh_luan`, `id_nguoi_dung`, `noi_dung_binh_luan`, `id_san_pham`, `thoi_gian_tao`, `ngay_tao`) VALUES
(1, 2, 'hàng tốt', 2, '16:14:30', '2020-07-14');

-- --------------------------------------------------------

--
-- Table structure for table `chitietdonhang`
--

CREATE TABLE `chitietdonhang` (
  `id_don_hang` int(11) NOT NULL,
  `id_san_pham` int(11) NOT NULL,
  `ctdh_so_luong` int(11) NOT NULL,
  `gia_dat_hang` int(100) NOT NULL,
  `thanh_tien` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `donhang`
--

CREATE TABLE `donhang` (
  `id_don_hang` int(11) NOT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tai_khoan` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ten_khach_hang` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `so_dien_thoai_khach_hang` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_khach_hang` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ngay_dat_hang` date NOT NULL,
  `dia_chi_khach_hang` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `ten_nguoi_nhan` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_nguoi_nhan` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `so_dien_thoai_nguoi_nhan` int(20) NOT NULL,
  `dia_chi_nguoi_nhan` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `thue_GTGT` int(100) NOT NULL,
  `tong_tien` int(100) NOT NULL,
  `trang_thai` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `gioithieu`
--

CREATE TABLE `gioithieu` (
  `id_gioi_thieu` int(11) NOT NULL,
  `logo_trang_chu` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `trang_chu` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `trang_con` text COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `gioithieu`
--

INSERT INTO `gioithieu` (`id_gioi_thieu`, `logo_trang_chu`, `trang_chu`, `trang_con`) VALUES
(1, '<p><span style=\"font-family:Tahoma,Geneva,sans-serif\"><span style=\"font-size:16px\"><span style=\"color:#000000\">Cung cấp ra thị trường rất nhiều sản phẩm gi&agrave;y chất lượng, mẫu m&atilde; đa dạng, style mới nhất... mang đến cho Qu&yacute; Kh&aacute;ch H&agrave;ng cảm gi&aacute;c mạnh mẽ, tự tin, c&aacute; t&iacute;nh v&agrave; thanh lịch.</span></span></span></p>\r\n', '<p><span style=\"font-family:Tahoma,Geneva,sans-serif\"><span style=\"font-size:16px\">Ch&uacute;ng t&ocirc;i cung cấp c&aacute;c loại gi&agrave;y đa dạng từ 100K đến 5000K để đ&aacute;p ứng mọi nhu cầu của kh&aacute;ch h&agrave;ng từ đơn giản đến phức tạp. H&atilde;y tham khảo Bảng gi&aacute; website &amp; Chức năng website để biết th&ecirc;m th&ocirc;ng tin về c&aacute;c g&oacute;i dịch vụ của ch&uacute;ng t&ocirc;i. SHOES SHOP đ&atilde; phục vụ hơn 1,000 kh&aacute;ch h&agrave;ng trong nước v&agrave; quốc tế. Rất h&acirc;n hạnh phục vụ Qu&yacute; kh&aacute;ch!</span></span></p>\r\n', '<p style=\"text-align:center\"><span style=\"font-family:Tahoma,Geneva,sans-serif\"><span style=\"color:#d35400\"><strong>CH&Agrave;O MỪNG BẠN ĐẾN VỚI SHOES SHOP</strong></span></span></p>\r\n\r\n<p style=\"text-align:center\"><span style=\"font-family:Tahoma,Geneva,sans-serif\"><span style=\"color:#d35400\"><strong>SHOP B&Aacute;N GI&Agrave;Y ONLINE CHẤT LƯỢNG CAO TẠI VIỆT NAM</strong></span></span></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><span style=\"font-family:Tahoma,Geneva,sans-serif\"><span style=\"color:#d35400\"><strong>Giới thiệu về shoes shop</strong></span></span></p>\r\n\r\n<p><span style=\"font-family:Tahoma,Geneva,sans-serif\">Chuy&ecirc;n ph&acirc;n phối c&aacute;c loại gi&agrave;y cao cấp h&agrave;ng đầu tại việt nam.</span></p>\r\n\r\n<p><span style=\"font-family:Tahoma,Geneva,sans-serif\">Tại SHOES SHOP&nbsp;&nbsp;kh&aacute;ch h&agrave;ng c&oacute; thể t&igrave;m th&ocirc;ng tin của tất cả c&aacute;c sản phẩm nhanh ch&oacute;ng, th&ocirc;ng tin kỹ thuật của sản phẩm được m&ocirc; tả đầy đủ, c&oacute; gi&aacute; cả r&otilde; r&agrave;ng.</span></p>\r\n\r\n<p><span style=\"font-family:Tahoma,Geneva,sans-serif\">H&agrave;ng h&oacute;a v&agrave; nh&agrave; cung cấp được kiểm duyệt nhằm đảm bảo chất lượng, gi&aacute; cả canh tranh v&agrave; đ&aacute;p ứng nhanh nhu cầu của kh&aacute;ch h&agrave;ng.</span></p>\r\n\r\n<p><span style=\"font-family:Tahoma,Geneva,sans-serif\"><span style=\"color:#d35400\"><strong>Th&ocirc;ng tin li&ecirc;n hệ</strong></span></span></p>\r\n\r\n<p><span style=\"font-family:Tahoma,Geneva,sans-serif\"><span style=\"font-size:16px\">Shoes shop.</span></span></p>\r\n\r\n<p><span style=\"font-family:Tahoma,Geneva,sans-serif\">K&iacute; t&uacute;c x&aacute; khu B ĐHQG Tp Hồ Ch&iacute; Minh</span></p>\r\n\r\n<p><span style=\"font-family:Tahoma,Geneva,sans-serif\">Thủ đức - Việt Nam</span></p>\r\n\r\n<p><span style=\"font-family:Tahoma,Geneva,sans-serif\">Mobile: +84 0123343556</span></p>\r\n\r\n<p><span style=\"font-family:Tahoma,Geneva,sans-serif\">Email: giaypro</span></p>\r\n\r\n<p>&nbsp;</p>\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `lienhe`
--

CREATE TABLE `lienhe` (
  `id_lien_he` int(20) NOT NULL,
  `ho_ten` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `chu_de` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `noi_dung_lien_he` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `phan_hoi_cho_khach_hang` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `ngay_tao` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `loaisanpham`
--

CREATE TABLE `loaisanpham` (
  `id_loai_san_pham` int(50) NOT NULL,
  `ten_loai_san_pham` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ngay_tao` date NOT NULL,
  `nguoi_tao` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ngay_cap_nhat` date NOT NULL,
  `nguoi_cap_nhat` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `loaisanpham`
--

INSERT INTO `loaisanpham` (`id_loai_san_pham`, `ten_loai_san_pham`, `ngay_tao`, `nguoi_tao`, `ngay_cap_nhat`, `nguoi_cap_nhat`) VALUES
(1, 'Nike', '2020-06-10', 'Mai Xuan Phuc', '2020-06-11', 'Mai Xuan Phuc'),
(2, 'Adidas', '2020-06-10', 'Mai Xuan Phuc', '2020-06-11', 'Mai Xuan Phuc'),
(3, 'Converse', '2020-06-10', 'Mai Xuan Phuc', '2020-06-12', 'Mai Xuan Phuc'),
(4, 'Vans', '2020-06-10', 'Mai Xuan Phuc', '2020-06-14', 'Mai Xuan Phuc'),
(5, 'Puma', '2020-06-10', 'Mai Xuan Phuc', '2020-06-19', 'Mai Xuan Phuc');

-- --------------------------------------------------------

--
-- Table structure for table `nguoidung`
--

CREATE TABLE `nguoidung` (
  `id_nguoi_dung` int(11) NOT NULL,
  `tai_khoan` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ho_ten` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `anh_nguoi_dung` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gioi_tinh` tinyint(4) NOT NULL,
  `so_dien_thoai` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mat_khau` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `level` tinyint(2) NOT NULL,
  `dia_chi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `code` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `nguoidung`
--

INSERT INTO `nguoidung` (`id_nguoi_dung`, `tai_khoan`, `ho_ten`, `anh_nguoi_dung`, `gioi_tinh`, `so_dien_thoai`, `mat_khau`, `level`, `dia_chi`, `code`) VALUES
(1, 'giaypro@gmail.com', 'Mai Xuan Phuc', 'd845b5c8ee272fb39c048aa6bfdab71e.jpg', 1, '0123456789', '21232f297a57a5a743894a0e4a801fc3', 2, 'Thủ đức, Thành phố Hồ chí Minh', 'b20df723576fff5ab35fa6d7e2512c64'),
(2, 'maiphuc96@gmail.com', 'maixuanphuc', 'cea5a6657bf29deacfdadb6203279b8a.jpg', 1, '0123456689', 'e10adc3949ba59abbe56e057f20f883e', 0, 'ktxkhub', ''),
(3, 'nhanvien', 'phuc', '', 1, '012353459', 'e10adc3949ba59abbe56e057f20f883e', 1, 'ktxb', '');

-- --------------------------------------------------------

--
-- Table structure for table `sanpham`
--

CREATE TABLE `sanpham` (
  `id_san_pham` int(11) NOT NULL,
  `ten_san_pham` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_loai_san_pham` int(50) NOT NULL,
  `anh_san_pham` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `thong_tin` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `san_pham_khuyen_mai` tinyint(4) NOT NULL,
  `kinh_doanh` tinyint(4) NOT NULL,
  `gia_ban_dau` int(11) NOT NULL,
  `gia_khuyen_mai` int(11) NOT NULL,
  `ngay_dang` date NOT NULL,
  `size` int(11) NOT NULL,
  `so_luong` int(11) NOT NULL,
  `so_luot_mua` int(11) NOT NULL,
  `thoi_gian_cap_nhat_KM` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sanpham`
--

INSERT INTO `sanpham` (`id_san_pham`, `ten_san_pham`, `id_loai_san_pham`, `anh_san_pham`, `thong_tin`, `san_pham_khuyen_mai`, `kinh_doanh`, `gia_ban_dau`, `gia_khuyen_mai`, `ngay_dang`, `size`, `so_luong`, `so_luot_mua`, `thoi_gian_cap_nhat_KM`) VALUES
(2, 'Puma đức', 5, '05ef69dcc026e1cf15e0ba56308ef7ae.jpg', '<p><span style=\"font-family:Courier New,Courier,monospace\">Đ&acirc;y l&agrave; gi&agrave;y puma đức</span></p>\r\n', 1, 1, 1200000, 998000, '2020-06-10', 32, 8, 6, '2020-06-10 16:05:11'),
(3, 'Adidas hà lan', 2, 'a2712969db382b88fd5789a57fa6953f.jpg', 'Đây là thông tin giày Adidas hà lan', 1, 1, 12000, 12000, '2020-06-10', 30, 10, 5, '2020-06-10'),
(4, 'Adidas châu mĩ', 2, 'Adidas Tubular Shadow Olive.png', 'Đây là thông tin giày Adidas châu mĩ', 1, 1, 12000, 12000, '2020-06-10', 30, 10, 5, '2020-06-10'),
(5, 'Converse hà lan loại 2', 3, 'adidas-nmd-r1-primeknit-white-black-by1911-1.jpg', 'Đây là thông tin giày Converse hà lan loại 2', 0, 1, 2000, 1500, '2020-06-10', 30, 9, 6, '2020-06-10'),
(6, 'Converse châu âu', 3, 'adidas-nmd-xr1-primeknit-olive-bb2375-1.JPG', '<p>Đ&acirc;y l&agrave; th&ocirc;ng tin gi&agrave;y Converse ch&acirc;u &acirc;u</p>\r\n', 1, 1, 200000, 168000, '2020-06-10', 31, 1, 5, '2020-06-10'),
(9, 'Puma hàn quốc', 5, 'Air Jordan 1 Retro High OG _22 Banned _22_avt.jpg', 'Đây là thông tin giày Puma hàn quốc', 1, 1, 2000, 1199, '2020-06-10', 30, 10, 5, '2020-06-10 14:35:28'),
(10, 'Puma đức', 5, 'air-jordan-1-retro-high-og-mens-shoe.jpg', 'Đây là thông tin giày Puma đức', 0, 1, 20000, 20000, '2020-06-10', 30, 10, 5, '2020-06-10'),
(11, 'Nike hàng chính hãng', 1, '957fe8a572c6acd152daa2f542dd65de.jpg', '<p>Đ&acirc;y l&agrave; th&ocirc;ng tin gi&agrave;y nike one on one</p>\r\n', 1, 1, 256000, 10000, '2020-06-10', 35, 11, 5, '2020-06-10'),
(14, 'Adidas mĩ', 2, '2086ce38d500abd55936fe09cf5dc6f1.jpg', 'Đây là thông tin giày Adidas hà lan', 1, 1, 12000, 12000, '2020-06-10', 30, 10, 5, '0000-00-00'),
(15, 'Adidas châu á', 2, '8ead61c52892c3762279a221aed8ccb9.jpg', 'Đây là thông tin giày Adidas hà lan', 1, 1, 12000, 12000, '2020-06-10', 32, 0, 5, '2020-06-10'),
(19, 'Adidas lan', 2, '3f8909e0f6eefb6ce17f0571c7b4aae4.jpg', 'Đây là thông tin giày Adidas hà lan', 1, 1, 12000, 12000, '2020-06-10', 35, 10, 5, '0000-00-00'),
(23, 'Sản phẩm test thêm', 4, 'dbd20aaf9666d5dac180486a0a953873.png', '<p>Đ&acirc;y l&agrave; sản phẩm test chức năng th&ecirc;m sản phẩm mới</p>\r\n', 0, 0, 100000, 0, '2020-06-10', 32, 9, 0, '0000-00-00'),
(24, 'sản phẩm mới1', 1, '5448f519a6475a2fc060dc5a09412bb8.jpg', '<p>Sản phẩm mới</p>\r\n', 1, 1, 320000, 269000, '2020-06-10', 31, 0, 1, '2020-06-10 14:35:15'),
(25, 'Sản phẩm puma 1', 5, 'ee92d373211e52bf29f3e8415cfede79.png', '<p>Đ&acirc;y l&agrave; thử nghiệm th&ecirc;m sản phẩm gi&agrave;y puma</p>\r\n', 0, 1, 100000, 0, '2020-06-10', 32, 0, 4, '2020-06-10'),
(26, 'Nike 01', 1, '25fb829f2df23993b69fbf6a3fde0b09.jpg', '<p>Đ&acirc;y l&agrave; mẫu gi&agrave;y nike001</p>\r\n', 0, 0, 250000, 0, '2020-06-10', 32, 10, 0, ''),
(27, 'Nike 01', 1, '5dd6aabf3dab70e26ebdddd26ce19cdd.jpg', '<p>Đ&acirc;y l&agrave; Nike 01 size 30</p>\r\n', 0, 0, 250000, 0, '2020-06-10', 20, 1, 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `thongtinlienhe`
--

CREATE TABLE `thongtinlienhe` (
  `id` int(11) NOT NULL,
  `noi_dung_thong_tin_lien_he` text COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `thongtinlienhe`
--

INSERT INTO `thongtinlienhe` (`id`, `noi_dung_thong_tin_lien_he`) VALUES
(1, '<p><span style=\"font-family:Tahoma,Geneva,sans-serif\"><span style=\"font-size:16px\">K&iacute; t&uacute;c x&aacute; khu B ĐHQG Tp Hồ Ch&iacute; Minh Thủ đức - Việt Nam</span></span></p>\r\n\r\n<p><span style=\"font-family:Tahoma,Geneva,sans-serif\"><span style=\"font-size:16px\">Mobile: +84 0122 345 678</span></span></p>\r\n\r\n<p><span style=\"font-family:Tahoma,Geneva,sans-serif\"><span style=\"font-size:16px\">Email: giaypro@gmail.com</span></span></p>\r\n');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `baocao`
--
ALTER TABLE `baocao`
  ADD PRIMARY KEY (`id_bao_cao`);

--
-- Indexes for table `binhluan`
--
ALTER TABLE `binhluan`
  ADD PRIMARY KEY (`id_binh_luan`);

--
-- Indexes for table `chitietdonhang`
--
ALTER TABLE `chitietdonhang`
  ADD PRIMARY KEY (`id_don_hang`,`id_san_pham`);

--
-- Indexes for table `donhang`
--
ALTER TABLE `donhang`
  ADD PRIMARY KEY (`id_don_hang`);

--
-- Indexes for table `gioithieu`
--
ALTER TABLE `gioithieu`
  ADD PRIMARY KEY (`id_gioi_thieu`);

--
-- Indexes for table `lienhe`
--
ALTER TABLE `lienhe`
  ADD PRIMARY KEY (`id_lien_he`);

--
-- Indexes for table `loaisanpham`
--
ALTER TABLE `loaisanpham`
  ADD PRIMARY KEY (`id_loai_san_pham`);

--
-- Indexes for table `nguoidung`
--
ALTER TABLE `nguoidung`
  ADD PRIMARY KEY (`id_nguoi_dung`);

--
-- Indexes for table `sanpham`
--
ALTER TABLE `sanpham`
  ADD PRIMARY KEY (`id_san_pham`);
ALTER TABLE `sanpham` ADD FULLTEXT KEY `ten_san_pham` (`ten_san_pham`);

--
-- Indexes for table `thongtinlienhe`
--
ALTER TABLE `thongtinlienhe`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `baocao`
--
ALTER TABLE `baocao`
  MODIFY `id_bao_cao` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `binhluan`
--
ALTER TABLE `binhluan`
  MODIFY `id_binh_luan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `donhang`
--
ALTER TABLE `donhang`
  MODIFY `id_don_hang` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `gioithieu`
--
ALTER TABLE `gioithieu`
  MODIFY `id_gioi_thieu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `lienhe`
--
ALTER TABLE `lienhe`
  MODIFY `id_lien_he` int(20) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `loaisanpham`
--
ALTER TABLE `loaisanpham`
  MODIFY `id_loai_san_pham` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `nguoidung`
--
ALTER TABLE `nguoidung`
  MODIFY `id_nguoi_dung` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `sanpham`
--
ALTER TABLE `sanpham`
  MODIFY `id_san_pham` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
--
-- AUTO_INCREMENT for table `thongtinlienhe`
--
ALTER TABLE `thongtinlienhe`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
