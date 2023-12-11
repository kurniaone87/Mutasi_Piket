-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 11 Des 2023 pada 16.17
-- Versi server: 10.4.19-MariaDB
-- Versi PHP: 8.0.6

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
-- Struktur dari tabel `setting`
--

CREATE TABLE `setting` (
  `id_setting` int(11) NOT NULL,
  `perwira_penanggung_jawab` varchar(1024) DEFAULT NULL,
  `pangkat_pj` varchar(1024) DEFAULT NULL,
  `nrp_pj` int(11) DEFAULT NULL,
  `status_pj` smallint(6) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `setting`
--

INSERT INTO `setting` (`id_setting`, `perwira_penanggung_jawab`, `pangkat_pj`, `nrp_pj`, `status_pj`) VALUES
(1, 'Agus', 'Jendral', 123, 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_barang`
--

CREATE TABLE `tb_barang` (
  `id_barang` int(11) NOT NULL,
  `nama_barang` varchar(1024) DEFAULT NULL,
  `jml_barang` varchar(1024) DEFAULT NULL,
  `status_brg` smallint(6) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_barang`
--

INSERT INTO `tb_barang` (`id_barang`, `nama_barang`, `jml_barang`, `status_brg`) VALUES
(1, 'PC Axioo', '3', 1),
(2, 'Speaker Active', '2', 1),
(3, 'Monitor CCTV', '5', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_detil_mutasi_barang`
--

CREATE TABLE `tb_detil_mutasi_barang` (
  `id_mutasi_jaga` int(11) NOT NULL,
  `id_barang` int(11) NOT NULL,
  `kelengkapan` varchar(20) DEFAULT NULL,
  `keterangan` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_detil_mutasi_barang`
--

INSERT INTO `tb_detil_mutasi_barang` (`id_mutasi_jaga`, `id_barang`, `kelengkapan`, `keterangan`) VALUES
(1, 1, 'Lengkap', '-'),
(1, 2, 'Lengkap', '-'),
(5, 3, 'Lengkap', '-'),
(9, 1, 'Lengkap', '-'),
(9, 2, 'Tidak Lengkap', 'satu barang diperbaiki'),
(9, 3, 'Lengkap', ''),
(10, 1, 'Lengkap', ''),
(11, 1, 'Lengkap', 'lengkap');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_detil_mutasi_personil`
--

CREATE TABLE `tb_detil_mutasi_personil` (
  `id_mutasi_jaga` int(11) NOT NULL,
  `id_personil` int(11) NOT NULL,
  `keterangan` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_detil_mutasi_personil`
--

INSERT INTO `tb_detil_mutasi_personil` (`id_mutasi_jaga`, `id_personil`, `keterangan`) VALUES
(1, 1, '0'),
(1, 2, '0'),
(9, 1, '0'),
(9, 2, '0'),
(11, 1, 'Ta Jaga');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_list_mutasi`
--

CREATE TABLE `tb_list_mutasi` (
  `id_list_mutasi` int(11) NOT NULL,
  `id_mutasi_jaga` int(11) DEFAULT NULL,
  `waktu_mutasi` time DEFAULT NULL,
  `keterangan_mutasi` varchar(1024) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_list_mutasi`
--

INSERT INTO `tb_list_mutasi` (`id_list_mutasi`, `id_mutasi_jaga`, `waktu_mutasi`, `keterangan_mutasi`) VALUES
(1, 1, '08:00:00', 'Serah terima petugas piket jaga lama ke petugas jaga baru selama 1x24 jam dalam keadaan aman'),
(2, 1, '09:00:00', 'Personil melaksanakan stand by dari Command Center'),
(3, 9, '11:43:00', 'Serah terima barang HT'),
(4, 11, '23:14:00', 'tes'),
(5, 11, '23:17:00', 'tes2');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_mutasi_jaga`
--

CREATE TABLE `tb_mutasi_jaga` (
  `id_mutasi_jaga` int(11) NOT NULL,
  `id_user` int(11) DEFAULT NULL,
  `tgl_mutasi` datetime DEFAULT NULL,
  `analisis` text DEFAULT NULL,
  `evaluasi` text DEFAULT NULL,
  `status_mutasi` smallint(6) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_mutasi_jaga`
--

INSERT INTO `tb_mutasi_jaga` (`id_mutasi_jaga`, `id_user`, `tgl_mutasi`, `analisis`, `evaluasi`, `status_mutasi`) VALUES
(1, 1, '2023-12-04 00:00:00', 'Pintu otomatis tidak berfungsi dengan baik\r\nSalah satu kran air washtafel rusak. Washtafel bocor dan pintu washtafel rusak.', 'Sudah dilakukan koordinasi dengan vendor untuk memperbaiki kerusakan.', 1),
(5, 1, '2023-12-04 14:36:13', 'disini analisa', 'disini evaluasi', 1),
(6, 1, '2023-12-04 16:48:12', '1', '2', 1),
(7, 1, '2023-12-04 16:48:52', '22', '22', 1),
(8, 1, '2023-12-04 16:59:09', 'rrr', 'rrrr', 1),
(9, 1, '2023-12-06 02:23:40', 'joss', 'joss', 1),
(10, 1, '2023-12-06 06:12:28', 'tes', 'tes', 1),
(11, 1, '2023-12-11 16:09:17', 'selesai', 'selesai', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_personil`
--

CREATE TABLE `tb_personil` (
  `id_personil` int(11) NOT NULL,
  `nama_personil` varchar(1024) DEFAULT NULL,
  `pangkat_personil` varchar(1024) DEFAULT NULL,
  `nrp_personil` int(11) DEFAULT NULL,
  `status_personil` smallint(6) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_personil`
--

INSERT INTO `tb_personil` (`id_personil`, `nama_personil`, `pangkat_personil`, `nrp_personil`, `status_personil`) VALUES
(1, 'Anton Sulistyo', 'Briptu', 7875645, 1),
(2, 'Budi Santosa', 'Briptu', 3457851, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_user`
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
-- Dumping data untuk tabel `tb_user`
--

INSERT INTO `tb_user` (`id_user`, `id_personil`, `username`, `password`, `level`, `status_user`) VALUES
(1, 1, 'username', 'password', 'admin', 1),
(5, 2, 'user', 'pass', 'petugas', 1);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `setting`
--
ALTER TABLE `setting`
  ADD PRIMARY KEY (`id_setting`);

--
-- Indeks untuk tabel `tb_barang`
--
ALTER TABLE `tb_barang`
  ADD PRIMARY KEY (`id_barang`);

--
-- Indeks untuk tabel `tb_detil_mutasi_barang`
--
ALTER TABLE `tb_detil_mutasi_barang`
  ADD PRIMARY KEY (`id_mutasi_jaga`,`id_barang`);

--
-- Indeks untuk tabel `tb_detil_mutasi_personil`
--
ALTER TABLE `tb_detil_mutasi_personil`
  ADD PRIMARY KEY (`id_mutasi_jaga`,`id_personil`);

--
-- Indeks untuk tabel `tb_list_mutasi`
--
ALTER TABLE `tb_list_mutasi`
  ADD PRIMARY KEY (`id_list_mutasi`);

--
-- Indeks untuk tabel `tb_mutasi_jaga`
--
ALTER TABLE `tb_mutasi_jaga`
  ADD PRIMARY KEY (`id_mutasi_jaga`);

--
-- Indeks untuk tabel `tb_personil`
--
ALTER TABLE `tb_personil`
  ADD PRIMARY KEY (`id_personil`);

--
-- Indeks untuk tabel `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `setting`
--
ALTER TABLE `setting`
  MODIFY `id_setting` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `tb_barang`
--
ALTER TABLE `tb_barang`
  MODIFY `id_barang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `tb_list_mutasi`
--
ALTER TABLE `tb_list_mutasi`
  MODIFY `id_list_mutasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `tb_mutasi_jaga`
--
ALTER TABLE `tb_mutasi_jaga`
  MODIFY `id_mutasi_jaga` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `tb_personil`
--
ALTER TABLE `tb_personil`
  MODIFY `id_personil` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
