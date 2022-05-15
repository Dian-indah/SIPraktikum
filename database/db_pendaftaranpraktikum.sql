-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 15 Bulan Mei 2022 pada 16.02
-- Versi server: 10.4.24-MariaDB
-- Versi PHP: 7.4.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_pendaftaranpraktikum`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `aslab`
--

CREATE TABLE `aslab` (
  `id` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `npm` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `nomor_hp` varchar(13) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `aslab`
--

INSERT INTO `aslab` (`id`, `nama`, `npm`, `password`, `nomor_hp`) VALUES
(1, 'Dian', '06.2018.1.07111', '123', '089688000036'),
(2, 'Indah', '06.2018.1.07072', '123', '089688000036');

-- --------------------------------------------------------

--
-- Struktur dari tabel `daftarprak`
--

CREATE TABLE `daftarprak` (
  `id` int(11) NOT NULL,
  `praktikan_id` int(11) NOT NULL,
  `aslab_id` int(11) NOT NULL,
  `praktikum_id` int(11) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `daftarprak`
--

INSERT INTO `daftarprak` (`id`, `praktikan_id`, `aslab_id`, `praktikum_id`, `status`) VALUES
(1, 1, 1, 2, 1),
(2, 2, 2, 2, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `modul`
--

CREATE TABLE `modul` (
  `id` int(11) NOT NULL,
  `praktikum_id` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `modul`
--

INSERT INTO `modul` (`id`, `praktikum_id`, `nama`) VALUES
(1, 2, 'Modul 1'),
(2, 2, 'Modul 2');

-- --------------------------------------------------------

--
-- Struktur dari tabel `nilai`
--

CREATE TABLE `nilai` (
  `id` int(11) NOT NULL,
  `modul_id` int(11) NOT NULL,
  `praktikan_id` int(11) NOT NULL,
  `nilai` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `nilai`
--

INSERT INTO `nilai` (`id`, `modul_id`, `praktikan_id`, `nilai`) VALUES
(1, 1, 1, '85'),
(2, 2, 1, '65'),
(3, 1, 2, '87'),
(4, 2, 2, '88');

-- --------------------------------------------------------

--
-- Struktur dari tabel `praktikan`
--

CREATE TABLE `praktikan` (
  `id` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `npm` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `nomor_hp` varchar(13) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `praktikan`
--

INSERT INTO `praktikan` (`id`, `nama`, `npm`, `password`, `nomor_hp`) VALUES
(1, 'Amir', '06.2018.1.07000', '123', '081355688200'),
(2, 'Uddin', '06.2018.1.07001', '123', '081335688201');

-- --------------------------------------------------------

--
-- Struktur dari tabel `praktikum`
--

CREATE TABLE `praktikum` (
  `id` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `tahun` date NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `praktikum`
--

INSERT INTO `praktikum` (`id`, `nama`, `tahun`, `status`) VALUES
(1, 'Pemrograman berbasis Objek', '2022-05-15', 0),
(2, 'Basis Data', '2021-03-08', 1);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `aslab`
--
ALTER TABLE `aslab`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `daftarprak`
--
ALTER TABLE `daftarprak`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `modul`
--
ALTER TABLE `modul`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `nilai`
--
ALTER TABLE `nilai`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `praktikan`
--
ALTER TABLE `praktikan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `praktikum`
--
ALTER TABLE `praktikum`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `aslab`
--
ALTER TABLE `aslab`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `daftarprak`
--
ALTER TABLE `daftarprak`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `modul`
--
ALTER TABLE `modul`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `nilai`
--
ALTER TABLE `nilai`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `praktikan`
--
ALTER TABLE `praktikan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `praktikum`
--
ALTER TABLE `praktikum`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
