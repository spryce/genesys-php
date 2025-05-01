-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 23, 2022 at 08:31 PM
-- Server version: 5.6.51-cll-lve
-- PHP Version: 7.3.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `genesysguitars`
--
CREATE DATABASE IF NOT EXISTS `genesysguitars` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `genesysguitars`;

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `categoryId` int(2) UNSIGNED NOT NULL,
  `categoryName` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`categoryId`, `categoryName`) VALUES
(1, 'electric'),
(2, 'acoustic'),
(3, 'bass'),
(4, 'cases');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `id` int(11) NOT NULL,
  `firstname` varchar(20) NOT NULL,
  `lastname` varchar(20) DEFAULT NULL,
  `company` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `phone` int(10) DEFAULT NULL,
  `comments` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Customer feedback table';

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`id`, `firstname`, `lastname`, `company`, `email`, `phone`, `comments`) VALUES
(1, 'Jon', 'Murray', '', 'Jonnarelle@bigpond.com', 429520539, 'Hi I am looking to purchase a guitar online and was wondering if it is possible to pick up as I live in morayfield.\r\nThanks jon'),
(2, 'richard', 'parnell', '', 'richard@hurricane.com.au', NULL, 'Do your guitar cases fit a Dead Dimebag guitar?'),
(3, 'Greg', 'Gillespie', '', 'greg.gillespie@gjgardner.com.au', 402003760, 'I have recently purchased the R INC guitar which looks amazing, better than any picture I am extremely happy with it, it hangs on my wall in my collection, I just have one very minor criticism, the guitar arrived with the treble knob very loose which was easy to fix,I just wanted to let you know for quality control purposes.. cheers'),
(4, 'Brett', 'Watchorn', '', 'friedgreenwombat@gmail.com', NULL, 'Hi, I thought I would send an email saying how much I love my AD-5144 guitar. It has been fantastic. I have a quick question. What guage string is this guitar set up with from the factory? The high E string just broke and I know with a Floyd Rose tremolo system you need to replace it with the same guage string otherwise it screws up the system. Thank you,Brett');

-- --------------------------------------------------------

--
-- Table structure for table `orderline`
--

CREATE TABLE `orderline` (
  `orderLineId` int(3) NOT NULL,
  `orderId` int(3) NOT NULL,
  `productId` int(2) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `orderline`
--

INSERT INTO `orderline` (`orderLineId`, `orderId`, `productId`) VALUES
(1, 1, 1),
(2, 1, 11),
(3, 1, 9),
(4, 2, 23),
(5, 2, 27),
(6, 2, 1),
(7, 3, 27),
(8, 3, 28),
(9, 3, 22),
(10, 4, 1),
(11, 4, 2),
(12, 5, 3),
(13, 6, 2),
(14, 6, 3),
(15, 8, 2),
(16, 10, 3),
(17, 14, 1),
(18, 18, 3),
(19, 21, 8),
(20, 22, 7),
(21, 22, 8),
(22, 27, 8),
(23, 28, 7),
(24, 28, 8),
(25, 29, 7),
(26, 29, 8),
(27, 31, 7),
(28, 31, 8),
(29, 32, 7),
(30, 32, 8),
(31, 33, 11),
(32, 36, 18),
(33, 36, 19),
(34, 36, 20),
(35, 37, 7),
(36, 51, 1);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `orderId` int(3) NOT NULL,
  `userId` int(3) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`orderId`, `userId`) VALUES
