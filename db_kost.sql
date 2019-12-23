-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 15, 2018 at 01:13 PM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 5.6.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_kost`
--

-- --------------------------------------------------------

--
-- Table structure for table `book`
--

CREATE TABLE `book` (
  `id_book` int(11) NOT NULL,
  `id_kost` int(11) NOT NULL,
  `tgl_book` date NOT NULL,
  `tgl_cod` date NOT NULL,
  `username` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `kostan`
--

CREATE TABLE `kostan` (
  `id_kost` int(11) NOT NULL,
  `nama_kost` varchar(20) NOT NULL,
  `pic` varchar(100) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `id_kecamatan` int(11) NOT NULL,
  `kota` varchar(10) NOT NULL,
  `jroom` int(3) DEFAULT NULL,
  `jenis` varchar(20) NOT NULL,
  `harga` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kostan`
--

INSERT INTO `kostan` (`id_kost`, `nama_kost`, `pic`, `alamat`, `id_kecamatan`, `kota`, `jroom`, `jenis`, `harga`) VALUES
(1, 'Kost Hj. Juju', 'themes/boskosan/images/cirebon/juju/1.jpg', 'Kampung Melati Rt.04 Rw. 04 No. 8A Kelurahan Kesambi', 1, 'Cirebon', 6, 'Perempuan', 650000),
(2, 'Wisma Savero', 'themes/boskosan/images/cirebon/savero/1.jpg', 'Jalan Gajah Mada Kesambi Dalam', 1, 'Cirebon', 8, 'Campur', 475000),
(20170101, 'Savero', 'themes/boskosan/images/pic2.jpg', 'jl. kesambi', 0, 'Cirebon', 8, '', 475000);

-- --------------------------------------------------------

--
-- Table structure for table `login_session`
--

CREATE TABLE `login_session` (
  `username` varchar(30) NOT NULL,
  `password` varchar(255) NOT NULL,
  `level` enum('admin','member') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login_session`
--

INSERT INTO `login_session` (`username`, `password`, `level`) VALUES
('admin', '21232f297a57a5a743894a0e4a801fc3', 'admin'),
('alvin', 'b4f945433ea4c369c12741f62a23ccc0', 'admin'),
('alvinb', 'dooms', 'admin'),
('member', 'aa08769cdcb26674c6706093503ff0a3', 'member'),
('uliah', '15170d0508e37303f98390ac2321fc60', 'member');

-- --------------------------------------------------------

--
-- Table structure for table `pengurus`
--

CREATE TABLE `pengurus` (
  `id_pengurus` int(11) NOT NULL,
  `id_kost` int(11) NOT NULL,
  `nama` varchar(20) NOT NULL,
  `email` varchar(20) NOT NULL,
  `no_hp` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pic_room`
--

CREATE TABLE `pic_room` (
  `id_pic` int(11) NOT NULL,
  `id_kost` int(11) NOT NULL,
  `direktori` varchar(50) NOT NULL,
  `keterangan` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pic_room`
--

INSERT INTO `pic_room` (`id_pic`, `id_kost`, `direktori`, `keterangan`) VALUES
(1, 1, 'themes/boskosan/images/cirebon/juju/1.jpg', 'Halaman'),
(2, 1, 'themes/boskosan/images/cirebon/juju/2.jpg', 'Parkir'),
(3, 1, 'themes/boskosan/images/cirebon/juju/3.jpg', 'Tempat Jemur'),
(4, 2, 'themes/boskosan/images/cirebon/savero/1.jpg', 'Halaman'),
(5, 2, 'themes/boskosan/images/cirebon/savero/2.jpg', 'Kamar'),
(6, 2, 'themes/boskosan/images/cirebon/savero/3.jpg', 'Tempat Jemur'),
(7, 2, 'themes/boskosan/images/cirebon/savero/4.jpg', 'Kamar Mandi'),
(10101, 20170101, 'themes/boskosan/images/pic1.jpg', 'Kamar'),
(10102, 20170101, 'themes/boskosan/images/pic.jpg', 'Halaman');

-- --------------------------------------------------------

--
-- Table structure for table `tb_kecamatan`
--

CREATE TABLE `tb_kecamatan` (
  `id_kecamatan` int(11) NOT NULL,
  `kecamatan1` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_kecamatan`
--

INSERT INTO `tb_kecamatan` (`id_kecamatan`, `kecamatan1`) VALUES
(1, 'Kesambi'),
(2, 'KarangJalak'),
(3, 'Kejaksan');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `username` varchar(30) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(20) NOT NULL,
  `no_ktp` varchar(30) NOT NULL,
  `no_hp` varchar(20) NOT NULL,
  `nama` varchar(20) NOT NULL,
  `foto` varchar(255) NOT NULL,
  `level` enum('Admin','Member','Pengurus') NOT NULL,
  `last_login` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`username`, `password`, `email`, `no_ktp`, `no_hp`, `nama`, `foto`, `level`, `last_login`) VALUES
('adminbos', 'b4f945433ea4c369c12741f62a23ccc0', 'admin1@gmail.com', '200133241', '0874232', 'Alvin Admin', 'photos/alvin.jpg', 'Admin', '2018-04-12'),
('adminmain', 'b4f945433ea4c369c12741f62a23ccc0', 'asd', '132', '123', 'domang', '', 'Admin', '2018-04-11'),
('alvin123', 'b4f945433ea4c369c12741f62a23ccc0', 'alvin2@gmail.com', '2010303020020', '0291929129', 'Alvin Basrah', '', 'Member', '2018-04-11'),
('uli', '39d86357f0226774c44aa6b0bb8f9869', 'faoziahuli@gmail.com', '090312', '082321113280', 'Faoziah Uliah Nur''ae', '', 'Member', '0000-00-00'),
('wisma1', 'b4f945433ea4c369c12741f62a23ccc0', 'wisma1@gmail.com', '123123123', '123123123', 'Muljaya', '', 'Pengurus', '2018-04-11');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `book`
--
ALTER TABLE `book`
  ADD PRIMARY KEY (`id_book`);

--
-- Indexes for table `kostan`
--
ALTER TABLE `kostan`
  ADD PRIMARY KEY (`id_kost`);

--
-- Indexes for table `login_session`
--
ALTER TABLE `login_session`
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `pengurus`
--
ALTER TABLE `pengurus`
  ADD PRIMARY KEY (`id_pengurus`);

--
-- Indexes for table `pic_room`
--
ALTER TABLE `pic_room`
  ADD PRIMARY KEY (`id_pic`);

--
-- Indexes for table `tb_kecamatan`
--
ALTER TABLE `tb_kecamatan`
  ADD PRIMARY KEY (`id_kecamatan`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`username`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
