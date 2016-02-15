-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Feb 15, 2016 at 05:45 PM
-- Server version: 5.6.20
-- PHP Version: 5.5.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `wasteline`
--

-- --------------------------------------------------------

--
-- Table structure for table `access_control_list`
--

CREATE TABLE IF NOT EXISTS `access_control_list` (
`ID` int(11) NOT NULL,
  `module_ID` int(11) NOT NULL,
  `account_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `account`
--

CREATE TABLE IF NOT EXISTS `account` (
`ID` int(10) unsigned NOT NULL,
  `username` varchar(45) DEFAULT NULL,
  `password` varchar(70) DEFAULT NULL,
  `account_type_ID` int(10) unsigned NOT NULL,
  `status` int(11) NOT NULL COMMENT '0 - deleted, 1 - ok, 2 - draft, 3 - not confirmed'
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=38 ;

--
-- Dumping data for table `account`
--

INSERT INTO `account` (`ID`, `username`, `password`, `account_type_ID`, `status`) VALUES
(28, 'johnenrick', '4543f1f9ae790184f8a8754a688ff5dd4aacd180', 1, 3),
(29, 'henrybunal', '2de73319df9e424b3359207ce4e3f979799454b9', 2, 2),
(30, 'johnssss', '91a7e7b9a9e08ec9a9b8723a395098ef540a650e', 2, 3),
(31, 'adadad', '7ab515d12bd2cf431745511ac4ee13fed15ab578', 4, 3),
(32, 'asdasdasd', '7c4a8d09ca3762af61e59520943dc26494f8941b', 4, 3),
(33, '3123123', '88ea39439e74fa27c09a4fc0bc8ebe6d00978392', 4, 3),
(34, 'palsd', '7c4a8d09ca3762af61e59520943dc26494f8941b', 4, 3),
(35, 'qweqweqwe', '7c4a8d09ca3762af61e59520943dc26494f8941b', 4, 3),
(36, '1233', 'f4542db9ba30f7958ae42c113dd87ad21fb2eddb', 4, 3),
(37, 'sadasdasd', '4d9012b4a77a9524d675dad27c3276ab5705e5e8', 4, 3);

-- --------------------------------------------------------

--
-- Table structure for table `account_address`
--

CREATE TABLE IF NOT EXISTS `account_address` (
`ID` int(11) NOT NULL,
  `account_ID` int(11) NOT NULL,
  `barangay_ID` int(11) NOT NULL,
  `description` varchar(100) NOT NULL,
  `status` int(11) NOT NULL COMMENT '0 - deleted, 1 - ok'
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `account_address`
--

INSERT INTO `account_address` (`ID`, `account_ID`, `barangay_ID`, `description`, `status`) VALUES
(2, 28, 2, 's2ss2', 1),
(3, 3, 2, 's2ss2', 2),
(4, 28, 2, 's2ss2', 1),
(5, 28, 2, 's2ss2', 1);

-- --------------------------------------------------------

--
-- Table structure for table `account_basic_information`
--

CREATE TABLE IF NOT EXISTS `account_basic_information` (
`ID` int(10) unsigned NOT NULL,
  `account_ID` int(10) unsigned NOT NULL,
  `first_name` varchar(45) DEFAULT NULL,
  `middle_name` varchar(45) DEFAULT NULL,
  `last_name` varchar(45) DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=37 ;

--
-- Dumping data for table `account_basic_information`
--

INSERT INTO `account_basic_information` (`ID`, `account_ID`, `first_name`, `middle_name`, `last_name`) VALUES
(27, 28, 'John Enrick', 'Retubado', 'plenost'),
(28, 29, 'Henry', 'Bunal', 'Pido'),
(29, 30, 'First Name test1', 'Mid Name ', 'Last Nim'),
(30, 31, 'asdsad', 'tes', 'asd'),
(31, 32, 'asdasd', 'asdasd', 'asdasd'),
(32, 33, '123123', '123123', '123123'),
(33, 34, 'testingrano', 'asdjasjd', 'jasdjsajd'),
(34, 35, '312312', '12312', '3sqweqwe'),
(35, 36, 'ddgtq', 'qweqweqwe', 'qweqwe'),
(36, 37, 'ssdsd222', 'ssdsd222', 'ssdsd222');

-- --------------------------------------------------------

--
-- Table structure for table `account_contact_information`
--

CREATE TABLE IF NOT EXISTS `account_contact_information` (
`ID` int(10) unsigned NOT NULL,
  `account_ID` int(10) unsigned NOT NULL,
  `type` int(10) unsigned NOT NULL COMMENT 'cell number, email',
  `detail` text
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=52 ;

--
-- Dumping data for table `account_contact_information`
--

INSERT INTO `account_contact_information` (`ID`, `account_ID`, `type`, `detail`) VALUES
(40, 28, 1, 'plenosjohn@yahoo.com'),
(41, 28, 3, '09275835504'),
(42, 29, 1, 'taebill@asd.c'),
(43, 29, 3, '123123'),
(44, 30, 1, 'testmeial@test.com'),
(45, 31, 1, 'asdsad@sdasd.c'),
(46, 32, 1, 'asdasd@nnsd222.c'),
(47, 33, 1, '12312312312@s.c'),
(48, 34, 1, 'iis@ss.d'),
(49, 35, 1, 'weqwewqe@ffc.c'),
(50, 36, 1, 'eqwe@g.n'),
(51, 37, 1, 'asdsad@er.c');

-- --------------------------------------------------------

--
-- Table structure for table `account_contact_type`
--

CREATE TABLE IF NOT EXISTS `account_contact_type` (
`ID` int(10) unsigned NOT NULL,
  `type` varchar(45) DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `account_contact_type`
--

INSERT INTO `account_contact_type` (`ID`, `type`) VALUES
(1, 'Email Address'),
(2, 'F.A.X'),
(3, 'Telephone No.');

-- --------------------------------------------------------

--
-- Table structure for table `account_type`
--

CREATE TABLE IF NOT EXISTS `account_type` (
`ID` int(10) unsigned NOT NULL,
  `description` varchar(45) DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `account_type`
--

INSERT INTO `account_type` (`ID`, `description`) VALUES
(1, 'Administrator'),
(2, 'User'),
(3, 'LGU'),
(4, 'Unverified User');

-- --------------------------------------------------------

--
-- Table structure for table `action_log`
--

CREATE TABLE IF NOT EXISTS `action_log` (
`ID` int(11) NOT NULL,
  `account_ID` int(11) NOT NULL,
  `api_controller_ID` int(11) NOT NULL,
  `access_number_ID` int(11) NOT NULL,
  `detail` text NOT NULL,
  `datetime` double NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1840 ;

--
-- Dumping data for table `action_log`
--

INSERT INTO `action_log` (`ID`, `account_ID`, `api_controller_ID`, `access_number_ID`, `detail`, `datetime`) VALUES
(1, 0, 1, 0, '5', 1449244502),
(2, 0, 1, 0, '[]', 1449245201),
(3, 0, 1, 0, '[]', 1449245254),
(4, 0, 1, 0, '[]', 1449245309),
(5, 0, 1, 0, '[]', 1449245323),
(6, 0, 1, 0, '{"account_basic_information__address":"ewq"}', 1449245463),
(7, 0, 1, 0, '{"account_basic_information__address":"ewq"}', 1449245506),
(8, 0, 1, 0, '{"condition":{"account_basic_information__address":"ewq"}}', 1449245534),
(9, 0, 1, 0, '{"condition":{"account_basic_information__address":"ewq"}}', 1449245549),
(10, 0, 1, 0, '{"condition":{"like__account_basic_information__address":"ew"}}', 1449245567),
(11, 5, 2, 0, '4', 1449250207),
(12, 5, 2, 0, '5', 1449250216),
(13, 5, 2, 0, '{"type":"1","detail":"test2"}', 1449250227),
(14, 5, 2, 0, '{"condition":{"account_contact_information__type":"1"},"updated_data":{"detail":"testra"}}', 1449250304),
(15, 5, 2, 0, '{"condition":{"account_contact_information__type":"1"},"updated_data":{"detail":"testra1"}}', 1449250314),
(16, 5, 2, 0, '{"condition":{"account_contact_information__type":"1"},"updated_data":{"detail":"testra1"}}', 1449977907),
(17, 5, 2, 0, '{"condition":{"account_contact_information__type":"1"},"updated_data":{"detail":"testra3213"}}', 1449977957),
(18, 5, 1, 0, '4', 1450092715),
(19, 5, 1, 0, '6', 1450092779),
(20, 5, 1, 0, '7', 1450092890),
(21, 5, 1, 0, '8', 1450092901),
(22, 5, 1, 0, '9', 1450092916),
(23, 5, 1, 0, '10', 1450092936),
(24, 5, 1, 0, '11', 1450092950),
(25, 5, 1, 0, '12', 1450092969),
(26, 5, 1, 0, '15', 1450093673),
(27, 5, 1, 0, '{"ID":"15"}', 1450093828),
(28, 5, 1, 0, '[]', 1450093834),
(29, 5, 1, 0, '{"condition":{"greater__report__datetime":"1450092715"}}', 1450093905),
(30, 5, 1, 0, '{"condition":{"greater__report__datetime":"1450092750"}}', 1450093925),
(31, 5, 1, 0, '{"condition":{"greater__report__datetime":"1450092750"},"sort":{"report__datetime":"asc"}}', 1450093970),
(32, 5, 1, 0, '{"condition":{"greater__report__datetime":"1450092750"},"sort":{"report__datetime":"desc"}}', 1450093980),
(33, 5, 1, 0, '{"condition":{"greater__report__datetime":"1450092750"},"sort":{"report__datetime":"asc"}}', 1450094000),
(34, 5, 1, 0, '{"condition":{"greater__report__datetime":"1450092750"},"sort":{"report__datetime":"desc"}}', 1450094005),
(35, 5, 1, 0, '{"condition":{"greater__report__datetime":"1450092750"},"sort":{"report__datetime":"desc"}}', 1450094041),
(36, 5, 1, 0, '{"condition":{"greater__report__datetime":"1450092750"},"sort":{"report__datetime":"desc"}}', 1450094055),
(37, 5, 1, 0, '{"condition":{"greater__report__datetime":"1450092750"},"sort":{"report__datetime":"desc"}}', 1450094114),
(38, 5, 1, 0, '{"condition":{"greater__report__datetime":"1450092750"},"sort":{"report__datetime":"asc"}}', 1450094128),
(39, 5, 1, 0, '{"condition":{"greater__report__datetime":"1450092750"},"sort":{"report__datetime":"asc"}}', 1450094839),
(40, 6, 1, 0, '{"condition":{"greater__report__datetime":"1450092750"},"sort":{"report__datetime":"asc"}}', 1450094865),
(41, 5, 1, 0, '{"condition":{"greater__report__datetime":"1450092750"},"sort":{"report__datetime":"asc"}}', 1450094872),
(42, 5, 1, 0, '{"condition":{"greater__report__datetime":"1450092750"},"sort":{"report__datetime":"asc"}}', 1450094879),
(43, 5, 1, 0, '{"condition":{"greater__report__datetime":"1450092750"},"sort":{"report__datetime":"asc"}}', 1450095004),
(44, 5, 1, 0, '{"condition":{"greater__report__datetime":"1450092750"},"sort":{"report__datetime":"asc"}}', 1450095121),
(45, 5, 1, 0, '16', 1450095178),
(46, 5, 1, 0, '{"associated_ID":"3","report_type_ID":"2","detail":"daghang tae"}', 1450095186),
(47, 5, 1, 0, '18', 1450095227),
(48, 5, 1, 0, '{"associated_ID":"3","report_type_ID":"3","detail":"daghang tae","longitude":"231","latitude":"3"}', 1450095233),
(49, 5, 1, 0, '{"associated_ID":"3","report_type_ID":"3","detail":"daghang tae","longitude":"231","latitude":"3","condition":{"report_type_ID":"3"}}', 1450095263),
(50, 5, 1, 0, '6', 1452712059),
(51, 5, 1, 0, '7', 1452712097),
(52, 5, 1, 0, '8', 1452712136),
(53, 5, 1, 0, '9', 1452712191),
(54, 5, 1, 0, '10', 1452717791),
(55, 5, 1, 0, '11', 1452717998),
(56, 5, 1, 0, '12', 1452746511),
(57, 5, 1, 0, '13', 1452746555),
(58, 5, 1, 0, '14', 1452746753),
(59, 5, 1, 0, '15', 1452746775),
(60, 5, 1, 0, '16', 1452746819),
(61, 5, 1, 0, '17', 1453219960),
(62, 0, 1, 0, '18', 1453295196),
(63, 0, 1, 0, '19', 1453296207),
(64, 0, 1, 0, '20', 1453296342),
(65, 0, 1, 0, '21', 1453296540),
(66, 0, 1, 0, '22', 1453296854),
(67, 0, 1, 0, '23', 1453297315),
(68, 0, 1, 0, '24', 1453297346),
(69, 0, 1, 0, '25', 1453297419),
(70, 0, 1, 0, '26', 1453794027),
(71, 0, 1, 0, '[]', 1453878075),
(72, 0, 1, 0, '{"all_information":"true"}', 1453878270),
(73, 0, 1, 0, '1', 1453902928),
(74, 0, 1, 0, '{"updated_data":{"description":"3","status":"4"},"ID":"1"}', 1453903310),
(75, 0, 1, 0, '{"updated_data":{"description":"3","status":"5"},"ID":"1"}', 1453903317),
(76, 0, 1, 0, '{"updated_data":{"description":"3","status":"5"},"ID":"1"}', 1453904130),
(77, 0, 1, 0, '{"updated_data":{"description":"3","status":"5"},"ID":"1"}', 1453904151),
(78, 0, 1, 0, '{"updated_data":{"description":"3","status":"5"},"ID":"1"}', 1453904165),
(79, 0, 1, 0, '{"updated_data":{"description":"3","status":"5"},"ID":"1"}', 1453904648),
(80, 0, 1, 0, '{"updated_data":{"description":"test","status":"7"},"ID":"1"}', 1453904657),
(81, 0, 1, 0, '{"updated_data":{"description":"test","status":"7","tobol":"231"},"ID":"1"}', 1453905212),
(82, 0, 1, 0, '{"updated_data":{"description":"test1","status":"72","tobol":"231"},"ID":"1"}', 1453905217),
(83, 0, 1, 0, '{"ID":"1"}', 1453905414),
(84, 0, 1, 0, '{"ID":"1"}', 1453905441),
(85, 0, 1, 0, '{"ID":"1"}', 1453905599),
(86, 0, 1, 0, '{"ID":"1"}', 1453905811),
(87, 0, 1, 0, '{"ID":"1"}', 1453905956),
(88, 0, 1, 0, '{"ID":"1"}', 1453906027),
(89, 0, 1, 0, '{"updated_data":{"description":"test","status":"7","tobol":"231"},"ID":"1"}', 1453906410),
(90, 0, 1, 0, '{"updated_data":{"description":"test","status":"7","tobol":"231s"},"ID":"1"}', 1453906416),
(91, 0, 1, 0, '{"updated_data":{"description":"test","status":"7","tobol":"231s"},"ID":"1"}', 1453906426),
(92, 0, 1, 0, '{"updated_data":{"description":"test","status":"7","tobol":"231s"},"ID":"1"}', 1453907187),
(93, 0, 1, 0, '{"updated_data":{"description":"test","status":"7","tobol":"231s"},"ID":"1"}', 1453908536),
(94, 0, 1, 0, '{"updated_data":{"description":"tests","status":"7s","tobol":"231s"},"ID":"1"}', 1453908539),
(95, 0, 1, 0, '{"updated_data":{"description":"tests","status":"7sd","tobol":"231s"},"ID":"1"}', 1453908552),
(96, 0, 1, 0, '{"updated_data":{"description":"tests","status":"7sd"},"ID":"1"}', 1453908566),
(97, 0, 1, 0, '{"updated_data":{"description":"tests","status":"7sd"},"ID":"1"}', 1453908587),
(98, 0, 1, 0, '{"updated_data":{"description":"tests","status":"7sd"},"ID":"1"}', 1453908589),
(99, 0, 1, 0, '{"updated_data":{"description":"tests","status":"7sd"},"ID":"1"}', 1453908601),
(100, 0, 1, 0, '{"updated_data":{"description":"tests","status":"7sd"},"ID":"1"}', 1453908652),
(101, 0, 1, 0, '{"updated_data":{"description":"tests","status":"7sd"},"ID":"1"}', 1453908666),
(102, 0, 1, 0, '{"updated_data":{"description":"tests","status":"7sd"},"ID":"1"}', 1453908675),
(103, 0, 1, 0, '{"updated_data":{"description":"testssd","status":"3"},"ID":"1"}', 1453908686),
(104, 0, 1, 0, '{"updated_data":{"description":"testssd","status":"3"},"condition":{"barangay_ID":"2"}}', 1453908906),
(105, 0, 1, 0, '{"updated_data":{"description":"testssd","status":"3"},"condition":{"barangay_ID":"2"}}', 1453908935),
(106, 0, 1, 0, '{"updated_data":{"description":"testssd","status":"31"},"condition":{"barangay_ID":"2"}}', 1453908942),
(107, 0, 1, 0, '{"updated_data":{"description":"testssde","status":"31"},"condition":{"barangay_ID":"2"}}', 1453908947),
(108, 0, 1, 0, '{"updated_data":{"description":"testssde","status":"31"},"condition":{"barangay_ID":"2"}}', 1453908982),
(109, 0, 1, 0, '{"updated_data":{"description":"testssde","status":"31"},"condition":{"barangay_ID":"2"}}', 1453912315),
(110, 0, 1, 0, '[]', 1454421797),
(111, 0, 1, 0, '{"account_ID":"s"}', 1454421913),
(112, 25, 1, 0, '[]', 1454422413),
(113, 25, 1, 0, '[]', 1454423284),
(114, 25, 1, 0, '[]', 1454423293),
(115, 25, 1, 0, '[]', 1454423295),
(116, 25, 1, 0, '[]', 1454423296),
(117, 25, 1, 0, '[]', 1454423507),
(118, 25, 1, 0, '[]', 1454423508),
(119, 25, 1, 0, '[]', 1454423509),
(120, 25, 1, 0, '[]', 1454423517),
(121, 25, 1, 0, '[]', 1454423558),
(122, 25, 1, 0, '[]', 1454423559),
(123, 25, 1, 0, '[]', 1454423561),
(124, 25, 1, 0, '[]', 1454423610),
(125, 25, 1, 0, '[]', 1454423618),
(126, 25, 1, 0, '[]', 1454423620),
(127, 25, 1, 0, '[]', 1454423620),
(128, 25, 1, 0, '[]', 1454423636),
(129, 25, 1, 0, '[]', 1454423637),
(130, 25, 1, 0, '[]', 1454423639),
(131, 25, 1, 0, '[]', 1454423640),
(132, 25, 1, 0, '[]', 1454423685),
(133, 25, 1, 0, '[]', 1454423686),
(134, 25, 1, 0, '[]', 1454423687),
(135, 25, 1, 0, '[]', 1454423748),
(136, 25, 1, 0, '[]', 1454423755),
(137, 25, 1, 0, '[]', 1454423768),
(138, 25, 1, 0, '[]', 1454423800),
(139, 25, 1, 0, '[]', 1454423805),
(140, 25, 1, 0, '[]', 1454423810),
(141, 25, 1, 0, '[]', 1454423852),
(142, 25, 1, 0, '[]', 1454423852),
(143, 25, 1, 0, '[]', 1454423854),
(144, 25, 1, 0, '[]', 1454423856),
(145, 25, 1, 0, '[]', 1454424012),
(146, 25, 1, 0, '[]', 1454424012),
(147, 25, 1, 0, '[]', 1454424015),
(148, 25, 1, 0, '[]', 1454424060),
(149, 25, 1, 0, '[]', 1454424060),
(150, 25, 1, 0, '[]', 1454424071),
(151, 25, 1, 0, '[]', 1454424071),
(152, 25, 1, 0, '[]', 1454424210),
(153, 25, 1, 0, '[]', 1454424210),
(154, 25, 1, 0, '[]', 1454424267),
(155, 25, 1, 0, '[]', 1454424692),
(156, 25, 1, 0, '[]', 1454424723),
(157, 25, 1, 0, '[]', 1454424723),
(158, 25, 1, 0, '[]', 1454425776),
(159, 25, 1, 0, '[]', 1454425776),
(160, 25, 1, 0, '[]', 1454425978),
(161, 25, 1, 0, '[]', 1454425978),
(162, 25, 1, 0, '[]', 1454426158),
(163, 25, 1, 0, '[]', 1454426158),
(164, 25, 1, 0, '[]', 1454426400),
(165, 25, 1, 0, '[]', 1454426401),
(166, 25, 1, 0, '[]', 1454426417),
(167, 25, 1, 0, '[]', 1454426417),
(168, 25, 1, 0, '[]', 1454426432),
(169, 25, 1, 0, '[]', 1454426432),
(170, 25, 1, 0, '[]', 1454427480),
(171, 25, 1, 0, '[]', 1454427480),
(172, 25, 1, 0, '[]', 1454428684),
(173, 25, 1, 0, '[]', 1454428684),
(174, 25, 1, 0, '[]', 1454428717),
(175, 25, 1, 0, '[]', 1454428717),
(176, 25, 1, 0, '[]', 1454428742),
(177, 25, 1, 0, '[]', 1454428742),
(178, 25, 1, 0, '[]', 1454429861),
(179, 25, 1, 0, '[]', 1454429861),
(180, 25, 1, 0, '[]', 1454429988),
(181, 25, 1, 0, '[]', 1454429988),
(182, 25, 1, 0, '[]', 1454430002),
(183, 25, 1, 0, '[]', 1454430002),
(184, 25, 1, 0, '[]', 1454430043),
(185, 25, 1, 0, '[]', 1454430043),
(186, 25, 1, 0, '[]', 1454430077),
(187, 25, 1, 0, '[]', 1454430077),
(188, 25, 1, 0, '[]', 1454430084),
(189, 25, 1, 0, '[]', 1454430084),
(190, 25, 1, 0, '[]', 1454430138),
(191, 25, 1, 0, '[]', 1454430138),
(192, 25, 1, 0, '[]', 1454430182),
(193, 25, 1, 0, '[]', 1454430182),
(194, 25, 1, 0, '[]', 1454430423),
(195, 25, 1, 0, '[]', 1454430423),
(196, 25, 1, 0, '[]', 1454430466),
(197, 25, 1, 0, '[]', 1454430466),
(198, 25, 1, 0, '[]', 1454435541),
(199, 25, 1, 0, '[]', 1454435542),
(200, 25, 1, 0, '[]', 1454436082),
(201, 25, 1, 0, '[]', 1454436082),
(202, 25, 1, 0, '[]', 1454436094),
(203, 25, 1, 0, '[]', 1454436094),
(204, 25, 1, 0, '{"updated_data":{"first_name":"John Enrick","middle_name":"Retubado"}}', 1454436095),
(205, 25, 1, 0, '[]', 1454436111),
(206, 25, 1, 0, '[]', 1454436111),
(207, 25, 1, 0, '[]', 1454436156),
(208, 25, 1, 0, '[]', 1454436156),
(209, 25, 1, 0, '[]', 1454436194),
(210, 25, 1, 0, '[]', 1454436194),
(211, 25, 1, 0, '[]', 1454436224),
(212, 25, 1, 0, '[]', 1454436224),
(213, 25, 1, 0, '[]', 1454436238),
(214, 25, 1, 0, '[]', 1454436238),
(215, 25, 1, 0, '[]', 1454436273),
(216, 25, 1, 0, '[]', 1454436273),
(217, 25, 1, 0, '[]', 1454436323),
(218, 25, 1, 0, '[]', 1454436323),
(219, 25, 1, 0, '{"updated_data":{"first_name":"John Enrick","middle_name":"Retubado","last_name":"Plenos","email":"plenosjohn@yahoo.com","username":"johnenrick","password":""}}', 1454436377),
(220, 25, 1, 0, '[]', 1454436510),
(221, 25, 1, 0, '[]', 1454436510),
(222, 25, 1, 0, '[]', 1454436528),
(223, 25, 1, 0, '[]', 1454436528),
(224, 25, 1, 0, '[]', 1454436716),
(225, 25, 1, 0, '[]', 1454436716),
(226, 25, 1, 0, '{"updated_data":{"first_name":"John Enrick","middle_name":"Retubado","last_name":"Plenos","email":"plenosjohn@yahoo.com","username":"johnenrick","password":""}}', 1454436718),
(227, 25, 1, 0, '[]', 1454436741),
(228, 25, 1, 0, '[]', 1454436741),
(229, 25, 1, 0, '[]', 1454436760),
(230, 25, 1, 0, '[]', 1454436760),
(231, 25, 1, 0, '[]', 1454436830),
(232, 25, 1, 0, '[]', 1454436830),
(233, 25, 1, 0, '[]', 1454436851),
(234, 25, 1, 0, '[]', 1454436851),
(235, 25, 1, 0, '[]', 1454436875),
(236, 25, 1, 0, '[]', 1454436875),
(237, 25, 1, 0, '[]', 1454436888),
(238, 25, 1, 0, '[]', 1454436888),
(239, 25, 1, 0, '[]', 1454437340),
(240, 25, 1, 0, '[]', 1454437340),
(241, 25, 1, 0, '[]', 1454437351),
(242, 25, 1, 0, '[]', 1454437351),
(243, 25, 1, 0, '[]', 1454437366),
(244, 25, 1, 0, '[]', 1454437366),
(245, 25, 1, 0, '[]', 1454437378),
(246, 25, 1, 0, '[]', 1454437378),
(247, 25, 1, 0, '[]', 1454437392),
(248, 25, 1, 0, '[]', 1454437392),
(249, 25, 1, 0, '[]', 1454437462),
(250, 25, 1, 0, '[]', 1454437462),
(251, 25, 1, 0, '[]', 1454437477),
(252, 25, 1, 0, '[]', 1454437477),
(253, 25, 1, 0, '[]', 1454437500),
(254, 25, 1, 0, '[]', 1454437500),
(255, 25, 1, 0, '[]', 1454437648),
(256, 25, 1, 0, '[]', 1454437648),
(257, 25, 1, 0, '[]', 1454437686),
(258, 25, 1, 0, '[]', 1454437686),
(259, 25, 1, 0, '[]', 1454437696),
(260, 25, 1, 0, '[]', 1454437696),
(261, 25, 1, 0, '[]', 1454437756),
(262, 25, 1, 0, '[]', 1454437756),
(263, 25, 1, 0, '[]', 1454437782),
(264, 25, 1, 0, '[]', 1454437782),
(265, 25, 1, 0, '{"updated_data":{"first_name":"John Enrick","middle_name":"Retubado","last_name":"Plenos","username":"johnenrick","password":""}}', 1454437784),
(266, 25, 1, 0, '{"updated_data":{"first_name":"John Enricks","middle_name":"Retubado","last_name":"Plenos","username":"johnenrick","password":""}}', 1454437788),
(267, 25, 1, 0, '[]', 1454437790),
(268, 25, 1, 0, '[]', 1454437790),
(269, 25, 1, 0, '{"updated_data":{"first_name":"John Enricks","middle_name":"Retubado","last_name":"Plenos","username":"johnenrick","password":""}}', 1454437793),
(270, 25, 1, 0, '{"updated_data":{"first_name":"John Enricks","middle_name":"Retubado","last_name":"Plenos","username":"johnenrick","password":""}}', 1454437878),
(271, 25, 1, 0, '[]', 1454437884),
(272, 25, 1, 0, '[]', 1454437884),
(273, 25, 1, 0, '{"updated_data":{"first_name":"John Enricks","middle_name":"Retubado","last_name":"Plenos","username":"johnenrick","password":""}}', 1454437887),
(274, 25, 1, 0, '[]', 1454437907),
(275, 25, 1, 0, '[]', 1454437907),
(276, 25, 1, 0, '{"updated_data":{"first_name":"John Enricks","middle_name":"Retubado","last_name":"Plenos","username":"johnenrick","password":""}}', 1454437909),
(277, 25, 1, 0, '[]', 1454438147),
(278, 25, 1, 0, '[]', 1454438147),
(279, 25, 1, 0, '{"updated_data":{"first_name":"John Enricks","middle_name":"Retubado","last_name":"Plenos","username":"johnenrick","password":""}}', 1454438149),
(280, 25, 1, 0, '[]', 1454438151),
(281, 25, 1, 0, '[]', 1454438151),
(282, 25, 1, 0, '{"updated_data":{"first_name":"John Enrick","middle_name":"Retubados","last_name":"Plenoss","username":"johnenrick","password":""}}', 1454438159),
(283, 25, 1, 0, '[]', 1454438161),
(284, 25, 1, 0, '[]', 1454438161),
(285, 25, 1, 0, '{"updated_data":{"first_name":"John Enrick","middle_name":"Retubados","last_name":"Plenoss","email":"plenosjohns@yahoo.com","username":"johnenrick","password":""}}', 1454438169),
(286, 25, 1, 0, '[]', 1454438171),
(287, 25, 1, 0, '[]', 1454438171),
(288, 25, 1, 0, '{"updated_data":{"first_name":"John Enrick","middle_name":"Retubados","last_name":"Plenoss","email":"plenosjohns@yahoo.com","username":"johnenrick","password":""}}', 1454438174),
(289, 25, 1, 0, '[]', 1454438176),
(290, 25, 1, 0, '[]', 1454438176),
(291, 25, 1, 0, '{"updated_data":{"first_name":"John Enrick","middle_name":"Retubados","last_name":"Plenoss","email":"plenosjohsn@yahoo.com","username":"johnenrick","password":""}}', 1454438180),
(292, 0, 1, 0, '27', 1454499492),
(293, 0, 1, 0, '28', 1454500064),
(294, 28, 1, 0, '[]', 1454500070),
(295, 28, 1, 0, '[]', 1454500070),
(296, 28, 1, 0, '[]', 1454500097),
(297, 28, 1, 0, '[]', 1454500097),
(298, 28, 1, 0, '[]', 1454500103),
(299, 28, 1, 0, '[]', 1454500103),
(300, 28, 1, 0, '{"updated_data":{"first_name":"John Enrick","middle_name":"Retubado","last_name":"Plenos","username":"johnenrick","password":""}}', 1454500105),
(301, 28, 1, 0, '[]', 1454500223),
(302, 28, 1, 0, '[]', 1454500223),
(303, 28, 1, 0, '{"updated_data":{"first_name":"John Enrick","middle_name":"Retubado","last_name":"Plenos","username":"johnenrick","password":""}}', 1454500226),
(304, 28, 1, 0, '[]', 1454500250),
(305, 28, 1, 0, '[]', 1454500250),
(306, 28, 1, 0, '{"updated_data":{"first_name":"John Enrick","middle_name":"Retubado","last_name":"Plenos","username":"johnenrick","password":""}}', 1454500252),
(307, 28, 1, 0, '[]', 1454500278),
(308, 28, 1, 0, '[]', 1454500278),
(309, 28, 1, 0, '{"updated_data":{"first_name":"John Enrick","middle_name":"Retubado","last_name":"Plenos","username":"johnenrick","password":""}}', 1454500279),
(310, 28, 1, 0, '{"updated_data":{"first_name":"John Enrick","middle_name":"Retubado","last_name":"Plenos","email":"plenosjohsn@yahoo.com","username":"johnenrick","password":""}}', 1454500310),
(311, 28, 1, 0, '[]', 1454500359),
(312, 28, 1, 0, '[]', 1454500359),
(313, 28, 1, 0, '{"updated_data":{"first_name":"John Enrick","middle_name":"Retubado","last_name":"Plenos","username":"johnenrick","confirm_password":""}}', 1454500361),
(314, 28, 1, 0, '[]', 1454500375),
(315, 28, 1, 0, '[]', 1454500375),
(316, 28, 1, 0, '{"updated_data":{"first_name":"John Enrick","middle_name":"Retubado","last_name":"Plenos","username":"johnenrick"}}', 1454500377),
(317, 28, 1, 0, '{"updated_data":{"first_name":"John Enrick","middle_name":"Retubado","last_name":"Plenos","username":"johnenrick","password":"johnenrick","confirm_password":"johnenrick"}}', 1454500742),
(318, 28, 1, 0, '{"updated_data":{"first_name":"John Enrick","middle_name":"Retubado","last_name":"Plenos","username":"johnenrick","password":"johnenrick","confirm_password":"johnenrick"}}', 1454500747),
(319, 28, 1, 0, '[]', 1454500749),
(320, 28, 1, 0, '[]', 1454500749),
(321, 28, 1, 0, '[]', 1454509554),
(322, 28, 1, 0, '[]', 1454509554),
(323, 28, 1, 0, '{"updated_data":{"first_name":"John Enrick","middle_name":"Retubado","last_name":"Plenos","username":"johnenrick"}}', 1454509557),
(324, 28, 1, 0, '{"updated_data":{"first_name":"John Enrick","middle_name":"Retubado","last_name":"Plenos","username":"johnenrick"}}', 1454509558),
(325, 28, 1, 0, '{"updated_data":{"first_name":"John Enrick","middle_name":"Retubado","last_name":"Plenos","username":"johnenrick"}}', 1454509558),
(326, 28, 1, 0, '{"updated_data":{"first_name":"John Enrick","middle_name":"Retubado","last_name":"Plenos","username":"johnenrick","password":"johnenrick1","confirm_password":"johnenrick1"}}', 1454509574),
(327, 28, 1, 0, '{"updated_data":{"first_name":"John Enrick","middle_name":"Retubado","last_name":"Plenos","username":"johnenrick","password":"johnenrick","confirm_password":"johnenrick"}}', 1454509581),
(328, 28, 1, 0, '[]', 1454509595),
(329, 28, 1, 0, '[]', 1454509595),
(330, 28, 1, 0, '[]', 1454510040),
(331, 28, 1, 0, '[]', 1454510040),
(332, 28, 1, 0, '[]', 1454510079),
(333, 28, 1, 0, '[]', 1454510079),
(334, 28, 1, 0, '[]', 1454510163),
(335, 28, 1, 0, '[]', 1454510163),
(336, 28, 1, 0, '[]', 1454510176),
(337, 28, 1, 0, '[]', 1454510176),
(338, 28, 1, 0, '[]', 1454510204),
(339, 28, 1, 0, '[]', 1454510204),
(340, 28, 1, 0, '[]', 1454510212),
(341, 28, 1, 0, '[]', 1454510212),
(342, 28, 1, 0, '[]', 1454510219),
(343, 28, 1, 0, '[]', 1454510219),
(344, 28, 1, 0, '[]', 1454510225),
(345, 28, 1, 0, '[]', 1454510225),
(346, 28, 1, 0, '[]', 1454510254),
(347, 28, 1, 0, '[]', 1454510254),
(348, 28, 1, 0, '[]', 1454510266),
(349, 28, 1, 0, '[]', 1454510266),
(350, 28, 1, 0, '[]', 1454510277),
(351, 28, 1, 0, '[]', 1454510277),
(352, 28, 1, 0, '[]', 1454510281),
(353, 28, 1, 0, '[]', 1454510281),
(354, 28, 1, 0, '[]', 1454510289),
(355, 28, 1, 0, '[]', 1454510289),
(356, 28, 1, 0, '[]', 1454510298),
(357, 28, 1, 0, '[]', 1454510298),
(358, 28, 1, 0, '[]', 1454512277),
(359, 28, 1, 0, '[]', 1454512278),
(360, 28, 1, 0, '[]', 1454512281),
(361, 28, 1, 0, '[]', 1454512281),
(362, 28, 1, 0, '[]', 1454552262),
(363, 28, 1, 0, '[]', 1454552262),
(364, 28, 1, 0, '[]', 1454552300),
(365, 28, 1, 0, '[]', 1454553593),
(366, 28, 1, 0, '[]', 1454553650),
(367, 28, 1, 0, '[]', 1454553650),
(368, 28, 1, 0, '[]', 1454558848),
(369, 28, 1, 0, '[]', 1454558848),
(370, 28, 1, 0, '[]', 1454588644),
(371, 28, 1, 0, '[]', 1454588644),
(372, 28, 1, 0, '[]', 1454588688),
(373, 28, 1, 0, '[]', 1454588688),
(374, 28, 1, 0, '[]', 1454588850),
(375, 28, 1, 0, '[]', 1454588851),
(376, 28, 1, 0, '[]', 1454588852),
(377, 28, 1, 0, '[]', 1454588852),
(378, 28, 1, 0, '[]', 1454588885),
(379, 28, 1, 0, '[]', 1454588885),
(380, 28, 1, 0, '[]', 1454590143),
(381, 28, 1, 0, '[]', 1454590144),
(382, 28, 1, 0, '{"updated_data":{"first_name":"John Enrick","middle_name":"Retubado","last_name":"Plenos","email_detail":"plenosjohn@yahoo.com","username":"johnenrick","password":"","confirm_password":""}}', 1454590148),
(383, 28, 1, 0, '[]', 1454590159),
(384, 28, 1, 0, '[]', 1454590159),
(385, 28, 1, 0, '{"updated_data":{"first_name":"John Enrick","middle_name":"Retubado","last_name":"Plenos","email_detail":"plenosjohn@yahoo.com","username":"johnenrick","password":"","confirm_password":""}}', 1454590160),
(386, 28, 1, 0, '{"updated_data":{"first_name":"John Enrick","middle_name":"Retubado","last_name":"Plenos","email_detail":"plenosjohn@yahoo.com","username":"johnenrick","password":"","confirm_password":""}}', 1454590330),
(387, 28, 1, 0, '[]', 1454590357),
(388, 28, 1, 0, '[]', 1454590357),
(389, 28, 1, 0, '{"updated_data":{"first_name":"John Enrick","middle_name":"Retubado","last_name":"Plenos","email_detail":"plenosjohn@yahoo.com","username":"johnenrick","password":"","confirm_password":""}}', 1454590392),
(390, 28, 1, 0, '[]', 1454590407),
(391, 28, 1, 0, '[]', 1454590407),
(392, 28, 1, 0, '{"updated_data":{"first_name":"John Enrick","middle_name":"Retubado","last_name":"Plenos","email_detail":"plenosjohn@yahoo.com","username":"johnenrick","password":"","confirm_password":""}}', 1454590408),
(393, 28, 1, 0, '[]', 1454590422),
(394, 28, 1, 0, '[]', 1454590422),
(395, 28, 1, 0, '{"updated_data":{"first_name":"John Enrick","middle_name":"Retubado","last_name":"Plenos","email_detail":"plenosjohn@yahoo.com","username":"johnenrick","password":"","confirm_password":""}}', 1454590424),
(396, 28, 1, 0, '[]', 1454590458),
(397, 28, 1, 0, '[]', 1454590458),
(398, 28, 1, 0, '{"updated_data":{"first_name":"John Enrick","middle_name":"Retubado","last_name":"Plenos","email_detail":"plenosjohn@yahoo.com","username":"johnenrick","password":"","confirm_password":""}}', 1454590461),
(399, 28, 1, 0, '[]', 1454590472),
(400, 28, 1, 0, '[]', 1454590472),
(401, 28, 1, 0, '[]', 1454590491),
(402, 28, 1, 0, '[]', 1454590491),
(403, 28, 1, 0, '[]', 1454590512),
(404, 28, 1, 0, '[]', 1454590512),
(405, 28, 1, 0, '{"updated_data":{"first_name":"John Enrick","middle_name":"Retubado","last_name":"Plenos","contact_number_ID":"","password":"","confirm_password":""}}', 1454590515),
(406, 28, 1, 0, '{"updated_data":{"first_name":"John Enrick","middle_name":"Retubado","last_name":"Plenos","contact_number_ID":"","password":"","confirm_password":""}}', 1454590526),
(407, 28, 1, 0, '{"updated_data":{"first_name":"John Enrick","middle_name":"Retubado","last_name":"Plenos","contact_number_ID":"","password":"","confirm_password":""}}', 1454590531),
(408, 28, 1, 0, '[]', 1454590555),
(409, 28, 1, 0, '[]', 1454590555),
(410, 28, 1, 0, '{"updated_data":{"first_name":"John Enrick","middle_name":"Retubado","last_name":"Plenos","contact_number_ID":"","password":"","confirm_password":""}}', 1454590559),
(411, 28, 1, 0, '[]', 1454590586),
(412, 28, 1, 0, '[]', 1454590586),
(413, 28, 1, 0, '{"updated_data":{"first_name":"John Enrick","middle_name":"Retubado","last_name":"Plenos","contact_number_ID":"","password":"","confirm_password":""}}', 1454590595),
(414, 28, 1, 0, '[]', 1454590636),
(415, 28, 1, 0, '[]', 1454590636),
(416, 28, 1, 0, '{"updated_data":{"first_name":"John Enrick","middle_name":"Retubado","last_name":"Plenos","email_ID":"asdsad2@sd","contact_number_ID":"","contact_number_detail":"","username":"johnenrick","password":"","confirm_password":""}}', 1454590641),
(417, 28, 1, 0, '[]', 1454590673),
(418, 28, 1, 0, '[]', 1454590673),
(419, 28, 1, 0, '{"updated_data":{"first_name":"John Enrick","middle_name":"Retubado","last_name":"Plenos","0":"3","email_detail":"plenosjohn@yahoo.com","contact_number_ID":"","contact_number_detail":"","username":"johnenrick","password":"","confirm_password":""}}', 1454590676),
(420, 28, 1, 0, '[]', 1454590695),
(421, 28, 1, 0, '[]', 1454590695),
(422, 28, 1, 0, '{"updated_data":{"first_name":"John Enrick","middle_name":"Retubado","last_name":"Plenos","email_ID":"25","email_detail":"plenosjohn@yahoo.com","contact_number_ID":"","contact_number_detail":"","username":"johnenrick","password":"","confirm_password":""}}', 1454590696),
(423, 28, 1, 0, '[]', 1454590696),
(424, 28, 1, 0, '[]', 1454590776),
(425, 28, 1, 0, '[]', 1454590776),
(426, 28, 1, 0, '{"updated_data":{"first_name":"John Enrick","middle_name":"Retubado","last_name":"Plenos","email_ID":"25","contact_number_ID":"","contact_number_detail":"","username":"johnenrick","confirm_password":""}}', 1454590778),
(427, 28, 1, 0, '[]', 1454590815),
(428, 28, 1, 0, '[]', 1454590815),
(429, 28, 1, 0, '{"updated_data":{"first_name":"John Enrick","middle_name":"Retubado","last_name":"Plenos","email_detail":"plenosjohn@yahoo.com","contact_number_detail":"","username":"johnenrick","confirm_password":""}}', 1454590817),
(430, 28, 1, 0, '[]', 1454590878),
(431, 28, 1, 0, '[]', 1454590878),
(432, 28, 1, 0, '{"updated_data":{"first_name":"John Enrick","middle_name":"Retubado","last_name":"Plenos","email_detail":"plenosjohn@yahoo.com","contact_number_detail":"","username":"johnenrick","confirm_password":""}}', 1454590882),
(433, 28, 1, 0, '[]', 1454590882),
(434, 28, 1, 0, '[]', 1454590949),
(435, 28, 1, 0, '[]', 1454590949),
(436, 28, 1, 0, '{"updated_data":{"first_name":"John Enrick","middle_name":"Retubado","last_name":"Plenos","email_detail":"plenosjohn@yahoo.com","contact_number_detail":"","username":"johnenrick","confirm_password":""}}', 1454590951),
(437, 28, 1, 0, '[]', 1454590951),
(438, 28, 1, 0, '[]', 1454590963),
(439, 28, 1, 0, '[]', 1454590963),
(440, 28, 1, 0, '{"updated_data":{"first_name":"John Enrick","middle_name":"Retubado","last_name":"Plenos","email_detail":"plenosjohn@yahoo.com","contact_number_detail":"","username":"johnenrick","confirm_password":""}}', 1454590964),
(441, 28, 1, 0, '[]', 1454590964),
(442, 28, 1, 0, '[]', 1454591201),
(443, 28, 1, 0, '[]', 1454591201),
(444, 28, 1, 0, '{"updated_data":{"first_name":"John Enrick","middle_name":"Retubado","last_name":"Plenos","contact_number_ID":"","contact_number_detail":"","username":"johnenrick"}}', 1454591204),
(445, 28, 1, 0, '[]', 1454591204),
(446, 28, 1, 0, '[]', 1454591211),
(447, 28, 1, 0, '[]', 1454591211),
(448, 28, 1, 0, '{"updated_data":{"first_name":"John Enrick","middle_name":"Retubado","last_name":"Plenos","contact_number_ID":"","contact_number_detail":"","username":"johnenrick"}}', 1454591214),
(449, 28, 1, 0, '[]', 1454591214),
(450, 28, 1, 0, '[]', 1454591217),
(451, 28, 1, 0, '[]', 1454591217),
(452, 28, 1, 0, '{"updated_data":{"first_name":"John Enrick","middle_name":"Retubado","last_name":"Plenos","contact_number_ID":"","contact_number_detail":"","username":"johnenrick"}}', 1454591220),
(453, 28, 1, 0, '[]', 1454591220),
(454, 28, 1, 0, '{"updated_data":{"first_name":"John Enrick","middle_name":"Retubado","last_name":"Plenos","contact_number_ID":"","contact_number_detail":"","username":"johnenrick"}}', 1454591251),
(455, 28, 1, 0, '[]', 1454591251),
(456, 28, 1, 0, '{"updated_data":{"first_name":"John Enrick","middle_name":"Retubado","last_name":"Plenos","contact_number_ID":"","contact_number_detail":"","username":"johnenrick"}}', 1454591280),
(457, 28, 1, 0, '[]', 1454591280),
(458, 28, 1, 0, '{"updated_data":{"first_name":"John Enrick","middle_name":"Retubado","last_name":"Plenos","contact_number_ID":"","contact_number_detail":"","username":"johnenrick"}}', 1454591286),
(459, 28, 1, 0, '[]', 1454591286),
(460, 28, 1, 0, '{"updated_data":{"first_name":"John Enrick","middle_name":"Retubado","last_name":"Plenos","contact_number_ID":"","contact_number_detail":"","username":"johnenrick"}}', 1454591293),
(461, 28, 1, 0, '[]', 1454591294),
(462, 28, 1, 0, '[]', 1454591322),
(463, 28, 1, 0, '[]', 1454591322),
(464, 28, 1, 0, '{"updated_data":{"first_name":"John Enrick","middle_name":"Retubado","last_name":"Plenos","contact_number_ID":"","contact_number_detail":"","username":"johnenrick"}}', 1454591324),
(465, 28, 1, 0, '[]', 1454591324),
(466, 28, 1, 0, '[]', 1454591474),
(467, 28, 1, 0, '[]', 1454591474),
(468, 28, 1, 0, '{"updated_data":{"first_name":"John Enrick","middle_name":"Retubado","last_name":"Plenos","contact_number_ID":"","contact_number_detail":"","username":"johnenrick"}}', 1454591478),
(469, 28, 1, 0, '[]', 1454591478),
(470, 28, 1, 0, '[]', 1454591524),
(471, 28, 1, 0, '[]', 1454591525),
(472, 28, 1, 0, '{"updated_data":{"first_name":"John Enrick","middle_name":"Retubado","last_name":"Plenos","contact_number_ID":"","contact_number_detail":"","username":"johnenrick"}}', 1454591528),
(473, 28, 1, 0, '[]', 1454591528),
(474, 28, 1, 0, '[]', 1454591586),
(475, 28, 1, 0, '[]', 1454591586),
(476, 28, 1, 0, '{"updated_data":{"first_name":"John Enrick","middle_name":"Retubado","last_name":"Plenos","contact_number_ID":"","contact_number_detail":"","username":"johnenrick","password":"","confirm_password":""}}', 1454591587),
(477, 28, 1, 0, '[]', 1454591587),
(478, 28, 1, 0, '[]', 1454591609),
(479, 28, 1, 0, '[]', 1454591609),
(480, 28, 1, 0, '{"updated_data":{"first_name":"John Enrick","middle_name":"Retubado","last_name":"Plenos","email_ID":"25","email_detail":"plenosjohn@yahoo.com","contact_number_ID":"","contact_number_detail":"","username":"johnenrick","password":"","confirm_password":""}}', 1454591612),
(481, 28, 1, 0, '[]', 1454591612),
(482, 28, 1, 0, '[]', 1454591628),
(483, 28, 1, 0, '[]', 1454591628),
(484, 28, 1, 0, '{"updated_data":{"first_name":"John Enrick","middle_name":"Retubado","last_name":"Plenos","email_ID":"25","email_detail":"plenosjohn@yahoo.com","contact_number_ID":"","contact_number_detail":"","username":"johnenrick"}}', 1454591629),
(485, 28, 1, 0, '[]', 1454591629),
(486, 28, 1, 0, '[]', 1454591668),
(487, 28, 1, 0, '[]', 1454591668),
(488, 28, 1, 0, '{"updated_data":{"first_name":"John Enrick","middle_name":"Retubado","last_name":"Plenos","email_ID":"25","email_detail":"plenosjoshn@yahoo.com","contact_number_ID":"","contact_number_detail":"","username":"johnenrick"}}', 1454591671),
(489, 28, 1, 0, '[]', 1454591671),
(490, 28, 1, 0, '[]', 1454591708),
(491, 28, 1, 0, '[]', 1454591708),
(492, 28, 1, 0, '{"updated_data":{"first_name":"John Enrick","middle_name":"Retubado","last_name":"Plenos","contact_number_ID":"","contact_number_detail":"","username":"johnenrick"}}', 1454591718),
(493, 28, 1, 0, '[]', 1454591718),
(494, 28, 1, 0, '[]', 1454591722),
(495, 28, 1, 0, '[]', 1454591722),
(496, 28, 1, 0, '{"updated_data":{"first_name":"John Enrick","middle_name":"Retubado","last_name":"Plenos","email_ID":"25","email_detail":"plenosjohn@yahoo.com","contact_number_ID":"","contact_number_detail":"","username":"johnenrick"}}', 1454591725),
(497, 28, 1, 0, '[]', 1454591725),
(498, 28, 1, 0, '[]', 1454591727),
(499, 28, 1, 0, '[]', 1454591727),
(500, 28, 1, 0, '{"updated_data":{"first_name":"John Enrick","middle_name":"Retubado","last_name":"Plenos","contact_number_ID":"","contact_number_detail":"1254","username":"johnenrick"}}', 1454592054),
(501, 28, 1, 0, '[]', 1454592054),
(502, 28, 1, 0, '[]', 1454592095),
(503, 28, 1, 0, '[]', 1454592095),
(504, 28, 1, 0, '{"updated_data":{"first_name":"John Enrick","middle_name":"Retubado","last_name":"Plenos","contact_number_ID":"","contact_number_detail":"1232","username":"johnenrick"}}', 1454592099),
(505, 28, 1, 0, '[]', 1454592099),
(506, 28, 1, 0, '[]', 1454592194),
(507, 28, 1, 0, '[]', 1454592194),
(508, 28, 1, 0, '{"updated_data":{"first_name":"John Enrick","middle_name":"Retubado","last_name":"Plenos","contact_number_ID":"","contact_number_detail":"s","username":"johnenrick"}}', 1454592196),
(509, 28, 1, 0, '[]', 1454592197),
(510, 28, 1, 0, '[]', 1454592216),
(511, 28, 1, 0, '[]', 1454592216),
(512, 28, 1, 0, '{"updated_data":{"first_name":"John Enrick","middle_name":"Retubado","last_name":"Plenos","contact_number_ID":"","contact_number_detail":"2","username":"johnenrick"}}', 1454592218),
(513, 28, 1, 0, '[]', 1454592218),
(514, 28, 1, 0, '[]', 1454592233),
(515, 28, 1, 0, '[]', 1454592233),
(516, 28, 1, 0, '{"updated_data":{"first_name":"John Enrick","middle_name":"Retubado","last_name":"Plenos","contact_number_ID":"","contact_number_detail":"2","username":"johnenrick"}}', 1454592235),
(517, 28, 1, 0, '[]', 1454592235),
(518, 28, 1, 0, '[]', 1454592316),
(519, 28, 1, 0, '[]', 1454592316),
(520, 28, 1, 0, '[]', 1454592376),
(521, 28, 1, 0, '[]', 1454592376),
(522, 28, 1, 0, '[]', 1454592398),
(523, 28, 1, 0, '[]', 1454592398),
(524, 28, 1, 0, '{"updated_data":{"first_name":"John Enrick","middle_name":"Retubado","last_name":"Plenos","email_ID":"","email_detail":"plenosjohn@yahoo.com","contact_number_ID":"","contact_number_detail":"09275835504","username":"johnenrick"}}', 1454592408),
(525, 28, 1, 0, '[]', 1454592408),
(526, 28, 1, 0, '[]', 1454592463),
(527, 28, 1, 0, '[]', 1454592463),
(528, 28, 1, 0, '[]', 1454594169),
(529, 28, 1, 0, '[]', 1454594169),
(530, 28, 1, 0, '[]', 1454594197),
(531, 28, 1, 0, '[]', 1454594197),
(532, 28, 1, 0, '[]', 1454595658),
(533, 28, 1, 0, '[]', 1454595658),
(534, 28, 1, 0, '[]', 1454595692),
(535, 28, 1, 0, '[]', 1454595692),
(536, 28, 1, 0, '[]', 1454595701),
(537, 28, 1, 0, '[]', 1454595701),
(538, 28, 1, 0, '[]', 1454595824),
(539, 28, 1, 0, '[]', 1454595824),
(540, 28, 1, 0, '[]', 1454602100),
(541, 28, 1, 0, '[]', 1454602100),
(542, 28, 1, 0, '[]', 1454604777),
(543, 28, 1, 0, '[]', 1454604777),
(544, 28, 1, 0, '[]', 1454605243),
(545, 28, 1, 0, '[]', 1454605243),
(546, 28, 1, 0, '[]', 1454605321),
(547, 28, 1, 0, '[]', 1454605321),
(548, 28, 1, 0, '[]', 1454605338),
(549, 28, 1, 0, '[]', 1454605338),
(550, 28, 1, 0, '[]', 1454605399),
(551, 28, 1, 0, '[]', 1454605399),
(552, 28, 1, 0, '{"updated_data":{"first_name":"John Enrick","middle_name":"Retubado","last_name":"Plenos","contact_number_ID":"41","contact_number_detail":"09275835504","username":"johnenrick","acount_address_ID":"0","account_address_longitude":"","account_address_latitude":"","account_address_map_marker_ID":"0","account_address_description":"test"}}', 1454605404),
(553, 28, 1, 0, '[]', 1454605404),
(554, 28, 1, 0, '[]', 1454605407),
(555, 28, 1, 0, '[]', 1454605407),
(556, 28, 1, 0, '[]', 1454605448),
(557, 28, 1, 0, '[]', 1454605448),
(558, 28, 1, 0, '{"updated_data":{"first_name":"John Enrick","middle_name":"Retubado","last_name":"Plenos","contact_number_ID":"41","contact_number_detail":"09275835504","username":"johnenrick","acount_address_ID":"0","account_address_longitude":"","account_address_latitude":"","account_address_map_marker_ID":"0","account_address_description":"sa"}}', 1454605452),
(559, 28, 1, 0, '[]', 1454605452),
(560, 28, 1, 0, '[]', 1454605482),
(561, 28, 1, 0, '[]', 1454605482),
(562, 28, 1, 0, '{"updated_data":{"first_name":"John Enrick","middle_name":"Retubado","last_name":"Plenos","contact_number_ID":"41","contact_number_detail":"09275835504","username":"johnenrick","acount_address_ID":"0","account_address_longitude":"","account_address_latitude":"","account_address_map_marker_ID":"0","account_address_description":"s"}}', 1454605485),
(563, 28, 1, 0, '[]', 1454605485),
(564, 28, 1, 0, '[]', 1454605543),
(565, 28, 1, 0, '[]', 1454605543),
(566, 28, 1, 0, '{"updated_data":{"first_name":"John Enrick","middle_name":"Retubado","last_name":"Plenos","contact_number_ID":"41","contact_number_detail":"09275835504","username":"johnenrick","acount_address_ID":"0","account_address_longitude":"","account_address_latitude":"","account_address_map_marker_ID":"0","account_address_description":"3"}}', 1454605545),
(567, 28, 1, 0, '[]', 1454605546),
(568, 28, 1, 0, '{"updated_data":{"first_name":"John Enrick","middle_name":"Retubado","last_name":"Plenos","contact_number_ID":"41","contact_number_detail":"09275835504","username":"johnenrick","acount_address_ID":"0","account_address_longitude":"","account_address_latitude":"","account_address_map_marker_ID":"0","account_address_description":"3"}}', 1454606758),
(569, 28, 1, 0, '[]', 1454606758),
(570, 28, 1, 0, '{"updated_data":{"first_name":"John Enrick","middle_name":"Retubado","last_name":"Plenos","contact_number_ID":"41","contact_number_detail":"09275835504","username":"johnenrick","acount_address_ID":"0","account_address_longitude":"","account_address_latitude":"","account_address_map_marker_ID":"0","account_address_description":"3"}}', 1454606774),
(571, 28, 1, 0, '[]', 1454606774),
(572, 28, 1, 0, '[]', 1454606827),
(573, 28, 1, 0, '[]', 1454606827),
(574, 28, 1, 0, '{"updated_data":{"first_name":"John Enrick","middle_name":"Retubado","last_name":"Plenos","contact_number_ID":"41","contact_number_detail":"09275835504","username":"johnenrick","account_address_ID":"","account_address_longitude":"","account_address_latitude":"","account_address_map_marker_ID":"0","account_address_description":"s"}}', 1454606830),
(575, 28, 1, 0, '[]', 1454606830),
(576, 28, 1, 0, '[]', 1454606836),
(577, 28, 1, 0, '[]', 1454606836),
(578, 28, 1, 0, '[]', 1454606872),
(579, 28, 1, 0, '[]', 1454606872),
(580, 28, 1, 0, '{"updated_data":{"first_name":"John Enrick","middle_name":"Retubado","last_name":"Plenos","contact_number_ID":"41","contact_number_detail":"09275835504","username":"johnenrick","account_address_ID":"","account_address_longitude":"0","account_address_latitude":"0","account_address_map_marker_ID":"4","account_address_description":"s"}}', 1454606878),
(581, 28, 1, 0, '[]', 1454606878),
(582, 28, 1, 0, '{"updated_data":{"first_name":"John Enrick","middle_name":"Retubado","last_name":"Plenos","contact_number_ID":"41","contact_number_detail":"09275835504","username":"johnenrick","account_address_ID":"","account_address_longitude":"0","account_address_latitude":"0","account_address_map_marker_ID":"4","account_address_description":"s"}}', 1454606885),
(583, 28, 1, 0, '[]', 1454606885),
(584, 28, 1, 0, '[]', 1454606950),
(585, 28, 1, 0, '[]', 1454606950),
(586, 28, 1, 0, '{"updated_data":{"first_name":"John Enrick","middle_name":"Retubado","last_name":"Plenos","contact_number_ID":"41","contact_number_detail":"09275835504","username":"johnenrick","account_address_ID":"2","account_address_longitude":"0","account_address_latitude":"0","account_address_map_marker_ID":"4","account_address_description":"s2"}}', 1454607000),
(587, 28, 1, 0, '[]', 1454607000),
(588, 28, 1, 0, '{"updated_data":{"first_name":"John Enrick","middle_name":"Retubado","last_name":"Plenos","contact_number_ID":"41","contact_number_detail":"09275835504","username":"johnenrick","account_address_ID":"2","account_address_longitude":"0","account_address_latitude":"0","account_address_map_marker_ID":"4","account_address_description":"s2ss"}}', 1454607007),
(589, 28, 1, 0, '[]', 1454607007),
(590, 28, 1, 0, '[]', 1454607018),
(591, 28, 1, 0, '[]', 1454607018),
(592, 28, 1, 0, '[]', 1454607091),
(593, 28, 1, 0, '[]', 1454607091),
(594, 28, 1, 0, '[]', 1454610776),
(595, 28, 1, 0, '[]', 1454610776),
(596, 28, 1, 0, '{"updated_data":{"first_name":"John Enrick","middle_name":"Retubado","last_name":"Plenos","contact_number_ID":"41","contact_number_detail":"09275835504","username":"johnenrick","account_address_ID":"2","account_address_longitude":"0","account_address_latitude":"0","account_address_map_marker_ID":"4","account_address_description":"s2ss"}}', 1454610778),
(597, 28, 1, 0, '[]', 1454610778),
(598, 28, 1, 0, '{"updated_data":{"first_name":"John Enrick","middle_name":"Retubado","last_name":"Plenos","email_ID":"40","email_detail":"plenosj2ohn@yahoo.com","contact_number_ID":"41","contact_number_detail":"09275835504","username":"johnenrick","account_address_ID":"2","account_address_longitude":"0","account_address_latitude":"0","account_address_map_marker_ID":"4","account_address_description":"s2ss2"}}', 1454610787),
(599, 28, 1, 0, '[]', 1454610787),
(600, 28, 1, 0, '{"updated_data":{"first_name":"John Enrick","middle_name":"Retubado","last_name":"Plenos","contact_number_ID":"41","contact_number_detail":"09275835504","username":"johnenrick","password":"johnenrick","confirm_password":"johnenrick","account_address_ID":"2","account_address_longitude":"0","account_address_latitude":"0","account_address_map_marker_ID":"4","account_address_description":"s2ss2"}}', 1454610800),
(601, 28, 1, 0, '[]', 1454610800),
(602, 28, 1, 0, '{"updated_data":{"first_name":"John Enrick","middle_name":"Retubado","last_name":"Plenos","contact_number_ID":"41","contact_number_detail":"09275835504","username":"johnenrick","password":"johnenrick1","confirm_password":"johnenrick1","account_address_ID":"2","account_address_longitude":"0","account_address_latitude":"0","account_address_map_marker_ID":"4","account_address_description":"s2ss2"}}', 1454610810),
(603, 28, 1, 0, '[]', 1454610810),
(604, 28, 1, 0, '{"updated_data":{"first_name":"John Enrick","middle_name":"Retubado","last_name":"Plenos","contact_number_ID":"41","contact_number_detail":"09275835504","username":"johnenrick","password":"johnenrick","confirm_password":"johnenrick","account_address_ID":"2","account_address_longitude":"0","account_address_latitude":"0","account_address_map_marker_ID":"4","account_address_description":"s2ss2"}}', 1454610816),
(605, 28, 1, 0, '[]', 1454610816),
(606, 28, 1, 0, '[]', 1454610854),
(607, 28, 1, 0, '[]', 1454610854),
(608, 28, 1, 0, '[]', 1454611053),
(609, 28, 1, 0, '[]', 1454611053),
(610, 28, 1, 0, '[]', 1454611116),
(611, 28, 1, 0, '[]', 1454611372),
(612, 28, 1, 0, '[]', 1454650176),
(613, 28, 1, 0, '[]', 1454650176),
(614, 28, 1, 0, '[]', 1454650193),
(615, 28, 1, 0, '[]', 1454651427),
(616, 28, 1, 0, '[]', 1454657987),
(617, 28, 1, 0, '[]', 1454657988),
(618, 28, 1, 0, '[]', 1454664993),
(619, 28, 1, 0, '[]', 1454664993),
(620, 28, 1, 0, '[]', 1454664995),
(621, 28, 1, 0, '[]', 1454665581),
(622, 28, 1, 0, '[]', 1454770348),
(623, 28, 1, 0, '[]', 1454770348),
(624, 28, 1, 0, '[]', 1454771950),
(625, 28, 1, 0, '[]', 1454771950),
(626, 28, 1, 0, '[]', 1454772352),
(627, 28, 1, 0, '[]', 1454772353),
(628, 28, 1, 0, '{"updated_data":{"first_name":"John Enrick","middle_name":"Retubado","last_name":"Plenos","contact_number_ID":"41","contact_number_detail":"09275835504","username":"johnenrick","account_address_ID":"2","account_address_longitude":"0","account_address_latitude":"0","account_address_map_marker_ID":"4","account_address_description":"s2ss2"}}', 1454772355),
(629, 28, 1, 0, '[]', 1454772355),
(630, 28, 1, 0, '[]', 1454772360),
(631, 28, 1, 0, '[]', 1454772360),
(632, 28, 1, 0, '{"updated_data":{"first_name":"John Enricks","middle_name":"Retubados","last_name":"Plenoss","email_ID":"40","email_detail":"plenosj2ohn@yahoo.coms","contact_number_ID":"41","contact_number_detail":"09275835504s","username":"johnenricks","account_address_ID":"2","account_address_longitude":"0","account_address_latitude":"0","account_address_map_marker_ID":"4","account_address_description":"s2ss2"}}', 1454772367),
(633, 28, 1, 0, '[]', 1454772367),
(634, 28, 1, 0, '[]', 1454772369),
(635, 28, 1, 0, '[]', 1454772369),
(636, 28, 1, 0, '{"updated_data":{"first_name":"John Enrick","middle_name":"Retubado","last_name":"Plenos","email_ID":"40","email_detail":"plenosj2ohn@yahoo.com","contact_number_ID":"41","contact_number_detail":"09275835504","username":"johnenrick","account_address_ID":"2","account_address_longitude":"0","account_address_latitude":"0","account_address_map_marker_ID":"4","account_address_description":"s2ss2"}}', 1454772382),
(637, 28, 1, 0, '[]', 1454772382),
(638, 28, 1, 0, '[]', 1454772383),
(639, 28, 1, 0, '[]', 1454772383),
(640, 28, 1, 0, '[]', 1454772820),
(641, 28, 1, 0, '[]', 1454772820),
(642, 28, 1, 0, '{"updated_data":{"first_name":"John Enrick","middle_name":"Retubado","last_name":"Plenos","email_ID":"40","email_detail":"plenosjohn@yahoo.com","contact_number_ID":"41","contact_number_detail":"09275835504","username":"johnenrick","account_address_ID":"2","account_address_longitude":"0","account_address_latitude":"0","account_address_map_marker_ID":"4","account_address_description":"s2ss2"}}', 1454772823),
(643, 28, 1, 0, '[]', 1454772823),
(644, 28, 1, 0, '[]', 1454776455),
(645, 28, 1, 0, '[]', 1454776456),
(646, 28, 1, 0, '{"updated_data":{"first_name":"John Enrick","middle_name":"Retubado","last_name":"Plenos","contact_number_ID":"41","contact_number_detail":"09275835504","username":"johnenrick","password":"johnenrick1","confirm_password":"johnenrick1","account_address_ID":"2","account_address_longitude":"0","account_address_latitude":"0","account_address_map_marker_ID":"4","account_address_description":"s2ss2"}}', 1454776471),
(647, 28, 1, 0, '[]', 1454776471),
(648, 0, 1, 0, '29', 1454782323),
(649, 29, 1, 0, '[]', 1454782567),
(650, 29, 1, 0, '[]', 1454782567),
(651, 29, 1, 0, '[]', 1454782582),
(652, 29, 1, 0, '[]', 1454782582),
(653, 29, 1, 0, '[]', 1454783048),
(654, 29, 1, 0, '[]', 1454787562),
(655, 29, 1, 0, '[]', 1454787562),
(656, 29, 1, 0, '[]', 1454787658),
(657, 29, 1, 0, '[]', 1454787658),
(658, 29, 1, 0, '[]', 1454787677),
(659, 29, 1, 0, '[]', 1454787677),
(660, 29, 1, 0, '[]', 1454788045),
(661, 29, 1, 0, '[]', 1454788045),
(662, 29, 1, 0, '[]', 1454793748),
(663, 29, 1, 0, '[]', 1454793748),
(664, 29, 1, 0, '[]', 1454793915),
(665, 29, 1, 0, '[]', 1454793915),
(666, 29, 1, 0, '[]', 1454793956),
(667, 29, 1, 0, '[]', 1454793957),
(668, 29, 1, 0, '[]', 1454793975),
(669, 29, 1, 0, '[]', 1454793975),
(670, 29, 1, 0, '[]', 1454794001),
(671, 29, 1, 0, '[]', 1454794001),
(672, 29, 1, 0, '[]', 1454794099),
(673, 29, 1, 0, '[]', 1454794100),
(674, 29, 1, 0, '[]', 1454794141),
(675, 29, 1, 0, '[]', 1454794141),
(676, 29, 1, 0, '[]', 1454794143),
(677, 29, 1, 0, '[]', 1454794143),
(678, 28, 1, 0, '[]', 1454828318),
(679, 28, 1, 0, '[]', 1454828318),
(680, 28, 1, 0, '[]', 1454828374),
(681, 28, 1, 0, '[]', 1454828550),
(682, 28, 1, 0, '[]', 1454828550),
(683, 28, 1, 0, '[]', 1454828888),
(684, 28, 1, 0, '[]', 1454828888),
(685, 28, 1, 0, '[]', 1454828912),
(686, 28, 1, 0, '[]', 1454828912),
(687, 28, 1, 0, '[]', 1454829248),
(688, 28, 1, 0, '[]', 1454829249),
(689, 28, 1, 0, '[]', 1454829255),
(690, 28, 1, 0, '[]', 1454829256),
(691, 28, 1, 0, '[]', 1454829325),
(692, 28, 1, 0, '[]', 1454829325),
(693, 28, 1, 0, '[]', 1454829335),
(694, 28, 1, 0, '[]', 1454829390),
(695, 28, 1, 0, '[]', 1454829475),
(696, 28, 1, 0, '[]', 1454829475),
(697, 28, 1, 0, '[]', 1454829484),
(698, 28, 1, 0, '[]', 1454829484),
(699, 28, 1, 0, '[]', 1454829490),
(700, 28, 1, 0, '[]', 1454829491),
(701, 28, 1, 0, '[]', 1454829502),
(702, 28, 1, 0, '[]', 1454829503),
(703, 28, 1, 0, '[]', 1454829534),
(704, 28, 1, 0, '[]', 1454829534),
(705, 28, 1, 0, '[]', 1454829555),
(706, 28, 1, 0, '[]', 1454829556),
(707, 28, 1, 0, '[]', 1454829563),
(708, 28, 1, 0, '[]', 1454829563),
(709, 28, 1, 0, '{"updated_data":{"first_name":"sJohn Enrick","middle_name":"Retubado","last_name":"Plenos","contact_number_ID":"41","contact_number_detail":"09275835504","username":"johnenrick","account_address_ID":"2","account_address_longitude":"0","account_address_latitude":"0","account_address_map_marker_ID":"4","account_address_description":"s2ss2"}}', 1454829570),
(710, 28, 1, 0, '[]', 1454829571),
(711, 28, 1, 0, '[]', 1454829713),
(712, 28, 1, 0, '[]', 1454829714),
(713, 28, 1, 0, '{"updated_data":{"first_name":"John Enrick","middle_name":"Retubado","last_name":"Plenos","contact_number_ID":"41","contact_number_detail":"09275835504","username":"johnenrick","account_address_ID":"2","account_address_longitude":"0","account_address_latitude":"0","account_address_map_marker_ID":"4","account_address_description":"s2ss2"}}', 1454829720),
(714, 28, 1, 0, '[]', 1454829721),
(715, 28, 1, 0, '[]', 1454829722),
(716, 28, 1, 0, '[]', 1454829723),
(717, 28, 1, 0, '[]', 1454830002),
(718, 28, 1, 0, '[]', 1454830002),
(719, 28, 1, 0, '{"updated_data":{"first_name":"sJohn Enrick","middle_name":"Retubado","last_name":"Plenos","contact_number_ID":"41","contact_number_detail":"09275835504","username":"johnenrick","account_address_ID":"2","account_address_longitude":"0","account_address_latitude":"0","account_address_map_marker_ID":"4","account_address_description":"s2ss2"}}', 1454830175),
(720, 28, 1, 0, '[]', 1454830175),
(721, 28, 1, 0, '[]', 1454830223),
(722, 28, 1, 0, '[]', 1454830224),
(723, 28, 1, 0, '{"updated_data":{"first_name":"John Enrick","middle_name":"Retubado","last_name":"Plenos","contact_number_ID":"41","contact_number_detail":"09275835504","username":"johnenrick","account_address_ID":"2","account_address_longitude":"0","account_address_latitude":"0","account_address_map_marker_ID":"4","account_address_description":"s2ss2"}}', 1454830231),
(724, 28, 1, 0, '[]', 1454830232),
(725, 28, 1, 0, '[]', 1454830329),
(726, 28, 1, 0, '[]', 1454830330),
(727, 28, 1, 0, '[]', 1454830347),
(728, 28, 1, 0, '[]', 1454830348),
(729, 28, 1, 0, '{"updated_data":{"first_name":"dJohn Enrick","middle_name":"Retubado","last_name":"Plenos","contact_number_ID":"41","contact_number_detail":"09275835504","username":"johnenrick","account_address_ID":"2","account_address_longitude":"0","account_address_latitude":"0","account_address_map_marker_ID":"4","account_address_description":"s2ss2"}}', 1454830358),
(730, 28, 1, 0, '[]', 1454830359),
(731, 28, 1, 0, '{"updated_data":{"first_name":"John Enrick","middle_name":"Retubado","last_name":"Plenos","contact_number_ID":"41","contact_number_detail":"09275835504","username":"johnenrick","account_address_ID":"2","account_address_longitude":"0","account_address_latitude":"0","account_address_map_marker_ID":"4","account_address_description":"s2ss2"}}', 1454830375),
(732, 28, 1, 0, '[]', 1454830376),
(733, 28, 1, 0, '[]', 1454830510),
(734, 28, 1, 0, '[]', 1454830511),
(735, 28, 1, 0, '{"updated_data":{"first_name":"John Enrick","middle_name":"Retubado","last_name":"Plenos","contact_number_ID":"41","contact_number_detail":"09275835504","username":"johnenrick","account_address_ID":"2","account_address_longitude":"0","account_address_latitude":"0","account_address_map_marker_ID":"4","account_address_description":"s2ss2"}}', 1454830518);
INSERT INTO `action_log` (`ID`, `account_ID`, `api_controller_ID`, `access_number_ID`, `detail`, `datetime`) VALUES
(736, 28, 1, 0, '[]', 1454830519),
(737, 28, 1, 0, '[]', 1454830700),
(738, 28, 1, 0, '[]', 1454830701),
(739, 28, 1, 0, '{"updated_data":{"first_name":"John Enrick","middle_name":"Retubado","last_name":"Plenos","contact_number_ID":"41","contact_number_detail":"09275835504","username":"johnenrick","account_address_ID":"2","account_address_longitude":"0","account_address_latitude":"0","account_address_map_marker_ID":"4","account_address_description":"s2ss2"}}', 1454830708),
(740, 28, 1, 0, '[]', 1454830709),
(741, 28, 1, 0, '{"updated_data":{"first_name":"John Enricks","middle_name":"Retubados","last_name":"Plenoss","contact_number_ID":"41","contact_number_detail":"09275835504","username":"johnenrick","account_address_ID":"2","account_address_longitude":"0","account_address_latitude":"0","account_address_map_marker_ID":"4","account_address_description":"s2ss2"}}', 1454830720),
(742, 28, 1, 0, '[]', 1454830721),
(743, 29, 1, 0, '[]', 1454847679),
(744, 29, 1, 0, '[]', 1454847679),
(745, 29, 1, 0, '[]', 1454847759),
(746, 29, 1, 0, '[]', 1454847759),
(747, 29, 1, 0, '[]', 1454847783),
(748, 29, 1, 0, '[]', 1454847783),
(749, 29, 1, 0, '[]', 1454847797),
(750, 29, 1, 0, '[]', 1454847797),
(751, 29, 1, 0, '[]', 1454847821),
(752, 29, 1, 0, '[]', 1454847821),
(753, 29, 1, 0, '[]', 1454847851),
(754, 29, 1, 0, '[]', 1454847852),
(755, 29, 1, 0, '[]', 1454847888),
(756, 29, 1, 0, '[]', 1454847888),
(757, 29, 1, 0, '[]', 1454847896),
(758, 29, 1, 0, '[]', 1454847896),
(759, 29, 1, 0, '[]', 1454847904),
(760, 29, 1, 0, '[]', 1454847904),
(761, 29, 1, 0, '[]', 1454847928),
(762, 29, 1, 0, '[]', 1454847928),
(763, 29, 1, 0, '[]', 1454847932),
(764, 29, 1, 0, '[]', 1454847933),
(765, 29, 1, 0, '[]', 1454847991),
(766, 29, 1, 0, '[]', 1454847991),
(767, 29, 1, 0, '[]', 1454848417),
(768, 29, 1, 0, '[]', 1454848417),
(769, 28, 1, 0, '[]', 1454897816),
(770, 28, 1, 0, '[]', 1454897816),
(771, 28, 1, 0, '[]', 1454897818),
(772, 28, 1, 0, '[]', 1454897835),
(773, 28, 1, 0, '[]', 1454898770),
(774, 28, 1, 0, '[]', 1454898790),
(775, 28, 1, 0, '[]', 1454898792),
(776, 28, 1, 0, '[]', 1454898800),
(777, 28, 1, 0, '[]', 1454898804),
(778, 28, 1, 0, '[]', 1454917392),
(779, 28, 1, 0, '[]', 1454917393),
(780, 28, 1, 0, '[]', 1454917397),
(781, 28, 1, 0, '[]', 1454917428),
(782, 28, 1, 0, '[]', 1454917428),
(783, 28, 1, 0, '[]', 1454919378),
(784, 28, 1, 0, '[]', 1454919401),
(785, 28, 1, 0, '[]', 1454935566),
(786, 28, 1, 0, '[]', 1454935566),
(787, 28, 1, 0, '[]', 1454935579),
(788, 28, 1, 0, '[]', 1454935665),
(789, 28, 1, 0, '[]', 1454935665),
(790, 28, 1, 0, '[]', 1454935684),
(791, 28, 1, 0, '[]', 1454935684),
(792, 28, 1, 0, '[]', 1454935710),
(793, 28, 1, 0, '[]', 1454935710),
(794, 28, 1, 0, '[]', 1454935951),
(795, 28, 1, 0, '[]', 1454936095),
(796, 28, 1, 0, '[]', 1454936161),
(797, 28, 1, 0, '[]', 1454936178),
(798, 28, 1, 0, '[]', 1454936258),
(799, 28, 1, 0, '[]', 1454936369),
(800, 28, 1, 0, '[]', 1454936704),
(801, 28, 1, 0, '[]', 1454936722),
(802, 28, 1, 0, '[]', 1454936738),
(803, 28, 1, 0, '[]', 1454936782),
(804, 28, 1, 0, '[]', 1454937000),
(805, 28, 1, 0, '[]', 1454937048),
(806, 28, 1, 0, '[]', 1454937093),
(807, 28, 1, 0, '[]', 1454937125),
(808, 28, 1, 0, '[]', 1454937158),
(809, 28, 1, 0, '[]', 1454937408),
(810, 28, 1, 0, '[]', 1454937425),
(811, 28, 1, 0, '{"like__first_name":"","test":"1","limit":"20"}', 1454937460),
(812, 28, 1, 0, '{"like__first_name":"","test":"1","limit":"20"}', 1454937484),
(813, 28, 1, 0, '{"like__first_name":"","test":"1","limit":"20"}', 1454937635),
(814, 28, 1, 0, '{"like__first_name":"a","test":"1","limit":"20"}', 1454937644),
(815, 28, 1, 0, '{"like__first_name":"a","test":"1","limit":"20"}', 1454937648),
(816, 28, 1, 0, '{"condition":{"like__first_name":"s","test":"1"},"limit":"20"}', 1454937713),
(817, 28, 1, 0, '{"condition":{"like__first_name":"","test":"1"},"limit":"20"}', 1454937828),
(818, 28, 1, 0, '{"condition":{"like__first_name":"","test":"1"},"limit":"20"}', 1454937913),
(819, 28, 1, 0, '{"condition":{"like__first_name":"a","test":"1"},"limit":"20"}', 1454938762),
(820, 28, 1, 0, '{"condition":{"like__first_name":"ds","test":"1"},"limit":"20"}', 1454938795),
(821, 28, 1, 0, '{"condition":{"like__first_name":"ds","test":"1"},"limit":"20"}', 1454938836),
(822, 28, 1, 0, '{"condition":{"like__first_name":"ds","test":"1"},"limit":"20"}', 1454938931),
(823, 28, 1, 0, '{"condition":{"like__first_name":"sdsad","test":"1"},"limit":"20"}', 1454938945),
(824, 28, 1, 0, '{"condition":{"like__account_basic_information__first_name":"","test":"1"},"limit":"20"}', 1454938975),
(825, 28, 1, 0, '{"condition":{"like__account_basic_information__first_name":"asd","test":"1"},"limit":"20"}', 1454938977),
(826, 28, 1, 0, '{"like__account_basic_information__first_name":"asd"}', 1454939022),
(827, 28, 1, 0, '{"like__account_basic_information__first_name":"asd"}', 1454939050),
(828, 28, 1, 0, '{"like__account_basic_information__first_name":"asd"}', 1454939064),
(829, 28, 1, 0, '{"like__account_basic_information__first_name":"asd"}', 1454939075),
(830, 28, 1, 0, '{"like__account_basic_information__first_name":"asd"}', 1454939089),
(831, 28, 1, 0, '{"condition":{"like__account_basic_information__first_name":"asd"}}', 1454939138),
(832, 28, 1, 0, '{"condition":{"like__account_basic_information__first_name":"asd"}}', 1454939159),
(833, 28, 1, 0, '{"condition":{"like__account_basic_information__first_name":"asd"}}', 1454939172),
(834, 28, 1, 0, '{"condition":{"like__account_basic_information__first_name":"asd"}}', 1454939199),
(835, 28, 1, 0, '{"condition":{"like__account_basic_information__first_name":"asd"}}', 1454939209),
(836, 28, 1, 0, '{"condition":{"like__account_basic_information__first_name":"asd"}}', 1454939223),
(837, 28, 1, 0, '{"condition":{"like__account_basic_information__first_name":"asd"}}', 1454939250),
(838, 28, 1, 0, '{"condition":{"like__account_basic_information__first_name":"asd"}}', 1454939256),
(839, 28, 1, 0, '{"condition":{"like__account_basic_information__first_name":"asd"}}', 1454939265),
(840, 28, 1, 0, '{"condition":{"like__account_basic_information__first_name":"asd"}}', 1454939281),
(841, 28, 1, 0, '{"condition":{"like__account_basic_information__first_name":"jo"}}', 1454939314),
(842, 28, 1, 0, '{"condition":{"like__account_basic_information__first_name":"h"}}', 1454939324),
(843, 28, 1, 0, '{"condition":{"like__account_basic_information__first_name":"he"}}', 1454939337),
(844, 28, 1, 0, '{"condition":{"like__first_name":"he"}}', 1454939353),
(845, 28, 1, 0, '{"condition":{"like__account_basic_information__first_name":"","test":"1"},"limit":"20"}', 1454939410),
(846, 28, 1, 0, '{"condition":{"like__account_basic_information__first_name":"s","test":"1"},"limit":"20"}', 1454939414),
(847, 0, 1, 0, '[]', 1454948313),
(848, 0, 1, 0, '[]', 1454948313),
(849, 28, 1, 0, '[]', 1454950279),
(850, 28, 1, 0, '[]', 1454950279),
(851, 28, 1, 0, '[]', 1454950356),
(852, 28, 1, 0, '[]', 1454950356),
(853, 28, 1, 0, '[]', 1454950376),
(854, 28, 1, 0, '[]', 1454950376),
(855, 28, 1, 0, '[]', 1454950387),
(856, 28, 1, 0, '[]', 1454950387),
(857, 28, 1, 0, '{"condition":{"like__account_basic_information__first_name":"","test":"1"},"limit":"20","offset":"0"}', 1454950540),
(858, 28, 1, 0, '{"condition":{"like__account_basic_information__first_name":"","test":"1"},"limit":"20","offset":"NaN"}', 1454950664),
(859, 28, 1, 0, '{"condition":{"like__account_basic_information__first_name":"","test":"1"},"limit":"20","offset":"NaN"}', 1454950695),
(860, 28, 1, 0, '{"condition":{"like__account_basic_information__first_name":"","test":"1"},"limit":"20","offset":"NaN"}', 1454950812),
(861, 29, 1, 0, '[]', 1455110093),
(862, 29, 1, 0, '[]', 1455110093),
(863, 29, 1, 0, '[]', 1455110139),
(864, 29, 1, 0, '[]', 1455110139),
(865, 29, 1, 0, '[]', 1455110139),
(866, 29, 1, 0, '[]', 1455110144),
(867, 29, 1, 0, '[]', 1455110144),
(868, 29, 1, 0, '[]', 1455110170),
(869, 29, 1, 0, '[]', 1455110170),
(870, 29, 1, 0, '[]', 1455110170),
(871, 29, 1, 0, '[]', 1455110174),
(872, 29, 1, 0, '[]', 1455110174),
(873, 29, 1, 0, '[]', 1455110174),
(874, 29, 1, 0, '[]', 1455110210),
(875, 29, 1, 0, '[]', 1455110210),
(876, 29, 1, 0, '[]', 1455110210),
(877, 29, 1, 0, '[]', 1455110216),
(878, 29, 1, 0, '[]', 1455110216),
(879, 29, 1, 0, '[]', 1455110216),
(880, 29, 1, 0, '[]', 1455110279),
(881, 29, 1, 0, '[]', 1455110280),
(882, 29, 1, 0, '[]', 1455110280),
(883, 28, 1, 0, '[]', 1455110338),
(884, 28, 1, 0, '[]', 1455110338),
(885, 28, 1, 0, '[]', 1455110427),
(886, 28, 1, 0, '[]', 1455110427),
(887, 28, 1, 0, '{"condition":{"like__account_basic_information__first_name__plus__middle_name__plus__last_name":"","test":"1"},"limit":"20","offset":"0"}', 1455112162),
(888, 28, 1, 0, '{"condition":{"like__account_basic_information__first_name__plus__middle_name__plus__last_name":"jo pl","test":"1"},"limit":"20","offset":"0"}', 1455112174),
(889, 28, 1, 0, '{"condition":{"like__account_basic_information__first_name__plus__middle_name__plus__last_name":"jo pl","test":"1"},"limit":"20","offset":"0"}', 1455112177),
(890, 28, 1, 0, '{"condition":{"like__account_basic_information__first_name__plus__middle_name__plus__last_name":"jo pl","test":"1"},"limit":"20","offset":"0"}', 1455112251),
(891, 28, 1, 0, '{"condition":{"like__account_basic_information__first_name__plus__middle_name__plus__last_name":"he"}}', 1455112284),
(892, 28, 1, 0, '{"condition":{"like__account_basic_information__first_name__plus__middle_name__plus__last_name":"he"}}', 1455112298),
(893, 28, 1, 0, '{"condition":{"like__account_basic_information__first_name__plus__middle_name__plus__last_name":"he"}}', 1455113639),
(894, 28, 1, 0, '{"condition":{"like__account_basic_information__first_name__plus__middle_name__plus__last_name":"he"}}', 1455113772),
(895, 28, 1, 0, '{"condition":{"like__account_basic_information__first_name__plus__middle_name__plus__last_name":"he"}}', 1455113799),
(896, 28, 1, 0, '{"condition":{"like__account_basic_information__first_name__plus__middle_name__plus__last_name":"he"}}', 1455113812),
(897, 28, 1, 0, '{"condition":{"like__account_basic_information__first_name__plus__middle_name__plus__last_name":"he"}}', 1455113854),
(898, 28, 1, 0, '{"condition":{"like__account_basic_information__first_name__plus__middle_name__plus__last_name":"he"}}', 1455113886),
(899, 28, 1, 0, '{"condition":{"like__account_basic_information__first_name__plus__middle_name__plus__last_name":"he"}}', 1455113911),
(900, 28, 1, 0, '{"condition":{"like__account_basic_information__first_name__plus__middle_name__plus__last_name":"he"}}', 1455113991),
(901, 28, 1, 0, '{"condition":{"like__account_basic_information__first_name__plus__middle_name__plus__last_name":"he"}}', 1455114003),
(902, 28, 1, 0, '{"condition":{"like__account_basic_information__first_name__plus__middle_name__plus__last_name":"he"}}', 1455114240),
(903, 28, 1, 0, '{"condition":{"account_basic_information__first_name__plus__middle_name__plus__last_name":"he"}}', 1455114252),
(904, 28, 1, 0, '{"condition":{"account_basic_information__first_name__plus__middle_name__plus__last_name":"he"}}', 1455114282),
(905, 28, 1, 0, '{"condition":{"account_basic_information__first_name__plus__middle_name__plus__last_name":"he"}}', 1455114294),
(906, 28, 1, 0, '{"condition":{"account_basic_information__first_name__plus__middle_name__plus__last_name":"he"}}', 1455114329),
(907, 28, 1, 0, '{"condition":{"account_basic_information__first_name__plus__middle_name__plus__last_name":"he"}}', 1455114336),
(908, 28, 1, 0, '{"condition":{"account_basic_information__first_name__plus__middle_name__plus__last_name":"he"}}', 1455114346),
(909, 28, 1, 0, '{"condition":{"account_basic_information__first_name__plus__middle_name__plus__last_name":"he"}}', 1455114377),
(910, 28, 1, 0, '{"condition":{"account_basic_information__first_name__plus__middle_name__plus__last_name":"he"}}', 1455114487),
(911, 28, 1, 0, '{"condition":{"account_basic_information__first_name__plus__middle_name__plus__last_name":"he"}}', 1455114501),
(912, 28, 1, 0, '{"condition":{"account_basic_information__first_name__plus__middle_name__plus__last_name":"he"}}', 1455114508),
(913, 28, 1, 0, '{"condition":{"account_basic_information__first_name__plus__middle_name__plus__last_name":"he"}}', 1455114517),
(914, 28, 1, 0, '{"condition":{"account_basic_information__first_name__plus__middle_name__plus__last_name":"he"}}', 1455114566),
(915, 28, 1, 0, '{"condition":{"account_basic_information__first_name__plus__middle_name__plus__last_name":"he"}}', 1455114719),
(916, 28, 1, 0, '{"condition":{"account_basic_information__first_name__plus__account_basic_information__middle_name__plus__account_basic_information__last_name":"he"}}', 1455114793),
(917, 28, 1, 0, '{"condition":{"account_basic_information__first_name__plus__account_basic_information__middle_name__plus__account_basic_information__last_name":"he"}}', 1455114802),
(918, 28, 1, 0, '{"condition":{"account_basic_information__first_name__plus__account_basic_information__middle_name__plus__account_basic_information__last_name":"he"}}', 1455114824),
(919, 28, 1, 0, '{"condition":{"account_basic_information__first_name__plus__account_basic_information__middle_name__plus__account_basic_information__last_name":"he"}}', 1455114846),
(920, 28, 1, 0, '{"condition":{"account_basic_information__first_name__plus__account_basic_information__middle_name__plus__account_basic_information__last_name":"he"}}', 1455114853),
(921, 28, 1, 0, '{"condition":{"account_basic_information__first_name__plus__account_basic_information__middle_name__plus__account_basic_information__last_name":"he"}}', 1455114871),
(922, 28, 1, 0, '{"condition":{"like__account_basic_information__first_name__plus__account_basic_information__middle_name__plus__account_basic_information__last_name":"he"}}', 1455114952),
(923, 28, 1, 0, '{"condition":{"like__account_basic_information__first_name__plus__account_basic_information__middle_name__plus__account_basic_information__last_name":"he"}}', 1455114964),
(924, 28, 1, 0, '{"condition":{"like__account_basic_information__first_name__plus__account_basic_information__middle_name__plus__account_basic_information__last_name":"he"}}', 1455114981),
(925, 28, 1, 0, '{"condition":{"like__account_basic_information__first_name__plus__account_basic_information__middle_name__plus__account_basic_information__last_name":"he"}}', 1455114991),
(926, 28, 1, 0, '{"condition":{"like__account_basic_information__first_name__plus__account_basic_information__middle_name__plus__account_basic_information__last_name":"he"}}', 1455123237),
(927, 28, 1, 0, '{"condition":{"like__account_basic_information__first_name__plus__account_basic_information__middle_name__plus__account_basic_information__last_name":"he"}}', 1455123409),
(928, 28, 1, 0, '{"condition":{"like__account_basic_information__first_name__plus__account_basic_information__middle_name__plus__account_basic_information__last_name":""}}', 1455123645),
(929, 28, 1, 0, '[]', 1455124670),
(930, 28, 1, 0, '{"condition":{"like__account_basic_information__first_name__plus__account_basic_information__middle_name__plus__account_basic_information__last_name":"he"}}', 1455125538),
(931, 28, 1, 0, '{"condition":{"like__account_basic_information__first_name__plus__account_basic_information__middle_name__plus__account_basic_information__last_name":"he"}}', 1455125575),
(932, 28, 1, 0, '{"condition":{"like__account_basic_information__first_name__plus__account_basic_information__middle_name__plus__account_basic_information__last_name":"he"}}', 1455125591),
(933, 28, 1, 0, '{"condition":{"like__account_basic_information__first_name__plus__account_basic_information__middle_name__plus__account_basic_information__last_name":"he"}}', 1455125603),
(934, 28, 1, 0, '{"condition":{"like__account_basic_information__first_name__plus__account_basic_information__middle_name__plus__account_basic_information__last_name":"he"}}', 1455125741),
(935, 28, 1, 0, '{"condition":{"like__account_basic_information__first_name__CONCAT__account_basic_information__middle_name__CONCAT__account_basic_information__last_name":"he"}}', 1455126063),
(936, 28, 1, 0, '{"condition":{"like__account_basic_information__first_name__CONCAT__account_basic_information__middle_name__CONCAT__account_basic_information__last_name":"h"}}', 1455126072),
(937, 28, 1, 0, '[]', 1455126093),
(938, 28, 1, 0, '[]', 1455126093),
(939, 28, 1, 0, '[]', 1455126270),
(940, 28, 1, 0, '[]', 1455126270),
(941, 28, 1, 0, '[]', 1455126270),
(942, 28, 1, 0, '[]', 1455126355),
(943, 28, 1, 0, '[]', 1455126355),
(944, 28, 1, 0, '[]', 1455126355),
(945, 28, 1, 0, '[]', 1455126475),
(946, 28, 1, 0, '[]', 1455126475),
(947, 28, 1, 0, '[]', 1455126475),
(948, 28, 1, 0, '[]', 1455126488),
(949, 28, 1, 0, '[]', 1455126488),
(950, 28, 1, 0, '[]', 1455126488),
(951, 28, 1, 0, '[]', 1455126513),
(952, 28, 1, 0, '[]', 1455126513),
(953, 28, 1, 0, '[]', 1455126513),
(954, 28, 1, 0, '[]', 1455126523),
(955, 28, 1, 0, '[]', 1455126523),
(956, 28, 1, 0, '[]', 1455126523),
(957, 28, 1, 0, '[]', 1455126541),
(958, 28, 1, 0, '[]', 1455126541),
(959, 28, 1, 0, '[]', 1455126541),
(960, 28, 1, 0, '[]', 1455126563),
(961, 28, 1, 0, '[]', 1455126563),
(962, 28, 1, 0, '[]', 1455126563),
(963, 28, 1, 0, '[]', 1455126572),
(964, 28, 1, 0, '[]', 1455126572),
(965, 28, 1, 0, '[]', 1455126572),
(966, 28, 1, 0, '{"ID":"28"}', 1455126629),
(967, 28, 1, 0, '{"ID":"28"}', 1455126629),
(968, 28, 1, 0, '{"ID":"28"}', 1455126629),
(969, 28, 1, 0, '{"ID":"28"}', 1455126644),
(970, 28, 1, 0, '{"ID":"28"}', 1455126644),
(971, 28, 1, 0, '{"ID":"28"}', 1455126644),
(972, 28, 1, 0, '{"ID":"28"}', 1455126661),
(973, 28, 1, 0, '{"ID":"28"}', 1455126661),
(974, 28, 1, 0, '{"ID":"28"}', 1455126661),
(975, 28, 1, 0, '{"ID":"28"}', 1455126677),
(976, 28, 1, 0, '{"ID":"28"}', 1455126677),
(977, 28, 1, 0, '{"ID":"28"}', 1455126677),
(978, 28, 1, 0, '{"ID":"28"}', 1455126716),
(979, 28, 1, 0, '{"ID":"28"}', 1455126716),
(980, 28, 1, 0, '{"ID":"28"}', 1455126716),
(981, 28, 1, 0, '{"ID":"28"}', 1455126816),
(982, 28, 1, 0, '{"ID":"28"}', 1455126816),
(983, 28, 1, 0, '{"ID":"28"}', 1455126816),
(984, 28, 1, 0, '{"ID":"28"}', 1455126882),
(985, 28, 1, 0, '{"ID":"28"}', 1455126882),
(986, 28, 1, 0, '{"ID":"28"}', 1455126882),
(987, 28, 1, 0, '{"updated_data":{"first_name":"John Enricks","middle_name":"Retubados","last_name":"Plenoss","contact_number_ID":"41","contact_number_detail":"09275835504","username":"johnenrick","account_address_ID":"2","account_address_longitude":"0","account_address_latitude":"0","account_address_map_marker_ID":"4","account_address_description":"s2ss2"},"ID":"28"}', 1455126887),
(988, 28, 1, 0, '{"ID":"28"}', 1455126887),
(989, 28, 1, 0, '{"updated_data":{"first_name":"John Enricks","middle_name":"Retubados","last_name":"Plenosstid","contact_number_ID":"41","contact_number_detail":"09275835504","username":"johnenrick","account_address_ID":"2","account_address_longitude":"0","account_address_latitude":"0","account_address_map_marker_ID":"4","account_address_description":"s2ss2"},"ID":"28"}', 1455126895),
(990, 28, 1, 0, '{"ID":"28"}', 1455126895),
(991, 28, 1, 0, '{"updated_data":{"first_name":"John Enricks","middle_name":"Retubados","last_name":"Plenoss","contact_number_ID":"41","contact_number_detail":"09275835504","username":"johnenrick","account_address_ID":"2","account_address_longitude":"0","account_address_latitude":"0","account_address_map_marker_ID":"4","account_address_description":"s2ss2"},"ID":"28"}', 1455126897),
(992, 28, 1, 0, '{"ID":"28"}', 1455126897),
(993, 28, 1, 0, '{"ID":"28"}', 1455126901),
(994, 28, 1, 0, '{"ID":"28"}', 1455126901),
(995, 28, 1, 0, '{"ID":"28"}', 1455126901),
(996, 28, 1, 0, '{"updated_data":{"first_name":"John Enricks","middle_name":"Retubados","last_name":"Plenosstid","contact_number_ID":"41","contact_number_detail":"09275835504","username":"johnenrick","account_address_ID":"2","account_address_longitude":"0","account_address_latitude":"0","account_address_map_marker_ID":"4","account_address_description":"s2ss2"},"ID":"28"}', 1455126910),
(997, 28, 1, 0, '{"ID":"28"}', 1455126910),
(998, 28, 1, 0, '{"updated_data":{"first_name":"John Enricks","middle_name":"Retubados","last_name":"Plenosstid","contact_number_ID":"41","contact_number_detail":"09275835504","username":"johnenrick","account_address_ID":"2","account_address_longitude":"0","account_address_latitude":"0","account_address_map_marker_ID":"4","account_address_description":"s2ss2"},"ID":"28"}', 1455126953),
(999, 28, 1, 0, '{"ID":"28"}', 1455126953),
(1000, 28, 1, 0, '{"updated_data":{"first_name":"John Enricks","middle_name":"Retubados","last_name":"Plenosstid","contact_number_ID":"41","contact_number_detail":"09275835504","username":"johnenrick","account_address_ID":"2","account_address_longitude":"0","account_address_latitude":"0","account_address_map_marker_ID":"4","account_address_description":"s2ss2"},"ID":"28"}', 1455126981),
(1001, 28, 1, 0, '{"ID":"28"}', 1455126981),
(1002, 28, 1, 0, '{"updated_data":{"first_name":"John Enricks","middle_name":"Retubados","last_name":"Plenoss","contact_number_ID":"41","contact_number_detail":"09275835504","username":"johnenrick","account_address_ID":"2","account_address_longitude":"0","account_address_latitude":"0","account_address_map_marker_ID":"4","account_address_description":"s2ss2"},"ID":"28"}', 1455127056),
(1003, 28, 1, 0, '{"ID":"28"}', 1455127056),
(1004, 28, 1, 0, '{"updated_data":{"first_name":"John Enricks","middle_name":"Retubados","last_name":"Plenosstid","contact_number_ID":"41","contact_number_detail":"09275835504","username":"johnenrick","account_address_ID":"2","account_address_longitude":"0","account_address_latitude":"0","account_address_map_marker_ID":"4","account_address_description":"s2ss2"},"ID":"28"}', 1455127060),
(1005, 28, 1, 0, '{"ID":"28"}', 1455127060),
(1006, 28, 1, 0, '{"updated_data":{"last_name":"tid"},"ID":"28"}', 1455128862),
(1007, 28, 1, 0, '{"updated_data":{"last_name":"tid"},"ID":"28"}', 1455128876),
(1008, 28, 1, 0, '{"updated_data":{"last_name":"tid"},"ID":"28"}', 1455129049),
(1009, 28, 1, 0, '{"updated_data":{"last_name":"tid"},"ID":"28"}', 1455129078),
(1010, 28, 1, 0, '{"updated_data":{"last_name":"tid"},"ID":"28"}', 1455129108),
(1011, 28, 1, 0, '{"updated_data":{"last_name":"tid"},"ID":"28"}', 1455129636),
(1012, 28, 1, 0, '{"updated_data":{"last_name":"tid"},"ID":"28"}', 1455129989),
(1013, 28, 1, 0, '{"updated_data":{"last_name":"tid"},"ID":"28"}', 1455130017),
(1014, 28, 1, 0, '{"updated_data":{"last_name":"tid"},"ID":"28"}', 1455130053),
(1015, 28, 1, 0, '{"ID":"28"}', 1455130056),
(1016, 28, 1, 0, '{"ID":"28"}', 1455130056),
(1017, 28, 1, 0, '{"ID":"28"}', 1455130057),
(1018, 28, 1, 0, '{"updated_data":{"first_name":"John Enricks","middle_name":"Retubados","last_name":"plenostid","contact_number_ID":"41","contact_number_detail":"09275835504","username":"johnenrick","account_address_ID":"2","account_address_longitude":"0","account_address_latitude":"0","account_address_map_marker_ID":"4","account_address_description":"s2ss2"},"ID":"28","condition":{"account_ID":"28"}}', 1455130065),
(1019, 28, 1, 0, '{"ID":"28"}', 1455130065),
(1020, 28, 1, 0, '{"ID":"28"}', 1455130145),
(1021, 28, 1, 0, '{"ID":"28"}', 1455130145),
(1022, 28, 1, 0, '{"ID":"28"}', 1455130146),
(1023, 28, 1, 0, '{"updated_data":{"first_name":"John Enricks","middle_name":"Retubados","last_name":"plenostid","email_ID":"40","email_detail":"plenosjohn@yahoo.com","contact_number_ID":"41","contact_number_detail":"09275835504","username":"johnenrick","account_address_ID":"2","account_address_longitude":"0","account_address_latitude":"0","account_address_map_marker_ID":"4","account_address_description":"s2ss2"},"ID":"28","condition":{"account_ID":"28"}}', 1455130151),
(1024, 28, 1, 0, '{"ID":"28"}', 1455130151),
(1025, 28, 1, 0, '{"updated_data":{"first_name":"John Enricks","middle_name":"Retubados","last_name":"plenostid","email_ID":"40","email_detail":"plenosjohn@yahoo.com","contact_number_ID":"41","contact_number_detail":"09275835504","username":"johnenrick","account_address_ID":"2","account_address_longitude":"0","account_address_latitude":"0","account_address_map_marker_ID":"4","account_address_description":"s2ss2"},"ID":"28","condition":{"account_ID":"28"}}', 1455130182),
(1026, 28, 1, 0, '{"ID":"28"}', 1455130182),
(1027, 28, 1, 0, '{"ID":"28"}', 1455130208),
(1028, 28, 1, 0, '{"ID":"28"}', 1455130208),
(1029, 28, 1, 0, '{"ID":"28"}', 1455130208),
(1030, 28, 1, 0, '{"updated_data":{"first_name":"John Enricks","middle_name":"Retubados","last_name":"plenostid","email_ID":"40","email_detail":"plenosjohn@yahoo.com","contact_number_ID":"41","contact_number_detail":"09275835504","username":"johnenrick","account_address_ID":"2","account_address_longitude":"0","account_address_latitude":"0","account_address_map_marker_ID":"4","account_address_description":"s2ss2"},"ID":"28","condition":{"account_ID":"28"}}', 1455130214),
(1031, 28, 1, 0, '{"ID":"28"}', 1455130214),
(1032, 28, 1, 0, '{"ID":"28"}', 1455130254),
(1033, 28, 1, 0, '{"ID":"28"}', 1455130254),
(1034, 28, 1, 0, '{"ID":"28"}', 1455130254),
(1035, 28, 1, 0, '{"updated_data":{"first_name":"John Enricks","middle_name":"Retubados","last_name":"plenostid","email_ID":"40","email_detail":"plenosjohn@yahoo.com","contact_number_ID":"41","contact_number_detail":"09275835504","username":"johnenrick","account_address_ID":"2","account_address_longitude":"0","account_address_latitude":"0","account_address_map_marker_ID":"4","account_address_description":"s2ss2"},"ID":"28","condition":{"account_ID":"28"}}', 1455130262),
(1036, 28, 1, 0, '{"ID":"28"}', 1455130262),
(1037, 28, 1, 0, '{"updated_data":{"first_name":"John Enricks","middle_name":"Retubados","last_name":"plenostid","email_ID":"40","email_detail":"plenosjohn@yahoo.com","contact_number_ID":"41","contact_number_detail":"09275835504","username":"johnenrick","account_address_ID":"2","account_address_longitude":"0","account_address_latitude":"0","account_address_map_marker_ID":"4","account_address_description":"s2ss2"},"ID":"28","condition":{"account_ID":"28"}}', 1455130356),
(1038, 28, 1, 0, '{"ID":"28"}', 1455130356),
(1039, 28, 1, 0, '{"ID":"28"}', 1455130411),
(1040, 28, 1, 0, '{"ID":"28"}', 1455130411),
(1041, 28, 1, 0, '{"ID":"28"}', 1455130411),
(1042, 28, 1, 0, '{"updated_data":{"first_name":"John Enricks","middle_name":"Retubados","last_name":"plenostid","email_ID":"40","email_detail":"plenosjohn@yahoo.com","contact_number_ID":"41","contact_number_detail":"09275835504","username":"johnenrick","account_address_ID":"2","account_address_longitude":"0","account_address_latitude":"0","account_address_map_marker_ID":"4","account_address_description":"s2ss2"},"ID":"28","condition":{"account_ID":"28"}}', 1455130425),
(1043, 28, 1, 0, '{"ID":"28"}', 1455130425),
(1044, 28, 1, 0, '{"updated_data":{"first_name":"John Enricks","middle_name":"Retubados","last_name":"plenostid","email_ID":"40","email_detail":"plenosjohn@yahoo.com","contact_number_ID":"41","contact_number_detail":"09275835504","username":"johnenrick","account_address_ID":"2","account_address_longitude":"0","account_address_latitude":"0","account_address_map_marker_ID":"4","account_address_description":"s2ss2"},"ID":"28","condition":{"account_ID":"28"}}', 1455130465),
(1045, 28, 1, 0, '{"ID":"28"}', 1455130465),
(1046, 28, 1, 0, '{"updated_data":{"first_name":"John Enricks","middle_name":"Retubados","last_name":"plenostid","email_ID":"40","email_detail":"plenosjohn@yahoo.com","contact_number_ID":"41","contact_number_detail":"09275835504","username":"johnenrick","account_address_ID":"2","account_address_longitude":"0","account_address_latitude":"0","account_address_map_marker_ID":"4","account_address_description":"s2ss2"},"ID":"28","condition":{"account_ID":"28"}}', 1455130541),
(1047, 28, 1, 0, '{"ID":"28"}', 1455130541),
(1048, 28, 1, 0, '{"updated_data":{"first_name":"John Enricks","middle_name":"Retubados","last_name":"plenostid","email_ID":"40","email_detail":"plenosjohn@yahoo.com","contact_number_ID":"41","contact_number_detail":"09275835504","username":"johnenrick","account_address_ID":"2","account_address_longitude":"0","account_address_latitude":"0","account_address_map_marker_ID":"4","account_address_description":"s2ss2"},"ID":"28","condition":{"account_ID":"28"}}', 1455130698),
(1049, 28, 1, 0, '{"ID":"28"}', 1455130698),
(1050, 28, 1, 0, '{"ID":"28"}', 1455130749),
(1051, 28, 1, 0, '{"ID":"28"}', 1455130749),
(1052, 28, 1, 0, '{"ID":"28"}', 1455130749),
(1053, 28, 1, 0, '{"updated_data":{"first_name":"John Enricks","middle_name":"Retubados","last_name":"plenostid","contact_number_ID":"41","contact_number_detail":"092145","username":"johnenrick","account_address_ID":"2","account_address_longitude":"0","account_address_latitude":"0","account_address_map_marker_ID":"4","account_address_description":"s2ss2"},"ID":"28","condition":{"account_ID":"28"}}', 1455130753),
(1054, 28, 1, 0, '{"ID":"28"}', 1455130754),
(1055, 28, 1, 0, '{"updated_data":{"first_name":"John Enricks","middle_name":"Retubados","last_name":"plenostid","email_ID":"40","email_detail":"pleos@uy.c","contact_number_ID":"41","contact_number_detail":"092145","username":"johnenrick","account_address_ID":"2","account_address_longitude":"0","account_address_latitude":"0","account_address_map_marker_ID":"4","account_address_description":"s2ss2"},"ID":"28","condition":{"account_ID":"28"}}', 1455130941),
(1056, 28, 1, 0, '{"ID":"28"}', 1455130941),
(1057, 28, 1, 0, '{"ID":"28"}', 1455130944),
(1058, 28, 1, 0, '{"ID":"28"}', 1455130944),
(1059, 28, 1, 0, '{"ID":"28"}', 1455130944),
(1060, 28, 1, 0, '{"updated_data":{"first_name":"John Enricks","middle_name":"Retubados","last_name":"plenostid","email_ID":"40","email_detail":"asdsad@g.c","contact_number_ID":"41","contact_number_detail":"092145","username":"johnenrick","account_address_ID":"2","account_address_longitude":"0","account_address_latitude":"0","account_address_map_marker_ID":"4","account_address_description":"s2ss2"},"ID":"28","condition":{"account_ID":"28"}}', 1455130949),
(1061, 28, 1, 0, '{"ID":"28"}', 1455131004),
(1062, 28, 1, 0, '{"ID":"28"}', 1455131004),
(1063, 28, 1, 0, '{"ID":"28"}', 1455131004),
(1064, 28, 1, 0, '{"updated_data":{"first_name":"John Enricks","middle_name":"Retubados","last_name":"plenostid","email_ID":"40","email_detail":"092145sad@s.c","contact_number_ID":"41","contact_number_detail":"092145","username":"johnenrick","account_address_ID":"2","account_address_longitude":"0","account_address_latitude":"0","account_address_map_marker_ID":"4","account_address_description":"s2ss2"},"ID":"28","condition":{"account_ID":"28"}}', 1455131013),
(1065, 28, 1, 0, '{"ID":"28"}', 1455131056),
(1066, 28, 1, 0, '{"ID":"28"}', 1455131056),
(1067, 28, 1, 0, '{"ID":"28"}', 1455131056),
(1068, 28, 1, 0, '{"updated_data":{"first_name":"John Enricks","middle_name":"Retubados","last_name":"plenostid","email_ID":"40","email_detail":"asdasd@t.c","contact_number_ID":"41","contact_number_detail":"092145","username":"johnenrick","account_address_ID":"2","account_address_longitude":"0","account_address_latitude":"0","account_address_map_marker_ID":"4","account_address_description":"s2ss2"},"ID":"28","condition":{"account_ID":"28"}}', 1455131062),
(1069, 28, 1, 0, '{"updated_data":{"first_name":"John Enricks","middle_name":"Retubados","last_name":"plenostid","email_ID":"40","email_detail":"asdasd@t.c","contact_number_ID":"41","contact_number_detail":"092145","username":"johnenrick","account_address_ID":"2","account_address_longitude":"0","account_address_latitude":"0","account_address_map_marker_ID":"4","account_address_description":"s2ss2"},"ID":"28","condition":{"account_ID":"28"}}', 1455131105),
(1070, 28, 1, 0, '{"updated_data":{"first_name":"John Enricks","middle_name":"Retubados","last_name":"plenostid","email_ID":"40","email_detail":"asdasd@t.c","contact_number_ID":"41","contact_number_detail":"092145","username":"johnenrick","account_address_ID":"2","account_address_longitude":"0","account_address_latitude":"0","account_address_map_marker_ID":"4","account_address_description":"s2ss2"},"ID":"28","condition":{"account_ID":"28"}}', 1455131113),
(1071, 28, 1, 0, '{"updated_data":{"first_name":"John Enricks","middle_name":"Retubados","last_name":"plenostid","email_ID":"40","email_detail":"asdasd@t.c","contact_number_ID":"41","contact_number_detail":"092145","username":"johnenrick","account_address_ID":"2","account_address_longitude":"0","account_address_latitude":"0","account_address_map_marker_ID":"4","account_address_description":"s2ss2"},"ID":"28","condition":{"account_ID":"28"}}', 1455131138),
(1072, 28, 1, 0, '{"updated_data":{"first_name":"John Enricks","middle_name":"Retubados","last_name":"plenostid","email_ID":"40","email_detail":"asdasd@t.c","contact_number_ID":"41","contact_number_detail":"092145","username":"johnenrick","account_address_ID":"2","account_address_longitude":"0","account_address_latitude":"0","account_address_map_marker_ID":"4","account_address_description":"s2ss2"},"ID":"28","condition":{"account_ID":"28"}}', 1455131213),
(1073, 28, 1, 0, '{"updated_data":{"first_name":"John Enricks","middle_name":"Retubados","last_name":"plenostid","email_ID":"40","email_detail":"asdasd@t.c","contact_number_ID":"41","contact_number_detail":"092145","username":"johnenrick","account_address_ID":"2","account_address_longitude":"0","account_address_latitude":"0","account_address_map_marker_ID":"4","account_address_description":"s2ss2"},"ID":"28","condition":{"account_ID":"28"}}', 1455131232),
(1074, 28, 1, 0, '{"updated_data":{"first_name":"John Enricks","middle_name":"Retubados","last_name":"plenostid","email_ID":"40","email_detail":"asdasd@t.cs","contact_number_ID":"41","contact_number_detail":"092145","username":"johnenrick","account_address_ID":"2","account_address_longitude":"0","account_address_latitude":"0","account_address_map_marker_ID":"4","account_address_description":"s2ss2"},"ID":"28","condition":{"account_ID":"28"}}', 1455131299),
(1075, 28, 1, 0, '{"updated_data":{"first_name":"John Enricks","middle_name":"Retubados","last_name":"plenostid","email_ID":"40","email_detail":"asdasd@t.css","contact_number_ID":"41","contact_number_detail":"092145","username":"johnenrick","account_address_ID":"2","account_address_longitude":"0","account_address_latitude":"0","account_address_map_marker_ID":"4","account_address_description":"s2ss2"},"ID":"28","condition":{"account_ID":"28"}}', 1455131316),
(1076, 28, 1, 0, '{"updated_data":{"first_name":"John Enricks","middle_name":"Retubados","last_name":"plenostid","email_ID":"40","email_detail":"asdasd@t.cssd","contact_number_ID":"41","contact_number_detail":"092145","username":"johnenrick","account_address_ID":"2","account_address_longitude":"0","account_address_latitude":"0","account_address_map_marker_ID":"4","account_address_description":"s2ss2"},"ID":"28","condition":{"account_ID":"28"}}', 1455131363),
(1077, 28, 1, 0, '{"updated_data":{"first_name":"John Enricks","middle_name":"Retubados","last_name":"plenostid","email_ID":"40","email_detail":"asdasd@t.cssdd","contact_number_ID":"41","contact_number_detail":"092145","username":"johnenrick","account_address_ID":"2","account_address_longitude":"0","account_address_latitude":"0","account_address_map_marker_ID":"4","account_address_description":"s2ss2"},"ID":"28","condition":{"account_ID":"28"}}', 1455131391),
(1078, 28, 1, 0, '{"updated_data":{"first_name":"John Enricks","middle_name":"Retubados","last_name":"plenostid","email_ID":"40","email_detail":"asdasd@t.cssddDS","contact_number_ID":"41","contact_number_detail":"092145","username":"johnenrick","account_address_ID":"2","account_address_longitude":"0","account_address_latitude":"0","account_address_map_marker_ID":"4","account_address_description":"s2ss2"},"ID":"28","condition":{"account_ID":"28"}}', 1455131531),
(1079, 28, 1, 0, '{"updated_data":{"first_name":"John Enricks","middle_name":"Retubados","last_name":"plenostid","email_ID":"40","email_detail":"asdasd@t.cssddDSD","contact_number_ID":"41","contact_number_detail":"092145","username":"johnenrick","account_address_ID":"2","account_address_longitude":"0","account_address_latitude":"0","account_address_map_marker_ID":"4","account_address_description":"s2ss2"},"ID":"28","condition":{"account_ID":"28"}}', 1455131542),
(1080, 28, 1, 0, '{"updated_data":{"first_name":"John Enricks","middle_name":"Retubados","last_name":"plenostid","email_ID":"40","email_detail":"asdasd@t.cssddDSDASDASD","contact_number_ID":"41","contact_number_detail":"092145","username":"johnenrick","account_address_ID":"2","account_address_longitude":"0","account_address_latitude":"0","account_address_map_marker_ID":"4","account_address_description":"s2ss2"},"ID":"28","condition":{"account_ID":"28"}}', 1455131549),
(1081, 28, 1, 0, '{"updated_data":{"first_name":"John Enricks","middle_name":"Retubados","last_name":"plenostid","email_ID":"40","email_detail":"asdasd@t.cssddDSDASDASDDD","contact_number_ID":"41","contact_number_detail":"092145","username":"johnenrick","account_address_ID":"2","account_address_longitude":"0","account_address_latitude":"0","account_address_map_marker_ID":"4","account_address_description":"s2ss2"},"ID":"28","condition":{"account_ID":"28"}}', 1455131572),
(1082, 28, 1, 0, '{"ID":"28"}', 1455131606),
(1083, 28, 1, 0, '{"ID":"28"}', 1455131606),
(1084, 28, 1, 0, '{"ID":"28"}', 1455131606),
(1085, 28, 1, 0, '{"ID":"28"}', 1455131611),
(1086, 28, 1, 0, '{"ID":"28"}', 1455131611),
(1087, 28, 1, 0, '{"ID":"28"}', 1455131612),
(1088, 28, 1, 0, '{"updated_data":{"first_name":"John Enricks","middle_name":"Retubados","last_name":"plenostid","contact_number_ID":"41","contact_number_detail":"092145123123","username":"johnenrick","account_address_ID":"2","account_address_longitude":"0","account_address_latitude":"0","account_address_map_marker_ID":"4","account_address_description":"s2ss2"},"ID":"28","condition":{"account_ID":"28"}}', 1455131623),
(1089, 28, 1, 0, '{"ID":"28"}', 1455131623),
(1090, 28, 1, 0, '{"ID":"28"}', 1455131694),
(1091, 28, 1, 0, '{"ID":"28"}', 1455131694),
(1092, 28, 1, 0, '{"ID":"28"}', 1455131694),
(1093, 28, 1, 0, '{"updated_data":{"first_name":"John Enricks","middle_name":"Retubados","last_name":"plenostid","email_ID":"40","email_detail":"plenosjohn@yahoo.com","contact_number_ID":"41","contact_number_detail":"09275835504","username":"johnenrick","account_address_ID":"2","account_address_longitude":"0","account_address_latitude":"0","account_address_map_marker_ID":"4","account_address_description":"s2ss2"},"ID":"28","condition":{"account_ID":"28"}}', 1455131715),
(1094, 28, 1, 0, '{"ID":"28"}', 1455131715),
(1095, 28, 1, 0, '{"condition":{"like__account_basic_information__first_name__CONCAT__account_basic_information__middle_name__CONCAT__account_basic_information__last_name":""}}', 1455131913),
(1096, 28, 1, 0, '{"condition":{"like__account_basic_information__first_name__CONCAT__account_basic_information__middle_name__CONCAT__account_basic_information__last_name":"et"}}', 1455131925),
(1097, 28, 1, 0, '{"condition":{"like__account_basic_information__first_name__CONCAT__account_basic_information__middle_name__CONCAT__account_basic_information__last_name":"et"}}', 1455131940),
(1098, 28, 1, 0, '{"condition":{"like__account_basic_information__first_name__CONCAT__account_basic_information__middle_name__CONCAT__account_basic_information__last_name":"et"}}', 1455131960),
(1099, 28, 1, 0, '{"condition":{"like__account_basic_information__first_name__CONCAT__account_basic_information__middle_name__CONCAT__account_basic_information__last_name":"et"}}', 1455131972),
(1100, 28, 1, 0, '{"condition":{"like__account_basic_information__first_name__CONCAT__account_basic_information__middle_name__CONCAT__account_basic_information__last_name":"et"}}', 1455131991),
(1101, 29, 1, 0, '{"ID":"29"}', 1455132090),
(1102, 29, 1, 0, '{"ID":"29"}', 1455132091),
(1103, 29, 1, 0, '{"updated_data":{"first_name":"Henry","middle_name":"Bunal","last_name":"Pido","email_ID":"42","email_detail":"taebill@asd.c","contact_number_ID":"","contact_number_detail":"123123","username":"henrybunal","account_address_ID":"0","account_address_longitude":"","account_address_latitude":"","account_address_map_marker_ID":"0","account_address_description":""},"ID":"29","condition":{"account_ID":"29"}}', 1455132113),
(1104, 29, 1, 0, '{"ID":"29"}', 1455132113),
(1105, 29, 1, 0, '{"condition":{"like__account_basic_information__first_name__CONCAT__account_basic_information__middle_name__CONCAT__account_basic_information__last_name":"et"}}', 1455132156),
(1106, 29, 1, 0, '{"condition":{"like__account_basic_information__first_name__CONCAT__account_basic_information__middle_name__CONCAT__account_basic_information__last_name":""}}', 1455132172),
(1107, 29, 1, 0, '{"condition":{"like__account_basic_information__first_name__CONCAT__account_basic_information__middle_name__CONCAT__account_basic_information__last_name":""}}', 1455132187),
(1108, 29, 1, 0, '{"condition":{"like__account_basic_information__first_name__CONCAT__account_basic_information__middle_name__CONCAT__account_basic_information__last_name":""}}', 1455132232),
(1109, 28, 1, 0, '{"ID":"28"}', 1455132246),
(1110, 28, 1, 0, '{"ID":"28"}', 1455132246),
(1111, 28, 1, 0, '{"ID":"28"}', 1455132256),
(1112, 28, 1, 0, '{"ID":"28"}', 1455132257),
(1113, 28, 1, 0, '{"ID":"28"}', 1455132257),
(1114, 28, 1, 0, '{"condition":{"like__account_basic_information__first_name__CONCAT__account_basic_information__middle_name__CONCAT__account_basic_information__last_name":""}}', 1455132262),
(1115, 28, 1, 0, '{"condition":{"like__account_basic_information__first_name__CONCAT__account_basic_information__middle_name__CONCAT__account_basic_information__last_name":"et"}}', 1455132267),
(1116, 28, 1, 0, '{"condition":{"like__account_basic_information__first_name__CONCAT__account_basic_information__middle_name__CONCAT__account_basic_information__last_name":"t"}}', 1455132274),
(1117, 28, 1, 0, '{"condition":{"like__account_basic_information__first_name__CONCAT__account_basic_information__middle_name__CONCAT__account_basic_information__last_name":"ti"}}', 1455132281),
(1118, 28, 1, 0, '{"ID":"28"}', 1455132375),
(1119, 28, 1, 0, '{"ID":"28"}', 1455132375),
(1120, 28, 1, 0, '{"condition":{"like__account_basic_information__first_name__CONCAT__account_basic_information__middle_name__CONCAT__account_basic_information__last_name":""}}', 1455132380),
(1121, 28, 1, 0, '{"updated_data":{"first_name":"John Enricks","middle_name":"Retubadosry","last_name":"plenostid","contact_number_ID":"41","contact_number_detail":"09275835504","username":"johnenrick","account_address_ID":"2","account_address_longitude":"0","account_address_latitude":"0","account_address_map_marker_ID":"4","account_address_description":"s2ss2"},"ID":"28","condition":{"account_ID":"28"}}', 1455132392),
(1122, 28, 1, 0, '{"ID":"28"}', 1455132393),
(1123, 28, 1, 0, '{"condition":{"like__account_basic_information__first_name__CONCAT__account_basic_information__middle_name__CONCAT__account_basic_information__last_name":""}}', 1455132395),
(1124, 28, 1, 0, '{"condition":{"like__account_basic_information__first_name__CONCAT__account_basic_information__middle_name__CONCAT__account_basic_information__last_name":"ry"}}', 1455132398),
(1125, 28, 1, 0, '{"condition":{"like__account_basic_information__first_name__CONCAT__account_basic_information__middle_name__CONCAT__account_basic_information__last_name":"nry"}}', 1455132408),
(1126, 28, 1, 0, '{"condition":{"like__account_basic_information__first_name__CONCAT__account_basic_information__middle_name__CONCAT__account_basic_information__last_name":"john enrick"}}', 1455132416),
(1127, 28, 1, 0, '{"condition":{"like__account_basic_information__first_name__CONCAT__account_basic_information__middle_name__CONCAT__account_basic_information__last_name":["john","e"]}}', 1455134971),
(1128, 28, 1, 0, '{"condition":{"like__account_basic_information__first_name__CONCAT__account_basic_information__middle_name__CONCAT__account_basic_information__last_name":["john","e"]}}', 1455134996),
(1129, 28, 1, 0, '{"condition":{"like__account_basic_information__first_name__CONCAT__account_basic_information__middle_name__CONCAT__account_basic_information__last_name":["john","e"]}}', 1455135009),
(1130, 28, 1, 0, '{"condition":{"like__account_basic_information__first_name__CONCAT__account_basic_information__middle_name__CONCAT__account_basic_information__last_name":["john","plenos"]}}', 1455135019),
(1131, 28, 1, 0, '{"condition":{"like__account_basic_information__first_name__CONCAT__account_basic_information__middle_name__CONCAT__account_basic_information__last_name":["ry","plenos"]}}', 1455135028),
(1132, 28, 1, 0, '{"condition":{"like__account_basic_information__first_name__CONCAT__account_basic_information__middle_name__CONCAT__account_basic_information__last_name":["ry",""]}}', 1455135032),
(1133, 28, 1, 0, '{"condition":{"like__account_basic_information__first_name__CONCAT__account_basic_information__middle_name__CONCAT__account_basic_information__last_name":["nry",""]}}', 1455135038),
(1134, 29, 1, 0, '{"ID":"29"}', 1455166449),
(1135, 29, 1, 0, '{"ID":"29"}', 1455166449),
(1136, 29, 1, 0, '{"updated_data":{"first_name":"Henry","middle_name":"Bunal","last_name":"Pido","contact_number_ID":"43","contact_number_detail":"123123","username":"henrybunal","account_address_ID":"0","account_address_longitude":"","account_address_latitude":"","account_address_map_marker_ID":"0","account_address_description":""},"ID":"29","condition":{"account_ID":"29"}}', 1455166451),
(1137, 29, 1, 0, '{"ID":"29"}', 1455166451),
(1138, 29, 1, 0, '{"updated_data":{"first_name":"Henry","middle_name":"Bunal","last_name":"Pido","contact_number_ID":"43","contact_number_detail":"123123","username":"henrybunal","password":"taetae","confirm_password":"taetae","account_address_ID":"0","account_address_longitude":"","account_address_latitude":"","account_address_map_marker_ID":"0","account_address_description":""},"ID":"29","condition":{"account_ID":"29"}}', 1455166477),
(1139, 29, 1, 0, '{"ID":"29"}', 1455166477),
(1140, 29, 1, 0, '{"updated_data":{"first_name":"Henry","middle_name":"Bunal","last_name":"Pido","contact_number_ID":"43","contact_number_detail":"123123","username":"henrybunal","password":"taetae","confirm_password":"taetae","account_address_ID":"0","account_address_longitude":"","account_address_latitude":"","account_address_map_marker_ID":"0","account_address_description":""},"ID":"29","condition":{"account_ID":"29"}}', 1455166499),
(1141, 29, 1, 0, '{"ID":"29"}', 1455166499),
(1142, 29, 1, 0, '{"updated_data":{"first_name":"Henry","middle_name":"Bunal","last_name":"Pido","contact_number_ID":"43","contact_number_detail":"123123","username":"henrybunal","password":"taetae","confirm_password":"taetae","account_address_ID":"0","account_address_longitude":"","account_address_latitude":"","account_address_map_marker_ID":"0","account_address_description":""},"ID":"29","condition":{"account_ID":"29"}}', 1455166500),
(1143, 29, 1, 0, '{"ID":"29"}', 1455166500),
(1144, 28, 1, 0, '1', 1455211534),
(1145, 28, 1, 0, '{"waste_post_type_ID":"1","waste_category_ID":"2","description":"Tbool","quantity":"20","quantity_unit_ID":"1","price":"100"}', 1455211558),
(1146, 28, 1, 0, '{"waste_post_type_ID":"1","waste_category_ID":"2","description":"Tbool","quantity":"200","quantity_unit_ID":"1","price":"100"}', 1455211565),
(1147, 28, 1, 0, '{"condition":{"waste_post_type_ID":"1"},"waste_category_ID":"2","description":"Tbool","quantity":"200","quantity_unit_ID":"1","price":"100"}', 1455211687),
(1148, 28, 1, 0, '{"condition":{"ID":"1"},"waste_category_ID":"2","description":"Tbool","quantity":"200","quantity_unit_ID":"2","price":"100"}', 1455211716),
(1149, 28, 1, 0, '{"condition":{"ID":"1"},"updated_data":{"waste_category_ID":"4"},"description":"Tbool","quantity":"200","quantity_unit_ID":"2","price":"100"}', 1455211779),
(1150, 28, 1, 0, '{"condition":{"ID":"1"},"updated_data":{"waste_category_ID":"4"},"description":"Tbool","quantity":"200","quantity_unit_ID":"2","price":"100"}', 1455211796),
(1151, 28, 1, 0, '{"condition":{"ID":"1"},"updated_data":{"waste_category_ID":"4"},"description":"Tbool","quantity":"200","quantity_unit_ID":"2","price":"100"}', 1455211809),
(1152, 28, 1, 0, '{"condition":{"ID":"1"},"updated_data":{"waste_category_ID":"4"},"description":"Tbool","quantity":"200","quantity_unit_ID":"2","price":"100"}', 1455211819),
(1153, 28, 1, 0, '{"condition":{"ID":"1"},"updated_data":{"waste_category_ID":"4"},"description":"Tbool","quantity":"200","quantity_unit_ID":"2","price":"100"}', 1455211854),
(1154, 28, 1, 0, '{"condition":{"ID":"1"},"updated_data":{"waste_category_ID":"4"},"description":"Tbool","quantity":"200","quantity_unit_ID":"2","price":"100"}', 1455211894),
(1155, 28, 1, 0, '{"condition":{"ID":"1"},"updated_data":{"waste_category_ID":"4"},"description":"Tbool","quantity":"200","quantity_unit_ID":"2","price":"100"}', 1455211904),
(1156, 28, 1, 0, '{"condition":{"ID":"1"},"updated_data":{"waste_category_ID":"4"},"description":"Tbool","quantity":"200","quantity_unit_ID":"2","price":"100"}', 1455211926),
(1157, 28, 1, 0, '{"condition":{"ID":"1"},"updated_data":{"waste_category_ID":"4"},"description":"Tbool","quantity":"200","quantity_unit_ID":"2","price":"100"}', 1455211950),
(1158, 28, 1, 0, '{"condition":{"ID":"1"},"updated_data":{"waste_category_ID":"4"},"description":"Tbool","quantity":"200","quantity_unit_ID":"2","price":"100"}', 1455211976),
(1159, 28, 1, 0, '{"condition":{"ID":"1"},"updated_data":{"waste_category_ID":"4"},"description":"Tbool","quantity":"200","quantity_unit_ID":"2","price":"100"}', 1455212001),
(1160, 28, 1, 0, '{"condition":{"ID":"1"},"updated_data":{"waste_category_ID":"4"},"description":"Tbool","quantity":"200","quantity_unit_ID":"2","price":"100"}', 1455212059),
(1161, 28, 1, 0, '{"condition":{"ID":"1"},"updated_data":{"waste_category_ID":"4","description":"Tbool2"},"quantity":"200","quantity_unit_ID":"2","price":"100"}', 1455212089),
(1162, 28, 1, 0, '{"condition":{"ID":"1"},"updated_data":{"waste_category_ID":"3","description":"Tbool2"},"quantity":"200","quantity_unit_ID":"2","price":"100","ID":"1"}', 1455212145),
(1163, 28, 1, 0, '{"condition":{"ID":"1"},"updated_data":{"waste_category_ID":"3","description":"Tbool2"},"quantity":"200","quantity_unit_ID":"2","price":"100"}', 1455212168),
(1164, 28, 1, 0, '{"condition":{"ID":"1"},"updated_data":{"waste_category_ID":"2","description":"Tbool2"},"quantity":"200","quantity_unit_ID":"2","price":"100"}', 1455212173);
INSERT INTO `action_log` (`ID`, `account_ID`, `api_controller_ID`, `access_number_ID`, `detail`, `datetime`) VALUES
(1165, 28, 1, 0, '{"condition":{"ID":"1"},"updated_data":{"waste_category_ID":"2","description":"Tbool2"},"quantity":"200","quantity_unit_ID":"2","price":"100"}', 1455212202),
(1166, 28, 1, 0, '{"condition":{"ID":"1"},"updated_data":{"waste_category_ID":"2","description":"Tbool2"},"quantity":"200","quantity_unit_ID":"2","price":"100"}', 1455212613),
(1167, 28, 1, 0, '{"condition":{"ID":"1"},"updated_data":{"waste_category_ID":"2","description":"Tbool2"},"quantity":"200","quantity_unit_ID":"2","price":"100"}', 1455212615),
(1168, 28, 1, 0, '{"condition":{"ID":"1"},"updated_data":{"waste_category_ID":"2","description":"Tbool2"},"quantity":"200","quantity_unit_ID":"2","price":"100"}', 1455212660),
(1169, 28, 1, 0, '{"condition":{"ID":"1"},"updated_data":{"waste_category_ID":"2","description":"Tbool2"},"quantity":"200","quantity_unit_ID":"2","price":"100"}', 1455212663),
(1170, 28, 1, 0, '{"condition":{"ID":"1"},"updated_data":{"waste_category_ID":"5","description":"Tbool2"},"quantity":"200","quantity_unit_ID":"2","price":"100"}', 1455212666),
(1171, 28, 1, 0, '{"condition":{"ID":"1"},"updated_data":{"waste_category_ID":"4","description":"Tbool2"},"quantity":"200","quantity_unit_ID":"2","price":"100"}', 1455212668),
(1172, 28, 1, 0, '{"condition":{"ID":"1"},"updated_data":{"waste_category_ID":"4","description":"Tbool2"},"quantity":"200","quantity_unit_ID":"2","price":"100"}', 1455212727),
(1173, 28, 1, 0, '{"condition":{"ID":"1"},"updated_data":{"waste_category_ID":"4","description":"Tbool2"},"quantity":"200","quantity_unit_ID":"2","price":"100"}', 1455212728),
(1174, 28, 1, 0, '{"condition":{"ID":"1"},"updated_data":{"waste_category_ID":"5","description":"Tbool2"},"quantity":"200","quantity_unit_ID":"2","price":"100"}', 1455212731),
(1175, 28, 1, 0, '{"condition":{"ID":"1"},"updated_data":{"waste_category_ID":"3","description":"Tbool2"},"quantity":"200","quantity_unit_ID":"2","price":"100","ID":"1"}', 1455212741),
(1176, 28, 1, 0, '{"condition":{"ID":"1"},"updated_data":{"waste_category_ID":"3","description":"Tbool2"},"quantity":"200","quantity_unit_ID":"2","price":"100","ID":"1"}', 1455212790),
(1177, 28, 1, 0, '{"condition":{"ID":"1"},"updated_data":{"waste_category_ID":"3","description":"Tbool2"},"quantity":"200","quantity_unit_ID":"2","price":"100","ID":"1"}', 1455212795),
(1178, 28, 1, 0, '{"condition":{"ID":"1"},"updated_data":{"waste_category_ID":"3","description":"Tbool2"},"quantity":"200","quantity_unit_ID":"2","price":"100","ID":"1"}', 1455212800),
(1179, 28, 1, 0, '{"condition":{"ID":"1"},"updated_data":{"waste_category_ID":"3","description":"Tbool2"},"quantity":"200","quantity_unit_ID":"2","price":"100"}', 1455212805),
(1180, 28, 1, 0, '{"condition":{"ID":"1"},"updated_data":{"waste_category_ID":"3","description":"Tbool2"},"quantity":"200","quantity_unit_ID":"2","price":"100"}', 1455212826),
(1181, 28, 1, 0, '{"condition":{"ID":"1"},"updated_data":{"waste_category_ID":"3","description":"Tbool2"},"quantity":"200","quantity_unit_ID":"2","price":"100"}', 1455212861),
(1182, 28, 1, 0, '{"condition":{"ID":"1"},"updated_data":{"waste_category_ID":"3","description":"Tbool2"},"quantity":"200","quantity_unit_ID":"2","price":"100"}', 1455212866),
(1183, 28, 1, 0, '{"condition":{"ID":"1"},"updated_data":{"waste_category_ID":"3","description":"Tbool2"},"quantity":"200","quantity_unit_ID":"2","price":"100"}', 1455212922),
(1184, 28, 1, 0, '{"condition":{"ID":"1"},"updated_data":{"waste_category_ID":"3","description":"Tbool2"},"quantity":"200","quantity_unit_ID":"2","price":"100"}', 1455212951),
(1185, 28, 1, 0, '{"ID":"28"}', 1455236723),
(1186, 28, 1, 0, '{"ID":"28"}', 1455236723),
(1187, 28, 1, 0, '{"ID":"28"}', 1455236975),
(1188, 28, 1, 0, '{"ID":"28"}', 1455236975),
(1189, 28, 1, 0, '{"condition":{"0":"","test":"1"},"limit":"20","offset":"0"}', 1455324461),
(1190, 28, 1, 0, '{"condition":{"0":"","test":"1"},"limit":"20","offset":"0"}', 1455324471),
(1191, 28, 1, 0, '{"condition":{"0":"","test":"1"},"limit":"20","offset":"0"}', 1455324527),
(1192, 28, 1, 0, '{"condition":{"0":"","test":"1"},"limit":"20","offset":"0"}', 1455324528),
(1193, 28, 1, 0, '{"condition":{"0":"","test":"1"},"limit":"20","offset":"0"}', 1455324529),
(1194, 28, 1, 0, '{"condition":{"0":"","test":"1"},"limit":"20","offset":"0"}', 1455324529),
(1195, 28, 1, 0, '{"condition":{"like__account_basic_information__first_name__CONCAT__account_basic_information__middle_name__CONCAT__account_basic_information__last_name":["nry",""]}}', 1455324546),
(1196, 28, 1, 0, '[]', 1455324554),
(1197, 28, 1, 0, '{"condition":{"0":"","test":"1"},"limit":"20","offset":"0"}', 1455324589),
(1198, 28, 1, 0, '{"condition":{"0":"","test":"1"},"limit":"20","offset":"0"}', 1455324614),
(1199, 28, 1, 0, '{"condition":{"0":"","test":"1"},"limit":"20","offset":"0"}', 1455324639),
(1200, 28, 1, 0, '{"condition":{"0":"","test":"1"},"limit":"20","offset":"0"}', 1455324747),
(1201, 28, 1, 0, '{"condition":{"0":"","test":"1"},"limit":"20","offset":"0"}', 1455324748),
(1202, 28, 1, 0, '{"condition":{"0":"","test":"1"},"limit":"20","offset":"0"}', 1455324753),
(1203, 28, 1, 0, '{"condition":{"0":"id","test":"1"},"limit":"20","offset":"0"}', 1455324967),
(1204, 28, 1, 0, '{"condition":{"0":"id","test":"1"},"limit":"20","offset":"0"}', 1455324969),
(1205, 28, 1, 0, '{"condition":{"0":"ids","test":"1"},"limit":"20","offset":"0"}', 1455324972),
(1206, 28, 1, 0, '{"condition":{"0":"ids","test":"1"},"limit":"20","offset":"0"}', 1455324976),
(1207, 28, 1, 0, '{"condition":{"like__account_basic_information__first_name__CONCAT__account_basic_information__middle_name__CONCAT__account_basic_information__last_name":"id","test":"1"},"limit":"20","offset":"0"}', 1455325034),
(1208, 28, 1, 0, '{"condition":[""]}', 1455325055),
(1209, 28, 1, 0, '{"condition":["id"]}', 1455325059),
(1210, 28, 1, 0, '{"condition":["idss"]}', 1455325066),
(1211, 28, 1, 0, '{"condition":{"like__account_basic_information__first_name__CONCAT__account_basic_information__middle_name__CONCAT__account_basic_information__last_name":"id"}}', 1455325085),
(1212, 28, 1, 0, '{"condition":{"like__account_basic_information__first_name__CONCAT__account_basic_information__middle_name__CONCAT__account_basic_information__last_name":"tid"}}', 1455325099),
(1213, 28, 1, 0, '{"condition":{"like__account_basic_information__first_name__CONCAT__account_basic_information__middle_name__CONCAT__account_basic_information__last_name":"tid","test":"1"},"limit":"20","offset":"0"}', 1455325107),
(1214, 28, 1, 0, '{"condition":{"like__account_basic_information__first_name__CONCAT__account_basic_information__middle_name__CONCAT__account_basic_information__last_name":"","test":"1"},"limit":"20","offset":"0"}', 1455325506),
(1215, 28, 1, 0, '{"ID":"28"}', 1455325549),
(1216, 28, 1, 0, '{"ID":"28"}', 1455325549),
(1217, 28, 1, 0, '{"ID":"28"}', 1455325551),
(1218, 28, 1, 0, '{"ID":"28"}', 1455325552),
(1219, 28, 1, 0, '{"condition":{"like__account_basic_information__first_name__CONCAT__account_basic_information__middle_name__CONCAT__account_basic_information__last_name":"","test":"1"},"limit":"20","offset":"0"}', 1455325762),
(1220, 28, 1, 0, '{"condition":{"like__account_basic_information__first_name__CONCAT__account_basic_information__middle_name__CONCAT__account_basic_information__last_name":"","test":"1"},"limit":"20","offset":"0"}', 1455325838),
(1221, 28, 1, 0, '{"condition":{"like__account_basic_information__first_name__CONCAT__account_basic_information__middle_name__CONCAT__account_basic_information__last_name":"","test":"1"},"limit":"20","offset":"0","sort":{"ID":"asc","account_basic_information__last_name":"asc","account_basic_information__first_name":"asc"}}', 1455326307),
(1222, 28, 1, 0, '{"condition":{"like__account_basic_information__first_name__CONCAT__account_basic_information__middle_name__CONCAT__account_basic_information__last_name":"","test":"1"},"limit":"20","offset":"0","sort":{"ID":"asc"}}', 1455326329),
(1223, 28, 1, 0, '{"condition":{"like__account_basic_information__first_name__CONCAT__account_basic_information__middle_name__CONCAT__account_basic_information__last_name":"","test":"1"},"limit":"20","offset":"0","sort":{"ID":"asc"}}', 1455326354),
(1224, 28, 1, 0, '{"condition":{"like__account_basic_information__first_name__CONCAT__account_basic_information__middle_name__CONCAT__account_basic_information__last_name":"","test":"1"},"limit":"20","offset":"0","sort":{"ID":"desc"}}', 1455326362),
(1225, 28, 1, 0, '{"condition":{"like__account_basic_information__first_name__CONCAT__account_basic_information__middle_name__CONCAT__account_basic_information__last_name":"","test":"1"},"limit":"20","offset":"0","sort":{"ID":"desc"}}', 1455327557),
(1226, 28, 1, 0, '{"condition":{"like__account_basic_information__first_name__CONCAT__account_basic_information__middle_name__CONCAT__account_basic_information__last_name":"","test":"1"},"limit":"20","offset":"0","sort":{"ID":"desc"}}', 1455327886),
(1227, 28, 1, 0, '{"condition":{"like__account_basic_information__first_name__CONCAT__account_basic_information__middle_name__CONCAT__account_basic_information__last_name":"","test":"1"},"limit":"20","offset":"0","sort":{"ID":"asc"}}', 1455327888),
(1228, 28, 1, 0, '{"condition":{"like__account_basic_information__first_name__CONCAT__account_basic_information__middle_name__CONCAT__account_basic_information__last_name":"","test":"1"},"limit":"20","offset":"0","sort":{"ID":"asc"}}', 1455327891),
(1229, 28, 1, 0, '{"condition":{"like__account_basic_information__first_name__CONCAT__account_basic_information__middle_name__CONCAT__account_basic_information__last_name":"","test":"1"},"limit":"20","offset":"0","sort":{"ID":"asc"}}', 1455327893),
(1230, 28, 1, 0, '{"condition":{"like__account_basic_information__first_name__CONCAT__account_basic_information__middle_name__CONCAT__account_basic_information__last_name":"","test":"1"},"limit":"20","offset":"0","sort":{"username":"asc"}}', 1455327893),
(1231, 28, 1, 0, '{"condition":{"like__account_basic_information__first_name__CONCAT__account_basic_information__middle_name__CONCAT__account_basic_information__last_name":"","test":"1"},"limit":"20","offset":"0","sort":{"username":"asc"}}', 1455327894),
(1232, 28, 1, 0, '{"condition":{"like__account_basic_information__first_name__CONCAT__account_basic_information__middle_name__CONCAT__account_basic_information__last_name":"","test":"1"},"limit":"20","offset":"0","sort":{"username":"asc"}}', 1455327895),
(1233, 28, 1, 0, '{"condition":{"like__account_basic_information__first_name__CONCAT__account_basic_information__middle_name__CONCAT__account_basic_information__last_name":"","test":"1"},"limit":"20","offset":"0","sort":{"username":"asc"}}', 1455327895),
(1234, 28, 1, 0, '{"condition":{"like__account_basic_information__first_name__CONCAT__account_basic_information__middle_name__CONCAT__account_basic_information__last_name":"","test":"1"},"limit":"20","offset":"0","sort":{"username":"asc"}}', 1455327896),
(1235, 28, 1, 0, '{"condition":{"like__account_basic_information__first_name__CONCAT__account_basic_information__middle_name__CONCAT__account_basic_information__last_name":"","test":"1"},"limit":"20","offset":"0","sort":{"username":"asc"}}', 1455327896),
(1236, 28, 1, 0, '{"condition":{"like__account_basic_information__first_name__CONCAT__account_basic_information__middle_name__CONCAT__account_basic_information__last_name":"","test":"1"},"limit":"20","offset":"0","sort":{"account_basic_information__last_name":"asc","account_basic_information__first_name":"asc"}}', 1455327898),
(1237, 28, 1, 0, '{"condition":{"like__account_basic_information__first_name__CONCAT__account_basic_information__middle_name__CONCAT__account_basic_information__last_name":"","test":"1"},"limit":"20","offset":"0","sort":{"account_basic_information__last_name":"asc","account_basic_information__first_name":"asc"}}', 1455327898),
(1238, 28, 1, 0, '{"condition":{"like__account_basic_information__first_name__CONCAT__account_basic_information__middle_name__CONCAT__account_basic_information__last_name":"","test":"1"},"limit":"20","offset":"0","sort":{"ID":"asc"}}', 1455327899),
(1239, 28, 1, 0, '{"condition":{"like__account_basic_information__first_name__CONCAT__account_basic_information__middle_name__CONCAT__account_basic_information__last_name":"","test":"1"},"limit":"20","offset":"0","sort":{"ID":"asc"}}', 1455327901),
(1240, 28, 1, 0, '{"condition":{"like__account_basic_information__first_name__CONCAT__account_basic_information__middle_name__CONCAT__account_basic_information__last_name":"","test":"1"},"limit":"20","offset":"0","sort":{"ID":"desc"}}', 1455327963),
(1241, 28, 1, 0, '{"condition":{"like__account_basic_information__first_name__CONCAT__account_basic_information__middle_name__CONCAT__account_basic_information__last_name":"","test":"1"},"limit":"20","offset":"0","sort":{"username":"asc"}}', 1455327965),
(1242, 28, 1, 0, '{"condition":{"like__account_basic_information__first_name__CONCAT__account_basic_information__middle_name__CONCAT__account_basic_information__last_name":"","test":"1"},"limit":"20","offset":"0","sort":{"username":"asc"}}', 1455327972),
(1243, 28, 1, 0, '{"condition":{"like__account_basic_information__first_name__CONCAT__account_basic_information__middle_name__CONCAT__account_basic_information__last_name":"","test":"1"},"limit":"20","offset":"0","sort":{"username":"asc"}}', 1455327973),
(1244, 28, 1, 0, '{"condition":{"like__account_basic_information__first_name__CONCAT__account_basic_information__middle_name__CONCAT__account_basic_information__last_name":"","test":"1"},"limit":"20","offset":"0","sort":{"username":"asc"}}', 1455327973),
(1245, 28, 1, 0, '{"condition":{"like__account_basic_information__first_name__CONCAT__account_basic_information__middle_name__CONCAT__account_basic_information__last_name":"","test":"1"},"limit":"20","offset":"0","sort":{"username":"asc"}}', 1455327974),
(1246, 28, 1, 0, '{"condition":{"like__account_basic_information__first_name__CONCAT__account_basic_information__middle_name__CONCAT__account_basic_information__last_name":"","test":"1"},"limit":"20","offset":"0","sort":{"username":"asc"}}', 1455327974),
(1247, 28, 1, 0, '{"condition":{"like__account_basic_information__first_name__CONCAT__account_basic_information__middle_name__CONCAT__account_basic_information__last_name":"","test":"1"},"limit":"20","offset":"0","sort":{"username":"asc"}}', 1455327974),
(1248, 28, 1, 0, '{"condition":{"like__account_basic_information__first_name__CONCAT__account_basic_information__middle_name__CONCAT__account_basic_information__last_name":"","test":"1"},"limit":"20","offset":"0","sort":{"username":"asc"}}', 1455327974),
(1249, 28, 1, 0, '{"condition":{"like__account_basic_information__first_name__CONCAT__account_basic_information__middle_name__CONCAT__account_basic_information__last_name":"","test":"1"},"limit":"20","offset":"0","sort":{"username":"asc"}}', 1455327975),
(1250, 28, 1, 0, '{"condition":{"like__account_basic_information__first_name__CONCAT__account_basic_information__middle_name__CONCAT__account_basic_information__last_name":"","test":"1"},"limit":"20","offset":"0","sort":{"username":"asc"}}', 1455328010),
(1251, 28, 1, 0, '{"condition":{"like__account_basic_information__first_name__CONCAT__account_basic_information__middle_name__CONCAT__account_basic_information__last_name":"","test":"1"},"limit":"20","offset":"0","sort":{"username":"asc"}}', 1455328012),
(1252, 28, 1, 0, '{"condition":{"like__account_basic_information__first_name__CONCAT__account_basic_information__middle_name__CONCAT__account_basic_information__last_name":"","test":"1"},"limit":"20","offset":"0","sort":{"username":"asc"}}', 1455328055),
(1253, 28, 1, 0, '{"condition":{"like__account_basic_information__first_name__CONCAT__account_basic_information__middle_name__CONCAT__account_basic_information__last_name":"","test":"1"},"limit":"20","offset":"0","sort":{"username":"asc"}}', 1455328056),
(1254, 28, 1, 0, '{"condition":{"like__account_basic_information__first_name__CONCAT__account_basic_information__middle_name__CONCAT__account_basic_information__last_name":"","test":"1"},"limit":"20","offset":"0","sort":{"username":"asc"}}', 1455328057),
(1255, 28, 1, 0, '{"condition":{"like__account_basic_information__first_name__CONCAT__account_basic_information__middle_name__CONCAT__account_basic_information__last_name":"","test":"1"},"limit":"20","offset":"0","sort":{"username":"asc"}}', 1455328057),
(1256, 28, 1, 0, '{"condition":{"like__account_basic_information__first_name__CONCAT__account_basic_information__middle_name__CONCAT__account_basic_information__last_name":"","test":"1"},"limit":"20","offset":"0","sort":{"username":"asc"}}', 1455328057),
(1257, 28, 1, 0, '{"condition":{"like__account_basic_information__first_name__CONCAT__account_basic_information__middle_name__CONCAT__account_basic_information__last_name":"","test":"1"},"limit":"20","offset":"0","sort":{"username":"asc"}}', 1455328057),
(1258, 28, 1, 0, '{"condition":{"like__account_basic_information__first_name__CONCAT__account_basic_information__middle_name__CONCAT__account_basic_information__last_name":"","test":"1"},"limit":"20","offset":"0","sort":{"username":"asc"}}', 1455328058),
(1259, 28, 1, 0, '{"condition":{"like__account_basic_information__first_name__CONCAT__account_basic_information__middle_name__CONCAT__account_basic_information__last_name":"","test":"1"},"limit":"20","offset":"0","sort":{"username":"asc"}}', 1455328072),
(1260, 28, 1, 0, '{"condition":{"like__account_basic_information__first_name__CONCAT__account_basic_information__middle_name__CONCAT__account_basic_information__last_name":"","test":"1"},"limit":"20","offset":"0","sort":{"account_basic_information__last_name":"asc","account_basic_information__first_name":"asc"}}', 1455328074),
(1261, 28, 1, 0, '{"condition":{"like__account_basic_information__first_name__CONCAT__account_basic_information__middle_name__CONCAT__account_basic_information__last_name":"","test":"1"},"limit":"20","offset":"0","sort":{"account_basic_information__last_name":"asc","account_basic_information__first_name":"asc"}}', 1455328074),
(1262, 28, 1, 0, '{"condition":{"like__account_basic_information__first_name__CONCAT__account_basic_information__middle_name__CONCAT__account_basic_information__last_name":"","test":"1"},"limit":"20","offset":"0","sort":{"username":"asc"}}', 1455328159),
(1263, 28, 1, 0, '{"condition":{"like__account_basic_information__first_name__CONCAT__account_basic_information__middle_name__CONCAT__account_basic_information__last_name":"","test":"1"},"limit":"20","offset":"0","sort":{"username":"desc"}}', 1455328160),
(1264, 28, 1, 0, '{"condition":{"like__account_basic_information__first_name__CONCAT__account_basic_information__middle_name__CONCAT__account_basic_information__last_name":"","test":"1"},"limit":"20","offset":"0"}', 1455328161),
(1265, 28, 1, 0, '{"condition":{"like__account_basic_information__first_name__CONCAT__account_basic_information__middle_name__CONCAT__account_basic_information__last_name":"","test":"1"},"limit":"20","offset":"0","sort":{"username":"asc"}}', 1455328162),
(1266, 28, 1, 0, '{"condition":{"like__account_basic_information__first_name__CONCAT__account_basic_information__middle_name__CONCAT__account_basic_information__last_name":"","test":"1"},"limit":"20","offset":"0","sort":{"username":"desc"}}', 1455328162),
(1267, 28, 1, 0, '{"condition":{"like__account_basic_information__first_name__CONCAT__account_basic_information__middle_name__CONCAT__account_basic_information__last_name":"","test":"1"},"limit":"20","offset":"0"}', 1455328164),
(1268, 28, 1, 0, '{"condition":{"like__account_basic_information__first_name__CONCAT__account_basic_information__middle_name__CONCAT__account_basic_information__last_name":"","test":"1"},"limit":"20","offset":"0","sort":{"username":"asc"}}', 1455328164),
(1269, 28, 1, 0, '{"condition":{"like__account_basic_information__first_name__CONCAT__account_basic_information__middle_name__CONCAT__account_basic_information__last_name":"","test":"1"},"limit":"20","offset":"0","sort":{"username":"desc"}}', 1455328165),
(1270, 28, 1, 0, '{"condition":{"like__account_basic_information__first_name__CONCAT__account_basic_information__middle_name__CONCAT__account_basic_information__last_name":"","test":"1"},"limit":"20","offset":"0"}', 1455328166),
(1271, 28, 1, 0, '{"condition":{"like__account_basic_information__first_name__CONCAT__account_basic_information__middle_name__CONCAT__account_basic_information__last_name":"","test":"1"},"limit":"20","offset":"0","sort":{"username":"asc"}}', 1455328179),
(1272, 28, 1, 0, '{"condition":{"like__account_basic_information__first_name__CONCAT__account_basic_information__middle_name__CONCAT__account_basic_information__last_name":"","test":"1"},"limit":"20","offset":"0","sort":{"username":"desc"}}', 1455328180),
(1273, 28, 1, 0, '{"condition":{"like__account_basic_information__first_name__CONCAT__account_basic_information__middle_name__CONCAT__account_basic_information__last_name":"","test":"1"},"limit":"20","offset":"0"}', 1455328180),
(1274, 28, 1, 0, '{"condition":{"like__account_basic_information__first_name__CONCAT__account_basic_information__middle_name__CONCAT__account_basic_information__last_name":"","test":"1"},"limit":"20","offset":"0","sort":{"username":"asc"}}', 1455328181),
(1275, 28, 1, 0, '{"condition":{"like__account_basic_information__first_name__CONCAT__account_basic_information__middle_name__CONCAT__account_basic_information__last_name":"","test":"1"},"limit":"20","offset":"0","sort":{"username":"desc"}}', 1455328183),
(1276, 28, 1, 0, '{"condition":{"like__account_basic_information__first_name__CONCAT__account_basic_information__middle_name__CONCAT__account_basic_information__last_name":"","test":"1"},"limit":"20","offset":"0"}', 1455328184),
(1277, 28, 1, 0, '{"condition":{"like__account_basic_information__first_name__CONCAT__account_basic_information__middle_name__CONCAT__account_basic_information__last_name":"","test":"1"},"limit":"20","offset":"0","sort":{"account_basic_information__last_name":"asc","account_basic_information__first_name":"asc"}}', 1455328351),
(1278, 28, 1, 0, '{"condition":{"like__account_basic_information__first_name__CONCAT__account_basic_information__middle_name__CONCAT__account_basic_information__last_name":"","test":"1"},"limit":"20","offset":"0","sort":{"account_basic_information__last_name":"desc","account_basic_information__first_name":"desc"}}', 1455328353),
(1279, 28, 1, 0, '{"condition":{"like__account_basic_information__first_name__CONCAT__account_basic_information__middle_name__CONCAT__account_basic_information__last_name":"","test":"1"},"limit":"20","offset":"0"}', 1455328354),
(1280, 28, 1, 0, '{"condition":{"like__account_basic_information__first_name__CONCAT__account_basic_information__middle_name__CONCAT__account_basic_information__last_name":"","test":"1"},"limit":"20","offset":"0","sort":{"account_basic_information__last_name":"asc","account_basic_information__first_name":"asc"}}', 1455328355),
(1281, 28, 1, 0, '{"condition":{"like__account_basic_information__first_name__CONCAT__account_basic_information__middle_name__CONCAT__account_basic_information__last_name":"","test":"1"},"limit":"20","offset":"0","sort":{"account_basic_information__last_name":"desc","account_basic_information__first_name":"desc"}}', 1455328356),
(1282, 28, 1, 0, '{"condition":{"like__account_basic_information__first_name__CONCAT__account_basic_information__middle_name__CONCAT__account_basic_information__last_name":"","test":"1"},"limit":"20","offset":"0","sort":{"username":"asc"}}', 1455328378),
(1283, 28, 1, 0, '{"condition":{"like__account_basic_information__first_name__CONCAT__account_basic_information__middle_name__CONCAT__account_basic_information__last_name":"","test":"1"},"limit":"20","offset":"0","sort":{"account_basic_information__last_name":"asc","account_basic_information__first_name":"asc"}}', 1455328380),
(1284, 28, 1, 0, '{"condition":{"like__account_basic_information__first_name__CONCAT__account_basic_information__middle_name__CONCAT__account_basic_information__last_name":"","test":"1"},"limit":"20","offset":"0","sort":{"account_basic_information__last_name":"desc","account_basic_information__first_name":"desc"}}', 1455328380),
(1285, 28, 1, 0, '{"condition":{"like__account_basic_information__first_name__CONCAT__account_basic_information__middle_name__CONCAT__account_basic_information__last_name":"","test":"1"},"limit":"20","offset":"0","sort":{"username":"asc"}}', 1455328381),
(1286, 28, 1, 0, '{"condition":{"like__account_basic_information__first_name__CONCAT__account_basic_information__middle_name__CONCAT__account_basic_information__last_name":"","test":"1"},"limit":"20","offset":"0","sort":{"username":"desc"}}', 1455328381),
(1287, 28, 1, 0, '{"condition":{"like__account_basic_information__first_name__CONCAT__account_basic_information__middle_name__CONCAT__account_basic_information__last_name":"","test":"1"},"limit":"20","offset":"0","sort":{"ID":"asc"}}', 1455328382),
(1288, 28, 1, 0, '{"condition":{"like__account_basic_information__first_name__CONCAT__account_basic_information__middle_name__CONCAT__account_basic_information__last_name":"","test":"1"},"limit":"20","offset":"0","sort":{"ID":"desc"}}', 1455328382),
(1289, 28, 1, 0, '{"condition":{"like__account_basic_information__first_name__CONCAT__account_basic_information__middle_name__CONCAT__account_basic_information__last_name":"","test":"1"},"limit":"20","offset":"0","sort":{"account_basic_information__last_name":"asc","account_basic_information__first_name":"asc"}}', 1455328384),
(1290, 28, 1, 0, '{"condition":{"like__account_basic_information__first_name__CONCAT__account_basic_information__middle_name__CONCAT__account_basic_information__last_name":"","test":"1"},"limit":"20","offset":"0","sort":{"account_basic_information__last_name":"desc","account_basic_information__first_name":"desc"}}', 1455328384),
(1291, 28, 1, 0, '{"condition":{"like__account_basic_information__first_name__CONCAT__account_basic_information__middle_name__CONCAT__account_basic_information__last_name":"","test":"1"},"limit":"20","offset":"0","sort":{"username":"asc"}}', 1455328721),
(1292, 28, 1, 0, '{"condition":{"like__account_basic_information__first_name__CONCAT__account_basic_information__middle_name__CONCAT__account_basic_information__last_name":"","test":"1"},"limit":"20","offset":"0","sort":{"ID":"desc"}}', 1455328832),
(1293, 28, 1, 0, '{"condition":{"like__account_basic_information__first_name__CONCAT__account_basic_information__middle_name__CONCAT__account_basic_information__last_name":"","test":"1"},"limit":"20","offset":"0"}', 1455328851),
(1294, 28, 1, 0, '{"condition":{"like__account_basic_information__first_name__CONCAT__account_basic_information__middle_name__CONCAT__account_basic_information__last_name":"","test":"1"},"limit":"20","offset":"0","sort":{"ID":"asc"}}', 1455328851),
(1295, 28, 1, 0, '{"condition":{"like__account_basic_information__first_name__CONCAT__account_basic_information__middle_name__CONCAT__account_basic_information__last_name":"","test":"1"},"limit":"20","offset":"0","sort":{"ID":"desc"}}', 1455328852),
(1296, 28, 1, 0, '{"condition":{"like__account_basic_information__first_name__CONCAT__account_basic_information__middle_name__CONCAT__account_basic_information__last_name":"","test":"1"},"limit":"20","offset":"0","sort":{"account_basic_information__last_name":"asc","account_basic_information__first_name":"asc"}}', 1455328854),
(1297, 28, 1, 0, '{"condition":{"like__account_basic_information__first_name__CONCAT__account_basic_information__middle_name__CONCAT__account_basic_information__last_name":"","test":"1"},"limit":"20","offset":"0","sort":{"account_basic_information__last_name":"desc","account_basic_information__first_name":"desc"}}', 1455328854),
(1298, 28, 1, 0, '{"condition":{"like__account_basic_information__first_name__CONCAT__account_basic_information__middle_name__CONCAT__account_basic_information__last_name":"","test":"1"},"limit":"20","offset":"0","sort":{"ID":"desc"}}', 1455330199),
(1299, 28, 1, 0, '{"condition":{"like__account_basic_information__first_name__CONCAT__account_basic_information__middle_name__CONCAT__account_basic_information__last_name":"","test":"1"},"limit":"20","offset":"0","sort":{"ID":"desc"}}', 1455330256),
(1300, 28, 1, 0, '{"condition":{"like__account_basic_information__first_name__CONCAT__account_basic_information__middle_name__CONCAT__account_basic_information__last_name":"","test":"1"},"limit":"20","offset":"0","sort":{"ID":"desc"}}', 1455330368),
(1301, 28, 1, 0, '{"condition":{"like__account_basic_information__first_name__CONCAT__account_basic_information__middle_name__CONCAT__account_basic_information__last_name":"","test":"1"},"limit":"20"}', 1455330371),
(1302, 28, 1, 0, '{"condition":{"like__account_basic_information__first_name__CONCAT__account_basic_information__middle_name__CONCAT__account_basic_information__last_name":"","test":"1"},"limit":"20"}', 1455330379),
(1303, 28, 1, 0, '{"condition":{"like__account_basic_information__first_name__CONCAT__account_basic_information__middle_name__CONCAT__account_basic_information__last_name":"","test":"1"},"limit":"20","offset":"0","sort":{"ID":"desc"}}', 1455330380),
(1304, 28, 1, 0, '{"condition":{"like__account_basic_information__first_name__CONCAT__account_basic_information__middle_name__CONCAT__account_basic_information__last_name":"","test":"1"},"limit":"20","offset":"0","sort":{"ID":"desc"}}', 1455330382),
(1305, 28, 1, 0, '{"condition":{"like__account_basic_information__first_name__CONCAT__account_basic_information__middle_name__CONCAT__account_basic_information__last_name":"","test":"1"},"limit":"20","offset":"0","sort":{"ID":"desc"}}', 1455330383),
(1306, 28, 1, 0, '{"condition":{"like__account_basic_information__first_name__CONCAT__account_basic_information__middle_name__CONCAT__account_basic_information__last_name":"","test":"1"},"limit":"20"}', 1455330632),
(1307, 28, 1, 0, '{"condition":{"like__account_basic_information__first_name__CONCAT__account_basic_information__middle_name__CONCAT__account_basic_information__last_name":"","test":"1"},"limit":"20","offset":"0","sort":{"ID":"desc"}}', 1455330633),
(1308, 28, 1, 0, '{"condition":{"like__account_basic_information__first_name__CONCAT__account_basic_information__middle_name__CONCAT__account_basic_information__last_name":"","test":"1"},"limit":"20"}', 1455330644),
(1309, 28, 1, 0, '{"condition":{"like__account_basic_information__first_name__CONCAT__account_basic_information__middle_name__CONCAT__account_basic_information__last_name":"","test":"1"},"limit":"20","offset":"0","sort":{"ID":"desc"}}', 1455330644),
(1310, 28, 1, 0, '{"condition":{"like__account_basic_information__first_name__CONCAT__account_basic_information__middle_name__CONCAT__account_basic_information__last_name":"","test":"1"},"limit":"20"}', 1455330661),
(1311, 28, 1, 0, '{"condition":{"like__account_basic_information__first_name__CONCAT__account_basic_information__middle_name__CONCAT__account_basic_information__last_name":"","test":"1"},"limit":"20"}', 1455330682),
(1312, 28, 1, 0, '{"condition":{"like__account_basic_information__first_name__CONCAT__account_basic_information__middle_name__CONCAT__account_basic_information__last_name":"","test":"1"},"limit":"20","offset":"0","sort":{"ID":"desc"}}', 1455330682),
(1313, 28, 1, 0, '{"ID":"28"}', 1455331053),
(1314, 28, 1, 0, '{"ID":"28"}', 1455331054),
(1315, 28, 1, 0, '{"ID":"28"}', 1455331055),
(1316, 28, 1, 0, '{"ID":"28"}', 1455331060),
(1317, 28, 1, 0, '{"ID":"28"}', 1455331063),
(1318, 28, 1, 0, '{"ID":"28"}', 1455331065),
(1319, 28, 1, 0, '{"ID":"28"}', 1455331067),
(1320, 28, 1, 0, '{"ID":"28"}', 1455331069),
(1321, 28, 1, 0, '{"ID":"28"}', 1455331187),
(1322, 28, 1, 0, '{"ID":"28"}', 1455331189),
(1323, 28, 1, 0, '{"ID":"28"}', 1455331190),
(1324, 28, 1, 0, '{"ID":"28"}', 1455331190),
(1325, 28, 1, 0, '{"ID":"28"}', 1455331192),
(1326, 28, 1, 0, '{"ID":"28"}', 1455331192),
(1327, 28, 1, 0, '{"ID":"28"}', 1455331192),
(1328, 28, 1, 0, '{"ID":"28"}', 1455331193),
(1329, 28, 1, 0, '{"ID":"28"}', 1455331194),
(1330, 28, 1, 0, '{"ID":"28"}', 1455331197),
(1331, 28, 1, 0, '{"ID":"28"}', 1455331209),
(1332, 28, 1, 0, '{"ID":"28"}', 1455331210),
(1333, 28, 1, 0, '{"condition":{"like__account_basic_information__first_name__CONCAT__account_basic_information__middle_name__CONCAT__account_basic_information__last_name":"","test":"1"},"limit":"20"}', 1455331391),
(1334, 28, 1, 0, '{"condition":{"like__account_basic_information__first_name__CONCAT__account_basic_information__middle_name__CONCAT__account_basic_information__last_name":"","test":"1"},"limit":"20","offset":"0","sort":{"ID":"desc"}}', 1455331392),
(1335, 28, 1, 0, '{"condition":{"like__account_basic_information__first_name__CONCAT__account_basic_information__middle_name__CONCAT__account_basic_information__last_name":"","test":"1"},"limit":"20"}', 1455331472),
(1336, 28, 1, 0, '{"condition":{"like__account_basic_information__first_name__CONCAT__account_basic_information__middle_name__CONCAT__account_basic_information__last_name":"","test":"1"},"limit":"20","offset":"0","sort":{"ID":"desc"}}', 1455331472),
(1337, 28, 1, 0, '{"ID":"28"}', 1455331475),
(1338, 28, 1, 0, '{"ID":"28"}', 1455331475),
(1339, 28, 1, 0, '{"ID":"28"}', 1455331479),
(1340, 28, 1, 0, '{"ID":"28"}', 1455331479),
(1341, 28, 1, 0, '{"ID":"28"}', 1455331480),
(1342, 28, 1, 0, '{"ID":"28"}', 1455331481),
(1343, 28, 1, 0, '{"ID":"28"}', 1455331481),
(1344, 28, 1, 0, '{"ID":"28"}', 1455331482),
(1345, 28, 1, 0, '{"ID":"28"}', 1455331483),
(1346, 28, 1, 0, '{"ID":"28"}', 1455331485),
(1347, 28, 1, 0, '{"ID":"28"}', 1455331485),
(1348, 28, 1, 0, '{"ID":"28"}', 1455331486),
(1349, 28, 1, 0, '{"ID":"28"}', 1455331487),
(1350, 28, 1, 0, '{"ID":"28"}', 1455331488),
(1351, 28, 1, 0, '{"ID":"28"}', 1455331490),
(1352, 28, 1, 0, '{"ID":"28"}', 1455331546),
(1353, 28, 1, 0, '{"ID":"28"}', 1455331546),
(1354, 28, 1, 0, '{"ID":"28"}', 1455331546),
(1355, 28, 1, 0, '{"ID":"28"}', 1455331551),
(1356, 28, 1, 0, '{"ID":"28"}', 1455331551),
(1357, 28, 1, 0, '{"ID":"28"}', 1455331551),
(1358, 28, 1, 0, '{"ID":"28"}', 1455331553),
(1359, 28, 1, 0, '{"ID":"28"}', 1455331553),
(1360, 28, 1, 0, '{"condition":{"like__account_basic_information__first_name__CONCAT__account_basic_information__middle_name__CONCAT__account_basic_information__last_name":"","test":"1"},"limit":"20"}', 1455331553),
(1361, 28, 1, 0, '{"condition":{"like__account_basic_information__first_name__CONCAT__account_basic_information__middle_name__CONCAT__account_basic_information__last_name":"","test":"1"},"limit":"20","offset":"0","sort":{"ID":"desc"}}', 1455331553),
(1362, 28, 1, 0, '{"ID":"28"}', 1455331554),
(1363, 28, 1, 0, '{"ID":"28"}', 1455331554),
(1364, 28, 1, 0, '{"ID":"28"}', 1455331554),
(1365, 28, 1, 0, '{"ID":"28"}', 1455331555),
(1366, 28, 1, 0, '{"condition":{"like__account_basic_information__first_name__CONCAT__account_basic_information__middle_name__CONCAT__account_basic_information__last_name":"","test":"1"},"limit":"20"}', 1455331558),
(1367, 28, 1, 0, '{"condition":{"like__account_basic_information__first_name__CONCAT__account_basic_information__middle_name__CONCAT__account_basic_information__last_name":"","test":"1"},"limit":"20","offset":"0","sort":{"ID":"desc"}}', 1455331558),
(1368, 28, 1, 0, '{"ID":"28"}', 1455331559),
(1369, 28, 1, 0, '{"ID":"28"}', 1455331559),
(1370, 28, 1, 0, '{"ID":"28"}', 1455331560),
(1371, 28, 1, 0, '{"ID":"28"}', 1455331562),
(1372, 28, 1, 0, '{"ID":"28"}', 1455331563),
(1373, 28, 1, 0, '{"ID":"28"}', 1455331568),
(1374, 28, 1, 0, '{"condition":{"like__account_basic_information__first_name__CONCAT__account_basic_information__middle_name__CONCAT__account_basic_information__last_name":"","test":"1"},"limit":"20"}', 1455331602),
(1375, 28, 1, 0, '{"condition":{"like__account_basic_information__first_name__CONCAT__account_basic_information__middle_name__CONCAT__account_basic_information__last_name":"","test":"1"},"limit":"20","offset":"0","sort":{"ID":"desc"}}', 1455331602),
(1376, 28, 1, 0, '{"ID":"28"}', 1455331603),
(1377, 28, 1, 0, '{"ID":"28"}', 1455331603),
(1378, 28, 1, 0, '{"ID":"28"}', 1455331611),
(1379, 28, 1, 0, '{"ID":"28"}', 1455331611),
(1380, 28, 1, 0, '{"condition":{"like__account_basic_information__first_name__CONCAT__account_basic_information__middle_name__CONCAT__account_basic_information__last_name":"","test":"1"},"limit":"20"}', 1455331612),
(1381, 28, 1, 0, '{"condition":{"like__account_basic_information__first_name__CONCAT__account_basic_information__middle_name__CONCAT__account_basic_information__last_name":"","test":"1"},"limit":"20","offset":"0","sort":{"ID":"desc"}}', 1455331612),
(1382, 28, 1, 0, '{"ID":"28"}', 1455331612),
(1383, 28, 1, 0, '{"ID":"28"}', 1455331613),
(1384, 28, 1, 0, '{"condition":{"like__account_basic_information__first_name__CONCAT__account_basic_information__middle_name__CONCAT__account_basic_information__last_name":"","test":"1"},"limit":"20"}', 1455331643),
(1385, 28, 1, 0, '{"condition":{"like__account_basic_information__first_name__CONCAT__account_basic_information__middle_name__CONCAT__account_basic_information__last_name":"","test":"1"},"limit":"20","offset":"0","sort":{"ID":"desc"}}', 1455331643),
(1386, 28, 1, 0, '{"ID":"28"}', 1455331646),
(1387, 28, 1, 0, '{"ID":"28"}', 1455331646),
(1388, 28, 1, 0, '{"ID":"28"}', 1455331648),
(1389, 28, 1, 0, '{"ID":"28"}', 1455331650),
(1390, 28, 1, 0, '{"ID":"28"}', 1455331657),
(1391, 28, 1, 0, '{"ID":"28"}', 1455331658),
(1392, 28, 1, 0, '{"ID":"28"}', 1455331678),
(1393, 28, 1, 0, '{"ID":"28"}', 1455331680),
(1394, 28, 1, 0, '{"ID":"28"}', 1455331691),
(1395, 28, 1, 0, '{"condition":{"like__account_basic_information__first_name__CONCAT__account_basic_information__middle_name__CONCAT__account_basic_information__last_name":"","test":"1"},"limit":"20"}', 1455331813),
(1396, 28, 1, 0, '{"condition":{"like__account_basic_information__first_name__CONCAT__account_basic_information__middle_name__CONCAT__account_basic_information__last_name":"","test":"1"},"limit":"20","offset":"0","sort":{"ID":"desc"}}', 1455331813),
(1397, 28, 1, 0, '{"condition":{"like__account_basic_information__first_name__CONCAT__account_basic_information__middle_name__CONCAT__account_basic_information__last_name":"","test":"1"},"limit":"20"}', 1455331882),
(1398, 28, 1, 0, '{"condition":{"like__account_basic_information__first_name__CONCAT__account_basic_information__middle_name__CONCAT__account_basic_information__last_name":"","test":"1"},"limit":"20","offset":"0","sort":{"ID":"desc"}}', 1455331882),
(1399, 28, 1, 0, '{"condition":{"like__account_basic_information__first_name__CONCAT__account_basic_information__middle_name__CONCAT__account_basic_information__last_name":"","test":"1"},"limit":"20","offset":"0","sort":{"account_basic_information__last_name":"asc","account_basic_information__first_name":"asc"}}', 1455331977),
(1400, 28, 1, 0, '{"condition":{"like__account_basic_information__first_name__CONCAT__account_basic_information__middle_name__CONCAT__account_basic_information__last_name":"","test":"1"},"limit":"20","offset":"0","sort":{"account_basic_information__last_name":"desc","account_basic_information__first_name":"desc"}}', 1455331977),
(1401, 28, 1, 0, '{"condition":{"like__account_basic_information__first_name__CONCAT__account_basic_information__middle_name__CONCAT__account_basic_information__last_name":"","test":"1"},"limit":"20","offset":"0","sort":{"username":"asc"}}', 1455332009),
(1402, 28, 1, 0, '{"condition":{"like__account_basic_information__first_name__CONCAT__account_basic_information__middle_name__CONCAT__account_basic_information__last_name":"","test":"1"},"limit":"20","offset":"0","sort":{"username":"desc"}}', 1455332009),
(1403, 28, 1, 0, '{"condition":{"like__account_basic_information__first_name__CONCAT__account_basic_information__middle_name__CONCAT__account_basic_information__last_name":"","test":"1"},"limit":"20","offset":"0","sort":{"account_basic_information__last_name":"asc","account_basic_information__first_name":"asc"}}', 1455332010),
(1404, 28, 1, 0, '{"condition":{"like__account_basic_information__first_name__CONCAT__account_basic_information__middle_name__CONCAT__account_basic_information__last_name":"","test":"1"},"limit":"20","offset":"0","sort":{"account_basic_information__last_name":"desc","account_basic_information__first_name":"desc"}}', 1455332010),
(1405, 28, 1, 0, '{"condition":{"like__account_basic_information__first_name__CONCAT__account_basic_information__middle_name__CONCAT__account_basic_information__last_name":"","test":"1"},"limit":"20","offset":"0","sort":{"ID":"asc"}}', 1455332013),
(1406, 28, 1, 0, '{"condition":{"like__account_basic_information__first_name__CONCAT__account_basic_information__middle_name__CONCAT__account_basic_information__last_name":"","test":"1"},"limit":"20","offset":"0","sort":{"ID":"desc"}}', 1455332013),
(1407, 28, 1, 0, '{"condition":{"like__account_basic_information__first_name__CONCAT__account_basic_information__middle_name__CONCAT__account_basic_information__last_name":"","test":"1"},"limit":"20"}', 1455332079),
(1408, 28, 1, 0, '{"condition":{"like__account_basic_information__first_name__CONCAT__account_basic_information__middle_name__CONCAT__account_basic_information__last_name":"","test":"1"},"limit":"20","offset":"0","sort":{"ID":"desc"}}', 1455332079),
(1409, 28, 1, 0, '{"condition":{"like__account_basic_information__first_name__CONCAT__account_basic_information__middle_name__CONCAT__account_basic_information__last_name":"","test":"1"},"limit":"20"}', 1455332257),
(1410, 28, 1, 0, '{"condition":{"like__account_basic_information__first_name__CONCAT__account_basic_information__middle_name__CONCAT__account_basic_information__last_name":"","test":"1"},"limit":"20","offset":"0","sort":{"ID":"desc"}}', 1455332257),
(1411, 28, 1, 0, '{"condition":{"like__account_basic_information__first_name__CONCAT__account_basic_information__middle_name__CONCAT__account_basic_information__last_name":"","test":"1"},"limit":"20","offset":"0","sort":{"ID":"desc"}}', 1455332259),
(1412, 28, 1, 0, '{"condition":{"like__account_basic_information__first_name__CONCAT__account_basic_information__middle_name__CONCAT__account_basic_information__last_name":"","test":"1"},"limit":"20","offset":"0","sort":{"ID":"desc"}}', 1455332260),
(1413, 28, 1, 0, '{"condition":{"like__account_basic_information__first_name__CONCAT__account_basic_information__middle_name__CONCAT__account_basic_information__last_name":"","test":"1"},"limit":"20"}', 1455332284),
(1414, 28, 1, 0, '{"condition":{"like__account_basic_information__first_name__CONCAT__account_basic_information__middle_name__CONCAT__account_basic_information__last_name":"","test":"1"},"limit":"20","offset":"0","sort":{"ID":"desc"}}', 1455332285),
(1415, 28, 1, 0, '{"condition":{"like__account_basic_information__first_name__CONCAT__account_basic_information__middle_name__CONCAT__account_basic_information__last_name":"","test":"1"},"limit":"20","offset":"0","sort":{"ID":"desc"}}', 1455332286),
(1416, 28, 1, 0, '{"condition":{"like__account_basic_information__first_name__CONCAT__account_basic_information__middle_name__CONCAT__account_basic_information__last_name":"","test":"1"},"limit":"20","offset":"0","sort":{"ID":"desc"}}', 1455332287),
(1417, 28, 1, 0, '{"condition":{"like__account_basic_information__first_name__CONCAT__account_basic_information__middle_name__CONCAT__account_basic_information__last_name":"","test":"1"},"limit":"20","offset":"0","sort":{"ID":"desc"}}', 1455332287),
(1418, 28, 1, 0, '{"condition":{"like__account_basic_information__first_name__CONCAT__account_basic_information__middle_name__CONCAT__account_basic_information__last_name":"","test":"1"},"limit":"20","offset":"0","sort":{"ID":"desc"}}', 1455332288),
(1419, 28, 1, 0, '{"condition":{"like__account_basic_information__first_name__CONCAT__account_basic_information__middle_name__CONCAT__account_basic_information__last_name":"","test":"1"},"limit":"20","offset":"0","sort":{"ID":"desc"}}', 1455332288),
(1420, 28, 1, 0, '{"condition":{"like__account_basic_information__first_name__CONCAT__account_basic_information__middle_name__CONCAT__account_basic_information__last_name":"","test":"1"},"limit":"20","offset":"0","sort":{"ID":"desc"}}', 1455332289),
(1421, 28, 1, 0, '{"condition":{"like__account_basic_information__first_name__CONCAT__account_basic_information__middle_name__CONCAT__account_basic_information__last_name":"","test":"1"},"limit":"20"}', 1455374616),
(1422, 28, 1, 0, '{"condition":{"like__account_basic_information__first_name__CONCAT__account_basic_information__middle_name__CONCAT__account_basic_information__last_name":"","test":"1"},"limit":"20","offset":"0","sort":{"ID":"desc"}}', 1455374616),
(1423, 28, 1, 0, '{"condition":{"like__account_basic_information__first_name__CONCAT__account_basic_information__middle_name__CONCAT__account_basic_information__last_name":"","test":"1"},"limit":"20","offset":"0"}', 1455381668),
(1424, 28, 1, 0, '{"condition":{"like__account_basic_information__first_name__CONCAT__account_basic_information__middle_name__CONCAT__account_basic_information__last_name":"","test":"1"},"limit":"20","offset":"0","sort":{"ID":"asc"}}', 1455381668),
(1425, 28, 1, 0, '{"condition":{"like__account_basic_information__first_name__CONCAT__account_basic_information__middle_name__CONCAT__account_basic_information__last_name":"","test":"1"},"limit":"20","offset":"0","sort":{"ID":"desc"}}', 1455381669),
(1426, 28, 1, 0, '{"condition":{"like__account_basic_information__first_name__CONCAT__account_basic_information__middle_name__CONCAT__account_basic_information__last_name":"","test":"1"},"limit":"20","offset":"0"}', 1455381669),
(1427, 28, 1, 0, '{"condition":{"like__account_basic_information__first_name__CONCAT__account_basic_information__middle_name__CONCAT__account_basic_information__last_name":"","test":"1"},"limit":"20","offset":"0","sort":{"ID":"asc"}}', 1455381670),
(1428, 28, 1, 0, '{"condition":{"like__account_basic_information__first_name__CONCAT__account_basic_information__middle_name__CONCAT__account_basic_information__last_name":"","test":"1"},"limit":"20","offset":"0","sort":{"ID":"desc"}}', 1455381670),
(1429, 0, 1, 0, '30', 1455381784),
(1430, 28, 1, 0, '{"condition":{"like__account_basic_information__first_name__CONCAT__account_basic_information__middle_name__CONCAT__account_basic_information__last_name":"","test":"1"},"limit":"20"}', 1455381877),
(1431, 28, 1, 0, '{"condition":{"like__account_basic_information__first_name__CONCAT__account_basic_information__middle_name__CONCAT__account_basic_information__last_name":"","test":"1"},"limit":"20","offset":"0","sort":{"ID":"desc"}}', 1455381877),
(1432, 0, 1, 0, '31', 1455382009),
(1433, 28, 1, 0, '{"condition":{"like__account_basic_information__first_name__CONCAT__account_basic_information__middle_name__CONCAT__account_basic_information__last_name":"","test":"1"},"limit":"20"}', 1455382053),
(1434, 28, 1, 0, '{"condition":{"like__account_basic_information__first_name__CONCAT__account_basic_information__middle_name__CONCAT__account_basic_information__last_name":"","test":"1"},"limit":"20","offset":"0","sort":{"ID":"desc"}}', 1455382053),
(1435, 0, 1, 0, '32', 1455382083),
(1436, 28, 1, 0, '{"condition":{"like__account_basic_information__first_name__CONCAT__account_basic_information__middle_name__CONCAT__account_basic_information__last_name":"","test":"1"},"limit":"20"}', 1455382086),
(1437, 28, 1, 0, '{"condition":{"like__account_basic_information__first_name__CONCAT__account_basic_information__middle_name__CONCAT__account_basic_information__last_name":"","test":"1"},"limit":"20","offset":"0","sort":{"ID":"desc"}}', 1455382087),
(1438, 0, 1, 0, '33', 1455382108),
(1439, 28, 1, 0, '{"condition":{"like__account_basic_information__first_name__CONCAT__account_basic_information__middle_name__CONCAT__account_basic_information__last_name":"","test":"1"},"limit":"20","offset":"0","sort":{"ID":"desc"}}', 1455382111),
(1440, 0, 1, 0, '34', 1455382140),
(1441, 28, 1, 0, '{"condition":{"like__account_basic_information__first_name__CONCAT__account_basic_information__middle_name__CONCAT__account_basic_information__last_name":"","test":"1"},"limit":"20","offset":"0","sort":{"ID":"desc"}}', 1455382143),
(1442, 0, 1, 0, '35', 1455382172),
(1443, 0, 1, 0, '36', 1455382189),
(1444, 28, 1, 0, '{"condition":{"like__account_basic_information__first_name__CONCAT__account_basic_information__middle_name__CONCAT__account_basic_information__last_name":"","test":"1"},"limit":"20","offset":"0","sort":{"ID":"desc"}}', 1455382192),
(1445, 28, 1, 0, '{"condition":{"like__account_basic_information__first_name__CONCAT__account_basic_information__middle_name__CONCAT__account_basic_information__last_name":"","test":"1"},"limit":"3","offset":"0","sort":{"ID":"desc"}}', 1455382232),
(1446, 28, 1, 0, '{"condition":{"like__account_basic_information__first_name__CONCAT__account_basic_information__middle_name__CONCAT__account_basic_information__last_name":"","test":"1"},"limit":"3"}', 1455382232),
(1447, 28, 1, 0, '{"condition":{"like__account_basic_information__first_name__CONCAT__account_basic_information__middle_name__CONCAT__account_basic_information__last_name":"","test":"1"},"limit":"3","offset":"0","sort":{"ID":"desc"}}', 1455382714),
(1448, 28, 1, 0, '{"condition":{"like__account_basic_information__first_name__CONCAT__account_basic_information__middle_name__CONCAT__account_basic_information__last_name":"","test":"1"},"limit":"3"}', 1455382821),
(1449, 28, 1, 0, '{"condition":{"like__account_basic_information__first_name__CONCAT__account_basic_information__middle_name__CONCAT__account_basic_information__last_name":"","test":"1"},"limit":"3","offset":"0","sort":{"ID":"desc"}}', 1455382822),
(1450, 28, 1, 0, '{"condition":{"like__account_basic_information__first_name__CONCAT__account_basic_information__middle_name__CONCAT__account_basic_information__last_name":"","test":"1"},"limit":"3"}', 1455382871),
(1451, 28, 1, 0, '{"condition":{"like__account_basic_information__first_name__CONCAT__account_basic_information__middle_name__CONCAT__account_basic_information__last_name":"","test":"1"},"limit":"3","offset":"0","sort":{"ID":"desc"}}', 1455382871);
INSERT INTO `action_log` (`ID`, `account_ID`, `api_controller_ID`, `access_number_ID`, `detail`, `datetime`) VALUES
(1452, 28, 1, 0, '{"condition":{"like__account_basic_information__first_name__CONCAT__account_basic_information__middle_name__CONCAT__account_basic_information__last_name":"","test":"1"},"limit":"3"}', 1455382883),
(1453, 28, 1, 0, '{"condition":{"like__account_basic_information__first_name__CONCAT__account_basic_information__middle_name__CONCAT__account_basic_information__last_name":"","test":"1"},"limit":"3","offset":"0","sort":{"ID":"desc"}}', 1455382883),
(1454, 28, 1, 0, '{"condition":{"like__account_basic_information__first_name__CONCAT__account_basic_information__middle_name__CONCAT__account_basic_information__last_name":"","test":"1"},"limit":"3"}', 1455382896),
(1455, 28, 1, 0, '{"condition":{"like__account_basic_information__first_name__CONCAT__account_basic_information__middle_name__CONCAT__account_basic_information__last_name":"","test":"1"},"limit":"3","offset":"0","sort":{"ID":"desc"}}', 1455382896),
(1456, 28, 1, 0, '{"condition":{"like__account_basic_information__first_name__CONCAT__account_basic_information__middle_name__CONCAT__account_basic_information__last_name":"","test":"1"},"limit":"3"}', 1455382952),
(1457, 28, 1, 0, '{"condition":{"like__account_basic_information__first_name__CONCAT__account_basic_information__middle_name__CONCAT__account_basic_information__last_name":"","test":"1"},"limit":"3","offset":"0","sort":{"ID":"desc"}}', 1455382952),
(1458, 28, 1, 0, '{"condition":{"like__account_basic_information__first_name__CONCAT__account_basic_information__middle_name__CONCAT__account_basic_information__last_name":"","test":"1"},"limit":"3"}', 1455382997),
(1459, 28, 1, 0, '{"condition":{"like__account_basic_information__first_name__CONCAT__account_basic_information__middle_name__CONCAT__account_basic_information__last_name":"","test":"1"},"limit":"3","offset":"0","sort":{"ID":"desc"}}', 1455382997),
(1460, 28, 1, 0, '{"condition":{"like__account_basic_information__first_name__CONCAT__account_basic_information__middle_name__CONCAT__account_basic_information__last_name":"","test":"1"},"limit":"3"}', 1455383163),
(1461, 28, 1, 0, '{"condition":{"like__account_basic_information__first_name__CONCAT__account_basic_information__middle_name__CONCAT__account_basic_information__last_name":"","test":"1"},"limit":"3","offset":"0","sort":{"ID":"desc"}}', 1455383163),
(1462, 28, 1, 0, '{"condition":{"like__account_basic_information__first_name__CONCAT__account_basic_information__middle_name__CONCAT__account_basic_information__last_name":"","test":"1"},"limit":"3"}', 1455383270),
(1463, 28, 1, 0, '{"condition":{"like__account_basic_information__first_name__CONCAT__account_basic_information__middle_name__CONCAT__account_basic_information__last_name":"","test":"1"},"limit":"3","offset":"0","sort":{"ID":"desc"}}', 1455383270),
(1464, 28, 1, 0, '{"condition":{"like__account_basic_information__first_name__CONCAT__account_basic_information__middle_name__CONCAT__account_basic_information__last_name":"","test":"1"},"limit":"3"}', 1455383473),
(1465, 28, 1, 0, '{"condition":{"like__account_basic_information__first_name__CONCAT__account_basic_information__middle_name__CONCAT__account_basic_information__last_name":"","test":"1"},"limit":"3","offset":"0","sort":{"ID":"desc"}}', 1455383473),
(1466, 28, 1, 0, '{"condition":{"like__account_basic_information__first_name__CONCAT__account_basic_information__middle_name__CONCAT__account_basic_information__last_name":"","test":"1"},"limit":"3"}', 1455383501),
(1467, 28, 1, 0, '{"condition":{"like__account_basic_information__first_name__CONCAT__account_basic_information__middle_name__CONCAT__account_basic_information__last_name":"","test":"1"},"limit":"3","offset":"0","sort":{"ID":"desc"}}', 1455383501),
(1468, 28, 1, 0, '{"condition":{"like__account_basic_information__first_name__CONCAT__account_basic_information__middle_name__CONCAT__account_basic_information__last_name":"","test":"1"},"limit":"3"}', 1455383516),
(1469, 28, 1, 0, '{"condition":{"like__account_basic_information__first_name__CONCAT__account_basic_information__middle_name__CONCAT__account_basic_information__last_name":"","test":"1"},"limit":"3","offset":"0","sort":{"ID":"desc"}}', 1455383516),
(1470, 28, 1, 0, '{"condition":{"like__account_basic_information__first_name__CONCAT__account_basic_information__middle_name__CONCAT__account_basic_information__last_name":"","test":"1"},"limit":"3"}', 1455383534),
(1471, 28, 1, 0, '{"condition":{"like__account_basic_information__first_name__CONCAT__account_basic_information__middle_name__CONCAT__account_basic_information__last_name":"","test":"1"},"limit":"3","offset":"0","sort":{"ID":"desc"}}', 1455383534),
(1472, 28, 1, 0, '{"condition":{"like__account_basic_information__first_name__CONCAT__account_basic_information__middle_name__CONCAT__account_basic_information__last_name":"","test":"1"},"limit":"3"}', 1455383555),
(1473, 28, 1, 0, '{"condition":{"like__account_basic_information__first_name__CONCAT__account_basic_information__middle_name__CONCAT__account_basic_information__last_name":"","test":"1"},"limit":"3","offset":"0","sort":{"ID":"desc"}}', 1455383555),
(1474, 28, 1, 0, '{"condition":{"like__account_basic_information__first_name__CONCAT__account_basic_information__middle_name__CONCAT__account_basic_information__last_name":"","test":"1"},"limit":"3"}', 1455383602),
(1475, 28, 1, 0, '{"condition":{"like__account_basic_information__first_name__CONCAT__account_basic_information__middle_name__CONCAT__account_basic_information__last_name":"","test":"1"},"limit":"3","offset":"0","sort":{"ID":"desc"}}', 1455383602),
(1476, 28, 1, 0, '{"condition":{"like__account_basic_information__first_name__CONCAT__account_basic_information__middle_name__CONCAT__account_basic_information__last_name":"","test":"1"},"limit":"3"}', 1455383616),
(1477, 28, 1, 0, '{"condition":{"like__account_basic_information__first_name__CONCAT__account_basic_information__middle_name__CONCAT__account_basic_information__last_name":"","test":"1"},"limit":"3","offset":"0","sort":{"ID":"desc"}}', 1455383616),
(1478, 28, 1, 0, '{"condition":{"like__account_basic_information__first_name__CONCAT__account_basic_information__middle_name__CONCAT__account_basic_information__last_name":"","test":"1"},"limit":"3"}', 1455383643),
(1479, 28, 1, 0, '{"condition":{"like__account_basic_information__first_name__CONCAT__account_basic_information__middle_name__CONCAT__account_basic_information__last_name":"","test":"1"},"limit":"3","offset":"0","sort":{"ID":"desc"}}', 1455383643),
(1480, 28, 1, 0, '{"condition":{"like__account_basic_information__first_name__CONCAT__account_basic_information__middle_name__CONCAT__account_basic_information__last_name":"","test":"1"},"limit":"3"}', 1455383658),
(1481, 28, 1, 0, '{"condition":{"like__account_basic_information__first_name__CONCAT__account_basic_information__middle_name__CONCAT__account_basic_information__last_name":"","test":"1"},"limit":"3","offset":"0","sort":{"ID":"desc"}}', 1455383658),
(1482, 28, 1, 0, '{"condition":{"like__account_basic_information__first_name__CONCAT__account_basic_information__middle_name__CONCAT__account_basic_information__last_name":"","test":"1"},"limit":"3"}', 1455383664),
(1483, 28, 1, 0, '{"condition":{"like__account_basic_information__first_name__CONCAT__account_basic_information__middle_name__CONCAT__account_basic_information__last_name":"","test":"1"},"limit":"3","offset":"0","sort":{"ID":"desc"}}', 1455383664),
(1484, 28, 1, 0, '{"condition":{"like__account_basic_information__first_name__CONCAT__account_basic_information__middle_name__CONCAT__account_basic_information__last_name":"","test":"1"},"limit":"3"}', 1455383667),
(1485, 28, 1, 0, '{"condition":{"like__account_basic_information__first_name__CONCAT__account_basic_information__middle_name__CONCAT__account_basic_information__last_name":"","test":"1"},"limit":"3","offset":"0","sort":{"ID":"desc"}}', 1455383667),
(1486, 28, 1, 0, '{"condition":{"like__account_basic_information__first_name__CONCAT__account_basic_information__middle_name__CONCAT__account_basic_information__last_name":"","test":"1"},"limit":"3"}', 1455384246),
(1487, 28, 1, 0, '{"condition":{"like__account_basic_information__first_name__CONCAT__account_basic_information__middle_name__CONCAT__account_basic_information__last_name":"","test":"1"},"limit":"3","offset":"0","sort":{"ID":"desc"}}', 1455384246),
(1488, 28, 1, 0, '{"condition":{"like__account_basic_information__first_name__CONCAT__account_basic_information__middle_name__CONCAT__account_basic_information__last_name":"","test":"1"},"limit":"3","offset":"6","sort":{"ID":"desc"}}', 1455384255),
(1489, 28, 1, 0, '{"condition":{"like__account_basic_information__first_name__CONCAT__account_basic_information__middle_name__CONCAT__account_basic_information__last_name":"","test":"1"},"limit":"3"}', 1455384274),
(1490, 28, 1, 0, '{"condition":{"like__account_basic_information__first_name__CONCAT__account_basic_information__middle_name__CONCAT__account_basic_information__last_name":"","test":"1"},"limit":"3","offset":"0","sort":{"ID":"desc"}}', 1455384274),
(1491, 28, 1, 0, '{"condition":{"like__account_basic_information__first_name__CONCAT__account_basic_information__middle_name__CONCAT__account_basic_information__last_name":"","test":"1"},"limit":"3"}', 1455384303),
(1492, 28, 1, 0, '{"condition":{"like__account_basic_information__first_name__CONCAT__account_basic_information__middle_name__CONCAT__account_basic_information__last_name":"","test":"1"},"limit":"3","offset":"0","sort":{"ID":"desc"}}', 1455384303),
(1493, 28, 1, 0, '{"condition":{"like__account_basic_information__first_name__CONCAT__account_basic_information__middle_name__CONCAT__account_basic_information__last_name":"","test":"1"},"limit":"3","offset":"6","sort":{"ID":"desc"}}', 1455384305),
(1494, 28, 1, 0, '{"condition":{"like__account_basic_information__first_name__CONCAT__account_basic_information__middle_name__CONCAT__account_basic_information__last_name":"","test":"1"},"limit":"3","offset":"3","sort":{"ID":"desc"}}', 1455384307),
(1495, 28, 1, 0, '{"condition":{"like__account_basic_information__first_name__CONCAT__account_basic_information__middle_name__CONCAT__account_basic_information__last_name":"","test":"1"},"limit":"3","offset":"6","sort":{"ID":"desc"}}', 1455384309),
(1496, 28, 1, 0, '{"condition":{"like__account_basic_information__first_name__CONCAT__account_basic_information__middle_name__CONCAT__account_basic_information__last_name":"","test":"1"},"limit":"3","offset":"6","sort":{"ID":"desc"}}', 1455384311),
(1497, 28, 1, 0, '{"condition":{"like__account_basic_information__first_name__CONCAT__account_basic_information__middle_name__CONCAT__account_basic_information__last_name":"","test":"1"},"limit":"3","offset":"3","sort":{"ID":"desc"}}', 1455384314),
(1498, 28, 1, 0, '{"condition":{"like__account_basic_information__first_name__CONCAT__account_basic_information__middle_name__CONCAT__account_basic_information__last_name":"","test":"1"},"limit":"3","offset":"3"}', 1455384323),
(1499, 28, 1, 0, '{"condition":{"like__account_basic_information__first_name__CONCAT__account_basic_information__middle_name__CONCAT__account_basic_information__last_name":"","test":"1"},"limit":"3","offset":"3","sort":{"ID":"asc"}}', 1455384324),
(1500, 28, 1, 0, '{"condition":{"like__account_basic_information__first_name__CONCAT__account_basic_information__middle_name__CONCAT__account_basic_information__last_name":"","test":"1"},"limit":"3","offset":"3","sort":{"ID":"desc"}}', 1455384325),
(1501, 28, 1, 0, '{"condition":{"like__account_basic_information__first_name__CONCAT__account_basic_information__middle_name__CONCAT__account_basic_information__last_name":"","test":"1"},"limit":"3","offset":"3"}', 1455384327),
(1502, 28, 1, 0, '{"condition":{"like__account_basic_information__first_name__CONCAT__account_basic_information__middle_name__CONCAT__account_basic_information__last_name":"","test":"1"},"limit":"3","offset":"3","sort":{"ID":"asc"}}', 1455384328),
(1503, 28, 1, 0, '{"condition":{"like__account_basic_information__first_name__CONCAT__account_basic_information__middle_name__CONCAT__account_basic_information__last_name":"","test":"1"},"limit":"3","offset":"3","sort":{"ID":"desc"}}', 1455384330),
(1504, 28, 1, 0, '{"condition":{"like__account_basic_information__first_name__CONCAT__account_basic_information__middle_name__CONCAT__account_basic_information__last_name":"","test":"1"},"limit":"3","offset":"3"}', 1455384331),
(1505, 28, 1, 0, '{"condition":{"like__account_basic_information__first_name__CONCAT__account_basic_information__middle_name__CONCAT__account_basic_information__last_name":"","test":"1"},"limit":"3","offset":"3","sort":{"ID":"asc"}}', 1455384332),
(1506, 28, 1, 0, '{"condition":{"like__account_basic_information__first_name__CONCAT__account_basic_information__middle_name__CONCAT__account_basic_information__last_name":"","test":"1"},"limit":"3","offset":"3","sort":{"ID":"desc"}}', 1455384333),
(1507, 28, 1, 0, '{"condition":{"like__account_basic_information__first_name__CONCAT__account_basic_information__middle_name__CONCAT__account_basic_information__last_name":"","test":"1"},"limit":"3","offset":"3"}', 1455384334),
(1508, 28, 1, 0, '{"condition":{"like__account_basic_information__first_name__CONCAT__account_basic_information__middle_name__CONCAT__account_basic_information__last_name":"","test":"1"},"limit":"3","offset":"3","sort":{"ID":"asc"}}', 1455384335),
(1509, 28, 1, 0, '{"condition":{"like__account_basic_information__first_name__CONCAT__account_basic_information__middle_name__CONCAT__account_basic_information__last_name":"","test":"1"},"limit":"3","offset":"3","sort":{"ID":"desc"}}', 1455384345),
(1510, 28, 1, 0, '{"condition":{"like__account_basic_information__first_name__CONCAT__account_basic_information__middle_name__CONCAT__account_basic_information__last_name":"","test":"1"},"limit":"3","offset":"3"}', 1455384349),
(1511, 28, 1, 0, '{"condition":{"like__account_basic_information__first_name__CONCAT__account_basic_information__middle_name__CONCAT__account_basic_information__last_name":"","test":"1"},"limit":"3","offset":"3","sort":{"ID":"asc"}}', 1455384352),
(1512, 28, 1, 0, '{"condition":{"like__account_basic_information__first_name__CONCAT__account_basic_information__middle_name__CONCAT__account_basic_information__last_name":"","test":"1"},"limit":"3","offset":"6","sort":{"ID":"asc"}}', 1455384357),
(1513, 28, 1, 0, '{"condition":{"like__account_basic_information__first_name__CONCAT__account_basic_information__middle_name__CONCAT__account_basic_information__last_name":"","test":"1"},"limit":"3","offset":"6","sort":{"ID":"asc"}}', 1455384364),
(1514, 28, 1, 0, '{"condition":{"like__account_basic_information__first_name__CONCAT__account_basic_information__middle_name__CONCAT__account_basic_information__last_name":"","test":"1"},"limit":"3","offset":"3","sort":{"ID":"asc"}}', 1455384365),
(1515, 28, 1, 0, '{"condition":{"like__account_basic_information__first_name__CONCAT__account_basic_information__middle_name__CONCAT__account_basic_information__last_name":"","test":"1"},"limit":"3"}', 1455384384),
(1516, 28, 1, 0, '{"condition":{"like__account_basic_information__first_name__CONCAT__account_basic_information__middle_name__CONCAT__account_basic_information__last_name":"","test":"1"},"limit":"3"}', 1455384431),
(1517, 28, 1, 0, '{"condition":{"like__account_basic_information__first_name__CONCAT__account_basic_information__middle_name__CONCAT__account_basic_information__last_name":"","test":"1"},"limit":"3","offset":"0","sort":{"ID":"desc"}}', 1455384431),
(1518, 28, 1, 0, '{"condition":{"like__account_basic_information__first_name__CONCAT__account_basic_information__middle_name__CONCAT__account_basic_information__last_name":"","test":"1"},"limit":"3","offset":"6","sort":{"ID":"desc"}}', 1455384436),
(1519, 28, 1, 0, '{"condition":{"like__account_basic_information__first_name__CONCAT__account_basic_information__middle_name__CONCAT__account_basic_information__last_name":"","test":"1"},"limit":"3"}', 1455384479),
(1520, 28, 1, 0, '{"condition":{"like__account_basic_information__first_name__CONCAT__account_basic_information__middle_name__CONCAT__account_basic_information__last_name":"","test":"1"},"limit":"3","offset":"0","sort":{"ID":"desc"}}', 1455384479),
(1521, 28, 1, 0, '{"condition":{"like__account_basic_information__first_name__CONCAT__account_basic_information__middle_name__CONCAT__account_basic_information__last_name":"","test":"1"},"limit":"3","offset":"3","sort":{"ID":"desc"}}', 1455384482),
(1522, 28, 1, 0, '{"condition":{"like__account_basic_information__first_name__CONCAT__account_basic_information__middle_name__CONCAT__account_basic_information__last_name":"","test":"1"},"limit":"3","offset":"6","sort":{"ID":"desc"}}', 1455384483),
(1523, 28, 1, 0, '{"condition":{"like__account_basic_information__first_name__CONCAT__account_basic_information__middle_name__CONCAT__account_basic_information__last_name":"","test":"1"},"limit":"3"}', 1455384506),
(1524, 28, 1, 0, '{"condition":{"like__account_basic_information__first_name__CONCAT__account_basic_information__middle_name__CONCAT__account_basic_information__last_name":"","test":"1"},"limit":"3","offset":"0","sort":{"ID":"desc"}}', 1455384507),
(1525, 28, 1, 0, '{"condition":{"like__account_basic_information__first_name__CONCAT__account_basic_information__middle_name__CONCAT__account_basic_information__last_name":"","test":"1"},"limit":"3","offset":"3","sort":{"ID":"desc"}}', 1455384508),
(1526, 28, 1, 0, '{"condition":{"like__account_basic_information__first_name__CONCAT__account_basic_information__middle_name__CONCAT__account_basic_information__last_name":"","test":"1"},"limit":"3","offset":"6","sort":{"ID":"desc"}}', 1455384510),
(1527, 28, 1, 0, '{"condition":{"like__account_basic_information__first_name__CONCAT__account_basic_information__middle_name__CONCAT__account_basic_information__last_name":"","test":"1"},"limit":"3"}', 1455384555),
(1528, 28, 1, 0, '{"condition":{"like__account_basic_information__first_name__CONCAT__account_basic_information__middle_name__CONCAT__account_basic_information__last_name":"","test":"1"},"limit":"3","offset":"0","sort":{"ID":"desc"}}', 1455384555),
(1529, 28, 1, 0, '{"condition":{"like__account_basic_information__first_name__CONCAT__account_basic_information__middle_name__CONCAT__account_basic_information__last_name":"","test":"1"},"limit":"3","offset":"3","sort":{"ID":"desc"}}', 1455384556),
(1530, 28, 1, 0, '{"condition":{"like__account_basic_information__first_name__CONCAT__account_basic_information__middle_name__CONCAT__account_basic_information__last_name":"","test":"1"},"limit":"3","offset":"6","sort":{"ID":"desc"}}', 1455384557),
(1531, 28, 1, 0, '{"condition":{"like__account_basic_information__first_name__CONCAT__account_basic_information__middle_name__CONCAT__account_basic_information__last_name":"","test":"1"},"limit":"3"}', 1455384582),
(1532, 28, 1, 0, '{"condition":{"like__account_basic_information__first_name__CONCAT__account_basic_information__middle_name__CONCAT__account_basic_information__last_name":"","test":"1"},"limit":"3","offset":"0","sort":{"ID":"desc"}}', 1455384582),
(1533, 28, 1, 0, '{"condition":{"like__account_basic_information__first_name__CONCAT__account_basic_information__middle_name__CONCAT__account_basic_information__last_name":"","test":"1"},"limit":"3","offset":"3","sort":{"ID":"desc"}}', 1455384583),
(1534, 28, 1, 0, '{"condition":{"like__account_basic_information__first_name__CONCAT__account_basic_information__middle_name__CONCAT__account_basic_information__last_name":"","test":"1"},"limit":"3","offset":"6","sort":{"ID":"desc"}}', 1455384584),
(1535, 28, 1, 0, '{"condition":{"like__account_basic_information__first_name__CONCAT__account_basic_information__middle_name__CONCAT__account_basic_information__last_name":"","test":"1"},"limit":"3"}', 1455384607),
(1536, 28, 1, 0, '{"condition":{"like__account_basic_information__first_name__CONCAT__account_basic_information__middle_name__CONCAT__account_basic_information__last_name":"","test":"1"},"limit":"3","offset":"0","sort":{"ID":"desc"}}', 1455384608),
(1537, 28, 1, 0, '{"condition":{"like__account_basic_information__first_name__CONCAT__account_basic_information__middle_name__CONCAT__account_basic_information__last_name":"","test":"1"},"limit":"3","offset":"3","sort":{"ID":"desc"}}', 1455384609),
(1538, 28, 1, 0, '{"condition":{"like__account_basic_information__first_name__CONCAT__account_basic_information__middle_name__CONCAT__account_basic_information__last_name":"","test":"1"},"limit":"3","offset":"6","sort":{"ID":"desc"}}', 1455384609),
(1539, 28, 1, 0, '{"condition":{"like__account_basic_information__first_name__CONCAT__account_basic_information__middle_name__CONCAT__account_basic_information__last_name":"","test":"1"},"limit":"3"}', 1455384617),
(1540, 28, 1, 0, '{"condition":{"like__account_basic_information__first_name__CONCAT__account_basic_information__middle_name__CONCAT__account_basic_information__last_name":"","test":"1"},"limit":"3","offset":"0","sort":{"ID":"desc"}}', 1455384617),
(1541, 28, 1, 0, '{"condition":{"like__account_basic_information__first_name__CONCAT__account_basic_information__middle_name__CONCAT__account_basic_information__last_name":"","test":"1"},"limit":"3","offset":"3","sort":{"ID":"desc"}}', 1455384618),
(1542, 28, 1, 0, '{"condition":{"like__account_basic_information__first_name__CONCAT__account_basic_information__middle_name__CONCAT__account_basic_information__last_name":"","test":"1"},"limit":"3","offset":"6","sort":{"ID":"desc"}}', 1455384619),
(1543, 28, 1, 0, '{"condition":{"like__account_basic_information__first_name__CONCAT__account_basic_information__middle_name__CONCAT__account_basic_information__last_name":"","test":"1"},"limit":"3"}', 1455384641),
(1544, 28, 1, 0, '{"condition":{"like__account_basic_information__first_name__CONCAT__account_basic_information__middle_name__CONCAT__account_basic_information__last_name":"","test":"1"},"limit":"3","offset":"0","sort":{"ID":"desc"}}', 1455384641),
(1545, 28, 1, 0, '{"condition":{"like__account_basic_information__first_name__CONCAT__account_basic_information__middle_name__CONCAT__account_basic_information__last_name":"","test":"1"},"limit":"3","offset":"3","sort":{"ID":"desc"}}', 1455384642),
(1546, 28, 1, 0, '{"condition":{"like__account_basic_information__first_name__CONCAT__account_basic_information__middle_name__CONCAT__account_basic_information__last_name":"","test":"1"},"limit":"3","offset":"6","sort":{"ID":"desc"}}', 1455384642),
(1547, 28, 1, 0, '{"condition":{"like__account_basic_information__first_name__CONCAT__account_basic_information__middle_name__CONCAT__account_basic_information__last_name":"","test":"1"},"limit":"3"}', 1455384651),
(1548, 28, 1, 0, '{"condition":{"like__account_basic_information__first_name__CONCAT__account_basic_information__middle_name__CONCAT__account_basic_information__last_name":"","test":"1"},"limit":"3","offset":"0","sort":{"ID":"desc"}}', 1455384651),
(1549, 28, 1, 0, '{"condition":{"like__account_basic_information__first_name__CONCAT__account_basic_information__middle_name__CONCAT__account_basic_information__last_name":"","test":"1"},"limit":"3","offset":"3","sort":{"ID":"desc"}}', 1455384652),
(1550, 28, 1, 0, '{"condition":{"like__account_basic_information__first_name__CONCAT__account_basic_information__middle_name__CONCAT__account_basic_information__last_name":"","test":"1"},"limit":"3","offset":"6","sort":{"ID":"desc"}}', 1455384652),
(1551, 28, 1, 0, '{"condition":{"like__account_basic_information__first_name__CONCAT__account_basic_information__middle_name__CONCAT__account_basic_information__last_name":"","test":"1"},"limit":"3"}', 1455384672),
(1552, 28, 1, 0, '{"condition":{"like__account_basic_information__first_name__CONCAT__account_basic_information__middle_name__CONCAT__account_basic_information__last_name":"","test":"1"},"limit":"3","offset":"0","sort":{"ID":"desc"}}', 1455384672),
(1553, 28, 1, 0, '{"condition":{"like__account_basic_information__first_name__CONCAT__account_basic_information__middle_name__CONCAT__account_basic_information__last_name":"","test":"1"},"limit":"3","offset":"3","sort":{"ID":"desc"}}', 1455384676),
(1554, 28, 1, 0, '{"condition":{"like__account_basic_information__first_name__CONCAT__account_basic_information__middle_name__CONCAT__account_basic_information__last_name":"","test":"1"},"limit":"3","offset":"6","sort":{"ID":"desc"}}', 1455384676),
(1555, 28, 1, 0, '{"condition":{"like__account_basic_information__first_name__CONCAT__account_basic_information__middle_name__CONCAT__account_basic_information__last_name":"","test":"1"},"limit":"3"}', 1455384692),
(1556, 28, 1, 0, '{"condition":{"like__account_basic_information__first_name__CONCAT__account_basic_information__middle_name__CONCAT__account_basic_information__last_name":"","test":"1"},"limit":"3","offset":"0","sort":{"ID":"desc"}}', 1455384692),
(1557, 28, 1, 0, '{"condition":{"like__account_basic_information__first_name__CONCAT__account_basic_information__middle_name__CONCAT__account_basic_information__last_name":"","test":"1"},"limit":"3","offset":"3","sort":{"ID":"desc"}}', 1455384693),
(1558, 28, 1, 0, '{"condition":{"like__account_basic_information__first_name__CONCAT__account_basic_information__middle_name__CONCAT__account_basic_information__last_name":"","test":"1"},"limit":"3","offset":"6","sort":{"ID":"desc"}}', 1455384694),
(1559, 28, 1, 0, '{"condition":{"like__account_basic_information__first_name__CONCAT__account_basic_information__middle_name__CONCAT__account_basic_information__last_name":"","test":"1"},"limit":"3","offset":"6","sort":{"ID":"desc"}}', 1455384694),
(1560, 28, 1, 0, '{"condition":{"like__account_basic_information__first_name__CONCAT__account_basic_information__middle_name__CONCAT__account_basic_information__last_name":"","test":"1"},"limit":"3","offset":"3","sort":{"ID":"desc"}}', 1455384696),
(1561, 28, 1, 0, '{"condition":{"like__account_basic_information__first_name__CONCAT__account_basic_information__middle_name__CONCAT__account_basic_information__last_name":"","test":"1"},"limit":"3","offset":"6","sort":{"ID":"desc"}}', 1455384697),
(1562, 28, 1, 0, '{"condition":{"like__account_basic_information__first_name__CONCAT__account_basic_information__middle_name__CONCAT__account_basic_information__last_name":"","test":"1"},"limit":"3","offset":"6","sort":{"ID":"desc"}}', 1455384698),
(1563, 28, 1, 0, '{"condition":{"like__account_basic_information__first_name__CONCAT__account_basic_information__middle_name__CONCAT__account_basic_information__last_name":"","test":"1"},"limit":"3"}', 1455384711),
(1564, 28, 1, 0, '{"condition":{"like__account_basic_information__first_name__CONCAT__account_basic_information__middle_name__CONCAT__account_basic_information__last_name":"","test":"1"},"limit":"3","offset":"0","sort":{"ID":"desc"}}', 1455384711),
(1565, 28, 1, 0, '{"condition":{"like__account_basic_information__first_name__CONCAT__account_basic_information__middle_name__CONCAT__account_basic_information__last_name":"","test":"1"},"limit":"3","offset":"3","sort":{"ID":"desc"}}', 1455384712),
(1566, 28, 1, 0, '{"condition":{"like__account_basic_information__first_name__CONCAT__account_basic_information__middle_name__CONCAT__account_basic_information__last_name":"","test":"1"},"limit":"3","offset":"6","sort":{"ID":"desc"}}', 1455384713),
(1567, 28, 1, 0, '{"condition":{"like__account_basic_information__first_name__CONCAT__account_basic_information__middle_name__CONCAT__account_basic_information__last_name":"","test":"1"},"limit":"3","offset":"6","sort":{"ID":"desc"}}', 1455384715),
(1568, 28, 1, 0, '{"condition":{"like__account_basic_information__first_name__CONCAT__account_basic_information__middle_name__CONCAT__account_basic_information__last_name":"","test":"1"},"limit":"3","offset":"3","sort":{"ID":"desc"}}', 1455384717),
(1569, 28, 1, 0, '{"condition":{"like__account_basic_information__first_name__CONCAT__account_basic_information__middle_name__CONCAT__account_basic_information__last_name":"","test":"1"},"limit":"3","offset":"6","sort":{"ID":"desc"}}', 1455384718),
(1570, 28, 1, 0, '{"condition":{"like__account_basic_information__first_name__CONCAT__account_basic_information__middle_name__CONCAT__account_basic_information__last_name":"","test":"1"},"limit":"3","offset":"6","sort":{"ID":"desc"}}', 1455384719),
(1571, 28, 1, 0, '{"condition":{"like__account_basic_information__first_name__CONCAT__account_basic_information__middle_name__CONCAT__account_basic_information__last_name":"","test":"1"},"limit":"3"}', 1455384747),
(1572, 28, 1, 0, '{"condition":{"like__account_basic_information__first_name__CONCAT__account_basic_information__middle_name__CONCAT__account_basic_information__last_name":"","test":"1"},"limit":"3","offset":"0","sort":{"ID":"desc"}}', 1455384747),
(1573, 28, 1, 0, '{"condition":{"like__account_basic_information__first_name__CONCAT__account_basic_information__middle_name__CONCAT__account_basic_information__last_name":"","test":"1"},"limit":"3","offset":"3","sort":{"ID":"desc"}}', 1455384748),
(1574, 28, 1, 0, '{"condition":{"like__account_basic_information__first_name__CONCAT__account_basic_information__middle_name__CONCAT__account_basic_information__last_name":"","test":"1"},"limit":"3","offset":"0","sort":{"ID":"desc"}}', 1455384750),
(1575, 28, 1, 0, '{"condition":{"like__account_basic_information__first_name__CONCAT__account_basic_information__middle_name__CONCAT__account_basic_information__last_name":"","test":"1"},"limit":"3","offset":"3","sort":{"ID":"desc"}}', 1455384751),
(1576, 28, 1, 0, '{"condition":{"like__account_basic_information__first_name__CONCAT__account_basic_information__middle_name__CONCAT__account_basic_information__last_name":"","test":"1"},"limit":"3","offset":"6","sort":{"ID":"desc"}}', 1455384752),
(1577, 28, 1, 0, '{"condition":{"like__account_basic_information__first_name__CONCAT__account_basic_information__middle_name__CONCAT__account_basic_information__last_name":"","test":"1"},"limit":"3","offset":"3","sort":{"ID":"desc"}}', 1455384753),
(1578, 28, 1, 0, '{"condition":{"like__account_basic_information__first_name__CONCAT__account_basic_information__middle_name__CONCAT__account_basic_information__last_name":"","test":"1"},"limit":"3","offset":"6","sort":{"ID":"desc"}}', 1455384754),
(1579, 28, 1, 0, '{"condition":{"like__account_basic_information__first_name__CONCAT__account_basic_information__middle_name__CONCAT__account_basic_information__last_name":"","test":"1"},"limit":"3","offset":"6","sort":{"ID":"desc"}}', 1455384755),
(1580, 28, 1, 0, '{"condition":{"like__account_basic_information__first_name__CONCAT__account_basic_information__middle_name__CONCAT__account_basic_information__last_name":"","test":"1"},"limit":"3"}', 1455384786),
(1581, 28, 1, 0, '{"condition":{"like__account_basic_information__first_name__CONCAT__account_basic_information__middle_name__CONCAT__account_basic_information__last_name":"","test":"1"},"limit":"3","offset":"0","sort":{"ID":"desc"}}', 1455384786),
(1582, 28, 1, 0, '{"condition":{"like__account_basic_information__first_name__CONCAT__account_basic_information__middle_name__CONCAT__account_basic_information__last_name":"","test":"1"},"limit":"3","offset":"3","sort":{"ID":"desc"}}', 1455384787),
(1583, 28, 1, 0, '{"condition":{"like__account_basic_information__first_name__CONCAT__account_basic_information__middle_name__CONCAT__account_basic_information__last_name":"","test":"1"},"limit":"3","offset":"6","sort":{"ID":"desc"}}', 1455384788),
(1584, 28, 1, 0, '{"condition":{"like__account_basic_information__first_name__CONCAT__account_basic_information__middle_name__CONCAT__account_basic_information__last_name":"","test":"1"},"limit":"3","offset":"6","sort":{"ID":"desc"}}', 1455384789),
(1585, 28, 1, 0, '{"condition":{"like__account_basic_information__first_name__CONCAT__account_basic_information__middle_name__CONCAT__account_basic_information__last_name":"","test":"1"},"limit":"3"}', 1455384942),
(1586, 28, 1, 0, '{"condition":{"like__account_basic_information__first_name__CONCAT__account_basic_information__middle_name__CONCAT__account_basic_information__last_name":"","test":"1"},"limit":"3","offset":"0","sort":{"ID":"desc"}}', 1455384942),
(1587, 28, 1, 0, '{"condition":{"like__account_basic_information__first_name__CONCAT__account_basic_information__middle_name__CONCAT__account_basic_information__last_name":"","test":"1"},"limit":"3","offset":"3","sort":{"ID":"desc"}}', 1455384943),
(1588, 28, 1, 0, '{"condition":{"like__account_basic_information__first_name__CONCAT__account_basic_information__middle_name__CONCAT__account_basic_information__last_name":"","test":"1"},"limit":"3","offset":"6","sort":{"ID":"desc"}}', 1455384944),
(1589, 28, 1, 0, '{"condition":{"like__account_basic_information__first_name__CONCAT__account_basic_information__middle_name__CONCAT__account_basic_information__last_name":"","test":"1"},"limit":"3","offset":"6","sort":{"ID":"desc"}}', 1455384945),
(1590, 28, 1, 0, '{"condition":{"like__account_basic_information__first_name__CONCAT__account_basic_information__middle_name__CONCAT__account_basic_information__last_name":"","test":"1"},"limit":"3"}', 1455384969),
(1591, 28, 1, 0, '{"condition":{"like__account_basic_information__first_name__CONCAT__account_basic_information__middle_name__CONCAT__account_basic_information__last_name":"","test":"1"},"limit":"3","offset":"0","sort":{"ID":"desc"}}', 1455384969),
(1592, 28, 1, 0, '{"condition":{"like__account_basic_information__first_name__CONCAT__account_basic_information__middle_name__CONCAT__account_basic_information__last_name":"","test":"1"},"limit":"3","offset":"3","sort":{"ID":"desc"}}', 1455384969),
(1593, 28, 1, 0, '{"condition":{"like__account_basic_information__first_name__CONCAT__account_basic_information__middle_name__CONCAT__account_basic_information__last_name":"","test":"1"},"limit":"3","offset":"6","sort":{"ID":"desc"}}', 1455384972),
(1594, 28, 1, 0, '{"condition":{"like__account_basic_information__first_name__CONCAT__account_basic_information__middle_name__CONCAT__account_basic_information__last_name":"","test":"1"},"limit":"3","offset":"6","sort":{"ID":"desc"}}', 1455384973),
(1595, 28, 1, 0, '{"condition":{"like__account_basic_information__first_name__CONCAT__account_basic_information__middle_name__CONCAT__account_basic_information__last_name":"","test":"1"},"limit":"3"}', 1455385006),
(1596, 28, 1, 0, '{"condition":{"like__account_basic_information__first_name__CONCAT__account_basic_information__middle_name__CONCAT__account_basic_information__last_name":"","test":"1"},"limit":"3","offset":"0","sort":{"ID":"desc"}}', 1455385006),
(1597, 28, 1, 0, '{"condition":{"like__account_basic_information__first_name__CONCAT__account_basic_information__middle_name__CONCAT__account_basic_information__last_name":"","test":"1"},"limit":"3","offset":"3","sort":{"ID":"desc"}}', 1455385007),
(1598, 28, 1, 0, '{"condition":{"like__account_basic_information__first_name__CONCAT__account_basic_information__middle_name__CONCAT__account_basic_information__last_name":"","test":"1"},"limit":"3","offset":"6","sort":{"ID":"desc"}}', 1455385008),
(1599, 28, 1, 0, '{"condition":{"like__account_basic_information__first_name__CONCAT__account_basic_information__middle_name__CONCAT__account_basic_information__last_name":"","test":"1"},"limit":"3","offset":"6","sort":{"ID":"desc"}}', 1455385013),
(1600, 28, 1, 0, '{"condition":{"like__account_basic_information__first_name__CONCAT__account_basic_information__middle_name__CONCAT__account_basic_information__last_name":"","test":"1"},"limit":"3"}', 1455385048),
(1601, 28, 1, 0, '{"condition":{"like__account_basic_information__first_name__CONCAT__account_basic_information__middle_name__CONCAT__account_basic_information__last_name":"","test":"1"},"limit":"3","offset":"0","sort":{"ID":"desc"}}', 1455385048),
(1602, 28, 1, 0, '{"condition":{"like__account_basic_information__first_name__CONCAT__account_basic_information__middle_name__CONCAT__account_basic_information__last_name":"","test":"1"},"limit":"3","offset":"3","sort":{"ID":"desc"}}', 1455385049),
(1603, 28, 1, 0, '{"condition":{"like__account_basic_information__first_name__CONCAT__account_basic_information__middle_name__CONCAT__account_basic_information__last_name":"","test":"1"},"limit":"3","offset":"6","sort":{"ID":"desc"}}', 1455385050),
(1604, 28, 1, 0, '{"condition":{"like__account_basic_information__first_name__CONCAT__account_basic_information__middle_name__CONCAT__account_basic_information__last_name":"","test":"1"},"limit":"3"}', 1455385053),
(1605, 28, 1, 0, '{"condition":{"like__account_basic_information__first_name__CONCAT__account_basic_information__middle_name__CONCAT__account_basic_information__last_name":"","test":"1"},"limit":"3","offset":"0","sort":{"ID":"desc"}}', 1455385053),
(1606, 28, 1, 0, '{"condition":{"like__account_basic_information__first_name__CONCAT__account_basic_information__middle_name__CONCAT__account_basic_information__last_name":"","test":"1"},"limit":"3","offset":"3","sort":{"ID":"desc"}}', 1455385054),
(1607, 28, 1, 0, '{"condition":{"like__account_basic_information__first_name__CONCAT__account_basic_information__middle_name__CONCAT__account_basic_information__last_name":"","test":"1"},"limit":"3","offset":"6","sort":{"ID":"desc"}}', 1455385055),
(1608, 28, 1, 0, '{"condition":{"like__account_basic_information__first_name__CONCAT__account_basic_information__middle_name__CONCAT__account_basic_information__last_name":"","test":"1"},"limit":"3","offset":"6","sort":{"ID":"desc"}}', 1455385059),
(1609, 28, 1, 0, '{"condition":{"like__account_basic_information__first_name__CONCAT__account_basic_information__middle_name__CONCAT__account_basic_information__last_name":"","test":"1"},"limit":"3"}', 1455385082),
(1610, 28, 1, 0, '{"condition":{"like__account_basic_information__first_name__CONCAT__account_basic_information__middle_name__CONCAT__account_basic_information__last_name":"","test":"1"},"limit":"3","offset":"0","sort":{"ID":"desc"}}', 1455385082),
(1611, 28, 1, 0, '{"condition":{"like__account_basic_information__first_name__CONCAT__account_basic_information__middle_name__CONCAT__account_basic_information__last_name":"","test":"1"},"limit":"3","offset":"3","sort":{"ID":"desc"}}', 1455385083),
(1612, 28, 1, 0, '{"condition":{"like__account_basic_information__first_name__CONCAT__account_basic_information__middle_name__CONCAT__account_basic_information__last_name":"","test":"1"},"limit":"3","offset":"6","sort":{"ID":"desc"}}', 1455385083),
(1613, 28, 1, 0, '{"condition":{"like__account_basic_information__first_name__CONCAT__account_basic_information__middle_name__CONCAT__account_basic_information__last_name":"","test":"1"},"limit":"3","offset":"6","sort":{"ID":"desc"}}', 1455385087),
(1614, 28, 1, 0, '{"condition":{"like__account_basic_information__first_name__CONCAT__account_basic_information__middle_name__CONCAT__account_basic_information__last_name":"","test":"1"},"limit":"3","offset":"3","sort":{"ID":"desc"}}', 1455385147),
(1615, 28, 1, 0, '{"condition":{"like__account_basic_information__first_name__CONCAT__account_basic_information__middle_name__CONCAT__account_basic_information__last_name":"","test":"1"},"limit":"3","offset":"6","sort":{"ID":"desc"}}', 1455385149),
(1616, 28, 1, 0, '{"condition":{"like__account_basic_information__first_name__CONCAT__account_basic_information__middle_name__CONCAT__account_basic_information__last_name":"","test":"1"},"limit":"3","offset":"6","sort":{"ID":"desc"}}', 1455385153),
(1617, 28, 1, 0, '{"condition":{"like__account_basic_information__first_name__CONCAT__account_basic_information__middle_name__CONCAT__account_basic_information__last_name":"","test":"1"},"limit":"3"}', 1455385174),
(1618, 28, 1, 0, '{"condition":{"like__account_basic_information__first_name__CONCAT__account_basic_information__middle_name__CONCAT__account_basic_information__last_name":"","test":"1"},"limit":"3","offset":"0","sort":{"ID":"desc"}}', 1455385174),
(1619, 28, 1, 0, '{"condition":{"like__account_basic_information__first_name__CONCAT__account_basic_information__middle_name__CONCAT__account_basic_information__last_name":"","test":"1"},"limit":"3","offset":"3","sort":{"ID":"desc"}}', 1455385175),
(1620, 28, 1, 0, '{"condition":{"like__account_basic_information__first_name__CONCAT__account_basic_information__middle_name__CONCAT__account_basic_information__last_name":"","test":"1"},"limit":"3","offset":"6","sort":{"ID":"desc"}}', 1455385176),
(1621, 28, 1, 0, '{"condition":{"like__account_basic_information__first_name__CONCAT__account_basic_information__middle_name__CONCAT__account_basic_information__last_name":"","test":"1"},"limit":"3","offset":"6","sort":{"ID":"desc"}}', 1455385179),
(1622, 28, 1, 0, '{"condition":{"like__account_basic_information__first_name__CONCAT__account_basic_information__middle_name__CONCAT__account_basic_information__last_name":"","test":"1"},"limit":"3"}', 1455385242),
(1623, 28, 1, 0, '{"condition":{"like__account_basic_information__first_name__CONCAT__account_basic_information__middle_name__CONCAT__account_basic_information__last_name":"","test":"1"},"limit":"3","offset":"0","sort":{"ID":"desc"}}', 1455385242),
(1624, 28, 1, 0, '{"condition":{"like__account_basic_information__first_name__CONCAT__account_basic_information__middle_name__CONCAT__account_basic_information__last_name":"","test":"1"},"limit":"3","offset":"0","sort":{"ID":"desc"}}', 1455385243),
(1625, 28, 1, 0, '{"condition":{"like__account_basic_information__first_name__CONCAT__account_basic_information__middle_name__CONCAT__account_basic_information__last_name":"","test":"1"},"limit":"3","offset":"3","sort":{"ID":"desc"}}', 1455385244),
(1626, 28, 1, 0, '{"condition":{"like__account_basic_information__first_name__CONCAT__account_basic_information__middle_name__CONCAT__account_basic_information__last_name":"","test":"1"},"limit":"3","offset":"6","sort":{"ID":"desc"}}', 1455385245),
(1627, 28, 1, 0, '{"condition":{"like__account_basic_information__first_name__CONCAT__account_basic_information__middle_name__CONCAT__account_basic_information__last_name":"","test":"1"},"limit":"3","offset":"6","sort":{"ID":"desc"}}', 1455385247),
(1628, 28, 1, 0, '{"condition":{"like__account_basic_information__first_name__CONCAT__account_basic_information__middle_name__CONCAT__account_basic_information__last_name":"","test":"1"},"limit":"3"}', 1455385278),
(1629, 28, 1, 0, '{"condition":{"like__account_basic_information__first_name__CONCAT__account_basic_information__middle_name__CONCAT__account_basic_information__last_name":"","test":"1"},"limit":"3","offset":"0","sort":{"ID":"desc"}}', 1455385278),
(1630, 28, 1, 0, '{"condition":{"like__account_basic_information__first_name__CONCAT__account_basic_information__middle_name__CONCAT__account_basic_information__last_name":"","test":"1"},"limit":"3","offset":"3","sort":{"ID":"desc"}}', 1455385280),
(1631, 28, 1, 0, '{"condition":{"like__account_basic_information__first_name__CONCAT__account_basic_information__middle_name__CONCAT__account_basic_information__last_name":"","test":"1"},"limit":"3","offset":"6","sort":{"ID":"desc"}}', 1455385281),
(1632, 28, 1, 0, '{"condition":{"like__account_basic_information__first_name__CONCAT__account_basic_information__middle_name__CONCAT__account_basic_information__last_name":"","test":"1"},"limit":"3","offset":"6","sort":{"ID":"desc"}}', 1455385282),
(1633, 28, 1, 0, '{"condition":{"like__account_basic_information__first_name__CONCAT__account_basic_information__middle_name__CONCAT__account_basic_information__last_name":"","test":"1"},"limit":"3","offset":"6","sort":{"ID":"desc"}}', 1455385283),
(1634, 28, 1, 0, '{"condition":{"like__account_basic_information__first_name__CONCAT__account_basic_information__middle_name__CONCAT__account_basic_information__last_name":"","test":"1"},"limit":"3","offset":"6","sort":{"ID":"desc"}}', 1455385284),
(1635, 28, 1, 0, '{"condition":{"like__account_basic_information__first_name__CONCAT__account_basic_information__middle_name__CONCAT__account_basic_information__last_name":"","test":"1"},"limit":"3","offset":"6","sort":{"ID":"desc"}}', 1455385285),
(1636, 28, 1, 0, '{"condition":{"like__account_basic_information__first_name__CONCAT__account_basic_information__middle_name__CONCAT__account_basic_information__last_name":"","test":"1"},"limit":"3","offset":"6","sort":{"ID":"desc"}}', 1455385286),
(1637, 28, 1, 0, '{"condition":{"like__account_basic_information__first_name__CONCAT__account_basic_information__middle_name__CONCAT__account_basic_information__last_name":"","test":"1"},"limit":"3","offset":"3","sort":{"ID":"desc"}}', 1455385287),
(1638, 28, 1, 0, '{"condition":{"like__account_basic_information__first_name__CONCAT__account_basic_information__middle_name__CONCAT__account_basic_information__last_name":"","test":"1"},"limit":"3","offset":"0","sort":{"ID":"desc"}}', 1455385287),
(1639, 28, 1, 0, '{"condition":{"like__account_basic_information__first_name__CONCAT__account_basic_information__middle_name__CONCAT__account_basic_information__last_name":"","test":"1"},"limit":"3","offset":"3","sort":{"ID":"desc"}}', 1455385288),
(1640, 28, 1, 0, '{"condition":{"like__account_basic_information__first_name__CONCAT__account_basic_information__middle_name__CONCAT__account_basic_information__last_name":"","test":"1"},"limit":"3","offset":"6","sort":{"ID":"desc"}}', 1455385290),
(1641, 28, 1, 0, '{"condition":{"like__account_basic_information__first_name__CONCAT__account_basic_information__middle_name__CONCAT__account_basic_information__last_name":"","test":"1"},"limit":"3"}', 1455385334),
(1642, 28, 1, 0, '{"condition":{"like__account_basic_information__first_name__CONCAT__account_basic_information__middle_name__CONCAT__account_basic_information__last_name":"","test":"1"},"limit":"3","offset":"0","sort":{"ID":"desc"}}', 1455385334),
(1643, 28, 1, 0, '{"condition":{"like__account_basic_information__first_name__CONCAT__account_basic_information__middle_name__CONCAT__account_basic_information__last_name":"qweqwe","test":"1"},"limit":"3","offset":"0","sort":{"ID":"desc"}}', 1455385336),
(1644, 28, 1, 0, '{"condition":{"like__account_basic_information__first_name__CONCAT__account_basic_information__middle_name__CONCAT__account_basic_information__last_name":"","test":"1"},"limit":"3"}', 1455385338),
(1645, 28, 1, 0, '{"condition":{"like__account_basic_information__first_name__CONCAT__account_basic_information__middle_name__CONCAT__account_basic_information__last_name":"","test":"1"},"limit":"3","offset":"0","sort":{"ID":"desc"}}', 1455385338),
(1646, 28, 1, 0, '{"condition":{"like__account_basic_information__first_name__CONCAT__account_basic_information__middle_name__CONCAT__account_basic_information__last_name":"","test":"1"},"limit":"3"}', 1455385357),
(1647, 28, 1, 0, '{"condition":{"like__account_basic_information__first_name__CONCAT__account_basic_information__middle_name__CONCAT__account_basic_information__last_name":"","test":"1"},"limit":"3","offset":"0","sort":{"ID":"desc"}}', 1455385357),
(1648, 28, 1, 0, '{"condition":{"like__account_basic_information__first_name__CONCAT__account_basic_information__middle_name__CONCAT__account_basic_information__last_name":"","test":"1"},"limit":"3"}', 1455385392),
(1649, 28, 1, 0, '{"condition":{"like__account_basic_information__first_name__CONCAT__account_basic_information__middle_name__CONCAT__account_basic_information__last_name":"","test":"1"},"limit":"3","offset":"0","sort":{"ID":"desc"}}', 1455385393),
(1650, 28, 1, 0, '{"condition":{"like__account_basic_information__first_name__CONCAT__account_basic_information__middle_name__CONCAT__account_basic_information__last_name":"","test":"1"},"limit":"3"}', 1455385637),
(1651, 28, 1, 0, '{"condition":{"like__account_basic_information__first_name__CONCAT__account_basic_information__middle_name__CONCAT__account_basic_information__last_name":"","test":"1"},"limit":"3","offset":"0","sort":{"ID":"desc"}}', 1455385637),
(1652, 28, 1, 0, '{"condition":{"like__account_basic_information__first_name__CONCAT__account_basic_information__middle_name__CONCAT__account_basic_information__last_name":"","test":"1"},"limit":"3"}', 1455385664),
(1653, 28, 1, 0, '{"condition":{"like__account_basic_information__first_name__CONCAT__account_basic_information__middle_name__CONCAT__account_basic_information__last_name":"","test":"1"},"limit":"3","offset":"0","sort":{"ID":"desc"}}', 1455385664),
(1654, 28, 1, 0, '{"condition":{"like__account_basic_information__first_name__CONCAT__account_basic_information__middle_name__CONCAT__account_basic_information__last_name":"","test":"1"},"limit":"3"}', 1455385696),
(1655, 28, 1, 0, '{"condition":{"like__account_basic_information__first_name__CONCAT__account_basic_information__middle_name__CONCAT__account_basic_information__last_name":"","test":"1"},"limit":"3","offset":"0","sort":{"ID":"desc"}}', 1455385696),
(1656, 28, 1, 0, '{"condition":{"like__account_basic_information__first_name__CONCAT__account_basic_information__middle_name__CONCAT__account_basic_information__last_name":"","test":"1"},"limit":"3"}', 1455385723),
(1657, 28, 1, 0, '{"condition":{"like__account_basic_information__first_name__CONCAT__account_basic_information__middle_name__CONCAT__account_basic_information__last_name":"","test":"1"},"limit":"3","offset":"0","sort":{"ID":"desc"}}', 1455385723),
(1658, 28, 1, 0, '{"condition":{"like__account_basic_information__first_name__CONCAT__account_basic_information__middle_name__CONCAT__account_basic_information__last_name":"","test":"1"},"limit":"3"}', 1455385770),
(1659, 28, 1, 0, '{"condition":{"like__account_basic_information__first_name__CONCAT__account_basic_information__middle_name__CONCAT__account_basic_information__last_name":"","test":"1"},"limit":"3","offset":"0","sort":{"ID":"desc"}}', 1455385770),
(1660, 0, 1, 0, '37', 1455385824),
(1661, 28, 1, 0, '{"condition":{"like__account_basic_information__first_name__CONCAT__account_basic_information__middle_name__CONCAT__account_basic_information__last_name":"ssdsd222","test":"1"},"limit":"3","offset":"0","sort":{"ID":"desc"}}', 1455385827);
INSERT INTO `action_log` (`ID`, `account_ID`, `api_controller_ID`, `access_number_ID`, `detail`, `datetime`) VALUES
(1662, 28, 1, 0, '{"condition":{"like__account_basic_information__first_name__CONCAT__account_basic_information__middle_name__CONCAT__account_basic_information__last_name":"ssdsd222","test":"1"},"limit":"3","offset":"0","sort":{"ID":"desc"}}', 1455385829),
(1663, 28, 1, 0, '{"condition":{"like__account_basic_information__first_name__CONCAT__account_basic_information__middle_name__CONCAT__account_basic_information__last_name":"ssdsd222","test":"1"},"limit":"3","offset":"0","sort":{"ID":"desc"}}', 1455385829),
(1664, 28, 1, 0, '{"condition":{"like__account_basic_information__first_name__CONCAT__account_basic_information__middle_name__CONCAT__account_basic_information__last_name":"ssdsd222","test":"1"},"limit":"3","offset":"0","sort":{"ID":"desc"}}', 1455385830),
(1665, 28, 1, 0, '{"condition":{"like__account_basic_information__first_name__CONCAT__account_basic_information__middle_name__CONCAT__account_basic_information__last_name":"ssdsd222","test":"1"},"limit":"3","offset":"0","sort":{"ID":"desc"}}', 1455385831),
(1666, 28, 1, 0, '{"condition":{"like__account_basic_information__first_name__CONCAT__account_basic_information__middle_name__CONCAT__account_basic_information__last_name":"ssdsd222","test":"1"},"limit":"3","offset":"0","sort":{"ID":"desc"}}', 1455385832),
(1667, 28, 1, 0, '{"condition":{"like__account_basic_information__first_name__CONCAT__account_basic_information__middle_name__CONCAT__account_basic_information__last_name":"ssdsd222","test":"1"},"limit":"3","offset":"0","sort":{"ID":"desc"}}', 1455385833),
(1668, 28, 1, 0, '{"condition":{"like__account_basic_information__first_name__CONCAT__account_basic_information__middle_name__CONCAT__account_basic_information__last_name":"ssdsd222","test":"1"},"limit":"3","offset":"0","sort":{"ID":"desc"}}', 1455385833),
(1669, 28, 1, 0, '{"condition":{"like__account_basic_information__first_name__CONCAT__account_basic_information__middle_name__CONCAT__account_basic_information__last_name":"ssdsd222","test":"1"},"limit":"3","offset":"0","sort":{"ID":"desc"}}', 1455385853),
(1670, 28, 1, 0, '{"condition":{"like__account_basic_information__first_name__CONCAT__account_basic_information__middle_name__CONCAT__account_basic_information__last_name":"ssdsd222","test":"1"},"limit":"3","offset":"0","sort":{"ID":"desc"}}', 1455385854),
(1671, 28, 1, 0, '{"condition":{"like__account_basic_information__first_name__CONCAT__account_basic_information__middle_name__CONCAT__account_basic_information__last_name":"","test":"1"},"limit":"3"}', 1455385966),
(1672, 28, 1, 0, '{"condition":{"like__account_basic_information__first_name__CONCAT__account_basic_information__middle_name__CONCAT__account_basic_information__last_name":"","test":"1"},"limit":"3","offset":"0","sort":{"ID":"desc"}}', 1455385966),
(1673, 28, 1, 0, '{"condition":{"like__account_basic_information__first_name__CONCAT__account_basic_information__middle_name__CONCAT__account_basic_information__last_name":"","test":"1"},"limit":"3","offset":"3","sort":{"ID":"desc"}}', 1455385978),
(1674, 28, 1, 0, '{"condition":{"like__account_basic_information__first_name__CONCAT__account_basic_information__middle_name__CONCAT__account_basic_information__last_name":"","test":"1"},"limit":"3","offset":"6","sort":{"ID":"desc"}}', 1455385979),
(1675, 28, 1, 0, '{"condition":{"like__account_basic_information__first_name__CONCAT__account_basic_information__middle_name__CONCAT__account_basic_information__last_name":"","test":"1"},"limit":"3","offset":"9","sort":{"ID":"desc"}}', 1455385979),
(1676, 28, 1, 0, '{"condition":{"like__account_basic_information__first_name__CONCAT__account_basic_information__middle_name__CONCAT__account_basic_information__last_name":"","test":"1"},"limit":"3","offset":"6","sort":{"ID":"desc"}}', 1455385985),
(1677, 28, 1, 0, '{"condition":{"like__account_basic_information__first_name__CONCAT__account_basic_information__middle_name__CONCAT__account_basic_information__last_name":"","test":"1"},"limit":"3","offset":"6","sort":{"account_basic_information__last_name":"asc","account_basic_information__first_name":"asc"}}', 1455385987),
(1678, 28, 1, 0, '{"condition":{"like__account_basic_information__first_name__CONCAT__account_basic_information__middle_name__CONCAT__account_basic_information__last_name":"","test":"1"},"limit":"3","offset":"9","sort":{"account_basic_information__last_name":"asc","account_basic_information__first_name":"asc"}}', 1455385991),
(1679, 28, 1, 0, '{"condition":{"like__account_basic_information__first_name__CONCAT__account_basic_information__middle_name__CONCAT__account_basic_information__last_name":"","test":"1"},"limit":"3","offset":"9","sort":{"account_basic_information__last_name":"desc","account_basic_information__first_name":"desc"}}', 1455385992),
(1680, 28, 1, 0, '{"condition":{"like__account_basic_information__first_name__CONCAT__account_basic_information__middle_name__CONCAT__account_basic_information__last_name":"","test":"1"},"limit":"3","offset":"9"}', 1455385995),
(1681, 28, 1, 0, '{"condition":{"like__account_basic_information__first_name__CONCAT__account_basic_information__middle_name__CONCAT__account_basic_information__last_name":"","test":"1"},"limit":"3","offset":"6"}', 1455385997),
(1682, 28, 1, 0, '{"condition":{"like__account_basic_information__first_name__CONCAT__account_basic_information__middle_name__CONCAT__account_basic_information__last_name":"","test":"1"},"limit":"3","offset":"3"}', 1455385998),
(1683, 28, 1, 0, '{"condition":{"like__account_basic_information__first_name__CONCAT__account_basic_information__middle_name__CONCAT__account_basic_information__last_name":"","test":"1"},"limit":"3","offset":"3","sort":{"account_basic_information__last_name":"asc","account_basic_information__first_name":"asc"}}', 1455386000),
(1684, 28, 1, 0, '{"condition":{"like__account_basic_information__first_name__CONCAT__account_basic_information__middle_name__CONCAT__account_basic_information__last_name":"","test":"1"},"limit":"3","offset":"0","sort":{"account_basic_information__last_name":"asc","account_basic_information__first_name":"asc"}}', 1455386001),
(1685, 28, 1, 0, '{"condition":{"like__account_basic_information__first_name__CONCAT__account_basic_information__middle_name__CONCAT__account_basic_information__last_name":"","test":"1"},"limit":"3","offset":"0","sort":{"account_basic_information__last_name":"desc","account_basic_information__first_name":"desc"}}', 1455386005),
(1686, 28, 1, 0, '{"condition":{"like__account_basic_information__first_name__CONCAT__account_basic_information__middle_name__CONCAT__account_basic_information__last_name":"","test":"1"},"limit":"3","offset":"3","sort":{"account_basic_information__last_name":"desc","account_basic_information__first_name":"desc"}}', 1455386009),
(1687, 28, 1, 0, '{"condition":{"like__account_basic_information__first_name__CONCAT__account_basic_information__middle_name__CONCAT__account_basic_information__last_name":"","test":"1"},"limit":"3","offset":"6","sort":{"account_basic_information__last_name":"desc","account_basic_information__first_name":"desc"}}', 1455386013),
(1688, 28, 1, 0, '{"condition":{"like__account_basic_information__first_name__CONCAT__account_basic_information__middle_name__CONCAT__account_basic_information__last_name":"asd","test":"1"},"limit":"3","offset":"0","sort":{"account_basic_information__last_name":"desc","account_basic_information__first_name":"desc"}}', 1455386058),
(1689, 28, 1, 0, '{"condition":{"like__account_basic_information__first_name__CONCAT__account_basic_information__middle_name__CONCAT__account_basic_information__last_name":"plenos","test":"1"},"limit":"3","offset":"0","sort":{"account_basic_information__last_name":"desc","account_basic_information__first_name":"desc"}}', 1455386076),
(1690, 28, 1, 0, '{"condition":{"like__account_basic_information__first_name__CONCAT__account_basic_information__middle_name__CONCAT__account_basic_information__last_name":"plenos","test":"1"},"limit":"3","offset":"0","sort":{"account_basic_information__last_name":"desc","account_basic_information__first_name":"desc"}}', 1455386088),
(1691, 28, 1, 0, '{"condition":{"like__account_basic_information__first_name__CONCAT__account_basic_information__middle_name__CONCAT__account_basic_information__last_name":"","test":"1"},"limit":"3"}', 1455386539),
(1692, 28, 1, 0, '{"condition":{"like__account_basic_information__first_name__CONCAT__account_basic_information__middle_name__CONCAT__account_basic_information__last_name":"","test":"1"},"limit":"3","offset":"0","sort":{"ID":"desc"}}', 1455386539),
(1693, 28, 1, 0, '{"ID":"28"}', 1455386566),
(1694, 28, 1, 0, '{"ID":"28"}', 1455386566),
(1695, 28, 1, 0, '{"updated_data":{"first_name":"John Enricks","middle_name":"Retubadosry","last_name":"plenostid","contact_number_ID":"41","contact_number_detail":"09275835504","username":"johnenrick","account_address_ID":"2","account_address_longitude":"0","account_address_latitude":"0","account_address_map_marker_ID":"4","account_address_description":"s2ss2"},"ID":"28","condition":{"account_ID":"28"}}', 1455386569),
(1696, 28, 1, 0, '{"ID":"28"}', 1455386569),
(1697, 28, 1, 0, '{"updated_data":{"first_name":"John Enricks","middle_name":"Retubadosry","last_name":"plenostid","contact_number_ID":"41","contact_number_detail":"09275835504","username":"johnenrick","account_address_ID":"2","account_address_longitude":"0","account_address_latitude":"0","account_address_map_marker_ID":"4","account_address_description":"s2ss2"},"ID":"28","condition":{"account_ID":"28"}}', 1455386570),
(1698, 28, 1, 0, '{"ID":"28"}', 1455386570),
(1699, 28, 1, 0, '{"updated_data":{"first_name":"John Enricks","middle_name":"Retubadosry","last_name":"plenostid","contact_number_ID":"41","contact_number_detail":"09275835504","username":"johnenrick","account_address_ID":"2","account_address_longitude":"0","account_address_latitude":"0","account_address_map_marker_ID":"4","account_address_description":"s2ss2"},"ID":"28","condition":{"account_ID":"28"}}', 1455386570),
(1700, 28, 1, 0, '{"ID":"28"}', 1455386571),
(1701, 28, 1, 0, '{"updated_data":{"first_name":"John Enricks","middle_name":"Retubadosry","last_name":"plenostid","contact_number_ID":"41","contact_number_detail":"09275835504","username":"johnenrick","account_address_ID":"2","account_address_longitude":"0","account_address_latitude":"0","account_address_map_marker_ID":"4","account_address_description":"s2ss2"},"ID":"28","condition":{"account_ID":"28"}}', 1455386571),
(1702, 28, 1, 0, '{"ID":"28"}', 1455386571),
(1703, 28, 1, 0, '{"updated_data":{"first_name":"John Enricks","middle_name":"Retubadosry","last_name":"plenostid","contact_number_ID":"41","contact_number_detail":"09275835504","username":"johnenrick","account_address_ID":"2","account_address_longitude":"0","account_address_latitude":"0","account_address_map_marker_ID":"4","account_address_description":"s2ss2"},"ID":"28","condition":{"account_ID":"28"}}', 1455386572),
(1704, 28, 1, 0, '{"ID":"28"}', 1455386572),
(1705, 28, 1, 0, '{"updated_data":{"first_name":"John Enricks","middle_name":"Retubadosry","last_name":"plenostid","contact_number_ID":"41","contact_number_detail":"09275835504","username":"johnenrick","account_address_ID":"2","account_address_longitude":"0","account_address_latitude":"0","account_address_map_marker_ID":"4","account_address_description":"s2ss2"},"ID":"28","condition":{"account_ID":"28"}}', 1455386573),
(1706, 28, 1, 0, '{"ID":"28"}', 1455386573),
(1707, 28, 1, 0, '{"updated_data":{"first_name":"John Enricks","middle_name":"Retubadosry","last_name":"plenostid","contact_number_ID":"41","contact_number_detail":"09275835504","username":"johnenrick","account_address_ID":"2","account_address_longitude":"0","account_address_latitude":"0","account_address_map_marker_ID":"4","account_address_description":"s2ss2"},"ID":"28","condition":{"account_ID":"28"}}', 1455386574),
(1708, 28, 1, 0, '{"ID":"28"}', 1455386574),
(1709, 28, 1, 0, '{"updated_data":{"first_name":"John Enricks","middle_name":"Retubadosry","last_name":"plenostid","contact_number_ID":"41","contact_number_detail":"09275835504","username":"johnenrick","account_address_ID":"2","account_address_longitude":"0","account_address_latitude":"0","account_address_map_marker_ID":"4","account_address_description":"s2ss2"},"ID":"28","condition":{"account_ID":"28"}}', 1455386574),
(1710, 28, 1, 0, '{"ID":"28"}', 1455386574),
(1711, 28, 1, 0, '{"updated_data":{"first_name":"John Enricks","middle_name":"Retubadosry","last_name":"plenostid","contact_number_ID":"41","contact_number_detail":"09275835504","username":"johnenrick","account_address_ID":"2","account_address_longitude":"0","account_address_latitude":"0","account_address_map_marker_ID":"4","account_address_description":"s2ss2"},"ID":"28","condition":{"account_ID":"28"}}', 1455386575),
(1712, 28, 1, 0, '{"ID":"28"}', 1455386575),
(1713, 28, 1, 0, '{"updated_data":{"first_name":"John Enricks","middle_name":"Retubadosry","last_name":"plenostid","contact_number_ID":"41","contact_number_detail":"09275835504","username":"johnenrick","account_address_ID":"2","account_address_longitude":"0","account_address_latitude":"0","account_address_map_marker_ID":"4","account_address_description":"s2ss2"},"ID":"28","condition":{"account_ID":"28"}}', 1455386576),
(1714, 28, 1, 0, '{"ID":"28"}', 1455386576),
(1715, 28, 1, 0, '{"updated_data":{"first_name":"John Enricksss","middle_name":"Retubadosrys","last_name":"plenostid","contact_number_ID":"41","contact_number_detail":"09275835504","username":"johnenrick","account_address_ID":"2","account_address_longitude":"0","account_address_latitude":"0","account_address_map_marker_ID":"4","account_address_description":"s2ss2"},"ID":"28","condition":{"account_ID":"28"}}', 1455386580),
(1716, 28, 1, 0, '{"ID":"28"}', 1455386580),
(1717, 28, 1, 0, '{"updated_data":{"first_name":"John Enricksss","middle_name":"Retubadosrys","last_name":"plenostid","contact_number_ID":"41","contact_number_detail":"09275835504","username":"johnenrick","account_address_ID":"2","account_address_longitude":"0","account_address_latitude":"0","account_address_map_marker_ID":"4","account_address_description":"s2ss2"},"ID":"28","condition":{"account_ID":"28"}}', 1455386585),
(1718, 28, 1, 0, '{"ID":"28"}', 1455386585),
(1719, 28, 1, 0, '{"ID":"28"}', 1455388572),
(1720, 28, 1, 0, '{"ID":"28"}', 1455388572),
(1721, 28, 1, 0, '{"condition":{"like__account_basic_information__first_name__CONCAT__account_basic_information__middle_name__CONCAT__account_basic_information__last_name":"","test":"1"},"limit":"3"}', 1455388573),
(1722, 28, 1, 0, '{"condition":{"like__account_basic_information__first_name__CONCAT__account_basic_information__middle_name__CONCAT__account_basic_information__last_name":"","test":"1"},"limit":"3","offset":"0","sort":{"ID":"desc"}}', 1455388573),
(1723, 28, 1, 0, '{"ID":"28"}', 1455388573),
(1724, 28, 1, 0, '{"ID":"28"}', 1455388574),
(1725, 28, 1, 0, '{"ID":"28"}', 1455388610),
(1726, 28, 1, 0, '{"ID":"28"}', 1455388613),
(1727, 28, 1, 0, '{"ID":"28"}', 1455388766),
(1728, 28, 1, 0, '{"ID":"28"}', 1455388863),
(1729, 28, 1, 0, '{"ID":"28"}', 1455388887),
(1730, 28, 1, 0, '{"ID":"28"}', 1455388888),
(1731, 28, 1, 0, '{"ID":"28"}', 1455455654),
(1732, 28, 1, 0, '{"ID":"28"}', 1455455654),
(1733, 28, 1, 0, '{"condition":{"like__account_basic_information__first_name__CONCAT__account_basic_information__middle_name__CONCAT__account_basic_information__last_name":"","test":"1"},"limit":"3"}', 1455455655),
(1734, 28, 1, 0, '{"condition":{"like__account_basic_information__first_name__CONCAT__account_basic_information__middle_name__CONCAT__account_basic_information__last_name":"","test":"1"},"limit":"3","offset":"0","sort":{"ID":"desc"}}', 1455455655),
(1735, 28, 1, 0, '1', 1455457901),
(1736, 28, 1, 0, '{"description":"haha","detail":"test","longitude":"1","latitude":"2"}', 1455458277),
(1737, 28, 1, 0, '{"description":"haha","detail":"test","longitude":"1","latitude":"2","ID":"1"}', 1455458291),
(1738, 28, 1, 0, '{"updated_data":{"description":"huhu"},"detail":"test","longitude":"1","latitude":"2","ID":"1"}', 1455459277),
(1739, 28, 1, 0, '{"updated_data":{"description":"huhu"},"detail":"test","longitude":"1","latitude":"2","ID":"1"}', 1455459285),
(1740, 28, 1, 0, '{"updated_data":{"description":"huhu"},"detail":"test","longitude":"1","latitude":"2","ID":"1"}', 1455459314),
(1741, 28, 1, 0, '{"updated_data":{"description":"huhu"},"detail":"test","longitude":"3","latitude":"4","ID":"1"}', 1455459346),
(1742, 28, 1, 0, '{"updated_data":{"description":"huhu","longitude":"3","latitude":"4"},"detail":"test","ID":"1"}', 1455459425),
(1743, 28, 1, 0, '{"ID":"28"}', 1455461354),
(1744, 28, 1, 0, '{"ID":"28"}', 1455461357),
(1745, 28, 1, 0, '{"ID":"28"}', 1455461361),
(1746, 28, 1, 0, '{"ID":"28"}', 1455461363),
(1747, 28, 1, 0, '{"condition":{"like__account_basic_information__first_name__CONCAT__account_basic_information__middle_name__CONCAT__account_basic_information__last_name":"","test":"1"},"limit":"3","offset":"0","sort":{"ID":"desc"}}', 1455461417),
(1748, 28, 1, 0, '{"ID":"28"}', 1455461452),
(1749, 28, 1, 0, '{"ID":"28"}', 1455461459),
(1750, 28, 9, 0, '{"condition":{"like__account_basic_information__first_name__CONCAT__account_basic_information__middle_name__CONCAT__account_basic_information__last_name":"","test":"1"},"limit":"3"}', 1455520717),
(1751, 28, 9, 0, '{"condition":{"like__account_basic_information__first_name__CONCAT__account_basic_information__middle_name__CONCAT__account_basic_information__last_name":"","test":"1"},"limit":"3","offset":"0","sort":{"ID":"desc"}}', 1455520717),
(1752, 28, 9, 0, '{"condition":{"like__account_basic_information__first_name__CONCAT__account_basic_information__middle_name__CONCAT__account_basic_information__last_name":"","test":"1"},"limit":"3","offset":"3","sort":{"ID":"desc"}}', 1455520725),
(1753, 28, 9, 0, '{"condition":{"like__account_basic_information__first_name__CONCAT__account_basic_information__middle_name__CONCAT__account_basic_information__last_name":"","test":"1"},"limit":"3","offset":"6","sort":{"ID":"desc"}}', 1455520726),
(1754, 28, 9, 0, '{"condition":{"like__account_basic_information__first_name__CONCAT__account_basic_information__middle_name__CONCAT__account_basic_information__last_name":"","test":"1"},"limit":"3","offset":"9","sort":{"ID":"desc"}}', 1455520727),
(1755, 28, 9, 0, '{"condition":{"like__account_basic_information__first_name__CONCAT__account_basic_information__middle_name__CONCAT__account_basic_information__last_name":"","test":"1"},"limit":"3","offset":"6","sort":{"ID":"desc"}}', 1455520729),
(1756, 28, 9, 0, '{"condition":{"like__account_basic_information__first_name__CONCAT__account_basic_information__middle_name__CONCAT__account_basic_information__last_name":"","test":"1"},"limit":"3","offset":"9","sort":{"ID":"desc"}}', 1455520730),
(1757, 28, 9, 0, '{"condition":{"like__account_basic_information__first_name__CONCAT__account_basic_information__middle_name__CONCAT__account_basic_information__last_name":"","test":"1"},"limit":"3","offset":"6","sort":{"ID":"desc"}}', 1455520732),
(1758, 28, 9, 0, '{"condition":{"like__account_basic_information__first_name__CONCAT__account_basic_information__middle_name__CONCAT__account_basic_information__last_name":"","test":"1"},"limit":"3","offset":"3","sort":{"ID":"desc"}}', 1455520733),
(1759, 28, 9, 0, '{"condition":{"like__account_basic_information__first_name__CONCAT__account_basic_information__middle_name__CONCAT__account_basic_information__last_name":"","test":"1"},"limit":"3","offset":"3","sort":{"username":"asc"}}', 1455520734),
(1760, 28, 9, 0, '{"condition":{"like__account_basic_information__first_name__CONCAT__account_basic_information__middle_name__CONCAT__account_basic_information__last_name":"","test":"1"},"limit":"3","offset":"3","sort":{"account_basic_information__last_name":"asc","account_basic_information__first_name":"asc"}}', 1455520735),
(1761, 28, 9, 0, '{"condition":{"like__account_basic_information__first_name__CONCAT__account_basic_information__middle_name__CONCAT__account_basic_information__last_name":"","test":"1"},"limit":"3","offset":"3","sort":{"account_basic_information__last_name":"desc","account_basic_information__first_name":"desc"}}', 1455520735),
(1762, 28, 9, 0, '{"condition":{"like__account_basic_information__first_name__CONCAT__account_basic_information__middle_name__CONCAT__account_basic_information__last_name":"","test":"1"},"limit":"3","offset":"3","sort":{"account_basic_information__last_name":"desc","account_basic_information__first_name":"desc"}}', 1455520741),
(1763, 28, 9, 0, '{"ID":"28"}', 1455520779),
(1764, 28, 9, 0, '{"ID":"28"}', 1455520779),
(1765, 28, 9, 0, '{"ID":"28"}', 1455520783),
(1766, 28, 9, 0, '{"ID":"28"}', 1455520793),
(1767, 28, 9, 0, '{"ID":"28"}', 1455520795),
(1768, 28, 9, 0, '{"ID":"28"}', 1455520796),
(1769, 28, 9, 0, '{"ID":"28"}', 1455520797),
(1770, 28, 9, 0, '{"ID":"28"}', 1455520798),
(1771, 28, 9, 0, '{"ID":"28"}', 1455520799),
(1772, 28, 9, 0, '{"ID":"28"}', 1455520867),
(1773, 28, 9, 0, '{"ID":"28"}', 1455520868),
(1774, 28, 9, 0, '{"ID":"28"}', 1455520868),
(1775, 28, 9, 0, '{"condition":{"like__account_basic_information__first_name__CONCAT__account_basic_information__middle_name__CONCAT__account_basic_information__last_name":"","test":"1"},"limit":"3"}', 1455520868),
(1776, 28, 9, 0, '{"condition":{"like__account_basic_information__first_name__CONCAT__account_basic_information__middle_name__CONCAT__account_basic_information__last_name":"","test":"1"},"limit":"3","offset":"0","sort":{"ID":"desc"}}', 1455520868),
(1777, 28, 9, 0, '{"ID":"28"}', 1455520869),
(1778, 28, 9, 0, '{"ID":"28"}', 1455520869),
(1779, 28, 9, 0, '{"condition":{"like__account_basic_information__first_name__CONCAT__account_basic_information__middle_name__CONCAT__account_basic_information__last_name":"","test":"1"},"limit":"3"}', 1455544455),
(1780, 28, 9, 0, '{"condition":{"like__account_basic_information__first_name__CONCAT__account_basic_information__middle_name__CONCAT__account_basic_information__last_name":"","test":"1"},"limit":"3","offset":"0","sort":{"ID":"desc"}}', 1455544455),
(1781, 28, 9, 0, '{"ID":"28"}', 1455544456),
(1782, 28, 9, 0, '{"ID":"28"}', 1455544456),
(1783, 28, 9, 0, '{"updated_data":{"first_name":"John Enricksss","middle_name":"Retubadosrys","last_name":"plenostid","contact_number_ID":"41","contact_number_detail":"09275835504","username":"johnenrick","account_address_ID":"2","account_address_longitude":"0","account_address_latitude":"0","account_address_map_marker_ID":"4","account_address_description":"s2ss2"},"ID":"28","condition":{"account_ID":"28"}}', 1455544458),
(1784, 28, 9, 0, '{"ID":"28"}', 1455544458),
(1785, 28, 9, 0, '{"updated_data":{"first_name":"John Enricksss","middle_name":"Retubadosrys","last_name":"plenostid","contact_number_ID":"41","contact_number_detail":"09275835504","username":"johnenrick","account_address_ID":"2","account_address_longitude":"0","account_address_latitude":"0","account_address_map_marker_ID":"4","account_address_description":"s2ss2"},"ID":"28","condition":{"account_ID":"28"}}', 1455544459),
(1786, 28, 9, 0, '{"ID":"28"}', 1455544459),
(1787, 28, 9, 0, '{"ID":"28"}', 1455544477),
(1788, 28, 9, 0, '{"ID":"28"}', 1455544477),
(1789, 28, 9, 0, '{"condition":{"like__account_basic_information__first_name__CONCAT__account_basic_information__middle_name__CONCAT__account_basic_information__last_name":"","test":"1"},"limit":"3"}', 1455544479),
(1790, 28, 9, 0, '{"condition":{"like__account_basic_information__first_name__CONCAT__account_basic_information__middle_name__CONCAT__account_basic_information__last_name":"","test":"1"},"limit":"3","offset":"0","sort":{"ID":"desc"}}', 1455544479),
(1791, 28, 9, 0, '{"ID":"28"}', 1455544496),
(1792, 28, 9, 0, '{"ID":"28"}', 1455544516),
(1793, 28, 9, 0, '{"ID":"28"}', 1455544518),
(1794, 28, 9, 0, '{"ID":"28"}', 1455544520),
(1795, 28, 9, 0, '{"updated_data":{"first_name":"John Enrick","middle_name":"Retubado","last_name":"plenost","contact_number_ID":"41","contact_number_detail":"09275835504","username":"johnenrick","account_address_ID":"2","account_address_longitude":"0","account_address_latitude":"0","account_address_map_marker_ID":"4","account_address_description":"s2ss2"},"ID":"28","condition":{"account_ID":"28"}}', 1455544530),
(1796, 28, 9, 0, '{"ID":"28"}', 1455544530),
(1797, 28, 9, 0, '{"condition":{"like__account_basic_information__first_name__CONCAT__account_basic_information__middle_name__CONCAT__account_basic_information__last_name":"","test":"1"},"limit":"3"}', 1455544698),
(1798, 28, 9, 0, '{"condition":{"like__account_basic_information__first_name__CONCAT__account_basic_information__middle_name__CONCAT__account_basic_information__last_name":"","test":"1"},"limit":"3","offset":"0","sort":{"ID":"desc"}}', 1455544698),
(1799, 28, 9, 0, '{"condition":{"like__account_basic_information__first_name__CONCAT__account_basic_information__middle_name__CONCAT__account_basic_information__last_name":"","test":"1"},"limit":"3","offset":"3","sort":{"ID":"desc"}}', 1455544707),
(1800, 28, 9, 0, '{"condition":{"like__account_basic_information__first_name__CONCAT__account_basic_information__middle_name__CONCAT__account_basic_information__last_name":"","test":"1"},"limit":"3","offset":"6","sort":{"ID":"desc"}}', 1455544708),
(1801, 28, 9, 0, '{"condition":{"like__account_basic_information__first_name__CONCAT__account_basic_information__middle_name__CONCAT__account_basic_information__last_name":"","test":"1"},"limit":"3","offset":"9","sort":{"ID":"desc"}}', 1455544709),
(1802, 28, 9, 0, '{"condition":{"like__account_basic_information__first_name__CONCAT__account_basic_information__middle_name__CONCAT__account_basic_information__last_name":"","test":"1"},"limit":"3","offset":"9","sort":{"account_basic_information__last_name":"asc","account_basic_information__first_name":"asc"}}', 1455544709),
(1803, 28, 9, 0, '{"condition":{"like__account_basic_information__first_name__CONCAT__account_basic_information__middle_name__CONCAT__account_basic_information__last_name":"","test":"1"},"limit":"3","offset":"9","sort":{"account_basic_information__last_name":"desc","account_basic_information__first_name":"desc"}}', 1455544710),
(1804, 28, 9, 0, '{"condition":{"like__account_basic_information__first_name__CONCAT__account_basic_information__middle_name__CONCAT__account_basic_information__last_name":"","test":"1"},"limit":"3","offset":"9","sort":{"username":"asc"}}', 1455544710),
(1805, 28, 9, 0, '{"condition":{"like__account_basic_information__first_name__CONCAT__account_basic_information__middle_name__CONCAT__account_basic_information__last_name":"","test":"1"},"limit":"3","offset":"9","sort":{"account_basic_information__last_name":"asc","account_basic_information__first_name":"asc"}}', 1455544711),
(1806, 28, 9, 0, '{"condition":{"like__account_basic_information__first_name__CONCAT__account_basic_information__middle_name__CONCAT__account_basic_information__last_name":"","test":"1"},"limit":"3","offset":"9","sort":{"account_basic_information__last_name":"desc","account_basic_information__first_name":"desc"}}', 1455544711),
(1807, 28, 9, 0, '{"condition":{"like__account_basic_information__first_name__CONCAT__account_basic_information__middle_name__CONCAT__account_basic_information__last_name":"","test":"1"},"limit":"3","offset":"6","sort":{"account_basic_information__last_name":"desc","account_basic_information__first_name":"desc"}}', 1455544712),
(1808, 28, 9, 0, '{"condition":{"like__account_basic_information__first_name__CONCAT__account_basic_information__middle_name__CONCAT__account_basic_information__last_name":"","test":"1"},"limit":"3","offset":"6"}', 1455544713),
(1809, 28, 9, 0, '{"condition":{"like__account_basic_information__first_name__CONCAT__account_basic_information__middle_name__CONCAT__account_basic_information__last_name":"","test":"1"},"limit":"3","offset":"6","sort":{"account_basic_information__last_name":"asc","account_basic_information__first_name":"asc"}}', 1455544713),
(1810, 28, 9, 0, '{"condition":{"like__account_basic_information__first_name__CONCAT__account_basic_information__middle_name__CONCAT__account_basic_information__last_name":"","test":"1"},"limit":"3","offset":"9","sort":{"account_basic_information__last_name":"asc","account_basic_information__first_name":"asc"}}', 1455544720),
(1811, 28, 9, 0, '{"condition":{"like__account_basic_information__first_name__CONCAT__account_basic_information__middle_name__CONCAT__account_basic_information__last_name":"","test":"1"},"limit":"3","offset":"6","sort":{"account_basic_information__last_name":"asc","account_basic_information__first_name":"asc"}}', 1455544721),
(1812, 28, 9, 0, '{"condition":{"like__account_basic_information__first_name__CONCAT__account_basic_information__middle_name__CONCAT__account_basic_information__last_name":"","test":"1"},"limit":"3","offset":"3","sort":{"account_basic_information__last_name":"asc","account_basic_information__first_name":"asc"}}', 1455544722),
(1813, 28, 9, 0, '{"condition":{"like__account_basic_information__first_name__CONCAT__account_basic_information__middle_name__CONCAT__account_basic_information__last_name":"","test":"1"},"limit":"3","offset":"6","sort":{"account_basic_information__last_name":"asc","account_basic_information__first_name":"asc"}}', 1455544723),
(1814, 28, 9, 0, '{"condition":{"like__account_basic_information__first_name__CONCAT__account_basic_information__middle_name__CONCAT__account_basic_information__last_name":"","test":"1"},"limit":"3","offset":"3","sort":{"account_basic_information__last_name":"asc","account_basic_information__first_name":"asc"}}', 1455544723),
(1815, 28, 9, 0, '{"condition":{"like__account_basic_information__first_name__CONCAT__account_basic_information__middle_name__CONCAT__account_basic_information__last_name":"","test":"1"},"limit":"3","offset":"6","sort":{"account_basic_information__last_name":"asc","account_basic_information__first_name":"asc"}}', 1455544728),
(1816, 28, 9, 0, '{"condition":{"like__account_basic_information__first_name__CONCAT__account_basic_information__middle_name__CONCAT__account_basic_information__last_name":"","test":"1"},"limit":"3","offset":"3","sort":{"account_basic_information__last_name":"asc","account_basic_information__first_name":"asc"}}', 1455544729),
(1817, 28, 9, 0, '{"condition":{"like__account_basic_information__first_name__CONCAT__account_basic_information__middle_name__CONCAT__account_basic_information__last_name":"","test":"1"},"limit":"3","offset":"0","sort":{"account_basic_information__last_name":"asc","account_basic_information__first_name":"asc"}}', 1455544730),
(1818, 28, 9, 0, '{"condition":{"like__account_basic_information__first_name__CONCAT__account_basic_information__middle_name__CONCAT__account_basic_information__last_name":"","test":"1"},"limit":"3","offset":"3","sort":{"account_basic_information__last_name":"asc","account_basic_information__first_name":"asc"}}', 1455544731),
(1819, 28, 9, 0, '{"condition":{"like__account_basic_information__first_name__CONCAT__account_basic_information__middle_name__CONCAT__account_basic_information__last_name":"","test":"1"},"limit":"3","offset":"6","sort":{"account_basic_information__last_name":"asc","account_basic_information__first_name":"asc"}}', 1455544732),
(1820, 28, 9, 0, '{"condition":{"like__account_basic_information__first_name__CONCAT__account_basic_information__middle_name__CONCAT__account_basic_information__last_name":"","test":"1"},"limit":"3","offset":"9","sort":{"account_basic_information__last_name":"asc","account_basic_information__first_name":"asc"}}', 1455544736),
(1821, 28, 9, 0, '{"condition":{"like__account_basic_information__first_name__CONCAT__account_basic_information__middle_name__CONCAT__account_basic_information__last_name":"","test":"1"},"limit":"3","offset":"6","sort":{"account_basic_information__last_name":"asc","account_basic_information__first_name":"asc"}}', 1455544738),
(1822, 28, 9, 0, '{"condition":{"like__account_basic_information__first_name__CONCAT__account_basic_information__middle_name__CONCAT__account_basic_information__last_name":"","test":"1"},"limit":"3","offset":"9","sort":{"account_basic_information__last_name":"asc","account_basic_information__first_name":"asc"}}', 1455545665),
(1823, 28, 9, 0, '{"condition":{"like__account_basic_information__first_name__CONCAT__account_basic_information__middle_name__CONCAT__account_basic_information__last_name":"","test":"1"},"limit":"3","offset":"6","sort":{"account_basic_information__last_name":"asc","account_basic_information__first_name":"asc"}}', 1455545667),
(1824, 28, 9, 0, '{"condition":{"like__account_basic_information__first_name__CONCAT__account_basic_information__middle_name__CONCAT__account_basic_information__last_name":"","test":"1"},"limit":"3","offset":"9","sort":{"account_basic_information__last_name":"asc","account_basic_information__first_name":"asc"}}', 1455545668),
(1825, 28, 9, 0, '{"condition":{"like__account_basic_information__first_name__CONCAT__account_basic_information__middle_name__CONCAT__account_basic_information__last_name":"","test":"1"},"limit":"3","offset":"6","sort":{"account_basic_information__last_name":"asc","account_basic_information__first_name":"asc"}}', 1455545669),
(1826, 28, 9, 0, '{"condition":{"like__account_basic_information__first_name__CONCAT__account_basic_information__middle_name__CONCAT__account_basic_information__last_name":"","test":"1"},"limit":"3","offset":"6","sort":{"account_basic_information__last_name":"desc","account_basic_information__first_name":"desc"}}', 1455545670),
(1827, 28, 7, 0, '1', 1455549491),
(1828, 28, 7, 0, '1', 1455549518),
(1829, 28, 7, 0, '1', 1455549525),
(1830, 28, 7, 0, '1', 1455549531),
(1831, 28, 7, 0, '1', 1455549535),
(1832, 28, 7, 0, '1', 1455549562),
(1833, 28, 7, 0, '1', 1455549865),
(1834, 28, 9, 0, '{"condition":{"like__account_basic_information__first_name__CONCAT__account_basic_information__middle_name__CONCAT__account_basic_information__last_name":"","test":"1"},"limit":"3"}', 1455549955),
(1835, 28, 9, 0, '{"condition":{"like__account_basic_information__first_name__CONCAT__account_basic_information__middle_name__CONCAT__account_basic_information__last_name":"","test":"1"},"limit":"3","offset":"0","sort":{"ID":"desc"}}', 1455549955),
(1836, 28, 7, 0, '10', 1455550456),
(1837, 28, 7, 0, '11', 1455550469),
(1838, 28, 7, 0, '12', 1455550497),
(1839, 28, 7, 0, '13', 1455550563);

-- --------------------------------------------------------

--
-- Table structure for table `api_controller`
--

CREATE TABLE IF NOT EXISTS `api_controller` (
`ID` int(11) NOT NULL,
  `description` varchar(100) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `api_controller`
--

INSERT INTO `api_controller` (`ID`, `description`) VALUES
(1, 'Account Address'),
(2, 'Account Contact Information'),
(3, 'Dumping Location'),
(4, 'Information'),
(5, 'Report'),
(6, 'Waste Category'),
(7, 'Waste Post'),
(8, 'Access Control List'),
(9, 'Account'),
(10, 'Map Marker');

-- --------------------------------------------------------

--
-- Table structure for table `barangay`
--

CREATE TABLE IF NOT EXISTS `barangay` (
`ID` int(10) unsigned NOT NULL,
  `name` text,
  `boundary` text,
  `address` text
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `barangay`
--

INSERT INTO `barangay` (`ID`, `name`, `boundary`, `address`) VALUES
(1, 'talamban', '5', '2');

-- --------------------------------------------------------

--
-- Table structure for table `dumping_location`
--

CREATE TABLE IF NOT EXISTS `dumping_location` (
`ID` int(11) NOT NULL,
  `description` varchar(50) NOT NULL,
  `detail` text NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `dumping_location`
--

INSERT INTO `dumping_location` (`ID`, `description`, `detail`) VALUES
(1, 'huhu', 'test');

-- --------------------------------------------------------

--
-- Table structure for table `group_access_control_list`
--

CREATE TABLE IF NOT EXISTS `group_access_control_list` (
`ID` int(11) NOT NULL,
  `module_ID` int(11) NOT NULL,
  `group_ID` int(11) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `group_access_control_list`
--

INSERT INTO `group_access_control_list` (`ID`, `module_ID`, `group_ID`) VALUES
(1, 1, 2),
(2, 4, 2),
(3, 3, 2),
(4, 2, 2),
(5, 4, 4),
(6, 2, 4),
(7, 5, 1),
(8, 4, 1),
(9, 1, 4),
(10, 1, 3),
(11, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `information`
--

CREATE TABLE IF NOT EXISTS `information` (
`ID` int(10) unsigned NOT NULL,
  `barangay_ID` int(10) unsigned NOT NULL,
  `source` int(11) NOT NULL,
  `type_ID` int(10) unsigned NOT NULL,
  `detail` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `information_type`
--

CREATE TABLE IF NOT EXISTS `information_type` (
`ID` int(10) unsigned NOT NULL,
  `description` varchar(45) DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `information_type`
--

INSERT INTO `information_type` (`ID`, `description`) VALUES
(1, 'Articles'),
(2, 'Guidelines');

-- --------------------------------------------------------

--
-- Table structure for table `map_marker`
--

CREATE TABLE IF NOT EXISTS `map_marker` (
`ID` int(10) unsigned NOT NULL,
  `associated_ID` int(11) NOT NULL,
  `map_marker_type_ID` int(11) NOT NULL,
  `longitude` double DEFAULT NULL,
  `latitude` double DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `map_marker`
--

INSERT INTO `map_marker` (`ID`, `associated_ID`, `map_marker_type_ID`, `longitude`, `latitude`) VALUES
(4, 2, 1, 0, 0),
(5, 4, 1, 0, 0),
(6, 5, 1, 0, 0),
(7, 1, 2, 3, 4);

-- --------------------------------------------------------

--
-- Table structure for table `map_marker_type`
--

CREATE TABLE IF NOT EXISTS `map_marker_type` (
`ID` int(11) NOT NULL,
  `description` varchar(50) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `map_marker_type`
--

INSERT INTO `map_marker_type` (`ID`, `description`) VALUES
(1, 'User Address'),
(2, 'Dumping Location'),
(3, 'report');

-- --------------------------------------------------------

--
-- Table structure for table `module`
--

CREATE TABLE IF NOT EXISTS `module` (
`ID` int(11) NOT NULL,
  `description` varchar(50) NOT NULL,
  `parent_ID` int(11) NOT NULL,
  `link` text NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `module`
--

INSERT INTO `module` (`ID`, `description`, `parent_ID`, `link`) VALUES
(1, 'Home', 0, 'portal'),
(2, 'Waste Map', 0, 'wastemap'),
(3, 'Information', 0, 'information_page'),
(4, 'Profile', 0, 'profile_management'),
(5, 'LGU Management', 0, 'lgu_management'),
(6, 'Waste Post', 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `module_api_controller`
--

CREATE TABLE IF NOT EXISTS `module_api_controller` (
`ID` int(11) NOT NULL,
  `module_ID` int(11) NOT NULL,
  `api_controller_ID` int(11) NOT NULL,
  `privilege_code` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `password_recovery`
--

CREATE TABLE IF NOT EXISTS `password_recovery` (
`ID` int(11) NOT NULL,
  `account_ID` int(11) NOT NULL,
  `status` int(11) NOT NULL COMMENT '0 - pending, 1 - resseted',
  `datetime` double NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=45 ;

--
-- Dumping data for table `password_recovery`
--

INSERT INTO `password_recovery` (`ID`, `account_ID`, `status`, `datetime`) VALUES
(18, 28, 0, 1454675853),
(19, 28, 0, 1454678221),
(20, 28, 0, 1454678250),
(21, 28, 0, 1454679239),
(22, 28, 0, 1454679430),
(23, 28, 1, 1454772831),
(24, 28, 0, 1454773608),
(25, 28, 0, 1454774285),
(26, 28, 0, 1454774306),
(27, 28, 0, 1454774332),
(28, 28, 0, 1454774376),
(29, 28, 0, 1454774412),
(30, 28, 0, 1454774432),
(31, 28, 0, 1454774466),
(32, 28, 0, 1454774468),
(33, 28, 0, 1454774469),
(34, 28, 0, 1454774488),
(35, 28, 0, 1454774517),
(36, 28, 0, 1454774576),
(37, 28, 0, 1454774590),
(38, 28, 0, 1454774639),
(39, 28, 0, 1454774698),
(40, 28, 0, 1454774706),
(41, 28, 0, 1454774717),
(42, 28, 0, 1454774741),
(43, 28, 0, 1454776190),
(44, 28, 1, 1454776406);

-- --------------------------------------------------------

--
-- Table structure for table `report`
--

CREATE TABLE IF NOT EXISTS `report` (
`ID` int(10) unsigned NOT NULL,
  `associated_ID` int(11) NOT NULL,
  `report_type_ID` int(10) unsigned NOT NULL,
  `reporter_account_ID` int(11) NOT NULL,
  `detail` text,
  `datetime` double DEFAULT NULL,
  `status` int(11) NOT NULL COMMENT '1 - ongoing, 2 - done'
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=24 ;

--
-- Dumping data for table `report`
--

INSERT INTO `report` (`ID`, `associated_ID`, `report_type_ID`, `reporter_account_ID`, `detail`, `datetime`, `status`) VALUES
(4, 2, 2, 5, 'testing', 1450092715, 1),
(5, 2, 3, 5, 'testing', 1450092747, 1),
(6, 2, 3, 5, 'testing', 1450092779, 1),
(7, 2, 3, 5, 'testing', 1450092890, 1),
(8, 2, 3, 5, 'testing', 1450092901, 1),
(9, 2, 3, 5, 'testing', 1450092916, 1),
(10, 2, 3, 5, 'testing', 1450092936, 1),
(11, 2, 3, 5, 'testing', 1450092950, 1),
(12, 2, 3, 5, 'testing', 1450092969, 1),
(13, 2, 3, 5, 'testing', 1450092981, 1),
(14, 2, 3, 5, 'testing', 1450093031, 1),
(15, 2, 3, 5, 'testing', 1450093673, 1),
(16, 3, 2, 5, 'daghang tae', 1450095178, 1),
(17, 3, 3, 5, 'daghang tae', 1450095215, 1),
(18, 3, 3, 5, 'daghang tae', 1450095227, 1),
(19, 3, 3, 5, 'tobol', 1450095340, 1),
(20, 3, 3, 5, 'tobol', 1450095362, 1),
(21, 3, 3, 5, 'tobol', 1450095432, 1),
(22, 3, 3, 5, 'tobol', 1450095436, 1),
(23, 3, 3, 5, 'tobol', 1450095461, 1);

-- --------------------------------------------------------

--
-- Table structure for table `report_type`
--

CREATE TABLE IF NOT EXISTS `report_type` (
`ID` int(10) unsigned NOT NULL,
  `description` varchar(45) DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `report_type`
--

INSERT INTO `report_type` (`ID`, `description`) VALUES
(1, 'Marker'),
(2, 'Article'),
(3, 'Illegal Dumping');

-- --------------------------------------------------------

--
-- Table structure for table `status`
--

CREATE TABLE IF NOT EXISTS `status` (
`ID` int(10) unsigned NOT NULL,
  `description` varchar(45) DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `status`
--

INSERT INTO `status` (`ID`, `description`) VALUES
(1, 'Collected'),
(2, 'Not Collected');

-- --------------------------------------------------------

--
-- Table structure for table `unit`
--

CREATE TABLE IF NOT EXISTS `unit` (
`ID` int(10) unsigned NOT NULL,
  `notation` varchar(10) DEFAULT NULL,
  `description` varchar(45) DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `unit`
--

INSERT INTO `unit` (`ID`, `notation`, `description`) VALUES
(0, 'NA', 'No Unit'),
(1, 'Kg', 'Kilogram'),
(2, 'PhP', 'Peso');

-- --------------------------------------------------------

--
-- Table structure for table `waste_category`
--

CREATE TABLE IF NOT EXISTS `waste_category` (
`ID` int(10) unsigned NOT NULL,
  `description` varchar(45) DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `waste_category`
--

INSERT INTO `waste_category` (`ID`, `description`) VALUES
(1, 'Biodegradable'),
(2, 'Non-Biodegradable'),
(3, 'Hazardous');

-- --------------------------------------------------------

--
-- Table structure for table `waste_post`
--

CREATE TABLE IF NOT EXISTS `waste_post` (
`ID` int(10) unsigned NOT NULL,
  `account_ID` int(10) unsigned NOT NULL,
  `waste_post_type_ID` int(11) NOT NULL,
  `waste_category_ID` int(10) unsigned NOT NULL,
  `description` text,
  `quantity` double DEFAULT NULL,
  `quantity_unit_ID` int(10) unsigned NOT NULL COMMENT 'change quantity unit int to varchar 20',
  `price` double DEFAULT NULL,
  `datetime` double DEFAULT NULL,
  `status` int(10) unsigned NOT NULL COMMENT '1 - default, 2 - collected'
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=15 ;

--
-- Dumping data for table `waste_post`
--

INSERT INTO `waste_post` (`ID`, `account_ID`, `waste_post_type_ID`, `waste_category_ID`, `description`, `quantity`, `quantity_unit_ID`, `price`, `datetime`, `status`) VALUES
(1, 28, 1, 3, 'Tbool2', 20, 1, 100, 1455211534, 1),
(10, 28, 1, 1, 'test', NULL, 0, NULL, 1455550456, 0),
(11, 28, 1, 1, 'test', NULL, 0, NULL, 1455550469, 0),
(12, 28, 1, 1, 'test', NULL, 0, NULL, 1455550497, 0),
(13, 28, 1, 1, 'test', NULL, 0, NULL, 1455550563, 0),
(14, 28, 2, 2, 'sqwe', NULL, 0, NULL, 1455550563, 0);

-- --------------------------------------------------------

--
-- Table structure for table `waste_post_type`
--

CREATE TABLE IF NOT EXISTS `waste_post_type` (
`ID` int(10) unsigned NOT NULL,
  `description` varchar(45) DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `waste_post_type`
--

INSERT INTO `waste_post_type` (`ID`, `description`) VALUES
(1, 'Own Waste'),
(2, 'Waste Accepted'),
(3, 'Waste Services');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `access_control_list`
--
ALTER TABLE `access_control_list`
 ADD PRIMARY KEY (`ID`), ADD KEY `access_control_list_account_ID` (`account_ID`), ADD KEY `access_control_list_module_ID` (`module_ID`);

--
-- Indexes for table `account`
--
ALTER TABLE `account`
 ADD PRIMARY KEY (`ID`), ADD UNIQUE KEY `username` (`username`), ADD KEY `account_account_type_ID_idx` (`account_type_ID`);

--
-- Indexes for table `account_address`
--
ALTER TABLE `account_address`
 ADD PRIMARY KEY (`ID`), ADD KEY `account_ID` (`account_ID`,`barangay_ID`);

--
-- Indexes for table `account_basic_information`
--
ALTER TABLE `account_basic_information`
 ADD PRIMARY KEY (`ID`), ADD KEY `account_basic_information_account_ID_idx` (`account_ID`);

--
-- Indexes for table `account_contact_information`
--
ALTER TABLE `account_contact_information`
 ADD PRIMARY KEY (`ID`), ADD KEY `account_contact_information_account_ID_idx` (`account_ID`), ADD KEY `account_contact_infotmation_type_idx` (`type`);

--
-- Indexes for table `account_contact_type`
--
ALTER TABLE `account_contact_type`
 ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `account_type`
--
ALTER TABLE `account_type`
 ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `action_log`
--
ALTER TABLE `action_log`
 ADD PRIMARY KEY (`ID`), ADD KEY `api_controller_ID` (`api_controller_ID`,`access_number_ID`), ADD KEY `account_ID` (`account_ID`);

--
-- Indexes for table `api_controller`
--
ALTER TABLE `api_controller`
 ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `barangay`
--
ALTER TABLE `barangay`
 ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `dumping_location`
--
ALTER TABLE `dumping_location`
 ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `group_access_control_list`
--
ALTER TABLE `group_access_control_list`
 ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `information`
--
ALTER TABLE `information`
 ADD PRIMARY KEY (`ID`), ADD KEY `information_detail_barangay_ID_idx` (`barangay_ID`), ADD KEY `information_detail_type_ID_idx` (`type_ID`);

--
-- Indexes for table `information_type`
--
ALTER TABLE `information_type`
 ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `map_marker`
--
ALTER TABLE `map_marker`
 ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `map_marker_type`
--
ALTER TABLE `map_marker_type`
 ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `module`
--
ALTER TABLE `module`
 ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `module_api_controller`
--
ALTER TABLE `module_api_controller`
 ADD PRIMARY KEY (`ID`), ADD KEY `module_api_controller_module_ID` (`module_ID`) COMMENT 'foreign for module', ADD KEY `module_api_controller_api_controller_ID` (`api_controller_ID`) COMMENT 'foreign key of api controller';

--
-- Indexes for table `password_recovery`
--
ALTER TABLE `password_recovery`
 ADD PRIMARY KEY (`ID`), ADD UNIQUE KEY `ID` (`ID`);

--
-- Indexes for table `report`
--
ALTER TABLE `report`
 ADD PRIMARY KEY (`ID`), ADD KEY `report_report_type_ID_idx` (`report_type_ID`), ADD KEY `entry_ID` (`associated_ID`);

--
-- Indexes for table `report_type`
--
ALTER TABLE `report_type`
 ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `status`
--
ALTER TABLE `status`
 ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `unit`
--
ALTER TABLE `unit`
 ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `waste_category`
--
ALTER TABLE `waste_category`
 ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `waste_post`
--
ALTER TABLE `waste_post`
 ADD PRIMARY KEY (`ID`), ADD KEY `waste_post_waste_category_ID_idx` (`waste_category_ID`), ADD KEY `waste_post_quantity_unit_idx` (`quantity_unit_ID`), ADD KEY `waste_post_status_ID_idx` (`status`), ADD KEY `waste_post_account_ID_idx` (`account_ID`);

--
-- Indexes for table `waste_post_type`
--
ALTER TABLE `waste_post_type`
 ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `access_control_list`
--
ALTER TABLE `access_control_list`
MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `account`
--
ALTER TABLE `account`
MODIFY `ID` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=38;
--
-- AUTO_INCREMENT for table `account_address`
--
ALTER TABLE `account_address`
MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `account_basic_information`
--
ALTER TABLE `account_basic_information`
MODIFY `ID` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=37;
--
-- AUTO_INCREMENT for table `account_contact_information`
--
ALTER TABLE `account_contact_information`
MODIFY `ID` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=52;
--
-- AUTO_INCREMENT for table `account_contact_type`
--
ALTER TABLE `account_contact_type`
MODIFY `ID` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `account_type`
--
ALTER TABLE `account_type`
MODIFY `ID` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `action_log`
--
ALTER TABLE `action_log`
MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=1840;
--
-- AUTO_INCREMENT for table `api_controller`
--
ALTER TABLE `api_controller`
MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `barangay`
--
ALTER TABLE `barangay`
MODIFY `ID` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `dumping_location`
--
ALTER TABLE `dumping_location`
MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `group_access_control_list`
--
ALTER TABLE `group_access_control_list`
MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `information`
--
ALTER TABLE `information`
MODIFY `ID` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `information_type`
--
ALTER TABLE `information_type`
MODIFY `ID` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `map_marker`
--
ALTER TABLE `map_marker`
MODIFY `ID` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `map_marker_type`
--
ALTER TABLE `map_marker_type`
MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `module`
--
ALTER TABLE `module`
MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `module_api_controller`
--
ALTER TABLE `module_api_controller`
MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `password_recovery`
--
ALTER TABLE `password_recovery`
MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=45;
--
-- AUTO_INCREMENT for table `report`
--
ALTER TABLE `report`
MODIFY `ID` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=24;
--
-- AUTO_INCREMENT for table `report_type`
--
ALTER TABLE `report_type`
MODIFY `ID` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `status`
--
ALTER TABLE `status`
MODIFY `ID` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `unit`
--
ALTER TABLE `unit`
MODIFY `ID` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `waste_category`
--
ALTER TABLE `waste_category`
MODIFY `ID` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `waste_post`
--
ALTER TABLE `waste_post`
MODIFY `ID` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `waste_post_type`
--
ALTER TABLE `waste_post_type`
MODIFY `ID` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `account`
--
ALTER TABLE `account`
ADD CONSTRAINT `account_account_type_ID` FOREIGN KEY (`account_type_ID`) REFERENCES `account_type` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `account_basic_information`
--
ALTER TABLE `account_basic_information`
ADD CONSTRAINT `account_basic_information_account_ID` FOREIGN KEY (`account_ID`) REFERENCES `account` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `account_contact_information`
--
ALTER TABLE `account_contact_information`
ADD CONSTRAINT `account_contact_information_account_ID` FOREIGN KEY (`account_ID`) REFERENCES `account` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `account_contact_infotmation_type` FOREIGN KEY (`type`) REFERENCES `account_contact_type` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `information`
--
ALTER TABLE `information`
ADD CONSTRAINT `information_barangay_ID` FOREIGN KEY (`barangay_ID`) REFERENCES `barangay` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `information_type_ID` FOREIGN KEY (`type_ID`) REFERENCES `information_type` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `report`
--
ALTER TABLE `report`
ADD CONSTRAINT `report_report_type_ID` FOREIGN KEY (`report_type_ID`) REFERENCES `report_type` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `waste_post`
--
ALTER TABLE `waste_post`
ADD CONSTRAINT `waste_post_account_ID` FOREIGN KEY (`account_ID`) REFERENCES `account` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `waste_post_quantity_unit_ID` FOREIGN KEY (`quantity_unit_ID`) REFERENCES `unit` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `waste_post_waste_category_ID` FOREIGN KEY (`waste_category_ID`) REFERENCES `waste_category` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
