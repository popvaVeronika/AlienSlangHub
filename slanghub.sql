-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Время создания: Янв 30 2025 г., 14:04
-- Версия сервера: 10.4.32-MariaDB
-- Версия PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `slanghub`
--

-- --------------------------------------------------------

--
-- Структура таблицы `admins`
--

CREATE TABLE `admins` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `email` text NOT NULL,
  `pass` text NOT NULL,
  `readme` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `pass`, `readme`) VALUES
(0, 'imperor_skufius_3000', 'oo9041923832@gmail.com', 'adminadmin', 'readme.txt');

-- --------------------------------------------------------

--
-- Структура таблицы `messages`
--

CREATE TABLE `messages` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `comment` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `messages`
--

INSERT INTO `messages` (`id`, `name`, `email`, `comment`, `created_at`) VALUES
(244, 'игорь', 's@kdkd', 'осуждаю', '2025-01-12 19:04:12'),
(254, 'славлвав', 'oo9041923832@gmail.com', 'сблслсл', '2025-01-12 19:37:48'),
(289, 'dsfdfs', 'ddd@llalala', 'blablabla', '2025-01-17 21:43:19'),
(290, 'ddssdd', 'dssdds@ldldlld', 'dd', '2025-01-17 21:45:08'),
(291, 'ddsdd', 'aaa@aaaaaaa', '.f;f;f', '2025-01-17 21:47:00'),
(292, 'dsds', 'jfdjfjfj@kfkfkf', 'kfkfkfkfk', '2025-01-22 14:10:55'),
(293, 'оаооаоа', 'sa@gmfmf', 'алваььавьлдваав', '2025-01-22 14:33:37'),
(294, 'dsds', 's@kdkd', 'лалаллалала блабла', '2025-01-22 16:14:23');

-- --------------------------------------------------------

--
-- Структура таблицы `word`
--

CREATE TABLE `word` (
  `id` int(11) NOT NULL,
  `russian_word` varchar(255) NOT NULL,
  `word1` varchar(255) NOT NULL,
  `txt2` varchar(255) NOT NULL,
  `txt3` varchar(255) NOT NULL,
  `keywords` text DEFAULT NULL,
  `title` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `word`
--

INSERT INTO `word` (`id`, `russian_word`, `word1`, `txt2`, `txt3`, `keywords`, `title`) VALUES
(3, 'рофл', 'rofl', 'rofl.txt', 'rofl_yakor.txt', 'Что такое рофл, Как рофлить, как использовать слово рофл, Рофл, рофлянчик, шутка по-зумерски', 'Что такое рофл'),
(4, 'лол', 'lol', 'lol.txt', 'lol_yakor.txt', 'Как использовать лол, что такое лол, лол кек чебурек', 'Что такое лол'),
(6, 'кек', 'kek', 'kek.txt', 'kek_yakor.txt', 'Что такое кек, как кекать, сленг wow, зумерский сленг кек, лол кек чебурек', 'Что такое лол'),
(7, 'сленг', 'slang', 'slang.txt', 'slang_yakor.txt', 'Сленг, Как использовать сленг, Как опознать сленг, что такое сленг, как влиться в компанию молодежи', 'Что такое Сленг');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `word`
--
ALTER TABLE `word`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=295;

--
-- AUTO_INCREMENT для таблицы `word`
--
ALTER TABLE `word`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
