-- phpMyAdmin SQL Dump
-- version 4.0.10.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Nov 10, 2018 at 09:11 AM
-- Server version: 5.5.60-MariaDB
-- PHP Version: 5.6.38

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `zadmin_videos`
--

-- --------------------------------------------------------

--
-- Table structure for table `category_table`
--

CREATE TABLE IF NOT EXISTS `category_table` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `media_id` int(11) DEFAULT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `position` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_1E1AC00FEA9FDD75` (`media_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=57 ;

--
-- Dumping data for table `category_table`
--

INSERT INTO `category_table` (`id`, `media_id`, `title`, `position`) VALUES
(51, 86, 'Love', 1),
(52, 87, 'Happy', 2),
(53, 88, 'Sad', 3),
(54, 89, 'Motivational', 4),
(55, 90, 'Celebration', 5),
(56, 91, 'Funny', 6);

-- --------------------------------------------------------

--
-- Table structure for table `comment_table`
--

CREATE TABLE IF NOT EXISTS `comment_table` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `video_id` int(11) DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `content` longtext COLLATE utf8_unicode_ci NOT NULL,
  `created` datetime NOT NULL,
  `enabled` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_5FB317B729C1004E` (`video_id`),
  KEY `IDX_5FB317B7A76ED395` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `device_table`
--

CREATE TABLE IF NOT EXISTS `device_table` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `token` longtext COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=4 ;

--
-- Dumping data for table `device_table`
--

INSERT INTO `device_table` (`id`, `token`) VALUES
(1, 'cmgXG7-0UHI:APA91bEa4BMU6G5N0y13EeNPFcf-fCrUGqwHrLybp6cJR3xlcfTmXVVwI1owG10xNS_P6jp3PnP-iUClhp8efqNMtWKg3RPOEJ9DVIDoGxfhOxn0da0RS8Hbj9oSBVPSi8UvXDQxkDAQ'),
(2, 'ffSkp4vDavg:APA91bGIJJHUDpCRJgho5jcFk584A0j7bNvKD4ZBqFPWnr2Jlw-taETsnUaSgH9RD71bvOMd0G3pdtvAZYk-cZ_GYcm8U1i6LcHyOmbbzte--UOb6yjh_9F-LCr7IoDcNdnXRtvlK_O1'),
(3, 'fOcql6xVq74:APA91bGI1WFkxOkIZgxDAImRH5u9tNJ0vpyYiReV9CRyAHJ1r0F-Qdz0HPtkuAowAVILQ8m7wb2iGPY5XVg5tXayaYgcz2Mgt6FFzm1FN1LKJOuPmJiWbwizlhWK8D85MNh7Je2E6D4T');

-- --------------------------------------------------------

--
-- Table structure for table `fos_user_table`
--

CREATE TABLE IF NOT EXISTS `fos_user_table` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `username_canonical` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email_canonical` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `enabled` tinyint(1) NOT NULL,
  `salt` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `last_login` datetime DEFAULT NULL,
  `locked` tinyint(1) NOT NULL,
  `expired` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL,
  `confirmation_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password_requested_at` datetime DEFAULT NULL,
  `roles` longtext COLLATE utf8_unicode_ci NOT NULL COMMENT '(DC2Type:array)',
  `credentials_expired` tinyint(1) NOT NULL,
  `credentials_expire_at` datetime DEFAULT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `facebook` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `instagram` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `twitter` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `emailo` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `type` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `token` longtext COLLATE utf8_unicode_ci,
  `image` longtext COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_C3D4D4BD92FC23A8` (`username_canonical`),
  UNIQUE KEY `UNIQ_C3D4D4BDA0D96FBF` (`email_canonical`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- Dumping data for table `fos_user_table`
--

INSERT INTO `fos_user_table` (`id`, `username`, `username_canonical`, `email`, `email_canonical`, `enabled`, `salt`, `password`, `last_login`, `locked`, `expired`, `expires_at`, `confirmation_token`, `password_requested_at`, `roles`, `credentials_expired`, `credentials_expire_at`, `name`, `facebook`, `instagram`, `twitter`, `emailo`, `type`, `token`, `image`) VALUES
(1, 'ADMIN', 'admin', 'ADMIN', 'admin', 1, 'djtfgbufxr4gwk4k0gss4sgs4k48wc4', '$2y$13$djtfgbufxr4gwk4k0gss4ekodAwfJ3IP01OyKvMD.stoxgr6MMa2S', '2018-11-09 09:49:47', 0, 0, NULL, NULL, NULL, 'a:1:{i:0;s:10:"ROLE_ADMIN";}', 0, NULL, 'Status And Quotes', NULL, NULL, NULL, NULL, 'email', NULL, 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSq06v_YeFtM-5YtnSiHIP1vqUsYva3WqKPmXNzb_tpCzwk6E6W'),
(2, '115738842994581814483', '115738842994581814483', '115738842994581814483', '115738842994581814483', 1, 'gzkbyyg6x08cccg04oggckw4wwgkgg0', '$2y$13$gzkbyyg6x08cccg04oggcea/uMSDGGiI7sSwY13h3yXAF/JiS/Om2', NULL, 0, 0, NULL, NULL, NULL, 'a:0:{}', 0, NULL, 'NIPA PATEL', NULL, NULL, NULL, NULL, 'google', 'fOcql6xVq74:APA91bGI1WFkxOkIZgxDAImRH5u9tNJ0vpyYiReV9CRyAHJ1r0F-Qdz0HPtkuAowAVILQ8m7wb2iGPY5XVg5tXayaYgcz2Mgt6FFzm1FN1LKJOuPmJiWbwizlhWK8D85MNh7Je2E6D4T', 'https://lh3.googleusercontent.com/-XdUIqdMkCWA/AAAAAAAAAAI/AAAAAAAAAAA/4252rscbv5M/photo.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `gallery_table`
--

CREATE TABLE IF NOT EXISTS `gallery_table` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `titre` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `language_table`
--

CREATE TABLE IF NOT EXISTS `language_table` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `media_id` int(11) DEFAULT NULL,
  `language` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `position` int(11) NOT NULL,
  `enabled` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_89718B17EA9FDD75` (`media_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=7 ;

--
-- Dumping data for table `language_table`
--

INSERT INTO `language_table` (`id`, `media_id`, `language`, `position`, `enabled`) VALUES
(4, 78, 'Hindi - हिंदी', 1, 1),
(5, 79, 'Gujarati - ગુજરાતી', 2, 1),
(6, 80, 'English', 3, 1);

-- --------------------------------------------------------

--
-- Table structure for table `media_table`
--

CREATE TABLE IF NOT EXISTS `media_table` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `titre` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `url` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `extension` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `date` datetime NOT NULL,
  `enabled` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=94 ;

--
-- Dumping data for table `media_table`
--

INSERT INTO `media_table` (`id`, `titre`, `url`, `type`, `extension`, `date`, `enabled`) VALUES
(70, 'Screen Shot 2018-10-27 at 9.38.26 PM.jpg', '0bf0221ecde1e2ed3b8e215e32b07b6a.jpeg', 'image/jpeg', 'jpeg', '2018-10-30 23:46:52', 1),
(71, '1.mp4', 'f28dd35cdb26518ab3121084e64adcb2.mp4', 'video/mp4', 'mp4', '2018-10-30 23:46:52', 1),
(78, 'hindi.png', '3014606501ccd9dded02633d3e6ed653.png', 'image/png', 'png', '2018-10-30 23:58:49', 0),
(79, 'gujarati.png', 'e18fd70a1c77c72a9f34c12ddad111c9.png', 'image/png', 'png', '2018-10-31 00:01:00', 0),
(80, 'english.png', '21b6b0b38f1d5f23ef875524047687f8.png', 'image/png', 'png', '2018-10-31 00:01:13', 0),
(86, 'love.png', '4a1d4dd53f8d456fcafef28706c98c88.png', 'image/png', 'png', '2018-10-31 00:07:54', 0),
(87, 'happy.png', '5077ab81f5fdcabd42a385fb39e7a3b8.png', 'image/png', 'png', '2018-10-31 00:08:47', 0),
(88, 'sad.png', 'bf70bc5f90f8aa912f8bf4aff3b4a7fb.png', 'image/png', 'png', '2018-10-31 00:09:28', 0),
(89, 'motivation.png', 'a60c32e4502704641ac9eb8dabe27ba9.png', 'image/png', 'png', '2018-10-31 00:09:38', 0),
(90, 'celebration.png', '002659e5760065c9676b8c14537596e6.png', 'image/png', 'png', '2018-10-31 00:09:50', 0),
(91, 'funny.png', '69f69c71dbbba083978a99872d485b21.png', 'image/png', 'png', '2018-10-31 00:10:00', 0),
(92, 'videoplayback (1).mp4', '460b6232b0d1c60c5402fc1bf7a2b0e4.mp4', 'video/mp4', 'mp4', '2018-11-06 07:13:12', 0),
(93, 'videoplayback (1).mp4', 'da5075cf1679d798d1fef8aa3f20b5ef.jpeg', 'image/jpeg', 'jpeg', '2018-11-06 07:13:12', 0);

-- --------------------------------------------------------

--
-- Table structure for table `medias_gallerys_table`
--

CREATE TABLE IF NOT EXISTS `medias_gallerys_table` (
  `gallery_id` int(11) NOT NULL,
  `media_id` int(11) NOT NULL,
  PRIMARY KEY (`gallery_id`,`media_id`),
  KEY `IDX_CC965DCE4E7AF8F` (`gallery_id`),
  KEY `IDX_CC965DCEEA9FDD75` (`media_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `support_table`
--

CREATE TABLE IF NOT EXISTS `support_table` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `subject` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `message` longtext COLLATE utf8_unicode_ci NOT NULL,
  `created` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

-- --------------------------------------------------------

--
-- Table structure for table `user_followers`
--

CREATE TABLE IF NOT EXISTS `user_followers` (
  `user_id` int(11) NOT NULL,
  `follower_id` int(11) NOT NULL,
  PRIMARY KEY (`user_id`,`follower_id`),
  KEY `IDX_84E87043A76ED395` (`user_id`),
  KEY `IDX_84E87043AC24F853` (`follower_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `version_table`
--

CREATE TABLE IF NOT EXISTS `version_table` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `features` longtext COLLATE utf8_unicode_ci NOT NULL,
  `code` int(11) NOT NULL,
  `enabled` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Dumping data for table `version_table`
--

INSERT INTO `version_table` (`id`, `title`, `features`, `code`, `enabled`) VALUES
(1, 'Update', '1\r\n2\r\n3\r\n4\r\n5', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `video_table`
--

CREATE TABLE IF NOT EXISTS `video_table` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `media_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `video_id` int(11) DEFAULT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `downloads` int(11) NOT NULL,
  `created` datetime NOT NULL,
  `enabled` tinyint(1) NOT NULL,
  `review` tinyint(1) NOT NULL,
  `comment` tinyint(1) NOT NULL,
  `tags` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `angry` int(11) NOT NULL,
  `haha` int(11) NOT NULL,
  `likes` int(11) NOT NULL,
  `love` int(11) NOT NULL,
  `sad` int(11) NOT NULL,
  `woow` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_794B86E4EA9FDD75` (`media_id`),
  KEY `IDX_794B86E4A76ED395` (`user_id`),
  KEY `IDX_794B86E429C1004E` (`video_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=14 ;

--
-- Dumping data for table `video_table`
--

INSERT INTO `video_table` (`id`, `media_id`, `user_id`, `video_id`, `title`, `downloads`, `created`, `enabled`, `review`, `comment`, `tags`, `angry`, `haha`, `likes`, `love`, `sad`, `woow`) VALUES
(12, 70, 1, 71, 'sdfsd', 4, '2018-10-30 23:46:52', 1, 0, 0, NULL, 0, 0, 0, 1, 0, 0),
(13, 93, 2, 92, 'Happy Diwali', 0, '2018-11-09 09:51:13', 1, 0, 1, 'Diwali', 0, 0, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `videos_categories`
--

CREATE TABLE IF NOT EXISTS `videos_categories` (
  `wallpaper_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  PRIMARY KEY (`wallpaper_id`,`category_id`),
  KEY `IDX_660191C8488626AA` (`wallpaper_id`),
  KEY `IDX_660191C812469DE2` (`category_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `videos_categories`
--

INSERT INTO `videos_categories` (`wallpaper_id`, `category_id`) VALUES
(12, 51),
(12, 52),
(12, 53),
(13, 55);

-- --------------------------------------------------------

--
-- Table structure for table `videos_languages`
--

CREATE TABLE IF NOT EXISTS `videos_languages` (
  `wallpaper_id` int(11) NOT NULL,
  `language_id` int(11) NOT NULL,
  PRIMARY KEY (`wallpaper_id`,`language_id`),
  KEY `IDX_E16CF7C2488626AA` (`wallpaper_id`),
  KEY `IDX_E16CF7C282F1BAF4` (`language_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `videos_languages`
--

INSERT INTO `videos_languages` (`wallpaper_id`, `language_id`) VALUES
(13, 4),
(13, 6);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `category_table`
--
ALTER TABLE `category_table`
  ADD CONSTRAINT `FK_1E1AC00FEA9FDD75` FOREIGN KEY (`media_id`) REFERENCES `media_table` (`id`);

--
-- Constraints for table `comment_table`
--
ALTER TABLE `comment_table`
  ADD CONSTRAINT `FK_5FB317B729C1004E` FOREIGN KEY (`video_id`) REFERENCES `video_table` (`id`),
  ADD CONSTRAINT `FK_5FB317B7A76ED395` FOREIGN KEY (`user_id`) REFERENCES `fos_user_table` (`id`);

--
-- Constraints for table `language_table`
--
ALTER TABLE `language_table`
  ADD CONSTRAINT `FK_89718B17EA9FDD75` FOREIGN KEY (`media_id`) REFERENCES `media_table` (`id`);

--
-- Constraints for table `medias_gallerys_table`
--
ALTER TABLE `medias_gallerys_table`
  ADD CONSTRAINT `FK_CC965DCE4E7AF8F` FOREIGN KEY (`gallery_id`) REFERENCES `gallery_table` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_CC965DCEEA9FDD75` FOREIGN KEY (`media_id`) REFERENCES `media_table` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `user_followers`
--
ALTER TABLE `user_followers`
  ADD CONSTRAINT `FK_84E87043A76ED395` FOREIGN KEY (`user_id`) REFERENCES `fos_user_table` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_84E87043AC24F853` FOREIGN KEY (`follower_id`) REFERENCES `fos_user_table` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `video_table`
--
ALTER TABLE `video_table`
  ADD CONSTRAINT `FK_794B86E429C1004E` FOREIGN KEY (`video_id`) REFERENCES `media_table` (`id`),
  ADD CONSTRAINT `FK_794B86E4A76ED395` FOREIGN KEY (`user_id`) REFERENCES `fos_user_table` (`id`),
  ADD CONSTRAINT `FK_794B86E4EA9FDD75` FOREIGN KEY (`media_id`) REFERENCES `media_table` (`id`);

--
-- Constraints for table `videos_categories`
--
ALTER TABLE `videos_categories`
  ADD CONSTRAINT `FK_660191C812469DE2` FOREIGN KEY (`category_id`) REFERENCES `category_table` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_660191C8488626AA` FOREIGN KEY (`wallpaper_id`) REFERENCES `video_table` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `videos_languages`
--
ALTER TABLE `videos_languages`
  ADD CONSTRAINT `FK_E16CF7C2488626AA` FOREIGN KEY (`wallpaper_id`) REFERENCES `video_table` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_E16CF7C282F1BAF4` FOREIGN KEY (`language_id`) REFERENCES `language_table` (`id`) ON DELETE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
