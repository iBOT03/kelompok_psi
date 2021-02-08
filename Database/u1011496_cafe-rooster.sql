-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 08, 2021 at 11:25 AM
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
  `status_transaksi` int(2) NOT NULL,
  `tgl_booking` date NOT NULL,
  `tgl_acara` date NOT NULL,
  `jumlah_meja` int(11) NOT NULL,
  `total_booking` int(11) NOT NULL,
  `dp_booking` varchar(100) NOT NULL,
  `pelunasan_booking` varchar(100) NOT NULL,
  `bukti_tf` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`id_booking`, `id_karyawan`, `id_pembeli`, `status_transaksi`, `tgl_booking`, `tgl_acara`, `jumlah_meja`, `total_booking`, `dp_booking`, `pelunasan_booking`, `bukti_tf`) VALUES
(1, 4, 0, 1, '2020-11-03', '2020-11-07', 12, 100, '500000', '500000', ''),
(2, 0, 7, 3, '2020-12-21', '2020-12-30', 2, 100000, '50000', '50000', 'dessert.jpg'),
(3, 0, 7, 1, '2020-12-21', '2020-12-30', 5, 250000, '125000', '125000', ''),
(4, 0, 7, 3, '2020-12-27', '2020-12-27', 2, 100000, '50000', '50000', ''),
(5, 4, 7, 0, '2020-12-28', '2020-12-30', 1, 50000, '25000', '25000', ''),
(6, 0, 7, 2, '2021-01-09', '2021-01-14', 3, 150000, '75000', '75000', '');

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
  `pelunasan_catering` varchar(100) NOT NULL,
  `catatan` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `catering`
--

INSERT INTO `catering` (`id_catering`, `id_karyawan`, `id_pembeli`, `id_status_transaksi`, `tgl_catering`, `tgl_diperlukan`, `total_catering`, `dp_catering`, `pelunasan_catering`, `catatan`) VALUES
(6, 4, 7, 3, '2020-12-27', '2020-12-30', 16000, '', '16000', 'Pesanan akan kami proses.'),
(7, 4, 7, 3, '2020-12-28', '2020-12-30', 18000, '', '18000', 'asd');

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

--
-- Dumping data for table `detail_booking`
--

INSERT INTO `detail_booking` (`id_detail_booking`, `id_booking`, `id_menu`, `jumlah_menu`, `total_harga_menu`) VALUES
(1, 5, 4, 5, 50000);

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
(9, 6, 5, 2, 16000),
(10, 7, 5, 1, 8000),
(11, 7, 4, 1, 10000);

--
-- Triggers `detail_catering`
--
DELIMITER $$
CREATE TRIGGER `reset_total_catering` AFTER DELETE ON `detail_catering` FOR EACH ROW BEGIN
	UPDATE catering SET total_catering = total_catering - OLD.total_harga_catering
        WHERE id_catering = OLD.id_catering;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `total_harga_catering` AFTER INSERT ON `detail_catering` FOR EACH ROW BEGIN
	UPDATE catering SET total_catering = total_catering + NEW.total_harga_catering
        WHERE id_catering = NEW.id_catering;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `total_harga_catering_update` AFTER UPDATE ON `detail_catering` FOR EACH ROW BEGIN
	UPDATE catering SET total_catering = total_catering + OLD.total_harga_catering
        WHERE id_catering = NEW.id_catering;
END
$$
DELIMITER ;

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

--
-- Dumping data for table `detail_pesan`
--

INSERT INTO `detail_pesan` (`id_detail_pesan`, `id_pesan`, `id_menu`, `jumlah_pesan`, `total_harga_pesan`) VALUES
(57, 16, 3, 1, 10000),
(58, 16, 5, 1, 8000),
(59, 16, 8, 1, 7000),
(62, 18, 8, 1, 7000);

--
-- Triggers `detail_pesan`
--
DELIMITER $$
CREATE TRIGGER `reset_total` AFTER DELETE ON `detail_pesan` FOR EACH ROW BEGIN
	UPDATE pesan SET total_pesanan = total_pesanan - OLD.total_harga_pesan
        WHERE id_pesan = OLD.id_pesan;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `total_harga` AFTER INSERT ON `detail_pesan` FOR EACH ROW BEGIN
	UPDATE pesan SET total_pesanan = total_pesanan + NEW.total_harga_pesan
        WHERE id_pesan = NEW.id_pesan;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `total_harga_update` AFTER UPDATE ON `detail_pesan` FOR EACH ROW BEGIN
	UPDATE pesan SET total_pesanan = total_pesanan + OLD.total_harga_pesan
        WHERE id_pesan = NEW.id_pesan;
