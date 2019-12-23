--
-- Database: `boskos`
--

-- --------------------------------------------------------

--
-- Table structure for table `fasilitas`
--

CREATE TABLE `fasilitas` (
  `id` int(11) NOT NULL,
  `id_room` int(11) NOT NULL,
  `fas_kam` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `fasilitas`
--

INSERT INTO `fasilitas` (`id`, `id_room`, `fas_kam`) VALUES
(27, 30, 'fa fa-server, fa fa-life-ring, fa fa-bath');

-- --------------------------------------------------------

--
-- Table structure for table `kecamatan`
--

CREATE TABLE `kecamatan` (
  `id` int(11) NOT NULL,
  `id_kota` int(11) NOT NULL,
  `nama_kecamatan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kecamatan`
--

INSERT INTO `kecamatan` (`id`, `id_kota`, `nama_kecamatan`) VALUES
(1, 1, 'Kesambi'),
(2, 1, 'Kejaksan'),
(3, 1, 'Harjamukti'),
(4, 1, 'Pekalipan'),
(5, 1, 'Lemahwungkuk'),
(6, 2, 'Sumber'),
(7, 2, 'Arjawinangun'),
(8, 2, 'Astanajapura');

-- --------------------------------------------------------

--
-- Table structure for table `kostan`
--

CREATE TABLE `kostan` (
  `id` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `nama_kost` varchar(50) NOT NULL,
  `id_kecamatan` int(11) NOT NULL,
  `id_kota` int(11) NOT NULL,
  `jroom` int(11) NOT NULL,
  `jenis` enum('campur','perempuan') NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `foto_kos` varchar(100) NOT NULL,
  `foto_halaman` varchar(100) NOT NULL,
  `foto_parkir` varchar(100) NOT NULL,
  `r_kosong` int(11) NOT NULL,
  `fas_kos` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kostan`
--

INSERT INTO `kostan` (`id`, `username`, `nama_kost`, `id_kecamatan`, `id_kota`, `jroom`, `jenis`, `alamat`, `foto_kos`, `foto_halaman`, `foto_parkir`, `r_kosong`, `fas_kos`) VALUES
(23, 'tespeng', 'Wisma Savero', 1, 1, 1, 'campur', 'Jalan Harapan/Gajahmada', 'asset/picture/coba/file_imgs_122.jpg', 'asset/picture/coba/file_imgs_123.jpg', 'asset/picture/coba/file_imgs_124.jpg', 1, 'Halaman, Parkir Motor');

-- --------------------------------------------------------

--
-- Table structure for table `room`
--

CREATE TABLE `room` (
  `id` int(11) NOT NULL,
  `id_kosan` int(11) NOT NULL,
  `nomor_kamar` varchar(50) NOT NULL,
  `keterangan` varchar(20) NOT NULL,
  `harga` int(11) NOT NULL,
  `status` enum('1','0') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `room`
--

INSERT INTO `room` (`id`, `id_kosan`, `nomor_kamar`, `keterangan`, `harga`, `status`) VALUES
(30, 23, 'Nomor 1', 'Bersih', 450000, '1');

-- --------------------------------------------------------

--
-- Table structure for table `room_pic`
--

CREATE TABLE `room_pic` (
  `id` int(11) NOT NULL,
  `id_room` int(11) NOT NULL,
  `depan_kamar` varchar(255) NOT NULL,
  `kamar` varchar(255) NOT NULL,
  `kamar_mandi` varchar(255) NOT NULL,
  `view_luar` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `room_pic`
--

INSERT INTO `room_pic` (`id`, `id_room`, `depan_kamar`, `kamar`, `kamar_mandi`, `view_luar`) VALUES
(26, 30, 'asset/picture/coba/file_imgs_125.jpg', 'asset/picture/coba/file_imgs_126.jpg', 'asset/picture/coba/file_imgs_127.jpg', 'asset/picture/coba/file_imgs_128.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `id` int(11) NOT NULL,
  `id_pesan` int(11) NOT NULL,
  `tgl_trans` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `fasilitas`
--
ALTER TABLE `fasilitas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kecamatan`
--
ALTER TABLE `kecamatan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kostan`
--
ALTER TABLE `kostan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `room`
--
ALTER TABLE `room`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `room_pic`
--
ALTER TABLE `room_pic`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `fasilitas`
--
ALTER TABLE `fasilitas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
--
-- AUTO_INCREMENT for table `kecamatan`
--
ALTER TABLE `kecamatan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `kostan`
--
ALTER TABLE `kostan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
--
-- AUTO_INCREMENT for table `room`
--
ALTER TABLE `room`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
--
-- AUTO_INCREMENT for table `room_pic`
--
ALTER TABLE `room_pic`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
