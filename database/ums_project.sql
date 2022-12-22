-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 28, 2022 at 10:35 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ums_project`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `gender` varchar(50) NOT NULL,
  `birthday` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `contact` varchar(50) NOT NULL,
  `address` varchar(50) NOT NULL,
  `city` varchar(50) NOT NULL,
  `zip` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `username`, `password`, `firstname`, `lastname`, `gender`, `birthday`, `email`, `contact`, `address`, `city`, `zip`) VALUES
(1, 'j_ferdous', '123456', 'jannat', 'ferdous', 'Female', '1998-12-01', 'jannat56@gmail.com', '1234567890', 'mohammadpur', 'dhaka', '1207');

-- --------------------------------------------------------

--
-- Table structure for table `class`
--

CREATE TABLE `class` (
  `class_id` int(11) NOT NULL,
  `course_id` int(11) NOT NULL,
  `course_name` varchar(50) NOT NULL,
  `course_code` varchar(50) NOT NULL,
  `credit` int(11) NOT NULL,
  `prog_id` int(11) NOT NULL,
  `prog_name` varchar(50) NOT NULL,
  `dep_id` int(11) NOT NULL,
  `dep_code` varchar(50) NOT NULL,
  `section` int(11) NOT NULL,
  `schedule` varchar(50) NOT NULL,
  `room` varchar(50) NOT NULL,
  `capacity` int(11) NOT NULL,
  `faculty_id` int(11) NOT NULL,
  `faculty_name` varchar(50) NOT NULL,
  `sem_id` int(11) NOT NULL,
  `sem_code` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `class`
--

INSERT INTO `class` (`class_id`, `course_id`, `course_name`, `course_code`, `credit`, `prog_id`, `prog_name`, `dep_id`, `dep_code`, `section`, `schedule`, `room`, `capacity`, `faculty_id`, `faculty_name`, `sem_id`, `sem_code`) VALUES
(10, 1, ' C Programming  ', ' CSE 101 ', 3, 2, 'B. Sc. in Computer Science and Engineering', 4, 'CSE', 1, 'SUN-TUE 8:30 AM - 9:50 AM', 'PB-101', 23, 5, 'saifsunny', 5, 'spr-22'),
(11, 2, 'C Programming II', 'CSE 102', 3, 2, 'B. Sc. in Computer Science and Engineering', 5, 'BUS', 2, 'SUN-TUE 1:10 PM - 2:30 PM', 'PB-101', 35, 5, 'saifsunny', 5, 'spr-22'),
(12, 1, ' C Programming  ', ' CSE 101 ', 3, 2, 'B. Sc. in Computer Science and Engineering', 4, 'CSE', 1, 'SUN-TUE 8:30 AM - 9:50 AM', 'PB-101', 40, 5, 'saifsunny', 6, 'fall-21'),
(13, 3, 'Data Structure', 'CSE 105', 3, 2, 'B. Sc. in Computer Science and Engineering', 4, 'CSE', 1, 'MON-WED 10:00 AM - 11:20 AM', 'PB-102', 38, 5, 'saifsunny', 5, 'spr-22');

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE `course` (
  `course_id` int(11) NOT NULL,
  `course_name` varchar(50) NOT NULL,
  `course_code` varchar(50) NOT NULL,
  `credit` int(11) NOT NULL,
  `dep_id` int(11) NOT NULL,
  `dep_code` varchar(50) NOT NULL,
  `prog_id` int(11) NOT NULL,
  `prog_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`course_id`, `course_name`, `course_code`, `credit`, `dep_id`, `dep_code`, `prog_id`, `prog_name`) VALUES
(1, ' C Programming  ', ' CSE 101 ', 3, 4, 'CSE', 2, 'B. Sc. in Computer Science and Engineering'),
(2, 'C Programming II', 'CSE 102', 3, 4, 'CSE', 2, 'B. Sc. in Computer Science and Engineering'),
(3, 'Data Structure', 'CSE 105', 3, 4, 'CSE', 2, 'B. Sc. in Computer Science and Engineering');

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `dep_id` int(11) NOT NULL,
  `dep_name` varchar(100) NOT NULL,
  `dep_code` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`dep_id`, `dep_name`, `dep_code`) VALUES
(4, 'Computer Science and Engineering', 'CSE'),
(5, 'Business Administration  ', 'BUS'),
(6, 'Legal Department', 'LEG');

-- --------------------------------------------------------

--
-- Table structure for table `faculty`
--

