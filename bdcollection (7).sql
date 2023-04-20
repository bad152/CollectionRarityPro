-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Июн 01 2022 г., 12:27
-- Версия сервера: 5.7.33
-- Версия PHP: 7.1.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `bdcollection`
--

-- --------------------------------------------------------

--
-- Структура таблицы `basket`
--

CREATE TABLE `basket` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_product` int(11) NOT NULL,
  `number_product` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Структура таблицы `category`
--

CREATE TABLE `category` (
  `id_category` int(11) NOT NULL,
  `name` varchar(20) CHARACTER SET utf8 NOT NULL,
  `img` varchar(40) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Дамп данных таблицы `category`
--

INSERT INTO `category` (`id_category`, `name`, `img`) VALUES
(1, 'Монеты', 'img1kop1934.jpg'),
(2, 'Банкноты', 'img\\1000rub1992B.jpg'),
(3, 'Аксессуары', 'img/albomMonet.jpg');

-- --------------------------------------------------------

--
-- Структура таблицы `order_data`
--

CREATE TABLE `order_data` (
  `id_order` int(11) NOT NULL,
  `id` int(11) NOT NULL,
  `id_ord_stat` int(11) DEFAULT NULL,
  `address` varchar(30) CHARACTER SET utf8 DEFAULT NULL,
  `telephone` int(11) DEFAULT NULL,
  `date_order` varchar(100) CHARACTER SET utf8 NOT NULL,
  `name_card` varchar(30) CHARACTER SET utf8 NOT NULL,
  `number_card` varchar(30) CHARACTER SET utf8 NOT NULL,
  `term_card` varchar(30) CHARACTER SET utf8 NOT NULL,
  `cvv` int(3) NOT NULL,
  `price_order` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `order_data`
--

INSERT INTO `order_data` (`id_order`, `id`, `id_ord_stat`, `address`, `telephone`, `date_order`, `name_card`, `number_card`, `term_card`, `cvv`, `price_order`) VALUES
(77, 5, 1, NULL, 0, '2022-05-29', '222', '222', '222', 222, 550),
(89, 5, 2, '123', 123, '2022-05-29', '123', '123', '123', 123, 799),
(97, 59, 4, '123', 123, '', '123', '123', '123', 123, 123);

-- --------------------------------------------------------

--
-- Структура таблицы `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(30) CHARACTER SET utf8 NOT NULL,
  `category` int(3) NOT NULL,
  `desc` text CHARACTER SET utf8 NOT NULL,
  `imgs` varchar(40) CHARACTER SET utf8 NOT NULL,
  `price` int(5) NOT NULL,
  `discount` varchar(20) CHARACTER SET utf8 DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Дамп данных таблицы `products`
--

INSERT INTO `products` (`id`, `name`, `category`, `desc`, `imgs`, `price`, `discount`) VALUES
(1, '1 копейка 1934', 1, 'Страна монеты - СССРГод выпуска монеты - 1934.Качество монеты - вне обращения', 'img/1kop1934.jpg', 549, '699руб.'),
(2, '1 рубль 1966', 1, 'Страна монеты - СССР\r\nГод выпуска монеты - 1966.\r\nКачество монеты - на фото', 'img\\1rub1966.jpg', 5999, '6999руб.'),
(3, '10 рублей 1918', 2, '\r\nСтрана банкноты - Россия\r\nГод выпуска банкноты - 1918 г.\r\nКачество банкноты - на фото', 'img\\10rub1918B.jpg', 299, '499руб.'),
(4, '100 рублей 1918', 2, 'Страна банкноты - РСФСР\r\nГод выпуска банкноты - 1918 г.\r\nКачество банкноты - на фото', 'img\\100rub1918B.jpg', 249, '499руб.'),
(5, '1000 рублей 1992', 2, 'Страна банкноты\r\nРоссия\r\nНоминал банкноты\r\n1000 рублей\r\nГод выпуска банкноты\r\n1992\r\nКачество банкноты\r\nиз обращения', 'img\\1000rub1992B.jpg', 249, NULL),
(6, '5 копеек 1892', 1, '\r\nСтрана монеты - Российская Империя\r\nГод выпуска монеты - 1892.\r\nКачество монеты - на фото', 'img\\5kop1892.jpg', 999, NULL),
(7, 'Альбом для монет', 3, 'Название бренда: Haodeba\r\nПроисхождение: Китай\r\nПереплет: Твёрдый переплёт\r\nСтиль: Фотоальбом с вкладными листами\r\nКоличество страниц: <80\r\nТип: Тип прокладочного листа', 'img/albomMonet.jpg', 599, NULL),
(8, 'Альбом для марок', 3, 'Формат альбома А5.\r\nВ альбоме 16 листов, 32 страницы.\r\n\r\nЧерные листы контрастируют с марками. 6 прозрачных пластиковых держателей для марок — марку видно целиком.\r\n\r\nОбложка альбома твердая.', 'img\\albomMark.jpg', 1499, '1999руб.'),
(9, 'Лупа. Увеличение 10х', 3, 'Десятикратное увеличение.Есть светодиодная подсветка, которая работает от батареек.Защитная часть сделана из металла.Лупа «точечная». Подойдет, если нужно рассмотреть мелкие детали на монете, банкноте, марке и так далее.', 'img/lupa.jpg', 799, '999руб.');

