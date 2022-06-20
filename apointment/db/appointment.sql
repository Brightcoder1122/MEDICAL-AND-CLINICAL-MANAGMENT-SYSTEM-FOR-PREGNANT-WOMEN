-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 18, 2021 at 11:59 AM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.1.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `appointment`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_appointment`
--

CREATE TABLE `tbl_appointment` (
  `opp_id` int(11) NOT NULL,
  `patient` int(11) NOT NULL,
  `doctor` int(11) DEFAULT NULL,
  `status` varchar(12) NOT NULL DEFAULT 'not saved',
  `reporting_date` date NOT NULL,
  `date_requested` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_appointment`
--

INSERT INTO `tbl_appointment` (`opp_id`, `patient`, `doctor`, `status`, `reporting_date`, `date_requested`) VALUES
(15018042, 3, 6, 'not saved', '2021-09-18', '2021-09-18 12:01:21'),
(27991635, 1, 6, 'not saved', '2021-09-25', '2021-09-18 12:00:23'),
(39036702, 1, 6, 'saved', '2021-09-17', '2021-09-17 22:10:27'),
(47857823, 1, 6, 'saved', '2021-09-18', '2021-09-18 12:00:24'),
(49760479, 2, 6, 'not saved', '2021-09-18', '2021-09-17 22:07:54');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_clinic`
--

CREATE TABLE `tbl_clinic` (
  `clinic_id` int(11) NOT NULL,
  `appointment` int(11) NOT NULL,
  `treated_by` int(11) NOT NULL,
  `problem` text NOT NULL,
  `comment` text NOT NULL,
  `medicin_given` text NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_clinic`
--

INSERT INTO `tbl_clinic` (`clinic_id`, `appointment`, `treated_by`, `problem`, `comment`, `medicin_given`, `created_date`) VALUES
(42404, 39036702, 6, 'Nothing', 'Nothing', 'nothong', '2021-09-17 19:10:27'),
(668136, 47857823, 6, 'Goooo', 'Home', 'Panadal', '2021-09-18 09:00:23');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_patient`
--

CREATE TABLE `tbl_patient` (
  `patient_id` int(11) NOT NULL,
  `fname` varchar(30) NOT NULL,
  `mname` varchar(30) DEFAULT NULL,
  `lname` varchar(30) NOT NULL,
  `sex` char(1) NOT NULL,
  `phone` bigint(20) NOT NULL,
  `address1` varchar(30) NOT NULL,
  `address2` varchar(30) DEFAULT NULL,
  `password` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_patient`
--

INSERT INTO `tbl_patient` (`patient_id`, `fname`, `mname`, `lname`, `sex`, `phone`, `address1`, `address2`, `password`) VALUES
(1, 'Mercy', '', 'Komba', 'f', 762506012, 'mzumbe', 'mzumbe', '25d55ad283aa400af464c76d713c07ad'),
(2, 'Fredrick ', 'Mwakalundwa', 'Brighton', 'f', 747184694, 'Dodoma', 'Dodoma', ''),
(3, 'Gaudencia', 'Nani', 'Mwakapuku', 'f', 717330639, 'mzumbe', 'mzumbe', '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_reminder`
--

CREATE TABLE `tbl_reminder` (
  `reminder_id` int(11) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_reminder`
--

INSERT INTO `tbl_reminder` (`reminder_id`, `date`) VALUES
(14, '2021-09-15');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `user_id` int(11) NOT NULL,
  `fname` varchar(30) NOT NULL,
  `mname` varchar(30) DEFAULT NULL,
  `lname` varchar(30) NOT NULL,
  `sex` char(1) NOT NULL,
  `phone` bigint(20) NOT NULL,
  `email` varchar(30) NOT NULL,
  `active` int(11) NOT NULL,
  `type` varchar(10) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`user_id`, `fname`, `mname`, `lname`, `sex`, `phone`, `email`, `active`, `type`, `username`, `password`) VALUES
(3, 'manya', 'Ndiku', 'Komba', 'm', 762506012, 'luggiestar@gmail.com', 1, 'admin', 'Ndiku', '3b712de48137572f3849aabd5666a4e3'),
(4, 'Kivari', 'Sinzota', 'Komba', 'm', 762506012, 'kivaria@gmail.com', 1, 'doctor', 'luggie', '25d55ad283aa400af464c76d713c07ad'),
(6, 'luggie', 'luggie', 'mwakapuku', 'M', 762506012, 'luggiestar@gmail.com', 1, 'admin', 'luggiestar', '3b712de48137572f3849aabd5666a4e3');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_appointment`
--
ALTER TABLE `tbl_appointment`
  ADD PRIMARY KEY (`opp_id`),
  ADD KEY `patientFK` (`patient`),
  ADD KEY `doctorFK` (`doctor`);

--
-- Indexes for table `tbl_clinic`
--
ALTER TABLE `tbl_clinic`
  ADD PRIMARY KEY (`clinic_id`),
  ADD KEY `appointmentFKClinic` (`appointment`),
  ADD KEY `DoctorClinicFK` (`treated_by`);

--
-- Indexes for table `tbl_patient`
--
ALTER TABLE `tbl_patient`
  ADD PRIMARY KEY (`patient_id`);

--
-- Indexes for table `tbl_reminder`
--
ALTER TABLE `tbl_reminder`
  ADD PRIMARY KEY (`reminder_id`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_appointment`
--
ALTER TABLE `tbl_appointment`
  MODIFY `opp_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49760480;

--
-- AUTO_INCREMENT for table `tbl_clinic`
--
ALTER TABLE `tbl_clinic`
  MODIFY `clinic_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=668137;

--
-- AUTO_INCREMENT for table `tbl_patient`
--
ALTER TABLE `tbl_patient`
  MODIFY `patient_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_reminder`
--
ALTER TABLE `tbl_reminder`
  MODIFY `reminder_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_appointment`
--
ALTER TABLE `tbl_appointment`
  ADD CONSTRAINT `doctorFK` FOREIGN KEY (`doctor`) REFERENCES `tbl_user` (`user_id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `patientFK` FOREIGN KEY (`patient`) REFERENCES `tbl_patient` (`patient_id`) ON UPDATE CASCADE;

--
-- Constraints for table `tbl_clinic`
--
ALTER TABLE `tbl_clinic`
  ADD CONSTRAINT `DoctorClinicFK` FOREIGN KEY (`treated_by`) REFERENCES `tbl_user` (`user_id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `appointmentFKClinic` FOREIGN KEY (`appointment`) REFERENCES `tbl_appointment` (`opp_id`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
