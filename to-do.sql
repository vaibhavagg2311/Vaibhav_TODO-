-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jul 21, 2020 at 06:21 AM
-- Server version: 10.4.10-MariaDB
-- PHP Version: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `to-do`
--

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

DROP TABLE IF EXISTS `login`;
CREATE TABLE IF NOT EXISTS `login` (
  `name` varchar(30) NOT NULL,
  `agent_id` int(11) NOT NULL,
  `password` text NOT NULL,
  `agent_key` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`name`, `agent_id`, `password`, `agent_key`) VALUES
('Daksh', 2020, '6ca13d52ca70c883e0f0bb101e425a89e8624de51db2d2392593af6a84118090', 5431),
('Hunt', 2019, '6ca13d52ca70c883e0f0bb101e425a89e8624de51db2d2392593af6a84118090', 3261);

-- --------------------------------------------------------

--
-- Table structure for table `to_do`
--

DROP TABLE IF EXISTS `to_do`;
CREATE TABLE IF NOT EXISTS `to_do` (
  `agent_id` int(11) NOT NULL,
  `title` varchar(60) NOT NULL,
  `description` text NOT NULL,
  `category` varchar(30) NOT NULL,
  `due_date` date NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `to_do`
--

INSERT INTO `to_do` (`agent_id`, `title`, `description`, `category`, `due_date`, `status`) VALUES
(2019, 'Pushups', 'Do 10 sets of Pushups', 'Workout', '2020-07-21', 1),
(2019, 'Pushups', 'Do 10 sets of Pushups', 'Workout', '2020-07-21', 1),
(2019, 'AA', 'AA', 'AA', '2020-07-18', 1),
(2020, 'ABC', 'Hello World', 'First Item', '2020-07-22', 1),
(2020, 'XYZ', 'Hello World', 'Second Item', '2020-07-21', 1),
(2020, 'SDK', 'iewfji nfenfkjniwnk i9wnw iwhk fin infksnojw hfs', 'TEST', '2020-07-31', 1);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
