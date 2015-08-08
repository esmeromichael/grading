-- phpMyAdmin SQL Dump
-- version 4.3.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Aug 07, 2015 at 08:28 AM
-- Server version: 5.6.24
-- PHP Version: 5.6.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `mto_erp_work2`
--

-- --------------------------------------------------------

--
-- Table structure for table `accounts`
--

CREATE TABLE IF NOT EXISTS `accounts` (
  `id` int(10) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `citizenships`
--


INSERT INTO `citizenships` (`id`, `name`, `description`, `is_local`, `status`) VALUES
(1, 'Filipino', 'Citizens of the Republic of the Philippines\r\n', 'Y', 'Active'),
(2, 'Chinese', 'Citizens of the People''s Republic of China\r\n', 'Y', 'Active'),
(3, 'Japanese', 'Citizens of Japan', 'N', 'Active'),
(4, 'Malaysian', 'Citizens of Malaysia', 'N', 'Active'),
(5, 'Afghan', 'Citizens of Afghanistan', 'N', 'Inactive'),
(6, 'American', 'Citizens of the USA', 'N', 'Active'),
(7, 'German', 'Citizens of Germany', 'N', 'Active'),
(8, 'Russian', 'Citizens of Russia', 'N', 'Active'),
(9, 'Spanish', 'Citizens of Spain', 'N', 'Active'),
(10, 'Swedish', 'Citizens of Sweden', 'N', 'Active'),
(11, 'French', 'Citizens of France', 'N', 'Active'),
(12, 'Korean', 'Citizens of Korea', 'N', 'Active'),
(13, 'Polish', 'Citizens of Poland', 'N', 'Active'),
(14, 'Greek', 'Citizens of Greece', 'N', 'Active');

-- --------------------------------------------------------


INSERT INTO `countries` (`id`, `value`) VALUES
(1, 'Afghanistan'),
(2, 'Aringland Islands'),
(3, 'Albania'),
(4, 'Algeria'),
(5, 'American Samoa'),
(6, 'Andorra'),
(7, 'Angola'),
(8, 'Anguilla'),
(9, 'Antarctica'),
(10, 'Antigua and Barbuda'),
(11, 'Argentina'),
(12, 'Armenia'),
(13, 'Aruba'),
(14, 'Australia'),
(15, 'Austria'),
(16, 'Azerbaijan'),
(17, 'Bahamas'),
(18, 'Bahrain'),
(19, 'Bangladesh'),
(20, 'Barbados'),
(21, 'Belarus'),
(22, 'Belgium'),
(23, 'Belize'),
(24, 'Benin'),
(25, 'Bermuda'),
(26, 'Bhutan'),
(27, 'Bolivia'),
(28, 'Bosnia and Herzegovina'),
(29, 'Botswana'),
(30, 'Bouvet Island'),
(31, 'Brazil'),
(32, 'British Indian Ocean territory'),
(33, 'Brunei Darussalam'),
(34, 'Bulgaria'),
(35, 'Burkina Faso'),
(36, 'Burundi'),
(37, 'Cambodia'),
(38, 'Cameroon'),
(39, 'Canada'),
(40, 'Cape Verde'),
(41, 'Cayman Islands'),
(42, 'Central African Republic'),
(43, 'Chad'),
(44, 'Chile'),
(45, 'China'),
(46, 'Christmas Island'),
(47, 'Cocos (Keeling) Islands'),
(48, 'Colombia'),
(49, 'Comoros'),
(50, 'Congo'),
(51, 'Congo'),
(52, ' Democratic Republic'),
(53, 'Cook Islands'),
(54, 'Costa Rica'),
(55, 'Ivory Coast (Ivory Coast)'),
(56, 'Croatia (Hrvatska)'),
(57, 'Cuba'),
(58, 'Cyprus'),
(59, 'Czech Republic'),
(60, 'Denmark'),
(61, 'Djibouti'),
(62, 'Dominica'),
(63, 'Dominican Republic'),
(64, 'East Timor'),
(65, 'Ecuador'),
(66, 'Egypt'),
(67, 'El Salvador'),
(68, 'Equatorial Guinea'),
(69, 'Eritrea'),
(70, 'Estonia'),
(71, 'Ethiopia'),
(72, 'Falkland Islands'),
(73, 'Faroe Islands'),
(74, 'Fiji'),
(75, 'Finland'),
(76, 'France'),
(77, 'French Guiana'),
(78, 'French Polynesia'),
(79, 'French Southern Territories'),
(80, 'Gabon'),
(81, 'Gambia'),
(82, 'Georgia'),
(83, 'Germany'),
(84, 'Ghana'),
(85, 'Gibraltar'),
(86, 'Greece'),
(87, 'Greenland'),
(88, 'Grenada'),
(89, 'Guadeloupe'),
(90, 'Guam'),
(91, 'Guatemala'),
(92, 'Guinea'),
(93, 'Guinea-Bissau'),
(94, 'Guyana'),
(95, 'Haiti'),
(96, 'Heard and McDonald Islands'),
(97, 'Honduras'),
(98, 'Hong Kong'),
(99, 'Hungary'),
(100, 'Iceland'),
(101, 'India'),
(102, 'Indonesia'),
(103, 'Iran'),
(104, 'Iraq'),
(105, 'Ireland'),
(106, 'Israel'),
(107, 'Italy'),
(108, 'Jamaica'),
(109, 'Japan'),
(110, 'Jordan'),
(111, 'Kazakhstan'),
(112, 'Kenya'),
(113, 'Kiribati'),
(114, 'Korea (north)'),
(115, 'Korea (south)'),
(116, 'Kuwait'),
(117, 'Kyrgyzstan'),
(118, 'Lao People''s Democratic Republic'),
(119, 'Latvia'),
(120, 'Lebanon'),
(121, 'Lesotho'),
(122, 'Liberia'),
(123, 'Libyan Arab Jamahiriya'),
(124, 'Liechtenstein'),
(125, 'Lithuania'),
(126, 'Luxembourg'),
(127, 'Macao'),
(128, 'Macedonia'),
(129, 'Madagascar'),
(130, 'Malawi'),
(131, 'Malaysia'),
(132, 'Maldives'),
(133, 'Mali'),
(134, 'Malta'),
(135, 'Marshall Islands'),
(136, 'Martinique'),
(137, 'Mauritania'),
(138, 'Mauritius'),
(139, 'Mayotte'),
(140, 'Mexico'),
(141, 'Micronesia'),
(142, 'Moldova'),
(143, 'Monaco'),
(144, 'Mongolia'),
(145, 'Montserrat'),
(146, 'Morocco'),
(147, 'Mozambique'),
(148, 'Myanmar'),
(149, 'Namibia'),
(150, 'Nauru'),
(151, 'Nepal'),
(152, 'Netherlands'),
(153, 'Netherlands Antilles'),
(154, 'New Caledonia'),
(155, 'New Zealand'),
(156, 'Nicaragua'),
(157, 'Niger'),
(158, 'Nigeria'),
(159, 'Niue'),
(160, 'Norfolk Island'),
(161, 'Northern Mariana Islands'),
(162, 'Norway'),
(163, 'Oman'),
(164, 'Pakistan'),
(165, 'Palau'),
(166, 'Palestinian Territories'),
(167, 'Panama'),
(168, 'Papua New Guinea'),
(169, 'Paraguay'),
(170, 'Peru'),
(171, 'Philippines'),
(172, 'Pitcairn'),
(173, 'Poland'),
(174, 'Portugal'),
(175, 'Puerto Rico'),
(176, 'Qatar'),
(177, 'Runion'),
(178, 'Romania'),
(179, 'Russian Federation'),
(180, 'Rwanda'),
(181, 'Saint Helena'),
(182, 'Saint Kitts and Nevis'),
(183, 'Saint Lucia'),
(184, 'Saint Pierre and Miquelon'),
(185, 'Saint Vincent and the Grenadines'),
(186, 'Samoa'),
(187, 'San Marino'),
(188, 'Sao Tome and Principe'),
(189, 'Saudi Arabia'),
(190, 'Senegal'),
(191, 'Serbia and Montenegro'),
(192, 'Seychelles'),
(193, 'Sierra Leone'),
(194, 'Singapore'),
(195, 'Slovakia'),
(196, 'Slovenia'),
(197, 'Solomon Islands'),
(198, 'Somalia'),
(199, 'South Africa'),
(200, 'South Georgia and the South Sandwich Islands'),
(201, 'Spain'),
(202, 'Sri Lanka'),
(203, 'Sudan'),
(204, 'Suriname'),
(205, 'Svalbard and Jan Mayen Islands'),
(206, 'Swaziland'),
(207, 'Sweden'),
(208, 'Switzerland'),
(209, 'Syria'),
(210, 'Taiwan'),
(211, 'Tajikistan'),
(212, 'Tanzania'),
(213, 'Thailand'),
(214, 'Togo'),
(215, 'Tokelau'),
(216, 'Tonga'),
(217, 'Trinidad and Tobago'),
(218, 'Tunisia'),
(219, 'Turkey'),
(220, 'Turkmenistan'),
(221, 'Turks and Caicos Islands'),
(222, 'Tuvalu'),
(223, 'Uganda'),
(224, 'Ukraine'),
(225, 'United Arab Emirates'),
(226, 'United Kingdom'),
(227, 'United States of America'),
(228, 'Uruguay'),
(229, 'Uzbekistan'),
(230, 'Vanuatu'),
(231, 'Vatican City'),
(232, 'Venezuela'),
(233, 'Vietnam'),
(234, 'Virgin Islands (British)'),
(235, 'Virgin Islands (US)'),
(236, 'Wallis and Futuna Islands'),
(237, 'Western Sahara'),
(238, 'Yemen'),
(239, 'Zaire'),
(240, 'Zambia'),
(241, 'Zimbabwe');

-- --------------------------------------------------------

--
-- Table structure for table `entities`
--


INSERT INTO `entities` (`id`, `name`, `description`, `status`, `sort`) VALUES
(1, 'Corporation', 'Corporation', 'Active', 4),
(3, 'Partnership', 'Partnership', 'Active', 3),
(4, 'Sole Proprietorship', 'Sole Proprietorship', 'Active', 2),
(6, 'Individual', 'Individual', 'Active', 1);

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`item_id`, `code`, `sku`, `generic`, `brand`, `make`, `model`, `color`, `size_dim`, `gauge_thick`, `description`, `account`, `category`, `reorder_lvl`, `lead_time`, `uom`, `ave_cost`, `item_cost`, `status`, `for_sale`, `vatable`, `inventoriable`, `serialized`, `sales_acct`, `usage_acct`, `inv_acct`, `over_cost`, `std`, `max`, `min`, `old_id`, `created_at`, `updated_at`, `subcategory`, `_token`) VALUES
(2627, 'uiouo', 'uoiouio', 'Power Supply Unit', 'OEM', 'ATX Switching', '', '', '1000W', '', 'Power Supply Unit OEM ATX Switching 1000W', 0, 9, '0.00', 0, 37, '0.0000', '8600.0000', 'Active', 'N', 'Y', '', '', 0, 0, 0, 'null', '20.00', '30.00', '10.00', 2, '0000-00-00 00:00:00', '2015-08-07 03:15:26', 2, ''),
(2739, '', '', 'Processor', 'Intel', '', 'G2010', '', ' 3MB Cache, 2.8GHz', '', 'Processor Intel Pentium G2010  3MB Cache, 2.8GHz', 0, 10, '0.00', 0, 0, '0.0000', '0.0000', 'New', 'Y', 'Y', 'N', 'N', 0, 0, 0, 'null', '0.00', '0.00', '0.00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, ''),
(44093, '6564756f', '455hjh', '3rd Party Camera License', 'Geovision', 'ghk', 'ghkhgkhg', 'ghkhgkhg', '16-Channels', 'ghkhgkhgk', '3rd Party Camera License Geovision 16-Channels', 0, 2, '0.00', 0, 37, '0.0000', '36400.0000', 'Active', 'N', 'Y', 'Y', 'Y', 0, 0, 0, 'null', '50.00', '70.00', '30.00', 1, '0000-00-00 00:00:00', '2015-08-04 07:11:37', 2, ''),
(44094, 'James Bond 007', '', '', 'Nike', '', 'Stefan Janoski', 'Red', '9"', '', ' Nike  Stefan Janoski Red 9" ', 0, 14, '0.00', 0, 37, '0.0000', '0.0000', 'New', 'Y', 'Y', 'Y', '', 0, 0, 0, 'null', '0.00', '0.00', '0.00', 0, '0000-00-00 00:00:00', '2015-08-07 02:51:14', 65, '2L0S6BoxziLjqapbX4kGHkQwnLN0utHbZhhDW2Xt'),
(44095, 'nike102', '', '', 'Nike', '', 'Roshe Run', 'Red', '8 1/2"', '', ' Nike  Roshe Run Red 8 1/2" ', 0, 14, '0.00', 0, 37, '0.0000', '0.0000', 'New', 'Y', 'Y', 'Y', '', 0, 0, 0, 'null', '0.00', '0.00', '0.00', 0, '0000-00-00 00:00:00', '2015-08-07 06:08:45', 65, '2L0S6BoxziLjqapbX4kGHkQwnLN0utHbZhhDW2Xt'),
(44096, 'nike101', '', '', 'Nike', '', 'Air Max 90 2007', 'Black-Pink', '7"', '', ' Nike  Air Max 90 2007 Black-Pink 7" ', 0, 14, '0.00', 0, 37, '0.0000', '0.0000', 'New', 'Y', 'Y', 'Y', 'Y', 0, 0, 0, 'null', '0.00', '0.00', '0.00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 65, 'vOxUeWWt2hMk84a3Fa76o6WVne8a8KnjKuXbITnm');

-- --------------------------------------------------------

--
-- Table structure for table `item_categories`
--

--
-- Dumping data for table `item_categories`
--

INSERT INTO `item_categories` (`id`, `short`, `name`, `description`, `active`, `for_printing`, `for_lamination`, `group`, `vatable`, `sales_acct`, `usage_acct`, `inv_acct`, `over_cost`, `std`, `max`, `min`) VALUES
(0,'', NULL, '', 'Y', 'N', 'N', NULL, 'Y', 0, 0, 0, NULL, NULL, NULL, NULL),
(1,'', 'Computer Hardwares', '', 'N', 'N', 'N', NULL, 'Y', 50, 69, 8, 'Percent', '10.00', '20.00', '8.00'),
(2,'', 'Security Systems', '', 'Y', 'N', 'N', NULL, 'Y', 50, 16, 8, 'Percent', '42.86', '50.00', '35.00'),
(3,'', 'POS Systems', '', 'Y', 'N', 'N', NULL, 'Y', 50, 16, 8, 'Percent', '20.00', '40.00', '15.00'),
(4,'', 'Home Automation Systems', '', 'Y', 'N', 'N', NULL, 'Y', 50, 17, 8, 'Percent', '20.00', '40.00', '15.00'),
(5,'', 'Software', '', 'Y', 'N', 'N', NULL, 'Y', 50, 69, 8, 'Percent', '10.00', '20.00', '8.00'),
(6,'', 'Project Materials', '', 'Y', 'N', 'N', NULL, 'Y', 50, 82, 8, 'Percent', '10.00', '20.00', '8.00'),
(7,'', 'Network Equipment', '', 'Y', 'N', 'N', NULL, 'Y', 50, 16, 8, 'Percent', '10.00', '20.00', '8.00'),
(8,'', 'Services', '', 'Y', 'N', 'N', NULL, 'Y', 51, 81, 88, 'Amount', '100.00', '200.00', '50.00'),
(9,'', 'Power Devices', '', 'Y', 'N', 'N', NULL, 'Y', 50, 16, 8, 'Percent', '50.00', '100.00', '40.00'),
(10,'', 'Computer Equipment', '', 'Y', 'N', 'N', NULL, 'Y', 50, 16, 8, 'Percent', '10.00', '20.00', '8.00'),
(11,'', 'Cables and Wires', '', 'Y', 'N', 'N', NULL, 'Y', 50, 82, 8, 'Percent', '20.00', '30.00', '10.00'),
(12,'', 'Tools', '', 'Y', 'N', 'N', NULL, 'Y', 50, 15, 8, 'Percent', '20.00', '30.00', '10.00'),
(13,'', 'Office Supplies', '', 'Y', 'N', 'N', NULL, 'Y', 50, 69, 8, 'Percent', '10.00', '20.00', '5.00'),
(14,'', 'Personal Protective Equipments', '', 'Y', 'N', 'N', NULL, 'Y', 50, 16, 8, 'Percent', '20.00', '30.00', '15.00'),
(15,'', 'Household Products', '', 'Y', 'N', 'N', NULL, 'Y', 50, 69, 8, 'Amount', '40.00', '60.00', '20.00');
-- --------------------------------------------------------

--
-- Table structure for table `item_subcategories`
--

--
-- Dumping data for table `item_subcategories`
--

INSERT INTO `item_subcategories` (`parent`, `id`, `short`, `name`, `description`, `active`, `for_printing`, `for_lamination`, `group`, `vatable`, `sales_acct`, `usage_acct`, `inv_acct`, `over_cost`, `std`, `max`, `min`) VALUES
(2, 1, '', 'Digital Video Recorders', '', 'Y', 'N', 'N', NULL, 'Y', 0, 0, 0, '', '0.00', '0.00', '0.00'),
(2, 2, '', 'CCTV Cameras', '', 'Y', 'N', 'N', NULL, 'Y', 0, 0, 0, '', '0.00', '0.00', '0.00'),
(2, 3, '', 'DVR Cards', '', 'Y', 'N', 'N', NULL, 'Y', 0, 0, 0, '', '0.00', '0.00', '0.00'),
(2, 4, '', 'Network Video Recorders', '', 'Y', 'N', 'N', NULL, 'Y', 0, 0, 0, '', '0.00', '0.00', '0.00'),
(2, 5, '', 'IP Cameras', '', 'Y', 'N', 'N', NULL, 'Y', 0, 0, 0, '', '0.00', '0.00', '0.00'),
(2, 6, '', 'CCTV Accessories', '', 'Y', 'N', 'N', NULL, 'Y', 0, 0, 0, '', '0.00', '0.00', '0.00'),
(1, 7, '', 'Casings', '', 'Y', 'N', 'N', NULL, 'Y', 0, 0, 0, '', '0.00', '0.00', '0.00'),
(1, 8, '', 'Motherboards', '', 'Y', 'N', 'N', NULL, 'Y', 0, 0, 0, '', '0.00', '0.00', '0.00'),
(1, 9, '', 'Processors', '', 'Y', 'N', 'N', NULL, 'Y', 0, 0, 0, '', '0.00', '0.00', '0.00'),
(1, 10, '', 'Memory', '', 'Y', 'N', 'N', NULL, 'Y', 0, 0, 0, '', '0.00', '0.00', '0.00'),
(10, 11, '', 'Casings', '', 'Y', 'N', 'N', NULL, 'Y', 0, 0, 0, '', '0.00', '0.00', '0.00'),
(10, 12, '', 'Motherboards', '', 'Y', 'N', 'N', NULL, 'Y', 0, 0, 0, '', '0.00', '0.00', '0.00'),
(10, 13, '', 'Processors', '', 'Y', 'N', 'N', NULL, 'Y', 0, 0, 0, '', '0.00', '0.00', '0.00'),
(10, 14, '', 'Memory Modules', '', 'Y', 'N', 'N', NULL, 'Y', 0, 0, 0, '', '0.00', '0.00', '0.00'),
(10, 15, '', 'Disk Drives', '', 'Y', 'N', 'N', NULL, 'Y', 0, 0, 0, '', '0.00', '0.00', '0.00'),
(10, 16, '', 'Video Controllers', '', 'Y', 'N', 'N', NULL, 'Y', 0, 0, 0, '', '0.00', '0.00', '0.00'),
(10, 17, '', 'Network Controllers', '', 'Y', 'N', 'N', NULL, 'Y', 0, 0, 0, '', '0.00', '0.00', '0.00'),
(10, 18, '', 'Disk Controllers', '', 'Y', 'N', 'N', NULL, 'Y', 0, 0, 0, '', '0.00', '0.00', '0.00'),
(10, 19, '', 'Cooling Devices', '', 'Y', 'N', 'N', NULL, 'Y', 0, 0, 0, '', '0.00', '0.00', '0.00'),
(10, 20, '', 'Monitors', '', 'Y', 'N', 'N', NULL, 'Y', 0, 0, 0, '', '0.00', '0.00', '0.00'),
(10, 21, '', 'Audio Devices', '', 'Y', 'N', 'N', NULL, 'Y', 0, 0, 0, '', '0.00', '0.00', '0.00'),
(10, 22, '', 'Data and Power Cables', '', 'Y', 'N', 'N', NULL, 'Y', 0, 0, 0, '', '0.00', '0.00', '0.00'),
(7, 23, '', 'Switches', '', 'Y', 'N', 'N', NULL, 'Y', 0, 0, 0, '', '0.00', '0.00', '0.00'),
(7, 24, '', 'Routers', '', 'Y', 'N', 'N', NULL, 'Y', 0, 0, 0, '', '0.00', '0.00', '0.00'),
(7, 25, '', 'Modems', '', 'Y', 'N', 'N', NULL, 'Y', 0, 0, 0, '', '0.00', '0.00', '0.00'),
(7, 26, '', 'Network Accessories', '', 'Y', 'N', 'N', NULL, 'Y', 0, 0, 0, '', '0.00', '0.00', '0.00'),
(9, 27, '', 'Computer Power Supply Units', '', 'Y', 'N', 'N', NULL, 'Y', 0, 0, 0, '', '0.00', '0.00', '0.00'),
(9, 28, '', 'Camera Power Supply Units', '', 'Y', 'N', 'N', NULL, 'Y', 0, 0, 0, '', '0.00', '0.00', '0.00'),
(9, 29, '', 'Uninterrupted Power Supplies', '', 'Y', 'N', 'N', NULL, 'Y', 0, 0, 0, 'Percent', '10.00', '20.00', '8.00'),
(9, 30, '', 'Mobile Device Power Supply Units', '', 'Y', 'N', 'N', NULL, 'Y', 0, 0, 0, '', '0.00', '0.00', '0.00'),
(9, 31, '', 'Generic Power Supply Units', '', 'Y', 'N', 'N', NULL, 'Y', 0, 0, 0, '', '0.00', '0.00', '0.00'),
(11, 32, '', 'Coaxial Cables', '', 'Y', 'N', 'N', NULL, 'Y', 0, 0, 0, '', '0.00', '0.00', '0.00'),
(11, 33, '', 'UTP Cables', '', 'Y', 'N', 'N', NULL, 'Y', 0, 0, 0, '', '0.00', '0.00', '0.00'),
(11, 34, '', 'STP Cables', '', 'Y', 'N', 'N', NULL, 'Y', 0, 0, 0, '', '0.00', '0.00', '0.00'),
(11, 35, '', 'Electrical Wires', '', 'Y', 'N', 'N', NULL, 'Y', 0, 0, 0, '', '0.00', '0.00', '0.00'),
(4, 36, '', 'Automation Controllers', '', 'Y', 'N', 'N', NULL, 'Y', 0, 0, 0, '', '0.00', '0.00', '0.00'),
(4, 37, '', 'Automation Devices', '', 'Y', 'N', 'N', NULL, 'Y', 0, 0, 0, '', '0.00', '0.00', '0.00'),
(6, 38, '', 'Project Consumables', '', 'Y', 'N', 'N', NULL, 'Y', 0, 0, 0, '', '0.00', '0.00', '0.00'),
(6, 39, '', 'Pipes and Conduits', '', 'Y', 'N', 'N', NULL, 'Y', 0, 0, 0, '', '0.00', '0.00', '0.00'),
(6, 40, '', 'Plugs and Connectors', '', 'Y', 'N', 'N', NULL, 'Y', 0, 0, 0, '', '0.00', '0.00', '0.00'),
(12, 41, '', 'Hand Tools', '', 'Y', 'N', 'N', NULL, 'Y', 0, 0, 0, '', '0.00', '0.00', '0.00'),
(12, 42, '', 'Power Tools', '', 'Y', 'N', 'N', NULL, 'Y', 0, 0, 0, '', '0.00', '0.00', '0.00'),
(12, 43, '', 'Specialized Tools', '', 'Y', 'N', 'N', NULL, 'Y', 0, 0, 0, '', '0.00', '0.00', '0.00'),
(10, 44, '', 'Laptops and Notebooks', '', 'Y', 'N', 'N', NULL, 'Y', 0, 0, 0, '', '0.00', '0.00', '0.00'),
(10, 45, '', 'All-in-One PCs', '', 'Y', 'N', 'N', NULL, 'Y', 0, 0, 0, '', '0.00', '0.00', '0.00'),
(10, 46, '', 'Embedded Systems', '', 'Y', 'N', 'N', NULL, 'Y', 0, 0, 0, '', '0.00', '0.00', '0.00'),
(7, 47, '', 'Network Storage Devices', '', 'Y', 'N', 'N', NULL, 'Y', 0, 0, 0, '', '0.00', '0.00', '0.00'),
(10, 48, '', 'Input and Output Devices', '', 'Y', 'N', 'N', NULL, 'Y', 0, 0, 0, '', '0.00', '0.00', '0.00'),
(10, 49, '', 'Output Devices', '', 'N', 'N', 'N', NULL, 'Y', 0, 0, 0, '', '0.00', '0.00', '0.00'),
(5, 50, '', 'Licenses', '', 'Y', 'N', 'N', NULL, 'Y', 0, 0, 0, '', '0.00', '0.00', '0.00'),
(5, 51, '', 'Business Systems', '', 'Y', 'N', 'N', NULL, 'Y', 0, 0, 0, 'Percent', '20.00', '30.00', '10.00'),
(3, 52, '', 'POS Devices', '', 'Y', 'N', 'N', NULL, 'Y', 0, 0, 0, '', '0.00', '0.00', '0.00'),
(3, 53, '', 'POS Machines', '', 'Y', 'N', 'N', NULL, 'Y', 0, 0, 0, '', '0.00', '0.00', '0.00'),
(8, 54, '', 'Computer Repairs', '', 'Y', 'N', 'N', NULL, 'Y', 0, 0, 0, '', '0.00', '0.00', '0.00'),
(8, 55, '', 'CCTV Installations', '', 'Y', 'N', 'N', NULL, 'Y', 0, 0, 0, '', '0.00', '0.00', '0.00'),
(2, 56, '', 'Access Control Devices', '', 'Y', 'N', 'N', NULL, 'Y', 0, 0, 0, '', '0.00', '0.00', '0.00'),
(9, 57, '', 'Automatic Voltage Regulators', '', 'Y', 'N', 'N', NULL, 'Y', 0, 0, 0, '', '0.00', '0.00', '0.00'),
(9, 58, '', 'Power Supply Accessories', '', 'Y', 'N', 'N', NULL, 'Y', 0, 0, 0, '', '0.00', '0.00', '0.00'),
(13, 59, '', 'Papers', '', 'Y', 'N', 'N', NULL, 'Y', 0, 0, 0, '', '0.00', '0.00', '0.00'),
(13, 60, '', 'Inks and Toners', '', 'Y', 'N', 'N', NULL, 'Y', 0, 0, 0, '', '0.00', '0.00', '0.00'),
(13, 61, '', 'Blank Media', '', 'Y', 'N', 'N', NULL, 'Y', 0, 0, 0, '', '0.00', '0.00', '0.00'),
(13, 62, '', 'Office Furnitures', '', 'Y', 'N', 'N', NULL, 'Y', 50, 17, 8, '', '0.00', '0.00', '0.00'),
(7, 63, '', 'IP Telephony', '', 'Y', 'N', 'N', NULL, 'Y', 0, 0, 0, '', '0.00', '0.00', '0.00'),
(8, 64, '', 'Network Installations', '', 'Y', 'N', 'N', NULL, 'Y', 0, 0, 0, '', '0.00', '0.00', '0.00'),
(14, 65, '', 'Safety Shoes', '', 'Y', 'N', 'N', NULL, 'Y', 0, 0, 0, 'Percent', '25.00', '40.00', '20.00'),
(0, 0, NULL, NULL, NULL, 'Y', 'N', 'N', NULL, 'Y', 0, 0, 0, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--



-- --------------------------------------------------------

--
-- Table structure for table `partners`
--

-- Dumping data for table `partners`
--

INSERT INTO `partners` (`id`, `name`, `status`, `customer`, `supplier`, `employee`, `address`, `home`, `street`, `barangay`, `city`, `province`, `country`, `mobile_countrycode`, `mobile_areacode`, `mobile_lineno`, `tel_countrycode`, `tel_areacode`, `tel_lineno`, `fax_countrycode`, `fax_areacode`, `fax_lineno`, `email`, `business_entity`, `tin`, `reg_no`, `reg_date`, `birthday`, `_token`, `created_at`, `updated_at`) VALUES
(1, 'Wil Fred N. Armecin', 'Active', NULL, NULL, 'Yes', ',,,,,', '', '', '', '', '', '', '', '', '', '', '', '', '', 'Wil Fred N. Armecin', '', '', 'Individual', '', '', '', '1995-01-11', '8yRkqUUptp5gR3GKfVUJ15eOSlJ8JpTlI2iodAJx', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(2, 'Michael Esmero', 'Active', NULL, NULL, 'Yes', ',,,,,', '', '', '', '', '', '', '', '', '', '', '', '', '', 'Michael Esmero', '', '', 'Individual', '', '', '', '0000-00-00', '8yRkqUUptp5gR3GKfVUJ15eOSlJ8JpTlI2iodAJx', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(3, 'Kerwin Bonn', 'Active', NULL, NULL, 'Yes', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'Kerwin Bonn', '', '', 'Individual', '', '', '', '0000-00-00', 'o8g0ryq2Ny7jnSKrfPCPSa1xAjbUnJAUIe3jg7E3', '0000-00-00 00:00:00', '2015-08-07 05:34:16'),
(4, 'WilsFred N. Armecin', 'Archived', NULL, 'Yes', 'Yes', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'Individual', '', '', '', '0000-00-00', 'o8g0ryq2Ny7jnSKrfPCPSa1xAjbUnJAUIe3jg7E3', '0000-00-00 00:00:00', '2015-08-07 05:54:48'),
(5, 'Kerwin Bonns', 'Active', NULL, NULL, 'Yes', ',,,,,Philippines', '', '', '', '', '', 'Philippines', '', '', '', '', '', '', '', '', '', '', 'Individual', '', '', '', '0000-00-00', 'JMW41RuOg7fq3RGLArPEsqqrAG1ix4IsEPIUQ2i4', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(6, 'Michael Esmeross', 'Active', NULL, NULL, 'Yes', ',,,,,Philippines', '', '', '', '', '', 'Philippines', '', '', '', '', '', '', '', '', '', '', 'Individual', '', '', '', '0000-00-00', 'JMW41RuOg7fq3RGLArPEsqqrAG1ix4IsEPIUQ2i4', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(7, 'Dexter Ryan S. Mancao', 'Active', 'Yes', 'Yes', 'Yes', 'Unit 508, MHT Building,Plaridel Street,Cambaro,Mandaue City,Cebu,Philippines', 'Unit 508, MHT Building', 'Plaridel Street', 'Cambaro', 'Mandaue City', 'Cebu', 'Philippines', '63', '917', '3203800', '', '', '', '', '', '', 'dexter@mto.com.ph', 'Individual', '', '', '', '1980-12-04', 'vOxUeWWt2hMk84a3Fa76o6WVne8a8KnjKuXbITnm', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(8, 'Daisy Sue Kimberly G. Mancao', 'Active', 'Yes', 'Yes', 'Yes', 'Unit 508, MHT Building,Plaridel Street,Cambaro,Mandaue City,Cebu,Philippines', 'Unit 508, MHT Building', 'Plaridel Street', 'Cambaro', 'Mandaue City', 'Cebu', 'Philippines', '63', '917', '3253800', '63', '32', '3187505', '', '', '', 'daisysuekimberly@yahoo.com', 'Individual', '', '', '', '1985-12-05', 'o8g0ryq2Ny7jnSKrfPCPSa1xAjbUnJAUIe3jg7E3', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `partnertitles`
--
CREATE TABLE IF NOT EXISTS `partnertitles` (
  `id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `active` enum('Yes','No') DEFAULT NULL
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

INSERT INTO `partnertitles` (`id`, `name`, `active`) VALUES
(1, 'Mr.', 'Yes'),
(2, 'Mrs.', 'Yes'),
(3, 'Ms.', 'Yes'),
(4, 'Atty.', 'Yes'),
(5, 'Dr.', 'Yes');

-- --------------------------------------------------------

--
-- Table structure for table `partner_branches`
--

-- Dumping data for table `partner_branches`
--

INSERT INTO `partner_branches` (`id`, `partner_id`, `name`, `description`, `address`, `status`, `home`, `street`, `barangay`, `city`, `province`, `country`, `mobile_countrycode`, `mobile_areacode`, `mobile_lineno`, `tel_countrycode`, `tel_areacode`, `tel_lineno`, `fax_countrycode`, `fax_areacode`, `fax_lineno`, `email`, `_token`, `created_at`, `updated_at`) VALUES
(1, 2, 'Michael Esmero', 'Tipolo Branch', ',,,,,', 'Active', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'MfZXkXwp9fibNfI4XvHH4ycUKtFJ53xehMDhoxN8', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(2, 2, 'Michael Esmero', 'Tipolo Branch', ',,,,,', 'Active', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'MfZXkXwp9fibNfI4XvHH4ycUKtFJ53xehMDhoxN8', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(3, 2, 'Michael Esmero', 'Tipolo Branch', ',,,,,', 'Active', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'MfZXkXwp9fibNfI4XvHH4ycUKtFJ53xehMDhoxN8', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(4, 3, 'Michael Esmero', 'Ayala Branch', ',,,,,', 'Active', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'FDp7oyum9hhX1yrVyO5kdt78Ig1pIn8VbWiFmOxT', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(5, 5, 'Michael Esmero', 'Ayala Branch', ',,,,,', 'Active', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'OgT9xwwlQUdmMDiu49FhjThIDdL9DO0Gx5hmumDB', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(6, 5, 'Michael Esmero', 'Tipolo Branch', ',,,,,', 'Active', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'OgT9xwwlQUdmMDiu49FhjThIDdL9DO0Gx5hmumDB', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `partner_contacts`
--

--
-- Dumping data for table `partner_contacts`
--

INSERT INTO `partner_contacts` (`id`, `partner_id`, `status`, `title`, `manager`, `supervisor`, `contact_person`, `last_name`, `first_name`, `middle_name`, `position`, `branch`, `address`, `home`, `street`, `barangay`, `city`, `province`, `country`, `citizenship`, `gender`, `marital_status`, `active`, `birthday`, `mobile_countrycode`, `mobile_areacode`, `mobile_lineno`, `tel_countrycode`, `tel_areacode`, `tel_lineno`, `fax_countrycode`, `fax_areacode`, `fax_lineno`, `email`, `_token`, `created_at`, `updated_at`) VALUES
(1, 2, '', '', NULL, NULL, NULL, 'Armecin', 'Wil Fred', 'N.', '', '', ',,,,,', '', '', '', '', '', '', '', '', '', '', '0000-00-00', '', '', '', '', '', '', '', '', '', '', 'sL4RQl3JIehVMm1O0eb6LWkBKaGnUyGqNfvKKBOp', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(2, 2, '', '', NULL, NULL, NULL, 'Armecin', 'Wil Fred', 'N.', '', '', ',,,,,', '', '', '', '', '', '', '', '', '', '', '0000-00-00', '', '', '', '', '', '', '', '', '', '', 'sL4RQl3JIehVMm1O0eb6LWkBKaGnUyGqNfvKKBOp', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(3, 2, '', '', NULL, NULL, NULL, 'Armecin', 'Wil Fred', 'N.', '', '', ',,,,,', '', '', '', '', '', '', '', '', '', '', '0000-00-00', '', '', '', '', '', '', '', '', '', '', 'sL4RQl3JIehVMm1O0eb6LWkBKaGnUyGqNfvKKBOp', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(4, 2, '', '', NULL, NULL, NULL, 'Armecin', 'Wil Fred', 'N.', '', '', ',,,,,', '', '', '', '', '', '', '', '', '', '', '0000-00-00', '', '', '', '', '', '', '', '', '', '', 'sL4RQl3JIehVMm1O0eb6LWkBKaGnUyGqNfvKKBOp', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(5, 2, '', '', NULL, NULL, NULL, 'Armecin', 'Wil Fred', 'N.', '', '', ',,,,,', '', '', '', '', '', '', '', '', '', '', '0000-00-00', '', '', '', '', '', '', '', '', '', '', 'sL4RQl3JIehVMm1O0eb6LWkBKaGnUyGqNfvKKBOp', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(6, 1, 'Active', '', NULL, NULL, NULL, 'Armecin', 'Wil Fred', 'N.', '', '', ',,,,,', '', '', '', '', '', '', '', '', '', 'Yes', '0000-00-00', '', '', '', '', '', '', '', '', '', '', 'FDp7oyum9hhX1yrVyO5kdt78Ig1pIn8VbWiFmOxT', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(7, 1, 'Active', '', NULL, NULL, NULL, 'Armecin', 'Wil Fred', 'N.', '', '', ',,,,,', '', '', '', '', '', '', '', '', '', 'Yes', '0000-00-00', '', '', '', '', '', '', '', '', '', '', 'FDp7oyum9hhX1yrVyO5kdt78Ig1pIn8VbWiFmOxT', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(8, 3, 'Active', '', NULL, NULL, NULL, 'Armecin', 'Wil Fred', 'N.', '', '', ',,,,,', '', '', '', '', '', '', '', '', '', 'Yes', '0000-00-00', '', '', '', '', '', '', '', '', '', '', 'FDp7oyum9hhX1yrVyO5kdt78Ig1pIn8VbWiFmOxT', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(9, 3, 'Active', '', NULL, NULL, NULL, 'Armecin', 'Wil Fred', 'N.', '', '', ',,,,,', '', '', '', '', '', '', '', '', '', 'Yes', '0000-00-00', '', '', '', '', '', '', '', '', '', '', 'FDp7oyum9hhX1yrVyO5kdt78Ig1pIn8VbWiFmOxT', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(10, 3, 'Active', '', NULL, NULL, NULL, 'Armecin', 'Wil Fred', 'N.', '', '', ',,,,,', '', '', '', '', '', '', '', '', '', 'Yes', '0000-00-00', '', '', '', '', '', '', '', '', '', '', 'FDp7oyum9hhX1yrVyO5kdt78Ig1pIn8VbWiFmOxT', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(11, 3, 'Active', '', NULL, NULL, NULL, 'Armecin', 'Wil Fred', 'N.', '', '', ',,,,,', '', '', '', '', '', '', '', '', '', 'Yes', '0000-00-00', '', '', '', '', '', '', '', '', '', '', 'FDp7oyum9hhX1yrVyO5kdt78Ig1pIn8VbWiFmOxT', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(12, 5, 'Active', '', NULL, NULL, NULL, 'Armecin', 'Wil Fred', 'N.', '', '', ',,,,,', '', '', '', '', '', '', '', '', '', 'Yes', '0000-00-00', '', '', '', '', '', '', '', '', '', '', 'OgT9xwwlQUdmMDiu49FhjThIDdL9DO0Gx5hmumDB', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(13, 5, 'Active', '', NULL, NULL, NULL, 'Armecin', 'Wil Fred', 'N.', '', '', ',,,,,', '', '', '', '', '', '', '', '', '', 'Yes', '0000-00-00', '', '', '', '', '', '', '', '', '', '', 'OgT9xwwlQUdmMDiu49FhjThIDdL9DO0Gx5hmumDB', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(14, 5, 'Active', '', NULL, NULL, NULL, 'Armecin', 'Wil Fred', 'N.', '', '', ',,,,,', '', '', '', '', '', '', '', '', '', 'Yes', '0000-00-00', '', '', '', '', '', '', '', '', '', '', 'OgT9xwwlQUdmMDiu49FhjThIDdL9DO0Gx5hmumDB', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `uoms`
--

-- Dumping data for table `uoms`
--

INSERT INTO `uoms` (`id`, `short`, `name`, `plural_name`, `active`) VALUES
(48, 'kwh', 'kilowatt-hour', 'kilowatt-hours', 'Y'),
(37, 'pc', 'piece', 'pieces', 'Y'),
(44, 'kg', 'kilogram', 'kilograms', 'Y'),
(39, 'length', 'length', 'lengths', 'Y'),
(40, 'meter', 'meter', 'meters', 'Y'),
(41, 'roll', 'roll', 'rolls', 'Y'),
(42, 'box', 'box', 'boxes', 'Y'),
(43, 'set', 'set', 'sets', 'Y'),
(45, 'liter', 'liter', 'liters', 'Y'),
(46, 'lot', 'lot', 'lots', 'Y'),
(47, 'man hour', 'man hour', 'man hours', 'Y'),
(49, 'ml', 'milliliter', 'milliliters', 'Y');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accounts`
