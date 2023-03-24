-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 28, 2021 at 04:14 PM
-- Server version: 5.5.8
-- PHP Version: 5.3.5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `virtualclassroom`
--

-- --------------------------------------------------------

--
-- Table structure for table `add_notes`
--

CREATE TABLE IF NOT EXISTS `add_notes` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `title` varchar(9999) NOT NULL,
  `Subject` varchar(9999) NOT NULL,
  `filename` longtext NOT NULL,
  `fname` varchar(999) NOT NULL,
  `lname` varchar(999) NOT NULL,
  `classcode` varchar(999) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=27 ;

--
-- Dumping data for table `add_notes`
--

INSERT INTO `add_notes` (`id`, `title`, `Subject`, `filename`, `fname`, `lname`, `classcode`) VALUES
(26, 'Data Science Book 2', 'Technical Course', '2.pdf', 'Abhijit', 'Shahane', 'VC2021');
