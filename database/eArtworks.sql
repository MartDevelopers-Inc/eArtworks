-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Sep 02, 2022 at 12:50 PM
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
-- Database: `eArtworks`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `category_id` int(200) NOT NULL,
  `category_code` varchar(200) NOT NULL,
  `category_name` varchar(200) NOT NULL,
  `category_details` longtext NOT NULL,
  `category_delete_status` int(5) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`category_id`, `category_code`, `category_name`, `category_details`, `category_delete_status`) VALUES
(1, 'ART-X1BD', 'Animation Art', 'Derived from the Latin meaning \"to breathe life into\", animation is the visual art of creating a motion picture from a series of still drawings. Among the great twentieth century animators are J. Stuart Blackton, George McManus, Max Fleischer, and Walt Disney.', 0),
(2, 'ART-PG34', 'Architecture', 'Best understood as the applied art of building design. Historically has exerted significant influence on the development of fine art, through architectural styles like Gothic, Baroque and Neoclassical. For the origins of skyscraper design, see: 19th Century Architecture; for its characteristics and development, see: Skyscraper Architecture (1850-present); for technical details, see: Chicago School of Architecture; for historical context, see: American Architecture (1600-present).', 0),
(3, 'ART-A0IX', 'Art Brut', 'Painting, drawing, sculpture by artists on the margin of society, or in mental hospitals, or children. (English category is Outsider art.)', 0),
(4, 'ART-0V8A', 'Assemblage Art', 'A contemporary form of sculpture, comparable to collage, in which a work of art is built up or \"assembled\" from 3-D materials - typically \"found\" objects.', 0),
(5, 'ART-XIGK', 'Body Art', 'One of the oldest (and newest) forms - includes body painting and face painting, as well as tattoos, mime, \"living statues\" and (most recently) \"performances\" by artists like Marina Abramovic and Carole Schneemann.', 0),
(6, 'ART-71OA', 'Calligraphy', 'This fine art, practised widely in the Far East and among Islamic artists, is regarded by the Chinese as the highest form of art.', 0),
(7, 'ART-DZMN', 'Ceramics', 'A type of plastic art, ceramics refers to items made from clay and baked in a kiln. See ancient pottery from China and Greece, below. Two of the foremost European ceramicists are the English artist Bernard Howell Leach (1887-1979), and the Frenchman Camille Le Tallec (1908-91).', 0),
(8, 'ART-JOH3', 'Christian Art', 'This is mostly Biblical Art, or at least works derived from the Bible. It includes Protestant Reformation art and Catholic Counter-Reformation art, as well as Jewish themes. See also: Early Christian sculpture and also: Early Christian Art.', 0),
(9, 'ART-X2YQ', 'Collage', 'Composition consisting of various materials like newspaper cuttings, cardboard, photos, fabrics and the like, pasted to a board or canvas. May be combined with painting or drawings.', 0),
(10, 'ART-6Z21', 'Computer Art', 'All computer-generated forms of fine or applied art, including computer-controlled types. Also known as Digital, Cybernetic or Internet art.', 0),
(11, 'ART-K0JT', 'Conceptual Art', 'A contemporary art form that places primacy on the concept or idea behind a work of art, rather than the work itself. Leading conceptual artists include: Allan Kaprow (b.1927), and Joseph Beuys (1921-86) the former Professor of Monumental Sculpture at the Dusseldorf Academy, whose dedication earned him a retrospective at the Samuel R Guggenheim Museum (New York).', 0),
(12, 'ART-KYE5', 'Design (Artistic)', 'This refers to the plan involved in creating something according to a set of aesthetics. Examples of artistic design movements include: Art Nouveau, Art Deco, De Stijl, Bauhaus, Ulm Design School and Postmodernism.', 0),
(13, 'ART-87CS', 'Drawing', 'A drawing can be a complete work, or a type of preparatory sketching for a painting or sculpture. A central issue in fine art concerns the relative importance of drawing (line) versus colour.', 0),
(14, 'ART-102Y', 'Folk Art', 'Mostly crafts and utilitarian applied arts made by rural artisans.', 0),
(15, 'ART-IVO3', 'Graffiti Art', 'Contemporary form of street aerosol spray painting which emerged in East Coast American cities during the late 1960s/early 1970s. Famous graffiti artists include Jean-Michel Basquiat (1960-88), Keith Haring (1958-90) and Banksy.', 0),
(16, 'ART-52PT', 'Graphic Art', 'Types of visual expression defined more by line and tone (disegno), rather than colour (colorito). Includes drawing, cartoons, caricature art, comic strips, illustration, animation and calligraphy, as well as all forms of traditional printmaking. Also includes postmodernist styles of word art (text-based graphics).', 0),
(18, 'ART-E3Z6', ' Jewellery Art', 'Practised by goldsmiths, as well as other master-craftsmen like silversmiths, gemologists, diamond cutters/setters and lapidaries.', 0),
(19, 'ART-WKN9', 'Test Category Edited', 'This is a just a test category. Just Edited.', 1);

