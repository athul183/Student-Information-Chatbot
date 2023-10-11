-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 05, 2023 at 05:06 PM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 7.3.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `trms`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbladmin`
--

CREATE TABLE `tbladmin` (
  `ID` int(10) NOT NULL,
  `AdminName` varchar(120) DEFAULT NULL,
  `UserName` varchar(120) DEFAULT NULL,
  `MobileNumber` bigint(10) DEFAULT NULL,
  `Email` varchar(120) DEFAULT NULL,
  `Password` varchar(200) DEFAULT NULL,
  `AdminRegdate` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbladmin`
--

INSERT INTO `tbladmin` (`ID`, `AdminName`, `UserName`, `MobileNumber`, `Email`, `Password`, `AdminRegdate`) VALUES
(1, 'Admin', 'admin', 9731236665, 'aparnaperade21@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', '2021-04-01 06:10:04');

-- --------------------------------------------------------

--
-- Table structure for table `tblattendance`
--

CREATE TABLE `tblattendance` (
  `id` int(10) NOT NULL,
  `usn` varchar(20) NOT NULL,
  `stname` varchar(200) NOT NULL,
  `sem` int(10) NOT NULL,
  `tdate` date NOT NULL,
  `attendance` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblattendance`
--

INSERT INTO `tblattendance` (`id`, `usn`, `stname`, `sem`, `tdate`, `attendance`) VALUES
(1, 'usn1234', 'dhwani', 2, '2023-04-24', 'present');

-- --------------------------------------------------------

--
-- Table structure for table `tblchatbot`
--

CREATE TABLE `tblchatbot` (
  `id` int(100) NOT NULL,
  `queries` varchar(500) NOT NULL,
  `replies` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblchatbot`
--

INSERT INTO `tblchatbot` (`id`, `queries`, `replies`) VALUES
(1, 'hi', ''),
(2, 'can i get my marks', 'http://localhost/alvaschatbot/index.php'),
(3, 'how', ''),
(4, 'hello', 'Hi there, how can I help?'),
(5, 'mmmm', ''),
(6, 'may i', ''),
(7, 'thank you', ''),
(8, 'see you later', ''),
(9, 'usn123', ''),
(10, 'hello', 'Hi there, how can I help?'),
(11, 'how do I', 'Hello, thanks for asking'),
(12, 'good day', 'Hi there, how can I help?'),
(13, 'May I know my marks?', 'http://localhost/alvaschatbot/'),
(14, 'my marks', 'http://localhost/alvaschatbot/'),
(15, 'can i get my marks', 'http://localhost/alvaschatbot/index.php'),
(16, 'may i get marks', 'http://localhost/alvaschatbot/'),
(17, 'can you tell my marks', 'http://localhost/alvaschatbot/'),
(18, 'my marks', 'http://localhost/alvaschatbot/'),
(19, 'please tell my marks', 'http://localhost/alvaschatbot/'),
(20, 'my marks tell', 'http://localhost/alvaschatbot/index.php'),
(21, 'marks', 'http://localhost/alvaschatbot/index.php'),
(22, 'marks', 'http://localhost/alvaschatbot/index.php'),
(23, 'may i know my marks', 'http://localhost/alvaschatbot/index.php'),
(24, 'may i get my marks', 'http://localhost/alvaschatbot/index.php'),
(25, 'show my marks', 'http://localhost/alvaschatbot/index.php'),
(26, 'marks', 'http://localhost/alvaschatbot/index.php'),
(27, 'marks', 'http://localhost/alvaschatbot/index.php'),
(28, 'marks my', 'http://localhost/alvaschatbot/index.php'),
(29, 'my marks tell', 'http://localhost/alvaschatbot/index.php'),
(30, 'share my marks', 'http://localhost/alvaschatbot/index.php'),
(31, 'may i get my marks', 'http://localhost/alvaschatbot/index.php'),
(32, 'may i know my marks', 'http://localhost/alvaschatbot/index.php'),
(33, 'may i know my attendance', 'http://localhost/alvaschatbot/attendance.php'),
(34, 'placement', 'Placement is good'),
(35, 'may i know attendace', 'http://localhost/alvaschatbot/attendance.php'),
(36, 'may i know the attendace', 'http://localhost/alvaschatbot/attendance.php'),
(37, 'can i get my marks', 'http://localhost/alvaschatbot/index.php'),
(38, 'can i get my marks', 'http://localhost/alvaschatbot/index.php'),
(39, 'can i know about placements', 'Placement is good');

-- --------------------------------------------------------

--
-- Table structure for table `tblevents`
--

CREATE TABLE `tblevents` (
  `id` int(11) NOT NULL,
  `evtname` varchar(100) NOT NULL,
  `evtloc` varchar(100) NOT NULL,
  `evtdate` varchar(100) NOT NULL,
  `evtdesc` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblevents`
--

INSERT INTO `tblevents` (`id`, `evtname`, `evtloc`, `evtdate`, `evtdesc`) VALUES
(1, 'some events', 'mangalore', '2023-05-05', 'some event descriptions');

-- --------------------------------------------------------

--
-- Table structure for table `tblmarks`
--

CREATE TABLE `tblmarks` (
  `id` int(10) NOT NULL,
  `usn` varchar(20) NOT NULL,
  `stname` varchar(50) NOT NULL,
  `subjects` varchar(50) NOT NULL,
  `sem` int(10) NOT NULL,
  `marks` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblmarks`
--

INSERT INTO `tblmarks` (`id`, `usn`, `stname`, `subjects`, `sem`, `marks`) VALUES
(4, 'usn1234', 'dhwani', 'Operating System (OS)', 5, 40);

-- --------------------------------------------------------

--
-- Table structure for table `tblplacements`
--

CREATE TABLE `tblplacements` (
  `id` int(100) NOT NULL,
  `compname` varchar(100) NOT NULL,
  `comploc` varchar(100) NOT NULL,
  `compdate` varchar(100) NOT NULL,
  `compdesc` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblplacements`
--

INSERT INTO `tblplacements` (`id`, `compname`, `comploc`, `compdate`, `compdesc`) VALUES
(1, 'infosys ltd', 'Mangalore', '2023-05-04', 'Software Engineer 2 positions\r\nTester 5 positions');

-- --------------------------------------------------------

--
-- Table structure for table `tblregister`
--

CREATE TABLE `tblregister` (
  `id` int(10) NOT NULL,
  `stname` varchar(100) NOT NULL,
  `usn` varchar(20) NOT NULL,
  `sem` int(10) NOT NULL,
  `email` varchar(120) NOT NULL,
  `mobile` bigint(10) NOT NULL,
  `newpassword` varchar(200) NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblregister`
--

INSERT INTO `tblregister` (`id`, `stname`, `usn`, `sem`, `email`, `mobile`, `newpassword`, `status`) VALUES
(1, 'dhwani', 'usn1234', 2, 'dhwani@gmail.com', 9739475665, '81dc9bdb52d04dc20036dbd8313ed055', 'verified'),
(3, 'gk', 'usn12345', 3, 'gkbhatkakunje@gmail.com', 8892882988, '827ccb0eea8a706c4c34a16891f84e7b', 'verified');

-- --------------------------------------------------------

--
-- Table structure for table `tblsubjects`
--

CREATE TABLE `tblsubjects` (
  `ID` int(10) NOT NULL,
  `Subject` varchar(120) DEFAULT NULL,
  `sem` int(10) NOT NULL,
  `CreationDate` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblsubjects`
--

INSERT INTO `tblsubjects` (`ID`, `Subject`, `sem`, `CreationDate`) VALUES
(1, 'Mathmetics', 1, '2019-10-07 06:11:06'),
(2, 'Physics', 2, '2019-10-07 06:11:19'),
(3, 'Chemistry', 3, '2019-10-07 06:11:32'),
(4, 'Biology', 4, '2019-10-07 06:11:41'),
(5, 'Hindi', 5, '2019-10-07 06:11:49'),
(6, 'English', 6, '2019-10-07 06:11:56'),
(7, 'Science', 7, '2019-10-07 06:12:06'),
(8, 'Social Science', 8, '2019-10-07 06:12:19'),
(9, 'Accounts', 1, '2019-10-07 06:12:32'),
(10, 'Arts', 2, '2019-10-07 06:12:44'),
(11, 'Musics', 3, '2019-10-07 06:12:53'),
(12, 'Sanskrit', 4, '2019-10-07 06:13:08'),
(13, 'Operating System (OS)', 5, '2019-10-13 19:00:22'),
(14, 'Data Structures', 2, '2021-05-06 04:26:19');

-- --------------------------------------------------------

--
-- Table structure for table `tblteacher`
--

CREATE TABLE `tblteacher` (
  `ID` int(10) NOT NULL,
  `Name` varchar(120) DEFAULT NULL,
  `Picture` varchar(200) NOT NULL,
  `Email` varchar(120) DEFAULT NULL,
  `MobileNumber` bigint(10) DEFAULT NULL,
  `Qualifications` varchar(120) DEFAULT NULL,
  `Address` varchar(200) DEFAULT NULL,
  `TeacherSub` varchar(120) DEFAULT NULL,
  `sem` int(10) NOT NULL,
  `JoiningDate` varchar(120) DEFAULT NULL,
  `RegDate` timestamp NOT NULL DEFAULT current_timestamp(),
  `pwd` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblteacher`
--

INSERT INTO `tblteacher` (`ID`, `Name`, `Picture`, `Email`, `MobileNumber`, `Qualifications`, `Address`, `TeacherSub`, `sem`, `JoiningDate`, `RegDate`, `pwd`) VALUES
(6, 'Divya', '32554b968a0ad569a14dd61adf835bd81620306186.png', 'divya@gmail.com', 9731234443, 'BCA', 'mlore', 'Operating System (OS)', 5, '2021-05-06', '2021-05-06 13:03:06', '827ccb0eea8a706c4c34a16891f84e7b'),
(7, 'aparna', '658d0081a2ebc01d849c56e8cfb18b051682439720.jpg', 'aparna@gmail.com', 5566778899, 'bca', 'Bunts Hostel\r\nMangaluru', 'Data Structures', 2, '2023-04-01', '2023-04-25 16:22:00', '827ccb0eea8a706c4c34a16891f84e7b');

-- --------------------------------------------------------

--
-- Table structure for table `tbltimetable`
--

CREATE TABLE `tbltimetable` (
  `id` int(10) NOT NULL,
  `email` varchar(50) NOT NULL,
  `lname` varchar(50) NOT NULL,
  `subjects` varchar(50) NOT NULL,
  `sem` int(10) NOT NULL,
  `tdate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbltimetable`
--

INSERT INTO `tbltimetable` (`id`, `email`, `lname`, `subjects`, `sem`, `tdate`) VALUES
(1, 'abir@gmail.com', 'Abir Singh', 'Mathmetics', 1, '2021-05-06 17:04:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbladmin`
--
ALTER TABLE `tbladmin`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tblattendance`
--
ALTER TABLE `tblattendance`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblchatbot`
--
ALTER TABLE `tblchatbot`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblevents`
--
ALTER TABLE `tblevents`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblmarks`
--
ALTER TABLE `tblmarks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblplacements`
--
ALTER TABLE `tblplacements`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblregister`
--
ALTER TABLE `tblregister`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblsubjects`
--
ALTER TABLE `tblsubjects`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tblteacher`
--
ALTER TABLE `tblteacher`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tbltimetable`
--
ALTER TABLE `tbltimetable`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbladmin`
--
ALTER TABLE `tbladmin`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tblattendance`
--
ALTER TABLE `tblattendance`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tblchatbot`
--
ALTER TABLE `tblchatbot`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `tblevents`
--
ALTER TABLE `tblevents`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tblmarks`
--
ALTER TABLE `tblmarks`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tblplacements`
--
ALTER TABLE `tblplacements`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tblregister`
--
ALTER TABLE `tblregister`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tblsubjects`
--
ALTER TABLE `tblsubjects`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `tblteacher`
--
ALTER TABLE `tblteacher`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tbltimetable`
--
ALTER TABLE `tbltimetable`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
