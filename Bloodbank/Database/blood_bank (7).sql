-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 10, 2023 at 06:24 PM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `blood_bank`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(50) NOT NULL,
  `A_name` varchar(50) NOT NULL,
  `A_password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `A_name`, `A_password`) VALUES
(5, 'Admin', '12345');

-- --------------------------------------------------------

--
-- Table structure for table `doctor`
--

CREATE TABLE `doctor` (
  `D_id` int(11) NOT NULL,
  `D_name` varchar(25) NOT NULL,
  `D_password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `doctor`
--

INSERT INTO `doctor` (`D_id`, `D_name`, `D_password`) VALUES
(2, 'doctor', '12345');

-- --------------------------------------------------------

--
-- Table structure for table `doctorbloodrequest`
--

CREATE TABLE `doctorbloodrequest` (
  `id` int(100) NOT NULL,
  `D_id` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `resion` varchar(100) NOT NULL,
  `P_diseas` varchar(50) NOT NULL,
  `unit` int(100) NOT NULL,
  `p_age` int(100) NOT NULL,
  `blood_types` varchar(100) NOT NULL,
  `Status` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `doctorbloodrequest`
--

INSERT INTO `doctorbloodrequest` (`id`, `D_id`, `name`, `resion`, `P_diseas`, `unit`, `p_age`, `blood_types`, `Status`) VALUES
(3, 2, 'suhait', 'fever', 'fever', 250, 23, ' B+', 0),
(4, 2, 'vimal', 'fever', 'fever', 250, 35, ' B-', 0),
(5, 2, 'kamal', 'dango', 'dango', 250, 25, ' O+', 1),
(6, 2, 'suhait', 'fever', 'fever', 250, 23, ' B-', 0),
(7, 2, 'akmal', 'fever', 'fever', 200, 25, ' A+', 0);

-- --------------------------------------------------------

--
-- Table structure for table `donate_blood`
--

CREATE TABLE `donate_blood` (
  `Donate_id` int(25) NOT NULL,
  `D_id` int(100) NOT NULL,
  `unit` int(50) NOT NULL,
  `date` date NOT NULL,
  `D_disease` varchar(50) NOT NULL,
  `Status` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `donate_blood`
--

INSERT INTO `donate_blood` (`Donate_id`, `D_id`, `unit`, `date`, `D_disease`, `Status`) VALUES
(32, 26, 200, '2022-12-08', 'no', '1');

-- --------------------------------------------------------

--
-- Table structure for table `donor`
--

CREATE TABLE `donor` (
  `D_id` int(25) NOT NULL,
  `D_fname` varchar(50) NOT NULL,
  `D_username` varchar(50) NOT NULL,
  `D_password` varchar(50) NOT NULL,
  `D_email` varchar(25) NOT NULL,
  `D_age` int(20) NOT NULL,
  `D_bloodtype` varchar(25) NOT NULL,
  `D_tel` int(50) NOT NULL,
  `D_address` varchar(50) NOT NULL,
  `resettoken` varchar(50) DEFAULT NULL,
  `resettokenexpaire` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `donor`
--

INSERT INTO `donor` (`D_id`, `D_fname`, `D_username`, `D_password`, `D_email`, `D_age`, `D_bloodtype`, `D_tel`, `D_address`, `resettoken`, `resettokenexpaire`) VALUES
(23, 'mouhammadu suhait', 'suhait123', 'Suhait123', 'suhaitsuhait58@gmail.com', 23, 'O+', 713150509, 'kallanchiyagama,kagama', NULL, NULL),
(26, 'Mouhammad suhait', 'suhait12', '12345', 'suhaitsuahit58@gmail.com', 23, 'A-', 711822375, 'kallanchiyagama,kagma', NULL, NULL),
(29, 'Mouhammad suhait', 'suhait12', '123456', 'nm.suhaitsuhait@gmail.com', 22, 'O+', 773150509, 'kallanchiyagama,kagma', 'd6a1920b5fa949fbb49dc1f88e6cd273', '2023-05-09'),
(30, 'zamrina', 'zamrina', '12345', 'zamrinafathimaa@gamil.com', 22, 'A-', 778585695, 'kandy', NULL, NULL),
(31, 'abc123', 'abcd', '12345', 'abc45@gmail.com', 22, 'A-', 1234567890, 'kandy', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `donorblood_request`
--

CREATE TABLE `donorblood_request` (
  `p_id` int(25) NOT NULL,
  `donor_id` int(100) NOT NULL,
  `P_name` varchar(50) NOT NULL,
  `reasion` varchar(50) NOT NULL,
  `disease` varchar(50) NOT NULL,
  `unit` varchar(25) NOT NULL,
  `age` varchar(50) NOT NULL,
  `bloodtype` varchar(25) NOT NULL,
  `Status` int(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `donorblood_request`
--

INSERT INTO `donorblood_request` (`p_id`, `donor_id`, `P_name`, `reasion`, `disease`, `unit`, `age`, `bloodtype`, `Status`) VALUES
(14, 26, ' akther', ' fever', 'fever', '100', '23', ' B-', 1);

-- --------------------------------------------------------

--
-- Table structure for table `hospital`
--

CREATE TABLE `hospital` (
  `H_id` int(25) NOT NULL,
  `H_name` varchar(50) NOT NULL,
  `H_username` varchar(50) NOT NULL,
  `H_password` varchar(50) NOT NULL,
  `H_mail` varchar(50) NOT NULL,
  `H_tel` varchar(25) NOT NULL,
  `H_address` varchar(50) NOT NULL,
  `resettoken` varchar(50) DEFAULT NULL,
  `resettokenexpaire` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `hospital`
--

INSERT INTO `hospital` (`H_id`, `H_name`, `H_username`, `H_password`, `H_mail`, `H_tel`, `H_address`, `resettoken`, `resettokenexpaire`) VALUES
(7, 'senapura hospital', 'senapura', '1234', 'suhaitsuahit@gmail.com', ' 0713150509', 'kagama', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `patient`
--

CREATE TABLE `patient` (
  `paitent_id` int(25) NOT NULL,
  `Hospital_id` int(100) NOT NULL,
  `paitent_name` varchar(50) NOT NULL,
  `paitent_reasion` varchar(50) NOT NULL,
  `paitent_diseas` varchar(50) NOT NULL,
  `paitent_age` int(50) NOT NULL,
  `paitent_blood` varchar(25) NOT NULL,
  `paitent_unit` varchar(25) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `patient`
--

INSERT INTO `patient` (`paitent_id`, `Hospital_id`, `paitent_name`, `paitent_reasion`, `paitent_diseas`, `paitent_age`, `paitent_blood`, `paitent_unit`, `status`) VALUES
(12, 7, 'vimal', 'accident', 'accident', 23, 'O-', '100', 1),
(16, 7, 'vimal', 'fever', 'fever', 23, 'B-', '100', 0),
(21, 7, 'vimal', 'fever', 'fever', 23, 'O+ ', '100', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `doctor`
--
ALTER TABLE `doctor`
  ADD PRIMARY KEY (`D_id`);

--
-- Indexes for table `doctorbloodrequest`
--
ALTER TABLE `doctorbloodrequest`
  ADD PRIMARY KEY (`id`),
  ADD KEY `D_id` (`D_id`);

--
-- Indexes for table `donate_blood`
--
ALTER TABLE `donate_blood`
  ADD PRIMARY KEY (`Donate_id`),
  ADD KEY `D_id` (`D_id`);

--
-- Indexes for table `donor`
--
ALTER TABLE `donor`
  ADD PRIMARY KEY (`D_id`);

--
-- Indexes for table `donorblood_request`
--
ALTER TABLE `donorblood_request`
  ADD PRIMARY KEY (`p_id`),
  ADD KEY `donor_id` (`donor_id`);

--
-- Indexes for table `hospital`
--
ALTER TABLE `hospital`
  ADD PRIMARY KEY (`H_id`);

--
-- Indexes for table `patient`
--
ALTER TABLE `patient`
  ADD PRIMARY KEY (`paitent_id`),
  ADD KEY `Hospital_id` (`Hospital_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `doctor`
--
ALTER TABLE `doctor`
  MODIFY `D_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `doctorbloodrequest`
--
ALTER TABLE `doctorbloodrequest`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `donate_blood`
--
ALTER TABLE `donate_blood`
  MODIFY `Donate_id` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `donor`
--
ALTER TABLE `donor`
  MODIFY `D_id` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `donorblood_request`
--
ALTER TABLE `donorblood_request`
  MODIFY `p_id` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `hospital`
--
ALTER TABLE `hospital`
  MODIFY `H_id` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `patient`
--
ALTER TABLE `patient`
  MODIFY `paitent_id` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `doctorbloodrequest`
--
ALTER TABLE `doctorbloodrequest`
  ADD CONSTRAINT `doctorbloodrequest_ibfk_1` FOREIGN KEY (`D_id`) REFERENCES `doctor` (`D_id`);

--
-- Constraints for table `donate_blood`
--
ALTER TABLE `donate_blood`
  ADD CONSTRAINT `donate_blood_ibfk_1` FOREIGN KEY (`D_id`) REFERENCES `donor` (`D_id`);

--
-- Constraints for table `donorblood_request`
--
ALTER TABLE `donorblood_request`
  ADD CONSTRAINT `donorblood_request_ibfk_1` FOREIGN KEY (`donor_id`) REFERENCES `donor` (`D_id`);

--
-- Constraints for table `patient`
--
ALTER TABLE `patient`
  ADD CONSTRAINT `patient_ibfk_1` FOREIGN KEY (`Hospital_id`) REFERENCES `hospital` (`H_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
