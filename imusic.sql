-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Хост: 127.0.0.1
-- Время создания: Май 06 2017 г., 22:47
-- Версия сервера: 5.5.25
-- Версия PHP: 5.2.12

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- База данных: `imusic`
--

-- --------------------------------------------------------

--
-- Структура таблицы `comments`
--

CREATE TABLE IF NOT EXISTS `comments` (
  `id` int(19) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `comment` text NOT NULL,
  `post_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `page_flag` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=155 ;

--
-- Дамп данных таблицы `comments`
--

INSERT INTO `comments` (`id`, `name`, `comment`, `post_time`, `page_flag`) VALUES
(150, 'pavel', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. .', '2017-04-29 13:27:04', 'pavel'),
(151, 'pavel', ' Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.', '2017-04-29 13:30:19', 'pavel'),
(152, 'pavel', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip.\n', '2017-04-29 13:32:46', 'pavel'),
(153, 'pavel', 'hjfhjjf', '2017-05-03 05:31:36', 'pavel'),
(154, 'pavel', '123456', '2017-05-03 05:31:42', 'pavel');

-- --------------------------------------------------------

--
-- Структура таблицы `tracks`
--

CREATE TABLE IF NOT EXISTS `tracks` (
  `username` varchar(255) NOT NULL,
  `track_name` varchar(255) NOT NULL,
  `track_path` varchar(255) NOT NULL,
  `track_cover` varchar(255) NOT NULL,
  `approved` tinyint(1) NOT NULL,
  `date_upload` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `view` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `tracks`
--

INSERT INTO `tracks` (`username`, `track_name`, `track_path`, `track_cover`, `approved`, `date_upload`, `view`) VALUES
('pavel', 'cool.mp3', '../public/profile/pavel/cool.mp3', '', 1, '2017-04-29 08:28:51', 43),
('basta', 'game.mp3', '../public/profile/pavel/game.mp3', '', 1, '2017-04-29 08:28:51', 41),
('eminem', 'doctor.mp3', '../public/profile/pavel/doctor.mp3', '', 1, '2017-04-29 08:28:51', 3),
('bush', 'president.mp3', '../public/profile/pavel/game.mp3', '', 1, '2017-04-29 08:28:51', 41),
('Guf', 'gorod.mp3', '../public/profile/pavel/gorod.mp3', '', 1, '2017-04-29 08:28:51', 40),
('pavel', 'pesnya.mp3', '../public/profile/pavel/pesny.mp3', '', 0, '2017-04-29 08:28:51', 58),
('pavel', 'potap.mp3', '../public/profile/pavel/potap.mp3', '', 1, '2017-05-06 15:07:49', 3);

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(50) NOT NULL,
  `email_activator` varchar(255) NOT NULL,
  `active` tinyint(1) NOT NULL,
  `image` varchar(255) NOT NULL,
  `date_reg` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=38 ;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `email_activator`, `active`, `image`, `date_reg`) VALUES
(27, 'pavel', '9243031@gmail.com', '123', 'ffed5ec324df65a0867f37dbedd1f9fe', 1, '../public/profile/default.jpg', '2017-05-06 13:44:01'),
(28, 'Eminem', 'eminem@gmail.com', '123', '357ee62dd3eef9afa6c0e54c5b87692a', 1, '../public/profile/default.jpg', '2017-05-04 11:43:25'),
(29, 'Dre', 'dre@mail.ru', '123', 'afc12b59ab9b1b21bfc5b9832805824e', 1, '../public/profile/default.jpg', '2017-05-04 11:43:30'),
(30, 'bush', 'bush@gmail.com', '123', '70469507f18f18d8babf9e557871f143', 1, '../public/profile/default.jpg', '2017-05-04 11:43:35'),
(31, 'Guf', 'guf@mail.ru', '123', '05f457fe59552950edb66b8c2d3ab2f7', 1, '../public/profile/default.jpg', '2017-05-04 11:43:39'),
(32, 'basta', 'basta@gmail.com', '123', 'f927b3e0c325f2cab6b891b324c6f990', 1, '../public/profile/default.jpg', '2017-05-04 11:43:43'),
(33, 'stim', '123@mail.ru', '123', 'f17403bdea57842d4d93c1bce9acf57a', 0, '../public/profile/default.jpg', '2017-04-29 09:03:53'),
(34, 'onyx', '456@mail.ru', '123', '7094d1344ec3ffa6e52a09efafea386c', 0, '../public/profile/default.jpg', '2017-05-04 04:55:52'),
(35, 'admin', 'admin@imusic.com', '123', '', 1, '../public/profile/default.jpg', '2017-05-06 13:43:14'),
(36, 'rooot', 'root@mail.ru', '123', '5d3d79094cb26cb357fa7d8dbc6f8f0d', 0, '../public/profile/default.jpg', '2017-05-04 16:01:15'),
(37, 'kto', 'kto@mail.ru', '123', '1e1affe559eb699d6a22566059ce5121', 0, '../public/profile/default.jpg', '2017-05-06 10:14:24');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
