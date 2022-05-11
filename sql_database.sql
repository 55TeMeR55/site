-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Мар 05 2021 г., 16:09
-- Версия сервера: 8.0.19
-- Версия PHP: 7.1.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `sql_database`
--

-- --------------------------------------------------------

--
-- Структура таблицы `historyofauthorization`
--

CREATE TABLE `historyofauthorization` (
  `id` int NOT NULL,
  `username` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL COMMENT 'name of user',
  `dateauthorization` datetime DEFAULT NULL COMMENT 'date of authorization user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `historyofauthorization`
--

INSERT INTO `historyofauthorization` (`id`, `username`, `dateauthorization`) VALUES
(1, 'user', '2021-03-04 17:45:19'),
(2, 'user', '2021-03-04 17:47:50'),
(3, 'user', '2021-03-04 17:55:23'),
(4, 'user', '2021-03-04 19:19:37'),
(5, 'user', '2021-03-04 19:20:36'),
(6, 'user', '2021-03-04 19:40:42'),
(7, 'user1', '2021-03-04 20:00:45'),
(8, 'user1', '2021-03-04 20:01:30'),
(9, 'user1', '2021-03-04 20:03:02'),
(10, 'admin', '2021-03-04 20:07:55'),
(11, 'admin', '2021-03-04 20:13:58'),
(12, 'user', '2021-03-04 20:14:37'),
(13, 'user', '2021-03-04 20:14:41'),
(14, 'user', '2021-03-04 20:18:07'),
(15, 'user', '2021-03-04 20:18:53'),
(16, 'admin', '2021-03-04 20:20:52'),
(17, 'admin', '2021-03-04 20:30:54'),
(18, 'admin', '2021-03-04 20:32:06'),
(19, 'admin', '2021-03-04 20:32:15'),
(20, 'admin', '2021-03-04 20:32:36'),
(21, 'admin', '2021-03-04 20:40:51'),
(22, 'admin', '2021-03-04 20:44:15'),
(23, 'admin', '2021-03-04 20:49:40'),
(24, 'admin', '2021-03-04 20:50:09'),
(25, 'admin', '2021-03-04 20:50:33'),
(26, 'admin', '2021-03-04 20:53:18'),
(27, 'admin', '2021-03-04 20:53:43'),
(28, 'admin', '2021-03-04 20:54:07'),
(29, 'admin', '2021-03-04 20:56:31'),
(30, 'admin', '2021-03-04 20:58:27'),
(31, 'admin', '2021-03-04 21:27:36'),
(32, 'admin', '2021-03-04 21:29:02'),
(33, 'admin', '2021-03-04 21:29:44'),
(34, 'user', '2021-03-04 21:29:52'),
(35, 'admin', '2021-03-04 21:31:13'),
(36, 'admin', '2021-03-04 21:32:49'),
(37, 'admin', '2021-03-04 22:20:24'),
(38, 'admin', '2021-03-04 22:29:20'),
(39, 'admin', '2021-03-04 22:33:05'),
(40, 'user', '2021-03-04 22:33:28'),
(41, 'admin', '2021-03-04 22:37:00'),
(42, 'user', '2021-03-04 22:38:17'),
(43, 'admin', '2021-03-04 23:09:23'),
(44, 'user', '2021-03-05 00:05:02'),
(45, 'admin', '2021-03-05 01:03:20'),
(46, 'admin', '2021-03-05 01:34:16'),
(47, 'admin', '2021-03-05 01:43:15'),
(48, 'admin', '2021-03-05 02:21:50'),
(49, 'admin', '2021-03-05 18:23:27'),
(50, 'user1', '2021-03-05 18:26:29'),
(51, 'admin', '2021-03-05 19:04:09');

-- --------------------------------------------------------

--
-- Структура таблицы `roles`
--

CREATE TABLE `roles` (
  `id` int NOT NULL COMMENT 'id',
  `namerole` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL COMMENT 'name of role'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `roles`
--

INSERT INTO `roles` (`id`, `namerole`) VALUES
(1, 'admin'),
(2, 'user');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL COMMENT 'id',
  `username` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL COMMENT 'name of user',
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL COMMENT 'password of user',
  `address` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL COMMENT 'address of user',
  `phone` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL COMMENT 'phone of user',
  `role` int DEFAULT NULL COMMENT 'role of user(user or admin)',
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL COMMENT 'email of user',
  `dateregistration` date DEFAULT NULL COMMENT 'date registration of user',
  `firstname` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL COMMENT 'first name of user',
  `secondname` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL COMMENT 'second name of user',
  `user_hash` varchar(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `user_ip` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci COMMENT='Usersdate';

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `address`, `phone`, `role`, `email`, `dateregistration`, `firstname`, `secondname`, `user_hash`, `user_ip`) VALUES
(1, 'User', '28c8edde3d61a0411511d3b1866f0636', 'Raccon', '145645645', 2, 'MichaelVictor@mail.ru', '2021-03-04', 'Michael', 'Victor', '4f46b6d964f50dbd0fbf2b87c660ac40', '2130706433'),
(2, 'user1', '28c8edde3d61a0411511d3b1866f0636', 'Omsk', '89635654653', 2, 'maflba@mail.ru', '2021-03-04', 'Cheeses', 'Lambert', 'c60f41f3aa1a896ce8e437e11ff4c781', '2130706433'),
(3, 'admin', '28c8edde3d61a0411511d3b1866f0636', 'Rome', '85465463', 1, 'rome@gmail.com', '2021-03-05', 'Lamberto', 'Colody', '9a8cc0b0c22d697c8ffc0089cfc92057', '2130706433');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `historyofauthorization`
--
ALTER TABLE `historyofauthorization`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`);

--
-- Индексы таблицы `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `role` (`role`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `historyofauthorization`
--
ALTER TABLE `historyofauthorization`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT COMMENT 'id', AUTO_INCREMENT=5;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`role`) REFERENCES `roles` (`id`),
  ADD CONSTRAINT `users_ibfk_2` FOREIGN KEY (`role`) REFERENCES `roles` (`id`) ON DELETE RESTRICT,
  ADD CONSTRAINT `users_ibfk_3` FOREIGN KEY (`role`) REFERENCES `roles` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
