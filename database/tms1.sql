-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Sep 09, 2022 at 10:39 AM
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
-- Table structure for table `contacts`
--

DROP TABLE IF EXISTS `contacts`;
CREATE TABLE IF NOT EXISTS `contacts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `con_desc` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `message` varchar(255) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL,
  `updated_at` timestamp NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `facts`
--

DROP TABLE IF EXISTS `facts`;
CREATE TABLE IF NOT EXISTS `facts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `facts_desc` varchar(255) NOT NULL,
  `facts_num` int(11) NOT NULL,
  `sub_title` varchar(255) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL,
  `updated_at` timestamp NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `filemanager`
--

DROP TABLE IF EXISTS `filemanager`;
CREATE TABLE IF NOT EXISTS `filemanager` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `filelink` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `filemanager`
--

INSERT INTO `filemanager` (`id`, `name`, `filelink`, `type`, `status`) VALUES
(20, 'dammar', '22.jpg1662719613.jpg', 'jpg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `resumes`
--

DROP TABLE IF EXISTS `resumes`;
CREATE TABLE IF NOT EXISTS `resumes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `resume_desc` varchar(255) NOT NULL,
  `sub_title` varchar(255) NOT NULL,
  `sub_heading` varchar(255) NOT NULL,
  `sub_desc` varchar(255) NOT NULL,
  `date` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL,
  `updated_at` timestamp NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

DROP TABLE IF EXISTS `settings`;
CREATE TABLE IF NOT EXISTS `settings` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `site` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `skills`
--

DROP TABLE IF EXISTS `skills`;
CREATE TABLE IF NOT EXISTS `skills` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `skill_desc` varchar(255) NOT NULL,
  `skill_title` varchar(255) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `skills`
--

INSERT INTO `skills` (`id`, `title`, `skill_desc`, `skill_title`, `status`, `created_at`, `updated_at`) VALUES
(8, 'Itaque ipsum reprehe', 'Minus corrupti volu', 'Omnis aliquam minima', 1, '2022-08-09 08:25:28', '2022-08-09 08:25:28'),
(10, 'Est et molestias vo', 'Aut voluptate eiusmo', 'In esse expedita qui', 1, '2022-08-10 07:48:05', '2022-08-10 07:48:05'),
(5, 'Est aut vel temporib', 'Odio culpa autem mag', 'Eius id minus volupt', 1, '2022-08-09 08:18:33', '2022-08-09 08:18:33'),
(6, 'Est aut vel temporib', 'Odio culpa autem mag', 'Eius id minus volupt', 1, '2022-08-09 08:19:54', '2022-08-09 08:19:54'),
(7, 'Est aut vel temporib', 'Odio culpa autem mag', 'Eius id minus volupt', 1, '2022-08-09 08:20:24', '2022-08-09 08:20:24'),
(9, 'gsgjkshgw4utirgsgsjfkgskjfgkjsgnkj', 'Minus corrupti volu', 'Omnis aliquam minima', 1, '2022-08-09 08:26:58', '2022-08-09 08:26:58');

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
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tasks`
--

INSERT INTO `tasks` (`id`, `fname`, `lname`, `email`, `password`, `status`) VALUES
(2, 'Pearl', 'Frank', 'nytip@mailinator.com', 'Pa$$w0rd!', 1),
(3, 'Orson', 'Sellers', 'mefe@mailinator.com', 'Pa$$w0rd!', 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `status`) VALUES
(1, '[value-2]', '[value-3]', '[value-4]', 1),
(2, 'sizofo', 'vuxi@mailinator.com', 'f3ed11bbdb94fd9ebdefbaf646ab94d3', 1),
(3, 'gg', 'a@g.com', '202cb962ac59075b964b07152d234b70', 1),
(4, 'ks', 'ks@gmail.com', '202cb962ac59075b964b07152d234b70', 1),
(5, 'tykiko', 'supik@mailinator.com', 'f3ed11bbdb94fd9ebdefbaf646ab94d3', 1),
(6, 'mobofehyh', 'demo@gmail.com', '202cb962ac59075b964b07152d234b70', 1);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
