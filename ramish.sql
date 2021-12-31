-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 27, 2021 at 05:55 PM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 8.0.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ramish`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`) VALUES
(1, 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `category` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `category`) VALUES
(3, 'Exteriors'),
(4, 'Client Proposals'),
(5, 'Interiors'),
(6, '3D Product Modeling'),
(7, 'Product Documentation');

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

CREATE TABLE `projects` (
  `pro_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `pro_title` varchar(255) NOT NULL,
  `pro_desc` varchar(1000) NOT NULL,
  `pro_image` varchar(2000) NOT NULL,
  `pro_thumb` varchar(1000) NOT NULL,
  `pro_type` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `projects`
--

INSERT INTO `projects` (`pro_id`, `category_id`, `pro_title`, `pro_desc`, `pro_image`, `pro_thumb`, `pro_type`) VALUES
(22, 5, 'aaaaaaaaaaaaaaaaa', 'sssssssssssssssssss', '818153373_', '', 1),
(23, 3, 'ssssssssssssssssss', 'aaaaaaaaaaaaaaaa', '738639332_', '', 1),
(24, 5, 'bbbbbbbbbbbbbbbbb', 'vvvvvvvvvvvvvvvvvvvv', '693693781_', '', 1),
(25, 5, 'xxxxxxxxxxxxxxxxx', 'sssssssssssssssss', '823134782_', '', 1),
(26, 3, 'nnnnnnnnnnnnnnnn', 'mmmmmmmmmmmmmm', '372362619_', '', 1),
(27, 3, 'yyyyyyyyyyyyyyyy', 'uuuuuuuuuuuuuuu', '834715161_', '', 1),
(28, 6, 'ggggggggggggggg', 'vvvvvvvvvvvvvvvv', '504240673_', '', 1),
(29, 3, 'uuuuuuuuuuuuu', 'kkkkkkkkkkkkk', '860064525_', '', 1),
(30, 6, 'ppppppppppppp', 'ooooooooooooooo', '640959672_', '', 2),
(31, 5, 'iiiiiiiiiiiiiiiiiiiiiiii', 'uuuuuuuuiiiiiii', '386472710_', '', 1),
(32, 3, 'ccxzczxcxc', 'asdasdasd', '282973533_', '', 2);

-- --------------------------------------------------------

--
-- Table structure for table `rooms`
--

CREATE TABLE `rooms` (
  `room_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `room_desc` varchar(1000) NOT NULL,
  `image` varchar(2000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `rooms`
--

INSERT INTO `rooms` (`room_id`, `title`, `room_desc`, `image`) VALUES
(10, 'corona_panorama', 'this is a corona panorama', '765328920_'),
(11, 'Ramish-z', 'ramish', '965500371_');

-- --------------------------------------------------------

--
-- Table structure for table `types`
--

CREATE TABLE `types` (
  `id` int(11) NOT NULL,
  `type_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `types`
--

INSERT INTO `types` (`id`, `type_name`) VALUES
(1, 'Landscape'),
(2, 'Portrait');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`pro_id`);

--
-- Indexes for table `rooms`
--
ALTER TABLE `rooms`
  ADD PRIMARY KEY (`room_id`);

--
-- Indexes for table `types`
--
ALTER TABLE `types`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `projects`
--
ALTER TABLE `projects`
  MODIFY `pro_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `rooms`
--
ALTER TABLE `rooms`
  MODIFY `room_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `types`
--
ALTER TABLE `types`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
