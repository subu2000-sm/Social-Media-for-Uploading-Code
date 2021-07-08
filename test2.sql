-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jul 08, 2021 at 01:12 PM
-- Server version: 5.7.31
-- PHP Version: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `test2`
--

-- --------------------------------------------------------

--
-- Table structure for table `code`
--

DROP TABLE IF EXISTS `code`;
CREATE TABLE IF NOT EXISTS `code` (
  `pid` int(15) NOT NULL,
  `file` varchar(100) NOT NULL,
  `sln` int(15) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`sln`)
) ENGINE=MyISAM AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `code`
--

INSERT INTO `code` (`pid`, `file`, `sln`) VALUES
(42, 'file/7368-Used_Car_Locator.zip', 18),
(39, 'file/2359-Used_Car_Locator.zip', 16),
(38, 'file/9766-Flask.zip', 14),
(40, 'file/6072-Used_Car_Locator.zip', 17),
(37, 'file/2878-1209-Login-registration-System-PHP-and-MYSQL-master.zip', 13);

-- --------------------------------------------------------

--
-- Table structure for table `con`
--

DROP TABLE IF EXISTS `con`;
CREATE TABLE IF NOT EXISTS `con` (
  `sl` int(15) NOT NULL AUTO_INCREMENT,
  `n1` varchar(60) NOT NULL,
  `n2` varchar(60) NOT NULL,
  PRIMARY KEY (`sl`)
) ENGINE=MyISAM AUTO_INCREMENT=64 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `con`
--

INSERT INTO `con` (`sl`, `n1`, `n2`) VALUES
(43, 'Subu2000', 'dalei2020'),
(39, 'dalei2020', 'Subu2000'),
(63, 'admin', 'Subu2000'),
(61, 'Subu2000', 'a_double'),
(38, 'dalei2020', 'a_double'),
(37, 'a_double', 'Subu2000');

-- --------------------------------------------------------

--
-- Table structure for table `project`
--

DROP TABLE IF EXISTS `project`;
CREATE TABLE IF NOT EXISTS `project` (
  `sid` varchar(1000) NOT NULL,
  `pid` int(11) NOT NULL AUTO_INCREMENT,
  `pname` varchar(30) NOT NULL,
  `pdesc` varchar(100) NOT NULL,
  `pimg` varchar(100) NOT NULL,
  `status` varchar(20) NOT NULL,
  `date` varchar(40) DEFAULT NULL,
  PRIMARY KEY (`pid`)
) ENGINE=MyISAM AUTO_INCREMENT=52 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `project`
--

INSERT INTO `project` (`sid`, `pid`, `pname`, `pdesc`, `pimg`, `status`, `date`) VALUES
('Subu2000', 47, 'new123', 'for testing purpose', 'image/empproj.jfif', 'public', '15:44:37'),
('admin', 50, 'admin Project', 'this is my project', 'image/9262-photo-1618335829737-2228915674e0 (1).jfif', 'public', '19:29:47'),
('Subu2000', 42, 'New Project', 'This a Project', 'image/3216-Screenshot (7).png', 'public', '18:17:44'),
('dalei2020', 41, 'No File', 'Project with no file', 'image/empproj.jfif', 'public', '17:36:59'),
('dalei2020', 40, 'Private Project', 'This is a Private Project', 'image/5458-Screenshot (51).png', 'private', '17:32:38'),
('dalei2020', 39, 'Used Car Locator', 'It is a project to find out new and old cars nearby', 'image/8675-Screenshot (6).png', 'public', '16:07:12'),
('a_double', 38, 'Stock Prediction', 'This is a Project to determine future stocks', 'image/5445-Screenshot (61).png', 'public', '14:54:26'),
('Subu2000', 37, 'Cancer Detection System', 'This is a Project to predict cancer cells using Machine Learning', 'image/8422-Screenshot (1).png', 'public', '14:40:09'),
('admin', 51, 'new Project1', 'Description', 'image/8623-photo-1618335829737-2228915674e0 (1).jfif', 'public', '20:02:11');

-- --------------------------------------------------------

--
-- Table structure for table `snapshot`
--

