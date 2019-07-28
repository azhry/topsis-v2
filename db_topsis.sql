-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 28 Jul 2019 pada 17.55
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
(3, 'spp_bulanan', 'Biaya SPP Bulanan', 'C3', 4, 'Cost', 'range', '[{\"label\":\"Sangat Murah\",\"max\":\"418000\",\"min\":\"185000\",\"value\":\"5\"},{\"label\":\"Murah\",\"max\":\"652000\",\"min\":\"419000\",\"value\":\"4\"},{\"label\":\"Cukup Murah\",\"max\":\"886000\",\"min\":\"653000\",\"value\":\"3\"},{\"label\":\"Mahal\",\"max\":\"1120000\",\"min\":\"887000\",\"value\":\"2\"},{\"label\":\"Sangat Mahal\",\"max\":\"1354000\",\"min\":\"1121000\",\"value\":\"1\"}]', '2019-05-18 03:27:28', '2019-07-04 04:24:49'),
(4, 'fasilitas', 'Fasilitas', 'C4', 4, 'Benefit', 'option', '[{\"label\":\"Auditorium\",\"value\":\"5\"},{\"label\":\"Kolam Renang\",\"value\":\"5\"},{\"label\":\"Konsultasi Psikologi\",\"value\":\"5\"},{\"label\":\"Asuransi Kecelakaan\",\"value\":\"5\"},{\"label\":\"Wifi\",\"value\":\"4\"},{\"label\":\"CCTV\",\"value\":\"4\"},{\"label\":\"Katering\",\"value\":\"4\"},{\"label\":\"Antar Jemput Anak\",\"value\":\"4\"},{\"label\":\"Pelayanan Kesehatan\",\"value\":\"4\"},{\"label\":\"Lab. Komputer\",\"value\":\"3\"},{\"label\":\"Lab. Sains\",\"value\":\"3\"},{\"label\":\"Lab. Multimedia\",\"value\":\"3\"},{\"label\":\"Lab. Matematika\",\"value\":\"3\"},{\"label\":\"Ruang Kelas Ber-AC\",\"value\":\"3\"},{\"label\":\"Halaman Parkir\",\"value\":\"2\"},{\"label\":\"Koperasi\",\"value\":\"2\"},{\"label\":\"Aula\",\"value\":\"2\"},{\"label\":\"Kantin\",\"value\":\"2\"},{\"label\":\"Mushola \\/ Masjid\",\"value\":\"1\"},{\"label\":\"UKS\",\"value\":\"1\"},{\"label\":\"Perpustakaan\",\"value\":\"1\"},{\"label\":\"Lap. Olahraga\",\"value\":\"1\"},{\"label\":\"Taman Bermain\",\"value\":\"1\"}]', '2019-05-18 03:30:28', '2019-07-28 15:28:52'),
(5, 'ekstrakurikuler', 'Ekstrakurikuler', 'C5', 3, 'Benefit', 'option', '[{\"label\":\"Robotic\",\"value\":\"5\"},{\"label\":\"Panahan\",\"value\":\"5\"},{\"label\":\"Marching Band\",\"value\":\"5\"},{\"label\":\"Berenang\",\"value\":\"5\"},{\"label\":\"Multimedia Club\",\"value\":\"5\"},{\"label\":\"Tenis Meja\",\"value\":\"5\"},{\"label\":\"Tilawah Qur`an\",\"value\":\"4\"},{\"label\":\"Da`i Cilik\",\"value\":\"4\"},{\"label\":\"Public Speaking Training\",\"value\":\"4\"},{\"label\":\"Melukis\",\"value\":\"4\"},{\"label\":\"Teater\",\"value\":\"4\"},{\"label\":\"Catur\",\"value\":\"4\"},{\"label\":\"Arabic Club\",\"value\":\"3\"},{\"label\":\"Tahfidz Al-Qur`an\",\"value\":\"3\"},{\"label\":\"Tahsin Al-Qur`an\",\"value\":\"3\"},{\"label\":\"Paskibra\",\"value\":\"3\"},{\"label\":\"Komputer\",\"value\":\"3\"},{\"label\":\"Grup Seni Islam\",\"value\":\"3\"},{\"label\":\"Taekwondo\",\"value\":\"2\"},{\"label\":\"Pencak Silat\",\"value\":\"2\"},{\"label\":\"Seni Musik\",\"value\":\"2\"},{\"label\":\"Futsal\",\"value\":\"2\"},{\"label\":\"PMR\",\"value\":\"2\"}]', '2019-05-18 03:33:46', '2019-07-28 15:28:53'),
(6, 'lokasi', 'Lokasi', 'C6', 5, 'Benefit', 'option', '[{\"label\":\"Di Tepi Jalan Raya\",\"value\":\"2\"},{\"label\":\"Daerah Perkantoran\",\"value\":\"1\"},{\"label\":\"Di Tepi Jalan Sedang\",\"value\":\"5\"},{\"label\":\"Daerah Usaha\",\"value\":\"3\"},{\"label\":\"Daerah Perkampungan\",\"value\":\"4\"}]', '2019-05-18 04:36:21', '2019-07-11 01:59:08'),
(8, 'halaman_parkir', 'Halaman Parkir', 'C7', 5, 'Benefit', 'option', '[{\"label\":\"Sangat Luas\",\"value\":\"5\"},{\"label\":\"Luas\",\"value\":\"4\"},{\"label\":\"Cukup Luas\",\"value\":\"3\"},{\"label\":\"Tidak Luas\",\"value\":\"2\"},{\"label\":\"Sangat Tidak Luas\",\"value\":\"1\"}]', '2019-07-27 15:27:36', '2019-07-27 15:27:36'),
(9, 'jarak', 'Jarak', 'C7', 4, 'Cost', 'range', '[{\"label\":\"Sangat Jauh\",\"max\":\"999999\",\"min\":\"10.1\",\"value\":\"1\"},{\"label\":\"Jauh\",\"max\":\"10\",\"min\":\"8.1\",\"value\":\"2\"},{\"label\":\"Cukup Jauh\",\"max\":\"8\",\"min\":\"4.1\",\"value\":\"3\"},{\"label\":\"Dekat\",\"max\":\"4\",\"min\":\"2.1\",\"value\":\"4\"},{\"label\":\"Sangat Dekat\",\"max\":\"2\",\"min\":\"0\",\"value\":\"5\"}]', '2019-06-29 01:45:24', '2019-07-28 08:56:53');

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
  `jenis_kelamin` enum('Laki-laki','Perempuan') NOT NULL DEFAULT 'Laki-laki',
  `email` varchar(255) NOT NULL,
  `alamat` text NOT NULL,
  `kontak` varchar(15) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pengguna`
--

INSERT INTO `pengguna` (`id`, `username`, `password`, `id_role`, `nama`, `jenis_kelamin`, `email`, `alamat`, `kontak`, `status`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'e10adc3949ba59abbe56e057f20f883e', 1, 'Admin', 'Perempuan', 'test@gmail.com', 'Komplek Bougenville KM. 7 Palembang', '081234265011', 0, '2019-05-18 12:41:52', '2019-05-24 23:03:19'),
(9, 'UlilAlbab', '2e3817293fc275dbee74bd71ce6eb056', 3, 'SDIT Ulil Albab', 'Perempuan', 'diniayu9896.dal@gmail.com', 'wqdq', '12346576', 0, '2019-06-30 03:53:27', '2019-06-30 03:53:27'),
(10, 'Alfurqon', '2e3817293fc275dbee74bd71ce6eb056', 3, 'Al - Furqon', 'Laki-laki', 'diniayu9896.dal@gmail.com', 'fwdyuwqgu', '345678', 0, '2019-06-30 12:59:52', '2019-06-30 12:59:52'),
(11, 'Azizah', '2e3817293fc275dbee74bd71ce6eb056', 3, 'Azizah', 'Perempuan', 'diniayu9896.dal@gmail.com', 'jskj', 'lala', 0, '2019-06-30 13:01:26', '2019-07-01 04:12:27'),
(12, 'Salsabila', '2e3817293fc275dbee74bd71ce6eb056', 3, 'SDIT Salsabila', 'Perempuan', 'lestaridiniayu98@gmail.com', 'hskudanskd', '112364', 0, '2019-07-01 04:04:02', '2019-07-01 04:04:02'),
(13, 'Tarbawi', '2e3817293fc275dbee74bd71ce6eb056', 3, 'SDIT Tarbawi', 'Laki-laki', 'lestaridiniayu98@gmail.com', 'hasikdlaks', '34567890', 0, '2019-07-01 04:09:35', '2019-07-01 04:09:35'),
(14, 'Mushab', '2e3817293fc275dbee74bd71ce6eb056', 3, 'SDIT Mushab Bin Umair', 'Laki-laki', 'lestaridiniayu98@gmail.com', 'gsjdhaksjsla', '23456789', 0, '2019-07-01 04:13:41', '2019-07-01 04:13:41'),
(16, 'BinaIlmi', '2e3817293fc275dbee74bd71ce6eb056', 3, 'SDIT Bina Ilmi', 'Laki-laki', 'diniayu9896.dal@gmail.com', 'hsadiaj', '345678', 0, '2019-07-01 04:15:56', '2019-07-01 04:15:56'),
(17, 'Izzuddin', '2e3817293fc275dbee74bd71ce6eb056', 3, 'SDIT Izzuddin', 'Laki-laki', 'diniayu9896.dal@gmail.com', 'sggdakj', '456789', 0, '2019-07-01 04:16:59', '2019-07-01 04:16:59'),
(18, 'InsanCendekiaMandiri', '2e3817293fc275dbee74bd71ce6eb056', 3, 'SDIT Insan Cendekia Mandiri', 'Perempuan', 'lestaridiniayu98@gmail.com', 'whdiqwj', '12325', 0, '2019-07-01 04:18:23', '2019-07-01 04:18:23'),
(19, 'Alhanan', '2e3817293fc275dbee74bd71ce6eb056', 3, 'SDIT Alhanan', 'Perempuan', 'diniayu9896.dal@gmail.com', 'fgahjsklak', '45678', 0, '2019-07-01 04:19:35', '2019-07-01 04:19:35'),
(20, 'NurulIman', '2e3817293fc275dbee74bd71ce6eb056', 3, 'SDIT Nurul Iman', 'Laki-laki', 'lestaridiniayu98@gmail.com', 'yuiasaijai', '1235465', 0, '2019-07-01 04:20:43', '2019-07-01 04:20:43'),
(22, 'Darussalam', '2e3817293fc275dbee74bd71ce6eb056', 3, 'SDIT Darussalam', 'Laki-laki', 'diniayu9896.dal@gmail.com', 'dhukwh', '23274', 0, '2019-07-01 04:25:10', '2019-07-01 04:25:10'),
(23, 'Arridho', '2e3817293fc275dbee74bd71ce6eb056', 3, 'SDIT Ar Ridho', 'Perempuan', 'diniayu9896.dal@gmail.com', 'hdiwj', '2739823', 0, '2019-07-01 04:26:06', '2019-07-01 04:26:06'),
(24, 'PermataHati', '2e3817293fc275dbee74bd71ce6eb056', 3, 'SDIT Permata Hati', 'Laki-laki', 'lestaridiniayu98@gmail.com', 'hgdjw', '73928', 0, '2019-07-01 04:27:23', '2019-07-15 07:09:41'),
(25, 'Primainsani', '2e3817293fc275dbee74bd71ce6eb056', 3, 'SDIT Prima Insani', 'Perempuan', 'diniayu9896.dal@gmail.com', 'jhdkad', '3278920', 0, '2019-07-01 04:28:21', '2019-07-01 04:28:21'),
(26, 'Fathona', '2e3817293fc275dbee74bd71ce6eb056', 3, 'SDIT Fathona', 'Laki-laki', 'diniayu9896.dal@gmail.com', 'adjhkaj', '5372839', 0, '2019-07-01 04:29:31', '2019-07-01 04:29:31'),
(27, 'Kamiliyah', '2e3817293fc275dbee74bd71ce6eb056', 3, 'SDIT Kamiliyah', 'Laki-laki', 'lestaridiniayu98@gmail.com', 'hdkasjd', '2142', 0, '2019-07-01 04:30:40', '2019-07-01 04:30:40'),
(28, 'MutiaraAzzam', '2e3817293fc275dbee74bd71ce6eb056', 3, 'SDIT Mutiara Azzam', 'Perempuan', 'diniayu9896.dal@gmail.com', 'jsksf', '357', 0, '2019-07-01 04:31:30', '2019-07-01 04:31:30'),
(29, 'Auladi', '2e3817293fc275dbee74bd71ce6eb056', 3, 'SDIT Auladi', 'Laki-laki', 'diniayu9896.dal@gmail.com', 'sahka', '62386', 0, '2019-07-06 12:53:02', '2019-07-06 12:53:02'),
(30, 'Harapanmulia', '2e3817293fc275dbee74bd71ce6eb056', 3, 'SDIT Harapan Mulia', 'Laki-laki', 'diniayu9896.dal@gmail.com', 'uhfkjsl', '36273890', 0, '2019-07-06 15:12:40', '2019-07-06 15:12:40'),
(31, 'dini', '2e3817293fc275dbee74bd71ce6eb056', 3, 'Dini Ayu Lestari', 'Perempuan', 'diniayu9896.dal@gmail.com', 'Lorong Sriraya 3', '09031181520005', 0, '2019-07-23 23:45:58', '2019-07-28 15:54:57');

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
(1, 'Admin', '2019-05-18 12:40:48', '2019-05-18 12:40:48'),
(3, 'Pihak Sekolah', '2019-06-28 06:03:10', '2019-06-28 06:03:10');

-- --------------------------------------------------------

--
-- Struktur dari tabel `sekolah`
--

CREATE TABLE `sekolah` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
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
  `jarak` int(11) NOT NULL DEFAULT '0',
  `halaman_parkir` enum('Sangat Luas','Luas','Cukup Luas','Tidak Luas','Sangat Tidak Luas') NOT NULL,
  `valid` tinyint(4) NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `sekolah`
--

INSERT INTO `sekolah` (`id`, `id_user`, `nama_sekolah`, `alamat`, `latitude`, `longitude`, `telepon`, `akreditasi`, `biaya_masuk`, `spp_bulanan`, `fasilitas`, `ekstrakurikuler`, `lokasi`, `jarak`, `halaman_parkir`, `valid`, `created_at`, `updated_at`) VALUES
(3, 14, 'SD IT Mushab bin Umair', 'Jl. KH. Wahid Hasyim Lr. Kedukan, Kel. 5 Ulu, Kec. SU I Palembang', -3.0017886, 104.7613063, '\"081366649499 & 085381421325\"', 'C', 7650000, 305000, '[\"Mushola \\/ Masjid\",\"UKS\",\"Lap. Olahraga\"]', '[\"Public Speaking Training\",\"Karate\",\"Arabic Club\",\"Tahfidz Al-Qur`an\",\"Tahsin Al-Qur`an\",\"Pramuka\",\"English Club\"]', '[\"Daerah Perkampungan\"]', 1, 'Sangat Luas', 1, '2019-05-24 23:38:57', '2019-07-04 04:31:06'),
(5, 10, 'SD IT Al – Furqon Palembang', 'Jl. R Sukamto, No. 1332 Palembang', -2.950954, 104.757, '\"0711824945\"', 'A', 19110000, 1075000, '[\"Auditorium\",\"Konsultasi Psikologi\",\"Antar Jemput Anak\",\"Lab. Komputer\",\"Mushola \\/ Masjid\",\"Perpustakaan\",\"Ruang Kelas Ber-AC\",\"Wifi\",\"Asuransi Kecelakaan\",\"CCTV\",\"Pelayanan Kesehatan\",\"Kantin\",\"UKS\",\"Lap. Olahraga\",\"Taman Bermain\"]', '[\"Robotic\",\"Panahan\",\"Tilawah Qur`an\",\"Melukis\",\"Mewarnai\",\"Seni Tari\",\"Karate\",\"Arabic Club\",\"Taekwondo\",\"Seni Musik\",\"Pramuka\",\"English Club\",\"Matematika\"]', '[\"Di Tepi Jalan Raya\",\"Daerah Perkantoran\",\"Daerah Usaha\"]', 9, 'Sangat Luas', 1, '2019-05-25 11:23:59', '2019-07-04 04:32:18'),
(6, 16, 'SD IT Bina Ilmi  (Cab. Lemabang)', 'Jl. RE. Martadinata No. 06, 2 Ilir Ilir Timur II Lemabang, Palembang', -2.96779, 104.7869, '\"0711719664 & 081271984855\"', 'A', 13000000, 665000, '[\"Katering\",\"Antar Jemput Anak\",\"Lab. Komputer\",\"Lab. Multimedia\",\"Mushola \\/ Masjid\",\"Perpustakaan\",\"Wifi\",\"Koperasi\",\"Kantin\",\"Taman Bermain\"]', '[\"Robotic\",\"Da`i Cilik\",\"Seni Tari\",\"Karate\",\"Tahfidz Al-Qur`an\",\"Futsal\"]', '[\"Di Tepi Jalan Raya\",\"Daerah Usaha\"]', 7, 'Sangat Luas', 1, '2019-05-25 14:52:11', '2019-07-04 04:31:50'),
(7, 17, 'SD IT Izzuddin Palembang', 'Jl. Demang Lebar Daun No.268 Palembang', -2.975566, 104.725571, '\"0711416984, 0711420411 & 0711442781\"', 'C', 18615000, 1350000, '[\"Katering\",\"Antar Jemput Anak\",\"Lab. Komputer\",\"Aula\",\"Mushola \\/ Masjid\",\"Perpustakaan\",\"Ruang Kelas Ber-AC\",\"Wifi\",\"Lab. Sains\",\"Kantin\",\"UKS\",\"Lap. Olahraga\"]', '[\"Komputer\",\"Grup Seni Islam\",\"Taekwondo\",\"Futsal\",\"Pramuka\",\"English Club\",\"Matematika\"]', '[\"Di Tepi Jalan Raya\",\"Daerah Perkantoran\",\"Daerah Usaha\"]', 5, 'Sangat Luas', 1, '2019-05-25 15:05:25', '2019-07-04 04:33:13'),
(8, 18, 'SD IT Insan Mandiri Cendekia Palembang', 'Jl. Dwikora I No.1648b, Sungai Pangeran, Ilir Timur. I, Palembang', -2.975881, 104.746525, '\"0711318677 & 082377224059\"', 'C', 15100000, 700000, '[\"Kolam Renang\",\"Mushola \\/ Masjid\",\"Ruang Kelas Ber-AC\",\"UKS\",\"Lap. Olahraga\",\"Taman Bermain\"]', '[\"Seni Tari\",\"Tahfidz Al-Qur`an\"]', '[\"Di Tepi Jalan Sedang\",\"Daerah Usaha\",\"Daerah Perkampungan\"]', 5, 'Sangat Luas', 1, '2019-05-25 15:08:45', '2019-07-04 04:33:37'),
(9, 13, 'SD IT Tarbawi Palembang', 'Jl. Musyawarah I RT. 61, Kel. Sialang, Kec. Sako Palembang', -2.926946, 104.778534, '\"085273292696 & 085267041097\"', 'C', 7650000, 375000, '[\"Halaman Parkir\",\"Perpustakaan\",\"Ruang Kelas Ber-AC\",\"Koperasi\",\"Lap. Olahraga\",\"Taman Bermain\"]', '[\"Karate\",\"Pramuka\"]', '[\"Daerah Perkampungan\"]', 3, 'Sangat Luas', 1, '2019-05-25 15:18:25', '2019-07-04 04:34:00'),
(10, 18, 'SD IT Alhanan Palembang', 'Jl. Perindustrian 2 No. 97 RT.12 Kel. Kebun Bunga, Kec. Sukarami Palembang', -2.923345, 104.71832, '\"07115611587\"', 'B', 4100000, 250000, '[\"Lab. Komputer\",\"Mushola \\/ Masjid\",\"Perpustakaan\",\"Kantin\",\"UKS\",\"Lap. Olahraga\"]', '[\"Tahfidz Al-Qur`an\",\"Pramuka\"]', '[\"Di Tepi Jalan Sedang\",\"Daerah Usaha\"]', 8, 'Sangat Luas', 1, '2019-05-25 15:21:21', '2019-07-04 04:34:28'),
(11, 20, 'SD IT Nurul Iman Palembang', 'Jl. May. Sabara Kebun Semai Sekip Jaya Palembang', -2.9666, 104.758377, '\"0711312293\"', 'A', 500000, 300000, '[\"Aula\",\"Mushola \\/ Masjid\",\"Perpustakaan\",\"UKS\",\"Lap. Olahraga\",\"Taman Bermain\"]', '[\"Seni Tari\",\"Karate\",\"Grup Seni Islam\"]', '[\"Di Tepi Jalan Sedang\",\"Daerah Usaha\"]', 5, 'Sangat Luas', 1, '2019-05-25 15:23:21', '2019-07-04 04:34:47'),
(12, 11, 'SD IT Azizah Palembang', 'Jl. Tegal Binangun Lr. Karang Anyar 1, Kec. Plaju, Kelurahan Plaju Darat - Palembang', -3.020929, 104.805507, '\"08117110044\"', 'B', 8300000, 300000, '[\"Katering\",\"Lab. Komputer\",\"Halaman Parkir\",\"Mushola \\/ Masjid\",\"Perpustakaan\",\"UKS\",\"Lap. Olahraga\"]', '[\"Seni Tari\",\"Arabic Club\",\"Tahfidz Al-Qur`an\",\"Pencak Silat\",\"Futsal\",\"English Club\"]', '[\"Daerah Usaha\",\"Daerah Perkampungan\"]', 3, 'Sangat Luas', 1, '2019-05-25 15:28:33', '2019-07-04 04:35:14'),
(15, 22, 'SD IT Darussalam Palembang', 'Jl. Mayor Zen Lr. Cendana RT. 16 RW. 05 No. 89A Sei Selayur Kecamatan Kalidoni Palembang', -2.965518, 104.804371, '\"0711711600 & 0711721559\"', 'A', 4600000, 300000, '[\"Lab. Komputer\",\"Halaman Parkir\",\"Mushola \\/ Masjid\",\"Perpustakaan\",\"Pelayanan Kesehatan\",\"Kantin\",\"UKS\",\"Lap. Olahraga\"]', '[\"Marching Band\",\"Public Speaking Training\",\"Seni Tari\",\"Grup Seni Islam\"]', '[\"Daerah Perkampungan\"]', 4, 'Sangat Luas', 1, '2019-05-25 15:50:55', '2019-07-06 14:40:09'),
(19, 26, 'SD IT Fathona Palembang  (Cab. Lemabang)', 'Jl. Ratu Sianum, Ruko Blok A1-A2, Lemabang Kel. 3 Ilir, Kec. Ilir Timur II', -2.975788, 104.786855, '\"081379380135, 082176931900 & 083177301543\"', 'B', 14850000, 650000, '[\"Konsultasi Psikologi\",\"Katering\",\"Lab. Komputer\",\"Mushola \\/ Masjid\",\"Perpustakaan\",\"Ruang Kelas Ber-AC\",\"Lap. Olahraga\",\"Taman Bermain\"]', '[\"Berenang\",\"Karate\",\"Pramuka\"]', '[\"Di Tepi Jalan Sedang\",\"Daerah Usaha\"]', 5, 'Sangat Luas', 1, '2019-05-25 16:01:40', '2019-07-04 04:28:44'),
(20, 27, 'SD IT Kamiliyah Palembang', 'Jl. Ali Gatmir 282, Lr. Muara 10 Ilir, Kec. Ilir Timur III Palembang', -2.98349, 104.770011, '\"085832655662\"', 'B', 8050000, 350000, '[\"Mushola \\/ Masjid\",\"Perpustakaan\",\"Kantin\",\"UKS\",\"Lap. Olahraga\",\"Taman Bermain\"]', '[\"Berenang\",\"Komputer\",\"Pencak Silat\",\"Pramuka\"]', '[\"Daerah Usaha\",\"Daerah Perkampungan\"]', 4, 'Sangat Luas', 1, '2019-05-25 16:04:08', '2019-07-04 04:28:05'),
(21, 28, 'SD IT Mutiara Azzam Palembang', 'Jl. Baitullah No. 5A RT. 53 RW. 02, Kel. 8 Ilir, Kec. Ilir Timu Tiga Palembang', -2.938126, 104.766124, '\"0711819467\"', 'B', 13000000, 450000, '[\"Katering\",\"Antar Jemput Anak\",\"Lab. Komputer\",\"Mushola \\/ Masjid\",\"Perpustakaan\",\"Ruang Kelas Ber-AC\",\"Kantin\"]', '[\"Panahan\",\"Tenis Meja\",\"Tilawah Qur`an\",\"Da`i Cilik\",\"Seni Tari\",\"Taekwondo\",\"Pencak Silat\",\"Pramuka\"]', '[\"Daerah Perkampungan\"]', 5, 'Sangat Luas', 1, '2019-05-25 16:06:41', '2019-07-04 04:27:00'),
(23, 9, 'SD Ulil Albab Palembang', 'Jl. Sematang borang Lr. Lumban Meranti RT. 18 Sako Palembang', -2.922909, 104.784839, '\"0711714217\"', 'B', 7560000, 460000, '[\"Katering\",\"Antar Jemput Anak\",\"Halaman Parkir\",\"Mushola \\/ Masjid\",\"Perpustakaan\",\"Kantin\",\"UKS\"]', '[\"Panahan\",\"Berenang\",\"Karate\",\"Futsal\",\"English Club\"]', '[\"Daerah Perkampungan\"]', 4, 'Sangat Luas', 1, '2019-07-01 08:10:35', '2019-07-23 14:19:44'),
(24, 29, 'SD IT Auladi Palembang (Seberang Ulu II)', 'Jl. KH. Azhari No. 1A Kel. Tangga Takat SU II Palembang', -2.986679, 104.78633, '\"0711510978 & 0711510385\"', 'A', 15635000, 660000, '[\"Lab. Komputer\",\"Mushola \\/ Masjid\",\"Perpustakaan\",\"Ruang Kelas Ber-AC\",\"Wifi\",\"CCTV\",\"Lab. Sains\",\"Lab. Matematika\",\"Kantin\",\"UKS\"]', '[\"Robotic\",\"Marching Band\",\"Melukis\",\"Seni Tari\",\"Karate\",\"Science Club\"]', '[\"Di Tepi Jalan Sedang\",\"Daerah Usaha\",\"Daerah Perkampungan\"]', 6, 'Sangat Luas', 1, '2019-07-06 12:59:49', '2019-07-06 13:29:47'),
(25, 23, 'SD IT Ar Ridho Palembang', 'Jl. KH. A. Rozak (Patal-Pusri) Lr. Madiun No. 27 Palembang', -2.95349, 104.787201, '\"07115625470\"', 'B', 8500000, 375000, '[\"Lab. Komputer\",\"Mushola \\/ Masjid\",\"Pelayanan Kesehatan\",\"UKS\",\"Lap. Olahraga\",\"Taman Bermain\"]', '[\"Seni Tari\",\"Karate\",\"Catur\",\"Tahfidz Al-Qur`an\",\"English Club\"]', '[\"Di Tepi Jalan Raya\",\"Daerah Usaha\"]', 7, 'Sangat Luas', 1, '2019-07-06 13:34:59', '2019-07-06 13:37:22'),
(26, 24, 'SD IT Permata Hati Palembang', 'Jl. Mayor Zen, Lr. Mufakat No.39 RT. 01 RW.02 Kel. Sei Selincah, Kec. Kalidoni Palembang', -2.962799, 104.812454, '\"071130119 & 085377102173\"', 'B', 3400000, 185000, '[\"Halaman Parkir\",\"Mushola \\/ Masjid\",\"UKS\",\"Lap. Olahraga\"]', '[\"Seni Tari\",\"Tahfidz Al-Qur`an\",\"Tahsin Al-Qur`an\",\"Grup Seni Islam\",\"Pencak Silat\",\"Pramuka\"]', '[\"Daerah Perkampungan\"]', 4, 'Sangat Luas', 1, '2019-07-06 13:50:36', '2019-07-06 13:54:41'),
(27, 12, 'SD IT Salsabila Palembang', 'Jl. DI. Panjaitan Lr. Daruruhama No. 88 RT. 13 RW.22, Kel. Plaju Ulu, Kec. Plaju Palembang', -3.003567, 104.808742, '\"081272616664\"', 'B', 6000000, 450000, '[\"Lab. Komputer\",\"Halaman Parkir\",\"Mushola \\/ Masjid\",\"Perpustakaan\",\"Lab. Sains\",\"Koperasi\",\"Kantin\",\"UKS\",\"Lap. Olahraga\",\"Taman Bermain\"]', '[\"Panahan\",\"Multimedia Club\",\"Teater\",\"Seni Tari\",\"Karate\",\"Paskibra\",\"Pencak Silat\",\"Seni Musik\",\"PMR\",\"Pramuka\"]', '[\"Daerah Perkampungan\"]', 2, 'Sangat Luas', 1, '2019-07-06 14:11:40', '2019-07-06 14:33:58'),
(29, 30, 'SD IT Harapan Mulia Palembang', 'Jl. Dr. Wahidin No. 4 Talang Semut, Palembang', -2.988797, 104.748235, '\"0711318688\"', 'A', 17600000, 800000, '[\"Katering\",\"Antar Jemput Anak\",\"Lab. Komputer\",\"Lab. Multimedia\",\"Halaman Parkir\",\"Aula\",\"Mushola \\/ Masjid\",\"Perpustakaan\",\"Ruang Kelas Ber-AC\",\"CCTV\",\"Lab. Sains\",\"Kantin\",\"UKS\",\"Lap. Olahraga\"]', '[\"Robotic\",\"Teater\",\"Seni Tari\",\"Karate\",\"Science Club\",\"Arabic Club\",\"Tahfidz Al-Qur`an\",\"Komputer\",\"Taekwondo\",\"Seni Musik\",\"Futsal\",\"Matematika\"]', '[\"Daerah Perkantoran\",\"Di Tepi Jalan Sedang\",\"Daerah Usaha\"]', 7, 'Sangat Luas', 1, '2019-07-06 15:18:44', '2019-07-06 15:19:23'),
(30, 25, 'SD IT Prima Insani Palembang', 'Jl. Sapta Marga, Komp. Griya Sapta Permai No. 1 Kenten Kalidoni Palembang', -2.94091, 104.772258, '\"081379380135, 082176931900 & 083177301543\"', 'B', 9650000, 450000, '[\"Kolam Renang\",\"Antar Jemput Anak\",\"Lab. Komputer\",\"Halaman Parkir\",\"Mushola \\/ Masjid\",\"Perpustakaan\",\"Ruang Kelas Ber-AC\",\"Pelayanan Kesehatan\",\"Lap. Olahraga\",\"Taman Bermain\"]', '[\"Marching Band\",\"Melukis\",\"Seni Tari\",\"Karate\",\"Tahfidz Al-Qur`an\",\"Tahsin Al-Qur`an\"]', '[\"Di Tepi Jalan Sedang\",\"Daerah Usaha\",\"Daerah Perkampungan\"]', 5, 'Sangat Luas', 1, '2019-07-11 02:19:24', '2019-07-15 07:50:16');

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
  ADD KEY `id_role` (`id_role`),
  ADD KEY `id` (`id`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sekolah`
--
ALTER TABLE `sekolah`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`),
  ADD KEY `id_user` (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `kriteria`
--
ALTER TABLE `kriteria`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `pengguna`
--
ALTER TABLE `pengguna`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `sekolah`
--
ALTER TABLE `sekolah`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `pengguna`
--
ALTER TABLE `pengguna`
  ADD CONSTRAINT `pengguna_ibfk_1` FOREIGN KEY (`id_role`) REFERENCES `role` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `sekolah`
--
ALTER TABLE `sekolah`
  ADD CONSTRAINT `sekolah_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `pengguna` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
