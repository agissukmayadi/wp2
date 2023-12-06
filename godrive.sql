-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Dec 05, 2023 at 01:01 AM
-- Server version: 5.6.40
-- PHP Version: 5.6.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `godrive`
--

-- --------------------------------------------------------

--
-- Table structure for table `banks`
--

CREATE TABLE `banks` (
  `id` int(11) NOT NULL,
  `bank` varchar(128) NOT NULL,
  `number` varchar(16) NOT NULL,
  `name` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `banks`
--

INSERT INTO `banks` (`id`, `bank`, `number`, `name`) VALUES
(1, 'BCA', '0586738499', 'Abdul Majid'),
(2, 'BRI', '884612538718', 'Asep Subardjo'),
(3, 'Mandiri', '8885736582648', 'Mia Hanifa');

-- --------------------------------------------------------

--
-- Table structure for table `cars`
--

CREATE TABLE `cars` (
  `id` char(4) NOT NULL,
  `number_plate` varchar(11) NOT NULL,
  `merk` varchar(128) NOT NULL,
  `transmition` enum('AUTOMATIC','MANUAL','','') NOT NULL,
  `seat` int(11) NOT NULL,
  `year` year(4) NOT NULL,
  `price` int(11) NOT NULL,
  `image` varchar(128) NOT NULL,
  `type_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cars`
--

INSERT INTO `cars` (`id`, `number_plate`, `merk`, `transmition`, `seat`, `year`, `price`, `image`, `type_id`) VALUES
('C001', 'F0012NA', 'Honda HRV', 'AUTOMATIC', 5, 2021, 500000, 'hrv.png', 2),
('C002', 'F0012NB', 'Hyundai Creta', 'AUTOMATIC', 7, 2023, 800000, 'creta.png', 1),
('C003', 'B2865GG', 'Honda Jazz', 'MANUAL', 5, 2016, 400000, 'cars_1701597730.png', 4),
('C004', 'B6476PO', 'Toyota Vios', 'MANUAL', 5, 2018, 400000, 'cars_1701597794.png', 3),
('C005', 'F6377TY', 'Mitsubishi Xpander', 'AUTOMATIC', 8, 2021, 600000, 'cars_1701597875.png', 1),
('C006', 'F6625HG', 'Toyota Veloz', 'AUTOMATIC', 8, 2022, 600000, 'cars_1701597913.png', 1),
('C007', 'F7736H', 'Daihatsu Rocky', 'MANUAL', 5, 2020, 400000, 'cars_1701597952.png', 2);

-- --------------------------------------------------------

--
-- Table structure for table `licenses`
--

CREATE TABLE `licenses` (
  `id` int(11) NOT NULL,
  `number` char(14) NOT NULL,
  `attachment` varchar(128) NOT NULL,
  `rent_id` char(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `licenses`
--

INSERT INTO `licenses` (`id`, `number`, `attachment`, `rent_id`) VALUES
(3, '12345678909876', 'license_1701663690.png', 'R001'),
(4, '77463252757547', 'license_1701665287.png', 'R002'),
(5, '12345678909876', 'license_1701665338.png', 'R003'),
(6, '77463252757547', 'license_1701665410.png', 'R004');

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id` int(11) NOT NULL,
  `number` varchar(16) NOT NULL,
  `name` varchar(128) NOT NULL,
  `amount` int(11) NOT NULL,
  `attachment` varchar(128) NOT NULL,
  `bank_id` int(11) NOT NULL,
  `rent_id` char(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`id`, `number`, `name`, `amount`, `attachment`, `bank_id`, `rent_id`) VALUES
(3, '123456789', 'alliza', 2000000, 'payment_1701663690.png', 1, 'R001'),
(4, '9098888374', 'Rival', 800000, 'payment_1701665287.png', 3, 'R002'),
(5, '9098888374', 'Ravel', 800000, 'payment_1701665338.png', 3, 'R003'),
(6, '9098888374', 'Hana', 2400000, 'payment_1701665410.png', 2, 'R004');

-- --------------------------------------------------------

--
-- Table structure for table `rents`
--

CREATE TABLE `rents` (
  `id` char(4) NOT NULL,
  `rent_date` date NOT NULL,
  `return_date` date NOT NULL,
  `actual_return_date` date DEFAULT NULL,
  `rent_cost` int(11) NOT NULL,
  `late_cost` int(11) NOT NULL,
  `total_cost` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `car_id` char(4) NOT NULL,
  `status` enum('PENDING','PAID','PICKED UP','SUCCESS','INVALID LICENSE','INVALID PAYMENT') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rents`
--

INSERT INTO `rents` (`id`, `rent_date`, `return_date`, `actual_return_date`, `rent_cost`, `late_cost`, `total_cost`, `user_id`, `car_id`, `status`) VALUES
('R001', '2023-12-06', '2023-12-10', '2023-12-11', 2000000, 750000, 2750000, 8, 'C001', 'SUCCESS'),
('R002', '2023-12-07', '2023-12-09', NULL, 800000, 0, 800000, 2, 'C004', 'PENDING'),
('R003', '2023-12-06', '2023-12-07', NULL, 800000, 0, 800000, 2, 'C002', 'PAID'),
('R004', '2023-12-08', '2023-12-14', NULL, 2400000, 0, 2400000, 2, 'C007', 'PICKED UP');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(11) NOT NULL,
  `role` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `role`) VALUES
(1, 'Admin'),
(2, 'Employee'),
(3, 'Customer'),
(4, 'guest');

-- --------------------------------------------------------

--
-- Table structure for table `types`
--

CREATE TABLE `types` (
  `id` int(11) NOT NULL,
  `type` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `types`
--

INSERT INTO `types` (`id`, `type`) VALUES
(1, 'MPV'),
(2, 'SUV'),
(3, 'Sedan'),
(4, 'Hatchback'),
(5, 'pick up');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(128) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `email` varchar(128) NOT NULL,
  `password` varchar(256) NOT NULL,
  `address` varchar(256) NOT NULL,
  `role_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `phone`, `email`, `password`, `address`, `role_id`) VALUES
(2, 'Agis Sukmayadi', '085156134923', 'agissukmayadi@gmail.com', '$2y$10$MvVdf/.YWti0AtNRjfa3w.akeg0vqWZl/zQikBQiMuAhXyE2/kY6e', 'Ciomas, Bogor', 3),
(5, 'Admin', '085156562871', 'admin@gmail.com', '$2y$10$4EoHknmQGVemTWVZgjbIWe2WJZY56Ldk9WfKJgg654V20H.8qQhpG', 'Ciomas, Bogor', 1),
(7, 'Employee', '085156134923', 'employee@gmail.com', '$2y$10$7rNi8nghgeZplP8phrll9Ov47kiYCAi3TYBoJZm2jtuZUQB75r59e', 'Ciomas, Bogor', 2),
(8, 'nur alliza', '11111111111', 'alliza@gmail.com', '$2y$10$ldUXh/91BmXOXc55RxVYEucXDU9I95zPoU9zx2D1p3mXkjSH1O9Ci', 'brandweer', 3);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `banks`
--
ALTER TABLE `banks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cars`
--
ALTER TABLE `cars`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `number_plate` (`number_plate`),
  ADD KEY `fk_car_type` (`type_id`);

--
-- Indexes for table `licenses`
--
ALTER TABLE `licenses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_license_rent` (`rent_id`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_payment_bank` (`bank_id`),
  ADD KEY `fk_payment_rent` (`rent_id`);

--
-- Indexes for table `rents`
--
ALTER TABLE `rents`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_rent_car` (`car_id`),
  ADD KEY `fk_rent_user` (`user_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `types`
--
ALTER TABLE `types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `fk_user_role` (`role_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `banks`
--
ALTER TABLE `banks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `licenses`
--
ALTER TABLE `licenses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `types`
--
ALTER TABLE `types`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cars`
--
ALTER TABLE `cars`
  ADD CONSTRAINT `fk_car_type` FOREIGN KEY (`type_id`) REFERENCES `types` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `licenses`
--
ALTER TABLE `licenses`
  ADD CONSTRAINT `fk_license_rent` FOREIGN KEY (`rent_id`) REFERENCES `rents` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `payments`
--
ALTER TABLE `payments`
  ADD CONSTRAINT `fk_payment_bank` FOREIGN KEY (`bank_id`) REFERENCES `banks` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_payment_rent` FOREIGN KEY (`rent_id`) REFERENCES `rents` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `rents`
--
ALTER TABLE `rents`
  ADD CONSTRAINT `fk_rent_car` FOREIGN KEY (`car_id`) REFERENCES `cars` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_rent_user` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `fk_user_role` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
