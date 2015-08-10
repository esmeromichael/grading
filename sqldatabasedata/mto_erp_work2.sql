/*
Navicat MySQL Data Transfer

Source Server         : mto-erp
Source Server Version : 50617
Source Host           : localhost:3306
Source Database       : mto-erp

Target Server Type    : MYSQL
Target Server Version : 50617
File Encoding         : 65001

Date: 2015-08-10 14:05:27
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for citizenships
-- ----------------------------
DROP TABLE IF EXISTS `citizenships`;
CREATE TABLE `citizenships` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `is_local` enum('Y','N') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'N',
  `status` enum('Active','Inactive','Archived') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Active',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of citizenships
-- ----------------------------
INSERT INTO `citizenships` VALUES ('1', 'Filipino', 'Citizens of the Republic of the Philippines\r\n', 'Y', 'Active');
INSERT INTO `citizenships` VALUES ('2', 'Chinese', 'Citizens of the People\'s Republic of China\r\n', 'Y', 'Active');
INSERT INTO `citizenships` VALUES ('3', 'Japanese', 'Citizens of Japan', 'N', 'Active');
INSERT INTO `citizenships` VALUES ('4', 'Malaysian', 'Citizens of Malaysia', 'N', 'Active');
INSERT INTO `citizenships` VALUES ('5', 'Afghan', 'Citizens of Afghanistan', 'N', 'Inactive');
INSERT INTO `citizenships` VALUES ('6', 'American', 'Citizens of the USA', 'N', 'Active');
INSERT INTO `citizenships` VALUES ('7', 'German', 'Citizens of Germany', 'N', 'Active');
INSERT INTO `citizenships` VALUES ('8', 'Russian', 'Citizens of Russia', 'N', 'Active');
INSERT INTO `citizenships` VALUES ('9', 'Spanish', 'Citizens of Spain', 'N', 'Active');
INSERT INTO `citizenships` VALUES ('10', 'Swedish', 'Citizens of Sweden', 'N', 'Active');
INSERT INTO `citizenships` VALUES ('11', 'French', 'Citizens of France', 'N', 'Active');
INSERT INTO `citizenships` VALUES ('12', 'Korean', 'Citizens of Korea', 'N', 'Active');
INSERT INTO `citizenships` VALUES ('13', 'Polish', 'Citizens of Poland', 'N', 'Active');
INSERT INTO `citizenships` VALUES ('14', 'Greek', 'Citizens of Greece', 'N', 'Active');

-- ----------------------------
-- Table structure for countries
-- ----------------------------
DROP TABLE IF EXISTS `countries`;
CREATE TABLE `countries` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `value` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=242 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of countries
-- ----------------------------
INSERT INTO `countries` VALUES ('1', 'Afghanistan');
INSERT INTO `countries` VALUES ('2', 'Aringland Islands');
INSERT INTO `countries` VALUES ('3', 'Albania');
INSERT INTO `countries` VALUES ('4', 'Algeria');
INSERT INTO `countries` VALUES ('5', 'American Samoa');
INSERT INTO `countries` VALUES ('6', 'Andorra');
INSERT INTO `countries` VALUES ('7', 'Angola');
INSERT INTO `countries` VALUES ('8', 'Anguilla');
INSERT INTO `countries` VALUES ('9', 'Antarctica');
INSERT INTO `countries` VALUES ('10', 'Antigua and Barbuda');
INSERT INTO `countries` VALUES ('11', 'Argentina');
INSERT INTO `countries` VALUES ('12', 'Armenia');
INSERT INTO `countries` VALUES ('13', 'Aruba');
INSERT INTO `countries` VALUES ('14', 'Australia');
INSERT INTO `countries` VALUES ('15', 'Austria');
INSERT INTO `countries` VALUES ('16', 'Azerbaijan');
INSERT INTO `countries` VALUES ('17', 'Bahamas');
INSERT INTO `countries` VALUES ('18', 'Bahrain');
INSERT INTO `countries` VALUES ('19', 'Bangladesh');
INSERT INTO `countries` VALUES ('20', 'Barbados');
INSERT INTO `countries` VALUES ('21', 'Belarus');
INSERT INTO `countries` VALUES ('22', 'Belgium');
INSERT INTO `countries` VALUES ('23', 'Belize');
INSERT INTO `countries` VALUES ('24', 'Benin');
INSERT INTO `countries` VALUES ('25', 'Bermuda');
INSERT INTO `countries` VALUES ('26', 'Bhutan');
INSERT INTO `countries` VALUES ('27', 'Bolivia');
INSERT INTO `countries` VALUES ('28', 'Bosnia and Herzegovina');
INSERT INTO `countries` VALUES ('29', 'Botswana');
INSERT INTO `countries` VALUES ('30', 'Bouvet Island');
INSERT INTO `countries` VALUES ('31', 'Brazil');
INSERT INTO `countries` VALUES ('32', 'British Indian Ocean territory');
INSERT INTO `countries` VALUES ('33', 'Brunei Darussalam');
INSERT INTO `countries` VALUES ('34', 'Bulgaria');
INSERT INTO `countries` VALUES ('35', 'Burkina Faso');
INSERT INTO `countries` VALUES ('36', 'Burundi');
INSERT INTO `countries` VALUES ('37', 'Cambodia');
INSERT INTO `countries` VALUES ('38', 'Cameroon');
INSERT INTO `countries` VALUES ('39', 'Canada');
INSERT INTO `countries` VALUES ('40', 'Cape Verde');
INSERT INTO `countries` VALUES ('41', 'Cayman Islands');
INSERT INTO `countries` VALUES ('42', 'Central African Republic');
INSERT INTO `countries` VALUES ('43', 'Chad');
INSERT INTO `countries` VALUES ('44', 'Chile');
INSERT INTO `countries` VALUES ('45', 'China');
INSERT INTO `countries` VALUES ('46', 'Christmas Island');
INSERT INTO `countries` VALUES ('47', 'Cocos (Keeling) Islands');
INSERT INTO `countries` VALUES ('48', 'Colombia');
INSERT INTO `countries` VALUES ('49', 'Comoros');
INSERT INTO `countries` VALUES ('50', 'Congo');
INSERT INTO `countries` VALUES ('51', 'Congo');
INSERT INTO `countries` VALUES ('52', ' Democratic Republic');
INSERT INTO `countries` VALUES ('53', 'Cook Islands');
INSERT INTO `countries` VALUES ('54', 'Costa Rica');
INSERT INTO `countries` VALUES ('55', 'Ivory Coast (Ivory Coast)');
INSERT INTO `countries` VALUES ('56', 'Croatia (Hrvatska)');
INSERT INTO `countries` VALUES ('57', 'Cuba');
INSERT INTO `countries` VALUES ('58', 'Cyprus');
INSERT INTO `countries` VALUES ('59', 'Czech Republic');
INSERT INTO `countries` VALUES ('60', 'Denmark');
INSERT INTO `countries` VALUES ('61', 'Djibouti');
INSERT INTO `countries` VALUES ('62', 'Dominica');
INSERT INTO `countries` VALUES ('63', 'Dominican Republic');
INSERT INTO `countries` VALUES ('64', 'East Timor');
INSERT INTO `countries` VALUES ('65', 'Ecuador');
INSERT INTO `countries` VALUES ('66', 'Egypt');
INSERT INTO `countries` VALUES ('67', 'El Salvador');
INSERT INTO `countries` VALUES ('68', 'Equatorial Guinea');
INSERT INTO `countries` VALUES ('69', 'Eritrea');
INSERT INTO `countries` VALUES ('70', 'Estonia');
INSERT INTO `countries` VALUES ('71', 'Ethiopia');
INSERT INTO `countries` VALUES ('72', 'Falkland Islands');
INSERT INTO `countries` VALUES ('73', 'Faroe Islands');
INSERT INTO `countries` VALUES ('74', 'Fiji');
INSERT INTO `countries` VALUES ('75', 'Finland');
INSERT INTO `countries` VALUES ('76', 'France');
INSERT INTO `countries` VALUES ('77', 'French Guiana');
INSERT INTO `countries` VALUES ('78', 'French Polynesia');
INSERT INTO `countries` VALUES ('79', 'French Southern Territories');
INSERT INTO `countries` VALUES ('80', 'Gabon');
INSERT INTO `countries` VALUES ('81', 'Gambia');
INSERT INTO `countries` VALUES ('82', 'Georgia');
INSERT INTO `countries` VALUES ('83', 'Germany');
INSERT INTO `countries` VALUES ('84', 'Ghana');
INSERT INTO `countries` VALUES ('85', 'Gibraltar');
INSERT INTO `countries` VALUES ('86', 'Greece');
INSERT INTO `countries` VALUES ('87', 'Greenland');
INSERT INTO `countries` VALUES ('88', 'Grenada');
INSERT INTO `countries` VALUES ('89', 'Guadeloupe');
INSERT INTO `countries` VALUES ('90', 'Guam');
INSERT INTO `countries` VALUES ('91', 'Guatemala');
INSERT INTO `countries` VALUES ('92', 'Guinea');
INSERT INTO `countries` VALUES ('93', 'Guinea-Bissau');
INSERT INTO `countries` VALUES ('94', 'Guyana');
INSERT INTO `countries` VALUES ('95', 'Haiti');
INSERT INTO `countries` VALUES ('96', 'Heard and McDonald Islands');
INSERT INTO `countries` VALUES ('97', 'Honduras');
INSERT INTO `countries` VALUES ('98', 'Hong Kong');
INSERT INTO `countries` VALUES ('99', 'Hungary');
INSERT INTO `countries` VALUES ('100', 'Iceland');
INSERT INTO `countries` VALUES ('101', 'India');
INSERT INTO `countries` VALUES ('102', 'Indonesia');
INSERT INTO `countries` VALUES ('103', 'Iran');
INSERT INTO `countries` VALUES ('104', 'Iraq');
INSERT INTO `countries` VALUES ('105', 'Ireland');
INSERT INTO `countries` VALUES ('106', 'Israel');
INSERT INTO `countries` VALUES ('107', 'Italy');
INSERT INTO `countries` VALUES ('108', 'Jamaica');
INSERT INTO `countries` VALUES ('109', 'Japan');
INSERT INTO `countries` VALUES ('110', 'Jordan');
INSERT INTO `countries` VALUES ('111', 'Kazakhstan');
INSERT INTO `countries` VALUES ('112', 'Kenya');
INSERT INTO `countries` VALUES ('113', 'Kiribati');
INSERT INTO `countries` VALUES ('114', 'Korea (north)');
INSERT INTO `countries` VALUES ('115', 'Korea (south)');
INSERT INTO `countries` VALUES ('116', 'Kuwait');
INSERT INTO `countries` VALUES ('117', 'Kyrgyzstan');
INSERT INTO `countries` VALUES ('118', 'Lao People\'s Democratic Republic');
INSERT INTO `countries` VALUES ('119', 'Latvia');
INSERT INTO `countries` VALUES ('120', 'Lebanon');
INSERT INTO `countries` VALUES ('121', 'Lesotho');
INSERT INTO `countries` VALUES ('122', 'Liberia');
INSERT INTO `countries` VALUES ('123', 'Libyan Arab Jamahiriya');
INSERT INTO `countries` VALUES ('124', 'Liechtenstein');
INSERT INTO `countries` VALUES ('125', 'Lithuania');
INSERT INTO `countries` VALUES ('126', 'Luxembourg');
INSERT INTO `countries` VALUES ('127', 'Macao');
INSERT INTO `countries` VALUES ('128', 'Macedonia');
INSERT INTO `countries` VALUES ('129', 'Madagascar');
INSERT INTO `countries` VALUES ('130', 'Malawi');
INSERT INTO `countries` VALUES ('131', 'Malaysia');
INSERT INTO `countries` VALUES ('132', 'Maldives');
INSERT INTO `countries` VALUES ('133', 'Mali');
INSERT INTO `countries` VALUES ('134', 'Malta');
INSERT INTO `countries` VALUES ('135', 'Marshall Islands');
INSERT INTO `countries` VALUES ('136', 'Martinique');
INSERT INTO `countries` VALUES ('137', 'Mauritania');
INSERT INTO `countries` VALUES ('138', 'Mauritius');
INSERT INTO `countries` VALUES ('139', 'Mayotte');
INSERT INTO `countries` VALUES ('140', 'Mexico');
INSERT INTO `countries` VALUES ('141', 'Micronesia');
INSERT INTO `countries` VALUES ('142', 'Moldova');
INSERT INTO `countries` VALUES ('143', 'Monaco');
INSERT INTO `countries` VALUES ('144', 'Mongolia');
INSERT INTO `countries` VALUES ('145', 'Montserrat');
INSERT INTO `countries` VALUES ('146', 'Morocco');
INSERT INTO `countries` VALUES ('147', 'Mozambique');
INSERT INTO `countries` VALUES ('148', 'Myanmar');
INSERT INTO `countries` VALUES ('149', 'Namibia');
INSERT INTO `countries` VALUES ('150', 'Nauru');
INSERT INTO `countries` VALUES ('151', 'Nepal');
INSERT INTO `countries` VALUES ('152', 'Netherlands');
INSERT INTO `countries` VALUES ('153', 'Netherlands Antilles');
INSERT INTO `countries` VALUES ('154', 'New Caledonia');
INSERT INTO `countries` VALUES ('155', 'New Zealand');
INSERT INTO `countries` VALUES ('156', 'Nicaragua');
INSERT INTO `countries` VALUES ('157', 'Niger');
INSERT INTO `countries` VALUES ('158', 'Nigeria');
INSERT INTO `countries` VALUES ('159', 'Niue');
INSERT INTO `countries` VALUES ('160', 'Norfolk Island');
INSERT INTO `countries` VALUES ('161', 'Northern Mariana Islands');
INSERT INTO `countries` VALUES ('162', 'Norway');
INSERT INTO `countries` VALUES ('163', 'Oman');
INSERT INTO `countries` VALUES ('164', 'Pakistan');
INSERT INTO `countries` VALUES ('165', 'Palau');
INSERT INTO `countries` VALUES ('166', 'Palestinian Territories');
INSERT INTO `countries` VALUES ('167', 'Panama');
INSERT INTO `countries` VALUES ('168', 'Papua New Guinea');
INSERT INTO `countries` VALUES ('169', 'Paraguay');
INSERT INTO `countries` VALUES ('170', 'Peru');
INSERT INTO `countries` VALUES ('171', 'Philippines');
INSERT INTO `countries` VALUES ('172', 'Pitcairn');
INSERT INTO `countries` VALUES ('173', 'Poland');
INSERT INTO `countries` VALUES ('174', 'Portugal');
INSERT INTO `countries` VALUES ('175', 'Puerto Rico');
INSERT INTO `countries` VALUES ('176', 'Qatar');
INSERT INTO `countries` VALUES ('177', 'Runion');
INSERT INTO `countries` VALUES ('178', 'Romania');
INSERT INTO `countries` VALUES ('179', 'Russian Federation');
INSERT INTO `countries` VALUES ('180', 'Rwanda');
INSERT INTO `countries` VALUES ('181', 'Saint Helena');
INSERT INTO `countries` VALUES ('182', 'Saint Kitts and Nevis');
INSERT INTO `countries` VALUES ('183', 'Saint Lucia');
INSERT INTO `countries` VALUES ('184', 'Saint Pierre and Miquelon');
INSERT INTO `countries` VALUES ('185', 'Saint Vincent and the Grenadines');
INSERT INTO `countries` VALUES ('186', 'Samoa');
INSERT INTO `countries` VALUES ('187', 'San Marino');
INSERT INTO `countries` VALUES ('188', 'Sao Tome and Principe');
INSERT INTO `countries` VALUES ('189', 'Saudi Arabia');
INSERT INTO `countries` VALUES ('190', 'Senegal');
INSERT INTO `countries` VALUES ('191', 'Serbia and Montenegro');
INSERT INTO `countries` VALUES ('192', 'Seychelles');
INSERT INTO `countries` VALUES ('193', 'Sierra Leone');
INSERT INTO `countries` VALUES ('194', 'Singapore');
INSERT INTO `countries` VALUES ('195', 'Slovakia');
INSERT INTO `countries` VALUES ('196', 'Slovenia');
INSERT INTO `countries` VALUES ('197', 'Solomon Islands');
INSERT INTO `countries` VALUES ('198', 'Somalia');
INSERT INTO `countries` VALUES ('199', 'South Africa');
INSERT INTO `countries` VALUES ('200', 'South Georgia and the South Sandwich Islands');
INSERT INTO `countries` VALUES ('201', 'Spain');
INSERT INTO `countries` VALUES ('202', 'Sri Lanka');
INSERT INTO `countries` VALUES ('203', 'Sudan');
INSERT INTO `countries` VALUES ('204', 'Suriname');
INSERT INTO `countries` VALUES ('205', 'Svalbard and Jan Mayen Islands');
INSERT INTO `countries` VALUES ('206', 'Swaziland');
INSERT INTO `countries` VALUES ('207', 'Sweden');
INSERT INTO `countries` VALUES ('208', 'Switzerland');
INSERT INTO `countries` VALUES ('209', 'Syria');
INSERT INTO `countries` VALUES ('210', 'Taiwan');
INSERT INTO `countries` VALUES ('211', 'Tajikistan');
INSERT INTO `countries` VALUES ('212', 'Tanzania');
INSERT INTO `countries` VALUES ('213', 'Thailand');
INSERT INTO `countries` VALUES ('214', 'Togo');
INSERT INTO `countries` VALUES ('215', 'Tokelau');
INSERT INTO `countries` VALUES ('216', 'Tonga');
INSERT INTO `countries` VALUES ('217', 'Trinidad and Tobago');
INSERT INTO `countries` VALUES ('218', 'Tunisia');
INSERT INTO `countries` VALUES ('219', 'Turkey');
INSERT INTO `countries` VALUES ('220', 'Turkmenistan');
INSERT INTO `countries` VALUES ('221', 'Turks and Caicos Islands');
INSERT INTO `countries` VALUES ('222', 'Tuvalu');
INSERT INTO `countries` VALUES ('223', 'Uganda');
INSERT INTO `countries` VALUES ('224', 'Ukraine');
INSERT INTO `countries` VALUES ('225', 'United Arab Emirates');
INSERT INTO `countries` VALUES ('226', 'United Kingdom');
INSERT INTO `countries` VALUES ('227', 'United States of America');
INSERT INTO `countries` VALUES ('228', 'Uruguay');
INSERT INTO `countries` VALUES ('229', 'Uzbekistan');
INSERT INTO `countries` VALUES ('230', 'Vanuatu');
INSERT INTO `countries` VALUES ('231', 'Vatican City');
INSERT INTO `countries` VALUES ('232', 'Venezuela');
INSERT INTO `countries` VALUES ('233', 'Vietnam');
INSERT INTO `countries` VALUES ('234', 'Virgin Islands (British)');
INSERT INTO `countries` VALUES ('235', 'Virgin Islands (US)');
INSERT INTO `countries` VALUES ('236', 'Wallis and Futuna Islands');
INSERT INTO `countries` VALUES ('237', 'Western Sahara');
INSERT INTO `countries` VALUES ('238', 'Yemen');
INSERT INTO `countries` VALUES ('239', 'Zaire');
INSERT INTO `countries` VALUES ('240', 'Zambia');
INSERT INTO `countries` VALUES ('241', 'Zimbabwe');

-- ----------------------------
-- Table structure for dr_batch
-- ----------------------------
DROP TABLE IF EXISTS `dr_batch`;
CREATE TABLE `dr_batch` (
  `dr_no` int(11) NOT NULL,
  `ref_type` int(11) NOT NULL,
  `ref_no` int(11) NOT NULL,
  `batch` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `o_id` int(11) NOT NULL,
  `batch_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`batch`,`dr_no`,`ref_type`,`ref_no`,`o_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of dr_batch
-- ----------------------------

-- ----------------------------
-- Table structure for dr_details
-- ----------------------------
DROP TABLE IF EXISTS `dr_details`;
CREATE TABLE `dr_details` (
  `dr_dtl_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `client` int(11) NOT NULL,
  `module_id` int(11) NOT NULL,
  `dr_no` int(11) NOT NULL,
  `ref_type` int(11) NOT NULL,
  `ref_no` int(11) NOT NULL,
  `ref_dtl_id` int(11) NOT NULL,
  `batch_no` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `uom` int(11) NOT NULL,
  `qoh` decimal(12,2) NOT NULL DEFAULT '0.00',
  `qty` decimal(20,2) NOT NULL DEFAULT '0.00',
  `price` decimal(20,2) NOT NULL DEFAULT '0.00',
  `total_amt` decimal(20,2) NOT NULL DEFAULT '0.00',
  `item_cost` decimal(12,2) NOT NULL DEFAULT '0.00',
  `eqty` decimal(12,2) NOT NULL DEFAULT '0.00',
  `disc` decimal(10,2) NOT NULL DEFAULT '0.00',
  `q_price` decimal(12,2) NOT NULL DEFAULT '0.00',
  `desc_type` enum('amount','percent') COLLATE utf8_unicode_ci NOT NULL,
  `remarks` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `max` decimal(12,2) NOT NULL DEFAULT '0.00',
  `min` decimal(12,2) NOT NULL DEFAULT '0.00',
  `std` decimal(12,2) NOT NULL DEFAULT '0.00',
  `uuid` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`dr_dtl_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of dr_details
-- ----------------------------

-- ----------------------------
-- Table structure for dr_header
-- ----------------------------
DROP TABLE IF EXISTS `dr_header`;
CREATE TABLE `dr_header` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of dr_header
-- ----------------------------

-- ----------------------------
-- Table structure for dr_serials
-- ----------------------------
DROP TABLE IF EXISTS `dr_serials`;
CREATE TABLE `dr_serials` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of dr_serials
-- ----------------------------

-- ----------------------------
-- Table structure for entities
-- ----------------------------
DROP TABLE IF EXISTS `entities`;
CREATE TABLE `entities` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` enum('Active','Inactive','Archived') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Active',
  `sort` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of entities
-- ----------------------------
INSERT INTO `entities` VALUES ('1', 'Corporation', 'Corporation', 'Active', '4');
INSERT INTO `entities` VALUES ('3', 'Partnership', 'Partnership', 'Active', '3');
INSERT INTO `entities` VALUES ('4', 'Sole Proprietorship', 'Sole Proprietorship', 'Active', '2');
INSERT INTO `entities` VALUES ('6', 'Individual', 'Individual', 'Active', '1');

-- ----------------------------
-- Table structure for items
-- ----------------------------
DROP TABLE IF EXISTS `items`;
CREATE TABLE `items` (
  `item_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `code` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `sku` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `generic` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `brand` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `make` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `model` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `color` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `size_dim` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `gauge_thick` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `account` int(11) NOT NULL,
  `category` int(11) NOT NULL,
  `subcategory` int(11) NOT NULL,
  `reorder_lvl` decimal(11,2) NOT NULL DEFAULT '0.00',
  `lead_time` int(11) NOT NULL,
  `uom` int(11) NOT NULL,
  `ave_cost` decimal(20,4) NOT NULL DEFAULT '0.0000',
  `item_cost` decimal(12,4) NOT NULL DEFAULT '0.0000',
  `status` enum('New','Active','Archived') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'New',
  `for_sale` enum('Y','N') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Y',
  `vatable` enum('Y','N') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Y',
  `inventoriable` enum('Y','N') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'N',
  `serialized` enum('Y','N') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'N',
  `sales_acct` int(11) NOT NULL,
  `usage_acct` int(11) NOT NULL,
  `inv_acct` int(11) NOT NULL,
  `over_cost` enum('null','Amount','Percent') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'null',
  `std` decimal(12,2) NOT NULL DEFAULT '0.00',
  `max` decimal(12,2) NOT NULL DEFAULT '0.00',
  `min` decimal(12,2) NOT NULL DEFAULT '0.00',
  `old_id` int(11) NOT NULL,
  `_token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`item_id`)
) ENGINE=InnoDB AUTO_INCREMENT=44101 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of items
-- ----------------------------
INSERT INTO `items` VALUES ('2627', '', '', 'Power Supply Unit', 'OEM', 'ATX Switching', '', '', '1000W', '', 'Power Supply Unit OEM ATX Switching 1000W', '0', '9', '2', '0.00', '0', '37', '0.0000', '8600.0000', 'Active', 'N', 'Y', '', '', '0', '0', '0', 'null', '20.00', '30.00', '10.00', '2', '', '0000-00-00 00:00:00', '2015-08-10 09:08:18');
INSERT INTO `items` VALUES ('2739', '', '', 'Processor', 'Intel', '', 'G2010', '', ' 3MB Cache, 2.8GHz', '', 'Processor Intel Pentium G2010  3MB Cache, 2.8GHz', '0', '10', '0', '0.00', '0', '0', '0.0000', '0.0000', 'New', 'Y', 'Y', 'N', 'N', '0', '0', '0', 'null', '0.00', '0.00', '0.00', '0', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00');
INSERT INTO `items` VALUES ('44093', '', '', '3rd Party Camera License', 'Geovision', '', '', '', '16-Channels', '', '3rd Party Camera License Geovision    16-Channels ', '0', '2', '2', '0.00', '0', '37', '0.0000', '36400.0000', 'Active', 'N', 'Y', 'Y', 'Y', '0', '0', '0', 'null', '50.00', '70.00', '30.00', '1', '', '0000-00-00 00:00:00', '2015-08-10 09:09:13');
INSERT INTO `items` VALUES ('44094', 'James Bond 007', '', '', 'Nike', '', 'Stefan Janoski', 'Red', '9\"', '', ' Nike  Stefan Janoski Red 9\" ', '0', '14', '65', '0.00', '0', '37', '0.0000', '0.0000', 'New', 'Y', 'Y', 'Y', '', '0', '0', '0', 'null', '0.00', '0.00', '0.00', '0', '2L0S6BoxziLjqapbX4kGHkQwnLN0utHbZhhDW2Xt', '0000-00-00 00:00:00', '2015-08-07 02:51:14');
INSERT INTO `items` VALUES ('44095', 'nike102', '', '', 'Nike', '', 'Roshe Run', 'Red', '8 1/2\"', '', ' Nike  Roshe Run Red 8 1/2\" ', '0', '14', '65', '0.00', '0', '37', '0.0000', '0.0000', 'New', 'Y', 'Y', 'Y', '', '0', '0', '0', 'null', '0.00', '0.00', '0.00', '0', '2L0S6BoxziLjqapbX4kGHkQwnLN0utHbZhhDW2Xt', '0000-00-00 00:00:00', '2015-08-07 06:08:45');
INSERT INTO `items` VALUES ('44096', 'nike101', '', '', 'Nike', '', 'Air Max 90 2007', 'Black-Pink', '7\"', '', ' Nike  Air Max 90 2007 Black-Pink 7\" ', '0', '14', '65', '0.00', '0', '37', '0.0000', '0.0000', 'New', 'Y', 'Y', 'Y', 'Y', '0', '0', '0', 'null', '0.00', '0.00', '0.00', '0', 'vOxUeWWt2hMk84a3Fa76o6WVne8a8KnjKuXbITnm', '0000-00-00 00:00:00', '0000-00-00 00:00:00');
INSERT INTO `items` VALUES ('44097', '', '', 'Solid State Drive', 'Transcend', '', 'SSD370', '', '128GB', '', 'Solid State Drive Transcend  SSD370  128GB ', '0', '10', '15', '0.00', '0', '37', '0.0000', '0.0000', 'New', 'Y', 'Y', 'Y', 'Y', '0', '0', '0', 'null', '0.00', '0.00', '0.00', '0', 'QsaUO1ub6gs2omgcYEeJpf5xt3D7qtr2v9fKOO1l', '0000-00-00 00:00:00', '0000-00-00 00:00:00');
INSERT INTO `items` VALUES ('44098', '', '', 'Solid State Drive', 'Intel', '', 'SSDSC2CT060A3', '', '60GB', '', 'Solid State Drive Intel  SSDSC2CT060A3  60GB ', '0', '10', '15', '0.00', '0', '37', '0.0000', '0.0000', 'New', 'Y', 'Y', 'Y', 'Y', '0', '0', '0', 'null', '0.00', '0.00', '0.00', '0', '', '2015-08-10 09:51:49', '2015-08-10 09:51:49');
INSERT INTO `items` VALUES ('44099', '', '', 'Video Card', 'Inno3D', 'GTX 780', 'N78V-1SDN-L5HSX', '', '3GB', '', 'Video Card Inno3D GTX 780 N78V-1SDN-L5HSX  3GB ', '0', '10', '14', '0.00', '0', '37', '0.0000', '0.0000', 'New', 'Y', 'Y', 'Y', 'Y', '0', '0', '0', 'null', '0.00', '0.00', '0.00', '0', '', '2015-08-10 10:43:08', '2015-08-10 10:43:08');
INSERT INTO `items` VALUES ('44100', '', '', 'ADSL Modem', 'Mercury', '', 'MD880D', '', '', '', 'ADSL Modem Mercury  MD880D   ', '0', '13', '62', '0.00', '0', '37', '0.0000', '0.0000', 'New', 'Y', 'Y', 'Y', 'N', '0', '0', '0', 'null', '0.00', '0.00', '0.00', '0', '', '2015-08-10 13:26:52', '2015-08-10 13:26:52');

-- ----------------------------
-- Table structure for item_categories
-- ----------------------------
DROP TABLE IF EXISTS `item_categories`;
CREATE TABLE `item_categories` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `short` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `active` enum('Y','N') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Y',
  `for_printing` enum('Y','N') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'N',
  `for_lamination` enum('Y','N') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'N',
  `group` int(11) NOT NULL,
  `vatable` enum('Y','N') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Y',
  `sales_acct` int(11) NOT NULL DEFAULT '0',
  `usage_acct` int(11) NOT NULL DEFAULT '0',
  `inv_acct` int(11) NOT NULL DEFAULT '0',
  `over_cost` enum('null','Amount','Percent') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'null',
  `std` decimal(12,2) NOT NULL,
  `max` decimal(12,2) NOT NULL,
  `min` decimal(12,2) NOT NULL,
  `_token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=42 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of item_categories
-- ----------------------------
INSERT INTO `item_categories` VALUES ('1', '', 'Computer Hardwares', '', 'N', 'N', 'N', '0', 'Y', '50', '69', '8', 'Percent', '10.00', '20.00', '8.00', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00');
INSERT INTO `item_categories` VALUES ('2', '', 'Security Systems', '', 'Y', 'N', 'N', '0', 'Y', '50', '16', '8', 'Percent', '42.86', '50.00', '35.00', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00');
INSERT INTO `item_categories` VALUES ('3', '', 'POS Systems', '', 'Y', 'N', 'N', '0', 'Y', '50', '16', '8', 'Percent', '20.00', '40.00', '15.00', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00');
INSERT INTO `item_categories` VALUES ('4', '', 'Home Automation Systems', '', 'Y', 'N', 'N', '0', 'Y', '50', '17', '8', 'Percent', '20.00', '40.00', '15.00', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00');
INSERT INTO `item_categories` VALUES ('5', '', 'Software', '', 'Y', 'N', 'N', '0', 'Y', '50', '69', '8', 'Percent', '10.00', '20.00', '8.00', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00');
INSERT INTO `item_categories` VALUES ('6', '', 'Project Materials', '', 'Y', 'N', 'N', '0', 'Y', '50', '82', '8', 'Percent', '10.00', '20.00', '8.00', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00');
INSERT INTO `item_categories` VALUES ('7', '', 'Network Equipment', '', 'Y', 'N', 'N', '0', 'Y', '50', '16', '8', 'Percent', '10.00', '20.00', '8.00', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00');
INSERT INTO `item_categories` VALUES ('8', '', 'Services', '', 'Y', 'N', 'N', '0', 'Y', '51', '81', '88', 'Amount', '100.00', '200.00', '50.00', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00');
INSERT INTO `item_categories` VALUES ('9', '', 'Power Devices', '', 'Y', 'N', 'N', '0', 'Y', '50', '16', '8', 'Percent', '50.00', '100.00', '40.00', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00');
INSERT INTO `item_categories` VALUES ('10', '', 'Computer Equipment', '', 'Y', 'N', 'N', '0', 'Y', '50', '16', '8', 'Percent', '10.00', '20.00', '8.00', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00');
INSERT INTO `item_categories` VALUES ('11', '', 'Cables and Wires', '', 'Y', 'N', 'N', '0', 'Y', '50', '82', '8', 'Percent', '20.00', '30.00', '10.00', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00');
INSERT INTO `item_categories` VALUES ('12', '', 'Tools', '', 'Y', 'N', 'N', '0', 'Y', '50', '15', '8', 'Percent', '20.00', '30.00', '10.00', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00');
INSERT INTO `item_categories` VALUES ('13', '', 'Office Supplies', '', 'Y', 'N', 'N', '0', 'Y', '50', '69', '8', 'Percent', '10.00', '20.00', '5.00', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00');
INSERT INTO `item_categories` VALUES ('14', '', 'Personal Protective Equipments', '', 'Y', 'N', 'N', '0', 'Y', '50', '16', '8', 'Percent', '20.00', '30.00', '15.00', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00');
INSERT INTO `item_categories` VALUES ('15', '', 'Household Products', '', 'Y', 'N', 'N', '0', 'Y', '50', '69', '8', 'Amount', '40.00', '60.00', '20.00', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00');
INSERT INTO `item_categories` VALUES ('16', '', '', '', 'Y', 'N', 'N', '0', 'Y', '0', '0', '0', '', '0.00', '0.00', '0.00', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- ----------------------------
-- Table structure for item_prices
-- ----------------------------
DROP TABLE IF EXISTS `item_prices`;
CREATE TABLE `item_prices` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `partner_id` int(11) NOT NULL,
  `branch_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `q_price` decimal(12,4) NOT NULL DEFAULT '0.0000',
  `disc_type` enum('Amount','Percent') COLLATE utf8_unicode_ci NOT NULL,
  `disc` decimal(11,2) NOT NULL DEFAULT '0.00',
  `cost` decimal(11,4) NOT NULL DEFAULT '0.0000',
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `status` enum('Active','Void','New') COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of item_prices
-- ----------------------------

-- ----------------------------
-- Table structure for item_subcategories
-- ----------------------------
DROP TABLE IF EXISTS `item_subcategories`;
CREATE TABLE `item_subcategories` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `parent` int(11) NOT NULL DEFAULT '0',
  `short` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `active` enum('Y','N') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Y',
  `for_printing` enum('Y','N') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'N',
  `for_lamination` enum('Y','N') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'N',
  `group` int(11) NOT NULL,
  `vatable` enum('Y','N') COLLATE utf8_unicode_ci NOT NULL,
  `sales_acct` int(11) NOT NULL DEFAULT '0',
  `usage_acct` int(11) NOT NULL DEFAULT '0',
  `inv_acct` int(11) NOT NULL DEFAULT '0',
  `over_cost` enum('Amount','Percent') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Amount',
  `std` decimal(12,2) NOT NULL,
  `max` decimal(12,2) NOT NULL,
  `min` decimal(12,2) NOT NULL,
  `_token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=132 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of item_subcategories
-- ----------------------------
INSERT INTO `item_subcategories` VALUES ('1', '2', '', 'Digital Video Recorders', '', 'Y', 'N', 'N', '0', 'Y', '0', '0', '0', '', '0.00', '0.00', '0.00', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00');
INSERT INTO `item_subcategories` VALUES ('2', '2', '', 'CCTV Cameras', '', 'Y', 'N', 'N', '0', 'Y', '0', '0', '0', '', '0.00', '0.00', '0.00', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00');
INSERT INTO `item_subcategories` VALUES ('3', '2', '', 'DVR Cards', '', 'Y', 'N', 'N', '0', 'Y', '0', '0', '0', '', '0.00', '0.00', '0.00', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00');
INSERT INTO `item_subcategories` VALUES ('4', '2', '', 'Network Video Recorders', '', 'Y', 'N', 'N', '0', 'Y', '0', '0', '0', '', '0.00', '0.00', '0.00', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00');
INSERT INTO `item_subcategories` VALUES ('5', '2', '', 'IP Cameras', '', 'Y', 'N', 'N', '0', 'Y', '0', '0', '0', '', '0.00', '0.00', '0.00', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00');
INSERT INTO `item_subcategories` VALUES ('6', '2', '', 'CCTV Accessories', '', 'Y', 'N', 'N', '0', 'Y', '0', '0', '0', '', '0.00', '0.00', '0.00', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00');
INSERT INTO `item_subcategories` VALUES ('7', '1', '', 'Casings', '', 'Y', 'N', 'N', '0', 'Y', '0', '0', '0', '', '0.00', '0.00', '0.00', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00');
INSERT INTO `item_subcategories` VALUES ('8', '1', '', 'Motherboards', '', 'Y', 'N', 'N', '0', 'Y', '0', '0', '0', '', '0.00', '0.00', '0.00', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00');
INSERT INTO `item_subcategories` VALUES ('9', '1', '', 'Processors', '', 'Y', 'N', 'N', '0', 'Y', '0', '0', '0', '', '0.00', '0.00', '0.00', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00');
INSERT INTO `item_subcategories` VALUES ('10', '1', '', 'Memory', '', 'Y', 'N', 'N', '0', 'Y', '0', '0', '0', '', '0.00', '0.00', '0.00', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00');
INSERT INTO `item_subcategories` VALUES ('11', '10', '', 'Casings', '', 'Y', 'N', 'N', '0', 'Y', '0', '0', '0', '', '0.00', '0.00', '0.00', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00');
INSERT INTO `item_subcategories` VALUES ('12', '10', '', 'Motherboards', '', 'Y', 'N', 'N', '0', 'Y', '0', '0', '0', '', '0.00', '0.00', '0.00', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00');
INSERT INTO `item_subcategories` VALUES ('13', '10', '', 'Processors', '', 'Y', 'N', 'N', '0', 'Y', '0', '0', '0', '', '0.00', '0.00', '0.00', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00');
INSERT INTO `item_subcategories` VALUES ('14', '10', '', 'Memory Modules', '', 'Y', 'N', 'N', '0', 'Y', '0', '0', '0', '', '0.00', '0.00', '0.00', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00');
INSERT INTO `item_subcategories` VALUES ('15', '10', '', 'Disk Drives', '', 'Y', 'N', 'N', '0', 'Y', '0', '0', '0', '', '0.00', '0.00', '0.00', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00');
INSERT INTO `item_subcategories` VALUES ('16', '10', '', 'Video Controllers', '', 'Y', 'N', 'N', '0', 'Y', '0', '0', '0', '', '0.00', '0.00', '0.00', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00');
INSERT INTO `item_subcategories` VALUES ('17', '10', '', 'Network Controllers', '', 'Y', 'N', 'N', '0', 'Y', '0', '0', '0', '', '0.00', '0.00', '0.00', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00');
INSERT INTO `item_subcategories` VALUES ('18', '10', '', 'Disk Controllers', '', 'Y', 'N', 'N', '0', 'Y', '0', '0', '0', '', '0.00', '0.00', '0.00', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00');
INSERT INTO `item_subcategories` VALUES ('19', '10', '', 'Cooling Devices', '', 'Y', 'N', 'N', '0', 'Y', '0', '0', '0', '', '0.00', '0.00', '0.00', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00');
INSERT INTO `item_subcategories` VALUES ('20', '10', '', 'Monitors', '', 'Y', 'N', 'N', '0', 'Y', '0', '0', '0', '', '0.00', '0.00', '0.00', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00');
INSERT INTO `item_subcategories` VALUES ('21', '10', '', 'Audio Devices', '', 'Y', 'N', 'N', '0', 'Y', '0', '0', '0', '', '0.00', '0.00', '0.00', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00');
INSERT INTO `item_subcategories` VALUES ('22', '10', '', 'Data and Power Cables', '', 'Y', 'N', 'N', '0', 'Y', '0', '0', '0', '', '0.00', '0.00', '0.00', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00');
INSERT INTO `item_subcategories` VALUES ('23', '7', '', 'Switches', '', 'Y', 'N', 'N', '0', 'Y', '0', '0', '0', '', '0.00', '0.00', '0.00', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00');
INSERT INTO `item_subcategories` VALUES ('24', '7', '', 'Routers', '', 'Y', 'N', 'N', '0', 'Y', '0', '0', '0', '', '0.00', '0.00', '0.00', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00');
INSERT INTO `item_subcategories` VALUES ('25', '7', '', 'Modems', '', 'Y', 'N', 'N', '0', 'Y', '0', '0', '0', '', '0.00', '0.00', '0.00', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00');
INSERT INTO `item_subcategories` VALUES ('26', '7', '', 'Network Accessories', '', 'Y', 'N', 'N', '0', 'Y', '0', '0', '0', '', '0.00', '0.00', '0.00', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00');
INSERT INTO `item_subcategories` VALUES ('27', '9', '', 'Computer Power Supply Units', '', 'Y', 'N', 'N', '0', 'Y', '0', '0', '0', '', '0.00', '0.00', '0.00', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00');
INSERT INTO `item_subcategories` VALUES ('28', '9', '', 'Camera Power Supply Units', '', 'Y', 'N', 'N', '0', 'Y', '0', '0', '0', '', '0.00', '0.00', '0.00', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00');
INSERT INTO `item_subcategories` VALUES ('29', '9', '', 'Uninterrupted Power Supplies', '', 'Y', 'N', 'N', '0', 'Y', '0', '0', '0', 'Percent', '10.00', '20.00', '8.00', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00');
INSERT INTO `item_subcategories` VALUES ('30', '9', '', 'Mobile Device Power Supply Units', '', 'Y', 'N', 'N', '0', 'Y', '0', '0', '0', '', '0.00', '0.00', '0.00', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00');
INSERT INTO `item_subcategories` VALUES ('31', '9', '', 'Generic Power Supply Units', '', 'Y', 'N', 'N', '0', 'Y', '0', '0', '0', '', '0.00', '0.00', '0.00', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00');
INSERT INTO `item_subcategories` VALUES ('32', '11', '', 'Coaxial Cables', '', 'Y', 'N', 'N', '0', 'Y', '0', '0', '0', '', '0.00', '0.00', '0.00', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00');
INSERT INTO `item_subcategories` VALUES ('33', '11', '', 'UTP Cables', '', 'Y', 'N', 'N', '0', 'Y', '0', '0', '0', '', '0.00', '0.00', '0.00', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00');
INSERT INTO `item_subcategories` VALUES ('34', '11', '', 'STP Cables', '', 'Y', 'N', 'N', '0', 'Y', '0', '0', '0', '', '0.00', '0.00', '0.00', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00');
INSERT INTO `item_subcategories` VALUES ('35', '11', '', 'Electrical Wires', '', 'Y', 'N', 'N', '0', 'Y', '0', '0', '0', '', '0.00', '0.00', '0.00', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00');
INSERT INTO `item_subcategories` VALUES ('36', '4', '', 'Automation Controllers', '', 'Y', 'N', 'N', '0', 'Y', '0', '0', '0', '', '0.00', '0.00', '0.00', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00');
INSERT INTO `item_subcategories` VALUES ('37', '4', '', 'Automation Devices', '', 'Y', 'N', 'N', '0', 'Y', '0', '0', '0', '', '0.00', '0.00', '0.00', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00');
INSERT INTO `item_subcategories` VALUES ('38', '6', '', 'Project Consumables', '', 'Y', 'N', 'N', '0', 'Y', '0', '0', '0', '', '0.00', '0.00', '0.00', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00');
INSERT INTO `item_subcategories` VALUES ('39', '6', '', 'Pipes and Conduits', '', 'Y', 'N', 'N', '0', 'Y', '0', '0', '0', '', '0.00', '0.00', '0.00', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00');
INSERT INTO `item_subcategories` VALUES ('40', '6', '', 'Plugs and Connectors', '', 'Y', 'N', 'N', '0', 'Y', '0', '0', '0', '', '0.00', '0.00', '0.00', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00');
INSERT INTO `item_subcategories` VALUES ('41', '12', '', 'Hand Tools', '', 'Y', 'N', 'N', '0', 'Y', '0', '0', '0', '', '0.00', '0.00', '0.00', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00');
INSERT INTO `item_subcategories` VALUES ('42', '12', '', 'Power Tools', '', 'Y', 'N', 'N', '0', 'Y', '0', '0', '0', '', '0.00', '0.00', '0.00', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00');
INSERT INTO `item_subcategories` VALUES ('43', '12', '', 'Specialized Tools', '', 'Y', 'N', 'N', '0', 'Y', '0', '0', '0', '', '0.00', '0.00', '0.00', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00');
INSERT INTO `item_subcategories` VALUES ('44', '10', '', 'Laptops and Notebooks', '', 'Y', 'N', 'N', '0', 'Y', '0', '0', '0', '', '0.00', '0.00', '0.00', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00');
INSERT INTO `item_subcategories` VALUES ('45', '10', '', 'All-in-One PCs', '', 'Y', 'N', 'N', '0', 'Y', '0', '0', '0', '', '0.00', '0.00', '0.00', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00');
INSERT INTO `item_subcategories` VALUES ('46', '10', '', 'Embedded Systems', '', 'Y', 'N', 'N', '0', 'Y', '0', '0', '0', '', '0.00', '0.00', '0.00', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00');
INSERT INTO `item_subcategories` VALUES ('47', '7', '', 'Network Storage Devices', '', 'Y', 'N', 'N', '0', 'Y', '0', '0', '0', '', '0.00', '0.00', '0.00', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00');
INSERT INTO `item_subcategories` VALUES ('48', '10', '', 'Input and Output Devices', '', 'Y', 'N', 'N', '0', 'Y', '0', '0', '0', '', '0.00', '0.00', '0.00', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00');
INSERT INTO `item_subcategories` VALUES ('49', '10', '', 'Output Devices', '', 'N', 'N', 'N', '0', 'Y', '0', '0', '0', '', '0.00', '0.00', '0.00', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00');
INSERT INTO `item_subcategories` VALUES ('50', '5', '', 'Licenses', '', 'Y', 'N', 'N', '0', 'Y', '0', '0', '0', '', '0.00', '0.00', '0.00', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00');
INSERT INTO `item_subcategories` VALUES ('51', '5', '', 'Business Systems', '', 'Y', 'N', 'N', '0', 'Y', '0', '0', '0', 'Percent', '20.00', '30.00', '10.00', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00');
INSERT INTO `item_subcategories` VALUES ('52', '3', '', 'POS Devices', '', 'Y', 'N', 'N', '0', 'Y', '0', '0', '0', '', '0.00', '0.00', '0.00', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00');
INSERT INTO `item_subcategories` VALUES ('53', '3', '', 'POS Machines', '', 'Y', 'N', 'N', '0', 'Y', '0', '0', '0', '', '0.00', '0.00', '0.00', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00');
INSERT INTO `item_subcategories` VALUES ('54', '8', '', 'Computer Repairs', '', 'Y', 'N', 'N', '0', 'Y', '0', '0', '0', '', '0.00', '0.00', '0.00', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00');
INSERT INTO `item_subcategories` VALUES ('55', '8', '', 'CCTV Installations', '', 'Y', 'N', 'N', '0', 'Y', '0', '0', '0', '', '0.00', '0.00', '0.00', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00');
INSERT INTO `item_subcategories` VALUES ('56', '2', '', 'Access Control Devices', '', 'Y', 'N', 'N', '0', 'Y', '0', '0', '0', '', '0.00', '0.00', '0.00', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00');
INSERT INTO `item_subcategories` VALUES ('57', '9', '', 'Automatic Voltage Regulators', '', 'Y', 'N', 'N', '0', 'Y', '0', '0', '0', '', '0.00', '0.00', '0.00', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00');
INSERT INTO `item_subcategories` VALUES ('58', '9', '', 'Power Supply Accessories', '', 'Y', 'N', 'N', '0', 'Y', '0', '0', '0', '', '0.00', '0.00', '0.00', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00');
INSERT INTO `item_subcategories` VALUES ('59', '13', '', 'Papers', '', 'Y', 'N', 'N', '0', 'Y', '0', '0', '0', '', '0.00', '0.00', '0.00', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00');
INSERT INTO `item_subcategories` VALUES ('60', '13', '', 'Inks and Toners', '', 'Y', 'N', 'N', '0', 'Y', '0', '0', '0', '', '0.00', '0.00', '0.00', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00');
INSERT INTO `item_subcategories` VALUES ('61', '13', '', 'Blank Media', '', 'Y', 'N', 'N', '0', 'Y', '0', '0', '0', '', '0.00', '0.00', '0.00', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00');
INSERT INTO `item_subcategories` VALUES ('62', '13', '', 'Office Furnitures', '', 'Y', 'N', 'N', '0', 'Y', '50', '17', '8', '', '0.00', '0.00', '0.00', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00');
INSERT INTO `item_subcategories` VALUES ('63', '7', '', 'IP Telephony', '', 'Y', 'N', 'N', '0', 'Y', '0', '0', '0', '', '0.00', '0.00', '0.00', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00');
INSERT INTO `item_subcategories` VALUES ('64', '8', '', 'Network Installations', '', 'Y', 'N', 'N', '0', 'Y', '0', '0', '0', '', '0.00', '0.00', '0.00', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00');
INSERT INTO `item_subcategories` VALUES ('65', '14', '', 'Safety Shoes', '', 'Y', 'N', 'N', '0', 'Y', '0', '0', '0', 'Percent', '25.00', '40.00', '20.00', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00');
INSERT INTO `item_subcategories` VALUES ('66', '0', '', '', '', 'Y', 'N', 'N', '0', 'Y', '0', '0', '0', '', '0.00', '0.00', '0.00', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- ----------------------------
-- Table structure for migrations
-- ----------------------------
DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of migrations
-- ----------------------------
INSERT INTO `migrations` VALUES ('2015_07_29_112550_partners_table', '1');
INSERT INTO `migrations` VALUES ('2015_07_29_112621_partner_branches', '1');
INSERT INTO `migrations` VALUES ('2015_07_29_112636_partner_contacts', '1');
INSERT INTO `migrations` VALUES ('2015_07_30_102809_item_subcategories', '1');
INSERT INTO `migrations` VALUES ('2015_07_30_104221_item_categories', '1');
INSERT INTO `migrations` VALUES ('2015_07_30_105102_items', '1');
INSERT INTO `migrations` VALUES ('2015_08_07_162400_citizenships', '1');
INSERT INTO `migrations` VALUES ('2015_08_07_162422_entities', '1');
INSERT INTO `migrations` VALUES ('2015_08_07_162445_countries', '1');
INSERT INTO `migrations` VALUES ('2015_08_07_162506_uoms', '1');
INSERT INTO `migrations` VALUES ('2015_08_10_093426_item_prices', '2');
INSERT INTO `migrations` VALUES ('2015_08_10_094930_purchases', '2');
INSERT INTO `migrations` VALUES ('2015_08_10_095044_purchase_details', '2');
INSERT INTO `migrations` VALUES ('2015_08_10_101748_receive_details', '2');
INSERT INTO `migrations` VALUES ('2015_08_10_102042_receive_header', '2');
INSERT INTO `migrations` VALUES ('2015_08_10_102148_receive_serials', '2');
INSERT INTO `migrations` VALUES ('2015_08_10_102243_references', '2');
INSERT INTO `migrations` VALUES ('2015_08_10_102748_movements', '2');
INSERT INTO `migrations` VALUES ('2015_08_10_102831_dr_batch', '2');
INSERT INTO `migrations` VALUES ('2015_08_10_102908_dr_details', '2');
INSERT INTO `migrations` VALUES ('2015_08_10_102939_dr_header', '2');
INSERT INTO `migrations` VALUES ('2015_08_10_103005_dr_serials', '2');

-- ----------------------------
-- Table structure for movements
-- ----------------------------
DROP TABLE IF EXISTS `movements`;
CREATE TABLE `movements` (
  `movement_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `client` int(11) NOT NULL,
  `module_id` int(11) NOT NULL,
  `doc_type` int(11) NOT NULL,
  `doc_no` int(11) NOT NULL,
  `d0c_dtl` int(11) NOT NULL,
  `date` date NOT NULL,
  `type` enum('in','out') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'out',
  `location` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `partner_id` int(11) NOT NULL,
  `unit_id` int(11) NOT NULL,
  `qty` decimal(20,4) NOT NULL DEFAULT '0.0000',
  `moved_by` int(11) NOT NULL,
  `unpacked` enum('Y','N') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'N',
  `remarks` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `old_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`movement_id`,`module_id`,`doc_type`,`doc_no`,`d0c_dtl`,`location`,`item_id`,`partner_id`,`unit_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of movements
-- ----------------------------

-- ----------------------------
-- Table structure for partners
-- ----------------------------
DROP TABLE IF EXISTS `partners`;
CREATE TABLE `partners` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` enum('New','Active','Archived') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Active',
  `customer` enum('No','Yes') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'No',
  `supplier` enum('No','Yes') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'No',
  `employee` enum('No','Yes') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'No',
  `address` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `home` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `street` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `barangay` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `city` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `province` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `country` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `mobile_countrycode` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `mobile_areacode` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `mobile_lineno` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `tel_countrycode` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `tel_areacode` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `tel_lineno` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `fax_countrycode` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `fax_areacode` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `fax_lineno` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `business_entity` enum('Individual','Sole Proprietorship','Partnership','Corporation') COLLATE utf8_unicode_ci NOT NULL,
  `tin` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `reg_no` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `reg_date` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `birthday` date NOT NULL,
  `_token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of partners
-- ----------------------------
INSERT INTO `partners` VALUES ('1', 'Wil Fred N. Armecin', 'Active', '', '', 'Yes', ',,,,,', '', '', '', '', '', '', '', '', '', '', '', '', '', 'Wil Fred N. Armecin', '', '', 'Individual', '', '', '', '1995-01-11', '8yRkqUUptp5gR3GKfVUJ15eOSlJ8JpTlI2iodAJx', '0000-00-00 00:00:00', '0000-00-00 00:00:00');
INSERT INTO `partners` VALUES ('2', 'Michael Esmero', 'Active', '', '', 'Yes', ',,,,,', '', '', '', '', '', '', '', '', '', '', '', '', '', 'Michael Esmero', '', '', 'Individual', '', '', '', '0000-00-00', '8yRkqUUptp5gR3GKfVUJ15eOSlJ8JpTlI2iodAJx', '0000-00-00 00:00:00', '0000-00-00 00:00:00');
INSERT INTO `partners` VALUES ('3', 'Kerwin Bonn', 'Active', '', '', 'Yes', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'Kerwin Bonn', '', '', 'Individual', '', '', '', '0000-00-00', 'o8g0ryq2Ny7jnSKrfPCPSa1xAjbUnJAUIe3jg7E3', '0000-00-00 00:00:00', '2015-08-07 05:34:16');
INSERT INTO `partners` VALUES ('4', 'WilsFred N. Armecin', 'Archived', '', 'Yes', 'Yes', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'Individual', '', '', '', '0000-00-00', 'o8g0ryq2Ny7jnSKrfPCPSa1xAjbUnJAUIe3jg7E3', '0000-00-00 00:00:00', '2015-08-07 05:54:48');
INSERT INTO `partners` VALUES ('5', 'Kerwin Bonns', 'Active', '', '', 'Yes', ',,,,,Philippines', '', '', '', '', '', 'Philippines', '', '', '', '', '', '', '', '', '', '', 'Individual', '', '', '', '0000-00-00', 'JMW41RuOg7fq3RGLArPEsqqrAG1ix4IsEPIUQ2i4', '0000-00-00 00:00:00', '0000-00-00 00:00:00');
INSERT INTO `partners` VALUES ('6', 'Michael Esmeross', 'Active', '', '', 'Yes', ',,,,,Philippines', '', '', '', '', '', 'Philippines', '', '', '', '', '', '', '', '', '', '', 'Individual', '', '', '', '0000-00-00', 'JMW41RuOg7fq3RGLArPEsqqrAG1ix4IsEPIUQ2i4', '0000-00-00 00:00:00', '0000-00-00 00:00:00');
INSERT INTO `partners` VALUES ('7', 'Dexter Ryan S. Mancao', 'Active', 'Yes', 'Yes', 'Yes', 'Unit 508, MHT Building,Plaridel Street,Cambaro,Mandaue City,Cebu,Philippines', 'Unit 508, MHT Building', 'Plaridel Street', 'Cambaro', 'Mandaue City', 'Cebu', 'Philippines', '63', '917', '3203800', '', '', '', '', '', '', 'dexter@mto.com.ph', 'Individual', '', '', '', '1980-12-04', 'vOxUeWWt2hMk84a3Fa76o6WVne8a8KnjKuXbITnm', '0000-00-00 00:00:00', '0000-00-00 00:00:00');
INSERT INTO `partners` VALUES ('8', 'Daisy Sue Kimberly G. Mancao', 'Active', 'Yes', 'Yes', 'Yes', 'Unit 508, MHT Building,Plaridel Street,Cambaro,Mandaue City,Cebu,Philippines', 'Unit 508, MHT Building', 'Plaridel Street', 'Cambaro', 'Mandaue City', 'Cebu', 'Philippines', '63', '917', '3253800', '63', '32', '3187505', '', '', '', 'daisysuekimberly@yahoo.com', 'Individual', '', '', '', '1985-12-05', 'o8g0ryq2Ny7jnSKrfPCPSa1xAjbUnJAUIe3jg7E3', '0000-00-00 00:00:00', '0000-00-00 00:00:00');
INSERT INTO `partners` VALUES ('9', 'Ivan Sanchez', 'Active', 'Yes', 'No', 'Yes', ',Zamora Abanil,Pinggol,Ozamiz City,Misamis Occidental,Philippines', '', 'Zamora Abanil', 'Pinggol', 'Ozamiz City', 'Misamis Occidental', 'Philippines', '', '', '', '', '', '', '', '', '', 'jason.yap@lsu.edu.ph', 'Corporation', '', '', '', '0000-00-00', 'uSYt6yCTTDdZHIScA35yiwXyqqgQdgcVWl3wN2Sn', '0000-00-00 00:00:00', '2015-08-10 13:00:33');
INSERT INTO `partners` VALUES ('10', 'Bobby Lesdama', 'Active', 'Yes', 'No', 'No', 'asd,asd,asd,asd,ad,Albania', 'asd', 'asd', 'asd', 'asd', 'ad', 'Albania', '', '', '', '', '', '', '', '', '', '', 'Individual', '', '', '', '2015-08-19', 'uSYt6yCTTDdZHIScA35yiwXyqqgQdgcVWl3wN2Sn', '0000-00-00 00:00:00', '2015-08-10 13:29:34');

-- ----------------------------
-- Table structure for partnertitles
-- ----------------------------
DROP TABLE IF EXISTS `partnertitles`;
CREATE TABLE `partnertitles` (
  `id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `active` enum('Yes','No') DEFAULT NULL
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of partnertitles
-- ----------------------------
INSERT INTO `partnertitles` VALUES ('1', 'Mr.', 'Yes');
INSERT INTO `partnertitles` VALUES ('2', 'Mrs.', 'Yes');
INSERT INTO `partnertitles` VALUES ('3', 'Ms.', 'Yes');
INSERT INTO `partnertitles` VALUES ('4', 'Atty.', 'Yes');
INSERT INTO `partnertitles` VALUES ('5', 'Dr.', 'Yes');

-- ----------------------------
-- Table structure for partner_branches
-- ----------------------------
DROP TABLE IF EXISTS `partner_branches`;
CREATE TABLE `partner_branches` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `partner_id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` enum('New','Active','Archived') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Active',
  `home` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `street` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `barangay` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `city` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `province` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `country` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `mobile_countrycode` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `mobile_areacode` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `mobile_lineno` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `tel_countrycode` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `tel_areacode` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `tel_lineno` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `fax_countrycode` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `fax_areacode` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `fax_lineno` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `_token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of partner_branches
-- ----------------------------
INSERT INTO `partner_branches` VALUES ('1', '2', 'Michael Esmero', 'Tipolo Branch', ',,,,,', 'Active', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'MfZXkXwp9fibNfI4XvHH4ycUKtFJ53xehMDhoxN8', '0000-00-00 00:00:00', '0000-00-00 00:00:00');
INSERT INTO `partner_branches` VALUES ('2', '2', 'Michael Esmero', 'Tipolo Branch', ',,,,,', 'Active', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'MfZXkXwp9fibNfI4XvHH4ycUKtFJ53xehMDhoxN8', '0000-00-00 00:00:00', '0000-00-00 00:00:00');
INSERT INTO `partner_branches` VALUES ('3', '2', 'Michael Esmero', 'Tipolo Branch', ',,,,,', 'Active', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'MfZXkXwp9fibNfI4XvHH4ycUKtFJ53xehMDhoxN8', '0000-00-00 00:00:00', '0000-00-00 00:00:00');
INSERT INTO `partner_branches` VALUES ('4', '3', 'Michael Esmero', 'Ayala Branch', ',,,,,', 'Active', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'FDp7oyum9hhX1yrVyO5kdt78Ig1pIn8VbWiFmOxT', '0000-00-00 00:00:00', '0000-00-00 00:00:00');
INSERT INTO `partner_branches` VALUES ('5', '5', 'Michael Esmero', 'Ayala Branch', ',,,,,', 'Active', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'OgT9xwwlQUdmMDiu49FhjThIDdL9DO0Gx5hmumDB', '0000-00-00 00:00:00', '0000-00-00 00:00:00');
INSERT INTO `partner_branches` VALUES ('6', '5', 'Michael Esmero', 'Tipolo Branch', ',,,,,', 'Active', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'OgT9xwwlQUdmMDiu49FhjThIDdL9DO0Gx5hmumDB', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- ----------------------------
-- Table structure for partner_contacts
-- ----------------------------
DROP TABLE IF EXISTS `partner_contacts`;
CREATE TABLE `partner_contacts` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `partner_id` int(11) NOT NULL,
  `status` enum('New','Active','Archived') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Active',
  `title` int(11) NOT NULL,
  `manager` enum('Yes','No') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'No',
  `supervisor` enum('Yes','No') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'No',
  `contact_person` enum('Yes','No') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'No',
  `last_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `first_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `middle_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `position` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `branch` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `home` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `street` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `barangay` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `city` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `province` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `country` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `citizenship` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `gender` enum('Female','Male') COLLATE utf8_unicode_ci NOT NULL,
  `marital_status` enum('Single','Marrried','Separated','Widow') COLLATE utf8_unicode_ci NOT NULL,
  `active` enum('Yes','No') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Yes',
  `birthday` date NOT NULL,
  `mobile_countrycode` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `mobile_areacode` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `mobile_lineno` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `tel_countrycode` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `tel_areacode` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `tel_lineno` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `fax_countrycode` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `fax_areacode` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `fax_lineno` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `_token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of partner_contacts
-- ----------------------------
INSERT INTO `partner_contacts` VALUES ('1', '2', '', '0', '', '', '', 'Armecin', 'Wil Fred', 'N.', '', '', ',,,,,', '', '', '', '', '', '', '', '', '', '', '0000-00-00', '', '', '', '', '', '', '', '', '', '', 'sL4RQl3JIehVMm1O0eb6LWkBKaGnUyGqNfvKKBOp', '0000-00-00 00:00:00', '0000-00-00 00:00:00');
INSERT INTO `partner_contacts` VALUES ('2', '2', '', '0', '', '', '', 'Armecin', 'Wil Fred', 'N.', '', '', ',,,,,', '', '', '', '', '', '', '', '', '', '', '0000-00-00', '', '', '', '', '', '', '', '', '', '', 'sL4RQl3JIehVMm1O0eb6LWkBKaGnUyGqNfvKKBOp', '0000-00-00 00:00:00', '0000-00-00 00:00:00');
INSERT INTO `partner_contacts` VALUES ('3', '2', '', '0', '', '', '', 'Armecin', 'Wil Fred', 'N.', '', '', ',,,,,', '', '', '', '', '', '', '', '', '', '', '0000-00-00', '', '', '', '', '', '', '', '', '', '', 'sL4RQl3JIehVMm1O0eb6LWkBKaGnUyGqNfvKKBOp', '0000-00-00 00:00:00', '0000-00-00 00:00:00');
INSERT INTO `partner_contacts` VALUES ('4', '2', '', '0', '', '', '', 'Armecin', 'Wil Fred', 'N.', '', '', ',,,,,', '', '', '', '', '', '', '', '', '', '', '0000-00-00', '', '', '', '', '', '', '', '', '', '', 'sL4RQl3JIehVMm1O0eb6LWkBKaGnUyGqNfvKKBOp', '0000-00-00 00:00:00', '0000-00-00 00:00:00');
INSERT INTO `partner_contacts` VALUES ('5', '2', '', '0', '', '', '', 'Armecin', 'Wil Fred', 'N.', '', '', ',,,,,', '', '', '', '', '', '', '', '', '', '', '0000-00-00', '', '', '', '', '', '', '', '', '', '', 'sL4RQl3JIehVMm1O0eb6LWkBKaGnUyGqNfvKKBOp', '0000-00-00 00:00:00', '0000-00-00 00:00:00');
INSERT INTO `partner_contacts` VALUES ('6', '1', 'Active', '0', '', '', '', 'Armecin', 'Wil Fred', 'N.', '', '', ',,,,,', '', '', '', '', '', '', '', '', '', 'Yes', '0000-00-00', '', '', '', '', '', '', '', '', '', '', 'FDp7oyum9hhX1yrVyO5kdt78Ig1pIn8VbWiFmOxT', '0000-00-00 00:00:00', '0000-00-00 00:00:00');
INSERT INTO `partner_contacts` VALUES ('7', '1', 'Active', '0', '', '', '', 'Armecin', 'Wil Fred', 'N.', '', '', ',,,,,', '', '', '', '', '', '', '', '', '', 'Yes', '0000-00-00', '', '', '', '', '', '', '', '', '', '', 'FDp7oyum9hhX1yrVyO5kdt78Ig1pIn8VbWiFmOxT', '0000-00-00 00:00:00', '0000-00-00 00:00:00');
INSERT INTO `partner_contacts` VALUES ('8', '3', 'Active', '0', '', '', '', 'Armecin', 'Wil Fred', 'N.', '', '', ',,,,,', '', '', '', '', '', '', '', '', '', 'Yes', '0000-00-00', '', '', '', '', '', '', '', '', '', '', 'FDp7oyum9hhX1yrVyO5kdt78Ig1pIn8VbWiFmOxT', '0000-00-00 00:00:00', '0000-00-00 00:00:00');
INSERT INTO `partner_contacts` VALUES ('9', '3', 'Active', '0', '', '', '', 'Armecin', 'Wil Fred', 'N.', '', '', ',,,,,', '', '', '', '', '', '', '', '', '', 'Yes', '0000-00-00', '', '', '', '', '', '', '', '', '', '', 'FDp7oyum9hhX1yrVyO5kdt78Ig1pIn8VbWiFmOxT', '0000-00-00 00:00:00', '0000-00-00 00:00:00');
INSERT INTO `partner_contacts` VALUES ('10', '3', 'Active', '0', '', '', '', 'Armecin', 'Wil Fred', 'N.', '', '', ',,,,,', '', '', '', '', '', '', '', '', '', 'Yes', '0000-00-00', '', '', '', '', '', '', '', '', '', '', 'FDp7oyum9hhX1yrVyO5kdt78Ig1pIn8VbWiFmOxT', '0000-00-00 00:00:00', '0000-00-00 00:00:00');
INSERT INTO `partner_contacts` VALUES ('11', '3', 'Active', '0', '', '', '', 'Armecin', 'Wil Fred', 'N.', '', '', ',,,,,', '', '', '', '', '', '', '', '', '', 'Yes', '0000-00-00', '', '', '', '', '', '', '', '', '', '', 'FDp7oyum9hhX1yrVyO5kdt78Ig1pIn8VbWiFmOxT', '0000-00-00 00:00:00', '0000-00-00 00:00:00');
INSERT INTO `partner_contacts` VALUES ('12', '5', 'Active', '0', '', '', '', 'Armecin', 'Wil Fred', 'N.', '', '', ',,,,,', '', '', '', '', '', '', '', '', '', 'Yes', '0000-00-00', '', '', '', '', '', '', '', '', '', '', 'OgT9xwwlQUdmMDiu49FhjThIDdL9DO0Gx5hmumDB', '0000-00-00 00:00:00', '0000-00-00 00:00:00');
INSERT INTO `partner_contacts` VALUES ('13', '5', 'Active', '0', '', '', '', 'Armecin', 'Wil Fred', 'N.', '', '', ',,,,,', '', '', '', '', '', '', '', '', '', 'Yes', '0000-00-00', '', '', '', '', '', '', '', '', '', '', 'OgT9xwwlQUdmMDiu49FhjThIDdL9DO0Gx5hmumDB', '0000-00-00 00:00:00', '0000-00-00 00:00:00');
INSERT INTO `partner_contacts` VALUES ('14', '5', 'Active', '0', '', '', '', 'Armecin', 'Wil Fred', 'N.', '', '', ',,,,,', '', '', '', '', '', '', '', '', '', 'Yes', '0000-00-00', '', '', '', '', '', '', '', '', '', '', 'OgT9xwwlQUdmMDiu49FhjThIDdL9DO0Gx5hmumDB', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- ----------------------------
-- Table structure for purchases
-- ----------------------------
DROP TABLE IF EXISTS `purchases`;
CREATE TABLE `purchases` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `po_no` int(11) NOT NULL,
  `delivery_date` date NOT NULL,
  `partner_id` int(11) NOT NULL,
  `remarks` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `item_id` int(11) NOT NULL,
  `uom` int(11) NOT NULL,
  `qty` decimal(20,4) NOT NULL DEFAULT '0.0000',
  `qoh` decimal(12,4) NOT NULL DEFAULT '0.0000',
  `unit` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `price` decimal(20,4) NOT NULL DEFAULT '0.0000',
  `total_amt` decimal(20,4) NOT NULL DEFAULT '0.0000',
  `oitem_cost` decimal(20,4) NOT NULL DEFAULT '0.0000',
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of purchases
-- ----------------------------

-- ----------------------------
-- Table structure for purchase_details
-- ----------------------------
DROP TABLE IF EXISTS `purchase_details`;
CREATE TABLE `purchase_details` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `po_no` int(11) NOT NULL,
  `delivery_date` date NOT NULL,
  `partner_id` int(11) NOT NULL,
  `remarks` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `item_id` int(11) NOT NULL,
  `uom` int(11) NOT NULL,
  `qty` decimal(20,4) NOT NULL DEFAULT '0.0000',
  `eqty` decimal(12,2) NOT NULL DEFAULT '0.00',
  `qoh` decimal(12,4) NOT NULL DEFAULT '0.0000',
  `unit` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `price` decimal(20,4) NOT NULL DEFAULT '0.0000',
  `q_price` decimal(20,4) NOT NULL DEFAULT '0.0000',
  `total_amt` decimal(20,4) NOT NULL DEFAULT '0.0000',
  `oitem_cost` decimal(20,4) NOT NULL DEFAULT '0.0000',
  `po_dtl_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of purchase_details
-- ----------------------------

-- ----------------------------
-- Table structure for receive_details
-- ----------------------------
DROP TABLE IF EXISTS `receive_details`;
CREATE TABLE `receive_details` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of receive_details
-- ----------------------------

-- ----------------------------
-- Table structure for receive_header
-- ----------------------------
DROP TABLE IF EXISTS `receive_header`;
CREATE TABLE `receive_header` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of receive_header
-- ----------------------------

-- ----------------------------
-- Table structure for receive_serials
-- ----------------------------
DROP TABLE IF EXISTS `receive_serials`;
CREATE TABLE `receive_serials` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of receive_serials
-- ----------------------------

-- ----------------------------
-- Table structure for references
-- ----------------------------
DROP TABLE IF EXISTS `references`;
CREATE TABLE `references` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of references
-- ----------------------------

-- ----------------------------
-- Table structure for uoms
-- ----------------------------
DROP TABLE IF EXISTS `uoms`;
CREATE TABLE `uoms` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `short` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `plural_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `active` enum('Y','N') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Y',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=50 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of uoms
-- ----------------------------
INSERT INTO `uoms` VALUES ('37', 'pc', 'piece', 'pieces', '', 'Y');
INSERT INTO `uoms` VALUES ('39', 'length', 'length', 'lengths', '', 'Y');
INSERT INTO `uoms` VALUES ('40', 'meter', 'meter', 'meters', '', 'Y');
INSERT INTO `uoms` VALUES ('41', 'roll', 'roll', 'rolls', '', 'Y');
INSERT INTO `uoms` VALUES ('42', 'box', 'box', 'boxes', '', 'Y');
INSERT INTO `uoms` VALUES ('43', 'set', 'set', 'sets', '', 'Y');
INSERT INTO `uoms` VALUES ('44', 'kg', 'kilogram', 'kilograms', '', 'Y');
INSERT INTO `uoms` VALUES ('45', 'liter', 'liter', 'liters', '', 'Y');
INSERT INTO `uoms` VALUES ('46', 'lot', 'lot', 'lots', '', 'Y');
INSERT INTO `uoms` VALUES ('47', 'man hour', 'man hour', 'man hours', '', 'Y');
INSERT INTO `uoms` VALUES ('48', 'kwh', 'kilowatt-hour', 'kilowatt-hours', '', 'Y');
INSERT INTO `uoms` VALUES ('49', 'ml', 'milliliter', 'milliliters', '', 'Y');
