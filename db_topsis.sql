-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 18 Mei 2019 pada 14.53
-- Versi Server: 10.1.28-MariaDB
-- PHP Version: 7.1.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_topsis`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `kriteria`
--

CREATE TABLE `kriteria` (
  `id` int(11) NOT NULL,
  `key` varchar(100) NOT NULL,
  `kriteria` varchar(255) NOT NULL,
  `inisial` varchar(10) NOT NULL,
  `bobot` int(11) NOT NULL,
  `exp` enum('Benefit','Cost') NOT NULL,
  `type` varchar(255) NOT NULL,
  `details` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kriteria`
--

INSERT INTO `kriteria` (`id`, `key`, `kriteria`, `inisial`, `bobot`, `exp`, `type`, `details`, `created_at`, `updated_at`) VALUES
(1, 'akreditasi', 'Akreditasi', 'C1', 5, 'Benefit', 'option', '[{\"label\":\"A\",\"value\":\"5\"},{\"label\":\"B\",\"value\":\"4\"},{\"label\":\"C\",\"value\":\"3\"},{\"label\":\"Belum Terakreditasi\",\"value\":\"1\"}]', '2019-05-18 03:05:01', '2019-05-18 03:05:01'),
(2, 'biaya_masuk', 'Biaya Masuk', 'C2', 4, 'Cost', 'range', '[{\"label\":\"Sangat Murah\",\"max\":\"4222000\",\"min\":\"500000\",\"value\":\"5\"},{\"label\":\"Murah\",\"max\":\"7945000\",\"min\":\"4223000\",\"value\":\"4\"},{\"label\":\"Cukup Murah\",\"max\":\"11668000\",\"min\":\"7946000\",\"value\":\"3\"},{\"label\":\"Mahal\",\"max\":\"15391000\",\"min\":\"11669000\",\"value\":\"2\"},{\"label\":\"Sangat Mahal\",\"max\":\"19114000\",\"min\":\"15392000\",\"value\":\"1\"}]', '2019-05-18 03:09:12', '2019-05-18 03:09:12'),
(3, 'spp_bulanan', 'Biaya SPP Bulanan', 'C3', 5, 'Cost', 'range', '[{\"label\":\"Sangat Murah\",\"max\":\"418000\",\"min\":\"185000\",\"value\":\"5\"},{\"label\":\"Murah\",\"max\":\"652000\",\"min\":\"419000\",\"value\":\"4\"},{\"label\":\"Cukup Murah\",\"max\":\"886000\",\"min\":\"653000\",\"value\":\"3\"},{\"label\":\"Mahal\",\"max\":\"1120000\",\"min\":\"887000\",\"value\":\"2\"},{\"label\":\"Sangat Mahal\",\"max\":\"1354000\",\"min\":\"1121000\",\"value\":\"1\"}]', '2019-05-18 03:27:28', '2019-05-18 11:41:52'),
(4, 'fasilitas', 'Fasilitas', 'C4', 4, 'Benefit', 'option', '[{\"label\":\"Auditorium\",\"value\":\"5\"},{\"label\":\"Kolam Renang\",\"value\":\"5\"},{\"label\":\"Konsultasi Psikologi\",\"value\":\"5\"},{\"label\":\"Asuransi Kecelakaan\",\"value\":\"5\"},{\"label\":\"Wifi\",\"value\":\"4\"},{\"label\":\"CCTV\",\"value\":\"4\"},{\"label\":\"Katering\",\"value\":\"4\"},{\"label\":\"Antar Jemput Anak\",\"value\":\"4\"},{\"label\":\"Pelayanan Kesehatan\",\"value\":\"4\"},{\"label\":\"Lab. Komputer\",\"value\":\"3\"},{\"label\":\"Lab. Sains\",\"value\":\"3\"},{\"label\":\"Lab. Multimedia\",\"value\":\"3\"},{\"label\":\"Lab. Matematika\",\"value\":\"3\"},{\"label\":\"Ruang Kelas Ber-AC\",\"value\":\"3\"},{\"label\":\"Halaman Parkir\",\"value\":\"2\"},{\"label\":\"Koperasi\",\"value\":\"2\"},{\"label\":\"Aula\",\"value\":\"2\"},{\"label\":\"Kantin\",\"value\":\"2\"},{\"label\":\"Mushola \\/ Masjid\",\"value\":\"1\"},{\"label\":\"UKS\",\"value\":\"1\"},{\"label\":\"Perpustakaan\",\"value\":\"1\"},{\"label\":\"Lap. Olahraga\",\"value\":\"1\"},{\"label\":\"Taman Bermain\",\"value\":\"1\"}]', '2019-05-18 03:30:28', '2019-05-18 03:30:28'),
(5, 'ekstrakurikuler', 'Ekstrakurikuler', 'C5', 3, 'Benefit', 'option', '[{\"label\":\"Robotic\",\"value\":\"5\"},{\"label\":\"Panahan\",\"value\":\"5\"},{\"label\":\"Marching Band\",\"value\":\"5\"},{\"label\":\"Berenang\",\"value\":\"5\"},{\"label\":\"Multimedia Club\",\"value\":\"5\"},{\"label\":\"Tenis Meja\",\"value\":\"5\"},{\"label\":\"Tilawah Qur`an\",\"value\":\"4\"},{\"label\":\"Da`i Cilik\",\"value\":\"4\"},{\"label\":\"Public Speaking Training\",\"value\":\"4\"},{\"label\":\"Melukis\",\"value\":\"4\"},{\"label\":\"Teater\",\"value\":\"4\"},{\"label\":\"Catur\",\"value\":\"4\"},{\"label\":\"Arabic Club\",\"value\":\"3\"},{\"label\":\"Tahfidz Al-Qur`an\",\"value\":\"3\"},{\"label\":\"Tahsin Al-Qur`an\",\"value\":\"3\"},{\"label\":\"Paskibra\",\"value\":\"3\"},{\"label\":\"Komputer\",\"value\":\"3\"},{\"label\":\"Grup Seni Islam\",\"value\":\"3\"},{\"label\":\"Taekwondo\",\"value\":\"2\"},{\"label\":\"Pencak Silat\",\"value\":\"2\"},{\"label\":\"Seni Musik\",\"value\":\"2\"},{\"label\":\"Futsal\",\"value\":\"2\"},{\"label\":\"PMR\",\"value\":\"2\"}]', '2019-05-18 03:33:46', '2019-05-18 03:33:46'),
(6, 'lokasi', 'Lokasi', 'C6', 5, 'Benefit', 'option', '[{\"label\":\"Di Tepi Jalan Raya\",\"value\":\"5\"},{\"label\":\"Daerah Perkantoran\",\"value\":\"4\"},{\"label\":\"Di Tepi Jalan Sedang\",\"value\":\"3\"},{\"label\":\"Daerah Usaha\",\"value\":\"2\"},{\"label\":\"Daerah Perkampungan\",\"value\":\"1\"}]', '2019-05-18 04:36:21', '2019-05-18 04:36:21');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengguna`
--

CREATE TABLE `pengguna` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` char(32) NOT NULL,
  `id_role` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `alamat` text NOT NULL,
  `kontak` varchar(15) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pengguna`
--

INSERT INTO `pengguna` (`id`, `username`, `password`, `id_role`, `nama`, `email`, `alamat`, `kontak`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'e10adc3949ba59abbe56e057f20f883e', 1, 'Admin', 'admin@gmail.com', '-', '-', '2019-05-18 12:41:52', '2019-05-18 12:41:52');

-- --------------------------------------------------------

--
-- Struktur dari tabel `role`
--

CREATE TABLE `role` (
  `id` int(11) NOT NULL,
  `role` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `role`
--

INSERT INTO `role` (`id`, `role`, `created_at`, `updated_at`) VALUES
(1, 'Admin', '2019-05-18 12:40:48', '2019-05-18 12:40:48');

-- --------------------------------------------------------

--
-- Struktur dari tabel `sekolah`
--

CREATE TABLE `sekolah` (
  `id` int(11) NOT NULL,
  `nama_sekolah` text NOT NULL,
  `alamat` text NOT NULL,
  `latitude` double NOT NULL,
  `longitude` double NOT NULL,
  `telepon` text NOT NULL,
  `akreditasi` varchar(5) NOT NULL,
  `biaya_masuk` int(11) NOT NULL,
  `spp_bulanan` int(11) NOT NULL,
  `fasilitas` text NOT NULL,
  `ekstrakurikuler` text NOT NULL,
  `lokasi` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `sekolah`
--

INSERT INTO `sekolah` (`id`, `nama_sekolah`, `alamat`, `latitude`, `longitude`, `telepon`, `akreditasi`, `biaya_masuk`, `spp_bulanan`, `fasilitas`, `ekstrakurikuler`, `lokasi`, `created_at`, `updated_at`) VALUES
(1, 'SD IT Mushab bin Umair', 'Jl. KH. Wahid Hasyim Lr. Kedukan, Kel. 5 Ulu, Kec. SU I Palembang', -2.995048253248413, 104.6933458618164, '\"081234265011\"', 'C', 7650000, 305000, '[\"Mushola \\/ Masjid\",\"UKS\",\"Lap. Olahraga\"]', '[\"Public Speaking\",\"Karate\",\"Arabic Club\",\"Tahfidz Al-Qur`an\",\"Tahsin Al-Qur`an\",\"Pramuka\",\"English Club\"]', '[\"Daerah Perkampungan\"]', '2019-05-18 02:28:47', '2019-05-18 02:28:47'),
(2, 'SD IT Auldi Palembang', 'Jl. KH. Azhari No. 1A Kel. Tangga Takat SU II Palembang', -2.998476785815303, 104.80973227539062, '\"0711-510978\"', 'A', 15635000, 660000, '[\"Lab. Komputer\",\"Mushola \\/ Masjid\",\"Perpustakaan\",\"Wifi\",\"CCTV\",\"Lab. Sains\",\"Lab. Matematika\",\"Kantin\",\"UKS\",\"Ruang Kelas Ber-AC\"]', '[\"Robotic\",\"Marching Band\",\"Melukis\",\"Seni Tari\",\"Karate\"]', '[\"Di Tepi Jalan Sedang\",\"Daerah Usaha\",\"Daerah Perkampungan\"]', '2019-05-18 10:14:55', '2019-05-18 10:16:08');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `kriteria`
--
ALTER TABLE `kriteria`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pengguna`
--
ALTER TABLE `pengguna`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_role` (`id_role`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sekolah`
--
ALTER TABLE `sekolah`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `kriteria`
--
ALTER TABLE `kriteria`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `pengguna`
--
ALTER TABLE `pengguna`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `sekolah`
--
ALTER TABLE `sekolah`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `pengguna`
--
ALTER TABLE `pengguna`
  ADD CONSTRAINT `pengguna_ibfk_1` FOREIGN KEY (`id_role`) REFERENCES `role` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
