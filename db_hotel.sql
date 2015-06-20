-- phpMyAdmin SQL Dump
-- version 3.5.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Dec 10, 2014 at 01:01 AM
-- Server version: 5.5.25a
-- PHP Version: 5.4.4

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `db_hotel`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_book`
--

CREATE TABLE IF NOT EXISTS `tbl_book` (
  `id_book` int(11) NOT NULL AUTO_INCREMENT,
  `tgl_book` date NOT NULL,
  `total_harga` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `no_hp` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`id_book`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `tbl_book`
--

INSERT INTO `tbl_book` (`id_book`, `tgl_book`, `total_harga`, `nama`, `alamat`, `email`, `no_hp`, `status`) VALUES
(1, '2014-12-17', 800000, 'alin', 'depok', 'alin@alin.com', 2147483647, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_detailbook`
--

CREATE TABLE IF NOT EXISTS `tbl_detailbook` (
  `id_detailbook` int(11) NOT NULL AUTO_INCREMENT,
  `id_book` int(11) NOT NULL,
  `id_kamar` int(11) NOT NULL,
  `harga` int(11) NOT NULL,
  `tgl_check_in` date NOT NULL,
  `tgl_check_out` date NOT NULL,
  PRIMARY KEY (`id_detailbook`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `tbl_detailbook`
--

INSERT INTO `tbl_detailbook` (`id_detailbook`, `id_book`, `id_kamar`, `harga`, `tgl_check_in`, `tgl_check_out`) VALUES
(1, 1, 2221, 300000, '2014-12-17', '2014-12-19'),
(2, 1, 2311, 500000, '2014-12-17', '2014-12-20');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_kamar`
--

CREATE TABLE IF NOT EXISTS `tbl_kamar` (
  `id_kamar` int(11) NOT NULL,
  `id_typekamar` int(11) NOT NULL,
  `id_lokasi` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`id_kamar`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_kamar`
--

INSERT INTO `tbl_kamar` (`id_kamar`, `id_typekamar`, `id_lokasi`, `status`) VALUES
(1231, 3, 1, 0),
(2221, 2, 2, 0),
(2311, 1, 2, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_lokasi`
--

CREATE TABLE IF NOT EXISTS `tbl_lokasi` (
  `id_lokasi` int(11) NOT NULL AUTO_INCREMENT,
  `lokasi` varchar(50) NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `kode_pos` int(11) NOT NULL,
  `no_fax` int(11) NOT NULL,
  `no_telp` int(11) NOT NULL,
  PRIMARY KEY (`id_lokasi`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `tbl_lokasi`
--

INSERT INTO `tbl_lokasi` (`id_lokasi`, `lokasi`, `alamat`, `kode_pos`, `no_fax`, `no_telp`) VALUES
(1, 'Ulin Cikini', 'Cikini - Jakarta Pusat', 26458, 79878654, 897654),
(2, 'Ulin Bogor Nirwana', 'BNR - Bogor', 90876, 890678, 5678904);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_peg`
--

CREATE TABLE IF NOT EXISTS `tbl_peg` (
  `id_peg` int(5) NOT NULL AUTO_INCREMENT,
  `nama` varchar(20) NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `no_hp` varchar(15) NOT NULL,
  `email` varchar(50) NOT NULL,
  `jabatan` varchar(15) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  PRIMARY KEY (`id_peg`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `tbl_peg`
--

INSERT INTO `tbl_peg` (`id_peg`, `nama`, `alamat`, `no_hp`, `email`, `jabatan`, `username`, `password`) VALUES
(1, 'Alin Nur', 'Depok', '09865454258', 'alinnurkhalifah@gmail.com', 'Admin', 'Nila', '8df03bca3f48d310f74fe6092af08c95');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_transaksi`
--

CREATE TABLE IF NOT EXISTS `tbl_transaksi` (
  `id_transaksi` int(11) NOT NULL AUTO_INCREMENT,
  `id_book` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`id_transaksi`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_typekamar`
--

CREATE TABLE IF NOT EXISTS `tbl_typekamar` (
  `id_typekamar` int(11) NOT NULL AUTO_INCREMENT,
  `type` varchar(20) NOT NULL,
  `harga` varchar(15) NOT NULL,
  PRIMARY KEY (`id_typekamar`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=27 ;

--
-- Dumping data for table `tbl_typekamar`
--

INSERT INTO `tbl_typekamar` (`id_typekamar`, `type`, `harga`) VALUES
(1, 'Deluxe', '300000'),
(2, 'Suite', '500000'),
(3, 'Superior', '700000'),
(4, 'Super Deluxe', '900000'),
(5, 'Super Junior', '200000');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
