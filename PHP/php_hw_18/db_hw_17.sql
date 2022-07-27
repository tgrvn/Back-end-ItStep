-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Время создания: Июл 16 2022 г., 13:29
-- Версия сервера: 10.4.24-MariaDB
-- Версия PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
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
-- Структура таблицы `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `userId` int(11) NOT NULL,
  `pdouctId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `cart`
--

INSERT INTO `cart` (`id`, `userId`, `pdouctId`) VALUES
(1, 1, 2),
(2, 2, 3),
(3, 3, 4),
(4, 4, 5),
(5, 5, 6),
(6, 6, 7),
(7, 7, 8),
(8, 8, 9),
(9, 9, 10),
(10, 10, 7),
(11, 2, 3),
(12, 3, 4),
(13, 5, 6),
(14, 7, 8),
(15, 2, 6),
(16, 2, 8),
(17, 2, 6),
(18, 3, 5),
(19, 1, 6),
(20, 8, 10),
(21, 2, 3),
(22, 2, 6),
(23, 2, 3),
(24, 1, 1),
(25, 2, 1),
(26, 5, 19),
(27, 4, 18),
(28, 3, 17),
(29, 2, 16),
(30, 6, 15),
(31, 6, 14),
(32, 7, 17),
(33, 8, 18),
(34, 8, 19),
(35, 10, 13),
(36, 11, 12),
(37, 1, 18),
(38, 2, 19),
(39, 3, 16),
(40, 4, 15),
(41, 5, 14),
(42, 6, 13),
(43, 7, 12),
(44, 8, 11);

-- --------------------------------------------------------

--
-- Структура таблицы `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
  `idSector` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `category`
--

INSERT INTO `category` (`id`, `name`, `idSector`) VALUES
(1, 'laptop', 1),
(2, 'phone', 1),
(3, 'tablet', 1),
(4, 'pc', 1),
(5, 'tv', 1),
(6, 'console', 1),
(7, 'couch', 3),
(8, 'bed', 3),
(9, 'case', 2),
(10, 'headphones', 2);

-- --------------------------------------------------------

--
-- Структура таблицы `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `name` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `idCategory` int(11) DEFAULT NULL,
  `description` varchar(100) DEFAULT NULL,
  `make` varchar(100) DEFAULT NULL,
  `model` varchar(100) DEFAULT NULL,
  `country` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `product`
--

INSERT INTO `product` (`id`, `name`, `price`, `idCategory`, `description`, `make`, `model`, `country`) VALUES
(1, 'iphone 10 xr', 400, 2, 'super phone', 'apple', 'xr', 'usa'),
(2, 'iphone 10 xs', 450, 2, 'super duper phone', 'apple', 'xs', 'usa'),
(3, 'iphone 10 xs max', 600, 2, 'super duper puper phone', 'apple', 'xs max', 'usa'),
(4, 'iphone 11 xr', 620, 2, 'just super', 'apple', 'xr', 'usa'),
(5, 'iphone 11 xs', 640, 2, 'just super', 'apple', 'xs', 'usa'),
(6, 'iphone 11 xs max', 690, 2, 'just super duper', 'apple', 'xs max', 'usa'),
(7, 'ipad air 4', 800, 3, 'mega best tablet', 'apple', 'air 4', 'usa'),
(8, 'ipad air 5', 910, 3, 'mega tablet', 'apple', 'air 5', 'usa'),
(9, 'apple mackbook', 1000, 1, 'best laptop', 'apple', '1', 'usa'),
(10, 'apple mackbook pro', 1200, 1, 'mega best laptop', 'apple', 'pro', 'usa'),
(11, 'apple mackbook pro 2022', 1700, 1, 'super mega best laptop', 'apple', 'pro 2022', 'usa'),
(12, 'comfort couch', 600, 7, 'super comfort', 'ikea', 'cf-sda-2312', 'Germany'),
(13, 'super couch', 700, 7, 'mega comfort', 'ikea', 'cf-sda-4123', 'Germany'),
(14, 'comfort bed', 600, 8, 'super bed', 'ikea', 'cd-sa-22342', 'Germany'),
(15, 'super bed', 700, 8, 'mega comfort', 'ikea', 'c-ada-3245', 'Germany'),
(16, 'case iphone x', 50, 9, 'only case', 'case-fabric', 'zd-13', 'Ukraine'),
(17, 'case iphone 11', 60, 9, 'just case', 'case-fabric', 'zd-14', 'Ukraine'),
(18, 'air pods 2', 370, 10, 'best sound', 'apple', '2', 'usa'),
(19, 'air pods pro', 700, 10, 'best headphones', 'apple', 'pro', 'usa');

