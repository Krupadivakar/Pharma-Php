-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 20, 2021 at 08:16 AM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.4.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pharma_traceability`
--

-- --------------------------------------------------------

--
-- Table structure for table `drug_manufacturer`
--

CREATE TABLE `drug_manufacturer` (
  `auto_id` int(8) NOT NULL,
  `drug_manufacturer_name` varchar(100) NOT NULL,
  `drug_manufacturer_address` varchar(150) NOT NULL,
  `drug_manufacturer_state` varchar(50) NOT NULL,
  `status` int(1) NOT NULL,
  `rurl` varchar(30) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `drug_manufacturer`
--

INSERT INTO `drug_manufacturer` (`auto_id`, `drug_manufacturer_name`, `drug_manufacturer_address`, `drug_manufacturer_state`, `status`, `rurl`) VALUES
(1, 'LEKAR PHARMA LIMITED', 'INDUSTRIAL AREA PANOLI', 'GUJARAT', 1, '94KSDFK29Akads322jjksfowekadsk'),
(2, 'MAYER ORGANICS PRIVATE LIMITED', '10D 2ND PHASE PEENYA INDUSTRIAL AREA BENGALURU', 'KARNATAKA', 1, '0FKA92jasdj291kallsk32j299020'),
(3, 'YOURS MEDICARE PRIVATE LIMITED', 'DEVBHOOMI INDUSTRIAL ESTATE, ROORKEE', 'WEST BENGAL', 1, '992JASDK1kkjf823kkasd923k'),
(4, 'UTTARANCHAL BIOTECH PRIVATE LIMITED', 'JAYANAGAR DINESHPUR ROAD RUDRAPUR', 'UTTARAKAND', 1, '0IASJJ2kdkkf823jsad8j239df'),
(5, 'WRIGHTBERG PHARMACEUTICALS PRIVATE LIMITED', 'TESTING ADDRESS', 'TESTING STATE', 1, ''),
(6, 'testing pharma 2', 'testing pharma 2 address', 'testing pharma2 state', 1, 'r4hc3ltS7HWx_MpvZaVEwP2JC95dDb');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `drug_manufacturer`
--
ALTER TABLE `drug_manufacturer`
  ADD PRIMARY KEY (`auto_id`),
  ADD UNIQUE KEY `rurl` (`rurl`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `drug_manufacturer`
--
ALTER TABLE `drug_manufacturer`
  MODIFY `auto_id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
