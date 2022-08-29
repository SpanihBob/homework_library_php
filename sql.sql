-- --------------------------------------------------------
-- Хост:                         127.0.0.1
-- Версия сервера:               10.6.7-MariaDB - mariadb.org binary distribution
-- Операционная система:         Win64
-- HeidiSQL Версия:              12.0.0.6468
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Дамп структуры базы данных web113library
CREATE DATABASE IF NOT EXISTS `web113library` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci */;
USE `web113library`;

-- Дамп структуры для таблица web113library.books
CREATE TABLE IF NOT EXISTS `books` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `author` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `publisher` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `release_year` year(4) DEFAULT NULL,
  `front` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `genre` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Дамп данных таблицы web113library.books: ~4 rows (приблизительно)
DELETE FROM `books`;
INSERT INTO `books` (`id`, `author`, `title`, `publisher`, `release_year`, `front`, `genre`) VALUES
	(1, 'Михаил Булгаков', 'Мастер и Маргарита', 'Издательский дом «ОНИКС»', '2016', '1.jpg', 'Классика'),
	(2, 'Федор Михайлович Достоевский', 'Преступление и наказание', 'Издательский Дом «Интеллект»', '2018', '2.jpg', 'Классика'),
	(3, 'Антуан де Сент-Экзюпери', 'Маленький принц', 'Издательский Дом «Интеллект»', '2022', '3.jpg', 'Детская литература'),
	(4, 'Михаил Булгаков', 'Собачье сердце', 'Издательский Дом «Интеллект»', '2018', '4.jpg', 'Классика');

-- Дамп структуры для таблица web113library.userbooks
CREATE TABLE IF NOT EXISTS `userbooks` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `book_id` int(11) NOT NULL DEFAULT 0,
  `login_id` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `book_data_time` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Дамп данных таблицы web113library.userbooks: ~0 rows (приблизительно)
DELETE FROM `userbooks`;

-- Дамп структуры для таблица web113library.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `visitor_name` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `visitor_last_name` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `visitor_date` date DEFAULT NULL,
  `visitor_email` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `login` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `time_signup` int(11) DEFAULT NULL,
  `avatar` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=37 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Дамп данных таблицы web113library.users: ~3 rows (приблизительно)
DELETE FROM `users`;
INSERT INTO `users` (`id`, `visitor_name`, `visitor_last_name`, `visitor_date`, `visitor_email`, `login`, `password`, `time_signup`, `avatar`) VALUES
	(29, 'Вася', 'Пупкин', '2003-08-01', 'vasiliy@yandex.ru', 'VasVas19', '$2y$10$LNtE6Ykzyc0esjMP3EFED.Tk4wlBTsYGy027PW7Rl/8UEH8FgZ7IK', 1661415688, NULL),
	(34, 'Vova', 'Kuzin', '1993-08-02', 'vova@mail.ru', '222', '$2y$10$7H4jXz.TgnnzUmrckcj7FumkPVOb1yjZwDU/hNjArYC/dd7cv7fre', 1661504806, NULL),
	(35, 'Анна', 'Иоанна', '1992-08-01', 'Anya@yandex.ru', '111', '$2y$10$m2JfIvRdTtrgPu5BA34LoOiZh1XtZJkxd25qcvi7Ppiu2GGwSlJCy', 1661516130, '11197609.jpg');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
