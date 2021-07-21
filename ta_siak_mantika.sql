-- phpMyAdmin SQL Dump
-- version 4.0.4.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Aug 06, 2019 at 06:15 AM
-- Server version: 5.5.32
-- PHP Version: 5.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `ta_siak_mantika`
--
CREATE DATABASE IF NOT EXISTS `ta_siak_mantika` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `ta_siak_mantika`;

-- --------------------------------------------------------

--
-- Table structure for table `tb_absensi`
--

CREATE TABLE IF NOT EXISTS `tb_absensi` (
  `id_absensi` int(4) NOT NULL AUTO_INCREMENT,
  `id_kelas` varchar(5) NOT NULL,
  `id_pengajar` varchar(10) NOT NULL,
  `id_periode` varchar(3) NOT NULL,
  `tanggal_pertemuan` date NOT NULL,
  `tanggal_input` date NOT NULL,
  `waktu_input` time NOT NULL,
  PRIMARY KEY (`id_absensi`),
  KEY `id_kelas` (`id_kelas`),
  KEY `id_pengajar` (`id_pengajar`),
  KEY `id_periode` (`id_periode`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `tb_absensi`
--

INSERT INTO `tb_absensi` (`id_absensi`, `id_kelas`, `id_pengajar`, `id_periode`, `tanggal_pertemuan`, `tanggal_input`, `waktu_input`) VALUES
(1, 'C1901', '2019070401', 'P02', '2019-07-22', '2019-07-23', '07:33:13'),
(2, 'C1901', '2019070401', 'P02', '2019-07-25', '2019-07-23', '12:22:25');

-- --------------------------------------------------------

--
-- Table structure for table `tb_absensi_detail`
--

CREATE TABLE IF NOT EXISTS `tb_absensi_detail` (
  `id` int(4) NOT NULL AUTO_INCREMENT,
  `id_absensi` int(4) NOT NULL,
  `id_siswa` varchar(6) NOT NULL,
  `status` char(1) NOT NULL,
  `catatan` text NOT NULL,
  `tanggal_input` date NOT NULL,
  `waktu_input` time NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_absensi` (`id_absensi`),
  KEY `id_siswa` (`id_siswa`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `tb_absensi_detail`
--

INSERT INTO `tb_absensi_detail` (`id`, `id_absensi`, `id_siswa`, `status`, `catatan`, `tanggal_input`, `waktu_input`) VALUES
(1, 1, '190701', 'P', '-', '2019-07-23', '12:20:03'),
(2, 1, '190702', 'P', '-', '2019-07-23', '12:20:14'),
(3, 1, '190704', 'P', '-', '2019-07-23', '12:20:25'),
(4, 1, '190706', 'P', '-', '2019-07-23', '12:20:36'),
(5, 2, '190701', 'A', 'Fever', '2019-07-23', '12:23:11'),
(6, 2, '190702', 'P', '-', '2019-07-23', '12:23:25'),
(7, 2, '190704', 'P', '-', '2019-07-23', '12:24:07'),
(8, 2, '190706', 'P', '-', '2019-07-23', '12:24:35');

-- --------------------------------------------------------

--
-- Table structure for table `tb_admin`
--

CREATE TABLE IF NOT EXISTS `tb_admin` (
  `id_admin` varchar(2) COLLATE latin1_general_ci NOT NULL,
  `nama_admin` varchar(30) COLLATE latin1_general_ci NOT NULL,
  `jenis_kelamin` char(1) COLLATE latin1_general_ci NOT NULL,
  `tempat_lahir` varchar(20) COLLATE latin1_general_ci NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `alamat` text COLLATE latin1_general_ci NOT NULL,
  `agama` varchar(9) COLLATE latin1_general_ci NOT NULL,
  `username` varchar(10) COLLATE latin1_general_ci NOT NULL,
  `password` varchar(12) COLLATE latin1_general_ci NOT NULL,
  `email` varchar(30) COLLATE latin1_general_ci NOT NULL,
  `no_telepon` varchar(14) COLLATE latin1_general_ci NOT NULL,
  `status` varchar(8) COLLATE latin1_general_ci NOT NULL,
  `gambar` text COLLATE latin1_general_ci NOT NULL,
  `keterangan` text COLLATE latin1_general_ci NOT NULL,
  PRIMARY KEY (`id_admin`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `tb_admin`
--

INSERT INTO `tb_admin` (`id_admin`, `nama_admin`, `jenis_kelamin`, `tempat_lahir`, `tanggal_lahir`, `alamat`, `agama`, `username`, `password`, `email`, `no_telepon`, `status`, `gambar`, `keterangan`) VALUES
('A0', 'Master', 'M', 'Jakarta', '1977-09-03', 'Jakarta', 'Islam', 'admin', 'admin', 'admin@yahoo.com', '089898989', 'Active', 'dummy-profile.png', 'Test Account'),
('A1', 'Sumariati', 'F', 'Jakarta', '1977-05-02', 'Jln Hj. Said No.9, Jakarta Selatan', 'Islam', 'mari2577', 'mari2577', 'sumariati77@gmail.com', '081980887312', 'Active', 'Sumariati.jpg', 'Head of Academic Coordinator');

-- --------------------------------------------------------

--
-- Table structure for table `tb_kelas`
--

CREATE TABLE IF NOT EXISTS `tb_kelas` (
  `id_kelas` varchar(5) NOT NULL,
  `id_program` varchar(4) NOT NULL,
  `id_pengajar` varchar(10) NOT NULL,
  `id_ruangan` varchar(3) NOT NULL,
  `id_sesi` varchar(3) NOT NULL,
  `id_periode` varchar(3) NOT NULL,
  `term` year(4) NOT NULL,
  `status` varchar(9) NOT NULL,
  PRIMARY KEY (`id_kelas`),
  KEY `id_pengajar` (`id_pengajar`),
  KEY `id_periode` (`id_periode`),
  KEY `id_program` (`id_program`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_kelas`
--

INSERT INTO `tb_kelas` (`id_kelas`, `id_program`, `id_pengajar`, `id_ruangan`, `id_sesi`, `id_periode`, `term`, `status`) VALUES
('C1901', '1107', '2019070401', '201', '141', 'P02', 2019, 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `tb_nilai`
--

CREATE TABLE IF NOT EXISTS `tb_nilai` (
  `id_nilai` int(3) NOT NULL AUTO_INCREMENT,
  `id_periode` varchar(3) NOT NULL,
  `id_kelas` varchar(5) NOT NULL,
  `id_peserta` int(3) NOT NULL,
  `jenis_tes` varchar(5) NOT NULL,
  `ls_score` int(3) NOT NULL,
  `su_score` int(3) NOT NULL,
  `rv_score` int(3) NOT NULL,
  `comp_score` int(3) NOT NULL,
  `speak_score` int(3) NOT NULL,
  `catatan` text NOT NULL,
  PRIMARY KEY (`id_nilai`),
  KEY `id_kelas` (`id_kelas`),
  KEY `id_peserta` (`id_peserta`),
  KEY `id_periode` (`id_periode`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `tb_nilai`
--

INSERT INTO `tb_nilai` (`id_nilai`, `id_periode`, `id_kelas`, `id_peserta`, `jenis_tes`, `ls_score`, `su_score`, `rv_score`, `comp_score`, `speak_score`, `catatan`) VALUES
(1, 'P02', 'C1901', 1, 'Mid', 90, 90, 90, 90, 90, 'Good Job!'),
(2, 'P02', 'C1901', 1, 'Final', 80, 80, 90, 90, 100, 'Very Good!'),
(3, 'P02', 'C1901', 4, 'Mid', 100, 100, 100, 100, 100, 'Awesome!!!'),
(4, 'P02', 'C1901', 4, 'Final', 98, 90, 100, 100, 100, 'Great Work!!'),
(5, 'P02', 'C1901', 5, 'Mid', 80, 80, 80, 80, 80, 'good job');

-- --------------------------------------------------------

--
-- Table structure for table `tb_orangtua`
--

CREATE TABLE IF NOT EXISTS `tb_orangtua` (
  `id_orangtua` varchar(7) NOT NULL,
  `id_siswa` varchar(6) NOT NULL,
  `nama_orangtua` varchar(30) NOT NULL,
  `jenis_kelamin` char(1) NOT NULL,
  `alamat` text NOT NULL,
  `agama` varchar(9) NOT NULL,
  `tempat_lahir` varchar(30) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `username` varchar(10) NOT NULL,
  `password` varchar(12) NOT NULL,
  `email` varchar(30) NOT NULL,
  `no_telepon` varchar(14) NOT NULL,
  `status` varchar(8) NOT NULL,
  PRIMARY KEY (`id_orangtua`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_orangtua`
--

INSERT INTO `tb_orangtua` (`id_orangtua`, `id_siswa`, `nama_orangtua`, `jenis_kelamin`, `alamat`, `agama`, `tempat_lahir`, `tanggal_lahir`, `username`, `password`, `email`, `no_telepon`, `status`) VALUES
('P190701', '190701', 'Ramdhani Sahid', 'M', 'Jln. Cinere Permai No.21', 'Islam', 'Jakarta', '1979-07-25', 'ramsah2579', 'ramsah2579', 'ramdhanisahid@gmail.com', '081978665732', 'Active'),
('P190706', '190706', 'Munarwan P.', 'M', 'Jln. Pancoran Raya 9 No.7', 'Islam', 'Jakarta', '1977-07-23', 'munarw0277', 'munarw0277', 'munarwan77@gmail.com', '081256438987', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `tb_pengajar`
--

CREATE TABLE IF NOT EXISTS `tb_pengajar` (
  `id_pengajar` varchar(10) NOT NULL,
  `nama_pengajar` varchar(30) NOT NULL,
  `jenis_kelamin` char(1) NOT NULL,
  `tempat_lahir` varchar(20) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `alamat` text NOT NULL,
  `agama` varchar(9) NOT NULL,
  `username` varchar(10) NOT NULL,
  `password` varchar(12) NOT NULL,
  `email` varchar(30) NOT NULL,
  `no_telepon` varchar(14) NOT NULL,
  `status` varchar(8) NOT NULL,
  `gambar` text NOT NULL,
  `keterangan` text NOT NULL,
  PRIMARY KEY (`id_pengajar`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_pengajar`
--

INSERT INTO `tb_pengajar` (`id_pengajar`, `nama_pengajar`, `jenis_kelamin`, `tempat_lahir`, `tanggal_lahir`, `alamat`, `agama`, `username`, `password`, `email`, `no_telepon`, `status`, `gambar`, `keterangan`) VALUES
('2019070401', 'Erika Isnawati K.', 'F', 'Bandung', '1985-07-04', 'Komplek Perumahan Tebet Permai, No.1', 'Islam', 'eriisn0485', 'eriisn0485', 'erikaisnawati@gmail.com', '081223234545', 'Active', 'Erika.jpg', '-'),
('2019070402', 'Radityo Hermawanto', 'M', 'Jakarta', '1990-03-11', 'Jln. Cinere Raya No.2', 'Islam', 'radher1190', 'radher1190', 'radityoH11@rocketmail.com', '088790875643', 'Active', 'Screenshot_41.jpg', '-'),
('2019070403', 'Novi Nisriyanti A.', 'F', 'Jakarta', '1992-12-09', 'Jln. Imam Bonjol No.8', 'Islam', 'novnis0992', 'novnis0992', 'novinisriyanti@yahoo.com', '089776459867', 'Active', 'Novi.jpg', '-');

-- --------------------------------------------------------

--
-- Table structure for table `tb_periode`
--

CREATE TABLE IF NOT EXISTS `tb_periode` (
  `id_periode` varchar(3) NOT NULL,
  `nama_periode` varchar(10) NOT NULL,
  `deskripsi` text NOT NULL,
  `status` varchar(9) NOT NULL,
  PRIMARY KEY (`id_periode`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_periode`
--

INSERT INTO `tb_periode` (`id_periode`, `nama_periode`, `deskripsi`, `status`) VALUES
('P01', 'Periode 1', 'January - April', 'Inactive'),
('P02', 'Periode 2', 'May - August', 'Active'),
('P03', 'Periode 3', 'September - December', 'Inactive');

-- --------------------------------------------------------

--
-- Table structure for table `tb_peserta`
--

CREATE TABLE IF NOT EXISTS `tb_peserta` (
  `id_peserta` int(3) NOT NULL AUTO_INCREMENT,
  `id_kelas` varchar(5) NOT NULL,
  `id_siswa` varchar(6) NOT NULL,
  `id_periode` varchar(3) NOT NULL,
  PRIMARY KEY (`id_peserta`),
  KEY `id_kelas` (`id_kelas`),
  KEY `id_siswa` (`id_siswa`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `tb_peserta`
--

INSERT INTO `tb_peserta` (`id_peserta`, `id_kelas`, `id_siswa`, `id_periode`) VALUES
(1, 'C1901', '190701', 'P02'),
(4, 'C1901', '190702', 'P02'),
(5, 'C1901', '190704', 'P02'),
(6, 'C1901', '190706', 'P02');

-- --------------------------------------------------------

--
-- Table structure for table `tb_program`
--

CREATE TABLE IF NOT EXISTS `tb_program` (
  `id_program` varchar(4) NOT NULL,
  `nama_program` varchar(12) NOT NULL,
  `level` varchar(25) NOT NULL,
  `uraian` text NOT NULL,
  `silabus` text NOT NULL,
  `status` varchar(9) NOT NULL,
  `biaya` int(11) NOT NULL,
  PRIMARY KEY (`id_program`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_program`
--

INSERT INTO `tb_program` (`id_program`, `nama_program`, `level`, `uraian`, `silabus`, `status`, `biaya`) VALUES
('1101', 'English', 'Primary 01', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.', 'Active', 600000),
('1102', 'English', 'Primary 02', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.', 'Active', 600000),
('1103', 'English', 'Primary 03', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.', 'Active', 600000),
('1104', 'English', 'Primary 04', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.', 'Active', 600000),
('1105', 'English', 'Primary 05', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.', 'Active', 600000),
('1106', 'English', 'Primary 06', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.', 'Active', 600000),
('1107', 'English', 'Primary 07', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.', 'Active', 650000),
('1108', 'English', 'Primary 08', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.', 'Active', 650000),
('1109', 'English', 'Primary 09', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.', 'Active', 650000),
('1110', 'English', 'Primary 10', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.', 'Active', 650000),
('1111', 'English', 'Primary 11', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.', 'Active', 650000),
('1112', 'English', 'Primary 12', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.', 'Active', 650000),
('1201', 'English', 'JC Absolute Beginner', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.', 'Active', 1100000),
('1202', 'English', 'JC Beginner', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.', 'Active', 1100000),
('1203', 'English', 'JC Elementary 1', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.', 'Active', 1100000),
('1204', 'English', 'JC Elementary 2', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.', 'Active', 1100000),
('1205', 'English', 'JC Elementary 3', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.', 'Active', 1100000),
('1206', 'English', 'JC Intermediate 1', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.', 'Active', 1100000),
('1207', 'English', 'JC Intermediate 2', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.', 'Active', 1100000),
('1208', 'English', 'JC Intermediate 3', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.', 'Active', 1100000),
('1301', 'English', 'AC Beginner', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.', 'Active', 1200000),
('1302', 'English', 'AC Elementary 1', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.', 'Active', 1200000),
('1303', 'English', 'AC Elementary 2', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.', 'Active', 1200000),
('1304', 'English', 'AC Elementary 3', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.', 'Active', 1200000),
('1305', 'English', 'AC Intermediate 1', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.', 'Active', 1200000),
('1306', 'English', 'AC Intermediate 2', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.', 'Active', 1200000),
('1307', 'English', 'AC Intermediate 3', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.', 'Active', 1200000),
('1308', 'English', 'AC Advanced 1', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.', 'Active', 1200000),
('1309', 'English', 'AC Advanced 2', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.', 'Active', 1200000),
('1310', 'English', 'AC Advanced 3', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.', 'Active', 1200000),
('1401', 'English', 'Private', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.', 'Active', 800000);

-- --------------------------------------------------------

--
-- Table structure for table `tb_ruangan`
--

CREATE TABLE IF NOT EXISTS `tb_ruangan` (
  `id_ruangan` varchar(3) NOT NULL,
  `nama_ruangan` varchar(3) NOT NULL,
  `status` varchar(9) NOT NULL,
  PRIMARY KEY (`id_ruangan`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_ruangan`
--

INSERT INTO `tb_ruangan` (`id_ruangan`, `nama_ruangan`, `status`) VALUES
('201', '201', 'Active'),
('202', '202', 'Active'),
('203', '203', 'Active'),
('204', '204', 'Active'),
('301', '301', 'Active'),
('302', '302', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `tb_sesi`
--

CREATE TABLE IF NOT EXISTS `tb_sesi` (
  `id_sesi` varchar(4) NOT NULL,
  `hari` varchar(19) NOT NULL,
  `waktu` varchar(14) NOT NULL,
  `status` varchar(9) NOT NULL,
  PRIMARY KEY (`id_sesi`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_sesi`
--

INSERT INTO `tb_sesi` (`id_sesi`, `hari`, `waktu`, `status`) VALUES
('141', 'Monday & Thursday', '15:00 - 16:30', 'Active'),
('142', 'Monday & Thursday', '16:30 - 18:00', 'Active'),
('251', 'Tuesday & Friday', '15:00 - 16:30', 'Active'),
('252', 'Tuesday & Friday', '16:30 - 18:00', 'Active'),
('601', 'Saturday', '10:00 - 13:00', 'Active'),
('602', 'Saturday', '11:00 - 14:00', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `tb_siswa`
--

CREATE TABLE IF NOT EXISTS `tb_siswa` (
  `id_siswa` varchar(6) NOT NULL,
  `nama_siswa` varchar(30) NOT NULL,
  `jenis_kelamin` char(1) NOT NULL,
  `tempat_lahir` varchar(20) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `alamat` text NOT NULL,
  `agama` varchar(9) NOT NULL,
  `username` varchar(10) NOT NULL,
  `password` varchar(12) NOT NULL,
  `email` varchar(30) NOT NULL,
  `no_telepon` varchar(14) NOT NULL,
  `status` varchar(8) NOT NULL,
  `gambar` text NOT NULL,
  `keterangan` text NOT NULL,
  PRIMARY KEY (`id_siswa`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_siswa`
--

INSERT INTO `tb_siswa` (`id_siswa`, `nama_siswa`, `jenis_kelamin`, `tempat_lahir`, `tanggal_lahir`, `alamat`, `agama`, `username`, `password`, `email`, `no_telepon`, `status`, `gambar`, `keterangan`) VALUES
('190701', 'Amelia Ramadhani', 'F', 'Jakarta', '2010-04-12', 'Jln. Cinere Permai No.21', 'Islam', 'ameram0410', 'ameram0410', 'ameliarama10@yahoo.com', '081256789876', 'Active', 'Screenshot_48.jpg', '-'),
('190702', 'Chaka Rendraswari', 'F', 'Jakarta', '2008-04-03', 'Jln. Petamburan No.3', 'Hindu', 'charen0408', 'charen0408', 'chakaREN@gmail.com', '081998766789', 'Active', 'Screenshot_43.jpg', '-'),
('190703', 'Asri Ariffin', 'M', 'Jakarta', '2012-05-05', 'Jln. Kemanggisan No.9', 'Islam', 'asrari0512', 'asrari0512', 'asriarifinn@yahoo.com', '081201928374', 'Active', 'Screenshot_42.jpg', '-'),
('190704', 'Istiqlal Aji Putra', 'M', 'Magelang', '2012-09-21', 'Jln. Pattimura No.5', 'Islam', 'istaji0912', 'istaji0912', 'qilalajiputra@yahoo.com', '089765748392', 'Active', 'Screenshot_41 (2).jpg', '-'),
('190705', 'Muhammad Rezha', 'M', 'Jakarta', '2010-08-13', 'Jln. RS Fatmawati No.11', 'Islam', 'muhrez0810', 'muhrez0810', 'muhammadrezha10@gmail.com', '085668493122', 'Active', 'Screenshot_44.jpg', '-'),
('190706', 'Ridwan Munkar', 'M', 'Jakarta', '2011-10-31', 'Jln. Pancoran Raya 9 No.7', 'Islam', 'ridmun1011', 'ridmun1011', 'ridwanmunkar31@gmail.com', '081256438907', 'Active', 'Screenshot_47.jpg', '-'),
('190707', 'Danu Ega', 'M', 'Surabaya', '2009-12-16', 'Kompleks Perumahan Legenda Wisata, Zona Mozard No.1', 'Islam', 'danega1209', 'danega1209', 'danuega@rocketmail.com', '087701928373', 'Active', 'Screenshot_45.jpg', '-'),
('190708', 'Syaiful Yusrizal', 'M', 'Jakarta', '2010-07-17', 'Jln. Delta No.2, Komplek Bakin 3', 'Islam', 'syayus0710', 'syayus0710', 'syaifulyusri17@gmail.com', '086541210845', 'Active', 'Screenshot_46.jpg', '-'),
('190709', 'Sagha Aditya', 'M', 'Jakarta', '2010-02-03', 'Jln. Tebet Mas Indah I No.2', 'Islam', 'sagadi0210', 'sagadi0210', 'saghaadit0302@yahoo.com', '081998762543', 'Active', 'Screenshot_51.jpg', '-'),
('190710', 'Puti Nadiyah Rudina', 'M', 'Jakarta', '2012-12-14', 'Jln. Tebet Barat IIB No. 1', 'Islam', 'putnad1411', 'putnad1411', 'putnad1411', '085615346781', 'Active', 'Screenshot_50.jpg', '-'),
('190711', 'Zulfikar Yudistya', 'M', 'Jakarta', '2010-09-28', 'Jln. Tebet Mas Indah VI No. 5', 'Islam', 'zulyud1010', 'zulyud1010', 'zulfikaryudis@gmail.com', '087812657399', 'Active', 'Screenshot_53.jpg', '-'),
('190712', 'Rullyansyah', 'M', 'Jakarta', '2010-07-30', 'Jln. Tebet Barat IA No.3', 'Islam', 'rully3010', 'rully3010', 'rullyansyahgx@gmail.com', '081298570196', 'Active', 'Screenshot_55.jpg', '-'),
('190713', 'Muhammad Rizal Dinnur', 'M', 'Jakarta', '2011-10-01', 'Jln Tebet Barata IA No.8', 'Islam', 'rizdin0111', 'rizdin0111', 'rizaldinnur11@yahoo.com', '088256718902', 'Active', 'Screenshot_57.jpg', '-'),
('190714', 'Dzikri Priatma', 'M', 'Jakarta', '2011-06-06', 'Gg. Trijaya II, Tebet Barat', 'Islam', 'dzipri0611', 'dzipri0611', 'dzikipriww66@gmail.com', '088210856355', 'Active', 'Screenshot_56.jpg', '-'),
('190715', 'Eka Bagaskara Dwiyanto', 'M', 'Jakarta', '2008-01-14', 'Rusun Berlian lt. 5, Tebet Barat', 'Islam', 'ekabag1408', 'ekabag1408', 'ekabagasyanto@yahoo.com', '081566809832', 'Active', 'Screenshot_54.jpg', '-');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
