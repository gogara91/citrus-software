-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 19, 2020 at 11:04 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.2.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `citrus`
--

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `body` text NOT NULL,
  `product_id` int(11) DEFAULT NULL,
  `approved` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `name`, `email`, `body`, `product_id`, `approved`) VALUES
(1, 'Goran Nikolajevic', 'gorans91@gmail.com', 'Hello, nice message about lemons and lemonade!', 1, 1),
(2, 'Goran Nikolajevic', 'gorans91@gmail.com', 'Hey you are posting another great photo about lemons!', 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `title`, `description`, `image`) VALUES
(1, 'When life gives you lemons...', 'Make a lemonade.', 'https://i0.wp.com/images-prod.healthline.com/hlcmsresource/images/AN_images/lemon-health-benefits-1296x728-feature.jpg?w=1155&h=1528'),
(2, 'Post about lemons', 'This is really pretty lemon.', 'https://www.organicfacts.net/wp-content/uploads/lemon.jpg'),
(3, 'Lemons are the best', 'This looks like an orange, but it is a lemon!', 'https://www.medicaldevice-network.com/wp-content/uploads/sites/11/2019/12/shutterstock_635847026.jpg'),
(4, 'Citrus is the best!', 'If you dont like, citrus, we dont like you.', 'https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcToh4Es2FT4SWgOzuHz7Ijx16BMeQkaqymYxfFG4PiamnUAzLpI'),
(5, 'This is bergamot', 'I have no idea whats bergamot.', 'https://www.farmersalmanac.com/wp-content/uploads/2018/02/What-Is-Bergamot-fruit-earl-grey-i627198308.jpeg'),
(6, 'I love mandarins!', 'I love mandarins, unless they have seeds inside.', 'https://d3h1lg3ksw6i6b.cloudfront.net/media/image/2019/01/29/49e662b50f244627acc1c3c16c5fea1e_5+Types+Of+Mandarin+Oranges+For+Chinese+New+Year_Dekopon.jpg'),
(7, 'Orange, but bloody', 'Bloody hell, this looks tasty!', 'https://www.thespruceeats.com/thmb/R0J0SP5aDHfhR87NX9yLC3lKaC4=/960x0/filters:no_upscale():max_bytes(150000):strip_icc()/GettyImages-181894211-d1dbe52d606942ff807a5c189485aa9e.jpg'),
(8, 'Buddha\'s hand', 'This is buddhas hand', 'https://cdn-image.myrecipes.com/sites/default/files/styles/4_3_horizontal_-_1200x900/public/what-to-do-with-buddhas-hands.jpg?itok=xazS98Ac'),
(9, 'Banpeiyu', 'large lemon', 'https://live.staticflickr.com/2331/2508018627_ca8a858bf0_b.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
