-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 13 Nov 2021 pada 12.11
-- Versi server: 10.4.8-MariaDB
-- Versi PHP: 7.2.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cobaapp`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengumuman`
--

CREATE TABLE `pengumuman` (
  `id_pengumuman` int(50) NOT NULL,
  `tanggal` date NOT NULL,
  `jam` time NOT NULL,
  `pengumuman` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pengumuman`
--

INSERT INTO `pengumuman` (`id_pengumuman`, `tanggal`, `jam`, `pengumuman`) VALUES
(6, '2021-11-12', '22:55:27', 'Selamat datang di AbsensiAPP, sebuah aplikasi berbasis web untuk memudahkan pekerjaan anda :)');

-- --------------------------------------------------------

--
-- Struktur dari tabel `positions`
--

CREATE TABLE `positions` (
  `id_positions` int(11) NOT NULL,
  `position_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `positions`
--

INSERT INTO `positions` (`id_positions`, `position_name`) VALUES
(1, 'XII IPS'),
(2, 'XII MIPA 2'),
(3, 'XII MIPA 1'),
(4, 'XI MIPA'),
(8, 'X MIPA');

-- --------------------------------------------------------

--
-- Struktur dari tabel `presents`
--

CREATE TABLE `presents` (
  `id_presents` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `time_pulang` time DEFAULT NULL,
  `information` char(1) NOT NULL,
  `status` int(1) NOT NULL,
  `keterangan` varchar(50) NOT NULL,
  `surat` varchar(50) NOT NULL,
  `latitude` varchar(25) NOT NULL,
  `longitude` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `presents`
--

INSERT INTO `presents` (`id_presents`, `user_id`, `date`, `time`, `time_pulang`, `information`, `status`, `keterangan`, `surat`, `latitude`, `longitude`) VALUES
(31, 6, '2021-10-30', '13:42:06', '14:27:19', 'M', 1, '', '', '-7.0051453', '110.4381254'),
(32, 6, '2021-10-31', '21:21:42', '21:21:49', 'M', 1, '', '', '-6.9861376', '110.4379904'),
(33, 2, '2021-10-31', '21:38:52', '21:39:32', 'M', 1, '', '', '-6.9861376', '110.4379904'),
(34, 12, '2021-10-31', '21:57:29', '22:04:14', 'M', 1, '', '', '-6.9861376', '110.4379904'),
(35, 6, '2021-11-01', '10:30:41', NULL, 'M', 1, '', '', '-6.9825169', '110.4520238'),
(36, 6, '2021-11-02', '22:32:47', NULL, 'M', 1, '', '', '-7.0051453', '110.4381254'),
(37, 13, '2021-11-02', '23:37:11', NULL, 'M', 1, '', '', '-7.0051453', '110.4381254'),
(38, 14, '2021-11-02', '23:39:28', NULL, 'M', 1, '', '', '-6.9861376', '110.4379904'),
(39, 151, '2021-11-05', '18:23:43', '18:23:58', 'M', 1, '', '', '-7.0051453', '110.4381254'),
(40, 149, '2021-11-05', '18:34:12', '19:50:44', 'S', 2, 'sakit', 'coba.pdf', '-7.0051453', '110.4381254'),
(41, 3, '2021-11-05', '19:47:27', NULL, 'M', 2, '', '', '-7.0051453', '110.4381254'),
(42, 13, '2021-11-05', '19:59:18', '20:01:21', 'M', 1, '', '', '-7.0051453', '110.4381254'),
(43, 12, '2021-11-06', '11:04:50', NULL, 'M', 1, '', '', '-7.0051453', '110.4381254'),
(44, 3, '2021-11-09', '18:01:37', NULL, 'M', 1, '', '', '-7.0051453', '110.4381254'),
(45, 149, '2021-11-09', '19:18:40', NULL, 'S', 2, 'Sakit', 'SURAT_PENUNJUKAN_PEMBIMBING-G_111_18_0014.pdf', '-7.0051453', '110.4381254'),
(46, 6, '2021-11-09', '20:11:10', '20:14:50', 'M', 1, '', '', '-7.0051453', '110.4381254'),
(47, 47, '2021-11-10', '15:47:12', '15:47:26', 'M', 1, '', '', '-7.0051453', '110.4381254'),
(48, 6, '2021-11-11', '12:14:51', '12:15:09', 'M', 1, '', '', '-7.0051453', '110.4381254'),
(49, 12, '2021-11-11', '19:08:21', NULL, 'S', 1, 'sakit', 'bukti_bayar.pdf', '-7.0051453', '110.4381254');

-- --------------------------------------------------------

--
-- Struktur dari tabel `time`
--

CREATE TABLE `time` (
  `id_time` int(1) NOT NULL,
  `start` varchar(50) NOT NULL,
  `finish` varchar(50) NOT NULL,
  `keterangan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `time`
--

INSERT INTO `time` (`id_time`, `start`, `finish`, `keterangan`) VALUES
(1, '06:00', '07:40', 'Masuk'),
(2, '14:00', '16:00', 'Pulang');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id_users` int(50) NOT NULL,
  `nisn` char(20) NOT NULL,
  `username` varchar(200) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `gender` char(1) NOT NULL,
  `photo` varchar(200) NOT NULL,
  `role_id` int(50) NOT NULL,
  `position_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id_users`, `nisn`, `username`, `email`, `password`, `alamat`, `gender`, `photo`, `role_id`, `position_id`) VALUES
(1, '', 'Ahmad Mukmin Jamaludin', 'jcfirda@gmail.com', '$2y$10$Qjfox2wsInCd5wwb/..4kuTyiwZ7quWnKtZE1DrKcduslcIVm8v1G', 'pulodarat', 'L', 'f9049b635d598786c3aebcdd9bf75f04.jpg', 1, 0),
(6, '3454', 'Afsheena Farzana Putri', 'shena@gmail.com', '$2y$10$Fkve2eFSgGJ26ntE0h5cpeTuFh9gRZMSniyPuDuf1I2HttmRz2nGq', 'Pulodarat', 'P', 'adab212cca3da9ca4d6d5ec172f2ca62.png', 2, 3),
(12, '6364', 'Afwah Mumtazah', '6364@gmail.com', '$2y$10$88A1Vys1W4q7GfJJvacrY.J3BkkL/sWc9I.Bg1mzaXqK2ORDUM/OS', 'Pulodarat', 'P', '', 2, 1),
(13, '131233200002200001', 'Adinda Maulida', '131233200002200001@gmail.com', '$2y$10$88A1Vys1W4q7GfJJvacrY.J3BkkL/sWc9I.Bg1mzaXqK2ORDUM/OS', '', 'L', '', 2, 8),
(14, '131233200002200002', 'Alya Alawiyah', '131233200002200002@gmail.com', '$2y$10$88A1Vys1W4q7GfJJvacrY.J3BkkL/sWc9I.Bg1mzaXqK2ORDUM/OS', '', 'L', '', 2, 8),
(15, '131233200002200003', 'Ananda Maullana Aditya', '131233200002200003@gmail.com', '$2y$10$88A1Vys1W4q7GfJJvacrY.J3BkkL/sWc9I.Bg1mzaXqK2ORDUM/OS', '', 'L', '', 2, 8),
(16, '131233200002200004', 'Bayu Mufti Ramdhani', '131233200002200004@gmail.com', '$2y$10$88A1Vys1W4q7GfJJvacrY.J3BkkL/sWc9I.Bg1mzaXqK2ORDUM/OS', '', 'L', '', 2, 8),
(17, '131233200002200005', 'Bayu Setiaji', '131233200002200005@gmail.com', '$2y$10$88A1Vys1W4q7GfJJvacrY.J3BkkL/sWc9I.Bg1mzaXqK2ORDUM/OS', '', 'L', '', 2, 8),
(18, '131233200002200006', 'Desi Puji Rahayu', '131233200002200006@gmail.com', '$2y$10$88A1Vys1W4q7GfJJvacrY.J3BkkL/sWc9I.Bg1mzaXqK2ORDUM/OS', '', 'L', '', 2, 8),
(19, '131233200002200007', 'Faiz Nur Zaky', '131233200002200007@gmail.com', '$2y$10$88A1Vys1W4q7GfJJvacrY.J3BkkL/sWc9I.Bg1mzaXqK2ORDUM/OS', '', 'L', '', 2, 8),
(20, '131233200002200008', 'Falih Aulia Rahma', '131233200002200008@gmail.com', '$2y$10$88A1Vys1W4q7GfJJvacrY.J3BkkL/sWc9I.Bg1mzaXqK2ORDUM/OS', '', 'L', '', 2, 8),
(21, '131233200002200009', 'Firqotun Najiyah', '131233200002200009@gmail.com', '$2y$10$88A1Vys1W4q7GfJJvacrY.J3BkkL/sWc9I.Bg1mzaXqK2ORDUM/OS', '', 'L', '', 2, 8),
(22, '131233200002200010', 'Fita Mauliddiyah', '131233200002200010@gmail.com', '$2y$10$88A1Vys1W4q7GfJJvacrY.J3BkkL/sWc9I.Bg1mzaXqK2ORDUM/OS', '', 'L', '', 2, 8),
(23, '131233200002200011', 'Futukhur Rohmaniyah', '131233200002200011@gmail.com', '$2y$10$88A1Vys1W4q7GfJJvacrY.J3BkkL/sWc9I.Bg1mzaXqK2ORDUM/OS', '', 'L', '', 2, 8),
(24, '131233200002200012', 'Husna Annisa', '131233200002200012@gmail.com', '$2y$10$88A1Vys1W4q7GfJJvacrY.J3BkkL/sWc9I.Bg1mzaXqK2ORDUM/OS', '', 'L', '', 2, 8),
(25, '131233200002200013', 'Intan Nur Aini', '131233200002200013@gmail.com', '$2y$10$88A1Vys1W4q7GfJJvacrY.J3BkkL/sWc9I.Bg1mzaXqK2ORDUM/OS', '', 'L', '', 2, 8),
(26, '131233200002200014', 'Jumala Laikha', '131233200002200014@gmail.com', '$2y$10$88A1Vys1W4q7GfJJvacrY.J3BkkL/sWc9I.Bg1mzaXqK2ORDUM/OS', '', 'L', '', 2, 8),
(27, '131233200002200015', 'Kaisawafi', '131233200002200015@gmail.com', '$2y$10$88A1Vys1W4q7GfJJvacrY.J3BkkL/sWc9I.Bg1mzaXqK2ORDUM/OS', '', 'L', '', 2, 8),
(28, '131233200002200016', 'Lely Anjarwati', '131233200002200016@gmail.com', '$2y$10$88A1Vys1W4q7GfJJvacrY.J3BkkL/sWc9I.Bg1mzaXqK2ORDUM/OS', '', 'L', '', 2, 8),
(29, '131233200002200017', 'Lubbul Khayyi Alfauz', '131233200002200017@gmail.com', '$2y$10$88A1Vys1W4q7GfJJvacrY.J3BkkL/sWc9I.Bg1mzaXqK2ORDUM/OS', '', 'L', '', 2, 8),
(30, '131233200002200018', 'Luklu ul Jannah', '131233200002200018@gmail.com', '$2y$10$88A1Vys1W4q7GfJJvacrY.J3BkkL/sWc9I.Bg1mzaXqK2ORDUM/OS', '', 'L', '', 2, 8),
(31, '131233200002200019', 'M. Andre Maulana Syahputra', '131233200002200019@gmail.com', '$2y$10$88A1Vys1W4q7GfJJvacrY.J3BkkL/sWc9I.Bg1mzaXqK2ORDUM/OS', '', 'L', '', 2, 8),
(32, '131233200002200020', 'Muhammad Asymawi ', '131233200002200020@gmail.com', '$2y$10$88A1Vys1W4q7GfJJvacrY.J3BkkL/sWc9I.Bg1mzaXqK2ORDUM/OS', '', 'L', '', 2, 8),
(33, '131233200002200021', 'Muhammad Rif\'an Nasiruddin', '131233200002200021@gmail.com', '$2y$10$88A1Vys1W4q7GfJJvacrY.J3BkkL/sWc9I.Bg1mzaXqK2ORDUM/OS', '', 'L', '', 2, 8),
(34, '131233200002200022', 'Nailatul Ulfiyah', '131233200002200022@gmail.com', '$2y$10$88A1Vys1W4q7GfJJvacrY.J3BkkL/sWc9I.Bg1mzaXqK2ORDUM/OS', '', 'L', '', 2, 8),
(35, '131233200002200023', 'Nasril Maulana', '131233200002200023@gmail.com', '$2y$10$88A1Vys1W4q7GfJJvacrY.J3BkkL/sWc9I.Bg1mzaXqK2ORDUM/OS', '', 'L', '', 2, 8),
(36, '131233200002200024', 'Naufal Faiz', '131233200002200024@gmail.com', '$2y$10$88A1Vys1W4q7GfJJvacrY.J3BkkL/sWc9I.Bg1mzaXqK2ORDUM/OS', '', 'L', '', 2, 8),
(37, '131233200002200025', 'Nidaan Khofiyah', '131233200002200025@gmail.com', '$2y$10$88A1Vys1W4q7GfJJvacrY.J3BkkL/sWc9I.Bg1mzaXqK2ORDUM/OS', '', 'L', '', 2, 8),
(38, '131233200002200026', 'Nur Rohim', '131233200002200026@gmail.com', '$2y$10$88A1Vys1W4q7GfJJvacrY.J3BkkL/sWc9I.Bg1mzaXqK2ORDUM/OS', '', 'L', '', 2, 8),
(39, '131233200002200027', 'Qoniatul Ummah', '131233200002200027@gmail.com', '$2y$10$88A1Vys1W4q7GfJJvacrY.J3BkkL/sWc9I.Bg1mzaXqK2ORDUM/OS', '', 'L', '', 2, 8),
(40, '131233200002200028', 'Reza Meutia Agustina', '131233200002200028@gmail.com', '$2y$10$88A1Vys1W4q7GfJJvacrY.J3BkkL/sWc9I.Bg1mzaXqK2ORDUM/OS', '', 'L', '', 2, 8),
(41, '131233200002200029', 'Rif\'an Badrus Zaman', '131233200002200029@gmail.com', '$2y$10$88A1Vys1W4q7GfJJvacrY.J3BkkL/sWc9I.Bg1mzaXqK2ORDUM/OS', '', 'L', '', 2, 8),
(42, '131233200002200030', 'Rifkiatun Sabilla Moja Putri', '131233200002200030@gmail.com', '$2y$10$88A1Vys1W4q7GfJJvacrY.J3BkkL/sWc9I.Bg1mzaXqK2ORDUM/OS', '', 'L', '', 2, 8),
(43, '131233200002200031', 'Robi\'atul  Adawiyah', '131233200002200031@gmail.com', '$2y$10$88A1Vys1W4q7GfJJvacrY.J3BkkL/sWc9I.Bg1mzaXqK2ORDUM/OS', '', 'L', '', 2, 8),
(44, '131233200002200032', 'Tia Fajriyah Ananta', '131233200002200032@gmail.com', '$2y$10$88A1Vys1W4q7GfJJvacrY.J3BkkL/sWc9I.Bg1mzaXqK2ORDUM/OS', '', 'L', '', 2, 8),
(45, '131233200002200034', 'Najwan Fikri ', '131233200002200034@gmail.com', '$2y$10$88A1Vys1W4q7GfJJvacrY.J3BkkL/sWc9I.Bg1mzaXqK2ORDUM/OS', '', 'L', '', 2, 8),
(46, '131233200002200035', 'Azda Avin Najwa', '131233200002200035@gmail.com', '$2y$10$88A1Vys1W4q7GfJJvacrY.J3BkkL/sWc9I.Bg1mzaXqK2ORDUM/OS', '', 'L', '', 2, 8),
(47, '6428', 'Abdullah Al Faruq', '6428@gmail.com', '$2y$10$88A1Vys1W4q7GfJJvacrY.J3BkkL/sWc9I.Bg1mzaXqK2ORDUM/OS', '', 'L', '', 2, 4),
(48, '6434', 'Ade Ulyaningtiyas', '6434@gmail.com', '$2y$10$88A1Vys1W4q7GfJJvacrY.J3BkkL/sWc9I.Bg1mzaXqK2ORDUM/OS', '', 'L', '', 2, 4),
(49, '6395', 'Alfina Darajatul `Ula', '6395@gmail.com', '$2y$10$88A1Vys1W4q7GfJJvacrY.J3BkkL/sWc9I.Bg1mzaXqK2ORDUM/OS', '', 'L', '', 2, 4),
(50, '6396', 'Amelia Putri', '6396@gmail.com', '$2y$10$88A1Vys1W4q7GfJJvacrY.J3BkkL/sWc9I.Bg1mzaXqK2ORDUM/OS', '', 'L', '', 2, 4),
(51, '6397', 'Andika Lutfi Ubaidillah', '6397@gmail.com', '$2y$10$88A1Vys1W4q7GfJJvacrY.J3BkkL/sWc9I.Bg1mzaXqK2ORDUM/OS', '', 'L', '', 2, 4),
(52, '6398', 'Arum Munafi`ah', '6398@gmail.com', '$2y$10$88A1Vys1W4q7GfJJvacrY.J3BkkL/sWc9I.Bg1mzaXqK2ORDUM/OS', '', 'L', '', 2, 4),
(53, '6399', 'Devi Nur Aulia', '6399@gmail.com', '$2y$10$88A1Vys1W4q7GfJJvacrY.J3BkkL/sWc9I.Bg1mzaXqK2ORDUM/OS', '', 'L', '', 2, 4),
(54, '6400', 'Dimas Ahmad Rizky', '6400@gmail.com', '$2y$10$88A1Vys1W4q7GfJJvacrY.J3BkkL/sWc9I.Bg1mzaXqK2ORDUM/OS', '', 'L', '', 2, 4),
(55, '6401', 'Dimas Kurniawan Santoso', '6401@gmail.com', '$2y$10$88A1Vys1W4q7GfJJvacrY.J3BkkL/sWc9I.Bg1mzaXqK2ORDUM/OS', '', 'L', '', 2, 4),
(56, '6430', 'Ella Nor Wahidahtus Safitri', '6430@gmail.com', '$2y$10$88A1Vys1W4q7GfJJvacrY.J3BkkL/sWc9I.Bg1mzaXqK2ORDUM/OS', '', 'L', '', 2, 4),
(57, '6403', 'Fadia Farikhatul Muna', '6403@gmail.com', '$2y$10$88A1Vys1W4q7GfJJvacrY.J3BkkL/sWc9I.Bg1mzaXqK2ORDUM/OS', '', 'L', '', 2, 4),
(58, '6405', 'Habib Nihla Thohari', '6405@gmail.com', '$2y$10$88A1Vys1W4q7GfJJvacrY.J3BkkL/sWc9I.Bg1mzaXqK2ORDUM/OS', '', 'L', '', 2, 4),
(59, '6406', 'Ilham Sultan Alfatih', '6406@gmail.com', '$2y$10$88A1Vys1W4q7GfJJvacrY.J3BkkL/sWc9I.Bg1mzaXqK2ORDUM/OS', '', 'L', '', 2, 4),
(60, '6407', 'Indah Rohmawati', '6407@gmail.com', '$2y$10$88A1Vys1W4q7GfJJvacrY.J3BkkL/sWc9I.Bg1mzaXqK2ORDUM/OS', '', 'L', '', 2, 4),
(61, '6408', 'Iva Amalia Khumidallahul Azizah', '6408@gmail.com', '$2y$10$88A1Vys1W4q7GfJJvacrY.J3BkkL/sWc9I.Bg1mzaXqK2ORDUM/OS', '', 'L', '', 2, 4),
(62, '6409', 'Jauharotun Nafisah', '6409@gmail.com', '$2y$10$88A1Vys1W4q7GfJJvacrY.J3BkkL/sWc9I.Bg1mzaXqK2ORDUM/OS', '', 'L', '', 2, 4),
(63, '6433', 'Maula Tammin Khuluqi', '6433@gmail.com', '$2y$10$88A1Vys1W4q7GfJJvacrY.J3BkkL/sWc9I.Bg1mzaXqK2ORDUM/OS', '', 'L', '', 2, 4),
(64, '6410', 'Muhammad Faizzuddin Maulana', '6410@gmail.com', '$2y$10$88A1Vys1W4q7GfJJvacrY.J3BkkL/sWc9I.Bg1mzaXqK2ORDUM/OS', '', 'L', '', 2, 4),
(65, '6411', 'Muhammad Feri Hasan', '6411@gmail.com', '$2y$10$88A1Vys1W4q7GfJJvacrY.J3BkkL/sWc9I.Bg1mzaXqK2ORDUM/OS', '', 'L', '', 2, 4),
(66, '6412', 'Muhammad In`amul Muttaqin', '6412@gmail.com', '$2y$10$88A1Vys1W4q7GfJJvacrY.J3BkkL/sWc9I.Bg1mzaXqK2ORDUM/OS', '', 'L', '', 2, 4),
(67, '6414', 'Muhammad Ubaidillah ', '6414@gmail.com', '$2y$10$88A1Vys1W4q7GfJJvacrY.J3BkkL/sWc9I.Bg1mzaXqK2ORDUM/OS', '', 'L', '', 2, 4),
(68, '6415', 'Muhammad Zia`ur Rifqi', '6415@gmail.com', '$2y$10$88A1Vys1W4q7GfJJvacrY.J3BkkL/sWc9I.Bg1mzaXqK2ORDUM/OS', '', 'L', '', 2, 4),
(69, '6416', 'Najmatuz Zahiroh ', '6416@gmail.com', '$2y$10$88A1Vys1W4q7GfJJvacrY.J3BkkL/sWc9I.Bg1mzaXqK2ORDUM/OS', '', 'L', '', 2, 4),
(70, '6417', 'Naufal Misbahul Aflah', '6417@gmail.com', '$2y$10$88A1Vys1W4q7GfJJvacrY.J3BkkL/sWc9I.Bg1mzaXqK2ORDUM/OS', '', 'L', '', 2, 4),
(71, '6419', 'Rifda Faradisa', '6419@gmail.com', '$2y$10$88A1Vys1W4q7GfJJvacrY.J3BkkL/sWc9I.Bg1mzaXqK2ORDUM/OS', '', 'L', '', 2, 4),
(72, '6420', 'Riris Ananta', '6420@gmail.com', '$2y$10$88A1Vys1W4q7GfJJvacrY.J3BkkL/sWc9I.Bg1mzaXqK2ORDUM/OS', '', 'L', '', 2, 4),
(73, '6421', 'Sariyatul Inayah', '6421@gmail.com', '$2y$10$88A1Vys1W4q7GfJJvacrY.J3BkkL/sWc9I.Bg1mzaXqK2ORDUM/OS', '', 'L', '', 2, 4),
(74, '6422', 'Siti Sallyesiah Muntrika Sari', '6422@gmail.com', '$2y$10$88A1Vys1W4q7GfJJvacrY.J3BkkL/sWc9I.Bg1mzaXqK2ORDUM/OS', '', 'L', '', 2, 4),
(75, '6423', 'Sri Indayani ', '6423@gmail.com', '$2y$10$88A1Vys1W4q7GfJJvacrY.J3BkkL/sWc9I.Bg1mzaXqK2ORDUM/OS', '', 'L', '', 2, 4),
(76, '6424', 'Teny Nor Yani', '6424@gmail.com', '$2y$10$88A1Vys1W4q7GfJJvacrY.J3BkkL/sWc9I.Bg1mzaXqK2ORDUM/OS', '', 'L', '', 2, 4),
(77, '6425', 'Ulil Albab', '6425@gmail.com', '$2y$10$88A1Vys1W4q7GfJJvacrY.J3BkkL/sWc9I.Bg1mzaXqK2ORDUM/OS', '', 'L', '', 2, 4),
(78, '6426', 'Yuniardi Ramadhani', '6426@gmail.com', '$2y$10$88A1Vys1W4q7GfJJvacrY.J3BkkL/sWc9I.Bg1mzaXqK2ORDUM/OS', '', 'L', '', 2, 4),
(81, '6323', 'Binta Muayyadah', '6323@gmail.com', '$2y$10$88A1Vys1W4q7GfJJvacrY.J3BkkL/sWc9I.Bg1mzaXqK2ORDUM/OS', '', 'L', '', 2, 3),
(82, '6324', 'Binti Muayyidah', '6324@gmail.com', '$2y$10$88A1Vys1W4q7GfJJvacrY.J3BkkL/sWc9I.Bg1mzaXqK2ORDUM/OS', '', 'L', '', 2, 3),
(83, '6325', 'Fatimatuz Zahro\'', '6325@gmail.com', '$2y$10$88A1Vys1W4q7GfJJvacrY.J3BkkL/sWc9I.Bg1mzaXqK2ORDUM/OS', '', 'L', '', 2, 3),
(84, '6326', 'Laila Nurul Ahna Fayumi', '6326@gmail.com', '$2y$10$88A1Vys1W4q7GfJJvacrY.J3BkkL/sWc9I.Bg1mzaXqK2ORDUM/OS', '', 'L', '', 2, 3),
(85, '6330', 'Nabilla Choirinnida', '6330@gmail.com', '$2y$10$88A1Vys1W4q7GfJJvacrY.J3BkkL/sWc9I.Bg1mzaXqK2ORDUM/OS', '', 'L', '', 2, 3),
(86, '6331', 'Naili Sayyidatun Ni\'mah', '6331@gmail.com', '$2y$10$88A1Vys1W4q7GfJJvacrY.J3BkkL/sWc9I.Bg1mzaXqK2ORDUM/OS', '', 'L', '', 2, 3),
(87, '6333', 'Rizka Safitri', '6333@gmail.com', '$2y$10$88A1Vys1W4q7GfJJvacrY.J3BkkL/sWc9I.Bg1mzaXqK2ORDUM/OS', '', 'L', '', 2, 3),
(88, '6335', 'Silvy Nabila Putri', '6335@gmail.com', '$2y$10$88A1Vys1W4q7GfJJvacrY.J3BkkL/sWc9I.Bg1mzaXqK2ORDUM/OS', '', 'L', '', 2, 3),
(89, '6336', 'Siti Solikhah', '6336@gmail.com', '$2y$10$88A1Vys1W4q7GfJJvacrY.J3BkkL/sWc9I.Bg1mzaXqK2ORDUM/OS', '', 'L', '', 2, 3),
(90, '6337', 'Tazkiyah Shofir Ulfana', '6337@gmail.com', '$2y$10$88A1Vys1W4q7GfJJvacrY.J3BkkL/sWc9I.Bg1mzaXqK2ORDUM/OS', '', 'L', '', 2, 3),
(91, '6338', 'Ulviana Amelia Putri', '6338@gmail.com', '$2y$10$88A1Vys1W4q7GfJJvacrY.J3BkkL/sWc9I.Bg1mzaXqK2ORDUM/OS', '', 'L', '', 2, 3),
(92, '6339', 'Umdatun Fadlil', '6339@gmail.com', '$2y$10$88A1Vys1W4q7GfJJvacrY.J3BkkL/sWc9I.Bg1mzaXqK2ORDUM/OS', '', 'L', '', 2, 3),
(93, '6340', 'Umi A\'isyah', '6340@gmail.com', '$2y$10$88A1Vys1W4q7GfJJvacrY.J3BkkL/sWc9I.Bg1mzaXqK2ORDUM/OS', '', 'L', '', 2, 3),
(94, '6393', 'Wafiq Azizah', '6393@gmail.com', '$2y$10$88A1Vys1W4q7GfJJvacrY.J3BkkL/sWc9I.Bg1mzaXqK2ORDUM/OS', '', 'L', '', 2, 3),
(95, '6341', 'Zulia Rahma Khoirun Nisa\'', '6341@gmail.com', '$2y$10$88A1Vys1W4q7GfJJvacrY.J3BkkL/sWc9I.Bg1mzaXqK2ORDUM/OS', '', 'L', '', 2, 3),
(115, '6342', 'Ahmad Jauhari Bahtiar', '6342@gmail.com', '$2y$10$88A1Vys1W4q7GfJJvacrY.J3BkkL/sWc9I.Bg1mzaXqK2ORDUM/OS', '', 'L', '', 2, 2),
(116, '6343', 'Aliyatun Nikmah', '6343@gmail.com', '$2y$10$88A1Vys1W4q7GfJJvacrY.J3BkkL/sWc9I.Bg1mzaXqK2ORDUM/OS', '', 'L', '', 2, 2),
(117, '6344', 'Amanatul Imaniyyah', '6344@gmail.com', '$2y$10$88A1Vys1W4q7GfJJvacrY.J3BkkL/sWc9I.Bg1mzaXqK2ORDUM/OS', '', 'L', '', 2, 2),
(118, '6345', 'Angel Septiani', '6345@gmail.com', '$2y$10$88A1Vys1W4q7GfJJvacrY.J3BkkL/sWc9I.Bg1mzaXqK2ORDUM/OS', '', 'L', '', 2, 2),
(119, '6346', 'Aniq Maulana Ibrahim', '6346@gmail.com', '$2y$10$88A1Vys1W4q7GfJJvacrY.J3BkkL/sWc9I.Bg1mzaXqK2ORDUM/OS', '', 'L', '', 2, 2),
(120, '6347', 'Asma\' Nadiyatuz Zahroh', '6347@gmail.com', '$2y$10$88A1Vys1W4q7GfJJvacrY.J3BkkL/sWc9I.Bg1mzaXqK2ORDUM/OS', '', 'L', '', 2, 2),
(121, '6348', 'Ayuk Novi Lailiyah', '6348@gmail.com', '$2y$10$88A1Vys1W4q7GfJJvacrY.J3BkkL/sWc9I.Bg1mzaXqK2ORDUM/OS', '', 'L', '', 2, 2),
(122, '6349', 'Inna \'Aliyya', '6349@gmail.com', '$2y$10$88A1Vys1W4q7GfJJvacrY.J3BkkL/sWc9I.Bg1mzaXqK2ORDUM/OS', '', 'L', '', 2, 2),
(123, '6350', 'Laili Mufarrohah', '6350@gmail.com', '$2y$10$88A1Vys1W4q7GfJJvacrY.J3BkkL/sWc9I.Bg1mzaXqK2ORDUM/OS', '', 'L', '', 2, 2),
(124, '6327', 'M Barkah Sobah', '6327@gmail.com', '$2y$10$88A1Vys1W4q7GfJJvacrY.J3BkkL/sWc9I.Bg1mzaXqK2ORDUM/OS', '', 'L', '', 2, 2),
(125, '6351', 'M. Virgiawan', '6351@gmail.com', '$2y$10$88A1Vys1W4q7GfJJvacrY.J3BkkL/sWc9I.Bg1mzaXqK2ORDUM/OS', '', 'L', '', 2, 2),
(126, '6352', 'Maulidi Fina Aprilia Rossi', '6352@gmail.com', '$2y$10$88A1Vys1W4q7GfJJvacrY.J3BkkL/sWc9I.Bg1mzaXqK2ORDUM/OS', '', 'L', '', 2, 2),
(127, '6353', 'Muhammad Afham Ulumi', '6353@gmail.com', '$2y$10$88A1Vys1W4q7GfJJvacrY.J3BkkL/sWc9I.Bg1mzaXqK2ORDUM/OS', '', 'L', '', 2, 2),
(128, '6355', 'Muhammad Rofikan', '6355@gmail.com', '$2y$10$88A1Vys1W4q7GfJJvacrY.J3BkkL/sWc9I.Bg1mzaXqK2ORDUM/OS', '', 'L', '', 2, 2),
(129, '6356', 'Muhammad Zahrul Anam', '6356@gmail.com', '$2y$10$88A1Vys1W4q7GfJJvacrY.J3BkkL/sWc9I.Bg1mzaXqK2ORDUM/OS', '', 'L', '', 2, 2),
(130, '6357', 'Mujahidatul Millah', '6357@gmail.com', '$2y$10$88A1Vys1W4q7GfJJvacrY.J3BkkL/sWc9I.Bg1mzaXqK2ORDUM/OS', '', 'L', '', 2, 2),
(131, '6358', 'Nadia Riska Amalia', '6358@gmail.com', '$2y$10$88A1Vys1W4q7GfJJvacrY.J3BkkL/sWc9I.Bg1mzaXqK2ORDUM/OS', '', 'L', '', 2, 2),
(132, '6359', 'Nur Afuah Sofiana', '6359@gmail.com', '$2y$10$88A1Vys1W4q7GfJJvacrY.J3BkkL/sWc9I.Bg1mzaXqK2ORDUM/OS', '', 'L', '', 2, 2),
(133, '6360', 'Rihla Nahtadiya', '6360@gmail.com', '$2y$10$88A1Vys1W4q7GfJJvacrY.J3BkkL/sWc9I.Bg1mzaXqK2ORDUM/OS', '', 'L', '', 2, 2),
(134, '6361', 'Risalatul Rizqiyah', '6361@gmail.com', '$2y$10$88A1Vys1W4q7GfJJvacrY.J3BkkL/sWc9I.Bg1mzaXqK2ORDUM/OS', '', 'L', '', 2, 2),
(135, '6362', 'Savira Dian Safitri', '6362@gmail.com', '$2y$10$88A1Vys1W4q7GfJJvacrY.J3BkkL/sWc9I.Bg1mzaXqK2ORDUM/OS', '', 'L', '', 2, 2),
(136, '6363', 'Zidny Ilma Nafiah', '6363@gmail.com', '$2y$10$88A1Vys1W4q7GfJJvacrY.J3BkkL/sWc9I.Bg1mzaXqK2ORDUM/OS', '', 'L', '', 2, 2),
(149, '6365', 'Ah. Nadirun Ahwan', '6365@gmail.com', '$2y$10$88A1Vys1W4q7GfJJvacrY.J3BkkL/sWc9I.Bg1mzaXqK2ORDUM/OS', '', 'L', '', 2, 1),
(150, '6367', 'Ahmad Azhar Sholahudin Basyir', '6367@gmail.com', '$2y$10$88A1Vys1W4q7GfJJvacrY.J3BkkL/sWc9I.Bg1mzaXqK2ORDUM/OS', '', 'L', '', 2, 1),
(151, '6369', 'Arina Dwi Zunianti', '6369@gmail.com', '$2y$10$88A1Vys1W4q7GfJJvacrY.J3BkkL/sWc9I.Bg1mzaXqK2ORDUM/OS', 'Rengging', 'P', '', 2, 1),
(152, '6371', 'Faizatuz Zahroh', '6371@gmail.com', '$2y$10$88A1Vys1W4q7GfJJvacrY.J3BkkL/sWc9I.Bg1mzaXqK2ORDUM/OS', '', 'L', '', 2, 1),
(153, '6372', 'Faroh Khorika Ulya', '6372@gmail.com', '$2y$10$88A1Vys1W4q7GfJJvacrY.J3BkkL/sWc9I.Bg1mzaXqK2ORDUM/OS', '', 'L', '', 2, 1),
(154, '6373', 'Innayatun Naila Sari', '6373@gmail.com', '$2y$10$88A1Vys1W4q7GfJJvacrY.J3BkkL/sWc9I.Bg1mzaXqK2ORDUM/OS', '', 'L', '', 2, 1),
(155, '6375', 'Lailatul Badriyah', '6375@gmail.com', '$2y$10$88A1Vys1W4q7GfJJvacrY.J3BkkL/sWc9I.Bg1mzaXqK2ORDUM/OS', '', 'L', '', 2, 1),
(156, '6394', 'Muhammad Ibrahim', '6394@gmail.com', '$2y$10$88A1Vys1W4q7GfJJvacrY.J3BkkL/sWc9I.Bg1mzaXqK2ORDUM/OS', '', 'L', '', 2, 1),
(157, '6379', 'Muhammad Sholahuddin', '6379@gmail.com', '$2y$10$88A1Vys1W4q7GfJJvacrY.J3BkkL/sWc9I.Bg1mzaXqK2ORDUM/OS', '', 'L', '', 2, 1),
(158, '6427', 'Muhammad Taqiyuddin Najja', '6427@gmail.com', '$2y$10$88A1Vys1W4q7GfJJvacrY.J3BkkL/sWc9I.Bg1mzaXqK2ORDUM/OS', '', 'L', '', 2, 1),
(159, '6380', 'Muhimatul Ifadah', '6380@gmail.com', '$2y$10$88A1Vys1W4q7GfJJvacrY.J3BkkL/sWc9I.Bg1mzaXqK2ORDUM/OS', '', 'L', '', 2, 1),
(160, '6432', 'Muhmmad Ichdal Umam', '6432@gmail.com', '$2y$10$88A1Vys1W4q7GfJJvacrY.J3BkkL/sWc9I.Bg1mzaXqK2ORDUM/OS', '', 'L', '', 2, 1),
(161, '6381', 'Naina Zuny Salsabila', '6381@gmail.com', '$2y$10$88A1Vys1W4q7GfJJvacrY.J3BkkL/sWc9I.Bg1mzaXqK2ORDUM/OS', '', 'L', '', 2, 1),
(162, '6384', 'Paquitta Regita Cahyani', '6384@gmail.com', '$2y$10$88A1Vys1W4q7GfJJvacrY.J3BkkL/sWc9I.Bg1mzaXqK2ORDUM/OS', '', 'L', '', 2, 1),
(163, '6386', 'Siska Zulistyawati', '6386@gmail.com', '$2y$10$88A1Vys1W4q7GfJJvacrY.J3BkkL/sWc9I.Bg1mzaXqK2ORDUM/OS', '', 'L', '', 2, 1),
(164, '6387', 'Supriyanto', '6387@gmail.com', '$2y$10$88A1Vys1W4q7GfJJvacrY.J3BkkL/sWc9I.Bg1mzaXqK2ORDUM/OS', '', 'L', '', 2, 1),
(165, '6388', 'Wahyu Adi Saputra', '6388@gmail.com', '$2y$10$88A1Vys1W4q7GfJJvacrY.J3BkkL/sWc9I.Bg1mzaXqK2ORDUM/OS', '', 'L', '', 2, 1),
(166, '6389', 'Wahyu Nur Widianti', '6389@gmail.com', '$2y$10$88A1Vys1W4q7GfJJvacrY.J3BkkL/sWc9I.Bg1mzaXqK2ORDUM/OS', '', 'L', '', 2, 1),
(167, '6390', 'Zeni Nur Isnaini', '6390@gmail.com', '$2y$10$88A1Vys1W4q7GfJJvacrY.J3BkkL/sWc9I.Bg1mzaXqK2ORDUM/OS', '', 'L', '', 2, 1);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `pengumuman`
--
ALTER TABLE `pengumuman`
  ADD PRIMARY KEY (`id_pengumuman`);

--
-- Indeks untuk tabel `positions`
--
ALTER TABLE `positions`
  ADD PRIMARY KEY (`id_positions`);

--
-- Indeks untuk tabel `presents`
--
ALTER TABLE `presents`
  ADD PRIMARY KEY (`id_presents`);

--
-- Indeks untuk tabel `time`
--
ALTER TABLE `time`
  ADD PRIMARY KEY (`id_time`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_users`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `pengumuman`
--
ALTER TABLE `pengumuman`
  MODIFY `id_pengumuman` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `positions`
--
ALTER TABLE `positions`
  MODIFY `id_positions` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `presents`
--
ALTER TABLE `presents`
  MODIFY `id_presents` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT untuk tabel `time`
--
ALTER TABLE `time`
  MODIFY `id_time` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id_users` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=183;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
