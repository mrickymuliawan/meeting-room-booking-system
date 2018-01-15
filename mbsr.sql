-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Sep 19, 2017 at 08:50 AM
-- Server version: 10.1.8-MariaDB
-- PHP Version: 5.6.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mbsr`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_book`
--

CREATE TABLE `tb_book` (
  `id_book` int(11) NOT NULL,
  `judul_meeting` varchar(100) NOT NULL DEFAULT '0',
  `divisi` varchar(50) DEFAULT NULL,
  `bagian` varchar(50) DEFAULT NULL,
  `snack` varchar(50) DEFAULT NULL,
  `makan_siang` varchar(50) DEFAULT NULL,
  `jumlah_peserta` varchar(50) DEFAULT NULL,
  `pic` varchar(50) DEFAULT NULL,
  `notelp_pic` varchar(50) DEFAULT NULL,
  `id_ruang` int(11) DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  `jam_mulai` time DEFAULT NULL,
  `jam_selesai` time DEFAULT NULL,
  `id_user` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_book`
--

INSERT INTO `tb_book` (`id_book`, `judul_meeting`, `divisi`, `bagian`, `snack`, `makan_siang`, `jumlah_peserta`, `pic`, `notelp_pic`, `id_ruang`, `tanggal`, `jam_mulai`, `jam_selesai`, `id_user`) VALUES
(1, 'a', 'a', 'a', 'tidak', 'tidak', '11', 'a', 'a', 3, '2017-09-10', '08:00:00', '10:00:00', NULL),
(2, 'a', 'a', 'a', 'tidak', 'tidak', '11', 'a', 'a', 3, '2017-09-11', '08:00:00', '10:00:00', NULL),
(3, 'a', 'a', 'a', 'tidak', 'tidak', '11', 'a', 'a', 3, '2017-09-12', '08:00:00', '10:00:00', NULL),
(4, 'a', 'a', 'a', 'tidak', 'tidak', '11', 'a', 'a', 3, '2017-09-13', '08:00:00', '10:00:00', NULL),
(5, 'a', 'a', 'a', 'tidak', 'tidak', '11', 'a', 'a', 3, '2017-09-14', '08:00:00', '10:00:00', NULL),
(6, 'a', 'a', 'a', 'tidak', 'tidak', '11', 'a', 'a', 3, '2017-09-15', '08:00:00', '10:00:00', NULL),
(7, 'a', 'a', 'a', 'tidak', 'tidak', 'a', 'a', 'a', 3, '2017-09-17', '08:00:00', '13:00:00', NULL),
(8, 'a', 'a', 'a', 'tidak', 'tidak', 'a', 'a', 'a', 3, '2017-09-18', '08:00:00', '13:00:00', NULL),
(9, 'a', 'a', 'a', 'tidak', 'tidak', 'a', 'a', 'a', 3, '2017-09-19', '08:00:00', '13:00:00', NULL),
(10, 'a', 'a', 'a', 'tidak', 'tidak', 'a', 'a', 'a', 3, '2017-09-20', '08:00:00', '13:00:00', NULL),
(11, 'test', 'tes', 'tes', 'tidak', 'tidak', 'tes', 'te', 'te', 5, '2017-09-10', '08:00:00', '12:00:00', NULL),
(12, 'test', 'tes', 'tes', 'tidak', 'tidak', 'tes', 'te', 'te', 5, '2017-09-11', '08:00:00', '12:00:00', NULL),
(13, 'test', 'tes', 'tes', 'tidak', 'tidak', 'tes', 'te', 'te', 5, '2017-09-12', '08:00:00', '12:00:00', NULL),
(14, 'test', 'tes', 'tes', 'tidak', 'tidak', 'tes', 'te', 'te', 5, '2017-09-13', '08:00:00', '12:00:00', NULL),
(15, 'test', 'tes', 'tes', 'tidak', 'tidak', 'tes', 'te', 'te', 5, '2017-09-14', '08:00:00', '12:00:00', NULL),
(16, 'test', 'tes', 'tes', 'tidak', 'tidak', 'tes', 'te', 'te', 5, '2017-09-15', '08:00:00', '12:00:00', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tb_ruang`
--

CREATE TABLE `tb_ruang` (
  `id_ruang` int(11) NOT NULL,
  `lantai_ruang` varchar(50) DEFAULT NULL,
  `gedung` varchar(50) DEFAULT NULL,
  `nama_ruang` varchar(50) DEFAULT NULL,
  `kapasitas` varchar(50) DEFAULT NULL,
  `ketersediaan` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_ruang`
--

INSERT INTO `tb_ruang` (`id_ruang`, `lantai_ruang`, `gedung`, `nama_ruang`, `kapasitas`, `ketersediaan`) VALUES
(3, '3', 'gedung1', 'ruang2', '20 orang', NULL),
(5, '2', 'gedung1', 'ruang1', '30 orang', NULL),
(6, '7', 'gedung1', 'ruang3', '50 orang', NULL),
(7, '8', 'TSI', 'Building2', '100', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE `tb_user` (
  `id_user` int(11) NOT NULL,
  `no_telp` varchar(50) NOT NULL DEFAULT '0',
  `nama_user` varchar(50) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `role` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`id_user`, `no_telp`, `nama_user`, `password`, `role`) VALUES
(1, '089912344321', 'admin', '0192023a7bbd73250516f069df18b500', 'admin'),
(4, '321', 'rakaramadhan', 'caf1a3dfb505ffed0d024130f58c5cfa', 'user'),
(6, '123', 'willy', '310dcbbf4cce62f762a2aaa148d556bd', 'user');

-- --------------------------------------------------------

--
-- Table structure for table `tb_waktu`
--

CREATE TABLE `tb_waktu` (
  `id_book` varchar(50) DEFAULT NULL,
  `waktu` datetime DEFAULT NULL,
  `id_ruang` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_waktu`
--

INSERT INTO `tb_waktu` (`id_book`, `waktu`, `id_ruang`) VALUES
('1', '2017-09-10 08:00:00', '3'),
('1', '2017-09-10 09:00:00', '3'),
('1', '2017-09-10 10:00:00', '3'),
('2', '2017-09-11 08:00:00', '3'),
('2', '2017-09-11 09:00:00', '3'),
('2', '2017-09-11 10:00:00', '3'),
('3', '2017-09-12 08:00:00', '3'),
('3', '2017-09-12 09:00:00', '3'),
('3', '2017-09-12 10:00:00', '3'),
('4', '2017-09-13 08:00:00', '3'),
('4', '2017-09-13 09:00:00', '3'),
('4', '2017-09-13 10:00:00', '3'),
('5', '2017-09-14 08:00:00', '3'),
('5', '2017-09-14 09:00:00', '3'),
('5', '2017-09-14 10:00:00', '3'),
('6', '2017-09-15 08:00:00', '3'),
('6', '2017-09-15 09:00:00', '3'),
('6', '2017-09-15 10:00:00', '3'),
('7', '2017-09-17 08:00:00', '3'),
('7', '2017-09-17 09:00:00', '3'),
('7', '2017-09-17 10:00:00', '3'),
('7', '2017-09-17 11:00:00', '3'),
('7', '2017-09-17 12:00:00', '3'),
('7', '2017-09-17 13:00:00', '3'),
('8', '2017-09-18 08:00:00', '3'),
('8', '2017-09-18 09:00:00', '3'),
('8', '2017-09-18 10:00:00', '3'),
('8', '2017-09-18 11:00:00', '3'),
('8', '2017-09-18 12:00:00', '3'),
('8', '2017-09-18 13:00:00', '3'),
('9', '2017-09-19 08:00:00', '3'),
('9', '2017-09-19 09:00:00', '3'),
('9', '2017-09-19 10:00:00', '3'),
('9', '2017-09-19 11:00:00', '3'),
('9', '2017-09-19 12:00:00', '3'),
('9', '2017-09-19 13:00:00', '3'),
('10', '2017-09-20 08:00:00', '3'),
('10', '2017-09-20 09:00:00', '3'),
('10', '2017-09-20 10:00:00', '3'),
('10', '2017-09-20 11:00:00', '3'),
('10', '2017-09-20 12:00:00', '3'),
('10', '2017-09-20 13:00:00', '3'),
('11', '2017-09-10 08:00:00', '5'),
('11', '2017-09-10 09:00:00', '5'),
('11', '2017-09-10 10:00:00', '5'),
('11', '2017-09-10 11:00:00', '5'),
('11', '2017-09-10 12:00:00', '5'),
('12', '2017-09-11 08:00:00', '5'),
('12', '2017-09-11 09:00:00', '5'),
('12', '2017-09-11 10:00:00', '5'),
('12', '2017-09-11 11:00:00', '5'),
('12', '2017-09-11 12:00:00', '5'),
('13', '2017-09-12 08:00:00', '5'),
('13', '2017-09-12 09:00:00', '5'),
('13', '2017-09-12 10:00:00', '5'),
('13', '2017-09-12 11:00:00', '5'),
('13', '2017-09-12 12:00:00', '5'),
('14', '2017-09-13 08:00:00', '5'),
('14', '2017-09-13 09:00:00', '5'),
('14', '2017-09-13 10:00:00', '5'),
('14', '2017-09-13 11:00:00', '5'),
('14', '2017-09-13 12:00:00', '5'),
('15', '2017-09-14 08:00:00', '5'),
('15', '2017-09-14 09:00:00', '5'),
('15', '2017-09-14 10:00:00', '5'),
('15', '2017-09-14 11:00:00', '5'),
('15', '2017-09-14 12:00:00', '5'),
('16', '2017-09-15 08:00:00', '5'),
('16', '2017-09-15 09:00:00', '5'),
('16', '2017-09-15 10:00:00', '5'),
('16', '2017-09-15 11:00:00', '5'),
('16', '2017-09-15 12:00:00', '5');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_book`
--
ALTER TABLE `tb_book`
  ADD PRIMARY KEY (`id_book`);

--
-- Indexes for table `tb_ruang`
--
ALTER TABLE `tb_ruang`
  ADD PRIMARY KEY (`id_ruang`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_book`
--
ALTER TABLE `tb_book`
  MODIFY `id_book` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `tb_ruang`
--
ALTER TABLE `tb_ruang`
  MODIFY `id_ruang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
