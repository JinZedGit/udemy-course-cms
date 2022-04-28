-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Време на генериране: 28 апр 2022 в 14:00
-- Версия на сървъра: 10.4.22-MariaDB
-- Версия на PHP: 7.3.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данни: `cms`
--

-- --------------------------------------------------------

--
-- Структура на таблица `categories`
--

CREATE TABLE `categories` (
  `cat_id` int(3) NOT NULL,
  `cat_title` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Схема на данните от таблица `categories`
--

INSERT INTO `categories` (`cat_id`, `cat_title`) VALUES
(1, 'Home'),
(2, 'Posts'),
(19, 'Queue\r\n'),
(20, 'Minecraft');

-- --------------------------------------------------------

--
-- Структура на таблица `comments`
--

CREATE TABLE `comments` (
  `comment_id` int(4) NOT NULL,
  `comment_post_id` int(4) NOT NULL,
  `comment_author` varchar(255) NOT NULL,
  `comment_email` varchar(255) NOT NULL,
  `comment_content` text NOT NULL,
  `comment_status` varchar(255) NOT NULL,
  `comment_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Схема на данните от таблица `comments`
--

INSERT INTO `comments` (`comment_id`, `comment_post_id`, `comment_author`, `comment_email`, `comment_content`, `comment_status`, `comment_date`) VALUES
(33, 1, 'Bobby', 'b.raski@unibit.bg', 'Alo, da, chuvame li se?', 'Unapproved', '2009-03-22'),
(34, 23, 'asdasdas', 'asdas@abv.bg', 'sdfsdfsdfsdf', 'unapproved', '2027-04-22'),
(35, 20, 'asdasdasd', 'asdasd@fsdfs.bg', 'asdasd', 'unapproved', '2028-04-22'),
(36, 20, 'dasdasd', 'asdasd@asdas.bg', '894d4as5d4s5d4asd6as\r\n', 'unapproved', '2028-04-22');

-- --------------------------------------------------------

--
-- Структура на таблица `posts`
--

CREATE TABLE `posts` (
  `post_id` int(3) NOT NULL,
  `post_category_id` int(3) NOT NULL,
  `post_title` varchar(255) NOT NULL,
  `post_author` varchar(255) NOT NULL,
  `post_date` date NOT NULL,
  `post_image` text NOT NULL,
  `post_content` text NOT NULL,
  `post_tags` varchar(255) NOT NULL,
  `post_comment_count` int(11) NOT NULL,
  `post_status` varchar(255) NOT NULL DEFAULT 'draft'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Схема на данните от таблица `posts`
--

INSERT INTO `posts` (`post_id`, `post_category_id`, `post_title`, `post_author`, `post_date`, `post_image`, `post_content`, `post_tags`, `post_comment_count`, `post_status`) VALUES
(1, 1, 'Iliyan Iliev', 'Jin', '2022-03-25', 'post1.jpeg', '<p>Please, send help! Ha <strong>trest</strong></p><p>WOW<span style=\"background-color: rgb(156, 0, 255);\">OWO</span>W<font color=\"#ff0000\">OW</font>OW. Testin <b>ahahahahhahasd</b></p>', 'iliyan', 18, 'Draft'),
(20, 19, 'The diary of a depressed boy.', 'Iliyan', '2022-03-25', '', '<h1>Hello, I am under the water.</h1><p>Hmmmmmmmm, what the fuck.</p><ul><li>Uno</li><li>Dos</li><li>Tres</li></ul>', 'help, weird', 2, 'Published'),
(21, 19, 'Test', 'Alo, da', '2022-04-27', '', '<p>QWsdfgvsdfd</p>', 'asassadasdada, asdasd,,dasdasdas', 0, 'Published'),
(24, 1, 'DASDASDASD', '0', '2022-04-28', '', '<p>ASDASDASDA</p>', 'DASDASDASD', 0, 'Published'),
(25, 1, 'DASDASDASD', 'IliyanIliyan', '2022-04-28', '', '<p>ASDASDASDA</p>', 'DASDASDASD', 0, 'Published'),
(26, 1, 'asdasdasd', 'I', '2022-04-28', '', '<p>asdas</p>', 'asdasd', 0, 'Published'),
(27, 1, 'please', 'I', '2022-04-28', '', '<p>asdasd</p>', 'asdasd', 0, 'Published'),
(28, 1, 'please', 'I', '2022-04-28', '', '<p>asdasd</p>', 'asdasd', 0, 'Published'),
(29, 1, 'please', 'I', '2022-04-28', '', '<p>asdasd</p>', 'asdasd', 0, 'Published'),
(30, 1, 'please', 'IliyanIliev', '2022-04-28', '', '<p>asdasd</p>', 'asdasd', 0, 'Published'),
(31, 1, 'Yaaas', 'IliyanIliev', '2022-04-28', '', '<p>dasdasda</p>', 'asasdas', 0, 'Published'),
(32, 1, 'Yaaas', 'Iliyan Iliev', '2022-04-28', '', '<p>dasdasda</p>', 'asasdas', 0, 'Published'),
(33, 1, 'Working', 'Iliyan Iliev', '2022-04-28', '', '<p>asdasdasd</p>', 'asdasdasd', 0, 'Published'),
(34, 1, 'Testing', 'i.iliev', '2022-04-28', '', '<p>asdasdasdasd</p>', 'help, weird', 0, 'Published'),
(35, 1, 'Post 2', 'i.iliev', '2022-04-28', '', '<p>asdasd</p>', 'asdasd', 0, 'Published');

-- --------------------------------------------------------

--
-- Структура на таблица `users`
--

CREATE TABLE `users` (
  `user_id` int(3) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `user_pass` varchar(255) NOT NULL,
  `user_firstname` varchar(255) NOT NULL,
  `user_lastname` varchar(255) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `user_image` text NOT NULL,
  `user_role` varchar(255) NOT NULL,
  `user_salt` varchar(255) NOT NULL DEFAULT '$2y$10$stoyankolevecarnasveta'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Схема на данните от таблица `users`
--

INSERT INTO `users` (`user_id`, `user_name`, `user_pass`, `user_firstname`, `user_lastname`, `user_email`, `user_image`, `user_role`, `user_salt`) VALUES
(1, 'Jin', '123456', 'Iliyan', 'Iliev', 'i.iliev@unibit.bg', '', 'Admin', '8489514985'),
(5, 'Kep', '1234', 'Miko', 'Rasikannas', 'miko.rasikannas@unibit.bg', '', 'User', '$2y$10$stoyankolevecarnasveta'),
(23, 'i.iliev', '123456', 'Iliyan', 'Iliev', 'i.iliev@unibit.bg', '', 'Admin', '$2y$10$stoyankolevecarnasveta');

--
-- Indexes for dumped tables
--

--
-- Индекси за таблица `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`cat_id`);

--
-- Индекси за таблица `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`comment_id`);

--
-- Индекси за таблица `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`post_id`);

--
-- Индекси за таблица `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `cat_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `comment_id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `post_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