-- --------------------------------------------------------

--
-- Структура таблицы `sector`
--

CREATE TABLE `sector` (
  `sector_id` int(11) NOT NULL,
  `name` varchar(100) CHARACTER SET utf8 DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `sector`
--

INSERT INTO `sector` (`sector_id`, `name`) VALUES
(1, 'tech'),
(2, 'acessories'),
(3, 'furniture');

-- --------------------------------------------------------

--
-- Структура таблицы `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `surename` varchar(100) DEFAULT NULL,
  `login` varchar(100) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `phone` varchar(100) DEFAULT NULL,
  `country` varchar(100) DEFAULT NULL,
  `city` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `user`
--

INSERT INTO `user` (`id`, `name`, `surename`, `login`, `password`, `phone`, `country`, `city`) VALUES
(1, 'Hanna', 'Korish', 'hanna1990', 'hannabanana1990', '+380995554466', 'Poland', 'Warsaw'),
(2, 'Leyla', 'Hafarova', 'gfrv', 'dasdsa1990', '+380964448866', 'Ukraine', 'Dnipro'),
(3, 'Anatolyi', 'Stepanyk', 'step', 'zxcvbn1920', '+380957778855', 'Ukraine', 'Kiyv'),
(4, 'Andrey', 'Frankovskiy', 'AFrank', 'sgdsgfkqw', '+380987895544', 'Ukraine', 'Dnipro'),
(5, 'Viktoria', 'Prihodyko', 'vikavika', 'sddflwoqwgc', '+380987876535', 'Ukraine', 'Dnipro'),
(6, 'Pavel', 'Chernous', 'pave_cher', 'sgpwoekgsc', '+380988844556', 'Ukraine', 'Dnipro'),
(7, 'Max', 'Sverdlen', 'drill', 'glsdiosepth', '+380985532154', 'Ukraine', 'Kharkiv'),
(8, 'Sergey', 'Prityla', 'bayraktar', 'dasasdglsgoweww', '+380992233441', 'Ukraine', 'Lviv'),
(9, 'Irina', 'Kovalenko', 'kova-kova', 'sddafhlbclxz', '+3805486458', 'Ukraine', 'Kharkiv'),
(10, 'Stanislad', 'Gryazilnikov', 'lifelfieasd', 'dasfsfwad', '+380887578545', 'Ukraine', 'Lviv'),
(11, 'Vladislav', 'Pokrishkin', 'sadasfsdfwqds', 'dgsajfpeoar', '+38078954698', 'Ukraine', 'Kharkiv'),
(12, 'Viktor', 'Pobedkin', 'adsasdklfmwe', 'dasfsslsjkgjdwq', '+3808875544', 'Ukraine', 'Kiyv'),
(13, 'Evgeniy', 'Popadinets', 'popal_tak_popal', 'dashreterdsad', '+3808899875', 'Poland', 'Krakow'),
(14, 'Vladislav', 'Polyanskiy', 'palanitsa', 'dasghjlfpsapwq', '+380997785655', 'Poland', 'Wrotslaw'),
(15, 'Evgeniy', 'Ukrainskiy', 'dasdsafadhjjui', 'sadashfsfsf', '+380995546842', 'Poland', 'Warsaw');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_pdouctId` (`pdouctId`),
  ADD KEY `fk_userId` (`userId`);

--
-- Индексы таблицы `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_id_sector` (`idSector`);

--
-- Индексы таблицы `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_idCategory` (`idCategory`);

--
-- Индексы таблицы `sector`
--
ALTER TABLE `sector`
  ADD PRIMARY KEY (`sector_id`);

--
-- Индексы таблицы `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT для таблицы `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT для таблицы `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT для таблицы `sector`
--
ALTER TABLE `sector`
  MODIFY `sector_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `fk_pdouctId` FOREIGN KEY (`pdouctId`) REFERENCES `product` (`id`),
  ADD CONSTRAINT `fk_userId` FOREIGN KEY (`userId`) REFERENCES `user` (`id`);

--
-- Ограничения внешнего ключа таблицы `category`
--
ALTER TABLE `category`
  ADD CONSTRAINT `fk_id_sector` FOREIGN KEY (`idSector`) REFERENCES `sector` (`sector_id`);

--
-- Ограничения внешнего ключа таблицы `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `fk_idCategory` FOREIGN KEY (`idCategory`) REFERENCES `category` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
