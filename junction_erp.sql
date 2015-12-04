-- phpMyAdmin SQL Dump
-- version 4.4.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 07, 2015 at 08:06 AM
-- Server version: 5.6.26
-- PHP Version: 5.6.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hr`
--

-- --------------------------------------------------------

--
-- Table structure for table `cities`
--

CREATE TABLE IF NOT EXISTS `cities` (
  `id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `state_id` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=47577 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cities`
--

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

CREATE TABLE IF NOT EXISTS `countries` (
  `id` int(11) NOT NULL,
  `sortname` varchar(3) NOT NULL,
  `name` varchar(150) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=247 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `countries`
--

INSERT INTO `countries` (`id`, `sortname`, `name`) VALUES
(1, 'AF', 'Afghanistan'),
(2, 'AL', 'Albania'),
(3, 'DZ', 'Algeria'),
(4, 'AS', 'American Samoa'),
(5, 'AD', 'Andorra'),
(6, 'AO', 'Angola'),
(7, 'AI', 'Anguilla'),
(8, 'AQ', 'Antarctica'),
(9, 'AG', 'Antigua And Barbuda'),
(10, 'AR', 'Argentina'),
(11, 'AM', 'Armenia'),
(12, 'AW', 'Aruba'),
(13, 'AU', 'Australia'),
(14, 'AT', 'Austria'),
(15, 'AZ', 'Azerbaijan'),
(16, 'BS', 'Bahamas The'),
(17, 'BH', 'Bahrain'),
(18, 'BD', 'Bangladesh'),
(19, 'BB', 'Barbados'),
(20, 'BY', 'Belarus'),
(21, 'BE', 'Belgium'),
(22, 'BZ', 'Belize'),
(23, 'BJ', 'Benin'),
(24, 'BM', 'Bermuda'),
(25, 'BT', 'Bhutan'),
(26, 'BO', 'Bolivia'),
(27, 'BA', 'Bosnia and Herzegovina'),
(28, 'BW', 'Botswana'),
(29, 'BV', 'Bouvet Island'),
(30, 'BR', 'Brazil'),
(31, 'IO', 'British Indian Ocean Territory'),
(32, 'BN', 'Brunei'),
(33, 'BG', 'Bulgaria'),
(34, 'BF', 'Burkina Faso'),
(35, 'BI', 'Burundi'),
(36, 'KH', 'Cambodia'),
(37, 'CM', 'Cameroon'),
(38, 'CA', 'Canada'),
(39, 'CV', 'Cape Verde'),
(40, 'KY', 'Cayman Islands'),
(41, 'CF', 'Central African Republic'),
(42, 'TD', 'Chad'),
(43, 'CL', 'Chile'),
(44, 'CN', 'China'),
(45, 'CX', 'Christmas Island'),
(46, 'CC', 'Cocos (Keeling) Islands'),
(47, 'CO', 'Colombia'),
(48, 'KM', 'Comoros'),
(49, 'CG', 'Congo'),
(50, 'CD', 'Congo The Democratic Republic Of The'),
(51, 'CK', 'Cook Islands'),
(52, 'CR', 'Costa Rica'),
(53, 'CI', 'Cote D''Ivoire (Ivory Coast)'),
(54, 'HR', 'Croatia (Hrvatska)'),
(55, 'CU', 'Cuba'),
(56, 'CY', 'Cyprus'),
(57, 'CZ', 'Czech Republic'),
(58, 'DK', 'Denmark'),
(59, 'DJ', 'Djibouti'),
(60, 'DM', 'Dominica'),
(61, 'DO', 'Dominican Republic'),
(62, 'TP', 'East Timor'),
(63, 'EC', 'Ecuador'),
(64, 'EG', 'Egypt'),
(65, 'SV', 'El Salvador'),
(66, 'GQ', 'Equatorial Guinea'),
(67, 'ER', 'Eritrea'),
(68, 'EE', 'Estonia'),
(69, 'ET', 'Ethiopia'),
(70, 'XA', 'External Territories of Australia'),
(71, 'FK', 'Falkland Islands'),
(72, 'FO', 'Faroe Islands'),
(73, 'FJ', 'Fiji Islands'),
(74, 'FI', 'Finland'),
(75, 'FR', 'France'),
(76, 'GF', 'French Guiana'),
(77, 'PF', 'French Polynesia'),
(78, 'TF', 'French Southern Territories'),
(79, 'GA', 'Gabon'),
(80, 'GM', 'Gambia The'),
(81, 'GE', 'Georgia'),
(82, 'DE', 'Germany'),
(83, 'GH', 'Ghana'),
(84, 'GI', 'Gibraltar'),
(85, 'GR', 'Greece'),
(86, 'GL', 'Greenland'),
(87, 'GD', 'Grenada'),
(88, 'GP', 'Guadeloupe'),
(89, 'GU', 'Guam'),
(90, 'GT', 'Guatemala'),
(91, 'XU', 'Guernsey and Alderney'),
(92, 'GN', 'Guinea'),
(93, 'GW', 'Guinea-Bissau'),
(94, 'GY', 'Guyana'),
(95, 'HT', 'Haiti'),
(96, 'HM', 'Heard and McDonald Islands'),
(97, 'HN', 'Honduras'),
(98, 'HK', 'Hong Kong S.A.R.'),
(99, 'HU', 'Hungary'),
(100, 'IS', 'Iceland'),
(101, 'IN', 'India'),
(102, 'ID', 'Indonesia'),
(103, 'IR', 'Iran'),
(104, 'IQ', 'Iraq'),
(105, 'IE', 'Ireland'),
(106, 'IL', 'Israel'),
(107, 'IT', 'Italy'),
(108, 'JM', 'Jamaica'),
(109, 'JP', 'Japan'),
(110, 'XJ', 'Jersey'),
(111, 'JO', 'Jordan'),
(112, 'KZ', 'Kazakhstan'),
(113, 'KE', 'Kenya'),
(114, 'KI', 'Kiribati'),
(115, 'KP', 'Korea North'),
(116, 'KR', 'Korea South'),
(117, 'KW', 'Kuwait'),
(118, 'KG', 'Kyrgyzstan'),
(119, 'LA', 'Laos'),
(120, 'LV', 'Latvia'),
(121, 'LB', 'Lebanon'),
(122, 'LS', 'Lesotho'),
(123, 'LR', 'Liberia'),
(124, 'LY', 'Libya'),
(125, 'LI', 'Liechtenstein'),
(126, 'LT', 'Lithuania'),
(127, 'LU', 'Luxembourg'),
(128, 'MO', 'Macau S.A.R.'),
(129, 'MK', 'Macedonia'),
(130, 'MG', 'Madagascar'),
(131, 'MW', 'Malawi'),
(132, 'MY', 'Malaysia'),
(133, 'MV', 'Maldives'),
(134, 'ML', 'Mali'),
(135, 'MT', 'Malta'),
(136, 'XM', 'Man (Isle of)'),
(137, 'MH', 'Marshall Islands'),
(138, 'MQ', 'Martinique'),
(139, 'MR', 'Mauritania'),
(140, 'MU', 'Mauritius'),
(141, 'YT', 'Mayotte'),
(142, 'MX', 'Mexico'),
(143, 'FM', 'Micronesia'),
(144, 'MD', 'Moldova'),
(145, 'MC', 'Monaco'),
(146, 'MN', 'Mongolia'),
(147, 'MS', 'Montserrat'),
(148, 'MA', 'Morocco'),
(149, 'MZ', 'Mozambique'),
(150, 'MM', 'Myanmar'),
(151, 'NA', 'Namibia'),
(152, 'NR', 'Nauru'),
(153, 'NP', 'Nepal'),
(154, 'AN', 'Netherlands Antilles'),
(155, 'NL', 'Netherlands The'),
(156, 'NC', 'New Caledonia'),
(157, 'NZ', 'New Zealand'),
(158, 'NI', 'Nicaragua'),
(159, 'NE', 'Niger'),
(160, 'NG', 'Nigeria'),
(161, 'NU', 'Niue'),
(162, 'NF', 'Norfolk Island'),
(163, 'MP', 'Northern Mariana Islands'),
(164, 'NO', 'Norway'),
(165, 'OM', 'Oman'),
(166, 'PK', 'Pakistan'),
(167, 'PW', 'Palau'),
(168, 'PS', 'Palestinian Territory Occupied'),
(169, 'PA', 'Panama'),
(170, 'PG', 'Papua new Guinea'),
(171, 'PY', 'Paraguay'),
(172, 'PE', 'Peru'),
(173, 'PH', 'Philippines'),
(174, 'PN', 'Pitcairn Island'),
(175, 'PL', 'Poland'),
(176, 'PT', 'Portugal'),
(177, 'PR', 'Puerto Rico'),
(178, 'QA', 'Qatar'),
(179, 'RE', 'Reunion'),
(180, 'RO', 'Romania'),
(181, 'RU', 'Russia'),
(182, 'RW', 'Rwanda'),
(183, 'SH', 'Saint Helena'),
(184, 'KN', 'Saint Kitts And Nevis'),
(185, 'LC', 'Saint Lucia'),
(186, 'PM', 'Saint Pierre and Miquelon'),
(187, 'VC', 'Saint Vincent And The Grenadines'),
(188, 'WS', 'Samoa'),
(189, 'SM', 'San Marino'),
(190, 'ST', 'Sao Tome and Principe'),
(191, 'SA', 'Saudi Arabia'),
(192, 'SN', 'Senegal'),
(193, 'RS', 'Serbia'),
(194, 'SC', 'Seychelles'),
(195, 'SL', 'Sierra Leone'),
(196, 'SG', 'Singapore'),
(197, 'SK', 'Slovakia'),
(198, 'SI', 'Slovenia'),
(199, 'XG', 'Smaller Territories of the UK'),
(200, 'SB', 'Solomon Islands'),
(201, 'SO', 'Somalia'),
(202, 'ZA', 'South Africa'),
(203, 'GS', 'South Georgia'),
(204, 'SS', 'South Sudan'),
(205, 'ES', 'Spain'),
(206, 'LK', 'Sri Lanka'),
(207, 'SD', 'Sudan'),
(208, 'SR', 'Suriname'),
(209, 'SJ', 'Svalbard And Jan Mayen Islands'),
(210, 'SZ', 'Swaziland'),
(211, 'SE', 'Sweden'),
(212, 'CH', 'Switzerland'),
(213, 'SY', 'Syria'),
(214, 'TW', 'Taiwan'),
(215, 'TJ', 'Tajikistan'),
(216, 'TZ', 'Tanzania'),
(217, 'TH', 'Thailand'),
(218, 'TG', 'Togo'),
(219, 'TK', 'Tokelau'),
(220, 'TO', 'Tonga'),
(221, 'TT', 'Trinidad And Tobago'),
(222, 'TN', 'Tunisia'),
(223, 'TR', 'Turkey'),
(224, 'TM', 'Turkmenistan'),
(225, 'TC', 'Turks And Caicos Islands'),
(226, 'TV', 'Tuvalu'),
(227, 'UG', 'Uganda'),
(228, 'UA', 'Ukraine'),
(229, 'AE', 'United Arab Emirates'),
(230, 'GB', 'United Kingdom'),
(231, 'US', 'United States'),
(232, 'UM', 'United States Minor Outlying Islands'),
(233, 'UY', 'Uruguay'),
(234, 'UZ', 'Uzbekistan'),
(235, 'VU', 'Vanuatu'),
(236, 'VA', 'Vatican City State (Holy See)'),
(237, 'VE', 'Venezuela'),
(238, 'VN', 'Vietnam'),
(239, 'VG', 'Virgin Islands (British)'),
(240, 'VI', 'Virgin Islands (US)'),
(241, 'WF', 'Wallis And Futuna Islands'),
(242, 'EH', 'Western Sahara'),
(243, 'YE', 'Yemen'),
(244, 'YU', 'Yugoslavia'),
(245, 'ZM', 'Zambia'),
(246, 'ZW', 'Zimbabwe');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE IF NOT EXISTS `customers` (
  `customer_id` int(11) NOT NULL COMMENT 'primary key',
  `organization_id` int(11) NOT NULL COMMENT 'foreign key for organization table',
  `user_id` varchar(30) DEFAULT NULL COMMENT 'foreign key for users table',
  `name` varchar(15) NOT NULL COMMENT 'customers name',
  `company_name` varchar(30) NOT NULL COMMENT 'customer company name',
  `email` varchar(20) NOT NULL COMMENT 'customer email',
  `mobile` varchar(15) NOT NULL COMMENT 'customer mobile',
  `present_address` varchar(250) NOT NULL COMMENT 'customer address',
  `product` varchar(30) NOT NULL,
  `customer_type` varchar(15) NOT NULL,
  `contact_t_follow_up` varchar(20) NOT NULL COMMENT 'customer follow up time',
  `comments` varchar(50) NOT NULL COMMENT 'comments line',
  `reference` varchar(20) CHARACTER SET utf8 NOT NULL COMMENT 'customer reffrence',
  `created_by` varchar(20) CHARACTER SET utf8 NOT NULL COMMENT 'name of create person',
  `created_on` varchar(30) NOT NULL COMMENT 'create of time',
  `updated_by` varchar(20) CHARACTER SET utf8 NOT NULL COMMENT 'name of update person ',
  `updated_on` varchar(30) NOT NULL COMMENT 'update of timeupdate of time'
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1 COMMENT='table for customers';

-- --------------------------------------------------------

--
-- Table structure for table `customers_follow_up`
--

CREATE TABLE IF NOT EXISTS `customers_follow_up` (
  `customer_id` int(11) NOT NULL COMMENT 'primary key for customer follow up',
  `organization_id` int(11) NOT NULL COMMENT 'foreign key for organization',
  `note` varchar(250) CHARACTER SET utf8 NOT NULL COMMENT 'note for customer',
  `follow_up_date` varchar(20) NOT NULL COMMENT 'follow up date for customer',
  `next_follow_up` varchar(20) NOT NULL COMMENT 'date for next folleow up customers',
  `follow_up_time` varchar(15) NOT NULL COMMENT 'customer follow time',
  `follow_up_type` varchar(50) NOT NULL COMMENT 'customer follwo type',
  `follow_up_by` varchar(30) NOT NULL COMMENT 'follow done by person name',
  `created_by` varchar(20) NOT NULL COMMENT 'name of create person',
  `created_on` varchar(30) NOT NULL COMMENT 'create of time',
  `updated_by` varchar(20) NOT NULL COMMENT 'name of update person',
  `updated_on` varchar(30) NOT NULL COMMENT 'update of time'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE IF NOT EXISTS `department` (
  `department_id` int(11) NOT NULL COMMENT 'department id is a auto increment and primary key for department table',
  `organization_id` int(11) NOT NULL COMMENT 'organization id is a auto increment and primary key for department table',
  `department_name` varchar(250) DEFAULT NULL COMMENT 'department name for  organizations',
  `created_by` varchar(20) CHARACTER SET utf8 NOT NULL COMMENT 'name of create person',
  `created_on` varchar(30) NOT NULL COMMENT 'create of time',
  `updated_by` varchar(20) CHARACTER SET utf8 NOT NULL COMMENT 'name of update person ',
  `updated_on` varchar(30) NOT NULL COMMENT 'update of time'
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1 COMMENT='Table department for organization`s employee';

