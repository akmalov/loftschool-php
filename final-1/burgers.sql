-- phpMyAdmin SQL Dump
-- version 4.7.3
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Ноя 28 2017 г., 22:11
-- Версия сервера: 5.7.19
-- Версия PHP: 7.1.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `burgers`
--

-- --------------------------------------------------------

--
-- Структура таблицы `orders`
--

CREATE TABLE `orders` (
  `id` tinyint(255) NOT NULL,
  `user_id` tinyint(255) NOT NULL,
  `address` text,
  `comment` char(255) DEFAULT NULL,
  `payment_method` char(5) DEFAULT NULL,
  `callback` tinyint(5) DEFAULT NULL,
  `updated_at` timestamp(6) NULL DEFAULT NULL,
  `created_at` timestamp(6) NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `address`, `comment`, `payment_method`, `callback`, `updated_at`, `created_at`) VALUES
(22, 17, 'улица Фастфудная, дом 55, корпус 1, кв. 555, этаж 1', '...', 'on', 1, '2017-11-28 17:53:54.000000', '2017-11-28 17:53:54.000000'),
(23, 18, 'улица , дом ', '', 'on', 1, '2017-11-28 19:08:49.000000', '2017-11-28 19:08:49.000000');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` smallint(255) NOT NULL,
  `email` char(255) NOT NULL,
  `name` char(255) NOT NULL,
  `phone` char(255) NOT NULL,
  `ip` char(255) DEFAULT NULL,
  `photo` char(255) DEFAULT NULL,
  `updated_at` timestamp(6) NULL DEFAULT NULL,
  `created_at` timestamp(6) NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `email`, `name`, `phone`, `ip`, `photo`, `updated_at`, `created_at`) VALUES
(17, 'misterburger@inbox.ru', 'mister burger', '+7 (555) 555 55 55', '127.0.0.1', '17.jpg', '2017-11-28 17:53:54.000000', '2017-11-28 17:53:54.000000'),
(18, 'misterburger@misterburger.ru', 'burger', '', '127.0.0.1', '18.jpg', '2017-11-28 19:08:49.000000', '2017-11-28 19:08:49.000000');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `orders`
--
ALTER TABLE `orders`
  MODIFY `id` tinyint(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` smallint(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
