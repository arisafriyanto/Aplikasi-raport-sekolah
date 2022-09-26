-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Feb 15, 2020 at 05:37 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `_raport`
--

-- --------------------------------------------------------

--
-- Table structure for table `data_nilai_siswa`
--

CREATE TABLE `data_nilai_siswa` (
  `id_data_ns` int(11) NOT NULL,
  `nis` varchar(100) NOT NULL,
  `kode_siswa` varchar(100) NOT NULL,
  `nama_siswa` varchar(100) NOT NULL,
  `kelas` varchar(50) NOT NULL,
  `nama_kelas` varchar(100) NOT NULL,
  `nama_walikelas` varchar(100) NOT NULL,
  `tahun_ajaran` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `guru`
--

CREATE TABLE `guru` (
  `id_guru` int(11) NOT NULL,
  `kode_guru` varchar(100) NOT NULL,
  `nip` varchar(50) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `nama_guru` varchar(100) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `telepon` varchar(100) NOT NULL,
  `jenis_kelamin` enum('L','P') NOT NULL,
  `foto_guru` varchar(100) NOT NULL,
  `status` enum('Aktif','Tidak Aktif') NOT NULL,
  `level` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `guru`
--

INSERT INTO `guru` (`id_guru`, `kode_guru`, `nip`, `username`, `password`, `nama_guru`, `alamat`, `telepon`, `jenis_kelamin`, `foto_guru`, `status`, `level`) VALUES
(1, 'G0001', '8475637283647593', 'faisal okie', '$2y$10$h/9E.1q2Gd5t8TUGtm68K.cdu/IeHyb/zfCSIXoJR/NQvHMO5jZMe', 'Faisal Okie', 'Greenthink', '089574856273', 'L', '5e41c9cbed106.jpg', 'Aktif', 'guru'),
(2, 'G0002', '8584736482637452', 'nur chikmah', '$2y$10$MKI6rLxalRxj9F.pgL50hutil1dW0.VwAe8AzrpTzptI3FE5IqokG', 'Nur Chikmah', 'Ketanggungan', '085783638291', 'P', '5e41ca02da9ea.jfif', 'Aktif', 'guru'),
(3, 'G0003', '9584746374839483', 'soni', '$2y$10$O13rRD2dxyg8Oi1ibcVjBeAkQoqkQQc1K4Ux.w232woOlKfHjncWu', 'Soni', 'Kemurang', '087864537283', 'L', '5e41ca3b06e4d.png', 'Aktif', 'guru'),
(4, 'G0004', '8595746374837462', 'nurma', '$2y$10$qEaxa4cWavuo8.vqmDjsC.ziP3sW979iErCDeKGId3vwAh1BNUhMS', 'Nurma', 'Ketanggungan', '087884745263', 'P', '5e41ca6b00598.jpg', 'Aktif', 'guru');

-- --------------------------------------------------------

--
-- Table structure for table `kelas`
--

CREATE TABLE `kelas` (
  `id_kelas` int(11) NOT NULL,
  `kode_kelas` varchar(100) NOT NULL,
  `tahun_ajaran` varchar(100) NOT NULL,
  `nama_kelas` enum('X','XI','XII') NOT NULL,
  `kelas` varchar(100) NOT NULL,
  `nama_walikelas` varchar(100) NOT NULL,
  `status` enum('Aktif','Tidak Aktif') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kelas`
--

INSERT INTO `kelas` (`id_kelas`, `kode_kelas`, `tahun_ajaran`, `nama_kelas`, `kelas`, `nama_walikelas`, `status`) VALUES
(1, 'K0001', '2019/2020', 'XII', 'TKJ3', 'Nur Chikmah', 'Aktif'),
(2, 'K0002', '2019/2020', 'XI', 'TKR1', 'Soni', 'Aktif'),
(3, 'K0003', '2019/2020', 'XI', 'TKJ3', 'Faisal Okie', 'Aktif'),
(4, 'K0004', '2019/2020', 'XI', 'TKJ1', 'Nurma', 'Aktif');

-- --------------------------------------------------------

--
-- Table structure for table `kelas_siswa`
--

CREATE TABLE `kelas_siswa` (
  `id_dk` int(11) NOT NULL,
  `kode_data_siswa` varchar(100) NOT NULL,
  `nis` int(100) NOT NULL,
  `kode_siswa` varchar(100) NOT NULL,
  `nama_kelas` varchar(100) NOT NULL,
  `kelas` varchar(100) NOT NULL,
  `tahun_ajaran` varchar(100) NOT NULL,
  `nama_siswa` varchar(100) NOT NULL,
  `status` enum('Aktif','Tidak Aktif') NOT NULL,
  `walikelas` varchar(100) NOT NULL,
  `jurusan` enum('Aphp','Akutansi','Teknik Kendaraan Ringan','Teknik Komputer Dan Jaringan','Teknik Sepeda Motor') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kelas_siswa`
--

INSERT INTO `kelas_siswa` (`id_dk`, `kode_data_siswa`, `nis`, `kode_siswa`, `nama_kelas`, `kelas`, `tahun_ajaran`, `nama_siswa`, `status`, `walikelas`, `jurusan`) VALUES
(1, 'DK0001', 8957489, 'S0001', 'TKJ3', 'XII', '2019/2020', 'Afifah Khoirunisa', 'Aktif', 'Nur Chikmah', 'Teknik Komputer Dan Jaringan'),
(2, 'DK0002', 8957463, 'S0002', 'TKR1', 'XI', '2019/2020', 'Dika Ramadhan', 'Aktif', 'Soni', 'Teknik Kendaraan Ringan'),
(3, 'DK0003', 8756453, 'S0003', 'TKJ3', 'XI', '2019/2020', 'Silviana', 'Aktif', 'Faisal Okie', 'Teknik Komputer Dan Jaringan');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `level` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`id`, `username`, `nama`, `password`, `level`) VALUES
(1, 'aris afriyanto', 'aris afriyanto', '$2y$10$bALgu9BgFqWGa1GY9aevb.7GrWRvevVAhvGw7pBiWHba1bV2V5eYS', 'admin'),
(2, 'alfiyah', 'alfiyah Khaerunnisa', '$2y$10$utvZdiiSt/MxezPOa5MG7uo80R5uL8QKxMqhO4RiM.YsZxFB4J0s2', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `mapel`
--

CREATE TABLE `mapel` (
  `id_mapel` int(11) NOT NULL,
  `kode_pelajaran` varchar(100) NOT NULL,
  `nama_mapel` varchar(100) NOT NULL,
  `keterangan` enum('Wajib','Tambahan','','') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mapel`
--

INSERT INTO `mapel` (`id_mapel`, `kode_pelajaran`, `nama_mapel`, `keterangan`) VALUES
(1, 'P0001', 'Matematika', 'Wajib'),
(2, 'P0002', 'Belajar Laravel', 'Tambahan'),
(3, 'P0003', 'Pendidikan Agama Islam', 'Wajib'),
(4, 'P0004', 'Administrasi Jaringan', 'Wajib'),
(5, 'P0005', 'Fisika', 'Wajib'),
(6, 'P0006', 'Bahasa Indonesia', 'Wajib'),
(7, 'P0007', 'Bahasa Inggris', 'Wajib'),
(8, 'P0008', 'Bahasa Jepang', 'Wajib'),
(9, 'P0009', 'Kimia', 'Wajib'),
(10, 'P0010', 'Biologi', 'Wajib'),
(11, 'P0011', 'Sistem Komputer', 'Wajib'),
(12, 'P0012', 'Sejarah', 'Wajib'),
(13, 'P0013', 'Desain Grafis', 'Wajib'),
(14, 'P0014', 'Simulasi Digital', 'Wajib'),
(15, 'P0015', 'Bahasa Jawa', 'Wajib');

-- --------------------------------------------------------

--
-- Table structure for table `nilai`
--

CREATE TABLE `nilai` (
  `id_nilai` int(11) NOT NULL,
  `nama_siswa` varchar(100) NOT NULL,
  `semester` enum('1','2') NOT NULL,
  `pelajaran` varchar(100) NOT NULL,
  `nilai_tugas_1` int(11) NOT NULL,
  `nilai_tugas_2` int(11) NOT NULL,
  `nilai_tugas_3` int(11) NOT NULL,
  `nilai_uts` int(11) NOT NULL,
  `nilai_uas` int(11) NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `nilai`
--

INSERT INTO `nilai` (`id_nilai`, `nama_siswa`, `semester`, `pelajaran`, `nilai_tugas_1`, `nilai_tugas_2`, `nilai_tugas_3`, `nilai_uts`, `nilai_uas`, `keterangan`) VALUES
(1, 'Afifah Khoirunisa', '1', 'Matematika', 87, 87, 98, 78, 78, 'pinter'),
(2, 'Afifah Khoirunisa', '1', 'Pendidikan Agama Islam', 86, 67, 98, 87, 67, 'goblog'),
(3, 'Afifah Khoirunisa', '1', 'Administrasi Jaringan', 87, 78, 87, 76, 78, 'mayan'),
(4, 'Dika Ramadhan', '1', 'Matematika', 75, 76, 78, 76, 88, 'mayan'),
(5, 'Silviana', '1', 'Bahasa Indonesia', 96, 78, 87, 83, 75, 'pinter'),
(6, 'Dika Ramadhan', '1', 'Pendidikan Agama Islam', 78, 87, 86, 76, 78, 'mayan');

-- --------------------------------------------------------

--
-- Table structure for table `siswa`
--

CREATE TABLE `siswa` (
  `id_siswa` int(100) NOT NULL,
  `kode_siswa` varchar(100) NOT NULL,
  `nis` varchar(50) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `nama_siswa` varchar(100) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `tempat_lahir` varchar(100) NOT NULL,
  `telepon` varchar(50) NOT NULL,
  `jenis_kelamin` enum('L','P') NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `agama` enum('Islam','Kristen','Khatolik','Budha','Konghucu') NOT NULL,
  `tahun_angkatan` varchar(100) NOT NULL,
  `foto_siswa` varchar(100) NOT NULL,
  `status` enum('Aktif','Tidak Aktif') NOT NULL,
  `level` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `siswa`
--

INSERT INTO `siswa` (`id_siswa`, `kode_siswa`, `nis`, `username`, `password`, `nama_siswa`, `alamat`, `tempat_lahir`, `telepon`, `jenis_kelamin`, `tanggal_lahir`, `agama`, `tahun_angkatan`, `foto_siswa`, `status`, `level`) VALUES
(1, 'S0001', '8957489', 'afifah', '$2y$10$4R9CsixOOc/T7miM6Fdp/.b7W1h5FSeRc03ByjLAKPMb7AJnmnWM6', 'Afifah Khoirunisa', 'Greenthink', 'Brebes', '089562736251', 'P', '2001-02-02', 'Islam', '2019/2020', '5e41c8fd955b4.jpg', 'Aktif', 'siswa'),
(2, 'S0002', '8957463', 'dika ramadhan', '$2y$10$FQ1BAm4jKWjAqZJ2KqnoDughH30H979y/aRVb75JIbwIXpYQiB52O', 'Dika Ramadhan', 'Bulusari', 'Brebes', '089563726384', 'L', '2001-09-08', 'Islam', '2019/2020', '5e41c948dc8c2.png', 'Aktif', 'siswa'),
(3, 'S0003', '8756453', 'silviana', '$2y$10$oxS5KfYXeIISWSIsGL3LcuhcqbdMotRopVhqbOmgbqwUZHR19G0m.', 'Silviana', 'Rancawuluh', 'Tangerang', '089573618294', 'L', '2000-08-07', 'Islam', '2019/2020', '5e41c9919dae9.jpg', 'Aktif', 'siswa'),
(4, 'S0004', '89775676', 'aminah', '$2y$10$IHxdz.GRtAdHKgbVzUmxUeax4FP6Uta1SbDyed6txiQfw03fokabK', 'Aminah', 'Karang Malang', 'Brebes', '089563736485', 'P', '2000-09-08', 'Islam', '2019/2020', '5e44da566af6c.jfif', 'Aktif', 'siswa');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `data_nilai_siswa`
--
ALTER TABLE `data_nilai_siswa`
  ADD PRIMARY KEY (`id_data_ns`);

--
-- Indexes for table `guru`
--
ALTER TABLE `guru`
  ADD PRIMARY KEY (`id_guru`);

--
-- Indexes for table `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`id_kelas`);

--
-- Indexes for table `kelas_siswa`
--
ALTER TABLE `kelas_siswa`
  ADD PRIMARY KEY (`id_dk`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mapel`
--
ALTER TABLE `mapel`
  ADD PRIMARY KEY (`id_mapel`);

--
-- Indexes for table `nilai`
--
ALTER TABLE `nilai`
  ADD PRIMARY KEY (`id_nilai`);

--
-- Indexes for table `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`id_siswa`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `data_nilai_siswa`
--
ALTER TABLE `data_nilai_siswa`
  MODIFY `id_data_ns` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `guru`
--
ALTER TABLE `guru`
  MODIFY `id_guru` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `kelas`
--
ALTER TABLE `kelas`
  MODIFY `id_kelas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `kelas_siswa`
--
ALTER TABLE `kelas_siswa`
  MODIFY `id_dk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `mapel`
--
ALTER TABLE `mapel`
  MODIFY `id_mapel` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `nilai`
--
ALTER TABLE `nilai`
  MODIFY `id_nilai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `siswa`
--
ALTER TABLE `siswa`
  MODIFY `id_siswa` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
