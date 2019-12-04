-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Хост: localhost
-- Время создания: Дек 08 2019 г., 11:03
-- Версия сервера: 5.6.38
-- Версия PHP: 7.2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `magazine_lesson`
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
('Мужская куртка', '10000', '3', '28', 'http://localhost:8888/img/catalog/3.png', 'admin'),
('Женские кеды', '10000', '2', '28', 'http://localhost:8888/img/catalog/8.jpg', 'admin'),
('Куртка из натуральной кожи', '1 000 000', '2', '28', 'http://localhost:8888/img/catalog/6.jpg', 'admin'),
('Куртка - Зеленая', '3000', '1', '43', 'http://localhost:8888/img/catalog/2.jpg', 'user'),
('Женские кеды', '10000', '10', '28', 'http://localhost:8888/img/catalog/8.jpg', 'admin'),
('Куртка - Зеленая', '3000', '0', '28', 'http://localhost:8888/img/catalog/2.jpg', 'admin'),
('Куртка - Зеленая', '3000', '5', '28', 'http://localhost:8888/img/catalog/2.jpg', 'admin'),
('Женские кеды', '10000', '2', '28', 'http://localhost:8888/img/catalog/8.jpg', 'admin');

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
('Детские джинсы', '10000', '11.jpg', '7', 'childjins', 'Детские джинсы', 'children');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `login` text NOT NULL,
  `password` text NOT NULL,
  `name` text NOT NULL,
  `mail` text NOT NULL,
  `role` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`login`, `password`, `name`, `mail`, `role`) VALUES
('admin', 'admin', 'admin', 'admin@mail.ru', 'admin'),
('user', 'user', 'myName', 'user@mail.ru', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', ''),
('', '', 'myName', '', '');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
