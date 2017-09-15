-- phpMyAdmin SQL Dump
-- version 4.4.15.8
-- https://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Aug 29, 2017 at 08:53 AM
-- Server version: 5.6.31
-- PHP Version: 5.5.38

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tgcn`
--

-- --------------------------------------------------------

--
-- Table structure for table `brand`
--

CREATE TABLE IF NOT EXISTS `brand` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `brand`
--

INSERT INTO `brand` (`id`, `name`) VALUES
(1, 'ASUS'),
(2, 'ACER'),
(3, 'DELL'),
(4, 'APPLE'),
(5, 'SAMSUNG'),
(6, 'SONY'),
(7, 'MEIZU'),
(8, 'XIAOMI'),
(9, 'LENOVO');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE IF NOT EXISTS `category` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`) VALUES
(9, 'Máy in'),
(10, 'Laptop'),
(11, 'Máy tính bảng'),
(12, 'Điện thoại');

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE IF NOT EXISTS `order` (
  `id` int(11) NOT NULL,
  `id_transaction` int(11) NOT NULL,
  `id_product` int(11) NOT NULL,
  `qty` int(4) NOT NULL,
  `amount` float NOT NULL,
  `price` float NOT NULL,
  `status` tinyint(4) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `order`
--

INSERT INTO `order` (`id`, `id_transaction`, `id_product`, `qty`, `amount`, `price`, `status`) VALUES
(1, 1, 1, 1, 6290, 0, 0),
(2, 1, 2, 1, 6390, 0, 0),
(3, 1, 3, 1, 11290, 0, 0),
(4, 1, 3, 1, 11290, 0, 0),
(5, 1, 3, 1, 11290, 0, 0),
(6, 1, 2, 1, 6390, 0, 0),
(7, 1, 1, 1, 6290, 0, 0),
(8, 2147483647, 4, 2, 43980000, 21990000, 0),
(9, 2147483647, 5, 1, 20.49, 20.49, 0),
(10, 2147483647, 4, 1, 21990000, 21990000, 0),
(11, 2147483647, 5, 1, 20490000, 20490000, 0),
(12, 2147483647, 1, 3, 18870000, 6290000, 0),
(13, 2147483647, 4, 1, 21990000, 21990000, 0);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE IF NOT EXISTS `product` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` double NOT NULL,
  `cat_id` int(10) NOT NULL,
  `brand_id` int(10) NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'default.jpg',
  `inventory` int(11) NOT NULL,
  `sold` int(11) NOT NULL DEFAULT '0',
  `created` date NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `name`, `description`, `price`, `cat_id`, `brand_id`, `image`, `inventory`, `sold`, `created`) VALUES
(1, 'Laptop Asus E402SA N3060/2GB/500GB/Win10/(WX251T)', '<br><br>CPU:	Intel Celeron, N3060, 1.60 GHz<br>\r\nRAM:	2 GB, DDR3 (on board), 1600 MHz<br>\r\nỔ cứng:	HDD: 500 GB<br>\r\nMàn hình:	14 inch, HD (1366 x 768)<br>\r\nCard màn hình:	Card đồ họa tích hợp, Intel® HD Graphics<br>\r\nCổng kết nối:	HDMI, LAN (RJ45), USB 2.0, USB 3.0, VGA (D-Sub)<br>\r\nHệ điều hành:	Windows 10<br>\r\nThiết kế:	Vỏ nhựa, PIN liền<br>\r\nKích thước:	Dày 21.9 mm, 1.65 kg<br>', 6290000, 10, 1, 'product1.png', 1, 0, '2017-08-01'),
(2, 'Laptop Acer Aspire ES1 432 C5J2 N3350/2GB/500GB/Win10/(NX.GFSSV.004)', '<br><br>CPU:	Intel Celeron, N3350, 1.10 GHz<br>\r\nRAM:	2 GB, DDR3L(On board), 1600 MHz<br>\r\nỔ cứng:	HDD: 500 GB<br>\r\nMàn hình:	14 inch, HD (1366 x 768)<br>\r\nCard màn hình:	Card đồ họa tích hợp, Intel® HD Graphics<br>\r\nCổng kết nối:	2 x USB 2.0, HDMI, LAN (RJ45), USB 3.0<br>\r\nHệ điều hành:	Windows 10<br>\r\nThiết kế:	Vỏ nhựa, PIN liền<br>\r\nKích thước:	Dày 23.6 mm, 1.92 kg<br>', 6390000, 10, 2, 'product2.png', 0, 0, '2017-08-25'),
(3, 'Laptop Dell Inspiron 3467 i3 7100U/4GB/1TB/Win10/(M20NR21)', '<br><br>CPU:	Intel Core i3 Kabylake, 7100U, 2.30 GHz<br>\r\nRAM:	4 GB, DDR4 (1 khe), 2400 MHz\r\nỔ cứng:	HDD: 1 TB<br>\r\nMàn hình:	14 inch, HD (1366 x 768)<br>\r\nCard màn hình:	Card đồ họa tích hợp, Intel® HD Graphics 620<br>\r\nCổng kết nối:	2 x USB 3.0, HDMI, LAN (RJ45), USB 2.0<br>\r\nHệ điều hành:	Windows 10<br>\r\nThiết kế:	Vỏ nhựa, PIN rời<br>\r\nKích thước:	Dày 21.4 mm, 1.77 kg', 11290000, 10, 3, 'product3.png', 3, 100, '2017-08-09'),
(4, 'Điện thoại iPhone 7 Plus 32GB', ' <br> <br>Màn hình:	LED-backlit IPS LCD, 5.5", Retina HD <br>\r\nHệ điều hành:	iOS 10 <br>\r\nCamera sau:	2 camera 12 MP <br>\r\nCamera trước:	7 MP <br>\r\nCPU:	Apple A10 Fusion 4 nhân 64-bit <br>\r\nRAM:	3 GB <br>\r\nBộ nhớ trong:	32 GB <br>\r\nThẻ SIM:\r\n1 Nano SIM, Hỗ trợ 4G <br>\r\nHOTMua sim 4G Viettel (2GB data/tháng). <br> Giá từ 75.000đ <br>\r\nDung lượng pin:	2900 mAh <br>', 21990000, 12, 4, 'iphone7.jpg', 0, 50, '2017-08-26'),
(5, 'Điện thoại Samsung Galaxy S8 Plus', ' <br> <br>Màn hình:	Super AMOLED, 6.3", Quad HD (2K) <br>\r\nHệ điều hành:	Android 7.0 <br>\r\nCamera sau:	12 MP <br>\r\nCamera trước:	8 MP <br>\r\nCPU:	Exynos 8895 8 nhân 64-bit <br>\r\nRAM:	4 GB <br>\r\nBộ nhớ trong:	64 GB <br>\r\nThẻ nhớ:	MicroSD, hỗ trợ tối đa 256 GB <br>\r\nThẻ SIM:	2 SIM Nano (SIM 2 chung khe thẻ nhớ), Hỗ trợ 4G <br>\r\nDung lượng pin:	3000 mAh, có sạc nhanh', 20490000, 12, 5, 's8.jpg', 0, 13, '2017-08-26'),
(6, 'MEIZU MS5', ' <br> <br>Màn hình:	IPS LCD, 5.2", HD <br>\r\nHệ điều hành:	Android 6.0 (Marshmallow) <br>\r\nCamera sau:	13 MP <br>\r\nCamera trước:	5 MP <br>\r\nCPU:	MTK6753 8 nhân 64-bit <br>\r\nRAM:	3 GB <br>\r\nBộ nhớ trong:	32 GB <br>\r\nThẻ SIM:	2 Nano SIM <br>\r\nDung lượng pin:	3000 mAh <br>\r\nThiết kế:	Nguyên khối <br>', 3190000, 12, 7, 'meizu.jpg', 3, 5, '2017-08-29'),
(7, 'Xiaomi Redmi Note 4 32GB', '<br><br>Màn hình:	IPS LCD, 5.5", Full HD<br>\r\nHệ điều hành:	Android 6.0 (Marshmallow)<br>\r\nCamera sau:	13 MP<br>\r\nCamera trước:	5 MP<br>\r\nCPU:	Snapdragon 625 8 nhân 64-bit<br>\r\nRAM:	3 GB<br>\r\nBộ nhớ trong:	32 GB<br>\r\nThẻ nhớ:	MicroSD, hỗ trợ tối đa 128 GB<br>\r\nThẻ SIM:	Nano SIM & Micro SIM (SIM 2 chung khe thẻ nhớ), Hỗ trợ 4G<br>\r\nDung lượng pin:	4100 mAh', 4690000, 12, 8, 'xiaomi.jpg', 0, 2, '2017-08-29'),
(8, 'Samsung Tab S2 9.7 inch', '<br><br>Màn hình -Super AMOLED, 9.7"\r\nHệ điều hành:\r\nAndroid 5.0<br>\r\nCPU:\r\nExynos 5433, 4 nhân 1.9 GHz & 4 nhân 1.3 GHz<br>\r\nRAM:\r\n3 GB<br>\r\nBộ nhớ trong:\r\n32 GB<br>\r\nCamera sau:\r\n8 MP<br>\r\nCamera trước:\r\n2.1 MP<br>\r\nKết nối mạng:\r\nWiFi, 3G, 4G LTE<br>\r\nHỗ trợ SIM:\r\nNano Sim<br>\r\nĐàm thoại:\r\nCó\r\n', 9990000, 11, 5, 'sstab.jpg', 1, 2, '2017-08-29'),
(9, 'iPad Wi-Fi 32GB', '<br><br>Màn hình: LED backlit LCD, 9.7"<br>\r\nHệ điều hành:\r\niOS 10<br>\r\nCPU:\r\nApple A9 2 nhân 64-bit, 1.84 GHz<br>\r\nRAM:\r\n2 GB<br>\r\nBộ nhớ trong:\r\n32 GB<br>\r\nCamera sau:\r\n8 MP<br>\r\nCamera trước:\r\n1.2 MP<br>\r\nKết nối mạng:\r\nWiFi, Không hỗ trợ 3G, Không hỗ trợ 4G<br>\r\nĐàm thoại:\r\nFaceTime<br>\r\nTrọng lượng:\r\n478 g\r\n', 8990000, 11, 4, 'ipad.jpg', 2, 1, '2017-08-29'),
(10, 'Lenovo Phab 2', '<br><br>Màn hình:\r\nIPS LCD, 6.4"\r\n<br>Hệ điều hành:\r\nAndroid 6.0 (Marshmallow)\r\n<br>CPU:\r\nMediaTek MT 8735 4 nhân, 1.3 GHz\r\n<br>RAM:\r\n3 GB\r\n<br>Bộ nhớ trong:\r\n32 GB\r\n<br>Camera sau:\r\n13 MP\r\n<br>Camera trước:\r\n5 MP\r\n<br>Kết nối mạng:\r\nWiFi, 3G, 4G LTE\r\n<br>Hỗ trợ SIM:\r\nMicro sim\r\n', 3990000, 11, 9, 'lenovo.jpg', 1, 1, '2017-08-28'),
(11, 'Máy in màu SONY UP 25MD', 'Máy in nhiệt <br>\r\nĐộ phân giải khoảng 403 dpi <br>\r\nTốc độ in cao khoảng 16 giây (NTSC) và 17 giây (PAL)<br> \r\nKích thước nhỏ gọn, tiết kiệm không gian 212x125x395 mm <br>\r\n<br>\r\nCổng RS-232C cho vận hành, điều khiển từ xa <br>\r\nĐiều khiển từ xa thuận tiện với điều khiển tự chọn RM-91/RM-5500 <br>\r\nLựa chọn nguồn AC 100V đến 120V, hoặc AC 220V đến 240V\r\n\r\n', 8980000, 9, 6, 'mayin3.jpg', 1, 1, '2017-08-28'),
(12, 'Máy in ĐCN SamSung SL-M2070FW', '<br><br>In laser,copy,scan,fax, wifi\r\nBộ xử lý: 600 MHz<br>\r\nBộ nhớ :128 MB<br>\r\nChuẩn USB 2.0', 2990000, 9, 5, 'mayin.jpg', 1, 1, '2017-08-26'),
(13, 'MÁY IN LASER SAMSUNG SL-M2070F', '<br><br>Loại máy: in laser tắng đen\r\nChức năng: in, scan, copy, fax<br>\r\nTốc độ: 20 trang/phút<br>\r\nĐộ phân giải: 1200 x 1200 dpi<br>\r\nKết nối USB', 2990000, 9, 5, 'mayin4.jpg', 4, 4, '2017-08-29');

-- --------------------------------------------------------

--
-- Table structure for table `transaction`
--

CREATE TABLE IF NOT EXISTS `transaction` (
  `id` int(11) NOT NULL,
  `type` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `amount` int(11) NOT NULL,
  `payment` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `payment_info` text COLLATE utf8_unicode_ci NOT NULL,
  `message` text COLLATE utf8_unicode_ci NOT NULL,
  `trac_id` int(11) NOT NULL,
  `created` date NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `transaction`
--

INSERT INTO `transaction` (`id`, `type`, `status`, `id_user`, `name`, `email`, `phone`, `address`, `amount`, `payment`, `payment_info`, `message`, `trac_id`, `created`) VALUES
(1, 0, 0, 3, 'toi', 'toi@gmail.com', '1234', '', 6290000, 'tiền mặt', '', 'gui hang cho toi vao ngay mai     ', 1, '2016-07-19'),
(2, 0, 0, 4, 'a', 'abc@gmail.com', '01674717919', '', 6390000, 'Tiền mặt', '', 'thanh toan khi nhan hang                            ', 2, '2016-07-21'),
(3, 0, 1, 3, 'toi', 'toi@gmail.com', '01674717919', '', 11290000, 'tiền mặt', '', 'abc                            ', 3, '2016-07-21'),
(4, 0, 0, 5, 'admini', 'Abc@gmail.com', '09215625400', '', 43980020, 'Tiền mặt', '', '', 2147483647, '2017-08-27'),
(5, 0, 0, 5, 'admini', 'Abc@gmail.com', '09215625400', '', 42480000, 'Tiền mặt', '', '', 2147483647, '2017-08-27'),
(6, 0, 0, 2, 'user', 'thien@gmail.com', '0993603225', 'Quận Thủ Đức, TP.HCM', 40860000, 'Tiền mặt', '', 'Giao trong giờ hành chính', 2147483647, '2017-08-28');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pass` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `permission` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `pass`, `dname`, `phone`, `email`, `address`, `permission`) VALUES
(1, 'admin', 'admin321', 'Quản trị viên', '', '', '', 0),
(2, 'user', 'user', 'Người dùng', '', '', '', 1),
(3, 'toi', 'toi', 'toi', '1254', 'Toi@abc.vn', '', 0),
(4, 'a', 'b', 'a', '12', 'Abc@gmail.com', '', 1),
(5, 'admini', 'admini', 'admini', '09215625400', 'Abc@gmail.com', '', 1),
(8, 'administrator', 'admin', 'administrator', '', 'admin@gmail.com', '', 0),
(9, 'thien', 'thien', 'thien', '', 'thien@abc', '', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `brand`
--
ALTER TABLE `brand`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transaction`
--
ALTER TABLE `transaction`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `brand`
--
ALTER TABLE `brand`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `order`
--
ALTER TABLE `order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `transaction`
--
ALTER TABLE `transaction`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