END
$$
DELIMITER ;

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
(4, 1, 'hendra01@gmail.com', '$2y$10$sK/eA7laaEOPSkDsXd186O9uDzh/Ps825hjcyLdPg9u8.Snq4DYNq', 'Hendra Prayetno', 'Paiton, Probolinggo.', '08234567891', 'Om_Yoyok.png', 1),
(5, 2, 'rinto02@gmail.com', '$2y$10$sK/eA7laaEOPSkDsXd186O9uDzh/Ps825hjcyLdPg9u8.Snq4DYNq', 'Rinto', 'Sukodadi, Probolinggo.', '123123123123', '', 1),
(6, 3, 'amalia03@gmail.com', '$2y$10$xrsXMMcyINd63VZVdJDioeJyjgtuDud/MjpRJaAgnCYY.glreWCy2', 'Amalia', 'Sumberjo, Probolinggo.', '098098098098', 'snack2.jpg', 1),
(8, 1, 'admin@gmail.com', '$2y$10$jKzbQOTg9/.wtZPI0B.IvO1lR95NZpsdhhFmQDyrQN6GhtGBuxb/S', 'Admin 1', 'Sumenep', '088995422213', '1612740749.jpg', 1),
(9, 3, 'kasir@gmail.com', '$2y$10$3UdMvzC1C/IwXYHHadirpeH/R.I/Dfpj3tVXMA8YIGKZ2YKOIS2N.', 'Kasir 1', 'Sumenep', '087362728192', '1612740907.png', 1);

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
(1, 'main food', 'main_food.jpg', 'makanan berat/makanan utama'),
(2, 'snack', 'snack1.jpg', 'makanan ringan'),
(3, 'dessert', 'dessert1.jpg', 'makanan ringan berupa cake'),
(4, 'fresh drink', 'minuman.jpg', 'minuman segar penggugah selera'),
(5, 'ice blend', 'ice_clend.jpg', 'minuman dengan berbagai toping'),
(6, 'freakshake', 'freakshake.jpg', 'minuman dengan super creamy'),
(7, 'hot drink', 'hot_dring.jpg', 'teman saat kedinginan');

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
(3, 4, 'coffee bear', 10000, 'cofe31.jpg', 'tidak beralkohol'),
(4, 4, 'ice kepo', 10000, 'kepal_milo21.jpg', 'milo dengan parutan ess'),
(5, 4, 'choco greentea', 8000, 'chocogreentea.jpg', 'perpduan teh hijau dengan coklat'),
(6, 4, 'lemon lime', 7000, 'lemonlime.jpg', 'lemon dan min di satukan'),
(7, 4, 'melon punch', 7000, 'melon_61.jpg', 'jus melon dengan toping diatasnya'),
(8, 4, 'rainbow squash', 7000, 'rainbow_squash_jpg3_jp4g.jpg', 'berbagai macam minuman di satukan'),
(9, 4, 'bromo sunrise', 6000, '115802fcfc56f15aeea851b26a75ee781.jpg', 'es campur berbagai toping'),
(10, 4, 'ice kopyor', 7000, 'kopyor21.jpg', 'ice dengan parutan kopyor segar'),
(11, 4, 'smoothy spring ice', 7000, 'smooty2.jpg', 'jus dengan toping ice cream'),
(12, 4, 'sepi sendiri', 7000, 'sepi1.jpg', 'cukup request satu rasa'),
(13, 4, 'josua', 5000, 'joshua21.jpg', 'susu campur ekrajos'),
(14, 4, 'mega mendung', 5000, 'megamendung21.jpg', 'berbagai macam es disatukan'),
(15, 4, 'sogem', 8000, 'sogem21.jpg', 'soda susu dengan gula merah'),
(16, 6, 'coklat', 8000, 'coklat41.png', 'jus coklat'),
(17, 6, 'strawberry', 8000, 'strawberry1.jpg', 'berlumuran srawberry'),
(18, 6, 'melon', 8000, 'jus_melon1.jpg', 'berlumuran melon'),
(19, 6, 'bumblegum', 8000, 'bumblegum1.jpg', 'berlumuran bumblegum'),
(20, 6, 'taro', 8000, 'taro1.jpg', 'berlumuran buah taro'),
(21, 6, 'mangga', 8000, 'mangga1.jpg', 'dengan toping mangga diatasnya'),
(22, 6, 'anggur', 8000, 'anggur21.jpg', 'jus anggur'),
(23, 5, 'milkshake oreo', 7000, 'oreo31.jpg', 'blend oreo'),
(24, 5, 'milkshake vanila', 5000, 'vanila.jpg', 'jus rasa vanila'),
(25, 5, 'coklat klasik', 5000, 'coklatklasik51.jpg', 'jus coklat dengan taburan coklat'),
(26, 5, 'greentea', 7000, 'grentea.jpg', 'jus teh hijau dengan susu'),
(27, 5, 'ice cappucino', 5000, 'capucino.jpg', 'capuchino dengan eskra es'),
(28, 5, 'cappucino cincau', 5000, 'capucino_cincau.jpg', 'caphucino dengan toping cincau'),
(29, 5, 'ice milo', 6000, 'milo2.jpg', 'milo dengan susu'),
(30, 5, 'ice white coffee', 5000, 'white_cofe.jpg', 'cofe putih dengn eksra susu'),
(31, 5, 'jus jambu', 5000, 'jambu.jpg', 'blend jambu'),
(32, 5, 'jus alpukat', 7000, 'alpukat.jpg', 'perpaduan alpukat dengan susu'),
(33, 5, 'jus nanas', 5000, 'nanas.jpg', 'buah nanas murni'),
(34, 5, 'jus melon', 5000, 'jus_melon2.jpg', 'melon dengan susu murni'),
(35, 7, 'hot black coffee', 5000, 'hotkopi.jpg', 'kopi hangat panas'),
(36, 7, 'kopi susu', 5000, 'kopisusu.jpg', 'perpaduan kopi dengan susu'),
(37, 7, 'wedang jahe', 5000, 'wedangjahe.jpg', 'jahe angat dengan gula merah'),
(38, 7, 'hot milk', 5000, 'vanila1.jpg', 'susu hangat panas'),
(39, 7, 'hot coklat', 5000, 'coklatpanas.jpg', 'coklat hangat panas'),
(40, 7, 'hot cappucino', 5000, 'capucino_panas.jpg', 'capuchino hangat panas'),
(41, 7, 'hot milo', 6000, 'milo_hangat.jpg', 'susu milo hangat panas'),
(42, 7, 'hot white coffee', 5000, 'whitecofepanas4jpg.jpg', 'kopi susu hangat panas'),
(43, 1, 'ayam geprek nyiyir', 13000, 'ayam_geprek.jpg', 'ayam cabik dengan cabe'),
(44, 1, 'ayam geprek pelakor', 13000, 'pelakor.jpg', 'ayam utuh dengan cabe'),
(45, 1, 'ayam gemes', 13000, 'ayam_gemes.jpg', 'ayam goreng'),
(46, 1, 'ayam gobyos', 13000, 'gobyos2.jpg', 'ayam dengan kuah cabai'),
(47, 1, 'lalapan ayam', 13000, 'lalapan_ayam2.jpg', 'aneka ragam toping sayuran'),
(48, 1, 'cumi pedas manis', 15000, 'cumi_pedas4.jpg', 'cumi dengan ekstra cabe'),
(49, 1, 'cumi crispy', 15000, 'cumi_crispy4.jpg', 'cumi dengan crispy melimpah'),
(50, 1, 'udang pedas manis', 15000, 'udang_pedas5.jpg', 'udang dengan ektra cabai'),
(51, 1, 'udang crispy', 15000, 'udangcrispy.jpg', 'udang dengan crispy melimpah'),
(52, 1, 'lalapan lele', 13000, 'lele.jpg', 'dengan toping sayuran'),
(53, 1, 'lalapan kakap', 18000, 'kakap2.jpg', 'ikan kakap dengan toping sayuran'),
(54, 1, 'lalapan putihan', 18000, 'putihan4.jpg', 'ikan putihan dengan toping sayuran'),
(55, 1, 'lalapan dorang', 18000, 'dorang4.jpg', 'ikan dorang dengan ekstra sayuran'),
(56, 1, 'nasi goreng', 13000, 'nasi_goreng_2jpg.jpg', 'nasi digorengan dengan rasa khas'),
(57, 1, 'chicken rise bowl', 13000, 'risebowl5.jpg', 'nasi dengan ayam goreng mangkok'),
(58, 2, 'dimsum siomay', 10000, 'dimsum3.jpg', 'perpaduan dengan udang'),
(59, 2, 'sossis', 10000, 'sosis2.jpg', 'sosis di goreng'),
(60, 2, 'french frien', 10000, 'kentang2.jpg', 'kentag di goreng'),
(61, 2, 'tahu gaplok', 7000, 'tahu2.jpg', 'tahu di goreng dengan taburan mayonais'),
(62, 2, 'ceker dynamit', 8000, 'ceker3.jpg', 'ceker dengan lautan cabe'),
(63, 2, 'cilok bakar', 7000, 'cilok.jpg', 'cilok di bakar'),
(64, 2, 'cilok crispy', 7000, 'cilok_crispy3.jpg', 'cilok di goreng'),
(65, 2, 'gedang ganteng', 7000, 'gedang2.jpg', 'pisang goreng coklat'),
(66, 2, 'gedang ayu', 7000, 'gedangayu.jpg', 'pisang di goreng'),
(67, 2, 'roti bakar', 7000, 'roti3.jpg', 'roti di bakar dengan berbagai toping'),
(68, 2, 'mie klenger', 8000, 'mi2.jpg', 'mie dengan cabe menggila'),
(69, 3, 'banana boom', 10000, 'boom_jp4g.jpg', 'pisang dengan kriuk melimpah'),
(70, 3, 'croissant ice cream', 10000, 'trakhir_jpg3.jpg', 'perpaduan eskrim dan cake');

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
(7, 'idristifa@gmail.com', '$2y$10$a9yjxnSZDXTG25/vc025leqVV1uc28xmAHB/COLihRktXzSGjTCH.', 'hendry', 'Probolinggo', '08537538347', 'default.jpg', 1),
(8, 'dinda@gmail.com', '$2y$10$GmdfMcPOMsTwL.KOe38NFui09j64kmJeYEclqiIYi.u8cOqhDkbD6', 'Dinda', 'Probolinggo', '0853753838989', 'default.jpg', 1),
(9, 'user@gmail.com', '$2y$10$i5Mqv12wvwgYKU/P0zXsXupjnnV1ySy6imoQcjINTcq6rCdBSLTGe', 'User 1', 'Sumenep', '085257423236', 'default.jpg', 0);

