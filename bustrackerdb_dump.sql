-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:5306
-- Generation Time: May 09, 2023 at 11:06 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bustrackerdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `accounts`
--

CREATE TABLE `accounts` (
  `id` int(6) UNSIGNED NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(50) NOT NULL,
  `isDriver` tinyint(1) NOT NULL,
  `isAdmin` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `accounts`
--

INSERT INTO `accounts` (`id`, `username`, `password`, `email`, `isDriver`, `isAdmin`) VALUES
(1, 'admin', '$2y$10$HNuI7HkDOam/c5RkJIx.EOyu6Kja9A7I8giQD8EdCt/w5usEk9Uha', 'admin@email.com', 0, 1),
(2, 'driver1', '$2y$10$q8UUTSaaPMpP2L18vnHfAupOpqFyaJeUZ23/1GIfn9e6KnS/aoyQG', 'driver1@email.com', 1, 0),
(3, 'driver2', '$2y$10$8y8wossw.1jda/Iq8.as9ud0ZdPRjCmO8JY0dFavHpsdyFTX2.STy', 'driver2@email.com', 1, 0),
(4, 'driver3', '$2y$10$otpb0YT6PTErx8FXbWCgB.p4tIjRmEy9Xe8H./RwAuNpcrmQVTT3K', 'driver3@email.com', 1, 0),
(5, 'user', '$2y$10$eUDEub5zczM6jH7c0/NGmetXdbOe9F3TngrICOQRNN.N92sndARgm', 'user@email.com', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `busses`
--

CREATE TABLE `busses` (
  `id` int(6) UNSIGNED NOT NULL,
  `driverID` int(6) DEFAULT NULL,
  `stop1` varchar(50) DEFAULT NULL,
  `stop2` varchar(50) DEFAULT NULL,
  `stop3` varchar(50) DEFAULT NULL,
  `stop4` varchar(50) DEFAULT NULL,
  `alert` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `busses`
--

INSERT INTO `busses` (`id`, `driverID`, `stop1`, `stop2`, `stop3`, `stop4`, `alert`) VALUES
(1, 2, 'Lot #60', 'NJ Transit Station', 'Red Hawk Deck', 'CarParc Diem', 'There will be a small delay due to inclement weather.'),
(2, 3, 'NJ Transit Station', 'Fenwick Hall', 'Basie Hall', 'Hawk Crossings', 'Remember to gather all your belongings before you get off the bus!\r\n\r\nAll items left behind will be sent to the lost and found center.');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accounts`
--
ALTER TABLE `accounts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `busses`
--
ALTER TABLE `busses`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accounts`
--
ALTER TABLE `accounts`
  MODIFY `id` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `busses`
--
ALTER TABLE `busses`
  MODIFY `id` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
