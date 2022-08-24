-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Φιλοξενητής: 127.0.0.1
-- Χρόνος δημιουργίας: 18 Ιουν 2020 στις 11:13:43
-- Έκδοση διακομιστή: 10.1.40-MariaDB
-- Έκδοση PHP: 7.3.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Βάση δεδομένων: `patients`
--

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `enc_patients`
--

CREATE TABLE `enc_patients` (
  `id` int(11) NOT NULL,
  `nameenc` varchar(1000) DEFAULT NULL,
  `street` varchar(20) DEFAULT NULL,
  `number` int(11) DEFAULT NULL,
  `city` varchar(20) DEFAULT NULL,
  `country` varchar(100) DEFAULT NULL,
  `hight` float DEFAULT NULL,
  `weight` float DEFAULT NULL,
  `profetion` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `amka` bigint(20) NOT NULL,
  `sourse` varchar(100) DEFAULT NULL,
  `date_of_birth` date DEFAULT NULL,
  `comments` text,
  `foot_size` int(11) DEFAULT NULL,
  `history` text,
  `date_of_first_diagnosis` date DEFAULT NULL,
  `meds` text NOT NULL,
  `examination` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `phones`
--

CREATE TABLE `phones` (
  `number` bigint(20) NOT NULL,
  `pid` int(11) NOT NULL,
  `country` varchar(30) NOT NULL,
  `type` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Ευρετήρια για άχρηστους πίνακες
--

--
-- Ευρετήρια για πίνακα `enc_patients`
--
ALTER TABLE `enc_patients`
  ADD PRIMARY KEY (`id`),
  ADD KEY `entered` (`date_of_first_diagnosis`),
  ADD KEY `name(enc)` (`nameenc`(767)),
  ADD KEY `amka` (`amka`);

--
-- Ευρετήρια για πίνακα `phones`
--
ALTER TABLE `phones`
  ADD PRIMARY KEY (`number`),
  ADD KEY `phone_owner` (`pid`),
  ADD KEY `pid` (`pid`) USING BTREE;

--
-- AUTO_INCREMENT για άχρηστους πίνακες
--

--
-- AUTO_INCREMENT για πίνακα `enc_patients`
--
ALTER TABLE `enc_patients`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;

--
-- Περιορισμοί για άχρηστους πίνακες
--

--
-- Περιορισμοί για πίνακα `phones`
--
ALTER TABLE `phones`
  ADD CONSTRAINT `pid` FOREIGN KEY (`pid`) REFERENCES `enc_patients` (`id`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
