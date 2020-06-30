-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 07 Jan 2020 pada 01.17
-- Versi server: 10.1.37-MariaDB
-- Versi PHP: 7.3.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `toko_lumpia`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_invoice`
--

CREATE TABLE `tb_invoice` (
  `id` int(11) NOT NULL,
  `nama` varchar(56) NOT NULL,
  `alamat` varchar(226) NOT NULL,
  `tgl_pesan` date NOT NULL,
  `batas_bayar` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_invoice`
--

INSERT INTO `tb_invoice` (`id`, `nama`, `alamat`, `tgl_pesan`, `batas_bayar`) VALUES
(1, 'Chafid Arzun Wicaksono', 'semarna', '2020-01-06', '2020-01-07'),
(2, 'Chafid Arzun Wicaksono', 'semarna', '2020-01-06', '2020-01-07'),
(3, 'caca', 'Kranggan dalam 272 h', '2020-01-07', '2020-01-08');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_lumpia`
--

CREATE TABLE `tb_lumpia` (
  `id_lumpia` int(11) NOT NULL,
  `nama_lumpia` varchar(120) NOT NULL,
  `keterangan` varchar(257) NOT NULL,
  `kategori` varchar(60) NOT NULL,
  `harga` int(11) NOT NULL,
  `stok` int(4) NOT NULL,
  `gambar` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_lumpia`
--

INSERT INTO `tb_lumpia` (`id_lumpia`, `nama_lumpia`, `keterangan`, `kategori`, `harga`, `stok`, `gambar`) VALUES
(1, 'Lumpia Ori Goreng ', 'lumpia yang di dalamnya berisi rebung dan telur', 'Goreng', 13000, 999, 'goreng_ori.jpg'),
(2, 'Lumpia Basah Ori', 'Lumpia yang berisi rebung dan telur tapi tidak di goreng', 'Basah', 10000, 1000, 'basah_ori.jpg'),
(3, 'Lumpia Goreng Ayam', 'Lumpia goreng isi rebung, telur dan ayam', 'Goreng', 15000, 200, 'goreng_ayam.jpg'),
(4, 'Lumpia Goreng Kambing', 'Lumpia goreng isi rebung, telur, daging kambing.', 'Goreng', 20000, 100, 'goreng_kambing.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_pesanan`
--

CREATE TABLE `tb_pesanan` (
  `id` int(11) NOT NULL,
  `id_invoice` int(11) NOT NULL,
  `id_lumpia` int(11) NOT NULL,
  `nama_lumpia` varchar(60) NOT NULL,
  `jumlah` int(3) NOT NULL,
  `harga` int(10) NOT NULL,
  `pilihan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_pesanan`
--

INSERT INTO `tb_pesanan` (`id`, `id_invoice`, `id_lumpia`, `nama_lumpia`, `jumlah`, `harga`, `pilihan`) VALUES
(1, 1, 1, 'Lumpia Ori Goreng ', 2, 13000, ''),
(2, 1, 2, 'Lumpia Basah Ori', 1, 10000, ''),
(3, 1, 3, 'Lumpia Goreng Ayam', 1, 15000, ''),
(4, 3, 1, 'Lumpia Ori Goreng ', 1, 13000, '');

--
-- Trigger `tb_pesanan`
--
DELIMITER $$
CREATE TRIGGER `pesanan_penjualan` AFTER INSERT ON `tb_pesanan` FOR EACH ROW BEGIN
	UPDATE tb_lumpia SET stok = stok - new.jumlah
    WHERE id_lumpia = new.id_lumpia;
    END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_user`
--

CREATE TABLE `tb_user` (
  `id` int(11) NOT NULL,
  `nama` varchar(56) NOT NULL,
  `username` varchar(56) NOT NULL,
  `password` varchar(56) NOT NULL,
  `role_id` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_user`
--

INSERT INTO `tb_user` (`id`, `nama`, `username`, `password`, `role_id`) VALUES
(1, 'admin', 'admin', '123', 1),
(2, 'user', 'user', '123', 2),
(3, 'chapz', 'chapz', '1234', 2);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tb_invoice`
--
ALTER TABLE `tb_invoice`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tb_lumpia`
--
ALTER TABLE `tb_lumpia`
  ADD PRIMARY KEY (`id_lumpia`);

--
-- Indeks untuk tabel `tb_pesanan`
--
ALTER TABLE `tb_pesanan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tb_invoice`
--
ALTER TABLE `tb_invoice`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `tb_lumpia`
--
ALTER TABLE `tb_lumpia`
  MODIFY `id_lumpia` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `tb_pesanan`
--
ALTER TABLE `tb_pesanan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
