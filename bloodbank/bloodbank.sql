-- phpMyAdmin SQL Dump
-- version 2.11.8.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 15, 2015 at 04:32 PM
-- Server version: 5.0.67
-- PHP Version: 5.2.6

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `bloodbank`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_adminprofile`
--

CREATE TABLE IF NOT EXISTS `tbl_adminprofile` (
  `intAdminId` int(11) NOT NULL auto_increment,
  `intLevelId` int(11) NOT NULL default '0',
  `varCompany` varchar(255) NOT NULL default '',
  `varContactPerson` varchar(200) NOT NULL,
  `advertising` text NOT NULL,
  `txtMetaDescription` text NOT NULL,
  `varEmail` varchar(60) NOT NULL default '',
  `txtMetaKeyWord` text NOT NULL,
  `intRows` int(11) NOT NULL default '0',
  `varAdminPage` varchar(255) NOT NULL default '',
  `varHomePage` varchar(255) NOT NULL default '',
  `intDateFormat` date NOT NULL,
  `varUserName` varchar(50) NOT NULL default '',
  `varPassword` varchar(100) NOT NULL default '',
  `google_map` text NOT NULL,
  `fb_url` text NOT NULL,
  `youtube_url` text NOT NULL,
  PRIMARY KEY  (`intAdminId`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC AUTO_INCREMENT=2 ;

--
-- Dumping data for table `tbl_adminprofile`
--

INSERT INTO `tbl_adminprofile` (`intAdminId`, `intLevelId`, `varCompany`, `varContactPerson`, `advertising`, `txtMetaDescription`, `varEmail`, `txtMetaKeyWord`, `intRows`, `varAdminPage`, `varHomePage`, `intDateFormat`, `varUserName`, `varPassword`, `google_map`, `fb_url`, `youtube_url`) VALUES
(1, 1, 'Blood Bank Management System', '', '', 'Blood Bank Management System', 'sakthiveerarajan@gmail.com', 'Blood Bank Management System', 5, 'Welcome to Blood Bank Management System', 'Blood Bank Management System', '0000-00-00', 'admin', 'YWRtaW4xMjM=', '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3886.4097619643594!2d80.21020719999997!3d13.073197100000007!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3a526698a5acb029%3A0xa9f8baf52a2d235!2sPanchali+Amman+Koil+St%2C+Arumbakkam%2C+Chennai%2C+Tamil+Nadu+600106!5e0!3m2!1sen!2sin!4v1426276187798" width="100%" height="450"  frameborder="0" scrolling="no" marginheight="0" marginwidth="0" style="border:0"></iframe>', '#', '#');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_blood_group`
--

CREATE TABLE IF NOT EXISTS `tbl_blood_group` (
  `group_id` int(20) NOT NULL auto_increment,
  `group_name` varchar(200) NOT NULL,
  PRIMARY KEY  (`group_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=17 ;

--
-- Dumping data for table `tbl_blood_group`
--

INSERT INTO `tbl_blood_group` (`group_id`, `group_name`) VALUES
(1, 'A+'),
(2, 'A-'),
(3, 'B+'),
(4, 'B-'),
(5, 'AB+'),
(6, 'AB-'),
(7, 'O+'),
(8, 'O-'),
(9, 'A1+'),
(10, 'A1-'),
(11, 'A2+'),
(12, 'A2-'),
(13, 'A1B+'),
(14, 'A1B-'),
(15, 'A2B+'),
(16, 'A2B-');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_blood_request`
--

CREATE TABLE IF NOT EXISTS `tbl_blood_request` (
  `request_id` int(20) NOT NULL auto_increment,
  `request_name` varchar(200) NOT NULL,
  `request_blood_groud` varchar(200) NOT NULL,
  `request_age` varchar(200) NOT NULL,
  `request_needed` varchar(200) NOT NULL,
  `request_units` varchar(200) NOT NULL,
  `request_mobile` varchar(200) NOT NULL,
  `request_landline` varchar(200) NOT NULL,
  `hospital_name` varchar(200) NOT NULL,
  `location` varchar(200) NOT NULL,
  `purpose` varchar(200) NOT NULL,
  `address` varchar(200) NOT NULL,
  `request_status` int(20) NOT NULL,
  PRIMARY KEY  (`request_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `tbl_blood_request`
--

INSERT INTO `tbl_blood_request` (`request_id`, `request_name`, `request_blood_groud`, `request_age`, `request_needed`, `request_units`, `request_mobile`, `request_landline`, `hospital_name`, `location`, `purpose`, `address`, `request_status`) VALUES
(1, 'Sakthis ', '1', '302', '06/06/2015', '10', '994025574255555', '5555555', 'Sugathi hgjkhg', 'Chennai sadasds', 'xzfas asd asd asd asdf as asasd asdasdas dasd as xzfas asd asd asd asdf as asasd asdasdas dasd as', 'xzfas asd asd asd asdf as asdzfasfas  xzfas asd asd asd asdf as asasd asdasdas dasd as', 2),
(2, 'Sakthi', 'Select', 'SAD', 'ASDAS', 'ds', 'asdasd', 'asdas', 'asdas', 'asdas', '                                                                    asdas', '                 asdasd                                           ', 0),
(3, 'dsfsd', '3', 'sdf', 'dsfsd', 'ds', 'sdfsd', 'sdfsd', 'dsfsd', 'sdfs', '                                                                    sdfsd', '                     sdfsd                                       ', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_doners`
--

CREATE TABLE IF NOT EXISTS `tbl_doners` (
  `doners_id` int(20) NOT NULL auto_increment,
  `doners_name` varchar(200) NOT NULL,
  `doners_blood_groud` varchar(200) NOT NULL,
  `doners_gender` varchar(200) NOT NULL,
  `doners_dob` varchar(200) NOT NULL,
  `doners_mobile` varchar(200) NOT NULL,
  `doners_landline` varchar(200) NOT NULL,
  `doners_state` varchar(200) NOT NULL,
  `doners_city` varchar(200) NOT NULL,
  `doners_email` varchar(200) NOT NULL,
  `doners_address` varchar(200) NOT NULL,
  `doners_status` int(20) NOT NULL,
  PRIMARY KEY  (`doners_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `tbl_doners`
--

INSERT INTO `tbl_doners` (`doners_id`, `doners_name`, `doners_blood_groud`, `doners_gender`, `doners_dob`, `doners_mobile`, `doners_landline`, `doners_state`, `doners_city`, `doners_email`, `doners_address`, `doners_status`) VALUES
(1, 'Sakthi', '3', 'Male', '09-06-2015', '9940225742', 'sdfas', 'adsfas', 'asfdas', 'asdas', 'asdasasdasasdasasdasasdasasdasasdasasdasasdasasdasasdasasdasasdasasdasasdasasdasasdasasdasasdasasdasasdasasdasasdasasdasasdasasdasasdasasdasasdasasdasasdas', 1),
(3, 'sdfs', '10', 'Male', 'dsfsd', 'dfsaas', 'asfa', 'asdfas', 'asdfas', 'asdfas', ' asdasd', 1);
