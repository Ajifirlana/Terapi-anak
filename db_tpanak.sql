-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 11 Des 2021 pada 18.22
-- Versi server: 10.4.11-MariaDB
-- Versi PHP: 7.4.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_tpanak`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `jw_terapis`
--

CREATE TABLE `jw_terapis` (
  `id_jadwal` int(20) NOT NULL,
  `id_anak` int(20) NOT NULL,
  `jam_mulai` int(20) NOT NULL,
  `jam_selesai` int(15) NOT NULL,
  `hari` text NOT NULL,
  `ruang` varchar(30) DEFAULT NULL,
  `jenis_terapi` text NOT NULL,
  `id_guru` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `jw_terapis`
--

INSERT INTO `jw_terapis` (`id_jadwal`, `id_anak`, `jam_mulai`, `jam_selesai`, `hari`, `ruang`, `jenis_terapi`, `id_guru`) VALUES
(35, 13, 6, 7, 'selasa', '31', 'NORMAL', ''),
(37, 13, 6, 7, 'senin', 'Ruang Aba', 'NORMAL', ''),
(38, 11, 7, 8, 'senin', 'Ruang Fisio', 'NORMAL', ''),
(39, 13, 8, 9, 'senin', 'Ruang Okupasi', 'TERAPI ', ''),
(40, 11, 8, 9, 'selasa', 'Ruang Sensor integra', 'normal', '31');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tabel_izin`
--

