-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Aug 09, 2022 at 07:09 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `online_paiting_store`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(200) NOT NULL,
  `admin_name` varchar(200) NOT NULL,
  `admin_email` varchar(200) NOT NULL,
  `admin_mobile` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `admin_name`, `admin_email`, `admin_mobile`) VALUES
(3, 'System Admin', 'sysadmin@gmail.com', '07123456789'),
(4, 'Jasmine Doekins JNR', 'jasjnr766@gmail.com', '+90088-8774823');

-- --------------------------------------------------------

--
-- Table structure for table `artist`
--

CREATE TABLE `artist` (
  `artist_id` int(200) NOT NULL,
  `artist_name` varchar(200) NOT NULL,
  `artist_email` varchar(200) NOT NULL,
  `artist_image` longtext NOT NULL,
  `artist_desc` longtext NOT NULL,
  `artist_location` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `artist`
--

INSERT INTO `artist` (`artist_id`, `artist_name`, `artist_email`, `artist_image`, `artist_desc`, `artist_location`) VALUES
(1, 'Da Vinci', 'vinvi87@hotmail.com', 'JPFVU36549.jpg', 'An Award winning photographer, Evelyn Sosa Rojas was born in 1989 in Havana, Cuba, where she still lives and work. In her practice, since 2008, Sosa specializes in amazingly soulful portraits. Sosa shows the power of femininity through photos of women in different familiar or intimate settings. In 2016, Sosa was the winner of the Herman Puig Prize, awarded yearly to the best artist of the Body Photography Salon in Havana.', '676- Drivway Milan, Italy'),
(2, 'Evalyn Rolella Troy', 'evasosa986@hotmail.com', 'JPLER93281.jpg', 'Born in Sydney in 1972, Rolella completed a Bachelor of Visual Arts (Honours) in 1994 and went on to obtain a Masters in Visual Arts at the University of Western Sydney in 1998. Joseph Rolella has exhibited consistently for the past twelve years both nationally and internationally. Rolella has won several major art prizes including the Australian Cricket Art Prize in 2011 for the painting “Cricket at Kandahar”. The Oakhill Grammer School Art Prize in 2013 as well as being selected as a semi-finalist for the prestigious Doug Moran Portrait Prize. Complex and contradictory, Rolella’s recent abstract paintings seek to expose a delicate equilibrium between a sense of balance and visual calm and the tumult of painterly texture and surface tension. The play of light at the waters edge…', 'Sydney, Australia'),
(4, 'Hillary Frankie Adams', 'frankie676@gmail.com', 'IJZBM87350.jpg', 'An Award winning photographer, Evelyn Sosa Rojas was born in 1989 in Havana, Cuba, where she still lives and work. In her practice, since 2008, Sosa specializes in amazingly soulful portraits. Sosa shows the power of femininity through photos of women in different familiar or intimate settings. In 2016, Sosa was the winner of the Herman Puig Prize, awarded yearly to the best artist of the Body Photography Salon in Havana.', '887, Long Beach, San Francisco');

-- --------------------------------------------------------

--
-- Table structure for table `artwork`
--

CREATE TABLE `artwork` (
  `artwork_id` int(200) NOT NULL,
  `artwork_reg` varchar(200) NOT NULL,
  `artwork_type` varchar(200) NOT NULL,
  `artwork_price` varchar(200) NOT NULL,
  `artwork_desc` longtext NOT NULL,
  `artwork_cat_id` int(200) NOT NULL,
  `artwork_artist_id` int(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `artwork`
--

INSERT INTO `artwork` (`artwork_id`, `artwork_reg`, `artwork_type`, `artwork_price`, `artwork_desc`, `artwork_cat_id`, `artwork_artist_id`) VALUES
(1, 'ERICF07524', 'Hand Drawn', '5509', 'An Award winning painting.', 2, 1),
(2, 'LFPJB81436', 'CAD Design', '6709', 'Computer aided design, printed on old based emulsion. ', 2, 4),
(4, 'JKDXP50674', 'Potrait', '450', 'Exquisite potrait of Monalisa done with water based paint.', 4, 4),
(5, 'WEKHJ51740', 'Banner', '6754', 'High definition of George Washington banner artwork drawn using durable oil based painting.', 2, 2);

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `category_id` int(200) NOT NULL,
  `category_name` varchar(200) NOT NULL,
  `category_reg` varchar(200) NOT NULL,
  `category_desc` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`category_id`, `category_name`, `category_reg`, `category_desc`) VALUES
(2, 'Oil Based Paintings', 'FECJS24398', ' This category holds all paintings that are done by oil and glycerin painting inks. '),
(4, 'Water paintings', 'ZNAMU10325', 'Water paintings -  This category holds all paintings that are done by water based painting inks. ');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `login_id` varchar(200) NOT NULL,
  `login_username` varchar(200) NOT NULL,
  `login_password` varchar(200) NOT NULL,
  `login_rank` varchar(200) NOT NULL,
  `login_user_id` int(200) DEFAULT NULL,
  `login_admin_id` int(200) DEFAULT NULL,
  `login_artist_id` int(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`login_id`, `login_username`, `login_password`, `login_rank`, `login_user_id`, `login_admin_id`, `login_artist_id`) VALUES
('3b613fd615783a707f71dc7078f43c3a791f1e4c9b42', 'jasjnr766@gmail.com', 'a69681bcf334ae130217fea4505fd3c994f5683f', 'Administrator', NULL, 4, NULL),
('8114e93512a952c44d6cfb9b81b94aef40f7d2b5670c', 'evasosa@hotmail.com', 'a69681bcf334ae130217fea4505fd3c994f5683f', 'Artist', NULL, NULL, 2),
('9da1bdcfd215088dc0dfdde2efa66c0f3a2a4d464512', 'ddoekins@gmail.com', 'a69681bcf334ae130217fea4505fd3c994f5683f', 'User', 2, NULL, NULL),
('a07afa5ce58aaf032b193e92eedc96c5a4012b6de16b', 'vinvi87@hotmail.com', 'a69681bcf334ae130217fea4505fd3c994f5683f', 'Artist', NULL, NULL, 1),
('d4af7dd377fd1646a16d25b42e3e56d8c04d215a797c', 'sysadmin@gmail.com', 'a69681bcf334ae130217fea4505fd3c994f5683f', 'Administrator', NULL, 3, NULL),
('ea35ea30fef8f1e30af65ad5c65f4f8a14010884da6f', 'frankie676@gmail.com', 'a69681bcf334ae130217fea4505fd3c994f5683f', 'Artist', NULL, NULL, 4),
('f20922fdabb97098528fc470a387c0674cf1c48ca77c', 'jamesmatt@gmail.com', 'a69681bcf334ae130217fea4505fd3c994f5683f', 'User', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `payment_id` int(200) NOT NULL,
  `payment_mode` varchar(200) NOT NULL,
  `payment_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `payment_amount` varchar(200) NOT NULL,
  `payment_trans_code` varchar(200) NOT NULL,
  `payment_request_id` int(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`payment_id`, `payment_mode`, `payment_date`, `payment_amount`, `payment_trans_code`, `payment_request_id`) VALUES
(7, 'Mpesa', '2022-08-08 17:57:19', '6709', '2NJH4ZIWM0', 2),
(8, 'Credit / Debit Card', '2022-08-08 17:56:24', '5509', 'I3D1UOM59E', 3),
(9, 'Cash On Delivery', '2022-08-08 19:17:55', '6754', 'ZU7P9REO06', 4),
(10, 'Airtel Money', '2022-08-08 19:20:13', '6754', '6SXNGH3EPY', 5),
(11, 'Cheque', '2022-08-09 17:00:56', '5509', 'YA8X0IJERH', 6),
(12, 'Mpesa', '2022-08-09 17:08:09', '6754', 'NQMJVWUHFL', 7),
(13, 'Cash On Delivery', '2022-08-09 17:08:15', '6709', 'WOU81JHNLX', 8);

-- --------------------------------------------------------

--
-- Table structure for table `requests`
--

CREATE TABLE `requests` (
  `request_id` int(200) NOT NULL,
  `request_artwork_id` int(200) NOT NULL,
  `request_user_id` int(200) NOT NULL,
  `request_date` varchar(200) NOT NULL,
  `request_time` varchar(200) NOT NULL,
  `request_location` longtext NOT NULL,
  `request_status` varchar(200) NOT NULL DEFAULT 'Unpaid'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `requests`
--

INSERT INTO `requests` (`request_id`, `request_artwork_id`, `request_user_id`, `request_date`, `request_time`, `request_location`, `request_status`) VALUES
(2, 2, 2, '2022-08-29', '13:00', 'Compton, Long Beach, CA', 'Paid'),
(3, 1, 2, '2022-08-30', '12:00', 'Manhattan, NY', 'Paid'),
(4, 5, 1, '2022-08-15', '12:00', 'Karen, Nairobi', 'Paid'),
(5, 5, 2, '2022-08-15', '12:00', 'Manhattan, NY', 'Paid'),
(6, 1, 2, '2022-08-16', '05:00', 'Manhattan, NY', 'Paid'),
(7, 5, 1, '2022-08-16', '12:00', 'Machakos Town Along Lukindu Road.', 'Paid'),
(8, 2, 1, '2022-08-16', '12:00', 'Machakos Town Along Lukindu Road.', 'Paid');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(200) NOT NULL,
  `user_name` varchar(200) NOT NULL,
  `user_phone_number` varchar(200) NOT NULL,
  `user_email` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_name`, `user_phone_number`, `user_email`) VALUES
(1, 'James Mart', '+908-99423-99423', 'jamesmatt@gmail.com'),
(2, 'James D Doekins', '08-6675-776579', 'ddoekins@gmail.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `artist`
--
ALTER TABLE `artist`
  ADD PRIMARY KEY (`artist_id`);

--
-- Indexes for table `artwork`
--
ALTER TABLE `artwork`
  ADD PRIMARY KEY (`artwork_id`),
  ADD KEY `ArtworkArtistID` (`artwork_artist_id`),
  ADD KEY `ArtworkCategoryID` (`artwork_cat_id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`login_id`),
  ADD KEY `Login User ID` (`login_user_id`),
  ADD KEY `Login Admin ID` (`login_admin_id`),
  ADD KEY `Login Artist ID` (`login_artist_id`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`payment_id`),
  ADD KEY `Payment Request ID` (`payment_request_id`);

--
-- Indexes for table `requests`
--
ALTER TABLE `requests`
  ADD PRIMARY KEY (`request_id`),
  ADD KEY `Request Artwork ID` (`request_artwork_id`),
  ADD KEY `Request User ID` (`request_user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `artist`
--
ALTER TABLE `artist`
  MODIFY `artist_id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `artwork`
--
ALTER TABLE `artwork`
  MODIFY `artwork_id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `category_id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `payment_id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `requests`
--
ALTER TABLE `requests`
  MODIFY `request_id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `artwork`
--
ALTER TABLE `artwork`
  ADD CONSTRAINT `ArtworkArtistID` FOREIGN KEY (`artwork_artist_id`) REFERENCES `artist` (`artist_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `ArtworkCategoryID` FOREIGN KEY (`artwork_cat_id`) REFERENCES `category` (`category_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `login`
--
ALTER TABLE `login`
  ADD CONSTRAINT `Login Admin ID` FOREIGN KEY (`login_admin_id`) REFERENCES `admin` (`admin_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `Login Artist ID` FOREIGN KEY (`login_artist_id`) REFERENCES `artist` (`artist_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `Login User ID` FOREIGN KEY (`login_user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `payment`
--
ALTER TABLE `payment`
  ADD CONSTRAINT `Payment Request ID` FOREIGN KEY (`payment_request_id`) REFERENCES `requests` (`request_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `requests`
--
ALTER TABLE `requests`
  ADD CONSTRAINT `Request Artwork ID` FOREIGN KEY (`request_artwork_id`) REFERENCES `artwork` (`artwork_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `Request User ID` FOREIGN KEY (`request_user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
