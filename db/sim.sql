-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 15, 2018 at 07:16 PM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 7.2.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sim`
--

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE `barang` (
  `kode_brg` varchar(4) NOT NULL,
  `nama_brg` varchar(10) NOT NULL,
  `stok_brg` int(10) NOT NULL,
  `harga_jual` int(10) NOT NULL,
  `harga_beli` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`kode_brg`, `nama_brg`, `stok_brg`, `harga_jual`, `harga_beli`) VALUES
('B001', 'Asbes', 286, 50000, 40000),
('B002', 'Semen', 960, 45000, 30000),
('B003', 'Cat Tembok', 240, 55000, 40000),
('B004', 'Keramik', 320, 70000, 55000),
('B005', 'Triplek', 490, 35000, 27000),
('B006', 'Cat Kayu', 79, 10000, 50000),
('B007', 'Plat', 55, 100000, 90000);

-- --------------------------------------------------------

--
-- Table structure for table `brg_sementara`
--

CREATE TABLE `brg_sementara` (
  `nama_brg` varchar(20) DEFAULT NULL,
  `stok` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `brg_sementara`
--

INSERT INTO `brg_sementara` (`nama_brg`, `stok`) VALUES
('Asbes', 5),
('Cat Kayu', 5);

-- --------------------------------------------------------

--
-- Table structure for table `cicilan`
--

CREATE TABLE `cicilan` (
  `id_cicilan` varchar(4) NOT NULL,
  `no_nota_jual` varchar(4) NOT NULL,
  `hrg_perccl` int(10) NOT NULL,
  `DP` int(10) NOT NULL,
  `jth_tmpo` date NOT NULL,
  `tenor` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cicilan`
--

INSERT INTO `cicilan` (`id_cicilan`, `no_nota_jual`, `hrg_perccl`, `DP`, `jth_tmpo`, `tenor`) VALUES
('C01', 'NJ01', 250000, 500000, '2019-11-02', 19),
('C02', 'NJ02', 250000, 100000, '2018-06-22', 4),
('C03', 'NJ03', 250000, 250000, '2019-01-11', 10),
('C04', 'NJ04', 250000, 275000, '2019-02-01', 11),
('C05', 'NJ05', 250000, 200000, '2018-10-12', 8);

-- --------------------------------------------------------

--
-- Table structure for table `detail_transaksi_beli`
--

