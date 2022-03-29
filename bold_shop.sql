-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 28, 2022 at 07:59 PM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 7.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bold_shop`
--

-- --------------------------------------------------------

--
-- Table structure for table `featured`
--

CREATE TABLE `featured` (
  `id_featured` int(11) NOT NULL,
  `featured` varchar(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `featured`
--

INSERT INTO `featured` (`id_featured`, `featured`) VALUES
(1, 'YES'),
(2, 'NO');

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` int(11) NOT NULL,
  `nama` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `nama`) VALUES
(1, 'Lamp'),
(3, 'Furniture'),
(4, 'Poster'),
(5, 'Digital'),
(6, 'Bag'),
(7, 'Kitchen'),
(8, 'Decoration');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id_product` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `harga` int(11) NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `id_warna` int(11) DEFAULT NULL,
  `deskripsi` varchar(300) NOT NULL,
  `gambar` varchar(500) NOT NULL,
  `sold` int(11) NOT NULL DEFAULT 0,
  `id_featured` int(11) NOT NULL,
  `id_special` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id_product`, `nama`, `harga`, `id_kategori`, `id_warna`, `deskripsi`, `gambar`, `sold`, `id_featured`, `id_special`) VALUES
(1, 'Tull Lamp Black', 323, 1, 4, 'Pellentesque quis quam sollicitudin, dignissim dui at, ornare turpis. Morbi nisl ligula, ullamcorper eu egestas rhoncus, facilisis sed metus. Nullam turpis velit, condimentum eu ante porta, tincidunt dapibus mi.', 'http://colibri-interactive.com/themes/bold/all-features/wp-content/uploads/sites/2/2015/10/tull_lamp_black-650x650.jpg', 285, 1, 2),
(2, 'Tull Lamp Green', 248, 1, 6, 'Pellentesque quis quam sollicitudin, dignissim dui at, ornare turpis. Morbi nisl ligula, ullamcorper eu egestas rhoncus, facilisis sed metus. Nullam turpis velit, condimentum eu ante porta, tincidunt dapibus mi.', 'http://colibri-interactive.com/themes/bold/all-features/wp-content/uploads/sites/2/2015/10/tull_lamp_green-650x650.jpg', 124, 2, 1),
(3, 'Carryall Bag – Light Brown', 299, 6, 1, 'Pellentesque quis quam sollicitudin, dignissim dui at, ornare turpis. Morbi nisl ligula, ullamcorper eu egestas rhoncus, facilisis sed metus. Nullam turpis velit, condimentum eu ante porta, tincidunt dapibus mi.', 'http://colibri-interactive.com/themes/bold/all-features/wp-content/uploads/sites/2/2015/10/carryall_bag_light-650x650.jpg', 100, 1, 1),
(4, 'Molly Bag – Dark Brown', 239, 6, 2, 'Pellentesque quis quam sollicitudin, dignissim dui at, ornare turpis. Morbi nisl ligula, ullamcorper eu egestas rhoncus, facilisis sed metus. Nullam turpis velit, condimentum eu ante porta, tincidunt dapibus mi.', 'http://colibri-interactive.com/themes/bold/all-features/wp-content/uploads/sites/2/2015/10/molly_bag_dark1-650x650.jpg', 213, 2, 2),
(8, 'Vase – Simple Product', 245, 8, 7, 'Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Morbi leo risus, porta ac consectetur ac, vestibulum at eros sed posuere.', 'http://colibri-interactive.com/themes/bold/all-features/wp-content/uploads/sites/2/2015/10/vase_blue-650x650.jpg', 149, 1, 2),
(9, 'Wood Bowl', 24, 7, 7, 'Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Morbi leo risus, porta ac consectetur ac, vestibulum at eros sed posuere.', 'http://colibri-interactive.com/themes/bold/all-features/wp-content/uploads/sites/2/2015/10/wood_bowl-650x650.jpg', 179, 1, 1),
(10, 'Chopping Board', 34, 7, 7, 'Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Morbi leo risus, porta ac consectetur ac, vestibulum at eros sed posuere.', 'http://colibri-interactive.com/themes/bold/all-features/wp-content/uploads/sites/2/2015/10/chopping_board-650x650.jpg', 100, 2, 2),
(11, 'Concrete Table', 499, 3, 7, 'Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Morbi leo risus, porta ac consectetur ac, vestibulum at eros sed posuere.', 'http://colibri-interactive.com/themes/bold/all-features/wp-content/uploads/sites/2/2015/10/concrete_table-650x650.jpg', 272, 1, 2),
(12, 'Timber Table', 350, 3, 7, 'Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Morbi leo risus, porta ac consectetur ac, vestibulum at eros sed posuere.', 'http://colibri-interactive.com/themes/bold/all-features/wp-content/uploads/sites/2/2015/10/timber_table-650x650.jpg', 204, 2, 1),
(15, 'Shield Lamp White', 329, 1, 5, 'Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus', 'http://colibri-interactive.com/themes/bold/all-features/wp-content/uploads/sites/2/2015/10/shield_lamp_white.jpg', 10, 1, 2),
(16, 'Salad Cutlery', 19, 7, 7, 'Morbi leo risus, porta ac consectetur ac, vestibulum at eros sed posuere.', 'http://colibri-interactive.com/themes/bold/all-features/wp-content/uploads/sites/2/2015/10/salad_cutlery.jpg', 0, 2, 2),
(17, 'Round Table', 498, 3, 7, 'Morbi leo risus, porta ac consectetur ac, vestibulum at eros sed posuere.', 'http://colibri-interactive.com/themes/bold/all-features/wp-content/uploads/sites/2/2015/10/round_table.jpg', 12, 1, 1),
(19, 'Lilly Bag – Dark Brown', 239, 6, 2, 'um sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Morbi leo risus, porta ac consectetur ac, vestibulum at eros sed posuere.', 'http://colibri-interactive.com/themes/bold/all-features/wp-content/uploads/sites/2/2015/10/lilly_bag_dark.jpg', 0, 2, 1),
(20, 'Carryall Bag – Dark Brown', 299, 6, 2, 'Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Morbi leo risus, porta ac consectetur ac, vestibulum at eros sed posuere.', 'http://colibri-interactive.com/themes/bold/all-features/wp-content/uploads/sites/2/2015/10/carryall_bag_dark.jpg', 15, 1, 2),
(21, 'Lamp Pill O2', 312, 1, 4, 'Morbi leo risus, porta ac consectetur ac, vestibulum at eros sed posuere.', 'http://colibri-interactive.com/themes/bold/all-features/wp-content/uploads/sites/2/2015/10/lamp_pill_o2_a.jpg', 0, 2, 2),
(35, 'Go West', 40, 4, 7, 'Morbi leo risus, porta ac consectetur ac, vestibulum at eros sed posuere.', 'http://colibri-interactive.com/themes/bold/all-features/wp-content/uploads/sites/2/2015/10/go_west.jpg', 0, 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `special`
--

CREATE TABLE `special` (
  `id_special` int(11) NOT NULL,
  `special` varchar(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `special`
--

INSERT INTO `special` (`id_special`, `special`) VALUES
(1, 'YES'),
(2, 'NO');

-- --------------------------------------------------------

--
-- Table structure for table `warna`
--

CREATE TABLE `warna` (
  `id_warna` int(11) NOT NULL,
  `warna` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `warna`
--

INSERT INTO `warna` (`id_warna`, `warna`) VALUES
(1, 'Light Brown'),
(2, 'Dark Brown'),
(3, 'Orange'),
(4, 'Black'),
(5, 'White'),
(6, 'Light Green'),
(7, ' ');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `featured`
--
ALTER TABLE `featured`
  ADD PRIMARY KEY (`id_featured`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id_product`),
  ADD KEY `id_kategori` (`id_kategori`),
  ADD KEY `id_featured` (`id_featured`),
  ADD KEY `id_special` (`id_special`),
  ADD KEY `id_warna` (`id_warna`);

--
-- Indexes for table `special`
--
ALTER TABLE `special`
  ADD PRIMARY KEY (`id_special`);

--
-- Indexes for table `warna`
--
ALTER TABLE `warna`
  ADD PRIMARY KEY (`id_warna`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `featured`
--
ALTER TABLE `featured`
  MODIFY `id_featured` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id_product` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `special`
--
ALTER TABLE `special`
  MODIFY `id_special` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `warna`
--
ALTER TABLE `warna`
  MODIFY `id_warna` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`id_kategori`) REFERENCES `kategori` (`id_kategori`),
  ADD CONSTRAINT `products_ibfk_2` FOREIGN KEY (`id_warna`) REFERENCES `warna` (`id_warna`),
  ADD CONSTRAINT `products_ibfk_3` FOREIGN KEY (`id_featured`) REFERENCES `featured` (`id_featured`),
  ADD CONSTRAINT `products_ibfk_4` FOREIGN KEY (`id_special`) REFERENCES `special` (`id_special`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
