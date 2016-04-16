-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 14, 2016 at 07:42 AM
-- Server version: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `bayanicarwash`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
`id` int(10) unsigned NOT NULL,
  `username` text NOT NULL,
  `password_` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password_`) VALUES
(2, 'admin', 'b1b3773a05c0ed0176787a4f1574ff0075f7521e');

-- --------------------------------------------------------

--
-- Table structure for table `cars`
--

CREATE TABLE IF NOT EXISTS `cars` (
`id` int(11) NOT NULL,
  `plate_num` text NOT NULL,
  `color` text NOT NULL,
  `manufacturer` text NOT NULL,
  `model` text NOT NULL,
  `fullname` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cars`
--

INSERT INTO `cars` (`id`, `plate_num`, `color`, `manufacturer`, `model`, `fullname`) VALUES
(1, 'GBG321', 'Grey', 'Toyota', 'Silvia', 'Gabby Gonzales'),
(3, 'EWQ321', 'Blue', 'Honda', 'Civic', 'Emilio Isagani Benitez'),
(4, 'YTR890', 'Green', 'Bugatti', 'Veyron', 'Nathan Remante'),
(5, 'HEY321', 'Maroon', 'Mitsubishi', 'Galant', 'Kevin David Reyes'),
(6, 'N4STY', 'Silver', 'Toyota', 'Supra', 'Neigel Yap'),
(7, 'SDF654', 'Red', 'Ferrari', 'FXX Evoluzione', 'Paolo Baculi'),
(8, 'EWQ321', 'Blue', 'Honda', 'Civic', 'Jason Benitez'),
(9, 'ICEB3RG', 'Blue and White', 'SS', 'Titanic', 'Kunkka Proudmore'),
(10, 'HEY000', 'Pink', 'Volkswagen', 'Beetle', 'Driddle Riddle'),
(11, 'M4DL1F3', 'Lime Green', 'Lamborghini', 'Aventador', 'Bilbo Baggins'),
(12, 'CNTP455', 'Gold', 'Flying', 'Gryphon', 'Gandalf The White'),
(13, '123jhg', 'Color', 'Testing', 'Sample', 'Paul Jao'),
(14, 'PLATE123', 'Color', 'Manufacturer', 'Model', 'Fname Lname'),
(15, 'PLATE123', 'Color', 'Manufacturer', 'Model', 'Fname Lname');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE IF NOT EXISTS `customers` (
`id` int(11) NOT NULL,
  `lastname` text NOT NULL,
  `firstname` text NOT NULL,
  `middlename` text NOT NULL,
  `tel_num` int(30) NOT NULL,
  `contact_num` text NOT NULL,
  `email` text NOT NULL,
  `fullname` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `lastname`, `firstname`, `middlename`, `tel_num`, `contact_num`, `email`, `fullname`) VALUES
(1, 'Gonzales', 'Gabby', 'David', 6123456, 'None', '', 'Gabby Gonzales'),
(3, 'Benitez', 'Emilio Isagani', 'Tenazas', 5660987, '09231234567', 'emilio@email.com', 'Emilio Isagani Benitez'),
(4, 'Remante', 'Nathan', 'Del Rosario', 4561237, '09271234567', 'nathan@email.com', 'Nathan Remante'),
(5, 'Reyes', 'Kevin David', 'Kevin', 7658901, '09091234567', 'kevin@email.com', 'Kevin David Reyes'),
(6, 'Yap', 'Neigel', 'Reyes', 7551320, '090876543321', 'neigel@email.com', 'Neigel Yap'),
(7, 'Baculi', 'Paolo', 'Charlene', 1234567, '09371234567', 'paolo@email.com', 'Paolo Baculi'),
(8, 'Benitez', 'Jason', 'Tenazas', 9876543, '09051234567', 'jason@email.com', 'Jason Benitez'),
(9, 'Proudmore', 'Kunkka', 'Admiral', 6666666, '09201234567', 'ayokoKayTide@email.com', 'Kunkka Proudmore'),
(10, 'Riddle', 'Driddle', 'Middle', 4321456, '09331234567', 'd.ridz@email.com', 'Driddle Riddle'),
(11, 'Baggins', 'Bilbo', 'Hobbit', 8760984, 'None', '', 'Bilbo Baggins'),
(12, 'The White', 'Gandalf', 'Wizard', 9871234, 'None', '', 'Gandalf The White'),
(13, 'Jao', 'Paul', 'Sixkeyy', 1234567, 'None', '', 'Paul Jao'),
(14, 'Lname', 'Fname', 'Mname', 6551234, '09421234567', 'sample@email.com', 'Fname Lname'),
(15, 'Lname', 'Fname', 'Mname', 6551234, '09421234567', 'sample@email.com', 'Fname Lname');

