-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 30, 2024 at 05:11 AM
-- Server version: 10.6.17-MariaDB-cll-lve
-- PHP Version: 8.1.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cardanoproperty_dbMay20`
--

-- --------------------------------------------------------

--
-- Table structure for table `about`
--

CREATE TABLE `about` (
  `id` int(10) NOT NULL,
  `title` varchar(100) NOT NULL,
  `content` longtext NOT NULL,
  `image` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `about`
--

INSERT INTO `about` (`id`, `title`, `content`, `image`) VALUES
(10, 'About Us', '<div id=\"pgc-w5d0dcc3394ac1-0-0\" class=\"panel-grid-cell\">\n\n<br><br><b>1. Welcome to Cardano Property Solutions</b>\n\n<br><br>At Cardano Property Solutions we believe that property investment should be for all people irregardless of income. By use of Cardano Blockchain Tokenization and Fractionalization, we allow anyone to invest in real estate.\n\n<br><br><b>2. Why Choose Us?</b>\n\n<br><br>1. Personalized Service: We understand that every client is unique, and we tailor our services to meet your specific needs. From the initial consultation to the closing of the deal, our team is committed to providing personalized attention and exceptional service.\n\n<br>2. Expertise: With years of experience in the real estate industry, our team of professionals has the knowledge and expertise to help you navigate the complexities of the property market. Whether you\'re buying, selling, or renting, you can trust us to provide sound advice and guidance.\n\n<br>3. Wide Range of Properties: Whether you\'re looking for a starter home, a luxury estate, or a commercial space, we have a diverse portfolio of properties to suit every budget and lifestyle. Browse our listings to discover your perfect match.\n\n<br>4. Transparent Transactions: We believe in transparency and integrity in all our dealings. You can trust us to provide honest and accurate information about properties, pricing, and market trends, so you can make informed decisions with confidence.\n\n<br>5. Customer Satisfaction: Our top priority is customer satisfaction. We go above and beyond to exceed your expectations and ensure a smooth and hassle-free experience from start to finish. Your satisfaction is our success.\n\n<br><br><b>3. Our Services</b>\n\n<br><br>a)- NFT Tokenization: This technology allows properties to be sold in fractions as shares - bridging the gap between poor and rich.\n\n<br>b)- Buying: Whether you\'re a first-time buyer or a seasoned investor, we\'re here to help you find your dream property. Our team will assist you in every step of the buying process, from property search to negotiation to closing.\n\n<br>c)- Selling: Ready to sell your property? Let us help you get the best possible price in the shortest amount of time. We\'ll market your property effectively, attract qualified buyers, and handle all the details to ensure a successful sale.\n\n<br>d)- Renting: Looking for a rental property? We have a wide selection of rental properties available, from apartments to single-family homes to commercial spaces. Let us help you find the perfect rental that meets your needs and budget.\n\n<br>e)- Property Management: Managing rental properties can be a daunting task. Let our experienced property management team handle the day-to-day responsibilities, from tenant screening to rent collection to maintenance, so you can enjoy passive income without the stress.\n\n<br><br><b>4. Contact Us</b>\n\n<br><br>Ready to find your perfect property or invest in real estate? Contact us today to get started. Our team of friendly and knowledgeable professionals is here to help you every step of the way. Let\'s make your property dreams a reality!\n</div>', '');

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `aid` int(10) NOT NULL,
  `auser` varchar(50) NOT NULL,
  `aemail` varchar(50) NOT NULL,
  `apass` varchar(50) NOT NULL,
  `aphone` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`aid`, `auser`, `aemail`, `apass`, `aphone`) VALUES
(9, 'admin', 'besi@tobb.co.za', '9ee242c94d67d7a5d6c77e18111b70a47a919768', '0731820631');

-- --------------------------------------------------------

--
-- Table structure for table `city`
--

CREATE TABLE `city` (
  `cid` int(50) NOT NULL,
  `cname` varchar(100) NOT NULL,
  `sid` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `city`
--

INSERT INTO `city` (`cid`, `cname`, `sid`) VALUES
(11, 'Floson', 2),
(12, 'Ulmore', 7),
(13, 'Awrerton', 15),
(14, 'Malvern', 2),
(15, 'Soweto', 2);

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `cid` int(50) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `subject` varchar(100) NOT NULL,
  `message` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`cid`, `name`, `email`, `phone`, `subject`, `message`) VALUES
(7, 'codeastro', 'asda@asd.com', '8888885454', 'codeastro.com', 'asdasdasd');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `fid` int(50) NOT NULL,
  `uid` int(50) NOT NULL,
  `fdescription` varchar(300) NOT NULL,
  `status` int(1) NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`fid`, `uid`, `fdescription`, `status`, `date`) VALUES
(8, 33, 'Service was very good', 1, '2022-07-23 21:51:09');

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` int(11) NOT NULL,
  `lastName` varchar(50) DEFAULT NULL,
  `firstName` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `phone` varchar(50) DEFAULT NULL,
  `message` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `lastName`, `firstName`, `email`, `phone`, `message`, `created_at`) VALUES
