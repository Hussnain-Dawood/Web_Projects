-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 19, 2025 at 01:56 AM
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
-- Database: `healthcare`
--

-- --------------------------------------------------------

--
-- Table structure for table `ambulance_vehicles`
--

CREATE TABLE `ambulance_vehicles` (
  `id` int(11) NOT NULL,
  `vehicle_number` varchar(50) NOT NULL,
  `driver_name` varchar(100) NOT NULL,
  `driver_contact` varchar(20) DEFAULT NULL,
  `status` enum('Available','On Duty','Maintenance') DEFAULT 'Available',
  `location` varchar(100) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ambulance_vehicles`
--

INSERT INTO `ambulance_vehicles` (`id`, `vehicle_number`, `driver_name`, `driver_contact`, `status`, `location`, `created_at`) VALUES
(1, 'AMB-101', 'Rashid Ali', '03001234567', 'Available', 'Main Gate', '2025-06-18 06:14:58'),
(2, 'AMB-102', 'Aslam Bhatti', '03122334455', 'On Duty', 'ER Entrance', '2025-06-18 06:14:58'),
(3, 'AMB-103', 'Saeed Khan', '03211223344', 'Maintenance', 'Garage', '2025-06-18 06:14:58'),
(4, 'AMB-104', 'Zubair Malik', '03334445566', 'Available', 'Ambulance Parking Area', '2025-06-18 06:14:58'),
(5, 'AMB-105', 'Hassan Raza', '03456677889', 'On Duty', 'City Center Pickup', '2025-06-18 06:14:58');

-- --------------------------------------------------------

--
-- Table structure for table `appointments`
--

CREATE TABLE `appointments` (
  `id` int(11) NOT NULL,
  `full_name` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `gender` varchar(10) DEFAULT NULL,
  `doctor` varchar(100) DEFAULT NULL,
  `appointment_date` date DEFAULT NULL,
  `appointment_time` time DEFAULT NULL,
  `reason` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `appointments`
--

INSERT INTO `appointments` (`id`, `full_name`, `email`, `phone`, `dob`, `gender`, `doctor`, `appointment_date`, `appointment_time`, `reason`) VALUES
(7, 'Hussnain', 'Hussnain@gmail.com', '03859565412', '2003-07-16', 'male', 'dr-johnson', '2025-05-06', '11:00:00', 'unstable blood pressure'),
(8, 'Ashir', 'Ashir@gmail.com', '03855565416', '2003-07-16', 'male', 'dr-wilson', '2025-05-23', '15:00:00', 'regular check-up'),
(9, 'Faiq', 'Faiq@gmail.com', '03213321457', '2002-07-08', 'male', 'dr-park', '2025-05-28', '13:00:00', 'toothache'),
(10, 'Faizan', 'Faizan@gmail.com', '03859565412', '2025-05-16', 'male', 'dr-davis', '2025-05-17', '09:00:00', 'styd'),
(18, 'Ali Khan', 'Ali@gmail.com', '03205421366', '2000-01-01', 'male', 'dr-chen', '2025-01-01', '10:00:00', 'Headcahe');

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` int(11) NOT NULL,
  `Name` varchar(100) DEFAULT NULL,
  `Age` int(11) DEFAULT NULL,
  `Gender` varchar(10) DEFAULT NULL,
  `Email` varchar(100) DEFAULT NULL,
  `Phone_Number` varchar(15) DEFAULT NULL,
  `Information` text DEFAULT NULL,
  `Date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`id`, `Name`, `Age`, `Gender`, `Email`, `Phone_Number`, `Information`, `Date`) VALUES
(16, 'Hussnain', 23, 'Male', 'hussnain@gmail.com', '03333333', 'Can you provide details about booking process\r\n', '2025-06-18 08:28:37'),
(17, 'Hussnain', 23, 'Male', 'hussnain@gmail.com', '03333333', 'Can you provide details about booking process\r\n', '2025-06-18 08:32:20'),
(18, 'Hussnain', 23, 'Male', 'hussnain@gmail.com', '03333333', 'Can you provide details about booking process\r\n', '2025-06-18 08:33:40'),
(19, 'Khan', 22, 'Male', 'khan@gmail.com', '03333333333', 'What can i do to contact the doctors personally?\r\n', '2025-06-18 08:37:13'),
(20, 'Khan', 22, 'Male', 'khan@gmail.com', '03333333333', 'What can i do to contact the doctors personally?\r\n', '2025-06-18 08:38:22');

-- --------------------------------------------------------

--
-- Table structure for table `pharmacy`
--

CREATE TABLE `pharmacy` (
  `id` int(11) NOT NULL,
  `medicine_name` varchar(100) NOT NULL,
  `description` text DEFAULT NULL,
  `quantity` int(11) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `expiry_date` date DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pharmacy`
--

INSERT INTO `pharmacy` (`id`, `medicine_name`, `description`, `quantity`, `price`, `expiry_date`, `created_at`) VALUES
(1, 'Paracetamol', 'Pain reliever and fever reducer', 500, 2.50, '2026-01-01', '2025-06-18 06:14:58'),
(2, 'Amoxicillin', 'Antibiotic for infections', 200, 12.00, '2025-11-15', '2025-06-18 06:14:58'),
(3, 'Panadol Extra', 'For stronger headache relief', 300, 3.20, '2026-03-10', '2025-06-18 06:14:58'),
(4, 'Cough Syrup', 'Relieves dry cough', 150, 7.50, '2025-08-30', '2025-06-18 06:14:58'),
(5, 'Vitamin C Tablets', 'Boosts immunity', 400, 5.00, '2027-02-28', '2025-06-18 06:14:58'),
(6, 'Insulin', 'For diabetes treatment', 100, 50.00, '2025-09-01', '2025-06-18 06:14:58'),
(7, 'Eye Drops', 'For eye irritation relief', 250, 6.75, '2026-05-15', '2025-06-18 06:14:58'),
(8, 'ORS Sachet', 'Oral Rehydration Solution', 600, 1.20, '2026-12-01', '2025-06-18 06:14:58'),
(9, 'Bandages', 'Sterile bandage pack', 800, 0.90, '2028-01-01', '2025-06-18 06:14:58'),
(10, 'Pain Relief Gel', 'Topical pain relief', 180, 8.40, '2025-10-25', '2025-06-18 06:14:58');

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `id` int(11) NOT NULL,
  `service_name` varchar(100) NOT NULL,
  `description` text DEFAULT NULL,
  `cost` decimal(10,2) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`id`, `service_name`, `description`, `cost`, `created_at`) VALUES