-- --------------------------------------------------------

--
-- Структура таблицы `status_order`
--

CREATE TABLE `status_order` (
  `id_ord_stat` int(11) NOT NULL,
  `name_ord_stat` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `status_order`
--

INSERT INTO `status_order` (`id_ord_stat`, `name_ord_stat`) VALUES
(1, 'В обработке '),
(2, 'Сбор заказа'),
(3, 'В пути'),
(4, 'В пункте выдачи'),
(5, 'Выдано');

-- --------------------------------------------------------

--
-- Структура таблицы `status_support`
--

CREATE TABLE `status_support` (
  `id_stat` int(11) NOT NULL,
  `desc_stat` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `status_support`
--

INSERT INTO `status_support` (`id_stat`, `desc_stat`) VALUES
(1, 'Отправлено '),
(2, 'На рассмотрении'),
(3, 'Есть ответ');

-- --------------------------------------------------------

--
-- Структура таблицы `support`
--

CREATE TABLE `support` (
  `id_sup` int(11) NOT NULL,
  `id_topic` int(11) NOT NULL,
  `id` int(11) NOT NULL,
  `full_name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `descrip` varchar(1000) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_stat` int(11) NOT NULL,
  `answer` varchar(1000) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `support`
--

INSERT INTO `support` (`id_sup`, `id_topic`, `id`, `full_name`, `descrip`, `id_stat`, `answer`) VALUES
(51, 2, 5, 'Андрей', 'Дорогие друзья, постоянное информационно-техническое обеспечение нашей деятельности обеспечивает актуальность \r\nНе следует, однако, забывать о том, что дальнейшее развитие различных форм деятельности требует от нас системного анализа системы обучения кадров, соответствующей насущным потребностям. Равным образом постоянное информационно-техническое обеспечение нашей деятельности играет важную роль в формировании дальнейших направлений развитая системы массового участия. Задача организации, в особенности же повышение уровня гражданского сознания обеспечивает актуальность направлений прогрессивного развития! Не следует, однако, забывать о том, что социально-экономическое развитие способствует подготовке и реализации всесторонне сбалансированных нововведений?\r\n\r\n', 2, '123221'),
(54, 1, 5, 'Андрей', 'Нету Тинькофф банка я ухажууу', 3, '12312'),
(55, 2, 5, 'Андрей', 'Привет', 2, '123213123312312321321');

-- --------------------------------------------------------

--
-- Структура таблицы `supporttopics`
--

CREATE TABLE `supporttopics` (
  `id_topic` int(11) NOT NULL,
  `desc_topic` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `supporttopics`
--

INSERT INTO `supporttopics` (`id_topic`, `desc_topic`) VALUES
(1, 'Проблема с оплатой'),
(2, 'Проблема с доставкой'),
(3, 'Товар ненадлежащего качества');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `full_name` varchar(50) CHARACTER SET utf8 NOT NULL,
  `login` varchar(50) CHARACTER SET utf8 NOT NULL,
  `email` varchar(50) CHARACTER SET utf8 NOT NULL,
  `password` varchar(50) CHARACTER SET utf8 NOT NULL,
  `avatar` varchar(255) CHARACTER SET utf8 NOT NULL,
  `role` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `full_name`, `login`, `email`, `password`, `avatar`, `role`) VALUES
(1, '1', '1', '1@mail.ru', 'c4ca4238a0b923820dcc509a6f75849b', 'img/wallpaper_profil.jpg', 2),
(5, 'Андрей Дмитриевич', '10', '12@mail.ru', 'c4ca4238a0b923820dcc509a6f75849b', 'authorization/avatars/11.jpg', 1),
(6, 'Андрей', '121', '12@mail.ru', 'c4ca4238a0b923820dcc509a6f75849b', 'authorization/avatars/cat.jpg', 1),
(59, 'test', '1211', '123@mail.ru', 'c4ca4238a0b923820dcc509a6f75849b', 'authorization/avatars/no_avatar.jpg', 1);

-- --------------------------------------------------------

--
-- Структура таблицы `vetrina`
--

CREATE TABLE `vetrina` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_product` int(11) NOT NULL,
  `number_product` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `vetrina`
--

INSERT INTO `vetrina` (`id`, `id_user`, `id_product`, `number_product`) VALUES
(11, 5, 1, 1);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `basket`
--
ALTER TABLE `basket`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_product` (`id_product`);

--
-- Индексы таблицы `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id_category`);

--
-- Индексы таблицы `order_data`
--
ALTER TABLE `order_data`
  ADD PRIMARY KEY (`id_order`),
  ADD KEY `id` (`id`),
  ADD KEY `id_ord_stat` (`id_ord_stat`);

--
-- Индексы таблицы `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category` (`category`);

--
-- Индексы таблицы `status_order`
--
ALTER TABLE `status_order`
  ADD PRIMARY KEY (`id_ord_stat`);

--
-- Индексы таблицы `status_support`
--
ALTER TABLE `status_support`
  ADD PRIMARY KEY (`id_stat`);

--
-- Индексы таблицы `support`
--
ALTER TABLE `support`
  ADD PRIMARY KEY (`id_sup`),
  ADD KEY `id` (`id`),
  ADD KEY `id_topic` (`id_topic`),
  ADD KEY `id_stat` (`id_stat`);

--
-- Индексы таблицы `supporttopics`
--
ALTER TABLE `supporttopics`
  ADD PRIMARY KEY (`id_topic`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `vetrina`
--
ALTER TABLE `vetrina`
  ADD PRIMARY KEY (`id`),
  ADD KEY `vetrina_ibfk_1` (`id_product`),
  ADD KEY `vetrina_ibfk_2` (`id_user`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `basket`
--
ALTER TABLE `basket`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `category`
--
ALTER TABLE `category`
  MODIFY `id_category` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT для таблицы `order_data`
--
ALTER TABLE `order_data`
  MODIFY `id_order` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=98;

--
-- AUTO_INCREMENT для таблицы `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT для таблицы `status_order`
--
ALTER TABLE `status_order`
  MODIFY `id_ord_stat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT для таблицы `status_support`
--
ALTER TABLE `status_support`
  MODIFY `id_stat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `support`
--
ALTER TABLE `support`
  MODIFY `id_sup` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT для таблицы `supporttopics`
--
ALTER TABLE `supporttopics`
  MODIFY `id_topic` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT для таблицы `vetrina`
--
ALTER TABLE `vetrina`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `basket`
--
ALTER TABLE `basket`
  ADD CONSTRAINT `basket_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `basket_ibfk_2` FOREIGN KEY (`id_product`) REFERENCES `products` (`id`);

--
-- Ограничения внешнего ключа таблицы `order_data`
--
ALTER TABLE `order_data`
  ADD CONSTRAINT `order_data_ibfk_1` FOREIGN KEY (`id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `order_data_ibfk_2` FOREIGN KEY (`id_ord_stat`) REFERENCES `status_order` (`id_ord_stat`);

--
-- Ограничения внешнего ключа таблицы `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_link_1` FOREIGN KEY (`category`) REFERENCES `category` (`id_category`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `support`
--
ALTER TABLE `support`
  ADD CONSTRAINT `support_ibfk_2` FOREIGN KEY (`id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `support_ibfk_3` FOREIGN KEY (`id_topic`) REFERENCES `supporttopics` (`id_topic`),
  ADD CONSTRAINT `support_ibfk_4` FOREIGN KEY (`id_stat`) REFERENCES `status_support` (`id_stat`);

--
-- Ограничения внешнего ключа таблицы `vetrina`
--
ALTER TABLE `vetrina`
  ADD CONSTRAINT `vetrina_ibfk_1` FOREIGN KEY (`id_product`) REFERENCES `products` (`id`),
  ADD CONSTRAINT `vetrina_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
