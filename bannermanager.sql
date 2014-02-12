-- phpMyAdmin SQL Dump
-- version 3.4.10.1deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Feb 12, 2014 at 03:39 PM
-- Server version: 5.5.35
-- PHP Version: 5.3.10-1ubuntu3.9

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `bannermanager`
--

-- --------------------------------------------------------

--
-- Table structure for table `banner`
--

CREATE TABLE IF NOT EXISTS `banner` (
  `banner_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `banner_typology_id` int(11) NOT NULL,
  `page_id` int(11) NOT NULL,
  `start_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `end_date` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `active` tinyint(1) NOT NULL DEFAULT '0',
  `storage` text NOT NULL,
  `insert_date` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`banner_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=20 ;

--
-- Dumping data for table `banner`
--

INSERT INTO `banner` (`banner_id`, `banner_typology_id`, `page_id`, `start_date`, `end_date`, `active`, `storage`, `insert_date`) VALUES
(1, 1, 1, '2014-02-04 16:20:57', '2014-02-27 23:00:00', 1, '/var/www/uploaded/1.jpg', '2014-02-03 23:00:00'),
(6, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '', '0000-00-00 00:00:00'),
(7, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '', '0000-00-00 00:00:00'),
(8, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '', '0000-00-00 00:00:00'),
(9, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '', '0000-00-00 00:00:00'),
(10, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '', '0000-00-00 00:00:00'),
(11, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '', '0000-00-00 00:00:00'),
(12, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '', '0000-00-00 00:00:00'),
(13, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '', '0000-00-00 00:00:00'),
(14, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '', '0000-00-00 00:00:00'),
(15, 0, 0, '2014-02-11 13:54:01', '2014-02-11 13:54:01', 0, '', '0000-00-00 00:00:00'),
(16, 2, 16, '2014-02-10 23:00:00', '2014-02-13 23:00:00', 1, '/var/www/uploaded/121.png', '2014-02-11 16:16:53'),
(17, 0, 0, '2014-02-12 14:19:40', '2014-02-12 14:19:40', 0, '', '0000-00-00 00:00:00'),
(18, 2, 18, '2014-02-17 23:00:00', '2014-02-20 23:00:00', 1, '/var/www/uploaded/124.png', '2014-02-12 14:13:07'),
(19, 2, 19, '2014-02-24 23:00:00', '2014-02-27 23:00:00', 1, '/var/www/uploaded/125.png', '2014-02-12 14:19:26');

-- --------------------------------------------------------

--
-- Table structure for table `banner_typology`
--

CREATE TABLE IF NOT EXISTS `banner_typology` (
  `banner_typology_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `typology` text NOT NULL,
  `dimension_x` int(11) NOT NULL,
  `dimension_y` int(11) NOT NULL,
  `note` text,
  PRIMARY KEY (`banner_typology_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `banner_typology`
--

INSERT INTO `banner_typology` (`banner_typology_id`, `typology`, `dimension_x`, `dimension_y`, `note`) VALUES
(1, 'LEADERBOARD_LARGO', 729, 80, NULL),
(2, 'LEADERBOARD', 486, 60, NULL),
(3, 'SKYSCRAPER_LARGO', 80, 600, NULL),
(4, 'SKYSCRAPER', 40, 600, NULL),
(5, 'BUTTON', 30, 15, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `ci_sessions`
--

CREATE TABLE IF NOT EXISTS `ci_sessions` (
  `session_id` varchar(40) COLLATE utf8_bin NOT NULL DEFAULT '0',
  `ip_address` varchar(16) COLLATE utf8_bin NOT NULL DEFAULT '0',
  `user_agent` varchar(150) COLLATE utf8_bin NOT NULL,
  `last_activity` int(10) unsigned NOT NULL DEFAULT '0',
  `user_data` text COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`session_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `ci_sessions`
--

INSERT INTO `ci_sessions` (`session_id`, `ip_address`, `user_agent`, `last_activity`, `user_data`) VALUES
('015403aa968c6dbf35ee0305589cd73d', '127.0.0.1', '0', 1392132994, ''),
('047fcd4e21b305b580aa196c679f3267', '127.0.0.1', '0', 1392132248, ''),
('06aaff01c62ed23b00d2952c6f5e5179', '127.0.0.1', '0', 1392132527, ''),
('099979cbaa9f10900a44472fda05029b', '127.0.0.1', '0', 1392132527, ''),
('0aec12ff30e86739b71c4e33d98589a9', '127.0.0.1', '0', 1392132301, ''),
('11f3370947c2716cdb6f4d8989a5eec1', '127.0.0.1', '0', 1392132995, ''),
('130bfbc72983b1b7d2fb0d8a7c7df100', '127.0.0.1', '0', 1392132434, ''),
('162866865c2e8391fa524072a7045a6b', '127.0.0.1', '0', 1392132314, ''),
('1928ad50eaef945995d6f5aa261a65c7', '127.0.0.1', '0', 1392132434, ''),
('1edaa6707a37f5a3c82269928687b26d', '127.0.0.1', '0', 1392132301, ''),
('1f72a27b04f171fdcd7b80e4f45748de', '127.0.0.1', 'Mozilla/5.0 (X11; Ubuntu; Linux i686; rv:26.0) Gecko/20100101 Firefox/26.0', 1392214745, 'a:4:{s:9:"user_data";s:0:"";s:7:"user_id";s:1:"2";s:8:"username";s:5:"admin";s:6:"status";s:1:"1";}'),
('1fdfbb25968c8e35c715aef01f9e560c', '127.0.0.1', '0', 1392132301, ''),
('2018f1778eecccfbedd1fd9f85c1f223', '127.0.0.1', '0', 1392132248, ''),
('202afe93127c7c9cedf5fb96e4b3afdc', '127.0.0.1', '0', 1392132356, ''),
('21cf5ad0fd5a525f9934a40065d65ec4', '127.0.0.1', '0', 1392132357, ''),
('2285feaad633f76c69b50c29aaa31167', '127.0.0.1', '0', 1392132994, ''),
('2569fa0463283f0a8f7cd496a3364479', '127.0.0.1', '0', 1392132464, ''),
('2994fac5a720f0d68978fe7ea46b13ac', '127.0.0.1', '0', 1392132515, ''),
('2c732e2fb869004d53de2f63978c36eb', '127.0.0.1', '0', 1392132464, ''),
('3b41f1265c9abe2e3b4bfb359b9c8280', '127.0.0.1', '0', 1392132463, ''),
('3dfd33805ff55cad67bb533084c0b095', '127.0.0.1', '0', 1392132994, ''),
('41adad6bf6bcdef4856f4abaeba6c8eb', '127.0.0.1', '0', 1392132526, ''),
('51e0b012d9edcb7bdbe54ca2c16c1212', '127.0.0.1', '0', 1392134782, ''),
('534a247877eb868e0a6c2e7ca1277b8d', '127.0.0.1', '0', 1392132314, ''),
('55ea0037065f08b0e266e4f9952680e6', '127.0.0.1', '0', 1392132515, ''),
('59c9582b074e34b7bd73fd1ff039ad58', '127.0.0.1', '0', 1392132261, ''),
('5eeb2427470b6ec607997a0a971725d0', '127.0.0.1', '0', 1392132248, ''),
('63a252c8e9b586d8b9ef6c574450e8ac', '127.0.0.1', '0', 1392132301, ''),
('688ac53970b14838392000de57e16881', '127.0.0.1', '0', 1392132357, ''),
('6d9b422ac6da10c80882bf6f798edd91', '127.0.0.1', 'Mozilla/5.0 (X11; Ubuntu; Linux i686; rv:26.0) Gecko/20100101 Firefox/26.0', 1392135384, 'a:4:{s:9:"user_data";s:0:"";s:7:"user_id";s:1:"2";s:8:"username";s:5:"admin";s:6:"status";s:1:"1";}'),
('7148a16e9b40c5566c0a39d55a9dadff', '127.0.0.1', '0', 1392132301, ''),
('8457baba658af321aa19e36ec2d5beba', '127.0.0.1', '0', 1392132314, ''),
('84c65ceaed696109db485b39ab5862bd', '127.0.0.1', '0', 1392132261, ''),
('8871490816423382a156034a054de3de', '127.0.0.1', '0', 1392132356, ''),
('899e57805ddf29b1c754937d5077746d', '127.0.0.1', '0', 1392132301, ''),
('8d9595400e63c5ee00bdba7787494d56', '127.0.0.1', '0', 1392132314, ''),
('974110284db4f0834e2b1d345c814206', '127.0.0.1', 'Mozilla/5.0 (X11; Ubuntu; Linux i686; rv:26.0) Gecko/20100101 Firefox/26.0', 1392134325, 'a:4:{s:9:"user_data";s:0:"";s:7:"user_id";s:1:"2";s:8:"username";s:5:"admin";s:6:"status";s:1:"1";}'),
('99c1c74cf2715b118bafcbf7343d2533', '127.0.0.1', '0', 1392132357, ''),
('a1f586c9535640eda1216348d5b28413', '127.0.0.1', '0', 1392132994, ''),
('a34fc7e9f5a096b27bade3cef26252fc', '127.0.0.1', '0', 1392132515, ''),
('abd29ec2265d5209bceb3180bcb32fad', '127.0.0.1', '0', 1392132515, ''),
('b333feaa72dc9195ddbb28a320154406', '127.0.0.1', '0', 1392132464, ''),
('ba01e9f1b01a95ab32010275d986ac8e', '127.0.0.1', '0', 1392132247, ''),
('bc0ca1535186831eca5bb36ecd49a469', '127.0.0.1', '0', 1392132434, ''),
('bc37c3c91fa6268ba64cacc5c26cc83d', '127.0.0.1', '0', 1392134782, ''),
('c112cbb24999b633dbbc00bfd907ef2b', '127.0.0.1', '0', 1392132526, ''),
('cd42f39da8425349c68b7f19d1df017e', '127.0.0.1', '0', 1392132434, ''),
('d7511810f8a2daeedf73de4601d6f082', '127.0.0.1', '0', 1392132434, ''),
('db91d60837301b6ca8b3ca291634fd35', '127.0.0.1', '0', 1392132314, ''),
('dfa298d498fbf4c7c5725567b7a745d5', '127.0.0.1', '0', 1392132526, ''),
('e4af2fc8977378d405ea1dbcc3792e24', '127.0.0.1', '0', 1392132314, ''),
('e4bc75698607437cb472c171868ce0e4', '127.0.0.1', '0', 1392132434, ''),
('e4f336fff071b279ae460cb27f148290', '127.0.0.1', '0', 1392132356, ''),
('e632b4a64eb1711973e0b75a583acef1', '127.0.0.1', '0', 1392132994, ''),
('e747a105b046da9e9787837fbdbf9253', '127.0.0.1', '0', 1392132526, ''),
('ea79ad1d2731deee84c4509c2b84b99b', '127.0.0.1', '0', 1392132994, ''),
('ec4ee2056a991ff4cbe4bb86121119d5', '127.0.0.1', '0', 1392132463, ''),
('f2330e8e83371f8c9c688de185dfc3cb', '127.0.0.1', '0', 1392132994, ''),
('f28360358e5f040a9043cc0a08c14eec', '127.0.0.1', '0', 1392132994, ''),
('f5d14649deea181b761f8f083b4109f8', '127.0.0.1', '0', 1392132248, ''),
('f7f0fc36f770d4bb2c959db780aae336', '127.0.0.1', '0', 1392132247, ''),
('faf843e66a7a96dabe49b14da4f00d3e', '127.0.0.1', '0', 1392132463, ''),
('fc682a9e9ec058a162dd340a76d12f09', '127.0.0.1', '0', 1392132994, ''),
('fcee9f97129d189ce3d53a5f86f65753', '127.0.0.1', 'Mozilla/5.0 (X11; Ubuntu; Linux i686; rv:26.0) Gecko/20100101 Firefox/26.0', 1392214745, 'a:4:{s:9:"user_data";s:0:"";s:7:"user_id";s:1:"2";s:8:"username";s:5:"admin";s:6:"status";s:1:"1";}');

-- --------------------------------------------------------

--
-- Table structure for table `login_attempts`
--

CREATE TABLE IF NOT EXISTS `login_attempts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ip_address` varchar(40) COLLATE utf8_bin NOT NULL,
  `login` varchar(50) COLLATE utf8_bin NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `page`
--

CREATE TABLE IF NOT EXISTS `page` (
  `page_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `website_id` int(10) unsigned NOT NULL,
  `url` text NOT NULL,
  `modified_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `active` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`page_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=20 ;

--
-- Dumping data for table `page`
--

INSERT INTO `page` (`page_id`, `website_id`, `url`, `modified_date`, `active`) VALUES
(1, 1, '/test/miomiomio', '2014-02-07 13:19:55', 1),
(2, 1, '/test/numero/2', '2014-02-07 13:21:07', 1),
(3, 1, '/tutte/%', '2014-02-07 13:21:07', 1),
(4, 1, 'must', '2014-02-10 14:04:55', 1),
(7, 1, 'test', '2014-02-10 15:27:10', 1),
(8, 1, 'test', '2014-02-10 15:44:27', 1),
(9, 1, 'test', '2014-02-10 15:47:38', 1),
(10, 1, 'test', '2014-02-10 15:52:36', 1),
(11, 1, 'test', '2014-02-10 16:00:10', 1),
(12, 1, 'test', '2014-02-10 16:00:28', 1),
(13, 1, 'test', '2014-02-10 16:09:35', 1),
(14, 1, 'test', '2014-02-10 16:11:01', 1),
(15, 1, 'test', '2014-02-10 16:12:11', 1),
(16, 1, '/must/%', '2014-02-11 16:18:27', 1),
(17, 1, 'mmm', '2014-02-12 14:02:15', 1),
(18, 1, '/ooollo/llooo/', '2014-02-12 14:13:07', 1),
(19, 1, '/uuu/%', '2014-02-12 14:19:26', 1);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `user_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` text NOT NULL,
  `surname` text NOT NULL,
  `username` text NOT NULL,
  `password` text NOT NULL,
  `contact_info` text,
  `active` tinyint(1) NOT NULL DEFAULT '1',
  `inserted_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `is_super` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `name`, `surname`, `username`, `password`, `contact_info`, `active`, `inserted_date`, `is_super`) VALUES
(1, 'luca', 'apo', 'lucaapo', '12345', 'io@io.it', 1, '2014-02-03 16:00:35', 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) COLLATE utf8_bin NOT NULL,
  `password` varchar(255) COLLATE utf8_bin NOT NULL,
  `email` varchar(100) COLLATE utf8_bin NOT NULL,
  `activated` tinyint(1) NOT NULL DEFAULT '1',
  `banned` tinyint(1) NOT NULL DEFAULT '0',
  `ban_reason` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `new_password_key` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `new_password_requested` datetime DEFAULT NULL,
  `new_email` varchar(100) COLLATE utf8_bin DEFAULT NULL,
  `new_email_key` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `last_ip` varchar(40) COLLATE utf8_bin NOT NULL,
  `last_login` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `created` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `modified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=3 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `email`, `activated`, `banned`, `ban_reason`, `new_password_key`, `new_password_requested`, `new_email`, `new_email_key`, `last_ip`, `last_login`, `created`, `modified`) VALUES
(1, 'root', '$P$B.tB3O4UXLJWCozHEyTVPdTWHU0oGL.', 'io@io.io', 0, 0, NULL, NULL, NULL, NULL, 'd2bc22d7c75fc892b3f797404e8e769c', '127.0.0.1', '0000-00-00 00:00:00', '2014-02-05 17:03:16', '2014-02-05 16:03:16'),
(2, 'admin', '$P$B.efop7r7LJHLpEgdOQStxJceyTX2A.', 'emir.curtosi@email.it', 1, 0, NULL, NULL, NULL, NULL, 'a75c0bb4c33a751e090e64aff5df5882', '127.0.0.1', '2014-02-12 15:19:05', '2014-02-05 17:03:46', '2014-02-12 14:19:05');

-- --------------------------------------------------------

--
-- Table structure for table `user_autologin`
--

CREATE TABLE IF NOT EXISTS `user_autologin` (
  `key_id` char(32) COLLATE utf8_bin NOT NULL,
  `user_id` int(11) NOT NULL DEFAULT '0',
  `user_agent` varchar(150) COLLATE utf8_bin NOT NULL,
  `last_ip` varchar(40) COLLATE utf8_bin NOT NULL,
  `last_login` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`key_id`,`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `user_autologin`
--

INSERT INTO `user_autologin` (`key_id`, `user_id`, `user_agent`, `last_ip`, `last_login`) VALUES
('e64278efdd189344d9e81bc1463a9c5e', 2, 'Mozilla/5.0 (X11; Ubuntu; Linux i686; rv:26.0) Gecko/20100101 Firefox/26.0', '127.0.0.1', '2014-02-05 16:05:13');

-- --------------------------------------------------------

--
-- Table structure for table `user_profiles`
--

CREATE TABLE IF NOT EXISTS `user_profiles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `country` varchar(20) COLLATE utf8_bin DEFAULT NULL,
  `website` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `website`
--

CREATE TABLE IF NOT EXISTS `website` (
  `website_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` text,
  `root` text NOT NULL,
  `user_id` int(11) NOT NULL,
  `inserted_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `active` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`website_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `website`
--

INSERT INTO `website` (`website_id`, `name`, `root`, `user_id`, `inserted_date`, `active`) VALUES
(1, 'test1', 'www.test1.it', 1, '2014-02-04 16:19:56', 1),
(2, 'root', 'namename', 2, '2014-02-06 13:33:15', 1),
(3, 'rootw', 'namename2', 2, '2014-02-06 13:33:56', 1);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
