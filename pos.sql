-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 28 Jan 2021 pada 00.44
-- Versi server: 10.4.14-MariaDB
-- Versi PHP: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pos`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_supplier`
--

CREATE TABLE `tb_supplier` (
  `id_supplier` int(11) NOT NULL,
  `name` varchar(128) NOT NULL,
  `phone` varchar(128) NOT NULL,
  `address` varchar(256) NOT NULL,
  `description` text DEFAULT NULL,
  `created` datetime NOT NULL DEFAULT current_timestamp(),
  `updated` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_supplier`
--

INSERT INTO `tb_supplier` (`id_supplier`, `name`, `phone`, `address`, `description`, `created`, `updated`) VALUES
(1, 'Toko A', '085123456789', 'Malang', NULL, '2021-01-24 15:36:08', NULL),
(2, 'Toko B', '085159951159', 'Surabaya', 'Toko ATK Besar', '2021-01-24 15:36:08', NULL),
(4, 'Toko C', '085963369963', 'Sidoarjo', NULL, '2021-01-24 17:27:16', '2021-01-24 12:12:01');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_user`
--

CREATE TABLE `tb_user` (
  `id_user` int(11) NOT NULL,
  `username` varchar(128) NOT NULL,
  `password` varchar(256) NOT NULL,
  `name` varchar(128) NOT NULL,
  `address` varchar(256) DEFAULT NULL,
  `level` int(1) NOT NULL COMMENT '1=admin; 2=kasir;'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_user`
--

INSERT INTO `tb_user` (`id_user`, `username`, `password`, `name`, `address`, `level`) VALUES
(1, 'admin', 'd033e22ae348aeb5660fc2140aec35850c4da997', 'Sudrajad Dwi Sasmita', 'Klojen, Malang', 1),
(2, 'kasir1', '874c0ac75f323057fe3b7fb3f5a8a41df2b94b1d', 'Budi', 'Singasari, Malang', 2),
(3, 'kasir2', '98becfb9553ea96eae7bb63c5b3465c3a03b3ba8', 'Bambang', 'Lowokwaru, Malang', 2);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tb_supplier`
--
ALTER TABLE `tb_supplier`
  ADD PRIMARY KEY (`id_supplier`);

--
-- Indeks untuk tabel `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tb_supplier`
--
ALTER TABLE `tb_supplier`
  MODIFY `id_supplier` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
