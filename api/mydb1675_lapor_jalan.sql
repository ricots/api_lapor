-- phpMyAdmin SQL Dump
-- version 4.7.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: 07 Nov 2017 pada 19.54
-- Versi Server: 10.0.33-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mydb1675_lapor_jalan`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `user` varchar(10) NOT NULL,
  `kata_sandi` varchar(10) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`user`, `kata_sandi`) VALUES
('admin', 'admin');

-- --------------------------------------------------------

--
-- Stand-in structure for view `detail_pelaporannya`
-- (Lihat di bawah untuk tampilan aktual)
--
CREATE TABLE `detail_pelaporannya` (
`id_lapor` varchar(10)
,`no_ktp` varchar(50)
,`judul` varchar(50)
,`deskripsi` varchar(100)
,`alamat` varchar(200)
,`gambar` varchar(200)
,`lat` double(10,7)
,`lng` double(10,7)
,`status` varchar(10)
,`no_ktp_rating` varchar(50)
,`rating` int(11)
,`token` varchar(255)
);

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_rating`
--

CREATE TABLE `detail_rating` (
  `id_lapor` varchar(10) NOT NULL,
  `no_ktp_rating` varchar(50) NOT NULL,
  `rating` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `detail_rating`
--

INSERT INTO `detail_rating` (`id_lapor`, `no_ktp_rating`, `rating`) VALUES
('PLO0001', '54321', 6),
('PLO0003', '3508046006950004', 6),
('PLO0006', '3510101802950002', 4),
('PLO0004', '3508037108940002', 10),
('PLO0002', '3507314106950002', 6);

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_rekomendasi`
--

CREATE TABLE `detail_rekomendasi` (
  `id_lapor` varchar(10) NOT NULL,
  `no_ktp_rekomendasi` varchar(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `detail_rekomendasi`
--

INSERT INTO `detail_rekomendasi` (`id_lapor`, `no_ktp_rekomendasi`) VALUES
('PLO0001', '54321'),
('PLO0003', '3508046006950004'),
('PLO0004', '123'),
('PLO0004', '3508037108940002'),
('PLO0003', '3508037108940002'),
('PLO0004', '3507314106950002'),
('PLO0003', '3507314106950002');

-- --------------------------------------------------------

--
-- Stand-in structure for view `lapor_lokasi`
-- (Lihat di bawah untuk tampilan aktual)
--
CREATE TABLE `lapor_lokasi` (
`alamat` varchar(200)
,`jumlah` bigint(21)
);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pelaporan`
--

CREATE TABLE `pelaporan` (
  `id_lapor` varchar(10) NOT NULL,
  `no_ktp` varchar(50) NOT NULL,
  `judul` varchar(50) NOT NULL,
  `deskripsi` varchar(100) NOT NULL,
  `alamat` varchar(200) NOT NULL,
  `gambar` varchar(200) NOT NULL,
  `lat` double(10,7) NOT NULL,
  `lng` double(10,7) NOT NULL,
  `status` varchar(10) NOT NULL,
  `rating_rekom` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pelaporan`
--

INSERT INTO `pelaporan` (`id_lapor`, `no_ktp`, `judul`, `deskripsi`, `alamat`, `gambar`, `lat`, `lng`, `status`, `rating_rekom`) VALUES
('PLO0001', '3507125810930001', 'perlu di sediakan rambu', 'rambu yang ada di persimpangan blitar dan malang', 'Jalan Raya Mojosari No.77,  Kepanjen, Jawa Timur', 'http://mydeveloper.id/lapor_malang/gambar/20170610132914333400.jpg', -8.0958271, 112.5837936, 'proses', 1),
('PLO0002', '3507125810930001', 'lampu yg mati', 'lampu yang mati. dan tidak ada rambu-rambu pada persimpangan', 'Jalan Panji No.7,  Kepanjen, Jawa Timur', 'http://mydeveloper.id/lapor_malang/gambar/20170610132951730900.jpg', -8.1341362, 112.5737533, 'proses', 0),
('PLO0003', '3510101802950002', 'rambu yang hampir roboh', 'rambu kecelakaan yg hampir roboh', 'Jalan Panji No.96A,  Kepanjen, Jawa Timur', 'http://mydeveloper.id/lapor_malang/gambar/20170610133034427300.jpg', -8.1364956, 112.5726089, 'proses', 4),
('PLO0004', '3510101802950002', 'rambu tertutup', 'rambu tertutup daun', 'Jalan Panji No.82,  Kepanjen, Jawa Timur', 'http://mydeveloper.id/lapor_malang/gambar/20170611031648542200.jpg', -8.1357746, 112.5728836, 'proses', 7),
('PLO0005', '3508046006950004', 'lampu mati di kepanjen', 'lampu mati', 'Jalan Raya Penarukan No.12,  Kepanjen, Jawa Timur', 'http://mydeveloper.id/lapor_malang/gambar/20170611031833850800.jpg', -8.1335277, 112.5732956, 'proses', 0),
('PLO0006', '3213036109930006', 'rambu pom bensin', 'pom bensin', 'Jalan Kolonel Slamet Supriyadi No.299,  Pakisaji, Jawa Timur', 'http://mydeveloper.id/lapor_malang/gambar/20170611032014144200.jpg', -8.0870647, 112.5883941, 'proses', 0),
('PLO0007', '3508046006950004', 'rambu-rambu roboh', 'rambu-rambu roboh perlu diperbaiki', 'Jalan Panji No.7,  Kepanjen, Jawa Timur', 'http://mydeveloper.id/lapor_malang/gambar/20170611043959107400.jpg', -8.1341314, 112.5737610, '', 0),
('PLO0008', '3510101802950002', 'rambu-rambu rusak', 'rambu-rambu mau roboh', 'Jalan Kolonel Slamet Supriyadi No.299,  Pakisaji, Jawa Timur', 'http://mydeveloper.id/lapor_malang/gambar/20170611051351614900.jpg', -8.0870647, 112.5883941, '', 0);

-- --------------------------------------------------------

--
-- Stand-in structure for view `sum_rating`
-- (Lihat di bawah untuk tampilan aktual)
--
CREATE TABLE `sum_rating` (
`id_lapor` varchar(10)
,`no_ktp` varchar(50)
,`judul` varchar(50)
,`deskripsi` varchar(100)
,`alamat` varchar(200)
,`gambar` varchar(200)
,`lat` double(10,7)
,`lng` double(10,7)
,`status` varchar(10)
,`rating_rekom` int(11)
,`no_ktp_rating` varchar(50)
,`rating` int(11)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `teslah`
-- (Lihat di bawah untuk tampilan aktual)
--
CREATE TABLE `teslah` (
`id_lapor` varchar(10)
,`no_ktp` varchar(50)
,`judul` varchar(50)
,`deskripsi` varchar(100)
,`alamat` varchar(200)
,`gambar` varchar(200)
,`lat` double(10,7)
,`lng` double(10,7)
,`status` varchar(10)
,`rating_rekom` int(11)
,`no_ktp_rating` varchar(50)
,`rating` int(11)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `total_lapor`
-- (Lihat di bawah untuk tampilan aktual)
--
CREATE TABLE `total_lapor` (
`jumlah_laporan` bigint(21)
);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_lapor`
--

CREATE TABLE `user_lapor` (
  `token` varchar(255) NOT NULL,
  `no_ktp` varchar(18) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `alamat_user` varchar(100) NOT NULL,
  `password` varchar(20) NOT NULL,
  `status_email` enum('0','1') NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user_lapor`
--

INSERT INTO `user_lapor` (`token`, `no_ktp`, `nama`, `alamat_user`, `password`, `status_email`) VALUES
('cgxQYINadSs:APA91bFklSEVnetS8DdSIs2nOt7KL4sA-5iKCY0STE2lwXxFXeCVE9haPaxp8NKixNux8Dr2TraIH5GGwdQ9dbxZ6sjgVhjJIFUFeM2dZ8SC5Mw2VIw-U85wnBoT0M-aF5eBFwN_FJu-', '1234', 'rico.tetukosantoso@rocketmail.com', 'Malang', '123', '0'),
('cgxQYINadSs:APA91bFklSEVnetS8DdSIs2nOt7KL4sA-5iKCY0STE2lwXxFXeCVE9haPaxp8NKixNux8Dr2TraIH5GGwdQ9dbxZ6sjgVhjJIFUFeM2dZ8SC5Mw2VIw-U85wnBoT0M-aF5eBFwN_FJu-', '3508037108940002', 'dwiana', 'lumajang', 'ana', '0'),
('cgxQYINadSs:APA91bFklSEVnetS8DdSIs2nOt7KL4sA-5iKCY0STE2lwXxFXeCVE9haPaxp8NKixNux8Dr2TraIH5GGwdQ9dbxZ6sjgVhjJIFUFeM2dZ8SC5Mw2VIw-U85wnBoT0M-aF5eBFwN_FJu-', '3505196709950002', 'nia lusiana', 'blitar', 'nia', '0'),
('cgxQYINadSs:APA91bFklSEVnetS8DdSIs2nOt7KL4sA-5iKCY0STE2lwXxFXeCVE9haPaxp8NKixNux8Dr2TraIH5GGwdQ9dbxZ6sjgVhjJIFUFeM2dZ8SC5Mw2VIw-U85wnBoT0M-aF5eBFwN_FJu-', '3510101802950002', 'rico tetuku', 'banyuwangi', 'rico', '0'),
('cgxQYINadSs:APA91bFklSEVnetS8DdSIs2nOt7KL4sA-5iKCY0STE2lwXxFXeCVE9haPaxp8NKixNux8Dr2TraIH5GGwdQ9dbxZ6sjgVhjJIFUFeM2dZ8SC5Mw2VIw-U85wnBoT0M-aF5eBFwN_FJu-', '3507125810930001', 'fita dwi', 'malang', 'fita', '0'),
('cgxQYINadSs:APA91bFklSEVnetS8DdSIs2nOt7KL4sA-5iKCY0STE2lwXxFXeCVE9haPaxp8NKixNux8Dr2TraIH5GGwdQ9dbxZ6sjgVhjJIFUFeM2dZ8SC5Mw2VIw-U85wnBoT0M-aF5eBFwN_FJu-', '3508046006950004', 'roelly norma', 'lumajang', 'roelly', '0'),
('cgxQYINadSs:APA91bFklSEVnetS8DdSIs2nOt7KL4sA-5iKCY0STE2lwXxFXeCVE9haPaxp8NKixNux8Dr2TraIH5GGwdQ9dbxZ6sjgVhjJIFUFeM2dZ8SC5Mw2VIw-U85wnBoT0M-aF5eBFwN_FJu-', '3213036109930006', 'bunga septria', 'subang, jabar', 'bunga', '0'),
('cgxQYINadSs:APA91bFklSEVnetS8DdSIs2nOt7KL4sA-5iKCY0STE2lwXxFXeCVE9haPaxp8NKixNux8Dr2TraIH5GGwdQ9dbxZ6sjgVhjJIFUFeM2dZ8SC5Mw2VIw-U85wnBoT0M-aF5eBFwN_FJu-', '3507314106950002', 'putri', 'malang', '123', '0');

-- --------------------------------------------------------

--
-- Struktur untuk view `detail_pelaporannya`
--
DROP TABLE IF EXISTS `detail_pelaporannya`;

CREATE ALGORITHM=UNDEFINED DEFINER=`mydb1675`@`localhost` SQL SECURITY DEFINER VIEW `detail_pelaporannya`  AS  select `sum_rating`.`id_lapor` AS `id_lapor`,`sum_rating`.`no_ktp` AS `no_ktp`,`sum_rating`.`judul` AS `judul`,`sum_rating`.`deskripsi` AS `deskripsi`,`sum_rating`.`alamat` AS `alamat`,`sum_rating`.`gambar` AS `gambar`,`sum_rating`.`lat` AS `lat`,`sum_rating`.`lng` AS `lng`,`sum_rating`.`status` AS `status`,`sum_rating`.`no_ktp_rating` AS `no_ktp_rating`,`sum_rating`.`rating` AS `rating`,`user_lapor`.`token` AS `token` from (`sum_rating` join `user_lapor`) where (`sum_rating`.`no_ktp` = `user_lapor`.`no_ktp`) ;

-- --------------------------------------------------------

--
-- Struktur untuk view `lapor_lokasi`
--
DROP TABLE IF EXISTS `lapor_lokasi`;

CREATE ALGORITHM=UNDEFINED DEFINER=`mydb1675`@`localhost` SQL SECURITY DEFINER VIEW `lapor_lokasi`  AS  select `pelaporan`.`alamat` AS `alamat`,count(0) AS `jumlah` from `pelaporan` group by `pelaporan`.`alamat` having (count(`pelaporan`.`alamat`) > 1) ;

-- --------------------------------------------------------

--
-- Struktur untuk view `sum_rating`
--
DROP TABLE IF EXISTS `sum_rating`;

CREATE ALGORITHM=UNDEFINED DEFINER=`mydb1675`@`localhost` SQL SECURITY DEFINER VIEW `sum_rating`  AS  select `pelaporan`.`id_lapor` AS `id_lapor`,`pelaporan`.`no_ktp` AS `no_ktp`,`pelaporan`.`judul` AS `judul`,`pelaporan`.`deskripsi` AS `deskripsi`,`pelaporan`.`alamat` AS `alamat`,`pelaporan`.`gambar` AS `gambar`,`pelaporan`.`lat` AS `lat`,`pelaporan`.`lng` AS `lng`,`pelaporan`.`status` AS `status`,`pelaporan`.`rating_rekom` AS `rating_rekom`,`detail_rating`.`no_ktp_rating` AS `no_ktp_rating`,`detail_rating`.`rating` AS `rating` from (`pelaporan` left join `detail_rating` on((`pelaporan`.`id_lapor` = `detail_rating`.`id_lapor`))) ;

-- --------------------------------------------------------

--
-- Struktur untuk view `teslah`
--
DROP TABLE IF EXISTS `teslah`;

CREATE ALGORITHM=UNDEFINED DEFINER=`mydb1675`@`localhost` SQL SECURITY DEFINER VIEW `teslah`  AS  select `pelaporan`.`id_lapor` AS `id_lapor`,`pelaporan`.`no_ktp` AS `no_ktp`,`pelaporan`.`judul` AS `judul`,`pelaporan`.`deskripsi` AS `deskripsi`,`pelaporan`.`alamat` AS `alamat`,`pelaporan`.`gambar` AS `gambar`,`pelaporan`.`lat` AS `lat`,`pelaporan`.`lng` AS `lng`,`pelaporan`.`status` AS `status`,`pelaporan`.`rating_rekom` AS `rating_rekom`,`detail_rating`.`no_ktp_rating` AS `no_ktp_rating`,`detail_rating`.`rating` AS `rating` from (`pelaporan` left join `detail_rating` on((`pelaporan`.`id_lapor` = `detail_rating`.`id_lapor`))) ;

-- --------------------------------------------------------

--
-- Struktur untuk view `total_lapor`
--
DROP TABLE IF EXISTS `total_lapor`;

CREATE ALGORITHM=UNDEFINED DEFINER=`mydb1675`@`localhost` SQL SECURITY DEFINER VIEW `total_lapor`  AS  select count(distinct `sum_rating`.`id_lapor`) AS `jumlah_laporan` from `sum_rating` ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `detail_rating`
--
ALTER TABLE `detail_rating`
  ADD KEY `id_lapor` (`id_lapor`);

--
-- Indexes for table `pelaporan`
--
ALTER TABLE `pelaporan`
  ADD PRIMARY KEY (`id_lapor`);

--
-- Indexes for table `user_lapor`
--
ALTER TABLE `user_lapor`
  ADD PRIMARY KEY (`no_ktp`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