-- --------------------------------------------------------

--
-- Table structure for table `records`
--

CREATE TABLE IF NOT EXISTS `records` (
`id` int(11) NOT NULL,
  `cust_id` int(11) NOT NULL,
  `car_id` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `records`
--

INSERT INTO `records` (`id`, `cust_id`, `car_id`) VALUES
(1, 1, 1),
(3, 3, 3),
(4, 4, 4),
(5, 5, 5),
(6, 6, 6),
(7, 7, 7),
(8, 8, 8),
(9, 9, 9),
(10, 10, 10),
(11, 11, 11),
(12, 12, 12),
(13, 13, 13),
(14, 14, 14);

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE IF NOT EXISTS `services` (
`id` int(11) NOT NULL,
  `service_name` text NOT NULL,
  `price` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`id`, `service_name`, `price`) VALUES
(1, 'Wash', 100),
(2, 'Wax', 140),
(3, 'Asphalt Removal', 80),
(4, 'Armor All', 80),
(5, 'Vacuum', 80),
(6, 'Tire Black', 30),
(7, 'Interior Detailing', 3000),
(8, 'Exterior Detailing', 3500);

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE IF NOT EXISTS `transactions` (
`id` int(11) NOT NULL,
  `service_id` text NOT NULL,
  `record_id` int(11) NOT NULL,
  `total_amount` double NOT NULL,
  `payment` double NOT NULL,
  `change_` double NOT NULL,
  `date` text NOT NULL,
  `comment` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transactions`
--

INSERT INTO `transactions` (`id`, `service_id`, `record_id`, `total_amount`, `payment`, `change_`, `date`, `comment`) VALUES
(1, '3, 1', 1, 180, 400, 220, '2010/02/11', 'Good service''s'),
(2, '7, 8', 3, 6500, 7000, 500, '2016/03/20', 'Okay service!'),
(3, '1, 4, 7', 4, 3180, 4000, 820, '2016/04/10', ''),
(4, '5, 6, 2', 5, 250, 500, 250, '2016/04/11', 'Wow!'),
(5, '1', 6, 100, 100, 0, '2016/04/11', 'Awesome service.'),
(6, '1, 8', 7, 3600, 8000, 4400, '2016/04/11', 'Amazing'),
(7, '3, 6', 6, 110, 300, 190, '2016/04/11', 'I''m back!'),
(8, '1', 1, 100, 400, 300, '2016/04/11', 'Second round!'),
(9, '6', 3, 30, 50, 20, '2016/04/11', 'Cool.'),
(10, '4', 8, 80, 200, 120, '2016/04/11', ''),
(11, '3, 6', 9, 110, 150, 40, '2016/04/11', 'When the iceberg hits just right. \\0/'),
(12, '7, 2, 8', 10, 6640, 10000, 3360, '2016/04/11', 'Nice'),
(13, '1, 2', 11, 240, 300, 60, '2016/04/11', 'Livin'' the Hobbit lyf3.'),
(14, '4, 7', 12, 3080, 5000, 1920, '2016/04/11', 'This is cool'),
(15, '1', 13, 100, 400, 300, '2016/04/11', 'Good'),
(16, '3, 6, 4', 14, 190, 300, 110, '2016/04/11', 'Testing');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cars`
--
ALTER TABLE `cars`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `records`
--
ALTER TABLE `records`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `cust_id` (`cust_id`,`car_id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `cars`
--
ALTER TABLE `cars`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `records`
--
ALTER TABLE `records`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=17;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