CREATE TABLE `detail_transaksi_beli` (
  `no_nota_beli` varchar(5) NOT NULL,
  `kode_brg` varchar(5) NOT NULL,
  `jmlh_brg_beli` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `detail_transaksi_beli`
--

INSERT INTO `detail_transaksi_beli` (`no_nota_beli`, `kode_brg`, `jmlh_brg_beli`) VALUES
('NB01', 'B001', 200),
('NB02', 'B002', 65),
('NB03', 'B003', 50),
('NB04', 'B004', 100),
('NB05', 'B005', 80),
('NB06', 'B006', 2);

-- --------------------------------------------------------

--
-- Table structure for table `detail_transaksi_jual`
--

CREATE TABLE `detail_transaksi_jual` (
  `no_nota_jual` varchar(5) NOT NULL,
  `kode_brg` varchar(5) NOT NULL,
  `jmlh_brg_jual` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `detail_transaksi_jual`
--

INSERT INTO `detail_transaksi_jual` (`no_nota_jual`, `kode_brg`, `jmlh_brg_jual`) VALUES
('NJ01', 'B001', 50),
('NJ02', 'B002', 100),
('NJ03', 'B003', 35),
('NJ04', 'B004', 75),
('NJ05', 'B005', 100),
('NJ06', 'B006', 2),
('NJ07', 'B007', 10),
('NJ07', 'B002', 10),
('NJ08', 'B006', 5),
('NJ08', 'B003', 3),
('NJ09', 'B001', 10),
('NJ01', 'B003', 10),
('NJ01', 'B005', 10);

-- --------------------------------------------------------

--
-- Table structure for table `kirim`
--

CREATE TABLE `kirim` (
  `no_srt_jln` varchar(4) NOT NULL,
  `no_nota_jual` varchar(4) NOT NULL,
  `nama_kurir` varchar(10) NOT NULL,
  `tgl_kirim` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kirim`
--

INSERT INTO `kirim` (`no_srt_jln`, `no_nota_jual`, `nama_kurir`, `tgl_kirim`) VALUES
('NSJ1', 'NJ01', 'Bowo', '2018-03-02'),
('NSJ2', 'NJ02', 'Bowo', '2018-02-22'),
('NSJ3', 'NJ03', 'Budi', '2018-03-11'),
('NSJ4', 'NJ04', 'Bowo', '2018-03-01'),
('NSJ5', 'NJ05', 'Budi', '2018-02-12');

-- --------------------------------------------------------

--
-- Table structure for table `nota_cicilan`
--

CREATE TABLE `nota_cicilan` (
  `no_nota_ccl` varchar(4) NOT NULL,
  `id_cicilan` varchar(4) NOT NULL,
  `tenor` int(11) NOT NULL,
  `tgl_ccl` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `nota_cicilan`
--

INSERT INTO `nota_cicilan` (`no_nota_ccl`, `id_cicilan`, `tenor`, `tgl_ccl`) VALUES
('NC01', 'C01', 1, '2018-04-15'),
('NC02', 'C02', 2, '2018-04-20'),
('NC03', 'C03', 1, '2018-04-10'),
('NC04', 'C04', 1, '2018-04-25'),
('NC05', 'C05', 2, '2018-04-17'),
('NC06', 'C01', 2, '2018-03-15');

--
-- Triggers `nota_cicilan`
--
DELIMITER $$
CREATE TRIGGER `bayar_cicilan` AFTER INSERT ON `nota_cicilan` FOR EACH ROW BEGIN UPDATE cicilan SET tenor=tenor-1 WHERE id_cicilan = NEW.id_cicilan; END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `pelanggan`
--

CREATE TABLE `pelanggan` (
  `id_plgn` varchar(4) NOT NULL,
  `nama_plgn` varchar(20) NOT NULL,
  `alamat_plgn` varchar(25) NOT NULL,
  `no_hp_plgn` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pelanggan`
--

INSERT INTO `pelanggan` (`id_plgn`, `nama_plgn`, `alamat_plgn`, `no_hp_plgn`) VALUES
('P001', 'Nita', 'JL. Kutisari VIB', '087878889909'),
('P002', 'Danang', 'JL. Waru V/22', '089998888777'),
('P003', 'Rafli', 'JL. Perak Utara 20b', '089876543210'),
('P004', 'Jessica', 'JL. Wonorejo Permai 99', '085754321000'),
('P005', 'Andre', 'JL. Jemursari 101', '081234567890');

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

CREATE TABLE `supplier` (
  `id_supp` varchar(4) NOT NULL,
  `nama_supp` varchar(20) NOT NULL,
  `alamat_supp` varchar(25) NOT NULL,
  `no_hp_supp` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `supplier`
--

INSERT INTO `supplier` (`id_supp`, `nama_supp`, `alamat_supp`, `no_hp_supp`) VALUES
('S001', 'JAYA MAKMUR', 'JL. Kendangsari 100', '085566777888'),
('S002', 'SUMBER REZEKI', 'JL. rungkut Industri V', '081221234567'),
('S003', 'MATERIAL KU', 'JL. Hr.Muhammad 201', '087788899999'),
('S004', 'USAHA JAYA ABADI', 'JL. Keputih 42', '082212345678'),
('S005', 'MULTI CIPTA', 'JL. Panduk VII', '087788777788');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi_beli`
--

CREATE TABLE `transaksi_beli` (
  `no_nota_beli` varchar(4) NOT NULL,
  `id_supp` varchar(4) NOT NULL,
  `jmlh_harga_beli` int(11) NOT NULL,
  `tgl_trsb` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transaksi_beli`
--

INSERT INTO `transaksi_beli` (`no_nota_beli`, `id_supp`, `jmlh_harga_beli`, `tgl_trsb`) VALUES
('NB01', 'S001', 8000000, '2018-03-20'),
('NB02', 'S002', 1950000, '2018-02-03'),
('NB03', 'S003', 2000000, '2018-02-28'),
('NB04', 'S004', 5500000, '2018-02-15'),
('NB05', 'S005', 2160000, '2018-01-30'),
('NB06', 'S001', 80000, '2018-03-12');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi_jual`
--

CREATE TABLE `transaksi_jual` (
  `no_nota_jual` varchar(4) NOT NULL,
  `id_plgn` varchar(4) DEFAULT NULL,
  `jenis_bayar` varchar(10) NOT NULL,
  `kredit` varchar(1) NOT NULL,
  `jmlh_harga_jual` int(10) NOT NULL,
  `dp` int(10) NOT NULL,
  `tgl_trsj` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transaksi_jual`
--

INSERT INTO `transaksi_jual` (`no_nota_jual`, `id_plgn`, `jenis_bayar`, `kredit`, `jmlh_harga_jual`, `dp`, `tgl_trsj`) VALUES
('NJ01', 'P001', 'Cash', 'Y', 5000000, 500000, '2018-03-02'),
('NJ02', 'P002', 'Transfer', 'Y', 1000000, 100000, '2018-02-22'),
('NJ03', 'P003', 'Cash', 'Y', 2500000, 250000, '2018-03-11'),
('NJ04', 'P004', 'Cash', 'Y', 2750000, 275000, '2018-03-01'),
('NJ05', 'P005', 'Cash', 'Y', 2000000, 200000, '2018-02-12'),
('NJ06', 'P001', 'cash', 'T', 100000, 0, '2018-03-28'),
('NJ07', NULL, 'debit', 'T', 1450000, 0, '2018-05-03'),
('NJ08', NULL, 'cash', 'T', 215000, 0, '2018-05-03'),
('NJ09', NULL, 'debit', 'T', 850000, 0, '2018-05-03');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`kode_brg`);

--
-- Indexes for table `cicilan`
--
ALTER TABLE `cicilan`
  ADD PRIMARY KEY (`id_cicilan`),
  ADD KEY `no_nota_jual` (`no_nota_jual`);

--
-- Indexes for table `detail_transaksi_beli`
--
ALTER TABLE `detail_transaksi_beli`
  ADD KEY `no_nota_beli` (`no_nota_beli`),
  ADD KEY `kode_brg` (`kode_brg`);

--
-- Indexes for table `detail_transaksi_jual`
--
ALTER TABLE `detail_transaksi_jual`
  ADD KEY `no_nota_jual` (`no_nota_jual`),
  ADD KEY `kode_brg` (`kode_brg`);

--
-- Indexes for table `kirim`
--
ALTER TABLE `kirim`
  ADD PRIMARY KEY (`no_srt_jln`),
  ADD KEY `no_nota_jual` (`no_nota_jual`);

--
-- Indexes for table `nota_cicilan`
--
ALTER TABLE `nota_cicilan`
  ADD PRIMARY KEY (`no_nota_ccl`),
  ADD KEY `id_cicilan` (`id_cicilan`);

--
-- Indexes for table `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`id_plgn`);

--
-- Indexes for table `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`id_supp`);

--
-- Indexes for table `transaksi_beli`
--
ALTER TABLE `transaksi_beli`
  ADD PRIMARY KEY (`no_nota_beli`),
  ADD KEY `id_supp` (`id_supp`);

--
-- Indexes for table `transaksi_jual`
--
ALTER TABLE `transaksi_jual`
  ADD PRIMARY KEY (`no_nota_jual`),
  ADD KEY `id_plgn` (`id_plgn`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cicilan`
--
ALTER TABLE `cicilan`
  ADD CONSTRAINT `cicilan_ibfk_1` FOREIGN KEY (`no_nota_jual`) REFERENCES `transaksi_jual` (`no_nota_jual`);

--
-- Constraints for table `detail_transaksi_beli`
--
ALTER TABLE `detail_transaksi_beli`
  ADD CONSTRAINT `detail_transaksi_beli_ibfk_1` FOREIGN KEY (`no_nota_beli`) REFERENCES `transaksi_beli` (`no_nota_beli`),
  ADD CONSTRAINT `detail_transaksi_beli_ibfk_2` FOREIGN KEY (`kode_brg`) REFERENCES `barang` (`kode_brg`);

--
-- Constraints for table `detail_transaksi_jual`
--
ALTER TABLE `detail_transaksi_jual`
  ADD CONSTRAINT `detail_transaksi_jual_ibfk_1` FOREIGN KEY (`no_nota_jual`) REFERENCES `transaksi_jual` (`no_nota_jual`),
  ADD CONSTRAINT `detail_transaksi_jual_ibfk_2` FOREIGN KEY (`kode_brg`) REFERENCES `barang` (`kode_brg`);

--
-- Constraints for table `kirim`
--
ALTER TABLE `kirim`
  ADD CONSTRAINT `kirim_ibfk_1` FOREIGN KEY (`no_nota_jual`) REFERENCES `transaksi_jual` (`no_nota_jual`);

--
-- Constraints for table `nota_cicilan`
--
ALTER TABLE `nota_cicilan`
  ADD CONSTRAINT `nota_cicilan_ibfk_1` FOREIGN KEY (`id_cicilan`) REFERENCES `cicilan` (`id_cicilan`);

--
-- Constraints for table `transaksi_beli`
--
ALTER TABLE `transaksi_beli`
  ADD CONSTRAINT `transaksi_beli_ibfk_1` FOREIGN KEY (`id_supp`) REFERENCES `supplier` (`id_supp`);

--
-- Constraints for table `transaksi_jual`
--
ALTER TABLE `transaksi_jual`
  ADD CONSTRAINT `transaksi_jual_ibfk_1` FOREIGN KEY (`id_plgn`) REFERENCES `pelanggan` (`id_plgn`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
