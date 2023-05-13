-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 13 Bulan Mei 2023 pada 08.53
-- Versi server: 10.4.24-MariaDB
-- Versi PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `danau_abah`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `jenis_makanan`
--

CREATE TABLE `jenis_makanan` (
  `id_jenis_makanan` int(11) NOT NULL,
  `nama_jenis_makanan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `jenis_makanan`
--

INSERT INTO `jenis_makanan` (`id_jenis_makanan`, `nama_jenis_makanan`) VALUES
(1, 'Goreng'),
(2, 'Tumisan'),
(3, 'Sate'),
(4, 'Lainnya');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jenis_minuman`
--

CREATE TABLE `jenis_minuman` (
  `id_jenis_minuman` int(11) NOT NULL,
  `nama_jenis_minuman` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `jenis_minuman`
--

INSERT INTO `jenis_minuman` (`id_jenis_minuman`, `nama_jenis_minuman`) VALUES
(1, 'Basic'),
(2, 'Buah'),
(3, 'Coffee');

-- --------------------------------------------------------

--
-- Struktur dari tabel `makanan`
--

CREATE TABLE `makanan` (
  `id_makanan` int(11) NOT NULL,
  `id_jenis_makanan` int(11) NOT NULL,
  `nama_makanan` varchar(50) NOT NULL,
  `harga_makanan` varchar(11) NOT NULL,
  `gambar_makanan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `makanan`
--

INSERT INTO `makanan` (`id_makanan`, `id_jenis_makanan`, `nama_makanan`, `harga_makanan`, `gambar_makanan`) VALUES
(1, 1, 'Ayam Baby Boiler', '23K', 'ayambb.jpeg'),
(2, 1, 'Ayam Kampung', '22K', 'ayamkampung.jpeg'),
(3, 1, 'Bakwan Jagung', '10K', 'desktop-wallpaper-the-way-you-play-yae-miko-could-be-totally-different-in-next-genshin-update-genshin-impact-yae-miko.jpg'),
(4, 1, 'Ikan Gurame', '20K', 'ikangurame.jpeg'),
(5, 1, 'Bebek Goreng', '21K', 'bg1.jpg'),
(6, 4, 'Karedok', '12K', 'bg1.jpg'),
(7, 2, 'Tumis Toge', '15K', 'bg4.jpg'),
(8, 3, 'Sate Paru', '15K', 'about2.jpeg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `menu`
--

CREATE TABLE `menu` (
  `id_menu` int(11) NOT NULL,
  `nama_menu` varchar(50) NOT NULL,
  `jenis_menu` enum('food','beverage') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `menu`
--

INSERT INTO `menu` (`id_menu`, `nama_menu`, `jenis_menu`) VALUES
(1, 'Makanan', 'food'),
(2, 'Minuman', 'beverage');

-- --------------------------------------------------------

--
-- Struktur dari tabel `minuman`
--

CREATE TABLE `minuman` (
  `id_minuman` int(11) NOT NULL,
  `id_jenis_minuman` int(11) NOT NULL,
  `nama_minuman` varchar(50) NOT NULL,
  `harga_minuman` varchar(11) NOT NULL,
  `gambar_minuman` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `minuman`
--

INSERT INTO `minuman` (`id_minuman`, `id_jenis_minuman`, `nama_minuman`, `harga_minuman`, `gambar_minuman`) VALUES
(1, 1, 'Air Mineral', '7K', 'bg1.jpg'),
(2, 1, 'Teh Tawar', '5K', 'bg4.jpg'),
(3, 1, 'Es Teh Tawar', '6K', 'desktop-wallpaper-the-way-you-play-yae-miko-could-be-totally-different-in-next-genshin-update-genshin-impact-yae-miko.jpg'),
(4, 1, 'Teh Manis', '7.5K', 'about2.jpeg'),
(5, 1, 'Es Teh Manis', '8K', 'testaja.jpg'),
(6, 2, 'Jus Alpukat', '19K', 'slide3.png'),
(7, 2, 'Jus Strawberry', '19K', 'bg4.jpg'),
(8, 3, 'Kopi Senja', '20K', 'remini.jpeg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `username`, `password`) VALUES
(1, 'admin', '123');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `jenis_makanan`
--
ALTER TABLE `jenis_makanan`
  ADD PRIMARY KEY (`id_jenis_makanan`);

--
-- Indeks untuk tabel `jenis_minuman`
--
ALTER TABLE `jenis_minuman`
  ADD PRIMARY KEY (`id_jenis_minuman`);

--
-- Indeks untuk tabel `makanan`
--
ALTER TABLE `makanan`
  ADD PRIMARY KEY (`id_makanan`),
  ADD KEY `id_jenis_makanan` (`id_jenis_makanan`);

--
-- Indeks untuk tabel `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id_menu`);

--
-- Indeks untuk tabel `minuman`
--
ALTER TABLE `minuman`
  ADD PRIMARY KEY (`id_minuman`),
  ADD KEY `id_jenis_minuman` (`id_jenis_minuman`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `makanan`
--
ALTER TABLE `makanan`
  MODIFY `id_makanan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `minuman`
--
ALTER TABLE `minuman`
  MODIFY `id_minuman` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `makanan`
--
ALTER TABLE `makanan`
  ADD CONSTRAINT `makanan_ibfk_1` FOREIGN KEY (`id_jenis_makanan`) REFERENCES `jenis_makanan` (`id_jenis_makanan`);

--
-- Ketidakleluasaan untuk tabel `minuman`
--
ALTER TABLE `minuman`
  ADD CONSTRAINT `minuman_ibfk_1` FOREIGN KEY (`id_jenis_minuman`) REFERENCES `jenis_minuman` (`id_jenis_minuman`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
