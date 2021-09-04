-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 18, 2021 at 05:33 PM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 7.3.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `food-order`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `id` int(11) UNSIGNED NOT NULL,
  `full_name` varchar(100) DEFAULT NULL,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`id`, `full_name`, `username`, `password`) VALUES
(18, 'akash khan', 'akashkhan', '9e95f6d797987b7da0fb293a760fe57e'),
(19, 'kawsar', 'kawsarali', '81dc9bdb52d04dc20036dbd8313ed055'),
(21, 'Tushar Kanti ', 'tusharkanti', '21232f297a57a5a743894a0e4a801fc3'),
(22, 'Jannatul ferdwosi', 'Jannatulferdwosi', '21232f297a57a5a743894a0e4a801fc3'),
(25, 'tapasy rebeya', 'tapasyrebeya', '827ccb0eea8a706c4c34a16891f84e7b');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_category`
--

CREATE TABLE `tbl_category` (
  `id` int(11) UNSIGNED NOT NULL,
  `title` varchar(100) DEFAULT NULL,
  `image_name` varchar(255) DEFAULT NULL,
  `featured` varchar(10) DEFAULT NULL,
  `active` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_category`
--

INSERT INTO `tbl_category` (`id`, `title`, `image_name`, `featured`, `active`) VALUES
(8, 'Pizza', 'Food_Category_875.jpg', 'Yes', 'Yes'),
(9, 'Burger', 'Food_Category_971.jpg', 'Yes', 'Yes'),
(11, 'Momos', 'Food_Category_504.jpg', 'Yes', 'Yes'),
(16, 'Soft drink', 'Food_Category_193.jpeg', 'Yes', 'Yes'),
(17, 'Milk Shake', 'Food_Category_109.jpeg', 'Yes', 'Yes'),
(18, 'Hot Dog', 'Food_Category_996.jpeg', 'Yes', 'Yes'),
(19, 'Noodles', 'Food_Category_495.jpeg', 'Yes', 'Yes'),
(20, 'Pancake', 'Food_Category_5.jpeg', 'Yes', 'Yes'),
(21, 'Muffin', 'Food_Category_620.jpeg', 'Yes', 'Yes');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_food`
--

CREATE TABLE `tbl_food` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(150) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `price` decimal(10,2) DEFAULT NULL,
  `image_name` varchar(255) DEFAULT NULL,
  `category_id` int(10) UNSIGNED DEFAULT NULL,
  `featured` varchar(10) DEFAULT NULL,
  `active` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_food`
--