-- --------------------------------------------------------

--
-- Table structure for table `mailer_settings`
--

CREATE TABLE `mailer_settings` (
  `mailer_id` int(200) NOT NULL,
  `mail_host` varchar(200) NOT NULL,
  `mail_port` varchar(200) NOT NULL,
  `mail_protocol` varchar(200) NOT NULL,
  `mail_username` varchar(200) NOT NULL,
  `mail_password` varchar(200) NOT NULL,
  `mail_from_name` varchar(200) NOT NULL,
  `mail_from_email` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mailer_settings`
--

INSERT INTO `mailer_settings` (`mailer_id`, `mail_host`, `mail_port`, `mail_protocol`, `mail_username`, `mail_password`, `mail_from_name`, `mail_from_email`) VALUES
(1, 'bhs104.truehost.cloud', '465', 'ssl', 'sandbox@devlan.co.ke', '20Devlan@', 'eArtworks', 'sandbox@devlan.co.ke');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(200) NOT NULL,
  `order_user_id` int(200) NOT NULL,
  `order_product_id` int(200) NOT NULL,
  `order_code` varchar(200) NOT NULL,
  `order_date` varchar(200) NOT NULL,
  `order_qty` varchar(200) NOT NULL,
  `order_cost` varchar(200) NOT NULL,
  `order_status` varchar(200) NOT NULL,
  `order_payment_status` varchar(200) NOT NULL,
  `order_delete_status` int(5) NOT NULL DEFAULT 0,
  `order_estimated_delivery_date` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `order_user_id`, `order_product_id`, `order_code`, `order_date`, `order_qty`, `order_cost`, `order_status`, `order_payment_status`, `order_delete_status`, `order_estimated_delivery_date`) VALUES
(1, 14, 5, 'ORDER-90313', '2022-08-31', '1', '900000', 'Placed Orders', 'Pending', 0, '2022-09-3');

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `payment_id` int(200) NOT NULL,
  `payment_order_id` int(200) NOT NULL,
  `payment_means_id` int(200) NOT NULL,
  `payment_amount` varchar(200) NOT NULL,
  `payment_ref_code` varchar(200) NOT NULL,
  `payment_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `payment_delete_status` int(5) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`payment_id`, `payment_order_id`, `payment_means_id`, `payment_amount`, `payment_ref_code`, `payment_date`, `payment_delete_status`) VALUES
(1, 1, 1, '900000', 'HTGDASHTYFSDV', '2022-08-31 10:06:52', 0);

-- --------------------------------------------------------

--
-- Table structure for table `payment_means`
--

