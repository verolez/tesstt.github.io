-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 14, 2021 at 09:35 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `coa`
--

-- --------------------------------------------------------

--
-- Table structure for table `accounts`
--

CREATE TABLE `accounts` (
  `account_id` int(11) NOT NULL,
  `account_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `accounts`
--

INSERT INTO `accounts` (`account_id`, `account_name`) VALUES
(1, 'IPI'),
(3, 'sample 2'),
(4, 'sample 1'),
(5, 'DEMO'),
(6, 'TN');

-- --------------------------------------------------------

--
-- Table structure for table `productrelease`
--

CREATE TABLE `productrelease` (
  `id` int(11) NOT NULL,
  `product_name` varchar(60) NOT NULL,
  `account` varchar(50) NOT NULL,
  `manufactured_quantity` varchar(30) NOT NULL,
  `control_num` varchar(30) NOT NULL,
  `created_by` varchar(50) NOT NULL,
  `assign_to` varchar(50) NOT NULL,
  `po_num` varchar(30) NOT NULL,
  `status` varchar(20) NOT NULL,
  `customer_name` varchar(50) NOT NULL,
  `manufacture_date` date NOT NULL,
  `rev_num` varchar(30) NOT NULL,
  `expiration_date` date NOT NULL,
  `lot_num` varchar(30) NOT NULL,
  `serving_size` varchar(30) NOT NULL,
  `item_num` varchar(30) NOT NULL,
  `serving_per` varchar(30) NOT NULL,
  `physicaltest` text NOT NULL,
  `physicalspecification` text NOT NULL,
  `physicalmethod` text NOT NULL,
  `physicalresults` text NOT NULL,
  `chemicaltest` text NOT NULL,
  `chemicalunit` text NOT NULL,
  `chemicalmin` text NOT NULL,
  `chemicalmax` text NOT NULL,
  `chemicalinput` text NOT NULL,
  `heavymetaltest` text NOT NULL,
  `heavymetalug` text NOT NULL,
  `heavymetalinput` text NOT NULL,
  `microbiologicaltest` text NOT NULL,
  `microbiologicalcfu` text NOT NULL,
  `microbiologicalinput` text NOT NULL,
  `comment` text NOT NULL,
  `date_added` date NOT NULL DEFAULT current_timestamp(),
  `date_modified` date NOT NULL DEFAULT current_timestamp(),
  `coa` varchar(15) NOT NULL,
  `batchrecord` varchar(15) NOT NULL,
  `ftir` varchar(15) NOT NULL,
  `preparedname` varchar(200) NOT NULL,
  `prepareddescription` varchar(200) NOT NULL,
  `reviewedname` varchar(200) NOT NULL,
  `revieweddescription` varchar(200) NOT NULL,
  `approvedname` varchar(200) NOT NULL,
  `approveddescription` varchar(200) NOT NULL,
  `authorizedname` varchar(200) NOT NULL,
  `authorizeddescription` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `productrelease`
--

INSERT INTO `productrelease` (`id`, `product_name`, `account`, `manufactured_quantity`, `control_num`, `created_by`, `assign_to`, `po_num`, `status`, `customer_name`, `manufacture_date`, `rev_num`, `expiration_date`, `lot_num`, `serving_size`, `item_num`, `serving_per`, `physicaltest`, `physicalspecification`, `physicalmethod`, `physicalresults`, `chemicaltest`, `chemicalunit`, `chemicalmin`, `chemicalmax`, `chemicalinput`, `heavymetaltest`, `heavymetalug`, `heavymetalinput`, `microbiologicaltest`, `microbiologicalcfu`, `microbiologicalinput`, `comment`, `date_added`, `date_modified`, `coa`, `batchrecord`, `ftir`, `preparedname`, `prepareddescription`, `reviewedname`, `revieweddescription`, `approvedname`, `approveddescription`, `authorizedname`, `authorizeddescription`) VALUES
(19, 'Chocolate', 'IPI', '1', '2', 'Me', 'Arnel Ryan', '3', 'Approved', 'John', '1999-01-01', '6', '2000-02-02', '4', '7', '5', '8', 'Physical Testing 1|Physical Testing 2|Physical Testing 3|Physical Testing 4', 'Specification 1|Specification 2|Specification 3|Specification 4', 'Method 1|Method 2|Method 3|Method 4', 'Results 1|Results 2 a|Results 3|Results 4', 'Chemical Testing 1|Chemical Testing 2|Chemical Testing 3', 'Unit 1|Unit 2|Unit 3', '1|2|3', '11|12|13', '1|3|14', 'Heavy Metal Testing 1|Heavy Metal Testing 2|Heavy Metal Testing 3', 'µg 1|µg 2|µg 3', 'Input 1|Input 2|Input 3', 'Microbiological Testing 1|Microbiological Testing 2|Microbiological Testing 3', 'cfu/g 1|cfu/g 2|cfu/g 3', 'Input 1|Input 2|Input 3', '\nHistory Log - [2021-06-18 08:57:07 pm]\n - \"Arnel Ryan\" has Approved this Product Release \n \nHistory Log - [2021-06-18 08:56:56 pm]\n - Status has been changed from \"Approved\" to \"For Review\"\n\nHistory Log - [2021-06-18 08:54:06 pm]\n - \"Arnel Ryan\" has Approved this Product Release \n \nHistory Log - [2021-06-18 08:53:58 pm]\n - Status has been changed from \"Approved\" to \"For Review\"\n\nHistory Log - [2021-06-18 08:53:41 pm]\n - \"Arnel Ryan\" has Approved this Product Release \n \nHistory Log - [2021-06-18 08:53:37 pm]\n - Status has been changed from \"Approved\" to \"Ongoing\"\n\nHistory Log - [2021-06-18 08:53:21 pm]\n - \"Arnel Ryan\" has Approved this Product Release \n \nHistory Log - [2021-06-14 10:35:13 pm]\n - Status has been changed from \"Approved\" to \"Ongoing\"\n\nHistory Log - [2021-06-14 09:57:03 am]\n - \"Name 3\" Name Info has been added to the Prepared by section\n - \"Description 3\" Description Info has been added to the Prepared by section\n - \"Name 4\" Name Info has been added to the Prepared by section\n - \"Description 4\" Description Info has been added to the Prepared by section\n - \"Name 5\" Name Info has been added to the Prepared by section\n - \"Description 5\" Description Info has been added to the Prepared by section\n - \"Name 6\" Name Info has been added to the Prepared by section\n - \"Description 6\" Description Info has been added to the Prepared by section\n - \"Name 7\" Name Info has been added to the Prepared by section\n - \"Description 7\" Description Info has been added to the Prepared by section\n - \"Name 8\" Name Info has been added to the Prepared by section\n - \"Description 8\" Description Info has been added to the Prepared by section\n - \"Name 9\" Name Info has been added to the Prepared by section\n - \"Description 9\" Description Info has been added to the Prepared by section\n - \"Name 10\" Name Info has been added to the Prepared by section\n - \"Description 10\" Description Info has been added to the Prepared by section\n\nHistory Log - [2021-06-09 10:34:00 pm]\n - \"Arnel Ryan\" has Approved this Product Release \n \nHistory Log - [2021-06-09 12:23:13 am]\n - \"Arnel Ryan\" has Approved this Product Release \n \nHistory Log - [2021-06-09 12:22:18 am]\n - Status has been changed from \"Approved\" to \"Ongoing\"\n\nHistory Log - [2021-06-01 10:28:47 pm]\n - \"Arnel Ryan\" has Approved this Product Release \n \nHistory Log - [2021-06-01 10:28:21 pm]\n - Status has been changed from \"Approved\" to \"For Review\"\nHistory Log - [2021-06-01 09:51:44 pm]\n - \"Arnel Ryan\" has Approved this Product Release \n History Log - [2021-06-01 09:50:47 pm]\n - Status has been changed from \"Approved\" to \"Ongoing\"\nHistory Log - [2021-06-01 09:48:59 pm]\n - Physical Testing Results Info has been changed from \"Results 2\" to \"Results 2 a\"\nHistory Log - [2021-05-22 11:45:24 pm]\n - \"Arnel Ryan\" has Approved this Product Release \n Comment - [2021-05-22 09:48:22 pm]\n - sample 2\n - Added Release [2021-05-22 09:48:22 pm]', '2021-05-22', '2021-06-18', 'Not Submitted', 'Submitted', 'Not Submitted', 'Name 1|Name 2|Name 3|Name 4|Name 5|Name 6|Name 7|Name 8|Name 9|Name 10', 'Description 1|Description 2|Description 3|Description 4|Description 5|Description 6|Description 7|Description 8|Description 9|Description 10', 'Name 1', 'Description 1', 'Name 1', 'Description 1', 'Name 1', 'Description 1'),
(31, 'sample product name', 'TN', 'PENDING', 'PENDING', 'John Nelon', 'Arnel Ryan', 'PENDING', 'Ongoing', 'sample customer name', '2021-01-01', 'PENDING', '2022-01-02', 'PENDING', 'PENDING', 'PENDING', 'PENDING', 'Physical Testing', 'Specification', 'Method', 'Results', 'Chemical Testing/Manufacture Input per Serving:', 'Unit', '1', '2', '0.2', 'Heavy Metal Testing', 'µg', 'Results', 'Microbiological Testing', 'cfu/g', 'Results', '\n - Added Release [2021-06-18 10:31:09 pm]', '2021-06-18', '2021-06-18', 'Not Submitted', 'Not Submitted', 'Not Submitted', 'Prepared Name', 'Prepared Description', 'Reviewed Name', 'Reviewed Description', 'Approved Name', 'Approved Description', 'Authorized Name', 'Authorized Description'),
(32, 'Ka Chava Chocolate Protein Powder - 930 g', 'TN', '1', '2', 'John Nelon', 'Arnel Ryan', '3', 'Ongoing', 'Tribal Nutrition', '2021-01-01', '6', '2022-01-02', '4', '7', '5', '8', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '\n - Added Release [2021-06-18 10:40:03 pm]', '2021-06-18', '2021-06-18', 'Not Submitted', 'Not Submitted', 'Not Submitted', '', '', '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `displayname` varchar(50) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(270) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `displayname`, `username`, `password`) VALUES
(8, 'admin', 'adminsample', '$2y$10$bfww4h/S8eBaqm7ehuYwBeHyRb.BYthnnse7yk9mNWI.li7Hb6tBq');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accounts`
--
ALTER TABLE `accounts`
  ADD PRIMARY KEY (`account_id`);

--
-- Indexes for table `productrelease`
--
ALTER TABLE `productrelease`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accounts`
--
ALTER TABLE `accounts`
  MODIFY `account_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `productrelease`
--
ALTER TABLE `productrelease`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
