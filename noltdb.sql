-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 05, 2020 at 11:43 PM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `noltdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbladmin`
--

CREATE TABLE `tbladmin` (
  `ID` int(11) NOT NULL,
  `AdminName` varchar(45) DEFAULT NULL,
  `UserName` varchar(45) DEFAULT NULL,
  `MobileNumber` bigint(11) DEFAULT NULL,
  `Email` varchar(120) DEFAULT NULL,
  `Password` varchar(120) DEFAULT NULL,
  `AdminRegdate` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbladmin`
--

INSERT INTO `tbladmin` (`ID`, `AdminName`, `UserName`, `MobileNumber`, `Email`, `Password`, `AdminRegdate`) VALUES
(1, 'Admin user', 'admin', 20415009, 'etozhewhsk@gmail.com', 'd8578edf8458ce06fbc5bb76a58c5ca4', '2020-03-01 08:16:39');

-- --------------------------------------------------------

--
-- Table structure for table `tblcategory`
--

CREATE TABLE `tblcategory` (
  `ID` int(5) NOT NULL,
  `CategoryName` varchar(120) DEFAULT NULL,
  `CreationDate` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblcategory`
--

INSERT INTO `tblcategory` (`ID`, `CategoryName`, `CreationDate`) VALUES
(11, 'Susi', '2020-05-05 16:11:14'),
(12, 'Burgeri', '2020-05-05 16:11:30'),
(13, 'Salati', '2020-05-05 16:11:34'),
(14, 'Kebabi', '2020-05-05 16:11:38'),
(15, 'Pica', '2020-05-05 16:11:42'),
(16, 'Zivis', '2020-05-05 16:11:46'),
(17, 'Sviestmaizes', '2020-05-05 16:11:52'),
(18, 'Zupas', '2020-05-05 16:11:55');

-- --------------------------------------------------------

--
-- Table structure for table `tblfood`
--

CREATE TABLE `tblfood` (
  `ID` int(10) NOT NULL,
  `CategoryName` varchar(120) DEFAULT NULL,
  `ItemName` varchar(120) DEFAULT NULL,
  `ItemPrice` varchar(120) DEFAULT NULL,
  `ItemDes` varchar(500) DEFAULT NULL,
  `Image` varchar(120) DEFAULT NULL,
  `ItemQty` varchar(120) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblfood`
--

INSERT INTO `tblfood` (`ID`, `CategoryName`, `ItemName`, `ItemPrice`, `ItemDes`, `Image`, `ItemQty`) VALUES
(17, 'Burgeri', '\"RAV\" burgers', '7', 'Brioša maizite, Ravmerce, romiešu salati, tomats, marineti sarkanie sipoli, briedinata liellopa gala, mocarella, divu veidu Cedaras sieri, meza senu salsa ar trifelu garsu, titara Cipsi, kartupelu kraukški.', 'd96c87dbe9a90c65aa0b5934940582e7jpeg', '1'),
(18, 'Burgeri', '\"Klasika\" burgers', '6', 'Brioša maizite, Ravmerce, romiešu salati, tomats, marineti sarkanie sipoli, briedinata liellopa gala, mocarella, divu veidu Cedaras sieri, meza senu salsa ar trifelu garsu, titara Cipsi, kartupelu kraukški.                                                 	', '051e6d35b1fbfa4137f1f28226cd9049jpeg', '1'),
(19, 'Burgeri', '\"Hell\" burgers', '9', 'Brioša maizite, Ravmerce, romiešu salati, tomats, marineti sarkanie sipoli, briedinata liellopa gala, mocarella, divu veidu Cedaras sieri, meza senu salsa ar trifelu garsu, titara Cipsi, kartupelu kraukški.', '7edc526e13eb926c08c37d67039626c2jpeg', '1'),
(20, 'Burgeri', '\"Kokoko\" burgers', '4', 'Brioša maizite, Ravmerce, romiešu salati, tomats, marineti sarkanie sipoli, briedinata liellopa gala, mocarella, divu veidu Cedaras sieri, meza senu salsa ar trifelu garsu, titara Cipsi, kartupelu kraukški.', '0af3e1452b36319bbcab724ffe6bec08jpeg', '1'),
(21, 'Susi', 'Shrimp roll', '9', 'Brioša maizite, Ravmerce, romiešu salati, tomats, marineti sarkanie sipoli, briedinata liellopa gala, mocarella, divu veidu Cedaras sieri, meza senu salsa ar trifelu garsu, titara Cipsi, kartupelu kraukški.                               	', '73daabde14198cb146a04dc61b0a0eb6jpeg', '2'),
(22, 'Susi', 'Laša tako', '4', 'Brioša maizite, Ravmerce, romiešu salati, tomats, marineti sarkanie sipoli, briedinata liellopa gala, mocarella, divu veidu Cedaras sieri, meza senu salsa ar trifelu garsu, titara Cipsi, kartupelu kraukški.                                          	', '225da15da33aa0682ab96ccfec765579jpeg', '1'),
(23, 'Susi', 'Juras velšu tako', '4', 'Brioša maizite, Ravmerce, romiešu salati, tomats, marineti sarkanie sipoli, briedinata liellopa gala, mocarella, divu veidu Cedaras sieri, meza senu salsa ar trifelu garsu, titara Cipsi, kartupelu kraukški.                                     	', '3f991e80cc000f9f49d4f8ba79ed2a9bjpeg', '1'),
(24, 'Kebabi', 'Vraps ar vistu', '5', 'Brioša maizite, Ravmerce, romiešu salati, tomats, marineti sarkanie sipoli, briedinata liellopa gala, mocarella, divu veidu Cedaras sieri, meza senu salsa ar trifelu garsu, titara Cipsi, kartupelu kraukški.                           	', 'eb3bf3eb6b3098f928fd65fbb2280dddjpeg', '1');

-- --------------------------------------------------------

--
-- Table structure for table `tblfoodtracking`
--

CREATE TABLE `tblfoodtracking` (
  `ID` int(10) NOT NULL,
  `OrderId` char(50) DEFAULT NULL,
  `remark` varchar(200) DEFAULT NULL,
  `status` char(50) DEFAULT NULL,
  `StatusDate` timestamp NULL DEFAULT current_timestamp(),
  `OrderCanclledByUser` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblfoodtracking`
--

INSERT INTO `tblfoodtracking` (`ID`, `OrderId`, `remark`, `status`, `StatusDate`, `OrderCanclledByUser`) VALUES
(13, '669788630', '123', 'Order Confirmed', '2020-05-05 13:05:11', NULL),
(14, '669788630', 'asd', 'Order Cancelled', '2020-05-05 13:21:47', 1),
(15, '166971170', 'Confirmed', 'Order Confirmed', '2020-05-05 17:09:00', NULL),
(16, '166971170', 'Preparing', 'Food being Prepared', '2020-05-05 17:10:35', NULL),
(17, '166971170', '45', 'Order Cancelled', '2020-05-05 17:10:52', 1),
(18, '166971170', 'Preparing', 'Food being Prepared', '2020-05-05 17:11:10', NULL),
(19, '166971170', '123', 'Food Pickup', '2020-05-05 17:11:16', NULL),
(20, '904719776', 'Enjoy :)', 'Food Delivered', '2020-05-05 21:32:09', NULL),
(21, '838200365', 'Enjoy :)', 'Order Confirmed', '2020-05-05 21:32:22', NULL),
(22, '838200365', 'Enjoy :)', 'Food Delivered', '2020-05-05 21:32:29', NULL),
(23, '838200365', 'Enjoy :)', 'Food Delivered', '2020-05-05 21:32:57', NULL),
(24, '267299974', 'Enjoy :)', 'Food Delivered', '2020-05-05 21:33:04', NULL),
(25, '317501925', 'Enjoy :)', 'Food Delivered', '2020-05-05 21:33:44', NULL),
(26, '208615082', 'Enjoy :)', 'Food Delivered', '2020-05-05 21:34:24', NULL),
(27, '474764587', 'Negribu', 'Order Cancelled', '2020-05-05 21:34:50', 1),
(28, '365523938', '123', 'Order Cancelled', '2020-05-05 21:35:13', 1),
(29, '749394244', '555', 'Order Cancelled', '2020-05-05 21:35:34', 1),
(30, '479699679', '124124', 'Order Cancelled', '2020-05-05 21:36:02', 1),
(31, '981637134', '123', 'Food Pickup', '2020-05-05 21:37:26', NULL),
(32, '394237806', '123', 'Food Pickup', '2020-05-05 21:37:30', NULL),
(33, '139912017', '123', 'Food Pickup', '2020-05-05 21:37:34', NULL),
(34, '611182775', '123', 'Food Pickup', '2020-05-05 21:37:38', NULL),
(35, '352583661', '123', 'Food Pickup', '2020-05-05 21:37:42', NULL),
(36, '611182775', '123', 'Food being Prepared', '2020-05-05 21:37:52', NULL),
(37, '627209811', '22', 'Food being Prepared', '2020-05-05 21:38:59', NULL),
(38, '530342792', '22', 'Food being Prepared', '2020-05-05 21:39:04', NULL),
(39, '988638056', '222', 'Food being Prepared', '2020-05-05 21:39:08', NULL),
(40, '761758216', '222', 'Food being Prepared', '2020-05-05 21:39:12', NULL),
(41, '855996061', '222', 'Order Confirmed', '2020-05-05 21:39:38', NULL),
(42, '797445247', '222', 'Order Confirmed', '2020-05-05 21:39:44', NULL),
(43, '797445247', '222', 'Order Confirmed', '2020-05-05 21:40:29', NULL),
(44, '917283433', '123', 'Order Confirmed', '2020-05-05 21:40:34', NULL),
(45, '789908432', '213', 'Order Confirmed', '2020-05-05 21:40:38', NULL),
(46, '932407481', '123123', 'Order Confirmed', '2020-05-05 21:40:49', NULL),
(47, '932407481', '123123', 'Order Confirmed', '2020-05-05 21:41:06', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tblorderaddresses`
--

CREATE TABLE `tblorderaddresses` (
  `ID` int(11) NOT NULL,
  `UserId` char(100) DEFAULT NULL,
  `Ordernumber` char(100) DEFAULT NULL,
  `Flatnobuldngno` varchar(255) DEFAULT NULL,
  `StreetName` varchar(255) DEFAULT NULL,
  `Code` varchar(255) DEFAULT NULL,
  `City` varchar(255) DEFAULT NULL,
  `OrderTime` timestamp NOT NULL DEFAULT current_timestamp(),
  `OrderFinalStatus` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblorderaddresses`
--

INSERT INTO `tblorderaddresses` (`ID`, `UserId`, `Ordernumber`, `Flatnobuldngno`, `StreetName`, `Code`, `City`, `OrderTime`, `OrderFinalStatus`) VALUES
(7, '1', '669788630', '13', 'Mazais Rogu ce?š', '', 'Jelgava', '2020-05-05 13:04:36', 'Order Cancelled'),
(8, '1', '166971170', '13', 'Mazais Rogu ce?š', '', 'Jelgava', '2020-05-05 17:08:13', 'Food Pickup'),
(9, '1', '904719776', '13', 'Mazais Rogu ce?š', '123', 'Jelgava', '2020-05-05 19:42:56', 'Food Delivered'),
(10, '1', '838200365', '13', 'Mazais Rogu ce?š', '', 'Jelgava', '2020-05-05 21:28:51', 'Food Delivered'),
(11, '1', '267299974', '1', 'Pasta sala iela', 'Nav', 'Jelgava', '2020-05-05 21:32:54', 'Food Delivered'),
(12, '1', '317501925', '22', 'Maskavas iela', '584', 'R?ga', '2020-05-05 21:33:33', 'Food Delivered'),
(13, '1', '208615082', '1', 'Mazais Rogu ce?š', '1', 'Jelgava', '2020-05-05 21:34:14', 'Food Delivered'),
(14, '1', '474764587', '13', 'Mazais Rogu ce?š', '50512', 'Jelgava', '2020-05-05 21:34:40', 'Order Cancelled'),
(15, '1', '365523938', '13', 'Mazais Rogu ce?š', '50512', 'Jelgava', '2020-05-05 21:35:06', 'Order Cancelled'),
(16, '1', '749394244', '1', 'Mazais Rogu ce?š', '50514', 'Jelgava', '2020-05-05 21:35:27', 'Order Cancelled'),
(17, '1', '479699679', '111', 'Mazais Rogu ce?š', '50152', 'Jelgava', '2020-05-05 21:35:56', 'Order Cancelled'),
(18, '1', '981637134', '13', 'Mazais Rogu ce?š', '50512', 'Jelgava', '2020-05-05 21:36:40', 'Food Pickup'),
(19, '1', '394237806', '13', 'Mazais Rogu ce?š', '50512', 'Jelgava', '2020-05-05 21:36:44', 'Food Pickup'),
(20, '1', '139912017', '22', 'Mazais Rogu ce?š', '50512', 'Jelgava', '2020-05-05 21:36:57', 'Food Pickup'),
(21, '1', '611182775', '13', 'Mazais Rogu ce?š', '50512', 'Jelgava', '2020-05-05 21:37:06', 'Food being Prepared'),
(22, '1', '352583661', '13', 'Mazais Rogu ce?š', '50152', 'Jelgava', '2020-05-05 21:37:15', 'Food Pickup'),
(23, '1', '627209811', '13', '1', '1', '1', '2020-05-05 21:38:25', 'Food being Prepared'),
(24, '1', '530342792', '13', '1', '1', '1', '2020-05-05 21:38:28', 'Food being Prepared'),
(25, '1', '797445247', '13', '1', '1', '1', '2020-05-05 21:38:33', 'Order Confirmed'),
(26, '1', '761758216', '13', '1', '1', '1', '2020-05-05 21:38:36', 'Food being Prepared'),
(27, '1', '988638056', '13', '1', '1', '1', '2020-05-05 21:38:40', 'Food being Prepared'),
(28, '1', '855996061', '13', '1', '1', '1', '2020-05-05 21:38:44', 'Order Confirmed'),
(29, '1', '917283433', '123', '321', '213', '123', '2020-05-05 21:39:53', 'Order Confirmed'),
(30, '1', '932407481', '123123', '123123', '123123', '123123', '2020-05-05 21:40:05', 'Order Confirmed'),
(31, '1', '789908432', '123123', '123123', '123123', '123123', '2020-05-05 21:40:10', 'Order Confirmed'),
(32, '1', '556052086', '123123', '123123', '123123', '123123', '2020-05-05 21:40:15', NULL),
(33, '1', '671265866', '123123', '123123', '123123', '123123', '2020-05-05 21:40:19', NULL),
(34, '1', '763216638', '123123', '123123', '123123', '123123', '2020-05-05 21:40:22', NULL),
(35, '1', '587430570', '123123', '123123', '123123', '123123', '2020-05-05 21:40:24', NULL),
(36, '1', '382996427', 'asd', 'asd', 'asd', 'Riga', '2020-05-05 21:41:02', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tblorders`
--

CREATE TABLE `tblorders` (
  `ID` int(11) NOT NULL,
  `UserId` char(10) DEFAULT NULL,
  `FoodId` char(10) DEFAULT NULL,
  `IsOrderPlaced` int(11) DEFAULT NULL,
  `OrderNumber` char(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblorders`
--

INSERT INTO `tblorders` (`ID`, `UserId`, `FoodId`, `IsOrderPlaced`, `OrderNumber`) VALUES
(17, '1', '1', 1, '166971170'),
(18, '1', '18', 1, '166971170'),
(19, '1', '24', 1, '166971170'),
(20, '1', '17', 1, '904719776'),
(21, '1', '24', 1, '838200365'),
(22, '1', '18', 1, '838200365'),
(23, '1', '17', 1, '838200365'),
(24, '1', '19', 1, '267299974'),
(25, '1', '18', 1, '317501925'),
(26, '1', '21', 1, '208615082'),
(27, '1', '17', 1, '474764587'),
(28, '1', '17', 1, '365523938'),
(29, '1', '19', 1, '749394244'),
(30, '1', '21', 1, '479699679'),
(31, '1', '24', 1, '981637134'),
(32, '1', '24', 1, '139912017'),
(33, '1', '24', 1, '611182775'),
(34, '1', '24', 1, '352583661'),
(35, '1', '18', 1, '627209811'),
(36, '1', '18', 1, '917283433'),
(37, '1', '18', 1, '932407481'),
(38, '1', '21', 1, '382996427'),
(39, '1', '18', 1, '382996427'),
(40, '1', '17', 1, '382996427');

-- --------------------------------------------------------

--
-- Table structure for table `tbluser`
--

CREATE TABLE `tbluser` (
  `ID` int(10) NOT NULL,
  `FirstName` varchar(45) DEFAULT NULL,
  `LastName` varchar(50) DEFAULT NULL,
  `Email` varchar(120) DEFAULT NULL,
  `MobileNumber` bigint(8) DEFAULT NULL,
  `Password` varchar(120) DEFAULT NULL,
  `RegDate` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbluser`
--

INSERT INTO `tbluser` (`ID`, `FirstName`, `LastName`, `Email`, `MobileNumber`, `Password`, `RegDate`) VALUES
(1, 'Daniils', 'Baldins', 'etozhewhsk@gmail.com', 20415009, '3fc0a7acf087f549ac2b266baf94b8b1', '2020-03-01 08:11:07'),
(7, 'Viktors', 'Kozlovkiys', 'q@w', 11111111, 'd8578edf8458ce06fbc5bb76a58c5ca4', '2020-05-05 15:41:48'),
(8, 'Mihails', 'Ivkins', 'test@gmail.com', 23456789, '76d80224611fc919a5d54f0ff9fba446', '2020-05-05 21:42:25'),
(9, 'Vladislavs', 'Traškovs', 'test2@gmail.com', 21234567, '76d80224611fc919a5d54f0ff9fba446', '2020-05-05 21:42:42'),
(10, 'Dmitrijs', 'Pavlovi?s', 'test3@gmail.com', 22345678, '76d80224611fc919a5d54f0ff9fba446', '2020-05-05 21:43:01');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbladmin`
--
ALTER TABLE `tbladmin`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tblcategory`
--
ALTER TABLE `tblcategory`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tblfood`
--
ALTER TABLE `tblfood`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tblfoodtracking`
--
ALTER TABLE `tblfoodtracking`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tblorderaddresses`
--
ALTER TABLE `tblorderaddresses`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `UserId` (`UserId`,`Ordernumber`);

--
-- Indexes for table `tblorders`
--
ALTER TABLE `tblorders`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `UserId` (`UserId`,`FoodId`,`OrderNumber`);

--
-- Indexes for table `tbluser`
--
ALTER TABLE `tbluser`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbladmin`
--
ALTER TABLE `tbladmin`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tblcategory`
--
ALTER TABLE `tblcategory`
  MODIFY `ID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `tblfood`
--
ALTER TABLE `tblfood`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `tblfoodtracking`
--
ALTER TABLE `tblfoodtracking`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `tblorderaddresses`
--
ALTER TABLE `tblorderaddresses`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `tblorders`
--
ALTER TABLE `tblorders`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `tbluser`
--
ALTER TABLE `tbluser`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
