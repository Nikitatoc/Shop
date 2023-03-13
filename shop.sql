-- phpMyAdmin SQL Dump
-- version 5.1.2
-- https://www.phpmyadmin.net/
--
-- Хост: localhost:3306
-- Час створення: Бер 02 2023 р., 20:09
-- Версія сервера: 5.7.24
-- Версія PHP: 8.0.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База даних: `shop`
--

-- --------------------------------------------------------

--
-- Структура таблиці `basket`
--

CREATE TABLE `basket` (
  `ProductId` int(11) NOT NULL,
  `CustomerId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп даних таблиці `basket`
--

INSERT INTO `basket` (`ProductId`, `CustomerId`) VALUES
(24, 0),
(22, 0),
(2, 0),
(16, 0),
(6, 0),
(10, 5),
(18, 5),
(4, 5),
(22, 0),
(15, 0),
(21, 7),
(22, 7),
(11, 7),
(12, 7),
(16, 7),
(14, 7);

-- --------------------------------------------------------

--
-- Структура таблиці `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `CustomerId` int(11) NOT NULL,
  `ShippingMethod` text NOT NULL,
  `region` text NOT NULL,
  `city` text NOT NULL,
  `Street` text NOT NULL,
  `house` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп даних таблиці `orders`
--

INSERT INTO `orders` (`id`, `CustomerId`, `ShippingMethod`, `region`, `city`, `Street`, `house`) VALUES
(3, 3, 'UaPost', 'Харківська Облась', 'Харків', 'центральна', '55'),
(4, 6, 'NewPost', 'Київська область', 'Київ', 'центральна', '33'),
(5, 3, 'NewPost', 'Харківська Область', 'Харків', 'Сумська', '12');

-- --------------------------------------------------------

--
-- Структура таблиці `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `price` int(5) NOT NULL,
  `CustomerPrice` int(5) NOT NULL,
  `amount` int(10) NOT NULL,
  `description` text NOT NULL,
  `type` int(1) NOT NULL,
  `ForCustomer` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп даних таблиці `products`
--

INSERT INTO `products` (`id`, `name`, `price`, `CustomerPrice`, `amount`, `description`, `type`, `ForCustomer`) VALUES
(2, 'Холодильник', 10000, 8999, 100, 'Гарний холодильник середнього розміру', 1, 'no'),
(3, 'Пральна машина', 16199, 12999, 223, 'Швидке прання `15 Очищення барабана Гігієнічне прання пором Верхній одяг Полоскання+ Змішане прання', 1, 'yes'),
(4, 'Холодильник', 23000, 22599, 50, 'Великий холодильник ', 1, 'yes'),
(5, 'Пральна машина', 11999, 10999, 300, '3 швидкі програми Відкладений старт: 3/6/9 год Регулювання температури прання Регулювання швидкості віджимання', 1, 'no'),
(6, 'Кавомашина', 19999, 15999, 30, 'Кавомашина Знімний піддон для крапель Контейнер для молока Iнструкцiя', 1, 'no'),
(7, '  Комп\'ютер Artline Gaming ', 30000, 28000, 4, 'Геймерський компьютер', 2, 'no'),
(8, 'Моноблок Apple iMac 24', 73000, 70000, 10, 'Система з трьох спрямованих мікрофонів з високим коефіцієнтом сигналу/шуму і підтримкою запису аудіо студійної якості Підтримка функції «Привіт, Siri»', 2, 'no'),
(9, 'Ноутбук Acer Aspire 7', 40000, 39999, 0, '1 x USB 3.2 Type-C Gen 1/2 x USB 3.2 Gen 1/1 x USB 2.0/HDMI/LAN (RJ-45)/комбінований аудіороз\'єм для навушників/мікрофона', 2, 'no'),
(10, 'Ноутбук ASUS TUF Gaming', 45000, 40000, 3, 'швиткий ігровий ноутбук', 2, 'yes'),
(11, 'Ноутбук Acer Aspire 3', 32999, 24000, 12, 'Wi-Fi 802.11aс Bluetooth 5.0 Gigabit Ethernet', 2, 'no'),
(12, 'Куртка GARLANG', 2800, 1999, 200, 'куртка', 3, 'no'),
(13, ' Вітровка Joma Iris', 1100, 900, 0, ' Коралова', 3, 'no'),
(14, '  Джинси Prodigy', 1500, 1000, 500, 'сині', 3, 'yes'),
(15, ' Світшот Love&Live', 1000, 900, 100, 'Герб України', 3, 'no'),
(16, ' Куртка 4F H4Z22-KUMP006-61S', 2800, 2500, 1, 'Dark Red', 3, 'no'),
(17, '  Мобільний телефон Samsung Galaxy M33 ', 11500, 9000, 10, '5G 6/128GB Green (SM-M336BZGGSEK) Весняний розпродаж Мобільний телефон Samsung Galaxy ', 4, 'yes'),
(18, 'Мобільний телефон Apple iPhone 13', 35999, 30000, 2, '128GB Starlight (MLPG3HU/A)', 4, 'yes'),
(19, 'Мобільний телефон Apple iPhone 14', 41000, 39000, 0, '128GB Purple', 4, 'yes'),
(20, 'Велосипед CORRADO Piemont DB 26\" 21\"', 13000, 12000, 0, 'велосипед', 5, 'no'),
(21, '  Велосипед Ardis Lido 26\" 16.5\" 2021 ', 10000, 6000, 50, 'велосипед', 5, 'yes'),
(22, 'Велотуфлі МТБ ', 7000, 6700, 40, 'Sidi Gravel 43 Black-Dark Green', 5, 'no'),
(24, 'Ноутбук Asus rog', 40000, 38000, 10, 'геймерський ноутбук', 2, 'no'),
(25, 'кухонна плита', 10000, 9000, 200, 'індукційна плита', 1, 'yes');

-- --------------------------------------------------------

--
-- Структура таблиці `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `email` text NOT NULL,
  `password` text NOT NULL,
  `access` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп даних таблиці `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `access`) VALUES
(3, 'Микита', 'nikita@gmail.com', '12345', 'customer'),
(5, 'Jeff', 'ttthtrh@gmail.com', '54321', 'customer'),
(6, 'Robert', '44@ggl.ua', 'admin', 'admin'),
(8, 'admin', 'admin@gmail.com', '1111', 'admin'),
(9, 'Tof', 'Tof@gmail.com', 'tof1', 'customer');

--
-- Індекси збережених таблиць
--

--
-- Індекси таблиці `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Індекси таблиці `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Індекси таблиці `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для збережених таблиць
--

--
-- AUTO_INCREMENT для таблиці `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT для таблиці `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT для таблиці `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
