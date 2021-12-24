-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Dec 19, 2020 at 08:11 AM
-- Server version: 5.7.31
-- PHP Version: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `onedesk`
--

-- --------------------------------------------------------

--
-- Table structure for table `queries`
--

DROP TABLE IF EXISTS `queries`;
CREATE TABLE IF NOT EXISTS `queries` (
  `query_id` int(10) NOT NULL AUTO_INCREMENT,
  `from_user_id` int(10) NOT NULL,
  `to_user_id` int(11) NOT NULL,
  `text` text NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`query_id`)
) ENGINE=MyISAM AUTO_INCREMENT=526 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `queries`
--

INSERT INTO `queries` (`query_id`, `from_user_id`, `to_user_id`, `text`, `time`) VALUES
(525, 70, 54, 'hello admin', '2020-12-07 09:40:34');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `username` varchar(128) NOT NULL,
  `contact` bigint(12) NOT NULL,
  `email` varchar(40) NOT NULL,
  `roll` varchar(25) NOT NULL,
  `password` varchar(128) NOT NULL,
  `user_id` int(10) NOT NULL AUTO_INCREMENT,
  `role` text NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=71 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`username`, `contact`, `email`, `roll`, `password`, `user_id`, `role`) VALUES
('Administration', 1234567890, 'admin@skitm.com', 'none', '6d1a7c284312f2e62e08c2c86cfae47f', 54, 'admin'),
('Dean Winchester', 9999999999, 'dean@gmail.com', '0875cs181100', '827ccb0eea8a706c4c34a16891f84e7b', 60, 'student'),
('saloni chouhan', 9424044471, 'saloni@gmail.com', '0875cs181125', '827ccb0eea8a706c4c34a16891f84e7b', 67, 'student'),
('palak ', 9424044471, 'palak@gmail.com', 'sdfsdfsd', '827ccb0eea8a706c4c34a16891f84e7b', 68, 'student'),
('rishika ramnani', 7000275277, 'rishika@gmail.com', '0875cs18119', '827ccb0eea8a706c4c34a16891f84e7b', 69, 'student'),
('virendra dani', 9999999999, 'virendradani@gmail.com', '0875cs181111', '827ccb0eea8a706c4c34a16891f84e7b', 70, 'student');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
