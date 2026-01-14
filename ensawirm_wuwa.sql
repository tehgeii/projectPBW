-- phpMyAdmin SQL Dump
-- version 5.2.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jan 14, 2026 at 02:15 PM
-- Server version: 10.6.24-MariaDB-log
-- PHP Version: 8.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ensawirm_wuwa`
--

-- --------------------------------------------------------

--
-- Table structure for table `artikel`
--

CREATE TABLE `artikel` (
  `id` int(11) NOT NULL,
  `judul` varchar(255) NOT NULL,
  `isi` text NOT NULL,
  `gambar` varchar(255) NOT NULL,
  `link_ref` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `artikel`
--

INSERT INTO `artikel` (`id`, `judul`, `isi`, `gambar`, `link_ref`) VALUES
(1, 'Biografi Resonator Utama: Rover', 'Rover adalah protagonis utama dalam WuWa, seorang Resonator yang terbangun di Solaris-3 tanpa ingatan masa lalu. Dia memiliki kemampuan unik untuk berinteraksi dengan makhluk misterius.', 'rover.jpg', 'https://wutheringwaves.fandom.com/wiki/Rover/Backstory'),
(2, 'Update 1.0.2 dan Karakter Yinlin', 'Berita terbaru mengenai rilis patch 1.0.2 dan detail kemampuan karakter Yinlin yang sangat dinantikan oleh para pemain.', 'yinlin.jpg', 'https://game8.co/games/Wuthering-Waves/archives/452545'),
(3, 'Tutorial: Cara Cepat Farming Kredit', 'Panduan langkah demi langkah untuk mengoptimalkan Echoes dan mendapatkan kredit secara efisien dengan menyelesaikan daily mission.', 'jiyan.jpg', '#');

-- --------------------------------------------------------

--
-- Table structure for table `gallery`
--

CREATE TABLE `gallery` (
  `id` int(11) NOT NULL,
  `judul` varchar(255) NOT NULL,
  `gambar` varchar(255) NOT NULL,
  `deskripsi` text DEFAULT NULL,
  `tanggal` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `gallery`
--

INSERT INTO `gallery` (`id`, `judul`, `gambar`, `deskripsi`, `tanggal`) VALUES
(1, 'Rover', 'rover.jpg', 'Sang Pengembara', '2026-01-14 10:01:41'),
(2, 'Jiyan', 'jiyan.jpg', 'Sang Jenderal', '2026-01-14 10:04:20'),
(3, 'Zani', 'zani.jpg', 'Sang Pegawai Bank Yang Terbebani', '2026-01-14 10:05:44'),
(4, 'Yinlin', 'yinlin.jpg', 'Sang Ratu Halilintar', '2026-01-14 10:06:58'),
(5, 'Calcharo', 'calcharo.jpg', 'Sang Pemimpin Pasukan Bayangan', '2026-01-14 10:07:51'),
(6, 'Jinhsi', 'jinhsi.jpg', 'Sang Magistrate', '2026-01-14 10:08:30'),
(7, 'Carlotta', 'carlotta.jpg', 'Sang Penari Es', '2026-01-14 10:08:51'),
(8, 'Xiangli Yao', 'xiangliyao.jpg', 'Sang Pelibas Petir', '2026-01-14 10:09:11'),
(9, 'Changli', 'changli.jpg', 'Sang Penasihat Berapi', '2026-01-14 10:09:34');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` text NOT NULL,
  `foto` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `foto`) VALUES
(1, 'admin', 'fcea920f7412b5da7be0cf42b8c93759', 'img/P_20240115_154211.jpg'),
(2, 'april', '37d153a06c79e99e4de5889dbe2e7c57', 'img/background siadinn.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `artikel`
--
ALTER TABLE `artikel`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gallery`
--
ALTER TABLE `gallery`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `artikel`
--
ALTER TABLE `artikel`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `gallery`
--
ALTER TABLE `gallery`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
