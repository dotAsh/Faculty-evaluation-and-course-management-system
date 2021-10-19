-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 17, 2019 at 10:47 AM
-- Server version: 10.1.34-MariaDB
-- PHP Version: 7.2.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project370`
--

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE `course` (
  `Name` varchar(100) NOT NULL,
  `Title` varchar(100) NOT NULL,
  `Section` int(11) NOT NULL,
  `Seat` int(11) NOT NULL DEFAULT '40'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`Name`, `Title`, `Section`, `Seat`) VALUES
('Programming Language I', 'CSE110', 1, 40),
('Programming Language I', 'CSE110', 2, 40),
('Programming Language II', 'CSE111', 1, 40),
('Programming Language II', 'CSE111', 2, 40),
('Data Structures', 'CSE220', 1, 40),
('Data Structures', 'CSE220', 2, 40),
('Algorithms', 'CSE221', 1, 40),
('Algorithms', 'CSE221', 2, 40),
('Discrete Mathematics', 'CSE230', 1, 40),
('Database Systems', 'CSE370', 1, 40),
('Database Systems', 'CSE370', 2, 40);

-- --------------------------------------------------------

--
-- Table structure for table `course_taken`
--

CREATE TABLE `course_taken` (
  `Initial` varchar(100) NOT NULL,
  `Course_Title` varchar(100) NOT NULL,
  `Section` int(11) NOT NULL,
  `A` int(11) NOT NULL DEFAULT '0',
  `B` int(11) NOT NULL DEFAULT '0',
  `C` int(11) NOT NULL DEFAULT '0',
  `D` int(11) NOT NULL DEFAULT '0',
  `E` int(11) NOT NULL DEFAULT '0',
  `Student_Count` int(11) NOT NULL DEFAULT '0',
  `Total` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `course_taken`
--

INSERT INTO `course_taken` (`Initial`, `Course_Title`, `Section`, `A`, `B`, `C`, `D`, `E`, `Student_Count`, `Total`) VALUES
('DIP', 'CSE110', 1, 0, 0, 0, 0, 0, 0, 0),
('AAR', 'CSE110', 2, 0, 0, 0, 0, 0, 0, 0),
('MSA', 'CSE111', 1, 0, 0, 0, 0, 0, 0, 0),
('MSN', 'CSE111', 2, 0, 0, 0, 0, 0, 0, 0),
('RAK', 'CSE220', 1, 0, 0, 0, 0, 0, 0, 0),
('DIP', 'CSE220', 2, 0, 0, 0, 0, 0, 0, 0),
('MMM', 'CSE221', 1, 0, 0, 0, 0, 0, 0, 0),
('RAK', 'CSE221', 2, 0, 0, 0, 0, 0, 0, 0),
('FBA', 'CSE230', 1, 0, 0, 0, 0, 0, 0, 0),
('FBA', 'CSE370', 2, 0, 0, 0, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `evaluated_course`
--

CREATE TABLE `evaluated_course` (
  `Student_ID` int(11) NOT NULL,
  `Course` varchar(100) NOT NULL,
  `Section` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `faculty_info`
--

CREATE TABLE `faculty_info` (
  `Name` varchar(100) NOT NULL,
  `Initial` varchar(100) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `Img` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `faculty_info`
--

INSERT INTO `faculty_info` (`Name`, `Initial`, `Email`, `Img`) VALUES
('Annajiat Alim Rasel', 'AAR', 'aar@gmail.com', 'images/aar.png'),
('Dipankar Chaki', 'DIP', 'dip@gmail.com', 'images/dip.png'),
('Faisal Bin Ashraf', 'FBA', 'fba@gmail.com', 'images/fba.png'),
('Moin Mostakim', 'MMM', 'mmm@gmail.com', 'images/mmm.png'),
('Matin Saad Abdullah', 'MSA', 'msa@gmail.com', 'images/msa.png'),
('Md. Shamsul Kaonain', 'MSN', 'msn@gmail.com', 'images/msn.png'),
('Rubayat Ahmed Khan', 'RAK', 'rak@gmail.com', 'images/rak.png');

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `Name` varchar(100) NOT NULL,
  `Add_Course` int(11) NOT NULL DEFAULT '0',
  `Evaluation` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`Name`, `Add_Course`, `Evaluation`) VALUES
('Admin', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `Name` varchar(100) NOT NULL,
  `ID` int(11) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `Gender` varchar(10) NOT NULL,
  `Department` varchar(10) NOT NULL,
  `Password` varchar(10) NOT NULL,
  `Num_of_co` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`Name`, `ID`, `Email`, `Gender`, `Department`, `Password`, `Num_of_co`) VALUES
('MD. Ashik', 17301131, 'ashik@gmail.com', 'Male', 'CSE', 'ashik', 0),
('Faed Ahmed', 17301099, 'faed@gmail.com', 'Male', 'CSE', 'faed', 0),
('MD. Nahid Hasan', 17301096, 'nahidx@gmail.com', 'Male', 'CSE', 'nahid', 0),
('Tanvir Ahmed', 17301054, 'tanvir@gmail.com', 'Male', 'CSE', 'tanvir', 0);

-- --------------------------------------------------------

--
-- Table structure for table `taken_course`
--

CREATE TABLE `taken_course` (
  `Student_ID` int(11) NOT NULL,
  `Course` varchar(100) NOT NULL,
  `Section` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`Title`,`Section`);

--
-- Indexes for table `course_taken`
--
ALTER TABLE `course_taken`
  ADD PRIMARY KEY (`Course_Title`,`Section`);

--
-- Indexes for table `evaluated_course`
--
ALTER TABLE `evaluated_course`
  ADD PRIMARY KEY (`Student_ID`,`Course`,`Section`);

--
-- Indexes for table `faculty_info`
--
ALTER TABLE `faculty_info`
  ADD PRIMARY KEY (`Email`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`Name`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`Email`),
  ADD UNIQUE KEY `ID` (`ID`);

--
-- Indexes for table `taken_course`
--
ALTER TABLE `taken_course`
  ADD PRIMARY KEY (`Student_ID`,`Course`,`Section`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
