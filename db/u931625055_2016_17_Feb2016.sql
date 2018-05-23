-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 17 Feb 2016 pada 08.35
-- Versi Server: 10.1.9-MariaDB
-- PHP Version: 5.5.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `u931625055_2016`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `ID` int(11) NOT NULL,
  `id_level` int(1) NOT NULL DEFAULT '1',
  `username` varchar(10) COLLATE latin1_general_ci NOT NULL,
  `password` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `keterangan` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `nama_lengkap` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `email` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `telepon` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `foto` varchar(100) COLLATE latin1_general_ci NOT NULL DEFAULT 'no_foto.jpg',
  `aktif` enum('Y','N') COLLATE latin1_general_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`ID`, `id_level`, `username`, `password`, `keterangan`, `nama_lengkap`, `email`, `telepon`, `foto`, `aktif`) VALUES
(4, 1, 'admin', 'c7ad44cbad762a5da0a452f9e854fdc1e0e7a52a38015f23f3eab1d80b931dd472634dfac71cd34ebc35d16ab7fb8a90c81f975113d6c7538dc69dd8de9077ec', '', 'admin', '', '', 'admin.jpg', 'Y'),
(5, 1, 'prodipai', 'e959ff21b941dd9ca11a4db2add4fa61cb7c2df7a8f03b7c4ca2466b05b5f4899574ef5b1e880812da3ace98d0beacb1419c6c7ebda7169aabc3b1fb0f92f04e', 'Ketua Prodi PAI', 'Drs.Lili Sadeli, M.Pd.I', '', '', '', 'Y'),
(6, 1, 'prodieksya', '1c491c214a0b0778a0fee8f8e0e4651d97ffa06cc1dfcf0563844876867a879ee9f76b67051caa8ed73873ddfac66b2c1ecea69357e584af4a9d216de50a43af', 'Ketua Prodi Ekonomi Syariah', 'H. Agus Hermawan, M.Ag.', '', '', '', 'Y');

-- --------------------------------------------------------

--
-- Struktur dari tabel `agama`
--