(3, 'James', 'Sibanda', 'j@cardanopropertysolutions.co', ' 27731820631', 'This is testing this contact us', '2024-05-25 18:06:32'),
(4, 'Henry', 'Great', 'g@wims.io', '0494949', 'hie', '2024-05-25 18:09:23');

-- --------------------------------------------------------

--
-- Table structure for table `property`
--

CREATE TABLE `property` (
  `pid` int(50) NOT NULL,
  `title` varchar(200) NOT NULL,
  `pcontent` longtext NOT NULL,
  `type` varchar(100) NOT NULL,
  `bhk` varchar(50) NOT NULL,
  `stype` varchar(100) NOT NULL,
  `bedroom` int(50) NOT NULL,
  `bathroom` int(50) NOT NULL,
  `balcony` int(50) NOT NULL,
  `kitchen` int(50) NOT NULL,
  `hall` int(50) NOT NULL,
  `floor` varchar(50) NOT NULL,
  `size` int(50) NOT NULL,
  `price` int(50) NOT NULL,
  `location` varchar(200) NOT NULL,
  `city` varchar(100) NOT NULL,
  `state` varchar(100) NOT NULL,
  `feature` longtext NOT NULL,
  `pimage` varchar(300) NOT NULL,
  `pimage1` varchar(300) NOT NULL,
  `pimage2` varchar(300) NOT NULL,
  `pimage3` varchar(300) NOT NULL,
  `pimage4` varchar(300) NOT NULL,
  `uid` int(50) NOT NULL,
  `status` varchar(50) NOT NULL,
  `mapimage` varchar(300) NOT NULL,
  `topmapimage` varchar(300) NOT NULL,
  `groundmapimage` varchar(300) NOT NULL,
  `totalfloor` varchar(50) NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp(),
  `isFeatured` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `property`
--

INSERT INTO `property` (`pid`, `title`, `pcontent`, `type`, `bhk`, `stype`, `bedroom`, `bathroom`, `balcony`, `kitchen`, `hall`, `floor`, `size`, `price`, `location`, `city`, `state`, `feature`, `pimage`, `pimage1`, `pimage2`, `pimage3`, `pimage4`, `uid`, `status`, `mapimage`, `topmapimage`, `groundmapimage`, `totalfloor`, `date`, `isFeatured`) VALUES
(32, '78 Kind Court', 'Spacious family home\r\nHouse for sale in Norwood. 4 bedrooms, 3 full bathrooms, 2 with bath, 1 with shower, fireplace, 1 large sunroom, 1 large playroom. 2 completely separate kitchen sinks. 1 year minimum. Very close to Cheltondale park, shuls & Norwood mall. Newly renovated. R16500 Photos available on request.\r\n\r\nPrepaid Electricity', 'house', '2 BHK', 'sale', 1, 1, 1, 1, 1, '1st Floor', 300, 400000, '320 Orange Roud, The Gardens, Johannesburg', 'Johannesburg', 'Gauteng', '', 'r-architecture-TRCJ-87Yoh0-unsplash.jpg', 'r-architecture-KQgrVfR3r74-unsplash.jpg', 'jason-briscoe-UV81E0oXXWQ-unsplash.jpg', 'bernard-hermant-KqOLr8OiQLU-unsplash.jpg', 'r-architecture-0tKCSyLXqQM-unsplash.jpg', 29, 'available', 'pixasquare-4ojhpgKpS68-unsplash.jpg', '', '', '1 Floor', '2024-05-27 04:23:26', 0),
(33, '1 249 000,  2 Bed Apartment in Rivonia 4 3rd Avenue, 19 Stiglingh Road', 'I challenge you to find a 116 m2, 2 Bed, 2 Bath in Sandton on this website for this price. Other apartments at 76-90 m2 are selling at this price. Let me assure you that 20-30 m2 more space in an apartment makes a massive difference to your quality of life (especially if 2 people tend to work from home).', 'house', '3 BHK', 'sale', 3, 2, 1, 2, 1, '1st Floor', 96, 1, 'Rivonia 4 3rd Avenue, 19 Stiglingh Road', 'johannesburg', 'Gauteng', '', 'jason-briscoe-AQl-J19ocWE-unsplash.jpg', 'bernard-hermant-KqOLr8OiQLU-unsplash.jpg', 'r-architecture-TRCJ-87Yoh0-unsplash.jpg', 'r-architecture-TRCJ-87Yoh0-unsplash.jpg', 'r-architecture-T6d96Qrb5MY-unsplash.jpg', 30, 'sold out', 'pixasquare-4ojhpgKpS68-unsplash.jpg', 'r-architecture-KQgrVfR3r74-unsplash.jpg', 'r-architecture-KQgrVfR3r74-unsplash.jpg', '1 Floor', '2024-05-27 07:04:32', 1),
(34, '3 650 000 3 Bed House in Hyde Park 2 Ss Pinelands, 50 1st Road', '3 650 000 3 Bed House in Hyde Park 2 Ss Pinelands, 50 1st Road\r\nBeautiful open plan duplex in Heart of Hyde Park.\r\n\r\nThis 3-bedroom unit was designed by a renowned Architect Michael Sutton and offers open plan, unique living in the heart of Hyde Park.\r\n\r\nAs you enter this captivating, north facing duplex, the Modern open plan living with dense garden takes you out of the city while in the heart of Hyde Park.\r\n\r\nThe home offers sizeable entertainment space with dining room and lounge which flow effortlessly out onto the wooden deck and feature tropical garden allowing you to get lost in the tranquility it offers.\r\n\r\nA study area maximises the tranquility of the garden with serene views into the space.\r\n\r\nThe beautifully finished chefs kitchen has a gas hob with electric oven, granite tops and ample cupboard space with additional scullery and laundry area with space for all appliances.\r\n\r\nUpstairs, the accommodation consists of 3 bedrooms, 2 bathrooms (Main en-suite). The main bedroom offers additional dressing area and the bathroom has been given wooden paneling to enhance the uniqueness and authenticity.\r\n\r\nAdditional features include: a double garage, 24 hour security, plantation security shutters, pool in the complex, additional secure visitors parking, air-conditioning and so much more tobeappreciated.\r\n\r\n', 'house', '3 BHK', 'sale', 4, 3, 1, 2, 1, '1st Floor', 200000, 3, 'Hyde Park 2 Ss Pinelands, 50 1st Road', 'johannesburg', 'Gauteng', '', 'r-architecture-JvQ0Q5IkeMM-unsplash.jpg', 'r-architecture-TRCJ-87Yoh0-unsplash.jpg', 'r-architecture-T6d96Qrb5MY-unsplash.jpg', 'jason-briscoe-UV81E0oXXWQ-unsplash.jpg', 'r-architecture-wJAOeXvxudM-unsplash.jpg', 30, 'available', '', '', '', '1 Floor', '2024-05-27 07:20:27', 1),
(35, '2 295 000  Costs 3 Bed House in Lombardy East', 'Spacious family home with THREE cottages\r\n\r\nGreat Investment - WOW\r\n\r\nSpacious family home in secure well established enclosed area (Currently undergoing)\r\n\r\nThe lovely family home consists of 3 north facing bedrooms with built in cupboards.\r\n\r\n2.5 bathrooms (one is en-suite) all updated modern bathrooms fully tiled.\r\n\r\nLarge modern fully tiled kitchen with a gas stove and granite tops.\r\n\r\nOpen-plan north facing lounge with fire place and laminated floors, opening out onto covered patio.\r\n\r\nOpen Plan Dining-Room with laminated floors and leading out onto covered patio, large garden and pool.\r\n\r\nLovely cozy separate north facing second lounge/TV room with laminated floors.\r\n\r\nMost of the windows in the house are aluminum windows/doors.\r\n\r\nThe covered patio is spacious, comfortable for entertaining and braaing, nice and sunny to sit and watch the sun go down whilst sipping on a sundowner, there is also a fish pond under the patio\r\n\r\nFrom the patio you are overlooking the large pool and large garden, big enough for the kids to play soccer or ride their bicycles.\r\n\r\nThe property is on pre-paid electricity.\r\n\r\nCovered parking for Four vehicles\r\n\r\nLock up double garage.\r\n\r\nPlenty open parking area.\r\n\r\nThis home has great potential, one can do so much more on the property to make it your dream home and easy living.\r\n\r\nWell-organized community neighborhood.\r\n\r\nCOTTAGES x 3\r\n\r\nThere are THREE cottages on the property, this could be potential income for home owner.\r\n\r\nThere are two large one bed cottages with a lounge, kitchen and bathroom on the property.\r\n\r\nThere is one bachelor cottage.\r\n\r\nPlenty space at back of property to build another cottage.\r\n\r\nSeparate front gate entrance and covered parking for the tenants, so no need to use the main driveway.\r\n\r\nTwo of the cottages are on prepaid water & electricity.\r\n\r\nThe third cottage works off the main house prepaid electricity.\r\n\r\nDon\'t delay, call now to view and put in an offer.\r\n\r\n', 'house', '5 BHK', 'sale', 2, 3, 3, 2, 3, '2nd Floor', 600000, 2, '3 Bed House in Lombardy East', 'Johannesburg', 'Gauteng', '', 'property-10323918-88435502_dhd.jpg', 'property-10323918-48529088_dhd.jpg', 'property-10323918-55541295_dhd.jpg', 'property-10323918-55563380_dhd.jpg', 'property-10323918-15015654_dhd.jpg', 35, 'available', '', '', '', '2 Floor', '2024-05-27 07:35:28', 1),
(37, 'Flat , 23000000 King Court Avenue , Johannesburg', 'Exclusive property for sale at a safe and quiet environment.', 'flat', '3 BHK', 'sale', 4, 2, 1, 1, 1, '3rd Floor', 3000, 23000000, ' King Court Avenue , Johannesburg', 'Johannesburg', 'Gauteng', '', 'r-architecture-T6d96Qrb5MY-unsplash.jpg', 'r-architecture-KqMaA8gDfl0-unsplash.jpg', 'jason-briscoe-UV81E0oXXWQ-unsplash.jpg', 'pixasquare-4ojhpgKpS68-unsplash.jpg', 'r-architecture-0tKCSyLXqQM-unsplash.jpg', 37, 'available', '', '', '', '3 Floor', '2024-05-28 19:22:15', 1);

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `id` int(10) NOT NULL,
  `title` varchar(100) NOT NULL,
  `content` longtext NOT NULL,
  `image` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`id`, `title`, `content`, `image`) VALUES
