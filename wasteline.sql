-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 13, 2015 at 04:40 AM
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
  `status` int(11) NOT NULL COMMENT '0 - deleted, 1 - ok, 2 - draft'
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `account`
--

INSERT INTO `account` (`ID`, `username`, `password`, `account_type_ID`, `status`) VALUES
(3, 'gwapoko', 'gwapoko', 2, 0),
(5, 'test', '1234321', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `account_address`
--

CREATE TABLE IF NOT EXISTS `account_address` (
  `ID` int(11) NOT NULL,
  `account_ID` int(11) NOT NULL,
  `barangay_ID` int(11) NOT NULL,
  `description` varchar(100) NOT NULL,
  `longitude` double NOT NULL,
  `latitude` double NOT NULL,
  `status` int(11) NOT NULL COMMENT '0 - deleted, 1 - ok'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `account_basic_information`
--

INSERT INTO `account_basic_information` (`ID`, `account_ID`, `first_name`, `middle_name`, `last_name`) VALUES
(1, 5, 'n', 'ewer', '12');

-- --------------------------------------------------------

--
-- Table structure for table `account_contact_information`
--

CREATE TABLE IF NOT EXISTS `account_contact_information` (
`ID` int(10) unsigned NOT NULL,
  `account_ID` int(10) unsigned NOT NULL,
  `type` int(10) unsigned NOT NULL COMMENT 'cell number, email',
  `detail` text
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `account_contact_information`
--

INSERT INTO `account_contact_information` (`ID`, `account_ID`, `type`, `detail`) VALUES
(4, 5, 1, 'testra3213'),
(5, 5, 2, 'testra');

-- --------------------------------------------------------

--
-- Table structure for table `account_contact_type`
--

CREATE TABLE IF NOT EXISTS `account_contact_type` (
`ID` int(10) unsigned NOT NULL,
  `type` varchar(45) DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `account_contact_type`
--

INSERT INTO `account_contact_type` (`ID`, `type`) VALUES
(1, 'Email Address'),
(2, 'F.A.X'),
(3, 'Telephone No.'),
(4, 'Cellphone No.');

-- --------------------------------------------------------

--
-- Table structure for table `account_type`
--

CREATE TABLE IF NOT EXISTS `account_type` (
`ID` int(10) unsigned NOT NULL,
  `type` varchar(45) DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `account_type`
--

INSERT INTO `account_type` (`ID`, `type`) VALUES
(1, 'Administrator'),
(2, 'User');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=18 ;

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
(17, 5, 2, 0, '{"condition":{"account_contact_information__type":"1"},"updated_data":{"detail":"testra3213"}}', 1449977957);

-- --------------------------------------------------------

--
-- Table structure for table `api_controller`
--

CREATE TABLE IF NOT EXISTS `api_controller` (
`ID` int(11) NOT NULL,
  `description` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

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
-- Table structure for table `group_access_control_list`
--

CREATE TABLE IF NOT EXISTS `group_access_control_list` (
`ID` int(11) NOT NULL,
  `module_ID` int(11) NOT NULL,
  `group_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `information`
--

CREATE TABLE IF NOT EXISTS `information` (
`ID` int(10) unsigned NOT NULL,
  `barangay_ID` int(10) unsigned NOT NULL,
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
  `description` text,
  `longitude` double DEFAULT NULL,
  `latitude` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `module`
--

CREATE TABLE IF NOT EXISTS `module` (
`ID` int(11) NOT NULL,
  `description` varchar(50) NOT NULL,
  `parent_ID` int(11) NOT NULL,
  `link` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

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
-- Table structure for table `report`
--

CREATE TABLE IF NOT EXISTS `report` (
`ID` int(10) unsigned NOT NULL,
  `entry_ID` int(11) NOT NULL,
  `report_type_ID` int(10) unsigned NOT NULL,
  `description` text,
  `datetime` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `report_type`
--

CREATE TABLE IF NOT EXISTS `report_type` (
`ID` int(10) unsigned NOT NULL,
  `description` varchar(45) DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `report_type`
--

INSERT INTO `report_type` (`ID`, `description`) VALUES
(1, 'Marker'),
(2, 'Article');

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
  `unit` varchar(10) DEFAULT NULL,
  `description` varchar(45) DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `unit`
--

INSERT INTO `unit` (`ID`, `unit`, `description`) VALUES
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
  `waste_category_ID` int(10) unsigned NOT NULL,
  `description` text,
  `quantity` double DEFAULT NULL,
  `quantity_unit_ID` int(10) unsigned NOT NULL COMMENT 'change quantity unit int to varchar 20',
  `price` double DEFAULT NULL,
  `datetime` double DEFAULT NULL,
  `status` int(10) unsigned NOT NULL,
  `type` int(10) unsigned NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

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

-- --------------------------------------------------------

--
-- Table structure for table `waste_service`
--

CREATE TABLE IF NOT EXISTS `waste_service` (
`ID` int(10) unsigned NOT NULL,
  `account_ID` int(10) unsigned NOT NULL,
  `description` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

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
 ADD PRIMARY KEY (`ID`), ADD KEY `account_account_type_ID_idx` (`account_type_ID`);

--
-- Indexes for table `account_address`
--
ALTER TABLE `account_address`
 ADD KEY `account_ID` (`account_ID`,`barangay_ID`);

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
-- Indexes for table `report`
--
ALTER TABLE `report`
 ADD PRIMARY KEY (`ID`), ADD KEY `report_report_type_ID_idx` (`report_type_ID`), ADD KEY `entry_ID` (`entry_ID`);

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
 ADD PRIMARY KEY (`ID`), ADD KEY `waste_post_waste_category_ID_idx` (`waste_category_ID`), ADD KEY `waste_post_quantity_unit_idx` (`quantity_unit_ID`), ADD KEY `waste_post_status_ID_idx` (`status`), ADD KEY `waste_post_type_ID_idx` (`type`), ADD KEY `waste_post_account_ID_idx` (`account_ID`);

--
-- Indexes for table `waste_post_type`
--
ALTER TABLE `waste_post_type`
 ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `waste_service`
--
ALTER TABLE `waste_service`
 ADD PRIMARY KEY (`ID`), ADD KEY `waste_service_account_ID_idx` (`account_ID`);

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
MODIFY `ID` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `account_basic_information`
--
ALTER TABLE `account_basic_information`
MODIFY `ID` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `account_contact_information`
--
ALTER TABLE `account_contact_information`
MODIFY `ID` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `account_contact_type`
--
ALTER TABLE `account_contact_type`
MODIFY `ID` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `account_type`
--
ALTER TABLE `account_type`
MODIFY `ID` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `action_log`
--
ALTER TABLE `action_log`
MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `api_controller`
--
ALTER TABLE `api_controller`
MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `barangay`
--
ALTER TABLE `barangay`
MODIFY `ID` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `group_access_control_list`
--
ALTER TABLE `group_access_control_list`
MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;
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
MODIFY `ID` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `module`
--
ALTER TABLE `module`
MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `module_api_controller`
--
ALTER TABLE `module_api_controller`
MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `report`
--
ALTER TABLE `report`
MODIFY `ID` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `report_type`
--
ALTER TABLE `report_type`
MODIFY `ID` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `status`
--
ALTER TABLE `status`
MODIFY `ID` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `unit`
--
ALTER TABLE `unit`
MODIFY `ID` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `waste_category`
--
ALTER TABLE `waste_category`
MODIFY `ID` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `waste_post`
--
ALTER TABLE `waste_post`
MODIFY `ID` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `waste_post_type`
--
ALTER TABLE `waste_post_type`
MODIFY `ID` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `waste_service`
--
ALTER TABLE `waste_service`
MODIFY `ID` int(10) unsigned NOT NULL AUTO_INCREMENT;
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
ADD CONSTRAINT `waste_post_status_ID` FOREIGN KEY (`status`) REFERENCES `status` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `waste_post_type_ID` FOREIGN KEY (`type`) REFERENCES `waste_post_type` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `waste_post_waste_category_ID` FOREIGN KEY (`waste_category_ID`) REFERENCES `waste_category` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `waste_service`
--
ALTER TABLE `waste_service`
ADD CONSTRAINT `waste_service_account_ID` FOREIGN KEY (`account_ID`) REFERENCES `account` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
