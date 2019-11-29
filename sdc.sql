-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 10, 2018 at 08:58 PM
-- Server version: 10.1.29-MariaDB
-- PHP Version: 7.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sdc`
--

-- --------------------------------------------------------

--
-- Table structure for table `case_file`
--

CREATE TABLE `case_file` (
  `case_id` int(11) NOT NULL,
  `stud_name` varchar(255) NOT NULL,
  `stud_id` varchar(255) NOT NULL,
  `stud_pic` varchar(255) NOT NULL,
  `case_title` varchar(255) NOT NULL,
  `case_stat` varchar(255) NOT NULL,
  `case_sesn` varchar(255) NOT NULL,
  `case_sem` varchar(255) NOT NULL,
  `creator` int(11) NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` int(5) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `case_file`
--

INSERT INTO `case_file` (`case_id`, `stud_name`, `stud_id`, `stud_pic`, `case_title`, `case_stat`, `case_sesn`, `case_sem`, `creator`, `date_created`, `status`) VALUES
(1, 'Lagbaja', '1234', '', 'Theft case', '1528646069sdgf.jpeg', '', '', 1, '2018-05-29 05:26:55', 0),
(2, 'Lakasegbe', '4567', '', 'Another taste of sin', '1528646069sdgf.jpeg', '', '', 1, '2018-05-29 08:19:19', 3),
(3, 'sdgf', 'fdgfd', '', 'dfgf', '1528646069sdgf.jpeg', '2015/2016', 'First', 1, '2018-06-10 15:54:29', 0),
(4, 'lkjhl', '767098', '1528653851lkjhl.png', 'ljjokli', '1528653851767098.png', '2015/2016', 'First Semester', 1, '2018-06-10 18:04:11', 0),
(5, 'lkjhl', '09589203', '1528653950lkjhl.png', 'ljjokli', '152865395009589203.png', '2015/2016', 'First Semester', 1, '2018-06-10 18:05:50', 0),
(6, 'fg;ldfkl', '09589203', '1528654022fg;ldfkl.png', 'ljjokli', '152865402209589203.png', '2015/2016', 'First Semester', 1, '2018-06-10 18:07:02', 1),
(7, 'fg;ldfkl', '09589203', '1528654111fg;ldfkl.png', 'ljjokli', '152865411109589203.png', '2015/2016', 'First Semester', 1, '2018-06-10 18:08:31', 0);

-- --------------------------------------------------------

--
-- Table structure for table `punishments`
--

CREATE TABLE `punishments` (
  `punish_id` int(11) NOT NULL,
  `case_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `punish` varchar(255) NOT NULL,
  `dated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `punishments`
--

INSERT INTO `punishments` (`punish_id`, `case_id`, `user_id`, `punish`, `dated`) VALUES
(24, 2, 3, '', '2018-06-08 13:44:08'),
(25, 2, 3, '', '2018-06-08 13:44:41'),
(26, 2, 3, '', '2018-06-08 13:46:16'),
(27, 2, 3, '', '2018-06-08 13:50:25'),
(28, 2, 3, '', '2018-06-08 13:54:37'),
(29, 2, 3, '', '2018-06-08 13:56:40'),
(30, 2, 3, '', '2018-06-08 14:19:29'),
(31, 2, 3, '', '2018-06-08 14:23:57'),
(32, 2, 3, '24', '2018-06-08 14:24:00'),
(33, 2, 3, '', '2018-06-08 14:30:56'),
(34, 2, 3, '', '2018-06-08 14:31:59'),
(35, 2, 3, '25', '2018-06-08 14:32:01');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `access_id` int(11) NOT NULL,
  `created_by` int(11) NOT NULL DEFAULT '0',
  `created_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `fullname`, `email`, `password`, `access_id`, `created_by`, `created_on`) VALUES
(1, 'Olanrewaju Daniel', 'danorelanre@gmail.com', '5e884898da28047151d0e56f8dc6292773603d0d6aabbdd62a11ef721d1542d8', 1, 0, '2018-05-29 08:58:44'),
(2, 'Ore-Oluwa Daniel', 'orelism1@gmail.com', '5e884898da28047151d0e56f8dc6292773603d0d6aabbdd62a11ef721d1542d8', 2, 0, '2018-05-29 08:58:44'),
(3, 'Daniel olanrewaju', 'olanrewajudaniel@gmail.com', '5e884898da28047151d0e56f8dc6292773603d0d6aabbdd62a11ef721d1542d8', 3, 0, '2018-05-29 08:58:44'),
(5, 'Somebody Anybody', 'dorelanre@gmail.com', 'b9c950640e1b3740e98acb93e669c65766f6670dd1609ba91ff41052ba48c6f3', 3, 1, '2018-05-29 09:16:31'),
(6, 'Daniel', 'daniel@gmail.com', 'b9c950640e1b3740e98acb93e669c65766f6670dd1609ba91ff41052ba48c6f3', 1, 3, '2018-06-06 18:51:59'),
(7, 'New Staff', 'newstaff@gmail.com', 'b9c950640e1b3740e98acb93e669c65766f6670dd1609ba91ff41052ba48c6f3', 3, 3, '2018-06-06 19:39:23'),
(8, 'New Staff', 'newstaffer@gmail.com', 'b9c950640e1b3740e98acb93e669c65766f6670dd1609ba91ff41052ba48c6f3', 3, 3, '2018-06-06 19:39:37'),
(9, 'New Staff', 'newstaffest@gmail.com', 'b9c950640e1b3740e98acb93e669c65766f6670dd1609ba91ff41052ba48c6f3', 3, 3, '2018-06-06 21:24:30'),
(10, 'admin', 'admin@gmail.com', '5e884898da28047151d0e56f8dc6292773603d0d6aabbdd62a11ef721d1542d8', 3, 0, '2018-06-10 15:34:25'),
(11, 'kjfdsnk', 'sadfasd@gmail.com', 'b9c950640e1b3740e98acb93e669c65766f6670dd1609ba91ff41052ba48c6f3', 2, 10, '2018-06-10 16:07:01');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `case_file`
--
ALTER TABLE `case_file`
  ADD PRIMARY KEY (`case_id`),
  ADD KEY `creator` (`creator`);

--
-- Indexes for table `punishments`
--
ALTER TABLE `punishments`
  ADD PRIMARY KEY (`punish_id`),
  ADD KEY `case_id` (`case_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD KEY `created_by` (`created_by`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `case_file`
--
ALTER TABLE `case_file`
  MODIFY `case_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `punishments`
--
ALTER TABLE `punishments`
  MODIFY `punish_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `case_file`
--
ALTER TABLE `case_file`
  ADD CONSTRAINT `case_file_ibfk_1` FOREIGN KEY (`creator`) REFERENCES `users` (`user_id`) ON UPDATE CASCADE;

--
-- Constraints for table `punishments`
--
ALTER TABLE `punishments`
  ADD CONSTRAINT `punishments_ibfk_1` FOREIGN KEY (`case_id`) REFERENCES `case_file` (`case_id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `punishments_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
