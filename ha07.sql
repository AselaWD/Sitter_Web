-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 30, 2019 at 02:49 AM
-- Server version: 10.1.29-MariaDB
-- PHP Version: 7.2.0

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
-- Table structure for table `str_table`
--

CREATE TABLE `str_table` (
  `ID` int(11) NOT NULL,
  `usrnme` varchar(20) NOT NULL,
  `password` varchar(50) NOT NULL,
  `SrviceType` varchar(20) NOT NULL,
  `Firstnme` varchar(30) NOT NULL,
  `LastNme` varchar(30) NOT NULL,
  `Gender` varchar(12) NOT NULL,
  `Birthday` varchar(20) NOT NULL,
  `Address` text NOT NULL,
  `EMail` varchar(70) NOT NULL,
  `Contact` int(10) NOT NULL,
  `Discribtion` varchar(250) NOT NULL,
  `image` longblob NOT NULL,
  `Verification_pasword` varchar(225) NOT NULL,
  `Mode` varchar(10) NOT NULL,
  `lastlogin` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `usr_table`
--

CREATE TABLE `usr_table` (
  `ID` int(11) NOT NULL,
  `usrnme` varchar(20) NOT NULL,
  `password` varchar(50) NOT NULL,
  `Firstnme` varchar(30) NOT NULL,
  `LastNme` varchar(30) NOT NULL,
  `Gender` varchar(10) NOT NULL,
  `Birthday` date NOT NULL,
  `Address` text NOT NULL,
  `EMail` varchar(70) NOT NULL,
  `Contact` varchar(11) NOT NULL,
  `Discribtion` varchar(250) NOT NULL,
  `image` longblob NOT NULL,
  `Verification_pasword` varchar(225) NOT NULL,
  `Mode` varchar(10) NOT NULL,
  `lastlogin` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `str_table`
--
ALTER TABLE `str_table`
  ADD PRIMARY KEY (`usrnme`);

--
-- Indexes for table `usr_table`
--
ALTER TABLE `usr_table`
  ADD PRIMARY KEY (`usrnme`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `str_table`
--
ALTER TABLE `str_table`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `usr_table`
--
ALTER TABLE `usr_table`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
