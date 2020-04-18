-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 18, 2020 at 11:25 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hospital`
--

-- --------------------------------------------------------

--
-- Table structure for table `adminloginrecord`
--

CREATE TABLE `adminloginrecord` (
  `user_id` int(15) NOT NULL,
  `admin_password` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `doctorsrecord`
--

CREATE TABLE `doctorsrecord` (
  `doctor_id` int(11) NOT NULL,
  `doc_password` text NOT NULL,
  `doctor_first_name` text NOT NULL,
  `doctor_last_name` text NOT NULL,
  `department` text NOT NULL,
  `speciality` text NOT NULL,
  `date_of_join` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `doctors_schedule`
--

CREATE TABLE `doctors_schedule` (
  `doctor_id` int(11) NOT NULL,
  `appointed_with_id` int(11) NOT NULL,
  `appointment_time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `medicine_prescription`
--

CREATE TABLE `medicine_prescription` (
  `patient_id` int(11) NOT NULL,
  `medicine_prescribed` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `patientlogin`
--

CREATE TABLE `patientlogin` (
  `signupid` int(10) NOT NULL,
  `password` text NOT NULL,
  `first_name` text NOT NULL,
  `last_name` text NOT NULL,
  `age` int(3) NOT NULL,
  `appointment_type` text NOT NULL,
  `appointment_with` text NOT NULL,
  `doc_id` int(11) DEFAULT NULL,
  `patient_case_status` text DEFAULT 'under_treatment'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `recordfillupbydoc`
--

CREATE TABLE `recordfillupbydoc` (
  `doc_id` int(11) NOT NULL,
  `patient_id` int(11) NOT NULL,
  `patient_name` text NOT NULL,
  `patient_age` int(11) NOT NULL,
  `diagnosis_deduction` text NOT NULL,
  `next_appointment` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `test_prescribed`
--

CREATE TABLE `test_prescribed` (
  `patient_id` int(11) NOT NULL,
  `tests` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `adminloginrecord`
--
ALTER TABLE `adminloginrecord`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `doctorsrecord`
--
ALTER TABLE `doctorsrecord`
  ADD PRIMARY KEY (`doctor_id`);

--
-- Indexes for table `patientlogin`
--
ALTER TABLE `patientlogin`
  ADD PRIMARY KEY (`signupid`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
