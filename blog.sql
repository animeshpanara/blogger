-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 06, 2017 at 05:19 PM
-- Server version: 10.1.26-MariaDB
-- PHP Version: 7.1.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `blog`
--

-- --------------------------------------------------------

--
-- Table structure for table `blogs`
--

CREATE TABLE `blogs` (
  `id` int(255) NOT NULL,
  `blog` varchar(300) NOT NULL,
  `blogger` varchar(50) NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `likes` int(255) NOT NULL,
  `dislikes` int(255) NOT NULL,
  `blogtitle` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `blogs`
--

INSERT INTO `blogs` (`id`, `blog`, `blogger`, `time`, `likes`, `dislikes`, `blogtitle`) VALUES
(1, '<pre>Hello World\r\nI am Vatsal Gogo\r\nPronara</pre>', 'vdmehta', '2017-08-29 15:50:56', 2, 0, ''),
(2, '<pre>hello world</pre>', 'admin', '2017-09-06 13:16:02', 1, 0, ''),
(3, '<pre>dasdsdasd</pre>', 'admin', '2017-09-06 14:53:54', 0, 0, ''),
(4, '<pre>asdasda</pre>', 'admin', '2017-09-06 15:02:46', 0, 0, ''),
(5, '<pre>hello world</pre>', 'admin', '2017-09-06 15:02:51', 0, 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(255) NOT NULL,
  `commenter` varchar(50) NOT NULL,
  `comment` varchar(500) NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `commenter`, `comment`, `time`) VALUES
(1, 'vdmehta', 'Bhai Bhai', '2017-08-30 14:22:58'),
(1, 'vdmehta', 'ja re chithiya', '2017-08-30 14:23:16'),
(1, 'vatsal', 'bhai bhai', '2017-09-01 09:11:18'),
(1, 'admin', 'saru chale ne', '2017-09-06 13:10:37');

-- --------------------------------------------------------

--
-- Table structure for table `dislikes`
--

CREATE TABLE `dislikes` (
  `id` int(11) NOT NULL,
  `userName` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `follow`
--

CREATE TABLE `follow` (
  `following` varchar(50) NOT NULL,
  `follower` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `follow`
--

INSERT INTO `follow` (`following`, `follower`) VALUES
('parthCampion', 'GendoPandyo'),
('vdmehta', 'drmehta'),
('parthCampion', 'drmehta'),
('vdmehta', 'tanush'),
('vatsal', 'tanush'),
('parthCampion', 'tanush'),
('drmehta', 'tanush'),
('tanush', 'vdmehta'),
('trishan', 'tanush'),
('naisargi', 'vdmehta'),
('parthCampion', 'vdmehta'),
('vdmehta', 'parthCampion'),
('parthCampion', 'animesh'),
('vatsal', 'animesh'),
('animesh', 'vatsal'),
('parthCampion', 'vatsal'),
('vdmehta', 'animesh'),
('Afeeza', 'animesh');

-- --------------------------------------------------------

--
-- Table structure for table `likes`
--

CREATE TABLE `likes` (
  `id` int(255) NOT NULL,
  `userName` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `likes`
--

INSERT INTO `likes` (`id`, `userName`) VALUES
(9, 'admin'),
(1, 'admin'),
(2, 'animesh');

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `notify` text NOT NULL,
  `notifier` text NOT NULL,
  `id` int(11) NOT NULL,
  `notification` text NOT NULL,
  `readBy` tinyint(4) NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `notid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`notify`, `notifier`, `id`, `notification`, `readBy`, `time`, `notid`) VALUES
('admin', 'animesh', 2, 'animesh liked your blog', 0, '2017-09-06 14:33:46', 1),
('vdmehta', 'admin', 3, 'admin posted new Blog', 0, '2017-09-06 14:53:54', 2),
('vatsal', 'admin', 3, 'admin posted new Blog', 0, '2017-09-06 14:53:54', 3),
('parthCampion', 'admin', 3, 'admin posted new Blog', 0, '2017-09-06 14:53:54', 4),
('drmehta', 'admin', 3, 'admin posted new Blog', 0, '2017-09-06 14:53:54', 5),
('GendoPandyo', 'admin', 3, 'admin posted new Blog', 0, '2017-09-06 14:53:54', 6),
('trishan', 'admin', 3, 'admin posted new Blog', 0, '2017-09-06 14:53:54', 7),
('tanush', 'admin', 3, 'admin posted new Blog', 0, '2017-09-06 14:53:54', 8),
('naisargi', 'admin', 3, 'admin posted new Blog', 0, '2017-09-06 14:53:54', 9),
('animesh', 'admin', 3, 'admin posted new Blog', 1, '2017-09-06 14:53:54', 10),
('asas', 'admin', 3, 'admin posted new Blog', 0, '2017-09-06 14:53:54', 11),
('Afeeza', 'admin', 3, 'admin posted new Blog', 1, '2017-09-06 14:53:54', 12),
('vdmehta', 'admin', 4, 'admin posted new Blog', 0, '2017-09-06 15:02:46', 13),
('vatsal', 'admin', 4, 'admin posted new Blog', 0, '2017-09-06 15:02:46', 14),
('parthCampion', 'admin', 4, 'admin posted new Blog', 0, '2017-09-06 15:02:46', 15),
('drmehta', 'admin', 4, 'admin posted new Blog', 0, '2017-09-06 15:02:46', 16),
('GendoPandyo', 'admin', 4, 'admin posted new Blog', 0, '2017-09-06 15:02:46', 17),
('trishan', 'admin', 4, 'admin posted new Blog', 0, '2017-09-06 15:02:46', 18),
('tanush', 'admin', 4, 'admin posted new Blog', 0, '2017-09-06 15:02:46', 19),
('naisargi', 'admin', 4, 'admin posted new Blog', 0, '2017-09-06 15:02:46', 20),
('animesh', 'admin', 4, 'admin posted new Blog', 1, '2017-09-06 15:02:46', 21),
('asas', 'admin', 4, 'admin posted new Blog', 0, '2017-09-06 15:02:46', 22),
('Afeeza', 'admin', 4, 'admin posted new Blog', 1, '2017-09-06 15:02:46', 23),
('vdmehta', 'admin', 5, 'admin posted new Blog', 0, '2017-09-06 15:02:51', 24),
('vatsal', 'admin', 5, 'admin posted new Blog', 0, '2017-09-06 15:02:51', 25),
('parthCampion', 'admin', 5, 'admin posted new Blog', 0, '2017-09-06 15:02:51', 26),
('drmehta', 'admin', 5, 'admin posted new Blog', 0, '2017-09-06 15:02:51', 27),
('GendoPandyo', 'admin', 5, 'admin posted new Blog', 0, '2017-09-06 15:02:51', 28),
('trishan', 'admin', 5, 'admin posted new Blog', 0, '2017-09-06 15:02:51', 29),
('tanush', 'admin', 5, 'admin posted new Blog', 0, '2017-09-06 15:02:51', 30),
('naisargi', 'admin', 5, 'admin posted new Blog', 0, '2017-09-06 15:02:51', 31),
('animesh', 'admin', 5, 'admin posted new Blog', 1, '2017-09-06 15:02:51', 32),
('asas', 'admin', 5, 'admin posted new Blog', 0, '2017-09-06 15:02:51', 33),
('Afeeza', 'admin', 5, 'admin posted new Blog', 1, '2017-09-06 15:02:51', 34);

-- --------------------------------------------------------

--
-- Table structure for table `usefull`
--

CREATE TABLE `usefull` (
  `id` int(255) NOT NULL,
  `userName` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `usefull`
--

INSERT INTO `usefull` (`id`, `userName`) VALUES
(1, 'vdmehta'),
(1, 'parthCampion'),
(3, 'vdmehta'),
(2, 'vdmehta');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(255) NOT NULL,
  `userName` varchar(30) NOT NULL,
  `password` varchar(50) NOT NULL,
  `mail` varchar(50) NOT NULL,
  `propic` varchar(50) NOT NULL,
  `block` tinyint(4) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `userName`, `password`, `mail`, `propic`, `block`) VALUES
(1, 'vdmehta', 'vatsalgogo', 'vatsal@blogflog.com', 'vdmehta.png', 1),
(2, 'vatsal', 'vdm12345', 'mehta@blogflog.com', 'vatsal.jpg', 0),
(3, 'parthCampion', 'drishti', 'parth@campion.com', 'parthCampion.jpg', 0),
(4, 'drmehta', 'drdrmehta', 'drm@jau.in', 'default.png', 0),
(5, 'GendoPandyo', 'gendo123', 'gendo@blogflog.com', 'default.png', 0),
(6, 'trishan', '123456', 'trishan@blogflog.com', 'trishan.jpg', 0),
(7, 'tanush', '123456', 'tanush@blogflog.com', 'tanush.jpg', 0),
(8, 'naisargi', '100613', 'naisu@blogflog.com', 'naisargi.jpg', 0),
(9, 'animesh', '123', 'animeshpanara30@gmail.com', 'animesh.JPG', 0),
(10, 'admin', '12', 'animeshhpanara30@gmail.com', 'animesh1.JPG', 0),
(11, 'asas', 'asas', 'asas', 'default.png', 0),
(12, 'Afeeza', 'animeshpanara', 'afeeza1.aa@gmail.com', 'default.png', 0);

-- --------------------------------------------------------

--
-- Table structure for table `wastefull`
--

CREATE TABLE `wastefull` (
  `id` int(11) NOT NULL,
  `userName` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `wastefull`
--

INSERT INTO `wastefull` (`id`, `userName`) VALUES
(2, 'parthCampion');

-- --------------------------------------------------------

--
-- Table structure for table `websiteusers`
--

CREATE TABLE `websiteusers` (
  `email` varchar(30) NOT NULL,
  `pass` varchar(20) NOT NULL,
  `userName` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `websiteusers`
--

INSERT INTO `websiteusers` (`email`, `pass`, `userName`) VALUES
('animeshhpanara30@gmail.com', '12', 'animesh');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `blogs`
--
ALTER TABLE `blogs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`notid`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `websiteusers`
--
ALTER TABLE `websiteusers`
  ADD PRIMARY KEY (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `notid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
