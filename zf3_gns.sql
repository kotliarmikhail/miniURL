-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Хост: localhost
-- Время создания: Май 02 2018 г., 00:16
-- Версия сервера: 5.5.59-0ubuntu0.14.04.1
-- Версия PHP: 7.0.27-1+ubuntu14.04.1+deb.sury.org+1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- База данных: `zf3_gns`
--

-- --------------------------------------------------------

--
-- Структура таблицы `short_urls`
--

CREATE TABLE IF NOT EXISTS `short_urls` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `long_url` text NOT NULL,
  `short_code` varchar(6) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `time_create` datetime NOT NULL,
  `time_end` datetime DEFAULT NULL,
  `counter` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `FK_short_code` (`short_code`),
  KEY `id` (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=149 ;

--
-- Дамп данных таблицы `short_urls`
--

INSERT INTO `short_urls` (`id`, `long_url`, `short_code`, `time_create`, `time_end`, `counter`) VALUES
(91, 'http://stackoverflow.com/questions/39639641/what-is-deepstream-io', 'bPxEvt', '2018-05-01 15:24:47', NULL, 3),
(92, 'http://stackoverflow.com/questions/39639641/what-is-deepstream-io', 'Dhsfxl', '2018-05-01 15:25:27', '2018-05-08 15:25:27', 16),
(143, 'https://google.com', 'o58TzY', '2018-05-01 22:34:28', '2018-05-08 22:34:28', 1),
(144, 'http://stackoverflow.com/questions/39639641/what-is-deepstream-io', 'fpYaXb', '2018-05-01 23:51:01', NULL, 1),
(145, 'http://stackoverflow.com/questions/39639641/what-is-deepstream-io', 'xSpTeG', '2018-05-01 23:51:52', '2018-06-01 23:51:52', 0),
(146, 'https://gist.github.com/PurpleBooth/109311bb0361f32d87a2#file-readme-template-md', 'lfh7tc', '2018-05-02 00:06:31', '2018-06-02 00:06:31', 0),
(147, 'https://github.com/kotliarmikhail/miniURL', 'CelviG', '2018-05-02 00:06:55', '2018-05-09 00:06:55', 1),
(148, 'https://www.doctrine-project.org/projects/doctrine-orm/en/latest/reference/caching.html', 'QbOMlT', '2018-05-02 00:08:18', '2018-05-09 00:08:18', 0);

-- --------------------------------------------------------

--
-- Структура таблицы `short_urls_info`
--

CREATE TABLE IF NOT EXISTS `short_urls_info` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `short_url_id` int(11) NOT NULL,
  `user_refer` varchar(255) DEFAULT NULL,
  `user_platform` varchar(255) DEFAULT NULL,
  `user_agent` varchar(255) DEFAULT NULL,
  `user_ip` varchar(255) NOT NULL,
  `user_country` varchar(255) DEFAULT NULL,
  `user_city` varchar(255) DEFAULT NULL,
  `date` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_short_url_id` (`short_url_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=43 ;

--
-- Дамп данных таблицы `short_urls_info`
--

INSERT INTO `short_urls_info` (`id`, `short_url_id`, `user_refer`, `user_platform`, `user_agent`, `user_ip`, `user_country`, `user_city`, `date`) VALUES
(24, 91, 'http://app-zf3.local/url', 'windows', 'Google Chrome', '192.168.56.101', 'Ukraine', 'Kiev', '2018-05-01 15:39:11'),
(25, 92, 'http://app-zf3.local/url', 'mac', 'Google Chrome', '192.168.56.101', 'Ukraine', 'Kiev', '2018-05-01 15:39:13'),
(26, 92, 'http://app-zf3.local/', 'linux', 'Opera', '192.168.56.101', 'Ukraine', 'Kiev', '2018-05-01 15:49:24'),
(27, 92, 'http://app-zf3.local/', 'windows', 'Internet Explorer', '192.168.56.101', 'Ukraine', 'Kiev', '2018-05-01 15:49:26'),
(28, 92, 'http://app-zf3.local/', 'linux', 'Mozilla Firefox', '192.168.56.101', 'Ukraine', 'Kiev', '2018-05-01 16:08:42'),
(29, 92, 'http://app-zf3.local/', 'windows', 'Apple Safari', '192.168.56.101', 'Ukraine', 'Kiev', '2018-05-01 18:28:40'),
(30, 92, 'http://app-zf3.local/', 'windows', 'Opera', '192.168.56.101', 'Ukraine', 'Kiev', '2018-05-01 19:41:16'),
(31, 92, 'http://app-zf3.local/', 'windows', 'Netscape', '192.168.56.101', 'Ukraine', 'Kiev', '2018-05-01 19:41:17'),
(32, 92, 'http://app-zf3.local/', 'windows', 'Google Chrome', '192.168.56.101', 'Ukraine', 'Kiev', '2018-05-01 19:41:30'),
(33, 92, 'http://app-zf3.local/url', 'windows', 'Google Chrome', '192.168.56.101', 'Ukraine', 'Kiev', '2018-05-01 20:34:05'),
(34, 92, 'http://app-zf3.local/url', 'windows', 'Google Chrome', '192.168.56.101', 'Ukraine', 'Kiev', '2018-05-01 20:34:39'),
(37, 91, 'http://app-zf3.local/', 'windows', 'Google Chrome', '192.168.56.101', 'Ukraine', 'Kiev', '2018-05-01 23:14:31'),
(38, 143, 'http://app-zf3.local/', 'windows', 'Google Chrome', '192.168.56.101', 'Ukraine', 'Kiev', '2018-05-01 23:50:16'),
(39, 92, 'http://app-zf3.local/', 'windows', 'Google Chrome', '192.168.56.101', 'Ukraine', 'Kiev', '2018-05-01 23:50:32'),
(40, 144, 'http://app-zf3.local/url', 'windows', 'Google Chrome', '192.168.56.101', 'Ukraine', 'Kiev', '2018-05-01 23:51:42'),
(41, 92, 'http://app-zf3.local/', 'windows', 'Google Chrome', '192.168.56.101', 'Ukraine', 'Kiev', '2018-05-02 00:02:26'),
(42, 147, 'http://app-zf3.local/url', 'windows', 'Google Chrome', '192.168.56.101', 'Ukraine', 'Kiev', '2018-05-02 00:06:58');

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `short_urls_info`
--
ALTER TABLE `short_urls_info`
  ADD CONSTRAINT `FK_short_url_id` FOREIGN KEY (`short_url_id`) REFERENCES `short_urls` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
