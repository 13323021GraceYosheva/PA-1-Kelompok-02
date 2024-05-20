-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 02 Bulan Mei 2024 pada 17.24
-- Versi server: 10.4.27-MariaDB
-- Versi PHP: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `puskesmas`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `artikel`
--

CREATE TABLE `artikel` (
  `id_artikel` int(11) NOT NULL,
  `foto_artikel` text NOT NULL,
  `judul_artikel` varchar(225) NOT NULL,
  `slug_artikel` varchar(225) NOT NULL,
  `short_desc_artikel` text NOT NULL,
  `desc_artikel` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `dokter`
--

CREATE TABLE `dokter` (
  `id_dokter` int(11) NOT NULL,
  `nama_dokter` varchar(225) NOT NULL,
  `foto_dokter` text NOT NULL,
  `spesialis_dokter` text NOT NULL,
  `alamat_dokter` text NOT NULL,
  `no_hp_dokter` varchar(225) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `dokter`
--

INSERT INTO `dokter` (`id_dokter`, `nama_dokter`, `foto_dokter`, `spesialis_dokter`, `alamat_dokter`, `no_hp_dokter`, `created_at`, `updated_at`) VALUES
(5, 'Dr. Dummy Text 1', 'UPL_2024_May_Thu_09_25_47.png', 'Poliklinik Gigi', 'Malang', '0897882834', '2024-05-02 02:25:47', NULL),
(6, 'Dr. Dummy Text 2', 'UPL_2024_May_Thu_09_26_09.png', 'Poliklinik Jantung', 'Malang', '0897882834', '2024-05-02 02:26:09', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `jadwal_dokter`
--

CREATE TABLE `jadwal_dokter` (
  `id_jadwal` int(11) NOT NULL,
  `id_dokter` int(11) NOT NULL,
  `hari` varchar(100) NOT NULL,
  `start_jam` varchar(100) NOT NULL,
  `end_jam` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `jadwal_dokter`
--

INSERT INTO `jadwal_dokter` (`id_jadwal`, `id_dokter`, `hari`, `start_jam`, `end_jam`, `created_at`, `updated_at`) VALUES
(3, 5, 'Senin', '08:00', '16:30', '2024-05-02 02:30:05', NULL),
(4, 5, 'Kamis', '08:30', '16:30', '2024-05-02 02:30:37', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori_layanan`
--

CREATE TABLE `kategori_layanan` (
  `id_kategori_layanan` int(11) NOT NULL,
  `kategori_layanan` varchar(225) NOT NULL,
  `status_kategori_layanan` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `kategori_layanan`
--

INSERT INTO `kategori_layanan` (`id_kategori_layanan`, `kategori_layanan`, `status_kategori_layanan`, `created_at`, `updated_at`) VALUES
(3, 'Poliklinik', '1', '2024-05-02 02:24:31', NULL),
(4, 'Pemeriksaan Medis', '1', '2024-05-02 02:24:45', NULL),
(5, 'Alur Layanan', '1', '2024-05-02 02:24:55', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori_ukp`
--

CREATE TABLE `kategori_ukp` (
  `id_kategori_ukp` int(11) NOT NULL,
  `kategori_ukp` varchar(225) NOT NULL,
  `status_kategori_ukp` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `kategori_ukp`
--

INSERT INTO `kategori_ukp` (`id_kategori_ukp`, `kategori_ukp`, `status_kategori_ukp`, `created_at`, `updated_at`) VALUES
(3, 'Rawat Jalan', '1', '2024-05-02 04:08:22', NULL),
(4, 'Pemeriksaan Umum', '1', '2024-05-02 04:08:32', NULL),
(5, 'Kesehatan Keluarga', '1', '2024-05-02 04:08:43', NULL),
(6, 'Tubercolosis Paru Paru', '1', '2024-05-02 04:08:59', NULL),
(7, 'Pemeriksaan Umum', '1', '2024-05-02 04:09:13', NULL),
(8, 'Kesehatan Keluarga', '1', '2024-05-02 04:09:23', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `kegiatan`
--

CREATE TABLE `kegiatan` (
  `id_kegiatan` int(11) NOT NULL,
  `foto_kegiatan` text NOT NULL,
  `judul_kegiatan` varchar(225) NOT NULL,
  `slug_kegiatan` varchar(225) NOT NULL,
  `short_desc_kegiatan` text NOT NULL,
  `desc_kegiatan` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `update_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `kegiatan`
--

INSERT INTO `kegiatan` (`id_kegiatan`, `foto_kegiatan`, `judul_kegiatan`, `slug_kegiatan`, `short_desc_kegiatan`, `desc_kegiatan`, `created_at`, `update_at`) VALUES
(7, 'UPL_2024_May_Thu_09_22_30.png', 'Lorem ipsum', 'lorem-ipsum', 'Lorem Ipsum dolor sit met', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.\r\n\r\nSed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur?', '2024-05-02 02:22:30', NULL),
(8, 'UPL_2024_May_Thu_09_23_01.png', 'Lorem ipsum dolor sit met', 'lorem-ipsum-dolor-sit-met', 'Lorem Ipsum dolor sit met', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.\r\n\r\nSed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur?', '2024-05-02 02:23:01', NULL),
(9, 'UPL_2024_May_Thu_09_23_39.png', 'Lorem ipsum dolor sit met consectetur adipiscing elit', 'lorem-ipsum-dolor-sit-met-consectetur-adipiscing-elit', 'Lorem Ipsum dolor sit met consectetur adipiscing elit', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.\r\n\r\nSed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur?', '2024-05-02 02:23:39', NULL),
(10, 'UPL_2024_May_Thu_09_24_11.png', 'Lorem ipsum dolor sit met consectetur adipiscing elit. Ut enim ad minim veniam', 'lorem-ipsum-dolor-sit-met-consectetur-adipiscing-elit-ut-enim-ad-minim-veniam', 'Lorem ipsum dolor sit met consectetur adipiscing elit. Ut enim ad minim veniam', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.\r\n\r\nSed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur?', '2024-05-02 02:24:11', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `layanan`
--

CREATE TABLE `layanan` (
  `id_layanan` int(11) NOT NULL,
  `foto_layanan` text NOT NULL,
  `nama_layanan` varchar(225) NOT NULL,
  `slug_layanan` varchar(225) NOT NULL,
  `short_desc_layanan` text NOT NULL,
  `desc_layanan` text NOT NULL,
  `id_kategori_layanan` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `layanan`
--

INSERT INTO `layanan` (`id_layanan`, `foto_layanan`, `nama_layanan`, `slug_layanan`, `short_desc_layanan`, `desc_layanan`, `id_kategori_layanan`, `created_at`, `updated_at`) VALUES
(6, 'UPL_2024_May_Thu_11_07_04.png', 'Poliklinik Lorem Ipsum', 'poliklinik-lorem-ipsum', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.\r\n\r\nSed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur?', 3, '2024-05-02 04:07:04', NULL),
(7, 'UPL_2024_May_Thu_11_07_53.png', 'Layanan Lorem Ipsum', 'layanan-lorem-ipsum', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.\r\n\r\nSed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur?', 4, '2024-05-02 04:07:53', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `setting_puskesmas`
--

CREATE TABLE `setting_puskesmas` (
  `id_setting` int(11) NOT NULL,
  `nama_setting` varchar(225) NOT NULL,
  `default_value` text NOT NULL,
  `value` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `update_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `setting_puskesmas`
--

INSERT INTO `setting_puskesmas` (`id_setting`, `nama_setting`, `default_value`, `value`, `created_at`, `update_at`) VALUES
(16, 'nama_puskesmas', '-', 'Puskesmas JanjiMatogu', '2024-05-02 06:09:22', NULL),
(17, 'alamat_puskesmas', '-', 'Parhabinsaran Janji Matogu, Kec. Uluan, Toba, Sumatera Utara 22385', '2024-05-02 06:09:22', NULL),
(18, 'lat_puskesmas', '-', '2.4299291', '2024-05-02 06:09:22', NULL),
(19, 'lng_puskesmas', '-', '99.1049374', '2024-05-02 06:09:22', NULL),
(20, 'email_puskesmas', '-', '', '2024-05-02 06:09:22', NULL),
(21, 'no_telp', '-', '', '2024-05-02 06:09:22', NULL),
(22, 'short_deskripsi_puskesmas', '-', 'Di Desa Janjimatogu,Dinas Kesehatan Merupakan Salah Satu Perangkat Pemerintahan Di Porsea. Pembangunan Kesehatan Merupakan Bagian Dari Pembangunan Nasional Yang Bertujuan Meningkattkan Kesadaran,Kemauan,Dan Kemampuan Hidup Seha Bagi Setiap Orang Agar Terwujud Derajat Kesehatan Masyarakat Yang Setinggi Tingginya. Kesehatan Bukan Lah Hal Yang Perlu Disepelekan,Maka Dari Itu Pemerintah Membangun Puskesmas Ini.', '2024-05-02 06:09:22', NULL),
(23, 'deskripsi_puskesmas', '-', '<p><span style=\"font-family: -apple-system, BlinkMacSystemFont, \"Segoe UI\", Roboto, \"Helvetica Neue\", Arial, \"Noto Sans\", \"Liberation Sans\", sans-serif, \"Apple Color Emoji\", \"Segoe UI Emoji\", \"Segoe UI Symbol\", \"Noto Color Emoji\"; font-size: 14px;\"><font color=\"#000000\">Di Desa Janjimatogu,Dinas Kesehatan Merupakan Salah Satu Perangkat Pemerintahan Di Porsea. Pembangunan Kesehatan Merupakan Bagian Dari Pembangunan Nasional Yang Bertujuan Meningkattkan Kesadaran,Kemauan,Dan Kemampuan Hidup Seha Bagi Setiap Orang Agar Terwujud Derajat Kesehatan Masyarakat Yang Setinggi Tingginya. Kesehatan Bukan Lah Hal Yang Perlu Disepelekan,Maka Dari Itu Pemerintah Membangun Puskesmas Ini.</font></span><br></p>', '2024-05-02 06:09:22', NULL),
(24, 'visi_puskesmas', '-', '', '2024-05-02 06:09:22', NULL),
(25, 'misi_puskesmas', '-', '', '2024-05-02 06:09:22', NULL),
(26, 'struktur_organisasi', '-', '', '2024-05-02 06:09:22', NULL),
(27, 'maklumat', '-', '<p style=\"text-align: center; \"><span style=\"font-size: 1rem;\">Maklumat Pelayanan</span><br></p><p style=\"text-align: center; \">\"Dengan ini,kami menyatakan sanggup menyelenggarakan pelayanan sesuai standar pelayanan yang telah ditetapkan dengan penuh tanggung jawab serta selalu melakukan perbaikan secara terus menerus.<br><span style=\"font-size: 1rem;\">Apabila pelayanan yang di berikan tidak sesuai dengan standar pelayanan, kami siap menerima sanksi sesuai peraturan perundang undangan yang berlaku\"</span></p>', '2024-05-02 06:09:22', NULL),
(28, 'janji_layanan', '-', '<h1 style=\"text-align: center; \" class=\"\"><b>JANJI LAYANAN<br>JAMINAN KESEHATAN NASIONAL (JKN)</b></h1><p style=\"text-align: left;\" class=\"\"><b>Manajemen PT .Puskesmas Janjimatogu beserta jajaran mendukung transformasi mutu layanan yang mudah, cepat dan setara kepada peserta JKN dengan:</b></p><p style=\"text-align: left;\">1. Menerima NIK/KTP/KIS untuk pendaftaran pelayanan<br>2. Tidak meminta dokumen fotokopi kepada peserta sebagai syarat pendaftaran pelayanan<br>3. Memberikan pelayanan tanpa biaya tambahan<br>4. Melayani peserta yang berada diluar wilayah FKTP terdaftarnya sesuai dengan ketentuan<br>5. Memberikan pelayanan obat yang dibutuhkan dan tidak membebankan peserta untuk mencari obat jika terdapat kekosongan obat<br>6. Melayani Konsultasi Online kepada peserta JKN<br>7. Melayani peserta dengan ramah tanpa diskriminasi.</p>', '2024-05-02 06:09:22', NULL),
(29, 'dasar_hukum', '-', '', '2024-05-02 06:09:22', NULL),
(30, 'logo_puskesmas', '-', 'UPL_2024_May_Thu_01_09_55.png', '2024-05-02 06:09:22', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `setting_web`
--

CREATE TABLE `setting_web` (
  `id_setting` int(11) NOT NULL,
  `nama_setting` varchar(225) NOT NULL,
  `default_value` text NOT NULL,
  `value` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `update_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `ukp`
--

CREATE TABLE `ukp` (
  `id_ukp` int(11) NOT NULL,
  `foto_ukp` text NOT NULL,
  `nama_ukp` varchar(225) NOT NULL,
  `slug_ukp` varchar(225) NOT NULL,
  `short_desc_ukp` text NOT NULL,
  `desc_ukp` text NOT NULL,
  `id_kategori_ukp` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id_users` int(11) NOT NULL,
  `img_user` text NOT NULL,
  `first_name` varchar(225) NOT NULL,
  `last_name` varchar(225) NOT NULL,
  `email` varchar(225) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `update_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id_users`, `img_user`, `first_name`, `last_name`, `email`, `username`, `password`, `created_at`, `update_at`) VALUES
(1, 'UPL_2024_May_Thu_09_02_43.png', 'Administrators', '01', 'admin@admin.com', 'admin', '21232f297a57a5a743894a0e4a801fc3', '2024-04-25 02:16:00', NULL),
(2, '-', 'Administrator', '02', 'admin@admin02.com', 'admin02', '21232f297a57a5a743894a0e4a801fc3', '2024-04-25 02:16:00', NULL);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `artikel`
--
ALTER TABLE `artikel`
  ADD PRIMARY KEY (`id_artikel`);

--
-- Indeks untuk tabel `dokter`
--
ALTER TABLE `dokter`
  ADD PRIMARY KEY (`id_dokter`);

--
-- Indeks untuk tabel `jadwal_dokter`
--
ALTER TABLE `jadwal_dokter`
  ADD PRIMARY KEY (`id_jadwal`);

--
-- Indeks untuk tabel `kategori_layanan`
--
ALTER TABLE `kategori_layanan`
  ADD PRIMARY KEY (`id_kategori_layanan`);

--
-- Indeks untuk tabel `kategori_ukp`
--
ALTER TABLE `kategori_ukp`
  ADD PRIMARY KEY (`id_kategori_ukp`);

--
-- Indeks untuk tabel `kegiatan`
--
ALTER TABLE `kegiatan`
  ADD PRIMARY KEY (`id_kegiatan`);

--
-- Indeks untuk tabel `layanan`
--
ALTER TABLE `layanan`
  ADD PRIMARY KEY (`id_layanan`);

--
-- Indeks untuk tabel `setting_puskesmas`
--
ALTER TABLE `setting_puskesmas`
  ADD PRIMARY KEY (`id_setting`);

--
-- Indeks untuk tabel `setting_web`
--
ALTER TABLE `setting_web`
  ADD PRIMARY KEY (`id_setting`);

--
-- Indeks untuk tabel `ukp`
--
ALTER TABLE `ukp`
  ADD PRIMARY KEY (`id_ukp`,`created_at`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_users`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `artikel`
--
ALTER TABLE `artikel`
  MODIFY `id_artikel` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `dokter`
--
ALTER TABLE `dokter`
  MODIFY `id_dokter` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `jadwal_dokter`
--
ALTER TABLE `jadwal_dokter`
  MODIFY `id_jadwal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `kategori_layanan`
--
ALTER TABLE `kategori_layanan`
  MODIFY `id_kategori_layanan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `kategori_ukp`
--
ALTER TABLE `kategori_ukp`
  MODIFY `id_kategori_ukp` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `kegiatan`
--
ALTER TABLE `kegiatan`
  MODIFY `id_kegiatan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `layanan`
--
ALTER TABLE `layanan`
  MODIFY `id_layanan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `setting_puskesmas`
--
ALTER TABLE `setting_puskesmas`
  MODIFY `id_setting` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT untuk tabel `setting_web`
--
ALTER TABLE `setting_web`
  MODIFY `id_setting` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `ukp`
--
ALTER TABLE `ukp`
  MODIFY `id_ukp` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id_users` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
