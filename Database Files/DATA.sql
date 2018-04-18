
-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 27, 2018 at 12:37 AM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 7.2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;


USE `DistWebProject` ;

--
-- inserting data for table `movies`
--

INSERT INTO `Movie` (`MovieID`, `Movie_Title`, `Genre`, `Price`, `Rating`, `Description`) VALUES
(1, 'Thor: Ragnarok', 'Action', '9.99', 'PG-13', 'Thor Movie');

-- --------------------------------------------------------


--
-- inserting data for table `user`
--

INSERT INTO `User` (`userid`, `username`, `password`, `EmailAddress`, `Address`, `PhoneNumber`) VALUES
(8, 'test', '$2y$10$ufV7TaEoYiif5sAl/YCed.QQKlBhggYlTVXz5.UDTYZb9DTbP3qfm', 'test@test.com', 't', '2223334544');


-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 27, 2018 at 12:37 AM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 7.2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

CREATE SCHEMA IF NOT EXISTS `DistWebProject` DEFAULT CHARACTER SET latin1 ;
USE `DistWebProject` ;

--
-- Database: `dist.web_project`
--

-- --------------------------------------------------------

--
-- Table structure for table `CreditCard`
--

CREATE TABLE IF NOT EXISTS `CreditCard` (
	`CCID` int NOT NULL,
	`UserID` int NOT NULL,
	`Name` varchar(255) NOT NULL,
	`CC_Number` varchar(20) NOT NULL,
	`Exp_Month` int NOT NULL,
	`Exp_Day` int NOT NULL,
	PRIMARY KEY(`CCID`)
    )
ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `User`
--

CREATE TABLE IF NOT EXISTS `User` (
	`UserID` int NOT NULL,
	`Username` varchar(255) NOT NULL,
	`Password` varchar(255) NOT NULL,
	`EmailAddress` varchar(255) COMMENT 'User Email',
	`Address` varchar(255) COMMENT 'User Address',
	`PhoneNumber` varchar(20) COMMENT 'User Phone Number',
    PRIMARY KEY(`UserID`)
	) 
ENGINE=InnoDB AUTO_INCREMENT = 9 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `movies`
--

CREATE TABLE IF NOT EXISTS `Movie` (
	`MovieID` int NOT NULL,
	`Movie_Title` varchar(1000) NOT NULL COMMENT '1000 char limit for absurdly long movie titles.',
	`Genre` varchar(255) NOT NULL COMMENT 'Each movie may only have 1 genre for now.',
	`Price` decimal(13,2) NOT NULL,
	`Rating` varchar(255),
	`Description` varchar(2500) COMMENT '2500 character limit for the movie description',
    PRIMARY KEY(`MovieID`)
	) 
ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `CreditCardUser`
--

CREATE TABLE IF NOT EXISTS `CreditCardUser` (
	`CCID` int NOT NULL,
	`UserID` int NOT NULL,
	PRIMARY KEY(`CCID`, `UserID`),
    FOREIGN KEY (`CCID`) REFERENCES `CreditCard`(`CCID`),
    FOREIGN KEY (`UserID`) REFERENCES `User`(`UserID`)
    )
ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `DVD`
--

CREATE TABLE IF NOT EXISTS `DVD` (
	`DVDID` int NOT NULL,
	`MovieID` int NOT NULL,
	`UserID` int COMMENT 'Is null for DVDs not out on rent.',
	`Condition` varchar(255) NOT NULL,
	PRIMARY KEY(`DVDID`, `MovieID`),
    FOREIGN KEY (`MovieID`) REFERENCES `Movie`(`MovieID`),
    FOREIGN KEY (`UserID`) REFERENCES `User`(`UserID`)
	) 
ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `Transaction`
--

CREATE TABLE IF NOT EXISTS  `Transaction` (
	`TransactionID` int NOT NULL,
	`UserID` int NOT NULL,
	`CCID` int NOT NULL,
	`Total_Charge` decimal(13,2) NOT NULL,
	PRIMARY KEY(`TransactionID`, `UserID`),
	FOREIGN KEY (`UserID`) REFERENCES `User`(`UserID`),
    FOREIGN KEY (`CCID`) REFERENCES `CreditCard`(`CCID`)
	) 
ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `TransactionItem`
--

CREATE TABLE IF NOT EXISTS  `TransactionItem` (
	`TransactionID` int NOT NULL,
	`UserID` int NOT NULL,
    `TransactionItemID` int NOT NULL,
    `DVDID` int NOT NULL,
	`MovieID` int NOT NULL,
	PRIMARY KEY(`TransactionID`, `UserID`, `TransactionItemID`),
	FOREIGN KEY (`TransactionID`) REFERENCES `Transaction`(`TransactionID`),
    FOREIGN KEY (`UserID`) REFERENCES `User`(`UserID`),
    FOREIGN KEY (`DVDID`) REFERENCES `DVD`(`DVDID`),
    FOREIGN KEY (`MovieID`) REFERENCES `Movie`(`MovieID`)
	) 
ENGINE=InnoDB DEFAULT CHARSET=latin1;
