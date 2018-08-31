-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Хост: localhost:3306
-- Время создания: Авг 31 2018 г., 10:53
-- Версия сервера: 10.1.34-MariaDB
-- Версия PHP: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `legkovuchebe_ucebace`
--

-- --------------------------------------------------------

--
-- Структура таблицы `academic_level`
--

CREATE TABLE `academic_level` (
  `id` int(11) NOT NULL,
  `pvalue` varchar(40) NOT NULL,
  `academic_level` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `accepted_payout`
--

CREATE TABLE `accepted_payout` (
  `id` int(11) NOT NULL,
  `payout` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `accepted_payout`
--

INSERT INTO `accepted_payout` (`id`, `payout`) VALUES
(1, 'Paypal'),
(6, 'Skrill'),
(7, 'M-pesa');

-- --------------------------------------------------------

--
-- Структура таблицы `books`
--

CREATE TABLE `books` (
  `ID` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `author` varchar(255) NOT NULL,
  `rating` int(11) NOT NULL,
  `publisher` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `books`
--

INSERT INTO `books` (`ID`, `name`, `price`, `author`, `rating`, `publisher`) VALUES
(1, 'Harry Potter And The Order Of The Phoenix', '10.99', 'J.K. Rowling', 9, 'Bloomsbury'),
(2, 'Harry Potter And The Goblet Of Fire', '6.99', 'J.K Rowling', 8, 'Bloomsbury'),
(3, 'Lord Of The Rings: The Fellowship Of The Ring', '8.99', 'J. R. R. Tolkien', 8, 'George Allen & Unwin'),
(4, 'Lord Of The Rings: The Two Towers', '4.55', 'J. R. R. Tolkien', 8, 'George Allen & Unwin'),
(5, 'Lord Of The Rings: The Return Of The King', '7.99', 'J. R. R. Tolkien', 9, 'George Allen & Unwin'),
(6, 'End of Watch: A Novel', '5.00', 'Stephen King', 7, 'Scribner'),
(7, 'Truly Madly Guilty', '4.55', 'Liane Moriarty', 6, 'Flatiron Books'),
(8, 'All There Was', '3.99', 'John Davidson', 3, 'Newton'),
(9, 'Mystery In The Eye', '8.44', 'E.L. Joseph', 8, 'Red Books'),
(10, 'Neo Lights', '12.99', 'George Nord', 8, 'Heltower'),
(11, 'Universe: History', '13.99', 'Albert Shoon', 4, 'Easy Books'),
(12, 'Green Earth', '7.99', 'Ashleigh Turner', 4, 'Yellowhouse'),
(13, 'Music Of The Ages', '3.83', 'James King', 3, 'Universe Co'),
(14, 'Ancient Tea', '3.99', 'Jess Red', 8, 'Yellowhouse');

-- --------------------------------------------------------

--
-- Структура таблицы `chat`
--

CREATE TABLE `chat` (
  `id` int(10) UNSIGNED NOT NULL,
  `from` varchar(255) NOT NULL DEFAULT '',
  `to` varchar(255) NOT NULL DEFAULT '',
  `message` text NOT NULL,
  `sent` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `recd` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `from_name` varchar(100) NOT NULL,
  `to_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `chat`
--

INSERT INTO `chat` (`id`, `from`, `to`, `message`, `sent`, `recd`, `from_name`, `to_name`) VALUES
(52, '1', '1', 'sdds', '2017-08-24 13:50:34', 0, 'test', 'test test'),
(53, '1', '2562', 'sds', '2017-08-24 13:50:37', 0, 'test', 'Justus Justus'),
(54, '1', '3', 'asd', '2017-08-24 13:50:40', 0, 'test', 'client client'),
(56, '1', '3', 'x', '2017-08-24 14:01:00', 0, 'test', 'client client'),
(57, '1', '2562', 'xxxx', '2017-08-24 14:01:02', 0, 'test', 'Justus Justus'),
(59, '1', '3', '.l', '2017-08-24 14:01:20', 0, 'test', 'client client'),
(60, '1', '2562', ';l', '2017-08-24 14:01:22', 0, 'test', 'Justus Justus'),
(61, '1', '1', 'dfgh@g.com', '2017-08-24 14:01:26', 0, 'test', 'test test'),
(62, '1', '2562', ';ldas', '2017-08-24 14:01:29', 0, 'test', 'Justus Justus'),
(63, '1', '3', 'daSD', '2017-08-24 14:01:30', 0, 'test', 'client client'),
(67, '1', '3', 'asd', '2017-08-24 14:15:30', 0, 'test', 'client client'),
(68, '1', '2562', 'asd', '2017-08-24 14:15:33', 0, 'test', 'Justus Justus');

-- --------------------------------------------------------

--
-- Структура таблицы `ci_last_seen`
--

CREATE TABLE `ci_last_seen` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `message_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `ci_last_seen`
--

INSERT INTO `ci_last_seen` (`id`, `user_id`, `message_id`) VALUES
(1, 551, 8),
(2, 23, 11);

-- --------------------------------------------------------

--
-- Структура таблицы `ci_messages`
--

CREATE TABLE `ci_messages` (
  `id` int(11) NOT NULL,
  `from` int(11) NOT NULL,
  `to` int(11) NOT NULL,
  `message` text NOT NULL,
  `is_read` enum('0','1') NOT NULL DEFAULT '0',
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `ci_messages`
--

INSERT INTO `ci_messages` (`id`, `from`, `to`, `message`, `is_read`, `time`) VALUES
(1, 12, 0, 'rweq', '0', '2017-07-24 02:16:05'),
(2, 12, 0, 'sfsdf', '0', '2017-08-01 05:31:38'),
(3, 12, 23, 'fsdaf', '0', '2017-08-01 05:31:47'),
(4, 12, 0, 'fsadf', '0', '2017-08-01 05:31:50'),
(5, 12, 23, 'fsdaf', '0', '2017-08-01 05:31:53'),
(6, 12, 19, 'fsadas', '0', '2017-08-01 05:32:07'),
(7, 12, 65, 'dsfg', '0', '2017-08-01 06:23:42'),
(8, 12, 5231, 'dfg', '0', '2017-08-01 06:23:46'),
(9, 12, 19, 'gdfg', '0', '2017-08-01 06:23:52'),
(10, 12, 65, 'rtheye', '0', '2017-08-01 06:31:56'),
(11, 12, 65, 'hello there', '0', '2017-08-01 06:32:09'),
(12, 12, 123, 'hgj', '0', '2017-08-01 08:10:09'),
(13, 12, 19, 'jkk;', '0', '2017-08-01 08:10:11'),
(14, 12, 5231, 'jkljkl', '0', '2017-08-01 08:10:13'),
(15, 12, 65, '..m,.', '0', '2017-08-01 08:10:16'),
(16, 2, 4, 'fsdf', '0', '2017-08-24 05:41:26'),
(17, 2, 1, 'fsdf', '0', '2017-08-24 05:41:30'),
(18, 2, 3, 'fsdf', '0', '2017-08-24 05:41:34'),
(19, 2, 3, 'dfsdf', '0', '2017-08-24 05:45:47'),
(20, 2, 1, 'fsdfs', '0', '2017-08-24 05:45:53'),
(21, 2, 4, 'sffsd', '0', '2017-08-24 05:46:01'),
(22, 2562, 3, 'fgh', '0', '2017-08-31 13:26:50'),
(23, 2566, 2562, 'd', '0', '2017-09-01 03:45:38');

-- --------------------------------------------------------

--
-- Структура таблицы `ci_sessions`
--

CREATE TABLE `ci_sessions` (
  `id` varchar(40) NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `timestamp` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `data` blob NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=cp1251;

-- --------------------------------------------------------

--
-- Структура таблицы `configs`
--

CREATE TABLE `configs` (
  `id` int(11) NOT NULL,
  `paypal` varchar(50) NOT NULL,
  `writerpay` varchar(11) NOT NULL,
  `wordsperpage` int(11) NOT NULL,
  `client_own_price` varchar(10) NOT NULL,
  `upload` varchar(100) NOT NULL,
  `time_difference` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `configs`
--

INSERT INTO `configs` (`id`, `paypal`, `writerpay`, `wordsperpage`, `client_own_price`, `upload`, `time_difference`) VALUES
(1, 'alexander.bondarenko1968@gmail.com', '0.5', 275, 'NO', 'uploads', 0.33);

-- --------------------------------------------------------

--
-- Структура таблицы `country`
--

CREATE TABLE `country` (
  `id` int(11) NOT NULL,
  `CountryName` varchar(40) CHARACTER SET latin1 NOT NULL,
  `Capital` varchar(80) CHARACTER SET latin1 NOT NULL,
  `CurrencyName` varchar(80) CHARACTER SET latin1 NOT NULL,
  `countryCode` char(3) CHARACTER SET latin1 DEFAULT NULL,
  `Phonecode` varchar(60) CHARACTER SET latin1 DEFAULT NULL,
  `currencyxchange` varchar(10) CHARACTER SET latin1 NOT NULL,
  `ISO` varchar(30) CHARACTER SET latin1 NOT NULL,
  `ISO2` varchar(20) CHARACTER SET latin1 NOT NULL,
  `ISO3` varchar(20) CHARACTER SET latin1 NOT NULL,
  `customer_enable` int(10) NOT NULL,
  `writer_enable` int(10) NOT NULL,
  `accepted_currency` int(10) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `country`
--

INSERT INTO `country` (`id`, `CountryName`, `Capital`, `CurrencyName`, `countryCode`, `Phonecode`, `currencyxchange`, `ISO`, `ISO2`, `ISO3`, `customer_enable`, `writer_enable`, `accepted_currency`) VALUES
(1, 'Afghanistan', 'Kabul', 'Afghanistan Afghani', 'AFN', '93', '1', '', '', '', 1, 1, 0),
(2, 'Albania', 'Tirana', 'Albanian Lek', 'ALL', '355', '1', '', '', '', 1, 1, 0),
(3, 'Algeria', 'Algiers', 'Algerian Dinar', 'DZD', '213', '1', '', '', '', 1, 1, 0),
(4, 'American Samoa', 'Pago Pago', 'US Dollar', 'USD', '684', '1', '', '', '', 1, 1, 1),
(5, 'Andorra', 'Andorra', 'Euro', 'EUR', '376', '0.89', '', '', '', 1, 1, 1),
(6, 'Angola', 'Luanda', 'Angolan Kwanza', 'AOA', '244', '1', '', '', '', 1, 1, 0),
(7, 'Anguilla', 'The Valley', 'East Caribbean Dollar', 'XCD', '1-264', '1', '', '', '', 1, 1, 0),
(8, 'Antarctica', 'None', 'East Caribbean Dollar', 'XCD', '672', '1', '', '', '', 1, 1, 0),
(9, 'Antigua and Barbuda', 'St. Johns', 'East Caribbean Dollar', 'XCD', '1-268', '1', '', '', '', 1, 1, 0),
(10, 'Argentina', 'Buenos Aires', 'Argentine Peso', 'ARS', '54', '1', '', '', '', 1, 1, 0),
(11, 'Armenia', 'Yerevan', 'Armenian Dram', 'AMD', '374', '1', '', '', '', 1, 1, 0),
(12, 'Aruba', 'Oranjestad', 'Aruban Guilder', 'AWG', '297', '1', '', '', '', 1, 1, 0),
(13, 'Australia', 'Canberra', 'Australian Dollar', 'AUD', '61', '1.3', '', '', '', 1, 1, 1),
(14, 'Austria', 'Vienna', 'Euro', 'EUR', '43', '1', '', '', '', 1, 1, 0),
(15, 'Azerbaijan', 'Baku', 'Azerbaijan New Manat', 'AZN', '994', '1', '', '', '', 1, 1, 0),
(16, 'Bahamas', 'Nassau', 'Bahamian Dollar', 'BSD', '1-242', '1', '', '', '', 1, 1, 0),
(17, 'Bahrain', 'Al-Manamah', 'Bahraini Dinar', 'BHD', '973', '1', '', '', '', 1, 1, 0),
(18, 'Bangladesh', 'Dhaka', 'Bangladeshi Taka', 'BDT', '880', '1', '', '', '', 1, 1, 0),
(19, 'Barbados', 'Bridgetown', 'Barbados Dollar', 'BBD', '1-246', '1', '', '', '', 1, 1, 0),
(20, 'Belarus', 'Minsk', 'Belarussian Ruble', 'BYR', '375', '1', '', '', '', 1, 1, 0),
(21, 'Belgium', 'Brussels', 'Euro', 'EUR', '32', '1', '', '', '', 1, 1, 0),
(22, 'Belize', 'Belmopan', 'Belize Dollar', 'BZD', '501', '1', '', '', '', 1, 1, 0),
(23, 'Benin', 'Porto-Novo', 'CFA Franc BCEAO', 'XOF', '229', '1', '', '', '', 1, 1, 0),
(24, 'Bermuda', 'Hamilton', 'Bermudian Dollar', 'BMD', '1-441', '1', '', '', '', 1, 1, 0),
(25, 'Bhutan', 'Thimphu', 'Bhutan Ngultrum', 'BTN', '975', '1', '', '', '', 1, 1, 0),
(26, 'Bolivia', 'La Paz', 'Boliviano', 'BOB', '591', '1', '', '', '', 1, 1, 0),
(27, 'Bosnia-Herzegovina', 'Sarajevo', 'Marka', 'BAM', '387', '1', '', '', '', 1, 1, 0),
(28, 'Botswana', 'Gaborone', 'Botswana Pula', 'BWP', '267', '1', '', '', '', 1, 1, 0),
(29, 'Bouvet Island', 'None', 'Norwegian Krone', 'NOK', '', '1', '', '', '', 1, 1, 0),
(30, 'Brazil', 'Brasilia', 'Brazilian Real', 'BRL', '55', '1', '', '', '', 1, 1, 0),
(31, 'British Indian Ocean Territory', 'None', 'US Dollar', 'USD', '', '1', '', '', '', 1, 1, 0),
(32, 'Brunei Darussalam', 'Bandar Seri Begawan', 'Brunei Dollar', 'BND', '673', '1', '', '', '', 1, 1, 0),
(33, 'Bulgaria', 'Sofia', 'Bulgarian Lev', 'BGN', '359', '1', '', '', '', 1, 1, 0),
(34, 'Burkina Faso', 'Ouagadougou', 'CFA Franc BCEAO', 'XOF', '226', '1', '', '', '', 1, 1, 0),
(35, 'Burundi', 'Bujumbura', 'Burundi Franc', 'BIF', '257', '1', '', '', '', 1, 1, 0),
(36, 'Cambodia', 'Phnom Penh', 'Kampuchean Riel', 'KHR', '855', '1', '', '', '', 1, 1, 0),
(37, 'Cameroon', 'Yaounde', 'CFA Franc BEAC', 'XAF', '237', '1', '', '', '', 1, 1, 0),
(38, 'Canada', 'Ottawa', 'Canadian Dollar', 'CAD', '1', '1', '', '', '', 1, 1, 0),
(39, 'Cape Verde', 'Praia', 'Cape Verde Escudo', 'CVE', '238', '1', '', '', '', 1, 1, 0),
(40, 'Cayman Islands', 'Georgetown', 'Cayman Islands Dollar', 'KYD', '1-345', '1', '', '', '', 1, 1, 0),
(41, 'Central African Republic', 'Bangui', 'CFA Franc BEAC', 'XAF', '236', '1', '', '', '', 1, 1, 0),
(42, 'Chad', 'N\'Djamena', 'CFA Franc BEAC', 'XAF', '235', '1', '', '', '', 1, 1, 0),
(43, 'Chile', 'Santiago', 'Chilean Peso', 'CLP', '56', '1', '', '', '', 1, 1, 0),
(44, 'China', 'Beijing', 'Yuan Renminbi', 'CNY', '86', '1', '', '', '', 1, 1, 0),
(45, 'Christmas Island', 'The Settlement', 'Australian Dollar', 'AUD', '61', '1', '', '', '', 1, 1, 0),
(46, 'Cocos (Keeling) Islands', 'West Island', 'Australian Dollar', 'AUD', '61', '1', '', '', '', 1, 1, 0),
(47, 'Colombia', 'Bogota', 'Colombian Peso', 'COP', '57', '1', '', '', '', 1, 1, 0),
(48, 'Comoros', 'Moroni', 'Comoros Franc', 'KMF', '269', '1', '', '', '', 1, 1, 0),
(49, 'Congo', 'Brazzaville', 'CFA Franc BEAC', 'XAF', '242', '1', '', '', '', 1, 1, 0),
(50, 'Congo, Dem. Republic', 'Kinshasa', 'Francs', 'CDF', '243', '1', '', '', '', 1, 1, 0),
(51, 'Cook Islands', 'Avarua', 'New Zealand Dollar', 'NZD', '682', '1', '', '', '', 1, 1, 0),
(52, 'Costa Rica', 'San Jose', 'Costa Rican Colon', 'CRC', '506', '1', '', '', '', 1, 1, 0),
(53, 'Croatia', 'Zagreb', 'Croatian Kuna', 'HRK', '385', '1', '', '', '', 1, 1, 0),
(54, 'Cuba', 'Havana', 'Cuban Peso', 'CUP', '53', '1', '', '', '', 1, 1, 0),
(55, 'Cyprus', 'Nicosia', 'Euro', 'EUR', '357', '1', '', '', '', 1, 1, 0),
(56, 'Czech Rep.', 'Prague', 'Czech Koruna', 'CZK', '420', '1', '', '', '', 1, 1, 0),
(57, 'Denmark', 'Copenhagen', 'Danish Krone', 'DKK', '45', '1', '', '', '', 1, 1, 0),
(58, 'Djibouti', 'Djibouti', 'Djibouti Franc', 'DJF', '253', '1', '', '', '', 1, 1, 0),
(59, 'Dominica', 'Roseau', 'East Caribbean Dollar', 'XCD', '1-767', '1', '', '', '', 1, 1, 0),
(60, 'Dominican Republic', 'Santo Domingo', 'Dominican Peso', 'DOP', '809', '1', '', '', '', 1, 1, 0),
(61, 'Ecuador', 'Quito', 'Ecuador Sucre', 'ECS', '593', '1', '', '', '', 1, 1, 0),
(62, 'Egypt', 'Cairo', 'Egyptian Pound', 'EGP', '20', '1', '', '', '', 1, 1, 0),
(63, 'El Salvador', 'San Salvador', 'El Salvador Colon', 'SVC', '503', '1', '', '', '', 1, 1, 0),
(64, 'Equatorial Guinea', 'Malabo', 'CFA Franc BEAC', 'XAF', '240', '1', '', '', '', 1, 1, 0),
(65, 'Eritrea', 'Asmara', 'Eritrean Nakfa', 'ERN', '291', '1', '', '', '', 1, 1, 0),
(66, 'Estonia', 'Tallinn', 'Euro', 'EUR', '372', '1', '', '', '', 1, 1, 0),
(67, 'Ethiopia', 'Addis Ababa', 'Ethiopian Birr', 'ETB', '251', '1', '', '', '', 1, 1, 0),
(68, 'European Union', 'Brussels', 'Euro', 'EUR', '', '1', '', '', '', 1, 1, 0),
(69, 'Falkland Islands (Malvinas)', 'Stanley', 'Falkland Islands Pound', 'FKP', '500', '1', '', '', '', 1, 1, 0),
(70, 'Faroe Islands', 'Torshavn', 'Danish Krone', 'DKK', '298', '1', '', '', '', 1, 1, 0),
(71, 'Fiji', 'Suva', 'Fiji Dollar', 'FJD', '679', '1', '', '', '', 1, 1, 0),
(72, 'Finland', 'Helsinki', 'Euro', 'EUR', '358', '1', '', '', '', 1, 1, 0),
(73, 'France', 'Paris', 'Euro', 'EUR', '33', '1', '', '', '', 1, 1, 0),
(74, 'French Guiana', 'Cayenne', 'Euro', 'EUR', '594', '1', '', '', '', 1, 1, 0),
(75, 'French Southern Territories', 'None', 'Euro', 'EUR', '', '1', '', '', '', 1, 1, 0),
(76, 'Gabon', 'Libreville', 'CFA Franc BEAC', 'XAF', '241', '1', '', '', '', 1, 1, 0),
(77, 'Gambia', 'Banjul', 'Gambian Dalasi', 'GMD', '220', '1', '', '', '', 1, 1, 0),
(78, 'Georgia', 'Tbilisi', 'Georgian Lari', 'GEL', '995', '1', '', '', '', 1, 1, 0),
(79, 'Germany', 'Berlin', 'Euro', 'EUR', '49', '1', '', '', '', 1, 1, 0),
(80, 'Ghana', 'Accra', 'Ghanaian Cedi', 'GHS', '233', '1', '', '', '', 1, 1, 0),
(81, 'Gibraltar', 'Gibraltar', 'Gibraltar Pound', 'GIP', '350', '1', '', '', '', 1, 1, 0),
(82, 'Great Britain', 'London', 'Pound Sterling', 'GBP', '44', '0.69', '', '', '', 1, 1, 1),
(83, 'Greece', 'Athens', 'Euro', 'EUR', '30', '1', '', '', '', 1, 1, 0),
(84, 'Greenland', 'Godthab', 'Danish Krone', 'DKK', '299', '1', '', '', '', 1, 1, 0),
(85, 'Grenada', 'St. George\'s', 'East Carribean Dollar', 'XCD', '1-473', '1', '', '', '', 1, 1, 0),
(86, 'Guadeloupe (French)', 'Basse-Terre', 'Euro', 'EUR', '590', '1', '', '', '', 1, 1, 0),
(87, 'Guam (USA)', 'Agana', 'US Dollar', 'USD', '1-671', '1', '', '', '', 1, 1, 0),
(88, 'Guatemala', 'Guatemala City', 'Guatemalan Quetzal', 'QTQ', '502', '1', '', '', '', 1, 1, 0),
(89, 'Guernsey', 'St. Peter Port', 'Pound Sterling', 'GGP', '', '1', '', '', '', 1, 1, 0),
(90, 'Guinea', 'Conakry', 'Guinea Franc', 'GNF', '224', '1', '', '', '', 1, 1, 0),
(91, 'Guinea Bissau', 'Bissau', 'Guinea-Bissau Peso', 'GWP', '245', '1', '', '', '', 1, 1, 0),
(92, 'Guyana', 'Georgetown', 'Guyana Dollar', 'GYD', '592', '1', '', '', '', 1, 1, 0),
(93, 'Haiti', 'Port-au-Prince', 'Haitian Gourde', 'HTG', '509', '1', '', '', '', 1, 1, 0),
(94, 'Heard Island and McDonald Islands', 'None', 'Australian Dollar', 'AUD', '', '1', '', '', '', 1, 1, 0),
(95, 'Honduras', 'Tegucigalpa', 'Honduran Lempira', 'HNL', '504', '1', '', '', '', 1, 1, 0),
(96, 'Hong Kong', 'Victoria', 'Hong Kong Dollar', 'HKD', '852', '1', '', '', '', 1, 1, 0),
(97, 'Hungary', 'Budapest', 'Hungarian Forint', 'HUF', '36', '1', '', '', '', 1, 1, 0),
(98, 'Iceland', 'Reykjavik', 'Iceland Krona', 'ISK', '354', '1', '', '', '', 1, 1, 0),
(99, 'India', 'New Delhi', 'Indian Rupee', 'INR', '91', '1', '', '', '', 1, 1, 0),
(100, 'Indonesia', 'Jakarta', 'Indonesian Rupiah', 'IDR', '62', '1', '', '', '', 1, 1, 0),
(101, 'International', '', '', '', '', '1', '', '', '', 1, 1, 0),
(102, 'Iran', 'Tehran', 'Iranian Rial', 'IRR', '98', '1', '', '', '', 1, 1, 0),
(103, 'Iraq', 'Baghdad', 'Iraqi Dinar', 'IQD', '964', '1', '', '', '', 1, 1, 0),
(104, 'Ireland', 'Dublin', 'Euro', 'EUR', '353', '1', '', '', '', 1, 1, 0),
(105, 'Isle of Man', 'Douglas', 'Pound Sterling', 'GBP', '', '1', '', '', '', 1, 1, 0),
(106, 'Israel', 'Jerusalem', 'Israeli New Shekel', 'ILS', '972', '1', '', '', '', 1, 1, 0),
(107, 'Italy', 'Rome', 'Euro', 'EUR', '39', '1', '', '', '', 1, 1, 0),
(108, 'Ivory Coast', 'Abidjan', 'CFA Franc BCEAO', 'XOF', '225', '1', '', '', '', 1, 1, 0),
(109, 'Jamaica', 'Kingston', 'Jamaican Dollar', 'JMD', '1-876', '1', '', '', '', 1, 1, 0),
(110, 'Japan', 'Tokyo', 'Japanese Yen', 'JPY', '81', '1', '', '', '', 1, 1, 0),
(111, 'Jersey', 'Saint Helier', 'Pound Sterling', 'GBP', '', '1', '', '', '', 1, 1, 0),
(112, 'Jordan', 'Amman', 'Jordanian Dinar', 'JOD', '962', '1', '', '', '', 1, 1, 0),
(113, 'Kazakhstan', 'Astana', 'Kazakhstan Tenge', 'KZT', '7', '1', '', '', '', 1, 1, 0),
(114, 'Kenya', 'Nairobi', 'Kenyan Shilling', 'KES', '254', '1', '', '', '', 1, 1, 0),
(115, 'Kiribati', 'Tarawa', 'Australian Dollar', 'AUD', '686', '1', '', '', '', 1, 1, 0),
(116, 'Korea-North', 'Pyongyang', 'North Korean Won', 'KPW', '850', '1', '', '', '', 1, 1, 0),
(117, 'Korea-South', 'Seoul', 'Korean Won', 'KRW', '82', '1', '', '', '', 1, 1, 0),
(118, 'Kuwait', 'Kuwait City', 'Kuwaiti Dinar', 'KWD', '965', '1', '', '', '', 1, 1, 0),
(119, 'Kyrgyzstan', 'Bishkek', 'Som', 'KGS', '996', '1', '', '', '', 1, 1, 0),
(120, 'Laos', 'Vientiane', 'Lao Kip', 'LAK', '856', '1', '', '', '', 1, 1, 0),
(121, 'Latvia', 'Riga', 'Latvian Lats', 'LVL', '371', '1', '', '', '', 1, 1, 0),
(122, 'Lebanon', 'Beirut', 'Lebanese Pound', 'LBP', '961', '1', '', '', '', 1, 1, 0),
(123, 'Lesotho', 'Maseru', 'Lesotho Loti', 'LSL', '266', '1', '', '', '', 1, 1, 0),
(124, 'Liberia', 'Monrovia', 'Liberian Dollar', 'LRD', '231', '1', '', '', '', 1, 1, 0),
(125, 'Libya', 'Tripoli', 'Libyan Dinar', 'LYD', '218', '1', '', '', '', 1, 1, 0),
(126, 'Liechtenstein', 'Vaduz', 'Swiss Franc', 'CHF', '423', '1', '', '', '', 1, 1, 0),
(127, 'Lithuania', 'Vilnius', 'Lithuanian Litas', 'LTL', '370', '1', '', '', '', 1, 1, 0),
(128, 'Luxembourg', 'Luxembourg', 'Euro', 'EUR', '352', '1', '', '', '', 1, 1, 0),
(129, 'Macau', 'Macau', 'Macau Pataca', 'MOP', '853', '1', '', '', '', 1, 1, 0),
(130, 'Macedonia', 'Skopje', 'Denar', 'MKD', '389', '1', '', '', '', 1, 1, 0),
(131, 'Madagascar', 'Antananarivo', 'Malagasy Franc', 'MGF', '261', '1', '', '', '', 1, 1, 0),
(132, 'Malawi', 'Lilongwe', 'Malawi Kwacha', 'MWK', '265', '1', '', '', '', 1, 1, 0),
(133, 'Malaysia', 'Kuala Lumpur', 'Malaysian Ringgit', 'MYR', '60', '1', '', '', '', 1, 1, 0),
(134, 'Maldives', 'Male', 'Maldive Rufiyaa', 'MVR', '960', '1', '', '', '', 1, 1, 0),
(135, 'Mali', 'Bamako', 'CFA Franc BCEAO', 'XOF', '223', '1', '', '', '', 1, 1, 0),
(136, 'Malta', 'Valletta', 'Euro', 'EUR', '356', '1', '', '', '', 1, 1, 0),
(137, 'Marshall Islands', 'Majuro', 'US Dollar', 'USD', '692', '1', '', '', '', 1, 1, 0),
(138, 'Martinique (French)', 'Fort-de-France', 'Euro', 'EUR', '596', '1', '', '', '', 1, 1, 0),
(139, 'Mauritania', 'Nouakchott', 'Mauritanian Ouguiya', 'MRO', '222', '1', '', '', '', 1, 1, 0),
(140, 'Mauritius', 'Port Louis', 'Mauritius Rupee', 'MUR', '230', '1', '', '', '', 1, 1, 0),
(141, 'Mayotte', 'Dzaoudzi', 'Euro', 'EUR', '269', '1', '', '', '', 1, 1, 0),
(142, 'Mexico', 'Mexico City', 'Mexican Nuevo Peso', 'MXN', '52', '1', '', '', '', 1, 1, 0),
(143, 'Micronesia', 'Palikir', 'US Dollar', 'USD', '691', '1', '', '', '', 1, 1, 0),
(144, 'Moldova', 'Kishinev', 'Moldovan Leu', 'MDL', '373', '1', '', '', '', 1, 1, 0),
(145, 'Monaco', 'Monaco', 'Euro', 'EUR', '377', '1', '', '', '', 1, 1, 0),
(146, 'Mongolia', 'Ulan Bator', 'Mongolian Tugrik', 'MNT', '976', '1', '', '', '', 1, 1, 0),
(147, 'Montenegro', 'Podgorica', 'Euro', 'EUR', '382', '1', '', '', '', 1, 1, 0),
(148, 'Montserrat', 'Plymouth', 'East Caribbean Dollar', 'XCD', '1-664', '1', '', '', '', 1, 1, 0),
(149, 'Morocco', 'Rabat', 'Moroccan Dirham', 'MAD', '212', '1', '', '', '', 1, 1, 0),
(150, 'Mozambique', 'Maputo', 'Mozambique Metical', 'MZN', '258', '1', '', '', '', 1, 1, 0),
(151, 'Myanmar', 'Naypyidaw', 'Myanmar Kyat', 'MMK', '95', '1', '', '', '', 1, 1, 0),
(152, 'Namibia', 'Windhoek', 'Namibian Dollar', 'NAD', '264', '1', '', '', '', 1, 1, 0),
(153, 'Nauru', 'Yaren', 'Australian Dollar', 'AUD', '674', '1', '', '', '', 1, 1, 0),
(154, 'Nepal', 'Kathmandu', 'Nepalese Rupee', 'NPR', '977', '1', '', '', '', 1, 1, 0),
(155, 'Netherlands', 'Amsterdam', 'Euro', 'EUR', '31', '1', '', '', '', 1, 1, 0),
(156, 'Netherlands Antilles', 'Willemstad', 'Netherlands Antillean Guilder', 'ANG', '599', '1', '', '', '', 1, 1, 0),
(157, 'New Caledonia (French)', 'Noumea', 'CFP Franc', 'XPF', '687', '1', '', '', '', 1, 1, 0),
(158, 'New Zealand', 'Wellington', 'New Zealand Dollar', 'NZD', '64', '1', '', '', '', 1, 1, 0),
(159, 'Nicaragua', 'Managua', 'Nicaraguan Cordoba Oro', 'NIO', '505', '1', '', '', '', 1, 1, 0),
(160, 'Niger', 'Niamey', 'CFA Franc BCEAO', 'XOF', '227', '1', '', '', '', 1, 1, 0),
(161, 'Nigeria', 'Lagos', 'Nigerian Naira', 'NGN', '234', '1', '', '', '', 1, 1, 0),
(162, 'Niue', 'Alofi', 'New Zealand Dollar', 'NZD', '683', '1', '', '', '', 1, 1, 0),
(163, 'Norfolk Island', 'Kingston', 'Australian Dollar', 'AUD', '672', '1', '', '', '', 1, 1, 0),
(164, 'Northern Mariana Islands', 'Saipan', 'US Dollar', 'USD', '670', '1', '', '', '', 1, 1, 0),
(165, 'Norway', 'Oslo', 'Norwegian Krone', 'NOK', '47', '1', '', '', '', 1, 1, 0),
(166, 'Oman', 'Muscat', 'Omani Rial', 'OMR', '968', '1', '', '', '', 1, 1, 0),
(167, 'Pakistan', 'Islamabad', 'Pakistan Rupee', 'PKR', '92', '1', '', '', '', 1, 1, 0),
(168, 'Palau', 'Koror', 'US Dollar', 'USD', '680', '1', '', '', '', 1, 1, 0),
(169, 'Panama', 'Panama City', 'Panamanian Balboa', 'PAB', '507', '1', '', '', '', 1, 1, 0),
(170, 'Papua New Guinea', 'Port Moresby', 'Papua New Guinea Kina', 'PGK', '675', '1', '', '', '', 1, 1, 0),
(171, 'Paraguay', 'Asuncion', 'Paraguay Guarani', 'PYG', '595', '1', '', '', '', 1, 1, 0),
(172, 'Peru', 'Lima', 'Peruvian Nuevo Sol', 'PEN', '51', '1', '', '', '', 1, 1, 0),
(173, 'Philippines', 'Manila', 'Philippine Peso', 'PHP', '63', '1', '', '', '', 1, 1, 0),
(174, 'Pitcairn Island', 'Adamstown', 'New Zealand Dollar', 'NZD', '', '1', '', '', '', 1, 1, 0),
(175, 'Poland', 'Warsaw', 'Polish Zloty', 'PLN', '48', '1', '', '', '', 1, 1, 0),
(176, 'Polynesia (French)', 'Papeete', 'CFP Franc', 'XPF', '689', '1', '', '', '', 1, 1, 0),
(177, 'Portugal', 'Lisbon', 'Euro', 'EUR', '351', '1', '', '', '', 1, 1, 0),
(178, 'Puerto Rico', 'San Juan', 'US Dollar', 'USD', '1-787', '1', '', '', '', 1, 1, 0),
(179, 'Qatar', 'Doha', 'Qatari Rial', 'QAR', '974', '1', '', '', '', 1, 1, 0),
(180, 'Reunion (French)', 'Saint-Denis', 'Euro', 'EUR', '262', '1', '', '', '', 1, 1, 0),
(181, 'Romania', 'Bucharest', 'Romanian New Leu', 'RON', '40', '1', '', '', '', 1, 1, 0),
(182, 'Russia', 'Moscow', 'Russian Ruble', 'RUB', '7', '1', '', '', '', 1, 1, 0),
(183, 'Rwanda', 'Kigali', 'Rwanda Franc', 'RWF', '250', '1', '', '', '', 1, 1, 0),
(184, 'Saint Helena', 'Jamestown', 'St. Helena Pound', 'SHP', '290', '1', '', '', '', 1, 1, 0),
(185, 'Saint Kitts & Nevis Anguilla', 'Basseterre', 'East Caribbean Dollar', 'XCD', '1-869', '1', '', '', '', 1, 1, 0),
(186, 'Saint Lucia', 'Castries', 'East Caribbean Dollar', 'XCD', '1-758', '1', '', '', '', 1, 1, 0),
(187, 'Saint Pierre and Miquelon', 'St. Pierre', 'Euro', 'EUR', '508', '1', '', '', '', 1, 1, 0),
(188, 'Saint Vincent & Grenadines', 'Kingstown', 'East Caribbean Dollar', 'XCD', '1-784', '1', '', '', '', 1, 1, 0),
(189, 'Samoa', 'Apia', 'Samoan Tala', 'WST', '684', '1', '', '', '', 1, 1, 0),
(190, 'San Marino', 'San Marino', 'Euro', 'EUR', '378', '1', '', '', '', 1, 1, 0),
(191, 'Sao Tome and Principe', 'Sao Tome', 'Dobra', 'STD', '239', '1', '', '', '', 1, 1, 0),
(192, 'Saudi Arabia', 'Riyadh', 'Saudi Riyal', 'SAR', '966', '1', '', '', '', 1, 1, 0),
(193, 'Senegal', 'Dakar', 'CFA Franc BCEAO', 'XOF', '221', '1', '', '', '', 1, 1, 0),
(194, 'Serbia', 'Belgrade', 'Dinar', 'RSD', '381', '1', '', '', '', 1, 1, 0),
(195, 'Seychelles', 'Victoria', 'Seychelles Rupee', 'SCR', '248', '1', '', '', '', 1, 1, 0),
(196, 'Sierra Leone', 'Freetown', 'Sierra Leone Leone', 'SLL', '232', '1', '', '', '', 1, 1, 0),
(197, 'Singapore', 'Singapore', 'Singapore Dollar', 'SGD', '65', '1', '', '', '', 1, 1, 0),
(198, 'Slovakia', 'Bratislava', 'Euro', 'EUR', '421', '1', '', '', '', 1, 1, 0),
(199, 'Slovenia', 'Ljubljana', 'Euro', 'EUR', '386', '1', '', '', '', 1, 1, 0),
(200, 'Solomon Islands', 'Honiara', 'Solomon Islands Dollar', 'SBD', '677', '1', '', '', '', 1, 1, 0),
(201, 'Somalia', 'Mogadishu', 'Somali Shilling', 'SOS', '252', '1', '', '', '', 1, 1, 0),
(202, 'South Africa', 'Pretoria', 'South African Rand', 'ZAR', '27', '1', '', '', '', 1, 1, 0),
(203, 'South Georgia & South Sandwich Islands', 'None', 'Pound Sterling', 'GBP', '', '1', '', '', '', 1, 1, 0),
(204, 'South Sudan', 'Ramciel', 'South Sudan Pound', 'SSP', '', '1', '', '', '', 1, 1, 0),
(205, 'Spain', 'Madrid', 'Euro', 'EUR', '34', '1', '', '', '', 1, 1, 0),
(206, 'Sri Lanka', 'Colombo', 'Sri Lanka Rupee', 'LKR', '94', '1', '', '', '', 1, 1, 0),
(207, 'Sudan', 'Khartoum', 'Sudanese Pound', 'SDG', '249', '1', '', '', '', 1, 1, 0),
(208, 'Suriname', 'Paramaribo', 'Surinam Dollar', 'SRD', '597', '1', '', '', '', 1, 1, 0),
(209, 'Svalbard and Jan Mayen Islands', 'Longyearbyen', 'Norwegian Krone', 'NOK', '', '1', '', '', '', 1, 1, 0),
(210, 'Swaziland', 'Mbabane', 'Swaziland Lilangeni', 'SZL', '268', '1', '', '', '', 1, 1, 0),
(211, 'Sweden', 'Stockholm', 'Swedish Krona', 'SEK', '46', '1', '', '', '', 1, 1, 0),
(212, 'Switzerland', 'Bern', 'Swiss Franc', 'CHF', '41', '1', '', '', '', 1, 1, 0),
(213, 'Syria', 'Damascus', 'Syrian Pound', 'SYP', '963', '1', '', '', '', 1, 1, 0),
(214, 'Taiwan', 'Taipei', 'Taiwan Dollar', 'TWD', '886', '1', '', '', '', 1, 1, 0),
(215, 'Tajikistan', 'Dushanbe', 'Tajik Somoni', 'TJS', '992', '1', '', '', '', 1, 1, 0),
(216, 'Tanzania', 'Dodoma', 'Tanzanian Shilling', 'TZS', '255', '1', '', '', '', 1, 1, 0),
(217, 'Thailand', 'Bangkok', 'Thai Baht', 'THB', '66', '1', '', '', '', 1, 1, 0),
(218, 'Togo', 'Lome', 'CFA Franc BCEAO', 'XOF', '228', '1', '', '', '', 1, 1, 0),
(219, 'Tokelau', 'None', 'New Zealand Dollar', 'NZD', '690', '1', '', '', '', 1, 1, 0),
(220, 'Tonga', 'Nuku\'alofa', 'Tongan Pa\'anga', 'TOP', '676', '1', '', '', '', 1, 1, 0),
(221, 'Trinidad and Tobago', 'Port of Spain', 'Trinidad and Tobago Dollar', 'TTD', '1-868', '1', '', '', '', 1, 1, 0),
(222, 'Tunisia', 'Tunis', 'Tunisian Dollar', 'TND', '216', '1', '', '', '', 1, 1, 0),
(223, 'Turkey', 'Ankara', 'Turkish Lira', 'TRY', '90', '1', '', '', '', 1, 1, 0),
(224, 'Turkmenistan', 'Ashgabat', 'Manat', 'TMT', '993', '1', '', '', '', 1, 1, 0),
(225, 'Turks and Caicos Islands', 'Grand Turk', 'US Dollar', 'USD', '1-649', '1', '', '', '', 1, 1, 0),
(226, 'Tuvalu', 'Funafuti', 'Australian Dollar', 'AUD', '688', '1', '', '', '', 1, 1, 0),
(227, 'U.K.', 'London', 'Pound Sterling', 'GBP', '44', '1', '', '', '', 1, 1, 0),
(228, 'USA', 'Washington', 'US Dollar', 'USD', '1', '1', '', '', '', 1, 1, 0),
(229, 'USA Minor Outlying Islands', 'None', 'US Dollar', 'USD', '', '1', '', '', '', 1, 1, 0),
(230, 'Uganda', 'Kampala', 'Uganda Shilling', 'UGX', '256', '1', '', '', '', 1, 1, 0),
(231, 'Ukraine', 'Kiev', 'Ukraine Hryvnia', 'UAH', '380', '1', '', '', '', 1, 1, 0),
(232, 'United Arab Emirates', 'Abu Dhabi', 'Arab Emirates Dirham', 'AED', '971', '1', '', '', '', 1, 1, 0),
(233, 'Uruguay', 'Montevideo', 'Uruguayan Peso', 'UYU', '598', '1', '', '', '', 1, 1, 0),
(234, 'Uzbekistan', 'Tashkent', 'Uzbekistan Sum', 'UZS', '998', '1', '', '', '', 1, 1, 0),
(235, 'Vanuatu', 'Port Vila', 'Vanuatu Vatu', 'VUV', '678', '1', '', '', '', 1, 1, 0),
(236, 'Vatican', 'Vatican City', 'Euro', 'EUR', '39', '1', '', '', '', 1, 1, 0),
(237, 'Venezuela', 'Caracas', 'Venezuelan Bolivar', 'VEF', '58', '1', '', '', '', 1, 1, 0),
(238, 'Vietnam', 'Hanoi', 'Vietnamese Dong', 'VND', '84', '1', '', '', '', 1, 1, 0),
(239, 'Virgin Islands (British)', 'Road Town', 'US Dollar', 'USD', '1-284', '1', '', '', '', 1, 1, 0),
(240, 'Virgin Islands (USA)', 'Charlotte Amalie', 'US Dollar', 'USD', '1-340', '1', '', '', '', 1, 1, 0),
(241, 'Wallis and Futuna Islands', 'Mata-Utu', 'CFP Franc', 'XPF', '681', '1', '', '', '', 1, 1, 0),
(242, 'Western Sahara', 'El Aaiun', 'Moroccan Dirham', 'MAD', '', '1', '', '', '', 1, 1, 0),
(243, 'Yemen', 'San\'a', 'Yemeni Rial', 'YER', '967', '1', '', '', '', 1, 1, 0),
(244, 'Zambia', 'Lusaka', 'Zambian Kwacha', 'ZMW', '260', '1', '', '', '', 1, 1, 0),
(245, 'Zimbabwe', 'Harare', 'Zimbabwe Dollar', 'ZWD', '263', '1', '', '', '', 1, 1, 0);

-- --------------------------------------------------------

--
-- Структура таблицы `customers`
--

CREATE TABLE `customers` (
  `id` int(10) UNSIGNED NOT NULL,
  `FirstName` varchar(50) NOT NULL,
  `LastName` varchar(50) NOT NULL DEFAULT '',
  `phone` varchar(50) NOT NULL DEFAULT '',
  `address` varchar(50) NOT NULL DEFAULT '',
  `city` varchar(50) NOT NULL DEFAULT '',
  `country` varchar(50) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `customers`
--

INSERT INTO `customers` (`id`, `FirstName`, `LastName`, `phone`, `address`, `city`, `country`) VALUES
(1, 'Carine ', 'Schmitt', '40.32.2555', '54, rue Royale', 'Nantes', 'France'),
(2, 'Jean', 'King', '7025551838', '8489 Strong St.', 'Las Vegas', 'USA'),
(3, 'Peter', 'Ferguson', '03 9520 4555', '636 St Kilda Road', 'Melbourne', 'Australia'),
(4, 'Janine ', 'Labrune', '40.67.8555', '67, rue des Cinquante Otages', 'Nantes', 'France'),
(5, 'Jonas ', 'Bergulfsen', '07-98 9555', 'Erling Skakkes gate 78', 'Stavern', 'Norway'),
(6, 'Susan', 'Nelson', '4155551450', '5677 Strong St.', 'San Rafael', 'USA'),
(7, 'Zbyszek ', 'Piestrzeniewicz', '(26) 642-7555', 'ul. Filtrowa 68', 'Warszawa', 'Poland'),
(8, 'Roland', 'Keitel', '+49 69 66 90 2555', 'Lyonerstr. 34', 'Frankfurt', 'Germany'),
(9, 'Julie', 'Murphy', '6505555787', '5557 North Pendale Street', 'San Francisco', 'USA'),
(10, 'Kwai', 'Lee', '2125557818', '897 Long Airport Avenue', 'NYC', 'USA'),
(11, 'Diego ', 'Freyre', '(91) 555 94 44', 'C/ Moralzarzal, 86', 'Madrid', 'Spain'),
(12, 'Christina ', 'Berglund', '0921-12 3555', 'Berguvsvägen  8', 'Luleå', 'Sweden'),
(13, 'Jytte ', 'Petersen', '31 12 3555', 'Vinbæltet 34', 'Kobenhavn', 'Denmark'),
(14, 'Mary ', 'Saveley', '78.32.5555', '2, rue du Commerce', 'Lyon', 'France'),
(15, 'Eric', 'Natividad', '+65 221 7555', 'Bronz Sok.', 'Singapore', 'Singapore'),
(16, 'Jeff', 'Young', '2125557413', '4092 Furth Circle', 'NYC', 'USA'),
(17, 'Kelvin', 'Leong', '2155551555', '7586 Pompton St.', 'Allentown', 'USA'),
(18, 'Juri', 'Hashimoto', '6505556809', '9408 Furth Circle', 'Burlingame', 'USA'),
(19, 'Wendy', 'Victorino', '+65 224 1555', '106 Linden Road Sandown', 'Singapore', 'Singapore'),
(20, 'Veysel', 'Oeztan', '+47 2267 3215', 'Brehmen St. 121', 'Bergen', 'Norway  '),
(21, 'Keith', 'Franco', '2035557845', '149 Spinnaker Dr.', 'New Haven', 'USA'),
(22, 'Isabel ', 'de Castro', '(1) 356-5555', 'Estrada da saúde n. 58', 'Lisboa', 'Portugal'),
(23, 'Martine ', 'Rancé', '20.16.1555', '184, chaussée de Tournai', 'Lille', 'France'),
(24, 'Marie', 'Bertrand', '(1) 42.34.2555', '265, boulevard Charonne', 'Paris', 'France'),
(25, 'Jerry', 'Tseng', '6175555555', '4658 Baden Av.', 'Cambridge', 'USA'),
(26, 'Julie', 'King', '2035552570', '25593 South Bay Ln.', 'Bridgewater', 'USA'),
(27, 'Mory', 'Kentary', '+81 06 6342 5555', '1-6-20 Dojima', 'Kita-ku', 'Japan'),
(28, 'Michael', 'Frick', '2125551500', '2678 Kingston Rd.', 'NYC', 'USA'),
(29, 'Matti', 'Karttunen', '90-224 8555', 'Keskuskatu 45', 'Helsinki', 'Finland'),
(30, 'Rachel', 'Ashworth', '(171) 555-1555', 'Fauntleroy Circus', 'Manchester', 'UK'),
(31, 'Dean', 'Cassidy', '+353 1862 1555', '25 Maiden Lane', 'Dublin', 'Ireland'),
(32, 'Leslie', 'Taylor', '6175558428', '16780 Pompton St.', 'Brickhaven', 'USA'),
(33, 'Elizabeth', 'Devon', '(171) 555-2282', '12, Berkeley Gardens Blvd', 'Liverpool', 'UK'),
(34, 'Yoshi ', 'Tamuri', '(604) 555-3392', '1900 Oak St.', 'Vancouver', 'Canada'),
(35, 'Miguel', 'Barajas', '6175557555', '7635 Spinnaker Dr.', 'Brickhaven', 'USA'),
(36, 'Julie', 'Young', '6265557265', '78934 Hillside Dr.', 'Pasadena', 'USA'),
(37, 'Brydey', 'Walker', '+612 9411 1555', 'Suntec Tower Three', 'Singapore', 'Singapore'),
(38, 'Frédérique ', 'Citeaux', '88.60.1555', '24, place Kléber', 'Strasbourg', 'France'),
(39, 'Mike', 'Gao', '+852 2251 1555', 'Bank of China Tower', 'Central Hong Kong', 'Hong Kong'),
(40, 'Eduardo ', 'Saavedra', '(93) 203 4555', 'Rambla de Cataluña, 23', 'Barcelona', 'Spain'),
(41, 'Mary', 'Young', '3105552373', '4097 Douglas Av.', 'Glendale', 'USA'),
(42, 'Horst ', 'Kloss', '0372-555188', 'Taucherstraße 10', 'Cunewalde', 'Germany'),
(43, 'Palle', 'Ibsen', '86 21 3555', 'Smagsloget 45', 'Århus', 'Denmark'),
(44, 'Jean ', 'Fresnière', '(514) 555-8054', '43 rue St. Laurent', 'Montréal', 'Canada'),
(45, 'Alejandra ', 'Camino', '(91) 745 6555', 'Gran Vía, 1', 'Madrid', 'Spain'),
(46, 'Valarie', 'Thompson', '7605558146', '361 Furth Circle', 'San Diego', 'USA'),
(47, 'Helen ', 'Bennett', '(198) 555-8888', 'Garden House', 'Cowes', 'UK'),
(48, 'Annette ', 'Roulet', '61.77.6555', '1 rue Alsace-Lorraine', 'Toulouse', 'France'),
(49, 'Renate ', 'Messner', '069-0555984', 'Magazinweg 7', 'Frankfurt', 'Germany'),
(50, 'Paolo ', 'Accorti', '011-4988555', 'Via Monte Bianco 34', 'Torino', 'Italy'),
(51, 'Daniel', 'Da Silva', '+33 1 46 62 7555', '27 rue du Colonel Pierre Avia', 'Paris', 'France'),
(52, 'Daniel ', 'Tonini', '30.59.8555', '67, avenue de l\'Europe', 'Versailles', 'France'),
(53, 'Henriette ', 'Pfalzheim', '0221-5554327', 'Mehrheimerstr. 369', 'Köln', 'Germany'),
(54, 'Elizabeth ', 'Lincoln', '(604) 555-4555', '23 Tsawassen Blvd.', 'Tsawassen', 'Canada'),
(55, 'Peter ', 'Franken', '089-0877555', 'Berliner Platz 43', 'München', 'Germany'),
(56, 'Anna', 'O\'Hara', '02 9936 8555', '201 Miller Street', 'North Sydney', 'Australia'),
(57, 'Giovanni ', 'Rovelli', '035-640555', 'Via Ludovico il Moro 22', 'Bergamo', 'Italy'),
(58, 'Adrian', 'Huxley', '+61 2 9495 8555', 'Monitor Money Building', 'Chatswood', 'Australia'),
(59, 'Marta', 'Hernandez', '6175558555', '39323 Spinnaker Dr.', 'Cambridge', 'USA'),
(60, 'Ed', 'Harrison', '+41 26 425 50 01', 'Rte des Arsenaux 41 ', 'Fribourg', 'Switzerland'),
(61, 'Mihael', 'Holz', '0897-034555', 'Grenzacherweg 237', 'Genève', 'Switzerland'),
(62, 'Jan', 'Klaeboe', '+47 2212 1555', 'Drammensveien 126A', 'Oslo', 'Norway  '),
(63, 'Bradley', 'Schuyler', '+31 20 491 9555', 'Kingsfordweg 151', 'Amsterdam', 'Netherlands'),
(64, 'Mel', 'Andersen', '030-0074555', 'Obere Str. 57', 'Berlin', 'Germany'),
(65, 'Pirkko', 'Koskitalo', '981-443655', 'Torikatu 38', 'Oulu', 'Finland'),
(66, 'Catherine ', 'Dewey', '(02) 5554 67', 'Rue Joseph-Bens 532', 'Bruxelles', 'Belgium'),
(67, 'Steve', 'Frick', '9145554562', '3758 North Pendale Street', 'White Plains', 'USA'),
(68, 'Wing', 'Huang', '5085559555', '4575 Hillside Dr.', 'New Bedford', 'USA'),
(69, 'Julie', 'Brown', '6505551386', '7734 Strong St.', 'San Francisco', 'USA'),
(70, 'Mike', 'Graham', '+64 9 312 5555', '162-164 Grafton Road', 'Auckland  ', 'New Zealand'),
(71, 'Ann ', 'Brown', '(171) 555-0297', '35 King George', 'London', 'UK'),
(72, 'William', 'Brown', '2015559350', '7476 Moss Rd.', 'Newark', 'USA'),
(73, 'Ben', 'Calaghan', '61-7-3844-6555', '31 Duncan St. West End', 'South Brisbane', 'Australia'),
(74, 'Kalle', 'Suominen', '+358 9 8045 555', 'Software Engineering Center', 'Espoo', 'Finland'),
(75, 'Philip ', 'Cramer', '0555-09555', 'Maubelstr. 90', 'Brandenburg', 'Germany'),
(76, 'Francisca', 'Cervantes', '2155554695', '782 First Street', 'Philadelphia', 'USA'),
(77, 'Jesus', 'Fernandez', '+34 913 728 555', 'Merchants House', 'Madrid', 'Spain'),
(78, 'Brian', 'Chandler', '2155554369', '6047 Douglas Av.', 'Los Angeles', 'USA'),
(79, 'Patricia ', 'McKenna', '2967 555', '8 Johnstown Road', 'Cork', 'Ireland'),
(80, 'Laurence ', 'Lebihan', '91.24.4555', '12, rue des Bouchers', 'Marseille', 'France'),
(81, 'Paul ', 'Henriot', '26.47.1555', '59 rue de l\'Abbaye', 'Reims', 'France'),
(82, 'Armand', 'Kuger', '+27 21 550 3555', '1250 Pretorius Street', 'Hatfield', 'South Africa'),
(83, 'Wales', 'MacKinlay', '64-9-3763555', '199 Great North Road', 'Auckland', 'New Zealand'),
(84, 'Karin', 'Josephs', '0251-555259', 'Luisenstr. 48', 'Münster', 'Germany'),
(85, 'Juri', 'Yoshido', '6175559555', '8616 Spinnaker Dr.', 'Boston', 'USA'),
(86, 'Dorothy', 'Young', '6035558647', '2304 Long Airport Avenue', 'Nashua', 'USA'),
(87, 'Lino ', 'Rodriguez', '(1) 354-2555', 'Jardim das rosas n. 32', 'Lisboa', 'Portugal'),
(88, 'Braun', 'Urs', '0452-076555', 'Hauptstr. 29', 'Bern', 'Switzerland'),
(89, 'Allen', 'Nelson', '6175558555', '7825 Douglas Av.', 'Brickhaven', 'USA'),
(90, 'Pascale ', 'Cartrain', '(071) 23 67 2555', 'Boulevard Tirou, 255', 'Charleroi', 'Belgium'),
(91, 'Georg ', 'Pipps', '6562-9555', 'Geislweg 14', 'Salzburg', 'Austria'),
(92, 'Arnold', 'Cruz', '+63 2 555 3587', '15 McCallum Street', 'Makati City', 'Philippines'),
(93, 'Maurizio ', 'Moroni', '0522-556555', 'Strada Provinciale 124', 'Reggio Emilia', 'Italy'),
(94, 'Akiko', 'Shimamura', '+81 3 3584 0555', '2-2-8 Roppongi', 'Minato-ku', 'Japan'),
(95, 'Dominique', 'Perrier', '(1) 47.55.6555', '25, rue Lauriston', 'Paris', 'France'),
(96, 'Rita ', 'Müller', '0711-555361', 'Adenauerallee 900', 'Stuttgart', 'Germany'),
(97, 'Sarah', 'McRoy', '04 499 9555', '101 Lambton Quay', 'Wellington', 'New Zealand'),
(98, 'Michael', 'Donnermeyer', ' +49 89 61 08 9555', 'Hansastr. 15', 'Munich', 'Germany'),
(99, 'Maria', 'Hernandez', '2125558493', '5905 Pompton St.', 'NYC', 'USA'),
(100, 'Alexander ', 'Feuer', '0342-555176', 'Heerstr. 22', 'Leipzig', 'Germany'),
(101, 'Dan', 'Lewis', '2035554407', '2440 Pompton St.', 'Glendale', 'USA'),
(102, 'Martha', 'Larsson', '0695-34 6555', 'Åkergatan 24', 'Bräcke', 'Sweden'),
(103, 'Sue', 'Frick', '4085553659', '3086 Ingle Ln.', 'San Jose', 'USA'),
(104, 'Roland ', 'Mendel', '7675-3555', 'Kirchgasse 6', 'Graz', 'Austria'),
(105, 'Leslie', 'Murphy', '2035559545', '567 North Pendale Street', 'New Haven', 'USA'),
(106, 'Yu', 'Choi', '2125551957', '5290 North Pendale Street', 'NYC', 'USA'),
(107, 'Martín ', 'Sommer', '(91) 555 22 82', 'C/ Araquil, 67', 'Madrid', 'Spain'),
(108, 'Sven ', 'Ottlieb', '0241-039123', 'Walserweg 21', 'Aachen', 'Germany'),
(109, 'Violeta', 'Benitez', '5085552555', '1785 First Street', 'New Bedford', 'USA'),
(110, 'Carmen', 'Anton', '+34 913 728555', 'c/ Gobelas, 19-1 Urb. La Florida', 'Madrid', 'Spain'),
(111, 'Sean', 'Clenahan', '61-9-3844-6555', '7 Allen Street', 'Glen Waverly', 'Australia'),
(112, 'Franco', 'Ricotti', '+39 022515555', '20093 Cologno Monzese', 'Milan', 'Italy'),
(113, 'Steve', 'Thompson', '3105553722', '3675 Furth Circle', 'Burbank', 'USA'),
(114, 'Hanna ', 'Moos', '0621-08555', 'Forsterstr. 57', 'Mannheim', 'Germany'),
(115, 'Alexander ', 'Semenov', '+7 812 293 0521', '2 Pobedy Square', 'Saint Petersburg', 'Russia'),
(116, 'Raanan', 'Altagar,G M', '+ 972 9 959 8555', '3 Hagalim Blv.', 'Herzlia', 'Israel'),
(117, 'José Pedro ', 'Roel', '(95) 555 82 82', 'C/ Romero, 33', 'Sevilla', 'Spain'),
(118, 'Rosa', 'Salazar', '2155559857', '11328 Douglas Av.', 'Philadelphia', 'USA'),
(119, 'Sue', 'Taylor', '4155554312', '2793 Furth Circle', 'Brisbane', 'USA'),
(120, 'Thomas ', 'Smith', '(171) 555-7555', '120 Hanover Sq.', 'London', 'UK'),
(121, 'Valarie', 'Franco', '6175552555', '6251 Ingle Ln.', 'Boston', 'USA'),
(122, 'Tony', 'Snowden', '+64 9 5555500', 'Arenales 1938 3\'A\'', 'Auckland  ', 'New Zealand');

-- --------------------------------------------------------

--
-- Структура таблицы `essay_document_access`
--

CREATE TABLE `essay_document_access` (
  `id` int(11) NOT NULL,
  `accessor_id` varchar(50) NOT NULL,
  `accessor_name` varchar(70) NOT NULL,
  `access_type` varchar(50) NOT NULL,
  `access_alias` varchar(200) NOT NULL,
  `access_date` date NOT NULL,
  `access_credit` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `essay_subscribers`
--

CREATE TABLE `essay_subscribers` (
  `id` int(11) NOT NULL,
  `subscriber_id` varchar(50) NOT NULL,
  `subscriber_name` varchar(150) NOT NULL,
  `subscription_trans_id` varchar(40) NOT NULL,
  `subscription_date` date NOT NULL,
  `subscription_end_date` date NOT NULL,
  `subscription_plan` varchar(30) NOT NULL,
  `subscription_amount` decimal(11,2) NOT NULL,
  `subscription_pay_method` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `essay_subscribers`
--

INSERT INTO `essay_subscribers` (`id`, `subscriber_id`, `subscriber_name`, `subscription_trans_id`, `subscription_date`, `subscription_end_date`, `subscription_plan`, `subscription_amount`, `subscription_pay_method`) VALUES
(1, '2562', 'justus', '', '2017-09-15', '2017-11-11', '', '-0.52', '');

-- --------------------------------------------------------

--
-- Структура таблицы `messages`
--

CREATE TABLE `messages` (
  `id` int(11) NOT NULL,
  `msg_id` int(11) NOT NULL,
  `msg_type` varchar(30) NOT NULL,
  `senderid` int(11) NOT NULL,
  `sender_name` varchar(60) NOT NULL,
  `receiverid` int(11) NOT NULL,
  `receiver_name` varchar(50) NOT NULL,
  `msg_title` varchar(100) NOT NULL,
  `msg_body` text NOT NULL,
  `msg_date` varchar(255) NOT NULL,
  `msg_read` int(5) NOT NULL,
  `from_who` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `messages`
--

INSERT INTO `messages` (`id`, `msg_id`, `msg_type`, `senderid`, `sender_name`, `receiverid`, `receiver_name`, `msg_title`, `msg_body`, `msg_date`, `msg_read`, `from_who`) VALUES
(1189, 608513492, 'reply', 3548, 'vlad_manager ukr.net', 3744, 'Vlad Zakaz', '', '123', '07.08.2018 14:03:02', 1, ''),
(1190, 783925061, 'message', 3744, 'Vlad Zakaz', 3548, '', '', '31231231', '07.08.2018 14:10:17', 1, 'client'),
(1191, 790321458, 'reply', 3548, 'vlad_manager ukr.net', 3744, 'Vlad Zakaz', '', 'from mngr  hello', '07.08.2018 14:11:08', 1, ''),
(1192, 207683419, 'message', 3744, 'Vlad Zakaz', 3548, '', '', 'hello mngr', '07.08.2018 14:11:34', 1, 'client'),
(1193, 803269157, 'reply', 2562, 'Администратор Администратор', 3744, 'Vlad Zakaz', '', 'hello from admin', '07.08.2018 14:11:49', 1, ''),
(1194, 591076824, 'message', 3744, 'Vlad Zakaz', 3548, '', '', 'hello admin', '07.08.2018 14:12:14', 1, 'client'),
(1195, 786152034, 'message', 3648, 'vlad avtor', 0, '', '', '132123123123123', '07.08.2018 14:15:51', 1, 'writer'),
(1196, 685493017, 'reply', 3548, 'vlad_manager ukr.net', 3648, 'vlad avtor', '', '3123123', '07.08.2018 14:16:30', 1, ''),
(1197, 728903654, 'reply', 2562, 'Администратор Администратор', 3648, 'vlad avtor', '', '123123', '07.08.2018 14:16:52', 1, ''),
(1198, 548012769, 'message', 3659, 'ввв ввв', 0, '', 'проверка ', '11111', '08.08.2018 11:27:17', 1, 'writer'),
(1199, 498523071, 'message', 3556, 'Автор  Иванов', 3738, '', 'проверка 2', '22222', '08.08.2018 11:27:32', 1, 'writer'),
(1200, 251830946, 'reply', 2562, 'Администратор Администратор', 3685, 'Светлана Кузнецова', '', 'asdasd', '08.08.2018 11:35:00', 1, ''),
(1201, 420783615, 'message', 3749, 'Алеся Киселева', 0, '', 'Просьба помочь разобраться', 'Добрый день! Я впервые сделала у Вас ставку на работу, но не могу понять каким образом сообщается тема автору и где корректно её можно посмотреть? Подскажите пожалуйста, т.к. в некоторых заказах в графе тема стоят вообще только цифры.', '08.08.2018 14:17:45', 1, 'writer'),
(1202, 823419607, 'reply', 2562, 'Администратор Администратор', 3749, 'Алеся Киселева', 'оценка заказов', 'Здравствуйте! Рады сотрудничеству с Вами. Всю информацию по заказу можно просмотреть  в разделах \\\" Найти заказы\\\" (все актуальные заказы на сайте) и \\\"  Заказы на оценку\\\"  (в этом разделе заказы профильные, которые указывали при регистрации). Данные по заказу можно просмотреть в основной информации по заказу, открыв заказ, но в случаи некорректной информации ( цифры или набор букв в теме заказа) это тестовые заказы. При необходимости Вы можете написать уточнение в чате по заказу или в тех. поддержку и мы с радостью ответим на все интересующие Вас вопросы по заказу.', '08.08.2018 21:03:51', 1, ''),
(1203, 916820375, 'message', 3556, 'Автор  Иванов', 3738, '', 'проверка 2', 'аааа', '08.08.2018 21:04:23', 1, 'writer'),
(1204, 46835792, 'message', 3736, 'заказчик Nik sadsad', 3738, '', '', 'ыфвфыв', '10.08.2018 02:10:42', 1, 'client'),
(1205, 761952084, 'message', 3737, 'автор Nik aasdasd', 0, '', '', 'ыявафывфы', '10.08.2018 02:16:54', 1, 'writer'),
(1206, 924013568, 'reply', 2562, 'Администратор Администратор', 3569, 'Юлия Дубовенко', '422', 'Здравствуйте! Просмотрите заказ 422', '12.08.2018 08:36:33', 1, ''),
(1207, 853794102, 'reply', 2562, 'Администратор Администратор', 3562, 'Оксана Теленик', '422', 'Здравствуйте! Просмотрите заказ 422', '12.08.2018 08:37:19', 1, ''),
(1208, 75392461, 'reply', 2562, 'Администратор Администратор', 3662, 'Татьяна Дейнека', '422', 'Здравствуйте! Просмотрите заказ 422', '12.08.2018 08:37:56', 0, ''),
(1209, 164820375, 'reply', 2562, 'Администратор Администратор', 3723, 'Аліна Мазур', '422', 'Здравствуйте! Просмотрите заказ 422', '12.08.2018 08:41:31', 1, ''),
(1210, 97684123, 'reply', 2562, 'Администратор Администратор', 3556, 'Автор  Иванов', '422', 'Здравствуйте! Просмотрите заказ 422', '12.08.2018 08:41:52', 1, ''),
(1211, 431276590, 'reply', 3548, 'vlad_manager ukr.net', 3744, 'Vlad Zakaz', '', 'asdasd', '15.08.2018 10:50:55', 1, ''),
(1212, 984512630, 'reply', 2562, 'Администратор Администратор', 3744, 'Vlad Zakaz', '', 'asdasdasd', '15.08.2018 10:51:19', 1, ''),
(1213, 702496385, 'message', 3744, 'Vlad Zakaz', 3548, '', '', 'jlkjbkjbblkjbbljkb', '15.08.2018 10:56:15', 0, 'client'),
(1214, 294536178, 'message', 3648, 'vlad avtor', 3548, '', '', 'kjlkjlkjnlkj', '15.08.2018 10:56:27', 1, 'writer'),
(1215, 215896370, 'message', 3736, 'заказчик Nik sadsad', 3738, '', 'проверка 2', '123123', '15.08.2018 11:01:09', 1, 'client'),
(1216, 592473680, 'message', 3556, 'Автор  Иванов', 3738, '', '1', 'фаава', '15.08.2018 20:56:16', 1, 'writer'),
(1217, 680457139, 'message', 3556, 'Автор  Иванов', 3738, '', 'авава', 'вавыав', '15.08.2018 20:57:19', 1, 'writer'),
(1218, 175804963, 'message', 3736, 'заказчик Nik sadsad', 3738, '', '', 'проверка заказчиком', '16.08.2018 00:25:37', 1, 'client'),
(1219, 752981634, 'reply', 3738, 'Менеджер Nik aASDd', 3736, 'заказчик Nik sadsad', '', 'менеджером заказчику', '16.08.2018 00:29:18', 1, ''),
(1220, 659208147, 'reply', 3738, 'Менеджер Nik aASDd', 3736, 'заказчик Nik sadsad', '', 'еще раз', '16.08.2018 00:29:26', 1, ''),
(1221, 827503619, 'message', 3737, 'автор Nik aasdasd', 0, '', '', 'автором менеджеру', '16.08.2018 00:30:45', 1, 'writer'),
(1222, 241368097, 'reply', 3738, 'Менеджер Nik aASDd', 3737, 'автор Nik aasdasd', '', 'менеджером автору', '16.08.2018 00:31:57', 1, ''),
(1223, 561289347, 'reply', 3738, 'Менеджер Nik aASDd', 3737, 'автор Nik aasdasd', '', 'еще раз', '16.08.2018 00:32:06', 1, ''),
(1224, 725468901, 'reply', 3738, 'Менеджер Nik aASDd', 3659, 'ввв ввв', '', '222', '16.08.2018 00:33:03', 0, ''),
(1225, 162450937, 'reply', 3738, 'Менеджер Nik aASDd', 3556, 'Автор  Иванов', '', '1', '16.08.2018 00:33:32', 1, ''),
(1226, 694028735, 'message', 3762, 'vlad zakaz', 0, '', '31231', '231231', '17.08.2018 11:45:00', 1, 'client'),
(1227, 403576812, 'message', 3762, 'vlad zakaz', 0, '', '', '234234', '17.08.2018 11:50:43', 1, 'client'),
(1228, 302856741, 'reply', 3548, 'vlad_manager ukr.net', 3762, 'vlad zakaz', '', 'qweqwe12231231', '17.08.2018 11:51:26', 1, ''),
(1229, 790463215, 'reply', 3548, 'vlad_manager ukr.net', 3762, 'vlad zakaz', '', '3123123', '17.08.2018 11:53:20', 1, ''),
(1230, 718569023, 'reply', 3548, 'vlad_manager ukr.net', 3762, 'vlad zakaz', '', 'asdasd', '17.08.2018 12:09:21', 1, ''),
(1231, 678530924, 'message', 3762, 'vlad zakaz', 3548, '', '', 'qweqwe', '17.08.2018 12:09:47', 1, 'client'),
(1232, 831529047, 'message', 3762, 'vlad zakaz', 3548, '', '', '123121', '17.08.2018 12:12:24', 1, 'client'),
(1233, 389764215, 'message', 3762, 'vlad zakaz', 3548, '', '', '231212', '17.08.2018 12:14:58', 1, 'client'),
(1234, 567392180, 'reply', 3548, 'vlad_manager ukr.net', 3762, 'vlad zakaz', '', 'qweqweq', '17.08.2018 12:15:25', 1, ''),
(1235, 374265189, 'message', 3762, 'vlad zakaz', 3548, '', '', 'asdas', '17.08.2018 12:15:35', 1, 'client'),
(1236, 283790516, 'message', 3648, 'vlad avtor', 3548, '', '', 'asdasd', '17.08.2018 12:18:03', 1, 'writer'),
(1237, 914785206, 'message', 3762, 'vlad zakaz', 3548, '', '', 'asdasd', '17.08.2018 14:25:30', 1, 'client'),
(1238, 971503862, 'message', 3762, 'vlad zakaz', 3548, '', '', '1231231', '17.08.2018 14:25:45', 1, 'client'),
(1239, 647539281, 'reply', 3548, 'vlad_manager ukr.net', 3762, 'vlad zakaz', '', '123123', '17.08.2018 14:27:03', 1, ''),
(1240, 905182374, 'message', 3648, 'vlad avtor', 3548, '', '\\\'\\\'\\\'\\\' \\\' \\\' \\\' \\\' \\\'  \\\"\\\"\\\"\\\"\\\"\\\"\\\" \\\" \\\" \\\" \\\" \\\" \\\"  ///////////// \\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\', '\\\'\\\'\\\'\\\' \\\' \\\' \\\' \\\' \\\' \r\n\\\"\\\"\\\"\\\"\\\"\\\"\\\" \\\" \\\" \\\" \\\" \\\" \\\" \r\n/////////////\r\n\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\', '21.08.2018 13:15:26', 1, 'writer'),
(1241, 130754296, 'message', 3648, 'vlad avtor', 3548, '', '', '\\\'\\\'\\\'\\\' \\\' \\\' \\\' \\\' \\\' \\\"\\\"\\\"\\\"\\\"\\\"\\\" \\\" \\\" \\\" \\\" \\\" \\\" ///////////// \\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\', '21.08.2018 13:26:12', 1, 'writer'),
(1242, 37192465, 'message', 3648, 'vlad avtor', 3548, '', '', '\\\'\\\'\\\'\\\' \\\' \\\' \\\' \\\' \\\' \\\"\\\"\\\"\\\"\\\"\\\"\\\" \\\" \\\" \\\" \\\" \\\" \\\" ///////////// \\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\', '21.08.2018 13:32:19', 1, 'writer'),
(1243, 916870342, 'message', 3648, 'vlad avtor', 3548, '', '', '\\\'\\\'\\\'\\\' \\\' \\\' \\\' \\\' \\\' \\\"\\\"\\\"\\\"\\\"\\\"\\\" \\\" \\\" \\\" \\\" \\\" \\\" ///////////// \\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\', '21.08.2018 13:40:38', 1, 'writer'),
(1244, 257893461, 'reply', 2562, 'Администратор Администратор', 3648, 'vlad avtor', '', '\\\'\\\'\\\'\\\' \\\' \\\' \\\' \\\' \\\' \\\"\\\"\\\"\\\"\\\"\\\"\\\" \\\" \\\" \\\" \\\" \\\" \\\" ///////////// \\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\', '21.08.2018 13:48:49', 1, ''),
(1245, 384196275, 'reply', 2562, 'Администратор Администратор', 3648, 'vlad avtor', '\\\'\\\'\\\'\\\' \\\' \\\' \\\' \\\' \\\' \\\"\\\"\\\"\\\"\\\"\\\"\\\" \\\" \\\" \\\" \\\" \\\" \\\" ///////////// \\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\', '\\\'\\\'\\\'\\\' \\\' \\\' \\\' \\\' \\\' \\\"\\\"\\\"\\\"\\\"\\\"\\\" \\\" \\\" \\\" \\\" \\\" \\\" ///////////// \\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\', '21.08.2018 13:48:53', 1, ''),
(1246, 69728534, 'reply', 3566, 'Инна  Павлова', 3609, 'Ольга  Павлова ', '', '\\\"ПРИВЕТ\\\"', '22.08.2018 10:10:48', 0, ''),
(1247, 137859602, 'message', 3669, 'Светлана Тарасенко', 0, '', 'о заказах', 'Добрый день, ко мне поступают заказу, но в них нет заданий. Например, 443 заказ. Нет темы работы, требований.', '22.08.2018 10:59:59', 1, 'writer'),
(1248, 439720861, 'reply', 3566, 'Инна  Павлова', 3669, 'Светлана Тарасенко', 'заказы', 'Здравствуйте! Если заказ не корректный это тестовый заказ, но Вы всегда можете уточнить и мы ответим на все интересующие Вас вопросы ', '22.08.2018 11:14:35', 0, ''),
(1249, 756219403, 'message', 3736, 'заказчик Nik sadsad', 3738, '', '', 'фывфывыф', '22.08.2018 22:16:11', 1, 'client'),
(1250, 827504136, 'message', 3737, 'автор Nik aasdasd', 3738, '', '', 'фывфыв', '22.08.2018 22:16:19', 1, 'writer'),
(1251, 251097638, 'message', 3556, 'Автор  Иванов', 3738, '', 'проверка 1', '1111', '22.08.2018 22:16:31', 1, 'writer'),
(1252, 940826157, 'reply', 3566, 'Инна  Павлова', 3609, 'Ольга  Павлова ', '\\\"фыва\\\"', '', '22.08.2018 22:32:33', 0, ''),
(1253, 798530614, 'reply', 3566, 'Инна  Павлова', 3609, 'Ольга  Павлова ', '\\\"фыва\\\"', 'вапв\\\"\\\"', '22.08.2018 22:32:41', 0, ''),
(1254, 931068524, 'message', 3628, 'Рома Иванов', 3566, '', '', 'WWQQQWWWQQ', '23.08.2018 16:16:04', 1, 'client'),
(1255, 678593201, 'reply', 3566, 'Инна  Павлова', 3628, 'Рома Иванов', '', '1231', '23.08.2018 16:40:05', 1, ''),
(1256, 279685401, 'message', 3556, 'Автор  Иванов', 3738, '', '', 'йцуйцуйцу', '23.08.2018 16:40:15', 1, 'writer'),
(1257, 783264015, 'message', 3556, 'Автор  Иванов', 3738, '', '', '2312313', '23.08.2018 16:41:14', 0, 'writer'),
(1258, 361459782, 'message', 3736, 'заказчик Nik sadsad', 3738, '', '', 'фывфывыфв', '23.08.2018 16:59:56', 1, 'client'),
(1259, 946531827, 'message', 3737, 'автор Nik aasdasd', 3738, '', '', 'фывфыв', '23.08.2018 17:00:05', 1, 'writer'),
(1260, 89362547, 'reply', 2562, 'Администратор Администратор', 3762, 'vlad zakaz', '', 'фывфыв', '23.08.2018 17:16:11', 1, ''),
(1261, 416875320, 'message', 3556, 'Автор  Иванов', 3738, '', '', 'фывфы', '23.08.2018 17:17:50', 0, 'writer'),
(1263, 136952807, 'message', 3648, 'vlad avtor', 3548, '', '', 'wrwerwerw', '27.08.2018 10:41:54', 1, 'writer'),
(1264, 658749301, 'message', 3762, 'vlad zakaz', 3548, '', '', 'ewrwerw', '27.08.2018 10:42:01', 1, 'client'),
(1265, 892453017, 'message', 3648, 'vlad avtor', 3548, '', '', 'asdasd', '27.08.2018 12:22:48', 1, 'writer'),
(1266, 102935468, 'message', 3648, 'vlad avtor', 3548, '', '', 'asdasd', '27.08.2018 12:23:35', 1, 'writer'),
(1267, 21546387, 'message', 3648, 'vlad avtor', 3548, '', '', 'dsdasdasd', '27.08.2018 12:27:44', 1, 'writer'),
(1268, 651840327, 'message', 3762, 'vlad zakaz', 3548, '', '', 'asdasd', '27.08.2018 12:27:51', 1, 'client'),
(1269, 974605821, 'message', 3648, 'vlad avtor', 3548, '', '', 'sdasda', '27.08.2018 12:28:11', 1, 'writer'),
(1270, 196345072, 'message', 3648, 'vlad avtor', 3548, '', '', 'asdasd', '27.08.2018 12:28:13', 1, 'writer'),
(1271, 691785034, 'message', 3658, 'фф фф', 3566, '', 'проверка', 'фффф', '27.08.2018 12:37:25', 1, 'client'),
(1272, 348962751, 'reply', 3566, 'Инна  Павлова', 3658, 'фф фф', 'ывавы', 'ыавы', '27.08.2018 12:59:45', 0, ''),
(1273, 632054789, 'reply', 3738, 'Менеджер Nik aASDd', 3737, 'автор Nik aasdasd', '', 'одл', '27.08.2018 23:11:07', 0, ''),
(1274, 531890642, 'reply', 2562, 'Администратор Администратор', 3736, 'заказчик Nik sadsad', '', 'ждол', '27.08.2018 23:11:54', 1, ''),
(1275, 760812594, 'message', 3782, 'Вита Безугла', 0, '', 'Помощь', 'Не могу разобраться в этом сайте. Как понять взяла я уже работу или еще не потдвердили? Как общаться с заказчиком исполнителю? Где смс чат?', '28.08.2018 12:59:22', 1, 'writer'),
(1276, 897014253, 'reply', 3566, 'Инна  Павлова', 3782, 'Вита Безугла', 'Помощь', 'Здравствуйте! Рады сотрудничеству! Для того что бы взять заказ в работу Вам нужно его оценить, после подтверждение заказчиком своего заказа Вам на электронный адрес и в кабинет придет уведомление об том что передали заказ на выполнение и этот заказ будет отображаться в разделе \\\" Заказ на выполнении\\\"', '28.08.2018 22:25:59', 1, ''),
(1277, 476803519, 'reply', 3566, 'Инна  Павлова', 3782, 'Вита Безугла', 'чат', 'касательно чата он будет доступный когда Вас закрепят как исполнителя по заказу ', '28.08.2018 22:37:47', 1, ''),
(1278, 378695241, 'reply', 2562, 'Администратор Администратор', 3648, 'vlad avtor', '', '1231231', '30.08.2018 16:42:56', 0, ''),
(1279, 153679084, 'reply', 2562, 'Администратор Администратор', 3648, 'vlad avtor', '', '123123', '30.08.2018 16:43:01', 0, ''),
(1280, 704926851, 'reply', 2562, 'Администратор Администратор', 3762, 'vlad zakaz', 'проверка ', 'фффф', '30.08.2018 19:42:24', 0, '');

-- --------------------------------------------------------

--
-- Структура таблицы `msg_config`
--

CREATE TABLE `msg_config` (
  `id` int(11) NOT NULL,
  `msg_id` varchar(60) NOT NULL,
  `msg_title_admin` varchar(120) NOT NULL,
  `msg_body_admin` text NOT NULL,
  `msg_title_writer` varchar(200) NOT NULL,
  `msg_body_writer` text NOT NULL,
  `msg_title_client` varchar(200) NOT NULL,
  `msg_body_client` text NOT NULL,
  `msg_fields` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `msg_config`
--

INSERT INTO `msg_config` (`id`, `msg_id`, `msg_title_admin`, `msg_body_admin`, `msg_title_writer`, `msg_body_writer`, `msg_title_client`, `msg_body_client`, `msg_fields`) VALUES
(1, 'new_writer_registers', 'msg title admin', '<p>tt</p>         ', 'msg_title_writer', '<table style=\"width: 100%\"><tr style=\"width: 100%\"><td style=\"width: 100%; height: 250px; text-align: center;\"><img src=\"https://legko-v-uchebe.com/wp-content/uploads/2018/03/Owl.png\"></td></tr></table><p>Здравствуйте!</p>\r\n<p>Поздравляем, Вы успешно зарегистрировались на сайте legko-v-uchebe.com. в качестве Автора.</p>\r\n Для входа в Личный кабинет перейдите по ссылке https://legko-v-uchebe.com/in/home/signup или нажмите Войти на сайте</p>\r\n<p><b>Ваши данные для входа: </b></p>\r\n\r\n<p>Email: $useremail</p>\r\n<p>Пароль: $userpassword</p>\r\n		\r\n\r\n<p>С уважением, Легко в учебе! </p>\r\n                                                      ', 'msg_title_client', '<table style=\"width: 100%\"><tr style=\"width: 100%\"><td style=\"width: 100%; height: 250px; text-align: center;\"><img src=\"https://legko-v-uchebe.com/wp-content/uploads/2018/03/Owl.png\"></td></tr></table><p>Здравствуйте!</p>\r\n<p>Поздравляем, Вы успешно зарегистрировались на сайте legko-v-uchebe.com. в качестве Автора.</p>\r\n Для входа в Личный кабинет перейдите по ссылке https://legko-v-uchebe.com/in/home/signup или нажмите Войти на сайте</p>\r\n<p><b>Ваши данные для входа: </b></p>\r\n\r\n<p>Email: $useremail</p>\r\n<p>Пароль: $userpassword</p>\r\n		\r\n\r\n<p>С уважением, Легко в учебе! </p>\r\n                  ', 'name'),
(2, 'new_client_registers', 'msg title admin', '<table style=\"width: 100%\"><tr style=\"width: 100%\"><td style=\"width: 100%; height: 250px; text-align: center;\"><img src=\"https://legko-v-uchebe.com/wp-content/uploads/2018/03/Owl.png\"></td></tr></table><p>Здравствуйте</p>\r\n\r\n<p>Новый клиент $clientuserid зарегистрировался на $siteurl,</p>\r\n\r\n<p>Детали:</p>\r\n\r\n<table border=\\\"1\\\" cellpadding=\\\"5\\\" style=\\\"width:99%\\\">\r\n	<tbody>\r\n		<tr>\r\n			<td><strong>Имя:</strong></td>\r\n			<td>$userfirstname</td>\r\n		</tr>\r\n		<tr>\r\n			<td><strong>Фамилия</strong></td>\r\n			<td>$userlastname</td>\r\n		</tr>\r\n		<tr>\r\n			<td><strong>ID клиента</strong></td>\r\n			<td>$clientuserid</td>\r\n		</tr>\r\n		<tr>\r\n			<td><strong>Email</strong></td>\r\n			<td>$useremail</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n<p>С уважением, Легко в учебе</p>\r\n\r\n                           ', 'msg_title_writer', '<table style=\"width: 100%\"><tr style=\"width: 100%\"><td style=\"width: 100%; height: 250px; text-align: center;\"><img src=\"http://legko-v-uchebe.com/wp-content/uploads/2018/03/Owl.png\"></td></tr></table>msg_body_writer         ', 'msg_title_client', '<table style=\"width: 100%\"><tr style=\"width: 100%\"><td style=\"width: 100%; height: 250px; text-align: center;\"><img src=\"https://legko-v-uchebe.com/wp-content/uploads/2018/03/Owl.png\"></td></tr></table><p>Здравствуйте!</p>\r\n\r\n<p>Спасибо что зарегистрировались на нашем сайте!!! </p>\r\n\r\n<p>Ваши данные для входа:</p>\r\n<p>Email: $useremail</p>\r\n<p>Пароль: $userpassword</p>\r\n\r\n\r\n<p>Для оформления заказа Вам необходимо заполнить https://legko-v-uchebe.com/in/project/create. Обратите особое внимание на обязательные поля в бланке заказа!</p>\r\n\r\n<p>Для входа в личный кабинет нажмите https://legko-v-uchebe.com/in , для оформления заказа необходимо заполнить форму заказа.</p>\r\n\r\n<p>Заполненная форма Вашего заказа передается авторам, которые специализируются на необходимой отрасли наук для оценки работы. Время оценки заказа от 1 до 5 часов.\r\n</p>\r\n\r\n<p>После оценки заказа у Ваш кабинет будет направлена информация с оптимальной ценой работы.</p>\r\n\r\n<p>С уважением, Легко в учебе</p>\r\n', ''),
(3, 'new_order_placed', 'New Order Placed', '<table style=\"width: 100%\"><tr style=\"width: 100%\"><td style=\"width: 100%; height: 250px; text-align: center;\"><img src=\"https://legko-v-uchebe.com/wp-content/uploads/2018/03/Owl.png\"></td></tr></table><p>Здравствуйте</p>\r\n\r\n<p>В рабочий кабинет  поступил новый заказ $orderorderid от заказчика</p>\r\n<p>   Для входа в Личный кабинет перейдите по  http://legko-v-uchebe.com/in/</p>\r\n<p>Для входа используйте свой email и пароль.</p>\r\n\r\n<p>С уважением, Легко в учебе.</p>\r\n                                                                        ', 'msg_title_writer', '<table style=\"width: 100%\"><tr style=\"width: 100%\"><td style=\"width: 100%; height: 250px; text-align: center;\"><img src=\"https://legko-v-uchebe.com/wp-content/uploads/2018/03/Owl.png\"></td></tr></table><table style=\\\"width: 100%\\\"><tr style=\\\"width: 100%\\\"><td style=\\\"width: 100%; height: 250px; text-align: center;\\\"><img src=\\\"https://legko-v-uchebe.com/wp-content/uploads/2018/03/Owl.png\\\"></td></tr></table>Здравствуйте! <br>\r\nВам поступил новый заказ на оценку. Оцените или откажитесь от заказа в своем личном кабинете!<br>\r\n   Для входа в Личный кабинет перейдите по ссылке \r\n<br>\r\nАвторизация: https://legko-v-uchebe.com/in/\r\n<br>\r\nили нажмите Войти на сайте. Для входа используйте свой email и пароль<br>\r\nОбязательно выполните действие над заказом! Для того, что бы приступить к исполнению заказа - дождитесь письма - подтверждения о том, что Вы закреплены как исполнитель заказа<br><br>. \r\nС уважением, Легко в учебе!\r\n                                                                                                   ', 'msg_title_client', '<table style=\"width: 100%\"><tr style=\"width: 100%\"><td style=\"width: 100%; height: 250px; text-align: center;\"><img src=\"https://legko-v-uchebe.com/wp-content/uploads/2018/03/Owl.png\"></td></tr></table><table style=\\\"width: 100%\\\"><tr style=\\\"width: 100%\\\"><td style=\\\"width: 100%; height: 250px; text-align: center;\\\"><img src=\\\"https://legko-v-uchebe.com/wp-content/uploads/2018/03/Owl.png\\\"></td></tr></table><p>Здравствуйте!</p>\r\n\r\n<p>Ваш заказ [$ordertopic] успешно загружен на $siteurl,</p>\r\n\r\n<p>Заполненная форма Вашего заказа передается авторам, которые специализируются на необходимой отрасли наук для оценки работы. Время оценки заказа от 2 до 6 часов.\r\nПосле оценки заказа Вам на электронную почту будет направлена информация с оптимальной ценой работы.</p>\r\n\r\nС уважением, Легко в учебе!\r\n\r\n', ''),
(4, 'new_order_paid', 'msg title admin', '<table style=\"width: 100%\"><tr style=\"width: 100%\"><td style=\"width: 100%; height: 250px; text-align: center;\"><img src=\"https://legko-v-uchebe.com/wp-content/uploads/2018/03/Owl.png\"></td></tr></table><p>Здравствуйте</p>\r\n<p>Изменен статус заказа №$orderid;</p>\r\nС уважением, Легко в учебе!\r\n\r\n\r\n                                    ', 'msg_title_writer', 'msg_body_writer', 'msg_title_client', '<table style=\"width: 100%\"><tr style=\"width: 100%\"><td style=\"width: 100%; height: 250px; text-align: center;\"><img src=\"https://legko-v-uchebe.com/wp-content/uploads/2018/03/Owl.png\"></td></tr></table><p>Здравствуйте!</p>\r\n<p>Изменен статус заказа №$orderid;</p>\r\nС уважением, Легко в учебе!', ''),
(5, 'writer_status_changed', 'msg title admin', '<table style=\"width: 100%\"><tr style=\"width: 100%\"><td style=\"width: 100%; height: 250px; text-align: center;\"><img src=\"https://legko-v-uchebe.com/wp-content/uploads/2018/03/Owl.png\"></td></tr></table><p>Здравствуйте</p>\r\n\r\n<p>Статус этого автора изменен $userwriter_id,</p>\r\n\r\n<p>Статус: $userwriter_status</p>\r\n<p>ID автора: $userwriter_id</p>\r\n\r\n<p>С уважением, Легко в учебе</p>\r\n                           ', 'msg_title_writer', '<table style=\"width: 100%\"><tr style=\"width: 100%\"><td style=\"width: 100%; height: 250px; text-align: center;\"><img src=\"https://legko-v-uchebe.com/wp-content/uploads/2018/03/Owl.png\"></td></tr></table><p>Здравствуйте</p>\r\n\r\n<p>Статус Вашего аккаунта изменен (<b>$accStatus</b>)</p>\r\n\r\n<p>С уважением, Легко в учебе</p>\r\n                                                      ', 'msg_title_client', 'msg_body_client', ''),
(6, 'order_marked_aspaid', 'msg title admin', '<table style=\"width: 100%\"><tr style=\"width: 100%\"><td style=\"width: 100%; height: 250px; text-align: center;\"><img src=\"https://legko-v-uchebe.com/wp-content/uploads/2018/03/Owl.png\"></td></tr></table><p>Здравствуйте</p>\r\n\r\n<p>Заказ №$orderid отмечен как $orderclient_paid.</p>\r\n\r\n<p>Email заказчика: $useremail</p>\r\n<p>ID заказа $orderid</p>\r\n\r\n<p>С уважением, Легко в учебе</p>\r\n                                             ', 'msg_title_writer', '<table style=\"width: 100%\"><tr style=\"width: 100%\"><td style=\"width: 100%; height: 250px; text-align: center;\"><img src=\"https://legko-v-uchebe.com/wp-content/uploads/2018/03/Owl.png\"></td></tr></table><p>Здравствуйте!</p>\r\n\r\n<p>Вам был оплачен заказ №$orderid</p>\r\n<p>Спасибо за работу. Для детальной информации перейдите   в личный кабинет,  воспользуйтесь следующей ссылкой:  http://legko-v-uchebe.com/in/ , для входа используйте свой логин  и пароль.</p>\r\n\r\n<p>С уважением,</p>\r\n<p>Легко в учебе!</p>\r\n                                                               ', '', '<table style=\"width: 100%\"><tr style=\"width: 100%\"><td style=\"width: 100%; height: 250px; text-align: center;\"><img src=\"https://legko-v-uchebe.com/wp-content/uploads/2018/03/Owl.png\"></td></tr></table><p>Здравствуйте</p>\r\n<p>Спасибо за оплату! Ваш заказ принят на исполнение. </p>\r\n<p>Вы можете отслеживать статус Вашего заказа в «Личном кабинете», а также вести переписку с автором и менеджером в чате, которые работают над Вашей работой. </p>\r\n<p>Для входа в «Личный кабинет» перейдите по ссылке http://legko-v-uchebe.com/in/</p>\r\n<p>С уважением, Легко в учебе!</p>', ''),
(7, 'writer_bids', 'writer bids', '<table style=\"width: 100%\"><tr style=\"width: 100%\"><td style=\"width: 100%; height: 250px; text-align: center;\"><img src=\"https://legko-v-uchebe.com/wp-content/uploads/2018/03/Owl.png\"></td></tr></table><p>Здравствуйте</p>\r\n\r\n<p>По заказу №$requestorderid была сделана ставка автора.</p>\r\n<p>Ознакомиться со ставкой можно в личном кабинете, перейдите в личный кабинет по следующей ссылке:<br> http://legko-v-uchebe.com/in/ </p>\r\n<p>С уважением, Легко в учебе!</p>\r\n                                                                        ', 'msg_titlef_writerf', '<table style=\"width: 100%\"><tr style=\"width: 100%\"><td style=\"width: 100%; height: 250px; text-align: center;\"><img src=\"https://legko-v-uchebe.com/wp-content/uploads/2018/03/Owl.png\"></td></tr></table><p>Здравствуйте!</p>\r\n<p>Ваша ставка по заказу №$requestorderid успешно опубликована.</p>    \r\n<p>С уважением, Легко в учебе!</p>                                                                        ', 'msg_title_clientff', '<table style=\"width: 100%\"><tr style=\"width: 100%\"><td style=\"width: 100%; height: 250px; text-align: center;\"><img src=\"https://legko-v-uchebe.com/wp-content/uploads/2018/03/Owl.png\"></td></tr></table><p>Здравствуйте</p>\r\n<p>По заказу №$requestorderid, другим автором, была $newBid ставка</p> \r\n<p>Ознакомиться со  ставкой можно в личном кабинете. Для перехода в личный кабинет воспользуйтесь следующей ссылкой:   https://legko-v-uchebe.com/in/ , для входа используйте свой логин  и пароль.</p>\r\n\r\n<p>С уважением, Легко в учебе</p>\r\n', ''),
(8, 'order_assigned_towriter', 'msg title admin', '<table style=\"width: 100%\"><tr style=\"width: 100%\"><td style=\"width: 100%; height: 250px; text-align: center;\"><img src=\"https://legko-v-uchebe.com/wp-content/uploads/2018/03/Owl.png\"></td></tr></table><p>Здравствуйте</p>\r\n\r\n<p>Заказ №$orderid был назначен автору $preferred_writer,</p>\r\n\r\n<p>ID Автора: $preferred_writer</p>\r\n<p>ID Заказа: $orderid</p>\r\n\r\n<p>С уважением, Легко в учебе</p>\r\n                                             ', 'msg_title_writer', '<table style=\"width: 100%\"><tr style=\"width: 100%\"><td style=\"width: 100%; height: 250px; text-align: center;\"><img src=\"https://legko-v-uchebe.com/wp-content/uploads/2018/03/Owl.png\"></td></tr></table><p>Здравствуйте!</p>\r\n\r\n<p>Мы предлагаем Вам взять заказ №$orderid на выполнение.</p>\r\n\r\n<p>Детальная информация по заказу:</p>\r\n\r\n<p>ID заказа:	 №$orderid</p>\r\n\r\n<p>Тема заказа: $topic</p>\r\n\r\n<p>Тип работы: $referencing_style </p>\r\n\r\n<p>Обьем работы: $words стр.</p>	\r\n\r\n<p>Дополнительная информация: $instructions</p>	\r\n<h3>График сдачи</h3>\r\n<p> $plan </p>\r\n<p>Половина работы: $half_work </p>\r\n<p>Полностью работа: $all_work</p>\r\n\r\n<p>Части работы необходимо прикреплять не позже указанных дат, или раньше.</p>\r\n   \r\n<p>Работа будет проверена на плагиат. Не допускается использование уже готовых робот из интернета, копирование больших кусков информации из открытых источников.</p>\r\n\r\n<p>Если у вас возникнут какие либо вопросы - мы с радостью Вам поможем.</p>\r\n\r\n<p> Детали заказа можно увидеть в личном кабинете. Перейти в личный кабинет по следующей ссылке   http://legko-v-uchebe.com/in/ , для входа используйте свой email и пароль.</p>\r\n\r\n<p>С уважением, Легко в учебе!</p>\r\n                                                                                                                                                ', 'msg_title_client', '<table style=\"width: 100%\"><tr style=\"width: 100%\"><td style=\"width: 100%; height: 250px; text-align: center;\"><img src=\"https://legko-v-uchebe.com/wp-content/uploads/2018/03/Owl.png\"></td></tr></table><p>Здравствуйте!</p>\r\n<p>Ваш заказ  передан на исполнение автору.</p>\r\n<p>Дата выполнения первой части работы  - <b>$half_work </b>. </p>\r\n\r\n<p>Вы можете отслеживать статус Вашего заказа в Личном кабинете, а также вести переписку с автором и менеджером в чате, которые работают над Вашей работой.</p>\r\n\r\n<p>Для входа в Личный кабинет перейдите по ссылке  http://legko-v-uchebe.com/in/ </p>\r\n\r\n<p>С уважением, Легко в учебе!</p>\r\n', ''),
(9, 'order_status_changed', 'msg title admin', '<table style=\"width: 100%\"><tr style=\"width: 100%\"><td style=\"width: 100%; height: 250px; text-align: center;\"><img src=\"https://legko-v-uchebe.com/wp-content/uploads/2018/03/Owl.png\"></td></tr></table><p>Здравствуйте!</p>\r\n\r\n<p>статус заказа №$orderid изменен на $order_status</p>\r\n\r\n<p>ID заказа: №$orderid</p>\r\n<p>Статус заказа: $order_status</p>\r\n\r\n<p>С уважением, Легко в учебе!</p>\r\n                                                               ', 'msg_title_writer', '<table style=\"width: 100%\"><tr style=\"width: 100%\"><td style=\"width: 100%; height: 250px; text-align: center;\"><img src=\"https://legko-v-uchebe.com/wp-content/uploads/2018/03/Owl.png\"></td></tr></table><p>Здравствуйте!</p>\r\n<p>Заказчик вернул заказ №$orderid на доработку</p>\r\n<p>Детали можно увидеть в Личном кабинете. Перейти в личный кабинет по следующей ссылке http://legko-v-uchebe.com/in/ , для входа используйте свой email и пароль.</p>\r\n\r\n<p>С уважением, Легко в учебе!</p>\r\n\r\n                                                                                                                                                ', 'msg_title_client', '<table style=\"width: 100%\"><tr style=\"width: 100%\"><td style=\"width: 100%; height: 250px; text-align: center;\"><img src=\"https://legko-v-uchebe.com/wp-content/uploads/2018/03/Owl.png\"></td></tr></table><p>Здравствуйте!</p>\r\n<p>Ваша 1 часть заказа готова! Для ознакомления с заказом  войдите в Личный кабинет перейдите по ссылке  http://legko-v-uchebe.com/in/ или Войти на сайте.</p>\r\n	<br>\r\n<p>Схема Ваших действий следующая:</p>\r\n<ol>\r\n<li>После предварительной проверки для подтверждения дальнейшего сотрудничества Вы вносите остальную часть оплаты (50 % стоимости работы) если не была внесена вся сумма с помощью удобного для Вас способа оплаты и сообщаете нам сумму и время оплаты в чат по заказу или: \r\n E-mail: support@legko-v-uchebe.com\r\n Skype: legkovuchebe\r\n Тел/ viber (096) 005-45-75) </li>\r\n<li>В оговоренный в форме заказа срок Вы получаете готовую работу у Ваш Личный кабинет.</li>\r\n</ol>\r\n<b>РЕКВИЗИТЫ ДЛЯ ОПЛАТЫ </b><br>\r\nдля оплаты через ПРИВАТ \r\nКарта приват банка 5168 7573 5765 3353, на имя Бойко Вероника Александровна \r\n\r\nДля оплаты ДРУГИХ банков и терминалов \r\nКарта ощад банка 5167 4900 7377 9648, на имя Бойко Вероника Александровна\r\n\r\n <br>\r\n\r\nС уважением, Легко в учебе!<br>\r\n', ''),
(10, 'file_uploaded', 'msg title admin', '<table style=\"width: 100%\"><tr style=\"width: 100%\"><td style=\"width: 100%; height: 250px; text-align: center;\"><img src=\"https://legko-v-uchebe.com/wp-content/uploads/2018/03/Owl.png\"></td></tr></table><p>Здравствуйте!</p>\r\n\r\n<p>По заказу №$orderid была прикреплена часть работы.</p>\r\n<p>Ознакомиться с файлом можно в личном кабинете, перейдите в личный кабинет по следующей ссылке:  http://legko-v-uchebe.com/in/</p>\r\n\r\n<p>С уважением, Легко в учебе!</p>\r\n\r\n                                                                                 ', 'msg_title_writer', '<table style=\"width: 100%\"><tr style=\"width: 100%\"><td style=\"width: 100%; height: 250px; text-align: center;\"><img src=\"https://legko-v-uchebe.com/wp-content/uploads/2018/03/Owl.png\"></td></tr></table><p>Здравствуйте!</p>\r\n\r\n<p>Новый файл был загружен по заказу №$orderid</p>\r\n\r\n<p>ID заказа: №$orderid</p>\r\n<p>Файл: $filename</p>\r\n\r\n<p>С уважением, Легко в учебе!</p>\r\n                                                      ', 'msg_title_client', '<table style=\"width: 100%\"><tr style=\"width: 100%\"><td style=\"width: 100%; height: 250px; text-align: center;\"><img src=\"https://legko-v-uchebe.com/wp-content/uploads/2018/03/Owl.png\"></td></tr></table><p>Здравствуйте!</p>\r\n\r\n<p>Новый файл был загружен</p>\r\n\r\n<p>Вы можете отслеживать статус Вашего заказа в Личном кабинете, а также вести переписку с автором и менеджером в чате, которые работают над Вашей работой. </p>\r\n<p>Для входа в Личный кабинет перейдите по ссылке http://legko-v-uchebe.com/in/</p>\r\n<p>С уважением, Легко в учебе!</p>', ''),
(11, 'msg_toadmin_byclient', 'msg title admin', 'msg_body_admin', 'msg_title_writer', 'msg_body_writer', 'msg_title_client', 'msg_body_client', ''),
(12, 'msg_toadmin_bywriter', 'msg title admin', 'msg_body_admin', 'msg_title_writer', 'msg_body_writer', 'msg_title_client', 'msg_body_client', ''),
(13, 'msg_towriter_byadmin', 'msg title admin', 'msg_body_admin', 'msg_title_writer', 'msg_body_writer', 'msg_title_client', 'msg_body_client', ''),
(14, 'msg_toclient_byadmin', 'msg title admin', 'msg_body_admin', 'msg_title_writer', 'msg_body_writer', 'msg_title_client', '<table style=\"width: 100%\"><tr style=\"width: 100%\"><td style=\"width: 100%; height: 250px; text-align: center;\"><img src=\"https://legko-v-uchebe.com/wp-content/uploads/2018/03/Owl.png\"></td></tr></table><p>Здравствуйте!</p>\r\n<p>Вам было написано сообщение в чате по заказу №$orderid.</p>\r\n<p>Что бы просмотреть и ответить на него нужно зайти в Личный кабинет.</p>\r\n<p>Для входа в Личный кабинет перейдите по ссылке https://legko-v-uchebe.com/in/ или Войти на сайте.</p>\r\n<p>С уважением, Легко в учебе!</p>\r\n', ''),
(15, 'message_under_order', 'msg title admin', '<table style=\"width: 100%\"><tr style=\"width: 100%\"><td style=\"width: 100%; height: 250px; text-align: center;\"><img src=\"https://legko-v-uchebe.com/wp-content/uploads/2018/03/Owl.png\"></td></tr></table><p>Здравствуйте</p>\r\n\r\n<p>Вам сообщение от $user_level по заказу $orderid </p>\r\n<p>Посмотреть и ответить на письмо Вы можете в своем личном кабинете, перейдите в личный кабинет по следующей ссылке:</p>\r\n<p>https://legko-v-uchebe.com/in/</p>\r\n\r\n<p>С уважением, Легко в учебе!</p>\r\n\r\n                                                                                                   ', 'msg_title_writer', '<table style=\"width: 100%\"><tr style=\"width: 100%\"><td style=\"width: 100%; height: 250px; text-align: center;\"><img src=\"https://legko-v-uchebe.com/wp-content/uploads/2018/03/Owl.png\"></td></tr></table><p>Здравствуйте</p>\r\n<p>Вам поступило новое сообщение от $who_send по заказу №$orderid .</p>\r\n<p>Посмотреть и ответить на письмо Вы можете в своем личном кабинете, перейдите в личный кабинет по следующей ссылке: http://legko-v-uchebe.com/in/</p>\r\n<p>С уважением, Легко в учебе!</p>\r\n                                                                                                                              ', 'msg_title_client', '<table style=\"width: 100%\"><tr style=\"width: 100%\"><td style=\"width: 100%; height: 250px; text-align: center;\"><img src=\"https://legko-v-uchebe.com/wp-content/uploads/2018/03/Owl.png\"></td></tr></table><p>Здравствуйте</p>\r\n\r\n<p>Вам было написано сообщение в чате по заказу №$orderid.</p>\r\n<p> Для входа в Личный кабинет перейдите по ссылке https://legko-v-uchebe.com/in/ или Войти на сайте.</p>\r\n\r\n<p>С уважением, Легко в учебе</p>\r\n', ''),
(16, 'message_toall_writers', 'msg title admin', 'msg_body_admin', 'msg_title_writer', '<table style=\"width: 100%\"><tr style=\"width: 100%\"><td style=\"width: 100%; height: 250px; text-align: center;\"><img src=\"https://legko-v-uchebe.com/wp-content/uploads/2018/03/Owl.png\"></td></tr></table><p>Здравствуйте!</p>\r\n<p>Вам была оплачена доплата по заказу №$orderid . Спасибо за работу!</p>\r\n<p>Для детальной информации перейдите в личный кабинет, воспользуйтесь следующей ссылкой: http://legko-v-uchebe.com/in/ , для входа используйте свой логин и пароль.</p>\r\n\r\n<p>С уважением, Легко в учебе!</p>                                    ', 'msg_title_client', '<table style=\"width: 100%\"><tr style=\"width: 100%\"><td style=\"width: 100%; height: 250px; text-align: center;\"><img src=\"https://legko-v-uchebe.com/wp-content/uploads/2018/03/Owl.png\"></td></tr></table><p>Здравствуйте!<p>\r\n\r\n<p>Вам было начислено доплату по заказу №$orderid . <p>\r\n<p>Для детальной информации перейдите в личный кабинет, воспользуйтесь следующей ссылкой: http://legko-v-uchebe.com/in/ , для входа используйте свой логин и пароль.<p>\r\n<p>С уважением, Легко в учебе!</p>', ''),
(17, 'order_rated_byclient', 'msg title admin', 'msg_body_admin', 'msg_title_writer', '<table style=\"width: 100%\"><tr style=\"width: 100%\"><td style=\"width: 100%; height: 250px; text-align: center;\"><img src=\"https://legko-v-uchebe.com/wp-content/uploads/2018/03/Owl.png\"></td></tr></table>Здравствуйте<br>\r\nСпасибо за доплату! Ваш заказ принят на исполнение.<br>\r\nВы можете отслеживать статус Вашего заказа в Личном кабинете, а также вести переписку с автором и менеджером в чате, которые работают над Вашей работой. <br>\r\nДля входа в Личный кабинет перейдите по ссылке http://legko-v-uchebe.com/in/ или Войти на сайте. <br><br>\r\n\r\nС уважением, Легко в учебе!                                             ', 'msg_title_client', '<table style=\"width: 100%\"><tr style=\"width: 100%\"><td style=\"width: 100%; height: 250px; text-align: center;\"><img src=\"https://legko-v-uchebe.com/wp-content/uploads/2018/03/Owl.png\"></td></tr></table>Здравствуйте<br>\r\nПо заказу требуется доплата в размере $doplataCus , так как правки выходят за рамки ранее поставленного Вами задания.<br><br>\r\n\r\nЗатягивание с доплатой может повлиять на цену и своевременность исполнения <br>\r\nВаших пожеланий Полезная информация: <br>\r\nНаши гарантии - это наши довольные клиенты: <br>\r\nhttps://legko-v-uchebe.com/otzyvy/ - Отзывы <br>\r\n<br>\r\n<h3>РЕКВИЗИТЫ ДЛЯ ОПЛАТЫ </h3>\r\n<br>\r\nДля оплаты через ПРИВАТ Карта приват банка 4149 4978 2743 7205, на имя Бойко Вероника Александровна <br>\r\nДля оплаты ДРУГИХ банков и терминалов Карта ощад банка 5167 4900 7377 9648, на имя Бойко Вероника Александровна <br><br>\r\n\r\nС уважением, Легко в учебе!       ', ''),
(18, 'writer_deactivates', 'Writer deactivates account', '<table style=\"width: 100%\"><tr style=\"width: 100%\"><td style=\"width: 100%; height: 250px; text-align: center;\"><img src=\"https://legko-v-uchebe.com/wp-content/uploads/2018/03/Owl.png\"></td></tr></table><p>Здравствуйте</p>\r\n<p>Автор деактивировал свой аккаунт</p>\r\nС уважением, Легко в учебе!\r\n             ', 'Account successfully deactivate', '<table style=\"width: 100%\"><tr style=\"width: 100%\"><td style=\"width: 100%; height: 250px; text-align: center;\"><img src=\"https://legko-v-uchebe.com/wp-content/uploads/2018/03/Owl.png\"></td></tr></table><p>Здравствуйте</p>\r\n\r\n<p>Вы успешно деактивировали свой аккаунт, это значит:</p>\r\n\r\n<p>1. Вы не сможете получить информацию о заказе</p>\r\n\r\n<p>2. Заказчики не увидят Ваш профиль</p>\r\n\r\n<p>3. Вы не получите заказ</p>\r\n\r\n<p>Если это случилось по случайности, восстановите профиль, пожалуйста</p>\r\n\r\n<p>Если возникли вопросы, свяжитесь с админом</p>\r\n\r\n<p>С уважением, Легко в учебе!</p>\r\n                                    ', '', '', ''),
(19, 'order_reassigned', 'Order successfully reassigned ', '<table style=\"width: 100%\"><tr style=\"width: 100%\"><td style=\"width: 100%; height: 250px; text-align: center;\"><img src=\"https://legko-v-uchebe.com/wp-content/uploads/2018/03/Owl.png\"></td></tr></table><p>Здравствуйте!</p>\r\n\r\n<p>заказ  №$orderid переназначен $preferred_writer,</p>\r\n\r\n<p>ID автора: $preferred_writer</p>\r\n<p>ID заказа: $orderid</p>\r\n\r\n<p>С уважением, Легко в учебе</p>\r\n                                                                        ', 'Order reassigned', '<table style=\"width: 100%\"><tr style=\"width: 100%\"><td style=\"width: 100%; height: 250px; text-align: center;\"><img src=\"https://legko-v-uchebe.com/wp-content/uploads/2018/03/Owl.png\"></td></tr></table><p>Здравствуйте!</p>\r\n\r\n<p>Заказ $orderid переназначен,</p>\r\n\r\nID автора: $preferred_writer</td>\r\nID заказа: №$orderid\r\n\r\n<p>Есть много причин, почему это могло произойти. Пожалуйста, свяжитесь с администратором.</p>\r\n\r\n<p>С уважением, Легко в учебе!</p>\r\n                                                                                          ', 'Oder reassigned to another writer', '<table style=\"width: 100%\"><tr style=\"width: 100%\"><td style=\"width: 100%; height: 250px; text-align: center;\"><img src=\"https://legko-v-uchebe.com/wp-content/uploads/2018/03/Owl.png\"></td></tr></table>Здравствуйте!<br>\r\nСпасибо за оплату! Ваш заказ  принят на исполнение.<br>\r\n Дата выполнения первой части работы  - <b>$half_work</b>.\r\nВы можете отслеживать статус Вашего заказа в Личном кабинете, а также вести переписку с автором и менеджером в чате, которые работают над Вашей работой.\r\n<br>\r\nДля входа в Личный кабинет перейдите по ссылке  http://legko-v-uchebe.com/in/ или Войти на сайте.\r\n<br>\r\n\r\nС уважением, Легко в учебе!\r\n', ''),
(21, 'new_message_received', 'message_template', '<table style=\"width: 100%\"><tr style=\"width: 100%\"><td style=\"width: 100%; height: 250px; text-align: center;\"><img src=\"http://legko-v-uchebe.com/wp-content/uploads/2018/03/Owl.png\"></td></tr></table>\r\n<table border=\\\"0\\\" cellspacing=\\\"0\\\" style=\\\"font-weight:light; width:100%\\\">\r\n	<tbody>\r\n		<tr>\r\n			<td>\r\n			<table align=\\\"center\\\" cellpadding=\\\"30\\\" cellspacing=\\\"0\\\" style=\\\"background-color:#ffffff; max-width:600px; width:100%\\\">\r\n				<tbody>\r\n					<tr>\r\n						<td style=\\\"vertical-align:top\\\">\r\n						<h1 style=\\\"margin-left:0px; margin-right:0px; text-align:center\\\"><em>$sitename</em></h1>\r\n						</td>\r\n					</tr>\r\n					<tr>\r\n						<td style=\\\"background-color:#ffffff; vertical-align:top; width:100%\\\">\r\n						<table border=\\\"0\\\" cellpadding=\\\"0\\\" cellspacing=\\\"0\\\" class=\\\"brdBottomPadd-two\\\" id=\\\"templateContainer\\\" style=\\\"width:100%\\\">\r\n							<tbody>\r\n								<tr>\r\n									<td style=\\\"vertical-align:top\\\">\r\n									<p>Уважаемый $receiver_name,</p>\r\n\r\n									<h1>Новое сообщение #$msg_id) получено</h1>\r\n									</td>\r\n								</tr>\r\n								<tr>\r\n								</tr>\r\n							</tbody>\r\n						</table>\r\n						</td>\r\n					</tr>\r\n					<tr>\r\n						<td style=\\\"background-color:#ffffff; width:100%\\\">\r\n						<table border=\\\"0\\\" cellpadding=\\\"0\\\" cellspacing=\\\"0\\\" class=\\\" brdBottomPadd-two\\\" id=\\\"templateContainerMiddle\\\" style=\\\"width:100%\\\">\r\n							<tbody>\r\n								<tr>\r\n									<td>\r\n									<table style=\\\"background-color:#ffffff; border-left:1px solid #d1e0e0; max-width:600px; padding:20px; width:100%\\\">\r\n										<tbody>\r\n											<tr>\r\n												<td>\r\n												<p>Вы получили новое сообщение, зарегистрируйтесь и проверьте</p>\r\n												</td>\r\n											</tr>\r\n											<tr>\r\n												<td>\r\n												<h1>$loginurl</h1>\r\n												</td>\r\n											</tr>\r\n										</tbody>\r\n									</table>\r\n									</td>\r\n								</tr>\r\n							</tbody>\r\n						</table>\r\n						</td>\r\n					</tr>\r\n					<tr>\r\n						<td style=\\\"vertical-align:top\\\"> </td>\r\n					</tr>\r\n				</tbody>\r\n			</table>\r\n			<!--[if (gte mso 9)|(IE)]>\r\n          </td>\r\n        </tr>\r\n    </table>\r\n    <![endif]--></td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n         ', 'message_template', '<table style=\"width: 100%\"><tr style=\"width: 100%\"><td style=\"width: 100%; height: 250px; text-align: center;\"><img src=\"http://legko-v-uchebe.com/wp-content/uploads/2018/03/Owl.png\"></td></tr></table><table border=\\\"0\\\" cellspacing=\\\"0\\\" style=\\\"font-weight:light; width:100%\\\">\r\n	<tbody>\r\n		<tr>\r\n			<td>\r\n			<table align=\\\"center\\\" cellpadding=\\\"30\\\" cellspacing=\\\"0\\\" style=\\\"background-color:#ffffff; max-width:600px; width:100%\\\">\r\n				<tbody>\r\n					<tr>\r\n						<td style=\\\"vertical-align:top\\\">\r\n						<h1 style=\\\"margin-left:0px; margin-right:0px; text-align:center\\\"><em>$sitename</em></h1>\r\n						</td>\r\n					</tr>\r\n					<tr>\r\n						<td style=\\\"background-color:#ffffff; vertical-align:top; width:100%\\\">\r\n						<table border=\\\"0\\\" cellpadding=\\\"0\\\" cellspacing=\\\"0\\\" class=\\\"brdBottomPadd-two\\\" id=\\\"templateContainer\\\" style=\\\"width:100%\\\">\r\n							<tbody>\r\n								<tr>\r\n									<td style=\\\"vertical-align:top\\\">\r\n									<p>Здравствуйте, $receiver_name,</p>\r\n\r\n									<h1>Новое сообщение #$msg_id) получено</h1>\r\n									</td>\r\n								</tr>\r\n								<tr>\r\n								</tr>\r\n							</tbody>\r\n						</table>\r\n						</td>\r\n					</tr>\r\n					<tr>\r\n						<td style=\\\"background-color:#ffffff; width:100%\\\">\r\n						<table border=\\\"0\\\" cellpadding=\\\"0\\\" cellspacing=\\\"0\\\" class=\\\" brdBottomPadd-two\\\" id=\\\"templateContainerMiddle\\\" style=\\\"width:100%\\\">\r\n							<tbody>\r\n								<tr>\r\n									<td>\r\n									<table style=\\\"background-color:#ffffff; border-left:1px solid #d1e0e0; max-width:600px; padding:20px; width:100%\\\">\r\n										<tbody>\r\n											<tr>\r\n												<td>Вы получили новое сообщение, войдите и проверьте</td>\r\n											</tr>\r\n											<tr>\r\n												<td>\r\n												<h1>$loginurl</h1>\r\n												</td>\r\n											</tr>\r\n										</tbody>\r\n									</table>\r\n									</td>\r\n								</tr>\r\n							</tbody>\r\n						</table>\r\n						</td>\r\n					</tr>\r\n					<tr>\r\n						<td style=\\\"vertical-align:top\\\"> </td>\r\n					</tr>\r\n				</tbody>\r\n			</table>\r\n			<!--[if (gte mso 9)|(IE)]>\r\n          </td>\r\n        </tr>\r\n    </table>\r\n    <![endif]--></td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n         ', 'message_template', '<table style=\"width: 100%\"><tr style=\"width: 100%\"><td style=\"width: 100%; height: 250px; text-align: center;\"><img src=\"http://legko-v-uchebe.com/wp-content/uploads/2018/03/Owl.png\"></td></tr></table><table border=\\\"0\\\" cellspacing=\\\"0\\\" style=\\\"font-weight:light; width:100%\\\">\r\n	<tbody>\r\n		<tr>\r\n			<td>\r\n			<table align=\\\"center\\\" cellpadding=\\\"30\\\" cellspacing=\\\"0\\\" style=\\\"background-color:#ffffff; max-width:600px; width:100%\\\">\r\n				<tbody>\r\n					<tr>\r\n						<td style=\\\"vertical-align:top\\\">\r\n						<h1 style=\\\"margin-left:0px; margin-right:0px; text-align:center\\\"><em>$sitename</em></h1>\r\n						</td>\r\n					</tr>\r\n					<tr>\r\n						<td style=\\\"background-color:#ffffff; vertical-align:top; width:100%\\\">\r\n						<table border=\\\"0\\\" cellpadding=\\\"0\\\" cellspacing=\\\"0\\\" class=\\\"brdBottomPadd-two\\\" id=\\\"templateContainer\\\" style=\\\"width:100%\\\">\r\n							<tbody>\r\n								<tr>\r\n									<td style=\\\"vertical-align:top\\\">\r\n									<p>Здравствуйте, $receiver_name,</p>\r\n\r\n									<h1>Новое сообщение #$msg_id) получено</h1>\r\n									</td>\r\n								</tr>\r\n								<tr>\r\n								</tr>\r\n							</tbody>\r\n						</table>\r\n						</td>\r\n					</tr>\r\n					<tr>\r\n						<td style=\\\"background-color:#ffffff; width:100%\\\">\r\n						<table border=\\\"0\\\" cellpadding=\\\"0\\\" cellspacing=\\\"0\\\" class=\\\" brdBottomPadd-two\\\" id=\\\"templateContainerMiddle\\\" style=\\\"width:100%\\\">\r\n							<tbody>\r\n								<tr>\r\n									<td>\r\n									<table style=\\\"background-color:#ffffff; border-left:1px solid #d1e0e0; max-width:600px; padding:20px; width:100%\\\">\r\n										<tbody>\r\n											<tr>\r\n												<td>Вы получили новое сообщение, зарегистрируйтесь и проверьте</td>\r\n											</tr>\r\n											<tr>\r\n												<td>\r\n												<h1>$loginurl</h1>\r\n												</td>\r\n											</tr>\r\n										</tbody>\r\n									</table>\r\n									</td>\r\n								</tr>\r\n							</tbody>\r\n						</table>\r\n						</td>\r\n					</tr>\r\n					<tr>\r\n						<td style=\\\"background-color:#ffffff; vertical-align:top; width:100%\\\"><!-- BEGIN BODY // --><!-- // END BODY --></td>\r\n					</tr>\r\n					<tr>\r\n						<td style=\\\"vertical-align:top\\\"> </td>\r\n					</tr>\r\n				</tbody>\r\n			</table>\r\n			<!--[if (gte mso 9)|(IE)]>\r\n          </td>\r\n        </tr>\r\n    </table>\r\n    <![endif]--></td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n', '');
INSERT INTO `msg_config` (`id`, `msg_id`, `msg_title_admin`, `msg_body_admin`, `msg_title_writer`, `msg_body_writer`, `msg_title_client`, `msg_body_client`, `msg_fields`) VALUES
(22, 'message_template', 'message_template', '<table style=\"width: 100%\"><tr style=\"width: 100%\"><td style=\"width: 100%; height: 250px; text-align: center;\"><img src=\"http://legko-v-uchebe.com/wp-content/uploads/2018/03/Owl.png\"></td></tr></table>\r\n  <table border=\\\"0\\\"  cellspacing=\\\"0\\\" style=\\\"font-weight: light\\\" width=\\\"100%\\\">\r\n    <tr>\r\n      <td>\r\n        <table align=\\\"center\\\" cellpadding=\\\"30\\\" cellspacing=\\\"0\\\"  style=\\\"\\\" style=\\\"font-family:\\\'Proxima N W01 At Reg\\\', Helvetica, Arial, sans-serif; background-color: #FFFFFF; width:100%;max-width:600px;\\\">\r\n          <tr>\r\n            <td id=\\\"templateContainerHeader\\\" valign=\\\"top\\\" mc:edit=\\\"welcomeEdit-01\\\">\r\n              <p style=\\\"text-align:center;margin:0;padding:0;font-size:35;color:#3386e4\\\">Opskill</p>\r\n            </td>\r\n          </tr>\r\n\r\n          <tr>\r\n            <td align=\\\"center\\\" valign=\\\"top\\\" style=\\\"background-color: #474d57; color: white; width:100%;max-width:600px; border:1px solid #d1e0e0\\\">\r\n              <table border=\\\"0\\\" cellpadding=\\\"0\\\" cellspacing=\\\"0\\\" class=\r\n              \\\"brdBottomPadd-two\\\" id=\\\"templateContainer\\\" width=\\\"100%\\\">\r\n                <tr>\r\n                  <td valign=\\\"top\\\" style=\\\"width:60%\\\">\r\n				  <p></p>\r\n                    <p style=\\\"color:white; font-size: 35px;line-height:1px\\\">The Photomanager</p>\r\n                    <p style=\\\"color:white;\\\">Now available on the Apple AppStore.</p>\r\n					<br/><br/>\r\n					<a style=\\\"text-decoration: none; color: #464e58; margin-top:20px; padding: 14px 50px; border-radius: 3px; background-color: #e4e4e4;\\\"> Oder now </a>\r\n                  </td>\r\n				  \r\n				  <td valign=\\\"top\\\" >\r\n                    <p><img src=\\\"https://writemyessay.cheap/img/plagiarism.png\\\"></p>\r\n                  </td>\r\n                </tr>\r\n              </table>\r\n            </td>\r\n          </tr>\r\n				\r\n\r\n				<tr style=\\\"background-color:#e8fcfe;text-align:center;\\\">\r\n				<td valign=\\\"top\\\" >\r\n				<p style=\\\"color:red; font-size: 20px;line-height:1px\\\">We Can Write Your Essay Within 8 Hours Or Less</p>\r\n                <p style=\\\"color:black;\\\">With over 200 experienced academic writers and editors we can write almost <br/>\r\n				any college or graduate paper within hours. Simply submit your instructions!</p>\r\n				<a style=\\\"text-decoration: none; color: white; margin-top:20px; padding: 14px 50px; border-radius: 3px; background-color: green;\\\"> Oder now </a>\r\n				</td>\r\n				</tr>\r\n          <tr>\r\n            <td align=\\\"center\\\" style=\\\"background-color: #FFFFFF; width:100%;max-width:600px; border:1px solid #d1e0e0\\\">\r\n\r\n              <table border=\\\"0\\\" cellpadding=\\\"0\\\" cellspacing=\\\"0\\\" class=\\\"brdBottomPadd-two \\\" id=\\\"templateContainerMiddle\\\" width=\\\"100%\\\">\r\n                <tr valign=\\\"top\\\">\r\n                  <td align=\\\"center\\\" class=\\\"bodyContentTicks\\\">\r\n                    <table border=\\\"0\\\" cellpadding=\\\"0\\\" cellspacing=\\\"0\\\" width=\\\"100%\\\">\r\n\r\n                      <tr valign=\\\"top\\\">\r\n                        <td valign=\\\"top\\\" mc:edit=\\\"welcomeEditImgFirst\\\" style=\\\"width:19%;color:#505050;font-family:Helvetica;font-size:14px;padding-bottom:1.143em;\\\">\r\n                          <p style=\r\n                          \\\"text-align:center;margin:0 0 15px 0;padding:0;\\\">\r\n                          <img height=\\\"\\\" src=\r\n                          \\\"https://upload.wikimedia.org/wikipedia/commons/thumb/5/50/Yes_Check_Circle.svg/120px-Yes_Check_Circle.svg.png\\\"\r\n                          style=\\\"display:block;\\\" width=\\\"91\\\"></p>\r\n                        </td>\r\n\r\n                        <td valign=\\\"top\\\" style=\\\"width:5%;\\\"> </td>\r\n\r\n                        <td valign=\\\"top\\\" style=\\\"width:71%;color:#505050;font-family:Helvetica;font-size:14px;padding-top:0.714em;\\\">\r\n                          <p><strong>Custom Essay Writing</strong></p>\r\n                          <p>We write custom essays from scratch and so 100% plagiarized. </p>\r\n                        </td>\r\n\r\n                        <td valign=\\\"top\\\" style=\\\"width:5%;\\\"> </td>\r\n                      </tr>\r\n\r\n                      <tr valign=\\\"top\\\">\r\n                        <td valign=\\\"top\\\" mc:edit=\\\"welcomeEditImgFirst\\\" style=\\\"width:19%;color:#505050;font-family:Helvetica;font-size:14px;padding-bottom:1.143em;\\\">\r\n                          <p style=\r\n                          \\\"text-align:center;margin:0 0 15px 0;padding:0;\\\">\r\n                          <img height=\\\"\\\" src=\r\n                          \\\"https://upload.wikimedia.org/wikipedia/commons/thumb/5/50/Yes_Check_Circle.svg/120px-Yes_Check_Circle.svg.png\\\"\r\n                          style=\\\"display:block;\\\" width=\\\"91\\\"></p>\r\n                        </td>\r\n\r\n                        <td valign=\\\"top\\\" style=\\\"width:5%;\\\"> </td>\r\n\r\n                        <td valign=\\\"top\\\" style=\\\"width:71%;color:#505050;font-family:Helvetica;font-size:14px;padding-top:0.714em;\\\">\r\n                          <p><strong>Choose from our writers</strong></p>\r\n                          <p>Qualified writers who ensure that you only get the best. </p>\r\n                        </td>\r\n\r\n                        <td valign=\\\"top\\\" style=\\\"width:5%;\\\"> </td>\r\n                      </tr>\r\n\r\n                      <tr valign=\\\"top\\\">\r\n                        <td valign=\\\"top\\\" mc:edit=\\\"welcomeEditImgFirst\\\" style=\\\"width:19%;color:#505050;font-family:Helvetica;font-size:14px;padding-bottom:1.143em;\\\">\r\n                          <p style=\r\n                          \\\"text-align:center;margin:0 0 15px 0;padding:0;\\\">\r\n                          <img height=\\\"\\\" src=\r\n                          \\\"http://www.stampready.net/dashboard/zip_uploads/x1LJDI2sTZNnePauiKoqbj6Q/Pixlr/images/round_image1.png\\\"\r\n                          style=\\\"display:block;\\\" width=\\\"91\\\"></p>\r\n                        </td>\r\n\r\n                        <td valign=\\\"top\\\" style=\\\"width:5%;\\\"> </td>\r\n\r\n                        <td valign=\\\"top\\\" mc:edit=\\\"welcomeEditTxtFirst\\\">\r\n                          <p><strong>Ontime delivery</strong></p>\r\n                          <p>We deliver uppto 8hours deadline, guaranteed. </p>\r\n                        </td>\r\n\r\n                        <td valign=\\\"top\\\" style=\\\"width:5%;\\\"> </td>\r\n                      </tr>\r\n\r\n                    </table>\r\n                  </td>\r\n\r\n                </tr>\r\n              </table>\r\n\r\n            </td>\r\n          </tr>\r\n\r\n          <tr>\r\n            <td align=\\\"center\\\" valign=\\\"top\\\" style=\\\"background-color: #FFFFFF; width:100%;max-width:600px; border:1px solid #d1e0e0\\\">\r\n              <!-- BEGIN BODY // -->\r\n\r\n              <table border=\\\"0\\\" cellpadding=\\\"0\\\" cellspacing=\\\"0\\\" id=\r\n              \\\"templateContainerMiddleBtm\\\" width=\\\"100%\\\">\r\n                <tr>\r\n                  <td class=\\\"bodyContent\\\" style=\\\"text-align:center\\\" valign=\\\"top\\\" mc:edit=\\\"welcomeEdit-11\\\">\r\n                    <p><strong>Get a 20% discount on your Orders today</strong></p>\r\n\r\n                    <p>Receive a 20% discount on your orders when you use the coupon code OPSKILL23.</p>\r\n			<a style=\\\"text-decoration: none; color: #464e58; margin-top:20px; padding: 14px 50px; border-radius: 3px; background-color: orange;\\\"> Oder now </a>\r\n		\r\n                  </td>\r\n                </tr>\r\n              </table><!-- // END BODY -->\r\n            </td>\r\n          </tr>\r\n\r\n          <tr>\r\n            <td align=\\\"center\\\" class=\\\"unSubContent\\\" id=\\\"bodyCellFooter\\\" valign=\r\n            \\\"top\\\">\r\n              <table border=\\\"0\\\" cellpadding=\\\"0\\\" cellspacing=\\\"0\\\" id=\r\n              \\\"templateContainerFooter\\\" width=\\\"100%\\\">\r\n                <tr>\r\n                  <td valign=\\\"top\\\" width=\\\"100%\\\" >\r\n                    <p style=\\\"text-align:center;margin-top: 9px;\\\">Opskill</p>\r\n                    <p style=\\\"text-align:center;\\\">All rights reserved</p>\r\n                  </td>\r\n                </tr>\r\n              </table>\r\n            </td>\r\n          </tr>\r\n        </table><!--[if (gte mso 9)|(IE)]>\r\n          </td>\r\n        </tr>\r\n    </table>\r\n    <![endif]-->\r\n      </td>\r\n    </tr>\r\n  </table>\r\n\r\n\r\n         ', 'message_template', '<table style=\"width: 100%\"><tr style=\"width: 100%\"><td style=\"width: 100%; height: 250px; text-align: center;\"><img src=\"http://legko-v-uchebe.com/wp-content/uploads/2018/03/Owl.png\"></td></tr></table><table border=\\\"0\\\" cellspacing=\\\"0\\\" style=\\\"width:100%\\\">\r\n	<tbody>\r\n		<tr>\r\n			<td>\r\n			<table align=\\\"center\\\" cellpadding=\\\"30\\\" cellspacing=\\\"0\\\">\r\n				<tbody>\r\n					<tr>\r\n						<td style=\\\"vertical-align:top\\\">\r\n						<h1 style=\\\"text-align:center\\\"><span style=\\\"font-size:72px\\\">Opskill</span></h1>\r\n						</td>\r\n					</tr>\r\n					<tr>\r\n						<td style=\\\"background-color:#474d57; vertical-align:top; width:100%\\\">\r\n						<table border=\\\"0\\\" cellpadding=\\\"0\\\" cellspacing=\\\"0\\\" style=\\\"width:100%\\\">\r\n							<tbody>\r\n								<tr>\r\n									<td style=\\\"vertical-align:top; width:60%\\\">\r\n									<p> </p>\r\n\r\n									<h1><span style=\\\"color:#ffffff\\\"><span style=\\\"font-size:28px\\\">The Photomanager</span></span></h1>\r\n\r\n									<p><span style=\\\"color:#ffffff\\\"><big>The best essay writing service</big></span></p>\r\n\r\n									<p style=\\\"text-align:center\\\"><br />\r\n									<span style=\\\"font-size:22px\\\"><a href=\\\"http://opskill.com\\\"><span style=\\\"background-color:#e67e22\\\">      Oder now       </span><span style=\\\"background-color:#2ecc71\\\"><span style=\\\"background-color:#e67e22\\\"> </span></span></a></span></p>\r\n									</td>\r\n									<td style=\\\"vertical-align:top\\\">\r\n									<p><img src=\\\"https://writemyessay.cheap/img/plagiarism.png\\\" /></p>\r\n									</td>\r\n								</tr>\r\n							</tbody>\r\n						</table>\r\n						</td>\r\n					</tr>\r\n					<tr>\r\n						<td style=\\\"vertical-align:top\\\">\r\n						<p>We Can Write Your Essay Within 8 Hours Or Less</p>\r\n\r\n						<p>With over 200 experienced academic writers and editors we can write almost<br />\r\n						any college or graduate paper within hours. Simply submit your instructions!</p>\r\n						Oder now</td>\r\n					</tr>\r\n					<tr>\r\n						<td style=\\\"background-color:#ffffff; width:100%\\\">\r\n						<table border=\\\"0\\\" cellpadding=\\\"0\\\" cellspacing=\\\"0\\\" style=\\\"width:100%\\\">\r\n							<tbody>\r\n								<tr>\r\n									<td>\r\n									<table border=\\\"0\\\" cellpadding=\\\"0\\\" cellspacing=\\\"0\\\" style=\\\"width:100%\\\">\r\n										<tbody>\r\n											<tr>\r\n												<td style=\\\"vertical-align:top; width:19%\\\">\r\n												<p><img src=\\\"https://upload.wikimedia.org/wikipedia/commons/thumb/5/50/Yes_Check_Circle.svg/120px-Yes_Check_Circle.svg.png\\\" style=\\\"width:91px\\\" /></p>\r\n												</td>\r\n												<td style=\\\"vertical-align:top; width:5%\\\"> </td>\r\n												<td style=\\\"vertical-align:top; width:71%\\\">\r\n												<p><strong>Custom Essay Writing</strong></p>\r\n\r\n												<p>We write custom essays from scratch and so 100% plagiarized.</p>\r\n												</td>\r\n												<td style=\\\"vertical-align:top; width:5%\\\"> </td>\r\n											</tr>\r\n											<tr>\r\n												<td style=\\\"vertical-align:top; width:19%\\\">\r\n												<p><img src=\\\"https://upload.wikimedia.org/wikipedia/commons/thumb/5/50/Yes_Check_Circle.svg/120px-Yes_Check_Circle.svg.png\\\" style=\\\"width:91px\\\" /></p>\r\n												</td>\r\n												<td style=\\\"vertical-align:top; width:5%\\\"> </td>\r\n												<td style=\\\"vertical-align:top; width:71%\\\">\r\n												<p><strong>Choose from our writers</strong></p>\r\n\r\n												<p>Qualified writers who ensure that you only get the best.</p>\r\n												</td>\r\n												<td style=\\\"vertical-align:top; width:5%\\\"> </td>\r\n											</tr>\r\n											<tr>\r\n												<td style=\\\"vertical-align:top; width:19%\\\">\r\n												<p><img src=\\\"http://www.stampready.net/dashboard/zip_uploads/x1LJDI2sTZNnePauiKoqbj6Q/Pixlr/images/round_image1.png\\\" style=\\\"width:91px\\\" /></p>\r\n												</td>\r\n												<td style=\\\"vertical-align:top; width:5%\\\"> </td>\r\n												<td style=\\\"vertical-align:top\\\">\r\n												<p><strong>Ontime delivery</strong></p>\r\n\r\n												<p>We deliver uppto 8hours deadline, guaranteed.</p>\r\n												</td>\r\n												<td style=\\\"vertical-align:top; width:5%\\\"> </td>\r\n											</tr>\r\n										</tbody>\r\n									</table>\r\n									</td>\r\n								</tr>\r\n							</tbody>\r\n						</table>\r\n						</td>\r\n					</tr>\r\n					<tr>\r\n						<td style=\\\"background-color:#ffffff; vertical-align:top; width:100%\\\"><!-- BEGIN BODY // -->\r\n						<table border=\\\"0\\\" cellpadding=\\\"0\\\" cellspacing=\\\"0\\\" style=\\\"width:100%\\\">\r\n							<tbody>\r\n								<tr>\r\n									<td style=\\\"text-align:center; vertical-align:top\\\">\r\n									<p><strong>Get a 20% discount on your Orders today</strong></p>\r\n\r\n									<p>Receive a 20% discount on your orders when you use the coupon code OPSKILL23.</p>\r\n									Oder now</td>\r\n								</tr>\r\n							</tbody>\r\n						</table>\r\n						<!-- // END BODY --></td>\r\n					</tr>\r\n					<tr>\r\n						<td style=\\\"vertical-align:top\\\">\r\n						<table border=\\\"0\\\" cellpadding=\\\"0\\\" cellspacing=\\\"0\\\" style=\\\"width:100%\\\">\r\n							<tbody>\r\n								<tr>\r\n									<td style=\\\"vertical-align:top\\\">\r\n									<p style=\\\"text-align:center\\\"><span style=\\\"font-size:36px\\\">Opskill</span></p>\r\n\r\n									<p style=\\\"text-align:center\\\">All rights reserved</p>\r\n									</td>\r\n								</tr>\r\n							</tbody>\r\n						</table>\r\n						</td>\r\n					</tr>\r\n				</tbody>\r\n			</table>\r\n			<!--[if (gte mso 9)|(IE)]>\r\n          </td>\r\n        </tr>\r\n    </table>\r\n    <![endif]--></td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n         ', 'message_template', '<table style=\"width: 100%\"><tr style=\"width: 100%\"><td style=\"width: 100%; height: 250px; text-align: center;\"><img src=\"http://legko-v-uchebe.com/wp-content/uploads/2018/03/Owl.png\"></td></tr></table><table border=\\\"0\\\" cellspacing=\\\"0\\\" style=\\\"width:100%\\\">\r\n	<tbody>\r\n		<tr>\r\n			<td>\r\n			<table align=\\\"center\\\" cellpadding=\\\"30\\\" cellspacing=\\\"0\\\">\r\n				<tbody>\r\n					<tr>\r\n						<td style=\\\"vertical-align:top\\\">\r\n						<h1 style=\\\"text-align:center\\\"><span style=\\\"font-size:72px\\\">Opskill</span></h1>\r\n						</td>\r\n					</tr>\r\n					<tr>\r\n						<td style=\\\"background-color:#474d57; vertical-align:top; width:100%\\\">\r\n						<table border=\\\"0\\\" cellpadding=\\\"0\\\" cellspacing=\\\"0\\\" style=\\\"width:100%\\\">\r\n							<tbody>\r\n								<tr>\r\n									<td style=\\\"vertical-align:top; width:60%\\\">\r\n									<p> </p>\r\n\r\n									<h1><span style=\\\"color:#ffffff\\\"><span style=\\\"font-size:28px\\\">The Photomanager</span></span></h1>\r\n\r\n									<p><span style=\\\"color:#ffffff\\\"><big>The best essay writing service</big></span></p>\r\n\r\n									<p style=\\\"text-align:center\\\"><br />\r\n									<span style=\\\"font-size:22px\\\"><a href=\\\"http://opskill.com\\\"><span style=\\\"background-color:#e67e22\\\">      Oder now       </span><span style=\\\"background-color:#2ecc71\\\"><span style=\\\"background-color:#e67e22\\\"> </span></span></a></span></p>\r\n									</td>\r\n									<td style=\\\"vertical-align:top\\\">\r\n									<p><img src=\\\"https://writemyessay.cheap/img/plagiarism.png\\\" /></p>\r\n									</td>\r\n								</tr>\r\n							</tbody>\r\n						</table>\r\n						</td>\r\n					</tr>\r\n					<tr>\r\n						<td style=\\\"vertical-align:top\\\">\r\n						<p>We Can Write Your Essay Within 8 Hours Or Less</p>\r\n\r\n						<p>With over 200 experienced academic writers and editors we can write almost<br />\r\n						any college or graduate paper within hours. Simply submit your instructions!</p>\r\n						Oder now</td>\r\n					</tr>\r\n					<tr>\r\n						<td style=\\\"background-color:#ffffff; width:100%\\\">\r\n						<table border=\\\"0\\\" cellpadding=\\\"0\\\" cellspacing=\\\"0\\\" style=\\\"width:100%\\\">\r\n							<tbody>\r\n								<tr>\r\n									<td>\r\n									<table border=\\\"0\\\" cellpadding=\\\"0\\\" cellspacing=\\\"0\\\" style=\\\"width:100%\\\">\r\n										<tbody>\r\n											<tr>\r\n												<td style=\\\"vertical-align:top; width:19%\\\">\r\n												<p><img src=\\\"https://upload.wikimedia.org/wikipedia/commons/thumb/5/50/Yes_Check_Circle.svg/120px-Yes_Check_Circle.svg.png\\\" style=\\\"width:91px\\\" /></p>\r\n												</td>\r\n												<td style=\\\"vertical-align:top; width:5%\\\"> </td>\r\n												<td style=\\\"vertical-align:top; width:71%\\\">\r\n												<p><strong>Custom Essay Writing</strong></p>\r\n\r\n												<p>We write custom essays from scratch and so 100% plagiarized.</p>\r\n												</td>\r\n												<td style=\\\"vertical-align:top; width:5%\\\"> </td>\r\n											</tr>\r\n											<tr>\r\n												<td style=\\\"vertical-align:top; width:19%\\\">\r\n												<p><img src=\\\"https://upload.wikimedia.org/wikipedia/commons/thumb/5/50/Yes_Check_Circle.svg/120px-Yes_Check_Circle.svg.png\\\" style=\\\"width:91px\\\" /></p>\r\n												</td>\r\n												<td style=\\\"vertical-align:top; width:5%\\\"> </td>\r\n												<td style=\\\"vertical-align:top; width:71%\\\">\r\n												<p><strong>Choose from our writers</strong></p>\r\n\r\n												<p>Qualified writers who ensure that you only get the best.</p>\r\n												</td>\r\n												<td style=\\\"vertical-align:top; width:5%\\\"> </td>\r\n											</tr>\r\n											<tr>\r\n												<td style=\\\"vertical-align:top; width:19%\\\">\r\n												<p><img src=\\\"http://www.stampready.net/dashboard/zip_uploads/x1LJDI2sTZNnePauiKoqbj6Q/Pixlr/images/round_image1.png\\\" style=\\\"width:91px\\\" /></p>\r\n												</td>\r\n												<td style=\\\"vertical-align:top; width:5%\\\"> </td>\r\n												<td style=\\\"vertical-align:top\\\">\r\n												<p><strong>Ontime delivery</strong></p>\r\n\r\n												<p>We deliver uppto 8hours deadline, guaranteed.</p>\r\n												</td>\r\n												<td style=\\\"vertical-align:top; width:5%\\\"> </td>\r\n											</tr>\r\n										</tbody>\r\n									</table>\r\n									</td>\r\n								</tr>\r\n							</tbody>\r\n						</table>\r\n						</td>\r\n					</tr>\r\n					<tr>\r\n						<td style=\\\"background-color:#ffffff; vertical-align:top; width:100%\\\"><!-- BEGIN BODY // -->\r\n						<table border=\\\"0\\\" cellpadding=\\\"0\\\" cellspacing=\\\"0\\\" style=\\\"width:100%\\\">\r\n							<tbody>\r\n								<tr>\r\n									<td style=\\\"text-align:center; vertical-align:top\\\">\r\n									<p><strong>Get a 20% discount on your Orders today</strong></p>\r\n\r\n									<p>Receive a 20% discount on your orders when you use the coupon code OPSKILL23.</p>\r\n									Oder now</td>\r\n								</tr>\r\n							</tbody>\r\n						</table>\r\n						<!-- // END BODY --></td>\r\n					</tr>\r\n					<tr>\r\n						<td style=\\\"vertical-align:top\\\">\r\n						<table border=\\\"0\\\" cellpadding=\\\"0\\\" cellspacing=\\\"0\\\" style=\\\"width:100%\\\">\r\n							<tbody>\r\n								<tr>\r\n									<td style=\\\"vertical-align:top\\\">\r\n									<p style=\\\"text-align:center\\\"><span style=\\\"font-size:36px\\\">Opskill Company</span></p>\r\n\r\n									<p style=\\\"text-align:center\\\">All rights reserved</p>\r\n									</td>\r\n								</tr>\r\n							</tbody>\r\n						</table>\r\n						</td>\r\n					</tr>\r\n				</tbody>\r\n			</table>\r\n			<!--[if (gte mso 9)|(IE)]>\r\n          </td>\r\n        </tr>\r\n    </table>\r\n    <![endif]--></td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n', ''),
(23, 'message_oplata', 'message_oplata', '<table style=\"width: 100%\"><tr style=\"width: 100%\"><td style=\"width: 100%; height: 250px; text-align: center;\"><img src=\"http://legko-v-uchebe.com/wp-content/uploads/2018/03/Owl.png\"></td></tr></table>\r\n\r\nmsg_body_admin                  ', 'msg_title_writer', '<table style=\"width: 100%\"><tr style=\"width: 100%\"><td style=\"width: 100%; height: 250px; text-align: center;\"><img src=\"https://legko-v-uchebe.com/wp-content/uploads/2018/03/Owl.png\"></td></tr></table>Здравствуйте!<br>\r\nПо заказу №$orderid Вы были оштрафованы, за  несоблюдения условий сотрудничества \r\nДетали можно увидеть в «Личном кабинете». Перейти в личный кабинет по следующей ссылке  https://legko-v-uchebe.com/in/user/myaccount , для входа используйте свой email и пароль.\r\n<br><br>\r\nС уважением, Легко в учебе!\r\n                                                                                          ', 'msg_title_client', '<table style=\"width: 100%\"><tr style=\"width: 100%\"><td style=\"width: 100%; height: 250px; text-align: center;\"><img src=\"https://legko-v-uchebe.com/wp-content/uploads/2018/03/Owl.png\"></td></tr></table>Здравствуйте!<br>\r\nМы готовы исполнить ваш заказ <br>\r\nСтоимость вашего заказа –   $oplata грн. <br>\r\nВаши дальнейшие действия: \r\n<ol>\r\n<li>Для подтверждения заказа Вы вносите предоплату (50 % стоимости работы) или всю стоимость заказа с помощью удобного для Вас способа оплаты и сообщаете нам сумму и время оплаты в чат по заказу или на:\r\n<br>\r\n  E-mail: support@legko-v-uchebe.com , <br>\r\nSkype: legkovuchebe, <br>\r\nТел/ viber(096) 005-45-75</li>\r\n<li>\r\nС момента получения данных об оплате мы начинаем исполнение заказа \r\n</li>\r\n<li>\r\nЕсли к Вашей работе нужно исполнить план – мы приступаем к его исполнению после оплаты аванса или всей стоимости заказа \r\n</li>\r\n<li>\r\nВ указанный срок мы пришлем половину заказанной работы у Ваш «Личный кабинет». После предварительной проверки для подтверждения дальнейшего сотрудничества Вы вносите остальную часть оплаты (50 % стоимости работы) если не была внесена вся сумма с помощью удобного для Вас способа оплаты и сообщаете нам сумму и время оплаты.\r\n</li>\r\n<li>\r\nВ оговоренный в форме заказа срок Вы получаете готовую работу у Ваш Личный кабинет.\r\n</li>\r\n</ol>\r\n<b>Затягивание с оплатой может повлиять на цену и своевременность исполнения Ваших пожеланий </b><br>\r\nПолезная информация: <br>\r\nНаши гарантии - это наши довольные клиенты: <br>\r\nhttps://legko-v-uchebe.com/otzyvy/ - Отзывы\r\n<br><br>\r\nРЕКВИЗИТЫ ДЛЯ ОПЛАТЫ <br>\r\nдля оплаты через ПРИВАТ \r\nКарта приват банка 5168 7573 5765 3353 , на имя Бойко Вероника Александровна \r\nДля оплаты ДРУГИХ банков и терминалов \r\nКарта ощад банка 5167 4900 7377 9648, на имя Бойко Вероника Александровна\r\n\r\n\r\n<br>\r\n<b>С уважением, Легко в учебе!</b>\r\n                                                      ', ''),
(24, 'message_plan', 'message_plan', '<table style=\"width: 100%\"><tr style=\"width: 100%\"><td style=\"width: 100%; height: 250px; text-align: center;\"><img src=\"https://legko-v-uchebe.com/wp-content/uploads/2018/03/Owl.png\"></td></tr></table>\r\n<table style=\\\"width: 100%\\\"><tr style=\\\"width: 100%\\\"><td style=\\\"width: 100%; height: 250px; text-align: center;\\\"><img src=\\\"https://legko-v-uchebe.com/wp-content/uploads/2018/03/Owl.png\\\"></td></tr></table>Здравствуйте!<br>\r\nВот и план работы   на утверждение у научного руководителя.<br><br>\r\n<b>Обратите внимание!</b><br> Чем быстрее Вы утвердите план, тем быстрее мы приступим к исполнению Вашего заказа.<br>\r\n\r\n  Для ознакомления с планом  войдите в Личный кабинет перейдите по ссылке https://legko-v-uchebe.com/in/ или «Войти» на сайте.<br><br>\r\n	\r\nСхема последующих Ваших действий:<br>\r\n<ol>\r\n<li>Вы утверждаете план у руководителя и информируете нас, что план утвержден. Если у руководителя есть замечания к плану, рекомендации, пожелания, Вы обязательно указываете их в письме. </li>\r\n<li>С момента получения утвержденного плана, ми начинаем исполнение заказа.</li>\r\n</ol>\r\nС уважением, Легко в учебе!\r\n\r\n                                                                                 ', 'message_plan', '<table style=\"width: 100%\"><tr style=\"width: 100%\"><td style=\"width: 100%; height: 250px; text-align: center;\"><img src=\"https://legko-v-uchebe.com/wp-content/uploads/2018/03/Owl.png\"></td></tr></table>Здравствуйте!<br>\r\nПо плану заказа №$orderid есть ответ  от заказчика<br><br>\r\nДетали можно увидеть в Личном кабинете. Перейти в личный кабинет по следующей ссылке  https://legko-v-uchebe.com/in/ , для входа используйте свой email и пароль.<br><br>\r\nС уважением, Легко в учебе!\r\n                                                                                                   ', 'message_plan', '<table style=\"width: 100%\"><tr style=\"width: 100%\"><td style=\"width: 100%; height: 250px; text-align: center;\"><img src=\"https://legko-v-uchebe.com/wp-content/uploads/2018/03/Owl.png\"></td></tr></table>Здравствуйте!<br>\r\nВот и план работы   на утверждение у научного руководителя.<br><br>\r\n<b>Обратите внимание!</b><br> Чем быстрее Вы утвердите план, тем быстрее мы приступим к исполнению Вашего заказа.<br>\r\n\r\n  Для ознакомления с планом  войдите в «Личный кабинет» перейдите по ссылке https://legko-v-uchebe.com/in/ или «Войти» на сайте.<br><br>\r\n	\r\nСхема последующих Ваших действий:<br>\r\n<ol>\r\n<li>Вы утверждаете план у руководителя и информируете нас, что план утвержден. Если у руководителя есть замечания к плану, рекомендации, пожелания, Вы обязательно указываете их в письме. </li>\r\n<li>С момента получения утвержденного плана, ми начинаем исполнение заказа.</li>\r\n</ol>\r\nС уважением, Легко в учебе!\r\n', ''),
(25, 'message_order_complete', 'message_order_complete', '', 'message_order_complete', '<table style=\"width: 100%\"><tr style=\"width: 100%\"><td style=\"width: 100%; height: 250px; text-align: center;\"><img src=\"https://legko-v-uchebe.com/wp-content/uploads/2018/03/Owl.png\"></td></tr></table>Здравствуйте!\r\n<br><br>\r\nВам был успешно оплачен заказ №$orderid\r\n<br><br>\r\nС уважением, Легко в учебе!                                                               ', 'message_order_complete', '<table style=\"width: 100%\"><tr style=\"width: 100%\"><td style=\"width: 100%; height: 250px; text-align: center;\"><img src=\"https://legko-v-uchebe.com/wp-content/uploads/2018/03/Owl.png\"></td></tr></table>Здравствуйте!<br>\r\nВаш готовый заказ! Для ознакомления с заказом войдите в Личный кабинет перейдите по ссылке https://legko-v-uchebe.com/in/ или Войти на сайте.<br>\r\n\r\nВаш заказ бесплатно обслуживается (внесение корректив, правок, консультации) на протяжении 31 дня с момента получения вами этого письма. <br>\r\nЖелаем удачной защиты!<br>\r\nОбращаем Ваше внимание!<br>\r\nЕсли у научного руководителя после проверки работы будут замечания (это нормальное явление) - предоставляете нам перечень чётко сформулированных замечаний руководителя к работе. <br>\r\nВ таком случае мы внесем все необходимые правки быстро и бесплатно, если данные правки не выходят за рамки ранее поставленного вами задания.<br>\r\nБудем благодарны за ваш отзыв о нас тут https://legko-v-uchebe.com/otzyvy/<br>\r\n<br><br>\r\nС уважением, Легко в учебе!', '');

-- --------------------------------------------------------

--
-- Структура таблицы `opskill_questions`
--

CREATE TABLE `opskill_questions` (
  `orderid` int(11) NOT NULL,
  `trackingid` varchar(100) NOT NULL,
  `topic` varchar(1000) NOT NULL,
  `alias` varchar(1500) NOT NULL,
  `typeofservice` varchar(20) NOT NULL,
  `subject` varchar(50) NOT NULL,
  `words` int(30) NOT NULL,
  `academic_level` varchar(50) NOT NULL,
  `sources` varchar(50) NOT NULL,
  `referencing_style` varchar(20) NOT NULL,
  `instructions` text NOT NULL,
  `urgency` varchar(20) NOT NULL,
  `currency` varchar(10) NOT NULL,
  `amount` float NOT NULL,
  `writerpay` float NOT NULL,
  `client_paid` varchar(40) NOT NULL,
  `customer` varchar(40) NOT NULL,
  `customer_email` varchar(50) NOT NULL,
  `customer_name` varchar(50) NOT NULL,
  `order_status` varchar(40) NOT NULL,
  `date_posted` datetime NOT NULL,
  `deadline` datetime NOT NULL,
  `deadline_writers` datetime NOT NULL,
  `preferred_writer` int(11) NOT NULL,
  `writer_name` varchar(60) NOT NULL,
  `writerpaid` varchar(50) NOT NULL,
  `order_rating` int(11) NOT NULL,
  `rating_comment` text NOT NULL,
  `project_type` varchar(50) NOT NULL,
  `order_period` varchar(50) NOT NULL,
  `notification_sent` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `opskill_questions1`
--

CREATE TABLE `opskill_questions1` (
  `orderid` int(11) NOT NULL,
  `trackingid` varchar(100) NOT NULL,
  `topic` varchar(1000) NOT NULL,
  `alias` varchar(1500) NOT NULL,
  `typeofservice` varchar(20) NOT NULL,
  `subject` varchar(50) NOT NULL,
  `words` int(30) NOT NULL,
  `academic_level` varchar(50) NOT NULL,
  `sources` varchar(50) NOT NULL,
  `referencing_style` varchar(20) NOT NULL,
  `instructions` text NOT NULL,
  `urgency` varchar(20) NOT NULL,
  `currency` varchar(10) NOT NULL,
  `amount` float NOT NULL,
  `writerpay` float NOT NULL,
  `client_paid` varchar(40) NOT NULL,
  `customer` varchar(40) NOT NULL,
  `customer_email` varchar(50) NOT NULL,
  `customer_name` varchar(50) NOT NULL,
  `order_status` varchar(40) NOT NULL,
  `date_posted` datetime NOT NULL,
  `deadline` datetime NOT NULL,
  `deadline_writers` datetime NOT NULL,
  `preferred_writer` int(11) NOT NULL,
  `writer_name` varchar(60) NOT NULL,
  `writerpaid` varchar(50) NOT NULL,
  `order_rating` int(11) NOT NULL,
  `rating_comment` text NOT NULL,
  `project_type` varchar(50) NOT NULL,
  `order_period` varchar(50) NOT NULL,
  `notification_sent` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `opskill_questions1`
--

INSERT INTO `opskill_questions1` (`orderid`, `trackingid`, `topic`, `alias`, `typeofservice`, `subject`, `words`, `academic_level`, `sources`, `referencing_style`, `instructions`, `urgency`, `currency`, `amount`, `writerpay`, `client_paid`, `customer`, `customer_email`, `customer_name`, `order_status`, `date_posted`, `deadline`, `deadline_writers`, `preferred_writer`, `writer_name`, `writerpaid`, `order_rating`, `rating_comment`, `project_type`, `order_period`, `notification_sent`) VALUES
(280, '', 'zxc', '', '', '', 0, '', '', '', '', '', '', 0, 0, '', '', '', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '', '', 0, '', '', '', 0);

-- --------------------------------------------------------

--
-- Структура таблицы `opskill_questions2`
--

CREATE TABLE `opskill_questions2` (
  `orderid` int(11) NOT NULL,
  `trackingid` varchar(100) NOT NULL,
  `topic` varchar(1000) NOT NULL,
  `alias` varchar(1500) NOT NULL,
  `typeofservice` varchar(20) NOT NULL,
  `subject` varchar(50) NOT NULL,
  `words` int(30) NOT NULL,
  `academic_level` varchar(50) NOT NULL,
  `sources` varchar(50) NOT NULL,
  `referencing_style` varchar(20) NOT NULL,
  `instructions` text NOT NULL,
  `urgency` varchar(20) NOT NULL,
  `currency` varchar(10) NOT NULL,
  `amount` float NOT NULL,
  `writerpay` float NOT NULL,
  `client_paid` varchar(40) NOT NULL,
  `customer` varchar(40) NOT NULL,
  `customer_email` varchar(50) NOT NULL,
  `customer_name` varchar(50) NOT NULL,
  `order_status` varchar(40) NOT NULL,
  `date_posted` datetime NOT NULL,
  `deadline` datetime NOT NULL,
  `deadline_writers` datetime NOT NULL,
  `preferred_writer` int(11) NOT NULL,
  `writer_name` varchar(60) NOT NULL,
  `writerpaid` varchar(50) NOT NULL,
  `order_rating` int(11) NOT NULL,
  `rating_comment` text NOT NULL,
  `project_type` varchar(50) NOT NULL,
  `order_period` varchar(50) NOT NULL,
  `notification_sent` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `opskill_questions2`
--

INSERT INTO `opskill_questions2` (`orderid`, `trackingid`, `topic`, `alias`, `typeofservice`, `subject`, `words`, `academic_level`, `sources`, `referencing_style`, `instructions`, `urgency`, `currency`, `amount`, `writerpay`, `client_paid`, `customer`, `customer_email`, `customer_name`, `order_status`, `date_posted`, `deadline`, `deadline_writers`, `preferred_writer`, `writer_name`, `writerpaid`, `order_rating`, `rating_comment`, `project_type`, `order_period`, `notification_sent`) VALUES
(280, '', 'zxc', 'dew', '', '', 0, '', '', '', 'sssswdw', '', '', 0, 0, '', '', '', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '', '', 0, '', '', '', 0);

-- --------------------------------------------------------

--
-- Структура таблицы `opskill_questions3`
--

CREATE TABLE `opskill_questions3` (
  `orderid` int(11) NOT NULL,
  `trackingid` varchar(100) NOT NULL,
  `topic` varchar(1000) NOT NULL,
  `alias` varchar(1500) NOT NULL,
  `typeofservice` varchar(20) NOT NULL,
  `subject` varchar(50) NOT NULL,
  `words` int(30) NOT NULL,
  `academic_level` varchar(50) NOT NULL,
  `sources` varchar(50) NOT NULL,
  `referencing_style` varchar(20) NOT NULL,
  `instructions` text NOT NULL,
  `urgency` varchar(20) NOT NULL,
  `currency` varchar(10) NOT NULL,
  `amount` float NOT NULL,
  `writerpay` float NOT NULL,
  `client_paid` varchar(40) NOT NULL,
  `customer` varchar(40) NOT NULL,
  `customer_email` varchar(50) NOT NULL,
  `customer_name` varchar(50) NOT NULL,
  `order_status` varchar(40) NOT NULL,
  `date_posted` datetime NOT NULL,
  `deadline` datetime NOT NULL,
  `deadline_writers` datetime NOT NULL,
  `preferred_writer` int(11) NOT NULL,
  `writer_name` varchar(60) NOT NULL,
  `writerpaid` varchar(50) NOT NULL,
  `order_rating` int(11) NOT NULL,
  `rating_comment` text NOT NULL,
  `project_type` varchar(50) NOT NULL,
  `order_period` varchar(50) NOT NULL,
  `notification_sent` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `opskill_questions3`
--

INSERT INTO `opskill_questions3` (`orderid`, `trackingid`, `topic`, `alias`, `typeofservice`, `subject`, `words`, `academic_level`, `sources`, `referencing_style`, `instructions`, `urgency`, `currency`, `amount`, `writerpay`, `client_paid`, `customer`, `customer_email`, `customer_name`, `order_status`, `date_posted`, `deadline`, `deadline_writers`, `preferred_writer`, `writer_name`, `writerpaid`, `order_rating`, `rating_comment`, `project_type`, `order_period`, `notification_sent`) VALUES
(280, '', 'zxc', '', '', '', 0, '', '', '', '', '', '', 0, 0, '', '', '', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '', '', 0, '', '', '', 0);

-- --------------------------------------------------------

--
-- Структура таблицы `opskill_questions4`
--

CREATE TABLE `opskill_questions4` (
  `orderid` int(11) NOT NULL,
  `trackingid` varchar(100) NOT NULL,
  `topic` varchar(1000) NOT NULL,
  `alias` varchar(1500) NOT NULL,
  `typeofservice` varchar(20) NOT NULL,
  `subject` varchar(50) NOT NULL,
  `words` int(30) NOT NULL,
  `academic_level` varchar(50) NOT NULL,
  `sources` varchar(50) NOT NULL,
  `referencing_style` varchar(20) NOT NULL,
  `instructions` text NOT NULL,
  `urgency` varchar(20) NOT NULL,
  `currency` varchar(10) NOT NULL,
  `amount` float NOT NULL,
  `writerpay` float NOT NULL,
  `client_paid` varchar(40) NOT NULL,
  `customer` varchar(40) NOT NULL,
  `customer_email` varchar(50) NOT NULL,
  `customer_name` varchar(50) NOT NULL,
  `order_status` varchar(40) NOT NULL,
  `date_posted` datetime NOT NULL,
  `deadline` datetime NOT NULL,
  `deadline_writers` datetime NOT NULL,
  `preferred_writer` int(11) NOT NULL,
  `writer_name` varchar(60) NOT NULL,
  `writerpaid` varchar(50) NOT NULL,
  `order_rating` int(11) NOT NULL,
  `rating_comment` text NOT NULL,
  `project_type` varchar(50) NOT NULL,
  `order_period` varchar(50) NOT NULL,
  `notification_sent` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `opskill_questions4`
--

INSERT INTO `opskill_questions4` (`orderid`, `trackingid`, `topic`, `alias`, `typeofservice`, `subject`, `words`, `academic_level`, `sources`, `referencing_style`, `instructions`, `urgency`, `currency`, `amount`, `writerpay`, `client_paid`, `customer`, `customer_email`, `customer_name`, `order_status`, `date_posted`, `deadline`, `deadline_writers`, `preferred_writer`, `writer_name`, `writerpaid`, `order_rating`, `rating_comment`, `project_type`, `order_period`, `notification_sent`) VALUES
(280, '', 'zxc', '', '', '', 0, '', '', '', '', '', '', 0, 0, '', '', '', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '', '', 0, '', '', '', 0);

-- --------------------------------------------------------

--
-- Структура таблицы `opskill_questions5`
--

CREATE TABLE `opskill_questions5` (
  `orderid` int(11) NOT NULL,
  `trackingid` varchar(100) NOT NULL,
  `topic` varchar(1000) NOT NULL,
  `alias` varchar(1500) NOT NULL,
  `typeofservice` varchar(20) NOT NULL,
  `subject` varchar(50) NOT NULL,
  `words` int(30) NOT NULL,
  `academic_level` varchar(50) NOT NULL,
  `sources` varchar(50) NOT NULL,
  `referencing_style` varchar(20) NOT NULL,
  `instructions` text NOT NULL,
  `urgency` varchar(20) NOT NULL,
  `currency` varchar(10) CHARACTER SET latin1 NOT NULL,
  `amount` float NOT NULL,
  `writerpay` float NOT NULL,
  `client_paid` varchar(40) NOT NULL,
  `customer` varchar(40) NOT NULL,
  `customer_email` varchar(50) NOT NULL,
  `customer_name` varchar(50) NOT NULL,
  `order_status` varchar(40) NOT NULL,
  `date_posted` datetime NOT NULL,
  `deadline` datetime NOT NULL,
  `deadline_writers` datetime NOT NULL,
  `preferred_writer` int(11) NOT NULL,
  `writer_name` varchar(60) NOT NULL,
  `writerpaid` varchar(50) NOT NULL,
  `order_rating` int(11) NOT NULL,
  `rating_comment` text NOT NULL,
  `project_type` varchar(50) NOT NULL,
  `order_period` varchar(50) NOT NULL,
  `notification_sent` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `opskill_questions5`
--

INSERT INTO `opskill_questions5` (`orderid`, `trackingid`, `topic`, `alias`, `typeofservice`, `subject`, `words`, `academic_level`, `sources`, `referencing_style`, `instructions`, `urgency`, `currency`, `amount`, `writerpay`, `client_paid`, `customer`, `customer_email`, `customer_name`, `order_status`, `date_posted`, `deadline`, `deadline_writers`, `preferred_writer`, `writer_name`, `writerpaid`, `order_rating`, `rating_comment`, `project_type`, `order_period`, `notification_sent`) VALUES
(280, '', 'zxc', '', '', '', 0, '', '', '', '', '', '', 0, 0, '', '', '', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '', '', 0, '', '', '', 0);

-- --------------------------------------------------------

--
-- Структура таблицы `opskill_questions6`
--

CREATE TABLE `opskill_questions6` (
  `orderid` int(11) NOT NULL,
  `trackingid` varchar(100) NOT NULL,
  `topic` varchar(1000) NOT NULL,
  `alias` varchar(1500) NOT NULL,
  `typeofservice` varchar(20) NOT NULL,
  `subject` varchar(50) NOT NULL,
  `words` int(30) NOT NULL,
  `academic_level` varchar(50) NOT NULL,
  `sources` varchar(50) NOT NULL,
  `referencing_style` varchar(20) NOT NULL,
  `instructions` text NOT NULL,
  `urgency` varchar(20) NOT NULL,
  `currency` varchar(10) NOT NULL,
  `amount` float NOT NULL,
  `writerpay` float NOT NULL,
  `client_paid` varchar(40) NOT NULL,
  `customer` varchar(40) NOT NULL,
  `customer_email` varchar(50) NOT NULL,
  `customer_name` varchar(50) NOT NULL,
  `order_status` varchar(40) NOT NULL,
  `date_posted` datetime NOT NULL,
  `deadline` datetime NOT NULL,
  `deadline_writers` datetime NOT NULL,
  `preferred_writer` int(11) NOT NULL,
  `writer_name` varchar(60) NOT NULL,
  `writerpaid` varchar(50) NOT NULL,
  `order_rating` int(11) NOT NULL,
  `rating_comment` text NOT NULL,
  `project_type` varchar(50) NOT NULL,
  `order_period` varchar(50) NOT NULL,
  `notification_sent` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `opskill_questions6`
--

INSERT INTO `opskill_questions6` (`orderid`, `trackingid`, `topic`, `alias`, `typeofservice`, `subject`, `words`, `academic_level`, `sources`, `referencing_style`, `instructions`, `urgency`, `currency`, `amount`, `writerpay`, `client_paid`, `customer`, `customer_email`, `customer_name`, `order_status`, `date_posted`, `deadline`, `deadline_writers`, `preferred_writer`, `writer_name`, `writerpaid`, `order_rating`, `rating_comment`, `project_type`, `order_period`, `notification_sent`) VALUES
(280, '', 'zxc', '', '', '', 0, '', '', '', '', '', '', 0, 0, '', '', '', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '', '', 0, '', '', '', 0);

-- --------------------------------------------------------

--
-- Структура таблицы `opskill_questions7`
--

CREATE TABLE `opskill_questions7` (
  `orderid` int(11) NOT NULL,
  `trackingid` varchar(100) NOT NULL,
  `topic` varchar(1000) NOT NULL,
  `alias` varchar(1500) NOT NULL,
  `typeofservice` varchar(20) NOT NULL,
  `subject` varchar(50) NOT NULL,
  `words` int(30) NOT NULL,
  `academic_level` varchar(50) NOT NULL,
  `sources` varchar(50) NOT NULL,
  `referencing_style` varchar(20) NOT NULL,
  `instructions` text NOT NULL,
  `urgency` varchar(20) NOT NULL,
  `currency` varchar(10) NOT NULL,
  `amount` float NOT NULL,
  `writerpay` float NOT NULL,
  `client_paid` varchar(40) NOT NULL,
  `customer` varchar(40) NOT NULL,
  `customer_email` varchar(50) NOT NULL,
  `customer_name` varchar(50) NOT NULL,
  `order_status` varchar(40) NOT NULL,
  `date_posted` datetime NOT NULL,
  `deadline` datetime NOT NULL,
  `deadline_writers` datetime NOT NULL,
  `preferred_writer` int(11) NOT NULL,
  `writer_name` varchar(60) NOT NULL,
  `writerpaid` varchar(50) NOT NULL,
  `order_rating` int(11) NOT NULL,
  `rating_comment` text NOT NULL,
  `project_type` varchar(50) NOT NULL,
  `order_period` varchar(50) NOT NULL,
  `notification_sent` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `opskill_questions7`
--

INSERT INTO `opskill_questions7` (`orderid`, `trackingid`, `topic`, `alias`, `typeofservice`, `subject`, `words`, `academic_level`, `sources`, `referencing_style`, `instructions`, `urgency`, `currency`, `amount`, `writerpay`, `client_paid`, `customer`, `customer_email`, `customer_name`, `order_status`, `date_posted`, `deadline`, `deadline_writers`, `preferred_writer`, `writer_name`, `writerpaid`, `order_rating`, `rating_comment`, `project_type`, `order_period`, `notification_sent`) VALUES
(280, '', 'zxc', '', '', '', 0, '', '', '', '', '', '', 0, 0, '', '', '', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '', '', 0, '', '', '', 0);

-- --------------------------------------------------------

--
-- Структура таблицы `opskill_questions8`
--

CREATE TABLE `opskill_questions8` (
  `orderid` int(11) NOT NULL,
  `trackingid` varchar(100) NOT NULL,
  `topic` varchar(1000) NOT NULL,
  `alias` varchar(1500) NOT NULL,
  `typeofservice` varchar(20) NOT NULL,
  `subject` varchar(50) NOT NULL,
  `words` int(30) NOT NULL,
  `academic_level` varchar(50) NOT NULL,
  `sources` varchar(50) NOT NULL,
  `referencing_style` varchar(20) NOT NULL,
  `instructions` text NOT NULL,
  `urgency` varchar(20) NOT NULL,
  `currency` varchar(10) NOT NULL,
  `amount` float NOT NULL,
  `writerpay` float NOT NULL,
  `client_paid` varchar(40) NOT NULL,
  `customer` varchar(40) NOT NULL,
  `customer_email` varchar(50) NOT NULL,
  `customer_name` varchar(50) NOT NULL,
  `order_status` varchar(40) NOT NULL,
  `date_posted` datetime NOT NULL,
  `deadline` datetime NOT NULL,
  `deadline_writers` datetime NOT NULL,
  `preferred_writer` int(11) NOT NULL,
  `writer_name` varchar(60) NOT NULL,
  `writerpaid` varchar(50) NOT NULL,
  `order_rating` int(11) NOT NULL,
  `rating_comment` text NOT NULL,
  `project_type` varchar(50) NOT NULL,
  `order_period` varchar(50) NOT NULL,
  `notification_sent` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `opskill_questions8`
--

INSERT INTO `opskill_questions8` (`orderid`, `trackingid`, `topic`, `alias`, `typeofservice`, `subject`, `words`, `academic_level`, `sources`, `referencing_style`, `instructions`, `urgency`, `currency`, `amount`, `writerpay`, `client_paid`, `customer`, `customer_email`, `customer_name`, `order_status`, `date_posted`, `deadline`, `deadline_writers`, `preferred_writer`, `writer_name`, `writerpaid`, `order_rating`, `rating_comment`, `project_type`, `order_period`, `notification_sent`) VALUES
(280, '', 'zxc', '', '', '', 0, '', '', '', '', '', '', 0, 0, '', '', '', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '', '', 0, '', '', '', 0);

-- --------------------------------------------------------

--
-- Структура таблицы `opskill_questions9`
--

CREATE TABLE `opskill_questions9` (
  `orderid` int(11) NOT NULL,
  `trackingid` varchar(100) NOT NULL,
  `topic` varchar(1000) NOT NULL,
  `alias` varchar(1500) NOT NULL,
  `typeofservice` varchar(20) NOT NULL,
  `subject` varchar(50) NOT NULL,
  `words` int(30) NOT NULL,
  `academic_level` varchar(50) NOT NULL,
  `sources` varchar(50) NOT NULL,
  `referencing_style` varchar(20) NOT NULL,
  `instructions` text NOT NULL,
  `urgency` varchar(20) NOT NULL,
  `currency` varchar(10) NOT NULL,
  `amount` float NOT NULL,
  `writerpay` float NOT NULL,
  `client_paid` varchar(40) NOT NULL,
  `customer` varchar(40) NOT NULL,
  `customer_email` varchar(50) NOT NULL,
  `customer_name` varchar(50) NOT NULL,
  `order_status` varchar(40) NOT NULL,
  `date_posted` datetime NOT NULL,
  `deadline` datetime NOT NULL,
  `deadline_writers` datetime NOT NULL,
  `preferred_writer` int(11) NOT NULL,
  `writer_name` varchar(60) NOT NULL,
  `writerpaid` varchar(50) NOT NULL,
  `order_rating` int(11) NOT NULL,
  `rating_comment` text NOT NULL,
  `project_type` varchar(50) NOT NULL,
  `order_period` varchar(50) NOT NULL,
  `notification_sent` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `opskill_questions9`
--

INSERT INTO `opskill_questions9` (`orderid`, `trackingid`, `topic`, `alias`, `typeofservice`, `subject`, `words`, `academic_level`, `sources`, `referencing_style`, `instructions`, `urgency`, `currency`, `amount`, `writerpay`, `client_paid`, `customer`, `customer_email`, `customer_name`, `order_status`, `date_posted`, `deadline`, `deadline_writers`, `preferred_writer`, `writer_name`, `writerpaid`, `order_rating`, `rating_comment`, `project_type`, `order_period`, `notification_sent`) VALUES
(280, '', 'zxc these', 'these', '', '', 0, '', '', '', 'there are the new ones', '', '', 0, 0, '', '', '', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '', '', 0, '', '', '', 0);

-- --------------------------------------------------------

--
-- Структура таблицы `opskill_search`
--

CREATE TABLE `opskill_search` (
  `id` int(11) NOT NULL,
  `string` varchar(300) NOT NULL,
  `url` varchar(100) NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `opskill_writersamples`
--

CREATE TABLE `opskill_writersamples` (
  `id` int(11) NOT NULL,
  `writerid` int(11) NOT NULL,
  `writer_name` varchar(100) NOT NULL,
  `file_name` varchar(100) NOT NULL,
  `title` varchar(100) NOT NULL,
  `alias` varchar(100) NOT NULL,
  `tmp_name` varchar(100) NOT NULL,
  `file_size` varchar(30) NOT NULL,
  `upload_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `ops_coupon`
--

CREATE TABLE `ops_coupon` (
  `id` int(11) NOT NULL,
  `coupon_value` float NOT NULL,
  `coupon_name` varchar(40) NOT NULL,
  `Active` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `ops_coupon`
--

INSERT INTO `ops_coupon` (`id`, `coupon_value`, `coupon_name`, `Active`) VALUES
(1, 16, 'essay', 1);

-- --------------------------------------------------------

--
-- Структура таблицы `ops_payments`
--

CREATE TABLE `ops_payments` (
  `id` int(11) NOT NULL,
  `payment_id` varchar(100) NOT NULL,
  `payment_status` varchar(100) CHARACTER SET latin1 NOT NULL,
  `currency` varchar(5) CHARACTER SET latin1 NOT NULL,
  `total` varchar(50) CHARACTER SET latin1 NOT NULL,
  `topic` text CHARACTER SET latin1 NOT NULL,
  `payeremail` varchar(50) CHARACTER SET latin1 NOT NULL,
  `payer_name` varchar(50) CHARACTER SET latin1 NOT NULL,
  `orderid` int(11) NOT NULL,
  `writer_id` int(30) NOT NULL,
  `city` varchar(50) CHARACTER SET latin1 NOT NULL,
  `created_on` datetime NOT NULL,
  `updated_on` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `ops_upsells`
--

CREATE TABLE `ops_upsells` (
  `id` int(11) NOT NULL,
  `upsell_name` varchar(50) NOT NULL,
  `upsell_value` float NOT NULL,
  `upsell_activated` int(10) NOT NULL,
  `upsell_added` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `ops_upsells`
--

INSERT INTO `ops_upsells` (`id`, `upsell_name`, `upsell_value`, `upsell_activated`, `upsell_added`) VALUES
(4, 'plagirims report', 15, 0, 0),
(5, 'Order revision', 20.89, 0, 0),
(10, 'The test', 100, 0, 0);

-- --------------------------------------------------------

--
-- Структура таблицы `ops_upsellused`
--

CREATE TABLE `ops_upsellused` (
  `id` int(11) NOT NULL,
  `upsell_name` varchar(30) NOT NULL,
  `upsell_value` float NOT NULL,
  `orderid` int(11) NOT NULL,
  `upsell_completed` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `ops_upsellused`
--

INSERT INTO `ops_upsellused` (`id`, `upsell_name`, `upsell_value`, `orderid`, `upsell_completed`) VALUES
(42, 'plagirims report', 15, 68, 0),
(43, 'The test', 100, 68, 0),
(46, 'plagirims report', 15, 91, 0);

-- --------------------------------------------------------

--
-- Структура таблицы `orders`
--

CREATE TABLE `orders` (
  `orderid` int(11) NOT NULL,
  `manager_id` varchar(255) NOT NULL,
  `gived_to_writer` varchar(100) NOT NULL,
  `trackingid` varchar(100) NOT NULL,
  `writer_accept_order` varchar(255) NOT NULL,
  `topic` varchar(1000) NOT NULL,
  `alias` varchar(1500) NOT NULL,
  `typeofservice` varchar(20) NOT NULL,
  `subject` varchar(50) NOT NULL,
  `viewed` varchar(255) NOT NULL,
  `view_todo_ord` varchar(255) NOT NULL,
  `wr_view_rev` varchar(255) NOT NULL,
  `wr_view_plan` varchar(255) NOT NULL,
  `paid_writer_mes` varchar(255) NOT NULL,
  `fine_wr_message` varchar(255) NOT NULL,
  `words` int(30) NOT NULL,
  `academic_level` varchar(50) NOT NULL,
  `sources` varchar(50) NOT NULL,
  `referencing_style` varchar(50) NOT NULL,
  `instructions` text NOT NULL,
  `urgency` varchar(20) NOT NULL,
  `currency` varchar(10) NOT NULL,
  `amount` varchar(100) DEFAULT NULL,
  `writerpay` float NOT NULL,
  `client_paid` varchar(40) NOT NULL,
  `customer` varchar(40) NOT NULL,
  `customer_email` varchar(50) NOT NULL,
  `customer_name` varchar(50) NOT NULL,
  `order_status` varchar(40) NOT NULL,
  `date_posted` datetime NOT NULL,
  `deadline` datetime NOT NULL,
  `deadline_writers` datetime NOT NULL,
  `data_oplatu` varchar(255) NOT NULL,
  `dorabotka` varchar(255) NOT NULL,
  `yesno` varchar(255) NOT NULL,
  `plan` varchar(255) NOT NULL,
  `half_work` varchar(255) NOT NULL,
  `all_work` varchar(255) NOT NULL,
  `oplata` varchar(255) NOT NULL,
  `avans` varchar(255) NOT NULL,
  `fine` varchar(255) NOT NULL,
  `doplata` varchar(255) NOT NULL,
  `avtor_doplata` varchar(255) NOT NULL,
  `preferred_writer` int(11) DEFAULT NULL,
  `writer_name` varchar(60) NOT NULL,
  `writerpaid` varchar(50) NOT NULL,
  `order_rating` int(11) NOT NULL,
  `rating_comment` text NOT NULL,
  `project_type` varchar(50) NOT NULL,
  `order_period` varchar(50) NOT NULL,
  `notification_sent` int(10) NOT NULL,
  `doplata_status` varchar(255) NOT NULL,
  `last_ord_req` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `orders`
--

INSERT INTO `orders` (`orderid`, `manager_id`, `gived_to_writer`, `trackingid`, `writer_accept_order`, `topic`, `alias`, `typeofservice`, `subject`, `viewed`, `view_todo_ord`, `wr_view_rev`, `wr_view_plan`, `paid_writer_mes`, `fine_wr_message`, `words`, `academic_level`, `sources`, `referencing_style`, `instructions`, `urgency`, `currency`, `amount`, `writerpay`, `client_paid`, `customer`, `customer_email`, `customer_name`, `order_status`, `date_posted`, `deadline`, `deadline_writers`, `data_oplatu`, `dorabotka`, `yesno`, `plan`, `half_work`, `all_work`, `oplata`, `avans`, `fine`, `doplata`, `avtor_doplata`, `preferred_writer`, `writer_name`, `writerpaid`, `order_rating`, `rating_comment`, `project_type`, `order_period`, `notification_sent`, `doplata_status`, `last_ord_req`) VALUES
(100, '2562', '', '', '', 'Правові засади звернення до міжнародного комерційного арбітражу', '100------.html', '', 'Международное право ', 'true', 'true', '', '', '', '', 2750, '', '100', 'Презентация', '', '07.04.2018 08:00', 'USD', '0', 0, 'unpaid', '3575', 'inna200669@ukr.net', 'Инна Бойко', 'Archived', '2018-04-02 11:31:27', '2018-04-07 08:00:00', '1970-01-01 03:00:00', '', '', '', '', '', '', '', '', '', '', '', 3564, '\r\n                   #3564: Vlad Test Shaitan               ', 'unpaid', 0, '', 'project', '2018Apr02', 1, '', ''),
(101, '2562', '', '', '', 'ЫКПкп', '101--.html', '', 'АПП (Автоматизация производственных процессов)', 'true', 'true', '', '', '', '', 27500, '', '100', 'Аннотация', '', '04.04.2018 15:00', 'USD', '0', 0, 'unpaid', '3575', 'inna200669@ukr.net', 'Инна Бойко', 'Archived', '2018-04-02 11:32:47', '2018-04-04 15:00:00', '1970-01-01 03:00:00', '', '', '', '', '', '', '', '', '', '', '', 3564, '\r\n                   #3564: Vlad Test Shaitan               ', 'unpaid', 0, '', 'project', '2018Apr02', 1, '', ''),
(102, '2562', '', '', '', '123123', '102-123123.html', '', 'АПП (Автоматизация производственных процессов)', 'true', 'true', '', '', '', '', 33858825, '', '123123', 'Аннотация', '12312312', '18.05.2018 10:50', 'USD', '0', 0, 'unpaid', '3558', 'dobrovolskaya0901@gmail.com', 'Анна Добровольская', 'Archived', '2018-04-02 11:35:31', '2018-05-18 10:50:00', '1970-01-01 03:00:00', '', '', '', '', '', '', '', '', '', '', '', 3564, '\r\n                   #3564: Vlad Test Shaitan               ', 'unpaid', 0, '', 'project', '2018Apr02', 1, '', ''),
(103, '2562', '', '', '', '132123', '103-132123.html', '', 'АПП (Автоматизация производственных процессов)', 'true', 'true', '', '', '', '', 33858825, '', '123123', 'Аннотация', '123123', '19.04.2018 11:55', 'USD', '0', 0, 'unpaid', '3558', 'dobrovolskaya0901@gmail.com', 'Анна Добровольская', 'Archived', '2018-04-02 11:36:21', '2018-04-19 11:55:00', '1970-01-01 03:00:00', '', '', '', '', '', '', '', '', '', '', '', 3564, '\r\n                   #3564: Vlad Test Shaitan               ', 'unpaid', 0, '', 'project', '2018Apr02', 1, '', ''),
(104, '2562', '', '', '', '312312', '104-312312.html', '', 'АПП (Автоматизация производственных процессов)', 'true', 'true', '', '', '', '', 33858825, '', '123123123123', 'Аннотация', '123123', '31.12.1899 00:00', 'USD', '0', 0, 'unpaid', '3558', 'dobrovolskaya0901@gmail.com', 'Анна Добровольская', 'Archived', '2018-04-02 11:41:01', '1899-12-31 00:00:00', '1970-01-01 03:00:00', '', '', '', '', '', '', '', '', '', '', '', 3564, '\r\n                   #3564: Vlad Test Shaitan               ', 'unpaid', 0, '', 'project', '2018Apr02', 1, '', ''),
(105, '2562', '', '', '', '1000', '105-1000.html', '', 'АПП (Автоматизация производственных процессов)', 'true', 'true', '', '', '', '', 27500, '', '12312', 'Аннотация', '123123', '04.04.2018 06:35', 'USD', '0', 0, 'unpaid', '3558', 'dobrovolskaya0901@gmail.com', 'Анна Добровольская', 'Archived', '2018-04-02 11:48:58', '2018-04-04 06:35:00', '1970-01-01 03:00:00', '', '', '', '', '', '', '', '', '', '', '', 3564, '\r\n                   #3564: Vlad Test Shaitan               ', 'unpaid', 0, '', 'project', '2018Apr02', 1, '', ''),
(106, '2562', '', '', '', '23456789', '106-23456789.html', '', 'АПП (Автоматизация производственных процессов)', 'true', 'true', '', '', '', '', 339505925, '', '4567', 'Аннотация', '5678909', '18.04.2018 12:55', 'USD', '0', 0, 'unpaid', '3558', 'dobrovolskaya0901@gmail.com', 'Анна Добровольская', 'Archived', '2018-04-02 12:06:45', '2018-04-18 12:55:00', '1970-01-01 03:00:00', '', '', '', '', '', '', '', '', '', '', '', 3564, '\r\n                   #3564: Vlad Test Shaitan               ', 'unpaid', 0, '', 'project', '2018Apr02', 1, '', ''),
(107, '3566', '', '', '', '1231231', '107-1231231.html', '', 'АПП (Автоматизация производственных процессов)', 'true', '', '', 'true', '', 'true', 1231231, '', '12312312', 'Аннотация', '231231', '14.04.2018 15:55', 'USD', '', 180, 'unpaid', '3558', 'dobrovolskaya0901@gmail.com', 'Анна Добровольская', 'Archived', '2018-04-02 12:18:41', '2018-04-14 15:55:00', '1970-01-01 03:00:00', '06.05.2018', '', 'false', '07.04.2018 09:00', '08.04.2018 09:00', '14.04.2018 09:00', '200', '100', '', '', '', 3556, '#3556: Автор  Иванов', 'unpaid', 0, '', 'project', '2018Apr02', 1, '', ''),
(108, '2562', '', '', '', 'тест 2 ', '108--2-.html', '', 'АПП (Автоматизация производственных процессов)', 'true', 'true', '', '', '', '', 27500, '', '100', 'Аннотация', '65 %', '03.04.2018 13:00', 'USD', '0', 0, 'unpaid', '3575', 'inna200669@ukr.net', 'Инна Бойко', 'Archived', '2018-04-02 12:40:04', '2018-04-03 13:00:00', '1970-01-01 03:00:00', '', '', '', '', '', '', '', '', '', '', '', 3564, '\r\n                   #3564: Vlad Test Shaitan               ', 'unpaid', 0, '', 'project', '2018Apr02', 1, '', ''),
(109, '2562', '', '', '', 'володіння, користування та розпорядження спільним майном подружжя', '109-------.html', '', 'АПП (Автоматизация производственных процессов)', 'true', 'true', '', 'true', 'true', 'true', 30, '', '200', 'Курсовая теоретическая', '75 %', '12.04.2018 09:00', 'USD', '', 300, 'paid_writer', '3575', 'inna200669@ukr.net', 'Инна Бойко', 'Archived', '2018-04-02 14:42:10', '2018-04-12 09:00:00', '1970-01-01 03:00:00', '', '', 'false', '01.04.2018 00:00', '01.04.2018 04:00', '06.04.2018 15:00', '500', '250', '', '', '', 3564, '\r\n                   #3564: Vlad Test Shaitan               ', 'unpaid', 0, '', 'project', '2018Apr02', 1, '', ''),
(110, '3559', '', '', '', 'проверка', '110--.html', '', 'Юриспруденция', 'true', '', '', 'true', 'true', 'true', 0, '', '5000', 'Диплом', '80%', '31.07.2018 15:00', 'USD', '', 1000, 'paid', '3596', 'mobile-gsm198519851985@mail.ru', 'Nikolay Dolgosheev', 'Archived', '2018-04-02 15:10:27', '2018-07-31 15:00:00', '1970-01-01 03:00:00', '', '', 'true', '05.04.2018 09:00', '08.04.2018 09:00', '10.07.2018 09:00', '1000', '500', '', '', '', 3597, '\r\n                   #3597: Тест  Тест 2                   ', 'unpaid', 0, '', 'project', '2018Apr02', 1, '', ''),
(111, '3559', '', '', 'true', 'hvjghjghvj', '111-hvjghjghvj.html', '', 'АПП (Автоматизация производственных процессов)', 'true', '', 'true', '', 'true', 'true', 137500, '', '500', 'Аннотация', '65', '28.04.2018 15:00', 'USD', '0', 0, 'paid', '3596', 'mobile-gsm198519851985@mail.ru', 'Nikolay Dolgosheev', 'onlyAvtorDoplata', '2018-04-03 15:10:58', '2018-04-28 15:00:00', '1970-01-01 03:00:00', '31.08.2018', '', '', '', '', '', '500', '1000', '', '', '200', 3556, '\r\n                   #3556: Автор  Иванов                  ', 'unpaid', 0, '', 'project', '2018Apr03', 1, 'true', ''),
(112, '3559', '', '', '', 'vgh,ugv', '112-vgh-ugv.html', '', 'АПП (Автоматизация производственных процессов)', 'true', '', '', '', 'true', '', 15400, '', '200', 'Аннотация', '', '03.04.2018 16:00', 'USD', '0', 0, 'paid', '3596', 'mobile-gsm198519851985@mail.ru', 'Nikolay Dolgosheev', 'Archived', '2018-04-03 16:42:04', '2018-04-03 16:00:00', '1970-01-01 03:00:00', '', '', '', '', '', '', '', '', '', '', '', 3597, '\r\n                   #3597: Тест  Тест 2                   ', 'unpaid', 0, '', 'project', '2018Apr03', 1, '', ''),
(113, '2562', '', '', '', 'Новый заказ', '113--.html', '', 'АПП (Автоматизация производственных процессов)', 'true', 'true', '', '', '', '', 275000, '', '100', 'Аннотация', 'Нет', '11.04.2018 11:55', 'USD', '0', 0, 'unpaid', '3558', 'dobrovolskaya0901@gmail.com', 'Анна Добровольская', 'Archived', '2018-04-04 11:21:38', '2018-04-11 11:55:00', '1970-01-01 03:00:00', '', '', '', '', '', '', '', '', '', '', '', 3564, '\r\n                   #3564: Vlad Test Shaitan               ', 'unpaid', 0, '', 'project', '2018Apr04', 1, '', ''),
(114, '2562', '', '', '', 'Новый заказ', '114--.html', '', 'АПП (Автоматизация производственных процессов)', 'true', 'true', '', '', '', '', 8250, '', '120', 'Аннотация', '100', '12.04.2018 10:55', 'USD', '0', 0, 'unpaid', '3558', 'dobrovolskaya0901@gmail.com', 'Анна Добровольская', 'Archived', '2018-04-04 12:26:46', '2018-04-12 10:55:00', '1970-01-01 03:00:00', '', '', '', '', '', '', '', '', '', '', '', 3564, '\r\n                   #3564: Vlad Test Shaitan               ', 'unpaid', 0, '', 'project', '2018Apr04', 1, '', ''),
(115, '3548', '', '', '', 'очередной заказ', '115---.html', '', 'АПП (Автоматизация производственных процессов)', 'true', '', '', '', 'true', 'true', 291, '', '100', 'Аннотация', '100', '12.04.2018 10:55', 'USD', '', 100, 'unpaid', '3558', 'dobrovolskaya0901@gmail.com', 'Анна Добровольская', 'Archived', '2018-04-04 12:30:20', '2018-04-12 10:55:00', '1970-01-01 03:00:00', '04.05.2018', '', '', '', '', '', '200', '', '', '', '', 3564, '\r\n                   #3564: Vlad Test Shaitan               ', 'unpaid', 0, '', 'project', '2018Apr04', 1, '', ''),
(127, '2562', '03.08.2018 11:05:01', '', 'true', 'Становлення та розвиток концептуальних засад адміністративного права', '127-------.html', '', 'Административное право', 'true', 'true', 'true', 'true', 'true', 'true', 6875, '', '250', 'Курсовая теоретическая', '60  % уникальности \r\nплан\r\nвступ\r\n1.Концепції алміністративного права.\r\n1.1 Поняття концепції адміністративного права.\r\n1.2Дефеніції концепцій адміністративного права.\r\n2. Зародження адміністративного права.\r\n2.1.Поліцейське право 18-19ст.\r\n2.2. Виділення алміністрвтивного права с поліцейського 20-ті р.р. 20 ст.\r\n2.3.Нове радянське законодавство 20-30 р р 20 ст. в адміністративному праві.\r\n2.4.Переосмислення концептуальних змін у науці та адміністраивному праві середини 80-х - кінця 90-х рр 20 ст.\r\n3.Розвиток сучасного адміністративного права.\r\nВисновок', '16.04.2018 09:00', 'USD', '', 100, 'paid', '3575', 'inna200669@ukr.net', 'Инна Бойко', 'onlyAvtorDoplata', '2018-04-13 11:24:32', '2018-04-16 09:00:00', '1970-01-01 03:00:00', '02.09.2018', '', 'various', '29.04.2018 09:00', '30.04.2018 09:00', '03.05.2018 09:00', '250', '100', '', '', '200', 3556, '\r\n                   #3556: Автор  Иванов                  ', 'unpaid', 0, '', 'project', '2018Apr13', 1, 'true', ''),
(128, '3566', '', '', '', 'структура адміністративного процесу', '128-----.html', '', 'Административное право', 'true', '', '', 'true', 'true', '', 5000, '', '200', 'Курсовая теоретическая', '', '20.04.2018 09:00', 'USD', '', 200, 'unpaid', '3575', 'inna200669@ukr.net', 'Инна Бойко', 'Archived', '2018-04-16 23:23:45', '2018-04-20 09:00:00', '1970-01-01 03:00:00', '', '25.04.2018 09:00', '', '18.04.2018 09:00', '19.04.2018 09:00', '20.04.2018 09:00', '', '', '', '', '', 3597, '#3597: Тест  Тест 2 ', 'unpaid', 0, '', 'project', '2018Apr16', 1, '', ''),
(144, '3566', '', '', '', 'Правовий режим формування коштів Пенсійного фонду України', '144------.html', '', 'Юридические дисциплины', 'true', 'true', '', 'true', '', 'true', 25, '', '350', 'Курсовая теоретическая', 'Финансовое право', '01.05.2018 12:00', 'USD', '', 200, 'half', '3602', 'candiru050398@gmail.com', 'Елизавета Колпаковская', 'Archived', '2018-04-28 16:13:31', '2018-05-01 12:00:00', '1970-01-01 03:00:00', '', '', 'dont_need', '', '', '01.05.2018 12:00', '400', '200', '', '', '', 3562, '#3562: Оксана Теленик', 'unpaid', 0, '', 'project', '2018Apr28', 1, '', ''),
(148, '3559', '', '', '', 'послледняя проверка', '148---.html', '', 'География', 'true', 'true', '', 'true', '', 'true', 50, '', '500', 'Преддипломная практика', '', '05.05.2018 00:00', 'USD', '', 200, 'half', '3605', '1234561234567890@ukr.net', 'Nikolay Dolgosheev', 'Archived', '2018-04-29 22:52:09', '2018-05-05 00:00:00', '1970-01-01 03:00:00', '', '', '', '04.05.2018 00:00', '', '05.05.2018 00:00', '500', '250', '', '', '', 3556, '\r\n                   #3556: Автор  Иванов                  ', 'unpaid', 0, '', 'project', '2018Apr29', 1, '', ''),
(155, '', '', '', '', '23123123', '155-23123123.html', '', 'АПП (Автоматизация производственных процессов)', 'true', '', '', '', '', 'true', 123123, '', '1313', 'Аннотация', '12313', '30.04.2018 11:55', 'USD', '0', 0, 'unpaid', '3558', 'dobrovolskaya0901@gmail.com', 'Анна Добровольская', 'Completed', '2018-04-30 11:53:54', '2018-04-30 11:55:00', '1970-01-01 03:00:00', '', '', '', '', '', '', '100', '', '', '', '', 0, '', 'unpaid', 0, '', 'project', '2018Apr30', 1, '', ''),
(189, '', '', '', '', 'eqweqwe', '189-eqweqwe.html', '', 'АПП (Автоматизация производственных процессов)', 'true', 'false', '', '', '', '', 123, '', '1323', 'Аннотация', '123123', '09.05.2018 10:50', 'USD', '0', 0, 'unpaid', '3612', 'shaitan.vova@ukr.net', 'ыфвфыв фывфыв', 'Archived', '2018-05-08 12:51:47', '2018-05-09 10:50:00', '1970-01-01 03:00:00', '', '', '', '', '', '', '', '', '', '', '', 0, '', 'unpaid', 0, '', 'project', '2018May08', 1, '', ''),
(190, '', '', '', '', 'Конституционное право', '190----.html', '', 'Право', 'true', 'false', '', 'false', '', '', 5, '', '100', 'Аннотация', 'Задание и требование в фаиле\r\nналичие антиплагиата: 60%', '10.05.2018 09:00', 'USD', '0', 0, 'unpaid', '3614', 'innaboiko6@ukr.net', 'Инна Бойко', 'Archived', '2018-05-08 13:08:51', '2018-05-10 09:00:00', '1970-01-01 03:00:00', '', '', 'dont_need', '', '', '', '', '', '', '', '', 0, '', 'unpaid', 0, '', 'project', '2018May08', 1, '', ''),
(191, '', '', '', '', 'пппп', '191--.html', '', 'Архитектура', 'true', '', '', '', '', '', 0, '', '200', 'Аннотация', '', '09.05.2018 00:00', 'USD', '0', 0, 'unpaid', '3613', 'sdfsfsdfds307@ukr.net', 'Алина Божок', 'Archived', '2018-05-08 13:25:29', '2018-05-09 00:00:00', '1970-01-01 03:00:00', '', '', '', '', '', '', '', '', '', '', '', 0, '', 'unpaid', 0, '', 'project', '2018May08', 1, '', ''),
(200, '', '', '', '', 'проверка последняя Николай', '193----.html', '', 'Гидравлика', 'true', 'false', '', '', '', '', 25, '', '25', 'Повышение уникальности', '60', '31.05.2018 00:00', 'USD', '0', 0, 'unpaid', '3615', 'nikolas1985_09@ukr.net', 'Nikolay Dolgosheev', 'Archived', '2018-05-09 00:00:17', '2018-05-31 00:00:00', '1970-01-01 03:00:00', '', '', '', '', '', '', '', '', '', '', '', 0, '', 'unpaid', 0, '', 'project', '2018May09', 1, '', ''),
(204, '', '', '', '', 'проверка Николай msi2', '204---msi2.html', '', 'Анатомия', 'true', '', '', '', '', '', 39, '', '1002', 'Бакалаврская', '36', '09.06.2018 00:00', 'USD', '0', 0, 'unpaid', '3616', 'nikolas1985_10@ukr.net', 'Nikolay Dolgosheev', 'Archived', '2018-05-09 15:41:54', '2018-06-09 00:00:00', '1970-01-01 03:00:00', '', '', '', '', '', '', '', '', '', '', '', 0, '', 'unpaid', 0, '', 'project', '2018May09', 1, '', ''),
(205, '2562', '', '', '', 'проверка заблокированным пользователем', '205-----.html', '', 'АХД', 'true', 'true', '', '', '', '', 100, '', '123', 'Кандидатская', '98', '08.06.2018 00:00', 'USD', '0', 0, 'unpaid', '3616', 'nikolas1985_10@ukr.net', 'Nikolay Dolgosheev', 'Archived', '2018-05-09 16:21:11', '2018-06-08 00:00:00', '1970-01-01 03:00:00', '', '', '', '', '', '', '', '', '', '', '', 3556, '\r\n                   #3556: Автор  Иванов                  ', 'unpaid', 0, '', 'project', '2018May09', 1, '', ''),
(206, '', '', '', '', 'Склад суду в адміністративному судочинстві', '206-----.html', '', 'Административное право', 'true', 'false', '', 'false', '', 'true', 40, '', '400', 'Курсовая теоретическая', 'Ви можете трішки змінити план.', '13.05.2018 20:00', 'USD', '0', 0, 'unpaid', '3618', 'calenyuck2010@ukr.net', 'Дмитрий Каленюк', 'Archived', '2018-05-10 19:02:17', '2018-05-13 20:00:00', '1970-01-01 03:00:00', '', '', 'dont_need', '', '', '', '420', '', '', '', '', 0, ' ', 'unpaid', 0, '', 'project', '2018May10', 1, '', ''),
(207, '', '', '', 'true', 'проверка наша', '207---.html', '', 'Юриспруденция', 'false', 'true', 'true', 'true', '', 'true', 91, '', '103', 'Диплом', '296', '23.05.2018 19:10', 'USD', '', 1000, 'paid_client', '3616', 'nikolas1985_10@ukr.net', 'Nikolay Dolgosheev', 'onlyAvtorDoplata', '2018-05-10 19:12:23', '2018-05-23 19:10:00', '1970-01-01 03:00:00', '01.09.2018', '', 'false', '12.05.2018 09:00', '15.05.2018 09:00', '23.05.2018 09:00', '500', '500', '', '100', '200', 3556, '#3556: Автор  Иванов', 'unpaid', 0, '', 'project', '2018May10', 1, '', ''),
(245, '2562', '23.07.2018 12:35:02', '', 'false', '123123', '245-123123.html', '', 'АПП (Автоматизация производственных процессов)', 'true', 'true', 'true', 'true', 'true', 'true', 113, '', '1231', 'Аннотация', 'asdasda', '24.05.2018 14:50', 'USD', '0', 0, 'paid', '3628', 'daredevilvue@gmail.com', 'dasda asda', 'Revision', '2018-05-22 16:17:21', '2018-05-24 14:50:00', '1970-01-01 03:00:00', '19.09.2018', '', 'false', '23.07.2018 21:25', '24.07.2018 21:25', '27.07.2018 21:25', '500', '', '', '', '', 3648, '\r\n                   #3648: vlad avtor                  ', 'unpaid', 0, '', 'project', '2018May22', 1, 'true', '19.07.2018 19:08:12'),
(254, '3566', '', '', '', 'тест ', '254--.html', '', 'АПП (Автоматизация производственных процессов)', 'false', 'true', '', '', '', '', 10, '', '10', 'Аннотация', '', '26.05.2018 09:00', 'USD', '0', 0, 'unpaid', '3625', 'pppppppp808@ukr.net', 'Арина Кульбаба ', 'Archived', '2018-05-23 12:30:14', '2018-05-26 09:00:00', '1970-01-01 03:00:00', '', '', '', '', '', '', '', '', '', '', '', 3556, '#3556: Автор  Иванов', 'unpaid', 0, '', 'project', '2018May23', 1, '', ''),
(255, '3548', '', '', '', 'аналитическая работа ', '255---.html', '', 'Бухучет и статистика', 'false', 'true', '', '', '', '', 20, '', '200', 'Другое', '', '26.05.2018 09:00', 'USD', '0', 0, 'unpaid', '3627', 'ssdddddd@bigmir.net', 'Евдокия Евдокия', 'Archived', '2018-05-23 20:31:02', '2018-05-26 09:00:00', '1970-01-01 03:00:00', '', '', '', '', '', '', '', '', '', '', '', 3564, '\r\n                   #3564: Vlad Test Shaitan               ', 'unpaid', 0, '', 'project', '2018May23', 1, '', ''),
(257, '2562', '23.07.2018 17:26:47', '', 'true', 'проверка 34', '257---34.html', '', 'АПП (Автоматизация производственных процессов)', 'false', 'true', 'true', 'true', '', 'true', 10, '', '200', 'Аннотация', '', '31.05.2018 09:00', 'USD', NULL, 200, 'paid_client', '3628', 'eeerrrrivanov@yandex.ru', 'Рома Иванов', 'Revision', '2018-05-23 20:59:35', '2018-05-31 09:00:00', '1970-01-01 03:00:00', '', '24.07.2018 09:00', 'true', '23.07.2018 17:30', '24.07.2018 09:00', '25.07.2018 09:00', '500', '500', '', '', '', 3556, '#3556: Автор  Иванов', 'unpaid', 0, '', 'project', '2018May23', 1, 'true', '23.07.2018 17:21:38'),
(258, '3566', '28.08.2018 08:43:31', '', 'false', 'проверка 4', '258---4.html', '', 'АПП (Автоматизация производственных процессов)', 'false', 'true', 'true', '', '', 'true', 100, '', '200', 'Аннотация', '', '30.05.2018 09:00', 'USD', '', 10, 'paid', '3628', 'eeerrrrivanov@yandex.ru', 'Рома Иванов', 'Revision', '2018-05-23 21:04:03', '2018-05-30 09:00:00', '1970-01-01 03:00:00', '22.06.2018', '', '', '', '', '', '500', '200', '', '', '100', 3556, '\r\n                   #3556: Автор  Иванов                  ', 'unpaid', 0, '', 'project', '2018May23', 1, 'true', ''),
(270, '2562', '', '', '', 'Test_v2', '270-Test_v2.html', '', 'АПП (Автоматизация производственных процессов)', 'false', 'true', '', '', '', 'true', 33, '', '500', 'Аннотация', '', '14.06.2018 02:10', 'USD', '', 100, 'unpaid', '3625', 'pppppppp808@ukr.net', 'Арина Кульбаба ', 'Archived', '2018-05-30 01:24:16', '2018-06-14 02:10:00', '1970-01-01 03:00:00', '29.06.2018', '', '', '', '', '', '1000', '500', '', '', '', 3631, '\r\n                   #3631: Николай Инкогнито               ', 'unpaid', 0, '', 'project', '2018May30', 1, '', ''),
(274, '3566', '28.08.2018 08:43:46', '', 'false', '274', '274-274.html', '', 'АПП (Автоматизация производственных процессов)', 'false', 'true', '', '', '', 'true', 10, '', '100', 'Аннотация', '', '26.06.2018 09:00', 'USD', '0', 0, 'paid_client', '3628', 'eeerrrrivanov@yandex.ru', 'Рома Иванов', 'Assigned', '2018-06-07 10:20:59', '2018-06-26 09:00:00', '1970-01-01 03:00:00', '', '', '', '', '', '', '500', '', '', '', '', 3556, '\r\n                   #3556: Автор  Иванов                  ', 'unpaid', 0, '', 'project', '2018Jun07', 1, 'true', ''),
(275, '2562', '', '', '', '275', '275-275.html', '', 'АПП (Автоматизация производственных процессов)', 'false', 'false', '', '', '', 'true', 10, '', '200', 'Аннотация', '', '20.06.2018 11:00', 'USD', '0', 0, 'paid_client', '3628', 'eeerrrrivanov@yandex.ru', 'Рома Иванов', 'Archived', '2018-06-07 10:21:42', '2018-06-20 11:00:00', '1970-01-01 03:00:00', '', '', '', '', '', '', '500', '', '', '', '', 0, ' ', 'unpaid', 0, '', 'project', '2018Jun07', 1, 'true', ''),
(276, '2562', '', '', '', '1w3123', '276-1w3123.html', '', 'АПП (Автоматизация производственных процессов)', 'false', 'false', '', '', '', '', 1231, '', '123123', 'Аннотация', '12312', '19.06.2018 14:50', 'USD', '0', 0, 'unpaid', '3631', '1234512345123@ukr.net', 'Николай Инкогнито', 'Archived', '2018-06-07 16:57:58', '2018-06-19 14:50:00', '1970-01-01 03:00:00', '', '', '', '', '', '', '', '', '', '', '', 0, ' ', 'unpaid', 0, '', 'project', '2018Jun07', 1, '', ''),
(279, '2562', '', '', '', 'ьрпро', '278--.html', '', 'АПП (Автоматизация производственных процессов)', 'false', 'true', '', '', '', '', 20, '', '10', 'Аннотация', '', '28.06.2018 18:00', 'USD', '', 100, 'half', '3632', 'qwertyuiop123451234@ukr.net', 'Николай2 Инкогнито2', 'Archived', '2018-06-12 00:08:03', '2018-06-28 18:00:00', '1970-01-01 03:00:00', '12.07.2018', '', '', '', '', '', '', '', '', '', '', 3631, '\r\n                   #3631: Николай Инкогнито               ', 'unpaid', 0, '', 'project', '2018Jun12', 1, '', ''),
(280, '2562', '', '', '', '65454564', '280-65454564.html', '', 'АПП (Автоматизация производственных процессов)', 'false', 'false', '', 'true', '', 'true', 10, '', '100', 'Аннотация', '50', '29.06.2018 04:20', 'USD', '', 100, 'half', '3632', 'qwertyuiop123451234@ukr.net', 'Николай2 Инкогнито2', 'Archived', '2018-06-12 00:39:15', '2018-06-29 04:20:00', '1970-01-01 03:00:00', '', '', '', '27.06.2018 00:00', '28.06.2018 00:00', '29.06.2018 00:00', '500', '250', '', '', '', 0, ' ', 'unpaid', 0, '', 'project', '2018Jun12', 1, 'true', ''),
(283, '3548', '', '', 'false', 'zakaz new', '283-zakaz-new.html', '', 'АПП (Автоматизация производственных процессов)', 'false', 'true', 'false', '', '', 'true', 1000, '', '902', 'Аннотация', '1323', '30.06.2018 19:55', 'USD', '', 200, 'paid_client', '3558', 'dobrovolskaya0901@gmail.com', 'Анна Добровольская', 'Revision', '2018-06-15 10:33:13', '2018-06-30 19:55:00', '1970-01-01 03:00:00', '', '', '', '', '', '', '1000', '', '', '', '', 3564, '\r\n                   #3564: Vlad Test Shaitan               ', 'unpaid', 0, '', 'project', '2018Jun15', 1, 'true', ''),
(284, '3566', '', '', '', '1231', '284-1231.html', '', 'АПП (Автоматизация производственных процессов)', 'false', 'true', '', '', '', '', 123, '', '1233', 'Аннотация', '', '21.06.2018 15:55', 'USD', '0', 0, 'paid', '3558', 'dobrovolskaya0901@gmail.com', 'Анна Добровольская', 'Completed', '2018-06-15 10:54:16', '2018-06-21 15:55:00', '1970-01-01 03:00:00', '01.08.2018', '', '', '', '', '', '', '', '', '', '', 3557, '\r\n                   #3557: Настя Днищенко                  ', 'unpaid', 0, '', 'project', '2018Jun15', 1, '', ''),
(289, '3559', '', '', '', 'проверка 15.06', '289---15-06.html', '', 'АПП (Автоматизация производственных процессов)', 'false', 'false', '', 'false', '', 'true', 100, '', '1000', 'Аннотация', '', '08.09.2018 00:00', 'USD', '', 500, 'unpaid', '3632', 'qwertyuiop123451234@ukr.net', 'Николай2 Инкогнито2', 'Completed', '2018-06-15 22:43:10', '2018-09-08 00:00:00', '1970-01-01 03:00:00', '', '', 'true', '31.07.2018 00:00', '31.08.2018 00:00', '31.07.2018 00:00', '2000', '1000', '', '', '', 3631, '#3631: Николай Инкогнито', 'unpaid', 0, '', 'project', '2018Jun15', 1, 'true', '15.06.2018 22:52:44'),
(295, '', '', '', '', '1', '295-1.html', '', 'АПП (Автоматизация производственных процессов)', 'false', '', '', '', '', '', 45, '', '500', 'Аннотация', '', '07.07.2018 00:00', 'USD', '0', 0, 'unpaid', '3632', 'qwertyuiop123451234@ukr.net', 'Николай2 Инкогнито2', 'Completed', '2018-06-15 23:43:32', '2018-07-07 00:00:00', '1970-01-01 03:00:00', '', '', 'true', '', '', '', '', '', '', '', '', 0, '', 'unpaid', 0, '', 'project', '2018Jun15', 1, '', ''),
(298, '2562', '02.08.2018 19:41:02', '', '', 'ewewew', '298-ewewew.html', '', 'АПП (Автоматизация производственных процессов)', 'false', 'true', '', '', 'false', 'true', 200, '', '100', 'Аннотация', '100231', '21.06.2018 14:55', 'USD', '0', 200, 'paid_writer', '3638', 'daredevilvue@gmail.com', 'vald_zakaz zak', 'Completed', '2018-06-18 12:24:31', '2018-06-21 14:55:00', '1970-01-01 03:00:00', '01.09.2018', '', '', '', '', '', '500', '500', '', '', '', 3737, '\r\n                   #3737: автор Nik aasdasd               ', 'unpaid', 0, '', 'project', '2018Jun18', 1, 'true', ''),
(299, '', '', '', '', '123123', '299-123123.html', '', 'АПП (Автоматизация производственных процессов)', 'false', '', '', 'false', '', '', 123123, '', '1333', 'Аннотация', '1231231', '19.06.2018 10:30', 'USD', '0', 0, 'unpaid', '3638', 'daredevilvue@gmail.com', 'vald_zakaz zak', 'Archived', '2018-06-18 14:13:50', '2018-06-19 10:30:00', '1970-01-01 03:00:00', '', '', 'true', '', '', '', '', '', '', '', '', 0, '', 'unpaid', 0, '', 'project', '2018Jun18', 1, '', ''),
(301, '2562', '', '', '', 'проверка последняя мной 2', '301---2.html', '', 'ВСТИ', 'false', 'false', '', 'true', '', 'true', 100, '', '1000', 'Магистерская', '80', '15.07.2018 00:00', 'USD', '0', 0, 'paid_client', '3554', 'mobile-gsm1985@ukr.net', 'Николай Долгошеев', 'Completed', '2018-06-18 23:09:17', '2018-07-15 00:00:00', '1970-01-01 03:00:00', '', '', '', '20.06.2018 08:00', '21.06.2018 12:00', '15.07.2018 09:00', '1200', '600', '', '', '600', 3561, '#3561: Ольга  Сидорова', 'unpaid', 0, '', 'project', '2018Jun18', 1, 'true', '18.06.2018 23:10:41'),
(302, '2562', '', '', '', 'проверка последняя мной 3', '302---3.html', '', 'Логика', 'false', 'false', '', 'true', '', 'true', 100, '', '1000', 'Кандидатская', '80', '15.07.2018 00:00', 'USD', '', 600, 'paid_client', '3554', 'mobile-gsm1985@ukr.net', 'Николай Долгошеев', 'Archived', '2018-06-18 23:10:03', '2018-07-15 00:00:00', '1970-01-01 03:00:00', '', '', '', '20.06.2018 09:00', '20.06.2018 09:00', '15.07.2018 09:00', '1100', '', '', '', '', 3561, '#3561: Ольга  Сидорова', 'unpaid', 0, '', 'project', '2018Jun18', 1, 'true', '18.06.2018 23:11:03'),
(303, '', '', '', '', 'тест 2 ', '303--2-.html', '', 'АПП (Автоматизация производственных процессов)', 'false', '', '', '', '', '', 100, '', '100', 'Аннотация', '', '21.06.2018 05:00', 'USD', '0', 0, 'unpaid', '3639', 'fjfjfjfjfjfjjf@ukr.net', 'Карина Прокопьева', 'Archived', '2018-06-19 11:40:49', '2018-06-21 05:00:00', '1970-01-01 03:00:00', '', '', 'need_to_choose', '', '', '', '', '', '', '', '', 0, '', 'unpaid', 0, '', 'project', '2018Jun19', 1, '', ''),
(304, '', '', '', '', '1000', '304-1000.html', '', 'АПП (Автоматизация производственных процессов)', 'false', '', '', '', '', '', 1000, '', '100', 'Аннотация', '131231', '20.06.2018 10:50', 'USD', '0', 0, 'unpaid', '3638', 'daredevilvue@gmail.com', 'vald_zakaz zak', 'Archived', '2018-06-19 13:24:04', '2018-06-20 10:50:00', '1970-01-01 03:00:00', '', '', 'need_to_choose', '', '', '', '', '', '', '', '', 0, '', 'unpaid', 0, '', 'project', '2018Jun19', 1, '', ''),
(306, '2562', '', '', '', 'qweqwe', '306-qweqwe.html', '', 'АПП (Автоматизация производственных процессов)', 'false', 'true', '', 'true', 'true', '', 1231, '', '123123', 'Аннотация', '1231231', '21.06.2018 14:55', 'USD', '0', 0, 'paid', '3638', 'daredevilvue@gmail.com', 'vald_zakaz zak', 'Archived', '2018-06-19 13:48:51', '2018-06-21 14:55:00', '1970-01-01 03:00:00', '', '', 'true', '', '', '', '', '', '', '', '', 3564, '\r\n                   #3564: Vlad Test Shaitan               ', 'unpaid', 0, '', 'project', '2018Jun19', 1, '', ''),
(307, '', '', '', '', '1231231', '307-1231231.html', '', 'АПП (Автоматизация производственных процессов)', 'false', '', '', '', '', '', 12313, '', '1231', 'Аннотация', '123123', '21.06.2018 15:55', 'USD', '0', 0, 'unpaid', '3638', 'daredevilvue@gmail.com', 'vald_zakaz zak', 'Archived', '2018-06-19 14:12:35', '2018-06-21 15:55:00', '1970-01-01 03:00:00', '', '', 'need_to_choose', '', '', '', '', '', '', '', '', 0, '', 'unpaid', 0, '', 'project', '2018Jun19', 1, '', ''),
(308, '2562', '', '', 'true', 'testfile', '308-testfile.html', '', 'АПП (Автоматизация производственных процессов)', 'false', 'true', 'true', '', '', 'true', 100, '', '100', 'Аннотация', '123123', '20.06.2018 14:55', 'USD', '', 200, 'paid', '3640', 'daredevilvue@gmail.com', 'vlad_zakaz zakaz', 'Revision', '2018-06-19 14:23:19', '2018-06-20 14:55:00', '1970-01-01 03:00:00', '25.07.2018', '', 'need_to_choose', '', '', '', '', '', '', '', '100', 3556, '#3556: Автор  Иванов', 'unpaid', 0, '', 'project', '2018Jun19', 1, 'true', '20.06.2018 09:53:45'),
(313, '3643', '', '', '', '1', '313-1.html', '', 'Аудит бух и управленческий учет', 'false', 'false', '', 'true', '', 'true', 23, '', '111', 'Магистерская', '', '30.06.2018 13:00', 'USD', '', 100, 'half', '3641', 'veronikanikolay1@ukr.net', 'заказчик заказчик', 'Cancelled', '2018-06-20 13:16:21', '2018-06-30 13:00:00', '1970-01-01 03:00:00', '', '', 'false', '28.06.2018 00:00', '29.06.2018 00:00', '30.06.2018 19:00', '500', '500', '', '', '210', 3642, '#3642: автор автор', 'unpaid', 0, '', 'project', '2018Jun20', 1, 'true', '20.06.2018 13:17:25'),
(314, '2562', '', '', '', 'Новый заказ', '314--.html', '', 'АПП (Автоматизация производственных процессов)', 'false', 'true', '', 'true', 'true', 'true', 123123, '', '1231231', 'Аннотация', '1231231', '20.06.2018 16:50', 'USD', '', 1000, 'paid', '3640', 'daredevilvue@gmail.com', 'vlad_zakaz zakaz', 'Completed', '2018-06-20 16:41:06', '2018-06-20 16:50:00', '1970-01-01 03:00:00', '25.07.2018', '', 'true', '29.06.2018 11:30', '29.06.2018 11:30', '30.06.2018 11:55', '4', '', '100', '1', '250', 3564, '\r\n                   #3564: Vlad Test Shaitan               ', 'unpaid', 0, '', 'project', '2018Jun20', 1, '', '20.06.2018 17:20:35'),
(315, '2562', '', '', 'false', '1213', '315-1213.html', '', 'Антикризисное управление', 'false', 'false', '', '', '', 'true', 12, '', '123', 'Другое', '', '29.06.2018 00:00', 'USD', '0', 0, 'unpaid', '3641', 'veronikanikolay1@ukr.net', 'заказчик заказчик', 'Assigned', '2018-06-21 16:49:23', '2018-06-29 00:00:00', '1970-01-01 03:00:00', '', '', 'need_to_choose', '', '', '', '500', '', '', '', '', 3642, '\r\n                   #3642: автор автор                  ', 'unpaid', 0, '', 'project', '2018Jun21', 1, 'true', ''),
(316, '3643', '', '', 'true', '514', '316-514.html', '', 'Банк и инвестиционный менеджмент', 'false', 'false', '', 'true', '', 'true', 100, '', '100', 'Курсовая теоретическая', '', '30.06.2018 23:00', 'USD', '', 500, 'paid_client', '3641', 'veronikanikolay1@ukr.net', 'заказчик заказчик', 'Assigned', '2018-06-23 01:07:54', '2018-06-30 23:00:00', '1970-01-01 03:00:00', '', '', 'false', '', '', '', '5000', '2500', '', '', '100', 3642, '#3642: автор автор', 'unpaid', 0, '', 'project', '2018Jun23', 1, 'true', '23.06.2018 01:50:34'),
(317, '3559', '', '', 'false', 'South Africa', '317-South-Africa.html', '', 'География', 'false', 'false', '', '', '', '', 20, '', '500', 'Реферат', 'Should be lots of images.', '28.07.2018 19:30', 'USD', '0', 0, 'unpaid', '3645', 'volderam@yandex.ua', 'John Doe', 'Assigned', '2018-06-24 09:14:14', '2018-07-28 19:30:00', '1970-01-01 03:00:00', '', '', 'need_to_choose', '', '', '', '', '', '', '', '', 3646, '\r\n                   #3646: Jane Doe                  ', 'unpaid', 0, '', 'project', '2018Jun24', 1, '', '25.06.2018 17:17:09'),
(318, '2562', '', '', 'true', '12345t', '318-12345t.html', '', 'АПП (Автоматизация производственных процессов)', 'false', 'true', '', 'true', 'true', 'true', 122, '', '13532', 'Аннотация', 'hghgkj', '25.06.2018 14:55', 'USD', '', 750, 'paid', '3640', 'daredevilvue@gmail.com', 'vlad_zakaz zakaz', 'Assigned', '2018-06-25 12:22:07', '2018-06-25 14:55:00', '1970-01-01 03:00:00', '', '', 'true', '26.06.2018 14:50', '28.06.2018 15:55', '30.06.2018 19:55', '10', '', '3', '500', '250', 3564, '\r\n                   #3564: Vlad Test Shaitan               ', 'unpaid', 0, '', 'project', '2018Jun25', 1, '', ''),
(319, '2562', '', '', 'true', 'Новый заказ', '319--.html', '', 'АПП (Автоматизация производственных процессов)', 'false', 'false', '', '', '', '', 123123, '', '123123', 'Аннотация', '123123', '27.06.2018 14:50', 'USD', '0', 0, 'unpaid', '3640', 'daredevilvue@gmail.com', 'vlad_zakaz zakaz', 'Assigned', '2018-06-25 17:18:45', '2018-06-27 14:50:00', '1970-01-01 03:00:00', '', '', 'need_to_choose', '', '', '', '', '', '', '', '', 3564, '#3564: Vlad Test Shaitan', 'unpaid', 0, '', 'project', '2018Jun25', 1, '', '25.06.2018 17:24:08'),
(322, '3566', '28.08.2018 08:44:04', '', 'false', '1', '322-1.html', '', 'Анализ', 'false', 'true', '', '', '', 'true', 100, '', '500', 'Задачи', '', '07.07.2018 00:00', 'USD', '0', 0, 'half', '3641', 'veronikanikolay1@ukr.net', 'заказчик заказчик', 'Assigned', '2018-06-26 08:59:38', '2018-07-07 00:00:00', '1970-01-01 03:00:00', '', '', 'need_to_choose', '', '', '', '5000', '', '', '', '', 3556, '\r\n                   #3556: Автор  Иванов                  ', 'unpaid', 0, '', 'project', '2018Jun26', 1, 'true', '14.08.2018 15:22:44'),
(323, '3566', '28.08.2018 08:44:17', '', 'false', 'Макро', '323--.html', '', 'АПП (Автоматизация производственных процессов)', 'false', 'true', '', '', '', '', 123123, '', '112212', 'Аннотация', '123123', '30.06.2018 11:55', 'USD', '0', 0, 'unpaid', '3640', 'daredevilvue@gmail.com', 'vlad_zakaz zakaz', 'Assigned', '2018-06-26 10:29:45', '2018-06-30 11:55:00', '1970-01-01 03:00:00', '', '', 'need_to_choose', '', '', '', '', '', '', '', '', 3556, '\r\n                   #3556: Автор  Иванов                  ', 'unpaid', 0, '', 'project', '2018Jun26', 1, '', ''),
(324, '2562', '', '', 'false', '123', '324-123.html', '', 'АПП (Автоматизация производственных процессов)', 'false', 'false', '', '', '', '', 1000, '', '132', 'Аннотация', '123123', '27.06.2018 14:55', 'USD', '0', 0, 'unpaid', '3640', 'daredevilvue@gmail.com', 'vlad_zakaz zakaz', 'Assigned', '2018-06-26 10:39:22', '2018-06-27 14:55:00', '1970-01-01 03:00:00', '', '', 'need_to_choose', '', '', '', '', '', '', '', '', 3564, '\r\n                   #3564: Vlad Test Shaitan               ', 'unpaid', 0, '', 'project', '2018Jun26', 1, '', ''),
(325, '2562', '23.07.2018 17:59:37', '', 'true', '123123', '325-123123.html', '', 'АПП (Автоматизация производственных процессов)', 'false', 'false', '', 'true', '', '', 1231, '', '123123', 'Аннотация', '123123', '26.06.2018 14:55', 'USD', '0', 0, 'unpaid', '3648', 'youvovas@gmail.com', 'vlad zak', 'Openproject', '2018-06-26 11:30:44', '2018-06-26 14:55:00', '1970-01-01 03:00:00', '', '', 'false', '29.07.2018 09:00', '30.07.2018 09:00', '31.07.2018 09:00', '', '', '', '', '', 0, ' ', 'unpaid', 0, '', 'project', '2018Jun26', 1, '', '28.06.2018 14:08:08'),
(326, '2562', '20.07.2018 15:54:16', '', 'false', 'u76u7', '326-u76u7.html', '', 'АПП (Автоматизация производственных процессов)', 'false', 'true', 'true', 'true', 'true', 'true', 4676, '', '4545', 'Аннотация', 'fjvjbtyj', '28.06.2018 15:55', 'USD', '0', 0, 'paid', '3649', 'daredevilvue@gmail.com', 'vlad zak', 'Revision', '2018-06-26 11:46:53', '2018-06-28 15:55:00', '1970-01-01 03:00:00', '', '22.07.2018 09:00', 'false', '', '21.07.2018 09:00', '21.07.2018 09:00', '1000', '', '', '', '', 3556, '\r\n                   #3556: Автор  Иванов                  ', 'unpaid', 0, '', 'project', '2018Jun26', 1, 'true', ''),
(328, '2562', '', '', 'true', '123123', '328-123123.html', '', 'АПП (Автоматизация производственных процессов)', 'false', 'true', 'true', 'true', 'true', 'true', 12312, '', '12312', 'Аннотация', '132123', '27.06.2018 13:35', 'USD', '0', 0, 'paid', '3649', 'daredevilvue@gmail.com', 'vlad zak', 'Revision', '2018-06-26 13:46:20', '2018-06-27 13:35:00', '1970-01-01 03:00:00', '', '28.07.2018 04:50', 'false', '', '', '', '1000', '', '', '', '', 3648, '\r\n                   #3648: vlad avtor                  ', 'unpaid', 0, '', 'project', '2018Jun26', 1, 'true', ''),
(329, '3566', '', '', '', '15', '329-15.html', '', 'АПП (Автоматизация производственных процессов)', 'false', 'false', '', 'true', '', 'true', 50, '', '100', 'Аннотация', '', '30.06.2018 09:00', 'USD', '', 50, 'paid_client', '3628', 'eeerrrrivanov@yandex.ru', 'Рома Иванов', 'Completed', '2018-06-26 14:04:39', '2018-06-30 09:00:00', '1970-01-01 03:00:00', '', '', 'various', '', '', '', '500', '', '', '', '', 3654, '#3654: ааа ааа', 'unpaid', 0, '', 'project', '2018Jun26', 1, 'true', '28.06.2018 14:15:05'),
(330, '3652', '', '', '', 'тест', '330--.html', '', 'тест', 'false', 'false', '', 'true', 'false', 'false', 1500, '', '10000', 'Другое', '80', '30.06.2018 00:00', 'USD', '', 5000, 'paid', '3650', 'mega-kkkkkkkkk@ukr.net', 'НикЗаказчик ыФВФЫВ', 'Completed', '2018-06-27 09:13:31', '2018-06-30 00:00:00', '1970-01-01 03:00:00', '', '', 'false', '28.06.2018 00:00', '', '28.06.2018 00:00', '15000', '15000', '500', '1000', '1000', 3651, '#3651: НикАвтор фывфыв', 'unpaid', 0, '', 'project', '2018Jun27', 1, 'true', '27.06.2018 09:18:54'),
(331, '3566', '28.08.2018 08:44:27', '', 'false', 'Курсовая', '331--.html', '', 'Анатомия', 'false', 'true', '', '', '', 'true', 30, '', '100', 'Аннотация', '', '30.06.2018 09:00', 'USD', '0', 0, 'paid_client', '3628', 'eeerrrrivanov@yandex.ru', 'Рома Иванов', 'Assigned', '2018-06-27 09:48:52', '2018-06-30 09:00:00', '1970-01-01 03:00:00', '', '', 'need_to_choose', '', '', '', '500', '', '', '', '', 3556, '\r\n                   #3556: Автор  Иванов                  ', 'unpaid', 0, '', 'project', '2018Jun27', 1, 'true', '26.08.2018 13:27:00'),
(332, '3566', '', '', '', 'тема', '332--.html', '', 'Банкротство', 'false', 'true', '', '', '', 'true', 10, '', '100', 'Аннотация', '', '30.06.2018 09:00', 'USD', '', 500, 'half', '3628', 'eeerrrrivanov@yandex.ru', 'Рома Иванов', 'Completed', '2018-06-27 09:52:46', '2018-06-30 09:00:00', '1970-01-01 03:00:00', '', '', 'need_to_choose', '', '', '', '15000', '', '', '', '', 3556, '#3556: Автор  Иванов', 'unpaid', 0, '', 'project', '2018Jun27', 1, 'true', '27.06.2018 15:26:19'),
(333, '', '', '', '', 'тест', '333--.html', '', 'АПП (Автоматизация производственных процессов)', 'false', '', '', '', '', '', 25, '', '10000', 'Аннотация', '', '07.07.2018 00:00', 'USD', '0', 0, 'unpaid', '3650', 'mega-kkkkkkkkk@ukr.net', 'НикЗаказчик ыФВФЫВ', 'Archived', '2018-06-28 10:20:48', '2018-07-07 00:00:00', '1970-01-01 03:00:00', '', '', 'need_to_choose', '', '', '', '', '', '', '', '', 0, '', 'unpaid', 0, '', 'project', '2018Jun28', 1, '', '28.06.2018 13:56:49'),
(334, '2562', '', '', 'false', '1', '334-1.html', '', 'АПП (Автоматизация производственных процессов)', 'false', 'true', 'true', 'true', '', 'true', 1, '', '1', 'Аннотация', '1', '29.06.2018 09:00', 'USD', '0', 0, 'unpaid', '3653', 'afdfdsa@ukr.net', 'ффф ффф', 'Revision', '2018-06-28 12:18:13', '2018-06-29 09:00:00', '1970-01-01 03:00:00', '', '', 'false', '', '', '', '500', '', '', '', '', 3648, '\r\n                   #3648: vlad avtor                  ', 'unpaid', 0, '', 'project', '2018Jun28', 1, 'true', '28.06.2018 13:18:43'),
(335, '', '', '', '', '3', '335-3.html', '', 'АПП (Автоматизация производственных процессов)', 'false', '', '', '', '', '', 3, '', '3', 'Аннотация', '', '29.06.2018 13:00', 'USD', '0', 0, 'unpaid', '3655', 'fffff745@ukr.net', 'ффф ффф', 'Archived', '2018-06-28 13:15:02', '2018-06-29 13:00:00', '1970-01-01 03:00:00', '', '', 'need_to_choose', '', '', '', '', '', '', '', '', 0, '', 'unpaid', 0, '', 'project', '2018Jun28', 1, '', '28.06.2018 14:23:45'),
(336, '3566', '', '', '', '5', '336-5.html', '', 'АПП (Автоматизация производственных процессов)', 'false', 'true', '', 'true', '', 'true', 5, '', '5', 'Аннотация', '', '31.12.1899 00:00', 'USD', '', 50, 'paid_client', '3657', 'hh6575@ukr.net', 'ввв ввв', 'Archived', '2018-06-28 13:22:20', '1899-12-31 00:00:00', '1970-01-01 03:00:00', '', '', 'various', '30.06.2018 09:00', '01.07.2018 09:00', '02.07.2018 09:00', '500', '', '', '', '', 3656, '#3656: ввв ввв', 'unpaid', 0, '', 'project', '2018Jun28', 1, 'true', '28.06.2018 14:01:51'),
(337, '3566', '', '', '', '6', '337-6.html', '', 'АПП (Автоматизация производственных процессов)', 'false', 'true', '', 'false', '', 'true', 6, '', '6', 'Аннотация', '66', '30.06.2018 13:00', 'USD', '0', 0, 'half', '3658', 'dfdf8521@ukr.net', 'фф фф', 'Archived', '2018-06-28 13:28:25', '2018-06-30 13:00:00', '1970-01-01 03:00:00', '', '', 'dont_need', '', '30.06.2018 13:00', '30.06.2018 13:00', '200', '', '', '', '', 3656, '#3656: ввв ввв', 'unpaid', 0, '', 'project', '2018Jun28', 1, 'true', '28.06.2018 13:58:21'),
(338, '', '', '', '', 'тест 2', '338--2.html', '', 'Банкротство', 'false', '', '', '', '', 'true', 15, '', '20', 'Презентация', '', '30.06.2018 04:00', 'USD', '0', 0, 'unpaid', '3653', 'afdfdsa@ukr.net', 'ффф ффф', 'Archived', '2018-06-28 18:34:53', '2018-06-30 04:00:00', '1970-01-01 03:00:00', '', '', 'need_to_choose', '', '', '', '500', '', '', '', '', 0, '', 'unpaid', 0, '', 'project', '2018Jun28', 1, 'true', '11.08.2018 08:28:44'),
(339, '3566', '', '', '', 'тест 3 ', '339--3-.html', '', 'Бизнес-планирование', 'false', 'true', '', 'true', '', 'true', 50, '', '50', 'Доработка работы', '80', '01.08.2018 09:00', 'USD', '', 2500, 'half', '3658', 'dfdf8521@ukr.net', 'фф фф', 'Archived', '2018-06-28 18:44:39', '2018-08-01 09:00:00', '1970-01-01 03:00:00', '', '', 'false', '30.06.2018 09:00', '01.07.2018 16:00', '04.07.2018 09:00', '3000', '1500', '', '', '', 3556, '#3556: Автор  Иванов', 'unpaid', 0, '', 'project', '2018Jun28', 1, 'true', '28.06.2018 18:46:51'),
(340, '3559', '25.07.2018 08:49:00', '', 'true', 'тест 3 ', '340--3-.html', '', 'АПП (Автоматизация производственных процессов)', 'false', 'true', '', 'true', '', 'true', 5, '', '10', 'Аннотация', '', '31.12.1899 00:00', 'USD', NULL, 100, 'paid_client', '3657', 'hh6575@ukr.net', 'ввв ввв', 'pending', '2018-06-28 22:04:42', '1899-12-31 00:00:00', '1970-01-01 03:00:00', '25.08.2018', '', 'false', '31.12.1899 00:00', '31.12.1899 00:00', '31.12.1899 00:00', '500', '', '', '', '', 3556, '#3556: Автор  Иванов', 'unpaid', 0, '', 'project', '2018Jun28', 1, 'true', '28.06.2018 22:06:42'),
(341, '', '', '', '', '666', '341-666.html', '', 'АПП (Автоматизация производственных процессов)', 'false', '', '', '', '', 'true', 666, '', '200', 'Аннотация', '', '31.12.1899 00:00', 'USD', '0', 0, 'unpaid', '3657', 'hh6575@ukr.net', 'ввв ввв', 'Archived', '2018-06-28 22:11:13', '1899-12-31 00:00:00', '1970-01-01 03:00:00', '', '', 'need_to_choose', '', '', '', '1000', '', '', '', '', 0, '', 'unpaid', 0, '', 'project', '2018Jun28', 1, 'true', '17.07.2018 17:02:25'),
(342, '3566', '', '', '', '77777', '342-77777.html', '', 'АПП (Автоматизация производственных процессов)', 'false', 'true', '', 'true', '', 'true', 777, '', '200', 'Аннотация', '', '31.12.1899 00:00', 'USD', '', 2000, 'paid', '3657', 'hh6575@ukr.net', 'ввв ввв', 'Archived', '2018-06-28 22:13:34', '1899-12-31 00:00:00', '1970-01-01 03:00:00', '', '21.07.2018 09:00', 'dont_need', '31.12.1899 00:00', '31.12.1899 00:00', '31.12.1899 00:00', '1000', '', '1000', '200', '200', 3556, '#3556: Автор  Иванов', 'unpaid', 0, '', 'project', '2018Jun28', 1, 'false', '28.06.2018 22:14:56'),
(343, '2562', '', '', 'false', 'задача', '343--.html', '', 'Анализ', 'false', 'true', 'true', '', '', 'true', 1, '', '20', 'Задачи', '', '07.07.2018 09:00', 'USD', '0', 0, 'unpaid', '3655', 'fffff745@ukr.net', 'ффф ффф', 'Revision', '2018-06-29 09:24:23', '2018-07-07 09:00:00', '1970-01-01 03:00:00', '', '', 'need_to_choose', '', '', '', '', '', '100', '', '', 3648, '\r\n                   #3648: vlad avtor                  ', 'unpaid', 0, '', 'project', '2018Jun29', 1, 'true', '03.07.2018 10:48:36'),
(344, '3566', '28.08.2018 08:57:37', '', 'false', 'test', '344-test.html', '', 'Бухучет и статистика', 'false', 'true', 'true', '', '', '', 15, '', '1200', 'Аннотация', 'test', '27.07.2018 19:55', 'USD', '0', 0, 'unpaid', '3558', 'dobrovolskaya0901@gmail.com', 'Анна Добровольская', 'Revision', '2018-07-02 12:54:19', '2018-07-27 19:55:00', '1970-01-01 03:00:00', '', '', 'false', '', '', '', '', '', '', '', '', 3556, '\r\n                   #3556: Автор  Иванов                  ', 'unpaid', 0, '', 'project', '2018Jul02', 1, '', '15.07.2018 21:51:08'),
(345, '2562', '', '', 'false', 'testtesttesttest', '345-testtesttesttest.html', '', 'Банковское дело', 'false', 'true', 'true', '', '', 'true', 56, '', '120', 'Презентация', 'testtesttest', '11.10.2018 10:35', 'USD', '0', 0, 'unpaid', '3558', 'dobrovolskaya0901@gmail.com', 'Анна Добровольская ', 'Revision', '2018-07-02 12:57:44', '2018-10-11 10:35:00', '1970-01-01 03:00:00', '', '', 'need_to_choose', '', '', '', '', '', '122', '', '', 3648, '\r\n                   #3648: vlad avtor                  ', 'unpaid', 0, '', 'project', '2018Jul02', 1, 'true', ''),
(346, '3566', '28.08.2018 08:57:28', '', 'false', '123321321', '346-123321321.html', '', 'АПП (Автоматизация производственных процессов)', 'false', 'true', '', '', '', '', 321321, '', '12312', 'Аннотация', '3123123', '18.07.2018 14:50', 'USD', '0', 0, 'unpaid', '3649', 'daredevilvue@gmail.com', 'vlad zak', 'Openproject', '2018-07-03 16:50:49', '2018-07-18 14:50:00', '1970-01-01 03:00:00', '', '', 'need_to_choose', '', '', '', '', '', '', '', '', 0, ' ', 'unpaid', 0, '', 'project', '2018Jul03', 1, '', ''),
(347, '3566', '28.08.2018 08:52:53', '', 'false', 'asdasdasd', '347-asdasdasd.html', '', 'АПП (Автоматизация производственных процессов)', 'false', 'true', '', '', '', '', 123, '', '1231', 'Аннотация', '123123', '18.07.2018 11:55', 'USD', '0', 0, 'unpaid', '3649', 'daredevilvue@gmail.com', 'vlad zak', 'Assigned', '2018-07-04 13:36:35', '2018-07-18 11:55:00', '1970-01-01 03:00:00', '', '', 'need_to_choose', '', '', '', '', '', '', '', '', 3556, '\r\n                   #3556: Автор  Иванов                  ', 'unpaid', 0, '', 'project', '2018Jul04', 1, '', ''),
(348, '2562', '', '', 'false', 'asdasd', '348-asdasd.html', '', 'АПП (Автоматизация производственных процессов)', 'false', 'true', '', '', '', '', 123123, '', '123123', 'Аннотация', '1231231', '12.07.2018 10:50', 'USD', '0', 0, 'paid_client', '3649', 'daredevilvue@gmail.com', 'vlad zak', 'Assigned', '2018-07-04 13:39:07', '2018-07-12 10:50:00', '1970-01-01 03:00:00', '', '', 'need_to_choose', '', '', '', '', '', '', '', '', 3556, '#3556: Автор  Иванов', 'unpaid', 0, '', 'project', '2018Jul04', 1, '', '20.07.2018 15:48:59'),
(349, '2562', '23.07.2018 12:35:31', '', '', '123123', '349-123123.html', '', 'АПП (Автоматизация производственных процессов)', 'false', 'true', '', 'true', 'true', 'true', 1231, '', '123123', 'Аннотация', '123312', '11.07.2018 10:35', 'USD', '0', 0, 'paid', '3649', 'daredevilvue@gmail.com', 'vlad zak', 'onlyAvtorDoplata', '2018-07-04 15:50:10', '2018-07-11 10:35:00', '1970-01-01 03:00:00', '30.08.2018', '', 'true', '', '', '', '', '', '', '', '123121', 3648, '\r\n                   #3648: vlad avtor                  ', 'unpaid', 0, '', 'project', '2018Jul04', 1, 'true', ''),
(350, '3566', '28.08.2018 08:52:47', '', 'false', '1231', '350-1231.html', '', 'АПП (Автоматизация производственных процессов)', 'false', 'true', '', '', '', '', 1231, '', '12312', 'Аннотация', '1321', '18.07.2018 14:55', 'USD', '0', 0, 'unpaid', '3649', 'daredevilvue@gmail.com', 'vlad zak', 'Assigned', '2018-07-05 15:06:57', '2018-07-18 14:55:00', '1970-01-01 03:00:00', '', '', 'need_to_choose', '', '', '', '', '', '', '', '', 3556, '\r\n                   #3556: Автор  Иванов                  ', 'unpaid', 0, '', 'project', '2018Jul05', 1, '', ''),
(351, '2562', '', '', 'false', 'test', '351-test.html', '', 'Внешнеэконом деятельность (ВЭД)', 'false', 'true', '', 'true', '', '', 12, '', '1200', 'Повышение уникальности', '100%', '10.08.2018 10:55', 'USD', '0', 0, 'unpaid', '3558', 'dobrovolskaya0901@gmail.com', 'Анна Добровольская ', 'Assigned', '2018-07-05 15:20:48', '2018-08-10 10:55:00', '1970-01-01 03:00:00', '', '', 'dont_need', '', '', '', '', '', '', '', '', 3556, '#3556: Автор  Иванов', 'unpaid', 0, '', 'project', '2018Jul05', 1, '', '09.07.2018 11:16:59'),
(352, '3566', '28.08.2018 08:44:38', '', 'false', 'testtesttesttest', '352-testtesttesttest.html', '', 'Астрономия', 'false', 'true', '', '', '', '', 55, '', '12000', 'Задачи', '2532121', '11.10.2018 07:15', 'USD', '0', 0, 'unpaid', '3558', 'dobrovolskaya0901@gmail.com', 'Анна Добровольская ', 'Assigned', '2018-07-05 15:23:27', '2018-10-11 07:15:00', '1970-01-01 03:00:00', '', '', 'false', '', '', '', '', '', '', '', '', 3556, '\r\n                   #3556: Автор  Иванов                  ', 'unpaid', 0, '', 'project', '2018Jul05', 1, '', '27.08.2018 22:47:16');
INSERT INTO `orders` (`orderid`, `manager_id`, `gived_to_writer`, `trackingid`, `writer_accept_order`, `topic`, `alias`, `typeofservice`, `subject`, `viewed`, `view_todo_ord`, `wr_view_rev`, `wr_view_plan`, `paid_writer_mes`, `fine_wr_message`, `words`, `academic_level`, `sources`, `referencing_style`, `instructions`, `urgency`, `currency`, `amount`, `writerpay`, `client_paid`, `customer`, `customer_email`, `customer_name`, `order_status`, `date_posted`, `deadline`, `deadline_writers`, `data_oplatu`, `dorabotka`, `yesno`, `plan`, `half_work`, `all_work`, `oplata`, `avans`, `fine`, `doplata`, `avtor_doplata`, `preferred_writer`, `writer_name`, `writerpaid`, `order_rating`, `rating_comment`, `project_type`, `order_period`, `notification_sent`, `doplata_status`, `last_ord_req`) VALUES
(353, '3559', '', '', 'true', 'Жизнь на Марсе', '353---.html', '', 'Биология', 'false', 'false', '', 'true', '', '', 30, '', '1100', 'Диплом МВА', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla ornare libero eget nunc ornare auctor. Curabitur malesuada aliquet mi in faucibus. Pellentesque elementum sagittis massa id finibus. Integer ac iaculis justo. In eget nulla felis. Sed nec risus varius, semper urna ac, luctus elit. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Praesent dignissim, enim id rutrum ullamcorper, tortor leo varius sem, eget porttitor ante leo id ipsum. Maecenas vel sollicitudin odio. Integer sit amet rhoncus massa, et tristique eros. Vestibulum purus mi, mollis eget elementum sit amet, egestas non nibh. Morbi accumsan luctus leo.', '17.08.2018 17:55', 'USD', '0', 0, 'unpaid', '3645', 'volderam@yandex.ua', 'John Doe', 'Assigned', '2018-07-06 18:01:20', '2018-08-17 17:55:00', '1970-01-01 03:00:00', '', '', '', '', '', '17.07.2018 18:45', '', '', '', '', '', 3646, '#3646: Jane Doe', 'unpaid', 0, '', 'project', '2018Jul06', 1, '', '09.07.2018 20:43:52'),
(354, '2562', '23.07.2018 12:58:26', '', '', 'test', '354-test.html', '', 'АПП (Автоматизация производственных процессов)', 'false', 'false', '', 'true', 'false', '', 12, '', '120', 'Аннотация', '', '28.07.2018 19:55', 'USD', '0', 0, 'paid', '3558', 'dobrovolskaya0901@gmail.com', 'Анна Добровольская ', 'Completed', '2018-07-10 12:22:29', '2018-07-28 19:55:00', '1970-01-01 03:00:00', '', '', 'false', '24.07.2018 12:00', '25.07.2018 12:00', '26.07.2018 12:00', '', '', '', '', '', 3682, '#3682: Автор Тест', 'unpaid', 0, '', 'project', '2018Jul10', 1, '', '23.07.2018 12:58:04'),
(355, '3566', '28.08.2018 08:52:37', '', 'false', 'asdasd', '355-asdasd.html', '', 'АПП (Автоматизация производственных процессов)', 'false', 'true', '', '', '', '', 123123, '', '123123', 'Аннотация', '123123', '19.07.2018 14:50', 'USD', '0', 0, 'unpaid', '3649', 'daredevilvue@gmail.com', 'vlad zak', 'Assigned', '2018-07-10 12:22:42', '2018-07-19 14:50:00', '1970-01-01 03:00:00', '', '', 'need_to_choose', '', '', '', '', '', '', '', '', 3556, '\r\n                   #3556: Автор  Иванов                  ', 'unpaid', 0, '', 'project', '2018Jul10', 1, '', ''),
(356, '2562', '', '', '', 'test', '356-test.html', '', 'АПП (Автоматизация производственных процессов)', 'false', 'true', '', '', 'true', 'true', 888, '', '898', 'Аннотация', '123123123', '13.09.2018 11:55', 'USD', '', 10000, 'paid', '3558', 'dobrovolskaya0901@gmail.com', 'Анна Добровольская ', 'Completed', '2018-07-10 12:23:33', '2018-09-13 11:55:00', '1970-01-01 03:00:00', '', '', 'need_to_choose', '', '', '', '1000', '100', '200', '100', '100', 3648, '\r\n                   #3648: vlad avtor                  ', 'unpaid', 0, '', 'project', '2018Jul10', 1, 'false', '10.07.2018 12:24:04'),
(357, '2562', '23.07.2018 12:47:37', '', 'true', 'testtesttesttest', '357-testtesttesttest.html', '', 'ВСТИ', 'false', 'false', '', '', '', '', 99, '', '888', 'Аннотация', '', '10.09.2018 08:05', 'USD', '0', 0, 'unpaid', '3558', 'dobrovolskaya0901@gmail.com', 'Анна Добровольская ', 'Assigned', '2018-07-10 12:24:15', '2018-09-10 08:05:00', '1970-01-01 03:00:00', '', '', 'false', '', '', '', '', '', '', '', '', 3682, '#3682: Автор Тест', 'unpaid', 0, '', 'project', '2018Jul10', 1, '', '23.07.2018 12:47:04'),
(358, '2562', '', '', '', 'fwegvgew', '358-fwegvgew.html', '', 'ВСТИ', 'false', 'true', '', 'true', '', 'true', 445, '', '12000', 'Повышение уникальности', '', '06.09.2018 10:35', 'USD', '', 100, 'half', '3558', 'dobrovolskaya0901@gmail.com', 'Анна Добровольская ', 'Completed', '2018-07-10 12:25:45', '2018-09-06 10:35:00', '1970-01-01 03:00:00', '', '22.07.2018 13:55', 'various', '20.07.2018 15:55', '19.07.2018 15:55', '26.07.2018 12:55', '100', '100', '', '100', '100', 3648, '\r\n                   #3648: vlad avtor                  ', 'unpaid', 0, '', 'project', '2018Jul10', 1, 'true', ''),
(359, '3566', '28.08.2018 08:52:30', '', 'true', '121', '359-121.html', '', 'АПП (Автоматизация производственных процессов)', 'false', 'true', 'true', '', '', 'true', 121, '', '123', 'Аннотация', '132123132312', '19.07.2018 10:30', 'USD', '0', 200, 'unpaid', '3649', 'daredevilvue@gmail.com', 'vlad zak', 'onlyAvtorDoplata', '2018-07-11 10:42:12', '2018-07-19 10:30:00', '1970-01-01 03:00:00', '28.09.2018', '', 'need_to_choose', '', '', '', '', '', '', '', '', 3556, '\r\n                   #3556: Автор  Иванов                  ', 'unpaid', 0, '', 'project', '2018Jul11', 1, 'true', ''),
(360, '2562', '', '', 'false', '23123', '360-23123.html', '', 'АПП (Автоматизация производственных процессов)', 'false', 'true', '', '', '', '', 123123, '', '12312', 'Аннотация', '``12321312312', '25.07.2018 18:55', 'USD', '0', 0, 'unpaid', '3612', 'shaitan.vova@ukr.net', 'ыфвфыв фывфыв', 'Assigned', '2018-07-13 13:09:29', '2018-07-25 18:55:00', '1970-01-01 03:00:00', '', '', 'need_to_choose', '', '', '', '', '', '', '', '', 3556, '#3556: Автор  Иванов', 'unpaid', 0, '', 'project', '2018Jul13', 1, '', '20.07.2018 15:48:35'),
(361, '2562', '', '', '', 'Новый тест 1', '361---1.html', '', 'Административное право', 'false', 'true', '', '', 'true', 'true', 50, '', '1110', 'Диплом', 'Тест поля пожелания к оформлению.', '31.07.2018 22:00', 'USD', '0', 0, 'paid_writer', '3660', 'html.beliy@gmail.com', 'Владимир Тест', 'pending', '2018-07-13 14:16:08', '2018-07-31 22:00:00', '1970-01-01 03:00:00', '12.08.2018', '', 'false', '', '', '', '1110', '', '', '120', '100', 3661, '#3661: Тест ТестТест', 'unpaid', 0, '', 'project', '2018Jul13', 1, '', '13.07.2018 14:28:32'),
(362, '2562', '', '', '', 'Кримінально-правова характеристика підкупу виборця, учасника референдуму (ст. 160 КК). Наведіть приклади зі слідчої та судової практики', '362--------160-----.html', '', 'Уголовное право', 'false', 'true', '', 'true', '', '', 30, '', '250', 'Курсовая практическая', 'уникальность 30\r\nи задача \r\nЗадача 1: Дируктор заводу Р. неодноразово схиляв до статевих зносин робітницю цього заводу, але та постійно відмовлялася. У черговий раз отримавши відмову, Р., перебуваючи у стані сильного алкогольного сп\\\\\\\'яніння, з ревнощів ударив її кілька разів по обличчю. Внаслідок цього потерпілій були завданні побої. Кваліфікуйте дії Р. Задача 2: Одного разу О. прийшовши у гості до своїх сусідів П. та Ж. Перебуваючи у стані алкогольного сп\\\\\\\'яніння О. почав розповідати, яке погане життя в державі та висловив бажання захопити державну владу та змінити конституційний лад України. Він навіть розповідав як це можна зробити і закликав П. та Ж. допомогти йому в цьому. Кваліфікуйте дії О. ', '20.07.2018 09:00', 'USD', NULL, 200, 'paid_client', '3628', 'eeerrrrivanov@yandex.ru', 'Рома Иванов', 'Completed', '2018-07-15 13:19:51', '2018-07-20 09:00:00', '1970-01-01 03:00:00', '25.07.2018 18:50', '', 'dont_need', '21.07.2018 14:50', '25.07.2018 14:55', '25.07.2018 09:50', '', '', '', '', '', 3662, '#3662: Татьяна Дейнека', 'unpaid', 0, '', 'project', '2018Jul15', 1, '', '15.07.2018 23:21:31'),
(363, '3566', '', '', 'true', 'тест', '363--.html', '', 'АПП (Автоматизация производственных процессов)', 'false', 'true', 'true', 'true', '', 'true', 10, '', '100', 'Другое', '', '19.07.2018 09:00', 'USD', '', 50, 'paid', '3628', 'eeerrrrivanov@yandex.ru', 'Рома Иванов', 'onlyAvtorDoplata', '2018-07-16 13:00:11', '2018-07-19 09:00:00', '1970-01-01 03:00:00', '30.08.2018', '31.07.2018 18:50', 'dont_need', '19.07.2018 15:30', '18.07.2018 09:00', '20.07.2018 09:00', '500', '250', '', '200', '500', 3556, '#3556: Автор  Иванов', 'unpaid', 0, '', 'project', '2018Jul16', 1, '', '16.07.2018 13:05:38'),
(364, '2562', '23.07.2018 12:54:33', '', 'false', 'а', '364--.html', '', 'АПП (Автоматизация производственных процессов)', 'false', 'false', 'false', '', '', 'true', 10, '', '100', 'Аннотация', '', '25.07.2018 00:40', 'USD', '', 100, 'unpaid', '3628', 'eeerrrrivanov@yandex.ru', 'Рома Иванов', 'Revision', '2018-07-16 13:45:23', '2018-07-25 00:40:00', '1970-01-01 03:00:00', '', '', 'need_to_choose', '', '', '', '', '', '', '50', '', 3682, '#3682: Автор Тест', 'unpaid', 0, '', 'project', '2018Jul16', 1, 'true', '23.07.2018 12:53:53'),
(365, '2562', '23.07.2018 12:53:19', '', 'false', 'а', '365--.html', '', 'АПП (Автоматизация производственных процессов)', 'false', 'false', 'false', 'true', '', 'true', 10, '', '100', 'Аннотация', '', '25.07.2018 00:40', 'USD', '0', 0, 'paid_client', '3628', 'eeerrrrivanov@yandex.ru', 'Рома Иванов', 'Revision', '2018-07-16 13:45:25', '2018-07-25 00:40:00', '1970-01-01 03:00:00', '', '', '', '26.07.2018 15:55', '25.07.2018 14:55', '19.07.2018 15:55', '1000', '', '', '', '', 3682, '\r\n                   #3682: Автор Тест                  ', 'unpaid', 0, '', 'project', '2018Jul16', 1, 'true', '23.07.2018 12:49:36'),
(366, '3548', '', '', 'false', '111', '366-111.html', '', 'АПП (Автоматизация производственных процессов)', 'false', 'true', 'true', 'true', '', '', 111, '', '111', 'Аннотация', '123123', '16.07.2018 14:55', 'USD', '0', 0, 'paid_client', '3649', 'daredevilvue@gmail.com', 'vlad zak', 'Revision', '2018-07-16 14:13:04', '2018-07-16 14:55:00', '1970-01-01 03:00:00', '', '29.07.2018 00:45', 'various', '19.07.2018 14:50', '20.07.2018 15:30', '22.07.2018 19:40', '', '', '', '', '', 3648, '\r\n                   #3648: vlad avtor                  ', 'unpaid', 0, '', 'project', '2018Jul16', 1, '', ''),
(367, '3548', '', '', '', 'Новый тест 2', '367---2.html', '', 'Административное право', 'false', 'false', '', '', 'false', '', 40, '', '1230', 'Диплом', '', '31.07.2018 14:00', 'USD', '0', 0, 'paid', '3660', 'html.beliy@gmail.com', 'Владимир Тест', 'Archived', '2018-07-16 14:49:32', '2018-07-31 14:00:00', '1970-01-01 03:00:00', '', '', 'need_to_choose', '', '', '', '', '', '', '', '', 3661, '#3661: Тест ТестТест', 'unpaid', 0, '', 'project', '2018Jul16', 1, '', '16.07.2018 14:50:34'),
(368, '3566', '', '', 'false', 'тест 2', '368--2.html', '', 'АПП (Автоматизация производственных процессов)', 'false', 'true', 'true', 'true', '', '', 10, '', '200', 'Аннотация', '', '21.07.2018 09:00', 'USD', '0', 0, 'half', '3628', 'eeerrrrivanov@yandex.ru', 'Рома Иванов', 'Revision', '2018-07-16 14:52:05', '2018-07-21 09:00:00', '1970-01-01 03:00:00', '', '', 'dont_need', '17.07.2018 09:00', '18.07.2018 09:00', '19.07.2018 09:00', '', '', '', '', '', 3556, '#3556: Автор  Иванов', 'unpaid', 0, '', 'project', '2018Jul16', 1, '', '16.07.2018 14:52:38'),
(369, '3566', '', '', 'false', 'тест 3', '369--3.html', '', 'АПП (Автоматизация производственных процессов)', 'false', 'true', 'true', 'true', '', 'true', 10, '', '100', 'Аннотация', '', '17.07.2018 09:00', 'USD', '', 120, 'half', '3628', 'eeerrrrivanov@yandex.ru', 'Рома Иванов', 'Revision', '2018-07-16 15:33:34', '2018-07-17 09:00:00', '1970-01-01 03:00:00', '', '', 'true', '19.07.2018 09:00', '20.07.2018 09:00', '24.07.2018 09:00', '200', '100', '', '20', '20', 3556, '#3556: Автор  Иванов', 'unpaid', 0, '', 'project', '2018Jul16', 1, 'false', '16.07.2018 15:34:51'),
(370, '2562', '23.07.2018 17:58:42', '', 'false', 'тест 4', '370--4.html', '', 'АПП (Автоматизация производственных процессов)', 'false', 'true', 'true', '', '', 'true', 10, '', '100', 'Аннотация', '', '31.12.1899 00:00', 'USD', '0', 0, 'unpaid', '3628', 'eeerrrrivanov@yandex.ru', 'Рома Иванов', 'Revision', '2018-07-16 16:57:21', '1899-12-31 00:00:00', '1970-01-01 03:00:00', '', '', 'need_to_choose', '', '', '', '200', '', '', '', '', 3556, '\r\n                   #3556: Автор  Иванов                  ', 'unpaid', 0, '', 'project', '2018Jul16', 1, 'true', '18.07.2018 22:52:18'),
(371, '3548', '23.07.2018 13:40:29', '', 'false', '12122', '371-12122.html', '', 'АПП (Автоматизация производственных процессов)', 'false', 'true', 'true', '', '', '', 1231231, '', '123112312', 'Аннотация', '1231ewasd12312eqwe', '19.07.2018 07:15', 'USD', '0', 0, 'unpaid', '3649', 'daredevilvue@gmail.com', 'vlad zak', 'Revision', '2018-07-17 12:28:49', '2018-07-19 07:15:00', '1970-01-01 03:00:00', '', '', 'need_to_choose', '', '', '', '', '', '', '', '', 3648, '\r\n                   #3648: vlad avtor                  ', 'unpaid', 0, '', 'project', '2018Jul17', 1, '', ''),
(372, '3548', '23.07.2018 13:40:35', '', 'false', 'тест 5 ', '372--5-.html', '', 'Хирургия', 'false', 'true', 'true', 'true', '', 'true', 10, '', '100', 'Аннотация', '', '20.07.2018 09:00', 'USD', '0', 0, 'unpaid', '3628', 'eeerrrrivanov@yandex.ru', 'Рома Иванов', 'Revision', '2018-07-17 13:29:00', '2018-07-20 09:00:00', '1970-01-01 03:00:00', '', '', '', '', '', '', '500', '', '', '', '', 3648, '\r\n                   #3648: vlad avtor                  ', 'unpaid', 0, '', 'project', '2018Jul17', 1, 'true', '19.07.2018 13:20:32'),
(373, '2562', '', '', 'true', '123', '373-123.html', '', 'АПП (Автоматизация производственных процессов)', 'false', 'true', 'true', 'true', '', 'true', 20, '', '1231231', 'Аннотация', '1231', '20.07.2018 15:55', 'USD', '0', 0, 'unpaid', '3684', 'daredevilvue@gmail.com', 'zakaz_v zaza', 'onlyAvtorDoplata', '2018-07-17 14:00:37', '2018-07-20 15:55:00', '1970-01-01 03:00:00', '22.08.2018', '27.07.2018 18:50', 'false', '25.07.2018 14:55', '23.07.2018 17:55', '25.07.2018 13:50', '1222', '', '', '', '', 3648, '\r\n                   #3648: vlad avtor                  ', 'unpaid', 0, '', 'project', '2018Jul17', 1, 'true', '18.07.2018 15:35:22'),
(374, '2562', '', '', '', 'Новый заказ', '374--.html', '', 'АПП (Автоматизация производственных процессов)', 'false', 'true', '', 'true', 'true', 'true', 100, '', '100', 'Аннотация', '123123', '19.07.2018 11:15', 'USD', '0', 0, 'paid', '3684', 'daredevilvue@gmail.com', 'zakaz_v zaza', 'Cancelled', '2018-07-17 16:17:54', '2018-07-19 11:15:00', '1970-01-01 03:00:00', '', '', '', '25.07.2018 14:50', '20.07.2018 15:35', '26.07.2018 15:30', '1000', '', '', '', '', 3648, '\r\n                   #3648: vlad avtor                  ', 'unpaid', 0, '', 'project', '2018Jul17', 1, 'true', ''),
(375, '2562', '', '', 'true', 'qweqwq', '375-qweqwq.html', '', 'АПП (Автоматизация производственных процессов)', 'false', 'true', '', '', 'true', '', 1231, '', '123123', 'Аннотация', 'sd123asd', '19.07.2018 11:30', 'USD', '0', 0, 'paid', '3684', 'daredevilvue@gmail.com', 'zakaz_v zaza', 'Assigned', '2018-07-18 11:49:29', '2018-07-19 11:30:00', '1970-01-01 03:00:00', '', '', 'need_to_choose', '', '', '', '', '', '', '', '', 3648, '\r\n                   #3648: vlad avtor                  ', 'unpaid', 0, '', 'project', '2018Jul18', 1, '', ''),
(376, '3548', '23.07.2018 13:40:23', '', 'false', 'тест 10', '376--10.html', '', 'АПП (Автоматизация производственных процессов)', 'false', 'true', 'true', '', '', 'true', 10, '', '100', 'Аннотация', '', '19.07.2018 09:00', 'USD', '0', 0, 'paid_client', '3628', 'eeerrrrivanov@yandex.ru', 'Рома Иванов', 'Revision', '2018-07-18 18:44:20', '2018-07-19 09:00:00', '1970-01-01 03:00:00', '', '', 'need_to_choose', '', '', '', '500', '', '', '', '', 3648, '\r\n                   #3648: vlad avtor                  ', 'unpaid', 0, '', 'project', '2018Jul18', 1, 'true', '18.07.2018 18:46:34'),
(378, '3548', '23.07.2018 13:40:15', '', 'false', 'Ситуація: \\\"З 2002 року голови Райдержадміністрацій роздавали запаси землі сільських рад за межеми населених пунктів\\\". (як я бачу дану ситацію)', '378---2002-----------.html', '', 'Право', 'false', 'true', 'true', '', '', '', 2, '', '100', 'Доклад', 'отрібно розписати бачення ситуацію із права, з посиланням на норми права. Ситуація: \\\"З 2002 року голови Райдержадміністрацій роздавали запаси землі сільських рад за межеми населених пунктів\\\". (як я бачу дану ситацію)\r\nВ цілому охарактеризувати бачення! Ну можна використати таку інформацію наприклад, як повноваження райдержадміністрації, тобто визначити чи мали право роздавати дані землі, цільове нецільове використанне землі, привід видачі землі, об*єми, потреби. Також там є ЗУ \\\"Про внесення змін до деяких законодавчих актів України щодо розмежування державної та комунальної власності з 01 січня 2013 року, також законопроект 4355 від 31.03.2016. це так орієнтовно.', '20.07.2018 09:00', 'USD', '0', 0, 'unpaid', '3628', 'eeerrrrivanov@yandex.ru', 'Рома Иванов', 'Revision', '2018-07-19 09:05:49', '2018-07-20 09:00:00', '1970-01-01 03:00:00', '', '', 'need_to_choose', '', '', '', '', '', '', '', '', 3648, '\r\n                   #3648: vlad avtor                  ', 'unpaid', 0, '', 'project', '2018Jul19', 1, '', '19.07.2018 15:30:22'),
(379, '2562', '20.07.2018 12:44:02', '', '', '12312', '379-12312.html', '', 'АПП (Автоматизация производственных процессов)', 'false', 'false', '', '', '', '', 1231, '', '12312', 'Аннотация', '12313', '20.07.2018 11:35', '', '0', 0, 'unpaid', '3684', 'daredevilvue@gmail.com', 'zakaz_v zaza', 'Archived', '2018-07-19 11:16:58', '2018-07-20 11:35:00', '1970-01-01 03:00:00', '', '', 'need_to_choose', '', '', '', '', '', '', '', '', 3682, '\r\n                   #3682: Автор Тест                  ', 'unpaid', 0, '', 'project', '2018Jul19', 1, '', ''),
(380, '2562', '20.07.2018 12:44:11', '', 'false', '3123123', '380-3123123.html', '', 'АПП (Автоматизация производственных процессов)', 'false', 'false', '', '', '', '', 123123, '', '1231231231', 'Аннотация', '123123', '19.07.2018 15:55', '', '0', 0, 'unpaid', '3684', 'daredevilvue@gmail.com', 'zakaz_v zaza', 'Assigned', '2018-07-19 11:19:18', '2018-07-19 15:55:00', '1970-01-01 03:00:00', '', '', 'need_to_choose', '', '', '', '', '', '', '', '', 3682, '\r\n                   #3682: Автор Тест                  ', 'unpaid', 0, '', 'project', '2018Jul19', 1, '', ''),
(381, '2562', '20.07.2018 12:44:19', '', 'false', '3123123', '381-3123123.html', '', 'АПП (Автоматизация производственных процессов)', 'false', 'false', '', '', '', '', 1323, '', '12312', 'Аннотация', '3123123', '20.07.2018 11:55', '', '0', 0, 'unpaid', '3684', 'daredevilvue@gmail.com', 'zakaz_v zaza', 'Assigned', '2018-07-19 11:21:18', '2018-07-20 11:55:00', '1970-01-01 03:00:00', '', '', 'need_to_choose', '', '', '', '', '', '', '', '', 3682, '\r\n                   #3682: Автор Тест                  ', 'unpaid', 0, '', 'project', '2018Jul19', 1, '', ''),
(382, '2562', '20.07.2018 12:44:26', '', 'false', '123123', '382-123123.html', '', 'АПП (Автоматизация производственных процессов)', 'false', 'false', '', '', '', '', 123123, '', '1231231', 'Аннотация', '123123', '20.07.2018 15:55', '', '0', 0, 'unpaid', '3684', 'daredevilvue@gmail.com', 'zakaz_v zaza', 'Assigned', '2018-07-19 11:22:24', '2018-07-20 15:55:00', '1970-01-01 03:00:00', '', '', 'need_to_choose', '', '', '', '', '', '', '', '', 3682, '\r\n                   #3682: Автор Тест                  ', 'unpaid', 0, '', 'project', '2018Jul19', 1, '', ''),
(383, '2562', '20.07.2018 12:44:38', '', 'false', '123123', '383-123123.html', '', 'АПП (Автоматизация производственных процессов)', 'false', 'false', '', '', '', '', 123123, '', '123123', 'Аннотация', '123123', '20.07.2018 11:35', 'USD', '0', 0, 'unpaid', '3684', 'daredevilvue@gmail.com', 'zakaz_v zaza', 'Assigned', '2018-07-19 11:24:13', '2018-07-20 11:35:00', '1970-01-01 03:00:00', '', '', 'need_to_choose', '', '', '', '', '', '', '', '', 3682, '\r\n                   #3682: Автор Тест                  ', 'unpaid', 0, '', 'project', '2018Jul19', 1, '', ''),
(384, '2562', '20.07.2018 12:44:49', '', 'true', '123123', '384-123123.html', '', 'АПП (Автоматизация производственных процессов)', 'false', 'false', '', '', '', '', 123123, '', '3123123', 'Аннотация', '123123', '20.07.2018 11:35', 'USD', '0', 0, 'unpaid', '3684', 'daredevilvue@gmail.com', 'zakaz_v zaza', 'Assigned', '2018-07-19 12:32:12', '2018-07-20 11:35:00', '1970-01-01 03:00:00', '', '', 'need_to_choose', '', '', '', '', '', '', '', '', 3682, '\r\n                   #3682: Автор Тест                  ', 'unpaid', 0, '', 'project', '2018Jul19', 1, '', ''),
(385, '2562', '30.08.2018 17:23:38', '', 'true', '123123', '385-123123.html', '', 'АПП (Автоматизация производственных процессов)', 'false', 'false', 'false', 'true', '', 'true', 123123, '', '1231', 'Аннотация', '1231', '27.07.2018 11:35', 'USD', '0', 500, 'paid_client', '3684', 'daredevilvue@gmail.com', 'zakaz_v zaza', 'onlyAvtorDoplata', '2018-07-19 12:33:52', '2018-07-27 11:35:00', '1970-01-01 03:00:00', '29.09.2018', '', 'false', '24.07.2018 11:55', '25.07.2018 11:55', '26.07.2018 11:55', '1230', '', '', '', '', 3648, '\r\n                   #3648: vlad avtor                  ', 'unpaid', 0, '', 'project', '2018Jul19', 1, 'true', '23.07.2018 11:10:20'),
(386, '2562', '20.07.2018 11:38:46', '', 'false', 'Новый тест на картинку', '386----.html', '', 'АПП (Автоматизация производственных процессов)', 'false', 'true', '', '', '', 'true', 10, '', '100', 'Аннотация', '', '25.07.2018 11:00', 'USD', '0', 0, 'unpaid', '3681', 'html.beliy@gmail.com', 'Владимир Тест', 'Assigned', '2018-07-20 11:02:52', '2018-07-25 11:00:00', '1970-01-01 03:00:00', '', '', 'need_to_choose', '', '', '', '200', '', '', '', '', 3648, '\r\n                   #3648: vlad avtor                  ', 'unpaid', 0, '', 'project', '2018Jul20', 1, 'true', ''),
(387, '2562', '', '', 'true', 'тест 60', '387---60.html', '', 'АПП (Автоматизация производственных процессов)', 'false', 'true', 'true', 'true', 'true', 'true', 10, '', '100', 'Аннотация', '', '21.07.2018 09:00', 'USD', NULL, 40, 'paid', '3628', 'eeerrrrivanov@yandex.ru', 'Рома Иванов', 'onlyAvtorDoplata', '2018-07-20 13:08:37', '2018-07-21 09:00:00', '1970-01-01 03:00:00', '30.08.2018', '', 'true', '22.07.2018 09:00', '23.07.2018 09:00', '24.07.2018 09:00', '100', '50', '', '150', '100', 3556, '#3556: Автор  Иванов', 'unpaid', 0, '', 'project', '2018Jul20', 1, 'true', '20.07.2018 14:51:36'),
(388, '2562', '20.07.2018 15:46:36', '', 'true', 'тест 66', '388--66.html', '', 'АПП (Автоматизация производственных процессов)', 'false', 'true', '', 'true', '', '', 10, '', '100', 'Аннотация', '', '21.07.2018 09:00', 'USD', '0', 0, 'unpaid', '3628', 'eeerrrrivanov@yandex.ru', 'Рома Иванов', 'pending', '2018-07-20 15:45:52', '2018-07-21 09:00:00', '1970-01-01 03:00:00', '22.08.2018', '', 'dont_need', '', '23.07.2018 12:00', '25.07.2018 15:00', '', '', '', '', '', 3556, '\r\n                   #3556: Автор  Иванов                  ', 'unpaid', 0, '', 'project', '2018Jul20', 1, '', ''),
(389, '3548', '23.07.2018 13:40:07', '', 'false', '1', '389-1.html', '', 'АПП (Автоматизация производственных процессов)', 'false', 'true', 'true', '', '', '', 1, '', '1', 'Аннотация', '', '21.07.2018 09:00', 'USD', '0', 0, 'unpaid', '3698', 'zakazchikz@yandex.ua', 'заказчик  заказчик', 'Revision', '2018-07-20 16:06:20', '2018-07-21 09:00:00', '1970-01-01 03:00:00', '', '', 'need_to_choose', '', '', '', '', '', '', '', '', 3648, '\r\n                   #3648: vlad avtor                  ', 'unpaid', 0, '', 'project', '2018Jul20', 1, '', '23.07.2018 10:57:33'),
(390, '2562', '24.07.2018 10:43:09', '', '', '132312321', '390-132312321.html', '', 'АПП (Автоматизация производственных процессов)', 'false', 'true', '', 'true', 'true', '', 81, '', '123123', 'Аннотация', '1231231', '25.07.2018 14:35', 'USD', '0', 0, 'paid', '3708', 'shaitan.vova@mail.ru', 'qqq qqq', 'Completed', '2018-07-23 13:51:47', '2018-07-25 14:35:00', '1970-01-01 03:00:00', '', '', 'true', '24.07.2018 10:50', '26.07.2018 10:50', '29.07.2018 10:50', '', '', '', '', '', 3648, '\r\n                   #3648: vlad avtor                  ', 'unpaid', 0, '', 'project', '2018Jul23', 1, '', ''),
(391, '2562', '23.07.2018 15:40:02', '', 'false', '1231', '391-1231.html', '', 'АПП (Автоматизация производственных процессов)', 'false', 'true', 'true', 'true', '', 'true', 123123, '', '123123', 'Аннотация', '123123', '26.07.2018 14:55', 'USD', '0', 0, 'half', '3684', 'daredevilvue@gmail.com', 'zakaz_v zaza', 'Revision', '2018-07-23 14:07:49', '2018-07-26 14:55:00', '1970-01-01 03:00:00', '', '', 'true', '', '', '', '', '', '', '', '200', 3648, '\r\n                   #3648: vlad avtor                  ', 'unpaid', 0, '', 'project', '2018Jul23', 1, 'true', ''),
(392, '3566', '28.08.2018 08:52:14', '', 'false', 'Тестовый Заказ V', '392---V.html', '', 'АПП (Автоматизация производственных процессов)', 'false', 'true', '', '', '', '', 34, '', '1200', 'Аннотация', 'Phasellus in vulputate dolor, eget bibendum dolor. Mauris laoreet lorem vitae mi pellentesque consectetur. Nulla facilisi. Fusce scelerisque, massa non fringilla feugiat, orci velit egestas augue, sit amet placerat erat orci in augue. Mauris et augue consectetur, bibendum orci eget, bibendum elit. Fusce gravida tincidunt est. Nulla facilisi. Integer eget quam sed erat hendrerit rhoncus ut fringilla lacus. Praesent accumsan gravida dui, id consequat eros auctor a. Pellentesque mattis quam est, vitae consectetur tortor luctus fringilla. Vestibulum at est id ligula imperdiet lacinia. Cras et placerat est.\r\n\r\nPhasellus convallis odio purus, sit amet ultricies nulla accumsan sit amet. Etiam tincidunt id sapien vel luctus. Mauris venenatis nibh at lobortis porta. Maecenas in semper ligula. Praesent mattis scelerisque diam, ut mattis nibh. Pellentesque tincidunt augue nec vulputate venenatis. Ut non lectus.', '01.09.2018 12:30', 'USD', '0', 0, 'unpaid', '3645', 'volderam@yandex.ua', 'John Doe', 'Assigned', '2018-07-24 12:34:59', '2018-09-01 12:30:00', '1970-01-01 03:00:00', '', '', 'need_to_choose', '', '', '', '', '', '', '', '', 3556, '\r\n                   #3556: Автор  Иванов                  ', 'unpaid', 0, '', 'project', '2018Jul24', 1, '', ''),
(393, '3566', '24.07.2018 12:56:05', '', '', 'Новый тест 12', '393---12.html', '', 'АПП (Автоматизация производственных процессов)', 'false', 'false', '', 'false', '', 'true', 50, '', '200', 'Диплом', '', '27.07.2018 12:00', 'USD', '0', 0, 'half', '3681', 'html.beliy@gmail.com', 'Владимир Тест', 'Completed', '2018-07-24 12:53:14', '2018-07-27 12:00:00', '1970-01-01 03:00:00', '', '', 'true', '25.07.2018 12:00', '26.07.2018 12:00', '27.07.2018 10:00', '200', '100', '', '', '', 3682, '#3682: Автор Тест', 'unpaid', 0, '', 'project', '2018Jul24', 1, 'true', '24.07.2018 12:53:55'),
(394, '2562', '24.07.2018 13:37:06', '', 'true', 'проверка', '394--.html', '', 'Механика', 'false', 'true', 'true', 'true', '', 'true', 2, '', '20', 'Аннотация', '1231231231', '25.07.2018 09:00', 'USD', NULL, 444, 'paid_client', '3628', 'eeerrrrivanov@yandex.ru', 'Рома Иванов', 'onlyAvtorDoplata', '2018-07-24 13:27:18', '2018-07-25 09:00:00', '1970-01-01 03:00:00', '28.09.2018', '', 'true', '25.07.2018 09:00', '26.07.2018 09:00', '27.07.2018 09:00', '150', '100', '111', '100', '120', 3556, '#3556: Автор  Иванов', 'unpaid', 0, '', 'project', '2018Jul24', 1, 'false', '24.07.2018 13:32:46'),
(395, '3566', '28.08.2018 08:52:04', '', 'false', '123123', '395-123123.html', '', 'АПП (Автоматизация производственных процессов)', 'false', 'true', '', '', '', '', 1231, '', '1231', 'Аннотация', '123123', '27.07.2018 15:35', 'USD', '0', 0, 'unpaid', '3684', 'daredevilvue@gmail.com', 'zakaz_v zaza', 'Assigned', '2018-07-24 17:22:08', '2018-07-27 15:35:00', '1970-01-01 03:00:00', '', '', 'need_to_choose', '', '', '', '', '', '', '', '', 3556, '\r\n                   #3556: Автор  Иванов                  ', 'unpaid', 0, '', 'project', '2018Jul24', 1, '', ''),
(396, '3566', '28.08.2018 08:51:57', '', 'false', 'qweqwe', '396-qweqwe.html', '', 'АПП (Автоматизация производственных процессов)', 'false', 'true', '', '', '', '', 1231231, '', '123123', 'Аннотация', '123123', '27.07.2018 19:30', 'USD', '0', 0, 'unpaid', '3684', 'daredevilvue@gmail.com', 'zakaz_v zaza', 'Assigned', '2018-07-24 17:23:38', '2018-07-27 19:30:00', '1970-01-01 03:00:00', '', '', 'need_to_choose', '', '', '', '', '', '', '', '', 3556, '\r\n                   #3556: Автор  Иванов                  ', 'unpaid', 0, '', 'project', '2018Jul24', 1, '', ''),
(397, '2562', '02.08.2018 20:43:07', '', 'false', 'ASDASDASD', '397-ASDASDASD.html', '', 'АПП (Автоматизация производственных процессов)', 'false', 'true', '', '', '', 'true', 23123, '', '123123', 'Аннотация', '123123', '26.07.2018 14:55', 'USD', '0', 0, 'unpaid', '3684', 'daredevilvue@gmail.com', 'zakaz_v zaza', 'Assigned', '2018-07-24 17:24:28', '2018-07-26 14:55:00', '1970-01-01 03:00:00', '', '', 'need_to_choose', '', '', '', '', '', '', '', '200', 3556, '\r\n                   #3556: Автор  Иванов                  ', 'unpaid', 0, '', 'project', '2018Jul24', 1, 'true', '29.07.2018 18:33:03'),
(398, '3566', '28.08.2018 08:51:48', '', 'false', 'QWEQWE', '398-QWEQWE.html', '', 'АПП (Автоматизация производственных процессов)', 'false', 'true', 'true', '', '', '', 23123, '', '12312312', 'Аннотация', '1231231231233123123', '06.09.2018 18:55', 'USD', '0', 0, 'unpaid', '3684', 'daredevilvue@gmail.com', 'zakaz_v zaza', 'Revision', '2018-07-24 17:24:49', '2018-09-06 18:55:00', '1970-01-01 03:00:00', '', '', 'need_to_choose', '', '', '', '', '', '', '', '', 3556, '\r\n                   #3556: Автор  Иванов                  ', 'unpaid', 0, '', 'project', '2018Jul24', 1, '', ''),
(399, '3566', '28.08.2018 08:51:39', '', 'false', '123123', '399-123123.html', '', 'АПП (Автоматизация производственных процессов)', 'false', 'true', 'true', '', '', '', 12312, '', '1231', 'Аннотация', '123123', '27.07.2018 19:55', 'USD', '0', 0, 'unpaid', '3684', 'daredevilvue@gmail.com', 'zakaz_v zaza', 'Revision', '2018-07-24 17:26:22', '2018-07-27 19:55:00', '1970-01-01 03:00:00', '', '', 'need_to_choose', '', '', '', '', '', '', '', '', 3556, '\r\n                   #3556: Автор  Иванов                  ', 'unpaid', 0, '', 'project', '2018Jul24', 1, '', ''),
(400, '2562', '29.07.2018 17:52:23', '', '', '123123', '400-123123.html', '', 'АПП (Автоматизация производственных процессов)', 'false', 'true', '', 'true', '', '', 123123, '', '123123', 'Аннотация', '123123', '26.07.2018 10:30', 'USD', '0', 0, 'unpaid', '3684', 'daredevilvue@gmail.com', 'zakaz_v zaza', 'Openproject', '2018-07-24 17:26:50', '2018-07-26 10:30:00', '1970-01-01 03:00:00', '28.09.2018', '', 'false', '30.07.2018 09:00', '31.07.2018 09:00', '02.08.2018 09:00', '', '', '', '', '', 0, ' ', 'unpaid', 0, '', 'project', '2018Jul24', 1, '', '29.07.2018 17:52:07'),
(401, '3566', '28.08.2018 08:51:30', '', 'false', '123123', '401-123123.html', '', 'АПП (Автоматизация производственных процессов)', 'false', 'true', '', '', '', '', 12312, '', '123123', 'Аннотация', '123123', '26.07.2018 11:35', 'USD', '0', 0, 'unpaid', '3684', 'daredevilvue@gmail.com', 'zakaz_v zaza', 'Assigned', '2018-07-24 17:27:11', '2018-07-26 11:35:00', '1970-01-01 03:00:00', '', '', 'need_to_choose', '', '', '', '', '', '', '', '', 3556, '\r\n                   #3556: Автор  Иванов                  ', 'unpaid', 0, '', 'project', '2018Jul24', 1, '', ''),
(402, '3566', '28.08.2018 08:51:22', '', '', '123123', '402-123123.html', '', 'АПП (Автоматизация производственных процессов)', 'false', 'true', '', 'true', '', '', 12312, '', '3123', 'Аннотация', '12312', '26.07.2018 18:55', 'USD', '0', 0, 'paid_client', '3684', 'daredevilvue@gmail.com', 'zakaz_v zaza', 'Archived', '2018-07-24 17:36:59', '2018-07-26 18:55:00', '1970-01-01 03:00:00', '', '', '', '', '01.08.2018 09:00', '01.08.2018 09:00', '', '', '', '', '', 3556, '\r\n                   #3556: Автор  Иванов                  ', 'unpaid', 0, '', 'project', '2018Jul24', 1, '', '27.07.2018 13:54:08'),
(403, '2562', '21.08.2018 12:43:37', '', 'true', 'використання математики в програмуванні', '403-----.html', '', 'Программирование', 'false', 'true', '', 'true', '', 'true', 15, '', '100', 'Реферат', '', '28.07.2018 09:00', 'USD', '0', 100, 'half', '3628', 'eeerrrrivanov@yandex.ru', 'Рома Иванов', 'Assigned', '2018-07-25 21:22:24', '2018-07-28 09:00:00', '1970-01-01 03:00:00', '15.09.2018', '', 'dont_need', '', '28.07.2018 09:00', '28.07.2018 09:00', '200', '100', '', '', '', 3648, '\r\n                   #3648: vlad avtor                  ', 'unpaid', 0, '', 'project', '2018Jul25', 1, 'true', '16.08.2018 01:37:57'),
(404, '2562', '26.07.2018 14:04:38', '', 'false', 'тест', '404--.html', '', 'АПП (Автоматизация производственных процессов)', 'false', 'true', 'true', 'true', '', 'true', 10, '', '100', 'Аннотация', '', '27.07.2018 14:00', 'USD', '0', 0, 'paid_client', '3628', 'eeerrrrivanov@yandex.ru', 'Рома Иванов', 'Revision', '2018-07-26 14:03:20', '2018-07-27 14:00:00', '1970-01-01 03:00:00', '14.09.2018', '', 'dont_need', '', '27.07.2018 09:00', '27.07.2018 09:00', '', '', '', '220', '200', 3556, '#3556: Автор  Иванов', 'unpaid', 0, '', 'project', '2018Jul26', 1, 'true', '26.07.2018 14:04:09'),
(405, '2562', '13.08.2018 21:47:37', '', 'true', 'Утрата англійської лексики у давньоанглійський період', '405------.html', '', 'Английский язык', 'false', 'false', 'false', 'true', '', 'true', 10, '', '200', 'Реферат', 'на українській мові, уникальность 60 % ', '16.08.2018 10:35', 'USD', NULL, 150, 'paid_client', '3718', 'istinay191@gmail.com', 'Мария Иванова ', 'onlyAvtorDoplata', '2018-07-26 19:40:30', '2018-08-06 10:00:00', '1970-01-01 03:00:00', '28.09.2018', '', 'dont_need', '27.07.2018 11:10', '20.08.2018 09:00', '25.08.2018 09:00', '200', '100', '', '', '', 3709, '#3709: Ольга Баран', 'unpaid', 0, '', 'project', '2018Jul26', 1, 'true', '30.07.2018 22:13:17'),
(406, '2562', '27.07.2018 11:22:37', '', '', 'Проверка - Правка 59', '406---59.html', '', 'АПП (Автоматизация производственных процессов)', 'false', 'true', '', 'true', '', '', 123123, '', '1321231', 'Аннотация', '132123', '28.07.2018 15:55', 'USD', '0', 0, 'half', '3684', 'daredevilvue@gmail.com', 'zakaz_v zaza', 'Completed', '2018-07-27 11:21:39', '2018-07-28 15:55:00', '1970-01-01 03:00:00', '26.08.2018', '', 'false', '28.07.2018 11:35', '29.07.2018 14:50', '28.07.2018 18:50', '', '', '', '', '', 3648, '#3648: vlad avtor', 'unpaid', 0, '', 'project', '2018Jul27', 1, '', '27.07.2018 11:22:22'),
(407, '2562', '29.07.2018 18:40:20', '', '', 'тест', '407--.html', '', 'Разное', 'false', 'true', '', '', '', 'true', 10, '', '100', 'Аннотация', '', '30.07.2018 09:00', 'USD', '0', 0, 'paid_client', '3628', 'eeerrrrivanov@yandex.ru', 'Рома Иванов', 'Completed', '2018-07-29 18:07:58', '2018-07-30 09:00:00', '1970-01-01 03:00:00', '', '', 'need_to_choose', '', '', '', '500', '', '', '', '', 3556, '#3556: Автор  Иванов', 'unpaid', 0, '', 'project', '2018Jul29', 1, 'true', '29.07.2018 18:25:58'),
(408, '3566', '01.08.2018 19:49:56', '', 'true', 'Оформление документов ', '408---.html', '', 'Разное', 'false', 'true', '', 'true', '', 'true', 9, '', '100', 'Доработка работы', 'Настроить зеркальные поля, и что бы текст, строчки, линии и другое остались на своих местах!!!', '02.08.2018 14:00', 'USD', '0', 40, 'paid', '3740', 'vlada.didkivskaya.99@gmail.com', 'Влада Дидкивская', 'Completed', '2018-08-01 14:33:09', '2018-08-02 14:00:00', '1970-01-01 03:00:00', '05.09.2018', '', 'dont_need', '', '02.08.2018 14:00', '02.08.2018 14:00', '100', '', '', '', '', 3562, '#3562: Оксана Теленик', 'unpaid', 0, '', 'project', '2018Aug01', 1, 'true', '01.08.2018 16:17:52'),
(409, '3566', '28.08.2018 08:51:15', '', 'false', 'тест', '409--.html', '', 'Разное', 'false', 'true', '', '', '', '', 1, '', '100', 'Аннотация', '', '02.08.2018 15:00', 'USD', '0', 0, 'unpaid', '3628', 'eeerrrrivanov@yandex.ru', 'Рома Иванов', 'Assigned', '2018-08-01 15:00:51', '2018-08-02 15:00:00', '1970-01-01 03:00:00', '', '', 'need_to_choose', '', '', '', '', '', '', '', '', 3556, '\r\n                   #3556: Автор  Иванов                  ', 'unpaid', 0, '', 'project', '2018Aug01', 1, '', '11.08.2018 11:38:48'),
(410, '3738', '01.08.2018 20:38:06', '', 'false', 'Тестовый заказ от Володи', '410---.html', '', 'АПП (Автоматизация производственных процессов)', 'false', 'true', '', '', '', '', 35, '', '350', 'Аннотация', 'нет', '11.08.2018 07:35', 'USD', '0', 0, 'unpaid', '3645', 'volderam@yandex.ua', 'John Doe', 'Assigned', '2018-08-01 20:35:18', '2018-08-11 07:35:00', '1970-01-01 03:00:00', '', '', 'need_to_choose', '', '', '', '', '', '', '', '', 3556, '\r\n                   #3556: Автор  Иванов                  ', 'unpaid', 0, '', 'project', '2018Aug01', 1, '', ''),
(411, '2562', '03.08.2018 10:55:36', '', 'true', 'Не трогать( Николай )', '411---.html', '', 'Английский язык', 'false', 'true', 'true', 'true', 'true', 'true', 90, '', '4000', 'Магистерская', '85', '04.08.2018 09:00', 'USD', '0', 2000, 'paid_writer', '3736', 'nikolayveronika1@ukr.net', 'заказчик Nik sadsad', 'onlyAvtorDoplata', '2018-08-02 01:59:14', '2018-08-04 09:00:00', '1970-01-01 03:00:00', '02.09.2018', '', 'true', '03.08.2018 08:00', '03.08.2018 09:00', '03.08.2018 09:00', '5000', '', '', '', '100', 3648, '\r\n                   #3648: vlad avtor                  ', 'unpaid', 0, '', 'project', '2018Aug02', 1, 'true', '02.08.2018 02:04:57'),
(412, '2562', '02.08.2018 11:04:36', '', 'true', 'uoiu', '412-uoiu.html', '', 'АПП (Автоматизация производственных процессов)', 'false', 'true', 'true', '', '', 'true', 12312, '', '123123', 'Аннотация', '123123123', '24.08.2018 10:15', 'USD', '0', 100, 'unpaid', '3684', 'daredevilvue@gmail.com', 'zakaz_v zaza', 'onlyAvtorDoplata', '2018-08-02 11:02:41', '2018-08-24 10:15:00', '1970-01-01 03:00:00', '01.09.2018', '', 'need_to_choose', '', '', '', '', '', '', '', '100', 3648, '#3648: vlad avtor', 'unpaid', 0, '', 'project', '2018Aug02', 1, 'true', '02.08.2018 11:04:22'),
(413, '3548', '02.08.2018 13:53:00', '', 'true', '231231', '413-231231.html', '', 'АПП (Автоматизация производственных процессов)', 'false', 'true', '', '', '', '', 12312, '', '1231231', 'Аннотация', '23123123', '24.08.2018 18:50', 'USD', '0', 0, 'unpaid', '3684', 'daredevilvue@gmail.com', 'zakaz_v zaza', 'Assigned', '2018-08-02 13:43:13', '2018-08-24 18:50:00', '1970-01-01 03:00:00', '', '', 'need_to_choose', '', '', '', '', '', '', '', '', 3648, '\r\n                   #3648: vlad avtor                  ', 'unpaid', 0, '', 'project', '2018Aug02', 1, '', ''),
(414, '3738', '10.08.2018 02:28:13', '', 'true', 'проверка менеджера', '414----.html', '', 'Анатомия', 'false', 'true', '', '', '', 'true', 12, '', '100', 'Доклад', '', '11.08.2018 00:00', 'USD', '0', 100, 'paid_client', '3736', 'nikolayveronika1@ukr.net', 'заказчик Nik sadsad', 'Assigned', '2018-08-02 23:58:38', '2018-08-11 00:00:00', '1970-01-01 03:00:00', '', '', 'need_to_choose', '', '', '', '20', '20', '', '', '', 3737, '#3737: автор Nik aasdasd', 'unpaid', 0, '', 'project', '2018Aug02', 1, 'true', '10.08.2018 02:21:16'),
(415, '2562', '06.08.2018 11:01:18', '', 'true', 'new_zakaz', '415-new_zakaz.html', '', 'АПП (Автоматизация производственных процессов)', 'false', 'true', 'true', 'true', 'true', 'true', 1231, '', '123123', 'Аннотация', '12312321', '17.08.2018 13:15', 'USD', '0', 100, 'paid_client', '3744', 'daredevilvue@gmail.com', 'Vlad Zakaz', 'onlyAvtorDoplata', '2018-08-03 13:36:59', '2018-08-17 13:15:00', '1970-01-01 03:00:00', '05.09.2018', '08.08.2018 14:50', 'true', '23.08.2018 10:30', '18.08.2018 11:35', '18.08.2018 11:30', '', '', '', '', '200', 3648, '\r\n                   #3648: vlad avtor                  ', 'unpaid', 0, '', 'project', '2018Aug03', 1, 'true', ''),
(416, '3566', '08.08.2018 11:14:26', '', 'true', 'тест 100', '416--100.html', '', 'АХД', 'false', 'true', 'true', 'true', '', 'true', 6, '', '50', 'Аннотация', '', '09.08.2018 09:00', 'USD', '0', 60, 'paid_client', '3628', 'eeerrrrivanov@yandex.ru', 'Рома Иванов', 'onlyAvtorDoplata', '2018-08-08 10:58:19', '2018-08-09 09:00:00', '1970-01-01 03:00:00', '07.09.2018', '10.08.2018 09:00', 'dont_need', '', '09.08.2018 09:00', '09.08.2018 09:00', '100', '', '', '20', '10', 3556, '#3556: Автор  Иванов', 'unpaid', 0, '', 'project', '2018Aug08', 1, 'true', '08.08.2018 11:11:32'),
(417, '2562', '29.08.2018 10:20:04', '', 'true', '\\\" Тест\\\"', '417--.html', '', 'АХД', 'false', 'true', 'true', 'true', '', '', 10, '', '20', 'Аннотация', 'тема работы \\\" Тест\\\"', '10.08.2018 09:00', 'USD', '0', 0, 'paid', '3653', 'afdfdsa@ukr.net', 'ффф ффф', 'onlyAvtorDoplata', '2018-08-08 21:10:59', '2018-08-10 09:00:00', '1970-01-01 03:00:00', '28.09.2018', '30.08.2018 09:00', '', '', '25.08.2018 09:00', '25.09.2018 09:00', '', '', '', '', '', 3556, '#3556: Автор  Иванов', 'unpaid', 0, '', 'project', '2018Aug08', 1, '', '29.08.2018 10:19:09'),
(418, '3566', '11.08.2018 09:17:53', '', '', 'Оздоровче виховання учнів шестирічного віку засобами народних ігр', '418-------.html', '', 'Педагогика', 'false', 'false', '', 'true', '', 'true', 90, '', '800', 'Магистерская', 'уникальность 70 %, есть утвержденный план ', '15.09.2018 09:00', 'USD', '0', 860, 'half', '3628', 'eeerrrrivanov@yandex.ru', 'Рома Иванов', 'Cancelled', '2018-08-09 20:28:17', '2018-09-15 09:00:00', '1970-01-01 03:00:00', '', '', 'dont_need', '', '20.08.2018 09:00', '09.09.2018 09:00', '1600', '800', '', '250', '100', 3594, '#3594: Владимир Антонюк', 'unpaid', 0, '', 'project', '2018Aug09', 1, 'false', '10.08.2018 17:49:17'),
(419, '3566', '11.08.2018 09:16:32', '', '', 'використання дидактичних ігор у процесі навчання учнів 1-4 класів основам здоров я ', '419------1-4--.html', '', 'Педагогика', 'false', 'false', '', 'true', '', 'true', 90, '', '800', 'Магистерская', 'уникальность 70%', '15.09.2018 09:00', 'USD', '0', 860, 'half', '3628', 'eeerrrrivanov@yandex.ru', 'Рома Иванов', 'Cancelled', '2018-08-09 20:31:34', '2018-09-15 09:00:00', '1970-01-01 03:00:00', '', '', 'dont_need', '', '20.08.2018 09:00', '09.09.2018 09:00', '1600', '800', '', '250', '100', 3594, '#3594: Владимир Антонюк', 'unpaid', 0, '', 'project', '2018Aug09', 1, 'false', '10.08.2018 17:50:19'),
(420, '3738', '16.08.2018 00:42:32', '', 'true', 'НЕ ТРОГАТЬ,НЕ ИЗМЕНЯТЬ,НЕ ВЛАЗИТЬ В ЭТОТ ЗАКАЗ НИКОМУ!!!!! (НИКОЛАЙ)', '420-------.html', '', 'Анатомия', 'false', 'true', '', 'true', '', 'true', 150, '', '1000', 'Диплом', '75%', '14.08.2018 09:00', 'USD', '0', 100, 'paid_client', '3736', 'nikolayveronika1@ukr.net', 'заказчик Nik sadsad', 'Assigned', '2018-08-10 02:03:39', '2018-08-14 09:00:00', '1970-01-01 03:00:00', '', '', 'false', '13.08.2018 23:00', '13.08.2018 23:00', '14.08.2018 08:00', '20', '', '', '', '', 3737, '#3737: автор Nik aasdasd', 'unpaid', 0, '', 'project', '2018Aug10', 1, 'true', '14.08.2018 15:21:20'),
(421, '3566', '12.08.2018 23:28:06', '', 'true', ' Страховое право ЕС', '421----.html', '', 'Юридические дисциплины', 'false', 'false', '', 'true', '', 'true', 100, '', '2000', 'Магистерская', 'уникальность 70 %, план нужно утверждать ', '10.09.2018 09:00', 'USD', '0', 1000, 'half', '3628', 'eeerrrrivanov@yandex.ru', 'Рома Иванов', 'Assigned', '2018-08-10 11:41:19', '2018-09-10 09:00:00', '1970-01-01 03:00:00', '', '', 'various', '14.08.2018 09:00', '03.09.2018 09:00', '10.09.2018 09:00', '', '', '', '', '', 3723, '#3723: Аліна Мазур', 'unpaid', 0, '', 'project', '2018Aug10', 1, 'true', '12.08.2018 10:40:55'),
(422, '3566', '12.08.2018 19:05:45', '', '', 'Нормативно-правові акти, що регулюють господарську діяльність, та їх систематизація. ', '422--------.html', '', 'Юридические дисциплины', 'false', 'true', '', 'true', 'true', 'true', 30, '', '380', 'Курсовая теоретическая', '', '19.08.2018 20:00', 'USD', '0', 160, 'paid', '3753', 'ali827@ukr.net', 'Аліна Колесник', 'Completed', '2018-08-12 02:29:15', '2018-08-19 20:00:00', '1970-01-01 03:00:00', '', '', 'true', '', '19.08.2018 09:00', '19.08.2018 09:00', '380', '190', '', '', '', 3562, '#3562: Оксана Теленик', 'unpaid', 0, '', 'project', '2018Aug12', 1, 'true', '12.08.2018 18:16:28'),
(423, '3566', '28.08.2018 08:50:32', '', 'false', 'тест', '423--.html', '', 'Анатомия', 'false', 'true', '', '', '', '', 32, '', '500', 'Аннотация', '', '14.08.2018 22:20', 'USD', '0', 0, 'unpaid', '3755', 'rabota181184@gmail.com', 'тест тест', 'Assigned', '2018-08-12 22:21:38', '2018-08-14 22:20:00', '1970-01-01 03:00:00', '', '', 'need_to_choose', '', '', '', '', '', '', '', '', 3556, '\r\n                   #3556: Автор  Иванов                  ', 'unpaid', 0, '', 'project', '2018Aug12', 1, '', '14.08.2018 07:20:57'),
(424, '3566', '13.08.2018 18:33:05', '', '', 'Здійснення і захист прав дітей і батьків на утримання', '424------.html', '', 'Юридические дисциплины', 'false', 'false', '', 'true', '', 'true', 100, '', '2800', 'Магистерская', 'уникальность 60% ', '27.08.2018 09:00', 'USD', '0', 0, 'paid_client', '3628', 'eeerrrrivanov@yandex.ru', 'Рома Иванов', 'Cancelled', '2018-08-13 12:44:54', '2018-08-27 09:00:00', '1970-01-01 03:00:00', '', '', 'true', '15.08.2018 09:00', '20.08.2018 09:00', '01.09.2018 09:00', '2800', '1000', '', '', '', 3562, '#3562: Оксана Теленик', 'unpaid', 0, '', 'project', '2018Aug13', 1, 'true', '13.08.2018 17:45:15'),
(425, '3566', '13.08.2018 17:21:26', '', 'true', 'Сутність, форми і роль кредиту в сучасній економіці.', '425------.html', '', 'Экономическая теория', 'false', 'true', '', 'true', '', 'true', 26, '', '0', 'Курсовая теоретическая', 'Робота виконується в текстовому редакторі MS Word, шрифт − Times New Roman, розмір шрифту 14, міжрядковий інтервал – 1,5, вирівнювання тексту − по ширині. На кожній сторінці повинно бути 28-29 рядків і наступні поля: ліворуч – 3 см., зверху і знизу – 2 см, праворуч – 1 см, абзацний відступ – 1,25 см. Усі структурні елементи роботи починаються з нової сторінки. Виконана курсова робота повинна бути зброшурована.', '20.08.2018 14:00', 'USD', '0', 180, 'paid', '3756', 'anzhelika.gart2014@yandex.ru', 'Анжела Иванова', 'Completed', '2018-08-13 14:12:58', '2018-08-20 14:00:00', '1970-01-01 03:00:00', '19.09.2018', '', 'true', '14.08.2018 09:00', '16.08.2018 09:00', '20.08.2018 09:00', '320', '160', '', '', '', 3714, '#3714: Анастасия  Малета', 'unpaid', 0, '', 'project', '2018Aug13', 1, 'true', '13.08.2018 16:58:49'),
(426, '3566', '27.08.2018 21:41:48', '', 'true', 'Підручник як засіб навчання і виховання у початковій школі', '426------.html', '', 'Педагогика', 'false', 'false', '', 'true', '', 'true', 100, '', '2000', 'Магистерская', 'Доповнити курсову(документів.прикріплений)розширити до магістерської.Тема вказана вище.', '01.09.2018 18:50', 'USD', '0', 600, 'half', '3759', 'miheevan37@gmail.com', 'Анастасія Міхеєва', 'Assigned', '2018-08-14 15:13:40', '2018-09-01 18:50:00', '1970-01-01 03:00:00', '', '', 'dont_need', '', '15.09.2018 09:00', '20.09.2018 09:00', '2000', '1000', '', '', '', 3598, '#3598: Анна Козіна', 'unpaid', 0, '', 'project', '2018Aug14', 1, 'true', '27.08.2018 11:03:12'),
(427, '3566', '27.08.2018 21:40:29', '', 'true', 'Підручник як засіб навчання і виховання у початковій школі', '427------.html', '', 'Педагогика', 'false', 'false', '', 'true', '', 'true', 12, '', '300', 'Статья', 'Унікальність тексту,правильне оформлення\r\n', '01.09.2018 18:45', 'USD', '0', 150, 'paid_client', '3759', 'miheevan37@gmail.com', 'Анастасія Міхеєва', 'Assigned', '2018-08-14 15:54:53', '2018-09-01 18:45:00', '1970-01-01 03:00:00', '', '', '', '29.08.2018 09:00', '05.09.2018 09:00', '10.09.2018 09:00', '300', '300', '', '', '', 3598, '#3598: Анна Козіна', 'unpaid', 0, '', 'project', '2018Aug14', 1, 'true', '26.08.2018 20:31:57'),
(428, '3566', '15.08.2018 20:13:12', '', 'true', 'Два юр.предмета по два задания', '428----.html', '', 'Юридические дисциплины', 'false', 'true', '', 'true', '', 'true', 15, '', '700', 'Другое', 'Право промыслової власності (2 завдання, умови містяться в файлі)\r\nПравове регулювання електронної комерції (2 завдання, умови містяться в файлі)', '17.08.2018 10:00', 'USD', '0', 450, 'paid', '3760', 'Wantedcr7@me.com', 'Marko Shulz', 'Completed', '2018-08-14 20:30:42', '2018-08-17 10:00:00', '1970-01-01 03:00:00', '16.09.2018', '', 'dont_need', '', '', '17.08.2018 09:00', '700', '', '', '', '', 3556, '\r\n                   #3556: Автор  Иванов                  ', 'unpaid', 0, '', 'project', '2018Aug14', 1, 'true', '14.08.2018 22:46:45'),
(429, '3566', '28.08.2018 08:50:23', '', 'false', '333', '429-333.html', '', 'АПП (Автоматизация производственных процессов)', 'false', 'true', '', '', '', '', 666, '', '1231231', 'Аннотация', '1231231', '18.08.2018 11:55', 'USD', '0', 0, 'unpaid', '3744', 'daredevilvue@gmail.com', 'Vlad Zakaz', 'Assigned', '2018-08-15 12:24:30', '2018-08-18 11:55:00', '1970-01-01 03:00:00', '', '', 'need_to_choose', '', '', '', '', '', '', '', '', 3556, '\r\n                   #3556: Автор  Иванов                  ', 'unpaid', 0, '', 'project', '2018Aug15', 1, '', ''),
(430, '2562', '15.08.2018 12:53:46', '', 'true', 'file test order', '430-file-test-order.html', '', 'АПП (Автоматизация производственных процессов)', 'false', 'true', 'true', 'true', '', 'true', 100, '', '1000', 'Аннотация', '010011', '17.08.2018 14:50', 'USD', '0', 0, 'paid_client', '3762', 'daredevilvue@gmail.com', 'vlad zakaz', 'onlyAvtorDoplata', '2018-08-15 12:37:39', '2018-08-17 14:50:00', '1970-01-01 03:00:00', '14.09.2018', '', 'true', '23.08.2018 10:30', '24.08.2018 12:55', '16.08.2018 15:50', '', '', '', '', '100', 3648, '\r\n                   #3648: vlad avtor                  ', 'unpaid', 0, '', 'project', '2018Aug15', 1, 'true', '');
INSERT INTO `orders` (`orderid`, `manager_id`, `gived_to_writer`, `trackingid`, `writer_accept_order`, `topic`, `alias`, `typeofservice`, `subject`, `viewed`, `view_todo_ord`, `wr_view_rev`, `wr_view_plan`, `paid_writer_mes`, `fine_wr_message`, `words`, `academic_level`, `sources`, `referencing_style`, `instructions`, `urgency`, `currency`, `amount`, `writerpay`, `client_paid`, `customer`, `customer_email`, `customer_name`, `order_status`, `date_posted`, `deadline`, `deadline_writers`, `data_oplatu`, `dorabotka`, `yesno`, `plan`, `half_work`, `all_work`, `oplata`, `avans`, `fine`, `doplata`, `avtor_doplata`, `preferred_writer`, `writer_name`, `writerpaid`, `order_rating`, `rating_comment`, `project_type`, `order_period`, `notification_sent`, `doplata_status`, `last_ord_req`) VALUES
(431, '2562', '21.08.2018 14:02:12', '', '', '213131231', '431-213131231.html', '', 'АПП (Автоматизация производственных процессов)', 'false', 'true', '', '', '', '', 12312312, '', '12312', 'Аннотация', '3123123', '25.08.2018 10:35', 'USD', '0', 0, 'unpaid', '3762', 'daredevilvue@gmail.com', 'vlad zakaz', 'Cancelled', '2018-08-15 12:47:18', '2018-08-25 10:35:00', '1970-01-01 03:00:00', '', '', 'need_to_choose', '', '', '', '', '', '', '', '', 3556, '\r\n                   #3556: Автор  Иванов                  ', 'unpaid', 0, '', 'project', '2018Aug15', 1, '', ''),
(432, '3566', '28.08.2018 08:49:30', '', 'false', 'New orer', '432-New-orer.html', '', 'АПП (Автоматизация производственных процессов)', 'false', 'true', '', '', '', '', 123123, '', '123123', 'Аннотация', '123123', '17.08.2018 10:50', 'USD', '0', 0, 'unpaid', '3762', 'daredevilvue@gmail.com', 'vlad zakaz', 'Assigned', '2018-08-15 16:09:55', '2018-08-17 10:50:00', '1970-01-01 03:00:00', '', '', 'need_to_choose', '', '', '', '', '', '', '', '', 3556, '\r\n                   #3556: Автор  Иванов                  ', 'unpaid', 0, '', 'project', '2018Aug15', 1, '', '15.08.2018 16:32:08'),
(433, '3566', '16.08.2018 10:01:11', '', 'true', 'формування готовності майбутнього вчителя до використання здоров*язбережувальних технологій у початковій школі', '433-----------.html', '', 'Педагогика', 'false', 'false', '', 'true', '', 'true', 6, '', '100', 'Статья', '70% ', '20.08.2018 09:00', 'USD', '0', 100, 'paid', '3628', 'eeerrrrivanov@yandex.ru', 'Рома Иванов', 'Completed', '2018-08-15 21:19:14', '2018-08-20 09:00:00', '1970-01-01 03:00:00', '19.09.2018', '', 'dont_need', '', '20.08.2018 09:00', '20.08.2018 09:00', '300', '150', '', '', '', 3598, '#3598: Анна Козіна', 'unpaid', 0, '', 'project', '2018Aug15', 1, 'true', '16.08.2018 07:13:13'),
(434, '2562', '28.08.2018 09:02:09', '', 'true', 'проверка Николай', '434---.html', '', 'Анализ', 'false', 'true', '', '', '', '', 100, '', '1000', 'Доклад', '*95%* !\\\"№;%:?*()_-+=2ё', '25.08.2018 08:00', 'USD', '0', 0, 'unpaid', '3764', 'adasdasdasddsadsa@ukr.net', 'Николай Николаевич', 'Assigned', '2018-08-16 01:07:37', '2018-08-25 08:00:00', '1970-01-01 03:00:00', '', '', 'need_to_choose', '', '', '', '', '', '', '', '', 3556, '\r\n                   #3556: Автор  Иванов                  ', 'unpaid', 0, '', 'project', '2018Aug16', 1, '', '16.08.2018 12:28:54'),
(435, '2562', '17.08.2018 17:16:08', '', '', 'ЗАказ', '435--.html', '', 'АПП (Автоматизация производственных процессов)', 'false', 'true', '', 'true', '', '', 1231231, '', '123123', 'Аннотация', '1231231', '24.08.2018 18:30', 'USD', '0', 0, 'half', '3762', 'daredevilvue@gmail.com', 'vlad zakaz', 'Completed', '2018-08-17 17:12:50', '2018-08-24 18:30:00', '1970-01-01 03:00:00', '', '', 'true', '18.08.2018 10:50', '', '', '', '', '', '', '', 3648, '#3648: vlad avtor', 'unpaid', 0, '', 'project', '2018Aug17', 1, '', '17.08.2018 17:13:56'),
(436, '2562', '21.08.2018 13:41:30', '', 'true', 'Вирішити 1 задачу', '436---1-.html', '', 'Юридические дисциплины', 'false', 'true', '', 'true', '', '', 5, '', '100', 'Задачи', 'Вирішити 1 задачу. Розкрити 4 питання. Кожне питання розкрити на 1 сторінку. По суті, без зайвого, уникальность 60 ', '20.08.2018 09:00', 'USD', '0', 0, 'unpaid', '3628', 'eeerrrrivanov@yandex.ru', 'Рома Иванов', 'pending', '2018-08-17 20:32:05', '2018-08-20 09:00:00', '1970-01-01 03:00:00', '20.09.2018', '', 'dont_need', '', '20.08.2018 20:00', '20.08.2018 20:00', '', '', '', '', '', 3569, '#3569: Юлия Дубовенко', 'unpaid', 0, '', 'project', '2018Aug17', 1, '', '18.08.2018 09:51:21'),
(437, '2562', '19.08.2018 21:08:19', '', 'true', 'тест', '437--.html', '', 'Анализ', 'false', 'false', '', 'false', '', '', 1500, '', '2000', 'Доклад', '', '25.08.2018 00:00', 'USD', '0', 0, 'half', '3736', 'nikolayveronika1@ukr.net', 'заказчик Nik sadsad', 'Openproject', '2018-08-19 20:46:56', '2018-08-25 00:00:00', '1970-01-01 03:00:00', '', '', 'true', '20.08.2018 09:00', '21.08.2018 09:00', '22.08.2018 09:00', '', '', '', '', '', 0, ' ', 'unpaid', 0, '', 'project', '2018Aug19', 1, '', '30.08.2018 18:41:25'),
(438, '3566', '21.08.2018 11:13:52', '', 'true', 'Оформлення практики за спеціальністю \\\"Право\\\"', '438-----.html', '', 'Юриспруденция', 'false', 'true', 'true', 'true', '', 'true', 12, '', '400', 'Преддипломная практика', 'Комітет з питань бюджету Верховної Ради України.   Керівник практики: завідуючий секретаріатом комітету з питань бюджету Верховної Ради України, Ватульов Андрій Вікторович.                                                            Документи, які потрібні для захисту практики: 1) індивідуальний план; 2) щоденник практики; 3) звіт про результати проходження практики; 4) характеристика. ', '28.08.2018 18:00', 'USD', '0', 150, 'paid', '3753', 'ali827@ukr.net', 'Аліна Колесник ', 'pending', '2018-08-21 01:32:38', '2018-08-28 18:00:00', '1970-01-01 03:00:00', '29.09.2018', '', 'dont_need', '', '28.08.2018 18:00', '28.08.2018 18:00', '500', '500', '', '', '', 3723, '#3723: Аліна Мазур', 'unpaid', 0, '', 'project', '2018Aug21', 1, 'true', '21.08.2018 09:39:24'),
(439, '2562', '21.08.2018 11:48:52', '', '', '23121', '439-23121.html', '', 'АПП (Автоматизация производственных процессов)', 'false', 'true', '', '', '', '', 123123, '', '1322', 'Аннотация', '123123', '23.08.2018 14:30', 'USD', '0', 0, 'unpaid', '3762', 'daredevilvue@gmail.com', 'vlad zakaz', 'Cancelled', '2018-08-21 11:47:10', '2018-08-23 14:30:00', '1970-01-01 03:00:00', '', '', 'need_to_choose', '', '', '', '', '', '', '', '', 3648, '\r\n                   #3648: vlad avtor                  ', 'unpaid', 0, '', 'project', '2018Aug21', 1, '', ''),
(440, '3566', '21.08.2018 21:49:08', '', 'true', 'Господарське право як інститут приватного права', '440------.html', '', 'Юридические дисциплины', 'false', 'false', '', 'true', '', 'true', 25, '', '032455', 'Курсовая теоретическая', 'Тема 6 из методички, там есть план к курсовой Количество страниц:25-30 ', '25.08.2018 09:00', 'USD', '0', 130, 'paid_client', '3628', 'eeerrrrivanov@yandex.ru', 'Рома Иванов', 'pending', '2018-08-21 13:19:10', '2018-08-25 09:00:00', '1970-01-01 03:00:00', '25.09.2018', '', 'dont_need', '25.08.2018 10:35', '25.08.2018 09:00', '25.08.2018 09:00', '180', '', '', '', '', 3569, '#3569: Юлия Дубовенко', 'unpaid', 0, '', 'project', '2018Aug21', 1, 'true', '21.08.2018 14:40:10'),
(441, '', '', '', '', ' написание монографии по \\\"социальной философии и философии истории\\\" ', '441-------.html', '', 'Философия', 'false', 'false', '', '', '', 'true', 140, '', '800', 'Аннотация', 'Написание монографии по \\\"социальной философии и философии истории\\\" (по мотивам уже написанной кандидатской (нужно осовременить, освежить тему, план, добавить литературы). грубо говоря, нужно обновить план и провести \\\"косметику\\\" по тексту, чтобы он полностью не повторял текст диссертации (обновить выводы, добавить несколько авторов/литературы). Тема монографии должна быть лаконичная и короткая. Т.е. тему нужно переформулировать ', '13.09.2018 20:00', 'USD', '0', 0, 'unpaid', '3577', 'pel-irina@ukr.net', 'Ирина Пелехович', 'Openproject', '2018-08-22 09:32:45', '2018-09-13 20:00:00', '1970-01-01 03:00:00', '', '', 'need_to_choose', '', '', '', '1500', '', '', '', '', 0, '', 'unpaid', 0, '', 'project', '2018Aug22', 1, 'true', '30.08.2018 23:43:28'),
(442, '2562', '27.08.2018 23:29:05', '', 'false', '11', '442-11.html', '', 'Банкротство', 'false', 'false', '', '', '', '', 1, '', '100', 'Аннотация', '10', '24.08.2018 10:00', 'USD', '0', 0, 'unpaid', '3556', 'legko_v_onua@mail.ru', 'Автор  Иванов', 'Assigned', '2018-08-22 09:59:11', '2018-08-24 10:00:00', '1970-01-01 03:00:00', '', '', 'need_to_choose', '', '', '', '', '', '', '', '', 3737, '\r\n                   #3737: автор Nik aasdasd               ', 'unpaid', 0, '', 'project', '2018Aug22', 1, '', ''),
(443, '3548', '22.08.2018 11:28:29', '', '', '\\\"тест заказа\\\"', '443---.html', '', 'Анализ', 'false', 'true', '', '', '', '', 30, '', '100', 'Бакалаврская', '\\\"тест кавычек\\\"', '31.08.2018 10:00', 'USD', '0', 0, 'unpaid', '3762', 'daredevilvue@gmail.com', 'vlad zakaz', 'Cancelled', '2018-08-22 10:44:22', '2018-08-31 10:00:00', '1970-01-01 03:00:00', '', '', 'need_to_choose', '', '', '', '', '', '', '', '', 3648, '\r\n                   #3648: vlad avtor                  ', 'unpaid', 0, '', 'project', '2018Aug22', 1, '', ''),
(444, '3566', '28.08.2018 08:47:44', '', 'false', 'куцкцук', '444---.html', '', 'АПП (Автоматизация производственных процессов)', 'false', 'true', '', '', '', '', 123123, '', '123123', 'Аннотация', '1231231', '31.08.2018 11:35', 'USD', '0', 0, 'unpaid', '3648', 'youvovas@gmail.com', 'vlad avtor', 'Assigned', '2018-08-22 11:42:19', '2018-08-31 11:35:00', '1970-01-01 03:00:00', '', '', 'need_to_choose', '', '', '', '', '', '', '', '', 3556, '\r\n                   #3556: Автор  Иванов                  ', 'unpaid', 0, '', 'project', '2018Aug22', 1, '', ''),
(445, '3566', '28.08.2018 08:48:40', '', 'false', '12312', '445-12312.html', '', 'АПП (Автоматизация производственных процессов)', 'false', 'true', '', '', '', '', 123123, '', '12312', 'Аннотация', '3123123', '24.08.2018 14:50', 'USD', '0', 0, 'unpaid', '3769', 'youvovas@gmail.comA', '123123 123123', 'Assigned', '2018-08-22 12:53:20', '2018-08-24 14:50:00', '1970-01-01 03:00:00', '', '', 'need_to_choose', '', '', '', '', '', '', '', '', 3556, '\r\n                   #3556: Автор  Иванов                  ', 'unpaid', 0, '', 'project', '2018Aug22', 1, '', ''),
(446, '2562', '27.08.2018 23:28:47', '', 'false', '123123', '446-123123.html', '', 'АПП (Автоматизация производственных процессов)', 'false', 'false', '', '', '', '', 123123, '', '3211', 'Аннотация', '123123123', '24.08.2018 10:35', 'USD', '0', 0, 'unpaid', '3770', '123123@ewqe123', '123123 123123', 'Assigned', '2018-08-22 13:31:24', '2018-08-24 10:35:00', '1970-01-01 03:00:00', '', '', 'need_to_choose', '', '', '', '', '', '', '', '', 3737, '\r\n                   #3737: автор Nik aasdasd               ', 'unpaid', 0, '', 'project', '2018Aug22', 1, '', ''),
(447, '2562', '27.08.2018 23:28:28', '', 'false', '123123', '447-123123.html', '', 'АПП (Автоматизация производственных процессов)', 'false', 'false', '', '', '', '', 1231231, '', '123123', 'Аннотация', '1231231', '23.08.2018 14:35', 'USD', '0', 0, 'unpaid', '3771', 'sadja@gmail.com', '123123 123123', 'Assigned', '2018-08-22 13:36:04', '2018-08-23 14:35:00', '1970-01-01 03:00:00', '', '', 'need_to_choose', '', '', '', '', '', '', '', '', 3737, '\r\n                   #3737: автор Nik aasdasd               ', 'unpaid', 0, '', 'project', '2018Aug22', 1, '', ''),
(448, '3566', '28.08.2018 08:46:50', '', 'false', 'Тест заказа', '448--.html', '', 'АПП (Автоматизация производственных процессов)', 'false', 'true', '', '', '', '', 50, '', '456', 'Аннотация', 'Пожелания', '31.08.2018 09:00', 'USD', '0', 0, 'unpaid', '3762', 'daredevilvue@gmail.com', 'vlad zakaz', 'Assigned', '2018-08-22 15:00:16', '2018-08-31 09:00:00', '1970-01-01 03:00:00', '', '', 'need_to_choose', '', '', '', '', '', '', '', '', 3556, '\r\n                   #3556: Автор  Иванов                  ', 'unpaid', 0, '', 'project', '2018Aug22', 1, '', ''),
(449, '2562', '27.08.2018 23:30:11', '', 'false', 'тест', '449--.html', '', 'АПП (Автоматизация производственных процессов)', 'false', 'false', 'false', '', '', '', 10, '', '10', 'Аннотация', '', '23.08.2018 09:00', 'USD', '0', 0, 'paid', '3628', 'eeerrrrivanov@yandex.ru', 'Рома Иванов', 'Revision', '2018-08-22 15:05:40', '2018-08-23 09:00:00', '1970-01-01 03:00:00', '28.09.2018', '', 'need_to_choose', '', '', '', '', '', '', '', '', 3737, '\r\n                   #3737: автор Nik aasdasd               ', 'unpaid', 0, '', 'project', '2018Aug22', 1, '', ''),
(450, '3566', '28.08.2018 08:46:42', '', 'false', 'тест заказа с сайта', '450----.html', '', 'АПП (Автоматизация производственных процессов)', 'false', 'true', '', '', '', '', 12, '', '200', 'Аннотация', '', '29.08.2018 09:00', 'USD', '0', 0, 'unpaid', '3762', 'daredevilvue@gmail.com', 'vlad zakaz', 'Assigned', '2018-08-22 15:06:42', '2018-08-29 09:00:00', '1970-01-01 03:00:00', '', '', 'need_to_choose', '', '', '', '', '', '', '', '', 3556, '\r\n                   #3556: Автор  Иванов                  ', 'unpaid', 0, '', 'project', '2018Aug22', 1, '', ''),
(451, '3566', '28.08.2018 08:46:33', '', 'false', 'Новый тест 22,08,2018', '451---22-08-2018.html', '', 'АПП (Автоматизация производственных процессов)', 'false', 'true', '', '', '', '', 12, '', '520', 'Аннотация', '', '28.08.2018 09:00', 'USD', '0', 0, 'unpaid', '3762', 'daredevilvue@gmail.com', 'vlad zakaz', 'Assigned', '2018-08-22 15:14:34', '2018-08-28 09:00:00', '1970-01-01 03:00:00', '', '', 'need_to_choose', '', '', '', '', '', '', '', '', 3556, '\r\n                   #3556: Автор  Иванов                  ', 'unpaid', 0, '', 'project', '2018Aug22', 1, '', ''),
(452, '2562', '27.08.2018 23:28:06', '', 'false', '12312312', '452-12312312.html', '', 'АПП (Автоматизация производственных процессов)', 'false', 'false', '', '', '', '', 66, '', '97987', 'Аннотация', '', '24.08.2018 11:55', 'USD', '0', 0, 'unpaid', '3772', '6666@gmail.com', '1231231 123123', 'Assigned', '2018-08-22 16:03:50', '2018-08-24 11:55:00', '1970-01-01 03:00:00', '', '', 'need_to_choose', '', '', '', '', '', '', '', '', 3737, '\r\n                   #3737: автор Nik aasdasd               ', 'unpaid', 0, '', 'project', '2018Aug22', 1, '', ''),
(453, '', '', '', '', 'qweqwe', '453-qweqwe.html', '', 'АПП (Автоматизация производственных процессов)', 'false', '', '', '', '', '', 1231, '', '123123', 'Аннотация', '123123', '23.08.2018 10:15', 'USD', '0', 0, 'half', '3772', '6666@gmail.com', '1231231 123123', 'Archived', '2018-08-22 16:05:29', '2018-08-23 10:15:00', '1970-01-01 03:00:00', '', '', 'need_to_choose', '', '', '', '', '', '', '', '', 0, '', 'unpaid', 0, '', 'project', '2018Aug22', 1, '', ''),
(454, '3566', '28.08.2018 08:46:24', '', 'false', '\\\"ТЕСТ!\\\"', '454--.html', '', 'АПП (Автоматизация производственных процессов)', 'false', 'true', '', '', '', '', 10, '', '4', 'Аннотация', '', '23.08.2018 05:05', 'USD', '0', 0, 'unpaid', '3628', 'eeerrrrivanov@yandex.ru', 'Рома Иванов', 'Assigned', '2018-08-22 22:31:42', '2018-08-23 05:05:00', '1970-01-01 03:00:00', '', '', 'need_to_choose', '', '', '', '', '', '', '', '', 3556, '\r\n                   #3556: Автор  Иванов                  ', 'unpaid', 0, '', 'project', '2018Aug22', 1, '', '22.08.2018 23:02:14'),
(455, '2562', '23.08.2018 15:49:47', '', 'false', '123123', '455-123123.html', '', 'АПП (Автоматизация производственных процессов)', 'false', 'true', '', 'true', 'true', '', 123123, '', '12312313', 'Аннотация', '', '23.08.2018 11:35', 'USD', '0', 0, 'paid', '3774', 'email@mail.ru', 'sdsdsd sdsdsds', 'Assigned', '2018-08-23 11:00:15', '2018-08-23 11:35:00', '1970-01-01 03:00:00', '', '', 'true', '', '24.08.2018 10:50', '24.08.2018 14:50', '', '', '', '', '', 3648, '\r\n                   #3648: vlad avtor                  ', 'unpaid', 0, '', 'project', '2018Aug23', 1, '', ''),
(456, '3566', '28.08.2018 08:46:09', '', 'false', '123123', '456-123123.html', '', 'АПП (Автоматизация производственных процессов)', 'false', 'true', '', '', '', '', 12312, '', '123132', 'Аннотация', '123123', '24.08.2018 14:55', 'USD', '0', 0, 'unpaid', '3770', '123123@ewqe123', '123123 123123', 'Assigned', '2018-08-23 11:21:20', '2018-08-24 14:55:00', '1970-01-01 03:00:00', '', '', 'need_to_choose', '', '', '', '', '', '', '', '', 3556, '\r\n                   #3556: Автор  Иванов                  ', 'unpaid', 0, '', 'project', '2018Aug23', 1, '', ''),
(457, '3566', '28.08.2018 08:46:00', '', 'false', '3123123', '457-3123123.html', '', 'АПП (Автоматизация производственных процессов)', 'false', 'true', '', '', '', '', 123123, '', '123123', 'Аннотация', '1231231', '24.08.2018 11:35', 'USD', '0', 0, 'unpaid', '3770', '123123@ewqe123', '123123 123123', 'Assigned', '2018-08-23 11:22:21', '2018-08-24 11:35:00', '1970-01-01 03:00:00', '', '', 'need_to_choose', '', '', '', '', '', '', '', '', 3556, '\r\n                   #3556: Автор  Иванов                  ', 'unpaid', 0, '', 'project', '2018Aug23', 1, '', ''),
(458, '3566', '28.08.2018 08:45:49', '', 'false', '123312', '458-123312.html', '', 'АПП (Автоматизация производственных процессов)', 'false', 'true', '', '', '', '', 123123, '', '123123', 'Аннотация', '123123', '31.08.2018 11:35', 'USD', '0', 0, 'unpaid', '3775', 'vas@gmail.com', '123123 123123', 'Assigned', '2018-08-23 11:30:53', '2018-08-31 11:35:00', '1970-01-01 03:00:00', '', '', 'need_to_choose', '', '', '', '', '', '', '', '', 3556, '\r\n                   #3556: Автор  Иванов                  ', 'unpaid', 0, '', 'project', '2018Aug23', 1, '', ''),
(459, '3566', '28.08.2018 08:45:36', '', 'false', '213', '459-213.html', '', 'АПП (Автоматизация производственных процессов)', 'false', 'true', '', '', '', '', 1234423, '', '12341234', 'Аннотация', '12341234', '24.08.2018 10:30', 'USD', '0', 0, 'unpaid', '3776', 'va2s@gmail.com', 'qweqwe qweqwe', 'Assigned', '2018-08-23 11:32:27', '2018-08-24 10:30:00', '1970-01-01 03:00:00', '', '', 'need_to_choose', '', '', '', '', '', '', '', '', 3556, '\r\n                   #3556: Автор  Иванов                  ', 'unpaid', 0, '', 'project', '2018Aug23', 1, '', ''),
(460, '2562', '30.08.2018 19:21:01', '', 'false', '123123', '460-123123.html', '', 'АПП (Автоматизация производственных процессов)', 'false', 'false', '', '', '', '', 123123, '', '321123', 'Аннотация', '13123123', '31.08.2018 11:55', 'USD', '0', 0, 'unpaid', '3776', 'va2s@gmail.com', 'qweqwe qweqwe', 'Assigned', '2018-08-23 11:32:55', '2018-08-31 11:55:00', '1970-01-01 03:00:00', '', '', 'need_to_choose', '', '', '', '', '', '', '', '', 3597, '\r\n                   #3597: Тест  Тест 2                   ', 'unpaid', 0, '', 'project', '2018Aug23', 1, '', ''),
(461, '2562', '27.08.2018 23:29:56', '', 'false', '123123', '461-123123.html', '', 'АПП (Автоматизация производственных процессов)', 'false', 'false', '', '', '', '', 123123, '', '123123', 'Аннотация', '123123', '24.08.2018 07:15', 'USD', '0', 0, 'unpaid', '3776', 'va2s@gmail.com', 'qweqwe qweqwe', 'Assigned', '2018-08-23 11:37:30', '2018-08-24 07:15:00', '1970-01-01 03:00:00', '', '', 'need_to_choose', '', '', '', '', '', '', '', '', 3737, '\r\n                   #3737: автор Nik aasdasd               ', 'unpaid', 0, '', 'project', '2018Aug23', 1, '', '27.08.2018 13:22:28'),
(462, '2562', '27.08.2018 23:27:47', '', 'false', '111', '462-312312.html', '', '1111', 'false', 'false', '', '', '', '', 12312, '', '123123', 'Аннотация', '123123', '24.08.2018 11:30', 'USD', NULL, 0, 'unpaid', '3776', 'va2s@gmail.com', 'qweqwe qweqwe', 'Assigned', '2018-08-23 11:44:04', '2018-08-24 11:30:00', '1970-01-01 03:00:00', '', '', 'need_to_choose', '', '', '', '', '', '', '', '', 3737, '\r\n                   #3737: автор Nik aasdasd               ', 'unpaid', 0, '', 'project', '2018Aug23', 1, '', ''),
(463, '2562', '23.08.2018 15:43:16', '', 'false', '123123', '463-123123.html', '', 'АПП (Автоматизация производственных процессов)', 'false', 'true', '', '', '', '', 0, '', '123123', 'Аннотация', '123123', '23.08.2018 11:55', 'USD', NULL, 0, 'unpaid', '3777', 'vovas@gmail.com', '123123 123123', 'Assigned', '2018-08-23 11:45:02', '2018-08-23 11:55:00', '1970-01-01 03:00:00', '', '', 'need_to_choose', '', '', '', '', '', '', '', '', 3648, '\r\n                   #3648: vlad avtor                  ', 'unpaid', 0, '', 'project', '2018Aug23', 1, '', ''),
(464, '3566', '23.08.2018 17:55:17', '', 'true', 'The impact of the shadow economy on taxation', '464-The-impact-of-the-shadow-economy-on-taxation.html', '', 'Английский язык', 'false', 'false', '', 'true', '', 'true', 40, '', '2434116', 'Магистерская', '	18000 слов не включая литературу и приложенияНА АНГЛИЙСКОМ ЯЗЫКЕ\r\n\r\nэкономическая дисциплина\r\nметодичка есть\r\nплана нет, нужно утвердить\r\n\r\nвсе требования в файлах', '25.09.2018 09:00', 'USD', NULL, 500, 'unpaid', '3628', 'eeerrrrivanov@yandex.ru', 'Рома Иванов', 'Assigned', '2018-08-23 13:42:53', '2018-09-10 09:00:00', '1970-01-01 03:00:00', '', '', 'various', '24.08.2018 09:00', '31.08.2018 09:00', '25.09.2018 09:00', '', '', '', '', '', 3766, '#3766: Алена Юркив', 'unpaid', 0, '', 'project', '2018Aug23', 1, 'true', '23.08.2018 16:38:04'),
(465, '', '', '', '', 'Діяльність Міжнародного Комітету Червоного Хреста з захисту біженців та внутрішньо переміщених осіб ', '465----------.html', '', 'Юридические дисциплины', 'false', '', '', '', '', 'true', 100, '', '500', 'Магистерская', 'Подробные требования в приложенной мной методичке. Вот часть из них: \r\n\r\nОбсяг магістерської роботи повинен становити 90-100 сторінок тексту, набраного на комп’ютері (кегль 14) через 1,5 інтервали. Список використаної літератури з посиланнями у магістерській роботі повинен складатися з 80-100 першоджерел.\r\n\r\nДрукування тексту – за допомогою комп’ютера здійснюється че¬рез 1,5 міжрядкових інтервали, 14 кегль, шрифт Times New Roman.\r\nПоля:\r\nзліва – 30 мм;\r\nправоруч – 10-15 мм;\r\nвгорі і знизу – 20 мм;\r\nвід краю до верхнього колонтитула – 20 мм;\r\nвід краю до нижнього колонтитула – 20 мм.\r\nЗаголовки розділів пишуть по центру симетрично тексту велики¬ми літерами.\r\n\r\nЗаголовки підрозділів – по центру симетрично тексту малими лі¬терами (крім першої-). Переноси слів у заголовках не допускаються. Крапку в кінці заголовка не ставлять. Якщо заголовок складається з\r\n2-х або більше речень, їх відділяють крапкою. Відстань між заголовком та текстом – 2 інтервали. Заголовки підкреслювати не рекомендується. Кожний розділ слід починати з нового аркуша (сторінки). Підрозділи починають з відступом від попереднього тексту на 1 інтервал на тій самій сторінці.\r\nНумерація\r\nСторінки кваліфікаційної роботи нумерують арабськими цифрами, але на титульному аркуші, на аркуші зі змістом роботи за додатках но¬мер не ставлять. Нумерація починається з 3-го аркушу (Вступ). На сто¬рінках номер ставлять у правому верхньому куті.\r\n\r\n\r\nЧТО ТРЕБУЕТСЯ:\r\nНа основание дипломной работы написать магистерскую. Изменить план, к примеру, расширить план, дописав еще один раздел. Увеличить объем.\r\nДополнить выводы в конце работы. Сделать соответствующий магистерской работе список литературы.\r\n', '17.09.2018 23:55', 'USD', '0', 0, 'unpaid', '3778', 'mjthetawaves@gmail.com', 'Евгения Бабий', 'Openproject', '2018-08-24 13:11:47', '2018-09-17 23:55:00', '1970-01-01 03:00:00', '', '', 'need_to_choose', '', '', '', '700', '', '', '', '', 0, '', 'unpaid', 0, '', 'project', '2018Aug24', 1, 'true', '31.08.2018 07:40:22'),
(466, '2562', '27.08.2018 23:29:22', '', 'false', '123123123', '466-123123123.html', '', 'АПП (Автоматизация производственных процессов)', 'false', 'false', '', '', '', '', 123123, '', '1231231', 'Аннотация', '1231231', '30.08.2018 07:35', 'USD', '0', 0, 'unpaid', '3628', 'eeerrrrivanov@yandex.ru', 'Рома Иванов', 'Assigned', '2018-08-27 14:24:50', '2018-08-30 07:35:00', '1970-01-01 03:00:00', '', '', 'need_to_choose', '', '', '', '', '', '', '', '', 3737, '\r\n                   #3737: автор Nik aasdasd               ', 'unpaid', 0, '', 'project', '2018Aug27', 1, '', '27.08.2018 14:34:33'),
(467, '3566', '30.08.2018 19:07:46', '', '', 'Юридичні і економічні засади створення підприємства', '467------.html', '', 'Экономика', 'false', 'false', '', 'true', '', 'true', 50, '', '1000', 'Бакалаврская', 'є готовий план по якому можна працювати. В розділі бажано щоб ви робили аналіз по іншому підприємству ,якесь не велике ,і щоб у вас була якась інфо про те підприємсвто', '31.08.2018 10:00', 'USD', '0', 500, 'half', '3784', 'dima030696@ukr.net', 'Дмитро Кревський', 'Cancelled', '2018-08-27 16:05:56', '2018-08-31 10:00:00', '1970-01-01 03:00:00', '', '', 'dont_need', '', '30.08.2018 09:00', '31.08.2018 10:00', '1300', '650', '', '', '', 3569, '\r\n                   #3569: Юлия Дубовенко                  ', 'unpaid', 0, '', 'project', '2018Aug27', 1, 'true', '28.08.2018 14:17:48'),
(468, '2562', '27.08.2018 23:27:27', '', 'false', 'тест', '468--.html', '', 'Анатомия', 'false', 'false', '', '', '', '', 1500, '', '100', 'Доклад', '', '31.08.2018 00:00', 'USD', '0', 0, 'unpaid', '3736', 'nikolayveronika1@ukr.net', 'заказчик Nik sadsad', 'Assigned', '2018-08-27 23:07:11', '2018-08-31 00:00:00', '1970-01-01 03:00:00', '', '', 'need_to_choose', '', '', '', '', '', '', '', '', 3737, '\r\n                   #3737: автор Nik aasdasd               ', 'unpaid', 0, '', 'project', '2018Aug27', 1, '', ''),
(469, '2562', '30.08.2018 11:29:35', '', 'false', '123123', '469-123123.html', '', 'АПП (Автоматизация производственных процессов)', 'false', 'true', 'true', '', '', 'true', 123123, '', '1231', 'Аннотация', '3123123', '30.08.2018 11:55', 'USD', '0', 50, 'paid_client', '3762', 'daredevilvue@gmail.com', 'vlad zakaz', 'Assigned', '2018-08-28 09:59:17', '2018-08-30 11:55:00', '1970-01-01 03:00:00', '27.09.2018', '', 'need_to_choose', '', '', '', '', '', '', '', '100', 3648, '\r\n                   #3648: vlad avtor                  ', 'unpaid', 0, '', 'project', '2018Aug28', 1, 'true', '29.08.2018 16:12:55'),
(470, '', '', '', '', 'eqweqwe', '470-eqweqwe.html', '', 'АПП (Автоматизация производственных процессов)', 'false', '', '', '', '', '', 123123, '', '123123123', 'Аннотация', '123123', '30.08.2018 14:55', 'USD', '0', 0, 'unpaid', '3762', 'daredevilvue@gmail.com', 'vlad zakaz', 'Openproject', '2018-08-28 10:50:49', '2018-08-30 14:55:00', '1970-01-01 03:00:00', '', '', 'need_to_choose', '', '', '', '', '', '', '', '', 0, '', 'unpaid', 0, '', 'project', '2018Aug28', 1, '', '28.08.2018 10:57:20'),
(471, '2562', '28.08.2018 11:01:21', '', 'false', '123123123', '471-123123123.html', '', 'АПП (Автоматизация производственных процессов)', 'false', 'true', '', '', '', '', 123123, '', '1231231', 'Аннотация', '123123123', '30.08.2018 11:55', 'USD', '0', 0, 'unpaid', '3762', 'daredevilvue@gmail.com', 'vlad zakaz', 'Assigned', '2018-08-28 11:00:56', '2018-08-30 11:55:00', '1970-01-01 03:00:00', '', '', 'need_to_choose', '', '', '', '', '', '', '', '', 3648, '\r\n                   #3648: vlad avtor                  ', 'unpaid', 0, '', 'project', '2018Aug28', 1, '', ''),
(472, '', '', '', '', '223242342', '472-223242342.html', '', 'АПП (Автоматизация производственных процессов)', 'false', '', '', '', '', '', 2342342, '', '2423423', 'Аннотация', '42342', '31.08.2018 14:55', 'USD', '0', 0, 'unpaid', '3762', 'daredevilvue@gmail.com', 'vlad zakaz', 'Openproject', '2018-08-28 11:03:34', '2018-08-31 14:55:00', '1970-01-01 03:00:00', '', '', 'need_to_choose', '', '', '', '', '', '', '', '', 0, '', 'unpaid', 0, '', 'project', '2018Aug28', 1, '', '28.08.2018 11:31:51'),
(473, '', '', '', '', '1231231', '473-1231231.html', '', 'АПП (Автоматизация производственных процессов)', 'false', '', '', '', '', '', 123123, '', '123213', 'Аннотация', '123123', '30.08.2018 15:55', 'USD', '0', 0, 'unpaid', '3762', 'daredevilvue@gmail.com', 'vlad zakaz', 'Openproject', '2018-08-28 11:50:17', '2018-08-30 15:55:00', '1970-01-01 03:00:00', '', '', 'need_to_choose', '', '', '', '', '', '', '', '', 0, '', 'unpaid', 0, '', 'project', '2018Aug28', 1, '', ''),
(474, '', '', '', '', '32131231', '474-32131231.html', '', 'АПП (Автоматизация производственных процессов)', 'false', 'false', '', '', '', '', 123123, '', '12312312', 'Аннотация', '3123123', '31.08.2018 11:55', 'USD', '0', 0, 'unpaid', '3786', 'dasdas@gmail.com', '3123123 1231231', 'Openproject', '2018-08-28 12:20:24', '2018-08-31 11:55:00', '1970-01-01 03:00:00', '', '', 'need_to_choose', '', '', '', '', '', '', '', '', 0, '', 'unpaid', 0, '', 'project', '2018Aug28', 1, '', ''),
(475, '', '', '', '', 'Новый заказ', '475--.html', '', 'АПП (Автоматизация производственных процессов)', 'false', 'false', '', '', '', '', 100, '', '1000', 'Аннотация', '12312313', '30.08.2018 14:55', 'USD', '0', 0, 'unpaid', '3787', 'vladimir@gmail.com', 'saSDSAD qweqwe', 'Openproject', '2018-08-28 12:48:00', '2018-08-30 14:55:00', '1970-01-01 03:00:00', '', '', 'need_to_choose', '', '', '', '', '', '', '', '', 0, '', 'unpaid', 0, '', 'project', '2018Aug28', 1, '', ''),
(476, '', '', '', '', '1231231', '476-1231231.html', '', 'АПП (Автоматизация производственных процессов)', 'false', '', '', '', '', '', 123123, '', '123123', 'Аннотация', '12313', '31.08.2018 19:55', 'USD', '0', 0, 'unpaid', '3762', 'daredevilvue@gmail.com', 'vlad zakaz', 'Openproject', '2018-08-28 12:49:19', '2018-08-31 19:55:00', '1970-01-01 03:00:00', '', '', 'need_to_choose', '', '', '', '', '', '', '', '', 0, '', 'unpaid', 0, '', 'project', '2018Aug28', 1, '', ''),
(477, '', '', '', '', 'qeqweqw', '477-qeqweqw.html', '', 'АПП (Автоматизация производственных процессов)', 'false', 'false', '', '', '', '', 123123, '', '12312312', 'Аннотация', '123123123', '31.08.2018 15:55', 'USD', '0', 0, 'unpaid', '3788', 'dimir@gmail.com', 'asdasd asdasd', 'Openproject', '2018-08-28 13:00:23', '2018-08-31 15:55:00', '1970-01-01 03:00:00', '', '', 'need_to_choose', '', '', '', '', '', '', '', '', 0, '', 'unpaid', 0, '', 'project', '2018Aug28', 1, '', ''),
(478, '', '', '', '', '234234234', '478-234234234.html', '', 'АПП (Автоматизация производственных процессов)', 'false', 'false', '', '', '', '', 1231231, '', '234234', 'Аннотация', '234234234', '31.08.2018 15:55', 'USD', '0', 0, 'unpaid', '3789', 'imir@gmail.com', '1231231 123123', 'Openproject', '2018-08-28 13:08:13', '2018-08-31 15:55:00', '1970-01-01 03:00:00', '', '', 'need_to_choose', '', '', '', '', '', '', '', '', 0, '', 'unpaid', 0, '', 'project', '2018Aug28', 1, '', ''),
(479, '', '', '', '', '1231231', '479-1231231.html', '', 'АПП (Автоматизация производственных процессов)', 'false', 'false', '', '', '', '', 231231, '', '123123', 'Аннотация', '1231231', '31.08.2018 11:35', 'USD', '0', 0, 'unpaid', '3790', 'ir@gmail.com', '1 2', 'Openproject', '2018-08-28 13:17:33', '2018-08-31 11:35:00', '1970-01-01 03:00:00', '', '', 'need_to_choose', '', '', '', '', '', '', '', '', 0, '', 'unpaid', 0, '', 'project', '2018Aug28', 1, '', ''),
(480, '', '', '', '', '312312312', '480-312312312.html', '', 'АПП (Автоматизация производственных процессов)', 'false', 'false', '', '', '', '', 3123, '', '1231231', 'Аннотация', '123123', '01.09.2018 13:55', 'USD', '0', 0, 'unpaid', '3791', 'adimir@gmail.com', 'asdasdas qweqweqwe', 'Openproject', '2018-08-28 13:18:48', '2018-09-01 13:55:00', '1970-01-01 03:00:00', '', '', 'need_to_choose', '', '', '', '', '', '', '', '', 0, '', 'unpaid', 0, '', 'project', '2018Aug28', 1, '', '28.08.2018 13:19:55'),
(481, '', '', '', '', '123123', '481-123123.html', '', 'АПП (Автоматизация производственных процессов)', 'false', 'false', '', '', '', '', 123123, '', '123123', 'Аннотация', '12312312', '01.09.2018 11:15', 'USD', '0', 0, 'unpaid', '3792', 'n.vladimir@gmail.com', '123123 123123', 'Openproject', '2018-08-28 13:20:04', '2018-09-01 11:15:00', '1970-01-01 03:00:00', '', '', 'need_to_choose', '', '', '', '', '', '', '', '', 0, '', 'unpaid', 0, '', 'project', '2018Aug28', 1, '', '29.08.2018 09:18:32'),
(482, '', '', '', '', 'Asd', '482-Asd.html', '', 'Анализ', 'false', 'false', '', '', '', 'true', 12, '', '123', 'Диплом', 'Dgg', '31.08.2018 19:55', 'USD', '0', 0, 'unpaid', '3793', 'Asd@mail.com', 'Dgg Fhv', 'Openproject', '2018-08-28 14:30:10', '2018-08-31 19:55:00', '1970-01-01 03:00:00', '', '', 'need_to_choose', '', '', '', '100', '', '', '', '', 0, '', 'unpaid', 0, '', 'project', '2018Aug28', 1, 'true', '29.08.2018 12:58:05'),
(483, '', '', '', '', '8798', '483-8798.html', '', 'АПП (Автоматизация производственных процессов)', 'false', 'false', '', '', '', 'true', 12312, '', '123123', 'Аннотация', '', '31.08.2018 18:55', 'USD', '0', 0, 'unpaid', '3794', '123123@gmail.com', '12312 123123', 'Openproject', '2018-08-28 14:32:22', '2018-08-31 18:55:00', '1970-01-01 03:00:00', '', '', 'need_to_choose', '', '', '', '2', '', '', '', '', 0, '', 'unpaid', 0, '', 'project', '2018Aug28', 1, 'true', ''),
(484, '', '', '', '', 'Asd', '484-Asd.html', '', 'АПП (Автоматизация производственных процессов)', 'false', '', '', '', '', 'true', 122, '', '123', 'Аннотация', 'Asd', '31.08.2018 23:55', 'USD', '0', 0, 'unpaid', '3793', 'Asd@mail.com', 'Dgg Fhv', 'Openproject', '2018-08-28 14:34:39', '2018-08-31 23:55:00', '1970-01-01 03:00:00', '', '', 'need_to_choose', '', '', '', '100', '', '', '', '', 0, '', 'unpaid', 0, '', 'project', '2018Aug28', 1, 'true', '29.08.2018 12:31:35'),
(485, '', '', '', '', '2222', '485-2222.html', '', 'АПП (Автоматизация производственных процессов)', 'false', '', '', '', '', '', 2222, '', '2222', 'Аннотация', '2222', '30.08.2018 10:35', 'USD', '0', 0, 'unpaid', '3762', 'daredevilvue@gmail.com', 'vlad zakaz', 'Openproject', '2018-08-29 12:30:26', '2018-08-30 10:35:00', '1970-01-01 03:00:00', '', '', 'need_to_choose', '', '', '', '', '', '', '', '', 0, '', 'unpaid', 0, '', 'project', '2018Aug29', 1, '', '29.08.2018 12:47:39'),
(486, '', '', '', '', '213123', '486-213123.html', '', 'АПП (Автоматизация производственных процессов)', 'false', '', '', '', '', '', 123123, '', '23123', 'Аннотация', '31231', '30.08.2018 15:35', 'USD', '0', 0, 'unpaid', '3762', 'daredevilvue@gmail.com', 'vlad zakaz', 'Openproject', '2018-08-29 13:00:36', '2018-08-30 15:35:00', '1970-01-01 03:00:00', '', '', 'need_to_choose', '', '', '', '', '', '', '', '', 0, '', 'unpaid', 0, '', 'project', '2018Aug29', 1, '', '30.08.2018 18:51:55'),
(487, '', '', '', '', 'тест 30', '487--30.html', '', 'АПП (Автоматизация производственных процессов)', 'false', '', '', '', '', '', 2, '', '100', 'Аннотация', '', '01.09.2018 09:00', 'USD', '0', 0, 'unpaid', '3628', 'eeerrrrivanov@yandex.ru', 'Рома Иванов', 'Openproject', '2018-08-29 13:08:42', '2018-09-01 09:00:00', '1970-01-01 03:00:00', '', '', 'need_to_choose', '', '', '', '', '', '', '', '', 0, '', 'unpaid', 0, '', 'project', '2018Aug29', 1, '', '29.08.2018 16:07:23'),
(488, '', '', '', '', 'тест 22', '488--22.html', '', 'АПП (Автоматизация производственных процессов)', 'false', '', '', '', '', '', 10, '', '100', 'Аннотация', '', '31.08.2018 13:00', 'USD', '0', 0, 'unpaid', '3628', 'eeerrrrivanov@yandex.ru', 'Рома Иванов', 'Openproject', '2018-08-29 13:22:40', '2018-08-31 13:00:00', '1970-01-01 03:00:00', '', '', 'need_to_choose', '', '', '', '', '', '', '', '', 0, '', 'unpaid', 0, '', 'project', '2018Aug29', 1, '', '29.08.2018 13:27:59'),
(489, '', '', '', '', '1111', '489-1111.html', '', 'АПП (Автоматизация производственных процессов)', 'false', '', '', '', '', '', 1111, '', '123123', 'Аннотация', '12312312', '31.08.2018 13:50', 'USD', '0', 0, 'unpaid', '3762', 'daredevilvue@gmail.com', 'vlad zakaz', 'Openproject', '2018-08-29 13:31:00', '2018-08-31 13:50:00', '1970-01-01 03:00:00', '', '', 'need_to_choose', '', '', '', '', '', '', '', '', 0, '', 'unpaid', 0, '', 'project', '2018Aug29', 1, '', '30.08.2018 15:07:08'),
(490, '3566', '29.08.2018 20:39:34', '', 'true', 'Правове регулювання майнового оподаткування ', '490-----.html', '', 'Юридические дисциплины', 'false', 'false', '', 'true', '', 'true', 50, '', '132471', 'Курсовая теоретическая', 'План\r\nВСТУП\r\nРОЗДІЛ 1 ТЕОРЕТИКО-ПРАВОВІ ЗАСАДИ МАЙНОВОГО ОПОДАТКУВАННЯ В УКРАЇНІ\r\n1.1 Сутність та значення майнового оподаткування\r\n1.2 Механізм оподаткування майна та його складові\r\n1.3 Нормативно-правове забезпечення функціонування майнового оподаткування в Україні\r\nРОЗДІЛ 2 ЗАГАЛЬНА ХАРАКТЕРИСТИКА ПРАВОВОГО РЕГУЛЮВАННЯ МАЙНОВОГО ОПОДАТКУВАННЯ\r\n2.1 Податок на нерухоме майно, відмінне від земельної ділянки\r\n2.2 Транспортний податок\r\n2.3 Податок на землю\r\nРОЗДІЛ 3 НАПРЯМИ УДОСКОНАЛЕННЯ ПРАВОВОГО РЕГУЛЮВАННЯ МАЙНОВОГО ОПОДАТКУВАННЯ В УКРАЇНІ НА ОСНОВІ ЗАРУБІЖНОГО ДОСВІДУ\r\n3.1 Зарубіжний досвід у сфері майнового оподаткування\r\n3.2 Проблеми та шляхи вдосконалення механізму правового регулювання майнового оподаткування в Україні. Світовий досвід\r\nВИСНОВКИ\r\nСПИСОК ВИКОРИСТАНИХ ДЖЕРЕЛ', '02.09.2018 09:00', 'USD', '0', 180, 'paid_client', '3628', 'eeerrrrivanov@yandex.ru', 'Рома Иванов', 'Assigned', '2018-08-29 15:01:00', '2018-09-02 09:00:00', '1970-01-01 03:00:00', '', '', 'dont_need', '', '03.09.2018 20:00', '03.09.2018 20:00', '', '', '', '', '', 3562, '#3562: Оксана Теленик', 'unpaid', 0, '', 'project', '2018Aug29', 1, 'true', '29.08.2018 20:00:57'),
(491, '', '', '', '', 'new ', '491-new-.html', '', 'АПП (Автоматизация производственных процессов)', 'false', '', '', '', '', '', 31231231, '', '123123', 'Аннотация', '123123', '31.08.2018 15:35', 'USD', '0', 0, 'unpaid', '3762', 'daredevilvue@gmail.com', 'vlad zakaz', 'Openproject', '2018-08-29 16:21:18', '2018-08-31 15:35:00', '1970-01-01 03:00:00', '', '', 'need_to_choose', '', '', '', '', '', '', '', '', 0, '', 'unpaid', 0, '', 'project', '2018Aug29', 1, '', '30.08.2018 14:53:55'),
(492, '', '', '', '', '123123', '492-123123.html', '', 'АПП (Автоматизация производственных процессов)', 'false', '', '', '', '', '', 123123, '', '13212', 'Аннотация', '1231233', '01.09.2018 19:55', 'USD', '0', 0, 'unpaid', '3762', 'daredevilvue@gmail.com', 'vlad zakaz', 'Openproject', '2018-08-29 17:46:39', '2018-09-01 19:55:00', '1970-01-01 03:00:00', '', '', 'need_to_choose', '', '', '', '', '', '', '', '', 0, '', 'unpaid', 0, '', 'project', '2018Aug29', 1, '', '30.08.2018 13:23:41'),
(493, '3559', '29.08.2018 22:34:56', '', 'false', 'Тестовый Заказ VV', '493---VV.html', '', 'АПП (Автоматизация производственных процессов)', 'false', 'false', '', '', '', '', 123, '', '1000', 'Аннотация', '', '24.11.2018 15:25', 'USD', '0', 0, 'unpaid', '3645', 'volderam@yandex.ua', 'John Doe', 'Assigned', '2018-08-29 22:30:22', '2018-11-24 15:25:00', '1970-01-01 03:00:00', '', '', 'false', '', '', '', '', '', '', '', '', 3646, '\r\n                   #3646: Jane Doe                  ', 'unpaid', 0, '', 'project', '2018Aug29', 1, '', ''),
(494, '2562', '30.08.2018 11:45:08', '', 'false', 'Тема работы', '494--.html', '', 'АПП (Автоматизация производственных процессов)', 'false', 'true', '', '', '', '', 12, '', '10000', 'Аннотация', '123123123', '31.08.2018 14:55', 'USD', NULL, 0, 'unpaid', '3762', 'daredevilvue@gmail.com', 'vlad zakaz', 'Assigned', '2018-08-30 10:25:01', '2018-08-31 14:55:00', '1970-01-01 03:00:00', '', '', 'need_to_choose', '', '', '', '', '', '', '', '', 3648, '\r\n                   #3648: vlad avtor                  ', 'unpaid', 0, '', 'project', '2018Aug30', 1, '', '30.08.2018 10:58:21'),
(495, '2562', '31.08.2018 10:35:27', '', 'true', 'Тест ставки (уведотления у автора)', '495-----.html', '', 'Административное право', 'false', 'false', '', '', '', '', 101, '', '150', 'Аннотация', 'Нет поделаний', '07.09.2018 12:00', 'USD', '0', 0, 'unpaid', '3801', 'testfour123258@gmail.com', 'Testfour Testfour', 'Assigned', '2018-08-30 12:41:15', '2018-09-07 12:00:00', '1970-01-01 03:00:00', '', '', 'need_to_choose', '', '', '', '', '', '', '', '', 3648, '\r\n                   #3648: vlad avtor                  ', 'unpaid', 0, '', 'project', '2018Aug30', 1, '', '30.08.2018 23:44:22'),
(496, '', '', '', '', '123123', '496-123123.html', '', 'АПП (Автоматизация производственных процессов)', 'false', '', '', '', '', '', 1231231, '', '123123', 'Аннотация', '123123', '31.08.2018 16:15', 'USD', '0', 0, 'unpaid', '3762', 'daredevilvue@gmail.com', 'vlad zakaz', 'Openproject', '2018-08-30 16:02:05', '2018-08-31 16:15:00', '1970-01-01 03:00:00', '', '', 'need_to_choose', '', '', '', '', '', '', '', '', 0, '', 'unpaid', 0, '', 'project', '2018Aug30', 1, '', ''),
(497, '', '', '', '', '1231231', '497-1231231.html', '', 'АПП (Автоматизация производственных процессов)', 'false', 'false', '', '', '', '', 123123, '', '123123', 'Аннотация', '123123', '08.09.2018 19:55', 'USD', '0', 0, 'unpaid', '3762', 'daredevilvue@gmail.com', 'vlad zakaz', 'Openproject', '2018-08-30 16:08:07', '2018-09-08 19:55:00', '1970-01-01 03:00:00', '', '', 'need_to_choose', '', '', '', '', '', '', '', '', 0, '', 'unpaid', 0, '', 'project', '2018Aug30', 1, '', ''),
(498, '', '', '', '', '123123', '498-123123.html', '', 'АПП (Автоматизация производственных процессов)', 'false', 'false', '', '', '', '', 1231231, '', '123123', 'Аннотация', '1233123', '01.09.2018 11:15', 'USD', '0', 0, 'unpaid', '3762', 'daredevilvue@gmail.com', 'vlad zakaz', 'Openproject', '2018-08-30 16:08:46', '2018-09-01 11:15:00', '1970-01-01 03:00:00', '', '', 'need_to_choose', '', '', '', '', '', '', '', '', 0, '', 'unpaid', 0, '', 'project', '2018Aug30', 1, '', '30.08.2018 17:59:54'),
(499, '3566', '30.08.2018 20:30:00', '', 'true', 'практика юридическая клиника ( отчет и дневник)', '499------.html', '', 'Юридические дисциплины', 'false', 'false', '', 'true', '', 'true', 30, '', '200', 'Преддипломная практика', 'срок прохождения 3 недели ', '03.09.2018 09:00', 'USD', NULL, 150, 'half', '3628', 'eeerrrrivanov@yandex.ru', 'Рома Иванов', 'Assigned', '2018-08-30 19:12:56', '2018-09-03 09:00:00', '1970-01-01 03:00:00', '', '', 'dont_need', '', '03.09.2018 09:00', '03.09.2018 09:00', '500', '250', '', '', '', 3723, '#3723: Аліна Мазур', 'unpaid', 0, '', 'project', '2018Aug30', 1, 'true', '30.08.2018 20:28:35');

-- --------------------------------------------------------

--
-- Структура таблицы `order_files`
--

CREATE TABLE `order_files` (
  `id` int(11) NOT NULL,
  `order_id` varchar(150) NOT NULL,
  `file_name` varchar(200) NOT NULL,
  `viewed` varchar(255) NOT NULL,
  `viewed_client` varchar(255) NOT NULL,
  `alias` varchar(1500) NOT NULL,
  `file_size` varchar(200) NOT NULL,
  `answer_content` text NOT NULL,
  `upload_type` varchar(50) NOT NULL,
  `tmp_name` varchar(150) NOT NULL,
  `file_type` varchar(200) NOT NULL,
  `submited` varchar(255) NOT NULL,
  `upload_date` varchar(200) NOT NULL,
  `uploaded_by` varchar(200) NOT NULL,
  `uploader_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `order_files`
--

INSERT INTO `order_files` (`id`, `order_id`, `file_name`, `viewed`, `viewed_client`, `alias`, `file_size`, `answer_content`, `upload_type`, `tmp_name`, `file_type`, `submited`, `upload_date`, `uploaded_by`, `uploader_name`) VALUES
(730, '310', 'Screenshot_1.jpg', '', '', '310-1-15.html', '250915', '', 'material', 'material_1_0.jpg', 'image/jpeg', '', '20.06.2018 01:17:08', '3641', 'заказчик заказчик'),
(743, '313', 'Screenshot_1.jpg', 'false', 'false', '313-1.html', '250915', '', 'plan', '313_plan_28_0.jpg', 'image/jpeg', 'true', '20.06.2018 13:31:09', '3642', 'автор'),
(744, '314', 'Screenshot_7.png', '', '', '314--.html', '25202', '', 'material', 'material_83_0.png', 'image/png', '', '20.06.2018 16:41:06', '3640', 'vlad_zakaz zakaz'),
(749, '314', 'Screenshot_7.png', 'false', 'false', '314--.html', '25202', '', 'plan', '314_plan_99_0.png', 'image/png', 'true', '20.06.2018 16:59:36', '3640', 'vlad_zakaz'),
(750, '314', 'Screenshot_7.png', 'false', 'false', '314--.html', '25202', '', 'plan', '314_plan_77_0.png', 'image/png', 'true', '20.06.2018 16:59:51', '2562', 'Вероника'),
(751, '314', 'Screenshot_7.png', 'false', 'false', '314--.html', '25202', '', 'plan', '314_plan_96_0.png', 'image/png', 'true', '20.06.2018 17:01:11', '3564', 'Vlad Test'),
(752, '314', 'Screenshot_7.png', 'false', 'false', '314--.html', '25202', '', 'mat_sec', '314_polovina_23_0.png', 'image/png', 'true', '20.06.2018 17:01:50', '3564', 'Vlad Test'),
(753, '314', 'doc.jpg', 'false', 'false', '314--.html', '121801', '', 'essay', '314_vsia_rabota_15_0.jpg', 'image/jpeg', '', '21.06.2018 11:39:28', '3564', 'Vlad Test'),
(754, '314', 'doc.jpg', 'false', 'false', '314--.html', '121801', '', 'unic', '314_unic_26_0.jpg', 'image/jpeg', '', '21.06.2018 11:39:44', '3564', 'Vlad Test'),
(759, '308', '3.jpg', 'false', 'false', '308-testfile.html', '52912', '', 'plan', '308_plan_79_0.jpg', 'image/jpeg', '', '25.06.2018 11:01:49', '3556', 'Автор '),
(760, '308', '3.jpg', 'false', 'false', '308-testfile.html', '52912', '', 'mat_sec', '308_polovina_5_0.jpg', 'image/jpeg', '', '25.06.2018 11:02:02', '3556', 'Автор '),
(761, '308', '2.jpg', 'false', 'false', '308-testfile.html', '70825', '', 'essay', '308_vsia_rabota_24_0.jpg', 'image/jpeg', '', '25.06.2018 11:02:14', '3556', 'Автор '),
(762, '308', '1.jpg', 'false', 'false', '308-testfile.html', '123210', '', 'unic', '308_unic_27_0.jpg', 'image/jpeg', '', '25.06.2018 11:02:24', '3556', 'Автор '),
(763, '318', 'фывфыв.txt', 'false', 'false', '318-12345t.html', '6', '', 'plan', '318_plan_17_0.txt', 'text/plain', '', '25.06.2018 16:11:27', '2562', 'Вероника'),
(764, '318', 'фывфыв.txt', 'false', 'false', '318-12345t.html', '6', '', 'plan', '318_plan_25_0.txt', 'text/plain', '', '25.06.2018 16:13:25', '2562', 'Вероника'),
(765, '318', 'фывфыв.txt', 'false', 'false', '318-12345t.html', '6', '', 'plan', '318_plan_3_0.txt', 'text/plain', '', '25.06.2018 16:28:39', '2562', 'Вероника'),
(766, '318', 'фывфыв.txt', 'false', 'false', '318-12345t.html', '6', '', 'plan', '318_plan_76_0.txt', 'text/plain', '', '25.06.2018 16:37:25', '2562', 'Вероника'),
(767, '318', 'фывфыв.txt', 'false', 'false', '318-12345t.html', '6', '', 'material', '318_material_47_0.txt', 'text/plain', '', '25.06.2018 16:37:58', '2562', 'Вероника'),
(768, '318', 'фывфыв.txt', 'false', 'false', '318-12345t.html', '6', '', 'material', '318_material_13_0.txt', 'text/plain', '', '25.06.2018 16:39:49', '2562', 'Вероника'),
(769, '319', 'фывфыв.txt', 'false', 'false', '319--.html', '6', '', 'plan', '319_plan_10_0.txt', 'text/plain', '', '25.06.2018 17:55:56', '3564', 'Vlad Test'),
(770, '319', 'фывфыв.txt', 'false', 'false', '319--.html', '6', '', 'mat_sec', '319_polovina_31_0.txt', 'text/plain', '', '25.06.2018 17:56:18', '3564', 'Vlad Test'),
(771, '319', 'фывфыв.txt', 'false', 'false', '319--.html', '6', '', 'essay', '319_vsia_rabota_21_0.txt', 'text/plain', '', '25.06.2018 17:56:30', '3564', 'Vlad Test'),
(772, '319', 'фывфыв.txt', 'false', 'false', '319--.html', '6', '', 'unic', '319_unic_87_0.txt', 'text/plain', '', '25.06.2018 17:56:51', '3564', 'Vlad Test'),
(778, '324', 'фывфыв.txt', '', '', '324-123.html', '6', '', 'material', 'material_60_0.txt', 'text/plain', '', '26.06.2018 10:39:23', '3640', 'vlad_zakaz zakaz'),
(779, '325', 'фывфыв.txt', '', '', '325-123123.html', '6', '', 'material', 'material_6_0.txt', 'text/plain', '', '2018-06-26 11:30:44', '44343', ''),
(780, '326', 'фывфыв.txt', '', 'true', '326-u76u7.html', '6', '', 'material', 'material_57_0.txt', 'text/plain', '', '26.06.2018 11:46:53', '3649', 'vlad zak'),
(781, '326', 'фывфыв.txt', 'false', 'true', '326-u76u7.html', '6', '', 'plan', '326_plan_11_0.txt', 'text/plain', 'false', '26.06.2018 11:47:15', '3649', 'vlad'),
(784, '328', 'фывфыв.txt', '', '', '328-123123.html', '6', 'true', 'material', 'material_89_0.txt', 'text/plain', '', '26.06.2018 13:46:20', '3649', 'vlad zak'),
(785, '329', '1.jpg', '', 'true', '329-15.html', '158707', '', 'material', 'material_9_0.jpg', 'image/jpeg', '', '26.06.2018 14:04:40', '3628', 'Рома Иванов'),
(786, '329', '1.jpg', 'false', 'true', '329-15.html', '158707', '', 'plan', '329_plan_79_0.jpg', 'image/jpeg', 'true', '26.06.2018 14:06:24', '2562', 'Вероника'),
(787, '330', 'Screenshot_1.jpg', '', '', '330--.html', '250915', '', 'material', 'material_33_0.jpg', 'image/jpeg', '', '27.06.2018 09:13:31', '3650', 'НикЗаказчик ыФВФЫВ'),
(788, '331', '_ild31M0DZk.jpg', '', 'true', '331--.html', '15315', '', 'material', 'material_22_0.jpg', 'image/jpeg', '', '27.06.2018 09:48:52', '3628', 'Рома Иванов'),
(789, '331', '_ild31M0DZk.jpg', 'false', 'true', '331--.html', '15315', '', 'plan', '331_plan_81_0.jpg', 'image/jpeg', 'true', '27.06.2018 09:49:47', '3628', 'Рома'),
(790, '334', '_ild31M0DZk.jpg', '', '', '334-1.html', '15315', 'true', 'material', 'material_67_0.jpg', 'image/jpeg', '', '28.06.2018 12:18:13', '3653', 'ффф ффф'),
(791, '337', '_ild31M0DZk.jpg', '', '', '337-6.html', '15315', '', 'material', 'material_89_0.jpg', 'image/jpeg', '', '2018-06-28 13:28:25', '44343', ''),
(792, '338', '_ild31M0DZk.jpg', '', '', '338--2.html', '15315', '', 'material', 'material_1_0.jpg', 'image/jpeg', '', '28.06.2018 18:34:54', '3653', 'ффф ффф'),
(793, '339', '_ild31M0DZk.jpg', '', '', '339--3-.html', '15315', '', 'material', 'material_52_0.jpg', 'image/jpeg', '', '28.06.2018 18:44:40', '3658', 'фф фф'),
(794, '339', '_ild31M0DZk.jpg', 'false', 'false', '339--3-.html', '15315', '', 'check', '339_check_29_0.jpg', 'image/jpeg', 'true', '28.06.2018 18:52:42', '3658', 'фф'),
(795, '338', '_ild31M0DZk.jpg', 'false', 'false', '338--2.html', '15315', '', 'check', '338_check_9_0.jpg', 'image/jpeg', 'true', '28.06.2018 18:56:15', '3653', 'ффф'),
(796, '334', '_ild31M0DZk.jpg', 'false', 'false', '334-1.html', '15315', 'true', 'check', '334_check_84_0.jpg', 'image/jpeg', 'true', '28.06.2018 19:03:24', '3653', 'ффф'),
(797, '336', 'material_52_0.jpg', 'false', 'false', '336-5.html', '15315', '', 'plan', '336_plan_76_0.jpg', 'image/jpeg', 'true', '28.06.2018 19:31:37', '3656', 'ввв'),
(798, '343', '_ild31M0DZk.jpg', '', '', '343--.html', '15315', '', 'material', 'material_22_0.jpg', 'image/jpeg', '', '29.06.2018 09:24:24', '3655', 'ффф ффф'),
(799, '342', 'material_22_0.jpg', 'false', 'false', '342-77777.html', '15315', '', 'plan', '342_plan_45_0.jpg', 'image/jpeg', '', '29.06.2018 09:47:38', '3556', 'Автор '),
(800, '342', 'material_22_0.jpg', 'false', 'false', '342-77777.html', '15315', '', 'mat_sec', '342_polovina_69_0.jpg', 'image/jpeg', '', '29.06.2018 09:47:47', '3556', 'Автор '),
(801, '342', 'material_22_0.jpg', 'false', 'false', '342-77777.html', '15315', '', 'essay', '342_vsia_rabota_61_0.jpg', 'image/jpeg', '', '29.06.2018 09:47:58', '3556', 'Автор '),
(802, '342', 'material_22_0.jpg', 'false', 'false', '342-77777.html', '15315', '', 'unic', '342_unic_5_0.jpg', 'image/jpeg', '', '29.06.2018 09:48:23', '3556', 'Автор '),
(803, '284', 'План_занятий.docx', 'false', 'false', '284-1231.html', '21312', '', 'plan', '284_plan_55_0.docx', 'application/vnd.openxmlformats-officedocument.wordprocessingml.document', '', '02.07.2018 12:54:55', '3557', 'Настя'),
(804, '344', 'icon2.png', 'false', 'false', '344-test.html', '92755', '', 'plan', '344_plan_21_0.png', 'image/png', 'true', '02.07.2018 12:55:14', '3558', 'Анна'),
(805, '284', 'План_занятий.docx', 'false', 'false', '284-1231.html', '21312', '', 'mat_sec', '284_polovina_26_0.docx', 'application/vnd.openxmlformats-officedocument.wordprocessingml.document', '', '02.07.2018 12:55:14', '3557', 'Настя'),
(806, '284', 'План_занятий.docx', 'false', 'false', '284-1231.html', '21312', '', 'essay', '284_vsia_rabota_9_0.docx', 'application/vnd.openxmlformats-officedocument.wordprocessingml.document', '', '02.07.2018 12:55:28', '3557', 'Настя'),
(807, '284', 'План_занятий.docx', 'false', 'false', '284-1231.html', '21312', '', 'unic', '284_unic_86_0.docx', 'application/vnd.openxmlformats-officedocument.wordprocessingml.document', '', '02.07.2018 12:56:01', '3557', 'Настя'),
(808, '348', 'Новый_текстовый_документ.txt', 'false', 'true', '348-asdasd.html', '6', '', 'plan', '348_plan_87_0.txt', 'text/plain', 'true', '04.07.2018 14:33:36', '2562', 'Вероника'),
(809, '348', 'Новый_текстовый_документ.txt', 'false', 'true', '348-asdasd.html', '6', '', 'mat_sec', '348_polovina_65_0.txt', 'text/plain', 'true', '04.07.2018 14:37:32', '2562', 'Вероника'),
(810, '349', 'Новый_текстовый_документ.txt', 'false', 'true', '349-123123.html', '6', '', 'plan', '349_plan_64_0.txt', 'text/plain', 'true', '04.07.2018 15:52:21', '2562', 'Вероника'),
(811, '353', 'a_simple_beep.mp3', '', '', '353---.html', '130047', '', 'material', 'material_80_0.mp3', 'audio/mp3', '', '06.07.2018 18:01:20', '3645', 'John Doe'),
(812, '353', '0005-newspaper.pdf', '', '', '353---.html', '1098', '', 'material', 'material_94_1.pdf', 'application/pdf', '', '06.07.2018 18:01:20', '3645', 'John Doe'),
(813, '361', 'Даня.docx', '', 'true', '361---1.html', '12565', '', 'material', 'material_86_0.docx', 'application/vnd.openxmlformats-officedocument.wordprocessingml.document', '', '13.07.2018 14:16:08', '3660', 'Владимир Тест'),
(818, '361', 'План_работы.docx', 'false', 'true', '361---1.html', '11348', '', 'plan', '361_plan_8_0.docx', 'application/vnd.openxmlformats-officedocument.wordprocessingml.document', 'true', '13.07.2018 14:46:41', '3661', 'Тест'),
(819, '361', 'Половина_роботы.docx', 'false', 'true', '361---1.html', '11338', '', 'mat_sec', '361_polovina_60_0.docx', 'application/vnd.openxmlformats-officedocument.wordprocessingml.document', 'true', '13.07.2018 14:46:53', '3661', 'Тест'),
(820, '361', 'Вся_работа.docx', 'false', 'true', '361---1.html', '11374', '', 'essay', '361_vsia_rabota_37_0.docx', 'application/vnd.openxmlformats-officedocument.wordprocessingml.document', 'true', '13.07.2018 14:47:24', '3661', 'Тест'),
(821, '361', 'Плагиат.jpg', 'false', 'true', '361---1.html', '158646', '', 'unic', '361_unic_7_0.jpg', 'image/jpeg', 'true', '13.07.2018 14:47:40', '3661', 'Тест'),
(822, '361', '49efa5a6955d7bce7032989bf28eb2db.jpg', 'false', 'true', '361---1.html', '274841', '', 'check', '361_check_77_0.jpg', 'image/jpeg', 'true', '13.07.2018 14:49:22', '3660', 'Владимир'),
(823, '363', 'задача.docx', '', 'true', '363--.html', '10619', '', 'material', 'material_22_0.docx', 'application/vnd.openxmlformats-officedocument.wordprocessingml.document', '', '16.07.2018 13:00:11', '3628', 'Рома Иванов'),
(824, '363', 'задача.docx', 'false', 'true', '363--.html', '10619', '', 'mat_sec', '363_polovina_27_0.docx', 'application/vnd.openxmlformats-officedocument.wordprocessingml.document', 'true', '16.07.2018 13:14:27', '3556', 'Автор '),
(825, '362', '№362_план.docx', 'false', 'true', '362--------160-----.html', '14477', '', 'plan', '362_plan_77_0.docx', 'application/vnd.openxmlformats-officedocument.wordprocessingml.document', '', '16.07.2018 13:17:20', '3662', 'Татьяна'),
(826, '363', 'задача.docx', 'false', 'true', '363--.html', '10619', '', 'essay', '363_vsia_rabota_40_0.docx', 'application/vnd.openxmlformats-officedocument.wordprocessingml.document', 'true', '16.07.2018 13:29:02', '3556', 'Автор '),
(827, '363', 'задача.docx', 'false', 'true', '363--.html', '10619', '', 'unic', '363_unic_37_0.docx', 'application/vnd.openxmlformats-officedocument.wordprocessingml.document', 'true', '16.07.2018 13:33:44', '3556', 'Автор '),
(828, '366', '111.txt', 'false', 'false', '366-111.html', '6', '', 'material', '366_material_54_0.txt', 'text/plain', 'true', '16.07.2018 14:14:47', '3649', 'vlad'),
(829, '365', 'loupe_PNG10020.png', 'false', 'true', '365--.html', '556331', '', 'check', '365_check_0_0.png', 'image/png', 'true', '16.07.2018 14:49:39', '3628', 'Рома'),
(830, '368', 'задача.docx', 'false', 'false', '368--2.html', '10619', '', 'plan', '368_plan_3_0.docx', 'application/vnd.openxmlformats-officedocument.wordprocessingml.document', '', '16.07.2018 15:25:58', '3556', 'Автор '),
(831, '368', 'задача.docx', 'false', 'false', '368--2.html', '10619', '', 'mat_sec', '368_polovina_82_0.docx', 'application/vnd.openxmlformats-officedocument.wordprocessingml.document', '', '16.07.2018 15:28:55', '3556', 'Автор '),
(832, '363', '005.jpg', 'false', 'false', '363--.html', '22969', '', 'essay', '363_vsia_rabota_40_0.jpg', 'image/jpeg', '', '16.07.2018 18:06:49', '3556', 'Автор '),
(833, '373', '111.txt', 'false', 'false', '373-123.html', '6', '', 'plan', '373_plan_82_0.txt', 'text/plain', '', '17.07.2018 14:18:11', '2562', 'Вероника'),
(834, '366', '111.txt', 'false', 'false', '366-111.html', '6', '', 'plan', '366_plan_20_0.txt', 'text/plain', '', '17.07.2018 14:18:40', '2562', 'Вероника'),
(842, '373', 'file.txt', 'false', 'false', '373-123.html', '14', '', 'essay', '373_vsia_rabota_8_0.txt', 'text/plain', 'false', '18.07.2018 16:26:02', '2562', 'Вероника'),
(847, '375', 'file.txt', 'false', 'false', '375-qweqwq.html', '14', '', 'plan', '375_plan_79_0.txt', 'text/plain', '', '18.07.2018 17:57:49', '3648', 'vlad'),
(848, '375', 'file.txt', 'false', 'false', '375-qweqwq.html', '14', '', 'mat_sec', '375_polovina_90_0.txt', 'text/plain', '', '18.07.2018 17:58:29', '3648', 'vlad'),
(849, '375', 'file.txt', 'false', 'false', '375-qweqwq.html', '14', '', 'essay', '375_vsia_rabota_17_0.txt', 'text/plain', '', '18.07.2018 17:58:51', '3648', 'vlad'),
(850, '375', 'file.txt', 'false', 'false', '375-qweqwq.html', '14', '', 'unic', '375_unic_61_0.txt', 'text/plain', '', '18.07.2018 17:59:12', '3648', 'vlad'),
(853, '362', '№362_-_половина_роботи.docx', 'false', 'true', '362--------160-----.html', '40246', '', 'mat_sec', '362_polovina_37_0.docx', 'application/vnd.openxmlformats-officedocument.wordprocessingml.document', 'true', '19.07.2018 09:25:57', '3662', 'Татьяна'),
(854, '374', 'file.txt', 'false', 'true', '374--.html', '14', '', 'plan', '374_plan_55_0.txt', 'text/plain', 'true', '19.07.2018 10:38:36', '2562', 'Вероника'),
(855, '374', 'file.txt', 'false', 'true', '374--.html', '14', '', 'mat_sec', '374_polovina_50_0.txt', 'text/plain', 'true', '19.07.2018 10:40:08', '2562', 'Вероника'),
(856, '374', 'file.txt', 'false', 'true', '374--.html', '14', '', 'essay', '374_vsia_rabota_88_0.txt', 'text/plain', 'true', '19.07.2018 10:40:45', '2562', 'Вероника'),
(857, '374', 'file.txt', 'false', 'true', '374--.html', '14', '', 'unic', '374_unic_3_0.txt', 'text/plain', '', '19.07.2018 10:41:31', '2562', 'Вероника'),
(858, '374', 'file.txt', 'false', 'true', '374--.html', '14', '', 'material', '374_material_66_0.txt', 'text/plain', '', '19.07.2018 10:46:28', '2562', 'Вероника'),
(859, '362', 'file.txt', 'false', 'true', '362--------160-----.html', '14', '', 'essay', '362_vsia_rabota_26_0.txt', 'text/plain', '', '19.07.2018 13:49:44', '2562', 'Вероника'),
(860, '362', 'Кримінально_160_КК_-_повністю.docx', 'false', 'true', '362--------160-----.html', '84117', '', 'essay', '362_vsia_rabota_12_0.docx', 'application/vnd.openxmlformats-officedocument.wordprocessingml.document', '', '19.07.2018 14:53:33', '3662', 'Татьяна'),
(861, '362', 'Кримінально_160_КК_-_повністю.docx', 'false', 'true', '362--------160-----.html', '84117', '', 'unic', '362_unic_36_0.docx', 'application/vnd.openxmlformats-officedocument.wordprocessingml.document', '', '19.07.2018 14:53:49', '3662', 'Татьяна'),
(862, '362', '№362.docx', 'false', 'true', '362--------160-----.html', '568679', '', 'unic', '362_unic_38_0.docx', 'application/vnd.openxmlformats-officedocument.wordprocessingml.document', '', '19.07.2018 22:24:36', '3662', 'Татьяна'),
(863, '387', 'logo.png', 'false', 'true', '387---60.html', '32842', '', 'check', '387_check_79_0.png', 'image/png', 'true', '20.07.2018 14:56:33', '3628', 'Рома'),
(866, '387', 'logo.png', 'false', 'true', '387---60.html', '32842', '', 'check', '387_check_33_0.png', 'image/png', 'true', '20.07.2018 15:03:36', '3628', 'Рома'),
(867, '387', 'logo.png', 'false', 'true', '387---60.html', '32842', '', 'check', '387_check_5_0.png', 'image/png', 'true', '20.07.2018 15:03:50', '3628', 'Рома'),
(868, '387', 'задача.docx', 'false', 'true', '387---60.html', '10619', '', 'plan', '387_plan_1_0.docx', 'application/vnd.openxmlformats-officedocument.wordprocessingml.document', 'true', '20.07.2018 15:17:01', '3556', 'Автор '),
(870, '387', 'задача.docx', 'false', 'true', '387---60.html', '10619', '', 'mat_sec', '387_polovina_62_0.docx', 'application/vnd.openxmlformats-officedocument.wordprocessingml.document', 'true', '20.07.2018 15:25:18', '3556', 'Автор '),
(871, '387', 'задача.docx', 'false', 'true', '387---60.html', '10619', '', 'essay', '387_vsia_rabota_33_0.docx', 'application/vnd.openxmlformats-officedocument.wordprocessingml.document', 'true', '20.07.2018 15:31:03', '3556', 'Автор '),
(872, '387', 'настройки_етхт.png', 'false', 'true', '387---60.html', '58817', '', 'unic', '387_unic_84_0.png', 'image/png', '', '20.07.2018 15:35:26', '3556', 'Автор '),
(873, '388', 'настройки_етхт.png', 'false', 'false', '388--66.html', '58817', '', 'essay', '388_vsia_rabota_17_0.png', 'image/png', 'true', '20.07.2018 16:22:34', '3556', 'Автор '),
(874, '388', 'задача.docx', 'false', 'false', '388--66.html', '10619', '', 'essay', '388_vsia_rabota_74_0.docx', 'application/vnd.openxmlformats-officedocument.wordprocessingml.document', '', '20.07.2018 16:23:22', '3556', 'Автор '),
(875, '364', 'Безымянный.jpg', 'false', 'false', '364--.html', '72298', '', 'plan', '364_plan_29_0.jpg', 'image/jpeg', '', '23.07.2018 12:55:43', '3682', 'Автор'),
(876, '364', '234.jpg', 'false', 'false', '364--.html', '18372', '', 'mat_sec', '364_polovina_54_0.jpg', 'image/jpeg', '', '23.07.2018 12:55:44', '3682', 'Автор'),
(877, '364', '234.jpg', 'false', 'false', '364--.html', '18372', '', 'essay', '364_vsia_rabota_20_0.jpg', 'image/jpeg', '', '23.07.2018 12:55:45', '3682', 'Автор'),
(878, '364', 'Безымянный.jpg', 'false', 'false', '364--.html', '72298', '', 'unic', '364_unic_13_0.jpg', 'image/jpeg', '', '23.07.2018 12:55:57', '3682', 'Автор'),
(879, '391', '123.txt', 'false', 'true', '391-1231.html', '5', '', 'plan', '391_plan_82_0.txt', 'text/plain', 'true', '23.07.2018 14:10:38', '2562', 'Вероника'),
(880, '391', '123.txt', 'false', 'true', '391-1231.html', '5', '', 'mat_sec', '391_polovina_66_0.txt', 'text/plain', 'true', '23.07.2018 14:11:11', '2562', 'Вероника'),
(881, '391', '123.txt', 'false', 'true', '391-1231.html', '5', '', 'essay', '391_vsia_rabota_68_0.txt', 'text/plain', 'true', '23.07.2018 14:11:42', '2562', 'Вероника'),
(882, '385', '123.txt', 'false', 'false', '385-123123.html', '5', '', 'plan', '385_plan_87_0.txt', 'text/plain', '', '23.07.2018 16:53:36', '3648', 'vlad'),
(883, '385', '123.txt', 'false', 'false', '385-123123.html', '5', '', 'mat_sec', '385_polovina_98_0.txt', 'text/plain', '', '23.07.2018 16:53:42', '3648', 'vlad'),
(884, '385', '123.txt', 'false', 'false', '385-123123.html', '5', '', 'essay', '385_vsia_rabota_50_0.txt', 'text/plain', '', '23.07.2018 16:53:49', '3648', 'vlad'),
(885, '385', '123.txt', 'false', 'false', '385-123123.html', '5', '', 'unic', '385_unic_29_0.txt', 'text/plain', '', '23.07.2018 16:53:57', '3648', 'vlad'),
(886, '373', '123.txt', 'false', 'false', '373-123.html', '5', '', 'mat_sec', '373_polovina_0_0.txt', 'text/plain', '', '23.07.2018 16:56:42', '3648', 'vlad'),
(887, '373', '123.txt', 'false', 'false', '373-123.html', '5', '', 'unic', '373_unic_12_0.txt', 'text/plain', '', '23.07.2018 16:56:50', '3648', 'vlad'),
(888, '388', 'задача.docx', 'false', 'false', '388--66.html', '10619', '', 'plan', '388_plan_43_0.docx', 'application/vnd.openxmlformats-officedocument.wordprocessingml.document', '', '23.07.2018 17:17:33', '3556', 'Автор '),
(889, '388', 'задача.docx', 'false', 'false', '388--66.html', '10619', '', 'mat_sec', '388_polovina_80_0.docx', 'application/vnd.openxmlformats-officedocument.wordprocessingml.document', '', '23.07.2018 17:17:52', '3556', 'Автор '),
(890, '388', 'задача.docx', 'false', 'false', '388--66.html', '10619', '', 'unic', '388_unic_0_0.docx', 'application/vnd.openxmlformats-officedocument.wordprocessingml.document', '', '23.07.2018 17:18:06', '3556', 'Автор '),
(893, '257', 'задача.docx', 'false', 'true', '257---34.html', '10619', '', 'plan', '257_plan_52_0.docx', 'application/vnd.openxmlformats-officedocument.wordprocessingml.document', 'true', '23.07.2018 17:30:36', '3556', 'Автор '),
(894, '257', 'задача.docx', 'false', 'true', '257---34.html', '10619', '', 'mat_sec', '257_polovina_29_0.docx', 'application/vnd.openxmlformats-officedocument.wordprocessingml.document', 'true', '23.07.2018 17:33:19', '3556', 'Автор '),
(895, '257', 'задача.docx', 'false', 'true', '257---34.html', '10619', '', 'essay', '257_vsia_rabota_8_0.docx', 'application/vnd.openxmlformats-officedocument.wordprocessingml.document', 'true', '23.07.2018 17:35:25', '3556', 'Автор '),
(896, '257', 'задача.docx', 'false', 'true', '257---34.html', '10619', '', 'mat_sec', '257_polovina_5_0.docx', 'application/vnd.openxmlformats-officedocument.wordprocessingml.document', 'true', '23.07.2018 17:43:13', '3556', 'Автор '),
(898, '257', '123.txt', 'false', 'true', '257---34.html', '5', '', 'material', '257_material_36_0.txt', 'text/plain', '', '23.07.2018 17:48:22', '2562', 'Вероника'),
(901, '257', 'задача.docx', 'false', 'true', '257---34.html', '10619', '', 'unic', '257_unic_48_0.docx', 'application/vnd.openxmlformats-officedocument.wordprocessingml.document', '', '23.07.2018 18:21:21', '3556', 'Автор '),
(902, '390', '123.txt', 'false', 'false', '390-132312321.html', '5', '', 'unic', '390_unic_24_0.txt', 'text/plain', 'true', '24.07.2018 10:50:11', '2562', 'Вероника'),
(903, '390', '123.txt', 'false', 'false', '390-132312321.html', '5', '', 'material', '390_material_18_0.txt', 'text/plain', '', '24.07.2018 11:00:08', '2562', 'Вероника'),
(904, '390', '123.txt', 'false', 'false', '390-132312321.html', '5', '', 'plan', '390_plan_37_0.txt', 'text/plain', 'true', '24.07.2018 11:00:45', '2562', 'Вероника'),
(905, '390', '123.txt', 'false', 'false', '390-132312321.html', '5', '', 'mat_sec', '390_polovina_22_0.txt', 'text/plain', 'true', '24.07.2018 11:01:24', '2562', 'Вероника'),
(906, '390', '123.txt', 'false', 'false', '390-132312321.html', '5', '', 'essay', '390_vsia_rabota_6_0.txt', 'text/plain', 'true', '24.07.2018 11:01:47', '2562', 'Вероника'),
(907, '392', '0005-newspaper.pdf', '', '', '392---V.html', '1098', '', 'material', 'material_45_0.pdf', 'application/pdf', '', '24.07.2018 12:34:59', '3645', 'John Doe'),
(908, '392', 'a_simple_beep.mp3', '', '', '392---V.html', '130047', '', 'material', 'material_49_1.mp3', 'audio/mp3', '', '24.07.2018 12:34:59', '3645', 'John Doe'),
(909, '393', 'Безымянный.jpg', 'false', 'false', '393---12.html', '72298', '', 'plan', '393_plan_94_0.jpg', 'image/jpeg', 'true', '24.07.2018 12:59:03', '3682', 'Автор'),
(910, '393', 'Безымянный.jpg', 'false', 'false', '393---12.html', '72298', '', 'mat_sec', '393_polovina_7_0.jpg', 'image/jpeg', 'true', '24.07.2018 13:01:00', '3682', 'Автор'),
(911, '393', 'Безымянный.jpg', 'false', 'false', '393---12.html', '72298', '', 'essay', '393_vsia_rabota_13_0.jpg', 'image/jpeg', 'true', '24.07.2018 13:06:41', '3682', 'Автор'),
(912, '393', 'Безымянный.jpg', 'false', 'false', '393---12.html', '72298', '', 'unic', '393_unic_78_0.jpg', 'image/jpeg', 'true', '24.07.2018 13:06:55', '3682', 'Автор'),
(913, '394', 'logo.png', '', 'true', '394--.html', '32842', '', 'material', 'material_82_0.png', 'image/png', '', '24.07.2018 13:27:18', '3628', 'Рома Иванов'),
(914, '394', 'задача.docx', 'false', 'true', '394--.html', '10619', '', 'plan', '394_plan_11_0.docx', 'application/vnd.openxmlformats-officedocument.wordprocessingml.document', 'true', '24.07.2018 13:38:47', '3556', 'Автор '),
(915, '394', 'задача.docx', 'false', 'true', '394--.html', '10619', '', 'mat_sec', '394_polovina_18_0.docx', 'application/vnd.openxmlformats-officedocument.wordprocessingml.document', 'true', '24.07.2018 13:41:38', '3556', 'Автор '),
(916, '394', 'задача.docx', 'false', 'true', '394--.html', '10619', '', 'essay', '394_vsia_rabota_13_0.docx', 'application/vnd.openxmlformats-officedocument.wordprocessingml.document', 'true', '24.07.2018 13:43:35', '3556', 'Автор '),
(917, '394', 'задача.docx', 'false', 'true', '394--.html', '10619', '', 'unic', '394_unic_70_0.docx', 'application/vnd.openxmlformats-officedocument.wordprocessingml.document', 'true', '24.07.2018 13:45:15', '3556', 'Автор '),
(918, '404', 'задача.docx', 'false', 'false', '404--.html', '10619', '', 'mat_sec', '404_polovina_70_0.docx', 'application/vnd.openxmlformats-officedocument.wordprocessingml.document', '', '26.07.2018 14:05:10', '3556', 'Автор '),
(919, '404', 'задача.docx', 'false', 'false', '404--.html', '10619', '', 'essay', '404_vsia_rabota_37_0.docx', 'application/vnd.openxmlformats-officedocument.wordprocessingml.document', '', '26.07.2018 14:05:21', '3556', 'Автор '),
(920, '404', 'задача.docx', 'false', 'false', '404--.html', '10619', '', 'unic', '404_unic_45_0.docx', 'application/vnd.openxmlformats-officedocument.wordprocessingml.document', '', '26.07.2018 14:05:34', '3556', 'Автор '),
(921, '340', 'задача.docx', 'false', 'false', '340--3-.html', '10619', '', 'mat_sec', '340_polovina_98_0.docx', 'application/vnd.openxmlformats-officedocument.wordprocessingml.document', '', '26.07.2018 14:07:13', '3556', 'Автор '),
(922, '340', 'задача.docx', 'false', 'false', '340--3-.html', '10619', '', 'essay', '340_vsia_rabota_36_0.docx', 'application/vnd.openxmlformats-officedocument.wordprocessingml.document', '', '26.07.2018 14:07:25', '3556', 'Автор '),
(923, '340', 'задача.docx', 'false', 'false', '340--3-.html', '10619', '', 'unic', '340_unic_72_0.docx', 'application/vnd.openxmlformats-officedocument.wordprocessingml.document', '', '26.07.2018 14:07:38', '3556', 'Автор '),
(928, '406', '123.txt', 'false', 'false', '406---59.html', '5', '', 'mat_sec', '406_polovina_6_0.txt', 'text/plain', '', '27.07.2018 12:16:12', '3648', 'vlad'),
(929, '406', '123.txt', 'false', 'false', '406---59.html', '5', '', 'essay', '406_vsia_rabota_84_0.txt', 'text/plain', '', '27.07.2018 12:16:21', '3648', 'vlad'),
(930, '406', '123.txt', 'false', 'false', '406---59.html', '5', '', 'unic', '406_unic_42_0.txt', 'text/plain', '', '27.07.2018 12:16:33', '3648', 'vlad'),
(931, '406', '123.txt', 'false', 'false', '406---59.html', '5', '', 'plan', '406_plan_34_0.txt', 'text/plain', '', '27.07.2018 12:17:05', '3648', 'vlad'),
(932, '403', '403_Використання_математики_в_програмуванні.docx', 'false', 'false', '403-----.html', '317391', '', 'essay', '403_vsia_rabota_35_0.docx', 'application/vnd.openxmlformats-officedocument.wordprocessingml.document', '', '28.07.2018 10:38:35', '3714', 'Анастасия '),
(933, '403', 'Зміст.docx', 'false', 'false', '403-----.html', '19119', '', 'plan', '403_plan_22_0.docx', 'application/vnd.openxmlformats-officedocument.wordprocessingml.document', '', '28.07.2018 10:48:05', '3714', 'Анастасия '),
(934, '325', 'задача.docx', 'false', 'false', '325-123123.html', '10619', '', 'plan', '325_plan_29_0.docx', 'application/vnd.openxmlformats-officedocument.wordprocessingml.document', '', '28.07.2018 10:51:21', '3556', 'Автор '),
(935, '403', 'Пловина_работы.docx', 'false', 'false', '403-----.html', '30153', '', 'mat_sec', '403_polovina_35_0.docx', 'application/vnd.openxmlformats-officedocument.wordprocessingml.document', '', '28.07.2018 10:51:33', '3714', 'Анастасия '),
(936, '403', 'Отчет.docx', 'false', 'false', '403-----.html', '170500', '', 'unic', '403_unic_6_0.docx', 'application/vnd.openxmlformats-officedocument.wordprocessingml.document', '', '28.07.2018 14:47:22', '3714', 'Анастасия '),
(941, '400', 'задача.docx', 'false', 'false', '400-123123.html', '10619', '', 'mat_sec', '400_polovina_47_0.docx', 'application/vnd.openxmlformats-officedocument.wordprocessingml.document', '', '29.07.2018 17:54:31', '3556', 'Автор '),
(942, '400', 'задача.docx', 'false', 'false', '400-123123.html', '10619', '', 'essay', '400_vsia_rabota_76_0.docx', 'application/vnd.openxmlformats-officedocument.wordprocessingml.document', '', '29.07.2018 17:54:40', '3556', 'Автор '),
(943, '400', 'задача.docx', 'false', 'false', '400-123123.html', '10619', '', 'unic', '400_unic_74_0.docx', 'application/vnd.openxmlformats-officedocument.wordprocessingml.document', '', '29.07.2018 17:54:57', '3556', 'Автор '),
(944, '407', 'Screenshot_1.png', '', 'true', '407--.html', '356211', '', 'material', 'material_13_0.png', 'image/png', '', '29.07.2018 18:07:58', '3628', 'Рома Иванов'),
(945, '407', 'Screenshot_1.png', '', 'true', '407--.html', '356211', '', 'material', 'material_15_1.png', 'image/png', '', '29.07.2018 18:07:58', '3628', 'Рома Иванов'),
(946, '407', 'Screenshot_1.png', 'false', 'true', '407--.html', '356211', '', 'check', '407_check_85_0.png', 'image/png', 'true', '29.07.2018 18:18:45', '3628', 'Рома'),
(947, '407', 'Screenshot_1.png', 'false', 'true', '407--.html', '356211', '', 'check', '407_check_7_0.png', 'image/png', 'true', '29.07.2018 18:19:15', '3628', 'Рома'),
(948, '407', 'задача.docx', 'false', 'true', '407--.html', '10619', '', 'plan', '407_plan_55_0.docx', 'application/vnd.openxmlformats-officedocument.wordprocessingml.document', '', '29.07.2018 18:40:53', '3556', 'Автор '),
(950, '407', 'задача.docx', 'false', 'true', '407--.html', '10619', '', 'mat_sec', '407_polovina_84_0.docx', 'application/vnd.openxmlformats-officedocument.wordprocessingml.document', 'true', '29.07.2018 18:52:36', '3556', 'Автор '),
(951, '387', 'задача.docx', 'false', 'false', '387---60.html', '10619', '', 'essay', '387_vsia_rabota_80_0.docx', 'application/vnd.openxmlformats-officedocument.wordprocessingml.document', '', '31.07.2018 11:30:33', '3556', 'Автор '),
(955, '349', '1231.txt', 'false', 'false', '349-123123.html', '7', '', 'mat_sec', '349_polovina_99_0.txt', 'text/plain', '', '31.07.2018 16:59:00', '3648', 'vlad'),
(956, '349', '1231.txt', 'false', 'false', '349-123123.html', '7', '', 'essay', '349_vsia_rabota_37_0.txt', 'text/plain', '', '31.07.2018 16:59:26', '3648', 'vlad'),
(957, '349', '1231.txt', 'false', 'false', '349-123123.html', '7', '', 'unic', '349_unic_37_0.txt', 'text/plain', '', '31.07.2018 16:59:33', '3648', 'vlad'),
(958, '111', 'задача.docx', 'false', 'false', '111-hvjghjghvj.html', '10619', '', 'plan', '111_plan_25_0.docx', 'application/vnd.openxmlformats-officedocument.wordprocessingml.document', '', '01.08.2018 13:09:41', '3556', 'Автор '),
(959, '111', 'задача.docx', 'false', 'false', '111-hvjghjghvj.html', '10619', '', 'mat_sec', '111_polovina_49_0.docx', 'application/vnd.openxmlformats-officedocument.wordprocessingml.document', '', '01.08.2018 13:10:03', '3556', 'Автор '),
(960, '111', 'задача.docx', 'false', 'false', '111-hvjghjghvj.html', '10619', '', 'essay', '111_vsia_rabota_89_0.docx', 'application/vnd.openxmlformats-officedocument.wordprocessingml.document', '', '01.08.2018 13:10:19', '3556', 'Автор '),
(961, '111', 'задача.docx', 'false', 'false', '111-hvjghjghvj.html', '10619', '', 'unic', '111_unic_60_0.docx', 'application/vnd.openxmlformats-officedocument.wordprocessingml.document', '', '01.08.2018 13:10:32', '3556', 'Автор '),
(963, '408', 'assign (2).doc', '', '', '408---.html', '27648', '', 'material', 'material_87_1.doc', 'application/msword', '', '2018-08-01 14:33:09', '44343', ''),
(964, '408', 'autobiograph (2).doc', '', '', '408---.html', '38912', '', 'material', 'material_51_2.doc', 'application/msword', '', '2018-08-01 14:33:09', '44343', ''),
(965, '408', 'person_card (2).doc', '', '', '408---.html', '97792', '', 'material', 'material_21_3.doc', 'application/msword', '', '2018-08-01 14:33:09', '44343', ''),
(966, '409', 'задача.docx', '', '', '409--.html', '10619', '', 'material', 'material_19_0.docx', 'application/vnd.openxmlformats-officedocument.wordprocessingml.document', '', '01.08.2018 15:00:51', '3628', 'Рома Иванов'),
(967, '408', 'Оплата_заказа_№408.jpg', 'false', 'false', '408---.html', '137015', '', 'check', '408_check_58_0.jpg', 'image/jpeg', 'true', '01.08.2018 18:07:33', '3740', 'Влада'),
(968, '411', 'Screenshot_1.jpg', '', 'true', '411---.html', '250915', '', 'material', 'material_60_0.jpg', 'image/jpeg', '', '02.08.2018 01:59:14', '3736', 'заказчик Nik sadsad'),
(969, '411', 'Screenshot_2.jpg', 'false', 'true', '411---.html', '280852', '', 'check', '411_check_24_0.jpg', 'image/jpeg', 'true', '02.08.2018 02:10:54', '3736', 'заказчик Nik'),
(970, '411', 'Screenshot_3.jpg', 'false', 'true', '411---.html', '206401', '', 'plan', '411_plan_19_0.jpg', 'image/jpeg', 'true', '02.08.2018 02:26:03', '3737', 'автор Nik'),
(971, '411', 'Screenshot_4.jpg', 'false', 'true', '411---.html', '217013', '', 'mat_sec', '411_polovina_98_0.jpg', 'image/jpeg', 'true', '02.08.2018 02:41:12', '3737', 'автор Nik'),
(972, '412', '1231.txt', 'false', 'false', '412-uoiu.html', '7', '', 'plan', '412_plan_37_0.txt', 'text/plain', '', '02.08.2018 11:05:54', '3648', 'vlad'),
(973, '412', '1231.txt', 'false', 'false', '412-uoiu.html', '7', '', 'mat_sec', '412_polovina_15_0.txt', 'text/plain', '', '02.08.2018 11:06:01', '3648', 'vlad'),
(974, '412', '1231.txt', 'false', 'false', '412-uoiu.html', '7', '', 'essay', '412_vsia_rabota_43_0.txt', 'text/plain', '', '02.08.2018 11:06:10', '3648', 'vlad'),
(975, '412', '1231.txt', 'false', 'false', '412-uoiu.html', '7', '', 'unic', '412_unic_91_0.txt', 'text/plain', '', '02.08.2018 11:06:18', '3648', 'vlad'),
(976, '298', 'Screenshot_16.jpg', 'false', 'false', '298-ewewew.html', '286483', '', 'plan', '298_plan_18_0.jpg', 'image/jpeg', '', '02.08.2018 19:41:53', '3737', 'автор Nik'),
(977, '298', 'Screenshot_7.jpg', 'false', 'false', '298-ewewew.html', '271619', '', 'mat_sec', '298_polovina_97_0.jpg', 'image/jpeg', '', '02.08.2018 19:42:02', '3737', 'автор Nik'),
(978, '298', 'Screenshot_27.jpg', 'false', 'false', '298-ewewew.html', '238027', '', 'essay', '298_vsia_rabota_38_0.jpg', 'image/jpeg', '', '02.08.2018 19:42:12', '3737', 'автор Nik'),
(979, '298', 'Screenshot_35.jpg', 'false', 'false', '298-ewewew.html', '92168', '', 'unic', '298_unic_48_0.jpg', 'image/jpeg', '', '02.08.2018 19:42:22', '3737', 'автор Nik'),
(980, '207', 'logo.png', 'false', 'false', '207---.html', '32842', '', 'plan', '207_plan_70_0.png', 'image/png', '', '02.08.2018 20:52:18', '3556', 'Автор '),
(981, '207', 'logo.png', 'false', 'false', '207---.html', '32842', '', 'mat_sec', '207_polovina_97_0.png', 'image/png', '', '02.08.2018 20:52:27', '3556', 'Автор '),
(982, '207', 'logo.png', 'false', 'false', '207---.html', '32842', '', 'essay', '207_vsia_rabota_82_0.png', 'image/png', '', '02.08.2018 20:52:37', '3556', 'Автор '),
(983, '207', 'logo.png', 'false', 'false', '207---.html', '32842', '', 'unic', '207_unic_74_0.png', 'image/png', '', '02.08.2018 20:52:52', '3556', 'Автор '),
(984, '411', '1231.txt', 'false', 'true', '411---.html', '7', '', 'essay', '411_vsia_rabota_91_0.txt', 'text/plain', '', '03.08.2018 10:56:21', '3648', 'vlad'),
(985, '411', '1231.txt', 'false', 'true', '411---.html', '7', '', 'unic', '411_unic_72_0.txt', 'text/plain', '', '03.08.2018 10:57:00', '3648', 'vlad'),
(986, '127', 'logo.png', 'false', 'false', '127-------.html', '32842', '', 'plan', '127_plan_0_0.png', 'image/png', '', '03.08.2018 11:05:34', '3556', 'Автор '),
(987, '127', 'logo.png', 'false', 'false', '127-------.html', '32842', '', 'mat_sec', '127_polovina_73_0.png', 'image/png', '', '03.08.2018 11:05:43', '3556', 'Автор '),
(988, '127', 'logo.png', 'false', 'false', '127-------.html', '32842', '', 'essay', '127_vsia_rabota_83_0.png', 'image/png', '', '03.08.2018 11:05:51', '3556', 'Автор '),
(989, '127', 'logo.png', 'false', 'false', '127-------.html', '32842', '', 'essay', '127_vsia_rabota_37_0.png', 'image/png', '', '03.08.2018 11:05:52', '3556', 'Автор '),
(990, '127', 'logo.png', 'false', 'false', '127-------.html', '32842', '', 'unic', '127_unic_58_0.png', 'image/png', '', '03.08.2018 11:06:03', '3556', 'Автор '),
(991, '408', '1231.txt', 'false', 'false', '408---.html', '7', '', 'plan', '408_plan_5_0.txt', 'text/plain', 'true', '03.08.2018 13:13:57', '2562', 'Администратор'),
(993, '415', '1231.txt', '', '', '415-new_zakaz.html', '7', '', 'material', 'material_90_0.txt', 'text/plain', '', '03.08.2018 13:36:59', '3744', 'Vlad Zakaz'),
(994, '415', '1231.txt', 'false', 'false', '415-new_zakaz.html', '7', '', 'material', '415_material_98_0.txt', 'text/plain', '', '03.08.2018 13:38:21', '2562', 'Администратор'),
(995, '415', '1231.txt', 'false', 'false', '415-new_zakaz.html', '7', '', 'material', '415_material_70_0.txt', 'text/plain', 'true', '03.08.2018 13:38:43', '3744', 'Vlad'),
(998, '408', 'zayava.doc', 'false', 'false', '408---.html', '31744', '', 'mat_sec', '408_polovina_92_0.doc', 'application/msword', 'true', '06.08.2018 09:27:52', '3562', 'Оксана'),
(1001, '408', 'Особова_картка.doc', 'false', 'false', '408---.html', '105472', '', 'essay', '408_vsia_rabota_29_0.doc', 'application/msword', 'true', '06.08.2018 09:28:55', '3562', 'Оксана'),
(1006, '408', '408_vsia_rabota_29_0.doc', 'false', 'false', '408---.html', '105472', '', 'unic', '408_unic_73_0.doc', 'application/msword', 'true', '06.08.2018 09:43:15', '3566', 'Инна '),
(1007, '408', 'material_20_0_випр.doc', 'false', 'false', '408---.html', '110592', '', 'essay', '408_vsia_rabota_42_0.doc', 'application/msword', 'true', '06.08.2018 09:48:41', '3562', 'Оксана'),
(1008, '408', 'material_51_2.doc', 'false', 'false', '408---.html', '45056', '', 'essay', '408_vsia_rabota_62_0.doc', 'application/msword', 'true', '06.08.2018 09:49:58', '3562', 'Оксана'),
(1009, '408', 'zayava.doc', 'false', 'false', '408---.html', '31744', '', 'essay', '408_vsia_rabota_0_0.doc', 'application/msword', 'true', '06.08.2018 09:50:20', '3562', 'Оксана'),
(1010, '415', '111.txt', 'false', 'false', '415-new_zakaz.html', '6', '', 'plan', '415_plan_71_0.txt', 'text/plain', 'true', '06.08.2018 11:01:26', '2562', 'Администратор'),
(1011, '415', '111.txt', 'false', 'false', '415-new_zakaz.html', '6', '', 'mat_sec', '415_polovina_44_0.txt', 'text/plain', 'true', '06.08.2018 11:04:07', '3648', 'vlad'),
(1012, '415', '111.txt', 'false', 'false', '415-new_zakaz.html', '6', '', 'essay', '415_vsia_rabota_100_0.txt', 'text/plain', 'true', '06.08.2018 11:04:15', '3648', 'vlad'),
(1013, '415', '111.txt', 'false', 'false', '415-new_zakaz.html', '6', '', 'unic', '415_unic_55_0.txt', 'text/plain', 'true', '06.08.2018 11:04:24', '3648', 'vlad'),
(1014, '416', 'logo.png', '', 'true', '416--100.html', '32842', '', 'material', 'material_85_0.png', 'image/png', '', '08.08.2018 10:58:19', '3628', 'Рома Иванов'),
(1015, '416', 'logo.png', '', 'true', '416--100.html', '32842', '', 'material', 'material_80_1.png', 'image/png', '', '08.08.2018 10:58:19', '3628', 'Рома Иванов'),
(1016, '416', 'Screenshot_1.png', '', 'true', '416--100.html', '356211', '', 'material', 'material_65_2.png', 'image/png', '', '08.08.2018 10:58:19', '3628', 'Рома Иванов'),
(1017, '416', 'задача.docx', 'false', 'true', '416--100.html', '10619', '', 'mat_sec', '416_polovina_84_0.docx', 'application/vnd.openxmlformats-officedocument.wordprocessingml.document', 'true', '08.08.2018 11:15:27', '3556', 'Автор '),
(1018, '416', 'задача.docx', 'false', 'true', '416--100.html', '10619', '', 'essay', '416_vsia_rabota_85_0.docx', 'application/vnd.openxmlformats-officedocument.wordprocessingml.document', 'true', '08.08.2018 11:18:08', '3556', 'Автор '),
(1019, '416', 'задача.docx', 'false', 'true', '416--100.html', '10619', '', 'unic', '416_unic_14_0.docx', 'application/vnd.openxmlformats-officedocument.wordprocessingml.document', 'true', '08.08.2018 11:18:24', '3556', 'Автор '),
(1020, '416', 'задача.docx', 'false', 'true', '416--100.html', '10619', '', 'essay', '416_vsia_rabota_19_0.docx', 'application/vnd.openxmlformats-officedocument.wordprocessingml.document', '', '08.08.2018 11:22:28', '3556', 'Автор '),
(1021, '418', '%D0%A2%D0%B5%D0%BC%D0%B0-%D0%BC%D0%B0%D0%B3%D1%96%D1%81%D1%82%D0%B5%D1%80%D1%81%D1%8C%D0%BA%D0%BE%D1%97-11642353874.docx', '', '', '418-------.html', '13737', 'true', 'material', 'material_35_0.docx', 'application/vnd.openxmlformats-officedocument.wordprocessingml.document', '', '09.08.2018 20:28:17', '3628', 'Рома Иванов'),
(1022, '419', 'viber image.jpg', '', '', '419------1-4--.html', '66168', '', 'material', 'material_9_0.jpg', 'image/jpeg', '', '09.08.2018 20:31:34', '3628', 'Рома Иванов'),
(1023, '419', '2.jpg', '', '', '419------1-4--.html', '97033', '', 'material', 'material_30_1.jpg', 'image/jpeg', '', '09.08.2018 20:31:34', '3628', 'Рома Иванов'),
(1024, '420', 'Screenshot_1.jpg', '', 'true', '420-------.html', '250915', '', 'material', 'material_72_0.jpg', 'image/jpeg', '', '10.08.2018 02:03:39', '3736', 'заказчик Nik sadsad'),
(1025, '421', 'методичка.rar', '', 'true', '421----.html', '4983548', '', 'material', 'material_40_0.rar', 'application/octet-stream', '', '10.08.2018 11:41:19', '3628', 'Рома Иванов'),
(1026, '422', 'Методичка з написання курсової роботи з ГПтаПроцесу.pdf', '', '', '422--------.html', '567796', '', 'material', 'material_82_0.pdf', 'application/pdf', '', '2018-08-12 02:29:15', '44343', ''),
(1027, '405', 'таблица.docx', 'false', 'false', '405------.html', '14305', '', 'material', '405_material_65_0.docx', 'application/vnd.openxmlformats-officedocument.wordprocessingml.document', 'true', '13.08.2018 13:35:26', '3718', 'Мария'),
(1028, '425', 'Методичка по курсовым работам 2016 100%.doc', '', '', '425------.html', '367616', '', 'material', 'material_12_0.doc', 'application/msword', '', '2018-08-13 14:12:58', '44343', ''),
(1029, '405', 'photo_2018-08-13_14-42-22.jpg', 'false', 'false', '405------.html', '97522', '', 'check', '405_check_54_0.jpg', 'image/jpeg', 'true', '13.08.2018 14:43:09', '3718', 'Мария'),
(1030, '421', 'План.doc', 'false', 'true', '421----.html', '26624', '', 'plan', '421_plan_19_0.doc', 'application/msword', 'true', '13.08.2018 21:25:56', '3723', 'Аліна'),
(1031, '420', 'Screenshot_36.jpg', 'false', 'true', '420-------.html', '130045', '', 'material', '420_material_90_0.jpg', 'image/jpeg', 'true', '13.08.2018 23:19:51', '3736', 'заказчик Nik'),
(1032, '425', 'ЗМІСТ.docx', 'false', 'false', '425------.html', '12302', '', 'plan', '425_plan_12_0.docx', 'application/vnd.openxmlformats-officedocument.wordprocessingml.document', 'true', '14.08.2018 09:49:14', '3714', 'Анастасия '),
(1033, '426', '1534247821047_Методичні рекомендації_КДМ 2211_виправлено.docx', '', '', '426------.html', '120824', 'true', 'material', 'material_93_0.docx', 'application/vnd.openxmlformats-officedocument.wordprocessingml.document', '', '2018-08-14 15:13:40', '44343', ''),
(1034, '426', 'Підручник як засіб навчання.docx', '', '', '426------.html', '3908700', 'true', 'material', 'material_24_1.docx', 'application/vnd.openxmlformats-officedocument.wordprocessingml.document', '', '2018-08-14 15:13:40', '44343', ''),
(1035, '427', 'Screenshot_20180814-155333.png', '', '', '427------.html', '220135', 'true', 'material', 'material_81_0.png', 'image/png', '', '14.08.2018 15:54:53', '3759', 'Анастасія Міхеєва'),
(1036, '428', 'ПРАВА ПРОМИСЛОВОЇ ВЛАСНОСТІ ( 2 завдання).docx', '', '', '428----.html', '24511', '', 'material', 'material_94_0.docx', 'application/vnd.openxmlformats-officedocument.wordprocessingml.document', '', '14.08.2018 20:30:42', '3760', 'Marko Shulz'),
(1037, '428', 'Правове рег електр комерц ( 2 завдання).doc', '', '', '428----.html', '404480', '', 'material', 'material_84_1.doc', 'application/msword', '', '14.08.2018 20:30:42', '3760', 'Marko Shulz'),
(1038, '424', '424_Здійснення_і_захист_прав_дітей_і_батьків_на_утримання.docx', 'false', 'false', '424------.html', '12562', '', 'plan', '424_plan_29_0.docx', 'application/vnd.openxmlformats-officedocument.wordprocessingml.document', '', '15.08.2018 08:13:19', '3562', 'Оксана'),
(1040, '408', '555.txt', 'false', 'false', '408---.html', '7', '', 'material', '408_material_4_0.txt', 'text/plain', '', '15.08.2018 12:22:31', '2562', 'Администратор'),
(1041, '429', '555.txt', '', '', '429-333.html', '7', '', 'material', 'material_33_0.txt', 'text/plain', '', '15.08.2018 12:24:30', '3744', 'Vlad Zakaz'),
(1042, '429', '555.txt', 'false', 'false', '429-333.html', '7', '', 'material', '429_material_70_0.txt', 'text/plain', '', '15.08.2018 12:25:15', '2562', 'Администратор'),
(1043, '429', '555.txt', 'false', 'false', '429-333.html', '7', '', 'material', '429_material_48_0.txt', 'text/plain', 'true', '15.08.2018 12:25:40', '3744', 'Vlad'),
(1044, '430', '555.txt', '', '', '430-file-test-order.html', '7', '', 'material', 'material_3_0.txt', 'text/plain', '', '2018-08-15 12:37:40', '44343', ''),
(1045, '430', '555.txt', '', '', '430-file-test-order.html', '7', '', 'material', 'material_72_1.txt', 'text/plain', '', '2018-08-15 12:37:40', '44343', ''),
(1046, '431', '555.txt', '', '', '431-213131231.html', '7', '', 'material', 'material_96_0.txt', 'text/plain', '', '15.08.2018 12:47:18', '44343', ''),
(1047, '431', '555.txt', '', '', '431-213131231.html', '7', '', 'material', 'material_88_1.txt', 'text/plain', '', '15.08.2018 12:47:18', '44343', ''),
(1048, '430', '555.txt', 'false', 'false', '430-file-test-order.html', '7', '', 'plan', '430_plan_68_0.txt', 'text/plain', '', '15.08.2018 12:51:54', '2562', 'Администратор'),
(1049, '430', '555.txt', 'false', 'false', '430-file-test-order.html', '7', '', 'material', '430_material_78_0.txt', 'text/plain', '', '15.08.2018 12:52:01', '2562', 'Администратор'),
(1050, '430', '555.txt', 'false', 'false', '430-file-test-order.html', '7', '', 'mat_sec', '430_polovina_13_0.txt', 'text/plain', '', '15.08.2018 12:52:33', '2562', 'Администратор'),
(1051, '430', '555.txt', 'false', 'false', '430-file-test-order.html', '7', '', 'essay', '430_vsia_rabota_95_0.txt', 'text/plain', '', '15.08.2018 12:52:42', '2562', 'Администратор'),
(1052, '430', '555.txt', 'false', 'false', '430-file-test-order.html', '7', '', 'unic', '430_unic_42_0.txt', 'text/plain', '', '15.08.2018 12:52:59', '2562', 'Администратор'),
(1053, '432', '555.txt', '', '', '432-New-orer.html', '7', '', 'material', 'material_84_0.txt', 'text/plain', '', '15.08.2018 16:09:55', '3762', 'vlad zakaz'),
(1054, '404', 'задача.docx', 'false', 'false', '404--.html', '10619', '', 'essay', '404_vsia_rabota_45_0.docx', 'application/vnd.openxmlformats-officedocument.wordprocessingml.document', '', '15.08.2018 20:22:47', '3556', 'Автор '),
(1055, '404', 'задача.docx', 'false', 'false', '404--.html', '10619', '', 'mat_sec', '404_polovina_68_0.docx', 'application/vnd.openxmlformats-officedocument.wordprocessingml.document', '', '15.08.2018 20:25:16', '3556', 'Автор '),
(1056, '433', '1.jpg', '', '', '433-----------.html', '187014', 'true', 'material', 'material_30_0.jpg', 'image/jpeg', '', '15.08.2018 21:19:14', '3628', 'Рома Иванов'),
(1057, '433', '2.jpg', '', '', '433-----------.html', '51383', 'true', 'material', 'material_48_1.jpg', 'image/jpeg', '', '15.08.2018 21:19:14', '3628', 'Рома Иванов'),
(1058, '433', '3.jpg', '', '', '433-----------.html', '113790', 'true', 'material', 'material_9_2.jpg', 'image/jpeg', '', '15.08.2018 21:19:14', '3628', 'Рома Иванов'),
(1059, '434', 'Методичка Николай.docx', '', '', '434---.html', '11410', '', 'material', 'material_55_0.docx', 'application/vnd.openxmlformats-officedocument.wordprocessingml.document', '', '16.08.2018 01:07:37', '44343', ''),
(1060, '425', 'Половина_роботи.docx', 'false', 'false', '425------.html', '61238', '', 'mat_sec', '425_polovina_42_0.docx', 'application/vnd.openxmlformats-officedocument.wordprocessingml.document', 'true', '16.08.2018 09:55:11', '3714', 'Анастасия '),
(1061, '428', '16-08-2018_19-38-15.zip', 'false', 'false', '428----.html', '151724', '', 'mat_sec', '428_polovina_31_0.zip', 'application/zip', 'true', '16.08.2018 20:34:31', '3556', 'Автор '),
(1062, '428', 'Desktop.rar', 'false', 'false', '428----.html', '39909', '', 'essay', '428_vsia_rabota_1_0.rar', 'application/octet-stream', 'true', '17.08.2018 09:00:52', '3556', 'Автор '),
(1063, '428', 'Desktop.rar', 'false', 'false', '428----.html', '39909', '', 'unic', '428_unic_19_0.rar', 'application/octet-stream', '', '17.08.2018 09:01:12', '3556', 'Автор '),
(1064, '435', '555.txt', '', '', '435--.html', '7', '', 'material', 'material_77_0.txt', 'text/plain', '', '17.08.2018 17:12:50', '3762', 'vlad zakaz'),
(1065, '435', '555.txt', 'false', 'false', '435--.html', '7', '', 'plan', '435_plan_77_0.txt', 'text/plain', '', '17.08.2018 17:17:39', '3648', 'vlad'),
(1066, '436', '1.png', '', '', '436---1-.html', '366626', '', 'material', 'material_24_0.png', 'image/png', '', '17.08.2018 20:32:05', '3628', 'Рома Иванов'),
(1067, '422', '422_половина.doc', 'false', 'false', '422--------.html', '88576', '', 'mat_sec', '422_polovina_65_0.doc', 'application/msword', 'true', '17.08.2018 23:39:25', '3562', 'Оксана'),
(1068, '422', '422_Нормативно-правовоі_акти,_що_регулюють_господарську_діяльність_та_їх_регулювання.docx', 'false', 'false', '422--------.html', '58272', '', 'essay', '422_vsia_rabota_3_0.docx', 'application/vnd.openxmlformats-officedocument.wordprocessingml.document', 'true', '17.08.2018 23:39:41', '3562', 'Оксана'),
(1069, '422', '422_отчет.docx', 'false', 'false', '422--------.html', '242298', '', 'unic', '422_unic_94_0.docx', 'application/vnd.openxmlformats-officedocument.wordprocessingml.document', 'true', '17.08.2018 23:40:05', '3562', 'Оксана');
INSERT INTO `order_files` (`id`, `order_id`, `file_name`, `viewed`, `viewed_client`, `alias`, `file_size`, `answer_content`, `upload_type`, `tmp_name`, `file_type`, `submited`, `upload_date`, `uploaded_by`, `uploader_name`) VALUES
(1070, '422', 'план.doc', 'false', 'false', '422--------.html', '28160', '', 'plan', '422_plan_6_0.doc', 'application/msword', '', '18.08.2018 14:08:00', '3562', 'Оксана'),
(1071, '437', 'Screenshot_14.jpg', 'false', 'false', '437--.html', '277100', '', 'plan', '437_plan_49_0.jpg', 'image/jpeg', 'true', '19.08.2018 21:17:11', '3737', 'автор Nik'),
(1072, '437', 'Screenshot_19.jpg', 'false', 'false', '437--.html', '275720', '', 'plan', '437_plan_15_0.jpg', 'image/jpeg', 'true', '19.08.2018 21:18:50', '3737', 'автор Nik'),
(1073, '433', 'стаття-половина.docx', 'false', 'false', '433-----------.html', '17192', 'true', 'plan', '433_plan_16_0.docx', 'application/vnd.openxmlformats-officedocument.wordprocessingml.document', '', '20.08.2018 04:22:17', '3598', 'Анна'),
(1074, '433', 'стаття-половина.docx', 'false', 'false', '433-----------.html', '17192', 'true', 'mat_sec', '433_polovina_53_0.docx', 'application/vnd.openxmlformats-officedocument.wordprocessingml.document', '', '20.08.2018 04:22:45', '3598', 'Анна'),
(1075, '433', 'Стаття_здоров\'язбереження.docx', 'false', 'false', '433-----------.html', '23388', 'true', 'essay', '433_vsia_rabota_79_0.docx', 'application/vnd.openxmlformats-officedocument.wordprocessingml.document', '', '20.08.2018 04:23:18', '3598', 'Анна'),
(1076, '433', 'звіт_здоров\'язбереження.docx', 'false', 'false', '433-----------.html', '71716', 'true', 'unic', '433_unic_13_0.docx', 'application/vnd.openxmlformats-officedocument.wordprocessingml.document', '', '20.08.2018 04:23:38', '3598', 'Анна'),
(1077, '405', 'Як__відомо.docx', 'false', 'false', '405------.html', '22189', '', 'mat_sec', '405_polovina_8_0.docx', 'application/vnd.openxmlformats-officedocument.wordprocessingml.document', 'true', '20.08.2018 06:31:15', '3709', 'Ольга'),
(1078, '425', '425_Сутність,_форми_і_роль_кредиту_в_сучасній_економіці..docx', 'false', 'false', '425------.html', '75850', '', 'essay', '425_vsia_rabota_25_0.docx', 'application/vnd.openxmlformats-officedocument.wordprocessingml.document', 'true', '20.08.2018 08:56:01', '3714', 'Анастасия '),
(1079, '425', 'Звіт.docx', 'false', 'false', '425------.html', '112911', '', 'unic', '425_unic_59_0.docx', 'application/vnd.openxmlformats-officedocument.wordprocessingml.document', 'true', '20.08.2018 09:08:06', '3714', 'Анастасия '),
(1080, '424', '424_Раздел_1_отправка.docx', 'false', 'false', '424------.html', '34490', '', 'mat_sec', '424_polovina_79_0.docx', 'application/vnd.openxmlformats-officedocument.wordprocessingml.document', '', '20.08.2018 15:56:42', '3562', 'Оксана'),
(1081, '245', '555.txt', 'false', 'false', '245-123123.html', '7', '', 'plan', '245_plan_27_0.txt', 'text/plain', '', '20.08.2018 16:53:59', '3648', 'vlad'),
(1082, '245', '555.txt', 'false', 'false', '245-123123.html', '7', '', 'mat_sec', '245_polovina_49_0.txt', 'text/plain', '', '20.08.2018 16:54:07', '3648', 'vlad'),
(1083, '245', '555.txt', 'false', 'false', '245-123123.html', '7', '', 'essay', '245_vsia_rabota_93_0.txt', 'text/plain', '', '20.08.2018 16:54:15', '3648', 'vlad'),
(1084, '245', '555.txt', 'false', 'false', '245-123123.html', '7', '', 'unic', '245_unic_72_0.txt', 'text/plain', '', '20.08.2018 16:54:22', '3648', 'vlad'),
(1085, '405', '20180820_101729.jpg', 'false', 'false', '405------.html', '2835177', '', 'check', '405_check_33_0.jpg', 'image/jpeg', 'true', '20.08.2018 20:59:17', '3718', 'Мария'),
(1086, '436', 'Задача_436.docx', 'false', 'false', '436---1-.html', '26192', '', 'essay', '436_vsia_rabota_67_0.docx', 'application/vnd.openxmlformats-officedocument.wordprocessingml.document', '', '20.08.2018 21:28:17', '3569', 'Юлия'),
(1087, '436', 'отчет.docx', 'false', 'false', '436---1-.html', '82885', '', 'unic', '436_unic_36_0.docx', 'application/vnd.openxmlformats-officedocument.wordprocessingml.document', '', '20.08.2018 21:28:36', '3569', 'Юлия'),
(1088, '436', 'Задача_половина.docx', 'false', 'false', '436---1-.html', '22202', '', 'mat_sec', '436_polovina_50_0.docx', 'application/vnd.openxmlformats-officedocument.wordprocessingml.document', '', '20.08.2018 21:38:07', '3569', 'Юлия'),
(1089, '438', 'IMG-596986786e0a396e720b6c1a3d9ea1e2-V.jpg', '', '', '438-----.html', '177333', '', 'material', 'material_9_0.jpg', 'image/jpeg', '', '21.08.2018 01:32:39', '3753', 'Аліна Колесник '),
(1090, '438', 'IMG-b20f556b65fbce1c475f899a8a493c24-V.jpg', '', '', '438-----.html', '204515', '', 'material', 'material_85_1.jpg', 'image/jpeg', '', '21.08.2018 01:32:39', '3753', 'Аліна Колесник '),
(1091, '438', 'IMG-fa1124176116e7a38674ceb480f80319-V.jpg', '', '', '438-----.html', '180919', '', 'material', 'material_35_2.jpg', 'image/jpeg', '', '21.08.2018 01:32:39', '3753', 'Аліна Колесник '),
(1092, '438', 'IMG-3c13f936a758c425f4da3ef2a9747955-V.jpg', '', '', '438-----.html', '227799', '', 'material', 'material_84_3.jpg', 'image/jpeg', '', '21.08.2018 01:32:39', '3753', 'Аліна Колесник '),
(1093, '438', 'IMG-20c1c2c0dc0992ac8512a58bb1b46faa-V.jpg', '', '', '438-----.html', '210259', '', 'material', 'material_95_4.jpg', 'image/jpeg', '', '21.08.2018 01:32:39', '3753', 'Аліна Колесник '),
(1094, '438', 'IMG-56a3830568bc9e0e2be789178f83415f-V.jpg', '', '', '438-----.html', '218983', '', 'material', 'material_14_5.jpg', 'image/jpeg', '', '21.08.2018 01:32:39', '3753', 'Аліна Колесник '),
(1095, '438', 'IMG-b5f33ad87542693d75bfa581ee940218-V.jpg', '', '', '438-----.html', '212675', '', 'material', 'material_14_6.jpg', 'image/jpeg', '', '21.08.2018 01:32:39', '3753', 'Аліна Колесник '),
(1096, '438', 'IMG-d20dd83397d630c3cbfcf7d0edc348a9-V.jpg', '', '', '438-----.html', '194915', '', 'material', 'material_77_7.jpg', 'image/jpeg', '', '21.08.2018 01:32:39', '3753', 'Аліна Колесник '),
(1097, '438', 'IMG-bff616bf99158874b0e7ae9eb1b2eca2-V.jpg', '', '', '438-----.html', '225732', '', 'material', 'material_48_8.jpg', 'image/jpeg', '', '21.08.2018 01:32:39', '3753', 'Аліна Колесник '),
(1098, '438', 'IMG-91248f66cf98bb6780c150f6bd865743-V.jpg', '', '', '438-----.html', '242887', '', 'material', 'material_26_9.jpg', 'image/jpeg', '', '21.08.2018 01:32:39', '3753', 'Аліна Колесник '),
(1099, '438', 'IMG-3834feea3d75c6a1d4b56c4c4b216c8d-V.jpg', '', '', '438-----.html', '227412', '', 'material', 'material_24_10.jpg', 'image/jpeg', '', '21.08.2018 01:32:39', '3753', 'Аліна Колесник '),
(1100, '438', 'IMG-2e22d961700174fa2de4d7360ba09ae5-V.jpg', '', '', '438-----.html', '158571', '', 'material', 'material_67_11.jpg', 'image/jpeg', '', '21.08.2018 01:32:39', '3753', 'Аліна Колесник '),
(1101, '438', 'IMG-73553fe287950cf24a4663b1b06345f6-V.jpg', '', '', '438-----.html', '221077', '', 'material', 'material_96_12.jpg', 'image/jpeg', '', '21.08.2018 01:32:39', '3753', 'Аліна Колесник '),
(1102, '440', 'treb_1534845668_5b7a98e72dee8-Методичка з написання курсових з ГПтаП.pdf', '', '', '440------.html', '533352', '', 'material', 'material_38_0.pdf', 'application/pdf', '', '21.08.2018 13:19:10', '3628', 'Рома Иванов'),
(1103, '440', 'План.docx', 'false', 'false', '440------.html', '10461', '', 'plan', '440_plan_42_0.docx', 'application/vnd.openxmlformats-officedocument.wordprocessingml.document', '', '22.08.2018 09:26:48', '3569', 'Юлия'),
(1104, '441', 'Кандидатская (финал) (1).doc', '', '', '441-------.html', '838656', '', 'material', 'material_15_0.doc', 'application/msword', '', '22.08.2018 09:32:45', '44343', ''),
(1105, '420', 'Screenshot_18.jpg', 'false', 'false', '420-------.html', '285243', '', 'material', '420_material_58_0.jpg', 'image/jpeg', 'true', '22.08.2018 22:28:14', '3736', 'заказчик Nik'),
(1106, '424', '424_Раздел_1_2.docx', 'false', 'false', '424------.html', '108874', '', 'mat_sec', '424_polovina_72_0.docx', 'application/vnd.openxmlformats-officedocument.wordprocessingml.document', '', '23.08.2018 13:03:36', '3562', 'Оксана'),
(1107, '464', 're434116 (1).zip', '', '', '464-The-impact-of-the-shadow-economy-on-taxation.html', '231410', '', 'material', 'material_56_0.zip', 'application/zip', '', '23.08.2018 13:42:53', '3628', 'Рома Иванов'),
(1108, '465', 'poloj_kvalif-rab.pdf', '', '', '465----------.html', '713301', '', 'material', 'material_2_0.pdf', 'application/pdf', '', '24.08.2018 13:11:47', '3778', 'Евгения Бабий'),
(1109, '465', 'дип работа.doc', '', '', '465----------.html', '409088', '', 'material', 'material_45_1.doc', 'application/msword', '', '24.08.2018 13:11:47', '3778', 'Евгения Бабий'),
(1111, '405', 'Як__відомо.docx', 'false', 'false', '405------.html', '36609', '', 'plan', '405_plan_11_0.docx', 'application/vnd.openxmlformats-officedocument.wordprocessingml.document', '', '24.08.2018 17:08:37', '3709', 'Ольга'),
(1112, '418', 'План.docx', 'false', 'false', '418-------.html', '12729', 'true', 'plan', '418_plan_4_0.docx', 'application/vnd.openxmlformats-officedocument.wordprocessingml.document', '', '24.08.2018 18:43:06', '3594', 'Владимир'),
(1113, '418', 'Народна_гра_магістерська.docx', 'false', 'false', '418-------.html', '77401', 'true', 'mat_sec', '418_polovina_66_0.docx', 'application/vnd.openxmlformats-officedocument.wordprocessingml.document', '', '24.08.2018 18:43:55', '3594', 'Владимир'),
(1114, '440', 'половина.docx', 'false', 'false', '440------.html', '30899', '', 'mat_sec', '440_polovina_50_0.docx', 'application/vnd.openxmlformats-officedocument.wordprocessingml.document', '', '25.08.2018 13:44:30', '3569', 'Юлия'),
(1115, '440', '440.docx', 'false', 'false', '440------.html', '60378', '', 'essay', '440_vsia_rabota_68_0.docx', 'application/vnd.openxmlformats-officedocument.wordprocessingml.document', '', '25.08.2018 13:45:28', '3569', 'Юлия'),
(1116, '440', 'отчет.docx', 'false', 'false', '440------.html', '433222', '', 'unic', '440_unic_90_0.docx', 'application/vnd.openxmlformats-officedocument.wordprocessingml.document', '', '25.08.2018 13:46:36', '3569', 'Юлия'),
(1117, '464', 'ПЛАН.docx', 'false', 'false', '464-The-impact-of-the-shadow-economy-on-taxation.html', '15777', '', 'plan', '464_plan_74_0.docx', 'application/vnd.openxmlformats-officedocument.wordprocessingml.document', '', '25.08.2018 19:07:07', '3766', 'Алена'),
(1118, '419', 'Дидактична_гра_магістерська.docx', 'false', 'false', '419------1-4--.html', '58890', '', 'mat_sec', '419_polovina_78_0.docx', 'application/vnd.openxmlformats-officedocument.wordprocessingml.document', '', '26.08.2018 08:52:08', '3594', 'Владимир'),
(1120, '424', '424_rozdil_3_i_4.docx', 'false', 'false', '424------.html', '97446', '', 'mat_sec', '424_polovina_51_0.docx', 'application/vnd.openxmlformats-officedocument.wordprocessingml.document', '', '27.08.2018 13:31:23', '3562', 'Оксана'),
(1121, '438', 'Практика.docx', 'false', 'false', '438-----.html', '45781', '', 'essay', '438_vsia_rabota_96_0.docx', 'application/vnd.openxmlformats-officedocument.wordprocessingml.document', 'true', '27.08.2018 13:34:35', '3723', 'Аліна'),
(1122, '424', '424_полностью.docx', 'false', 'false', '424------.html', '190478', '', 'mat_sec', '424_polovina_59_0.docx', 'application/vnd.openxmlformats-officedocument.wordprocessingml.document', '', '27.08.2018 13:35:19', '3562', 'Оксана'),
(1123, '438', 'Практика.docx', 'false', 'false', '438-----.html', '45781', '', 'unic', '438_unic_7_0.docx', 'application/vnd.openxmlformats-officedocument.wordprocessingml.document', '', '27.08.2018 13:35:54', '3723', 'Аліна'),
(1124, '438', 'Практика_половина.docx', 'false', 'false', '438-----.html', '31266', '', 'mat_sec', '438_polovina_75_0.docx', 'application/vnd.openxmlformats-officedocument.wordprocessingml.document', 'true', '27.08.2018 13:37:09', '3723', 'Аліна'),
(1125, '466', '555.txt', 'false', 'false', '466-123123123.html', '7', '', 'material', '466_material_53_0.txt', 'text/plain', 'true', '27.08.2018 14:35:36', '3628', 'Рома'),
(1126, '405', 'исправ.doc', 'false', 'false', '405------.html', '91136', '', 'essay', '405_vsia_rabota_87_0.doc', 'application/msword', 'true', '27.08.2018 22:01:25', '2562', 'Администратор'),
(1127, '405', 'отчет.docx', 'false', 'false', '405------.html', '74761', '', 'unic', '405_unic_34_0.docx', 'application/vnd.openxmlformats-officedocument.wordprocessingml.document', '', '27.08.2018 22:07:20', '2562', 'Администратор'),
(1128, '469', '555.txt', 'false', 'true', '469-123123.html', '7', '', 'material', '469_material_37_0.txt', 'text/plain', 'true', '28.08.2018 10:10:35', '3762', 'vlad'),
(1129, '469', '555.txt', 'false', 'true', '469-123123.html', '7', '', 'material', '469_material_52_0.txt', 'text/plain', 'true', '28.08.2018 10:10:54', '3762', 'vlad'),
(1130, '469', '555.txt', 'false', 'true', '469-123123.html', '7', '', 'material', '469_material_52_0.txt', 'text/plain', 'true', '28.08.2018 10:11:29', '3762', 'vlad'),
(1131, '469', '555.txt', 'false', 'true', '469-123123.html', '7', '', 'material', '469_material_66_0.txt', 'text/plain', 'true', '28.08.2018 10:16:47', '3762', 'vlad'),
(1132, '469', '555.txt', 'false', 'true', '469-123123.html', '7', '', 'material', '469_material_8_0.txt', 'text/plain', 'true', '28.08.2018 10:17:12', '3762', 'vlad'),
(1133, '469', '555.txt', 'false', 'true', '469-123123.html', '7', '', 'material', '469_material_51_0.txt', 'text/plain', 'true', '28.08.2018 10:17:52', '3762', 'vlad'),
(1134, '469', '555.txt', 'false', 'true', '469-123123.html', '7', '', 'material', '469_material_27_0.txt', 'text/plain', 'true', '28.08.2018 10:18:12', '3762', 'vlad'),
(1135, '469', '555.txt', 'false', 'true', '469-123123.html', '7', '', 'material', '469_material_31_0.txt', 'text/plain', 'true', '28.08.2018 10:20:52', '3762', 'vlad'),
(1136, '469', '555.txt', 'false', 'true', '469-123123.html', '7', '', 'material', '469_material_32_0.txt', 'text/plain', 'true', '28.08.2018 10:30:50', '3762', 'vlad'),
(1137, '469', '555.txt', 'false', 'true', '469-123123.html', '7', '', 'material', '469_material_94_0.txt', 'text/plain', 'true', '28.08.2018 10:31:47', '3762', 'vlad'),
(1138, '469', '555.txt', 'false', 'true', '469-123123.html', '7', '', 'material', '469_material_48_0.txt', 'text/plain', 'true', '28.08.2018 10:32:21', '3762', 'vlad'),
(1139, '469', '555.txt', 'false', 'true', '469-123123.html', '7', '', 'material', '469_material_85_0.txt', 'text/plain', 'true', '28.08.2018 10:35:14', '3762', 'vlad'),
(1140, '469', '555.txt', 'false', 'true', '469-123123.html', '7', '', 'material', '469_material_49_0.txt', 'text/plain', 'true', '28.08.2018 10:39:09', '3762', 'vlad'),
(1141, '469', '555.txt', 'false', 'true', '469-123123.html', '7', '', 'material', '469_material_40_0.txt', 'text/plain', 'true', '28.08.2018 10:39:59', '3762', 'vlad'),
(1142, '469', '555.txt', 'false', 'true', '469-123123.html', '7', '', 'material', '469_material_2_0.txt', 'text/plain', 'true', '28.08.2018 10:43:20', '3762', 'vlad'),
(1143, '469', '555.txt', 'false', 'true', '469-123123.html', '7', '', 'material', '469_material_74_0.txt', 'text/plain', 'true', '28.08.2018 10:49:25', '3762', 'vlad'),
(1144, '469', '555.txt', 'false', 'true', '469-123123.html', '7', '', 'material', '469_material_66_0.txt', 'text/plain', 'true', '28.08.2018 10:49:57', '3762', 'vlad'),
(1145, '470', '555.txt', 'false', 'false', '470-eqweqwe.html', '7', '', 'material', '470_material_75_0.txt', 'text/plain', 'true', '28.08.2018 10:52:29', '3762', 'vlad'),
(1146, '470', '555.txt', 'false', 'false', '470-eqweqwe.html', '7', '', 'material', '470_material_1_0.txt', 'text/plain', 'true', '28.08.2018 10:55:58', '3762', 'vlad'),
(1147, '470', '555.txt', 'false', 'false', '470-eqweqwe.html', '7', '', 'material', '470_material_86_0.txt', 'text/plain', 'true', '28.08.2018 10:57:31', '3762', 'vlad'),
(1148, '469', '555.txt', 'false', 'true', '469-123123.html', '7', '', 'material', '469_material_80_0.txt', 'text/plain', 'true', '28.08.2018 10:57:48', '3762', 'vlad'),
(1149, '471', '555.txt', 'false', 'false', '471-123123123.html', '7', '', 'material', '471_material_89_0.txt', 'text/plain', 'true', '28.08.2018 11:01:39', '3762', 'vlad'),
(1150, '472', '555.txt', 'false', 'false', '472-223242342.html', '7', '', 'material', '472_material_91_0.txt', 'text/plain', 'true', '28.08.2018 11:03:47', '3762', 'vlad'),
(1151, '472', '555.txt', 'false', 'false', '472-223242342.html', '7', '', 'material', '472_material_10_0.txt', 'text/plain', 'true', '28.08.2018 11:05:14', '3762', 'vlad'),
(1152, '472', '555.txt', 'false', 'false', '472-223242342.html', '7', '', 'material', '472_material_86_0.txt', 'text/plain', 'true', '28.08.2018 11:06:34', '3762', 'vlad'),
(1153, '472', '555.txt', 'false', 'false', '472-223242342.html', '7', '', 'material', '472_material_70_0.txt', 'text/plain', 'true', '28.08.2018 11:08:19', '3762', 'vlad'),
(1154, '469', '555.txt', 'false', 'true', '469-123123.html', '7', '', 'material', '469_material_77_0.txt', 'text/plain', 'true', '28.08.2018 11:26:34', '3762', 'vlad'),
(1155, '469', '555.txt', 'false', 'true', '469-123123.html', '7', '', 'material', '469_material_49_0.txt', 'text/plain', 'true', '28.08.2018 11:26:48', '3762', 'vlad'),
(1156, '469', '555.txt', 'false', 'true', '469-123123.html', '7', '', 'material', '469_material_72_0.txt', 'text/plain', 'true', '28.08.2018 11:28:49', '3762', 'vlad'),
(1157, '469', '555.txt', 'false', 'true', '469-123123.html', '7', '', 'material', '469_material_41_0.txt', 'text/plain', 'true', '28.08.2018 11:29:19', '3762', 'vlad'),
(1158, '469', '555.txt', 'false', 'true', '469-123123.html', '7', '', 'material', '469_material_10_0.txt', 'text/plain', 'true', '28.08.2018 11:48:24', '3762', 'vlad'),
(1159, '473', '555.txt', '', '', '473-1231231.html', '7', '', 'material', 'material_6_0.txt', 'text/plain', '', '28.08.2018 11:50:17', '3762', 'vlad zakaz'),
(1160, '473', '555.txt', 'false', 'false', '473-1231231.html', '7', '', 'material', '473_material_66_0.txt', 'text/plain', 'true', '28.08.2018 12:16:59', '3762', 'vlad'),
(1161, '473', '555.txt', 'false', 'false', '473-1231231.html', '7', '', 'material', '473_material_23_1.txt', 'text/plain', 'true', '28.08.2018 12:16:59', '3762', 'vlad'),
(1162, '469', '555.txt', 'false', 'true', '469-123123.html', '7', '', 'material', '469_material_9_0.txt', 'text/plain', 'true', '28.08.2018 12:17:39', '3762', 'vlad'),
(1163, '469', '555.txt', 'false', 'true', '469-123123.html', '7', '', 'material', '469_material_82_1.txt', 'text/plain', 'true', '28.08.2018 12:17:39', '3762', 'vlad'),
(1164, '437', 'задача.docx', 'false', 'false', '437--.html', '10619', '', 'material', '437_material_26_0.docx', 'application/vnd.openxmlformats-officedocument.wordprocessingml.document', '', '28.08.2018 12:45:02', '2562', 'Администратор'),
(1165, '400', 'задача.docx', 'false', 'false', '400-123123.html', '10619', '', 'material', '400_material_16_0.docx', 'application/vnd.openxmlformats-officedocument.wordprocessingml.document', '', '28.08.2018 12:45:54', '2562', 'Администратор'),
(1166, '474', '555.txt', 'false', 'false', '474-32131231.html', '7', '', 'material', '474_material_44_0.txt', 'text/plain', '', '28.08.2018 12:46:22', '2562', 'Администратор'),
(1167, '434', 'задача.docx', 'false', 'false', '434---.html', '10619', '', 'material', '434_material_66_0.docx', 'application/vnd.openxmlformats-officedocument.wordprocessingml.document', '', '28.08.2018 12:47:13', '2562', 'Администратор'),
(1168, '400', 'задача.docx', 'false', 'false', '400-123123.html', '10619', '', 'material', '400_material_83_0.docx', 'application/vnd.openxmlformats-officedocument.wordprocessingml.document', '', '28.08.2018 12:48:07', '2562', 'Администратор'),
(1169, '476', '555.txt', '', '', '476-1231231.html', '7', '', 'material', 'material_22_0.txt', 'text/plain', '', '28.08.2018 12:49:19', '3762', 'vlad zakaz'),
(1170, '476', '555.txt', '', '', '476-1231231.html', '7', '', 'material', 'material_45_1.txt', 'text/plain', '', '28.08.2018 12:49:19', '3762', 'vlad zakaz'),
(1171, '481', '555.txt', '', '', '481-123123.html', '7', '', 'material', 'material_83_0.txt', 'text/plain', '', '28.08.2018 13:20:04', '44343', ''),
(1172, '481', '555.txt', '', '', '481-123123.html', '7', '', 'material', 'material_29_1.txt', 'text/plain', '', '28.08.2018 13:20:04', '44343', ''),
(1173, '469', '555.txt', 'false', 'true', '469-123123.html', '7', '', 'plan', '469_plan_27_0.txt', 'text/plain', '', '28.08.2018 13:42:22', '3648', 'vlad'),
(1174, '469', '555.txt', 'false', 'true', '469-123123.html', '7', '', 'mat_sec', '469_polovina_96_0.txt', 'text/plain', '', '28.08.2018 13:42:28', '3648', 'vlad'),
(1175, '469', '555.txt', 'false', 'true', '469-123123.html', '7', '', 'essay', '469_vsia_rabota_65_0.txt', 'text/plain', '', '28.08.2018 13:42:35', '3648', 'vlad'),
(1176, '469', '555.txt', 'false', 'true', '469-123123.html', '7', '', 'unic', '469_unic_17_0.txt', 'text/plain', '', '28.08.2018 13:42:43', '3648', 'vlad'),
(1177, '467', 'Юридичні_та_економічні_засади_створення_підприємств1.docx', 'false', 'false', '467------.html', '12282', '', 'plan', '467_plan_56_0.docx', 'application/vnd.openxmlformats-officedocument.wordprocessingml.document', 'true', '28.08.2018 14:07:30', '3784', 'Дмитро'),
(1178, '394', 'задача.docx', 'false', 'false', '394--.html', '10619', '', 'essay', '394_vsia_rabota_41_0.docx', 'application/vnd.openxmlformats-officedocument.wordprocessingml.document', '', '29.08.2018 08:53:37', '3556', 'Автор '),
(1179, '449', 'Screenshot_9.jpg', 'false', 'false', '449--.html', '227697', '', 'plan', '449_plan_86_0.jpg', 'image/jpeg', '', '29.08.2018 10:12:10', '3737', 'автор Nik'),
(1180, '449', 'Screenshot_11.jpg', 'false', 'false', '449--.html', '276589', '', 'mat_sec', '449_polovina_65_0.jpg', 'image/jpeg', '', '29.08.2018 10:12:27', '3737', 'автор Nik'),
(1181, '449', 'Screenshot_12.jpg', 'false', 'false', '449--.html', '276962', '', 'essay', '449_vsia_rabota_66_0.jpg', 'image/jpeg', '', '29.08.2018 10:12:37', '3737', 'автор Nik'),
(1182, '449', 'Screenshot_31.jpg', 'false', 'false', '449--.html', '304634', '', 'unic', '449_unic_40_0.jpg', 'image/jpeg', '', '29.08.2018 10:12:56', '3737', 'автор Nik'),
(1183, '417', 'Screenshot_10.png', 'false', 'false', '417--.html', '18560', '', 'plan', '417_plan_18_0.png', 'image/png', '', '29.08.2018 10:20:39', '3556', 'Автор '),
(1184, '417', 'Screenshot_4.png', 'false', 'false', '417--.html', '128041', '', 'mat_sec', '417_polovina_38_0.png', 'image/png', '', '29.08.2018 10:21:02', '3556', 'Автор '),
(1185, '417', 'Screenshot_7.png', 'false', 'false', '417--.html', '3827', '', 'essay', '417_vsia_rabota_49_0.png', 'image/png', '', '29.08.2018 10:21:16', '3556', 'Автор '),
(1186, '417', 'Screenshot_7.png', 'false', 'false', '417--.html', '3827', '', 'unic', '417_unic_47_0.png', 'image/png', '', '29.08.2018 10:21:33', '3556', 'Автор '),
(1187, '400', 'Screenshot_4.png', 'false', 'false', '400-123123.html', '128041', '', 'plan', '400_plan_95_0.png', 'image/png', '', '29.08.2018 10:25:06', '3556', 'Автор '),
(1188, '438', 'Практика.docx', 'false', 'false', '438-----.html', '46807', '', 'essay', '438_vsia_rabota_51_0.docx', 'application/vnd.openxmlformats-officedocument.wordprocessingml.document', 'true', '29.08.2018 10:25:37', '3723', 'Аліна'),
(1189, '490', 'treb_1535532838_Метод_курсова_2016 (1).doc', '', '', '490-----.html', '364032', '', 'material', 'material_81_0.doc', 'application/msword', '', '29.08.2018 15:01:00', '3628', 'Рома Иванов'),
(1190, '417', 'задача.docx', 'false', 'false', '417--.html', '10619', '', 'essay', '417_vsia_rabota_41_0.docx', 'application/vnd.openxmlformats-officedocument.wordprocessingml.document', '', '29.08.2018 15:07:04', '3556', 'Автор '),
(1191, '359', 'задача.docx', 'false', 'false', '359-121.html', '10619', '', 'plan', '359_plan_27_0.docx', 'application/vnd.openxmlformats-officedocument.wordprocessingml.document', '', '29.08.2018 15:09:09', '3556', 'Автор '),
(1192, '359', 'задача.docx', 'false', 'false', '359-121.html', '10619', '', 'mat_sec', '359_polovina_18_0.docx', 'application/vnd.openxmlformats-officedocument.wordprocessingml.document', '', '29.08.2018 15:09:29', '3556', 'Автор '),
(1193, '359', 'задача.docx', 'false', 'false', '359-121.html', '10619', '', 'essay', '359_vsia_rabota_22_0.docx', 'application/vnd.openxmlformats-officedocument.wordprocessingml.document', '', '29.08.2018 15:09:48', '3556', 'Автор '),
(1194, '359', 'задача.docx', 'false', 'false', '359-121.html', '10619', '', 'unic', '359_unic_60_0.docx', 'application/vnd.openxmlformats-officedocument.wordprocessingml.document', '', '29.08.2018 15:10:07', '3556', 'Автор '),
(1195, '359', 'задача.docx', 'false', 'false', '359-121.html', '10619', '', 'essay', '359_vsia_rabota_87_0.docx', 'application/vnd.openxmlformats-officedocument.wordprocessingml.document', '', '29.08.2018 15:12:14', '3556', 'Автор '),
(1196, '493', '0005-newspaper.pdf', '', '', '493---VV.html', '1098', '', 'material', 'material_78_0.pdf', 'application/pdf', '', '29.08.2018 22:30:22', '3645', 'John Doe'),
(1197, '443', '555.txt', 'false', 'false', '443---.html', '7', '', 'material', '443_material_73_0.txt', 'text/plain', 'true', '30.08.2018 16:01:04', '3762', 'vlad'),
(1198, '496', '555.txt', 'false', 'false', '496-123123.html', '7', '', 'material', '496_material_66_0.txt', 'text/plain', 'true', '30.08.2018 16:02:37', '3762', 'vlad'),
(1199, '498', '555.txt', '', '', '498-123123.html', '7', '', 'material', 'material_85_0.txt', 'text/plain', '', '30.08.2018 16:08:46', '44343', ''),
(1200, '498', '555.txt', '', '', '498-123123.html', '7', '', 'material', 'material_27_1.txt', 'text/plain', '', '30.08.2018 16:08:46', '44343', ''),
(1201, '492', '555.txt', 'false', 'false', '492-123123.html', '7', '', 'material', '492_material_23_0.txt', 'text/plain', '', '30.08.2018 16:24:40', '2562', 'Администратор'),
(1202, '492', '555.txt', 'false', 'false', '492-123123.html', '7', '', 'material', '492_material_49_0.txt', 'text/plain', '', '30.08.2018 16:33:24', '2562', 'Администратор'),
(1203, '499', '6.030401 Правознавство Юрклініка (1).doc', '', '', '499------.html', '140800', '', 'material', 'material_38_0.doc', 'application/msword', '', '30.08.2018 19:12:56', '3628', 'Рома Иванов'),
(1204, '499', '2016 НУОЮА Практика 02 Титульний аркуш.doc', '', '', '499------.html', '225792', '', 'material', 'material_64_1.doc', 'application/msword', '', '30.08.2018 19:12:56', '3628', 'Рома Иванов'),
(1205, '467', '467_половина.docx', 'false', 'false', '467------.html', '65767', '', 'mat_sec', '467_polovina_50_0.docx', 'application/vnd.openxmlformats-officedocument.wordprocessingml.document', 'true', '30.08.2018 22:18:05', '3569', 'Юлия'),
(1206, '495', '555.txt', 'false', 'false', '495-----.html', '7', '', 'plan', '495_plan_90_0.txt', 'text/plain', '', '31.08.2018 10:45:54', '3648', 'vlad'),
(1207, '495', '555.txt', 'false', 'false', '495-----.html', '7', '', 'plan', '495_plan_84_0.txt', 'text/plain', '', '31.08.2018 10:46:08', '3648', 'vlad');

-- --------------------------------------------------------

--
-- Структура таблицы `order_messages`
--

CREATE TABLE `order_messages` (
  `id` int(11) NOT NULL,
  `orderid` varchar(20) NOT NULL,
  `senderid` varchar(60) NOT NULL,
  `sender_name` varchar(60) NOT NULL,
  `whom` varchar(255) NOT NULL,
  `from_who` varchar(255) NOT NULL,
  `viewed` varchar(255) NOT NULL,
  `viewed_writer` varchar(255) NOT NULL,
  `viewed_client` varchar(255) NOT NULL,
  `receiverid` varchar(50) NOT NULL,
  `receiver_name` varchar(60) NOT NULL,
  `message_body` text NOT NULL,
  `date_posted` varchar(50) NOT NULL,
  `approval` varchar(30) NOT NULL,
  `msg_read` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `order_messages`
--

INSERT INTO `order_messages` (`id`, `orderid`, `senderid`, `sender_name`, `whom`, `from_who`, `viewed`, `viewed_writer`, `viewed_client`, `receiverid`, `receiver_name`, `message_body`, `date_posted`, `approval`, `msg_read`) VALUES
(2027, '415', '3744', 'Vlad Zakaz', 'avtor', 'zakaz', 'true', 'true', 'true', '3648', '', '12312', '2018/08/06 12:41:12', '06.08.2018 12:41:12', '1'),
(2028, '415', '3648', 'vlad avtor', 'manager', 'avtor', 'false', 'true', 'true', '2562', '', '12312', '2018/08/06 12:42:23', '06.08.2018 12:42:23', '1'),
(2029, '415', '3648', 'vlad avtor', 'zakaz', 'avtor', 'true', 'true', 'false', '3744', '', '123121', '2018/08/06 12:43:01', '06.08.2018 12:43:01', '0'),
(2030, '415', '3648', 'vlad avtor', 'manager', 'avtor', 'false', 'true', 'true', '2562', '', '1231', '2018/08/06 12:43:18', '06.08.2018 12:43:18', '1'),
(2031, '415', '3648', 'vlad avtor', 'zakaz', 'avtor', 'true', 'true', 'false', '3744', '', 'ewqeweq', '2018/08/06 12:44:34', '06.08.2018 12:44:34', '0'),
(2032, '415', '3744', 'Vlad Zakaz', 'avtor', 'zakaz', 'true', 'true', 'true', '3648', '', 'qweqwe', '2018/08/06 12:44:53', '06.08.2018 12:44:53', '1'),
(2033, '415', '3648', 'vlad avtor', 'manager', 'avtor', 'false', 'true', 'true', '2562', '', '123123', '2018/08/06 12:45:18', '06.08.2018 12:45:18', '1'),
(2034, '415', '3744', 'Vlad Zakaz', 'manager', 'zakaz', 'false', 'true', 'true', '2562', '', '123123', '2018/08/06 12:45:32', '06.08.2018 12:45:32', '1'),
(2035, '415', '2562', 'Администратор Администратор', 'zakaz', 'admin', 'true', 'true', 'false', '3744', '', '123123', '2018/08/06 12:45:48', '06.08.2018 12:45:48', '0'),
(2036, '415', '2562', 'Администратор Администратор', 'avtor', 'admin', 'true', 'true', 'true', '3648', '', '312312', '2018/08/06 12:45:52', '06.08.2018 12:45:52', '1'),
(2037, '415', '2562', 'Администратор Администратор', 'zakaz', 'admin', 'true', 'true', 'false', '3744', '', 'йцуйцу', '2018/08/06 13:27:40', '06.08.2018 13:27:40', '0'),
(2038, '415', '2562', 'Администратор Администратор', 'zakaz', 'admin', 'true', 'true', 'false', '3744', '', 'фывфывфывфывфывфывф', '2018/08/06 13:28:39', '06.08.2018 13:28:39', '0'),
(2039, '415', '2562', 'Администратор Администратор', 'avtor', 'admin', 'true', 'true', 'true', '3648', '', 'фывфыв', '2018/08/06 13:28:52', '06.08.2018 13:28:52', '1'),
(2040, '111', '2562', 'Администратор Администратор', 'avtor', 'admin', 'true', 'true', 'true', '3556', '', 'проверка', '2018/08/07 10:31:40', '07.08.2018 10:31:40', '1'),
(2041, '111', '3559', 'Наталия  Петрова ', 'avtor', 'manager', 'true', 'true', 'true', '3556', '', 'проверка ', '2018/08/07 10:38:56', '07.08.2018 10:38:56', '1'),
(2042, '407', '3628', 'Рома Иванов', 'avtor', 'zakaz', 'true', 'true', 'true', '3556', '', 'проверка', '2018/08/07 11:13:29', '07.08.2018 11:13:29', '1'),
(2043, '416', '3566', 'Инна  Павлова', 'avtor', 'manager', 'true', 'true', 'true', '3556', '', 'Здравствуйте! тема работы \\\" 123\\\"', '2018/08/08 21:09:03', '08.08.2018 21:09:03', '1'),
(2044, '420', '3736', 'заказчик Nik sadsad', 'manager', 'zakaz', 'false', 'true', 'true', '', '', 'ыфвфыв', '2018/08/10 02:14:46', '10.08.2018 02:14:46', '1'),
(2045, '420', '3736', 'заказчик Nik sadsad', 'manager', 'zakaz', 'false', 'true', 'true', '', '', 'фывфв', '2018/08/10 02:14:49', '10.08.2018 02:14:49', '1'),
(2046, '414', '3737', 'автор Nik aasdasd', 'zakaz', 'avtor', 'true', 'true', 'true', '3736', '', 'sadasd', '2018/08/10 02:31:04', '10.08.2018 02:31:04', '1'),
(2047, '414', '3737', 'автор Nik aasdasd', 'manager', 'avtor', 'false', 'true', 'true', '3738', '', 'sadasd', '2018/08/10 02:31:09', '10.08.2018 02:31:09', '1'),
(2048, '414', '3736', 'заказчик Nik sadsad', 'avtor', 'zakaz', 'true', 'true', 'true', '3737', '', 'asdasd', '2018/08/10 02:31:26', '10.08.2018 02:31:26', '1'),
(2049, '414', '3736', 'заказчик Nik sadsad', 'manager', 'zakaz', 'false', 'true', 'true', '3738', '', 'asdasdsa', '2018/08/10 02:31:32', '10.08.2018 02:31:32', '1'),
(2050, '414', '3736', 'заказчик Nik sadsad', 'avtor', 'zakaz', 'true', 'true', 'true', '3737', '', 'asdasd', '2018/08/10 02:39:27', '10.08.2018 02:39:27', '1'),
(2051, '422', '2562', 'Администратор Администратор', 'zakaz', 'admin', 'true', 'true', 'false', '3753', '', 'Здравствуйте! Писать по плану который указан в методичке? ', '2018/08/12 08:39:22', '12.08.2018 08:39:22', '1'),
(2052, '422', '3566', 'Инна  Павлова', 'avtor', 'manager', 'true', 'true', 'true', '3562', '', 'Здравствуйте! План в методичке ', '2018/08/12 19:06:10', '12.08.2018 19:06:10', '1'),
(2053, '425', '3566', 'Инна  Павлова', 'avtor', 'manager', 'true', 'true', 'true', '3714', '', 'Здравствуйте! Когда ожидать план? ', '2018/08/14 09:46:24', '14.08.2018 09:46:24', '1'),
(2054, '425', '3714', 'Анастасия  Малета', 'manager', 'avtor', 'false', 'true', 'true', '3566', '', 'Уже вылаживаю', '2018/08/14 09:48:38', '14.08.2018 09:48:38', '1'),
(2055, '425', '3566', 'Инна  Павлова', 'avtor', 'manager', 'true', 'true', 'true', '3714', '', 'спасибо', '2018/08/14 10:09:21', '14.08.2018 10:09:21', '1'),
(2056, '420', '3737', 'автор Nik aasdasd', 'zakaz', 'avtor', 'true', 'true', 'true', '3736', '', 'фывфыв', '2018/08/16 00:44:19', '16.08.2018 00:44:19', '1'),
(2057, '420', '3736', 'заказчик Nik sadsad', 'avtor', 'zakaz', 'true', 'false', 'true', '3737', '', 'ЫВыв', '2018/08/16 00:45:28', '16.08.2018 00:45:28', '1'),
(2058, '420', '3737', 'автор Nik aasdasd', 'zakaz', 'avtor', 'true', 'true', 'true', '3736', '', 'фывфыв', '2018/08/16 00:46:03', '16.08.2018 00:46:03', '1'),
(2059, '420', '3736', 'заказчик Nik sadsad', 'manager', 'zakaz', 'false', 'true', 'true', '3738', '', 'ыфвфывфы', '2018/08/16 00:46:31', '16.08.2018 00:46:31', '1'),
(2060, '425', '3566', 'Инна  Павлова', 'avtor', 'manager', 'true', 'true', 'true', '3714', '', 'Здравствуйте! так план еще не утвердили ', '2018/08/16 09:55:49', '16.08.2018 09:55:49', '1'),
(2061, '425', '3714', 'Анастасия  Малета', 'manager', 'avtor', 'false', 'true', 'true', '3566', '', 'Здравствуйте! По графику было написано выложить до 16.008 я и выложила, ', '2018/08/16 10:14:00', '16.08.2018 10:14:00', '1'),
(2062, '425', '3566', 'Инна  Павлова', 'avtor', 'manager', 'true', 'true', 'true', '3714', '', 'здесь работаем так же как и на почте, если нужно было утверждать план, то ожидаем его утверждения, пока не делайте дальше, ждем ответа заказчика. Спасибо! ', '2018/08/16 10:34:41', '16.08.2018 10:34:41', '1'),
(2063, '425', '3714', 'Анастасия  Малета', 'manager', 'avtor', 'false', 'true', 'true', '3566', '', 'Хорошо, спасибо ', '2018/08/16 10:45:39', '16.08.2018 10:45:39', '1'),
(2064, '419', '3566', 'Инна  Павлова', 'avtor', 'manager', 'true', 'false', 'true', '3594', '', 'Здравствуйте! половина на 25.08, готовая на 09.09 ', '2018/08/16 12:48:47', '16.08.2018 12:48:47', '1'),
(2065, '418', '3566', 'Инна  Павлова', 'avtor', 'manager', 'true', 'false', 'true', '3594', '', 'Здравствуйте! половина на 25.08, готовая на 09.09 ', '2018/08/16 12:50:01', '16.08.2018 12:50:01', '1'),
(2066, '425', '3566', 'Инна  Павлова', 'avtor', 'manager', 'true', 'true', 'true', '3714', '', 'Здравствуйте! План утвердили без изменений ', '2018/08/16 23:19:05', '16.08.2018 23:19:05', '1'),
(2067, '434', '2562', 'Администратор Администратор', 'zakaz', 'admin', 'true', 'true', 'false', '3764', '', ' дллордложло', '2018/08/17 16:24:41', '17.08.2018 16:24:41', '0'),
(2068, '434', '2562', 'Администратор Администратор', 'zakaz', 'admin', 'true', 'true', 'false', '3764', '', 'вапывапывап', '2018/08/17 16:50:21', '17.08.2018 16:50:21', '0'),
(2069, '434', '2562', 'Администратор Администратор', 'zakaz', 'admin', 'true', 'true', 'false', '3764', '', 'долдолд', '2018/08/17 16:50:49', '17.08.2018 16:50:49', '0'),
(2070, '245', '3648', 'vlad avtor', 'manager', 'avtor', 'false', 'true', 'true', '2562', '', 'asdasd', '2018/08/17 16:59:24', '17.08.2018 16:59:24', '1'),
(2071, '245', '3648', 'vlad avtor', 'manager', 'avtor', 'false', 'true', 'true', '2562', '', 'asdasd', '2018/08/17 16:59:26', '17.08.2018 16:59:26', '1'),
(2072, '245', '3648', 'vlad avtor', 'manager', 'avtor', 'false', 'true', 'true', '2562', '', 'asdasd', '2018/08/17 16:59:29', '17.08.2018 16:59:29', '1'),
(2073, '430', '3762', 'vlad zakaz', 'manager', 'zakaz', 'false', 'true', 'true', '2562', '', 'qweqwe', '2018/08/17 17:01:22', '17.08.2018 17:01:22', '0'),
(2074, '430', '3762', 'vlad zakaz', 'manager', 'zakaz', 'false', 'true', 'true', '2562', '', 'qweqw', '2018/08/17 17:01:24', '17.08.2018 17:01:24', '0'),
(2075, '434', '2562', 'Администратор Администратор', 'zakaz', 'admin', 'true', 'true', 'false', '3764', '', 'ыфывфывф', '2018/08/17 17:01:55', '17.08.2018 17:01:55', '0'),
(2076, '417', '3556', 'Автор  Иванов', 'manager', 'avtor', 'false', 'true', 'true', '3566', '', 'fdfd', '2018/08/17 21:02:00', '17.08.2018 21:02:00', '1'),
(2077, '417', '3556', 'Автор  Иванов', 'manager', 'avtor', 'false', 'true', 'true', '3566', '', 'drgdfg', '2018/08/17 21:02:16', '17.08.2018 21:02:16', '1'),
(2078, '417', '3556', 'Автор  Иванов', 'manager', 'avtor', 'false', 'true', 'true', '3566', '', 'dfggfg', '2018/08/17 21:02:20', '17.08.2018 21:02:20', '1'),
(2079, '417', '3556', 'Автор  Иванов', 'manager', 'avtor', 'false', 'true', 'true', '3566', '', 'fdg', '2018/08/17 21:02:23', '17.08.2018 21:02:23', '1'),
(2080, '417', '2562', 'Администратор Администратор', 'zakaz', 'admin', 'true', 'true', 'false', '3653', '', 'проверка', '2018/08/18 08:22:54', '18.08.2018 08:22:54', '1'),
(2081, '422', '3562', 'Оксана Теленик', 'manager', 'avtor', 'false', 'true', 'true', '3566', '', 'Пока не прикрепила план (хотя его не надо было утвеждать)- не было видно комманды \\\"отметить, как прочитанное).', '2018/08/18 14:10:56', '18.08.2018 14:10:56', '1'),
(2082, '422', '3566', 'Инна  Павлова', 'avtor', 'manager', 'true', 'true', 'true', '3562', '', 'не совсем понимаю \\\"отметить, как прочитанное\\\"', '2018/08/18 14:18:31', '18.08.2018 14:18:31', '1'),
(2083, '422', '3562', 'Оксана Теленик', 'manager', 'avtor', 'false', 'true', 'true', '3566', '', '\\\"Отметить, как выполненный\\\"', '2018/08/18 14:20:34', '18.08.2018 14:20:34', '1'),
(2084, '407', '3556', 'Автор  Иванов', 'manager', 'avtor', 'false', 'true', 'true', '2562', '', 'вава', '2018/08/18 18:14:35', '18.08.2018 18:14:35', '1'),
(2085, '417', '3556', 'Автор  Иванов', 'manager', 'avtor', 'false', 'true', 'true', '3566', '', 'фкафыкап', '2018/08/18 18:15:50', '18.08.2018 18:15:50', '1'),
(2086, '433', '3598', 'Анна Козіна', 'manager', 'avtor', 'false', 'true', 'true', '3566', '', 'Доброго дня, зверніть увагу замовник щоб самостійно вписав своє ім\\\'я та місто на першій сотрінці, так як мені ні одне ні друге не відомо. І стосовно назви секції, я написала ПЕДАГОГІЧНІ НАУКИ, але нехай подивиться можливо на цій конференції є більш чіткий поділ.\r\nІ ще там останнє має бути довідка про автора, яку я звичайно не писала.', '2018/08/20 04:28:07', '20.08.2018 04:28:07', '1'),
(2087, '433', '3566', 'Инна  Павлова', 'avtor', 'manager', 'true', 'false', 'true', '3598', '', 'Здравствуйте! Спасибо', '2018/08/20 08:31:22', '20.08.2018 08:31:22', '1'),
(2088, '439', '2562', 'Администратор Администратор', 'zakaz', 'admin', 'true', 'true', 'true', '3762', '', 'asdasda', '2018/08/21 11:48:40', '21.08.2018 11:48:40', '1'),
(2089, '403', '2562', 'Администратор Администратор', 'zakaz', 'admin', 'true', 'true', 'false', '3628', '', 'gffvvv', '2018/08/21 12:18:41', '21.08.2018 12:18:41', '1'),
(2090, '403', '2562', 'Администратор Администратор', 'zakaz', 'admin', 'true', 'true', 'false', '3628', '', 'werwer', '2018/08/21 12:42:56', '21.08.2018 12:42:56', '1'),
(2091, '403', '2562', 'Администратор Администратор', 'avtor', 'admin', 'true', 'true', 'true', '3737', '', 'qweqwe', '2018/08/21 12:43:03', '21.08.2018 12:43:03', '0'),
(2092, '403', '3648', 'vlad avtor', 'zakaz', 'avtor', 'true', 'true', 'false', '3628', '', '123123', '2018/08/21 12:44:21', '21.08.2018 12:44:21', '1'),
(2093, '403', '3648', 'vlad avtor', 'manager', 'avtor', 'false', 'true', 'true', '2562', '', '11231', '2018/08/21 12:44:25', '21.08.2018 12:44:25', '1'),
(2094, '403', '3648', 'vlad avtor', 'manager', 'avtor', 'false', 'true', 'true', '2562', '', '2122222222222222222', '2018/08/21 12:44:29', '21.08.2018 12:44:29', '1'),
(2095, '439', '3762', 'vlad zakaz', 'avtor', 'zakaz', 'true', 'true', 'true', '3648', '', 'hello avtor', '2018/08/21 12:45:18', '21.08.2018 12:45:18', '1'),
(2096, '439', '3648', 'vlad avtor', 'zakaz', 'avtor', 'true', 'true', 'true', '3762', '', 'hello zakaz', '2018/08/21 12:45:41', '21.08.2018 12:45:41', '1'),
(2097, '439', '2562', 'Администратор Администратор', 'zakaz', 'admin', 'true', 'true', 'true', '3762', '', 'eqweqweqweqwe', '2018/08/21 12:45:54', '21.08.2018 12:45:54', '1'),
(2098, '439', '2562', 'Администратор Администратор', 'avtor', 'admin', 'true', 'true', 'true', '3648', '', 'qweqwe', '2018/08/21 12:45:57', '21.08.2018 12:45:57', '1'),
(2099, '436', '3628', 'Рома Иванов', 'manager', 'zakaz', 'false', 'true', 'true', '3566', '', 'kkkkkkkkkkk', '2018/08/21 13:00:12', '21.08.2018 13:00:12', '1'),
(2100, '436', '3628', 'Рома Иванов', 'manager', 'zakaz', 'false', 'true', 'true', '3566', '', '\\\'\\\'\\\'\\\'\\\'\\\'\\\'', '2018/08/21 13:00:17', '21.08.2018 13:00:17', '1'),
(2101, '436', '2562', 'Администратор Администратор', 'zakaz', 'admin', 'true', 'true', 'false', '3628', '', '\\\"\\\"', '2018/08/21 13:01:06', '21.08.2018 13:01:06', '1'),
(2102, '436', '3648', 'vlad avtor', 'zakaz', 'avtor', 'true', 'true', 'false', '3628', '', '\\\"\\\"\\\"\\\"\\\"\\\"', '2018/08/21 13:06:33', '21.08.2018 13:06:33', '1'),
(2103, '436', '3628', 'Рома Иванов', 'avtor', 'zakaz', 'true', 'true', 'true', '3569', '', '\\\'\\\'\\\'\\\'\\\'\\\'\\\'\\\'\\\'\\\'\\\'', '2018/08/21 13:06:47', '21.08.2018 13:06:47', '1'),
(2104, '436', '3628', 'Рома Иванов', 'avtor', 'zakaz', 'true', 'true', 'true', '3569', '', 'asdasdasdasdasdasd', '2018/08/21 13:07:45', '21.08.2018 13:07:45', '1'),
(2105, '436', '3648', 'vlad avtor', 'zakaz', 'avtor', 'true', 'true', 'false', '3628', '', '\\\'\\\'\\\'\\\'\\\' \\\' \\\' \\\' \\\' \\\' \\\' \r\n \\\" \\\" \\\" \\\" \\\" \\\" \\\" \r\n~~~~~~\r\n~` ` ` ` `` ` ` ` ` ` \r\n\r\n/////////\r\n\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\r\n', '2018/08/21 13:08:52', '21.08.2018 13:08:52', '1'),
(2106, '443', '3762', 'vlad zakaz', 'manager', 'zakaz', 'false', 'true', 'true', '', '', '\\\"лкорп\\\"', '2018/08/22 10:45:02', '22.08.2018 10:45:02', '1'),
(2107, '443', '2562', 'Администратор Администратор', 'zakaz', 'admin', 'true', 'true', 'true', '3762', '', '1231231', '2018/08/22 11:28:48', '22.08.2018 11:28:48', '1'),
(2108, '443', '3548', 'vlad_manager ukr.net', 'zakaz', 'manager', 'true', 'true', 'true', '3762', '', 'цйуйцу', '2018/08/22 11:29:37', '22.08.2018 11:29:37', '1'),
(2109, '443', '2562', 'Администратор Администратор', 'avtor', 'admin', 'true', 'true', 'true', '3648', '', 'йцуйц', '2018/08/22 11:30:17', '22.08.2018 11:30:17', '1'),
(2110, '443', '3648', 'vlad avtor', 'manager', 'avtor', 'false', 'true', 'true', '3548', '', '1231231', '2018/08/22 11:30:52', '22.08.2018 11:30:52', '1'),
(2111, '443', '3648', 'vlad avtor', 'zakaz', 'avtor', 'true', 'true', 'true', '3762', '', '123123', '2018/08/22 11:31:04', '22.08.2018 11:31:04', '1'),
(2112, '443', '3762', 'vlad zakaz', 'manager', 'zakaz', 'false', 'true', 'true', '3548', '', '1231231', '2018/08/22 11:31:17', '22.08.2018 11:31:17', '1'),
(2113, '443', '3762', 'vlad zakaz', 'avtor', 'zakaz', 'true', 'true', 'true', '3648', '', '1231231', '2018/08/22 11:31:20', '22.08.2018 11:31:20', '1'),
(2114, '443', '2562', 'Администратор Администратор', 'avtor', 'admin', 'true', 'true', 'true', '3648', '', 'йцуйцуй', '2018/08/22 11:31:39', '22.08.2018 11:31:39', '1'),
(2115, '443', '3548', 'vlad_manager ukr.net', 'avtor', 'manager', 'true', 'true', 'true', '3648', '', 'йцуйцу', '2018/08/22 11:31:48', '22.08.2018 11:31:48', '1'),
(2116, '443', '3548', 'vlad_manager ukr.net', 'zakaz', 'manager', 'true', 'true', 'true', '3762', '', 'йцуйцу', '2018/08/22 11:31:52', '22.08.2018 11:31:52', '1'),
(2117, '454', '3566', 'Инна  Павлова', 'zakaz', 'manager', 'true', 'true', 'false', '3628', '', '\\\"ваппапыва\\\"', '2018/08/22 22:33:39', '22.08.2018 22:33:39', '1'),
(2118, '454', '2562', 'Администратор Администратор', 'zakaz', 'admin', 'true', 'true', 'false', '3628', '', 'аолполпло', '2018/08/22 22:34:08', '22.08.2018 22:34:08', '1'),
(2119, '454', '2562', 'Администратор Администратор', 'zakaz', 'admin', 'true', 'true', 'false', '3628', '', 'ыепыапр', '2018/08/22 22:34:46', '22.08.2018 22:34:46', '1'),
(2120, '420', '3736', 'заказчик Nik sadsad', 'avtor', 'zakaz', 'true', 'false', 'true', '3737', '', 'опонп', '2018/08/22 22:36:17', '22.08.2018 22:36:17', '1'),
(2121, '420', '3737', 'автор Nik aasdasd', 'zakaz', 'avtor', 'true', 'true', 'true', '3736', '', 'лгргр', '2018/08/22 22:36:38', '22.08.2018 22:36:38', '1'),
(2122, '420', '2562', 'Администратор Администратор', 'zakaz', 'admin', 'true', 'true', 'true', '3736', '', 'опаор', '2018/08/22 22:38:07', '22.08.2018 22:38:07', '1'),
(2123, '420', '2562', 'Администратор Администратор', 'avtor', 'admin', 'true', 'false', 'true', '3737', '', 'онпгр', '2018/08/22 22:38:57', '22.08.2018 22:38:57', '1'),
(2124, '420', '2562', 'Администратор Администратор', 'zakaz', 'admin', 'true', 'true', 'true', '3736', '', 'лпорп', '2018/08/22 22:39:04', '22.08.2018 22:39:04', '1'),
(2125, '417', '2562', 'Администратор Администратор', 'zakaz', 'admin', 'true', 'true', 'false', '3653', '', 'проверка', '2018/08/22 22:45:54', '22.08.2018 22:45:54', '1'),
(2126, '417', '3566', 'Инна  Павлова', 'avtor', 'manager', 'true', 'true', 'true', '3556', '', 'лх\r\nхъ\r\nдх', '2018/08/22 22:48:02', '22.08.2018 22:48:02', '1'),
(2127, '417', '3566', 'Инна  Павлова', 'zakaz', 'manager', 'true', 'true', 'false', '3653', '', '\r\nн8900г0', '2018/08/22 22:48:12', '22.08.2018 22:48:12', '1'),
(2128, '420', '3738', 'Менеджер Nik aASDd', 'zakaz', 'manager', 'true', 'true', 'false', '3736', '', 'менеджером заказчику', '2018/08/22 23:11:14', '22.08.2018 23:11:14', '1'),
(2129, '420', '3736', 'заказчик Nik sadsad', 'avtor', 'zakaz', 'true', 'false', 'true', '3737', '', 'ыфвыфвфы', '2018/08/23 16:51:51', '23.08.2018 16:51:51', '1'),
(2130, '420', '3736', 'заказчик Nik sadsad', 'manager', 'zakaz', 'false', 'true', 'true', '3738', '', 'фывфывыф', '2018/08/23 16:51:58', '23.08.2018 16:51:58', '1'),
(2131, '420', '3736', 'заказчик Nik sadsad', 'avtor', 'zakaz', 'true', 'false', 'true', '3737', '', 'фывфыв', '2018/08/23 16:52:17', '23.08.2018 16:52:17', '1'),
(2132, '420', '3736', 'заказчик Nik sadsad', 'manager', 'zakaz', 'false', 'true', 'true', '3738', '', 'ыфвфыв', '2018/08/23 16:52:23', '23.08.2018 16:52:23', '1'),
(2133, '414', '3736', 'заказчик Nik sadsad', 'avtor', 'zakaz', 'true', 'false', 'true', '3737', '', 'ыфвфыввфы', '2018/08/23 16:52:57', '23.08.2018 16:52:57', '1'),
(2134, '414', '3736', 'заказчик Nik sadsad', 'manager', 'zakaz', 'false', 'true', 'true', '3738', '', 'фывфывф', '2018/08/23 16:53:11', '23.08.2018 16:53:11', '1'),
(2135, '420', '3737', 'автор Nik aasdasd', 'zakaz', 'avtor', 'true', 'true', 'false', '3736', '', 'фывфывыфв', '2018/08/23 16:53:51', '23.08.2018 16:53:51', '1'),
(2136, '420', '3737', 'автор Nik aasdasd', 'manager', 'avtor', 'false', 'true', 'true', '3738', '', 'ыфвфывфы', '2018/08/23 16:53:58', '23.08.2018 16:53:58', '1'),
(2137, '414', '3737', 'автор Nik aasdasd', 'zakaz', 'avtor', 'true', 'true', 'false', '3736', '', 'ыфвфыв', '2018/08/23 16:54:14', '23.08.2018 16:54:14', '0'),
(2138, '414', '3737', 'автор Nik aasdasd', 'manager', 'avtor', 'false', 'true', 'true', '3738', '', 'фывфывфыв', '2018/08/23 16:54:19', '23.08.2018 16:54:19', '1'),
(2139, '440', '3566', 'Инна  Павлова', 'avtor', 'manager', 'true', 'false', 'true', '3569', '', 'Здравствуйте! Завершите проект ', '2018/08/26 08:33:19', '26.08.2018 08:33:19', '1'),
(2140, '405', '2562', 'Администратор Администратор', 'avtor', 'admin', 'true', 'false', 'true', '3709', '', 'Здравствуйте! завершите заказ', '2018/08/27 22:02:03', '27.08.2018 22:02:03', '1'),
(2141, '467', '3566', 'Инна  Павлова', 'zakaz', 'manager', 'true', 'true', 'false', '3784', '', 'Здравствуйте! Прикрепите файл с планом ', '2018/08/28 13:43:07', '28.08.2018 13:43:07', '1'),
(2142, '467', '3784', 'Дмитро Кревський', 'manager', 'zakaz', 'false', 'true', 'true', '', '', 'Розділ 2 повинен бути змінений , не повинно бути підпримство \\\"Аурус\\\" ,а має бути те про яке у вас є інфо <div>467_plan_56_0.docx</div><form action=\\\"https://legko-v-uchebe.com/in/Filedownload/download/467_plan_56_0.docx\\\" class=\\\"jddform\\\" method=\\\"post\\\" accept-charset=\\\"utf-8\\\"><input type=\\\"hidden\\\" name=\\\"path\\\" value=\\\"../uploads/2018Aug27/467/467_plan_56_0.docx\\\"><input type=\\\"hidden\\\" name=\\\"filename\\\" value=\\\"467_plan_56_0.docx\\\"><input type=\\\"hidden\\\" name=\\\"orderid\\\" value=\\\"467\\\"><button type=\\\"submit\\\" name=\\\"submit\\\" class=\\\"btn-warning\\\"><i class=\\\"fa fa-download\\\"></i></button></form>', '2018/08/28 14:09:01', '28.08.2018 14:09:01', '1'),
(2143, '467', '3784', 'Дмитро Кревський', 'manager', 'zakaz', 'false', 'true', 'true', '', '', 'бажано щоб у мене була інформація (яку не потрібно вписувати в роботу,а лише для ) про те з якоми труднощами стикалося підприємство при відкритті . підприємство повинно бути українське і знаходитися в Україні', '2018/08/28 14:11:19', '28.08.2018 14:11:19', '1'),
(2144, '467', '3566', 'Инна  Павлова', 'avtor', 'manager', 'true', 'true', 'true', '3714', '', 'Розділ 2 повинен бути змінений , не повинно бути підпримство \\\"Аурус\\\" ,а має бути те про яке у вас є інфо<div>467_plan_56_0.docx</div><form action=\\\"https://legko-v-uchebe.com/in/Filedownload/download/467_plan_56_0.docx\\\" class=\\\"jddform\\\" method=\\\"post\\\" accept-charset=\\\"utf-8\\\"><input type=\\\"hidden\\\" name=\\\"path\\\" value=\\\"../uploads/2018Aug27/467/467_plan_56_0.docx\\\"><input type=\\\"hidden\\\" name=\\\"filename\\\" value=\\\"467_plan_56_0.docx\\\"><input type=\\\"hidden\\\" name=\\\"orderid\\\" value=\\\"467\\\"><button type=\\\"submit\\\" name=\\\"submit\\\" class=\\\"btn-warning\\\"><i class=\\\"fa fa-download\\\"></i></button></form>', '2018/08/28 14:38:35', '28.08.2018 14:38:35', '1'),
(2145, '467', '3566', 'Инна  Павлова', 'avtor', 'manager', 'true', 'true', 'true', '3714', '', 'Розділ 2 повинен бути змінений , не повинно бути підпримство \\\"Аурус\\\" ,а має бути те про яке у вас є інфо', '2018/08/28 14:38:46', '28.08.2018 14:38:46', '1'),
(2146, '467', '3566', 'Инна  Павлова', 'zakaz', 'manager', 'true', 'true', 'false', '3784', '', 'хорошо, спасибо ', '2018/08/28 14:39:31', '28.08.2018 14:39:31', '0'),
(2147, '467', '3714', 'Анастасия  Малета', 'manager', 'avtor', 'false', 'true', 'true', '3566', '', 'Хорошо', '2018/08/28 14:40:25', '28.08.2018 14:40:25', '1'),
(2148, '469', '2562', 'Администратор Администратор', 'zakaz', 'admin', 'true', 'true', 'true', '3762', '', 'фывфывф', '2018/08/28 16:16:25', '28.08.2018 16:16:25', '1'),
(2149, '469', '2562', 'Администратор Администратор', 'zakaz', 'admin', 'true', 'true', 'true', '3762', '', 'йцуйцуйуй', '2018/08/28 16:17:39', '28.08.2018 16:17:39', '1'),
(2150, '469', '3762', 'vlad zakaz', 'manager', 'zakaz', 'false', 'true', 'true', '2562', '', 'asdasda', '2018/08/28 16:35:46', '28.08.2018 16:35:46', '1'),
(2151, '469', '2562', 'Администратор Администратор', 'zakaz', 'admin', 'true', 'true', 'true', '3762', '', 'lk;lk;lk', '2018/08/28 16:36:20', '28.08.2018 16:36:20', '1'),
(2152, '469', '2562', 'Администратор Администратор', 'zakaz', 'admin', 'true', 'true', 'true', '3762', '', '1212211221', '2018/08/28 16:37:55', '28.08.2018 16:37:55', '1'),
(2153, '469', '2562', 'Администратор Администратор', 'zakaz', 'admin', 'true', 'true', 'true', '3762', '', '123123123', '2018/08/28 16:50:16', '28.08.2018 16:50:16', '1'),
(2154, '469', '2562', 'Администратор Администратор', 'zakaz', 'admin', 'true', 'true', 'true', '3762', '', 'u76u768687', '2018/08/28 16:53:10', '28.08.2018 16:53:10', '1'),
(2155, '469', '2562', 'Администратор Администратор', 'zakaz', 'admin', 'true', 'true', 'true', '3762', '', 'asdasd', '2018/08/28 16:54:12', '28.08.2018 16:54:12', '1'),
(2156, '469', '2562', 'Администратор Администратор', 'zakaz', 'admin', 'true', 'true', 'true', '3762', '', 'asdasd', '2018/08/28 16:54:24', '28.08.2018 16:54:24', '1'),
(2157, '469', '2562', 'Администратор Администратор', 'zakaz', 'admin', 'true', 'true', 'true', '3762', '', 'qweq', '2018/08/28 16:54:33', '28.08.2018 16:54:33', '1'),
(2158, '469', '2562', 'Администратор Администратор', 'zakaz', 'admin', 'true', 'true', 'true', '3762', '', 'qweq', '2018/08/28 16:54:38', '28.08.2018 16:54:38', '1'),
(2159, '469', '2562', 'Администратор Администратор', 'zakaz', 'admin', 'true', 'true', 'true', '3762', '', 'qweqqweqweqweq', '2018/08/28 16:54:45', '28.08.2018 16:54:45', '1'),
(2160, '469', '2562', 'Администратор Администратор', 'zakaz', 'admin', 'true', 'true', 'true', '3762', '', 'wqeqweqwe', '2018/08/28 16:54:55', '28.08.2018 16:54:55', '1'),
(2161, '469', '2562', 'Администратор Администратор', 'zakaz', 'admin', 'true', 'true', 'true', '3762', '', 'wqeqweqweadada', '2018/08/28 16:55:53', '28.08.2018 16:55:53', '1'),
(2162, '469', '2562', 'Администратор Администратор', 'zakaz', 'admin', 'true', 'true', 'true', '3762', '', '123123', '2018/08/28 17:14:05', '28.08.2018 17:14:05', '1'),
(2163, '469', '2562', 'Администратор Администратор', 'zakaz', 'admin', 'true', 'true', 'true', '3762', '', 'asdasda', '2018/08/28 17:14:21', '28.08.2018 17:14:21', '1'),
(2164, '469', '2562', 'Администратор Администратор', 'zakaz', 'admin', 'true', 'true', 'true', '3762', '', 'asdasd', '2018/08/28 17:30:28', '28.08.2018 17:30:28', '1'),
(2165, '469', '2562', 'Администратор Администратор', 'zakaz', 'admin', 'true', 'true', 'true', '3762', '', 'asdasd', '2018/08/28 17:32:07', '28.08.2018 17:32:07', '1'),
(2166, '469', '2562', 'Администратор Администратор', 'zakaz', 'admin', 'true', 'true', 'true', '3762', '', 'asdasd', '2018/08/28 17:32:22', '28.08.2018 17:32:22', '1'),
(2167, '469', '2562', 'Администратор Администратор', 'zakaz', 'admin', 'true', 'true', 'true', '3762', '', 'asdasd', '2018/08/28 17:48:45', '28.08.2018 17:48:45', '1'),
(2168, '469', '2562', 'Администратор Администратор', 'zakaz', 'admin', 'true', 'true', 'true', '3762', '', '234234234234', '2018/08/28 17:52:21', '28.08.2018 17:52:21', '1'),
(2169, '469', '2562', 'Администратор Администратор', 'avtor', 'admin', 'true', 'true', 'true', '3648', '', 'dasdasdasd', '2018/08/28 17:53:39', '28.08.2018 17:53:39', '1'),
(2170, '469', '2562', 'Администратор Администратор', 'zakaz', 'admin', 'true', 'true', 'true', '3762', '', '1111', '2018/08/29 11:16:02', '29.08.2018 11:16:02', '1'),
(2171, '469', '2562', 'Администратор Администратор', 'zakaz', 'admin', 'true', 'true', 'true', '3762', '', 'фывфыв', '2018/08/29 11:28:05', '29.08.2018 11:28:05', '1'),
(2172, '469', '2562', 'Администратор Администратор', 'zakaz', 'admin', 'true', 'true', 'true', '3762', '', 'йцуйцуйцу', '2018/08/29 11:32:17', '29.08.2018 11:32:17', '0'),
(2173, '469', '3648', 'vlad avtor', 'zakaz', 'avtor', 'true', 'true', 'true', '3762', '', '1123123123', '2018/08/29 11:33:48', '29.08.2018 11:33:48', '0'),
(2174, '469', '3762', 'vlad zakaz', 'avtor', 'zakaz', 'true', 'true', 'true', '3648', '', '1231231', '2018/08/29 11:34:32', '29.08.2018 11:34:32', '1'),
(2175, '469', '2562', 'Администратор Администратор', 'zakaz', 'admin', 'true', 'true', 'true', '3762', '', '2222', '2018/08/29 12:16:44', '29.08.2018 12:16:44', '0'),
(2176, '469', '2562', 'Администратор Администратор', 'avtor', 'admin', 'true', 'true', 'true', '3648', '', 'фывфывф', '2018/08/29 12:17:07', '29.08.2018 12:17:07', '1'),
(2177, '469', '3648', 'vlad avtor', 'zakaz', 'avtor', 'true', 'true', 'true', '3762', '', 'eqweqwe', '2018/08/29 12:17:53', '29.08.2018 12:17:53', '0'),
(2178, '469', '3762', 'vlad zakaz', 'avtor', 'zakaz', 'true', 'true', 'true', '3648', '', '213123', '2018/08/29 12:18:12', '29.08.2018 12:18:12', '1'),
(2179, '467', '3714', 'Анастасия  Малета', 'manager', 'avtor', 'false', 'true', 'true', '3566', '', 'Здравствуйте, извините, я по семейным обстоятельствам не смогу сделать работу, я вообще не буду делать работы. Извините еще раз. Спасибо за работу.', '2018/08/30 08:38:19', '30.08.2018 08:38:19', '1'),
(2180, '403', '2562', 'Администратор Администратор', 'zakaz', 'admin', 'true', 'true', 'false', '3628', '', 'йцуйцуйуцйуй', '2018/08/30 11:26:28', '30.08.2018 11:26:28', '0'),
(2181, '469', '2562', 'Администратор Администратор', 'zakaz', 'admin', 'true', 'true', 'true', '3762', '', 'цукцук', '2018/08/30 11:27:06', '30.08.2018 11:27:06', '0'),
(2182, '469', '2562', 'Администратор Администратор', 'zakaz', 'admin', 'true', 'true', 'true', '3762', '', 'цукцукц', '2018/08/30 11:27:08', '30.08.2018 11:27:08', '0'),
(2183, '469', '2562', 'Администратор Администратор', 'zakaz', 'admin', 'true', 'true', 'true', '3762', '', 'цукцук', '2018/08/30 11:27:10', '30.08.2018 11:27:10', '0'),
(2184, '469', '2562', 'Администратор Администратор', 'zakaz', 'admin', 'true', 'true', 'true', '3762', '', 'цукцук', '2018/08/30 11:27:12', '30.08.2018 11:27:12', '0'),
(2185, '469', '2562', 'Администратор Администратор', 'zakaz', 'admin', 'true', 'true', 'true', '3762', '', 'цукцук', '2018/08/30 11:27:13', '30.08.2018 11:27:13', '0'),
(2186, '469', '2562', 'Администратор Администратор', 'zakaz', 'admin', 'true', 'true', 'true', '3762', '', 'цукцук', '2018/08/30 11:27:15', '30.08.2018 11:27:15', '0'),
(2187, '469', '2562', 'Администратор Администратор', 'avtor', 'admin', 'true', 'true', 'true', '3648', '', 'йцуйцуйц', '2018/08/30 11:29:46', '30.08.2018 11:29:46', '0'),
(2188, '469', '2562', 'Администратор Администратор', 'avtor', 'admin', 'true', 'true', 'true', '3648', '', 'йцуйцуйцу', '2018/08/30 11:29:49', '30.08.2018 11:29:49', '0'),
(2189, '469', '2562', 'Администратор Администратор', 'avtor', 'admin', 'true', 'true', 'true', '3648', '', 'йцуйцуй', '2018/08/30 11:29:51', '30.08.2018 11:29:51', '0'),
(2190, '494', '2562', 'Администратор Администратор', 'zakaz', 'admin', 'true', 'true', 'true', '3762', '', '123123', '2018/08/30 11:32:47', '30.08.2018 11:32:47', '0'),
(2191, '494', '2562', 'Администратор Администратор', 'zakaz', 'admin', 'true', 'true', 'true', '3762', '', 'qweqweq', '2018/08/30 11:44:53', '30.08.2018 11:44:53', '0'),
(2192, '494', '2562', 'Администратор Администратор', 'avtor', 'admin', 'true', 'true', 'true', '3648', '', 'qweqwe', '2018/08/30 11:45:14', '30.08.2018 11:45:14', '0'),
(2193, '494', '2562', 'Администратор Администратор', 'zakaz', 'admin', 'true', 'true', 'true', '3762', '', 'qweqw', '2018/08/30 11:45:20', '30.08.2018 11:45:20', '0'),
(2194, '459', '2562', 'Администратор Администратор', 'avtor', 'admin', 'true', 'false', 'true', '3556', '', 'Здравствуйте! ', '2018/08/30 19:30:22', '30.08.2018 19:30:22', '1'),
(2195, '459', '3556', 'Автор  Иванов', 'manager', 'avtor', 'false', 'true', 'true', '3566', '', 'вааыаыаы', '2018/08/30 19:30:43', '30.08.2018 19:30:43', '1'),
(2196, '459', '3566', 'Инна  Павлова', 'avtor', 'manager', 'true', 'false', 'true', '3556', '', 'ыаываыва', '2018/08/30 19:31:05', '30.08.2018 19:31:05', '0'),
(2197, '459', '2562', 'Администратор Администратор', 'avtor', 'admin', 'true', 'false', 'true', '3556', '', 'цвуввыыва', '2018/08/30 19:31:23', '30.08.2018 19:31:23', '0'),
(2198, '499', '3566', 'Инна  Павлова', 'zakaz', 'manager', 'true', 'true', 'false', '3628', '', 'Здравствуйте! ', '2018/08/30 19:33:19', '30.08.2018 19:33:19', '0'),
(2199, '499', '2562', 'Администратор Администратор', 'zakaz', 'admin', 'true', 'true', 'false', '3628', '', 'Здравствуйте! ', '2018/08/30 19:33:42', '30.08.2018 19:33:42', '0'),
(2200, '495', '2562', 'Администратор Администратор', 'avtor', 'admin', 'true', 'false', 'true', '3648', '', 'htdc', '2018/08/31 10:35:44', '31.08.2018 10:35:44', '1');

-- --------------------------------------------------------

--
-- Структура таблицы `password_reset`
--

CREATE TABLE `password_reset` (
  `id` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `user_type` varchar(50) NOT NULL,
  `action` varchar(20) NOT NULL,
  `temp_key` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `password_reset`
--

INSERT INTO `password_reset` (`id`, `email`, `user_type`, `action`, `temp_key`) VALUES
(2, 'kjkjkjkjkj609@ukr.net', 'writers', 'writer_register', 'CNpEwykPQOfXD4KZd7VGBSRml'),
(3, 'mobile-gsm1985@mail.ru', '', '', 't5GrbpK8k24RYxszWncCdlX0A'),
(9, '', 'clients', 'client_register', 'EwCRjpz5vNBUW19He6ihyGVnm'),
(11, '', 'writers', 'writer_register', 'OWAod9KxNgDScRwftiT6FsHq8'),
(12, '', 'writers', 'writer_register', 'asgnKF4CcJmeHvTulrPVyB2XZ'),
(15, 'avtor-legko-v-uchebe@ukr.net', 'writers', 'writer_register', 'Sdx8Wfap1K4rFcmuLCAoE3Hh7'),
(16, 'nikolayveronika4@ukr.net', 'writers', 'writer_register', 'VQDCdBbmhHUFucG2PqYf0Rrwz'),
(17, 'nikolayveronika4@ukr.net', 'writers', 'writer_register', 'vCsrJYpgIAlfcML5083mOQ4ot'),
(18, '', 'writers', 'writer_register', 'LM3AxnOZIXq8lirWRGgjeVJtv'),
(19, '', 'clients', 'client_register', '6KOCnX8EuzDqkJVeQgWyxr2LN'),
(20, '', 'writers', 'writer_register', '53R9GuIeXrhiDBfPdOqkoy280'),
(28, 'ksenianikolainko@gmail.com', 'writers', 'writer_register', 'XybcJAGk2QmuYlRC9t8E4pIqg'),
(32, 'innaricci12@gmail.com', 'writers', 'writer_register', 'ctGeMxUQEh5F3TwKzL42Sysi8'),
(34, 'marchuk.nadiya@ukr.net', 'writers', 'writer_register', 'sXvGpRndQM4UhCJA7z6ijqYbt'),
(35, 'inr@ukr.net', 'writers', 'writer_register', 'cI6U3tH7oYjmG5CXekLNMAfBF'),
(37, 'aksaj@i.ua', 'writers', 'writer_register', 'PREoch4DpSyN25Qn1j9sFVAxM'),
(40, 'geluh@ukr.net', 'writers', 'writer_register', 'sdfOtAcehFpNrzJbaLlSw52on'),
(42, 'fedorovakarina0708@gmail.com', 'writers', 'writer_register', 'OpXzyAPqmBfcjoIUranEW2CSs'),
(47, 'seaschool@mail.ru', 'writers', 'writer_register', 'p4kGNY76wMeEvb2BPxy5QnC9R'),
(48, 'vitalina.germanova@yandex.ua', 'writers', 'writer_register', 'WTiHqE7kf6cdyMrmDGBtvPlYN'),
(50, 'dn061087ald1@i.ua', 'writers', 'writer_register', 'Dpce56adYKzk0migFjQuvNG9P'),
(54, 'annutochka@ukr.net', 'writers', 'writer_register', 'dkExRuJPhWUF67LgVz8q9tpIB'),
(56, 'olga.babskaia.93@gmail.com', 'writers', 'writer_register', 'ikEAlJoN32xVCMtnaPcFX0b1O'),
(57, 'polishchukvika2396@gmail.com', 'writers', 'writer_register', 'tbPKmHA25kuilaLWYodCZ0S1V'),
(62, 'alyona1995b@gmail.com', 'writers', 'writer_register', 'rK3Q5Fs8yqxc4oRYLuG02hTnt'),
(63, 'ishta.iri@gmail.com', 'writers', 'writer_register', 'YjpwHOngE82PyKXcJe1Zo7NF6'),
(76, 'nataliak888@gmail.com', 'writers', 'writer_register', 'MzxrWsbLTySJn3efh9j1gHYBR'),
(78, 'for_diplom_@ukr.net', 'writers', 'writer_register', 'ykeQ165q37EpxIYLGj8vKrRSB'),
(79, 'for_diplom_@ukr.net', 'writers', 'writer_register', 'In2ZYVjQa5MF9bkeJpgmqfPE4'),
(86, 'poemakaterina@ukr.net', 'writers', 'writer_register', 'ftrk5HlwJ9gm860nNUCOeSXbQ'),
(89, 'i_konov@ukr.net', 'writers', 'writer_register', 'eFEzwK3luDsv6kmrU4iMftWV9'),
(92, 'buchkova_elena2@ukr.net', 'writers', 'writer_register', '0dBazG6SitrYqI5hL8OmpEwRJ'),
(100, 'chernenkovoe@gmail.com', 'writers', 'writer_register', '0fQWisoOpNwjJnItAHyMxb2u9'),
(107, 'avtor-legko-v-uchebe@ukr.net', 'writers', 'writer_register', 'CErZtOHXTlQNc4gyoRLWj0p2M'),
(108, 'chernenkovoe@gmail.com', 'writers', 'writer_register', 'DO4MHIQpgVamTqNFZszxUcRwj'),
(114, 'Pa-nda@i.ua', 'writers', 'writer_register', 'QqizR3BfrF2Tk57py8DVKUNom'),
(118, 'shishelyuk5@gmail.com', 'writers', 'writer_register', 'Tr1IvetDY0mq2lOHhun859Wbc'),
(119, 'youvovas@gmail.com', '', '', '85IRL2APpk9vbi0O6hrN7uoaD'),
(128, 'poshbaby29@gmail.com', 'writers', 'writer_register', '3r8EoiPdfwHus6ztyJTh9nXCA'),
(139, 'madam.vest@yandex.ru', 'writers', 'writer_register', 'Rz6g4WphLyeOSGx1dfmKFT0wj'),
(141, 'dovgijoleksij@gmail.com', 'writers', 'writer_register', 'fyTdBG30a2qIiMWSgjZN6Evs9'),
(143, 'fominykh@meta.ua', 'writers', 'writer_register', 'QZ674f0zAwjJHNE1yX5cbi3oC'),
(145, 'oksana_lozova@ukr.net', 'writers', 'writer_register', 'Pp8fau2Is0kiC3Ex5hjvKrcnt'),
(153, 'Ivanna.ruda@yahoo.com', 'writers', 'writer_register', '1GJjIk5izM7oErfXKZP3pVhBe'),
(159, 'ineska620@gmail.com', 'writers', 'writer_register', 'VyJGlEHOsdIhFXK791QYZ5Laq'),
(162, 'vkarpovskaya@ukr.net', 'writers', 'writer_register', 'k4fpvMDebGjLm2qEiOSyUWsNV'),
(163, 'vkarpovskaya@ukr.net', 'writers', 'writer_register', 'Vux5JnShlfHCmOdbRyT3p046D'),
(164, 'yudina176@i.ua', 'writers', 'writer_register', 'OYPgxT9vk3WrKS6z4seM1hoai'),
(167, 'dimamatem@gmail.com', 'writers', 'writer_register', 'OjmaFUNSKspxgqA5t0bo1ufk6'),
(168, 'dimamatem@gmail.com', 'writers', 'writer_register', 'nmpvbTHGCUBeWYfRDaAhyFOr3'),
(178, 'sviridova.janna@lenta.ru', 'writers', 'writer_register', 'sKeDlp802S1U3FytgEBv4hMQb'),
(179, 'skibo@ukr.net', 'writers', 'writer_register', 'IQKFsZloXR8TBN20iUcVPO4rJ'),
(183, 'sed-_-mos@mail.ru', 'writers', 'writer_register', 'EHz4ZDf360uSi5dKrBqm1VovF'),
(184, 'viktoria286@ukr.net', 'writers', 'writer_register', '4Vrn2xzyTAlh8ObckvsqMfZXG'),
(185, 'ivor62@gmail.com', 'writers', 'writer_register', 'U4EmarW2yCzfZ3YNGlv80MjKu'),
(188, 'bogforspam@gmail.com', 'writers', 'writer_register', '03ABquvEhpP5NUMk7KWgbZGDS'),
(189, 'churilov_aa_1984@mail.ru', 'writers', 'writer_register', '4bNYRJkitP8hWwnDE9oeuvsIA'),
(193, 'sds954@ukr.net', 'writers', 'writer_register', '9yaJmNrQvWC7GMiD4FVxgcqoO'),
(194, 'pobeda.viktoria220@gmail.com', 'writers', 'writer_register', 'BYIVHinGDXd1TFZ3CcNl5a92U'),
(195, 'pobeda.viktoria220@gmail.com', 'writers', 'writer_register', 'XErBvPpO5C1VSkY4GWxcif7UF'),
(200, 'ghubenkoandrey@gmail.com', 'writers', 'writer_register', 'Mx4ajZDJtPms8QhTci3fvoSdV'),
(214, 'yarit@ukr.net', 'writers', 'writer_register', 'B8eN9KuWPzFwYVsRtGAoknvHM'),
(221, 'kuzmajana92@gmail.com', 'clients', 'client_register', 'eP7uwMbpT3D61cLRyA4B8EndK'),
(226, 'us.eisen2017@gmail.com', 'clients', 'client_register', 'cftJulRqZm189AWKPLiyxFQbT'),
(227, 'us.eisen2017@gmail.com', 'clients', 'client_register', 'd75o9BpVWsHAJKzD2keOmFUP8'),
(230, 'marinka_zajats1302@ukr.net', 'writers', 'writer_register', 'qU5HzE3CrLby1vWf8Fxt7RKc4'),
(231, 'petetskayay@gmail.com', 'clients', 'client_register', 'MdrNYX3PvqleBDGwHnRZu9gSb'),
(232, 'petetskayay@gmail.com', 'writers', 'writer_register', '6Fg05maBNXeOjUzJAxcIVyndW'),
(237, 'fedorets-sb@ukr.net', 'writers', 'writer_register', 'mut9LflTEDYM4waJW2h7NKnRq');

-- --------------------------------------------------------

--
-- Структура таблицы `payments`
--

CREATE TABLE `payments` (
  `id` int(255) NOT NULL,
  `user_id` int(11) NOT NULL,
  `sum` int(11) NOT NULL,
  `sum_part` varchar(255) NOT NULL,
  `order_id` varchar(255) NOT NULL,
  `encoded_id` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `payments`
--

INSERT INTO `payments` (`id`, `user_id`, `sum`, `sum_part`, `order_id`, `encoded_id`) VALUES
(333, 3640, 0, 'full', '318', '6f2e9f9e70ba0933cb3b906626e779c8f2c663bb'),
(334, 3660, 120, 'doplata', '361', '99d64c134b2a81d6dabf0b4060f1d1e1c59b8b7b'),
(337, 3628, 0, 'half', '407', '508858ce868e8a1d2e7bb21128e70ff96e288f94'),
(338, 3740, 0, 'full', '408', 'eec4b8e225d95d8946e946bc16715b08343b9fb4'),
(343, 3759, 0, 'half', '426', 'd3df23a80e505c360b49517241b43141637d14e0'),
(344, 3756, 0, 'rest', '425', '7d9c1332ffb50799a36d9aa2d696e02a6642b50f'),
(346, 3794, 0, 'full', '483', '5b73513dad008fab190e6f487185115c9fbdd083'),
(347, 3793, 0, 'full', '484', '1b697ccab6363703510544096b92937b7a6d3f4d');

-- --------------------------------------------------------

--
-- Структура таблицы `paypal_payments`
--

CREATE TABLE `paypal_payments` (
  `payment_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `txn_id` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `payment_gross` float(10,2) NOT NULL,
  `currency_code` varchar(5) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `payer_email` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `payment_status` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `project_requests`
--

CREATE TABLE `project_requests` (
  `id` int(11) NOT NULL,
  `orderid` varchar(30) NOT NULL,
  `topic` varchar(500) NOT NULL,
  `showorder` varchar(255) NOT NULL,
  `clientid` varchar(30) NOT NULL,
  `clientemail` varchar(50) NOT NULL,
  `clientname` varchar(100) NOT NULL,
  `writer_email` varchar(50) NOT NULL,
  `writerid` varchar(30) NOT NULL,
  `writername` varchar(100) NOT NULL,
  `viewed` varchar(255) NOT NULL,
  `sum` varchar(255) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `referencing_style` varchar(255) NOT NULL,
  `sources` varchar(255) NOT NULL,
  `date` varchar(255) NOT NULL,
  `writers_rating` varchar(11) NOT NULL,
  `request_date` varchar(50) NOT NULL,
  `words` varchar(30) NOT NULL,
  `deadline` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `project_requests`
--

INSERT INTO `project_requests` (`id`, `orderid`, `topic`, `showorder`, `clientid`, `clientemail`, `clientname`, `writer_email`, `writerid`, `writername`, `viewed`, `sum`, `subject`, `referencing_style`, `sources`, `date`, `writers_rating`, `request_date`, `words`, `deadline`) VALUES
(731, '495', 'Тест ставки (уведотления у автора)', 'true', '3801', 'testfour123258@gmail.com', 'Testfour Testfour', 'testtwo123258@gmail.com', '3799', 'Testtwo Testtwo', 'false', '100', 'Административное право', 'Аннотация', '150', '05.09.2018 20:00', '', '30.08.2018 15:32:15', '101', '2018-09-07 12:00:00'),
(732, '495', 'Тест ставки (уведотления у автора)', 'true', '3801', 'testfour123258@gmail.com', 'Testfour Testfour', 'onetest377@gmail.com', '3798', 'Avtorone Avtorone', 'false', '200', 'Административное право', 'Аннотация', '150', '05.09.2018 12:00', '', '30.08.2018 15:32:39', '101', '2018-09-07 12:00:00'),
(736, '498', '123123', '', '3762', 'daredevilvue@gmail.com', 'vlad zakaz', 'youvovas@gmail.com', '3648', 'vlad avtor', 'false', '3123123', 'АПП (Автоматизация производственных процессов)', 'Аннотация', '123123', '01.09.2018 05:10', '', '30.08.2018 17:59:54', '1231231', '2018-09-01 11:15:00'),
(737, '437', 'тест', '', '3736', 'nikolayveronika1@ukr.net', 'заказчик Nik sadsad', 'legko_v_onua@mail.ru', '3556', 'Автор  Иванов', 'false', '100', 'Анализ', 'Доклад', '2000', '01.09.2018 09:00', '', '30.08.2018 18:41:25', '1500', '2018-08-25 00:00:00'),
(738, '486', '213123', '', '3762', 'daredevilvue@gmail.com', 'vlad zakaz', 'legko_v_onua@mail.ru', '3556', 'Автор  Иванов', 'false', '100', 'АПП (Автоматизация производственных процессов)', 'Аннотация', '23123', '31.08.2018 13:00', '', '30.08.2018 18:51:55', '123123', '2018-08-30 15:35:00'),
(741, '499', 'практика юридическая клиника ( отчет и дневник)', '', '3628', 'eeerrrrivanov@yandex.ru', 'Рома Иванов', 'mytsak.dasha@gmail.com', '3586', 'Дарья Мыцак', 'false', '350', 'Юридические дисциплины', 'Преддипломная практика', '200', '03.09.2018 17:00', '', '30.08.2018 20:03:02', '30', '2018-09-03 09:00:00'),
(742, '499', 'практика юридическая клиника ( отчет и дневник)', '', '3628', 'eeerrrrivanov@yandex.ru', 'Рома Иванов', 'paramiy@ukr.net', '3723', 'Аліна Мазур', 'false', '150', 'Юридические дисциплины', 'Преддипломная практика', '200', '03.09.2018 09:00', '', '30.08.2018 20:28:35', '30', '2018-09-03 09:00:00'),
(743, '465', 'Діяльність Міжнародного Комітету Червоного Хреста з захисту біженців та внутрішньо переміщених осіб ', '', '3778', 'mjthetawaves@gmail.com', 'Евгения Бабий', 'kozina.lawyer@gmail.com', '3686', 'Юлия Козина', 'false', '2800', 'Юридические дисциплины', 'Магистерская', '500', '15.09.2018 19:00', '', '30.08.2018 23:42:10', '100', '2018-09-17 23:55:00'),
(744, '441', ' написание монографии по \\\\', '', '3577', 'pel-irina@ukr.net', 'Ирина Пелехович', 'kozina.lawyer@gmail.com', '3686', 'Юлия Козина', 'false', '5000', 'Философия', 'Аннотация', '800', '13.09.2018 22:00', '', '30.08.2018 23:43:28', '140', '2018-09-13 20:00:00'),
(745, '495', 'Тест ставки (уведотления у автора)', '', '3801', 'testfour123258@gmail.com', 'Testfour Testfour', 'kozina.lawyer@gmail.com', '3686', 'Юлия Козина', 'false', '150', 'Административное право', 'Аннотация', '150', '05.09.2018 22:00', '', '30.08.2018 23:44:22', '101', '2018-09-07 12:00:00'),
(746, '465', 'Діяльність Міжнародного Комітету Червоного Хреста з захисту біженців та внутрішньо переміщених осіб ', '', '3778', 'mjthetawaves@gmail.com', 'Евгения Бабий', 'lena_shvedik@ukr.net', '3766', 'Алена Юркив', 'false', '400', 'Юридические дисциплины', 'Магистерская', '500', '09.09.2018 23:10', '', '31.08.2018 01:14:25', '100', '2018-09-17 23:55:00'),
(747, '465', 'Діяльність Міжнародного Комітету Червоного Хреста з захисту біженців та внутрішньо переміщених осіб ', '', '3778', 'mjthetawaves@gmail.com', 'Евгения Бабий', 'berryoksi@ukr.net', '3667', 'Оксана Морозова', 'false', '3000', 'Юридические дисциплины', 'Магистерская', '500', '27.09.2018 07:35', '', '31.08.2018 07:40:22', '100', '2018-09-17 23:55:00');

-- --------------------------------------------------------

--
-- Структура таблицы `referencing_style`
--

CREATE TABLE `referencing_style` (
  `id` int(11) NOT NULL,
  `style` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `referencing_style`
--

INSERT INTO `referencing_style` (`id`, `style`) VALUES
(1, 'Аннотация'),
(2, 'Бакалаврская'),
(3, 'Диплом'),
(4, 'Диплом МВА'),
(5, 'Доклад'),
(6, 'Доработка работы'),
(7, 'Другое'),
(8, 'Задачи'),
(9, 'Кандидатская'),
(10, 'Контрольная'),
(11, 'Курсовая практическая'),
(12, 'Курсовая теоретическая'),
(13, 'Магистерская'),
(14, 'Ответы на вопросы'),
(15, 'Отчет'),
(16, 'План'),
(17, 'Повышение уникальности'),
(18, 'Преддипломная практика'),
(19, 'Презентация'),
(20, 'Презентация для квалификационной работы'),
(21, 'Реферат'),
(22, 'Рецензия'),
(23, 'Речь к дипломной работе'),
(24, 'Сочинение'),
(25, 'Статья'),
(26, 'Тэзисы'),
(27, 'Чертежи'),
(28, 'Эссе'),
(29, 'Языковой перевод');

-- --------------------------------------------------------

--
-- Структура таблицы `smtp_configs`
--

CREATE TABLE `smtp_configs` (
  `id` int(11) NOT NULL,
  `smtp_host` varchar(50) NOT NULL,
  `smtp_user` varchar(50) NOT NULL,
  `smtp_name` varchar(50) NOT NULL,
  `smtp_pass` varchar(50) NOT NULL,
  `smtp_port` int(11) NOT NULL,
  `protocol` varchar(20) NOT NULL,
  `admin_email` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `smtp_configs`
--

INSERT INTO `smtp_configs` (`id`, `smtp_host`, `smtp_user`, `smtp_name`, `smtp_pass`, `smtp_port`, `protocol`, `admin_email`) VALUES
(1, 'mail.legko-v-uchebe.com', 'support@legko-v-uchebe.com', 'Legko v uchebe', 'Esteemed7++', 465, 'mail', 'shaitan.vladimir@gmail.com'),
(2, 'mail.legko-v-uchebe.com', 'support@legko-v-uchebe.com', 'Legko v uchebe', 'Esteemed7++', 465, 'mail', 'shaitan.vladimir@gmail.com'),
(3, 'mail.legko-v-uchebe.com', 'support@legko-v-uchebe.com', 'Legko v uchebe', 'Esteemed7++', 465, 'mail', 'shaitan.vladimir@gmail.com');

-- --------------------------------------------------------

--
-- Структура таблицы `subject`
--

CREATE TABLE `subject` (
  `id` int(11) NOT NULL,
  `pvalue` float NOT NULL,
  `subject` varchar(200) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `subject`
--

INSERT INTO `subject` (`id`, `pvalue`, `subject`) VALUES
(3, 1, 'АПП (Автоматизация производственных процессов)'),
(4, 1, 'Административное право'),
(5, 1, 'Анализ'),
(6, 1, 'Анатомия'),
(7, 1, 'Английский язык'),
(8, 1, 'Антикризисное управление'),
(11, 1, 'Архитектура'),
(12, 1, 'Астрономия'),
(13, 1, 'Аудит бух и управленческий учет'),
(14, 1, 'АХД'),
(15, 1, 'Банк и инвестиционный менеджмент'),
(16, 1, 'Банковское дело'),
(17, 1, 'Банкротство'),
(18, 1, 'БЖД'),
(19, 1, 'Бизнес-планирование'),
(20, 1, 'Биология'),
(21, 1, 'Бухучет и статистика'),
(22, 1, 'ВСТИ'),
(23, 1, 'Внешнеэконом деятельность (ВЭД)'),
(24, 1, 'География'),
(25, 1, 'Геодезия'),
(26, 1, 'Геополитика\r\n'),
(27, 1, 'Гидравлика'),
(28, 1, 'Гостиничное дело'),
(29, 1, 'Гражданское право\r\n'),
(30, 1, 'Графика'),
(31, 1, 'Делопроизводство'),
(32, 1, 'Деньги кредит банки'),
(33, 1, 'Детали машин'),
(34, 1, 'Дизайн\r\n'),
(35, 1, 'ДКБ (деньги кредит банки)'),
(36, 1, 'Дошкольная педагогика'),
(37, 1, 'Жилищное право'),
(38, 1, 'Журналистика'),
(39, 1, 'Земельное право'),
(40, 1, 'Здравоохранение'),
(41, 1, 'Инвестиционный менеджмент'),
(42, 1, 'Инвестиция'),
(43, 1, 'Инженерная графика'),
(44, 1, 'Иностранные языки'),
(45, 1, 'Информатика'),
(46, 1, 'Информатика и программирование'),
(47, 1, 'История'),
(48, 1, 'Искусство'),
(49, 1, 'Коммерческая деятельность'),
(50, 1, 'Компьютерные сети и телекоммуникации'),
(51, 1, 'Конфликтология'),
(52, 1, 'Конституционное право'),
(53, 1, 'Криминалистика'),
(54, 1, 'Криминология'),
(55, 1, 'Кулинария'),
(56, 1, 'Культура и искусство'),
(57, 1, 'Культурология'),
(58, 1, 'Лингвистика'),
(59, 1, 'Литература'),
(60, 1, 'Логика'),
(61, 1, 'Логистика'),
(62, 1, 'Логопедия'),
(63, 1, 'Макроэкономика'),
(64, 1, 'Маркетинг'),
(65, 1, 'Математика'),
(66, 1, 'Материаловедение'),
(67, 1, 'Машиностроение'),
(68, 1, 'Медицина'),
(69, 1, 'Международные отношения'),
(70, 1, 'Международное право '),
(71, 1, 'Менеджмент'),
(72, 1, 'Менеджмент  качества'),
(73, 1, 'Менеджмент организации'),
(74, 1, 'Механика'),
(75, 1, 'Микроэкономика'),
(76, 1, 'Мировая  экономика'),
(77, 1, 'Муниципальное право'),
(78, 1, 'Налоги'),
(79, 1, 'Немецкий язык'),
(80, 1, 'Организация труда'),
(81, 1, 'Организация труда и производства'),
(82, 1, 'Основы конструирования'),
(83, 1, 'Основы предпринимательства'),
(84, 1, 'Охрана природы'),
(85, 1, 'Охрана труда'),
(86, 1, 'Педагогика'),
(87, 1, 'Педиатрия'),
(88, 1, 'Политология'),
(89, 1, 'Право'),
(90, 1, 'Право Европейского союза'),
(91, 1, 'Предпринимательство'),
(92, 1, 'Предприятие'),
(93, 1, 'Программирование'),
(94, 1, 'Производство'),
(95, 1, 'Промышленность'),
(96, 1, 'Процессы и апп пищевой пром'),
(97, 1, 'Психология'),
(98, 1, 'Радиосвязь и радиотехника'),
(99, 1, 'Разное'),
(100, 1, 'Реклама и PR'),
(101, 1, 'Русский язык и литература'),
(102, 1, 'Сельское хозяйство'),
(103, 1, 'Семейное право'),
(104, 1, 'Сист передачи и сист коммутации'),
(105, 1, 'Сопромат'),
(106, 1, 'Социальная работа'),
(107, 1, 'Социология'),
(108, 1, 'Спорт и туризм'),
(109, 1, 'Статистика'),
(110, 1, 'Стратегический маркетинг'),
(111, 1, 'Стратегический менеджмент'),
(112, 1, 'Стандартизация '),
(113, 1, 'Страхование'),
(114, 1, 'Строительство'),
(115, 1, 'Судебная бухгалтерия'),
(116, 1, 'Телекоммуникация'),
(117, 1, 'Теоретическая механика'),
(118, 1, 'Теория государства и права'),
(119, 1, 'Теория машин и механизмов (тмм)'),
(120, 1, 'Теплотехника'),
(121, 1, 'Теплоэнергетика'),
(122, 1, 'Технические'),
(123, 1, 'Технология машиностроения'),
(124, 1, 'Товароведение'),
(125, 1, 'Торговля'),
(126, 1, 'Транспорт'),
(127, 1, 'Трудовое право'),
(128, 1, 'Туризм'),
(129, 1, 'Уголовное право'),
(130, 1, 'Уголовный процесс'),
(131, 1, 'Украинский язык и литература'),
(132, 1, 'Управление затратами'),
(133, 1, 'Управление логистикой'),
(134, 1, 'Управление персоналом (HR)'),
(135, 1, 'Управление проектами'),
(136, 1, 'Управленческие исследования'),
(137, 1, 'Управленческий учёт'),
(138, 1, 'Физика'),
(139, 1, 'Физкультура и спорт'),
(140, 1, 'Филология'),
(141, 1, 'Философия'),
(143, 1, 'Финансы'),
(144, 1, 'Финансы и кредит'),
(145, 1, 'Французский язык'),
(146, 1, 'Химия'),
(147, 1, 'Химия и физика'),
(148, 1, 'Хирургия'),
(149, 1, 'Цены и ценообразование'),
(150, 1, 'Черчение'),
(151, 1, 'Экология'),
(152, 1, 'Экономика'),
(153, 1, 'Экономика предприятия'),
(154, 1, 'Экономическая теория'),
(155, 1, 'Экономические дисциплины'),
(156, 1, 'Экономический анализ'),
(157, 1, 'Экскурсоведение'),
(158, 1, 'Электроника и радиотехника'),
(159, 1, 'Электротехника'),
(160, 1, 'Электроэнергетика'),
(161, 1, 'Энергетика'),
(162, 1, 'Энергосбережение'),
(163, 1, 'Этика и эстетика'),
(164, 1, 'Юридические дисциплины'),
(165, 1, 'Юриспруденция');

-- --------------------------------------------------------

--
-- Структура таблицы `transactions`
--

CREATE TABLE `transactions` (
  `id` int(11) NOT NULL,
  `trns_id` int(11) NOT NULL,
  `trns_type` varchar(60) NOT NULL,
  `trns_date` varchar(50) NOT NULL,
  `trns_status` varchar(40) NOT NULL,
  `writer_id` varchar(406) NOT NULL,
  `trns_fullname` varchar(60) NOT NULL,
  `trans_amount` varchar(20) NOT NULL,
  `payment_details` text NOT NULL,
  `paid_details` text NOT NULL,
  `action_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `type_service`
--

CREATE TABLE `type_service` (
  `id` int(11) NOT NULL,
  `pvalue` int(11) NOT NULL,
  `servicename` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `type_service`
--

INSERT INTO `type_service` (`id`, `pvalue`, `servicename`) VALUES
(7, 1, 'Editing'),
(8, 2, 'Proofreading'),
(9, 3, 'Analysis');

-- --------------------------------------------------------

--
-- Структура таблицы `urgency`
--

CREATE TABLE `urgency` (
  `id` int(11) NOT NULL,
  `pvalue` varchar(20) NOT NULL,
  `urgency` varchar(30) NOT NULL,
  `duration` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `urgency`
--

INSERT INTO `urgency` (`id`, `pvalue`, `urgency`, `duration`) VALUES
(2, '12.56', '24', 'Hours'),
(3, '10', '48', 'hours'),
(4, '8', '3', 'Days');

-- --------------------------------------------------------

--
-- Структура таблицы `usa_states`
--

CREATE TABLE `usa_states` (
  `id` int(11) NOT NULL,
  `abbr` varchar(2) NOT NULL,
  `states_name` varchar(250) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `usa_states`
--

INSERT INTO `usa_states` (`id`, `abbr`, `states_name`) VALUES
(1, 'AL', 'Alabama'),
(2, 'AK', 'Alaska'),
(3, 'AZ', 'Arizona'),
(4, 'AR', 'Arkansas'),
(5, 'CA', 'California'),
(6, 'CO', 'Colorado'),
(7, 'CT', 'Connecticut'),
(8, 'DE', 'Delaware'),
(9, 'DC', 'District of Columbia'),
(10, 'FL', 'Florida'),
(11, 'GA', 'Georgia'),
(12, 'HI', 'Hawaii'),
(13, 'ID', 'Idaho'),
(14, 'IL', 'Illinois'),
(15, 'IN', 'Indiana'),
(16, 'IA', 'Iowa'),
(17, 'KS', 'Kansas'),
(18, 'KY', 'Kentucky'),
(19, 'LA', 'Louisiana'),
(20, 'ME', 'Maine'),
(21, 'MD', 'Maryland'),
(22, 'MA', 'Massachusetts'),
(23, 'MI', 'Michigan'),
(24, 'MN', 'Minnesota'),
(25, 'MS', 'Mississippi'),
(26, 'MO', 'Missouri'),
(27, 'MT', 'Montana'),
(28, 'NE', 'Nebraska'),
(29, 'NV', 'Nevada'),
(30, 'NH', 'New Hampshire'),
(31, 'NJ', 'New Jersey'),
(32, 'NM', 'New Mexico'),
(33, 'NY', 'New York'),
(34, 'NC', 'North Carolina'),
(35, 'ND', 'North Dakota'),
(36, 'OH', 'Ohio'),
(37, 'OK', 'Oklahoma'),
(38, 'OR', 'Oregon'),
(39, 'PA', 'Pennsylvania'),
(40, 'RI', 'Rhode Island'),
(41, 'SC', 'South Carolina'),
(42, 'SD', 'South Dakota'),
(43, 'TN', 'Tennessee'),
(44, 'TX', 'Texas'),
(45, 'UT', 'Utah'),
(46, 'VT', 'Vermont'),
(47, 'VA', 'Virginia'),
(48, 'WA', 'Washington'),
(49, 'WV', 'West Virginia'),
(50, 'WI', 'Wisconsin'),
(51, 'WY', 'Wyoming'),
(52, 'ot', 'Outside USA');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `oauth_provider` varchar(255) NOT NULL,
  `oauth_uid` varchar(255) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `locale` varchar(10) NOT NULL,
  `picture_url` varchar(255) NOT NULL,
  `profile_url` varchar(255) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  `image` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `oauth_provider`, `oauth_uid`, `first_name`, `last_name`, `email`, `gender`, `locale`, `picture_url`, `profile_url`, `created`, `modified`, `image`) VALUES
(1, 'ds', 'ads', 'das', 'da', 'asd@dd.com', '', '', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '');

-- --------------------------------------------------------

--
-- Структура таблицы `writers`
--

CREATE TABLE `writers` (
  `id` int(11) NOT NULL,
  `writer_id` int(100) NOT NULL,
  `sup_manager` varchar(255) NOT NULL,
  `last_tech_message` varchar(255) NOT NULL,
  `prof_ord_notices` varchar(1000) NOT NULL,
  `oth_bids_notice` varchar(1000) NOT NULL,
  `wr_files_notice` varchar(1000) NOT NULL,
  `firstname` varchar(128) NOT NULL,
  `slug` varchar(128) NOT NULL,
  `lastname` varchar(60) DEFAULT NULL,
  `gender` varchar(50) DEFAULT NULL,
  `viewed` varchar(255) NOT NULL,
  `online` varchar(255) NOT NULL,
  `text` text NOT NULL,
  `profile_img` varchar(80) NOT NULL,
  `country` varchar(60) DEFAULT NULL,
  `streetaddress` varchar(200) NOT NULL,
  `zip` varchar(50) CHARACTER SET latin1 DEFAULT NULL,
  `city` varchar(60) DEFAULT NULL,
  `state` varchar(50) DEFAULT NULL,
  `email` varchar(60) NOT NULL,
  `password` varchar(50) NOT NULL,
  `primaryphone` varchar(50) NOT NULL,
  `availability` varchar(10) NOT NULL,
  `citation` varchar(20) DEFAULT NULL,
  `nativelanguage` varchar(50) NOT NULL,
  `academiclevel` varchar(60) DEFAULT NULL,
  `subject` varchar(10000) NOT NULL,
  `writer_status` varchar(40) NOT NULL,
  `user_level` varchar(25) NOT NULL,
  `writer_level` varchar(30) NOT NULL,
  `manager_fine` varchar(255) NOT NULL,
  `admin_level` varchar(255) NOT NULL,
  `mystatus` int(10) NOT NULL,
  `subscription` varchar(30) NOT NULL DEFAULT '0',
  `loggedin` int(11) NOT NULL DEFAULT '0',
  `mngr_neworder` varchar(1000) NOT NULL,
  `mngr_new_order_files` varchar(1000) NOT NULL,
  `mngr_new_order_bid` varchar(1000) NOT NULL,
  `mngr_newuser` varchar(1000) NOT NULL,
  `mngr_wait_accept` varchar(1000) NOT NULL,
  `mngr_new_order_mes` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `writers`
--

INSERT INTO `writers` (`id`, `writer_id`, `sup_manager`, `last_tech_message`, `prof_ord_notices`, `oth_bids_notice`, `wr_files_notice`, `firstname`, `slug`, `lastname`, `gender`, `viewed`, `online`, `text`, `profile_img`, `country`, `streetaddress`, `zip`, `city`, `state`, `email`, `password`, `primaryphone`, `availability`, `citation`, `nativelanguage`, `academiclevel`, `subject`, `writer_status`, `user_level`, `writer_level`, `manager_fine`, `admin_level`, `mystatus`, `subscription`, `loggedin`, `mngr_neworder`, `mngr_new_order_files`, `mngr_new_order_bid`, `mngr_newuser`, `mngr_wait_accept`, `mngr_new_order_mes`) VALUES
(209, 2562, '', '', '', '', '', 'Администратор', '', 'Администратор', NULL, 'true', '1532936455', 'Accounting, economics', '', NULL, '', '', NULL, '', 'mobile-gsm1985@mail.ru', '4712163d65c5d851290ee43a44ffd0fd', '', '', '', '2131-2312-3123-1231', NULL, '', 'Active', 'writer', 'admin', '', 'super', 0, '0', 1, ', 495, 496, 497, 498, 499', ', 495, 495', ', 437, 486, 499, 499, 465, 441, 495, 465, 465', ', 3802', '', ', 459#avtor'),
(243, 3548, '', '', '', '', '', 'vlad_manager', 'Владимир', 'ukr.net', NULL, 'true', '1532936979', '', '', NULL, '', NULL, NULL, NULL, 'shaitan.vova@ukr.net', 'a7dc3e05bd16bfb136cd98f2096b02fa', '0930794799', '', NULL, '2131-2312-3123-1231', NULL, '', 'Active', 'writer', 'admin', '', '', 0, '0', 0, ', 495, 496, 497, 498, 499', ', 443, 496, 498, 498, 492, 492, 499, 499', ', 495, 495, 495, 492, 492, 492, 492, 495, 495, 495, 495, 491, 489, 495, 489, 495, 495, 489, 489, 495, 495, 495, 495, 498, 498, 498, 498, 498, 498, 498, 498, 498, 498, 498, 498, 498, 498, 498, 498, 498, 498, 498, 437, 486, 499, 499, 499, 499, 499, 499, 465, 441, 495, 465, 465', ', 3798, 3799, 3800, 3801, 3802, 3802, 3802', '', ''),
(278, 3554, '', '06.08.2018 13:09:03', '', '', '', 'Николай', 'Николай', 'Долгошеев', NULL, 'true', '1529415484', '', '', NULL, '', NULL, NULL, NULL, 'mobile-gsm1985@ukr.net', 'e10adc3949ba59abbe56e057f20f883e', '+380973872646', '', NULL, '2131-2312-3123-1231', '', 'АПП (Автоматизация производственных процессов), Промышленность, Юридические дисциплины, Юриспруденция, Спорт и туризм', 'Active', 'client', 'writer', '', '', 0, '0', 1, '', '', '', '', '', ''),
(280, 3556, '3738', '23.08.2018 17:17:50', ', 494, 495, 496, 497, 498, 499', '', '', 'Автор ', 'Автор', 'Иванов', NULL, 'true', '1535698802', 'юридические дисциплины ', 'logo1.png', NULL, '', NULL, NULL, NULL, 'legko_v_onua@mail.ru', 'e3ceb5881a0a1fdaad01296d7554868d', '0679672177', '', NULL, '2131-2312-3123-1231', NULL, 'АПП (Автоматизация производственных процессов), Административное право, Анализ, Анатомия, Английский язык, Антикризисное управление, Архитектура, Астрономия, Аудит бух и управленческий учет, АХД, Банк и инвестиционный менеджмент, Банковское дело, Банкротство, БЖД, Бизнес-планирование, Биология, Бухучет и статистика, ВСТИ, Внешнеэконом деятельность (ВЭД), География, Геодезия, Геополитика, Гидравлика, Гостиничное дело, Гражданское право, Графика, Делопроизводство, Деньги кредит банки, Детали машин, Дизайн, ДКБ (деньги кредит банки), Дошкольная педагогика, Жилищное право, Журналистика, Земельное право, Здравоохранение, Инвестиционный менеджмент, Инвестиция, Инженерная графика, Иностранные языки, Информатика, Информатика и программирование, История, Искусство, Коммерческая деятельность, Компьютерные сети и телекоммуникации, Конфликтология, Конституционное право, Криминалистика, Криминология, Кулинария, Культура и искусство, Культурология, Лингвистика, Литература, Логика, Логистика, Логопедия, Макроэкономика, Маркетинг, Математика, Материаловедение, Машиностроение, Медицина, Международные отношения, Международное право , Менеджмент, Менеджмент  качества, Менеджмент организации, Механика, Микроэкономика, Мировая  экономика, Муниципальное право, Налоги, Немецкий язык, Организация труда, Организация труда и производства, Основы конструирования, Основы предпринимательства, Охрана природы, Охрана труда, Педагогика, Педиатрия, Политология, Право, Право Европейского союза, Предпринимательство, Предприятие, Программирование, Производство, Промышленность, Процессы и апп пищевой пром, Психология, Радиосвязь и радиотехника, Разное, Реклама и PR, Русский язык и литература, Сельское хозяйство, Семейное право, Сист передачи и сист коммутации, Сопромат, Социальная работа, Социология, Спорт и туризм, Статистика, Стратегический маркетинг, Стратегический менеджмент, Стандартизация , Страхование, Строительство, Судебная бухгалтерия, Телекоммуникация, Теоретическая механика, Теория государства и права, Теория машин и механизмов (тмм), Теплотехника, Теплоэнергетика, Технические, Технология машиностроения, Товароведение, Торговля, Транспорт, Трудовое право, Туризм, Уголовное право, Уголовный процесс, Украинский язык и литература, Управление затратами, Управление логистикой, Управление персоналом (HR), Управление проектами, Управленческие исследования, Управленческий учёт, Физика, Физкультура и спорт, Филология, Философия, Финансы, Финансы и кредит, Французский язык, Химия, Химия и физика, Хирургия, Цены и ценообразование, Черчение, Экология, Экономика, Экономика предприятия, Экономическая теория, Экономические дисциплины, Экономический анализ, Экскурсоведение, Электроника и радиотехника, Электротехника, Электроэнергетика, Энергетика, Энергосбережение, Этика и эстетика, Юридические дисциплины, Юриспруденция', 'Active', 'writer', 'writer', '', '', 0, '0', 1, '', '', '', '', '', ''),
(281, 3557, '', '', ', 363, 364, 365, 366, 367, 368, 369, 370, 371, 373, 374, 375, 376, 377, 378, 379, 380, 381, 382, 383, 384, 385, 386, 387, 388, 389, 390, 391, 392, 393, 395, 396, 397, 398, 399, 400, 401, 402, 404, 405, 406, 410, 411, 412, 413, 414', '', '', 'Настя', 'Насия', 'Днищенко', NULL, 'true', '1531215278', 'памату', 'owl.png', NULL, '', NULL, NULL, NULL, 'gsvs4ever@gmail.com', '21232f297a57a5a743894a0e4a801fc3', '1561611', '', NULL, '1111222', NULL, '', 'Active', 'writer', 'admin', '', '', 1, '0', 1, ', 495, 496, 497, 498, 499', ', 496, 498, 498, 492, 492, 499, 499', ', 495, 495, 495, 492, 492, 492, 492, 495, 495, 495, 495, 491, 489, 495, 489, 495, 495, 489, 489, 495, 495, 495, 495, 498, 498, 498, 498, 498, 498, 498, 498, 498, 498, 498, 498, 498, 498, 498, 498, 498, 498, 498, 437, 486, 499, 499, 499, 499, 499, 499, 465, 441, 495, 465, 465', ', 3798, 3799, 3800, 3801, 3802, 3802, 3802', '', ''),
(282, 3558, '', '', '', '', '', 'Анна Добровольская', '', NULL, NULL, 'true', '1533041546', '', '2.png', NULL, '', NULL, NULL, NULL, 'dobrovolskaya0901@gmail.com', '21232f297a57a5a743894a0e4a801fc3', '099999565', '', NULL, '', NULL, '', 'Active', 'client', 'writer', '', '', 0, '0', 1, '', '', '', '', '', ''),
(283, 3559, '3548', '06.08.2018 14:04:11', ', 363, 364, 365, 366, 367, 368, 369, 370, 371, 373, 374, 375, 376, 377, 378, 379, 380, 381, 382, 383, 384, 385, 386, 387, 388, 389, 390, 391, 392, 393, 395, 396, 397, 398, 399, 400, 401, 402, 404, 405, 406, 410, 411, 412, 413', '', '', 'Наталия ', 'Наталия', 'Петрова ', NULL, 'true', '1532569488', 'автор работ', '', NULL, '', NULL, NULL, NULL, 'boykoveronika2@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '0679321402', '', NULL, '145112457896', NULL, '', 'Active', 'writer', 'admin', '', '', 0, '0', 1, ', 495, 496, 497, 498, 499', ', 496, 498, 498, 492, 492, 499, 499', ', 495, 495, 495, 492, 492, 492, 492, 495, 495, 495, 495, 491, 489, 495, 489, 495, 495, 489, 489, 495, 495, 495, 495, 498, 498, 498, 498, 498, 498, 498, 498, 498, 498, 498, 498, 498, 498, 498, 498, 498, 498, 498, 437, 486, 499, 499, 499, 499, 499, 499, 465, 441, 495, 465, 465', ', 3798, 3799, 3800, 3801, 3802, 3802, 3802', '', ''),
(284, 3560, '', '', '', '', '', 'Алена ', '', 'Божок ', NULL, 'true', '', '', '', NULL, '', NULL, NULL, NULL, 'bogokalena@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '0679672177', '', NULL, '2131-2312-3123-1231', NULL, '', 'False', 'client', '', '', '', 0, '0', 0, '', '', '', '', '', ''),
(289, 3561, '', '', ', 363, 364, 365, 366, 367, 368, 369, 370, 371, 372, 373, 374, 375, 376, 377, 378, 379, 380, 381, 382, 383, 384, 385, 386, 387, 388, 389, 390, 391, 392, 393, 394, 395, 396, 397, 398, 399, 400, 401, 402, 403, 404, 405, 406, 407, 408, 409, 410, 411, 412, 413, 414, 415, 416, 417, 418, 419, 420, 421, 422, 423, 424, 425, 426, 427, 428, 429, 430, 431, 432, 433, 434, 435, 436, 437, 438, 439, 440, 441, 442, 443, 444, 445, 446, 447, 448, 449, 450, 451, 452, 453, 454, 455, 456, 457, 458, 459, 460, 461, 462, 463, 464, 465, 466, 467, 468, 469, 470, 471, 472, 473, 474, 475, 476, 477, 478, 479, 480, 481, 482, 483, 484, 485, 486, 487, 488, 489, 490, 491, 492, 493, 494, 495, 496, 497, 498, 499', '', '', 'Ольга ', '', 'Сидорова', NULL, 'true', '1529417884', '', '', NULL, '', NULL, NULL, NULL, 'legko-v-uchebe@ukr.net', 'e10adc3949ba59abbe56e057f20f883e', '380679672177', '', NULL, '2131-2312-3123-1231', NULL, 'АПП (Автоматизация производственных процессов), Административное право, Анализ, Анатомия, Английский язык, Антикризисное управление, Архитектура, Астрономия, Аудит бух и управленческий учет, АХД, Банк и инвестиционный менеджмент, Банковское дело, Банкротство, БЖД, Бизнес-планирование, Биология, Бухучет и статистика, ВСТИ, Внешнеэконом деятельность (ВЭД), География, Геодезия, Геополитика\r\n, Гидравлика, Гостиничное дело, Гражданское право\r\n, Графика, Делопроизводство, Деньги кредит банки, Детали машин, Дизайн\r\n, ДКБ (деньги кредит банки), Дошкольная педагогика, Жилищное право, Журналистика, Земельное право, Здравоохранение, Инвестиционный менеджмент, Инвестиция, Инженерная графика, Иностранные языки, Информатика, Информатика и программирование, История, Искусство, Коммерческая деятельность, Компьютерные сети и телекоммуникации, Конфликтология, Конституционное право, Криминалистика, Криминология, Кулинария, Культура и искусство, Культурология, Лингвистика, Литература, Логика, Логистика, Логопедия, Макроэкономика, Маркетинг, Математика, Материаловедение, Машиностроение, Медицина, Международные отношения, Международное право , Менеджмент, Менеджмент  качества, Менеджмент организации, Механика, Микроэкономика, Мировая  экономика, Муниципальное право, Налоги, Немецкий язык, Организация труда, Организация труда и производства, Основы конструирования, Основы предпринимательства, Охрана природы, Охрана труда, Педагогика, Педиатрия, Политология, Право, Право Европейского союза, Предпринимательство, Предприятие, Программирование, Производство, Промышленность, Процессы и апп пищевой пром, Психология, Радиосвязь и радиотехника, Разное, Реклама и PR, Русский язык и литература, Сельское хозяйство, Семейное право, Сист передачи и сист коммутации, Сопромат, Социальная работа, Социология, Спорт и туризм, Статистика, Стратегический маркетинг, Стратегический менеджмент, Стандартизация , Страхование, Строительство, Судебная бухгалтерия, Телекоммуникация, Теоретическая механика, Теория государства и права, Теория машин и механизмов (тмм), Теплотехника, Теплоэнергетика, Технические, Технология машиностроения, Товароведение, Торговля, Транспорт, Трудовое право, Туризм, Уголовное право, Уголовный процесс, Украинский язык и литература, Управление затратами, Управление логистикой, Управление персоналом (HR), Управление проектами, Управленческие исследования, Управленческий учёт, Физика, Физкультура и спорт, Филология, Философия, Финансы, Финансы и кредит, Французский язык, Химия, Химия и физика, Хирургия, Цены и ценообразование, Черчение, Экология, Экономика, Экономика предприятия, Экономическая теория, Экономические дисциплины, Экономический анализ, Экскурсоведение, Электроника и радиотехника, Электротехника, Электроэнергетика, Энергетика, Энергосбережение, Этика и эстетика, Юридические дисциплины, Юриспруденция', 'Active', 'writer', 'writer', '', '', 0, '0', 1, '', '', '', '', '', ''),
(292, 3562, '', '12.08.2018 08:37:19', ', 441, 465, 490, 495, 499', '', '', 'Оксана', 'Оксана', 'Теленик', NULL, 'true', '1535695310', '-', '', NULL, '', NULL, NULL, NULL, 'Oksana09051990@ukr.net', 'e10adc3949ba59abbe56e057f20f883e', '0662376931', '', NULL, '4149497846642561', NULL, 'Административное право, Гражданское право\r\n, Жилищное право, Журналистика, Земельное право, История, Конституционное право, Криминалистика, Криминология, Международное право , Охрана труда, Политология, Право, Право Европейского союза, Семейное право, Теория государства и права, Трудовое право, Уголовное право, Уголовный процесс, Филология, Философия, Экология, Юридические дисциплины, Юриспруденция', 'Active', 'writer', 'writer', '231312', '', 0, '0', 1, '', '', '', '', '', ''),
(313, 3563, '', '06.08.2018 13:12:01', '', '', '', 'Ольга', 'Ольга', 'Петрова ', NULL, 'true', '1520547955', 'автор', '', NULL, '', NULL, NULL, NULL, 'sony637@ukr.net', 'e10adc3949ba59abbe56e057f20f883e', '', '', NULL, '54545222255', NULL, '', 'Active', 'client', 'writer', '123123', '', 0, '0', 1, '', '', '', '', '', ''),
(352, 3566, '', '', '', '', '', 'Инна ', 'Инна', 'Павлова', NULL, 'true', '1532943396', '', '', NULL, '', NULL, NULL, NULL, 'legkovuchebe@gmail.com', '1a8dbba4bad26ba73450ce22a7f40330', '+38-096-005-45-75', '', 'MLA', '4149-4978-2743-7205', NULL, '', 'Active', 'writer', 'admin', '', '', 0, '0', 1, ', 495, 496, 497, 498, 499', '', ', 492, 492, 492, 492, 491, 489, 489, 489, 489, 498, 498, 498, 498, 498, 498, 498, 498, 498, 498, 498, 498, 498, 498, 498, 498, 498, 498, 498, 437, 486, 465, 441, 495, 465, 465', ', 3802', '', ', 459#avtor'),
(353, 3567, '', '', '', '', '', 'авпап', '', 'апвапы', NULL, 'true', '1522400382', '', '', NULL, '', NULL, NULL, NULL, 'dghdhthukg@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'апавпавп', '', NULL, '2131-2312-3123-1231', NULL, '', 'Active', 'client', '', '', '', 0, '0', 0, '', '', '', '', '', ''),
(354, 3568, '', '', ', 407, 408, 409, 418, 419, 425, 426, 427, 433, 441, 467', '', '', 'Гапоненко Анна', 'Гапоненко-Анна', 'gaponenkoanna1987@gmail.com', NULL, 'true', '1533026881', '', '', NULL, '', NULL, NULL, NULL, 'gaponenkoanna1987@gmail.com', '4a44d76225fdddc731207859f6127ecf', '097 943 30 52', '', 'MLA', '5168-7556-1678-0413', NULL, 'БЖД, Внешнеэконом деятельность (ВЭД), Геополитика\r\n, Гостиничное дело, Дошкольная педагогика, Журналистика, Здравоохранение, История, Коммерческая деятельность, Конфликтология, Литература, Макроэкономика, Маркетинг, Международные отношения, Менеджмент, Менеджмент  качества, Менеджмент организации, Микроэкономика, Мировая  экономика, Организация труда, Организация труда и производства, Основы предпринимательства, Охрана природы, Охрана труда, Педагогика, Политология, Предпринимательство, Разное, Реклама, PR, Сельское хозяйство, Социальная работа, Социология, Спорт и туризм, Стратегический менеджмент, Страхование, Телекоммуникация, Торговля, Туризм, Украинский язык и литература, Управление персоналом (HR), Управленческие исследования, Физкультура и спорт, Филология, Философия, Экономика, Экономика предприятия, Экономическая теория, Экономические дисциплины, Электроэнергетика, Энергетика, Энергосбережение, Этика и эстетика', 'Active', 'writer', '', '', '', 0, '0', 1, '', '', '', '', '', ''),
(355, 3569, '', '12.08.2018 08:36:33', ', 465, 490, 499', '', ', 467', 'Юлия', 'Юлия', 'Дубовенко', NULL, 'true', '1535658286', '', '', NULL, '', NULL, NULL, NULL, 'yuliyadubovenko@gmail.com', '9b17468ed230d324049a7cff07a15cef', '0507859763', '', 'MLA', '4149439106074515', NULL, 'Юридические дисциплины', 'Active', 'writer', '', '', '', 0, '0', 1, '', '', '', '', '', ''),
(356, 3570, '', '', ', 367, 378, 434, 437, 443', '', '', 'Nikolay', 'nikolay', 'Dolgosheev', NULL, 'true', '1522331325', '', '3dview-41.jpg', NULL, '', NULL, NULL, NULL, 'mobile-gsm19851985@mail.ru', 'e4f22d820f311450860a37813cd102a4', '0953381030', '', 'MLA', '4569-4582-4712-9632', NULL, '', 'Active', 'client', 'writer', '', '', 0, '0', 0, '', '', '', '', '', ''),
(357, 3571, '', '', ', 367, 378, 407, 408, 409, 418, 419, 421, 422, 424, 426, 427, 428, 433, 436, 438, 440, 442, 465, 490, 495, 499', '', '', 'Татьяна', 'Татьяна', 'Мигина', NULL, 'true', '1534542846', 'Ответственный автор', '', NULL, '', NULL, NULL, NULL, 't.migina5@gmail.com', '2931063739d4a2ea969474ff753bf05e', '0978797829', '', 'MLA', '4149-4378-6643-0968', NULL, 'Административное право, Архитектура, Банковское дело, Банкротство, БЖД, Гражданское право\r\n, Дошкольная педагогика, Жилищное право, Земельное право, История, Конфликтология, Конституционное право, Криминалистика, Криминология, Кулинария, Культура и искусство, Культурология, Логика, Математика, Налоги, Организация труда, Педагогика, Педиатрия, Политология, Право, Право Европейского союза, Предпринимательство, Разное, Трудовое право, Уголовный процесс, Этика и эстетика, Юридические дисциплины, Юриспруденция', 'Active', 'writer', '', '', '', 0, '0', 1, '', '', '', '', '', ''),
(358, 3572, '', '', ', 426, 427, 428, 433, 434, 436, 437, 438, 440, 442, 443, 465, 482, 490, 495, 499', '', '', 'Инна', 'Инна', 'Сологуб', NULL, 'true', '1535559620', '', '', NULL, '', NULL, NULL, NULL, 'insolo@ukr.net', '03bc8e45ce4903b86f933ebb1fedbc44', '0991251103', '', 'MLA', '5457-0822-3704-7399', NULL, 'Административное право, Анализ, Астрономия, Банкротство, БЖД, Бизнес-планирование, География, Гражданское право\r\n, Делопроизводство, Жилищное право, Земельное право, Конституционное право, Криминалистика, Криминология, Кулинария, Культура и искусство, Культурология, Литература, Логика, Логистика, Международное право , Основы предпринимательства, Охрана природы, Охрана труда, Педагогика, Политология, Право, Право Европейского союза, Предпринимательство, Предприятие, Разное, Русский язык и литература, Сельское хозяйство, Семейное право, Социальная работа, Строительство, Трудовое право, Уголовное право, Уголовный процесс, Украинский язык и литература, Юридические дисциплины, Юриспруденция', 'Active', 'writer', '', '', '', 0, '0', 0, '', '', '', '', '', ''),
(359, 3573, '', '', '', '', '', 'Владислав', '', 'Грищук', NULL, '', '1522332302', '', '', NULL, '', NULL, NULL, NULL, 'gargen1488@mail.ru', 'c50f0651f84c301692aa57dbabee2d22', '0637993961', '', NULL, '2131-2312-3123-1231', NULL, '', 'Active', 'client', '', '', '', 0, '0', 0, '', '', '', '', '', ''),
(360, 3574, '', '', ', 363, 364, 365, 366, 368, 369, 370, 371, 373, 374, 375, 376, 377, 379, 380, 381, 382, 383, 384, 385, 386, 387, 388, 389, 390, 391, 392, 393, 395, 396, 397, 398, 399, 400, 401, 402, 404, 405, 406, 410, 411, 412, 413, 415, 429, 430, 431, 432, 434, 435, 437, 439, 443, 444, 445, 446, 447, 448, 449, 450, 451, 452, 453, 454, 455, 456, 457, 458, 459, 460, 461, 462, 463, 464, 466, 469, 470, 471, 472, 473, 474, 475, 476, 477, 478, 479, 480, 481, 482, 483, 484, 485, 486, 487, 488, 489, 491, 492, 493, 494, 496, 497, 498', '', '', 'Вова', 'Вова', 'Вова', NULL, 'true', '1522334164', '', '', NULL, '', NULL, NULL, NULL, 'beliy1983@bigmir.net', '5f48c2c2ce5c2e908070b866b61af238', '0930794488', '', 'MLA', '2222-5555-5444-4777', NULL, 'АПП (Автоматизация производственных процессов), Анализ, Английский язык', 'False', 'writer', '', '', '', 0, '0', 0, '', '', '', '', '', ''),
(361, 3575, '', '', '', '', '', 'Инна', '', 'Бойко', NULL, 'true', '1529358507', '', '', NULL, '', NULL, NULL, NULL, 'inna200669@ukr.net', '1a8dbba4bad26ba73450ce22a7f40330', 'Павловна', '', NULL, '2131-2312-3123-1231', NULL, '', 'Active', 'client', '', '', '', 0, '0', 1, '', '', '', '', '', ''),
(362, 3576, '', '', '', '', '', 'Татьяна', '', 'Олейник', NULL, '', '1522403102', '', '', NULL, '', NULL, NULL, NULL, 'oleuni4ka@mail.ru', '291773595638900db1a8f550eb63e3a8', '0666199186', '', NULL, '2131-2312-3123-1231', NULL, '', 'Active', 'client', '', '', '', 0, '0', 1, '', '', '', '', '', ''),
(363, 3577, '', '', ', 437, 442, 443, 467, 482, 495', '', ', 467', 'Ирина', 'Ирина', 'Пелехович', NULL, 'true', '1535456246', '', '', NULL, '', NULL, NULL, NULL, 'pel-irina@ukr.net', 'd2e9e36be99fbc3e7b8011b4449fe690', '0672832337', '', 'MLA', '4149-4378-6493-9283', NULL, 'Административное право, Анализ, Антикризисное управление, Аудит, бух и управленческий учет, Банк и инвестиционный менеджмент, Банковское дело, Банкротство, Внешнеэконом деятельность (ВЭД), Гостиничное дело, Делопроизводство, Деньги, кредит,банки, ДКБ (деньги, кредит, банки), Журналистика, Инвестиционный менеджмент, Инвестиция, История, Коммерческая деятельность, Конституционное право, Макроэкономика, Маркетинг, Международные отношения, Международное право , Менеджмент, Менеджмент организации, Микроэкономика, Мировая  экономика, Организация труда, Организация труда и производства, Основы предпринимательства, Политология, Право, Предпринимательство, Предприятие, Реклама, PR, Стратегический менеджмент, Теория государства и права, Товароведение, Торговля, Туризм, Уголовное право, Уголовный процесс, Управление затратами, Управление персоналом (HR), Управленческий учёт, Философия, Финансы, Финансы и кредит, Цены и ценообразование, Экономика, Экономика предприятия, Экономическая теория, Эконо', 'Active', 'writer', '', '', '', 0, '0', 1, '', '', '', '', '', ''),
(364, 3578, '', '', ', 442, 443, 467, 482, 495', '', '', 'Натали', 'Натали', 'Яковенко', NULL, 'true', '1534701148', '', '', NULL, '', NULL, NULL, NULL, 'stalk@bigmir.net', 'a657d11082e4d93d9436e19bd4504b77', '0973881103', '', 'MLA', '5168-7427-0526-9920', NULL, 'Административное право, Анализ, Антикризисное управление, Аудит, бух и управленческий учет, АХД, Банк и инвестиционный менеджмент, Банковское дело, Банкротство, БЖД, Бизнес-планирование, Биология, Бухучет, статистика, ВСТИ, Внешнеэконом деятельность (ВЭД), География, Геополитика\r\n, Гостиничное дело, Гражданское право\r\n, Делопроизводство, Деньги, кредит,банки, ДКБ (деньги, кредит, банки), Дошкольная педагогика, Жилищное право, Земельное право, Здравоохранение, Инвестиционный менеджмент, Инвестиция, Информатика, Информатика и программирование, История, Коммерческая деятельность, Компьютерные сети и телекоммуникации, Конфликтология, Конституционное право, Криминалистика, Криминология, Кулинария, Культура и искусство, Культурология, Литература, Логика, Логистика, Макроэкономика, Маркетинг, Медицина, Международные отношения, Международное право , Менеджмент, Менеджмент  качества, Менеджмент организации, Микроэкономика, Мировая  экономика, Муниципальное право, Налоги, Организация труда, Орга', 'Active', 'writer', '', '', '', 0, '0', 1, '', '', '', '', '', ''),
(365, 3579, '', '', ', 414, 420, 423, 468', '', '', 'Богдан', 'Богдан', 'Пупенко', NULL, 'true', '1532784539', '1. Высшее учебное заведение, которое закончил: \r\nЖитомирский государственный педагогический \r\nуниверситет им.И.Я.Франко \r\n2. Год окончания высшего учебного заведения: 1999 \r\n3. Время начала преподавательской деятельности: 1998 \r\n4. Образование: высшее \r\n5. Квалификация: специалист высшей категории\r\n6. О себе: терпелив, спокоен, характерна пунктуальность и точность в исполнении доручений или работы\r\n7. Город проживания: Новоград-Волынский\r\n', '', NULL, '', NULL, NULL, NULL, '090176bogdan@gmail.com', '799af03dd5c61eb57b57ccc3446c9285', '+38(098)5173252', '', 'MLA', '5168-7572-9417-2475', NULL, 'Анатомия, Биология, Медицина, Экология', 'Active', 'writer', '', '', '', 0, '0', 1, '', '', '', '', '', ''),
(366, 3580, '', '', '', '', '', 'Вера', 'Вера', 'Пилипенко', NULL, 'true', '1535650830', 'высшее образование: филолог, преподаватель английского языка и зарубежной литературы; секретарь-делопроизводитель; работаю начальником отдела кадров', 'Кот-идет-к-цели.jpg', NULL, '', NULL, NULL, NULL, 'ledivi@ukr.net', '3af00c6cad11f7ab5db4467b66ce503e', '+380974104808', '', 'MLA', '5168-7556-2778-3026', NULL, 'Административное право, Английский язык, Астрономия, БЖД, География, Гражданское право\r\n, Делопроизводство, Дошкольная педагогика, История, Искусство, Конфликтология, Кулинария, Культура и искусство, Культурология, Лингвистика, Литература, Логика, Организация труда, Охрана труда, Педагогика, Политология, Право, Психология, Разное, Русский язык и литература, Семейное право, Социальная работа, Социология, Теория государства и права, Трудовое право, Украинский язык и литература, Управление персоналом (HR), Физкультура и спорт, Филология, Философия, Экология, Этика и эстетика, Юридические дисциплины, Юриспруденция', 'Active', 'writer', '', '', '', 0, '0', 1, '', '', '', '', '', ''),
(367, 3581, '', '', '', '', '', 'Ольга', 'Ольга', 'Копылковская', NULL, 'true', '1535375300', 'Образование: высшее специальное (музыкальная педагогика).\r\nЗакончила магистратуру в Национальном педагогическом университете имени Драгоманова в 2002 году. Есть кандидатский минимум.\r\nНациональном педагогическом университете имени Драгоманова\r\nОпыт работы. Занимаюсь созданием студенческих и научных работ более 15-ти лет. За это время мною были написаны рефераты, теоретические контрольные, курсовые, дипломные, магистерские работы на различные темы по многим предметам (на русском и украинском языках).', 'Це_я1.png', NULL, '', NULL, NULL, NULL, 'olechka9972@ukr.net', 'c9644f513fd9f9a17ace0bd5e149526c', '0674968029', '', 'MLA', '5168-7572-9680-4513', NULL, 'Геополитика\r\n, Гостиничное дело, Дошкольная педагогика, Конфликтология, Кулинария, Культура и искусство, Культурология, Международные отношения, Менеджмент, Мировая  экономика, Охрана природы, Педагогика, Политология, Разное, Реклама, PR, Социальная работа, Социология, Спорт и туризм, Теория государства и права, Туризм, Украинский язык и литература, Физкультура и спорт, Философия, Экология, Экономическая теория, Этика и эстетика', 'Active', 'writer', '', '', '', 0, '0', 1, '', '', '', '', '', ''),
(368, 3582, '', '', '', '', '', 'Каріна', '', 'Кузь', NULL, '', '1522344357', '', '', NULL, '', NULL, NULL, NULL, 'karina26079979@gmail.com', '6af0a3c038367731e6020c0e7fcb6446', '0687598964', '', NULL, '2131-2312-3123-1231', NULL, '', 'Active', 'client', '', '', '', 0, '0', 0, '', '', '', '', '', ''),
(369, 3583, '', '', ', 363, 364, 365, 366, 368, 369, 370, 371, 373, 374, 375, 376, 377, 379, 380, 381, 382, 383, 384, 385, 386, 387, 388, 389, 390, 391, 392, 393, 394, 395, 396, 397, 398, 399, 400, 401, 402, 404, 406, 410, 412, 413, 415, 429, 430, 431, 432, 435, 439, 442, 444, 445, 446, 447, 448, 449, 450, 451, 452, 453, 454, 455, 456, 457, 458, 459, 460, 461, 462, 463, 466, 467, 469, 470, 471, 472, 473, 474, 475, 476, 477, 478, 479, 480, 481, 483, 484, 485, 486, 487, 488, 489, 491, 492, 493, 494, 496, 497, 498', '', '', 'Светлана', 'Светлана', 'Мисюра', NULL, 'true', '1522360891', '', '', NULL, '', NULL, NULL, NULL, 'sveta956@ukr.net', '076e61a7b2a538b59a00d593f3dcd26d', '095-300-77-60', '', 'MLA', '5168-7573-6156-2053', NULL, 'АПП (Автоматизация производственных процессов), Банкротство, ВСТИ, Геодезия, Детали машин, Инженерная графика, Материаловедение, Машиностроение, Механика, Основы конструирования, Охрана труда, Предприятие, Производство, Стандартизация , Теория машин и механизмов (тмм), Теплотехника, Теплоэнергетика, Технические, Технология машиностроения, Управление персоналом (HR), Экономика предприятия, Электротехника', 'Active', 'writer', '', '', '', 0, '0', 0, '', '', '', '', '', ''),
(370, 3584, '', '', ', 405, 411, 418, 419, 426, 427, 433, 441, 464', '', '', 'Мария', 'Мария', 'Самофалова ', NULL, 'true', '1522367619', '', '', NULL, '', NULL, NULL, NULL, 'mashasamofalova@gmail.com', '66a16a21220faf60637d6fcb0ac7f3ed', '+380954034973', '', 'MLA', '5168-7551-0479-2367', NULL, 'Английский язык, Литература, Педагогика, Психология, Русский язык и литература, Украинский язык и литература, Филология, Философия', 'Active', 'writer', '', '', '', 0, '0', 0, '', '', '', '', '', ''),
(371, 3585, '', '', ', 372, 414, 418, 419, 420, 423, 426, 427, 433, 468', '', '', 'андрей', 'андрей', 'кривояз', NULL, 'true', '1522377737', 'кандидат химических наук, доцент, действующий преподаватель университета.', '', NULL, '', NULL, NULL, NULL, 'biolog1977@mail.ru', '48a2e36741b35923d04a7ac483f022d0', '380501333543', '', 'MLA', '7167-8730-6627', NULL, 'Анатомия, Астрономия, Биология, География, Гостиничное дело, Криминалистика, Криминология, Кулинария, Культура и искусство, Культурология, Медицина, Педагогика, Педиатрия, Сельское хозяйство, Спорт и туризм, Туризм, Химия, Химия и физика, Хирургия, Экология', 'Active', 'writer', '', '', '', 0, '0', 0, '', '', '', '', '', ''),
(372, 3586, '', '', '', '', '', 'Дарья', 'Даря', 'Мыцак', NULL, 'true', '1535648680', '', '', NULL, '', NULL, NULL, NULL, 'mytsak.dasha@gmail.com', 'ba584552cc380492d1d50a5a9e585c47', '0636871413', '', 'MLA', '4149-4978-3957-9309', NULL, 'Административное право, Банкротство, Внешнеэконом деятельность (ВЭД), Гражданское право\r\n, Жилищное право, Земельное право, Коммерческая деятельность, Конституционное право, Криминалистика, Криминология, Международные отношения, Международное право , Муниципальное право, Организация труда, Организация труда и производства, Охрана природы, Охрана труда, Право, Право Европейского союза, Предпринимательство, Предприятие, Сельское хозяйство, Семейное право, Судебная бухгалтерия, Теория государства и права, Трудовое право, Уголовное право, Уголовный процесс, Юридические дисциплины, Юриспруденция', 'Active', 'writer', '', '', '', 0, '0', 1, '', '', '', '', '', ''),
(373, 3587, '', '', ', 425, 434, 437, 443, 467, 482', '', '', 'Богдан', 'Богдан', 'Калиниченко', NULL, 'true', '1522388551', '', 'P10309231.JPG', NULL, '', NULL, NULL, NULL, 'alinifc2014@gmail.com', 'fa23cd3457f04d8558b2d17c31196b4b', '0663885395', '', 'MLA', '5168-7554-2301-1986', NULL, 'Аудит, бух и управленческий учет, Банк и инвестиционный менеджмент, Банковское дело, Бухучет, статистика, Деньги, кредит,банки, ДКБ (деньги, кредит, банки), Инвестиционный менеджмент, Инвестиция, Информатика, Макроэкономика, Математика, Микроэкономика, Мировая  экономика, Статистика, Стратегический менеджмент, Страхование, Технические, Финансы, Финансы и кредит, Цены и ценообразование, Экономика, Экономика предприятия, Экономическая теория, Экономические дисциплины, Экономический анализ', 'False', 'writer', '', '', '', 0, '0', 0, '', '', '', '', '', ''),
(374, 3588, '', '', ', 416, 417, 434, 437, 442, 443, 467, 482', '', '', 'Марина', 'Марина', 'Разумовская', NULL, 'true', '1535519071', '', '', NULL, '', NULL, NULL, NULL, 'marishka.ra@gmail.com', '671e1ebab5eefa3f0d16e11454dcc874', '098-395-91-98', '', 'MLA', '4149-4378-5201-8710', NULL, 'Антикризисное управление, Аудит, бух и управленческий учет, АХД, Банк и инвестиционный менеджмент, Банковское дело, Банкротство, Бухучет, статистика, Деньги, кредит,банки, ДКБ (деньги, кредит, банки), Макроэкономика, Маркетинг, Международные отношения, Менеджмент, Менеджмент организации, Организация труда и производства, Реклама, PR, Стратегический маркетинг, Стратегический менеджмент, Управление затратами, Управление персоналом (HR), Управление проектами, Управленческий учёт, Финансы, Финансы и кредит, Экономика, Экономика предприятия, Экономические дисциплины, Экономический анализ', 'Active', 'writer', '', '', '', 0, '0', 1, '', '', '', '', '', ''),
(375, 3589, '', '', ', 378, 407, 408, 409, 425, 434, 437, 443, 467, 482', '', '', 'Ann', 'ann', 'Obikhod', NULL, 'true', '1532877051', '', '', NULL, '', NULL, NULL, NULL, 'anna.obikhod82@gmail.com', '2f2477cb6d98e3fac8034eb55f191ce8', '063-376-75-43', '', 'MLA', '4149-6258-0881-7215', NULL, 'Анализ, Антикризисное управление, Архитектура, БЖД, Бизнес-планирование, Биология, Внешнеэконом деятельность (ВЭД), География, Геополитика\r\n, Гостиничное дело, Дизайн\r\n, Журналистика, Здравоохранение, Инвестиционный менеджмент, Инвестиция, История, Искусство, Конфликтология, Культура и искусство, Культурология, Литература, Логика, Логистика, Макроэкономика, Маркетинг, Международные отношения, Менеджмент, Микроэкономика, Мировая  экономика, Охрана природы, Охрана труда, Политология, Право Европейского союза, Разное, Реклама, PR, Сельское хозяйство, Социальная работа, Социология, Спорт и туризм, Стратегический маркетинг, Стратегический менеджмент, Туризм, Управление логистикой, Управление персоналом (HR), Управление проектами, Экология, Экономика, Экономическая теория, Экономические дисциплины, Экономический анализ, Экскурсоведение, Энергосбережение, Этика и эстетика', 'Active', 'writer', '', '', '', 0, '0', 1, '', '', '', '', '', ''),
(376, 3590, '', '', ', 367, 378, 418, 419, 421, 422, 424, 426, 427, 428, 433, 436, 438, 440, 441, 465, 490, 495, 499', '', '', 'Анна', 'Анна', 'Болотова', NULL, 'true', '1526474686', '', '', NULL, '', NULL, NULL, NULL, 'anna92.92@ukr.net', 'c609eed9f6492756096b3319ff1525fa', '+380951971969', '', 'MLA', '5168-7551-0213-1659', NULL, 'Административное право, БЖД, Биология, География, Гостиничное дело, Гражданское право\r\n, Делопроизводство, Дошкольная педагогика, Жилищное право, Земельное право, История, Искусство, Конфликтология, Конституционное право, Криминалистика, Криминология, Кулинария, Культура и искусство, Культурология, Литература, Логика, Логопедия, Муниципальное право, Организация труда, Организация труда и производства, Охрана природы, Охрана труда, Педагогика, Политология, Право, Производство, Промышленность, Психология, Сельское хозяйство, Семейное право, Социальная работа, Социология, Спорт и туризм, Стандартизация , Теория государства и права, Товароведение, Торговля, Трудовое право, Туризм, Уголовное право, Уголовный процесс, Управление персоналом (HR), Физкультура и спорт, Филология, Философия, Химия, Экология, Экскурсоведение, Этика и эстетика, Юридические дисциплины, Юриспруденция', 'Active', 'writer', '', '', '', 0, '0', 1, '', '', '', '', '', ''),
(377, 3591, '', '', ', 367, 378, 421, 422, 424, 428, 436, 438, 440, 465, 490, 495, 499', '', '', 'Константин ', 'Константин', 'Моренко ', NULL, 'true', '1522778552', 'Занимаюсь написанием студенческих работ уже более 5 лет преимущественно в сфере права. За это время мною были написаны ', '', NULL, '', NULL, NULL, NULL, 'sho123@ukr.net', '58bf522e45273aef870b46f7cc39540c', '0962402311', '', 'MLA', '4149-4978-3343-1853', NULL, 'Административное право, Гражданское право\r\n, Земельное право, История, Конституционное право, Культурология, Право, Право Европейского союза, Семейное право, Теория государства и права, Трудовое право, Уголовное право, Юридические дисциплины, Юриспруденция', 'Active', 'writer', '', '', '', 0, '0', 1, '', '', '', '', '', ''),
(378, 3592, '', '', ', 418, 419, 426, 427, 433', '', '', 'Виктория', 'Виктория', 'Полищук', NULL, 'true', '1534502495', 'Имею опыт работы 5 лет', '', NULL, '', NULL, NULL, NULL, 'konkorkor@ukr.net', '7678c445145a653725c39466aa79e8c5', '+380963701836', '', 'MLA', '5168-7573-4116-9409', NULL, 'Дошкольная педагогика, Журналистика, История, Литература, Русский язык и литература, Социальная работа, Украинский язык и литература, Филология', 'Active', 'writer', '', '', '', 0, '0', 1, '', '', '', '', '', ''),
(379, 3593, '', '', ', 418, 419, 426, 427, 433', '', '', 'Людмила', 'Людмила', 'Калмыкова', NULL, 'true', '1534401021', '', '', NULL, '', NULL, NULL, NULL, 'ludochka7-07@ukr.net', '9761df43ee99f95eb22ed571a1b323d2', '0968704048', '', 'MLA', '4149-4978-3388-6783', NULL, 'Дошкольная педагогика, Конфликтология, Логопедия, Педагогика, Психология, Социология', 'Active', 'writer', '', '', '', 0, '0', 1, '', '', '', '', '', ''),
(380, 3594, '', '', ', 418, 419, 426, 427, 433, 441', '', '', 'Владимир', 'Владимир', 'Антонюк', NULL, 'true', '1535262843', 'Учитель математики и физики высшей категории, учитель-методист, Отличник просвещения Украины.\r\nНа пенсии.\r\nОпыт написания работ.', '', NULL, '', NULL, NULL, NULL, 'awm.4146@gmail.com', '4393472ab6f0350c03566cc573d5c30a', '0969235817', '', 'MLA', '5168-7554-1574-7746', NULL, 'История, Культурология, Математика, Педагогика, Психология, Физика, Физкультура и спорт, Философия, Экономические дисциплины, Этика и эстетика', 'Active', 'writer', '', '', '', 0, '0', 1, '', '', '', '', '', ''),
(381, 3595, '', '', '', '', '', 'Надежда', 'Надежда', 'Сушкова', NULL, 'true', '1525687279', '1.Донецкий государственный университет,\r\n  математический, математика,1986г.\r\n2. Высшая математика, теория вероятностей.\r\n3.Контрольные работы, курсовые работы.\r\n4.Написание работ в течении 20 лет, но не профессионально – в компаниях.\r\n5.Дополнительный вид деятельности.', '', NULL, '', NULL, NULL, NULL, 'matmatik1@ukr.net', 'f45dab404dd77f268181ce3150067d21', '+380501559869', '', 'MLA', '5168-7572-7609-2873', NULL, 'Математика', 'Active', 'writer', '', '', '', 0, '0', 1, '', '', '', '', '', ''),
(382, 3596, '', '', '', '', '', 'Nikolay', '', 'Dolgosheev', NULL, 'true', '1524608143', '', '', NULL, '', NULL, NULL, NULL, 'mobile-gsm198519851985@mail.ru', 'e4f22d820f311450860a37813cd102a4', '0960054575', '', NULL, '2131-2312-3123-1231', NULL, '', 'Active', 'client', '', '', '', 0, '0', 0, '', '', '', '', '', ''),
(383, 3597, '', '', ', 363, 364, 365, 366, 367, 368, 369, 370, 371, 373, 374, 375, 376, 377, 378, 379, 380, 381, 382, 383, 384, 385, 386, 387, 388, 389, 390, 391, 392, 393, 395, 396, 397, 398, 399, 400, 401, 402, 404, 406, 410, 412, 413, 415, 421, 422, 424, 428, 429, 430, 431, 432, 434, 435, 436, 437, 438, 439, 440, 443, 444, 445, 446, 447, 448, 449, 450, 451, 452, 453, 454, 455, 456, 457, 458, 459, 460, 461, 462, 463, 465, 466, 469, 470, 471, 472, 473, 474, 475, 476, 477, 478, 479, 480, 481, 482, 483, 484, 485, 486, 487, 488, 489, 490, 491, 492, 493, 494, 495, 496, 497, 498, 499', '', '', 'Тест ', 'Тест', 'Тест 2 ', NULL, 'true', '1531158173', '', '', NULL, '', NULL, NULL, NULL, 'sfadfrdfddf@ukr.net', 'e10adc3949ba59abbe56e057f20f883e', '54545454', '', 'MLA', '555', NULL, 'АПП (Автоматизация производственных процессов), Административное право, Анализ, Аудит бух и управленческий учет, Этика и эстетика, Юридические дисциплины, Юриспруденция', 'Active', 'writer', '', '', '', 0, '0', 0, '', '', '', '', '', ''),
(384, 3598, '', '', ', 418, 419, 426, 427, 433', '', '', 'Анна', 'Анна', 'Козіна', NULL, 'true', '1535405118', 'Викладач психології та педагогіки', '', NULL, '', NULL, NULL, NULL, 'catwomen@ukr.net', '6e06aa08dfffd2326363a47676b6e682', '0631933680', '', 'MLA', '5168-7555-1611-4754', NULL, 'Педагогика, Психология, Социальная работа, Управление персоналом (HR)', 'Active', 'writer', '', '', '', 0, '0', 1, '', '', '', '', '', ''),
(387, 3601, '', '', ', 426, 427, 441', '', '', 'Наталия', 'Наталия', 'kadlubovska_n_s@ukr.net', NULL, 'true', '1535484044', '', '', NULL, '', NULL, NULL, NULL, 'kadlubovska_n_s@ukr.net', 'd3449c46fc20dd6031af8fec9b16a224', '0976690528', '', 'MLA', '5168-7572-9744-1158', NULL, 'Анатомия, БЖД, Биология, География, Дошкольная педагогика, Здравоохранение, История, Искусство, Культура и искусство, Медицина, Охрана природы, Охрана труда, Педагогика, Политология, Право, Психология, Разное, Сельское хозяйство, Социальная работа, Социология, Спорт и туризм, Туризм, Физкультура и спорт, Философия, Химия, Экология', 'Active', 'writer', '', '', '', 0, '0', 1, '', '', '', '', '', ''),
(388, 3602, '', '', '', '', '', 'Елизавета', '', 'Колпаковская', NULL, 'true', '1525082268', '', '', NULL, '', NULL, NULL, NULL, 'candiru050398@gmail.com', '08d9ce55e908431f407e98e63f99029d', '0950061007', '', NULL, '', NULL, '', 'Active', 'client', '', '', '', 0, '0', 1, '', '', '', '', '', ''),
(389, 3603, '', '', ', 426, 427, 433, 441, 495', '', '', 'Анна', 'Анна', 'Ощепкова', NULL, 'true', '1533840912', '', '', NULL, '', NULL, NULL, NULL, 'pupsik_anya@ukr.net', 'b46c1de1c914eca2dd439388b8422638', '0968021328', '', 'MLA', '5168-7573-1922-5191', NULL, 'Административное право, Дошкольная педагогика, Земельное право, История, Конфликтология, Логопедия, Педагогика, Политология, Право, Психология, Семейное право, Социология, Трудовое право, Физкультура и спорт, Философия, Финансы', 'Active', 'writer', '', '', '', 0, '0', 1, '', '', '', '', '', ''),
(390, 3604, '', '', '', '', '', 'Станислав', '', 'Гоза', NULL, '', '1525088723', '', '', NULL, '', NULL, NULL, NULL, 'goza.stanislav@gmail.com', 'f9e21b605141e4c558785ec1ceaaeead', '0509786957', '', NULL, '', NULL, '', 'Active', 'client', '', '', '', 0, '0', 1, '', '', '', '', '', ''),
(391, 3605, '3559', '', '', '', '', 'Nikolay', '', 'Dolgosheev', NULL, 'true', '1525035330', '', '', NULL, '', NULL, NULL, NULL, '1234561234567890@ukr.net', 'e4f22d820f311450860a37813cd102a4', '38097', '', NULL, '', NULL, '', 'Active', 'client', '', '', '', 0, '0', 1, '', '', '', '', '', ''),
(392, 3606, '', '', '', '', '', 'Вадим', '', 'Крисько', NULL, '', '1526750257', '', '', NULL, '', NULL, NULL, NULL, 'marvel22@ukr.net', '62196974748e3994fd15034c6bf47532', '0930549805', '', NULL, '', NULL, '', 'Active', 'client', '', '', '', 0, '0', 1, '', '', '', '', '', ''),
(393, 3607, '', '', '', '', '', 'Инна', '', 'Малинкина', NULL, '', '1525690468', '', '', NULL, '', NULL, NULL, NULL, 'malinkinainna@yandex.ru', '46f94c8de14fb36680850768ff1b7f2a', '0939847309', '', NULL, '', NULL, '', 'Active', 'client', '', '', '', 0, '0', 1, '', '', '', '', '', ''),
(394, 3608, '', '', '', '', '', 'Elina', '', 'Dzhelilova', NULL, '', '1525628494', '', '', NULL, '', NULL, NULL, NULL, 'elina.lilova@gmail.com', '6f311239d8052eadba0522b6c1b7d432', '+380632033907', '', NULL, '', NULL, '', 'Active', 'client', '', '', '', 0, '0', 0, '', '', '', '', '', ''),
(395, 3609, '3566', '22.08.2018 22:32:41', '', '', '', 'Ольга ', '', 'Павлова ', NULL, '', '1525684661', '', '', NULL, '', NULL, NULL, NULL, 'qaqaqaq549@ukr.net', 'e10adc3949ba59abbe56e057f20f883e', '0679672177', '', NULL, '', NULL, '', 'Active', 'client', '', '', '', 0, '0', 0, '', '', '', '', '', ''),
(400, 3611, '', '', '', '', '', 'Вероника', '', 'Пет', NULL, 'true', '1525727978', '', '', NULL, '', NULL, NULL, NULL, 'ggghgggg@ukr.net', 'e10adc3949ba59abbe56e057f20f883e', '0679672177', '', NULL, '', NULL, '', 'Active', 'client', '', '', '', 0, '0', 0, '', '', '', '', '', ''),
(402, 3613, '', '', '', '', '', 'Алина', '', 'Божок', NULL, 'true', '1525777073', '', '', NULL, '', NULL, NULL, NULL, 'sdfsfsdfds307@ukr.net', 'e10adc3949ba59abbe56e057f20f883e', '0679672177', '', NULL, '', NULL, '', 'Active', 'client', '', '', '', 0, '0', 0, '', '', '', '', '', ''),
(403, 3614, '', '', '', '', '', 'Инна', '', 'Бойко', NULL, 'true', '1525775935', '', '', NULL, '', NULL, NULL, NULL, 'innaboiko6@ukr.net', '1a8dbba4bad26ba73450ce22a7f40330', 'Павловна', '', NULL, '', NULL, '', 'Active', 'client', '', '', '', 0, '0', 0, '', '', '', '', '', ''),
(410, 3615, '', '', '', '', '', 'Nikolay', '', 'Dolgosheev', NULL, 'true', '1526507588', '', '', NULL, '', NULL, NULL, NULL, 'nikolas1985_09@ukr.net', 'e4f22d820f311450860a37813cd102a4', '38097387264686', '', NULL, '', NULL, '', 'False', 'client', '', '', '', 0, '0', 1, '', '', '', '', '', ''),
(411, 3616, '3616', '', '', '', '', 'Nikolay', '', 'Dolgosheev', NULL, 'true', '1526578545', '', '', NULL, '', NULL, NULL, NULL, 'nikolas1985_10@ukr.net', 'e4f22d820f311450860a37813cd102a4', '048999999989', '', NULL, '5168-7427-0971-9672', NULL, '', 'Active', 'writer', 'writer', '', '', 0, '0', 1, '', '', '', '', '', ''),
(412, 3617, '', '', ', 418, 419, 426, 427, 433', '', '', 'Ольга', 'Ольга', 'Магдич', NULL, 'true', '1525967005', 'Практичесский психолог, преподаватель Вуза,39 лет,своими характеристикам считаю педантичность, ответственность,комуникабельность, уравновешенность,умение решать конфликтные вопросы,люблю новые знания, готова к плодотворному сотрудничеству. ', '', NULL, '', NULL, NULL, NULL, 'evdokiya_1979@ukr.net', 'ddfb0cce75ff26d6dc4d14e128d8d9e6', '0639926437', '', 'MLA', '5168-7427-0971-9672', NULL, 'Дошкольная педагогика, Педагогика, Психология, Социальная работа', 'Active', 'writer', '', '', '', 0, '0', 0, '', '', '', '', '', ''),
(413, 3618, '', '', '', '', '', 'Дмитрий', '', 'Каленюк', NULL, 'true', '1526047501', '', '', NULL, '', NULL, NULL, NULL, 'calenyuck2010@ukr.net', '40ce0d02e0c03ea5d2044a0e65f14573', '380509563855', '', NULL, '', NULL, '', 'Active', 'client', '', '', '', 0, '0', 1, '', '', '', '', '', ''),
(414, 3619, '', '', ', 363, 364, 365, 366, 367, 368, 369, 370, 371, 373, 374, 375, 376, 377, 378, 379, 380, 381, 382, 383, 384, 385, 386, 387, 388, 389, 390, 391, 392, 393, 395, 396, 397, 398, 399, 400, 401, 402, 404, 406, 410, 412, 413, 414, 415, 420, 423, 429, 430, 431, 432, 434, 435, 437, 439, 443, 444, 445, 446, 447, 448, 449, 450, 451, 452, 453, 454, 455, 456, 457, 458, 459, 460, 461, 462, 463, 466, 468, 469, 470, 471, 472, 473, 474, 475, 476, 477, 478, 479, 480, 481, 482, 483, 484, 485, 486, 487, 488, 489, 491, 492, 493, 494, 495, 496, 497, 498', '', '', 'Галина ', 'Галина', 'Иванова', NULL, 'true', '1526033008', '', '', NULL, '', NULL, NULL, NULL, 'super.ghfhfghfg@ukr.net', 'e10adc3949ba59abbe56e057f20f883e', '444444444', '', 'MLA', '4444-444', NULL, 'АПП (Автоматизация производственных процессов), Административное право, Анализ, Анатомия', 'Active', 'writer', 'writer', '', '', 0, '0', 1, '', '', '', '', '', ''),
(415, 3620, '', '06.08.2018 13:09:37', '', '', '', 'Анна ', '', 'Прокопьева', NULL, 'false', '1526149329', '', '', NULL, '', NULL, NULL, NULL, 'mega-fgfgfgfg@ukr.net', 'e10adc3949ba59abbe56e057f20f883e', '555', '', NULL, '', NULL, '', 'Active', 'client', '', '', '', 0, '0', 0, '', '', '', '', '', ''),
(416, 3621, '', '', ', 363, 364, 365, 366, 368, 369, 370, 371, 373, 374, 375, 376, 377, 379, 380, 381, 382, 383, 384, 385, 386, 387, 388, 389, 390, 391, 392, 393, 395, 396, 397, 398, 399, 400, 401, 402, 404, 406, 410, 412, 413, 415, 429, 430, 431, 432, 435, 439, 444, 445, 446, 447, 448, 449, 450, 451, 452, 453, 454, 455, 456, 457, 458, 459, 460, 461, 462, 463, 466, 469, 470, 471, 472, 473, 474, 475, 476, 477, 478, 479, 480, 481, 483, 484, 485, 486, 487, 488, 489, 491, 492, 493, 494, 496, 497, 498', '', '', 'Иванна ', 'Иванна', 'Петорова', NULL, 'false', '1526462676', '', '', NULL, '', NULL, NULL, NULL, 'mega_dffddff@ukr.net', 'e10adc3949ba59abbe56e057f20f883e', '1', '', 'MLA', '12131-2312-3123-1231', NULL, 'АПП (Автоматизация производственных процессов)', 'Active', 'writer', '', '', '', 0, '0', 0, '', '', '', '', '', ''),
(417, 3622, '', '', '', '', '', 'Саша', '', 'Глущенко', NULL, 'false', '1526626626', '', '', NULL, '', NULL, NULL, NULL, 'rumyancevaa006@gmail.com', 'ec827fc3fb84d551a1f47b4b01158682', '80636580881', '', NULL, '', NULL, '', 'Active', 'client', '', '', '', 0, '0', 1, '', '', '', '', '', ''),
(434, 3625, '', '', '', '', '', 'Арина', '', 'Кульбаба ', NULL, 'false', '1527636994', '', '', NULL, '', NULL, NULL, NULL, 'pppppppp808@ukr.net', 'e10adc3949ba59abbe56e057f20f883e', '555', '', NULL, '', NULL, '', 'Active', 'client', '', '', '', 0, '0', 1, '', '', '', '', '', ''),
(435, 3626, '', '', '', '', '', 'Radislav', '', 'Brusenskiy', NULL, 'false', '1526897294', '', '', NULL, '', NULL, NULL, NULL, 'radik.brusenskiy@icloud.com', 'c80f6ba0919597e0bf6780b478082785', '0687321557', '', NULL, '', NULL, '', 'Active', 'client', '', '', '', 0, '0', 0, '', '', '', '', '', ''),
(448, 3627, '', '', '', '', '', 'Евдокия', '', 'Евдокия', NULL, 'false', '1527098299', '', '', NULL, '', NULL, NULL, NULL, 'ssdddddd@bigmir.net', 'e10adc3949ba59abbe56e057f20f883e', '222', '', NULL, '', NULL, '', 'Active', 'client', '', '', '', 0, '0', 0, '', '', '', '', '', ''),
(449, 3628, '3566', '23.08.2018 16:40:05', '', '', '', 'Рома', '', 'Иванов', NULL, 'false', '1535650609', '', '', NULL, '', NULL, NULL, NULL, 'eeerrrrivanov@yandex.ru', 'e10adc3949ba59abbe56e057f20f883e', '111', '', NULL, '', NULL, '', 'Active', 'client', '', '', '', 0, '0', 1, '', '', '', '', '', ''),
(450, 3629, '', '', '', '', '', 'Владислав', '', 'Рудиченко', NULL, 'false', '1527243651', '', '', NULL, '', NULL, NULL, NULL, 'engl.life@yandex.ru', '9c2a9d1c6f581c1c98f0ccbcbb71ef7b', '9517155004', '', NULL, '', NULL, '', 'Active', 'client', '', '', '', 0, '0', 0, '', '', '', '', '', ''),
(451, 3630, '', '', '', '', '', 'Артем', '', 'Боров', NULL, 'false', '1527584282', '', '', NULL, '', NULL, NULL, NULL, 'nazzarkoartem@gmail.com', 'dd9b9c7b80fb69f6d301b56ee8b0e5e5', '0932331248', '', NULL, '', NULL, '', 'Active', 'client', '', '', '', 0, '0', 1, '', '', '', '', '', '');
INSERT INTO `writers` (`id`, `writer_id`, `sup_manager`, `last_tech_message`, `prof_ord_notices`, `oth_bids_notice`, `wr_files_notice`, `firstname`, `slug`, `lastname`, `gender`, `viewed`, `online`, `text`, `profile_img`, `country`, `streetaddress`, `zip`, `city`, `state`, `email`, `password`, `primaryphone`, `availability`, `citation`, `nativelanguage`, `academiclevel`, `subject`, `writer_status`, `user_level`, `writer_level`, `manager_fine`, `admin_level`, `mystatus`, `subscription`, `loggedin`, `mngr_neworder`, `mngr_new_order_files`, `mngr_new_order_bid`, `mngr_newuser`, `mngr_wait_accept`, `mngr_new_order_mes`) VALUES
(452, 3631, '', '', ', 363, 364, 365, 366, 367, 368, 369, 370, 371, 372, 373, 374, 375, 376, 377, 378, 379, 380, 381, 382, 383, 384, 385, 386, 387, 388, 389, 390, 391, 392, 393, 394, 395, 396, 397, 398, 399, 400, 401, 402, 403, 404, 405, 406, 407, 408, 409, 410, 411, 412, 413, 414, 415, 416, 417, 418, 419, 420, 421, 422, 423, 424, 425, 426, 427, 428, 429, 430, 431, 432, 433, 434, 435, 436, 437, 438, 439, 440, 441, 442, 443, 444, 445, 446, 447, 448, 449, 450, 451, 452, 453, 454, 455, 456, 457, 458, 459, 460, 461, 462, 463, 464, 465, 466, 467, 468, 469, 470, 471, 472, 473, 474, 475, 476, 477, 478, 479, 480, 481, 482, 483, 484, 485, 486, 487, 488, 489, 490, 491, 492, 493, 494, 495, 496, 497, 498, 499', '', '', 'Николай', 'Николай', 'Инкогнито', NULL, 'false', '1529488027', '', '', NULL, '', NULL, NULL, NULL, '1234512345123@ukr.net', '827ccb0eea8a706c4c34a16891f84e7b', '0973872646', '', 'MLA', '4444-3333-2222-1111', NULL, 'АПП (Автоматизация производственных процессов), Административное право, Анализ, Анатомия, Английский язык, Антикризисное управление, Архитектура, Астрономия, Аудит бух и управленческий учет, АХД, Банк и инвестиционный менеджмент, Банковское дело, Банкротство, БЖД, Бизнес-планирование, Биология, Бухучет и статистика, ВСТИ, Внешнеэконом деятельность (ВЭД), География, Геодезия, Геополитика\r\n, Гидравлика, Гостиничное дело, Гражданское право\r\n, Графика, Делопроизводство, Деньги кредит банки, Детали машин, Дизайн\r\n, ДКБ (деньги кредит банки), Дошкольная педагогика, Жилищное право, Журналистика, Земельное право, Здравоохранение, Инвестиционный менеджмент, Инвестиция, Инженерная графика, Иностранные языки, Информатика, Информатика и программирование, История, Искусство, Коммерческая деятельность, Компьютерные сети и телекоммуникации, Конфликтология, Конституционное право, Криминалистика, Криминология, Кулинария, Культура и искусство, Культурология, Лингвистика, Литература, Логика, Логистика, Логопедия, Макроэкономика, Маркетинг, Математика, Материаловедение, Машиностроение, Медицина, Международные отношения, Международное право , Менеджмент, Менеджмент  качества, Менеджмент организации, Механика, Микроэкономика, Мировая  экономика, Муниципальное право, Налоги, Немецкий язык, Организация труда, Организация труда и производства, Основы конструирования, Основы предпринимательства, Охрана природы, Охрана труда, Педагогика, Педиатрия, Политология, Право, Право Европейского союза, Предпринимательство, Предприятие, Программирование, Производство, Промышленность, Процессы и апп пищевой пром, Психология, Радиосвязь и радиотехника, Разное, Реклама и PR, Русский язык и литература, Сельское хозяйство, Семейное право, Сист передачи и сист коммутации, Сопромат, Социальная работа, Социология, Спорт и туризм, Статистика, Стратегический маркетинг, Стратегический менеджмент, Стандартизация , Страхование, Строительство, Судебная бухгалтерия, Телекоммуникация, Теоретическая механика, Теория государства и права, Теория машин и механизмов (тмм), Теплотехника, Теплоэнергетика, Технические, Технология машиностроения, Товароведение, Торговля, Транспорт, Трудовое право, Туризм, Уголовное право, Уголовный процесс, Украинский язык и литература, Управление затратами, Управление логистикой, Управление персоналом (HR), Управление проектами, Управленческие исследования, Управленческий учёт, Физика, Физкультура и спорт, Филология, Философия, Финансы, Финансы и кредит, Французский язык, Химия, Химия и физика, Хирургия, Цены и ценообразование, Черчение, Экология, Экономика, Экономика предприятия, Экономическая теория, Экономические дисциплины, Экономический анализ, Экскурсоведение, Электроника и радиотехника, Электротехника, Электроэнергетика, Энергетика, Энергосбережение, Этика и эстетика, Юридические дисциплины, Юриспруденция', 'Active', 'writer', 'writer', '', '', 0, '0', 1, '', '', '', '', '', ''),
(453, 3632, '', '', '', '', '', 'Николай2', 'Николай2', 'Инкогнито2', NULL, 'false', '1529443298', '', 'Screenshot_1.jpg', NULL, '', NULL, NULL, NULL, 'qwertyuiop123451234@ukr.net', '827ccb0eea8a706c4c34a16891f84e7b', '0973872646', '', 'MLA', '1111-2222-3333-4444', NULL, 'АПП (Автоматизация производственных процессов), Административное право, Анализ, Анатомия, Английский язык, Антикризисное управление, Архитектура, Астрономия, Аудит бух и управленческий учет', 'Active', 'client', 'writer', '', '', 0, '0', 0, '', '', '', '', '', ''),
(454, 3633, '', '06.08.2018 13:12:30', '', '', '', 'Христина ', '', 'Петринка ', NULL, 'false', '1527317446', '', '', NULL, '', NULL, NULL, NULL, 'hrustuna10q10q10q@gmail.com', 'c9e9e06ebe60c01ba0c59527ce1aed65', '0934735384', '', NULL, '', NULL, '', 'Active', 'client', '', '', '', 0, '0', 0, '', '', '', '', '', ''),
(455, 3634, '', '', '', '', '', 'Кристина', '', 'Мишустина ', NULL, 'false', '1527796949', '', '', NULL, '', NULL, NULL, NULL, 'kriconm@gmail.com', '15ab465b07f1e770d2ca747ca567384a', '380505560069', '', NULL, '', NULL, '', 'Active', 'client', '', '', '', 0, '0', 1, '', '', '', '', '', ''),
(456, 3635, '', '', '', '', '', 'Елизавета', '', 'Старова', NULL, 'false', '1527569409', '', '', NULL, '', NULL, NULL, NULL, 'lizastarova@gmail.com', '8d0ac58fee3f58fdb24d39bf569cd727', '380988007022', '', NULL, '', NULL, '', 'Active', 'client', '', '', '', 0, '0', 1, '', '', '', '', '', ''),
(458, 3637, '', '', ', 405, 411, 464', '', '', 'Алиса', 'Алиса', 'Одуванчик', NULL, 'false', '1528752828', '', '', NULL, '', NULL, NULL, NULL, 'dffffsfdfs@ukr.net', 'e10adc3949ba59abbe56e057f20f883e', '1111', '', 'MLA', '1111-2222-3333-4444', NULL, 'Английский язык', 'Active', 'writer', '', '', '', 0, '0', 0, '', '', '', '', '', ''),
(461, 3639, '', '', '', '', '', 'Карина', '', 'Прокопьева', NULL, 'false', '1529397743', '', '', NULL, '', NULL, NULL, NULL, 'fjfjfjfjfjfjjf@ukr.net', 'e10adc3949ba59abbe56e057f20f883e', '555', '', NULL, '', NULL, '', 'Active', 'client', '', '', '', 0, '0', 0, '', '', '', '', '', ''),
(464, 3641, '3643', '', '', '', '', 'заказчик', '', 'заказчик', NULL, 'false', '1530047390', '', '', NULL, '', NULL, NULL, NULL, 'veronikanikolay1@ukr.net', '827ccb0eea8a706c4c34a16891f84e7b', '380973872646', '', NULL, '', NULL, '', 'Active', 'client', '', '', '', 0, '0', 1, '', '', '', '', '', ''),
(465, 3642, '', '', ', 363, 364, 365, 366, 367, 368, 369, 370, 371, 372, 373, 374, 375, 376, 377, 378, 379, 380, 381, 382, 383, 384, 385, 386, 387, 388, 389, 390, 391, 392, 393, 394, 395, 396, 397, 398, 399, 400, 401, 402, 403, 404, 405, 406, 407, 408, 409, 410, 411, 412, 413, 414, 415, 416, 417, 418, 419, 420, 421, 422, 423, 424, 425, 426, 427, 428, 429, 430, 431, 432, 433, 434, 435, 436, 437, 438, 439, 440, 441, 442, 443, 444, 445, 446, 447, 448, 449, 450, 451, 452, 453, 454, 455, 456, 457, 458, 459, 460, 461, 462, 463, 464, 465, 466, 467, 468, 469, 470, 471, 472, 473, 474, 475, 476, 477, 478, 479, 480, 481, 482, 483, 484, 485, 486, 487, 488, 489, 490, 491, 492, 493, 494, 495, 496, 497, 498, 499', '', '', 'автор', 'автор', 'автор', NULL, 'false', '1530079278', '', '', NULL, '', NULL, NULL, NULL, 'veronikanikolay2@ukr.net', '827ccb0eea8a706c4c34a16891f84e7b', '380973872646', '', 'MLA', '1111-4444-3333-2222', NULL, 'АПП (Автоматизация производственных процессов), Административное право, Анализ, Анатомия, Английский язык, Антикризисное управление, Архитектура, Астрономия, Аудит бух и управленческий учет, АХД, Банк и инвестиционный менеджмент, Банковское дело, Банкротство, БЖД, Бизнес-планирование, Биология, Бухучет и статистика, ВСТИ, Внешнеэконом деятельность (ВЭД), География, Геодезия, Геополитика\r\n, Гидравлика, Гостиничное дело, Гражданское право\r\n, Графика, Делопроизводство, Деньги кредит банки, Детали машин, Дизайн\r\n, ДКБ (деньги кредит банки), Дошкольная педагогика, Жилищное право, Журналистика, Земельное право, Здравоохранение, Инвестиционный менеджмент, Инвестиция, Инженерная графика, Иностранные языки, Информатика, Информатика и программирование, История, Искусство, Коммерческая деятельность, Компьютерные сети и телекоммуникации, Конфликтология, Конституционное право, Криминалистика, Криминология, Кулинария, Культура и искусство, Культурология, Лингвистика, Литература, Логика, Логистика, Логопедия, Макроэкономика, Маркетинг, Математика, Материаловедение, Машиностроение, Медицина, Международные отношения, Международное право , Менеджмент, Менеджмент  качества, Менеджмент организации, Механика, Микроэкономика, Мировая  экономика, Муниципальное право, Налоги, Немецкий язык, Организация труда, Организация труда и производства, Основы конструирования, Основы предпринимательства, Охрана природы, Охрана труда, Педагогика, Педиатрия, Политология, Право, Право Европейского союза, Предпринимательство, Предприятие, Программирование, Производство, Промышленность, Процессы и апп пищевой пром, Психология, Радиосвязь и радиотехника, Разное, Реклама и PR, Русский язык и литература, Сельское хозяйство, Семейное право, Сист передачи и сист коммутации, Сопромат, Социальная работа, Социология, Спорт и туризм, Статистика, Стратегический маркетинг, Стратегический менеджмент, Стандартизация , Страхование, Строительство, Судебная бухгалтерия, Телекоммуникация, Теоретическая механика, Теория государства и права, Теория машин и механизмов (тмм), Теплотехника, Теплоэнергетика, Технические, Технология машиностроения, Товароведение, Торговля, Транспорт, Трудовое право, Туризм, Уголовное право, Уголовный процесс, Украинский язык и литература, Управление затратами, Управление логистикой, Управление персоналом (HR), Управление проектами, Управленческие исследования, Управленческий учёт, Физика, Физкультура и спорт, Филология, Философия, Финансы, Финансы и кредит, Французский язык, Химия, Химия и физика, Хирургия, Цены и ценообразование, Черчение, Экология, Экономика, Экономика предприятия, Экономическая теория, Экономические дисциплины, Экономический анализ, Экскурсоведение, Электроника и радиотехника, Электротехника, Электроэнергетика, Энергетика, Энергосбережение, Этика и эстетика, Юридические дисциплины, Юриспруденция', 'Active', 'writer', '', '', '', 0, '0', 1, '', '', '', '', '', ''),
(466, 3643, '', '', '', '', '', 'Менеджер', '', 'Менеджер', NULL, 'false', '1529992249', '', '', NULL, '', NULL, NULL, NULL, 'veronikanikolay3@ukr.net', '827ccb0eea8a706c4c34a16891f84e7b', '380973872646', '', NULL, '', NULL, '', 'Active', 'writer', 'admin', '', '', 0, '0', 1, ', 495, 496, 497, 498, 499', ', 496, 498, 498, 492, 492, 499, 499', ', 495, 495, 495, 492, 492, 492, 492, 495, 495, 495, 495, 491, 489, 495, 489, 495, 495, 489, 489, 495, 495, 495, 495, 498, 498, 498, 498, 498, 498, 498, 498, 498, 498, 498, 498, 498, 498, 498, 498, 498, 498, 498, 437, 486, 499, 499, 499, 499, 499, 499, 465, 441, 495, 465, 465', ', 3798, 3799, 3800, 3801, 3802, 3802, 3802', '', ''),
(467, 3644, '', '', '', '', '', 'Алина', '', 'Алина', NULL, 'false', '1529670544', '', '', NULL, '', NULL, NULL, NULL, 'super-sdfsdfsdfd@ukr.net', 'e10adc3949ba59abbe56e057f20f883e', '11', '', NULL, '', NULL, '', 'Active', 'writer', 'admin', '', '', 0, '0', 0, ', 495, 496, 497, 498, 499', ', 496, 498, 498, 492, 492, 499, 499', ', 495, 495, 495, 492, 492, 492, 492, 495, 495, 495, 495, 491, 489, 495, 489, 495, 495, 489, 489, 495, 495, 495, 495, 498, 498, 498, 498, 498, 498, 498, 498, 498, 498, 498, 498, 498, 498, 498, 498, 498, 498, 498, 437, 486, 499, 499, 499, 499, 499, 499, 465, 441, 495, 465, 465', ', 3798, 3799, 3800, 3801, 3802, 3802, 3802', '', ''),
(468, 3645, '', '', '', '', '', 'John', '', 'Doe', NULL, 'false', '1535576744', '', '', NULL, '', NULL, NULL, NULL, 'volderam@yandex.ua', '7acdffc1c85cd5bb3e1c815aeaf2dd54', '+12345678', '', NULL, '', NULL, '', 'Active', 'client', '', '', '', 0, '0', 1, '', '', '', '', '', ''),
(469, 3646, '', '', ', 434, 437, 443, 482, 494, 496, 497, 498', '', '', 'Jane', 'jane', 'Doe', NULL, 'false', '1535571698', '', '', NULL, '', NULL, NULL, NULL, 'volderam@yandex.com', '7acdffc1c85cd5bb3e1c815aeaf2dd54', '+123456789', '', 'MLA', '4444-4444-4444-4448', NULL, 'АПП (Автоматизация производственных процессов), Анализ, География, Статистика', 'Active', 'writer', '', '', '', 0, '0', 1, '', '', '', '', '', ''),
(472, 3648, '3548', '30.08.2018 16:43:01', '', '', ', 495', 'vlad', 'vlad', 'avtor', NULL, 'false', '1535702008', '123123', '', NULL, '', NULL, NULL, NULL, 'youvovas@gmail.com', '4297f44b13955235245b2497399d7a93', '123123', '', 'MLA', '3123123', NULL, 'АПП (Автоматизация производственных процессов), Административное право, Анализ, Анатомия, Английский язык, Антикризисное управление, Архитектура, Астрономия, Аудит бух и управленческий учет, АХД, Банк и инвестиционный менеджмент, Банковское дело', 'Active', 'writer', 'writer', '', '', 0, '0', 1, '', '', '', '', '', ''),
(474, 3650, '', '', '', '', '', 'НикЗаказчик', '', 'ыФВФЫВ', NULL, 'false', '1533075094', '', '', NULL, '', NULL, NULL, NULL, 'mega-kkkkkkkkk@ukr.net', '827ccb0eea8a706c4c34a16891f84e7b', '380973872646', '', NULL, '', NULL, '', 'Active', 'client', '', '', '', 0, '0', 0, '', '', '', '', '', ''),
(475, 3651, '', '', ', 363, 364, 365, 366, 367, 368, 369, 370, 371, 372, 373, 374, 375, 376, 377, 378, 379, 380, 381, 382, 383, 384, 385, 386, 387, 388, 389, 390, 391, 392, 393, 394, 395, 396, 397, 398, 399, 400, 401, 402, 403, 404, 405, 406, 407, 408, 409, 410, 411, 412, 413, 414, 415, 416, 417, 418, 419, 420, 421, 422, 423, 424, 425, 426, 427, 428, 429, 430, 431, 432, 433, 434, 435, 436, 437, 438, 439, 440, 441, 442, 443, 444, 445, 446, 447, 448, 449, 450, 451, 452, 453, 454, 455, 456, 457, 458, 459, 460, 461, 462, 463, 464, 465, 466, 467, 468, 469, 470, 471, 472, 473, 474, 475, 476, 477, 478, 479, 480, 481, 482, 483, 484, 485, 486, 487, 488, 489, 490, 491, 492, 493, 494, 495, 496, 497, 498, 499', '', '', 'НикАвтор', 'НикАвтор', 'фывфыв', NULL, 'false', '1530144442', '', '', NULL, '', NULL, NULL, NULL, 'mega_ddddddddd@ukr.net', '827ccb0eea8a706c4c34a16891f84e7b', '380973872646', '', 'MLA', '9999-9999-9999-9999', NULL, 'АПП (Автоматизация производственных процессов), Административное право, Анализ, Анатомия, Английский язык, Антикризисное управление, Архитектура, Астрономия, Аудит бух и управленческий учет, АХД, Банк и инвестиционный менеджмент, Банковское дело, Банкротство, БЖД, Бизнес-планирование, Биология, Бухучет и статистика, ВСТИ, Внешнеэконом деятельность (ВЭД), География, Геодезия, Геополитика\r\n, Гидравлика, Гостиничное дело, Гражданское право\r\n, Графика, Делопроизводство, Деньги кредит банки, Детали машин, Дизайн\r\n, ДКБ (деньги кредит банки), Дошкольная педагогика, Жилищное право, Журналистика, Земельное право, Здравоохранение, Инвестиционный менеджмент, Инвестиция, Инженерная графика, Иностранные языки, Информатика, Информатика и программирование, История, Искусство, Коммерческая деятельность, Компьютерные сети и телекоммуникации, Конфликтология, Конституционное право, Криминалистика, Криминология, Кулинария, Культура и искусство, Культурология, Лингвистика, Литература, Логика, Логистика, Логопедия, Макроэкономика, Маркетинг, Математика, Материаловедение, Машиностроение, Медицина, Международные отношения, Международное право , Менеджмент, Менеджмент  качества, Менеджмент организации, Механика, Микроэкономика, Мировая  экономика, Муниципальное право, Налоги, Немецкий язык, Организация труда, Организация труда и производства, Основы конструирования, Основы предпринимательства, Охрана природы, Охрана труда, Педагогика, Педиатрия, Политология, Право, Право Европейского союза, Предпринимательство, Предприятие, Программирование, Производство, Промышленность, Процессы и апп пищевой пром, Психология, Радиосвязь и радиотехника, Разное, Реклама и PR, Русский язык и литература, Сельское хозяйство, Семейное право, Сист передачи и сист коммутации, Сопромат, Социальная работа, Социология, Спорт и туризм, Статистика, Стратегический маркетинг, Стратегический менеджмент, Стандартизация , Страхование, Строительство, Судебная бухгалтерия, Телекоммуникация, Теоретическая механика, Теория государства и права, Теория машин и механизмов (тмм), Теплотехника, Теплоэнергетика, Технические, Технология машиностроения, Товароведение, Торговля, Транспорт, Трудовое право, Туризм, Уголовное право, Уголовный процесс, Украинский язык и литература, Управление затратами, Управление логистикой, Управление персоналом (HR), Управление проектами, Управленческие исследования, Управленческий учёт, Физика, Физкультура и спорт, Филология, Философия, Финансы, Финансы и кредит, Французский язык, Химия, Химия и физика, Хирургия, Цены и ценообразование, Черчение, Экология, Экономика, Экономика предприятия, Экономическая теория, Экономические дисциплины, Экономический анализ, Экскурсоведение, Электроника и радиотехника, Электротехника, Электроэнергетика, Энергетика, Энергосбережение, Этика и эстетика, Юридические дисциплины, Юриспруденция', 'Active', 'writer', '', '', '', 0, '0', 0, '', '', '', '', '', ''),
(476, 3652, '', '', ', 363, 364, 365, 366, 367, 368, 369, 370, 371, 373, 374, 375, 376, 377, 378, 379, 380, 381, 382, 383, 384, 385, 386, 387, 388, 389, 390, 391, 392, 393, 395, 396, 397, 398, 399, 400, 401, 402, 404, 406, 410, 412, 413', '', '', 'НикМенеджер', 'НикМенеджер', 'фывфы', NULL, 'false', '1530079817', '', '', NULL, '', NULL, NULL, NULL, 'mega-aaaaaaaaaa@ukr.net', '827ccb0eea8a706c4c34a16891f84e7b', '380973872646', '', 'MLA', '6666-7777-8888-9999', NULL, '', 'Active', 'writer', 'admin', '', '', 0, '0', 1, ', 495, 496, 497, 498, 499', ', 496, 498, 498, 492, 492, 499, 499', ', 495, 495, 495, 492, 492, 492, 492, 495, 495, 495, 495, 491, 489, 495, 489, 495, 495, 489, 489, 495, 495, 495, 495, 498, 498, 498, 498, 498, 498, 498, 498, 498, 498, 498, 498, 498, 498, 498, 498, 498, 498, 498, 437, 486, 499, 499, 499, 499, 499, 499, 465, 441, 495, 465, 465', ', 3798, 3799, 3800, 3801, 3802, 3802, 3802', '', ''),
(477, 3653, '', '', '', '', '', 'ффф', '', 'ффф', NULL, 'false', '1534967336', '', '', NULL, '', NULL, NULL, NULL, 'afdfdsa@ukr.net', 'e10adc3949ba59abbe56e057f20f883e', '111', '', NULL, '', NULL, '', 'Active', 'client', '', '', '', 0, '0', 0, '', '', '', '', '', ''),
(478, 3654, '', '', ', 367, 378, 495', '', ', 437', 'ааа', 'ааа', 'ааа', NULL, 'false', '1534967228', '', '', NULL, '', NULL, NULL, NULL, 'dfdfd776@ukr.net', 'e10adc3949ba59abbe56e057f20f883e', '222', '', 'MLA', '4444-4444-4444-4444', NULL, 'Административное право', 'Active', 'writer', '', '', '', 0, '0', 1, '', '', '', '', '', ''),
(479, 3655, '', '', '', '', '', 'ффф', '', 'ффф', NULL, 'false', '1530260212', '', '', NULL, '', NULL, NULL, NULL, 'fffff745@ukr.net', 'e10adc3949ba59abbe56e057f20f883e', '111', '', NULL, '', NULL, '', 'Active', 'client', '', '', '', 0, '0', 1, '', '', '', '', '', ''),
(480, 3656, '3566', '', ', 405, 411, 464', '', '', 'ввв', 'ввв', 'ввв', NULL, 'false', '1532507724', '', '', NULL, '', NULL, NULL, NULL, 'dddd369@ukr.net', 'e10adc3949ba59abbe56e057f20f883e', '111', '', 'MLA', '5555-5555-5555-5555', NULL, 'Английский язык, Архитектура', 'Active', 'writer', '', '', '', 0, '0', 1, '', '', '', '', '', ''),
(481, 3657, '', '', '', '', '', 'ввв', '', 'ввв', NULL, 'false', '1532435160', '', '', NULL, '', NULL, NULL, NULL, 'hh6575@ukr.net', 'e10adc3949ba59abbe56e057f20f883e', '111', '', NULL, '', NULL, '', 'Active', 'client', '', '', '', 0, '0', 1, '', '', '', '', '', ''),
(482, 3658, '3566', '27.08.2018 12:59:45', '', '', '', 'фф', '', 'фф', NULL, 'false', '1535362950', '', '', NULL, '', NULL, NULL, NULL, 'dfdf8521@ukr.net', 'e10adc3949ba59abbe56e057f20f883e', '111', '', NULL, '', NULL, '', 'Active', 'client', '', '', '', 0, '0', 1, '', '', '', '', '', ''),
(483, 3659, '3738', '16.08.2018 00:33:03', ', 495', '', '', 'ввв', 'ввв', 'ввв', NULL, 'false', '1533757797', '', '', NULL, '', NULL, NULL, NULL, 'sss949@ukr.net', 'e10adc3949ba59abbe56e057f20f883e', '111', '', 'MLA', '4444-4444-4444-4444', NULL, 'Административное право', 'Active', 'writer', '', '', '', 0, '0', 1, '', '', '', '', '', ''),
(486, 3662, '', '12.08.2018 08:37:56', ', 490, 499', '', '', 'Татьяна', 'Татьяна', 'Дейнека', NULL, 'false', '1535268683', '', '', NULL, '', NULL, NULL, NULL, 'tetyana-m1989@ukr.net', '23e8be0c2dabf9c39939f2b961204f6e', '0633175616', '', 'MLA', '5168-7556-1930-7768', NULL, 'Право, Юридические дисциплины, Юриспруденция', 'Active', 'writer', '', '', '', 0, '0', 1, '', '', '', '', '', ''),
(487, 3663, '', '', ', 367, 378, 434, 437, 443, 467, 482, 495', '', '', 'Вячеслав', 'Вячеслав', 'Балаценко', NULL, 'false', '1535469158', 'Пенсионер', '', NULL, '', NULL, NULL, NULL, 'slvb@ukr.net', '6b552b6a645e7d59324aacbe6da64ea7', '0672441188', '', 'MLA', '4731-2191-1026-7774', NULL, 'Административное право, Анализ, Гражданское право\r\n, Макроэкономика, Менеджмент, Муниципальное право, Организация труда, Социальная работа, Стратегический менеджмент, Страхование, Теория государства и права, Трудовое право, Экономика, Экономические дисциплины, Экономический анализ', 'Active', 'writer', '', '', '', 0, '0', 1, '', '', '', '', '', ''),
(488, 3664, '', '', ', 394', '', '', 'Елена ', 'Елена', 'Надтока ', NULL, 'false', '1534685403', 'Преподаватель дисциплины \\\\\\\"Детали машин\\\\\\\"  с многолетним стажем и опытом работы на биржах студенческих работ', '', NULL, '', NULL, NULL, NULL, 'enadtoka@gmail.com', '69ce1502d350d370a42c03660babec72', '0671830980', '', 'MLA', '4149-6293-9078-6143', NULL, 'Детали машин, Механика, Теоретическая механика', 'Active', 'writer', '', '', '', 0, '0', 1, '', '', '', '', '', ''),
(489, 3665, '', '', ', 367, 378, 418, 419, 421, 422, 424, 426, 427, 428, 433, 436, 438, 440, 441, 465, 490, 495, 499', '', '', 'Ольга', 'Ольга', 'Генза', NULL, 'false', '1535650664', 'Історик, педагог, методист міського управління освіти, аспірант', '', NULL, '', NULL, NULL, NULL, 'henza_olha@ukr.net', 'cc12b7638706e8ddb2ba034315286e70', '0983006071', '', 'MLA', '4149-4978-6267-3904', NULL, 'Административное право, Архитектура, БЖД, Бизнес-планирование, Внешнеэконом деятельность (ВЭД), География, Геополитика\r\n, Гостиничное дело, Гражданское право\r\n, Делопроизводство, Дошкольная педагогика, Жилищное право, Журналистика, Земельное право, Инвестиционный менеджмент, История, Искусство, Конфликтология, Конституционное право, Культура и искусство, Культурология, Литература, Логика, Логистика, Логопедия, Международные отношения, Международное право , Менеджмент, Менеджмент организации, Муниципальное право, Основы предпринимательства, Охрана природы, Охрана труда, Педагогика, Политология, Право, Право Европейского союза, Психология, Реклама и PR, Семейное право, Социальная работа, Социология, Спорт и туризм, Телекоммуникация, Теория государства и права, Трудовое право, Туризм, Уголовное право, Уголовный процесс, Украинский язык и литература, Управление логистикой, Физкультура и спорт, Философия, Экология, Экскурсоведение, Этика и эстетика, Юридические дисциплины, Юриспруденция', 'Active', 'writer', '', '', '', 0, '0', 1, '', '', '', '', '', ''),
(490, 3666, '', '06.08.2018 13:14:24', ', 367, 378, 405, 411, 414, 418, 419, 420, 423, 426, 427, 433, 464, 468, 495', '', '', 'Юлия', 'Юлия', 'Филатова', NULL, 'false', '1535450771', '', '', NULL, '', NULL, NULL, NULL, 'gulia6529@gmail.com', '2b28da5a2536608a1988f6b1c3f02728', '068-208-15-58', '', 'MLA', '4188-3710-2024-6402', NULL, 'Административное право, Анатомия, Английский язык, БЖД, Биология, Дошкольная педагогика, История, Литература, Логопедия, Организация труда, Охрана природы, Охрана труда, Психология, Русский язык и литература, Торговля, Туризм, Украинский язык и литература, Физкультура и спорт, Этика и эстетика', 'Active', 'writer', '', '', '', 0, '0', 1, '', '', '', '', '', ''),
(491, 3667, '', '', ', 367, 372, 378, 414, 418, 419, 420, 421, 422, 423, 424, 426, 427, 428, 433, 436, 440, 465, 468, 490, 495, 499', '', '', 'Оксана', '', 'Морозова', NULL, 'false', '1535691174', '', '', NULL, '', NULL, NULL, NULL, 'berryoksi@ukr.net', '68156794c2a850686caa87867afc0bf4', '0950771108', '', NULL, '', NULL, 'Административное право, Анатомия, БЖД, Биология, География, Гостиничное дело, Гражданское право\r\n, Дошкольная педагогика, Журналистика, Земельное право, Здравоохранение, История, Конституционное право, Криминалистика, Кулинария, Медицина, Международные отношения, Международное право , Организация труда, Охрана труда, Педагогика, Педиатрия, Политология, Право, Психология, Семейное право, Трудовое право, Туризм, Уголовное право, Уголовный процесс, Химия, Хирургия, Этика и эстетика, Юридические дисциплины', 'Active', 'writer', 'writer', '', '', 0, '0', 1, '', '', '', '', '', ''),
(492, 3668, '', '', ', 372, 378, 405, 407, 408, 409, 411, 414, 420, 423, 425, 441, 464, 467, 468', '', '', 'Александра', 'Александра', 'Щеплягина', NULL, 'false', '1531714841', 'Опыт со студенческими работами -3 года. ', '', NULL, '', NULL, NULL, NULL, 'silverman995@gmail.com', '3e8b76f60ba8449d8631d0a2781c5bda', '380665742997', '', 'MLA', '5168-7573-4761-6353', NULL, 'Анатомия, Английский язык, Биология, География, Журналистика, История, Искусство, Конфликтология, Кулинария, Культура и искусство, Культурология, Лингвистика, Литература, Медицина, Международные отношения, Международное право , Педиатрия, Политология, Психология, Разное, Русский язык и литература, Сельское хозяйство, Социальная работа, Социология, Спорт и туризм, Товароведение, Торговля, Туризм, Украинский язык и литература, Филология, Философия, Хирургия, Экономика, Экономика предприятия, Экономическая теория, Экономические дисциплины, Экскурсоведение, Этика и эстетика', 'Active', 'writer', '', '', '', 0, '0', 0, '', '', '', '', '', ''),
(493, 3669, '3566', '22.08.2018 11:14:35', ', 425, 434, 437, 443, 467, 482', '', '', 'Светлана', 'Светлана', 'Тарасенко', NULL, 'false', '1534924809', 'К.э.н., опыт работы с 2008 г.', '', NULL, '', NULL, NULL, NULL, 'svitlana_tarasenko@ukr.net', '10272a50ec98df0fc53d8359c8aacc79', '0955157232', '', 'MLA', '4149-4978-3456-1336', NULL, 'Менеджмент, Микроэкономика, Мировая  экономика, Организация труда, Организация труда и производства, Основы предпринимательства, Предприятие, Производство, Промышленность, Статистика, Стратегический маркетинг, Стратегический менеджмент, Управление затратами, Управление проектами, Управленческий учёт, Финансы, Цены и ценообразование, Экономика, Экономика предприятия, Экономическая теория, Экономические дисциплины, Экономический анализ', 'Active', 'writer', '', '', '', 0, '0', 1, '', '', '', '', '', ''),
(494, 3670, '', '', ', 372, 407, 408, 409, 414, 418, 419, 420, 423, 426, 427, 433, 468', '', '', 'Костя', 'Костя', 'Саляк', NULL, 'false', '1535471808', 'Работаю автором более трех лет. Имею высшее образование. Выполняю любые работы по указанным дисциплинам.', '', NULL, '', NULL, NULL, NULL, 'k_salyak@ukr.net', 'cc1349eec2d2ab36e310eb520bd3a1e4', '0981206621', '', 'MLA', '5168-7573-0936-6617', NULL, 'Анатомия, Биология, География, Гостиничное дело, Здравоохранение, Медицина, Охрана природы, Педагогика, Педиатрия, Разное, Сельское хозяйство, Спорт и туризм, Туризм, Физкультура и спорт, Хирургия, Экология', 'Active', 'writer', '', '', '', 0, '0', 1, '', '', '', '', '', ''),
(495, 3671, '', '', '', '', '', 'Віктор', 'Віктор', 'Lviv', NULL, 'false', '1535447403', 'Є досвід і бажання співпрацювати', '', NULL, '', NULL, NULL, NULL, 'Lobodzets@meta.ua', 'e5f748c89dc644334cf109092db69e25', '0962603931', '', 'MLA', '5169-3600-0170-6492', NULL, 'Астрономия, БЖД, Биология, География, Гидравлика, Графика, Инженерная графика, Информатика, Информатика и программирование, Компьютерные сети и телекоммуникации, Логистика, Математика, Материаловедение, Машиностроение, Механика, Охрана труда, Программирование, Сопромат, Статистика, Теория машин и механизмов (тмм), Теплотехника, Теплоэнергетика, Технические, Технология машиностроения, Транспорт, Украинский язык и литература, Физика, Химия, Химия и физика, Черчение, Экономика предприятия, Электротехника, Электроэнергетика, Энергетика, Энергосбережение', 'Active', 'writer', '', '', '', 0, '0', 1, '', '', '', '', '', ''),
(496, 3672, '', '', ', 378, 379, 380, 381, 382, 383, 384, 385, 386, 387, 388, 389, 390, 391, 392, 393, 394, 395, 396, 397, 398, 399, 400, 401, 402, 404, 406, 407, 408, 409, 410, 412, 413, 414, 415, 418, 419, 420, 423, 425, 426, 427, 429, 430, 431, 432, 433, 434, 435, 437, 439, 441, 442, 443, 444, 445, 446, 447, 448, 449, 450, 451, 452, 453, 454, 455, 456, 457, 458, 459, 460, 461, 462, 463, 466, 467, 468, 469, 470, 471, 472, 473, 474, 475, 476, 477, 478, 479, 480, 481, 482, 483, 484, 485, 486, 487, 488, 489, 491, 492, 493, 494, 495, 496, 497, 498', '', '', 'Роман', 'Роман', 'Славіта', NULL, 'false', '1531951962', 'работаю в Управлении образования г.Харьков Экономистом.Люблю читать книги и проходить различные курсы и тренинги.Есть большой опыт в написании курсовых магистерских работ.Образование высшее оконченое. Специальность экономика,вторая специальность хиическая инженерия', '', NULL, '', NULL, NULL, NULL, 'romanslavita18@gmail.com', '7eb3491fe74917a6f28275be27248f80', '0992049017', '', 'MLA', '5167-9851-0001-1873', NULL, 'АПП (Автоматизация производственных процессов), Административное право, Анализ, Анатомия, Антикризисное управление, Архитектура, Астрономия, Аудит бух и управленческий учет, Банк и инвестиционный менеджмент, Банковское дело, Банкротство, БЖД, Бизнес-планирование, Биология, Бухучет и статистика, ВСТИ, Внешнеэконом деятельность (ВЭД), География, Геодезия, Геополитика\r\n, Гидравлика, Гостиничное дело, Гражданское право\r\n, Графика, Делопроизводство, Деньги кредит банки, Детали машин, Дизайн\r\n, ДКБ (деньги кредит банки), Дошкольная педагогика, Жилищное право, Журналистика, Земельное право, Здравоохранение, Инвестиционный менеджмент, Инвестиция, Инженерная графика, История, Коммерческая деятельность, Компьютерные сети и телекоммуникации, Конфликтология, Конституционное право, Криминалистика, Криминология, Кулинария, Культура и искусство, Культурология, Лингвистика, Литература, Логика, Логистика, Логопедия, Макроэкономика, Маркетинг, Математика, Материаловедение, Машиностроение, Международные отношения, Международное право , Менеджмент, Менеджмент  качества, Менеджмент организации, Микроэкономика, Мировая  экономика, Муниципальное право, Организация труда, Организация труда и производства, Основы предпринимательства, Охрана природы, Охрана труда, Педагогика, Педиатрия, Политология, Право, Право Европейского союза, Предпринимательство, Предприятие, Производство, Промышленность, Процессы и апп пищевой пром, Психология, Радиосвязь и радиотехника, Разное, Реклама и PR, Русский язык и литература, Сельское хозяйство, Семейное право, Сист передачи и сист коммутации, Сопромат, Социальная работа, Социология, Спорт и туризм, Статистика, Стратегический маркетинг, Стратегический менеджмент, Стандартизация , Страхование, Строительство, Судебная бухгалтерия, Телекоммуникация, Теоретическая механика, Теория государства и права, Теория машин и механизмов (тмм), Теплотехника, Теплоэнергетика, Технические, Технология машиностроения, Товароведение, Торговля, Транспорт, Трудовое право, Туризм, Уголовное право, Уголовный процесс, Украинский язык и литература, Управление затратами, Управление логистикой, Управление персоналом (HR), Управление проектами, Управленческие исследования, Управленческий учёт, Физика, Физкультура и спорт, Филология, Философия, Финансы, Финансы и кредит, Химия и физика, Цены и ценообразование, Экология, Экономика, Экономика предприятия, Экономическая теория, Экономические дисциплины, Экономический анализ, Экскурсоведение, Электроника и радиотехника, Электротехника, Электроэнергетика, Энергетика, Энергосбережение, Этика и эстетика', 'Active', 'writer', '', '', '', 0, '0', 1, '', '', '', '', '', ''),
(497, 3673, '', '', ', 378, 403, 434, 437, 443, 467, 482', '', '', 'Валерия', 'Валерия', 'Салтан', NULL, 'false', '1535482219', '', '', NULL, '', NULL, NULL, NULL, 'skakunvaleria96@gmail.com', '7004f9165cc8b532ecf893b235a75ce8', '0671672111', '', 'MLA', '5168-7573-1910-7522', NULL, 'Бухучет и статистика, Геодезия, Жилищное право, Информатика и программирование, История, Искусство, Конфликтология, Культура и искусство, Муниципальное право, Производство, Филология, Экономика предприятия, Экономический анализ', 'Active', 'writer', '', '', '', 0, '0', 1, '', '', '', '', '', ''),
(498, 3674, '', '', '', '', '', 'Павел', 'Павел', 'Кавчук', NULL, 'false', '1535514746', 'Имею большой опыт преподавательской, научной и практической работы. Предпочитаю творческий подход. Тема работы должна быть мне интересна.', '', NULL, '', NULL, NULL, NULL, 'pavel.kavchuk@i.ua', '7f86fe0c09006f564af866f19aad85b4', '+3800677797613', '', 'MLA', '5168-7573-0986-8505', NULL, 'Конфликтология, Психология', 'Active', 'writer', '', '', '', 0, '0', 1, '', '', '', '', '', ''),
(499, 3675, '', '', ', 394', '', '', 'Артем', 'Артем', 'Даниленко', NULL, 'false', '1531722426', 'Закончил аспирантуру по направление процессы и аппараты.Занимаюсь написаниям студенческих работ более 3 лет.', '', NULL, '', NULL, NULL, NULL, 'adanilenko91@gmail.com', '5e8c55fc91f072b49fab384de622fd0f', '0954372636', '', 'MLA', '5552-2561-2221-5987', NULL, 'ВСТИ, Гидравлика, Детали машин, Инженерная графика, Машиностроение, Механика, Производство, Промышленность, Процессы и апп пищевой пром, Стандартизация , Технические, Технология машиностроения, Черчение', 'Active', 'writer', '', '', '', 0, '0', 0, '', '', '', '', '', ''),
(500, 3676, '', '', ', 414, 418, 419, 420, 423, 426, 427, 433, 467, 468', '', '', 'Ольга', 'Ольга', 'Каленська', NULL, 'false', '1531725634', 'Закінчила у 2012 році магістратуру за спеціальністю  викладач географії ,біології та туристично- краєзнавчої роботи, навчалачся в аспірантурі за спецальністю економіка природокористування та охорона навколишнього середовища.', '', NULL, '', NULL, NULL, NULL, 'kalenska.olga2011@gmail.com', '40f2e53d984f601332bff86f9e0961e0', '+380978551127', '', 'MLA', '5168-7450-1171-8944', NULL, 'Анатомия, Банк и инвестиционный менеджмент, БЖД, Биология, География, Геополитика\r\n, Дошкольная педагогика, Журналистика, История, Культура и искусство, Культурология, Макроэкономика, Маркетинг, Медицина, Международные отношения', 'Active', 'writer', '', '', '', 0, '0', 0, '', '', '', '', '', ''),
(501, 3677, '', '', ', 405, 411, 418, 419, 426, 427, 433, 464', '', '', 'Светлана', 'Светлана', 'Голивец', NULL, 'false', '1535052430', 'Филолог, специлист. Образование - ЧНПУ им. Т. Шевченко\r\nОпыт работы автора - 2 года', '', NULL, '', NULL, NULL, NULL, 'sveta-holivets@mail.ru', '384ec7018418aeaef9656c99eedc30e2', '+380669259946', '', 'MLA', '4149-4393-9073-1432', NULL, 'Английский язык, Лингвистика, Литература, Педагогика', 'Active', 'writer', '', '', '', 0, '0', 1, '', '', '', '', '', ''),
(502, 3678, '', '', ', 438, 440, 441, 465, 467, 468, 490, 499', '', '', 'Александра', 'Александра', 'Никитина', NULL, 'false', '1534759870', 'Закончила с отличием Одесскую национальную академию пищевых технологий и Национальный фармацевтический университет. Кандидат технических наук по специальности биотехнология. Работаю преподавателем в Одесской национальной академии пищевых технологий', '', NULL, '', NULL, NULL, NULL, 'alex.nikitina@gmail.com', '4b259ae22e1e84ddeb87031c1b15dc50', '0951924212', '', 'MLA', '4149-4978-5106-5187', NULL, 'Анатомия, Астрономия, БЖД, Биология, География, Гостиничное дело, Гражданское право\r\n, Графика, Делопроизводство, Детали машин, Дизайн\r\n, Дошкольная педагогика, Жилищное право, Журналистика, Земельное право, Здравоохранение, Инвестиционный менеджмент, Инвестиция, Инженерная графика, Иностранные языки, Информатика, История, Искусство, Коммерческая деятельность, Конфликтология, Конституционное право, Криминалистика, Криминология, Кулинария, Культура и искусство, Культурология, Литература, Логика, Логистика, Логопедия, Макроэкономика, Маркетинг, Математика, Материаловедение, Машиностроение, Медицина, Международные отношения, Международное право , Менеджмент, Менеджмент  качества, Менеджмент организации, Механика, Мировая  экономика, Муниципальное право, Налоги, Организация труда, Организация труда и производства, Основы предпринимательства, Охрана природы, Охрана труда, Педагогика, Педиатрия, Политология, Право, Право Европейского союза, Предпринимательство, Предприятие, Производство, Промышленность, Процессы и апп пищевой пром, Психология, Радиосвязь и радиотехника, Разное, Реклама и PR, Сельское хозяйство, Семейное право, Сопромат, Социальная работа, Социология, Спорт и туризм, Стратегический маркетинг, Стратегический менеджмент, Стандартизация , Страхование, Теоретическая механика, Теория государства и права, Теория машин и механизмов (тмм), Теплотехника, Теплоэнергетика, Технические, Товароведение, Торговля, Трудовое право, Туризм, Уголовное право, Уголовный процесс, Управление затратами, Управление логистикой, Управление персоналом (HR), Управление проектами, Управленческие исследования, Физика, Физкультура и спорт, Философия, Финансы, Химия, Химия и физика, Хирургия, Цены и ценообразование, Черчение, Экология, Экономика, Экономика предприятия, Экономическая теория, Экскурсоведение, Электроэнергетика, Этика и эстетика, Юридические дисциплины, Юриспруденция', 'Active', 'writer', '', '', '', 0, '0', 1, '', '', '', '', '', ''),
(503, 3679, '', '', ', 371, 373, 374, 375, 376, 377, 378, 379, 380, 381, 382, 383, 384, 385, 386, 387, 388, 389, 390, 391, 392, 393, 394, 395, 396, 397, 398, 399, 400, 401, 402, 403, 404, 405, 406, 410, 411, 412, 413, 415, 425, 429, 430, 431, 432, 434, 435, 437, 439, 441, 443, 444, 445, 446, 447, 448, 449, 450, 451, 452, 453, 454, 455, 456, 457, 458, 459, 460, 461, 462, 463, 464, 466, 467, 469, 470, 471, 472, 473, 474, 475, 476, 477, 478, 479, 480, 481, 482, 483, 484, 485, 486, 487, 488, 489, 491, 492, 493, 494, 496, 497, 498', '', '', 'Павел', 'Павел', 'Богуславский', NULL, 'false', '1535443727', '', '', NULL, '', NULL, NULL, NULL, 'bohuslavskiy@gmail.com', '6095208ab119740d1a109044f65830b2', '0961723783', '', 'MLA', '5168-7427-0805-5342', NULL, 'АПП (Автоматизация производственных процессов), Английский язык, БЖД, Бухучет и статистика, География, Инженерная графика, Иностранные языки, Информатика, Информатика и программирование, История, Компьютерные сети и телекоммуникации, Механика, Охрана природы, Охрана труда, Политология, Право, Предпринимательство, Предприятие, Программирование, Производство, Промышленность, Психология, Русский язык и литература, Социология, Стандартизация , Теория машин и механизмов (тмм), Технические, Технология машиностроения, Философия, Черчение, Экология, Экономика, Экономика предприятия, Экономическая теория, Экономический анализ, Электротехника, Электроэнергетика, Энергетика, Энергосбережение', 'Active', 'writer', '', '', '', 0, '0', 1, '', '', '', '', '', ''),
(504, 3680, '', '', ', 425, 467', '', '', 'Алла', 'Алла', 'Омельченко', NULL, 'false', '1533112112', '', '', NULL, '', NULL, NULL, NULL, 'alla.omeltschenko@gmail.com', 'd58fa29f69b8bd897f11a7d421c70c8a', '+380973713394', '', 'MLA', '5168-7427-0989-1281', NULL, 'География, Геополитика\r\n, Макроэкономика, Микроэкономика, Мировая  экономика, Охрана природы, Экология, Экономика, Экономическая теория', 'Active', 'writer', '', '', '', 0, '0', 1, '', '', '', '', '', ''),
(505, 3681, '', '06.08.2018 13:09:43', '', '', '', 'Владимир', '', 'Тест', NULL, 'false', '1532444512', '', '', NULL, '', NULL, NULL, NULL, 'html.beliy@gmail.com', '5f48c2c2ce5c2e908070b866b61af238', '0951234567', '', NULL, '', NULL, '', 'Active', 'client', '', '', '', 0, '0', 1, '', '', '', '', '', ''),
(506, 3682, '', '', ', 373, 374, 375, 376, 377, 378, 379, 380, 381, 382, 383, 384, 385, 386, 387, 388, 389, 390, 391, 392, 393, 395, 396, 397, 398, 399, 400, 401, 402, 404, 405, 406, 410, 411, 412, 413, 414, 415, 420, 423, 429, 430, 431, 432, 434, 435, 437, 439, 443, 444, 445, 446, 447, 448, 449, 450, 451, 452, 453, 454, 455, 456, 457, 458, 459, 460, 461, 462, 463, 464, 466, 468, 469, 470, 471, 472, 473, 474, 475, 476, 477, 478, 479, 480, 481, 482, 483, 484, 485, 486, 487, 488, 489, 491, 492, 493, 494, 495, 496, 497, 498', '', '', 'Автор', 'Автор', 'Тест', NULL, 'false', '1532444542', '', '', NULL, '', NULL, NULL, NULL, 'nd.vape.ua@gmail.com', '5f48c2c2ce5c2e908070b866b61af238', '0951234585', '', 'MLA', '1234-5678-9632-5874', NULL, 'АПП (Автоматизация производственных процессов), Административное право, Анализ, Анатомия, Английский язык, Антикризисное управление, Архитектура, Астрономия, Аудит бух и управленческий учет', 'Active', 'writer', '', '', '', 0, '0', 1, '', '', '', '', '', ''),
(510, 3683, '', '', ', 378, 418, 419, 426, 427, 433, 495', '', '', 'Яна', 'Яна', 'Ляшенко', NULL, 'false', '1534406789', '', '', NULL, '', NULL, NULL, NULL, 'maximum250716@gmail.com', 'bc7b046480fcf9c5a6c91a7efc18cfbf', '0502206567', '', 'MLA', '4149-4991-0971-5563', NULL, 'Административное право, БЖД, Биология, География, Дошкольная педагогика, История, Логопедия, Охрана природы, Охрана труда, Педагогика, Педиатрия, Политология, Право, Психология', 'Active', 'writer', '', '', '', 0, '0', 1, '', '', '', '', '', ''),
(514, 3685, '', '08.08.2018 11:35:00', ', 416, 417, 425, 434, 437, 442, 443, 467, 482', '', '', 'Светлана', 'Светлана', 'Кузнецова', NULL, 'false', '1534771384', 'Я автор работ на сайтах Автор24 (https://a24.biz ), na5ku (https://na5kuworkpanel.in.ua). Более 200 работ. Экономическая тематика.', '', NULL, '', NULL, NULL, NULL, 'snk-kherson@meta.ua', 'b66aecc8b1c93f64aec0b3feda574278', '+380953330703', '', 'MLA', '4149-4378-5733-3148', NULL, 'Анализ, АХД, Банк и инвестиционный менеджмент, Банковское дело, Банкротство, БЖД, Деньги кредит банки, ДКБ (деньги кредит банки), Логистика, Макроэкономика, Маркетинг, Менеджмент, Менеджмент  качества, Менеджмент организации, Микроэкономика, Мировая  экономика, Налоги, Организация труда, Организация труда и производства, Основы предпринимательства, Охрана природы, Охрана труда, Предпринимательство, Предприятие, Статистика, Стратегический маркетинг, Стратегический менеджмент, Страхование, Управление затратами, Управление логистикой, Управление персоналом (HR), Управление проектами, Финансы, Финансы и кредит, Цены и ценообразование, Экономика, Экономика предприятия, Экономическая теория, Экономические дисциплины, Экономический анализ', 'Active', 'writer', '', '', '', 0, '0', 1, '', '', '', '', '', ''),
(515, 3686, '', '06.08.2018 13:13:38', ', 378, 394, 405, 407, 408, 409, 411, 414, 418, 419, 420, 421, 422, 423, 424, 425, 426, 427, 428, 433, 434, 436, 437, 438, 440, 441, 442, 443, 464, 465, 467, 468, 482, 490, 495, 499', '', '', 'Юлия', 'Юлия', 'Козина', NULL, 'false', '1535661960', '', '', NULL, '', NULL, NULL, NULL, 'kozina.lawyer@gmail.com', '6eea1c99fb0f0c8ac47f4561f5a3d3c2', '0978608881', '', 'MLA', '4149-4978-3580-1012', NULL, 'Административное право, Анатомия, Английский язык, Антикризисное управление, Аудит бух и управленческий учет, Банк и инвестиционный менеджмент, Банковское дело, Банкротство, БЖД, Бизнес-планирование, Биология, Бухучет и статистика, ВСТИ, Внешнеэконом деятельность (ВЭД), География, Геополитика\r\n, Гостиничное дело, Гражданское право\r\n, Делопроизводство, Деньги кредит банки, Дошкольная педагогика, Жилищное право, Журналистика, Земельное право, Здравоохранение, Инвестиционный менеджмент, Инвестиция, История, Искусство, Коммерческая деятельность, Компьютерные сети и телекоммуникации, Конфликтология, Конституционное право, Криминалистика, Криминология, Кулинария, Культура и искусство, Культурология, Лингвистика, Литература, Логика, Логистика, Логопедия, Макроэкономика, Маркетинг, Математика, Материаловедение, Медицина, Международные отношения, Международное право , Менеджмент, Менеджмент  качества, Менеджмент организации, Муниципальное право, Налоги, Организация труда, Организация труда и производства, Основы предпринимательства, Охрана природы, Охрана труда, Педагогика, Педиатрия, Политология, Право, Право Европейского союза, Предпринимательство, Психология, Радиосвязь и радиотехника, Разное, Реклама и PR, Русский язык и литература, Сельское хозяйство, Семейное право, Сист передачи и сист коммутации, Социальная работа, Социология, Спорт и туризм, Статистика, Стратегический маркетинг, Стратегический менеджмент, Стандартизация , Страхование, Строительство, Судебная бухгалтерия, Телекоммуникация, Теоретическая механика, Теория государства и права, Теория машин и механизмов (тмм), Теплотехника, Технические, Технология машиностроения, Товароведение, Торговля, Транспорт, Трудовое право, Туризм, Уголовное право, Уголовный процесс, Украинский язык и литература, Управление затратами, Управление логистикой, Управление персоналом (HR), Управление проектами, Управленческие исследования, Управленческий учёт, Физкультура и спорт, Филология, Философия, Химия, Химия и физика, Хирургия, Цены и ценообразование, Черчение, Экология, Экономика, Экономика предприятия, Экономическая теория, Экономические дисциплины, Экономический анализ, Экскурсоведение, Электроника и радиотехника, Электротехника, Электроэнергетика, Энергетика, Энергосбережение, Этика и эстетика, Юридические дисциплины, Юриспруденция', 'Active', 'writer', '', '', '', 0, '0', 1, '', '', '', '', '', ''),
(516, 3687, '', '', ', 418, 419, 426, 427, 433', '', '', 'Мирослава', 'Мирослава', 'іванишин', NULL, 'false', '1531864326', '', '', NULL, '', NULL, NULL, NULL, 'myropetra@gmail.com', 'c75a7d8f06ce3f33c801a321fb9159ed', '0985848065', '', 'MLA', '4149-4391-0349-6117', NULL, 'Дошкольная педагогика, История, Искусство, Литература, Немецкий язык, Педагогика, Украинский язык и литература, Филология', 'Active', 'writer', '', '', '', 0, '0', 0, '', '', '', '', '', ''),
(517, 3688, '', '', ', 441', '', '', 'Кристина ', 'Кристина', 'Спасиченко', NULL, 'false', '1533157283', 'Выполняю работы по гуманитарным и естественным дисциплинам.\r\nТак же, готова выполнить работы по информатике.\r\nВсегда готова рассмотреть Ваши предложения и ответить Вам. \r\nВыполняю работы без задержание, немного раньше срока, если позволяет загруженность.\r\nОпыт  - 6 лет. ', '', NULL, '', NULL, NULL, NULL, 'christy11@i.ua', '246fd294a517a0ef1189dcb13049f956', '+380969468439', '', 'MLA', '4149-4991-1350-8871', NULL, 'БЖД, Биология, География, Информатика, История, Искусство, Культура и искусство, Культурология, Литература, Охрана природы, Охрана труда, Политология, Психология, Разное, Спорт и туризм, Украинский язык и литература, Физкультура и спорт, Философия, Экология, Этика и эстетика', 'Active', 'writer', '', '', '', 0, '0', 1, '', '', '', '', '', ''),
(519, 3690, '', '', '', '', '', 'Екатерина', 'Екатерина', 'Глущенко', NULL, 'false', '1535660434', 'Автор студенческих работ по гуманитарным дисциплинам.', '', NULL, '', NULL, NULL, NULL, 'nice.glushchenko@mail.ru', '087ddf0bd241b7aa86d36253f6430615', '+380663915459', '', 'MLA', '0000-0000-0000-0000', NULL, 'Журналистика, История, Искусство, Литература, Русский язык и литература, Украинский язык и литература', 'Active', 'writer', '', '', '', 0, '0', 1, '', '', '', '', '', ''),
(520, 3691, '', '06.08.2018 13:13:46', ', 378, 407, 408, 409, 418, 419, 425, 426, 427, 433, 434, 437, 441, 443, 467, 482', '', '', 'Юлия', 'Юлия', 'Пономаренко', NULL, 'false', '1534165343', 'работаю в данной сфере уже 4й год.\r\nдо этого работала в таких центрах : НИЦ \\\"Планета Знаний\\\", \\\"ССС\\\"', '', NULL, '', NULL, NULL, NULL, 'yulya.amethyst@ukr.net', '4339fdd9d1ede8784b6bfcc1630d4fab', '0939834746', '', 'MLA', '4149-4978-7108-7005', NULL, 'Анализ, Антикризисное управление, Аудит бух и управленческий учет, Банк и инвестиционный менеджмент, Банковское дело, БЖД, Бизнес-планирование, Внешнеэконом деятельность (ВЭД), География, Геополитика\r\n, Гостиничное дело, Гражданское право\r\n, Деньги кредит банки, Дошкольная педагогика, Журналистика, Инвестиционный менеджмент, История, Искусство, Конфликтология, Культура и искусство, Культурология, Литература, Логопедия, Макроэкономика, Маркетинг, Международные отношения, Менеджмент, Менеджмент  качества, Менеджмент организации, Микроэкономика, Мировая  экономика, Немецкий язык, Основы предпринимательства, Охрана труда, Педагогика, Политология, Право, Предпринимательство, Предприятие, Психология, Разное, Реклама и PR, Социальная работа, Социология, Спорт и туризм, Стратегический маркетинг, Стратегический менеджмент, Телекоммуникация, Туризм, Украинский язык и литература, Управление затратами, Управление персоналом (HR), Управление проектами, Филология, Философия, Финансы, Финансы и кредит, Экология, Экономика, Экономика предприятия, Экономическая теория, Экономические дисциплины, Экономический анализ, Этика и эстетика', 'Active', 'writer', '', '', '', 0, '0', 1, '', '', '', '', '', ''),
(521, 3692, '', '06.08.2018 13:13:56', ', 405, 411, 464', '', '', 'Юлия', 'Юлия', 'Солодовник', NULL, 'false', '1534256804', '', '', NULL, '', NULL, NULL, NULL, 'julassiya@gmail.com', '74950eee15415fa3be57c3205667925d', '0969899072', '', 'MLA', '1111-1111-1111-1111', NULL, 'Английский язык, Иностранные языки, Лингвистика, Филология', 'Active', 'writer', '', '', '', 0, '0', 1, '', '', '', '', '', ''),
(522, 3693, '', '', ', 433', '', '', 'Татьяна', 'Татьяна', 'Лазуренко', NULL, 'false', '1535429445', 'Сфера научных интересов связана с проблемами физического воспитания, спорта и физической реабилитации', '', NULL, '', NULL, NULL, NULL, 'tatyana01121985@gmail.com', 'fbe89ebb4614aa6befccffdf5365f391', '0667023449', '', 'MLA', '5457-0822-3584-5646', NULL, 'Анатомия, Биология, Медицина, Педагогика, Психология, Спорт и туризм, Физкультура и спорт', 'Active', 'writer', '', '', '', 0, '0', 1, '', '', '', '', '', '');
INSERT INTO `writers` (`id`, `writer_id`, `sup_manager`, `last_tech_message`, `prof_ord_notices`, `oth_bids_notice`, `wr_files_notice`, `firstname`, `slug`, `lastname`, `gender`, `viewed`, `online`, `text`, `profile_img`, `country`, `streetaddress`, `zip`, `city`, `state`, `email`, `password`, `primaryphone`, `availability`, `citation`, `nativelanguage`, `academiclevel`, `subject`, `writer_status`, `user_level`, `writer_level`, `manager_fine`, `admin_level`, `mystatus`, `subscription`, `loggedin`, `mngr_neworder`, `mngr_new_order_files`, `mngr_new_order_bid`, `mngr_newuser`, `mngr_wait_accept`, `mngr_new_order_mes`) VALUES
(523, 3694, '', '', ', 405, 411, 418, 419, 421, 422, 424, 425, 426, 427, 428, 433, 436, 438, 440, 441, 464, 465, 467, 490, 495, 499', '', '', 'Алина', 'Алина', 'Добрянская', NULL, 'false', '1535284074', 'Автор с многолетним стажем. \r\nПишу работы на украинском, русском и английском языке.\r\nВладею несколькими иностранными языками и располагаю доступом к ряду иностранных библиотек. \r\nВсегда выполняю заказы в срок и по требованиям/пожеланиям заказчика.', '', NULL, '', NULL, NULL, NULL, 'alevtina1404@gmail.com', 'd2c92df2f2926f0a97c6b965e2dc13ee', '0686264544', '', 'MLA', '5168-7423-5846-6815', NULL, 'Административное право, Английский язык, Внешнеэконом деятельность (ВЭД), Геополитика\r\n, Гражданское право\r\n, Деньги кредит банки, ДКБ (деньги кредит банки), Дошкольная педагогика, Журналистика, Земельное право, Здравоохранение, Инвестиция, Иностранные языки, История, Конфликтология, Конституционное право, Криминалистика, Криминология, Культура и искусство, Культурология, Литература, Логистика, Макроэкономика, Международные отношения, Микроэкономика, Мировая  экономика, Муниципальное право, Политология, Право, Право Европейского союза, Психология, Реклама и PR, Русский язык и литература, Социальная работа, Социология, Спорт и туризм, Страхование, Теория государства и права, Торговля, Транспорт, Трудовое право, Туризм, Уголовное право, Уголовный процесс, Украинский язык и литература, Филология, Философия, Экология, Экономика, Экономическая теория, Юридические дисциплины, Юриспруденция', 'Active', 'writer', '', '', '', 0, '0', 1, '', '', '', '', '', ''),
(524, 3695, '', '', '', '', '', 'Анастасия', 'Анастасия', 'Малинова', NULL, 'false', '1535541038', '', '', NULL, '', NULL, NULL, NULL, 'Anastasyamalinova@gmail.com', 'c3a3705391eaa822765cfb6459932e1f', '+380950579707', '', 'MLA', '5168-7555-2634-7360', NULL, 'Английский язык, Графика, Журналистика, Иностранные языки, Информатика, Информатика и программирование, История, Кулинария, Культура и искусство, Литература, Математика, Программирование', 'Active', 'writer', '', '', '', 0, '0', 1, '', '', '', '', '', ''),
(525, 3696, '', '', ', 405, 411, 418, 419, 425, 426, 427, 433, 441, 464, 467', '', '', 'Світлана', 'Світлана', 'Дєдова', NULL, 'false', '1532052606', 'ВЕРЕСЕНЬ/2011-СІЧЕНЬ/2017 – ВІННИЦЬКИЙ ТОРГОВЕЛЬНО-ЕКОНОМІЧНИЙ ІНСТИТУТ КНТЕУ\r\n-	факультет: економіки, маркетингу та менеджменту \r\n-	спеціальність: маркетинг (диплом магістра)\r\nВЕРЕСЕНЬ/2012-СІЧЕНЬ/2017 – ВІННИЦЬКИЙ ТОРГОВЕЛЬНО-ЕКОНОМІЧНИЙ ІНСТИТУТ КНТЕУ\r\n-	факультет: іноземного перекладу\r\n-	спеціальність: філологія (переклад) (англійська та німецька мови) (диплом магістра)\r\nЛЮТИЙ 2016 - НИНІ – АВТОР НАУКОВИХ СТУДЕНТСЬКИХ РОБІТ:\r\n-	Написання дипломних та курсових проектів як українською, так й іноземними мовами;\r\n-	Літературне редагування та корегування робіт (орфографія, пунктуація, стилістика, русизми, опечатки і т.д.);\r\n-	Копірайтинг  та рерайтинг статей.\r\nВОЛОДІННЯ МОВАМИ: українська (рідна), російська (вільно), польська (зі словником), англійська (Upper-Intermediate), німецька (Pre-Intermediate).', '', NULL, '', NULL, NULL, NULL, 'svitlanka.diedova@ukr.net', 'ec54eb71804384e7c8ff0c8b9a3c3d7c', '+380635521663', '', 'MLA', '4149-4978-4365-3025', NULL, 'Английский язык, Бизнес-планирование, Делопроизводство, Дошкольная педагогика, Журналистика, Иностранные языки, История, Искусство, Коммерческая деятельность, Культура и искусство, Культурология, Лингвистика, Литература, Логика, Макроэкономика, Маркетинг, Математика, Международные отношения, Менеджмент, Менеджмент  качества, Менеджмент организации, Микроэкономика, Основы предпринимательства, Педагогика, Политология, Предпринимательство, Предприятие, Психология, Реклама и PR, Русский язык и литература, Социология, Стратегический маркетинг, Стратегический менеджмент, Украинский язык и литература, Управление персоналом (HR), Филология, Философия, Экология, Экономика, Экономика предприятия, Экономическая теория, Экономические дисциплины, Этика и эстетика', 'Active', 'writer', '', '', '', 0, '0', 0, '', '', '', '', '', ''),
(526, 3697, '', '', ', 414, 420, 423, 468', '', '', 'Олег', 'Олег', 'Левин', NULL, 'false', '1532072876', 'Кандидат исторических наук, доцент, стаж работы, в ВУЗе более 20 лет', '', NULL, '', NULL, NULL, NULL, 'docentagro55@gmail.com', '1247b6fca8d7a23009d2aa68904d947c', '+38(063)4303541', '', 'MLA', '4731-2191-0687-8782', NULL, 'Анатомия', 'Active', 'writer', '', '', '', 0, '0', 1, '', '', '', '', '', ''),
(527, 3698, '', '', '', '', '', 'заказчик ', '', 'заказчик', NULL, 'false', '1532092060', '', '', NULL, '', NULL, NULL, NULL, 'zakazchikz@yandex.ua', 'e10adc3949ba59abbe56e057f20f883e', '111', '', NULL, '', NULL, '', 'Active', 'client', '', '', '', 0, '0', 0, '', '', '', '', '', ''),
(528, 3699, '', '', ', 418, 419, 426, 427, 433, 441, 495', '', '', 'Алёна', 'Алёна', 'Коржавина', NULL, 'false', '1532099134', '', '', NULL, '', NULL, NULL, NULL, 'alena.mezhennaya89@gmail.com', '4493f737698046b63b347d393be9bcfd', '0992712801', '', 'MLA', '4149-4991-1200-4682', NULL, 'Административное право, Биология, География, Гражданское право\r\n, Делопроизводство, Дошкольная педагогика, Жилищное право, Земельное право, Здравоохранение, История, Конфликтология, Конституционное право, Культурология, Логика, Педагогика, Политология, Право, Психология, Семейное право, Социальная работа, Социология, Стандартизация , Трудовое право, Уголовное право, Физкультура и спорт, Философия', 'Active', 'writer', '', '', '', 0, '0', 0, '', '', '', '', '', ''),
(529, 3700, '', '', ', 418, 419, 426, 427, 433', '', '', 'Людмила ', 'Людмила', 'Бреславська', NULL, 'false', '1534253033', '', '', NULL, '', NULL, NULL, NULL, 'breslava@ukr.net', '8bd0b5ec6d22aaa14666913596fe4186', '0955424451', '', 'MLA', '4731-2191-0276-7666', NULL, 'История, Искусство, Культура и искусство, Культурология, Педагогика', 'Active', 'writer', '', '', '', 0, '0', 1, '', '', '', '', '', ''),
(530, 3701, '', '', ', 467', '', '', 'Елена', 'Елена', 'Беломеснова', NULL, 'false', '1535464488', 'В данный момент нахожусь в декретном отпуске. До декрета работала главным бухгалтером. Опыт работы по написанию студенческих работ 5 лет. Пунктуальная, ответственная, порядочная. Буду рада сотрудничеству.', '', NULL, '', NULL, NULL, NULL, 'elenabelomesnova2404@ukr.net', 'c20455d5495f893aafbf5af6a35aa044', '+380731232087', '', 'MLA', '5167-4910-1594-8374', NULL, 'Бухучет и статистика, Финансы, Экономика предприятия', 'Active', 'writer', '', '', '', 0, '0', 1, '', '', '', '', '', ''),
(531, 3702, '', '', ', 405, 411, 421, 422, 424, 428, 436, 440, 441, 464, 465, 467, 490, 499', '', '', 'Александра ', 'Александра', 'Богуславская ', NULL, 'false', '1535700412', 'Имею опыт написания научных работ около года. Ответственная. Имею высшее образование. ', '', NULL, '', NULL, NULL, NULL, 'mihailichenkoalexsasha@gmail.com', '4cb147b201c03bf011f18dbcba20fee3', '0964824538', '', 'MLA', '5168-7573-1909-3557', NULL, 'Английский язык, Бизнес-планирование, Бухучет и статистика, Геодезия, Гидравлика, Детали машин, Земельное право, Инвестиционный менеджмент, Инвестиция, Искусство, Коммерческая деятельность, Конституционное право, Культура и искусство, Культурология, Лингвистика, Литература, Логика, Логистика, Макроэкономика, Маркетинг, Математика, Материаловедение, Машиностроение, Международные отношения, Международное право , Менеджмент, Менеджмент  качества, Муниципальное право, Охрана труда, Политология, Право, Радиосвязь и радиотехника, Реклама и PR, Русский язык и литература, Сельское хозяйство, Социология, Спорт и туризм, Статистика, Стратегический менеджмент, Стандартизация , Транспорт, Уголовное право, Управление затратами, Физкультура и спорт, Филология, Философия, Финансы, Финансы и кредит, Французский язык, Химия, Химия и физика, Хирургия, Цены и ценообразование, Экономика, Юридические дисциплины', 'Active', 'writer', '', '', '', 0, '0', 1, '', '', '', '', '', ''),
(532, 3703, '', '', ', 467', '', '', 'Ирина', 'Ирина', 'Тараненко', NULL, 'false', '1535530792', '', '', NULL, '', NULL, NULL, NULL, 'Irish.alexandrovna@gmail.com', 'af6a9c1e8c66a8e40fb98fa3bf6a06dc', '0974837777', '', 'MLA', '5168-7427-1639-1903', NULL, 'Международные отношения, Мировая  экономика, Основы предпринимательства, Финансы, Финансы и кредит, Экономика, Экономика предприятия, Экономические дисциплины', 'Active', 'writer', '', '', '', 0, '0', 1, '', '', '', '', '', ''),
(533, 3704, '', '', ', 482', '', '', 'Людмила', 'Людмила', 'Громова', NULL, 'false', '1535661848', 'Фрилансер, автор студенческих работ. Целеустремленный и оптимистический человек.', '', NULL, '', NULL, NULL, NULL, '_liuda_@ukr.net', 'a7d570702c6088fe0b9daf955442d6f2', '0678898458', '', 'MLA', '4149-4978-6731-2078', NULL, 'Антикризисное управление, Астрономия, Банк и инвестиционный менеджмент, Банковское дело, БЖД, Биология, Внешнеэконом деятельность (ВЭД), География, Гостиничное дело, Гражданское право\r\n, Деньги кредит банки, ДКБ (деньги кредит банки), Здравоохранение, Инвестиция, История, Искусство, Конфликтология, Кулинария, Культура и искусство, Культурология, Маркетинг, Математика, Международные отношения, Менеджмент, Менеджмент организации, Мировая  экономика, Организация труда, Организация труда и производства, Основы предпринимательства, Охрана природы, Охрана труда, Политология, Право, Предприятие, Социология, Спорт и туризм, Стратегический менеджмент, Страхование, Теория государства и права, Товароведение, Туризм, Уголовное право, Управление затратами, Физкультура и спорт, Финансы, Финансы и кредит, Цены и ценообразование, Экология, Экономика, Экономика предприятия, Экономический анализ, Этика и эстетика, Юридические дисциплины, Юриспруденция', 'Active', 'writer', '', '', '', 0, '0', 1, '', '', '', '', '', ''),
(534, 3705, '', '', ', 407, 408, 409, 418, 419, 426, 427, 433', '', '', 'Наталия', 'Наталия', 'Кравченко', NULL, 'false', '1535205350', 'педагог, автор написания студенческих работ\r\nопыт работы:\r\nпедагогом – 12 лет\r\nавтором студенческих работ – 6 лет\r\nОбразование:\r\n1)	Измаильский государственный гуманитарный университет, факультет экономики и информатики, бакалавр по трудовому обучению, ОБЖ. охране труда, специалист по экономике, год окончания 2007\r\n2)	ОНУ им. И.И. Мечникова, физический факультет, бакалавр по физике, год окончания 2009.\r\n\r\nПрофессиональные навыки: \r\n- ответственность;\r\n-  пунктуальность;\r\n- исполнительность;\r\n - профессионализм;\r\n-творческий подход к любому делу;\r\n- владение ПК;\r\n- грамотное заполнение документации;\r\n- знание языков: русский, украинский, румынский; и т.д.\r\n\r\nДополнительные информация: работаю с полной отдачей и вдохновением. найду индивидуальный подход, грамотное решение поставленных задач, при необходимости творческие умения и креативность проявлю. Рада новым начинаниям и новым делам.\r\n', '', NULL, '', NULL, NULL, NULL, 'cameruncic115@gmail.com', '17cdaf7256c0e11d46d1eb4646629d7d', '+380973861706', '', 'MLA', '5168-7573-6052-3262', NULL, 'БЖД, Здравоохранение, Конфликтология, Логопедия, Медицина, Менеджмент организации, Охрана природы, Охрана труда, Педагогика, Педиатрия, Психология, Разное, Реклама и PR, Социальная работа, Физкультура и спорт, Экология', 'Active', 'writer', '', '', '', 0, '0', 1, '', '', '', '', '', ''),
(535, 3706, '', '', ', 490, 499', '', '', 'Анастасія', 'Анастасія', 'Цапун', NULL, 'false', '1535471219', 'Проживаю у м. Львів. Закінчила ЛНУ ім. Івана Франка, економічний факультет, кафедра фінансів. Написанням наукових робіт займаюсь 4 роки.', '', NULL, '', NULL, NULL, NULL, 'aglaja.world.new@gmail.com', 'f2490daddbd309ea83a1ca765e5ac649', '0964736063', '', 'MLA', '4069-8909-2610-2017', NULL, 'Антикризисное управление, Банк и инвестиционный менеджмент, Банковское дело, Банкротство, Бизнес-планирование, Внешнеэконом деятельность (ВЭД), Гражданское право\r\n, Деньги кредит банки, ДКБ (деньги кредит банки), Журналистика, Инвестиционный менеджмент, Инвестиция, История, Коммерческая деятельность, Конституционное право, Лингвистика, Литература, Макроэкономика, Маркетинг, Международные отношения, Менеджмент, Менеджмент  качества, Менеджмент организации, Микроэкономика, Мировая  экономика, Муниципальное право, Право, Предпринимательство, Предприятие, Психология, Реклама и PR, Социология, Стратегический маркетинг, Стратегический менеджмент, Страхование, Теория государства и права, Торговля, Трудовое право, Украинский язык и литература, Управление затратами, Управление персоналом (HR), Управление проектами, Философия, Финансы, Финансы и кредит, Цены и ценообразование, Экономика, Экономика предприятия, Экономическая теория, Экономические дисциплины, Экономический анализ, Этика и эстетика, Юридические дисциплины, Юриспруденция', 'Active', 'writer', '', '', '', 0, '0', 1, '', '', '', '', '', ''),
(536, 3707, '', '', '', '', '', 'Анастасия', 'Анастасия', 'Котельникова', NULL, 'false', '1535536811', '', '', NULL, '', NULL, NULL, NULL, 'akotelnikova1993@gmail.com', 'd3781fbc053b2358b27d5c7d762e43c7', '0634646399', '', 'MLA', '5168-7573-4347-2710', NULL, 'БЖД, Дошкольная педагогика, Журналистика, История, Искусство, Компьютерные сети и телекоммуникации, Конфликтология, Культура и искусство, Культурология, Литература, Логопедия, Педагогика, Психология, Реклама и PR, Социальная работа, Украинский язык и литература, Управление персоналом (HR)', 'Active', 'writer', '', '', '', 0, '0', 1, '', '', '', '', '', ''),
(539, 3708, '', '', ', 488, 489, 491, 492, 493, 494, 495, 496, 497, 498', ', 494, 494, 494, 492, 492, 492, 495, 495, 495, 495, 495, 495, 495, 489, 489, 489, 489, 489, 489, 489, 489, 489, 489, 489, 489, 489, 489, 489, 489, 489', '', 'Разработчик Автор', '', 'qqq', NULL, 'false', '1535641201', '', '', NULL, '', NULL, NULL, NULL, 'shaitan.vova@mail.ru', '4297f44b13955235245b2497399d7a93', '23123123123123', '', NULL, '', NULL, 'АПП (Автоматизация производственных процессов), Административное право, Анализ, Анатомия, Английский язык, Антикризисное управление, Архитектура, Астрономия, Аудит бух и управленческий учет', 'Active', 'writer', 'writer', '', '', 0, '0', 1, '', '', '', '', '', ''),
(540, 3709, '', '', ', 418, 419, 426, 427, 433', '', '', 'Ольга', 'Ольга', 'Баран', NULL, 'false', '1535571073', 'филолог, образование высшее, работаю быстро', '', NULL, '', NULL, NULL, NULL, 'baranolga67@gmail.com', 'b32cf8e7ad682ead36e657eb65206299', '380689207135', '', 'MLA', '4149-4991-1198-7994', NULL, 'Земельное право, Кулинария, Литература, Медицина, Педагогика, Психология, Русский язык и литература, Сельское хозяйство, Украинский язык и литература, Филология, Этика и эстетика', 'Active', 'writer', '', '', '', 0, '0', 1, '', '', '', '', '', ''),
(541, 3710, '', '', '', '', '', 'Татьяна', 'Татьяна', 'Родик', NULL, 'false', '1535536472', '15 лет работы бухгалтером, сейчас нахожусь в декретном отпуске! 3\r\nгода написания контрольных, курсовых и дипломных работ по таким\r\nдисциплинам:\r\n1. Бухгалтерский учет;\r\n2. Налоговый учет;\r\n3. Экономика предприятия;\r\n4. Финансовый анализ;\r\n5. Бюджетная система;\r\n6. Маркетинг;\r\n7. Бизнес-планирование и т.д. все экономические дисциплины\r\n', '', NULL, '', NULL, NULL, NULL, 'rodik_tanya@ukr.net', '1be419b1a7dd44b9c4d1d3e67d4f6957', '0933526202', '', 'MLA', '4149-4978-6182-2882', NULL, 'Аудит бух и управленческий учет, Банкротство, Бизнес-планирование, Бухучет и статистика, Внешнеэконом деятельность (ВЭД), Инвестиционный менеджмент, Инвестиция, Коммерческая деятельность, Макроэкономика, Маркетинг, Менеджмент организации, Микроэкономика, Налоги, Организация труда, Организация труда и производства, Основы предпринимательства, Предпринимательство, Предприятие, Производство, Статистика, Управление проектами, Управленческий учёт, Финансы и кредит, Цены и ценообразование, Экономика, Экономика предприятия, Экономическая теория, Экономические дисциплины, Экономический анализ', 'Active', 'writer', '', '', '', 0, '0', 1, '', '', '', '', '', ''),
(542, 3711, '', '', ', 416, 417, 425, 434, 437, 441, 443, 467, 482', '', '', 'Екатерина', 'Екатерина', 'Большакова', NULL, 'false', '1534393365', 'Качественно и в срок выполняю работы.', '', NULL, '', NULL, NULL, NULL, 'elshina.ek@yandex.ru', '62ba53cdb39450a791f6ec9e1c8f8ab6', '89082428656', '', 'MLA', '4817-7600-7340-8415', NULL, 'Анализ, Аудит бух и управленческий учет, АХД, Банковское дело, Бухучет и статистика, Деньги кредит банки, ДКБ (деньги кредит банки), Макроэкономика, Маркетинг, Менеджмент организации, Микроэкономика, Мировая  экономика, Налоги, Организация труда, Организация труда и производства, Управленческий учёт, Философия, Финансы, Финансы и кредит, Цены и ценообразование, Экология, Экономика, Экономика предприятия, Экономическая теория, Экономические дисциплины, Экономический анализ', 'Active', 'writer', '', '', '', 0, '0', 1, '', '', '', '', '', ''),
(543, 3712, '', '', ', 418, 419, 421, 422, 424, 425, 426, 427, 428, 433, 436, 438, 440, 441, 442, 465, 467, 490, 495, 499', '', '', 'Марина', 'Марина', 'Лазарева', NULL, 'false', '1533896564', 'Занимаюсь написанием работ более 15 лет. Буду рада сотрудничеству с Вами. С Ув. Марина', '', NULL, '', NULL, NULL, NULL, 'marina79@ua.fm', 'bce33a6084eaa568a39fc8929213a9b7', '0971355055', '', 'MLA', '5169-1570-0267-8807', NULL, 'Административное право, Банкротство, БЖД, География, Геодезия, Гостиничное дело, Гражданское право\r\n, Деньги кредит банки, Жилищное право, Земельное право, Здравоохранение, История, Искусство, Коммерческая деятельность, Конфликтология, Конституционное право, Криминалистика, Криминология, Кулинария, Культура и искусство, Культурология, Международные отношения, Международное право , Менеджмент, Менеджмент  качества, Менеджмент организации, Микроэкономика, Мировая  экономика, Муниципальное право, Организация труда, Организация труда и производства, Основы предпринимательства, Охрана природы, Охрана труда, Педагогика, Педиатрия, Политология, Право, Право Европейского союза, Предпринимательство, Предприятие, Психология, Реклама и PR, Семейное право, Социальная работа, Социология, Спорт и туризм, Судебная бухгалтерия, Товароведение, Торговля, Трудовое право, Туризм, Уголовное право, Уголовный процесс, Управление персоналом (HR), Физкультура и спорт, Философия, Экология, Экономика предприятия, Экономическая теория, Этика и эстетика, Юридические дисциплины, Юриспруденция', 'Active', 'writer', '', '', '', 0, '0', 1, '', '', '', '', '', ''),
(544, 3713, '', '', ', 407, 408, 409, 418, 419, 426, 427, 433, 441', '', '', 'Виталина', 'Виталина', 'Лесик', NULL, 'false', '1533055176', '', '', NULL, '', NULL, NULL, NULL, 'vtlnlesik@gmail.com', '365c59fdf1b3c62bd25756dfaaa6e45e', '+380969947234', '', 'MLA', '5168-7573-2262-0115', NULL, 'Астрономия, БЖД, Информатика, Логика, Математика, Механика, Педагогика, Психология, Разное, Физика, Философия, Этика и эстетика', 'Active', 'writer', '', '', '', 0, '0', 1, '', '', '', '', '', ''),
(545, 3714, '', '', '', '', '', 'Анастасия ', 'Анастасия', 'Малета', NULL, 'false', '1535693650', '', '', NULL, '', NULL, NULL, NULL, 'nastenamaleta@gmail.com', '3674e7a3690ccfd86e51e081cb62f573', '0667133012', '', 'MLA', '5168-7573-2122-8860', NULL, 'Аудит бух и управленческий учет, Банк и инвестиционный менеджмент, Экономика, Экономические дисциплины', 'Active', 'writer', '', '', '', 0, '0', 1, '', '', '', '', '', ''),
(546, 3715, '', '', ', 414, 418, 419, 420, 423, 426, 427, 433, 468', '', '', 'Олександра', 'Олександра', 'Антюк', NULL, 'false', '1535438508', '', '', NULL, '', NULL, NULL, NULL, 'oleksandra.antyuk@gmail.com', '82decdcda126f8bfb4cab0800605e930', '+380680939896', '', 'MLA', '5168-7573-6743-4315', NULL, 'Анатомия, Астрономия, Биология, Дошкольная педагогика, История, Искусство, Конфликтология, Кулинария, Культура и искусство, Культурология, Лингвистика, Литература, Педагогика, Психология, Социальная работа, Социология, Филология, Этика и эстетика', 'Active', 'writer', '', '', '', 0, '0', 1, '', '', '', '', '', ''),
(547, 3716, '', '', ', 425, 434, 437, 442, 443, 467, 482', '', '', 'Алина', 'Алина', 'Китаева', NULL, 'false', '1532547993', 'Закончила ОНЭУ. Специальность - экономика предприятия. Опыт написания курсовых работ, рефератов и т.д. есть. Являюсь автором уже более года. Гарантирую уникальность материала, качество и в сроки. ', '', NULL, '', NULL, NULL, NULL, 'alina-kitaeva@mail.ru', 'd63bf240317b981f1e23698a0f102810', '0975960591', '', 'MLA', '5168-7551-0498-1382', NULL, 'Антикризисное управление, Банк и инвестиционный менеджмент, Банковское дело, Банкротство, Бизнес-планирование, Бухучет и статистика, Внешнеэконом деятельность (ВЭД), Деньги кредит банки, ДКБ (деньги кредит банки), Инвестиционный менеджмент, Инвестиция, Информатика, Коммерческая деятельность, Макроэкономика, Маркетинг, Международные отношения, Менеджмент, Менеджмент организации, Микроэкономика, Мировая  экономика, Организация труда, Организация труда и производства, Основы предпринимательства, Политология, Предпринимательство, Предприятие, Производство, Промышленность, Русский язык и литература, Социальная работа, Социология, Спорт и туризм, Статистика, Стратегический маркетинг, Управление затратами, Управленческий учёт, Экономика, Экономика предприятия, Экономическая теория, Экономические дисциплины, Экономический анализ', 'Active', 'writer', '', '', '', 0, '0', 0, '', '', '', '', '', ''),
(548, 3717, '', '', ', 405, 411, 418, 419, 421, 422, 424, 426, 427, 428, 433, 436, 440, 464, 465, 467, 490, 499', '', '', 'Наталия', 'Наталия', 'Седляр', NULL, 'false', '1534400610', '', '', NULL, '', NULL, NULL, NULL, 'nat.sedlyar@gmail.com', '849d9f3b4ac499eaed79421ca0dd6457', '380977430115', '', 'MLA', '4149-4978-3993-1922', NULL, 'Английский язык, Астрономия, Аудит бух и управленческий учет, Бизнес-планирование, Бухучет и статистика, Геодезия, Геополитика\r\n, Гостиничное дело, Графика, Деньги кредит банки, Жилищное право, Журналистика, Здравоохранение, Инвестиционный менеджмент, Искусство, Конституционное право, Культура и искусство, Лингвистика, Логистика, Макроэкономика, Международные отношения, Охрана труда, Педагогика, Педиатрия, Политология, Право, Право Европейского союза, Радиосвязь и радиотехника, Реклама и PR, Семейное право, Сист передачи и сист коммутации, Социология, Спорт и туризм, Туризм, Уголовное право, Финансы, Химия и физика, Экономика, Юридические дисциплины', 'Active', 'writer', '', '', '', 0, '0', 1, '', '', '', '', '', ''),
(549, 3718, '', '06.08.2018 13:12:19', '', '', '', 'Мария', '', 'Иванова ', NULL, 'false', '1535567508', '', '', NULL, '', NULL, NULL, NULL, 'istinay191@gmail.com', 'd10896bd91f0456ccdd9954f34ed3b98', '380989455247', '', NULL, '', NULL, '', 'Active', 'client', '', '', '', 0, '0', 1, '', '', '', '', '', ''),
(550, 3719, '', '', ', 416, 417, 425, 434, 437, 442, 443, 467, 482', '', '', 'Елена', 'Елена', 'Савенко', NULL, 'false', '1535457389', 'Занимаюсь написанием студенческих работ с 2002 года, в базе более 4000 уникальных работ', '', NULL, '', NULL, NULL, NULL, 'k_alena_@list.ru', '96e79218965eb72c92a549dd5a330112', '095-791-46-13', '', 'MLA', '4731-2171-1452-3689', NULL, 'Анализ, Аудит бух и управленческий учет, АХД, Банк и инвестиционный менеджмент, Банковское дело, Банкротство, Бизнес-планирование, Бухучет и статистика, Деньги кредит банки, ДКБ (деньги кредит банки), Инвестиционный менеджмент, Инвестиция, Коммерческая деятельность, Маркетинг, Микроэкономика, Налоги, Основы предпринимательства, Предпринимательство, Предприятие, Статистика, Стратегический менеджмент, Страхование, Судебная бухгалтерия, Управление затратами, Управление проектами, Управленческий учёт, Финансы, Финансы и кредит, Цены и ценообразование, Экономика, Экономика предприятия, Экономическая теория, Экономические дисциплины, Экономический анализ', 'Active', 'writer', '', '', '', 0, '0', 1, '', '', '', '', '', ''),
(551, 3720, '', '', ', 416, 417, 418, 419, 425, 426, 427, 433, 434, 437, 441, 442, 443, 467, 482', '', '', 'Олеся', 'Олеся', 'Гуляева', NULL, 'false', '1532631328', 'Диплом с отличием ДонНУ, Экономическая кибернетика, магистр 2010 г. 8 лет практики написания работ.', '', NULL, '', NULL, NULL, NULL, 'tambovtseva_o@ukr.net', '938856636c4c43e5453e831798a77382', '380638557430', '', 'MLA', '5168-7422-0983-3965', NULL, 'Антикризисное управление, Аудит бух и управленческий учет, АХД, Банк и инвестиционный менеджмент, Банковское дело, Банкротство, Бизнес-планирование, Бухучет и статистика, Внешнеэконом деятельность (ВЭД), Геополитика\r\n, Гостиничное дело, Деньги кредит банки, ДКБ (деньги кредит банки), Дошкольная педагогика, Инвестиционный менеджмент, История, Коммерческая деятельность, Конфликтология, Культурология, Макроэкономика, Маркетинг, Международные отношения, Менеджмент, Менеджмент  качества, Менеджмент организации, Микроэкономика, Мировая  экономика, Организация труда, Организация труда и производства, Основы предпринимательства, Охрана труда, Педагогика, Предпринимательство, Предприятие, Психология, Реклама и PR, Социология, Спорт и туризм, Стратегический маркетинг, Стратегический менеджмент, Теория государства и права, Товароведение, Торговля, Управление персоналом (HR), Управление проектами, Управленческие исследования, Управленческий учёт, Физкультура и спорт, Философия, Финансы, Финансы и кредит, Экология, Экономика, Экономика предприятия, Экономическая теория, Экономические дисциплины, Экономический анализ, Этика и эстетика', 'Active', 'writer', '', '', '', 0, '0', 0, '', '', '', '', '', ''),
(552, 3721, '', '', ', 418, 419, 425, 426, 427, 433, 434, 437, 442, 443, 467, 482', '', '', 'Екатерина', 'Екатерина', 'Логинова', NULL, 'false', '1534340158', '', '', NULL, '', NULL, NULL, NULL, 'loginovakatya23@gmail.com', '6cd9f62f88dbdc373a903f88b9b40a35', '0955338260', '', 'MLA', '5168-7427-1423-0897', NULL, 'Банк и инвестиционный менеджмент, Банкротство, Внешнеэконом деятельность (ВЭД), Гостиничное дело, Делопроизводство, Деньги кредит банки, ДКБ (деньги кредит банки), Инвестиционный менеджмент, Инвестиция, Информатика, Информатика и программирование, Коммерческая деятельность, Логистика, Макроэкономика, Маркетинг, Международные отношения, Менеджмент, Менеджмент  качества, Менеджмент организации, Микроэкономика, Мировая  экономика, Основы предпринимательства, Педагогика, Предпринимательство, Реклама и PR, Статистика, Стратегический маркетинг, Стратегический менеджмент, Туризм, Украинский язык и литература, Управление затратами, Управление логистикой, Управление персоналом (HR), Управление проектами, Финансы, Финансы и кредит, Цены и ценообразование, Экономика, Экономика предприятия, Экономическая теория, Экономические дисциплины, Экономический анализ', 'Active', 'writer', '', '', '', 0, '0', 1, '', '', '', '', '', ''),
(553, 3722, '', '', ', 407, 408, 409, 418, 419, 421, 422, 424, 425, 426, 427, 428, 433, 434, 436, 437, 438, 440, 441, 442, 443, 465, 467, 482, 490, 495, 499', '', '', 'Лідія', 'Лідія', 'Гуменяк', NULL, 'false', '1534679674', 'Різностороння особистість', '', NULL, '', NULL, NULL, NULL, 'gumenyak.lidija@gmail.com', 'e807f1fcf82d132f9bb018ca6738a19f', '0985136065', '', 'MLA', '5168-7573-6145-8674', NULL, 'Административное право, Анализ, Антикризисное управление, Астрономия, Банк и инвестиционный менеджмент, Банковское дело, Банкротство, БЖД, Бизнес-планирование, Внешнеэконом деятельность (ВЭД), География, Геополитика\r\n, Гостиничное дело, Гражданское право\r\n, Деньги кредит банки, Дизайн\r\n, ДКБ (деньги кредит банки), Дошкольная педагогика, Журналистика, Инвестиционный менеджмент, Инвестиция, История, Искусство, Конфликтология, Конституционное право, Криминалистика, Криминология, Кулинария, Культура и искусство, Культурология, Литература, Макроэкономика, Маркетинг, Международные отношения, Менеджмент, Менеджмент  качества, Менеджмент организации, Микроэкономика, Мировая  экономика, Основы предпринимательства, Охрана природы, Охрана труда, Политология, Право, Право Европейского союза, Предпринимательство, Предприятие, Психология, Разное, Реклама и PR, Социология, Спорт и туризм, Статистика, Страхование, Теория государства и права, Торговля, Транспорт, Трудовое право, Туризм, Уголовное право, Уголовный процесс, Украинский язык и литература, Управление персоналом (HR), Физкультура и спорт, Философия, Финансы, Химия и физика, Цены и ценообразование, Экология, Экономика, Экономика предприятия, Экономическая теория, Экономические дисциплины, Экономический анализ, Экскурсоведение, Этика и эстетика, Юридические дисциплины, Юриспруденция', 'Active', 'writer', '', '', '', 0, '0', 1, '', '', '', '', '', ''),
(554, 3723, '', '12.08.2018 08:41:31', ', 465, 490, 495, 499', '', ', 438', 'Аліна', 'Аліна', 'Мазур', NULL, 'false', '1535650754', '', '', NULL, '', NULL, NULL, NULL, 'paramiy@ukr.net', 'bb4a42432e94102459323bee81ee9ee2', '+380680909941', '', 'MLA', '4149-4978-7044-3258', NULL, 'Административное право, Гражданское право\r\n, Делопроизводство, Жилищное право, Земельное право, История, Конституционное право, Криминалистика, Криминология, Международное право , Муниципальное право, Охрана природы, Охрана труда, Политология, Право, Право Европейского союза, Семейное право, Социология, Теория государства и права, Трудовое право, Уголовное право, Уголовный процесс, Управление персоналом (HR), Юридические дисциплины, Юриспруденция', 'Active', 'writer', '', '', '', 0, '0', 1, '', '', '', '', '', ''),
(555, 3724, '', '', ', 407, 408, 409, 411, 421, 422, 424, 425, 428, 436, 438, 440, 441, 442, 464, 465, 467, 490, 495, 499', '', '', 'Юлия', 'Юлия', 'Литвин', NULL, 'false', '1532856436', '', '', NULL, '', NULL, NULL, NULL, 'julia1503j@ukr.net', '418a1c99759372f04b3853503387e99f', '+380982286135', '', 'MLA', '5168-7573-7042-0657', NULL, 'Административное право, Английский язык, Антикризисное управление, Аудит бух и управленческий учет, Банк и инвестиционный менеджмент, Банковское дело, Банкротство, БЖД, Бухучет и статистика, Внешнеэконом деятельность (ВЭД), Гражданское право\r\n, Делопроизводство, Деньги кредит банки, ДКБ (деньги кредит банки), Жилищное право, Земельное право, Инвестиционный менеджмент, Иностранные языки, История, Конфликтология, Конституционное право, Криминалистика, Криминология, Культурология, Лингвистика, Литература, Макроэкономика, Маркетинг, Международное право , Менеджмент, Менеджмент организации, Микроэкономика, Мировая  экономика, Муниципальное право, Налоги, Организация труда, Политология, Право, Право Европейского союза, Предпринимательство, Психология, Разное, Русский язык и литература, Семейное право, Социология, Статистика, Страхование, Судебная бухгалтерия, Теория государства и права, Трудовое право, Туризм, Уголовное право, Уголовный процесс, Украинский язык и литература, Управление затратами, Управление логистикой, Управленческие исследования, Филология, Философия, Финансы, Финансы и кредит, Экономика, Экономика предприятия, Экономическая теория, Экономические дисциплины, Юридические дисциплины, Юриспруденция', 'Active', 'writer', '', '', '', 0, '0', 1, '', '', '', '', '', ''),
(556, 3725, '', '', ', 425, 467', '', '', 'Леонид', 'Леонид', 'Кушнир', NULL, 'false', '1534357536', '', '', NULL, '', NULL, NULL, NULL, 'gerodot@ukr.net', '1d2ca883a83c648315572a86a1004a17', '0669408782', '', 'MLA', '5168-7573-1112-2248', NULL, 'География, История, Макроэкономика, Микроэкономика, Туризм, Экономика, Экономическая теория', 'Active', 'writer', '', '', '', 0, '0', 0, '', '', '', '', '', ''),
(557, 3726, '', '', ', 418, 419, 426, 427, 433, 434, 437, 443, 482', '', '', 'Юрий', 'Юрий', 'Иванович', NULL, 'false', '1535468387', '', '', NULL, '', NULL, NULL, NULL, 'friza@ukr.net', '26d996be5e80cb67c4a4e0d5481ff317', '0681283209', '', 'MLA', '5168 7450 1098 8837', NULL, 'Астрономия, Инвестиция, Информатика, Математика, Педагогика, Статистика, Физика, Экология, Экономический анализ', 'Active', 'writer', '', '', '', 0, '0', 1, '', '', '', '', '', ''),
(558, 3727, '', '', ', 437, 438, 439, 440, 441, 442, 443, 444, 445, 446, 447, 448, 449, 450, 451, 452, 453, 454, 455, 456, 457, 458, 459, 460, 461, 462, 463, 465, 466, 467, 468, 469, 470, 471, 472, 473, 474, 475, 476, 477, 478, 479, 480, 481, 482, 483, 484, 485, 486, 487, 488, 489, 490, 491, 492, 493, 494, 495, 496, 497, 498, 499', '', '', 'Ирина', 'Ирина', 'Кушниренко', NULL, 'false', '1534527959', 'Ответственная, дисциплинированная, коммуникабельная', '', NULL, '', NULL, NULL, NULL, 'kushnirenko1irisha@gmail.com', '84db90532a83b46285d8cffa328e1199', '0636205251', '', 'MLA', '5168-7573-0675-9806', NULL, 'АПП (Автоматизация производственных процессов), Административное право, Анатомия, Антикризисное управление, Архитектура, Астрономия, Аудит бух и управленческий учет, АХД, Банк и инвестиционный менеджмент, Банковское дело, Банкротство, БЖД, Биология, Бухучет и статистика, Внешнеэконом деятельность (ВЭД), География, Геополитика\r\n, Гостиничное дело, Гражданское право\r\n, Графика, Делопроизводство, Дизайн\r\n, Дошкольная педагогика, Жилищное право, Журналистика, Земельное право, Здравоохранение, Инвестиционный менеджмент, Инвестиция, Инженерная графика, Иностранные языки, Информатика, История, Искусство, Коммерческая деятельность, Компьютерные сети и телекоммуникации, Конфликтология, Конституционное право, Криминалистика, Криминология, Культура и искусство, Культурология, Лингвистика, Литература, Логика, Логистика, Логопедия, Макроэкономика, Маркетинг, Материаловедение, Медицина, Международные отношения, Международное право , Менеджмент  качества, Менеджмент организации, Микроэкономика, Мировая  экономика, Муниципальное право, Налоги, Организация труда, Организация труда и производства, Основы предпринимательства, Охрана природы, Охрана труда, Педагогика, Педиатрия, Политология, Право, Право Европейского союза, Предпринимательство, Предприятие, Производство, Промышленность, Психология, Разное, Реклама и PR, Русский язык и литература, Сельское хозяйство, Семейное право, Сист передачи и сист коммутации, Социальная работа, Социология, Спорт и туризм, Стратегический маркетинг, Стратегический менеджмент, Стандартизация , Страхование, Строительство, Телекоммуникация, Теория государства и права, Теплоэнергетика, Технические, Товароведение, Торговля, Транспорт, Трудовое право, Туризм, Уголовное право, Уголовный процесс, Украинский язык и литература, Управление логистикой, Управление персоналом (HR), Управленческие исследования, Физкультура и спорт, Филология, Философия, Хирургия, Экология, Экономика, Экономика предприятия, Экономические дисциплины, Экономический анализ, Экскурсоведение, Энергетика, Энергосбережение, Этика и эстетика, Юридические дисциплины, Юриспруденция', 'Active', 'writer', '', '', '', 0, '0', 1, '', '', '', '', '', ''),
(559, 3728, '', '', ', 407, 408, 409, 467', '', '', 'Полина', 'Полина', 'Лобунцова', NULL, 'false', '1535661466', '', '', NULL, '', NULL, NULL, NULL, 'polinaziya@rambler.ru', '80ff032a912d2f0fd2003021ed5504ac', '0679333398', '', 'MLA', '5168-7572-8349-8568', NULL, 'Банковское дело, История, Культурология, Макроэкономика, Материаловедение, Машиностроение, Менеджмент, Микроэкономика, Организация труда, Организация труда и производства, Охрана природы, Охрана труда, Политология, Предприятие, Производство, Промышленность, Процессы и апп пищевой пром, Разное, Сельское хозяйство, Социология, Статистика, Стандартизация , Теория государства и права, Теория машин и механизмов (тмм), Технические, Технология машиностроения, Транспорт, Финансы, Финансы и кредит, Экономика, Экономические дисциплины', 'Active', 'writer', '', '', '', 0, '0', 1, '', '', '', '', '', ''),
(560, 3729, '', '', '', '', '', 'Галина', 'Галина', 'Шилина', NULL, 'false', '1533935242', '', '', NULL, '', NULL, NULL, NULL, 'shilinagalsna@gmail.com', 'd1932a1428e4a0160bb9bcb63f07eb45', '+380676988003', '', 'MLA', '4149-4378-6537-3979', NULL, 'Физика', 'Active', 'writer', '', '', '', 0, '0', 1, '', '', '', '', '', ''),
(561, 3730, '', '', ', 410, 412, 413, 415, 429, 430, 431, 432, 434, 435, 437, 439, 443, 444, 445, 446, 447, 448, 449, 450, 451, 452, 453, 454, 455, 456, 457, 458, 459, 460, 461, 462, 463, 466, 469, 470, 471, 472, 473, 474, 475, 476, 477, 478, 479, 480, 481, 482, 483, 484, 485, 486, 487, 488, 489, 491, 492, 493, 494, 496, 497, 498', '', ', 467', 'Александр', 'Александр', 'Лесников', NULL, 'false', '1535463790', 'Большой опыт выполнения авторских работ. Прохождение антиплагаита. Работа на русском и укр. языках. Качество и сроки.', '', NULL, '', NULL, NULL, NULL, 'justce@gmail.com', '63c67d08e04590149f5a2e6a3363c91b', '+380671399936', '', 'MLA', '4149-4378-6481-6382', NULL, 'АПП (Автоматизация производственных процессов), Анализ, Бизнес-планирование, Биология, География, Дизайн\r\n, Инвестиция, Информатика, Информатика и программирование, Коммерческая деятельность, Компьютерные сети и телекоммуникации, Математика, Менеджмент, Менеджмент организации, Предпринимательство, Программирование, Реклама и PR, Спорт и туризм, Статистика, Стратегический маркетинг, Стратегический менеджмент, Экономические дисциплины', 'Active', 'writer', '', '', '', 0, '0', 1, '', '', '', '', '', ''),
(562, 3731, '', '', ', 407, 408, 409, 416, 417, 425, 434, 437, 442, 443, 467, 482', '', '', 'Инна', 'Инна', 'Украинская', NULL, 'false', '1534789739', '1992 - 1995гг училась в 	Шахтерском торговом техникуме. Красный диплом	 Специальность Товаровед прод. товаров\r\n1995-2000 гг. училась в	Донецком политехническом университете по специальности - 	Экономист - менеджер.\r\nвыполняю работы 20 лет\r\n', '', NULL, '', NULL, NULL, NULL, 'inn-ukrainskay@yandex.ru', '62c8ad0a15d9d1ca38d5dee762a16e01', '+380971520121', '', 'MLA', '5167-9855-0009-6615', NULL, 'Анализ, Антикризисное управление, Аудит бух и управленческий учет, АХД, Банк и инвестиционный менеджмент, Банковское дело, Банкротство, Бизнес-планирование, Бухучет и статистика, ВСТИ, Внешнеэконом деятельность (ВЭД), Деньги кредит банки, ДКБ (деньги кредит банки), Инвестиционный менеджмент, Инвестиция, Коммерческая деятельность, Конфликтология, Логистика, Макроэкономика, Маркетинг, Международные отношения, Менеджмент, Менеджмент  качества, Менеджмент организации, Микроэкономика, Мировая  экономика, Налоги, Организация труда, Организация труда и производства, Основы предпринимательства, Охрана труда, Предпринимательство, Промышленность, Разное, Статистика, Страхование, Судебная бухгалтерия, Теория государства и права, Товароведение, Торговля, Транспорт, Украинский язык и литература, Управление затратами, Управление логистикой, Управление персоналом (HR), Управление проектами, Управленческие исследования, Управленческий учёт, Финансы, Финансы и кредит, Цены и ценообразование, Экономика, Экономика предприятия, Экономическая теория, Экономические дисциплины, Экономический анализ', 'Active', 'writer', '', '', '', 0, '0', 1, '', '', '', '', '', ''),
(563, 3732, '', '', '', '', '', 'Татьяна', 'Татьяна', 'Потапова', NULL, 'false', '1535650556', '', '', NULL, '', NULL, NULL, NULL, 'ptv975@gmail.com', '52d85ced4967c9ef680bb98c2d4079a1', '0933726492', '', 'MLA', '4149-4378-5441-1541', NULL, 'Дошкольная педагогика, Конфликтология, Культурология, Логопедия, Математика, Менеджмент, Педагогика, Политология, Психология, Социальная работа, Социология, Украинский язык и литература, Философия, Этика и эстетика', 'Active', 'writer', '', '', '', 0, '0', 1, '', '', '', '', '', ''),
(564, 3733, '', '', ', 425, 434, 437, 443, 467, 482', '', '', 'Оксана', 'Оксана', 'Рачук', NULL, 'false', '1532955486', '', '', NULL, '', NULL, NULL, NULL, 'by.ksyusha.rachuk@gmail.com', 'bda89c668f02a3cc7aa5a103103d204e', '0672722393', '', 'MLA', '5168-7554-2379-7816', NULL, 'Анализ, Аудит бух и управленческий учет, Банк и инвестиционный менеджмент, Банковское дело, Бизнес-планирование, Бухучет и статистика, Деньги кредит банки, ДКБ (деньги кредит банки), Коммерческая деятельность, Международные отношения, Менеджмент организации, Микроэкономика, Мировая  экономика, Налоги, Социология, Управление персоналом (HR), Управленческий учёт, Финансы, Финансы и кредит, Экономика, Экономика предприятия, Экономическая теория, Экономические дисциплины, Экономический анализ', 'Active', 'writer', '', '', '', 0, '0', 1, '', '', '', '', '', ''),
(565, 3734, '', '', ', 467', '', '', 'Татьяна', 'Татьяна', 'Горбач', NULL, 'false', '1535447907', 'Опыт написания студенческих работ -7 лет', '', NULL, '', NULL, NULL, NULL, 'tag_m@ukr.net', '1e0f380eb0efd423b9756c05404246fc', '+380939951704', '', 'MLA', '5457-0822-3616-4906', NULL, 'Геополитика\r\n, Гостиничное дело, Маркетинг, Менеджмент, Менеджмент организации, Мировая  экономика, Реклама и PR, Стратегический маркетинг, Стратегический менеджмент, Туризм, Управление персоналом (HR)', 'Active', 'writer', '', '', '', 0, '0', 1, '', '', '', '', '', ''),
(566, 3735, '', '', ', 411, 441, 464', '', '', 'Игорь', 'Игорь', 'Ососков', NULL, 'false', '1533023811', 'По образованию инженер градостроения, за плечами более 200 студенческих работ.', '', NULL, '', NULL, NULL, NULL, 'freeze911@i.ua', '0ed08f8509996d40f23788e2a0d7b2c8', '+380632877414', '', 'MLA', '4149-6293-9363-3037', NULL, 'Английский язык, Архитектура, Астрономия, География, Дизайн\r\n, Журналистика, История, Маркетинг, Строительство, Философия, Экология', 'Active', 'writer', '', '', '', 0, '0', 0, '', '', '', '', '', ''),
(567, 3736, '3738', '27.08.2018 23:11:54', '', '', '', 'заказчик Nik', '', 'sadsad', NULL, 'false', '1535526185', '', '', NULL, '', NULL, NULL, NULL, 'nikolayveronika1@ukr.net', 'e10adc3949ba59abbe56e057f20f883e', '380973872646', '', NULL, '', NULL, '', 'Active', 'client', '', '', '', 0, '0', 0, '', '', '', '', '', ''),
(568, 3737, '3738', '27.08.2018 23:11:07', ', 408, 409, 410, 411, 412, 413, 414, 415, 416, 417, 418, 419, 420, 421, 422, 423, 424, 425, 426, 427, 428, 429, 430, 431, 432, 433, 434, 435, 436, 437, 438, 439, 440, 441, 442, 443, 444, 445, 446, 447, 448, 449, 450, 451, 452, 453, 454, 455, 456, 457, 458, 459, 460, 461, 462, 463, 464, 465, 466, 467, 468, 469, 470, 471, 472, 473, 474, 475, 476, 477, 478, 479, 480, 481, 482, 483, 484, 485, 486, 487, 488, 489, 490, 491, 492, 493, 494, 495, 496, 497, 498, 499', '', ', 437, 449, 449, 449, 449', 'автор Nik', 'автор-nik', 'aasdasd', NULL, 'false', '1535689105', '', '', NULL, '', NULL, NULL, NULL, 'nikolayveronika2@ukr.net', 'e10adc3949ba59abbe56e057f20f883e', '380973872646', '', 'MLA', '9988-7766-5544-3322', NULL, 'АПП (Автоматизация производственных процессов), Административное право, Анализ, Анатомия, Английский язык, Антикризисное управление, Архитектура, Астрономия, Аудит бух и управленческий учет, АХД, Банк и инвестиционный менеджмент, Банковское дело, Банкротство, БЖД, Бизнес-планирование, Биология, Бухучет и статистика, ВСТИ, Внешнеэконом деятельность (ВЭД), География, Геодезия, Геополитика\r\n, Гидравлика, Гостиничное дело, Гражданское право\r\n, Графика, Делопроизводство, Деньги кредит банки, Детали машин, Дизайн\r\n, ДКБ (деньги кредит банки), Дошкольная педагогика, Жилищное право, Журналистика, Земельное право, Здравоохранение, Инвестиционный менеджмент, Инвестиция, Инженерная графика, Иностранные языки, Информатика, Информатика и программирование, История, Искусство, Коммерческая деятельность, Компьютерные сети и телекоммуникации, Конфликтология, Конституционное право, Криминалистика, Криминология, Кулинария, Культура и искусство, Культурология, Лингвистика, Литература, Логика, Логистика, Логопедия, Макроэкономика, Маркетинг, Математика, Материаловедение, Машиностроение, Медицина, Международные отношения, Международное право , Менеджмент, Менеджмент  качества, Менеджмент организации, Механика, Микроэкономика, Мировая  экономика, Муниципальное право, Налоги, Немецкий язык, Организация труда, Организация труда и производства, Основы конструирования, Основы предпринимательства, Охрана природы, Охрана труда, Педагогика, Педиатрия, Политология, Право, Право Европейского союза, Предпринимательство, Предприятие, Программирование, Производство, Промышленность, Процессы и апп пищевой пром, Психология, Радиосвязь и радиотехника, Разное, Реклама и PR, Русский язык и литература, Сельское хозяйство, Семейное право, Сист передачи и сист коммутации, Сопромат, Социальная работа, Социология, Спорт и туризм, Статистика, Стратегический маркетинг, Стратегический менеджмент, Стандартизация , Страхование, Строительство, Судебная бухгалтерия, Телекоммуникация, Теоретическая механика, Теория государства и права, Теория машин и механизмов (тмм), Теплотехника, Теплоэнергетика, Технические, Технология машиностроения, Товароведение, Торговля, Транспорт, Трудовое право, Туризм, Уголовное право, Уголовный процесс, Украинский язык и литература, Управление затратами, Управление логистикой, Управление персоналом (HR), Управление проектами, Управленческие исследования, Управленческий учёт, Физика, Физкультура и спорт, Филология, Философия, Финансы, Финансы и кредит, Французский язык, Химия, Химия и физика, Хирургия, Цены и ценообразование, Черчение, Экология, Экономика, Экономика предприятия, Экономическая теория, Экономические дисциплины, Экономический анализ, Экскурсоведение, Электроника и радиотехника, Электротехника, Электроэнергетика, Энергетика, Энергосбережение, Этика и эстетика, Юридические дисциплины, Юриспруденция', 'Active', 'writer', '', '', '', 0, '0', 1, '', '', '', '', '', ''),
(569, 3738, '', '', ', 410, 411, 412, 413', '', '', 'Менеджер Nik', 'Менеджер-nik', 'aASDd', NULL, 'false', '1533075638', '', '', NULL, '', NULL, NULL, NULL, 'nikolayveronika3@ukr.net', 'e10adc3949ba59abbe56e057f20f883e', '380973872646', '', 'MLA', '1122-3344-5566-7788', NULL, '', 'Active', 'writer', 'admin', '', '', 0, '0', 1, ', 495, 496, 497, 498, 499', ', 496, 498, 498, 492, 492, 499, 499', ', 495, 495, 495, 492, 492, 492, 492, 495, 495, 495, 495, 491, 489, 495, 489, 495, 495, 489, 489, 495, 495, 495, 495, 498, 498, 498, 498, 498, 498, 498, 498, 498, 498, 498, 498, 498, 498, 498, 498, 498, 498, 498, 437, 486, 499, 499, 499, 499, 499, 499, 465, 441, 495, 465, 465', ', 3798, 3799, 3800, 3801, 3802, 3802, 3802', '', ''),
(570, 3739, '', '', '', '', '', 'Снежана', 'Снежана', 'Чорнобай', NULL, 'false', '1533121009', '', '', NULL, '', NULL, NULL, NULL, 'Snejana.Chornobay@gmail.com', '266b583a0282547796a4a529f61e86b6', '380682788973', '', 'MLA', '5168-7573-4637-2388', NULL, 'Жилищное право, Коммерческая деятельность, Культура и искусство, Культурология, Логика, Сельское хозяйство', 'Active', 'writer', '', '', '', 0, '0', 0, '', '', '', '', '', ''),
(571, 3740, '', '', '', '', '', 'Влада', '', 'Дидкивская', NULL, 'false', '1533204500', '', '', NULL, '', NULL, NULL, NULL, 'vlada.didkivskaya.99@gmail.com', '05a35210c60f3632cc234b970c025812', '0663607573', '', NULL, '', NULL, '', 'Active', 'client', '', '', '', 0, '0', 1, '', '', '', '', '', ''),
(572, 3741, '', '', ', 468', '', '', 'Лілія', 'Лілія', 'Попович', NULL, 'false', '1534687029', '', '', NULL, '', NULL, NULL, NULL, 'chogutka@ukr.net', '98ad38357b8fe2e8606d1539bb97278c', '0935521227', '', 'MLA', '4149-4993-4020-8485', NULL, 'Анатомия, БЖД, Биология, География, Дошкольная педагогика, Здравоохранение, Охрана природы, Педагогика, Разное, Туризм, Экология', 'Active', 'writer', '', '', '', 0, '0', 1, '', '', '', '', '', ''),
(573, 3742, '', '', ', 416, 417, 425, 434, 437, 442, 443, 467, 482', '', ', 467', 'Леся', 'Леся', 'Танасюк', NULL, 'false', '1535471100', 'Преподаватель каф Международных экономических оношений Хмельницкий наиональный университет, аспирант', '', NULL, '', NULL, NULL, NULL, 'Tanasyuk.vip@gmail.com', 'f8996ae8de812fc69214eeb90456a87d', '0967393784', '', 'MLA', '5168-7427-2079-0959', NULL, 'АХД, Банк и инвестиционный менеджмент, Банковское дело, Банкротство, Бизнес-планирование, Внешнеэконом деятельность (ВЭД), Гостиничное дело, Деньги кредит банки, Инвестиционный менеджмент, Коммерческая деятельность, Логистика, Маркетинг, Международные отношения, Менеджмент, Менеджмент организации, Микроэкономика, Мировая  экономика, Налоги, Организация труда, Основы предпринимательства, Предпринимательство, Предприятие, Производство, Стратегический маркетинг, Стратегический менеджмент, Страхование, Товароведение, Управление персоналом (HR), Управление проектами, Финансы, Финансы и кредит, Экономика, Экономика предприятия, Экономическая теория, Экономические дисциплины, Экономический анализ', 'Active', 'writer', '', '', '', 0, '0', 1, '', '', '', '', '', ''),
(574, 3743, '', '', ', 467', '', '', 'Виктор', 'Виктор', 'Дондук', NULL, 'false', '1533202735', '', '', NULL, '', NULL, NULL, NULL, 'donduk.v@ukr.net', '040306a0f825fe45efb6533f2277be03', '0732196022', '', 'MLA', '5168-7554-2612-5320', NULL, 'Аудит бух и управленческий учет, Банковское дело, Деньги кредит банки, Налоги, Немецкий язык, Охрана труда, Страхование, Украинский язык и литература, Физика, Финансы, Финансы и кредит, Экономика предприятия', 'Active', 'writer', '', '', '', 0, '0', 0, '', '', '', '', '', ''),
(576, 3745, '', '', ', 418, 419, 426, 427, 433, 495', '', '', 'Данилюк', 'Данилюк', 'Светлана', NULL, 'false', '1534847700', '', '', NULL, '', NULL, NULL, NULL, 'gromova.svtlana@ukr.net', 'ccce9cf6e18554f15b57c0b185fe1108', '0509680130', '', 'MLA', '5168-7573-1944-9791', NULL, 'Административное право, БЖД, Биология, География, Геополитика\r\n, Гражданское право\r\n, Дошкольная педагогика, Журналистика, История, Искусство, Конфликтология, Конституционное право, Криминология, Культура и искусство, Лингвистика, Литература, Педагогика, Политология, Право', 'Active', 'writer', '', '', '', 0, '0', 1, '', '', '', '', '', '');
INSERT INTO `writers` (`id`, `writer_id`, `sup_manager`, `last_tech_message`, `prof_ord_notices`, `oth_bids_notice`, `wr_files_notice`, `firstname`, `slug`, `lastname`, `gender`, `viewed`, `online`, `text`, `profile_img`, `country`, `streetaddress`, `zip`, `city`, `state`, `email`, `password`, `primaryphone`, `availability`, `citation`, `nativelanguage`, `academiclevel`, `subject`, `writer_status`, `user_level`, `writer_level`, `manager_fine`, `admin_level`, `mystatus`, `subscription`, `loggedin`, `mngr_neworder`, `mngr_new_order_files`, `mngr_new_order_bid`, `mngr_newuser`, `mngr_wait_accept`, `mngr_new_order_mes`) VALUES
(577, 3746, '', '', '', '', '', 'Людмила', 'Людмила', 'Литвиненко', NULL, 'false', '1533561310', '', '', NULL, '', NULL, NULL, NULL, 'Lytvynenko_li@ukr.net', 'a4a6fb364f85661df87c8e494216eac9', '+380955008328', '', 'MLA', '5168-7427-0263-6261', NULL, 'Бухучет и статистика, Информатика, Математика', 'Active', 'writer', '', '', '', 0, '0', 0, '', '', '', '', '', ''),
(578, 3747, '', '', ', 417, 437, 441, 442, 443, 467, 482', '', '', 'Елена', 'Елена', 'Сергеева', NULL, 'false', '1535535895', 'преподаватель ВНЗ', '', NULL, '', NULL, NULL, NULL, 'sds963@ukr.net', '654e678102f68db29fd7be49b53054f6', '0677791409', '', 'MLA', '5168-7427-0139-2478', NULL, 'Анализ, Антикризисное управление, АХД, Банк и инвестиционный менеджмент, Банковское дело, Банкротство, Бизнес-планирование, Бухучет и статистика, Внешнеэконом деятельность (ВЭД), Гостиничное дело, Делопроизводство, Деньги кредит банки, ДКБ (деньги кредит банки), Инвестиционный менеджмент, Инвестиция, Коммерческая деятельность, Культурология, Логистика, Макроэкономика, Маркетинг, Международные отношения, Менеджмент, Менеджмент  качества, Менеджмент организации, Микроэкономика, Мировая  экономика, Организация труда, Основы предпринимательства, Политология, Предпринимательство, Производство, Реклама и PR, Социология, Статистика, Стратегический маркетинг, Стратегический менеджмент, Страхование, Торговля, Транспорт, Туризм, Управление затратами, Управление логистикой, Управленческий учёт, Философия, Финансы, Финансы и кредит, Цены и ценообразование, Экономика, Экономика предприятия, Экономическая теория, Экономические дисциплины, Экономический анализ', 'Active', 'writer', '', '', '', 0, '0', 1, '', '', '', '', '', ''),
(579, 3748, '', '', ', 424, 428, 436, 438, 440, 441, 464, 465, 490, 495, 499', '', '', 'Мария', 'Мария', 'Красенко', NULL, 'false', '1534162568', 'Автор студенческих работ с 4-х летним стажем работы. Сопровождаю работу с момента заказа до момента окончательной сдачи научному руководителю.', '', NULL, '', NULL, NULL, NULL, 'mariashvets@ukr.net', '9b8403a3bd20bf17dc3e7123e4c4d983', '380977462138', '', 'MLA', '5168-7573-3906-5171', NULL, 'Административное право, Английский язык, Астрономия, БЖД, Биология, География, Гражданское право\r\n, Делопроизводство, Жилищное право, Земельное право, История, Искусство, Конституционное право, Криминалистика, Криминология, Культура и искусство, Культурология, Литература, Логика, Международные отношения, Международное право , Муниципальное право, Охрана природы, Охрана труда, Политология, Право, Право Европейского союза, Психология, Семейное право, Социология, Теория государства и права, Трудовое право, Уголовное право, Уголовный процесс, Физика, Философия, Химия, Химия и физика, Экология, Этика и эстетика, Юридические дисциплины, Юриспруденция', 'Active', 'writer', '', '', '', 0, '0', 1, '', '', '', '', '', ''),
(580, 3749, '', '08.08.2018 21:03:51', ', 441, 465, 467, 468, 482, 490, 495, 499', '', '', 'Алеся', 'Алеся', 'Киселева', NULL, 'false', '1535331713', 'На данный момент нахожусь в декретном отпуске, по образованию деловод, за последние 10 лет работала на производстве инженером по охране труда и ТБ и по совмещению главным аудитором системы контроля качества. Написанием студенческих работ работ в качестве хобби занимаюсь около 10 лет, более профессионально около 5-ти лет. ', '', NULL, '', NULL, NULL, NULL, 'servistv100@meta.ua', 'c5408239f399edfc95ba11cd6c9b62ba', '096-257-88-73', '', 'MLA', '4731-2171-1331-4296', NULL, 'Административное право, Анализ, Анатомия, Аудит бух и управленческий учет, Банк и инвестиционный менеджмент, Биология, Внешнеэконом деятельность (ВЭД), Гражданское право\r\n, Делопроизводство, Деньги кредит банки, Дошкольная педагогика, Жилищное право, Земельное право, Здравоохранение, Инвестиционный менеджмент, Инвестиция, История, Искусство, Коммерческая деятельность, Конституционное право, Кулинария, Культура и искусство, Культурология, Логистика, Макроэкономика, Маркетинг, Международные отношения, Международное право , Менеджмент, Менеджмент  качества, Менеджмент организации, Микроэкономика, Мировая  экономика, Муниципальное право, Налоги, Организация труда, Организация труда и производства, Охрана природы, Охрана труда, Право, Право Европейского союза, Предпринимательство, Предприятие, Производство, Семейное право, Социальная работа, Социология, Спорт и туризм, Стратегический маркетинг, Стратегический менеджмент, Страхование, Теория государства и права, Товароведение, Торговля, Трудовое право, Туризм, Управление логистикой, Управление персоналом (HR), Управленческий учёт, Философия, Экология, Экономика, Экономическая теория, Экономические дисциплины, Этика и эстетика, Юридические дисциплины, Юриспруденция', 'Active', 'writer', '', '', '', 0, '0', 1, '', '', '', '', '', ''),
(581, 3750, '', '', ', 426, 427, 433, 441', '', '', 'Татьяна', 'Татьяна', 'Мельниченко', NULL, 'false', '1535684866', 'Татьяна, 39 лет. Педагогическое образование, магистратура.', '', NULL, '', NULL, NULL, NULL, 'tanya.m79@ukr.net', '376c43878878ac04e05946ec1dd7a55f', '0972979980', '', 'MLA', '4149-4978-6630-5073', NULL, 'Астрономия, БЖД, Биология, География, Гостиничное дело, Делопроизводство, Дошкольная педагогика, Журналистика, Информатика, История, Искусство, Компьютерные сети и телекоммуникации, Кулинария, Культура и искусство, Культурология, Лингвистика, Литература, Логика, Логистика, Логопедия, Математика, Материаловедение, Педагогика, Политология, Психология, Разное, Русский язык и литература, Сельское хозяйство, Семейное право, Социальная работа, Социология, Спорт и туризм, Туризм, Украинский язык и литература, Управление персоналом (HR), Филология, Философия, Финансы, Экология, Этика и эстетика', 'Active', 'writer', '', '', '', 0, '0', 1, '', '', '', '', '', ''),
(582, 3751, '', '', ', 490, 491, 492, 493, 494, 495, 496, 497, 498, 499', '', '', 'Ирина', 'Ирина', 'Логозяк ', NULL, 'false', '1535540756', '', '', NULL, '', NULL, NULL, NULL, 'iren1982k@gmail.com', '39fd3bba44f2dca336c51fbd39e8a7ba', '0950417442', '', 'MLA', '5168-7555-2641-5571', NULL, 'АПП (Автоматизация производственных процессов), Административное право, Анализ, Анатомия, Антикризисное управление, Архитектура, Астрономия, Банк и инвестиционный менеджмент, Банковское дело, Банкротство, БЖД, Биология, Внешнеэконом деятельность (ВЭД), География, Геодезия, Геополитика\r\n, Гидравлика, Гостиничное дело, Гражданское право\r\n, Графика, Делопроизводство, Деньги кредит банки, Детали машин, Дизайн\r\n, ДКБ (деньги кредит банки), Дошкольная педагогика, Жилищное право, Журналистика, Земельное право, Здравоохранение, Инвестиционный менеджмент, Инвестиция, Инженерная графика, Иностранные языки, Информатика и программирование, История, Искусство, Коммерческая деятельность, Компьютерные сети и телекоммуникации, Конфликтология, Конституционное право, Криминалистика, Криминология, Культура и искусство, Культурология, Лингвистика, Литература, Логика, Логистика, Логопедия, Маркетинг, Материаловедение, Машиностроение, Медицина, Международные отношения, Международное право , Менеджмент, Менеджмент  качества, Менеджмент организации, Механика, Микроэкономика, Мировая  экономика, Муниципальное право, Организация труда, Организация труда и производства, Основы конструирования, Основы предпринимательства, Охрана природы, Охрана труда, Педагогика, Педиатрия, Политология, Право, Право Европейского союза, Предпринимательство, Предприятие, Программирование, Производство, Промышленность, Процессы и апп пищевой пром, Психология, Разное, Реклама и PR, Сельское хозяйство, Семейное право, Сист передачи и сист коммутации, Социальная работа, Социология, Спорт и туризм, Статистика, Стратегический маркетинг, Стратегический менеджмент, Стандартизация , Страхование, Строительство, Судебная бухгалтерия, Телекоммуникация, Теория государства и права, Теория машин и механизмов (тмм), Теплотехника, Технология машиностроения, Товароведение, Торговля, Транспорт, Трудовое право, Туризм, Уголовное право, Уголовный процесс, Украинский язык и литература, Управление затратами, Управление логистикой, Управление персоналом (HR), Управление проектами, Управленческие исследования, Управленческий учёт, Физкультура и спорт, Филология, Философия, Хирургия, Цены и ценообразование, Экология, Экономика, Экономика предприятия, Экономическая теория, Экономические дисциплины, Экономический анализ, Экскурсоведение, Электроэнергетика, Энергетика, Энергосбережение, Этика и эстетика, Юридические дисциплины, Юриспруденция', 'Active', 'writer', '', '', '', 0, '0', 1, '', '', '', '', '', ''),
(583, 3752, '', '', ', 422, 424, 426, 427, 428, 433, 436, 438, 440, 441, 442, 465, 490, 499', '', '', 'Екатерина', 'Екатерина', 'Широкоступ', NULL, 'false', '1535544782', '', '', NULL, '', NULL, NULL, NULL, 'kate2404@ukr.net', 'eba9eb56eebdae21ce21f74e46e47319', '0672046537', '', 'MLA', '4149-4391-0773-6203', NULL, 'Банкротство, Биология, Гостиничное дело, Гражданское право\r\n, Делопроизводство, Жилищное право, Земельное право, Конфликтология, Конституционное право, Криминалистика, Криминология, Культура и искусство, Культурология, Литература, Логика, Международное право , Муниципальное право, Организация труда, Организация труда и производства, Основы предпринимательства, Охрана природы, Охрана труда, Педагогика, Политология, Право, Право Европейского союза, Предприятие, Психология, Разное, Семейное право, Социология, Судебная бухгалтерия, Теория государства и права, Трудовое право, Уголовное право, Уголовный процесс, Украинский язык и литература, Философия, Юридические дисциплины, Юриспруденция', 'Active', 'writer', '', '', '', 0, '0', 1, '', '', '', '', '', ''),
(584, 3753, '', '', '', '', '', 'Аліна Колесник', '', NULL, NULL, 'false', '1535572710', '', 'IMG_8989_Extracted.JPG', NULL, '', NULL, NULL, NULL, 'ali827@ukr.net', 'f17be5d293e1306a8e8f4fc1315d85c6', '380983991753', '', NULL, '', NULL, '', 'Active', 'client', '', '', '', 0, '0', 1, '', '', '', '', '', ''),
(585, 3754, '', '', '', '', '', 'Катерина', 'Катерина', 'Таєр-Ульянова', NULL, 'false', '1534951938', 'Контрольні та курсові з фізичної та колоїдної хімії. Задачі з шкільного курсу фізики і хімії.', '', NULL, '', NULL, NULL, NULL, 'ekaterinataer@gmail.com', '823314b3258a3398ed5847bfeae1e964', '0973520043', '', 'MLA', '4149-4978-6466-4265', NULL, 'Химия и физика', 'Active', 'writer', '', '', '', 0, '0', 1, '', '', '', '', '', ''),
(586, 3755, '', '', '', '', '', 'тест', '', 'тест', NULL, 'false', '1534101724', '', '', NULL, '', NULL, NULL, NULL, 'rabota181184@gmail.com', '2c019483c654263efb7e7de278668a63', '380963720000', '', NULL, '', NULL, '', 'Active', 'client', '', '', '', 0, '0', 0, '', '', '', '', '', ''),
(587, 3756, '', '', '', '', '', 'Анжела', '', 'Иванова', NULL, 'false', '1534751737', '', '', NULL, '', NULL, NULL, NULL, 'anzhelika.gart2014@yandex.ru', 'a39cda9ce6b05d0c5a8294847da8f7e6', '380963151931', '', NULL, '', NULL, '', 'Active', 'client', '', '', '', 0, '0', 1, '', '', '', '', '', ''),
(588, 3757, '', '', ', 456, 457, 458, 459, 460, 461, 462, 463, 466, 469, 470, 471, 472, 473, 474, 475, 476, 477, 478, 479, 480, 481, 483, 484, 485, 486, 487, 488, 489, 491, 492, 493, 494, 496, 497, 498', '', '', 'Владимир', 'Владимир', 'Подтыкало', NULL, 'false', '1535024507', '', '', NULL, '', NULL, NULL, NULL, 'Vova_elektro@mail.ru', 'df0bf8661bf4586fa4397ba3f376161c', '+48578622223', '', 'MLA', '5168-7573-4014-6739', NULL, 'АПП (Автоматизация производственных процессов), Математика, Промышленность, Сопромат, Теоретическая механика, Теория машин и механизмов (тмм), Теплотехника, Теплоэнергетика, Технические, Физика, Черчение, Электротехника, Электроэнергетика, Энергетика, Энергосбережение', 'Active', 'writer', '', '', '', 0, '0', 1, '', '', '', '', '', ''),
(589, 3758, '', '', ', 426, 427, 428, 433, 436, 438, 440, 441, 465, 467, 468, 490, 495, 499', '', '', 'Александра', 'Александра', 'Мишкевич', NULL, 'false', '1534262620', '', '', NULL, '', NULL, NULL, NULL, 'oleksandramyshkevych@gmail.com', '440efb5f2876c7ab6f57a2043c661683', '+38(068)-332-96-31', '', 'MLA', '4149-4991-1499-8717', NULL, 'Административное право, Анатомия, Архитектура, БЖД, Биология, География, Гражданское право\r\n, Жилищное право, Журналистика, Земельное право, История, Искусство, Конфликтология, Конституционное право, Криминалистика, Криминология, Кулинария, Культура и искусство, Культурология, Литература, Логика, Организация труда, Охрана природы, Охрана труда, Педагогика, Политология, Право, Право Европейского союза, Психология, Разное, Реклама и PR, Русский язык и литература, Сельское хозяйство, Семейное право, Социология, Спорт и туризм, Судебная бухгалтерия, Теория государства и права, Трудовое право, Туризм, Уголовное право, Уголовный процесс, Украинский язык и литература, Управление персоналом (HR), Физкультура и спорт, Филология, Философия, Экология, Экономика, Экономическая теория, Этика и эстетика, Юридические дисциплины, Юриспруденция', 'Active', 'writer', '', '', '', 0, '0', 1, '', '', '', '', '', ''),
(590, 3759, '', '', '', '', '', 'Анастасія', '', 'Міхеєва', NULL, 'false', '1534252110', '', '', NULL, '', NULL, NULL, NULL, 'miheevan37@gmail.com', 'ec14eb0ee2b104b04d35ad2d72be76a9', '380993606703', '', NULL, '', NULL, '', 'Active', 'client', '', '', '', 0, '0', 0, '', '', '', '', '', ''),
(591, 3760, '', '', '', '', '', 'Marko', '', 'Shulz', NULL, 'false', '1534495047', '', '', NULL, '', NULL, NULL, NULL, 'Wantedcr7@me.com', 'da4986a625976ade86f82c9fb21153f6', '+380993062198', '', NULL, '', NULL, '', 'Active', 'client', '', '', '', 0, '0', 1, '', '', '', '', '', ''),
(592, 3761, '', '', '', '', '', 'Паша', 'Паша', 'Лысый', NULL, 'false', '1534332775', 'Студент киевского политехнический института, факультет прикладной математики, кафедра прикладная математика, специализация наука про данные и математическое моделирования ', '', NULL, '', NULL, NULL, NULL, 'oksiiv@ukr.net', 'c49b8dfbb9cb150d1be606f81bbd4bb9', '0505612764', '', 'MLA', '5167-4901-5634-5770', NULL, 'Информатика и программирование, Логика, Математика, Физика, Химия и физика', 'Active', 'writer', '', '', '', 0, '0', 0, '', '', '', '', '', ''),
(594, 3762, '3548', '30.08.2018 19:42:24', '', '', '', 'vlad', '', 'zakaz', NULL, 'false', '1535701998', '', '', NULL, '', NULL, NULL, NULL, 'daredevilvue@gmail.com', '4297f44b13955235245b2497399d7a93', '1231231', '', NULL, '', NULL, '', 'Active', 'client', 'writer', '', '', 0, '0', 1, '', '', '', '', '', ''),
(595, 3763, '', '24.08.2018 13:42:21', ', 436, 438, 440, 441, 442, 464, 465, 467, 468, 490, 499', '', '', 'Марина', 'Марина', 'Остроухова', NULL, 'false', '1535107339', '', '', NULL, '', NULL, NULL, NULL, '22marishka01@gmail.com', '4eb4d5cc71c6da1a0d8fb17cf82a8cde', '0662220545', '', 'MLA', '5168-7554-1975-1991', NULL, 'Анатомия, Английский язык, Астрономия, Банкротство, Биология, Внешнеэконом деятельность (ВЭД), География, Гостиничное дело, Гражданское право\r\n, Графика, Деньги кредит банки, Дизайн\r\n, Дошкольная педагогика, Жилищное право, Журналистика, Земельное право, Здравоохранение, Инвестиционный менеджмент, Инвестиция, Иностранные языки, Информатика, История, Искусство, Коммерческая деятельность, Компьютерные сети и телекоммуникации, Конфликтология, Конституционное право, Криминалистика, Криминология, Кулинария, Культура и искусство, Культурология, Литература, Логика, Маркетинг, Медицина, Международные отношения, Международное право , Менеджмент, Менеджмент  качества, Менеджмент организации, Мировая  экономика, Муниципальное право, Налоги, Организация труда, Организация труда и производства, Основы предпринимательства, Охрана природы, Охрана труда, Педагогика, Право, Психология, Разное, Реклама и PR, Русский язык и литература, Семейное право, Социальная работа, Социология, Спорт и туризм, Стратегический маркетинг, Стратегический менеджмент, Стандартизация , Телекоммуникация, Теория государства и права, Товароведение, Торговля, Трудовое право, Туризм, Уголовное право, Уголовный процесс, Украинский язык и литература, Управление затратами, Управление персоналом (HR), Управление проектами, Управленческие исследования, Физкультура и спорт, Филология, Философия, Финансы, Финансы и кредит, Цены и ценообразование, Черчение, Экология, Экономика, Экономические дисциплины, Энергетика, Этика и эстетика, Юридические дисциплины, Юриспруденция', 'False', 'writer', '', '', '', 0, '0', 1, '', '', '', '', '', ''),
(596, 3764, '', '', '', '', '', 'Николай', '', 'Николаевич', NULL, 'false', '1534430444', '', '', NULL, '', NULL, NULL, NULL, 'adasdasdasddsadsa@ukr.net', 'e10adc3949ba59abbe56e057f20f883e', '380973872646', '', NULL, '', NULL, '', 'Active', 'client', '', '', '', 0, '0', 0, '', '', '', '', '', ''),
(597, 3765, '', '', '', '', '', 'Ilona', '', 'Afanaskina', NULL, 'false', '1534568698', '', '', NULL, '', NULL, NULL, NULL, 'ilonka_20082008@ukr.net', '062a6fb304f15961cf38b8eeb66a674e', '0635823937', '', NULL, '', NULL, '', 'Active', 'client', '', '', '', 0, '0', 0, '', '', '', '', '', ''),
(598, 3766, '', '', ', 438, 440, 441, 464, 465, 490, 495, 499', '', '', 'Алена', 'Алена', 'Юркив', NULL, 'false', '1535696370', 'Працюю в сфері написання студениських робіт протягом 10 років. Працюю з перекладами англ.-укр-рос.', '', NULL, '', NULL, NULL, NULL, 'lena_shvedik@ukr.net', '7feec6c60e1e705cbc3cecfb45e34c69', '0996440152', '', 'MLA', '5168-7572-9856-3950', NULL, 'Административное право, Английский язык, Гостиничное дело, Гражданское право\r\n, Делопроизводство, Дошкольная педагогика, Жилищное право, Журналистика, Земельное право, Иностранные языки, История, Искусство, Конфликтология, Конституционное право, Криминалистика, Криминология, Кулинария, Культура и искусство, Культурология, Лингвистика, Литература, Логопедия, Международное право , Муниципальное право, Педагогика, Политология, Право, Право Европейского союза, Русский язык и литература, Сельское хозяйство, Семейное право, Спорт и туризм, Теория государства и права, Трудовое право, Туризм, Уголовное право, Уголовный процесс, Украинский язык и литература, Филология, Философия, Экскурсоведение, Юридические дисциплины, Юриспруденция', 'Active', 'writer', '', '', '', 0, '0', 1, '', '', '', '', '', ''),
(599, 3767, '', '', ', 441, 464', '', '', 'Marina', 'marina', 'Kiseleva', NULL, 'false', '1535651793', 'Опыт работы автором студенческих работ - 5 лет. Высшее образование: Английский язык и зарубежная литература (бакалавр); Иностранная филология и перевод (магистр).', '', NULL, '', NULL, NULL, NULL, 'kismarinka93@gmail.com', '21e03a1b736fcb1986e35b39ce8dd27f', '+380665986252', '', 'MLA', '4149-4978-6622-0082', NULL, 'Английский язык, Дошкольная педагогика, Журналистика, Иностранные языки, Конфликтология, Культура и искусство, Культурология, Лингвистика, Литература, Логопедия, Международные отношения, Международное право , Немецкий язык, Охрана труда, Педагогика, Политология, Право, Право Европейского союза, Психология, Социальная работа, Социология, Телекоммуникация, Теория государства и права, Украинский язык и литература, Физкультура и спорт, Филология, Философия, Французский язык, Этика и эстетика', 'Active', 'writer', '', '', '', 0, '0', 1, '', '', '', '', '', ''),
(600, 3768, '', '', ', 468', '', '', 'Alina', 'alina', 'Kemerova', NULL, 'false', '1534779049', 'Студентка 4 курса медицинского факультета. Имею оконченное среднее специальное образование - фельдшер.', '', NULL, '', NULL, NULL, NULL, 'krialin13@gmail.com', '490e13dcf19bc94909deb47f25bb2f10', '0964880079', '', 'MLA', '5168-7554-2831-7867', NULL, 'Анатомия, Биология, Здравоохранение, Медицина, Педиатрия', 'Active', 'writer', '', '', '', 0, '0', 1, '', '', '', '', '', ''),
(601, 3769, '', '', '', '', '', '123123', '', '123123', NULL, 'false', '1534931604', '', '', NULL, '', NULL, NULL, NULL, 'youvovas@gmail.comA', '4297f44b13955235245b2497399d7a93', '123123', '', NULL, '', NULL, '', 'Active', 'client', '', '', '', 0, '0', 0, '', '', '', '', '', ''),
(602, 3770, '', '', '', '', '', '123123', '', '123123', NULL, 'false', '1535013004', '', '', NULL, '', NULL, NULL, NULL, '123123@ewqe123', '4297f44b13955235245b2497399d7a93', '31231231', '', NULL, '', NULL, '', 'Active', 'client', '', '', '', 0, '0', 0, '', '', '', '', '', ''),
(603, 3771, '', '', '', '', '', '123123', '', '123123', NULL, 'false', '1534934168', '', '', NULL, '', NULL, NULL, NULL, 'sadja@gmail.com', '4297f44b13955235245b2497399d7a93', '1123123', '', NULL, '', NULL, '', 'Active', 'client', '', '', '', 0, '0', 0, '', '', '', '', '', ''),
(604, 3772, '', '', '', '', '', '1231231', '', '123123', NULL, 'false', '1534944976', '', '', NULL, '', NULL, NULL, NULL, '6666@gmail.com', '4297f44b13955235245b2497399d7a93', '12312312', '', NULL, '', NULL, '', 'Active', 'client', '', '', '', 0, '0', 0, '', '', '', '', '', ''),
(605, 3773, '', '', ', 465, 490, 495, 499', '', '', 'Антонина', 'Антонина', 'Украина', NULL, 'false', '1535563972', '', '', NULL, '', NULL, NULL, NULL, 'ukraineantonina@gmail.com', 'd1a93c275e13c09063bff23b277cdd6b', '0938996349', '', 'MLA', '5168-7556-3231-3173', NULL, 'Административное право, Банковское дело, Гражданское право\r\n, Жилищное право, Земельное право, Конституционное право, Международное право , Муниципальное право, Налоги, Право, Право Европейского союза, Предпринимательство, Семейное право, Теория государства и права, Трудовое право, Уголовное право, Уголовный процесс, Юридические дисциплины, Юриспруденция', 'Active', 'writer', '', '', '', 0, '0', 1, '', '', '', '', '', ''),
(606, 3774, '', '', '', '', '', 'sdsdsd', '', 'sdsdsds', NULL, 'false', '', '', '', NULL, '', NULL, NULL, NULL, 'email@mail.ru', '4297f44b13955235245b2497399d7a93', '123123', '', NULL, '', NULL, '', 'Active', 'client', '', '', '', 0, '0', 0, '', '', '', '', '', ''),
(607, 3775, '', '', '', '', '', '123123', '', '123123', NULL, 'false', '1535013077', '', '', NULL, '', NULL, NULL, NULL, 'vas@gmail.com', '4297f44b13955235245b2497399d7a93', '12313', '', NULL, '', NULL, '', 'Active', 'client', '', '', '', 0, '0', 0, '', '', '', '', '', ''),
(608, 3776, '', '', '', '', '', 'qweqwe', '', 'qweqwe', NULL, 'false', '1535013853', '', '', NULL, '', NULL, NULL, NULL, 'va2s@gmail.com', '4297f44b13955235245b2497399d7a93', '1231231231', '', NULL, '', NULL, '', 'Active', 'client', '', '', '', 0, '0', 0, '', '', '', '', '', ''),
(609, 3777, '', '', '', '', '', '123123', '', '123123', NULL, 'false', '1535016729', '', '', NULL, '', NULL, NULL, NULL, 'vovas@gmail.com', '4297f44b13955235245b2497399d7a93', '123123', '', NULL, '', NULL, '', 'Active', 'client', '', '', '', 0, '0', 0, '', '', '', '', '', ''),
(610, 3778, '', '', '', '', '', 'Евгения', '', 'Бабий', NULL, 'false', '1535107128', '', '', NULL, '', NULL, NULL, NULL, 'mjthetawaves@gmail.com', '2467d3744600858cc9026d5ac6005305', '0951601118', '', NULL, '', NULL, '', 'Active', 'client', '', '', '', 0, '0', 0, '', '', '', '', '', ''),
(611, 3779, '', '', ', 467', '', '', 'Николай', 'Николай', 'Банник', NULL, 'false', '1535141543', 'Закончил физико-математический факультет Луганского национального педагогического университета имени Тараса Шевченко.\r\n\r\nДиплом с отличием.\r\n\r\nВыполняю работы по всему циклу математических дисциплин.\r\nСпециализируюсь на:\r\n\r\n- решении задач, контрольных, практических, лабораторных работ, курсовых проектов и работ, экзаменационных билетов по методам оптимизации, математическим методам в экономике, математическому программированию, теории оптимального управления, теории принятия решения, экономико-математическому моделированию и т.п.;\r\n\r\n- выполнении тестов, онлайн экзаменов по указанным дисциплинам.\r\n\r\nВыполняю качественно, быстро, в соответствии с Вашими требованиями.', '', NULL, '', NULL, NULL, NULL, 'zajaz25@meta.ua', '6fac89eea9b29198cc359ada6465c129', '+380508498536', '', 'MLA', '5168-7555-2120-1042', NULL, 'Математика, Экономика, Экономические дисциплины', 'Active', 'writer', '', '', '', 0, '0', 0, '', '', '', '', '', ''),
(612, 3780, '', '', ', 490, 499', '', '', 'Анна', 'Анна', 'чуйко', NULL, 'false', '1535279430', '', '', NULL, '', NULL, NULL, NULL, 'anikamararenko@gmail.com', '52f14c38404dc031234964a6e9814077', '0989496472', '', 'MLA', '5168-7573-5480-9371', NULL, 'Биология, География, Гражданское право\r\n, Иностранные языки, История, Искусство, Литература, Юридические дисциплины', 'Active', 'writer', '', '', '', 0, '0', 1, '', '', '', '', '', ''),
(613, 3781, '', '', ', 467', '', '', 'Галина', 'Галина', 'Яцишин', NULL, 'false', '1535295042', 'молода, амбіційна, готова до співпраці)', '', NULL, '', NULL, NULL, NULL, 'xarun1995@mail.ru', 'ac1c2750502766ab3c86203168cb2842', '0971468016', '', 'MLA', '5168-7573-0656-3323', NULL, 'Банк и инвестиционный менеджмент, Банковское дело, Деньги кредит банки, ДКБ (деньги кредит банки), Страхование, Управление затратами, Финансы, Финансы и кредит, Экономика, Экономические дисциплины', 'Active', 'writer', '', '', '', 0, '0', 0, '', '', '', '', '', ''),
(614, 3782, '3566', '28.08.2018 22:37:47', '', '', '', 'Вита', 'Вита', 'Безугла', NULL, 'false', '1535661422', 'Высшее педагогическое образование', '', NULL, '', NULL, NULL, NULL, 'vitochka1994love@gmail.com', 'e807f1fcf82d132f9bb018ca6738a19f', '380957288536', '', 'MLA', '5168-7573-6105-3202', NULL, 'Кулинария, Культура и искусство, Культурология, Лингвистика, Литература, Макроэкономика, Педагогика, Педиатрия, Политология, Психология, Радиосвязь и радиотехника, Этика и эстетика', 'Active', 'writer', '', '', '', 0, '0', 1, '', '', '', '', '', ''),
(615, 3783, '', '', ', 466, 467, 469, 470, 471, 472, 473, 474, 475, 476, 477, 478, 479, 480, 481, 482, 483, 484, 485, 486, 487, 488, 489, 490, 491, 492, 493, 494, 495, 496, 497, 498, 499', '', ', 467', 'Анна', 'Анна', 'Колтынюк', NULL, 'false', '1535456068', 'Получаю второе высшее образование. Первое в сфере дизайна одежды, второе в сфере менеджмента. Готова качественно и в срок выполнять работу.', '', NULL, '', NULL, NULL, NULL, 'annkoltynyuk@gmail.com', 'ad353c9ace4078f7c286cc68bf2c3523', '+380939320324', '', 'MLA', '4149-5001-7004-1456', NULL, 'АПП (Автоматизация производственных процессов), Административное право, Архитектура, Банковское дело, Бизнес-планирование, География, Геодезия, Гражданское право\r\n, Графика, Деньги кредит банки, Детали машин, ДКБ (деньги кредит банки), Дошкольная педагогика, Жилищное право, Журналистика, Земельное право, Здравоохранение, Инвестиционный менеджмент, Инвестиция, Инженерная графика, Информатика и программирование, Искусство, Коммерческая деятельность, Компьютерные сети и телекоммуникации, Конфликтология, Конституционное право, Криминалистика, Криминология, Кулинария, Культура и искусство, Культурология, Лингвистика, Литература, Логика, Логистика, Логопедия, Макроэкономика, Математика, Машиностроение, Менеджмент  качества, Менеджмент организации, Механика, Организация труда и производства, Основы конструирования, Основы предпринимательства, Охрана природы, Охрана труда, Педагогика, Педиатрия, Право Европейского союза, Предпринимательство, Предприятие, Психология, Радиосвязь и радиотехника, Реклама и PR, Русский язык и литература, Сельское хозяйство, Семейное право, Сист передачи и сист коммутации, Сопромат, Социология, Спорт и туризм, Статистика, Стратегический менеджмент, Стандартизация , Страхование, Строительство, Теоретическая механика, Теория государства и права, Теория машин и механизмов (тмм), Товароведение, Транспорт, Туризм, Уголовное право, Украинский язык и литература, Управление затратами, Управление персоналом (HR), Управление проектами, Управленческие исследования, Физкультура и спорт, Филология, Философия, Финансы, Финансы и кредит, Цены и ценообразование, Экология, Экономика, Экономическая теория, Экономический анализ, Экскурсоведение, Этика и эстетика, Юридические дисциплины, Юриспруденция', 'Active', 'writer', '', '', '', 0, '0', 1, '', '', '', '', '', ''),
(616, 3784, '', '', '', '', '', 'Дмитро', '', 'Кревський', NULL, 'false', '1535454676', '', '', NULL, '', NULL, NULL, NULL, 'dima030696@ukr.net', 'fb90327cf85796f73647a50809790ab3', '380992546740', '', NULL, '', NULL, '', 'Active', 'client', '', '', '', 0, '0', 1, '', '', '', '', '', ''),
(617, 3785, '', '', ', 482', '', '', 'Ірина', 'Ірина', 'Охріменко', NULL, 'false', '1535521087', '', '', NULL, '', NULL, NULL, NULL, 'oivokhririna@ukr.net', '379863569515c7d3c916e516df58bc75', '0669174145', '', 'MLA', '5168-7572-9543-0062', NULL, 'Анализ, Антикризисное управление, Банк и инвестиционный менеджмент, Банковское дело, Банкротство, Бизнес-планирование, Внешнеэконом деятельность (ВЭД), Деньги кредит банки, ДКБ (деньги кредит банки), Инвестиционный менеджмент, Инвестиция, Коммерческая деятельность, Логистика, Маркетинг, Международные отношения, Менеджмент, Менеджмент организации, Мировая  экономика, Налоги, Предприятие, Реклама и PR, Социология, Стратегический маркетинг, Стратегический менеджмент, Страхование, Туризм, Управление персоналом (HR), Финансы, Финансы и кредит, Цены и ценообразование, Экономика, Экономика предприятия, Экономическая теория, Экономические дисциплины, Экономический анализ', 'Active', 'writer', '', '', '', 0, '0', 1, '', '', '', '', '', ''),
(618, 3786, '', '', '', '', '', '3123123', '', '1231231', NULL, 'false', '1535448053', '', '', NULL, '', NULL, NULL, NULL, 'dasdas@gmail.com', '4297f44b13955235245b2497399d7a93', '123123123', '', NULL, '', NULL, '', 'Active', 'client', '', '', '', 0, '0', 0, '', '', '', '', '', ''),
(619, 3787, '', '', '', '', '', 'saSDSAD', '', 'qweqwe', NULL, 'false', '1535449704', '', '', NULL, '', NULL, NULL, NULL, 'vladimir@gmail.com', '4297f44b13955235245b2497399d7a93', '1223123123', '', NULL, '', NULL, '', 'Active', 'client', '', '', '', 0, '0', 0, '', '', '', '', '', ''),
(620, 3788, '', '', '', '', '', 'asdasd', '', 'asdasd', NULL, 'false', '1535450448', '', '', NULL, '', NULL, NULL, NULL, 'dimir@gmail.com', '96e79218965eb72c92a549dd5a330112', '123123', '', NULL, '', NULL, '', 'Active', 'client', '', '', '', 0, '0', 0, '', '', '', '', '', ''),
(621, 3789, '', '', '', '', '', '1231231', '', '123123', NULL, 'false', '1535450897', '', '', NULL, '', NULL, NULL, NULL, 'imir@gmail.com', '4297f44b13955235245b2497399d7a93', '123123', '', NULL, '', NULL, '', 'Active', 'client', '', '', '', 0, '0', 0, '', '', '', '', '', ''),
(622, 3790, '', '', '', '', '', '1', '', '2', NULL, 'false', '1535451476', '', '', NULL, '', NULL, NULL, NULL, 'ir@gmail.com', '4297f44b13955235245b2497399d7a93', '3312313123123', '', NULL, '', NULL, '', 'Active', 'client', '', '', '', 0, '0', 0, '', '', '', '', '', ''),
(623, 3791, '', '', '', '', '', 'asdasdas', '', 'qweqweqwe', NULL, 'false', '', '', '', NULL, '', NULL, NULL, NULL, 'adimir@gmail.com', '4297f44b13955235245b2497399d7a93', '231231', '', NULL, '', NULL, '', 'Active', 'client', '', '', '', 0, '0', 0, '', '', '', '', '', ''),
(624, 3792, '', '', '', '', '', '123123', '', '123123', NULL, 'false', '1535452527', '', '', NULL, '', NULL, NULL, NULL, 'n.vladimir@gmail.com', '4297f44b13955235245b2497399d7a93', '123123123', '', NULL, '', NULL, '', 'Active', 'client', '', '', '', 0, '0', 0, '', '', '', '', '', ''),
(625, 3793, '', '', '', '', '', 'Dgg', '', 'Fhv', NULL, 'false', '1535457453', '', '', NULL, '', NULL, NULL, NULL, 'Asd@mail.com', 'a8f5f167f44f4964e6c998dee827110c', '380931111111', '', NULL, '', NULL, '', 'Active', 'client', '', '', '', 0, '0', 0, '', '', '', '', '', ''),
(626, 3794, '', '', '', '', '', '12312', '', '123123', NULL, 'false', '1535463308', '', '', NULL, '', NULL, NULL, NULL, '123123@gmail.com', '4297f44b13955235245b2497399d7a93', '123123', '', NULL, '', NULL, '', 'Active', 'client', '', '', '', 0, '0', 0, '', '', '', '', '', ''),
(627, 3795, '', '', ', 495', '', '', 'ааа', 'ааа', 'ааа', NULL, 'false', '1535650128', '', '', NULL, '', NULL, NULL, NULL, 'avtor687@ukr.net', 'e10adc3949ba59abbe56e057f20f883e', '0679672177', '', 'MLA', '', NULL, '', 'Active', 'writer', 'writer', '', '', 0, '0', 1, '', '', '', '', '', ''),
(628, 3796, '', '', '', '', '', 'ааа', '', 'ааа', NULL, 'false', '1535523188', '', '', NULL, '', NULL, NULL, NULL, 'fff7084@ukr.net', 'e10adc3949ba59abbe56e057f20f883e', '222', '', NULL, '', NULL, '', 'Active', 'client', '', '', '', 0, '0', 0, '', '', '', '', '', ''),
(629, 3797, '', '', '', '', '', 'Вікторія', 'Вікторія', 'Рашковецька', NULL, 'false', '1535613199', 'Мене звати Вікторія, мені 23 роки. В лютому 2018 року я за закінчила Національній університет водного господарства та природокористування в м. Рівне (державний екзамен на ОКР бакалавр у 2016 році здала на 99 балів зі 100, ОКР Магістр за спеціальністю \\\"Водні біоресурси\\\" захистила в лютому 2018; отримала червоний диплом). На даний час працюю в спорідненій галузі в Дністровському басейновому управління водих ресурсів в м. Івано-Франківськ.\r\n        Протягом 6,5 років навчання в університеті займалася написанням рефератів, розрахукнових, описових та курсових робіт для студентів молодших курсів та однокурсників. \r\n         Також я досконало володію російською мовою, а отже, з легкістю візьмусь за переклад з російської на українську та навпаки.', '', NULL, '', NULL, NULL, NULL, 'Kusja0512@gmail.com', 'b1416a1adb0a20e6c9c7b27b8ce21d7e', '0961926466', '', 'MLA', '4149-4996-4178-3046', NULL, 'Биология, Разное, Экология', 'Active', 'writer', '', '', '', 0, '0', 0, '', '', '', '', '', ''),
(630, 3798, '', '', ', 495, 496, 497, 498', ', 495, 495', '', 'Avtorone', 'avtorone', 'Avtorone', NULL, 'false', '1535638726', '', '', NULL, '', NULL, NULL, NULL, 'onetest377@gmail.com', '9506214561f7b29c7c952b83a28a5036', '0930791111', '', 'MLA', '1234-1234-1234-1234', NULL, 'АПП (Автоматизация производственных процессов), Административное право, Анализ, Анатомия, Английский язык, Антикризисное управление, Архитектура, Астрономия, Аудит бух и управленческий учет, АХД, Банк и инвестиционный менеджмент, Банковское дело, Банкротство, БЖД, Бизнес-планирование, Биология, Бухучет и статистика, ВСТИ, Внешнеэконом деятельность (ВЭД), География, Геодезия, Геополитика\r\n, Гидравлика, Гостиничное дело', 'Active', 'writer', '', '', '', 0, '0', 0, '', '', '', '', '', ''),
(631, 3799, '', '', ', 495, 496, 497, 498', ', 495, 495', '', 'Testtwo', 'testtwo', 'Testtwo', NULL, 'false', '1535641523', '', '', NULL, '', NULL, NULL, NULL, 'testtwo123258@gmail.com', '79111d16854a99d50a59c31c13da3ac0', '0930792222', '', 'MLA', '1234-1234-1234-1235', NULL, 'АПП (Автоматизация производственных процессов), Административное право, Анализ, Анатомия, Английский язык, Антикризисное управление, Архитектура, Астрономия, Аудит бух и управленческий учет, АХД, Банк и инвестиционный менеджмент, Банковское дело, Банкротство, БЖД, Бизнес-планирование, Биология, Бухучет и статистика, ВСТИ, Внешнеэконом деятельность (ВЭД), География, Геодезия', 'Active', 'writer', '', '', '', 0, '0', 0, '', '', '', '', '', ''),
(632, 3800, '', '', ', 495, 496, 497, 498', '', '', 'Testthree', 'testthree', 'Testthree', NULL, 'false', '1535641506', '', '', NULL, '', NULL, NULL, NULL, 'testthree123258@gmail.com', 'd8664d5d8bcab43e78c885874da66d6a', '0930793333', '', 'MLA', '1234-1234-1234-1236', NULL, 'АПП (Автоматизация производственных процессов), Административное право, Анализ, Анатомия, Английский язык, Антикризисное управление, Архитектура, Астрономия, Аудит бух и управленческий учет, АХД, Банк и инвестиционный менеджмент, Банковское дело, Банкротство, БЖД, Бизнес-планирование, Биология, Бухучет и статистика, ВСТИ, Внешнеэконом деятельность (ВЭД), География, Геодезия, Геополитика\r\n, Гидравлика, Гостиничное дело', 'Active', 'writer', '', '', '', 0, '0', 1, '', '', '', '', '', ''),
(633, 3801, '', '', '', '', '', 'Testfour', '', 'Testfour', NULL, 'false', '1535641292', '', '', NULL, '', NULL, NULL, NULL, 'testfour123258@gmail.com', '59d3c8cadbe582e06cd7fa3527d25364', 'mobile-gsm1985@mail.ru', '', NULL, '', NULL, '', 'Active', 'client', '', '', '', 0, '0', 0, '', '', '', '', '', ''),
(636, 3802, '', '', '', '', '', 'Оксана', 'Оксана', 'Соколова', NULL, 'false', '1535649971', 'Маю достатньо великий досвід у написанні робіт, оскільки тривалий час працюю викладачем.', '', NULL, '', NULL, NULL, NULL, 'ok.sokolova007@gmail.com', '796bc1818de8298afba4331233942c94', '0506900950', '', 'MLA', '4149-4996-4978-5100', NULL, 'Земельное право, Охрана природы, Разное, Экология', 'Active', 'writer', '', '', '', 0, '0', 0, '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Структура таблицы `writers_accounts`
--

CREATE TABLE `writers_accounts` (
  `id` int(11) NOT NULL,
  `writerid` varchar(150) NOT NULL,
  `writer_name` varchar(200) NOT NULL,
  `payment_method` varchar(50) NOT NULL,
  `payment_details` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `writer_ratings`
--

CREATE TABLE `writer_ratings` (
  `id` int(11) NOT NULL,
  `orderid` int(11) NOT NULL,
  `clientid` varchar(50) NOT NULL,
  `customer_name` varchar(60) NOT NULL,
  `writerid` varchar(50) NOT NULL,
  `subject` varchar(50) NOT NULL,
  `amount` int(11) NOT NULL,
  `topic` varchar(50) NOT NULL,
  `rating` int(11) NOT NULL,
  `comment` text NOT NULL,
  `date` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `writer_ratings`
--

INSERT INTO `writer_ratings` (`id`, `orderid`, `clientid`, `customer_name`, `writerid`, `subject`, `amount`, `topic`, `rating`, `comment`, `date`) VALUES
(1, 13, '3558', 'Анна Добровольская', '3548', 'Биология', 0, 'база данных', 4, 'супер', '2017/12/22 09:45:40');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `academic_level`
--
ALTER TABLE `academic_level`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `accepted_payout`
--
ALTER TABLE `accepted_payout`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`ID`);

--
-- Индексы таблицы `chat`
--
ALTER TABLE `chat`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `ci_last_seen`
--
ALTER TABLE `ci_last_seen`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `ci_messages`
--
ALTER TABLE `ci_messages`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `ci_sessions`
--
ALTER TABLE `ci_sessions`
  ADD KEY `ci_sessions_timestamp` (`timestamp`);

--
-- Индексы таблицы `configs`
--
ALTER TABLE `configs`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `country`
--
ALTER TABLE `country`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `essay_document_access`
--
ALTER TABLE `essay_document_access`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `essay_subscribers`
--
ALTER TABLE `essay_subscribers`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `msg_config`
--
ALTER TABLE `msg_config`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `opskill_questions`
--
ALTER TABLE `opskill_questions`
  ADD PRIMARY KEY (`orderid`);

--
-- Индексы таблицы `opskill_questions1`
--
ALTER TABLE `opskill_questions1`
  ADD PRIMARY KEY (`orderid`);

--
-- Индексы таблицы `opskill_questions2`
--
ALTER TABLE `opskill_questions2`
  ADD PRIMARY KEY (`orderid`);

--
-- Индексы таблицы `opskill_questions3`
--
ALTER TABLE `opskill_questions3`
  ADD PRIMARY KEY (`orderid`);

--
-- Индексы таблицы `opskill_questions4`
--
ALTER TABLE `opskill_questions4`
  ADD PRIMARY KEY (`orderid`);

--
-- Индексы таблицы `opskill_questions5`
--
ALTER TABLE `opskill_questions5`
  ADD PRIMARY KEY (`orderid`);

--
-- Индексы таблицы `opskill_questions6`
--
ALTER TABLE `opskill_questions6`
  ADD PRIMARY KEY (`orderid`);

--
-- Индексы таблицы `opskill_questions7`
--
ALTER TABLE `opskill_questions7`
  ADD PRIMARY KEY (`orderid`);

--
-- Индексы таблицы `opskill_questions8`
--
ALTER TABLE `opskill_questions8`
  ADD PRIMARY KEY (`orderid`);

--
-- Индексы таблицы `opskill_questions9`
--
ALTER TABLE `opskill_questions9`
  ADD PRIMARY KEY (`orderid`);

--
-- Индексы таблицы `opskill_search`
--
ALTER TABLE `opskill_search`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `opskill_writersamples`
--
ALTER TABLE `opskill_writersamples`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `ops_coupon`
--
ALTER TABLE `ops_coupon`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `ops_payments`
--
ALTER TABLE `ops_payments`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `ops_upsells`
--
ALTER TABLE `ops_upsells`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `ops_upsellused`
--
ALTER TABLE `ops_upsellused`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`orderid`);

--
-- Индексы таблицы `order_files`
--
ALTER TABLE `order_files`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `order_messages`
--
ALTER TABLE `order_messages`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `password_reset`
--
ALTER TABLE `password_reset`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `paypal_payments`
--
ALTER TABLE `paypal_payments`
  ADD PRIMARY KEY (`payment_id`);

--
-- Индексы таблицы `project_requests`
--
ALTER TABLE `project_requests`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `referencing_style`
--
ALTER TABLE `referencing_style`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `smtp_configs`
--
ALTER TABLE `smtp_configs`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `subject`
--
ALTER TABLE `subject`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `type_service`
--
ALTER TABLE `type_service`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `urgency`
--
ALTER TABLE `urgency`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `usa_states`
--
ALTER TABLE `usa_states`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `writers`
--
ALTER TABLE `writers`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `writers_accounts`
--
ALTER TABLE `writers_accounts`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `writer_ratings`
--
ALTER TABLE `writer_ratings`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `academic_level`
--
ALTER TABLE `academic_level`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `accepted_payout`
--
ALTER TABLE `accepted_payout`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT для таблицы `books`
--
ALTER TABLE `books`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT для таблицы `chat`
--
ALTER TABLE `chat`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;

--
-- AUTO_INCREMENT для таблицы `ci_last_seen`
--
ALTER TABLE `ci_last_seen`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `ci_messages`
--
ALTER TABLE `ci_messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT для таблицы `configs`
--
ALTER TABLE `configs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT для таблицы `country`
--
ALTER TABLE `country`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=246;

--
-- AUTO_INCREMENT для таблицы `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=123;

--
-- AUTO_INCREMENT для таблицы `essay_document_access`
--
ALTER TABLE `essay_document_access`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `essay_subscribers`
--
ALTER TABLE `essay_subscribers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT для таблицы `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1281;

--
-- AUTO_INCREMENT для таблицы `msg_config`
--
ALTER TABLE `msg_config`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT для таблицы `opskill_questions`
--
ALTER TABLE `opskill_questions`
  MODIFY `orderid` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `opskill_questions1`
--
ALTER TABLE `opskill_questions1`
  MODIFY `orderid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=281;

--
-- AUTO_INCREMENT для таблицы `opskill_questions2`
--
ALTER TABLE `opskill_questions2`
  MODIFY `orderid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=281;

--
-- AUTO_INCREMENT для таблицы `opskill_questions3`
--
ALTER TABLE `opskill_questions3`
  MODIFY `orderid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=281;

--
-- AUTO_INCREMENT для таблицы `opskill_questions4`
--
ALTER TABLE `opskill_questions4`
  MODIFY `orderid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=281;

--
-- AUTO_INCREMENT для таблицы `opskill_questions5`
--
ALTER TABLE `opskill_questions5`
  MODIFY `orderid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=281;

--
-- AUTO_INCREMENT для таблицы `opskill_questions6`
--
ALTER TABLE `opskill_questions6`
  MODIFY `orderid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=281;

--
-- AUTO_INCREMENT для таблицы `opskill_questions7`
--
ALTER TABLE `opskill_questions7`
  MODIFY `orderid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=281;

--
-- AUTO_INCREMENT для таблицы `opskill_questions8`
--
ALTER TABLE `opskill_questions8`
  MODIFY `orderid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=281;

--
-- AUTO_INCREMENT для таблицы `opskill_questions9`
--
ALTER TABLE `opskill_questions9`
  MODIFY `orderid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=281;

--
-- AUTO_INCREMENT для таблицы `opskill_search`
--
ALTER TABLE `opskill_search`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `opskill_writersamples`
--
ALTER TABLE `opskill_writersamples`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `ops_coupon`
--
ALTER TABLE `ops_coupon`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT для таблицы `ops_payments`
--
ALTER TABLE `ops_payments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `ops_upsells`
--
ALTER TABLE `ops_upsells`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT для таблицы `ops_upsellused`
--
ALTER TABLE `ops_upsellused`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT для таблицы `orders`
--
ALTER TABLE `orders`
  MODIFY `orderid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=500;

--
-- AUTO_INCREMENT для таблицы `order_files`
--
ALTER TABLE `order_files`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1208;

--
-- AUTO_INCREMENT для таблицы `order_messages`
--
ALTER TABLE `order_messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2201;

--
-- AUTO_INCREMENT для таблицы `password_reset`
--
ALTER TABLE `password_reset`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=262;

--
-- AUTO_INCREMENT для таблицы `payments`
--
ALTER TABLE `payments`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=348;

--
-- AUTO_INCREMENT для таблицы `paypal_payments`
--
ALTER TABLE `paypal_payments`
  MODIFY `payment_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `project_requests`
--
ALTER TABLE `project_requests`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=748;

--
-- AUTO_INCREMENT для таблицы `referencing_style`
--
ALTER TABLE `referencing_style`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT для таблицы `smtp_configs`
--
ALTER TABLE `smtp_configs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `subject`
--
ALTER TABLE `subject`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=166;

--
-- AUTO_INCREMENT для таблицы `transactions`
--
ALTER TABLE `transactions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `type_service`
--
ALTER TABLE `type_service`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT для таблицы `urgency`
--
ALTER TABLE `urgency`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT для таблицы `usa_states`
--
ALTER TABLE `usa_states`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT для таблицы `writers`
--
ALTER TABLE `writers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=637;

--
-- AUTO_INCREMENT для таблицы `writers_accounts`
--
ALTER TABLE `writers_accounts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `writer_ratings`
--
ALTER TABLE `writer_ratings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
