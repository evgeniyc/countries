-- phpMyAdmin SQL Dump
-- version 4.1.8
-- http://www.phpmyadmin.net
--
-- Хост: localhost
-- Время создания: Мар 31 2016 г., 12:05
-- Версия сервера: 5.1.73-community
-- Версия PHP: 5.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- База данных: `rest`
--

-- --------------------------------------------------------

--
-- Структура таблицы `cities`
--

CREATE TABLE IF NOT EXISTS `cities` (
  `id` tinyint(3) unsigned NOT NULL AUTO_INCREMENT COMMENT 'Идентификатор',
  `name` varchar(32) NOT NULL COMMENT 'Название',
  `country_id` tinyint(2) unsigned NOT NULL COMMENT 'Страна',
  PRIMARY KEY (`id`),
  KEY `lang_id` (`country_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;

--
-- Дамп данных таблицы `cities`
--

INSERT INTO `cities` (`id`, `name`, `country_id`) VALUES
(1, 'Кито', 1),
(2, 'Портовьехо', 1),
(3, 'Гуаякиль', 1),
(4, 'Санто-Доминго', 1),
(5, 'Ла-Пас', 3),
(7, 'Оруро', 3),
(8, 'Кочабамба', 3);

-- --------------------------------------------------------

--
-- Структура таблицы `countries`
--

CREATE TABLE IF NOT EXISTS `countries` (
  `id` tinyint(2) unsigned NOT NULL AUTO_INCREMENT COMMENT 'Идентификатор',
  `name` varchar(32) NOT NULL COMMENT 'Название',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Дамп данных таблицы `countries`
--

INSERT INTO `countries` (`id`, `name`) VALUES
(1, 'Эквадор'),
(2, 'Венесуэлла'),
(3, 'Боливия'),
(4, 'Перу'),
(5, 'Колумбия');

-- --------------------------------------------------------

--
-- Структура таблицы `lancit`
--

CREATE TABLE IF NOT EXISTS `lancit` (
  `city_id` tinyint(3) unsigned NOT NULL COMMENT 'ИД города',
  `lang_id` tinyint(2) unsigned NOT NULL COMMENT 'ИД языка',
  PRIMARY KEY (`city_id`,`lang_id`),
  KEY `city_id` (`city_id`,`lang_id`),
  KEY `city_id_2` (`city_id`),
  KEY `lang_id` (`lang_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `lancit`
--

INSERT INTO `lancit` (`city_id`, `lang_id`) VALUES
(1, 1),
(1, 2),
(1, 3),
(2, 1),
(2, 3),
(3, 2),
(3, 3),
(4, 1),
(4, 2),
(4, 3),
(5, 1),
(5, 5),
(5, 6),
(5, 7),
(7, 3);

-- --------------------------------------------------------

--
-- Структура таблицы `langs`
--

CREATE TABLE IF NOT EXISTS `langs` (
  `id` tinyint(2) unsigned NOT NULL AUTO_INCREMENT COMMENT 'Идентификатор',
  `name` varchar(16) NOT NULL COMMENT 'Наименование',
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

--
-- Дамп данных таблицы `langs`
--

INSERT INTO `langs` (`id`, `name`) VALUES
(1, 'Отовало'),
(2, 'Кастеллано'),
(3, 'Кечуа'),
(5, 'Испанский'),
(6, 'Аймара'),
(7, 'Гуарани');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