(10, 'Services', '<div id=\"pgc-w5d0dcc3394ac1-0-0\" class=\"panel-grid-cell\">\n\n<br><b>1. Properties Listing</b>\n\n<br><br>This platform gives any property sales agent free listing of properties in any area of their choice. One needs to be a registered member to do this.\n\n<br><br><b>2. Properties Investments ADA</b>\n\n<br><br>People are able to invest whole or in part on properties listed using Cardano ADA. The advantage this gives is a person only needs to have a Cardano wallet. No KYC or huge income needed.\n\n<br><br><b>3. Properties Sales</b>\n\n<br><br>Properties can be sold in whole or in shares to the public. This brings liquidity to the real estate industry.\n\n<br><br><b>4. Properties Rent</b>\n\n<br><br>This service allows rental properties listing and management using cryptocurrency ADA. Agents are also able to use this conduct surveys to find out what clients like most.\n\n</div>', '');

-- --------------------------------------------------------

--
-- Table structure for table `state`
--

CREATE TABLE `state` (
  `sid` int(50) NOT NULL,
  `sname` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `state`
--

INSERT INTO `state` (`sid`, `sname`) VALUES
(2, 'Gauteng'),
(3, 'Floaii'),
(4, 'Virconsin'),
(7, 'West Misstana\n\n'),
(15, 'Wisginia\n\n');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `uid` int(50) NOT NULL,
  `uname` varchar(100) NOT NULL,
  `uemail` varchar(100) NOT NULL,
  `uphone` varchar(20) NOT NULL,
  `upass` varchar(50) NOT NULL,
  `utype` varchar(50) NOT NULL,
  `uimage` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`uid`, `uname`, `uemail`, `uphone`, `upass`, `utype`, `uimage`) VALUES
