-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 18, 2018 at 06:36 PM
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

--
-- Database: `distwebproject`
--

-- --------------------------------------------------------

--
-- Table structure for table `creditcard`
--

CREATE TABLE `creditcard` (
  `CCID` int(11) NOT NULL,
  `UserID` int(11) NOT NULL,
  `Name` varchar(255) NOT NULL,
  `CC_Number` varchar(20) NOT NULL,
  `Exp_Month` int(11) NOT NULL,
  `Exp_Day` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `creditcarduser`
--

CREATE TABLE `creditcarduser` (
  `CCID` int(11) NOT NULL,
  `UserID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `dvd`
--

CREATE TABLE `dvd` (
  `DVDID` int(11) NOT NULL,
  `MovieID` int(11) NOT NULL,
  `UserID` int(11) DEFAULT NULL COMMENT 'Is null for DVDs not out on rent.',
  `Condition` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `movie`
--

CREATE TABLE `movie` (
  `MovieID` int(11) NOT NULL,
  `Movie_Title` varchar(1000) NOT NULL COMMENT '1000 char limit for absurdly long movie titles.',
  `Genre` varchar(255) NOT NULL COMMENT 'Each movie may only have 1 genre for now.',
  `Price` decimal(13,2) NOT NULL,
  `Rating` varchar(255) DEFAULT NULL,
  `Description` varchar(2500) DEFAULT NULL COMMENT '2500 character limit for the movie description'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `transaction`
--

CREATE TABLE `transaction` (
  `TransactionID` int(11) NOT NULL,
  `UserID` int(11) NOT NULL,
  `CCID` int(11) NOT NULL,
  `Total_Charge` decimal(13,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `transactionitem`
--

CREATE TABLE `transactionitem` (
  `TransactionID` int(11) NOT NULL,
  `UserID` int(11) NOT NULL,
  `TransactionItemID` int(11) NOT NULL,
  `DVDID` int(11) NOT NULL,
  `MovieID` int(11) NOT NULL,
  `Quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `UserID` int(11) NOT NULL,
  `Username` varchar(255) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `EmailAddress` varchar(255) DEFAULT NULL COMMENT 'User Email',
  `StreetAddress` varchar(255) DEFAULT NULL COMMENT 'User Street Address',
  `State` varchar(50) DEFAULT NULL COMMENT 'User's state',
  `State` varchar(20)  DEFAULT NULL COMMENT 'User's zip code',
  `PhoneNumber` varchar(20) DEFAULT NULL COMMENT 'User Phone Number'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `creditcard`
--
ALTER TABLE `creditcard`
  ADD PRIMARY KEY (`CCID`);

--
-- Indexes for table `creditcarduser`
--
ALTER TABLE `creditcarduser`
  ADD PRIMARY KEY (`CCID`,`UserID`),
  ADD KEY `UserID` (`UserID`);

--
-- Indexes for table `dvd`
--
ALTER TABLE `dvd`
  ADD PRIMARY KEY (`DVDID`,`MovieID`),
  ADD KEY `MovieID` (`MovieID`),
  ADD KEY `UserID` (`UserID`);

--
-- Indexes for table `movie`
--
ALTER TABLE `movie`
  ADD PRIMARY KEY (`MovieID`);

--
-- Indexes for table `transaction`
--
ALTER TABLE `transaction`
  ADD PRIMARY KEY (`TransactionID`,`UserID`),
  ADD KEY `UserID` (`UserID`),
  ADD KEY `CCID` (`CCID`);

--
-- Indexes for table `transactionitem`
--
ALTER TABLE `transactionitem`
  ADD PRIMARY KEY (`TransactionItemID`),
  ADD UNIQUE KEY `TransactionID` (`TransactionID`),
  ADD UNIQUE KEY `UserID` (`UserID`),
  ADD UNIQUE KEY `DVDID` (`DVDID`),
  ADD UNIQUE KEY `MovieID` (`MovieID`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`UserID`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `creditcarduser`
--
ALTER TABLE `creditcarduser`
  ADD CONSTRAINT `creditcarduser_ibfk_1` FOREIGN KEY (`CCID`) REFERENCES `creditcard` (`CCID`),
  ADD CONSTRAINT `creditcarduser_ibfk_2` FOREIGN KEY (`UserID`) REFERENCES `user` (`UserID`);

--
-- Constraints for table `dvd`
--
ALTER TABLE `dvd`
  ADD CONSTRAINT `dvd_ibfk_1` FOREIGN KEY (`MovieID`) REFERENCES `movie` (`MovieID`),
  ADD CONSTRAINT `dvd_ibfk_2` FOREIGN KEY (`UserID`) REFERENCES `user` (`UserID`);

--
-- Constraints for table `transaction`
--
ALTER TABLE `transaction`
  ADD CONSTRAINT `transaction_ibfk_1` FOREIGN KEY (`UserID`) REFERENCES `user` (`UserID`),
  ADD CONSTRAINT `transaction_ibfk_2` FOREIGN KEY (`CCID`) REFERENCES `creditcard` (`CCID`);

--
-- Constraints for table `transactionitem`
--
ALTER TABLE `transactionitem`
  ADD CONSTRAINT `transactionitem_ibfk_1` FOREIGN KEY (`UserID`) REFERENCES `user` (`UserID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `transactionitem_ibfk_2` FOREIGN KEY (`TransactionID`) REFERENCES `transaction` (`TransactionID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `transactionitem_ibfk_3` FOREIGN KEY (`DVDID`) REFERENCES `dvd` (`DVDID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `transactionitem_ibfk_4` FOREIGN KEY (`MovieID`) REFERENCES `movie` (`MovieID`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;