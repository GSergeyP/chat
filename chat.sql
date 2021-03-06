-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Хост: localhost
-- Время создания: Дек 07 2021 г., 19:33
-- Версия сервера: 8.0.26
-- Версия PHP: 8.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `chat`
--

-- --------------------------------------------------------

--
-- Структура таблицы `messages`
--

CREATE TABLE `messages` (
  `id_messages` int NOT NULL,
  `messages` tinytext NOT NULL,
  `id_user` tinyint NOT NULL,
  `name` tinytext NOT NULL,
  `time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `messages`
--

INSERT INTO `messages` (`id_messages`, `messages`, `id_user`, `name`, `time`) VALUES
(1, 'Мороз и солнце; день чудесный!', 3, 'Ксения', '2021-12-08 00:05:08'),
(2, 'Еще ты дремлешь, друг прелестный —', 2, 'Колян', '2021-12-08 00:06:29'),
(3, 'Пора, красавица, проснись:', 1, 'Петр', '2021-12-08 00:06:46'),
(4, 'Открой сомкнуты негой взоры', 3, 'Ксения', '2021-12-08 00:07:14'),
(5, 'Навстречу северной Авроры,', 2, 'Колян', '2021-12-08 00:07:29'),
(6, 'Звездою севера явись!', 2, 'Колян', '2021-12-08 00:07:42'),
(7, 'Вечор, ты помнишь, вьюга злилась,', 3, 'Ксения', '2021-12-08 00:07:59'),
(8, 'На мутном небе мгла носилась;', 2, 'Колян', '2021-12-08 00:08:17'),
(9, 'Луна, как бледное пятно,', 3, 'Ксения', '2021-12-08 00:08:54'),
(10, 'Сквозь тучи мрачные желтела,', 4, 'Антонина', '2021-12-08 00:09:10'),
(11, 'И ты печальная сидела —', 4, 'Антонина', '2021-12-08 00:09:22'),
(12, 'А нынче… погляди в окно:', 4, 'Антонина', '2021-12-08 00:09:31'),
(13, 'Под голубыми небесами', 1, 'Петр', '2021-12-08 00:09:42'),
(14, 'Великолепными коврами,', 3, 'Ксения', '2021-12-08 00:09:54'),
(15, 'Блестя на солнце, снег лежит;', 4, 'Антонина', '2021-12-08 00:10:06'),
(16, 'Прозрачный лес один чернеет,', 1, 'Петр', '2021-12-08 00:10:16'),
(17, 'И ель сквозь иней зеленеет,', 3, 'Ксения', '2021-12-08 00:10:32'),
(18, 'И речка подо льдом блестит.', 4, 'Антонина', '2021-12-08 00:10:44'),
(19, 'Вся комната янтарным блеском', 4, 'Антонина', '2021-12-08 00:10:57'),
(20, 'Озарена. Веселым треском', 4, 'Антонина', '2021-12-08 00:11:09'),
(21, 'Трещит затопленная печь.', 1, 'Петр', '2021-12-08 00:11:19'),
(22, 'Приятно думать у лежанки.', 3, 'Ксения', '2021-12-08 00:11:33'),
(23, 'Но знаешь: не велеть ли в санки', 3, 'Ксения', '2021-12-08 00:11:46'),
(24, 'Кобылку бурую запречь?', 3, 'Ксения', '2021-12-08 00:11:55'),
(25, 'Скользя по утреннему снегу,', 1, 'Петр', '2021-12-08 00:12:07'),
(26, 'Друг милый, предадимся бегу', 1, 'Петр', '2021-12-08 00:12:21'),
(27, 'Нетерпеливого коня', 4, 'Антонина', '2021-12-08 00:12:31'),
(28, 'И навестим поля пустые,', 4, 'Антонина', '2021-12-08 00:12:44'),
(29, 'Леса, недавно столь густые,', 3, 'Ксения', '2021-12-08 00:12:53'),
(30, 'И берег, милый для меня.', 3, 'Ксения', '2021-12-08 00:13:03');

-- --------------------------------------------------------

--
-- Структура таблицы `user`
--

CREATE TABLE `user` (
  `id_user` int NOT NULL,
  `name` tinytext NOT NULL,
  `time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id_messages`);

--
-- Индексы таблицы `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `messages`
--
ALTER TABLE `messages`
  MODIFY `id_messages` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT для таблицы `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
