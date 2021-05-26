-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 26, 2021 at 03:49 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cms`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `cat_id` int(3) NOT NULL,
  `cat_title` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`cat_id`, `cat_title`) VALUES
(2, 'java'),
(5, 'C Programming'),
(6, 'PhP'),
(7, 'Html/Css'),
(8, 'new'),
(9, 'Travelling');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `comment_id` int(3) NOT NULL,
  `comment_post_id` int(3) NOT NULL,
  `comment_author` varchar(255) NOT NULL,
  `comment_email` varchar(255) NOT NULL,
  `comment_content` text NOT NULL,
  `comment_status` varchar(255) NOT NULL,
  `comment_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`comment_id`, `comment_post_id`, `comment_author`, `comment_email`, `comment_content`, `comment_status`, `comment_date`) VALUES
(7, 45, 'sd', 'sdf', 'sdf', 'unapproved', '2021-01-18'),
(8, 45, 'sdf', 'dfs', 'sdfdasf', 'approved', '2021-01-18'),
(9, 46, 'sdf', 'sdfsd@xzdf.gh', 'dffdgdg', 'unapproved', '2021-05-26'),
(10, 48, 'asdasd', 'sadfasd', 'saESASDASD', 'approved', '2021-05-26');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `post_id` int(3) NOT NULL,
  `post_category_id` int(3) NOT NULL,
  `post_title` varchar(255) NOT NULL,
  `post_author` varchar(255) NOT NULL,
  `author_id` int(255) NOT NULL,
  `post_date` date NOT NULL,
  `post_image` text NOT NULL,
  `post_content` mediumtext NOT NULL,
  `post_tags` varchar(255) NOT NULL,
  `post_comment_count` int(255) NOT NULL,
  `post_status` varchar(255) NOT NULL DEFAULT 'draft',
  `post_views_count` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`post_id`, `post_category_id`, `post_title`, `post_author`, `author_id`, `post_date`, `post_image`, `post_content`, `post_tags`, `post_comment_count`, `post_status`, `post_views_count`) VALUES
(30, 2, 'Test1', 'captcha', 47, '2021-01-08', 'typewriter.jpg', '<p>zSASaddwd</p>', 'xxxs', 0, 'published', 1),
(31, 2, 'Test2', 'captcha', 47, '2021-01-08', 'typewriter.jpg', '<p>zSASaddwd</p>', 'xxxs', 0, 'published', 0),
(32, 2, 'Test', 'captcha', 47, '2021-01-08', 'typewriter.jpg', '<p>zSASaddwd</p>', 'xxxs', 0, 'published', 0),
(33, 2, 'Test', 'captcha', 47, '2021-01-08', 'typewriter.jpg', '<p>zSASaddwd</p>', 'xxxs', 0, 'published', 0),
(34, 2, 'Test', 'captcha', 47, '2021-01-08', 'typewriter.jpg', '<p>zSASaddwd</p>', 'xxxs', 0, 'published', 0),
(35, 2, 'Test6', 'captcha', 47, '2021-01-08', 'typewriter.jpg', '<p>zSASaddwd</p>', 'xxxs', 0, 'published', 0),
(36, 2, 'Test', 'captcha', 47, '2021-01-08', 'typewriter.jpg', '<p>zSASaddwd</p>', 'xxxs', 0, 'published', 0),
(37, 2, 'Test', 'captcha', 47, '2021-01-08', 'typewriter.jpg', '<p>zSASaddwd</p>', 'xxxs', 0, 'published', 0),
(38, 2, 'Test', 'captcha', 47, '2021-01-08', 'typewriter.jpg', '<p>zSASaddwd</p>', 'xxxs', 0, 'published', 0),
(39, 2, 'Test', 'captcha', 47, '2021-01-08', 'typewriter.jpg', '<p>zSASaddwd</p>', 'xxxs', 1, 'published', 2),
(40, 2, 'Test11', 'captcha', 47, '2021-01-08', 'typewriter.jpg', '<p>zSASaddwd</p>', 'xxxs', 0, 'published', 0),
(41, 2, 'Test', 'captcha', 47, '2021-01-08', 'typewriter.jpg', '<p>zSASaddwd</p>', 'xxxs', 0, 'published', 0),
(42, 2, 'Test', 'captcha', 47, '2021-01-08', 'typewriter.jpg', '<p>zSASaddwd</p>', 'xxxs', 0, 'published', 0),
(43, 2, 'Test', 'captcha', 47, '2021-01-08', 'typewriter.jpg', '<p>zSASaddwd</p>', 'xxxs', 0, 'published', 0),
(44, 2, 'Test', 'captcha', 47, '2021-01-09', 'typewriter.jpg', '<b>Test Post </b>  \r\n        ', 'xxxs', 0, 'published', 2),
(45, 7, 'dsabsdjfb', 'captcha', 47, '2021-05-26', 'typewriter.jpg', '<p>zSASaddwd</p>', 'xxxs,html', 4, 'published', 9),
(46, 2, 'ttuytydf', 'dsfgsd', 47, '2021-05-26', '', '<p>dsdfsdf</p>', 'sdfsdf', 1, 'published', 2),
(48, 2, 'sadfsdf', 'sdfsdf', 53, '2021-05-26', '', '<p>sdfsdfsdf</p>', 'sdfsdf', 1, 'published', 5),
(49, 9, 'asasas', '', 47, '2021-05-26', '', '', 'simla,travel,vacations', 0, 'draft', 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(3) NOT NULL,
  `username` varchar(255) NOT NULL,
  `user_password` varchar(255) NOT NULL,
  `user_firstname` varchar(255) NOT NULL,
  `user_lastname` varchar(255) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `user_image` text NOT NULL,
  `user_role` varchar(255) NOT NULL,
  `randSalt` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `user_password`, `user_firstname`, `user_lastname`, `user_email`, `user_image`, `user_role`, `randSalt`) VALUES