-- --------------------------------------------------------

--
-- Table structure for table `pesan`
--

CREATE TABLE `pesan` (
  `id_pesan` int(11) NOT NULL,
  `id_karyawan` int(11) NOT NULL,
  `id_status_transaksi` int(11) NOT NULL,
  `tgl_pesan` date NOT NULL,
  `nama_pemesan` varchar(20) NOT NULL,
  `no_meja` varchar(2) NOT NULL,
  `total_pesanan` int(11) NOT NULL,
  `total_bayar` int(11) NOT NULL,
  `kembalian` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pesan`
--

INSERT INTO `pesan` (`id_pesan`, `id_karyawan`, `id_status_transaksi`, `tgl_pesan`, `nama_pemesan`, `no_meja`, `total_pesanan`, `total_bayar`, `kembalian`) VALUES
(16, 4, 2, '2020-12-27', 'Levi', '2', 25000, 40000, 15000),
(18, 4, 2, '2021-01-08', 'aku', '2', 7000, 10000, 3000);

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
(1, 'keranjang'),
(2, 'Belum Bayar'),
(3, 'Dibuat');

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
  MODIFY `id_booking` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `catering`
--
ALTER TABLE `catering`
  MODIFY `id_catering` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `detail_booking`
--
ALTER TABLE `detail_booking`
  MODIFY `id_detail_booking` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `detail_catering`
--
ALTER TABLE `detail_catering`
  MODIFY `id_detail_catering` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `detail_pesan`
--
ALTER TABLE `detail_pesan`
  MODIFY `id_detail_pesan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT for table `karyawan`
--
ALTER TABLE `karyawan`
  MODIFY `id_karyawan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

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
  MODIFY `id_pembeli` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `pesan`
--
ALTER TABLE `pesan`
  MODIFY `id_pesan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `status_transaksi`
--
ALTER TABLE `status_transaksi`
  MODIFY `id_status_transaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
