-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Sep 24, 2022 at 07:39 AM
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
(18, 'ART-E3Z6', ' Jewellery Art', 'Practised by goldsmiths, as well as other master-craftsmen like silversmiths, gemologists, diamond cutters/setters and lapidaries.', 0);

-- --------------------------------------------------------

--
-- Table structure for table `crypto_payments`
--

CREATE TABLE `crypto_payments` (
  `paymentID` int(11) UNSIGNED NOT NULL,
  `boxID` int(11) UNSIGNED NOT NULL DEFAULT 0,
  `boxType` enum('paymentbox','captchabox') NOT NULL,
  `orderID` varchar(50) NOT NULL DEFAULT '',
  `userID` varchar(50) NOT NULL DEFAULT '',
  `countryID` varchar(3) NOT NULL DEFAULT '',
  `coinLabel` varchar(6) NOT NULL DEFAULT '',
  `amount` double(20,8) NOT NULL DEFAULT 0.00000000,
  `amountUSD` double(20,8) NOT NULL DEFAULT 0.00000000,
  `unrecognised` tinyint(1) UNSIGNED NOT NULL DEFAULT 0,
  `addr` varchar(34) NOT NULL DEFAULT '',
  `txID` char(64) NOT NULL DEFAULT '',
  `txDate` datetime DEFAULT NULL,
  `txConfirmed` tinyint(1) UNSIGNED NOT NULL DEFAULT 0,
  `txCheckDate` datetime DEFAULT NULL,
  `processed` tinyint(1) UNSIGNED NOT NULL DEFAULT 0,
  `processedDate` datetime DEFAULT NULL,
  `recordCreated` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

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
(1, 'your_host.com', '465', 'ssl', 'yourmailer.com', 'your_password', 'eArtworks', 'eartworks@mail.com');

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
(61, 35, 1, 'OBITY41508', '2022-09-22', '1', '150', 'Out For Delivery', 'Paid', 0, '2022-09-29'),
(62, 35, 3, 'OBITY41508', '2022-09-22', '1', '500', 'Out For Delivery', 'Paid', 0, '2022-09-29');

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `payment_id` int(200) NOT NULL,
  `payment_order_code` varchar(200) NOT NULL,
  `payment_means_id` int(200) NOT NULL,
  `payment_amount` varchar(200) NOT NULL,
  `payment_ref_code` varchar(200) DEFAULT NULL,
  `payment_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `payment_delete_status` int(5) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`payment_id`, `payment_order_code`, `payment_means_id`, `payment_amount`, `payment_ref_code`, `payment_date`, `payment_delete_status`) VALUES
(27, 'OBITY41508', 4, '2150', 'M4JAU6IQSG', '2022-09-22 05:42:24', 0);

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
(2, 'DBC', 'Debit / Credit Card', 0),
(4, 'COD', 'Cash', 0),
(5, 'CC', 'Cryptocurrency', 0),
(9, 'MPS', 'Mobile Payment', 0);

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
  `product_delete_status` int(5) NOT NULL DEFAULT 0,
  `product_available_from` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `product_category_id`, `product_seller_id`, `product_sku_code`, `product_name`, `product_details`, `product_qty_in_stock`, `product_price`, `product_image`, `product_delete_status`, `product_available_from`) VALUES
(1, 13, 1, 'PRD-30082022-JM3VO', 'African memories of love', '“African Memories of Love”  is a Mixed Media Painting. Dimensions 140x200 cm | 55x78 in', '26', '150', 'PRD-30082022-JM3VO-1661941547.jpg', 0, '2022-09-17 09:35am'),
(2, 13, 1, 'PRD-30082022-RP75O', 'Apple On Musk', '“Apple on Musk” is a  Mixed Media Painting. Dimensions 140x200 cm | 55x78 in', '23', '450', 'PRD-30082022-RP75O-1661941669.jpg', 0, '2022-09-17 09:36am'),
(3, 13, 1, 'PRD-30082022-2ROQ9', 'Kissing', '“Kissing” is a  Mixed Media Painting. Dimensions  180x180 cm | 70x70 in', '2', '500', 'PRD-30082022-2ROQ9-1661941720.jpg', 0, '2022-09-17 09:37am'),
(4, 11, 25, 'PRD-30082022-08BTG', 'Monalisa painting', 'The Mona Lisa  or Monna Lisa  French: Joconde [ʒɔkɔ̃d]) is a half-length portrait painting by Italian artist Leonardo da Vinci. Considered an archetypal masterpiece of the Italian Renaissance,[4][5] it has been described as \"the best known, the most visited, the most written about, the most sung about, the most parodied work of art in the world\".[6] The painting\'s novel qualities include the subject\'s enigmatic expression,[7] the monumentality of the composition, the subtle modelling of forms, and the atmospheric illusionism.[8]\r\n\r\nThe painting has been definitively identified to depict Italian noblewoman Lisa Gherardini,[9] the wife of Francesco del Giocondo. It is painted in oil on a white Lombardy poplar panel. Leonardo never gave the painting to the Giocondo family, and later it is believed he left it in his will to his favored apprentice Salaì.[10] It had been believed to have been painted between 1503 and 1506; however, Leonardo may have continued working on it as late as 1517. It was acquired by King Francis I of France and is now the property of the French Republic. It has been on permanent display at the Louvre in Paris since 1797.[11]\r\n\r\nThe Mona Lisa is one of the most valuable paintings in the world. It holds the Guinness World Record for the highest-known painting insurance valuation in history at US$100 million in 1962[12] (equivalent to $870 million in 2021). ', '3', '650', 'PRD-30082022-08BTG-1661939033.jpg', 0, '2022-09-17 09:37am'),
(5, 13, 1, 'PRD-30082022-0FWSD', 'Girl with a Pearl Earring', 'Girl with a Pearl Earring is an oil painting by Dutch Golden Age painter Johannes Vermeer, dated c. 1665. Going by various names over the centuries, it became known by its present title towards the end of the 20th century after the earring worn by the girl portrayed there.', '32', '900', 'PRD-30082022-0FWSD-1661861774.jpg', 0, '2022-09-17 09:37am'),
(7, 14, 25, 'PRD-31082022-938PL', 'A Sunday Afternoon on the Island of La Grande Jatte', 'A Sunday Afternoon on the Island of La Grande Jatte was painted from 1884 to 1886 and is Georges Seurat\'s most famous work. A leading example of pointillist technique, executed on a large canvas, it is a founding work of the neo-impressionist movement.', '6', '670', 'PRD-31082022-938PL-1661936631.jpeg', 0, '2022-09-17 09:37am'),
(9, 10, 35, 'PRD-17092022-0DKRW', 'Devlan Broken Logo', 'A computer generated art, a 3d design of Devlan solutions logo with broken glass effect. Elegant for showcase in your office or apartment.', '6', '500', 'PRD-17092022-0DKRW-1663392876.jpg', 0, '2022-09-17 09:36am'),
(10, 10, 35, 'PRD-17092022-G6TP5', 'Devlan Peeled Logo', 'Curious about peeled logos handing on your apartment or workspace?. This computer designed artwork has a peeled plaster on wall exposing Devlan Solutions LTD logo.', '7', '4500', 'PRD-17092022-G6TP5-1663393781.jpg', 0, '2022-09-17 09:36am'),
(11, 10, 35, 'PRD-17092022-KPF3M', 'Devlan Town Paper Mockup', 'A computer generated art, a 3d design of Devlan solutions logo with town paper effect. Elegant for showcase in your office or apartment.', '54', '200', 'PRD-17092022-KPF3M-1663394900.jpg', 0, '2022-09-17 09:36am'),
(12, 7, 1, 'PRD-22092022-M4BK6', 'Devlan Plaster Mockup', 'Obsessed with quality wall plaster images mock ups?, This artwork is one of its kind, Crafted with hightech skill sets, it will look good on your office wall, apartment or your home.', '10', '560', 'PRD-22092022-M4BK6-1663827778.jpg', 0, '2022-09-23 12:00am');

-- --------------------------------------------------------

--
-- Table structure for table `shopping_cart`
--

CREATE TABLE `shopping_cart` (
  `cart_id` int(200) NOT NULL,
  `cart_user_id` int(200) NOT NULL,
  `cart_product_id` int(200) NOT NULL,
  `cart_qty` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `shopping_cart`
--

INSERT INTO `shopping_cart` (`cart_id`, `cart_user_id`, `cart_product_id`, `cart_qty`) VALUES
(18, 1, 1, '4'),
(19, 1, 2, '4'),
(20, 1, 3, '4');

-- --------------------------------------------------------

--
-- Table structure for table `stkpush`
--

CREATE TABLE `stkpush` (
  `id` int(11) NOT NULL,
  `merchantRequestID` varchar(254) DEFAULT NULL,
  `checkoutRequestID` varchar(254) DEFAULT NULL,
  `resultCode` varchar(254) DEFAULT NULL,
  `resultDesc` varchar(254) DEFAULT NULL,
  `amount` varchar(11) DEFAULT NULL,
  `mpesaReceiptNumber` varchar(254) DEFAULT NULL,
  `transactionDate` varchar(254) DEFAULT NULL,
  `phoneNumber` varchar(254) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
-- Table structure for table `system_litecms`
--

CREATE TABLE `system_litecms` (
  `system_id` int(200) NOT NULL,
  `system_toc` longtext DEFAULT NULL,
  `system_faq` longtext DEFAULT NULL,
  `system_about` longtext DEFAULT NULL,
  `system_contact` longtext DEFAULT NULL,
  `system_email` longtext DEFAULT NULL,
  `system_address` longtext DEFAULT NULL,
  `system_facebook_url` longtext DEFAULT NULL,
  `system_twittwer_url` longtext DEFAULT NULL,
  `system_instagram_url` longtext DEFAULT NULL,
  `system_linkedin_url` longtext DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `system_litecms`
--

INSERT INTO `system_litecms` (`system_id`, `system_toc`, `system_faq`, `system_about`, `system_contact`, `system_email`, `system_address`, `system_facebook_url`, `system_twittwer_url`, `system_instagram_url`, `system_linkedin_url`) VALUES
(1, '<h1 id=\"isPasted\">Contents</h1><p>&nbsp; &nbsp;</p><p>1. Introduction</p><p>&nbsp; &nbsp;</p><p>2. Registration and account</p><p>&nbsp; &nbsp;</p><p>3. Terms and conditions of sale</p><p>&nbsp; &nbsp;</p><p>4. Returns and refunds</p><p>&nbsp; &nbsp;</p><p>5. Payments</p><p>&nbsp; &nbsp;</p><p><br></p><p>&nbsp; &nbsp;</p><h3>1. Introduction</h3><p>&nbsp; &nbsp;</p><p>&nbsp; &nbsp; &nbsp; &nbsp;1.1. &rdquo;eArtworks&rdquo; is the trading name for the eArtworks group companies listed at &nbsp; &nbsp; &nbsp; &nbsp;Appendix 1. Each eArtworks group company (&ldquo;eArtworks&rdquo; or &ldquo;we&rdquo;) operates an e-commerce &nbsp; &nbsp; &nbsp; &nbsp;platform consisting of a website and mobile application (&ldquo;marketplace&rdquo;), &nbsp; &nbsp; &nbsp; &nbsp;together with supporting IT, logistics and payment infrastructure, for the sale &nbsp; &nbsp; &nbsp; &nbsp;and purchase of consumer products and services (&ldquo;products&rdquo;) in its allocated &nbsp; &nbsp; &nbsp; &nbsp;territory as defined at Appendix 1 (&ldquo;territory&rdquo;). &nbsp; &nbsp;</p><p>&nbsp; &nbsp;</p><p>1.2. These general terms and conditions shall apply to buyers and sellers on &nbsp; &nbsp; &nbsp; &nbsp;the marketplace and shall govern your use of the marketplace and related &nbsp; &nbsp; &nbsp; &nbsp;services. &nbsp; &nbsp;</p><p>&nbsp; &nbsp;</p><p>&nbsp; &nbsp; &nbsp; &nbsp;1.3. By using our marketplace, you accept these general terms and conditions in &nbsp; &nbsp; &nbsp; &nbsp;full. If you disagree with these general terms and conditions or any part of &nbsp; &nbsp; &nbsp; &nbsp;these general terms and conditions, you must not use our marketplace. &nbsp; &nbsp;</p><p>&nbsp; &nbsp;</p><p>1.4. If you use our marketplace in the course of a business or other &nbsp; &nbsp; &nbsp; &nbsp;organizational project, then by so doing you:</p><p>&nbsp; &nbsp;</p><p>&nbsp; &nbsp; &nbsp; &nbsp;1.4.1. confirm that you have obtained the necessary authority to agree to these &nbsp; &nbsp; &nbsp; &nbsp;general terms and conditions; &nbsp; &nbsp;</p><p>&nbsp; &nbsp;</p><p>&nbsp; &nbsp; &nbsp; &nbsp;1.4.2. bind both yourself and the person, company or other legal entity that &nbsp; &nbsp; &nbsp; &nbsp;operates that business or organizational project, to these general terms and &nbsp; &nbsp; &nbsp; &nbsp;conditions; and &nbsp; &nbsp;</p><p>&nbsp; &nbsp;</p><p>&nbsp; &nbsp; &nbsp; &nbsp;1.4.3. agree that &quot;you&quot; in these general terms and conditions shall reference &nbsp; &nbsp; &nbsp; &nbsp;both the individual user and the relevant person, company or legal entity unless &nbsp; &nbsp; &nbsp; &nbsp;the context requires otherwise. &nbsp; &nbsp;</p><p>&nbsp; &nbsp;</p><h3>2. Registration and account</h3><p>&nbsp; &nbsp;</p><p>2.1. &nbsp; &nbsp; &nbsp; &nbsp;<strong>You may not register with our marketplace if you are under 18 years of age &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;(by using our marketplace or agreeing to these general terms and conditions, you &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;warrant and represent to us that you are at least 18 years of age). &nbsp; &nbsp; &nbsp; &nbsp;</strong>&nbsp; &nbsp;&nbsp;</p><p>&nbsp; &nbsp;</p><p>2.2. &nbsp; &nbsp; &nbsp; &nbsp;<strong>If you register for an account with our marketplace, you will be asked to &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;provide an email address/user ID and password and you agree to:</strong>&nbsp; &nbsp;&nbsp;</p><p>&nbsp; &nbsp;</p><p>&nbsp; &nbsp; &nbsp; &nbsp;2.2.1 keep your password confidential; &nbsp; &nbsp;</p><p>&nbsp; &nbsp;</p><p>&nbsp; &nbsp; &nbsp; &nbsp;2.2.2 notify us in writing immediately (using our contact details provided at &nbsp; &nbsp; &nbsp; &nbsp;section 26) if you become aware of any disclosure of your password; and &nbsp; &nbsp;</p><p>&nbsp; &nbsp;</p><p>&nbsp; &nbsp; &nbsp; &nbsp;2.2.3 be responsible for any activity on our marketplace arising out of any &nbsp; &nbsp; &nbsp; &nbsp;failure to keep your password confidential, and that you may be held liable for &nbsp; &nbsp; &nbsp; &nbsp;any losses arising out of such a failure. &nbsp; &nbsp;</p><p>&nbsp; &nbsp;</p><h3>2.3. Your account shall be used exclusively by you and you shall not &nbsp; &nbsp; &nbsp; &nbsp;transfer your account to any third party. If you authorize any third party to &nbsp; &nbsp; &nbsp; &nbsp;manage your account on your behalf this shall be at your own risk. &nbsp; &nbsp;</h3><p>&nbsp; &nbsp;</p><h3>2.4. We may suspend or cancel your account, and/or edit your account &nbsp; &nbsp; &nbsp; &nbsp;details, at any time in our sole discretion and without notice or explanation, &nbsp; &nbsp; &nbsp; &nbsp;providing that if we cancel any products or services you have paid for but not &nbsp; &nbsp; &nbsp; &nbsp;received, and you have not breached these general terms and conditions, we will &nbsp; &nbsp; &nbsp; &nbsp;refund you in respect of the same. &nbsp; &nbsp;</h3><p>&nbsp; &nbsp;</p><p>2.5. You may cancel your account on our marketplace by contacting us as &nbsp; &nbsp; &nbsp; &nbsp;provided at section 26. &nbsp; &nbsp;</p><p>&nbsp; &nbsp;</p><h3>3. Terms and conditions of sale &nbsp; &nbsp;</h3><p>&nbsp; &nbsp;</p><p>3.1. You acknowledge and agree that:</p><p>&nbsp; &nbsp;</p><p>3.1.1. the marketplace provides an online location for sellers &nbsp; &nbsp; &nbsp; &nbsp;to sell and buyers to purchase products; &nbsp; &nbsp;</p><p>&nbsp; &nbsp;</p><p>&nbsp; &nbsp; &nbsp; &nbsp;3.1.2. we shall accept binding sales, on behalf of sellers, but (unless eArtworks is &nbsp; &nbsp; &nbsp; &nbsp;indicated as the seller) eArtworks is not a party to the transaction between the &nbsp; &nbsp; &nbsp; &nbsp;seller and the buyer; and &nbsp; &nbsp;</p><p>&nbsp; &nbsp;</p><p>&nbsp; &nbsp; &nbsp; &nbsp;3.1.3. a contract for the sale and purchase of a product or products will come &nbsp; &nbsp; &nbsp; &nbsp;into force between the buyer and seller, and accordingly you commit to buying or &nbsp; &nbsp; &nbsp; &nbsp;selling the relevant product or products, upon the buyer&rsquo;s confirmation of &nbsp; &nbsp; &nbsp; &nbsp;purchase via the marketplace. &nbsp; &nbsp;</p><p>&nbsp; &nbsp;</p><p>3.2. Subject to these general terms and conditions, the seller&rsquo;s terms of business shall govern the contract for sale and purchase between the buyer and the seller. Not with standing this, the following provisions will be incorporated into the contract of sale and purchase between the buyer and the seller: &nbsp; &nbsp;</p><p>&nbsp; &nbsp;</p><p>&nbsp; &nbsp; &nbsp; &nbsp;3.2.1. the price for a product will be as stated in the relevant product &nbsp; &nbsp; &nbsp; &nbsp;listing; &nbsp; &nbsp;</p><p>&nbsp; &nbsp;</p><p>&nbsp; &nbsp; &nbsp; &nbsp;3.2.2. the price for the product must include all taxes and comply with &nbsp; &nbsp; &nbsp; &nbsp;applicable laws in force from time to time; &nbsp; &nbsp;</p><p>&nbsp; &nbsp;</p><p>&nbsp; &nbsp; &nbsp; &nbsp;3.2.3. delivery charges, packaging charges, handling charges, administrative &nbsp; &nbsp; &nbsp; &nbsp;charges, insurance costs, other ancillary costs and charges, where applicable, &nbsp; &nbsp; &nbsp; &nbsp;will only be payable by the buyer if this is expressly and clearly stated in the &nbsp; &nbsp; &nbsp; &nbsp;product listing; and delivery of digital products may be made electronically; &nbsp; &nbsp;</p><p>&nbsp; &nbsp;</p><p>&nbsp; &nbsp; &nbsp; &nbsp;3.2.4. products must be of satisfactory quality, fit and safe for any purpose &nbsp; &nbsp; &nbsp; &nbsp;specified in, and conform in all material respects to, the product listing and &nbsp; &nbsp; &nbsp; &nbsp;any other description of the products supplied or made available by the seller &nbsp; &nbsp; &nbsp; &nbsp;to the buyer; and &nbsp; &nbsp;</p><p>&nbsp; &nbsp;</p><p>3.2.5. in respect of physical products sold, the seller &nbsp; &nbsp; &nbsp; &nbsp;warrants that the seller has good title to, and is the sole legal and beneficial &nbsp; &nbsp; &nbsp; &nbsp;owner of, the products and/or has the right to supply the products pursuant to &nbsp; &nbsp; &nbsp; &nbsp;this agreement, and that the products are not subject to any third party rights &nbsp; &nbsp; &nbsp; &nbsp;or restrictions including in respect of third party intellectual property rights &nbsp; &nbsp; &nbsp; &nbsp;and/or any criminal, insolvency or tax investigation or proceedings; and in &nbsp; &nbsp; &nbsp; &nbsp;respect of digital products the seller warrants that the seller has the right to &nbsp; &nbsp; &nbsp; &nbsp;supply the digital products to the buyer.</p><p>&nbsp; &nbsp;</p><h3>4. Returns and refunds</h3><p>&nbsp; &nbsp;</p><p>4.1. Returns of products by buyers and acceptance of returned products by &nbsp; &nbsp; &nbsp; &nbsp;sellers shall be managed by us in accordance with the returns page on the &nbsp; &nbsp; &nbsp; &nbsp;marketplace, as may be amended from time to time. Acceptance of returns shall be &nbsp; &nbsp; &nbsp; &nbsp;in our discretion, subject to compliance with applicable laws of the territory.</p><p>&nbsp; &nbsp;</p><p>4.2. Refunds in respect of returned products shall be managed in accordance &nbsp; &nbsp; &nbsp; &nbsp;with the refunds page on the marketplace, as may be amended from time to time. &nbsp; &nbsp; &nbsp; &nbsp;Our rules on refunds shall be exercised in our discretion, subject to applicable &nbsp; &nbsp; &nbsp; &nbsp;laws of the territory. We may offer refunds, in our discretion:</p><p>&nbsp; &nbsp;</p><p>&nbsp; &nbsp; &nbsp; &nbsp;4.2.1. in respect of the product price; &nbsp; &nbsp;</p><p>&nbsp; &nbsp;</p><p>&nbsp; &nbsp; &nbsp; &nbsp;4.2.2. local and/or international shipping fees (as stated on the refunds page); &nbsp; &nbsp; &nbsp; &nbsp;and &nbsp; &nbsp;</p><p>&nbsp; &nbsp;</p><p>&nbsp; &nbsp; &nbsp; &nbsp;4.2.3. by way of store credits, vouchers, mobile money transfer, bank transfers &nbsp; &nbsp; &nbsp; &nbsp;or such other methods as we may determine from time to time. &nbsp; &nbsp;</p><p>&nbsp; &nbsp;</p><p>4.3. Returned products shall be accepted and refunds issued by eArtworks, acting &nbsp; &nbsp; &nbsp; &nbsp;for and on behalf of the seller. Not with standing paragraphs 4.1 and 4.2 above, &nbsp; &nbsp; &nbsp; &nbsp;in respect of digital products or services and fresh food, Jumia shall issue &nbsp; &nbsp; &nbsp; &nbsp;refunds in respect of failures in delivery only. Refunds of payment for such &nbsp; &nbsp; &nbsp; &nbsp;products for any other reasons shall be subject to the seller&rsquo;s terms and &nbsp; &nbsp; &nbsp; &nbsp;conditions of sale.</p><p>&nbsp; &nbsp;</p><p>4.4. Changes to our returns page or refunds page shall be effective in &nbsp; &nbsp; &nbsp; &nbsp;respect of all purchases made from the date of publication of the change on our &nbsp; &nbsp; &nbsp; &nbsp;website. &nbsp; &nbsp;</p><p>&nbsp; &nbsp;</p><h3>5. Payments</h3><p>&nbsp; &nbsp;</p><p>5.1. You must make payments due under these general terms and conditions in &nbsp; &nbsp; &nbsp; &nbsp;accordance with the Payments Information and Guidelines on the marketplace. 6. &nbsp; &nbsp; &nbsp; &nbsp;Store Credit</p><p>&nbsp; &nbsp;</p><p><br></p>', '<h1 id=\"isPasted\">Contents</h1><p>&nbsp; &nbsp;</p><p>1. Introduction</p><p>&nbsp; &nbsp;</p><p>2. Registration and account</p><p>&nbsp; &nbsp;</p><p>3. Terms and conditions of sale</p><p>&nbsp; &nbsp;</p><p>4. Returns and refunds</p><p>&nbsp; &nbsp;</p><p>5. Payments</p><p>&nbsp; &nbsp;</p><p>6. Store Credit</p><p>&nbsp; &nbsp;</p><p>7. Promotions</p><p>&nbsp; &nbsp;</p><p>8. Rules about your content</p><p>&nbsp; &nbsp;</p><p>9. Our rights to use your content</p><p>&nbsp; &nbsp;</p><p>10. Use of website and mobile applications</p><p>&nbsp; &nbsp;</p><p>11. Copyright and trademarks</p><p>&nbsp; &nbsp;</p><p>12. Data privacy</p><p>&nbsp; &nbsp;</p><p>13. Due diligence and audit rights</p><p>&nbsp; &nbsp;</p><p>14. Jumia&rsquo;s role as a marketplace</p><p>&nbsp; &nbsp;</p><p>15. Limitations and exclusions of liability</p><p>&nbsp; &nbsp;</p><p>16. Indemnification</p><p>&nbsp; &nbsp;</p><p>17. Breaches of these general terms and conditions</p><p>&nbsp; &nbsp;</p><p>18. Entire agreement &nbsp; &nbsp;</p><p>&nbsp; &nbsp;</p><p>19. Hierarchy</p><p>&nbsp; &nbsp;</p><p>20. Variation</p><p>&nbsp; &nbsp;</p><p>21. No waiver</p><p>&nbsp; &nbsp;</p><p>22. Severability</p><p>&nbsp; &nbsp;</p><p>23. Assignment</p><p>&nbsp; &nbsp;</p><p>24. Third party rights</p><p>&nbsp; &nbsp;</p><p>25. Law and jurisdiction &nbsp; &nbsp;</p><p>&nbsp; &nbsp;</p><p>26. Our company details and notices</p><p>&nbsp; &nbsp;</p><h3>1. Introduction</h3><p>&nbsp; &nbsp;</p><p>&nbsp; &nbsp; &nbsp; &nbsp;1.1. &rdquo;Jumia&rdquo; is the trading name for the Jumia group companies listed at &nbsp; &nbsp; &nbsp; &nbsp;Appendix 1. Each Jumia group company (&ldquo;Jumia&rdquo; or &ldquo;we&rdquo;) operates an e-commerce &nbsp; &nbsp; &nbsp; &nbsp;platform consisting of a website and mobile application (&ldquo;marketplace&rdquo;), &nbsp; &nbsp; &nbsp; &nbsp;together with supporting IT, logistics and payment infrastructure, for the sale &nbsp; &nbsp; &nbsp; &nbsp;and purchase of consumer products and services (&ldquo;products&rdquo;) in its allocated &nbsp; &nbsp; &nbsp; &nbsp;territory as defined at Appendix 1 (&ldquo;territory&rdquo;). &nbsp; &nbsp;</p><p>&nbsp; &nbsp;</p><p>1.2. These general terms and conditions shall apply to buyers and sellers on &nbsp; &nbsp; &nbsp; &nbsp;the marketplace and shall govern your use of the marketplace and related &nbsp; &nbsp; &nbsp; &nbsp;services. &nbsp; &nbsp;</p><p>&nbsp; &nbsp;</p><p>&nbsp; &nbsp; &nbsp; &nbsp;1.3. By using our marketplace, you accept these general terms and conditions in &nbsp; &nbsp; &nbsp; &nbsp;full. If you disagree with these general terms and conditions or any part of &nbsp; &nbsp; &nbsp; &nbsp;these general terms and conditions, you must not use our marketplace. &nbsp; &nbsp;</p><p>&nbsp; &nbsp;</p><p>1.4. If you use our marketplace in the course of a business or other &nbsp; &nbsp; &nbsp; &nbsp;organizational project, then by so doing you:</p><p>&nbsp; &nbsp;</p><p>&nbsp; &nbsp; &nbsp; &nbsp;1.4.1. confirm that you have obtained the necessary authority to agree to these &nbsp; &nbsp; &nbsp; &nbsp;general terms and conditions; &nbsp; &nbsp;</p><p>&nbsp; &nbsp;</p><p>&nbsp; &nbsp; &nbsp; &nbsp;1.4.2. bind both yourself and the person, company or other legal entity that &nbsp; &nbsp; &nbsp; &nbsp;operates that business or organizational project, to these general terms and &nbsp; &nbsp; &nbsp; &nbsp;conditions; and &nbsp; &nbsp;</p><p>&nbsp; &nbsp;</p><p>&nbsp; &nbsp; &nbsp; &nbsp;1.4.3. agree that &quot;you&quot; in these general terms and conditions shall reference &nbsp; &nbsp; &nbsp; &nbsp;both the individual user and the relevant person, company or legal entity unless &nbsp; &nbsp; &nbsp; &nbsp;the context requires otherwise. &nbsp; &nbsp;</p><p>&nbsp; &nbsp;</p><h3>2. Registration and account</h3><p>&nbsp; &nbsp;</p><p>2.1. &nbsp; &nbsp; &nbsp; &nbsp;<strong>You may not register with our marketplace if you are under 18 years of age &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;(by using our marketplace or agreeing to these general terms and conditions, you &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;warrant and represent to us that you are at least 18 years of age). &nbsp; &nbsp; &nbsp; &nbsp;</strong> &nbsp; &nbsp;</p><p>&nbsp; &nbsp;</p><p>2.2. &nbsp; &nbsp; &nbsp; &nbsp;<strong>If you register for an account with our marketplace, you will be asked to &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;provide an email address/user ID and password and you agree to:</strong> &nbsp; &nbsp;</p><p>&nbsp; &nbsp;</p><p>&nbsp; &nbsp; &nbsp; &nbsp;2.2.1 keep your password confidential; &nbsp; &nbsp;</p><p>&nbsp; &nbsp;</p><p>&nbsp; &nbsp; &nbsp; &nbsp;2.2.2 notify us in writing immediately (using our contact details provided at &nbsp; &nbsp; &nbsp; &nbsp;section 26) if you become aware of any disclosure of your password; and &nbsp; &nbsp;</p><p>&nbsp; &nbsp;</p><p>&nbsp; &nbsp; &nbsp; &nbsp;2.2.3 be responsible for any activity on our marketplace arising out of any &nbsp; &nbsp; &nbsp; &nbsp;failure to keep your password confidential, and that you may be held liable for &nbsp; &nbsp; &nbsp; &nbsp;any losses arising out of such a failure. &nbsp; &nbsp;</p><p>&nbsp; &nbsp;</p><h3>2.3. Your account shall be used exclusively by you and you shall not &nbsp; &nbsp; &nbsp; &nbsp;transfer your account to any third party. If you authorize any third party to &nbsp; &nbsp; &nbsp; &nbsp;manage your account on your behalf this shall be at your own risk. &nbsp; &nbsp;</h3><p>&nbsp; &nbsp;</p><h3>2.4. We may suspend or cancel your account, and/or edit your account &nbsp; &nbsp; &nbsp; &nbsp;details, at any time in our sole discretion and without notice or explanation, &nbsp; &nbsp; &nbsp; &nbsp;providing that if we cancel any products or services you have paid for but not &nbsp; &nbsp; &nbsp; &nbsp;received, and you have not breached these general terms and conditions, we will &nbsp; &nbsp; &nbsp; &nbsp;refund you in respect of the same. &nbsp; &nbsp;</h3><p>&nbsp; &nbsp;</p><p>2.5. You may cancel your account on our marketplace by contacting us as &nbsp; &nbsp; &nbsp; &nbsp;provided at section 26. &nbsp; &nbsp;</p><p>&nbsp; &nbsp;</p><h3>3. Terms and conditions of sale &nbsp; &nbsp;</h3><p>&nbsp; &nbsp;</p><p>3.1. You acknowledge and agree that:</p><p>&nbsp; &nbsp;</p><p>3.1.1. the marketplace provides an online location for sellers &nbsp; &nbsp; &nbsp; &nbsp;to sell and buyers to purchase products; &nbsp; &nbsp;</p><p>&nbsp; &nbsp;</p><p>&nbsp; &nbsp; &nbsp; &nbsp;3.1.2. we shall accept binding sales, on behalf of sellers, but (unless Jumia is &nbsp; &nbsp; &nbsp; &nbsp;indicated as the seller) Jumia is not a party to the transaction between the &nbsp; &nbsp; &nbsp; &nbsp;seller and the buyer; and &nbsp; &nbsp;</p><p>&nbsp; &nbsp;</p><p>&nbsp; &nbsp; &nbsp; &nbsp;3.1.3. a contract for the sale and purchase of a product or products will come &nbsp; &nbsp; &nbsp; &nbsp;into force between the buyer and seller, and accordingly you commit to buying or &nbsp; &nbsp; &nbsp; &nbsp;selling the relevant product or products, upon the buyer&rsquo;s confirmation of &nbsp; &nbsp; &nbsp; &nbsp;purchase via the marketplace. &nbsp; &nbsp;</p><p>&nbsp; &nbsp;</p><p>3.2. Subject to these general terms and conditions, the seller&rsquo;s terms of &nbsp; &nbsp; &nbsp; &nbsp;business shall govern the contract for sale and purchase between the buyer and &nbsp; &nbsp; &nbsp; &nbsp;the seller. Notwithstanding this, the following provisions will be incorporated &nbsp; &nbsp; &nbsp; &nbsp;into the contract of sale and purchase between the buyer and the seller: &nbsp; &nbsp;</p><p>&nbsp; &nbsp;</p><p>&nbsp; &nbsp; &nbsp; &nbsp;3.2.1. the price for a product will be as stated in the relevant product &nbsp; &nbsp; &nbsp; &nbsp;listing; &nbsp; &nbsp;</p><p>&nbsp; &nbsp;</p><p>&nbsp; &nbsp; &nbsp; &nbsp;3.2.2. the price for the product must include all taxes and comply with &nbsp; &nbsp; &nbsp; &nbsp;applicable laws in force from time to time; &nbsp; &nbsp;</p><p>&nbsp; &nbsp;</p><p>&nbsp; &nbsp; &nbsp; &nbsp;3.2.3. delivery charges, packaging charges, handling charges, administrative &nbsp; &nbsp; &nbsp; &nbsp;charges, insurance costs, other ancillary costs and charges, where applicable, &nbsp; &nbsp; &nbsp; &nbsp;will only be payable by the buyer if this is expressly and clearly stated in the &nbsp; &nbsp; &nbsp; &nbsp;product listing; and delivery of digital products may be made electronically; &nbsp; &nbsp;</p><p>&nbsp; &nbsp;</p><p>&nbsp; &nbsp; &nbsp; &nbsp;3.2.4. products must be of satisfactory quality, fit and safe for any purpose &nbsp; &nbsp; &nbsp; &nbsp;specified in, and conform in all material respects to, the product listing and &nbsp; &nbsp; &nbsp; &nbsp;any other description of the products supplied or made available by the seller &nbsp; &nbsp; &nbsp; &nbsp;to the buyer; and &nbsp; &nbsp;</p><p>&nbsp; &nbsp;</p><p>3.2.5. in respect of physical products sold, the seller &nbsp; &nbsp; &nbsp; &nbsp;warrants that the seller has good title to, and is the sole legal and beneficial &nbsp; &nbsp; &nbsp; &nbsp;owner of, the products and/or has the right to supply the products pursuant to &nbsp; &nbsp; &nbsp; &nbsp;this agreement, and that the products are not subject to any third party rights &nbsp; &nbsp; &nbsp; &nbsp;or restrictions including in respect of third party intellectual property rights &nbsp; &nbsp; &nbsp; &nbsp;and/or any criminal, insolvency or tax investigation or proceedings; and in &nbsp; &nbsp; &nbsp; &nbsp;respect of digital products the seller warrants that the seller has the right to &nbsp; &nbsp; &nbsp; &nbsp;supply the digital products to the buyer.</p><p>&nbsp; &nbsp;</p><h3>4. Returns and refunds</h3><p>&nbsp; &nbsp;</p><p>4.1. Returns of products by buyers and acceptance of returned products by &nbsp; &nbsp; &nbsp; &nbsp;sellers shall be managed by us in accordance with the returns page on the &nbsp; &nbsp; &nbsp; &nbsp;marketplace, as may be amended from time to time. Acceptance of returns shall be &nbsp; &nbsp; &nbsp; &nbsp;in our discretion, subject to compliance with applicable laws of the territory.</p><p>&nbsp; &nbsp;</p><p>4.2. Refunds in respect of returned products shall be managed in accordance &nbsp; &nbsp; &nbsp; &nbsp;with the refunds page on the marketplace, as may be amended from time to time. &nbsp; &nbsp; &nbsp; &nbsp;Our rules on refunds shall be exercised in our discretion, subject to applicable &nbsp; &nbsp; &nbsp; &nbsp;laws of the territory. We may offer refunds, in our discretion:</p><p>&nbsp; &nbsp;</p><p>&nbsp; &nbsp; &nbsp; &nbsp;4.2.1. in respect of the product price; &nbsp; &nbsp;</p><p>&nbsp; &nbsp;</p><p>&nbsp; &nbsp; &nbsp; &nbsp;4.2.2. local and/or international shipping fees (as stated on the refunds page); &nbsp; &nbsp; &nbsp; &nbsp;and &nbsp; &nbsp;</p><p>&nbsp; &nbsp;</p><p>&nbsp; &nbsp; &nbsp; &nbsp;4.2.3. by way of store credits, vouchers, mobile money transfer, bank transfers &nbsp; &nbsp; &nbsp; &nbsp;or such other methods as we may determine from time to time. &nbsp; &nbsp;</p><p>&nbsp; &nbsp;</p><p>4.3. Returned products shall be accepted and refunds issued by Jumia, acting &nbsp; &nbsp; &nbsp; &nbsp;for and on behalf of the seller. Notwithstanding paragraphs 4.1 and 4.2 above, &nbsp; &nbsp; &nbsp; &nbsp;in respect of digital products or services and fresh food, Jumia shall issue &nbsp; &nbsp; &nbsp; &nbsp;refunds in respect of failures in delivery only. Refunds of payment for such &nbsp; &nbsp; &nbsp; &nbsp;products for any other reasons shall be subject to the seller&rsquo;s terms and &nbsp; &nbsp; &nbsp; &nbsp;conditions of sale.</p><p>&nbsp; &nbsp;</p><p>4.4. Changes to our returns page or refunds page shall be effective in &nbsp; &nbsp; &nbsp; &nbsp;respect of all purchases made from the date of publication of the change on our &nbsp; &nbsp; &nbsp; &nbsp;website. &nbsp; &nbsp;</p><p>&nbsp; &nbsp;</p><h3>5. Payments</h3><p>&nbsp; &nbsp;</p><p>5.1. You must make payments due under these general terms and conditions in &nbsp; &nbsp; &nbsp; &nbsp;accordance with the Payments Information and Guidelines on the marketplace. 6. &nbsp; &nbsp; &nbsp; &nbsp;Store Credit</p><p>&nbsp; &nbsp;</p><p>6.1. Store Credits may be earned and managed in accordance with the Jumia &nbsp; &nbsp; &nbsp; &nbsp;Store Credit Terms and Conditions, as may be amended from time to time. Jumia &nbsp; &nbsp; &nbsp; &nbsp;reserves the right to cancel or withdraw Jumia store credit rewards for any &nbsp; &nbsp; &nbsp; &nbsp;reason in its discretion, including if we suspect fraud or foul play. You can &nbsp; &nbsp; &nbsp; &nbsp;view Reward Store Credit terms and conditions on our website. &nbsp; &nbsp;</p><p>&nbsp; &nbsp;</p><h3>7. Promotions</h3><p>&nbsp; &nbsp;</p><p>7.1. Promotions and competitions run by Jumia and/or other promoters shall be &nbsp; &nbsp; &nbsp; &nbsp;managed in accordance with the Promotions Terms and Conditions. You can view &nbsp; &nbsp; &nbsp; &nbsp;each Promotion&#39;s terms and conditions on our website .</p><p>&nbsp; &nbsp;</p><h3>8. Rules about your content &nbsp; &nbsp;</h3><p>&nbsp; &nbsp;</p><p>8.1. In these general terms and conditions, &quot;your content&quot; means:</p><p>&nbsp; &nbsp;</p><p>&nbsp; &nbsp; &nbsp; &nbsp;8.1.1. all works and materials (including without limitation text, graphics, &nbsp; &nbsp; &nbsp; &nbsp;images, audio material, video material, audio-visual material, scripts, software &nbsp; &nbsp; &nbsp; &nbsp;and files) that you submit to us or our marketplace for storage or publication, &nbsp; &nbsp; &nbsp; &nbsp;processing by, or onward transmission; and &nbsp; &nbsp;</p><p>&nbsp; &nbsp;</p><p>&nbsp; &nbsp; &nbsp; &nbsp;8.1.2. all communications on the marketplace, including product reviews, &nbsp; &nbsp; &nbsp; &nbsp;feedback and comments. &nbsp; &nbsp;</p><p>&nbsp; &nbsp;</p><p>8.2. Your content, and the use of your content by us in accordance with these &nbsp; &nbsp; &nbsp; &nbsp;general terms and conditions, must be accurate, complete and truthful. &nbsp; &nbsp;</p><p>&nbsp; &nbsp;</p><p>&nbsp; &nbsp; &nbsp; &nbsp;8.3. Your content must be appropriate, civil and tasteful, and accord with &nbsp; &nbsp; &nbsp; &nbsp;generally accepted standards of etiquette and behaviour on the internet, and &nbsp; &nbsp; &nbsp; &nbsp;must not: &nbsp; &nbsp;</p><p>&nbsp; &nbsp;</p><p>&nbsp; &nbsp; &nbsp; &nbsp;8.3.1 be offensive, obscene, indecent, pornographic, lewd, suggestive or &nbsp; &nbsp; &nbsp; &nbsp;sexually explicit; &nbsp; &nbsp;</p><p>&nbsp; &nbsp;</p><p>&nbsp; &nbsp; &nbsp; &nbsp;8.3.2. depict violence in an explicit, graphic or gratuitous manner; or &nbsp; &nbsp;</p><p>&nbsp; &nbsp;</p><p>&nbsp; &nbsp; &nbsp; &nbsp;8.3.3. be blasphemous, in breach of racial or religious hatred or discrimination &nbsp; &nbsp; &nbsp; &nbsp;legislation; &nbsp; &nbsp;</p><p>&nbsp; &nbsp;</p><p>&nbsp; &nbsp; &nbsp; &nbsp;8.3.4. be deceptive, fraudulent, threatening, abusive, harassing, anti-social, &nbsp; &nbsp; &nbsp; &nbsp;menacing, hateful, discriminatory or inflammatory; &nbsp; &nbsp;</p><p>&nbsp; &nbsp;</p><p>&nbsp; &nbsp; &nbsp; &nbsp;8.3.5. cause annoyance, inconvenience or needless anxiety to any person; or &nbsp; &nbsp;</p><p>&nbsp; &nbsp;</p><p>&nbsp; &nbsp; &nbsp; &nbsp;8.3.6. constitute spam. &nbsp; &nbsp;</p><p>&nbsp; &nbsp;</p><p>8.4. Your content must not be illegal or unlawful, infringe any person&#39;s &nbsp; &nbsp; &nbsp; &nbsp;legal rights, or be capable of giving rise to legal action against any person &nbsp; &nbsp; &nbsp; &nbsp;(in each case in any jurisdiction and under any applicable law). Your content &nbsp; &nbsp; &nbsp; &nbsp;must not infringe or breach: &nbsp; &nbsp;</p><p>&nbsp; &nbsp;</p><p>&nbsp; &nbsp; &nbsp; &nbsp;8.4.1. any copyright, moral right, database right, trademark right, design &nbsp; &nbsp; &nbsp; &nbsp;right, right in passing off or other intellectual property right; &nbsp; &nbsp;</p><p>&nbsp; &nbsp;</p><p>&nbsp; &nbsp; &nbsp; &nbsp;8.4.2. any right of confidence, right of privacy or right under data protection &nbsp; &nbsp; &nbsp; &nbsp;legislation; &nbsp; &nbsp;</p><p>&nbsp; &nbsp;</p><p>&nbsp; &nbsp; &nbsp; &nbsp;8.4.3. any contractual obligation owed to any person; or &nbsp; &nbsp;</p><p>&nbsp; &nbsp;</p><p>&nbsp; &nbsp; &nbsp; &nbsp;8.4.4. any court order. &nbsp; &nbsp;</p><p>&nbsp; &nbsp;</p><p>8.5. You must not use our marketplace to link to any website or web page &nbsp; &nbsp; &nbsp; &nbsp;consisting of or containing material that would, were it posted on our &nbsp; &nbsp; &nbsp; &nbsp;marketplace, breach the provisions of these general terms and conditions.</p><p>&nbsp; &nbsp;</p><p>8.6. You must not submit to our marketplace any material that is or has ever &nbsp; &nbsp; &nbsp; &nbsp;been the subject of any threatened or actual legal proceedings or other similar &nbsp; &nbsp; &nbsp; &nbsp;complaint.</p><p>&nbsp; &nbsp;</p><p>&nbsp; &nbsp; &nbsp; &nbsp;8.7. The review function on the marketplace may be used to facilitate buyer &nbsp; &nbsp; &nbsp; &nbsp;reviews on products. You shall not use the review function or any other form of &nbsp; &nbsp; &nbsp; &nbsp;communication to provide inaccurate, inauthentic, or fake reviews. &nbsp; &nbsp;</p><p>&nbsp; &nbsp;</p><p>&nbsp; &nbsp; &nbsp; &nbsp;8.8. You must not interfere with a transaction by: (i) contacting another user &nbsp; &nbsp; &nbsp; &nbsp;to buy or sell an item listed on the marketplace outside of the marketplace; or &nbsp; &nbsp; &nbsp; &nbsp;(ii) communicating with a user involved in an active or completed transaction to &nbsp; &nbsp; &nbsp; &nbsp;warn them away from a particular buyer, seller or item; or (iii) contacting &nbsp; &nbsp; &nbsp; &nbsp;another user with the intent to collect any payments. &nbsp; &nbsp;</p><p>&nbsp; &nbsp;</p><p>&nbsp; &nbsp; &nbsp; &nbsp;8.9. You acknowledge that all users of the marketplace are solely responsible &nbsp; &nbsp; &nbsp; &nbsp;for interactions with other users and you shall exercise caution and good &nbsp; &nbsp; &nbsp; &nbsp;judgment in your communication with users. You shall not send them personal &nbsp; &nbsp; &nbsp; &nbsp;information including credit card details. &nbsp; &nbsp;</p><p>&nbsp; &nbsp;</p><p>&nbsp; &nbsp; &nbsp; &nbsp;8.10. We may periodically review your content and we reserve the right to remove &nbsp; &nbsp; &nbsp; &nbsp;any content at our discretion for any reason whatsoever. &nbsp; &nbsp;</p><p>&nbsp; &nbsp;</p><p>&nbsp; &nbsp; &nbsp; &nbsp;8.11. If you learn of any unlawful material or activity on our marketplace, or &nbsp; &nbsp; &nbsp; &nbsp;any material or activity that breaches these general terms and conditions, you &nbsp; &nbsp; &nbsp; &nbsp;may inform us by contacting us as provided at section 26. &nbsp; &nbsp;</p><p>&nbsp; &nbsp;</p><h3>9. Our rights to use your content</h3><p>&nbsp; &nbsp;</p><p>&nbsp; &nbsp; &nbsp; &nbsp;9.1. You grant to us a worldwide, irrevocable, non-exclusive, royalty-free &nbsp; &nbsp; &nbsp; &nbsp;license to use, reproduce, store, adapt, publish, translate and distribute your &nbsp; &nbsp; &nbsp; &nbsp;content on our marketplace, and across our marketing channels and any existing &nbsp; &nbsp; &nbsp; &nbsp;or future media. &nbsp; &nbsp;</p><p>&nbsp; &nbsp;</p><p>&nbsp; &nbsp; &nbsp; &nbsp;9.2. You grant to us the right to sub-license the rights licensed under section &nbsp; &nbsp; &nbsp; &nbsp;9.1. &nbsp; &nbsp;</p><p>&nbsp; &nbsp;</p><p>&nbsp; &nbsp; &nbsp; &nbsp;9.3. You grant to us the right to bring an action for infringement of the rights &nbsp; &nbsp; &nbsp; &nbsp;licensed under section 9.1. &nbsp; &nbsp;</p><p>&nbsp; &nbsp;</p><p>&nbsp; &nbsp; &nbsp; &nbsp;9.4. You hereby waive all your moral rights in your content to the maximum &nbsp; &nbsp; &nbsp; &nbsp;extent permitted by applicable law; and you warrant and represent that all other &nbsp; &nbsp; &nbsp; &nbsp;moral rights in your content have been waived to the maximum extent permitted by &nbsp; &nbsp; &nbsp; &nbsp;applicable law. &nbsp; &nbsp;</p><p>&nbsp; &nbsp;</p><p>&nbsp; &nbsp; &nbsp; &nbsp;9.5. Without prejudice to our other rights under these general terms and &nbsp; &nbsp; &nbsp; &nbsp;conditions, if you breach our rules on content in any way, or if we reasonably &nbsp; &nbsp; &nbsp; &nbsp;suspect that you have breached our rules on content, we may delete, unpublish or &nbsp; &nbsp; &nbsp; &nbsp;edit any or all of your content. &nbsp; &nbsp;</p><p>&nbsp; &nbsp;</p><h3>10. Use of website and mobile applications &nbsp; &nbsp;</h3><p>&nbsp; &nbsp;</p><p>&nbsp; &nbsp; &nbsp; &nbsp;10.1. In this section 10 words &ldquo;marketplace&rdquo; and &quot;website&rdquo; shall be used &nbsp; &nbsp; &nbsp; &nbsp;interchangeably to refer to Jumia&rsquo;s websites and mobile applications. &nbsp; &nbsp;</p><p>&nbsp; &nbsp;</p><p>&nbsp; &nbsp; &nbsp; &nbsp;10.2. You may: &nbsp; &nbsp;</p><p>&nbsp; &nbsp;</p><p>&nbsp; &nbsp; &nbsp; &nbsp;10.2.1. view pages from our website in a web browser; &nbsp; &nbsp;</p><p>&nbsp; &nbsp;</p><p>&nbsp; &nbsp; &nbsp; &nbsp;10.2.2. download pages from our website for caching in a web browser; &nbsp; &nbsp;</p><p>&nbsp; &nbsp;</p><p>&nbsp; &nbsp; &nbsp; &nbsp;10.2.3. print pages from our website for your own personal and non-commercial &nbsp; &nbsp; &nbsp; &nbsp;use, providing that such printing is not systematic or excessive; &nbsp; &nbsp;</p><p>&nbsp; &nbsp;</p><p>&nbsp; &nbsp; &nbsp; &nbsp;10.2.4. stream audio and video files from our website using the media player on &nbsp; &nbsp; &nbsp; &nbsp;our website; and &nbsp; &nbsp;</p><p>&nbsp; &nbsp;</p><p>&nbsp; &nbsp; &nbsp; &nbsp;10.2.5. use our marketplace services by means of a web browser, subject to the &nbsp; &nbsp; &nbsp; &nbsp;other provisions of these general terms and conditions. &nbsp; &nbsp;</p><p>&nbsp; &nbsp;</p><p>&nbsp; &nbsp; &nbsp; &nbsp;10.3 Except as expressly permitted by section 10.2 or the other provisions of &nbsp; &nbsp; &nbsp; &nbsp;these general terms and conditions, you must not download any material from our &nbsp; &nbsp; &nbsp; &nbsp;website or save any such material to your computer. &nbsp; &nbsp;</p><p>&nbsp; &nbsp;</p><p>&nbsp; &nbsp; &nbsp; &nbsp;10.4. You may only use our website for your own personal and business purposes &nbsp; &nbsp; &nbsp; &nbsp;in respect of selling or purchasing products on the marketplace. &nbsp; &nbsp;</p><p>&nbsp; &nbsp;</p><p>&nbsp; &nbsp; &nbsp; &nbsp;10.5. Except as expressly permitted by these general terms and conditions, you &nbsp; &nbsp; &nbsp; &nbsp;must not edit or otherwise modify any material on our website. &nbsp; &nbsp;</p><p>&nbsp; &nbsp;</p><p>&nbsp; &nbsp; &nbsp; &nbsp;10.6 Unless you own or control the relevant rights in the material, you must &nbsp; &nbsp; &nbsp; &nbsp;not: &nbsp; &nbsp;</p><p>&nbsp; &nbsp;</p><p>&nbsp; &nbsp; &nbsp; &nbsp;10.6.1. republish material from our website (including republication on another &nbsp; &nbsp; &nbsp; &nbsp;website); &nbsp; &nbsp;</p><p>&nbsp; &nbsp;</p><p>&nbsp; &nbsp; &nbsp; &nbsp;10.6.2. sell, rent or sub-license material from our website; &nbsp; &nbsp;</p><p>&nbsp; &nbsp;</p><p>10.6.3. show any material from our website in public;</p><p>&nbsp; &nbsp;</p><p>10.6.4. exploit material from our website for a commercial purpose; or</p><p>&nbsp; &nbsp;</p><p>10.6.5. redistribute material from our website.</p><p>&nbsp; &nbsp;</p><p>10.7. Notwithstanding section 8.6, you may forward links to products on our &nbsp; &nbsp; &nbsp; &nbsp;website and redistribute our newsletter and promotional materials in print and &nbsp; &nbsp; &nbsp; &nbsp;electronic form to any person.</p><p>&nbsp; &nbsp;</p><p>10.8. We reserve the right to suspend or restrict access to our website, to &nbsp; &nbsp; &nbsp; &nbsp;areas of our website and/or to functionality upon our website. We may, for &nbsp; &nbsp; &nbsp; &nbsp;example, suspend access to the website during server maintenance or when we &nbsp; &nbsp; &nbsp; &nbsp;update the website. You must not circumvent or bypass, or attempt to circumvent &nbsp; &nbsp; &nbsp; &nbsp;or bypass, any access restriction measures on the website.</p><p>&nbsp; &nbsp;</p><p>10.9. You must not:</p><p>&nbsp; &nbsp;</p><p>&nbsp; &nbsp; &nbsp; &nbsp;10.9.1. use our website in any way or take any action that causes, or may cause, &nbsp; &nbsp; &nbsp; &nbsp;damage to the website or impairment of the performance, availability, &nbsp; &nbsp; &nbsp; &nbsp;accessibility, integrity or security of the website; &nbsp; &nbsp;</p><p>&nbsp; &nbsp;</p><p>&nbsp; &nbsp; &nbsp; &nbsp;10.9.2. use our website in any way that is unethical, unlawful, illegal, &nbsp; &nbsp; &nbsp; &nbsp;fraudulent or harmful, or in connection with any unlawful, illegal, fraudulent &nbsp; &nbsp; &nbsp; &nbsp;or harmful purpose or activity; &nbsp; &nbsp;</p><p>&nbsp; &nbsp;</p><p>10.9.3. hack or otherwise tamper with our website;</p><p>&nbsp; &nbsp;</p><p>10.9.4. probe, scan or test the vulnerability of our website &nbsp; &nbsp; &nbsp; &nbsp;without our permission;</p><p>&nbsp; &nbsp;</p><p>10.9.5. circumvent any authentication or security systems or &nbsp; &nbsp; &nbsp; &nbsp;processes on or relating to our website;</p><p>&nbsp; &nbsp;</p><p>10.9.6. use our website to copy, store, host, transmit, send, &nbsp; &nbsp; &nbsp; &nbsp;use, publish or distribute any material which consists of (or is linked to) any &nbsp; &nbsp; &nbsp; &nbsp;spyware, computer virus, Trojan horse, worm, keystroke logger, rootkit or other &nbsp; &nbsp; &nbsp; &nbsp;malicious computer software;</p><p>&nbsp; &nbsp;</p><p>&nbsp; &nbsp; &nbsp; &nbsp;10.9.7. impose an unreasonably large load on our website resources (including &nbsp; &nbsp; &nbsp; &nbsp;bandwidth, storage capacity and processing capacity); &nbsp; &nbsp;</p><p>&nbsp; &nbsp;</p><p>&nbsp; &nbsp; &nbsp; &nbsp;10.9.8. decrypt or decipher any communications sent by or to our website without &nbsp; &nbsp; &nbsp; &nbsp;our permission; &nbsp; &nbsp;</p><p>&nbsp; &nbsp;</p><p>&nbsp; &nbsp; &nbsp; &nbsp;10.9.9. conduct any systematic or automated data collection activities &nbsp; &nbsp; &nbsp; &nbsp;(including without limitation scraping, data mining, data extraction and data &nbsp; &nbsp; &nbsp; &nbsp;harvesting) on or in relation to our website without our express written &nbsp; &nbsp; &nbsp; &nbsp;consent; &nbsp; &nbsp;</p><p>&nbsp; &nbsp;</p><p>&nbsp; &nbsp; &nbsp; &nbsp;10.9.10. access or otherwise interact with our website using any robot, spider &nbsp; &nbsp; &nbsp; &nbsp;or other automated means, except for the purpose of search engine indexing; &nbsp; &nbsp;</p><p>&nbsp; &nbsp;</p><p>&nbsp; &nbsp; &nbsp; &nbsp;10.9.12. violate the directives set out in the robots.txt file for our website; &nbsp; &nbsp;</p><p>&nbsp; &nbsp;</p><p>&nbsp; &nbsp; &nbsp; &nbsp;10.9.13. use data collected from our website for any direct marketing activity &nbsp; &nbsp; &nbsp; &nbsp;(including without limitation email marketing, SMS marketing, telemarketing and &nbsp; &nbsp; &nbsp; &nbsp;direct mailing); or &nbsp; &nbsp;</p><p>&nbsp; &nbsp;</p><p>10.9.14. do anything that interferes with the normal use of our website.</p><p>&nbsp; &nbsp;</p><h3>11. Copyright and trademarks</h3><p>&nbsp; &nbsp;</p><p>11.1. Subject to the express provisions of these general terms and conditions:</p><p>&nbsp; &nbsp;</p><p>11.1.1. we, together with our licensors, own and control all &nbsp; &nbsp; &nbsp; &nbsp;the copyright and other intellectual property rights in our website and the &nbsp; &nbsp; &nbsp; &nbsp;material on our website; and</p><p>&nbsp; &nbsp;</p><p>11.1.2. all the copyright and other intellectual property &nbsp; &nbsp; &nbsp; &nbsp;rights in our website and the material on our website are reserved.</p><p>&nbsp; &nbsp;</p><p>11.2. Jumia&rsquo;s logos and our other registered and unregistered trademarks are &nbsp; &nbsp; &nbsp; &nbsp;trademarks belonging to us; we give no permission for the use of these &nbsp; &nbsp; &nbsp; &nbsp;trademarks, and such use may constitute an infringement of our rights.</p><p>&nbsp; &nbsp;</p><p>11.3. The third party registered and unregistered trademarks or service marks &nbsp; &nbsp; &nbsp; &nbsp;on our website are the property of their respective owners and we do not endorse &nbsp; &nbsp; &nbsp; &nbsp;and are not affiliated with any of the holders of any such rights and as such we &nbsp; &nbsp; &nbsp; &nbsp;cannot grant any license to exercise such rights.</p><p>&nbsp; &nbsp;</p><h3>12. Data privacy</h3><p>&nbsp; &nbsp;</p><p>12.1. Buyers agree to processing of their personal data in accordance with &nbsp; &nbsp; &nbsp; &nbsp;the terms of Jumia&rsquo;s Privacy and Cookie Notice.</p><p>&nbsp; &nbsp;</p><p>12.2. Jumia shall process all personal data obtained through the marketplace &nbsp; &nbsp; &nbsp; &nbsp;and related services in accordance with the terms of our Privacy and Cookie &nbsp; &nbsp; &nbsp; &nbsp;Notice and Privacy Policy.</p><p>&nbsp; &nbsp;</p><p>12.3. Sellers shall be directly responsible to buyers for any misuse of their &nbsp; &nbsp; &nbsp; &nbsp;personal data and Jumia shall bear no liability to buyers in respect of any &nbsp; &nbsp; &nbsp; &nbsp;misuse by sellers of their personal data.</p><p>&nbsp; &nbsp;</p><h3>13. Due diligence and audit rights</h3><p>&nbsp; &nbsp;</p><p>13.1. We operate an anti-money laundering compliance program and reserve the &nbsp; &nbsp; &nbsp; &nbsp;right to perform due diligence checks on all users of the marketplace.</p><p>&nbsp; &nbsp;</p><p>13.2. You agree to provide to us all such information, documentation and &nbsp; &nbsp; &nbsp; &nbsp;access to your business premises as we may require:</p><p>&nbsp; &nbsp;</p><p>&nbsp; &nbsp; &nbsp; &nbsp;13.2.1. in order to verify your adherence to, and performance of, your &nbsp; &nbsp; &nbsp; &nbsp;obligations under this Agreement; &nbsp; &nbsp;</p><p>&nbsp; &nbsp;</p><p>&nbsp; &nbsp; &nbsp; &nbsp;13.2.2. for the purpose of disclosures pursuant to a valid order by a court or &nbsp; &nbsp; &nbsp; &nbsp;other governmental body; or &nbsp; &nbsp;</p><p>&nbsp; &nbsp;</p><p>&nbsp; &nbsp; &nbsp; &nbsp;13.2.3. as otherwise required by law or applicable regulation. &nbsp; &nbsp;</p><p>&nbsp; &nbsp;</p><h3>14. Jumia&rsquo;s role as a marketplace</h3><p>&nbsp; &nbsp;</p><p>14.1. You acknowledge that:</p><p>&nbsp; &nbsp;</p><p>14.1.1. Jumia facilitates a marketplace for buyers and third &nbsp; &nbsp; &nbsp; &nbsp;party sellers or Jumia, where Jumia is the seller of a product; credit &nbsp; &nbsp; &nbsp; &nbsp;worthiness or bona fides, or otherwise vet them;</p><p>&nbsp; &nbsp;</p><p>14.1.2. the relevant seller of the product (whether Jumia is &nbsp; &nbsp; &nbsp; &nbsp;the seller or whether it is a third party seller) shall at all times remain &nbsp; &nbsp; &nbsp; &nbsp;exclusively liable for the products they sell on the marketplace; and &nbsp; &nbsp;</p><p>&nbsp; &nbsp;</p><p>14.1.3. in the event that there is an issue arising from the &nbsp; &nbsp; &nbsp; &nbsp;purchase of a product on the marketplace, the buyer should seek recourse from &nbsp; &nbsp; &nbsp; &nbsp;the relevant seller of the product by following the process set out in &nbsp; &nbsp; &nbsp; &nbsp;<a href=\"https://www.jumia.co.ke/sp-dispute-resolution-policy/\" style=\"color:blue;\">Jumia&rsquo;s Dispute Resolution Policy.</a> &nbsp; &nbsp;</p><p>&nbsp; &nbsp;</p><p>&nbsp; &nbsp; &nbsp; &nbsp;14.3. We do not warrant or represent that the marketplace will operate without &nbsp; &nbsp; &nbsp; &nbsp;fault; or that the marketplace or any service on the marketplace will remain &nbsp; &nbsp; &nbsp; &nbsp;available during the occurrence of events beyond Jumia&rsquo;s control (force majeure &nbsp; &nbsp; &nbsp; &nbsp;events) which include but are not limited to; flood, drought, earthquake or &nbsp; &nbsp; &nbsp; &nbsp;other natural disasters; hacking, viruses, malware or other malicious software &nbsp; &nbsp; &nbsp; &nbsp;attacks on the marketplace; terrorist attacks, civil war, civil commotion or &nbsp; &nbsp; &nbsp; &nbsp;riots; war, threat of or preparation for war; epidemics or pandemics; or &nbsp; &nbsp; &nbsp; &nbsp;extra-constitutional events or circumstances which materially and adversely &nbsp; &nbsp; &nbsp; &nbsp;affect the political or macro-economic stability of the territory as a whole. &nbsp; &nbsp;</p><p>&nbsp; &nbsp;</p><p>&nbsp; &nbsp; &nbsp; &nbsp;14.4. We reserve the right to discontinue or alter any or all of our marketplace &nbsp; &nbsp; &nbsp; &nbsp;services, and to stop publishing our marketplace, at any time in our sole &nbsp; &nbsp; &nbsp; &nbsp;discretion without notice or explanation; and you will not be entitled to any &nbsp; &nbsp; &nbsp; &nbsp;compensation or other payment upon the discontinuance or alteration of any &nbsp; &nbsp; &nbsp; &nbsp;marketplace services, or if we stop publishing the marketplace. This is without &nbsp; &nbsp; &nbsp; &nbsp;prejudice to your rights in respect of any unfulfilled orders or other existing &nbsp; &nbsp; &nbsp; &nbsp;liabilities of Jumia. &nbsp; &nbsp;</p><p>&nbsp; &nbsp;</p><p>&nbsp; &nbsp; &nbsp; &nbsp;14.5. If we discontinue or alter any or all of our marketplace in circumstances &nbsp; &nbsp; &nbsp; &nbsp;not relating to force majeure, we will provide prior notice to the buyers and &nbsp; &nbsp; &nbsp; &nbsp;sellers of not less than fifteen (15) days with clear guidance on the way &nbsp; &nbsp; &nbsp; &nbsp;forward for the pending transactions or other existing liabilities of Jumia. &nbsp; &nbsp; &nbsp; &nbsp;14.6 We do not guarantee any commercial results concerning the use of the &nbsp; &nbsp; &nbsp; &nbsp;marketplace. &nbsp; &nbsp;</p><p>&nbsp; &nbsp;</p><p>&nbsp; &nbsp; &nbsp; &nbsp;14.6. To the maximum extent permitted by applicable law and subject to section &nbsp; &nbsp; &nbsp; &nbsp;15.1 below, we exclude all representations and warranties relating to the &nbsp; &nbsp; &nbsp; &nbsp;subject matter of these general terms and conditions, our marketplace and the &nbsp; &nbsp; &nbsp; &nbsp;use of our marketplace. &nbsp; &nbsp;</p><p>&nbsp; &nbsp;</p><p>15. Limitations and exclusions of liability</p><p>&nbsp; &nbsp;</p><p>15.1. Nothing in these general terms and conditions will: &nbsp; &nbsp;</p><p>&nbsp; &nbsp;</p><p>&nbsp; &nbsp; &nbsp; &nbsp;15.1.1. limit any liabilities in any way that is not permitted under applicable &nbsp; &nbsp; &nbsp; &nbsp;law; or &nbsp; &nbsp;</p><p>&nbsp; &nbsp;</p><p>&nbsp; &nbsp; &nbsp; &nbsp;15.1.2. exclude any liabilities or statutory rights that may not be excluded &nbsp; &nbsp; &nbsp; &nbsp;under applicable law. &nbsp; &nbsp;</p><p>&nbsp; &nbsp;</p><p>&nbsp; &nbsp; &nbsp; &nbsp;15.2. The limitations and exclusions of liability set out in this section 15 and &nbsp; &nbsp; &nbsp; &nbsp;elsewhere in these general terms and conditions: &nbsp; &nbsp;</p><p>&nbsp; &nbsp;</p><p>&nbsp; &nbsp; &nbsp; &nbsp;15.2.1. are subject to section 15.1; and &nbsp; &nbsp;</p><p>&nbsp; &nbsp;</p><p>&nbsp; &nbsp; &nbsp; &nbsp;15.1.2. exclude any liabilities or statutory rights that may not be excluded &nbsp; &nbsp; &nbsp; &nbsp;under applicable law. &nbsp; &nbsp;</p><p>&nbsp; &nbsp;</p><p>&nbsp; &nbsp; &nbsp; &nbsp;15.2. The limitations and exclusions of liability set out in this section 15 and &nbsp; &nbsp; &nbsp; &nbsp;elsewhere in these general terms and conditions: &nbsp; &nbsp;</p><p>&nbsp; &nbsp;</p><p>&nbsp; &nbsp; &nbsp; &nbsp;15.2.1. are subject to section 15.1; and &nbsp; &nbsp;</p><p>&nbsp; &nbsp;</p><p>&nbsp; &nbsp; &nbsp; &nbsp;15.2.2. govern all liabilities arising under these general terms and conditions &nbsp; &nbsp; &nbsp; &nbsp;or relating to the subject matter of these general terms and conditions, &nbsp; &nbsp; &nbsp; &nbsp;including liabilities arising in contract, in tort (including negligence) and &nbsp; &nbsp; &nbsp; &nbsp;for breach of statutory duty, except to the extent expressly provided otherwise &nbsp; &nbsp; &nbsp; &nbsp;in these general terms and conditions. &nbsp; &nbsp;</p><p>&nbsp; &nbsp;</p><p>&nbsp; &nbsp; &nbsp; &nbsp;15.3. In respect of the services offered to you free of charge we will not be &nbsp; &nbsp; &nbsp; &nbsp;liable to you for any loss or damage of any nature whatsoever. &nbsp; &nbsp;</p><p>&nbsp; &nbsp;</p><p>&nbsp; &nbsp; &nbsp; &nbsp;15.4. Our aggregate liability to you in respect of any contract to provide &nbsp; &nbsp; &nbsp; &nbsp;services to you under these general terms and conditions shall not exceed the &nbsp; &nbsp; &nbsp; &nbsp;total amount paid and payable to us under the contract. Each separate &nbsp; &nbsp; &nbsp; &nbsp;transaction on the marketplace shall constitute a separate contract for the &nbsp; &nbsp; &nbsp; &nbsp;purpose of this section 15. &nbsp; &nbsp;</p><p>&nbsp; &nbsp;</p><p>&nbsp; &nbsp; &nbsp; &nbsp;15.5. Notwithstanding section 15.4 above, we will not be liable to you for any &nbsp; &nbsp; &nbsp; &nbsp;loss or damage of any nature, including in respect of: &nbsp; &nbsp;</p><p>&nbsp; &nbsp;</p><p>&nbsp; &nbsp; &nbsp; &nbsp;15.5.1. any losses occasioned by any interruption or dysfunction to the website; &nbsp; &nbsp;</p><p>&nbsp; &nbsp;</p><p>&nbsp; &nbsp; &nbsp; &nbsp;15.5.2. any losses arising out of any event or events beyond our reasonable &nbsp; &nbsp; &nbsp; &nbsp;control; &nbsp; &nbsp;</p><p>&nbsp; &nbsp;</p><p>&nbsp; &nbsp; &nbsp; &nbsp;15.5.3. any business losses, including (without limitation) loss of or damage to &nbsp; &nbsp; &nbsp; &nbsp;profits, income, revenue, use, production, anticipated savings, business, &nbsp; &nbsp; &nbsp; &nbsp;contracts, commercial opportunities or goodwill; &nbsp; &nbsp;</p><p>&nbsp; &nbsp;</p><p>&nbsp; &nbsp; &nbsp; &nbsp;15.5.4. any loss or corruption of any data, database or software; or &nbsp; &nbsp;</p><p>&nbsp; &nbsp;</p><p>&nbsp; &nbsp; &nbsp; &nbsp;15.5.5. any special, indirect or consequential loss or damage. &nbsp; &nbsp;</p><p>&nbsp; &nbsp;</p><p>&nbsp; &nbsp; &nbsp; &nbsp;15.6. We accept that we have an interest in limiting the personal liability of &nbsp; &nbsp; &nbsp; &nbsp;our officers and employees and, having regard to that interest, you acknowledge &nbsp; &nbsp; &nbsp; &nbsp;that we are a limited liability entity; you agree that you will not bring any &nbsp; &nbsp; &nbsp; &nbsp;claim personally against our officers or employees in respect of any losses you &nbsp; &nbsp; &nbsp; &nbsp;suffer in connection with the marketplace or these general terms and conditions &nbsp; &nbsp; &nbsp; &nbsp;(this will not limit or exclude the liability of the limited liability entity &nbsp; &nbsp; &nbsp; &nbsp;itself for the acts and omissions of our officers and employees). &nbsp; &nbsp;</p><p>&nbsp; &nbsp;</p><p>&nbsp; &nbsp; &nbsp; &nbsp;15.7. Our marketplace includes hyperlinks to other websites owned and operated &nbsp; &nbsp; &nbsp; &nbsp;by third parties; such hyperlinks are not recommendations. We have no control &nbsp; &nbsp; &nbsp; &nbsp;over third party websites and their contents, and we accept no responsibility &nbsp; &nbsp; &nbsp; &nbsp;for them or for any loss or damage that may arise from your use of them. &nbsp; &nbsp;</p><p>&nbsp; &nbsp;</p><h3>16. Indemnification</h3><p>&nbsp; &nbsp;</p><p>&nbsp; &nbsp; &nbsp; &nbsp;16.1. You hereby indemnify us, and undertake to keep us indemnified, against: &nbsp; &nbsp;</p><p>&nbsp; &nbsp;</p><p>&nbsp; &nbsp; &nbsp; &nbsp;16.1.1. any and all losses, damages, costs, liabilities and expenses (including &nbsp; &nbsp; &nbsp; &nbsp;without limitation legal expenses and any amounts paid by us to any third party &nbsp; &nbsp; &nbsp; &nbsp;in settlement of a claim or dispute) incurred or suffered by us and arising &nbsp; &nbsp; &nbsp; &nbsp;directly or indirectly out of your use of our marketplace or any breach by you &nbsp; &nbsp; &nbsp; &nbsp;of any provision of these general terms and conditions or the Jumia codes, &nbsp; &nbsp; &nbsp; &nbsp;policies or guidelines; and &nbsp; &nbsp;</p><p>&nbsp; &nbsp;</p><p>&nbsp; &nbsp; &nbsp; &nbsp;16.1.2. any VAT liability or other tax liability that we may incur in relation &nbsp; &nbsp; &nbsp; &nbsp;to any sale, supply or purchase made through our marketplace, where that &nbsp; &nbsp; &nbsp; &nbsp;liability arises out of your failure to pay, withhold, declare or register to &nbsp; &nbsp; &nbsp; &nbsp;pay any VAT or other tax properly due in any jurisdiction. &nbsp; &nbsp;</p><p>&nbsp; &nbsp;</p><p>&nbsp; &nbsp; &nbsp; &nbsp;17. Breaches of these general terms and conditions &nbsp; &nbsp;</p><p>&nbsp; &nbsp;</p><p>&nbsp; &nbsp; &nbsp; &nbsp;17.1. If we permit the registration of an account on our marketplace it will &nbsp; &nbsp; &nbsp; &nbsp;remain open indefinitely, subject to these general terms and conditions. &nbsp; &nbsp;</p><p>&nbsp; &nbsp;</p><p>&nbsp; &nbsp; &nbsp; &nbsp;17.2. If you breach these general terms and conditions, or if we reasonably &nbsp; &nbsp; &nbsp; &nbsp;suspect that you have breached these general terms and conditions or any Jumia &nbsp; &nbsp; &nbsp; &nbsp;codes, policies or guidelines in any way we may: &nbsp; &nbsp;</p><p>&nbsp; &nbsp;</p><p>&nbsp; &nbsp; &nbsp; &nbsp;17.2.1. temporarily suspend your access to our marketplace; &nbsp; &nbsp;</p><p>&nbsp; &nbsp;</p><p>&nbsp; &nbsp; &nbsp; &nbsp;17.2.2. permanently prohibit you from accessing our marketplace; &nbsp; &nbsp;</p><p>&nbsp; &nbsp;</p><p>&nbsp; &nbsp; &nbsp; &nbsp;17.2.3. block computers using your IP address from accessing our marketplace; &nbsp; &nbsp;</p><p>&nbsp; &nbsp;</p><p>&nbsp; &nbsp; &nbsp; &nbsp;17.2.4. contact any or all of your internet service providers and request that &nbsp; &nbsp; &nbsp; &nbsp;they block your access to our marketplace; &nbsp; &nbsp;</p><p>&nbsp; &nbsp;</p><p>&nbsp; &nbsp; &nbsp; &nbsp;17.2.5. suspend or delete your account on our marketplace; and/or &nbsp; &nbsp;</p><p>&nbsp; &nbsp;</p><p>&nbsp; &nbsp; &nbsp; &nbsp;17.2.6. commence legal action against you, whether for breach of contract or &nbsp; &nbsp; &nbsp; &nbsp;otherwise. &nbsp; &nbsp;</p><p>&nbsp; &nbsp;</p><p>&nbsp; &nbsp; &nbsp; &nbsp;17.3. Where we suspend, prohibit or block your access to our marketplace or a &nbsp; &nbsp; &nbsp; &nbsp;part of our marketplace you must not take any action to circumvent such &nbsp; &nbsp; &nbsp; &nbsp;suspension or prohibition or blocking (including without limitation creating &nbsp; &nbsp; &nbsp; &nbsp;and/or using a different account). &nbsp; &nbsp;</p><p>&nbsp; &nbsp;</p><h3>18. Entire agreement</h3><p>&nbsp; &nbsp;</p><p>&nbsp; &nbsp; &nbsp; &nbsp;These general terms and conditions and the Jumia codes, policies and guidelines &nbsp; &nbsp; &nbsp; &nbsp;(and in respect of sellers the seller terms and conditions) shall constitute the &nbsp; &nbsp; &nbsp; &nbsp;entire agreement between you and us in relation to your use of our marketplace &nbsp; &nbsp; &nbsp; &nbsp;and shall supersede all previous agreements between you and us in relation to &nbsp; &nbsp; &nbsp; &nbsp;your use of our marketplace. &nbsp; &nbsp;</p><p>&nbsp; &nbsp;</p><h3>19. Hierarchy &nbsp; &nbsp;</h3><p>&nbsp; &nbsp;</p><p>Should these general terms and conditions, the seller terms and conditions, &nbsp; &nbsp; &nbsp; &nbsp;and the Jumia codes, policies and guidelines be in conflict, these terms and &nbsp; &nbsp; &nbsp; &nbsp;conditions, the seller terms and conditions and the Jumia codes, policies and &nbsp; &nbsp; &nbsp; &nbsp;guidelines shall prevail in the order here stated.</p><p>&nbsp; &nbsp;</p><h3>Variation</h3><p>&nbsp; &nbsp;</p><p>20.1. We may revise these general terms and conditions, the seller terms and &nbsp; &nbsp; &nbsp; &nbsp;conditions, and the Jumia codes, policies and guidelines from time to time. &nbsp; &nbsp;</p><p>&nbsp; &nbsp;</p><p>&nbsp; &nbsp; &nbsp; &nbsp;20.2. The revised general terms and conditions shall apply from the date of &nbsp; &nbsp; &nbsp; &nbsp;publication on the marketplace. &nbsp; &nbsp;</p><p>&nbsp; &nbsp;</p><h3>21. No waiver</h3><p>&nbsp; &nbsp;</p><p>&nbsp; &nbsp; &nbsp; &nbsp;No waiver of any breach of any provision of these general terms and conditions &nbsp; &nbsp; &nbsp; &nbsp;shall be construed as a further or continuing waiver of any other breach of that &nbsp; &nbsp; &nbsp; &nbsp;provision or any breach of any other provision of these general terms and &nbsp; &nbsp; &nbsp; &nbsp;conditions. &nbsp; &nbsp;</p><p>&nbsp; &nbsp;</p><h3>22. Severability</h3><p>&nbsp; &nbsp;</p><p>22.1. If a provision of these general terms and conditions is determined by &nbsp; &nbsp; &nbsp; &nbsp;any court or other competent authority to be unlawful and/or unenforceable, the &nbsp; &nbsp; &nbsp; &nbsp;other provisions will continue in effect.</p><p>&nbsp; &nbsp;</p><p>&nbsp; &nbsp; &nbsp; &nbsp;22.2. If any unlawful and/or unenforceable provision of these general terms and &nbsp; &nbsp; &nbsp; &nbsp;conditions would be lawful or enforceable if part of it were deleted, that part &nbsp; &nbsp; &nbsp; &nbsp;will be deemed to be deleted, and the rest of the provision will continue in &nbsp; &nbsp; &nbsp; &nbsp;effect. &nbsp; &nbsp;</p><p>&nbsp; &nbsp;</p><h3>23. Assignment</h3><p>&nbsp; &nbsp;</p><p>23.1. You hereby agree that we may assign, transfer, sub-contract or &nbsp; &nbsp; &nbsp; &nbsp;otherwise deal with our rights and/or obligations under these general terms and &nbsp; &nbsp; &nbsp; &nbsp;conditions.</p><p>&nbsp; &nbsp;</p><p>&nbsp; &nbsp; &nbsp; &nbsp;23.2. You may not without our prior written consent assign, transfer, &nbsp; &nbsp; &nbsp; &nbsp;sub-contract or otherwise deal with any of your rights and/or obligations under &nbsp; &nbsp; &nbsp; &nbsp;these general terms and conditions. &nbsp; &nbsp;</p><p>&nbsp; &nbsp;</p><h3>24. Third party rights</h3><p>&nbsp; &nbsp;</p><p>24.1. A contract under these general terms and conditions is for our benefit &nbsp; &nbsp; &nbsp; &nbsp;and your benefit, and is not intended to benefit or be enforceable by any third &nbsp; &nbsp; &nbsp; &nbsp;party.</p><p>&nbsp; &nbsp;</p><p>&nbsp; &nbsp; &nbsp; &nbsp;24.2. The exercise of the parties&#39; rights under a contract under these general &nbsp; &nbsp; &nbsp; &nbsp;terms and conditions is not subject to the consent of any third party. &nbsp; &nbsp;</p><p>&nbsp; &nbsp;</p><h3>25. Law and jurisdiction</h3><p>&nbsp; &nbsp;</p><p>25.1. These general terms and conditions shall be governed by and construed &nbsp; &nbsp; &nbsp; &nbsp;in accordance with the laws of the territory.</p><p>&nbsp; &nbsp;</p><p>25.2. Any disputes relating to these general terms and conditions shall be &nbsp; &nbsp; &nbsp; &nbsp;subject to the exclusive jurisdiction of the courts of the territory.</p><p>&nbsp; &nbsp;</p><h3>26. Our company details and notices</h3><p>&nbsp; &nbsp;</p><p>26.1. You can contact us by using the contact details listed in Appendix 1. &nbsp; &nbsp;</p><p>&nbsp; &nbsp;</p><p>26.2 You may contact our sellers for after-sales queries, including any &nbsp; &nbsp; &nbsp; &nbsp;disputes, by requesting their contact details from the Jumia in accordance with &nbsp; &nbsp; &nbsp; &nbsp;the Dispute Resolution Policy, pursuant to which Jumia shall be obliged to &nbsp; &nbsp; &nbsp; &nbsp;ensure that the seller is clearly identifiable.</p><p>&nbsp; &nbsp;</p><p>&nbsp; &nbsp; &nbsp; &nbsp;26.3 You consent to receive notices electronically from us. We may provide all &nbsp; &nbsp; &nbsp; &nbsp;communications and information related to your use of the marketplace in &nbsp; &nbsp; &nbsp; &nbsp;electronic format, either by posting to our website or application, or by email &nbsp; &nbsp; &nbsp; &nbsp;to the email address on your account. All such communications will be deemed to &nbsp; &nbsp; &nbsp; &nbsp;be notices in writing and received by and properly given to you</p>', '<p id=\"isPasted\">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Sem integer vitae justo eget magna fermentum. Sollicitudin tempor id eu nisl nunc. Consectetur purus ut faucibus pulvinar elementum. Est ante in nibh mauris cursus mattis molestie a. Enim lobortis scelerisque fermentum dui faucibus. Praesent tristique magna sit amet purus gravida. At erat pellentesque adipiscing commodo elit at imperdiet dui accumsan. Vestibulum sed arcu non odio euismod. Magna etiam tempor orci eu lobortis elementum nibh.</p><p><br></p><p>Mattis rhoncus urna neque viverra justo nec ultrices. Nibh venenatis cras sed felis eget. Facilisis magna etiam tempor orci eu lobortis elementum nibh. Nisl purus in mollis nunc sed id semper. Laoreet suspendisse interdum consectetur libero id faucibus. Mattis vulputate enim nulla aliquet porttitor lacus luctus. Libero nunc consequat interdum varius. Eu sem integer vitae justo eget. Pellentesque dignissim enim sit amet venenatis urna. Praesent semper feugiat nibh sed pulvinar proin. Nisl rhoncus mattis rhoncus urna neque. Sollicitudin aliquam ultrices sagittis orci a scelerisque purus semper eget. Justo eget magna fermentum iaculis eu non. Amet facilisis magna etiam tempor orci eu.</p><p><br></p><p>Pellentesque massa placerat duis ultricies lacus sed turpis tincidunt. Morbi non arcu risus quis varius quam quisque id. Purus semper eget duis at. Facilisi cras fermentum odio eu feugiat pretium. Mi in nulla posuere sollicitudin aliquam ultrices sagittis orci. Ut faucibus pulvinar elementum integer enim neque. Suspendisse faucibus interdum posuere lorem ipsum dolor sit. Scelerisque in dictum non consectetur a erat. Mi eget mauris pharetra et ultrices neque ornare. Euismod in pellentesque massa placerat duis ultricies lacus. Dictumst vestibulum rhoncus est pellentesque elit. Integer enim neque volutpat ac tincidunt vitae. Non tellus orci ac auctor augue. Ut sem nulla pharetra diam sit.</p><p><br></p><p>Enim sed faucibus turpis in eu mi bibendum neque. Integer vitae justo eget magna fermentum iaculis eu non. Et egestas quis ipsum suspendisse ultrices. Integer enim neque volutpat ac tincidunt vitae semper quis. Sagittis id consectetur purus ut. Porttitor rhoncus dolor purus non. Nibh cras pulvinar mattis nunc sed blandit libero volutpat. Lobortis elementum nibh tellus molestie nunc non blandit massa. Sit amet cursus sit amet dictum sit. Egestas purus viverra accumsan in nisl. Quisque sagittis purus sit amet volutpat consequat. Vitae semper quis lectus nulla at. Consectetur lorem donec massa sapien. Urna nunc id cursus metus aliquam eleifend mi in. Etiam sit amet nisl purus. Tincidunt arcu non sodales neque sodales ut etiam sit. Gravida cum sociis natoque penatibus et magnis dis parturient.</p><p><br></p><p>Pharetra diam sit amet nisl suscipit. Curabitur vitae nunc sed velit dignissim. Viverra accumsan in nisl nisi scelerisque eu ultrices. Nulla porttitor massa id neque aliquam. Libero justo laoreet sit amet cursus. Scelerisque eleifend donec pretium vulputate sapien nec sagittis aliquam. Sed vulputate mi sit amet mauris. Scelerisque viverra mauris in aliquam sem fringilla ut morbi. Est lorem ipsum dolor sit amet consectetur. Enim tortor at auctor urna nunc id cursus. Sit amet cursus sit amet dictum sit amet. Metus dictum at tempor commodo ullamcorper.</p>', '+254737229776', 'hello@devlan.co.ke', '<p>71 Pilgrim Avenue Chevy Chase, East California.</p>', 'faceboook.com/eArtworks', 'twitter/eartworks', 'instagram/eartworks', 'linkedin.com/eArtworks');

-- --------------------------------------------------------

--
-- Table structure for table `thirdparty_apis`
--

CREATE TABLE `thirdparty_apis` (
  `api_id` int(200) NOT NULL,
  `api_name` varchar(200) NOT NULL,
  `api_identification` longtext DEFAULT NULL,
  `api_token` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `thirdparty_apis`
--

INSERT INTO `thirdparty_apis` (`api_id`, `api_name`, `api_identification`, `api_token`) VALUES
(1, 'Flutterwave Rave', '', 'Your API TOKEN'),
(2, 'InfoBip Bulk SMS', '', 'Your API TOKEN'),
(5, 'Mpesa', 'Your API TOKEN', 'Your API TOKEN');

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
(1, 'Mart', 'Martin', 'm@gmail.com', '1998-07-13', '254740847563', '120 Kikima', 'a69681bcf334ae130217fea4505fd3c994f5683f', NULL, 'Pending', 'Active', 'Customer_1661348959.jpg', '2022-08-19 06:51:39', 'Customer', 0, '18MDVG', 0),
(8, 'Martin', 'Mbithi', 'm@protonmail.com', '2022-02-28', '+12523457895', '54-9865 Manhattan New York', 'a69681bcf334ae130217fea4505fd3c994f5683f', '7627807510fe621c846ec657', 'Confirmed', 'Active', 'Customer_1661408324.jpg', '2022-08-22 15:19:00', 'Administrator', 0, '1BP0TZ', 0),
(13, 'James', 'Doe', 'jamesdoe@gmail.com', '1998-07-13', '7234567890', '120 Localhost', '2a215231238ab859227b54b137dc6799a40fd39c', NULL, 'Pending', 'Active', NULL, '2022-08-27 04:29:00', 'Staff', 0, NULL, 0),
(14, 'Janet ', 'Monroe', 'janetmon89@gmail.com', '1996-08-15', '7901235648', '120 Beverley Hills California', '2a215231238ab859227b54b137dc6799a40fd39c', NULL, 'Pending', 'Active', NULL, '2022-08-27 04:29:00', 'Staff', 0, NULL, 0),
(15, 'Mr Hudson', 'Rivera', 'hudrivera76@hotmail.com', '1980-05-18', '7453328976', '54-9865 Manhattan New York', '2a215231238ab859227b54b137dc6799a40fd39c', NULL, 'Pending', 'Active', NULL, '2022-08-27 04:29:00', 'Staff', 0, NULL, 0),
(17, 'Hillary', 'Kagame', 'kagamehil876@gmail.com', '2022-08-01', '+255710988765', '127 Biashara Street. Kigali Rwanda', '67a74306b06d0c01624fe0d0249a570f4d093747', NULL, 'Pending', 'Active', NULL, '2022-08-29 08:46:56', 'Staff', 0, NULL, 0),
(18, 'Arthur ', 'Bailey', 'athurbailer@hotmail.com', '2022-08-02', '+89777654778', '120 Beverley Hills California', 'a69681bcf334ae130217fea4505fd3c994f5683f', NULL, 'Pending', 'Active', 'Staff_1661763132.jpg', '2022-08-29 08:52:11', 'Staff', 0, NULL, 0),
(19, 'Juliani', 'Slink', 'slinkjulian86@protonmail.com', '1978-01-07', '+12565438343', '54-9865 Manhattan New York', '63982e54a7aeb0d89910475ba6dbd3ca6dd4e5a1', NULL, 'Pending', 'Active', 'Administrator_1661763386.jpg', '2022-08-29 08:56:25', 'Administrator', 0, NULL, 0),
(25, 'Amparo ', ' Stephens', 'bailey.swif3@yahoo.com', '1964-07-13', '254026647392', '1644 Coffman Alley Louisville, Kentucky(KY), 40202', 'a69681bcf334ae130217fea4505fd3c994f5683f', NULL, 'Pending', 'Active', NULL, '2022-08-29 10:14:12', 'Customer', 0, NULL, 0),
(26, 'Kevin ', 'Vazquez', 'cloyd2004@hotmail.com', '1996-07-13', '910-824-4189', '4176 Twin Willow Lane Fayetteville, North Carolina(NC), 28301', '2a215231238ab859227b54b137dc6799a40fd39c', NULL, 'Pending', 'Active', NULL, '2022-08-29 10:14:12', 'Customer', 0, NULL, 0),
(27, 'Fawn ', 'Lee', 't91ozfav12o@temporary-mail.net', '1948-08-23', '857-829-2178', '3544 Metz Lane Cambridge, Massachusetts(MA), 02141', '2a215231238ab859227b54b137dc6799a40fd39c', NULL, 'Pending', 'Active', NULL, '2022-08-29 10:14:12', 'Customer', 0, NULL, 0),
(28, 'Benjamin', 'Wong', '5tj18gvlty4@temporary-mail.net', '1971-07-09', '401-209-6737', '573 Diamond Cove, Providence, Rhode Island(RI), 02905', '2a215231238ab859227b54b137dc6799a40fd39c', NULL, 'Pending', 'Active', NULL, '2022-08-29 10:14:12', 'Customer', 0, NULL, 0),
(29, 'Andrew', 'Hamilton', 'jegoxor344@vasqa.com', '1956-01-01', '802-595-9018', '1211 Essex Court, South Burlington, Vermont(VT), 05403', '2a215231238ab859227b54b137dc6799a40fd39c', NULL, 'Pending', 'Active', 'Customer_1661771148.jpg', '2022-08-29 10:14:13', 'Customer', 0, NULL, 0),
(30, 'Janet ', ' Durbin', 'orval.kuhi1@yahoo.com', '1997-03-08', '562-313-2116', '3339 Rainbow Road Long Beach, California(CA), 90802', 'a69681bcf334ae130217fea4505fd3c994f5683f', NULL, 'Pending', 'Active', 'Customer_1661770129.jpg', '2022-08-29 10:48:48', 'Customer', 0, NULL, 0),
(32, 'Jean R ', 'Ortiz', 'jordi.legro0@hotmail.com', '1971-05-10', '336-402-2925', '2835 Bryan Street, Greensboro, North Carolina(NC), 27406', '2a215231238ab859227b54b137dc6799a40fd39c', NULL, 'Pending', 'Active', NULL, '2022-08-29 10:55:56', 'Customer', 0, NULL, 0),
(33, 'Juan ', 'Demarco', 'thaddeus_johns@yahoo.com', '1983-12-05', '832-426-8655', '2887 Worthington Drive, Richardson, Texas(TX), 75081', '2a215231238ab859227b54b137dc6799a40fd39c', NULL, 'Pending', 'Active', 'Customer_1661770676.jpg', '2022-08-29 10:57:55', 'Customer', 0, NULL, 0),
(35, 'Devlan ', 'Solutions LTD', 'HH@gmail.com', '1998-12-08', '+254740847561', '120 Kikima, Mbooni', 'a69681bcf334ae130217fea4505fd3c994f5683f', NULL, 'Confirmed', 'Active', NULL, '2022-09-12 12:51:05', 'Customer', 0, NULL, 0);

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
-- Indexes for table `crypto_payments`
--
ALTER TABLE `crypto_payments`
  ADD PRIMARY KEY (`paymentID`),
  ADD UNIQUE KEY `key3` (`boxID`,`orderID`,`userID`,`txID`,`amount`,`addr`),
  ADD KEY `boxID` (`boxID`),
  ADD KEY `boxType` (`boxType`),
  ADD KEY `userID` (`userID`),
  ADD KEY `countryID` (`countryID`),
  ADD KEY `orderID` (`orderID`),
  ADD KEY `amount` (`amount`),
  ADD KEY `amountUSD` (`amountUSD`),
  ADD KEY `coinLabel` (`coinLabel`),
  ADD KEY `unrecognised` (`unrecognised`),
  ADD KEY `addr` (`addr`),
  ADD KEY `txID` (`txID`),
  ADD KEY `txDate` (`txDate`),
  ADD KEY `txConfirmed` (`txConfirmed`),
  ADD KEY `txCheckDate` (`txCheckDate`),
  ADD KEY `processed` (`processed`),
  ADD KEY `processedDate` (`processedDate`),
  ADD KEY `recordCreated` (`recordCreated`),
  ADD KEY `key1` (`boxID`,`orderID`),
  ADD KEY `key2` (`boxID`,`orderID`,`userID`);

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
  ADD KEY `Payment Order ID` (`payment_order_code`),
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
-- Indexes for table `shopping_cart`
--
ALTER TABLE `shopping_cart`
  ADD PRIMARY KEY (`cart_id`),
  ADD KEY `Cart_User_Id` (`cart_user_id`),
  ADD KEY `Cart_Product_id` (`cart_product_id`);

--
-- Indexes for table `stkpush`
--
ALTER TABLE `stkpush`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `stores`
--
ALTER TABLE `stores`
  ADD PRIMARY KEY (`store_id`),
  ADD KEY `Store Owner ID` (`store_user_id`);

--
-- Indexes for table `system_litecms`
--
ALTER TABLE `system_litecms`
  ADD PRIMARY KEY (`system_id`);

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
  MODIFY `category_id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `crypto_payments`
--
ALTER TABLE `crypto_payments`
  MODIFY `paymentID` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `mailer_settings`
--
ALTER TABLE `mailer_settings`
  MODIFY `mailer_id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `payment_id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `payment_means`
--
ALTER TABLE `payment_means`
  MODIFY `means_id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `shopping_cart`
--
ALTER TABLE `shopping_cart`
  MODIFY `cart_id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `stkpush`
--
ALTER TABLE `stkpush`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `stores`
--
ALTER TABLE `stores`
  MODIFY `store_id` int(200) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `system_litecms`
--
ALTER TABLE `system_litecms`
  MODIFY `system_id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `thirdparty_apis`
--
ALTER TABLE `thirdparty_apis`
  MODIFY `api_id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `wishlists`
--
ALTER TABLE `wishlists`
  MODIFY `wishlist_id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

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
  ADD CONSTRAINT `Payment Means ID` FOREIGN KEY (`payment_means_id`) REFERENCES `payment_means` (`means_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `Product Category ID` FOREIGN KEY (`product_category_id`) REFERENCES `categories` (`category_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `Product Seller ID` FOREIGN KEY (`product_seller_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `shopping_cart`
--
ALTER TABLE `shopping_cart`
  ADD CONSTRAINT `Cart_Product_id` FOREIGN KEY (`cart_product_id`) REFERENCES `products` (`product_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `Cart_User_Id` FOREIGN KEY (`cart_user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

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
