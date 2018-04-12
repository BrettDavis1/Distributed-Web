-- phpMyAdmin SQL Dump
-- version 4.7.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Apr 12, 2018 at 06:26 PM
-- Server version: 5.7.17
-- PHP Version: 7.0.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `test`
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
  `uid` int(4) NOT NULL,
  `mid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `history`
--

INSERT INTO `history` (`uid`, `mid`) VALUES
(2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `movies`
--

CREATE TABLE `movies` (
  `id` int(4) NOT NULL,
  `title` varchar(254) NOT NULL,
  `genre` varchar(254) NOT NULL,
  `price` varchar(64) NOT NULL,
  `rating` varchar(64) NOT NULL,
  `description` varchar(254) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `movies`
--

INSERT INTO `movies` (`id`, `title`, `genre`, `price`, `rating`, `description`) VALUES
(1, 'Thor: Ragnarok', 'Action', '9.99', 'PG-13', 'Thor Movie');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(4) NOT NULL,
  `username` varchar(256) NOT NULL,
  `password` varchar(256) NOT NULL,
  `EmailAddress` varchar(254) NOT NULL COMMENT 'User Email',
  `Address` varchar(254) NOT NULL COMMENT 'User Address',
  `PhoneNumber` varchar(254) NOT NULL COMMENT 'User Phone Number'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `EmailAddress`, `Address`, `PhoneNumber`) VALUES
(8, 'test', '$2y$10$ufV7TaEoYiif5sAl/YCed.QQKlBhggYlTVXz5.UDTYZb9DTbP3qfm', 'test@test.com', 't', '2223334544');

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
  ADD UNIQUE KEY `UserID` (`uid`),
  ADD UNIQUE KEY `MovieID` (`mid`);

--
-- Indexes for table `movies`
--
ALTER TABLE `movies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `currently_renting`
--
ALTER TABLE `currently_renting`
  ADD CONSTRAINT `Curr_Movie_con` FOREIGN KEY (`MoviesID`) REFERENCES `movies` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
