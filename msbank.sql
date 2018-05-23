-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 14 Okt 2017 pada 12.57
-- Versi Server: 10.1.19-MariaDB
-- PHP Version: 7.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `msbank`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `laporan`
--

CREATE TABLE `laporan` (
  `id_laporan` int(11) NOT NULL,
  `nama_laporan` varchar(255) NOT NULL,
  `rincian_laporan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pembayaran`
--

CREATE TABLE `pembayaran` (
  `id_pembayaran` int(11) NOT NULL,
  `nama_pembayaran` varchar(255) NOT NULL,
  `deskripsi_pembayaran` text NOT NULL,
  `total_pembayaran` int(11) NOT NULL,
  `tanggal_pembayaran` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pembayaran`
--

INSERT INTO `pembayaran` (`id_pembayaran`, `nama_pembayaran`, `deskripsi_pembayaran`, `total_pembayaran`, `tanggal_pembayaran`) VALUES
(47, 'SPKP Oktober 2017', '', 200000, '2017-10-14'),
(48, 'SPKP Bulan Noverber 2017', '', 200000, '2017-10-14');

-- --------------------------------------------------------

--
-- Struktur dari tabel `siswa`
--

CREATE TABLE `siswa` (
  `nisn` varchar(255) NOT NULL,
  `nama_lengkap` varchar(255) NOT NULL,
  `kelas` varchar(255) NOT NULL,
  `tempat_lahir` varchar(255) NOT NULL,
  `tanggal_lahir` varchar(255) NOT NULL,
  `jk` enum('Laki-laki','Perempuan','Tak Diketahui') NOT NULL,
  `alamat` text NOT NULL,
  `foto` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `siswa`
--

INSERT INTO `siswa` (`nisn`, `nama_lengkap`, `kelas`, `tempat_lahir`, `tanggal_lahir`, `jk`, `alamat`, `foto`) VALUES
('0000124332', 'Lord Gaben Newell', 'XII RPL 1', 'Bandung', '2017-10-11', 'Laki-laki', 'Depok', '0000124332.jpg'),
('0000234234', 'Napoleon Bonaparte ', 'X AK 1', 'Madiun', '2017-10-04', 'Laki-laki', 'Depok', '0000234234.jpg'),
('0001238918', 'Seto Mulyadi ', 'XII TSM 2', 'Jakarta', '2017-10-03', 'Laki-laki', 'Jakarta', '0001238918.jpg'),
('0001432112', 'Yang Lek ', 'X RPL 1', 'Depok', '2017-10-07', 'Laki-laki', 'Depok', '0001432112.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `siswa_kelas`
--

CREATE TABLE `siswa_kelas` (
  `id` int(11) NOT NULL,
  `id_siswa` varchar(255) NOT NULL,
  `kelas` varchar(255) NOT NULL,
  `jurusan` varchar(255) NOT NULL,
  `nomer_kelas` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `siswa_kelas`
--

INSERT INTO `siswa_kelas` (`id`, `id_siswa`, `kelas`, `jurusan`, `nomer_kelas`) VALUES
(45, '0000124332', 'XII', 'RPL', '1'),
(46, '0000234234', 'X', 'AK', '1'),
(59, '0001432112', 'X', 'RPL', '1'),
(60, '0001238918', 'XII', 'TSM', '2');

-- --------------------------------------------------------

--
-- Struktur dari tabel `siswa_nama`
--

CREATE TABLE `siswa_nama` (
  `id` int(11) NOT NULL,
  `id_siswa` varchar(255) NOT NULL,
  `nama_depan` varchar(255) NOT NULL,
  `nama_tengah` varchar(255) NOT NULL,
  `nama_belakang` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `siswa_nama`
--

INSERT INTO `siswa_nama` (`id`, `id_siswa`, `nama_depan`, `nama_tengah`, `nama_belakang`) VALUES
(47, '0000124332', 'Lord', 'Gaben', 'Newell'),
(48, '0000234234', 'Napoleon', 'Bonaparte', ''),
(61, '0001432112', 'Yang', 'Lek', ''),
(62, '0001238918', 'Seto', 'Mulyadi', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `siswa_pembayaran`
--

CREATE TABLE `siswa_pembayaran` (
  `pembayaran_id` int(11) NOT NULL,
  `pembayaran_idsiswa` varchar(255) NOT NULL,
  `pembayaran_jenis` int(255) NOT NULL,
  `pembayaran_sisa` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `siswa_pembayaran`
--

INSERT INTO `siswa_pembayaran` (`pembayaran_id`, `pembayaran_idsiswa`, `pembayaran_jenis`, `pembayaran_sisa`) VALUES
(57, '0000234234', 47, 200000),
(58, '0001432112', 47, 200000),
(59, '0000124332', 47, 100000),
(60, '0001238918', 47, 50000),
(61, '0000234234', 48, 200000),
(62, '0001432112', 48, 200000),
(63, '0000124332', 48, 200000),
(64, '0001238918', 48, 200000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksi`
--

CREATE TABLE `transaksi` (
  `transaksi_id` int(11) NOT NULL,
  `transaksi_waktu` datetime NOT NULL,
  `transaksi_idsiswa` varchar(255) NOT NULL,
  `transaksi_idpembayaran` int(255) NOT NULL,
  `transaksi_sisapembayaran` int(255) NOT NULL,
  `transaksi_sisapembayaranbaru` int(255) NOT NULL,
  `transaksi_jumlahbayar` int(255) NOT NULL,
  `transaksi_ket` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `transaksi`
--

INSERT INTO `transaksi` (`transaksi_id`, `transaksi_waktu`, `transaksi_idsiswa`, `transaksi_idpembayaran`, `transaksi_sisapembayaran`, `transaksi_sisapembayaranbaru`, `transaksi_jumlahbayar`, `transaksi_ket`) VALUES
(4, '0000-00-00 00:00:00', '0001238918', 47, 200000, 100000, 100000, ''),
(5, '2017-10-14 11:48:18', '0001238918', 47, 100000, 50000, 50000, ''),
(6, '2017-10-14 11:58:11', '0000124332', 47, 200000, 100000, 100000, ''),
(7, '2017-10-14 12:27:27', '0001238918', 47, 50000, 50000, 0, '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `hak_akses` enum('admin','user','','') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`user_id`, `username`, `password`, `hak_akses`) VALUES
(0, 'admin', 'admin', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `laporan`
--
ALTER TABLE `laporan`
  ADD PRIMARY KEY (`id_laporan`);

--
-- Indexes for table `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`id_pembayaran`);

--
-- Indexes for table `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`nisn`),
  ADD KEY `nama_lengkap` (`nama_lengkap`),
  ADD KEY `nama_lengkap_2` (`nama_lengkap`);

--
-- Indexes for table `siswa_kelas`
--
ALTER TABLE `siswa_kelas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_siswa` (`id_siswa`);

--
-- Indexes for table `siswa_nama`
--
ALTER TABLE `siswa_nama`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_siswa` (`id_siswa`);

--
-- Indexes for table `siswa_pembayaran`
--
ALTER TABLE `siswa_pembayaran`
  ADD PRIMARY KEY (`pembayaran_id`),
  ADD KEY `pembayaran_idsiswa` (`pembayaran_idsiswa`),
  ADD KEY `pembayaran_jenis` (`pembayaran_jenis`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`transaksi_id`),
  ADD KEY `transaksi_idsiswa` (`transaksi_idsiswa`),
  ADD KEY `transaksi_idpembayaran` (`transaksi_idpembayaran`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `laporan`
--
ALTER TABLE `laporan`
  MODIFY `id_laporan` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `pembayaran`
--
ALTER TABLE `pembayaran`
  MODIFY `id_pembayaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;
--
-- AUTO_INCREMENT for table `siswa_kelas`
--
ALTER TABLE `siswa_kelas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;
--
-- AUTO_INCREMENT for table `siswa_nama`
--
ALTER TABLE `siswa_nama`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;
--
-- AUTO_INCREMENT for table `siswa_pembayaran`
--
ALTER TABLE `siswa_pembayaran`
  MODIFY `pembayaran_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;
--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `transaksi_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `siswa_kelas`
--
ALTER TABLE `siswa_kelas`
  ADD CONSTRAINT `siswa_kelas_ibfk_1` FOREIGN KEY (`id_siswa`) REFERENCES `siswa` (`nisn`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `siswa_nama`
--
ALTER TABLE `siswa_nama`
  ADD CONSTRAINT `siswa_nama_ibfk_1` FOREIGN KEY (`id_siswa`) REFERENCES `siswa` (`nisn`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `siswa_pembayaran`
--
ALTER TABLE `siswa_pembayaran`
  ADD CONSTRAINT `siswa_pembayaran_ibfk_1` FOREIGN KEY (`pembayaran_idsiswa`) REFERENCES `siswa` (`nisn`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `siswa_pembayaran_ibfk_2` FOREIGN KEY (`pembayaran_jenis`) REFERENCES `pembayaran` (`id_pembayaran`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  ADD CONSTRAINT `transaksi_ibfk_1` FOREIGN KEY (`transaksi_idsiswa`) REFERENCES `siswa` (`nisn`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
