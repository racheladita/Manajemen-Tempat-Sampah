-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 11, 2019 at 07:08 PM
-- Server version: 10.1.28-MariaDB
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
-- Database: `db_bu`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_bu`
--

CREATE TABLE `tbl_bu` (
  `nama_BU` varchar(100) NOT NULL,
  `alamat_BU` varchar(100) NOT NULL,
  `telepon_BU` varchar(100) NOT NULL,
  `tipe_BU` varchar(100) NOT NULL,
  `longitude_BU` varchar(100) NOT NULL,
  `latitude_BU` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_bu`
--

INSERT INTO `tbl_bu` (`nama_BU`, `alamat_BU`, `telepon_BU`, `tipe_BU`, `longitude_BU`, `latitude_BU`) VALUES
('Tempat Sampah 1', 'FSM', '024-962915', 'tempat sampah', '-7.048841', '110.442136'),
('Tempat Sampah 2', 'Widya Puraya', '024-729351', 'tempat sampah', '-7.049108', '110.438238');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
