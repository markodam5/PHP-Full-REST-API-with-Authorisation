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
(1, 'Force 2', 'http://localhost/rest/server/images/force2.jpg', 'https://www.youtube.com/watch?v=XAp78FqTfw8', 50),
(2, 'Mechanic', 'http://localhost/rest/server/images/mechanic.jpg', 'https://www.youtube.com/watch?v=CMklQNn0OH0', 60),
(3, 'Rambo 4', 'http://localhost/rest/server/images/rambo4.jpg', 'https://www.youtube.com/watch?v=CPx-0qDRroU', 1500),
(4, 'Robocop', 'http://localhost/rest/server/images/robocop.jpg', 'https://www.youtube.com/watch?v=Z931XZ2wfpE', 1000),
(5, 'Swiss Army Man', 'http://localhost/rest/server/images/swiss-army.jpg', 'https://www.youtube.com/watch?v=yrK1f4TsQfM', 1100),
(6, 'Transformers: The Last Knight', 'http://localhost/rest/server/images/transformers.jpg', 'https://www.youtube.com/watch?v=AntcyqJ6brc', 900),
(7, 'Warcraft: The beginning', 'http://localhost/rest/server/images/warcraft.jpg', 'https://www.youtube.com/watch?v=RVzb956kdgc', 900),
(8, 'X-Men: Apocalypse', 'http://localhost/rest/server/images/x-men.jpg', 'https://www.youtube.com/watch?v=COvnHv42T-A', 900);

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
