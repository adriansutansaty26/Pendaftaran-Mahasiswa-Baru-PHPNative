-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 29, 2022 at 12:51 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbpmbkampus`
--

-- --------------------------------------------------------

--
-- Table structure for table `akun`
--

CREATE TABLE `akun` (
  `id` int(11) NOT NULL,
  `email` varchar(45) NOT NULL,
  `password` varchar(45) NOT NULL,
  `level` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `akun`
--

INSERT INTO `akun` (`id`, `email`, `password`, `level`) VALUES
(6, 'root@admin.com', '2b0135c6fdd6b9149f2f8cecc799243a85b95aa5', 1),
(7, 'adrian@gmail.com', '2b0135c6fdd6b9149f2f8cecc799243a85b95aa5', 0);

-- --------------------------------------------------------

--
-- Table structure for table `camaba`
--

CREATE TABLE `camaba` (
  `nama` varchar(45) NOT NULL,
  `nisn` varchar(45) NOT NULL,
  `alamat` varchar(45) NOT NULL,
  `jenis_kelamin` enum('L','P') NOT NULL,
  `agama` varchar(45) NOT NULL,
  `tempat_lahir` varchar(45) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `nama_ortu` varchar(45) NOT NULL,
  `nilai_indo` int(11) NOT NULL,
  `nilai_ing` int(11) NOT NULL,
  `nilai_mat` int(11) NOT NULL,
  `nilai_ipa` int(11) NOT NULL,
  `jumlah_nilai` int(11) NOT NULL,
  `sekolah_asal` varchar(45) NOT NULL,
  `akun_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `camaba`
--

INSERT INTO `camaba` (`nama`, `nisn`, `alamat`, `jenis_kelamin`, `agama`, `tempat_lahir`, `tgl_lahir`, `nama_ortu`, `nilai_indo`, `nilai_ing`, `nilai_mat`, `nilai_ipa`, `jumlah_nilai`, `sekolah_asal`, `akun_id`) VALUES
('Adrian Sutansaty', '0030091245', 'Kampung Kota', 'L', 'Islam', 'Indonesia', '2002-02-02', 'Bapak Adrian', 80, 85, 90, 95, 350, 'Sman 1 Indonesia', 7);

-- --------------------------------------------------------

--
-- Table structure for table `fakultas`
--

CREATE TABLE `fakultas` (
  `id` int(11) NOT NULL,
  `nama_fakultas` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `fakultas`
--

INSERT INTO `fakultas` (`id`, `nama_fakultas`) VALUES
(11, 'Fakultas Ilmu Komputer');

-- --------------------------------------------------------

--
-- Table structure for table `prestasi`
--

CREATE TABLE `prestasi` (
  `id` int(11) NOT NULL,
  `nama_prestasi` varchar(45) NOT NULL,
  `camaba_akun_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `prestasi`
--

INSERT INTO `prestasi` (`id`, `nama_prestasi`, `camaba_akun_id`) VALUES
(8, 'Juara 1 Mencintaimu', 7);

-- --------------------------------------------------------

--
-- Table structure for table `prodi`
--

CREATE TABLE `prodi` (
  `id` int(11) NOT NULL,
  `nama_jurusan` varchar(45) NOT NULL,
  `fakultas_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `prodi`
--

INSERT INTO `prodi` (`id`, `nama_jurusan`, `fakultas_id`) VALUES
(15, 'Teknik Informatika', 11),
(16, 'Sistem Informasi', 11);

-- --------------------------------------------------------

--
-- Table structure for table `prodi_camaba`
--

CREATE TABLE `prodi_camaba` (
  `prodi_id` int(11) NOT NULL,
  `camaba_akun_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `prodi_camaba`
--

INSERT INTO `prodi_camaba` (`prodi_id`, `camaba_akun_id`) VALUES
(16, 7);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `akun`
--
ALTER TABLE `akun`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `camaba`
--
ALTER TABLE `camaba`
  ADD PRIMARY KEY (`akun_id`),
  ADD UNIQUE KEY `nisn_UNIQUE` (`nisn`),
  ADD KEY `fk_camaba_akun1` (`akun_id`);

--
-- Indexes for table `fakultas`
--
ALTER TABLE `fakultas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `prestasi`
--
ALTER TABLE `prestasi`
  ADD PRIMARY KEY (`id`,`camaba_akun_id`),
  ADD KEY `fk_prestasi_camaba1` (`camaba_akun_id`);

--
-- Indexes for table `prodi`
--
ALTER TABLE `prodi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_prodi_fakultas1` (`fakultas_id`);

--
-- Indexes for table `prodi_camaba`
--
ALTER TABLE `prodi_camaba`
  ADD PRIMARY KEY (`prodi_id`,`camaba_akun_id`),
  ADD KEY `fk_prodi_camaba_prodi1` (`prodi_id`),
  ADD KEY `fk_prodi_camaba_camaba1` (`camaba_akun_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `akun`
--
ALTER TABLE `akun`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `fakultas`
--
ALTER TABLE `fakultas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `prestasi`
--
ALTER TABLE `prestasi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `prodi`
--
ALTER TABLE `prodi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `camaba`
--
ALTER TABLE `camaba`
  ADD CONSTRAINT `fk_camaba_akun1` FOREIGN KEY (`akun_id`) REFERENCES `akun` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `prestasi`
--
ALTER TABLE `prestasi`
  ADD CONSTRAINT `fk_prestasi_camaba1` FOREIGN KEY (`camaba_akun_id`) REFERENCES `camaba` (`akun_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `prodi`
--
ALTER TABLE `prodi`
  ADD CONSTRAINT `fk_prodi_fakultas1` FOREIGN KEY (`fakultas_id`) REFERENCES `fakultas` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `prodi_camaba`
--
ALTER TABLE `prodi_camaba`
  ADD CONSTRAINT `fk_prodi_camaba_camaba1` FOREIGN KEY (`camaba_akun_id`) REFERENCES `camaba` (`akun_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_prodi_camaba_prodi1` FOREIGN KEY (`prodi_id`) REFERENCES `prodi` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
