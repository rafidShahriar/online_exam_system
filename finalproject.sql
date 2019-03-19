-- phpMyAdmin SQL Dump
-- version 3.4.5
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 21, 2016 at 09:27 AM
-- Server version: 5.5.16
-- PHP Version: 5.3.8

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `finalproject`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) COLLATE utf8_bin NOT NULL,
  `password` varchar(255) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=2 ;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`) VALUES
(1, 'admin', '81dc9bdb52d04dc20036dbd8313ed055');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE IF NOT EXISTS `categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category_title` varchar(150) COLLATE utf8_bin NOT NULL,
  `category_description` varchar(255) COLLATE utf8_bin NOT NULL,
  `last_post_date` datetime DEFAULT NULL,
  `last_user_posted` varchar(150) COLLATE utf8_bin DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=7 ;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `category_title`, `category_description`, `last_post_date`, `last_user_posted`) VALUES
(1, 'Test Category One', 'This is the first test category', '2016-03-31 01:19:45', '1'),
(2, 'Random Forum', 'This is a random forum category', '2016-03-31 11:37:06', '1'),
(3, 'Technology', 'This category is all about technology and science', '2016-04-10 12:37:41', '3'),
(4, 'Sports', 'This category is all about sports.', '2016-04-17 08:16:30', '1'),
(5, 'History of Computing &amp; Binary System', 'A little bit of history and basics of binary system', '2016-04-18 11:22:24', 'rafid'),
(6, 'Data Communications', 'Data communicatons is the transfer of information that is in digital form before it enters the communication system', '2016-04-18 11:36:38', 'Shahriar');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE IF NOT EXISTS `posts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category_id` int(11) NOT NULL,
  `topic_id` int(11) NOT NULL,
  `post_creator` varchar(150) COLLATE utf8_bin NOT NULL,
  `post_content` text COLLATE utf8_bin NOT NULL,
  `post_date` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=21 ;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `category_id`, `topic_id`, `post_creator`, `post_content`, `post_date`) VALUES
(1, 2, 1, '1', 0x49742069732061205465737420546f70696320436f6e74656e742e, '2016-03-30 21:44:36'),
(2, 2, 2, '1', 0x4865726520697320616c6c20636f6e74656e74732e, '2016-03-30 22:11:30'),
(3, 2, 0, '1', 0x5468697320697320746865207265706c7920636f6e74656e742e, '2016-03-31 01:13:10'),
(4, 1, 0, '1', 0x5468697320697320746865207265706c7920636f6e74656e742e, '2016-03-31 01:19:44'),
(5, 2, 1, '1', 0x5468697320697320746865207265706c7920636f6e74656e74, '2016-03-31 01:23:09'),
(6, 2, 1, '1', 0x416e6f74686572207265706c79, '2016-03-31 01:25:38'),
(7, 2, 2, '1', 0x497420697320746865207265706c7920666f7220746865207465737420746f7069632032, '2016-03-31 11:35:09'),
(8, 2, 2, '1', 0x49742069732074686520616e6f74686572207265706c7920666f7220746865207465737420746f7069632032, '2016-03-31 11:37:06'),
(9, 3, 3, '1', 0x4120726f626f742069732061206d656368616e6963616c206f72207669727475616c206172746966696369616c206167656e742c20757375616c6c7920616e20656c656374726f2d6d656368616e6963616c206d616368696e65207468617420697320677569646564206279206120636f6d70757465722070726f6772616d206f7220656c656374726f6e6963206369726375697472792e, '2016-03-31 12:27:15'),
(10, 3, 3, '1', 0x7468616e6b7320666f722073686172696e672e, '2016-04-09 16:11:09'),
(11, 3, 3, '1', '', '2016-04-09 17:02:51'),
(12, 3, 3, '1', 0x74686973206973206120677265617420746f7069637320666f7220616c6c206f662075732e, '2016-04-09 19:11:34'),
(13, 3, 3, '3', 0x5468616e6b7320666f722073686172696e67, '2016-04-10 12:37:41'),
(14, 4, 5, '2', 0x31737420776f726c642063757020746f75726e616d656e74207761732068656c6420696e20313933302e2055727567756179206e6174696f616e616c20666f6f7462616c6c207465616d20776f6e20746865207469746c65206f66207468617420746f75726e616d656e742e, '2016-04-14 10:34:41'),
(15, 4, 5, '1', 0x55736566756c20746f706963732e, '2016-04-17 08:16:30'),
(16, 5, 6, '1', 0x312e2046697273742047656e65726174696f6e3a2056616375756d205475626520436f6d7075746572730d0a322e205365636f6e642047656e65726174696f6e3a205472616e736973746f72730d0a332e2054686972642047656e65726174696f6e3a20496e74656772617465642063697263756974730d0a342e20466f757274682047656e65726174696f6e3a20506572736f6e616c20436f6d707574657273, '2016-04-18 10:53:58'),
(17, 5, 7, 'rafid', 0x412070726f6772616d206d757374206265207472616e736c6174656420696e746f206d616368696e65206c616e6775616765206265666f72652069742063616e206265206578656375746564206f6e206120706172726963756c61722074797065206f6620435055, '2016-04-18 11:09:31'),
(18, 5, 7, 'Mohammad', 0x5468616e6b7320666f722073686172696e6720796f7572206b6e6f776c65646765, '2016-04-18 11:22:24'),
(19, 6, 8, 'Mohammad', 0x312e20496e666f726d6174696f6e0d0a322e205472616e736d69747465720d0a332e204368616e6e656c0d0a342e205265636569766572, '2016-04-18 11:32:01'),
(20, 6, 8, 'Shahriar', 0x5468616e6b20796f752c204d6f68616d6d61642e, '2016-04-18 11:36:38');

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE IF NOT EXISTS `questions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `question` text COLLATE utf8_bin NOT NULL,
  `answer1` varchar(255) COLLATE utf8_bin NOT NULL,
  `answer2` varchar(255) COLLATE utf8_bin NOT NULL,
  `answer3` varchar(255) COLLATE utf8_bin NOT NULL,
  `answer4` varchar(255) COLLATE utf8_bin NOT NULL,
  `answer` varchar(255) COLLATE utf8_bin NOT NULL,
  `test_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=23 ;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`id`, `question`, `answer1`, `answer2`, `answer3`, `answer4`, `answer`, `test_id`) VALUES
(1, 0x42792064656661756c742061207265616c206e756d62657220697320747265617465642061732061, 'float', 'double', 'long double', 'far double', '2', 2),
(2, 0x57686f20697320666174686572206f662043204c616e67756167653f, 'Bjarne Stroustrup', 'James A. Gosling', 'Dennis Ritchie', 'Dr. E.F. Codd', '3', 2),
(3, 0x432070726f6772616d732061726520636f6e76657274656420696e746f206d616368696e65206c616e67756167652077697468207468652068656c70206f66, 'An Editor', 'A Compiler', 'An Operating System', 'None of these', '2', 2),
(4, 0x412043207661726961626c652063616e206e6f742073746172742077697468, 'A number', 'A special symbol other than underscore', 'Both of the above', 'An alphabet', '3', 2),
(5, 0x576861742061726520746865207479706573206f66206c696e6b616765733f, 'Internal and External', 'External, Internal and None', 'External and None', 'Internal', '2', 2),
(6, 0x496e2077686963682079656172207761732074686520666f6f7462616c6c20576f726c64204375702068656c6420666f72207468652066697273742074696d653f, '1928', '1924', '1930', '1932', '3', 1),
(7, 0x20576869636820636f756e74727920776f6e2074686520666972737420666f6f7462616c6c20576f726c64204375703f, 'Argentina', 'Germany', 'Uruguay', 'Brazil', '3', 1),
(8, 0x57686f2068617320746865207265636f726420666f722073636f72696e6720746865206d6f737420676f616c7320696e20576f726c642043757020686973746f72793f, 'Diego Maradona', 'Miroslav Klose', 'Ronaldo', 'Lionel Messi', '2', 1),
(9, 0x2057686f206f662074686520666f6c6c6f77696e6720776f6e2074686520576f726c642043757020626f746820617320746865206361707461696e20616e6420636f616368206f662068697320636f756e7472792773207465616d3f, 'Jupp Derwall', 'Franz Beckenbauer', 'Mario Zagallo', 'Diego Maradona', '2', 1),
(10, 0x2057686f206f662074686520666f6c6c6f77696e672077617320617761726465642074686520476f6c64656e2042616c6c206f7220746865204265737420506c61796572204177617264206174207468652032303134204649464120576f726c64204375703f, 'Neymar', 'Mario Gotze', 'Paul Pogba', 'Lionel Messi', '4', 1),
(11, 0x57686f2077617320617761726465642074686520476f6c64656e20476c6f766520617761726420666f7220746865206265737420676f616c6b65657065722061742074686520576f726c642043757020323031343f, 'Manuel Neuer', 'Tim Krul', 'Julio Cesar', 'Sergio Romero', '1', 1),
(12, 0x486f77206d616e79207479706573206f6620706f6c796d6f72706869736d732061726520737570706f7274656420627920432b2b203f, '1', '2', '3', '4', '2', 3),
(13, 0x636f757420697320612f616e205f5f5f, 'operator', 'function', 'object', 'macro', '3', 3),
(14, 0x5768696368206f662074686520666f6c6c6f77696e672074797065206f6620636c61737320616c6c6f7773206f6e6c79206f6e65206f626a656374206f6620697420746f20626520637265617465643f, 'Virtual class', 'Abstract class', 'singleton class', 'Friend class', '3', 3),
(15, 0x5768696368206f662074686520666f6c6c6f77696e6720697320616e206162737472616374206461746120747970653f, 'int', 'double', 'string', 'class', '4', 3),
(16, 0x5768696368206f662074686520666f6c6c6f77696e672069732074686520636f727265637420636c617373206f6620746865206f626a65637420636f75743f, 'iostream', 'istream', 'ostream', 'ifstream', '3', 3),
(17, 0x54686520737472756374757265206f7220666f726d6174206f6620646174612069732063616c6c6564, 'Syntax', 'Semantics', 'Struct', 'None of the mentioned', '1', 4),
(18, 0x426c7565746f6f746820697320616e206578616d706c65206f66, 'personal area network', 'local area network', 'virtual private network', 'none of the mentioned', '1', 4),
(19, 0x436f6d6d756e69636174696f6e206265747765656e206120636f6d707574657220616e642061206b6579626f61726420696e766f6c766573205f5f5f207472616e736d697373696f6e, 'Automatic', 'Half-duplex', 'Full-duplex', 'Simplex', '4', 4),
(20, 0x546865206669727374204e6574776f726b206973205f5f5f, ' CNNET', 'NSFNET', 'ASAPNET', 'ARPANET', '4', 4),
(21, 0x546865205f5f5f2069732074686520706879736963616c2070617468206f7665722077686963682061206d6573736167652074726176656c73, 'Path', 'Medium', 'Protocol', 'Route', '2', 4),
(22, 0x4120736574206f662072756c6573207468617420676f7665726e73206461746120636f6d6d756e69636174696f6e2069732063616c6c6564205f5f5f, ' Protocols', 'Standards', 'RFCs', 'None of the mentioned', '1', 4);

-- --------------------------------------------------------

--
-- Table structure for table `results`
--

CREATE TABLE IF NOT EXISTS `results` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `test_id` int(11) NOT NULL,
  `right_answer` int(11) NOT NULL,
  `wrong_answer` int(11) NOT NULL,
  `unanswered` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=24 ;

--
-- Dumping data for table `results`
--

INSERT INTO `results` (`id`, `user_id`, `test_id`, `right_answer`, `wrong_answer`, `unanswered`) VALUES
(1, 1, 2, 0, 0, 0),
(2, 1, 2, 0, 0, 0),
(3, 1, 2, 0, 0, 0),
(4, 1, 2, 0, 0, 0),
(5, 1, 2, 0, 0, 0),
(6, 1, 2, 0, 0, 0),
(7, 1, 2, 0, 0, 0),
(8, 1, 2, 0, 0, 0),
(9, 1, 2, 0, 0, 0),
(10, 1, 2, 0, 0, 0),
(11, 1, 2, 0, 0, 0),
(12, 1, 2, 0, 0, 0),
(13, 1, 2, 0, 0, 0),
(14, 1, 2, 0, 0, 0),
(15, 1, 2, 0, 0, 0),
(16, 1, 2, 0, 0, 0),
(17, 1, 2, 3, 1, 1),
(18, 1, 2, 3, 1, 1),
(19, 4, 2, 2, 3, 0),
(20, 4, 2, 1, 4, 0),
(21, 3, 2, 4, 0, 1),
(22, 2, 2, 1, 3, 1),
(23, 1, 2, 3, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tests`
--

