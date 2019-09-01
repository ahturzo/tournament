-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 22, 2018 at 06:46 AM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `tournament`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `id` int(50) NOT NULL AUTO_INCREMENT,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `email`, `password`) VALUES
(1, 'tabidhasan003@gmail.com', '2208');

-- --------------------------------------------------------

--
-- Table structure for table `matches`
--

CREATE TABLE IF NOT EXISTS `matches` (
  `match` int(20) NOT NULL AUTO_INCREMENT,
  `first_team` varchar(50) NOT NULL,
  `second_team` varchar(50) NOT NULL,
  `result` varchar(100) NOT NULL,
  PRIMARY KEY (`match`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `matches`
--

INSERT INTO `matches` (`match`, `first_team`, `second_team`, `result`) VALUES
(1, 'Arian , Anik', 'Mahadi  , Zihad', 'Arian , Anik Win by 15 - 3'),
(2, 'Miraz , Parvez', 'Turzo , Rafi', 'Miraz , Parvez Win by 15 - 8'),
(3, 'Alamin , Mahin', 'Alif  , Sahil', 'Alamin , Mahin Win by 15 - 6'),
(4, 'Raju , Hasan', 'Sudin  , Faruk', 'Raju , Hasan Win by 15 - 9');

-- --------------------------------------------------------

--
-- Table structure for table `teams`
--

CREATE TABLE IF NOT EXISTS `teams` (
  `id` int(50) NOT NULL AUTO_INCREMENT,
  `member1` varchar(20) NOT NULL,
  `member2` varchar(20) NOT NULL,
  `played` int(11) NOT NULL,
  `won` int(11) NOT NULL,
  `lost` int(11) NOT NULL,
  `point` int(11) NOT NULL,
  `netpoint` double NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `teams`
--

INSERT INTO `teams` (`id`, `member1`, `member2`, `played`, `won`, `lost`, `point`, `netpoint`) VALUES
(1, 'Arian', 'Anik', 1, 1, 0, 2, 1.2),
(2, 'Alif ', 'Sahil', 1, 0, 1, 0, -0.9),
(3, 'Alamin', 'Mahin', 1, 1, 0, 2, 0.9),
(4, 'Raju', 'Hasan', 1, 1, 0, 2, 0.6),
(5, 'Rahik', 'Kushol', 0, 0, 0, 0, 0),
(6, 'Mahadi ', 'Zihad', 1, 0, 1, 0, -1.2),
(7, 'Turzo', 'Rafi', 1, 0, 1, 0, -0.7),
(8, 'Sudin ', 'Faruk', 1, 0, 1, 0, -0.6),
(9, 'Miraz', 'Parvez', 1, 1, 0, 2, 0.7);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
