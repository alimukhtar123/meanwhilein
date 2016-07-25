-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Хост: localhost
-- Время создания: Июл 24 2016 г., 18:23
-- Версия сервера: 10.1.13-MariaDB
-- Версия PHP: 5.6.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `csc343`
--

-- --------------------------------------------------------

--
-- Структура таблицы `available_amenities`
--

CREATE TABLE `available_amenities` (
  `id` int(10) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Дамп данных таблицы `available_amenities`
--

INSERT INTO `available_amenities` (`id`, `name`) VALUES
(8, 'Shampoo'),
(9, 'Wifi'),
(11, 'Closet/drawers '),
(12, 'TV'),
(13, 'Heat'),
(14, 'Air conditioning '),
(15, 'Breakfast, coffee, tea '),
(16, 'Desk/workspace '),
(17, 'Fireplace'),
(18, 'Iron'),
(19, 'Hair dryer '),
(20, 'Pets in the house '),
(21, 'Smoke detector'),
(22, 'Carbon monoxide detector'),
(23, 'First aid kit '),
(24, 'Safety card'),
(25, 'Fire extinguisher '),
(26, 'Lock on bedroom door ');

-- --------------------------------------------------------

--
-- Структура таблицы `brone`
--

CREATE TABLE `brone` (
  `id` int(10) NOT NULL,
  `day_in` date NOT NULL,
  `day_out` date NOT NULL,
  `brone_status` tinyint(1) NOT NULL DEFAULT '1',
  `broner_id` int(10) NOT NULL,
  `listing_id` int(10) NOT NULL,
  `payment_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Дамп данных таблицы `brone`
--

INSERT INTO `brone` (`id`, `day_in`, `day_out`, `brone_status`, `broner_id`, `listing_id`, `payment_id`) VALUES
(1, '1131-11-11', '1132-11-11', 1, 7, 8, 0),
(2, '1131-11-11', '1132-11-11', 1, 7, 8, 2),
(3, '1131-11-11', '1132-11-11', 1, 7, 8, 3),
(4, '1131-11-11', '1132-11-11', 1, 7, 8, 4),
(5, '1131-11-11', '1132-11-11', 1, 7, 8, 5),
(6, '2015-10-10', '2016-11-11', 1, 7, 10, 6),
(7, '2010-10-10', '2011-11-11', 1, 7, 11, 7),
(8, '2010-10-10', '2016-11-11', 1, 7, 13, 8),
(9, '1111-11-12', '1111-12-12', 1, 7, 15, 9),
(10, '2016-10-10', '2011-11-11', 1, 11, 17, 10),
(11, '2010-10-10', '2016-12-12', 1, 10, 19, 11);

-- --------------------------------------------------------

--
-- Структура таблицы `listing`
--

CREATE TABLE `listing` (
  `id` int(10) NOT NULL,
  `type` enum('apartment','room','house') NOT NULL,
  `location_id` int(10) NOT NULL,
  `seller_id` int(10) NOT NULL,
  `date_from` date NOT NULL,
  `date_to` date NOT NULL,
  `price` decimal(10,0) NOT NULL,
  `active_list` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Дамп данных таблицы `listing`
--

INSERT INTO `listing` (`id`, `type`, `location_id`, `seller_id`, `date_from`, `date_to`, `price`, `active_list`) VALUES
(1, 'apartment', 54, 7, '0000-00-00', '0123-03-12', '111', 1),
(2, 'room', 56, 7, '2015-11-11', '2016-12-12', '333', 0),
(3, 'house', 57, 7, '1111-11-11', '1211-12-11', '11111', 0),
(4, 'apartment', 56, 7, '1111-11-11', '1112-11-11', '50', 0),
(5, 'apartment', 56, 7, '1231-03-12', '0001-03-12', '123', 0),
(6, 'apartment', 60, 7, '1111-11-11', '1113-12-12', '1111', 0),
(7, 'room', 60, 7, '1111-11-11', '1113-12-12', '1000', 0),
(8, 'apartment', 60, 7, '1131-11-11', '1132-11-11', '100000', 0),
(9, 'apartment', 56, 7, '0000-00-00', '0000-00-00', '100', 0),
(10, 'room', 60, 7, '2015-10-10', '2016-11-11', '1000', 0),
(11, 'apartment', 56, 7, '2010-10-10', '2011-11-11', '10000', 0),
(12, 'room', 60, 7, '2015-10-12', '0000-00-00', '1000', 0),
(13, 'apartment', 61, 7, '2010-10-10', '2016-11-11', '10000', 1),
(14, 'apartment', 60, 7, '2015-11-11', '2016-12-12', '123123', 1),
(15, 'house', 61, 7, '1111-11-12', '1111-12-12', '111', 1),
(16, 'apartment', 66, 12, '2016-10-10', '2016-11-11', '1231', 1),
(17, 'apartment', 67, 11, '2016-10-10', '2011-11-11', '122', 1),
(18, 'room', 68, 11, '2016-10-10', '2016-12-12', '200', 1),
(19, 'house', 69, 10, '2010-10-10', '2016-12-12', '111', 1),
(20, 'room', 70, 10, '0000-00-00', '0000-00-00', '99', 1),
(21, 'house', 71, 12, '2015-11-11', '2016-11-11', '1000', 1),
(22, 'room', 72, 12, '2010-10-10', '2011-11-11', '1000', 1);

-- --------------------------------------------------------

--
-- Структура таблицы `listing_amenities`
--

CREATE TABLE `listing_amenities` (
  `amenity_id` int(10) NOT NULL,
  `listing_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Дамп данных таблицы `listing_amenities`
--

INSERT INTO `listing_amenities` (`amenity_id`, `listing_id`) VALUES
(1, 0),
(1, 2),
(1, 3),
(2, 0),
(2, 4),
(2, 5),
(3, 0),
(3, 2),
(3, 3),
(3, 4),
(4, 0),
(4, 2),
(4, 4),
(5, 0),
(5, 3),
(5, 5),
(8, 8),
(8, 12),
(8, 22),
(9, 8),
(9, 13),
(9, 20),
(9, 21),
(11, 8),
(11, 11),
(11, 12),
(11, 17),
(11, 18),
(12, 7),
(12, 8),
(12, 11),
(12, 13),
(12, 15),
(12, 16),
(12, 18),
(12, 21),
(12, 22),
(13, 8),
(13, 11),
(13, 12),
(13, 16),
(13, 19),
(13, 20),
(14, 8),
(14, 15),
(14, 17),
(14, 18),
(14, 21),
(15, 13),
(16, 11),
(16, 14),
(16, 17),
(16, 19),
(17, 11),
(17, 14),
(17, 16),
(17, 20),
(18, 13),
(18, 16),
(18, 17),
(19, 14),
(19, 20),
(20, 19),
(22, 17),
(22, 19),
(23, 9),
(23, 17),
(23, 20),
(24, 9);

-- --------------------------------------------------------

--
-- Структура таблицы `location`
--

CREATE TABLE `location` (
  `id` int(10) NOT NULL,
  `street_address` varchar(255) NOT NULL,
  `zip_code` varchar(60) NOT NULL,
  `city` varchar(255) NOT NULL,
  `province` varchar(255) NOT NULL,
  `country` varchar(255) NOT NULL,
  `longitude` float(10,6) NOT NULL,
  `latitude` float(10,6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Дамп данных таблицы `location`
--

INSERT INTO `location` (`id`, `street_address`, `zip_code`, `city`, `province`, `country`, `longitude`, `latitude`) VALUES
(56, '2386 cashmere', 'l5l 6a2', 'Missisauga', 'Ontario', 'Canad', 22.222200, 11.111100),
(57, '2387 cashmere', 'l5l 6a2', 'Missisauga', 'Ontario', 'Canad', 33.333302, 22.222200),
(58, '2387 cashmere', 'l5l 6a2', 'Missisauga', 'Ontario', 'Canad', 33.333302, 22.222200),
(59, '123', 'l5l 2m6', '444', 'on', 'canada', 22.222300, 11.111100),
(60, '4168', 'l5l 6a3', 'toronto', 'ontario', 'canada', 22.222200, 11.111100),
(61, '224', 'l5l l5l', 'toronto', 'ontario', 'canada', 11.111100, 11.111100),
(62, '3353 ', 'l5l l51', 'toronto', 'ontario', 'Canada', 22.222200, 22.222200),
(63, '1122', 'l5l 6a4', 'paris', 'ontario', 'france', 14.444400, 12.222200),
(64, 'kele street', 'l5l 6aa', 'New York', 'New York', 'USA', 11.111100, 11.111100),
(65, '1234', 'l5l 222', 'Moscow', 'Moscow ', 'Russia', 55.555500, 66.666603),
(66, '224', '111 111', 'moscow', 'moscowal', 'russia', 55.555401, 44.444401),
(67, 'kele', '123 123', 'los angeles', 'la', 'usa', 11.111100, 11.111100),
(68, '123', '123', 'moscow', 'moscowal', 'moscow', 11.111100, 11.111100),
(69, '12333', '333', 'moscow', 'moscowal', 'russia', 44.444401, 44.444401),
(70, 'kola', '122', 'paris', 'france', 'france', 22.222000, 22.222200),
(71, '111', '1111', 'moscow', 'moscow', 'russia', 22.222200, 11.111100),
(72, '1234', '123', 'toronto', 'ontario', 'canada', 22.222200, 22.222200);

-- --------------------------------------------------------

--
-- Структура таблицы `message`
--

CREATE TABLE `message` (
  `id` int(10) NOT NULL,
  `id_user_to` int(10) NOT NULL,
  `id_user_from` int(10) NOT NULL,
  `dt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `message` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Структура таблицы `payment`
--

CREATE TABLE `payment` (
  `id` int(10) NOT NULL,
  `cardholder_name` varchar(255) NOT NULL,
  `card_number` char(16) NOT NULL,
  `cvc_number` char(3) NOT NULL,
  `card_type` enum('visa','mastercard','maestro','americanexpress') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Дамп данных таблицы `payment`
--

INSERT INTO `payment` (`id`, `cardholder_name`, `card_number`, `cvc_number`, `card_type`) VALUES
(1, 'ali', '121212121212', '222', 'visa'),
(2, 'ali', '12312312312', '123', 'visa'),
(3, 'ali', '123123123123123', '223', 'visa'),
(4, '123123123123', 'ali', '123', 'mastercard'),
(5, '123132', 'ali', '123', 'maestro'),
(6, 'ali', '12312312312', '456', 'mastercard'),
(7, 'ali', '12312312312312', '123', 'visa'),
(8, 'ali', '123123123', '123', 'maestro'),
(9, 'ali', '1231231', '111', 'mastercard'),
(10, 'Ali', '12345612', '122', 'maestro'),
(11, 'rus', '1231231313', '123', 'maestro');

-- --------------------------------------------------------

--
-- Структура таблицы `ranking_house`
--

CREATE TABLE `ranking_house` (
  `id` int(10) NOT NULL,
  `user_from_id` int(10) NOT NULL,
  `house_id` int(10) NOT NULL,
  `star_number` int(1) NOT NULL,
  `comment` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Дамп данных таблицы `ranking_house`
--

INSERT INTO `ranking_house` (`id`, `user_from_id`, `house_id`, `star_number`, `comment`) VALUES
(1, 7, 60, 5, '&#13;&#10;       this house is nice'),
(2, 7, 60, 1, '&#13;&#10;         asdasd'),
(3, 7, 60, 1, '&#13;&#10;         asdasd'),
(4, 7, 60, 1, '&#13;&#10;         asdasdasd');

-- --------------------------------------------------------

--
-- Структура таблицы `rating`
--

CREATE TABLE `rating` (
  `id` int(10) NOT NULL,
  `user_to_id` int(10) NOT NULL,
  `user_from_id` int(10) NOT NULL,
  `type_ranking` enum('renter','rentee') NOT NULL,
  `star_number` int(1) NOT NULL,
  `comment` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Дамп данных таблицы `rating`
--

INSERT INTO `rating` (`id`, `user_to_id`, `user_from_id`, `type_ranking`, `star_number`, `comment`) VALUES
(1, 7, 7, '', 0, '4'),
(2, 7, 7, 'rentee', 3, 'asdasdasdasd&#13;&#10;         '),
(3, 7, 7, 'rentee', 1, '&#13;&#10;         asdasdasdasdasdasd'),
(4, 7, 7, 'rentee', 4, '&#13;&#10;         sdfsdf'),
(5, 7, 7, 'renter', 1, '&#13;&#10;         sdfsdfdsf'),
(6, 7, 7, 'rentee', 4, 'sdfsdf&#13;&#10;         '),
(7, 7, 7, 'renter', 3, '&#13;&#10;         fsdf'),
(8, 7, 7, 'rentee', 4, 'sdfsdfsdf&#13;&#10;         '),
(9, 7, 7, 'rentee', 4, 'sdfsdfsdf&#13;&#10;         '),
(10, 7, 7, 'renter', 4, '&#13;&#10;         dsfsdd'),
(11, 7, 7, 'renter', 4, '&#13;&#10;         dsfsdd'),
(12, 7, 7, 'renter', 4, '&#13;&#10;         sdfsfsf');

-- --------------------------------------------------------

--
-- Структура таблицы `rentedproperties`
--

CREATE TABLE `rentedproperties` (
  `user_id` int(10) NOT NULL,
  `location_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Дамп данных таблицы `rentedproperties`
--

INSERT INTO `rentedproperties` (`user_id`, `location_id`) VALUES
(7, 56),
(7, 57),
(7, 58),
(7, 59),
(7, 60),
(7, 61),
(10, 69),
(10, 70),
(11, 67),
(11, 68),
(12, 66),
(12, 71),
(12, 72);

-- --------------------------------------------------------

--
-- Структура таблицы `user`
--

CREATE TABLE `user` (
  `id` int(10) NOT NULL,
  `login` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `address_id` int(10) NOT NULL,
  `payment_id` int(10) NOT NULL,
  `password_hash` varchar(255) NOT NULL,
  `date_birth` date NOT NULL,
  `sin` varchar(255) NOT NULL,
  `occupation` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `mail` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Дамп данных таблицы `user`
--

INSERT INTO `user` (`id`, `login`, `name`, `lastname`, `address_id`, `payment_id`, `password_hash`, `date_birth`, `sin`, `occupation`, `status`, `mail`) VALUES
(6, 'john', 'ali', 'aliyev', 19, 0, '$2y$12$VPVSLEN1tQwN1Y9v.hO9WeuTKRm.68w7g28bd8USr0fbVthoCOgra', '1994-01-11', '12312312', '1231', 1, '12313'),
(7, 'ali123', 'aliu', 'ali', 29, 0, '$2y$12$ufPPGfbYG4vERoEViiOoCee37Y2hbdQz9mnB0ZAFSXsJMLTIjdgYW', '0000-00-00', '21123', '1231', 1, 'ma2@ma'),
(8, 'Julia', 'Julia', 'Violet', 52, 0, '$2y$12$uO55SZRnuVeO9HszaRiUz.45yzcfkKvjdOaivZb6871rm9Ng/Ulga', '0000-00-00', '123123123', 'Studet', 1, 'juli123a@hotmail.com'),
(9, 'ali', 'Ali', 'Aliyev', 62, 0, '$2y$12$f7Dp5UTLPnHvvfoSxbyz7enxdSbP67VYAL1V3Oo/ilJqUEqE1w8u2', '0000-00-00', '12345678', 'student', 1, 'ali@mail.ru'),
(10, 'samantha', 'samantha', 'salo', 63, 0, '$2y$12$JkY4InTnIzQ77s5/jga77OsrajY2qo0SMO9oCPO/4JdyGwq1wxTW2', '1993-11-11', '123456', 'student', 1, 'ali@mail.ru'),
(11, 'mat', 'john', 'smith', 64, 0, '$2y$12$CJGojaWM74SDVRZZfpEXIez5nlpNAA0jTYJmnXBZ9xyssP0isRO3u', '1990-11-11', '123455555', 'student', 1, 'all@mail.ru'),
(12, 'kolya', 'nikolai', 'nikolayev', 65, 0, '$2y$12$vIxExKVPUuW7FFH6/nCJPu1K/3cNOAG/TAZ4xQu/64kZfuyBrG02O', '1990-11-11', '123123123', 'student', 1, 'aaa@mail.ru');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `available_amenities`
--
ALTER TABLE `available_amenities`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `brone`
--
ALTER TABLE `brone`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `listing`
--
ALTER TABLE `listing`
  ADD PRIMARY KEY (`id`),
  ADD KEY `date_from` (`date_from`),
  ADD KEY `date_to` (`date_to`);

--
-- Индексы таблицы `listing_amenities`
--
ALTER TABLE `listing_amenities`
  ADD PRIMARY KEY (`amenity_id`,`listing_id`);

--
-- Индексы таблицы `location`
--
ALTER TABLE `location`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `ranking_house`
--
ALTER TABLE `ranking_house`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `rating`
--
ALTER TABLE `rating`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `rentedproperties`
--
ALTER TABLE `rentedproperties`
  ADD PRIMARY KEY (`user_id`,`location_id`);

--
-- Индексы таблицы `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `login` (`login`),
  ADD KEY `name` (`name`),
  ADD KEY `lastname` (`lastname`),
  ADD KEY `address_id` (`address_id`),
  ADD KEY `payment_id` (`payment_id`),
  ADD KEY `date_birth` (`date_birth`),
  ADD KEY `status` (`status`),
  ADD KEY `mail` (`mail`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `available_amenities`
--
ALTER TABLE `available_amenities`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
--
-- AUTO_INCREMENT для таблицы `brone`
--
ALTER TABLE `brone`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT для таблицы `listing`
--
ALTER TABLE `listing`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT для таблицы `location`
--
ALTER TABLE `location`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;
--
-- AUTO_INCREMENT для таблицы `message`
--
ALTER TABLE `message`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблицы `payment`
--
ALTER TABLE `payment`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT для таблицы `ranking_house`
--
ALTER TABLE `ranking_house`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT для таблицы `rating`
--
ALTER TABLE `rating`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT для таблицы `user`
--
ALTER TABLE `user`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
