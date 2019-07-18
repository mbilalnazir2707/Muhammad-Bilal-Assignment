-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 18, 2019 at 10:09 AM
-- Server version: 10.3.15-MariaDB
-- PHP Version: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `phpb6`
--

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`Id`, `UserName`, `Password`) VALUES
(1, 'Admin', '12345');

--
-- Dumping data for table `person`
--

INSERT INTO `person` (`Id`, `First_Name`, `Last_Name`, `Email`, `Password`, `Address`) VALUES
(1, 'Bilal Nazir', 'nazir', 'bilal@yahoo.com', '827ccb0eea8a706c4c34a16891f84e7b', 'Lahore'),
(6, 'usman', 'nazir', 'usman@gmail.com', '1234', 'Daroghawala'),
(11, 'hamza', 'zafar', 'hamza1@gamil.com', '8950259507cd8ce2a99f8b94674f2b77', 'sialkot'),
(12, 'usman', 'nazir', 'usmannazir@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 'Daroghawala');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) NOT NULL COMMENT '1',
  `name` varchar(40) NOT NULL,
  `pass` char(32) NOT NULL,
  `email` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `pass`, `email`) VALUES
(1, 'Bilal', '1234', 'bilal@yahoo.com'),
(3, 'usman', 'abcd', 'usman@yahoo.com'),
(6, 'hamza', 'efgh', 'hamza@hotmail.com'),
(7, 'sarmad', '123456', 'sarmad@gamil.com'),
(8, 'asad', '1234', 'asad@yahoo.com'),
(9, 'adil', '123456', 'adil@yahoo.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT COMMENT '1', AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
