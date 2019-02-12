-- phpMyAdmin SQL Dump
-- version 4.4.12
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 15 Feb 2018 pada 08.00
-- Versi Server: 5.6.25
-- PHP Version: 5.6.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_mini_quick_book`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_barang`
--

CREATE TABLE IF NOT EXISTS `tbl_barang` (
  `kd_barang` int(20) NOT NULL,
  `deskripsi_barang` text NOT NULL,
  `spesifikasi_barang` text NOT NULL,
  `stock` varchar(10) NOT NULL,
  `hrg_modal` decimal(20,0) NOT NULL,
  `hrg_jual` decimal(20,0) NOT NULL,
  `diskon` varchar(10) NOT NULL,
  `status` enum('1','0') NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_barang`
--

INSERT INTO `tbl_barang` (`kd_barang`, `deskripsi_barang`, `spesifikasi_barang`, `stock`, `hrg_modal`, `hrg_jual`, `diskon`, `status`) VALUES
(12, 'dede', 'dada', '1111', '100', '500', '0', '1'),
(987, 'qwqw', 'qwqw', '0', '99', '99', '0', '1'),
(123789, 'xaxa', 'xaxa', '1', '1', '1', '1', '0'),
(12341234, 'sasa', 'sasa', '0', '2', '2', '2', '1');

--
-- Trigger `tbl_barang`
--
DELIMITER $$
CREATE TRIGGER `after_insert` AFTER INSERT ON `tbl_barang`
 FOR EACH ROW INSERT INTO tbl_log (ket, user, new_data)
VALUES (CONCAT('insert data ke tbl_barang, kd_barang = ',NEW.kd_barang), USER(), CONCAT('Kode Barang : ',NEW.kd_barang ,'<br> Deskripsi Barang : ',NEW.deskripsi_barang,'<br> Spesifikasi Barang : ',NEW.spesifikasi_barang,'<br> Stock : ',NEW.stock,'<br> Harga Modal : ',NEW.hrg_modal,'<br> Harga Jual : ',NEW.hrg_jual,'<br> Diskon : ',NEW.diskon,'<br> Status : ',NEW.status))
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `after_update` AFTER UPDATE ON `tbl_barang`
 FOR EACH ROW INSERT INTO tbl_log (ket, user, old_data, new_data)
VALUES (CONCAT('Update data ke tbl_barang, kd_barang = ',NEW.kd_barang), USER(),CONCAT('Kode Barang : ',old.kd_barang ,'<br> Deskripsi Barang : ',old.deskripsi_barang,'<br> Spesifikasi Barang : ',old.spesifikasi_barang,'<br> Stock : ',old.stock,'<br> Harga Modal : ',old.hrg_modal,'<br> Harga Jual : ',old.hrg_jual,'<br> Diskon : ',old.diskon,'<br> Status : ',old.status), CONCAT('Kode Barang : ',NEW.kd_barang ,'<br> Deskripsi Barang : ',NEW.deskripsi_barang,'<br> Spesifikasi Barang : ',NEW.spesifikasi_barang,'<br> Stock : ',NEW.stock,'<br> Harga Modal : ',NEW.hrg_modal,'<br> Harga Jual : ',NEW.hrg_jual,'<br> Diskon : ',NEW.diskon,'<br> Status : ',NEW.status))
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_beli`
--

CREATE TABLE IF NOT EXISTS `tbl_beli` (
  `kd_pembelian` int(20) NOT NULL,
  `pembeli` varchar(10) NOT NULL,
  `kd_barang` int(20) NOT NULL,
  `deskripsi_barang` text NOT NULL,
  `spesifikasi_barang` text NOT NULL,
  `jumlah` varchar(10) NOT NULL,
  `harga_satuan` decimal(30,0) NOT NULL,
  `harga_total` decimal(30,0) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Trigger `tbl_beli`
--
DELIMITER $$
CREATE TRIGGER `auto_update_stock` AFTER INSERT ON `tbl_beli`
 FOR EACH ROW update tbl_barang set stock = stock - NEW.jumlah WHERE kd_barang = NEW.kd_barang
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `before_delete` BEFORE DELETE ON `tbl_beli`
 FOR EACH ROW INSERT INTO tbl_log_bayar (ket, kd_pembelian, kd_barang, pembeli, deskripsi_barang, spesifikasi_barang, jumlah, hrg_satuan, hrg_total)
VALUES (CONCAT('Pembayaran untuk, kd Pembelian = ',old.kd_pembelian), old.kd_pembelian, old.kd_barang, old.pembeli, old.deskripsi_barang, old.spesifikasi_barang, old.jumlah, old.harga_satuan, old.harga_total)
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_log`
--

CREATE TABLE IF NOT EXISTS `tbl_log` (
  `ket` text NOT NULL,
  `datetime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `user` varchar(50) NOT NULL DEFAULT '',
  `old_data` varchar(10000) NOT NULL DEFAULT '',
  `new_data` varchar(10000) NOT NULL DEFAULT ''
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_log`
--

INSERT INTO `tbl_log` (`ket`, `datetime`, `user`, `old_data`, `new_data`) VALUES
('insert data ke tbl_barang, kd_barang = 123', '2018-02-12 07:05:32', 'root@localhost', '', 'Kode Barang : 123<br> Deskripsi Barang : 123<br> Spesifikasi Barang : 123<br> Stock : 123<br> Harga Modal : 123<br> Harga Jual : 123<br> Diskon : 123<br> Status : 1'),
('insert data ke tbl_barang, kd_barang = 123', '2018-02-13 01:57:30', 'root@localhost', '', 'Kode Barang : 123<br> Deskripsi Barang : 123<br> Spesifikasi Barang : 123<br> Stock : 123<br> Harga Modal : 123<br> Harga Jual : 123<br> Diskon : 123<br> Status : 1'),
('Update data ke tbl_barang, kd_barang = 123', '2018-02-13 02:02:02', 'root@localhost', 'Kode Barang : 123<br> Deskripsi Barang : 123<br> Spesifikasi Barang : 123<br> Stock : 123<br> Harga Modal : 123<br> Harga Jual : 123<br> Diskon : 123<br> Status : 1', 'Kode Barang : 123<br> Deskripsi Barang : 222<br> Spesifikasi Barang : 123<br> Stock : 123<br> Harga Modal : 123<br> Harga Jual : 123<br> Diskon : 123<br> Status : 1'),
('Update data ke tbl_barang, kd_barang = 123', '2018-02-13 02:20:47', 'root@localhost', 'Kode Barang : 123<br> Deskripsi Barang : 222<br> Spesifikasi Barang : 123<br> Stock : 123<br> Harga Modal : 123<br> Harga Jual : 123<br> Diskon : 123<br> Status : 1', 'Kode Barang : 123<br> Deskripsi Barang : 222<br> Spesifikasi Barang : 231123<br> Stock : 123<br> Harga Modal : 123<br> Harga Jual : 123<br> Diskon : 123<br> Status : 1'),
('Update data ke tbl_barang, kd_barang = 123', '2018-02-13 03:43:54', 'root@localhost', 'Kode Barang : 123<br> Deskripsi Barang : 222<br> Spesifikasi Barang : 231123<br> Stock : 123<br> Harga Modal : 123<br> Harga Jual : 123<br> Diskon : 123<br> Status : 1', 'Kode Barang : 123<br> Deskripsi Barang : 222<br> Spesifikasi Barang : 231123<br> Stock : 111<br> Harga Modal : 123<br> Harga Jual : 123<br> Diskon : 123<br> Status : 1'),
('Update data ke tbl_barang, kd_barang = 123789', '2018-02-13 03:51:35', 'root@localhost', 'Kode Barang : 123789<br> Deskripsi Barang : wawa<br> Spesifikasi Barang : wawa<br> Stock : 50<br> Harga Modal : 100<br> Harga Jual : 150<br> Diskon : 0<br> Status : 1', 'Kode Barang : 123789<br> Deskripsi Barang : wawa<br> Spesifikasi Barang : wawa<br> Stock : 38<br> Harga Modal : 100<br> Harga Jual : 150<br> Diskon : 0<br> Status : 1'),
('Update data ke tbl_barang, kd_barang = 123789', '2018-02-13 06:26:09', 'root@localhost', 'Kode Barang : 123789<br> Deskripsi Barang : wawa<br> Spesifikasi Barang : wawa<br> Stock : 38<br> Harga Modal : 100<br> Harga Jual : 150<br> Diskon : 0<br> Status : 1', 'Kode Barang : 123789<br> Deskripsi Barang : xaxa<br> Spesifikasi Barang : xaxa<br> Stock : 1<br> Harga Modal : 1<br> Harga Jual : 1<br> Diskon : 1<br> Status : 1'),
('Update data ke tbl_barang, kd_barang = 123789', '2018-02-13 06:26:39', 'root@localhost', 'Kode Barang : 123789<br> Deskripsi Barang : xaxa<br> Spesifikasi Barang : xaxa<br> Stock : 1<br> Harga Modal : 1<br> Harga Jual : 1<br> Diskon : 1<br> Status : 1', 'Kode Barang : 123789<br> Deskripsi Barang : xaxa<br> Spesifikasi Barang : xaxa<br> Stock : 1<br> Harga Modal : 1<br> Harga Jual : 1<br> Diskon : 1<br> Status : 0'),
('insert data ke tbl_barang, kd_barang = 12341234', '2018-02-13 06:27:20', 'root@localhost', '', 'Kode Barang : 12341234<br> Deskripsi Barang : sasa<br> Spesifikasi Barang : sasa<br> Stock : 2<br> Harga Modal : 2<br> Harga Jual : 2<br> Diskon : 2<br> Status : 1'),
('Update data ke tbl_barang, kd_barang = 12341234', '2018-02-13 06:30:01', 'root@localhost', 'Kode Barang : 12341234<br> Deskripsi Barang : sasa<br> Spesifikasi Barang : sasa<br> Stock : 2<br> Harga Modal : 2<br> Harga Jual : 2<br> Diskon : 2<br> Status : 1', 'Kode Barang : 12341234<br> Deskripsi Barang : sasa<br> Spesifikasi Barang : sasa<br> Stock : 0<br> Harga Modal : 2<br> Harga Jual : 2<br> Diskon : 2<br> Status : 1'),
('insert data ke tbl_barang, kd_barang = 987', '2018-02-13 07:13:21', 'root@localhost', '', 'Kode Barang : 987<br> Deskripsi Barang : qwqw<br> Spesifikasi Barang : qwqw<br> Stock : 99<br> Harga Modal : 99<br> Harga Jual : 99<br> Diskon : 100<br> Status : 1'),
('Update data ke tbl_barang, kd_barang = 987', '2018-02-13 07:13:50', 'root@localhost', 'Kode Barang : 987<br> Deskripsi Barang : qwqw<br> Spesifikasi Barang : qwqw<br> Stock : 99<br> Harga Modal : 99<br> Harga Jual : 99<br> Diskon : 100<br> Status : 1', 'Kode Barang : 987<br> Deskripsi Barang : qwqw<br> Spesifikasi Barang : qwqw<br> Stock : 1<br> Harga Modal : 99<br> Harga Jual : 99<br> Diskon : 100<br> Status : 1'),
('Update data ke tbl_barang, kd_barang = 987', '2018-02-13 07:14:52', 'root@localhost', 'Kode Barang : 987<br> Deskripsi Barang : qwqw<br> Spesifikasi Barang : qwqw<br> Stock : 1<br> Harga Modal : 99<br> Harga Jual : 99<br> Diskon : 100<br> Status : 1', 'Kode Barang : 987<br> Deskripsi Barang : qwqw<br> Spesifikasi Barang : qwqw<br> Stock : 0<br> Harga Modal : 99<br> Harga Jual : 99<br> Diskon : 100<br> Status : 1'),
('insert data ke tbl_barang, kd_barang = 0', '2018-02-14 02:59:52', 'root@localhost', '', 'Kode Barang : 0<br> Deskripsi Barang : caca<br> Spesifikasi Barang : caca<br> Stock : 12<br> Harga Modal : 123<br> Harga Jual : 1122311<br> Diskon : <br> Status : 1'),
('insert data ke tbl_barang, kd_barang = 12231', '2018-02-14 03:04:42', 'root@localhost', '', 'Kode Barang : 12231<br> Deskripsi Barang : cece<br> Spesifikasi Barang : cece<br> Stock : 312<br> Harga Modal : 134<br> Harga Jual : 4321<br> Diskon : <br> Status : 1'),
('insert data ke tbl_barang, kd_barang = 11', '2018-02-14 03:10:19', 'root@localhost', '', 'Kode Barang : 11<br> Deskripsi Barang : rere<br> Spesifikasi Barang : erer<br> Stock : 31<br> Harga Modal : 31<br> Harga Jual : 321<br> Diskon : <br> Status : 1'),
('Update data ke tbl_barang, kd_barang = 987', '2018-02-14 03:12:45', 'root@localhost', 'Kode Barang : 987<br> Deskripsi Barang : qwqw<br> Spesifikasi Barang : qwqw<br> Stock : 0<br> Harga Modal : 99<br> Harga Jual : 99<br> Diskon : 100<br> Status : 1', 'Kode Barang : 987<br> Deskripsi Barang : qwqw<br> Spesifikasi Barang : qwqw<br> Stock : 0<br> Harga Modal : 99<br> Harga Jual : 99<br> Diskon : 0<br> Status : 1'),
('Update data ke tbl_barang, kd_barang = 12231', '2018-02-14 03:30:20', 'root@localhost', 'Kode Barang : 12231<br> Deskripsi Barang : cece<br> Spesifikasi Barang : cece<br> Stock : 312<br> Harga Modal : 134<br> Harga Jual : 4321<br> Diskon : <br> Status : 1', 'Kode Barang : 12231<br> Deskripsi Barang : cece<br> Spesifikasi Barang : cece<br> Stock : 300<br> Harga Modal : 134<br> Harga Jual : 4321<br> Diskon : <br> Status : 1'),
('insert data ke tbl_barang, kd_barang = 12', '2018-02-14 03:34:35', 'root@localhost', '', 'Kode Barang : 12<br> Deskripsi Barang : dede<br> Spesifikasi Barang : dada<br> Stock : 1111<br> Harga Modal : 100<br> Harga Jual : 500<br> Diskon : 0<br> Status : 1');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_login`
--

CREATE TABLE IF NOT EXISTS `tbl_login` (
  `ux_user` varchar(10) NOT NULL,
  `ux_pass` varchar(225) NOT NULL,
  `ux_akses` enum('admin','super_admin','member') NOT NULL DEFAULT 'member'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_login`
--

INSERT INTO `tbl_login` (`ux_user`, `ux_pass`, `ux_akses`) VALUES
('123', '202cb962ac59075b964b07152d234b70', 'super_admin'),
('456', '250cf8b51c773f3f8dc8b4be867a9a02', 'admin'),
('789', '68053af2923e00204c3ca7c6a3150cf7', 'member'),
('iko', 'c865be5baf7929abcef390311740798f', 'member'),
('qwe', '76d80224611fc919a5d54f0ff9fba446', 'member');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_log_bayar`
--

CREATE TABLE IF NOT EXISTS `tbl_log_bayar` (
  `ket` text NOT NULL,
  `datetime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `kd_pembelian` int(20) NOT NULL,
  `kd_barang` int(20) NOT NULL,
  `pembeli` varchar(10) NOT NULL,
  `deskripsi_barang` text NOT NULL,
  `spesifikasi_barang` text NOT NULL,
  `jumlah` varchar(10) NOT NULL,
  `hrg_satuan` decimal(30,0) NOT NULL,
  `hrg_total` decimal(30,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_log_bayar`
--

INSERT INTO `tbl_log_bayar` (`ket`, `datetime`, `kd_pembelian`, `kd_barang`, `pembeli`, `deskripsi_barang`, `spesifikasi_barang`, `jumlah`, `hrg_satuan`, `hrg_total`) VALUES
('Pembayaran untuk, kd Pembelian = 1', '2018-02-13 03:44:33', 1, 123, '789', '222', '231123', '12', '123', '-339'),
('Pembayaran untuk, kd Pembelian = 2', '2018-02-13 03:52:50', 2, 123789, '789', 'wawa', 'wawa', '12', '150', '1800'),
('Pembayaran untuk, kd Pembelian = 3', '2018-02-13 06:30:14', 3, 12341234, 'qwe', 'sasa', 'sasa', '2', '2', '4'),
('Pembayaran untuk, kd Pembelian = 4', '2018-02-13 07:13:56', 4, 987, 'qwe', 'qwqw', 'qwqw', '98', '99', '0'),
('Pembayaran untuk, kd Pembelian = 5', '2018-02-13 07:14:58', 5, 987, 'qwe', 'qwqw', 'qwqw', '1', '99', '0'),
('Pembayaran untuk, kd Pembelian = 6', '2018-02-14 03:30:38', 6, 12231, '789', 'cece', 'cece', '12', '4321', '0');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_log_daftar`
--

CREATE TABLE IF NOT EXISTS `tbl_log_daftar` (
  `ket` text NOT NULL,
  `datetime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `data` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_log_daftar`
--

INSERT INTO `tbl_log_daftar` (`ket`, `datetime`, `data`) VALUES
('insert data ke tbl_login, Username = asd', '2018-02-12 07:05:48', 'Username : asd<br> Password : asd<br> Hak Akses : member');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_barang`
--
ALTER TABLE `tbl_barang`
  ADD PRIMARY KEY (`kd_barang`);

--
-- Indexes for table `tbl_beli`
--
ALTER TABLE `tbl_beli`
  ADD PRIMARY KEY (`kd_pembelian`);

--
-- Indexes for table `tbl_login`
--
ALTER TABLE `tbl_login`
  ADD PRIMARY KEY (`ux_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_beli`
--
ALTER TABLE `tbl_beli`
  MODIFY `kd_pembelian` int(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
