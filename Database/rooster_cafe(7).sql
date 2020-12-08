-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 07, 2020 at 03:27 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.2.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rooster_cafe`
--

-- --------------------------------------------------------

--
-- Table structure for table `bagian_karyawan`
--

CREATE TABLE `bagian_karyawan` (
  `id_bagian` int(11) NOT NULL,
  `bagian` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bagian_karyawan`
--

INSERT INTO `bagian_karyawan` (`id_bagian`, `bagian`) VALUES
(1, 'manajer'),
(2, 'investor'),
(3, 'karyawan');

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `id_booking` int(11) NOT NULL,
  `id_karyawan` int(11) NOT NULL,
  `id_pembeli` int(11) NOT NULL,
  `tgl_booking` date NOT NULL,
  `tgl_acara` date NOT NULL,
  `jumlah_meja` int(11) NOT NULL,
  `total_booking` int(11) NOT NULL,
  `dp_booking` varchar(100) NOT NULL,
  `pelunasan_booking` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`id_booking`, `id_karyawan`, `id_pembeli`, `tgl_booking`, `tgl_acara`, `jumlah_meja`, `total_booking`, `dp_booking`, `pelunasan_booking`) VALUES
(1, 0, 0, '2020-11-03', '2020-11-07', 12, 100, '500000', '500000');

-- --------------------------------------------------------

--
-- Table structure for table `catering`
--

