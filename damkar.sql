-- phpMyAdmin SQL Dump
-- version 4.4.12
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 22, 2020 at 06:10 AM
-- Server version: 5.6.25
-- PHP Version: 5.5.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `damkar`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_kecamatan`
--

CREATE TABLE IF NOT EXISTS `tbl_kecamatan` (
  `id_kecamatan` int(11) NOT NULL,
  `nama_kecamatan` varchar(25) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_kecamatan`
--

INSERT INTO `tbl_kecamatan` (`id_kecamatan`, `nama_kecamatan`) VALUES
(1, 'bekasi timur'),
(2, 'bekasi barat'),
(3, 'bekasi selatan'),
(4, 'bekasi utara'),
(5, 'medan satria'),
(6, 'rawalumbu'),
(7, 'jatiasih'),
(8, 'pondok gede'),
(9, 'kranggan'),
(10, 'pondok melati'),
(11, 'bantarebang'),
(12, 'mustikajaya');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_laporan_tahunan`
--

CREATE TABLE IF NOT EXISTS `tbl_laporan_tahunan` (
  `id_laporan` int(11) NOT NULL,
  `tahun_laporan` int(11) NOT NULL,
  `id_sptrd` int(11) NOT NULL,
  `nominal` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_perpanjang_retribusi`
--

