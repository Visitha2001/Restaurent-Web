-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 17, 2023 at 03:25 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `the_outer_clove_restaurant`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL,
  `admin_username` varchar(50) NOT NULL,
  `admin_email` varchar(100) NOT NULL,
  `admin_password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `admin_username`, `admin_email`, `admin_password`) VALUES
(4, 'visitha_nirmal', 'visitha2001@gmail.com', 'd593326f166e6604e1557d4de37a6c9e5fc25433');

-- --------------------------------------------------------

--
-- Table structure for table `av_tables`
--

CREATE TABLE `av_tables` (
  `table_id` int(11) NOT NULL,
  `cus_name` varchar(50) NOT NULL,
  `start_time` time(6) NOT NULL,
  `end_time` time(6) NOT NULL,
  `area` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `av_tables`
--

INSERT INTO `av_tables` (`table_id`, `cus_name`, `start_time`, `end_time`, `area`) VALUES
(5, 'visitha_nirmal', '19:07:00.000000', '23:07:00.000000', 'indoor'),
(7, 'visitha_nirmal', '19:08:00.000000', '22:08:00.000000', 'indoor'),
(10, 'visitha_nirmal', '19:18:00.000000', '14:18:00.000000', 'outdoor');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `cus_id` int(50) NOT NULL,
  `cus_name` varchar(100) NOT NULL,
  `cus_username` varchar(100) NOT NULL,
  `cus_email` varchar(100) NOT NULL,
  `cus_password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`cus_id`, `cus_name`, `cus_username`, `cus_email`, `cus_password`) VALUES
(8, 'Visitha_Nirmal_Rajapaksha', 'visitha_nirmal', 'visitha2001@gmail.com', 'c74ec993c8b9e94a523f486d9020a0e2368e72ea'),
(9, 'Yomal_Thushara_jayathissa', 'Yomal2001', 'yomal2001@gmail.com', '20f5bdf9a4f0189fd7846f1fad4a3720efc3640e'),
(10, 'Chamod_Mullegama', 'Chamod2001', 'Chamod2001@gmail.com', '1cc7bb80dd8c55f90889c925d61b4becb06e5b7c'),
(11, 'Harsha_Lakshan', 'LaXaN', 'lakshan2002@gmail.com', 'ba23617ac218b1b04cd3241eaca8d09637a643e8'),
(12, 'rukshan athapaththu', 'ruka1999', 'rula@1999.gon.com', 'ec9448940dff3e2bdd91e48c7478b79f6e7e9d8a');

-- --------------------------------------------------------

--
-- Table structure for table `dishes`
--

