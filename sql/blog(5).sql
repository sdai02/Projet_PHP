-- phpMyAdmin SQL Dump
-- version 5.1.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 29, 2023 at 07:44 PM
-- Server version: 5.7.24
-- PHP Version: 8.0.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
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
-- Table structure for table `comment`
--

CREATE TABLE `comment` (
  `id_c` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `created_comment` datetime DEFAULT CURRENT_TIMESTAMP,
  `texte_comment` text,
  `id_tag_comment` varchar(50) NOT NULL,
  `id_post_comment` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `comment`
--

INSERT INTO `comment` (`id_c`, `id_user`, `created_comment`, `texte_comment`, `id_tag_comment`, `id_post_comment`) VALUES
(20, 4, '2023-05-29 21:26:34', 'ze', 'sport', 24);

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE `post` (
  `id_p` int(11) NOT NULL,
  `id_user_comment` int(11) NOT NULL,
  `created` datetime DEFAULT CURRENT_TIMESTAMP,
  `texte` text,
  `title` varchar(100) NOT NULL,
  `id_tag` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`id_p`, `id_user_comment`, `created`, `texte`, `title`, `id_tag`) VALUES
(24, 6, '2023-05-29 20:48:59', 'zefgzegf', 'azdz', 'sport');

-- --------------------------------------------------------

--
-- Table structure for table `tag`
--

CREATE TABLE `tag` (
  `id_tag` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tag`
--

INSERT INTO `tag` (`id_tag`) VALUES
('Culture'),
('jeux_video'),
('manga'),
('sport');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `first_name` varchar(255) DEFAULT NULL,
  `last_name` varchar(255) DEFAULT NULL,
  `date_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `is_admin` tinyint(1) NOT NULL,
  `password` varchar(30) NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `first_name`, `last_name`, `date_at`, `is_admin`, `password`, `email`) VALUES
(4, 'Pierre', 'admin', '2023-05-25 09:07:13', 1, 'admin', 'admin@admin.com'),
(5, '1', '1', '2023-05-29 15:49:06', 0, '1', '123@123.com'),
(6, '1', '1', '2023-05-29 16:39:53', 0, '1', '1'),
(7, '12', '12', '2023-05-29 18:49:23', 0, '12', '12');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`id_c`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_tag` (`id_tag_comment`),
  ADD KEY `id_post` (`id_post_comment`);

--
-- Indexes for table `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`id_p`),
  ADD KEY `id_user` (`id_user_comment`),
  ADD KEY `id_tag` (`id_tag`);

--
-- Indexes for table `tag`
--
ALTER TABLE `tag`
  ADD PRIMARY KEY (`id_tag`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comment`
--
ALTER TABLE `comment`
  MODIFY `id_c` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `post`
--
ALTER TABLE `post`
  MODIFY `id_p` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `comment`
--
ALTER TABLE `comment`
  ADD CONSTRAINT `comment_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `comment_ibfk_3` FOREIGN KEY (`id_tag_comment`) REFERENCES `tag` (`id_tag`),
  ADD CONSTRAINT `comment_ibfk_4` FOREIGN KEY (`id_post_comment`) REFERENCES `post` (`id_p`);

--
-- Constraints for table `post`
--
ALTER TABLE `post`
  ADD CONSTRAINT `post_ibfk_1` FOREIGN KEY (`id_user_comment`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `post_ibfk_2` FOREIGN KEY (`id_tag`) REFERENCES `tag` (`id_tag`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
