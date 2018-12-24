-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jul 02, 2018 at 01:00 PM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 7.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `id6018997_pizza`
--

-- --------------------------------------------------------

--
-- Table structure for table `chitietdonhang`
--

CREATE TABLE `chitietdonhang` (
  `ID_donhang` int(11) NOT NULL,
  `ID_sanpham` int(11) NOT NULL,
  `Soluong` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `chitietdonhang`
--

INSERT INTO `chitietdonhang` (`ID_donhang`, `ID_sanpham`, `Soluong`) VALUES
(16, 49, 2),
(17, 49, 1),
(19, 45, 1),
(20, 49, 1),
(20, 53, 1);

-- --------------------------------------------------------

--
-- Table structure for table `danhgia`
--

CREATE TABLE `danhgia` (
  `ID_baidanhgia` int(11) NOT NULL,
  `ID_thanhvien` int(11) NOT NULL,
  `ID_sanpham` int(11) NOT NULL,
  `Sosao` int(10) NOT NULL,
  `Nhanxet` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `Ngaydang` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `danhgia`
--

INSERT INTO `danhgia` (`ID_baidanhgia`, `ID_thanhvien`, `ID_sanpham`, `Sosao`, `Nhanxet`, `Ngaydang`) VALUES
(1, 4, 47, 1, 'dở', '2018-06-06'),
(2, 1, 45, 1, 'abc', '2018-06-09'),
(5, 1, 48, 3, 'hgfgdhfg', '2018-06-09'),
(6, 1, 45, 5, 'ngon vl', '2018-06-10'),
(7, 5, 50, 1, 'dở quá đi ahihi', '2018-06-19'),
(9, 1, 45, 5, 'Dỡ vãi', '2018-06-19'),
(10, 1, 67, 3, 'fsdfd', '2018-06-21'),
(11, 1, 67, 1, 'addfaf', '2018-06-21'),
(12, 1, 130, 1, 'ngon ngọt :3', '2018-07-02'),
(13, 1, 75, 3, 'pepsi ngon quá', '2018-07-02'),
(14, 1, 48, 4, 'good', '2018-07-02');

-- --------------------------------------------------------

--
-- Table structure for table `donhang`
--

CREATE TABLE `donhang` (
  `ID_donhang` int(11) NOT NULL,
  `Ten_khachhang` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `Email` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `Sdt` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Diachi` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `Thanhpho` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `Ghichu` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `Tinhtrang` int(11) NOT NULL,
  `Ngaydat` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `donhang`
--

INSERT INTO `donhang` (`ID_donhang`, `Ten_khachhang`, `Email`, `Sdt`, `Diachi`, `Thanhpho`, `Ghichu`, `Tinhtrang`, `Ngaydat`) VALUES
(16, 'Nguyễn Văn Anh Quốc', 'anhquoc1910@gmail.com', '01208035077', '', 'TP Hồ Chí Minh', '', 1, '2018-06-10'),
(17, 'Nguyễn Văn R', 'dsfasdggsdag', '0931245678', 'dsfsdafasd', 'Hà Nội', '', 1, '2018-06-18'),
(19, '', '', '0931245678', 'ABC street XYZ', 'TP Hồ Chí Minh', '', 1, '2018-06-21'),
(20, 'ABC', 'anhquoc4062@gmail.com', '01234567890', 'sdfvgfasdgadfgdfg', 'Hà Tĩnh', 'fasdfdsasdsdfsd', 1, '2018-06-24'),
(21, '', '', '0931245678', 'ABC street XYZ', 'TP Hồ Chí Minh', '', 1, '2018-07-02');

-- --------------------------------------------------------

--
-- Table structure for table `gallery`
--

CREATE TABLE `gallery` (
  `ID_gallery` int(11) NOT NULL,
  `ID_sanpham` int(11) NOT NULL,
  `Hinh_sanpham` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `gallery`
--

INSERT INTO `gallery` (`ID_gallery`, `ID_sanpham`, `Hinh_sanpham`) VALUES
(16, 60, 'pepsi-11528331449u5hyzmfwnd.png'),
(38, 45, 'almond.png'),
(39, 45, 'pizza6.png'),
(40, 82, 'cheese_and_garlic_.png'),
(41, 82, 'cheese_and_onion.png'),
(43, 126, 'PNGPIX-COM-Sprite-Aluminum-Can-PNG-Transparent-Image-500x414.png'),
(44, 125, 'peach-pistachio-kulfi-27211-1 (1).jpg'),
(45, 48, 'cach-lam-mon-tom-cuon-khoai-tay-3.jpg'),
(46, 48, 'gion-rum-tom-cuon-mi-chien-gion-1.jpg'),
(47, 130, '3172125377_23d5c8d376_z.jpg'),
(48, 130, 'ice-blended-chocolate.jpg'),
(49, 47, '53351352.jpg'),
(51, 51, 'Whole-Wheat-Veggie-Pizza_EXPS_HCKA19_12558_C10_13_5b.jpg'),
(52, 116, 'Traditional-Turkish-Delight.jpg'),
(53, 67, '590607800cbeef0acff9a644.png'),
(54, 67, 'fried_chicken_PNG14105.png');

-- --------------------------------------------------------

--
-- Table structure for table `lienhe`
--

CREATE TABLE `lienhe` (
  `ID_lienhe` int(11) NOT NULL,
  `Ten_lienhe` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Email_lienhe` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Sodt_lienhe` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Tinnhan` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `Ngaylienhe` date NOT NULL,
  `Daxem` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `lienhe`
--

INSERT INTO `lienhe` (`ID_lienhe`, `Ten_lienhe`, `Email_lienhe`, `Sodt_lienhe`, `Tinnhan`, `Ngaylienhe`, `Daxem`) VALUES
(1, 'Nguyễn Văn Anh Quốc', 'anhquoc1910@gmail.com', '01208035077', 'fdsfasdgsd', '2018-06-10', 1),
(2, 'ABC', 'anhquoc4062@gmail.com', '01234567890', 'guyughuihuihihouihouihuiohjioh iuouiohbui iuhiubiu hi hhi  hujb uyh bihjhij huih bui 8u ui hiujn uih uih ui gug g8yu g yu', '2018-06-20', 1),
(3, 'ABC', 'anhquoc4062@gmail.com', '01234567890', 'fgdsgsdfgsdfgsdfg', '2018-06-24', 1),
(4, 'ABC', 'anhquoc4062@gmail.com', '01234567890', 'gfdsgsdfgfdgsdfgfdsg', '2018-06-24', 1),
(5, 'ABC', 'anhquoc4062@gmail.com', '01234567890', 'gdfgdfsgdfsgsdfghdsfgdfvdfvedfcv', '2018-06-24', 1),
(6, 'ABC', 'anhquoc4062@gmail.com', '01234567890', 'abc ', '2018-06-24', 1),
(7, '', '', '0931245678', '<p>dfghdfghfg</p>', '2018-06-30', 1);

-- --------------------------------------------------------

--
-- Table structure for table `phanquyen`
--

CREATE TABLE `phanquyen` (
  `ID_phanquyen` int(11) NOT NULL,
  `Ten_phanquyen` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `phanquyen`
--

INSERT INTO `phanquyen` (`ID_phanquyen`, `Ten_phanquyen`) VALUES
(1, 'Quản trị viên'),
(2, 'Khách hàng');

-- --------------------------------------------------------

--
-- Table structure for table `sanpham`
--

CREATE TABLE `sanpham` (
  `ID_sanpham` int(11) NOT NULL,
  `Hinh_sanpham` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `Ten_sanpham` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `Gia_sanpham` int(100) NOT NULL,
  `Kmai_sanpham` int(3) DEFAULT NULL,
  `ID_loai` int(11) NOT NULL,
  `Mota_sanpham` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `Sao_sanpham` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sanpham`
--

INSERT INTO `sanpham` (`ID_sanpham`, `Hinh_sanpham`, `Ten_sanpham`, `Gia_sanpham`, `Kmai_sanpham`, `ID_loai`, `Mota_sanpham`, `Sao_sanpham`) VALUES
(45, 'pizza1.png', 'Mushroom', 245000, 20, 2, 'áº¥dfdafgdsgasdfgadf', 4),
(47, 'pizza3.png', 'Four Season', 235000, 30, 2, 'fasdfasdfsdg', 1),
(48, 'pizza16.png', 'Fried Shrimp', 68000, 5, 7, '<p>T&ocirc;m cuộn chi&ecirc;n gi&ograve;n</p>', 4),
(49, 'pizza10.png', 'Green Pepper', 210000, 10, 2, 'Ã¡dfasdff', 5),
(50, 'pizza4.png', 'Sausage', 246000, 15, 2, '<p>dsfgsagsedfgg</p>', 1),
(51, 'pizza9.png', 'Vegetarian', 258000, 0, 2, 'fghfgjfghjfgh', 5),
(52, 'pizza2.png', 'Magherita', 245000, 0, 2, 'fdgfghdfsg', 5),
(53, 'pizza8.png', 'BBQ Chicken', 257000, 0, 2, 'sdfgggdfgsdf', 5),
(54, 'pizza7.png', 'Salmonies', 180000, 0, 2, 'sdfsadf', 5),
(55, 'pizza5.png', 'Mozzarella', 220000, 10, 2, 'dsfsdfd', 5),
(57, 'pizza25.png', 'Coca Light', 25000, 1, 8, 'Coca Light là thức uống đỉnh', 5),
(60, 'pepsi.png', 'Pepsi', 20000, 0, 8, 'Pepsi là thức uống của pepsi\r\n', 5),
(62, 'cheese_and_onion.png', 'Cheese Garlic', 200000, 0, 2, 'Kết hợp giữa phô mai tươi và hành tím hương vị ngon vcl', 5),
(63, 'pizza6.png', 'Sushi', 175000, 20, 2, 'Thịt nướng ngũ vị cung đình huế :))', 5),
(64, 'pizza27.png', 'Heineiken', 45000, 0, 8, 'Heineiken là...', 5),
(65, 'pizza11.png', 'Polony', 150000, 0, 2, '<p>Nh&igrave;n ngon rồi tả cc g&igrave; nữa</p>', 5),
(66, 'pizza12.png', 'Pizza Onion', 128000, 10, 2, 'Ăn hành sml', 5),
(67, 'pizza13.png', 'Fried Chicken', 35000, 0, 7, '<p>Lấy từ c&aacute;nh g&agrave; Trung Quốc nh&eacute;</p>', 2),
(68, 'pizza14.png', 'Fried Potato', 15000, 0, 7, '<p>nh&igrave;n biết khoai to rồi tả cc g&igrave;</p>', 5),
(69, 'pizza15.png', 'Fried Ink', 20000, 0, 7, '<p>mực biển tươi nh&eacute; mina</p>', 5),
(70, 'pizza17.png', 'Salad', 5000, 0, 7, 'giảm cân thì đặt ngay nhé', 5),
(71, 'pizza18.png', 'Chicken Salad', 30000, 0, 7, '<p>g&agrave; trộn cỏ</p>', 5),
(72, 'pizza19.png', 'Soup', 15000, 0, 7, 'Nóng hổi vừa thổi vừa liếm đê', 5),
(73, 'pizza21.png', 'Aqua', 10000, 0, 8, 'nước máy đéo phải nước suối', 5),
(74, 'pizza22.png', 'Burger', 30000, 0, 7, 'ăn quài không biết à NGU', 5),
(75, 'pizza23.png', 'Coca Cola', 15000, 0, 8, 'uống nhiều viêm họng cmm đê', 3),
(76, 'pizza26.png', 'Fanta', 15000, 0, 8, 'Nước Cam đéo phải cam vắt đâu nhé', 5),
(77, 'bacon_and_spinach_1.png', 'Pizza Bacon and Spinach', 250000, 10, 2, 'tả cc biết mẹ gì đâu ', 5),
(78, 'beef_onion.png', 'Pizza Beef Onion', 175000, 0, 2, 'hành không có mẹ gì đâu', 5),
(80, 'cheese_and_bacon_1.png', 'Pizza Cheese and Bacon', 205000, 20, 2, 'phô mai ngán chết mẹ', 5),
(82, 'cheese_and_onion.png', 'Pizza Cheese and Onion', 168000, 0, 2, 'Phô mai Hành :3', 5),
(83, 'cheese-pizza-1.png', 'Cheese', 135000, 0, 2, 'phô mai quài ngán thấy mẹ', 5),
(89, 'half_half.png', 'Half & Half', 168000, 0, 2, '', 5),
(98, 'Broccoli&CheeseBites.png', 'Broccoli & Cheese Bites', 112000, 10, 7, 'Giòn và và béo ,là một món khai vị hoàn hảo', 5),
(99, 'ChickenWedges.png', 'Chicken Wedges', 149000, 15, 7, 'Nếu bạn là một tín đồ của gà không thể bỏ qua', 5),
(100, 'GarlicBread.png', 'Garlic Bread', 105000, 0, 7, '<p>một m&oacute;n khai vị nhiều rau</p>\r\n', 5),
(101, 'pita.png', 'Pita', 152000, 20, 7, 'truyền thông kết hợp chút hiện đại', 5),
(102, 'carotcake.png', 'Carrot Cake', 99000, 10, 9, 'một chút ngọt ngào', 5),
(105, 'IceCreamCaramel.png', 'Ice Cream Caramel', 70000, 15, 9, 'mùa hè đến rồi', 5),
(107, 'IceCreamChocolate.png', 'Ice Cream Chocolate', 82000, 5, 9, 'một chút kem ', 5),
(108, 'IceCreamStrawberry.png', 'Ice Cream Strawberry', 70000, 10, 9, 'dâu ngọt ngào', 5),
(109, 'MangoKulfi.png', 'Mango Kulfi', 149000, 10, 9, 'mềm mịn', 5),
(111, 'indian_style_veg_size_1.png', 'Indian Veg', 300000, 20, 2, '', 5),
(113, 'korma_paneer_size.png', 'Korma Paneer', 234000, 0, 2, '', 5),
(115, 'margarita_1.png', 'Margarita', 135000, 0, 2, '', 5),
(116, 'abc.png', 'Turkish Delight', 129000, 20, 9, 'tháp rau câu , mau thử thôi nào', 5),
(117, 'pacific_island_size.png', 'Pacific Island', 209000, 0, 2, '', 5),
(118, 'pizza-aspen.png', 'Aspen', 278000, 0, 2, '', 5),
(119, 'pizza-garden-of-the-gods.png', 'Garden of the god', 245000, 0, 2, '', 5),
(120, 'pizza-parker.png', 'Parker', 164000, 0, 2, '', 5),
(121, 'pizza-red-rocks.png', 'Red Rock', 239000, 0, 2, '', 5),
(122, 'pizza-supremo.png', 'Supremo', 156000, 0, 2, '', 5),
(123, 'Pork-Carnita-pizza.png', 'Pork Carnita', 148000, 0, 2, '', 5),
(124, 'vidaloo_paneer_1.png', 'Vidaloo Paneer', 175000, 0, 2, '', 5),
(125, 'PistachioKulfi.png', 'Pistachio Kulfi', 99000, 10, 9, 'hihi', 5),
(126, 'Sprite.png', 'Sprite', 15000, 0, 8, '', 5),
(127, 'mango_lassic.png', 'Mango Lassic', 35000, 0, 8, '', 5),
(129, 'strawberry_lassic.png', 'Strawberry Lassic', 35000, 0, 8, '', 5),
(130, 'IceChocolate.png', 'Ice Chocolate', 36000, 0, 8, '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `thanhpho`
--

CREATE TABLE `thanhpho` (
  `ID_thanhpho` int(11) NOT NULL,
  `Ten_thanhpho` varchar(255) CHARACTER SET utf8 COLLATE utf8_vietnamese_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `thanhpho`
--

INSERT INTO `thanhpho` (`ID_thanhpho`, `Ten_thanhpho`) VALUES
(1, 'TP Hồ Chí Minh'),
(3, 'Hải Phòng'),
(4, 'Đà Nẵng'),
(5, 'Long An'),
(6, 'Hà Tĩnh'),
(7, 'Hà Nội');

-- --------------------------------------------------------

--
-- Table structure for table `thanhvien`
--

CREATE TABLE `thanhvien` (
  `ID_thanhvien` int(11) NOT NULL,
  `Username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Hoten` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Sodt` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ID_thanhpho` int(11) NOT NULL,
  `Diachi` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `ID_phanquyen` int(11) NOT NULL,
  `Ngaytao` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `thanhvien`
--

INSERT INTO `thanhvien` (`ID_thanhvien`, `Username`, `Password`, `Hoten`, `Email`, `Sodt`, `ID_thanhpho`, `Diachi`, `ID_phanquyen`, `Ngaytao`) VALUES
(1, 'admin', '123', '', '', '0931245678', 1, 'ABC street XYZ', 1, NULL),
(4, 'user', '123', 'User1', 'abc@gmail.com', '0987654321', 6, 'dfsdfsfagasfg', 2, NULL),
(5, 'anhquoc4062', 'yJOWzo', 'ABC', 'anhquoc4062@gmail.com', '01234567890', 6, 'sdfvgfasdgadfgdfg', 1, NULL),
(11, 'user3', '123456', 'Nguyễn Văn F', 'anhquoc3244@gmail.com', '01208035077', 3, 'kl;kj;kl;', 2, '2018-06-10'),
(18, 'anhquoc21312', 'anhquoc123', 'Nguyễn Văn D', 'anhquoc1910@gmail.com', '01287367823', 1, '', 2, '2018-06-18'),
(19, 'anhquoc3524', 'anhquoc123', 'Nguyễn Văn Anh Quốc', 'anhquoc3524@gmail.com', '0931234561', 4, 'dfasgadfgdfghfsdhfsgh', 2, '2018-06-20'),
(20, 'thanh', 'skiRGT', 'thanh nguỹen', 'thanh150898@gmail.com', '1234567890', 1, '', 1, '2018-06-20');

-- --------------------------------------------------------

--
-- Table structure for table `theloai`
--

CREATE TABLE `theloai` (
  `ID_loai` int(11) NOT NULL,
  `Ten_loai` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `theloai`
--

INSERT INTO `theloai` (`ID_loai`, `Ten_loai`) VALUES
(2, 'Pizza'),
(7, 'Khai vị'),
(8, 'Thức uống'),
(9, 'Tráng miệng');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `chitietdonhang`
--
ALTER TABLE `chitietdonhang`
  ADD PRIMARY KEY (`ID_donhang`,`ID_sanpham`),
  ADD KEY `ID_donhang` (`ID_donhang`,`ID_sanpham`),
  ADD KEY `ID_donhang_2` (`ID_donhang`,`ID_sanpham`),
  ADD KEY `ID_sanpham` (`ID_sanpham`);

--
-- Indexes for table `danhgia`
--
ALTER TABLE `danhgia`
  ADD PRIMARY KEY (`ID_baidanhgia`),
  ADD KEY `ID_thanhvien` (`ID_thanhvien`),
  ADD KEY `ID_sanpham` (`ID_sanpham`);

--
-- Indexes for table `donhang`
--
ALTER TABLE `donhang`
  ADD PRIMARY KEY (`ID_donhang`),
  ADD KEY `ID_thanhvien` (`Ten_khachhang`);

--
-- Indexes for table `gallery`
--
ALTER TABLE `gallery`
  ADD PRIMARY KEY (`ID_gallery`),
  ADD KEY `ID_sanpham` (`ID_sanpham`);

--
-- Indexes for table `lienhe`
--
ALTER TABLE `lienhe`
  ADD PRIMARY KEY (`ID_lienhe`);

--
-- Indexes for table `phanquyen`
--
ALTER TABLE `phanquyen`
  ADD PRIMARY KEY (`ID_phanquyen`);

--
-- Indexes for table `sanpham`
--
ALTER TABLE `sanpham`
  ADD PRIMARY KEY (`ID_sanpham`),
  ADD KEY `ID_loai` (`ID_loai`);

--
-- Indexes for table `thanhpho`
--
ALTER TABLE `thanhpho`
  ADD PRIMARY KEY (`ID_thanhpho`);

--
-- Indexes for table `thanhvien`
--
ALTER TABLE `thanhvien`
  ADD PRIMARY KEY (`ID_thanhvien`),
  ADD KEY `ID_thanhpho` (`ID_thanhpho`),
  ADD KEY `ID_phanquyen` (`ID_phanquyen`);

--
-- Indexes for table `theloai`
--
ALTER TABLE `theloai`
  ADD PRIMARY KEY (`ID_loai`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `danhgia`
--
ALTER TABLE `danhgia`
  MODIFY `ID_baidanhgia` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `donhang`
--
ALTER TABLE `donhang`
  MODIFY `ID_donhang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `gallery`
--
ALTER TABLE `gallery`
  MODIFY `ID_gallery` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT for table `lienhe`
--
ALTER TABLE `lienhe`
  MODIFY `ID_lienhe` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `phanquyen`
--
ALTER TABLE `phanquyen`
  MODIFY `ID_phanquyen` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `sanpham`
--
ALTER TABLE `sanpham`
  MODIFY `ID_sanpham` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=131;

--
-- AUTO_INCREMENT for table `thanhpho`
--
ALTER TABLE `thanhpho`
  MODIFY `ID_thanhpho` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `thanhvien`
--
ALTER TABLE `thanhvien`
  MODIFY `ID_thanhvien` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `theloai`
--
ALTER TABLE `theloai`
  MODIFY `ID_loai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `chitietdonhang`
--
ALTER TABLE `chitietdonhang`
  ADD CONSTRAINT `chitietdonhang_ibfk_1` FOREIGN KEY (`ID_donhang`) REFERENCES `donhang` (`ID_donhang`),
  ADD CONSTRAINT `chitietdonhang_ibfk_2` FOREIGN KEY (`ID_sanpham`) REFERENCES `sanpham` (`ID_sanpham`);

--
-- Constraints for table `danhgia`
--
ALTER TABLE `danhgia`
  ADD CONSTRAINT `danhgia_ibfk_1` FOREIGN KEY (`ID_sanpham`) REFERENCES `sanpham` (`ID_sanpham`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `danhgia_ibfk_2` FOREIGN KEY (`ID_thanhvien`) REFERENCES `thanhvien` (`ID_thanhvien`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `gallery`
--
ALTER TABLE `gallery`
  ADD CONSTRAINT `gallery_ibfk_1` FOREIGN KEY (`ID_sanpham`) REFERENCES `sanpham` (`ID_sanpham`);

--
-- Constraints for table `sanpham`
--
ALTER TABLE `sanpham`
  ADD CONSTRAINT `sanpham_ibfk_1` FOREIGN KEY (`ID_loai`) REFERENCES `theloai` (`ID_loai`);

--
-- Constraints for table `thanhvien`
--
ALTER TABLE `thanhvien`
  ADD CONSTRAINT `thanhvien_ibfk_1` FOREIGN KEY (`ID_thanhpho`) REFERENCES `thanhpho` (`ID_thanhpho`),
  ADD CONSTRAINT `thanhvien_ibfk_2` FOREIGN KEY (`ID_phanquyen`) REFERENCES `phanquyen` (`ID_phanquyen`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
