-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Nov 30, 2020 at 01:43 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cedcabs`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_location`
--

CREATE TABLE `tbl_location` (
  `id` int(11) NOT NULL,
  `location_name` varchar(255) NOT NULL,
  `distance` varchar(255) NOT NULL,
  `is_available` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_location`
--

INSERT INTO `tbl_location` (`id`, `location_name`, `distance`, `is_available`) VALUES
(5, 'Faizabad', '100', 1),
(6, 'Basti', '150', 1),
(7, 'Gorakhpur', '210', 1),
(9, 'lucknow', '15', 1),
(10, 'noida', '650', 1),
(11, 'Delhi', '650', 1),
(22, 'lucknow', '200', 1),
(23, 'greater noida', '550', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_ride`
--

CREATE TABLE `tbl_ride` (
  `ride_id` int(11) NOT NULL,
  `ride_date` date NOT NULL,
  `from_location` varchar(255) NOT NULL,
  `to_location` varchar(255) NOT NULL,
  `total_distance` varchar(255) NOT NULL,
  `luggage` varchar(255) NOT NULL,
  `total_fare` varchar(255) NOT NULL,
  `statuss` int(11) NOT NULL,
  `customer_user_id` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_ride`
--

INSERT INTO `tbl_ride` (`ride_id`, `ride_date`, `from_location`, `to_location`, `total_distance`, `luggage`, `total_fare`, `statuss`, `customer_user_id`) VALUES
(109, '2020-11-27', 'Faizabad', 'Barabanki', '110', '0', '1295', 1, '11'),
(110, '2020-11-27', 'Barabanki', 'lucknow', '45', '0', '750', 1, '11'),
(112, '2020-11-28', 'Barabanki', 'Prayagraj', '240', '0', '2485', 1, '11'),
(113, '2020-11-28', 'Barabanki', 'Gorakhpur', '150', '0', '1703', 1, '11'),
(117, '2020-11-28', 'Barabanki', 'lucknow', '45', '0', '605', 1, '11'),
(118, '2020-11-28', 'Barabanki', 'Gorakhpur', '150', '0', '1703', 1, '16'),
(119, '2020-11-28', 'Barabanki', 'Gorakhpur', '150', '0', '1703', 1, '16'),
(120, '2020-11-28', 'Barabanki', 'Prayagraj', '240', '0', '2485', 1, '11'),
(121, '2020-11-28', 'Basti', 'Gorakhpur', '60', '0', '785', 1, '11'),
(122, '2020-11-30', 'Faizabad', 'Delhi', '550', '0', '5120', 1, '11'),
(123, '2020-11-30', 'Basti', 'Delhi', '500', '0', '4695', 1, '11'),
(124, '2020-11-30', 'Faizabad', 'greater', '100', '0', '1193', 1, '11');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `user_id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `name_user` varchar(255) NOT NULL,
  `dateofsignup` datetime NOT NULL,
  `mobile` varchar(255) NOT NULL,
  `isblock` tinyint(1) NOT NULL,
  `password` varchar(255) NOT NULL,
  `is_admin` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`user_id`, `username`, `name_user`, `dateofsignup`, `mobile`, `isblock`, `password`, `is_admin`) VALUES
(11, 'avi', 'avi', '2020-11-24 17:04:34', '7054734094', 0, '3fca379b3f0e322b7b7967bfcfb948ad', 0),
(12, 'avinash', 'avinash', '2020-11-24 19:29:51', '7054734094', 0, 'a208e5837519309129fa466b0c68396b', 1),
(16, 'mannu', 'mannu', '2020-11-26 20:10:25', '7025474094', 0, '3b53fb24e3a35944fe9c2bc6cac1773b', 0),
(19, 'avin', 'avin', '2020-11-30 12:54:57', '7894561230', 0, '416a1eb8b39a34e94235f22054ec8cbb', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_location`
--
ALTER TABLE `tbl_location`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_ride`
--
ALTER TABLE `tbl_ride`
  ADD PRIMARY KEY (`ride_id`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_location`
--
ALTER TABLE `tbl_location`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `tbl_ride`
--
ALTER TABLE `tbl_ride`
  MODIFY `ride_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=125;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
