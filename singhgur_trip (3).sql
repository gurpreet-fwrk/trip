-- phpMyAdmin SQL Dump
-- version 4.7.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Dec 08, 2017 at 05:59 AM
-- Server version: 5.6.37
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `singhgur_trip`
--

-- --------------------------------------------------------

--
-- Table structure for table `activities`
--

CREATE TABLE `activities` (
  `id` int(11) NOT NULL,
  `activitycategory_id` int(11) NOT NULL,
  `title_en` varchar(355) DEFAULT NULL,
  `title_ar` varchar(355) CHARACTER SET utf8 DEFAULT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `activities`
--

INSERT INTO `activities` (`id`, `activitycategory_id`, `title_en`, `title_ar`, `created`, `modified`) VALUES
(1, 1, 'Bazaar', 'بازار', '2017-11-01 08:57:58', '2017-11-09 07:40:06'),
(2, 1, 'Floating Market', 'السوق العائمة', '2017-11-01 08:58:45', '2017-11-09 07:40:25'),
(3, 1, 'new activity', 'نشاط جديد', '2017-11-03 10:18:34', '2017-11-09 07:40:43');

-- --------------------------------------------------------

--
-- Table structure for table `activitycategories`
--

CREATE TABLE `activitycategories` (
  `id` int(11) NOT NULL,
  `title_en` varchar(355) DEFAULT NULL,
  `title_ar` varchar(355) CHARACTER SET utf8 DEFAULT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `activitycategories`
--

INSERT INTO `activitycategories` (`id`, `title_en`, `title_ar`, `created`, `modified`) VALUES
(1, 'Markets', 'الأسواق', '2017-11-01 08:56:55', '2017-11-09 07:10:15'),
(3, 'Foods', 'الأطعمة', '2017-11-09 07:18:29', '2017-11-09 07:18:29');

-- --------------------------------------------------------

--
-- Table structure for table `cities`
--

CREATE TABLE `cities` (
  `id` int(11) NOT NULL,
  `county` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cities`
--

INSERT INTO `cities` (`id`, `county`) VALUES
(4, 'Adair '),
(5, 'Guthrie'),
(6, 'Adams'),
(7, 'Adams '),
(8, 'Taylor'),
(9, 'Allamakee'),
(10, 'Allamakee '),
(11, 'Clayton'),
(12, 'Appanoose'),
(13, 'Appanoose '),
(14, 'Monroe'),
(15, 'Audubon'),
(16, 'Benton'),
(17, 'Benton '),
(18, 'Linn'),
(19, 'Black Hawk'),
(20, 'Black Hawk '),
(21, 'Bremer'),
(22, 'Black Hawk '),
(23, 'Buchanan'),
(24, 'Boone'),
(25, 'Boone '),
(26, 'Dallas'),
(27, 'Boone '),
(28, 'Polk '),
(29, 'Story'),
(30, 'Bremer'),
(31, 'Bremer '),
(32, 'Fayette'),
(33, 'Buchanan'),
(34, 'Buchanan '),
(35, 'Fayette'),
(36, 'Buena Vista'),
(37, 'Butler'),
(38, 'Butler '),
(39, 'Floyd'),
(40, 'Calhoun'),
(41, 'Calhoun '),
(42, 'Sac'),
(43, 'Calhoun '),
(44, 'Webster'),
(45, 'Carroll'),
(46, 'Carroll '),
(47, 'Greene'),
(48, 'Carroll '),
(49, 'Guthrie'),
(50, 'Cass'),
(51, 'Cedar'),
(52, 'Cedar '),
(53, 'Johnson'),
(54, 'Cedar '),
(55, 'Muscatine'),
(56, 'Cedar '),
(57, 'Muscatine '),
(58, 'Scott'),
(59, 'Cerro Gordo'),
(60, 'Cerro Gordo '),
(61, 'Floyd'),
(62, 'Cherokee'),
(63, 'Chickasaw'),
(64, 'Chickasaw '),
(65, 'Floyd'),
(66, 'Chickasaw '),
(67, 'Howard'),
(68, 'Clarke'),
(69, 'Clay'),
(70, 'Clayton'),
(71, 'Clayton '),
(72, 'Delaware'),
(73, 'Clinton'),
(74, 'Clinton '),
(75, 'Jackson'),
(76, 'Crawford'),
(77, 'Crawford '),
(78, 'Harrison'),
(79, 'Dallas'),
(80, 'Dallas '),
(81, 'Madison '),
(82, 'Polk '),
(83, 'War...'),
(84, 'Dallas '),
(85, 'Polk'),
(86, 'Davis'),
(87, 'Decatur'),
(88, 'Delaware'),
(89, 'Delaware '),
(90, 'Dubuque'),
(91, 'Des Moines'),
(92, 'Dickinson'),
(93, 'Dubuque'),
(94, 'Dubuque '),
(95, 'Jackson'),
(96, 'Dubuque '),
(97, 'Jones'),
(98, 'Emmet'),
(99, 'Fayette'),
(100, 'Floyd'),
(101, 'Franklin'),
(102, 'Franklin '),
(103, 'Hardin'),
(104, 'Franklin '),
(105, 'Wright'),
(106, 'Fremont'),
(107, 'Fremont '),
(108, 'Mills'),
(109, 'Fremont '),
(110, 'Page'),
(111, 'Greene'),
(112, 'Grundy'),
(113, 'Guthrie'),
(114, 'Hamilton'),
(115, 'Hamilton '),
(116, 'Webster'),
(117, 'Hancock'),
(118, 'Hancock '),
(119, 'Winnebago'),
(120, 'Hardin'),
(121, 'Harrison'),
(122, 'Henry'),
(123, 'Henry '),
(124, 'Jefferson '),
(125, 'Washington Count...'),
(126, 'Howard'),
(127, 'Howard '),
(128, 'Mitchell'),
(129, 'Humboldt'),
(130, 'Humboldt '),
(131, 'Kossuth'),
(132, 'Humboldt '),
(133, 'Pocahontas'),
(134, 'Ida'),
(135, 'Iowa'),
(136, 'Iowa '),
(137, 'Keokuk'),
(138, 'Iowa '),
(139, 'Poweshiek'),
(140, 'Jackson'),
(141, 'Jasper'),
(142, 'Jasper '),
(143, 'Polk'),
(144, 'Jefferson'),
(145, 'Johnson'),
(146, 'Jones'),
(147, 'Keokuk'),
(148, 'Keokuk '),
(149, 'Washington'),
(150, 'Kossuth'),
(151, 'Kossuth '),
(152, 'Palo Alto'),
(153, ' '),
(154, 'Lee'),
(155, 'Linn'),
(156, 'Louisa'),
(157, 'Lucas'),
(158, 'Lyon'),
(159, 'Madison'),
(160, 'Madison '),
(161, 'Warren'),
(162, 'Mahaska'),
(163, 'Mahaska '),
(164, 'Marion'),
(165, 'Mahaska '),
(166, 'Monroe '),
(167, 'Wapello'),
(168, 'Mahaska '),
(169, 'Poweshiek'),
(170, 'Marion'),
(171, 'Marshall'),
(172, 'Marshall '),
(173, 'Tama'),
(174, 'Mills'),
(175, 'Mitchell'),
(176, 'Monona'),
(177, 'Monroe'),
(178, 'Montgomery'),
(179, 'Muscatine'),
(180, 'Muscatine '),
(181, 'Scott'),
(182, 'O Brien'),
(183, 'O Brien '),
(184, 'Sioux'),
(185, 'Osceola'),
(186, 'Page'),
(187, 'Palo Alto'),
(188, 'Plymouth'),
(189, 'Plymouth '),
(190, 'Woodbury'),
(191, 'Pocahontas'),
(192, 'Polk'),
(193, 'Polk '),
(194, 'Warren'),
(195, 'Pottawattamie'),
(196, 'Pottawattamie '),
(197, 'Shelby'),
(198, 'Poweshiek'),
(199, 'Ringgold'),
(200, 'Ringgold '),
(201, 'Taylor'),
(202, 'Ringgold '),
(203, 'Union'),
(204, 'Sac'),
(205, 'Scott'),
(206, 'Shelby'),
(207, 'Sioux'),
(208, 'Story'),
(209, 'Tama'),
(210, 'Taylor'),
(211, 'Union'),
(212, 'Van Buren'),
(213, 'Wapello'),
(214, 'Warren'),
(215, 'Washington'),
(216, 'Wayne'),
(217, 'Webster'),
(218, 'Winnebago'),
(219, 'Winneshiek'),
(220, 'Woodbury'),
(221, 'Worth'),
(222, 'Wright');

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` int(11) NOT NULL,
  `name` varchar(355) DEFAULT NULL,
  `email` varchar(355) DEFAULT NULL,
  `subject` varchar(355) DEFAULT NULL,
  `message` text,
  `reply` text,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`id`, `name`, `email`, `subject`, `message`, `reply`, `created`, `modified`) VALUES
(1, 'Gurpreet singh', 'ashutosh@avainfotech.com', 'test', 'dsgvdsgdsfhgsfdg', 'hello', '2017-08-16 11:43:56', '2017-08-17 06:22:52'),
(2, 'Gurpreet singh', 'gurpreet@avainfotech.com', 'Test subject', 'Test Message', 'Test Reply', '2017-08-17 06:24:45', '2017-08-17 06:25:11'),
(3, 'Anshul', 'anshul@avainfotech.com', 'sfsfsfgs', 'dgbdbd', 'fgvrgtrgt', '2017-08-17 10:45:23', '2017-08-17 10:47:15'),
(4, 'Gurpreet singh', 'gurpreet@avainfotech.com', 'test', 'fcsdgvfsd', NULL, '2017-10-24 12:39:55', '2017-10-24 12:39:55'),
(5, 'Gurpreet singh', 'gurpreet@avainfotech.com', 'Test', 'kjgghjgfjhfjhf', NULL, '2017-10-24 12:41:06', '2017-10-24 12:41:06'),
(6, 'Gurpreet singh', 'gurpreet@avainfotech.com', 'aasfsa', 'gfsadsdgs', NULL, '2017-10-26 09:21:00', '2017-10-26 09:21:00'),
(7, 'Gurpreet singh', 'gurpreet@avainfotech.com', 'fewfgesg', 'gdsgdsgsd', NULL, '2017-10-26 09:21:54', '2017-10-26 09:21:54'),
(8, 'hh', 'bhghg@gjh.com', 'gjhg', 'ghjg', NULL, '2017-10-26 09:24:08', '2017-10-26 09:24:08'),
(9, 'Gurpreet singh', 'gurpreet@avainfoteech.com', 'dsadfsaf', 'fsadfasf', NULL, '2017-10-26 09:26:13', '2017-10-26 09:26:13'),
(10, 'Jonathan', 'Mybearer@hotmail.com', 'Test', 'Test', NULL, '2017-10-27 03:33:14', '2017-10-27 03:33:14');

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

CREATE TABLE `countries` (
  `country_id` int(11) NOT NULL,
  `name` varchar(128) NOT NULL,
  `iso_code_2` varchar(2) NOT NULL,
  `iso_code_3` varchar(3) NOT NULL,
  `address_format` text NOT NULL,
  `postcode_required` tinyint(1) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `countries`
--

INSERT INTO `countries` (`country_id`, `name`, `iso_code_2`, `iso_code_3`, `address_format`, `postcode_required`, `status`) VALUES
(1, 'Afghanistan', 'AF', 'AFG', '', 0, 1),
(2, 'Albania', 'AL', 'ALB', '', 0, 1),
(3, 'Algeria', 'DZ', 'DZA', '', 0, 1),
(4, 'American Samoa', 'AS', 'ASM', '', 0, 1),
(5, 'Andorra', 'AD', 'AND', '', 0, 1),
(6, 'Angola', 'AO', 'AGO', '', 0, 1),
(7, 'Anguilla', 'AI', 'AIA', '', 0, 1),
(8, 'Antarctica', 'AQ', 'ATA', '', 0, 1),
(9, 'Antigua and Barbuda', 'AG', 'ATG', '', 0, 1),
(10, 'Argentina', 'AR', 'ARG', '', 0, 1),
(11, 'Armenia', 'AM', 'ARM', '', 0, 1),
(12, 'Aruba', 'AW', 'ABW', '', 0, 1),
(13, 'Australia', 'AU', 'AUS', '', 0, 1),
(14, 'Austria', 'AT', 'AUT', '', 0, 1),
(15, 'Azerbaijan', 'AZ', 'AZE', '', 0, 1),
(16, 'Bahamas', 'BS', 'BHS', '', 0, 1),
(17, 'Bahrain', 'BH', 'BHR', '', 0, 1),
(18, 'Bangladesh', 'BD', 'BGD', '', 0, 1),
(19, 'Barbados', 'BB', 'BRB', '', 0, 1),
(20, 'Belarus', 'BY', 'BLR', '', 0, 1),
(21, 'Belgium', 'BE', 'BEL', '{firstname} {lastname}\r\n{company}\r\n{address_1}\r\n{address_2}\r\n{postcode} {city}\r\n{country}', 0, 1),
(22, 'Belize', 'BZ', 'BLZ', '', 0, 1),
(23, 'Benin', 'BJ', 'BEN', '', 0, 1),
(24, 'Bermuda', 'BM', 'BMU', '', 0, 1),
(25, 'Bhutan', 'BT', 'BTN', '', 0, 1),
(26, 'Bolivia', 'BO', 'BOL', '', 0, 1),
(27, 'Bosnia and Herzegovina', 'BA', 'BIH', '', 0, 1),
(28, 'Botswana', 'BW', 'BWA', '', 0, 1),
(29, 'Bouvet Island', 'BV', 'BVT', '', 0, 1),
(30, 'Brazil', 'BR', 'BRA', '', 0, 1),
(31, 'British Indian Ocean Territory', 'IO', 'IOT', '', 0, 1),
(32, 'Brunei Darussalam', 'BN', 'BRN', '', 0, 1),
(33, 'Bulgaria', 'BG', 'BGR', '', 0, 1),
(34, 'Burkina Faso', 'BF', 'BFA', '', 0, 1),
(35, 'Burundi', 'BI', 'BDI', '', 0, 1),
(36, 'Cambodia', 'KH', 'KHM', '', 0, 1),
(37, 'Cameroon', 'CM', 'CMR', '', 0, 1),
(38, 'Canada', 'CA', 'CAN', '', 0, 1),
(39, 'Cape Verde', 'CV', 'CPV', '', 0, 1),
(40, 'Cayman Islands', 'KY', 'CYM', '', 0, 1),
(41, 'Central African Republic', 'CF', 'CAF', '', 0, 1),
(42, 'Chad', 'TD', 'TCD', '', 0, 1),
(43, 'Chile', 'CL', 'CHL', '', 0, 1),
(44, 'China', 'CN', 'CHN', '', 0, 1),
(45, 'Christmas Island', 'CX', 'CXR', '', 0, 1),
(46, 'Cocos (Keeling) Islands', 'CC', 'CCK', '', 0, 1),
(47, 'Colombia', 'CO', 'COL', '', 0, 1),
(48, 'Comoros', 'KM', 'COM', '', 0, 1),
(49, 'Congo', 'CG', 'COG', '', 0, 1),
(50, 'Cook Islands', 'CK', 'COK', '', 0, 1),
(51, 'Costa Rica', 'CR', 'CRI', '', 0, 1),
(52, 'Cote D\'Ivoire', 'CI', 'CIV', '', 0, 1),
(53, 'Croatia', 'HR', 'HRV', '', 0, 1),
(54, 'Cuba', 'CU', 'CUB', '', 0, 1),
(55, 'Cyprus', 'CY', 'CYP', '', 0, 1),
(56, 'Czech Republic', 'CZ', 'CZE', '', 0, 1),
(57, 'Denmark', 'DK', 'DNK', '', 0, 1),
(58, 'Djibouti', 'DJ', 'DJI', '', 0, 1),
(59, 'Dominica', 'DM', 'DMA', '', 0, 1),
(60, 'Dominican Republic', 'DO', 'DOM', '', 0, 1),
(61, 'East Timor', 'TL', 'TLS', '', 0, 1),
(62, 'Ecuador', 'EC', 'ECU', '', 0, 1),
(63, 'Egypt', 'EG', 'EGY', '', 0, 1),
(64, 'El Salvador', 'SV', 'SLV', '', 0, 1),
(65, 'Equatorial Guinea', 'GQ', 'GNQ', '', 0, 1),
(66, 'Eritrea', 'ER', 'ERI', '', 0, 1),
(67, 'Estonia', 'EE', 'EST', '', 0, 1),
(68, 'Ethiopia', 'ET', 'ETH', '', 0, 1),
(69, 'Falkland Islands (Malvinas)', 'FK', 'FLK', '', 0, 1),
(70, 'Faroe Islands', 'FO', 'FRO', '', 0, 1),
(71, 'Fiji', 'FJ', 'FJI', '', 0, 1),
(72, 'Finland', 'FI', 'FIN', '', 0, 1),
(74, 'France, Metropolitan', 'FR', 'FRA', '{firstname} {lastname}\r\n{company}\r\n{address_1}\r\n{address_2}\r\n{postcode} {city}\r\n{country}', 1, 1),
(75, 'French Guiana', 'GF', 'GUF', '', 0, 1),
(76, 'French Polynesia', 'PF', 'PYF', '', 0, 1),
(77, 'French Southern Territories', 'TF', 'ATF', '', 0, 1),
(78, 'Gabon', 'GA', 'GAB', '', 0, 1),
(79, 'Gambia', 'GM', 'GMB', '', 0, 1),
(80, 'Georgia', 'GE', 'GEO', '', 0, 1),
(81, 'Germany', 'DE', 'DEU', '{company}\r\n{firstname} {lastname}\r\n{address_1}\r\n{address_2}\r\n{postcode} {city}\r\n{country}', 1, 1),
(82, 'Ghana', 'GH', 'GHA', '', 0, 1),
(83, 'Gibraltar', 'GI', 'GIB', '', 0, 1),
(84, 'Greece', 'GR', 'GRC', '', 0, 1),
(85, 'Greenland', 'GL', 'GRL', '', 0, 1),
(86, 'Grenada', 'GD', 'GRD', '', 0, 1),
(87, 'Guadeloupe', 'GP', 'GLP', '', 0, 1),
(88, 'Guam', 'GU', 'GUM', '', 0, 1),
(89, 'Guatemala', 'GT', 'GTM', '', 0, 1),
(90, 'Guinea', 'GN', 'GIN', '', 0, 1),
(91, 'Guinea-Bissau', 'GW', 'GNB', '', 0, 1),
(92, 'Guyana', 'GY', 'GUY', '', 0, 1),
(93, 'Haiti', 'HT', 'HTI', '', 0, 1),
(94, 'Heard and Mc Donald Islands', 'HM', 'HMD', '', 0, 1),
(95, 'Honduras', 'HN', 'HND', '', 0, 1),
(96, 'Hong Kong', 'HK', 'HKG', '', 0, 1),
(97, 'Hungary', 'HU', 'HUN', '', 0, 1),
(98, 'Iceland', 'IS', 'ISL', '', 0, 1),
(99, 'India', 'IN', 'IND', '', 0, 1),
(100, 'Indonesia', 'ID', 'IDN', '', 0, 1),
(101, 'Iran (Islamic Republic of)', 'IR', 'IRN', '', 0, 1),
(102, 'Iraq', 'IQ', 'IRQ', '', 0, 1),
(103, 'Ireland', 'IE', 'IRL', '', 0, 1),
(104, 'Israel', 'IL', 'ISR', '', 0, 1),
(105, 'Italy', 'IT', 'ITA', '', 0, 1),
(106, 'Jamaica', 'JM', 'JAM', '', 0, 1),
(107, 'Japan', 'JP', 'JPN', '', 0, 1),
(108, 'Jordan', 'JO', 'JOR', '', 0, 1),
(109, 'Kazakhstan', 'KZ', 'KAZ', '', 0, 1),
(110, 'Kenya', 'KE', 'KEN', '', 0, 1),
(111, 'Kiribati', 'KI', 'KIR', '', 0, 1),
(112, 'North Korea', 'KP', 'PRK', '', 0, 1),
(113, 'South Korea', 'KR', 'KOR', '', 0, 1),
(114, 'Kuwait', 'KW', 'KWT', '', 0, 1),
(115, 'Kyrgyzstan', 'KG', 'KGZ', '', 0, 1),
(116, 'Lao People\'s Democratic Republic', 'LA', 'LAO', '', 0, 1),
(117, 'Latvia', 'LV', 'LVA', '', 0, 1),
(118, 'Lebanon', 'LB', 'LBN', '', 0, 1),
(119, 'Lesotho', 'LS', 'LSO', '', 0, 1),
(120, 'Liberia', 'LR', 'LBR', '', 0, 1),
(121, 'Libyan Arab Jamahiriya', 'LY', 'LBY', '', 0, 1),
(122, 'Liechtenstein', 'LI', 'LIE', '', 0, 1),
(123, 'Lithuania', 'LT', 'LTU', '', 0, 1),
(124, 'Luxembourg', 'LU', 'LUX', '', 0, 1),
(125, 'Macau', 'MO', 'MAC', '', 0, 1),
(126, 'FYROM', 'MK', 'MKD', '', 0, 1),
(127, 'Madagascar', 'MG', 'MDG', '', 0, 1),
(128, 'Malawi', 'MW', 'MWI', '', 0, 1),
(129, 'Malaysia', 'MY', 'MYS', '', 0, 1),
(130, 'Maldives', 'MV', 'MDV', '', 0, 1),
(131, 'Mali', 'ML', 'MLI', '', 0, 1),
(132, 'Malta', 'MT', 'MLT', '', 0, 1),
(133, 'Marshall Islands', 'MH', 'MHL', '', 0, 1),
(134, 'Martinique', 'MQ', 'MTQ', '', 0, 1),
(135, 'Mauritania', 'MR', 'MRT', '', 0, 1),
(136, 'Mauritius', 'MU', 'MUS', '', 0, 1),
(137, 'Mayotte', 'YT', 'MYT', '', 0, 1),
(138, 'Mexico', 'MX', 'MEX', '', 0, 1),
(139, 'Micronesia, Federated States of', 'FM', 'FSM', '', 0, 1),
(140, 'Moldova, Republic of', 'MD', 'MDA', '', 0, 1),
(141, 'Monaco', 'MC', 'MCO', '', 0, 1),
(142, 'Mongolia', 'MN', 'MNG', '', 0, 1),
(143, 'Montserrat', 'MS', 'MSR', '', 0, 1),
(144, 'Morocco', 'MA', 'MAR', '', 0, 1),
(145, 'Mozambique', 'MZ', 'MOZ', '', 0, 1),
(146, 'Myanmar', 'MM', 'MMR', '', 0, 1),
(147, 'Namibia', 'NA', 'NAM', '', 0, 1),
(148, 'Nauru', 'NR', 'NRU', '', 0, 1),
(149, 'Nepal', 'NP', 'NPL', '', 0, 1),
(150, 'Netherlands', 'NL', 'NLD', '', 0, 1),
(151, 'Netherlands Antilles', 'AN', 'ANT', '', 0, 1),
(152, 'New Caledonia', 'NC', 'NCL', '', 0, 1),
(153, 'New Zealand', 'NZ', 'NZL', '', 0, 1),
(154, 'Nicaragua', 'NI', 'NIC', '', 0, 1),
(155, 'Niger', 'NE', 'NER', '', 0, 1),
(156, 'Nigeria', 'NG', 'NGA', '', 0, 1),
(157, 'Niue', 'NU', 'NIU', '', 0, 1),
(158, 'Norfolk Island', 'NF', 'NFK', '', 0, 1),
(159, 'Northern Mariana Islands', 'MP', 'MNP', '', 0, 1),
(160, 'Norway', 'NO', 'NOR', '', 0, 1),
(161, 'Oman', 'OM', 'OMN', '', 0, 1),
(162, 'Pakistan', 'PK', 'PAK', '', 0, 1),
(163, 'Palau', 'PW', 'PLW', '', 0, 1),
(164, 'Panama', 'PA', 'PAN', '', 0, 1),
(165, 'Papua New Guinea', 'PG', 'PNG', '', 0, 1),
(166, 'Paraguay', 'PY', 'PRY', '', 0, 1),
(167, 'Peru', 'PE', 'PER', '', 0, 1),
(168, 'Philippines', 'PH', 'PHL', '', 0, 1),
(169, 'Pitcairn', 'PN', 'PCN', '', 0, 1),
(170, 'Poland', 'PL', 'POL', '', 0, 1),
(171, 'Portugal', 'PT', 'PRT', '', 0, 1),
(172, 'Puerto Rico', 'PR', 'PRI', '', 0, 1),
(173, 'Qatar', 'QA', 'QAT', '', 0, 1),
(174, 'Reunion', 'RE', 'REU', '', 0, 1),
(175, 'Romania', 'RO', 'ROM', '', 0, 1),
(176, 'Russian Federation', 'RU', 'RUS', '', 0, 1),
(177, 'Rwanda', 'RW', 'RWA', '', 0, 1),
(178, 'Saint Kitts and Nevis', 'KN', 'KNA', '', 0, 1),
(179, 'Saint Lucia', 'LC', 'LCA', '', 0, 1),
(180, 'Saint Vincent and the Grenadines', 'VC', 'VCT', '', 0, 1),
(181, 'Samoa', 'WS', 'WSM', '', 0, 1),
(182, 'San Marino', 'SM', 'SMR', '', 0, 1),
(183, 'Sao Tome and Principe', 'ST', 'STP', '', 0, 1),
(184, 'Saudi Arabia', 'SA', 'SAU', '', 0, 1),
(185, 'Senegal', 'SN', 'SEN', '', 0, 1),
(186, 'Seychelles', 'SC', 'SYC', '', 0, 1),
(187, 'Sierra Leone', 'SL', 'SLE', '', 0, 1),
(188, 'Singapore', 'SG', 'SGP', '', 0, 1),
(189, 'Slovak Republic', 'SK', 'SVK', '{firstname} {lastname}\r\n{company}\r\n{address_1}\r\n{address_2}\r\n{city} {postcode}\r\n{zone}\r\n{country}', 0, 1),
(190, 'Slovenia', 'SI', 'SVN', '', 0, 1),
(191, 'Solomon Islands', 'SB', 'SLB', '', 0, 1),
(192, 'Somalia', 'SO', 'SOM', '', 0, 1),
(193, 'South Africa', 'ZA', 'ZAF', '', 0, 1),
(194, 'South Georgia &amp; South Sandwich Islands', 'GS', 'SGS', '', 0, 1),
(195, 'Spain', 'ES', 'ESP', '', 0, 1),
(196, 'Sri Lanka', 'LK', 'LKA', '', 0, 1),
(197, 'St. Helena', 'SH', 'SHN', '', 0, 1),
(198, 'St. Pierre and Miquelon', 'PM', 'SPM', '', 0, 1),
(199, 'Sudan', 'SD', 'SDN', '', 0, 1),
(200, 'Suriname', 'SR', 'SUR', '', 0, 1),
(201, 'Svalbard and Jan Mayen Islands', 'SJ', 'SJM', '', 0, 1),
(202, 'Swaziland', 'SZ', 'SWZ', '', 0, 1),
(203, 'Sweden', 'SE', 'SWE', '{company}\r\n{firstname} {lastname}\r\n{address_1}\r\n{address_2}\r\n{postcode} {city}\r\n{country}', 1, 1),
(204, 'Switzerland', 'CH', 'CHE', '', 0, 1),
(205, 'Syrian Arab Republic', 'SY', 'SYR', '', 0, 1),
(206, 'Taiwan', 'TW', 'TWN', '', 0, 1),
(207, 'Tajikistan', 'TJ', 'TJK', '', 0, 1),
(208, 'Tanzania, United Republic of', 'TZ', 'TZA', '', 0, 1),
(209, 'Thailand', 'TH', 'THA', '', 0, 1),
(210, 'Togo', 'TG', 'TGO', '', 0, 1),
(211, 'Tokelau', 'TK', 'TKL', '', 0, 1),
(212, 'Tonga', 'TO', 'TON', '', 0, 1),
(213, 'Trinidad and Tobago', 'TT', 'TTO', '', 0, 1),
(214, 'Tunisia', 'TN', 'TUN', '', 0, 1),
(215, 'Turkey', 'TR', 'TUR', '', 0, 1),
(216, 'Turkmenistan', 'TM', 'TKM', '', 0, 1),
(217, 'Turks and Caicos Islands', 'TC', 'TCA', '', 0, 1),
(218, 'Tuvalu', 'TV', 'TUV', '', 0, 1),
(219, 'Uganda', 'UG', 'UGA', '', 0, 1),
(220, 'Ukraine', 'UA', 'UKR', '', 0, 1),
(221, 'United Arab Emirates', 'AE', 'ARE', '', 0, 1),
(222, 'United Kingdom', 'GB', 'GBR', '', 1, 1),
(223, 'United States', 'US', 'USA', '{firstname} {lastname}\r\n{company}\r\n{address_1}\r\n{address_2}\r\n{city}, {zone} {postcode}\r\n{country}', 0, 1),
(224, 'United States Minor Outlying Islands', 'UM', 'UMI', '', 0, 1),
(225, 'Uruguay', 'UY', 'URY', '', 0, 1),
(226, 'Uzbekistan', 'UZ', 'UZB', '', 0, 1),
(227, 'Vanuatu', 'VU', 'VUT', '', 0, 1),
(228, 'Vatican City State (Holy See)', 'VA', 'VAT', '', 0, 1),
(229, 'Venezuela', 'VE', 'VEN', '', 0, 1),
(230, 'Viet Nam', 'VN', 'VNM', '', 0, 1),
(231, 'Virgin Islands (British)', 'VG', 'VGB', '', 0, 1),
(232, 'Virgin Islands (U.S.)', 'VI', 'VIR', '', 0, 1),
(233, 'Wallis and Futuna Islands', 'WF', 'WLF', '', 0, 1),
(234, 'Western Sahara', 'EH', 'ESH', '', 0, 1),
(235, 'Yemen', 'YE', 'YEM', '', 0, 1),
(237, 'Democratic Republic of Congo', 'CD', 'COD', '', 0, 1),
(238, 'Zambia', 'ZM', 'ZMB', '', 0, 1),
(239, 'Zimbabwe', 'ZW', 'ZWE', '', 0, 1),
(242, 'Montenegro', 'ME', 'MNE', '', 0, 1),
(243, 'Serbia', 'RS', 'SRB', '', 0, 1),
(244, 'Aaland Islands', 'AX', 'ALA', '', 0, 1),
(245, 'Bonaire, Sint Eustatius and Saba', 'BQ', 'BES', '', 0, 1),
(246, 'Curacao', 'CW', 'CUW', '', 0, 1),
(247, 'Palestinian Territory, Occupied', 'PS', 'PSE', '', 0, 1),
(248, 'South Sudan', 'SS', 'SSD', '', 0, 1),
(249, 'St. Barthelemy', 'BL', 'BLM', '', 0, 1),
(250, 'St. Martin (French part)', 'MF', 'MAF', '', 0, 1),
(251, 'Canary Islands', 'IC', 'ICA', '', 0, 1),
(252, 'Ascension Island (British)', 'AC', 'ASC', '', 0, 1),
(253, 'Kosovo, Republic of', 'XK', 'UNK', '', 0, 1),
(254, 'Isle of Man', 'IM', 'IMN', '', 0, 1),
(255, 'Tristan da Cunha', 'TA', 'SHN', '', 0, 1),
(256, 'Guernsey', 'GG', 'GGY', '', 0, 1),
(257, 'Jersey', 'JE', 'JEY', '', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `extraconditions`
--

CREATE TABLE `extraconditions` (
  `id` int(11) NOT NULL,
  `title_en` varchar(355) DEFAULT NULL,
  `title_ar` varchar(355) CHARACTER SET utf8 DEFAULT NULL,
  `icon` varchar(355) DEFAULT NULL,
  `content_en` text,
  `content_ar` text CHARACTER SET utf8,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `extraconditions`
--

INSERT INTO `extraconditions` (`id`, `title_en`, `title_ar`, `icon`, `content_en`, `content_ar`, `created`, `modified`) VALUES
(1, 'Smart Casual', 'عارضة عارضة', '1510294893smart_casual.png', 'test dsfd fdsf sdds fdsf ', 'تيست دسفد فدسف سدس فدسف', '2017-11-03 11:32:34', '2017-11-10 06:21:33'),
(2, 'Physical Strength Required', 'القوة البدنية المطلوبة', '1510294982physical_strength.png', 'asfasfasf', 'سفاسفصف', '2017-11-07 12:49:40', '2017-11-10 06:23:02'),
(4, 'Vegetarian Food Available', 'الأطعمة النباتية متوفرة', '1510295258vegetarian.png', 'Test Content', 'اختبار المحتوى', '2017-11-10 06:27:38', '2017-11-10 06:27:38');

-- --------------------------------------------------------

--
-- Table structure for table `galleries`
--

CREATE TABLE `galleries` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `file` varchar(355) DEFAULT NULL,
  `type` varchar(255) DEFAULT NULL,
  `format` varchar(355) DEFAULT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `galleries`
--

INSERT INTO `galleries` (`id`, `user_id`, `file`, `type`, `format`, `created`, `modified`) VALUES
(5, 11, '1502195636hqdefault.jpg', 'image', 'image/jpeg', '2017-08-08 12:33:56', '2017-08-08 12:33:56'),
(2, 11, '1502191930video-2012-07-05-02-29-27.mp4', 'video', 'video/mp4', '2017-08-08 11:32:10', '2017-08-08 11:32:10'),
(22, 11, '1502450474MAH01585.MP4', 'video', 'video/mp4', '2017-08-11 11:21:14', '2017-08-11 11:21:14'),
(16, 20, '1502446289Hydrangeas.jpg', 'image', 'image/jpeg', '2017-08-11 10:11:29', '2017-08-11 10:11:29'),
(23, 11, '150245067122238782-muskulos-mit-nacktem-oberkorper-mannliche-bodybuilder-ruht-in-der-turnhalle-wahrend-des-trainings-ze.jpg', 'image', 'image/jpeg', '2017-08-11 11:24:31', '2017-08-11 11:24:31'),
(18, 20, '1502446372Video.MOV', 'video', 'video/quicktime', '2017-08-11 10:12:52', '2017-08-11 10:12:52'),
(25, 22, '1502458825Educatext Smartphone tool for teaching copy.mp4', 'video', 'video/mp4', '2017-08-11 13:40:25', '2017-08-11 13:40:25'),
(24, 22, '1502458679Desert.jpg', 'image', 'image/jpeg', '2017-08-11 13:37:59', '2017-08-11 13:37:59'),
(26, 23, '15041062621962867.jpg', 'image', 'image/jpeg', '2017-08-30 15:17:42', '2017-08-30 15:17:42'),
(27, 23, '1504106274162172.jpg', 'image', 'image/jpeg', '2017-08-30 15:17:54', '2017-08-30 15:17:54'),
(28, 23, '15060067171962907.png', 'image', 'image/png', '2017-09-21 15:11:57', '2017-09-21 15:11:57');

-- --------------------------------------------------------

--
-- Table structure for table `homesections`
--

CREATE TABLE `homesections` (
  `id` int(11) NOT NULL,
  `title` varchar(355) DEFAULT NULL,
  `content` text,
  `sort_order` int(11) NOT NULL DEFAULT '0',
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `homesections`
--

INSERT INTO `homesections` (`id`, `title`, `content`, `sort_order`, `created`, `modified`) VALUES
(1, 'Block 1', '<div class=\"section\">\r\n<div class=\"container\">\r\n<div class=\"row\">\r\n<div class=\"col-sm-7 col-lg-push-05 col-xs-12\">\r\n<h3 class=\"h2\">Are you a Personal Trainer?</h3>\r\n<p>Top Local Trainer provide <strong>Personal Trainers in USA</strong>&nbsp;with the tools they need to connect with people looking for their services. Our members take advantage of exclusive features, including enhanced profile visibility on our site, to increase training leads.</p>\r\n<p>Not only that, we&rsquo;ve partnered with some of the best companies in the fitness industry to get you exclusive access to discounts on supplements, educational courses, equipment and a range of the best Personal Training jobs.</p>\r\n<section class=\"trainer-form-container\">\r\n<h5>Improve your knowledge with a course in your area&hellip;</h5>\r\n</section>\r\n</div>\r\n<!-- left col - end -->\r\n<div class=\"col-lg-4 col-lg-push-05 col-sm-5 hidden-xs text-center\">\r\n<div class=\"map map-orange\"><img style=\"width: 100%;\" src=\"images/website/USA-map-blue.svg\" alt=\"\" /></div>\r\n</div>\r\n<!-- right col - end --></div>\r\n</div>\r\n</div>\r\n<hr class=\"home-h-separator\" />', 1, '2017-08-18 06:08:40', '2017-08-31 09:31:17'),
(2, 'Block 2', '<div class=\"create-profile section\"><img class=\"cp-right-img hidden-xs\" src=\"https://www.toplocaltrainer.co.uk/wp-content/themes/tlt/images/devices-home.png\" alt=\"Create your free profile\" width=\"515\" height=\"465\" />\r\n<div class=\"container\">\r\n<div class=\"row\">\r\n<div class=\"cp-inner col-xs-6 col-lg-push-05 col-xxs-12 center-block-xs\">\r\n<h3 class=\"h2 cp-title text-center-xs\">Create your FREE profile</h3>\r\n<img class=\"cp-content-img img-responsive right-block visible-xs\" src=\"https://www.toplocaltrainer.co.uk/wp-content/themes/tlt/images/devices-home.png\" alt=\"Create your FREE profile\" width=\"515\" height=\"465\" />\r\n<ul class=\"list\">\r\n<li>Create your FREE profile and showcase your expertise to people searching for personal trainers in your area</li>\r\n<li>We funnel location-based &lsquo;personal trainer&rsquo; queries from Google, to our search function, to your profile</li>\r\n<li>Drive extra traffic to your website and boost your social media following (Facebook, Twitter, LinkedIn and more)</li>\r\n<li>Out-muscle your competitors &ndash; the faster you sign up, the more leads you get</li>\r\n<li>Receive ongoing enquiries from local people bitten by the fitness bug &ndash; without lifting a finger</li>\r\n</ul>\r\n</div>\r\n</div>\r\n</div>\r\n</div>', 2, '2017-08-18 06:09:55', '2017-10-23 22:46:58'),
(3, 'Block 3', '<div class=\"section cta-section orange-bkg white\">\r\n<div class=\"container\">\r\n<div class=\"row\">\r\n<div class=\"col-md-7 col-lg-push-05 col-sm-7 col-xs-12 text-center-xs\">\r\n<h4 class=\"cta-head\">Create your FREE profile now and showcase your skills<br class=\"visible-lg visible-md\" /> to people searching for personal trainers near you</h4>\r\n</div>\r\n<div class=\"col-lg-4 col-lg-push-05 col-sm-5 col-xs-12 text-center\"><a class=\"btn btn-white btn-md\" href=\"users/add\">Create your FREE profile</a></div>\r\n</div>\r\n</div>\r\n</div>', 3, '2017-08-18 06:12:25', '2017-08-18 07:20:55'),
(5, 'Block 4', '<section class=\"for-searchers grey-bkg\">\r\n<div class=\"section\">\r\n<div class=\"container\">\r\n<div class=\"row\">\r\n<div class=\"col-sm-7 col-lg-push-05 col-xs-12\">\r\n<h3 class=\"h2\">Looking for a Personal Trainer?</h3>\r\n<p>Top Local Trainer is the place to connect with a Personal Trainer in your area. Our network of <strong>expert trainers cover the whole of the USA</strong>, meaning there&rsquo;s at least one, just around the corner from you. Whether you want to get fit, lose weight, or generally improve your wellbeing, we have a fully-qualified trainer that can help. It&rsquo;s free to search, so what are you waiting for?</p>\r\n<section class=\"trainer-form-container\">\r\n<h5>There&rsquo;s an expert fitness trainer waiting near you&hellip;</h5>\r\n<form id=\"sl_search_form\" class=\"home-form\" action=\"trainer\" method=\"get\">\r\n<div class=\"row\">\r\n<div class=\"col-xs-7 col-xxs-12\">\r\n<div class=\"form-group\">\r\n<div class=\"sl-input-box greybg home-input-text\"><input id=\"txtPlaces2\" class=\"sl_post_input greybg form-control\" name=\"search\" type=\"text\" placeholder=\"Enter Location\" /> <input id=\"latitude1\" class=\"form-control\" name=\"latitude\" type=\"hidden\" /> <input id=\"longitude1\" class=\"form-control\" name=\"longitude\" type=\"hidden\" /></div>\r\n</div>\r\n</div>\r\n<div class=\"col-xs-5 col-xxs-12 text-center-xxs\"><input class=\"sl-input-submit home-green-btn-big btn btn-md btn-green\" type=\"submit\" value=\"Find My Trainer\" /></div>\r\n</div>\r\n</form></section>\r\n</div>\r\n<!-- left col - end -->\r\n<div class=\"col-lg-4 col-lg-push-05 col-sm-5 hidden-xs text-center\"><img style=\"width: 100%;\" src=\"images/website/USA-map-blue.svg\" alt=\"\" /></div>\r\n<!-- right col - end --></div>\r\n</div>\r\n</div>\r\n</section>', 4, '2017-08-18 06:40:21', '2017-08-31 06:51:31'),
(6, 'Sponsored By', '<section class=\"section other-loc dark-grey-bkg white\">\r\n<div class=\"container\">\r\n<h3 class=\"h2 text-center\">Sponsored By</h3>\r\n<div class=\"clearfix\">\r\n<div class=\"col-xs-12\">&nbsp;</div>\r\n</div>\r\n</div>\r\n</section>', 0, '2017-09-06 05:43:50', '2017-09-06 12:42:08');

-- --------------------------------------------------------

--
-- Table structure for table `links`
--

CREATE TABLE `links` (
  `id` int(255) NOT NULL,
  `name` varchar(355) DEFAULT NULL,
  `icon` varchar(355) DEFAULT NULL,
  `link` varchar(355) DEFAULT NULL,
  `background` varchar(355) DEFAULT '#000',
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `links`
--

INSERT INTO `links` (`id`, `name`, `icon`, `link`, `background`, `created`, `modified`) VALUES
(3, 'Facebook', 'fa-facebook', 'https://facebook.com', '#3460A1', '0000-00-00 00:00:00', '2017-08-21 08:25:11'),
(4, 'Twitter', 'fa-twitter', 'https://twitter.com', '#28AAE1', '0000-00-00 00:00:00', '2017-08-21 08:26:08'),
(5, 'Linkedin', 'fa-linkedin', 'https://linkedin.com', '#136D9D', '0000-00-00 00:00:00', '2017-08-21 08:27:29'),
(6, 'Google Plus', 'fa-google-plus', 'https://plus.google.com', '#DE5543', '0000-00-00 00:00:00', '2017-08-21 08:26:34');

-- --------------------------------------------------------

--
-- Table structure for table `locations`
--

CREATE TABLE `locations` (
  `id` int(11) NOT NULL,
  `name_en` text,
  `name_ar` varchar(355) CHARACTER SET utf8 DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `locations`
--

INSERT INTO `locations` (`id`, `name_en`, `name_ar`, `created`, `modified`) VALUES
(2, 'Bangkok', 'بانكوك', '2017-11-01 06:52:13', '2017-11-09 06:49:52'),
(4, 'Chandigarh', 'شانديغار', '2017-11-01 07:30:22', '2017-11-09 06:56:49');

-- --------------------------------------------------------

--
-- Table structure for table `meetingpoints`
--

CREATE TABLE `meetingpoints` (
  `id` int(11) NOT NULL,
  `location_id` int(11) DEFAULT NULL,
  `meetingpointtype_id` int(11) DEFAULT NULL,
  `title_en` text,
  `title_ar` text CHARACTER SET utf8,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `meetingpoints`
--

INSERT INTO `meetingpoints` (`id`, `location_id`, `meetingpointtype_id`, `title_en`, `title_ar`, `created`, `modified`) VALUES
(1, 2, 2, 'Don Mueang International Airport', 'دون موينغ إنترناشونال إيربورت', '2017-11-01 10:38:18', '2017-11-09 13:02:02'),
(2, 4, 1, 'Suvarnabhumi Airport', 'مطار سوفارنابهومي', '2017-11-01 10:39:19', '2017-11-09 13:01:16'),
(3, 2, 2, 'Any Station', 'أي محطة', '2017-11-01 10:40:31', '2017-11-09 13:02:25');

-- --------------------------------------------------------

--
-- Table structure for table `meetingpointtypes`
--

CREATE TABLE `meetingpointtypes` (
  `id` int(11) NOT NULL,
  `location_id` int(11) DEFAULT NULL,
  `title_en` text,
  `title_ar` varchar(355) CHARACTER SET utf8 DEFAULT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `meetingpointtypes`
--

INSERT INTO `meetingpointtypes` (`id`, `location_id`, `title_en`, `title_ar`, `created`, `modified`) VALUES
(1, 4, 'Airport', 'مطار', '2017-11-01 09:44:10', '2017-12-08 09:07:35'),
(2, 2, 'BTS Station', 'بتس', '2017-11-01 10:40:07', '2017-12-08 09:03:21');

-- --------------------------------------------------------

--
-- Table structure for table `priceconditions`
--

CREATE TABLE `priceconditions` (
  `id` int(11) NOT NULL,
  `title_en` varchar(355) DEFAULT NULL,
  `title_ar` varchar(355) CHARACTER SET utf8 DEFAULT NULL,
  `content_en` text,
  `content_ar` text CHARACTER SET utf8,
  `price` varchar(355) DEFAULT NULL,
  `price_content_en` text,
  `price_content_ar` text CHARACTER SET utf8,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `priceconditions`
--

INSERT INTO `priceconditions` (`id`, `title_en`, `title_ar`, `content_en`, `content_ar`, `price`, `price_content_en`, `price_content_ar`, `created`, `modified`) VALUES
(1, 'test price condition', 'اختبار حالة السعر', 'sdf dsfdsf dsf', 'سدف دسفدسف دسف', '10-150', 'dfsgfdsg fdgdfg', 'دفسغفسغ فدغدفغ', '2017-11-03 13:05:26', '2017-11-09 13:22:41');

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `id` int(11) NOT NULL,
  `trainer_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `rating` int(11) DEFAULT NULL,
  `review` text,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`id`, `trainer_id`, `user_id`, `rating`, `review`, `created`, `modified`) VALUES
(1, 11, 12, 2, 'Hello', '2017-08-16 07:19:38', '2017-08-16 07:19:38'),
(2, 20, 24, 4, 'rfrefef', '2017-08-17 10:36:32', '2017-08-17 10:36:32'),
(4, 18, 11, 2, 'hello', '2017-08-17 10:46:25', '2017-08-17 10:46:25'),
(5, 11, 24, 3, 'hello 2', '2017-08-17 11:59:13', '2017-08-18 10:43:41'),
(6, 18, 12, 3, 'Best trainer', '2017-08-18 11:07:00', '2017-08-18 11:07:00'),
(7, 11, 31, 5, 'eruytriutuiytuiyhhkljhjkljhk;l', '2017-08-30 11:29:34', '2017-08-30 11:29:34');

-- --------------------------------------------------------

--
-- Table structure for table `staticpages`
--

CREATE TABLE `staticpages` (
  `id` int(11) NOT NULL,
  `slug` varchar(355) DEFAULT NULL,
  `title` varchar(355) DEFAULT NULL,
  `image` varchar(355) DEFAULT NULL,
  `content` text,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `staticpages`
--

INSERT INTO `staticpages` (`id`, `slug`, `title`, `image`, `content`, `created`, `modified`) VALUES
(2, 'about-us', 'About Us', '1502957995hqdefault.jpg', '<section class=\"wrapper-full section grey-bkg\">\r\n<div class=\"container\">\r\n<div class=\"contain\">\r\n<p>&nbsp;</p>\r\n<p><strong>Our team has wealth of experience from Fitness Instructors and Personal Training to National Personal Training Managers and Master Trainers for leading international fitness brands.</strong></p>\r\n<p>As a business we understand what it takes for a Personal Trainers <strong>to build a Personal Training business with longevity</strong>.</p>\r\n<p>&nbsp;</p>\r\n<br />\r\n<p>This means when you create a <strong>profile on our site it will show in front of hundreds or thousands of people searching for a Personal Trainer</strong>.</p>\r\n<p>&nbsp;</p>\r\n<p>&nbsp;</p>\r\n</div>\r\n</div>\r\n</section>', '2017-08-17 07:53:51', '2017-10-23 22:45:38'),
(4, 'privacy-policy', 'Privacy policy', '150295817622238782-muskulos-mit-nacktem-oberkorper-mannliche-bodybuilder-ruht-in-der-turnhalle-wahrend-des-trainings-ze.jpg', '<section class=\"wrapper-full section grey-bkg\">\r\n<div class=\"container\">\r\n<div class=\"contain\">\r\n<p>We are committed to safeguarding the privacy of our website visitors; this policy&nbsp;sets out how we will treat your personal information. <strong>&nbsp;</strong>Our website uses cookies.&nbsp; By using our website and agreeing to this policy, you consent to our use of cookies in accordance with the terms of this policy. <strong>&nbsp;</strong></p>\r\n<p><strong>(1)&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; What information do we collect?</strong></p>\r\n<p>We may collect, store and use the following kinds of personal information:</p>\r\n<p>(a)&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; information about your computer and about your visits to and use of this website (including your IP address, geographical location, browser type and version, operating system, referral source, length of visit, page views, website navigation and e-mail address);</p>\r\n<p>(b)&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; information relating to any transactions carried out between you and us on or in relation to this website, including information relating to any purchases you make of our goods or services.</p>\r\n<p>(c)&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; information that you provide to us for the purpose of registering with us (including your IP address, geographical location, browser type and version, operating system, referral source, length of visit, page views, website navigation and e-mail address);</p>\r\n<p>(d)&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; information that you provide to us for the purpose of subscribing to our website services, email notifications and/or newsletters (including your IP address, geographical location, browser type and version, operating system, referral source, length of visit, page views, website navigation and e-mail address);</p>\r\n<p>(e)&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; any other information that you choose to send to us; and</p>\r\n<p><strong>(2)&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Cookies</strong></p>\r\n<p>A cookie consists of a piece of text sent by a web server to a web browser, and stored by the browser. The information is then sent back to the server each time the browser requests a page from the server. This enables the web server to identify and track the web browser.</p>\r\n<p>We may use both &ldquo;session&rdquo; cookies and &ldquo;persistent&rdquo; cookies on the website.&nbsp; We will use the session cookies to: keep track of you whilst you navigate the website; and <em>other uses</em>.&nbsp; We will use the persistent cookies to: enable our website to recognise you when you visit; and <em>other uses</em>. Session cookies will be deleted from your computer when you close your browser.&nbsp; Persistent cookies will remain stored on your computer until deleted, or until they reach a specified expiry date.</p>\r\n<p>We use Google Analytics to analyse the use of this website.&nbsp; Google Analytics generates statistical and other information about website use by means of cookies, which are stored on users&rsquo; computers.&nbsp; The information generated relating to our website is used to create reports about the use of the website. Google will store this information.&nbsp; Google&rsquo;s privacy policy is available at: http://www.google.com/privacypolicy.html. Our advertisers/payment services providers may also send you cookies.</p>\r\n<p>Most browsers allow you to reject all cookies, whilst some browsers allow you to reject just third party cookies.&nbsp; For example, in Internet Explorer you can refuse all cookies by clicking &ldquo;Tools&rdquo;, &ldquo;Internet Options&rdquo;, &ldquo;Privacy&rdquo;, and selecting &ldquo;Block all cookies&rdquo; using the sliding selector.&nbsp; Blocking all cookies will, however, have a negative impact upon the usability of many websites, including this one.</p>\r\n<p><strong>(3)&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Using your personal information</strong></p>\r\n<p>Personal information submitted to us via this website will be used for the purposes specified in this privacy policy or in relevant parts of the website. We may use your personal information to:</p>\r\n<p>(a)&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; administer the website;</p>\r\n<p>(b)&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; improve your browsing experience by personalising the website;</p>\r\n<p>(c)&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; enable your use of the services available on the website;</p>\r\n<p>(d)&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; send to you goods purchased via the website, and supply to you services purchased via the website;</p>\r\n<p>(e)&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; send statements and invoices to you, and collect payments from you;</p>\r\n<p>(f)&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; send you general (non-marketing) commercial communications;</p>\r\n<p>(g)&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; send you email notifications which you have specifically requested</p>\r\n<p>(h)&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; send to you our newsletter and other marketing communications relating to our business or the businesses of carefully-selected third parties which we think may be of interest to you by post or, where you have specifically agreed to this, by email or similar technology (you can inform us at any time if you no longer require marketing communications);</p>\r\n<p>(i)&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; provide third parties with statistical information about our users &ndash; but this information will not be used to identify any individual user;</p>\r\n<p>(j)&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; deal with enquiries and complaints made by or about you relating to the website; and</p>\r\n<p>(k)&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Where you submit personal information for publication on our website, we will publish and otherwise use that information in accordance with the licence you grant to us. We will not without your express consent provide your personal information to any third parties for the purpose of direct marketing. All our website financial transactions are handled through our payment services provider, PayPal.&nbsp; You can review the PayPal privacy policy at www.paypal.com.&nbsp; We will share information with&nbsp; PayPal only to the extent necessary for the purposes of processing payments you make via our website and dealing with complaints and queries relating to such payments.&nbsp;We do not store your payment details but Paypal do.</p>\r\n<p><strong>(4) &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Disclosures</strong></p>\r\n<p>We may disclose information about you to any of our employees, officers, agents, suppliers or subcontractors insofar as reasonably necessary for the purposes as set out in this privacy policy. In addition, we may disclose your personal information:</p>\r\n<p>(a)&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; to the extent that we are required to do so by law;</p>\r\n<p>(b)&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; in connection with any legal proceedings or prospective legal proceedings;</p>\r\n<p>(c)&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; in order to establish, exercise or defend our legal rights (including providing information to others for the purposes of fraud prevention and reducing credit risk);</p>\r\n<p>(d)&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; to the purchaser (or prospective purchaser) of any business or asset that we are (or are contemplating) selling; and</p>\r\n<p>(e)&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; to any person who we reasonably believe may apply to a court or other competent authority for disclosure of that personal information where, in our reasonable opinion, such court or authority would be reasonably likely to order disclosure of that personal information. Except as provided in this privacy policy, we will not provide your information to third parties.</p>\r\n<p><strong>(5)&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; International data transfers</strong></p>\r\n<p>Information that we collect may be stored and processed in and transferred between any of the countries in which we operate in order to enable us to use the information in accordance with this privacy policy. Information which you provide may be transferred to countries (including the United States, Japan, <em>other countries</em>) which do not have data protection laws equivalent to those in force in the European Economic Area. In addition, personal information that you submit for publication on the website will be published on the internet and may be available, via the internet, around the world.&nbsp; We cannot prevent the use or misuse of such information by others You expressly agree to such transfers of personal information.</p>\r\n<p><strong>(6)&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Security of your personal information</strong></p>\r\n<p>We will take reasonable technical and organisational precautions to prevent the loss, misuse or alteration of your personal information. We will store all the personal information you provide on our secure (password- and firewall- protected) servers. All electronic transactions you make to or receive from us will be encrypted using SSL technology. <a title=\"\" href=\"#_ftn16\">[16</a>] Of course, data transmission over the internet is inherently insecure, and we cannot guarantee the security of data sent over the internet. You are responsible for keeping your password and user details confidential. We will not ask you for your password (except when you log in to the website).</p>\r\n<p><strong>(7)&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Policy amendments</strong></p>\r\n<p>We may update this privacy policy from time-to-time by posting a new version on our website.&nbsp; You should check this page occasionally to ensure you are happy with any changes. We may also notify you of changes to our privacy policy by email.</p>\r\n<p><strong>(8)&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Your rights</strong></p>\r\n<p>You may instruct us to provide you with any personal information we hold about you.&nbsp; Provision of such information will be subject to:</p>\r\n<p>(a)&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; the payment of a fee (currently fixed at &pound;10.00); and</p>\r\n<p>(b)&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; the supply of appropriate evidence of your identity (for this purpose, we will usually accept a photocopy of your passport certified by a solicitor or bank plus an original copy of a utility bill showing your current address). We may withhold such personal information to the extent permitted by law. You may instruct us not to process your personal information for marketing purposes, by sending an email to us.&nbsp; In practice, you will usually either expressly agree in advance to our use of your personal information for marketing purposes, or we will provide you with an opportunity to opt-out of the use of your personal information for marketing purposes.</p>\r\n<p><strong>(9)&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Third party websites</strong></p>\r\n<p>The website contains links to other websites. We are not responsible for the privacy policies or practices of third party websites.</p>\r\n<p><strong>(10)&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Updating information</strong></p>\r\n<p>Please let us know if the personal information which we hold about you needs to be corrected or updated.</p>\r\n<p><strong>(11) &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Contact</strong></p>\r\n<p>If you have any questions about this privacy policy or our treatment of your personal information, please write to us by email to <em>info@toplocaltrainer.co.uk</em> or by post to <em>Top Local Trainer, 8 Joan Crescent, Eltham, London, SE95RS</em>.</p>\r\n<p><strong>(12)&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Data controller</strong></p>\r\n<p>The data controller responsible in respect of the information collected on this website is <em>Hatzidakis Ltd t/a Top Local Trainer.</em></p>\r\n</div>\r\n</div>\r\n</section>', '2017-08-17 08:22:56', '2017-08-17 10:11:11'),
(5, 'terms-and-conditions', 'Terms And Conditions', '1502962074greatest handsome bodybuilders pictures and images (217).jpg', '<section class=\"wrapper-full section grey-bkg\">\r\n<div class=\"container\">\r\n<div class=\"contain\">\r\n<p>We are committed to safeguarding the privacy of our website visitors; this policy&nbsp;sets out how we will treat your personal information. <strong>&nbsp;</strong>Our website uses cookies.&nbsp; By using our website and agreeing to this policy, you consent to our use of cookies in accordance with the terms of this policy. <strong>&nbsp;</strong></p>\r\n<p><strong>(1)&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; What information do we collect?</strong></p>\r\n<p>We may collect, store and use the following kinds of personal information:</p>\r\n<p>(a)&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; information about your computer and about your visits to and use of this website (including your IP address, geographical location, browser type and version, operating system, referral source, length of visit, page views, website navigation and e-mail address);</p>\r\n<p>(b)&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; information relating to any transactions carried out between you and us on or in relation to this website, including information relating to any purchases you make of our goods or services.</p>\r\n<p>(c)&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; information that you provide to us for the purpose of registering with us (including your IP address, geographical location, browser type and version, operating system, referral source, length of visit, page views, website navigation and e-mail address);</p>\r\n<p>(d)&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; information that you provide to us for the purpose of subscribing to our website services, email notifications and/or newsletters (including your IP address, geographical location, browser type and version, operating system, referral source, length of visit, page views, website navigation and e-mail address);</p>\r\n<p>(e)&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; any other information that you choose to send to us; and</p>\r\n<p><strong>(2)&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Cookies</strong></p>\r\n<p>A cookie consists of a piece of text sent by a web server to a web browser, and stored by the browser. The information is then sent back to the server each time the browser requests a page from the server. This enables the web server to identify and track the web browser.</p>\r\n<p>We may use both &ldquo;session&rdquo; cookies and &ldquo;persistent&rdquo; cookies on the website.&nbsp; We will use the session cookies to: keep track of you whilst you navigate the website; and <em>other uses</em>.&nbsp; We will use the persistent cookies to: enable our website to recognise you when you visit; and <em>other uses</em>. Session cookies will be deleted from your computer when you close your browser.&nbsp; Persistent cookies will remain stored on your computer until deleted, or until they reach a specified expiry date.</p>\r\n<p>We use Google Analytics to analyse the use of this website.&nbsp; Google Analytics generates statistical and other information about website use by means of cookies, which are stored on users&rsquo; computers.&nbsp; The information generated relating to our website is used to create reports about the use of the website. Google will store this information.&nbsp; Google&rsquo;s privacy policy is available at: http://www.google.com/privacypolicy.html. Our advertisers/payment services providers may also send you cookies.</p>\r\n<p>Most browsers allow you to reject all cookies, whilst some browsers allow you to reject just third party cookies.&nbsp; For example, in Internet Explorer you can refuse all cookies by clicking &ldquo;Tools&rdquo;, &ldquo;Internet Options&rdquo;, &ldquo;Privacy&rdquo;, and selecting &ldquo;Block all cookies&rdquo; using the sliding selector.&nbsp; Blocking all cookies will, however, have a negative impact upon the usability of many websites, including this one.</p>\r\n<p><strong>(3)&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Using your personal information</strong></p>\r\n<p>Personal information submitted to us via this website will be used for the purposes specified in this privacy policy or in relevant parts of the website. We may use your personal information to:</p>\r\n<p>(a)&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; administer the website;</p>\r\n<p>(b)&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; improve your browsing experience by personalising the website;</p>\r\n<p>(c)&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; enable your use of the services available on the website;</p>\r\n<p>(d)&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; send to you goods purchased via the website, and supply to you services purchased via the website;</p>\r\n<p>(e)&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; send statements and invoices to you, and collect payments from you;</p>\r\n<p>(f)&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; send you general (non-marketing) commercial communications;</p>\r\n<p>(g)&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; send you email notifications which you have specifically requested</p>\r\n<p>(h)&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; send to you our newsletter and other marketing communications relating to our business or the businesses of carefully-selected third parties which we think may be of interest to you by post or, where you have specifically agreed to this, by email or similar technology (you can inform us at any time if you no longer require marketing communications);</p>\r\n<p>(i)&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; provide third parties with statistical information about our users &ndash; but this information will not be used to identify any individual user;</p>\r\n<p>(j)&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; deal with enquiries and complaints made by or about you relating to the website; and</p>\r\n<p>(k)&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Where you submit personal information for publication on our website, we will publish and otherwise use that information in accordance with the licence you grant to us. We will not without your express consent provide your personal information to any third parties for the purpose of direct marketing. All our website financial transactions are handled through our payment services provider, PayPal.&nbsp; You can review the PayPal privacy policy at www.paypal.com.&nbsp; We will share information with&nbsp; PayPal only to the extent necessary for the purposes of processing payments you make via our website and dealing with complaints and queries relating to such payments.&nbsp;We do not store your payment details but Paypal do.</p>\r\n<p><strong>(4) &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Disclosures</strong></p>\r\n<p>We may disclose information about you to any of our employees, officers, agents, suppliers or subcontractors insofar as reasonably necessary for the purposes as set out in this privacy policy. In addition, we may disclose your personal information:</p>\r\n<p>(a)&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; to the extent that we are required to do so by law;</p>\r\n<p>(b)&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; in connection with any legal proceedings or prospective legal proceedings;</p>\r\n<p>(c)&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; in order to establish, exercise or defend our legal rights (including providing information to others for the purposes of fraud prevention and reducing credit risk);</p>\r\n<p>(d)&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; to the purchaser (or prospective purchaser) of any business or asset that we are (or are contemplating) selling; and</p>\r\n<p>(e)&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; to any person who we reasonably believe may apply to a court or other competent authority for disclosure of that personal information where, in our reasonable opinion, such court or authority would be reasonably likely to order disclosure of that personal information. Except as provided in this privacy policy, we will not provide your information to third parties.</p>\r\n<p><strong>(5)&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; International data transfers</strong></p>\r\n<p>Information that we collect may be stored and processed in and transferred between any of the countries in which we operate in order to enable us to use the information in accordance with this privacy policy. Information which you provide may be transferred to countries (including the United States, Japan, <em>other countries</em>) which do not have data protection laws equivalent to those in force in the European Economic Area. In addition, personal information that you submit for publication on the website will be published on the internet and may be available, via the internet, around the world.&nbsp; We cannot prevent the use or misuse of such information by others You expressly agree to such transfers of personal information.</p>\r\n<p><strong>(6)&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Security of your personal information</strong></p>\r\n<p>We will take reasonable technical and organisational precautions to prevent the loss, misuse or alteration of your personal information. We will store all the personal information you provide on our secure (password- and firewall- protected) servers. All electronic transactions you make to or receive from us will be encrypted using SSL technology. <a title=\"\" href=\"#_ftn16\">[16</a>] Of course, data transmission over the internet is inherently insecure, and we cannot guarantee the security of data sent over the internet. You are responsible for keeping your password and user details confidential. We will not ask you for your password (except when you log in to the website).</p>\r\n<p><strong>(7)&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Policy amendments</strong></p>\r\n<p>We may update this privacy policy from time-to-time by posting a new version on our website.&nbsp; You should check this page occasionally to ensure you are happy with any changes. We may also notify you of changes to our privacy policy by email.</p>\r\n<p><strong>(8)&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Your rights</strong></p>\r\n<p>You may instruct us to provide you with any personal information we hold about you.&nbsp; Provision of such information will be subject to:</p>\r\n<p>(a)&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; the payment of a fee (currently fixed at &pound;10.00); and</p>\r\n<p>(b)&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; the supply of appropriate evidence of your identity (for this purpose, we will usually accept a photocopy of your passport certified by a solicitor or bank plus an original copy of a utility bill showing your current address). We may withhold such personal information to the extent permitted by law. You may instruct us not to process your personal information for marketing purposes, by sending an email to us.&nbsp; In practice, you will usually either expressly agree in advance to our use of your personal information for marketing purposes, or we will provide you with an opportunity to opt-out of the use of your personal information for marketing purposes.</p>\r\n<p><strong>(9)&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Third party websites</strong></p>\r\n<p>The website contains links to other websites. We are not responsible for the privacy policies or practices of third party websites.</p>\r\n<p><strong>(10)&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Updating information</strong></p>\r\n<p>Please let us know if the personal information which we hold about you needs to be corrected or updated.</p>\r\n<p><strong>(11) &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Contact</strong></p>\r\n<p>If you have any questions about this privacy policy or our treatment of your personal information, please write to us by email to <em>info@toplocaltrainer.co.uk</em> or by post to <em>Top Local Trainer, 8 Joan Crescent, Eltham, London, SE95RS</em>.</p>\r\n<p><strong>(12)&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Data controller</strong></p>\r\n<p>The data controller responsible in respect of the information collected on this website is <em>Hatzidakis Ltd t/a Top Local Trainer.</em></p>\r\n</div>\r\n</div>\r\n</section>', '2017-08-17 09:27:54', '2017-08-17 10:11:44');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_county`
--

CREATE TABLE `tbl_county` (
  `id` int(11) NOT NULL,
  `county` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_county`
--

INSERT INTO `tbl_county` (`id`, `county`) VALUES
(1, 'test'),
(2, 'test2'),
(3, 'test2'),
(4, 'Adair '),
(5, 'Guthrie'),
(6, 'Adams'),
(7, 'Adams '),
(8, 'Taylor'),
(9, 'Allamakee'),
(10, 'Allamakee '),
(11, 'Clayton'),
(12, 'Appanoose'),
(13, 'Appanoose '),
(14, 'Monroe'),
(15, 'Audubon'),
(16, 'Benton'),
(17, 'Benton '),
(18, 'Linn'),
(19, 'Black Hawk'),
(20, 'Black Hawk '),
(21, 'Bremer'),
(22, 'Black Hawk '),
(23, 'Buchanan'),
(24, 'Boone'),
(25, 'Boone '),
(26, 'Dallas'),
(27, 'Boone '),
(28, 'Polk '),
(29, 'Story'),
(30, 'Bremer'),
(31, 'Bremer '),
(32, 'Fayette'),
(33, 'Buchanan'),
(34, 'Buchanan '),
(35, 'Fayette'),
(36, 'Buena Vista'),
(37, 'Butler'),
(38, 'Butler '),
(39, 'Floyd'),
(40, 'Calhoun'),
(41, 'Calhoun '),
(42, 'Sac'),
(43, 'Calhoun '),
(44, 'Webster'),
(45, 'Carroll'),
(46, 'Carroll '),
(47, 'Greene'),
(48, 'Carroll '),
(49, 'Guthrie'),
(50, 'Cass'),
(51, 'Cedar'),
(52, 'Cedar '),
(53, 'Johnson'),
(54, 'Cedar '),
(55, 'Muscatine'),
(56, 'Cedar '),
(57, 'Muscatine '),
(58, 'Scott'),
(59, 'Cerro Gordo'),
(60, 'Cerro Gordo '),
(61, 'Floyd'),
(62, 'Cherokee'),
(63, 'Chickasaw'),
(64, 'Chickasaw '),
(65, 'Floyd'),
(66, 'Chickasaw '),
(67, 'Howard'),
(68, 'Clarke'),
(69, 'Clay'),
(70, 'Clayton'),
(71, 'Clayton '),
(72, 'Delaware'),
(73, 'Clinton'),
(74, 'Clinton '),
(75, 'Jackson'),
(76, 'Crawford'),
(77, 'Crawford '),
(78, 'Harrison'),
(79, 'Dallas'),
(80, 'Dallas '),
(81, 'Madison '),
(82, 'Polk '),
(83, 'War...'),
(84, 'Dallas '),
(85, 'Polk'),
(86, 'Davis'),
(87, 'Decatur'),
(88, 'Delaware'),
(89, 'Delaware '),
(90, 'Dubuque'),
(91, 'Des Moines'),
(92, 'Dickinson'),
(93, 'Dubuque'),
(94, 'Dubuque '),
(95, 'Jackson'),
(96, 'Dubuque '),
(97, 'Jones'),
(98, 'Emmet'),
(99, 'Fayette'),
(100, 'Floyd'),
(101, 'Franklin'),
(102, 'Franklin '),
(103, 'Hardin'),
(104, 'Franklin '),
(105, 'Wright'),
(106, 'Fremont'),
(107, 'Fremont '),
(108, 'Mills'),
(109, 'Fremont '),
(110, 'Page'),
(111, 'Greene'),
(112, 'Grundy'),
(113, 'Guthrie'),
(114, 'Hamilton'),
(115, 'Hamilton '),
(116, 'Webster'),
(117, 'Hancock'),
(118, 'Hancock '),
(119, 'Winnebago'),
(120, 'Hardin'),
(121, 'Harrison'),
(122, 'Henry'),
(123, 'Henry '),
(124, 'Jefferson '),
(125, 'Washington Count...'),
(126, 'Howard'),
(127, 'Howard '),
(128, 'Mitchell'),
(129, 'Humboldt'),
(130, 'Humboldt '),
(131, 'Kossuth'),
(132, 'Humboldt '),
(133, 'Pocahontas'),
(134, 'Ida'),
(135, 'Iowa'),
(136, 'Iowa '),
(137, 'Keokuk'),
(138, 'Iowa '),
(139, 'Poweshiek'),
(140, 'Jackson'),
(141, 'Jasper'),
(142, 'Jasper '),
(143, 'Polk'),
(144, 'Jefferson'),
(145, 'Johnson'),
(146, 'Jones'),
(147, 'Keokuk'),
(148, 'Keokuk '),
(149, 'Washington'),
(150, 'Kossuth'),
(151, 'Kossuth '),
(152, 'Palo Alto'),
(153, ' '),
(154, 'Lee'),
(155, 'Linn'),
(156, 'Louisa'),
(157, 'Lucas'),
(158, 'Lyon'),
(159, 'Madison'),
(160, 'Madison '),
(161, 'Warren'),
(162, 'Mahaska'),
(163, 'Mahaska '),
(164, 'Marion'),
(165, 'Mahaska '),
(166, 'Monroe '),
(167, 'Wapello'),
(168, 'Mahaska '),
(169, 'Poweshiek'),
(170, 'Marion'),
(171, 'Marshall'),
(172, 'Marshall '),
(173, 'Tama'),
(174, 'Mills'),
(175, 'Mitchell'),
(176, 'Monona'),
(177, 'Monroe'),
(178, 'Montgomery'),
(179, 'Muscatine'),
(180, 'Muscatine '),
(181, 'Scott'),
(182, 'O Brien'),
(183, 'O Brien '),
(184, 'Sioux'),
(185, 'Osceola'),
(186, 'Page'),
(187, 'Palo Alto'),
(188, 'Plymouth'),
(189, 'Plymouth '),
(190, 'Woodbury'),
(191, 'Pocahontas'),
(192, 'Polk'),
(193, 'Polk '),
(194, 'Warren'),
(195, 'Pottawattamie'),
(196, 'Pottawattamie '),
(197, 'Shelby'),
(198, 'Poweshiek'),
(199, 'Ringgold'),
(200, 'Ringgold '),
(201, 'Taylor'),
(202, 'Ringgold '),
(203, 'Union'),
(204, 'Sac'),
(205, 'Scott'),
(206, 'Shelby'),
(207, 'Sioux'),
(208, 'Story'),
(209, 'Tama'),
(210, 'Taylor'),
(211, 'Union'),
(212, 'Van Buren'),
(213, 'Wapello'),
(214, 'Warren'),
(215, 'Washington'),
(216, 'Wayne'),
(217, 'Webster'),
(218, 'Winnebago'),
(219, 'Winneshiek'),
(220, 'Woodbury'),
(221, 'Worth'),
(222, 'Wright');

-- --------------------------------------------------------

--
-- Table structure for table `transportations`
--

CREATE TABLE `transportations` (
  `id` int(11) NOT NULL,
  `title_en` varchar(355) DEFAULT NULL,
  `title_ar` varchar(355) CHARACTER SET utf8 DEFAULT NULL,
  `icon` text,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transportations`
--

INSERT INTO `transportations` (`id`, `title_en`, `title_ar`, `icon`, `created`, `modified`) VALUES
(1, 'Public Transportation', 'وسائل النقل العامة', '1510059057public-transportation.png', '2017-11-01 09:24:35', '2017-11-09 11:49:45'),
(2, 'Private Vehicle', 'سيارة خاصة', '1510059112private-car.png', '2017-11-01 09:28:06', '2017-11-09 11:50:05');

-- --------------------------------------------------------

--
-- Table structure for table `transportationvehicles`
--

CREATE TABLE `transportationvehicles` (
  `id` int(11) NOT NULL,
  `transportation_id` int(11) NOT NULL,
  `title_en` varchar(355) DEFAULT NULL,
  `title_ar` varchar(355) CHARACTER SET utf8 DEFAULT NULL,
  `icon` varchar(355) DEFAULT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transportationvehicles`
--

INSERT INTO `transportationvehicles` (`id`, `transportation_id`, `title_en`, `title_ar`, `icon`, `created`, `modified`) VALUES
(1, 2, 'Car', 'سيارة', '1510059405car-pic.png', '2017-11-01 09:25:31', '2017-11-09 11:58:13'),
(2, 2, 'Motorcycle', 'دراجة نارية', '1510059416motorcycle-pic.png', '2017-11-01 09:26:50', '2017-11-09 11:58:48'),
(3, 2, 'Van', 'من', '1510059426van-pic.png', '2017-11-01 09:27:30', '2017-11-09 11:59:05'),
(5, 1, 'Bus', 'حافلة', '', '2017-11-09 12:06:44', '2017-11-09 12:06:44');

-- --------------------------------------------------------

--
-- Table structure for table `tripactivities`
--

CREATE TABLE `tripactivities` (
  `id` int(11) NOT NULL,
  `trip_id` int(11) DEFAULT NULL,
  `activity_id` int(11) DEFAULT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tripactivities`
--

INSERT INTO `tripactivities` (`id`, `trip_id`, `activity_id`, `created`, `modified`) VALUES
(14, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(15, 1, 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `tripfeatures`
--

CREATE TABLE `tripfeatures` (
  `id` int(11) NOT NULL,
  `title` varchar(355) DEFAULT NULL,
  `date_added` datetime NOT NULL,
  `date_modified` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tripfeatures`
--

INSERT INTO `tripfeatures` (`id`, `title`, `date_added`, `date_modified`) VALUES
(1, 'tf1', '2017-11-03 10:07:00', '2017-11-03 10:07:00'),
(2, 'hgjg hfhg', '2017-11-03 10:08:00', '2017-11-03 10:08:00');

-- --------------------------------------------------------

--
-- Table structure for table `tripgallery`
--

CREATE TABLE `tripgallery` (
  `id` int(11) NOT NULL,
  `trip_id` int(255) DEFAULT NULL,
  `file` varchar(355) DEFAULT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tripgallery`
--

INSERT INTO `tripgallery` (`id`, `trip_id`, `file`, `created`, `modified`) VALUES
(1, 1, '091529Penguins.jpg', '2017-12-07 09:15:29', '2017-12-07 09:15:29'),
(4, 1, '100825Hydrangeas.jpg', '2017-12-07 10:08:25', '2017-12-07 10:08:25');

-- --------------------------------------------------------

--
-- Table structure for table `triplocations`
--

CREATE TABLE `triplocations` (
  `id` int(11) NOT NULL,
  `trip_id` int(255) DEFAULT NULL,
  `location_id` int(255) DEFAULT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `triplocations`
--

INSERT INTO `triplocations` (`id`, `trip_id`, `location_id`, `created`, `modified`) VALUES
(10, 1, 2, '2017-12-08 07:11:15', '2017-12-08 07:11:15'),
(11, 1, 4, '2017-12-08 07:11:15', '2017-12-08 07:11:15');

-- --------------------------------------------------------

--
-- Table structure for table `tripprices`
--

CREATE TABLE `tripprices` (
  `id` int(11) NOT NULL,
  `trip_id` int(255) DEFAULT NULL,
  `person` int(255) DEFAULT NULL,
  `price_per_person` int(255) DEFAULT NULL,
  `total_price` decimal(15,2) NOT NULL DEFAULT '0.00',
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `trips`
--

CREATE TABLE `trips` (
  `id` int(11) NOT NULL,
  `user_id` int(255) DEFAULT '0',
  `location_id` int(255) DEFAULT NULL,
  `transportation_id` int(255) DEFAULT NULL,
  `transportationvehicle_id` int(255) DEFAULT NULL,
  `title_en` varchar(355) DEFAULT NULL,
  `title_ar` varchar(355) CHARACTER SET utf8 DEFAULT NULL,
  `summary_en` text,
  `summary_ar` varchar(355) CHARACTER SET utf8 DEFAULT NULL,
  `meetinpoint_location` varchar(355) DEFAULT NULL,
  `meetingpoint_id` int(11) DEFAULT NULL,
  `meetingpointtype_id` int(11) DEFAULT NULL,
  `schedule` text,
  `faq1` text,
  `faq2` text,
  `tripfeature_id` int(11) NOT NULL,
  `extra_expense` text,
  `travellers` int(255) DEFAULT NULL,
  `child_price` int(255) DEFAULT NULL,
  `extracondition_id` varchar(355) DEFAULT NULL,
  `operating_days` text,
  `request_photographer` int(1) NOT NULL DEFAULT '0',
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `trips`
--

INSERT INTO `trips` (`id`, `user_id`, `location_id`, `transportation_id`, `transportationvehicle_id`, `title_en`, `title_ar`, `summary_en`, `summary_ar`, `meetinpoint_location`, `meetingpoint_id`, `meetingpointtype_id`, `schedule`, `faq1`, `faq2`, `tripfeature_id`, `extra_expense`, `travellers`, `child_price`, `extracondition_id`, `operating_days`, `request_photographer`, `created`, `modified`) VALUES
(1, 54, 4, 2, 2, 'First Trip', 'الرحلة الأولى', 'uyjtjyt', 'uyjtjyt', NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, 0, '2017-12-04 12:52:20', '2017-12-07 10:12:51');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `role` varchar(355) DEFAULT NULL,
  `fb_id` varchar(355) DEFAULT NULL,
  `google_id` varchar(355) DEFAULT NULL,
  `first_name` varchar(355) CHARACTER SET utf8 DEFAULT NULL,
  `last_name` varchar(355) CHARACTER SET utf8 DEFAULT NULL,
  `name` varchar(355) CHARACTER SET utf8 DEFAULT NULL,
  `nickname` varchar(355) CHARACTER SET utf8 DEFAULT NULL,
  `email` varchar(355) DEFAULT NULL,
  `email_verified` int(1) NOT NULL DEFAULT '0',
  `email_verification_code` varchar(6) DEFAULT NULL,
  `phone` varchar(355) DEFAULT NULL,
  `phone_verified` int(11) NOT NULL DEFAULT '0',
  `gender` varchar(6) DEFAULT NULL,
  `password` varchar(355) DEFAULT NULL,
  `image` varchar(355) DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `languages` text,
  `video` text CHARACTER SET utf8,
  `address` text CHARACTER SET utf8,
  `country` varchar(355) DEFAULT NULL COMMENT 'Country of Passport',
  `city` varchar(355) CHARACTER SET utf8 DEFAULT NULL,
  `about` text CHARACTER SET utf8,
  `q1` text COMMENT 'Question 1 (FAQ)',
  `a1` text CHARACTER SET utf8 COMMENT 'Answer 1 (FAQ)',
  `q2` text COMMENT 'Question 2 (FAQ)',
  `a2` text CHARACTER SET utf8 COMMENT 'Answer 2 (FAQ)',
  `id_image` text COMMENT 'ID Card Image',
  `id_number` varchar(355) DEFAULT NULL COMMENT 'ID Card Number',
  `account_image` text COMMENT 'Bank Passbook Image',
  `account_bank` varchar(355) DEFAULT NULL COMMENT 'Bank Name',
  `account_number` text COMMENT 'Account Number',
  `tokenhash` text,
  `email_notifications` int(1) NOT NULL DEFAULT '1',
  `status` int(2) NOT NULL DEFAULT '0',
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `role`, `fb_id`, `google_id`, `first_name`, `last_name`, `name`, `nickname`, `email`, `email_verified`, `email_verification_code`, `phone`, `phone_verified`, `gender`, `password`, `image`, `dob`, `languages`, `video`, `address`, `country`, `city`, `about`, `q1`, `a1`, `q2`, `a2`, `id_image`, `id_number`, `account_image`, `account_bank`, `account_number`, `tokenhash`, `email_notifications`, `status`, `created`, `modified`) VALUES
(1, 'admin', NULL, NULL, 'Gurpreet', 'Singh', 'Gurpreet Singh', NULL, 'gurpreet@avainfotech.comm', 0, NULL, NULL, 0, NULL, '$2y$10$sKpxYGilIDTpnxif9Diq4uS.cmPAMn0WLOC3e7jTDnhZvpyrpaka.', '1503060924rick_kelly.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'b03cafed21f2e2f5d76e6c045ed0a78d', 1, 1, '2017-08-02 12:11:06', '2017-10-10 12:50:56'),
(54, 'user', NULL, NULL, 'Anshul', 'Mahajan', 'Anshul Mahajan', 'ansu', 'anshul@avainfotech.com', 0, '299513', '8950778851', 1, 'Female', '$2y$10$5.8R0N9l78ccVHyJ3bWf4.hQwlFlfoYAB9UUxc4ZylKXSkHnOYqnG', '1510921037user.jpg', '2010-11-14', 'Hindi', 'https://www.youtube.com/watch?v=ifoFOXRBiHM', 'Chandigarhh', 'Afghanistan', 'Chandigarhh', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.', 'What\'s my hobby?', 'erhetutrutt', 'Why do I become a local expert?', 'trurturtutru', '1510904800Penguins.jpg', 'edgvfdsgdsg', '1510812141Tulips.jpg', '', 'yfgjf', '13e9538dc65de691356aeb36abc9ed53', 1, 1, '2017-11-10 09:28:49', '2017-11-22 09:03:57'),
(59, 'user', NULL, '112691916439979752645', 'Gurpreet', 'Singh', 'Gurpreet Singh', NULL, 'gurpreet@avainfotech.com', 0, NULL, NULL, 0, NULL, '$2y$10$fQxizjUmt.Hvuw9bUHPLx.10kF49tsNDlBdJNT4fbLzVmOrzTxqXq', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, '2017-11-13 08:57:55', '2017-11-13 08:57:55'),
(60, 'user', NULL, NULL, 'Diksha', 'Khajuria', 'Diksha Khajuria', 'ghfdhdfhfd', 'diksha@avainfotech.com', 0, NULL, NULL, 0, 'Male', '$2y$10$fhJh64P/Jnh8CAuSvZ.NcezBCi0ka8FsGG2OHjypqKa9/5Owb.5tO', '1510921610Jellyfish.jpg', '2017-11-17', '', 'vcxbvcxb', 'cxvcxv', 'Afghanistan', 'xcvbcxvb', 'cxvcxvcxv', 'What\'s my hobby?', 'cxvcxvcx', 'Why do I become a local expert?', 'cxvcxvcxv', NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, '2017-11-17 12:22:06', '2017-11-17 12:26:50'),
(63, 'user', '145207799538258', NULL, 'Rupak', 'DevelopmentWork', 'Rupak DevelopmentWork', NULL, 'rupak@avainfotech.com', 1, NULL, NULL, 0, NULL, '$2y$10$hYmW1VENHGUxUQEL5G3TLeXjmR1H2Jny6UE35HStlod4b0RVtlIPO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, '2017-11-17 13:06:04', '2017-11-17 13:06:04'),
(65, 'user', NULL, NULL, 'Gurpreet', 'singh', 'Gurpreet singh', NULL, 'gurpreet@avainfotech.co', 0, NULL, NULL, 0, NULL, '$2y$10$uJCwKfEgHqnfgb3NJ.28u.1terIWhLeWGsKrmz5RfVdye1PcTlgm2', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, '2017-11-17 14:01:08', '2017-11-17 14:01:08'),
(66, 'user', '1903782343283425', NULL, 'Simerjit', 'Kaur', 'Simerjit Kaur', NULL, 'simerjit@avainfotech.com', 1, NULL, NULL, 0, NULL, '$2y$10$mhGC5/vAIJqeTnNIy5DP0.Yz7eWlJKOJ./Q/ALAuA1M8i/CMDIx.e', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, '2017-11-22 10:11:55', '2017-11-22 10:43:02'),
(67, 'user', '742790265916863', NULL, 'Ritika', 'Bhatnagar', 'Ritika Bhatnagar', NULL, 'bhatnagarritika21@gmail.com', 1, NULL, NULL, 0, NULL, '$2y$10$LNnyQ76vQyxYoaj/WBD48emZ.a.mYETZzSti/kcDqX8/mMVjkISNW', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, '2017-11-23 09:03:50', '2017-11-23 09:03:50');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `activities`
--
ALTER TABLE `activities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `activitycategories`
--
ALTER TABLE `activitycategories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cities`
--
ALTER TABLE `cities`
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `countries`
--
ALTER TABLE `countries`
  ADD PRIMARY KEY (`country_id`);

--
-- Indexes for table `extraconditions`
--
ALTER TABLE `extraconditions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `galleries`
--
ALTER TABLE `galleries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `homesections`
--
ALTER TABLE `homesections`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `links`
--
ALTER TABLE `links`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `locations`
--
ALTER TABLE `locations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `meetingpoints`
--
ALTER TABLE `meetingpoints`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `meetingpointtypes`
--
ALTER TABLE `meetingpointtypes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `priceconditions`
--
ALTER TABLE `priceconditions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `staticpages`
--
ALTER TABLE `staticpages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_county`
--
ALTER TABLE `tbl_county`
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `transportations`
--
ALTER TABLE `transportations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transportationvehicles`
--
ALTER TABLE `transportationvehicles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tripactivities`
--
ALTER TABLE `tripactivities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tripfeatures`
--
ALTER TABLE `tripfeatures`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tripgallery`
--
ALTER TABLE `tripgallery`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `triplocations`
--
ALTER TABLE `triplocations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tripprices`
--
ALTER TABLE `tripprices`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `trips`
--
ALTER TABLE `trips`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `activities`
--
ALTER TABLE `activities`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `activitycategories`
--
ALTER TABLE `activitycategories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `cities`
--
ALTER TABLE `cities`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=223;
--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `countries`
--
ALTER TABLE `countries`
  MODIFY `country_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=258;
--
-- AUTO_INCREMENT for table `extraconditions`
--
ALTER TABLE `extraconditions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `galleries`
--
ALTER TABLE `galleries`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
--
-- AUTO_INCREMENT for table `homesections`
--
ALTER TABLE `homesections`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `links`
--
ALTER TABLE `links`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `locations`
--
ALTER TABLE `locations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `meetingpoints`
--
ALTER TABLE `meetingpoints`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `meetingpointtypes`
--
ALTER TABLE `meetingpointtypes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `priceconditions`
--
ALTER TABLE `priceconditions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `staticpages`
--
ALTER TABLE `staticpages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `tbl_county`
--
ALTER TABLE `tbl_county`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=223;
--
-- AUTO_INCREMENT for table `transportations`
--
ALTER TABLE `transportations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `transportationvehicles`
--
ALTER TABLE `transportationvehicles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `tripactivities`
--
ALTER TABLE `tripactivities`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `tripfeatures`
--
ALTER TABLE `tripfeatures`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tripgallery`
--
ALTER TABLE `tripgallery`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `triplocations`
--
ALTER TABLE `triplocations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `tripprices`
--
ALTER TABLE `tripprices`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `trips`
--
ALTER TABLE `trips`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
