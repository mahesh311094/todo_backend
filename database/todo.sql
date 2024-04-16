-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Apr 16, 2024 at 07:30 AM
-- Server version: 10.11.7-MariaDB-cll-lve
-- PHP Version: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `u729364253_todo`
--

-- --------------------------------------------------------

--
-- Table structure for table `todo`
--

CREATE TABLE `todo` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `title` varchar(60) NOT NULL,
  `description` varchar(500) NOT NULL,
  `status` varchar(30) NOT NULL,
  `created` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `todo`
--

INSERT INTO `todo` (`id`, `user_id`, `title`, `description`, `status`, `created`, `updated`) VALUES
(2, 1, 'Attend Meeting', 'Attend the weekly team meeting at 10:00 AM. Prepare updates on ongoing projects and discuss any challenges faced.', 'To Do', '2024-04-15 13:46:37', '2024-04-15 13:54:09'),
(3, 1, 'Grocery Shopping', 'Buy fruits, vegetables, milk, eggs, bread, and chicken from the nearby supermarket.', 'To Do', '2024-04-15 13:50:02', '2024-04-15 13:54:13'),
(4, 1, 'Complete Presentation', 'Finish preparing slides for the upcoming presentation on market analysis. Include graphs and statistics.', 'To Do', '2024-04-15 13:50:23', '2024-04-15 13:54:45'),
(5, 1, 'Call Mom', 'Catch up with mom, ask about her health, and discuss plans for the weekend.', 'In Progress', '2024-04-15 13:50:46', '2024-04-15 13:54:45'),
(6, 1, 'Gym Workout', 'Hit the gym for a one-hour workout session. Focus on cardio and core exercises.', 'Done', '2024-04-15 13:51:05', '2024-04-15 13:54:45'),
(7, 1, 'Pay Bills', 'Settle electricity, internet, and phone bills before the due date to avoid late fees.', 'To Do', '2024-04-15 13:51:23', '2024-04-15 13:54:45'),
(8, 1, 'Read Chapter 5', 'Read and take notes on Chapter 5 of the economics textbook for tomorrow\'s class.', 'To Do', '2024-04-15 13:51:38', '2024-04-15 13:54:45'),
(9, 1, 'Organize Closet', 'Declutter and organize clothes, shoes, and accessories in the closet. Donate or discard items not in use.', 'In Progress', '2024-04-15 13:51:55', '2024-04-15 13:54:45'),
(10, 1, 'Write Blog Post', 'Start drafting a blog post on the latest industry trends. Research and include relevant examples and insights.', 'Done', '2024-04-15 13:52:13', '2024-04-15 13:54:45'),
(11, 1, 'Plan Vacation', 'Research destinations, accommodation options, and activities for the upcoming vacation. Create a tentative itinerary.', 'To Do', '2024-04-15 13:52:38', '2024-04-15 13:54:45'),
(12, 1, 'Practice Guitar', 'Spend at least 30 minutes practicing guitar chords and scales. Work on improving finger dexterity and learning a new song.', 'Done', '2024-04-15 13:55:32', '2024-04-15 13:55:32'),
(17, 3, 'vjvi', 'vivib', 'In Progress', '2024-04-16 06:30:37', '2024-04-16 06:30:37');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `full_name` varchar(60) NOT NULL,
  `email_id` varchar(60) NOT NULL,
  `password` varchar(20) NOT NULL,
  `created` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `full_name`, `email_id`, `password`, `created`, `updated`) VALUES
(1, 'Mahesh Prajapati', 'mahesh311094@gmail.com', '123456', '2024-04-15 16:03:48', '2024-04-15 16:03:48'),
(2, 'Jaynesh Parekh', 'jkparekh1994@gmail.com', '123456', '2024-04-15 16:05:58', '2024-04-15 16:05:58'),
(3, 'mahesh', 'mahesh@gmail.com', '123456', '2024-04-16 04:28:55', '2024-04-16 04:28:55');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `todo`
--
ALTER TABLE `todo`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `todo`
--
ALTER TABLE `todo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
