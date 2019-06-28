-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 27, 2019 at 04:26 AM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cgs3066`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `username` varchar(15) NOT NULL,
  `password` varchar(30) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`username`, `password`, `user_id`) VALUES
('test', 'test123', 1),
('test2', '$2y$10$O6/JtR9Y3bQBu8d5fl8EteH', 2),
('test3', '$2y$10$SvwjHh/HtTWVb.COe0NDReB', 3),
('test4', '$2y$10$OfF8JAZvAst6/YZDOidEfuc', 4),
('test5', '1', 5),
('dork', 'dork1', 6);

-- --------------------------------------------------------

--
-- Table structure for table `user_data`
--

CREATE TABLE `user_data` (
  `meal` varchar(100) NOT NULL,
  `calories` int(11) NOT NULL,
  `protein` int(11) NOT NULL,
  `carbs` int(11) NOT NULL,
  `fat` int(11) NOT NULL,
  `sodium` int(11) NOT NULL,
  `date` date NOT NULL,
  `entry_id` int(11) NOT NULL,
  `username` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_data`
--

INSERT INTO `user_data` (`meal`, `calories`, `protein`, `carbs`, `fat`, `sodium`, `date`, `entry_id`, `username`) VALUES
('spaghet', 1, 1, 1, 1, 1, '1999-01-01', 1, ''),
('spaghet', 1, 1, 1, 1, 1, '1111-01-01', 2, ''),
('spaghet', 1, 1, 1, 1, 1, '2019-04-24', 3, ''),
('spaghet', 1, 1, 1, 1, 1, '2019-04-25', 4, ''),
('', 0, 0, 0, 0, 0, '0000-00-00', 5, 'test5'),
('spaghet', 1, 1, 1, 1, 1, '2019-04-24', 6, 'test5'),
('not fries', 0, 0, 0, 0, 0, '2019-04-22', 7, 'elena'),
('spaghet', 100, 100, 100, 100, 100, '2019-04-25', 8, 'dork');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `password` (`password`);

--
-- Indexes for table `user_data`
--
ALTER TABLE `user_data`
  ADD PRIMARY KEY (`entry_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `user_data`
--
ALTER TABLE `user_data`
  MODIFY `entry_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