(29, 'James', 'james@prop.co', '7775552214', '9ee242c94d67d7a5d6c77e18111b70a47a919768', 'team', 'user-a-min.png'),
(30, 'Beauty', 'b@prop.com', '7896665555', '9ee242c94d67d7a5d6c77e18111b70a47a919768', 'team', 'user-default-3-min.png'),
(33, 'Carl Jones', 'carl@mail.com', '1458887969', '6812f136d636e737248d365016f8cfd5139e387c', 'user', 'user-profile-min.png'),
(35, 'Ruth', 'r@prop.com', '8542221140', '9ee242c94d67d7a5d6c77e18111b70a47a919768', 'team', 'user-profile-min.png'),
(36, 'bernard', 'besi@tobb.co.za', '0731820631', '80853a738feeaa63f17ebae9f158d653a5f602fd', 'team', 'bernard.jpeg'),
(37, 'Mary Gilton', 'm@prop.com', '0742334876', '9ee242c94d67d7a5d6c77e18111b70a47a919768', 'team', 'user-default-3-min.png');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `about`
--
ALTER TABLE `about`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`aid`);

--
-- Indexes for table `city`
--
ALTER TABLE `city`
  ADD PRIMARY KEY (`cid`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`cid`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`fid`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `property`
--
ALTER TABLE `property`
  ADD PRIMARY KEY (`pid`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `state`
--
ALTER TABLE `state`
  ADD PRIMARY KEY (`sid`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`uid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `about`
--
ALTER TABLE `about`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `aid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `city`
--
ALTER TABLE `city`
  MODIFY `cid` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `cid` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `fid` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `property`
--
ALTER TABLE `property`
  MODIFY `pid` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `state`
--
ALTER TABLE `state`
  MODIFY `sid` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `uid` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
