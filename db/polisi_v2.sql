-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Dec 05, 2023 at 06:21 PM
-- Server version: 5.7.39
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `polisi`
--

-- --------------------------------------------------------

--
-- Table structure for table `setting`
--

CREATE TABLE `setting` (
  `id_setting` int(11) NOT NULL,
  `perwira_penanggung_jawab` varchar(1024) DEFAULT NULL,
  `pangkat_pj` varchar(1024) DEFAULT NULL,
  `nrp_pj` int(11) DEFAULT NULL,
  `status_pj` smallint(6) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tb_barang`
--

CREATE TABLE `tb_barang` (
  `id_barang` int(11) NOT NULL,
  `nama_barang` varchar(1024) DEFAULT NULL,
  `jml_barang` varchar(1024) DEFAULT NULL,
  `status_brg` smallint(6) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_barang`
--

INSERT INTO `tb_barang` (`id_barang`, `nama_barang`, `jml_barang`, `status_brg`) VALUES
(1, 'PC Axioo', '3', 1),
(2, 'Speaker Active', '2', 1),
(3, 'Monitor CCTV', '5', 1),
(5, 'tes1', 'tes1', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tb_detil_mutasi_barang`
--

CREATE TABLE `tb_detil_mutasi_barang` (
  `id_mutasi_jaga` int(11) NOT NULL,
  `id_barang` int(11) NOT NULL,
  `keterangan` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_detil_mutasi_barang`
--

INSERT INTO `tb_detil_mutasi_barang` (`id_mutasi_jaga`, `id_barang`, `keterangan`) VALUES
(1, 1, 'Lengkap'),
(1, 2, 'Lengkap'),
(1, 3, 'Lengkap'),
(4, 1, 'LENGKAP'),
(4, 2, 'lengkap'),
(4, 3, 'SUDAH LENGKAP'),
(4, 5, 'KURANG 1');

-- --------------------------------------------------------

--
-- Table structure for table `tb_detil_mutasi_personil`
--

CREATE TABLE `tb_detil_mutasi_personil` (
  `id_mutasi_jaga` int(11) NOT NULL,
  `id_personil` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_detil_mutasi_personil`
--

INSERT INTO `tb_detil_mutasi_personil` (`id_mutasi_jaga`, `id_personil`) VALUES
(1, 1),
(1, 2),
(4, 1),
(4, 2),
(4, 3);

-- --------------------------------------------------------

--
-- Table structure for table `tb_list_mutasi`
--

CREATE TABLE `tb_list_mutasi` (
  `id_list_mutasi` int(11) NOT NULL,
  `id_mutasi_jaga` int(11) DEFAULT NULL,
  `waktu_mutasi` time DEFAULT NULL,
  `keterangan_mutasi` varchar(1024) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_list_mutasi`
--

INSERT INTO `tb_list_mutasi` (`id_list_mutasi`, `id_mutasi_jaga`, `waktu_mutasi`, `keterangan_mutasi`) VALUES
(1, 1, '08:00:00', 'Serah terima petugas piket jaga lama ke petugas jaga baru selama 1x24 jam dalam keadaan aman'),
(2, 1, '09:00:00', 'Personil melaksanakan stand by dari Command Center'),
(3, 4, '01:54:00', 'tes'),
(4, 4, '01:55:00', 'tes lagi\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `tb_mutasi_jaga`
--

CREATE TABLE `tb_mutasi_jaga` (
  `id_mutasi_jaga` int(11) NOT NULL,
  `id_user` int(11) DEFAULT NULL,
  `tgl_mutasi` datetime DEFAULT NULL,
  `analisis` text,
  `evaluasi` text,
  `status_mutasi` smallint(6) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_mutasi_jaga`
--

INSERT INTO `tb_mutasi_jaga` (`id_mutasi_jaga`, `id_user`, `tgl_mutasi`, `analisis`, `evaluasi`, `status_mutasi`) VALUES
(1, 1, '2023-12-04 00:00:00', 'Pintu otomatis tidak berfungsi dengan baik\r\nSalah satu kran air washtafel rusak. Washtafel bocor dan pintu washtafel rusak.', 'Sudah dilakukan koordinasi dengan vendor untuk memperbaiki kerusakan.', 1),
(4, 1, '2023-12-04 12:50:45', 'coba tutup', 'tutup', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tb_personil`
--

CREATE TABLE `tb_personil` (
  `id_personil` int(11) NOT NULL,
  `nama_personil` varchar(1024) DEFAULT NULL,
  `pangkat_personil` varchar(1024) DEFAULT NULL,
  `nrp_personil` int(11) DEFAULT NULL,
  `status_personil` smallint(6) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_personil`
--

INSERT INTO `tb_personil` (`id_personil`, `nama_personil`, `pangkat_personil`, `nrp_personil`, `status_personil`) VALUES
(1, 'Anton Sulistyo', 'Briptu', 7875645, 1),
(2, 'Budi Santosa', 'Briptu', 3457851, 1),
(3, 'Cisilia Pradipta', 'Bripda', 7654897, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE `tb_user` (
  `id_user` int(11) NOT NULL,
  `id_personil` int(11) DEFAULT NULL,
  `username` varchar(1024) DEFAULT NULL,
  `password` varchar(1024) DEFAULT NULL,
  `level` varchar(1024) DEFAULT NULL,
  `status_user` smallint(6) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`id_user`, `id_personil`, `username`, `password`, `level`, `status_user`) VALUES
(1, 1, 'username', 'password', 'admin', 1),
(5, 2, 'user', 'pass', 'petugas', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `setting`
--
ALTER TABLE `setting`
  ADD PRIMARY KEY (`id_setting`);

--
-- Indexes for table `tb_barang`
--
ALTER TABLE `tb_barang`
  ADD PRIMARY KEY (`id_barang`);

--
-- Indexes for table `tb_detil_mutasi_barang`
--
ALTER TABLE `tb_detil_mutasi_barang`
  ADD PRIMARY KEY (`id_mutasi_jaga`,`id_barang`);

--
-- Indexes for table `tb_detil_mutasi_personil`
--
ALTER TABLE `tb_detil_mutasi_personil`
  ADD PRIMARY KEY (`id_mutasi_jaga`,`id_personil`);

--
-- Indexes for table `tb_list_mutasi`
--
ALTER TABLE `tb_list_mutasi`
  ADD PRIMARY KEY (`id_list_mutasi`);

--
-- Indexes for table `tb_mutasi_jaga`
--
ALTER TABLE `tb_mutasi_jaga`
  ADD PRIMARY KEY (`id_mutasi_jaga`);

--
-- Indexes for table `tb_personil`
--
ALTER TABLE `tb_personil`
  ADD PRIMARY KEY (`id_personil`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `setting`
--
ALTER TABLE `setting`
  MODIFY `id_setting` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_barang`
--
ALTER TABLE `tb_barang`
  MODIFY `id_barang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tb_list_mutasi`
--
ALTER TABLE `tb_list_mutasi`
  MODIFY `id_list_mutasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tb_mutasi_jaga`
--
ALTER TABLE `tb_mutasi_jaga`
  MODIFY `id_mutasi_jaga` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tb_personil`
--
ALTER TABLE `tb_personil`
  MODIFY `id_personil` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
