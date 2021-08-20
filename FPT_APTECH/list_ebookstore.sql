-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th8 20, 2021 lúc 09:52 AM
-- Phiên bản máy phục vụ: 10.4.19-MariaDB
-- Phiên bản PHP: 8.0.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `fpt_aptech`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `list_ebookstore`
--

CREATE TABLE `list_ebookstore` (
  `bookid` int(11) DEFAULT NULL,
  `authorid` int(11) DEFAULT NULL,
  `title` varchar(55) DEFAULT NULL,
  `ISBN` varchar(25) DEFAULT NULL,
  `pub_year` smallint(6) DEFAULT NULL,
  `available` tinyint(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `list_ebookstore`
--

INSERT INTO `list_ebookstore` (`bookid`, `authorid`, `title`, `ISBN`, `pub_year`, `available`) VALUES
(1, 34, 'Ong gia', '12-123-6', 2000, 50),
(2, 35, 'Doi gio hu', '13-100-2', 2019, 28),
(3, 37, 'Khong gia dinh', '12-123-7', 2021, 45),
(4, 38, 'Biet hai long', '14-243-5', 2015, 55),
(5, 40, '21 bai hoc', '16-523-4', 2020, 100),
(6, 41, 'Python', '18-323-6', 2017, 127),
(7, 42, 'Thuat quan tri', '19-623-3', 2016, 127),
(8, 44, 'Nhan qua', '11-345-6', 2018, 100);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
