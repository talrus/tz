-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Хост: 127.0.0.1
-- Время создания: Ноя 16 2016 г., 22:58
-- Версия сервера: 10.1.16-MariaDB
-- Версия PHP: 5.6.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `myblog`
--

-- --------------------------------------------------------

--
-- Структура таблицы `posts`
--

CREATE TABLE `posts` (
  `postID` int(11) NOT NULL,
  `postTitle` varchar(255) DEFAULT NULL,
  `postDesc` text,
  `postCont` text,
  `image` blob,
  `postDate` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `posts`
--

INSERT INTO `posts` (`postID`, `postTitle`, `postDesc`, `postCont`, `image`, `postDate`) VALUES
(42, '123', '321', '<p>21312313</p>\r\n', 0x3432333036332e706e67, '2016-11-16 22:55:25'),
(43, '1111', '11111', '<p>111321313</p>\r\n', 0x3230313735372e6a7067, '2016-11-16 23:00:02'),
(44, 'asdsa', 'dsa', '<p>sdadasfhgbwe</p>\r\n', 0x31363534382e6a7067, '2016-11-16 23:00:17'),
(45, 'sfafvqwfqa', 'safasfqa', '<p>fasfasfsaf</p>\r\n', 0x3835343630382e6a7067, '2016-11-16 23:00:27'),
(46, 'dfnbswbnr', 'bfdgbsdg', '<p>asgfagsag</p>\r\n', 0x3430343238332e6a7067, '2016-11-16 23:00:35'),
(47, 'sadsafgaws', 'asgsgags', '<p>asgsgagsasg</p>\r\n', 0x3139313837392e6a7067, '2016-11-16 23:00:44'),
(48, 'sfaasf', 'fsafasf', '<p>fasfafa</p>\r\n', 0x3530303830352e6a7067, '2016-11-16 23:00:53'),
(49, 'SAGVassgag', 'asgasgasg', '<p>asgasgas</p>\r\n', 0x343734392e6a7067, '2016-11-16 23:01:00'),
(50, 'fasfasfasf', 'fasfasf', '<p>fasfasfas</p>\r\n', 0x3733393237352e6a7067, '2016-11-16 23:01:16'),
(51, 'fasfasf', 'fxzczxvcxzv', '<p>asfasfasf</p>\r\n', 0x3535343637362e6a7067, '2016-11-16 23:01:25'),
(52, 'sdgvsgdsgsd', 'gdsgsdgsd', '<p>gsdgsdgsdg</p>\r\n', 0x3634373530392e6a7067, '2016-11-16 23:01:36'),
(53, 'fszfafasfasf', 'fvasfasfasf', '<p>fawsfasfasfasfasf</p>\r\n', 0x3332333634342e6a7067, '2016-11-16 23:01:50'),
(54, 'afsfasfasf', 'fasfasf', '<p>fasfvavgas</p>\r\n', 0x3539363232392e6a7067, '2016-11-16 23:02:01'),
(55, 'xzczczczx', 'czxczczxc', '<p>zxcxzczxc</p>\r\n', 0x3735393432372e706e67, '2016-11-16 23:02:09'),
(56, 'adsasdzxczx', 'swdasdzxcz', '<p>czxcasfasf</p>\r\n', 0x3535303331362e6a7067, '2016-11-16 23:02:18'),
(57, 'xzcxzcasf', 'safszxcxz', '<p>safasfzxc</p>\r\n', 0x33313832322e6a7067, '2016-11-16 23:02:26'),
(58, 'dasdsad', 'xzczca', '<p>sfdsadasdas</p>\r\n', 0x3831383035342e6a7067, '2016-11-16 23:02:35'),
(59, 'xczcxzcsdfasd', 'Desdzxcxzc', '<p>safdasdasdzX</p>\r\n', 0x3737343931342e6a7067, '2016-11-16 23:02:44'),
(60, 'dasdzxczx', 'asdasdas', '<p>xzczxczxcz</p>\r\n', 0x3830323338332e6a7067, '2016-11-16 23:02:52'),
(61, 'xczxczcsfd', 'xzcasfasf', '<p>xzczxcasfas</p>\r\n', 0x3834363331352e6a7067, '2016-11-16 23:03:01');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `email` varchar(40) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `role`) VALUES
(7, 'TaL', 'Tal@mail.com', '$2y$10$ljLCP2d0BguoVXFFemgCfuVm1LWtNP5lFvhcqtrwPxeHynaU3/I5O', 0),
(8, '123', '123@gas.com', '$2y$10$tz4F/qSlGSxfK0gK0KH4OeMt//kGGsa4ijijyFd2zBV20JjruyZNG', 1),
(9, '1234', '1234@gas.com', '$2y$10$/LKegPm6j6bnqcR1vQ8Pk.85j4wkBBkb95CZvqABiAPxM2mN3vEQW', 1);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`postID`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `posts`
--
ALTER TABLE `posts`
  MODIFY `postID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;
--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
