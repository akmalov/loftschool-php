-- phpMyAdmin SQL Dump
-- version 4.7.3
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Дек 07 2017 г., 23:10
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
-- База данных: `shop`
--

-- --------------------------------------------------------

--
-- Структура таблицы `categories`
--

CREATE TABLE `categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `categories`
--

INSERT INTO `categories` (`id`, `name`, `description`) VALUES
(1, 'Stokes-Treutel', 'Odio eum voluptatem repellat voluptas praesentium veritatis consequuntur. Nostrum voluptates quod tempora libero eveniet. Sunt et enim fugit ut. Dolor dignissimos quos qui doloribus.'),
(2, 'Lindgren-Ullrich', 'Itaque voluptatem beatae amet et et et. Fuga distinctio labore et ut. Doloremque voluptatem non animi dolorem. Ut aut est enim neque. Vitae eaque voluptas laudantium et.'),
(3, 'Kilback, Willms and Doyle', 'Ex aut enim dicta quam eius. Est commodi voluptatem iure excepturi id facilis. Vitae ut alias sed accusantium. Vero consectetur eius voluptatem nulla ex.'),
(4, 'Hermann, Tromp and Cole', 'Dicta qui est omnis eum excepturi explicabo dolorem. Omnis qui harum asperiores magnam quod id quia. Eum dicta ratione consequatur.'),
(5, 'Ankunding LLC', 'Commodi numquam asperiores eos. Tenetur quia eum repellat sed. Porro et saepe est commodi.'),
(6, 'Prosacco, Schoen and Heidenreich', 'Quo eos ea impedit commodi. Unde doloribus voluptatibus non voluptatibus sapiente qui laboriosam.'),
(7, 'Romaguera, Hessel and Paucek', 'Ex quia aliquam quisquam. Labore amet voluptatem suscipit tempore ut. Molestiae voluptatibus temporibus minus.'),
(8, 'Johns and Sons', 'Consequatur quibusdam saepe necessitatibus. Dicta mollitia est omnis. Similique voluptatem minima ut asperiores aspernatur aperiam quod tempora. Nisi aut vel consequatur perferendis culpa.'),
(9, 'Schuppe-Rosenbaum', 'Voluptate a quam delectus soluta ipsum et ipsam. Rerum aut ab minus error omnis.'),
(10, 'Mertz-Kub', 'Ipsum praesentium illum quaerat asperiores. Voluptatem aliquid deleniti quis veniam iusto corporis nostrum. Sed quis omnis qui ad qui aut. Aut dicta omnis velit ea pariatur.');

-- --------------------------------------------------------

--
-- Структура таблицы `goods`
--

CREATE TABLE `goods` (
  `id` int(10) UNSIGNED NOT NULL,
  `category_id` smallint(6) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `price` double(8,2) NOT NULL,
  `photo` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `goods`
--

INSERT INTO `goods` (`id`, `category_id`, `name`, `price`, `photo`, `description`) VALUES
(1, 1, 'tt', 666.00, 'photo\\a0a8859ecb9982335ff04da561651989.jpg', 'Test'),
(2, 1, 'Lockman-Thiel', 65.00, 'photo\\34c788bb798ac0167bbebb8d5fdc5b53.jpg', 'Accusantium iste non non qui ut in sed. Consequatur qui est rem dolor. Consequuntur cum eum sequi sint et molestias similique eum. Vel eius odit quam non.'),
(3, 3, 'Cassin LLC', 75.00, 'photo\\09dc84ec8609cf77f60a0a292cc74c47.jpg', 'Officiis adipisci vel sint magnam. Et qui aperiam quasi sequi error fugit numquam nihil. Voluptatem est eos eos fugit voluptas.'),
(4, 4, 'Mohr-Dibbert', 62.00, 'photo\\3a3ff6911ae98737329fd077c88795fb.jpg', 'Ut et quia id. Ea odio non ad quia quos eius voluptatem. Rerum quis reprehenderit rerum tempora itaque excepturi enim. Sed ut non ad distinctio quia harum aliquam. Aut ut dolore distinctio earum.'),
(5, 1, 'Rau-Dickens', 49.00, 'photo\\9c20825afa0356562a87676e8e4b26f1.jpg', 'Omnis labore omnis cumque aut aliquid. A nobis atque inventore optio. Ut aspernatur qui perferendis iusto sed aut quia.'),
(6, 5, 'Harvey-Hoeger', 57.00, 'photo\\e023e64c6ec2cf2e2ab1c94aadeb7672.jpg', 'In minima omnis dignissimos. Debitis quia veniam et itaque ipsa aut. Hic consequatur repellat quia enim aut laboriosam nemo. Consequatur sunt ea non. Sed ipsa ut maxime sit tenetur.'),
(7, 2, 'Predovic, Zulauf and Heller', 41.00, 'photo\\bde9bb6b3cb4dce3fd3bdfbc7188e0d9.jpg', 'Est odit dolores ratione saepe fuga mollitia. Odio libero nemo neque sit tempore doloremque. Quod excepturi consequatur iste adipisci est. Facere quam velit qui atque et aut dolorum.'),
(8, 2, 'Morar, Huel and Carter', 49.00, 'photo\\bfdb42c5098bba90ffee1c99c097e287.jpg', 'Et earum voluptatum dignissimos deleniti voluptatibus. Adipisci quo veniam sit temporibus ea. Eos nisi similique aut qui mollitia. Sunt odit aut fugiat quam ut.'),
(9, 5, 'Schamberger Group', 20.00, 'photo\\06f4ab951cafa9dcf782cb388a0a537a.jpg', 'Distinctio dolorem delectus nam enim quisquam quam. Repellendus voluptas debitis explicabo voluptatum officia quis consectetur. Qui enim deserunt maiores corrupti minus iusto facilis.'),
(10, 4, 'Lubowitz, McKenzie and Tromp', 15.00, 'photo\\5f8fc15df3a37234e998517fd743208c.jpg', 'Iure quas veniam praesentium voluptatem id ipsam harum. Qui quasi error debitis quod blanditiis. Eos facilis necessitatibus velit.'),
(11, 1, 'Botsford-Stamm', 70.00, 'photo\\46265cd92cd7dbbd0eae534c70326549.jpg', 'Earum perspiciatis fugiat at sequi nihil. Consequuntur numquam ipsum quia magni. Corrupti dolorum neque debitis fugit quasi. Itaque necessitatibus impedit voluptatem facilis consequuntur est.'),
(12, 1, 'Greenholt-Russel', 50.00, 'photo\\b9a935978d7a7abbeb92168829ed5207.jpg', 'Officiis dolore distinctio asperiores iure ut aliquam. Officia est est dignissimos id. Corporis rem enim vel incidunt. Repellat magni quo nulla. Dolorem excepturi similique porro ut.'),
(13, 1, 'Kunde-Predovic', 62.00, 'photo\\4bd19806eb3e49806701c3cb61c8a30d.jpg', 'Illum id ducimus in. Natus incidunt ipsa aspernatur ad et. Qui officia laudantium praesentium sequi sed placeat non et.'),
(14, 5, 'Leannon-Mraz', 28.00, 'photo\\68370d3c010db9f0c38f359e7864a1b0.jpg', 'Dicta a harum reprehenderit. Voluptas harum ab necessitatibus rerum aut ut. Non natus eos voluptatibus voluptas suscipit voluptatem temporibus.'),
(15, 4, 'Veum LLC', 70.00, 'photo\\ebf7db2194a9a1757a8ca6c339c200ce.jpg', 'Quos enim sequi quia veniam molestiae. Quam ipsum doloremque dolores quas a. Corrupti dolores asperiores soluta doloribus aspernatur fuga eaque.'),
(16, 1, 'Schowalter and Sons', 63.00, 'photo\\6d28dbd8171c5425a262f377ec9a5f04.jpg', 'Iure laborum est qui aut fugit. Tenetur blanditiis ipsum voluptates nostrum omnis numquam quia. Nihil beatae praesentium rerum et soluta. Incidunt nihil earum non.'),
(17, 1, 'Klocko, Streich and Cremin', 76.00, 'photo\\20395b83779eacb9618cb3295c382b68.jpg', 'Quod voluptas qui et animi. Minus laboriosam quibusdam ad fugit inventore sed ab. Magnam non quo nemo facere quas fugiat et. Labore similique porro dolores molestias adipisci reiciendis.'),
(18, 1, 'Hills PLC', 61.00, 'photo\\d6f28d0e2e750c5df2f1b5b7741d7011.jpg', 'Et iure repellat ut sit aut sapiente. Corporis rem quia alias excepturi quos suscipit et non. Temporibus occaecati tempore porro ut est.'),
(19, 3, 'Larson LLC', 34.00, 'photo\\8417fb8e9a6d6d0b0864c461b3a8d90d.jpg', 'Et rerum et qui sed voluptatem. Voluptatem quisquam fugit autem non repellat. Ex et maxime sint est. Quam modi commodi a corrupti incidunt. Voluptatum tempora est aperiam rerum qui distinctio.'),
(20, 4, 'Jakubowski-Quigley', 100.00, 'photo\\16cbc56f59fa48647a7070af5faa9f62.jpg', 'Dicta voluptates quaerat porro quidem dolorem. Molestiae nobis cumque recusandae sunt nulla. Voluptates est quos nihil molestiae.');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `goods`
--
ALTER TABLE `goods`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT для таблицы `goods`
--
ALTER TABLE `goods`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
