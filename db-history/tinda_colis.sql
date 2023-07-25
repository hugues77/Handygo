²²²²²²²²-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Mar 01, 2023 at 07:58 AM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tinda_colis`
--

-- --------------------------------------------------------
-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE  `messages` (
  `Msg_ID` int NOT NULL AUTO_INCREMENT,
  `Messages` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `Date_message` timestamp DEFAULT CURRENT_TIMESTAMP NOT NULL,
  `Incoming_msg_ID` int NOT NULL,
  `Outgoing_msg_ID` int NOT NULL,
  PRIMARY KEY(`Msg_ID`)
) ENGINE=MYISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


--
-- Table structure for table `reservation`
--

CREATE TABLE  `reservation` (
  `ID_res` int NOT NULL AUTO_INCREMENT,
  -- `Name` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `Date_res` timestamp DEFAULT CURRENT_TIMESTAMP NOT NULL,
  `Description_res` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `nbre_bag` int DEFAULT 0,
  `nbre_doc` int DEFAULT 0,
  `prix_tot_bag` int DEFAULT 0,
  `prix_tot_doc` int DEFAULT 0,
  `ID_user_client` int NOT NULL,
  `ID_user_voyageur` int NOT NULL,
  `Trip_ID` int NOT NULL,
  PRIMARY KEY(`ID_res`)
) ENGINE=MYISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------
--
-- Table structure for table `reservation`
--

CREATE TABLE  `vehicule` (
  `ID_veh` int NOT NULL AUTO_INCREMENT,
  -- `Name` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `Date_enregistrer` timestamp DEFAULT CURRENT_TIMESTAMP NOT NULL,
  `Description_veh` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `nom_veh` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `marque_veh` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `annee_veh` int DEFAULT 0,
  `puissance_veh` int DEFAULT 0,
  `type_veh` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `immatriculation` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `ID_user_chauffeur` int NOT NULL,
  PRIMARY KEY(`ID_veh`)
) ENGINE=MYISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------
--
--
-- Table structure for table `trip`
--

CREATE TABLE  `trip` (
  `ID_voy` int NOT NULL AUTO_INCREMENT,
  `user_ID` int NOT NULL,
  `Ref_voy` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `Depart` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `Destination` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `Date_depart` date,
  `Date_arrivee` date,
  `Heure_depart` Time,
  `Heure_arrivee` Time,
  `Mode_voy` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `Description_trip` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `Bagage_dispo` int DEFAULT 0,
  `Courrier_dispo` int DEFAULT 0,
  `Bagage_reserve` int DEFAULT 0, 
  `Prix_bag` int,
  `Prix_courrier` int,
  `Descrip_bagage` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `Taille_bag_s` tinyint(1),
  `Taille_bag_m` tinyint(1),
  `Taille_bag_l` tinyint(1),
  `Taille_bag_xl` tinyint(1),
  `Taille_bag_xxl` tinyint(1),
  `itineraire` int DEFAULT 0 NOT NULL,
  `date_voy` int DEFAULT 0,
  `bagage_title` int DEFAULT 0,
  `paiement_title` int DEFAULT 0,
  `confirm_title` int DEFAULT 0,
  `posted` int DEFAULT 0,
  PRIMARY KEY(`ID_voy`)
) ENGINE=MYISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE  `users` (
  `ID_user` int NOT NULL AUTO_INCREMENT,
  `Nom` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `Prenom` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `Adresse` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `Tel1` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `Tel2` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `Sexe` varchar(2) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `Statut` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `Bio` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `Image` varchar(100) DEFAULT "image.png"  COLLATE utf8mb4_unicode_ci,
  `Unique_ID` varchar(50)  CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `Date_naissance` date,
  `Password` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `Email` varchar(120) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `Date_inscription` timestamp DEFAULT CURRENT_TIMESTAMP NOT NULL,
  PRIMARY KEY(`ID_user`)
) ENGINE=MYISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


--
-- Indexes for dumped tables
--

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`Msg_ID`),
  ADD KEY `Incoming_msg_ID` (`Incoming_msg_ID`),
  ADD KEY `Outgoing_msg_ID` (`Outgoing_msg_ID`);

--
-- Indexes for table `trip`
--
ALTER TABLE `trip`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `user_ID` (`user_ID`);

--
-- Indexes for table `reservation`
--
ALTER TABLE `reservation`
  ADD PRIMARY KEY (`ID_res`),
  ADD KEY `ID_user_client` (`ID_user_client`),
  ADD KEY `ID_user_voyageur` (`ID_user_voyageur`),
  ADD KEY `Trip_ID` (`Trip_ID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`ID_user`);

--
-- AUTO_INCREMENT for table `trip`
--
ALTER TABLE `trip`
  MODIFY `ID_voy` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;

--

-- Constraints for dumped tables
--

--
-- Constraints for table `trip`
--
ALTER TABLE `trip`
  ADD CONSTRAINT `trip_ibfk_1` FOREIGN KEY (`user_ID`) REFERENCES `users` (`unique_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `reservation`
--
ALTER TABLE `reservation`
  ADD CONSTRAINT `reservation_ibfk_1` FOREIGN KEY (`ID_user_client`) REFERENCES `users` (`unique_id`) ON DELETE CASCADE ON UPDATE CASCADE;
  ADD CONSTRAINT `reservation_ibfk_2` FOREIGN KEY (`ID_user_voyageur`) REFERENCES `users` (`unique_id`) ON DELETE CASCADE ON UPDATE CASCADE;
  ADD CONSTRAINT `reservation_ibfk_3` FOREIGN KEY (`Trip_ID`) REFERENCES `trip` (`Ref_voy`) ON DELETE CASCADE ON UPDATE CASCADE;
--
-- Constraints for table `messages`
--
ALTER TABLE `messages`
  ADD CONSTRAINT `messages_ibfk_1` FOREIGN KEY (`Incoming_msg_ID`) REFERENCES `users` (`unique_id`) ON DELETE RESTRICT ON UPDATE RESTRICT;
  ADD CONSTRAINT `messages_ibfk_2` FOREIGN KEY (`Outgoing_msg_ID`) REFERENCES `users` (`unique_id`) ON DELETE RESTRICT ON UPDATE RESTRICT;


/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
