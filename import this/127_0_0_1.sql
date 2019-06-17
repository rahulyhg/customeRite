-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 18, 2018 at 02:21 AM
-- Server version: 5.7.14
-- PHP Version: 7.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `thisdatabase`
--
CREATE DATABASE IF NOT EXISTS `thisdatabase` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `thisdatabase`;

-- --------------------------------------------------------

--
-- Table structure for table `author`
--

CREATE TABLE `author` (
  `authorID` int(10) UNSIGNED NOT NULL,
  `firstName` varchar(50) NOT NULL,
  `lastName` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `author`
--

INSERT INTO `author` (`authorID`, `firstName`, `lastName`) VALUES
(1, 'amor', 'fisher'),
(2, 'frank', 'kelly'),
(3, 'sonya', 'henry'),
(4, 'kristy', 'fishing'),
(5, 'salazar', 'fish');

-- --------------------------------------------------------

--
-- Table structure for table `book`
--

CREATE TABLE `book` (
  `BookID` int(10) UNSIGNED NOT NULL,
  `itemID` int(11) NOT NULL,
  `authorID` int(11) NOT NULL,
  `name` varchar(40) NOT NULL,
  `bImage` blob
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `book`
--

INSERT INTO `book` (`BookID`, `itemID`, `authorID`, `name`, `bImage`) VALUES
(1, 1, 2, 'hero without a conscience', 0x626f6f6b322e6a7067),
(2, 2, 2, 'vulture of the night', 0x626f6f6b322e6a7067),
(3, 3, 2, 'boys of the gods', 0x626f6f6b322e6a7067),
(4, 4, 3, 'defeat of reality', 0x626f6f6b322e6a7067),
(5, 5, 4, 'foes and snakes', 0x626f6f6b322e6a7067);

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `customerID` int(10) UNSIGNED NOT NULL,
  `username` varchar(12) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(12) NOT NULL,
  `lastName` varchar(50) NOT NULL,
  `initials` varchar(3) NOT NULL,
  `phoneNumber` varchar(12) NOT NULL,
  `address` varchar(256) NOT NULL,
  `dateCreated` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`customerID`, `username`, `email`, `password`, `lastName`, `initials`, `phoneNumber`, `address`, `dateCreated`) VALUES
(1, 'user1', 'user1@gmail.com', 'userpassword', 'hines', 'i.a', '817-333-6000', '7456 oxford ave, basking ridge, nj 07931', '2018-04-18 09:00:33'),
(2, 'user2', 'user2@gmail.com', 'userpassword', 'hines', 'i.a', '817-333-6001', '7456 oxford ave, basking ridge, nj 07931', '2018-04-18 09:00:33'),
(3, 'user3', 'user3@gmail.com', 'userpassword', 'hines', 'i.a', '817-333-6002', '7456 oxford ave, basking ridge, nj 07931', '2018-04-18 09:00:33'),
(4, 'user4', 'user4@gmail.com', 'userpassword', 'hines', 'i.a', '817-333-6003', '7456 oxford ave, basking ridge, nj 07931', '2018-04-18 09:00:33'),
(5, 'user5', 'user5@gmail.com', 'userpassword', 'hines', 'i.a', '817-333-6004', '7456 oxford ave, basking ridge, nj 07931', '2018-04-18 09:00:33'),
(6, 'user6', 'user6@gmail.com', 'userpassword', 'wood', 'i.a', '817-333-6005', '7456 oxford ave, basking ridge, nj 07931', '2018-04-18 09:00:33'),
(7, 'user7', 'user7@gmail.com', 'userpassword', 'wood', 'i.a', '817-333-6006', '7456 oxford ave, basking ridge, nj 07931', '2018-04-18 09:00:33'),
(8, 'user8', 'user8@gmail.com', 'userpassword', 'wood', 'i.a', '817-333-6007', '7456 bow ridge ave, basking ridge, nj 07931', '2018-04-18 09:00:33'),
(9, 'user9', 'user9@gmail.com', 'userpassword', 'wood', 'i.a', '817-333-6008', 'no 6 user user street, victorial island, lagos, nigeria', '2018-04-18 09:00:33'),
(10, 'user10', 'user10@gmail.com', 'userpassword', 'wood', 'i.a', '817-333-6009', 'no 6 user user street, victorial island, lagos, nigeria', '2018-04-18 09:00:33'),
(11, 'user11', 'user11@gmail.com', 'userpassword', 'wood', 'i.a', '817-333-6020', 'no 6 user user street, victorial island, lagos, nigeria', '2018-04-18 09:00:33'),
(12, 'user12', 'user12@gmail.com', 'userpassword', 'sharp', 'i.a', '817-333-6030', '7456 bow ridge ave, basking ridge, nj 07920', '2018-04-18 09:00:33'),
(13, 'user13', 'user13@gmail.com', 'userpassword', 'sharp', 'i.a', '817-333-6040', '7456 bow ridge ave, basking ridge, nj 07920', '2018-04-18 09:00:33'),
(14, 'user14', 'user14@gmail.com', 'userpassword', 'sharp', 'i.a', '817-333-6050', '7456 bow ridge ave, basking ridge, nj 07920', '2018-04-18 09:00:33'),
(15, 'user15', 'user15@gmail.com', 'userpassword', 'sharp', 'i.a', '817-333-6060', '7456 bow ridge ave, basking ridge, nj 07920', '2018-04-18 09:00:33'),
(16, 'user16', 'user16@gmail.com', 'userpassword', 'sharp', 'i.a', '817-333-6070', '7456 bow ridge ave, basking ridge, nj 07920', '2018-04-18 09:00:33'),
(17, 'user17', 'user17@gmail.com', 'userpassword', 'sharp', 'i.a', '817-333-6080', '7456 bow ridge ave, basking ridge, nj 07920', '2018-04-18 09:00:33'),
(18, 'user18', 'user18@gmail.com', 'userpassword', 'sharp', 'i.a', '817-333-6090', '7456 bow ridge ave, basking ridge, nj 07920', '2018-04-18 09:00:33'),
(19, 'user19', 'user19@gmail.com', 'userpassword', 'sharp', 'i.a', '817-333-6100', '7456 bow ridge ave, basking ridge, nj 07920', '2018-04-18 09:00:33'),
(20, 'user20', 'user20@gmail.com', 'userpassword', 'sharp', 'i.a', '817-333-6200', '7456 bow ridge ave, basking ridge, nj 07920', '2018-04-18 09:00:33');

-- --------------------------------------------------------

--
-- Table structure for table `description`
--

CREATE TABLE `description` (
  `descriptionID` int(10) UNSIGNED NOT NULL,
  `title` varchar(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `description`
--

INSERT INTO `description` (`descriptionID`, `title`) VALUES
(1, 'book'),
(2, 'film'),
(3, 'periodicals');

-- --------------------------------------------------------

--
-- Table structure for table `director`
--

CREATE TABLE `director` (
  `directorID` int(10) UNSIGNED NOT NULL,
  `firstName` varchar(50) NOT NULL,
  `lastName` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `director`
--

INSERT INTO `director` (`directorID`, `firstName`, `lastName`) VALUES
(1, 'marvel', 'marvel'),
(2, 'pixar', 'pixar'),
(3, 'paranoma', 'paranoma');

-- --------------------------------------------------------

--
-- Table structure for table `film`
--

CREATE TABLE `film` (
  `filmID` int(10) UNSIGNED NOT NULL,
  `itemID` int(11) NOT NULL,
  `directorID` int(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `dateReleased` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `film`
--

INSERT INTO `film` (`filmID`, `itemID`, `directorID`, `name`, `dateReleased`) VALUES
(1, 1, 1, 'Next Valley', '2018-04-18 10:52:28'),
(2, 2, 1, 'Rings in the Dreamer', '2018-04-18 10:55:35'),
(3, 1, 2, 'The Mens Flower', '2018-04-18 10:55:35');

-- --------------------------------------------------------

--
-- Table structure for table `item`
--

CREATE TABLE `item` (
  `itemID` int(10) UNSIGNED NOT NULL,
  `subjectID` int(11) NOT NULL,
  `descriptionID` int(11) NOT NULL,
  `iImage` blob,
  `dateReleased` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `item`
--

INSERT INTO `item` (`itemID`, `subjectID`, `descriptionID`, `iImage`, `dateReleased`) VALUES
(1, 1, 1, 0x6974656d312e6a7067, '2018-04-18 11:05:18'),
(2, 1, 2, 0x6974656d312e6a7067, '2018-04-18 11:05:18'),
(3, 1, 3, 0x6974656d312e6a7067, '2018-04-18 11:05:18'),
(4, 2, 1, 0x6974656d312e6a7067, '2018-04-18 11:05:18'),
(5, 2, 2, 0x6974656d312e6a7067, '2018-04-18 11:05:18'),
(6, 2, 3, 0x6974656d312e6a7067, '2018-04-18 11:05:18'),
(7, 3, 1, 0x6974656d312e6a7067, '2018-04-18 11:05:18'),
(8, 3, 2, 0x6974656d312e6a7067, '2018-04-18 11:05:18'),
(9, 3, 3, 0x6974656d312e6a7067, '2018-04-18 11:05:18'),
(10, 1, 3, 0x6974656d312e6a7067, '2018-04-18 11:05:18'),
(11, 1, 3, 0x6974656d312e6a7067, '2018-04-18 11:05:18'),
(12, 1, 3, 0x6974656d312e6a7067, '2018-04-18 11:05:18'),
(13, 3, 1, 0x6974656d312e6a7067, '2018-04-18 11:05:18'),
(14, 1, 3, 0x6974656d312e6a7067, '2018-04-18 11:05:18'),
(15, 3, 2, 0x6974656d312e6a7067, '2018-04-18 11:05:18'),
(16, 1, 3, 0x6974656d312e6a7067, '2018-04-18 11:05:18'),
(17, 1, 3, 0x6974656d312e6a7067, '2018-04-18 11:05:18'),
(18, 1, 3, 0x6974656d312e6a7067, '2018-04-18 11:05:18'),
(19, 1, 3, 0x6974656d312e6a7067, '2018-04-18 11:05:18'),
(20, 1, 3, 0x6974656d312e6a7067, '2018-04-18 11:05:18');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `orderID` int(10) UNSIGNED NOT NULL,
  `customerID` int(11) NOT NULL,
  `itemID` int(11) NOT NULL,
  `dateOfOrder` datetime DEFAULT CURRENT_TIMESTAMP,
  `Payments` int(10) UNSIGNED NOT NULL,
  `totalPrice` int(10) UNSIGNED NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`orderID`, `customerID`, `itemID`, `dateOfOrder`, `Payments`, `totalPrice`) VALUES
(1, 1, 1, '2018-04-16 10:45:00', 2000, 1000),
(2, 2, 1, '2018-04-18 10:45:00', 2000, 1000),
(3, 1, 2, '2018-04-20 10:45:00', 2000, 1000);

-- --------------------------------------------------------

--
-- Table structure for table `periodicals`
--

CREATE TABLE `periodicals` (
  `periodicalsD` int(10) UNSIGNED NOT NULL,
  `publisherID` int(11) NOT NULL,
  `itemID` int(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `date` datetime DEFAULT CURRENT_TIMESTAMP,
  `pImage` blob
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `publications`
--

CREATE TABLE `publications` (
  `publicationID` int(10) UNSIGNED NOT NULL,
  `publisherID` int(11) NOT NULL,
  `itemID` int(11) NOT NULL,
  `dateOfOrder` datetime NOT NULL,
  `name` varchar(20) NOT NULL,
  `pImage` blob
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `publications`
--

INSERT INTO `publications` (`publicationID`, `publisherID`, `itemID`, `dateOfOrder`, `name`, `pImage`) VALUES
(1, 1, 2, '2018-04-18 10:40:04', 'paris attractions', 0x626f6f6b312e6a7067),
(2, 2, 3, '2018-04-18 10:40:04', 'art works', 0x626f6f6b312e6a7067),
(3, 3, 2, '2018-04-18 10:40:04', 'best 10 hotels', 0x626f6f6b312e6a7067),
(4, 2, 6, '2018-04-18 10:40:04', 'romeo and juliet', 0x626f6f6b312e6a7067),
(5, 1, 3, '2018-04-18 10:40:04', 'how to make pizza', 0x626f6f6b312e6a7067);

-- --------------------------------------------------------

--
-- Table structure for table `publisher`
--

CREATE TABLE `publisher` (
  `publisherID` int(10) UNSIGNED NOT NULL,
  `firstName` varchar(50) NOT NULL,
  `lastName` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `publisher`
--

INSERT INTO `publisher` (`publisherID`, `firstName`, `lastName`) VALUES
(1, 'publisher1', 'name1'),
(2, 'publisher2', 'name2'),
(3, 'publisher3', 'name3'),
(4, 'publisher4', 'name4'),
(5, 'publisher5', 'name5'),
(6, 'publisher6', 'name6');

-- --------------------------------------------------------

--
-- Table structure for table `subject`
--

CREATE TABLE `subject` (
  `subjectID` int(10) UNSIGNED NOT NULL,
  `title` varchar(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subject`
--

INSERT INTO `subject` (`subjectID`, `title`) VALUES
(1, 'fiction'),
(2, 'sci-fi'),
(3, 'drama');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `author`
--
ALTER TABLE `author`
  ADD PRIMARY KEY (`authorID`),
  ADD UNIQUE KEY `firstName` (`firstName`),
  ADD UNIQUE KEY `lastName` (`lastName`);

--
-- Indexes for table `book`
--
ALTER TABLE `book`
  ADD PRIMARY KEY (`BookID`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`customerID`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `phoneNumber` (`phoneNumber`);

--
-- Indexes for table `description`
--
ALTER TABLE `description`
  ADD PRIMARY KEY (`descriptionID`),
  ADD UNIQUE KEY `title` (`title`);

--
-- Indexes for table `director`
--
ALTER TABLE `director`
  ADD PRIMARY KEY (`directorID`),
  ADD UNIQUE KEY `firstName` (`firstName`),
  ADD UNIQUE KEY `lastName` (`lastName`);

--
-- Indexes for table `film`
--
ALTER TABLE `film`
  ADD PRIMARY KEY (`filmID`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `item`
--
ALTER TABLE `item`
  ADD PRIMARY KEY (`itemID`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`orderID`);

--
-- Indexes for table `periodicals`
--
ALTER TABLE `periodicals`
  ADD PRIMARY KEY (`periodicalsD`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `publications`
--
ALTER TABLE `publications`
  ADD PRIMARY KEY (`publicationID`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `publisher`
--
ALTER TABLE `publisher`
  ADD PRIMARY KEY (`publisherID`),
  ADD UNIQUE KEY `firstName` (`firstName`),
  ADD UNIQUE KEY `lastName` (`lastName`);

--
-- Indexes for table `subject`
--
ALTER TABLE `subject`
  ADD PRIMARY KEY (`subjectID`),
  ADD UNIQUE KEY `title` (`title`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `author`
--
ALTER TABLE `author`
  MODIFY `authorID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `book`
--
ALTER TABLE `book`
  MODIFY `BookID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `customerID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `description`
--
ALTER TABLE `description`
  MODIFY `descriptionID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `director`
--
ALTER TABLE `director`
  MODIFY `directorID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `film`
--
ALTER TABLE `film`
  MODIFY `filmID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `item`
--
ALTER TABLE `item`
  MODIFY `itemID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `orderID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `periodicals`
--
ALTER TABLE `periodicals`
  MODIFY `periodicalsD` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `publications`
--
ALTER TABLE `publications`
  MODIFY `publicationID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `publisher`
--
ALTER TABLE `publisher`
  MODIFY `publisherID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `subject`
--
ALTER TABLE `subject`
  MODIFY `subjectID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
