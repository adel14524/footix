-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 26, 2020 at 09:32 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `footix db`
--

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `bookingID` varchar(20) NOT NULL,
  `username` varchar(30) NOT NULL,
  `matchID` varchar(20) NOT NULL,
  `section` varchar(5) NOT NULL,
  `adultNum` int(3) NOT NULL,
  `childNum` int(3) NOT NULL,
  `totalPay` decimal(6,2) NOT NULL,
  `date` date NOT NULL,
  `paymentMethod` varchar(30) NOT NULL,
  `img_qrcode` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`bookingID`, `username`, `matchID`, `section`, `adultNum`, `childNum`, `totalPay`, `date`, `paymentMethod`, `img_qrcode`) VALUES
('FOOTIX5f1c027d2b7f2', 'adel123', 'KDHPRK01072020', 'A', 6, 0, '135.00', '2020-07-25', 'Online banking', 'qr/FOOTIX5f1c027d2b7f2.png'),
('FOOTIX5f1c0b3d924e8', 'adel123', 'PDRPJC123123', 'A', 6, 0, '120.00', '2020-07-25', 'Online banking', 'qr/FOOTIX5f1c0b3d924e8.png'),
('FOOTIX5f1c0bac26e09', 'adel123', 'KDHPRK01072020', 'B', 6, 6, '210.00', '2020-07-25', 'Online banking', 'qr/FOOTIX5f1c0bac26e09.png'),
('FOOTIX5f1c0e4ce0067', 'adel123', 'KDHPRK01072020', 'B', 2, 2, '82.00', '2020-07-25', 'Online banking', 'qr/FOOTIX5f1c0e4ce0067.png'),
('FOOTIX5f1d28945ea62', 'adel123', 'KDHPRK01072020', 'B', 1, 0, '15.00', '2020-07-26', 'Online banking', 'qr/FOOTIX5f1d28945ea62.png');

-- --------------------------------------------------------

--
-- Table structure for table `food`
--

