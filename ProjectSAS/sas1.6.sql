-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 30, 2021 at 09:46 AM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 8.0.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sas`
--

-- --------------------------------------------------------

--
-- Table structure for table `billdetails`
--

CREATE TABLE `billdetails` (
  `billdetailsID` int(11) NOT NULL,
  `billID` int(11) NOT NULL,
  `productID` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` float NOT NULL,
  `tax` float DEFAULT NULL,
  `subtotal` float DEFAULT 0,
  `discount` float DEFAULT NULL,
  `amount` float DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `bills`
--

CREATE TABLE `bills` (
  `billID` int(11) NOT NULL,
  `purchaseorderID` int(11) NOT NULL,
  `vendorID` int(11) NOT NULL,
  `billDate` datetime NOT NULL,
  `userID` int(11) NOT NULL,
  `createdDate` datetime NOT NULL DEFAULT current_timestamp(),
  `updatedDate` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `customerID` int(11) NOT NULL,
  `customerName` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `taxNumber` int(13) NOT NULL,
  `address` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `unpaid` float DEFAULT NULL,
  `status` int(1) NOT NULL DEFAULT 1,
  `description` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`customerID`, `customerName`, `taxNumber`, `address`, `phone`, `email`, `unpaid`, `status`, `description`) VALUES
