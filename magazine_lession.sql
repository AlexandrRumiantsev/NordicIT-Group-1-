-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Хост: localhost
-- Время создания: Дек 28 2019 г., 07:59
-- Версия сервера: 5.6.38
-- Версия PHP: 7.2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `magazine_lession`
--

-- --------------------------------------------------------

--
-- Структура таблицы `basket`
--

CREATE TABLE `basket` (
  `good` text NOT NULL,
  `price` text NOT NULL,
  `count` text NOT NULL,
  `size` text NOT NULL,
  `img` text NOT NULL,
  `user` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `basket`
--

INSERT INTO `basket` (`good`, `price`, `count`, `size`, `img`, `user`) VALUES
('Теплосчётчики', '', '1', '43', 'http://localhost:8888/img/catalog/bfon-brookfield.jpg', 'admin');

-- --------------------------------------------------------

--
-- Структура таблицы `goods`
--

CREATE TABLE `goods` (
  `title` text NOT NULL,
  `price` text NOT NULL,
  `img` text NOT NULL,
  `id` text NOT NULL,
  `article` text NOT NULL,
  `discr` text NOT NULL,
  `category` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `goods`
--

INSERT INTO `goods` (`title`, `price`, `img`, `id`, `article`, `discr`, `category`) VALUES
('Куртка - Синяя', '1000', '1.jpg', '1', 'bluejaket', 'Качественная куртка, синего цвета.', ''),
('Куртка - Зеленая', '3000', '2.jpg', '2', 'greenjaket', 'Качественная куртка, зеленого цвета.', ''),
('Кросовки ADIDAS.', '6000', '7.jpg', '3', 'crossadidass', 'Кросовки ADIDAS. Ультромодные и качественные, для всех возрастов.', ''),
('Куртка из натуральной кожи', '1 000 000', '6.jpg', '4', 'kozjjacket', 'Удобная, куртка из натуральной кожи для любых погодных условий.', ''),
('Женские кеды', '10000', '8.jpg', '5', 'kedswoman', 'Отличные женские кеды.', 'woman'),
('Мужская куртка', '10000', '3.png', '6', 'menjaket', 'Мужская куртка', 'men'),
('Детские джинсы', '10000', '11.jpg', '7', 'childjins', 'Детские джинсы', 'children'),
('2132', '1', '5.png', '5dfccbe3b79e5', '123', '        123', ''),
('TEST', '123', '5.png', '5dfcd0047550c', 'Артикуол', '        213', 'Женское'),
('Title', '21', '4.png', '5dfcd0c73f5d7', 'Артикуол', '        Новинка\"!', 'new'),
('Наимм', '34', '13.png', '5dfcd17619f95', '32432', '        12312', 'man'),
('TEST', '123', '13.png', '5dfcd2ac7657a', 'Артикуол', '        1231', 'woman'),
('Теплосчётчики', '9999', '5.jpg', '5dfd2752e4fb9', '0', '        lll', 'man'),
('Теплосчётчики', '', 'bfon-brookfield.jpg', '5dfdeb7992560', '213', '        описание', 'woman'),
('Теплосчётчики', '2324', 'bfon-brookfield.jpg', '5dfded916d08b', '0', '        32423434', 'new'),
('32', '23', 'bfon-brookfield.jpg', '5dfe2c6b707a0', 'cs', '        cds', 'man'),
('Теплосчётчики', '3', 'bfon-brookfield.jpg', '5dfe2cfbbf5e8', '0', '        dssd', 'woman'),
('ew', '2', 'bfon-brookfield.jpg', '5dfe2d6d1d728', '0', '        ww', 'man'),
('Теплосчётчики', '32', 'bfon-brookfield.jpg', '5dfe2dd8db267', '213', '        32dwe', 'woman'),
('Теплосчётчики', '32', 'bfon-brookfield.jpg', '5dfe2e0d8ebf2', '23', '        ewew', 'children'),
('Теплосчётчики', '221', 'bfon-brookfield.jpg', '5dfe2e7a48a98', '213', '        w2w1', 'children'),
('Теплосчётчики', '32', 'bfon-brookfield.jpg', '5dfe2ead2516d', 's2', '        ew', 'woman'),
('Теплосчётчики', '21', 'bfon-brookfield.jpg', '5dfe2eef9bb23', 'rer', '        swed', 'man'),
('Теплосчётчики', '32', 'bfon-brookfield.jpg', '5dfe3181c3cb1', '0', '        32e', 'woman'),
('', '', 'bfon-brookfield.jpg', '5dfe4652b90b0', '', '        ', 'man'),
('Теплосчётчики', '2312', '3КАП.jpg', '5dfe758c8f691', '0', '        213', 'children');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `login` text NOT NULL,
  `password` text NOT NULL,
  `name` text NOT NULL,
  `mail` text NOT NULL,
  `role` text NOT NULL,
  `accept` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`login`, `password`, `name`, `mail`, `role`, `accept`) VALUES
('admin', 'admin', 'admin', 'admin@mail.ru', 'admin', 0),
('user', 'user', 'myName', 'user@mail.ru', '', 0),
('xxx', 'xxxx', '', 'xxxx', 'user', 0),
('y', 'y', '', 'y', 'user', 0),
('ss', 'sss', '', 'sss', 'user', 0),
('', '', '', '', 'user', 0),
('', '', '', '', 'user', 0),
('', '', '', '', 'user', 0),
('', '', '', '', 'user', 0),
('', '', '', '', 'user', 0),
('', '', '', '', 'user', 0),
('', '', '', '', 'user', 0),
('', '', '', '', 'user', 0),
('x', 'x', '', 'x', 'user', 0),
('1', '1', '', 'r-sasha@list.ru', 'user', 1),
('1в', '1цву', '', 'r-sasha@list.ru', 'user', 1),
('1e', '1ewew', '', 'r-sasha@list.ru', 'user', 1),
('1', '1', '', 'r-sasha@list.ru', 'user', 1),
('1', '1', '', 'r-sasha@list.ru', 'user', 1),
('1выыв', '1ыааы', '', 'r-sasha@list.ru', 'user', 1),
('1', '1', '', 'r-sasha@list.ru', 'user', 1),
('1вц', '1у', '', 'r-sasha@list.ru', 'user', 1),
('1', '1', '', 'r-sasha@list.ru', 'user', 1),
('1', '1', '', 'r-sasha@list.ru', 'user', 1),
('1', '1', '', 'r-sasha@list.ru', 'user', 1),
('1', '1', '', 'r-sasha@list.ru', 'user', 1),
('1qw', '1we', '', 'r-sasha@list.ru', 'user', 0),
('1', '1', '', 'r-sasha@list.ru', 'user', 0),
('1', '1', '', 'r-sasha@list.ru', 'user', 0);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