CREATE TABLE IF NOT EXISTS `tbl_perpanjang_retribusi` (
  `id_perpanjangan_retribusi` int(11) NOT NULL,
  `tanggal_perpanjang_retribusi` date NOT NULL,
  `bulan_retribusi` date NOT NULL,
  `imb_id` int(11) NOT NULL,
  `master_login_id` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_perpanjang_retribusi`
--

INSERT INTO `tbl_perpanjang_retribusi` (`id_perpanjangan_retribusi`, `tanggal_perpanjang_retribusi`, `bulan_retribusi`, `imb_id`, `master_login_id`) VALUES
(1, '2014-09-03', '2014-11-03', 166, 3),
(2, '2014-09-03', '2014-11-03', 165, 3),
(3, '2014-09-03', '2014-11-03', 163, 3),
(4, '2014-09-03', '2014-11-03', 169, 3),
(5, '2014-11-05', '2015-01-05', 142, 3),
(6, '2018-07-13', '2018-09-13', 186, 0),
(7, '2018-07-13', '2018-09-13', 185, 0),
(8, '2018-07-13', '2018-09-13', 184, 0),
(9, '2020-03-13', '2020-05-13', 180, 0),
(10, '2020-03-13', '2020-05-13', 175, 0),
(11, '2020-03-13', '2020-05-13', 53, 0),
(12, '2020-03-15', '2020-05-15', 150, 0),
(13, '2020-03-15', '2020-05-15', 45, 0),
(14, '2020-03-15', '2020-05-15', 40, 0),
(15, '2020-03-15', '2020-05-15', 38, 0),
(16, '2020-03-15', '2020-05-15', 37, 0),
(17, '2020-03-15', '2020-05-15', 36, 0),
(18, '2020-03-15', '2020-05-15', 35, 0),
(19, '2020-03-15', '2020-05-15', 29, 0),
(20, '2020-03-15', '2020-05-15', 187, 0),
(21, '2020-03-15', '2020-05-15', 189, 0),
(22, '2020-03-17', '2020-05-17', 194, 0),
(23, '2020-03-22', '2020-05-22', 195, 0),
(24, '2020-04-07', '2020-06-07', 197, 0),
(25, '2021-04-07', '2021-06-07', 197, 0),
(26, '2020-04-07', '2020-06-07', 196, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_sptrd`
--

CREATE TABLE IF NOT EXISTS `tbl_sptrd` (
  `id_sptrd` int(11) NOT NULL,
  `imb` varchar(25) NOT NULL,
  `nama_pemilik` varchar(30) NOT NULL,
  `alamat` varchar(300) NOT NULL,
  `nama_perusahaan` varchar(20) NOT NULL,
  `kd_kecamatan` int(11) NOT NULL,
  `jenis_usaha` varchar(25) NOT NULL,
  `tahun_pendataan` varchar(10) NOT NULL,
  `luas_tanah` varchar(25) NOT NULL,
  `uraian_retribusi` varchar(300) NOT NULL,
  `tlp` varchar(25) NOT NULL,
  `titik_kenal` varchar(10) NOT NULL,
  `nama_pemeriksa` varchar(25) NOT NULL,
  `berlaku_sampai` varchar(25) NOT NULL,
  `status_perpanjang_retribusi` int(2) NOT NULL,
  `nominal` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=199 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_sptrd`
--

INSERT INTO `tbl_sptrd` (`id_sptrd`, `imb`, `nama_pemilik`, `alamat`, `nama_perusahaan`, `kd_kecamatan`, `jenis_usaha`, `tahun_pendataan`, `luas_tanah`, `uraian_retribusi`, `tlp`, `titik_kenal`, `nama_pemeriksa`, `berlaku_sampai`, `status_perpanjang_retribusi`, `nominal`) VALUES
(190, 'imb 5', 'hotel iqbal', 'bekasi utara', 'hotel arjuna', 3, 'hotel', '2020', '123000', 'apar 20', '1325146531', 'depan kali', 'rifki', '2020-04-06', 1, 500000),
(191, 'imb 4', 'bank kampus', 'bekasi barat', 'gunadarma', 2, 'kampus', '2020', '321', 'apar 55<br>hydran 10', '123141', 'depan kali', 'sugeng', '2020-04-06', 1, 520000),
(192, 'imb 3', 'bank iqbal', 'bekasi timur', 'bank mandiri', 1, 'perbankan ', '2020', '120', 'apar 12<br>hydran 5', '123432', 'depan kant', 'yanyan', '2020-04-06', 1, 120000),
(193, 'imb 2', 'iqbal santika ', 'medan satria', 'santika', 5, 'hotel', '2020', '1200', 'apar 2<br>apar 22', '123', 'depan kant', 'yitno', '2021-04-06', 1, 12000),
(194, 'imb 1', 'saepul', 'jl raya medan satria bekasi', 'majestik', 5, 'toko roti', '2020', '120', 'apar 2<br>hydrann 2', '02100110011001', 'depan kali', 'indra', '2021-04-06', 1, 320000),
(195, '123RENAME', 'RENAME', 'RENAME', 'edit', 9, 'RENAME', '2020', '123', 'RENAME', 'RENAME123', 'RENAME', 'RENAME', '2020-04-06', 1, 2020),
(196, '1214641641433weubyn46ytuw', 'kecamatanasdfraw', 'kecamatan', 'kecamatanasasa', 11, 'kecamatanaafdsfdafad', '2020', '124415415', 'kecamatan', '123214521', 'kecamatan', 'kecamatanawdfrqgrq', '2020-04-06', 0, 2147483647),
(197, 'nyoba perpanjang', 'kecamatanasdfraw', 'kecamatan', 'kecamatanasasa', 10, 'kecamatanaafdsfdafad', '2020', '124415415', 'kecamatan', '123214521', 'kecamatan', 'kecamatanawdfrqgrq', '2020-04-06', 0, 2147483647),
(198, '12151653367', 'iqbal aja ', 'bekasi', 'update kecamatan', 1, 'apa aja bisa', '2020', '3582946582376502', 'aJDFHAGHAEBTERR', '1231541516', 'kecamatan ', 'IQBAL NYOBA KECAMATAN ', '2020-04-06', 1, 2147483647);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_kecamatan`
--
ALTER TABLE `tbl_kecamatan`
  ADD PRIMARY KEY (`id_kecamatan`);

--
-- Indexes for table `tbl_laporan_tahunan`
--
ALTER TABLE `tbl_laporan_tahunan`
  ADD PRIMARY KEY (`id_laporan`);

--
-- Indexes for table `tbl_perpanjang_retribusi`
--
ALTER TABLE `tbl_perpanjang_retribusi`
  ADD PRIMARY KEY (`id_perpanjangan_retribusi`);

--
-- Indexes for table `tbl_sptrd`
--
ALTER TABLE `tbl_sptrd`
  ADD PRIMARY KEY (`id_sptrd`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_kecamatan`
--
ALTER TABLE `tbl_kecamatan`
  MODIFY `id_kecamatan` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `tbl_laporan_tahunan`
--
ALTER TABLE `tbl_laporan_tahunan`
  MODIFY `id_laporan` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_perpanjang_retribusi`
--
ALTER TABLE `tbl_perpanjang_retribusi`
  MODIFY `id_perpanjangan_retribusi` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=27;
--
-- AUTO_INCREMENT for table `tbl_sptrd`
--
ALTER TABLE `tbl_sptrd`
  MODIFY `id_sptrd` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=199;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
