-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Aug 06, 2022 at 02:30 PM
-- Server version: 5.7.36
-- PHP Version: 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tms1`
--

-- --------------------------------------------------------

--
-- Table structure for table `tasks`
--

DROP TABLE IF EXISTS `tasks`;
CREATE TABLE IF NOT EXISTS `tasks` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fname` varchar(255) NOT NULL,
  `lname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=26 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tasks`
--

INSERT INTO `tasks` (`id`, `fname`, `lname`, `email`, `password`, `status`) VALUES
(20, 'hello ', 'Hensley', 'fiho@mailinator.com', 'Pa$$w0rd!', 1),
(23, 'Latifah', 'Oliver', 'gozecu@mailinator.com', 'Pa$$w0rd!', 1),
(24, 'Ora', 'Estrada', 'mupidelux@mailinator.com', 'Pa$$w0rd!', 1),
(25, 'Caryn', 'Taylor', 'jyfacybori@mailinator.com', 'Pa$$w0rd!', 1),
(19, 'dammar', 'Slater', 'fiqir@mailinator.com', 'Pa$$w0rd!', 1),
(18, 'Halee', 'Wood', 'mybuwilo@mailinator.com', 'Pa$$w0rd!', 1),
(16, 'Bianca', 'Cameron', 'tarumaf@mailinator.com', 'Pa$$w0rd!', 1),
(21, 'Brittany', 'Holloway', 'lomyfip@mailinator.com', 'Pa$$w0rd!', 1),
(22, 'Nigel', 'Grimes', 'guhimij@mailinator.com', 'Pa$$w0rd!', 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `status`, `created_at`, `updated_at`) VALUES
(1, 'dammar', 'dammar@gmail.com', '123', 1, '2022-08-04 08:16:53', '2022-08-04 08:16:53'),
(2, 'AAvash', 'dammar@gmail.com', '202cb962ac59075b964b07152d234b70', 1, '2022-08-04 08:18:13', '2022-08-04 08:18:13'),
(3, 'm@m.com', 'dammar@gmail.com', '202cb962ac59075b964b07152d234b70', 1, '2022-08-06 13:08:57', '2022-08-06 13:08:57'),
(4, 'admin@d.com', 'admin@d.com', '202cb962ac59075b964b07152d234b70', 1, '2022-08-06 13:47:17', '2022-08-06 13:47:17'),
(5, 'amin', 'admin@d.com', '202cb962ac59075b964b07152d234b70', 1, '2022-08-06 13:49:11', '2022-08-06 13:49:11'),
(6, 'a', 'm@m.com', '202cb962ac59075b964b07152d234b70', 1, '2022-08-06 13:54:18', '2022-08-06 13:54:18');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
