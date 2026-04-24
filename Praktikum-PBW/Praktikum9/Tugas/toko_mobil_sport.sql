-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 24 Apr 2026 pada 18.13
-- Versi server: 10.4.32-MariaDB
-- Versi PHP: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `toko_mobil_sport`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `mobil`
--

CREATE TABLE `mobil` (
  `ID` int(11) NOT NULL,
  `Nama_Mobil` varchar(255) DEFAULT NULL,
  `Merk` varchar(255) DEFAULT NULL,
  `Tahun` int(11) DEFAULT NULL,
  `Harga` decimal(12,2) DEFAULT NULL,
  `Stok` int(11) DEFAULT NULL,
  `Warna` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `mobil`
--

INSERT INTO `mobil` (`ID`, `Nama_Mobil`, `Merk`, `Tahun`, `Harga`, `Stok`, `Warna`) VALUES
(5, 'Supra MK4', 'Toyota', 2025, 1500000000.00, 3, 'Abu2, Biru'),
(6, 'Aventador', 'Lamborghini', 2020, 8000000000.00, 2, 'Kuning'),
(7, 'Huracan', 'Lamborghini', 2021, 5500000000.00, 1, 'Hitam'),
(8, 'Mustang GT', 'Ford', 2023, 2000000000.00, 1, 'Hitam'),
(9, 'GT-R R35', 'Nissan', 2025, 4000000000.00, 4, 'Biru Tua2, Merah2'),
(10, '911 Turbo', 'Porsche', 2026, 6500000000.00, 1, 'Putih');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `mobil`
--
ALTER TABLE `mobil`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `mobil`
--
ALTER TABLE `mobil`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
