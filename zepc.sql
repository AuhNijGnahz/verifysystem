-- phpMyAdmin SQL Dump
-- version 4.7.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 2017-07-13 08:27:15
-- 服务器版本： 5.7.18
-- PHP Version: 7.0.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `zepc`
--

-- --------------------------------------------------------

--
-- 表的结构 `admin`
--

CREATE TABLE `admin` (
  `uid` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `available` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- 转存表中的数据 `admin`
--

INSERT INTO `admin` (`uid`, `username`, `password`, `available`) VALUES
(1, 'zjh4473', 'zjh19970223', 1),
(2, 'lukexin', '1299415013', 1);

-- --------------------------------------------------------

--
-- 表的结构 `userverify`
--

CREATE TABLE `userverify` (
  `uid` int(11) NOT NULL,
  `name` varchar(10) NOT NULL,
  `xuehao` varchar(10) NOT NULL,
  `major` varchar(50) NOT NULL,
  `status` int(11) NOT NULL COMMENT '1-审核通过;2-审核中;3-已驳回',
  `verifytime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `userverify`
--

INSERT INTO `userverify` (`uid`, `name`, `xuehao`, `major`, `status`, `verifytime`) VALUES
(16, '张晋华', '0705150231', '0705|供用电技术', 1, '2017-07-12 17:39:04'),
(18, '常瑶', '0707160306', '0703|电力系统自动化技术', 1, '2017-07-13 01:11:13'),
(19, '鲁柯新', '0200160312', '0200|电气自动化技术', 1, '2017-07-13 05:26:11');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`uid`);

--
-- Indexes for table `userverify`
--
ALTER TABLE `userverify`
  ADD PRIMARY KEY (`uid`);

--
-- 在导出的表使用AUTO_INCREMENT
--

--
-- 使用表AUTO_INCREMENT `admin`
--
ALTER TABLE `admin`
  MODIFY `uid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- 使用表AUTO_INCREMENT `userverify`
--
ALTER TABLE `userverify`
  MODIFY `uid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
