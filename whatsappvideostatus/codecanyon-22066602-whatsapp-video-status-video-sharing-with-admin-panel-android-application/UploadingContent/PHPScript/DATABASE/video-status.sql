-- phpMyAdmin SQL Dump
-- version 4.0.9
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jun 22, 2018 at 03:29 PM
-- Server version: 5.6.14
-- PHP Version: 5.5.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `video-status`
--

-- --------------------------------------------------------

--
-- Table structure for table `status_category`
--

CREATE TABLE IF NOT EXISTS `status_category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category` varchar(255) COLLATE utf8mb4_unicode_520_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci AUTO_INCREMENT=5 ;


-- --------------------------------------------------------

--
-- Table structure for table `status_notification`
--

CREATE TABLE IF NOT EXISTS `status_notification` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `image` varchar(255) NOT NULL,
  `created_at` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `status_subcategory`
--

CREATE TABLE IF NOT EXISTS `status_subcategory` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cat_id` int(11) NOT NULL,
  `subcategory` varchar(255) COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `subcat_icon` varchar(255) COLLATE utf8mb4_unicode_520_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci AUTO_INCREMENT=17 ;


-- --------------------------------------------------------

--
-- Table structure for table `status_token`
--

CREATE TABLE IF NOT EXISTS `status_token` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `token_id` varchar(555) NOT NULL,
  `device_type` varchar(15) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;


-- --------------------------------------------------------

--
-- Table structure for table `status_users`
--

CREATE TABLE IF NOT EXISTS `status_users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `email` varchar(150) NOT NULL,
  `password` varchar(50) NOT NULL,
  `android_key` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `status_users`
--

INSERT INTO `status_users` (`id`, `username`, `email`, `password`, `android_key`) VALUES
(1, 'Admin', 'admin@gmail.com', '123', 'AAAAp9q0uAA:APA91bFgWG0BsOxMnOFtojEIXEN4sik3MSYVvc0t2aPLaq9ydNp-26JVTFmxOPTGb63IQFTWeX879ZNFeMh0Q5S9otSe-zvBq7GZK9t9BZLCT-p77ZQvjyI21VskyYnsDNW2JqV6U3yG');

-- --------------------------------------------------------

--
-- Table structure for table `status_video`
--

CREATE TABLE IF NOT EXISTS `status_video` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cat_id` int(11) NOT NULL,
  `subcat_id` int(11) NOT NULL,
  `video_title` varchar(255) COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `video` varchar(255) COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `views` int(11) NOT NULL DEFAULT '0',
  `download` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci AUTO_INCREMENT=60 ;


/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
