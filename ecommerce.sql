-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 11, 2025 at 08:17 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ecommerce`
--

-- --------------------------------------------------------

--
-- Table structure for table `carts`
--

CREATE TABLE `carts` (
  `cart_id` int(12) NOT NULL,
  `user_id` int(12) NOT NULL,
  `product_id` int(12) NOT NULL,
  `product_qty` int(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `carts`
--

INSERT INTO `carts` (`cart_id`, `user_id`, `product_id`, `product_qty`) VALUES
(15, 2, 9, 1),
(17, 2, 10, 4),
(20, 2, 8, 3);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `cat_id` int(20) NOT NULL,
  `name` text NOT NULL,
  `slug` text NOT NULL,
  `description` text DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `popular` tinyint(4) NOT NULL DEFAULT 0,
  `image` text NOT NULL,
  `meta_title` text NOT NULL,
  `meta_description` text NOT NULL,
  `meta_keywords` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`cat_id`, `name`, `slug`, `description`, `status`, `popular`, `image`, `meta_title`, `meta_description`, `meta_keywords`, `created_at`) VALUES
(1, 'Mobiles', 'new mobiles collection', 'All kinds of mobiles are available in our shop.', 0, 1, 'vivomobile.png', 'Mobile Accessories', 'Your favourite Mobils are on our stall.', 'vivomobile', '2024-08-20 09:31:33'),
(2, 'Electronics', 'electronics', 'There are lot of Electronics Accessories verities  available in our stall.', 0, 1, 'electronic.jfif', 'Electronics Accessories', 'Our Electronics Accessories are modern style  based', 'Electronics Accessories', '2024-08-20 12:39:14'),
(3, 'Fashion', 'fashion', 'New Fashion itmes are available in stocks', 0, 1, 'fashion.jfif', 'New Branded fashion items', 'Here are new branded fashion items for summer season', 'fashion', '2024-08-20 12:46:33'),
(4, 'Footwear', 'footwear', 'New Footwear are available in stocks', 0, 1, 'footwear.jfif', 'FootWear', 'Here are new branded Footwear for university students', 'Footwears', '2024-08-20 12:47:37'),
(5, 'Laptops', 'laptop', 'New laptop brands are available in stocks', 0, 0, 'HP-laptop.jpeg', 'New Laptop Generation', 'Here are New Laptop Generations Available', 'hplaptop,deelLaptop', '2024-08-20 12:47:47');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `user_id` int(13) NOT NULL,
  `tracking_no` text NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` text NOT NULL,
  `phone` text NOT NULL,
  `address` text NOT NULL,
  `pincode` int(11) NOT NULL,
  `total_price` int(11) NOT NULL,
  `payment_mode` text NOT NULL,
  `payment_id` text DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `comments` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `user_id`, `tracking_no`, `name`, `email`, `phone`, `address`, `pincode`, `total_price`, `payment_mode`, `payment_id`, `status`, `comments`) VALUES
