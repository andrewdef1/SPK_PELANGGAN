-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 13, 2021 at 02:01 PM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 8.0.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `spk_pelanggan`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `nama_admin` varchar(30) NOT NULL,
  `user_admin` varchar(30) NOT NULL,
  `password_admin` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `nama_admin`, `user_admin`, `password_admin`) VALUES
(1, 'Admin', 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `pelanggan`
--

CREATE TABLE `pelanggan` (
  `id_peserta_pelanggan` int(20) NOT NULL,
  `no_pel` varchar(69) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `email` varchar(255) NOT NULL,
  `telp` varchar(255) NOT NULL,
  `c1` double NOT NULL DEFAULT 1,
  `c2` double NOT NULL DEFAULT 1,
  `c3` double NOT NULL DEFAULT 1,
  `vektor_s` double NOT NULL,
  `vektor_v` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pelanggan`
--

INSERT INTO `pelanggan` (`id_peserta_pelanggan`, `no_pel`, `nama`, `alamat`, `email`, `telp`, `c1`, `c2`, `c3`, `vektor_s`, `vektor_v`) VALUES
(1, '1122', 'Junaidi', 'Klopkam', 'nedjuned@gmail.com', '08148516', 5, 5, 1, 2.5570104477806, 69),
(2, '3344', 'Raga', 'Merauke', 'charga@gmail.com', '085252', 3, 5, 2, 3.0039968988016, 70),
(3, '5566', 'Chipin', 'Tulung Agung', 'chipin@gmail.com', '086969', 4, 5, 1, 2.418271175122, 72),
(4, '696969', 'drew', 'Ambong', 'andrewdefretes@gmail.com', '0855555', 2, 5, 1, 2.0335155622714, 79);

-- --------------------------------------------------------

--
-- Table structure for table `periode_pemenang`
--

CREATE TABLE `periode_pemenang` (
  `id` int(69) NOT NULL,
  `id_peserta_pelanggan` int(69) NOT NULL,
  `no_pel` int(69) NOT NULL,
  `tahun_periode` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `periode_pemenang`
--

INSERT INTO `periode_pemenang` (`id`, `id_peserta_pelanggan`, `no_pel`, `tahun_periode`) VALUES
(1, 2, 3344, '2021'),
(2, 1, 1122, '2021'),
(3, 3, 5566, '2022'),
(4, 4, 696969, '2021');

-- --------------------------------------------------------

--
-- Table structure for table `tb_hmp_kriteria`
--

CREATE TABLE `tb_hmp_kriteria` (
  `id_hmp` int(11) NOT NULL,
  `himpunan` varchar(70) NOT NULL,
  `keterangan` varchar(40) NOT NULL,
  `nilai` int(11) NOT NULL,
  `nama_kriteria` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_hmp_kriteria`
--

INSERT INTO `tb_hmp_kriteria` (`id_hmp`, `himpunan`, `keterangan`, `nilai`, `nama_kriteria`) VALUES
(1, '100', 'Sangat penting', 5, 'Kecepatan Internet'),
(2, '50', 'Penting', 4, 'Kecepatan Internet'),
(3, '40', 'Ragu-ragu', 3, 'Kecepatan Internet'),
(4, '30', 'Tidak penting', 2, 'Kecepatan Internet'),
(5, '20 dan 10', 'Sangat tidak penting', 1, 'Kecepatan Internet'),
(6, '89 - 100', 'Sangat penting', 5, 'Tanggal Pembayaran'),
(7, '76 - 85', 'Ragu-ragu', 3, 'Tanggal Pembayaran'),
(8, '66 -75', 'Sangat tidak penting', 1, 'Tanggal Pembayaran'),
(9, '>= 7 tahun', 'Sangat penting', 5, 'Periode Tahun Aktif'),
(10, '5-6 tahun', 'Penting', 4, 'Periode Tahun Aktif'),
(11, '3-4 tahun', 'Ragu-ragu', 3, 'Periode Tahun Aktif'),
(12, '2 tahun', 'Tidak penting', 2, 'Periode Tahun Aktif'),
(13, '<= 1 tahun', 'Sangat tidak penting', 1, 'Periode Tahun Aktif');

-- --------------------------------------------------------

--
-- Table structure for table `tb_kriteria`
--

CREATE TABLE `tb_kriteria` (
  `id_kriteria` int(11) NOT NULL,
  `nama_kriteria` varchar(30) NOT NULL,
  `bobot` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_kriteria`
--

INSERT INTO `tb_kriteria` (`id_kriteria`, `nama_kriteria`, `bobot`) VALUES
(1, 'Kecepatan Internet', 3),
(2, 'Tanggal Pembayaran', 4),
(3, 'Periode Tahun Aktif', 5);

-- --------------------------------------------------------

--
-- Table structure for table `tb_pengaturan`
--

CREATE TABLE `tb_pengaturan` (
  `id_pengaturan` int(11) NOT NULL,
  `pengaturan` varchar(20) NOT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_pengaturan`
--

INSERT INTO `tb_pengaturan` (`id_pengaturan`, `pengaturan`, `status`) VALUES
(1, 'pendaftaran', 1),
(2, 'penilaian', 1),
(3, 'pengumuman', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`id_peserta_pelanggan`),
  ADD UNIQUE KEY `no_pel` (`no_pel`),
  ADD KEY `email` (`email`);

--
-- Indexes for table `periode_pemenang`
--
ALTER TABLE `periode_pemenang`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_peserta_pelanggan` (`id_peserta_pelanggan`);

--
-- Indexes for table `tb_hmp_kriteria`
--
ALTER TABLE `tb_hmp_kriteria`
  ADD PRIMARY KEY (`id_hmp`);

--
-- Indexes for table `tb_kriteria`
--
ALTER TABLE `tb_kriteria`
  ADD PRIMARY KEY (`id_kriteria`);

--
-- Indexes for table `tb_pengaturan`
--
ALTER TABLE `tb_pengaturan`
  ADD PRIMARY KEY (`id_pengaturan`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `pelanggan`
--
ALTER TABLE `pelanggan`
  MODIFY `id_peserta_pelanggan` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `periode_pemenang`
--
ALTER TABLE `periode_pemenang`
  MODIFY `id` int(69) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tb_hmp_kriteria`
--
ALTER TABLE `tb_hmp_kriteria`
  MODIFY `id_hmp` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT for table `tb_kriteria`
--
ALTER TABLE `tb_kriteria`
  MODIFY `id_kriteria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tb_pengaturan`
--
ALTER TABLE `tb_pengaturan`
  MODIFY `id_pengaturan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `periode_pemenang`
--
ALTER TABLE `periode_pemenang`
  ADD CONSTRAINT `periode_pemenang_ibfk_1` FOREIGN KEY (`id_peserta_pelanggan`) REFERENCES `pelanggan` (`id_peserta_pelanggan`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
