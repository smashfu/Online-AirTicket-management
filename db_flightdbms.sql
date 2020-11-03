-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 01, 2019 at 06:16 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.1.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_flightdbms`
--

-- --------------------------------------------------------

--
-- Table structure for table `aeroplanes`
--

CREATE TABLE `aeroplanes` (
  `aeroplane_id` int(11) NOT NULL,
  `airline_id` int(11) DEFAULT NULL,
  `model` varchar(100) DEFAULT NULL,
  `classF_limit` int(11) DEFAULT NULL,
  `classB_limit` int(11) DEFAULT NULL,
  `classE_limit` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `aeroplanes`
--

INSERT INTO `aeroplanes` (`aeroplane_id`, `airline_id`, `model`, `classF_limit`, `classB_limit`, `classE_limit`) VALUES
(1, 1, 'Boeing 737600', 30, 40, 50),
(2, 1, 'Boeing 73700', 30, 40, 50),
(3, 2, 'Boeing 737C', 20, 20, 30),
(4, 2, 'Boeing 737600', 30, 40, 50),
(5, 3, 'Boeing 7478', 30, 40, 50),
(6, 3, 'Boeing 747400', 30, 40, 50),
(7, 4, 'Boeing 777200', 30, 40, 50),
(8, 4, 'Boeing 777300', 20, 40, 50),
(9, 5, 'Boeing 777300', 30, 40, 50),
(10, 6, 'Boeing 747300', 30, 40, 50),
(11, 6, 'Boeing 737300', 30, 40, 50),
(12, 7, 'Boeing 747300', 30, 40, 50),
(13, 7, 'Boeing 777200', 30, 40, 50),
(14, 8, 'Boeing 737600', 30, 40, 50),
(15, 9, 'Boeing 737600', 30, 40, 50),
(16, 9, 'Boeing 73700', 30, 40, 50),
(17, 10, 'Boeing 737C', 20, 20, 30),
(18, 10, 'Boeing 737C', 20, 20, 30);

-- --------------------------------------------------------

--
-- Table structure for table `agents`
--

CREATE TABLE `agents` (
  `license_no` int(11) NOT NULL,
  `country_id` int(11) DEFAULT NULL,
  `membership_no` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `airlines`
--

CREATE TABLE `airlines` (
  `airline_id` int(11) NOT NULL,
  `country_id` int(11) DEFAULT NULL,
  `name` varchar(100) DEFAULT NULL,
  `type` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `airlines`
--

INSERT INTO `airlines` (`airline_id`, `country_id`, `name`, `type`) VALUES
(1, 1, 'Biman Bangladesh Airlines', 'Commercial'),
(2, 1, 'Shapla Airlines', 'Commercial'),
(3, 2, 'Delta Airlines', 'Commercial'),
(4, 2, 'American Airlines', 'Commercial'),
(5, 2, 'United Airlines', 'Commercial'),
(6, 4, 'Japan Airlines', 'Commercial'),
(7, 4, 'Skymark Airlines', 'Commercial'),
(8, 4, 'All Nippon Airlines', 'Commercial'),
(9, 3, 'Air China', 'Commercial'),
(10, 3, 'Eva Air', 'Commercial');

-- --------------------------------------------------------

--
-- Table structure for table `airports`
--

CREATE TABLE `airports` (
  `airport_id` int(11) NOT NULL,
  `country_id` int(11) DEFAULT NULL,
  `name` varchar(100) DEFAULT NULL,
  `location` varchar(60) NOT NULL,
  `type` varchar(100) DEFAULT NULL,
  `runway_no` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `airports`
--

INSERT INTO `airports` (`airport_id`, `country_id`, `name`, `location`, `type`, `runway_no`) VALUES
(1, 1, 'Shahjalal International Airport', 'Dhaka,Bangladesh', 'International', 2),
(2, 1, 'Shah Amanat International Airport', 'Chittagong,Bangladesh', 'International', 2),
(3, 1, 'Osmani International Airport', 'Sylhet,Bangladesh', 'International', 1),
(4, 2, 'Los Angeles International Airport', 'Los Angeles,USA', 'International', 4),
(5, 2, 'OHare International Airport', 'OHare,USA', 'International', 4),
(6, 2, 'Denver International Airport', 'Denver,USA', 'International', 3),
(7, 2, 'San Francisco International Airport', 'San Francisco,USA', 'International', 3),
(8, 2, 'Phoenix Sky Harbor International Airport', 'Phoenix,USA', 'International', 3),
(9, 3, 'Narita International Airport', 'Narita,Japan', 'International', 3),
(10, 3, 'Hiroshima Airport', 'Hiroshima,Japan', 'International', 3),
(11, 3, 'New Chitose Airport', 'Chitose,China', 'International', 3),
(12, 3, 'Komatsu Airport', 'Komatsu,China', 'International', 3);

-- --------------------------------------------------------

--
-- Table structure for table `boardingpasses`
--

CREATE TABLE `boardingpasses` (
  `ticket_id` int(11) DEFAULT NULL,
  `passport_no` int(11) DEFAULT NULL,
  `gate_no` int(11) DEFAULT NULL,
  `seat_no` varchar(10) DEFAULT NULL,
  `type` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

CREATE TABLE `countries` (
  `country_id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `population` bigint(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `countries`
--

INSERT INTO `countries` (`country_id`, `name`, `population`) VALUES
(1, 'Bangladesh', 167709000),
(2, 'USA', 322179605),
(3, 'China', 1403500365),
(4, 'Japan', 127748513),
(5, 'Germany', 81914672);

-- --------------------------------------------------------

--
-- Table structure for table `flights`
--

CREATE TABLE `flights` (
  `flight_no` varchar(50) NOT NULL,
  `airline_id` int(11) DEFAULT NULL,
  `source` int(11) DEFAULT NULL,
  `destination` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `flights`
--

INSERT INTO `flights` (`flight_no`, `airline_id`, `source`, `destination`) VALUES
('BB 120', 1, 1, 2),
('BB 350', 1, 1, 4),
('BB 121', 1, 2, 1),
('SA 120', 2, 1, 2),
('SA 121', 2, 1, 2),
('DA 200', 3, 4, 5),
('DA 201', 3, 5, 4),
('DA 220', 3, 7, 8),
('AA 220', 4, 7, 8),
('AA 221', 4, 8, 7),
('UA 200', 5, 4, 5),
('UA 201', 5, 5, 4);

-- --------------------------------------------------------

--
-- Table structure for table `passengers`
--

CREATE TABLE `passengers` (
  `passport_no` int(11) NOT NULL,
  `country_id` int(11) DEFAULT NULL,
  `date_of_expiry` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pilots`
--

CREATE TABLE `pilots` (
  `pilot_id` int(10) NOT NULL,
  `first_name` varchar(20) NOT NULL,
  `middle_name` varchar(20) NOT NULL,
  `last_name` varchar(20) NOT NULL,
  `rank` varchar(10) NOT NULL,
  `salary` decimal(12,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pilots`
--

INSERT INTO `pilots` (`pilot_id`, `first_name`, `middle_name`, `last_name`, `rank`, `salary`) VALUES
(1, 'tanvir', 'tanvir', 'tanvir', 'first capt', '1200002.00'),
(2, 'mir', 'tanvir', 'islam', 'first capt', '1200002.00');

-- --------------------------------------------------------

--
-- Table structure for table `pnr`
--

CREATE TABLE `pnr` (
  `passport_no` int(11) DEFAULT NULL,
  `name` varchar(100) DEFAULT NULL,
  `contact` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `schedules`
--

CREATE TABLE `schedules` (
  `schedule_id` int(11) NOT NULL,
  `aeroplane_id` int(11) DEFAULT NULL,
  `flight_no` varchar(50) NOT NULL,
  `dept_time` datetime DEFAULT NULL,
  `arr_time` datetime DEFAULT NULL,
  `pilot_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `schedules`
--

INSERT INTO `schedules` (`schedule_id`, `aeroplane_id`, `flight_no`, `dept_time`, `arr_time`, `pilot_id`) VALUES
(1, 1, 'BB 120', '2019-04-16 08:30:00', '2019-04-16 10:30:00', 0),
(2, 2, 'BB 350', '2019-04-16 09:00:00', '2019-04-16 11:00:00', 0),
(3, 3, 'SA 120', '2019-04-16 09:00:00', '2019-04-16 11:00:00', 0),
(4, 4, 'SA 120', '2019-04-16 16:00:00', '2019-04-16 18:00:00', 0),
(5, 5, 'DA 220', '2019-04-16 18:00:00', '2019-04-16 04:00:00', 0),
(6, 7, 'AA 220', '2019-04-16 22:00:00', '2019-04-16 06:00:00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `segments`
--

CREATE TABLE `segments` (
  `source` int(11) DEFAULT NULL,
  `destiantion` int(11) DEFAULT NULL,
  `distance` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `ssr`
--

CREATE TABLE `ssr` (
  `passport_no` int(11) DEFAULT NULL,
  `catagory` varchar(100) DEFAULT NULL,
  `desc` varchar(400) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tickets`
--

CREATE TABLE `tickets` (
  `ticket_id` int(11) NOT NULL,
  `schedule_id` int(11) NOT NULL,
  `price` decimal(20,2) DEFAULT NULL,
  `type` varchar(100) DEFAULT NULL,
  `passport_no` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tickets`
--

INSERT INTO `tickets` (`ticket_id`, `schedule_id`, `price`, `type`, `passport_no`) VALUES
(4, 1, '500.00', 'classF', 1711),
(7, 3, '500.00', 'classB', 1711),
(8, 1, '500.00', 'classB', 1211),
(9, 2, '500.00', 'classE', 1211),
(10, 4, '500.00', 'classF', 1211),
(11, 4, '500.00', 'classF', 1211),
(12, 4, '500.00', 'classF', 1711),
(13, 1, '500.00', 'classE', 1711),
(14, 5, '500.00', 'classF', 1300),
(15, 6, '500.00', 'classE', 1300),
(16, 1, '500.00', 'classB', 1711),
(17, 4, '500.00', 'classE', 1711),
(18, 1, '500.00', 'classF', 1211),
(19, 6, '500.00', 'classB', 1211);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `uid` int(20) NOT NULL,
  `username` varchar(40) NOT NULL,
  `passport_no` int(11) DEFAULT NULL,
  `user_type` varchar(20) NOT NULL,
  `email` varchar(40) NOT NULL,
  `password` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`uid`, `username`, `passport_no`, `user_type`, `email`, `password`) VALUES
(1, 'CasperX7', 1711, 'customer', 'tanvir98.mt@gmail.com', '1'),
(2, 'Joe', NULL, 'admin', 'joe@gmail.com', '11'),
(3, 'Nino', 1211, 'customer', 'nino98@gmail.com', '1'),
(4, 'Mark', 1300, 'customer', 'markus@gmail.com', '1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `aeroplanes`
--
ALTER TABLE `aeroplanes`
  ADD PRIMARY KEY (`aeroplane_id`),
  ADD KEY `FK` (`airline_id`);

--
-- Indexes for table `agents`
--
ALTER TABLE `agents`
  ADD PRIMARY KEY (`license_no`),
  ADD KEY `FK` (`country_id`);

--
-- Indexes for table `airlines`
--
ALTER TABLE `airlines`
  ADD PRIMARY KEY (`airline_id`),
  ADD KEY `FK` (`country_id`);

--
-- Indexes for table `airports`
--
ALTER TABLE `airports`
  ADD PRIMARY KEY (`airport_id`),
  ADD KEY `FK` (`country_id`);

--
-- Indexes for table `boardingpasses`
--
ALTER TABLE `boardingpasses`
  ADD KEY `FK` (`ticket_id`,`passport_no`);

--
-- Indexes for table `countries`
--
ALTER TABLE `countries`
  ADD PRIMARY KEY (`country_id`);

--
-- Indexes for table `flights`
--
ALTER TABLE `flights`
  ADD PRIMARY KEY (`flight_no`),
  ADD KEY `FK` (`airline_id`,`source`,`destination`);

--
-- Indexes for table `passengers`
--
ALTER TABLE `passengers`
  ADD PRIMARY KEY (`passport_no`),
  ADD KEY `FK` (`country_id`);

--
-- Indexes for table `pilots`
--
ALTER TABLE `pilots`
  ADD PRIMARY KEY (`pilot_id`);

--
-- Indexes for table `pnr`
--
ALTER TABLE `pnr`
  ADD KEY `FK` (`passport_no`);

--
-- Indexes for table `schedules`
--
ALTER TABLE `schedules`
  ADD PRIMARY KEY (`schedule_id`),
  ADD KEY `FK` (`aeroplane_id`);

--
-- Indexes for table `segments`
--
ALTER TABLE `segments`
  ADD KEY `FK` (`source`,`destiantion`);

--
-- Indexes for table `ssr`
--
ALTER TABLE `ssr`
  ADD KEY `FK` (`passport_no`);

--
-- Indexes for table `tickets`
--
ALTER TABLE `tickets`
  ADD PRIMARY KEY (`ticket_id`),
  ADD KEY `FK` (`passport_no`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`uid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `aeroplanes`
--
ALTER TABLE `aeroplanes`
  MODIFY `aeroplane_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `airlines`
--
ALTER TABLE `airlines`
  MODIFY `airline_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `airports`
--
ALTER TABLE `airports`
  MODIFY `airport_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `countries`
--
ALTER TABLE `countries`
  MODIFY `country_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `pilots`
--
ALTER TABLE `pilots`
  MODIFY `pilot_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `schedules`
--
ALTER TABLE `schedules`
  MODIFY `schedule_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tickets`
--
ALTER TABLE `tickets`
  MODIFY `ticket_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `uid` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
