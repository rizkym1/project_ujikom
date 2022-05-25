-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 06, 2022 at 05:02 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.2.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_hotel`
--

-- --------------------------------------------------------

--
-- Table structure for table `level`
--

CREATE TABLE `level` (
  `id` int(11) NOT NULL,
  `level` varchar(100) NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `level`
--

INSERT INTO `level` (`id`, `level`, `keterangan`) VALUES
(1, 'administrator', 'Kelola semua fitur aplikasi'),
(2, 'resepsionis', 'Kelola data tamu'),
(3, 'tamu', 'Dapat menikmati semua fitur yang ada di aplikasi');

-- --------------------------------------------------------

--
-- Table structure for table `tb_fasilitas_umum`
--

CREATE TABLE `tb_fasilitas_umum` (
  `id_fasilitas` int(11) NOT NULL,
  `fasilitas` varchar(255) NOT NULL,
  `keterangan` text NOT NULL,
  `foto_fasilitas` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_fasilitas_umum`
--

INSERT INTO `tb_fasilitas_umum` (`id_fasilitas`, `fasilitas`, `keterangan`, `foto_fasilitas`) VALUES
(1, 'Kamar Mandi', 'Terdapat Shower, WC Duduk, Jolang', 'kamar-mandi-img.jpg'),
(2, 'Gratis Wifi', '24 Jam, Tanpa Batasan Internet, Setiap Kamar', 'wifi-img.jpg'),
(19, 'Kolam Renang Dewasa', '30 M2, 2 Kolam Dewasa, 1 Kolam Anak-anak', 'kolam-img.jpg'),
(20, 'Sepeda', 'Tanpa biaya tambahan, Bebas pakai selama inap,', '453952817_sepeda-img.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tb_kamar`
--

CREATE TABLE `tb_kamar` (
  `id_kamar` int(11) NOT NULL,
  `tipe_kamar` varchar(100) NOT NULL,
  `fasilitas` text NOT NULL,
  `keterangan` text NOT NULL,
  `stok_kamar` varchar(100) NOT NULL,
  `harga` varchar(255) NOT NULL,
  `foto_kamar` varchar(255) NOT NULL,
  `kode_kamar` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_kamar`
--

INSERT INTO `tb_kamar` (`id_kamar`, `tipe_kamar`, `fasilitas`, `keterangan`, `stok_kamar`, `harga`, `foto_kamar`, `kode_kamar`) VALUES
(1, 'Standard Room', 'Satu kamar ukuran 25 m2, Kasur singel bed + 2 Bantal dan Guling, Sofa, Televisi, AC, Toilet', 'Kamar standard room adalah tipe kamar hotel yang paling dasar di hotel.', '7', '450000', '978069795_kamar1.jpg', '01085357'),
(2, 'Superior  Room', 'Satu kamar ukuran 30 m2, Kasur dauble bed + 2 Bantal dan 2 Guling, Sofa, Televisi, AC, Telepon, Toilet', 'Superior room adalah tipe kamar yang sedikit lebih baik dari tipe standard room.', '5', '600000', '152577542_kamar2.jpeg', '97305828'),
(3, 'Deluxe  Room', 'Satu kamar ukuran 40 m2, Kasur dauble bed atau twin bed + 4 Bantal 2 Guling, Sofa, Televisi, AC, Telepon', 'Kamar ini tentu memiliki kamar yang lebih besar.Tersedia pilihan kasur yang bisa kamu pilih, double bed atau twin bed. Biasanya, dari segi interior kamar ini terkesan lebih mewah.', '5', '750000', '1427411274_kamar3.jpg', '08572582'),
(6, 'Suite  Room', 'Satu kamar ukuran 80 m2, Kasur king bed, Televisi, Sofa, AC, Telepon, Toilet, Shower, Area bath tub, Ruang tamu, Dapur', 'Suite room berada di atas tipe kamar hotel junior suite room. Ruang tamu di kamar hotel ini terpisah dari kamar tidur. Dari segi fasilitas, tentu berbeda dari junior suite room. Selain ruang tamu, biasanya tipe kamar hotel ini dilengkapi dengan dapur.', '5', '1000000', '905061232_2096277175_kamar.jpg', '28502738');

-- --------------------------------------------------------

--
-- Table structure for table `tb_order`
--

CREATE TABLE `tb_order` (
  `id_order` int(11) NOT NULL,
  `check_in` date NOT NULL,
  `check_out` date NOT NULL,
  `tipe_kamar` varchar(100) NOT NULL,
  `harga` varchar(255) NOT NULL,
  `jumlah_order` varchar(20) NOT NULL,
  `username` varchar(100) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `no_telephone` varchar(20) NOT NULL,
  `alamat` text NOT NULL,
  `lama_hari` varchar(20) NOT NULL,
  `total_bayar` varchar(255) NOT NULL,
  `bukti_pembayaran` text DEFAULT NULL,
  `nama_bank` varchar(255) DEFAULT NULL,
  `kode_booking` varchar(100) NOT NULL,
  `status` enum('diproses','konfirmasi','selesai','dibatalkan') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_order`
--

INSERT INTO `tb_order` (`id_order`, `check_in`, `check_out`, `tipe_kamar`, `harga`, `jumlah_order`, `username`, `nama`, `email`, `no_telephone`, `alamat`, `lama_hari`, `total_bayar`, `bukti_pembayaran`, `nama_bank`, `kode_booking`, `status`) VALUES
(1, '2022-02-23', '2022-02-28', 'Superior Room', '600000', '3', 'admin1', 'rizkymlna', 'rizkimaulana3216@gmail.com', '0895', 'banjar', '5 malam', 'Rp. 9.000.000', NULL, NULL, '', 'diproses'),
(2, '2022-02-23', '2022-02-28', 'Deluxe Room', '750000', '5', 'admin', 'Rizky Maulana', 'rizky@gmail.com', '0895613984417', 'jelat', '5 malam', 'Rp. 18.750.000', NULL, NULL, '', 'diproses'),
(3, '2022-02-28', '2022-03-02', 'Deluxe Room', '750000', '3', 'admin', 'Rizky Maulana', 'rizky@gmail.com', '0895613984417', 'banjar', '2 malam', 'Rp. 4.500.000', NULL, NULL, '', 'diproses'),
(4, '2022-02-28', '2022-03-03', 'Superior Room', '600000', '3', 'admin', 'Rizky Maulana', 'rizky@gmail.com', '0895613984417', 'jelat', '3 malam', 'Rp. 5.400.000', NULL, NULL, '', 'diproses'),
(5, '2022-03-03', '2022-03-05', 'Standard Room', '450000', '3', 'madhaakbar', 'madha', 'madha@gmail.com', '0987654321', 'banjar', '2 malam', 'Rp. 2.700.000', NULL, NULL, '', 'diproses'),
(6, '2022-03-02', '2022-03-05', 'Suite  Room', '1000000', '3', 'madhaakbar', 'madha', 'madha@gmail.com', '0987654321', 'Kota Banjar', '3 malam', 'Rp. 9.000.000', NULL, NULL, '', 'diproses'),
(7, '2022-03-05', '2022-03-08', 'Standard Room', '450000', '7', 'admin', 'Rizky Maulana', 'rizky@gmail.com', '0895613984417', 'jelat', '3 malam', 'Rp. 9.450.000', NULL, NULL, '', 'diproses');

-- --------------------------------------------------------

--
-- Table structure for table `tb_users`
--

CREATE TABLE `tb_users` (
  `id_user` int(11) NOT NULL,
  `foto_profile` text NOT NULL DEFAULT 'default.svg',
  `nama_lengkap` varchar(255) NOT NULL,
  `no_telp` varchar(20) NOT NULL,
  `email` varchar(100) NOT NULL,
  `alamat` text DEFAULT NULL,
  `username` varchar(100) NOT NULL,
  `password` text NOT NULL,
  `id_level` int(11) NOT NULL DEFAULT 3,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_users`
--

INSERT INTO `tb_users` (`id_user`, `foto_profile`, `nama_lengkap`, `no_telp`, `email`, `alamat`, `username`, `password`, `id_level`, `created_at`) VALUES
(1, 'default.svg', 'Rizky Maulana', '0895613984417', 'rizky@gmail.com', NULL, 'admin', '$2y$10$YvyMnfPw1UCU6DSiOXv1h.kT7E53da96QhnbXyoxZlklRcdFbpODO', 3, '0000-00-00 00:00:00'),
(7, 'default.svg', 'rizkymlna', '0895', 'rizkimaulana3216@gmail.com', NULL, 'admin1', '$2y$10$F72L6QjM3nEeTuudFAgX0O6K5mRaxu6oT90z4dwH3e9ugD1D.3d2W', 1, '0000-00-00 00:00:00'),
(8, 'default.svg', 'resepsionis', '0987654377', 'resepsionis@gmail.com', NULL, 'resepsionis', '$2y$10$6TZF1hkbDqg3K150XqVj4uk9EM2WlXp37xKqpJglRNRx4nw1ILNF.', 2, '0000-00-00 00:00:00'),
(13, 'default.svg', 'madha', '0987654321', 'madha@gmail.com', NULL, 'madhaakbar', '$2y$10$ph.JbODrO.Wmafscim4O4ukS/Uhr1l.QKmbMYmh7SxqmEzsZNKUim', 3, '0000-00-00 00:00:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `level`
--
ALTER TABLE `level`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_fasilitas_umum`
--
ALTER TABLE `tb_fasilitas_umum`
  ADD PRIMARY KEY (`id_fasilitas`);

--
-- Indexes for table `tb_kamar`
--
ALTER TABLE `tb_kamar`
  ADD PRIMARY KEY (`id_kamar`);

--
-- Indexes for table `tb_order`
--
ALTER TABLE `tb_order`
  ADD PRIMARY KEY (`id_order`);

--
-- Indexes for table `tb_users`
--
ALTER TABLE `tb_users`
  ADD PRIMARY KEY (`id_user`),
  ADD KEY `id_level` (`id_level`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `level`
--
ALTER TABLE `level`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tb_fasilitas_umum`
--
ALTER TABLE `tb_fasilitas_umum`
  MODIFY `id_fasilitas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `tb_kamar`
--
ALTER TABLE `tb_kamar`
  MODIFY `id_kamar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `tb_order`
--
ALTER TABLE `tb_order`
  MODIFY `id_order` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tb_users`
--
ALTER TABLE `tb_users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tb_users`
--
ALTER TABLE `tb_users`
  ADD CONSTRAINT `tb_users_ibfk_1` FOREIGN KEY (`id_level`) REFERENCES `level` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
