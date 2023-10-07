-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: May 17, 2023 at 09:36 AM
-- Server version: 5.7.36
-- PHP Version: 8.1.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project2`
--

-- --------------------------------------------------------

--
-- Table structure for table `loandetails`
--

DROP TABLE IF EXISTS `loandetails`;
CREATE TABLE IF NOT EXISTS `loandetails` (
  `userId` int(11) NOT NULL,
  `RequiredLoan` int(11) NOT NULL,
  `Salary` int(11) NOT NULL,
  `Period` int(11) NOT NULL,
  `Method` int(11) NOT NULL,
  `emi` int(11) NOT NULL,
  KEY `userId` (`userId`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `loandetails`
--

INSERT INTO `loandetails` (`userId`, `RequiredLoan`, `Salary`, `Period`, `Method`, `emi`) VALUES
(12113258, 500000, 45000, 2, 1, 25833),
(12113200, 500000, 45000, 3, 6, 18889),
(1211, 50000, 45000, 3, 1, 1889),
(1010, 500000, 50000, 5, 12, 13333);

-- --------------------------------------------------------

--
-- Table structure for table `register`
--

DROP TABLE IF EXISTS `register`;
CREATE TABLE IF NOT EXISTS `register` (
  `userId` int(11) NOT NULL,
  `email-Id` varchar(50) NOT NULL,
  `password` varchar(20) NOT NULL,
  `TC` tinyint(1) NOT NULL DEFAULT '1',
  `creditScore` int(10) UNSIGNED DEFAULT NULL,
  PRIMARY KEY (`userId`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `register`
--

INSERT INTO `register` (`userId`, `email-Id`, `password`, `TC`, `creditScore`) VALUES
(123456, 'asdfgh@sdfgh.fgh', '123456', 1, 395),
(12345678, 'sdf@lkjh.fgh', '123456', 1, 300),
(12113258, 'allauddin@gmail.com', '@allauddin', 1, 414),
(12113200, 'pk123@gmail.com', '123456', 1, 707),
(12113255, 'ali123@gmail.com', 'Ayas', 1, 537),
(1211, 'abfv123@gmail.com', '12345', 1, 565),
(12345, 'abc12345@gmail.com', '12345', 1, 0),
(1010, 'cccccc@gmail.com', '1010', 1, 488);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
