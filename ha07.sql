-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 02, 2019 at 07:46 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.1.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ha07`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_post`
--

CREATE TABLE `tbl_post` (
  `postid` bigint(255) NOT NULL DEFAULT '0',
  `userName` varchar(1500) COLLATE utf8_unicode_ci NOT NULL,
  `serviceType` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `availability` time NOT NULL,
  `price` float NOT NULL,
  `postImg` varchar(3000) COLLATE utf8_unicode_ci NOT NULL,
  `timespan` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `userName` varchar(1500) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(1000) COLLATE utf8_unicode_ci NOT NULL,
  `role` char(1) COLLATE utf8_unicode_ci NOT NULL,
  `captchaCode` varchar(1500) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `firstName` varchar(1000) COLLATE utf8_unicode_ci NOT NULL,
  `lastName` varchar(1000) COLLATE utf8_unicode_ci NOT NULL,
  `Gender` char(1) COLLATE utf8_unicode_ci NOT NULL,
  `dateOfBirth` date NOT NULL,
  `address` varchar(2500) COLLATE utf8_unicode_ci NOT NULL,
  `verificaionCode` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `verified` int(11) NOT NULL DEFAULT '0',
  `profileImg` varchar(3000) COLLATE utf8_unicode_ci NOT NULL,
  `location` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `timespan` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD KEY `userName` (`userName`(255));
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
