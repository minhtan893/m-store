-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 14, 2016 at 03:01 AM
-- Server version: 10.1.16-MariaDB
-- PHP Version: 5.6.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `m_store`
--

-- --------------------------------------------------------

--
-- Table structure for table `carts`
--

CREATE TABLE `carts` (
  `id` int(11) NOT NULL,
  `product_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `address` text COLLATE utf8_vietnamese_ci,
  `customer_name` varchar(255) COLLATE utf8_vietnamese_ci DEFAULT NULL,
  `time` date DEFAULT NULL,
  `num` int(11) DEFAULT NULL,
  `status` varchar(255) COLLATE utf8_vietnamese_ci DEFAULT '0',
  `price` decimal(10,0) DEFAULT NULL,
  `color` varchar(255) COLLATE utf8_vietnamese_ci DEFAULT NULL,
  `size` varchar(255) COLLATE utf8_vietnamese_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Dumping data for table `carts`
--

INSERT INTO `carts` (`id`, `product_id`, `user_id`, `address`, `customer_name`, `time`, `num`, `status`, `price`, `color`, `size`) VALUES
(22, 63, NULL, 'SÃ i GÃ²n', 'Nguyá»…n vÄƒn A', '2016-11-14', 1, '0', '6700', 'yellow', '45mm'),
(23, 67, 13, 'ha noi', 'user', '2016-11-14', 1, '0', '33000', 'Brown', '35mm');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_vietnamese_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`) VALUES
(40, 'rolex'),
(41, 'tag-heuer'),
(42, 'panerai'),
(43, 'zenith');

-- --------------------------------------------------------

--
-- Table structure for table `colors`
--

CREATE TABLE `colors` (
  `id` int(11) NOT NULL,
  `color` text COLLATE utf8_vietnamese_ci,
  `product_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Dumping data for table `colors`
--

INSERT INTO `colors` (`id`, `color`, `product_id`) VALUES
(81, 'Grey', 49),
(82, 'black', 49),
(83, 'black', 50),
(86, 'black', 52),
(87, 'black space', 52),
(88, 'black', 53),
(89, 'blue', 53),
(90, 'white', 54),
(91, 'grey', 54),
(92, 'black', 55),
(93, 'grey', 55),
(94, 'Brown', 56),
(95, 'Brown', 57),
(96, 'black', 57),
(97, 'white', 58),
(98, 'black', 59),
(99, 'blue', 59),
(100, 'blue', 60),
(101, 'blue', 61),
(102, 'black', 62),
(103, 'blue', 62),
(104, 'yellow', 62),
(105, 'yellow', 63),
(106, 'Brown', 64),
(107, 'white', 65),
(108, 'black', 65),
(109, 'black', 66),
(110, 'blue', 66),
(111, 'grey', 66),
(112, 'Brown', 67),
(113, 'gold', 67),
(114, 'black', 68),
(115, 'blue', 68);

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `company` varchar(255) COLLATE utf8_vietnamese_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8_vietnamese_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8_vietnamese_ci DEFAULT NULL,
  `facebook` varchar(255) COLLATE utf8_vietnamese_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_vietnamese_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`company`, `address`, `phone`, `facebook`, `email`) VALUES
('M-store', 'HÃ  Ná»™i', '+84 123 456', 'facfdebook.com/m-store', 'm-fd@mstore.com');

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE `images` (
  `id` int(11) NOT NULL,
  `url` varchar(255) COLLATE utf8_vietnamese_ci DEFAULT NULL,
  `status_thumb` tinyint(4) DEFAULT '0',
  `product_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Dumping data for table `images`
--

INSERT INTO `images` (`id`, `url`, `status_thumb`, `product_id`) VALUES
(189, '49-thumb.jpg', 1, 49),
(190, '49-img0.jpg', 0, 49),
(191, '49-img1.jpg', 0, 49),
(192, '49-img2.jpg', 0, 49),
(193, '50-thumb.jpg', 1, 50),
(194, '50-img0.jpg', 0, 50),
(195, '50-img1.jpg', 0, 50),
(196, '50-img2.jpg', 0, 50),
(201, '52-thumb.jpg', 1, 52),
(202, '52-img0.jpg', 0, 52),
(203, '52-img1.jpg', 0, 52),
(204, '52-img2.jpg', 0, 52),
(205, '53-thumb.jpg', 1, 53),
(206, '53-img0.jpg', 0, 53),
(207, '53-img1.jpg', 0, 53),
(208, '53-img2.jpg', 0, 53),
(209, '54-thumb.jpg', 1, 54),
(210, '54-img0.jpg', 0, 54),
(211, '54-img1.jpg', 0, 54),
(212, '54-img2.jpg', 0, 54),
(213, '55-thumb.jpg', 1, 55),
(214, '55-img0.jpg', 0, 55),
(215, '55-img1.jpg', 0, 55),
(216, '55-img2.jpg', 0, 55),
(217, '56-thumb.jpg', 1, 56),
(218, '56-img0.jpg', 0, 56),
(219, '56-img1.jpg', 0, 56),
(220, '56-img2.jpg', 0, 56),
(221, '57-thumb.jpg', 1, 57),
(222, '57-img0.jpg', 0, 57),
(223, '57-img1.jpg', 0, 57),
(224, '57-img2.jpg', 0, 57),
(225, '58-thumb.jpg', 1, 58),
(226, '58-img0.jpg', 0, 58),
(227, '58-img1.jpg', 0, 58),
(228, '58-img2.jpg', 0, 58),
(229, '59-thumb.jpg', 1, 59),
(230, '59-img0.jpg', 0, 59),
(231, '59-img1.jpg', 0, 59),
(232, '59-img2.jpg', 0, 59),
(233, '60-thumb.jpg', 1, 60),
(234, '60-img0.jpg', 0, 60),
(235, '60-img1.jpg', 0, 60),
(236, '60-img2.jpg', 0, 60),
(237, '61-thumb.jpg', 1, 61),
(238, '61-img0.jpg', 0, 61),
(239, '61-img1.jpg', 0, 61),
(240, '61-img2.jpg', 0, 61),
(241, '62-thumb.jpg', 1, 62),
(242, '62-img0.jpg', 0, 62),
(243, '62-img1.jpg', 0, 62),
(244, '62-img2.jpg', 0, 62),
(245, '63-thumb.jpg', 1, 63),
(246, '63-img0.jpg', 0, 63),
(247, '63-img1.jpg', 0, 63),
(248, '63-img2.jpg', 0, 63),
(249, '64-thumb.jpg', 1, 64),
(250, '64-img0.jpg', 0, 64),
(251, '64-img1.jpg', 0, 64),
(252, '64-img2.jpg', 0, 64),
(253, '65-thumb.jpg', 1, 65),
(254, '65-img0.jpg', 0, 65),
(255, '65-img1.jpg', 0, 65),
(256, '65-img2.jpg', 0, 65),
(257, '66-thumb.jpg', 1, 66),
(258, '66-img0.jpg', 0, 66),
(259, '66-img1.jpg', 0, 66),
(260, '66-img2.jpg', 0, 66),
(261, '67-thumb.jpg', 1, 67),
(262, '67-img0.jpg', 0, 67),
(263, '67-img1.jpg', 0, 67),
(264, '67-img2.jpg', 0, 67),
(265, '68-thumb.jpg', 1, 68),
(266, '68-img0.jpg', 0, 68),
(267, '68-img1.jpg', 0, 68),
(268, '68-img2.jpg', 0, 68);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_vietnamese_ci DEFAULT NULL,
  `num` int(11) DEFAULT NULL,
  `price` decimal(10,0) DEFAULT NULL,
  `cate_id` int(11) DEFAULT NULL,
  `des` text COLLATE utf8_vietnamese_ci,
  `rate` decimal(10,0) DEFAULT NULL,
  `feature` text COLLATE utf8_vietnamese_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `num`, `price`, `cate_id`, `des`, `rate`, `feature`) VALUES
