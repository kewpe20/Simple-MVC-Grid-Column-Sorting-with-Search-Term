-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 20, 2015 at 11:12 PM
-- Server version: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `simplemvc`
--

-- --------------------------------------------------------

--
-- Table structure for table `clients`
--

CREATE TABLE IF NOT EXISTS `clients` (
`id` int(10) NOT NULL,
  `accountNumber` varchar(25) NOT NULL,
  `companyName` varchar(50) NOT NULL,
  `updateTime` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `clients`
--

INSERT INTO `clients` (`id`, `accountNumber`, `companyName`, `updateTime`) VALUES
(1, 'mjplumbing-001vx59kj', 'Acme Plumbing', '2015-01-12 06:00:00'),
(2, 'spelectronics-002gb43lm', 'Pippen Electronics', '2015-01-13 06:00:00'),
(5, 'kdhats-995462fdf', 'Fa (Fa) Flowers', '2015-01-19 16:20:56'),
(6, 'a2323-rfv', 'Mac Ready''s', '2015-01-16 22:57:48'),
(7, 'zdfdd-451', 'Sanford & Son''s Junkyard', '2015-01-18 06:00:00'),
(8, 'cdr-453s', 'Cracker "Jack" Bin', '2015-01-22 06:00:00'),
(9, 'nvrgds-43', 'Home "Away" From Home', '2015-01-12 12:00:00'),
(10, 'dftb-9876g', 'Don & Dan Auto Repair', '2015-01-12 08:08:17'),
(11, 'bb-99fdgfgf', 'Value Store!', '2015-01-19 16:20:47'),
(12, 'ppp98f-gfh', 'Mack''s "Sports" Store', '2015-01-06 09:23:06'),
(13, 'dfe-654gg', 'The "Big" & "Tall" Store', '2015-01-08 09:16:07');

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE IF NOT EXISTS `contacts` (
`id` int(11) unsigned NOT NULL,
  `firstName` varchar(255) DEFAULT NULL,
  `lastName` varchar(255) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`id`, `firstName`, `lastName`) VALUES
(5, 'david', 'carr'),
(6, 'Bill', 'Egan');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
`id` int(11) unsigned NOT NULL,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`) VALUES
(1, 'demo', '$2y$12$7fJZYOvUPm5S1/TeppeKFu9xxIZT877xYIrXPpkwrTTwFed6xDrZq');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `clients`
--
ALTER TABLE `clients`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `accountNumber` (`accountNumber`), ADD KEY `companyName` (`companyName`), ADD KEY `updateTime` (`updateTime`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
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
-- AUTO_INCREMENT for table `clients`
--
ALTER TABLE `clients`
MODIFY `id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
MODIFY `id` int(11) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
MODIFY `id` int(11) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
