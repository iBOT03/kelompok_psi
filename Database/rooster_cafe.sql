-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 23, 2020 at 07:25 PM
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
  `password` varchar(6) NOT NULL,
  `nama_karyawan` varchar(20) NOT NULL,
  `alamat_karyawan` text NOT NULL,
  `no_telepon_karyawan` varchar(13) NOT NULL,
  `foto` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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

-- --------------------------------------------------------

--
-- Table structure for table `pembeli`
--

CREATE TABLE `pembeli` (
  `id_pembeli` int(11) NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(6) NOT NULL,
  `nama_pembeli` varchar(20) NOT NULL,
  `alamat_pembeli` text NOT NULL,
  `no_telepon_pembeli` varchar(13) NOT NULL,
  `foto` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
  MODIFY `id_bagian` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `booking`
--
ALTER TABLE `booking`
  MODIFY `id_booking` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `catering`
--
ALTER TABLE `catering`
  MODIFY `id_catering` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `detail_booking`
--
ALTER TABLE `detail_booking`
  MODIFY `id_detail_booking` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `detail_catering`
--
ALTER TABLE `detail_catering`
  MODIFY `id_detail_catering` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `detail_pesan`
--
ALTER TABLE `detail_pesan`
  MODIFY `id_detail_pesan` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `karyawan`
--
ALTER TABLE `karyawan`
  MODIFY `id_karyawan` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `kategori_menu`
--
ALTER TABLE `kategori_menu`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `id_menu` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pembeli`
--
ALTER TABLE `pembeli`
  MODIFY `id_pembeli` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pesan`
--
ALTER TABLE `pesan`
  MODIFY `id_pesan` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `status_transaksi`
--
ALTER TABLE `status_transaksi`
  MODIFY `id_status_transaksi` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
