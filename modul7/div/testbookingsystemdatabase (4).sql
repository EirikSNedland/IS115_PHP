-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 09. Nov, 2023 13:10 PM
-- Tjener-versjon: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `testbookingsystemdatabase`
--

-- --------------------------------------------------------

--
-- Tabellstruktur for tabell `timeslots`
--

CREATE TABLE `timeslots` (
  `timeslot_id` int(11) NOT NULL,
  `tutor_id` int(11) NOT NULL,
  `ts_date` date NOT NULL,
  `start_time` time NOT NULL,
  `location` varchar(255) NOT NULL,
  `course` varchar(255) NOT NULL,
  `booked_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dataark for tabell `timeslots`
--

INSERT INTO `timeslots` (`timeslot_id`, `tutor_id`, `ts_date`, `start_time`, `location`, `course`, `booked_by`) VALUES
(1, 1, '2023-10-10', '11:00:00', 'B2 004', 'IS115', NULL),
(2, 2, '2023-10-10', '11:00:00', 'UIA', 'IS216', NULL),
(3, 1, '2023-10-10', '11:00:00', 'UIA', 'IS115', NULL),
(4, 1, '2023-11-09', '08:00:00', 'B1 004', 'IS114', NULL),
(5, 2, '2023-11-08', '14:00:00', 'B2 002', 'BACIT', NULL),
(6, 1, '2023-11-29', '10:00:00', 'DISCORD', 'is115', 4),
(7, 2, '2023-11-11', '14:00:00', 'Pengebingen', 'IS115', 3),
(8, 1, '2023-11-20', '08:00:00', '48 112', 'is110', NULL);

-- --------------------------------------------------------

--
-- Tabellstruktur for tabell `tutors`
--

CREATE TABLE `tutors` (
  `tutor_id` int(11) NOT NULL,
  `user` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dataark for tabell `tutors`
--

INSERT INTO `tutors` (`tutor_id`, `user`) VALUES
(1, 3),
(2, 6);

-- --------------------------------------------------------

--
-- Tabellstruktur for tabell `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `lname` varchar(255) NOT NULL,
  `mobil` varchar(100) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `preference_tutor` int(11) DEFAULT NULL,
  `preference_course` varchar(255) DEFAULT NULL COMMENT 'VarChar fordi course table eksisterer ikke',
  `created_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dataark for tabell `users`
--

INSERT INTO `users` (`user_id`, `fname`, `lname`, `mobil`, `email`, `password`, `preference_tutor`, `preference_course`, `created_at`) VALUES
(3, 'Cookie', 'Monster', '12345678', 'cookiemonster@sesam.og', '$2y$10$WuO/88hEHsLvwYmsCPn/Ke515WlEp/4tr/XL7fRXVReMfeBjffSjC', 2, 'IS114', '2023-11-01'),
(4, 'Herring', 'Silden', '98765432', 'herring@silden.moc', '$2y$10$30vuU0EFV28AcmF.TukcCOxB8JUUhPZFskRyxK8cM02UPUEwJonlK', 2, 'BACIT', '2023-11-01'),
(5, 'Napoleon', 'Bonaparte', '32547618', 'napolen@bonaparte.moc', '$2y$10$Q.wblzwMw5UxnP7pLgPev.e9BVwArUe.WhKEXYgE9uRrQEhahIik2', 2, 'IS216', '2023-11-01'),
(6, 'Gary', 'Belmont', '76541298', 'gary@belmont.moc', '$2y$10$DPH1EXWYUKH1BOGPKdkCt.Av66qj/GEd/aDxBIvKVEcG3SOuMDX1a', 1, 'IS110', '2023-11-02'),
(7, 'Herman', 'Larsen', '65544332', 'herman@larsen.moc', '$2y$10$2m7zIm/Ytd6x.4NEL19qFO.tV1Y0OGUhxNiwK4/TN9XBjR.qEjUIm', 1, 'IS115', '2023-11-02'),
(8, 'dwa', 'ewadwa', '12345678', 'dwa@dwa.no', '$2y$10$dskOKJd4A4Fv4l4eyt1QFO.l8q8F/7TaPmycSuGOLQlWXsNPXrKr2', NULL, NULL, '2023-11-03');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `timeslots`
--
ALTER TABLE `timeslots`
  ADD PRIMARY KEY (`timeslot_id`),
  ADD KEY `foreign_key` (`tutor_id`),
  ADD KEY `booked_by` (`booked_by`);

--
-- Indexes for table `tutors`
--
ALTER TABLE `tutors`
  ADD PRIMARY KEY (`tutor_id`),
  ADD KEY `la_user_id` (`user`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `preferance_tutor_fk` (`preference_tutor`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `timeslots`
--
ALTER TABLE `timeslots`
  MODIFY `timeslot_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tutors`
--
ALTER TABLE `tutors`
  MODIFY `tutor_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Begrensninger for dumpede tabeller
--

--
-- Begrensninger for tabell `timeslots`
--
ALTER TABLE `timeslots`
  ADD CONSTRAINT `booked_by_user` FOREIGN KEY (`booked_by`) REFERENCES `users` (`user_id`),
  ADD CONSTRAINT `foreign_key` FOREIGN KEY (`tutor_id`) REFERENCES `tutors` (`tutor_id`);

--
-- Begrensninger for tabell `tutors`
--
ALTER TABLE `tutors`
  ADD CONSTRAINT `la_user_id` FOREIGN KEY (`user`) REFERENCES `users` (`user_id`);

--
-- Begrensninger for tabell `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `preferance_tutor_fk` FOREIGN KEY (`preference_tutor`) REFERENCES `tutors` (`tutor_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