INSERT INTO `tbl_food` (`id`, `title`, `description`, `price`, `image_name`, `category_id`, `featured`, `active`) VALUES
(17, 'Best Burger', 'Burger with BBQ pineapple, Ham', '4.00', 'Food-Name-7461.jpg', 9, 'Yes', 'Yes'),
(18, 'Smoky BBQ Pizza', 'Best firewood pizza in town', '6.00', 'Food-Name-3820.jpg', 8, 'No', 'Yes'),
(21, 'Dumpling Special', 'Chicken Dumping with herbs from mountains', '5.00', 'Food-Name-1965.jpg', 11, 'No', 'Yes'),
(22, 'Chicken Burger', 'Chicken Burger with cheese. testy', '7.00', 'Food-Name-8092.jpg', 9, 'No', 'Yes'),
(55, 'Ham burger', 'Made with Italian Sauce, ', '30.00', 'Food-Name-9589.jpeg', 9, 'No', 'Yes'),
(56, 'Milk shake', 'Made with Italian milk, and organice sweet.', '35.00', 'Food-Name-2222.jpeg', 17, 'Yes', 'Yes'),
(57, 'Chees burger', 'Made with Italian Sauce, Chicken, and organice vegetables.', '25.00', 'Food-Name-4630.jpeg', 9, 'No', 'Yes'),
(58, 'Special Burger', 'Made with German Sauce, beef, and stawberry, sauses', '70.00', 'Food-Name-9871.jpeg', 9, 'Yes', 'Yes'),
(59, 'Burger', 'Made with Italian Sauce, Chicken, and organice vegetables.', '20.00', 'Food-Name-2578.jpeg', 9, 'No', 'No'),
(60, 'chicken pizza', 'Made with Italian Sauce, Chicken, and organice vegetables.', '80.00', 'Food-Name-6925.jpeg', 8, 'Yes', 'Yes'),
(61, 'cheese pizza', 'Made with Italian Sauce, Cheese, and organice vegetables.', '70.00', 'Food-Name-4062.jpeg', 8, 'No', 'Yes'),
(62, 'Beef Pizza', 'Made with thai Sauce, beef, and vegetables.', '100.00', 'Food-Name-4145.jpeg', 8, 'Yes', 'Yes'),
(63, 'Pepsi', 'Made with water carbon dioxide', '35.00', 'Food-Name-2590.jpeg', 16, 'No', 'Yes'),
(64, '7 UP', 'Made with water, sweetener carbon dioxide', '30.00', 'Food-Name-1092.jpeg', 16, 'Yes', 'Yes'),
(65, 'Cocacola', 'Made with water, sweetener carbon dioxide', '40.00', 'Food-Name-285.jpeg', 16, 'Yes', 'Yes'),
(66, 'Fanta', 'Made with water, orange carbon dioxide', '32.00', 'Food-Name-1596.jpeg', 16, 'No', 'Yes'),
(67, 'Chicken Noodles', 'Made with Italian Sauce, Chicken, and organice vegetables.', '50.00', 'Food-Name-6096.jpeg', 19, 'No', 'Yes'),
(68, 'Beg Noodles', 'Made with Italian Sauce, and organice vegetables.', '25.00', 'Food-Name-9604.jpeg', 19, 'No', 'Yes'),
(69, 'Spicy Noodles', 'Made with Italian Sauce, Chicken, and organice spice.', '40.00', 'Food-Name-8315.jpeg', 19, 'Yes', 'Yes'),
(70, 'Testy Noodles', 'Made with Italian Sauce, Chicken, and organice vegetables.', '45.00', 'Food-Name-7936.jpeg', 19, 'No', 'Yes'),
(71, 'Chocolet Muffin', 'flour, liquid, egg, sugar, salt, and baking powder', '50.00', 'Food-Name-3160.jpeg', 21, 'Yes', 'Yes'),
(72, 'Vanella Muffin', 'flour, milk, egg, sugar, salt, and baking powder', '33.00', 'Food-Name-2383.jpeg', 21, 'No', 'Yes'),
(73, 'Sweet Momos', 'White-flour-and-water. meat, vegetable or cheese', '37.00', 'Food-Name-6203.jpeg', 11, 'No', 'Yes'),
(74, 'Momos with soup', 'White-flour-and-water. meat, vegetable or soup', '65.00', 'Food-Name-3489.jpeg', 11, 'No', 'Yes'),
(75, 'Special Momos', 'Special white-flour-and-water. meat, vegetable', '90.00', 'Food-Name-5113.jpeg', 11, 'Yes', 'Yes'),
(76, 'stawberry Pancake', 'flour, milk, egg, sugar, salt, and baking powder', '80.00', 'Food-Name-4467.jpeg', 20, 'No', 'Yes'),
(77, 'Special Pancake', 'flour, milk, egg, sugar, salt, and baking powder', '150.00', 'Food-Name-5073.jpeg', 20, 'Yes', 'Yes'),
(78, 'Hot Dog', 'Made with weenie, tube steak', '60.00', 'Food-Name-2818.jpeg', 18, 'Yes', 'Yes'),
(79, 'French Hotdog', 'Make with weenie, tube steak, sausage', '70.00', 'Food-Name-6597.jpeg', 18, 'No', 'Yes'),
(80, 'Chocolate Milk shake', 'Made with Chocolate, milk, many flavour.', '85.00', 'Food-Name-8059.jpeg', 17, 'Yes', 'Yes'),
(81, 'Black Milk Shake', 'Made with Chocolate, milk, many flavour.', '65.00', 'Food-Name-6031.jpeg', 17, 'No', 'Yes'),
(82, 'Vanella Milk Shake', 'Made with Vanella, milk, stawberry.', '60.00', 'Food-Name-8486.jpeg', 17, 'No', 'Yes'),
(83, 'Sweet noodles', 'Made with Italian Sauce, Chicken,and soup', '30.00', 'Food-Name-8900.jpeg', 19, 'No', 'Yes');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_order`
--

CREATE TABLE `tbl_order` (
  `id` int(10) UNSIGNED NOT NULL,
  `food` varchar(150) DEFAULT NULL,
  `price` decimal(10,2) DEFAULT NULL,
  `qty` int(11) DEFAULT NULL,
  `total` decimal(10,2) DEFAULT NULL,
  `order_date` datetime DEFAULT NULL,
  `status` varchar(50) DEFAULT NULL,
  `customer_name` varchar(150) DEFAULT NULL,
  `customer_contact` varchar(20) DEFAULT NULL,
  `customer_email` varchar(150) DEFAULT NULL,
  `customer_address` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_order`
