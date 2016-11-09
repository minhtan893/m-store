-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 09, 2016 at 08:29 AM
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
(4, 45, NULL, 'HÃ  Ná»™i', 'Nguyá»…n Minh TÃ¢n', '2016-11-09', 1, '0', '14800', 'Black', '45mm'),
(5, 30, NULL, 'SÃ i GÃ²n', 'Minh TÃ¢n', '2016-11-09', 2, '0', '3300', 'black', '45mm');

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
(23, 'rolex'),
(24, 'omega'),
(26, 'iwc'),
(27, 'cartier'),
(28, 'breitling'),
(36, 'panerai');

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
(31, 'grey', 25),
(32, 'grey', 26),
(33, 'white', 27),
(34, 'white', 28),
(35, 'white', 29),
(36, 'black', 30),
(37, 'white', 31),
(40, 'white', 34),
(41, 'black', 34),
(44, 'black', 36),
(45, 'navy', 36),
(46, 'black', 37),
(49, 'black', 38),
(50, 'Gold', 38),
(52, 'white', 40),
(53, 'grey', 40),
(54, 'white', 41),
(55, 'black', 42),
(58, 'Black', 44),
(59, 'Black', 45),
(60, 'Navy', 45),
(61, 'Grey', 45),
(62, 'blue', 46);

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
(93, '25-thumb.png', 1, 25),
(94, '25-img0.jpg', 0, 25),
(95, '25-img1.jpg', 0, 25),
(96, '25-img2.jpg', 0, 25),
(97, '26-thumb.jpg', 1, 26),
(98, '26-img0.jpg', 0, 26),
(99, '26-img1.jpg', 0, 26),
(100, '26-img2.jpg', 0, 26),
(101, '27-thumb.jpg', 1, 27),
(102, '27-img0.jpg', 0, 27),
(103, '27-img1.jpg', 0, 27),
(104, '27-img2.jpg', 0, 27),
(105, '28-thumb.jpg', 1, 28),
(106, '28-img0.jpg', 0, 28),
(107, '28-img1.jpg', 0, 28),
(108, '28-img2.jpg', 0, 28),
(109, '29-thumb.jpg', 1, 29),
(110, '29-img0.jpg', 0, 29),
(111, '29-img1.jpg', 0, 29),
(112, '29-img2.jpg', 0, 29),
(113, '30-thumb.jpg', 1, 30),
(114, '30-img0.jpg', 0, 30),
(115, '30-img1.jpg', 0, 30),
(116, '30-img2.jpg', 0, 30),
(117, '31-thumb.jpg', 1, 31),
(118, '31-img0.jpg', 0, 31),
(119, '31-img1.jpg', 0, 31),
(120, '31-img2.jpg', 0, 31),
(129, '34-thumb.jpg', 1, 34),
(130, '34-img0.jpg', 0, 34),
(131, '34-img1.jpg', 0, 34),
(132, '34-img2.jpg', 0, 34),
(137, '36-thumb.jpg', 1, 36),
(138, '36-img0.jpg', 0, 36),
(139, '36-img1.jpg', 0, 36),
(140, '36-img2.jpg', 0, 36),
(141, '37-thumb.jpg', 1, 37),
(142, '37-img0.jpg', 0, 37),
(143, '37-img1.jpg', 0, 37),
(144, '37-img2.jpg', 0, 37),
(145, '38-thumb.jpg', 1, 38),
(146, '38-img0.jpg', 0, 38),
(147, '38-img1.jpg', 0, 38),
(148, '38-img2.jpg', 0, 38),
(153, '40-thumb.jpg', 1, 40),
(154, '40-img0.jpg', 0, 40),
(155, '40-img1.jpg', 0, 40),
(156, '40-img2.jpg', 0, 40),
(157, '41-thumb.jpg', 1, 41),
(158, '41-img0.jpg', 0, 41),
(159, '41-img1.jpg', 0, 41),
(160, '41-img2.jpg', 0, 41),
(161, '42-thumb.jpg', 1, 42),
(162, '42-img0.jpg', 0, 42),
(163, '42-img1.jpg', 0, 42),
(164, '42-img2.jpg', 0, 42),
(169, '44-thumb.jpg', 1, 44),
(170, '44-img0.jpg', 0, 44),
(171, '44-img1.jpg', 0, 44),
(172, '44-img2.jpg', 0, 44),
(173, '45-thumb.jpg', 1, 45),
(174, '45-img0.jpg', 0, 45),
(175, '45-img1.jpg', 0, 45),
(176, '45-img2.jpg', 0, 45),
(177, '46-thumb.jpg', 1, 46),
(178, '46-img0.jpg', 0, 46),
(179, '46-img1.jpg', 0, 46),
(180, '46-img2.jpg', 0, 46);

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
(25, 'submariner', 12, '7000', 23, '<p><strong>H&atilde;ng sáº£n xuáº¥t</strong>&nbsp;: Rolex</p>\r\n\r\n<p><strong>Xuáº¥t xá»©</strong>&nbsp;: Thá»¥y Sá»¹</p>\r\n\r\n<p><strong>Báº£o h&agrave;nh</strong>&nbsp;: 10 nÄƒm</p>\r\n\r\n<p><strong>Loáº¡i Ä‘á»“ng há»“</strong>&nbsp;:&nbsp;Äá»“ng há»“ nam</p>\r\n\r\n<p><strong>Loáº¡i k&iacute;nh</strong>&nbsp;: Sapphire</p>\r\n\r\n<p><strong>Cháº¥t liá»‡u vá»</strong>&nbsp;: Máº¡ v&agrave;ng PVD</p>\r\n\r\n<p><strong>Chá»©c nÄƒng Ä‘áº·c biá»‡t:&nbsp;</strong>moonphase</p>\r\n\r\n<p><strong>Cháº¥t liá»‡u d&acirc;y</strong>&nbsp;: Da</p>\r\n\r\n<p><strong>ÄÆ°á»ng k&iacute;nh vá»</strong>&nbsp;: 41 mm</p>\r\n\r\n<p><strong>Äá»™ d&agrave;y vá»</strong>&nbsp;: 10 mm</p>\r\n\r\n<p><strong>Size d&acirc;y</strong>&nbsp;: 20 mm</p>\r\n\r\n<p><strong>Má»©c Ä‘á»™ chá»‹u nÆ°á»›c</strong>&nbsp;: 5 ATM</p>\r\n\r\n<p><strong>NÄƒng lÆ°á»£ng sá»­ dá»¥ng</strong>&nbsp;: CÆ¡ tá»± Ä‘á»™ng</p>\r\n\r\n<p><strong>TÆ° váº¥n v&agrave; Ä‘áº·t h&agrave;ng</strong>: 0123456789</p>\r\n\r\n<p><strong>Giao h&agrave;ng táº­n nÆ¡i, thanh to&aacute;n trá»±c tiáº¿p khi nháº­n h&agrave;ng</strong></p>\r\n\r\n<p><strong>Miá»…n ph&iacute; váº­n chuyá»ƒn</strong></p>\r\n', NULL, '<table border="1" cellpadding="1" cellspacing="1" style="width:500px">\r\n	<tbody>\r\n		<tr>\r\n			<td>ThÆ°Æ¡ng hiá»‡u</td>\r\n			<td>Rolex</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Cháº¥t liá»‡u d&acirc;y</td>\r\n			<td>Titan</td>\r\n		</tr>\r\n		<tr>\r\n			<td>NÄƒng lÆ°á»£ng</td>\r\n			<td>CÆ¡</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<p>&nbsp;</p>\r\n'),
(26, 'Daytona everrose', 10, '12000', 23, '<p><strong>H&atilde;ng sáº£n xuáº¥t</strong>&nbsp;:&nbsp;Rolex</p>\r\n\r\n<p><strong>Xuáº¥t xá»©</strong>&nbsp;: Thá»¥y Sá»¹</p>\r\n\r\n<p><strong>Báº£o h&agrave;nh:&nbsp;10 nÄƒm</strong></p>\r\n\r\n<p><strong>Loáº¡i Ä‘á»“ng há»“</strong>&nbsp;:&nbsp;Äá»“ng há»“ nam</p>\r\n\r\n<p><strong>Loáº¡i k&iacute;nh</strong>&nbsp;: Sapphire</p>\r\n\r\n<p><strong>Cháº¥t liá»‡u vá»</strong>&nbsp;: Th&eacute;p kh&ocirc;ng gá»‰</p>\r\n\r\n<p><strong>Cháº¥t liá»‡u d&acirc;y</strong>&nbsp;: Kim loáº¡i</p>\r\n\r\n<p><strong>ÄÆ°á»ng k&iacute;nh vá»</strong>&nbsp;: 40,5 mm</p>\r\n\r\n<p><strong>Äá»™ d&agrave;y vá»</strong>&nbsp;: 10,4 mm</p>\r\n\r\n<p><strong>Size d&acirc;y</strong>&nbsp;: 22 mm</p>\r\n\r\n<p><strong>Má»©c Ä‘á»™ chá»‹u nÆ°á»›c</strong>&nbsp;: 5 ATM</p>\r\n\r\n<p><strong>NÄƒng lÆ°á»£ng sá»­ dá»¥ng</strong>&nbsp;: CÆ¡ tá»± Ä‘á»™ng</p>\r\n\r\n<p><strong>TÆ° váº¥n v&agrave; Ä‘áº·t h&agrave;ng</strong>: 098.668.1189</p>\r\n\r\n<p><strong>Giao h&agrave;ng táº­n nÆ¡i, thanh to&aacute;n trá»±c tiáº¿p khi nháº­n h&agrave;ng</strong></p>\r\n\r\n<p><strong>Miá»…n ph&iacute; váº­n chuyá»ƒn</strong></p>\r\n', NULL, '<table border="1" cellpadding="1" cellspacing="1" style="width:500px">\r\n	<tbody>\r\n		<tr>\r\n			<td>ThÆ°Æ¡ng hiá»‡u</td>\r\n			<td>Rolex</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Cháº¥t liá»‡u d&acirc;y</td>\r\n			<td>Kim loáº¡i</td>\r\n		</tr>\r\n		<tr>\r\n			<td>NÄƒng lÆ°á»£ng</td>\r\n			<td>CÆ¡</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<p>&nbsp;</p>\r\n'),
(27, 'Oyster Perpetual Lady', 5, '15000', 23, '<p><strong>H&atilde;ng sáº£n xuáº¥t</strong>&nbsp;:&nbsp;Rolex</p>\r\n\r\n<p><strong>Xuáº¥t xá»©</strong>&nbsp;: Thá»¥y Sá»¹</p>\r\n\r\n<p><strong>Báº£o h&agrave;nh:&nbsp;10 nÄƒm</strong></p>\r\n\r\n<p><strong>Loáº¡i Ä‘á»“ng há»“</strong>&nbsp;:&nbsp;Äá»“ng há»“ nam</p>\r\n\r\n<p><strong>Loáº¡i k&iacute;nh</strong>&nbsp;: Sapphire</p>\r\n\r\n<p><strong>Cháº¥t liá»‡u vá»</strong>&nbsp;: Th&eacute;p kh&ocirc;ng gá»‰</p>\r\n\r\n<p><strong>Cháº¥t liá»‡u d&acirc;y</strong>&nbsp;: KIm loáº¡i</p>\r\n\r\n<p><strong>ÄÆ°á»ng k&iacute;nh vá»</strong>&nbsp;: 40,5 mm</p>\r\n\r\n<p><strong>Äá»™ d&agrave;y vá»</strong>&nbsp;: 10,4 mm</p>\r\n\r\n<p><strong>Size d&acirc;y</strong>&nbsp;: 22 mm</p>\r\n\r\n<p><strong>Má»©c Ä‘á»™ chá»‹u nÆ°á»›c</strong>&nbsp;: 5 ATM</p>\r\n\r\n<p><strong>NÄƒng lÆ°á»£ng sá»­ dá»¥ng</strong>&nbsp;: CÆ¡ tá»± Ä‘á»™ng</p>\r\n\r\n<p><strong>TÆ° váº¥n v&agrave; Ä‘áº·t h&agrave;ng</strong>: 0123456789</p>\r\n\r\n<p><strong>Giao h&agrave;ng táº­n nÆ¡i, thanh to&aacute;n trá»±c tiáº¿p khi nháº­n h&agrave;ng</strong></p>\r\n\r\n<p><strong>Miá»…n ph&iacute; váº­n chuyá»ƒn</strong></p>\r\n', NULL, '<table border="1" cellpadding="1" cellspacing="1" style="width:500px">\r\n	<tbody>\r\n		<tr>\r\n			<td>ThÆ°Æ¡ng hiá»‡u</td>\r\n			<td>Rolex</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Cháº¥t liá»‡u d&acirc;y</td>\r\n			<td>Kim loáº¡i</td>\r\n		</tr>\r\n		<tr>\r\n			<td>NÄƒng lÆ°á»£ng</td>\r\n			<td>CÆ¡</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<p>&nbsp;</p>\r\n'),
(28, 'Explorer II', 8, '20000', 23, '<p><strong>H&atilde;ng sáº£n xuáº¥t</strong>&nbsp;:&nbsp;Rolex</p>\r\n\r\n<p><strong>Xuáº¥t xá»©</strong>&nbsp;: Thá»¥y Sá»¹</p>\r\n\r\n<p><strong>Báº£o h&agrave;nh:&nbsp;10 nÄƒm</strong></p>\r\n\r\n<p><strong>Loáº¡i Ä‘á»“ng há»“</strong>&nbsp;:&nbsp;Äá»“ng há»“ nam</p>\r\n\r\n<p><strong>Loáº¡i k&iacute;nh</strong>&nbsp;: Sapphire</p>\r\n\r\n<p><strong>Cháº¥t liá»‡u vá»</strong>&nbsp;: Th&eacute;p kh&ocirc;ng gá»‰</p>\r\n\r\n<p><strong>Cháº¥t liá»‡u d&acirc;y</strong>&nbsp;: KIm loáº¡i</p>\r\n\r\n<p><strong>ÄÆ°á»ng k&iacute;nh vá»</strong>&nbsp;: 40,5 mm</p>\r\n\r\n<p><strong>Äá»™ d&agrave;y vá»</strong>&nbsp;: 10,4 mm</p>\r\n\r\n<p><strong>Size d&acirc;y</strong>&nbsp;: 22 mm</p>\r\n\r\n<p><strong>Má»©c Ä‘á»™ chá»‹u nÆ°á»›c</strong>&nbsp;: 5 ATM</p>\r\n\r\n<p><strong>NÄƒng lÆ°á»£ng sá»­ dá»¥ng</strong>&nbsp;: CÆ¡ tá»± Ä‘á»™ng</p>\r\n\r\n<p><strong>TÆ° váº¥n v&agrave; Ä‘áº·t h&agrave;ng</strong>: 0123456789</p>\r\n\r\n<p><strong>Giao h&agrave;ng táº­n nÆ¡i, thanh to&aacute;n trá»±c tiáº¿p khi nháº­n h&agrave;ng</strong></p>\r\n\r\n<p><strong>Miá»…n ph&iacute; váº­n chuyá»ƒn</strong></p>\r\n', NULL, '<p>&nbsp;</p>\r\n\r\n<table border="1" cellpadding="0" cellspacing="1" style="width:500px">\r\n	<tbody>\r\n		<tr>\r\n			<td>\r\n			<p>ThÆ°Æ¡ng hiá»‡u</p>\r\n			</td>\r\n			<td>\r\n			<p>Rolex</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td>\r\n			<p>Cháº¥t liá»‡u d&acirc;y</p>\r\n			</td>\r\n			<td>\r\n			<p>Kim loáº¡i</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td>\r\n			<p>NÄƒng lÆ°á»£ng</p>\r\n			</td>\r\n			<td>\r\n			<p>CÆ¡</p>\r\n			</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<table border="1" cellpadding="0" cellspacing="1" style="width:500px">\r\n	<tbody>\r\n		<tr>\r\n			<td>\r\n			<p>ThÆ°Æ¡ng hiá»‡u</p>\r\n			</td>\r\n			<td>\r\n			<p>Rolex</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td>\r\n			<p>Cháº¥t liá»‡u d&acirc;y</p>\r\n			</td>\r\n			<td>\r\n			<p>Kim loáº¡i</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td>\r\n			<p>NÄƒng lÆ°á»£ng</p>\r\n			</td>\r\n			<td>\r\n			<p>CÆ¡</p>\r\n			</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<p>&nbsp;</p>\r\n'),
(29, 'Sea Dweller', 5, '32000', 23, '<p><strong>H&atilde;ng sáº£n xuáº¥t</strong>&nbsp;:&nbsp;Rolex</p>\r\n\r\n<p><strong>Xuáº¥t xá»©</strong>&nbsp;: Thá»¥y Sá»¹</p>\r\n\r\n<p><strong>Báº£o h&agrave;nh:&nbsp;10 nÄƒm</strong></p>\r\n\r\n<p><strong>Loáº¡i Ä‘á»“ng há»“</strong>&nbsp;:&nbsp;Äá»“ng há»“ nam</p>\r\n\r\n<p><strong>Loáº¡i k&iacute;nh</strong>&nbsp;: Sapphire</p>\r\n\r\n<p><strong>Cháº¥t liá»‡u vá»</strong>&nbsp;: Th&eacute;p kh&ocirc;ng gá»‰</p>\r\n\r\n<p><strong>Cháº¥t liá»‡u d&acirc;y</strong>&nbsp;: KIm loáº¡i</p>\r\n\r\n<p><strong>ÄÆ°á»ng k&iacute;nh vá»</strong>&nbsp;: 40,5 mm</p>\r\n\r\n<p><strong>Äá»™ d&agrave;y vá»</strong>&nbsp;: 10,4 mm</p>\r\n\r\n<p><strong>Size d&acirc;y</strong>&nbsp;: 22 mm</p>\r\n\r\n<p><strong>Má»©c Ä‘á»™ chá»‹u nÆ°á»›c</strong>&nbsp;: 5 ATM</p>\r\n\r\n<p><strong>NÄƒng lÆ°á»£ng sá»­ dá»¥ng</strong>&nbsp;: CÆ¡ tá»± Ä‘á»™ng</p>\r\n\r\n<p><strong>TÆ° váº¥n v&agrave; Ä‘áº·t h&agrave;ng</strong>: 0123456789</p>\r\n\r\n<p><strong>Giao h&agrave;ng táº­n nÆ¡i, thanh to&aacute;n trá»±c tiáº¿p khi nháº­n h&agrave;ng</strong></p>\r\n\r\n<p><strong>Miá»…n ph&iacute; váº­n chuyá»ƒn</strong></p>\r\n', NULL, '<table border="1" cellpadding="0" cellspacing="1" style="width:500px">\r\n	<tbody>\r\n		<tr>\r\n			<td>\r\n			<p>ThÆ°Æ¡ng hiá»‡u</p>\r\n			</td>\r\n			<td>\r\n			<p>Rolex</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td>\r\n			<p>Cháº¥t liá»‡u d&acirc;y</p>\r\n			</td>\r\n			<td>\r\n			<p>Kim loáº¡i</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td>\r\n			<p>NÄƒng lÆ°á»£ng</p>\r\n			</td>\r\n			<td>\r\n			<p>CÆ¡</p>\r\n			</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n'),
(30, ' Speedmaster Racing Date Automatic', 18, '1650', 24, '<p>Merk</p>\r\n\r\n<p>Omega</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Type</p>\r\n\r\n<p>Speedmaster Racing Date Automatic</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Referentie</p>\r\n\r\n<p>38135326</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Staat</p>\r\n\r\n<p>Zeer goed</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Geslacht</p>\r\n\r\n<p>Heren</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Jaar</p>\r\n\r\n<p>1997</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Documentatie</p>\r\n\r\n<p>Ja</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Doos</p>\r\n\r\n<p>Ja</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Kaliber / werk</p>\r\n\r\n<p>Omega Cal. 1152</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Opwinden</p>\r\n\r\n<p>Automatisch</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Materiaal horlogekast</p>\r\n\r\n<p>Staal</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Materiaal sluiting</p>\r\n\r\n<p>Staal</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Materiaal band</p>\r\n\r\n<p>Leder</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Materiaal Lunette</p>\r\n\r\n<p>Staal</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Sluiting</p>\r\n\r\n<p>Doornsluiting</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Wijzerplaat</p>\r\n\r\n<p>Zwart</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Getallen wijzerplaat</p>\r\n\r\n<p>Arabisch</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Verlichte cijfers</p>\r\n\r\n<p>Ja</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Lichtwijzer</p>\r\n\r\n<p>Ja</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Waterproof</p>\r\n\r\n<p>50 m</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Glas</p>\r\n\r\n<p>Saffierglas</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Kleur band</p>\r\n\r\n<p>Zwart</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Diameter breedte (mm)</p>\r\n\r\n<p>39,00</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Diameter hoogte (mm)</p>\r\n\r\n<p>44,50</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Dikte (mm)</p>\r\n\r\n<p>13,50</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Originele staat / Originele delen</p>\r\n\r\n<p>Ja</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Chronograaf</p>\r\n\r\n<p>Ja</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Tachymeter</p>\r\n\r\n<p>Ja</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Datum</p>\r\n\r\n<p>Ja</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Snelschakel</p>\r\n\r\n<p>Ja</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Kleine seconde</p>\r\n\r\n<p>Ja</p>\r\n', NULL, '<table border="1" cellpadding="0" cellspacing="1" style="width:500px">\r\n	<tbody>\r\n		<tr>\r\n			<td>\r\n			<p>ThÆ°Æ¡ng hiá»‡u</p>\r\n			</td>\r\n			<td>\r\n			<p>Omega</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td>\r\n			<p>Cháº¥t liá»‡u d&acirc;y</p>\r\n			</td>\r\n			<td>\r\n			<p>Kim loáº¡i</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td>\r\n			<p>NÄƒng lÆ°á»£ng</p>\r\n			</td>\r\n			<td>\r\n			<p>CÆ¡</p>\r\n			</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n'),
(31, ' Speedmaster Professional', 22, '3200', 24, '<p><strong>H&atilde;ng sáº£n xuáº¥t</strong>&nbsp;:&nbsp;Omega</p>\r\n\r\n<p><strong>Xuáº¥t xá»©</strong>&nbsp;: Thá»¥y Sá»¹</p>\r\n\r\n<p><strong>Báº£o h&agrave;nh:&nbsp;10 nÄƒm</strong></p>\r\n\r\n<p><strong>Loáº¡i Ä‘á»“ng há»“</strong>&nbsp;:&nbsp;Äá»“ng há»“ nam</p>\r\n\r\n<p><strong>Loáº¡i k&iacute;nh</strong>&nbsp;: Sapphire</p>\r\n\r\n<p><strong>Cháº¥t liá»‡u vá»</strong>&nbsp;: Th&eacute;p kh&ocirc;ng gá»‰</p>\r\n\r\n<p><strong>Cháº¥t liá»‡u d&acirc;y</strong>&nbsp;: KIm loáº¡i</p>\r\n\r\n<p><strong>ÄÆ°á»ng k&iacute;nh vá»</strong>&nbsp;: 40,5 mm</p>\r\n\r\n<p><strong>Äá»™ d&agrave;y vá»</strong>&nbsp;: 10,4 mm</p>\r\n\r\n<p><strong>Size d&acirc;y</strong>&nbsp;: 22 mm</p>\r\n\r\n<p><strong>Má»©c Ä‘á»™ chá»‹u nÆ°á»›c</strong>&nbsp;: 5 ATM</p>\r\n\r\n<p><strong>NÄƒng lÆ°á»£ng sá»­ dá»¥ng</strong>&nbsp;: CÆ¡ tá»± Ä‘á»™ng</p>\r\n\r\n<p><strong>TÆ° váº¥n v&agrave; Ä‘áº·t h&agrave;ng</strong>: 0123456789</p>\r\n\r\n<p><strong>Giao h&agrave;ng táº­n nÆ¡i, thanh to&aacute;n trá»±c tiáº¿p khi nháº­n h&agrave;ng</strong></p>\r\n\r\n<p><strong>Miá»…n ph&iacute; váº­n chuyá»ƒn</strong></p>\r\n', NULL, '<table border="1" cellpadding="0" cellspacing="1" style="width:500px">\r\n	<tbody>\r\n		<tr>\r\n			<td>\r\n			<p>ThÆ°Æ¡ng hiá»‡u</p>\r\n			</td>\r\n			<td>\r\n			<p>Omega</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td>\r\n			<p>Cháº¥t liá»‡u d&acirc;y</p>\r\n			</td>\r\n			<td>\r\n			<p>Kim loáº¡i</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td>\r\n			<p>NÄƒng lÆ°á»£ng</p>\r\n			</td>\r\n			<td>\r\n			<p>CÆ¡</p>\r\n			</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<p>&nbsp;</p>\r\n'),
(34, 'Seamaster 300M Quartz Midsize', 30, '3300', 24, '<p><strong>H&atilde;ng sáº£n xuáº¥t</strong>&nbsp;:&nbsp;Omega</p>\r\n\r\n<p><strong>Xuáº¥t xá»©</strong>&nbsp;: Thá»¥y Sá»¹</p>\r\n\r\n<p><strong>Báº£o h&agrave;nh:&nbsp;10 nÄƒm</strong></p>\r\n\r\n<p><strong>Loáº¡i Ä‘á»“ng há»“</strong>&nbsp;:&nbsp;Äá»“ng há»“ nam</p>\r\n\r\n<p><strong>Loáº¡i k&iacute;nh</strong>&nbsp;: Sapphire</p>\r\n\r\n<p><strong>Cháº¥t liá»‡u vá»</strong>&nbsp;: Th&eacute;p kh&ocirc;ng gá»‰</p>\r\n\r\n<p><strong>Cháº¥t liá»‡u d&acirc;y</strong>&nbsp;: KIm loáº¡i</p>\r\n\r\n<p><strong>ÄÆ°á»ng k&iacute;nh vá»</strong>&nbsp;: 40,5 mm</p>\r\n\r\n<p><strong>Äá»™ d&agrave;y vá»</strong>&nbsp;: 10,4 mm</p>\r\n\r\n<p><strong>Size d&acirc;y</strong>&nbsp;: 22 mm</p>\r\n\r\n<p><strong>Má»©c Ä‘á»™ chá»‹u nÆ°á»›c</strong>&nbsp;: 5 ATM</p>\r\n\r\n<p><strong>NÄƒng lÆ°á»£ng sá»­ dá»¥ng</strong>&nbsp;: CÆ¡ tá»± Ä‘á»™ng</p>\r\n\r\n<p><strong>TÆ° váº¥n v&agrave; Ä‘áº·t h&agrave;ng</strong>: 0123456789</p>\r\n\r\n<p><strong>Giao h&agrave;ng táº­n nÆ¡i, thanh to&aacute;n trá»±c tiáº¿p khi nháº­n h&agrave;ng</strong></p>\r\n\r\n<p><strong>Miá»…n ph&iacute; váº­n chuyá»ƒn</strong></p>\r\n', NULL, '<table border="1" cellpadding="0" cellspacing="1" style="width:500px">\r\n	<tbody>\r\n		<tr>\r\n			<td>\r\n			<p>ThÆ°Æ¡ng hiá»‡u</p>\r\n			</td>\r\n			<td>\r\n			<p>Omega</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td>\r\n			<p>Cháº¥t liá»‡u d&acirc;y</p>\r\n			</td>\r\n			<td>\r\n			<p>Kim loáº¡i</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td>\r\n			<p>NÄƒng lÆ°á»£ng</p>\r\n			</td>\r\n			<td>\r\n			<p>CÆ¡</p>\r\n			</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<p>&nbsp;</p>\r\n'),
(36, 'Aquatimer Automatic', 12, '3975', 26, '<p><strong>H&atilde;ng sáº£n xuáº¥t</strong>&nbsp;:&nbsp; IWC</p>\r\n\r\n<p><strong>Xuáº¥t xá»©</strong>&nbsp;: Thá»¥y Sá»¹</p>\r\n\r\n<p><strong>Báº£o h&agrave;nh:&nbsp;10 nÄƒm</strong></p>\r\n\r\n<p><strong>Loáº¡i Ä‘á»“ng há»“</strong>&nbsp;:&nbsp;Äá»“ng há»“ nam</p>\r\n\r\n<p><strong>Loáº¡i k&iacute;nh</strong>&nbsp;: Sapphire</p>\r\n\r\n<p><strong>Cháº¥t liá»‡u vá»</strong>&nbsp;: Th&eacute;p kh&ocirc;ng gá»‰</p>\r\n\r\n<p><strong>Cháº¥t liá»‡u d&acirc;y</strong>&nbsp;: KIm loáº¡i</p>\r\n\r\n<p><strong>ÄÆ°á»ng k&iacute;nh vá»</strong>&nbsp;: 40,5 mm</p>\r\n\r\n<p><strong>Äá»™ d&agrave;y vá»</strong>&nbsp;: 10,4 mm</p>\r\n\r\n<p><strong>Size d&acirc;y</strong>&nbsp;: 22 mm</p>\r\n\r\n<p><strong>Má»©c Ä‘á»™ chá»‹u nÆ°á»›c</strong>&nbsp;: 5 ATM</p>\r\n\r\n<p><strong>NÄƒng lÆ°á»£ng sá»­ dá»¥ng</strong>&nbsp;: CÆ¡ tá»± Ä‘á»™ng</p>\r\n\r\n<p><strong>TÆ° váº¥n v&agrave; Ä‘áº·t h&agrave;ng</strong>: 0123456789</p>\r\n\r\n<p><strong>Giao h&agrave;ng táº­n nÆ¡i, thanh to&aacute;n trá»±c tiáº¿p khi nháº­n h&agrave;ng</strong></p>\r\n\r\n<p><strong>Miá»…n ph&iacute; váº­n chuyá»ƒn</strong></p>\r\n', NULL, '<table border="1" cellpadding="0" cellspacing="1" style="width:647px">\r\n	<tbody>\r\n		<tr>\r\n			<td>\r\n			<p>ThÆ°Æ¡ng hiá»‡u</p>\r\n			</td>\r\n			<td style="width:348px">\r\n			<p>Iwc</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td>\r\n			<p>Cháº¥t liá»‡u d&acirc;y</p>\r\n			</td>\r\n			<td style="width:348px">\r\n			<p>Kim loáº¡i</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td>\r\n			<p>NÄƒng lÆ°á»£ng</p>\r\n			</td>\r\n			<td style="width:348px">\r\n			<p>CÆ¡</p>\r\n			</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n'),
(37, 'Portugieser', 7, '7650', 26, '<p><strong>H&atilde;ng sáº£n xuáº¥t</strong>&nbsp;:&nbsp; IWC</p>\r\n\r\n<p><strong>Xuáº¥t xá»©</strong>&nbsp;: Thá»¥y Sá»¹</p>\r\n\r\n<p><strong>Báº£o h&agrave;nh:&nbsp;10 nÄƒm</strong></p>\r\n\r\n<p><strong>Loáº¡i Ä‘á»“ng há»“</strong>&nbsp;:&nbsp;Äá»“ng há»“ nam</p>\r\n\r\n<p><strong>Loáº¡i k&iacute;nh</strong>&nbsp;: Sapphire</p>\r\n\r\n<p><strong>Cháº¥t liá»‡u vá»</strong>&nbsp;: Th&eacute;p kh&ocirc;ng gá»‰</p>\r\n\r\n<p><strong>Cháº¥t liá»‡u d&acirc;y</strong>&nbsp;: KIm loáº¡i</p>\r\n\r\n<p><strong>ÄÆ°á»ng k&iacute;nh vá»</strong>&nbsp;: 40,5 mm</p>\r\n\r\n<p><strong>Äá»™ d&agrave;y vá»</strong>&nbsp;: 10,4 mm</p>\r\n\r\n<p><strong>Size d&acirc;y</strong>&nbsp;: 22 mm</p>\r\n\r\n<p><strong>Má»©c Ä‘á»™ chá»‹u nÆ°á»›c</strong>&nbsp;: 5 ATM</p>\r\n\r\n<p><strong>NÄƒng lÆ°á»£ng sá»­ dá»¥ng</strong>&nbsp;: CÆ¡ tá»± Ä‘á»™ng</p>\r\n\r\n<p><strong>TÆ° váº¥n v&agrave; Ä‘áº·t h&agrave;ng</strong>: 0123456789</p>\r\n\r\n<p><strong>Giao h&agrave;ng táº­n nÆ¡i, thanh to&aacute;n trá»±c tiáº¿p khi nháº­n h&agrave;ng</strong></p>\r\n\r\n<p><strong>Miá»…n ph&iacute; váº­n chuyá»ƒn</strong></p>\r\n', NULL, '<table border="1" cellpadding="0" cellspacing="1" style="width:647px">\r\n	<tbody>\r\n		<tr>\r\n			<td>\r\n			<p>ThÆ°Æ¡ng hiá»‡u</p>\r\n			</td>\r\n			<td style="width:348px">\r\n			<p>Iwc</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td>\r\n			<p>Cháº¥t liá»‡u d&acirc;y</p>\r\n			</td>\r\n			<td style="width:348px">\r\n			<p>Kim loáº¡i</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td>\r\n			<p>NÄƒng lÆ°á»£ng</p>\r\n			</td>\r\n			<td style="width:348px">\r\n			<p>CÆ¡</p>\r\n			</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<p>&nbsp;</p>\r\n'),
(38, 'Tank Vermeil MM Gold Plated', 2, '15000', 27, '<p><strong>H&atilde;ng sáº£n xuáº¥t</strong>&nbsp;:&nbsp; Cartier</p>\r\n\r\n<p><strong>Xuáº¥t xá»©</strong>&nbsp;: Thá»¥y Sá»¹</p>\r\n\r\n<p><strong>Báº£o h&agrave;nh:&nbsp;10 nÄƒm</strong></p>\r\n\r\n<p><strong>Loáº¡i Ä‘á»“ng há»“</strong>&nbsp;:&nbsp;Äá»“ng há»“ nam</p>\r\n\r\n<p><strong>Loáº¡i k&iacute;nh</strong>&nbsp;: Sapphire</p>\r\n\r\n<p><strong>Cháº¥t liá»‡u vá»</strong>&nbsp;: Th&eacute;p kh&ocirc;ng gá»‰</p>\r\n\r\n<p><strong>Cháº¥t liá»‡u d&acirc;y</strong>&nbsp;: KIm loáº¡i</p>\r\n\r\n<p><strong>ÄÆ°á»ng k&iacute;nh vá»</strong>&nbsp;: 40,5 mm</p>\r\n\r\n<p><strong>Äá»™ d&agrave;y vá»</strong>&nbsp;: 10,4 mm</p>\r\n\r\n<p><strong>Size d&acirc;y</strong>&nbsp;: 22 mm</p>\r\n\r\n<p><strong>Má»©c Ä‘á»™ chá»‹u nÆ°á»›c</strong>&nbsp;: 5 ATM</p>\r\n\r\n<p><strong>NÄƒng lÆ°á»£ng sá»­ dá»¥ng</strong>&nbsp;: CÆ¡ tá»± Ä‘á»™ng</p>\r\n\r\n<p><strong>TÆ° váº¥n v&agrave; Ä‘áº·t h&agrave;ng</strong>: 0123456789</p>\r\n\r\n<p><strong>Giao h&agrave;ng táº­n nÆ¡i, thanh to&aacute;n trá»±c tiáº¿p khi nháº­n h&agrave;ng</strong></p>\r\n\r\n<p><strong>Miá»…n ph&iacute; váº­n chuyá»ƒn</strong></p>\r\n', NULL, '<p>&nbsp;</p>\r\n\r\n<table border="1" cellpadding="0" cellspacing="1" style="width:647px">\r\n	<tbody>\r\n		<tr>\r\n			<td>\r\n			<p>ThÆ°Æ¡ng hiá»‡u</p>\r\n			</td>\r\n			<td style="width:348px">\r\n			<p>Cartier</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td>\r\n			<p>Cháº¥t liá»‡u d&acirc;y</p>\r\n			</td>\r\n			<td style="width:348px">\r\n			<p>Kim loáº¡i</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td>\r\n			<p>NÄƒng lÆ°á»£ng</p>\r\n			</td>\r\n			<td style="width:348px">\r\n			<p>CÆ¡</p>\r\n			</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n'),
(40, ' Emergency Mission', 24, '5700', 28, '<p><strong>H&atilde;ng sáº£n xuáº¥t</strong>&nbsp;:&nbsp; Breitling</p>\r\n\r\n<p><strong>Xuáº¥t xá»©</strong>&nbsp;: Thá»¥y Sá»¹</p>\r\n\r\n<p><strong>Báº£o h&agrave;nh:&nbsp;10 nÄƒm</strong></p>\r\n\r\n<p><strong>Loáº¡i Ä‘á»“ng há»“</strong>&nbsp;:&nbsp;Äá»“ng há»“ nam</p>\r\n\r\n<p><strong>Loáº¡i k&iacute;nh</strong>&nbsp;: Sapphire</p>\r\n\r\n<p><strong>Cháº¥t liá»‡u vá»</strong>&nbsp;: Th&eacute;p kh&ocirc;ng gá»‰</p>\r\n\r\n<p><strong>Cháº¥t liá»‡u d&acirc;y</strong>&nbsp;: KIm loáº¡i</p>\r\n\r\n<p><strong>ÄÆ°á»ng k&iacute;nh vá»</strong>&nbsp;: 40,5 mm</p>\r\n\r\n<p><strong>Äá»™ d&agrave;y vá»</strong>&nbsp;: 10,4 mm</p>\r\n\r\n<p><strong>Size d&acirc;y</strong>&nbsp;: 22 mm</p>\r\n\r\n<p><strong>Má»©c Ä‘á»™ chá»‹u nÆ°á»›c</strong>&nbsp;: 5 ATM</p>\r\n\r\n<p><strong>NÄƒng lÆ°á»£ng sá»­ dá»¥ng</strong>&nbsp;: CÆ¡ tá»± Ä‘á»™ng</p>\r\n\r\n<p><strong>TÆ° váº¥n v&agrave; Ä‘áº·t h&agrave;ng</strong>: 0123456789</p>\r\n\r\n<p><strong>Giao h&agrave;ng táº­n nÆ¡i, thanh to&aacute;n trá»±c tiáº¿p khi nháº­n h&agrave;ng</strong></p>\r\n\r\n<p><strong>Miá»…n ph&iacute; váº­n chuyá»ƒn</strong></p>\r\n', NULL, '<p>&nbsp;</p>\r\n\r\n<table border="1" cellpadding="0" cellspacing="1" style="width:647px">\r\n	<tbody>\r\n		<tr>\r\n			<td>\r\n			<p>ThÆ°Æ¡ng hiá»‡u</p>\r\n			</td>\r\n			<td style="width:348px">\r\n			<p>Breitling</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td>\r\n			<p>Cháº¥t liá»‡u d&acirc;y</p>\r\n			</td>\r\n			<td style="width:348px">\r\n			<p>Kim loáº¡i</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td>\r\n			<p>NÄƒng lÆ°á»£ng</p>\r\n			</td>\r\n			<td style="width:348px">\r\n			<p>CÆ¡</p>\r\n			</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n'),
(41, ' Avenger Skyland', 12, '6500', 28, '<p><strong>H&atilde;ng sáº£n xuáº¥t</strong>&nbsp;:&nbsp; Breitling</p>\r\n\r\n<p><strong>Xuáº¥t xá»©</strong>&nbsp;: Thá»¥y Sá»¹</p>\r\n\r\n<p><strong>Báº£o h&agrave;nh:&nbsp;10 nÄƒm</strong></p>\r\n\r\n<p><strong>Loáº¡i Ä‘á»“ng há»“</strong>&nbsp;:&nbsp;Äá»“ng há»“ nam</p>\r\n\r\n<p><strong>Loáº¡i k&iacute;nh</strong>&nbsp;: Sapphire</p>\r\n\r\n<p><strong>Cháº¥t liá»‡u vá»</strong>&nbsp;: Th&eacute;p kh&ocirc;ng gá»‰</p>\r\n\r\n<p><strong>Cháº¥t liá»‡u d&acirc;y</strong>&nbsp;: KIm loáº¡i</p>\r\n\r\n<p><strong>ÄÆ°á»ng k&iacute;nh vá»</strong>&nbsp;: 40,5 mm</p>\r\n\r\n<p><strong>Äá»™ d&agrave;y vá»</strong>&nbsp;: 10,4 mm</p>\r\n\r\n<p><strong>Size d&acirc;y</strong>&nbsp;: 22 mm</p>\r\n\r\n<p><strong>Má»©c Ä‘á»™ chá»‹u nÆ°á»›c</strong>&nbsp;: 5 ATM</p>\r\n\r\n<p><strong>NÄƒng lÆ°á»£ng sá»­ dá»¥ng</strong>&nbsp;: CÆ¡ tá»± Ä‘á»™ng</p>\r\n\r\n<p><strong>TÆ° váº¥n v&agrave; Ä‘áº·t h&agrave;ng</strong>: 0123456789</p>\r\n\r\n<p><strong>Giao h&agrave;ng táº­n nÆ¡i, thanh to&aacute;n trá»±c tiáº¿p khi nháº­n h&agrave;ng</strong></p>\r\n\r\n<p><strong>Miá»…n ph&iacute; váº­n chuyá»ƒn</strong></p>\r\n', NULL, '<p>&nbsp;</p>\r\n\r\n<table border="1" cellpadding="0" cellspacing="1" style="width:647px">\r\n	<tbody>\r\n		<tr>\r\n			<td>\r\n			<p>ThÆ°Æ¡ng hiá»‡u</p>\r\n			</td>\r\n			<td style="width:348px">\r\n			<p>Breitling</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td>\r\n			<p>Cháº¥t liá»‡u d&acirc;y</p>\r\n			</td>\r\n			<td style="width:348px">\r\n			<p>Kim loáº¡i</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td>\r\n			<p>NÄƒng lÆ°á»£ng</p>\r\n			</td>\r\n			<td style="width:348px">\r\n			<p>CÆ¡</p>\r\n			</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n'),
(42, 'Navitimer 01 18K Rose Gold', 9, '7700', 28, '', NULL, ''),
(44, 'Doppelchrono Spitfire', 12, '6200', 26, '<p><strong>H&atilde;ng sáº£n xuáº¥t</strong>&nbsp;:&nbsp; IWC</p>\r\n\r\n<p><strong>Xuáº¥t xá»©</strong>&nbsp;: Thá»¥y Sá»¹</p>\r\n\r\n<p><strong>Báº£o h&agrave;nh:&nbsp;10 nÄƒm</strong></p>\r\n\r\n<p><strong>Loáº¡i Ä‘á»“ng há»“</strong>&nbsp;:&nbsp;Äá»“ng há»“ nam</p>\r\n\r\n<p><strong>Loáº¡i k&iacute;nh</strong>&nbsp;: Sapphire</p>\r\n\r\n<p><strong>Cháº¥t liá»‡u vá»</strong>&nbsp;: Th&eacute;p kh&ocirc;ng gá»‰</p>\r\n\r\n<p><strong>Cháº¥t liá»‡u d&acirc;y</strong>&nbsp;: KIm loáº¡i</p>\r\n\r\n<p><strong>ÄÆ°á»ng k&iacute;nh vá»</strong>&nbsp;: 40,5 mm</p>\r\n\r\n<p><strong>Äá»™ d&agrave;y vá»</strong>&nbsp;: 10,4 mm</p>\r\n\r\n<p><strong>Size d&acirc;y</strong>&nbsp;: 22 mm</p>\r\n\r\n<p><strong>Má»©c Ä‘á»™ chá»‹u nÆ°á»›c</strong>&nbsp;: 5 ATM</p>\r\n\r\n<p><strong>NÄƒng lÆ°á»£ng sá»­ dá»¥ng</strong>&nbsp;: CÆ¡ tá»± Ä‘á»™ng</p>\r\n\r\n<p><strong>TÆ° váº¥n v&agrave; Ä‘áº·t h&agrave;ng</strong>: 0123456789</p>\r\n\r\n<p><strong>Giao h&agrave;ng táº­n nÆ¡i, thanh to&aacute;n trá»±c tiáº¿p khi nháº­n h&agrave;ng</strong></p>\r\n\r\n<p><strong>Miá»…n ph&iacute; váº­n chuyá»ƒn</strong></p>\r\n', NULL, '<p>&nbsp;</p>\r\n\r\n<table border="1" cellpadding="0" cellspacing="1" style="width:647px">\r\n	<tbody>\r\n		<tr>\r\n			<td>\r\n			<p>ThÆ°Æ¡ng hiá»‡u</p>\r\n			</td>\r\n			<td style="width:348px">\r\n			<p>IWC</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td>\r\n			<p>Cháº¥t liá»‡u d&acirc;y</p>\r\n			</td>\r\n			<td style="width:348px">\r\n			<p>Kim loáº¡i</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td>\r\n			<p>NÄƒng lÆ°á»£ng</p>\r\n			</td>\r\n			<td style="width:348px">\r\n			<p>CÆ¡</p>\r\n			</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n'),
(45, 'Aquatimer Deep Two', 5, '14800', 26, '<p><strong>H&atilde;ng sáº£n xuáº¥t</strong>&nbsp;:&nbsp; IWC</p>\r\n\r\n<p><strong>Xuáº¥t xá»©</strong>&nbsp;: Thá»¥y Sá»¹</p>\r\n\r\n<p><strong>Báº£o h&agrave;nh:&nbsp;10 nÄƒm</strong></p>\r\n\r\n<p><strong>Loáº¡i Ä‘á»“ng há»“</strong>&nbsp;:&nbsp;Äá»“ng há»“ nam</p>\r\n\r\n<p><strong>Loáº¡i k&iacute;nh</strong>&nbsp;: Sapphire</p>\r\n\r\n<p><strong>Cháº¥t liá»‡u vá»</strong>&nbsp;: Th&eacute;p kh&ocirc;ng gá»‰</p>\r\n\r\n<p><strong>Cháº¥t liá»‡u d&acirc;y</strong>&nbsp;: KIm loáº¡i</p>\r\n\r\n<p><strong>ÄÆ°á»ng k&iacute;nh vá»</strong>&nbsp;: 40,5 mm</p>\r\n\r\n<p><strong>Äá»™ d&agrave;y vá»</strong>&nbsp;: 10,4 mm</p>\r\n\r\n<p><strong>Size d&acirc;y</strong>&nbsp;: 22 mm</p>\r\n\r\n<p><strong>Má»©c Ä‘á»™ chá»‹u nÆ°á»›c</strong>&nbsp;: 5 ATM</p>\r\n\r\n<p><strong>NÄƒng lÆ°á»£ng sá»­ dá»¥ng</strong>&nbsp;: CÆ¡ tá»± Ä‘á»™ng</p>\r\n\r\n<p><strong>TÆ° váº¥n v&agrave; Ä‘áº·t h&agrave;ng</strong>: 0123456789</p>\r\n\r\n<p><strong>Giao h&agrave;ng táº­n nÆ¡i, thanh to&aacute;n trá»±c tiáº¿p khi nháº­n h&agrave;ng</strong></p>\r\n\r\n<p><strong>Miá»…n ph&iacute; váº­n chuyá»ƒn</strong></p>\r\n', NULL, '<p>&nbsp;</p>\r\n\r\n<table border="1" cellpadding="0" cellspacing="1" style="width:647px">\r\n	<tbody>\r\n		<tr>\r\n			<td>\r\n			<p>ThÆ°Æ¡ng hiá»‡u</p>\r\n			</td>\r\n			<td style="width:348px">\r\n			<p>IWC</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td>\r\n			<p>Cháº¥t liá»‡u d&acirc;y</p>\r\n			</td>\r\n			<td style="width:348px">\r\n			<p>Kim loáº¡i</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td>\r\n			<p>NÄƒng lÆ°á»£ng</p>\r\n			</td>\r\n			<td style="width:348px">\r\n			<p>CÆ¡</p>\r\n			</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n'),
(46, 'Luminor Marina 44', 5, '4000', 36, '<p><strong>H&atilde;ng sáº£n xuáº¥t</strong>&nbsp;: Panerai</p>\r\n\r\n<p><strong>Xuáº¥t xá»©</strong>&nbsp;: Thá»¥y Sá»¹</p>\r\n\r\n<p><strong>Báº£o h&agrave;nh</strong>&nbsp;: 10 nÄƒm</p>\r\n\r\n<p><strong>Loáº¡i Ä‘á»“ng há»“</strong>&nbsp;:&nbsp;Äá»“ng há»“ nam</p>\r\n\r\n<p><strong>Loáº¡i k&iacute;nh</strong>&nbsp;: Sapphire</p>\r\n\r\n<p><strong>Cháº¥t liá»‡u vá»</strong>&nbsp;: Máº¡ v&agrave;ng PVD</p>\r\n\r\n<p><strong>Chá»©c nÄƒng Ä‘áº·c biá»‡t:&nbsp;</strong>moonphase</p>\r\n\r\n<p><strong>Cháº¥t liá»‡u d&acirc;y</strong>&nbsp;: Da</p>\r\n\r\n<p><strong>ÄÆ°á»ng k&iacute;nh vá»</strong>&nbsp;: 41 mm</p>\r\n\r\n<p><strong>Äá»™ d&agrave;y vá»</strong>&nbsp;: 10 mm</p>\r\n\r\n<p><strong>Size d&acirc;y</strong>&nbsp;: 20 mm</p>\r\n\r\n<p><strong>Má»©c Ä‘á»™ chá»‹u nÆ°á»›c</strong>&nbsp;: 5 ATM</p>\r\n\r\n<p><strong>NÄƒng lÆ°á»£ng sá»­ dá»¥ng</strong>&nbsp;: CÆ¡ tá»± Ä‘á»™ng</p>\r\n\r\n<p><strong>TÆ° váº¥n v&agrave; Ä‘áº·t h&agrave;ng</strong>: 0123456789</p>\r\n\r\n<p><strong>Giao h&agrave;ng táº­n nÆ¡i, thanh to&aacute;n trá»±c tiáº¿p khi nháº­n h&agrave;ng</strong></p>\r\n\r\n<p><strong>Miá»…n ph&iacute; váº­n chuyá»ƒn</strong></p>\r\n', NULL, '<table border="1" cellpadding="1" cellspacing="1" style="width:500px">\r\n	<tbody>\r\n		<tr>\r\n			<td>ThÆ°Æ¡ng hiá»‡u</td>\r\n			<td>Panerai</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Cháº¥t liá»‡u d&acirc;y</td>\r\n			<td>Da</td>\r\n		</tr>\r\n		<tr>\r\n			<td>NÄƒng lÆ°á»£ng</td>\r\n			<td>CÆ¡</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<p>&nbsp;</p>\r\n');

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
(31, '45mm', 25),
(32, '35mm', 25),
(33, '45mm', 26),
(34, '45mm', 27),
(35, '45mm', 28),
(36, '35mm', 28),
(37, '45mm', 29),
(38, '35mm', 29),
(39, '45mm', 30),
(40, '45mm', 31),
(44, '45mm', 34),
(45, '35mm', 34),
(48, '35mm', 36),
(49, '25mm', 36),
(50, '45mm', 37),
(51, '35mm', 37),
(52, '25mm', 38),
(55, '45mm', 40),
(56, '45mm', 41),
(57, '35mm', 41),
(58, '45mm', 42),
(59, '35mm', 42),
(62, '45mm', 44),
(63, '35mm', 44),
(64, '25mm', 44),
(65, '45mm', 45),
(66, '35mm', 45),
(67, '45mm', 46),
(68, '35mm', 46);

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
(1, 'erererew', 'user1@user.com', '25125454121', 0),
(2, 'admin', 'admin@admin.com', '$2y$10$xtCXYOb5qA6a9S35GTxIYu4LGdBKoeHDXEYoQa15.575IVnXUuHia', 1),
(3, 'dlmsl', 'dsjdsk@lkds.cpm', '$2y$10$iwGeuDAS7zg0hU8Qn9qs5uQDUn5sia.EHSxqROKv/Ae2GCUeSAZ4m', 0),
(4, 'askdjnk s,', 'admddsadsdsadin@admin.com', '$2y$10$2Jue4YmgK0261AMoAa6DdOy3wcsEn1sZgTosHHQQHwUkuN0PLVR9y', 0),
(5, 'lslksflsdk', 'mslmlds@kdd.com', '$2y$10$sA0kXT9JmGMnDw/jflXD1u2tmI4u6JieYBZO5zfMYxxcv0Y1ePyeW', 0),
(6, 'Ã¡lkfm', 'fsd@fjd.com', '$2y$10$kmoWDvfQProC2fSwhKPzY.VlyFV.s.3ZPXUkSLSWy0A9.JB493vmi', 0),
(7, 'sÃ¡dsa', 'da@dnf.com', '$2y$10$wVIzebra8DV0QSCFLQ7f2u2uHgw2vp1TVC68LdTXjszkBU5SDbNLC', 0),
(8, 'abc', 'abc@abc.com', '$2y$10$AjOyHqGYdzhXiD4eEdJHkuR2YSlSPpK1bJvKR3RrquxMOXa39TCd2', 0),
(9, 'dkmaslk', 'u1@u1.com', '$2y$10$hKTLFwrUV/rmolUtaXAm2OkmN6252L2owjJNJNubMq2U7pnzaaMDC', 0);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;
--
-- AUTO_INCREMENT for table `colors`
--
ALTER TABLE `colors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;
--
-- AUTO_INCREMENT for table `images`
--
ALTER TABLE `images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=181;
--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;
--
-- AUTO_INCREMENT for table `size`
--
ALTER TABLE `size`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;
--
-- AUTO_INCREMENT for table `slider`
--
ALTER TABLE `slider`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
