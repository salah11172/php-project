-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 31, 2021 at 04:11 AM
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
-- Database: `booksystem`
--

-- --------------------------------------------------------

--
-- Table structure for table `authors`
--

CREATE TABLE `authors` (
  `id` int(10) NOT NULL,
  `name` varchar(50) NOT NULL,
  `Brief` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `book`
--

CREATE TABLE `book` (
  `Name` varchar(255) NOT NULL,
  `author` varchar(255) DEFAULT NULL,
  `pid` int(10) DEFAULT NULL,
  `deccription` varchar(1000) DEFAULT NULL,
  `image` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `book`
--

INSERT INTO `book` (`Name`, `author`, `pid`, `deccription`, `image`) VALUES
('big', 'my', 2, 'Disabled buttons using the <a> element behave a bit different:  <a>s don’t support the disabled attribute, so you must add the .disabled class to make it visually appear disabled. Some future-friendly styles are included to disable all pointer-events on anchor buttons. Disabled buttons should include the aria-disabled=\"true\" attribute to indicate the state of the element to assistive technologies.', 'h2.png'),
('final test', 'salah', 2, 'This function should not be used to try to prevent XSS attacks.\r\n     Use more appropriate functions like htmlspecialchars() or other means depending\r\n      on the context of the output.Warning\r\n    Because strip_tags() does not actually validate the HTML, partial or broken tags can\r\n     result in the removal of more text/data than expectedWarning\r\n    This function does not modify any attributes on the tags that you allow using allowed_tags,\r\n     including the style and onmouseover attributes that a mischievous \r\n     user may abuse when posting text that will be shown to other users.', 'FB_IMG_1517682766208.jpg'),
('new', 'aya', 2, 'This function should not be used to try to prevent XSS attacks.\r\n     Use more appropriate functions like htmlspecialchars() or other means depending\r\n      on the context of the output.Warning\r\n    Because strip_tags() does not actually validate the HTML, partial or broken tags can\r\n     result in the removal of more text/data than expectedWarning\r\n    This function does not modify any attributes on the tags that you allow using allowed_tags,\r\n     including the style and onmouseover attributes that a mischievous \r\n     user may abuse when posting text that will be shown to other users.', '104167572_357824261864663_5967985424446218081_o.jpg'),
('salah book', 'saad', 1, 'this is desc This function should not be used to try to prevent XSS attacks.\r\n     Use more appropriate functions like htmlspecialchars() or other means depending\r\n      on the context of the output.Warning\r\n    Because strip_tags() does not actually validate the HTML, partial or broken tags can\r\n     result in the removal of more text/data than expectedWarning\r\n    This function does not modify any attributes on the tags that you allow using allowed_tags,\r\n     including the style and onmouseover attributes that a mischievous \r\n     user may abuse when posting text that will be shown to other users.', '71151371_2274221652675259_5245364934933479424_n.jpg'),
('Team Work skills', 'saad', 1, 'Disabled buttons using the <a> element behave a bit different:\r\n\r\n<a>s don’t support the disabled attribute, so you must add the .disabled class to make it visually appear disabled.\r\nSome future-friendly styles are included to disable all pointer-events on anchor buttons.\r\nDisabled buttons should include the aria-disabled=\"true\" attribute to indicate the state of the element to assistive technologies.', '71151371_2274221652675259_5245364934933479424_n.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `pass` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `email`, `pass`, `image`) VALUES
(1, 'salah11172', '111111', NULL),
(2, ' salah', 'salah123456', 'IMG_٢٠٢٠٠٩٠٢_٢٠٣٤٠٥.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `authors`
--
ALTER TABLE `authors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `book`
--
ALTER TABLE `book`
  ADD PRIMARY KEY (`Name`),
  ADD KEY `pid` (`pid`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `book`
--
ALTER TABLE `book`
  ADD CONSTRAINT `book_ibfk_1` FOREIGN KEY (`pid`) REFERENCES `user` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
