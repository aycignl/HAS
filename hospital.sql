-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 17, 2017 at 01:12 PM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 5.6.30

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

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `future_appointment` (IN `branch` VARCHAR(50))  NO SQL
IF (branch = 'ALL') THEN
    SELECT Appointment.*, Doctor.branch, Branches.name FROM Appointment, Doctor, Branches WHERE Appointment.date > CURRENT_DATE AND  Appointment.doctor_id = Doctor.id AND Doctor.branch = Branches.name;
ELSE
    SELECT Appointment.*, Doctor.branch, Branches.name FROM Appointment, Doctor, Branches WHERE Appointment.doctor_id = Doctor.id AND Appointment.date > CURRENT_DATE AND Doctor.branch = Branches.name AND Branches.name = branch;
END IF$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `past_appointment` (IN `branch` VARCHAR(50))  NO SQL
IF (branch = 'ALL') THEN
    SELECT Appointment.*, Doctor.branch, Branches.name FROM Appointment, Doctor, Branches WHERE Appointment.date < CURRENT_DATE AND  Appointment.doctor_id = Doctor.id AND Doctor.branch = Branches.name;
ELSE
    SELECT Appointment.*, Doctor.branch, Branches.name FROM Appointment, Doctor, Branches WHERE Appointment.doctor_id = Doctor.id AND Appointment.date < CURRENT_DATE AND Doctor.branch = Branches.name AND Branches.name = branch;
END IF$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `Admins`
--

CREATE TABLE `Admins` (
  `id` int(11) NOT NULL,
  `fname` varchar(15) NOT NULL,
  `lname` varchar(15) NOT NULL,
  `password` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Admins`
--

INSERT INTO `Admins` (`id`, `fname`, `lname`, `password`) VALUES
(1, 'gnl', 'ayci', '54321');

-- --------------------------------------------------------

--
-- Table structure for table `Appointment`
--

CREATE TABLE `Appointment` (
  `id` int(11) NOT NULL,
  `date` date NOT NULL,
  `doctor_id` int(11) NOT NULL,
  `patient_id` int(11) NOT NULL,
  `hour` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Appointment`
--

INSERT INTO `Appointment` (`id`, `date`, `doctor_id`, `patient_id`, `hour`) VALUES
(6, '2017-01-02', 3, 1, 1),
(9, '2017-01-01', 3, 3, 0),
(10, '2017-07-27', 6, 3, 48);

-- --------------------------------------------------------

--
-- Table structure for table `Branches`
--

CREATE TABLE `Branches` (
  `id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Branches`
--

INSERT INTO `Branches` (`id`, `name`) VALUES
(1, 'pediatry'),
(2, 'dermatology'),
(3, 'neurology'),
(5, 'internal');

-- --------------------------------------------------------

--
-- Table structure for table `Doctor`
--

CREATE TABLE `Doctor` (
  `id` int(11) NOT NULL,
  `fname` varchar(15) NOT NULL,
  `lname` varchar(15) NOT NULL,
  `branch` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Doctor`
--

INSERT INTO `Doctor` (`id`, `fname`, `lname`, `branch`) VALUES
(3, 'nadin', 'kokciyan', 'neurology'),
(4, 'yigit', 'yildirim', 'pediatry'),
(6, 'cagil', 'ulusahin', 'internal'),
(10, 'okan ', 'asik', 'dermatology');

--
-- Triggers `Doctor`
--
DELIMITER $$
CREATE TRIGGER `trigger` AFTER DELETE ON `Doctor` FOR EACH ROW DELETE FROM Appointment WHERE doctor_id = OLD.id AND date > CURRENT_DATE
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `Patient`
--

CREATE TABLE `Patient` (
  `id` int(11) NOT NULL,
  `fname` varchar(15) NOT NULL,
  `lname` varchar(15) NOT NULL,
  `password` varchar(15) NOT NULL,
  `Username` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Patient`
--

INSERT INTO `Patient` (`id`, `fname`, `lname`, `password`, `Username`) VALUES
(1, 'mert', 'tiftikci', '12345', 'mert'),
(3, 'binnur', 'gorer', '12345', 'binnur'),
(5, 'hakime', 'ozturk', '12345', 'hakime'),
(9, 'goksu ', 'ozturk', '12345', 'goksu'),
(10, 'fnamex', 'lnamex', '12345', 'deneme'),
(11, 'can ', 'kurtan', '12345', 'can');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Admins`
--
ALTER TABLE `Admins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `Appointment`
--
ALTER TABLE `Appointment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `Branches`
--
ALTER TABLE `Branches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `Doctor`
--
ALTER TABLE `Doctor`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `Patient`
--
ALTER TABLE `Patient`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `Username` (`Username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Admins`
--
ALTER TABLE `Admins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `Appointment`
--
ALTER TABLE `Appointment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `Branches`
--
ALTER TABLE `Branches`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `Doctor`
--
ALTER TABLE `Doctor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `Patient`
--
ALTER TABLE `Patient`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
