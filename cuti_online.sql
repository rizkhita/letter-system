-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 26, 2018 at 02:48 AM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cuti_online`
--

-- --------------------------------------------------------

--
-- Table structure for table `anggota_bidang`
--

CREATE TABLE `anggota_bidang` (
  `id` int(11) NOT NULL,
  `kode_bidang` varchar(10) NOT NULL,
  `NIP` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `anggota_bidang`
--

INSERT INTO `anggota_bidang` (`id`, `kode_bidang`, `NIP`) VALUES
(8, 'A1', '333'),
(9, 'A1', '444');

-- --------------------------------------------------------

--
-- Table structure for table `bidang`
--

CREATE TABLE `bidang` (
  `id` int(11) NOT NULL,
  `kode_bidang` varchar(10) NOT NULL,
  `nama` varchar(70) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bidang`
--

INSERT INTO `bidang` (`id`, `kode_bidang`, `nama`) VALUES
(5, 'A0', 'Kepala Dinas'),
(4, 'A1', 'infrstruktur'),
(1, 'A2', 'elektronik');

-- --------------------------------------------------------

--
-- Table structure for table `cuti_besar`
--

CREATE TABLE `cuti_besar` (
  `jenis_cuti` varchar(50) NOT NULL,
  `id_pengajuan` int(11) NOT NULL,
  `tgl_pengajuan` date NOT NULL,
  `NIP_pengaju` varchar(20) NOT NULL,
  `alasan_cuti` text NOT NULL,
  `lama_cuti` int(2) NOT NULL,
  `tgl_mulai` date NOT NULL,
  `tgl_selesai` date NOT NULL,
  `alamat` text NOT NULL,
  `provinsi` enum('Jawa Barat','Jawa Tengah','','') NOT NULL,
  `no_tlp` int(15) NOT NULL,
  `sp_dinas` enum('disetujui','ditangguhkan','perubahan','tidak disetujui') DEFAULT NULL,
  `sp_alasan1` text,
  `sp_bkd` enum('disetujui','ditangguhkan','perubahan','tidak disetujui') DEFAULT NULL,
  `sp_alasan2` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cuti_besar`
--

INSERT INTO `cuti_besar` (`jenis_cuti`, `id_pengajuan`, `tgl_pengajuan`, `NIP_pengaju`, `alasan_cuti`, `lama_cuti`, `tgl_mulai`, `tgl_selesai`, `alamat`, `provinsi`, `no_tlp`, `sp_dinas`, `sp_alasan1`, `sp_bkd`, `sp_alasan2`) VALUES
('KAP', 24, '0000-00-00', '456', '', 3, '0000-00-00', '0000-00-00', '', 'Jawa Tengah', 0, NULL, NULL, NULL, NULL),
('KAP', 28, '2018-06-19', '111', 'apa weh', 0, '2018-06-19', '2018-06-19', 'Bandung', 'Jawa Tengah', 34243, NULL, NULL, NULL, NULL),
('KAP', 29, '2018-06-19', '111', 'Bandung', 5, '2018-06-19', '2018-06-19', 'BAnjaran', 'Jawa Tengah', 242, NULL, NULL, NULL, NULL),
('KAP', 30, '0000-00-00', '333', 'vc', 3, '0000-00-00', '0000-00-00', 'eqktj', 'Jawa Tengah', 34, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `cuti_kap`
--

CREATE TABLE `cuti_kap` (
  `jenis_cuti` varchar(50) NOT NULL,
  `id_pengajuan` int(11) NOT NULL,
  `tgl_pengajuan` date NOT NULL,
  `NIP_pengaju` varchar(20) NOT NULL,
  `alasan_cuti` text NOT NULL,
  `lama_cuti` int(11) NOT NULL,
  `tgl_mulai` date NOT NULL,
  `tgl_selesai` date NOT NULL,
  `alamat` text NOT NULL,
  `provinsi` enum('Jawa Barat','Jawa Tengah','','') NOT NULL,
  `no_tlp` varchar(15) NOT NULL,
  `sp_kabid` enum('disetujui','ditangguhkan','perubahan','tidak disetujui') DEFAULT NULL,
  `sp_alasan` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cuti_kap`
--

INSERT INTO `cuti_kap` (`jenis_cuti`, `id_pengajuan`, `tgl_pengajuan`, `NIP_pengaju`, `alasan_cuti`, `lama_cuti`, `tgl_mulai`, `tgl_selesai`, `alamat`, `provinsi`, `no_tlp`, `sp_kabid`, `sp_alasan`) VALUES
('KAP', 5, '2018-05-01', '333', 'skadlka', 2, '2018-05-11', '2018-05-18', 'Bandung', 'Jawa Tengah', '93023', 'disetujui', 'gajasi'),
('KAP', 7, '2018-06-26', '140', 'apaya', 12, '2018-06-26', '2018-06-26', 'sdnmmdas', 'Jawa Barat', '2894418932', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `cuti_lahir`
--

CREATE TABLE `cuti_lahir` (
  `jenis_cuti` varchar(50) NOT NULL,
  `id_pengajuan` int(11) NOT NULL,
  `tgl_pengajuan` date NOT NULL,
  `NIP_pengaju` varchar(20) NOT NULL,
  `alasan_cuti` text NOT NULL,
  `lama_cuti` int(2) NOT NULL,
  `tgl_mulai` date NOT NULL,
  `tgl_selesai` date NOT NULL,
  `alamat` text NOT NULL,
  `provinsi` enum('Jawa Tengah','Jawa Barat','','') NOT NULL,
  `no_tlp` varchar(15) NOT NULL,
  `sp_dinas` enum('disetujui','ditangguhkan','perubahan','tidak disetujui') DEFAULT NULL,
  `sp_alasan1` text,
  `sp_bkd` enum('disetujui','ditangguhkan','perubahan','tidak disetujui') DEFAULT NULL,
  `sp_alasan2` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `cuti_lahir`
--

INSERT INTO `cuti_lahir` (`jenis_cuti`, `id_pengajuan`, `tgl_pengajuan`, `NIP_pengaju`, `alasan_cuti`, `lama_cuti`, `tgl_mulai`, `tgl_selesai`, `alamat`, `provinsi`, `no_tlp`, `sp_dinas`, `sp_alasan1`, `sp_bkd`, `sp_alasan2`) VALUES
('KAP', 4, '8942-10-31', '456', 'uu', 3, '2018-05-12', '0034-12-31', 'fdf', 'Jawa Barat', '321', 'disetujui', '', 'disetujui', ''),
('KAP', 5, '2018-05-04', '456', 'nfdkidfsh', 3, '2018-05-04', '2018-05-18', 'Banjaran', 'Jawa Barat', '13294809148', 'tidak disetujui', '', NULL, NULL),
('KAP', 6, '0000-00-00', '444', 'safjk', 3, '0000-00-00', '0000-00-00', 'eqktj', 'Jawa Tengah', '842948', 'disetujui', '-', 'ditangguhkan', '-'),
('KAP', 7, '2018-05-11', '444', 'hjfgai', 3, '2018-05-02', '2018-05-24', 'fkjf', 'Jawa Tengah', '42847', 'ditangguhkan', '7846128', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `cuti_ltn`
--

CREATE TABLE `cuti_ltn` (
  `jenis_cuti` varchar(50) NOT NULL,
  `id_pengajuan` int(11) NOT NULL,
  `tgl_pengajuan` date NOT NULL,
  `NIP_pengaju` int(11) NOT NULL,
  `alasan_cuti` text NOT NULL,
  `gaji_pokok` varchar(20) NOT NULL,
  `lama_cuti` text NOT NULL,
  `tgl_mulai` date NOT NULL,
  `tgl_selesai` date NOT NULL,
  `alamat` text NOT NULL,
  `provinsi` enum('Jawa Barat','Jawa Tengah','','') NOT NULL,
  `no_tlp` varchar(15) NOT NULL,
  `sp_dinas` enum('disetujui','ditangguhkan','perubahan','tidak disetujui') DEFAULT NULL,
  `sp_alasan1` text,
  `sp_bkd` enum('disetujui','ditangguhkan','perubahan','tidak disetujui') DEFAULT NULL,
  `sp_alasan2` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `cuti_ltn`
--

INSERT INTO `cuti_ltn` (`jenis_cuti`, `id_pengajuan`, `tgl_pengajuan`, `NIP_pengaju`, `alasan_cuti`, `gaji_pokok`, `lama_cuti`, `tgl_mulai`, `tgl_selesai`, `alamat`, `provinsi`, `no_tlp`, `sp_dinas`, `sp_alasan1`, `sp_bkd`, `sp_alasan2`) VALUES
('CLTN', 1, '2018-06-19', 111, 'gimana', '1000.000', '3', '2018-06-11', '2018-06-26', 'hjfisafh', 'Jawa Tengah', '7595', NULL, NULL, NULL, NULL),
('KAP', 3, '2018-06-19', 333, 'Persib tanding', 'Rp.200.000', '3 Bulan', '2018-06-19', '2018-06-19', 'Bandung', 'Jawa Tengah', '0888880', 'ditangguhkan', 'ga meyakinkan', NULL, NULL),
('KAP', 4, '2018-06-19', 456, '6779', '7000000', '5 tahun', '2018-06-19', '2018-07-25', 'Banjaran', 'Jawa Tengah', '902380', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `cuti_sakit`
--

CREATE TABLE `cuti_sakit` (
  `jenis_cuti` varchar(10) NOT NULL,
  `id_pengajuan` int(11) NOT NULL,
  `tgl_pengajuan` date NOT NULL,
  `NIP_pengaju` varchar(20) NOT NULL,
  `alasan_cuti` text NOT NULL,
  `lama_cuti` int(11) NOT NULL,
  `tgl_mulai` date NOT NULL,
  `tgl_selesai` date NOT NULL,
  `alamat` text,
  `provinsi` enum('Jawa Barat','Jawa Tengah','','') NOT NULL,
  `no_tlp` varchar(15) NOT NULL,
  `sp_kabid` enum('disetujui','ditangguhkan','perubahan','tidak disetujui') DEFAULT NULL,
  `sp_alasan` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cuti_sakit`
--

INSERT INTO `cuti_sakit` (`jenis_cuti`, `id_pengajuan`, `tgl_pengajuan`, `NIP_pengaju`, `alasan_cuti`, `lama_cuti`, `tgl_mulai`, `tgl_selesai`, `alamat`, `provinsi`, `no_tlp`, `sp_kabid`, `sp_alasan`) VALUES
('Sakit', 3, '2018-03-01', '333', 'ee', 4, '2018-03-14', '2018-03-07', '', 'Jawa Barat', '099', 'disetujui', 'lama banget bos'),
('Sakit', 8, '2018-03-16', '456', 'ss', 3, '2018-03-03', '2018-03-16', '', 'Jawa Barat', '455', NULL, NULL),
('Sakit', 11, '2018-03-07', '111', 'u', 7, '2018-03-01', '2018-03-27', '', 'Jawa Barat', '098765', NULL, NULL),
('Sakit', 12, '3333-05-04', '333', 'uu', 5, '5555-04-04', '5556-04-04', '', 'Jawa Barat', '7890', 'disetujui', 'tes'),
('Sakit', 13, '2018-04-05', '111', 'uu', 0, '2018-04-18', '8789-06-05', '', 'Jawa Barat', '09897', NULL, NULL),
('Sakit', 14, '3333-03-31', '333', 'vffg', 4, '3333-03-31', '2018-04-27', '', 'Jawa Tengah', '3243', 'ditangguhkan', 'ksjdflakjdf'),
('Sakit', 15, '0033-03-31', '333', 'xxvf', 3, '2222-02-22', '2222-02-22', 'dfs', 'Jawa Barat', '43242', 'disetujui', ''),
('Sakit', 16, '2018-04-12', '456', 'hiuh', 3, '2018-04-10', '2018-04-13', 'hi', 'Jawa Tengah', '789987', NULL, NULL),
('Sakit', 17, '2018-05-25', '333', 'sakit', 3, '2018-05-26', '2018-05-26', 'jalan tamansari 55 ', 'Jawa Barat', '0987654321', 'tidak disetujui', 'tidak ada surat');

-- --------------------------------------------------------

--
-- Table structure for table `cuti_tahunan`
--

CREATE TABLE `cuti_tahunan` (
  `jenis_cuti` varchar(10) NOT NULL,
  `id_pengajuan` int(4) NOT NULL,
  `tgl_pengajuan` date NOT NULL,
  `NIP_pengaju` varchar(20) NOT NULL,
  `alasan_cuti` text NOT NULL,
  `lama_cuti` int(2) NOT NULL,
  `tgl_mulai` date NOT NULL,
  `tgl_selesai` date NOT NULL,
  `alamat` text NOT NULL,
  `provinsi` enum('Jawa Barat','Jawa Tengah','','') NOT NULL,
  `no_tlp` varchar(20) NOT NULL,
  `sp_kabid` enum('disetujui','perubahan','ditangguhkan','tidak disetujui') DEFAULT NULL,
  `sp_alasan` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cuti_tahunan`
--

INSERT INTO `cuti_tahunan` (`jenis_cuti`, `id_pengajuan`, `tgl_pengajuan`, `NIP_pengaju`, `alasan_cuti`, `lama_cuti`, `tgl_mulai`, `tgl_selesai`, `alamat`, `provinsi`, `no_tlp`, `sp_kabid`, `sp_alasan`) VALUES
('Sakit', 1, '2018-06-20', '333', 'apa ya', 2, '2018-06-20', '2018-06-23', 'Bandyng', 'Jawa Tengah', '312894', 'disetujui', 'huh'),
('Sakit', 2, '2018-12-01', '333', 'apasih', 5, '2018-12-31', '2018-06-21', 'Bandung', 'Jawa Tengah', '7887', 'disetujui', '      fdskjghd'),
('Sakit', 3, '2018-06-21', '333', 'trying', 3, '2018-06-21', '2018-06-23', 'Bandung', 'Jawa Tengah', '8095935', 'disetujui', NULL),
('Sakit', 4, '2018-06-21', '333', '', 0, '0000-00-00', '0000-00-00', '', 'Jawa Tengah', '', 'disetujui', NULL),
('Sakit', 5, '2018-06-21', '333', '', 0, '0000-00-00', '0000-00-00', '', 'Jawa Tengah', '', NULL, NULL),
('Tahunan', 11, '2018-06-21', '333', 'sadff', 5, '0000-00-00', '0000-00-00', '', 'Jawa Tengah', '', 'disetujui', 'iya sok');

-- --------------------------------------------------------

--
-- Table structure for table `data_kadin`
--

CREATE TABLE `data_kadin` (
  `id` int(11) NOT NULL,
  `NIP` varchar(20) NOT NULL,
  `posisi` enum('kepala','wakil kepala','','') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `data_kadin`
--

INSERT INTO `data_kadin` (`id`, `NIP`, `posisi`) VALUES
(1, '456', 'kepala'),
(2, '777', 'wakil kepala');

-- --------------------------------------------------------

--
-- Table structure for table `data_pns`
--

CREATE TABLE `data_pns` (
  `id` int(11) NOT NULL,
  `NIP` varchar(20) NOT NULL,
  `nama` varchar(40) NOT NULL,
  `jk` enum('Pria','Wanita') NOT NULL,
  `pangkat_golongan` varchar(10) NOT NULL,
  `pangkat_tmt` date NOT NULL,
  `jabatan_eselon` text NOT NULL,
  `jabatan_tmt` date NOT NULL,
  `masa_kerja` int(2) NOT NULL,
  `jatah_tahunan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `data_pns`
--

INSERT INTO `data_pns` (`id`, `NIP`, `nama`, `jk`, `pangkat_golongan`, `pangkat_tmt`, `jabatan_eselon`, `jabatan_tmt`, `masa_kerja`, `jatah_tahunan`) VALUES
(16, '007', 'Skyfall', 'Wanita', 'V', '2018-06-20', 'endo', '2018-06-19', 3, 0),
(9, '111', 'PPK 1', 'Pria', 'IV', '2018-03-01', 'B', '2018-03-08', 7, 0),
(18, '140', 'Nim dia', 'Pria', 'VI', '2018-06-19', 'Temen doang sih', '2018-06-19', 6, 10),
(10, '222', 'PPK 2', 'Wanita', 'X', '2018-03-28', 'X', '2018-02-28', 6, 0),
(11, '333', 'PNS 1', 'Pria', 'T', '2018-03-02', 'ty', '2018-02-27', 1, 8),
(14, '444', 'PNS2', 'Wanita', 'fskoal', '2018-04-12', 'da', '2018-04-19', 3, 0),
(5, '456', 'aa', 'Wanita', 'bb', '2018-02-06', 'bb', '2018-02-07', 1, 0),
(15, '777', 'Kepala Dinas', 'Pria', '6A', '2018-05-25', '4', '2018-05-25', 4, 0);

-- --------------------------------------------------------

--
-- Table structure for table `data_ppk`
--

CREATE TABLE `data_ppk` (
  `id` int(11) NOT NULL,
  `NIP` varchar(20) NOT NULL,
  `kode_bidang` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `data_ppk`
--

INSERT INTO `data_ppk` (`id`, `NIP`, `kode_bidang`) VALUES
(1, '111', 'A1'),
(2, '222', 'A2'),
(3, '777', 'A0');

-- --------------------------------------------------------

--
-- Table structure for table `login_admin`
--

CREATE TABLE `login_admin` (
  `id_admin` int(11) NOT NULL,
  `NIP` varchar(20) NOT NULL,
  `password` varchar(8) NOT NULL,
  `level` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login_admin`
--

INSERT INTO `login_admin` (`id_admin`, `NIP`, `password`, `level`) VALUES
(1, '456', 'bb', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `login_kadin`
--

CREATE TABLE `login_kadin` (
  `id_kadin` int(11) NOT NULL,
  `NIP` varchar(20) NOT NULL,
  `password` varchar(8) NOT NULL,
  `level` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login_kadin`
--

INSERT INTO `login_kadin` (`id_kadin`, `NIP`, `password`, `level`) VALUES
(2, '777', '7', 'kadin'),
(3, '456', 'ujicoba', 'kadin');

-- --------------------------------------------------------

--
-- Table structure for table `login_pns`
--

CREATE TABLE `login_pns` (
  `id_pns` int(11) NOT NULL,
  `NIP` varchar(20) NOT NULL,
  `password` varchar(8) NOT NULL,
  `level` varchar(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login_pns`
--

INSERT INTO `login_pns` (`id_pns`, `NIP`, `password`, `level`) VALUES
(1, '456', 'aa', 'use'),
(4, '333', '3', 'pns'),
(5, '444', '4', 'pns');

-- --------------------------------------------------------

--
-- Table structure for table `login_ppk`
--

CREATE TABLE `login_ppk` (
  `id_ppk` int(11) NOT NULL,
  `NIP` varchar(20) NOT NULL,
  `password` varchar(8) NOT NULL,
  `level` varchar(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `login_ppk`
--

INSERT INTO `login_ppk` (`id_ppk`, `NIP`, `password`, `level`) VALUES
(2, '111', '1', 'pkk'),
(4, '222', '2', 'pkk'),
(5, '333', 'o', 'pkk');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `anggota_bidang`
--
ALTER TABLE `anggota_bidang`
  ADD UNIQUE KEY `NIP_2` (`NIP`),
  ADD KEY `id_anggota` (`id`),
  ADD KEY `kode_bagian` (`kode_bidang`),
  ADD KEY `NIP` (`NIP`);

--
-- Indexes for table `bidang`
--
ALTER TABLE `bidang`
  ADD PRIMARY KEY (`kode_bidang`),
  ADD UNIQUE KEY `kode_bidang` (`kode_bidang`),
  ADD KEY `id_bidang` (`id`);

--
-- Indexes for table `cuti_besar`
--
ALTER TABLE `cuti_besar`
  ADD PRIMARY KEY (`id_pengajuan`),
  ADD KEY `NIP_pengaju` (`NIP_pengaju`);

--
-- Indexes for table `cuti_kap`
--
ALTER TABLE `cuti_kap`
  ADD PRIMARY KEY (`id_pengajuan`),
  ADD KEY `NIP_pengaju` (`NIP_pengaju`);

--
-- Indexes for table `cuti_lahir`
--
ALTER TABLE `cuti_lahir`
  ADD PRIMARY KEY (`id_pengajuan`),
  ADD KEY `NIP_pengaju` (`NIP_pengaju`);

--
-- Indexes for table `cuti_ltn`
--
ALTER TABLE `cuti_ltn`
  ADD PRIMARY KEY (`id_pengajuan`),
  ADD KEY `NIP_pengaju` (`NIP_pengaju`);

--
-- Indexes for table `cuti_sakit`
--
ALTER TABLE `cuti_sakit`
  ADD PRIMARY KEY (`id_pengajuan`),
  ADD KEY `NIP_pengaju` (`NIP_pengaju`);

--
-- Indexes for table `cuti_tahunan`
--
ALTER TABLE `cuti_tahunan`
  ADD KEY `id_pengajuan` (`id_pengajuan`),
  ADD KEY `NIP_pengaju` (`NIP_pengaju`);

--
-- Indexes for table `data_kadin`
--
ALTER TABLE `data_kadin`
  ADD KEY `id` (`id`),
  ADD KEY `NIP` (`NIP`);

--
-- Indexes for table `data_pns`
--
ALTER TABLE `data_pns`
  ADD PRIMARY KEY (`NIP`),
  ADD KEY `id` (`id`);

--
-- Indexes for table `data_ppk`
--
ALTER TABLE `data_ppk`
  ADD KEY `id` (`id`),
  ADD KEY `kode_bagian` (`kode_bidang`),
  ADD KEY `NIP` (`NIP`);

--
-- Indexes for table `login_admin`
--
ALTER TABLE `login_admin`
  ADD KEY `NIP` (`NIP`),
  ADD KEY `id_admin` (`id_admin`);

--
-- Indexes for table `login_kadin`
--
ALTER TABLE `login_kadin`
  ADD KEY `id_kadin` (`id_kadin`),
  ADD KEY `NIP` (`NIP`);

--
-- Indexes for table `login_pns`
--
ALTER TABLE `login_pns`
  ADD KEY `NIP` (`NIP`),
  ADD KEY `id_pns` (`id_pns`);

--
-- Indexes for table `login_ppk`
--
ALTER TABLE `login_ppk`
  ADD KEY `NIP` (`NIP`),
  ADD KEY `id_pkk` (`id_ppk`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `anggota_bidang`
--
ALTER TABLE `anggota_bidang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `bidang`
--
ALTER TABLE `bidang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `cuti_besar`
--
ALTER TABLE `cuti_besar`
  MODIFY `id_pengajuan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
--
-- AUTO_INCREMENT for table `cuti_kap`
--
ALTER TABLE `cuti_kap`
  MODIFY `id_pengajuan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `cuti_lahir`
--
ALTER TABLE `cuti_lahir`
  MODIFY `id_pengajuan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `cuti_ltn`
--
ALTER TABLE `cuti_ltn`
  MODIFY `id_pengajuan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `cuti_sakit`
--
ALTER TABLE `cuti_sakit`
  MODIFY `id_pengajuan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `cuti_tahunan`
--
ALTER TABLE `cuti_tahunan`
  MODIFY `id_pengajuan` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `data_kadin`
--
ALTER TABLE `data_kadin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `data_pns`
--
ALTER TABLE `data_pns`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `data_ppk`
--
ALTER TABLE `data_ppk`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `login_admin`
--
ALTER TABLE `login_admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `login_kadin`
--
ALTER TABLE `login_kadin`
  MODIFY `id_kadin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `login_pns`
--
ALTER TABLE `login_pns`
  MODIFY `id_pns` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `login_ppk`
--
ALTER TABLE `login_ppk`
  MODIFY `id_ppk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `anggota_bidang`
--
ALTER TABLE `anggota_bidang`
  ADD CONSTRAINT `anggota_bidang_ibfk_1` FOREIGN KEY (`kode_bidang`) REFERENCES `bidang` (`kode_bidang`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `anggota_bidang_ibfk_2` FOREIGN KEY (`NIP`) REFERENCES `data_pns` (`NIP`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `cuti_besar`
--
ALTER TABLE `cuti_besar`
  ADD CONSTRAINT `cuti_besar_ibfk_1` FOREIGN KEY (`NIP_pengaju`) REFERENCES `data_pns` (`NIP`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `cuti_kap`
--
ALTER TABLE `cuti_kap`
  ADD CONSTRAINT `cuti_kap_ibfk_1` FOREIGN KEY (`NIP_pengaju`) REFERENCES `data_pns` (`NIP`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `cuti_lahir`
--
ALTER TABLE `cuti_lahir`
  ADD CONSTRAINT `cuti_lahir_ibfk_1` FOREIGN KEY (`NIP_pengaju`) REFERENCES `data_pns` (`NIP`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `cuti_sakit`
--
ALTER TABLE `cuti_sakit`
  ADD CONSTRAINT `cuti_sakit_ibfk_1` FOREIGN KEY (`NIP_pengaju`) REFERENCES `data_pns` (`NIP`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `cuti_tahunan`
--
ALTER TABLE `cuti_tahunan`
  ADD CONSTRAINT `cuti_tahunan_ibfk_1` FOREIGN KEY (`NIP_pengaju`) REFERENCES `data_pns` (`NIP`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `data_kadin`
--
ALTER TABLE `data_kadin`
  ADD CONSTRAINT `data_kadin_ibfk_1` FOREIGN KEY (`NIP`) REFERENCES `data_pns` (`NIP`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `data_ppk`
--
ALTER TABLE `data_ppk`
  ADD CONSTRAINT `data_ppk_ibfk_1` FOREIGN KEY (`NIP`) REFERENCES `data_pns` (`NIP`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `data_ppk_ibfk_2` FOREIGN KEY (`kode_bidang`) REFERENCES `bidang` (`kode_bidang`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `login_admin`
--
ALTER TABLE `login_admin`
  ADD CONSTRAINT `login_admin_ibfk_1` FOREIGN KEY (`NIP`) REFERENCES `data_pns` (`NIP`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `login_kadin`
--
ALTER TABLE `login_kadin`
  ADD CONSTRAINT `login_kadin_ibfk_1` FOREIGN KEY (`NIP`) REFERENCES `data_pns` (`NIP`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `login_pns`
--
ALTER TABLE `login_pns`
  ADD CONSTRAINT `login_pns_ibfk_1` FOREIGN KEY (`NIP`) REFERENCES `data_pns` (`NIP`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `login_ppk`
--
ALTER TABLE `login_ppk`
  ADD CONSTRAINT `login_ppk_ibfk_1` FOREIGN KEY (`NIP`) REFERENCES `data_pns` (`NIP`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
