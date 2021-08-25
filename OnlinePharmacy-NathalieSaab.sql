-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 17, 2021 at 08:11 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `OnlinePharmacy-NathalieSaab`
--

-- --------------------------------------------------------

--
-- Table structure for table `Adminstrator`
--

CREATE TABLE `Adminstrator` (
  `UserName` varchar(25) NOT NULL,
  `Password` varchar(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `Adminstrator`
--

INSERT INTO `Adminstrator` (`UserName`, `Password`) VALUES
('Nathalie', 'nn'),
('test', 'test');

-- --------------------------------------------------------

--
-- Table structure for table `Changes`
--

CREATE TABLE `Changes` (
  `id` int(11) NOT NULL,
  `Medicine_Name` varchar(25) NOT NULL,
  `Adminstrator_Name` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `Changes`
--

INSERT INTO `Changes` (`id`, `Medicine_Name`, `Adminstrator_Name`) VALUES
(1, 'Augmentin', 'test'),
(2, 'Safety Glasses', 'Nathalie'),
(3, 'Thermometer', 'Nathalie'),
(4, 'Medical Gloves', 'test');

-- --------------------------------------------------------

--
-- Table structure for table `Customer`
--

CREATE TABLE `Customer` (
  `CEmail` varchar(45) NOT NULL,
  `firstName` varchar(25) NOT NULL,
  `lastName` varchar(25) NOT NULL,
  `PhoneNumber` varchar(8) NOT NULL,
  `Comments` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `Customer`
--

INSERT INTO `Customer` (`CEmail`, `firstName`, `lastName`, `PhoneNumber`, `Comments`) VALUES
('AshleyBeck@example.com', 'Ashley', 'Beck', '76779009', 'Can you notify me through the email when new products are posted'),
('JakeDoe@example.com', 'Jake', 'Doe', '76776090', 'hi '),
('nancyBeck@gmail.com', 'Nancy', 'Bech', '76543218', 'Useful Website'),
('Nathaliesaab6@gmail.com', 'Nathalie', 'Saab', '76776003', 'Good site. Easy to use. '),
('test@example.com', 'test', 'test', '78383833', 'Good website');

-- --------------------------------------------------------

--
-- Table structure for table `Medicine`
--

CREATE TABLE `Medicine` (
  `MedName` varchar(45) NOT NULL,
  `MedPrice` varchar(45) NOT NULL,
  `MedDescription` text NOT NULL,
  `MedImage` varchar(150) NOT NULL,
  `MedCategory` varchar(25) NOT NULL,
  `Med_Id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `Medicine`
--

INSERT INTO `Medicine` (`MedName`, `MedPrice`, `MedDescription`, `MedImage`, `MedCategory`, `Med_Id`) VALUES
('Augmentin', '15$', 'Dose:1g\r\nTreats different type of infections', 'medImages/Augmentin.jpeg', 'Medicine', 1),
('Blood Pressure Device', '35$', 'Measures the blood pressure.', 'medImages/BloodPressure.png', 'Tools', 2),
('Brufen', '12$', 'Dose: 400mg. \r\nAnti-inflammatory Medicine.', 'medImages/Brufen.png', 'Medicine', 3),
('Diabetes Measurement Device', '40$', 'Measures the sugar level in the blood. ', 'medImages/Diabetes.jpeg', 'Tools', 4),
('Flagyl', '15$', 'Treats stomach infection', 'medImages/Flagyl.png', 'Medicine', 5),
('Glucophage', '10$', 'Regulates sugar level in blood. ', 'medImages/Glucophage.jpeg', 'Medicine', 6),
('Hand Sanitizer', '15$', '236ml. Kills 99% of germs. ', 'medImages/HandSanitizer.jpeg', 'Tools', 7),
('KN95 Masks', '10$', 'Provides 95% protection against all particles that are greater than 0.3 µm in diameter (bacteria, viruses) ', 'medImages/KN95.png', 'Tools', 8),
('Medical Gloves', '10$', 'Disposable gloves produced for non-surgical medical procedures. ', 'medImages/Gloves.png', 'Tools', 9),
('Oximeter', '25$', 'Used to measure the oxygen level of the blood.', 'medImages/oximeter.png', 'Tools', 10),
('Panadol', '10$', 'Dose: 500mg \r\nReduces fever and removes headache.', 'medImages/Panadol.jpeg', 'Medicine', 11),
('Ponstan Forte', '8$', 'Anti-inflammatory medicine used to relieve pain. ', 'medImages/Postan.jpeg', 'Medicine', 12),
('Safety Glasses', '70$', 'Protective eyewear that protect the eyes. ', 'medImages/Glasses.jpeg', 'Tools', 13),
('Thermometer', '120$', 'Quickly screens individuals for elevated skin temperature. ', 'medImages/Thermometer.jpeg', 'Tools', 14),
('Tylenol', '15$', 'Dose: 500mg\r\nFast Pain Relief ', ' medImages/Tylenol.jpeg', 'Medicine', 15),
('VitaminC', '5$', 'Used to prevent and treat scurvy.', 'medImages/VitaminC.png', 'Medicine', 16);

-- --------------------------------------------------------

--
-- Table structure for table `Orders`
--

CREATE TABLE `Orders` (
  `id` int(11) NOT NULL,
  `Customer_Email` varchar(45) NOT NULL,
  `Medicine_Name` varchar(45) NOT NULL,
  `Address` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `Orders`
--

INSERT INTO `Orders` (`id`, `Customer_Email`, `Medicine_Name`, `Address`) VALUES
(1, 'AshleyBeck@example.com', 'Flagyl', 'Tannourine'),
(2, 'Nathaliesaab6@gmail.com', 'Hand Sanitizer', 'Lebanon'),
(3, 'JakeDoe@example.com', 'Oximeter', 'Beirut'),
(4, 'nancyBeck@gmail.com', 'Thermometer', 'Lebanon'),
(5, 'Nathaliesaab6@gmail.com', 'Flagyl', 'Lebanon'),
(6, 'Nathaliesaab6@gmail.com', 'VitaminC', 'Spain');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Adminstrator`
--
ALTER TABLE `Adminstrator`
  ADD PRIMARY KEY (`UserName`);

--
-- Indexes for table `Changes`
--
ALTER TABLE `Changes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `Medicine_Name` (`Medicine_Name`),
  ADD KEY `Adminstrator_Name` (`Adminstrator_Name`);

--
-- Indexes for table `Customer`
--
ALTER TABLE `Customer`
  ADD PRIMARY KEY (`CEmail`),
  ADD KEY `CEmail` (`CEmail`);

--
-- Indexes for table `Medicine`
--
ALTER TABLE `Medicine`
  ADD PRIMARY KEY (`MedName`),
  ADD UNIQUE KEY `product_id` (`Med_Id`),
  ADD KEY `MedName` (`MedName`);

--
-- Indexes for table `Orders`
--
ALTER TABLE `Orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `Customer_Email` (`Customer_Email`),
  ADD KEY `Medicine_Name` (`Medicine_Name`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Changes`
--
ALTER TABLE `Changes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `Orders`
--
ALTER TABLE `Orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `Changes`
--
ALTER TABLE `Changes`
  ADD CONSTRAINT `changes_ibfk_1` FOREIGN KEY (`Medicine_Name`) REFERENCES `Medicine` (`MedName`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `changes_ibfk_2` FOREIGN KEY (`Adminstrator_Name`) REFERENCES `Adminstrator` (`UserName`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `Orders`
--
ALTER TABLE `Orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`Customer_Email`) REFERENCES `Customer` (`CEmail`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `orders_ibfk_2` FOREIGN KEY (`Medicine_Name`) REFERENCES `Medicine` (`MedName`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