(47, 'test1', 'MTIz', ' ', ' ', 'sda@dsfs', '', 'admin', ''),
(50, 'test2', '$2y$12$VzLwR/S1c1GIq6cBHtMR4uYuTA/bH2AWWh4r.HHuI9e1C5.xLqIu6', '', '', 'sdhjb@bjsdb', '', 'subscriber', ''),
(51, 'test4', '$2y$12$i8pqhvIT8H4r4fqDNFtnPeKaO1Amx.Rr2owJP1a4CyCPWM1PkNgYq', '', '', 'sD@xda', '', 'subscriber', ''),
(52, 'asd', '$2y$12$q5br5VUOWotDlbl/nRiip.Qw0G.omRfifrHfeeWji0ObcuIyJojTK', '', '', 'sfd@sd', '', 'subscriber', ''),
(53, 'CD', 'NDU2', ' SDFSD', ' SDFSDF', 'sdsd@sddf', '', 'subscriber', ''),
(54, 'test10', 'MzQ1', '', '', 'azdsab@naxkxdfnk.ghfg', '', 'subscriber', '');

-- --------------------------------------------------------

--
-- Table structure for table `users_online`
--

CREATE TABLE `users_online` (
  `id` int(11) NOT NULL,
  `session` varchar(255) NOT NULL,
  `time` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users_online`
--

INSERT INTO `users_online` (`id`, `session`, `time`) VALUES
(1, 'uuos1u5ookgl0m55k24aqkqh27', 1610203071),
(2, 'gqiepas7aier10tdvq1so3ip63', 1610203077),
(3, '1npm7m2ka6a99grkns8qo9bbsl', 1610208947),
(4, 'og5c7gnsa5fjq9j28l2hsr6et5', 1610214347),
(5, 'a7eo7g1fjbrguht36kh7jtstsj', 1610214367),
(6, 'ddh0h4du6kb9jf18ekm3bkcrcj', 1610217031),
(7, 'qs5n2hvn6h2s2sa7engtqh9u1j', 1610218454),
(8, 'a9muk9hpcev2911sq0hafcj598', 1610473335),
(9, 'cqm6evho7lg7le4529vl3ruj9g', 1610908781),
(10, '2mruqcvm0hgprersu0ismu7gdc', 1610910265),
(11, 'eqvn90jk0hb63pm4jqasfc4tbq', 1622032067);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`comment_id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`post_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `users_online`
--
ALTER TABLE `users_online`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `cat_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `comment_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `post_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT for table `users_online`
--
ALTER TABLE `users_online`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