CREATE TABLE `tabel_izin` (
  `id_izn` int(20) NOT NULL,
  `id_anak` int(20) NOT NULL,
  `tanggal_mulai` int(20) DEFAULT NULL,
  `keterangan` text NOT NULL,
  `tanggal_pengajuan` date NOT NULL,
  `status` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tabel_pengganti`
--

CREATE TABLE `tabel_pengganti` (
  `id_pengganti` int(20) NOT NULL,
  `id_izin` int(20) NOT NULL,
  `tanggal_pengganti` int(20) NOT NULL,
  `jam_mulai` int(15) NOT NULL,
  `jam_selesai` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tabel_pengganti`
--

INSERT INTO `tabel_pengganti` (`id_pengganti`, `id_izin`, `tanggal_pengganti`, `jam_mulai`, `jam_selesai`) VALUES
(1, 2, 23, 7, 8);

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_admin`
--

CREATE TABLE `t_admin` (
  `id` int(20) NOT NULL,
  `id_user` int(20) DEFAULT NULL,
  `nama_user` text DEFAULT NULL,
  `password` text DEFAULT NULL,
  `hak_akses` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `t_admin`
--

INSERT INTO `t_admin` (`id`, `id_user`, `nama_user`, `password`, `hak_akses`) VALUES
(1, 1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'admin'),
(26, NULL, 'ANGGUN', '5d4451770bf2b41265a9bfb5161b8ecc', 'guru'),
(30, 13, 'maksunarti', 'f27c901d9c80f1aad67be381e3790cf1', 'orang_tua'),
(31, NULL, 'guru2', '440a21bd2b3a7c686cf3238883dd34e9', 'guru'),
(32, 11, 'YULIANA', '4a82f02b2cd6d7971fe1634d3fe0ee74', 'orang_tua'),
(33, NULL, 'guru3', 'ba6e3bb0215b631f473dd97cd3de08b2', 'guru');

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_ankterapi`
--

CREATE TABLE `t_ankterapi` (
  `id` int(20) NOT NULL,
  `id_anak` int(255) NOT NULL,
  `nama_lengkap` varchar(255) DEFAULT NULL,
  `nama_panggilan` varchar(255) DEFAULT NULL,
  `tempat_lahir` varchar(255) DEFAULT NULL,
  `jenis_kelamin` varchar(255) DEFAULT NULL,
  `agama` varchar(255) DEFAULT NULL,
  `alamat` varchar(255) DEFAULT NULL,
  `usia` int(2) NOT NULL,
  `pernah_periksa` varchar(255) DEFAULT NULL,
  `diagnosa_dokter` varchar(255) DEFAULT NULL,
  `diagnosa_yayasan` varchar(255) DEFAULT NULL,
  `nama_ayah` varchar(255) DEFAULT NULL,
  `nama_ibu` varchar(255) DEFAULT NULL,
  `telp1` varchar(255) DEFAULT NULL,
  `telp2` varchar(255) DEFAULT NULL,
  `hari_terapi` varchar(255) DEFAULT NULL,
  `jenis_terapi` varchar(255) DEFAULT NULL,
  `on_created` varchar(255) DEFAULT NULL,
  `password` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `t_ankterapi`
--

INSERT INTO `t_ankterapi` (`id`, `id_anak`, `nama_lengkap`, `nama_panggilan`, `tempat_lahir`, `jenis_kelamin`, `agama`, `alamat`, `usia`, `pernah_periksa`, `diagnosa_dokter`, `diagnosa_yayasan`, `nama_ayah`, `nama_ibu`, `telp1`, `telp2`, `hari_terapi`, `jenis_terapi`, `on_created`, `password`) VALUES
(26, 13, 'sunarti', 'sunarti', 'JAMBI', 'perempuan', 'islam', 'JAMBI', 5, '--', '--', '--', '--', '--', '0898', '07878', 'senin', 'BIASA', NULL, '1755383ab7ef5760b29c579d0e9c8677'),
(27, 11, 'ADE', 'ADE', 'JAMBI', 'laki-laki', 'islam', 'JAMBI', 5, '--', '--', '--', '--', '--', '--', '---', 'senin', '--', NULL, '8418cad2dcc02c5131a160caf4d8a229');

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_terapis`
--

CREATE TABLE `t_terapis` (
  `id_terapis` int(20) NOT NULL,
  `id_user` varchar(20) DEFAULT NULL,
  `nama_lengkap` text DEFAULT NULL,
  `tanggal_lahir` date DEFAULT NULL,
  `jenis_kelamin` varchar(30) DEFAULT NULL,
  `agama` text DEFAULT NULL,
  `no_telp` int(12) DEFAULT NULL,
  `tempat_lahir` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `t_terapis`
--

INSERT INTO `t_terapis` (`id_terapis`, `id_user`, `nama_lengkap`, `tanggal_lahir`, `jenis_kelamin`, `agama`, `no_telp`, `tempat_lahir`) VALUES
(4, NULL, 'Andri Firman Saputra', '0000-00-00', 'Laki-laki', 'Islam', 3736647, NULL),
(5, NULL, 'Andri Firman Saputra', '0000-00-00', 'Laki-laki', 'Islam', 546456, NULL),
(6, NULL, 'JOHN', '0000-00-00', 'Perempuan', 'Budha', 2147483647, NULL),
(7, NULL, 'Fitri', '2021-06-09', 'Perempuan', 'Islam', 82663, NULL);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `jw_terapis`
--
ALTER TABLE `jw_terapis`
  ADD PRIMARY KEY (`id_jadwal`);

--
-- Indeks untuk tabel `tabel_izin`
--
ALTER TABLE `tabel_izin`
  ADD PRIMARY KEY (`id_izn`);

--
-- Indeks untuk tabel `tabel_pengganti`
--
ALTER TABLE `tabel_pengganti`
  ADD PRIMARY KEY (`id_pengganti`);

--
-- Indeks untuk tabel `t_admin`
--
ALTER TABLE `t_admin`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `t_ankterapi`
--
ALTER TABLE `t_ankterapi`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `t_terapis`
--
ALTER TABLE `t_terapis`
  ADD PRIMARY KEY (`id_terapis`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `jw_terapis`
--
ALTER TABLE `jw_terapis`
  MODIFY `id_jadwal` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT untuk tabel `tabel_izin`
--
ALTER TABLE `tabel_izin`
  MODIFY `id_izn` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT untuk tabel `tabel_pengganti`
--
ALTER TABLE `tabel_pengganti`
  MODIFY `id_pengganti` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `t_admin`
--
ALTER TABLE `t_admin`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT untuk tabel `t_ankterapi`
--
ALTER TABLE `t_ankterapi`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT untuk tabel `t_terapis`
--
ALTER TABLE `t_terapis`
  MODIFY `id_terapis` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
