-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 28, 2019 at 10:37 PM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.1.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `quickerbooksdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `chartofaccounts`
--

CREATE TABLE `chartofaccounts` (
  `accountname` varchar(50) NOT NULL,
  `accountnumber` int(8) NOT NULL,
  `description` varchar(100) DEFAULT NULL,
  `normalside` text DEFAULT NULL,
  `category` text NOT NULL,
  `subcategory` text NOT NULL,
  `initialbalance` decimal(50,0) DEFAULT NULL,
  `debit` decimal(25,0) DEFAULT NULL,
  `credit` decimal(25,0) DEFAULT NULL,
  `balance` decimal(50,0) DEFAULT NULL,
  `dateadded` date DEFAULT NULL,
  `userid` varchar(25) NOT NULL,
  `order` int(10) DEFAULT NULL,
  `statement` varchar(50) DEFAULT NULL,
  `comment` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `chartofaccounts`
--

INSERT INTO `chartofaccounts` (`accountname`, `accountnumber`, `description`, `normalside`, `category`, `subcategory`, `initialbalance`, `debit`, `credit`, `balance`, `dateadded`, `userid`, `order`, `statement`, `comment`) VALUES
('Cash', 10000001, NULL, NULL, 'Assets', 'Cash Related Accounts', NULL, NULL, NULL, NULL, NULL, 'admin', NULL, NULL, NULL),
('Petty Cash', 10000005, NULL, NULL, 'Assets', 'Cash Related Accounts', NULL, NULL, NULL, NULL, '2019-10-23', 'admin', NULL, NULL, NULL),
('Notes Receivable', 10000021, NULL, NULL, 'Assets', 'Receivables', NULL, NULL, NULL, NULL, '2019-10-23', 'admin', NULL, NULL, NULL),
('Accounts Receivable', 10000122, NULL, NULL, 'Assets', 'Receivables', NULL, NULL, NULL, NULL, '2019-10-23', 'admin', NULL, NULL, NULL),
('Interest Receivable', 10000123, '(Also Accrued Interest Receivable)', NULL, 'Assets', 'Receivables', NULL, NULL, NULL, NULL, '2019-10-23', 'admin', NULL, NULL, NULL),
('Common Stock Subscriptions Receivable', 10000125, NULL, NULL, 'Assets', 'Receivables', NULL, NULL, NULL, NULL, '2019-10-23', 'admin', NULL, NULL, NULL),
('Preferred Stock Subscriptions Receivable', 10000126, NULL, NULL, 'Assets', 'Receivables', NULL, NULL, NULL, NULL, '2019-10-23', 'admin', NULL, NULL, NULL),
('Merchandise Inventory', 10000131, NULL, NULL, 'Assets', 'Inventories', NULL, NULL, NULL, NULL, '2019-10-23', 'admin', NULL, NULL, NULL),
('Raw Materials', 10000132, NULL, NULL, 'Assets', 'Inventories', NULL, NULL, NULL, NULL, '2019-10-23', 'admin', NULL, NULL, NULL),
('Work in Progress', 10000133, NULL, NULL, 'Assets', 'Inventories', NULL, NULL, NULL, NULL, '2019-10-23', 'admin', NULL, NULL, NULL),
('Finished Goods', 10000134, NULL, NULL, 'Assets', 'Inventories', NULL, NULL, NULL, NULL, '2019-10-23', 'admin', NULL, NULL, NULL),
('Supplies', 10000141, '(Specialty items like Medical, Bicycle, Tailoring, etc.)', NULL, 'Assets', 'Prepaid Items', NULL, NULL, NULL, NULL, '2019-10-23', 'admin', NULL, NULL, NULL),
('Office Supplies', 10000142, NULL, NULL, 'Assets', 'Prepaid Items', NULL, NULL, NULL, NULL, '2019-10-23', 'admin', NULL, NULL, NULL),
('Food Supplies', 10000144, NULL, NULL, 'Assets', 'Prepaid Items', NULL, NULL, NULL, NULL, '2019-10-23', 'admin', NULL, NULL, NULL),
('Prepaid Insurance', 10000145, NULL, NULL, 'Assets', 'Prepaid Items', NULL, NULL, NULL, NULL, '2019-10-23', 'admin', NULL, NULL, NULL),
('Bond Sinking Fund', 10000153, NULL, NULL, 'Assets', 'Long-Term Investments', NULL, NULL, NULL, NULL, '2019-10-23', 'admin', NULL, NULL, NULL),
('Land', 10000161, NULL, NULL, 'Assets', 'Land', NULL, NULL, NULL, NULL, '2019-10-23', 'admin', NULL, NULL, NULL),
('Natural Resources', 10000162, NULL, NULL, 'Assets', 'Land', NULL, NULL, NULL, NULL, '2019-10-23', 'admin', NULL, NULL, NULL),
('Accumulated Depletion', 10000163, NULL, NULL, 'Assets', 'Land', NULL, NULL, NULL, NULL, '2019-10-23', 'admin', NULL, NULL, NULL),
('Buildings', 10000171, NULL, NULL, 'Assets', 'Buildings', NULL, NULL, NULL, NULL, '2019-10-23', '', NULL, NULL, NULL),
('Accumulated Depreciation - Buildings', 10000172, NULL, NULL, 'Assets', 'Buildings', NULL, NULL, NULL, NULL, '2019-10-23', 'admin', NULL, NULL, NULL),
('Office Equipment', 10000181, '(Also Store Equipment)', NULL, 'Assets', 'Equipment', NULL, NULL, NULL, NULL, '2019-10-23', 'admin', NULL, NULL, NULL),
('Office Furniture', 10000182, NULL, NULL, 'Assets', 'Equipment', NULL, NULL, NULL, NULL, '2019-10-23', 'admin', NULL, NULL, NULL),
('Athletic Equipment', 10000183, NULL, NULL, 'Assets', 'Equipment', NULL, NULL, NULL, NULL, '2019-10-23', 'admin', NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `chartofaccounts`
--
ALTER TABLE `chartofaccounts`
  ADD PRIMARY KEY (`accountnumber`),
  ADD UNIQUE KEY `account name` (`accountname`),
  ADD UNIQUE KEY `accountnumber` (`accountnumber`),
  ADD UNIQUE KEY `accountnumber_2` (`accountnumber`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
