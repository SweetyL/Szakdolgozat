-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 11, 2022 at 09:40 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `szakdoga`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `adr`
--

CREATE TABLE `adr` (
  `adrID` int(10) NOT NULL,
  `name` varchar(120) NOT NULL,
  `icon` varchar(120) NOT NULL,
  `comment` varchar(120) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `cargo`
--

CREATE TABLE `cargo` (
  `cargoID` int(10) NOT NULL,
  `name` varchar(120) NOT NULL,
  `mass` varchar(120) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `companies`
--

CREATE TABLE `companies` (
  `compID` int(10) NOT NULL,
  `name` varchar(120) NOT NULL,
  `countryID` varchar(3) NOT NULL,
  `townID` int(10) NOT NULL,
  `street` varchar(120) NOT NULL,
  `houseNumber` int(10) NOT NULL,
  `email` varchar(120) NOT NULL,
  `phoneNumber` varchar(15) NOT NULL,
  `webpage` varchar(120) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

CREATE TABLE `countries` (
  `countryID` varchar(3) NOT NULL,
  `name` varchar(120) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `curonline`
--

CREATE TABLE `curonline` (
  `id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `drivers`
--

CREATE TABLE `drivers` (
  `driverID` int(10) NOT NULL,
  `firstname` varchar(120) NOT NULL,
  `lastname` varchar(120) NOT NULL,
  `countryID` varchar(3) NOT NULL,
  `townID` int(10) NOT NULL,
  `street` varchar(120) NOT NULL,
  `houseNumber` int(10) NOT NULL,
  `email` varchar(120) NOT NULL,
  `phoneNumber` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `engines`
--

CREATE TABLE `engines` (
  `engineID` int(10) NOT NULL,
  `brand` varchar(120) NOT NULL,
  `name` varchar(120) NOT NULL,
  `power` varchar(120) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `jobID` int(10) NOT NULL,
  `driverID` int(10) NOT NULL,
  `tripID` int(10) NOT NULL,
  `truckID` int(10) NOT NULL,
  `reward` int(6) NOT NULL,
  `comment` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `lastseen`
--

CREATE TABLE `lastseen` (
  `id` int(10) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `owneroftrucks`
--

CREATE TABLE `owneroftrucks` (
  `ownID` int(10) NOT NULL,
  `compID` int(10) NOT NULL,
  `truckID` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `skills`
--

CREATE TABLE `skills` (
  `skillID` int(10) NOT NULL,
  `driverID` int(10) NOT NULL,
  `adrID` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `towns`
--

CREATE TABLE `towns` (
  `townID` int(10) NOT NULL,
  `name` varchar(120) NOT NULL,
  `zipCode` int(12) NOT NULL,
  `countryID` varchar(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `trips`
--

CREATE TABLE `trips` (
  `tripID` int(10) NOT NULL,
  `fromComp` int(10) NOT NULL,
  `toComp` int(10) NOT NULL,
  `tripLength` int(5) NOT NULL,
  `cargoID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `trucks`
--

CREATE TABLE `trucks` (
  `truckID` int(10) NOT NULL,
  `brand` varchar(120) NOT NULL,
  `name` varchar(120) NOT NULL,
  `engineID` int(10) NOT NULL,
  `tankSize` varchar(120) NOT NULL,
  `consumption` varchar(120) NOT NULL,
  `numberOfAxles` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `userID` int(10) NOT NULL,
  `username` varchar(50) CHARACTER SET latin1 NOT NULL,
  `password` varchar(32) CHARACTER SET latin1 NOT NULL,
  `type` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD KEY `ibfk_admin_driver` (`id`);

--
-- Indexes for table `adr`
--
ALTER TABLE `adr`
  ADD PRIMARY KEY (`adrID`);

--
-- Indexes for table `cargo`
--
ALTER TABLE `cargo`
  ADD PRIMARY KEY (`cargoID`);

--
-- Indexes for table `companies`
--
ALTER TABLE `companies`
  ADD PRIMARY KEY (`compID`),
  ADD KEY `ibfk_connect_compcountries` (`countryID`),
  ADD KEY `ibfk_connect_comptowns` (`townID`);

--
-- Indexes for table `countries`
--
ALTER TABLE `countries`
  ADD PRIMARY KEY (`countryID`);

--
-- Indexes for table `curonline`
--
ALTER TABLE `curonline`
  ADD KEY `ibfk_connect_comp_to_curonline` (`id`);

--
-- Indexes for table `drivers`
--
ALTER TABLE `drivers`
  ADD PRIMARY KEY (`driverID`),
  ADD KEY `ibfk_connect_drivercountry` (`countryID`),
  ADD KEY `ibfk_connect_drivertown` (`townID`);

--
-- Indexes for table `engines`
--
ALTER TABLE `engines`
  ADD PRIMARY KEY (`engineID`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`jobID`),
  ADD KEY `ibfk_connect_drivertojob` (`driverID`),
  ADD KEY `ibfk_connect_triptojob` (`tripID`),
  ADD KEY `ibfk_connect_trucktojob` (`truckID`);

--
-- Indexes for table `lastseen`
--
ALTER TABLE `lastseen`
  ADD KEY `ibfk_lastseen_driver` (`id`);

--
-- Indexes for table `owneroftrucks`
--
ALTER TABLE `owneroftrucks`
  ADD PRIMARY KEY (`ownID`),
  ADD KEY `ibfk_connect_ownercomp` (`compID`),
  ADD KEY `ibfk_connect_ownertruck` (`truckID`);

--
-- Indexes for table `skills`
--
ALTER TABLE `skills`
  ADD PRIMARY KEY (`skillID`),
  ADD KEY `ibfk_connect_driver` (`driverID`),
  ADD KEY `ibfk_connect_adr` (`adrID`);

--
-- Indexes for table `towns`
--
ALTER TABLE `towns`
  ADD PRIMARY KEY (`townID`),
  ADD KEY `ibfk_connect_countries_to_towns` (`countryID`);

--
-- Indexes for table `trips`
--
ALTER TABLE `trips`
  ADD PRIMARY KEY (`tripID`),
  ADD KEY `ibfk_connect_fromComp` (`fromComp`),
  ADD KEY `ibfk_connect_toComp` (`toComp`),
  ADD KEY `ibfk_connect_tripcargo` (`cargoID`);

--
-- Indexes for table `trucks`
--
ALTER TABLE `trucks`
  ADD PRIMARY KEY (`truckID`),
  ADD KEY `ibfk_connect_engines` (`engineID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `adr`
--
ALTER TABLE `adr`
  MODIFY `adrID` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `cargo`
--
ALTER TABLE `cargo`
  MODIFY `cargoID` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `companies`
--
ALTER TABLE `companies`
  MODIFY `compID` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `drivers`
--
ALTER TABLE `drivers`
  MODIFY `driverID` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `engines`
--
ALTER TABLE `engines`
  MODIFY `engineID` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `jobID` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `owneroftrucks`
--
ALTER TABLE `owneroftrucks`
  MODIFY `ownID` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `skills`
--
ALTER TABLE `skills`
  MODIFY `skillID` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `towns`
--
ALTER TABLE `towns`
  MODIFY `townID` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `trips`
--
ALTER TABLE `trips`
  MODIFY `tripID` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `trucks`
--
ALTER TABLE `trucks`
  MODIFY `truckID` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `userID` int(10) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `admins`
--
ALTER TABLE `admins`
  ADD CONSTRAINT `ibfk_admin_driver` FOREIGN KEY (`id`) REFERENCES `drivers` (`driverID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `companies`
--
ALTER TABLE `companies`
  ADD CONSTRAINT `ibfk_connect_compcountries` FOREIGN KEY (`countryID`) REFERENCES `countries` (`countryID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `ibfk_connect_comptowns` FOREIGN KEY (`townID`) REFERENCES `towns` (`townID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `curonline`
--
ALTER TABLE `curonline`
  ADD CONSTRAINT `ibfk_connect_comp_to_curonline` FOREIGN KEY (`id`) REFERENCES `companies` (`compID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `ibfk_connect_driver_to_curonline` FOREIGN KEY (`id`) REFERENCES `drivers` (`driverID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `drivers`
--
ALTER TABLE `drivers`
  ADD CONSTRAINT `ibfk_connect_drivercountry` FOREIGN KEY (`countryID`) REFERENCES `countries` (`countryID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `ibfk_connect_drivertown` FOREIGN KEY (`townID`) REFERENCES `towns` (`townID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `jobs`
--
ALTER TABLE `jobs`
  ADD CONSTRAINT `ibfk_connect_drivertojob` FOREIGN KEY (`driverID`) REFERENCES `drivers` (`driverID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `ibfk_connect_triptojob` FOREIGN KEY (`tripID`) REFERENCES `trips` (`tripID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `ibfk_connect_trucktojob` FOREIGN KEY (`truckID`) REFERENCES `trucks` (`truckID`);

--
-- Constraints for table `lastseen`
--
ALTER TABLE `lastseen`
  ADD CONSTRAINT `ibfk_lastseen_comp` FOREIGN KEY (`id`) REFERENCES `companies` (`compID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `ibfk_lastseen_driver` FOREIGN KEY (`id`) REFERENCES `drivers` (`driverID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `owneroftrucks`
--
ALTER TABLE `owneroftrucks`
  ADD CONSTRAINT `ibfk_connect_ownercomp` FOREIGN KEY (`compID`) REFERENCES `companies` (`compID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `ibfk_connect_ownertruck` FOREIGN KEY (`truckID`) REFERENCES `trucks` (`truckID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `skills`
--
ALTER TABLE `skills`
  ADD CONSTRAINT `ibfk_connect_adr` FOREIGN KEY (`adrID`) REFERENCES `adr` (`adrID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `ibfk_connect_driver` FOREIGN KEY (`driverID`) REFERENCES `drivers` (`driverID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `towns`
--
ALTER TABLE `towns`
  ADD CONSTRAINT `ibfk_connect_countries_to_towns` FOREIGN KEY (`countryID`) REFERENCES `countries` (`countryID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `trips`
--
ALTER TABLE `trips`
  ADD CONSTRAINT `ibfk_connect_fromComp` FOREIGN KEY (`fromComp`) REFERENCES `companies` (`compID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `ibfk_connect_toComp` FOREIGN KEY (`toComp`) REFERENCES `companies` (`compID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `ibfk_connect_tripcargo` FOREIGN KEY (`cargoID`) REFERENCES `cargo` (`cargoID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `trucks`
--
ALTER TABLE `trucks`
  ADD CONSTRAINT `ibfk_connect_engines` FOREIGN KEY (`engineID`) REFERENCES `engines` (`engineID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `ibfk_connect_comptouser` FOREIGN KEY (`userID`) REFERENCES `companies` (`compID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `ibfk_connect_drivertouser` FOREIGN KEY (`userID`) REFERENCES `drivers` (`driverID`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
