-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 16 Apr 2020 pada 19.34
-- Versi server: 10.4.11-MariaDB
-- Versi PHP: 7.4.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rtrwnet`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `grup_pelanggan`
--

CREATE TABLE `grup_pelanggan` (
  `id` int(11) NOT NULL,
  `grup` varchar(50) NOT NULL,
  `harga_b` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `grup_pelanggan`
--

INSERT INTO `grup_pelanggan` (`id`, `grup`, `harga_b`) VALUES
(1, '5 Mbps [Share]', 150000),
(2, 'Sewa Wireless Router', 50000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori`
--

CREATE TABLE `kategori` (
  `id` int(11) NOT NULL,
  `kategori` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `kategori`
--

INSERT INTO `kategori` (`id`, `kategori`) VALUES
(1, 'Saos'),
(2, 'Makanan'),
(3, 'Minuman');

-- --------------------------------------------------------

--
-- Struktur dari tabel `laporan`
--

CREATE TABLE `laporan` (
  `id` int(11) NOT NULL,
  `no_laporan` varchar(11) NOT NULL,
  `nama_laporan` varchar(128) NOT NULL,
  `id_lok` int(11) NOT NULL,
  `id_ged` int(11) NOT NULL,
  `id_lan` int(11) NOT NULL,
  `id_ruang` int(11) NOT NULL,
  `id_aset` int(11) NOT NULL,
  `create_at` int(11) NOT NULL,
  `create_by` int(11) NOT NULL,
  `ket_lap` text NOT NULL,
  `status` varchar(30) NOT NULL DEFAULT 'belum di proses'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `notif`
--

CREATE TABLE `notif` (
  `id` int(11) NOT NULL,
  `no_laporan` varchar(30) NOT NULL,
  `nama_laporan` varchar(128) NOT NULL,
  `create_at` int(11) NOT NULL,
  `create_by` varchar(30) NOT NULL,
  `ket_lap` text NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pelanggan`
--

CREATE TABLE `pelanggan` (
  `id` int(11) NOT NULL,
  `nama` varchar(128) NOT NULL,
  `no_hp` varchar(128) NOT NULL,
  `alamat` varchar(128) NOT NULL,
  `ip_address` varchar(128) NOT NULL,
  `jn_akses` varchar(128) NOT NULL,
  `id_grup` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pelanggan`
--

INSERT INTO `pelanggan` (`id`, `nama`, `no_hp`, `alamat`, `ip_address`, `jn_akses`, `id_grup`) VALUES
(1, '01 ALKA_AYUK_YUNI', '0823-7168-6001', 'JL. KUALA ALAM', '10.11.19.71/27', 'Radiolink [CPE210-DOPNET2TLW04]', 1),
(2, '02 AYUK_TETI', '0853-5794-1775', 'JL. KUALA LEMPUING', '10.11.19.72/27', 'Radiolink [CPE210-DOPNET2TLW02]', 1),
(3, '03 AYUK_ELI_MAS_NGATINO', '0812-7862-9304', 'JL. KUALA LEMPUING', '10.11.19.73/27', 'Radiolink [LiteBeam_m5-DOPNETMKW01]', 1),
(4, '04 BAYU_OM_ADI', '0815-3297-4083', 'JL. KUALA ALAM 01', '	10.11.19.74/27', 'FIBER OPTIC', 1),
(5, '05 ZAKIA_OM_GINOK', '0816-3228-8839', 'JL. KUALA ALAM 01', '	10.11.19.75/27', 'Radiolink [WA7210N-DOPNET2TLW01]', 1),
(6, 'AYUK_EKA', '-', 'JL. KUALA LEMPUING', '10.11.19.76/27', 'Radiolink [SXTsqLite5-DOPNETMKW01]', 1),
(7, 'HERLINA_INTAN_FRANSHISKA', '0853-6900-4092', 'JL. KUALA ALAM 01', '10.11.19.77/27', 'FIBER OPTIC', 1),
(8, 'AYUK_YANTI', '0896-3194-2902', 'JL. KUALA ALAM 01', '10.11.19.78/27', 'FIBER OPTIC', 1),
(9, 'YOGA_OM_BAMBANG', '0812-7874-9620', 'JL. KUALA ALAM 01', '	10.11.19.79/27', 'FIBER OPTIC', 1),
(10, 'BUTET', '-', 'JL. KUALA ALAM 02', '10.11.19.80/27', 'Radiolink [CPE210-DOPNET2TLW04]', 1),
(11, 'FATUR', '0858-3937-3881', 'JL. KUALA ALAM', '10.11.19.81/27', 'FIBER OPTIC', 1),
(12, 'IBU_YULIA', '0852-7320-7669', 'JL. KUALA LEMPUING', '10.11.19.82/27', 'Radiolink [CPE210-DOPNET2TLW03]', 1),
(13, 'DERA_AYUK_ELI', '0853-7881-4196', 'JL. KUALA LEMPUING', '10.11.19.83/27', 'Radiolink [LiteBeam_m5-DOPNETMKW01]', 1),
(14, 'IGEN_KONTRAKAN_LEMPUING', '0853-6737-4183', 'JL. KUALA LEMPUING', '10.11.19.84/27', 'Radiolink [LDF5N-DOPNETMKW01]', 1),
(15, 'ANWAR_KIKI_IPUL', '-', 'JL. KUALA ALAM', '10.11.19.85/27', 'Radiolink [WA7210N-DOPNET2TLW01]', 1),
(16, 'BAYU_OM_DONI', '0895-3100-7133', 'JL. KUALA ALAM ARAH KOLAM RENANG RAFFLESIA', '10.11.19.86/27', 'Radiolink [WA7210N-DOPNET2TLW01]', 1),
(17, 'IBU_NISA_WINSIH', '-', 'JL. KUALA ALAM Gg. CENDANA 1', '10.11.19.87/27', 'Radiolink [CPE210-DOPNET2TLW02]', 1),
(18, 'OM_DADANG', '0821-8566-0201', 'JL. KUALA LEMPUING', '10.11.19.88/27', 'Radiolink [CPE210-DOPNET2TLW02]', 1),
(19, 'AYUK_WARUNG_BAKSO_JOKO', '0811-7392-612', 'JL. FLAMBOYAN TUGU SEGITIGA SKIP', '192.168.0.1/24', 'Wireless Router Tenda', 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `perusahaan`
--

CREATE TABLE `perusahaan` (
  `id_perus` int(11) NOT NULL,
  `nama_perusahaan` varchar(128) NOT NULL,
  `logo` varchar(128) NOT NULL,
  `no_telepon` varchar(128) NOT NULL,
  `alamat` varchar(128) NOT NULL,
  `alamat_lengkap` varchar(128) NOT NULL,
  `struk_note` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `perusahaan`
--

INSERT INTO `perusahaan` (`id_perus`, `nama_perusahaan`, `logo`, `no_telepon`, `alamat`, `alamat_lengkap`, `struk_note`) VALUES
(1, 'DOPNET INDONESIA', 'logo.png', '081347578908', 'Jl. Kuala Alam Nusa Indah Kota Bengkulu', 'Jl. Kuala Alam 01 No. 08 Rt. 20 Rw. 04 Kel. Nusa Indah Kec. Ratu Agung Kota Bengkulu 38224', '<h4>Terimakasih sudah berlangganan | dopnetindo</h4><h4><br><div><br><br></div></h4>');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_bulan`
--

CREATE TABLE `tbl_bulan` (
  `id_bulan` int(11) NOT NULL,
  `nama_bulan` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_bulan`
--

INSERT INTO `tbl_bulan` (`id_bulan`, `nama_bulan`) VALUES
(1, 'Januari'),
(2, 'Februari'),
(3, 'Maret'),
(4, 'April'),
(5, 'Mei'),
(6, 'Juni'),
(7, 'Juli'),
(8, 'Agustus'),
(9, 'September'),
(10, 'Oktober'),
(11, 'November'),
(12, 'Desember');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_iuran`
--

CREATE TABLE `tbl_iuran` (
  `id_iuran` int(100) NOT NULL,
  `id_pel` int(10) DEFAULT NULL,
  `jatuhtempo` date DEFAULT NULL,
  `bulan` varchar(20) DEFAULT NULL,
  `tglbayar` date DEFAULT NULL,
  `jumlah` int(20) DEFAULT NULL,
  `bandw` varchar(20) NOT NULL,
  `ket` varchar(20) DEFAULT NULL,
  `id_create` varchar(25) DEFAULT NULL,
  `status_bayar` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_iuran`
--

INSERT INTO `tbl_iuran` (`id_iuran`, `id_pel`, `jatuhtempo`, `bulan`, `tglbayar`, `jumlah`, `bandw`, `ket`, `id_create`, `status_bayar`) VALUES
(253, 1, '2020-01-10', 'Januari 2020', NULL, 150000, '5 Mbps [Share]', NULL, 'DOPNET INDONESIA', 0),
(254, 1, '2020-02-10', 'Februari 2020', NULL, 150000, '5 Mbps [Share]', NULL, 'DOPNET INDONESIA', 0),
(255, 1, '2020-03-10', 'Maret 2020', NULL, 150000, '5 Mbps [Share]', NULL, 'DOPNET INDONESIA', 0),
(256, 1, '2020-04-10', 'April 2020', '2020-04-16', 150000, '5 Mbps [Share]', NULL, 'DOPNET INDONESIA', 1),
(257, 1, '2020-05-10', 'Mei 2020', NULL, 150000, '5 Mbps [Share]', NULL, 'DOPNET INDONESIA', 0),
(258, 1, '2020-06-10', 'Juni 2020', NULL, 150000, '5 Mbps [Share]', NULL, 'DOPNET INDONESIA', 0),
(259, 1, '2020-07-10', 'Juli 2020', NULL, 150000, '5 Mbps [Share]', NULL, 'DOPNET INDONESIA', 0),
(260, 1, '2020-08-10', 'Agustus 2020', NULL, 150000, '5 Mbps [Share]', NULL, 'DOPNET INDONESIA', 0),
(261, 1, '2020-09-10', 'September 2020', NULL, 150000, '5 Mbps [Share]', NULL, 'DOPNET INDONESIA', 0),
(262, 1, '2020-10-10', 'Oktober 2020', NULL, 150000, '5 Mbps [Share]', NULL, 'DOPNET INDONESIA', 0),
(263, 1, '2020-11-10', 'November 2020', NULL, 150000, '5 Mbps [Share]', NULL, 'DOPNET INDONESIA', 0),
(264, 1, '2020-12-10', 'Desember 2020', NULL, 150000, '5 Mbps [Share]', NULL, 'DOPNET INDONESIA', 0),
(265, 2, '2020-01-10', 'Januari 2020', NULL, 150000, '5 Mbps [Share]', NULL, 'DOPNET INDONESIA', 0),
(266, 2, '2020-02-10', 'Februari 2020', NULL, 150000, '5 Mbps [Share]', NULL, 'DOPNET INDONESIA', 0),
(267, 2, '2020-03-10', 'Maret 2020', NULL, 150000, '5 Mbps [Share]', NULL, 'DOPNET INDONESIA', 0),
(268, 2, '2020-04-10', 'April 2020', '2020-04-16', 150000, '5 Mbps [Share]', NULL, 'DOPNET INDONESIA', 1),
(269, 2, '2020-05-10', 'Mei 2020', NULL, 150000, '5 Mbps [Share]', NULL, 'DOPNET INDONESIA', 0),
(270, 2, '2020-06-10', 'Juni 2020', NULL, 150000, '5 Mbps [Share]', NULL, 'DOPNET INDONESIA', 0),
(271, 2, '2020-07-10', 'Juli 2020', NULL, 150000, '5 Mbps [Share]', NULL, 'DOPNET INDONESIA', 0),
(272, 2, '2020-08-10', 'Agustus 2020', NULL, 150000, '5 Mbps [Share]', NULL, 'DOPNET INDONESIA', 0),
(273, 2, '2020-09-10', 'September 2020', NULL, 150000, '5 Mbps [Share]', NULL, 'DOPNET INDONESIA', 0),
(274, 2, '2020-10-10', 'Oktober 2020', NULL, 150000, '5 Mbps [Share]', NULL, 'DOPNET INDONESIA', 0),
(275, 2, '2020-11-10', 'November 2020', NULL, 150000, '5 Mbps [Share]', NULL, 'DOPNET INDONESIA', 0),
(276, 2, '2020-12-10', 'Desember 2020', NULL, 150000, '5 Mbps [Share]', NULL, 'DOPNET INDONESIA', 0),
(277, 3, '2020-01-10', 'Januari 2020', NULL, 150000, '5 Mbps [Share]', NULL, 'DOPNET INDONESIA', 0),
(278, 3, '2020-02-10', 'Februari 2020', NULL, 150000, '5 Mbps [Share]', NULL, 'DOPNET INDONESIA', 0),
(279, 3, '2020-03-10', 'Maret 2020', NULL, 150000, '5 Mbps [Share]', NULL, 'DOPNET INDONESIA', 0),
(280, 3, '2020-04-10', 'April 2020', '2020-04-16', 150000, '5 Mbps [Share]', NULL, 'DOPNET INDONESIA', 1),
(281, 3, '2020-05-10', 'Mei 2020', NULL, 150000, '5 Mbps [Share]', NULL, 'DOPNET INDONESIA', 0),
(282, 3, '2020-06-10', 'Juni 2020', NULL, 150000, '5 Mbps [Share]', NULL, 'DOPNET INDONESIA', 0),
(283, 3, '2020-07-10', 'Juli 2020', NULL, 150000, '5 Mbps [Share]', NULL, 'DOPNET INDONESIA', 0),
(284, 3, '2020-08-10', 'Agustus 2020', NULL, 150000, '5 Mbps [Share]', NULL, 'DOPNET INDONESIA', 0),
(285, 3, '2020-09-10', 'September 2020', NULL, 150000, '5 Mbps [Share]', NULL, 'DOPNET INDONESIA', 0),
(286, 3, '2020-10-10', 'Oktober 2020', NULL, 150000, '5 Mbps [Share]', NULL, 'DOPNET INDONESIA', 0),
(287, 3, '2020-11-10', 'November 2020', NULL, 150000, '5 Mbps [Share]', NULL, 'DOPNET INDONESIA', 0),
(288, 3, '2020-12-10', 'Desember 2020', NULL, 150000, '5 Mbps [Share]', NULL, 'DOPNET INDONESIA', 0),
(289, 4, '2020-01-10', 'Januari 2020', NULL, 150000, '5 Mbps [Share]', NULL, 'DOPNET INDONESIA', 0),
(290, 4, '2020-02-10', 'Februari 2020', NULL, 150000, '5 Mbps [Share]', NULL, 'DOPNET INDONESIA', 0),
(291, 4, '2020-03-10', 'Maret 2020', NULL, 150000, '5 Mbps [Share]', NULL, 'DOPNET INDONESIA', 0),
(292, 4, '2020-04-10', 'April 2020', '2020-04-16', 150000, '5 Mbps [Share]', NULL, 'DOPNET INDONESIA', 1),
(293, 4, '2020-05-10', 'Mei 2020', NULL, 150000, '5 Mbps [Share]', NULL, 'DOPNET INDONESIA', 0),
(294, 4, '2020-06-10', 'Juni 2020', NULL, 150000, '5 Mbps [Share]', NULL, 'DOPNET INDONESIA', 0),
(295, 4, '2020-07-10', 'Juli 2020', NULL, 150000, '5 Mbps [Share]', NULL, 'DOPNET INDONESIA', 0),
(296, 4, '2020-08-10', 'Agustus 2020', NULL, 150000, '5 Mbps [Share]', NULL, 'DOPNET INDONESIA', 0),
(297, 4, '2020-09-10', 'September 2020', NULL, 150000, '5 Mbps [Share]', NULL, 'DOPNET INDONESIA', 0),
(298, 4, '2020-10-10', 'Oktober 2020', NULL, 150000, '5 Mbps [Share]', NULL, 'DOPNET INDONESIA', 0),
(299, 4, '2020-11-10', 'November 2020', NULL, 150000, '5 Mbps [Share]', NULL, 'DOPNET INDONESIA', 0),
(300, 4, '2020-12-10', 'Desember 2020', NULL, 150000, '5 Mbps [Share]', NULL, 'DOPNET INDONESIA', 0),
(301, 5, '2020-01-10', 'Januari 2020', NULL, 150000, '5 Mbps [Share]', NULL, 'DOPNET INDONESIA', 0),
(302, 5, '2020-02-10', 'Februari 2020', NULL, 150000, '5 Mbps [Share]', NULL, 'DOPNET INDONESIA', 0),
(303, 5, '2020-03-10', 'Maret 2020', NULL, 150000, '5 Mbps [Share]', NULL, 'DOPNET INDONESIA', 0),
(304, 5, '2020-04-10', 'April 2020', '2020-04-16', 150000, '5 Mbps [Share]', NULL, 'DOPNET INDONESIA', 1),
(305, 5, '2020-05-10', 'Mei 2020', NULL, 150000, '5 Mbps [Share]', NULL, 'DOPNET INDONESIA', 0),
(306, 5, '2020-06-10', 'Juni 2020', NULL, 150000, '5 Mbps [Share]', NULL, 'DOPNET INDONESIA', 0),
(307, 5, '2020-07-10', 'Juli 2020', NULL, 150000, '5 Mbps [Share]', NULL, 'DOPNET INDONESIA', 0),
(308, 5, '2020-08-10', 'Agustus 2020', NULL, 150000, '5 Mbps [Share]', NULL, 'DOPNET INDONESIA', 0),
(309, 5, '2020-09-10', 'September 2020', NULL, 150000, '5 Mbps [Share]', NULL, 'DOPNET INDONESIA', 0),
(310, 5, '2020-10-10', 'Oktober 2020', NULL, 150000, '5 Mbps [Share]', NULL, 'DOPNET INDONESIA', 0),
(311, 5, '2020-11-10', 'November 2020', NULL, 150000, '5 Mbps [Share]', NULL, 'DOPNET INDONESIA', 0),
(312, 5, '2020-12-10', 'Desember 2020', NULL, 150000, '5 Mbps [Share]', NULL, 'DOPNET INDONESIA', 0),
(313, 6, '2020-01-10', 'Januari 2020', NULL, 150000, '5 Mbps [Share]', NULL, 'DOPNET INDONESIA', 0),
(314, 6, '2020-02-10', 'Februari 2020', NULL, 150000, '5 Mbps [Share]', NULL, 'DOPNET INDONESIA', 0),
(315, 6, '2020-03-10', 'Maret 2020', NULL, 150000, '5 Mbps [Share]', NULL, 'DOPNET INDONESIA', 0),
(316, 6, '2020-04-10', 'April 2020', NULL, 150000, '5 Mbps [Share]', NULL, 'DOPNET INDONESIA', 0),
(317, 6, '2020-05-10', 'Mei 2020', NULL, 150000, '5 Mbps [Share]', NULL, 'DOPNET INDONESIA', 0),
(318, 6, '2020-06-10', 'Juni 2020', NULL, 150000, '5 Mbps [Share]', NULL, 'DOPNET INDONESIA', 0),
(319, 6, '2020-07-10', 'Juli 2020', NULL, 150000, '5 Mbps [Share]', NULL, 'DOPNET INDONESIA', 0),
(320, 6, '2020-08-10', 'Agustus 2020', NULL, 150000, '5 Mbps [Share]', NULL, 'DOPNET INDONESIA', 0),
(321, 6, '2020-09-10', 'September 2020', NULL, 150000, '5 Mbps [Share]', NULL, 'DOPNET INDONESIA', 0),
(322, 6, '2020-10-10', 'Oktober 2020', NULL, 150000, '5 Mbps [Share]', NULL, 'DOPNET INDONESIA', 0),
(323, 6, '2020-11-10', 'November 2020', NULL, 150000, '5 Mbps [Share]', NULL, 'DOPNET INDONESIA', 0),
(324, 6, '2020-12-10', 'Desember 2020', NULL, 150000, '5 Mbps [Share]', NULL, 'DOPNET INDONESIA', 0),
(325, 7, '2020-01-10', 'Januari 2020', NULL, 150000, '5 Mbps [Share]', NULL, 'DOPNET INDONESIA', 0),
(326, 7, '2020-02-10', 'Februari 2020', NULL, 150000, '5 Mbps [Share]', NULL, 'DOPNET INDONESIA', 0),
(327, 7, '2020-03-10', 'Maret 2020', NULL, 150000, '5 Mbps [Share]', NULL, 'DOPNET INDONESIA', 0),
(328, 7, '2020-04-10', 'April 2020', '2020-04-16', 150000, '5 Mbps [Share]', NULL, 'DOPNET INDONESIA', 1),
(329, 7, '2020-05-10', 'Mei 2020', NULL, 150000, '5 Mbps [Share]', NULL, 'DOPNET INDONESIA', 0),
(330, 7, '2020-06-10', 'Juni 2020', NULL, 150000, '5 Mbps [Share]', NULL, 'DOPNET INDONESIA', 0),
(331, 7, '2020-07-10', 'Juli 2020', NULL, 150000, '5 Mbps [Share]', NULL, 'DOPNET INDONESIA', 0),
(332, 7, '2020-08-10', 'Agustus 2020', NULL, 150000, '5 Mbps [Share]', NULL, 'DOPNET INDONESIA', 0),
(333, 7, '2020-09-10', 'September 2020', NULL, 150000, '5 Mbps [Share]', NULL, 'DOPNET INDONESIA', 0),
(334, 7, '2020-10-10', 'Oktober 2020', NULL, 150000, '5 Mbps [Share]', NULL, 'DOPNET INDONESIA', 0),
(335, 7, '2020-11-10', 'November 2020', NULL, 150000, '5 Mbps [Share]', NULL, 'DOPNET INDONESIA', 0),
(336, 7, '2020-12-10', 'Desember 2020', NULL, 150000, '5 Mbps [Share]', NULL, 'DOPNET INDONESIA', 0),
(337, 8, '2020-01-10', 'Januari 2020', NULL, 150000, '5 Mbps [Share]', NULL, 'DOPNET INDONESIA', 0),
(338, 8, '2020-02-10', 'Februari 2020', NULL, 150000, '5 Mbps [Share]', NULL, 'DOPNET INDONESIA', 0),
(339, 8, '2020-03-10', 'Maret 2020', NULL, 150000, '5 Mbps [Share]', NULL, 'DOPNET INDONESIA', 0),
(340, 8, '2020-04-10', 'April 2020', NULL, 150000, '5 Mbps [Share]', NULL, 'DOPNET INDONESIA', 0),
(341, 8, '2020-05-10', 'Mei 2020', NULL, 150000, '5 Mbps [Share]', NULL, 'DOPNET INDONESIA', 0),
(342, 8, '2020-06-10', 'Juni 2020', NULL, 150000, '5 Mbps [Share]', NULL, 'DOPNET INDONESIA', 0),
(343, 8, '2020-07-10', 'Juli 2020', NULL, 150000, '5 Mbps [Share]', NULL, 'DOPNET INDONESIA', 0),
(344, 8, '2020-08-10', 'Agustus 2020', NULL, 150000, '5 Mbps [Share]', NULL, 'DOPNET INDONESIA', 0),
(345, 8, '2020-09-10', 'September 2020', NULL, 150000, '5 Mbps [Share]', NULL, 'DOPNET INDONESIA', 0),
(346, 8, '2020-10-10', 'Oktober 2020', NULL, 150000, '5 Mbps [Share]', NULL, 'DOPNET INDONESIA', 0),
(347, 8, '2020-11-10', 'November 2020', NULL, 150000, '5 Mbps [Share]', NULL, 'DOPNET INDONESIA', 0),
(348, 8, '2020-12-10', 'Desember 2020', NULL, 150000, '5 Mbps [Share]', NULL, 'DOPNET INDONESIA', 0),
(349, 9, '2020-01-10', 'Januari 2020', NULL, 150000, '5 Mbps [Share]', NULL, 'DOPNET INDONESIA', 0),
(350, 9, '2020-02-10', 'Februari 2020', NULL, 150000, '5 Mbps [Share]', NULL, 'DOPNET INDONESIA', 0),
(351, 9, '2020-03-10', 'Maret 2020', NULL, 150000, '5 Mbps [Share]', NULL, 'DOPNET INDONESIA', 0),
(352, 9, '2020-04-10', 'April 2020', '2020-04-16', 150000, '5 Mbps [Share]', NULL, 'DOPNET INDONESIA', 1),
(353, 9, '2020-05-10', 'Mei 2020', NULL, 150000, '5 Mbps [Share]', NULL, 'DOPNET INDONESIA', 0),
(354, 9, '2020-06-10', 'Juni 2020', NULL, 150000, '5 Mbps [Share]', NULL, 'DOPNET INDONESIA', 0),
(355, 9, '2020-07-10', 'Juli 2020', NULL, 150000, '5 Mbps [Share]', NULL, 'DOPNET INDONESIA', 0),
(356, 9, '2020-08-10', 'Agustus 2020', NULL, 150000, '5 Mbps [Share]', NULL, 'DOPNET INDONESIA', 0),
(357, 9, '2020-09-10', 'September 2020', NULL, 150000, '5 Mbps [Share]', NULL, 'DOPNET INDONESIA', 0),
(358, 9, '2020-10-10', 'Oktober 2020', NULL, 150000, '5 Mbps [Share]', NULL, 'DOPNET INDONESIA', 0),
(359, 9, '2020-11-10', 'November 2020', NULL, 150000, '5 Mbps [Share]', NULL, 'DOPNET INDONESIA', 0),
(360, 9, '2020-12-10', 'Desember 2020', NULL, 150000, '5 Mbps [Share]', NULL, 'DOPNET INDONESIA', 0),
(361, 9, '2020-01-10', 'Januari 2020', NULL, 150000, '5 Mbps [Share]', NULL, 'DOPNET INDONESIA', 0),
(362, 9, '2020-02-10', 'Februari 2020', NULL, 150000, '5 Mbps [Share]', NULL, 'DOPNET INDONESIA', 0),
(363, 9, '2020-03-10', 'Maret 2020', NULL, 150000, '5 Mbps [Share]', NULL, 'DOPNET INDONESIA', 0),
(364, 9, '2020-04-10', 'April 2020', NULL, 150000, '5 Mbps [Share]', NULL, 'DOPNET INDONESIA', 0),
(365, 9, '2020-05-10', 'Mei 2020', NULL, 150000, '5 Mbps [Share]', NULL, 'DOPNET INDONESIA', 0),
(366, 9, '2020-06-10', 'Juni 2020', NULL, 150000, '5 Mbps [Share]', NULL, 'DOPNET INDONESIA', 0),
(367, 9, '2020-07-10', 'Juli 2020', NULL, 150000, '5 Mbps [Share]', NULL, 'DOPNET INDONESIA', 0),
(368, 9, '2020-08-10', 'Agustus 2020', NULL, 150000, '5 Mbps [Share]', NULL, 'DOPNET INDONESIA', 0),
(369, 9, '2020-09-10', 'September 2020', NULL, 150000, '5 Mbps [Share]', NULL, 'DOPNET INDONESIA', 0),
(370, 9, '2020-10-10', 'Oktober 2020', NULL, 150000, '5 Mbps [Share]', NULL, 'DOPNET INDONESIA', 0),
(371, 9, '2020-11-10', 'November 2020', NULL, 150000, '5 Mbps [Share]', NULL, 'DOPNET INDONESIA', 0),
(372, 9, '2020-12-10', 'Desember 2020', NULL, 150000, '5 Mbps [Share]', NULL, 'DOPNET INDONESIA', 0),
(373, 10, '2020-01-10', 'Januari 2020', NULL, 150000, '5 Mbps [Share]', NULL, 'DOPNET INDONESIA', 0),
(374, 10, '2020-02-10', 'Februari 2020', NULL, 150000, '5 Mbps [Share]', NULL, 'DOPNET INDONESIA', 0),
(375, 10, '2020-03-10', 'Maret 2020', NULL, 150000, '5 Mbps [Share]', NULL, 'DOPNET INDONESIA', 0),
(376, 10, '2020-04-10', 'April 2020', '2020-04-16', 150000, '5 Mbps [Share]', NULL, 'DOPNET INDONESIA', 1),
(377, 10, '2020-05-10', 'Mei 2020', NULL, 150000, '5 Mbps [Share]', NULL, 'DOPNET INDONESIA', 0),
(378, 10, '2020-06-10', 'Juni 2020', NULL, 150000, '5 Mbps [Share]', NULL, 'DOPNET INDONESIA', 0),
(379, 10, '2020-07-10', 'Juli 2020', NULL, 150000, '5 Mbps [Share]', NULL, 'DOPNET INDONESIA', 0),
(380, 10, '2020-08-10', 'Agustus 2020', NULL, 150000, '5 Mbps [Share]', NULL, 'DOPNET INDONESIA', 0),
(381, 10, '2020-09-10', 'September 2020', NULL, 150000, '5 Mbps [Share]', NULL, 'DOPNET INDONESIA', 0),
(382, 10, '2020-10-10', 'Oktober 2020', NULL, 150000, '5 Mbps [Share]', NULL, 'DOPNET INDONESIA', 0),
(383, 10, '2020-11-10', 'November 2020', NULL, 150000, '5 Mbps [Share]', NULL, 'DOPNET INDONESIA', 0),
(384, 10, '2020-12-10', 'Desember 2020', NULL, 150000, '5 Mbps [Share]', NULL, 'DOPNET INDONESIA', 0),
(385, 11, '2020-01-10', 'Januari 2020', NULL, 150000, '5 Mbps [Share]', NULL, 'DOPNET INDONESIA', 0),
(386, 11, '2020-02-10', 'Februari 2020', NULL, 150000, '5 Mbps [Share]', NULL, 'DOPNET INDONESIA', 0),
(387, 11, '2020-03-10', 'Maret 2020', NULL, 150000, '5 Mbps [Share]', NULL, 'DOPNET INDONESIA', 0),
(388, 11, '2020-04-10', 'April 2020', '2020-04-16', 150000, '5 Mbps [Share]', NULL, 'DOPNET INDONESIA', 1),
(389, 11, '2020-05-10', 'Mei 2020', NULL, 150000, '5 Mbps [Share]', NULL, 'DOPNET INDONESIA', 0),
(390, 11, '2020-06-10', 'Juni 2020', NULL, 150000, '5 Mbps [Share]', NULL, 'DOPNET INDONESIA', 0),
(391, 11, '2020-07-10', 'Juli 2020', NULL, 150000, '5 Mbps [Share]', NULL, 'DOPNET INDONESIA', 0),
(392, 11, '2020-08-10', 'Agustus 2020', NULL, 150000, '5 Mbps [Share]', NULL, 'DOPNET INDONESIA', 0),
(393, 11, '2020-09-10', 'September 2020', NULL, 150000, '5 Mbps [Share]', NULL, 'DOPNET INDONESIA', 0),
(394, 11, '2020-10-10', 'Oktober 2020', NULL, 150000, '5 Mbps [Share]', NULL, 'DOPNET INDONESIA', 0),
(395, 11, '2020-11-10', 'November 2020', NULL, 150000, '5 Mbps [Share]', NULL, 'DOPNET INDONESIA', 0),
(396, 11, '2020-12-10', 'Desember 2020', NULL, 150000, '5 Mbps [Share]', NULL, 'DOPNET INDONESIA', 0),
(397, 14, '2020-01-10', 'Januari 2020', NULL, 150000, '5 Mbps [Share]', NULL, 'DOPNET INDONESIA', 0),
(398, 14, '2020-02-10', 'Februari 2020', NULL, 150000, '5 Mbps [Share]', NULL, 'DOPNET INDONESIA', 0),
(399, 14, '2020-03-10', 'Maret 2020', NULL, 150000, '5 Mbps [Share]', NULL, 'DOPNET INDONESIA', 0),
(400, 14, '2020-04-10', 'April 2020', '2020-04-16', 150000, '5 Mbps [Share]', NULL, 'DOPNET INDONESIA', 1),
(401, 14, '2020-05-10', 'Mei 2020', NULL, 150000, '5 Mbps [Share]', NULL, 'DOPNET INDONESIA', 0),
(402, 14, '2020-06-10', 'Juni 2020', NULL, 150000, '5 Mbps [Share]', NULL, 'DOPNET INDONESIA', 0),
(403, 14, '2020-07-10', 'Juli 2020', NULL, 150000, '5 Mbps [Share]', NULL, 'DOPNET INDONESIA', 0),
(404, 14, '2020-08-10', 'Agustus 2020', NULL, 150000, '5 Mbps [Share]', NULL, 'DOPNET INDONESIA', 0),
(405, 14, '2020-09-10', 'September 2020', NULL, 150000, '5 Mbps [Share]', NULL, 'DOPNET INDONESIA', 0),
(406, 14, '2020-10-10', 'Oktober 2020', NULL, 150000, '5 Mbps [Share]', NULL, 'DOPNET INDONESIA', 0),
(407, 14, '2020-11-10', 'November 2020', NULL, 150000, '5 Mbps [Share]', NULL, 'DOPNET INDONESIA', 0),
(408, 14, '2020-12-10', 'Desember 2020', NULL, 150000, '5 Mbps [Share]', NULL, 'DOPNET INDONESIA', 0),
(409, 12, '2020-05-10', 'Mei 2020', NULL, 150000, '5 Mbps [Share]', NULL, 'DOPNET INDONESIA', 0),
(410, 12, '2020-06-10', 'Juni 2020', NULL, 150000, '5 Mbps [Share]', NULL, 'DOPNET INDONESIA', 0),
(411, 12, '2020-07-10', 'Juli 2020', NULL, 150000, '5 Mbps [Share]', NULL, 'DOPNET INDONESIA', 0),
(412, 12, '2020-08-10', 'Agustus 2020', NULL, 150000, '5 Mbps [Share]', NULL, 'DOPNET INDONESIA', 0),
(413, 12, '2020-09-10', 'September 2020', NULL, 150000, '5 Mbps [Share]', NULL, 'DOPNET INDONESIA', 0),
(414, 12, '2020-10-10', 'Oktober 2020', NULL, 150000, '5 Mbps [Share]', NULL, 'DOPNET INDONESIA', 0),
(415, 12, '2020-11-10', 'November 2020', NULL, 150000, '5 Mbps [Share]', NULL, 'DOPNET INDONESIA', 0),
(416, 12, '2020-12-10', 'Desember 2020', NULL, 150000, '5 Mbps [Share]', NULL, 'DOPNET INDONESIA', 0),
(417, 12, '2021-01-10', 'Januari 2021', NULL, 150000, '5 Mbps [Share]', NULL, 'DOPNET INDONESIA', 0),
(418, 12, '2021-02-10', 'Februari 2021', NULL, 150000, '5 Mbps [Share]', NULL, 'DOPNET INDONESIA', 0),
(419, 12, '2021-03-10', 'Maret 2021', NULL, 150000, '5 Mbps [Share]', NULL, 'DOPNET INDONESIA', 0),
(420, 12, '2021-04-10', 'April 2021', NULL, 150000, '5 Mbps [Share]', NULL, 'DOPNET INDONESIA', 0),
(421, 13, '2020-01-10', 'Januari 2020', NULL, 150000, '5 Mbps [Share]', NULL, 'DOPNET INDONESIA', 0),
(422, 13, '2020-02-10', 'Februari 2020', NULL, 150000, '5 Mbps [Share]', NULL, 'DOPNET INDONESIA', 0),
(423, 13, '2020-03-10', 'Maret 2020', NULL, 150000, '5 Mbps [Share]', NULL, 'DOPNET INDONESIA', 0),
(424, 13, '2020-04-10', 'April 2020', '2020-04-16', 150000, '5 Mbps [Share]', NULL, 'DOPNET INDONESIA', 1),
(425, 13, '2020-05-10', 'Mei 2020', NULL, 150000, '5 Mbps [Share]', NULL, 'DOPNET INDONESIA', 0),
(426, 13, '2020-06-10', 'Juni 2020', NULL, 150000, '5 Mbps [Share]', NULL, 'DOPNET INDONESIA', 0),
(427, 13, '2020-07-10', 'Juli 2020', NULL, 150000, '5 Mbps [Share]', NULL, 'DOPNET INDONESIA', 0),
(428, 13, '2020-08-10', 'Agustus 2020', NULL, 150000, '5 Mbps [Share]', NULL, 'DOPNET INDONESIA', 0),
(429, 13, '2020-09-10', 'September 2020', NULL, 150000, '5 Mbps [Share]', NULL, 'DOPNET INDONESIA', 0),
(430, 13, '2020-10-10', 'Oktober 2020', NULL, 150000, '5 Mbps [Share]', NULL, 'DOPNET INDONESIA', 0),
(431, 13, '2020-11-10', 'November 2020', NULL, 150000, '5 Mbps [Share]', NULL, 'DOPNET INDONESIA', 0),
(432, 13, '2020-12-10', 'Desember 2020', NULL, 150000, '5 Mbps [Share]', NULL, 'DOPNET INDONESIA', 0),
(433, 16, '2020-01-10', 'Januari 2020', NULL, 150000, '5 Mbps [Share]', NULL, 'DOPNET INDONESIA', 0),
(434, 16, '2020-02-10', 'Februari 2020', NULL, 150000, '5 Mbps [Share]', NULL, 'DOPNET INDONESIA', 0),
(435, 16, '2020-03-10', 'Maret 2020', NULL, 150000, '5 Mbps [Share]', NULL, 'DOPNET INDONESIA', 0),
(436, 16, '2020-04-10', 'April 2020', '2020-04-16', 150000, '5 Mbps [Share]', NULL, 'DOPNET INDONESIA', 1),
(437, 16, '2020-05-10', 'Mei 2020', NULL, 150000, '5 Mbps [Share]', NULL, 'DOPNET INDONESIA', 0),
(438, 16, '2020-06-10', 'Juni 2020', NULL, 150000, '5 Mbps [Share]', NULL, 'DOPNET INDONESIA', 0),
(439, 16, '2020-07-10', 'Juli 2020', NULL, 150000, '5 Mbps [Share]', NULL, 'DOPNET INDONESIA', 0),
(440, 16, '2020-08-10', 'Agustus 2020', NULL, 150000, '5 Mbps [Share]', NULL, 'DOPNET INDONESIA', 0),
(441, 16, '2020-09-10', 'September 2020', NULL, 150000, '5 Mbps [Share]', NULL, 'DOPNET INDONESIA', 0),
(442, 16, '2020-10-10', 'Oktober 2020', NULL, 150000, '5 Mbps [Share]', NULL, 'DOPNET INDONESIA', 0),
(443, 16, '2020-11-10', 'November 2020', NULL, 150000, '5 Mbps [Share]', NULL, 'DOPNET INDONESIA', 0),
(444, 16, '2020-12-10', 'Desember 2020', NULL, 150000, '5 Mbps [Share]', NULL, 'DOPNET INDONESIA', 0),
(445, 17, '2020-01-10', 'Januari 2020', NULL, 150000, '5 Mbps [Share]', NULL, 'DOPNET INDONESIA', 0),
(446, 17, '2020-02-10', 'Februari 2020', NULL, 150000, '5 Mbps [Share]', NULL, 'DOPNET INDONESIA', 0),
(447, 17, '2020-03-10', 'Maret 2020', NULL, 150000, '5 Mbps [Share]', NULL, 'DOPNET INDONESIA', 0),
(448, 17, '2020-04-10', 'April 2020', NULL, 150000, '5 Mbps [Share]', NULL, 'DOPNET INDONESIA', 0),
(449, 17, '2020-05-10', 'Mei 2020', NULL, 150000, '5 Mbps [Share]', NULL, 'DOPNET INDONESIA', 0),
(450, 17, '2020-06-10', 'Juni 2020', NULL, 150000, '5 Mbps [Share]', NULL, 'DOPNET INDONESIA', 0),
(451, 17, '2020-07-10', 'Juli 2020', NULL, 150000, '5 Mbps [Share]', NULL, 'DOPNET INDONESIA', 0),
(452, 17, '2020-08-10', 'Agustus 2020', NULL, 150000, '5 Mbps [Share]', NULL, 'DOPNET INDONESIA', 0),
(453, 17, '2020-09-10', 'September 2020', NULL, 150000, '5 Mbps [Share]', NULL, 'DOPNET INDONESIA', 0),
(454, 17, '2020-10-10', 'Oktober 2020', NULL, 150000, '5 Mbps [Share]', NULL, 'DOPNET INDONESIA', 0),
(455, 17, '2020-11-10', 'November 2020', NULL, 150000, '5 Mbps [Share]', NULL, 'DOPNET INDONESIA', 0),
(456, 17, '2020-12-10', 'Desember 2020', NULL, 150000, '5 Mbps [Share]', NULL, 'DOPNET INDONESIA', 0),
(457, 18, '2020-01-10', 'Januari 2020', NULL, 150000, '5 Mbps [Share]', NULL, 'DOPNET INDONESIA', 0),
(458, 18, '2020-02-10', 'Februari 2020', NULL, 150000, '5 Mbps [Share]', NULL, 'DOPNET INDONESIA', 0),
(459, 18, '2020-03-10', 'Maret 2020', NULL, 150000, '5 Mbps [Share]', NULL, 'DOPNET INDONESIA', 0),
(460, 18, '2020-04-10', 'April 2020', NULL, 150000, '5 Mbps [Share]', NULL, 'DOPNET INDONESIA', 0),
(461, 18, '2020-05-10', 'Mei 2020', NULL, 150000, '5 Mbps [Share]', NULL, 'DOPNET INDONESIA', 0),
(462, 18, '2020-06-10', 'Juni 2020', NULL, 150000, '5 Mbps [Share]', NULL, 'DOPNET INDONESIA', 0),
(463, 18, '2020-07-10', 'Juli 2020', NULL, 150000, '5 Mbps [Share]', NULL, 'DOPNET INDONESIA', 0),
(464, 18, '2020-08-10', 'Agustus 2020', NULL, 150000, '5 Mbps [Share]', NULL, 'DOPNET INDONESIA', 0),
(465, 18, '2020-09-10', 'September 2020', NULL, 150000, '5 Mbps [Share]', NULL, 'DOPNET INDONESIA', 0),
(466, 18, '2020-10-10', 'Oktober 2020', NULL, 150000, '5 Mbps [Share]', NULL, 'DOPNET INDONESIA', 0),
(467, 18, '2020-11-10', 'November 2020', NULL, 150000, '5 Mbps [Share]', NULL, 'DOPNET INDONESIA', 0),
(468, 18, '2020-12-10', 'Desember 2020', NULL, 150000, '5 Mbps [Share]', NULL, 'DOPNET INDONESIA', 0),
(469, 19, '2020-01-10', 'Januari 2020', NULL, 50000, 'Sewa Wireless Router', NULL, 'DOPNET INDONESIA', 0),
(470, 19, '2020-02-10', 'Februari 2020', NULL, 50000, 'Sewa Wireless Router', NULL, 'DOPNET INDONESIA', 0),
(471, 19, '2020-03-10', 'Maret 2020', NULL, 50000, 'Sewa Wireless Router', NULL, 'DOPNET INDONESIA', 0),
(472, 19, '2020-04-10', 'April 2020', '2020-04-16', 50000, 'Sewa Wireless Router', NULL, 'DOPNET INDONESIA', 1),
(473, 19, '2020-05-10', 'Mei 2020', NULL, 50000, 'Sewa Wireless Router', NULL, 'DOPNET INDONESIA', 0),
(474, 19, '2020-06-10', 'Juni 2020', NULL, 50000, 'Sewa Wireless Router', NULL, 'DOPNET INDONESIA', 0),
(475, 19, '2020-07-10', 'Juli 2020', NULL, 50000, 'Sewa Wireless Router', NULL, 'DOPNET INDONESIA', 0),
(476, 19, '2020-08-10', 'Agustus 2020', NULL, 50000, 'Sewa Wireless Router', NULL, 'DOPNET INDONESIA', 0),
(477, 19, '2020-09-10', 'September 2020', NULL, 50000, 'Sewa Wireless Router', NULL, 'DOPNET INDONESIA', 0),
(478, 19, '2020-10-10', 'Oktober 2020', NULL, 50000, 'Sewa Wireless Router', NULL, 'DOPNET INDONESIA', 0),
(479, 19, '2020-11-10', 'November 2020', NULL, 50000, 'Sewa Wireless Router', NULL, 'DOPNET INDONESIA', 0),
(480, 19, '2020-12-10', 'Desember 2020', NULL, 50000, 'Sewa Wireless Router', NULL, 'DOPNET INDONESIA', 0),
(481, 15, '2020-01-10', 'Januari 2020', NULL, 150000, '5 Mbps [Share]', NULL, 'DOPNET INDONESIA', 0),
(482, 15, '2020-02-10', 'Februari 2020', NULL, 150000, '5 Mbps [Share]', NULL, 'DOPNET INDONESIA', 0),
(483, 15, '2020-03-10', 'Maret 2020', NULL, 150000, '5 Mbps [Share]', NULL, 'DOPNET INDONESIA', 0),
(484, 15, '2020-04-10', 'April 2020', '2020-04-16', 150000, '5 Mbps [Share]', NULL, 'DOPNET INDONESIA', 1),
(485, 15, '2020-05-10', 'Mei 2020', NULL, 150000, '5 Mbps [Share]', NULL, 'DOPNET INDONESIA', 0),
(486, 15, '2020-06-10', 'Juni 2020', NULL, 150000, '5 Mbps [Share]', NULL, 'DOPNET INDONESIA', 0),
(487, 15, '2020-07-10', 'Juli 2020', NULL, 150000, '5 Mbps [Share]', NULL, 'DOPNET INDONESIA', 0),
(488, 15, '2020-08-10', 'Agustus 2020', NULL, 150000, '5 Mbps [Share]', NULL, 'DOPNET INDONESIA', 0),
(489, 15, '2020-09-10', 'September 2020', NULL, 150000, '5 Mbps [Share]', NULL, 'DOPNET INDONESIA', 0),
(490, 15, '2020-10-10', 'Oktober 2020', NULL, 150000, '5 Mbps [Share]', NULL, 'DOPNET INDONESIA', 0),
(491, 15, '2020-11-10', 'November 2020', NULL, 150000, '5 Mbps [Share]', NULL, 'DOPNET INDONESIA', 0),
(492, 15, '2020-12-10', 'Desember 2020', NULL, 150000, '5 Mbps [Share]', NULL, 'DOPNET INDONESIA', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_kas_keluar`
--

CREATE TABLE `tbl_kas_keluar` (
  `id` int(11) NOT NULL,
  `nama_kas_keluar` varchar(50) NOT NULL,
  `jumlah_kas_keluar` int(11) NOT NULL,
  `ket_kas_keluar` text NOT NULL,
  `date_input` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_kas_masuk`
--

CREATE TABLE `tbl_kas_masuk` (
  `id` int(11) NOT NULL,
  `jenis_kas` enum('masuk','keluar') NOT NULL,
  `nama_kas` varchar(50) NOT NULL,
  `jumlah_kas` int(11) NOT NULL,
  `jumlah_kas_keluar` int(11) NOT NULL,
  `ket_kas` text NOT NULL,
  `date_input` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_kas_masuk`
--

INSERT INTO `tbl_kas_masuk` (`id`, `jenis_kas`, `nama_kas`, `jumlah_kas`, `jumlah_kas_keluar`, `ket_kas`, `date_input`) VALUES
(21, 'masuk', '01 ALKA_AYUK_YUNI', 150000, 0, 'Bayar Iuran, April 2020', '2020-04-16 08:46:20'),
(22, 'masuk', '02 AYUK_TETI', 150000, 0, 'Bayar Iuran, April 2020', '2020-04-16 08:56:01'),
(23, 'masuk', '03 AYUK_ELI_MAS_NGATINO', 150000, 0, 'Bayar Iuran, April 2020', '2020-04-16 08:56:22'),
(24, 'masuk', '04 BAYU_OM_ADI', 150000, 0, 'Bayar Iuran, April 2020', '2020-04-16 08:56:33'),
(25, 'masuk', '05 ZAKIA_OM_GINOK', 150000, 0, 'Bayar Iuran, April 2020', '2020-04-16 08:56:42'),
(26, 'masuk', 'HERLINA_INTAN_FRANSHISKA', 150000, 0, 'Bayar Iuran, April 2020', '2020-04-16 08:56:58'),
(27, 'masuk', 'YOGA_OM_BAMBANG', 150000, 0, 'Bayar Iuran, April 2020', '2020-04-16 08:57:14'),
(28, 'masuk', 'BUTET', 150000, 0, 'Bayar Iuran, April 2020', '2020-04-16 08:57:25'),
(29, 'masuk', 'FATUR', 150000, 0, 'Bayar Iuran, April 2020', '2020-04-16 08:57:39'),
(30, 'masuk', 'DERA_AYUK_ELI', 150000, 0, 'Bayar Iuran, April 2020', '2020-04-16 08:57:56'),
(31, 'masuk', 'IGEN_KONTRAKAN_LEMPUING', 150000, 0, 'Bayar Iuran, April 2020', '2020-04-16 08:58:29'),
(32, 'masuk', 'ANWAR_KIKI_IPUL', 150000, 0, 'Bayar Iuran, April 2020', '2020-04-16 08:59:15'),
(33, 'masuk', 'BAYU_OM_DONI', 150000, 0, 'Bayar Iuran, April 2020', '2020-04-16 08:59:28'),
(34, 'masuk', 'AYUK_WARUNG_BAKSO_JOKO', 50000, 0, 'Bayar Iuran, April 2020', '2020-04-16 08:59:48'),
(35, 'masuk', '[PSB] IBU YULIA LEMPUING', 150000, 0, 'Biaya Instalasi Perangkat', '2020-04-16 09:03:05'),
(36, 'masuk', '[TAGIHAN] Igen Distro Barcode - Cabut', 50000, 0, 'Pembayaran Tagihan Terakhir Barcode Distro', '2020-04-16 09:04:00'),
(37, 'masuk', '[TAMBAHAN] SUPPORT BALMON BENGKULU', 50000, 0, 'BIAYA SETUP PERANGKAT', '2020-04-16 09:04:48'),
(38, 'keluar', '[RUTIN] PENAGIHAN GANI', 0, 100000, 'BIAYA TAGIH BULAN APRIL', '2020-04-16 09:05:55'),
(39, 'keluar', '[RUTIN] LISTRIK RUMAH', 0, 150000, 'Bantu Iuran Listrik Rumah', '2020-04-16 09:06:24'),
(40, 'keluar', '[OPS] HARIAN', 0, 100000, 'Belanja Dapur', '2020-04-16 09:07:35'),
(41, 'keluar', '[TAGIHAN WMS] RUTIN BULANAN', 0, 738000, 'TAGIHAN WMS TELKOM BULAN APRIL 2020', '2020-04-16 09:08:18'),
(42, 'keluar', '[Services Motor]', 0, 75000, 'Ganti Oli & Isi BBM Motor Beat Street', '2020-04-16 15:24:35');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `no_hp` varchar(128) NOT NULL,
  `image` varchar(128) NOT NULL,
  `password` varchar(128) NOT NULL,
  `role_id` int(11) NOT NULL,
  `is_active` int(1) NOT NULL,
  `date_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `no_hp`, `image`, `password`, `role_id`, `is_active`, `date_created`) VALUES
(25, 'DOPNET INDONESIA', 'deckyokmal@gmail.com', '081347578908', 'logo_dopnet.jpg', '$2y$10$PR4F.S7aI8942mudlccUxu9FdkaAiiMMpNHszUH.7LOCcvW4M1tPq', 1, 1, 1586959389),
(27, 'kasir1', 'kasir1@gmail.com', '081347578908', 'default.jpg', '$2y$10$Gy.X9ZpuXonSMUU0XZh0/u1aWoaOc27wGv2aHy3VgBkSd0wiCyLaq', 2, 1, 1587017004);

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
(2, 2, 2),
(5, 1, 2),
(6, 1, 16),
(10, 2, 28),
(14, 4, 2),
(16, 3, 2),
(17, 3, 28),
(18, 3, 29),
(20, 4, 28),
(21, 5, 29),
(22, 5, 30),
(23, 5, 2),
(25, 1, 3),
(26, 1, 32),
(27, 1, 33),
(28, 1, 4),
(29, 1, 5),
(31, 1, 7),
(33, 3, 1),
(34, 3, 4),
(36, 1, 11),
(39, 2, 6),
(40, 2, 7),
(41, 2, 8),
(42, 2, 9),
(44, 1, 12),
(45, 2, 12),
(46, 1, 10),
(47, 2, 10);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_menu`
--

CREATE TABLE `user_menu` (
  `id` int(11) NOT NULL,
  `menu` varchar(128) NOT NULL,
  `url_menu` varchar(128) NOT NULL,
  `icon_menu` varchar(128) NOT NULL,
  `is_active` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user_menu`
--

INSERT INTO `user_menu` (`id`, `menu`, `url_menu`, `icon_menu`, `is_active`) VALUES
(1, 'Admin', 'admin', 'fa fa-fw fa-dashboard', 1),
(2, 'Akun Saya', 'user', 'fa fa-fw fa-user-md', 1),
(3, 'Pengelolaan Menu', 'menu', 'fa fa-fw fa-th-large', 1),
(4, 'Kas', 'kas', 'fa fa-fw fa-folder-o', 0),
(7, 'Pelanggan', 'pelanggan', 'fa fa-fw fa-group', 0),
(10, 'Iuran Bulanan', 'iuran', 'fa fa-fw fa fa-angellist', 0),
(11, 'Laporan', 'laporan', 'fa fa-fw fa-folder-o', 0);

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
(1, 'Administrator'),
(2, 'Kasir');

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
(1, 1, 'Dashboard', 'admin', 'fa fa-fw fa-tachometer', 1),
(2, 2, 'My Profile', 'user', 'fa fa-fw fa-drupal', 0),
(3, 3, 'Menu Manajemen', 'menu', 'fa fa-fw fa-folder-o', 1),
(4, 3, 'Submenu Manajemen', 'menu/submenu', 'fa fa-fw fa-folder-open-o', 1),
(5, 2, 'Edit Profile', 'user/edit', 'fa fa-fw fa-edit (alias)', 1),
(7, 1, 'Role Akses', 'admin/role', 'fa fa-fw  fa-hand-o-right', 1),
(8, 2, 'Ganti Password', 'user/changepassword', 'fa fa-fw fa-rotate-right (alias)', 1),
(9, 1, 'Data Pengguna', 'admin/userakses', '', 1),
(10, 1, 'Perusahaan', 'admin/perusahaan', '', 1),
(11, 4, 'Kas Masuk', 'kas', '', 1),
(12, 4, 'Kas Keluar', 'kas/kas_keluar', '', 1),
(13, 6, 'Data Produk', 'produk', '', 1),
(14, 6, 'Kategori Produk', 'produk/kategori', '', 1),
(16, 7, 'Data Pelanggan', 'pelanggan', '', 1),
(17, 7, 'Grup Pelanggan', 'pelanggan/grup', '', 1),
(25, 11, 'Laporan Kas', 'laporan/kas', '', 1),
(28, 8, 'Data Penjualan', 'transaksi/list_penjualan', '', 1),
(29, 10, 'Data Pembayaran Iuran', 'iuran', '', 1),
(30, 10, 'Buat Tagihan', 'iuran/buat_tagihan', '', 1),
(31, 10, 'Rekap Perbulan', 'iuran/bulan_ini', '', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_token`
--

CREATE TABLE `user_token` (
  `id` int(11) NOT NULL,
  `email` varchar(128) NOT NULL,
  `token` varchar(128) NOT NULL,
  `date_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user_token`
--

INSERT INTO `user_token` (`id`, `email`, `token`, `date_created`) VALUES
(9, 'faatih.network@gmail.com', '7133d50431a22abfb380d5de2e2b0a7a2335a74d0d261599e716d1daf59a9426', 1586538527);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `grup_pelanggan`
--
ALTER TABLE `grup_pelanggan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `laporan`
--
ALTER TABLE `laporan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `notif`
--
ALTER TABLE `notif`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `perusahaan`
--
ALTER TABLE `perusahaan`
  ADD PRIMARY KEY (`id_perus`);

--
-- Indeks untuk tabel `tbl_bulan`
--
ALTER TABLE `tbl_bulan`
  ADD PRIMARY KEY (`id_bulan`);

--
-- Indeks untuk tabel `tbl_iuran`
--
ALTER TABLE `tbl_iuran`
  ADD PRIMARY KEY (`id_iuran`);

--
-- Indeks untuk tabel `tbl_kas_keluar`
--
ALTER TABLE `tbl_kas_keluar`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tbl_kas_masuk`
--
ALTER TABLE `tbl_kas_masuk`
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
-- Indeks untuk tabel `user_token`
--
ALTER TABLE `user_token`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `grup_pelanggan`
--
ALTER TABLE `grup_pelanggan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `laporan`
--
ALTER TABLE `laporan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `notif`
--
ALTER TABLE `notif`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `pelanggan`
--
ALTER TABLE `pelanggan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT untuk tabel `perusahaan`
--
ALTER TABLE `perusahaan`
  MODIFY `id_perus` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `tbl_bulan`
--
ALTER TABLE `tbl_bulan`
  MODIFY `id_bulan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `tbl_iuran`
--
ALTER TABLE `tbl_iuran`
  MODIFY `id_iuran` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=493;

--
-- AUTO_INCREMENT untuk tabel `tbl_kas_keluar`
--
ALTER TABLE `tbl_kas_keluar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `tbl_kas_masuk`
--
ALTER TABLE `tbl_kas_masuk`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT untuk tabel `user_access_menu`
--
ALTER TABLE `user_access_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT untuk tabel `user_menu`
--
ALTER TABLE `user_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `user_role`
--
ALTER TABLE `user_role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT untuk tabel `user_token`
--
ALTER TABLE `user_token`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
