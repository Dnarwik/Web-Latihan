-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 06, 2019 at 03:44 AM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.3.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project_psb`
--

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_Login` (IN `userName` VARCHAR(32), IN `passWord` VARCHAR(35))  BEGIN
  SELECT * FROM crud u
  WHERE u.username = userName AND u.password = passWord;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_Login_admin` (IN `userAdmin` VARCHAR(32), IN `passAdmin` VARCHAR(35))  BEGIN
  SELECT * FROM akun u
  WHERE u.NIP = userAdmin AND u.password = passAdmin;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_Login_Siswa` (IN `userName` VARCHAR(32), IN `passWord` VARCHAR(35))  BEGIN
  SELECT * FROM akun u
  WHERE u.NISN = userName AND u.password = passWord;
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `ortu`
--

CREATE TABLE `ortu` (
  `id_ortu` int(20) NOT NULL,
  `id_siswa` varchar(20) NOT NULL,
  `nama_ortu` varchar(20) NOT NULL,
  `pekerjaan_ortu` varchar(45) NOT NULL,
  `alamat_ortu` varchar(60) NOT NULL,
  `nama_wali` varchar(20) NOT NULL,
  `hub_wali` varchar(30) NOT NULL,
  `pekerjaan_wali` varchar(45) NOT NULL,
  `alamat_wali` varchar(60) NOT NULL,
  `no_hp` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `ortu`
--

INSERT INTO `ortu` (`id_ortu`, `id_siswa`, `nama_ortu`, `pekerjaan_ortu`, `alamat_ortu`, `nama_wali`, `hub_wali`, `pekerjaan_wali`, `alamat_wali`, `no_hp`) VALUES
(1, 'S1', 'Nur Efendi', 'Guru', 'Pagak', 'Nur Khairiyah', 'Tante', 'PNS', 'Pagak', '087924821651'),
(2, 'S2', 'Pambudi', 'TNI', 'Magelang', '', 'Adel', 'Polisi', 'Samsat', '087654398216'),
(3, 'S3', 'Bambang', 'PNS', 'Ubeh', '', '', '', '', '087924821465');

-- --------------------------------------------------------

--
-- Table structure for table `sekolah`
--

CREATE TABLE `sekolah` (
  `id_sekolah` int(20) NOT NULL,
  `id_siswa` varchar(20) NOT NULL,
  `nama_sekolah` varchar(40) NOT NULL,
  `kabupaten` varchar(60) NOT NULL,
  `kecamatan` varchar(60) NOT NULL,
  `provinsi` varchar(50) NOT NULL,
  `thn_lulus` varchar(4) NOT NULL,
  `no_ijazah` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `sekolah`
--

INSERT INTO `sekolah` (`id_sekolah`, `id_siswa`, `nama_sekolah`, `kabupaten`, `kecamatan`, `provinsi`, `thn_lulus`, `no_ijazah`) VALUES
(1, 'S1', 'SMPS Jenderal Sudirman', 'Malang', 'Kalipare', 'Jawa Timur', '2017', 736472531),
(2, 'S2', 'SMP Negeri 1 Patebon', 'Kendal', 'Patebon', 'Jawa Tengah', '2016', 872647647),
(3, 'S3', 'SMPS Majalengka', 'Mojokerto', 'Pacet', 'Jawa Timur', '2015', 767357185);

-- --------------------------------------------------------

--
-- Table structure for table `siswa`
--

CREATE TABLE `siswa` (
  `id_siswa` varchar(20) NOT NULL,
  `nama_siswa` varchar(45) NOT NULL,
  `alamat` text NOT NULL,
  `kabupaten` varchar(60) NOT NULL,
  `kecamatan` varchar(45) NOT NULL,
  `provinsi` varchar(45) NOT NULL,
  `jenis_kelamin` char(1) NOT NULL,
  `tempat_lahir` varchar(20) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `agama` varchar(10) NOT NULL,
  `no_hp` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `siswa`
--

INSERT INTO `siswa` (`id_siswa`, `nama_siswa`, `alamat`, `kabupaten`, `kecamatan`, `provinsi`, `jenis_kelamin`, `tempat_lahir`, `tanggal_lahir`, `agama`, `no_hp`) VALUES
('S1', 'Amelia Nur Rahmawati', 'Malang', 'Malang', 'Pagak', 'Jawa Timur', 'P', 'Kendal', '1999-09-10', 'islam', '082331560731'),
('S2', 'M. Fajar Rifaldi', 'Filkom', 'Malang', 'Veteran', 'Jawa Timur', 'L', 'Malang', '1999-08-20', 'Islam', '0897654328177'),
('S3', 'Mei Mukti Wardana', 'Suhat', 'Mojokerto', 'Pacet', 'Jawa Timur', 'L', 'Mojokerto', '1999-05-05', 'islam', '08547265987');

-- --------------------------------------------------------

--
-- Table structure for table `user_admin`
--

CREATE TABLE `user_admin` (
  `id_admin` int(15) NOT NULL,
  `nama_lengkap` varchar(30) NOT NULL,
  `username` varchar(30) DEFAULT NULL,
  `password` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_admin`
--

INSERT INTO `user_admin` (`id_admin`, `nama_lengkap`, `username`, `password`) VALUES
(1, 'Anura Rahmawati', 'Rahmawati', 'Admin'),
(3, 'May Dwilita', 'May', 'Admin1');

-- --------------------------------------------------------

--
-- Table structure for table `user_siswa`
--

CREATE TABLE `user_siswa` (
  `id_user` int(5) NOT NULL,
  `id_siswa` varchar(25) DEFAULT NULL,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `user_siswa`
--

INSERT INTO `user_siswa` (`id_user`, `id_siswa`, `username`, `password`) VALUES
(1, 'S1', 'Amelia', 'Pemweb'),
(2, 'S2', 'Aldi', 'Coba'),
(3, 'S3', 'Dana', 'Dana'),
(4, 'S4', 'Laila', 'Projek'),
(22, 'S5', 'a', 'a');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ortu`
--
ALTER TABLE `ortu`
  ADD PRIMARY KEY (`id_ortu`) USING BTREE,
  ADD KEY `id_siswa` (`id_siswa`) USING BTREE;

--
-- Indexes for table `sekolah`
--
ALTER TABLE `sekolah`
  ADD PRIMARY KEY (`id_sekolah`) USING BTREE,
  ADD KEY `id_siswa` (`id_siswa`) USING BTREE;

--
-- Indexes for table `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`id_siswa`) USING BTREE;

--
-- Indexes for table `user_admin`
--
ALTER TABLE `user_admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `user_siswa`
--
ALTER TABLE `user_siswa`
  ADD PRIMARY KEY (`id_user`) USING BTREE;

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ortu`
--
ALTER TABLE `ortu`
  MODIFY `id_ortu` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `sekolah`
--
ALTER TABLE `sekolah`
  MODIFY `id_sekolah` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `user_admin`
--
ALTER TABLE `user_admin`
  MODIFY `id_admin` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `user_siswa`
--
ALTER TABLE `user_siswa`
  MODIFY `id_user` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `ortu`
--
ALTER TABLE `ortu`
  ADD CONSTRAINT `ortu_ibfk_1` FOREIGN KEY (`id_siswa`) REFERENCES `siswa` (`id_siswa`);

--
-- Constraints for table `sekolah`
--
ALTER TABLE `sekolah`
  ADD CONSTRAINT `sekolah_ibfk_1` FOREIGN KEY (`id_siswa`) REFERENCES `siswa` (`id_siswa`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
