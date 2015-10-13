-- phpMyAdmin SQL Dump
-- version 4.0.9
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 13, 2015 at 02:49 PM
-- Server version: 5.6.14
-- PHP Version: 5.5.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `data_mahasiswa`
--

-- --------------------------------------------------------

--
-- Table structure for table `mahasiswa`
--

CREATE TABLE IF NOT EXISTS `mahasiswa` (
  `nim` varchar(20) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `alamat` text NOT NULL,
  `prodi` varchar(15) NOT NULL,
  PRIMARY KEY (`nim`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mahasiswa`
--

INSERT INTO `mahasiswa` (`nim`, `nama`, `alamat`, `prodi`) VALUES
('01234', 'Rika Dewantari', 'Bali', 'Komsi'),
('04762', 'Rya Meyvriska', 'Temanggung', 'Komsi'),
('06743', 'Kia Asmaradhani', 'Depok', 'Komsi'),
('08712', 'Sarah Rahayu', 'Solo', 'Komsi'),
('09753', 'Dirna Kurnia Dewi', 'Semarang', 'Komsi'),
('4872', 'Rosa Serenita', 'Sleman', 'Komsi'),
('5872', 'Riana Denata', 'Yogyakarta', 'Komsi'),
('9271', 'Selena Tariana', 'Posong', 'Komsi'),
('9823', 'Berlian Ramadhani', 'Wonosobo', 'Komsi');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
