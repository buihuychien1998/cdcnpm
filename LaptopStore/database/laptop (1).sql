-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th10 05, 2019 lúc 05:31 AM
-- Phiên bản máy phục vụ: 10.1.38-MariaDB
-- Phiên bản PHP: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `laptop`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `brands`
--

CREATE TABLE `brands` (
  `brand_id` int(100) NOT NULL,
  `brand_title` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Đang đổ dữ liệu cho bảng `brands`
--

INSERT INTO `brands` (`brand_id`, `brand_title`) VALUES
(1, 'HP'),
(2, 'Samsung'),
(3, 'Dell'),
(4, 'Acer'),
(5, 'Lenovo'),
(6, 'Asus');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `cart`
--

CREATE TABLE `cart` (
  `id` int(10) NOT NULL,
  `p_id` int(10) NOT NULL,
  `ip_add` varchar(250) NOT NULL,
  `user_id` int(10) DEFAULT NULL,
  `qty` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Đang đổ dữ liệu cho bảng `cart`
--

INSERT INTO `cart` (`id`, `p_id`, `ip_add`, `user_id`, `qty`) VALUES
(17, 3, '::1', 9, 1),
(18, 2, '::1', -1, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `categories`
--

CREATE TABLE `categories` (
  `cat_id` int(100) NOT NULL,
  `cat_title` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Đang đổ dữ liệu cho bảng `categories`
--

INSERT INTO `categories` (`cat_id`, `cat_title`) VALUES
(1, 'Electronics'),
(2, 'Ladies Wears'),
(3, 'Mens Wear'),
(4, 'Kids Wear'),
(5, 'Furnitures'),
(6, 'Home Appliances'),
(7, 'Electronics Gadgets');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `trx_id` varchar(255) NOT NULL,
  `p_status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Đang đổ dữ liệu cho bảng `orders`
--

INSERT INTO `orders` (`order_id`, `user_id`, `product_id`, `qty`, `trx_id`, `p_status`) VALUES
(1, 2, 7, 1, '07M47684BS5725041', 'Completed'),
(2, 2, 2, 1, '07M47684BS5725041', 'Completed');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `products`
--

CREATE TABLE `products` (
  `product_id` int(100) NOT NULL,
  `product_cat` int(100) NOT NULL,
  `product_brand` int(100) NOT NULL,
  `product_title` varchar(255) NOT NULL,
  `product_price` int(100) NOT NULL,
  `product_desc` text NOT NULL,
  `product_image` text NOT NULL,
  `product_keywords` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Đang đổ dữ liệu cho bảng `products`
--

INSERT INTO `products` (`product_id`, `product_cat`, `product_brand`, `product_title`, `product_price`, `product_desc`, `product_image`, `product_keywords`) VALUES
(1, 1, 2, 'Notebook Flash', 5000, 'A retro keyboard and 13.3” display combined with a modern, ultra-light build create a signature style that can go wherever you go.\r\nWindows 10 and the latest Intel® quad-core processor give you the power and flexibility to juggle all your tabs and apps seamlessly.', 'samsung.jpg', 'samsung'),
(2, 1, 3, 'Dell XPS 15 7590 Laptop 15.6\"', 25000, '2019 Dell XPS 15 7590 Laptop 15.6\" Intel i7-9750H NVIDIA GTX 1650 512GB SSD 16GB RAM 4K UHD Non Touch (3840 x 2160)\r\n15.6\" 4K UHD (3840 x 2160) OLED InfinityEdge Anti-Reflective Non-Touch 100% DCI-P3 400-Nits display 9th Generation Intel Core i7-9750H', 'dellP.jpg', 'dell'),
(3, 1, 3, 'Dell Vestro 2550 i7 1080 HD ', 30000, 'DELL VOSTRO 2550 HD 15.6 Anti-Glare i3 WS LAPTOP | in Bradford, West Yorkshire | Gumtree', 'dell1.jpg', 'dell'),
(4, 1, 3, 'Dell Inspiron 15 3567', 32000, 'The Inspiron 15 3000 series operates with Windows 10 Home, sports a 15-inch HD TrueLife display, a built-in DVD drive, and an HD webcam.', 'dell2.jpg', 'dell'),
(5, 1, 2, 'Samsung Notebook 9 Pro', 10000, '13.3-inch 1,920 x 1,080 touch display. 1.8GHz Intel Core i7-8565U.\r\n8GB DDR4 SDRAM 2,133MHz,128MB Intel UHD Graphics 620,256GB SSD\r\n802.11ac Wi-Fi wireless; Bluetooth 5.0\r\nWindows 10 Home (64-bit)', 'samsung1.jpg', 'samsung'),
(6, 1, 1, 'HP ENVY 17-ce0014na 2019', 35000, 'Windows 10 Home 64\r\nIntel® Core™ i7-8565U (1.8 GHz base frequency, up to 4.6 GHz with Intel® Turbo Boost Technology, 8 MB cache, 4 cores)\r\n43.9 cm (17.3\") diagonal FHD IPS WLED-backlit edge-to-edge glass (1920 x 1080)\r\n16 GB memory; 256 GB PCIe® SSD and 1 TB HDD storage\r\nNVIDIA® GeForce® MX250 (4 GB GDDR5); B&O Audio with dual speakers; Backlit keyboard; Fast charge;(2x2) Wi-Fi®; Fingerprint reader; Privacy Camera Kill Switch; Optical Drive', 'hp1.jpg', 'hp'),
(7, 1, 1, 'HP Pavillion 2018', 50000, '2018 Newest HP Pavilion 15.6\" FHD IPS (1920x1080) Display Laptop PC, Intel Core i7-8550U, 8GB DDR4, 2TB HDD, NVIDIA GeForce 940MX Graphics, HDMI, Bluetooth, DVD +/- RW, Backlit (US Version, Imported)', 'hp3.jpg', 'hp'),
(8, 1, 4, 'Acer Aspire 3 A315-33 15.6-inch ', 40000, 'Acer Aspire 3 Intel Celeron 15.6-inch FHD Laptop (4GB/500 GB HDD/Windows 10 Home/Obsidian Black/2.1 Kg), A315-33', 'acer1.jpg', 'acer'),
(9, 1, 3, 'Dell Precision 5530 Core i7- 8850H', 12000, 'Laptop Dell Precision 5530 Core i7- 8850H-RAM 16GB-SSD 512GB\r\nIntel Core i7 8850H2.6GHz up to 4.3GHz.?? phân gi?i chu?n FHD 1920*1080\r\nMàn hình 15.6?Webcam, Wifi AC,  Bluetooth, Keyboard Backlit, Bluetooth, USB 3.0, USB Type -C, Thunderbolt 3', 'dell3.jpg', 'dell'),
(10, 2, 6, 'Asus Vivobook X507UA-BR426T', 1000, 'Asus Vivobook X507UA-BR426T/Core I5-8250U/4GB/1TB/WIN10', 'asus3.png', 'asus'),
(11, 2, 6, 'ASUS ZenBook 13 UX331UA ', 1200, 'ASUS ZenBook 13 UX331UA Ultra-Slim Laptop 13.3” Full HD WideView display, 8th gen Intel Core i7-8550U', 'asus2.jpg', 'asus'),
(12, 2, 6, 'ASUS Laptop AMD A12', 1500, '2019 ASUS - 15.6\" Laptop - AMD A12-Series 8GB Memory AMD Radeon R7 128GB SSD Windows 10', 'asus1.jpg', 'asus'),
(13, 2, 6, ' Asus X509FA-EJ103T Silver ', 1200, 'Laptop Asus X509FA-EJ103T Silver Core I5| Ram 4GB| 512GB SSD|15.6\r\nLaptop Asus X509FA-EJ103T: CPU Core I5-8265U Processor (6M Cache, up to 3.90 GHz); RAM 4GB; SSD 512GB; 15.6inch FHD; Intel HD Graphics', 'asus6.jpg', 'asus'),
(14, 2, 6, 'Asus X540 15.6 Inch Celeron', 1400, 'Asus X540 15.6 Inch Celeron 4GB 1TB Laptop - Chocolate | Laptops and netbooks | Argos', 'asus5.jpg', 'asus'),
(15, 2, 6, 'Asus Vivobook S15 S530UA i5', 1500, 'Asus Vivobook S530UA-BQ291T Core i5-8250U Ram 4GB SSD 256GB 15.6 Full HD Wi10', 'asus4.jpg', 'asus'),
(16, 3, 6, 'Asus Laptop X407MA-BV003T', 600, 'ASUS X407MA-BV003T Gold\r\n14-inch, Intel Celeron N4100 Quad Core, 4GB', 'asus7.png', 'asus'),
(17, 3, 6, 'ROG Zephyrus S (GX531)', 1000, 'ASUS ROG Zephyrus S Ultra Slim Gaming Laptop, 15.6” 144Hz IPS-Type Full HD, GeForce RTX 2080, Intel Core i7', 'asus8.jpg', 'asus'),
(19, 3, 6, 'Asus Vivobook A407U-FBV061T', 3000, 'Asus Vivobook A407U-FBV061T 14\" Laptop Grey (i3-7020U, 4GB, 1TB, MX130 2GB, W10)\r\nIntel® Core™ i3-7020U (2.3 GHz, 3 MB cache, 2 cores)4GB DDR4 RAMSATA 1TB 5400RPM 2.5\' HDD14.0\' HD 1366x768 16:9//Anti-GlareNvidia GeForce MX130 2 GB', 'asus9.jpg', 'asus'),
(20, 3, 6, 'ASUS - ROG Zephyrus G15.6\"', 1600, 'ASUS ROG Zephyrus GX501 Ultra Slim Gaming Laptop, 15.6” FHD 144Hz 3ms IPS-Type G-SYNC, GeForce GTX\r\nhe ASUS ROG Zephyrus GX501 is a revolutionary gaming laptop born from ROG\'s persistent dedication to innovation', 'asus10.jpg', 'asus'),
(21, 3, 6, 'ASUS VivoBook S15 S530UN', 800, 'ASUS VivoBook S15 ( Core i7- 8th Gen/8 GB/1TB+ 256GB SSD / 15.6\" FHD/ Windows 10/ 2GB MX150) S530UN-BQ003T (Gun Metal/1.8 kg)', 'asus11.png', 'asus'),
(22, 4, 6, 'ASUS VivoBook Slim S410UA', 1300, 'ASUS VivoBook Slim S410UA-BV134T 14 Inch Laptop - (Grey) - (Intel Core i5-8250U, 8 GB RAM, 512 GB SSD\r\nS410UA/I5 13.3\" HD 8GB 512GB Win 10 - ASUS Live Update, ASUS Product Registration Program, ATK Package(ASUS On Screen Display),', 'asus12.jpg', 'asus'),
(23, 4, 6, 'ASUS 15.6\" VivoBook S15', 1900, 'ASUS 15.6\" VivoBook S15 S530FA Laptop\r\nThe 15.6\" VivoBook S15 S530FA Laptop from ASUS is a thin, light, and stylish system for everyday use. Specs-wise, it\'s powered by a 1.6 GHz Intel Core i5-8265U quad-core processor, 8GB of DDR4 memory, and a 256GB M.2 SSD. Its 15.6\" display, driven by integrated Intel UHD graphics, features a 1920 x 1080 Full HD resolution and ultra-slim', 'asus13.jpg', 'asus'),
(24, 4, 6, 'Asus ZenBook Pro 14', 700, 'ASUS ZenBook Pro UX480 14 Inch FHD Display DualScreen Laptop - (Deep-Dive Blue) (Intel Core I7-8565U, 8 GB RAM, 256 GB SSD, Nvidia GTX 1050, Windows 10)', 'asus14.jpg', 'asus'),
(25, 4, 6, 'ASUS ROG Zephyrus M', 750, 'ASUS ROG Zephyrus M Ultra Slim Gaming Laptop, 15.6” Full HD 144Hz IPS-Type G-SYNC, GeForce GTX 1070, Intel Core i7-8750H Processor, 16GB DDR4, 256GB PCIe SSD + 1TB FireCuda, Windows 10 - GM501GS-XS74', 'asus15.jpg', 'asus'),
(26, 4, 6, 'Asus ROG Zephyrus GX701', 650, 'Asus ROG Zephyrus S GX701 (2019) Gaming Laptop, 17.3” 144Hz Pantone Validated Full HD IPS, GeForce RTX 2070, Intel Core i7-9750H, 16GB DDR4, 1TB PCIe Nvme SSD Hyper Drive, Windows 10 Home', 'asus16.jpg', 'asus'),
(27, 4, 6, 'Asus VivoBook X509FJ i7', 690, 'sd', 'asus17.jpg', 'asus'),
(32, 5, 0, 'Book Shelf', 2500, 'book shelf', 'furniture-book-shelf-250x250.jpg', 'book shelf furniture'),
(33, 6, 2, 'SamsungNotePen 9 Pro', 35000, 'Refrigerator', 'samsung3.jpg', 'samsung'),
(34, 6, 4, 'Acer Swift 1 SF114', 1000, 'Emergency Light', 'acer2.png', 'acer'),
(35, 6, 0, 'Vaccum Cleaner', 6000, 'Vaccum Cleaner', 'images (2).jpg', 'Vaccum Cleaner'),
(36, 6, 5, 'Lenovo Ideapad 330-15IKB', 1500, 'gj', 'lenovo1.png', 'lenovo'),
(37, 6, 5, 'Lenovo Ideapad 330-15IKB', 20000, 'LED TV', 'lenovo2.png', 'lenovo'),
(38, 6, 4, 'Acer Aspire 3 A315-42-R8PX NX', 3500, 'Microwave Oven', 'acer3.png', 'acer'),
(39, 6, 5, 'Lenovo™ IdeaPad™ L340 ', 2500, 'Mixer Grinder', 'lenovo3.jpg', 'lenovo'),
(40, 2, 6, 'ASUS ZenBook Flip 13 13.3\"', 3000, 'Formal girls dress', 'asus18.jpg', 'asus'),
(45, 1, 2, 'Samsung Branded X2i 2019', 10000, '0', 'samsung2.jpg', 'samsung'),
(46, 1, 2, 'Samsung RCs520 i7 new', 10000, '', 'samsung4.jpg', 'samsung');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `user_info`
--

CREATE TABLE `user_info` (
  `user_id` int(10) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `email` varchar(300) NOT NULL,
  `password` varchar(300) NOT NULL,
  `mobile` varchar(10) NOT NULL,
  `address1` varchar(300) NOT NULL,
  `address2` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Đang đổ dữ liệu cho bảng `user_info`
--

INSERT INTO `user_info` (`user_id`, `first_name`, `last_name`, `email`, `password`, `mobile`, `address1`, `address2`) VALUES
(9, 'hiep', 'ha', 'hiep003@gmail.com', 'c7895ade1f305d92ef636510c6dceb81', '0332115099', 'hanoi', 'hanoi');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`brand_id`);

--
-- Chỉ mục cho bảng `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`cat_id`);

--
-- Chỉ mục cho bảng `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Chỉ mục cho bảng `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);

--
-- Chỉ mục cho bảng `user_info`
--
ALTER TABLE `user_info`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `brands`
--
ALTER TABLE `brands`
  MODIFY `brand_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT cho bảng `categories`
--
ALTER TABLE `categories`
  MODIFY `cat_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT cho bảng `user_info`
--
ALTER TABLE `user_info`
  MODIFY `user_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
