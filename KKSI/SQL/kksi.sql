-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 05, 2020 at 07:53 AM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kksi`
--

-- --------------------------------------------------------

--
-- Table structure for table `pengajuan`
--

CREATE TABLE `pengajuan` (
  `id_pengajuan` int(11) NOT NULL,
  `id_perusahaan` int(11) NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pengajuan`
--

INSERT INTO `pengajuan` (`id_pengajuan`, `id_perusahaan`, `id_user`) VALUES
(130, 3, 32),
(131, 6, 33),
(145, 4, 19),
(153, 4, 57),
(154, 3, 58),
(155, 3, 59),
(156, 3, 60);

-- --------------------------------------------------------

--
-- Table structure for table `perusahaan`
--

CREATE TABLE `perusahaan` (
  `id_perusahaan` int(11) NOT NULL,
  `nama_perusahaan` varchar(50) NOT NULL,
  `kategori_perusahaan` varchar(50) NOT NULL,
  `waktu_perusahaan` varchar(50) NOT NULL,
  `alamat` varchar(150) NOT NULL,
  `quota` int(11) NOT NULL,
  `deskripsi` varchar(150) NOT NULL,
  `pembingbing_perusahaan` varchar(50) NOT NULL,
  `img` varchar(400) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `perusahaan`
--

INSERT INTO `perusahaan` (`id_perusahaan`, `nama_perusahaan`, `kategori_perusahaan`, `waktu_perusahaan`, `alamat`, `quota`, `deskripsi`, `pembingbing_perusahaan`, `img`) VALUES
(3, 'PT Hino Motor', 'Pabrik', 'Senin Rabu, 07.00-17.00', 'Jalan BIC no.25 kec.bungursari,kab.purwakarta', 2, 'Merancang atribut motor', 'Komarudin   ', 'hino.jpg'),
(4, 'PT Pupuk Kujang', 'pabrik', 'Senin-Jumaat, 05.00-18.00', 'Jalan BIC NO.90 Kec.bungursari Kab.purwakrta', 10, 'Membantu Mengemas pupuk', 'Asep Mustofa  ', 'pupuk.jpg'),
(5, 'Pemerintahan Bungursari', 'Instasi Masyarakat', 'Senin-jumaat, 08.00-14.00', 'Desa Bungursari 009', 5, 'Mengenai Ms.word Dan Ms.Ecxel', 'Jejen Firmasnyah    ', 'pwk.jpg'),
(6, 'PT Astra Honda Motor', 'Pabrik', 'Senin-jumaat,10.00-14.00', 'jln KIC no.33 Kab.karawang', 5, 'membantu Merakit Sepeda motor', 'Pa agustyawan    ', 'honda.png'),
(24, 'PT yamaha Indonesia', 'pabrik', 'sabtu-minggu, 08.00-14.00', 'jln BIC no.70 kab,purwakarta', 0, 'memasang atribut motor', 'Bu Restiana ', 'yamaha.jpg'),
(29, 'PT AQUA', 'pabrik', 'senin-jumat, 07.00-14.00', 'jln BIC no.70 kab,purwakarta', 10, 'Mengemas barang\r\n', 'andi', 'pin.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `nama_lengkap` varchar(150) NOT NULL,
  `jk` varchar(50) NOT NULL,
  `level` enum('Admin','Member') NOT NULL,
  `kelas` varchar(50) NOT NULL,
  `status_role` varchar(50) NOT NULL,
  `jurusan` varchar(50) NOT NULL,
  `dari_tanggal` varchar(40) NOT NULL,
  `sampai_tanggal` varchar(40) NOT NULL,
  `img` varchar(100) NOT NULL,
  `pesan` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `nama`, `password`, `nama_lengkap`, `jk`, `level`, `kelas`, `status_role`, `jurusan`, `dari_tanggal`, `sampai_tanggal`, `img`, `pesan`) VALUES
(1, 'developer', '123', 'developer Sans', 'laki-laki', 'Admin', 'X', 'Ini Admin', 'Relayasa Perangkat Lunak', '', '', '', ''),
(19, 'jojo', '123', 'jojogans', 'laki-laki', 'Member', 'X', 'pending', 'Rekayasa Perangkat Lunak', 'Belum di tentukan', 'Belum di tentukan', '', ''),
(32, 'kaka', '123', 'kaka utama', 'laki-laki', 'Member', 'X', 'sukses', 'Rekayasa Perangkat Lunak', '2020-11-23', '2021-02-23', '', 'selesai'),
(33, 'jovanka', '123', 'jovanka Alexxand', 'perempuan', 'Member', 'X', 'proses', 'Teknik bisnis Sepeda Motor', '2020-11-21', '2021-01-21', '', 'Belum ada pesan'),
(34, 'hubin', '123', 'admin-baru', 'Laki-laki', 'Admin', 'tidak ada', 'Ini Admin', 'tidak ada', 'tidak ada', 'tidak ada', 'tidak ada', 'tidak ada'),
(38, 'admin', '123', 'admin smk', 'Laki-laki', 'Admin', 'tidak ada', 'Ini Admin', 'tidak ada', 'tidak ada', 'tidak ada', 'tidak ada', 'tidak ada'),
(57, 'riska', '123', 'Riska Aini', 'perempuan', 'Member', 'X', 'pending', 'Rekayasa Perangkat Lunak', 'Belum di tentukan', 'belum di tentukan', '', 'Belum ada pesan'),
(58, 'andika', '123', 'Andika Purnama', 'laki-laki', 'Member', 'X', 'proses', 'Rekayasa Perangkat Lunak', 'belum di tentukan', 'Belum di tentukan', '', 'Belum ada pesan'),
(59, 'bagus', '123', 'Bagus Yoga', 'laki-laki', 'Member', 'XI', 'sukses', 'Rekayasa Perangkat Lunak', '15-12-2020', '15-02-2021', '', 'selesai'),
(60, 'leman', '123', 'Leman Maulana', 'laki-laki', 'Member', 'XI', 'sukses', 'Rekayasa Perangkat Lunak', '15-12-2020', '15-02-2021', '', 'selesai');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `pengajuan`
--
ALTER TABLE `pengajuan`
  ADD PRIMARY KEY (`id_pengajuan`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_perusahaan` (`id_perusahaan`);

--
-- Indexes for table `perusahaan`
--
ALTER TABLE `perusahaan`
  ADD PRIMARY KEY (`id_perusahaan`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `pengajuan`
--
ALTER TABLE `pengajuan`
  MODIFY `id_pengajuan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=157;

--
-- AUTO_INCREMENT for table `perusahaan`
--
ALTER TABLE `perusahaan`
  MODIFY `id_perusahaan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `pengajuan`
--
ALTER TABLE `pengajuan`
  ADD CONSTRAINT `pengajuan_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`),
  ADD CONSTRAINT `pengajuan_ibfk_2` FOREIGN KEY (`id_perusahaan`) REFERENCES `perusahaan` (`id_perusahaan`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
