-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 19, 2019 at 01:26 PM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 7.1.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `login`
--

-- --------------------------------------------------------

--
-- Table structure for table `alumni`
--

CREATE TABLE `alumni` (
  `username` varchar(100) NOT NULL,
  `lastName` varchar(200) NOT NULL,
  `gender` varchar(8) NOT NULL,
  `rollno` bigint(20) NOT NULL,
  `email` varchar(200) NOT NULL,
  `avatar` varchar(3000) NOT NULL,
  `bday` date DEFAULT NULL,
  `grad` date DEFAULT NULL,
  `course` varchar(120) NOT NULL,
  `passcode` varchar(100) DEFAULT NULL,
  `hashing` varchar(64) NOT NULL,
  `active` int(2) NOT NULL DEFAULT '0',
  `Address` varchar(1000) DEFAULT NULL,
  `achievements` varchar(2000) DEFAULT NULL,
  `job` varchar(100) DEFAULT NULL,
  `higherStudies` varchar(2000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `alumni`
--

INSERT INTO `alumni` (`username`, `lastName`, `gender`, `rollno`, `email`, `avatar`, `bday`, `grad`, `course`, `passcode`, `hashing`, `active`, `Address`, `achievements`, `job`, `higherStudies`) VALUES
('Aghamarsh', 'V', 'M', 100516733040, 'aghamarshv.be20@uceou.edu', 'male.jpg', '1998-12-31', '2018-10-11', 'BE', '794fd8df6686e85e0d8345670d2cd4ae', '1ecfb463472ec9115b10c292ef8bc986', 0, '', '', '', ''),
('Anushka', 'Shetty', 'F', 100516733040, 'anu@gmail.com', 'j1.jpeg', '1999-09-08', '2018-11-11', 'BE', 'd54d1702ad0f8326224b817c796763c9', '', 0, '', '', '', ''),
('aSFSHE', 'kasbcak', '0', 100516733047, 'ayman@gmail.com', 'male.jpg', '1998-08-08', '2018-08-01', 'BE', 'd54d1702ad0f8326224b817c796763c9', 'a1140a3d0df1c81e24ae954d935e8926', 1, '', '', '', ''),
('Ayman', 'Nazeer', 'M', 100516733049, 'aymana.be20@uceou.edu', 'male.jpg', '1998-01-09', '2018-08-08', 'BE', 'f5bb0c8de146c67b44babbf4e6584cc0', '81448138f5f163ccdba4acc69819f280', 0, '', '', '', ''),
('KRITHIKA', 'BITLA', 'F', 100516733006, 'krithika99.bitla@gmail.com', 'j2.jpeg', '1999-02-25', '2018-11-11', 'BE', '25d55ad283aa400af464c76d713c07ad', '0a09c8844ba8f0936c20bd791130d6b6', 1, '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `contactus`
--

CREATE TABLE `contactus` (
  `Sno` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `phone` bigint(10) NOT NULL,
  `message` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contactus`
--

INSERT INTO `contactus` (`Sno`, `name`, `email`, `phone`, `message`) VALUES
(1, 'Ayman Nazeer', 'atr@m.com', 9988776655, 'hello'),
(2, 'Aghamarsh', 'abc@ab.com', 12345678990, 'Hello,\r\nI want to join the alumni association , plz help me out.\r\n'),
(3, 'oishiq', 'oishiq@gmail.com', 7894561230, 'hello'),
(4, 'Aghamarsh', 'aghamarsh8@gmail.com', 1234, 'asjdgis');

-- --------------------------------------------------------

--
-- Table structure for table `reportuser`
--

CREATE TABLE `reportuser` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `rollno` bigint(15) NOT NULL,
  `message` varchar(2000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `reportuser`
--

INSERT INTO `reportuser` (`id`, `name`, `rollno`, `message`) VALUES
(1, '', 0, ''),
(2, '', 0, ''),
(3, 'Koushik', 47, 'askjbgfkisf'),
(4, 'Oishiq', 59, 'He is from MBBS'),
(5, '', 0, '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `alumni`
--
ALTER TABLE `alumni`
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `contactus`
--
ALTER TABLE `contactus`
  ADD PRIMARY KEY (`Sno`),
  ADD KEY `email` (`email`);

--
-- Indexes for table `reportuser`
--
ALTER TABLE `reportuser`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `contactus`
--
ALTER TABLE `contactus`
  MODIFY `Sno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `reportuser`
--
ALTER TABLE `reportuser`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