CREATE TABLE IF NOT EXISTS `tests` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `test_name` varchar(255) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=5 ;

--
-- Dumping data for table `tests`
--

INSERT INTO `tests` (`id`, `test_name`) VALUES
(1, 'World Cup Football'),
(2, 'C Programming'),
(3, 'Object Oriented Programming'),
(4, 'Computer Networks');

-- --------------------------------------------------------

--
-- Table structure for table `topics`
--

CREATE TABLE IF NOT EXISTS `topics` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category_id` int(11) NOT NULL,
  `topic_title` varchar(255) COLLATE utf8_bin NOT NULL,
  `topic_creator` varchar(150) COLLATE utf8_bin NOT NULL,
  `topic_last_user` int(11) DEFAULT NULL,
  `topic_date` datetime NOT NULL,
  `topic_reply_date` datetime NOT NULL,
  `topic_views` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=9 ;

--
-- Dumping data for table `topics`
--

INSERT INTO `topics` (`id`, `category_id`, `topic_title`, `topic_creator`, `topic_last_user`, `topic_date`, `topic_reply_date`, `topic_views`) VALUES
(1, 2, 'Test-Topic', '1', 1, '2016-03-30 21:44:36', '2016-03-31 01:25:38', 7),
(2, 2, 'Test-Topic 2', '1', 1, '2016-03-30 22:11:30', '2016-03-31 11:37:06', 8),
(3, 3, 'Robot', '1', 3, '2016-03-31 12:27:15', '2016-04-10 12:37:41', 26),
(4, 4, 'World Cup Football 2014', '1', NULL, '2016-04-10 09:23:20', '2016-04-10 09:23:20', 5),
(5, 4, 'World Cup Football History', '2', 1, '2016-04-14 10:34:40', '2016-04-17 08:16:30', 8),
(6, 5, 'History of Computing - First Four Generations', '1', NULL, '2016-04-18 10:53:56', '2016-04-18 10:53:56', 1),
(7, 5, 'Programming Languages', 'rafid', 0, '2016-04-18 11:09:31', '2016-04-18 11:22:24', 9),
(8, 6, 'Basic Elements of a Communication System', 'Mohammad', 0, '2016-04-18 11:32:01', '2016-04-18 11:36:38', 4);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(100) COLLATE utf8_bin NOT NULL,
  `last_name` varchar(100) COLLATE utf8_bin NOT NULL,
  `name` varchar(255) COLLATE utf8_bin NOT NULL,
  `email` varchar(255) COLLATE utf8_bin NOT NULL,
  `password` varchar(255) COLLATE utf8_bin NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `last_log_in_time` datetime NOT NULL,
  `forum_notification` enum('0','1') COLLATE utf8_bin NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=4 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `name`, `email`, `password`, `created`, `last_log_in_time`, `forum_notification`) VALUES
(1, 'Rafid', 'Shahriar', 'rafid', 'rafid@gmail.com', 'rafid', '2016-03-30 05:14:02', '2016-04-21 12:57:17', '1'),
(2, 'Mohammad', 'Rafid', 'mohammad', 'mohammad@gmail.com', '12345', '2016-04-09 15:37:31', '2016-04-21 12:39:24', '1'),
(3, 'Mohammad', 'Shahriar', 'shahriar', 'shahriar@gmail.com', '1234', '2016-04-09 15:39:44', '2016-04-21 12:36:21', '1');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
