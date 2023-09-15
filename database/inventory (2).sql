-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 01 Jul 2023 pada 07.33
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
-- Database: `inventory`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `alokasi`
--

CREATE TABLE `alokasi` (
  `id_alokasi` int(11) NOT NULL,
  `supply_point` varchar(50) NOT NULL,
  `berat` int(11) NOT NULL,
  `tgl` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `dokumentasi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `alokasi`
--

INSERT INTO `alokasi` (`id_alokasi`, `supply_point`, `berat`, `tgl`, `dokumentasi`) VALUES
(1, 'bulog', 7327640, '2023-05-09 04:49:40', 'Foto'),
(2, 'Manokwari', 2845630, '0000-00-00 00:00:00', 'foto 2'),
(3, 'Sorong', 2528920, '2023-05-09 07:45:56', 'foto'),
(4, 'Fakfak', 1953090, '2023-05-09 07:52:10', 'foto');

-- --------------------------------------------------------

--
-- Struktur dari tabel `bulog`
--

CREATE TABLE `bulog` (
  `id_bulog` int(11) NOT NULL,
  `id_stok_bulog` int(11) NOT NULL,
  `supply_point` varchar(50) NOT NULL,
  `kg` int(11) NOT NULL,
  `tgl` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `dokumentasi` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `bulog`
--

INSERT INTO `bulog` (`id_bulog`, `id_stok_bulog`, `supply_point`, `kg`, `tgl`, `dokumentasi`) VALUES
(22, 9, 'Fakfak', 0, '2023-05-09 03:31:23', 'truk_kantor_pos1.jpg'),
(23, 9, 'Sorong', 1560740, '2023-05-09 07:57:53', 'truk_kantor_pos2.jpg'),
(24, 9, 'Manokwari', 1968050, '2023-05-09 06:43:27', 'truk_kantor_pos3.jpg');

--
-- Trigger `bulog`
--
DELIMITER $$
CREATE TRIGGER `update_stock` AFTER INSERT ON `bulog` FOR EACH ROW BEGIN
UPDATE stok SET 
kg = kg - new.kg
WHERE id_stok_bulog =new.id_stok_bulog;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `kabupaten`
--

CREATE TABLE `kabupaten` (
  `id_kabupaten` int(11) NOT NULL,
  `id_supply` int(11) NOT NULL,
  `nama_kabupaten` varchar(150) NOT NULL,
  `kg` varchar(10) NOT NULL,
  `tgl` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `dokumentasi` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Trigger `kabupaten`
--
DELIMITER $$
CREATE TRIGGER `tambah_kabupaten` AFTER INSERT ON `kabupaten` FOR EACH ROW BEGIN
UPDATE supply_point SET 
kg = kg - new.kg
WHERE id_supply =new.id_supply;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `sbrg_keluar`
--

CREATE TABLE `sbrg_keluar` (
  `id_keluar` int(11) NOT NULL,
  `tgl` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `kota_tujuan` varchar(50) NOT NULL,
  `distrik` varchar(20) NOT NULL,
  `kg` varchar(10) NOT NULL,
  `ekspedisi` text NOT NULL,
  `dokumentasi` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `sbrg_keluar`
--

INSERT INTO `sbrg_keluar` (`id_keluar`, `tgl`, `kota_tujuan`, `distrik`, `kg`, `ekspedisi`, `dokumentasi`) VALUES
(20, '2023-03-27 07:59:03', 'Pegunugan Arfak', 'Pegunungan Arfak', '104000', 'kurir truk', 'TRUK-BERAS-REMBANG-BAHIEN-29.jpg'),
(21, '2023-03-28 03:17:13', 'Manokwari', 'Hink', '120', 'Grandmax Pos', 'TRUK-BERAS-REMBANG-BAHIEN-210.jpg');

--
-- Trigger `sbrg_keluar`
--
DELIMITER $$
CREATE TRIGGER `add_brg_kluar` BEFORE INSERT ON `sbrg_keluar` FOR EACH ROW BEGIN
UPDATE sstock_brg SET
kg = kg-new.kg;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `sbrg_masuk`
--

CREATE TABLE `sbrg_masuk` (
  `id_masuk` int(11) NOT NULL,
  `tgl` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `kg` varchar(10) NOT NULL,
  `keterangan` text NOT NULL,
  `dokumentasi` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `sbrg_masuk`
--

INSERT INTO `sbrg_masuk` (`id_masuk`, `tgl`, `kg`, `keterangan`, `dokumentasi`) VALUES
(28, '2023-03-27 07:58:42', '2528530', 'kiriman awal', 'TRUK-BERAS-REMBANG-BAHIEN-28.jpg');

--
-- Trigger `sbrg_masuk`
--
DELIMITER $$
CREATE TRIGGER `add_brg_masuk` AFTER INSERT ON `sbrg_masuk` FOR EACH ROW BEGIN
UPDATE sstock_brg SET
kg=kg+new.kg;
end
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `add_stok` AFTER INSERT ON `sbrg_masuk` FOR EACH ROW BEGIN
INSERT INTO sstock_brg SET
kg=new.kg,
keterangan=new.keterangan;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `sstock_brg`
--

CREATE TABLE `sstock_brg` (
  `id_stok` int(11) NOT NULL,
  `tgl_masuk` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `kg` varchar(20) NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `sstock_brg`
--

INSERT INTO `sstock_brg` (`id_stok`, `tgl_masuk`, `kg`, `keterangan`) VALUES
(252, '2023-03-28 03:17:13', '2424410', 'kiriman awal');

-- --------------------------------------------------------

--
-- Struktur dari tabel `stok`
--

CREATE TABLE `stok` (
  `id_stok_bulog` int(11) NOT NULL,
  `tgl` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `kg` varchar(10) NOT NULL,
  `keterangan` text NOT NULL,
  `dokumentasi` varchar(150) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `stok`
--

INSERT INTO `stok` (`id_stok_bulog`, `tgl`, `kg`, `keterangan`, `dokumentasi`) VALUES
(9, '2023-05-09 03:27:55', '0', 'Kiriman 1', 'truk_kantor_pos.jpg'),
(10, '2023-05-09 06:17:34', '7327640', 'Kiriman 2', 'truk_kantor_pos6.jpg'),
(11, '2023-05-09 06:18:46', '7327640', 'KIRIMAN 3', 'truk_kantor_pos7.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `stok2`
--

CREATE TABLE `stok2` (
  `id_stok2` int(11) NOT NULL,
  `tgl` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `kg` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `stok2`
--

INSERT INTO `stok2` (`id_stok2`, `tgl`, `kg`) VALUES
(1, '2023-05-04 04:16:41', 7000000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `supply_point`
--

CREATE TABLE `supply_point` (
  `id_supply` int(11) NOT NULL,
  `id_bulog` int(11) NOT NULL,
  `kabupaten` varchar(50) NOT NULL,
  `kg` varchar(10) NOT NULL,
  `tgl` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `dokumentasi` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `supply_point`
--

INSERT INTO `supply_point` (`id_supply`, `id_bulog`, `kabupaten`, `kg`, `tgl`, `dokumentasi`) VALUES
(30, 22, 'Kabupaten Fakfak', '1229090', '2023-05-09 03:30:30', 'truk_kantor_pos4.jpg'),
(31, 22, 'Kabupaten Kaimana', '724000', '2023-05-09 03:31:23', 'truk_kantor_pos5.jpg'),
(33, 24, 'Kabupaten Manokwari', '50000', '2023-05-09 06:33:59', 'truk_kantor_pos9.jpg'),
(34, 24, 'Kabupaten Manokwari', '100000', '2023-05-09 06:34:28', 'truk_kantor_pos10.jpg'),
(35, 24, 'KABUPATEN TELUK BINTUNI', '300000', '2023-05-09 06:35:23', 'truk_kantor_pos11.jpg'),
(36, 24, 'KABUPATEN TELUK WONDAMA', '175000', '2023-05-09 06:43:27', 'truk_kantor_pos12.jpg'),
(37, 23, 'KABUPATEN SORONG', '100000', '2023-05-09 07:39:13', 'truk_kantor_pos13.jpg'),
(38, 23, 'KABUPATEN SORONG SELATAN', '330660', '2023-05-09 07:39:54', 'truk_kantor_pos14.jpg'),
(39, 23, 'KABUPATEN RAJA AMPAT', '537520', '2023-05-09 07:57:53', 'truk_kantor_pos15.jpg');

--
-- Trigger `supply_point`
--
DELIMITER $$
CREATE TRIGGER `update_bulog` AFTER INSERT ON `supply_point` FOR EACH ROW BEGIN
UPDATE bulog SET 
kg = kg - new.kg
WHERE id_bulog =new.id_bulog;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `nipos` int(11) NOT NULL,
  `hak_akses` enum('Kurir','Kepala Cabang') NOT NULL,
  `nama` varchar(50) NOT NULL,
  `username` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(10) NOT NULL,
  `no_telp` varchar(15) NOT NULL,
  `nopen` varchar(20) NOT NULL,
  `status_pegawai` enum('aktif','tidak aktif') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `nipos`, `hak_akses`, `nama`, `username`, `email`, `password`, `no_telp`, `nopen`, `status_pegawai`) VALUES
(1234, 1111, 'Kepala Cabang', 'Siti Fatimah', 'sifa', 'fsiti4605@gmail.com', '123', '08228139615', 'jalan banda', 'aktif'),
(1235, 568393, 'Kepala Cabang', 'Hanni Tria', 'Hanni', 'Hanni45@gmail.com', '123', '0809377236723', '7890123', 'aktif');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `alokasi`
--
ALTER TABLE `alokasi`
  ADD PRIMARY KEY (`id_alokasi`);

--
-- Indeks untuk tabel `bulog`
--
ALTER TABLE `bulog`
  ADD PRIMARY KEY (`id_bulog`),
  ADD KEY `id_stok_bulog` (`id_stok_bulog`);

--
-- Indeks untuk tabel `kabupaten`
--
ALTER TABLE `kabupaten`
  ADD PRIMARY KEY (`id_kabupaten`),
  ADD KEY `id_supply` (`id_supply`);

--
-- Indeks untuk tabel `sbrg_keluar`
--
ALTER TABLE `sbrg_keluar`
  ADD PRIMARY KEY (`id_keluar`);

--
-- Indeks untuk tabel `sbrg_masuk`
--
ALTER TABLE `sbrg_masuk`
  ADD PRIMARY KEY (`id_masuk`);

--
-- Indeks untuk tabel `sstock_brg`
--
ALTER TABLE `sstock_brg`
  ADD PRIMARY KEY (`id_stok`);

--
-- Indeks untuk tabel `stok`
--
ALTER TABLE `stok`
  ADD PRIMARY KEY (`id_stok_bulog`);

--
-- Indeks untuk tabel `stok2`
--
ALTER TABLE `stok2`
  ADD PRIMARY KEY (`id_stok2`);

--
-- Indeks untuk tabel `supply_point`
--
ALTER TABLE `supply_point`
  ADD PRIMARY KEY (`id_supply`),
  ADD KEY `id_bulog` (`id_bulog`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `alokasi`
--
ALTER TABLE `alokasi`
  MODIFY `id_alokasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `bulog`
--
ALTER TABLE `bulog`
  MODIFY `id_bulog` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT untuk tabel `kabupaten`
--
ALTER TABLE `kabupaten`
  MODIFY `id_kabupaten` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `sbrg_keluar`
--
ALTER TABLE `sbrg_keluar`
  MODIFY `id_keluar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT untuk tabel `sbrg_masuk`
--
ALTER TABLE `sbrg_masuk`
  MODIFY `id_masuk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT untuk tabel `sstock_brg`
--
ALTER TABLE `sstock_brg`
  MODIFY `id_stok` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=253;

--
-- AUTO_INCREMENT untuk tabel `stok`
--
ALTER TABLE `stok`
  MODIFY `id_stok_bulog` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `stok2`
--
ALTER TABLE `stok2`
  MODIFY `id_stok2` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `supply_point`
--
ALTER TABLE `supply_point`
  MODIFY `id_supply` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1236;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `bulog`
--
ALTER TABLE `bulog`
  ADD CONSTRAINT `bulog_ibfk_1` FOREIGN KEY (`id_stok_bulog`) REFERENCES `stok` (`id_stok_bulog`);

--
-- Ketidakleluasaan untuk tabel `kabupaten`
--
ALTER TABLE `kabupaten`
  ADD CONSTRAINT `kabupaten_ibfk_1` FOREIGN KEY (`id_supply`) REFERENCES `supply_point` (`id_supply`);

--
-- Ketidakleluasaan untuk tabel `supply_point`
--
ALTER TABLE `supply_point`
  ADD CONSTRAINT `supply_point_ibfk_1` FOREIGN KEY (`id_bulog`) REFERENCES `bulog` (`id_bulog`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
