-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 01, 2023 at 09:51 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `book_store`
--

-- --------------------------------------------------------

--
-- Table structure for table `upcomming`
--

CREATE TABLE `upcomming` (
  `book_id` int(50) NOT NULL,
  `name` varchar(50) NOT NULL,
  `price` int(50) NOT NULL,
  `image` varchar(50) NOT NULL,
  `quantity` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `upcomming`
--

INSERT INTO `upcomming` (`book_id`, `name`, `price`, `image`, `quantity`) VALUES
(51, 'check & mate', 220, 'check.jpg', 50),
(52, 'Love Redesigned (Lakefront Billionaires) by Lauren', 240, 'love.jpg', 50),
(53, 'Iron Flame (The Empyrean Book 2) by Rebecca Yarros', 380, 'iron.jpg', 50),
(54, '\r\nNormal Broken by Kelly Cervantes', 329, 'normal.jpg', 50),
(55, 'A Not So Meet Cute (Cane Brothers Book 1) by Megha', 380, 'cute.jpg', 50),
(56, 'Hes Not My Type by Meghan Quinn', 320, 'notmytype.jpg', 50),
(57, 'Minecraft: The Outsider (An Official Minecraft Nov', 320, 'mine.jpg', 50),
(58, 'Grievars Blood (The Combat Codes Book 2) by Alexan', 320, 'blood.jpg', 50),
(56, 'So Not Meant to Be (Cane Brothers Book 2) by Megha', 320, 'tobe.jpg', 50);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
