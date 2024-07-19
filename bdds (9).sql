-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 19, 2024 at 10:47 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bdds`
--

-- --------------------------------------------------------

--
-- Table structure for table `adminlogin`
--

CREATE TABLE `adminlogin` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `adminlogin`
--

INSERT INTO `adminlogin` (`id`, `username`, `password`) VALUES
(1, 'admin', 'admin'),
(2, 'admin2', 'admin2');

-- --------------------------------------------------------

--
-- Table structure for table `approved_donors`
--

CREATE TABLE `approved_donors` (
  `donor_id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `blood_type` varchar(10) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `date_of_birth` date NOT NULL,
  `age` int(11) NOT NULL,
  `history` varchar(10) NOT NULL,
  `medical_conditions` varchar(100) NOT NULL,
  `any_procedure` varchar(100) NOT NULL,
  `medicine` varchar(100) NOT NULL,
  `remarks` varchar(100) NOT NULL,
  `date_of_registration` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `approved_donors`
--

INSERT INTO `approved_donors` (`donor_id`, `name`, `email`, `phone`, `blood_type`, `gender`, `date_of_birth`, `age`, `history`, `medical_conditions`, `any_procedure`, `medicine`, `remarks`, `date_of_registration`) VALUES
(28, 'you', '2121280@ub.edu.ph', '09365445867', 'A+', 'Male', '2000-01-01', 24, 'Yes', 'zcdzsc', 'Piercing', 'Steroids', '', '2024-07-15'),
(30, 'dfzghdfhgszg', '2121280@ub.edu.ph', '252352524', 'O-', 'Female', '2000-01-12', 23, 'Yes', 'sfrtdstgfsd', 'Dental', 'Antibiotics', '', '2024-07-15'),
(31, 'sfshxcv bxcv', '2121280@ub.edu.ph', '09365445867', 'A+', 'Male', '2003-01-06', 423, 'Yes', 'fsdfdasf', 'Tattoo', 'Antibiotics', '', '2024-07-15');

-- --------------------------------------------------------

--
-- Table structure for table `donors`
--

CREATE TABLE `donors` (
  `donor_id` int(11) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `blood_type` varchar(10) DEFAULT NULL,
  `gender` varchar(10) DEFAULT NULL,
  `date_of_birth` date DEFAULT NULL,
  `age` int(11) DEFAULT NULL,
  `history` varchar(10) NOT NULL,
  `medical_conditions` varchar(100) NOT NULL,
  `any_procedure` varchar(100) NOT NULL,
  `medicine` varchar(100) NOT NULL,
  `remarks` varchar(100) NOT NULL,
  `date_of_registration` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` varchar(20) NOT NULL DEFAULT 'pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `donors`
--

INSERT INTO `donors` (`donor_id`, `name`, `email`, `phone`, `blood_type`, `gender`, `date_of_birth`, `age`, `history`, `medical_conditions`, `any_procedure`, `medicine`, `remarks`, `date_of_registration`, `status`) VALUES
(32, 'gcdydf', '2121280@ub.edu.ph', '09365445867', 'A+', 'Female', '2000-01-01', 24, 'Yes', 'ghc bcgcgc', 'Dental', 'Rabies', '', '2024-07-17 12:04:24', 'pending');

-- --------------------------------------------------------

--
-- Table structure for table `rejected_donors`
--

CREATE TABLE `rejected_donors` (
  `donor_id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `blood_type` varchar(10) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `date_of_birth` date NOT NULL,
  `age` int(11) NOT NULL,
  `history` varchar(10) NOT NULL,
  `medical_conditions` varchar(100) NOT NULL,
  `any_procedure` varchar(100) NOT NULL,
  `medicine` varchar(100) NOT NULL,
  `remarks` varchar(100) NOT NULL,
  `date_of_registration` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `rejected_donors`
--

INSERT INTO `rejected_donors` (`donor_id`, `name`, `email`, `phone`, `blood_type`, `gender`, `date_of_birth`, `age`, `history`, `medical_conditions`, `any_procedure`, `medicine`, `remarks`, `date_of_registration`) VALUES
(14, 'kyle', '2121280@ub.edu.ph', '345252', 'O+', 'Male', '2024-07-31', 23, '', '', '', '', '', '2024-07-08'),
(15, 'pedro', '2121280@ub.edu.ph', '09365445867', 'O+', 'Male', '2025-06-08', 29, '', '', '', '', '', '2024-07-08'),
(29, 'hsfdgsg', '2121280@ub.edu.ph', '09365445867', 'A-', 'Male', '2000-01-01', 21, 'Yes', 'sdfsFDsDf', 'Piercing', 'Antibiotics', '', '2024-07-15');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `adminlogin`
--
ALTER TABLE `adminlogin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `approved_donors`
--
ALTER TABLE `approved_donors`
  ADD PRIMARY KEY (`donor_id`);

--
-- Indexes for table `donors`
--
ALTER TABLE `donors`
  ADD PRIMARY KEY (`donor_id`);

--
-- Indexes for table `rejected_donors`
--
ALTER TABLE `rejected_donors`
  ADD PRIMARY KEY (`donor_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `adminlogin`
--
ALTER TABLE `adminlogin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `donors`
--
ALTER TABLE `donors`
  MODIFY `donor_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