(1, 'General Checkup', 'Basic health assessment with vital signs and consultation.', 1000.00, '2025-06-18 06:14:58'),
(2, 'Blood Test', 'Comprehensive blood testing including CBC and glucose.', 1500.00, '2025-06-18 06:14:58'),
(3, 'X-Ray', 'Digital X-ray imaging for bones and chest.', 1200.00, '2025-06-18 06:14:58'),
(4, 'MRI Scan', 'Magnetic Resonance Imaging for internal organ diagnosis.', 5000.00, '2025-06-18 06:14:58'),
(5, 'Vaccination', 'Routine and travel-related vaccines administered.', 800.00, '2025-06-18 06:14:58'),
(6, 'Dental Cleaning', 'Scaling, polishing, and oral hygiene assessment.', 2000.00, '2025-06-18 06:14:58'),
(7, 'Eye Examination', 'Visual acuity and eye health testing.', 900.00, '2025-06-18 06:14:58'),
(8, 'Ultrasound', '2D and 3D ultrasound imaging for diagnostic purposes.', 1800.00, '2025-06-18 06:14:58'),
(9, 'ECG Test', 'Electrocardiogram to monitor heart activity.', 1100.00, '2025-06-18 06:14:58'),
(10, 'Physiotherapy Session', '45-minute session for injury or mobility rehab.', 2500.00, '2025-06-18 06:14:58'),
(11, 'Nutrition Consultation', 'Dietary assessment and custom meal planning.', 1300.00, '2025-06-18 06:14:58'),
(12, 'Childbirth Delivery', 'Normal delivery procedure with postnatal care.', 15000.00, '2025-06-18 06:14:58'),
(13, 'Emergency Service', '24/7 emergency care for accidents or critical cases.', 0.00, '2025-06-18 06:14:58'),
(14, 'ENT Consultation', 'Ear, Nose, and Throat specialist visit.', 1200.00, '2025-06-18 06:14:58'),
(15, 'COVID-19 PCR Test', 'Nasal swab for COVID-19 PCR result within 24 hours.', 2500.00, '2025-06-18 06:14:58'),
(16, 'blood test', 'detailed examination of blood', 1000.00, '2025-06-18 07:24:52');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(15) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `dob` date DEFAULT NULL,
  `role` enum('patient','doctor','admin') NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `phone`, `password`, `dob`, `role`, `created_at`) VALUES
(3, 'Ali', 'Ali@gmail.com', '03653321456', '123', '2000-01-01', 'patient', '2025-06-17 04:46:16'),
(4, '', '', '', '', '0000-00-00', '', '2025-06-17 04:53:49'),
(5, 'Ali Hassan', 'Faizan@gmail.com', '03653321456', '123', '2000-01-01', 'admin', '2025-06-17 05:15:02'),
(7, 'Faiq', 'Faiq@gmail.com', '03213321457', '123', '2000-01-01', 'admin', '2025-06-17 09:40:15'),
(8, 'Farhan', 'nomi@gmail.com', '03859565412', '123', '2000-01-01', 'doctor', '2025-06-18 08:45:39');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ambulance_vehicles`
--
ALTER TABLE `ambulance_vehicles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `appointments`
--
ALTER TABLE `appointments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pharmacy`
--
ALTER TABLE `pharmacy`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ambulance_vehicles`
--
ALTER TABLE `ambulance_vehicles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `appointments`
--
ALTER TABLE `appointments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `pharmacy`
--
ALTER TABLE `pharmacy`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
