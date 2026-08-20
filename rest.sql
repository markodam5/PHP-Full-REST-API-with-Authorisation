-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 21, 2020 at 01:48 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rest`
--

-- --------------------------------------------------------

--
-- Table structure for table `movies`
--

CREATE TABLE `movies` (
  `movie_id` int(11) NOT NULL,
  `movie_title` varchar(50) NOT NULL,
  `movie_picture` varchar(200) NOT NULL,
  `movie_link` varchar(200) NOT NULL,
  `movie_price` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `movies`
--

INSERT INTO `movies` (`movie_id`, `movie_title`, `movie_picture`, `movie_link`, `movie_price`) VALUES
(1, 'Avatar', 'http://localhost/rest/server/images/avatar.jpg', 'https://www.youtube.com/watch?v=5PSNL1qE6VY', 1200),
(2, 'Titanic', 'http://localhost/rest/server/images/titanic.jpg', 'https://www.youtube.com/watch?v=kVrqfYjk5nA', 1100),
(3, 'Avengers: Endgame', 'http://localhost/rest/server/images/avengers-endgame.jpg', 'https://www.youtube.com/watch?v=TcMBFSGVi1c', 1500),
(4, 'Spider-Man: No Way Home', 'http://localhost/rest/server/images/spider-man.jpg', 'https://www.youtube.com/watch?v=JfVOs4VSpmA', 1400),
(5, 'The Godfather', 'http://localhost/rest/server/images/godfather.jpg', 'https://www.youtube.com/watch?v=UaVTIH8mujA', 1300),
(6, 'Pulp Fiction', 'http://localhost/rest/server/images/pulp-fiction.jpg', 'https://www.youtube.com/watch?v=s7EdQ4FqbhY', 1250),
(7, 'Fight Club', 'http://localhost/rest/server/images/fight-club.jpg', 'https://www.youtube.com/watch?v=qtRKdVHc-cE', 1150),
(8, 'Forrest Gump', 'http://localhost/rest/server/images/forrest-gump.jpg', 'https://www.youtube.com/watch?v=bLvqoHBptjg', 1000),
(9, 'The Lord of the Rings: The Return of the King', 'http://localhost/rest/server/images/lotr-return.jpg', 'https://www.youtube.com/watch?v=r5X-hFf6Bwo', 1500),
(10, 'Parasite', 'http://localhost/rest/server/images/parasite.jpg', 'https://www.youtube.com/watch?v=5xH0HfJHsaY', 1200),
(11, 'Toy Story', 'http://localhost/rest/server/images/toy-story.jpg', 'https://www.youtube.com/watch?v=v-PjgYDrg70', 900),
(12, 'Avatar: The Way of Water', 'http://localhost/rest/server/images/avatar-way-of-water.jpg', 'https://www.youtube.com/watch?v=d9MyW72ELq0', 1350);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `licence_key` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `licence_key`) VALUES
(1, 'marko', 'marko@marko.me', '123', '4e44d509804f6b704bd10d4e1b601234');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `movies`
--
ALTER TABLE `movies`
  ADD PRIMARY KEY (`movie_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `movies`
--
ALTER TABLE `movies`
  MODIFY `movie_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
