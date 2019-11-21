-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 21, 2019 at 01:08 PM
-- Server version: 10.3.15-MariaDB
-- PHP Version: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bookshop`
--
CREATE DATABASE IF NOT EXISTS `bookshop` DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci;
USE `bookshop`;

-- --------------------------------------------------------

--
-- Table structure for table `book`
--

CREATE TABLE `book` (
  `Id` int(11) NOT NULL,
  `Title` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `Price` int(11) NOT NULL,
  `Author` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `Image` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `book`
--

INSERT INTO `book` (`Id`, `Title`, `Price`, `Author`, `Image`) VALUES
(1, 'Tìm lại chính mình', 42000, 'Marcia Grad', 'image_sach/b11.jpg'),
(2, 'Tìm lại giá trị cuộc sống', 26000, 'Mark V. Hansen, Jack Canfield', 'image_sach/b12.jpg'),
(3, 'Sứ mệnh yêu thương', 40000, 'Roger Cole', 'image_sach/b14.jpg'),
(4, 'Con sẽ làm được', 23000, 'Donna M.Gennett- Ph.D', 'image_sach/b16.jpg'),
(5, 'Đi tìm ý nghĩa cuộc sống', 37000, 'ERNIE CARWILE', 'image_sach/b17.jpg'),
(6, 'Cảm ơn ký ức', 45000, 'CeceliAhern', 'image_sach/b18.jpg'),
(7, 'Hạt Giống Tâm Hồn dành cho sinh viên hoc sinh', 22000, 'Jack Canield-Mark Victor Hansen', 'image_sach/b19.jpg'),
(8, 'Bí mật của may mắn', 18000, 'Tổng hợp thành phố Hồ Chí Minh', 'image_sach/b2.jpg'),
(9, 'Hạt Giống Tâm Hồn dành riêng cho phụ nữ', 22000, 'Jack Canield-Mark Victor Hansen', 'image_sach/b20.jpg'),
(10, 'Hạt Giống Tâm Hồn dành cho tuổi Teen', 29000, 'Nhiều tác giả First News tổng hợp và thực hiện', 'image_sach/b21.jpg'),
(11, 'Làm thế nào để con chăm học', 26000, 'Lê Duyên Hải', 'image_sach/b22.jpg'),
(12, 'Những giá trị cuộc sống', 27000, 'Diane Tillman', 'image_sach/b24.jpg'),
(13, 'Quà tặng diệu kỳ', 26000, 'Mark V. Hansen, Jack Canfield', 'image_sach/b25.jpg'),
(14, 'Chấp cánh tuổi thơ', 24000, 'Tổng hợp TP Hồ Chí Minh', 'image_sach/b3.jpg'),
(15, 'Hạt giống yêu thương-Chicken Soup for the Soul 20', 30000, 'Nhiều tác giả - Tổng hợp và thực hiện First News', 'image_sach/b4.jpg'),
(16, 'Gía trị cuộc sống', 14000, 'Tổng hợp thành phố Hồ Chí Minh', 'image_sach/b5.jpg'),
(17, 'Hãy yêu cuộc sống của bạn chọn', 40000, 'Tổng hợp TP Hồ Chí Minh', 'image_sach/b6.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `Id` int(11) NOT NULL,
  `Username` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `Password` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `Name` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`Id`, `Username`, `Password`, `Name`) VALUES
(1, 'abc', '123', 'Thắng'),
(2, 'def', '456', 'Huy');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `book`
--
ALTER TABLE `book`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`Id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `book`
--
ALTER TABLE `book`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
