-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 15, 2023 at 11:29 AM
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
-- Database: `book_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `book_form`
--

CREATE TABLE `book_form` (
  `id` int(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(10) NOT NULL,
  `address` varchar(255) NOT NULL,
  `location` varchar(255) NOT NULL,
  `guests` int(255) NOT NULL,
  `arrivals` date NOT NULL,
  `leaving` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `login_form`
--

CREATE TABLE `login_form` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `login_form`
--

INSERT INTO `login_form` (`id`, `email`, `password`) VALUES
(1, 'dipson@gmail.com', '1234');

-- --------------------------------------------------------

--
-- Table structure for table `package`
--

CREATE TABLE `package` (
  `id` int(11) NOT NULL,
  `PackageName` varchar(255) NOT NULL,
  `PackageType` varchar(255) NOT NULL,
  `cost` int(255) NOT NULL,
  `duration` varchar(255) NOT NULL,
  `startDate` date NOT NULL,
  `endDate` date NOT NULL,
  `image` longblob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `package`
--

INSERT INTO `package` (`id`, `PackageName`, `PackageType`, `cost`, `duration`, `startDate`, `endDate`, `image`) VALUES
(7, 'EBC', 'Trekking & Adventure', 15000, '5', '2022-12-02', '2022-12-02', 0x7061636b616765332e6a7067),
(22, 'Gosaikunda', 'Trekking', 5000, '5', '2023-06-17', '2023-06-22', 0x696d6167652f4d757374616e672e6a7067),
(24, 'Langtang', 'Trekking & Adventure', 7000, '7', '2023-06-17', '2023-06-24', 0x696d6167652f7061636b616765362e6a7067);

-- --------------------------------------------------------

--
-- Table structure for table `signup_form`
--

CREATE TABLE `signup_form` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `user_type` varchar(255) NOT NULL DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `signup_form`
--

INSERT INTO `signup_form` (`id`, `name`, `email`, `password`, `user_type`) VALUES
(1, 'Jcole', 'cole@gmail.com', '202cb962ac59075b964b07152d234b70', 'user'),
(2, 'ken', 'kendrick@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 'user'),
(3, 'he', 'he@gmail.com', '2e65f2f2fdaf6c699b223c61b1b5ab89', 'user'),
(4, 'Admin', 'Admin@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 'admin'),
(5, 'rohan', 'rohan@gmail.com', 'c916d142f0dc7f9389653a164f1d4e9d', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `book_form`
--
ALTER TABLE `book_form`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `login_form`
--
ALTER TABLE `login_form`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `package`
--
ALTER TABLE `package`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `signup_form`
--
ALTER TABLE `signup_form`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `book_form`
--
ALTER TABLE `book_form`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `login_form`
--
ALTER TABLE `login_form`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `package`
--
ALTER TABLE `package`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `signup_form`
--
ALTER TABLE `signup_form`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
