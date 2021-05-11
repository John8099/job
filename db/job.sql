-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 11, 2021 at 09:46 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.2.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `job`
--

-- --------------------------------------------------------

--
-- Table structure for table `apply`
--

CREATE TABLE `apply` (
  `apply_id` int(11) NOT NULL,
  `applied_to` int(11) NOT NULL,
  `applied_by` int(11) NOT NULL,
  `attach` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `apply`
--

INSERT INTO `apply` (`apply_id`, `applied_to`, `applied_by`, `attach`) VALUES
(4, 6, 5, '609a2fc6d7e48_1.png');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `cat_id` int(11) NOT NULL,
  `expertise` varchar(52) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`cat_id`, `expertise`) VALUES
(1, 'driver'),
(2, 'cook'),
(3, 'gardener'),
(4, 'plumber');

-- --------------------------------------------------------

--
-- Table structure for table `employment`
--

CREATE TABLE `employment` (
  `employment_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `employer_id` int(11) NOT NULL,
  `ratings` int(11) DEFAULT NULL,
  `comment` varchar(250) NOT NULL,
  `hired_on` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `employment`
--

INSERT INTO `employment` (`employment_id`, `user_id`, `employer_id`, `ratings`, `comment`, `hired_on`) VALUES
(1, 2, 4, 5, 'best of the best', '2021-03-08 07:14:23'),
(2, 3, 4, NULL, '', '2021-03-12 13:53:50');

-- --------------------------------------------------------

--
-- Table structure for table `hiring`
--

CREATE TABLE `hiring` (
  `id` int(11) NOT NULL,
  `job_name` varchar(55) NOT NULL,
  `company` varchar(55) NOT NULL,
  `location` varchar(55) NOT NULL,
  `job_desc` varchar(55) NOT NULL,
  `resp` varchar(55) NOT NULL,
  `qualifications` varchar(55) NOT NULL,
  `overview` varchar(55) NOT NULL,
  `date_posted` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `posted_by` int(55) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `hiring`
--

INSERT INTO `hiring` (`id`, `job_name`, `company`, `location`, `job_desc`, `resp`, `qualifications`, `overview`, `date_posted`, `posted_by`) VALUES
(1, 'awd', 'awd', 'awd', 'awd', 'awd', 'awd', 'awd', '2021-05-11 06:35:45', 6);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `fname` varchar(52) NOT NULL,
  `lname` varchar(52) NOT NULL,
  `bday` date DEFAULT NULL,
  `address` varchar(100) NOT NULL,
  `cnum` varchar(32) NOT NULL,
  `expertise` varchar(52) NOT NULL,
  `uname` varchar(32) NOT NULL,
  `pass` varchar(100) NOT NULL,
  `hiredby` int(11) DEFAULT NULL,
  `usertype` text NOT NULL,
  `createAt` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `fname`, `lname`, `bday`, `address`, `cnum`, `expertise`, `uname`, `pass`, `hiredby`, `usertype`, `createAt`) VALUES
(1, '', '', NULL, '', '', '', 'admin', '$argon2i$v=19$m=65536,t=4,p=1$RDM4eFh4Q1Z4T0l3MURabA$G4OoqCe5FNTskZyqjHRR33li8eIyzIWxrPLDUctIRvk', NULL, 'admin', '2021-03-05 06:43:15'),
(2, 'applicant fname', 'applicant lname', '1987-03-05', 'address', '09279172745', '1', 'applicant1', '$argon2i$v=19$m=65536,t=4,p=1$TnkuTEx2L2tJN0pmTFpuYw$hDS12weWf2Nac9mfp6ZfrzDb0VC/dzEtPhUNG3Fcwmw', NULL, 'applicant', '2021-03-08 07:14:23'),
(3, 'applicant fname', 'applicant lname', '1956-02-07', 'address', '09515185759', '2', 'applicant2', '$argon2i$v=19$m=65536,t=4,p=1$L095Ym1xU2NHQkhYbGNOdA$mFnQyrx0B8OYlz9OpBRFF2KkKA5veBb9pA0nRSPVquA', 4, 'applicant', '2021-03-12 13:53:50'),
(4, 'employer', 'employer', '1971-03-08', 'address', '09279172745', '1', 'employer', '$argon2i$v=19$m=65536,t=4,p=1$TWE3djVORVgyZjcvaXBpSw$a1LgRWh+p0O0cz1wP3A+pGIVzpn9PKYfNE3vN7SaAfg', NULL, 'employer', '2021-03-08 07:10:05'),
(5, 'sample', 'sample', '2022-06-11', 'sample', '0987654321', '1', 'sample', '$argon2i$v=19$m=65536,t=4,p=1$aGJuTnlDSUZLbHRPenBYVA$zMjVINDW6fTI2XTqEMorEPlKswwzLOkd3/JVR0cO39I', NULL, 'applicant', '2021-05-10 05:36:35'),
(6, 'sample1', 'sample1', '2002-06-11', 'sample', '098765432', '1', 'sample1', '$argon2i$v=19$m=65536,t=4,p=1$Ujcud2pJN1MxZmN1NFhTWQ$u7YfvtwnF+l8cgcMHo0kEOkaqM26sNn5gAdF/VKlezU', NULL, 'employer', '2021-05-10 05:37:35'),
(7, 'sample2', 'sample2', '1996-06-11', 'sample', '098765432', '1', 'sample2', '$argon2i$v=19$m=65536,t=4,p=1$bFAwaHlKcTVhUS9NQVh3WA$Wl3b7VeSZQr99ZKMa8fdJR9dAycdhbxYNFIa6afwWjo', NULL, 'employer', '2021-05-10 05:38:02');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `apply`
--
ALTER TABLE `apply`
  ADD PRIMARY KEY (`apply_id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `employment`
--
ALTER TABLE `employment`
  ADD PRIMARY KEY (`employment_id`);

--
-- Indexes for table `hiring`
--
ALTER TABLE `hiring`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `apply`
--
ALTER TABLE `apply`
  MODIFY `apply_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `employment`
--
ALTER TABLE `employment`
  MODIFY `employment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `hiring`
--
ALTER TABLE `hiring`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
