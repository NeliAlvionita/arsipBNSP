-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 26 Okt 2021 pada 03.12
-- Versi server: 10.4.17-MariaDB
-- Versi PHP: 7.4.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbarsip`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbarsip`
--

CREATE TABLE `tbarsip` (
  `id` int(11) NOT NULL,
  `nomor` varchar(50) NOT NULL,
  `idkategori` int(5) NOT NULL,
  `judul` varchar(50) NOT NULL,
  `waktu` date NOT NULL,
  `file` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbarsip`
--

INSERT INTO `tbarsip` (`id`, `nomor`, `idkategori`, `judul`, `waktu`, `file`) VALUES
(4, '2020/TU/22', 1, 'Surat Undangan D4', '2021-10-25', '-'),
(5, '2020/TU/23', 2, 'Surat Pengumuman', '2021-10-26', '-');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbkategori`
--

CREATE TABLE `tbkategori` (
  `idkategori` int(5) NOT NULL,
  `namakategori` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbkategori`
--

INSERT INTO `tbkategori` (`idkategori`, `namakategori`) VALUES
(1, 'Undangan'),
(2, 'Pengumuman');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tbarsip`
--
ALTER TABLE `tbarsip`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idkategori` (`idkategori`);

--
-- Indeks untuk tabel `tbkategori`
--
ALTER TABLE `tbkategori`
  ADD PRIMARY KEY (`idkategori`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tbarsip`
--
ALTER TABLE `tbarsip`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `tbkategori`
--
ALTER TABLE `tbkategori`
  MODIFY `idkategori` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `tbarsip`
--
ALTER TABLE `tbarsip`
  ADD CONSTRAINT `tbarsip_ibfk_1` FOREIGN KEY (`idkategori`) REFERENCES `tbkategori` (`idkategori`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