(1, 1),
(2, 2),
(3, 3),
(4, 4),
(5, 5),
(6, 6),
(7, 2),
(8, 2),
(9, 7),
(10, 7),
(11, 2),
(12, 2),
(13, 2),
(14, 2),
(15, 8),
(16, 8),
(17, 8),
(18, 8),
(19, 9),
(20, 10),
(21, 11),
(22, 12),
(23, 13),
(24, 14),
(25, 15),
(26, 16),
(27, 17),
(28, 18),
(29, 19),
(30, 20),
(31, 21),
(32, 22),
(33, 23),
(34, 24),
(35, 25),
(36, 26),
(37, 27),
(38, 28),
(39, 29),
(40, 30),
(41, 31),
(42, 32),
(43, 33),
(44, 34),
(45, 35),
(46, 36),
(47, 37),
(48, 38),
(49, 41),
(50, 42),
(51, 43),
(52, 44);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(2) NOT NULL,
  `seriesId` int(2) NOT NULL,
  `model` varchar(20) NOT NULL,
  `construction` varchar(45) DEFAULT NULL,
  `body` varchar(45) DEFAULT NULL,
  `neck` varchar(100) DEFAULT NULL,
  `nut` varchar(45) DEFAULT NULL,
  `fingerboard` varchar(45) DEFAULT NULL,
  `frets` varchar(45) DEFAULT NULL,
  `inlay` varchar(45) DEFAULT NULL,
  `machinehead` varchar(45) DEFAULT NULL,
  `tremelo` varchar(45) DEFAULT NULL,
  `bridge` varchar(45) DEFAULT NULL,
  `hardware` varchar(45) DEFAULT NULL,
  `pickups` varchar(80) DEFAULT NULL,
  `controls` varchar(80) DEFAULT NULL,
  `scratchplate` varchar(45) DEFAULT NULL,
  `finish` varchar(45) DEFAULT NULL,
  `tailpiece` varchar(45) DEFAULT NULL,
  `top` varchar(45) DEFAULT NULL,
  `side` varchar(45) DEFAULT NULL,
  `back` varchar(45) DEFAULT NULL,
  `thickness` varchar(45) DEFAULT NULL,
  `scalelength` varchar(45) DEFAULT NULL,
  `radius` varchar(45) DEFAULT NULL,
  `rosette` varchar(45) DEFAULT NULL,
  `binding` varchar(45) DEFAULT NULL,
  `description` varchar(200) DEFAULT NULL,
  `rrp` float(6,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Electric Guitars';

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `seriesId`, `model`, `construction`, `body`, `neck`, `nut`, `fingerboard`, `frets`, `inlay`, `machinehead`, `tremelo`, `bridge`, `hardware`, `pickups`, `controls`, `scratchplate`, `finish`, `tailpiece`, `top`, `side`, `back`, `thickness`, `scalelength`, `radius`, `rosette`, `binding`, `description`, `rrp`) VALUES
(1, 1, 'AD-3164', 'Neck Through Body', 'Carved Arch Top, Solid Ash', 'Canadian Maple with Nayto', NULL, 'Rosewood', '24', 'Dot Inlay', 'Die-Cast, Gold', '', 'Tune O Matic', 'Gold', 'Genesys High Output Humbucking x 2 ', '1 Volume, 1 Tone, 5 way Switch ', NULL, 'Stained, Open Pore', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 699.00),
(2, 1, 'AD-5144', 'Neck Through Body', 'Birch', 'Canadian Maple with Nayto', 'Locking', 'Rosewood', '24', 'Incremental Dot', 'Die-Cast', 'Floyd Rose Type', NULL, 'Gun Metal', 'Genesys High Output Humbucking x 2 ', '1 Volume, 1 Tone, 3 Lever Swich ', NULL, 'Stained Oil, Natural', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 699.00),
(3, 1, 'AD-R3534', 'Bolt-on ', 'Solid with Quilted Maple top', '3 piece Maple w/White Binding and Quilted Headstock', NULL, 'Rosewood with Binding', '24', 'Jagged Edge', 'Die-Cast, Chrome', 'Classic two stud', NULL, 'Chrome', 'Humbucking x 2, Zebra', '1 Volume, 1 Tone, 3 Lever Switch ', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 549.00),
(4, 2, 'AX-2556', 'Bolt-on ', 'Translucent Ash Top with Natural Binding ', 'Canadian  Maple with White Binding, 14° Pitched Head', '5mm Graphite', 'Rosewood', '24', 'Jagged Edge', 'Die-Cast, Button Style', 'Wilkinson WVP ', NULL, 'Chrome ', '2x Hot Rails Single coil, 1x Humbucker ', '1 Volume, 1 Push-Pull Tone / Splitter, 5 way Switch', NULL, 'Translucent Blue (TBL)', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 649.00),
(5, 2, 'AX-3556', 'Bolt-on ', 'Translucent Ash Top with Natural Binding ', 'Canadian  Maple with White Binding, 14° Pitched Head', '5mm Graphite', 'Rosewood', '24', 'Jagged Edge', 'Die-Cast, Button Style', 'Wilkinson WVP ', NULL, 'Chrome ', '2x Hot Rails Single coil, 1x Humbucker ', '1 Volume, 1 Push-Pull Tone / Splitter, 5 way Switch', NULL, 'Translucent Red (TRD)', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 649.00),
(6, 2, 'AX-4556', 'Bolt-on ', 'Translucent Ash Top with Natural Binding ', 'Canadian  Maple with White Binding, 14° Pitched Head', '5mm Graphite', 'Rosewood', '24', 'Jagged Edge', 'Die-Cast, Button Style', 'Wilkinson WVP ', NULL, 'Chrome ', '2x Hot Rails Single coil, 1x Humbucker ', '1 Volume, 1 Push-Pull Tone / Splitter, 5 way Switch', NULL, 'Translucent Black (TBK)', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 649.00),
(7, 3, 'AXD-5177', 'Neck Through Body', 'Alder', '3 piece Maple with Nayto', NULL, 'Rosewood', '24', 'Special with Mother of Pearl Dot', 'Rear Locking Type, Matt Chrome', 'Wilkinson VS-50', NULL, 'Matt Chrome', 'Seymour Duncan', '2 Volume, 1 Tone, 2x Mini switch', NULL, 'Gloss Finish, Natural', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1339.00),
(8, 3, 'AXD-5647', 'Neck Through Body', 'Swamp Ash', '3 piece Maple with Nayto', 'Locking', 'Rosewood', '24', 'Special with Mother of Pearl Dot', 'Rear Locking Type, Matt Chrome', 'Floyd Rose Type, Matt chrome ', NULL, 'Matt Chrome', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1449.00),
(9, 4, 'GP-SH40', 'Set Neck', 'Semi Hollow, Double Cutaway', 'Canadian Maple', '5mm', 'Rosewood', '22', 'Quadrilateral', 'Die-Cast, Gold', NULL, 'Tune O Matic', 'Gold', '2 x Ceramic Humbucking', '2 Volume, 2 Tone, 3 way switch', NULL, 'Flamed Canadian Maple', NULL, 'Flamed Canadian Maple', 'Maple', 'Maple', '44mm', NULL, NULL, NULL, NULL, NULL, 999.00),
(10, 4, 'GP-SA40', 'Set Neck', 'Semi Acoustic, Single Cutaway', 'Canadian Maple', '5mm', 'Rosewood', '22', 'Special', 'Die-Cast, Gold Button', NULL, 'Tune O Matic', 'Gold', 'Gold Covered Humbucker', '1 Voulme, 1 Tone', NULL, 'Flamed Canadian Maple', 'HL9J ', 'Flamed Canadian Maple', 'Maple', 'Maple', NULL, NULL, NULL, NULL, NULL, NULL, 1099.00),
(11, 5, 'R-Inc', 'Set Neck', 'Ginko with Maple Top', 'Canadian Hard Maple with Binding', NULL, 'Rosewood', '22', 'Quadrilateral', 'Die Cast', NULL, 'Tune O Matic', 'Gun Metal ', 'Humbucker x2 (Zebra)', '1 Volume, 1 Tone 3 way Toggle Switch', NULL, '', NULL, 'Crater cut top', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 649.00),
(12, 6, 'K-3442', 'Bolt-on ', 'Carved Arch top, Solid Alder', ' Maple with 14° Pitched Head', 'Locking', 'Rosewood', '24', 'Dot', 'Die Cast', 'Floyd Rose Type', NULL, 'Chrome', 'Wilkinson Pickups', '1 Volume, 1 Tone, 5 way Switch', NULL, 'Metallic Red / Black (MRB)', NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, 599.00),
(13, 6, 'K-4442', 'Bolt-on ', 'Carved Arch top, Solid Alder', ' Maple with 14° Pitched Head', 'Locking', 'Rosewood', '24', 'Dot', 'Die Cast', 'Floyd Rose Type', NULL, 'Chrome', 'Wilkinson Pickups', '1 Volume, 1 Tone, 5 way Switch', NULL, 'Metallic Black (MBL)', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 599.00),
(14, 7, 'SP-7534', 'Bolt-on ', 'Alder with synthetic Quilted maple top ', 'Canadian Maple, 14° Pitched Head ', NULL, 'Sonokeling with White Binding ', '22', 'Flying B', 'Die Cast', 'Classic style with 2 studs ', NULL, 'Chrome', 'Genesys Humbucker x 2 ', '1 Volume, 1 Tone, 3 Way Toggle Switch ', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 499.00),
(15, 8, 'ST-1356', 'Bolt-on ', 'Alder with Genuine Maple Top', 'Canadian Maple with Carved headstock ', 'Graphite', 'Rosewood with White Binding, Abalone Inlay', '22', 'Genuine Abalone Dot', 'Die Cast, Matt Chrome', 'Wilkinson VS-50', NULL, 'Matt Chrome', 'Alnico 5, 2 x Humbucker, 1 x Blade Bar', '2 Volume, 1 Tone, 5 way Switch', 'Alumininium ', 'Translucent Green (TGR), Flamed', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 649.00),
(16, 8, 'ST-2356', 'Bolt-on ', 'Alder with Genuine Maple Top', 'Canadian Maple with Carved headstock ', 'Graphite', 'Rosewood with White Binding, Abalone Inlay', '22', 'Genuine Abalone Dot', 'Die Cast, Matt Chrome', 'Wilkinson VS-50', NULL, 'Matt Chrome', 'Alnico 5, 2 x Humbucker, 1 x Blade Bar', '2 Volume, 1 Tone, 5 way Switch', 'Alumininium ', 'Translucent Blue (TBL), Flamed', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 649.00),
(17, 8, 'ST-4356', 'Bolt-on ', 'Alder with Genuine Maple Top', 'Canadian Maple with Carved headstock ', 'Graphite', 'Rosewood with White Binding, Abalone Inlay', '22', 'Genuine Abalone Dot', 'Die Cast, Matt Chrome', 'Wilkinson VS-50', NULL, 'Matt Chrome', 'Alnico 5, 2 x Humbucker, 1 x Blade Bar', '2 Volume, 1 Tone, 5 way Switch', 'Alumininium ', 'Translucent Black (TBK), Flamed', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 649.00),
(18, 9, 'GMD-02S', NULL, NULL, 'Nayto', NULL, 'Sonokeling', '20', 'Dot', 'Die Cast', NULL, NULL, NULL, NULL, NULL, NULL, 'Gloss Top, Matt back and sides ', NULL, 'Solid Top - Spruce', 'Mahogany', 'Mahogany', NULL, NULL, NULL, 'Wooden Inlay ', 'Black Multi Binding', NULL, 349.00),
(19, 9, 'GMD-04C', NULL, NULL, 'Nayto with white binding', NULL, 'Rosewood', '20', 'Dot', 'Die Cast, Chrome', NULL, 'Rosewood', NULL, NULL, NULL, NULL, 'Gloss', NULL, 'Spruce', 'Mahogany', 'Mahogany', NULL, NULL, NULL, 'Abalone, Triple Ring', 'White with Abalone', NULL, 349.00),
(20, 9, 'GMD-M03', NULL, NULL, 'Maple with White Binding', NULL, 'Rosewood', '20', 'Dot', 'Die Cast, Gold', NULL, 'Rosewood', NULL, NULL, NULL, NULL, 'Flamed top, Gloss back and Sides', NULL, 'Flamed Canadian Maple', 'Maple', 'Maple', NULL, NULL, NULL, 'Herringbone ', 'White Multi Binding ', NULL, 449.00),
(21, 10, 'GMD-GEN1', NULL, NULL, 'Nayto with Maple Binding', NULL, 'Rosewood', '20', 'Dot', 'Gold Die Cast, Black Button ', NULL, NULL, NULL, NULL, NULL, NULL, 'Natural, Open Pore - Dragon Etch', NULL, 'Spruce', 'Mahogany', 'Mahogany', NULL, NULL, NULL, 'Mahogany', 'Maple Multi Binding', NULL, 439.00),
(22, 11, 'C-60S', NULL, NULL, '3 piece Nayto with Rosewood Center', 'Graphite', 'Rosewood', NULL, NULL, NULL, NULL, 'Rosewood', NULL, NULL, NULL, NULL, 'Matt', NULL, 'Solid Red Cedar', 'Solid Mahogany', 'Solid Mahogany', NULL, NULL, NULL, NULL, 'Rosewood', NULL, 399.00),
(23, 12, 'GM-AB01C', NULL, NULL, 'Canadian Maple', NULL, 'Rosewood', '24', 'Dot', 'Chrome, Die Cast', NULL, 'Rosewood', NULL, NULL, '5 Band EQ ', NULL, 'Matt ', NULL, 'Spruce', 'Mahogany ', 'Mahogany ', NULL, NULL, NULL, 'Triple Ring', 'White Multi Binding', NULL, 599.00),
(24, 13, 'EB-3135', 'Neck Through Body', 'Solid Ash', 'Hard Maple with Nayto', NULL, 'Rosewood', '24', 'Dot', 'Chrome, Die Cast', NULL, 'Solid Brass', 'Chrome', 'Soap Bar x2', '2 Volume, 2 Tone', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '33-7/8\"(860mm)', '400mm', NULL, NULL, NULL, 699.00),
(25, 13, 'EB-5623', NULL, 'Swamp Ash', 'Hard  Maple with 14° Pitched Head', NULL, 'Rosewood', 'Fretless with Synthetic insert', 'None', 'Die Cast', NULL, 'Die Cast', 'Black', 'JB Single Coil, MA-4', '2 Volume, 2 Tone', NULL, 'Stained Natural, Open Pore', NULL, NULL, NULL, NULL, NULL, '34\"', NULL, NULL, NULL, NULL, 599.00),
(26, 14, 'GCE-Deluxe', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'ABS Hard case for electric guitar', 149.00),
(27, 14, 'GCB-Deluxe', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'ABS Hardcase for electric Bass', 189.00),
(28, 15, 'GCA-Elite', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Elite Hardcase for acoustic guitar', 99.00);

-- --------------------------------------------------------

--
-- Table structure for table `reseller`
--

CREATE TABLE `reseller` (
  `id` int(11) NOT NULL,
  `firstname` varchar(20) NOT NULL,
  `lastname` varchar(20) NOT NULL,
  `company` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone` int(10) DEFAULT NULL,
  `comments` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Reseller enquiry table';

--
-- Dumping data for table `reseller`
--

INSERT INTO `reseller` (`id`, `firstname`, `lastname`, `company`, `email`, `phone`, `comments`) VALUES
(4, 'test', 'test', 'test', 'asd@asd.com', 212311231, 'test');

-- --------------------------------------------------------

--
-- Table structure for table `series`
--

CREATE TABLE `series` (
  `seriesId` int(2) UNSIGNED NOT NULL,
  `seriesName` varchar(45) NOT NULL,
  `categoryId` int(2) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `series`
--

INSERT INTO `series` (`seriesId`, `seriesName`, `categoryId`) VALUES
(1, 'ad', 1),
(2, 'ax', 1),
(3, 'axd', 1),
(4, 'gp', 1),
(5, 'r', 1),
(6, 'k', 1),
(7, 'sp', 1),
(8, 'st', 1),
(9, 'gmd', 2),
(10, 'gen', 2),
(11, 'c', 2),
(12, 'ab', 3),
(13, 'eb', 3),
(14, 'deluxe', 4),
(15, 'elite', 4);

-- --------------------------------------------------------

--
-- Table structure for table `service`
--

CREATE TABLE `service` (
  `id` int(11) NOT NULL,
  `firstname` varchar(20) NOT NULL,
  `lastname` varchar(20) NOT NULL,
  `company` varchar(50) DEFAULT NULL,
  `email` varchar(50) NOT NULL,
  `phone` int(10) DEFAULT NULL,
  `comments` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Service request form';

--
-- Dumping data for table `service`
--

INSERT INTO `service` (`id`, `firstname`, `lastname`, `company`, `email`, `phone`, `comments`) VALUES
(3, 'test', 'test', '', 'asd@asd.com', 1234567890, 'test'),
(4, 'jase', 'a', '', 'jasonanthony247@gmail.com', 423682484, 'AD-5144\r\nHi, fretboard radius of the above guitar, also scale length and frets used?');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(2) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(40) NOT NULL,
  `first_name` varchar(30) NOT NULL,
  `last_name` varchar(30) NOT NULL,
  `emailaddress` varchar(75) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `first_name`, `last_name`, `emailaddress`) VALUES
(9, 'pmoismdkkfp', '', 'pmoismdkkfp', 'pmoismdkkfp', 'niixnj@urqiyx.com'),
(10, 'wwltyuywjtu', '', 'wwltyuywjtu', 'wwltyuywjtu', 'jsouqr@wdhzrp.com'),
(11, 'psgdwmzxwd', 'Hwsed', 'psgdwmzxwd', 'psgdwmzxwd', 'mxxems@emajsi.com'),
(12, 'hwwuunq', '', 'hwwuunq', 'hwwuunq', 'wnshmm@gwdxrt.com'),
(13, 'Mark', 'Y2iZ03', 'Mark', 'cqODAwHBjZA', 'mark357177@hotmail.com'),
(14, 'babsabtabkapvbdrgsdg', 'heFQw8', 'babsabtabkapvbdrgsdg', 'QBoMDoMoNwPdvcHqI', 'fa32gsg3rgsdf@gmail.com'),
(15, 'ecogsdf', '', 'ecogsdf', 'ecogsdf', 'magifz@llzjlu.com'),
(16, 'mclyvuufkbj', 'peSiTYZt', 'mclyvuufkbj', 'mclyvuufkbj', 'udplhb@yplani.com'),
(17, 'rzxvagbcjam', 'xBZsTFYL', 'rzxvagbcjam', 'rzxvagbcjam', 'http://doitjkjirwkc.com/'),
(18, 'ulbuwtezsi', '', 'ulbuwtezsi', 'ulbuwtezsi', 'wttfzz@kmkqma.com'),
(19, 'bffpsuiuvkv', '2vdfA5oM', 'bffpsuiuvkv', 'bffpsuiuvkv', 'http://yvpgxgixihjw.com/'),
(20, 'ssfbsbmx', '', 'ssfbsbmx', 'ssfbsbmx', 'azfncc@twvtvx.com'),
(21, 'diavake', '', 'diavake', 'diavake', 'oqgrer@gcxrud.com'),
(22, 'tmqibit', '', 'tmqibit', 'tmqibit', 'hdslth@xpxzfp.com'),
(23, 'dognbvwkam', '', 'dognbvwkam', 'dognbvwkam', 'ozuron@slcfrz.com'),
(24, 'rmgjqrxc', 'B9TfO19F', 'rmgjqrxc', 'rmgjqrxc', 'http://amvwvjohctih.com/'),
(25, 'uwlpzsix', '', 'uwlpzsix', 'uwlpzsix', 'nbqvll@qjlpku.com'),
(26, 'lygwycffovy', 'bvUfHAyh', 'lygwycffovy', 'lygwycffovy', 'http://eiegrpsxsgtd.com/'),
(27, 'bvfgog', 'rAc0WmET', 'bvfgog', 'bvfgog', 'http://znvclrnavtqd.com/'),
(28, 'rgneoekv', '', 'rgneoekv', 'rgneoekv', 'pwiply@caxwnp.com'),
(29, 'ypnuuaan', '', 'ypnuuaan', 'ypnuuaan', 'uodyzm@jeenbo.com'),
(30, 'GoldenTabs', 'y5rEzo', 'GoldenTabs', 'KEQtoEIfWGH', 'support@goldentabs.com'),
(31, 'wehcqn', '', 'wehcqn', 'wehcqn', 'ouodnw@aumgdf.com'),
(32, 'Judix', '4L9nY', 'Judix', 'jMqfJIMNazDPsoqf', 'bggfbx@hotmail.com'),
(33, 'cxmlsit', 'soF3j', 'cxmlsit', 'psXOcUKZiPpMxsCii', 'gilvep@vyqthn.com'),
(34, 'eZFAgLvnUiWj', '5k2J8npsY', 'OLAfXTHMhCFd', 'FNeOjDPHipwo', 'lietiwechfou@gmail.com'),
(35, 'BTaDIuqwnpSz', 'YmFKsV7Ug', 'JbFTxDBVXPqo', 'JdLQjvDqySAw', 'thomasinahoover4706@gmail.com'),
(36, '', '', '', '', ''),
(37, '\"', '', '', '', ''),
(38, '))', '', '', '', ''),
(39, ';\0', '', '', '', ''),
(40, 'AND updatexml(rand(),concat(CHAR(126),version(),CH', '', '', '', ''),
(41, 'sTRdcuytC', 'qlF9DYhCx5od!', 'FuRzWMAbqjCPmr', 'MOIspDyzFShWHGfe', 'conleverity@gmail.com'),
(42, 'EJczWjapUZ', 'NZaDeOR4JWIK!', 'DEHnvUKIiqT', 'prSjPWQTVvLmAI', 'conleverity@gmail.com'),
(43, 'ysarueovff', '6uks3K', 'ysarueovff', 'fXdycHTCfJT', 'orgwxf@zzupkz.com'),
(44, 'markus', 'Q6Vj2i', 'markus', 'hvgvcNGvuUJpsP', 'smithio34ga2s514@yahoo.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`categoryId`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orderline`
--
ALTER TABLE `orderline`
  ADD PRIMARY KEY (`orderLineId`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`orderId`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reseller`
--
ALTER TABLE `reseller`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `series`
--
ALTER TABLE `series`
  ADD PRIMARY KEY (`seriesId`);

--
-- Indexes for table `service`
--
ALTER TABLE `service`
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
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `categoryId` int(2) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `orderline`
--
ALTER TABLE `orderline`
  MODIFY `orderLineId` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `orderId` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `reseller`
--
ALTER TABLE `reseller`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `series`
--
ALTER TABLE `series`
  MODIFY `seriesId` int(2) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `service`
--
ALTER TABLE `service`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
