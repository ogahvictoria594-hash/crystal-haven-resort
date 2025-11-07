-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Nov 06, 2025 at 11:23 PM
-- Server version: 9.1.0
-- PHP Version: 8.3.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `crystal_haven_resort`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

DROP TABLE IF EXISTS `admins`;
CREATE TABLE IF NOT EXISTS `admins` (
  `id` int NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `username`, `password`) VALUES
(1, 'admin', '$2y$10$WxTAEZxl5tI9BvL0YX8Pduhdvj8jHZTJvs54GH/0mf0UGWenm9IZq');

-- --------------------------------------------------------

--
-- Table structure for table `bookings`
--

DROP TABLE IF EXISTS `bookings`;
CREATE TABLE IF NOT EXISTS `bookings` (
  `id` int NOT NULL AUTO_INCREMENT,
  `user_name` varchar(100) NOT NULL,
  `user_email` varchar(100) NOT NULL,
  `room_id` int NOT NULL,
  `check_in` date NOT NULL,
  `check_out` date NOT NULL,
  `guests` int NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `room_id` (`room_id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `bookings`
--

INSERT INTO `bookings` (`id`, `user_name`, `user_email`, `room_id`, `check_in`, `check_out`, `guests`, `created_at`) VALUES
(1, 'Ogah Victoria', 'ogahvictoria@gmail.com', 1, '2025-11-10', '2025-11-15', 2, '2025-11-04 16:27:31'),
(2, 'Grace Favour', 'gracefavour@gmail.com', 2, '2025-11-12', '2025-11-14', 1, '2025-11-04 16:27:31'),
(3, 'James Victor', 'jamesvictor@gmail.com', 3, '2025-11-20', '2025-11-25', 2, '2025-11-04 16:27:31');

-- --------------------------------------------------------

--
-- Table structure for table `rooms`
--

DROP TABLE IF EXISTS `rooms`;
CREATE TABLE IF NOT EXISTS `rooms` (
  `id` int NOT NULL AUTO_INCREMENT,
  `room_name` varchar(500) NOT NULL,
  `room_type` varchar(100) NOT NULL,
  `description` varchar(5000) NOT NULL,
  `room_amenities` varchar(200) NOT NULL,
  `price_per_night` mediumtext NOT NULL,
  `featured_image` varchar(100) NOT NULL,
  `availabity_status` varchar(100) NOT NULL,
  `room_images` text,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `rooms`
--

INSERT INTO `rooms` (`id`, `room_name`, `room_type`, `description`, `room_amenities`, `price_per_night`, `featured_image`, `availabity_status`, `room_images`) VALUES
(1, 'Deluxe suite\r\n', 'Deluxe suite', 'The Deluxe Room offers a perfect balance of comfort and sophistication. It comes with a king-sized bed, modern interior, ambient lighting, and a private balcony with breathtaking resort views.', 'King-sized Bed\', \'Mini Fridge\', \'Air Conditioning\', \'Smart TV\', \'Wi-Fi\', \'Private Balcony\', \'24hr Room Service', '$85,000', 'room1.jpg', 'available', NULL),
(2, 'Executive Suite', 'Suite', 'The Executive Suite is designed for guests who desire extra space and luxury. It includes a private dining area, a lounge, and a marble-finished bathroom — ideal for business or leisure stays.', 'Queen Bed\', \'Private Lounge\', \'Jacuzzi\', \'Smart TV\', \'Wi-Fi\', \'Mini Bar\', \'Complimentary Breakfast\'', '$120,000', 'room2.jpg', 'available', NULL),
(3, 'Family Suite', 'Penthouse', 'Our Royal Penthouse redefines grandeur. With a private terrace, jacuzzi, personal butler service, and panoramic ocean views, its the ultimate expression of luxury and exclusivity.', 'Private Terrace\', \'Jacuzzi\', \'Butler Service\', \'Mini Bar\', \'Smart Home Controls\', \'High-Speed Wi-Fi\', \'Luxury Bathroom', '$200,000', 'room3.jpg', 'available', NULL),
(4, 'Honeymoon Suite', 'Suite', 'Perfect for couples, the Honeymoon Suite features romantic decor, a king-sized bed, a jacuzzi for two, and a private terrace with ocean views.', 'King Bed\', \'Jacuzzi for Two\', \'Private Terrace\', \'Romantic Lighting\', \'Wi-Fi\', \'Mini Bar\', \'Complimentary Breakfast\'', '$150,000', 'room4.jpg', 'available', NULL),
(5, 'standard room', 'standard', 'Comfortable and cozy, the Standard Room provides all the essential amenities for a pleasant stay, perfect for budget-conscious travelers.\',\r\n    \'amenities', '\'Queen Bed\', \'Air Conditioning\', \'Wi-Fi\', \'TV\', \'Private Bathroom\', \'24hr Room Service\'', '$55,000', 'room5.jpg', 'available', NULL),
(6, 'Presidential Suite', 'Suite', 'The Presidential Suite offers the ultimate luxury experience with a private living area, dining room, jacuzzi, and 24-hour butler service.', 'King Bed\', \'Private Living Area\', \'Dining Room\', \'Jacuzzi\', \'Butler Service\', \'Wi-Fi\', \'Mini Bar', '$250,000', 'room6.jpg', 'available', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `room_images`
--

DROP TABLE IF EXISTS `room_images`;
CREATE TABLE IF NOT EXISTS `room_images` (
  `id` int NOT NULL AUTO_INCREMENT,
  `room_id` int NOT NULL,
  `image_path` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `room_id` (`room_id`)
) ENGINE=MyISAM AUTO_INCREMENT=23 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `room_images`
--

INSERT INTO `room_images` (`id`, `room_id`, `image_path`) VALUES
(1, 1, 'assets/images/rooms/bathroom1.jpg'),
(2, 1, 'assets/images/rooms/terraceroom1.jpg'),
(3, 1, 'assets/images/rooms/diningroom1.jpg'),
(4, 1, 'assets/images/rooms/kitchenroom1.jpg'),
(5, 2, 'assets/images/rooms/execbath.jpg'),
(6, 2, 'assets/images/rooms/execdine.jpg'),
(7, 2, 'assets/images/rooms/execterr.jpg'),
(8, 2, 'assets/images/rooms/execkitch.jpg'),
(9, 3, 'assets/images/rooms/famdine.jpg'),
(10, 3, 'assets/images/rooms/famterr.jpg'),
(11, 3, 'assets/images/rooms/fambroom.jpg'),
(12, 4, 'assets/images/rooms/moonkitch.jpg'),
(13, 4, 'assets/images/rooms/moondine.jpg'),
(14, 4, 'assets/images/rooms/moonterr.jpg'),
(15, 4, 'assets/images/rooms/bathmoon.jpg'),
(16, 5, 'assets/images/rooms/stanbath.jpg'),
(17, 5, 'assets/images/rooms/stankitch.jpg'),
(18, 5, 'assets/images/rooms/standine.jpg'),
(19, 6, 'assets/images/rooms/preskitchen.jpg'),
(20, 6, 'assets/images/rooms/presterrace.jpg'),
(21, 6, 'assets/images/rooms/presbath.jpg'),
(22, 6, 'assets/images/rooms/presuitebed.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

DROP TABLE IF EXISTS `services`;
CREATE TABLE IF NOT EXISTS `services` (
  `id` int NOT NULL AUTO_INCREMENT,
  `service_name` varchar(100) NOT NULL,
  `description` varchar(500) NOT NULL,
  `image_path` varchar(255) NOT NULL,
  `cost` mediumtext NOT NULL,
  `featured_image` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`id`, `service_name`, `description`, `image_path`, `cost`, `featured_image`) VALUES
(1, 'Conference Hall', 'State-of-the-art conference facilities for meetings and events.', 'conn2.jpg', '', ''),
(2, 'Restaurant', 'Exquisite dining with local and international cuisines.', 'meall.jpg', '', ''),
(3, 'Gym & Spa', 'Relax and rejuvenate in our fully-equipped spa and gym.', 'gymm.jpg', '', ''),
(4, 'Rooftop Lounge', 'Enjoy a panoramic view while sipping cocktails.', 'rooff.jpg', '', ''),
(5, 'Laundry Service', 'Quick and efficient laundry service for all guests.', 'llaundry.jpg', '', ''),
(6, 'Private Cinema', 'Exclusive movie experience in a private setting.', 'private.jpg', '', ''),
(7, 'Luxury Bar & Lounge', 'Premium drinks and comfortable lounge area.', 'barr.jpg', '', ''),
(8, 'Swimming Pool & Jacuzzi', 'Unwind in our luxury pool and jacuzzi area.', 'swimm.jpg', '', ''),
(9, 'Event Planning & Catering', 'Professional event planning and catering services.', 'eventt.jpg', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `service_images`
--

DROP TABLE IF EXISTS `service_images`;
CREATE TABLE IF NOT EXISTS `service_images` (
  `id` int NOT NULL AUTO_INCREMENT,
  `service_id` int NOT NULL,
  `image_name` varchar(100) NOT NULL,
  `type` varchar(20) NOT NULL,
  `image_path` varchar(255) NOT NULL,
  `display_name` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=57 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `service_images`
--

INSERT INTO `service_images` (`id`, `service_id`, `image_name`, `type`, `image_path`, `display_name`) VALUES
(1, 1, 'con1.jpg', 'facility', 'assets/images/simages/con1.jpg', 'Conference Hall 1'),
(2, 1, 'con2.jpg', 'facility', 'assets/images/simages/con2.jpg', 'Conference Hall 2'),
(3, 1, 'con3.jpg', 'facility', 'assets/images/simages/con3.jpg', 'Conference Hall 3'),
(4, 1, 'con4.jpg', 'facility', 'assets/images/simages/con4.jpg', 'Conference Hall 4'),
(5, 1, 'con5.jpg', 'facility', 'assets/images/simages/con5.jpg', 'Conference Hall 5'),
(6, 2, 'meal1.jpg', 'facility', 'assets/images/simages/meal1.jpg', 'Delicious Meal 1'),
(7, 2, 'meal2.jpg', 'facility', 'assets/images/simages/meal2.jpg', 'Delicious Meal 2'),
(8, 3, 'gym1.jpg', 'facility', 'assets/images/simages/gym1.jpg', 'Gym & Spa 1'),
(9, 3, 'gym2.jpg', 'facility', 'assets/images/simages/gym2.jpg', 'Gym & Spa 2'),
(10, 3, 'gym3.jpg', 'facility', 'assets/images/simages/gym3.jpg', 'Gym & Spa 3'),
(11, 3, 'gym4.jpg', 'facility', 'assets/images/simages/gym4.jpg', 'Gym & Spa 4'),
(12, 3, 'gym5.jpg', 'facility', 'assets/images/simages/gym5.jpg', 'Gym & Spa 5'),
(13, 3, 'gym6.jpg', 'facility', 'assets/images/simages/gym6.jpg', 'Gym & Spa 6'),
(14, 4, 'roof1.jpg', 'facility', 'assets/images/simages/roof1.jpg', 'Rooftop Lounge 1'),
(15, 4, 'roof2.jpg', 'facility', 'assets/images/simages/roof2.jpg', 'Rooftop Lounge 2'),
(16, 4, 'roof3.jpg', 'facility', 'assets/images/simages/roof3.jpg', 'Rooftop Lounge 3'),
(17, 4, 'roof4.jpg', 'facility', 'assets/images/simages/roof4.jpg', 'Rooftop Lounge 4'),
(18, 4, 'roof5.jpg', 'facility', 'assets/images/simages/roof5.jpg', 'Rooftop Lounge 5'),
(19, 8, 'swim1.jpg', 'facility', 'assets/images/simages/swim1.jpg', 'Laundry Service 1'),
(20, 8, 'swim2.jpg', 'facility', 'assets/images/simages/swim2.jpg', 'Laundry Service 2'),
(21, 8, 'swim3.jpg', 'facility', 'assets/images/simages/swim3.jpg', 'Laundry Service 3'),
(22, 8, 'swim4.jpg', 'facility', 'assets/images/simages/swim4.jpg', 'Laundry Service 4'),
(23, 8, 'swim5.jpg', 'facility', 'assets/images/simages/swim5.jpg', 'Laundry Service 5'),
(24, 7, 'bar1.jpg', 'facility', 'assets/images/simages/bar1.jpg', 'Private Cinema 1'),
(25, 7, 'bar2.jpg', 'facility', 'assets/images/simages/bar2.jpg', 'Private Cinema 2'),
(26, 7, 'bar3.jpg', 'facility', 'assets/images/simages/bar3.jpg', 'Private Cinema 3'),
(27, 7, 'bar4.jpg', 'facility', 'assets/images/simages/bar4.jpg', 'Private Cinema 4'),
(28, 7, 'bar5.jpg', 'facility', 'assets/images/simages/bar5.jpg', 'Private Cinema 5'),
(29, 5, 'cloth1.jpg', 'facility', 'assets/images/simages/cloth1.jpg', 'Luxury Bar 1'),
(30, 5, 'cloth2.jpg', 'facility', 'assets/images/simages/cloth2.jpg', 'Luxury Bar 2'),
(31, 5, 'cloth3.jpg', 'facility', 'assets/images/simages/cloth3.jpg', 'Luxury Bar 3'),
(32, 5, 'cloth4.jpg', 'facility', 'assets/images/simages/cloth4.jpg', 'Luxury Bar 4'),
(33, 7, 'cloth5.jpg', 'facility', 'assets/images/simages/cloth5.jpg', 'Luxury Bar 5'),
(34, 6, 'cin1.jpg', 'facility', 'assets/images/simages/cin1.jpg', 'Swimming Pool 1'),
(35, 6, 'cin2.jpg', 'facility', 'assets/images/simages/cin2.jpg', 'Swimming Pool 2'),
(36, 6, 'cin3.jpg', 'facility', 'assets/images/simages/cin3.jpg', 'Swimming Pool 3'),
(37, 6, 'cin4.jpg', 'facility', 'assets/images/simages/cin4.jpg', 'Swimming Pool 4'),
(38, 8, 'cin5.jpg', 'facility', 'assets/images/simages/cin5.jpg', 'Swimming Pool 5'),
(39, 9, 'cake.jpg', 'food', 'assets/images/simages/cake.jpg', NULL),
(40, 9, 'ice.jpg', 'food', 'assets/images/simages/ice.jpg', NULL),
(41, 9, 'ring.jpg', 'food', 'assets/images/simages/ring.jpg', NULL),
(42, 9, 'jollof.jpg', 'food', 'assets/images/simages/jollof.jpg', NULL),
(43, 9, 'rice.jpg', 'food', 'assets/images/simages/rice.jpg', NULL),
(44, 9, 'burrito.jpg', 'food', 'assets/images/simages/burrito.jpg', NULL),
(45, 9, 'food1.jpg', 'food', 'assets/images/simages/food1.jpg', NULL),
(46, 9, 'food2.jpg', 'food', 'assets/images/simages/food2.jpg', NULL),
(47, 9, 'food3.jpg', 'food', 'assets/images/simages/food3.jpg', NULL),
(48, 9, 'food4.jpg', 'food', 'assets/images/simages/food4.jpg', NULL),
(49, 9, 'food5.jpg', 'food', 'assets/images/simages/food5.jpg', NULL),
(50, 9, 'wed.jpg', 'event', 'assets/images/simages/wed.jpg', NULL),
(51, 9, 'wed2.jpg', 'event', 'assets/images/simages/wed2.jpg', NULL),
(52, 9, 'birthday.jpg', 'event', 'assets/images/simages/birthday.jpg', NULL),
(53, 9, 'event1.jpg', 'event', 'assets/images/simages/event1.jpg', NULL),
(54, 9, 'event2.jpg', 'event', 'assets/images/simages/event2.jpg', NULL),
(55, 9, 'event3.jpg', 'event', 'assets/images/simages/event3.jpg', NULL),
(56, 9, 'event4.jpg', 'event', 'assets/images/simages/event4.jpg', NULL);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
