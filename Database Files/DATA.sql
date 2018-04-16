
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