--

INSERT INTO `tbl_order` (`id`, `food`, `price`, `qty`, `total`, `order_date`, `status`, `customer_name`, `customer_contact`, `customer_email`, `customer_address`) VALUES
(1, 'Best Burger', '4.00', 3, '12.00', '2021-08-07 07:53:24', 'Ordered', '', '+1 (333) 715-3692', 'toxuwys@mailinator.com', 'Ea rerum consectetur'),
(2, 'Smoky BBQ Pizza', '6.00', 4, '24.00', '2021-08-07 08:05:57', 'Delivered', '', '+1 (935) 582-2055', 'kame@mailinator.com', 'Et quaerat recusanda'),
(3, 'Dumpling Special', '5.00', 2, '10.00', '2021-08-07 08:07:56', 'Delivered', '', '01766738256', 'khanakash779@gmail.com', 'barisal jahalakathi'),
(4, 'Best Burger', '4.00', 3, '12.00', '2021-08-07 08:11:10', 'Delivered', '', '+1 (943) 936-9546', 'fifugize@mailinator.com', 'Repellendus Omnis q'),
(5, 'Dumpling Special', '5.00', 2, '10.00', '2021-08-07 08:11:27', 'Cancelled', '', '+1 (521) 297-4798', 'tepud@mailinator.com', 'Aliqua Alias earum '),
(6, 'Best Burger', '4.00', 2, '8.00', '2021-08-07 08:13:50', 'Delivered', '', '+1 (703) 942-3316', 'zerir@mailinator.com', 'Qui distinctio Reru'),
(7, 'Chicken Burger', '7.00', 2, '14.00', '2021-08-07 09:27:51', 'Delivered', 'Akash khan', '01766738256', 'cseakash.evening@gmail.com', 'barisal kathalia'),
(9, 'Coca-Cola', '35.00', 2, '70.00', '2021-08-16 05:30:10', 'Ordered ', 'Caesar Hunter', '+1 (815) 534-8763', 'qoxonuvesy@mailinator.com', 'Dolore sed suscipit '),
(10, 'Chicken Burger', '7.00', 1, '7.00', '2021-08-17 05:23:53', 'Ordered ', 'check', '+1 (176) 961-8532', 'sohelrana238692@gmail.com', 'barisal'),
(11, 'Momos with soup', '65.00', 2, '130.00', '2021-08-18 04:37:08', 'Ordered ', 'Keiko Miles', '+1 (425) 392-2093', 'sesygyti@mailinator.com', 'Sapiente rerum alias');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_category`
--
ALTER TABLE `tbl_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_food`
--
ALTER TABLE `tbl_food`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_order`
--
ALTER TABLE `tbl_order`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `tbl_category`
--
ALTER TABLE `tbl_category`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `tbl_food`
--
ALTER TABLE `tbl_food`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=84;

--
-- AUTO_INCREMENT for table `tbl_order`
--
ALTER TABLE `tbl_order`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
