-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 22, 2020 at 09:31 AM
-- Server version: 10.3.16-MariaDB
-- PHP Version: 7.3.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mesh`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `userID` char(10) NOT NULL,
  `AdminName` varchar(50) NOT NULL,
  `AdminAge` int(11) NOT NULL,
  `AdminContact` varchar(10) NOT NULL,
  `AdminEmail` varchar(50) NOT NULL,
  `ProfilePic` varchar(1000) NOT NULL,
  `AdminPassword` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`userID`, `AdminName`, `AdminAge`, `AdminContact`, `AdminEmail`, `ProfilePic`, `AdminPassword`) VALUES
('AD101', 'Senura Jayadeva', 21, '0779142664', 'ad101@my.mesh.lk', 'images/uploads/AD101.jpg', '123'),
('AD102', 'Lasal Hettiarachchi', 30, '0779156288', 'ad102@my.mesh.lk', 'images/uploads/AD102.jpg\r\n', '123'),
('AD103', 'Yasindu Randika', 21, '0779145228', 'ad103@my.mesh.lk', 'images/uploads/AD103.jpg', '123');

-- --------------------------------------------------------

--
-- Table structure for table `conctact`
--

CREATE TABLE `conctact` (
  `MessageID` int(11) NOT NULL,
  `Name` varchar(50) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Message` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `conctact`
--

INSERT INTO `conctact` (`MessageID`, `Name`, `Email`, `Message`) VALUES
(1, 'YASIRU RANDIKA', 'yasirurandika99@gmail.com', 'How to view the timetable? '),
(2, 'Nimal Perera', 'nimal@gmail.com', 'How to contact admin ?');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `FeedbackID` int(11) NOT NULL,
  `Feedback` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`FeedbackID`, `Feedback`) VALUES
(1, 'Very well. Good user experience.'),
(2, 'Improve UI');

-- --------------------------------------------------------

--
-- Table structure for table `lecturer`
--