-- --------------------------------------------------------

--
-- Table structure for table `designation`
--

CREATE TABLE IF NOT EXISTS `designation` (
  `designation_id` int(11) NOT NULL COMMENT 'Designation id is a auto increment and primary key for designations table',
  `organization_id` int(11) NOT NULL COMMENT 'organization id is a auto increment and primary key for designations table',
  `designation_name` varchar(250) NOT NULL COMMENT 'designation name for  organizations',
  `created_by` varchar(20) CHARACTER SET utf8 NOT NULL COMMENT 'name of create person',
  `created_on` varchar(30) NOT NULL COMMENT 'create of time',
  `updated_by` varchar(20) CHARACTER SET utf8 NOT NULL COMMENT 'name of update person',
  `updated_on` varchar(30) NOT NULL COMMENT 'update of time'
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1 COMMENT='Table  designations for organization`s employee';

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE IF NOT EXISTS `employee` (
  `employee_id` int(11) NOT NULL COMMENT 'Employee id is a auto increment and primary key for employee table',
  `organization_id` int(11) NOT NULL COMMENT ' Organization id is a auto increment and primary key for employee table',
  `department_id` int(11) DEFAULT NULL COMMENT 'Department name for a employee for his organization',
  `designation_id` int(11) DEFAULT NULL COMMENT 'Designations name for employee',
  `user_id` varchar(30) DEFAULT NULL COMMENT 'user_id is for login',
  `imei` varchar(30) NOT NULL,
  `salary_frquency` varchar(10) DEFAULT NULL COMMENT 'frequency for employee payroll',
  `joining_date` varchar(300) DEFAULT NULL COMMENT 'joining date for employee',
  `first_name` varchar(15) DEFAULT NULL COMMENT 'first name for employee',
  `last_name` varchar(15) DEFAULT NULL COMMENT 'last name for employee',
  `birthdate` varchar(255) DEFAULT NULL COMMENT 'birth date for employee',
  `gender` varchar(10) DEFAULT NULL COMMENT 'gender for employee',
  `image` varchar(250) DEFAULT NULL COMMENT 'employee pic',
  `martial_status` varchar(15) DEFAULT NULL COMMENT 'employee martial status',
  `nationality` varchar(15) DEFAULT NULL COMMENT 'employee nationalty',
  `father_name` varchar(15) DEFAULT NULL COMMENT 'employee father name',
  `passport` varchar(30) DEFAULT NULL COMMENT 'employee passport',
  `present_address` varchar(250) DEFAULT NULL COMMENT 'employee address',
  `mobile` varchar(12) DEFAULT NULL COMMENT 'employee mobile',
  `email` varchar(20) DEFAULT NULL COMMENT 'employee email',
  `country` varchar(15) DEFAULT NULL COMMENT 'employee country',
  `state` varchar(15) DEFAULT NULL COMMENT 'employee state',
  `city` varchar(15) DEFAULT NULL COMMENT 'employee city',
  `zip` varchar(9) DEFAULT NULL COMMENT 'employee zip',
  `resume` varchar(250) DEFAULT NULL COMMENT 'employee resume',
  `offerletter` varchar(250) DEFAULT NULL COMMENT 'employee offer lettaer',
  `joiningletter` varchar(255) DEFAULT NULL COMMENT 'employee join letter',
  `idproof` varchar(250) DEFAULT NULL COMMENT 'employee id proof',
  `bank_name` varchar(50) DEFAULT NULL COMMENT 'employee bank name',
  `branch_name` varchar(250) DEFAULT NULL COMMENT 'employee branch name',
  `acc_name` varchar(50) DEFAULT NULL COMMENT 'employee account name',
  `acc_no` varchar(20) DEFAULT NULL COMMENT 'employee account number',
  `created_by` varchar(20) CHARACTER SET utf8 NOT NULL COMMENT 'name of create person',
  `created_on` varchar(30) NOT NULL COMMENT 'create of time',
  `updated_by` varchar(20) CHARACTER SET utf8 NOT NULL COMMENT 'name of update person',
  `updated_on` varchar(30) NOT NULL COMMENT 'update of time'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Table employee for a organizations';

-- --------------------------------------------------------

--
-- Table structure for table `function`
--

CREATE TABLE IF NOT EXISTS `function` (
  `function_id` varchar(20) NOT NULL COMMENT 'function id is a auto increment and primary key for a function table',
  `function_name` varchar(50) NOT NULL COMMENT 'function name is function identity',
  `created_by` varchar(20) CHARACTER SET utf8 NOT NULL COMMENT 'name of create person',
  `created_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT 'create of time',
  `updated_by` varchar(20) CHARACTER SET utf8 NOT NULL COMMENT 'name of update person',
  `updated_on` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT 'update of time'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Function table for defined function list where give you perm';

--
-- Dumping data for table `function`
--

INSERT INTO `function` (`function_id`, `function_name`, `created_by`, `created_on`, `updated_by`, `updated_on`) VALUES
('acc_setting', 'acc_setting', '', '2015-07-11 05:18:24', '', '0000-00-00 00:00:00'),
('add_customer', 'add customer', '', '2015-07-16 11:44:54', '', '0000-00-00 00:00:00'),
('add_departments', 'add departments', '', '2015-07-11 05:18:24', '', '0000-00-00 00:00:00'),
('add_designation', 'add designation', '', '2015-07-11 05:18:24', '', '0000-00-00 00:00:00'),
('add_emp', 'add emp', '', '2015-07-11 05:18:24', '', '0000-00-00 00:00:00'),
('add_opportunities', 'add opportunities', '', '2015-07-16 11:45:42', '', '0000-00-00 00:00:00'),
('add_organization', 'add organization', '', '2015-07-11 05:18:24', '', '0000-00-00 00:00:00'),
('add_role', 'add role', '', '2015-07-11 05:18:24', '', '0000-00-00 00:00:00'),
('attendance_report', 'attendance_report', '', '2015-07-11 05:18:24', '', '0000-00-00 00:00:00'),
('blocked_user', 'blocked user', '', '2015-07-11 05:18:24', '', '0000-00-00 00:00:00'),
('change_pass', 'change pass', '', '2015-07-11 05:18:24', '', '0000-00-00 00:00:00'),
('customequick', 'customequick', '', '2015-07-16 11:46:15', '', '0000-00-00 00:00:00'),
('customers', 'customers', '', '2015-07-16 11:44:54', '', '0000-00-00 00:00:00'),
('delete_departments', 'delete departments', '', '2015-07-11 05:18:24', '', '0000-00-00 00:00:00'),
('delete_designation', 'delete designation', '', '2015-07-11 05:18:24', '', '0000-00-00 00:00:00'),
('delete_organization', 'delete organization', '', '2015-07-11 05:18:24', '', '0000-00-00 00:00:00'),
('delete_user', 'delete user', '', '2015-07-11 05:18:24', '', '0000-00-00 00:00:00'),
('emp_award', 'emp award', '', '2015-07-11 05:18:24', '', '0000-00-00 00:00:00'),
('index', 'index', '', '2015-07-11 05:18:24', '', '0000-00-00 00:00:00'),
('insert_customer', 'insert_customer', '', '2015-07-16 11:46:15', '', '0000-00-00 00:00:00'),
('insert_department', 'insert department', '', '2015-07-11 05:18:24', '', '0000-00-00 00:00:00'),
('insert_designation', 'insert designation', '', '2015-07-11 05:18:24', '', '0000-00-00 00:00:00'),
('insert_employee', 'insert employee', '', '2015-07-11 05:18:24', '', '0000-00-00 00:00:00'),
('insert_followup', 'insert_followup', '', '2015-07-16 11:47:25', '', '0000-00-00 00:00:00'),
('insert_organization', 'insert organization', '', '2015-07-11 05:18:24', '', '0000-00-00 00:00:00'),
('insert_role', 'insert role', '', '2015-07-11 05:18:24', '', '0000-00-00 00:00:00'),
('login_user', 'login user', '', '2015-07-11 05:18:24', '', '0000-00-00 00:00:00'),
('login_view', 'login_view', '', '2015-07-11 05:18:24', '', '0000-00-00 00:00:00'),
('manage_attendance', 'manage_attendance', '', '2015-07-11 05:18:24', '', '0000-00-00 00:00:00'),
('manage_departments', 'manage departments', '', '2015-07-11 05:18:24', '', '0000-00-00 00:00:00'),
('manage_designation', 'manage designation', '', '2015-07-11 05:18:24', '', '0000-00-00 00:00:00'),
('manage_emp', 'manage emp', '', '2015-07-11 05:18:24', '', '0000-00-00 00:00:00'),
('manage_opportunities', 'manage opportunities', '', '2015-07-16 11:45:42', '', '0000-00-00 00:00:00'),
('manage_organization', 'manage organization', '', '2015-07-11 05:18:24', '', '0000-00-00 00:00:00'),
('manage_users', 'manage users', '', '2015-07-11 05:18:24', '', '0000-00-00 00:00:00'),
('modal', 'modal', '', '2015-07-16 11:47:43', '', '0000-00-00 00:00:00'),
('role_assign', 'role assign', '', '2015-07-11 05:18:24', '', '0000-00-00 00:00:00'),
('role_management', 'role management', '', '2015-07-11 05:18:24', '', '0000-00-00 00:00:00'),
('role_permission', 'role permission', '', '2015-07-11 05:18:24', '', '0000-00-00 00:00:00'),
('sign_up', 'sign_up', '', '2015-07-11 05:18:24', '', '0000-00-00 00:00:00'),
('update_customer', 'update customer', '', '2015-07-16 11:47:25', '', '0000-00-00 00:00:00'),
('update_department', 'update department', '', '2015-07-11 05:18:24', '', '0000-00-00 00:00:00'),
('update_designation', 'update designation', '', '2015-07-11 05:18:24', '', '0000-00-00 00:00:00'),
('update_employee', 'update employee', '', '2015-07-11 05:18:24', '', '0000-00-00 00:00:00'),
('update_organization', 'update organization', '', '2015-07-11 05:18:24', '', '0000-00-00 00:00:00'),
('update_role_permissi', 'manage  unit', '', '2015-07-11 05:18:24', '', '0000-00-00 00:00:00'),
('user_add', 'user add', '', '2015-07-11 05:18:24', '', '0000-00-00 00:00:00'),
('user_role', 'user role', '', '2015-07-11 05:18:24', '', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `organization`
--

CREATE TABLE IF NOT EXISTS `organization` (
  `organization_id` int(11) NOT NULL COMMENT 'organization id is a auto increment and primary key for organization table',
  `organization_name` varchar(50) DEFAULT NULL COMMENT 'organization name for organizations',
  `organization_desc` varchar(250) DEFAULT NULL COMMENT 'organization description for organization table',
  `created_by` varchar(20) CHARACTER SET utf8 NOT NULL COMMENT 'name of create person',
  `created_on` varchar(30) NOT NULL COMMENT 'create of time',
  `updated_by` varchar(20) CHARACTER SET utf8 NOT NULL COMMENT 'name of update person',
  `updated_on` varchar(30) NOT NULL COMMENT 'update of time'
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=latin1 COMMENT='Table organizations for organization`s employee';

-- --------------------------------------------------------

--
-- Table structure for table `physical_address`
--

CREATE TABLE IF NOT EXISTS `physical_address` (
  `Latitude` varchar(70) NOT NULL,
  `Longitude` varchar(70) NOT NULL,
  `address` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE IF NOT EXISTS `products` (
  `product_id` int(11) NOT NULL COMMENT 'product id is primary key and auto increment ',
  `organization_id` int(11) NOT NULL COMMENT 'organization id is a foreign key in this table',
  `product_image` varchar(50) NOT NULL COMMENT 'product image',
  `product_desc` varchar(250) NOT NULL COMMENT 'product description',
  `product_rate` int(50) NOT NULL COMMENT 'product rate',
  `unit_code` varchar(20) NOT NULL COMMENT 'product unit',
  `created_by` varchar(20) NOT NULL COMMENT 'name of create person',
  `created_on` varchar(30) NOT NULL COMMENT 'create time',
  `updated_by` varchar(20) NOT NULL COMMENT 'name of update personm',
  `updated_on` varchar(30) NOT NULL COMMENT 'update time'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE IF NOT EXISTS `role` (
  `role_id` varchar(20) NOT NULL COMMENT 'role id primary key and auto increment for assign role',
  `role_description` varchar(50) DEFAULT NULL COMMENT 'role descriptons',
  `created_by` varchar(20) CHARACTER SET utf8 DEFAULT NULL COMMENT 'name of create person',
  `created_on` varchar(30) DEFAULT NULL COMMENT 'create of time',
  `updated_by` varchar(20) CHARACTER SET utf8 DEFAULT NULL COMMENT 'name of update person',
  `updated_on` varchar(30) DEFAULT NULL COMMENT 'update of time'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Role table for check authority';

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`role_id`, `role_description`, `created_by`, `created_on`, `updated_by`, `updated_on`) VALUES
('admin', 'administrator', NULL, NULL, NULL, NULL),
('fsaf', 'safas', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `role_permission`
--

CREATE TABLE IF NOT EXISTS `role_permission` (
  `role_id` varchar(20) NOT NULL COMMENT 'Role is primary key for role permissions',
  `function_id` varchar(20) NOT NULL COMMENT 'finction primary key dor role permissons',
  `auth_read` int(5) NOT NULL COMMENT 'Auth read is field for role permissions',
  `auth_execute` int(5) NOT NULL COMMENT 'Auth executeis field for role permissions',
  `created_by` varchar(20) CHARACTER SET utf8 NOT NULL COMMENT 'name of create person',
  `created_on` varchar(30) NOT NULL COMMENT 'create of time',
  `updated_by` varchar(20) CHARACTER SET utf8 NOT NULL COMMENT 'name of update person',
  `updated_on` varchar(30) NOT NULL COMMENT 'update of time'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Table for role permissions';

--
-- Dumping data for table `role_permission`
--

INSERT INTO `role_permission` (`role_id`, `function_id`, `auth_read`, `auth_execute`, `created_by`, `created_on`, `updated_by`, `updated_on`) VALUES
('admin', 'acc_setting', 1, 1, '', '', '', ''),
('admin', 'add_customer', 1, 1, '', '', '', ''),
('admin', 'add_departments', 1, 1, '', '', '', ''),
('admin', 'add_designation', 1, 1, '', '', '', ''),
('admin', 'add_emp', 1, 1, '', '', '', ''),
('admin', 'add_opportunities', 1, 1, '', '', '', ''),
('admin', 'add_organization', 1, 1, '', '', '', ''),
('admin', 'add_role', 1, 1, '', '', '', ''),
('admin', 'attendance_report', 1, 1, '', '', '', ''),
('admin', 'blocked_user', 1, 1, '', '', '', ''),
('admin', 'change_pass', 1, 1, '', '', '', ''),
('admin', 'customequick', 1, 1, '', '', '', ''),
('admin', 'customers', 1, 1, '', '', '', ''),
('admin', 'delete_departments', 1, 1, '', '', '', ''),
('admin', 'delete_designation', 1, 1, '', '', '', ''),
('admin', 'delete_organization', 1, 1, '', '', '', ''),
('admin', 'delete_user', 1, 1, '', '', '', ''),
('admin', 'emp_award', 1, 1, '', '', '', ''),
('admin', 'index', 1, 1, '', '', '', ''),
('admin', 'insert_customer', 1, 1, '', '', '', ''),
('admin', 'insert_department', 1, 1, '', '', '', ''),
('admin', 'insert_designation', 1, 1, '', '', '', ''),
('admin', 'insert_employee', 1, 1, '', '', '', ''),
('admin', 'insert_followup', 1, 1, '', '', '', ''),
('admin', 'insert_organization', 1, 1, '', '', '', ''),
('admin', 'insert_role', 1, 1, '', '', '', ''),
('admin', 'login_user', 1, 1, '', '', '', ''),
('admin', 'login_view', 1, 1, '', '', '', ''),
('admin', 'manage_attendance', 1, 1, '', '', '', ''),
('admin', 'manage_departments', 1, 1, '', '', '', ''),
('admin', 'manage_designation', 1, 1, '', '', '', ''),
('admin', 'manage_emp', 1, 1, '', '', '', ''),
('admin', 'manage_opportunities', 1, 1, '', '', '', ''),
('admin', 'manage_organization', 1, 1, '', '', '', ''),
('admin', 'manage_users', 1, 1, '', '', '', ''),
('admin', 'modal', 1, 1, '', '', '', ''),
('admin', 'role_assign', 1, 1, '', '', '', ''),
('admin', 'role_management', 1, 1, '', '', '', ''),
('admin', 'role_permission', 1, 1, '', '', '', ''),
('admin', 'sign_up', 1, 1, '', '', '', ''),
('admin', 'update_customer', 1, 1, '', '', '', ''),
('admin', 'update_department', 1, 1, '', '', '', ''),
('admin', 'update_designation', 1, 1, '', '', '', ''),
('admin', 'update_employee', 1, 1, '', '', '', ''),
('admin', 'update_organization', 1, 1, '', '', '', ''),
('admin', 'update_role_permissi', 1, 1, '', '', '', ''),
('admin', 'user_add', 1, 1, '', '', '', ''),
('admin', 'user_role', 1, 1, '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `sign_up`
--

CREATE TABLE IF NOT EXISTS `sign_up` (
  `user_id` int(11) NOT NULL COMMENT 'user id is priamary key and auto increment for signup',
  `usermailid` varchar(15) DEFAULT NULL COMMENT 'user mail id for sign up',
  `password` varchar(10) DEFAULT NULL COMMENT 'password for sign up',
  `user_name` varchar(15) NOT NULL COMMENT 'user name for sign up',
  `created_by` varchar(20) CHARACTER SET utf8 NOT NULL COMMENT 'name of create person',
  `created_on` varchar(30) NOT NULL COMMENT 'create of time',
  `updated_by` varchar(20) CHARACTER SET utf8 NOT NULL COMMENT 'name of update person',
  `updated_on` varchar(30) NOT NULL COMMENT 'update of time'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='sign up table for new user';

-- --------------------------------------------------------

--
-- Table structure for table `states`
--

CREATE TABLE IF NOT EXISTS `states` (
  `id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `country_id` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB AUTO_INCREMENT=4121 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `states`
--

-- --------------------------------------------------------

--
-- Table structure for table `tracking`
--

CREATE TABLE IF NOT EXISTS `tracking` (
  `imei` varchar(30) NOT NULL,
  `date` varchar(30) NOT NULL,
  `time` varchar(30) NOT NULL,
  `Latitude` varchar(70) NOT NULL,
  `Longitude` varchar(70) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `trackings`
--

CREATE TABLE IF NOT EXISTS `trackings` (
  `no` int(11) NOT NULL,
  `imei` varchar(30) NOT NULL,
  `datetime` varchar(30) NOT NULL,
  `Latitude` varchar(70) NOT NULL,
  `Longitude` varchar(70) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `unit`
--

CREATE TABLE IF NOT EXISTS `unit` (
  `unit_code` varchar(20) NOT NULL,
  `unit_desc` varchar(100) DEFAULT NULL,
  `created_by` varchar(20) DEFAULT NULL,
  `created_on` timestamp NULL DEFAULT NULL,
  `updated_by` varchar(20) DEFAULT NULL,
  `updated_on` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `unit`
--

INSERT INTO `unit` (`unit_code`, `unit_desc`, `created_by`, `created_on`, `updated_by`, `updated_on`) VALUES
('1000 No', '', NULL, NULL, NULL, NULL),
('100RM', '', '1', '2015-06-01 18:30:00', '1', '2015-06-01 18:30:00'),
('Additional 50 Meters', '', NULL, NULL, NULL, NULL),
('Cum', '', NULL, NULL, NULL, NULL),
('Day', '', NULL, NULL, NULL, NULL),
('Each', '', NULL, NULL, NULL, NULL),
('First 50 Meter', '', '1', '2015-06-02 18:30:00', '1', '2015-06-02 18:30:00'),
('Hect', '', NULL, NULL, NULL, NULL),
('Hour', '', NULL, NULL, NULL, NULL),
('Kg', '', NULL, NULL, NULL, NULL),
('Kg/Cm2', '', NULL, NULL, NULL, NULL),
('KM', '.', NULL, NULL, NULL, NULL),
('km/cum', '.', NULL, NULL, NULL, NULL),
('L.S.', '', NULL, NULL, NULL, NULL),
('Litre', '', NULL, NULL, NULL, NULL),
('Meter', '', NULL, NULL, NULL, NULL),
('Per Cum', '', '1', '2015-06-02 18:30:00', '1', '2015-06-02 18:30:00'),
('per day', '.', NULL, NULL, NULL, NULL),
('Per Sample', '', NULL, NULL, NULL, NULL),
('Quintal', '', NULL, NULL, NULL, NULL),
('RM', 'Running Meter', NULL, NULL, NULL, NULL),
('rmt', '.', NULL, NULL, NULL, NULL),
('Sqm', '', NULL, NULL, NULL, NULL),
('Tonne', '', '1', '2015-05-29 18:30:00', '1', '2015-05-29 18:30:00');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `user` (
  `user_id` varchar(30) NOT NULL COMMENT 'user id is auto increment  and primary key for users',
  `organization_id` int(11) NOT NULL COMMENT 'org id is foreign key',
  `role_id` varchar(20) DEFAULT NULL COMMENT 'role id  is foriegn key for users',
  `Username` varchar(30) DEFAULT NULL COMMENT 'mail id for users',
  `Password` varchar(50) DEFAULT NULL COMMENT 'password for users',
  `created_by` varchar(20) CHARACTER SET utf8 NOT NULL COMMENT 'name of create person',
  `created_on` varchar(30) NOT NULL COMMENT 'create of time',
  `updated_by` varchar(20) CHARACTER SET utf8 NOT NULL COMMENT 'name of update person',
  `updated_on` varchar(30) NOT NULL COMMENT 'update of time'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT COMMENT='users table';

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cities`
--
ALTER TABLE `cities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `countries`
--
ALTER TABLE `countries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`customer_id`,`organization_id`),
  ADD KEY `fk_user_id` (`user_id`) COMMENT 'fk_user_id',
  ADD KEY `organization_id` (`organization_id`);

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`department_id`,`organization_id`),
  ADD KEY `department_ibfk_1` (`organization_id`);

--
-- Indexes for table `designation`
--
ALTER TABLE `designation`
  ADD PRIMARY KEY (`designation_id`,`organization_id`),
  ADD KEY `organization_id` (`organization_id`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`employee_id`,`organization_id`),
  ADD KEY `organization_id` (`organization_id`),
  ADD KEY `FK_dept` (`department_id`),
  ADD KEY `designation` (`designation_id`) COMMENT 'designation',
  ADD KEY `fk_user_id` (`user_id`) COMMENT 'Fk_user_id';

--
-- Indexes for table `function`
--
ALTER TABLE `function`
  ADD PRIMARY KEY (`function_id`);

--
-- Indexes for table `organization`
--
ALTER TABLE `organization`
  ADD PRIMARY KEY (`organization_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`,`organization_id`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`role_id`);

--
-- Indexes for table `role_permission`
--
ALTER TABLE `role_permission`
  ADD PRIMARY KEY (`role_id`,`function_id`);

--
-- Indexes for table `sign_up`
--
ALTER TABLE `sign_up`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `states`
--
ALTER TABLE `states`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `trackings`
--
ALTER TABLE `trackings`
  ADD PRIMARY KEY (`no`);

--
-- Indexes for table `unit`
--
ALTER TABLE `unit`
  ADD PRIMARY KEY (`unit_code`);

--
-- Indexes for table `users`
--
--ALTER TABLE `users`
 -- ADD PRIMARY KEY (`user_id`,`organization_id`),
 -- ADD KEY `organization_id` (`organization_id`),
 -- ADD KEY `role` (`role_id`) COMMENT 'role';

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cities`
--
ALTER TABLE `cities`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=1;
--
-- AUTO_INCREMENT for table `countries`
--
ALTER TABLE `countries`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=1;
--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `customer_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'primary key',AUTO_INCREMENT=1;
--
-- AUTO_INCREMENT for table `department`
--
ALTER TABLE `department`
  MODIFY `department_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'department id is a auto increment and primary key for department table',AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `designation`
--
ALTER TABLE `designation`
  MODIFY `designation_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Designation id is a auto increment and primary key for designations table',AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `employee_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Employee id is a auto increment and primary key for employee table';
--
-- AUTO_INCREMENT for table `organization`
--
ALTER TABLE `organization`
  MODIFY `organization_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'organization id is a auto increment and primary key for organization table',AUTO_INCREMENT=25;
--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'product id is primary key and auto increment ';
--
-- AUTO_INCREMENT for table `sign_up`
--
ALTER TABLE `sign_up`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'user id is priamary key and auto increment for signup';
--
-- AUTO_INCREMENT for table `states`
--
ALTER TABLE `states`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4121;
--
-- AUTO_INCREMENT for table `trackings`
--
ALTER TABLE `trackings`
  MODIFY `no` int(11) NOT NULL AUTO_INCREMENT;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `customers`
--
ALTER TABLE `customers`
  ADD CONSTRAINT `FK_user_id` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `customers_ibfk_1` FOREIGN KEY (`organization_id`) REFERENCES `organization` (`organization_id`);

--
-- Constraints for table `department`
--
ALTER TABLE `department`
  ADD CONSTRAINT `department_ibfk_1` FOREIGN KEY (`organization_id`) REFERENCES `organization` (`organization_id`);

--
-- Constraints for table `designation`
--
ALTER TABLE `designation`
  ADD CONSTRAINT `designation_ibfk_1` FOREIGN KEY (`organization_id`) REFERENCES `organization` (`organization_id`);

--
-- Constraints for table `employee`
--
ALTER TABLE `employee`
  ADD CONSTRAINT `FK_dept` FOREIGN KEY (`department_id`) REFERENCES `department` (`department_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `employee_ibfk_1` FOREIGN KEY (`organization_id`) REFERENCES `organization` (`organization_id`),
  ADD CONSTRAINT `employee_ibfk_2` FOREIGN KEY (`designation_id`) REFERENCES `designation` (`designation_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `employee_ibfk_3` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `role_permission`
--
ALTER TABLE `role_permission`
  ADD CONSTRAINT `role_permission_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `role` (`role_id`);

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`organization_id`) REFERENCES `organization` (`organization_id`),
  ADD CONSTRAINT `users_ibfk_2` FOREIGN KEY (`role_id`) REFERENCES `role` (`role_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
