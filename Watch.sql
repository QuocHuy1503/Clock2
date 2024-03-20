-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 20, 2024 at 10:41 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30
drop database watch;
create database watch;

use watch;
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

select * from orders;
/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `watch`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `admin_id` int(11) NOT NULL,
  `admin_name` varchar(25) DEFAULT NULL,
  `email` varchar(25) DEFAULT NULL,
  `password` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`admin_id`, `admin_name`, `email`, `password`) VALUES
(1, 'Tran Dang Ninh', 'trandangninh@gmail.com', 'trandangninh'),
(2, 'Tran Dang Ninh', 'trandangninh@gmail.com', 'trandangninh');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`) VALUES
(1, 'rolex'),
(2, 'Cartier'),
(3, 'Audemars Piguet'),
(4, 'Patek Philippe'),
(5, 'Jaeger-LeCoultre');

-- --------------------------------------------------------

--
-- Table structure for table `watch`
--

CREATE TABLE `watch` (
  `watch_id` int(11) NOT NULL,
  `watch_name` varchar(25) DEFAULT NULL,
  `publication_year` year(4) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `image` text DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `watch`
--

INSERT INTO `watch` (`watch_id`, `watch_name`, `publication_year`, `description`, `price`, `quantity`, `image`, `category_id`) VALUES
(1, 'FirsTime & Co. Bronze Big', '2016', 'FASHIONABLE AND FUNCTIONAL - This beautiful analog clock features an open face with extra large Roman numerals to easily tell the time. Complete with a lightweight yet durable plastic frame, this clock will make a statement in any home or office space', 87, 100, '61x5tgrFbeL._AC_SX679_.jpg', 2),
(2, 'FirsTime & Co. Walnut Rou', '1967', 'TRADITIONAL STYLE - Whether moving into a new home or looking for a gift, make an accent statement in your entryway, kitchen, living room or bathroom with a stylish and decorative Traditional piece from FirsTime & Co.', 34, 100, '81r3QMVJ8mL._AC_SX679_.jpg', 2),
(3, 'FirsTime & Co. Bronze Big', '2000', 'FASHIONABLE AND FUNCTIONAL - This beautiful analog clock features an open face with extra large Roman numerals to easily tell the time. Complete with a lightweight yet durable plastic frame, this clock will make a statement in any home or office space', 87, 100, '91gJKspIDsS._AC_SX679_.jpg', 5),
(4, 'FirsTime & Co. Multicolor', '2024', 'FASHIONABLE AND FUNCTIONAL - This beautiful analog clock features an open face with a colorful rustic design to easily tell the time. Complete with a classic windmill silhouette, this clock will make a statement in any home or office space', 48, 100, '61x5tgrFbeL._AC_SX679_.jpg', 3),
(5, 'Seiko Melodies in Motion ', '2022', 'The Melodies In Motion Wall Clock, Golden Chandelier musical wall clock will evoke years of precious family memories with each song played. This whimsical musical clock plays one of 40 high-fidelity melodies every hour. Light sensors ensure that stays quiet in the dark. Families enjoy this clock all year long with its ten classical melodies, six holiday melodies and 24 all occasion melodies, including 6 new ones for 2022.', 99, 100, '81bPDeM0LrL._AC_SX679_.jpg', 3),
(6, 'FirsTime & Co. Multicolor', '2005', 'FASHIONABLE AND FUNCTIONAL - This beautiful analog clock features an open face with a rustic planked design. Complete with a faux galvanized number ring for an antique look, this clock will be a charming update to your home or office space', 96, 100, '919tBv5e9vL._AC_SX679_.jpg', 2),
(7, 'La Crosse Technology 404-', '2009', 'The wonderful advantage of owning an UltrAtomic clock is that it is virtually trouble free. When the clock receives a clear atomic time signal, it will set itself perfectly. Dual Antennas give it a more robust reception even in the most extreme environments, such as office building or hospital. Features additional battery compartment to operate clock for longer period of time and an Eco-mode for saving power.', 46, 100, '81r3QMVJ8mL._AC_SX679_.jpg', 1),
(8, 'FirsTime & Co.® Kensingto', '2006', 'FASHIONABLE AND FUNCTIONAL - This beautiful analog clock features an antiqued beige dial with easy-to-read numbers. Complete with our silent Whisper Technology, this non-ticking clock will make a statement in any home or office space', 38, 100, '81bPDeM0LrL._AC_SX679_.jpg', 5),
(9, 'Signature Design by Ashle', '2020', 'CHARMING DETAILS: This large wall clock exudes traditional style with details like a distressed cream clock face and the unique scrolling design above the long hands of the clock.', 119, 100, '919tBv5e9vL._AC_SX679_.jpg', 1),
(10, 'FirsTime & Co. Brown Josi', '1988', 'FASHIONABLE AND FUNCTIONAL - This beautiful clock features an airy oversized metal arch design and an open face with Roman numerals on the frame, making a statement in any room', 122, 100, '81r3QMVJ8mL._AC_SX679_.jpg', 2);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `order_status` varchar(25) DEFAULT NULL,
  `order_date` varchar(25) DEFAULT NULL,
  `pay_id` int(11) DEFAULT NULL,
  `ad_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE `order_details` (
  `order_id` int(11) DEFAULT NULL,
  `watch_id` int(11) DEFAULT NULL,
  `sold_quantity` int(11) DEFAULT NULL,
  `subtotal` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `payment_method`
--

CREATE TABLE `payment_method` (
  `payment_id` int(11) NOT NULL,
  `method_name` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `payment_method`
--

INSERT INTO `payment_method` (`payment_id`, `method_name`) VALUES
(1, 'Momo'),
(2, 'Thanh toan khi nhan hang'),
(3, 'Banking'),
(4, 'Zalo Pay'),
(5, 'QR code'),
(6, 'Momo'),
(7, 'Thanh toan khi nhan hang'),
(8, 'Banking'),
(9, 'Zalo Pay'),
(10, 'QR code');

-- --------------------------------------------------------

CREATE TABLE `status` (
  `status_id` int(11) NOT NULL,
  `user_status` varchar(100) NOT NULL,
  primary key (status_id)
  );
  
--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(25) DEFAULT NULL,
  `phone` varchar(25) DEFAULT NULL,
  `address` varchar(25) DEFAULT NULL,
  `password` varchar(25) DEFAULT NULL,
  `email` varchar(25) DEFAULT NULL,
  `user_status_id` int(11) DEFAULT NULL,
  primary key (user_id),
  foreign key (user_status_id) references status(status_id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

  
  INSERT INTO `status` (`status_id`, `user_status`) VALUES
(1, 'Active'),
(2, 'Deactive');


--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `watch`
--
ALTER TABLE `watch`
  ADD PRIMARY KEY (`watch_id`),
  ADD KEY `category_id` (`category_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `pay_id` (`pay_id`),
  ADD KEY `ad_id` (`ad_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `order_details`
--
ALTER TABLE `order_details`
  ADD KEY `order_id` (`order_id`),
  ADD KEY `watch_id` (`watch_id`);

--
-- Indexes for table `payment_method`
--
ALTER TABLE `payment_method`
  ADD PRIMARY KEY (`payment_id`);


--
-- AUTO_INCREMENT for dumped tables
--
--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `watch`
--
ALTER TABLE `watch`
  MODIFY `watch_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `payment_method`
--
ALTER TABLE `payment_method`
  MODIFY `payment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `watch`
--
ALTER TABLE `watch`
  ADD CONSTRAINT `watch_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`);

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`pay_id`) REFERENCES `payment_method` (`payment_id`),
  ADD CONSTRAINT `orders_ibfk_2` FOREIGN KEY (`ad_id`) REFERENCES `admins` (`admin_id`),
  ADD CONSTRAINT `orders_ibfk_3` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`);

--
-- Constraints for table `order_details`
--
ALTER TABLE `order_details`
  ADD CONSTRAINT `order_details_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `orders` (`order_id`),
  ADD CONSTRAINT `order_details_ibfk_2` FOREIGN KEY (`watch_id`) REFERENCES `watch` (`watch_id`);
COMMIT;

  INSERT INTO `user` (`user_name`,`phone`, `address`,`password`,`email`,`user_status_id`) VALUES
('Nguyen Van A',0123456789,'Thach That,Ha Noi','123456','nguyenvana@gmail.com',1),
('Nguyen Van B',0123456789,'Thach That,Ha Noi','123456','nguyenvanb@gmail.com',1),
('Nguyen Van C',0123456789,'Thach That,Ha Noi','123456','nguyenvanc@gmail.com',2),
('Nguyen Van D',0123456789,'Thach That,Ha Noi','123456','nguyenvand@gmail.com',2);


/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