(1, 2, 'EcomShop211423', 'aqib', 'aqib@gmail.com', '21423', 'naseem nager', 324131, 68000, '', '', 0, NULL),
(2, 2, 'EcomShop6964253645453', 'ali', 'ali@gmail.com', '134253645453', 'hyd', 340042, 68000, 'COD', '', 0, NULL),
(3, 2, 'EcomShop3664253645453', 'ali', 'ali@gmail.com', '134253645453', 'hyd', 340042, 68000, 'COD', '', 0, NULL),
(4, 2, 'EcomShop5594253645453', 'ali', 'ali@gmail.com', '134253645453', 'hyd', 340042, 68000, 'COD', '', 0, NULL),
(5, 1, 'EcomShop39203', 'wahab', 'wahab@gmail.com', '034323421243', 'Hala', 5003, 2000, 'COD', '', 0, NULL),
(6, 1, 'EcomShop72003', 'wahab', 'wahab@gmail.com', '034323421243', 'Hala', 5003, 2000, 'COD', '', 0, NULL),
(7, 1, 'EcomShop555002', 'umer', 'umer@gmail.com', '02342342453', 'Bago Jamali', 60002, 8000, 'COD', '', 0, NULL),
(8, 1, 'EcomShop57543', 'ahmed', 'ahmedit@gmail.com', '02343213454', 'Karachi', 5643, 3000, 'COD', '', 0, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

CREATE TABLE `order_items` (
  `order_item_id` int(11) NOT NULL,
  `order_id` int(191) NOT NULL,
  `product_id` int(191) NOT NULL,
  `Quantity` int(191) NOT NULL,
  `price` int(191) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `order_items`
--

INSERT INTO `order_items` (`order_item_id`, `order_id`, `product_id`, `Quantity`, `price`) VALUES
(1, 1, 8, 2, 25000),
(2, 1, 1, 1, 18000),
(3, 2, 8, 2, 25000),
(4, 2, 1, 1, 18000),
(5, 3, 8, 2, 25000),
(6, 3, 1, 1, 18000),
(7, 4, 8, 2, 25000),
(8, 4, 1, 1, 18000),
(9, 5, 10, 1, 2000),
(10, 6, 10, 1, 2000),
(11, 7, 10, 4, 2000),
(12, 8, 2, 2, 1500);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `name` text NOT NULL,
  `slug` text NOT NULL,
  `small_description` text NOT NULL,
  `description` text NOT NULL,
  `original_price` int(11) NOT NULL,
  `selling_price` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `qty` int(11) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `trending` tinyint(4) NOT NULL,
  `meta_title` text NOT NULL,
  `meta_keywords` text NOT NULL,
  `meta_description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `category_id`, `name`, `slug`, `small_description`, `description`, `original_price`, `selling_price`, `image`, `qty`, `status`, `trending`, `meta_title`, `meta_keywords`, `meta_description`) VALUES
(1, 1, 'OPPO A5', 'OPPO-A5', 'OPPO A5 is a new model available in lower prices', 'OPPO A5 is a new model in Pakistan', 25000, 18000, '1724333981.jpg', 25, 0, 0, 'OPPO A5 ', 'OPPO A5 is made in china ', 'OPPO A5 is made in china '),
(2, 3, 'Polo-Shirts', 'polo shirt', 'A new branded polo shirt with green color', 'A new branded polo shirt with green color', 2000, 1500, '1724652005.jpg', 30, 0, 0, 'polo shirt', 'polo shirt', 'A new branded polo shirt with green color'),
(8, 1, 'Infinix Hot 12', 'infinix-hot-12', 'The Infinix Hot 12 is a budget-friendly smartphone offering a 6.82-inch display, powerful performance with its MediaTek Helio G85 processor, and a long-lasting 5000mAh battery. It features a 50MP triple camera setup for capturing stunning photos and supports fast charging.', 'The Infinix Hot 12 is a budget-friendly smartphone offering a 6.82-inch display, powerful performance with its MediaTek Helio G85 processor, and a long-lasting 5000mAh battery. It features a 50MP triple camera setup for capturing stunning photos and supports fast charging.', 36000, 25000, '1725000582.jfif', 4, 0, 1, 'Infinix Hot 12 - Affordable Smartphone with 50MP Camera & 5000mAh Battery', 'Infinix Hot 12, budget smartphone, 50MP camera, 5000mAh battery, Infinix mobile, MediaTek Helio G85, affordable smartphone, Infinix Hot series, fast charging phone, Android smartphone.', 'Discover the Infinix Hot 12, a budget-friendly smartphone with a 6.82-inch display, MediaTek Helio G85 processor, 50MP triple camera, and 5000mAh battery. Perfect for everyday use!'),
(9, 1, 'OPPO A57', 'oppo-a57', 'The OPPO A57 is a sleek and stylish smartphone featuring a 6.56-inch display, a robust MediaTek Helio G35 processor, and a long-lasting 5000mAh battery. It comes equipped with a 13MP dual-camera setup and offers an immersive user experience with its ColorOS 12.1.', 'The OPPO A57 is designed for users seeking a balance of style and performance. With its 6.56-inch HD+ display, you can enjoy vibrant visuals, while the MediaTek Helio G35 processor ensures smooth multitasking and gaming. The device is powered by a 5000mAh battery, providing extended usage without frequent charging. The 13MP dual-camera system allows you to capture sharp and clear photos, and with ColorOS 12.1, the smartphone delivers a seamless and user-friendly experience. The OPPO A57 also features a side-mounted fingerprint sensor and 33W fast charging, making it a great choice for those looking for a reliable and affordable smartphone.', 35000, 28000, '1725001729.jpg', 5, 0, 0, 'OPPO A57 - Stylish Smartphone with 5000mAh Battery & 13MP Dual Camera', 'OPPO A57, OPPO mobile, budget smartphone, 13MP dual camera, 5000mAh battery, MediaTek Helio G35, affordable smartphone, ColorOS 12.1, fast charging, Android phone.', 'Explore the OPPO A57, featuring a 6.56-inch display, MediaTek Helio G35 processor, 5000mAh battery, and 13MP dual-camera setup. Enjoy fast charging and a seamless user experience with ColorOS 12.1.'),
(10, 4, 'Mens Joggers', 'Joggers', 'These joggers feature a sleek design with a tapered fit, perfect for both lounging and outdoor activities. Made from premium materials, they offer durability and a soft feel against the skin. Pair them effortlessly with your favorite tees or hoodies for a modern, laid-back look.\"', 'Made from a soft and durable cotton-polyester blend, providing ultimate comfort and breathability. The fabric is lightweight yet sturdy, perfect for year-round wear.\r\nTapered Slim Fit: Designed with a modern tapered leg that narrows towards the ankle, offering a streamlined and stylish silhouette. The slim fit enhances the joggers\' contemporary appeal, suitable for casual or active wear.', 2500, 2000, '1725554493.jpg', 21, 0, 1, 'Joggers', 'men\'s joggers, white joggers, casual joggers, athletic joggers, slim fit joggers, tapered joggers, comfortable joggers, lounge pants, workout joggers, joggers for men, stylish joggers.', 'Shop men\'s joggers for ultimate comfort and style. Featuring a modern fit, soft fabric, and versatile design, perfect for workouts, lounging, or casual outings. Available in multiple sizes.'),
(11, 5, 'HP Laptop 5th Gen', 'Hp Laptop', 'Stay productive with the HP 5th Gen Laptop, featuring a powerful Intel processor, 15.6-inch HD display, ample storage, and long battery life. It offers seamless multitasking, fast connectivity, and a sleek, lightweight design for on-the-go convenience. Ideal for work, study, and entertainment.', 'Experience reliable performance with the HP 5th Gen Laptop, perfect for everyday computing. Powered by a 5th generation Intel processor, this laptop offers smooth multitasking and fast processing speeds. It features a sleek design, a vibrant 15.6-inch display, and long-lasting battery life, making it ideal for both work and entertainment.', 35000, 30000, '1725556358.jpg', 10, 0, 1, 'HP 5th Gen Laptop – Powerful Performance & Sleek Design | Shop Now', 'HP 5th Gen Laptop, Intel 5th Gen laptop, HP laptop 15.6 inch, affordable HP laptop, HP laptop for work, HP laptop for students, high-performance HP laptop, HP laptop features, lightweight HP laptop.', 'Shop the HP 5th Gen Laptop for powerful performance and sleek design. Featuring an Intel processor, 15.6-inch display, and long battery life, it\'s perfect for work, study, and entertainment. Ideal for students and professionals.');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` bigint(15) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role_as` tinyint(4) NOT NULL DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `name`, `email`, `phone`, `password`, `role_as`, `created_at`) VALUES
(1, 'Aatif Raza', 'atifrazait@gmail.com', 2147483647, '2754071', 1, '2024-08-19 14:18:01'),
(2, 'Khalid', 'khalidmajeed@gmail.com', 33653526342, '11223344', 0, '2024-08-19 14:19:58');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`cart_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`order_item_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `carts`
--
ALTER TABLE `carts`
  MODIFY `cart_id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `cat_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `order_items`
--
ALTER TABLE `order_items`
  MODIFY `order_item_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