CREATE TABLE `catering` (
  `id_catering` int(11) NOT NULL,
  `id_karyawan` int(11) NOT NULL,
  `id_pembeli` int(11) NOT NULL,
  `id_status_transaksi` int(11) NOT NULL,
  `tgl_catering` date NOT NULL,
  `tgl_diperlukan` date NOT NULL,
  `total_catering` int(11) NOT NULL,
  `dp_catering` varchar(100) NOT NULL,
  `pelunasan_catering` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `catering`
--

INSERT INTO `catering` (`id_catering`, `id_karyawan`, `id_pembeli`, `id_status_transaksi`, `tgl_catering`, `tgl_diperlukan`, `total_catering`, `dp_catering`, `pelunasan_catering`) VALUES
(3, 0, 7, 1, '0000-00-00', '0000-00-00', 0, '', '');

-- --------------------------------------------------------

--
-- Table structure for table `detail_booking`
--

CREATE TABLE `detail_booking` (
  `id_detail_booking` int(11) NOT NULL,
  `id_booking` int(11) NOT NULL,
  `id_menu` int(11) NOT NULL,
  `jumlah_menu` int(11) NOT NULL,
  `total_harga_menu` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `detail_catering`
--

CREATE TABLE `detail_catering` (
  `id_detail_catering` int(11) NOT NULL,
  `id_catering` int(11) NOT NULL,
  `id_menu` int(11) NOT NULL,
  `jumlah_catering` int(11) NOT NULL,
  `total_harga_catering` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `detail_catering`
--

INSERT INTO `detail_catering` (`id_detail_catering`, `id_catering`, `id_menu`, `jumlah_catering`, `total_harga_catering`) VALUES
(1, 3, 4, 1, 100000),
(2, 3, 3, 1, 100000),
(3, 3, 5, 1, 100000);

-- --------------------------------------------------------

--
-- Table structure for table `detail_pesan`
--

CREATE TABLE `detail_pesan` (
  `id_detail_pesan` int(11) NOT NULL,
  `id_pesan` int(11) NOT NULL,
  `id_menu` int(11) NOT NULL,
  `jumlah_pesan` int(11) NOT NULL,
  `total_harga_pesan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `karyawan`
--

CREATE TABLE `karyawan` (
  `id_karyawan` int(11) NOT NULL,
  `id_bagian` int(11) NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(100) NOT NULL,
  `nama_karyawan` varchar(20) NOT NULL,
  `alamat_karyawan` text NOT NULL,
  `no_telepon_karyawan` varchar(13) NOT NULL,
  `foto` varchar(100) NOT NULL,
  `status` int(2) NOT NULL COMMENT '1. Aktif;\r\n2. Non-aktif'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `karyawan`
--

INSERT INTO `karyawan` (`id_karyawan`, `id_bagian`, `email`, `password`, `nama_karyawan`, `alamat_karyawan`, `no_telepon_karyawan`, `foto`, `status`) VALUES
(4, 1, 'hendra01@gmail.com', '$2y$10$sK/eA7laaEOPSkDsXd186O9uDzh/Ps825hjcyLdPg9u8.Snq4DYNq', 'Hendra Prayetno', 'Paiton, Probolinggo.', '08234567891', '', 1),
(5, 2, 'rinto02@gmail.com', '$2y$10$sK/eA7laaEOPSkDsXd186O9uDzh/Ps825hjcyLdPg9u8.Snq4DYNq', 'Rinto', 'Sukodadi, Probolinggo.', '123123123123', '', 1),
(6, 3, 'amalia03@gmail.com', '$2y$10$sK/eA7laaEOPSkDsXd186O9uDzh/Ps825hjcyLdPg9u8.Snq4DYNq', 'Amalia', 'Sumberjo, Probolinggo.', '098098098098', '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `kategori_menu`
--

CREATE TABLE `kategori_menu` (
  `id_kategori` int(11) NOT NULL,
  `nama_kategori` varchar(20) NOT NULL,
  `gambar_kategori` varchar(100) NOT NULL,
  `deskripsi_kategori` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kategori_menu`
--

INSERT INTO `kategori_menu` (`id_kategori`, `nama_kategori`, `gambar_kategori`, `deskripsi_kategori`) VALUES
(1, 'main food', '118.jpg', 'makanan berat/makanan utama'),
(2, 'snack', '', ''),
(3, 'dessert', '', ''),
(4, 'fresh drink', '', ''),
(5, 'ice blend', '', ''),
(6, 'freakshake', '', ''),
(7, 'hot drink', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE `menu` (
  `id_menu` int(11) NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `nama_menu` varchar(20) NOT NULL,
  `harga_menu` int(11) NOT NULL,
  `gambar_menu` varchar(100) NOT NULL,
  `deskripsi_menu` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`id_menu`, `id_kategori`, `nama_menu`, `harga_menu`, `gambar_menu`, `deskripsi_menu`) VALUES
(3, 4, 'coffee bear', 10000, '119.jpg', 'tidak beralkohol'),
(4, 4, 'ice kepo', 10000, 'icekepo.jpg', ''),
(5, 4, 'choco greentea', 8000, 'chocogreentea.jpg', ''),
(6, 4, 'lemon lime', 7000, 'lemonlime.jpg', ''),
(7, 4, 'melon punch', 7000, 'melonpunch.jpg', ''),
(8, 4, 'rainbow squash', 7000, 'rainbowsquash.jpg', ''),
(9, 4, 'bromo sunrise', 6000, '', ''),
(10, 4, 'ice kopyor', 7000, 'kopyor.jpg', ''),
(11, 4, 'smoothy spring ice', 7000, '', ''),
(12, 4, 'sepi sendiri', 7000, '', ''),
(13, 4, 'josua', 5000, '', ''),
(14, 4, 'mega mendung', 5000, '', ''),
(15, 4, 'sogem', 8000, '', ''),
(16, 6, 'coklat', 8000, '', ''),
(17, 6, 'strawberry', 8000, '', ''),
(18, 6, 'melon', 8000, '', ''),
(19, 6, 'bumblegum', 8000, '', ''),
(20, 6, 'taro', 8000, '', ''),
(21, 6, 'mangga', 8000, '', ''),
(22, 6, 'anggur', 8000, '', ''),
(23, 5, 'milkshake oreo', 7000, '', ''),
(24, 5, 'milkshake vanila', 5000, '', ''),
(25, 5, 'coklat klasik', 5000, '', ''),
(26, 5, 'greentea', 7000, '', ''),
(27, 5, 'ice cappucino', 5000, '', ''),
(28, 5, 'cappucino cincau', 5000, '', ''),
(29, 5, 'ice milo', 6000, '', ''),
(30, 5, 'ice white coffee', 5000, '', ''),
(31, 5, 'jus jambu', 5000, '', ''),
(32, 5, 'jus alpukat ', 7000, '', ''),
(33, 5, 'jus nanas', 5000, '', ''),
(34, 5, 'jus melon', 5000, '', ''),
(35, 7, 'hot black coffee', 5000, '', ''),
(36, 7, 'kopi susu', 5000, '', ''),
(37, 7, 'wedang jahe', 5000, '', ''),
(38, 7, 'hot milk', 5000, '', ''),
(39, 7, 'hot coklat', 5000, '', ''),
(40, 7, 'hot cappucino', 5000, '', ''),
(41, 7, 'hot milo', 6000, '', ''),
(42, 7, 'hot white coffee', 5000, '', ''),
(43, 1, 'ayam geprek nyiyir', 13000, '', ''),
(44, 1, 'ayam geprek pelakor', 13000, '', ''),
(45, 1, 'ayam gemes', 13000, '', ''),
(46, 1, 'ayam gobyos', 13000, '', ''),
(47, 1, 'lalapan ayam', 13000, '', ''),
(48, 1, 'cumi pedas manis', 15000, '', ''),
(49, 1, 'cumi crispy', 15000, '', ''),
(50, 1, 'udang pedas manis', 15000, '', ''),
(51, 1, 'udang crispy', 15000, '', ''),
(52, 1, 'lalapan lele', 13000, '', ''),
(53, 1, 'lalapan kakap', 18000, '', ''),
(54, 1, 'lalapan putihan', 18000, '', ''),
(55, 1, 'lalapan dorang', 18000, '', ''),
(56, 1, 'nasi goreng', 13000, '', ''),
(57, 1, 'chicken rise bowl', 13000, '', ''),
(58, 2, 'dimsum siomay', 10000, '', ''),
(59, 2, 'sossis', 10000, '', ''),
(60, 2, 'french frien', 10000, '', ''),
(61, 2, 'tahu gaplok', 7000, '', ''),
(62, 2, 'ceker dynamit', 8000, '', ''),
(63, 2, 'cilok bakar', 7000, '', ''),
(64, 2, 'cilok crispy', 7000, '', ''),
(65, 2, 'gedang ganteng ', 7000, '', ''),
(66, 2, 'gedang ayu', 7000, '', ''),
(67, 2, 'roti bakar', 7000, '', ''),
(68, 2, 'mie klenger', 8000, '', ''),
(69, 3, 'banana boom', 10000, '', ''),
(70, 3, 'croissant ice cream', 10000, '', '');

-- --------------------------------------------------------

--
-- Table structure for table `pembeli`
--

CREATE TABLE `pembeli` (
  `id_pembeli` int(11) NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(200) NOT NULL,
  `nama_pembeli` varchar(20) NOT NULL,
  `alamat_pembeli` text NOT NULL,
  `no_telepon_pembeli` varchar(13) NOT NULL,
  `foto` varchar(100) NOT NULL,
  `status` int(2) NOT NULL COMMENT '1. Aktif\r\n2. Non-aktif'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pembeli`
--

INSERT INTO `pembeli` (`id_pembeli`, `email`, `password`, `nama_pembeli`, `alamat_pembeli`, `no_telepon_pembeli`, `foto`, `status`) VALUES
(1, 'user', 'user12', 'deki', 'binor, paiton, probolinggo', '082312408105', '', 1),
(7, 'idristifa@gmail.com', '$2y$10$a9yjxnSZDXTG25/vc025leqVV1uc28xmAHB/COLihRktXzSGjTCH.', 'hendry', 'Probolinggo', '08537538347', 'default.jpg', 1),
(8, 'dinda@gmail.com', '$2y$10$GmdfMcPOMsTwL.KOe38NFui09j64kmJeYEclqiIYi.u8cOqhDkbD6', 'Dinda', 'Probolinggo', '0853753838989', 'default.jpg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `pesan`
--

CREATE TABLE `pesan` (
  `id_pesan` int(11) NOT NULL,
  `id_karyawan` int(11) NOT NULL,
  `tgl_pesan` date NOT NULL,
  `nama_pemesan` varchar(20) NOT NULL,
  `no_meja` varchar(2) NOT NULL,
  `total_pesanan` int(11) NOT NULL,
  `total_bayar` int(11) NOT NULL,
  `kembalian` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `status_transaksi`
--

CREATE TABLE `status_transaksi` (
  `id_status_transaksi` int(11) NOT NULL,
  `status_transaksi` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `status_transaksi`
--

INSERT INTO `status_transaksi` (`id_status_transaksi`, `status_transaksi`) VALUES
(1, 'keranjang');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bagian_karyawan`
--
ALTER TABLE `bagian_karyawan`
  ADD PRIMARY KEY (`id_bagian`);

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`id_booking`);

--
-- Indexes for table `catering`
--
ALTER TABLE `catering`
  ADD PRIMARY KEY (`id_catering`);

--
-- Indexes for table `detail_booking`
--
ALTER TABLE `detail_booking`
  ADD PRIMARY KEY (`id_detail_booking`);

--
-- Indexes for table `detail_catering`
--
ALTER TABLE `detail_catering`
  ADD PRIMARY KEY (`id_detail_catering`);

--
-- Indexes for table `detail_pesan`
--
ALTER TABLE `detail_pesan`
  ADD PRIMARY KEY (`id_detail_pesan`);

--
-- Indexes for table `karyawan`
--
ALTER TABLE `karyawan`
  ADD PRIMARY KEY (`id_karyawan`);

--
-- Indexes for table `kategori_menu`
--
ALTER TABLE `kategori_menu`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id_menu`);

--
-- Indexes for table `pembeli`
--
ALTER TABLE `pembeli`
  ADD PRIMARY KEY (`id_pembeli`);

--
-- Indexes for table `pesan`
--
ALTER TABLE `pesan`
  ADD PRIMARY KEY (`id_pesan`);

--
-- Indexes for table `status_transaksi`
--
ALTER TABLE `status_transaksi`
  ADD PRIMARY KEY (`id_status_transaksi`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bagian_karyawan`
--
ALTER TABLE `bagian_karyawan`
  MODIFY `id_bagian` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `booking`
--
ALTER TABLE `booking`
  MODIFY `id_booking` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `catering`
--
ALTER TABLE `catering`
  MODIFY `id_catering` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `detail_booking`
--
ALTER TABLE `detail_booking`
  MODIFY `id_detail_booking` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `detail_catering`
--
ALTER TABLE `detail_catering`
  MODIFY `id_detail_catering` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `detail_pesan`
--
ALTER TABLE `detail_pesan`
  MODIFY `id_detail_pesan` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `karyawan`
--
ALTER TABLE `karyawan`
  MODIFY `id_karyawan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `kategori_menu`
--
ALTER TABLE `kategori_menu`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `id_menu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;

--
-- AUTO_INCREMENT for table `pembeli`
--
ALTER TABLE `pembeli`
  MODIFY `id_pembeli` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `pesan`
--
ALTER TABLE `pesan`
  MODIFY `id_pesan` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `status_transaksi`
--
ALTER TABLE `status_transaksi`
  MODIFY `id_status_transaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