(1, 'CÔNG TY CỔ PHẦN TI KI', 309532909, '29/1 Đường số 4, Khu phố 3 - Phường An Khánh - Thành phố Thủ Đức - TP Hồ Chí Minh.', '1900-6035', 'tiki@tiki.com', NULL, 1, NULL),
(2, 'Nguyen Kim', 302286281, '63-65-67 Trần Hưng Đạo, Phường Cầu Ông Lãnh, Quận 1, Thành phố Hồ Chí Minh', '0838211211', 'nguyenkim@gmail.com', NULL, 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `exportdetails`
--

CREATE TABLE `exportdetails` (
  `exportdetailsID` int(11) NOT NULL,
  `exportID` int(11) NOT NULL,
  `productID` int(11) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `exports`
--

CREATE TABLE `exports` (
  `exportID` int(11) NOT NULL,
  `invoiceID` int(11) NOT NULL,
  `exportDate` datetime NOT NULL,
  `customerID` int(11) NOT NULL,
  `total` float NOT NULL,
  `description` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `userID` int(11) NOT NULL,
  `createdDate` datetime NOT NULL DEFAULT current_timestamp(),
  `updatedDate` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `importdetails`
--

CREATE TABLE `importdetails` (
  `importdetailsID` int(11) NOT NULL,
  `importID` int(11) NOT NULL,
  `productID` int(11) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `imports`
--

CREATE TABLE `imports` (
  `importID` int(11) NOT NULL,
  `billID` int(11) NOT NULL,
  `vendorID` int(11) NOT NULL,
  `importDate` datetime NOT NULL,
  `total` float NOT NULL,
  `description` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `userID` int(11) NOT NULL,
  `createdDate` datetime NOT NULL DEFAULT current_timestamp(),
  `updatedDate` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `invoicedetails`
--

CREATE TABLE `invoicedetails` (
  `invoicedetailsID` int(11) NOT NULL,
  `invoiceID` int(11) NOT NULL,
  `productID` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` float NOT NULL,
  `tax` float NOT NULL,
  `subtotal` float DEFAULT 0,
  `discount` float DEFAULT NULL,
  `amount` float DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `invoices`
--

CREATE TABLE `invoices` (
  `invoiceID` int(11) NOT NULL,
  `orderID` int(11) NOT NULL,
  `invoiceDate` datetime NOT NULL,
  `customerID` int(11) NOT NULL,
  `dueDate` datetime NOT NULL,
  `total` float NOT NULL,
  `description` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `userID` int(11) NOT NULL,
  `createdDate` datetime NOT NULL DEFAULT current_timestamp(),
  `updatedDate` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `payabledetails`
--

CREATE TABLE `payabledetails` (
  `payabledetailsID` int(11) NOT NULL,
  `payableID` int(11) NOT NULL,
  `billID` int(11) NOT NULL,
  `description` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `amount` float DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `payables`
--

CREATE TABLE `payables` (
  `payableID` int(11) NOT NULL,
  `vendorID` int(11) NOT NULL,
  `payableDate` datetime NOT NULL,
  `total` float NOT NULL,
  `paymentMethod` int(11) NOT NULL,
  `description` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `userID` int(11) NOT NULL,
  `createdDate` datetime NOT NULL DEFAULT current_timestamp(),
  `updatedDate` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `productID` int(11) NOT NULL,
  `productName` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `manufacture` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `sales price` float DEFAULT NULL,
  `purchase price` float DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `category` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `status` int(1) NOT NULL DEFAULT 1,
  `picture` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`productID`, `productName`, `manufacture`, `sales price`, `purchase price`, `quantity`, `category`, `status`, `picture`, `description`) VALUES
(1, 'Switch', 'Nitendo Company', NULL, NULL, 780, 'Console', 1, NULL, NULL),
(2, 'PS5', 'Sony Company', NULL, NULL, 120, 'Console', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `purchaseorderdetails`
--

CREATE TABLE `purchaseorderdetails` (
  `purchaseorderdetailsID` int(11) NOT NULL,
  `purchaseorderID` int(11) NOT NULL,
  `productID` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` float NOT NULL,
  `tax` float DEFAULT NULL,
  `subtotal` float DEFAULT 0,
  `discount` float DEFAULT NULL,
  `amount` float DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `purchaseorders`
--

CREATE TABLE `purchaseorders` (
  `purchaseorderID` int(11) NOT NULL,
  `vendorID` int(11) NOT NULL,
  `purchaseorderDate` datetime NOT NULL,
  `total` float NOT NULL,
  `description` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `userID` int(11) NOT NULL,
  `createdDate` datetime NOT NULL DEFAULT current_timestamp(),
  `updatedDate` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `receivabledetails`
--

CREATE TABLE `receivabledetails` (
  `receivabledetailsID` int(11) NOT NULL,
  `receivableID` int(11) NOT NULL,
  `InvoiceID` int(11) NOT NULL,
  `description` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `amount` float DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `receivables`
--

CREATE TABLE `receivables` (
  `receivableID` int(11) NOT NULL,
  `receivableDate` datetime NOT NULL,
  `customerID` int(11) NOT NULL,
  `total` float NOT NULL,
  `paymentMethod` int(11) NOT NULL,
  `description` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `userID` int(11) NOT NULL,
  `createdDate` datetime NOT NULL DEFAULT current_timestamp(),
  `updatedDate` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `saleorderdetails`
--

CREATE TABLE `saleorderdetails` (
  `saleorderdetailsID` int(11) NOT NULL,
  `orderID` int(11) NOT NULL,
  `productID` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` float NOT NULL,
  `tax` float DEFAULT NULL,
  `subtotal` float DEFAULT 0,
  `discount` float DEFAULT NULL,
  `amount` float DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `saleorderdetails`
--

INSERT INTO `saleorderdetails` (`saleorderdetailsID`, `orderID`, `productID`, `quantity`, `price`, `tax`, `subtotal`, `discount`, `amount`) VALUES
(1, 1, 1, 20, 1000, NULL, 20000, NULL, 20000);

-- --------------------------------------------------------

--
-- Table structure for table `saleorders`
--

CREATE TABLE `saleorders` (
  `orderID` int(11) NOT NULL,
  `customerID` int(11) NOT NULL,
  `saleorderDate` datetime NOT NULL,
  `total` float NOT NULL,
  `userID` int(11) NOT NULL,
  `createdDate` datetime NOT NULL DEFAULT current_timestamp(),
  `updatedDate` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `saleorders`
--

INSERT INTO `saleorders` (`orderID`, `customerID`, `saleorderDate`, `total`, `userID`, `createdDate`, `updatedDate`) VALUES
(1, 1, '2021-06-23 11:42:14', 200000, 1, '2021-06-23 16:42:46', '2021-06-23 11:42:14'),
(3, 1, '2021-06-24 00:00:00', 30000, 2, '2021-06-24 15:52:36', NULL),
(4, 1, '2021-06-26 13:39:59', 12000, 9, '2021-06-26 18:40:19', '2021-06-26 18:40:19');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `userID` int(11) NOT NULL,
  `userName` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `role` varchar(3) COLLATE utf8_unicode_ci NOT NULL,
  `fullname` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `active` int(1) NOT NULL DEFAULT 1,
  `description` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userID`, `userName`, `password`, `role`, `fullname`, `email`, `phone`, `active`, `description`) VALUES
(1, 'user01', '111', 'SA1', 'Admin Sales', 'phuc@gmail.com', '123456789', 1, NULL),
(2, 'user02', '222', 'SA2', 'User Sale', 'sale@user.com', '1122334455', 1, NULL),
(3, 'user03', '333', 'LO1', 'Logistics Admin', 'logistics@admin.com', '0147258369', 1, NULL),
(4, 'user04', '444', 'LO2', 'Logistics User', 'logistics@user.com', '0246813579', 1, NULL),
(5, 'user05', '555', 'HR1', 'HR Admin', 'hr@admin.com', '0135792468', 1, NULL),
(6, 'user06', '666', 'HR2', 'HR User', 'hr@user.com', '0909667788', 1, NULL),
(7, 'user07', '777', 'AC1', 'Acc Admin', 'acc@admin.com', '0903 456 789', 1, NULL),
(8, 'user08', '888', 'AC2', 'Acc User', 'acc@user.com', '079 289 1997', 1, NULL),
(9, '1', '111', 'SA1', '11', '1@a.com', '1122233344', 1, NULL),
(10, '2', '222', 'LO2', '2222', '2@a.com', '22331144', 2, NULL),
(11, 'user66', '666', 'AC2', 'Anakin', '66@sith.com', '0134679258', 3, NULL),
(12, '3', '333', 'HR1', '33', '3@gmail.com', '33321233', 2, NULL),
(13, '4', '444', 'AC2', '44', '4@gmail.com', '443322445566', 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `vendors`
--

CREATE TABLE `vendors` (
  `vendorID` int(11) NOT NULL,
  `vendorName` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `taxNumber` varchar(13) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `unpaid` float DEFAULT NULL,
  `status` int(1) NOT NULL DEFAULT 1,
  `description` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `vendors`
--

INSERT INTO `vendors` (`vendorID`, `vendorName`, `taxNumber`, `address`, `phone`, `email`, `unpaid`, `status`, `description`) VALUES
(1, 'Công ty Nintendo Viet Nam', '1234567890', '66 Đ. Thành Thái, Phường 12, Quận 10, Thành phố Hồ Chí Minh', '093 373 72 54', 'NintendoVN@gmail.com', NULL, 1, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `billdetails`
--
ALTER TABLE `billdetails`
  ADD PRIMARY KEY (`billdetailsID`),
  ADD KEY `billID` (`billID`),
  ADD KEY `productID` (`productID`);

--
-- Indexes for table `bills`
--
ALTER TABLE `bills`
  ADD PRIMARY KEY (`billID`),
  ADD KEY `vendorID` (`vendorID`),
  ADD KEY `userID` (`userID`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`customerID`);

--
-- Indexes for table `exportdetails`
--
ALTER TABLE `exportdetails`
  ADD PRIMARY KEY (`exportdetailsID`),
  ADD KEY `exportID` (`exportID`),
  ADD KEY `productID` (`productID`);

--
-- Indexes for table `exports`
--
ALTER TABLE `exports`
  ADD PRIMARY KEY (`exportID`),
  ADD KEY `invoiceID` (`invoiceID`),
  ADD KEY `customerID` (`customerID`),
  ADD KEY `userID` (`userID`);

--
-- Indexes for table `importdetails`
--
ALTER TABLE `importdetails`
  ADD PRIMARY KEY (`importdetailsID`),
  ADD KEY `importID` (`importID`),
  ADD KEY `productID` (`productID`);

--
-- Indexes for table `imports`
--
ALTER TABLE `imports`
  ADD PRIMARY KEY (`importID`),
  ADD KEY `billID` (`billID`),
  ADD KEY `vendorID` (`vendorID`),
  ADD KEY `userID` (`userID`);

--
-- Indexes for table `invoicedetails`
--
ALTER TABLE `invoicedetails`
  ADD PRIMARY KEY (`invoicedetailsID`),
  ADD KEY `invoiceID` (`invoiceID`),
  ADD KEY `productID` (`productID`);

--
-- Indexes for table `invoices`
--
ALTER TABLE `invoices`
  ADD PRIMARY KEY (`invoiceID`),
  ADD KEY `orderID` (`orderID`),
  ADD KEY `customerID` (`customerID`),
  ADD KEY `userID` (`userID`);

--
-- Indexes for table `payabledetails`
--
ALTER TABLE `payabledetails`
  ADD PRIMARY KEY (`payabledetailsID`),
  ADD KEY `payableID` (`payableID`),
  ADD KEY `payabledetails_ibfk_2` (`billID`);

--
-- Indexes for table `payables`
--
ALTER TABLE `payables`
  ADD PRIMARY KEY (`payableID`),
  ADD KEY `vendorID` (`vendorID`),
  ADD KEY `userID` (`userID`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`productID`);

--
-- Indexes for table `purchaseorderdetails`
--
ALTER TABLE `purchaseorderdetails`
  ADD PRIMARY KEY (`purchaseorderdetailsID`),
  ADD KEY `purchaseorderID` (`purchaseorderID`),
  ADD KEY `productID` (`productID`);

--
-- Indexes for table `purchaseorders`
--
ALTER TABLE `purchaseorders`
  ADD PRIMARY KEY (`purchaseorderID`),
  ADD KEY `vendorID` (`vendorID`),
  ADD KEY `userID` (`userID`);

--
-- Indexes for table `receivabledetails`
--
ALTER TABLE `receivabledetails`
  ADD PRIMARY KEY (`receivabledetailsID`),
  ADD KEY `receivableID` (`receivableID`),
  ADD KEY `receivabledetails_ibfk_2` (`InvoiceID`);

--
-- Indexes for table `receivables`
--
ALTER TABLE `receivables`
  ADD PRIMARY KEY (`receivableID`),
  ADD KEY `customerID` (`customerID`),
  ADD KEY `userID` (`userID`);

--
-- Indexes for table `saleorderdetails`
--
ALTER TABLE `saleorderdetails`
  ADD PRIMARY KEY (`saleorderdetailsID`),
  ADD KEY `orderID` (`orderID`),
  ADD KEY `productID` (`productID`);

--
-- Indexes for table `saleorders`
--
ALTER TABLE `saleorders`
  ADD PRIMARY KEY (`orderID`),
  ADD KEY `customerID` (`customerID`),
  ADD KEY `userID` (`userID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userID`);

--
-- Indexes for table `vendors`
--
ALTER TABLE `vendors`
  ADD PRIMARY KEY (`vendorID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `billdetails`
--
ALTER TABLE `billdetails`
  MODIFY `billdetailsID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `bills`
--
ALTER TABLE `bills`
  MODIFY `billID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `customerID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `exportdetails`
--
ALTER TABLE `exportdetails`
  MODIFY `exportdetailsID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `exports`
--
ALTER TABLE `exports`
  MODIFY `exportID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `importdetails`
--
ALTER TABLE `importdetails`
  MODIFY `importdetailsID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `imports`
--
ALTER TABLE `imports`
  MODIFY `importID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `invoicedetails`
--
ALTER TABLE `invoicedetails`
  MODIFY `invoicedetailsID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `invoices`
--
ALTER TABLE `invoices`
  MODIFY `invoiceID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `payabledetails`
--
ALTER TABLE `payabledetails`
  MODIFY `payabledetailsID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `payables`
--
ALTER TABLE `payables`
  MODIFY `payableID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `productID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `purchaseorderdetails`
--
ALTER TABLE `purchaseorderdetails`
  MODIFY `purchaseorderdetailsID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `purchaseorders`
--
ALTER TABLE `purchaseorders`
  MODIFY `purchaseorderID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `receivabledetails`
--
ALTER TABLE `receivabledetails`
  MODIFY `receivabledetailsID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `receivables`
--
ALTER TABLE `receivables`
  MODIFY `receivableID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `saleorderdetails`
--
ALTER TABLE `saleorderdetails`
  MODIFY `saleorderdetailsID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `saleorders`
--
ALTER TABLE `saleorders`
  MODIFY `orderID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `userID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `vendors`
--
ALTER TABLE `vendors`
  MODIFY `vendorID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `billdetails`
--
ALTER TABLE `billdetails`
  ADD CONSTRAINT `billdetails_ibfk_1` FOREIGN KEY (`billID`) REFERENCES `bills` (`billID`),
  ADD CONSTRAINT `billdetails_ibfk_2` FOREIGN KEY (`productID`) REFERENCES `products` (`productID`);

--
-- Constraints for table `bills`
--
ALTER TABLE `bills`
  ADD CONSTRAINT `bill_ibfk_1` FOREIGN KEY (`purchaseorderID`) REFERENCES `purchaseorders` (`purchaseorderID`),
  ADD CONSTRAINT `bill_ibfk_2` FOREIGN KEY (`vendorID`) REFERENCES `vendors` (`vendorID`),
  ADD CONSTRAINT `bill_ibfk_3` FOREIGN KEY (`userID`) REFERENCES `users` (`userID`);

--
-- Constraints for table `exportdetails`
--
ALTER TABLE `exportdetails`
  ADD CONSTRAINT `exportdetails_ibfk_1` FOREIGN KEY (`exportID`) REFERENCES `exports` (`exportID`),
  ADD CONSTRAINT `exportdetails_ibfk_2` FOREIGN KEY (`productID`) REFERENCES `products` (`productID`);

--
-- Constraints for table `exports`
--
ALTER TABLE `exports`
  ADD CONSTRAINT `export_ibfk_1` FOREIGN KEY (`invoiceID`) REFERENCES `invoices` (`invoiceID`),
  ADD CONSTRAINT `export_ibfk_2` FOREIGN KEY (`customerID`) REFERENCES `customers` (`customerID`),
  ADD CONSTRAINT `export_ibfk_3` FOREIGN KEY (`userID`) REFERENCES `users` (`userID`);

--
-- Constraints for table `importdetails`
--
ALTER TABLE `importdetails`
  ADD CONSTRAINT `importdetails_ibfk_1` FOREIGN KEY (`importID`) REFERENCES `imports` (`importID`),
  ADD CONSTRAINT `importdetails_ibfk_2` FOREIGN KEY (`productID`) REFERENCES `products` (`productID`);

--
-- Constraints for table `imports`
--
ALTER TABLE `imports`
  ADD CONSTRAINT `import_ibfk_1` FOREIGN KEY (`billID`) REFERENCES `bills` (`billID`),
  ADD CONSTRAINT `import_ibfk_2` FOREIGN KEY (`vendorID`) REFERENCES `vendors` (`vendorID`),
  ADD CONSTRAINT `import_ibfk_3` FOREIGN KEY (`userID`) REFERENCES `users` (`userID`);

--
-- Constraints for table `invoicedetails`
--
ALTER TABLE `invoicedetails`
  ADD CONSTRAINT `invoicedetails_ibfk_1` FOREIGN KEY (`invoiceID`) REFERENCES `invoices` (`invoiceID`),
  ADD CONSTRAINT `invoicedetails_ibfk_2` FOREIGN KEY (`productID`) REFERENCES `products` (`productID`);

--
-- Constraints for table `invoices`
--
ALTER TABLE `invoices`
  ADD CONSTRAINT `invoice_ibfk_1` FOREIGN KEY (`orderID`) REFERENCES `saleorders` (`orderID`),
  ADD CONSTRAINT `invoice_ibfk_2` FOREIGN KEY (`customerID`) REFERENCES `customers` (`customerID`),
  ADD CONSTRAINT `invoice_ibfk_3` FOREIGN KEY (`userID`) REFERENCES `users` (`userID`);

--
-- Constraints for table `payabledetails`
--
ALTER TABLE `payabledetails`
  ADD CONSTRAINT `payabledetails_ibfk_1` FOREIGN KEY (`payableID`) REFERENCES `payables` (`payableID`),
  ADD CONSTRAINT `payabledetails_ibfk_2` FOREIGN KEY (`billID`) REFERENCES `bills` (`billID`);

--
-- Constraints for table `payables`
--
ALTER TABLE `payables`
  ADD CONSTRAINT `payable_ibfk_1` FOREIGN KEY (`vendorID`) REFERENCES `vendors` (`vendorID`),
  ADD CONSTRAINT `payable_ibfk_2` FOREIGN KEY (`userID`) REFERENCES `users` (`userID`);

--
-- Constraints for table `purchaseorderdetails`
--
ALTER TABLE `purchaseorderdetails`
  ADD CONSTRAINT `purchaseorderdetails_ibfk_1` FOREIGN KEY (`purchaseorderID`) REFERENCES `purchaseorders` (`purchaseorderID`),
  ADD CONSTRAINT `purchaseorderdetails_ibfk_2` FOREIGN KEY (`productID`) REFERENCES `products` (`productID`);

--
-- Constraints for table `purchaseorders`
--
ALTER TABLE `purchaseorders`
  ADD CONSTRAINT `purchaseorder_ibfk_1` FOREIGN KEY (`vendorID`) REFERENCES `vendors` (`vendorID`),
  ADD CONSTRAINT `purchaseorder_ibfk_2` FOREIGN KEY (`userID`) REFERENCES `users` (`userID`);

--
-- Constraints for table `receivabledetails`
--
ALTER TABLE `receivabledetails`
  ADD CONSTRAINT `receivabledetails_ibfk_1` FOREIGN KEY (`receivableID`) REFERENCES `receivables` (`receivableID`),
  ADD CONSTRAINT `receivabledetails_ibfk_2` FOREIGN KEY (`InvoiceID`) REFERENCES `invoices` (`invoiceID`);

--
-- Constraints for table `receivables`
--
ALTER TABLE `receivables`
  ADD CONSTRAINT `receivable_ibfk_1` FOREIGN KEY (`customerID`) REFERENCES `customers` (`customerID`),
  ADD CONSTRAINT `receivable_ibfk_2` FOREIGN KEY (`userID`) REFERENCES `users` (`userID`);

--
-- Constraints for table `saleorderdetails`
--
ALTER TABLE `saleorderdetails`
  ADD CONSTRAINT `saleorderdetails_ibfk_1` FOREIGN KEY (`orderID`) REFERENCES `saleorders` (`orderID`),
  ADD CONSTRAINT `saleorderdetails_ibfk_2` FOREIGN KEY (`productID`) REFERENCES `products` (`productID`);

--
-- Constraints for table `saleorders`
--
ALTER TABLE `saleorders`
  ADD CONSTRAINT `saleorder_ibfk_1` FOREIGN KEY (`customerID`) REFERENCES `customers` (`customerID`),
  ADD CONSTRAINT `saleorder_ibfk_2` FOREIGN KEY (`userID`) REFERENCES `users` (`userID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
