-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jul 06, 2015 at 05:37 PM
-- Server version: 5.5.43-0ubuntu0.14.04.1
-- PHP Version: 5.5.9-1ubuntu4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `shop`
--

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE IF NOT EXISTS `product` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `price` float NOT NULL,
  `rating` int(11) NOT NULL,
  `picture` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=11 ;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `name`, `description`, `price`, `rating`, `picture`) VALUES
(1, 'Abyssimal Runed War-axe', 'lorem ipsum dolor...', 17, 5, 'pic1.jpg'),
(2, 'Blessed Carvers'' Helm of the Savage Archmagi', 'lorem ipsum dolor...', 4.21, 4, 'pic2.jpg'),
(3, 'Corrupt Eagle''s Medicine of the Hex of Detect Robes', 'lorem ipsum dolor...', 16.64, 5, 'pic3.jpg'),
(4, 'Disrupting Pyramid of Cold Ball', 'lorem ipsum dolor...', 1000, 3, 'pic4.jpg'),
(5, 'Fortuitous Pyramid', 'lorem ipsum dolor...', 3.5, 2, 'pic5.jpg'),
(6, 'Future Keepers'' Trumpet of the Exceptional Charm of the Blue Armors', 'lorem ipsum dolor...', 32.32, 0, 'pic6.jpg'),
(7, 'Humans'' Salve of Villainous Fire Disks', 'lorem ipsum dolor...', 7.88, 1, 'pic7.jpg'),
(8, 'Kingly Scintillating Bracer of Earth Rains', 'lorem ipsum dolor...', 13.75, 4, 'pic8.jpg'),
(9, 'Krakens'' Knife of Insane Hearers', 'lorem ipsum dolor...', 19.5, 0, 'pic9.jpg'),
(10, 'Ointment of the Insect', 'lorem ipsum dolor...', 45.5, 5, 'pic10.jpg');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
