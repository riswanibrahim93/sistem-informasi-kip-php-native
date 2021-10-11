-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 11 Okt 2021 pada 13.13
-- Versi server: 10.4.14-MariaDB
-- Versi PHP: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dss_kip`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `alternatif`
--

CREATE TABLE `alternatif` (
  `id_alternatif` int(11) NOT NULL,
  `nama_alternatif` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `alternatif`
--

INSERT INTO `alternatif` (`id_alternatif`, `nama_alternatif`) VALUES
(1, 'Diterima'),
(2, 'Tidak Diterima');

-- --------------------------------------------------------

--
-- Struktur dari tabel `bobot_preferensi`
--

CREATE TABLE `bobot_preferensi` (
  `id_BP` int(11) NOT NULL,
  `id_kriteria` int(11) NOT NULL,
  `bobot_preferensi` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `bobot_preferensi`
--

INSERT INTO `bobot_preferensi` (`id_BP`, `id_kriteria`, `bobot_preferensi`) VALUES
(1, 1, 0.5),
(2, 2, 0.75),
(3, 3, 0.5),
(4, 4, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_siswa`
--

CREATE TABLE `data_siswa` (
  `kode_pola` varchar(10) NOT NULL,
  `nama_siswa` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `kriteria`
--

CREATE TABLE `kriteria` (
  `id_kriteria` int(11) NOT NULL,
  `nm_kriteria` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kriteria`
--

INSERT INTO `kriteria` (`id_kriteria`, `nm_kriteria`) VALUES
(1, 'Jumlah Tanggungan Or'),
(2, 'Jumlah Penghasilan O'),
(3, 'Jumlah Pekerjaan Ora'),
(4, 'Keadaan Orang tua');

-- --------------------------------------------------------

--
-- Struktur dari tabel `nilai_total`
--

CREATE TABLE `nilai_total` (
  `id_nilaiTotal` int(11) NOT NULL,
  `kode_pola` varchar(10) NOT NULL,
  `Nilai_Total` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `normalisasi`
--

CREATE TABLE `normalisasi` (
  `id_normalisasi` int(11) NOT NULL,
  `id_nilai` int(11) NOT NULL,
  `id_subkriteria` int(11) NOT NULL,
  `kode_pola` varchar(10) NOT NULL,
  `nilai_normalisasi` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `penilaian`
--

CREATE TABLE `penilaian` (
  `id_nilai` int(11) NOT NULL,
  `kode_pola` varchar(11) DEFAULT NULL,
  `id_kriteria` int(11) NOT NULL,
  `id_subkriteria` int(11) NOT NULL,
  `nilai` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `skala`
--

CREATE TABLE `skala` (
  `id_skala` int(11) NOT NULL,
  `nm_skala` varchar(20) NOT NULL,
  `value` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `skala`
--

INSERT INTO `skala` (`id_skala`, `nm_skala`, `value`) VALUES
(1, 'Kurang Penting', 1),
(2, 'Cukup Penting', 2),
(3, 'Penting', 3),
(4, 'Sangat Penting', 4);

-- --------------------------------------------------------

--
-- Struktur dari tabel `sub_kriteria`
--

CREATE TABLE `sub_kriteria` (
  `id_subkriteria` int(11) NOT NULL,
  `id_kriteria` int(11) NOT NULL,
  `id_skala` int(11) NOT NULL,
  `nm_kriteria` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `sub_kriteria`
--

INSERT INTO `sub_kriteria` (`id_subkriteria`, `id_kriteria`, `id_skala`, `nm_kriteria`) VALUES
(1, 1, 1, '1 anak'),
(2, 1, 2, '2 anak'),
(3, 1, 3, '3 anak'),
(4, 1, 4, 'lebih dari sama deng'),
(5, 2, 4, 'kurang dari 500.000'),
(6, 2, 3, '500.000-1.000.000'),
(7, 2, 2, '1.000.000-2.000.000'),
(8, 2, 1, 'lebih dari 2.000.000'),
(9, 3, 1, 'PNS/TNI/POLRI'),
(10, 3, 2, 'Karyawan swasta'),
(11, 3, 3, 'Wiraswasta'),
(12, 3, 4, 'Tidak Bekerja'),
(13, 4, 4, 'Tidak memiliki orang tua'),
(14, 4, 3, 'Ayah meninggal'),
(15, 4, 2, 'Ibu meninggal'),
(16, 4, 1, 'Masih memiliki orang tua');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `alternatif`
--
ALTER TABLE `alternatif`
  ADD PRIMARY KEY (`id_alternatif`);

--
-- Indeks untuk tabel `bobot_preferensi`
--
ALTER TABLE `bobot_preferensi`
  ADD PRIMARY KEY (`id_BP`),
  ADD KEY `id_alternatif` (`id_kriteria`) USING BTREE;

--
-- Indeks untuk tabel `data_siswa`
--
ALTER TABLE `data_siswa`
  ADD PRIMARY KEY (`kode_pola`);

--
-- Indeks untuk tabel `kriteria`
--
ALTER TABLE `kriteria`
  ADD PRIMARY KEY (`id_kriteria`);

--
-- Indeks untuk tabel `nilai_total`
--
ALTER TABLE `nilai_total`
  ADD PRIMARY KEY (`id_nilaiTotal`),
  ADD KEY `kode_pola` (`kode_pola`) USING BTREE;

--
-- Indeks untuk tabel `normalisasi`
--
ALTER TABLE `normalisasi`
  ADD PRIMARY KEY (`id_normalisasi`),
  ADD KEY `id_nilai` (`id_nilai`),
  ADD KEY `id_alternatif` (`id_subkriteria`),
  ADD KEY `kode_pola` (`kode_pola`);

--
-- Indeks untuk tabel `penilaian`
--
ALTER TABLE `penilaian`
  ADD PRIMARY KEY (`id_nilai`),
  ADD KEY `id_alternatif` (`id_subkriteria`) USING BTREE,
  ADD KEY `kode_pola` (`kode_pola`),
  ADD KEY `id_kriteria` (`id_kriteria`);

--
-- Indeks untuk tabel `skala`
--
ALTER TABLE `skala`
  ADD PRIMARY KEY (`id_skala`);

--
-- Indeks untuk tabel `sub_kriteria`
--
ALTER TABLE `sub_kriteria`
  ADD PRIMARY KEY (`id_subkriteria`),
  ADD KEY `skala` (`id_skala`),
  ADD KEY `id_kriteria` (`id_kriteria`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `alternatif`
--
ALTER TABLE `alternatif`
  MODIFY `id_alternatif` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `bobot_preferensi`
--
ALTER TABLE `bobot_preferensi`
  MODIFY `id_BP` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `kriteria`
--
ALTER TABLE `kriteria`
  MODIFY `id_kriteria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `nilai_total`
--
ALTER TABLE `nilai_total`
  MODIFY `id_nilaiTotal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT untuk tabel `normalisasi`
--
ALTER TABLE `normalisasi`
  MODIFY `id_normalisasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=150;

--
-- AUTO_INCREMENT untuk tabel `penilaian`
--
ALTER TABLE `penilaian`
  MODIFY `id_nilai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=98;

--
-- AUTO_INCREMENT untuk tabel `skala`
--
ALTER TABLE `skala`
  MODIFY `id_skala` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `sub_kriteria`
--
ALTER TABLE `sub_kriteria`
  MODIFY `id_subkriteria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `bobot_preferensi`
--
ALTER TABLE `bobot_preferensi`
  ADD CONSTRAINT `bobot_preferensi_ibfk_1` FOREIGN KEY (`id_kriteria`) REFERENCES `kriteria` (`id_kriteria`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `nilai_total`
--
ALTER TABLE `nilai_total`
  ADD CONSTRAINT `nilai_total_ibfk_1` FOREIGN KEY (`kode_pola`) REFERENCES `data_siswa` (`kode_pola`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `normalisasi`
--
ALTER TABLE `normalisasi`
  ADD CONSTRAINT `normalisasi_ibfk_2` FOREIGN KEY (`id_nilai`) REFERENCES `penilaian` (`id_nilai`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `normalisasi_ibfk_3` FOREIGN KEY (`kode_pola`) REFERENCES `data_siswa` (`kode_pola`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `normalisasi_ibfk_4` FOREIGN KEY (`id_subkriteria`) REFERENCES `sub_kriteria` (`id_subkriteria`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `penilaian`
--
ALTER TABLE `penilaian`
  ADD CONSTRAINT `penilaian_ibfk_3` FOREIGN KEY (`kode_pola`) REFERENCES `data_siswa` (`kode_pola`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `penilaian_ibfk_4` FOREIGN KEY (`id_subkriteria`) REFERENCES `sub_kriteria` (`id_subkriteria`),
  ADD CONSTRAINT `penilaian_ibfk_5` FOREIGN KEY (`id_kriteria`) REFERENCES `kriteria` (`id_kriteria`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `sub_kriteria`
--
ALTER TABLE `sub_kriteria`
  ADD CONSTRAINT `sub_kriteria_ibfk_1` FOREIGN KEY (`id_skala`) REFERENCES `skala` (`id_skala`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `sub_kriteria_ibfk_2` FOREIGN KEY (`id_kriteria`) REFERENCES `kriteria` (`id_kriteria`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
