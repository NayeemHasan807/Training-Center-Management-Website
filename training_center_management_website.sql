-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 21, 2020 at 01:26 PM
-- Server version: 10.1.28-MariaDB
-- PHP Version: 7.1.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `training_center_management_website`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `adminid` varchar(30) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(30) NOT NULL,
  `gender` varchar(15) NOT NULL,
  `dob` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`adminid`, `name`, `email`, `gender`, `dob`) VALUES
('sumaiya101', 'Sumaiya Sultana', 'sumaiya@gmail.com', 'Female', '3/3/1999');

-- --------------------------------------------------------

--
-- Table structure for table `adminmail`
--

CREATE TABLE `adminmail` (
  `id` int(10) NOT NULL,
  `adminid` varchar(30) NOT NULL,
  `subject` varchar(200) NOT NULL,
  `body` varchar(2000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `adminnotice`
--

CREATE TABLE `adminnotice` (
  `id` int(10) NOT NULL,
  `adminid` varchar(30) NOT NULL,
  `noticesubject` varchar(200) NOT NULL,
  `noticebody` varchar(2000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `applyforjob`
--

CREATE TABLE `applyforjob` (
  `id` int(10) NOT NULL,
  `studentid` varchar(30) NOT NULL,
  `filename` varchar(50) NOT NULL,
  `file` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `attendance`
--

CREATE TABLE `attendance` (
  `id` int(10) NOT NULL,
  `trainerid` varchar(30) NOT NULL,
  `month` varchar(15) NOT NULL,
  `year` varchar(10) NOT NULL,
  `filename` varchar(100) NOT NULL,
  `file` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE `course` (
  `courseid` varchar(30) NOT NULL,
  `coursename` varchar(50) NOT NULL,
  `trainerid` varchar(30) NOT NULL,
  `courseday` varchar(15) NOT NULL,
  `coursetime` varchar(30) NOT NULL,
  `sitavailable` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`courseid`, `coursename`, `trainerid`, `courseday`, `coursetime`, `sitavailable`) VALUES
('c101', 'Webtech', 'nayeem101', 'Sunday', '8am-10am', 30);

-- --------------------------------------------------------

--
-- Table structure for table `finance`
--

CREATE TABLE `finance` (
  `month` varchar(15) NOT NULL,
  `year` varchar(15) NOT NULL,
  `trainerssalary` int(15) NOT NULL,
  `studentfees` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `forms`
--

CREATE TABLE `forms` (
  `id` int(10) NOT NULL,
  `adminid` varchar(30) NOT NULL,
  `formname` varchar(50) NOT NULL,
  `form` varchar(50) NOT NULL,
  `towhom` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `information`
--

CREATE TABLE `information` (
  `id` int(10) NOT NULL,
  `adminid` varchar(30) NOT NULL,
  `informationname` varchar(200) NOT NULL,
  `informationbody` varchar(2000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `studentid` varchar(30) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(30) NOT NULL,
  `gender` varchar(15) NOT NULL,
  `dob` varchar(15) NOT NULL,
  `courseid` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`studentid`, `name`, `email`, `gender`, `dob`, `courseid`) VALUES
('eva101', 'Sumaiya Rahman Eva', 'eva@gmail.com', 'Female', '2/2/1999', 'c101'),
('json101', 'Json Onak Pera', 'json@gmail.com', 'Male', '9/9/1999', 'c101');

-- --------------------------------------------------------

--
-- Table structure for table `studentassignment`
--

CREATE TABLE `studentassignment` (
  `id` int(10) NOT NULL,
  `studentid` varchar(30) NOT NULL,
  `filename` varchar(50) NOT NULL,
  `file` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `studentmail`
--

CREATE TABLE `studentmail` (
  `id` int(10) NOT NULL,
  `studentid` varchar(30) NOT NULL,
  `towhom` varchar(15) NOT NULL,
  `subject` varchar(200) NOT NULL,
  `body` varchar(2000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `studentmarks`
--

CREATE TABLE `studentmarks` (
  `id` int(10) NOT NULL,
  `trainerid` varchar(30) NOT NULL,
  `studentid` varchar(30) NOT NULL,
  `coursename` varchar(30) NOT NULL,
  `marks` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `studentmarks`
--

INSERT INTO `studentmarks` (`id`, `trainerid`, `studentid`, `coursename`, `marks`) VALUES
(1, 'nayeem101', 'eva101', 'Webtech', '100'),
(2, 'nayeem101', 'json101', 'Webtech', '57');

-- --------------------------------------------------------

--
-- Table structure for table `trainer`
--

CREATE TABLE `trainer` (
  `trainerid` varchar(30) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(30) NOT NULL,
  `gender` varchar(15) NOT NULL,
  `dob` varchar(15) NOT NULL,
  `phoneno` varchar(15) NOT NULL,
  `address` varchar(30) NOT NULL,
  `eduqualification` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `trainer`
--

INSERT INTO `trainer` (`trainerid`, `name`, `email`, `gender`, `dob`, `phoneno`, `address`, `eduqualification`) VALUES
('nayeem101', 'Nayeem Hasan', 'nayeem@gmail.com', 'Male', '1/1/1997', '01316414305', 'Badda, Dhaka', 'SSC/HSC/BSC');

-- --------------------------------------------------------

--
-- Table structure for table `trainerassignment`
--

CREATE TABLE `trainerassignment` (
  `id` int(10) NOT NULL,
  `trainerid` varchar(30) NOT NULL,
  `filename` varchar(50) NOT NULL,
  `file` varchar(100) NOT NULL,
  `marks` int(11) NOT NULL,
  `deadline` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `trainerfile`
--

CREATE TABLE `trainerfile` (
  `id` int(10) NOT NULL,
  `trainerid` varchar(30) NOT NULL,
  `filename` varchar(50) NOT NULL,
  `file` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `trainermail`
--

CREATE TABLE `trainermail` (
  `id` int(10) NOT NULL,
  `trainerid` varchar(30) NOT NULL,
  `towhom` varchar(30) NOT NULL,
  `mailsubject` varchar(200) NOT NULL,
  `mailbody` varchar(2000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `trainermail`
--

INSERT INTO `trainermail` (`id`, `trainerid`, `towhom`, `mailsubject`, `mailbody`) VALUES
(1, 'nayeem101', 'Admin', 'test 1 2', '1 2 3 4 5 6'),
(2, 'nayeem101', 'Admin', 'Test 111 1', '1 1 1 1 2 2');

-- --------------------------------------------------------

--
-- Table structure for table `trainernotice`
--

CREATE TABLE `trainernotice` (
  `id` int(10) NOT NULL,
  `trainerid` varchar(30) NOT NULL,
  `noticesubject` varchar(200) NOT NULL,
  `noticebody` varchar(2000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `trainernotice`
--

INSERT INTO `trainernotice` (`id`, `trainerid`, `noticesubject`, `noticebody`) VALUES
(2, 'nayeem101', 'Class off', 'to my sickness next 20/09/20 i will not be able to take classes.');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `userid` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `usertype` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`userid`, `password`, `usertype`) VALUES
('eva101', '101', 'Student'),
('nayeem101', '111', 'Trainer'),
('sumaiya101', '101', 'Admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`adminid`);

--
-- Indexes for table `adminmail`
--
ALTER TABLE `adminmail`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `adminnotice`
--
ALTER TABLE `adminnotice`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `applyforjob`
--
ALTER TABLE `applyforjob`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `attendance`
--
ALTER TABLE `attendance`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`courseid`);

--
-- Indexes for table `forms`
--
ALTER TABLE `forms`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `information`
--
ALTER TABLE `information`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`studentid`);

--
-- Indexes for table `studentassignment`
--
ALTER TABLE `studentassignment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `studentmail`
--
ALTER TABLE `studentmail`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `studentmarks`
--
ALTER TABLE `studentmarks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `trainer`
--
ALTER TABLE `trainer`
  ADD PRIMARY KEY (`trainerid`);

--
-- Indexes for table `trainerassignment`
--
ALTER TABLE `trainerassignment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `trainerfile`
--
ALTER TABLE `trainerfile`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `trainermail`
--
ALTER TABLE `trainermail`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `trainernotice`
--
ALTER TABLE `trainernotice`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`userid`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
