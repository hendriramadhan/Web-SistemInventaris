-- phpMyAdmin SQL Dump
-- version 3.2.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Dec 21, 2016 at 08:32 AM
-- Server version: 5.1.41
-- PHP Version: 5.3.1

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `inventaris`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `no_admin` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(50) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  PRIMARY KEY (`no_admin`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`no_admin`, `nama`, `alamat`, `username`, `password`) VALUES
(1, 'Admin 1', 'Kuansing', 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE IF NOT EXISTS `barang` (
  `no_barang` int(10) NOT NULL AUTO_INCREMENT,
  `no_pemasok` int(10) NOT NULL,
  `barang` varchar(50) NOT NULL,
  `jenis` varchar(50) NOT NULL,
  `jumlah` int(20) NOT NULL,
  `keterangan` varchar(50) NOT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`no_barang`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=33 ;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`no_barang`, `no_pemasok`, `barang`, `jenis`, `jumlah`, `keterangan`, `status`) VALUES
(20, 5, 'komputer', 'Unit', 40, 'Bagus', 1),
(21, 14, 'Bangku', 'Besi', 50, 'Bagus', 1),
(22, 13, 'Meja', 'kayu', 40, 'Bagus', 1),
(9, 23, 'lemari', 'kayu', 30, 'Bagus', 1),
(8, 6, 'Meja Dosen', 'Kayu', 30, 'Bagus', 1),
(24, 5, 'Laptop', 'Unit', 10, 'Bagus', 1),
(32, 21, 'Bangku', 'Plastik', 40, 'Bagus', 0);

-- --------------------------------------------------------

--
-- Table structure for table `diskusi`
--

CREATE TABLE IF NOT EXISTS `diskusi` (
  `no_diskusi` int(11) NOT NULL AUTO_INCREMENT,
  `no_pemasok` varchar(20) NOT NULL,
  `pesan` varchar(999) NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`no_diskusi`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=128 ;

--
-- Dumping data for table `diskusi`
--

INSERT INTO `diskusi` (`no_diskusi`, `no_pemasok`, `pesan`, `time`) VALUES
(84, '5', 'Data Barang saya sudah dimasukan', '2016-12-15 00:17:09'),
(81, '14', 'Selamat Pagi :)', '2016-12-14 23:37:24'),
(80, '5', 'Selamat Pagi  :)', '2016-12-14 23:34:56'),
(107, '5', 'Script nya apa lagi? :(\r\n', '2016-12-19 20:27:47'),
(117, '1', 'Akhirnya bisa juga script nya terimakasih semua', '2016-12-19 20:59:19'),
(126, '1', 'k', '2016-12-20 22:58:24'),
(127, '1', 'n', '2016-12-20 23:06:41');

-- --------------------------------------------------------

--
-- Table structure for table `keterangan`
--

CREATE TABLE IF NOT EXISTS `keterangan` (
  `keterangan` varchar(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `keterangan`
--

INSERT INTO `keterangan` (`keterangan`) VALUES
('Perbaikan'),
('Bagus'),
('Rusak');

-- --------------------------------------------------------

--
-- Table structure for table `pemasok`
--

CREATE TABLE IF NOT EXISTS `pemasok` (
  `no_pemasok` int(10) NOT NULL AUTO_INCREMENT,
  `nama` varchar(50) NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `status` varchar(20) NOT NULL,
  `username` varchar(40) NOT NULL,
  `password` varchar(40) NOT NULL,
  PRIMARY KEY (`no_pemasok`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=25 ;

--
-- Dumping data for table `pemasok`
--

INSERT INTO `pemasok` (`no_pemasok`, `nama`, `alamat`, `status`, `username`, `password`) VALUES
(5, 'Hendri Ramadhan', 'Teluk Bringin,Gunung Toar', 'Aktif', 'hendri', 'hendri'),
(6, 'Hasmika Lisma', 'Lubuk Terentang', 'Aktif', 'mikha', 'mikha'),
(13, 'Pemerintah Kabupaten Kuantan singingi', 'Kabupaten Kuantan Singingi', 'Aktif', 'bupati', 'bupati'),
(14, 'Ahmad Sodikun', 'Singingi', 'Aktif', 'sodiq', 'sodiq'),
(21, 'Arif Aldianto', 'Trans', 'Aktif', 'arif', 'arif'),
(22, 'Edo Susanto', 'Taluk Kuantan', 'Aktif', 'edo', 'edo'),
(23, 'Pingki Lestari', 'Baserah', 'Aktif', 'pingki', 'pingki'),
(24, 'Rizki Wulandari', 'Taluk Kuantan', 'Aktif', 'rizki', 'rizki');

-- --------------------------------------------------------

--
-- Table structure for table `pesan`
--

CREATE TABLE IF NOT EXISTS `pesan` (
  `no_pesan` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(40) NOT NULL,
  `alamat` varchar(40) NOT NULL,
  `pesan` text NOT NULL,
  PRIMARY KEY (`no_pesan`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `pesan`
--

INSERT INTO `pesan` (`no_pesan`, `nama`, `alamat`, `pesan`) VALUES
(1, 'saipul', 'tobek', 'Cara nganuin ny gimana?'),
(5, 'endi', 'jkt', 'aplikasi nya gini aja?'),
(6, 'endi', 'jkt', 'ini udh selesai atau belum sih aplikasinya?');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
