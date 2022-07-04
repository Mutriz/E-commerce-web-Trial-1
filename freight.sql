-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 24, 2018 at 10:44 AM
-- Server version: 10.1.29-MariaDB
-- PHP Version: 7.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `freight`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `first_name` varchar(20) NOT NULL,
  `last_name` varchar(20) NOT NULL,
  `id_number` int(16) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `email` varchar(40) NOT NULL,
  `password` varchar(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `first_name`, `last_name`, `id_number`, `phone`, `email`, `password`) VALUES
(1, 'Mercy', 'Mercy', 2020, '0799213484', 'admin@gmail.com', '21232f297a57a5a7');

-- --------------------------------------------------------

--
-- Table structure for table `booking_details`
--

CREATE TABLE `booking_details` (
  `order_id` int(30) NOT NULL,
  `container_id` int(30) NOT NULL,
  `fleet_id` int(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `booking_details`
--

INSERT INTO `booking_details` (`order_id`, `container_id`, `fleet_id`) VALUES
(2003, 4000, 5000),
(2003, 4000, 5000),
(2003, 4000, 5000),
(2003, 4001, 5001),
(2003, 4001, 5001),
(2003, 4001, 5001),
(2003, 4000, 5000);

-- --------------------------------------------------------

--
-- Table structure for table `cargo_details`
--

CREATE TABLE `cargo_details` (
  `id` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `number_containers` varchar(50) NOT NULL,
  `price_container` varchar(50) NOT NULL,
  `shipping_cost` varchar(50) NOT NULL,
  `fowarder_cost` varchar(50) NOT NULL,
  `warehouse_cost` varchar(50) NOT NULL,
  `ff_date` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cargo_details`
--

INSERT INTO `cargo_details` (`id`, `email`, `number_containers`, `price_container`, `shipping_cost`, `fowarder_cost`, `warehouse_cost`, `ff_date`) VALUES
(1, 'ann@gmail.com', '1', '50000', '100000', '900', '4800', '2018-08-31'),
(2, 'ann@gmail.com', '1', '50000', '100000', '900', '4800', '2018-08-31'),
(3, 'ann@gmail.com', '1', '50000', '100000', '900', '4800', '2018-08-31'),
(4, 'ann@gmail.com', '18', '878000', '100000', '900', '4800', '1969-12-20'),
(5, 'ann@gmail.com', '116', '5760000', '100000', '600', '4800', '2018-08-31');

-- --------------------------------------------------------

--
-- Table structure for table `container_weight`
--

CREATE TABLE `container_weight` (
  `id` int(11) NOT NULL,
  `container_capacity` varchar(30) NOT NULL,
  `price_per_km` varchar(40) NOT NULL,
  `container_cost_wh` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `container_weight`
--

INSERT INTO `container_weight` (`id`, `container_capacity`, `price_per_km`, `container_cost_wh`) VALUES
(1, '200', '300', '400');

-- --------------------------------------------------------

--
-- Table structure for table `counties`
--

CREATE TABLE `counties` (
  `id` int(11) NOT NULL,
  `county` varchar(75) NOT NULL,
  `distance_km` int(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `counties`
--

INSERT INTO `counties` (`id`, `county`, `distance_km`) VALUES
(1, 'Nairobi', 2),
(2, 'Kisumu', 3);

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

CREATE TABLE `countries` (
  `id` int(11) NOT NULL,
  `country_name` varchar(40) NOT NULL,
  `distance_km` int(80) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `countries`
--

INSERT INTO `countries` (`id`, `country_name`, `distance_km`) VALUES
(2, 'Egypt', 20),
(4, 'Morroco', 30),
(1, 'Nigeria', 40),
(3, 'South Africa', 50);

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `id` int(11) NOT NULL,
  `first_name` varchar(20) NOT NULL,
  `last_name` varchar(20) NOT NULL,
  `id_number` int(16) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `email` varchar(40) NOT NULL,
  `password` varchar(16) NOT NULL,
  `status` tinyint(1) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`id`, `first_name`, `last_name`, `id_number`, `phone`, `email`, `password`, `status`) VALUES
(4, '', '', 0, '', '', 'd41d8cd98f00b204', 0),
(16, 'z', 'z', 3, '123454', 'z@gmail.com', 'fbade9e36a3f36d3', 1),
(17, '', '', 5, '', '', 'd41d8cd98f00b204', 0),
(23, 'n', 'n', 8, '987654321', 'n@g.com', '7b8b965ad4bca0e4', 1),
(1, 'a', 'a', 123, '456', 'a@g.com', '0cc175b9c0f1b6a8', 1),
(2, 'b', 'b', 234, '345', 'b@gmail.com', 'b', 1),
(3, 'c', 'c', 444, '555', 'c@g.com', '4a8a08f09d37b737', 1),
(13, 'Ann', 'Annie', 555, '2345969', 'ann@gmail.com', '7e0d7f8a5d96c24f', 1),
(18, 'abc', 'abc', 234567, '765433', 'abc@gmail.com', '900150983cd24fb0', 1);

-- --------------------------------------------------------

--
-- Table structure for table `fleet`
--

CREATE TABLE `fleet` (
  `fleet_id` int(11) NOT NULL,
  `status` tinyint(1) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `fleet`
--

INSERT INTO `fleet` (`fleet_id`, `status`) VALUES
(5000, 0),
(5001, 0);

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `type` varchar(40) NOT NULL,
  `message` varchar(20000) NOT NULL,
  `status` varchar(40) NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`id`, `email`, `type`, `message`, `status`, `date`) VALUES
(10, '', 'comment', 'Hi crush', 'read', '2018-02-09 00:21:21'),
(11, 'Irene', 'like', '', 'read', '2018-02-09 00:21:34'),
(12, 'Joe', 'like', '', 'read', '2018-02-09 00:22:25'),
(13, '', 'comment', 'i need a girl you', 'read', '2018-10-18 18:20:27'),
(14, '', 'comment', 'yeah', 'read', '2018-10-18 18:20:46'),
(15, 'marcello', 'like', '', 'read', '2018-10-18 18:21:26'),
(16, '', 'comment', 'imagine me', 'read', '2018-10-18 19:05:59'),
(17, '', 'comment', ' fearless', 'read', '2018-10-18 19:11:16'),
(18, '', 'comment', 'sundown', 'read', '2018-10-18 19:20:40'),
(19, '', 'comment', 'sundown', 'read', '2018-10-18 19:21:06'),
(20, '', 'comment', 'i need a girl you', 'read', '2018-10-18 19:21:43'),
(21, '', 'comment', 'i need a girl you', 'read', '2018-10-18 19:21:49'),
(22, 'leah', 'like', '', 'unread', '2018-10-18 19:38:05'),
(23, 'leah', 'like', '', 'unread', '2018-10-18 19:38:31'),
(24, 'leah', 'like', '', 'read', '2018-10-18 19:38:35'),
(25, '', 'comment', 'uh', 'unread', '2018-10-18 19:40:47'),
(26, '', 'comment', 'uh', 'unread', '2018-10-18 19:40:59'),
(27, '', 'comment', 'uh', 'unread', '2018-10-18 19:41:05'),
(28, '', 'comment', 'uh', 'unread', '2018-10-18 19:41:28'),
(29, '', 'comment', 'eish', 'unread', '2018-10-18 19:43:59'),
(30, '', 'comment', 'eish', 'unread', '2018-10-18 19:44:22'),
(31, '', 'comment', 'eish', 'unread', '2018-10-18 19:44:25'),
(32, 'ann@gmail.com', 'comment', 'eish', 'unread', '2018-10-18 20:12:21'),
(33, '', 'comment', 'yeah', 'read', '2018-10-18 20:12:31'),
(34, '', 'comment', 'qwerty', 'read', '2018-10-18 20:12:53'),
(35, '', 'comment', 'qwerty', 'read', '2018-10-18 20:13:39'),
(36, '', 'comment', 'wa', 'read', '2018-10-18 20:13:45'),
(37, '', 'comment', 'uh', 'read', '2018-10-18 23:45:25'),
(38, '', 'comment', 'yes', 'read', '2018-10-19 00:11:45'),
(39, 'ann@gmail.com', 'comment', 'at', 'unread', '2018-10-19 00:26:27'),
(40, 'ann@gmail.com', 'comment', 'uh', 'unread', '2018-10-19 00:41:50'),
(41, 'ann@gmail.com', 'comment', 'uh', 'unread', '2018-10-19 00:44:15'),
(42, 'ann@gmail.com', 'comment', 'uh', 'unread', '2018-10-19 00:45:57'),
(43, 'ann@gmail.com', 'comment', 'uh', 'unread', '2018-10-19 00:48:09'),
(44, 'ann@gmail.com', 'comment', 'qwerty', 'unread', '2018-10-19 09:12:58'),
(45, 'ann@gmail.com', 'comment', 'qwerty', 'unread', '2018-10-19 09:17:10'),
(46, 'ann@gmail.com', 'comment', 'qqq', 'unread', '2018-10-19 09:31:45'),
(47, 'ann@gmail.com', 'comment', 'qwer', 'unread', '2018-10-19 09:34:07'),
(48, 'ann@gmail.com', 'comment', 'qwer', 'unread', '2018-10-19 09:35:12'),
(49, 'ann@gmail.com', 'comment', 'yeah', 'unread', '2018-10-19 09:35:19'),
(50, '', 'comment', 'yeah', 'unread', '2018-10-19 09:36:28'),
(51, '', 'comment', 'qwerty', 'unread', '2018-10-19 09:36:52'),
(52, 'ann@gmail.com', 'comment', 'qwerty', 'unread', '2018-10-19 09:37:44'),
(53, 'ann@gmail.com', 'comment', 'qwerty', 'unread', '2018-10-19 09:37:51'),
(54, 'ann@gmail.com', 'comment', 'qwerty', 'unread', '2018-10-19 09:40:33'),
(55, 's@g.com', 'comment', 'uh', 'unread', '2018-10-19 09:41:14'),
(56, 'admin@gmail.com', 'comment', 'uh', 'unread', '2018-10-19 09:42:14'),
(57, 's@g.com', 'comment', 'uh', 'unread', '2018-10-19 09:48:13'),
(58, 'ann@gmail.com', 'comment', 'qwerty', 'unread', '2018-10-19 09:50:41'),
(59, 'ann@gmail.com', 'comment', 'qwerty', 'unread', '2018-10-19 09:53:56'),
(60, 'ann@gmail.com', 'comment', 'qwerty', 'unread', '2018-10-19 09:54:40'),
(61, 'ann@gmail.com', 'comment', 'qwerty', 'read', '2018-10-19 09:54:47'),
(62, 'ann@gmail.com', 'comment', 'qwerty', 'unread', '0000-00-00 00:00:00'),
(63, 'ann@gmail.com', 'comment', 'qwerty', 'unread', '0000-00-00 00:00:00'),
(64, 'ann@gmail.com', 'comment', 'qwerty', 'read', '2018-10-19 10:06:49'),
(65, 'ann@gmail.com', 'comment', 'qwerty', 'read', '2018-10-19 10:07:25'),
(66, 'ann@gmail.com', 'comment', '', 'read', '2018-10-20 11:08:30');

-- --------------------------------------------------------

--
-- Table structure for table `ship`
--

CREATE TABLE `ship` (
  `id` int(11) NOT NULL,
  `ship_id` varchar(20) NOT NULL,
  `email` varchar(40) NOT NULL,
  `country_of_origin` varchar(20) NOT NULL,
  `departure_date` date NOT NULL,
  `arrival_kenya` date NOT NULL,
  `departure_kenya` date NOT NULL,
  `destination` varchar(30) NOT NULL,
  `arrival_destination` date NOT NULL,
  `available_space` int(10) NOT NULL,
  `charge_per_container` int(10) NOT NULL,
  `cost_per_km` int(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ship`
--

INSERT INTO `ship` (`id`, `ship_id`, `email`, `country_of_origin`, `departure_date`, `arrival_kenya`, `departure_kenya`, `destination`, `arrival_destination`, `available_space`, `charge_per_container`, `cost_per_km`) VALUES
(1, '123', '', 'Egypt', '2018-09-08', '2018-09-10', '2018-09-12', 'Egypt', '2018-09-14', 48, 50000, 5000),
(2, 'q1', 'q1@gmail.com', 'Sweden', '2018-09-24', '2018-09-26', '2018-09-28', 'USA', '2018-10-02', 49, 50000, 6000),
(3, 'q2', 'dd@g.com', 'ss', '2018-10-04', '2018-10-11', '2018-10-12', 'Egypt', '2018-10-17', 34, 2000, 4000);

-- --------------------------------------------------------

--
-- Table structure for table `shipper`
--

CREATE TABLE `shipper` (
  `id` int(11) NOT NULL,
  `first_name` varchar(20) NOT NULL,
  `last_name` varchar(20) NOT NULL,
  `id_number` int(16) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `email` varchar(40) NOT NULL,
  `password` varchar(16) NOT NULL,
  `status` tinyint(4) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `shipping_order`
--

CREATE TABLE `shipping_order` (
  `order_id` int(25) NOT NULL,
  `email` varchar(40) NOT NULL,
  `destination` varchar(30) NOT NULL,
  `shipping_date` date NOT NULL,
  `goods_perishability` varchar(25) NOT NULL,
  `goods_type` varchar(25) NOT NULL,
  `goods_weight` varchar(25) NOT NULL,
  `current_location` varchar(25) NOT NULL,
  `pay_status` tinyint(1) DEFAULT '0',
  `book_status` tinyint(1) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `shipping_order`
--

INSERT INTO `shipping_order` (`order_id`, `email`, `destination`, `shipping_date`, `goods_perishability`, `goods_type`, `goods_weight`, `current_location`, `pay_status`, `book_status`) VALUES
(2001, '', 'Egypt', '0000-00-00', '', '', '', '', 0, 0),
(2002, '', 'South Africa', '0000-00-00', '', '', '', '', 0, 0),
(2003, 'ann@gmail.com', 'Egypt', '2018-09-12', 'non-perishable', 'non-delicate', '10', 'Nairobi', 1, 1),
(2004, '', 'Egypt', '0000-00-00', '', '', '', '', 0, 0),
(2005, '', 'Nigeria', '0000-00-00', '', '', '', '', 0, 0),
(2006, '', 'Nigeria', '0000-00-00', '', '', '', '', 0, 0),
(2007, '', 'Egypt', '0000-00-00', '', '', '', '', 0, 0),
(2008, '', 'Egypt', '0000-00-00', '', '', '', '', 0, 0),
(2009, '', 'Egypt', '0000-00-00', '', 'non-delicate', '', '', 0, 0),
(2010, '', 'Egypt', '0000-00-00', '', 'non-delicate', '10', 'Nairobi', 0, 0),
(2011, '', 'Egypt', '2018-10-12', '', 'non-delicate', '10', 'Nairobi', 0, 0),
(2012, '', 'Egypt', '0000-00-00', '2018-10-12', 'non-delicate', '10', 'Nairobi', 0, 0),
(2013, '', 'Egypt', '2018-10-12', 'non-perishable', 'non-delicate', '10', 'Nairobi', 0, 0),
(2014, '', 'Egypt', '0000-00-00', '2018-10-12', 'non-delicate', '10', 'Nairobi', 0, 0),
(2015, '', 'Egypt', '2018-10-12', 'non-perishable', 'non-delicate', '10', 'Nairobi', 0, 0),
(2016, '', 'Egypt', '0000-00-00', '2018-10-12', 'non-delicate', '10', 'Nairobi', 0, 0),
(2017, '', 'Egypt', '2018-10-12', 'non-perishable', 'non-delicate', '10', 'Nairobi', 0, 0),
(2018, '', 'Egypt', '2018-09-12', 'perishable', 'delicate', '10', 'Nairobi', 0, 0),
(2019, '', 'Egypt', '2018-09-12', 'perishable', 'delicate', '56', 'Nairobi', 0, 0),
(2020, '', 'Egypt', '2018-10-12', 'perishable', 'delicate', '800', 'Nairobi', 0, 0),
(2021, '', 'Egypt', '2018-09-12', 'perishable', 'delicate', '20', 'Kisumu', 0, 0),
(2022, 'ann@gmail.com', 'Egypt', '2018-09-12', 'non-perishable', 'non-delicate', '10', 'Nairobi', 1, 0),
(2023, 'ann@gmail.com', 'Egypt', '2018-09-12', 'non-perishable', 'non-delicate', '10', 'Nairobi', 1, 0),
(2024, 'ann@gmail.com', 'Egypt', '2018-09-12', 'non-perishable', 'non-delicate', '10', 'Nairobi', 1, 0),
(2025, 'ann@gmail.com', 'Egypt', '2018-09-12', 'non-perishable', 'non-delicate', '10', 'Nairobi', 1, 0),
(2026, 'ann@gmail.com', 'Egypt', '2018-09-12', 'non-perishable', 'non-delicate', '10', 'Nairobi', 1, 0),
(2027, 'ann@gmail.com', 'Egypt', '2018-09-12', 'non-perishable', 'non-delicate', '10', 'Nairobi', 1, 0),
(2028, 'ann@gmail.com', 'Egypt', '2018-09-12', 'non-perishable', 'non-delicate', '10', 'Nairobi', 1, 0),
(2029, 'ann@gmail.com', 'Egypt', '2018-09-12', 'non-perishable', 'non-delicate', '10', 'Nairobi', 1, 0),
(2030, 'ann@gmail.com', 'Egypt', '2018-09-12', 'non-perishable', 'non-delicate', '10', 'Nairobi', 1, 0),
(2031, 'ann@gmail.com', 'Egypt', '2018-09-12', 'non-perishable', 'non-delicate', '10', 'Nairobi', 1, 0),
(2032, 'ann@gmail.com', 'Egypt', '2018-09-12', 'non-perishable', 'non-delicate', '10', 'Nairobi', 1, 0),
(2033, 'ann@gmail.com', 'Egypt', '2018-09-12', 'non-perishable', 'non-delicate', '10', 'Nairobi', 1, 0),
(2034, 'ann@gmail.com', 'Egypt', '2018-09-12', 'non-perishable', 'non-delicate', '10', 'Nairobi', 1, 0),
(2035, 'ann@gmail.com', 'Egypt', '2018-09-12', 'non-perishable', 'non-delicate', '10', 'Nairobi', 1, 0),
(2036, 'ann@gmail.com', 'Egypt', '2018-09-12', 'non-perishable', 'non-delicate', '10', 'Nairobi', 1, 0),
(2037, 'ann@gmail.com', 'Egypt', '2018-09-12', 'non-perishable', 'non-delicate', '10', 'Nairobi', 1, 0),
(2038, 'ann@gmail.com', 'Egypt', '2018-09-12', 'non-perishable', 'non-delicate', '10', 'Nairobi', 1, 0),
(2039, 'ann@gmail.com', 'Egypt', '2018-09-12', 'non-perishable', 'non-delicate', '10', 'Nairobi', 1, 0),
(2040, 'ann@gmail.com', 'Egypt', '2018-09-12', 'non-perishable', 'non-delicate', '10', 'Nairobi', 1, 0),
(2041, 'ann@gmail.com', 'Egypt', '2018-09-12', 'non-perishable', 'non-delicate', '10', 'Nairobi', 1, 0),
(2042, 'ann@gmail.com', 'Egypt', '2018-09-12', 'non-perishable', 'non-delicate', '10', 'Nairobi', 1, 0),
(2043, 'ann@gmail.com', 'Egypt', '2018-09-12', 'non-perishable', 'non-delicate', '10', 'Nairobi', 1, 0),
(2044, 'ann@gmail.com', 'Egypt', '2018-09-12', 'non-perishable', 'non-delicate', '10', 'Nairobi', 1, 0),
(2045, 'ann@gmail.com', 'Egypt', '2018-09-12', 'non-perishable', 'non-delicate', '10', 'Nairobi', 1, 0),
(2046, 'ann@gmail.com', 'Egypt', '2018-09-12', 'non-perishable', 'non-delicate', '10', 'Nairobi', 1, 0),
(2047, 'ann@gmail.com', 'Egypt', '2018-09-12', 'non-perishable', 'non-delicate', '10', 'Nairobi', 1, 0),
(2048, 'ann@gmail.com', 'Egypt', '2018-09-12', 'non-perishable', 'non-delicate', '10', 'Nairobi', 1, 0),
(2049, 'ann@gmail.com', 'Egypt', '2018-09-12', 'non-perishable', 'non-delicate', '10', 'Nairobi', 1, 0),
(2050, 'ann@gmail.com', 'Egypt', '2018-09-12', 'non-perishable', 'non-delicate', '10', 'Nairobi', 1, 0),
(2051, 'ann@gmail.com', 'Egypt', '2018-09-12', 'perishable', 'delicate', '23040', 'Nairobi', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `warehouse`
--

CREATE TABLE `warehouse` (
  `container_id` int(11) NOT NULL,
  `status` tinyint(1) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `warehouse`
--

INSERT INTO `warehouse` (`container_id`, `status`) VALUES
(4000, 0),
(4001, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cargo_details`
--
ALTER TABLE `cargo_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `container_weight`
--
ALTER TABLE `container_weight`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `counties`
--
ALTER TABLE `counties`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `countries`
--
ALTER TABLE `countries`
  ADD PRIMARY KEY (`country_name`),
  ADD UNIQUE KEY `countryname` (`id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id_number`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `fleet`
--
ALTER TABLE `fleet`
  ADD PRIMARY KEY (`fleet_id`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ship`
--
ALTER TABLE `ship`
  ADD PRIMARY KEY (`ship_id`),
  ADD UNIQUE KEY `ship` (`id`);

--
-- Indexes for table `shipper`
--
ALTER TABLE `shipper`
  ADD PRIMARY KEY (`id_number`),
  ADD UNIQUE KEY `shipper` (`id`);

--
-- Indexes for table `shipping_order`
--
ALTER TABLE `shipping_order`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `warehouse`
--
ALTER TABLE `warehouse`
  ADD PRIMARY KEY (`container_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `cargo_details`
--
ALTER TABLE `cargo_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `container_weight`
--
ALTER TABLE `container_weight`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `counties`
--
ALTER TABLE `counties`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `countries`
--
ALTER TABLE `countries`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `fleet`
--
ALTER TABLE `fleet`
  MODIFY `fleet_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5002;

--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;

--
-- AUTO_INCREMENT for table `ship`
--
ALTER TABLE `ship`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `shipper`
--
ALTER TABLE `shipper`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `shipping_order`
--
ALTER TABLE `shipping_order`
  MODIFY `order_id` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2052;

--
-- AUTO_INCREMENT for table `warehouse`
--
ALTER TABLE `warehouse`
  MODIFY `container_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4002;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
