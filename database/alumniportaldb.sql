-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 08, 2020 at 05:46 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `alumniportaldb`
--

-- --------------------------------------------------------

--
-- Table structure for table `capsu_college`
--

CREATE TABLE `capsu_college` (
  `colleges_ID` int(11) UNSIGNED NOT NULL,
  `college_name` varchar(150) DEFAULT NULL,
  `college_acronym` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `capsu_college`
--

INSERT INTO `capsu_college` (`colleges_ID`, `college_name`, `college_acronym`) VALUES
(1, 'Capiz State University', 'CAPSU');

-- --------------------------------------------------------

--
-- Table structure for table `capsu_course`
--

CREATE TABLE `capsu_course` (
  `course_ID` int(11) UNSIGNED NOT NULL,
  `course_departmentID` int(11) UNSIGNED DEFAULT NULL,
  `course_name` varchar(100) DEFAULT NULL,
  `course_acronym` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `capsu_course`
--

INSERT INTO `capsu_course` (`course_ID`, `course_departmentID`, `course_name`, `course_acronym`) VALUES
(6, 1, 'Bachelor of Science in Computer Science', 'BSCS'),
(7, 1, 'Bachelor of Science in Elementary Education', 'BSED'),
(8, 1, 'Bachelor in Physical Education', 'BPED'),
(9, 1, 'Bachelor in Secondary Education', 'BSED');

-- --------------------------------------------------------

--
-- Table structure for table `capsu_department`
--

CREATE TABLE `capsu_department` (
  `department_ID` int(11) UNSIGNED NOT NULL,
  `department_collegeID` int(11) UNSIGNED DEFAULT NULL,
  `department_name` varchar(100) DEFAULT NULL,
  `department_acronym` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `capsu_department`
--

INSERT INTO `capsu_department` (`department_ID`, `department_collegeID`, `department_name`, `department_acronym`) VALUES
(1, 1, 'College of Education Arts and Sciences', 'COEAS');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `feedback_ID` int(11) NOT NULL,
  `subject` varchar(50) NOT NULL,
  `message` text NOT NULL,
  `from_user` varchar(50) NOT NULL,
  `message_date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `forum_comment`
--

CREATE TABLE `forum_comment` (
  `comment_ID` int(11) UNSIGNED NOT NULL,
  `comment_topicID` int(11) UNSIGNED DEFAULT NULL,
  `comment_userID` int(11) UNSIGNED DEFAULT NULL,
  `comment_content` varchar(500) DEFAULT NULL,
  `comment_date` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `forum_comment_reply`
--

CREATE TABLE `forum_comment_reply` (
  `comment_reply_ID` int(11) UNSIGNED NOT NULL,
  `comment_reply_topicID` int(10) UNSIGNED DEFAULT NULL,
  `comment_reply_parentID` int(11) UNSIGNED DEFAULT NULL,
  `comment_reply_userID` int(11) UNSIGNED DEFAULT NULL,
  `comment_reply_content` varchar(500) DEFAULT NULL,
  `comment_reply_date` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `forum_topic`
--

CREATE TABLE `forum_topic` (
  `topic_ID` int(11) UNSIGNED NOT NULL,
  `post_title` varchar(150) DEFAULT NULL,
  `post_owner_id` int(11) UNSIGNED DEFAULT NULL,
  `post_date` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `post_content` varchar(50000) DEFAULT NULL,
  `post_status` varchar(25) DEFAULT 'UNPIN'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `marital_status`
--

CREATE TABLE `marital_status` (
  `ID` int(11) UNSIGNED NOT NULL,
  `marital_Name` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `marital_status`
--

INSERT INTO `marital_status` (`ID`, `marital_Name`) VALUES
(1, 'Single'),
(2, 'Married'),
(3, 'Widowed');

-- --------------------------------------------------------

--
-- Table structure for table `message_send`
--

CREATE TABLE `message_send` (
  `message_ID` int(11) UNSIGNED NOT NULL,
  `message_threadID` int(11) UNSIGNED DEFAULT NULL,
  `message_sendDate` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `message_content` varchar(1500) DEFAULT NULL,
  `message_receiver` int(11) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `message_send_state`
--

CREATE TABLE `message_send_state` (
  `state_ID` int(11) UNSIGNED NOT NULL,
  `state_msgID` int(11) UNSIGNED DEFAULT NULL,
  `state_readerID` int(11) UNSIGNED DEFAULT NULL,
  `state_dateRead` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `message_thread`
--

CREATE TABLE `message_thread` (
  `thread_ID` int(11) UNSIGNED NOT NULL,
  `thread_name` varchar(150) DEFAULT NULL,
  `thread_created` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `message_thread_participant`
--

CREATE TABLE `message_thread_participant` (
  `participant_ID` int(11) UNSIGNED NOT NULL,
  `participant_threadID` int(11) UNSIGNED DEFAULT NULL,
  `participant_userID` int(11) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `student_tracer_detail`
--

CREATE TABLE `student_tracer_detail` (
  `id` int(11) NOT NULL,
  `student_ID` varchar(25) NOT NULL,
  `campus` varchar(20) NOT NULL,
  `date_hired_current_job` date DEFAULT NULL,
  `status_employment` varchar(20) DEFAULT NULL,
  `monthly_income` varchar(20) DEFAULT NULL,
  `percentage_increase` varchar(10) DEFAULT NULL,
  `employer` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `suggested_job`
--

CREATE TABLE `suggested_job` (
  `job_ID` int(11) UNSIGNED NOT NULL,
  `job_Title` varchar(250) DEFAULT NULL,
  `job_company` varchar(50) NOT NULL,
  `job_email` varchar(50) DEFAULT NULL,
  `job_contact_number` varchar(50) DEFAULT NULL,
  `website` varchar(50) NOT NULL,
  `job_description` text DEFAULT NULL,
  `job_location` varchar(50) DEFAULT NULL,
  `job_field_work` varchar(20) NOT NULL,
  `job_posted_date` datetime NOT NULL DEFAULT current_timestamp(),
  `job_Course` int(11) UNSIGNED DEFAULT NULL,
  `job_status` varchar(10) NOT NULL DEFAULT 'Inactive'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user_account`
--

CREATE TABLE `user_account` (
  `user_ID` int(11) UNSIGNED NOT NULL,
  `user_level` int(11) UNSIGNED DEFAULT NULL,
  `user_name` varchar(25) DEFAULT NULL,
  `user_password` mediumtext DEFAULT NULL,
  `user_created` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_account`
--

INSERT INTO `user_account` (`user_ID`, `user_level`, `user_name`, `user_password`, `user_created`) VALUES
(3, 3, 'admin', '21232f297a57a5a743894a0e4a801fc3', '2019-10-19 06:40:32');

-- --------------------------------------------------------

--
-- Table structure for table `user_admin_detail`
--

CREATE TABLE `user_admin_detail` (
  `admin_ID` int(11) UNSIGNED NOT NULL,
  `admin_userID` int(11) UNSIGNED DEFAULT NULL,
  `admin_img` varchar(250) DEFAULT 'temp.gif',
  `admin_fName` varchar(100) DEFAULT NULL,
  `admin_mName` varchar(25) DEFAULT NULL,
  `admin_lName` varchar(50) DEFAULT NULL,
  `admin_address` varchar(250) DEFAULT NULL,
  `admin_status` varchar(10) DEFAULT 'unregister',
  `admin_gender` varchar(1) DEFAULT NULL,
  `admin_dob` date DEFAULT NULL,
  `admin_contact` varchar(11) DEFAULT NULL,
  `admin_civilStat` int(11) UNSIGNED DEFAULT NULL,
  `admin_secretquestion` varchar(250) DEFAULT NULL,
  `admin_secretanswer` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_admin_detail`
--

INSERT INTO `user_admin_detail` (`admin_ID`, `admin_userID`, `admin_img`, `admin_fName`, `admin_mName`, `admin_lName`, `admin_address`, `admin_status`, `admin_gender`, `admin_dob`, `admin_contact`, `admin_civilStat`, `admin_secretquestion`, `admin_secretanswer`) VALUES
(1, 3, 'Rheza.png', 'Rheza', 'Lachica', 'Alba', 'Bailan Capiz', 'register', 'F', '0000-00-00', '09169158798', 1, 'name', 'name');

-- --------------------------------------------------------

--
-- Table structure for table `user_level`
--

CREATE TABLE `user_level` (
  `level_ID` int(11) UNSIGNED NOT NULL,
  `level_name` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_level`
--

INSERT INTO `user_level` (`level_ID`, `level_name`) VALUES
(0, 'unregister'),
(1, 'student'),
(2, 'teacher'),
(3, 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `user_notification`
--

CREATE TABLE `user_notification` (
  `notif_ID` int(11) UNSIGNED NOT NULL,
  `notif_typeID` int(11) UNSIGNED DEFAULT NULL,
  `notif_topicID` int(11) UNSIGNED DEFAULT NULL,
  `notif_userID` int(11) UNSIGNED DEFAULT NULL,
  `notif_receiverID` int(11) UNSIGNED DEFAULT NULL,
  `notif_date` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `notif_state` int(11) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user_notif_state`
--

CREATE TABLE `user_notif_state` (
  `status_ID` int(11) UNSIGNED NOT NULL,
  `status_Desc` varchar(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user_notif_type`
--

CREATE TABLE `user_notif_type` (
  `type_ID` int(11) UNSIGNED NOT NULL,
  `type_Name` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user_student_detail`
--

CREATE TABLE `user_student_detail` (
  `student_ID` int(11) NOT NULL,
  `student_userID` int(11) UNSIGNED DEFAULT NULL,
  `student_img` varchar(250) DEFAULT 'temp.gif',
  `student_IDNumber` varchar(25) DEFAULT NULL,
  `student_fName` varchar(100) DEFAULT NULL,
  `student_mName` varchar(25) DEFAULT NULL,
  `student_lName` varchar(50) DEFAULT NULL,
  `student_address` varchar(250) DEFAULT NULL,
  `student_civilStat` int(11) UNSIGNED DEFAULT NULL,
  `student_dob` date DEFAULT NULL,
  `student_gender` varchar(1) DEFAULT NULL,
  `student_contact` varchar(11) DEFAULT NULL,
  `student_admission` date DEFAULT NULL,
  `student_year_grad` date DEFAULT NULL,
  `student_department` int(11) UNSIGNED DEFAULT NULL,
  `student_course` int(11) UNSIGNED DEFAULT NULL,
  `student_status` varchar(10) DEFAULT 'unregister',
  `student_secretquestion` varchar(250) DEFAULT NULL,
  `student_secretanswer` varchar(100) DEFAULT NULL,
  `student_email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user_teacher_detail`
--

CREATE TABLE `user_teacher_detail` (
  `teacher_ID` int(11) UNSIGNED NOT NULL,
  `teacher_userID` int(11) UNSIGNED DEFAULT NULL,
  `teacher_img` varchar(250) DEFAULT 'temp.gif',
  `teacher_facultyID` int(11) UNSIGNED DEFAULT NULL,
  `teacher_fName` varchar(100) DEFAULT NULL,
  `teacher_mName` varchar(25) DEFAULT NULL,
  `teacher_lName` varchar(50) DEFAULT NULL,
  `teacher_gender` varchar(1) DEFAULT NULL,
  `teacher_dob` date DEFAULT NULL,
  `teacher_contact` varchar(11) DEFAULT NULL,
  `teacher_address` varchar(250) DEFAULT NULL,
  `teacher_civilStat` int(11) UNSIGNED DEFAULT NULL,
  `teacher_department` int(11) UNSIGNED DEFAULT NULL,
  `teacher_status` varchar(10) DEFAULT 'unregister',
  `teacher_secretquestion` varchar(250) DEFAULT NULL,
  `teacher_secretanswer` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `view_counter`
--

CREATE TABLE `view_counter` (
  `view_ID` int(11) UNSIGNED NOT NULL,
  `view_topicID` int(11) UNSIGNED DEFAULT NULL,
  `view_count` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `capsu_college`
--
ALTER TABLE `capsu_college`
  ADD PRIMARY KEY (`colleges_ID`);

--
-- Indexes for table `capsu_course`
--
ALTER TABLE `capsu_course`
  ADD PRIMARY KEY (`course_ID`),
  ADD KEY `course_departmentID` (`course_departmentID`);

--
-- Indexes for table `capsu_department`
--
ALTER TABLE `capsu_department`
  ADD PRIMARY KEY (`department_ID`),
  ADD KEY `department_collegeID` (`department_collegeID`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`feedback_ID`);

--
-- Indexes for table `forum_comment`
--
ALTER TABLE `forum_comment`
  ADD PRIMARY KEY (`comment_ID`),
  ADD KEY `comment_topicID` (`comment_topicID`),
  ADD KEY `comment_userID` (`comment_userID`);

--
-- Indexes for table `forum_comment_reply`
--
ALTER TABLE `forum_comment_reply`
  ADD PRIMARY KEY (`comment_reply_ID`),
  ADD KEY `comment_reply_parentID` (`comment_reply_parentID`),
  ADD KEY `comment_reply_userID` (`comment_reply_userID`),
  ADD KEY `comment_reply_topicID` (`comment_reply_topicID`);

--
-- Indexes for table `forum_topic`
--
ALTER TABLE `forum_topic`
  ADD PRIMARY KEY (`topic_ID`),
  ADD KEY `post_owner_id` (`post_owner_id`);

--
-- Indexes for table `marital_status`
--
ALTER TABLE `marital_status`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `message_send`
--
ALTER TABLE `message_send`
  ADD PRIMARY KEY (`message_ID`),
  ADD KEY `message_threadID` (`message_threadID`),
  ADD KEY `message_receiver` (`message_receiver`);

--
-- Indexes for table `message_send_state`
--
ALTER TABLE `message_send_state`
  ADD PRIMARY KEY (`state_ID`),
  ADD KEY `state_msgID` (`state_msgID`),
  ADD KEY `state_readerID` (`state_readerID`);

--
-- Indexes for table `message_thread`
--
ALTER TABLE `message_thread`
  ADD PRIMARY KEY (`thread_ID`);

--
-- Indexes for table `message_thread_participant`
--
ALTER TABLE `message_thread_participant`
  ADD PRIMARY KEY (`participant_ID`),
  ADD KEY `participant_threadID` (`participant_threadID`),
  ADD KEY `participant_userID` (`participant_userID`);

--
-- Indexes for table `student_tracer_detail`
--
ALTER TABLE `student_tracer_detail`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `student_id_fk` (`student_ID`);

--
-- Indexes for table `suggested_job`
--
ALTER TABLE `suggested_job`
  ADD PRIMARY KEY (`job_ID`),
  ADD KEY `job_Course` (`job_Course`);

--
-- Indexes for table `user_account`
--
ALTER TABLE `user_account`
  ADD PRIMARY KEY (`user_ID`),
  ADD KEY `user_level` (`user_level`);

--
-- Indexes for table `user_admin_detail`
--
ALTER TABLE `user_admin_detail`
  ADD PRIMARY KEY (`admin_ID`),
  ADD KEY `admin_userID` (`admin_userID`),
  ADD KEY `admin_civilStat` (`admin_civilStat`);

--
-- Indexes for table `user_level`
--
ALTER TABLE `user_level`
  ADD PRIMARY KEY (`level_ID`);

--
-- Indexes for table `user_notification`
--
ALTER TABLE `user_notification`
  ADD PRIMARY KEY (`notif_ID`),
  ADD KEY `notif_topicID` (`notif_topicID`),
  ADD KEY `notif_userID` (`notif_userID`),
  ADD KEY `notif_receiverID` (`notif_receiverID`);

--
-- Indexes for table `user_notif_state`
--
ALTER TABLE `user_notif_state`
  ADD PRIMARY KEY (`status_ID`);

--
-- Indexes for table `user_notif_type`
--
ALTER TABLE `user_notif_type`
  ADD PRIMARY KEY (`type_ID`);

--
-- Indexes for table `user_student_detail`
--
ALTER TABLE `user_student_detail`
  ADD PRIMARY KEY (`student_ID`),
  ADD UNIQUE KEY `student_IDNumber` (`student_IDNumber`),
  ADD KEY `student_department` (`student_department`),
  ADD KEY `student_userID` (`student_userID`),
  ADD KEY `student_civilStat` (`student_civilStat`),
  ADD KEY `user_student_detail_ibfk_4` (`student_course`);

--
-- Indexes for table `user_teacher_detail`
--
ALTER TABLE `user_teacher_detail`
  ADD PRIMARY KEY (`teacher_ID`),
  ADD UNIQUE KEY `teacher_facultyID` (`teacher_facultyID`),
  ADD KEY `teacher_userID` (`teacher_userID`),
  ADD KEY `teacher_department` (`teacher_department`),
  ADD KEY `teacher_civilStat` (`teacher_civilStat`);

--
-- Indexes for table `view_counter`
--
ALTER TABLE `view_counter`
  ADD PRIMARY KEY (`view_ID`),
  ADD KEY `view_topicID` (`view_topicID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `capsu_college`
--
ALTER TABLE `capsu_college`
  MODIFY `colleges_ID` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `capsu_course`
--
ALTER TABLE `capsu_course`
  MODIFY `course_ID` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `capsu_department`
--
ALTER TABLE `capsu_department`
  MODIFY `department_ID` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `feedback_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `forum_comment`
--
ALTER TABLE `forum_comment`
  MODIFY `comment_ID` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `forum_comment_reply`
--
ALTER TABLE `forum_comment_reply`
  MODIFY `comment_reply_ID` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `forum_topic`
--
ALTER TABLE `forum_topic`
  MODIFY `topic_ID` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `marital_status`
--
ALTER TABLE `marital_status`
  MODIFY `ID` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `message_send`
--
ALTER TABLE `message_send`
  MODIFY `message_ID` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `message_send_state`
--
ALTER TABLE `message_send_state`
  MODIFY `state_ID` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `message_thread`
--
ALTER TABLE `message_thread`
  MODIFY `thread_ID` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `message_thread_participant`
--
ALTER TABLE `message_thread_participant`
  MODIFY `participant_ID` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `student_tracer_detail`
--
ALTER TABLE `student_tracer_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `suggested_job`
--
ALTER TABLE `suggested_job`
  MODIFY `job_ID` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT for table `user_account`
--
ALTER TABLE `user_account`
  MODIFY `user_ID` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT for table `user_admin_detail`
--
ALTER TABLE `user_admin_detail`
  MODIFY `admin_ID` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user_level`
--
ALTER TABLE `user_level`
  MODIFY `level_ID` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user_notification`
--
ALTER TABLE `user_notification`
  MODIFY `notif_ID` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `user_notif_state`
--
ALTER TABLE `user_notif_state`
  MODIFY `status_ID` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user_notif_type`
--
ALTER TABLE `user_notif_type`
  MODIFY `type_ID` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user_student_detail`
--
ALTER TABLE `user_student_detail`
  MODIFY `student_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT for table `user_teacher_detail`
--
ALTER TABLE `user_teacher_detail`
  MODIFY `teacher_ID` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=156;

--
-- AUTO_INCREMENT for table `view_counter`
--
ALTER TABLE `view_counter`
  MODIFY `view_ID` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `capsu_course`
--
ALTER TABLE `capsu_course`
  ADD CONSTRAINT `capsu_course_ibfk_1` FOREIGN KEY (`course_departmentID`) REFERENCES `capsu_department` (`department_ID`);

--
-- Constraints for table `capsu_department`
--
ALTER TABLE `capsu_department`
  ADD CONSTRAINT `capsu_department_ibfk_1` FOREIGN KEY (`department_collegeID`) REFERENCES `capsu_college` (`colleges_ID`);

--
-- Constraints for table `forum_comment`
--
ALTER TABLE `forum_comment`
  ADD CONSTRAINT `forum_comment_ibfk_1` FOREIGN KEY (`comment_topicID`) REFERENCES `forum_topic` (`topic_ID`),
  ADD CONSTRAINT `forum_comment_ibfk_2` FOREIGN KEY (`comment_userID`) REFERENCES `user_account` (`user_ID`);

--
-- Constraints for table `forum_comment_reply`
--
ALTER TABLE `forum_comment_reply`
  ADD CONSTRAINT `forum_comment_reply_ibfk_1` FOREIGN KEY (`comment_reply_parentID`) REFERENCES `forum_comment` (`comment_ID`),
  ADD CONSTRAINT `forum_comment_reply_ibfk_2` FOREIGN KEY (`comment_reply_userID`) REFERENCES `user_account` (`user_ID`),
  ADD CONSTRAINT `forum_comment_reply_ibfk_3` FOREIGN KEY (`comment_reply_topicID`) REFERENCES `forum_topic` (`topic_ID`);

--
-- Constraints for table `forum_topic`
--
ALTER TABLE `forum_topic`
  ADD CONSTRAINT `forum_topic_ibfk_1` FOREIGN KEY (`post_owner_id`) REFERENCES `user_account` (`user_ID`);

--
-- Constraints for table `message_send`
--
ALTER TABLE `message_send`
  ADD CONSTRAINT `message_send_ibfk_1` FOREIGN KEY (`message_threadID`) REFERENCES `message_thread` (`thread_ID`),
  ADD CONSTRAINT `message_send_ibfk_2` FOREIGN KEY (`message_receiver`) REFERENCES `user_account` (`user_ID`);

--
-- Constraints for table `message_send_state`
--
ALTER TABLE `message_send_state`
  ADD CONSTRAINT `message_send_state_ibfk_1` FOREIGN KEY (`state_msgID`) REFERENCES `message_send` (`message_ID`),
  ADD CONSTRAINT `message_send_state_ibfk_2` FOREIGN KEY (`state_readerID`) REFERENCES `user_account` (`user_ID`);

--
-- Constraints for table `message_thread_participant`
--
ALTER TABLE `message_thread_participant`
  ADD CONSTRAINT `message_thread_participant_ibfk_1` FOREIGN KEY (`participant_threadID`) REFERENCES `message_thread` (`thread_ID`),
  ADD CONSTRAINT `message_thread_participant_ibfk_2` FOREIGN KEY (`participant_userID`) REFERENCES `user_account` (`user_ID`);

--
-- Constraints for table `suggested_job`
--
ALTER TABLE `suggested_job`
  ADD CONSTRAINT `suggested_job_ibfk_1` FOREIGN KEY (`job_Course`) REFERENCES `capsu_course` (`course_ID`);

--
-- Constraints for table `user_account`
--
ALTER TABLE `user_account`
  ADD CONSTRAINT `user_account_ibfk_1` FOREIGN KEY (`user_level`) REFERENCES `user_level` (`level_ID`);

--
-- Constraints for table `user_admin_detail`
--
ALTER TABLE `user_admin_detail`
  ADD CONSTRAINT `user_admin_detail_ibfk_1` FOREIGN KEY (`admin_userID`) REFERENCES `user_account` (`user_ID`),
  ADD CONSTRAINT `user_admin_detail_ibfk_2` FOREIGN KEY (`admin_civilStat`) REFERENCES `marital_status` (`ID`);

--
-- Constraints for table `user_notification`
--
ALTER TABLE `user_notification`
  ADD CONSTRAINT `user_notification_ibfk_2` FOREIGN KEY (`notif_userID`) REFERENCES `user_account` (`user_ID`),
  ADD CONSTRAINT `user_notification_ibfk_3` FOREIGN KEY (`notif_receiverID`) REFERENCES `user_account` (`user_ID`);

--
-- Constraints for table `user_student_detail`
--
ALTER TABLE `user_student_detail`
  ADD CONSTRAINT `user_student_detail_ibfk_1` FOREIGN KEY (`student_department`) REFERENCES `capsu_department` (`department_ID`),
  ADD CONSTRAINT `user_student_detail_ibfk_2` FOREIGN KEY (`student_userID`) REFERENCES `user_account` (`user_ID`),
  ADD CONSTRAINT `user_student_detail_ibfk_3` FOREIGN KEY (`student_civilStat`) REFERENCES `marital_status` (`ID`),
  ADD CONSTRAINT `user_student_detail_ibfk_4` FOREIGN KEY (`student_course`) REFERENCES `capsu_course` (`course_ID`);

--
-- Constraints for table `user_teacher_detail`
--
ALTER TABLE `user_teacher_detail`
  ADD CONSTRAINT `user_teacher_detail_ibfk_1` FOREIGN KEY (`teacher_userID`) REFERENCES `user_account` (`user_ID`),
  ADD CONSTRAINT `user_teacher_detail_ibfk_2` FOREIGN KEY (`teacher_department`) REFERENCES `capsu_department` (`department_ID`),
  ADD CONSTRAINT `user_teacher_detail_ibfk_3` FOREIGN KEY (`teacher_civilStat`) REFERENCES `marital_status` (`ID`);

--
-- Constraints for table `view_counter`
--
ALTER TABLE `view_counter`
  ADD CONSTRAINT `view_counter_ibfk_1` FOREIGN KEY (`view_topicID`) REFERENCES `forum_topic` (`topic_ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
