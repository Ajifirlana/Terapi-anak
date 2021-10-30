-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 29 Okt 2021 pada 17.38
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
  `jenis_terapi` text NOT NULL,
  `waktu_diubah` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `jw_terapis`
--

INSERT INTO `jw_terapis` (`id_jadwal`, `id_anak`, `jam_mulai`, `jam_selesai`, `hari`, `jenis_terapi`, `waktu_diubah`) VALUES
(4, 1, 7, 8, 'kamis', 'Otak selasa', ''),
(5, 2, 6, 10, 'senin', 'Terapi Otak', ''),
(6, 2, 7, 10, 'rabu', 'kesehatan mental', ''),
(7, 1, 9, 10, 'selasa', 'Terapi Normal', ''),
(8, 1, 10, 12, 'jumat', 'TERAPI JUMAT', ''),
(9, 3, 8, 8, 'senin', 'tst', ''),
(11, 2, 7, 10, 'sabtu', 'testt', ''),
(12, 1, 4, 3, 'minggu', 'MINGGU', ''),
(30, 3, 8, 12, 'selasa', 'terapi enak', ''),
(31, 6, 12, 1, 'senin', 'KESEHATAN', '');

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

--
-- Dumping data untuk tabel `tabel_izin`
--

INSERT INTO `tabel_izin` (`id_izn`, `id_anak`, `tanggal_mulai`, `keterangan`, `tanggal_pengajuan`, `status`) VALUES
(2, 1, NULL, 'xx', '0000-00-00', 'xx'),
(4, 2, NULL, 'demam', '2021-10-10', 'demam berdarah'),
(6, 0, NULL, '', '0000-00-00', ''),
(9, 2, NULL, 'DEMAM MALARIA', '2021-10-29', 'DEMAM MALARIA'),
(10, 2, NULL, 'SAKIT HATI', '2021-10-16', 'SAKIT HATI'),
(11, 3, NULL, 'PIKNIK', '2021-10-29', 'PIKNIK'),
(12, 3, NULL, 'LIBURAN', '2021-10-14', 'LIBURAN');

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
(2, 2, 'YULI', '266cae641b25321d46362d71eefd92bd', 'orang_tua'),
(3, 3, 'YULIANTO', '266cae641b25321d46362d71eefd92bd', 'orang_tua'),
(6, 6, 'TONI', 'cabd4391948f851812e6597d18f545ab', 'orang_tua'),
(9, 3, 'python', '23eeeb4347bdd26bfc6b7ee9a3b755dd', 'orang_tua');

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
(1, 1, 'RIZKY', 'BILLAR', 'Muara Bulian', 'laki-laki', NULL, NULL, 30, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(2, 2, 'ANGGUN SAFITRI', 'ANGGUN ', 'Muara', 'perempuan', NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(3, 3, 'AJI', 'AJI', 'AJI', 'laki-laki', NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'aab14837409986ded0e268be59323c2d'),
(4, 3, 'anktrapin', 'BILLAR', 'Muara', 'laki-laki', NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(5, 6, 'FIRLI', 'BAHURI', 'JAKARTA', 'laki-laki', NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '73acd9a5972130b75066c82595a1fae3');

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
  MODIFY `id_jadwal` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT untuk tabel `tabel_izin`
--
ALTER TABLE `tabel_izin`
  MODIFY `id_izn` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `tabel_pengganti`
--
ALTER TABLE `tabel_pengganti`
  MODIFY `id_pengganti` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `t_admin`
--
ALTER TABLE `t_admin`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `t_ankterapi`
--
ALTER TABLE `t_ankterapi`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `t_terapis`
--
ALTER TABLE `t_terapis`
  MODIFY `id_terapis` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