CREATE TABLE `agama` (
  `ID` int(11) NOT NULL,
  `nama` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `aktif` enum('Y','N') COLLATE latin1_general_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data untuk tabel `agama`
--

INSERT INTO `agama` (`ID`, `nama`, `aktif`) VALUES
(1, 'ISLAM', 'Y'),
(2, 'KRISTEN KATOLIK', 'Y'),
(3, 'KRISTEN PROTESTAN', 'Y'),
(4, 'BUDHA', 'Y'),
(5, 'HINDU', 'Y'),
(6, 'LAIN-LAIN', 'Y');

-- --------------------------------------------------------

--
-- Struktur dari tabel `akademik`
--

CREATE TABLE `akademik` (
  `ID` int(11) NOT NULL,
  `id_level` int(2) NOT NULL DEFAULT '3',
  `Identitas_ID` int(5) NOT NULL,
  `Jurusan_ID` int(5) NOT NULL,
  `username` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `password` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `nama_lengkap` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `keterangan` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `email` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `telepon` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `alamat` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `foto` varchar(100) COLLATE latin1_general_ci NOT NULL DEFAULT 'no_foto.jpg',
  `aktif` enum('Y','N') COLLATE latin1_general_ci NOT NULL DEFAULT 'Y'
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data untuk tabel `akademik`
--

INSERT INTO `akademik` (`ID`, `id_level`, `Identitas_ID`, `Jurusan_ID`, `username`, `password`, `nama_lengkap`, `keterangan`, `email`, `telepon`, `alamat`, `foto`, `aktif`) VALUES
(7, 3, 213131, 86208, 'prodipai', 'e959ff21b941dd9ca11a4db2add4fa61cb7c2df7a8f03b7c4ca2466b05b5f4899574ef5b1e880812da3ace98d0beacb1419c6c7ebda7169aabc3b1fb0f92f04e', 'Drs. Lili Sadeli, M.Pd.I', 'Ketua Prodi Agama Islam', '', '', '', 'no_foto.jpg', 'Y'),
(6, 3, 213131, 60202, 'prodieksyar', '1c491c214a0b0778a0fee8f8e0e4651d97ffa06cc1dfcf0563844876867a879ee9f76b67051caa8ed73873ddfac66b2c1ecea69357e584af4a9d216de50a43af', 'H. Agus Hermawan, M.Ag.', 'Ketua Prodi Ekonomi Syariah', '', '', '', 'no_foto.jpg', 'Y');

-- --------------------------------------------------------

--
-- Struktur dari tabel `beritaawal`
--

CREATE TABLE `beritaawal` (
  `id` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `isi` text COLLATE latin1_general_ci NOT NULL,
  `gambar` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `aktif` enum('Y','N') COLLATE latin1_general_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data untuk tabel `beritaawal`
--

INSERT INTO `beritaawal` (`id`, `tanggal`, `isi`, `gambar`, `aktif`) VALUES
(1, '2015-07-16', 'Pembuatan Aplikasi Sistem Informasi Akademik Kampus ini bertujuan sebagai bahan pembelajaran bagi para programmer di indonesia baik tingkat pemula, menegah,maupun mahir, sehingga dengan hadirnya pembelajaran ini kedepannya para programmer dapat membuat berbagai aplikasi lainnya dengan memahami konsep sederhana yang penulis sajikan ini \r\n\r\ndan didalam praktek pembuatan aplikasi tersebut jika para programmer sulit memahami jalannya program untuk segera merujuk kepada buku yang telah diterbitkan\r\n\r\n', 'icon.png', 'Y');

-- --------------------------------------------------------

--
-- Struktur dari tabel `dosen`
--

CREATE TABLE `dosen` (
  `ID` int(10) NOT NULL,
  `id_level` int(1) NOT NULL DEFAULT '2',
  `username` varchar(20) COLLATE latin1_general_ci DEFAULT NULL,
  `password` varchar(255) COLLATE latin1_general_ci DEFAULT NULL,
  `NIDN` varchar(50) COLLATE latin1_general_ci DEFAULT NULL,
  `nama_lengkap` varchar(100) COLLATE latin1_general_ci DEFAULT NULL,
  `Identitas_ID` int(5) NOT NULL,
  `Jurusan_ID` varchar(50) COLLATE latin1_general_ci DEFAULT NULL,
  `InstitusiInduk` varchar(50) COLLATE latin1_general_ci DEFAULT NULL,
  `Homebase` varchar(50) COLLATE latin1_general_ci DEFAULT NULL,
  `TempatLahir` varchar(50) COLLATE latin1_general_ci DEFAULT NULL,
  `TanggalLahir` date DEFAULT NULL,
  `KTP` varchar(50) COLLATE latin1_general_ci DEFAULT NULL,
  `Agama` varchar(50) COLLATE latin1_general_ci DEFAULT NULL,
  `Alamat` text COLLATE latin1_general_ci,
  `Email` varchar(100) COLLATE latin1_general_ci DEFAULT NULL,
  `Telepon` varchar(100) COLLATE latin1_general_ci DEFAULT NULL,
  `Handphone` varchar(50) COLLATE latin1_general_ci DEFAULT NULL,
  `Keterangan` varchar(100) COLLATE latin1_general_ci DEFAULT NULL,
  `Kota` varchar(50) COLLATE latin1_general_ci DEFAULT NULL,
  `Propinsi` varchar(50) COLLATE latin1_general_ci DEFAULT NULL,
  `Negara` varchar(50) COLLATE latin1_general_ci DEFAULT NULL,
  `Gelar` varchar(50) COLLATE latin1_general_ci DEFAULT NULL,
  `Jenjang_ID` varchar(50) COLLATE latin1_general_ci DEFAULT NULL,
  `Keilmuan` varchar(50) COLLATE latin1_general_ci DEFAULT NULL,
  `Kelamin_ID` varchar(50) COLLATE latin1_general_ci DEFAULT NULL,
  `Jabatan_ID` varchar(50) COLLATE latin1_general_ci DEFAULT NULL,
  `JabatanDikti_ID` varchar(2) COLLATE latin1_general_ci NOT NULL,
  `TglBekerja` date NOT NULL,
  `StatusDosen_ID` varchar(50) COLLATE latin1_general_ci DEFAULT NULL,
  `StatusKerja_ID` varchar(50) COLLATE latin1_general_ci DEFAULT NULL,
  `Aktif` enum('Y','N') COLLATE latin1_general_ci NOT NULL,
  `foto` varchar(100) COLLATE latin1_general_ci DEFAULT 'no foto.jpg'
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data untuk tabel `dosen`
--

INSERT INTO `dosen` (`ID`, `id_level`, `username`, `password`, `NIDN`, `nama_lengkap`, `Identitas_ID`, `Jurusan_ID`, `InstitusiInduk`, `Homebase`, `TempatLahir`, `TanggalLahir`, `KTP`, `Agama`, `Alamat`, `Email`, `Telepon`, `Handphone`, `Keterangan`, `Kota`, `Propinsi`, `Negara`, `Gelar`, `Jenjang_ID`, `Keilmuan`, `Kelamin_ID`, `Jabatan_ID`, `JabatanDikti_ID`, `TglBekerja`, `StatusDosen_ID`, `StatusKerja_ID`, `Aktif`, `foto`) VALUES
(1, 2, 'STAI044', 'f72ab66c9ac8be5d6415d3d13faf76692883f533a98714924d5fa8e4283a70bde889b4d817a7938ce02c8703c3c8bd35e5523c33548c69f3e32ae33133683af8', '', 'Yanyan Sofiyan', 213131, '60202,86208', '', '', 'Sumedang', '1989-07-16', '', 'ISLAM', 'Jl.Padjajaran No.01 Rt 05 Rw 02 Ds.Legok Kidul Kec.Paseh Kab.Sumedang Kode Pos 45381', 'sofiyanyanyan90@gmail.com', '085696371900', '085696371900', NULL, 'Sumedang', 'Jawa Barat', 'Indonesia', 'S.Kom', 'B', 'Rekayasa Sistem Informasi', '', 'B', '0', '0000-00-00', '0', 'D', 'Y', 'akademik.jpg'),
(2, 2, 'STAI017', '1ce668382b9ffece55aecf6289a797c57abc8ce3d6bc8e11e5e9b931e156a141e8bce3416b708a90ef0b1c01b540178a5bc65507d484df5584da887fa458c679', '', 'A.Djuwaeni Soheh, Drs.', 213131, '86208', '', '', '', '0000-00-00', '', '0', '', '', '', '', NULL, '', '', '', '', '0', '', '', '0', '0', '0000-00-00', '0', '0', 'Y', 'no foto.jpg'),
(3, 2, 'STAI018', '67fc7399b60fc876b2c9bc31be897c992d06bb303ce570899637864eed8d644b6f72741c48ee65e6f5b8bc46c918ac23f3a5c73dc74030f5657ee9284ec523cd', '', 'Adam Malik Ibrahim, Drs.', 213131, '86208', '', '', '', '0000-00-00', '', '0', '', '', '', '', NULL, '', '', '', '', '0', '', '', '0', '0', '0000-00-00', '0', '0', 'Y', 'no foto.jpg'),
(4, 2, 'STAI019', '99d7afad5a5b3d9d97b7a0b6c0519e9bc57b121e7cff07c6a70c8543d0a879c23354b2b577bc7dc9365f942fc797fef3ea803ab30c1c364e1ba61c31f0e13483', '', 'Amin Irfan, Drs.', 213131, '86208', '', '', '', '0000-00-00', '', '0', '', '', '', '', NULL, '', '', '', '', '0', '', '', '0', '0', '0000-00-00', '0', '0', 'Y', 'no foto.jpg'),
(5, 2, 'STAI020', '3f2e6a17b78e6210bc32130b0daa04180c82ec9efbaa0494705348fcbda4ec256766357b21d6aaf8c0e6052530ab785dc86163ea9e0e8ef7a066e12323ab5b3e', '', 'Dhita Tien S, S.Pd. M.Pd.', 213131, '60202,86208', '', '', '', '0000-00-00', '', 'ISLAM', '', '', '', '', NULL, '', '', '', '', '0', '', '', '0', '0', '0000-00-00', '0', '0', 'Y', 'no foto.jpg'),
(6, 2, 'STAI021', '86014e0bb52706d25062698ed06f9e3665788f41494a026b865ce7c6f1ea0d59b6b670e1e8853a26a9a4dc15465bca50d2e1e61d4b3d03fcac0d612dcc5aed9c', '', 'Drs. Dindin Saefudin, M.M.Pd.', 213131, '86208', '', '', '', '0000-00-00', '', 'ISLAM', '', '', '', '', NULL, '', '', '', '', '0', '', '', '0', '0', '0000-00-00', '0', '0', 'Y', 'no foto.jpg'),
(10, 2, 'STAI040', '79319a6bf444251a97efc3b102ac3435cf5ad085a64046aeb082334c9cf4c4f9a785a7422ddf4fdd98a9ede7212976fc5d542964d6f2e3be8e2a593ecf432056', '', 'Suherman, S.Ag. M.S.I', 213131, '86208', NULL, NULL, '', '0000-00-00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '0000-00-00', NULL, NULL, 'Y', 'no foto.jpg'),
(7, 2, 'STAI043', 'a21293c577333189e1c58c37c33ef430f74672c22081cb116914c50a10b39605f6a3b9738345e960cd2d0e0193975472b07e1b57fabf1cc9a0a1bb78e9d08e17', '', 'Taruna Sonjaya, Drs.', 213131, '86208', NULL, NULL, '', '0000-00-00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '0000-00-00', NULL, NULL, 'Y', 'no foto.jpg'),
(8, 2, 'STAI042', '7a2432c8b865794b910f11295af22e246b688c93d7f4bc979ac0aa46f2b652f943a8372f921ca795bd6fbdeb3a5f47a3d37f1f55710acb7c64eea8f4dfbdbe09', '', 'Sutarti, Dra., M.Pd.', 213131, '86208', NULL, NULL, '', '0000-00-00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '0000-00-00', NULL, NULL, 'Y', 'no foto.jpg'),
(9, 2, 'STAI041', 'e2df829d72764cddcb189b811371f491d053ae8e08e188dd73e3c3710123dc07c6a5d0f63dc1d7664f2611996dee98c0f9bbbcf3f2987cf8f4bfd302b6c60d48', '', 'Suhyat, S.Pd., M.Pd.', 213131, '86208', NULL, NULL, '', '0000-00-00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '0000-00-00', NULL, NULL, 'Y', 'no foto.jpg'),
(11, 2, 'STAI039', 'ac6213783f6d944b154f9e0f6dd29fb05c0a4b34eef86eb4ef5b0766763215ebfa91bed037776141156c6f391486179196116d676f29c4ba4da168ccea934957', '', 'Riska Hermina Rahmawati, S.Pd.', 213131, '86208', NULL, NULL, '', '0000-00-00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '0000-00-00', NULL, NULL, 'Y', 'no foto.jpg'),
(12, 2, 'STAI038', '9259e00727a287bc59e59114c800906ccca7fcf5b4cddd277aff29127f2cc6e5e70637941c008fc4d14c85d4ca8e80b076e13a1bcbde8aab33092d58976a2df0', '', 'Muslim Mubarok, Drs., M.Ag.', 213131, '86208', NULL, NULL, '', '0000-00-00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '0000-00-00', NULL, NULL, 'Y', 'no foto.jpg'),
(13, 2, 'STAI037', '1cfbb56d8205c557eba3f83d4858192cbb240a0762a359fad6899d9a7cae789dcffbc93ede454a34efd4bf2bb1e073c4c7b8df924b5dd871041c05fe025351c3', '', 'Munir Natsir, Drs., M.Si.', 213131, '86208', NULL, NULL, '', '0000-00-00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '0000-00-00', NULL, NULL, 'Y', 'no foto.jpg'),
(14, 2, 'STAI036', 'e87ce1d7c22195a6b2cb7f625c6a91c2e4d7e1b1faa2f34e551220aa62738d4e68c774f51caef6bbfd21a02074a30a91e8890f64c5cfbf0291e14d6a582d0e6e', '', 'Imron Mustofa, S.Ag.', 213131, '86208', NULL, NULL, '', '0000-00-00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '0000-00-00', NULL, NULL, 'Y', 'no foto.jpg'),
(15, 2, 'STAI035', 'e8f59750655ac32cb60cb47e33943500da0fc6b41bd8e41ee39ee1fbe2eae157855c41240075238870122b81ac383365d9cda287508499815f98c0e8b3301f9d', '', 'Hj.Winy Roswinawati, S.Ag.,M.Si.', 213131, '86208', NULL, NULL, '', '0000-00-00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '0000-00-00', NULL, NULL, 'Y', 'no foto.jpg'),
(16, 2, 'STAI034', 'd456ffa38a51a72f227f1990047ebe93d9943f177aae0c3fe18181a09e05c68b7aabdb3e7a663423d58a82c97abe47b630888618a86de1f78978d3077929811d', '', 'Hj. Iin Inayah T. Dra. M.M.Pd.', 213131, '86208', NULL, NULL, '', '0000-00-00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '0000-00-00', NULL, NULL, 'Y', 'no foto.jpg'),
(17, 2, 'STAI033', '9a7eb86a59c8408c60deca3d8450be2386f300ebff27197a5ede4518f1f0828a29cef3cafe92c595710d05af981829eed21b9d984b655ceedfcd362d72c93d78', '', 'H.Firdaus, Drs., M.Pd.', 213131, '60202,86208', NULL, NULL, '', '0000-00-00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '0000-00-00', NULL, NULL, 'Y', 'no foto.jpg'),
(18, 2, 'STAI032', '8f009d7b7657ed6bb622a900b8e502bbdf846cb7ab7d2442ede5135d38536f6f1aeb42225ec112a0b6f1a074e3d1eef4ac485dd213ca948ff1bb8be49879fe9a', '', 'H.Dadang Alawi, S.Ag., M.Ag.', 213131, '86208', NULL, NULL, '', '0000-00-00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '0000-00-00', NULL, NULL, 'Y', 'no foto.jpg'),
(19, 2, 'STAI031', '5e643254e32339d05c445a1dfe50531e2c81aa173f5ce123ba8a67e6904b04af89fb35a7ae889f988fafdb737dcdabfe0d41ae16467ecd3e35fa0123ed175333', '', 'H. Aep Sobandi, Drs.', 213131, '86208', NULL, NULL, '', '0000-00-00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '0000-00-00', NULL, NULL, 'Y', 'no foto.jpg'),
(20, 2, 'STAI030', 'c65731aca7f26939985c43aafc9071670da558c72badf45006800b54cee77551698ab9ac6b6bb535985f193e040a31c2f84431359debf82421ed530e24cfef60', '', 'H. Rahmat, S.Ag, M.S.i', 213131, '86208', NULL, NULL, '', '0000-00-00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '0000-00-00', NULL, NULL, 'Y', 'no foto.jpg'),
(21, 2, 'STAI029', 'a49bbc9e8a4cebd66aebc4fdba48183088dd9452c371ca78dd75c7c0b6ac1398ac26cf82c7b27700bfe7502125e144ce6a4a1879755a70218f84ccaf02d5fc4d', '', 'H. Asep Sardi Somantri, Drs., M.M.Pd.', 213131, '86208', NULL, NULL, '', '0000-00-00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '0000-00-00', NULL, NULL, 'Y', 'no foto.jpg'),
(22, 2, 'STAI028', 'd8755def69f26dcf00bbe2ece574c7e1efc7a687994b906d117685baaa7703b17b6fca13fa56f29ec76ac21c8ecd435bd1a6765b8bf3704773ad1bc63151d40a', '', 'Drs. H. Ading Sudiana, M.Si', 213131, '60202,86208', '', '', '', '0000-00-00', '', 'ISLAM', '', '', '', '', NULL, '', '', '', '', '0', '', '', '0', '0', '0000-00-00', '0', '0', 'Y', 'no foto.jpg'),
(23, 2, 'STAI027', '522655e62abd6c99b4bcfb7653a4c3b90e8458994f980093df3e4b40699521f31f442cfedd56073c0b652e6f8aaa5052104798b4826ff4d01682016f42414478', '', 'Ela Hodijah, S.Ag., M.Pd.I', 213131, '60202,86208', NULL, NULL, '', '0000-00-00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '0000-00-00', NULL, NULL, 'Y', 'no foto.jpg'),
(24, 2, 'STAI026', '1b9ad661576fdb7078494b1a9d8aeddcb7663811dddab7144bde9ceb7c3d6c302e7d9da22fc3c9ac36ab3f9e6cb89755ad5607da7fd744dfe3c7f234c3b916e4', '', 'Edi Junaedi, S.Hut., S.Ag.,M.Pd.I', 213131, '60202,86208', NULL, NULL, '', '0000-00-00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '0000-00-00', NULL, NULL, 'Y', 'no foto.jpg'),
(25, 2, 'STAI025', '211dd0650c58e757e8e275d8b5f92a446a7bcab135801f777174280f05536ac72ddf44209ad77ea7c72b0e4ee8f61f39eb387018bf0a9dafe387bf9bd72ddd9f', '', 'Eddy Riady Husein, Drs.', 213131, '86208', NULL, NULL, '', '0000-00-00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '0000-00-00', NULL, NULL, 'Y', 'no foto.jpg'),
(26, 2, 'STAI024', '5393a419ee1647831875e7c426e3d6b47a1aaaceb9527f577a52ce6ed5884b63073761c43f3762677ce79c8d78a38c4ed6b63e0f0240187a30dc4b98e9801799', '', 'Drs.Lili Sadeli, M.Pd.I', 213131, '86208', NULL, NULL, '', '0000-00-00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '0000-00-00', NULL, NULL, 'Y', 'no foto.jpg'),
(27, 2, 'STAI023', '5b13fb11e3d29fe3ed060573cf3707d8f7cb41f67a18813370ffd468fcc509a7f3c7e8cab262e4e11cdfc257df092de04036d9f588ac8fcb8c71a2c5374ee120', '', 'Dr. H. Rahman Setia, M.M.', 213131, '60202,86208', NULL, NULL, '', '0000-00-00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '0000-00-00', NULL, NULL, 'Y', 'no foto.jpg'),
(28, 2, 'STAI022', 'b412d9fe64aa465bb82d7f31cb56af161a9ed17ee5e5f679da17cbf2541b99f7ccedfe0fc25d64708bf02623dc05fbb3e4fb044de937aba428d1ab3bc3f86a36', '', 'Dr. Dian Sukmara, M.Pd.', 213131, '86208', NULL, NULL, '', '0000-00-00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '0000-00-00', NULL, NULL, 'Y', 'no foto.jpg'),
(29, 2, 'STAI001', '5dab0281bfecc19ff4031af086e77910e453583bca4acdefa3406fd8074a6d99147d1474b4f05217f5c4ce1c5e06f8e25583911e8df5b7aa41badd863eb5badf', '', 'A.Suherman, Drs., M.Pd.', 213131, '60202', NULL, NULL, '', '0000-00-00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '0000-00-00', NULL, NULL, 'Y', 'no foto.jpg'),
(30, 2, 'STAI002', '4620be728f20a23c5ea151c683967ef29d6fe2fd3715607a4eb1becbc5613cb8888dbab0e86e9d96cd556dbf98701234bf079c7f8e9010cd9f6c7fa38c31b883', '', 'AA Kartiwa, M.M', 213131, '60202', NULL, NULL, '', '0000-00-00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '0000-00-00', NULL, NULL, 'Y', 'no foto.jpg'),
(31, 2, 'STAI003', 'e4757a936e37fc4faf74832f2c33778f013f9e0670d54a66c6f9d71bc7557f2a9f87954f04a217ed6dddb2a1a1a8432930d8f911c566f6e9377900dae21c5e0e', '', 'Abdul Hamid, M.M', 213131, '60202', NULL, NULL, '', '0000-00-00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '0000-00-00', NULL, NULL, 'Y', 'no foto.jpg'),
(32, 2, 'STAI004', '1e0071c479d9f476c10f221d5287e473aa166b967d67d31df2c3147363e0a82ef67f90a79e1b678dc75b26b8b5b67d9aafd078d3848cdb6e5a2c1ab748151cc0', '', 'Agus Hermawan, M.Ag.', 213131, '60202', NULL, NULL, '', '0000-00-00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '0000-00-00', NULL, NULL, 'Y', 'no foto.jpg'),
(33, 2, 'STAI005', '9fc2715f04bfbd0228d43ab03857ca5d0d6577c63c864173aa8ec5984eb3cea0b0a943274665aecec7a1bc4edc41673c0f57a11bccbd91e2178925109a9397ce', '', 'Asep Sudrajat, S.H', 213131, '60202', NULL, NULL, '', '0000-00-00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '0000-00-00', NULL, NULL, 'Y', 'no foto.jpg'),
(34, 2, 'STAI006', 'd589f2358a9ef1afc45980e234aa4c709288387fa0d3de5c41b6a4cb1177d4d5be8dd1bfae014f5e9066dce2fc82dc91657449ce690abc7248c18f4a29b2fd45', '', 'Budi Solihin, M.A', 213131, '60202', NULL, NULL, '', '0000-00-00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '0000-00-00', NULL, NULL, 'Y', 'no foto.jpg'),
(35, 2, 'STAI007', '05baa060a23aaa279d31acad98c223f140dfca5edf2f35efe6820b2b3d20799af24ec91123756345388fcb8ae363474a22783f4c0783c0af6e66aefe0012082e', '', 'Dadan Rahadian, S.Ag., M.Si.', 213131, '60202', NULL, NULL, '', '0000-00-00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '0000-00-00', NULL, NULL, 'Y', 'no foto.jpg'),
(36, 2, 'STAI008', 'd5bc8e4a77173524dc4809407de7334c3ec66dd9d318ee62b6eb2df1c1b18757c44e0a903fb42119bc24fc5be341e2524cf78dcf9731bd5b89fbcaf010ba910a', '', 'Dani Setiawan, M.Pd.', 213131, '60202', NULL, NULL, '', '0000-00-00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '0000-00-00', NULL, NULL, 'Y', 'no foto.jpg'),
(37, 2, 'STAI010', '311d38d6d18a11047140a366f8d91d13df27e9e9aba9ff8dcaa702e1c8f03c23652d6cb9545395f499ad53b57db839dc793bf0c5e4f3a5d57fcec8445a706697', '', 'Eef Saefullah, M.Ag', 213131, '60202', NULL, NULL, '', '0000-00-00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '0000-00-00', NULL, NULL, 'Y', 'no foto.jpg'),
(38, 2, 'STAI011', '67879d5c41e060998a6ecdfd20ebb74b449b4c71812d50762e717c04c4b9ea2ce90c86a3fe7b300e23abeedf40b98bffc28427d4db0d9a1dfcfbbb3d83e21716', '', 'Iwan Hermawan, S.E.,M.M', 213131, '60202', NULL, NULL, '', '0000-00-00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '0000-00-00', NULL, NULL, 'Y', 'no foto.jpg'),
(39, 2, 'STAI012', '4ae0024b245608e2fe0001379848568bfa9272cd3611bcf0318cacfb85040344bf27a95a0667334b2bc0385126b873464d1605308349fdb2d6a72e4ac5c43235', '', 'Nanang Sobarna, M.E.Sy.', 213131, '60202', NULL, NULL, '', '0000-00-00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '0000-00-00', NULL, NULL, 'Y', 'no foto.jpg'),
(40, 2, 'STAI013', 'a626a2076fc05a3856182cf3418f4062762151522573831b0e50f027d7a51f60fabddaae5945e725ef2784a4a29314d597b8c19f6854d4b9464f0719b8341406', '', 'Rahwan, S.Ag., M.Pd.I', 213131, '60202', NULL, NULL, '', '0000-00-00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '0000-00-00', NULL, NULL, 'Y', 'no foto.jpg'),
(41, 2, 'STAI014', 'a5074447e5bd30724fef114e397f62d70f359531ca5842137b6408185185308438b277807abfcb14d5d79c1d99c5d93df7573fa566054c593ca8cbeeb410054c', '', 'Solahudin Kamil, S.H.I', 213131, '60202', NULL, NULL, '', '0000-00-00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '0000-00-00', NULL, NULL, 'Y', 'no foto.jpg'),
(42, 2, 'STAI015', '8c793df88e6038ae3a64bec0c311115bf1f58346dd706565e49c0e60ce42669f108bb1d1abae24d7caf331dbba698dce47ee05440d64bdef0e9b7499253daa52', '', 'Sukmana, S.Ag., M.Ag.', 213131, '60202', NULL, NULL, '', '0000-00-00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '0000-00-00', NULL, NULL, 'Y', 'no foto.jpg'),
(43, 2, 'STAI016', 'c4d90b2b271e7fa7dfe5c6eb9c970e254fd6dedcfaff4cedf0a3d3aa869e39d89192a5e1e03d27e2442f7d414f5fa580832216680750aa21a77390af3563a5c2', '', 'Tika Kartika, S.E', 213131, '60202', NULL, NULL, '', '0000-00-00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '0000-00-00', NULL, NULL, 'Y', 'no foto.jpg'),
(44, 2, 'STAI045', 'a6e96abe1de8ba896bd27499618cb7277b7d28d343d5ca742e47b5719a8cbd9629f90e811f58a72d201db88cc6507a3e818430f4876f52ab758bda8763ac7c3b', '', 'Usep Diki Hadian, M.Pd.', 213131, '86208', '', '', '', '0000-00-00', '', 'ISLAM', '', '', '', '', NULL, '', '', '', '', '0', '', '', '0', '0', '0000-00-00', '0', '0', 'Y', 'no foto.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `dropdownsystem`
--

CREATE TABLE `dropdownsystem` (
  `ID_ds` int(11) NOT NULL,
  `id_group` int(11) NOT NULL,
  `nama` varchar(100) CHARACTER SET latin1 NOT NULL,
  `menu_order` int(11) NOT NULL,
  `url` varchar(100) CHARACTER SET latin1 NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data untuk tabel `dropdownsystem`
--

INSERT INTO `dropdownsystem` (`ID_ds`, `id_group`, `nama`, `menu_order`, `url`) VALUES
(1, 2, '01 Kalender Akademik', 1, '?page=kalenderakademik'),
(2, 2, '02 Penjadwalan Kuliah', 2, '?page=jadwalkuliah'),
(3, 2, '03 Registrasi Ulang Mahasiswa', 3, '?page=registrasiulangmhsw'),
(4, 4, '01 Absen Kuliah', 1, '?page=dosenabsenkuliah'),
(5, 4, '02 Nilai Mahasiswa', 2, '?page=dosennilaimahasiswa'),
(6, 2, '04 KRS Mahasiswa', 4, '?page=akademikkrs'),
(7, 2, '05 Input Nilai Mahasiswa', 5, '?page=akademikinputnilaimhs'),
(8, 2, '06 KHS Mahasiswa', 6, '?page=akademikkhsmhs'),
(9, 2, '07 Transkrip Nilai Mahasiswa', 7, '?page=akademiktranskripnilai'),
(10, 8, '01 Identitas Institusi', 1, '?page=masterinstitusi'),
(11, 8, '02 Program Studi', 2, '?page=masterprodi'),
(12, 8, '03 Program', 3, '?page=masterprogram'),
(13, 8, '04 Kampus', 4, '?page=masterkampus'),
(14, 8, '05 Ruangan', 5, '?page=masterruangan'),
(15, 8, '06 Matakuliah', 6, '?page=mastermatakuliah'),
(16, 8, '07 Dosen', 7, '?page=masterdosen'),
(17, 8, '08 Mahasiswa', 8, '?page=mastermahasiswa'),
(18, 10, '01 Admin Administrator', 1, '?page=adminadministrator'),
(19, 10, '02 Admin Akademik', 2, '?page=adminakademik'),
(21, 57, '01 MSMHS', 1, '?page=epsbedmsmhs'),
(22, 57, '02 TBKMK', 2, '?page=epsbedttbkmk'),
(23, 57, '03 TBBNL', 3, '?page=epsbedtbbnl'),
(24, 57, '04 TRAKD', 4, '?page=epsbedtrakd'),
(25, 57, '05 TRNLM', 5, '?page=epsbedtrnlm'),
(26, 1, '01 Kalender Akademik', 1, '?page=baakademikkalender'),
(27, 1, '02 Penjadwalan Kuliah', 2, '?page=baakademikjadwal'),
(28, 1, '03 Registrasi Ulang Mahasiswa', 3, '?page=baakademikregulang'),
(29, 1, '04 KRS Mahasiswa', 4, '?page=baakademikjadwalkrs'),
(30, 1, '05 Input Nilai Mahasiswa', 5, '?page=bakademikinputnilaimhs'),
(31, 1, '06 KHS Mahasiswa', 6, '?page=bakademikkhsmhs'),
(32, 1, '07 Transkrip Nilai Mahasiswa', 7, '?page=bakademiktranskripnilai'),
(33, 8, '01 Matakuliah', 1, '?page=baakademikmastermatakuliah'),
(34, 8, '02 Mahasiswa', 2, '?page=baakademikmastermahasiswa'),
(35, 4, '01 Data Dosen', 1, '?page=dosendata'),
(36, 4, '02 Input Nilai Mahasiswa', 2, '?page=doseninputnilaimhsw'),
(37, 7, '01 Data Mahasiswa', 1, '?page=mahasiswadata'),
(38, 7, '02 KRS Mahasiswa', 2, '?page=mahasiswakrs'),
(40, 7, '03 KHS Mahasiswa', 3, '?page=mahasiswakhs'),
(41, 7, '04 Transkrip Nilai', 4, '?page=mahasiswatranskrip'),
(45, 4, '03 Upload Materi', 3, '?page=1f56234e-4361-4706-bb5a-91d3101bbdb6'),
(44, 59, '01 Download', 1, '?page=50f9e899-0d4d-4b7b-a518-fb18bc430926'),
(46, 7, '05 Download Materi', 5, '?page=24fd7148-9843-46d6-bb33-5b1d86b5a172');

-- --------------------------------------------------------

--
-- Struktur dari tabel `epsbed`
--

CREATE TABLE `epsbed` (
  `ID` int(11) NOT NULL,
  `Nama` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `Ket` varchar(50) COLLATE latin1_general_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data untuk tabel `epsbed`
--

INSERT INTO `epsbed` (`ID`, `Nama`, `Ket`) VALUES
(15, 'TBKMK_20152.DBF', 'tbkmk'),
(16, 'TBBNL_20152.DBF', 'tbbnl');

-- --------------------------------------------------------

--
-- Struktur dari tabel `error`
--

CREATE TABLE `error` (
  `id` int(11) NOT NULL,
  `tabel` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `text` text COLLATE latin1_general_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data untuk tabel `error`
--

INSERT INTO `error` (`id`, `tabel`, `text`) VALUES
(1, 'Group Modul', '1. Pengisian form berurutan sesuai dengan parent ID modul.2. Jika Terjadi Kesalahan yang tidak anda ketahui silakan hubungi administrator anda.');

-- --------------------------------------------------------

--
-- Struktur dari tabel `fileupload`
--

CREATE TABLE `fileupload` (
  `File_ID` bigint(20) NOT NULL,
  `Nama_File` varchar(255) NOT NULL,
  `File` varchar(100) NOT NULL,
  `Level_ID` int(11) NOT NULL,
  `Uplouder` varchar(100) NOT NULL,
  `TglInput` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `fileupload`
--

INSERT INTO `fileupload` (`File_ID`, `Nama_File`, `File`, `Level_ID`, `Uplouder`, `TglInput`) VALUES
(18, 'Kalender Akademik Semt. Genap 2015_2016', 'Kalender Akademi k Semester Genap 20152016.pdf', 1, '', '2016-02-05 23:32:11'),
(17, 'Materi Pengantar Komputer', '', 2, '066', '2016-02-04 10:58:13');

-- --------------------------------------------------------

--
-- Struktur dari tabel `groupmodul`
--

CREATE TABLE `groupmodul` (
  `id_group` int(10) NOT NULL,
  `relasi_modul` int(10) NOT NULL,
  `nama` varchar(100) COLLATE latin1_general_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data untuk tabel `groupmodul`
--

INSERT INTO `groupmodul` (`id_group`, `relasi_modul`, `nama`) VALUES
(1, 1, 'Ba Akademik'),
(2, 2, 'Akademik'),
(4, 4, 'Dosen'),
(7, 7, 'Mahasiswa'),
(8, 8, 'Master'),
(10, 10, 'Admin'),
(57, 12, 'EPSBED'),
(59, 11, 'Download');

-- --------------------------------------------------------

--
-- Struktur dari tabel `hakmodul`
--

CREATE TABLE `hakmodul` (
  `ID_hm` int(11) NOT NULL,
  `id_level` int(11) NOT NULL,
  `ID_ds` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data untuk tabel `hakmodul`
--

INSERT INTO `hakmodul` (`ID_hm`, `id_level`, `ID_ds`) VALUES
(1, 1, 1),
(2, 1, 2),
(15, 1, 16),
(4, 1, 3),
(5, 1, 6),
(6, 1, 7),
(7, 1, 8),
(8, 1, 9),
(9, 1, 10),
(10, 1, 11),
(11, 1, 12),
(12, 1, 13),
(13, 1, 14),
(14, 1, 15),
(16, 1, 17),
(17, 1, 18),
(18, 1, 19),
(19, 1, 20),
(20, 1, 21),
(21, 1, 22),
(22, 1, 23),
(23, 1, 24),
(24, 1, 25),
(25, 3, 26),
(26, 3, 27),
(27, 3, 28),
(28, 3, 29),
(29, 3, 30),
(30, 3, 31),
(31, 3, 32),
(32, 3, 33),
(33, 3, 34),
(34, 2, 35),
(35, 2, 36),
(36, 4, 37),
(37, 4, 38),
(38, 4, 39),
(39, 4, 40),
(40, 4, 41),
(42, 1, 44),
(43, 2, 45),
(44, 4, 46);

-- --------------------------------------------------------

--
-- Struktur dari tabel `hari`
--

CREATE TABLE `hari` (
  `id` int(11) NOT NULL,
  `hari` varchar(10) COLLATE latin1_general_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data untuk tabel `hari`
--

INSERT INTO `hari` (`id`, `hari`) VALUES
(1, 'Senin'),
(2, 'Selasa'),
(3, 'Rabu'),
(4, 'Kamis'),
(5, 'Jumat'),
(6, 'Sabtu'),
(7, 'Minggu');

-- --------------------------------------------------------

--
-- Struktur dari tabel `hidup`
--

CREATE TABLE `hidup` (
  `Hidup` char(3) COLLATE latin1_general_ci NOT NULL DEFAULT '',
  `Nama` varchar(50) COLLATE latin1_general_ci DEFAULT NULL,
  `NA` enum('Y','N') COLLATE latin1_general_ci NOT NULL DEFAULT 'N'
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data untuk tabel `hidup`
--

INSERT INTO `hidup` (`Hidup`, `Nama`, `NA`) VALUES
('1', 'Masih Hidup', 'N'),
('2', 'Sudah Meninggal', 'N');

-- --------------------------------------------------------

--
-- Struktur dari tabel `identitas`
--

CREATE TABLE `identitas` (
  `ID` int(11) NOT NULL,
  `Identitas_ID` int(5) NOT NULL,
  `KodeHukum` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `Nama_Identitas` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `TglMulai` date NOT NULL DEFAULT '0000-00-00',
  `Alamat1` varchar(100) COLLATE latin1_general_ci DEFAULT NULL,
  `Kota` varchar(50) COLLATE latin1_general_ci DEFAULT NULL,
  `KodePos` varchar(20) COLLATE latin1_general_ci DEFAULT NULL,
  `Telepon` varchar(20) COLLATE latin1_general_ci DEFAULT NULL,
  `Fax` varchar(20) COLLATE latin1_general_ci DEFAULT NULL,
  `Email` varchar(50) COLLATE latin1_general_ci DEFAULT NULL,
  `Website` varchar(50) COLLATE latin1_general_ci DEFAULT NULL,
  `NoAkta` varchar(50) COLLATE latin1_general_ci DEFAULT NULL,
  `TglAkta` date DEFAULT NULL,
  `NoSah` varchar(50) COLLATE latin1_general_ci DEFAULT NULL,
  `TglSah` date DEFAULT NULL,
  `Aktif` enum('Y','N') COLLATE latin1_general_ci DEFAULT 'Y'
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data untuk tabel `identitas`
--

INSERT INTO `identitas` (`ID`, `Identitas_ID`, `KodeHukum`, `Nama_Identitas`, `TglMulai`, `Alamat1`, `Kota`, `KodePos`, `Telepon`, `Fax`, `Email`, `Website`, `NoAkta`, `TglAkta`, `NoSah`, `TglSah`, `Aktif`) VALUES
(25, 213131, '-', 'Sekolah Tinggi Agama Islam (STAI) Sebelas April Sumedang', '0000-00-00', 'Jl.Angrek Situ No.19 Sumedang Utara - Jawa Barat', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Y');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jabatan`
--

CREATE TABLE `jabatan` (
  `Jabatan_ID` varchar(10) COLLATE latin1_general_ci NOT NULL DEFAULT '',
  `Nama` varchar(50) COLLATE latin1_general_ci NOT NULL DEFAULT '',
  `Def` enum('Y','N') COLLATE latin1_general_ci NOT NULL DEFAULT 'N',
  `NA` enum('Y','N') COLLATE latin1_general_ci NOT NULL DEFAULT 'N'
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data untuk tabel `jabatan`
--

INSERT INTO `jabatan` (`Jabatan_ID`, `Nama`, `Def`, `NA`) VALUES
('A', 'Tenaga Pengajar', 'N', 'N'),
('B', 'Asisten Ahli', 'N', 'N'),
('C', 'Lektor', 'N', 'N'),
('D', 'Lektor Kepala', 'N', 'N'),
('E', 'Guru Besar', 'N', 'N');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jabatandikti`
--

CREATE TABLE `jabatandikti` (
  `JabatanDikti_ID` varchar(5) COLLATE latin1_general_ci NOT NULL DEFAULT '',
  `Nama` varchar(50) COLLATE latin1_general_ci NOT NULL DEFAULT '',
  `Def` enum('Y','N') COLLATE latin1_general_ci NOT NULL DEFAULT 'N',
  `NA` enum('Y','N') COLLATE latin1_general_ci NOT NULL DEFAULT 'N'
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data untuk tabel `jabatandikti`
--

INSERT INTO `jabatandikti` (`JabatanDikti_ID`, `Nama`, `Def`, `NA`) VALUES
('01', 'AAM', 'N', 'N'),
('02', 'AA', 'N', 'N'),
('03', 'LMu', 'N', 'N'),
('04', 'LMa', 'N', 'N'),
('05', 'L', 'N', 'N'),
('06', 'LKM', 'N', 'N'),
('07', 'LK', 'N', 'N'),
('08', 'GBM', 'N', 'N'),
('09', 'GB', 'N', 'N');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jadwal`
--

CREATE TABLE `jadwal` (
  `Jadwal_ID` bigint(20) NOT NULL,
  `Tahun_ID` int(5) NOT NULL,
  `Identitas_ID` int(5) NOT NULL,
  `Jurusan_ID` int(5) NOT NULL,
  `Program_ID` int(5) NOT NULL,
  `Kode_Mtk` varchar(15) COLLATE latin1_general_ci NOT NULL,
  `Ruang_ID` varchar(10) COLLATE latin1_general_ci NOT NULL,
  `Kelas` varchar(20) COLLATE latin1_general_ci NOT NULL,
  `Dosen_ID` int(11) NOT NULL,
  `Hari` varchar(10) COLLATE latin1_general_ci NOT NULL,
  `Jam_Mulai` time NOT NULL DEFAULT '00:00:00',
  `Jam_Selesai` time NOT NULL DEFAULT '00:00:00',
  `UTSTgl` date NOT NULL,
  `UTSHari` varchar(10) COLLATE latin1_general_ci NOT NULL,
  `UTSMulai` time NOT NULL,
  `UTSSelesai` time NOT NULL,
  `UTSRuang` varchar(10) COLLATE latin1_general_ci NOT NULL,
  `UASTgl` date NOT NULL,
  `UASHari` varchar(10) COLLATE latin1_general_ci NOT NULL,
  `UASMulai` time NOT NULL,
  `UASSelesai` time NOT NULL,
  `UASRuang` varchar(10) COLLATE latin1_general_ci NOT NULL,
  `JumlahMhsw` int(11) NOT NULL,
  `Kapasitas` int(11) NOT NULL,
  `Aktif` enum('Y','N') COLLATE latin1_general_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data untuk tabel `jadwal`
--

INSERT INTO `jadwal` (`Jadwal_ID`, `Tahun_ID`, `Identitas_ID`, `Jurusan_ID`, `Program_ID`, `Kode_Mtk`, `Ruang_ID`, `Kelas`, `Dosen_ID`, `Hari`, `Jam_Mulai`, `Jam_Selesai`, `UTSTgl`, `UTSHari`, `UTSMulai`, `UTSSelesai`, `UTSRuang`, `UASTgl`, `UASHari`, `UASMulai`, `UASSelesai`, `UASRuang`, `JumlahMhsw`, `Kapasitas`, `Aktif`) VALUES
(4, 20151, 213131, 86208, 3, 'IA123', '4', '', 5, 'Senin', '12:10:00', '13:50:00', '0000-00-00', '', '00:00:00', '00:00:00', '', '0000-00-00', '', '00:00:00', '00:00:00', '', 0, 0, 'Y'),
(3, 20151, 213131, 86208, 3, 'IA134', '4', '', 7, 'Selasa', '15:30:00', '18:00:00', '0000-00-00', '', '00:00:00', '00:00:00', '', '0000-00-00', '', '00:00:00', '00:00:00', '', 0, 0, 'Y'),
(6, 20151, 213131, 86208, 3, 'IB125', '4', '', 13, 'Senin', '15:50:00', '17:30:00', '0000-00-00', '', '00:00:00', '00:00:00', '', '0000-00-00', '', '00:00:00', '00:00:00', '', 0, 0, 'Y'),
(7, 20151, 213131, 86208, 3, 'IA125', '4', '', 11, 'Selasa', '12:30:00', '15:00:00', '0000-00-00', '', '00:00:00', '00:00:00', '', '0000-00-00', '', '00:00:00', '00:00:00', '', 0, 0, 'Y'),
(8, 20152, 213131, 86208, 3, 'IA225', '4', 'P', 11, 'Kamis', '13:50:00', '16:20:00', '0000-00-00', '', '00:00:00', '00:00:00', '', '0000-00-00', '', '00:00:00', '00:00:00', '', 0, 0, 'Y'),
(9, 20152, 213131, 86208, 3, 'IC221', '4', 'P', 6, 'Senin', '13:50:00', '15:30:00', '0000-00-00', '', '00:00:00', '00:00:00', '', '0000-00-00', '', '00:00:00', '00:00:00', '', 0, 0, 'Y'),
(10, 20151, 213131, 86208, 3, 'IA122', '4', '', 24, 'Rabu', '12:10:00', '13:50:00', '0000-00-00', '', '00:00:00', '00:00:00', '', '0000-00-00', '', '00:00:00', '00:00:00', '', 0, 0, 'Y'),
(11, 20151, 213131, 86208, 3, 'IB124', '4', '', 23, 'Rabu', '13:50:00', '15:30:00', '0000-00-00', '', '00:00:00', '00:00:00', '', '0000-00-00', '', '00:00:00', '00:00:00', '', 0, 0, 'Y'),
(12, 20151, 213131, 86208, 3, 'IA121', '4', '', 9, 'Rabu', '15:50:00', '17:30:00', '0000-00-00', '', '00:00:00', '00:00:00', '', '0000-00-00', '', '00:00:00', '00:00:00', '', 0, 0, 'Y'),
(13, 20151, 213131, 86208, 3, 'IE104', '4', '', 19, 'Senin', '10:00:00', '11:40:00', '0000-00-00', '', '00:00:00', '00:00:00', '', '0000-00-00', '', '00:00:00', '00:00:00', '', 0, 0, 'Y'),
(14, 20151, 213131, 86208, 3, 'IB121', '4', '', 4, 'Kamis', '12:10:00', '13:50:00', '0000-00-00', '', '00:00:00', '00:00:00', '', '0000-00-00', '', '00:00:00', '00:00:00', '', 0, 0, 'Y'),
(15, 20151, 213131, 86208, 3, 'IB123', '4', '', 21, 'Senin', '13:50:00', '15:30:00', '0000-00-00', '', '00:00:00', '00:00:00', '', '0000-00-00', '', '00:00:00', '00:00:00', '', 0, 0, 'Y'),
(16, 20151, 213131, 86208, 3, 'IB3212', '14', '', 22, 'Senin', '12:10:00', '13:50:00', '0000-00-00', '', '00:00:00', '00:00:00', '', '0000-00-00', '', '00:00:00', '00:00:00', '', 0, 0, 'Y'),
(17, 20151, 213131, 86208, 3, 'IB3210', '14', '', 12, 'Senin', '13:50:00', '15:30:00', '0000-00-00', '', '00:00:00', '00:00:00', '', '0000-00-00', '', '00:00:00', '00:00:00', '', 0, 0, 'Y'),
(18, 20151, 213131, 86208, 3, 'IA325', '14', '', 7, 'Senin', '15:50:00', '17:30:00', '0000-00-00', '', '00:00:00', '00:00:00', '', '0000-00-00', '', '00:00:00', '00:00:00', '', 0, 0, 'Y'),
(19, 20151, 213131, 86208, 3, 'IA324', '14', '', 18, 'Selasa', '12:10:00', '13:50:00', '0000-00-00', '', '00:00:00', '00:00:00', '', '0000-00-00', '', '00:00:00', '00:00:00', '', 0, 0, 'Y'),
(20, 20151, 213131, 86208, 3, 'ID321', '14', '', 10, 'Selasa', '13:50:00', '15:30:00', '0000-00-00', '', '00:00:00', '00:00:00', '', '0000-00-00', '', '00:00:00', '00:00:00', '', 0, 0, 'Y'),
(21, 20151, 213131, 86208, 3, 'IC321', '14', '', 6, 'Selasa', '15:50:00', '17:30:00', '0000-00-00', '', '00:00:00', '00:00:00', '', '0000-00-00', '', '00:00:00', '00:00:00', '', 0, 0, 'Y'),
(22, 20151, 213131, 86208, 3, 'IC324', '14', '', 27, 'Rabu', '12:10:00', '13:50:00', '0000-00-00', '', '00:00:00', '00:00:00', '', '0000-00-00', '', '00:00:00', '00:00:00', '', 0, 0, 'Y'),
(23, 20151, 213131, 86208, 3, 'IC322', '14', '', 15, 'Rabu', '13:50:00', '15:30:00', '0000-00-00', '', '00:00:00', '00:00:00', '', '0000-00-00', '', '00:00:00', '00:00:00', '', 0, 0, 'Y'),
(27, 20151, 213131, 86208, 3, 'IB122', '4', '', 14, 'Kamis', '15:50:00', '17:30:00', '0000-00-00', '', '00:00:00', '00:00:00', '', '0000-00-00', '', '00:00:00', '00:00:00', '', 0, 0, 'Y'),
(26, 20151, 213131, 86208, 3, 'IB126', '4', '', 2, 'Kamis', '13:50:00', '15:30:00', '0000-00-00', '', '00:00:00', '00:00:00', '', '0000-00-00', '', '00:00:00', '00:00:00', '', 0, 0, 'Y'),
(29, 20151, 213131, 86208, 3, 'IB329', '14', '', 14, 'Rabu', '15:50:00', '17:30:00', '0000-00-00', '', '00:00:00', '00:00:00', '', '0000-00-00', '', '00:00:00', '00:00:00', '', 0, 0, 'Y'),
(30, 20151, 213131, 86208, 3, 'IC333', '14', '', 8, 'Kamis', '13:00:00', '15:30:00', '0000-00-00', '', '00:00:00', '00:00:00', '', '0000-00-00', '', '00:00:00', '00:00:00', '', 0, 0, 'Y'),
(31, 20151, 213131, 86208, 3, 'IB328', '14', '', 26, 'Kamis', '16:00:00', '17:30:00', '0000-00-00', '', '00:00:00', '00:00:00', '', '0000-00-00', '', '00:00:00', '00:00:00', '', 0, 0, 'Y'),
(32, 20152, 213131, 86208, 3, 'IA226', '4', 'P', 24, 'Senin', '16:00:00', '17:40:00', '0000-00-00', '', '00:00:00', '00:00:00', '', '0000-00-00', '', '00:00:00', '00:00:00', '', 0, 0, 'Y'),
(33, 20152, 213131, 86208, 3, 'IA224', '4', 'P', 7, 'Selasa', '12:10:00', '13:50:00', '0000-00-00', '', '00:00:00', '00:00:00', '', '0000-00-00', '', '00:00:00', '00:00:00', '', 0, 0, 'Y'),
(34, 20152, 213131, 86208, 3, 'IB2210', '4', 'P', 26, 'Selasa', '13:50:00', '15:30:00', '0000-00-00', '', '00:00:00', '00:00:00', '', '0000-00-00', '', '00:00:00', '00:00:00', '', 0, 0, 'Y'),
(35, 20152, 213131, 86208, 3, 'IB228', '4', 'P', 4, 'Selasa', '16:00:00', '17:40:00', '0000-00-00', '', '00:00:00', '00:00:00', '', '0000-00-00', '', '00:00:00', '00:00:00', '', 0, 0, 'Y'),
(36, 20152, 213131, 86208, 3, 'IB227', '4', 'P', 2, 'Rabu', '12:10:00', '13:50:00', '0000-00-00', '', '00:00:00', '00:00:00', '', '0000-00-00', '', '00:00:00', '00:00:00', '', 0, 0, 'Y'),
(37, 20152, 213131, 86208, 3, 'IC222', '4', 'P', 15, 'Rabu', '13:50:00', '15:30:00', '0000-00-00', '', '00:00:00', '00:00:00', '', '0000-00-00', '', '00:00:00', '00:00:00', '', 0, 0, 'Y'),
(38, 20152, 213131, 86208, 3, 'IB22.9', '4', 'P', 14, 'Rabu', '16:00:00', '17:40:00', '0000-00-00', '', '00:00:00', '00:00:00', '', '0000-00-00', '', '00:00:00', '00:00:00', '', 0, 0, 'Y'),
(39, 20152, 213131, 86208, 3, 'IB22.11', '4', 'P', 23, 'Kamis', '12:10:00', '13:50:00', '0000-00-00', '', '00:00:00', '00:00:00', '', '0000-00-00', '', '00:00:00', '00:00:00', '', 0, 0, 'Y'),
(40, 20152, 213131, 86208, 3, 'IB2211', '4', 'P', 23, 'Kamis', '12:10:00', '13:50:00', '0000-00-00', '', '00:00:00', '00:00:00', '', '0000-00-00', '', '00:00:00', '00:00:00', '', 0, 0, 'Y'),
(41, 20152, 213131, 86208, 3, 'IE421', '4', '', 1, 'Senin', '09:00:00', '11:30:00', '0000-00-00', '', '00:00:00', '00:00:00', '', '0000-00-00', '', '00:00:00', '00:00:00', '', 0, 0, 'Y'),
(42, 20152, 213131, 86208, 3, 'IC436', '15', 'P', 5, 'Senin', '11:00:00', '13:30:00', '0000-00-00', '', '00:00:00', '00:00:00', '', '0000-00-00', '', '00:00:00', '00:00:00', '', 0, 0, 'Y'),
(43, 20152, 213131, 86208, 3, 'IE105', '15', 'P', 21, 'Senin', '13:50:00', '15:30:00', '0000-00-00', '', '00:00:00', '00:00:00', '', '0000-00-00', '', '00:00:00', '00:00:00', '', 0, 0, 'Y'),
(44, 20152, 213131, 86208, 3, 'IA424', '15', 'P', 18, 'Senin', '15:30:00', '17:30:00', '0000-00-00', '', '00:00:00', '00:00:00', '', '0000-00-00', '', '00:00:00', '00:00:00', '', 0, 0, 'Y'),
(45, 20152, 213131, 86208, 3, 'IC435', '15', 'P', 44, 'Selasa', '11:00:00', '13:30:00', '0000-00-00', '', '00:00:00', '00:00:00', '', '0000-00-00', '', '00:00:00', '00:00:00', '', 0, 0, 'Y'),
(46, 20152, 213131, 86208, 3, 'IB4210', '15', 'P', 17, 'Selasa', '13:50:00', '15:30:00', '0000-00-00', '', '00:00:00', '00:00:00', '', '0000-00-00', '', '00:00:00', '00:00:00', '', 0, 0, 'Y'),
(47, 20152, 213131, 86208, 3, 'IE422', '15', 'P', 20, 'Kamis', '16:30:00', '18:10:00', '0000-00-00', '', '00:00:00', '00:00:00', '', '0000-00-00', '', '00:00:00', '00:00:00', '', 0, 0, 'Y'),
(48, 20152, 213131, 86208, 3, 'IB4213', '15', 'P', 19, 'Rabu', '13:00:00', '15:30:00', '0000-00-00', '', '00:00:00', '00:00:00', '', '0000-00-00', '', '00:00:00', '00:00:00', '', 0, 0, 'Y'),
(49, 20152, 213131, 86208, 3, 'IB4314', '15', 'P', 16, 'Rabu', '15:40:00', '18:10:00', '0000-00-00', '', '00:00:00', '00:00:00', '', '0000-00-00', '', '00:00:00', '00:00:00', '', 0, 0, 'Y'),
(50, 20152, 213131, 86208, 3, 'IB428', '15', 'P', 26, 'Selasa', '15:50:00', '17:30:00', '0000-00-00', '', '00:00:00', '00:00:00', '', '0000-00-00', '', '00:00:00', '00:00:00', '', 0, 0, 'Y'),
(51, 20152, 213131, 86208, 3, 'IB429', '15', 'P', 12, 'Kamis', '13:00:00', '14:30:00', '0000-00-00', '', '00:00:00', '00:00:00', '', '0000-00-00', '', '00:00:00', '00:00:00', '', 0, 0, 'Y'),
(52, 20152, 213131, 86208, 3, 'IA425', '15', 'P', 7, 'Kamis', '14:40:00', '16:20:00', '0000-00-00', '', '00:00:00', '00:00:00', '', '0000-00-00', '', '00:00:00', '00:00:00', '', 0, 0, 'Y'),
(53, 20152, 213131, 86208, 3, 'IC6313', '17', 'P', 22, 'Senin', '12:10:00', '14:40:00', '0000-00-00', '', '00:00:00', '00:00:00', '', '0000-00-00', '', '00:00:00', '00:00:00', '', 0, 0, 'Y'),
(54, 20152, 213131, 86208, 3, 'IC6311', '17', 'P', 10, 'Senin', '15:50:00', '17:40:00', '0000-00-00', '', '00:00:00', '00:00:00', '', '0000-00-00', '', '00:00:00', '00:00:00', '', 0, 0, 'Y'),
(55, 20152, 213131, 86208, 3, 'IB6319', '17', 'P', 27, 'Selasa', '11:00:00', '17:40:00', '0000-00-00', '', '00:00:00', '00:00:00', '', '0000-00-00', '', '00:00:00', '00:00:00', '', 0, 0, 'Y'),
(56, 20152, 213131, 86208, 3, 'IC6215', '17', 'P', 6, 'Selasa', '13:50:00', '15:30:00', '0000-00-00', '', '00:00:00', '00:00:00', '', '0000-00-00', '', '00:00:00', '00:00:00', '', 0, 0, 'Y'),
(57, 20152, 213131, 86208, 3, 'IC6214', '17', '', 28, 'Selasa', '15:50:00', '17:30:00', '0000-00-00', '', '00:00:00', '00:00:00', '', '0000-00-00', '', '00:00:00', '00:00:00', '', 0, 0, 'Y'),
(58, 20152, 213131, 86208, 3, 'IC6312', '17', 'P', 8, 'Rabu', '13:00:00', '14:40:00', '0000-00-00', '', '00:00:00', '00:00:00', '', '0000-00-00', '', '00:00:00', '00:00:00', '', 0, 0, 'Y'),
(59, 20152, 213131, 86208, 3, 'IB6321', '17', 'P', 24, 'Rabu', '14:40:00', '16:10:00', '0000-00-00', '', '00:00:00', '00:00:00', '', '0000-00-00', '', '00:00:00', '00:00:00', '', 0, 0, 'Y'),
(60, 20152, 213131, 86208, 3, 'IB6220', '17', 'P', 3, 'Kamis', '13:00:00', '14:40:00', '0000-00-00', '', '00:00:00', '00:00:00', '', '0000-00-00', '', '00:00:00', '00:00:00', '', 0, 0, 'Y'),
(61, 20152, 213131, 86208, 3, 'IE623', '17', 'P', 25, 'Kamis', '14:40:00', '16:10:00', '0000-00-00', '', '00:00:00', '00:00:00', '', '0000-00-00', '', '00:00:00', '00:00:00', '', 0, 0, 'Y');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jeniskurikulum`
--

CREATE TABLE `jeniskurikulum` (
  `JenisKurikulum_ID` int(11) NOT NULL,
  `Kode` varchar(10) COLLATE latin1_general_ci NOT NULL,
  `Singkatan` varchar(10) COLLATE latin1_general_ci DEFAULT NULL,
  `Nama` varchar(50) COLLATE latin1_general_ci NOT NULL DEFAULT '',
  `Jurusan_ID` varchar(20) COLLATE latin1_general_ci NOT NULL DEFAULT '',
  `Aktif` enum('Y','N') COLLATE latin1_general_ci NOT NULL DEFAULT 'Y'
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data untuk tabel `jeniskurikulum`
--

INSERT INTO `jeniskurikulum` (`JenisKurikulum_ID`, `Kode`, `Singkatan`, `Nama`, `Jurusan_ID`, `Aktif`) VALUES
(1, 'A', NULL, 'Inti', '', 'N'),
(2, 'B', NULL, 'Institusi', '', 'N');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jenismk`
--

CREATE TABLE `jenismk` (
  `ID` int(11) NOT NULL,
  `JenisMTK_ID` varchar(2) COLLATE latin1_general_ci NOT NULL,
  `Nama` varchar(50) COLLATE latin1_general_ci NOT NULL DEFAULT '',
  `Aktif` enum('Y','N') COLLATE latin1_general_ci NOT NULL DEFAULT 'Y'
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data untuk tabel `jenismk`
--

INSERT INTO `jenismk` (`ID`, `JenisMTK_ID`, `Nama`, `Aktif`) VALUES
(1, 'A', 'WAJIB', 'Y'),
(2, 'B', 'PILIHAN', 'Y'),
(3, 'C', 'WAJIB PERMINTAAN', 'Y'),
(4, 'D', 'PILIHAN PERMINTAAN', 'Y'),
(5, 'S', 'TA/SKRIPSI/THESIS/DISERTASI', 'Y');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jenissekolah`
--

CREATE TABLE `jenissekolah` (
  `JenisSekolah_ID` int(11) NOT NULL,
  `Nama` varchar(50) COLLATE latin1_general_ci DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data untuk tabel `jenissekolah`
--

INSERT INTO `jenissekolah` (`JenisSekolah_ID`, `Nama`) VALUES
(4, 'Yayasan Penabur'),
(5, 'Kristen/Katolik Non Penabur'),
(3, 'Umum'),
(2, 'Negeri'),
(6, 'Luar Negeri'),
(1, 'Madrasah');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jenis_ujian`
--

CREATE TABLE `jenis_ujian` (
  `ID` int(1) NOT NULL,
  `jenisjadwal` varchar(10) COLLATE latin1_general_ci NOT NULL,
  `nama` varchar(100) COLLATE latin1_general_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data untuk tabel `jenis_ujian`
--

INSERT INTO `jenis_ujian` (`ID`, `jenisjadwal`, `nama`) VALUES
(1, 'UTS', 'Ujian Tengah Semester'),
(2, 'UAS', 'Ujian Akhir Semester');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jenjang`
--

CREATE TABLE `jenjang` (
  `Jenjang_ID` varchar(5) COLLATE latin1_general_ci NOT NULL,
  `Nama` varchar(50) COLLATE latin1_general_ci NOT NULL DEFAULT '',
  `Keterangan` varchar(100) COLLATE latin1_general_ci DEFAULT NULL,
  `Def` enum('Y','N') COLLATE latin1_general_ci NOT NULL DEFAULT 'N',
  `NA` enum('Y','N') COLLATE latin1_general_ci NOT NULL DEFAULT 'N'
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data untuk tabel `jenjang`
--

INSERT INTO `jenjang` (`Jenjang_ID`, `Nama`, `Keterangan`, `Def`, `NA`) VALUES
('A', 'S3', 'Strata Tiga', 'N', 'N'),
('B', 'S2', 'Strata Dua', 'N', 'N'),
('C', 'S1', 'Strata Satu', 'N', 'N'),
('D', 'D4', 'Diploma 4', 'N', 'N'),
('E', 'D3', 'Diploma 3', 'N', 'N'),
('F', 'D2', 'Diploma 2', 'N', 'N'),
('G', 'D1', 'Diploma 1', 'N', 'N'),
('H', 'SP-1', 'Spesialis Satu', 'N', 'N'),
('I', 'SP-2', 'Spesialis Dua', 'N', 'N'),
('J', 'Profesi', 'Profesi', 'N', 'N');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jurusan`
--

CREATE TABLE `jurusan` (
  `ID` int(11) NOT NULL,
  `Identitas_ID` int(5) NOT NULL,
  `Jurusan_ID` int(5) NOT NULL,
  `nama_jurusan` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `jenjang` varchar(5) COLLATE latin1_general_ci NOT NULL,
  `Akreditasi` varchar(100) COLLATE latin1_general_ci DEFAULT NULL,
  `NamaKetua` varchar(100) COLLATE latin1_general_ci DEFAULT NULL,
  `NoSKDikti` varchar(100) COLLATE latin1_general_ci DEFAULT NULL,
  `TglSKDikti` date DEFAULT NULL,
  `NoSKBAN` varchar(100) COLLATE latin1_general_ci DEFAULT NULL,
  `TglSKBAN` date DEFAULT NULL,
  `Aktif` enum('Y','N') COLLATE latin1_general_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data untuk tabel `jurusan`
--

INSERT INTO `jurusan` (`ID`, `Identitas_ID`, `Jurusan_ID`, `nama_jurusan`, `jenjang`, `Akreditasi`, `NamaKetua`, `NoSKDikti`, `TglSKDikti`, `NoSKBAN`, `TglSKBAN`, `Aktif`) VALUES
(3, 213131, 60202, 'Ekonomi Syariah', 'S1', 'A', 'H. Agus Hermawan, M.Ag', '', '0000-00-00', '', '0000-00-00', 'Y'),
(4, 213131, 86208, 'Pendidikan Agama Islam', 'S1', 'A', 'Drs. Lili Sadeli, M.Pd.I', '', '0000-00-00', '', '0000-00-00', 'Y'),
(8, 213131, 1234567, 'PGMI', 'S1', '', '', NULL, NULL, NULL, NULL, 'Y');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jurusansekolah`
--

CREATE TABLE `jurusansekolah` (
  `JurusanSekolah_ID` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `Nama` varchar(50) COLLATE latin1_general_ci DEFAULT NULL,
  `NamaJurusan` varchar(100) COLLATE latin1_general_ci DEFAULT NULL,
  `NA` enum('Y','N') COLLATE latin1_general_ci DEFAULT 'N'
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data untuk tabel `jurusansekolah`
--

INSERT INTO `jurusansekolah` (`JurusanSekolah_ID`, `Nama`, `NamaJurusan`, `NA`) VALUES
('011', 'SMU', 'IPA', 'N'),
('012', 'SMU', 'IPS', 'N'),
('013', 'SMU', 'A4/BAHASA', 'N'),
('021', 'STM PEMBANGUNAN', 'BANGUNAN GEDUNG', 'N'),
('022', 'STM PEMBANGUNAN', 'BANGUNAN AIR', 'N'),
('023', 'STM PEMBANGUNAN', 'MESIN PRODUKSI', 'N'),
('025', 'STM PEMBANGUNAN', 'LISTRIK INDUSTRI', 'N'),
('024', 'STM PEMBANGUNAN', 'OTOMOTIF', 'N'),
('027', 'STM PEMBANGUNAN', 'ELEKTRO KOMUNIKASI', 'N'),
('031', 'SMEA', 'TATA BUKU', 'N'),
('032', 'SMEA', 'TATA NIAGA', 'N'),
('033', 'SMEA', 'TATA USAHA', 'N'),
('101', 'STM', 'ELEKTRONIKA', 'N'),
('102', 'STM', 'LISTRIK', 'N'),
('103', 'STM', 'MESIN PRODUKSI', 'N'),
('104', 'STM', 'BANGUNAN', 'N'),
('105', 'STM', 'OTOMOTIF', 'N'),
('121', 'SMTP', 'BANGUNAN KAPAL', 'N'),
('122', 'SMTP', 'MESIN KAPAL', 'N'),
('131', 'SMTP', 'AVIONIKA', 'N'),
('132', 'SMTP', 'LISTRIK & INSTRUMEN', 'N'),
('133', 'SMTP', 'MOTOR & RANGKA', 'N'),
('350', 'SMEA PEMBANGUNAN', 'EKONOMI', 'N'),
('014', 'SMU', 'A1', 'N'),
('015', 'SMU', 'A2', 'N'),
('016', 'SMU', 'A3', 'N'),
('161', 'SPG', 'SD', 'N'),
('162', 'SPG', 'TK', 'N'),
('999', 'SMA LUAR NEGERI', '', 'N'),
('041', 'SMF', 'FARMASI', 'N'),
('042', 'SA KES', 'ANALISI KESEHATAN', 'N'),
('034', 'SMEA', 'SEKRETARIS', 'N');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kampus`
--

CREATE TABLE `kampus` (
  `ID` int(11) NOT NULL,
  `Identitas_ID` varchar(10) COLLATE latin1_general_ci DEFAULT NULL,
  `Kampus_ID` varchar(20) COLLATE latin1_general_ci NOT NULL,
  `Nama` varchar(50) COLLATE latin1_general_ci DEFAULT NULL,
  `Alamat` varchar(255) COLLATE latin1_general_ci DEFAULT NULL,
  `Kota` varchar(50) COLLATE latin1_general_ci DEFAULT NULL,
  `Telepon` varchar(50) COLLATE latin1_general_ci DEFAULT NULL,
  `Fax` varchar(50) COLLATE latin1_general_ci DEFAULT NULL,
  `Aktif` enum('Y','N') COLLATE latin1_general_ci DEFAULT 'N'
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data untuk tabel `kampus`
--

INSERT INTO `kampus` (`ID`, `Identitas_ID`, `Kampus_ID`, `Nama`, `Alamat`, `Kota`, `Telepon`, `Fax`, `Aktif`) VALUES
(1, '213131', 'K1', 'KAMPUS 1', '', '', '', '', 'Y');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kelompokmtk`
--

CREATE TABLE `kelompokmtk` (
  `ID` int(1) NOT NULL,
  `KelompokMtk_ID` varchar(4) COLLATE latin1_general_ci NOT NULL,
  `Nama` varchar(30) COLLATE latin1_general_ci NOT NULL,
  `Aktif` enum('Y','N') COLLATE latin1_general_ci NOT NULL DEFAULT 'Y'
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data untuk tabel `kelompokmtk`
--

INSERT INTO `kelompokmtk` (`ID`, `KelompokMtk_ID`, `Nama`, `Aktif`) VALUES
(1, 'A', 'MPK-Pengembangan Kepribadian', 'Y'),
(2, 'B', 'MKK-KEILMUAN DAN KETERAMPILAN', 'Y'),
(3, 'C', 'MKB-KEAHLIAN BERKARYA', 'Y'),
(4, 'D', 'MPB-PERILAKU BERKARYA', 'Y'),
(5, 'E', 'MBB-BERKEHIDUPAN BERMASYARAKAT', 'Y'),
(6, 'F', 'MKU/MKDU', 'Y'),
(7, 'G', 'MKDK', 'Y'),
(8, 'H', 'MKK', 'Y');

-- --------------------------------------------------------

--
-- Struktur dari tabel `krs`
--

CREATE TABLE `krs` (
  `KRS_ID` bigint(20) NOT NULL,
  `NIM` varchar(20) COLLATE latin1_general_ci NOT NULL,
  `Tahun_ID` int(5) NOT NULL,
  `Jadwal_ID` bigint(20) NOT NULL DEFAULT '0',
  `Kode_mtk` varchar(15) COLLATE latin1_general_ci NOT NULL,
  `SKS` int(1) NOT NULL DEFAULT '0',
  `Tugas1` int(11) NOT NULL DEFAULT '0',
  `Tugas2` int(11) NOT NULL DEFAULT '0',
  `Presensi` int(11) NOT NULL DEFAULT '0',
  `UTS` int(11) NOT NULL DEFAULT '0',
  `UAS` int(11) NOT NULL DEFAULT '0',
  `GradeNilai` varchar(10) COLLATE latin1_general_ci NOT NULL DEFAULT '-',
  `BobotNilai` decimal(4,2) NOT NULL DEFAULT '0.00'
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `kurikulum`
--

CREATE TABLE `kurikulum` (
  `Kurikulum_ID` int(11) NOT NULL,
  `Identitas_ID` int(5) NOT NULL,
  `Jurusan_ID` int(5) NOT NULL,
  `Kode` varchar(8) COLLATE latin1_general_ci NOT NULL,
  `Nama` varchar(50) COLLATE latin1_general_ci DEFAULT NULL,
  `Sesi` varchar(50) COLLATE latin1_general_ci DEFAULT NULL,
  `JmlSesi` int(11) NOT NULL DEFAULT '2',
  `Aktif` enum('Y','N') COLLATE latin1_general_ci NOT NULL DEFAULT 'Y'
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data untuk tabel `kurikulum`
--

INSERT INTO `kurikulum` (`Kurikulum_ID`, `Identitas_ID`, `Jurusan_ID`, `Kode`, `Nama`, `Sesi`, `JmlSesi`, `Aktif`) VALUES
(33, 213131, 86208, '20151', 'Kurikulum 20151 Gasal', NULL, 2, 'Y'),
(34, 213131, 86208, '20152', 'kurikulum 20152 Genap', NULL, 2, 'Y'),
(35, 213131, 86208, '20152', 'kurikulum semester 8', NULL, 2, 'Y'),
(36, 213131, 60202, '20151', 'Kurikulum 20151 E gasal', NULL, 2, 'Y'),
(37, 213131, 60202, '20152', 'Kurikulum 20152 E genap', NULL, 2, 'Y');

-- --------------------------------------------------------

--
-- Struktur dari tabel `level`
--

CREATE TABLE `level` (
  `id_level` int(10) NOT NULL,
  `level` varchar(100) COLLATE latin1_general_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data untuk tabel `level`
--

INSERT INTO `level` (`id_level`, `level`) VALUES
(1, 'Administrator'),
(2, 'Dosen'),
(3, 'Akademik'),
(4, 'Mahasiswa');

-- --------------------------------------------------------

--
-- Struktur dari tabel `mahasiswa`
--

CREATE TABLE `mahasiswa` (
  `ID` bigint(20) NOT NULL,
  `NIM` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `id_level` int(1) NOT NULL DEFAULT '4',
  `Identitas_ID` varchar(10) COLLATE latin1_general_ci NOT NULL,
  `Jurusan_ID` int(5) NOT NULL,
  `Program_ID` int(1) DEFAULT NULL,
  `Nama` varchar(100) COLLATE latin1_general_ci DEFAULT NULL,
  `username` varchar(20) COLLATE latin1_general_ci NOT NULL,
  `password` varchar(255) COLLATE latin1_general_ci DEFAULT NULL,
  `Angkatan` varchar(8) COLLATE latin1_general_ci DEFAULT NULL,
  `Tahun_ID` int(5) NOT NULL,
  `TglSKMasuk` date NOT NULL,
  `Kurikulum_ID` int(11) NOT NULL,
  `foto` varchar(255) COLLATE latin1_general_ci NOT NULL DEFAULT 'no_foto.jpg',
  `StatusAwal_ID` varchar(5) COLLATE latin1_general_ci DEFAULT NULL,
  `StatusMhsw_ID` varchar(5) COLLATE latin1_general_ci NOT NULL,
  `PenasehatAkademik` varchar(50) COLLATE latin1_general_ci DEFAULT NULL,
  `Kelamin` char(3) COLLATE latin1_general_ci DEFAULT NULL,
  `WargaNegara` char(3) COLLATE latin1_general_ci DEFAULT NULL,
  `Kebangsaan` varchar(50) COLLATE latin1_general_ci DEFAULT NULL,
  `TempatLahir` varchar(50) COLLATE latin1_general_ci DEFAULT NULL,
  `TanggalLahir` date DEFAULT NULL,
  `Agama` varchar(20) COLLATE latin1_general_ci DEFAULT NULL,
  `StatusSipil` varchar(20) COLLATE latin1_general_ci DEFAULT NULL,
  `Alamat` varchar(255) COLLATE latin1_general_ci DEFAULT NULL,
  `Kota` varchar(50) COLLATE latin1_general_ci DEFAULT NULL,
  `RT` varchar(10) COLLATE latin1_general_ci DEFAULT NULL,
  `RW` varchar(10) COLLATE latin1_general_ci DEFAULT NULL,
  `KodePos` varchar(50) COLLATE latin1_general_ci DEFAULT NULL,
  `Propinsi` varchar(50) COLLATE latin1_general_ci DEFAULT NULL,
  `Negara` varchar(50) COLLATE latin1_general_ci DEFAULT NULL,
  `Telepon` varchar(50) COLLATE latin1_general_ci DEFAULT NULL,
  `Handphone` varchar(50) COLLATE latin1_general_ci DEFAULT NULL,
  `Email` varchar(100) COLLATE latin1_general_ci DEFAULT NULL,
  `AlamatAsal` varchar(255) COLLATE latin1_general_ci DEFAULT NULL,
  `KotaAsal` varchar(50) COLLATE latin1_general_ci DEFAULT NULL,
  `RTAsal` varchar(10) COLLATE latin1_general_ci DEFAULT NULL,
  `RWAsal` varchar(10) COLLATE latin1_general_ci DEFAULT NULL,
  `KodePosAsal` varchar(50) COLLATE latin1_general_ci DEFAULT NULL,
  `PropinsiAsal` varchar(50) COLLATE latin1_general_ci DEFAULT NULL,
  `NegaraAsal` varchar(50) COLLATE latin1_general_ci DEFAULT NULL,
  `NamaAyah` varchar(50) COLLATE latin1_general_ci DEFAULT NULL,
  `AgamaAyah` varchar(20) COLLATE latin1_general_ci DEFAULT NULL,
  `PendidikanAyah` varchar(50) COLLATE latin1_general_ci DEFAULT NULL,
  `PekerjaanAyah` varchar(50) COLLATE latin1_general_ci DEFAULT NULL,
  `HidupAyah` varchar(5) COLLATE latin1_general_ci DEFAULT NULL,
  `NamaIbu` varchar(50) COLLATE latin1_general_ci DEFAULT NULL,
  `AgamaIbu` varchar(20) COLLATE latin1_general_ci DEFAULT NULL,
  `PendidikanIbu` varchar(50) COLLATE latin1_general_ci DEFAULT NULL,
  `PekerjaanIbu` varchar(50) COLLATE latin1_general_ci DEFAULT NULL,
  `HidupIbu` varchar(5) COLLATE latin1_general_ci DEFAULT NULL,
  `AlamatOrtu` varchar(255) COLLATE latin1_general_ci DEFAULT NULL,
  `KotaOrtu` varchar(50) COLLATE latin1_general_ci DEFAULT NULL,
  `KodePosOrtu` varchar(50) COLLATE latin1_general_ci DEFAULT NULL,
  `PropinsiOrtu` varchar(50) COLLATE latin1_general_ci DEFAULT NULL,
  `NegaraOrtu` varchar(50) COLLATE latin1_general_ci DEFAULT NULL,
  `TeleponOrtu` varchar(50) COLLATE latin1_general_ci DEFAULT NULL,
  `HandphoneOrtu` varchar(50) COLLATE latin1_general_ci DEFAULT NULL,
  `EmailOrtu` varchar(100) COLLATE latin1_general_ci DEFAULT NULL,
  `AsalSekolah` varchar(50) COLLATE latin1_general_ci DEFAULT NULL,
  `AsalSekolah1` varchar(50) COLLATE latin1_general_ci DEFAULT NULL,
  `JenisSekolah` varchar(20) COLLATE latin1_general_ci DEFAULT NULL,
  `KotaSekolah` varchar(50) COLLATE latin1_general_ci DEFAULT NULL,
  `JurusanSekolah_ID` varchar(3) COLLATE latin1_general_ci DEFAULT NULL,
  `NilaiSekolah` varchar(10) COLLATE latin1_general_ci DEFAULT NULL,
  `TahunLulus` varchar(10) COLLATE latin1_general_ci DEFAULT NULL,
  `aktif` enum('Y','N') COLLATE latin1_general_ci DEFAULT 'N',
  `LulusUjian` enum('Y','N') COLLATE latin1_general_ci NOT NULL DEFAULT 'N',
  `NilaiUjian` float UNSIGNED NOT NULL DEFAULT '0',
  `GradeNilai` varchar(5) COLLATE latin1_general_ci DEFAULT NULL,
  `TanggalLulus` date NOT NULL DEFAULT '0000-00-00' COMMENT 'Lulus dari perguruan tinggi',
  `IPK` decimal(4,2) NOT NULL DEFAULT '0.00',
  `TotalSKS` int(11) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data untuk tabel `mahasiswa`
--

INSERT INTO `mahasiswa` (`ID`, `NIM`, `id_level`, `Identitas_ID`, `Jurusan_ID`, `Program_ID`, `Nama`, `username`, `password`, `Angkatan`, `Tahun_ID`, `TglSKMasuk`, `Kurikulum_ID`, `foto`, `StatusAwal_ID`, `StatusMhsw_ID`, `PenasehatAkademik`, `Kelamin`, `WargaNegara`, `Kebangsaan`, `TempatLahir`, `TanggalLahir`, `Agama`, `StatusSipil`, `Alamat`, `Kota`, `RT`, `RW`, `KodePos`, `Propinsi`, `Negara`, `Telepon`, `Handphone`, `Email`, `AlamatAsal`, `KotaAsal`, `RTAsal`, `RWAsal`, `KodePosAsal`, `PropinsiAsal`, `NegaraAsal`, `NamaAyah`, `AgamaAyah`, `PendidikanAyah`, `PekerjaanAyah`, `HidupAyah`, `NamaIbu`, `AgamaIbu`, `PendidikanIbu`, `PekerjaanIbu`, `HidupIbu`, `AlamatOrtu`, `KotaOrtu`, `KodePosOrtu`, `PropinsiOrtu`, `NegaraOrtu`, `TeleponOrtu`, `HandphoneOrtu`, `EmailOrtu`, `AsalSekolah`, `AsalSekolah1`, `JenisSekolah`, `KotaSekolah`, `JurusanSekolah_ID`, `NilaiSekolah`, `TahunLulus`, `aktif`, `LulusUjian`, `NilaiUjian`, `GradeNilai`, `TanggalLulus`, `IPK`, `TotalSKS`) VALUES
(3, '201511002', 4, '213131', 86208, 3, 'Abdul Ghani Farhan', '201511002', 'b409e7a98ea7ac148281d519c568d290bcc82bf207c6e20e10824f2445bc2aca5b0e9efd9f8b4757acac87eac48e3df7595ce15d08e650c0e8006999fe5e86d3', '2015', 0, '0000-00-00', 0, 'no_foto.jpg', '0', 'A', '', 'L', NULL, NULL, '', '0000-00-00', '0', NULL, '', '', '', '', NULL, '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'N', 'N', 0, NULL, '0000-00-00', '0.00', 0),
(2, '201511001', 4, '213131', 86208, 3, 'Aam Ilham Ramadan', '201511001', 'b409e7a98ea7ac148281d519c568d290bcc82bf207c6e20e10824f2445bc2aca5b0e9efd9f8b4757acac87eac48e3df7595ce15d08e650c0e8006999fe5e86d3', '2015', 0, '0000-00-00', 0, 'no_foto.jpg', '0', 'A', '', 'L', NULL, NULL, 'xxxx', '0000-00-00', 'ISLAM', NULL, 'xxx', 'xxxx', '000', '000', NULL, 'xxx', 'xxx', '0000', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'N', 'N', 0, NULL, '0000-00-00', '0.00', 0),
(4, '201511003', 4, '213131', 86208, 3, 'Agi Nuryana', '201511003', 'b409e7a98ea7ac148281d519c568d290bcc82bf207c6e20e10824f2445bc2aca5b0e9efd9f8b4757acac87eac48e3df7595ce15d08e650c0e8006999fe5e86d3', '2015', 0, '0000-00-00', 0, 'no_foto.jpg', '0', 'A', '', 'L', NULL, NULL, '', '0000-00-00', 'ISLAM', NULL, '', '', '', '', NULL, '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'N', 'N', 0, NULL, '0000-00-00', '0.00', 0),
(5, '201511004', 4, '213131', 86208, 3, 'Dede Arohmana', '201511004', 'b409e7a98ea7ac148281d519c568d290bcc82bf207c6e20e10824f2445bc2aca5b0e9efd9f8b4757acac87eac48e3df7595ce15d08e650c0e8006999fe5e86d3', '2015', 0, '0000-00-00', 0, 'no_foto.jpg', '0', 'A', '', 'L', NULL, NULL, '', '0000-00-00', 'ISLAM', NULL, '', '', '', '', NULL, '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'N', 'N', 0, NULL, '0000-00-00', '0.00', 0),
(6, '201511005', 4, '213131', 86208, 3, 'Dede Rahmat Solehudin', '201511005', 'b409e7a98ea7ac148281d519c568d290bcc82bf207c6e20e10824f2445bc2aca5b0e9efd9f8b4757acac87eac48e3df7595ce15d08e650c0e8006999fe5e86d3', '2015', 0, '0000-00-00', 0, 'no_foto.jpg', '0', 'A', '', 'P', NULL, NULL, '', '0000-00-00', '0', NULL, '', '', '', '', NULL, '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'N', 'N', 0, NULL, '0000-00-00', '0.00', 0),
(7, '201511006', 4, '213131', 86208, 3, 'Fadli Nurdin', '201511006', 'b409e7a98ea7ac148281d519c568d290bcc82bf207c6e20e10824f2445bc2aca5b0e9efd9f8b4757acac87eac48e3df7595ce15d08e650c0e8006999fe5e86d3', '2015', 0, '0000-00-00', 0, 'no_foto.jpg', '0', 'A', '', 'L', NULL, NULL, '', '0000-00-00', 'ISLAM', NULL, '', '', '', '', NULL, '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'N', 'N', 0, NULL, '0000-00-00', '0.00', 0),
(8, '201511007', 4, '213131', 86208, 3, 'Farid Hamzah', '201511007', 'b409e7a98ea7ac148281d519c568d290bcc82bf207c6e20e10824f2445bc2aca5b0e9efd9f8b4757acac87eac48e3df7595ce15d08e650c0e8006999fe5e86d3', '2015', 0, '0000-00-00', 0, 'no_foto.jpg', '0', 'A', '', 'L', NULL, NULL, '', '0000-00-00', 'ISLAM', NULL, '', '', '', '', NULL, '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'N', 'N', 0, NULL, '0000-00-00', '0.00', 0),
(9, '201511008', 4, '213131', 86208, 3, 'Fitriyani', '201511008', 'b409e7a98ea7ac148281d519c568d290bcc82bf207c6e20e10824f2445bc2aca5b0e9efd9f8b4757acac87eac48e3df7595ce15d08e650c0e8006999fe5e86d3', '2015', 0, '0000-00-00', 0, 'no_foto.jpg', 'P', 'A', '', 'P', NULL, NULL, '', '0000-00-00', 'ISLAM', NULL, '', '', '', '', NULL, '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'N', 'N', 0, NULL, '0000-00-00', '0.00', 0),
(10, '201511009', 4, '213131', 86208, 3, 'Gina Fauziah Nur', '201511009', 'b409e7a98ea7ac148281d519c568d290bcc82bf207c6e20e10824f2445bc2aca5b0e9efd9f8b4757acac87eac48e3df7595ce15d08e650c0e8006999fe5e86d3', '2015', 0, '0000-00-00', 0, 'no_foto.jpg', '0', 'A', '', 'P', NULL, NULL, '', '0000-00-00', 'ISLAM', NULL, '', '', '', '', NULL, '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'N', 'N', 0, NULL, '0000-00-00', '0.00', 0),
(11, '201511010', 4, '213131', 86208, 3, 'Hamdan Ramdani', '201511010', 'b409e7a98ea7ac148281d519c568d290bcc82bf207c6e20e10824f2445bc2aca5b0e9efd9f8b4757acac87eac48e3df7595ce15d08e650c0e8006999fe5e86d3', '2015', 0, '0000-00-00', 0, 'no_foto.jpg', '0', 'A', '', 'L', NULL, NULL, '', '0000-00-00', 'ISLAM', NULL, '', '', '', '', NULL, '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'N', 'N', 0, NULL, '0000-00-00', '0.00', 0),
(12, '201511011', 4, '213131', 86208, 3, 'Ilma Nurhayati', '201511011', 'b409e7a98ea7ac148281d519c568d290bcc82bf207c6e20e10824f2445bc2aca5b0e9efd9f8b4757acac87eac48e3df7595ce15d08e650c0e8006999fe5e86d3', '2015', 0, '0000-00-00', 0, 'no_foto.jpg', '0', 'A', '', 'P', NULL, NULL, '', '0000-00-00', 'ISLAM', NULL, '', '', '', '', NULL, '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'N', 'N', 0, NULL, '0000-00-00', '0.00', 0),
(13, '201511012', 4, '213131', 86208, 3, 'Indah Rizki Muharam', '201511012', 'b409e7a98ea7ac148281d519c568d290bcc82bf207c6e20e10824f2445bc2aca5b0e9efd9f8b4757acac87eac48e3df7595ce15d08e650c0e8006999fe5e86d3', '2015', 0, '0000-00-00', 0, 'no_foto.jpg', '0', 'A', '', 'P', NULL, NULL, '', '0000-00-00', 'ISLAM', NULL, '', '', '', '', NULL, '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'N', 'N', 0, NULL, '0000-00-00', '0.00', 0),
(14, '201511013', 4, '213131', 86208, 3, 'Irfan Maulana', '201511013', 'b409e7a98ea7ac148281d519c568d290bcc82bf207c6e20e10824f2445bc2aca5b0e9efd9f8b4757acac87eac48e3df7595ce15d08e650c0e8006999fe5e86d3', '2015', 0, '0000-00-00', 0, 'no_foto.jpg', '0', 'A', '', 'L', NULL, NULL, '', '0000-00-00', 'ISLAM', NULL, '', '', '', '', NULL, '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'N', 'N', 0, NULL, '0000-00-00', '0.00', 0),
(15, '201511014', 4, '213131', 86208, 3, 'Isma Nurlaeliah', '201511014', 'b409e7a98ea7ac148281d519c568d290bcc82bf207c6e20e10824f2445bc2aca5b0e9efd9f8b4757acac87eac48e3df7595ce15d08e650c0e8006999fe5e86d3', '2015', 0, '0000-00-00', 0, 'no_foto.jpg', '0', '0', '', 'P', NULL, NULL, '', '0000-00-00', 'ISLAM', NULL, '', '', '', '', NULL, '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '0', '0', '0', NULL, '', '0', '0', '0', NULL, '', '', NULL, '', '', '', NULL, NULL, NULL, NULL, '0', NULL, '', '0', '', 'N', 'N', 0, NULL, '0000-00-00', '0.00', 0),
(16, '201511015', 4, '213131', 86208, 3, 'Jajang Ismail', '201511015', 'b409e7a98ea7ac148281d519c568d290bcc82bf207c6e20e10824f2445bc2aca5b0e9efd9f8b4757acac87eac48e3df7595ce15d08e650c0e8006999fe5e86d3', '2015', 0, '0000-00-00', 0, 'no_foto.jpg', '0', '0', '', 'L', NULL, NULL, '', '0000-00-00', 'ISLAM', NULL, '', '', '', '', NULL, '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '0', '0', '0', NULL, '', '0', '0', '0', NULL, '', '', NULL, '', '', '', NULL, NULL, NULL, NULL, '0', NULL, '', '0', '', 'N', 'N', 0, NULL, '0000-00-00', '0.00', 0),
(17, '201511016', 4, '213131', 86208, 3, 'Jujun Jumanah', '201511016', 'b409e7a98ea7ac148281d519c568d290bcc82bf207c6e20e10824f2445bc2aca5b0e9efd9f8b4757acac87eac48e3df7595ce15d08e650c0e8006999fe5e86d3', '2015', 0, '0000-00-00', 0, 'no_foto.jpg', '0', '0', '', 'P', NULL, NULL, '', '0000-00-00', 'ISLAM', NULL, '', '', '', '', NULL, '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '0', '0', '0', NULL, '', '0', '0', '0', NULL, '', '', NULL, '', '', '', NULL, NULL, NULL, NULL, '0', NULL, '', '0', '', 'N', 'N', 0, NULL, '0000-00-00', '0.00', 0),
(18, '201511017', 4, '213131', 86208, 3, 'Komalasari', '201511017', 'b409e7a98ea7ac148281d519c568d290bcc82bf207c6e20e10824f2445bc2aca5b0e9efd9f8b4757acac87eac48e3df7595ce15d08e650c0e8006999fe5e86d3', '2015', 0, '0000-00-00', 0, 'no_foto.jpg', '0', 'A', '', 'P', NULL, NULL, '', '0000-00-00', 'ISLAM', NULL, '', '', '', '', NULL, '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '0', '0', '0', NULL, '', '0', '0', '0', NULL, '', '', NULL, '', '', '', NULL, NULL, NULL, NULL, '0', NULL, '0', '0', '', 'N', 'N', 0, NULL, '0000-00-00', '0.00', 0),
(19, '201511018', 4, '213131', 86208, 3, 'Lies Malisa', '201511018', 'b409e7a98ea7ac148281d519c568d290bcc82bf207c6e20e10824f2445bc2aca5b0e9efd9f8b4757acac87eac48e3df7595ce15d08e650c0e8006999fe5e86d3', '2015', 0, '0000-00-00', 0, 'no_foto.jpg', '0', '0', '', 'P', NULL, NULL, '', '0000-00-00', 'ISLAM', NULL, '', '', '', '', NULL, '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '0', '0', '0', NULL, '', '0', '0', '0', NULL, '', '', NULL, '', '', '', NULL, NULL, NULL, NULL, '0', NULL, '', '0', '', 'N', 'N', 0, NULL, '0000-00-00', '0.00', 0),
(20, '201511019', 4, '213131', 86208, 3, 'lutfa hamdah', '201511019', 'b409e7a98ea7ac148281d519c568d290bcc82bf207c6e20e10824f2445bc2aca5b0e9efd9f8b4757acac87eac48e3df7595ce15d08e650c0e8006999fe5e86d3', '2015', 0, '0000-00-00', 0, 'no_foto.jpg', '0', '0', '', 'P', NULL, NULL, '', '0000-00-00', 'ISLAM', NULL, '', '', '', '', NULL, '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '0', '0', '0', NULL, '', '0', '0', '0', NULL, '', '', NULL, '', '', '', NULL, NULL, NULL, NULL, '0', NULL, '', '0', '', 'N', 'N', 0, NULL, '0000-00-00', '0.00', 0),
(21, '201511020', 4, '213131', 86208, 3, 'Mahmudin Sujai', '201511020', 'b409e7a98ea7ac148281d519c568d290bcc82bf207c6e20e10824f2445bc2aca5b0e9efd9f8b4757acac87eac48e3df7595ce15d08e650c0e8006999fe5e86d3', '2015', 0, '0000-00-00', 0, 'no_foto.jpg', '0', '0', '', 'L', NULL, NULL, '', '0000-00-00', 'ISLAM', NULL, '', '', '', '', NULL, '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '0', '0', '0', NULL, '', '0', '0', '0', NULL, '', '', NULL, '', '', '', NULL, NULL, NULL, NULL, '0', NULL, '', '0', '', 'N', 'N', 0, NULL, '0000-00-00', '0.00', 0),
(22, '201511021', 4, '213131', 86208, 3, 'Muhammad Imam Muttaqien', '201511021', 'b409e7a98ea7ac148281d519c568d290bcc82bf207c6e20e10824f2445bc2aca5b0e9efd9f8b4757acac87eac48e3df7595ce15d08e650c0e8006999fe5e86d3', '2015', 0, '0000-00-00', 0, 'no_foto.jpg', '0', '0', '', 'L', NULL, NULL, '', '0000-00-00', 'ISLAM', NULL, '', '', '', '', NULL, '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '0', '0', '0', NULL, '', '0', '0', '0', NULL, '', '', NULL, '', '', '', NULL, NULL, NULL, NULL, '0', NULL, '', '0', '', 'N', 'N', 0, NULL, '0000-00-00', '0.00', 0),
(23, '201511022', 4, '213131', 86208, 3, 'Muhammad Irfan Maulana Ismail', '201511022', 'b409e7a98ea7ac148281d519c568d290bcc82bf207c6e20e10824f2445bc2aca5b0e9efd9f8b4757acac87eac48e3df7595ce15d08e650c0e8006999fe5e86d3', '2015', 0, '0000-00-00', 0, 'no_foto.jpg', '0', '0', '', 'L', NULL, NULL, '', '0000-00-00', 'ISLAM', NULL, '', '', '', '', NULL, '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '0', '0', '0', NULL, '', '0', '0', '0', NULL, '', '', NULL, '', '', '', NULL, NULL, NULL, NULL, '0', NULL, '', '0', '', 'N', 'N', 0, NULL, '0000-00-00', '0.00', 0),
(24, '201511023', 4, '213131', 86208, 3, 'Muhammad Ramdhan', '201511023', 'b409e7a98ea7ac148281d519c568d290bcc82bf207c6e20e10824f2445bc2aca5b0e9efd9f8b4757acac87eac48e3df7595ce15d08e650c0e8006999fe5e86d3', '2015', 0, '0000-00-00', 0, 'no_foto.jpg', '0', '0', '', 'L', NULL, NULL, '', '0000-00-00', 'ISLAM', NULL, '', '', '', '', NULL, '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '0', '0', '0', NULL, '', '0', '0', '0', NULL, '', '', NULL, '', '', '', NULL, NULL, NULL, NULL, '0', NULL, '', '0', '', 'N', 'N', 0, NULL, '0000-00-00', '0.00', 0),
(25, '201511024', 4, '213131', 86208, 3, 'Nofiola Fiolita Sakri', '201511024', 'b409e7a98ea7ac148281d519c568d290bcc82bf207c6e20e10824f2445bc2aca5b0e9efd9f8b4757acac87eac48e3df7595ce15d08e650c0e8006999fe5e86d3', '2015', 0, '0000-00-00', 0, 'no_foto.jpg', '0', '0', '', 'P', NULL, NULL, '', '0000-00-00', '0', NULL, '', '', '', '', NULL, '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '0', '0', '0', NULL, '', '0', '0', '0', NULL, '', '', NULL, '', '', '', NULL, NULL, NULL, NULL, '0', NULL, '', '0', '', 'N', 'N', 0, NULL, '0000-00-00', '0.00', 0),
(26, '201511025', 4, '213131', 86208, 3, 'Nur hidayah', '201511025', 'b409e7a98ea7ac148281d519c568d290bcc82bf207c6e20e10824f2445bc2aca5b0e9efd9f8b4757acac87eac48e3df7595ce15d08e650c0e8006999fe5e86d3', '2015', 0, '0000-00-00', 0, 'no_foto.jpg', '0', '0', '', 'P', NULL, NULL, '', '0000-00-00', 'ISLAM', NULL, '', '', '', '', NULL, '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '0', '0', '0', NULL, '', '0', '0', '0', NULL, '', '', NULL, '', '', '', NULL, NULL, NULL, NULL, '0', NULL, '', '0', '', 'N', 'N', 0, NULL, '0000-00-00', '0.00', 0),
(27, '201511026', 4, '213131', 86208, 3, 'Opik Hidayah', '201511026', 'b409e7a98ea7ac148281d519c568d290bcc82bf207c6e20e10824f2445bc2aca5b0e9efd9f8b4757acac87eac48e3df7595ce15d08e650c0e8006999fe5e86d3', '2015', 0, '0000-00-00', 0, 'no_foto.jpg', '0', '0', '', 'L', NULL, NULL, '', '0000-00-00', 'ISLAM', NULL, '', '', '', '', NULL, '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '0', '0', '0', NULL, '', '0', '0', '0', NULL, '', '', NULL, '', '', '', NULL, NULL, NULL, NULL, '0', NULL, '', '0', '', 'N', 'N', 0, NULL, '0000-00-00', '0.00', 0),
(28, '201511027', 4, '213131', 86208, 3, 'Rahmat Badar Jaelani', '201511027', 'b409e7a98ea7ac148281d519c568d290bcc82bf207c6e20e10824f2445bc2aca5b0e9efd9f8b4757acac87eac48e3df7595ce15d08e650c0e8006999fe5e86d3', '2015', 0, '0000-00-00', 0, 'no_foto.jpg', '0', '0', '', 'L', NULL, NULL, '', '0000-00-00', 'ISLAM', NULL, '', '', '', '', NULL, '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '0', '0', '0', NULL, '', '0', '0', '0', NULL, '', '', NULL, '', '', '', NULL, NULL, NULL, NULL, '0', NULL, '', '0', '', 'N', 'N', 0, NULL, '0000-00-00', '0.00', 0),
(29, '201511028', 4, '213131', 86208, 3, 'Rengki Heryanto', '201511028', 'b409e7a98ea7ac148281d519c568d290bcc82bf207c6e20e10824f2445bc2aca5b0e9efd9f8b4757acac87eac48e3df7595ce15d08e650c0e8006999fe5e86d3', '2015', 0, '0000-00-00', 0, 'no_foto.jpg', '0', '0', '', 'L', NULL, NULL, '', '0000-00-00', 'ISLAM', NULL, '', '', '', '', NULL, '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '0', '0', '0', NULL, '', '0', '0', '0', NULL, '', '', NULL, '', '', '', NULL, NULL, NULL, NULL, '0', NULL, '', '0', '', 'N', 'N', 0, NULL, '0000-00-00', '0.00', 0),
(30, '201511029', 4, '213131', 86208, 3, 'Rida Aulia Gandari', '201511029', 'b409e7a98ea7ac148281d519c568d290bcc82bf207c6e20e10824f2445bc2aca5b0e9efd9f8b4757acac87eac48e3df7595ce15d08e650c0e8006999fe5e86d3', '2015', 0, '0000-00-00', 0, 'no_foto.jpg', '0', '0', '', 'P', NULL, NULL, '', '0000-00-00', 'ISLAM', NULL, '', '', '', '', NULL, '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '0', '0', '0', NULL, '', '0', '0', '0', NULL, '', '', NULL, '', '', '', NULL, NULL, NULL, NULL, '0', NULL, '', '0', '', 'N', 'N', 0, NULL, '0000-00-00', '0.00', 0),
(31, '201511030', 4, '213131', 86208, 3, 'Sherlyana Nur', '201511030', 'b409e7a98ea7ac148281d519c568d290bcc82bf207c6e20e10824f2445bc2aca5b0e9efd9f8b4757acac87eac48e3df7595ce15d08e650c0e8006999fe5e86d3', '2015', 0, '0000-00-00', 0, 'no_foto.jpg', '0', '0', '', 'P', NULL, NULL, '', '0000-00-00', 'ISLAM', NULL, '', '', '', '', NULL, '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '0', '0', '0', NULL, '', '0', '0', '0', NULL, '', '', NULL, '', '', '', NULL, NULL, NULL, NULL, '0', NULL, '', '0', '', 'N', 'N', 0, NULL, '0000-00-00', '0.00', 0),
(32, '201511031', 4, '213131', 86208, 3, 'siska Apriyani', '201511031', 'b409e7a98ea7ac148281d519c568d290bcc82bf207c6e20e10824f2445bc2aca5b0e9efd9f8b4757acac87eac48e3df7595ce15d08e650c0e8006999fe5e86d3', '2015', 0, '0000-00-00', 0, 'no_foto.jpg', '0', '0', '', 'P', NULL, NULL, '', '0000-00-00', 'ISLAM', NULL, '', '', '', '', NULL, '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '0', '0', '0', NULL, '', '0', '0', '0', NULL, '', '', NULL, '', '', '', NULL, NULL, NULL, NULL, '0', NULL, '', '0', '', 'N', 'N', 0, NULL, '0000-00-00', '0.00', 0),
(33, '201511032', 4, '213131', 86208, 3, 'Siti Umu Habibah Romlah', '201511032', 'b409e7a98ea7ac148281d519c568d290bcc82bf207c6e20e10824f2445bc2aca5b0e9efd9f8b4757acac87eac48e3df7595ce15d08e650c0e8006999fe5e86d3', '2015', 0, '0000-00-00', 0, 'no_foto.jpg', '0', '0', '', 'P', NULL, NULL, '', '0000-00-00', 'ISLAM', NULL, '', '', '', '', NULL, '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '0', '0', '0', NULL, '', '0', '0', '0', NULL, '', '', NULL, '', '', '', NULL, NULL, NULL, NULL, '0', NULL, '', '0', '', 'N', 'N', 0, NULL, '0000-00-00', '0.00', 0),
(34, '201511033', 4, '213131', 86208, 3, 'Titin Siti Patimah', '201511033', 'b409e7a98ea7ac148281d519c568d290bcc82bf207c6e20e10824f2445bc2aca5b0e9efd9f8b4757acac87eac48e3df7595ce15d08e650c0e8006999fe5e86d3', '2015', 0, '0000-00-00', 0, 'no_foto.jpg', '0', '0', '', 'P', NULL, NULL, '', '0000-00-00', 'ISLAM', NULL, '', '', '', '', NULL, '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '0', '0', '0', NULL, '', '0', '0', '0', NULL, '', '', NULL, '', '', '', NULL, NULL, NULL, NULL, '0', NULL, '', '0', '', 'N', 'N', 0, NULL, '0000-00-00', '0.00', 0),
(35, '201511034', 4, '213131', 86208, 3, 'Ujang Muhamad', '201511034', 'b409e7a98ea7ac148281d519c568d290bcc82bf207c6e20e10824f2445bc2aca5b0e9efd9f8b4757acac87eac48e3df7595ce15d08e650c0e8006999fe5e86d3', '2015', 0, '0000-00-00', 0, 'no_foto.jpg', '0', '0', '', 'L', NULL, NULL, '', '0000-00-00', 'ISLAM', NULL, '', '', '', '', NULL, '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '0', '0', '0', NULL, '', '0', '0', '0', NULL, '', '', NULL, '', '', '', NULL, NULL, NULL, NULL, '0', NULL, '', '0', '', 'N', 'N', 0, NULL, '0000-00-00', '0.00', 0),
(36, '201511035', 4, '213131', 86208, 3, 'Waldy nur', 'B201511035', 'b409e7a98ea7ac148281d519c568d290bcc82bf207c6e20e10824f2445bc2aca5b0e9efd9f8b4757acac87eac48e3df7595ce15d08e650c0e8006999fe5e86d3', '2015', 0, '0000-00-00', 0, 'no_foto.jpg', '0', '0', '', 'P', NULL, NULL, '', '0000-00-00', 'ISLAM', NULL, '', '', '', '', NULL, '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '0', '0', '0', NULL, '', '0', '0', '0', NULL, '', '', NULL, '', '', '', NULL, NULL, NULL, NULL, '0', NULL, '', '0', '', 'N', 'N', 0, NULL, '0000-00-00', '0.00', 0),
(37, '201511036', 4, '213131', 86208, 3, 'Wina Karina G', '201511036', 'b409e7a98ea7ac148281d519c568d290bcc82bf207c6e20e10824f2445bc2aca5b0e9efd9f8b4757acac87eac48e3df7595ce15d08e650c0e8006999fe5e86d3', '2015', 0, '0000-00-00', 0, 'no_foto.jpg', '0', '0', '', 'P', NULL, NULL, '', '0000-00-00', 'ISLAM', NULL, '', '', '', '', NULL, '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '0', '0', '0', NULL, '', '0', '0', '0', NULL, '', '', NULL, '', '', '', NULL, NULL, NULL, NULL, '0', NULL, '', '0', '', 'N', 'N', 0, NULL, '0000-00-00', '0.00', 0),
(38, '201511037', 4, '213131', 86208, 3, 'Wulan Puspa Dwi', '201511037', 'b409e7a98ea7ac148281d519c568d290bcc82bf207c6e20e10824f2445bc2aca5b0e9efd9f8b4757acac87eac48e3df7595ce15d08e650c0e8006999fe5e86d3', '2015', 0, '0000-00-00', 0, 'no_foto.jpg', '0', '0', '', 'P', NULL, NULL, '', '0000-00-00', 'ISLAM', NULL, '', '', '', '', NULL, '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '0', '0', '0', NULL, '', '0', '0', '0', NULL, '', '', NULL, '', '', '', NULL, NULL, NULL, NULL, '0', NULL, '', '0', '', 'N', 'N', 0, NULL, '0000-00-00', '0.00', 0),
(39, '201511038', 4, '213131', 86208, 3, 'Yuni Puspita', '201511038', 'b409e7a98ea7ac148281d519c568d290bcc82bf207c6e20e10824f2445bc2aca5b0e9efd9f8b4757acac87eac48e3df7595ce15d08e650c0e8006999fe5e86d3', '2015', 0, '0000-00-00', 0, 'no_foto.jpg', '0', '0', '', 'P', NULL, NULL, '', '0000-00-00', 'ISLAM', NULL, '', '', '', '', NULL, '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '0', '0', '0', NULL, '', '0', '0', '0', NULL, '', '', NULL, '', '', '', NULL, NULL, NULL, NULL, '0', NULL, '', '0', '', 'N', 'N', 0, NULL, '0000-00-00', '0.00', 0),
(40, '201521001', 4, '213131', 60202, 3, 'Aisyah', 'E201521001', 'b409e7a98ea7ac148281d519c568d290bcc82bf207c6e20e10824f2445bc2aca5b0e9efd9f8b4757acac87eac48e3df7595ce15d08e650c0e8006999fe5e86d3', '2015', 0, '0000-00-00', 0, 'no_foto.jpg', '0', 'A', '', 'P', NULL, NULL, '', '0000-00-00', 'ISLAM', NULL, '', '', '', '', NULL, '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '0', '0', '0', NULL, '', '0', '0', '0', NULL, '', '', NULL, '', '', '', NULL, NULL, NULL, NULL, '0', NULL, '', '0', '', 'N', 'N', 0, NULL, '0000-00-00', '0.00', 0),
(41, '201521002', 4, '213131', 60202, 3, 'Ajeng Pujawati', '201521002', 'b409e7a98ea7ac148281d519c568d290bcc82bf207c6e20e10824f2445bc2aca5b0e9efd9f8b4757acac87eac48e3df7595ce15d08e650c0e8006999fe5e86d3', '2015', 0, '0000-00-00', 0, 'no_foto.jpg', '0', 'A', '', 'P', NULL, NULL, '', '0000-00-00', 'ISLAM', NULL, '', '', '', '', NULL, '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '0', '0', '0', NULL, '', '0', '0', '0', NULL, '', '', NULL, '', '', '', NULL, NULL, NULL, NULL, '0', NULL, '', '0', '', 'N', 'N', 0, NULL, '0000-00-00', '0.00', 0),
(42, '201521003', 4, '213131', 60202, 3, 'Dea Dian Komara', 'E201521003', 'b409e7a98ea7ac148281d519c568d290bcc82bf207c6e20e10824f2445bc2aca5b0e9efd9f8b4757acac87eac48e3df7595ce15d08e650c0e8006999fe5e86d3', '2015', 0, '0000-00-00', 0, 'no_foto.jpg', '0', 'A', '', 'P', NULL, NULL, '', '0000-00-00', 'ISLAM', NULL, '', '', '', '', NULL, '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '0', '0', '0', NULL, '', '0', '0', '0', NULL, '', '', NULL, '', '', '', NULL, NULL, NULL, NULL, '0', NULL, '', '0', '', 'N', 'N', 0, NULL, '0000-00-00', '0.00', 0),
(43, '201521004', 4, '213131', 60202, 3, 'Enur Natalia Nurmala', 'E201521004', 'b409e7a98ea7ac148281d519c568d290bcc82bf207c6e20e10824f2445bc2aca5b0e9efd9f8b4757acac87eac48e3df7595ce15d08e650c0e8006999fe5e86d3', '2015', 0, '0000-00-00', 0, 'no_foto.jpg', '0', 'A', '', 'P', NULL, NULL, '', '0000-00-00', 'ISLAM', NULL, '', '', '', '', NULL, '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '0', '0', '0', NULL, '', '0', '0', '0', NULL, '', '', NULL, '', '', '', NULL, NULL, NULL, NULL, '0', NULL, '', '0', '', 'N', 'N', 0, NULL, '0000-00-00', '0.00', 0),
(44, '201521005', 4, '213131', 60202, 3, 'Fathul Arif', 'E201521005', 'b409e7a98ea7ac148281d519c568d290bcc82bf207c6e20e10824f2445bc2aca5b0e9efd9f8b4757acac87eac48e3df7595ce15d08e650c0e8006999fe5e86d3', '2015', 0, '0000-00-00', 0, 'no_foto.jpg', '0', 'A', '', 'L', NULL, NULL, '', '0000-00-00', 'ISLAM', NULL, '', '', '', '', NULL, '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '0', '0', '0', NULL, '', '0', '0', '0', NULL, '', '', NULL, '', '', '', NULL, NULL, NULL, NULL, '0', NULL, '', '0', '', 'N', 'N', 0, NULL, '0000-00-00', '0.00', 0),
(45, '201521006', 4, '213131', 60202, 3, 'Ismi Marathus Solihah', 'E201521006', 'b409e7a98ea7ac148281d519c568d290bcc82bf207c6e20e10824f2445bc2aca5b0e9efd9f8b4757acac87eac48e3df7595ce15d08e650c0e8006999fe5e86d3', '2015', 0, '0000-00-00', 0, 'no_foto.jpg', '0', 'A', '', 'P', NULL, NULL, '', '0000-00-00', 'ISLAM', NULL, '', '', '', '', NULL, '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '0', '0', '0', NULL, '', '0', '0', '0', NULL, '', '', NULL, '', '', '', NULL, NULL, NULL, NULL, '0', NULL, '', '0', '', 'N', 'N', 0, NULL, '0000-00-00', '0.00', 0),
(47, '201521007', 4, '213131', 60202, 3, 'Isna Siti Robi''atul Adawiyah', 'E201521007', 'b409e7a98ea7ac148281d519c568d290bcc82bf207c6e20e10824f2445bc2aca5b0e9efd9f8b4757acac87eac48e3df7595ce15d08e650c0e8006999fe5e86d3', '2015', 0, '0000-00-00', 0, 'no_foto.jpg', '0', 'A', '', 'P', NULL, NULL, '', '0000-00-00', 'ISLAM', NULL, 'xxxxxxxx', '', '', '', NULL, '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '0', '0', '0', NULL, '', '0', '0', '0', NULL, '', '', NULL, '', '', '', NULL, NULL, NULL, NULL, '0', NULL, '0', '0', '', 'N', 'N', 0, NULL, '0000-00-00', '0.00', 0),
(48, '201521008', 4, '213131', 60202, 3, 'Iwan Kurniawan', 'E201521008', 'b409e7a98ea7ac148281d519c568d290bcc82bf207c6e20e10824f2445bc2aca5b0e9efd9f8b4757acac87eac48e3df7595ce15d08e650c0e8006999fe5e86d3', '2015', 0, '0000-00-00', 0, 'no_foto.jpg', '0', 'A', '', 'L', NULL, NULL, '', '0000-00-00', 'ISLAM', NULL, '', '', '', '', NULL, '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '0', '0', '0', NULL, '', '0', '0', '0', NULL, '', '', NULL, '', '', '', NULL, NULL, NULL, NULL, '0', NULL, '', '0', '', 'N', 'N', 0, NULL, '0000-00-00', '0.00', 0),
(49, '201521009', 4, '213131', 60202, 3, 'Prayoga Fajar Dewangkara', 'E201521009', 'b409e7a98ea7ac148281d519c568d290bcc82bf207c6e20e10824f2445bc2aca5b0e9efd9f8b4757acac87eac48e3df7595ce15d08e650c0e8006999fe5e86d3', '2015', 0, '0000-00-00', 0, 'no_foto.jpg', '0', 'A', '', 'L', NULL, NULL, '', '0000-00-00', 'ISLAM', NULL, '', '', '', '', NULL, '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '0', '0', '0', NULL, '', '0', '0', '0', NULL, '', '', NULL, '', '', '', NULL, NULL, NULL, NULL, '0', NULL, '', '0', '', 'N', 'N', 0, NULL, '0000-00-00', '0.00', 0),
(50, '201521010', 4, '213131', 60202, 3, 'R.Indah Yanuar Ramadanty', 'E2015.21010', 'b409e7a98ea7ac148281d519c568d290bcc82bf207c6e20e10824f2445bc2aca5b0e9efd9f8b4757acac87eac48e3df7595ce15d08e650c0e8006999fe5e86d3', '2015', 0, '0000-00-00', 0, 'no_foto.jpg', '0', 'A', '', 'P', NULL, NULL, '', '0000-00-00', 'ISLAM', NULL, '', '', '', '', NULL, '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '0', '0', '0', NULL, '', '0', '0', '0', NULL, '', '', NULL, '', '', '', NULL, NULL, NULL, NULL, '0', NULL, '0', '0', '', 'N', 'N', 0, NULL, '0000-00-00', '0.00', 0),
(51, '201521011', 4, '213131', 60202, 3, 'Sugandi', 'E201521011', 'b409e7a98ea7ac148281d519c568d290bcc82bf207c6e20e10824f2445bc2aca5b0e9efd9f8b4757acac87eac48e3df7595ce15d08e650c0e8006999fe5e86d3', '2015', 0, '0000-00-00', 0, 'no_foto.jpg', '0', 'A', '', 'L', NULL, NULL, '', '0000-00-00', 'ISLAM', NULL, '', '', '', '', NULL, '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '0', '0', '0', NULL, '', '0', '0', '0', NULL, '', '', NULL, '', '', '', NULL, NULL, NULL, NULL, '0', NULL, '', '0', '', 'N', 'N', 0, NULL, '0000-00-00', '0.00', 0),
(52, '201521012', 4, '213131', 60202, 3, 'Sukni Marjaniyah', 'E201521012', 'b409e7a98ea7ac148281d519c568d290bcc82bf207c6e20e10824f2445bc2aca5b0e9efd9f8b4757acac87eac48e3df7595ce15d08e650c0e8006999fe5e86d3', '2015', 0, '0000-00-00', 0, 'no_foto.jpg', '0', 'A', '', 'P', NULL, NULL, '', '0000-00-00', 'ISLAM', NULL, '', '', '', '', NULL, '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '0', '0', '0', NULL, '', '0', '0', '0', NULL, '', '', NULL, '', '', '', NULL, NULL, NULL, NULL, '0', NULL, '', '0', '', 'N', 'N', 0, NULL, '0000-00-00', '0.00', 0),
(53, '201521013', 4, '213131', 60202, 3, 'Shofiyan Mahfudh Muhyiddin', 'E201521013', 'b409e7a98ea7ac148281d519c568d290bcc82bf207c6e20e10824f2445bc2aca5b0e9efd9f8b4757acac87eac48e3df7595ce15d08e650c0e8006999fe5e86d3', '2015', 0, '0000-00-00', 0, 'no_foto.jpg', '0', 'A', '', 'L', NULL, NULL, '', '0000-00-00', 'ISLAM', NULL, '', '', '', '', NULL, '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '0', '0', '0', NULL, '', '0', '0', '0', NULL, '', '', NULL, '', '', '', NULL, NULL, NULL, NULL, '0', NULL, '', '0', '', 'N', 'N', 0, NULL, '0000-00-00', '0.00', 0),
(54, '201421001', 4, '213131', 60202, 3, 'Ai Wiwit Irawati', '201421001', 'b409e7a98ea7ac148281d519c568d290bcc82bf207c6e20e10824f2445bc2aca5b0e9efd9f8b4757acac87eac48e3df7595ce15d08e650c0e8006999fe5e86d3', '2014', 0, '0000-00-00', 0, 'no_foto.jpg', '0', 'A', '', 'P', NULL, NULL, '', '0000-00-00', 'ISLAM', NULL, '', '', '', '', NULL, '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '0', '0', '0', NULL, '', '0', '0', '0', NULL, '', '', NULL, '', '', '', NULL, NULL, NULL, NULL, '0', NULL, '', '0', '', 'N', 'N', 0, NULL, '0000-00-00', '0.00', 0),
(55, '201421002', 4, '213131', 60202, 3, 'Ariviokta Putri Shifa Ambiya S', '201421002', 'b409e7a98ea7ac148281d519c568d290bcc82bf207c6e20e10824f2445bc2aca5b0e9efd9f8b4757acac87eac48e3df7595ce15d08e650c0e8006999fe5e86d3', '2014', 0, '0000-00-00', 0, 'no_foto.jpg', '0', 'A', '', 'P', NULL, NULL, '', '0000-00-00', 'ISLAM', NULL, '', '', '', '', NULL, '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '0', '0', '0', NULL, '', '0', '0', '0', NULL, '', '', NULL, '', '', '', NULL, NULL, NULL, NULL, '0', NULL, '', '0', '', 'N', 'N', 0, NULL, '0000-00-00', '0.00', 0),
(56, '201421005', 4, '213131', 60202, 3, 'Ely Siti Nurlaeli', '', 'cf83e1357eefb8bdf1542850d66d8007d620e4050b5715dc83f4a921d36ce9ce47d0d13c5d85f2b0ff8318d2877eec2f63b931bd47417a81a538327af927da3e', '2015', 0, '0000-00-00', 0, 'no_foto.jpg', '0', 'A', '', 'P', NULL, NULL, '', '0000-00-00', 'ISLAM', NULL, '', '', '', '', NULL, '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '0', '0', '0', NULL, '', '0', '0', '0', NULL, '', '', NULL, '', '', '', NULL, NULL, NULL, NULL, '0', NULL, '', '0', '', 'N', 'N', 0, NULL, '0000-00-00', '0.00', 0),
(57, '201421006', 4, '213131', 60202, 3, 'Euis Rahayu', '201421006', 'b409e7a98ea7ac148281d519c568d290bcc82bf207c6e20e10824f2445bc2aca5b0e9efd9f8b4757acac87eac48e3df7595ce15d08e650c0e8006999fe5e86d3', '2014', 0, '0000-00-00', 0, 'no_foto.jpg', '0', 'A', '', 'P', NULL, NULL, '', '0000-00-00', 'ISLAM', NULL, '', '', '', '', NULL, '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '0', '0', '0', NULL, '', '0', '0', '0', NULL, '', '', NULL, '', '', '', NULL, NULL, NULL, NULL, '0', NULL, '', '0', '', 'N', 'N', 0, NULL, '0000-00-00', '0.00', 0),
(58, '201421007', 4, '213131', 60202, 3, 'Hotimah', '201421007', 'b409e7a98ea7ac148281d519c568d290bcc82bf207c6e20e10824f2445bc2aca5b0e9efd9f8b4757acac87eac48e3df7595ce15d08e650c0e8006999fe5e86d3', '2014', 0, '0000-00-00', 0, 'no_foto.jpg', '0', 'A', '', 'P', NULL, NULL, '', '0000-00-00', 'ISLAM', NULL, '', '', '', '', NULL, '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '0', '0', '0', NULL, '', '0', '0', '0', NULL, '', '', NULL, '', '', '', NULL, NULL, NULL, NULL, '0', NULL, '', '0', '', 'N', 'N', 0, NULL, '0000-00-00', '0.00', 0),
(59, '201421008', 4, '213131', 60202, 3, 'Laelatul Fadilah', '201421008', 'b409e7a98ea7ac148281d519c568d290bcc82bf207c6e20e10824f2445bc2aca5b0e9efd9f8b4757acac87eac48e3df7595ce15d08e650c0e8006999fe5e86d3', '2014', 0, '0000-00-00', 0, 'no_foto.jpg', '0', 'A', '', 'P', NULL, NULL, '', '0000-00-00', 'ISLAM', NULL, '', '', '', '', NULL, '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '0', '0', '0', NULL, '', '0', '0', '0', NULL, '', '', NULL, '', '', '', NULL, NULL, NULL, NULL, '0', NULL, '', '0', '', 'N', 'N', 0, NULL, '0000-00-00', '0.00', 0),
(60, '201421009', 4, '213131', 60202, 3, 'Nadiah Sri Hidayati', '201421009', 'b409e7a98ea7ac148281d519c568d290bcc82bf207c6e20e10824f2445bc2aca5b0e9efd9f8b4757acac87eac48e3df7595ce15d08e650c0e8006999fe5e86d3', '2014', 0, '0000-00-00', 0, 'no_foto.jpg', '0', 'A', '', 'P', NULL, NULL, '', '0000-00-00', 'ISLAM', NULL, '', '', '', '', NULL, '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '0', '0', '0', NULL, '', '0', '0', '0', NULL, '', '', NULL, '', '', '', NULL, NULL, NULL, NULL, '0', NULL, '', '0', '', 'N', 'N', 0, NULL, '0000-00-00', '0.00', 0),
(61, '201421010', 4, '213131', 60202, 3, 'Nova Khoirunisa', '201421010', 'b409e7a98ea7ac148281d519c568d290bcc82bf207c6e20e10824f2445bc2aca5b0e9efd9f8b4757acac87eac48e3df7595ce15d08e650c0e8006999fe5e86d3', '2014', 0, '0000-00-00', 0, 'no_foto.jpg', '0', 'A', '', 'P', NULL, NULL, '', '0000-00-00', 'ISLAM', NULL, '', '', '', '', NULL, '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '0', '0', '0', NULL, '', '0', '0', '0', NULL, '', '', NULL, '', '', '', NULL, NULL, NULL, NULL, '0', NULL, '', '0', '', 'N', 'N', 0, NULL, '0000-00-00', '0.00', 0),
(62, '201421011', 4, '213131', 60202, 3, 'Renitha Purnamasari', '201421011', 'b409e7a98ea7ac148281d519c568d290bcc82bf207c6e20e10824f2445bc2aca5b0e9efd9f8b4757acac87eac48e3df7595ce15d08e650c0e8006999fe5e86d3', '2014', 0, '0000-00-00', 0, 'no_foto.jpg', '0', 'A', '', 'P', NULL, NULL, '', '0000-00-00', 'ISLAM', NULL, '', '', '', '', NULL, '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '0', '0', '0', NULL, '', '0', '0', '0', NULL, '', '', NULL, '', '', '', NULL, NULL, NULL, NULL, '0', NULL, '', '0', '', 'N', 'N', 0, NULL, '0000-00-00', '0.00', 0),
(63, '201421012', 4, '213131', 60202, 3, 'Tika Yuliani', '201421012', 'b409e7a98ea7ac148281d519c568d290bcc82bf207c6e20e10824f2445bc2aca5b0e9efd9f8b4757acac87eac48e3df7595ce15d08e650c0e8006999fe5e86d3', '2014', 0, '0000-00-00', 0, 'no_foto.jpg', '0', 'A', '', 'P', NULL, NULL, '', '0000-00-00', 'ISLAM', NULL, '', '', '', '', NULL, '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '0', '0', '0', NULL, '', '0', '0', '0', NULL, '', '', NULL, '', '', '', NULL, NULL, NULL, NULL, '0', NULL, '', '0', '', 'N', 'N', 0, NULL, '0000-00-00', '0.00', 0),
(64, '201421013', 4, '213131', 60202, 3, 'Wulan Aprianti', '201421013', 'b409e7a98ea7ac148281d519c568d290bcc82bf207c6e20e10824f2445bc2aca5b0e9efd9f8b4757acac87eac48e3df7595ce15d08e650c0e8006999fe5e86d3', '2014', 0, '0000-00-00', 0, 'no_foto.jpg', '0', 'A', '', 'P', NULL, NULL, '', '0000-00-00', 'ISLAM', NULL, '', '', '', '', NULL, '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '0', '0', '0', NULL, '', '0', '0', '0', NULL, '', '', NULL, '', '', '', NULL, NULL, NULL, NULL, '0', NULL, '', '0', '', 'N', 'N', 0, NULL, '0000-00-00', '0.00', 0),
(65, '201523001', 4, '213131', 60202, 3, 'Muhammad Rasyid Ridlo', '201523001', 'b409e7a98ea7ac148281d519c568d290bcc82bf207c6e20e10824f2445bc2aca5b0e9efd9f8b4757acac87eac48e3df7595ce15d08e650c0e8006999fe5e86d3', '2015', 0, '0000-00-00', 0, 'no_foto.jpg', 'P', 'A', '', 'L', NULL, NULL, '', '0000-00-00', 'ISLAM', NULL, '', '', '', '', NULL, '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '0', '0', '0', NULL, '', '0', '0', '0', NULL, '', '', NULL, '', '', '', NULL, NULL, NULL, NULL, '0', NULL, '', '0', '', 'N', 'N', 0, NULL, '0000-00-00', '0.00', 0),
(66, '201411003', 4, '213131', 86208, 3, 'Adi Luqman Prawira', '201411003', 'b409e7a98ea7ac148281d519c568d290bcc82bf207c6e20e10824f2445bc2aca5b0e9efd9f8b4757acac87eac48e3df7595ce15d08e650c0e8006999fe5e86d3', '2014', 0, '0000-00-00', 0, 'no_foto.jpg', '0', '', '', 'L', NULL, NULL, '', '0000-00-00', 'ISLAM', '0', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'N', 'N', 0, NULL, '0000-00-00', '0.00', 0),
(67, '201411007', 4, '213131', 86208, 3, 'Amalia Nuraeni Sudarya', '201411007', 'b409e7a98ea7ac148281d519c568d290bcc82bf207c6e20e10824f2445bc2aca5b0e9efd9f8b4757acac87eac48e3df7595ce15d08e650c0e8006999fe5e86d3', '2014', 0, '0000-00-00', 0, 'no_foto.jpg', '0', '', '', 'P', NULL, NULL, '', '0000-00-00', 'ISLAM', '0', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'N', 'N', 0, NULL, '0000-00-00', '0.00', 0),
(68, '201411009', 4, '213131', 86208, 3, 'Andre Maulana Fajar', '201411009', 'b409e7a98ea7ac148281d519c568d290bcc82bf207c6e20e10824f2445bc2aca5b0e9efd9f8b4757acac87eac48e3df7595ce15d08e650c0e8006999fe5e86d3', '2014', 0, '0000-00-00', 0, 'no_foto.jpg', '0', '', '', 'L', NULL, NULL, '', '0000-00-00', 'ISLAM', '0', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'N', 'N', 0, NULL, '0000-00-00', '0.00', 0),
(69, '201411012', 4, '213131', 86208, 3, 'Arif Abdurrazzaq', '201411012', 'b409e7a98ea7ac148281d519c568d290bcc82bf207c6e20e10824f2445bc2aca5b0e9efd9f8b4757acac87eac48e3df7595ce15d08e650c0e8006999fe5e86d3', '2014', 0, '0000-00-00', 0, 'no_foto.jpg', '0', '', '', 'L', NULL, NULL, '', '0000-00-00', 'ISLAM', '0', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'N', 'N', 0, NULL, '0000-00-00', '0.00', 0),
(70, '201411016', 4, '213131', 86208, 3, 'Asep Sunarya', '201411016', 'b409e7a98ea7ac148281d519c568d290bcc82bf207c6e20e10824f2445bc2aca5b0e9efd9f8b4757acac87eac48e3df7595ce15d08e650c0e8006999fe5e86d3', '2014', 0, '0000-00-00', 0, 'no_foto.jpg', '0', '', '', 'L', NULL, NULL, '', '0000-00-00', 'ISLAM', '0', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'N', 'N', 0, NULL, '0000-00-00', '0.00', 0),
(71, '201411018', 4, '213131', 86208, 3, 'Asna Nauli Rahmah', '201411018', 'b409e7a98ea7ac148281d519c568d290bcc82bf207c6e20e10824f2445bc2aca5b0e9efd9f8b4757acac87eac48e3df7595ce15d08e650c0e8006999fe5e86d3', '2014', 0, '0000-00-00', 0, 'no_foto.jpg', '0', '', '', 'P', NULL, NULL, '', '0000-00-00', 'ISLAM', '0', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'N', 'N', 0, NULL, '0000-00-00', '0.00', 0),
(72, '201411019', 4, '213131', 86208, 3, 'Ayu Rahayu', '201411019', 'b409e7a98ea7ac148281d519c568d290bcc82bf207c6e20e10824f2445bc2aca5b0e9efd9f8b4757acac87eac48e3df7595ce15d08e650c0e8006999fe5e86d3', '2014', 0, '0000-00-00', 0, 'no_foto.jpg', '0', '', '', 'P', NULL, NULL, '', '0000-00-00', 'ISLAM', '0', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'N', 'N', 0, NULL, '0000-00-00', '0.00', 0),
(73, '201411020', 4, '213131', 86208, 3, 'Azzahra Siti Khadijah', '201411020', 'b409e7a98ea7ac148281d519c568d290bcc82bf207c6e20e10824f2445bc2aca5b0e9efd9f8b4757acac87eac48e3df7595ce15d08e650c0e8006999fe5e86d3', '2014', 0, '0000-00-00', 0, 'no_foto.jpg', '0', '', '', 'P', NULL, NULL, '', '0000-00-00', 'ISLAM', '0', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'N', 'N', 0, NULL, '0000-00-00', '0.00', 0),
(74, '201411027', 4, '213131', 86208, 3, 'Dadi Sunandar', '201411027', 'b409e7a98ea7ac148281d519c568d290bcc82bf207c6e20e10824f2445bc2aca5b0e9efd9f8b4757acac87eac48e3df7595ce15d08e650c0e8006999fe5e86d3', '2014', 0, '0000-00-00', 0, 'no_foto.jpg', '0', '', '', 'L', NULL, NULL, '', '0000-00-00', 'ISLAM', '0', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'N', 'N', 0, NULL, '0000-00-00', '0.00', 0),
(75, '201411029', 4, '213131', 86208, 3, 'Dede Ahmad Maki', '201411029', 'b409e7a98ea7ac148281d519c568d290bcc82bf207c6e20e10824f2445bc2aca5b0e9efd9f8b4757acac87eac48e3df7595ce15d08e650c0e8006999fe5e86d3', '2014', 0, '0000-00-00', 0, 'no_foto.jpg', '0', '', '', 'L', NULL, NULL, '', '0000-00-00', 'ISLAM', '0', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'N', 'N', 0, NULL, '0000-00-00', '0.00', 0),
(76, '201411030', 4, '213131', 86208, 3, 'Dede Nuralami', '201411030', 'b409e7a98ea7ac148281d519c568d290bcc82bf207c6e20e10824f2445bc2aca5b0e9efd9f8b4757acac87eac48e3df7595ce15d08e650c0e8006999fe5e86d3', '2014', 0, '0000-00-00', 0, 'no_foto.jpg', '0', '', '', 'L', NULL, NULL, '', '0000-00-00', 'ISLAM', '0', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'N', 'N', 0, NULL, '0000-00-00', '0.00', 0),
(77, '201411037', 4, '213131', 86208, 3, 'Eri Jafar Sidik', '201411037', 'b409e7a98ea7ac148281d519c568d290bcc82bf207c6e20e10824f2445bc2aca5b0e9efd9f8b4757acac87eac48e3df7595ce15d08e650c0e8006999fe5e86d3', '2014', 0, '0000-00-00', 0, 'no_foto.jpg', '0', '', '', 'L', NULL, NULL, '', '0000-00-00', 'ISLAM', '0', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'N', 'N', 0, NULL, '0000-00-00', '0.00', 0),
(78, '201411038', 4, '213131', 86208, 3, 'Euis Siti Mukhlisoh', '201411038', 'b409e7a98ea7ac148281d519c568d290bcc82bf207c6e20e10824f2445bc2aca5b0e9efd9f8b4757acac87eac48e3df7595ce15d08e650c0e8006999fe5e86d3', '2014', 0, '0000-00-00', 0, 'no_foto.jpg', '0', '', '', 'P', NULL, NULL, '', '0000-00-00', 'ISLAM', '0', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'N', 'N', 0, NULL, '0000-00-00', '0.00', 0),
(79, '201411042', 4, '213131', 86208, 3, 'Gandy Riyana', '201411042', 'b409e7a98ea7ac148281d519c568d290bcc82bf207c6e20e10824f2445bc2aca5b0e9efd9f8b4757acac87eac48e3df7595ce15d08e650c0e8006999fe5e86d3', '2014', 0, '0000-00-00', 0, 'no_foto.jpg', '0', '', '', 'L', NULL, NULL, '', '0000-00-00', 'ISLAM', '0', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'N', 'N', 0, NULL, '0000-00-00', '0.00', 0),
(80, '201411047', 4, '213131', 86208, 3, 'Heni Rusmiati', '201411047', 'b409e7a98ea7ac148281d519c568d290bcc82bf207c6e20e10824f2445bc2aca5b0e9efd9f8b4757acac87eac48e3df7595ce15d08e650c0e8006999fe5e86d3', '2014', 0, '0000-00-00', 0, 'no_foto.jpg', '0', '', '', 'P', NULL, NULL, '', '0000-00-00', 'ISLAM', '0', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'N', 'N', 0, NULL, '0000-00-00', '0.00', 0),
(81, '201411053', 4, '213131', 86208, 3, 'Jajang Ahmad Syafi''i', '201411053', 'b409e7a98ea7ac148281d519c568d290bcc82bf207c6e20e10824f2445bc2aca5b0e9efd9f8b4757acac87eac48e3df7595ce15d08e650c0e8006999fe5e86d3', '2014', 0, '0000-00-00', 0, 'no_foto.jpg', '0', '', '', 'L', NULL, NULL, '', '0000-00-00', 'ISLAM', '0', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'N', 'N', 0, NULL, '0000-00-00', '0.00', 0),
(82, '201411054', 4, '213131', 86208, 3, 'Jejen Zaenudin Hamzah', '201411054', 'b409e7a98ea7ac148281d519c568d290bcc82bf207c6e20e10824f2445bc2aca5b0e9efd9f8b4757acac87eac48e3df7595ce15d08e650c0e8006999fe5e86d3', '2014', 0, '0000-00-00', 0, 'no_foto.jpg', '0', '', '', 'L', NULL, NULL, '', '0000-00-00', 'ISLAM', '0', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'N', 'N', 0, NULL, '0000-00-00', '0.00', 0),
(83, '201411060', 4, '213131', 86208, 3, 'Milah Jamilah', '201411060', 'b409e7a98ea7ac148281d519c568d290bcc82bf207c6e20e10824f2445bc2aca5b0e9efd9f8b4757acac87eac48e3df7595ce15d08e650c0e8006999fe5e86d3', '2014', 0, '0000-00-00', 0, 'no_foto.jpg', '0', '', '', 'P', NULL, NULL, '', '0000-00-00', 'ISLAM', '0', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'N', 'N', 0, NULL, '0000-00-00', '0.00', 0),
(84, '201411062', 4, '213131', 86208, 3, 'Muhammad Ilham Aliyudin', '201411062', 'b409e7a98ea7ac148281d519c568d290bcc82bf207c6e20e10824f2445bc2aca5b0e9efd9f8b4757acac87eac48e3df7595ce15d08e650c0e8006999fe5e86d3', '2014', 0, '0000-00-00', 0, 'no_foto.jpg', '0', '', '', 'L', NULL, NULL, '', '0000-00-00', 'ISLAM', '0', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'N', 'N', 0, NULL, '0000-00-00', '0.00', 0),
(85, '201411064', 4, '213131', 86208, 3, 'Najiya Ulfa Mashlahat', '201411064', 'b409e7a98ea7ac148281d519c568d290bcc82bf207c6e20e10824f2445bc2aca5b0e9efd9f8b4757acac87eac48e3df7595ce15d08e650c0e8006999fe5e86d3', '2014', 0, '0000-00-00', 0, 'no_foto.jpg', '0', '', '', 'P', NULL, NULL, '', '0000-00-00', 'ISLAM', '0', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'N', 'N', 0, NULL, '0000-00-00', '0.00', 0),
(86, '201411067', 4, '213131', 86208, 3, 'Nining Suryani', '201411067', 'b409e7a98ea7ac148281d519c568d290bcc82bf207c6e20e10824f2445bc2aca5b0e9efd9f8b4757acac87eac48e3df7595ce15d08e650c0e8006999fe5e86d3', '2014', 0, '0000-00-00', 0, 'no_foto.jpg', '0', '', '', 'P', NULL, NULL, '', '0000-00-00', 'ISLAM', '0', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'N', 'N', 0, NULL, '0000-00-00', '0.00', 0);
INSERT INTO `mahasiswa` (`ID`, `NIM`, `id_level`, `Identitas_ID`, `Jurusan_ID`, `Program_ID`, `Nama`, `username`, `password`, `Angkatan`, `Tahun_ID`, `TglSKMasuk`, `Kurikulum_ID`, `foto`, `StatusAwal_ID`, `StatusMhsw_ID`, `PenasehatAkademik`, `Kelamin`, `WargaNegara`, `Kebangsaan`, `TempatLahir`, `TanggalLahir`, `Agama`, `StatusSipil`, `Alamat`, `Kota`, `RT`, `RW`, `KodePos`, `Propinsi`, `Negara`, `Telepon`, `Handphone`, `Email`, `AlamatAsal`, `KotaAsal`, `RTAsal`, `RWAsal`, `KodePosAsal`, `PropinsiAsal`, `NegaraAsal`, `NamaAyah`, `AgamaAyah`, `PendidikanAyah`, `PekerjaanAyah`, `HidupAyah`, `NamaIbu`, `AgamaIbu`, `PendidikanIbu`, `PekerjaanIbu`, `HidupIbu`, `AlamatOrtu`, `KotaOrtu`, `KodePosOrtu`, `PropinsiOrtu`, `NegaraOrtu`, `TeleponOrtu`, `HandphoneOrtu`, `EmailOrtu`, `AsalSekolah`, `AsalSekolah1`, `JenisSekolah`, `KotaSekolah`, `JurusanSekolah_ID`, `NilaiSekolah`, `TahunLulus`, `aktif`, `LulusUjian`, `NilaiUjian`, `GradeNilai`, `TanggalLulus`, `IPK`, `TotalSKS`) VALUES
(87, '201411069', 4, '213131', 86208, 3, 'Nurhasiah', '201411069', 'b409e7a98ea7ac148281d519c568d290bcc82bf207c6e20e10824f2445bc2aca5b0e9efd9f8b4757acac87eac48e3df7595ce15d08e650c0e8006999fe5e86d3', '2014', 0, '0000-00-00', 0, 'no_foto.jpg', '0', '', '', 'P', NULL, NULL, '', '0000-00-00', 'ISLAM', '0', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'N', 'N', 0, NULL, '0000-00-00', '0.00', 0),
(88, '201411070', 4, '213131', 86208, 3, 'Nurmala', '201411070', 'b409e7a98ea7ac148281d519c568d290bcc82bf207c6e20e10824f2445bc2aca5b0e9efd9f8b4757acac87eac48e3df7595ce15d08e650c0e8006999fe5e86d3', '2014', 0, '0000-00-00', 0, 'no_foto.jpg', '0', '', '', 'P', NULL, NULL, '', '0000-00-00', 'ISLAM', '0', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'N', 'N', 0, NULL, '0000-00-00', '0.00', 0),
(89, '201411071', 4, '213131', 86208, 3, 'Nurul Syarifatu Nisa', '201411071', 'b409e7a98ea7ac148281d519c568d290bcc82bf207c6e20e10824f2445bc2aca5b0e9efd9f8b4757acac87eac48e3df7595ce15d08e650c0e8006999fe5e86d3', '2014', 0, '0000-00-00', 0, 'no_foto.jpg', '0', '', '', 'P', NULL, NULL, '', '0000-00-00', 'ISLAM', '0', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'N', 'N', 0, NULL, '0000-00-00', '0.00', 0),
(90, '201411077', 4, '213131', 86208, 3, 'Rita Siti Nurjanah', '201411077', 'b409e7a98ea7ac148281d519c568d290bcc82bf207c6e20e10824f2445bc2aca5b0e9efd9f8b4757acac87eac48e3df7595ce15d08e650c0e8006999fe5e86d3', '2014', 0, '0000-00-00', 0, 'no_foto.jpg', '0', '', '', 'P', NULL, NULL, '', '0000-00-00', 'ISLAM', '0', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'N', 'N', 0, NULL, '0000-00-00', '0.00', 0),
(91, '201411078', 4, '213131', 86208, 3, 'Rizwan Nur Alamsyah', '201411078', 'b409e7a98ea7ac148281d519c568d290bcc82bf207c6e20e10824f2445bc2aca5b0e9efd9f8b4757acac87eac48e3df7595ce15d08e650c0e8006999fe5e86d3', '2014', 0, '0000-00-00', 0, 'no_foto.jpg', '0', '', '', 'L', NULL, NULL, '', '0000-00-00', 'ISLAM', '0', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'N', 'N', 0, NULL, '0000-00-00', '0.00', 0),
(92, '201411080', 4, '213131', 86208, 3, 'Selawati Dewi', '201411080', 'b409e7a98ea7ac148281d519c568d290bcc82bf207c6e20e10824f2445bc2aca5b0e9efd9f8b4757acac87eac48e3df7595ce15d08e650c0e8006999fe5e86d3', '2014', 0, '0000-00-00', 0, 'no_foto.jpg', '0', '', '', 'P', NULL, NULL, '', '0000-00-00', 'ISLAM', '0', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'N', 'N', 0, NULL, '0000-00-00', '0.00', 0),
(93, '201411089', 4, '213131', 86208, 3, 'Sri Farida', '201411089', 'b409e7a98ea7ac148281d519c568d290bcc82bf207c6e20e10824f2445bc2aca5b0e9efd9f8b4757acac87eac48e3df7595ce15d08e650c0e8006999fe5e86d3', '2014', 0, '0000-00-00', 0, 'no_foto.jpg', '0', '', '', 'P', NULL, NULL, '', '0000-00-00', 'ISLAM', '0', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'N', 'N', 0, NULL, '0000-00-00', '0.00', 0),
(94, '201411084', 4, '213131', 86208, 3, 'Sri Wahyuningsih', '201411084', 'b409e7a98ea7ac148281d519c568d290bcc82bf207c6e20e10824f2445bc2aca5b0e9efd9f8b4757acac87eac48e3df7595ce15d08e650c0e8006999fe5e86d3', '2014', 0, '0000-00-00', 0, 'no_foto.jpg', '0', '', '', 'P', NULL, NULL, '', '0000-00-00', 'ISLAM', '0', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'N', 'N', 0, NULL, '0000-00-00', '0.00', 0),
(95, '201411089', 4, '213131', 86208, 3, 'Virda Susilawati', '201411089', 'b409e7a98ea7ac148281d519c568d290bcc82bf207c6e20e10824f2445bc2aca5b0e9efd9f8b4757acac87eac48e3df7595ce15d08e650c0e8006999fe5e86d3', '2014', 0, '0000-00-00', 0, 'no_foto.jpg', '0', '', '', 'P', NULL, NULL, '', '0000-00-00', 'ISLAM', '0', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'N', 'N', 0, NULL, '0000-00-00', '0.00', 0),
(96, '201411091', 4, '213131', 86208, 3, 'Vita Suci Agustine Suherman', '201411091', 'b409e7a98ea7ac148281d519c568d290bcc82bf207c6e20e10824f2445bc2aca5b0e9efd9f8b4757acac87eac48e3df7595ce15d08e650c0e8006999fe5e86d3', '2014', 0, '0000-00-00', 0, 'no_foto.jpg', '0', '', '', 'P', NULL, NULL, '', '0000-00-00', 'ISLAM', '0', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'N', 'N', 0, NULL, '0000-00-00', '0.00', 0),
(97, '201411061', 4, '213131', 86208, 3, 'Muhamad Trian Maulana Gifar S', '201411061', 'b409e7a98ea7ac148281d519c568d290bcc82bf207c6e20e10824f2445bc2aca5b0e9efd9f8b4757acac87eac48e3df7595ce15d08e650c0e8006999fe5e86d3', '2014', 0, '0000-00-00', 0, 'no_foto.jpg', '0', '', '', 'L', NULL, NULL, '', '0000-00-00', 'ISLAM', '0', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'N', 'N', 0, NULL, '0000-00-00', '0.00', 0),
(98, '201311001', 4, '213131', 86208, 3, 'Abdul Aziz Algani', '201311001', 'b409e7a98ea7ac148281d519c568d290bcc82bf207c6e20e10824f2445bc2aca5b0e9efd9f8b4757acac87eac48e3df7595ce15d08e650c0e8006999fe5e86d3', '2013', 0, '0000-00-00', 0, 'no_foto.jpg', '0', '', '', 'L', NULL, NULL, '', '0000-00-00', 'ISLAM', '0', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'N', 'N', 0, NULL, '0000-00-00', '0.00', 0),
(99, '201311003', 4, '213131', 86208, 3, 'Acep Saepudin', '201311003', 'b409e7a98ea7ac148281d519c568d290bcc82bf207c6e20e10824f2445bc2aca5b0e9efd9f8b4757acac87eac48e3df7595ce15d08e650c0e8006999fe5e86d3', '2013', 0, '0000-00-00', 0, 'no_foto.jpg', '0', '', '', 'L', NULL, NULL, '', '0000-00-00', 'ISLAM', '0', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'N', 'N', 0, NULL, '0000-00-00', '0.00', 0),
(100, '201311004', 4, '213131', 86208, 3, 'Agus Abdurrochman', '201311004', 'b409e7a98ea7ac148281d519c568d290bcc82bf207c6e20e10824f2445bc2aca5b0e9efd9f8b4757acac87eac48e3df7595ce15d08e650c0e8006999fe5e86d3', '2013', 0, '0000-00-00', 0, 'no_foto.jpg', '0', '', '', 'L', NULL, NULL, '', '0000-00-00', 'ISLAM', '0', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'N', 'N', 0, NULL, '0000-00-00', '0.00', 0),
(101, '201311005', 4, '213131', 86208, 3, 'Agus Firmansyah', '201311005', 'b409e7a98ea7ac148281d519c568d290bcc82bf207c6e20e10824f2445bc2aca5b0e9efd9f8b4757acac87eac48e3df7595ce15d08e650c0e8006999fe5e86d3', '2013', 0, '0000-00-00', 0, 'no_foto.jpg', '0', '', '', 'L', NULL, NULL, '', '0000-00-00', 'ISLAM', '0', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'N', 'N', 0, NULL, '0000-00-00', '0.00', 0),
(102, '201311012', 4, '213131', 86208, 3, 'Asep Nopianto', '201311012', 'b409e7a98ea7ac148281d519c568d290bcc82bf207c6e20e10824f2445bc2aca5b0e9efd9f8b4757acac87eac48e3df7595ce15d08e650c0e8006999fe5e86d3', '2013', 0, '0000-00-00', 0, 'no_foto.jpg', '0', '', '', 'L', NULL, NULL, '', '0000-00-00', 'ISLAM', '0', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'N', 'N', 0, NULL, '0000-00-00', '0.00', 0),
(103, '201311013', 4, '213131', 86208, 3, 'Asep Rijal', '201311013', 'b409e7a98ea7ac148281d519c568d290bcc82bf207c6e20e10824f2445bc2aca5b0e9efd9f8b4757acac87eac48e3df7595ce15d08e650c0e8006999fe5e86d3', '2013', 0, '0000-00-00', 0, 'no_foto.jpg', '0', '', '', 'L', NULL, NULL, '', '0000-00-00', 'ISLAM', '0', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'N', 'N', 0, NULL, '0000-00-00', '0.00', 0),
(104, '201311018', 4, '213131', 86208, 3, 'Cicin Kuraesin', '201311018', 'b409e7a98ea7ac148281d519c568d290bcc82bf207c6e20e10824f2445bc2aca5b0e9efd9f8b4757acac87eac48e3df7595ce15d08e650c0e8006999fe5e86d3', '2013', 0, '0000-00-00', 0, 'no_foto.jpg', '0', '', '', 'P', NULL, NULL, '', '0000-00-00', 'ISLAM', '0', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'N', 'N', 0, NULL, '0000-00-00', '0.00', 0),
(105, '201311020', 4, '213131', 86208, 3, 'Dadan Syahidin', '201311020', 'b409e7a98ea7ac148281d519c568d290bcc82bf207c6e20e10824f2445bc2aca5b0e9efd9f8b4757acac87eac48e3df7595ce15d08e650c0e8006999fe5e86d3', '2013', 0, '0000-00-00', 0, 'no_foto.jpg', '0', '', '', 'L', NULL, NULL, '', '0000-00-00', 'ISLAM', '0', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'N', 'N', 0, NULL, '0000-00-00', '0.00', 0),
(106, '201311022', 4, '213131', 86208, 3, 'Danila Pirman Permara', '201311022', 'b409e7a98ea7ac148281d519c568d290bcc82bf207c6e20e10824f2445bc2aca5b0e9efd9f8b4757acac87eac48e3df7595ce15d08e650c0e8006999fe5e86d3', '2013', 0, '0000-00-00', 0, 'no_foto.jpg', '0', '', '', 'L', NULL, NULL, '', '0000-00-00', 'ISLAM', '0', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'N', 'N', 0, NULL, '0000-00-00', '0.00', 0),
(107, '201311023', 4, '213131', 86208, 3, 'Dapid', '201311023', 'b409e7a98ea7ac148281d519c568d290bcc82bf207c6e20e10824f2445bc2aca5b0e9efd9f8b4757acac87eac48e3df7595ce15d08e650c0e8006999fe5e86d3', '2013', 0, '0000-00-00', 0, 'no_foto.jpg', '0', '', '', 'L', NULL, NULL, '', '0000-00-00', 'ISLAM', '0', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'N', 'N', 0, NULL, '0000-00-00', '0.00', 0),
(108, '201311025', 4, '213131', 86208, 3, 'Dede Tatang Abdulah', '201311025', 'b409e7a98ea7ac148281d519c568d290bcc82bf207c6e20e10824f2445bc2aca5b0e9efd9f8b4757acac87eac48e3df7595ce15d08e650c0e8006999fe5e86d3', '2013', 0, '0000-00-00', 0, 'no_foto.jpg', '0', '', '', 'L', NULL, NULL, '', '0000-00-00', 'ISLAM', '0', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'N', 'N', 0, NULL, '0000-00-00', '0.00', 0),
(109, '201311027', 4, '213131', 86208, 3, 'Desi Arisma', '201311027', 'b409e7a98ea7ac148281d519c568d290bcc82bf207c6e20e10824f2445bc2aca5b0e9efd9f8b4757acac87eac48e3df7595ce15d08e650c0e8006999fe5e86d3', '2013', 0, '0000-00-00', 0, 'no_foto.jpg', '0', '', '', 'P', NULL, NULL, '', '0000-00-00', 'ISLAM', '0', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'N', 'N', 0, NULL, '0000-00-00', '0.00', 0),
(110, '201311033', 4, '213131', 86208, 3, 'Fauzya Romdoniah', '201311033', 'b409e7a98ea7ac148281d519c568d290bcc82bf207c6e20e10824f2445bc2aca5b0e9efd9f8b4757acac87eac48e3df7595ce15d08e650c0e8006999fe5e86d3', '2013', 0, '0000-00-00', 0, 'no_foto.jpg', '0', '', '', 'P', NULL, NULL, '', '0000-00-00', 'ISLAM', '0', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'N', 'N', 0, NULL, '0000-00-00', '0.00', 0),
(111, '201311037', 4, '213131', 86208, 3, 'Harun Abdurrahman', '201311037', 'b409e7a98ea7ac148281d519c568d290bcc82bf207c6e20e10824f2445bc2aca5b0e9efd9f8b4757acac87eac48e3df7595ce15d08e650c0e8006999fe5e86d3', '2013', 0, '0000-00-00', 0, 'no_foto.jpg', '0', '', '', 'L', NULL, NULL, '', '0000-00-00', 'ISLAM', '0', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'N', 'N', 0, NULL, '0000-00-00', '0.00', 0),
(112, '201311042', 4, '213131', 86208, 3, 'Ika Sopiatul Kamilah', '201311042', 'b409e7a98ea7ac148281d519c568d290bcc82bf207c6e20e10824f2445bc2aca5b0e9efd9f8b4757acac87eac48e3df7595ce15d08e650c0e8006999fe5e86d3', '2013', 0, '0000-00-00', 0, 'no_foto.jpg', '0', '', '', 'P', NULL, NULL, '', '0000-00-00', 'ISLAM', '0', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'N', 'N', 0, NULL, '0000-00-00', '0.00', 0),
(113, '201311045', 4, '213131', 86208, 3, 'Imas Puriyanti Dewi', '201311045', 'b409e7a98ea7ac148281d519c568d290bcc82bf207c6e20e10824f2445bc2aca5b0e9efd9f8b4757acac87eac48e3df7595ce15d08e650c0e8006999fe5e86d3', '2013', 0, '0000-00-00', 0, 'no_foto.jpg', '0', '', '', 'P', NULL, NULL, '', '0000-00-00', 'ISLAM', '0', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'N', 'N', 0, NULL, '0000-00-00', '0.00', 0),
(114, '201311046', 4, '213131', 86208, 3, 'Imas Siti Faujiah', '201311046', 'b409e7a98ea7ac148281d519c568d290bcc82bf207c6e20e10824f2445bc2aca5b0e9efd9f8b4757acac87eac48e3df7595ce15d08e650c0e8006999fe5e86d3', '2013', 0, '0000-00-00', 0, 'no_foto.jpg', '0', '', '', 'P', NULL, NULL, '', '0000-00-00', 'ISLAM', '0', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'N', 'N', 0, NULL, '0000-00-00', '0.00', 0),
(115, '201311048', 4, '213131', 86208, 3, 'Ledya Nida Fauziah', '201311048', 'b409e7a98ea7ac148281d519c568d290bcc82bf207c6e20e10824f2445bc2aca5b0e9efd9f8b4757acac87eac48e3df7595ce15d08e650c0e8006999fe5e86d3', '2013', 0, '0000-00-00', 0, 'no_foto.jpg', '0', '', '', 'P', NULL, NULL, '', '0000-00-00', 'ISLAM', '0', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'N', 'N', 0, NULL, '0000-00-00', '0.00', 0),
(116, '201311050', 4, '213131', 86208, 3, 'Lisda Lestari', '201311050', 'b409e7a98ea7ac148281d519c568d290bcc82bf207c6e20e10824f2445bc2aca5b0e9efd9f8b4757acac87eac48e3df7595ce15d08e650c0e8006999fe5e86d3', '2013', 0, '0000-00-00', 0, 'no_foto.jpg', '0', '', '', 'P', NULL, NULL, '', '0000-00-00', 'ISLAM', '0', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'N', 'N', 0, NULL, '0000-00-00', '0.00', 0),
(117, '201311051', 4, '213131', 86208, 3, 'M.Fathul Khoir', '201311051', 'b409e7a98ea7ac148281d519c568d290bcc82bf207c6e20e10824f2445bc2aca5b0e9efd9f8b4757acac87eac48e3df7595ce15d08e650c0e8006999fe5e86d3', '2013', 0, '0000-00-00', 0, 'no_foto.jpg', '0', '', '', 'L', NULL, NULL, '', '0000-00-00', 'ISLAM', '0', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'N', 'N', 0, NULL, '0000-00-00', '0.00', 0),
(118, '201311052', 4, '213131', 86208, 3, 'M.Wahid Khoerrudin', '201311052', 'b409e7a98ea7ac148281d519c568d290bcc82bf207c6e20e10824f2445bc2aca5b0e9efd9f8b4757acac87eac48e3df7595ce15d08e650c0e8006999fe5e86d3', '2013', 0, '0000-00-00', 0, 'no_foto.jpg', '0', '', '', 'L', NULL, NULL, '', '0000-00-00', 'ISLAM', '0', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'N', 'N', 0, NULL, '0000-00-00', '0.00', 0),
(119, '201311055', 4, '213131', 86208, 3, 'Maratus Solihah', '201311055', 'b409e7a98ea7ac148281d519c568d290bcc82bf207c6e20e10824f2445bc2aca5b0e9efd9f8b4757acac87eac48e3df7595ce15d08e650c0e8006999fe5e86d3', '2013', 0, '0000-00-00', 0, 'no_foto.jpg', '0', '', '', 'P', NULL, NULL, '', '0000-00-00', 'ISLAM', '0', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'N', 'N', 0, NULL, '0000-00-00', '0.00', 0),
(120, '201311056', 4, '213131', 86208, 3, 'Mira Januarita Permatasari', '201311056', 'b409e7a98ea7ac148281d519c568d290bcc82bf207c6e20e10824f2445bc2aca5b0e9efd9f8b4757acac87eac48e3df7595ce15d08e650c0e8006999fe5e86d3', '2013', 0, '0000-00-00', 0, 'no_foto.jpg', '0', '', '', 'P', NULL, NULL, '', '0000-00-00', 'ISLAM', '0', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'N', 'N', 0, NULL, '0000-00-00', '0.00', 0),
(121, '201311058', 4, '213131', 86208, 3, 'Muhammad Maksum M.', '201311058', 'b409e7a98ea7ac148281d519c568d290bcc82bf207c6e20e10824f2445bc2aca5b0e9efd9f8b4757acac87eac48e3df7595ce15d08e650c0e8006999fe5e86d3', '2013', 0, '0000-00-00', 0, 'no_foto.jpg', '0', '', '', 'L', NULL, NULL, '', '0000-00-00', 'ISLAM', '0', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'N', 'N', 0, NULL, '0000-00-00', '0.00', 0),
(122, '201311059', 4, '213131', 86208, 3, 'Munawar Ali Rosidina', '201311059', 'b409e7a98ea7ac148281d519c568d290bcc82bf207c6e20e10824f2445bc2aca5b0e9efd9f8b4757acac87eac48e3df7595ce15d08e650c0e8006999fe5e86d3', '2013', 0, '0000-00-00', 0, 'no_foto.jpg', '0', '', '', 'L', NULL, NULL, '', '0000-00-00', 'ISLAM', '0', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'N', 'N', 0, NULL, '0000-00-00', '0.00', 0),
(123, '201311063', 4, '213131', 86208, 3, 'Nelly Sri Hayati', '201311063', 'b409e7a98ea7ac148281d519c568d290bcc82bf207c6e20e10824f2445bc2aca5b0e9efd9f8b4757acac87eac48e3df7595ce15d08e650c0e8006999fe5e86d3', '2013', 0, '0000-00-00', 0, 'no_foto.jpg', '0', '', '', 'P', NULL, NULL, '', '0000-00-00', 'ISLAM', '0', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'N', 'N', 0, NULL, '0000-00-00', '0.00', 0),
(124, '201311064', 4, '213131', 86208, 3, 'Nenden Yunengsih', '201311064', 'b409e7a98ea7ac148281d519c568d290bcc82bf207c6e20e10824f2445bc2aca5b0e9efd9f8b4757acac87eac48e3df7595ce15d08e650c0e8006999fe5e86d3', '2013', 0, '0000-00-00', 0, 'no_foto.jpg', '0', '', '', 'P', NULL, NULL, '', '0000-00-00', 'ISLAM', '0', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'N', 'N', 0, NULL, '0000-00-00', '0.00', 0),
(125, '201311065', 4, '213131', 86208, 3, 'Neni Naimah Parhani', '201311065', 'b409e7a98ea7ac148281d519c568d290bcc82bf207c6e20e10824f2445bc2aca5b0e9efd9f8b4757acac87eac48e3df7595ce15d08e650c0e8006999fe5e86d3', '2013', 0, '0000-00-00', 0, 'no_foto.jpg', '0', '', '', 'P', NULL, NULL, '', '0000-00-00', 'ISLAM', '0', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'N', 'N', 0, NULL, '0000-00-00', '0.00', 0),
(126, '201311068', 4, '213131', 86208, 3, 'Oning Runingsih', '201311068', 'b409e7a98ea7ac148281d519c568d290bcc82bf207c6e20e10824f2445bc2aca5b0e9efd9f8b4757acac87eac48e3df7595ce15d08e650c0e8006999fe5e86d3', '2013', 0, '0000-00-00', 0, 'no_foto.jpg', '0', '', '', 'P', NULL, NULL, '', '0000-00-00', 'ISLAM', '0', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'N', 'N', 0, NULL, '0000-00-00', '0.00', 0),
(127, '201311072', 4, '213131', 86208, 3, 'Pupung Purwanti', '201311072', 'b409e7a98ea7ac148281d519c568d290bcc82bf207c6e20e10824f2445bc2aca5b0e9efd9f8b4757acac87eac48e3df7595ce15d08e650c0e8006999fe5e86d3', '2013', 0, '0000-00-00', 0, 'no_foto.jpg', '0', '', '', 'P', NULL, NULL, '', '0000-00-00', 'ISLAM', '0', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'N', 'N', 0, NULL, '0000-00-00', '0.00', 0),
(128, '201311077', 4, '213131', 86208, 3, 'Saepul Wahidin', '201311077', 'b409e7a98ea7ac148281d519c568d290bcc82bf207c6e20e10824f2445bc2aca5b0e9efd9f8b4757acac87eac48e3df7595ce15d08e650c0e8006999fe5e86d3', '2013', 0, '0000-00-00', 0, 'no_foto.jpg', '0', '', '', 'L', NULL, NULL, '', '0000-00-00', 'ISLAM', '0', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'N', 'N', 0, NULL, '0000-00-00', '0.00', 0),
(129, '201311078', 4, '213131', 86208, 3, 'Salsabila Neinda Nurdyani', '201311078', 'b409e7a98ea7ac148281d519c568d290bcc82bf207c6e20e10824f2445bc2aca5b0e9efd9f8b4757acac87eac48e3df7595ce15d08e650c0e8006999fe5e86d3', '2013', 0, '0000-00-00', 0, 'no_foto.jpg', '0', '', '', 'P', NULL, NULL, '', '0000-00-00', 'ISLAM', '0', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'N', 'N', 0, NULL, '0000-00-00', '0.00', 0),
(130, '201311079', 4, '213131', 86208, 3, 'Sandi Karyana', '201311079', 'b409e7a98ea7ac148281d519c568d290bcc82bf207c6e20e10824f2445bc2aca5b0e9efd9f8b4757acac87eac48e3df7595ce15d08e650c0e8006999fe5e86d3', '2013', 0, '0000-00-00', 0, 'no_foto.jpg', '0', '', '', 'L', NULL, NULL, '', '0000-00-00', 'ISLAM', '0', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'N', 'N', 0, NULL, '0000-00-00', '0.00', 0),
(131, '201311084', 4, '213131', 86208, 3, 'Siti Maslahah M', '201311084', 'b409e7a98ea7ac148281d519c568d290bcc82bf207c6e20e10824f2445bc2aca5b0e9efd9f8b4757acac87eac48e3df7595ce15d08e650c0e8006999fe5e86d3', '2013', 0, '0000-00-00', 0, 'no_foto.jpg', '0', '', '', 'P', NULL, NULL, '', '0000-00-00', 'ISLAM', '0', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'N', 'N', 0, NULL, '0000-00-00', '0.00', 0),
(132, '201311086', 4, '213131', 86208, 3, 'Siti Nurhalimah', '201311086', 'b409e7a98ea7ac148281d519c568d290bcc82bf207c6e20e10824f2445bc2aca5b0e9efd9f8b4757acac87eac48e3df7595ce15d08e650c0e8006999fe5e86d3', '2013', 0, '0000-00-00', 0, 'no_foto.jpg', '0', '', '', 'P', NULL, NULL, '', '0000-00-00', 'ISLAM', '0', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'N', 'N', 0, NULL, '0000-00-00', '0.00', 0),
(133, '201311087', 4, '213131', 86208, 3, 'Siti Rofifah', '201311087', 'b409e7a98ea7ac148281d519c568d290bcc82bf207c6e20e10824f2445bc2aca5b0e9efd9f8b4757acac87eac48e3df7595ce15d08e650c0e8006999fe5e86d3', '2013', 0, '0000-00-00', 0, 'no_foto.jpg', '0', '', '', 'P', NULL, NULL, '', '0000-00-00', 'ISLAM', '0', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'N', 'N', 0, NULL, '0000-00-00', '0.00', 0),
(134, '201311092', 4, '213131', 86208, 3, 'Usman Said', '201311092', 'b409e7a98ea7ac148281d519c568d290bcc82bf207c6e20e10824f2445bc2aca5b0e9efd9f8b4757acac87eac48e3df7595ce15d08e650c0e8006999fe5e86d3', '2013', 0, '0000-00-00', 0, 'no_foto.jpg', '0', '', '', 'L', NULL, NULL, '', '0000-00-00', 'ISLAM', '0', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'N', 'N', 0, NULL, '0000-00-00', '0.00', 0),
(135, '201311093', 4, '213131', 86208, 3, 'Vera Ratnasari', '201311093', 'b409e7a98ea7ac148281d519c568d290bcc82bf207c6e20e10824f2445bc2aca5b0e9efd9f8b4757acac87eac48e3df7595ce15d08e650c0e8006999fe5e86d3', '2013', 0, '0000-00-00', 0, 'no_foto.jpg', '0', '', '', 'P', NULL, NULL, '', '0000-00-00', 'ISLAM', '0', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'N', 'N', 0, NULL, '0000-00-00', '0.00', 0),
(136, '201311095', 4, '213131', 86208, 3, 'Winda Siti Nuril Anwari', '201311095', 'b409e7a98ea7ac148281d519c568d290bcc82bf207c6e20e10824f2445bc2aca5b0e9efd9f8b4757acac87eac48e3df7595ce15d08e650c0e8006999fe5e86d3', '2013', 0, '0000-00-00', 0, 'no_foto.jpg', '0', '', '', 'P', NULL, NULL, '', '0000-00-00', 'ISLAM', '0', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'N', 'N', 0, NULL, '0000-00-00', '0.00', 0),
(137, '201311098', 4, '213131', 86208, 3, 'Wiwin Winarti', '201311098', 'b409e7a98ea7ac148281d519c568d290bcc82bf207c6e20e10824f2445bc2aca5b0e9efd9f8b4757acac87eac48e3df7595ce15d08e650c0e8006999fe5e86d3', '2013', 0, '0000-00-00', 0, 'no_foto.jpg', '0', '', '', 'P', NULL, NULL, '', '0000-00-00', 'ISLAM', '0', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'N', 'N', 0, NULL, '0000-00-00', '0.00', 0),
(138, '201311099', 4, '213131', 86208, 3, 'Wulan Lestari', '201311099', 'b409e7a98ea7ac148281d519c568d290bcc82bf207c6e20e10824f2445bc2aca5b0e9efd9f8b4757acac87eac48e3df7595ce15d08e650c0e8006999fe5e86d3', '2013', 0, '0000-00-00', 0, 'no_foto.jpg', '0', '', '', 'P', NULL, NULL, '', '0000-00-00', 'ISLAM', '0', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'N', 'N', 0, NULL, '0000-00-00', '0.00', 0),
(139, '201311106', 4, '213131', 86208, 3, 'Zamhur Khoerudin', '201311106', '6a1902fed085917d67718f393e1d9d81a76c7ce69ff799ddf2be15d39d045d3b7ab8324614e88c31adb1b039cfb08ff7632792366abca1428b66c8a3c2233d9c', '2013', 0, '0000-00-00', 0, 'no_foto.jpg', '0', '', '', 'L', NULL, NULL, '', '0000-00-00', 'ISLAM', '0', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'N', 'N', 0, NULL, '0000-00-00', '0.00', 0),
(140, '201311074', 4, '213131', 86208, 3, 'Rahmat Harisman', '201311074', 'b409e7a98ea7ac148281d519c568d290bcc82bf207c6e20e10824f2445bc2aca5b0e9efd9f8b4757acac87eac48e3df7595ce15d08e650c0e8006999fe5e86d3', '2013', 0, '0000-00-00', 0, 'no_foto.jpg', '0', '', '', 'P', NULL, NULL, '', '0000-00-00', 'ISLAM', '0', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'N', 'N', 0, NULL, '0000-00-00', '0.00', 0),
(141, '201513039', 4, '213131', 86208, 3, 'Aneng', '201513039', 'b409e7a98ea7ac148281d519c568d290bcc82bf207c6e20e10824f2445bc2aca5b0e9efd9f8b4757acac87eac48e3df7595ce15d08e650c0e8006999fe5e86d3', '2015', 0, '0000-00-00', 0, 'no_foto.jpg', 'P', 'A', '', 'P', NULL, NULL, '', '0000-00-00', 'ISLAM', NULL, '', '', '', '', NULL, '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '0', '0', '0', NULL, '', '0', '0', '0', NULL, '', '', NULL, '', '', '', NULL, NULL, NULL, NULL, '0', NULL, '', '0', '', 'N', 'N', 0, NULL, '0000-00-00', '0.00', 0),
(142, '201211002', 4, '213131', 86208, 3, 'Agus  Cahyadi', '201211002', 'b409e7a98ea7ac148281d519c568d290bcc82bf207c6e20e10824f2445bc2aca5b0e9efd9f8b4757acac87eac48e3df7595ce15d08e650c0e8006999fe5e86d3', '2012', 0, '0000-00-00', 0, 'no_foto.jpg', '0', '', '', 'L', NULL, NULL, '', '0000-00-00', 'ISLAM', '0', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'N', 'N', 0, NULL, '0000-00-00', '0.00', 0),
(143, '201211001', 4, '213131', 86208, 3, 'Andini Nkania Sari', '201211001', 'b409e7a98ea7ac148281d519c568d290bcc82bf207c6e20e10824f2445bc2aca5b0e9efd9f8b4757acac87eac48e3df7595ce15d08e650c0e8006999fe5e86d3', '2012', 0, '0000-00-00', 0, 'no_foto.jpg', '0', '', '', 'P', NULL, NULL, '', '0000-00-00', 'ISLAM', '0', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'N', 'N', 0, NULL, '0000-00-00', '0.00', 0),
(144, '201211006', 4, '213131', 86208, 3, 'Ani Yuliani', '201211006', 'b409e7a98ea7ac148281d519c568d290bcc82bf207c6e20e10824f2445bc2aca5b0e9efd9f8b4757acac87eac48e3df7595ce15d08e650c0e8006999fe5e86d3', '2012', 0, '0000-00-00', 0, 'no_foto.jpg', '0', '', '', 'P', NULL, NULL, '', '0000-00-00', 'ISLAM', '0', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'N', 'N', 0, NULL, '0000-00-00', '0.00', 0),
(145, '201211009', 4, '213131', 86208, 3, 'Anisa Rofi''Ah', '201211009', 'b409e7a98ea7ac148281d519c568d290bcc82bf207c6e20e10824f2445bc2aca5b0e9efd9f8b4757acac87eac48e3df7595ce15d08e650c0e8006999fe5e86d3', '2012', 0, '0000-00-00', 0, 'no_foto.jpg', '0', '', '', 'P', NULL, NULL, '', '0000-00-00', 'ISLAM', '0', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'N', 'N', 0, NULL, '0000-00-00', '0.00', 0),
(146, '201211007', 4, '213131', 86208, 3, 'Anisa Solihah', '201211007', 'b409e7a98ea7ac148281d519c568d290bcc82bf207c6e20e10824f2445bc2aca5b0e9efd9f8b4757acac87eac48e3df7595ce15d08e650c0e8006999fe5e86d3', '2012', 0, '0000-00-00', 0, 'no_foto.jpg', '0', '', '', 'P', NULL, NULL, '', '0000-00-00', 'ISLAM', '0', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'N', 'N', 0, NULL, '0000-00-00', '0.00', 0),
(147, '201211010', 4, '213131', 86208, 3, 'Asep Ramdan', '201211010', 'b409e7a98ea7ac148281d519c568d290bcc82bf207c6e20e10824f2445bc2aca5b0e9efd9f8b4757acac87eac48e3df7595ce15d08e650c0e8006999fe5e86d3', '2012', 0, '0000-00-00', 0, 'no_foto.jpg', '0', '', '', 'L', NULL, NULL, '', '0000-00-00', 'ISLAM', '0', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'N', 'N', 0, NULL, '0000-00-00', '0.00', 0),
(148, '201211011', 4, '213131', 86208, 3, 'Ateng Suteja', '201211011', 'b409e7a98ea7ac148281d519c568d290bcc82bf207c6e20e10824f2445bc2aca5b0e9efd9f8b4757acac87eac48e3df7595ce15d08e650c0e8006999fe5e86d3', '2012', 0, '0000-00-00', 0, 'no_foto.jpg', '0', '', '', 'L', NULL, NULL, '', '0000-00-00', 'ISLAM', '0', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'N', 'N', 0, NULL, '0000-00-00', '0.00', 0),
(149, '201211013', 4, '213131', 86208, 3, 'Cecep Ridwan', '201211013', 'b409e7a98ea7ac148281d519c568d290bcc82bf207c6e20e10824f2445bc2aca5b0e9efd9f8b4757acac87eac48e3df7595ce15d08e650c0e8006999fe5e86d3', '2012', 0, '0000-00-00', 0, 'no_foto.jpg', '0', '', '', 'L', NULL, NULL, '', '0000-00-00', 'ISLAM', '0', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'N', 'N', 0, NULL, '0000-00-00', '0.00', 0),
(150, '201211015', 4, '213131', 86208, 3, 'Dadan Hidayat', '201211015', 'b409e7a98ea7ac148281d519c568d290bcc82bf207c6e20e10824f2445bc2aca5b0e9efd9f8b4757acac87eac48e3df7595ce15d08e650c0e8006999fe5e86d3', '2012', 0, '0000-00-00', 0, 'no_foto.jpg', '0', '', '', 'L', NULL, NULL, '', '0000-00-00', 'ISLAM', '0', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'N', 'N', 0, NULL, '0000-00-00', '0.00', 0),
(151, '201211017', 4, '213131', 86208, 3, 'Desi Siti Nurjanah', '201211017', 'b409e7a98ea7ac148281d519c568d290bcc82bf207c6e20e10824f2445bc2aca5b0e9efd9f8b4757acac87eac48e3df7595ce15d08e650c0e8006999fe5e86d3', '2012', 0, '0000-00-00', 0, 'no_foto.jpg', '0', '', '', 'P', NULL, NULL, '', '0000-00-00', 'ISLAM', '0', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'N', 'N', 0, NULL, '0000-00-00', '0.00', 0),
(152, '201211019', 4, '213131', 86208, 3, 'Dian Fujiati Sa''Diah', '201211019', 'b409e7a98ea7ac148281d519c568d290bcc82bf207c6e20e10824f2445bc2aca5b0e9efd9f8b4757acac87eac48e3df7595ce15d08e650c0e8006999fe5e86d3', '2012', 0, '0000-00-00', 0, 'no_foto.jpg', '0', '', '', 'P', NULL, NULL, '', '0000-00-00', 'ISLAM', '0', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'N', 'N', 0, NULL, '0000-00-00', '0.00', 0),
(153, '201211020', 4, '213131', 86208, 3, 'Didin Jaenudin', '201211020', 'b409e7a98ea7ac148281d519c568d290bcc82bf207c6e20e10824f2445bc2aca5b0e9efd9f8b4757acac87eac48e3df7595ce15d08e650c0e8006999fe5e86d3', '2012', 0, '0000-00-00', 0, 'no_foto.jpg', '0', '', '', 'L', NULL, NULL, '', '0000-00-00', 'ISLAM', '0', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'N', 'N', 0, NULL, '0000-00-00', '0.00', 0),
(154, '201211021', 4, '213131', 86208, 3, 'Didin Wahyudin', '201211021', 'b409e7a98ea7ac148281d519c568d290bcc82bf207c6e20e10824f2445bc2aca5b0e9efd9f8b4757acac87eac48e3df7595ce15d08e650c0e8006999fe5e86d3', '2012', 0, '0000-00-00', 0, 'no_foto.jpg', '0', '', '', 'L', NULL, NULL, '', '0000-00-00', 'ISLAM', '0', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'N', 'N', 0, NULL, '0000-00-00', '0.00', 0),
(155, '201211022', 4, '213131', 86208, 3, 'Dini Nurbayani', '201211022', 'b409e7a98ea7ac148281d519c568d290bcc82bf207c6e20e10824f2445bc2aca5b0e9efd9f8b4757acac87eac48e3df7595ce15d08e650c0e8006999fe5e86d3', '2012', 0, '0000-00-00', 0, 'no_foto.jpg', '0', '', '', 'P', NULL, NULL, '', '0000-00-00', 'ISLAM', '0', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'N', 'N', 0, NULL, '0000-00-00', '0.00', 0),
(156, '201211023', 4, '213131', 86208, 3, 'Dinna Fauziah', '201211023', 'b409e7a98ea7ac148281d519c568d290bcc82bf207c6e20e10824f2445bc2aca5b0e9efd9f8b4757acac87eac48e3df7595ce15d08e650c0e8006999fe5e86d3', '2012', 0, '0000-00-00', 0, 'no_foto.jpg', '0', '0', '', 'P', NULL, NULL, '', '0000-00-00', 'ISLAM', NULL, '', '', '', '', NULL, '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '0', '0', '0', NULL, '', '0', '0', '0', NULL, '', '', NULL, '', '', '', NULL, NULL, NULL, NULL, '0', NULL, '', '0', '', 'N', 'N', 0, NULL, '0000-00-00', '0.00', 0),
(157, '201211025', 4, '213131', 86208, 3, 'Euis Marlina', '201211025', 'b409e7a98ea7ac148281d519c568d290bcc82bf207c6e20e10824f2445bc2aca5b0e9efd9f8b4757acac87eac48e3df7595ce15d08e650c0e8006999fe5e86d3', '2012', 0, '0000-00-00', 0, 'no_foto.jpg', '0', '', '', 'P', NULL, NULL, '', '0000-00-00', 'ISLAM', '0', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'N', 'N', 0, NULL, '0000-00-00', '0.00', 0),
(158, '201211027', 4, '213131', 86208, 3, 'Firman Fauji', '201211027', 'b409e7a98ea7ac148281d519c568d290bcc82bf207c6e20e10824f2445bc2aca5b0e9efd9f8b4757acac87eac48e3df7595ce15d08e650c0e8006999fe5e86d3', '2012', 0, '0000-00-00', 0, 'no_foto.jpg', '0', '', '', 'L', NULL, NULL, '', '0000-00-00', 'ISLAM', '0', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'N', 'N', 0, NULL, '0000-00-00', '0.00', 0),
(159, '201211028', 4, '213131', 86208, 3, 'Fitriani', '201211028', 'b409e7a98ea7ac148281d519c568d290bcc82bf207c6e20e10824f2445bc2aca5b0e9efd9f8b4757acac87eac48e3df7595ce15d08e650c0e8006999fe5e86d3', '2012', 0, '0000-00-00', 0, 'no_foto.jpg', '0', '', '', 'P', NULL, NULL, '', '0000-00-00', 'ISLAM', '0', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'N', 'N', 0, NULL, '0000-00-00', '0.00', 0),
(160, '201211029', 4, '213131', 86208, 3, 'Gina Nurul Fatonah', '201211029', 'b409e7a98ea7ac148281d519c568d290bcc82bf207c6e20e10824f2445bc2aca5b0e9efd9f8b4757acac87eac48e3df7595ce15d08e650c0e8006999fe5e86d3', '2012', 0, '0000-00-00', 0, 'no_foto.jpg', '0', '', '', 'P', NULL, NULL, '', '0000-00-00', 'ISLAM', '0', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'N', 'N', 0, NULL, '0000-00-00', '0.00', 0),
(161, '201211032', 4, '213131', 86208, 3, 'Hendra Nugraha', '201211032', 'b409e7a98ea7ac148281d519c568d290bcc82bf207c6e20e10824f2445bc2aca5b0e9efd9f8b4757acac87eac48e3df7595ce15d08e650c0e8006999fe5e86d3', '2012', 0, '0000-00-00', 0, 'no_foto.jpg', '0', '', '', 'L', NULL, NULL, '', '0000-00-00', 'ISLAM', '0', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'N', 'N', 0, NULL, '0000-00-00', '0.00', 0),
(162, '201211039', 4, '213131', 86208, 3, 'Ita Fitriani', '201211039', 'b409e7a98ea7ac148281d519c568d290bcc82bf207c6e20e10824f2445bc2aca5b0e9efd9f8b4757acac87eac48e3df7595ce15d08e650c0e8006999fe5e86d3', '2012', 0, '0000-00-00', 0, 'no_foto.jpg', '0', '', '', 'P', NULL, NULL, '', '0000-00-00', 'ISLAM', '0', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'N', 'N', 0, NULL, '0000-00-00', '0.00', 0),
(163, '201211040', 4, '213131', 86208, 3, 'Jajang Lalan Apriawan S', '201211040', 'b409e7a98ea7ac148281d519c568d290bcc82bf207c6e20e10824f2445bc2aca5b0e9efd9f8b4757acac87eac48e3df7595ce15d08e650c0e8006999fe5e86d3', '2012', 0, '0000-00-00', 0, 'no_foto.jpg', '0', '', '', 'L', NULL, NULL, '', '0000-00-00', 'ISLAM', '0', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'N', 'N', 0, NULL, '0000-00-00', '0.00', 0),
(164, '201211042', 4, '213131', 86208, 3, 'Kurnia Dewi Lwstari', '201211042', 'b409e7a98ea7ac148281d519c568d290bcc82bf207c6e20e10824f2445bc2aca5b0e9efd9f8b4757acac87eac48e3df7595ce15d08e650c0e8006999fe5e86d3', '2012', 0, '0000-00-00', 0, 'no_foto.jpg', '0', '', '', 'P', NULL, NULL, '', '0000-00-00', 'ISLAM', '0', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'N', 'N', 0, NULL, '0000-00-00', '0.00', 0),
(165, '201211045', 4, '213131', 86208, 3, 'Moch. Farhan Yajid', '201211045', 'b409e7a98ea7ac148281d519c568d290bcc82bf207c6e20e10824f2445bc2aca5b0e9efd9f8b4757acac87eac48e3df7595ce15d08e650c0e8006999fe5e86d3', '2012', 0, '0000-00-00', 0, 'no_foto.jpg', '0', '', '', 'L', NULL, NULL, '', '0000-00-00', 'ISLAM', '0', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'N', 'N', 0, NULL, '0000-00-00', '0.00', 0),
(166, '201211048', 4, '213131', 86208, 3, 'Muhamad Nur Alimudin', '201211048', 'b409e7a98ea7ac148281d519c568d290bcc82bf207c6e20e10824f2445bc2aca5b0e9efd9f8b4757acac87eac48e3df7595ce15d08e650c0e8006999fe5e86d3', '2012', 0, '0000-00-00', 0, 'no_foto.jpg', '0', '', '', 'L', NULL, NULL, '', '0000-00-00', 'ISLAM', '0', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'N', 'N', 0, NULL, '0000-00-00', '0.00', 0),
(167, '201211049', 4, '213131', 86208, 3, 'Nandang Subarman', '201211049', 'b409e7a98ea7ac148281d519c568d290bcc82bf207c6e20e10824f2445bc2aca5b0e9efd9f8b4757acac87eac48e3df7595ce15d08e650c0e8006999fe5e86d3', '2012', 0, '0000-00-00', 0, 'no_foto.jpg', '0', '', '', 'L', NULL, NULL, '', '0000-00-00', 'ISLAM', '0', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'N', 'N', 0, NULL, '0000-00-00', '0.00', 0);
INSERT INTO `mahasiswa` (`ID`, `NIM`, `id_level`, `Identitas_ID`, `Jurusan_ID`, `Program_ID`, `Nama`, `username`, `password`, `Angkatan`, `Tahun_ID`, `TglSKMasuk`, `Kurikulum_ID`, `foto`, `StatusAwal_ID`, `StatusMhsw_ID`, `PenasehatAkademik`, `Kelamin`, `WargaNegara`, `Kebangsaan`, `TempatLahir`, `TanggalLahir`, `Agama`, `StatusSipil`, `Alamat`, `Kota`, `RT`, `RW`, `KodePos`, `Propinsi`, `Negara`, `Telepon`, `Handphone`, `Email`, `AlamatAsal`, `KotaAsal`, `RTAsal`, `RWAsal`, `KodePosAsal`, `PropinsiAsal`, `NegaraAsal`, `NamaAyah`, `AgamaAyah`, `PendidikanAyah`, `PekerjaanAyah`, `HidupAyah`, `NamaIbu`, `AgamaIbu`, `PendidikanIbu`, `PekerjaanIbu`, `HidupIbu`, `AlamatOrtu`, `KotaOrtu`, `KodePosOrtu`, `PropinsiOrtu`, `NegaraOrtu`, `TeleponOrtu`, `HandphoneOrtu`, `EmailOrtu`, `AsalSekolah`, `AsalSekolah1`, `JenisSekolah`, `KotaSekolah`, `JurusanSekolah_ID`, `NilaiSekolah`, `TahunLulus`, `aktif`, `LulusUjian`, `NilaiUjian`, `GradeNilai`, `TanggalLulus`, `IPK`, `TotalSKS`) VALUES
(168, '201211052', 4, '213131', 86208, 3, 'Noni Nopiani', '201211052', 'b409e7a98ea7ac148281d519c568d290bcc82bf207c6e20e10824f2445bc2aca5b0e9efd9f8b4757acac87eac48e3df7595ce15d08e650c0e8006999fe5e86d3', '2012', 0, '0000-00-00', 0, 'no_foto.jpg', '0', '', '', 'P', NULL, NULL, '', '0000-00-00', 'ISLAM', '0', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'N', 'N', 0, NULL, '0000-00-00', '0.00', 0),
(169, '201211053', 4, '213131', 86208, 3, 'Nurul Hanipa', '201211053', 'b409e7a98ea7ac148281d519c568d290bcc82bf207c6e20e10824f2445bc2aca5b0e9efd9f8b4757acac87eac48e3df7595ce15d08e650c0e8006999fe5e86d3', '2012', 0, '0000-00-00', 0, 'no_foto.jpg', '0', '', '', 'P', NULL, NULL, '', '0000-00-00', 'ISLAM', '0', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'N', 'N', 0, NULL, '0000-00-00', '0.00', 0),
(170, '201211054', 4, '213131', 86208, 3, 'Rani Sulastri', '201211054', 'b409e7a98ea7ac148281d519c568d290bcc82bf207c6e20e10824f2445bc2aca5b0e9efd9f8b4757acac87eac48e3df7595ce15d08e650c0e8006999fe5e86d3', '2012', 0, '0000-00-00', 0, 'no_foto.jpg', '0', '', '', 'P', NULL, NULL, '', '0000-00-00', 'ISLAM', '0', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'N', 'N', 0, NULL, '0000-00-00', '0.00', 0),
(171, '201211056', 4, '213131', 86208, 3, 'Reti Retniawati', '201211056', 'b409e7a98ea7ac148281d519c568d290bcc82bf207c6e20e10824f2445bc2aca5b0e9efd9f8b4757acac87eac48e3df7595ce15d08e650c0e8006999fe5e86d3', '2012', 0, '0000-00-00', 0, 'no_foto.jpg', '0', '', '', 'P', NULL, NULL, '', '0000-00-00', 'ISLAM', '0', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'N', 'N', 0, NULL, '0000-00-00', '0.00', 0),
(172, '201211057', 4, '213131', 86208, 3, 'Rida Oktaviana', '201211057', 'b409e7a98ea7ac148281d519c568d290bcc82bf207c6e20e10824f2445bc2aca5b0e9efd9f8b4757acac87eac48e3df7595ce15d08e650c0e8006999fe5e86d3', '2012', 0, '0000-00-00', 0, 'no_foto.jpg', '0', '', '', 'P', NULL, NULL, '', '0000-00-00', 'ISLAM', '0', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'N', 'N', 0, NULL, '0000-00-00', '0.00', 0),
(173, '201211058', 4, '213131', 86208, 3, 'Ridaul Jannah', '201211058', 'b409e7a98ea7ac148281d519c568d290bcc82bf207c6e20e10824f2445bc2aca5b0e9efd9f8b4757acac87eac48e3df7595ce15d08e650c0e8006999fe5e86d3', '2012', 0, '0000-00-00', 0, 'no_foto.jpg', '0', '', '', 'P', NULL, NULL, '', '0000-00-00', 'ISLAM', '0', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'N', 'N', 0, NULL, '0000-00-00', '0.00', 0),
(174, '201211059', 4, '213131', 86208, 3, 'Rifa Solihat', '201211059', 'b409e7a98ea7ac148281d519c568d290bcc82bf207c6e20e10824f2445bc2aca5b0e9efd9f8b4757acac87eac48e3df7595ce15d08e650c0e8006999fe5e86d3', '2012', 0, '0000-00-00', 0, 'no_foto.jpg', '0', '', '', 'P', NULL, NULL, '', '0000-00-00', 'ISLAM', '0', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'N', 'N', 0, NULL, '0000-00-00', '0.00', 0),
(175, '201211060', 4, '213131', 86208, 3, 'Rifan Fahrijal Arif', '201211060', 'b409e7a98ea7ac148281d519c568d290bcc82bf207c6e20e10824f2445bc2aca5b0e9efd9f8b4757acac87eac48e3df7595ce15d08e650c0e8006999fe5e86d3', '2012', 0, '0000-00-00', 0, 'no_foto.jpg', '0', '', '', 'L', NULL, NULL, '', '0000-00-00', 'ISLAM', '0', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'N', 'N', 0, NULL, '0000-00-00', '0.00', 0),
(176, '201211062', 4, '213131', 86208, 3, 'Rini Muajizah', '201211062', 'b409e7a98ea7ac148281d519c568d290bcc82bf207c6e20e10824f2445bc2aca5b0e9efd9f8b4757acac87eac48e3df7595ce15d08e650c0e8006999fe5e86d3', '2012', 0, '0000-00-00', 0, 'no_foto.jpg', '0', '', '', 'P', NULL, NULL, '', '0000-00-00', 'ISLAM', '0', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'N', 'N', 0, NULL, '0000-00-00', '0.00', 0),
(177, '201211070', 4, '213131', 86208, 3, 'Syaeful Anwar F', '201211070', 'b409e7a98ea7ac148281d519c568d290bcc82bf207c6e20e10824f2445bc2aca5b0e9efd9f8b4757acac87eac48e3df7595ce15d08e650c0e8006999fe5e86d3', '2012', 0, '0000-00-00', 0, 'no_foto.jpg', '0', '', '', 'L', NULL, NULL, '', '0000-00-00', 'ISLAM', '0', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'N', 'N', 0, NULL, '0000-00-00', '0.00', 0),
(178, '201211076', 4, '213131', 86208, 3, 'Wawan Kuswendi', '201211076', 'b409e7a98ea7ac148281d519c568d290bcc82bf207c6e20e10824f2445bc2aca5b0e9efd9f8b4757acac87eac48e3df7595ce15d08e650c0e8006999fe5e86d3', '2012', 0, '0000-00-00', 0, 'no_foto.jpg', '0', '', '', 'L', NULL, NULL, '', '0000-00-00', 'ISLAM', '0', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'N', 'N', 0, NULL, '0000-00-00', '0.00', 0),
(179, '201211077', 4, '213131', 86208, 3, 'Wina Wahidatul Ulum', '201211077', 'b409e7a98ea7ac148281d519c568d290bcc82bf207c6e20e10824f2445bc2aca5b0e9efd9f8b4757acac87eac48e3df7595ce15d08e650c0e8006999fe5e86d3', '2012', 0, '0000-00-00', 0, 'no_foto.jpg', '0', '', '', 'P', NULL, NULL, '', '0000-00-00', 'ISLAM', '0', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'N', 'N', 0, NULL, '0000-00-00', '0.00', 0),
(180, '201312001', 4, '213131', 60202, 3, 'Asep Aa Hidayatulloh', '201312001', 'b409e7a98ea7ac148281d519c568d290bcc82bf207c6e20e10824f2445bc2aca5b0e9efd9f8b4757acac87eac48e3df7595ce15d08e650c0e8006999fe5e86d3', '2013', 0, '0000-00-00', 0, 'no_foto.jpg', '0', '', '', 'L', NULL, NULL, '', '0000-00-00', 'ISLAM', '0', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'N', 'N', 0, NULL, '0000-00-00', '0.00', 0),
(181, '201312002', 4, '213131', 60202, 3, 'Ayu Yulia Andayani', '201312002', 'b409e7a98ea7ac148281d519c568d290bcc82bf207c6e20e10824f2445bc2aca5b0e9efd9f8b4757acac87eac48e3df7595ce15d08e650c0e8006999fe5e86d3', '2013', 0, '0000-00-00', 0, 'no_foto.jpg', '0', '', '', 'P', NULL, NULL, '', '0000-00-00', 'ISLAM', '0', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'N', 'N', 0, NULL, '0000-00-00', '0.00', 0),
(182, '201312003', 4, '213131', 60202, 3, 'Bahrul Faiz', '201312003', 'b409e7a98ea7ac148281d519c568d290bcc82bf207c6e20e10824f2445bc2aca5b0e9efd9f8b4757acac87eac48e3df7595ce15d08e650c0e8006999fe5e86d3', '2013', 0, '0000-00-00', 0, 'no_foto.jpg', '0', '', '', 'L', NULL, NULL, '', '0000-00-00', 'ISLAM', '0', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'N', 'N', 0, NULL, '0000-00-00', '0.00', 0),
(183, '201312004', 4, '213131', 60202, 3, 'Doni Yani Gunawan', 'mahasiswa', 'cf83e1357eefb8bdf1542850d66d8007d620e4050b5715dc83f4a921d36ce9ce47d0d13c5d85f2b0ff8318d2877eec2f63b931bd47417a81a538327af927da3e', '2013', 0, '0000-00-00', 0, 'no_foto.jpg', '0', '0', '', 'L', NULL, NULL, '', '0000-00-00', 'ISLAM', NULL, '', '', '', '', NULL, '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '0', '0', '0', NULL, '', '0', '0', '0', NULL, '', '', NULL, '', '', '', NULL, NULL, NULL, NULL, '0', NULL, '', '0', '', 'N', 'N', 0, NULL, '0000-00-00', '0.00', 0),
(184, '201312005', 4, '213131', 60202, 3, 'Eva Siti Nugraha', '201312005', 'b409e7a98ea7ac148281d519c568d290bcc82bf207c6e20e10824f2445bc2aca5b0e9efd9f8b4757acac87eac48e3df7595ce15d08e650c0e8006999fe5e86d3', '2013', 0, '0000-00-00', 0, 'no_foto.jpg', '0', '', '', 'P', NULL, NULL, '', '0000-00-00', 'ISLAM', '0', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'N', 'N', 0, NULL, '0000-00-00', '0.00', 0),
(185, '201313006', 4, '213131', 60202, 3, 'Firmansyah', '201313006', 'b409e7a98ea7ac148281d519c568d290bcc82bf207c6e20e10824f2445bc2aca5b0e9efd9f8b4757acac87eac48e3df7595ce15d08e650c0e8006999fe5e86d3', '2013', 0, '0000-00-00', 0, 'no_foto.jpg', '0', '', '', 'L', NULL, NULL, '', '0000-00-00', 'ISLAM', '0', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'N', 'N', 0, NULL, '0000-00-00', '0.00', 0),
(186, '201312008', 4, '213131', 60202, 3, 'Imam Ramdhon Muchlisin', '201312008', 'b409e7a98ea7ac148281d519c568d290bcc82bf207c6e20e10824f2445bc2aca5b0e9efd9f8b4757acac87eac48e3df7595ce15d08e650c0e8006999fe5e86d3', '2013', 0, '0000-00-00', 0, 'no_foto.jpg', '0', '', '', 'L', NULL, NULL, '', '0000-00-00', 'ISLAM', '0', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'N', 'N', 0, NULL, '0000-00-00', '0.00', 0),
(187, '201312009', 4, '213131', 60202, 3, 'Kiki Agustini M', '201312009', 'b409e7a98ea7ac148281d519c568d290bcc82bf207c6e20e10824f2445bc2aca5b0e9efd9f8b4757acac87eac48e3df7595ce15d08e650c0e8006999fe5e86d3', '2013', 0, '0000-00-00', 0, 'no_foto.jpg', '0', '', '', 'P', NULL, NULL, '', '0000-00-00', 'ISLAM', '0', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'N', 'N', 0, NULL, '0000-00-00', '0.00', 0),
(188, '201312010', 4, '213131', 60202, 3, 'Kurnia Firdaus', '201312010', 'b409e7a98ea7ac148281d519c568d290bcc82bf207c6e20e10824f2445bc2aca5b0e9efd9f8b4757acac87eac48e3df7595ce15d08e650c0e8006999fe5e86d3', '2013', 0, '0000-00-00', 0, 'no_foto.jpg', '0', '', '', 'L', NULL, NULL, '', '0000-00-00', 'ISLAM', '0', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'N', 'N', 0, NULL, '0000-00-00', '0.00', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `master_nilai`
--

CREATE TABLE `master_nilai` (
  `id` int(11) NOT NULL,
  `ipmin` decimal(5,2) NOT NULL,
  `ipmax` decimal(5,2) NOT NULL,
  `MaxSKS` int(3) NOT NULL,
  `Identitas_ID` int(5) NOT NULL,
  `Jurusan_ID` int(5) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data untuk tabel `master_nilai`
--

INSERT INTO `master_nilai` (`id`, `ipmin`, `ipmax`, `MaxSKS`, `Identitas_ID`, `Jurusan_ID`) VALUES
(1, '1.20', '1.69', 12, 14032012, 261),
(2, '1.70', '2.19', 16, 14032012, 261),
(3, '2.20', '2.69', 19, 14032012, 261),
(4, '2.70', '2.99', 21, 14032012, 261),
(5, '3.00', '4.00', 24, 14032012, 261),
(6, '0.00', '1.19', 9, 14032012, 261);

-- --------------------------------------------------------

--
-- Struktur dari tabel `matakuliah`
--

CREATE TABLE `matakuliah` (
  `Matakuliah_ID` int(11) NOT NULL,
  `Identitas_ID` int(5) NOT NULL,
  `Jurusan_ID` int(5) NOT NULL,
  `Kurikulum_ID` int(11) NOT NULL,
  `Kode_mtk` varchar(15) COLLATE latin1_general_ci NOT NULL,
  `Nama_matakuliah` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `Nama_english` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `Semester` varchar(2) COLLATE latin1_general_ci NOT NULL,
  `SKS` varchar(2) COLLATE latin1_general_ci NOT NULL,
  `KelompokMtk_ID` varchar(2) COLLATE latin1_general_ci NOT NULL,
  `JenisMTK_ID` varchar(2) COLLATE latin1_general_ci NOT NULL,
  `JenisKurikulum_ID` varchar(2) COLLATE latin1_general_ci NOT NULL,
  `StatusMtk_ID` varchar(20) COLLATE latin1_general_ci NOT NULL,
  `Penanggungjawab` varchar(50) COLLATE latin1_general_ci DEFAULT NULL,
  `Ket` varchar(200) COLLATE latin1_general_ci NOT NULL,
  `Aktif` enum('Y','N') COLLATE latin1_general_ci NOT NULL DEFAULT 'Y'
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data untuk tabel `matakuliah`
--

INSERT INTO `matakuliah` (`Matakuliah_ID`, `Identitas_ID`, `Jurusan_ID`, `Kurikulum_ID`, `Kode_mtk`, `Nama_matakuliah`, `Nama_english`, `Semester`, `SKS`, `KelompokMtk_ID`, `JenisMTK_ID`, `JenisKurikulum_ID`, `StatusMtk_ID`, `Penanggungjawab`, `Ket`, `Aktif`) VALUES
(107, 213131, 86208, 34, 'IB22.9', 'Hadist 1', '', '2', '2', '0', '0', '0', 'A', '', '', 'Y'),
(106, 213131, 86208, 34, 'IC222', 'Ilmu Pendidikan 1', '', '2', '2', '0', '0', '0', 'A', '', '', 'Y'),
(105, 213131, 86208, 34, 'IB227', 'Sejarah Peradaban Islam', '', '2', '2', '0', '0', '0', 'A', '', '', 'Y'),
(104, 213131, 86208, 34, 'IB228', 'Fiqh 1', '', '2', '2', '0', '0', '0', 'A', '', '', 'Y'),
(103, 213131, 86208, 34, 'IB2210', 'Tafsir 1', '', '2', '2', '0', '0', '0', 'A', '', '', 'Y'),
(102, 213131, 86208, 34, 'IA224', 'Bahasa Inggris 2', '', '2', '2', '0', '0', '0', 'A', '', '', 'Y'),
(101, 213131, 86208, 34, 'IA226', 'Filsafat Umum', '', '2', '2', '0', '0', '0', 'A', '', '', 'Y'),
(100, 213131, 86208, 34, 'IC221', 'MKPAI 1', '', '2', '2', '0', '0', '0', 'A', '', '', 'Y'),
(98, 213131, 86208, 33, 'IB7022', 'Teori/Bimbingan Skripsi', '', '7', '2', '0', 'S', '0', 'A', '', '', 'Y'),
(99, 213131, 86208, 34, 'IA225', 'Bahasa Arab 2', '', '2', '2', '0', '0', '0', 'A', '', '', 'Y'),
(97, 213131, 86208, 33, 'IC333', 'Filsafat Pendidikan Islam', '', '5', '2', '0', '0', '0', 'A', '', '', 'Y'),
(96, 213131, 86208, 33, 'IB5218', 'Qira''atul kutub', '', '5', '3', '0', '0', '0', 'A', '', '', 'Y'),
(95, 213131, 86208, 33, 'IB5316', 'Etika dan Profesi Guru', '', '5', '2', '0', '0', '0', 'A', '', '', 'Y'),
(94, 213131, 86208, 33, 'IB5315', 'Micro Teaching 1', '', '5', '2', '0', '0', '0', 'A', '', '', 'Y'),
(93, 213131, 86208, 33, 'IC538', 'Psikologi Agama', '', '5', '2', '0', '0', '0', 'A', '', '', 'Y'),
(92, 213131, 86208, 33, 'IC529', 'Peng. Sistem Evaluasi PAI', '', '5', '3', '0', '0', '0', 'A', '', '', 'Y'),
(91, 213131, 86208, 33, 'ID532', 'Bimbingan Konseling', '', '5', '3', '0', '0', '0', 'A', '', '', 'Y'),
(90, 213131, 86208, 33, 'IC527', 'Telaah Kurikulum PAI SLTP/SLTA', '', '5', '2', '0', '0', '0', 'A', '', '', 'Y'),
(89, 213131, 86208, 33, 'IB5217', 'Filsafat Ilmu', '', '5', '3', '0', '0', '0', 'A', '', '', 'Y'),
(88, 213131, 86208, 33, 'IB328', 'Fiqh 2', '', '3', '2', '0', '0', '0', 'A', '', '', 'Y'),
(87, 213131, 86208, 33, 'IC333', 'Peren. Sistem Pengajaran PAI', '', '3', '3', '0', '0', '0', 'A', '', '', 'Y'),
(86, 213131, 86208, 33, 'IB329', 'Hadits 2', '', '3', '2', '0', '0', '0', 'A', '', '', 'Y'),
(85, 213131, 86208, 33, 'IC322', 'Ilmu Pendidikan 2', '', '3', '2', '0', '0', '0', 'A', '', '', 'Y'),
(84, 213131, 86208, 33, 'IC324', 'Psikologi Pendidikan', '', '3', '2', '0', '0', '0', 'A', '', '', 'Y'),
(83, 213131, 86208, 33, 'IC321', 'MKPAI 2', '', '3', '2', '0', '0', '0', 'A', '', '', 'Y'),
(82, 213131, 86208, 33, 'ID321', 'Komunikasi Pembelajaran', '', '3', '2', '0', '0', '0', 'A', '', '', 'Y'),
(81, 213131, 86208, 33, 'IA324', 'Bahasa Inggris 3', '', '3', '2', '0', '0', '0', 'A', '', '', 'Y'),
(80, 213131, 86208, 33, 'IA325', 'Bahasa Arab 3', '', '3', '2', '0', '0', '0', 'A', '', '', 'Y'),
(79, 213131, 86208, 33, 'IB3210', 'Tafsir 2', '', '3', '2', '0', '0', '0', 'A', '', '', 'Y'),
(78, 213131, 86208, 33, 'IB3212', 'Filsafat Islam', '', '3', '2', '0', '0', '0', 'A', '', '', 'Y'),
(77, 213131, 86208, 33, 'IB122', 'Ulumul Hadist', '', '1', '2', '0', '0', '0', 'A', '', '', 'Y'),
(76, 213131, 86208, 33, 'IB126', 'Akhlak Tasawuf', '', '1', '2', '0', '0', '0', 'A', '', '', 'Y'),
(75, 213131, 86208, 33, 'IB121', 'Ilmu Fiqh', '', '1', '2', '0', '0', '0', 'A', '', '', 'Y'),
(74, 213131, 86208, 33, 'IA121', 'PPkn', '', '1', '2', '0', '0', '0', 'A', '', '', 'Y'),
(73, 213131, 86208, 33, 'IB124', 'Ilmu Kalam', '', '1', '2', '0', '0', '0', 'A', '', '', 'Y'),
(72, 213131, 86208, 33, 'IA122', 'Ilmu Alamiah Dasar', '', '1', '2', '0', '0', '0', 'A', '', '', 'Y'),
(71, 213131, 86208, 33, 'IA134', 'Bahasa Inggris', '', '1', '3', '0', '0', '0', 'A', '', '', 'Y'),
(70, 213131, 86208, 33, 'IA125', 'Bahasa Arab 1', '', '1', '3', '0', '0', '0', 'A', '', '', 'Y'),
(69, 213131, 86208, 33, 'IB125', 'Psikologi Umum', '', '1', '2', '0', '0', '0', 'A', '', '', 'Y'),
(68, 213131, 86208, 33, 'IB123', 'Ulumul Qur’an', '', '1', '2', '0', '0', '0', 'A', '', '', 'Y'),
(67, 213131, 86208, 33, 'IA123', 'Bahasa Indonesia', '', '1', '2', '0', '0', '0', 'A', '', '', 'Y'),
(66, 213131, 86208, 33, 'IE104', 'Praktek Ibadah', '', '1', '2', '0', '0', '0', 'A', '', '', 'Y'),
(108, 213131, 86208, 34, 'IB2211', 'Psikologi Perkembangan', '', '2', '2', '0', '0', '0', 'A', '', '', 'Y'),
(109, 213131, 86208, 34, 'IE421', 'Komputer', '', '2', '3', '0', '0', '0', 'A', '', '', 'Y'),
(110, 213131, 86208, 34, 'IC436', 'Media dan Teknologi Pengajaran', '', '4', '3', '0', '0', '0', 'A', '', '', 'Y'),
(111, 213131, 86208, 34, 'IE105', 'Praktek Tilawah', '', '4', '2', '0', '0', '0', 'A', '', '', 'Y'),
(112, 213131, 86208, 34, 'IA424', 'Bahasa Inggris 4', '', '4', '2', '0', '0', '0', 'A', '', '', 'Y'),
(113, 213131, 86208, 34, 'IC435', ' Statistik Pendidikan', '', '4', '3', '0', '0', '0', 'A', '', '', 'Y'),
(114, 213131, 86208, 34, 'IB4210', 'Tafsir 3', '', '4', '2', '0', '0', '0', 'A', '', '', 'Y'),
(115, 213131, 86208, 34, 'IE422', 'Manajemen Masjid', '', '4', '2', '0', '0', '0', 'A', '', '', 'Y'),
(116, 213131, 86208, 34, 'IB4213', 'Ilmu pendidikan Islam', '', '4', '3', '0', '0', '0', 'A', '', '', 'Y'),
(117, 213131, 86208, 34, 'IB4314', 'Strategi Belajar Mengajar', '', '4', '3', '0', '0', '0', 'A', '', '', 'Y'),
(118, 213131, 86208, 34, 'IB428', 'Fiqih 3', '', '4', '2', '0', '0', '0', 'A', '', '', 'Y'),
(119, 213131, 86208, 34, 'IA425', 'Bhasa Arab 4', '', '4', '2', '0', '0', '0', 'A', '', '', 'Y'),
(120, 213131, 86208, 34, 'IB429', 'Hadits 3', '', '4', '2', '0', '0', '0', 'A', '', '', 'Y'),
(121, 213131, 86208, 34, 'IC6313', 'Administrasi Pendidikan', '', '6', '3', '0', '0', '0', 'A', '', '', 'Y'),
(122, 213131, 86208, 34, 'IC6311', 'Metode Penelitian', '', '6', '3', '0', '0', '0', 'A', '', '', 'Y'),
(123, 213131, 86208, 34, 'IB6319', 'Kapita Selekta Pendidikan', '', '6', '3', '0', '0', '0', 'A', '', '', 'Y'),
(124, 213131, 86208, 34, 'IC6215', 'Manajemen Sekolah', '', '6', '2', '0', '0', '0', 'A', '', '', 'Y'),
(125, 213131, 86208, 34, 'IC6214', 'Micro Teaching', '', '6', '2', '0', '0', '0', 'A', '', '', 'Y'),
(126, 213131, 86208, 34, 'IC6312', 'Pengembangan Kurikulum PAI', '', '6', '3', '0', '0', '0', 'A', '', '', 'Y'),
(127, 213131, 86208, 34, 'IB6321', 'Metodologi Studi Islam', '', '6', '3', '0', '0', '0', 'A', '', '', 'Y'),
(128, 213131, 86208, 34, 'IE623', 'Jasa Kewirausahaan', '', '6', '2', '0', '0', '0', 'A', '', '', 'Y'),
(129, 213131, 86208, 34, 'IB6220', 'Masailul Fiqhiyah', '', '6', '2', '0', '0', '0', 'A', '', '', 'Y'),
(130, 213131, 86208, 33, 'ID724', 'KKN', '', '7', '2', 'B', 'C', '0', 'A', '', '', 'Y'),
(131, 213131, 86208, 35, 'ID825', 'Komprehensip', '', '8', '2', 'H', 'A', '0', 'A', '', '', 'Y'),
(132, 213131, 86208, 35, 'ID846', 'Skripsi', '', '8', '4', 'H', 'S', '0', 'A', '', '', 'Y'),
(133, 213131, 86208, 34, 'ID723', 'PPLK', '', '7', '2', 'B', 'C', '0', 'A', '', '', 'Y'),
(134, 213131, 60202, 36, 'D104', 'Pengantar Ekonomi', '', '1', '3', '0', '0', '0', 'A', '', '', 'Y'),
(135, 213131, 60202, 36, 'A111', 'Bahasa Indonesia', '', '1', '2', '0', '0', '0', 'A', '', '', 'Y'),
(136, 213131, 60202, 36, 'A108', 'Bahasa Arab 1', '', '1', '2', '0', '0', '0', 'A', '', '', 'Y'),
(137, 213131, 60202, 36, 'B100', 'PKN/Pancasila', '', '1', '2', '0', '0', '0', 'A', '', '', 'Y'),
(138, 213131, 60202, 36, 'A109', 'Kewirausahaan 1', '', '1', '2', '0', '0', '0', 'A', '', '', 'Y'),
(139, 213131, 60202, 36, 'C113', 'Praktek Ibadah', '', '1', '2', '0', '0', '0', 'A', '', '', 'Y'),
(140, 213131, 60202, 36, 'A105', 'Pengantar Akutansi', '', '1', '2', '0', '0', '0', 'A', '', '', 'Y'),
(141, 213131, 60202, 36, 'A100', 'Ulumul Qur', '', '1', '2', '0', '0', '0', 'A', '', '', 'Y'),
(142, 213131, 60202, 36, 'A104', 'Pengantar Fiqih Muamalah', '', '1', '2', '0', '0', '0', 'A', '', '', 'Y'),
(143, 213131, 60202, 36, 'D105', 'Filsafat Umum', '', '1', '2', '0', '0', '0', 'A', '', '', 'Y'),
(144, 213131, 60202, 36, 'A112', 'Akhlak Tasawuf', '', '1', '2', '0', '0', '0', 'A', '', '', 'Y'),
(145, 213131, 60202, 36, 'B108', 'Ekonomi Mikro Islam', '', '3', '3', '0', '0', '0', 'A', '', '', 'Y'),
(146, 213131, 60202, 36, 'B109', 'Manajemen Koperasi', '', '3', '2', '0', '0', '0', 'A', '', '', 'Y'),
(147, 213131, 60202, 36, 'B110', 'Bahasa Inggris', '', '3', '2', '0', '0', '0', 'A', '', '', 'Y'),
(148, 213131, 60202, 36, 'B105', 'Sejarah Pemikiran Eksyar', '', '3', '2', '0', '0', '0', 'A', '', '', 'Y'),
(149, 213131, 60202, 36, 'C110', 'Kaidah Fiqih Muamalah ', '', '3', '2', '0', '0', '0', 'A', '', '', 'Y'),
(150, 213131, 60202, 36, 'D101', 'Kewirausahaan 3', '', '3', '2', '0', '0', '0', 'A', '', '', 'Y'),
(151, 213131, 60202, 36, 'B107', 'Fiqih Muamalah 2', '', '3', '3', '0', '0', '0', 'A', '', '', 'Y'),
(152, 213131, 60202, 36, 'C100', 'Hadits Ekonomi', '', '3', '2', '0', '0', '0', 'A', '', '', 'Y'),
(153, 213131, 60202, 36, 'B104', 'Pengantar Ilmu Hukum', '', '3', '2', '0', '0', '0', 'A', '', '', 'Y'),
(154, 213131, 60202, 36, 'D102', 'Dasar - dasar Manajemen', '', '3', '2', '0', '0', '0', 'A', '', '', 'Y'),
(155, 213131, 60202, 36, 'C103', 'Kewirausahan 5', '', '5', '2', '0', '0', '0', 'A', '', '', 'Y'),
(156, 213131, 60202, 36, 'C104', 'Asuransi  Syariah', '', '5', '2', '0', '0', '0', 'A', '', '', 'Y'),
(157, 213131, 60202, 36, 'D103', 'Keuangan Publik Islam', '', '5', '2', '0', '0', '0', 'A', '', '', 'Y'),
(158, 213131, 60202, 36, 'D106', 'Manajemen Perbankan Syariah', '', '5', '2', '0', '0', '0', 'A', '', '', 'Y'),
(159, 213131, 60202, 36, 'B118', 'Pasar Modal Syariah', '', '5', '2', '0', '0', '0', 'A', '', '', 'Y'),
(160, 213131, 60202, 36, 'D110', 'Manajemen Pembiayaan', '', '5', '2', '0', '0', '0', 'A', '', '', 'Y'),
(161, 213131, 60202, 36, 'E107', 'Kebijakan Perekonomian di Indonesia', '', '5', '2', '0', '0', '0', 'A', '', '', 'Y'),
(162, 213131, 60202, 36, 'C105', 'Fatwa - fatwa Ekonomi Syariah', '', '5', '2', '0', '0', '0', 'A', '', '', 'Y'),
(163, 213131, 60202, 36, 'C106', 'Manajemen Organisasi', '', '5', '2', '0', '0', '0', 'A', '', '', 'Y'),
(164, 213131, 60202, 36, 'C107', 'Akuntansi Syariah', '', '5', '2', '0', '0', '0', 'A', '', '', 'Y'),
(165, 213131, 60202, 36, 'C109', 'Manajemen Strategis', '', '7', '2', '0', '0', '0', 'A', '', '', 'Y'),
(166, 213131, 60202, 36, 'D111', 'Manajemen SDM/Insan Kamil', '', '7', '2', '0', '0', '0', 'A', '', '', 'Y'),
(167, 213131, 60202, 36, 'D108', 'Seminar Proposal Skripsi', '', '7', '2', '0', '0', '0', 'A', '', '', 'Y'),
(168, 213131, 60202, 36, 'C112', 'Metode Statistik', '', '7', '3', '0', '0', '0', 'A', '', '', 'Y'),
(169, 213131, 60202, 36, 'D109', 'Metodologi Penelitian Eksyar', '', '7', '3', '0', '0', '0', 'A', '', '', 'Y'),
(170, 213131, 60202, 37, 'D112', 'Skripsi', '', '8', '4', '0', 'S', '0', 'A', '', '', 'Y'),
(171, 213131, 60202, 37, 'D100', 'Pengantar Bisnis dan Manajemen', '', '2', '2', '0', '0', '0', 'A', '', '', 'Y'),
(172, 213131, 60202, 37, 'B103', 'Bahasa Inggris', '', '2', '2', '0', '0', '0', 'A', '', '', 'Y'),
(173, 213131, 60202, 37, 'A107', 'Ulumul Hadits', '', '2', '2', '0', '0', '0', 'A', '', '', 'Y'),
(174, 213131, 60202, 37, 'C114', 'Komputer', '', '2', '2', '0', '0', '0', 'A', '', '', 'Y'),
(175, 213131, 60202, 37, 'E106', 'Sejarah Peradaban Islam', '', '2', '2', '0', '0', '0', 'A', '', '', 'Y'),
(176, 213131, 60202, 37, 'A103', 'Ushul Fiqih', '', '2', '3', '0', '0', '0', 'A', '', '', 'Y'),
(177, 213131, 60202, 37, 'A110', 'Kewirausahaan 2', '', '2', '2', '0', '0', '0', 'A', '', '', 'Y'),
(178, 213131, 60202, 37, 'B101', 'Bahasa Arab Ekonomi', '', '2', '2', '0', '0', '0', 'A', '', '', 'Y'),
(179, 213131, 60202, 37, 'B102', 'Ilmu Sosial Dasar', '', '2', '2', '0', '0', '0', 'A', '', '', 'Y'),
(180, 213131, 60202, 37, 'A102', 'Ilmu Kalam', '', '2', '2', '0', '0', '0', 'A', '', '', 'Y'),
(181, 213131, 60202, 37, 'A101', 'Fiqih Muamalah 1', '', '2', '3', '0', '0', '0', 'A', '', '', 'Y'),
(182, 213131, 60202, 37, 'C111', 'Akuntansi keuangan', '', '4', '2', '0', '0', '0', 'A', '', '', 'Y'),
(183, 213131, 60202, 37, 'C115', 'Fiqih ZIS', '', '4', '2', '0', '0', '0', 'A', '', '', 'Y'),
(184, 213131, 60202, 37, 'B111', 'Kewirausahaan 4', '', '4', '2', '0', '0', '0', 'A', '', '', 'Y'),
(185, 213131, 60202, 37, 'B113', 'Manajemen Pemasaran', '', '4', '2', '0', '0', '0', 'A', '', '', 'Y'),
(186, 213131, 60202, 37, 'B112', 'Lembaga Keuangan Syariah', '', '4', '2', '0', '0', '0', 'A', '', '', 'Y'),
(187, 213131, 60202, 37, 'D113', 'Manajemen ZIS, Haji, dan Waqaf', '', '4', '3', '0', '0', '0', 'A', '', '', 'Y'),
(188, 213131, 60202, 37, 'B106', 'Fiqih Mawarits dan Waqaf', '', '4', '2', '0', '0', '0', 'A', '', '', 'Y'),
(189, 213131, 60202, 37, 'B115', 'Metode Statistik', '', '4', '2', '0', '0', '0', 'A', '', '', 'Y');

-- --------------------------------------------------------

--
-- Struktur dari tabel `nilai`
--

CREATE TABLE `nilai` (
  `Nilai_ID` int(11) NOT NULL,
  `Identitas_ID` int(5) NOT NULL,
  `Jurusan_ID` int(5) NOT NULL,
  `grade` varchar(2) COLLATE latin1_general_ci NOT NULL,
  `bobot` varchar(2) COLLATE latin1_general_ci NOT NULL,
  `NilaiMin` decimal(10,2) NOT NULL,
  `NilaiMax` decimal(10,2) NOT NULL,
  `keterangan` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `Aktif` enum('Y','N') COLLATE latin1_general_ci NOT NULL DEFAULT 'Y'
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data untuk tabel `nilai`
--

INSERT INTO `nilai` (`Nilai_ID`, `Identitas_ID`, `Jurusan_ID`, `grade`, `bobot`, `NilaiMin`, `NilaiMax`, `keterangan`, `Aktif`) VALUES
(1, 14032012, 201, 'E', '0', '0.00', '2.99', 'Buruk Sekali', 'Y'),
(2, 14032012, 201, 'D', '1', '3.00', '4.99', 'Buruk', 'Y'),
(3, 14032012, 201, 'C', '2', '5.00', '6.99', 'Baik', 'Y'),
(4, 14032012, 201, 'B', '3', '7.00', '8.99', 'Baik Sekali', 'Y'),
(5, 14032012, 201, 'A', '4', '9.00', '100.00', 'Istimewa', 'Y'),
(6, 14032012, 202, 'E', '0', '0.00', '2.99', 'Buruk Sekali', 'Y'),
(7, 14032012, 202, 'D', '1', '3.00', '4.99', 'Buruk', 'Y'),
(8, 14032012, 202, 'C', '2', '5.00', '6.99', 'Baik', 'Y'),
(9, 14032012, 202, 'B', '3', '7.00', '8.99', 'Baik Sekali', 'Y'),
(10, 14032012, 202, 'A', '4', '9.00', '100.00', 'Istimewa', 'Y');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pekerjaanortu`
--

CREATE TABLE `pekerjaanortu` (
  `Pekerjaan` char(3) COLLATE latin1_general_ci NOT NULL DEFAULT '',
  `Nama` varchar(50) COLLATE latin1_general_ci DEFAULT NULL,
  `NA` enum('Y','N') COLLATE latin1_general_ci NOT NULL DEFAULT 'N'
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data untuk tabel `pekerjaanortu`
--

INSERT INTO `pekerjaanortu` (`Pekerjaan`, `Nama`, `NA`) VALUES
('1', 'Pegawai Negeri', 'N'),
('2', 'ABRI', 'N'),
('3', 'Pegawai Swasta', 'N'),
('4', 'Usaha Sendiri', 'N'),
('5', 'Tidak Bekerja', 'N'),
('6', 'Pensiun', 'N'),
('7', 'Lain-lain', 'N');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pendidikanortu`
--

CREATE TABLE `pendidikanortu` (
  `ID` int(1) NOT NULL,
  `Nama` varchar(50) COLLATE latin1_general_ci DEFAULT NULL,
  `NA` enum('Y','N') COLLATE latin1_general_ci NOT NULL DEFAULT 'N'
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data untuk tabel `pendidikanortu`
--

INSERT INTO `pendidikanortu` (`ID`, `Nama`, `NA`) VALUES
(1, 'Tidak Tamat SD', 'N'),
(2, 'Tamat SD', 'N'),
(3, 'Tamat SMP', 'N'),
(4, 'Tamat SMTA', 'N'),
(5, 'Diploma', 'N'),
(6, 'Sarjana Muda', 'N'),
(7, 'Sarjana', 'N'),
(8, 'Pasca Sarjana', 'N'),
(9, 'Doktor', 'N');

-- --------------------------------------------------------

--
-- Struktur dari tabel `perhatian`
--

CREATE TABLE `perhatian` (
  `ID` int(11) NOT NULL,
  `header` text COLLATE latin1_general_ci NOT NULL,
  `t1` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `t2` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `t3` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `t4` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `t5` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `t6` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `gb` varchar(255) COLLATE latin1_general_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data untuk tabel `perhatian`
--

INSERT INTO `perhatian` (`ID`, `header`, `t1`, `t2`, `t3`, `t4`, `t5`, `t6`, `gb`) VALUES
(1, '::.Warning.:: KRS YANG TELAH DI SEND/SUBMIT/KIRIM TDK BISA DIEDIT PASTIKAN SEBELUM DISEND TELITI DULU:', '1. Batas Akhir pengisian Kartu Rencana Studi (KRS) dimulai pada tanggal', '2. Perubahan Kartu Rencana Studi (KRS) tidak akan dilayani jika batas penginputan KRS telah berakhir', '', '', '', '', 'warning.png');

-- --------------------------------------------------------

--
-- Struktur dari tabel `program`
--

CREATE TABLE `program` (
  `ID` int(2) NOT NULL,
  `Identitas_ID` int(5) NOT NULL,
  `Program_ID` varchar(10) COLLATE latin1_general_ci NOT NULL,
  `nama_program` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `aktif` enum('Y','N') COLLATE latin1_general_ci NOT NULL DEFAULT 'N'
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data untuk tabel `program`
--

INSERT INTO `program` (`ID`, `Identitas_ID`, `Program_ID`, `nama_program`, `aktif`) VALUES
(3, 213131, 'R', 'REGULER', 'Y'),
(4, 213131, 'N', 'NON REGULER', 'Y');

-- --------------------------------------------------------

--
-- Struktur dari tabel `regmhs`
--

CREATE TABLE `regmhs` (
  `ID_Reg` int(11) NOT NULL,
  `Tahun` int(5) NOT NULL,
  `Identitas_ID` int(5) NOT NULL,
  `Jurusan_ID` int(5) NOT NULL,
  `NIM` varchar(15) COLLATE latin1_general_ci NOT NULL,
  `tgl_reg` date NOT NULL,
  `aktif` enum('Y','N') COLLATE latin1_general_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data untuk tabel `regmhs`
--

INSERT INTO `regmhs` (`ID_Reg`, `Tahun`, `Identitas_ID`, `Jurusan_ID`, `NIM`, `tgl_reg`, `aktif`) VALUES
(1, 0, 14032012, 86208, 'B.2015.1.1.001', '2016-02-04', 'Y'),
(2, 20152, 213131, 86208, 'B.2015.1.1.001', '2016-02-04', 'Y'),
(3, 20152, 213131, 60202, 'B.2015.1.1.002', '2016-02-05', 'Y'),
(4, 20152, 213131, 60202, 'B.2015.1.1.003', '2016-02-05', 'Y'),
(5, 20152, 213131, 60202, 'B.2015.1.1.004', '2016-02-05', 'Y'),
(6, 20152, 213131, 60202, 'B.2015.1.1.005', '2016-02-05', 'Y'),
(8, 20152, 213131, 86208, 'B.2015.1.1.006', '2016-02-07', 'Y'),
(9, 20152, 213131, 86208, 'B.2015.1.1.007', '2016-02-07', 'Y'),
(10, 20152, 213131, 86208, 'B.2015.1.1.008', '2016-02-07', 'Y'),
(11, 20152, 213131, 86208, 'B.2015.1.1.009', '2016-02-07', 'Y'),
(12, 20152, 213131, 86208, 'B.2015.1.1.010', '2016-02-07', 'Y'),
(13, 20152, 213131, 86208, 'B.2015.1.1.021', '2016-02-07', 'Y'),
(14, 20152, 213131, 86208, 'B.2015.1.1.020', '2016-02-07', 'Y'),
(15, 20152, 213131, 86208, 'B.2015.1.1.019', '2016-02-07', 'Y'),
(16, 20152, 213131, 86208, 'B.2015.1.1.018', '2016-02-07', 'Y'),
(17, 20152, 213131, 86208, 'B.2015.1.1.016', '2016-02-07', 'Y'),
(18, 20152, 213131, 86208, 'B.2015.1.1.015', '2016-02-07', 'Y'),
(19, 20152, 213131, 86208, 'B.2015.1.1.014', '2016-02-07', 'Y'),
(20, 20152, 213131, 86208, 'B.2015.1.1.013', '2016-02-07', 'Y'),
(21, 20152, 213131, 86208, 'B.2015.1.1.012', '2016-02-07', 'Y'),
(22, 20152, 213131, 86208, 'B.2015.1.1.011', '2016-02-07', 'Y'),
(23, 20152, 213131, 86208, 'B.2015.1.1.022', '2016-02-07', 'Y'),
(24, 20152, 213131, 86208, 'B.2015.1.1.023', '2016-02-07', 'Y'),
(25, 20152, 213131, 86208, 'B.2015.1.1.024', '2016-02-07', 'Y'),
(26, 20152, 213131, 86208, 'B.2015.1.1.025', '2016-02-07', 'Y'),
(27, 20152, 213131, 86208, 'B.2015.1.1.026', '2016-02-07', 'Y'),
(28, 20152, 213131, 86208, 'B.2015.1.1.027', '2016-02-07', 'Y'),
(29, 20152, 213131, 86208, 'B.2015.1.1.028', '2016-02-07', 'Y'),
(30, 20152, 213131, 86208, 'B.2015.1.1.029', '2016-02-07', 'Y'),
(31, 20152, 213131, 86208, 'B.2015.1.1.030', '2016-02-07', 'Y'),
(32, 20152, 213131, 86208, 'B.2015.1.1.031', '2016-02-07', 'Y'),
(33, 20152, 213131, 86208, 'B.2015.1.1.032', '2016-02-07', 'Y'),
(34, 20152, 213131, 86208, 'B.2015.1.1.033', '2016-02-07', 'Y'),
(35, 20152, 213131, 86208, 'B.2015.1.1.034', '2016-02-07', 'Y'),
(36, 20152, 213131, 86208, 'B.2015.1.1.035', '2016-02-07', 'Y'),
(37, 20152, 213131, 86208, 'B.2015.1.1.036', '2016-02-07', 'Y'),
(38, 20152, 213131, 86208, 'B.2015.1.1.037', '2016-02-07', 'Y'),
(39, 20152, 213131, 86208, 'B.2015.1.1.038', '2016-02-07', 'Y');

-- --------------------------------------------------------

--
-- Struktur dari tabel `ruang`
--

CREATE TABLE `ruang` (
  `ID` int(11) NOT NULL,
  `Ruang_ID` varchar(20) COLLATE latin1_general_ci NOT NULL,
  `Nama` varchar(50) COLLATE latin1_general_ci DEFAULT NULL,
  `Kampus_ID` varchar(20) COLLATE latin1_general_ci NOT NULL,
  `Lantai` smallint(5) UNSIGNED DEFAULT '1',
  `RuangKuliah` enum('Y','N') COLLATE latin1_general_ci DEFAULT 'Y',
  `Kapasitas` int(10) UNSIGNED DEFAULT '0',
  `KapasitasUjian` int(10) UNSIGNED DEFAULT '0',
  `Keterangan` text COLLATE latin1_general_ci,
  `Aktif` enum('Y','N') COLLATE latin1_general_ci DEFAULT 'N'
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data untuk tabel `ruang`
--

INSERT INTO `ruang` (`ID`, `Ruang_ID`, `Nama`, `Kampus_ID`, `Lantai`, `RuangKuliah`, `Kapasitas`, `KapasitasUjian`, `Keterangan`, `Aktif`) VALUES
(15, 'RA03', 'RUANG 3', 'K1', 1, 'Y', 40, 20, '', 'Y'),
(4, 'RA01', 'RUANG 1', 'K1', 1, 'Y', 40, 20, '', 'Y'),
(14, 'RA02', 'RUANG 2', 'K1', 1, 'Y', 40, 30, '', 'Y'),
(13, 'RA05', 'RUANG 5', 'K1', 1, 'Y', 40, 30, '', 'Y'),
(16, 'RA06', 'RUANG 6', 'K1', 1, 'Y', 40, 20, '', 'Y'),
(17, 'RA04', 'RUANG 4', 'K1', 1, 'Y', 40, 20, '', 'Y'),
(18, 'RA07', 'RUANG 7', 'K1', 1, 'Y', 40, 20, '', 'Y');

-- --------------------------------------------------------

--
-- Struktur dari tabel `statusawal`
--

CREATE TABLE `statusawal` (
  `ID` int(11) NOT NULL,
  `StatusAwal_ID` varchar(5) COLLATE latin1_general_ci NOT NULL DEFAULT '',
  `Nama` varchar(50) COLLATE latin1_general_ci DEFAULT NULL,
  `BeliFormulir` enum('Y','N') COLLATE latin1_general_ci NOT NULL DEFAULT 'Y',
  `JalurKhusus` enum('Y','N') COLLATE latin1_general_ci NOT NULL DEFAULT 'N',
  `TanpaTest` enum('Y','N') COLLATE latin1_general_ci NOT NULL DEFAULT 'N',
  `Catatan` varchar(255) COLLATE latin1_general_ci DEFAULT NULL,
  `Aktif` enum('Y','N') COLLATE latin1_general_ci NOT NULL DEFAULT 'Y'
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data untuk tabel `statusawal`
--

INSERT INTO `statusawal` (`ID`, `StatusAwal_ID`, `Nama`, `BeliFormulir`, `JalurKhusus`, `TanpaTest`, `Catatan`, `Aktif`) VALUES
(1, 'P', 'Pindahan', 'Y', 'N', 'Y', '', 'Y'),
(2, 'B', 'Baru', 'Y', 'N', 'N', NULL, 'Y'),
(3, 'S', 'PSSB', 'Y', 'Y', 'Y', 'Untuk siswa SMA berprestasi', 'Y'),
(4, 'D', 'Drop-in', 'Y', 'N', 'Y', '', 'Y'),
(5, 'A', 'Asing', 'Y', 'Y', 'Y', 'Untuk calon mahasiswa asing', 'Y');

-- --------------------------------------------------------

--
-- Struktur dari tabel `statuskerja`
--

CREATE TABLE `statuskerja` (
  `ID` int(11) NOT NULL,
  `StatusKerja_ID` varchar(5) COLLATE latin1_general_ci NOT NULL,
  `Nama` varchar(50) COLLATE latin1_general_ci NOT NULL DEFAULT '',
  `Def` enum('Y','N') COLLATE latin1_general_ci NOT NULL DEFAULT 'N',
  `NA` enum('Y','N') COLLATE latin1_general_ci NOT NULL DEFAULT 'N'
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data untuk tabel `statuskerja`
--

INSERT INTO `statuskerja` (`ID`, `StatusKerja_ID`, `Nama`, `Def`, `NA`) VALUES
(1, 'A', 'Dosen Tetap', 'N', 'N'),
(2, 'B', 'Dosen PNS Dipekerjakan', 'N', 'N'),
(3, 'C', 'Dosen Honorer PTN', 'N', 'N'),
(4, 'D', 'Dosen Honorer Non PTN', 'N', 'N'),
(5, 'E', 'Dosen Kontrak', 'N', 'N');

-- --------------------------------------------------------

--
-- Struktur dari tabel `statusmhsw`
--

CREATE TABLE `statusmhsw` (
  `ID` int(11) NOT NULL,
  `StatusMhsw_ID` varchar(5) COLLATE latin1_general_ci NOT NULL DEFAULT '',
  `Nama` varchar(50) COLLATE latin1_general_ci NOT NULL DEFAULT '',
  `Nilai` smallint(6) NOT NULL DEFAULT '0',
  `Keluar` enum('Y','N') COLLATE latin1_general_ci NOT NULL DEFAULT 'N',
  `Def` enum('Y','N') COLLATE latin1_general_ci NOT NULL DEFAULT 'N',
  `Aktif` enum('Y','N') COLLATE latin1_general_ci NOT NULL DEFAULT 'Y'
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data untuk tabel `statusmhsw`
--

INSERT INTO `statusmhsw` (`ID`, `StatusMhsw_ID`, `Nama`, `Nilai`, `Keluar`, `Def`, `Aktif`) VALUES
(1, 'A', 'Aktif', 1, 'N', 'N', 'N'),
(2, 'C', 'Cuti', 0, 'N', 'N', 'N'),
(3, 'P', 'Pasif', 1, 'N', 'Y', 'N'),
(4, 'K', 'Keluar', 0, 'Y', 'N', 'N'),
(5, 'D', 'Drop-out', 0, 'Y', 'N', 'N'),
(6, 'L', 'Lulus', 0, 'Y', 'N', 'N'),
(7, 'T', 'Tunggu Ujian', 1, 'N', 'N', 'N');

-- --------------------------------------------------------

--
-- Struktur dari tabel `statusmtk`
--

CREATE TABLE `statusmtk` (
  `ID` int(11) NOT NULL,
  `StatusMtk_ID` varchar(2) COLLATE latin1_general_ci NOT NULL,
  `Nama` varchar(20) COLLATE latin1_general_ci NOT NULL,
  `Aktif` enum('Y','N') COLLATE latin1_general_ci NOT NULL DEFAULT 'Y'
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data untuk tabel `statusmtk`
--

INSERT INTO `statusmtk` (`ID`, `StatusMtk_ID`, `Nama`, `Aktif`) VALUES
(1, 'A', 'AKTIF', 'Y'),
(2, 'H', 'HAPUS', 'Y'),
(3, 'N', 'NON AKTIF', 'Y');

-- --------------------------------------------------------

--
-- Struktur dari tabel `statussipil`
--

CREATE TABLE `statussipil` (
  `ID` int(3) NOT NULL,
  `Nama` varchar(50) COLLATE latin1_general_ci DEFAULT NULL,
  `Aktif` enum('Y','N') COLLATE latin1_general_ci NOT NULL DEFAULT 'Y'
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data untuk tabel `statussipil`
--

INSERT INTO `statussipil` (`ID`, `Nama`, `Aktif`) VALUES
(1, 'Belum Menikah', 'N'),
(2, 'Menikah', 'N');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tahun`
--

CREATE TABLE `tahun` (
  `ID` int(11) NOT NULL,
  `Tahun_ID` int(5) NOT NULL,
  `Identitas_ID` int(5) NOT NULL,
  `Jurusan_ID` int(5) NOT NULL,
  `Program_ID` int(1) NOT NULL,
  `Nama` varchar(50) COLLATE latin1_general_ci NOT NULL DEFAULT '',
  `TglKRSMulai` date DEFAULT NULL,
  `TglKRSSelesai` date DEFAULT NULL,
  `TglCetakKHS` date NOT NULL DEFAULT '0000-00-00',
  `TglBayarMulai` date NOT NULL DEFAULT '0000-00-00',
  `TglBayarSelesai` date NOT NULL DEFAULT '0000-00-00',
  `TglKuliahMulai` date DEFAULT NULL,
  `TglKuliahSelesai` date DEFAULT NULL,
  `TglUTSMulai` date DEFAULT NULL,
  `TglUTSSelesai` date DEFAULT NULL,
  `TglUASMulai` date DEFAULT NULL,
  `TglUASSelesai` date DEFAULT NULL,
  `TglNilaiMulai` date NOT NULL,
  `TglNilaiSelesai` date NOT NULL,
  `HanyaAngkatan` varchar(10) COLLATE latin1_general_ci DEFAULT NULL,
  `TglBuat` datetime DEFAULT NULL,
  `LoginBuat` varchar(20) COLLATE latin1_general_ci DEFAULT NULL,
  `TglEdit` datetime DEFAULT NULL,
  `LoginEdit` varchar(20) COLLATE latin1_general_ci DEFAULT NULL,
  `Catatan` text COLLATE latin1_general_ci,
  `Aktif` enum('Y','N') COLLATE latin1_general_ci NOT NULL DEFAULT 'Y'
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data untuk tabel `tahun`
--

INSERT INTO `tahun` (`ID`, `Tahun_ID`, `Identitas_ID`, `Jurusan_ID`, `Program_ID`, `Nama`, `TglKRSMulai`, `TglKRSSelesai`, `TglCetakKHS`, `TglBayarMulai`, `TglBayarSelesai`, `TglKuliahMulai`, `TglKuliahSelesai`, `TglUTSMulai`, `TglUTSSelesai`, `TglUASMulai`, `TglUASSelesai`, `TglNilaiMulai`, `TglNilaiSelesai`, `HanyaAngkatan`, `TglBuat`, `LoginBuat`, `TglEdit`, `LoginEdit`, `Catatan`, `Aktif`) VALUES
(3, 20152, 213131, 86208, 3, 'Kalender Akademik Semester Genap 20152', '2016-02-22', '2016-02-27', '2016-07-12', '0000-00-00', '0000-00-00', '2016-02-29', '2016-06-19', '2016-04-18', '2016-04-24', '2016-06-27', '2016-07-03', '2016-07-04', '2016-07-11', NULL, NULL, NULL, NULL, NULL, NULL, 'Y'),
(4, 20152, 213131, 60202, 3, 'Kalender Akademik Semester Genap 20152', '2016-02-22', '2016-02-27', '2016-07-12', '0000-00-00', '0000-00-00', NULL, NULL, '2016-04-18', '2016-04-24', '2016-06-27', '2016-07-03', '2016-07-04', '2016-07-11', NULL, NULL, NULL, NULL, NULL, NULL, 'Y'),
(5, 20151, 213131, 60202, 3, 'semester gasal 20151', '2015-09-07', '2015-09-12', '2016-02-29', '0000-00-00', '0000-00-00', '2015-09-14', '2016-01-02', '2015-11-02', '2015-11-07', '2016-01-11', '2016-01-17', '2016-01-24', '2016-02-29', NULL, NULL, NULL, NULL, NULL, NULL, 'Y');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `username` (`username`);

--
-- Indexes for table `agama`
--
ALTER TABLE `agama`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `akademik`
--
ALTER TABLE `akademik`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `Identitas_ID` (`Identitas_ID`),
  ADD KEY `Jurusan_ID` (`Jurusan_ID`);

--
-- Indexes for table `beritaawal`
--
ALTER TABLE `beritaawal`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dosen`
--
ALTER TABLE `dosen`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `username` (`username`),
  ADD KEY `NIDN` (`NIDN`),
  ADD KEY `Identitas_ID` (`Identitas_ID`),
  ADD KEY `Jurusan_ID` (`Jurusan_ID`);

--
-- Indexes for table `dropdownsystem`
--
ALTER TABLE `dropdownsystem`
  ADD PRIMARY KEY (`ID_ds`),
  ADD KEY `id_group` (`id_group`,`menu_order`);

--
-- Indexes for table `epsbed`
--
ALTER TABLE `epsbed`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `error`
--
ALTER TABLE `error`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fileupload`
--
ALTER TABLE `fileupload`
  ADD PRIMARY KEY (`File_ID`),
  ADD KEY `File_ID` (`File_ID`),
  ADD KEY `Level_ID` (`Level_ID`);

--
-- Indexes for table `groupmodul`
--
ALTER TABLE `groupmodul`
  ADD PRIMARY KEY (`id_group`),
  ADD KEY `relasi_modul` (`relasi_modul`);

--
-- Indexes for table `hakmodul`
--
ALTER TABLE `hakmodul`
  ADD PRIMARY KEY (`ID_hm`),
  ADD KEY `ID_ds` (`ID_ds`,`id_level`);

--
-- Indexes for table `hari`
--
ALTER TABLE `hari`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hidup`
--
ALTER TABLE `hidup`
  ADD PRIMARY KEY (`Hidup`);

--
-- Indexes for table `identitas`
--
ALTER TABLE `identitas`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `Identitas_ID` (`Identitas_ID`);

--
-- Indexes for table `jabatan`
--
ALTER TABLE `jabatan`
  ADD PRIMARY KEY (`Jabatan_ID`);

--
-- Indexes for table `jabatandikti`
--
ALTER TABLE `jabatandikti`
  ADD PRIMARY KEY (`JabatanDikti_ID`);

--
-- Indexes for table `jadwal`
--
ALTER TABLE `jadwal`
  ADD PRIMARY KEY (`Jadwal_ID`),
  ADD KEY `Tahun_ID` (`Tahun_ID`),
  ADD KEY `Identitas_ID` (`Identitas_ID`),
  ADD KEY `Program_ID` (`Program_ID`),
  ADD KEY `Kode_Mtk` (`Kode_Mtk`),
  ADD KEY `Kode_Jurusan` (`Jurusan_ID`),
  ADD KEY `Ruang_ID` (`Ruang_ID`),
  ADD KEY `Dosen_ID` (`Dosen_ID`);

--
-- Indexes for table `jeniskurikulum`
--
ALTER TABLE `jeniskurikulum`
  ADD PRIMARY KEY (`JenisKurikulum_ID`),
  ADD KEY `Jurusan_ID` (`Jurusan_ID`),
  ADD KEY `Identitas_ID` (`Kode`);

--
-- Indexes for table `jenismk`
--
ALTER TABLE `jenismk`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `JenisMK_ID` (`JenisMTK_ID`);

--
-- Indexes for table `jenissekolah`
--
ALTER TABLE `jenissekolah`
  ADD PRIMARY KEY (`JenisSekolah_ID`);

--
-- Indexes for table `jenis_ujian`
--
ALTER TABLE `jenis_ujian`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `jenisjadwal` (`jenisjadwal`);

--
-- Indexes for table `jenjang`
--
ALTER TABLE `jenjang`
  ADD PRIMARY KEY (`Jenjang_ID`);

--
-- Indexes for table `jurusan`
--
ALTER TABLE `jurusan`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `Identitas_ID` (`Identitas_ID`),
  ADD KEY `Jurusan_ID` (`Jurusan_ID`);

--
-- Indexes for table `jurusansekolah`
--
ALTER TABLE `jurusansekolah`
  ADD PRIMARY KEY (`JurusanSekolah_ID`);

--
-- Indexes for table `kampus`
--
ALTER TABLE `kampus`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `Identitas_ID` (`Identitas_ID`),
  ADD KEY `Kampus_ID` (`Kampus_ID`);

--
-- Indexes for table `kelompokmtk`
--
ALTER TABLE `kelompokmtk`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `KelompokMtk_ID` (`KelompokMtk_ID`);

--
-- Indexes for table `krs`
--
ALTER TABLE `krs`
  ADD PRIMARY KEY (`KRS_ID`),
  ADD KEY `NIM` (`NIM`),
  ADD KEY `Tahun_ID` (`Tahun_ID`),
  ADD KEY `Jadwal_ID` (`Jadwal_ID`),
  ADD KEY `Kode_mtk` (`Kode_mtk`);

--
-- Indexes for table `kurikulum`
--
ALTER TABLE `kurikulum`
  ADD PRIMARY KEY (`Kurikulum_ID`),
  ADD KEY `Identitas_ID` (`Identitas_ID`),
  ADD KEY `Jurusan_ID` (`Jurusan_ID`);

--
-- Indexes for table `level`
--
ALTER TABLE `level`
  ADD PRIMARY KEY (`id_level`);

--
-- Indexes for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `NIM` (`NIM`),
  ADD KEY `username` (`username`),
  ADD KEY `Angkatan` (`Angkatan`),
  ADD KEY `identitas_ID` (`Identitas_ID`),
  ADD KEY `Kurikulum_ID` (`Kurikulum_ID`),
  ADD KEY `Jurusan_ID` (`Jurusan_ID`),
  ADD KEY `Program_ID` (`Program_ID`),
  ADD KEY `Tahun_ID` (`Tahun_ID`);

--
-- Indexes for table `master_nilai`
--
ALTER TABLE `master_nilai`
  ADD PRIMARY KEY (`id`),
  ADD KEY `Identitas_ID` (`Identitas_ID`),
  ADD KEY `Jurusan_ID` (`Jurusan_ID`);

--
-- Indexes for table `matakuliah`
--
ALTER TABLE `matakuliah`
  ADD PRIMARY KEY (`Matakuliah_ID`),
  ADD KEY `Identitas_ID` (`Identitas_ID`),
  ADD KEY `Kode_mtk` (`Kode_mtk`),
  ADD KEY `Jurusan_ID` (`Jurusan_ID`),
  ADD KEY `Kurikulum_ID` (`Kurikulum_ID`);

--
-- Indexes for table `nilai`
--
ALTER TABLE `nilai`
  ADD PRIMARY KEY (`Nilai_ID`),
  ADD KEY `Identitas_ID` (`Identitas_ID`),
  ADD KEY `Jurusan_ID` (`Jurusan_ID`);

--
-- Indexes for table `pekerjaanortu`
--
ALTER TABLE `pekerjaanortu`
  ADD PRIMARY KEY (`Pekerjaan`);

--
-- Indexes for table `pendidikanortu`
--
ALTER TABLE `pendidikanortu`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `perhatian`
--
ALTER TABLE `perhatian`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `program`
--
ALTER TABLE `program`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `Program_ID` (`Program_ID`),
  ADD KEY `Identitas_ID` (`Identitas_ID`);

--
-- Indexes for table `regmhs`
--
ALTER TABLE `regmhs`
  ADD PRIMARY KEY (`ID_Reg`),
  ADD KEY `Tahun` (`Tahun`),
  ADD KEY `Identitas_ID` (`Identitas_ID`),
  ADD KEY `Jurusan_ID` (`Jurusan_ID`),
  ADD KEY `NIM` (`NIM`);

--
-- Indexes for table `ruang`
--
ALTER TABLE `ruang`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `Ruang_ID` (`Ruang_ID`),
  ADD KEY `Kampus_ID` (`Kampus_ID`);

--
-- Indexes for table `statusawal`
--
ALTER TABLE `statusawal`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `statuskerja`
--
ALTER TABLE `statuskerja`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `StatusKerja_ID` (`StatusKerja_ID`);

--
-- Indexes for table `statusmhsw`
--
ALTER TABLE `statusmhsw`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `StatusMhsw_ID` (`StatusMhsw_ID`);

--
-- Indexes for table `statusmtk`
--
ALTER TABLE `statusmtk`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `StatusMtk_ID` (`StatusMtk_ID`);

--
-- Indexes for table `statussipil`
--
ALTER TABLE `statussipil`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tahun`
--
ALTER TABLE `tahun`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `Tahun_ID` (`Tahun_ID`),
  ADD KEY `Identitas_ID` (`Identitas_ID`),
  ADD KEY `Jurusan_ID` (`Jurusan_ID`),
  ADD KEY `Program_ID` (`Program_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `agama`
--
ALTER TABLE `agama`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `akademik`
--
ALTER TABLE `akademik`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `beritaawal`
--
ALTER TABLE `beritaawal`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `dosen`
--
ALTER TABLE `dosen`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;
--
-- AUTO_INCREMENT for table `dropdownsystem`
--
ALTER TABLE `dropdownsystem`
  MODIFY `ID_ds` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;
--
-- AUTO_INCREMENT for table `epsbed`
--
ALTER TABLE `epsbed`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `error`
--
ALTER TABLE `error`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `fileupload`
--
ALTER TABLE `fileupload`
  MODIFY `File_ID` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `groupmodul`
--
ALTER TABLE `groupmodul`
  MODIFY `id_group` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;
--
-- AUTO_INCREMENT for table `hakmodul`
--
ALTER TABLE `hakmodul`
  MODIFY `ID_hm` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;
--
-- AUTO_INCREMENT for table `hari`
--
ALTER TABLE `hari`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `identitas`
--
ALTER TABLE `identitas`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
--
-- AUTO_INCREMENT for table `jadwal`
--
ALTER TABLE `jadwal`
  MODIFY `Jadwal_ID` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;
--
-- AUTO_INCREMENT for table `jeniskurikulum`
--
ALTER TABLE `jeniskurikulum`
  MODIFY `JenisKurikulum_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `jenismk`
--
ALTER TABLE `jenismk`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `jenissekolah`
--
ALTER TABLE `jenissekolah`
  MODIFY `JenisSekolah_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `jenis_ujian`
--
ALTER TABLE `jenis_ujian`
  MODIFY `ID` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `jurusan`
--
ALTER TABLE `jurusan`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `kampus`
--
ALTER TABLE `kampus`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `kelompokmtk`
--
ALTER TABLE `kelompokmtk`
  MODIFY `ID` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `krs`
--
ALTER TABLE `krs`
  MODIFY `KRS_ID` bigint(20) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `kurikulum`
--
ALTER TABLE `kurikulum`
  MODIFY `Kurikulum_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;
--
-- AUTO_INCREMENT for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  MODIFY `ID` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=189;
--
-- AUTO_INCREMENT for table `master_nilai`
--
ALTER TABLE `master_nilai`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `matakuliah`
--
ALTER TABLE `matakuliah`
  MODIFY `Matakuliah_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=191;
--
-- AUTO_INCREMENT for table `nilai`
--
ALTER TABLE `nilai`
  MODIFY `Nilai_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `pendidikanortu`
--
ALTER TABLE `pendidikanortu`
  MODIFY `ID` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `perhatian`
--
ALTER TABLE `perhatian`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `program`
--
ALTER TABLE `program`
  MODIFY `ID` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `regmhs`
--
ALTER TABLE `regmhs`
  MODIFY `ID_Reg` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;
--
-- AUTO_INCREMENT for table `ruang`
--
ALTER TABLE `ruang`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `statusawal`
--
ALTER TABLE `statusawal`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `statuskerja`
--
ALTER TABLE `statuskerja`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `statusmhsw`
--
ALTER TABLE `statusmhsw`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `statusmtk`
--
ALTER TABLE `statusmtk`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `statussipil`
--
ALTER TABLE `statussipil`
  MODIFY `ID` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tahun`
--
ALTER TABLE `tahun`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
