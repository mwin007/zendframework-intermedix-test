-- phpMyAdmin SQL Dump
-- version 3.5.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 20, 2014 at 08:09 PM
-- Server version: 5.1.73-0ubuntu0.10.04.1
-- PHP Version: 5.4.27-1+deb.sury.org~lucid+1

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `intermedixdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `Doctors`
--

CREATE TABLE IF NOT EXISTS `Doctors` (
  `DoctorId` int(11) NOT NULL AUTO_INCREMENT,
  `Name` varchar(50) NOT NULL,
  `IsInsured` int(1) NOT NULL,
  PRIMARY KEY (`DoctorId`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `Doctors`
--

INSERT INTO `Doctors` (`DoctorId`, `Name`, `IsInsured`) VALUES
(1, 'John Doe', 1),
(2, 'Jane Doe', 1),
(3, 'Nguyen Doe', 1);

-- --------------------------------------------------------

--
-- Table structure for table `FavouriteDoctors`
--

CREATE TABLE IF NOT EXISTS `FavouriteDoctors` (
  `PersonId` int(11) NOT NULL,
  `DoctorId` int(11) NOT NULL,
  PRIMARY KEY (`PersonId`,`DoctorId`),
  KEY `Nguyen Doe` (`DoctorId`),
  KEY `Jane Doe` (`PersonId`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `FavouriteDoctors`
--

INSERT INTO `FavouriteDoctors` (`PersonId`, `DoctorId`) VALUES
(1, 1),
(1, 2),
(1, 3),
(2, 1),
(2, 2),
(2, 3),
(3, 2),
(4, 1),
(4, 2),
(4, 3),
(5, 2),
(6, 1),
(7, 2),
(7, 3),
(8, 1),
(8, 2),
(9, 1),
(10, 1),
(10, 2),
(10, 3),
(11, 1),
(11, 2),
(11, 3);

-- --------------------------------------------------------

--
-- Table structure for table `Patient`
--

CREATE TABLE IF NOT EXISTS `Patient` (
  `PersonId` int(11) NOT NULL AUTO_INCREMENT,
  `FirstName` varchar(50) NOT NULL,
  `LastName` varchar(50) NOT NULL,
  `IsMarried` int(1) NOT NULL,
  `IsValid` int(1) NOT NULL,
  `IsInsured` int(1) NOT NULL,
  PRIMARY KEY (`PersonId`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `Patient`
--

INSERT INTO `Patient` (`PersonId`, `FirstName`, `LastName`, `IsMarried`, `IsValid`, `IsInsured`) VALUES
(1, 'Willis', 'Tibbs', 0, 1, 0),
(2, 'Sharon', 'Halt', 1, 0, 1),
(3, 'Patrick', 'Kerr', 0, 1, 1),
(4, 'Lilly', 'Hale', 1, 0, 0),
(5, 'Joel', 'Daly', 0, 1, 1),
(6, 'Imogen', 'Kent', 1, 0, 0),
(7, 'George', 'Edwards', 0, 1, 0),
(8, 'Gabriel', 'Franics', 0, 0, 1),
(9, 'Courtney', 'Arnold', 1, 1, 0),
(10, 'Brian', 'Allen', 0, 1, 1),
(11, 'Bo', 'Bob', 1, 1, 1);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
