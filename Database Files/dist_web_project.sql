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

--
-- Database: `dist.web_project`
--

-- --------------------------------------------------------

--
-- Table structure for table `cc`
--

CREATE TABLE `cc` (
  `CCID` int(4) NOT NULL,
  `UserID` int(4) NOT NULL,
  `Name` varchar(254) NOT NULL,
  `CC_Number` varchar(254) NOT NULL,
  `Exp_Date` varchar(254) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `currently_renting`
--

CREATE TABLE `currently_renting` (
  `MoviesID` int(4) NOT NULL,
  `UserID` int(4) NOT NULL,
  `MovieTitle` varchar(254) NOT NULL,
  `ReturnByDate` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `history`
--

CREATE TABLE `history` (
  `UserID` int(4) NOT NULL,
  `MovieID` int(11) NOT NULL,
  `MovieTitle` varchar(254) NOT NULL,
  `Description` varchar(254) NOT NULL,
  `Price` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `movies`
--

CREATE TABLE `movies` (
  `MoviesID` int(4) NOT NULL,
  `MovieTitle` varchar(254) NOT NULL,
  `Genre` varchar(254) NOT NULL,
  `Price` varchar(64) NOT NULL,
  `Age_Rating` varchar(64) NOT NULL,
  `Description` varchar(254) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `UserID` int(4) NOT NULL,
  `MovieID` int(4) NOT NULL,
  `CCID` int(4) NOT NULL,
  `EmailAddress` varchar(254) NOT NULL COMMENT 'User Email',
  `Address` varchar(254) NOT NULL COMMENT 'User Address',
  `PhoneNumber` varchar(254) NOT NULL COMMENT 'User Phone Number'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cc`
--
ALTER TABLE `cc`
  ADD PRIMARY KEY (`CCID`),
  ADD UNIQUE KEY `UserID` (`UserID`);

--
-- Indexes for table `currently_renting`
--
ALTER TABLE `currently_renting`
  ADD UNIQUE KEY `MoviesID` (`MoviesID`),
  ADD UNIQUE KEY `UserID` (`UserID`);

--
-- Indexes for table `history`
--
ALTER TABLE `history`
  ADD UNIQUE KEY `UserID` (`UserID`),
  ADD UNIQUE KEY `MovieID` (`MovieID`);

--
-- Indexes for table `movies`
--
ALTER TABLE `movies`
  ADD PRIMARY KEY (`MoviesID`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`UserID`),
  ADD UNIQUE KEY `CCID` (`CCID`),
  ADD UNIQUE KEY `MovieID` (`MovieID`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cc`
--
ALTER TABLE `cc`
  ADD CONSTRAINT `cc_ibfk_1` FOREIGN KEY (`CCID`) REFERENCES `user` (`CCID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `currently_renting`
--
ALTER TABLE `currently_renting`
  ADD CONSTRAINT `Curr_Movie_con` FOREIGN KEY (`MoviesID`) REFERENCES `movies` (`MoviesID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `Curr_User_con` FOREIGN KEY (`UserID`) REFERENCES `user` (`UserID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `history`
--
ALTER TABLE `history`
  ADD CONSTRAINT `his_Movie_con` FOREIGN KEY (`MovieID`) REFERENCES `movies` (`MoviesID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `his_User_con` FOREIGN KEY (`UserID`) REFERENCES `user` (`UserID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `movies`
--
ALTER TABLE `movies`
  ADD CONSTRAINT `movies_ibfk_1` FOREIGN KEY (`MoviesID`) REFERENCES `history` (`MovieID`) ON UPDATE CASCADE;

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`UserID`) REFERENCES `cc` (`UserID`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
