-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 09 Mar 2018 pada 04.21
-- Versi Server: 10.1.13-MariaDB
-- PHP Version: 5.6.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tokoku`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `category`
--

CREATE TABLE `category` (
  `categoryID` int(11) NOT NULL,
  `categoryName` varchar(255) NOT NULL,
  `categoryParent` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `category`
--

INSERT INTO `category` (`categoryID`, `categoryName`, `categoryParent`) VALUES
(15, 'Atasan', 0),
(16, 'Bawahan', 0),
(18, 'Aksesoris Fashion', 0),
(19, 'Pakaian Dalam Pria', 15);

-- --------------------------------------------------------

--
-- Struktur dari tabel `category_map`
--

CREATE TABLE `category_map` (
  `id` int(11) NOT NULL,
  `categoryID` int(11) NOT NULL,
  `productID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `category_map`
--

INSERT INTO `category_map` (`id`, `categoryID`, `productID`) VALUES
(1, 15, 10),
(2, 19, 10),
(3, 15, 11),
(4, 18, 11),
(5, 1, 12),
(6, 1, 13),
(7, 1, 14),
(8, 1, 15),
(9, 1, 16);

-- --------------------------------------------------------

--
-- Struktur dari tabel `image_map`
--

CREATE TABLE `image_map` (
  `imageID` int(11) NOT NULL,
  `productID` int(11) NOT NULL,
  `imageName` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `image_map`
--

INSERT INTO `image_map` (`imageID`, `productID`, `imageName`) VALUES
(2, 10, 'kaos2.jpg'),
(3, 11, 'hat-2.jpg'),
(4, 11, 'hat-4.jpg'),
(5, 15, 'kaos1.jpg'),
(6, 16, 'kaos1.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `product`
--

CREATE TABLE `product` (
  `productID` int(11) NOT NULL,
  `categoryID` int(11) NOT NULL,
  `productName` varchar(255) NOT NULL,
  `productPrice` int(11) NOT NULL,
  `productDescription` text NOT NULL,
  `productImages` varchar(255) NOT NULL,
  `productStock` int(11) NOT NULL,
  `productStatus` int(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `product`
--

INSERT INTO `product` (`productID`, `categoryID`, `productName`, `productPrice`, `productDescription`, `productImages`, `productStock`, `productStatus`) VALUES
(10, 0, 'Kaos Kece', 40000, 'Kaos Kece buatan Nofa', '', 2, 1),
(11, 0, 'Topi Kece Branded', 900000, 'Topi Kece Branded', '', 12, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `userId` int(11) NOT NULL,
  `userName` varchar(255) NOT NULL,
  `userPassword` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`userId`, `userName`, `userPassword`) VALUES
(1, 'admin', 'a140f4d7d4ab278e2ac24c0dcb5adec6');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`categoryID`);

--
-- Indexes for table `category_map`
--
ALTER TABLE `category_map`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `image_map`
--
ALTER TABLE `image_map`
  ADD PRIMARY KEY (`imageID`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`productID`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`userId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `categoryID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `category_map`
--
ALTER TABLE `category_map`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `image_map`
--
ALTER TABLE `image_map`
  MODIFY `imageID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `productID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `userId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
