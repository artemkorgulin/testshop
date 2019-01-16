-- phpMyAdmin SQL Dump
-- version 3.1.3
-- http://www.phpmyadmin.net
--
-- Хост: mysql52.hoster.ru
-- Время создания: Янв 10 2019 г., 20:43
-- Версия сервера: 5.5.1
-- Версия PHP: 5.2.6

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- База данных: `testshop`
--

-- --------------------------------------------------------

--
-- Структура таблицы `order`
--

CREATE TABLE IF NOT EXISTS `order` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `adres` varchar(255) NOT NULL,
  `summ` varchar(255) NOT NULL,
  `order_content` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=80 ;

--
-- Дамп данных таблицы `order`
--

INSERT INTO `order` (`id`, `date`, `name`, `email`, `phone`, `adres`, `summ`, `order_content`) VALUES
(79, 1333384995, 'Артём', 'ttion@mail.ru', '89164603255', 'ул. Пнафилова 22 кв 20', '1097', 'a:2:{i:3;a:2:{s:5:\\"price\\";s:3:\\"299\\";s:5:\\"count\\";i:2;}i:4;a:2:{s:5:\\"price\\";s:3:\\"499\\";s:5:\\"count\\";i:1;}}');

-- --------------------------------------------------------

--
-- Структура таблицы `product`
--

CREATE TABLE IF NOT EXISTS `product` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8 NOT NULL,
  `desc` text NOT NULL,
  `price` varchar(255) CHARACTER SET utf8 NOT NULL,
  `url` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Дамп данных таблицы `product`
--

INSERT INTO `product` (`id`, `name`, `desc`, `price`, `url`) VALUES
(1, 'Компьютерная мышь', 'Достоинства:\r\nДизайн, эргономика, программное обеспечение, универсальный и очень скромный по размерам USB-приемник.\r\nНедостатки:\r\nНестандартное расположение лазера требует привыкания. Не очень четкий клик скроллером: для срабатывания приходится нажимать со смещением к низу скроллера, что также беспокоит только первое время, до полной адаптации.', '299', 'kompyuternaya-mysh'),
(2, 'Монитор', 'ЖК (TFT TN) 24", широкоформатный, 1920x1080, LED-подсветка, 250 кд/м2, 1000:1, 5 мс, 170°/170°, стереоколонки, ТВ-тюнер, HDMI, VGA, композитный вход, компонентный вход, SCART ...', '4399', 'monitor'),
(3, 'Клавиатура', 'Достоинства:\r\nмягкая, приятная на ощупь. руки ложатся так, как будто клавиатура на заказ сделана. Подсветка еще 1н +, можно настраивать под каждый профиль свой цвет.', '299', 'klaviatura'),
(4, 'Колонки', 'Тип АС: напольная, пассивная, фазоинверторного типа, материал корпуса: MDF, 250 Вт, 90 дБ, 35-100000 Гц, Bi-wiring, 255x998x285 мм', '499', 'kolonki'),
(5, 'Системный блок', 'Десктоп HP 6200 Pro SFF XY267EA создан специально для удовлетворения ежедневных потребностей представителей бизнес-сферы', '8799', 'sistemnyi-blok'),
(6, 'Роутер', 'коммутатор (switch)\r\n5 портов Ethernet 10/100/1000 Мбит/сек\r\nДостоинства:\r\nСкорость, дизайн, цена, универсальность, простота. Практически не греется.', '1299', 'router');

-- --------------------------------------------------------

--
-- Структура таблицы `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `login` varchar(30) NOT NULL,
  `pass` varchar(30) NOT NULL,
  `role` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Дамп данных таблицы `user`
--

INSERT INTO `user` (`id`, `login`, `pass`, `role`, `email`, `phone`) VALUES
(1, 'admin', '1', 1, 'admin@admin.ru', '89655554488');