CREATE TABLE `faculty` (
  `faculty_id` int(11) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `nid` varchar(50) NOT NULL,
  `education` varchar(50) NOT NULL,
  `gender` varchar(50) NOT NULL,
  `birthday` varchar(50) NOT NULL,
  `contact` varchar(50) NOT NULL,
  `address` varchar(100) NOT NULL,
  `city` varchar(50) NOT NULL,
  `zip` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `dep_id` int(11) NOT NULL,
  `dep_code` varchar(50) NOT NULL,
  `join_sem_id` int(11) NOT NULL,
  `join_sem` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `faculty`
--

INSERT INTO `faculty` (`faculty_id`, `firstname`, `lastname`, `nid`, `education`, `gender`, `birthday`, `contact`, `address`, `city`, `zip`, `username`, `email`, `password`, `dep_id`, `dep_code`, `join_sem_id`, `join_sem`) VALUES
(5, 'saif', 'sunny', '12345678', 'MMM', 'Male', '2022-01-04', '01624034918', '3/11 A', 'Dhaka', '1207', 'sunny56', 'sunny34@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 4, 'CSE', 5, 'spr-22');

-- --------------------------------------------------------

--
-- Table structure for table `notice`
--

CREATE TABLE `notice` (
  `notice_id` int(11) NOT NULL,
  `notice_date` varchar(50) NOT NULL,
  `notice_from` varchar(50) NOT NULL,
  `notice_to` varchar(50) NOT NULL,
  `subject` varchar(50) NOT NULL,
  `message` varchar(10000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `notice`
--

INSERT INTO `notice` (`notice_id`, `notice_date`, `notice_from`, `notice_to`, `subject`, `message`) VALUES
(3, '2022/01/15', 'Admin', 'All', 'Server Maintenance', 'server mantainance'),
(5, '2022-01-05', 'Vice Chancellor', 'All', 'Midterm Examinations ', '1. This is to inform all the students of the Eastern University that as per the decision of the authority the Midterm Examinations of Fall 2021 will commence as follows: Department/Program Date of commencement All Undergraduate program (except shift -2 of CSE & EEE) 04 December 2021 EEE (Shift-2) & CSE (Shift -2) 10 December 2021 All Graduate program 27 November 2021 2. Students are advised to pay all their dues for downloading the admit card. 3. Students who have no dues can download the Admit Card for the Midterm Exam of Fall 2021 between 25 November to 15 December 2021 from their portal (https://webportal.easternuni.edu.bd/student/_login.aspx). 4. Students of the undergraduate program must Keep the printed Admit Card and show it to the Invigilator in the exam hall. 5. Students of the graduate program must attach a PDF copy of the Admit Card with the homework /assignment. No students will be allowed to sit for the examinations without admit card.');

-- --------------------------------------------------------

--
-- Table structure for table `program`
--

CREATE TABLE `program` (
  `prog_id` int(11) NOT NULL,
  `prog_name` varchar(50) NOT NULL,
  `dep_id` int(11) NOT NULL,
  `dep_code` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `program`
--

INSERT INTO `program` (`prog_id`, `prog_name`, `dep_id`, `dep_code`) VALUES
(2, 'B. Sc. in Computer Science and Engineering', 4, 'CSE');

-- --------------------------------------------------------

--
-- Table structure for table `recent`
--

CREATE TABLE `recent` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `role` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `recent`
--

INSERT INTO `recent` (`id`, `name`, `role`) VALUES
(2, 'j_ferdous', 'Admin'),
(4, 'sunny56', 'Faculty'),
(5, '191014078', 'Student'),
(6, 'j_ferdous', 'Admin'),
(7, 'sunny56', 'Faculty'),
(8, '191014078', 'Student'),
(9, '191014078', 'Student'),
(10, 'sunny56', 'Faculty'),
(11, '191014078', 'Student'),
(12, 'sunny56', 'Faculty'),
(13, '191014078', 'Student'),
(14, 'sunny56', 'Faculty'),
(15, '191014078', 'Student'),
(16, '191014078', 'Student');

-- --------------------------------------------------------

--
-- Table structure for table `semester`
--

CREATE TABLE `semester` (
  `sem_id` int(11) NOT NULL,
  `sem_name` varchar(50) NOT NULL,
  `sem_year` varchar(50) NOT NULL,
  `sem_code` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `semester`
--

INSERT INTO `semester` (`sem_id`, `sem_name`, `sem_year`, `sem_code`) VALUES
(5, 'Spring', '2022', 'spr-22');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `sl` int(11) NOT NULL,
  `student_id` varchar(50) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `gender` varchar(50) NOT NULL,
  `birthday` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `contact` varchar(50) NOT NULL,
  `address` varchar(50) NOT NULL,
  `city` varchar(50) NOT NULL,
  `zip` varchar(50) NOT NULL,
  `dep_id` int(11) NOT NULL,
  `dep_code` varchar(50) NOT NULL,
  `prog_id` int(11) NOT NULL,
  `prog_name` varchar(50) NOT NULL,
  `reg_sem_id` int(11) NOT NULL,
  `reg_sem` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`sl`, `student_id`, `firstname`, `lastname`, `gender`, `birthday`, `email`, `contact`, `address`, `city`, `zip`, `dep_id`, `dep_code`, `prog_id`, `prog_name`, `reg_sem_id`, `reg_sem`, `username`, `password`) VALUES
(4, '191014077', 'jannat', 'fredous', 'Female', '2022-01-12', 'jannat56@gmail.com', '01624034918', 'road no 8', 'Dhaka', '1207', 4, 'CSE', 2, 'B. Sc. in Computer Science and Engineering', 5, 'spr-22', 'j_ferdous', 'e10adc3949ba59abbe56e057f20f883e'),
(6, '191014078', 'saif', 'sunny', 'Male', '2022-01-05', 'saifsunny56@gmail.com', '01624034918', '3/11 A Block - F Joint Quarter, Madrasa Road, Moha', 'Dhaka', '1207', 4, 'CSE', 2, 'B. Sc. in Computer Science and Engineering', 5, 'spr-22', 'sunny56', 'e10adc3949ba59abbe56e057f20f883e');

-- --------------------------------------------------------

--
-- Table structure for table `student_att`
--

CREATE TABLE `student_att` (
  `sl` int(11) NOT NULL,
  `class_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `student_name` varchar(100) NOT NULL,
  `att_status` int(11) NOT NULL,
  `att_date` varchar(50) NOT NULL,
  `course_code` varchar(100) NOT NULL,
  `course_name` varchar(100) NOT NULL,
  `section` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `student_att`
--

INSERT INTO `student_att` (`sl`, `class_id`, `student_id`, `student_name`, `att_status`, `att_date`, `course_code`, `course_name`, `section`) VALUES
(10, 11, 191014078, 'saifsunny', 0, '2022-01-27', 'CSE 102', 'C Programming II', '2'),
(11, 11, 191014077, 'jannatfredous', 1, '2022-01-27', 'CSE 102', 'C Programming II', '2'),
(12, 11, 191014078, 'saifsunny', 1, '2022-01-05', 'CSE 102', 'C Programming II', '2'),
(13, 11, 191014077, 'jannatfredous', 1, '2022-01-05', 'CSE 102', 'C Programming II', '2'),
(14, 10, 191014078, 'saifsunny', 1, '2022-01-06', ' CSE 101 ', ' C Programming  ', '1'),
(16, 10, 191014078, 'saifsunny', 1, '2022-01-28', ' CSE 101 ', ' C Programming  ', '1'),
(17, 10, 191014078, 'saifsunny', 1, '2022-01-28', ' CSE 101 ', ' C Programming  ', '1');

-- --------------------------------------------------------

--
-- Table structure for table `student_course`
--

CREATE TABLE `student_course` (
  `sl` int(11) NOT NULL,
  `class_id` int(11) NOT NULL,
  `course_id` int(11) NOT NULL,
  `course_name` varchar(100) NOT NULL,
  `course_code` varchar(100) NOT NULL,
  `credit` int(11) NOT NULL,
  `section` varchar(100) NOT NULL,
  `room` varchar(100) NOT NULL,
  `schedule` varchar(100) NOT NULL,
  `dep_id` int(11) NOT NULL,
  `dep_code` varchar(100) NOT NULL,
  `prog_id` int(11) NOT NULL,
  `prog_name` varchar(100) NOT NULL,
  `sem_id` int(11) NOT NULL,
  `sem_code` varchar(100) NOT NULL,
  `student_id` int(11) NOT NULL,
  `student_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `student_course`
--

INSERT INTO `student_course` (`sl`, `class_id`, `course_id`, `course_name`, `course_code`, `credit`, `section`, `room`, `schedule`, `dep_id`, `dep_code`, `prog_id`, `prog_name`, `sem_id`, `sem_code`, `student_id`, `student_name`) VALUES
(4, 10, 1, ' C Programming  ', ' CSE 101 ', 3, '1', 'PB-101', 'SUN-TUE 8:30 AM - 9:50 AM', 4, 'CSE', 2, 'B. Sc. in Computer Science and Engineering', 5, 'spr-22', 191014078, 'saifsunny'),
(5, 11, 2, 'C Programming II', 'CSE 102', 3, '2', 'PB-101', 'SUN-TUE 1:10 PM - 2:30 PM', 5, 'BUS', 2, 'B. Sc. in Computer Science and Engineering', 5, 'spr-22', 191014078, 'saifsunny'),
(8, 13, 3, 'Data Structure', 'CSE 105', 3, '1', 'PB-102', 'MON-WED 10:00 AM - 11:20 AM', 4, 'CSE', 2, 'B. Sc. in Computer Science and Engineering', 5, 'spr-22', 191014078, 'saifsunny'),
(10, 11, 2, 'C Programming II', 'CSE 102', 3, '2', 'PB-101', 'SUN-TUE 1:10 PM - 2:30 PM', 5, 'BUS', 2, 'B. Sc. in Computer Science and Engineering', 5, 'spr-22', 191014077, 'jannatfredous'),
(11, 13, 3, 'Data Structure', 'CSE 105', 3, '1', 'PB-102', 'MON-WED 10:00 AM - 11:20 AM', 4, 'CSE', 2, 'B. Sc. in Computer Science and Engineering', 5, 'spr-22', 191014077, 'jannatfredous');

-- --------------------------------------------------------

--
-- Table structure for table `student_result`
--

CREATE TABLE `student_result` (
  `sl` int(11) NOT NULL,
  `sem_code` varchar(100) NOT NULL,
  `course_code` varchar(100) NOT NULL,
  `course_name` varchar(100) NOT NULL,
  `credit` int(11) NOT NULL,
  `class_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `student_name` varchar(100) NOT NULL,
  `attendence` int(11) NOT NULL,
  `class_test` int(11) NOT NULL,
  `mid` int(11) NOT NULL,
  `assignment` int(11) NOT NULL,
  `final` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `grade` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `student_result`
--

INSERT INTO `student_result` (`sl`, `sem_code`, `course_code`, `course_name`, `credit`, `class_id`, `student_id`, `student_name`, `attendence`, `class_test`, `mid`, `assignment`, `final`, `total`, `grade`) VALUES
(11, 'spr-22', ' CSE 101 ', ' C Programming  ', 3, 10, 191014078, 'saifsunny', 10, 10, 20, 10, 30, 80, 'A+'),
(12, 'spr-22', 'CSE 102', 'C Programming II', 3, 11, 191014078, 'saifsunny', 10, 10, 0, 10, 30, 60, 'B'),
(13, 'spr-22', 'CSE 102', 'C Programming II', 3, 11, 191014077, 'jannatfredous', 10, 10, 20, 10, 30, 80, 'A+');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `class`
--
ALTER TABLE `class`
  ADD PRIMARY KEY (`class_id`);

--
-- Indexes for table `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`course_id`);

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`dep_id`);

--
-- Indexes for table `faculty`
--
ALTER TABLE `faculty`
  ADD PRIMARY KEY (`faculty_id`);

--
-- Indexes for table `notice`
--
ALTER TABLE `notice`
  ADD PRIMARY KEY (`notice_id`);

--
-- Indexes for table `program`
--
ALTER TABLE `program`
  ADD PRIMARY KEY (`prog_id`);

--
-- Indexes for table `recent`
--
ALTER TABLE `recent`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `semester`
--
ALTER TABLE `semester`
  ADD PRIMARY KEY (`sem_id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`sl`);

--
-- Indexes for table `student_att`
--
ALTER TABLE `student_att`
  ADD PRIMARY KEY (`sl`);

--
-- Indexes for table `student_course`
--
ALTER TABLE `student_course`
  ADD PRIMARY KEY (`sl`);

--
-- Indexes for table `student_result`
--
ALTER TABLE `student_result`
  ADD PRIMARY KEY (`sl`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `class`
--
ALTER TABLE `class`
  MODIFY `class_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `course`
--
ALTER TABLE `course`
  MODIFY `course_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `department`
--
ALTER TABLE `department`
  MODIFY `dep_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `faculty`
--
ALTER TABLE `faculty`
  MODIFY `faculty_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `notice`
--
ALTER TABLE `notice`
  MODIFY `notice_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `program`
--
ALTER TABLE `program`
  MODIFY `prog_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `recent`
--
ALTER TABLE `recent`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `semester`
--
ALTER TABLE `semester`
  MODIFY `sem_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `sl` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `student_att`
--
ALTER TABLE `student_att`
  MODIFY `sl` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `student_course`
--
ALTER TABLE `student_course`
  MODIFY `sl` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `student_result`
--
ALTER TABLE `student_result`
  MODIFY `sl` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
