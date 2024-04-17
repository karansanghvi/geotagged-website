-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 17, 2024 at 11:05 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `geotagged_products`
--

-- --------------------------------------------------------

--
-- Table structure for table `carttable`
--

CREATE TABLE `carttable` (
  `userID` int(11) NOT NULL,
  `productName` varchar(255) NOT NULL,
  `category` varchar(255) NOT NULL,
  `price` int(255) NOT NULL,
  `imageLink` varchar(255) NOT NULL,
  `quantity` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `carttable`
--

INSERT INTO `carttable` (`userID`, `productName`, `category`, `price`, `imageLink`, `quantity`) VALUES
(1, 'Bird The Symbol Of Love', 'Traditional Art', 2000, '', 7),
(2, 'Ram Vivah', 'Traditional Art', 3600, '../../assets/images/product_images/traditional_art/madhubani_art/1678953220188Ram -Sita.png', 3);

-- --------------------------------------------------------

--
-- Table structure for table `customerdetail`
--

CREATE TABLE `customerdetail` (
  `userID` int(11) NOT NULL,
  `pincode` varchar(10) NOT NULL,
  `flatHouseNo` varchar(255) NOT NULL,
  `building` varchar(255) NOT NULL,
  `area` varchar(255) NOT NULL,
  `landmark` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `customerdetail`
--

INSERT INTO `customerdetail` (`userID`, `pincode`, `flatHouseNo`, `building`, `area`, `landmark`) VALUES
(1, '400059', '4th Floor, 405', 'Akar', '4th floor Room Number 405', 'Sevenhills'),
(2, '400059', '8th Floor, 410', 'My Building', 'My Road', 'Hospital');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `productid` int(11) NOT NULL,
  `productName` varchar(255) NOT NULL,
  `prevPrice` int(10) NOT NULL,
  `newPrice` int(10) NOT NULL,
  `state` varchar(255) NOT NULL,
  `link` varchar(255) NOT NULL,
  `imageLink` varchar(255) NOT NULL,
  `category` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`productid`, `productName`, `prevPrice`, `newPrice`, `state`, `link`, `imageLink`, `category`) VALUES
(28, 'Ram Vivah', 3600, 4032, 'Bihar', '../productpages/traditional_art/product_art_1.html', '../assets/images/product_images/traditional_art/madhubani_art/1678953220188Ram -Sita.png', 'Traditional Art'),
(29, 'Birds The Symbol Of Love', 2000, 1904, 'Bihar', '../productpages/traditional_art/product_art_2.html', '../assets/images/product_images/traditional_art/madhubani_art/1615571146923Bird.jpg', 'Traditional Art'),
(30, 'Beautiful Tea Coaster', 400, 336, 'West Bengal', '../productpages/traditional_art/product_art_3.html', '../assets/images/product_images/traditional_art/banglar_patachitra/1678953122984Tea costar.jpeg', 'Traditional Art'),
(31, 'Patachitra Painting', 750, 672, 'West Bengal', '../productpages/traditional_art/product_art_4.html', '../assets/images/product_images/traditional_art/banglar_patachitra/1678952913470Patachitra.jpeg', 'Traditional Art'),
(32, 'Tribal Lady', 700, 548, 'Rajasthan', '../productpages/traditional_craft/product_traditional_craft_2.html', '../assets/images/product_images/traditional_craft/1678949318901B.jpg', 'Traditional Craft'),
(33, 'Walnut Wood Tissue Box', 3550, 2783, 'Kashmir', '../productpages/traditional_craft/product_traditional_craft_1.html', '../assets/images/product_images/traditional_craft/1613716745869walnut.jpg', 'Traditional Craft'),
(34, 'Banarasi Silk Saree', 5000, 4987, 'Uttar Pradesh', '../productpages/indiansaree/product_indiansaree_1.html', '../assets/images/product_images/indian_saree/1676319418496A.jpeg', 'Indian Saree'),
(35, 'Santipur Tant Saree', 900, 756, 'West Bengal', '../productpages/indiansaree/product_indiansaree_2.html', '../assets/images/product_images/indian_saree/1676316784448A.png', 'Indian Saree'),
(36, 'Dhaniakhali Dobby Buti Saree', 1300, 955, 'West Bengal', '../productpages/indiansaree/product_indiansaree_3.html', '../assets/images/product_images/indian_saree/1676318530893A.jpeg', 'Indian Saree'),
(37, 'Shatal Karwati Saree', 10500, 9922, 'Maharashtra', '../productpages/indiansaree/product_indiansaree_4.html', '../assets/images/product_images/indian_saree/1678127700738C.jpeg', 'Indian Saree'),
(38, 'Phulkari Saree', 2470, 2334, 'Punjab', '../productpages/indiansaree/product_indiansaree_5.html', '../assets/images/product_images/indian_saree/1676316305547A.jpg', 'Indian Saree'),
(39, 'Phulkari Dupatta', 825, 693, 'Punjab', '../productpages/dupatta/product_dupatta_1.html', '../assets/images/product_images/dupatta/1678951930718H.jpeg', 'Dupatta'),
(40, 'Patachitra Dupatta', 1000, 892, 'West Bengal', '../productpages/dupatta/product_dupatta_2.html', '../assets/images/product_images/dupatta/1610605956573patachitra dupatta.jpeg', 'Dupatta'),
(41, 'Pashmina Shawl', 70000, 69825, 'Kashmir', '../productpages/shawl/product_shawl_1.html', '../assets/images/product_images/shawl/1618056561332pashmina.jpg', 'Shawl'),
(42, 'Kani Shawl', 2240, 1881, 'Jammu and Kashmir', '../productpages/shawl/product_shawl_2.html', '../assets/images/product_images/shawl/1619204701363banana.jpg', 'Shawl'),
(43, 'Phulkari Shawl', 1330, 1117, 'Punjab', '../productpages/shawl/product_shawl_3.html', '../assets/images/product_images/shawl/1678950105303F.jpg', 'Shawl'),
(44, 'Mysore Sandal Agarbatti', 120, 94, 'Karnataka', '../productpages/grocery/product_grocery_1.html', '../assets/images/product_images/grocery/1616520737707agarbatti.jpg', 'Grocery'),
(45, 'Mysore Sandal Soap', 300, 230, 'Karnataka', '../productpages/grocery/product_grocery_2.html', '../assets/images/product_images/grocery/1607622048831mysore sandal soap.jpg', 'Grocery'),
(46, 'Darjeeling Tea', 1200, 1134, 'West Bengal', '../productpages/grocery/product_grocery_3.html', '../assets/images/product_images/grocery/1617726622353Black Tea.jpg', 'Grocery'),
(47, 'Tulaipanji Rice', 1000, 945, 'West Bengal', '../productpages/grocery/product_grocery_4.html', '../assets/images/product_images/grocery/1616406204330tulaipanji  .jpg', 'Grocery'),
(48, 'Banglar Rosogolla', 500, 413, 'West Bengal', '../productpages/sweets/product_sweets_1.html', '../assets/images/product_images/sweets/1618634393321Rosogolla.jpg', 'Sweets'),
(49, 'Elephant Pair Terracotta', 6000, 5376, 'Uttar Pradesh', '../productpages/clay_craft/product_claycraft_1.html', '../assets/images/product_images/clay_craft/1619420247770terracotta.jpg', 'Clay Craft'),
(50, 'Chhau Mask Ganesh Ji', 900, 756, 'West Bengal', '../productpages/clay_craft/product_claycraft_2.html', '../assets/images/product_images/clay_craft/1619202961553ganesh-ji.jpg', 'Clay Craft'),
(51, 'Khurja Pottery Bowl Lamp', 700, 689, 'Uttar Pradesh', '../productpages/clay_craft/product_claycraft_3.html', '../assets/images/product_images/clay_craft/1608104376989bowl-600x600.jpg', 'Clay Craft'),
(52, 'Saharanpur Light', 800, 761, 'Uttar Pradesh', '../productpages/wooden_craft/product_woodencraft_1.html', '../assets/images/product_images/wooden_craft/1617733888247light.jpg', 'Wooden Craft'),
(53, 'Walnut Wood Carving Bowl', 2700, 2661, 'Kashmir', '../productpages/wooden_craft/product_woodencraft_1.html', '../assets/images/product_images/wooden_craft/1616406824249walnut a .jpg', 'Wooden Craft'),
(54, 'Copper Bottles and Glasses', 1499, 1415, 'Uttar Pradesh', '../productpages/metal_craft/product_metalcraft_1.html', '../assets/images/product_images/metal_craft/1617653174946moradabad a.jpg', 'Metal Craft');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `userID` int(11) NOT NULL,
  `firstName` varchar(50) NOT NULL,
  `lastName` varchar(50) NOT NULL,
  `userEmail` varchar(255) NOT NULL,
  `userPassword` varchar(255) NOT NULL,
  `userMobile` varchar(10) NOT NULL,
  `is_Subscribed` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`userID`, `firstName`, `lastName`, `userEmail`, `userPassword`, `userMobile`, `is_Subscribed`) VALUES
(1, 'User', 'Name', 'user@gmail.com', 'User@123', '9892662500', 1),
(2, 'Yakshit', 'Poojary', 'yakshitpoojary2004@gmail.com', 'Yakshit@123', '9892662500', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`productid`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`userID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `productid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `userID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