CREATE TABLE `dishes` (
  `dish_id` int(11) NOT NULL,
  `dish_name` varchar(100) NOT NULL,
  `dish_price` decimal(20,0) NOT NULL,
  `dish_category` varchar(50) NOT NULL,
  `dish_img_url` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `dishes`
--

INSERT INTO `dishes` (`dish_id`, `dish_name`, `dish_price`, `dish_category`, `dish_img_url`) VALUES
(29, 'Chicken Fried Rice', 10, 'Chinese Special', 'ADMIN_IMG/dishes/fried-rice-with-minced-pork-tomato-carrot-cucumber-plate (1).jpg'),
(30, 'Chicken Noodls', 10, 'Chinese Special', 'ADMIN_IMG/dishes/top-view-delicious-noodles-concept.jpg'),
(31, 'Chicken Biriyani', 15, 'Indian Special', 'ADMIN_IMG/dishes/gourmet-chicken-biryani-with-steamed-basmati-rice-generated-by-ai.jpg'),
(32, 'Chicken Pasta', 15, 'Italian', 'ADMIN_IMG/dishes/penne-pasta-tomato-sauce-with-chicken-tomatoes-wooden-table.jpg'),
(33, 'Chicken Lasagna', 15, 'Italian', 'ADMIN_IMG/dishes/atikah-akhtar-TTHXisQG1UA-unsplash.jpg'),
(34, 'Creamy Mushroom Spagetti', 15, 'Italian', 'ADMIN_IMG/dishes/stefan-schauberger-Zy3H2bIF3Vs-unsplash.jpg'),
(35, 'Crispy Chicken', 20, 'Appetizer', 'ADMIN_IMG/dishes/crispy-fried-chicken-wooden-cutting-board.jpg'),
(36, 'BBQ Chicken Wings(10 pcs)', 15, 'Appetizer', 'ADMIN_IMG/dishes/baked-chicken-wings-asian-style.jpg'),
(37, 'BBQ Beef Ribs', 20, 'BBQ', 'ADMIN_IMG/dishes/alexandru-bogdan-ghita-UeYkqQh4PoI-unsplash.jpg'),
(38, 'Pepperoni Pizza', 10, 'Italian', 'ADMIN_IMG/dishes/top-view-pepperoni-pizza-with-mushroom-sausages-bell-pepper-olive-corn-black-wooden.jpg'),
(39, 'Chicken Pizza', 15, 'Italian', 'ADMIN_IMG/dishes/shardar-tarikul-islam-_7byk1UWkjc-unsplash.jpg'),
(40, 'Beef Burger', 15, 'Burger', 'ADMIN_IMG/dishes/front-view-burger-stand.jpg'),
(41, 'Bacon & Beef Burger', 15, 'Burger', 'ADMIN_IMG/dishes/amirali-mirhashemian-88YAXjnpvrM-unsplash.jpg'),
(42, 'French Frice', 5, 'Appetizer', 'ADMIN_IMG/dishes/mitchell-luo-ChXHveqrb28-unsplash.jpg'),
(43, 'Cappuccino', 10, 'Hot Beverages', 'ADMIN_IMG/dishes/fallon-michael-b14IWOcm_lA-unsplash.jpg'),
(44, 'Coffee', 5, 'Hot Beverages', 'ADMIN_IMG/dishes/flemming-fuchs-4NlXcLHv1ng-unsplash.jpg'),
(45, 'Ice Milo', 8, 'Cool Beverages', 'ADMIN_IMG/dishes/frank-mckenna-jODz47eM1w8-unsplash.jpg'),
(46, 'Lemon Ice Tea', 10, 'Cool Beverages', 'ADMIN_IMG/dishes/the-matter-of-food-coZ-TTV-zw4-unsplash.jpg'),
(47, 'Orange Juice', 5, 'Cool Beverages', 'ADMIN_IMG/dishes/seval-torun-FTCn5bZdZjo-unsplash.jpg'),
(48, 'Brownie With Ice Cream', 10, 'Dessert', 'ADMIN_IMG/dishes/shivansh-sethi-dKT6Q7q2UKs-unsplash.jpg'),
(49, 'Chocolate Ice Cream', 8, 'Dessert', 'ADMIN_IMG/dishes/abhishek-hajare-GDCEzfrSGuU-unsplash.jpg'),
(50, 'Strawberry Cheese Cake', 15, 'Dessert', 'ADMIN_IMG/dishes/kofi-okyere-xx1USWIvIFc-unsplash.jpg'),
(51, 'Chocolate Fudge Cake', 10, 'Dessert', 'ADMIN_IMG/dishes/kristiana-pinne-ner3QLDgoOE-unsplash.jpg'),
(52, 'Fruit Salad', 15, 'Dessert', 'ADMIN_IMG/dishes/kashawn-hernandez-ODpw6NeFNGc-unsplash.jpg'),
(53, 'Apple Pie', 15, 'Dessert', 'ADMIN_IMG/dishes/priscilla-du-preez-SU5jSHu1pK8-unsplash.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `oders`
--

CREATE TABLE `oders` (
  `oder_id` int(50) NOT NULL,
  `dish_name` varchar(50) NOT NULL,
  `cus_username` varchar(100) NOT NULL,
  `qty` int(10) NOT NULL,
  `price` decimal(50,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `oders`
--

INSERT INTO `oders` (`oder_id`, `dish_name`, `cus_username`, `qty`, `price`) VALUES
(0, 'Fried rice', 'visitha_nirmal', 1, 10),
(0, 'Chicken Fried Rice', 'visitha_nirmal', 1, 10),
(0, 'Chicken Biriyani', 'visitha_nirmal', 5, 15),
(0, 'Chicken Biriyani', 'visitha_nirmal', 5, 15);

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `staff_mem_id` int(11) NOT NULL,
  `member_name` varchar(100) NOT NULL,
  `staff_username` varchar(50) NOT NULL,
  `member_email` varchar(100) NOT NULL,
  `member_role` varchar(50) NOT NULL,
  `staff_password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`staff_mem_id`, `member_name`, `staff_username`, `member_email`, `member_role`, `staff_password`) VALUES
(7, 'thisath alahakoon', 'thisath01', 'thisath.alahakoon@icbt.com', 'program manager', '$2y$10$ucClpf/H878imRrnHhKNVeZO8q47PeQvQUfoFBmhRCxXsm/Ov0QzK'),
(8, 'yasiru rebera', 'yasiru02', 'yasiru@icbt.com', 'marketing manager', '$2y$10$CeD6FnJwIv.TYi2qu4FyVeWwhIR6dLu6KtOg/dBzsA4y7UnHg.7ae');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `av_tables`
--
ALTER TABLE `av_tables`
  ADD PRIMARY KEY (`table_id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`cus_id`);

--
-- Indexes for table `dishes`
--
ALTER TABLE `dishes`
  ADD PRIMARY KEY (`dish_id`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`staff_mem_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `cus_id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `dishes`
--
ALTER TABLE `dishes`
  MODIFY `dish_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT for table `staff`
--
ALTER TABLE `staff`
  MODIFY `staff_mem_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