CREATE TABLE `food` (
  `foodID` varchar(20) NOT NULL,
  `foodDesc` varchar(50) NOT NULL,
  `stadiumID` varchar(20) NOT NULL,
  `price` decimal(6,2) NOT NULL,
  `food_img` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `food`
--

INSERT INTO `food` (`foodID`, `foodDesc`, `stadiumID`, `price`, `food_img`) VALUES
('set01', 'Regular Popcorn with Softdrink', 'SDA', '15.00', 'food/set1.jpeg'),
('set02', 'Soft Drinks with Chicken or Beef Burgers', 'SDA', '20.00', 'food/set2.jpeg'),
('set03', 'Soft Drinks with Hotdog', 'SDA', '17.00', 'food/set3.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `food_booked`
--

CREATE TABLE `food_booked` (
  `id` int(11) NOT NULL,
  `bookingID` varchar(20) NOT NULL,
  `foodID` varchar(20) NOT NULL,
  `stadiumID` varchar(20) NOT NULL,
  `quantity` int(99) NOT NULL,
  `totalprice` decimal(6,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `food_booked`
--

INSERT INTO `food_booked` (`id`, `bookingID`, `foodID`, `stadiumID`, `quantity`, `totalprice`) VALUES
(10, 'FOOTIX5f1b138a2a178', 'set01', '', 6, '90.00'),
(11, 'FOOTIX5f1b258867406', 'set01', '', 2, '30.00'),
(12, 'FOOTIX5f1b2648cae00', 'set01', '', 1, '15.00'),
(13, 'FOOTIX5f1b2a2d9b860', 'set01', '', 1, '15.00'),
(14, 'FOOTIX5f1b2a2d9b860', 'set02', '', 1, '20.00'),
(15, 'FOOTIX5f1b2b08a2773', 'set01', '', 1, '15.00'),
(16, 'FOOTIX5f1b2b08a2773', 'set02', '', 1, '20.00'),
(17, 'FOOTIX5f1b2b08a2773', 'set03', '', 1, '17.00'),
(18, 'FOOTIX5f1b2b5f68c41', 'set01', '', 1, '15.00'),
(19, 'FOOTIX5f1b2c4be29d8', 'set02', '', 1, '20.00'),
(20, 'FOOTIX5f1b2c4be29d8', 'set03', '', 1, '17.00'),
(23, 'FOOTIX5f1bd5e1d53e8', 'set01', '', 2, '30.00'),
(24, 'FOOTIX5f1bd5e1d53e8', 'set02', '', 2, '40.00'),
(26, 'FOOTIX5f1be2a20f28f', 'set01', '', 1, '15.00'),
(29, 'FOOTIX5f1c0106192f3', 'set03', 'SDA', 16, '272.00'),
(30, 'FOOTIX5f1c016c057ac', 'set01', 'SDA', 1, '15.00'),
(31, 'FOOTIX5f1c016c057ac', 'set02', 'SDA', 1, '20.00'),
(32, 'FOOTIX5f1c027d2b7f2', 'set01', 'SDA', 1, '15.00'),
(33, 'FOOTIX5f1c0bac26e09', 'set01', 'SDA', 8, '120.00'),
(34, 'FOOTIX5f1c0e4ce0067', 'set01', 'SDA', 1, '15.00'),
(35, 'FOOTIX5f1c0e4ce0067', 'set02', 'SDA', 1, '20.00'),
(36, 'FOOTIX5f1c0e4ce0067', 'set03', 'SDA', 1, '17.00'),
(37, 'FOOTIX5f1d28945ea62', 'set01', 'SDA', 1, '5.00');

-- --------------------------------------------------------

--
-- Table structure for table `game`
--

CREATE TABLE `game` (
  `matchID` varchar(20) NOT NULL,
  `stadiumID` varchar(20) NOT NULL,
  `teamID1` varchar(20) NOT NULL,
  `teamID2` varchar(20) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `game`
--

INSERT INTO `game` (`matchID`, `stadiumID`, `teamID1`, `teamID2`, `date`) VALUES
('JDTSEL123123', 'SSI', 'JDT', 'SEL', '2020-07-31'),
('KDHPRK01072020', 'SDA', 'KDA', 'PRK', '2020-07-01'),
('PDRPAH26072020', 'SKL', 'PDR', 'PAH', '2020-07-26');

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `paymentID` varchar(20) NOT NULL,
  `CCname` varchar(90) DEFAULT NULL,
  `CCnumber` varchar(20) DEFAULT NULL,
  `month` varchar(20) DEFAULT NULL,
  `year` varchar(5) DEFAULT NULL,
  `CVV` varchar(3) DEFAULT NULL,
  `datePay` date NOT NULL,
  `paymentMethod` varchar(30) NOT NULL,
  `bank` varchar(20) DEFAULT NULL,
  `totalPay` decimal(6,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`paymentID`, `CCname`, `CCnumber`, `month`, `year`, `CVV`, `datePay`, `paymentMethod`, `bank`, `totalPay`) VALUES
('B002', 'None', 'None', 'None', 'None', 'Non', '2020-07-24', 'Online banking', 'BSN', '160.00'),
('B002', 'None', 'None', 'None', 'None', 'Non', '2020-07-24', 'Online banking', 'BSN', '160.00'),
('FOOTIX5f1b258867406', 'None', 'None', 'None', 'None', 'Non', '2020-07-24', 'Online banking', 'Bank Islam', '60.00'),
('FOOTIX5f1b2648cae00', 'None', 'None', 'None', 'None', 'Non', '2020-07-24', 'Online banking', 'Bank Islam', '55.00'),
('FOOTIX5f1b2a2d9b860', 'None', 'None', 'None', 'None', 'Non', '2020-07-24', 'Online banking', 'Bank Islam', '95.00'),
('FOOTIX5f1b2b08a2773', 'None', 'None', 'None', 'None', 'Non', '2020-07-24', 'Online banking', 'Bank Islam', '122.00'),
('FOOTIX5f1b2b08a2773', 'None', 'None', 'None', 'None', 'Non', '2020-07-24', 'Online banking', 'Bank Islam', '122.00'),
('FOOTIX5f1b2b5f68c41', 'None', 'None', 'None', 'None', 'Non', '2020-07-24', 'Online banking', 'Bank Islam', '35.00'),
('FOOTIX5f1b2b5f68c41', 'None', 'None', 'None', 'None', 'Non', '2020-07-24', 'Online banking', 'Bank Islam', '35.00'),
('FOOTIX5f1b2b5f68c41', 'None', 'None', 'None', 'None', 'Non', '2020-07-24', 'Online banking', 'Bank Islam', '35.00'),
('FOOTIX5f1b2c4be29d8', 'None', 'None', 'None', 'None', 'Non', '2020-07-24', 'Online banking', 'CIMB Bank', '97.00'),
('FOOTIX5f1b2c4be29d8', 'None', 'None', 'None', 'None', 'Non', '2020-07-24', 'Online banking', 'CIMB Bank', '97.00'),
('FOOTIX5f1b2c4be29d8', 'None', 'None', 'None', 'None', 'Non', '2020-07-24', 'Online banking', 'CIMB Bank', '97.00'),
('FOOTIX5f1b2c4be29d8', 'None', 'None', 'None', 'None', 'Non', '2020-07-24', 'Online banking', 'CIMB Bank', '97.00'),
('FOOTIX5f1b2c4be29d8', 'None', 'None', 'None', 'None', 'Non', '2020-07-25', 'Online banking', 'CIMB Bank', '97.00'),
('FOOTIX5f1bd5e1d53e8', 'None', 'None', 'None', 'None', 'Non', '2020-07-25', 'Online banking', 'Bank Islam', '190.00'),
('FOOTIX5f1bd5e1d53e8', 'None', 'None', 'None', 'None', 'Non', '2020-07-25', 'Online banking', 'Bank Islam', '190.00'),
('FOOTIX5f1be2a20f28f', 'None', 'None', 'None', 'None', 'Non', '2020-07-25', 'Online banking', 'Bank Islam', '25.00'),
('FOOTIX5f1be2a20f28f', 'None', 'None', 'None', 'None', 'Non', '2020-07-25', 'Online banking', 'Bank Islam', '25.00'),
('FOOTIX5f1be2a20f28f', 'None', 'None', 'None', 'None', 'Non', '2020-07-25', 'Online banking', 'Bank Islam', '25.00'),
('FOOTIX5f1be2a20f28f', 'None', 'None', 'None', 'None', 'Non', '2020-07-25', 'Online banking', 'Bank Islam', '25.00'),
('FOOTIX5f1be7d2a03f3', 'None', 'None', 'None', 'None', 'Non', '2020-07-25', 'Online banking', 'Bank Islam', '25.00'),
('FOOTIX5f1beecb86ae2', 'None', 'None', 'None', 'None', 'Non', '2020-07-25', 'Online banking', 'Bank Islam', '25.00'),
('FOOTIX5f1bef794ea4e', 'None', 'None', 'None', 'None', 'Non', '2020-07-25', 'Online banking', 'Bank Islam', '25.00'),
('FOOTIX5f1bef794ea4e', 'None', 'None', 'None', 'None', 'Non', '2020-07-25', 'Online banking', 'Bank Islam', '25.00'),
('FOOTIX5f1bf04cc8284', 'None', 'None', 'None', 'None', 'Non', '2020-07-25', 'Online banking', 'Bank Islam', '25.00'),
('FOOTIX5f1bf0e04da70', 'None', 'None', 'None', 'None', 'Non', '2020-07-25', 'Online banking', 'Bank Islam', '25.00'),
('FOOTIX5f1bf1c0e8ba3', 'None', 'None', 'None', 'None', 'Non', '2020-07-25', 'Online banking', 'Bank Islam', '25.00'),
('FOOTIX5f1bf1c0e8ba3', 'None', 'None', 'None', 'None', 'Non', '2020-07-25', 'Online banking', 'Bank Islam', '25.00'),
('FOOTIX5f1bf1c0e8ba3', 'None', 'None', 'None', 'None', 'Non', '2020-07-25', 'Online banking', 'Bank Islam', '25.00'),
('FOOTIX5f1bf1c0e8ba3', 'None', 'None', 'None', 'None', 'Non', '2020-07-25', 'Online banking', 'Bank Islam', '25.00'),
('FOOTIX5f1bf3a19f3c7', 'None', 'None', 'None', 'None', 'Non', '2020-07-25', 'Online banking', 'Bank Islam', '25.00'),
('FOOTIX5f1bf6c0daf94', 'None', 'None', 'None', 'None', 'Non', '2020-07-25', 'Online banking', 'Bank Islam', '25.00'),
('FOOTIX5f1bf6c0daf94', 'None', 'None', 'None', 'None', 'Non', '2020-07-25', 'Online banking', 'Bank Islam', '25.00'),
('FOOTIX5f1bf6c0daf94', 'None', 'None', 'None', 'None', 'Non', '2020-07-25', 'Online banking', 'Bank Islam', '25.00'),
('FOOTIX5f1bf84dc13c1', 'None', 'None', 'None', 'None', 'Non', '2020-07-25', 'Online banking', 'Bank Islam', '25.00'),
('FOOTIX5f1bf84dc13c1', 'None', 'None', 'None', 'None', 'Non', '2020-07-25', 'Online banking', 'Bank Islam', '25.00'),
('FOOTIX5f1bf898cbaf7', 'None', 'None', 'None', 'None', 'Non', '2020-07-25', 'Online banking', 'Bank Islam', '25.00'),
('FOOTIX5f1bf898cbaf7', 'None', 'None', 'None', 'None', 'Non', '2020-07-25', 'Online banking', 'Bank Islam', '25.00'),
('FOOTIX5f1bf99949669', 'None', 'None', 'None', 'None', 'Non', '2020-07-25', 'Online banking', 'Bank Islam', '25.00'),
('FOOTIX5f1bf99949669', 'None', 'None', 'None', 'None', 'Non', '2020-07-25', 'Online banking', 'Bank Islam', '25.00'),
('FOOTIX5f1bf99949669', 'None', 'None', 'None', 'None', 'Non', '2020-07-25', 'Online banking', 'Bank Islam', '25.00'),
('FOOTIX5f1bf99949669', 'None', 'None', 'None', 'None', 'Non', '2020-07-25', 'Online banking', 'Bank Islam', '25.00'),
('FOOTIX5f1bf99949669', 'None', 'None', 'None', 'None', 'Non', '2020-07-25', 'Online banking', 'Bank Islam', '25.00'),
('FOOTIX5f1bf99949669', 'None', 'None', 'None', 'None', 'Non', '2020-07-25', 'Online banking', 'Bank Islam', '25.00'),
('FOOTIX5f1bf99949669', 'None', 'None', 'None', 'None', 'Non', '2020-07-25', 'Online banking', 'Bank Islam', '25.00'),
('FOOTIX5f1bf99949669', 'None', 'None', 'None', 'None', 'Non', '2020-07-25', 'Online banking', 'Bank Islam', '25.00'),
('FOOTIX5f1c016c057ac', 'None', 'None', 'None', 'None', 'Non', '2020-07-25', 'Online banking', 'Bank Islam', '65.00'),
('FOOTIX5f1c027d2b7f2', 'None', 'None', 'None', 'None', 'Non', '2020-07-25', 'Online banking', 'AmBank', '135.00'),
('FOOTIX5f1c027d2b7f2', 'None', 'None', 'None', 'None', 'Non', '2020-07-25', 'Online banking', 'AmBank', '135.00'),
('FOOTIX5f1c0b3d924e8', 'None', 'None', 'None', 'None', 'Non', '2020-07-25', 'Online banking', 'Maybank', '120.00'),
('FOOTIX5f1c0b3d924e8', 'None', 'None', 'None', 'None', 'Non', '2020-07-25', 'Online banking', 'Maybank', '120.00'),
('FOOTIX5f1c0bac26e09', 'None', 'None', 'None', 'None', 'Non', '2020-07-25', 'Online banking', 'Bank Islam', '210.00'),
('FOOTIX5f1c0e4ce0067', 'None', 'None', 'None', 'None', 'Non', '2020-07-25', 'Online banking', 'Bank Islam', '82.00'),
('FOOTIX5f1d28945ea62', 'None', 'None', 'None', 'None', 'Non', '2020-07-26', 'Online banking', 'Bank Islam', '15.00');

-- --------------------------------------------------------

--
-- Table structure for table `stadium`
--

CREATE TABLE `stadium` (
  `bil` int(11) NOT NULL,
  `stadiumID` varchar(20) NOT NULL,
  `stadiumName` varchar(99) NOT NULL,
  `stadiumLayout` varchar(50) NOT NULL,
  `section` varchar(20) NOT NULL,
  `price` decimal(6,2) NOT NULL,
  `seat` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `stadium`
--

INSERT INTO `stadium` (`bil`, `stadiumID`, `stadiumName`, `stadiumLayout`, `section`, `price`, `seat`) VALUES
(1, 'SDA', 'Stadium Darul Aman', 'image/stadium 1.png', 'A', '20.00', 0),
(2, 'SDA', 'Stadium Darul Aman', 'image/stadium 1.png', 'B', '10.00', 283),
(3, 'SDA', 'Stadium Darul Aman', 'image/stadium 1.png', 'C', '5.00', 300),
(4, 'SBI', 'Stadium Bandaraya Ipoh', 'image/stadium 2.png', 'A', '30.00', 400),
(5, 'SBI', 'Stadium Bandaraya Ipoh', 'image/stadium 2.png', 'B', '20.00', 300),
(6, 'SBI', 'Stadium Bandaraya Ipoh', 'image/stadium 2.png', 'C', '10.00', 300),
(10, 'SSI', 'Stadium Sultan Ibrahim', 'image/stadium 3.jpg', 'A', '20.00', 600),
(13, 'SKL', 'Stadium Kuala Lumpur', 'image/stadium 4.png', 'A', '20.00', 588),
(19, 'SSI', 'Stadium Sultan Ibrahim', 'image/stadium 3.jpg', 'B', '20.00', 600),
(20, 'SSI', 'Stadium Sultan Ibrahim', 'image/stadium 3.jpg', 'C', '20.00', 600),
(21, 'SKL', 'Stadium Kuala Lumpur', 'image/stadium 4.png', 'B', '20.00', 400),
(22, 'SKL', 'Stadium Kuala Lumpur', 'image/stadium 4.png', 'C', '20.00', 400);

-- --------------------------------------------------------

--
-- Table structure for table `team`
--

CREATE TABLE `team` (
  `teamID` varchar(3) NOT NULL,
  `teamName` varchar(30) NOT NULL,
  `teamLogo` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `team`
--

INSERT INTO `team` (`teamID`, `teamName`, `teamLogo`) VALUES
('JDT', 'Johor Darul Ta\'zim', 'logo/jdt.png'),
('KDA', 'Kedah', 'logo/kedah.png'),
('PDR', 'PDRM', 'logo/pdrm.png'),
('PHG', 'Pahang', 'logo/pahang.png'),
('PRK', 'Perak', 'logo/perak.png'),
('SEL', 'Selangor', 'logo/selangor.png');

-- --------------------------------------------------------

--
-- Table structure for table `temp`
--

CREATE TABLE `temp` (
  `id` int(11) NOT NULL,
  `bookingID` varchar(20) NOT NULL,
  `matchID` varchar(20) NOT NULL,
  `stadiumName` varchar(99) NOT NULL,
  `section` varchar(5) NOT NULL,
  `adultNum` int(3) NOT NULL,
  `childNum` int(3) NOT NULL,
  `foodID` varchar(20) DEFAULT NULL,
  `quantity` int(99) DEFAULT NULL,
  `totalPrice` decimal(6,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `username` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `address` varchar(100) NOT NULL,
  `phone` varchar(11) NOT NULL,
  `role` varchar(20) NOT NULL,
  `stadiumID` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`username`, `password`, `email`, `address`, `phone`, `role`, `stadiumID`) VALUES
('admin01', '12345', 'admin@footix.com', 'Footix Sdn Bhd', '0123456789', 'admin', ''),
('cust01', '123456', 'cust@gmail.com', 'Belakang Taman Kaya', '0166193667', 'customer', ''),
('SDA_STDORG', '123456', 'SDA@fototix.com', 'STADIUM DARUL AMAN', '0123456', 'StdOrg', 'SDA'),
('SKL_STDORG', '123456', 'SKL@footix.com', 'STADIUM KUALA LUMPUR', '03453242323', 'StdOrg', 'SKL');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`bookingID`);

--
-- Indexes for table `food`
--
ALTER TABLE `food`
  ADD PRIMARY KEY (`foodID`);

--
-- Indexes for table `food_booked`
--
ALTER TABLE `food_booked`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `game`
--
ALTER TABLE `game`
  ADD PRIMARY KEY (`matchID`);

--
-- Indexes for table `stadium`
--
ALTER TABLE `stadium`
  ADD PRIMARY KEY (`bil`);

--
-- Indexes for table `team`
--
ALTER TABLE `team`
  ADD PRIMARY KEY (`teamID`);

--
-- Indexes for table `temp`
--
ALTER TABLE `temp`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `food_booked`
--
ALTER TABLE `food_booked`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `stadium`
--
ALTER TABLE `stadium`
  MODIFY `bil` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `temp`
--
ALTER TABLE `temp`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
