-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 26, 2023 at 03:18 PM
-- Server version: 10.4.16-MariaDB
-- PHP Version: 7.3.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbperpus`
--

-- --------------------------------------------------------

--
-- Table structure for table `buku`
--

CREATE TABLE `buku` (
  `id_buku` varchar(20) NOT NULL,
  `kode_buku` varchar(20) DEFAULT NULL,
  `judul_buku` varchar(255) DEFAULT NULL,
  `penerbit_buku` varchar(255) DEFAULT NULL,
  `tahun_penerbit` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `buku`
--

INSERT INTO `buku` (`id_buku`, `kode_buku`, `judul_buku`, `penerbit_buku`, `tahun_penerbit`) VALUES
('BK001', '100000092735', 'Gerhana Rembulan', 'Gramedia ', '1999-06-22'),
('BK002', '100002873535', 'Surakarta Indah', 'Gaxas Media', '1990-08-23'),
('BK005', '10000009927365', 'Jumanji', 'Internet Media', '1990-08-20');

-- --------------------------------------------------------

--
-- Table structure for table `buku_has_penulis`
--

CREATE TABLE `buku_has_penulis` (
  `id_bukuFK` varchar(20) NOT NULL,
  `id_penulisFK` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `buku_has_penulis`
--

INSERT INTO `buku_has_penulis` (`id_bukuFK`, `id_penulisFK`) VALUES
('BK001', 'PS001'),
('BK001', 'PS002'),
('BK001', 'PS003'),
('BK002', 'PS005'),
('BK002', 'PS006'),
('BK002', 'PS007'),
('BK005', 'PS003'),
('BK005', 'PS004');

-- --------------------------------------------------------

--
-- Table structure for table `member`
--

CREATE TABLE `member` (
  `id_member` varchar(20) NOT NULL,
  `nama_member` varchar(100) DEFAULT NULL,
  `alamat_member` varchar(255) DEFAULT NULL,
  `telp_member` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `member`
--

INSERT INTO `member` (`id_member`, `nama_member`, `alamat_member`, `telp_member`) VALUES
('M001', 'Dafa', 'Karangnyar', '0893003166'),
('M002', 'Fajar', 'Sragen', '087325265532');

-- --------------------------------------------------------

--
-- Table structure for table `peminjaman`
--

CREATE TABLE `peminjaman` (
  `id_peminjaman` varchar(20) NOT NULL,
  `id_bukuFK` varchar(20) DEFAULT NULL,
  `id_petugasFK` varchar(20) DEFAULT NULL,
  `id_memberFK` varchar(20) DEFAULT NULL,
  `tanggal_peminjaman` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `peminjaman`
--

INSERT INTO `peminjaman` (`id_peminjaman`, `id_bukuFK`, `id_petugasFK`, `id_memberFK`, `tanggal_peminjaman`) VALUES
('PJ001', 'BK001', 'P001', 'M001', '2023-06-26 08:07:22'),
('PJ003', 'BK003', 'P002', 'M002', '0000-00-00 00:00:00'),
('PJ004', 'BK005', 'P005', 'M003', '2023-06-26 08:14:50'),
('PJ005', 'BK002', 'P006', 'M003', '2023-06-26 08:46:39');

-- --------------------------------------------------------

--
-- Table structure for table `pengembalian`
--

CREATE TABLE `pengembalian` (
  `id_pengembalian` varchar(20) NOT NULL,
  `id_bukuFK` varchar(20) DEFAULT NULL,
  `id_petugasFK` varchar(20) DEFAULT NULL,
  `id_memberFK` varchar(20) DEFAULT NULL,
  `id_peminjamanFK` varchar(20) DEFAULT NULL,
  `tanggal_pengembalian` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pengembalian`
--

INSERT INTO `pengembalian` (`id_pengembalian`, `id_bukuFK`, `id_petugasFK`, `id_memberFK`, `id_peminjamanFK`, `tanggal_pengembalian`) VALUES
('PG001', 'BK003', 'P002', 'M001', 'PJ003', '2023-06-26 08:12:11'),
('PG002', 'BK002', 'P006', 'M003', 'PJ005', '2023-06-26 08:47:07');

-- --------------------------------------------------------

--
-- Table structure for table `penulis`
--

CREATE TABLE `penulis` (
  `id_penulis` varchar(20) NOT NULL,
  `nama_penulis` varchar(100) DEFAULT NULL,
  `alamat_penulis` varchar(255) DEFAULT NULL,
  `telp_penulis` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `penulis`
--

INSERT INTO `penulis` (`id_penulis`, `nama_penulis`, `alamat_penulis`, `telp_penulis`) VALUES
('PS001', 'Joko Widodo', 'Jakarta', '812345678'),
('PS002', 'Susilo Bambang Yudhoyono', 'Semarang', '823456789'),
('PS003', 'Megawati Soekarnoputri', 'Yogyakarta', '834567890'),
('PS004', 'Abdurrahman Wahid', 'Jombang', '845678901'),
('PS005', 'Soeharto', 'Surakarta', '856789012'),
('PS006', 'Pramoedya Ananta Toer', 'Blora', '867890123'),
('PS007', 'Raden Ajeng Kartini', 'Rembang', '878901234'),
('PS008', 'Andrea Hirata', 'Belitung', '889012345'),
('PS009', 'Tere Liye', 'Bandung', '890123456'),
('PS010', 'Dee Lestari', 'Jakarta', '901234567'),
('PS011', 'Ahmad Tohari', 'Purworejo', '912345678'),
('PS012', 'Eka Kurniawan', 'Tasikmalaya', '923456789'),
('PS013', 'DAFA RAMADHAN', 'MADURA', '0999987864324');

-- --------------------------------------------------------

--
-- Table structure for table `petugas`
--

CREATE TABLE `petugas` (
  `id_petugas` varchar(20) NOT NULL,
  `nama_petugas` varchar(100) DEFAULT NULL,
  `alamat_petugas` varchar(255) DEFAULT NULL,
  `telp_petugas` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `petugas`
--

INSERT INTO `petugas` (`id_petugas`, `nama_petugas`, `alamat_petugas`, `telp_petugas`) VALUES
('P001', 'Joko', 'Boyolali', '0873253423445'),
('P002', 'dafa ', 'boyolali', '092230406455'),
('P004', 'rendy', 'jawa tengah', '082435585599'),
('P005', 'juanda', 'jawa', '089545453535'),
('P006', 'zaid', 'madura', '092243516754'),
('P007', 'RENDY', 'JAWA BANGET', '0982783923678');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `buku`
--
ALTER TABLE `buku`
  ADD PRIMARY KEY (`id_buku`);

--
-- Indexes for table `buku_has_penulis`
--
ALTER TABLE `buku_has_penulis`
  ADD PRIMARY KEY (`id_bukuFK`,`id_penulisFK`);

--
-- Indexes for table `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`id_member`);

--
-- Indexes for table `peminjaman`
--
ALTER TABLE `peminjaman`
  ADD PRIMARY KEY (`id_peminjaman`);

--
-- Indexes for table `pengembalian`
--
ALTER TABLE `pengembalian`
  ADD PRIMARY KEY (`id_pengembalian`);

--
-- Indexes for table `penulis`
--
ALTER TABLE `penulis`
  ADD PRIMARY KEY (`id_penulis`);

--
-- Indexes for table `petugas`
--
ALTER TABLE `petugas`
  ADD PRIMARY KEY (`id_petugas`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
