-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jul 14, 2018 at 09:26 PM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 5.6.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_blog`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_catagory`
--

CREATE TABLE `tbl_catagory` (
  `id` int(11) NOT NULL,
  `name` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_catagory`
--

INSERT INTO `tbl_catagory` (`id`, `name`) VALUES
(2, 'HTML'),
(3, 'CSS'),
(4, 'Js'),
(6, 'Math'),
(7, 'JAVA');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_contuct`
--

CREATE TABLE `tbl_contuct` (
  `id` int(11) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `body` varchar(255) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_contuct`
--

INSERT INTO `tbl_contuct` (`id`, `firstname`, `lastname`, `email`, `body`, `status`, `date`) VALUES
(2, 'Nuruzzaman', 'Himel', 'himel@gmail.com', 'This section will go main content. This section will go main content. This section will go main', 0, '2018-07-04 03:51:24'),
(6, 'Setu', 'Setu', 'Setu@gmail.com', 'This section will go main content. This section will go main content. This section will go mainThis section will go main content. This section will go main content. This section will go mainThis section will go main content. This section will go main cont', 1, '2018-07-04 14:13:50'),
(7, 'Chadni', 'Chadni', 'chadni@gmail.com', 'This section will go main content. This section will go main content. This section will go main.i love U\r\nThis section will go main content. This section will go main content. This section will go mainThis section will go main content. This section will g', 0, '2018-07-04 14:53:25');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_copy`
--

CREATE TABLE `tbl_copy` (
  `id` int(11) NOT NULL,
  `copy` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_copy`
--

INSERT INTO `tbl_copy` (`id`, `copy`) VALUES
(1, '@ Copyright Md. Nuruzzaman Ltd');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pages`
--

CREATE TABLE `tbl_pages` (
  `id` int(11) NOT NULL,
  `userId` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `body` text NOT NULL,
  `image` varchar(255) NOT NULL,
  `meta_tags` varchar(255) NOT NULL,
  `meta_des` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_pages`
--

INSERT INTO `tbl_pages` (`id`, `userId`, `name`, `body`, `image`, `meta_tags`, `meta_des`) VALUES
(2, 3, 'Contuct Me', '<p>Pleaze Contuct Me....</p>\n<p>This section will go main content. This section will go main content. This section will go main content. This section will go main content. This section will go main content. This section will go main content. This section will go main content. This section will go main content. This section will go main content. This section will go main content. This section will go main content.</p>\n<p>This section will go main content. This section will go main content. This section will go main content. This section will go main content. This section will go main content. This section will go main content. This section will go main content. This section will go main content. This section will go main content. This section will go main content. This section will go main content.</p>', '3f46a0197a.jpg', 'our contuct,there have many contact', '<p>Pleaze Contuct Me....</p> <p>This section will go main content. This section will g'),
(3, 1, 'DMCA', '<p>DMCA DMCA DMCA ...</p>\r\n<p>This section will go main content. This section will go main content. This section will go main content. This section will go main content. This section will go main content. This section will go main content. This section will go main content. This section will go main content. This section will go main content. This section will go main content. This section will go main content.</p>\r\n<p>This section will go main content. This section will go main content. This section will go main content. This section will go main content. This section will go main content. This section will go main content. This section will go main content. This section will go main content. This section will go main content. This section will go main content. This section will go main content.</p>', 'No-image-available.jpg', 'DMC,DMC1,DMC2', '<p>DMCA...</p> <p>This section will go main content. This section will go main content. This section will go main content. This section will go main content. This section will go main content. This section will go main content. This section will go main content. This section will go main content. This section will go main content. This section will go main content. This section will go main content.</p> <p>This section will go main content. This section will go main content. This section will go main content. This section will go main content. This section will go main content. This section will go main content. This section will go main content. This section will go main content. This section will go main content. This section will go main content. This section will go main content.</p>'),
(5, 3, 'Services', '<p>Services.</p>\r\n<p>This section will go main content. This section will go main content. This section will go main content. This section will go main content. This section will go main content. This section will go main content. This section will go main content. This section will go main content. This section will go main content. This section will go main content. This section will go main content.</p>\r\n<p>This section will go main content. This section will go main content. This section will go main content. This section will go main content. This section will go main content. This section will go main content. This section will go main content. This section will go main content. This section will go main content. This section will go main content. This section will go main content.</p>', 'No-image-available.jpg', 'Services1,Services2,Services3', '<p>Service...</p> <p>This section will go main content. This section will go main content. This section will go main content. This section will go main content. This section will go main content. This section will go main content. This section will go main content. This section will go main content. This section will go main content. This section will go main content. This section will go main content.</p> <p>This section will go main content. This section will go main content. This section will go main content. This section will go main content. This section will go main content. This section will go main content. This section will go main content. This section will go main content. This section will go main content. This section will go main content. This section will go main content.</p>'),
(6, 1, 'Help', '<p>Help...This section will go main content. This section will go main content. This section will go main content. This section will go main content. This section will go main content. This section will go main content. This section will go main content. This section will go main content. This section will go main content. This section will go main content. This section will go main content.This section will go main content. This section will go main content. This section will go main content. This section will go main content. This section will go main content. This section will go main content. This section will go main content. This section will go main content. This section will go main content. This section will go main content. This section will go main content.This section will go main content. This section will go main content. This section will go main content. This section will go main content. This section will go main content. This section will go main content. This section will go main content. This section will go main content. This section will go main content. This section will go main content. This section will go main content.</p>', 'No-image-available.jpg', 'Help 1,Help 2,Help 3', 'This section will go main content.This section will go main content. This section will go main content. This section will go main content. This section will go main content. This section will go main content. This section will go main content. This section will go main content. This section will go main content. This section will go main content. This section will go main content. This section will go main content.This section will go main content. This section will go main content. This section will go main content. This section will go main content. This section will go main content. This section will go main content. This section will go main content. This section will go main content. This section will go main content. This section will go main content. This section will go main content.This section will go main content.This section will go main content. This section will go main content. This section will go main content. This section will go main content. This section will go main content. This section will go main content. This section will go main content. This section will go main content. This section will go main content. This section will go main content. This section will go main content.This section will go main content. This section will go main content. This section will go main content. This section will go main content. This section will go main content. This section will go main content. This section will go main content. This section will go main content. This section will go main content. This section will go main content. This section will go main content.');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_post`
--

CREATE TABLE `tbl_post` (
  `id` int(11) NOT NULL,
  `userId` int(11) NOT NULL,
  `catId` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `body` text NOT NULL,
  `image` varchar(255) NOT NULL,
  `author` varchar(50) NOT NULL,
  `tags` varchar(255) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_post`
--

INSERT INTO `tbl_post` (`id`, `userId`, `catId`, `title`, `body`, `image`, `author`, `tags`, `date`) VALUES
(10, 0, 7, 'Our post title here-java ', '<p>This section will go main content. This section will go main content. This section will go main content. This section will go main content. This section will go main content. This section will go main content. This section will go main content. This section will go main content. This section will go main content. This section will go main content. This section will go main content.</p>\r\n<p>This section will go main content. This section will go main content. This section will go main content. This section will go main content. This section will go main content. This section will go main content. This section will go main content. This section will go main content. This section will go main content. This section will go main content. This section will go main content.</p>\r\n<p>This section will go main content. This section will go main content. This section will go main content. This section will go main content. This section will go main content. This section will go main content. This section will go main content. This section will go main content. This section will go main content. This section will go main content. This section will go main content.</p>', '75363526da.png', 'himel', 'java, my java', '2018-06-28 18:27:23'),
(11, 3, 6, 'Our post title here-math', '<p>This section will go main content. This section will go main content. This section will go main content. This section will go main content. This section will go main content. This section will go main content. This section will go main content. This section will go main content. This section will go main content. This section will go main content. This section will go main content.</p>\r\n<p>This section will go main content. This section will go main content. This section will go main content. This section will go main content. This section will go main content. This section will go main content. This section will go main content. This section will go main content. This section will go main content. This section will go main content. This section will go main content.</p>\r\n<p>This section will go main content. This section will go main content. This section will go main content. This section will go main content. This section will go main content. This section will go main content. This section will go main content. This section will go main content. This section will go main content. This section will go main content. This section will go main content.</p>', 'd1f5955473.jpg', 'author', 'Math,General Math, Higher Math', '2018-06-28 18:29:54'),
(12, 1, 3, 'Our post title here-JS', '<p>This section will go main content. This section will go main content. This section will go main content. This section will go main content. This section will go main content. This section will go main content. This section will go main content. This section will go main content. This section will go main content. This section will go main content. This section will go main content.</p>\r\n<p>This section will go main content. This section will go main content. This section will go main content. This section will go main content. This section will go main content. This section will go main content. This section will go main content. This section will go main content. This section will go main content. This section will go main content. This section will go main content.</p>\r\n<p>This section will go main content. This section will go main content. This section will go main content. This section will go main content. This section will go main content. This section will go main content. This section will go main content. This section will go main content. This section will go main content. This section will go main content. This section will go main content.</p>', 'e6c5b7ac8e.png', 'himel', 'JS', '2018-06-28 18:37:54'),
(13, 0, 3, 'Our post title here-CSS', '<p>This section will go main content. This section will go main content. This section will go main content. This section will go main content. This section will go main content. This section will go main content. This section will go main content. This section will go main content. This section will go main content. This section will go main content. This section will go main content.</p>\r\n<p>This section will go main content. This section will go main content. This section will go main content. This section will go main content. This section will go main content. This section will go main content. This section will go main content. This section will go main content. This section will go main content. This section will go main content. This section will go main content.</p>\r\n<p>This section will go main content. This section will go main content. This section will go main content. This section will go main content. This section will go main content. This section will go main content. This section will go main content. This section will go main content. This section will go main content. This section will go main content. This section will go main content.</p>', '07778272a5.jpg', 'himel', 'CSS, CSS3, CSS Tutorial', '2018-06-28 18:38:51'),
(14, 0, 2, 'Our post title here-HTML', '<p>HTML This section will go main content. This section will go main content. This section will go main content. This section will go main content. This section will go main content. This section will go main content. This section will go main content. This section will go main content. This section will go main content. This section will go main content. This section will go main content.</p>\r\n<p>This section will go main content. This section will go main content. This section will go main content. This section will go main content. This section will go main content. This section will go main content. This section will go main content. This section will go main content. This section will go main content. This section will go main content. This section will go main content.</p>\r\n<p>This section will go main content. This section will go main content. This section will go main content. This section will go main content. This section will go main content. This section will go main content. This section will go main content. This section will go main content. This section will go main content. This section will go main content. This section will go main content.</p>', '6557c0495f.jpg', 'himel', 'HIML,HTML5,HTML6', '2018-06-28 18:39:35'),
(16, 1, 3, 'Our post title here-CSS', '<p>This section will go main content. This section will go main content. This section will go main content. This section will go main content. This section will go main content. This section will go main content. This section will go main content. This section will go main content. This section will go main content. This section will go main content. This section will go main content.</p>\r\n<p>This section will go main content. This section will go main content. This section will go main content. This section will go main content. This section will go main content. This section will go main content. This section will go main content. This section will go main content. This section will go main content. This section will go main content. This section will go main content.</p>\r\n<p>This section will go main content. This section will go main content. This section will go main content. This section will go main content. This section will go main content. This section will go main content. This section will go main content. This section will go main content. This section will go main content. This section will go main content. This section will go main content.</p>', 'e0f54a44fc.png', 'himel', 'CSS, CSS3, CSS Tutorial', '2018-06-28 18:44:24'),
(17, 3, 4, 'Our post title here-JS', '<p>This section will go main content. This section will go main content. This section will go main content. This section will go main content. This section will go main content. This section will go main content. This section will go main content. This section will go main content. This section will go main content. This section will go main content. This section will go main content.</p>\r\n<p>This section will go main content. This section will go main content. This section will go main content. This section will go main content. This section will go main content. This section will go main content. This section will go main content. This section will go main content. This section will go main content. This section will go main content. This section will go main content.</p>\r\n<p>This section will go main content. This section will go main content. This section will go main content. This section will go main content. This section will go main content. This section will go main content. This section will go main content. This section will go main content. This section will go main content. This section will go main content. This section will go main content.</p>\r\n<p>This section will go main content. This section will go main content. This section will go main content. This section will go main content. This section will go main content. This section will go main content. This section will go main content. This section will go main content. This section will go main content. This section will go main content. This section will go main content.</p>', '93ad904eb4.png', 'author', 'JS,js post', '2018-06-28 18:44:56'),
(18, 3, 6, 'Our post title here-math', '<p>This section will go main content. This section will go main content. This section will go main content. This section will go main content. This section will go main content. This section will go main content. This section will go main content. This section will go main content. This section will go main content. This section will go main content. This section will go main content.</p>\r\n<p>This section will go main content. This section will go main content. This section will go main content. This section will go main content. This section will go main content. This section will go main content. This section will go main content. This section will go main content. This section will go main content. This section will go main content. This section will go main content.</p>\r\n<p>This section will go main content. This section will go main content. This section will go main content. This section will go main content. This section will go main content. This section will go main content. This section will go main content. This section will go main content. This section will go main content. This section will go main content. This section will go main content.</p>', '50348333bc.jpg', 'author', 'Math', '2018-06-28 18:45:19'),
(19, 3, 7, 'Our post title here-java', '<p>This section will go main content. This section will go main content. This section will go main content. This section will go main content. This section will go main content. This section will go main content. This section will go main content. This section will go main content. This section will go main content. This section will go main content. This section will go main content.</p>\r\n<p>This section will go main content. This section will go main content. This section will go main content. This section will go main content. This section will go main content. This section will go main content. This section will go main content. This section will go main content. This section will go main content. This section will go main content. This section will go main content.</p>\r\n<p>This section will go main content. This section will go main content. This section will go main content. This section will go main content. This section will go main content. This section will go main content. This section will go main content. This section will go main content. This section will go main content. This section will go main content. This section will go main content.</p>', '3da9163b87.jpg', 'rohan', 'java, my java', '2018-06-28 18:46:06'),
(20, 3, 2, 'Our post title here-HTML5', '<p>HTML... This section will go main content. This section will go main content. This section will go main content. This section will go main content. This section will go main content. This section will go main content. This section will go main content. This section will go main content. This section will go main content.This section will go main content. This section will go main content. This section will go main content. This section will go main content. This section will go main content. This section will go main content. This section will go main content. This section will go main content. This section will go main content.This section will go main content. This section will go main content. This section will go main content. This section will go main content. This section will go main content. This section will go main content. This section will go main content. This section will go main content. This section will go main content.</p>', '3ecf84359f.png', 'author', 'HIML,HTML5,Learn HTML', '2018-07-08 03:47:15'),
(21, 8, 6, 'Our post title here-math1', '<p>This section will go main content. This section will go main content. This section will go main content. This section will go main content. This section will go main content. This section will go main content. This section will go main content. This section will go main content. This section will go main content.This section will go main content. This section will go main content. This section will go main content. This section will go main content. This section will go main content. This section will go main content. This section will go main content. This section will go main content. This section will go main content.This section will go main content. This section will go main content. This section will go main content. This section will go main content. This section will go main content. This section will go main content. This section will go main content. This section will go main content. This section will go main content.</p>', '3e3011cbed.png', 'neweditor', 'math1,math2', '2018-07-11 04:25:47');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_slider`
--

CREATE TABLE `tbl_slider` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_slider`
--

INSERT INTO `tbl_slider` (`id`, `title`, `image`) VALUES
(2, 'Second Slider: This is my second slider', 'ce4636b819.jpg'),
(3, 'Third Slider: This is my third slider', 'c800a99f68.jpg'),
(4, 'Fourth Slider: This is my fourth slider', '3fd5024969.jpg'),
(5, 'First Slider: First Slider is Here', 'c9ee199fb4.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_social`
--

CREATE TABLE `tbl_social` (
  `id` int(11) NOT NULL,
  `fb` varchar(255) NOT NULL,
  `tw` varchar(255) NOT NULL,
  `li` varchar(255) NOT NULL,
  `gp` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_social`
--

INSERT INTO `tbl_social` (`id`, `fb`, `tw`, `li`, `gp`) VALUES
(1, 'https://www.facebook.com/nuruzzaman.himel0', 'https://www.twitter.com/nuruzzaman.himel0', 'https://www.linkdin.com/nuruzzaman.himel0', 'https://www.googleplus.com/nuruzzaman.himel0');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_theme`
--

CREATE TABLE `tbl_theme` (
  `id` int(11) NOT NULL,
  `theme` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_theme`
--

INSERT INTO `tbl_theme` (`id`, `theme`) VALUES
(1, 'green');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `email` varchar(255) NOT NULL,
  `des` text NOT NULL,
  `role` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`id`, `name`, `username`, `password`, `email`, `des`, `role`) VALUES
(1, 'nuruzzaman himel', 'himel', '1a1dc91c907325c69271ddf0c944bc72', 'himel@gmail.com', '<p>his section will go main content. This section will go main content. This section will go main content. This section will go main content. This section will go main content. This section will go main content. This section will go main content. This section will go main content. This section will go main content. This section will go main content. This section will go main content.</p>', 0),
(3, 'Mr. author', 'author', '1a1dc91c907325c69271ddf0c944bc72', 'author@gmail.com', '<p>This section will go main content. This section will go main content. This section will go main content. This section will go main content. This section will go main content. This section will go main content. This section will go main content. This section will go main contentThis section will go main content. This section will go main content. This section will go main content. This section will go main content. This section will go main content. This section will go main content. This section will go main content. This section will go main content</p>', 1),
(5, 'Mr. Editor', 'editor', '1a1dc91c907325c69271ddf0c944bc72', '', '', 2),
(7, '', 'newauthor', '1a1dc91c907325c69271ddf0c944bc72', 'newauthor@gmail.com', '', 1),
(8, '', 'neweditor', '1a1dc91c907325c69271ddf0c944bc72', 'neweditor@gmail.com', '', 2);

-- --------------------------------------------------------

--
-- Table structure for table `title_slogan`
--

CREATE TABLE `title_slogan` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `des` varchar(255) NOT NULL,
  `logo` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `title_slogan`
--

INSERT INTO `title_slogan` (`id`, `title`, `des`, `logo`) VALUES
(1, 'Our Wensite Title', 'Our website description Here', 'logo.png');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_catagory`
--
ALTER TABLE `tbl_catagory`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_contuct`
--
ALTER TABLE `tbl_contuct`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_copy`
--
ALTER TABLE `tbl_copy`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_pages`
--
ALTER TABLE `tbl_pages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_post`
--
ALTER TABLE `tbl_post`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_slider`
--
ALTER TABLE `tbl_slider`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_social`
--
ALTER TABLE `tbl_social`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_theme`
--
ALTER TABLE `tbl_theme`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `title_slogan`
--
ALTER TABLE `title_slogan`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_catagory`
--
ALTER TABLE `tbl_catagory`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `tbl_contuct`
--
ALTER TABLE `tbl_contuct`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `tbl_copy`
--
ALTER TABLE `tbl_copy`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tbl_pages`
--
ALTER TABLE `tbl_pages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `tbl_post`
--
ALTER TABLE `tbl_post`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT for table `tbl_slider`
--
ALTER TABLE `tbl_slider`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `tbl_social`
--
ALTER TABLE `tbl_social`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tbl_theme`
--
ALTER TABLE `tbl_theme`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `title_slogan`
--
ALTER TABLE `title_slogan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
