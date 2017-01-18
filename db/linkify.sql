-- phpMyAdmin SQL Dump
-- version 4.4.15.5
-- http://www.phpmyadmin.net
--
-- Host: localhost:3306
-- Generation Time: Jan 18, 2017 at 09:17 AM
-- Server version: 5.5.49-log
-- PHP Version: 7.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `linkify`
--

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE IF NOT EXISTS `comments` (
  `id` int(11) NOT NULL,
  `comment` varchar(1000) NOT NULL,
  `post_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `likes` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `comment`, `post_id`, `user_id`, `likes`) VALUES
(1, 'ok why?', 0, 6, 0),
(2, 'why', 0, 6, 0),
(3, 'Okej, why?', 1, 6, 0),
(4, 'Funny', 1, 6, 0),
(5, 'nerd!!', 1, 1, 0),
(6, 'get a life', 1, 1, 0),
(7, 'nnn', 1, 1, 0),
(8, 'dah', 1, 1, 0),
(9, 'dah', 1, 1, 0),
(10, 'dah', 1, 1, 0),
(11, 'dah', 1, 1, 0),
(12, 'ouSgpmarho[k', 1, 1, 0),
(13, 'vbvg', 1, 1, 0),
(14, 'ugvlih', 1, 1, 0),
(15, 'feefefeg', 1, 1, 0),
(16, 'ok like that', 20, 1, 0),
(17, 'dgrdrh', 6, 1, 0),
(18, 'fgjfgyj', 1, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE IF NOT EXISTS `posts` (
  `id` int(11) NOT NULL,
  `head` varchar(200) NOT NULL,
  `post` varchar(1000) NOT NULL,
  `user_id` int(11) NOT NULL,
  `datum` datetime NOT NULL,
  `votes` int(11) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `head`, `post`, `user_id`, `datum`, `votes`) VALUES
(1, 'new header', 'This is my post                    ', 1, '2016-12-20 00:00:00', 6),
(6, 'hello', 'post post', 1, '2016-12-20 00:00:00', -2),
(7, 'hello', 'post post', 1, '2016-12-20 00:00:00', 2),
(8, 'hejsan', 'ny post', 1, '2016-12-20 00:00:00', 2),
(9, 'Guns n roses', 'Stockholm', 1, '2016-12-20 00:00:00', -3),
(11, 'This is the first post from', 'I like my self if this works!!!', 1, '2017-01-16 00:00:00', 2),
(17, 'motherfucker', 'Fuck you', 1, '2017-01-16 00:00:00', 1),
(18, 'eogrijqwg', 'WEFYHBw;eogfn;WLNWJBF;efwefnenfenifief', 1, '2017-01-16 00:00:00', -2),
(19, 'What is Lorem Ipsum?', 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old.', 1, '2017-01-17 00:00:00', NULL),
(20, 'Lets create a new post', 'Her is some content.', 1, '2017-01-17 00:00:00', NULL),
(21, 'Design', '    oh this is boring            ', 1, '2017-01-17 00:00:00', NULL),
(22, 'post', 'sothing                ', 1, '2017-01-17 00:00:00', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL,
  `email` varchar(70) NOT NULL,
  `username` varchar(70) NOT NULL,
  `password` varchar(60) NOT NULL,
  `avatar` varchar(300) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `username`, `password`, `avatar`) VALUES
(1, 'cb@gmail.com', '', '202cb962ac59075b964b07152d234b70', 'papers.co-ao09-space-galaxy-star-far-night-science-nature-blue-3840x2160 (1).jpg'),
(2, 'charlie@gmail.com', '', '202cb962ac59075b964b07152d234b70', ''),
(4, 'jag_cicci@hotmail.com', '', '202cb962ac59075b964b07152d234b70', ''),
(5, 'olle.j@gmail.com', '', '202cb962ac59075b964b07152d234b70', ''),
(6, 'jan@gmail.com', '', '202cb962ac59075b964b07152d234b70', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