CREATE TABLE `payment_means` (
  `means_id` int(200) NOT NULL,
  `means_code` varchar(200) NOT NULL,
  `means_name` varchar(200) NOT NULL,
  `means_delete_status` int(5) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `payment_means`
--

INSERT INTO `payment_means` (`means_id`, `means_code`, `means_name`, `means_delete_status`) VALUES
(1, 'MPS', 'Mpesa', 0),
(2, 'DBC', 'Debit Card', 0),
(3, 'CRC', 'Credit Card', 0),
(4, 'COD', 'Cash On Delivery', 0);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int(200) NOT NULL,
  `product_category_id` int(200) NOT NULL,
  `product_seller_id` int(200) NOT NULL,
  `product_sku_code` varchar(200) NOT NULL,
  `product_name` longtext NOT NULL,
  `product_details` longtext NOT NULL,
  `product_qty_in_stock` varchar(200) NOT NULL,
  `product_price` varchar(200) NOT NULL,
  `product_image` longtext DEFAULT NULL,
  `product_delete_status` int(5) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `product_category_id`, `product_seller_id`, `product_sku_code`, `product_name`, `product_details`, `product_qty_in_stock`, `product_price`, `product_image`, `product_delete_status`) VALUES
(1, 13, 1, 'PRD-30082022-JM3VO', 'African memories of love', '“African Memories of Love”  is a Mixed Media Painting. Dimensions 140x200 cm | 55x78 in', '50', '1500', 'PRD-30082022-JM3VO-1661941547.jpg', 0),
(2, 13, 1, 'PRD-30082022-RP75O', 'Apple On Musk', '“Apple on Musk” is a  Mixed Media Painting. Dimensions 140x200 cm | 55x78 in', '30', '4500', 'PRD-30082022-RP75O-1661941669.jpg', 0),
(3, 13, 1, 'PRD-30082022-2ROQ9', 'Kissing', '“Kissing” is a  Mixed Media Painting. Dimensions  180x180 cm | 70x70 in', '5', '5000', 'PRD-30082022-2ROQ9-1661941720.jpg', 0),
(4, 11, 25, 'PRD-30082022-08BTG', 'Monalisa painting', 'The Mona Lisa  or Monna Lisa  French: Joconde [ʒɔkɔ̃d]) is a half-length portrait painting by Italian artist Leonardo da Vinci. Considered an archetypal masterpiece of the Italian Renaissance,[4][5] it has been described as \"the best known, the most visited, the most written about, the most sung about, the most parodied work of art in the world\".[6] The painting\'s novel qualities include the subject\'s enigmatic expression,[7] the monumentality of the composition, the subtle modelling of forms, and the atmospheric illusionism.[8]\r\n\r\nThe painting has been definitively identified to depict Italian noblewoman Lisa Gherardini,[9] the wife of Francesco del Giocondo. It is painted in oil on a white Lombardy poplar panel. Leonardo never gave the painting to the Giocondo family, and later it is believed he left it in his will to his favored apprentice Salaì.[10] It had been believed to have been painted between 1503 and 1506; however, Leonardo may have continued working on it as late as 1517. It was acquired by King Francis I of France and is now the property of the French Republic. It has been on permanent display at the Louvre in Paris since 1797.[11]\r\n\r\nThe Mona Lisa is one of the most valuable paintings in the world. It holds the Guinness World Record for the highest-known painting insurance valuation in history at US$100 million in 1962[12] (equivalent to $870 million in 2021). ', '5', '56000', 'PRD-30082022-08BTG-1661939033.jpg', 0),
(5, 13, 1, 'PRD-30082022-0FWSD', 'Girl with a Pearl Earring', 'Girl with a Pearl Earring is an oil painting by Dutch Golden Age painter Johannes Vermeer, dated c. 1665. Going by various names over the centuries, it became known by its present title towards the end of the 20th century after the earring worn by the girl portrayed there.', '50', '900000', 'PRD-30082022-0FWSD-1661861774.jpg', 0),
(6, 14, 25, 'PRD-30082022-Y80CZ', 'The Starry Night', 'The Starry Night is an oil-on-canvas painting by the Dutch Post-Impressionist painter Vincent van Gogh. Painted in June 1889, it depicts the view from the east-facing window of his asylum room at Saint-Rémy-de-Provence, just before sunrise, with the addition of an imaginary village', '10', '567000', 'PRD-30082022-Y80CZ-1661861906.jpg', 0),
(7, 14, 25, 'PRD-31082022-938PL', 'A Sunday Afternoon on the Island of La Grande Jatte', 'A Sunday Afternoon on the Island of La Grande Jatte was painted from 1884 to 1886 and is Georges Seurat\'s most famous work. A leading example of pointillist technique, executed on a large canvas, it is a founding work of the neo-impressionist movement.', '10', '67000', 'PRD-31082022-938PL-1661936631.jpeg', 0);

