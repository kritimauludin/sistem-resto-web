-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 05 Okt 2022 pada 16.05
-- Versi server: 10.4.21-MariaDB
-- Versi PHP: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_resto`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `daftar_makanan`
--

CREATE TABLE `daftar_makanan` (
  `id` int(11) NOT NULL,
  `nama_makanan` varchar(256) NOT NULL,
  `harga` int(11) NOT NULL,
  `status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `daftar_makanan`
--

INSERT INTO `daftar_makanan` (`id`, `nama_makanan`, `harga`, `status`) VALUES
(3, 'Paket 15.000(ayam, nasi)', 15000, 'Tersedia'),
(4, 'Paket 50.000 (Ayam Goreng , Bakwan, Sayur)', 50000, 'Habis'),
(6, 'Paket 40.000 (Ayam Sayur, Nasi)', 40000, 'Tersedia');

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksi`
--

CREATE TABLE `transaksi` (
  `id` int(11) NOT NULL,
  `email` varchar(256) NOT NULL,
  `nama_makanan` varchar(256) NOT NULL,
  `harga_satuan` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `status_bayar` varchar(256) NOT NULL,
  `uang_bayar` int(11) NOT NULL,
  `kembalian` int(11) NOT NULL,
  `tanggal` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `transaksi`
--

INSERT INTO `transaksi` (`id`, `email`, `nama_makanan`, `harga_satuan`, `jumlah`, `total`, `status_bayar`, `uang_bayar`, `kembalian`, `tanggal`) VALUES
(16, 'pelanggan@gmail.com', 'Paket 15.000(ayam, nasi)', 15000, 2, 30000, '1', 30000, 0, '06 Jan 2022'),
(17, 'pelanggan@gmail.com', 'Paket 40.000 (Ayam Sayur, Nasi)', 40000, 3, 120000, '0', 0, 0, '05 Oct 2022');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `image` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `role_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `image`, `password`, `role_id`) VALUES
(1, 'Kriti Mauludin', 'admin@gmail.com', 'default.jpg', '$2y$10$Fu7715n0v8.lOS1xVehkfeZrHCRRlZ71eNCTA0GQZfgFLGLixNlNa', 1),
(3, 'Pelanggan', 'pelanggan@gmail.com', 'default.jpg', '$2y$10$Fu7715n0v8.lOS1xVehkfeZrHCRRlZ71eNCTA0GQZfgFLGLixNlNa', 2),
(4, 'Koki', 'koki@gmail.com', 'default.jpg', '$2y$10$Fu7715n0v8.lOS1xVehkfeZrHCRRlZ71eNCTA0GQZfgFLGLixNlNa', 3),
(6, 'Kasir', 'kasir@gmail.com', 'default.jpg', '$2y$10$Fu7715n0v8.lOS1xVehkfeZrHCRRlZ71eNCTA0GQZfgFLGLixNlNa', 4);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_access_menu`
--

CREATE TABLE `user_access_menu` (
  `id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user_access_menu`
--

INSERT INTO `user_access_menu` (`id`, `role_id`, `menu_id`) VALUES
(1, 1, 1),
(2, 1, 2),
(7, 1, 3),
(8, 1, 22),
(9, 6, 2),
(11, 6, 22),
(12, 6, 23),
(14, 1, 24),
(16, 1, 23),
(17, 1, 25),
(18, 2, 2),
(20, 1, 26),
(23, 3, 25),
(24, 3, 26),
(26, 2, 26),
(27, 1, 27),
(30, 1, 28),
(31, 2, 29),
(39, 1, 30),
(40, 1, 31),
(43, 3, 2),
(44, 3, 31),
(45, 4, 2),
(49, 3, 28),
(50, 4, 27),
(51, 1, 29);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_menu`
--

CREATE TABLE `user_menu` (
  `id` int(11) NOT NULL,
  `menu` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user_menu`
--

INSERT INTO `user_menu` (`id`, `menu`) VALUES
(1, 'admin'),
(2, 'user'),
(3, 'Menu'),
(27, 'transaksi'),
(28, 'Makanan'),
(29, 'Pesanan'),
(31, 'koki');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_role`
--

CREATE TABLE `user_role` (
  `id` int(11) NOT NULL,
  `role` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user_role`
--

INSERT INTO `user_role` (`id`, `role`) VALUES
(1, 'administrator'),
(2, 'pelanggan'),
(3, 'koki'),
(4, 'kasir');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_sub_menu`
--

CREATE TABLE `user_sub_menu` (
  `id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL,
  `title` varchar(128) NOT NULL,
  `url` varchar(128) NOT NULL,
  `icon` varchar(128) NOT NULL,
  `is_active` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user_sub_menu`
--

INSERT INTO `user_sub_menu` (`id`, `menu_id`, `title`, `url`, `icon`, `is_active`) VALUES
(2, 2, 'My Profile', 'user', 'fas fa-fw fa-user', 1),
(5, 3, 'Menu Management', 'menu', 'fas fa-fw fa-folder', 1),
(6, 3, 'Submenu Management', 'menu/submenu', 'fas fa-fw fa-folder-open', 1),
(11, 1, 'Role', 'admin', 'fas fa-fw fa-user-tie', 1),
(19, 24, 'Category Management', 'category', 'fas fa-fw fa-globe', 1),
(22, 25, 'My Vacancies', 'company', 'fas fa-fw fa-user-md', 1),
(23, 26, 'All Vacancies', 'Job', 'fas fa-fw fa-globe', 1),
(26, 28, 'Daftar Makanan', 'makanan', 'fas fa-fw fa-utensils', 1),
(27, 27, 'Daftar Transaksi', 'transaksi', 'fas fa-fw fa-shopping-cart', 1),
(29, 29, 'Pesan Makanan', 'pesanan', 'fas fa-fw fa-shopping-cart', 1),
(30, 31, 'Menunggu Proses', 'koki', 'fas fa-fw fa-spinner', 1);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `daftar_makanan`
--
ALTER TABLE `daftar_makanan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user_access_menu`
--
ALTER TABLE `user_access_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user_menu`
--
ALTER TABLE `user_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user_role`
--
ALTER TABLE `user_role`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `daftar_makanan`
--
ALTER TABLE `daftar_makanan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `user_access_menu`
--
ALTER TABLE `user_access_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT untuk tabel `user_menu`
--
ALTER TABLE `user_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT untuk tabel `user_role`
--
ALTER TABLE `user_role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT untuk tabel `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
