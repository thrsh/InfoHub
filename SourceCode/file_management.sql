-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 22, 2023 at 08:29 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `file_management`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_login`
--

CREATE TABLE `admin_login` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `admin_user` text NOT NULL,
  `admin_password` text NOT NULL,
  `admin_status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `admin_login`
--

INSERT INTO `admin_login` (`id`, `name`, `admin_user`, `admin_password`, `admin_status`) VALUES
(14, 'Admin 2', 'admin2@gmail.com', '$2y$12$EIZYM1USsxYCtNKoaQvTRe/RB.i6ivRP9RjbObkS4jPG5n8mIR5/y', 'Admin'),
(15, 'hmmm', 'hmm2@gmail.com', '$2y$12$nziLVYPYpy6/bq0GbA67ze2LLxF5g1BYm3rGUSE1h6VC7.MRpWj/W', ''),
(16, 'Staff2', 'staff@gmail.com', '$2y$12$FzsY5qCzt01JM0/9OGOrzO30w8M8gQPKY/.fLCy/Zox/tfLd.asTS', 'Staff');

-- --------------------------------------------------------

--
-- Table structure for table `history_log`
--

CREATE TABLE `history_log` (
  `log_id` int(11) NOT NULL,
  `id` int(11) NOT NULL,
  `email_address` text NOT NULL,
  `action` varchar(100) NOT NULL,
  `actions` varchar(200) NOT NULL DEFAULT 'Has LoggedOut the system at',
  `ip` text NOT NULL,
  `host` text NOT NULL,
  `login_time` varchar(200) NOT NULL,
  `logout_time` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `history_log1`
--

CREATE TABLE `history_log1` (
  `log_id` int(11) NOT NULL,
  `id` int(11) NOT NULL,
  `admin_user` text NOT NULL,
  `action` varchar(100) NOT NULL,
  `actions` varchar(200) NOT NULL DEFAULT 'Has LoggedOut the system at',
  `ip` text NOT NULL,
  `host` text NOT NULL,
  `login_time` varchar(200) NOT NULL,
  `logout_time` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `history_log1`
--

INSERT INTO `history_log1` (`log_id`, `id`, `admin_user`, `action`, `actions`, `ip`, `host`, `login_time`, `logout_time`) VALUES
(0, 13, 'admin@campcodes.com', 'Has LoggedIn the system at', 'Has LoggedOut the system at', '::1', 'Yuji', 'Jun-19-2023 07:22 AM', 'Jun-19-2023 07:22 AM'),
(0, 14, 'admin2@gmail.com', 'Has LoggedIn the system at', 'Has LoggedOut the system at', '::1', 'Yuji', 'Jun-19-2023 07:22 AM', 'Jun-22-2023 02:03 PM'),
(0, 14, 'admin2@gmail.com', 'Has LoggedIn the system at', 'Has LoggedOut the system at', '::1', 'Yuji', 'Jun-19-2023 08:21 AM', 'Jun-22-2023 02:03 PM'),
(0, 14, 'admin2@gmail.com', 'Has LoggedIn the system at', 'Has LoggedOut the system at', '::1', 'Yuji', 'Jun-19-2023 02:13 PM', 'Jun-22-2023 02:03 PM'),
(0, 14, 'admin2@gmail.com', 'Has LoggedIn the system at', 'Has LoggedOut the system at', '::1', 'Yuji', 'Jun-19-2023 02:42 PM', 'Jun-22-2023 02:03 PM'),
(0, 14, 'admin2@gmail.com', 'Has LoggedIn the system at', 'Has LoggedOut the system at', '::1', 'Yuji', 'Jun-19-2023 04:25 PM', 'Jun-22-2023 02:03 PM'),
(0, 14, 'admin2@gmail.com', 'Has LoggedIn the system at', 'Has LoggedOut the system at', '::1', 'Yuji', 'Jun-20-2023 03:30 PM', 'Jun-22-2023 02:03 PM'),
(0, 14, 'admin2@gmail.com', 'Has LoggedIn the system at', 'Has LoggedOut the system at', '::1', 'Yuji', 'Jun-20-2023 03:37 PM', 'Jun-22-2023 02:03 PM'),
(0, 14, 'admin2@gmail.com', 'Has LoggedIn the system at', 'Has LoggedOut the system at', '::1', 'Yuji', 'Jun-21-2023 06:41 AM', 'Jun-22-2023 02:03 PM'),
(0, 14, 'admin2@gmail.com', 'Has LoggedIn the system at', 'Has LoggedOut the system at', '::1', 'Yuji', 'Jun-21-2023 06:42 AM', 'Jun-22-2023 02:03 PM'),
(0, 14, 'admin2@gmail.com', 'Has LoggedIn the system at', 'Has LoggedOut the system at', '::1', 'Yuji', 'Jun-21-2023 08:15 AM', 'Jun-22-2023 02:03 PM'),
(0, 14, 'admin2@gmail.com', 'Has LoggedIn the system at', 'Has LoggedOut the system at', '::1', 'Yuji', 'Jun-21-2023 09:49 AM', 'Jun-22-2023 02:03 PM'),
(0, 14, 'admin2@gmail.com', 'Has LoggedIn the system at', 'Has LoggedOut the system at', '::1', 'Yuji', 'Jun-21-2023 01:15 PM', 'Jun-22-2023 02:03 PM'),
(0, 14, 'admin2@gmail.com', 'Has LoggedIn the system at', 'Has LoggedOut the system at', '::1', 'Yuji', 'Jun-21-2023 02:59 PM', 'Jun-22-2023 02:03 PM'),
(0, 14, 'admin2@gmail.com', 'Has LoggedIn the system at', 'Has LoggedOut the system at', '::1', 'Yuji', 'Jun-22-2023 10:28 AM', 'Jun-22-2023 02:03 PM'),
(0, 14, 'admin2@gmail.com', 'Has LoggedIn the system at', 'Has LoggedOut the system at', '::1', 'Yuji', 'Jun-22-2023 12:53 PM', 'Jun-22-2023 02:03 PM'),
(0, 14, 'admin2@gmail.com', 'Has LoggedIn the system at', 'Has LoggedOut the system at', '::1', 'Yuji', 'Jun-22-2023 02:15 PM', '');

-- --------------------------------------------------------

--
-- Table structure for table `login_user`
--

CREATE TABLE `login_user` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `email_address` text NOT NULL,
  `user_password` text NOT NULL,
  `user_status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `upload_files`
--

CREATE TABLE `upload_files` (
  `ID` int(11) NOT NULL,
  `NAME` varchar(200) NOT NULL,
  `SIZE` varchar(200) NOT NULL,
  `DOWNLOAD` varchar(200) NOT NULL,
  `TIMERS` varchar(200) NOT NULL,
  `ADMIN_STATUS` varchar(300) NOT NULL,
  `EMAIL` text NOT NULL,
  `DocumentTItle` varchar(55) NOT NULL,
  `RetentionPeriod` varchar(55) NOT NULL,
  `IssuanceDate` varchar(55) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `upload_files`
--

INSERT INTO `upload_files` (`ID`, `NAME`, `SIZE`, `DOWNLOAD`, `TIMERS`, `ADMIN_STATUS`, `EMAIL`, `DocumentTItle`, `RetentionPeriod`, `IssuanceDate`) VALUES
(4, 'Business-Plan-in-BE.docx', '21572', '3', 'Jun-19-2023 07:25 AM', 'Admin', 'Admin 2', '', '', ''),
(5, 'Panaligan,Ma. Thrisha.pdf', '194843', '9', 'Jun-19-2023 07:25 AM', 'Admin', 'Admin 2', '', '', ''),
(6, 'Business-Plan-in-BE (1).docx', '21572', '1', 'Jun-19-2023 07:29 AM', 'Admin', 'Admin 2', '', '', ''),
(7, 'Ken.docx', '374854', '0', 'Jun-21-2023 02:57 PM', 'Admin', 'Admin 2', '', '', ''),
(8, 'diploma.docx', '1851064', '0', 'Jun-22-2023 10:34 AM', 'Admin', 'Admin 2', 'TItle 1', '365', '2023-06-14');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_login`
--
ALTER TABLE `admin_login`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `login_user`
--
ALTER TABLE `login_user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `upload_files`
--
ALTER TABLE `upload_files`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_login`
--
ALTER TABLE `admin_login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `login_user`
--
ALTER TABLE `login_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `upload_files`
--
ALTER TABLE `upload_files`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