-- --------------------------------------------------------

--
-- Table structure for table `stores`
--

CREATE TABLE `stores` (
  `store_id` int(200) NOT NULL,
  `store_user_id` int(200) NOT NULL,
  `store_name` varchar(200) NOT NULL,
  `store_address` longtext NOT NULL,
  `store_status` varchar(200) NOT NULL,
  `store_delete_status` int(5) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `thirdparty_apis`
--

CREATE TABLE `thirdparty_apis` (
  `api_id` int(200) NOT NULL,
  `api_name` varchar(200) NOT NULL,
  `api_identification` longtext NOT NULL,
  `api_token` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(200) NOT NULL,
  `user_first_name` varchar(200) NOT NULL,
  `user_last_name` varchar(200) NOT NULL,
  `user_email` varchar(200) NOT NULL,
  `user_dob` varchar(200) NOT NULL,
  `user_phone_number` varchar(200) NOT NULL,
  `user_default_address` longtext NOT NULL,
  `user_password` varchar(200) NOT NULL,
  `user_password_reset_token` varchar(200) DEFAULT NULL,
  `user_email_status` varchar(200) NOT NULL DEFAULT 'Pending',
  `user_account_status` varchar(200) NOT NULL DEFAULT 'Active',
  `user_profile_picture` longtext DEFAULT NULL,
  `user_date_joined` timestamp NOT NULL DEFAULT current_timestamp(),
  `user_access_level` varchar(200) NOT NULL,
  `user_2fa_status` int(5) NOT NULL DEFAULT 0,
  `user_2fa_code` varchar(200) DEFAULT NULL,
  `user_delete_status` int(5) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_first_name`, `user_last_name`, `user_email`, `user_dob`, `user_phone_number`, `user_default_address`, `user_password`, `user_password_reset_token`, `user_email_status`, `user_account_status`, `user_profile_picture`, `user_date_joined`, `user_access_level`, `user_2fa_status`, `user_2fa_code`, `user_delete_status`) VALUES
(1, 'Mart', 'Martin', 'martinezmbithi@gmail.com', '1998-07-13', '0740847563', '120 Kikima', 'a69681bcf334ae130217fea4505fd3c994f5683f', NULL, 'Pending', 'Active', 'Customer_1661348959.jpg', '2022-08-19 06:51:39', 'Customer', 0, NULL, 0),
(8, 'Martin', 'Mbithi', 'martmbithi@protonmail.com', '2022-02-28', '+12523457895', '54-9865 Manhattan New York', '63982e54a7aeb0d89910475ba6dbd3ca6dd4e5a1', 'efc36e93442c17075aba2345', 'Confirmed', 'Active', 'Customer_1661408324.jpg', '2022-08-22 15:19:00', 'Administrator', 1, '1BP0TZ', 0),
(13, 'James', 'Doe', 'jamesdoe@gmail.com', '1998-07-13', '7234567890', '120 Localhost', '2a215231238ab859227b54b137dc6799a40fd39c', NULL, 'Pending', 'Active', NULL, '2022-08-27 04:29:00', 'Staff', 0, NULL, 0),
(14, 'Janet ', 'Monroe', 'janetmon89@gmail.com', '1996-08-15', '7901235648', '120 Beverley Hills California', '2a215231238ab859227b54b137dc6799a40fd39c', NULL, 'Pending', 'Active', NULL, '2022-08-27 04:29:00', 'Staff', 0, NULL, 0),
(15, 'Mr Hudson', 'Rivera', 'hudrivera76@hotmail.com', '1980-05-18', '7453328976', '54-9865 Manhattan New York', '2a215231238ab859227b54b137dc6799a40fd39c', NULL, 'Pending', 'Active', NULL, '2022-08-27 04:29:00', 'Staff', 0, NULL, 1),
(16, 'Sinkaj ', 'Pahn', 'sinpahn897@protonmail.com', '1998-09-15', '8677886387', '765 Driveway, Mumbai India', '2a215231238ab859227b54b137dc6799a40fd39c', NULL, 'Pending', 'Active', NULL, '2022-08-27 04:29:00', 'Staff', 0, NULL, 1),
(17, 'Hillary', 'Kagame', 'kagamehil876@gmail.com', '2022-08-01', '+255710988765', '127 Biashara Street. Kigali Rwanda', '67a74306b06d0c01624fe0d0249a570f4d093747', NULL, 'Pending', 'Active', NULL, '2022-08-29 08:46:56', 'Staff', 0, NULL, 0),
(18, 'Arthur ', 'Bailey', 'athurbailer@hotmail.com', '2022-08-02', '+89777654778', '120 Beverley Hills California', '67a74306b06d0c01624fe0d0249a570f4d093747', NULL, 'Pending', 'Active', 'Staff_1661763132.jpg', '2022-08-29 08:52:11', 'Staff', 0, NULL, 0),
(19, 'Juliani', 'Slink', 'slinkjulian86@protonmail.com', '1978-01-07', '+12565438343', '54-9865 Manhattan New York', '63982e54a7aeb0d89910475ba6dbd3ca6dd4e5a1', NULL, 'Pending', 'Active', 'Administrator_1661763386.jpg', '2022-08-29 08:56:25', 'Administrator', 0, NULL, 0),
(25, 'Amparo ', ' Stephens', 'bailey.swif3@yahoo.com', '1964-07-13', '502-664-7392', '1644 Coffman Alley Louisville, Kentucky(KY), 40202', '2a215231238ab859227b54b137dc6799a40fd39c', NULL, 'Pending', 'Active', NULL, '2022-08-29 10:14:12', 'Customer', 0, NULL, 0),
(26, 'Kevin ', 'Vazquez', 'cloyd2004@hotmail.com', '1996-07-13', '910-824-4189', '4176 Twin Willow Lane Fayetteville, North Carolina(NC), 28301', '2a215231238ab859227b54b137dc6799a40fd39c', NULL, 'Pending', 'Active', NULL, '2022-08-29 10:14:12', 'Customer', 0, NULL, 0),
(27, 'Fawn ', 'Lee', 't91ozfav12o@temporary-mail.net', '1948-08-23', '857-829-2178', '3544 Metz Lane Cambridge, Massachusetts(MA), 02141', '2a215231238ab859227b54b137dc6799a40fd39c', NULL, 'Pending', 'Active', NULL, '2022-08-29 10:14:12', 'Customer', 0, NULL, 0),
(28, 'Benjamin', 'Wong', '5tj18gvlty4@temporary-mail.net', '1971-07-09', '401-209-6737', '573 Diamond Cove, Providence, Rhode Island(RI), 02905', '2a215231238ab859227b54b137dc6799a40fd39c', NULL, 'Pending', 'Active', NULL, '2022-08-29 10:14:12', 'Customer', 0, NULL, 0),
(29, 'Andrew', 'Hamilton', 'jegoxor344@vasqa.com', '1956-01-01', '802-595-9018', '1211 Essex Court, South Burlington, Vermont(VT), 05403', '2a215231238ab859227b54b137dc6799a40fd39c', NULL, 'Pending', 'Active', 'Customer_1661771148.jpg', '2022-08-29 10:14:13', 'Customer', 0, NULL, 0),
(30, 'Janet ', ' Durbin', 'orval.kuhi1@yahoo.com', '1997-03-08', '562-313-2116', '3339 Rainbow Road Long Beach, California(CA), 90802', 'a69681bcf334ae130217fea4505fd3c994f5683f', NULL, 'Pending', 'Active', 'Customer_1661770129.jpg', '2022-08-29 10:48:48', 'Customer', 0, NULL, 0),
(31, 'Robert P ', 'Bluford', 'cordie.fa7@hotmail.com', '2000-11-07', '610-773-6697', '360 Cityview Drive,  Chester, Pennsylvania(PA), 19013', '67a74306b06d0c01624fe0d0249a570f4d093747', NULL, 'Pending', 'Active', 'Customer_1661770200.', '2022-08-29 10:49:59', 'Customer', 0, NULL, 1),
(32, 'Jean R ', 'Ortiz', 'jordi.legro0@hotmail.com', '1971-05-10', '336-402-2925', '2835 Bryan Street, Greensboro, North Carolina(NC), 27406', '2a215231238ab859227b54b137dc6799a40fd39c', NULL, 'Pending', 'Active', NULL, '2022-08-29 10:55:56', 'Customer', 0, NULL, 0),
(33, 'Juan ', 'Demarco', 'thaddeus_johns@yahoo.com', '1983-12-05', '832-426-8655', '2887 Worthington Drive, Richardson, Texas(TX), 75081', '2a215231238ab859227b54b137dc6799a40fd39c', NULL, 'Pending', 'Active', 'Customer_1661770676.jpg', '2022-08-29 10:57:55', 'Customer', 0, NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `wishlists`
--

CREATE TABLE `wishlists` (
  `wishlist_id` int(200) NOT NULL,
  `wishlist_user_id` int(200) NOT NULL,
  `wishlist_product_id` int(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `mailer_settings`
--
ALTER TABLE `mailer_settings`
  ADD PRIMARY KEY (`mailer_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `Order User ID` (`order_user_id`),
  ADD KEY `Order Product ID` (`order_product_id`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`payment_id`),
  ADD KEY `Payment Order ID` (`payment_order_id`),
  ADD KEY `Payment Means ID` (`payment_means_id`);

--
-- Indexes for table `payment_means`
--
ALTER TABLE `payment_means`
  ADD PRIMARY KEY (`means_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`),
  ADD KEY `Product Category ID` (`product_category_id`),
  ADD KEY `Product Seller ID` (`product_seller_id`);

--
-- Indexes for table `stores`
--
ALTER TABLE `stores`
  ADD PRIMARY KEY (`store_id`),
  ADD KEY `Store Owner ID` (`store_user_id`);

--
-- Indexes for table `thirdparty_apis`
--
ALTER TABLE `thirdparty_apis`
  ADD PRIMARY KEY (`api_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `wishlists`
--
ALTER TABLE `wishlists`
  ADD PRIMARY KEY (`wishlist_id`),
  ADD KEY `WishList User ID` (`wishlist_user_id`),
  ADD KEY `Wishlist Product ID` (`wishlist_product_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `category_id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `mailer_settings`
--
ALTER TABLE `mailer_settings`
  MODIFY `mailer_id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `payment_id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `payment_means`
--
ALTER TABLE `payment_means`
  MODIFY `means_id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `stores`
--
ALTER TABLE `stores`
  MODIFY `store_id` int(200) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `thirdparty_apis`
--
ALTER TABLE `thirdparty_apis`
  MODIFY `api_id` int(200) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `wishlists`
--
ALTER TABLE `wishlists`
  MODIFY `wishlist_id` int(200) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `Order Product ID` FOREIGN KEY (`order_product_id`) REFERENCES `products` (`product_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `Order User ID` FOREIGN KEY (`order_user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `payments`
--
ALTER TABLE `payments`
  ADD CONSTRAINT `Payment Means ID` FOREIGN KEY (`payment_means_id`) REFERENCES `payment_means` (`means_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `Payment Order ID` FOREIGN KEY (`payment_order_id`) REFERENCES `orders` (`order_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `Product Category ID` FOREIGN KEY (`product_category_id`) REFERENCES `categories` (`category_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `Product Seller ID` FOREIGN KEY (`product_seller_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `stores`
--
ALTER TABLE `stores`
  ADD CONSTRAINT `Store Owner ID` FOREIGN KEY (`store_user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `wishlists`
--
ALTER TABLE `wishlists`
  ADD CONSTRAINT `WishList User ID` FOREIGN KEY (`wishlist_user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `Wishlist Product ID` FOREIGN KEY (`wishlist_product_id`) REFERENCES `products` (`product_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