CREATE TABLE `lecturer` (
  `userID` varchar(20) NOT NULL,
  `LecturerName` varchar(50) NOT NULL,
  `LecturerAge` int(11) NOT NULL,
  `LecturerEmail` varchar(50) NOT NULL,
  `LecturerContact` varchar(10) NOT NULL,
  `LecturerFacluty` varchar(50) NOT NULL,
  `ProfilePic` varchar(1000) DEFAULT 'images/user.png',
  `pwd` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lecturer`
--

INSERT INTO `lecturer` (`userID`, `LecturerName`, `LecturerAge`, `LecturerEmail`, `LecturerContact`, `LecturerFacluty`, `ProfilePic`, `pwd`) VALUES
('LEC001', 'NALIN BANDARA', 50, 'nalinbandara@gmail.com', '0765434324', 'Faculty of Computing', 'images/user.png', 'ABC'),
('LEC002', 'SADUN PERERA', 60, 'sadun@gmail.com', '0764434324', 'Faculty of Computing', 'images/user.png', '123'),
('LEC006', 'Nadun Ishara', 30, 'nadunishara@gmail.com', '0776545675', 'Faculty Of Computing', 'images/uploads/LEC006.jpg', '1234');

-- --------------------------------------------------------

--
-- Table structure for table `module`
--

CREATE TABLE `module` (
  `mID` int(11) NOT NULL,
  `mCode` varchar(10) NOT NULL,
  `mName` varchar(50) NOT NULL,
  `Credits` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `notice`
--

CREATE TABLE `notice` (
  `NoticeID` int(11) NOT NULL,
  `LecID` varchar(10) NOT NULL,
  `GroupID` varchar(10) NOT NULL,
  `Notice` varchar(200) NOT NULL,
  `Type` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `notice`
--

INSERT INTO `notice` (`NoticeID`, `LecID`, `GroupID`, `Notice`, `Type`) VALUES
(1, '', 'Y1S1 1', 'IWT FINAL VIVA\r\nDate : 2019.10.03\r\nTime : 1.30 p.m.', 'FOC'),
(2, '', 'Y1S1 1', 'Today you will have your IWT Final VIVA. Do your best !', 'FOC'),
(3, '', 'Y1S1 1', 'Today you have a submission', 'FOC');

-- --------------------------------------------------------

--
-- Table structure for table `pwd`
--

CREATE TABLE `pwd` (
  `pID` int(11) NOT NULL,
  `stID` char(10) NOT NULL,
  `pwd` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pwd`
--

INSERT INTO `pwd` (`pID`, `stID`, `pwd`) VALUES
(2, 'IT19131111', '123'),
(3, 'IT19131122', '123'),
(4, 'IT19133333', '123'),
(0, 'IT19139037', '123'),
(0, 'IT19160726', 'abc123');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `UserID` char(10) NOT NULL,
  `fname` varchar(50) NOT NULL,
  `mname` varchar(50) NOT NULL,
  `lname` varchar(50) NOT NULL,
  `age` int(11) NOT NULL,
  `gender` char(6) NOT NULL,
  `faculty` char(20) NOT NULL,
  `year` varchar(11) NOT NULL,
  `grp` varchar(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `addrs1` varchar(50) NOT NULL,
  `addrs2` varchar(50) NOT NULL,
  `addrs3` varchar(50) NOT NULL,
  `city` varchar(50) NOT NULL,
  `country` varchar(50) NOT NULL,
  `pnum` char(10) NOT NULL,
  `ProfilePic` varchar(50) DEFAULT 'images/user.png'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`UserID`, `fname`, `mname`, `lname`, `age`, `gender`, `faculty`, `year`, `grp`, `email`, `addrs1`, `addrs2`, `addrs3`, `city`, `country`, `pnum`, `ProfilePic`) VALUES
('IT19131111', 'Nimal', 'Samantha', 'Silva', 23, 'male', 'FOC', 'YEAR 1', 'Y1S1 1', 'yasirurandika99@gmail.com', 'No.54', 'Viskam Road', 'Galle', 'Galle', 'Sri Lanka', '0713456789', 'images/uploads/IT19131111.jpg'),
('IT19131122', 'SAVINDU', 'MENDIS', 'GAMAGE', 20, 'male', 'FOC', '2018', 'Y1S1 2', 'savindu9@gmail.com', 'No.54', 'Colombo Road', 'Colombo', 'Colombo', 'SriLanka', '0715999493', 'images/user.png'),
('IT19133333', 'Shalin', 'Mihira', 'Perera', 20, 'male', 'FOC', '2018', 'Y1S1 1', 'shalinperera@gmail.com', 'No.54', 'Kaduwela Road', 'Malabe', 'Malabe', 'SriLanka', '0715931193', 'images/user.png'),
('IT19139037', 'Senura', 'Vihan', 'Jayadeva', 25, 'male', 'FOC', 'YEAR 1', 'Y1S1 1', 'senurajayadeva@gmail.com', '291/B,Kottawaththa Road,Wewita,Bandaragama', '', '', 'Bandaragama', 'Sri Lanka', '0779142664', 'images/uploads/IT19139037.jpg'),
('IT19160726', 'Maduka', 'Benildas', 'Nuwantha', 20, 'male', 'FOC', 'YEAR 1', 'Y1S1 1', 'it19160726@my.sliit.lk', '315/A', 'Helan Mw,', 'Wennappuwa', 'Puttlam', 'Sri Lanka', '0779142664', 'images/uploads/IT19160726.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `timeslots`
--

CREATE TABLE `timeslots` (
  `tsID` int(11) NOT NULL,
  `time` varchar(20) NOT NULL,
  `day` varchar(10) NOT NULL,
  `groupID` varchar(10) NOT NULL,
  `module` varchar(10) NOT NULL,
  `lecID` varchar(10) NOT NULL,
  `hall` varchar(5) NOT NULL,
  `faculty` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `timeslots`
--

INSERT INTO `timeslots` (`tsID`, `time`, `day`, `groupID`, `module`, `lecID`, `hall`, `faculty`) VALUES
(1, '8.30-10.30', 'Mon', 'Y1S1  1', 'EAP', 'LEC001', '301', 'FOC'),
(2, '8.30-10.30', 'TUE', 'Y1S1 1', 'SPM', 'LEC002', '305', 'FOC'),
(3, '8.30-10.30', 'WED', 'Y1S1 1', 'EAP', 'LEC001', '302', 'FOC\r\n'),
(4, '8.30-10.30', 'THU', 'Y1S1 1', 'ISDM', 'LEC004', '301', 'FOC'),
(5, '8.30-10.30', 'FRI', 'Y1S1 1', 'OOC', 'LEC003', '302', 'FOC'),
(6, '10.30-12.30', 'Mon', 'Y1S1 1', 'IWT', 'LEC005', '301', 'FOC'),
(7, '10.30-12.30', 'TUE', 'Y1S1 1', 'SPM', 'LEC002', '305', 'FOC'),
(8, '10.30-12.30', 'WED', 'Y1S1 1', 'ISDM', 'LEC004', '302', 'FOC'),
(9, '10.30-12.30', 'THU', 'Y1S1 1', 'EAP', 'LEC001', '301', 'FOC'),
(10, '1.30-3.30', 'Mon', 'Y1S1 1', 'EAP', 'LEC001', '301', 'FOC'),
(11, '1.30-3.30', 'TUE', 'Y1S1 1', 'SPM', 'LEC002', '305', 'FOC'),
(12, '1.30-3.30', 'THU', 'Y1S1 1', 'ISDM', 'LEC004', '301', 'FOC'),
(13, '1.30-3.30', 'FRI', 'Y1S1 1', 'OOC', 'LEC003', '302', 'FOC'),
(14, '3.30-.5.30', 'TUE', 'Y1S1 1', 'SPM', 'LEC002', '305', 'FOC'),
(15, '3.30-.5.30', 'WED', 'Y1S1 1', 'ISDM', 'LEC004', '302', 'FOC');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `conctact`
--
ALTER TABLE `conctact`
  ADD PRIMARY KEY (`MessageID`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`FeedbackID`);

--
-- Indexes for table `module`
--
ALTER TABLE `module`
  ADD PRIMARY KEY (`mID`);

--
-- Indexes for table `notice`
--
ALTER TABLE `notice`
  ADD PRIMARY KEY (`NoticeID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `conctact`
--
ALTER TABLE `conctact`
  MODIFY `MessageID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `FeedbackID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `notice`
--
ALTER TABLE `notice`
  MODIFY `NoticeID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