DROP TABLE IF EXISTS `snapshot`;
CREATE TABLE IF NOT EXISTS `snapshot` (
  `sl` int(15) NOT NULL AUTO_INCREMENT,
  `pimg` varchar(100) NOT NULL,
  `pid` int(15) NOT NULL,
  `cap` varchar(200) NOT NULL,
  PRIMARY KEY (`sl`)
) ENGINE=MyISAM AUTO_INCREMENT=71 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `snapshot`
--

INSERT INTO `snapshot` (`sl`, `pimg`, `pid`, `cap`) VALUES
(69, 'image/6738-1.jpg', 51, 'Caption 1'),
(68, 'image/6769-3.jfif', 50, 'Caption2'),
(67, 'image/2850-1.jpg', 50, 'Caption 1'),
(65, 'image/5600-Screenshot (1).png', 45, '46678'),
(66, 'image/6254-Screenshot (57).png', 47, 'Login Page'),
(62, 'image/4885-ad2.jpeg', 44, 'home'),
(60, 'image/4843-WhatsApp Image 2021-05-07 at 20.42.49.jpeg', 41, 'No file'),
(59, 'image/9974-Screenshot (85).png', 40, 'profile'),
(58, 'image/9018-Screenshot (76).png', 40, 'Home'),
(57, 'image/7689-Screenshot (13).png', 39, 'ProfilePage'),
(56, 'image/2781-Screenshot (7).png', 39, 'HomePage'),
(55, 'image/6097-Screenshot (73).png', 38, 'ProfilePage'),
(54, 'image/7207-Screenshot (74).png', 38, 'HomePage'),
(52, 'image/5840-subhasis_180310008.png', 37, 'Home Page'),
(53, 'image/5922-Screenshot (87).png', 37, 'Profile Page');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id` int(15) NOT NULL AUTO_INCREMENT,
  `fname` varchar(40) NOT NULL,
  `uname` varchar(40) NOT NULL,
  `email` varchar(40) NOT NULL,
  `pwd` varchar(40) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `pno` varchar(40) NOT NULL,
  `branch` varchar(50) DEFAULT NULL,
  `year` varchar(50) DEFAULT NULL,
  `des` varchar(100) DEFAULT NULL,
  `pp` varchar(200) DEFAULT NULL,
  `skills` varchar(100) DEFAULT NULL,
  `fb` varchar(100) DEFAULT NULL,
  `tw` varchar(100) DEFAULT NULL,
  `ins` varchar(100) DEFAULT NULL,
  `g` varchar(100) DEFAULT NULL,
  `w` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=32 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `fname`, `uname`, `email`, `pwd`, `gender`, `pno`, `branch`, `year`, `des`, `pp`, `skills`, `fb`, `tw`, `ins`, `g`, `w`) VALUES
(30, 'Mahaprasad Dalai', 'dalei2020', 'mahadalal2020@gmail.com', 'ffec49a901f421e7942235938e049cea', 'male', '9463832048', 'CSE', '4th', 'You now mw better', 'image/3847-WhatsApp Image 2021-05-07 at 20.42.49.jpeg', 'HTML, CSS, Java, Python', 'https://www.facebook.com/', 'twitter', 'https://www.instagram.com/', 'subhasismohantyghjjjik@gmail.com', 'z'),
(31, 'Admin', 'admin', 'admin@gmail.com', '25d55ad283aa400af464c76d713c07ad', 'male', '7008494825', NULL, NULL, NULL, 'image/nopic.png', NULL, NULL, NULL, NULL, NULL, NULL),
(27, 'Amitabh Anubhav', 'a_double', 'amitabhanubhav@gmail.com', '25d55ad283aa400af464c76d713c07ad', 'male', '7008239343', 'CSE', '4th', 'Not Okay', 'image/nopic.png', 'HTML, CSS, Python', NULL, NULL, NULL, NULL, NULL),
(26, 'Subhasis Mohanty', 'Subu2000', 'subhasismohantyghjjjik@gmail.com', 'f78c06d07a27e49cb43631b53e0c14e4', 'male', '7008494825', 'CSE', '4th', 'Its Okay', 'image/7433-3690-132.jpg', 'HTML, CSS, PHP, Python , Machine Learning, Deep Learning', NULL, NULL, NULL, NULL, NULL);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
