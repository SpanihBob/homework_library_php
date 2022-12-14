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
  `description` varchar(2000) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Дамп данных таблицы web113library.books: ~8 rows (приблизительно)
DELETE FROM `books`;
INSERT INTO `books` (`id`, `author`, `title`, `publisher`, `release_year`, `front`, `genre`, `description`, `status`) VALUES
	(1, 'Михаил Булгаков', 'Мастер и Маргарита', 'Издательский дом «ОНИКС»', '2016', '1.webp', 'Классика', 'Жарким майским вечером председатель правления МАССОЛИТ Михаил Берлиоз и молодой поэт Иван Бездомный отправились на Патриаршие пруды, чтобы обсудить: существовал ли Иисус Христос. Беседой литераторов заинтересовался некий импозантный гражданин-иностранец. Профессор Воланд стал уверять новых знакомых, что лично присутствовал на допросе бродяги Иешуа Га-Ноцри, который проводил Понтий Пилат. Александр Берлиоз и Иван Бездомный сочли собеседника сумасшедшим. А зря. Ведь через несколько часов Берлиоз попал под трамвай, а Иван отправился в сумасшедший дом, где и познакомился с мастером – возлюбленным Маргариты. Поэт узнает, что именно из-за романа о Понтии Пилате мастер оказался в сумасшедшем доме, а сама рукопись принесла писателю страшные несчастья… Тем временем Воланд со свитой весьма необычным образом исследуют, как изменились москвичи за последние годы. Это исследование надолго останется в памяти тех, кому довелось столкнуться с происками зла и его помощников, обладающих специфическим чувством юмора и особым взглядом на справедливость и милосердие…', '0'),
	(2, 'Федор Михайлович Достоевский', 'Преступление и наказание', 'Издательский Дом «Интеллект»', '2018', '2.webp', 'Классика', '«Преступление и наказание» – роман об одном преступлении. Двойное убийство, совершенное бедным студентом из-за денег. Трудно найти фабулу проще, но интеллектуальное и душевное потрясение, которое производит роман, – неизгладимо. А вопрос, который главный герой поставил перед собой для решения: «Тварь ли я дрожащая или право имею?» – ужасает. Бездны падения исследует писатель для того, чтобы подняться на вершины духа.', '1'),
	(3, 'Михаил Булгаков', 'Собачье сердце', 'Издательский Дом «Интеллект»', '2018', '3.webp', 'Классика', 'Повесть «Собачье сердце» – одно из самых известных и запоминающихся произведений в творчестве Михаила Булгакова. С неподражаемым сарказмом и юмором Булгаков описал небывалый рискованный эксперимент профессора Преображенского по превращению собаки в человека, создав великолепную пародию на парадоксальную обстановку Советской России 30-х годов. Жестокий опыт по выведению новой «породы» людей показывает, что нельзя безнаказанно экспериментировать с природой и менять Божий Промысел в угоду политическим целям. Детища подобных экспериментов способны уничтожить своих создателей.', '1'),
	(4, 'Антуан де Сент-Экзюпери', 'Маленький принц', 'Издательский Дом «Интеллект»', '2022', '4.webp', 'Детская литература', 'В одном из писем к матери Сент-Экзюпери признался: «Мне ненавистны люди, пишущие ради забавы, ищущие эффектов. Надо иметь что сказать». Ему, романтику неба, не чуравшемуся земных радостей, любившему, по свидетельству друзей, «писать, говорить, петь, играть, докапываться до сути вещей, есть, обращать на себя внимание, ухаживать за женщинами», человеку проницательного ума со своими достоинствами и недостатками, но всегда стоявшему на защите общечеловеческих ценностей, было «что сказать». И он написал самую известную во всем мире сказку «Маленький принц» о самом важном в этой жизни, жизни на планете Земля, все чаще такой неласковой, но любимой и единственной.', '1'),
	(5, 'Чарльз Дарвин', 'Происхождение видов', 'Издательский дом «ОНИКС»', '2015', '5.webp', 'Образовательная литература', '«Происхождение видов»» – основополагающий труд английского натуралиста и путешественника Чарлза Дарвина. Одним из первых он выдвинул идею об эволюции видов и обосновал ее, главным же механизмом эволюции он признал естественный отбор.', '1'),
	(6, 'Даниэль Дефо', 'Робинзон Крузо', 'Издательский дом «ФТМ»', '2016', '6.webp', 'Художественная литература', 'Популярный роман английского писателя Даниэля Дефо об удивительных приключениях Робинзона Крузо, прожившего двадцать восемь лет в полном одиночестве на необитаемом острове.', '0'),
	(7, 'Алексей Пехов', 'Ткущие мрак', 'Издательский дом «ФТМ»', '2016', '7.webp', 'Фэнтази', 'С севера приходят все более тревожные вести – война приближается. Шаутты, демоны той стороны, вернулись. Вэйрэн, уничтоженный Шестерыми много веков назад, возрожден. И нет уже больше волшебников, способных противостоять его магии.', '1'),
	(8, 'Сергей Лукьяненко', 'Дозоры', 'Издательский Дом «Интеллект»', '2022', '8.webp', 'Фэнтази', 'В сборник вошли шесть романов о мире Светлых и Темных Иных – магах, пророках, волшебницах, оборотнях, вампирах, ведьмах. Первая книга написана в 1998 году, шестая вышла в 2014 году. Главный герой Антон Городецкий работает под началом Бориса Игнатьевича Гесера в московском отделении Ночного Дозора, который защищает интересы Света. Этой организации во главе с Завулоном противостоит Дневной Дозор, стоящий на страже Тьмы. И все Иные чтут великий Договор, за чем строго следит Инквизиция… Городецкому предстоит неоднократно побывать пешкой в хитроумных играх Гесера и Завулона, которые уже не одну сотню лет пытаются победить друг друга, используя для этого достаточно грязные методы и приемы. И часто делая разменной монетой своих же союзников… А вскоре Антон решит вести собственную игру, проникая на все более глубокие слои Сумрака и опасно балансируя на границе, отделяющей Добро от Зла. Сможет ли он остаться Светлым? Или отчаянному магу Городецкому предназначен иной путь? Узнайте, прочитав все шесть романов популярной серии «Дозоры»!', '0');

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
  `favorites` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=37 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Дамп данных таблицы web113library.users: ~3 rows (приблизительно)
DELETE FROM `users`;
INSERT INTO `users` (`id`, `visitor_name`, `visitor_last_name`, `visitor_date`, `visitor_email`, `login`, `password`, `time_signup`, `avatar`, `favorites`) VALUES
	(29, 'Вася', 'Пупкин', '2003-08-01', 'vasiliy@yandex.ru', 'VasVas19', '$2y$10$LNtE6Ykzyc0esjMP3EFED.Tk4wlBTsYGy027PW7Rl/8UEH8FgZ7IK', 1661415688, NULL, NULL),
	(34, 'Vova', 'Kuzin', '1993-08-02', 'vova@mail.ru', '222', '$2y$10$7H4jXz.TgnnzUmrckcj7FumkPVOb1yjZwDU/hNjArYC/dd7cv7fre', 1661504806, NULL, NULL),
	(35, 'Анна', 'Иоанна', '1992-08-01', 'Anya@yandex.ru', '111', '$2y$10$m2JfIvRdTtrgPu5BA34LoOiZh1XtZJkxd25qcvi7Ppiu2GGwSlJCy', 1661516130, '11197609.jpg', '3,8,5,7,2,6');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
