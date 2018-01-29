-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jan 22, 2018 at 10:04 PM
-- Server version: 5.7.19
-- PHP Version: 5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `team11db`
--

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--
DROP TABLE IF EXISTS `contact`;
CREATE TABLE IF NOT EXISTS `contact` (
  `contactID` int(11) NOT NULL AUTO_INCREMENT,
  `FName` varchar(45) DEFAULT NULL,
  `LName` varchar(45) DEFAULT NULL,
  `CellPh` varchar(15) DEFAULT NULL,
  `Email` varchar(45) DEFAULT NULL,
  `User_UserID` int(11) NOT NULL,
  PRIMARY KEY (`contactID`,`User_UserID`),
  KEY `fk_Contact_User_idx` (`User_UserID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `UserID` int(11) NOT NULL AUTO_INCREMENT,
  `FName` varchar(45) DEFAULT NULL,
  `LName` varchar(45) DEFAULT NULL,
  `username` varchar(45) DEFAULT NULL,
  `userPWHash` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`UserID`),
  UNIQUE KEY `UserID_UNIQUE` (`UserID`),
  UNIQUE KEY `username_UNIQUE` (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `contact`
--
ALTER TABLE `contact`
  ADD CONSTRAINT `fk_Contact_User` FOREIGN KEY (`User_UserID`) REFERENCES `user` (`UserID`) ON DELETE CASCADE ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

/*INSERT INTO `user` (`UserID`, `userFName`, `userLName`, `username`, `userPWHash`) VALUES (NULL, 'Philip', 'Dick', 'pkd', 'a');
INSERT INTO `contact` (`contactID`, `FName`, `LName`, `CellPh`, `Email`, `User_UserID`) VALUES (NULL, 'David', 'Eddings', '1234567', 'de@gmail.com', '1');
INSERT INTO `contact` (`contactID`, `FName`, `LName`, `CellPh`, `Email`, `User_UserID`) VALUES (NULL, 'Terry', 'Pratchett', '7654321', 'tp@gmail.com', '1');*/
