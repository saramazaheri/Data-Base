-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 14, 2022 at 09:16 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `consultant system`
--

-- --------------------------------------------------------

--
-- Table structure for table `attends_to`
--

CREATE TABLE `attends_to` (
  `Consultee_Email` varchar(100) COLLATE utf8_persian_ci NOT NULL,
  `Consultant_Email` varchar(100) COLLATE utf8_persian_ci NOT NULL,
  `DateTime` datetime NOT NULL,
  `Financial` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

-- --------------------------------------------------------

--
-- Table structure for table `consultant`
--

CREATE TABLE `consultant` (
  `Email` varchar(100) COLLATE utf8_persian_ci NOT NULL,
  `First_Name` varchar(100) COLLATE utf8_persian_ci NOT NULL,
  `Last_Name` varchar(100) COLLATE utf8_persian_ci NOT NULL,
  `Date_of_Birth` date NOT NULL,
  `Gender` varchar(6) COLLATE utf8_persian_ci NOT NULL,
  `Role` varchar(5) COLLATE utf8_persian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

-- --------------------------------------------------------

--
-- Table structure for table `consultant_phone_number`
--

CREATE TABLE `consultant_phone_number` (
  `Email` varchar(100) COLLATE utf8_persian_ci NOT NULL,
  `Phone_Number` varchar(11) COLLATE utf8_persian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

-- --------------------------------------------------------

--
-- Table structure for table `consultee`
--

CREATE TABLE `consultee` (
  `Email` varchar(100) COLLATE utf8_persian_ci NOT NULL,
  `First_Name` varchar(100) COLLATE utf8_persian_ci NOT NULL,
  `Last_Name` varchar(100) COLLATE utf8_persian_ci NOT NULL,
  `Date_of_Birth` date NOT NULL,
  `Gender` varchar(6) COLLATE utf8_persian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

-- --------------------------------------------------------

--
-- Table structure for table `consultee_phone_number`
--

CREATE TABLE `consultee_phone_number` (
  `Email` varchar(100) COLLATE utf8_persian_ci NOT NULL,
  `Phone_Number` varchar(11) COLLATE utf8_persian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `Email` varchar(100) COLLATE utf8_persian_ci NOT NULL,
  `Password` varchar(100) COLLATE utf8_persian_ci NOT NULL,
  `Role` varchar(10) COLLATE utf8_persian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `attends_to`
--
ALTER TABLE `attends_to`
  ADD KEY `Consultee_Email` (`Consultee_Email`,`Consultant_Email`),
  ADD KEY `Consultant_Email` (`Consultant_Email`);

--
-- Indexes for table `consultant`
--
ALTER TABLE `consultant`
  ADD PRIMARY KEY (`Email`),
  ADD UNIQUE KEY `Email` (`Email`);

--
-- Indexes for table `consultant_phone_number`
--
ALTER TABLE `consultant_phone_number`
  ADD KEY `Email` (`Email`);

--
-- Indexes for table `consultee`
--
ALTER TABLE `consultee`
  ADD PRIMARY KEY (`Email`),
  ADD UNIQUE KEY `Email` (`Email`);

--
-- Indexes for table `consultee_phone_number`
--
ALTER TABLE `consultee_phone_number`
  ADD KEY `Email` (`Email`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`Email`),
  ADD UNIQUE KEY `Email` (`Email`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `attends_to`
--
ALTER TABLE `attends_to`
  ADD CONSTRAINT `attends_to_ibfk_1` FOREIGN KEY (`Consultant_Email`) REFERENCES `consultant` (`Email`),
  ADD CONSTRAINT `attends_to_ibfk_2` FOREIGN KEY (`Consultee_Email`) REFERENCES `consultee` (`Email`);

--
-- Constraints for table `consultant`
--
ALTER TABLE `consultant`
  ADD CONSTRAINT `consultant_ibfk_1` FOREIGN KEY (`Email`) REFERENCES `users` (`Email`);

--
-- Constraints for table `consultant_phone_number`
--
ALTER TABLE `consultant_phone_number`
  ADD CONSTRAINT `consultant_phone_number_ibfk_1` FOREIGN KEY (`Email`) REFERENCES `consultant` (`Email`);

--
-- Constraints for table `consultee`
--
ALTER TABLE `consultee`
  ADD CONSTRAINT `consultee_ibfk_1` FOREIGN KEY (`Email`) REFERENCES `users` (`Email`);

--
-- Constraints for table `consultee_phone_number`
--
ALTER TABLE `consultee_phone_number`
  ADD CONSTRAINT `consultee_phone_number_ibfk_1` FOREIGN KEY (`Email`) REFERENCES `consultee` (`Email`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
