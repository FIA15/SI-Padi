-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 28 Des 2022 pada 05.01
-- Versi server: 10.4.22-MariaDB
-- Versi PHP: 8.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `magang`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `bantuan`
--

CREATE TABLE `bantuan` (
  `id_bantuan` varchar(7) NOT NULL,
  `nama_bantuan` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `bantuan`
--

INSERT INTO `bantuan` (`id_bantuan`, `nama_bantuan`) VALUES
('BNT-001', 'KURSI RODA'),
('BNT-002', 'TONGKAT');

-- --------------------------------------------------------

--
-- Struktur dari tabel `client`
--

CREATE TABLE `client` (
  `nik_p` varchar(16) NOT NULL,
  `id_kecamatan` varchar(5) NOT NULL,
  `id_desa` varchar(5) NOT NULL,
  `nama_client` varchar(30) NOT NULL,
  `tempatlahir` varchar(20) NOT NULL,
  `tgllahir` date NOT NULL,
  `alamat` text NOT NULL,
  `notelp` varchar(13) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `client`
--

INSERT INTO `client` (`nik_p`, `id_kecamatan`, `id_desa`, `nama_client`, `tempatlahir`, `tgllahir`, `alamat`, `notelp`) VALUES
('1231312', '010', '01001', 'ASDAD', 'KARAWANG', '2021-10-27', 'asdad', '123123'),
('123456', '010', '01011', 'CLIENT 123456', 'KARAWANG', '1888-12-11', 'asdasdasdasdasda', '123123'),
('222', '011', '01011', 'CLIENT 2', 'KARAWANG BARAT', '1998-10-27', 'Adiarsa Lapang', '09321'),
('3215011092123123', '010', '01012', 'CLIENT 2', 'KARAWANG', '1880-11-17', 'karawang', '09099999'),
('333', '020', '01001', 'CLIENT 3', 'KARAWANG', '1987-01-29', 'adasdasd', '09099999');

-- --------------------------------------------------------

--
-- Struktur dari tabel `desa`
--

CREATE TABLE `desa` (
  `id_kecamatan` varchar(5) NOT NULL,
  `id_desa` varchar(5) NOT NULL,
  `nama_desa` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `desa`
--

INSERT INTO `desa` (`id_kecamatan`, `id_desa`, `nama_desa`) VALUES
('010', '01001', 'MEDALSARI'),
('020', '0101', 'ADIARSA BARAT'),
('011', '01011', 'KERTASARI'),
('020', '01012', 'CINTAASIH');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jabatan`
--

CREATE TABLE `jabatan` (
  `id_jabatan` varchar(6) NOT NULL,
  `nama_jabatan` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `jabatan`
--

INSERT INTO `jabatan` (`id_jabatan`, `nama_jabatan`) VALUES
('JB-001', 'KEPALA DINAS'),
('JB-002', 'KASIE'),
('JB-003', 'KECAMATAN'),
('JB-004', 'DESA / KELURAHAN');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kecamatan`
--

CREATE TABLE `kecamatan` (
  `id_kecamatan` varchar(5) NOT NULL,
  `nama_kecamatan` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `kecamatan`
--

INSERT INTO `kecamatan` (`id_kecamatan`, `nama_kecamatan`) VALUES
('010', 'PANGKALAN'),
('011', 'TEGALWARU'),
('020', 'CIAMPEL');

-- --------------------------------------------------------

--
-- Struktur dari tabel `nmcamat`
--

CREATE TABLE `nmcamat` (
  `nip_c` varchar(18) NOT NULL,
  `id_kecamatan` varchar(5) NOT NULL,
  `nama_camat` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `nmcamat`
--

INSERT INTO `nmcamat` (`nip_c`, `id_kecamatan`, `nama_camat`) VALUES
('122', '011', 'CAMAT B'),
('123123', '010', 'CAMAT A');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pegawai`
--

CREATE TABLE `pegawai` (
  `nip` varchar(18) NOT NULL,
  `id_jabatan` varchar(6) NOT NULL,
  `id_kecamatan` varchar(5) NOT NULL,
  `id_desa` varchar(5) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `tempatlahir` varchar(20) NOT NULL,
  `alamat` text NOT NULL,
  `notelp` varchar(13) NOT NULL,
  `email` varchar(35) NOT NULL,
  `tgl_lahir` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pegawai`
--

INSERT INTO `pegawai` (`nip`, `id_jabatan`, `id_kecamatan`, `id_desa`, `nama`, `tempatlahir`, `alamat`, `notelp`, `email`, `tgl_lahir`) VALUES
('1001', 'JB-004', '010', '01001', 'FIKRY IKHSAN ANSHORI', 'KARAWANG', 'JL. ADIARSA LAPANG, RT.03/08', '0897XXXXXXX', 'fikry@fikry.com', '2021-12-31'),
('1002', 'JB-004', '011', '01001', 'GATAU LUPA', 'KARAWANG', 'JL. DOANG MAKAN ENGGAK', '0821XXXXXXXX', 'email@email.com', '2021-12-31'),
('12312312', 'JB-002', '011', '01011', 'AH GATAU', 'KARAWANG', 'gapunya', '09321', 'admin@gmail.com', '2021-12-31'),
('123123123', 'JB-003', '020', '01012', 'GAPUNYA NAMA', 'KARAWANG', 'asdas', '198782', 'dewisugianti98@gmail', '1999-11-28'),
('196103161986031008', 'JB-001', '020', '01011', 'BARU', 'KARAWANG', 'Babakan Sananga, Rt.01/Rw.19, Kel. Adiarsa Barat, Kec. Karawang Barat', '09099999', 'zamrud1@gmail.com', '2021-12-20');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengajuan`
--

CREATE TABLE `pengajuan` (
  `id_pengajuan` varchar(20) NOT NULL,
  `nip` varchar(18) NOT NULL,
  `id_kecamatan` varchar(5) NOT NULL,
  `nip_c` varchar(18) NOT NULL,
  `id_desa` varchar(5) NOT NULL,
  `id_bantuan` varchar(7) NOT NULL,
  `nik_p` varchar(16) NOT NULL,
  `user_id` varchar(50) NOT NULL,
  `tanggal_pengajuan` date NOT NULL,
  `ktp` varchar(50) NOT NULL,
  `kk` varchar(50) NOT NULL,
  `sktm` varchar(50) NOT NULL,
  `fpeng` varchar(50) NOT NULL COMMENT 'foto keadaan yang mengajukan',
  `rpeng` varchar(50) NOT NULL COMMENT 'FOTO KEADAAN RUMAH pengaju',
  `approve1` int(1) NOT NULL DEFAULT 0,
  `ket1` text NOT NULL,
  `approve2` int(1) NOT NULL DEFAULT 0,
  `ket2` text NOT NULL,
  `approve3` int(1) NOT NULL DEFAULT 0,
  `ket3` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pengajuan`
--

INSERT INTO `pengajuan` (`id_pengajuan`, `nip`, `id_kecamatan`, `nip_c`, `id_desa`, `id_bantuan`, `nik_p`, `user_id`, `tanggal_pengajuan`, `ktp`, `kk`, `sktm`, `fpeng`, `rpeng`, `approve1`, `ket1`, `approve2`, `ket2`, `approve3`, `ket3`) VALUES
('PENG-001/01001/010/0', '12312312', '010', '123123', '01001', 'BNT-001', '1231312', 'd260f295-5318-4790-81e7-645056f0af3d', '2022-01-03', 'KTP-030122-61d2fb46a080b.png', 'KK-030122-61d2fb46a15a4.png', 'SKTM-030122-61d2fb46a1caa.png', 'FPENG-030122-61d2fb46a2422.png', 'RPENG-030122-61d2fb46a2af5.png', 1, '', 1, '', 1, ''),
('PENG-002/01001/010/0', '12312312', '010', '123123', '01001', 'BNT-001', '333', 'd260f295-5318-4790-81e7-645056f0af3d', '2022-01-06', 'KTP-060122-61d6dee9afe0f.jpeg', 'KK-060122-61d6dee9b057a.jpeg', 'SKTM-060122-61d6dee9b0cc5.jpeg', 'FPENG-060122-61d6dee9b155c.jpeg', 'RPENG-060122-61d6dee9b1d0d.jpeg', 1, '', 0, '', 0, '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `user_id` varchar(50) NOT NULL,
  `nip` varchar(18) NOT NULL,
  `id_kecamatan` varchar(5) NOT NULL,
  `id_desa` varchar(5) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(40) NOT NULL,
  `level` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`user_id`, `nip`, `id_kecamatan`, `id_desa`, `username`, `password`, `level`) VALUES
('07098d2c-8cea-4b4b-bc67-805c1e57503d', '123123123', '010', '01001', '123123123', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'Kabid'),
('66a94986-c42d-45dc-acb4-57adc4d06c62', '1002', '010', '01001', '1002', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'Kecamatan'),
('c901a01d-29c8-4bde-b27b-9d417bc81545', '196103161986031008', '010', '01001', 'admin', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'Admin'),
('d260f295-5318-4790-81e7-645056f0af3d', '12312312', '010', '01001', '12312312', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'User');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `bantuan`
--
ALTER TABLE `bantuan`
  ADD PRIMARY KEY (`id_bantuan`);

--
-- Indeks untuk tabel `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`nik_p`),
  ADD KEY `id_desa` (`id_desa`),
  ADD KEY `id_kecamatan` (`id_kecamatan`);

--
-- Indeks untuk tabel `desa`
--
ALTER TABLE `desa`
  ADD PRIMARY KEY (`id_desa`),
  ADD KEY `id_kecamatan` (`id_kecamatan`);

--
-- Indeks untuk tabel `jabatan`
--
ALTER TABLE `jabatan`
  ADD PRIMARY KEY (`id_jabatan`);

--
-- Indeks untuk tabel `kecamatan`
--
ALTER TABLE `kecamatan`
  ADD PRIMARY KEY (`id_kecamatan`);

--
-- Indeks untuk tabel `nmcamat`
--
ALTER TABLE `nmcamat`
  ADD PRIMARY KEY (`nip_c`),
  ADD KEY `id_kecamatan` (`id_kecamatan`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
