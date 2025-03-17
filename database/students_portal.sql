-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 12, 2025 at 06:34 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `students_portal`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `full_name` varchar(255) NOT NULL,
  `birth_date` date NOT NULL,
  `address` text NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `full_name`, `birth_date`, `address`, `email`, `password`, `role`) VALUES
(1, 'New Name', '0000-00-00', 'New Address', 'newemail@example.com', 'newhashedpassword', 'student'),
(2, 'John doe', '2025-03-26', 'calintaan', 'jowelpana44@gmail.com', '$2y$10$eSumAD9iMqVg/PV9GlaY9eLA163JvNvcN.SAmpnspvBvYmeSfhtcC', 'student'),
(3, 'Dina Wangbu', '2025-03-20', 'Ligaya malyo', 'dinawangbu123@gmail.com', '$2y$10$ScG6MDmktiEI5zecNXTMdOhCkmqm7T0rHOlN60QxjheOXp0P92to.', 'student'),
(4, 'alaiza buang', '2025-03-11', 'calintaan', 'alaiza@gmail.com', '$2y$10$R4clusV.HJEwled2x0c1H.1laOun6ooByeQ0QKmYQZ5jBrcW/i1jO', 'student'),
(5, 'Jowel Dionisio Pana', '1997-10-11', 'Poblacion calintaan Occ. Mdo.', 'jowelpogi12@gmail.com', '$2y$10$3Di.2PnMIRj6wYV2uqffZuqh26hzpOacTr.qHoqnFg6SLUNDURsYK', 'student'),
(6, 'Jowel Dionisio Pana', '2025-03-11', 'Poblacion calintaan Occ. Mdo.', 'jowelpogi1112@gmail.com', '$2y$10$5oBNvRw6RbVyRdtJRTccfekwwkkgGjihAbZN8DfDQKMc2dTZSGJci', 'student'),
(7, 'Admin User', '1990-01-01', 'Main Office', 'admin@example.com', '$2y$10$K1W3h4u8B8zLzYyUoT/K5eE8qZdGyXbZ5PB0CnYd.FoPKHLwUoUaG', 'admin'),
(8, 'John mark', '2025-03-12', 'san jose bulacan', 'john123@gmail.com', '$2y$10$BigbCommwFYB0zJQZhobf.bcQhn4JGKgzQM3wrsKufSmCea2sw2o6', 'student'),
(9, 'John mark', '2025-03-12', 'san jose bulacan', 'johndoe123@gmail.com', '$2y$10$iyUNNBh8BfFGFoAVuGsJJ.TsO/58LrSsAyrhmFI3RCGf/yisPgoHq', 'student'),
(10, 'jacket', '2025-03-12', '.m,,.', 'sample@gmail.com', '$2y$10$iIEicKyACbYy.D55SAzKy./A8BZX4L0IQnZeqt4GfSWPps6OZwWCe', 'student');

--
-- Indexes for dumped tables
--

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
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
