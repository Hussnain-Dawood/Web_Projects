-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3308
-- Generation Time: Jun 18, 2025 at 09:07 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `freelancer_hub`
--
CREATE DATABASE IF NOT EXISTS `freelancer_hub` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `freelancer_hub`;

-- --------------------------------------------------------

--
-- Table structure for table `browsejob`
--

CREATE TABLE `browsejob` (
  `id` int(11) NOT NULL,
  `jid` int(11) NOT NULL,
  `ouser` varchar(100) NOT NULL,
  `cuser` varchar(100) NOT NULL,
  `type` varchar(100) DEFAULT NULL,
  `topic` varchar(255) DEFAULT NULL,
  `odate` date DEFAULT NULL,
  `cdate` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `browsejob`
--

INSERT INTO `browsejob` (`id`, `jid`, `ouser`, `cuser`, `type`, `topic`, `odate`, `cdate`) VALUES
(1, 101, 'alice', 'bob', 'comment', 'Project Update', '2025-06-01', '2025-06-01 10:15:00'),
(2, 102, 'charlie', 'dave', 'review', 'Code Review', '2025-06-02', '2025-06-02 11:30:00'),
(3, 103, 'erin', 'frank', 'assignment', 'Task Delegation', '2025-06-03', '2025-06-03 09:00:00'),
(4, 104, 'george', 'harry', 'feedback', 'Performance', '2025-06-04', '2025-06-04 14:45:00'),
(5, 105, 'ian', 'julia', NULL, NULL, NULL, NULL),
(6, 2, 'Mobile App UI Design', 'HD', 'Contract', 'Design UI for Android App', '2025-06-09', '2025-06-10 11:21:15'),
(7, 2, 'Mobile App UI Design', 'HD', 'Contract', 'Design UI for Android App', '2025-06-09', '2025-06-10 11:26:10'),
(8, 2, 'Mobile App UI Design', 'HD', 'Contract', 'Design UI for Android App', '2025-06-09', '2025-06-10 11:26:46'),
(9, 2, 'Mobile App UI Design', 'HD', 'Contract', 'Design UI for Android App', '2025-06-09', '2025-06-10 11:28:45'),
(10, 2, 'Mobile App UI Design', 'HD', 'Contract', 'Design UI for Android App', '2025-06-09', '2025-06-10 11:30:02'),
(11, 2, 'Mobile App UI Design', 'HD', 'Contract', 'Design UI for Android App', '2025-06-09', '2025-06-10 11:30:34'),
(12, 2, 'Mobile App UI Design', 'HD', 'Contract', 'Design UI for Android App', '2025-06-09', '2025-06-10 11:31:29'),
(13, 2, 'Mobile App UI Design', 'HD', 'Contract', 'Design UI for Android App', '2025-06-09', '2025-06-10 11:32:15'),
(14, 2, 'Mobile App UI Design', 'HD', 'Contract', 'Design UI for Android App', '2025-06-09', '2025-06-10 11:32:33'),
(15, 2, 'Mobile App UI Design', 'HD', 'Contract', 'Design UI for Android App', '2025-06-09', '2025-06-10 11:33:23'),
(16, 2, 'Mobile App UI Design', 'HD', 'Contract', 'Design UI for Android App', '2025-06-09', '2025-06-10 11:34:35'),
(17, 2, 'Mobile App UI Design', 'HD', 'Contract', 'Design UI for Android App', '2025-06-09', '2025-06-10 11:35:24'),
(18, 2, 'Mobile App UI Design', 'HD', 'Contract', 'Design UI for Android App', '2025-06-09', '2025-06-10 11:36:37'),
(19, 2, 'Mobile App UI Design', 'HD', 'Contract', 'Design UI for Android App', '2025-06-09', '2025-06-10 11:41:14'),
(20, 2, 'Mobile App UI Design', 'HD', 'Contract', 'Design UI for Android App', '2025-06-09', '2025-06-10 11:41:58'),
(21, 2, 'Mobile App UI Design', 'HD', 'Contract', 'Design UI for Android App', '2025-06-09', '2025-06-10 11:42:14'),
(22, 2, 'Mobile App UI Design', 'HD', 'Contract', 'Design UI for Android App', '2025-06-09', '2025-06-10 11:43:54'),
(23, 2, 'Mobile App UI Design', 'HD', 'Contract', 'Design UI for Android App', '2025-06-09', '2025-06-10 11:46:39'),
(24, 2, 'Mobile App UI Design', 'HD', 'Contract', 'Design UI for Android App', '2025-06-09', '2025-06-10 11:48:30'),
(25, 2, 'Mobile App UI Design', 'HD', 'Contract', 'Design UI for Android App', '2025-06-09', '2025-06-10 11:49:11'),
(26, 2, 'Mobile App UI Design', 'HD', 'Contract', 'Design UI for Android App', '2025-06-09', '2025-06-10 11:50:06'),
(27, 2, 'Mobile App UI Design', 'HD', 'Contract', 'Design UI for Android App', '2025-06-09', '2025-06-10 11:50:44'),
(28, 2, 'Mobile App UI Design', 'HD', 'Contract', 'Design UI for Android App', '2025-06-09', '2025-06-10 11:51:38'),
(29, 2, 'Mobile App UI Design', 'HD', 'Contract', 'Design UI for Android App', '2025-06-09', '2025-06-10 11:51:57'),
(30, 2, 'Mobile App UI Design', 'HD', 'Contract', 'Design UI for Android App', '2025-06-09', '2025-06-10 11:52:22'),
(31, 2, 'Mobile App UI Design', 'HD', 'Contract', 'Design UI for Android App', '2025-06-09', '2025-06-10 11:53:17');

-- --------------------------------------------------------

--
-- Table structure for table `contact_messages`
--

CREATE TABLE `contact_messages` (
  `id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `subject` varchar(255) DEFAULT NULL,
  `message` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contact_messages`
--

INSERT INTO `contact_messages` (`id`, `name`, `email`, `subject`, `message`, `created_at`) VALUES
(4, 'Hussnain', 'lakeves108@nomrista.com', 'test', 'aaaaaaaaaaaa', '2025-06-10 01:27:56'),
(6, 'feenzay', 'lakeves108@nomrista.com', 'test', 'tetstse', '2025-06-13 03:03:44'),
(7, 'Hussnain', 'b@gmail.com', 'test2tets', 'xahvxs', '2025-06-17 04:15:09');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `id` int(11) NOT NULL,
  `Name` varchar(100) DEFAULT NULL,
  `Age` int(11) DEFAULT NULL,
  `Gender` varchar(10) DEFAULT NULL,
  `Email` varchar(100) DEFAULT NULL,
  `Phone_Number` varchar(20) DEFAULT NULL,
  `Information` text DEFAULT NULL,
  `Date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`id`, `Name`, `Age`, `Gender`, `Email`, `Phone_Number`, `Information`, `Date`) VALUES
(1, 'hussnain', 12, 'male', 'q@gmail.com', '11212121', 'First', '2025-06-09 23:39:22'),
(2, 'hussnain', 33, 'male', 'q@gmail.com', '11212121', 'First', '2025-06-09 23:42:52'),
(3, 'Ali', 23, 'male', 'w@gmail.com', '11212121', 'Second', '2025-06-09 23:51:53'),
(4, 'hashim', 12, 'male', 'h@gmail.com', '11212121', 'third', '2025-06-13 02:56:45'),
(5, 'hashim', 12, 'male', 'h@gmail.com', '11212121', 'third', '2025-06-13 02:59:24'),
(6, '', 0, '', '', '', '', '2025-06-13 03:26:53'),
(7, 'hussnain', 12, 'male', 'q@gmail.com', '11212121', 'hgdvxhads', '2025-06-17 04:13:23'),
(8, '', 0, '', '', '', '', '2025-06-17 04:17:52'),
(9, '', 0, '', '', '', '', '2025-06-17 04:18:41'),
(10, '', 0, '', '', '', '', '2025-06-17 04:19:09'),
(11, '', 0, '', '', '', '', '2025-06-17 04:19:17'),
(12, '', 0, '', '', '', '', '2025-06-17 04:20:04'),
(13, '', 0, '', '', '', '', '2025-06-17 04:20:08'),
(14, '', 0, '', '', '', '', '2025-06-17 04:20:30'),
(15, 'Ali', 12, 'male', 'h@gmail.com', '11212121', 'dxnsa nxas', '2025-06-17 04:24:24'),
(16, '', 0, '', '', '', '', '2025-06-17 05:43:04'),
(17, 'hashim', 23, 'male', 'h@gmail.com', '11212121', 'good', '2025-06-18 08:31:19');

-- --------------------------------------------------------

--
-- Table structure for table `freelancers`
--

CREATE TABLE `freelancers` (
  `id` int(11) DEFAULT NULL,
  `name` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `skills` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `freelancers`
--

INSERT INTO `freelancers` (`id`, `name`, `email`, `skills`) VALUES
(1, 'Ali Khan', 'ali.khan@example.com', 'Python'),
(2, 'Saad Ahmed', 'saad.ahmed@example.com', 'Java'),
(3, 'Usman Raza', 'usman.raza@example.com', 'C#'),
(4, 'Hammad Tariq', 'hammad.tariq@example.com', 'HTML');

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `jid` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `type` varchar(100) NOT NULL,
  `topic` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `skills` varchar(255) NOT NULL,
  `document` varchar(255) DEFAULT NULL,
  `picture` varchar(255) DEFAULT NULL,
  `location` varchar(100) DEFAULT NULL,
  `budget` varchar(50) DEFAULT NULL,
  `date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `jobs`
--

INSERT INTO `jobs` (`jid`, `name`, `type`, `topic`, `description`, `skills`, `document`, `picture`, `location`, `budget`, `date`) VALUES
(1, 'Web Development Project', 'Freelance', 'Build E-commerce Website', 'Need a responsive website with admin panel and payment gateway.', 'HTML, CSS, JavaScript, PHP, MySQL', 'project_brief.pdf', 'website_mockup.jpg', 'Lahore', 'PKR 50,000', '2025-06-10'),
(2, 'Mobile App UI Design', 'Contract', 'Design UI for Android App', 'Require modern and minimal UI for a fintech app.', 'Figma, Adobe XD', 'ui_specs.pdf', NULL, 'Karachi', 'PKR 30,000', '2025-06-09'),
(3, 'Content Writing', 'Part-time', 'Write Tech Blogs', 'Looking for SEO-friendly articles on software trends.', 'SEO, Content Writing, WordPress', NULL, NULL, 'Remote', 'PKR 5,000 per article', '2025-06-08'),
(4, 'Data Entry', 'Temporary', 'Enter Survey Data', 'Manual data entry of customer survey forms.', 'MS Excel, Typing', NULL, 'form_sample.png', 'Islamabad', 'PKR 15,000', '2025-06-07'),
(5, 'Video Editing', 'Freelance', 'YouTube Vlog Editing', 'Need weekly edits for travel vlogs. Long-term.', 'Adobe Premiere, After Effects', 'brief.docx', 'vlog_sample.jpg', NULL, 'PKR 10,000/video', '2025-06-06');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('user','admin') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `role`) VALUES
(3, 'HD', 'b@gmail.com', '1', 'user'),
(4, 'Hussnain Dawood', 'ab@gmail.com', '2', 'admin'),
(5, 'hashmi', 'h@gmail.com', '98', 'user'),
(6, 'faizan', 'faizy@gmail.com', '123', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `browsejob`
--
ALTER TABLE `browsejob`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact_messages`
--
ALTER TABLE `contact_messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`jid`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `browsejob`
--
ALTER TABLE `browsejob`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `contact_messages`
--
ALTER TABLE `contact_messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `jid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
