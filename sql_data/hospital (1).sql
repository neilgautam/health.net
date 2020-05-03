-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 03, 2020 at 03:47 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.2.28

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
  `admin_password` longtext DEFAULT NULL,
  `name` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `adminloginrecord`
--

INSERT INTO `adminloginrecord` (`user_id`, `admin_password`, `name`) VALUES
(1, '123', 'Navdeep');

-- --------------------------------------------------------

--
-- Table structure for table `appointment`
--

CREATE TABLE `appointment` (
  `appoint_id` int(11) NOT NULL,
  `doctor_id` int(11) NOT NULL,
  `patient_id` varchar(11) NOT NULL,
  `doc_name` varchar(100) NOT NULL,
  `department` varchar(25) DEFAULT NULL,
  `description` text NOT NULL,
  `appointment_time` time NOT NULL,
  `appointment_date` date DEFAULT NULL,
  `status` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `appointment`
--

INSERT INTO `appointment` (`appoint_id`, `doctor_id`, `patient_id`, `doc_name`, `department`, `description`, `appointment_time`, `appointment_date`, `status`) VALUES
(9, 13, 'kapil', 'Suresh Chaudhary', 'opthalomogist', 'check eyesight', '23:59:00', '2020-05-15', 'Confirmed'),
(10, 13, 'kapil', 'Suresh Chaudhary', 'opthalomogist', 'check eyesight', '00:00:00', '2020-06-12', 'Cancelled'),
(15, 18, 'prads', 'Samarth  Saxena', 'General Physician', 'Severe Problem in Head(Feeling pain for two days)', '00:00:00', '2020-05-04', 'Pending'),
(16, 18, 'navs', 'Samarth  Saxena', 'None', 'Regular Appointment', '00:00:00', '2020-05-07', 'Pending'),
(18, 24, 'nayeer', 'Sharad Maheshwari', 'Pediatrics', 'Regular Checkup', '00:00:00', '2020-05-05', 'Pending'),
(19, 24, 'garu', 'Sharad Maheshwari', 'Pediatrics', 'Routine Checkup', '08:00:00', '2020-05-07', 'Confirmed'),
(20, 24, 'rohan', 'Sharad Maheshwari', 'Pediatrics', '------', '00:00:00', '2020-05-14', 'Pending'),
(21, 19, 'garu', 'Sakshi  Jindal', 'Opthalomogist', 'eyesight checkup', '16:00:00', '2020-05-02', 'Confirmed'),
(22, 19, 'garu', 'Sakshi  Jindal', 'Opthalomogist', 'regular checkup', '00:00:00', '2020-05-20', 'Pending'),
(23, 19, 'garu', 'Sakshi  Jindal', 'Opthalomogist', 'regular checkup', '00:00:00', '2020-05-21', 'Pending'),
(24, 19, 'garu', 'Sakshi  Jindal', 'Opthalomogist', 'regular checkup', '00:00:00', '2020-05-21', 'Pending'),
(25, 19, 'garu', 'Sakshi  Jindal', 'Opthalomogist', 'regular checkup', '00:00:00', '2020-05-21', 'Pending'),
(26, 24, 'garu', 'Sharad Maheshwari', 'Pediatrics', 'regular checkup', '00:00:00', '2020-05-09', 'Pending');

-- --------------------------------------------------------

--
-- Table structure for table `diagnosis`
--

CREATE TABLE `diagnosis` (
  `patient_id` varchar(11) DEFAULT NULL,
  `medicine_prescribed` text NOT NULL,
  `appoint_id` int(11) NOT NULL,
  `prescribed_tests` text DEFAULT NULL,
  `observation_comments` text DEFAULT NULL,
  `disease` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `diagnosis`
--

INSERT INTO `diagnosis` (`patient_id`, `medicine_prescribed`, `appoint_id`, `prescribed_tests`, `observation_comments`, `disease`) VALUES
('garu', 'vitamin-d, detroxin', 19, 'x ray', '', ''),
('garu', 'hydrotears', 21, 'eye sight', 'left eye 0.5', '');

-- --------------------------------------------------------

--
-- Table structure for table `doctorsrecord`
--

CREATE TABLE `doctorsrecord` (
  `doc_password` text NOT NULL,
  `doctor_first_name` text NOT NULL,
  `doctor_last_name` text NOT NULL,
  `department` text NOT NULL,
  `speciality` text NOT NULL,
  `date_of_join` date NOT NULL,
  `sex` varchar(10) DEFAULT NULL,
  `email` varchar(30) DEFAULT NULL,
  `contact` varchar(10) DEFAULT NULL,
  `doctor_id` int(11) NOT NULL,
  `address` varchar(300) DEFAULT NULL,
  `date_of_birth` date DEFAULT NULL,
  `salary` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `doctorsrecord`
--

INSERT INTO `doctorsrecord` (`doc_password`, `doctor_first_name`, `doctor_last_name`, `department`, `speciality`, `date_of_join`, `sex`, `email`, `contact`, `doctor_id`, `address`, `date_of_birth`, `salary`) VALUES
('123', 'Neil ', 'Gautam', 'Neuroanat', 'Neuro', '2017-03-19', 'male', 'gautamneil@gmail.com', '9273843927', 12, 'Shahdara', '1990-04-24', '10000000'),
('123', 'Suresh', 'Chaudhary', 'Opthalomogist', 'Eye', '2000-10-13', 'male', 'Suresh@gmail.com', '8236746587', 13, 'Dilshad Garden', '1987-09-23', '2500000'),
('12345', 'yashvi', 'dagar', 'ENT', 'Eye', '2010-10-03', 'female', 'YASHVI@gamil.com', '7065162112', 14, 'dwarka, delhi', '1991-11-13', '90000'),
('123', 'Rakesh ', 'Sharma', 'Pediatrics', 'Child Medicine', '2000-10-13', 'male', 'Rakesh@gmail.com', '9273843323', 15, 'Malviya Nagar', '1967-12-03', '1500000'),
('123', 'Neelaksh ', 'Dev Jayant', 'Endocrinology ', 'Hormornes', '2017-03-01', 'male', 'neelaksh@gmail.com', '9067845348', 16, 'Kaushambi,Ghaziabad ,UP', '1992-10-12', '678000'),
('123', 'Lavanya', 'Nambissan', 'Community Medicine', 'General Medicine', '2018-10-01', 'female', 'lavanya.nam23@hospital.edu', '8756983432', 17, 'Dilshad Garden', '1994-12-06', '1289000'),
('12345', 'Samarth ', 'Saxena', 'General Physician', 'Medicine', '2015-12-18', 'male', 'samarth@hospital.com', '987654321', 18, 'Mayur Vihar ,Phase 3', '1984-12-09', '1289238'),
('123', 'Sakshi ', 'Jindal', 'Opthalomogist', 'EYE', '2011-05-10', 'female', 'sakshi@hospital.com', '7534971109', 19, 'Gaur City', '1981-10-07', '1500000'),
('123', 'Madhulika', 'Monga', 'Neurology ', 'Behavioural Science', '2011-12-15', 'female', 'madhulika@gmai.com', '1934827492', 20, 'Chandigarh', '1978-11-14', '1000000'),
('12345', 'Neera ', 'Aggarwal', 'Gynaecology', 'Maternal and child health', '2003-10-07', 'female', 'drneera@yahoo.com', '8901234671', 21, 'kalkaji, new delhi', '1968-03-21', '500000'),
('12345', 'charu', 'garg', 'Gynaecology', 'Gynaecology and Thoracic Oncology', '2010-09-11', 'female', 'garg1990@gmail.com', '8716532167', 22, 'patparganj, new delhi', '1978-07-19', '97000'),
('12345', 'Arjun', 'Dass', 'ENT', 'Head & Neck Oncology', '2003-10-03', 'male', 'arjun@gmail.com', '9876132456', 23, 'kochi, kerela', '1983-08-07', '300000'),
('123', 'Sharad', 'Maheshwari', 'Pediatrics', 'Pediatric Allergies and Pulmonology', '2013-04-22', 'male', 'sharad@gmail.com', '8789564239', 24, 'Delhi ', '1968-10-27', '1500000'),
('123', 'Preeti ', 'Anand', 'Pediatrics', 'Pediatric Intensive Care, Neonatal And Paediatric Bronchoscopy', '2015-04-28', 'female', 'preeeti@hospital.com', '9880893782', 25, 'Delhi ,110092', '1988-12-11', '1847493'),
('123', 'Rajiv', 'Uttam', 'Neuroanat', 'Neonatal Intensive Care', '2009-11-15', 'male', 'rajivutt@gmail.edu', '9836493738', 26, 'Kochi,Karnataka', '1979-01-09', '2600000'),
('123', 'Poonam', 'Sidana', 'Neuroanat', 'Management of ELBW (Extremely low birth weight) and premature babies', '2013-01-03', 'female', 'poonamsidana@hospital.edu', '9876563497', 27, '-------', '1980-03-29', '3300000'),
('123', 'Sumit', 'Dutta', 'Dental Care', 'He is a Dental Surgeon & Orthodontist who Specialises in the treatment of various Dental diseases including irregularly placed or malaligned teeth. His area of special interest is Dental Cosmetics done by Braces treatment.', '2008-04-12', 'male', 'sumit_datta@gmail.com', '8436820934', 28, 'Graphine Apartments,Mayur Vihar', '1976-06-06', '3500000'),
('123', 'Smriti', 'Bouri', 'Dental Care', 'Cardiodontics', '2012-02-02', 'female', 'bouri@gmail.com', '8894628369', 29, 'Delhi,', '1989-02-27', '1989000');

-- --------------------------------------------------------

--
-- Table structure for table `patientlogin`
--

CREATE TABLE `patientlogin` (
  `password` longtext NOT NULL,
  `first_name` text NOT NULL,
  `last_name` text NOT NULL,
  `age` int(3) NOT NULL,
  `sex` varchar(4) DEFAULT NULL,
  `address` longtext DEFAULT NULL,
  `email` text DEFAULT NULL,
  `contact` bigint(11) NOT NULL,
  `patient_id` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `patientlogin`
--

INSERT INTO `patientlogin` (`password`, `first_name`, `last_name`, `age`, `sex`, `address`, `email`, `contact`, `patient_id`) VALUES
('$2y$10$rfcO3lbuTXTz2NaZzDxcg.a58dajKYNNj0sNkV8quY72e0.EO.5mG', 'Dhruv', 'Chandel', 43, 'male', 'Rohini', 'dcW@gmail.com', 7816358762, '7252'),
('$2y$10$4IOyFgTC5DNRmy3cYc3LEOCy6rP0hP5Z3/aWocaDJ7z5pAcByEOB.', 'Rishabh', 'Chawla', 42, 'male', 'house no. 194, Uprahi Mohalla, near mahal\r\nV.P.O mahipalpur', 'rishabh@gmail.com', 9897564518, '9786'),
('$2y$10$pn8H/vd6hvuG.a8tnkKD9.JuM4ERXrnqYTiyg/OFNs9hcqKkk.7H6', 'garima', 'singh', 24, 'fema', 'dwarka sec-8 , new delhi', 'gariam@gmail.com', 9981233677, 'garu'),
('$2y$10$UpM0Gx54wGl6Fmmp69oDzOJdl9MvA1bJpQlAtnn067T09Q2uA99Y.', 'kunal ', 'gaur', 35, 'male', 'mahipalpur, new delhi', 'kapi12@gmail.com', 8711234517, 'kapil'),
('$2y$10$UU1QJSb.pmQDj9dwbPs4COTbUA7VvHP2IeXEL9dotSdiZ63vCPFuu', 'Kartik', 'Bansal', 89, 'male', 'Pitampura', 'kartikbans@gmail.com', 892366482, 'kartik12'),
('$2y$10$MICalS.OV/xJ/Dwt7b5lCeDcgBUyBiBYiPN0uCFbab0pgxmnBtSBC', 'naman ', 'aggarwal', 21, 'male', 'chattarpur, new delhi', 'naman1945@gmail.com', 9871563321, 'naman'),
('$2y$10$B8lScNQvyDq2pevCkVK7YOYV/BX0sBxxuBCJSBDEKtGGhvvMH.12S', 'Navdeep ', 'Sehrawat', 91, 'male', 'Aerocity', 'navdeep@gmail.com', 9023673467, 'navs'),
('$2y$10$0k0y7vUpKeiF0HA14H2yx.QhmXUN706ooXzphHYYX6OLiA8UvNnk6', 'Nayeer', 'Camal', 35, 'male', 'Mozambica', 'nayeer@gmail.com', 7823548875, 'nayeer'),
('$2y$10$s4WS4tCdP8n4H2ULZ62yku4uL8GoAFwSpn6sNo.DfFtKBwxDVd1Ju', 'Joaquin', 'Phoneix', 71, 'male', 'Toronto', 'phoenix@gmail.com', 7858650978, 'phoneix'),
('$2y$10$MpYXABu3VdpSH7RR83/ij.E8PMGZ/EysIoG.eYXKKtLViFzXUViAW', 'Pradyuman', 'Aggarwal', 22, 'male', 'Rewari', 'pradyuman@gmail.com', 9073618631, 'prads'),
('$2y$10$Xmo24eP2NtUGJ7Vl1OI5.u2IWqohLutGDImNadqsEi7HIcNGRrXX2', 'rohan', 'joshi', 29, 'male', 'gurugram', 'ro19@gmail.com', 7061542139, 'rohan'),
('$2y$10$jRxbQjV2EY125mHUWE.ycOIdOGRSoKjH42rgdDyCqf9bc0GXJ41Zm', 'Smruti', 'Sharma', 53, 'fema', 'Bengal', 'smruti@hospital.com', 12423443453, 'smru8264');

-- --------------------------------------------------------

--
-- Table structure for table `prescribed_tests`
--

CREATE TABLE `prescribed_tests` (
  `appoint_id` int(11) NOT NULL,
  `test_name` varchar(50) NOT NULL,
  `date` date NOT NULL,
  `suspected_disease` varchar(50) NOT NULL
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
-- Indexes for table `appointment`
--
ALTER TABLE `appointment`
  ADD PRIMARY KEY (`appoint_id`),
  ADD KEY `fkeydocid` (`doctor_id`),
  ADD KEY `fkeypatientid` (`patient_id`);

--
-- Indexes for table `diagnosis`
--
ALTER TABLE `diagnosis`
  ADD KEY `k` (`appoint_id`);

--
-- Indexes for table `doctorsrecord`
--
ALTER TABLE `doctorsrecord`
  ADD PRIMARY KEY (`doctor_id`);

--
-- Indexes for table `patientlogin`
--
ALTER TABLE `patientlogin`
  ADD PRIMARY KEY (`patient_id`);

--
-- Indexes for table `prescribed_tests`
--
ALTER TABLE `prescribed_tests`
  ADD KEY `ke` (`appoint_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `appointment`
--
ALTER TABLE `appointment`
  MODIFY `appoint_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `doctorsrecord`
--
ALTER TABLE `doctorsrecord`
  MODIFY `doctor_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `appointment`
--
ALTER TABLE `appointment`
  ADD CONSTRAINT `fkeydocid` FOREIGN KEY (`doctor_id`) REFERENCES `doctorsrecord` (`doctor_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fkeypatientid` FOREIGN KEY (`patient_id`) REFERENCES `patientlogin` (`patient_id`) ON UPDATE CASCADE;

--
-- Constraints for table `diagnosis`
--
ALTER TABLE `diagnosis`
  ADD CONSTRAINT `k` FOREIGN KEY (`appoint_id`) REFERENCES `appointment` (`appoint_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `prescribed_tests`
--
ALTER TABLE `prescribed_tests`
  ADD CONSTRAINT `ke` FOREIGN KEY (`appoint_id`) REFERENCES `appointment` (`appoint_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