(49, 'Carrera Calibre 16', 8, '4600', 41, '<p><strong>H&atilde;ng sáº£n xuáº¥t: Tag Heuer</strong></p>\r\n\r\n<p><strong>Loáº¡i Ä‘á»“ng há»“:&nbsp;Äá»“ng há»“ nam</strong></p>\r\n\r\n<p><strong>Cháº¥t liá»‡u d&acirc;y:</strong>&nbsp;Th&eacute;p kh&ocirc;ng gá»‰&nbsp;</p>\r\n\r\n<p><strong>Cháº¥t liá»‡u máº·t:&nbsp;</strong>sapphia glass</p>\r\n\r\n<p><strong>Cháº¥t liá»‡u vá» :</strong>&nbsp;Th&eacute;p kh&ocirc;ng gá»‰&nbsp;</p>\r\n\r\n<p><strong>ÄÆ°á»ng k&iacute;nh vá»</strong>&nbsp;:27 mm</p>\r\n\r\n<p><strong>Chá»‘ng nÆ°á»›c:&nbsp;</strong>3 bar</p>\r\n\r\n<p><strong>NÄƒng lÆ°á»£ng sá»­ dá»¥ng:</strong>&nbsp;Quartz</p>\r\n\r\n<p><strong>Báº£o h&agrave;nh: 10 nÄƒm</strong></p>\r\n\r\n<p><strong>Xuáº¥t xá»©:&nbsp;</strong>Thá»¥y Sá»¹</p>\r\n\r\n<p><strong>TÆ° váº¥n v&agrave; Ä‘áº·t h&agrave;ng:&nbsp;</strong>0123456789</p>\r\n\r\n<p><strong>Thanh to&aacute;n:&nbsp;</strong>Trá»±c tiáº¿p khi nháº­n sáº£n pháº©m</p>\r\n', NULL, '<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<table border="1" cellpadding="0" cellspacing="1" style="width:617px">\r\n	<tbody>\r\n		<tr>\r\n			<td style="width:304px">\r\n			<p>ThÆ°Æ¡ng hiá»‡u</p>\r\n			</td>\r\n			<td style="width:311px">\r\n			<p>Tag Heuer</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td style="width:304px">\r\n			<p>Cháº¥t liá»‡u d&acirc;y</p>\r\n			</td>\r\n			<td style="width:311px">\r\n			<p>Th&eacute;p kh&ocirc;ng gá»‰</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td style="width:304px">\r\n			<p>NÄƒng lÆ°á»£ng</p>\r\n			</td>\r\n			<td style="width:311px">\r\n			<p>CÆ¡</p>\r\n			</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<p>&nbsp;</p>\r\n'),
(50, 'Carrera Goodwood ', 6, '5000', 41, '<p><strong>H&atilde;ng sáº£n xuáº¥t: Tag Heuer</strong></p>\r\n\r\n<p><strong>Loáº¡i Ä‘á»“ng há»“:&nbsp;Äá»“ng há»“ nam</strong></p>\r\n\r\n<p><strong>Cháº¥t liá»‡u d&acirc;y:</strong>&nbsp;Th&eacute;p kh&ocirc;ng gá»‰&nbsp;</p>\r\n\r\n<p><strong>Cháº¥t liá»‡u máº·t:&nbsp;</strong>sapphia glass</p>\r\n\r\n<p><strong>Cháº¥t liá»‡u vá» :</strong>&nbsp;Da</p>\r\n\r\n<p><strong>ÄÆ°á»ng k&iacute;nh vá»</strong>&nbsp;:45 mm</p>\r\n\r\n<p><strong>Chá»‘ng nÆ°á»›c:&nbsp;</strong>3 bar</p>\r\n\r\n<p><strong>NÄƒng lÆ°á»£ng sá»­ dá»¥ng:</strong>&nbsp;Quartz</p>\r\n\r\n<p><strong>Báº£o h&agrave;nh: 10 nÄƒm</strong></p>\r\n\r\n<p><strong>Xuáº¥t xá»©:&nbsp;</strong>Thá»¥y Sá»¹</p>\r\n\r\n<p><strong>TÆ° váº¥n v&agrave; Ä‘áº·t h&agrave;ng:&nbsp;</strong>0123456789</p>\r\n\r\n<p><strong>Thanh to&aacute;n:&nbsp;</strong>Trá»±c tiáº¿p khi nháº­n sáº£n pháº©m</p>\r\n', NULL, '<p>&nbsp;</p>\r\n\r\n<table border="1" cellpadding="0" cellspacing="1" style="width:617px">\r\n	<tbody>\r\n		<tr>\r\n			<td style="width:304px">\r\n			<p>ThÆ°Æ¡ng hiá»‡u</p>\r\n			</td>\r\n			<td style="width:311px">\r\n			<p>Tag Heuer</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td style="width:304px">\r\n			<p>Cháº¥t liá»‡u d&acirc;y</p>\r\n			</td>\r\n			<td style="width:311px">\r\n			<p>Da</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td style="width:304px">\r\n			<p>NÄƒng lÆ°á»£ng</p>\r\n			</td>\r\n			<td style="width:311px">\r\n			<p>CÆ¡</p>\r\n			</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<p>&nbsp;</p>\r\n'),
(52, ' Carrera Spain', 8, '5340', 41, '<p><strong>H&atilde;ng sáº£n xuáº¥t: Tag Heuer</strong></p>\r\n\r\n<p><strong>Loáº¡i Ä‘á»“ng há»“:&nbsp;Äá»“ng há»“ nam</strong></p>\r\n\r\n<p><strong>Cháº¥t liá»‡u d&acirc;y:</strong>&nbsp;Da</p>\r\n\r\n<p><strong>Cháº¥t liá»‡u máº·t:&nbsp;</strong>sapphia glass</p>\r\n\r\n<p><strong>Cháº¥t liá»‡u vá» :</strong>&nbsp;Th&eacute;p kh&ocirc;ng gá»‰&nbsp;</p>\r\n\r\n<p><strong>ÄÆ°á»ng k&iacute;nh vá»</strong>&nbsp;:45 mm</p>\r\n\r\n<p><strong>Chá»‘ng nÆ°á»›c:&nbsp;</strong>3 bar</p>\r\n\r\n<p><strong>NÄƒng lÆ°á»£ng sá»­ dá»¥ng:</strong>&nbsp;Quartz</p>\r\n\r\n<p><strong>Báº£o h&agrave;nh: 10 nÄƒm</strong></p>\r\n\r\n<p><strong>Xuáº¥t xá»©:&nbsp;</strong>Thá»¥y Sá»¹</p>\r\n\r\n<p><strong>TÆ° váº¥n v&agrave; Ä‘áº·t h&agrave;ng:&nbsp;</strong>0123456789</p>\r\n\r\n<p><strong>Thanh to&aacute;n:&nbsp;</strong>Trá»±c tiáº¿p khi nháº­n sáº£n pháº©m</p>\r\n', NULL, '<p>&nbsp;</p>\r\n\r\n<table border="1" cellpadding="0" cellspacing="1" style="width:617px">\r\n	<tbody>\r\n		<tr>\r\n			<td style="width:304px">\r\n			<p>ThÆ°Æ¡ng hiá»‡u</p>\r\n			</td>\r\n			<td style="width:311px">\r\n			<p>Tag Heuer</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td style="width:304px">\r\n			<p>Cháº¥t liá»‡u d&acirc;y</p>\r\n			</td>\r\n			<td style="width:311px">\r\n			<p>Da</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td style="width:304px">\r\n			<p>NÄƒng lÆ°á»£ng</p>\r\n			</td>\r\n			<td style="width:311px">\r\n			<p>CÆ¡</p>\r\n			</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n'),
(53, 'Monaco 2001 ', 14, '7200', 41, '<h2><strong>H&atilde;ng sáº£n xuáº¥t: Tag Heuer</strong></h2>\r\n\r\n<h2><strong>Loáº¡i Ä‘á»“ng há»“:&nbsp;Äá»“ng há»“ nam</strong></h2>\r\n\r\n<h2><strong>Cháº¥t liá»‡u d&acirc;y:</strong>&nbsp;Th&eacute;p kh&ocirc;ng gá»‰&nbsp;</h2>\r\n\r\n<h2><strong>Cháº¥t liá»‡u máº·t:&nbsp;</strong>sapphia glass</h2>\r\n\r\n<h2><strong>Cháº¥t liá»‡u vá» :</strong>&nbsp;Th&eacute;p kh&ocirc;ng gá»‰&nbsp;</h2>\r\n\r\n<h2><strong>ÄÆ°á»ng k&iacute;nh vá»</strong>&nbsp;:45 mm</h2>\r\n\r\n<h2><strong>Chá»‘ng nÆ°á»›c:&nbsp;</strong>3 bar</h2>\r\n\r\n<h2><strong>NÄƒng lÆ°á»£ng sá»­ dá»¥ng:</strong>&nbsp;Quartz</h2>\r\n\r\n<h2><strong>Báº£o h&agrave;nh: 10 nÄƒm</strong></h2>\r\n\r\n<h2><strong>Xuáº¥t xá»©:&nbsp;</strong>Thá»¥y Sá»¹</h2>\r\n\r\n<h2><strong>TÆ° váº¥n v&agrave; Ä‘áº·t h&agrave;ng:&nbsp;</strong>0123456789</h2>\r\n\r\n<h2><strong>Thanh to&aacute;n:&nbsp;</strong>Trá»±c tiáº¿p khi nháº­n sáº£n pháº©m</h2>\r\n', NULL, '<p>&nbsp;</p>\r\n\r\n<table border="1" cellpadding="0" cellspacing="1" style="width:617px">\r\n	<tbody>\r\n		<tr>\r\n			<td style="width:304px">\r\n			<p>ThÆ°Æ¡ng hiá»‡u</p>\r\n			</td>\r\n			<td style="width:311px">\r\n			<p>Tag Heuer</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td style="width:304px">\r\n			<p>Cháº¥t liá»‡u d&acirc;y</p>\r\n			</td>\r\n			<td style="width:311px">\r\n			<p>Da</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td style="width:304px">\r\n			<p>NÄƒng lÆ°á»£ng</p>\r\n			</td>\r\n			<td style="width:311px">\r\n			<p>CÆ¡</p>\r\n			</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n'),
(54, 'Aquaracer', 11, '2100', 41, '<h2><strong>H&atilde;ng sáº£n xuáº¥t: Tag Heuer</strong></h2>\r\n\r\n<h2><strong>Loáº¡i Ä‘á»“ng há»“:&nbsp;Äá»“ng há»“ nam</strong></h2>\r\n\r\n<h2><strong>Cháº¥t liá»‡u d&acirc;y:</strong>&nbsp;Da</h2>\r\n\r\n<h2><strong>Cháº¥t liá»‡u máº·t:&nbsp;</strong>sapphia glass</h2>\r\n\r\n<h2><strong>Cháº¥t liá»‡u vá» :</strong>&nbsp;Th&eacute;p kh&ocirc;ng gá»‰&nbsp;</h2>\r\n\r\n<h2><strong>ÄÆ°á»ng k&iacute;nh vá»</strong>&nbsp;:45 mm</h2>\r\n\r\n<h2><strong>Chá»‘ng nÆ°á»›c:&nbsp;</strong>3 bar</h2>\r\n\r\n<h2><strong>NÄƒng lÆ°á»£ng sá»­ dá»¥ng:</strong>&nbsp;Quartz</h2>\r\n\r\n<h2><strong>Báº£o h&agrave;nh: 10 nÄƒm</strong></h2>\r\n\r\n<h2><strong>Xuáº¥t xá»©:&nbsp;</strong>Thá»¥y Sá»¹</h2>\r\n\r\n<h2><strong>TÆ° váº¥n v&agrave; Ä‘áº·t h&agrave;ng:&nbsp;</strong>0123456789</h2>\r\n\r\n<h2><strong>Thanh to&aacute;n:&nbsp;</strong>Trá»±c tiáº¿p khi nháº­n sáº£n pháº©m</h2>\r\n', NULL, '<p>&nbsp;</p>\r\n\r\n<table border="1" cellpadding="0" cellspacing="1" style="width:617px">\r\n	<tbody>\r\n		<tr>\r\n			<td style="width:304px">\r\n			<p>ThÆ°Æ¡ng hiá»‡u</p>\r\n			</td>\r\n			<td style="width:311px">\r\n			<p>Tag Heuer</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td style="width:304px">\r\n			<p>Cháº¥t liá»‡u d&acirc;y</p>\r\n			</td>\r\n			<td style="width:311px">Da</td>\r\n		</tr>\r\n		<tr>\r\n			<td style="width:304px">\r\n			<p>NÄƒng lÆ°á»£ng</p>\r\n			</td>\r\n			<td style="width:311px">\r\n			<p>CÆ¡</p>\r\n			</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n'),
(55, 'Mercedes Benz SLR', 14, '3200', 41, '<h2><strong>H&atilde;ng sáº£n xuáº¥t: Tag Heuer</strong></h2>\r\n\r\n<h2><strong>Loáº¡i Ä‘á»“ng há»“:&nbsp;Äá»“ng há»“ nam</strong></h2>\r\n\r\n<h2><strong>Cháº¥t liá»‡u d&acirc;y:</strong>&nbsp;Th&eacute;p kh&ocirc;ng gá»‰&nbsp;</h2>\r\n\r\n<h2><strong>Cháº¥t liá»‡u máº·t:&nbsp;</strong>sapphia glass</h2>\r\n\r\n<h2><strong>Cháº¥t liá»‡u vá» :</strong>&nbsp;Th&eacute;p kh&ocirc;ng gá»‰&nbsp;</h2>\r\n\r\n<h2><strong>ÄÆ°á»ng k&iacute;nh vá»</strong>&nbsp;:45 mm</h2>\r\n\r\n<h2><strong>Chá»‘ng nÆ°á»›c:&nbsp;</strong>3 bar</h2>\r\n\r\n<h2><strong>NÄƒng lÆ°á»£ng sá»­ dá»¥ng:</strong>&nbsp;Quartz</h2>\r\n\r\n<h2><strong>Báº£o h&agrave;nh: 10 nÄƒm</strong></h2>\r\n\r\n<h2><strong>Xuáº¥t xá»©:&nbsp;</strong>Thá»¥y Sá»¹</h2>\r\n\r\n<h2><strong>TÆ° váº¥n v&agrave; Ä‘áº·t h&agrave;ng:&nbsp;</strong>0123456789</h2>\r\n\r\n<h2><strong>Thanh to&aacute;n:&nbsp;</strong>Trá»±c tiáº¿p khi nháº­n sáº£n pháº©m</h2>\r\n', NULL, '<h2>&nbsp;</h2>\r\n\r\n<table border="1" cellpadding="0" cellspacing="1" style="width:617px">\r\n	<tbody>\r\n		<tr>\r\n			<td style="width:304px">\r\n			<h2>ThÆ°Æ¡ng hiá»‡u</h2>\r\n			</td>\r\n			<td style="width:311px">\r\n			<h2>Tag Heuer</h2>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td style="width:304px">\r\n			<h2>Cháº¥t liá»‡u d&acirc;y</h2>\r\n			</td>\r\n			<td style="width:311px">\r\n			<h2>Th&eacute;p kh&ocirc;ng gá»‰</h2>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td style="width:304px">\r\n			<h2>NÄƒng lÆ°á»£ng</h2>\r\n			</td>\r\n			<td style="width:311px">\r\n			<h2>CÆ¡</h2>\r\n			</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n'),
(56, 'Radiomir 1940 ', 11, '14200', 42, '<h2><strong>H&atilde;ng sáº£n xuáº¥t: Panerai</strong></h2>\r\n\r\n<h2><strong>Loáº¡i Ä‘á»“ng há»“:&nbsp;Äá»“ng há»“ nam</strong></h2>\r\n\r\n<h2><strong>Cháº¥t liá»‡u d&acirc;y:</strong>&nbsp;Da</h2>\r\n\r\n<h2><strong>Cháº¥t liá»‡u máº·t:&nbsp;</strong>sapphia glass</h2>\r\n\r\n<h2><strong>Cháº¥t liá»‡u vá» :</strong>&nbsp;Th&eacute;p kh&ocirc;ng gá»‰&nbsp;</h2>\r\n\r\n<h2><strong>ÄÆ°á»ng k&iacute;nh vá»</strong>&nbsp;:45 mm</h2>\r\n\r\n<h2><strong>Chá»‘ng nÆ°á»›c:&nbsp;</strong>3 bar</h2>\r\n\r\n<h2><strong>NÄƒng lÆ°á»£ng sá»­ dá»¥ng:</strong>&nbsp;Quartz</h2>\r\n\r\n<h2><strong>Báº£o h&agrave;nh: 10 nÄƒm</strong></h2>\r\n\r\n<h2><strong>Xuáº¥t xá»©:&nbsp;</strong>Thá»¥y Sá»¹</h2>\r\n\r\n<h2><strong>TÆ° váº¥n v&agrave; Ä‘áº·t h&agrave;ng:&nbsp;</strong>0123456789</h2>\r\n\r\n<h2><strong>Thanh to&aacute;n:&nbsp;</strong>Trá»±c tiáº¿p khi nháº­n sáº£n pháº©m</h2>\r\n', NULL, '<table border="1" cellpadding="0" cellspacing="1" style="width:617px">\r\n	<tbody>\r\n		<tr>\r\n			<td style="width:304px">\r\n			<h2>ThÆ°Æ¡ng hiá»‡u</h2>\r\n			</td>\r\n			<td style="width:311px">\r\n			<h2>Tag Heuer</h2>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td style="width:304px">\r\n			<h2>Cháº¥t liá»‡u d&acirc;y</h2>\r\n			</td>\r\n			<td style="width:311px">\r\n			<h2>Th&eacute;p kh&ocirc;ng gá»‰</h2>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td style="width:304px">\r\n			<h2>NÄƒng lÆ°á»£ng</h2>\r\n			</td>\r\n			<td style="width:311px">\r\n			<h2>Da</h2>\r\n			</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n'),
(57, 'Luminor Daylight', 8, '9020', 42, '<h2><strong>H&atilde;ng sáº£n xuáº¥t: Panerai</strong></h2>\r\n\r\n<h2><strong>Loáº¡i Ä‘á»“ng há»“:&nbsp;Äá»“ng há»“ nam</strong></h2>\r\n\r\n<h2><strong>Cháº¥t liá»‡u d&acirc;y:</strong>&nbsp;Th&eacute;p kh&ocirc;ng gá»‰&nbsp;</h2>\r\n\r\n<h2><strong>Cháº¥t liá»‡u máº·t:&nbsp;</strong>sapphia glass</h2>\r\n\r\n<h2><strong>Cháº¥t liá»‡u vá» :</strong>&nbsp;Th&eacute;p kh&ocirc;ng gá»‰&nbsp;</h2>\r\n\r\n<h2><strong>ÄÆ°á»ng k&iacute;nh vá»</strong>&nbsp;:45 mm</h2>\r\n\r\n<h2><strong>Chá»‘ng nÆ°á»›c:&nbsp;</strong>3 bar</h2>\r\n\r\n<h2><strong>NÄƒng lÆ°á»£ng sá»­ dá»¥ng:</strong>&nbsp;Quartz</h2>\r\n\r\n<h2><strong>Báº£o h&agrave;nh: 10 nÄƒm</strong></h2>\r\n\r\n<h2><strong>Xuáº¥t xá»©:&nbsp;</strong>Thá»¥y Sá»¹</h2>\r\n\r\n<h2><strong>TÆ° váº¥n v&agrave; Ä‘áº·t h&agrave;ng:&nbsp;</strong>0123456789</h2>\r\n\r\n<h2><strong>Thanh to&aacute;n:&nbsp;</strong>Trá»±c tiáº¿p khi nháº­n sáº£n pháº©m</h2>\r\n', NULL, '<table border="1" cellpadding="0" cellspacing="1" style="width:617px">\r\n	<tbody>\r\n		<tr>\r\n			<td style="width:304px">\r\n			<h2>ThÆ°Æ¡ng hiá»‡u</h2>\r\n			</td>\r\n			<td style="width:311px">\r\n			<h2>Tag Heuer</h2>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td style="width:304px">\r\n			<h2>Cháº¥t liá»‡u d&acirc;y</h2>\r\n			</td>\r\n			<td style="width:311px">\r\n			<h2>Th&eacute;p kh&ocirc;ng gá»‰</h2>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td style="width:304px">\r\n			<h2>NÄƒng lÆ°á»£ng</h2>\r\n			</td>\r\n			<td style="width:311px">\r\n			<h2>Da</h2>\r\n			</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n'),
(58, 'Rainbow Chronograph', 12, '4700', 43, '<h2><strong>H&atilde;ng sáº£n xuáº¥t: Zenith</strong></h2>\r\n\r\n<h2><strong>Loáº¡i Ä‘á»“ng há»“:&nbsp;Äá»“ng há»“ nam</strong></h2>\r\n\r\n<h2><strong>Cháº¥t liá»‡u d&acirc;y:</strong>&nbsp;Th&eacute;p kh&ocirc;ng gá»‰&nbsp;</h2>\r\n\r\n<h2><strong>Cháº¥t liá»‡u máº·t:&nbsp;</strong>sapphia glass</h2>\r\n\r\n<h2><strong>Cháº¥t liá»‡u vá» :</strong>&nbsp;Th&eacute;p kh&ocirc;ng gá»‰&nbsp;</h2>\r\n\r\n<h2><strong>ÄÆ°á»ng k&iacute;nh vá»</strong>&nbsp;:45 mm</h2>\r\n\r\n<h2><strong>Chá»‘ng nÆ°á»›c:&nbsp;</strong>3 bar</h2>\r\n\r\n<h2><strong>NÄƒng lÆ°á»£ng sá»­ dá»¥ng:</strong>&nbsp;Quartz</h2>\r\n\r\n<h2><strong>Báº£o h&agrave;nh: 10 nÄƒm</strong></h2>\r\n\r\n<h2><strong>Xuáº¥t xá»©:&nbsp;</strong>Thá»¥y Sá»¹</h2>\r\n\r\n<h2><strong>TÆ° váº¥n v&agrave; Ä‘áº·t h&agrave;ng:&nbsp;</strong>0123456789</h2>\r\n\r\n<h2><strong>Thanh to&aacute;n:&nbsp;</strong>Trá»±c tiáº¿p khi nháº­n sáº£n pháº©m</h2>\r\n', NULL, '<h2>&nbsp;</h2>\r\n\r\n<table border="1" cellpadding="0" cellspacing="1" style="width:617px">\r\n	<tbody>\r\n		<tr>\r\n			<td style="width:304px">\r\n			<h2>ThÆ°Æ¡ng hiá»‡u</h2>\r\n			</td>\r\n			<td style="width:311px">\r\n			<h2><strong>Zenith</strong></h2>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td style="width:304px">\r\n			<h2>Cháº¥t liá»‡u d&acirc;y</h2>\r\n			</td>\r\n			<td style="width:311px">\r\n			<h2>Th&eacute;p kh&ocirc;ng gá»‰</h2>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td style="width:304px">\r\n			<h2>NÄƒng lÆ°á»£ng</h2>\r\n			</td>\r\n			<td style="width:311px">\r\n			<h2>CÆ¡</h2>\r\n			</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n'),
(59, 'Rainbow Chronograph El Primero', 10, '3600', 43, '<h2><strong>H&atilde;ng sáº£n xuáº¥t: Zenith</strong></h2>\r\n\r\n<h2><strong>Loáº¡i Ä‘á»“ng há»“:&nbsp;Äá»“ng há»“ nam</strong></h2>\r\n\r\n<h2><strong>Cháº¥t liá»‡u d&acirc;y:</strong>&nbsp;Th&eacute;p kh&ocirc;ng gá»‰&nbsp;</h2>\r\n\r\n<h2><strong>Cháº¥t liá»‡u máº·t:&nbsp;</strong>sapphia glass</h2>\r\n\r\n<h2><strong>Cháº¥t liá»‡u vá» :</strong>&nbsp;Th&eacute;p kh&ocirc;ng gá»‰&nbsp;</h2>\r\n\r\n<h2><strong>ÄÆ°á»ng k&iacute;nh vá»</strong>&nbsp;:45 mm</h2>\r\n\r\n<h2><strong>Chá»‘ng nÆ°á»›c:&nbsp;</strong>3 bar</h2>\r\n\r\n<h2><strong>NÄƒng lÆ°á»£ng sá»­ dá»¥ng:</strong>&nbsp;Quartz</h2>\r\n\r\n<h2><strong>Báº£o h&agrave;nh: 10 nÄƒm</strong></h2>\r\n\r\n<h2><strong>Xuáº¥t xá»©:&nbsp;</strong>Thá»¥y Sá»¹</h2>\r\n\r\n<h2><strong>TÆ° váº¥n v&agrave; Ä‘áº·t h&agrave;ng:&nbsp;</strong>0123456789</h2>\r\n\r\n<h2><strong>Thanh to&aacute;n:&nbsp;</strong>Trá»±c tiáº¿p khi nháº­n sáº£n pháº©m</h2>\r\n', NULL, '<h2>&nbsp;</h2>\r\n\r\n<table border="1" cellpadding="0" cellspacing="1" style="width:617px">\r\n	<tbody>\r\n		<tr>\r\n			<td style="width:304px">\r\n			<h2>ThÆ°Æ¡ng hiá»‡u</h2>\r\n			</td>\r\n			<td style="width:311px">\r\n			<h2><strong>Zenith</strong></h2>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td style="width:304px">\r\n			<h2>Cháº¥t liá»‡u d&acirc;y</h2>\r\n			</td>\r\n			<td style="width:311px">\r\n			<h2>Th&eacute;p kh&ocirc;ng gá»‰</h2>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td style="width:304px">\r\n			<h2>NÄƒng lÆ°á»£ng</h2>\r\n			</td>\r\n			<td style="width:311px">\r\n			<h2>CÆ¡</h2>\r\n			</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n'),
(60, 'Rainbow Chronograph El Primero Gold/Steel', 9, '3200', 43, '<h2><strong>H&atilde;ng sáº£n xuáº¥t: Zenith</strong></h2>\r\n\r\n<h2><strong>Loáº¡i Ä‘á»“ng há»“:&nbsp;Äá»“ng há»“ nam</strong></h2>\r\n\r\n<h2><strong>Cháº¥t liá»‡u d&acirc;y:</strong>&nbsp;Th&eacute;p kh&ocirc;ng gá»‰&nbsp;</h2>\r\n\r\n<h2><strong>Cháº¥t liá»‡u máº·t:&nbsp;</strong>sapphia glass</h2>\r\n\r\n<h2><strong>Cháº¥t liá»‡u vá» :</strong>&nbsp;Th&eacute;p kh&ocirc;ng gá»‰&nbsp;</h2>\r\n\r\n<h2><strong>ÄÆ°á»ng k&iacute;nh vá»</strong>&nbsp;:45 mm</h2>\r\n\r\n<h2><strong>Chá»‘ng nÆ°á»›c:&nbsp;</strong>3 bar</h2>\r\n\r\n<h2><strong>NÄƒng lÆ°á»£ng sá»­ dá»¥ng:</strong>&nbsp;Quartz</h2>\r\n\r\n<h2><strong>Báº£o h&agrave;nh: 10 nÄƒm</strong></h2>\r\n\r\n<h2><strong>Xuáº¥t xá»©:&nbsp;</strong>Thá»¥y Sá»¹</h2>\r\n\r\n<h2><strong>TÆ° váº¥n v&agrave; Ä‘áº·t h&agrave;ng:&nbsp;</strong>0123456789</h2>\r\n\r\n<h2><strong>Thanh to&aacute;n:&nbsp;</strong>Trá»±c tiáº¿p khi nháº­n sáº£n pháº©m</h2>\r\n', NULL, '<h2>&nbsp;</h2>\r\n\r\n<table border="1" cellpadding="0" cellspacing="1" style="width:617px">\r\n	<tbody>\r\n		<tr>\r\n			<td style="width:304px">\r\n			<h2>ThÆ°Æ¡ng hiá»‡u</h2>\r\n			</td>\r\n			<td style="width:311px">\r\n			<h2><strong>Zenith</strong></h2>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td style="width:304px">\r\n			<h2>Cháº¥t liá»‡u d&acirc;y</h2>\r\n			</td>\r\n			<td style="width:311px">\r\n			<h2>Th&eacute;p kh&ocirc;ng gá»‰</h2>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td style="width:304px">\r\n			<h2>NÄƒng lÆ°á»£ng</h2>\r\n			</td>\r\n			<td style="width:311px">\r\n			<h2>CÆ¡</h2>\r\n			</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n'),
(61, 'El Primero Class', 12, '2100', 43, '<h2><strong>H&atilde;ng sáº£n xuáº¥t: Zenith</strong></h2>\r\n\r\n<h2><strong>Loáº¡i Ä‘á»“ng há»“:&nbsp;Äá»“ng há»“ nam</strong></h2>\r\n\r\n<h2><strong>Cháº¥t liá»‡u d&acirc;y:</strong>&nbsp;Th&eacute;p kh&ocirc;ng gá»‰&nbsp;</h2>\r\n\r\n<h2><strong>Cháº¥t liá»‡u máº·t:&nbsp;</strong>sapphia glass</h2>\r\n\r\n<h2><strong>Cháº¥t liá»‡u vá» :</strong>&nbsp;Th&eacute;p kh&ocirc;ng gá»‰&nbsp;</h2>\r\n\r\n<h2><strong>ÄÆ°á»ng k&iacute;nh vá»</strong>&nbsp;:45 mm</h2>\r\n\r\n<h2><strong>Chá»‘ng nÆ°á»›c:&nbsp;</strong>3 bar</h2>\r\n\r\n<h2><strong>NÄƒng lÆ°á»£ng sá»­ dá»¥ng:</strong>&nbsp;Quartz</h2>\r\n\r\n<h2><strong>Báº£o h&agrave;nh: 10 nÄƒm</strong></h2>\r\n\r\n<h2><strong>Xuáº¥t xá»©:&nbsp;</strong>Thá»¥y Sá»¹</h2>\r\n\r\n<h2><strong>TÆ° váº¥n v&agrave; Ä‘áº·t h&agrave;ng:&nbsp;</strong>0123456789</h2>\r\n\r\n<h2><strong>Thanh to&aacute;n:&nbsp;</strong>Trá»±c tiáº¿p khi nháº­n sáº£n pháº©m</h2>\r\n', NULL, '<h2>&nbsp;</h2>\r\n\r\n<table border="1" cellpadding="0" cellspacing="1" style="width:617px">\r\n	<tbody>\r\n		<tr>\r\n			<td style="width:304px">\r\n			<h2>ThÆ°Æ¡ng hiá»‡u</h2>\r\n			</td>\r\n			<td style="width:311px">\r\n			<h2><strong>Zenith</strong></h2>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td style="width:304px">\r\n			<h2>Cháº¥t liá»‡u d&acirc;y</h2>\r\n			</td>\r\n			<td style="width:311px">\r\n			<h2>Th&eacute;p kh&ocirc;ng gá»‰</h2>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td style="width:304px">\r\n			<h2>NÄƒng lÆ°á»£ng</h2>\r\n			</td>\r\n			<td style="width:311px">\r\n			<h2>CÆ¡</h2>\r\n			</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n'),
(62, ' Automatic Yellow ', 12, '370', 43, '', NULL, ''),
(63, 'Chronomaster XXT ', 3, '6700', 43, '<h2><strong>H&atilde;ng sáº£n xuáº¥t: Zenith</strong></h2>\r\n\r\n<h2><strong>Loáº¡i Ä‘á»“ng há»“:&nbsp;Äá»“ng há»“ nam</strong></h2>\r\n\r\n<h2><strong>Cháº¥t liá»‡u d&acirc;y:</strong>&nbsp;Th&eacute;p kh&ocirc;ng gá»‰&nbsp;</h2>\r\n\r\n<h2><strong>Cháº¥t liá»‡u máº·t:&nbsp;</strong>sapphia glass</h2>\r\n\r\n<h2><strong>Cháº¥t liá»‡u vá» :</strong>&nbsp;Th&eacute;p kh&ocirc;ng gá»‰&nbsp;</h2>\r\n\r\n<h2><strong>ÄÆ°á»ng k&iacute;nh vá»</strong>&nbsp;:45 mm</h2>\r\n\r\n<h2><strong>Chá»‘ng nÆ°á»›c:&nbsp;</strong>3 bar</h2>\r\n\r\n<h2><strong>NÄƒng lÆ°á»£ng sá»­ dá»¥ng:</strong>&nbsp;Quartz</h2>\r\n\r\n<h2><strong>Báº£o h&agrave;nh: 10 nÄƒm</strong></h2>\r\n\r\n<h2><strong>Xuáº¥t xá»©:&nbsp;</strong>Thá»¥y Sá»¹</h2>\r\n\r\n<h2><strong>TÆ° váº¥n v&agrave; Ä‘áº·t h&agrave;ng:&nbsp;</strong>0123456789</h2>\r\n\r\n<h2><strong>Thanh to&aacute;n:&nbsp;</strong>Trá»±c tiáº¿p khi nháº­n sáº£n pháº©m</h2>\r\n', NULL, '<table border="1" cellpadding="0" cellspacing="1" style="width:617px">\r\n	<tbody>\r\n		<tr>\r\n			<td style="width:304px">\r\n			<h2>ThÆ°Æ¡ng hiá»‡u</h2>\r\n			</td>\r\n			<td style="width:311px">\r\n			<h2><strong>Zenith</strong></h2>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td style="width:304px">\r\n			<h2>Cháº¥t liá»‡u d&acirc;y</h2>\r\n			</td>\r\n			<td style="width:311px">\r\n			<h2>Th&eacute;p kh&ocirc;ng gá»‰</h2>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td style="width:304px">\r\n			<h2>NÄƒng lÆ°á»£ng</h2>\r\n			</td>\r\n			<td style="width:311px">\r\n			<h2>CÆ¡</h2>\r\n			</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n'),
(64, ' Pilot Montre', 11, '5900', 43, '<h2><strong>H&atilde;ng sáº£n xuáº¥t: Zenith</strong></h2>\r\n\r\n<h2><strong>Loáº¡i Ä‘á»“ng há»“:&nbsp;Äá»“ng há»“ nam</strong></h2>\r\n\r\n<h2><strong>Cháº¥t liá»‡u d&acirc;y:</strong>&nbsp;Th&eacute;p kh&ocirc;ng gá»‰&nbsp;</h2>\r\n\r\n<h2><strong>Cháº¥t liá»‡u máº·t:&nbsp;</strong>sapphia glass</h2>\r\n\r\n<h2><strong>Cháº¥t liá»‡u vá» :</strong>&nbsp;Th&eacute;p kh&ocirc;ng gá»‰&nbsp;</h2>\r\n\r\n<h2><strong>ÄÆ°á»ng k&iacute;nh vá»</strong>&nbsp;:45 mm</h2>\r\n\r\n<h2><strong>Chá»‘ng nÆ°á»›c:&nbsp;</strong>3 bar</h2>\r\n\r\n<h2><strong>NÄƒng lÆ°á»£ng sá»­ dá»¥ng:</strong>&nbsp;Quartz</h2>\r\n\r\n<h2><strong>Báº£o h&agrave;nh: 10 nÄƒm</strong></h2>\r\n\r\n<h2><strong>Xuáº¥t xá»©:&nbsp;</strong>Thá»¥y Sá»¹</h2>\r\n\r\n<h2><strong>TÆ° váº¥n v&agrave; Ä‘áº·t h&agrave;ng:&nbsp;</strong>0123456789</h2>\r\n\r\n<h2><strong>Thanh to&aacute;n:&nbsp;</strong>Trá»±c tiáº¿p khi nháº­n sáº£n pháº©m</h2>\r\n', NULL, '<table border="1" cellpadding="0" cellspacing="1" style="width:617px">\r\n	<tbody>\r\n		<tr>\r\n			<td style="width:304px">\r\n			<h2>ThÆ°Æ¡ng hiá»‡u</h2>\r\n			</td>\r\n			<td style="width:311px">\r\n			<h2><strong>Zenith</strong></h2>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td style="width:304px">\r\n			<h2>Cháº¥t liá»‡u d&acirc;y</h2>\r\n			</td>\r\n			<td style="width:311px">\r\n			<h2>Th&eacute;p kh&ocirc;ng gá»‰</h2>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td style="width:304px">\r\n			<h2>NÄƒng lÆ°á»£ng</h2>\r\n			</td>\r\n			<td style="width:311px">\r\n			<h2>CÆ¡</h2>\r\n			</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n'),
(65, 'Datejust II', 12, '14000', 40, '<h2><strong>H&atilde;ng sáº£n xuáº¥t: Rolex</strong></h2>\r\n\r\n<h2><strong>Loáº¡i Ä‘á»“ng há»“:&nbsp;Äá»“ng há»“ nam</strong></h2>\r\n\r\n<h2><strong>Cháº¥t liá»‡u d&acirc;y:</strong>&nbsp;Th&eacute;p kh&ocirc;ng gá»‰&nbsp;</h2>\r\n\r\n<h2><strong>Cháº¥t liá»‡u máº·t:&nbsp;</strong>sapphia glass</h2>\r\n\r\n<h2><strong>Cháº¥t liá»‡u vá» :</strong>&nbsp;Th&eacute;p kh&ocirc;ng gá»‰&nbsp;</h2>\r\n\r\n<h2><strong>ÄÆ°á»ng k&iacute;nh vá»</strong>&nbsp;:45 mm</h2>\r\n\r\n<h2><strong>Chá»‘ng nÆ°á»›c:&nbsp;</strong>3 bar</h2>\r\n\r\n<h2><strong>NÄƒng lÆ°á»£ng sá»­ dá»¥ng:</strong>&nbsp;Quartz</h2>\r\n\r\n<h2><strong>Báº£o h&agrave;nh: 10 nÄƒm</strong></h2>\r\n\r\n<h2><strong>Xuáº¥t xá»©:&nbsp;</strong>Thá»¥y Sá»¹</h2>\r\n\r\n<h2><strong>TÆ° váº¥n v&agrave; Ä‘áº·t h&agrave;ng:&nbsp;</strong>0123456789</h2>\r\n\r\n<h2><strong>Thanh to&aacute;n:&nbsp;</strong>Trá»±c tiáº¿p khi nháº­n sáº£n pháº©m</h2>\r\n', NULL, '<h2>&nbsp;</h2>\r\n\r\n<table border="1" cellpadding="0" cellspacing="1" style="width:617px">\r\n	<tbody>\r\n		<tr>\r\n			<td style="width:304px">\r\n			<h2>ThÆ°Æ¡ng hiá»‡u</h2>\r\n			</td>\r\n			<td style="width:311px">\r\n			<h2><strong>Rolex</strong></h2>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td style="width:304px">\r\n			<h2>Cháº¥t liá»‡u d&acirc;y</h2>\r\n			</td>\r\n			<td style="width:311px">\r\n			<h2>Th&eacute;p kh&ocirc;ng gá»‰</h2>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td style="width:304px">\r\n			<h2>NÄƒng lÆ°á»£ng</h2>\r\n			</td>\r\n			<td style="width:311px">\r\n			<h2>CÆ¡</h2>\r\n			</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n'),
(66, 'Submariner ', 11, '7200', 40, '<h2><strong>H&atilde;ng sáº£n xuáº¥t: Rolex</strong></h2>\r\n\r\n<h2><strong>Loáº¡i Ä‘á»“ng há»“:&nbsp;Äá»“ng há»“ nam</strong></h2>\r\n\r\n<h2><strong>Cháº¥t liá»‡u d&acirc;y:</strong>&nbsp;Th&eacute;p kh&ocirc;ng gá»‰&nbsp;</h2>\r\n\r\n<h2><strong>Cháº¥t liá»‡u máº·t:&nbsp;</strong>sapphia glass</h2>\r\n\r\n<h2><strong>Cháº¥t liá»‡u vá» :</strong>&nbsp;Th&eacute;p kh&ocirc;ng gá»‰&nbsp;</h2>\r\n\r\n<h2><strong>ÄÆ°á»ng k&iacute;nh vá»</strong>&nbsp;:45 mm</h2>\r\n\r\n<h2><strong>Chá»‘ng nÆ°á»›c:&nbsp;</strong>3 bar</h2>\r\n\r\n<h2><strong>NÄƒng lÆ°á»£ng sá»­ dá»¥ng:</strong>&nbsp;Quartz</h2>\r\n\r\n<h2><strong>Báº£o h&agrave;nh: 10 nÄƒm</strong></h2>\r\n\r\n<h2><strong>Xuáº¥t xá»©:&nbsp;</strong>Thá»¥y Sá»¹</h2>\r\n\r\n<h2><strong>TÆ° váº¥n v&agrave; Ä‘áº·t h&agrave;ng:&nbsp;</strong>0123456789</h2>\r\n\r\n<h2><strong>Thanh to&aacute;n:&nbsp;</strong>Trá»±c tiáº¿p khi nháº­n sáº£n pháº©m</h2>\r\n', NULL, '<table border="1" cellpadding="0" cellspacing="1" style="width:617px">\r\n	<tbody>\r\n		<tr>\r\n			<td style="width:304px">\r\n			<h2>ThÆ°Æ¡ng hiá»‡u</h2>\r\n			</td>\r\n			<td style="width:311px">\r\n			<h2><strong>Rolex</strong></h2>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td style="width:304px">\r\n			<h2>Cháº¥t liá»‡u d&acirc;y</h2>\r\n			</td>\r\n			<td style="width:311px">\r\n			<h2>Th&eacute;p kh&ocirc;ng gá»‰</h2>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td style="width:304px">\r\n			<h2>NÄƒng lÆ°á»£ng</h2>\r\n			</td>\r\n			<td style="width:311px">\r\n			<h2>CÆ¡</h2>\r\n			</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n'),
(67, 'Daytona Everose Gold', 11, '33000', 40, '<h2><strong>H&atilde;ng sáº£n xuáº¥t: Rolex</strong></h2>\r\n\r\n<h2><strong>Loáº¡i Ä‘á»“ng há»“:&nbsp;Äá»“ng há»“ nam</strong></h2>\r\n\r\n<h2><strong>Cháº¥t liá»‡u d&acirc;y:</strong>&nbsp;Da</h2>\r\n\r\n<h2><strong>Cháº¥t liá»‡u máº·t:&nbsp;</strong>sapphia glass</h2>\r\n\r\n<h2><strong>Cháº¥t liá»‡u vá» :</strong>&nbsp;Th&eacute;p kh&ocirc;ng gá»‰&nbsp;</h2>\r\n\r\n<h2><strong>ÄÆ°á»ng k&iacute;nh vá»</strong>&nbsp;:45 mm</h2>\r\n\r\n<h2><strong>Chá»‘ng nÆ°á»›c:&nbsp;</strong>3 bar</h2>\r\n\r\n<h2><strong>NÄƒng lÆ°á»£ng sá»­ dá»¥ng:</strong>&nbsp;Quartz</h2>\r\n\r\n<h2><strong>Báº£o h&agrave;nh: 10 nÄƒm</strong></h2>\r\n\r\n<h2><strong>Xuáº¥t xá»©:&nbsp;</strong>Thá»¥y Sá»¹</h2>\r\n\r\n<h2><strong>TÆ° váº¥n v&agrave; Ä‘áº·t h&agrave;ng:&nbsp;</strong>0123456789</h2>\r\n\r\n<h2><strong>Thanh to&aacute;n:&nbsp;</strong>Trá»±c tiáº¿p khi nháº­n sáº£n pháº©m</h2>\r\n', NULL, '<table border="1" cellpadding="0" cellspacing="1" style="width:617px">\r\n	<tbody>\r\n		<tr>\r\n			<td style="width:304px">\r\n			<h2>ThÆ°Æ¡ng hiá»‡u</h2>\r\n			</td>\r\n			<td style="width:311px">\r\n			<h2><strong>Rolex</strong></h2>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td style="width:304px">\r\n			<h2>Cháº¥t liá»‡u d&acirc;y</h2>\r\n			</td>\r\n			<td style="width:311px">\r\n			<h2>Da</h2>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td style="width:304px">\r\n			<h2>NÄƒng lÆ°á»£ng</h2>\r\n			</td>\r\n			<td style="width:311px">\r\n			<h2>CÆ¡</h2>\r\n			</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n'),
(68, 'Sea-Dweller Deepsea', 13, '14000', 40, '<h2><strong>H&atilde;ng sáº£n xuáº¥t: Rolex</strong></h2>\r\n\r\n<h2><strong>Loáº¡i Ä‘á»“ng há»“:&nbsp;Äá»“ng há»“ nam</strong></h2>\r\n\r\n<h2><strong>Cháº¥t liá»‡u d&acirc;y:</strong>&nbsp;Th&eacute;p kh&ocirc;ng gá»‰&nbsp;</h2>\r\n\r\n<h2><strong>Cháº¥t liá»‡u máº·t:&nbsp;</strong>sapphia glass</h2>\r\n\r\n<h2><strong>Cháº¥t liá»‡u vá» :</strong>&nbsp;Th&eacute;p kh&ocirc;ng gá»‰&nbsp;</h2>\r\n\r\n<h2><strong>ÄÆ°á»ng k&iacute;nh vá»</strong>&nbsp;:45 mm</h2>\r\n\r\n<h2><strong>Chá»‘ng nÆ°á»›c:&nbsp;</strong>3 bar</h2>\r\n\r\n<h2><strong>NÄƒng lÆ°á»£ng sá»­ dá»¥ng:</strong>&nbsp;Quartz</h2>\r\n\r\n<h2><strong>Báº£o h&agrave;nh: 10 nÄƒm</strong></h2>\r\n\r\n<h2><strong>Xuáº¥t xá»©:&nbsp;</strong>Thá»¥y Sá»¹</h2>\r\n\r\n<h2><strong>TÆ° váº¥n v&agrave; Ä‘áº·t h&agrave;ng:&nbsp;</strong>0123456789</h2>\r\n\r\n<h2><strong>Thanh to&aacute;n:&nbsp;</strong>Trá»±c tiáº¿p khi nháº­n sáº£n pháº©m</h2>\r\n', NULL, '<table border="1" cellpadding="0" cellspacing="1" style="width:617px">\r\n	<tbody>\r\n		<tr>\r\n			<td style="width:304px">\r\n			<h2>ThÆ°Æ¡ng hiá»‡u</h2>\r\n			</td>\r\n			<td style="width:311px">\r\n			<h2><strong>Rolex</strong></h2>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td style="width:304px">\r\n			<h2>Cháº¥t liá»‡u d&acirc;y</h2>\r\n			</td>\r\n			<td style="width:311px">\r\n			<h2>Th&eacute;p kh&ocirc;ng gá»‰</h2>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td style="width:304px">\r\n			<h2>NÄƒng lÆ°á»£ng</h2>\r\n			</td>\r\n			<td style="width:311px">\r\n			<h2>CÆ¡</h2>\r\n			</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `size`
--

CREATE TABLE `size` (
  `id` int(11) NOT NULL,
  `size` varchar(255) COLLATE utf8_vietnamese_ci DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Dumping data for table `size`
--

INSERT INTO `size` (`id`, `size`, `product_id`) VALUES
(72, '45mm', 49),
(73, '35mm', 49),
(74, '45mm', 50),
(77, '45mm', 52),
(78, '35mm', 52),
(79, '35mm', 53),
(80, '25mm', 53),
(81, '35mm', 54),
(82, '25mm', 54),
(83, '45mm', 55),
(84, '35mm', 55),
(85, '45mm', 56),
(86, '35mm', 56),
(87, '35mm', 57),
(88, '25mm', 57),
(89, '45mm', 58),
(90, '35mm', 58),
(91, '45mm', 59),
(92, '45mm', 60),
(93, '35mm', 60),
(94, '35mm', 61),
(95, '25mm', 61),
(96, '45mm', 62),
(97, '35mm', 62),
(98, '45mm', 63),
(99, '35mm', 63),
(100, '45mm', 64),
(101, '45mm', 65),
(102, '35mm', 65),
(103, '45mm', 66),
(104, '35mm', 66),
(105, '45mm', 67),
(106, '35mm', 67),
(107, '45mm', 68),
(108, '35mm', 68);

-- --------------------------------------------------------

--
-- Table structure for table `slider`
--

CREATE TABLE `slider` (
  `id` int(11) NOT NULL,
  `url` varchar(255) COLLATE utf8_vietnamese_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Dumping data for table `slider`
--

INSERT INTO `slider` (`id`, `url`) VALUES
(10, 'slider0.jpg'),
(11, 'slider1.jpg'),
(12, 'slider2.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) COLLATE utf8_vietnamese_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_vietnamese_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_vietnamese_ci NOT NULL,
  `level` tinyint(4) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `level`) VALUES
(2, 'admin', 'admin@admin.com', '$2y$10$xtCXYOb5qA6a9S35GTxIYu4LGdBKoeHDXEYoQa15.575IVnXUuHia', 1),
(13, 'user 1', 'user@user.com', '$2y$10$kKQuC60AGySloDSMgLGyMun.DIQMnt5Yri87UM9MMNEyAYM9BjGs2', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `colors`
--
ALTER TABLE `colors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `size`
--
ALTER TABLE `size`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `slider`
--
ALTER TABLE `slider`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `carts`
--
ALTER TABLE `carts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;
--
-- AUTO_INCREMENT for table `colors`
--
ALTER TABLE `colors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=116;
--
-- AUTO_INCREMENT for table `images`
--
ALTER TABLE `images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=269;
--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;
--
-- AUTO_INCREMENT for table `size`
--
ALTER TABLE `size`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=109;
--
-- AUTO_INCREMENT for table `slider`
--
ALTER TABLE `slider`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
