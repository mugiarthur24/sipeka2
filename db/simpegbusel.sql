-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 04 Jan 2020 pada 01.21
-- Versi Server: 10.1.19-MariaDB
-- PHP Version: 5.6.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `simpegbusel`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_data_dp3`
--

CREATE TABLE `tbl_data_dp3` (
  `id_dp3` int(50) NOT NULL,
  `id_pegawai` int(50) NOT NULL,
  `tahun` varchar(30) NOT NULL,
  `kesetiaan` varchar(100) NOT NULL,
  `prestasi` varchar(100) NOT NULL,
  `tanggung_jawab` varchar(100) NOT NULL,
  `ketaatan` varchar(100) NOT NULL,
  `kejujuran` varchar(100) NOT NULL,
  `kerjasama` varchar(100) NOT NULL,
  `prakarsa` varchar(100) NOT NULL,
  `kepemimpinan` varchar(100) NOT NULL,
  `rata_rata` varchar(100) NOT NULL,
  `pejabat_penilai` varchar(100) NOT NULL,
  `atasan_pejabat_penilai` varchar(100) NOT NULL,
  `mengetahui` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_data_gaji_pokok`
--

CREATE TABLE `tbl_data_gaji_pokok` (
  `id_gaji_pokok` int(50) NOT NULL,
  `id_pegawai` int(50) NOT NULL,
  `id_golongan` int(50) NOT NULL,
  `nomor_sk` varchar(100) NOT NULL,
  `tanggal_sk` varchar(100) NOT NULL,
  `dasar_perubahan` varchar(100) NOT NULL,
  `gaji_pokok` varchar(50) NOT NULL,
  `tanggal_mulai` varchar(50) NOT NULL,
  `tanggal_selesai` varchar(50) NOT NULL,
  `masa_kerja` varchar(50) NOT NULL,
  `pejabat_menetapkan` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_data_hukuman`
--

CREATE TABLE `tbl_data_hukuman` (
  `id_hukuman` int(50) NOT NULL,
  `id_pegawai` int(50) NOT NULL,
  `id_master_hukuman` int(50) NOT NULL,
  `uraian` text NOT NULL,
  `nomor_sk` varchar(100) NOT NULL,
  `tanggal_sk` varchar(100) NOT NULL,
  `tanggal_mulai` varchar(50) NOT NULL,
  `tanggal_selesai` varchar(50) NOT NULL,
  `no_sk_pembatalan` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_data_ijin_belajar`
--

CREATE TABLE `tbl_data_ijin_belajar` (
  `id_ijin_belajar` int(11) NOT NULL,
  `noreg_ijin_belajar` varchar(10) NOT NULL,
  `no_cetak` varchar(10) NOT NULL,
  `id_pegawai` int(11) NOT NULL,
  `nip` varchar(114) NOT NULL,
  `id_pangkat` int(11) NOT NULL,
  `id_golongan` int(11) NOT NULL,
  `id_jabatan` int(11) NOT NULL,
  `id_satuan_kerja` int(11) NOT NULL,
  `tujuan` varchar(114) NOT NULL,
  `jarak` varchar(10) NOT NULL,
  `jam` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_data_karpeg`
--

CREATE TABLE `tbl_data_karpeg` (
  `id_karpeg` int(11) NOT NULL,
  `no_reg_karpeg` int(11) NOT NULL,
  `nm_pegawai` varchar(114) NOT NULL,
  `nip` varchar(114) NOT NULL,
  `id_pangkat` int(11) NOT NULL,
  `id_golongan` int(11) NOT NULL,
  `id_jabatan` int(11) NOT NULL,
  `unit_organisasi` varchar(114) NOT NULL,
  `tgl_permohonan` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_data_karsi`
--

CREATE TABLE `tbl_data_karsi` (
  `id_karsi` int(11) NOT NULL,
  `no_reg_karsi` int(11) NOT NULL,
  `nm_pegawai` varchar(114) NOT NULL,
  `nip` varchar(114) NOT NULL,
  `id_pangkat` int(11) NOT NULL,
  `id_golongan` int(11) NOT NULL,
  `id_jabatan` int(11) NOT NULL,
  `unit_organisasi` int(11) NOT NULL,
  `tgl_permohonan` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_data_karsu`
--

CREATE TABLE `tbl_data_karsu` (
  `id_karsu` int(11) NOT NULL,
  `no_reg_karsu` int(11) NOT NULL,
  `nm_pegawai` varchar(114) NOT NULL,
  `nip` varchar(114) NOT NULL,
  `id_pangkat` int(11) NOT NULL,
  `id_golongan` int(11) NOT NULL,
  `id_jabatan` int(11) NOT NULL,
  `unit_organisasi` int(11) NOT NULL,
  `tgl_permohonan` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_data_keluarga`
--

CREATE TABLE `tbl_data_keluarga` (
  `id_data_keluarga` int(50) NOT NULL,
  `id_pegawai` int(50) NOT NULL,
  `nama_anggota_keluarga` varchar(150) NOT NULL,
  `tanggal_lahir` varchar(100) NOT NULL,
  `status_keluarga` varchar(20) NOT NULL,
  `status_kawin` varchar(50) NOT NULL,
  `tanggal_nikah` varchar(100) NOT NULL,
  `tanggal_cerai_meninggal` text NOT NULL,
  `tanggal_meninggal` varchar(110) DEFAULT NULL,
  `pekerjaan` varchar(50) NOT NULL,
  `no_kartu` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_data_organisasi`
--

CREATE TABLE `tbl_data_organisasi` (
  `id_organisasi` int(50) NOT NULL,
  `id_pegawai` int(50) NOT NULL,
  `id_satuan_kerja` int(11) NOT NULL,
  `nomor` varchar(100) NOT NULL,
  `tanggal` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_data_pegawai`
--

CREATE TABLE `tbl_data_pegawai` (
  `id_pegawai` int(50) NOT NULL,
  `nip` varchar(100) NOT NULL,
  `nip_lama` varchar(100) NOT NULL,
  `no_kartu_pegawai` varchar(100) NOT NULL,
  `nama_pegawai` varchar(150) NOT NULL,
  `agama` int(11) NOT NULL DEFAULT '1',
  `tempat_lahir` varchar(150) NOT NULL,
  `tanggal_lahir` varchar(50) NOT NULL,
  `nomor_kk` varchar(114) NOT NULL,
  `nomor_ktp` varchar(114) NOT NULL,
  `jenis_kelamin` varchar(20) NOT NULL,
  `usia` varchar(10) NOT NULL,
  `status_pegawai` varchar(50) NOT NULL,
  `tanggal_pengangkatan_cpns` varchar(50) NOT NULL,
  `alamat` text NOT NULL,
  `no_hp` varchar(114) DEFAULT NULL,
  `email` varchar(114) DEFAULT NULL,
  `no_npwp` varchar(75) NOT NULL,
  `kartu_askes_pegawai` varchar(100) NOT NULL,
  `status_pegawai_pangkat` varchar(50) NOT NULL,
  `id_golongan` int(20) DEFAULT NULL,
  `nomor_sk_pangkat` varchar(50) NOT NULL,
  `tanggal_sk_pangkat` varchar(50) NOT NULL,
  `tanggal_mulai_pangkat` varchar(50) NOT NULL,
  `tanggal_selesai_pangkat` varchar(50) NOT NULL,
  `id_status_jabatan` int(20) NOT NULL,
  `id_jabatan` int(20) NOT NULL,
  `id_unit_kerja` int(20) NOT NULL,
  `id_satuan_kerja` int(20) NOT NULL,
  `nomor_sk_jabatan` varchar(50) NOT NULL,
  `tanggal_sk_jabatan` varchar(50) NOT NULL,
  `tanggal_mulai_jabatan` varchar(50) NOT NULL,
  `tanggal_selesai_jabatan` varchar(50) NOT NULL,
  `id_eselon` int(20) NOT NULL,
  `tmt_eselon` varchar(50) NOT NULL,
  `tmt_cpns` varchar(50) NOT NULL,
  `gaji_pokok` varchar(110) NOT NULL,
  `tmt_pns` varchar(50) NOT NULL,
  `foto` varchar(100) NOT NULL DEFAULT 'avatar.png',
  `gelar_dpn` varchar(114) DEFAULT NULL,
  `gelar_belakang` varchar(114) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_data_pegawai`
--

INSERT INTO `tbl_data_pegawai` (`id_pegawai`, `nip`, `nip_lama`, `no_kartu_pegawai`, `nama_pegawai`, `agama`, `tempat_lahir`, `tanggal_lahir`, `nomor_kk`, `nomor_ktp`, `jenis_kelamin`, `usia`, `status_pegawai`, `tanggal_pengangkatan_cpns`, `alamat`, `no_hp`, `email`, `no_npwp`, `kartu_askes_pegawai`, `status_pegawai_pangkat`, `id_golongan`, `nomor_sk_pangkat`, `tanggal_sk_pangkat`, `tanggal_mulai_pangkat`, `tanggal_selesai_pangkat`, `id_status_jabatan`, `id_jabatan`, `id_unit_kerja`, `id_satuan_kerja`, `nomor_sk_jabatan`, `tanggal_sk_jabatan`, `tanggal_mulai_jabatan`, `tanggal_selesai_jabatan`, `id_eselon`, `tmt_eselon`, `tmt_cpns`, `gaji_pokok`, `tmt_pns`, `foto`, `gelar_dpn`, `gelar_belakang`) VALUES
(1, '195912311986011039', '', '', 'LA AMIRI.SH,MH ', 1, 'Buton,', '31/12/1959', '', '', '1', '', '3', '', '', NULL, NULL, '', '', '', NULL, '', '', '', '', 0, 0, 0, 2, '', '', '', '', 0, '', '01-01-1986', '', '01-10-1987', 'avatar.png', NULL, NULL),
(2, '197012312005022012', '', '', 'HAIDA,S.Pt', 1, 'Baubau', '31-12-1970', '', '', '2', '', '3', '', '', NULL, NULL, '', '', '', NULL, '', '', '', '', 0, 0, 0, 2, '', '', '', '', 0, '', '01-02-2005', '', '01-02-2006', 'avatar.png', NULL, NULL),
(3, '196512311986012013', '', '', 'NURIANI', 1, 'MAWASANGKA', '31-12-1965', '', '', '2', '', '3', '', '', NULL, NULL, '', '', '', NULL, '', '', '', '', 0, 0, 0, 2, '', '', '', '', 0, '', '01-01-1986', '', '01-12-1987', 'avatar.png', NULL, NULL),
(4, '197301082005021001', '', '', 'LA ODE FIRMAN HAMZA,S.Pd.MM', 1, 'Baubau', '08/01/1973', '', '', '1', '', '3', '', '', NULL, NULL, '', '', '', NULL, '', '', '', '', 0, 0, 0, 2, '', '', '', '', 0, '', '01-02-2005', '', '01-02-2006', 'avatar.png', NULL, NULL),
(5, '196212311983031576', '', '', 'RASIDUN,S,Sos ', 1, 'Baubau', '31-12-1962', '', '', '1', '', '3', '', '', NULL, NULL, '', '', '', NULL, '', '', '', '', 0, 0, 0, 2, '', '', '', '', 0, '', '01-03-1983', '', '', 'avatar.png', NULL, NULL),
(6, '196508161987031014', '', '', 'LA HASAN, SE ', 1, '', '16-08-1965', '', '', '1', '', '3', '', '', NULL, NULL, '', '', '', NULL, '', '', '', '', 0, 0, 0, 2, '', '', '', '', 0, '', '', '', '', 'avatar.png', NULL, NULL),
(7, '198410052011011015', '', '', 'ZABARUDIN, SP ', 1, 'Baubau', '05-10-1984', '', '', '1', '', '3', '', '', NULL, NULL, '', '', '', NULL, '', '', '', '', 0, 0, 0, 2, '', '', '', '', 0, '', '01-01-2011', '', '04/01/2012', 'avatar.png', NULL, NULL),
(8, '198210072011012006', '', '', 'WA LIYANA, SE', 1, 'Buton', '07-10-1982', '', '', '2', '', '3', '', '', NULL, NULL, '', '', '', NULL, '', '', '', '', 0, 0, 0, 2, '', '', '', '', 0, '', '01-01-2011', '', '04/01/2012', 'avatar.png', NULL, NULL),
(9, '198310162010012006', '', '', 'RIKA WULANDA, S.Kom, MM', 1, 'Jakarta', '16-10-1983', '', '', '2', '', '3', '', '', NULL, NULL, '', '', '', NULL, '', '', '', '', 0, 0, 0, 2, '', '', '', '', 0, '', '01-01-2010', '', '', 'avatar.png', NULL, NULL),
(10, '199007102012062001', '', '', 'NITAWATI, S.STP ', 1, 'Lamena', '10-07-1990', '', '', '2', '', '3', '', '', NULL, NULL, '', '', '', NULL, '', '', '', '', 0, 0, 0, 2, '', '', '', '', 0, '', '01-06-2012', '', '01-06-2013', 'avatar.png', NULL, NULL),
(11, '198504112014031003', '', '', 'AHMAD JAMALUDDIN, SH., MH', 1, '', '', '', '', '1', '', '3', '', '', NULL, NULL, '', '', '', NULL, '', '', '', '', 0, 0, 0, 2, '', '', '', '', 0, '', '', '', '', 'avatar.png', NULL, NULL),
(12, '196807211997022005', '', '', 'WA ODE HASIYNA, S.IP ', 1, 'Baubau', '21-07-1968', '', '', '2', '', '3', '', '', NULL, NULL, '', '', '', NULL, '', '', '', '', 0, 0, 0, 2, '', '', '', '', 0, '', '01-02-1997', '', '01-05-1998', 'avatar.png', NULL, NULL),
(13, '197003031999032007', '', '', 'ASFA,S.IP ', 1, 'Baubau', '03-03-1970', '', '', '2', '', '3', '', '', NULL, NULL, '', '', '', NULL, '', '', '', '', 0, 0, 0, 2, '', '', '', '', 0, '', '01-03-1999', '', '01-04-2000', 'avatar.png', NULL, NULL),
(14, '198502022012122001', '', '', 'SURIANI ', 1, 'Buton Selatan', '02-02-1985', '', '', '2', '', '3', '', '', NULL, NULL, '', '', '', NULL, '', '', '', '', 0, 0, 0, 2, '', '', '', '', 0, '', '01-12-2012', '', '01-04-2014', 'avatar.png', NULL, NULL),
(15, '197211192012122001', '', '', 'WA ODE SARLINA ', 1, 'Nganganaumala', '19-11-1972', '', '', '2', '', '3', '', '', NULL, NULL, '', '', '', NULL, '', '', '', '', 0, 0, 0, 2, '', '', '', '', 0, '', '01-12-2012', '', '01-04-2014', 'avatar.png', NULL, NULL),
(16, '198503262014072001', '', '', 'FIEN INDRIANI ', 1, 'Baubau', '26-03-1985', '', '', '2', '', '3', '', '', NULL, NULL, '', '', '', NULL, '', '', '', '', 0, 0, 0, 2, '', '', '', '', 0, '', '01-07-2014', '', '01-04-2016', 'avatar.png', NULL, NULL),
(17, '198603232012122002', '', '', 'MERLI WIDIASTUTI', 1, 'Baubau', '23/03/1986', '', '', '2', '', '3', '', '', NULL, NULL, '', '', '', NULL, '', '', '', '', 0, 0, 0, 2, '', '', '', '', 0, '', '01-12-2012', '', '01-04-2014', 'avatar.png', NULL, NULL),
(18, '196612312014081001', '', '', 'LA ODE DIRHAM, S.Sos', 1, '', '', '', '', '1', '', '3', '', '', NULL, NULL, '', '', '', NULL, '', '', '', '', 0, 0, 0, 2, '', '', '', '', 0, '', '', '', '', 'avatar.png', NULL, NULL),
(19, '199006262014021001', '', '', 'ENDY NUR PRATOMO, S.IP', 1, '', '', '', '', '1', '', '3', '', '', NULL, NULL, '', '', '', NULL, '', '', '', '', 0, 0, 0, 2, '', '', '', '', 0, '', '', '', '', 'avatar.png', NULL, NULL),
(20, '195901191998031002', '', '', 'Drs. LA ODE SADIKIN ', 1, 'Buton, ', '19/01/1958', '', '', '1', '', '3', '', '', NULL, NULL, '', '', '', NULL, '', '', '', '', 0, 0, 0, 3, '', '', '', '', 0, '', '03/01/1998', '', '05/01/1999', 'avatar.png', NULL, NULL),
(21, '197512312003121011', '', '', 'LA HARDIN, S. Pd, MM', 1, 'Buton, ', '31/12/1975', '', '', '1', '', '3', '', '', NULL, NULL, '', '', '', NULL, '', '', '', '', 0, 0, 0, 3, '', '', '', '', 0, '', '12/01/2003', '', '01 Februari 2005', 'avatar.png', NULL, NULL),
(22, '197107072000031008', '', '', 'MUCHSIN BIL TAUFIK,S.Hut', 1, 'Baubau, ', '07/07/1971', '', '', '1', '', '3', '', '', NULL, NULL, '', '', '', NULL, '', '', '', '', 0, 0, 0, 3, '', '', '', '', 0, '', '12/01/2001', '', '03/01/2001', 'avatar.png', NULL, NULL),
(23, '196312151993031006', '', '', 'MUHAMAD NASAR, SE', 1, 'BAUBAU', '15-12-1963', '', '', '1', '', '3', '', '', NULL, NULL, '', '', '', NULL, '', '', '', '', 0, 0, 0, 3, '', '', '', '', 0, '', '01-03-1993', '', '01-09-1994', 'avatar.png', NULL, NULL),
(24, '196307221985032009', '', '', 'HJ.HAESINI ABDUL RAHMAN', 1, 'Pungkoihu,', ' 22/07/1963', '', '', '2', '', '3', '', '', NULL, NULL, '', '', '', NULL, '', '', '', '', 0, 0, 0, 3, '', '', '', '', 0, '', '10/01/1986', '', '10/01/1986', 'avatar.png', NULL, NULL),
(25, '197106121994081001', '', '', 'BADIHI, S.Pd', 1, 'Buton, ', '06/12/1971', '', '', '1', '', '3', '', '', NULL, NULL, '', '', '', NULL, '', '', '', '', 0, 0, 0, 3, '', '', '', '', 0, '', '08/01/1994', '', '11/01/1995', 'avatar.png', NULL, NULL),
(26, '196212311984031118', '', '', 'Drs. BAHARUDIN', 1, 'Pamana, ', '31/12/1962', '', '', '1', '', '3', '', '', NULL, NULL, '', '', '', NULL, '', '', '', '', 0, 0, 0, 3, '', '', '', '', 0, '', '03/01/1984', '', '01/01/1985', 'avatar.png', NULL, NULL),
(27, '196013311999031013', '', '', 'Drs.SAHARUDIN AGUS', 1, 'Baubau,', ' 31/12/1960', '', '', '1', '', '3', '', '', NULL, NULL, '', '', '', NULL, '', '', '', '', 0, 0, 0, 3, '', '', '', '', 0, '', '03/01/1999', '', '06/01/2000', 'avatar.png', NULL, NULL),
(28, '196512312006041013', '', '', 'GAFARUDIN,SH', 1, 'Lowu-lowu, ', '31/12/1965', '', '', '1', '', '3', '', '', NULL, NULL, '', '', '', NULL, '', '', '', '', 0, 0, 0, 3, '', '', '', '', 0, '', '01/01/2006', '', '06/01/2007', 'avatar.png', NULL, NULL),
(29, '198003052002122007', '', '', 'ERIYANI MAULANA,S.Sos', 1, 'Boepinang,', ' 05/05/1980', '', '', '2', '', '3', '', '', NULL, NULL, '', '', '', NULL, '', '', '', '', 0, 0, 0, 3, '', '', '', '', 0, '', '12/01/2002', '', '01/02/2004', 'avatar.png', NULL, NULL),
(30, '196310101986032023', '', '', 'SRIWANI', 1, 'Ujung Pandang,', '10/10/1963', '', '', '2', '', '3', '', '', NULL, NULL, '', '', '', NULL, '', '', '', '', 0, 0, 0, 3, '', '', '', '', 0, '', '03/01/1986', '', '12/01/1987', 'avatar.png', NULL, NULL),
(31, '197907012007012010', '', '', 'YETI FAU,S.IP', 1, 'Watuputi, ', '07/01/1997', '', '', '2', '', '3', '', '', NULL, NULL, '', '', '', NULL, '', '', '', '', 0, 0, 0, 3, '', '', '', '', 0, '', '01/01/2007', '', '08/01/2008', 'avatar.png', NULL, NULL),
(32, '197212312006041088', '', '', 'HASAN', 1, '', '', '', '', '1', '', '3', '', '', NULL, NULL, '', '', '', NULL, '', '', '', '', 0, 0, 0, 3, '', '', '', '', 0, '', '', '', '', 'avatar.png', NULL, NULL),
(33, '197405091993111001', '', '', 'Drs. AHMAD BASRI, AP', 1, 'Baubau, ', '09/05/1974', '', '', '1', '', '3', '', '', NULL, NULL, '', '', '', NULL, '', '', '', '', 0, 0, 0, 3, '', '', '', '', 0, '', '11/01/1993', '', '09/01/1995', 'avatar.png', NULL, NULL),
(34, '196302121986032010', '', '', 'ARIYANTI', 1, 'Baubau, ', '12/02/1963', '', '', '2', '', '3', '', '', NULL, NULL, '', '', '', NULL, '', '', '', '', 0, 0, 0, 3, '', '', '', '', 0, '', '03/01/1986', '', '05/01/1987', 'avatar.png', NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_data_pelatihan`
--

CREATE TABLE `tbl_data_pelatihan` (
  `id_pelatihan` int(50) NOT NULL,
  `id_pegawai` int(50) NOT NULL,
  `id_master_pelatihan` int(50) NOT NULL,
  `nama_kursus` varchar(114) NOT NULL,
  `lama_kursus` varchar(114) NOT NULL,
  `tanggal` varchar(50) NOT NULL,
  `no_sertifikat` varchar(50) NOT NULL,
  `instansi` varchar(100) NOT NULL,
  `instansi_penyelenggara` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_data_pendidikan`
--

CREATE TABLE `tbl_data_pendidikan` (
  `id_pendidikan` int(50) NOT NULL,
  `id_pegawai` int(50) NOT NULL,
  `tingkat_pendidikan` int(12) NOT NULL,
  `jurusan` varchar(50) NOT NULL,
  `sekolah` varchar(100) NOT NULL,
  `tempat_sekolah` text NOT NULL,
  `tanggal_lulus` varchar(50) NOT NULL,
  `nomor_ijazah` varchar(114) NOT NULL,
  `id_status` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_data_penghargaan`
--

CREATE TABLE `tbl_data_penghargaan` (
  `id_penghargaan` int(50) NOT NULL,
  `id_pegawai` int(50) NOT NULL,
  `jenis_penghargaan` varchar(114) NOT NULL,
  `no_keputusan` varchar(114) NOT NULL,
  `tanggal` varchar(100) NOT NULL,
  `tahun` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_data_pensiun`
--

CREATE TABLE `tbl_data_pensiun` (
  `id_pensiun` int(11) NOT NULL,
  `no_reg_pensiun` varchar(10) NOT NULL,
  `no_cetak` varchar(114) NOT NULL,
  `nm_pegawai` varchar(114) NOT NULL,
  `nip` varchar(114) NOT NULL,
  `id_pangkat` int(11) NOT NULL,
  `id_golongan` int(11) NOT NULL,
  `id_jabatan` int(11) NOT NULL,
  `no_kartu_pegawai` varchar(114) NOT NULL,
  `tgl_permohonan` varchar(114) NOT NULL,
  `nomor_hp` varchar(114) NOT NULL,
  `id_satuan_kerja` int(11) NOT NULL,
  `alamat_rumah_skr` text NOT NULL,
  `alamat_rumah_pensiun` text NOT NULL,
  `upload` varchar(114) NOT NULL,
  `status` int(11) NOT NULL,
  `tgl_create` date DEFAULT NULL,
  `waktu_create` time DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_data_pidah_wilayah_kerja_masuk`
--

CREATE TABLE `tbl_data_pidah_wilayah_kerja_masuk` (
  `id_pindah_wilayah_kerja_masuk` int(11) NOT NULL,
  `no_reg_pindah` varchar(10) NOT NULL,
  `nm_pegawai` varchar(114) NOT NULL,
  `nip` varchar(114) NOT NULL,
  `tgl_masuk` varchar(15) NOT NULL,
  `id_pangkat` int(11) NOT NULL,
  `id_golongan` int(11) NOT NULL,
  `id_jabatan` int(11) NOT NULL,
  `instansi` varchar(114) NOT NULL,
  `tgl_permohonan` varchar(20) NOT NULL,
  `ket` text NOT NULL,
  `pejabat` varchar(114) NOT NULL,
  `alamat_ibu_kota` varchar(114) NOT NULL,
  `instansi_lama` varchar(114) NOT NULL,
  `instansi_baru` varchar(114) NOT NULL,
  `tembusan_1` varchar(114) NOT NULL,
  `tembusan_2` varchar(114) NOT NULL,
  `tembusan_3` varchar(114) NOT NULL,
  `unit_kerja` varchar(114) NOT NULL,
  `upload` varchar(114) NOT NULL,
  `status` int(11) NOT NULL,
  `tgl_create` date DEFAULT NULL,
  `waktu_create` time DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_data_pindah_wilayah_kerja_keluar`
--

CREATE TABLE `tbl_data_pindah_wilayah_kerja_keluar` (
  `id_pindah_wilayah_kerja_keluar` int(11) NOT NULL,
  `no_req_pindah` varchar(10) NOT NULL,
  `no_cetak` varchar(114) NOT NULL,
  `tgl_masuk` varchar(114) NOT NULL,
  `id_pegawai` int(11) NOT NULL,
  `nip` varchar(114) NOT NULL,
  `id_pangkat` int(11) NOT NULL,
  `id_golongan` int(11) NOT NULL,
  `id_jabatan` varchar(114) NOT NULL,
  `unit_organisasi_asal` varchar(114) NOT NULL,
  `tgl_permohonan_asal` varchar(114) NOT NULL,
  `no_sk_tujuan` varchar(114) NOT NULL,
  `tgl_sk_tujuan` varchar(114) NOT NULL,
  `pejabat_daerah` varchar(114) NOT NULL,
  `pejabat_provinsi` varchar(114) NOT NULL,
  `ibu_kota_provinsi` varchar(114) NOT NULL,
  `instansi_lama` varchar(114) NOT NULL,
  `instansi_baru` varchar(114) NOT NULL,
  `tembusan_1` varchar(114) NOT NULL,
  `tembusan_2` varchar(114) NOT NULL,
  `upload` varchar(14) NOT NULL,
  `status` int(11) NOT NULL,
  `tgl_create` date DEFAULT NULL,
  `waktu_create` time DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_data_riwayat_eselon`
--

CREATE TABLE `tbl_data_riwayat_eselon` (
  `id_riwayat_eselon` int(11) NOT NULL,
  `id_pegawai` int(11) NOT NULL,
  `id_eselon` int(11) NOT NULL,
  `id_jenis_jabatan` int(11) NOT NULL,
  `nm_jabatan` varchar(114) NOT NULL,
  `nomor_sk` varchar(50) NOT NULL,
  `upload` varchar(114) NOT NULL,
  `status` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_data_riwayat_golongan`
--

CREATE TABLE `tbl_data_riwayat_golongan` (
  `id_riwayat_golongan` int(100) NOT NULL,
  `id_pegawai` int(50) NOT NULL,
  `id_golongan` int(50) DEFAULT NULL,
  `nomor_sk` varchar(50) NOT NULL,
  `tanggal_sk` varchar(50) NOT NULL,
  `tmt_golongan` varchar(50) NOT NULL,
  `nomor_bkn` varchar(100) NOT NULL,
  `tanggal_bkn` varchar(50) NOT NULL,
  `masa_kerja` varchar(110) DEFAULT NULL,
  `upload` varchar(114) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_data_riwayat_jabatan`
--

CREATE TABLE `tbl_data_riwayat_jabatan` (
  `id_riwayat_jabatan` int(50) NOT NULL,
  `id_pegawai` int(50) NOT NULL,
  `id_jenis_jabatan` int(11) NOT NULL,
  `nm_jabatan` varchar(114) DEFAULT NULL,
  `id_jabatan` int(11) NOT NULL,
  `id_satuan_kerja` int(11) NOT NULL,
  `id_eselon` int(11) NOT NULL,
  `tmt_jabatan_rj` date NOT NULL,
  `tanggal_sk_rj` date NOT NULL,
  `tmt_pelantikan_rj` date DEFAULT NULL,
  `nomor_sk` varchar(114) DEFAULT NULL,
  `upload` varchar(114) NOT NULL,
  `status` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_data_riwayat_pangkat`
--

CREATE TABLE `tbl_data_riwayat_pangkat` (
  `id_riwayat_pangkat` int(50) NOT NULL,
  `id_pegawai` int(50) NOT NULL,
  `id_pangkat` int(30) NOT NULL,
  `status` varchar(50) NOT NULL,
  `nomor_sk` varchar(50) NOT NULL,
  `tanggal_sk` varchar(50) NOT NULL,
  `tanggal_mulai` varchar(50) NOT NULL,
  `tanggal_selesai` varchar(50) NOT NULL,
  `masa_kerja` varchar(30) NOT NULL,
  `masa_kerja_bulan` int(11) NOT NULL,
  `masa_kerja_tahun` int(11) NOT NULL,
  `upload` varchar(114) NOT NULL,
  `status_pangkat` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_data_seminar`
--

CREATE TABLE `tbl_data_seminar` (
  `id_seminar` int(50) NOT NULL,
  `id_pegawai` int(50) NOT NULL,
  `uraian` text NOT NULL,
  `lokasi` varchar(100) NOT NULL,
  `tanggal` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_form_ijinbelajar`
--

CREATE TABLE `tbl_form_ijinbelajar` (
  `id_form_ijinbelajar` int(11) NOT NULL,
  `id_pegawai` int(11) NOT NULL,
  `tgl_create` int(11) NOT NULL,
  `upload_1` varchar(114) NOT NULL,
  `upload_2` varchar(114) NOT NULL,
  `upload_3` varchar(114) NOT NULL,
  `upload_4` varchar(114) NOT NULL,
  `upload_5` varchar(114) NOT NULL,
  `upload_6` varchar(114) NOT NULL,
  `upload_7` varchar(114) NOT NULL,
  `upload_8` varchar(114) NOT NULL,
  `upload_9` varchar(114) NOT NULL,
  `upload_10` varchar(114) NOT NULL,
  `upload_11` varchar(114) NOT NULL,
  `upload_12` varchar(114) NOT NULL,
  `upload_13` varchar(114) NOT NULL,
  `upload_14` varchar(114) NOT NULL,
  `upload_15` varchar(114) NOT NULL,
  `id_sts_1` int(11) NOT NULL DEFAULT '1',
  `id_sts_2` int(11) NOT NULL DEFAULT '1',
  `id_sts_3` int(11) NOT NULL DEFAULT '1',
  `id_sts_4` int(11) NOT NULL DEFAULT '1',
  `id_sts_5` int(11) NOT NULL DEFAULT '1',
  `id_sts_6` int(11) NOT NULL DEFAULT '1',
  `id_sts_7` int(11) NOT NULL DEFAULT '1',
  `id_sts_8` int(11) NOT NULL DEFAULT '1',
  `id_sts_9` int(11) NOT NULL DEFAULT '1',
  `id_sts_10` int(11) NOT NULL DEFAULT '1',
  `id_sts_11` int(11) NOT NULL DEFAULT '1',
  `id_sts_12` int(11) NOT NULL DEFAULT '1',
  `id_sts_13` int(11) NOT NULL DEFAULT '1',
  `id_sts_14` int(11) NOT NULL DEFAULT '1',
  `id_sts_15` int(11) NOT NULL DEFAULT '1',
  `verifikasi_1` int(11) NOT NULL,
  `verifikasi_2` int(11) NOT NULL,
  `verifikasi_3` int(11) NOT NULL,
  `verifikasi_4` int(11) NOT NULL,
  `verifikasi_5` int(11) NOT NULL,
  `verifikasi_6` int(11) NOT NULL,
  `verifikasi_7` int(11) NOT NULL,
  `verifikasi_8` int(11) NOT NULL,
  `verifikasi_9` int(11) NOT NULL,
  `verifikasi_10` int(11) NOT NULL,
  `verifikasi_11` int(11) NOT NULL,
  `verifikasi_12` int(11) NOT NULL,
  `verifikasi_13` int(11) NOT NULL,
  `verifikasi_14` int(11) NOT NULL,
  `verifikasi_15` int(11) NOT NULL,
  `ket_1` varchar(114) NOT NULL,
  `ket_2` varchar(114) NOT NULL,
  `ket_3` varchar(114) NOT NULL,
  `ket_4` varchar(114) NOT NULL,
  `ket_5` varchar(114) NOT NULL,
  `ket_6` varchar(114) NOT NULL,
  `ket_7` varchar(114) NOT NULL,
  `ket_8` varchar(114) NOT NULL,
  `ket_9` varchar(114) NOT NULL,
  `ket_10` varchar(114) NOT NULL,
  `ket_11` varchar(114) NOT NULL,
  `ket_12` varchar(114) NOT NULL,
  `ket_13` varchar(114) NOT NULL,
  `ket_14` varchar(114) NOT NULL,
  `ket_15` varchar(114) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_form_karpeg`
--

CREATE TABLE `tbl_form_karpeg` (
  `id_form_karpeg` int(11) NOT NULL,
  `id_pegawai` int(11) NOT NULL,
  `upload_1` varchar(114) DEFAULT NULL,
  `upload_2` varchar(114) DEFAULT NULL,
  `upload_3` varchar(114) DEFAULT NULL,
  `upload_4` varchar(114) DEFAULT NULL,
  `upload_5` varchar(114) DEFAULT NULL,
  `upload_6` varchar(114) DEFAULT NULL,
  `upload_7` varchar(114) DEFAULT NULL,
  `tgl_create` date NOT NULL,
  `id_sts_1` int(11) NOT NULL DEFAULT '1',
  `id_sts_2` int(11) NOT NULL DEFAULT '1',
  `id_sts_3` int(11) NOT NULL DEFAULT '1',
  `id_sts_4` int(11) NOT NULL DEFAULT '1',
  `id_sts_5` int(11) NOT NULL DEFAULT '1',
  `id_sts_6` int(11) NOT NULL DEFAULT '1',
  `id_sts_7` int(11) NOT NULL DEFAULT '1',
  `verifikasi_1` int(11) NOT NULL,
  `verifikasi_2` int(11) NOT NULL,
  `verifikasi_3` int(11) NOT NULL,
  `verifikasi_4` int(11) NOT NULL,
  `verifikasi_5` int(11) NOT NULL,
  `verifikasi_6` int(11) NOT NULL,
  `verifikasi_7` int(11) NOT NULL,
  `ket_1` varchar(114) NOT NULL,
  `ket_2` varchar(114) NOT NULL,
  `ket_3` varchar(114) NOT NULL,
  `ket_4` varchar(114) NOT NULL,
  `ket_5` varchar(114) NOT NULL,
  `ket_6` varchar(114) NOT NULL,
  `ket_7` varchar(114) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_form_karsi`
--

CREATE TABLE `tbl_form_karsi` (
  `id_form_karsi` int(11) NOT NULL,
  `id_pegawai` int(11) NOT NULL,
  `upload_1` varchar(114) NOT NULL,
  `upload_2` varchar(114) NOT NULL,
  `upload_3` varchar(114) NOT NULL,
  `upload_4` varchar(114) NOT NULL,
  `upload_5` varchar(114) NOT NULL,
  `upload_6` varchar(114) NOT NULL,
  `upload_7` varchar(114) NOT NULL,
  `tgl_create` date NOT NULL,
  `id_sts_1` int(11) NOT NULL DEFAULT '1',
  `id_sts_2` int(11) NOT NULL DEFAULT '1',
  `id_sts_3` int(11) NOT NULL DEFAULT '1',
  `id_sts_4` int(11) NOT NULL DEFAULT '1',
  `id_sts_5` int(11) NOT NULL DEFAULT '1',
  `id_sts_6` int(11) NOT NULL DEFAULT '1',
  `id_sts_7` int(11) NOT NULL DEFAULT '1',
  `verifikasi_1` int(11) NOT NULL,
  `verifikasi_2` int(11) NOT NULL,
  `verifikasi_3` int(11) NOT NULL,
  `verifikasi_4` int(11) NOT NULL,
  `verifikasi_5` int(11) NOT NULL,
  `verifikasi_6` int(11) NOT NULL,
  `verifikasi_7` int(11) NOT NULL,
  `ket_1` varchar(114) NOT NULL,
  `ket_2` varchar(114) NOT NULL,
  `ket_3` varchar(114) NOT NULL,
  `ket_4` varchar(114) NOT NULL,
  `ket_5` varchar(114) NOT NULL,
  `ket_6` varchar(114) NOT NULL,
  `ket_7` varchar(114) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_form_karsu`
--

CREATE TABLE `tbl_form_karsu` (
  `id_form_karsu` int(11) NOT NULL,
  `id_pegawai` int(11) NOT NULL,
  `upload_1` varchar(114) NOT NULL,
  `upload_2` varchar(114) NOT NULL,
  `upload_3` varchar(114) NOT NULL,
  `upload_4` varchar(114) NOT NULL,
  `upload_5` varchar(114) NOT NULL,
  `upload_6` varchar(114) NOT NULL,
  `upload_7` varchar(114) NOT NULL,
  `tgl_create` date NOT NULL,
  `id_sts_1` int(11) NOT NULL DEFAULT '1',
  `id_sts_2` int(11) NOT NULL DEFAULT '1',
  `id_sts_3` int(11) NOT NULL DEFAULT '1',
  `id_sts_4` int(11) NOT NULL DEFAULT '1',
  `id_sts_5` int(11) NOT NULL DEFAULT '1',
  `id_sts_6` int(11) NOT NULL DEFAULT '1',
  `id_sts_7` int(11) NOT NULL DEFAULT '1',
  `verifikasi_1` int(11) NOT NULL,
  `verifikasi_2` int(11) NOT NULL,
  `verifikasi_3` int(11) NOT NULL,
  `verifikasi_4` int(11) NOT NULL,
  `verifikasi_5` int(11) NOT NULL,
  `verifikasi_6` int(11) NOT NULL,
  `verifikasi_7` int(11) NOT NULL,
  `ket_1` varchar(114) NOT NULL,
  `ket_2` varchar(114) NOT NULL,
  `ket_3` varchar(114) NOT NULL,
  `ket_4` varchar(114) NOT NULL,
  `ket_5` varchar(114) NOT NULL,
  `ket_6` varchar(114) NOT NULL,
  `ket_7` varchar(114) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_form_pensiun`
--

CREATE TABLE `tbl_form_pensiun` (
  `id_form_pensiun` int(11) NOT NULL,
  `id_pegawai` int(11) NOT NULL,
  `upload_1` varchar(114) DEFAULT NULL COMMENT 'DATA PERORANGAN CALON PENERIMA PENSIUN (DPCP)',
  `upload_2` varchar(114) DEFAULT NULL COMMENT 'SURAT REKOMENDASI/SURAT KEPUTUSAN YANG DI TTD BUPATI',
  `upload_3` varchar(114) DEFAULT NULL,
  `upload_4` varchar(114) DEFAULT NULL,
  `upload_5` varchar(114) DEFAULT NULL,
  `upload_6` varchar(114) DEFAULT NULL,
  `upload_7` varchar(114) DEFAULT NULL,
  `upload_8` varchar(114) DEFAULT NULL,
  `upload_9` varchar(114) DEFAULT NULL,
  `upload_10` varchar(114) DEFAULT NULL,
  `upload_11` varchar(114) DEFAULT NULL,
  `upload_12` varchar(114) DEFAULT NULL,
  `upload_13` varchar(114) DEFAULT NULL,
  `upload_14` varchar(114) DEFAULT NULL,
  `upload_15` varchar(114) DEFAULT NULL,
  `upload_16` varchar(114) DEFAULT NULL,
  `upload_17` varchar(114) DEFAULT NULL,
  `upload_18` varchar(114) DEFAULT NULL,
  `upload_19` varchar(114) DEFAULT NULL,
  `upload_20` varchar(114) DEFAULT NULL,
  `upload_21` varchar(114) DEFAULT NULL,
  `upload_22` varchar(114) DEFAULT NULL,
  `upload_23` varchar(114) DEFAULT NULL,
  `upload_24` varchar(114) DEFAULT NULL,
  `id_sts_24` int(11) NOT NULL DEFAULT '1',
  `tgl_create` date NOT NULL,
  `id_sts_1` int(11) NOT NULL DEFAULT '1',
  `id_sts_2` int(11) NOT NULL DEFAULT '1',
  `id_sts_3` int(11) NOT NULL DEFAULT '1',
  `id_sts_4` int(11) NOT NULL DEFAULT '1',
  `id_sts_5` int(11) NOT NULL DEFAULT '1',
  `id_sts_6` int(11) NOT NULL DEFAULT '1',
  `id_sts_7` int(11) NOT NULL DEFAULT '1',
  `id_sts_8` int(11) NOT NULL DEFAULT '1',
  `id_sts_9` int(11) NOT NULL DEFAULT '1',
  `id_sts_10` int(11) NOT NULL DEFAULT '1',
  `id_sts_11` int(11) NOT NULL DEFAULT '1',
  `id_sts_12` int(11) NOT NULL DEFAULT '1',
  `id_sts_13` int(11) NOT NULL DEFAULT '1',
  `id_sts_14` int(11) NOT NULL DEFAULT '1',
  `id_sts_15` int(11) NOT NULL DEFAULT '1',
  `id_sts_16` int(11) NOT NULL DEFAULT '1',
  `id_sts_17` int(11) NOT NULL,
  `id_sts_18` int(11) NOT NULL DEFAULT '1',
  `id_sts_19` int(11) NOT NULL DEFAULT '1',
  `id_sts_20` int(11) NOT NULL DEFAULT '1',
  `id_sts_21` int(11) NOT NULL DEFAULT '1',
  `id_sts_22` int(11) NOT NULL DEFAULT '1',
  `id_sts_23` int(11) NOT NULL DEFAULT '1',
  `verifikasi_1` int(11) NOT NULL,
  `verifikasi_2` int(11) NOT NULL,
  `verifikasi_3` int(11) NOT NULL,
  `verifikasi_4` int(11) NOT NULL,
  `verifikasi_5` int(11) NOT NULL,
  `verifikasi_6` int(11) NOT NULL,
  `verifikasi_7` int(11) NOT NULL,
  `verifikasi_8` int(11) NOT NULL,
  `verifikasi_9` int(11) NOT NULL,
  `verifikasi_10` int(11) NOT NULL,
  `verifikasi_11` int(11) NOT NULL,
  `verifikasi_12` int(11) NOT NULL,
  `verifikasi_13` int(11) NOT NULL,
  `verifikasi_14` int(11) NOT NULL,
  `verifikasi_15` int(11) NOT NULL,
  `verifikasi_16` int(11) NOT NULL,
  `verifikasi_17` int(11) NOT NULL,
  `verifikasi_18` int(11) NOT NULL,
  `verifikasi_19` int(11) NOT NULL,
  `verifikasi_20` int(11) NOT NULL,
  `verifikasi_21` int(11) NOT NULL,
  `verifikasi_22` int(11) NOT NULL,
  `verifikasi_23` int(11) NOT NULL,
  `verifikasi_24` int(11) NOT NULL,
  `ket_1` varchar(114) NOT NULL,
  `ket_2` varchar(114) NOT NULL,
  `ket_3` varchar(114) NOT NULL,
  `ket_4` varchar(114) NOT NULL,
  `ket_5` varchar(114) NOT NULL,
  `ket_6` varchar(114) NOT NULL,
  `ket_7` varchar(114) NOT NULL,
  `ket_8` varchar(114) NOT NULL,
  `ket_9` varchar(114) NOT NULL,
  `ket_10` varchar(114) NOT NULL,
  `ket_11` varchar(114) NOT NULL,
  `ket_12` varchar(114) NOT NULL,
  `ket_13` varchar(114) NOT NULL,
  `ket_14` varchar(114) NOT NULL,
  `ket_15` varchar(114) NOT NULL,
  `ket_16` varchar(114) NOT NULL,
  `ket_17` varchar(114) NOT NULL,
  `ket_18` varchar(114) NOT NULL,
  `ket_19` varchar(114) NOT NULL,
  `ket_20` varchar(114) NOT NULL,
  `ket_21` varchar(114) NOT NULL,
  `ket_22` varchar(114) NOT NULL,
  `ket_23` varchar(114) NOT NULL,
  `ket_24` varchar(114) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_form_pensiunbup`
--

CREATE TABLE `tbl_form_pensiunbup` (
  `id_form_pensiunbup` int(11) NOT NULL,
  `id_pegawai` int(11) NOT NULL,
  `upload_1` varchar(114) DEFAULT NULL COMMENT 'DATA PERORANGAN CALON PENERIMA PENSIUN (DPCP)',
  `upload_2` varchar(114) DEFAULT NULL COMMENT 'SURAT REKOMENDASI/SURAT KEPUTUSAN YANG DI TTD BUPATI',
  `upload_3` varchar(114) DEFAULT NULL,
  `upload_4` varchar(114) DEFAULT NULL,
  `upload_5` varchar(114) DEFAULT NULL,
  `upload_6` varchar(114) DEFAULT NULL,
  `upload_7` varchar(114) DEFAULT NULL,
  `upload_8` varchar(114) DEFAULT NULL,
  `upload_9` varchar(114) DEFAULT NULL,
  `upload_10` varchar(114) DEFAULT NULL,
  `upload_11` varchar(114) DEFAULT NULL,
  `upload_12` varchar(114) DEFAULT NULL,
  `upload_13` varchar(114) DEFAULT NULL,
  `upload_14` varchar(114) DEFAULT NULL,
  `upload_15` varchar(114) DEFAULT NULL,
  `upload_16` varchar(114) DEFAULT NULL,
  `upload_17` varchar(114) DEFAULT NULL,
  `upload_18` varchar(114) DEFAULT NULL,
  `upload_19` varchar(114) DEFAULT NULL,
  `upload_20` varchar(114) DEFAULT NULL,
  `upload_21` varchar(114) DEFAULT NULL,
  `upload_22` varchar(114) DEFAULT NULL,
  `upload_23` varchar(114) DEFAULT NULL,
  `tgl_create` date NOT NULL,
  `id_sts_1` int(11) NOT NULL DEFAULT '1',
  `id_sts_2` int(11) NOT NULL DEFAULT '1',
  `id_sts_3` int(11) NOT NULL DEFAULT '1',
  `id_sts_4` int(11) NOT NULL DEFAULT '1',
  `id_sts_5` int(11) NOT NULL DEFAULT '1',
  `id_sts_6` int(11) NOT NULL DEFAULT '1',
  `id_sts_7` int(11) NOT NULL DEFAULT '1',
  `id_sts_8` int(11) NOT NULL DEFAULT '1',
  `id_sts_9` int(11) NOT NULL DEFAULT '1',
  `id_sts_10` int(11) NOT NULL DEFAULT '1',
  `id_sts_11` int(11) NOT NULL DEFAULT '1',
  `id_sts_12` int(11) NOT NULL DEFAULT '1',
  `id_sts_13` int(11) NOT NULL DEFAULT '1',
  `id_sts_14` int(11) NOT NULL DEFAULT '1',
  `id_sts_15` int(11) NOT NULL DEFAULT '1',
  `id_sts_16` int(11) NOT NULL DEFAULT '1',
  `id_sts_17` int(11) NOT NULL DEFAULT '1',
  `id_sts_18` int(11) NOT NULL DEFAULT '1',
  `id_sts_19` int(11) NOT NULL DEFAULT '1',
  `id_sts_20` int(11) NOT NULL DEFAULT '1',
  `id_sts_21` int(11) NOT NULL DEFAULT '1',
  `id_sts_22` int(11) NOT NULL DEFAULT '1',
  `id_sts_23` int(11) NOT NULL DEFAULT '1',
  `verifikasi_1` int(11) NOT NULL,
  `verifikasi_2` int(11) NOT NULL,
  `verifikasi_3` int(11) NOT NULL,
  `verifikasi_4` int(11) NOT NULL,
  `verifikasi_5` int(11) NOT NULL,
  `verifikasi_6` int(11) NOT NULL,
  `verifikasi_7` int(11) NOT NULL,
  `verifikasi_8` int(11) NOT NULL,
  `verifikasi_9` int(11) NOT NULL,
  `verifikasi_10` int(11) NOT NULL,
  `verifikasi_11` int(11) NOT NULL,
  `verifikasi_12` int(11) NOT NULL,
  `verifikasi_13` int(11) NOT NULL,
  `verifikasi_14` int(11) NOT NULL,
  `verifikasi_15` int(11) NOT NULL,
  `verifikasi_16` int(11) NOT NULL,
  `verifikasi_17` int(11) NOT NULL,
  `verifikasi_18` int(11) NOT NULL,
  `verifikasi_19` int(11) NOT NULL,
  `verifikasi_20` int(11) NOT NULL,
  `verifikasi_21` int(11) NOT NULL,
  `verifikasi_22` int(11) NOT NULL,
  `verifikasi_23` int(11) NOT NULL,
  `ket_1` varchar(114) NOT NULL,
  `ket_2` varchar(114) NOT NULL,
  `ket_3` varchar(114) NOT NULL,
  `ket_4` varchar(114) NOT NULL,
  `ket_5` varchar(114) NOT NULL,
  `ket_6` varchar(114) NOT NULL,
  `ket_7` varchar(114) NOT NULL,
  `ket_8` varchar(114) NOT NULL,
  `ket_9` varchar(114) NOT NULL,
  `ket_10` varchar(114) NOT NULL,
  `ket_11` varchar(114) NOT NULL,
  `ket_12` varchar(114) NOT NULL,
  `ket_13` varchar(114) NOT NULL,
  `ket_14` varchar(114) NOT NULL,
  `ket_15` varchar(114) NOT NULL,
  `ket_16` varchar(114) NOT NULL,
  `ket_17` varchar(114) NOT NULL,
  `ket_18` varchar(114) NOT NULL,
  `ket_19` varchar(114) NOT NULL,
  `ket_20` varchar(114) NOT NULL,
  `ket_21` varchar(114) NOT NULL,
  `ket_22` varchar(114) NOT NULL,
  `ket_23` varchar(114) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_form_pindahinstansi`
--

CREATE TABLE `tbl_form_pindahinstansi` (
  `id_form_pindah` int(11) NOT NULL,
  `id_pegawai` int(11) NOT NULL,
  `upload_1` varchar(114) NOT NULL,
  `upload_2` varchar(114) NOT NULL,
  `upload_3` varchar(114) NOT NULL,
  `upload_4` varchar(114) NOT NULL,
  `upload_5` varchar(114) NOT NULL,
  `upload_6` int(11) NOT NULL,
  `upload_7` int(11) NOT NULL,
  `upload_8` int(11) NOT NULL,
  `upload_9` int(11) NOT NULL,
  `upload_10` int(11) NOT NULL,
  `upload_11` int(11) NOT NULL,
  `tgl_create` date NOT NULL,
  `id_sts_1` int(11) NOT NULL DEFAULT '1',
  `id_sts_2` int(11) NOT NULL DEFAULT '1',
  `id_sts_3` int(11) NOT NULL DEFAULT '1',
  `id_sts_4` int(11) NOT NULL DEFAULT '1',
  `id_sts_5` int(11) NOT NULL DEFAULT '1',
  `id_sts_6` int(11) NOT NULL DEFAULT '1',
  `id_sts_7` int(11) NOT NULL DEFAULT '1',
  `id_sts_8` int(11) NOT NULL DEFAULT '1',
  `id_sts_9` int(11) NOT NULL DEFAULT '1',
  `id_sts_10` int(11) NOT NULL DEFAULT '1',
  `id_sts_11` int(11) NOT NULL DEFAULT '1',
  `verifikasi_1` int(11) NOT NULL,
  `verifikasi_2` int(11) NOT NULL,
  `verifikasi_3` int(11) NOT NULL,
  `verifikasi_4` int(11) NOT NULL,
  `verifikasi_5` int(11) NOT NULL,
  `verifikasi_6` int(11) NOT NULL,
  `verifikasi_7` int(11) NOT NULL,
  `verifikasi_8` int(11) NOT NULL,
  `verifikasi_9` int(11) NOT NULL,
  `verifikasi_10` int(11) NOT NULL,
  `verifikasi_11` int(11) NOT NULL,
  `ket_1` varchar(114) NOT NULL,
  `ket_2` varchar(114) NOT NULL,
  `ket_3` varchar(114) NOT NULL,
  `ket_4` varchar(114) NOT NULL,
  `ket_5` varchar(114) NOT NULL,
  `ket_6` varchar(114) NOT NULL,
  `ket_7` varchar(114) NOT NULL,
  `ket_8` varchar(114) NOT NULL,
  `ket_9` varchar(114) NOT NULL,
  `ket_10` varchar(114) NOT NULL,
  `ket_11` varchar(114) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_form_pwkkeluar`
--

CREATE TABLE `tbl_form_pwkkeluar` (
  `id_form_pwkkeluar` int(11) NOT NULL,
  `id_pegawai` int(11) NOT NULL,
  `upload_1` varchar(114) DEFAULT NULL,
  `upload_2` varchar(114) DEFAULT NULL,
  `upload_3` varchar(114) DEFAULT NULL,
  `upload_4` varchar(114) DEFAULT NULL,
  `upload_5` varchar(114) DEFAULT NULL,
  `upload_6` int(11) NOT NULL,
  `upload_7` int(11) NOT NULL,
  `upload_8` int(11) NOT NULL,
  `upload_9` int(11) NOT NULL,
  `upload_10` int(11) NOT NULL,
  `tgl_create` date NOT NULL,
  `id_sts_1` int(11) NOT NULL DEFAULT '1',
  `id_sts_2` int(11) NOT NULL DEFAULT '1',
  `id_sts_3` int(11) NOT NULL DEFAULT '1',
  `id_sts_4` int(11) NOT NULL DEFAULT '1',
  `id_sts_5` int(11) NOT NULL DEFAULT '1',
  `id_sts_6` int(11) NOT NULL DEFAULT '1',
  `id_sts_7` int(11) NOT NULL DEFAULT '1',
  `id_sts_8` int(11) NOT NULL DEFAULT '1',
  `id_sts_9` int(11) NOT NULL DEFAULT '1',
  `id_sts_10` int(11) NOT NULL DEFAULT '1',
  `verifikasi_1` int(11) NOT NULL,
  `verifikasi_2` int(11) NOT NULL,
  `verifikasi_3` int(11) NOT NULL,
  `verifikasi_4` int(11) NOT NULL,
  `verifikasi_5` int(11) NOT NULL,
  `verifikasi_6` int(11) NOT NULL,
  `verifikasi_7` int(11) NOT NULL,
  `verifikasi_8` int(11) NOT NULL,
  `verifikasi_9` int(11) NOT NULL,
  `verifikasi_10` int(11) NOT NULL,
  `ket_1` varchar(114) NOT NULL,
  `ket_2` varchar(114) NOT NULL,
  `ket_3` varchar(114) NOT NULL,
  `ket_4` varchar(114) NOT NULL,
  `ket_5` varchar(114) NOT NULL,
  `ket_6` varchar(114) NOT NULL,
  `ket_7` varchar(114) NOT NULL,
  `ket_8` varchar(114) NOT NULL,
  `ket_9` varchar(114) NOT NULL,
  `ket_10` varchar(114) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_form_pwkmasuk`
--

CREATE TABLE `tbl_form_pwkmasuk` (
  `id_form_pwkmasuk` int(11) NOT NULL,
  `id_pegawai` int(11) DEFAULT NULL,
  `upload_1` varchar(114) DEFAULT NULL,
  `upload_2` varchar(114) DEFAULT NULL,
  `upload_3` varchar(114) DEFAULT NULL,
  `upload_4` varchar(114) DEFAULT NULL,
  `upload_5` varchar(114) DEFAULT NULL,
  `upload_6` varchar(114) NOT NULL,
  `upload_7` varchar(114) NOT NULL,
  `upload_8` varchar(114) NOT NULL,
  `upload_9` varchar(114) NOT NULL,
  `tgl_create` int(11) NOT NULL,
  `id_sts_1` int(11) NOT NULL DEFAULT '1',
  `id_sts_2` int(11) NOT NULL DEFAULT '1',
  `id_sts_3` int(11) NOT NULL DEFAULT '1',
  `id_sts_4` int(11) NOT NULL DEFAULT '1',
  `id_sts_5` int(11) NOT NULL DEFAULT '1',
  `id_sts_6` int(11) NOT NULL DEFAULT '1',
  `id_sts_7` int(11) NOT NULL DEFAULT '1',
  `id_sts_8` int(11) NOT NULL DEFAULT '1',
  `id_sts_9` int(11) NOT NULL DEFAULT '1',
  `verifikasi_1` int(11) NOT NULL,
  `verifikasi_2` int(11) NOT NULL,
  `verifikasi_3` int(11) NOT NULL,
  `verifikasi_4` int(11) NOT NULL,
  `verifikasi_5` int(11) NOT NULL,
  `verifikasi_6` int(11) NOT NULL,
  `verifikasi_7` int(11) NOT NULL,
  `verifikasi_8` int(11) NOT NULL,
  `verifikasi_9` int(11) NOT NULL,
  `ket_1` varchar(114) NOT NULL,
  `ket_2` varchar(114) NOT NULL,
  `ket_3` varchar(114) NOT NULL,
  `ket_4` varchar(114) NOT NULL,
  `ket_5` varchar(114) NOT NULL,
  `ket_6` varchar(114) NOT NULL,
  `ket_7` varchar(114) NOT NULL,
  `ket_8` varchar(114) NOT NULL,
  `ket_9` varchar(114) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_form_tugasbelajar`
--

CREATE TABLE `tbl_form_tugasbelajar` (
  `id_form_tugasbelajar` int(11) NOT NULL,
  `id_pegawai` int(11) NOT NULL,
  `tgl_create` date NOT NULL,
  `upload_1` varchar(114) NOT NULL,
  `upload_2` varchar(114) NOT NULL,
  `upload_3` varchar(114) NOT NULL,
  `upload_4` varchar(114) NOT NULL,
  `upload_5` varchar(114) NOT NULL,
  `upload_6` varchar(114) NOT NULL,
  `upload_7` varchar(114) NOT NULL,
  `upload_8` varchar(114) NOT NULL,
  `upload_9` varchar(114) NOT NULL,
  `upload_10` varchar(114) NOT NULL,
  `upload_11` varchar(114) NOT NULL,
  `upload_12` varchar(114) NOT NULL,
  `upload_13` varchar(114) NOT NULL,
  `upload_14` varchar(114) NOT NULL,
  `upload_15` varchar(114) NOT NULL,
  `upload_16` varchar(114) NOT NULL,
  `upload_17` varchar(114) NOT NULL,
  `id_sts_1` int(11) NOT NULL DEFAULT '1',
  `id_sts_2` int(11) NOT NULL DEFAULT '1',
  `id_sts_3` int(11) NOT NULL DEFAULT '1',
  `id_sts_4` int(11) NOT NULL DEFAULT '1',
  `id_sts_5` int(11) NOT NULL DEFAULT '1',
  `id_sts_6` int(11) NOT NULL DEFAULT '1',
  `id_sts_7` int(11) NOT NULL DEFAULT '1',
  `id_sts_8` int(11) NOT NULL DEFAULT '1',
  `id_sts_9` int(11) NOT NULL DEFAULT '1',
  `id_sts_10` int(11) NOT NULL DEFAULT '1',
  `id_sts_11` int(11) NOT NULL DEFAULT '1',
  `id_sts_12` int(11) NOT NULL DEFAULT '1',
  `id_sts_13` int(11) NOT NULL DEFAULT '1',
  `id_sts_14` int(11) NOT NULL DEFAULT '1',
  `id_sts_15` int(11) NOT NULL DEFAULT '1',
  `id_sts_16` int(11) NOT NULL DEFAULT '1',
  `id_sts_17` int(11) NOT NULL DEFAULT '1',
  `verifikasi_1` int(11) NOT NULL,
  `verifikasi_2` int(11) NOT NULL,
  `verifikasi_3` int(11) NOT NULL,
  `verifikasi_4` int(11) NOT NULL,
  `verifikasi_5` int(11) NOT NULL,
  `verifikasi_6` int(11) NOT NULL,
  `verifikasi_7` int(11) NOT NULL,
  `verifikasi_8` int(11) NOT NULL,
  `verifikasi_9` int(11) NOT NULL,
  `verifikasi_10` int(11) NOT NULL,
  `verifikasi_11` int(11) NOT NULL,
  `verifikasi_12` int(11) NOT NULL,
  `verifikasi_13` int(11) NOT NULL,
  `verifikasi_14` int(11) NOT NULL,
  `verifikasi_15` int(11) NOT NULL,
  `verifikasi_16` int(11) NOT NULL,
  `verifikasi_17` int(11) NOT NULL,
  `ket_1` varchar(114) NOT NULL,
  `ket_2` varchar(114) NOT NULL,
  `ket_3` varchar(114) NOT NULL,
  `ket_4` varchar(114) NOT NULL,
  `ket_5` varchar(114) NOT NULL,
  `ket_6` varchar(114) NOT NULL,
  `ket_7` varchar(114) NOT NULL,
  `ket_8` varchar(114) NOT NULL,
  `ket_9` varchar(114) NOT NULL,
  `ket_10` varchar(114) NOT NULL,
  `ket_11` varchar(114) NOT NULL,
  `ket_12` varchar(114) NOT NULL,
  `ket_13` varchar(114) NOT NULL,
  `ket_14` varchar(114) NOT NULL,
  `ket_15` varchar(114) NOT NULL,
  `ket_16` varchar(114) NOT NULL,
  `ket_17` varchar(114) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_groups`
--

CREATE TABLE `tbl_groups` (
  `id` mediumint(8) UNSIGNED NOT NULL,
  `name` varchar(20) NOT NULL,
  `description` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `tbl_groups`
--

INSERT INTO `tbl_groups` (`id`, `name`, `description`) VALUES
(1, 'admin', 'Administrator'),
(2, 'members', 'General User'),
(34, 'skpd', 'Masing-masing SKPD'),
(35, 'mutasi', 'bidang mutasi'),
(36, 'suket', 'surat keterangan'),
(37, 'kartu', 'bidang layanan kartu pegawai'),
(38, 'pensiun', 'bidang layanan pensiun');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_honorer`
--

CREATE TABLE `tbl_honorer` (
  `id_honorer` int(5) NOT NULL,
  `nama` varchar(114) NOT NULL,
  `alamat` varchar(114) NOT NULL,
  `tat` varchar(114) NOT NULL,
  `id_lokasi_kerja` varchar(50) DEFAULT NULL,
  `tmt` varchar(50) DEFAULT NULL,
  `no_hp` varchar(15) DEFAULT NULL,
  `tempat_lahir` varchar(114) DEFAULT NULL,
  `tanggal_lahir` varchar(114) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_info_pt`
--

CREATE TABLE `tbl_info_pt` (
  `id_info_pt` int(11) NOT NULL,
  `nama_info_pt` varchar(114) DEFAULT NULL,
  `alias_pt` varchar(114) DEFAULT NULL,
  `kode_pt` varchar(114) DEFAULT NULL,
  `kontak_1` varchar(50) DEFAULT NULL,
  `kontak_2` varchar(50) DEFAULT NULL,
  `kontak_3` varchar(50) DEFAULT NULL,
  `kontak_4` varchar(50) DEFAULT NULL,
  `header_pt` varchar(114) DEFAULT NULL,
  `alamat_pt` varchar(114) DEFAULT NULL,
  `slogan` varchar(114) DEFAULT NULL,
  `logo_pt` varchar(114) DEFAULT NULL,
  `logo_kecil_pt` varchar(114) DEFAULT NULL,
  `nm_bupati` varchar(114) DEFAULT NULL,
  `jab_bupati` varchar(114) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_info_pt`
--

INSERT INTO `tbl_info_pt` (`id_info_pt`, `nama_info_pt`, `alias_pt`, `kode_pt`, `kontak_1`, `kontak_2`, `kontak_3`, `kontak_4`, `header_pt`, `alamat_pt`, `slogan`, `logo_pt`, `logo_kecil_pt`, `nm_bupati`, `jab_bupati`) VALUES
(1, 'e-SiPeKa Kab. Busel', 'SiPeKa', '000012', '0402 28123456', '1111-11111-1111', 'info@busel.com', '1111-11111-1111', NULL, 'Batauga', '', 'logo-badan-kepegawaian-pendidikan-dan-pelatihan-daerah-kabupaten-buton-selatan-20190110-1547125666.png', 'logo.png', 'LA ODE ARUSANI', 'Plt. Bupati Buton Selatan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_jk`
--

CREATE TABLE `tbl_jk` (
  `id_jk` int(11) NOT NULL,
  `kode_jk` varchar(12) NOT NULL,
  `nm_jk` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_jk`
--

INSERT INTO `tbl_jk` (`id_jk`, `kode_jk`, `nm_jk`) VALUES
(1, 'l', 'Laki-laki'),
(2, 'p', 'Perempuan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_login_attempts`
--

CREATE TABLE `tbl_login_attempts` (
  `id` int(11) NOT NULL,
  `ip_address` varchar(15) DEFAULT NULL,
  `login` varchar(100) DEFAULT NULL,
  `time` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_master_agama`
--

CREATE TABLE `tbl_master_agama` (
  `id_agama` int(11) NOT NULL,
  `nm_agama` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_master_agama`
--

INSERT INTO `tbl_master_agama` (`id_agama`, `nm_agama`) VALUES
(1, 'Islam'),
(2, 'Kristen'),
(3, 'Hindu'),
(4, 'Budha'),
(5, 'Kristen Katolik'),
(6, 'Kristen Portestan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_master_eselon`
--

CREATE TABLE `tbl_master_eselon` (
  `id_eselon` int(50) NOT NULL,
  `kode_eselon` int(11) NOT NULL,
  `nama_eselon` varchar(150) NOT NULL,
  `level` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_master_eselon`
--

INSERT INTO `tbl_master_eselon` (`id_eselon`, `kode_eselon`, `nama_eselon`, `level`) VALUES
(23, 1, 'I.a', '1'),
(24, 1, 'I.b', '2'),
(25, 2, 'II.a', '3'),
(26, 2, 'II.b', '4'),
(27, 3, 'III.a', '5'),
(28, 3, 'III.b', '6'),
(29, 4, 'IV.a', '7'),
(30, 4, 'IV.b', '8');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_master_golongan`
--

CREATE TABLE `tbl_master_golongan` (
  `id_golongan` int(50) NOT NULL,
  `kode` int(11) NOT NULL,
  `golongan` varchar(100) NOT NULL,
  `uraian` text NOT NULL,
  `level` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_master_golongan`
--

INSERT INTO `tbl_master_golongan` (`id_golongan`, `kode`, `golongan`, `uraian`, `level`) VALUES
(5, 1, 'I/a', 'JURU MUDA', '17'),
(6, 1, 'I/b', 'JURU MUDA TINGKAT I', '16'),
(7, 1, 'I/c', 'JURU', '15'),
(8, 1, 'I/d', 'JURU TINGKAT I', '14'),
(9, 2, 'II/a', 'PENGATUR MUDA', '13'),
(10, 2, 'II/b', 'PENGATUR MUDA TK IPENGATUR MUDA TK I', '12'),
(12, 2, 'II/d', 'PENGATUR TINGKAT I', '10'),
(13, 3, 'III/a', 'PENATA MUDA', '9'),
(14, 3, 'III/b', 'PENATA MUDA TINGKAT I', '8'),
(15, 3, 'III/c', 'PENATA', '7'),
(16, 3, 'III/d', 'PENATA TINGKAT I', '6'),
(17, 4, 'IV/a', 'PEMBINA', '5'),
(18, 4, 'IV/b', 'PEMBINA TINGKAT I', '4'),
(19, 4, 'IV/c', 'PEMBINA UTAMA MUDA', '3'),
(20, 4, 'IV/b', 'PEMBINA UTAMA MADYA', '2'),
(23, 2, 'II/c', 'PENGATUR', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_master_hukuman`
--

CREATE TABLE `tbl_master_hukuman` (
  `id_hukuman` int(50) NOT NULL,
  `nama_hukuman` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_master_hukuman`
--

INSERT INTO `tbl_master_hukuman` (`id_hukuman`, `nama_hukuman`) VALUES
(5, 'TEGURAN TERTULIS'),
(6, 'PERNYATAAN TAK PUAS TERTULIS'),
(7, 'PENUNDAAN KGB'),
(8, 'PENUNDAAN Kp'),
(9, 'PENURUNAN PANGKAT'),
(10, 'PEMBEBASAN DARI JABATAN'),
(11, 'PEMBERHENTIAN DENGAN HORMAT TAPS'),
(12, 'PEMBERHENTIAN TIDAK DENGAN HORMAT');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_master_jabatan`
--

CREATE TABLE `tbl_master_jabatan` (
  `id_jabatan` int(50) NOT NULL,
  `nama_jabatan` varchar(100) NOT NULL,
  `level` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_master_jabatan`
--

INSERT INTO `tbl_master_jabatan` (`id_jabatan`, `nama_jabatan`, `level`) VALUES
(1, 'Kepala Dinas', 1),
(2, 'Sekretasi Daerah', 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_master_jenis_jabatan`
--

CREATE TABLE `tbl_master_jenis_jabatan` (
  `id_jenis_jabatan` int(11) NOT NULL,
  `nama_jenis_jabatan` varchar(114) NOT NULL,
  `kode_jenis_jabatan` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_master_jenis_jabatan`
--

INSERT INTO `tbl_master_jenis_jabatan` (`id_jenis_jabatan`, `nama_jenis_jabatan`, `kode_jenis_jabatan`) VALUES
(1, 'Struktural', '1'),
(2, 'Fungsional Umum', '2'),
(3, 'Fungsional Tertentu', '3');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_master_lokasi_kerja`
--

CREATE TABLE `tbl_master_lokasi_kerja` (
  `id_lokasi_kerja` int(10) NOT NULL,
  `lokasi_kerja` varchar(100) NOT NULL,
  `unit_kerja_induk` varchar(100) DEFAULT NULL,
  `alamat_loker` varchar(114) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_master_lokasi_kerja`
--

INSERT INTO `tbl_master_lokasi_kerja` (`id_lokasi_kerja`, `lokasi_kerja`, `unit_kerja_induk`, `alamat_loker`) VALUES
(2, 'BADAN KEPEGAWAIAN DAN PENGEMBANGAN SDM', 'PEMERINTAH KABUPATEN BUTON SELATAN', ''),
(3, 'BADAN KESATUAN BANGSA DAN PEMBINAAN POLITIK', 'PEMERINTAH KABUPATEN BUTON SELATAN', ''),
(4, 'BADAN KEUANGAN DAERAH', 'PEMERINTAH KABUPATEN BUTON SELATAN', ''),
(5, 'BADAN PENELITIAN DAN PENGEMBANGAN DAERAH', 'PEMERINTAH KABUPATEN BUTON SELATAN', ''),
(6, 'BAPPEDA', 'PEMERINTAH KABUPATEN BUTON SELATAN', ''),
(7, 'BPBD', 'PEMERINTAH KABUPATEN BUTON SELATAN', ''),
(8, 'DINAS KEARSIPAN DAN PERPUSTAKAAN', 'PEMERINTAH KABUPATEN BUTON SELATAN', ''),
(9, 'DINAS KEBUDAYAAN', 'PEMERINTAH KABUPATEN BUTON SELATAN', ''),
(10, 'DINAS KELAUTAN DAN PERIKANAN', 'PEMERINTAH KABUPATEN BUTON SELATAN', ''),
(11, 'DINAS KEPENDUDUKAN DAN CAPIL', 'PEMERINTAH KABUPATEN BUTON SELATAN', ''),
(12, 'DINAS KESEHATAN', 'PEMERINTAH KABUPATEN BUTON SELATAN', ''),
(13, 'DINAS KETAHANAN PANGAN', 'PEMERINTAH KABUPATEN BUTON SELATAN', ''),
(14, 'DINAS KOMUNIKASI DAN INFORMASI', 'PEMERINTAH KABUPATEN BUTON SELATAN', ''),
(15, 'DINAS KOPERASI UKM, PERINDAG', 'PEMERINTAH KABUPATEN BUTON SELATAN', ''),
(16, 'DINAS LINGKUNGAN HIDUP', 'PEMERINTAH KABUPATEN BUTON SELATAN', ''),
(17, 'DINAS PARIWISATA DAN EKONOMI KREATIF', 'PEMERINTAH KABUPATEN BUTON SELATAN', ''),
(18, 'DINAS PEMADAM KEBAKARAN DAN PENYELAMATAN', 'PEMERINTAH KABUPATEN BUTON SELATAN', ''),
(19, 'DINAS PEMBERDAYAAN MASY. DAN DESA', 'PEMERINTAH KABUPATEN BUTON SELATAN', ''),
(20, 'DINAS PEMBERDAYAAN PEREMPUAN DAN PA', 'PEMERINTAH KABUPATEN BUTON SELATAN', ''),
(21, 'DINAS PENANAMAN MODAL DAN PTSP', 'PEMERINTAH KABUPATEN BUTON SELATAN', ''),
(22, 'DINAS PENDIDIKAN KABUPATEN BUTON SELATAN', 'PEMERINTAH KABUPATEN BUTON SELATAN', ''),
(23, 'DINAS PENGENDALIAN PENDUDUK DAN KB', 'PEMERINTAH KABUPATEN BUTON SELATAN', ''),
(24, 'DINAS PERHUBUNGAN', 'PEMERINTAH KABUPATEN BUTON SELATAN', ''),
(25, 'DINAS PERTANIAN', 'PEMERINTAH KABUPATEN BUTON SELATAN', ''),
(26, 'DINAS PERUMAHAN DAN KAWASAN PEMUKIMAN', 'PEMERINTAH KABUPATEN BUTON SELATAN', ''),
(27, 'DINAS PU DAN PENATAAN RUANG', 'PEMERINTAH KABUPATEN BUTON SELATAN', ''),
(28, 'DINAS SOSIAL', 'PEMERINTAH KABUPATEN BUTON SELATAN', ''),
(29, 'DINAS TENAGA KERJA DAN TRANSMIGRASI', 'PEMERINTAH KABUPATEN BUTON SELATAN', ''),
(30, 'DPRD', 'PEMERINTAH KABUPATEN BUTON SELATAN', ''),
(31, 'INSPEKTORAT', 'PEMERINTAH KABUPATEN BUTON SELATAN', ''),
(32, 'KANTOR KECAMATAN BATAUGA', 'PEMERINTAH KABUPATEN BUTON SELATAN', ''),
(33, 'KANTOR KECAMATAN BATUATAS', 'PEMERINTAH KABUPATEN BUTON SELATAN', ''),
(34, 'KANTOR KECAMATAN KADATUA', 'PEMERINTAH KABUPATEN BUTON SELATAN', ''),
(35, 'KANTOR KECAMATAN LAPANDEWA', 'PEMERINTAH KABUPATEN BUTON SELATAN', ''),
(36, 'KANTOR KECAMATAN SAMPOLAWA', 'PEMERINTAH KABUPATEN BUTON SELATAN', ''),
(37, 'KANTOR KECAMATAN SIOMPU', 'PEMERINTAH KABUPATEN BUTON SELATAN', ''),
(38, 'KANTOR KECAMATAN SIOMPU BARAT', 'PEMERINTAH KABUPATEN BUTON SELATAN', ''),
(39, 'KPU', 'PEMERINTAH KABUPATEN BUTON SELATAN', ''),
(40, 'PENGAWAS SEKOLAH', 'PEMERINTAH KABUPATEN BUTON SELATAN', ''),
(41, 'PUSKESMAS GERAK MAKMUR', 'PEMERINTAH KABUPATEN BUTON SELATAN', ''),
(42, 'PUSKESMAS WILAYAH BATAUGA', 'PEMERINTAH KABUPATEN BUTON SELATAN', ''),
(43, 'PUSKESMAS WILAYAH BATUATAS', 'PEMERINTAH KABUPATEN BUTON SELATAN', ''),
(44, 'PUSKESMAS WILAYAH KADATUA', 'PEMERINTAH KABUPATEN BUTON SELATAN', ''),
(45, 'PUSKESMAS WILAYAH LAPANDEWA', 'PEMERINTAH KABUPATEN BUTON SELATAN', ''),
(46, 'PUSKESMAS WILAYAH SAMPOLAWA', 'PEMERINTAH KABUPATEN BUTON SELATAN', ''),
(47, 'PUSKESMAS WILAYAH SIOMPU', 'PEMERINTAH KABUPATEN BUTON SELATAN', ''),
(48, 'PUSKESMAS WILAYAH SIOMPU BARAT', 'PEMERINTAH KABUPATEN BUTON SELATAN', ''),
(49, 'RSUD ', 'PEMERINTAH KABUPATEN BUTON SELATAN', ''),
(50, 'SATUAN POLISI PAMONG PRAJA', 'PEMERINTAH KABUPATEN BUTON SELATAN', ''),
(51, 'SD NEG. 1  KAPOA', 'PEMERINTAH KABUPATEN BUTON SELATAN', ''),
(52, 'SD NEG. 1 BIWINAPADA', 'PEMERINTAH KABUPATEN BUTON SELATAN', ''),
(53, 'SD NEG. 1 BOLA', 'PEMERINTAH KABUPATEN BUTON SELATAN', ''),
(54, 'SD NEG. 1 KAPOA', 'PEMERINTAH KABUPATEN BUTON SELATAN', ''),
(55, 'SD NEG. 1 KAPOA BARAT', 'PEMERINTAH KABUPATEN BUTON SELATAN', ''),
(56, 'SD NEG. 1 KATILOMBU', 'PEMERINTAH KABUPATEN BUTON SELATAN', ''),
(57, 'SD NEG. 1 LALOLE', 'PEMERINTAH KABUPATEN BUTON SELATAN', ''),
(58, 'SD NEG. 1 POOGALAMPA', 'PEMERINTAH KABUPATEN BUTON SELATAN', ''),
(59, 'SD NEG. 1 UWEMAASI', 'PEMERINTAH KABUPATEN BUTON SELATAN', ''),
(60, 'SD NEG. 2 BANABUNGI', 'PEMERINTAH KABUPATEN BUTON SELATAN', ''),
(61, 'SD NEG. 3 TONGALI', 'PEMERINTAH KABUPATEN BUTON SELATAN', ''),
(62, 'SD NEGERI  2 BANABUNGI', 'PEMERINTAH KABUPATEN BUTON SELATAN', ''),
(63, 'SD NEGERI  2 KAIMBULAWA', 'PEMERINTAH KABUPATEN BUTON SELATAN', ''),
(64, 'SD NEGERI  3 MOLONA', 'PEMERINTAH KABUPATEN BUTON SELATAN', ''),
(65, 'SD NEGERI 1 BANABUNGI', 'PEMERINTAH KABUPATEN BUTON SELATAN', ''),
(66, 'SD NEGERI 1 BANGUN', 'PEMERINTAH KABUPATEN BUTON SELATAN', ''),
(67, 'SD NEGERI 1 BATUATAS BARAT ', 'PEMERINTAH KABUPATEN BUTON SELATAN', ''),
(68, 'SD NEGERI 1 KAIMBULAWA', 'PEMERINTAH KABUPATEN BUTON SELATAN', ''),
(69, 'SD NEGERI 1 KATILOMBU', 'PEMERINTAH KABUPATEN BUTON SELATAN', ''),
(70, 'SD NEGERI 1 LAOMPO ', 'PEMERINTAH KABUPATEN BUTON SELATAN', ''),
(71, 'SD NEGERI 1 MOLONA', 'PEMERINTAH KABUPATEN BUTON SELATAN', ''),
(72, 'SD NEGERI 1 POOGALAMPA', 'PEMERINTAH KABUPATEN BUTON SELATAN', ''),
(73, 'SD NEGERI 1 TIRA', 'PEMERINTAH KABUPATEN BUTON SELATAN', ''),
(74, 'SD NEGERI 1 TOLANDO JAYA', 'PEMERINTAH KABUPATEN BUTON SELATAN', ''),
(75, 'SD NEGERI 1 WAMBONGI', 'PEMERINTAH KABUPATEN BUTON SELATAN', ''),
(76, 'SD NEGERI 1 WATUAMPARA', 'PEMERINTAH KABUPATEN BUTON SELATAN', ''),
(77, 'SD NEGERI 2 BANGUN', 'PEMERINTAH KABUPATEN BUTON SELATAN', ''),
(78, 'SD NEGERI 2 BUSOA', 'PEMERINTAH KABUPATEN BUTON SELATAN', ''),
(79, 'SD NEGERI 2 GUNUNG SEJUK ', 'PEMERINTAH KABUPATEN BUTON SELATAN', ''),
(80, 'SD NEGERI 2 LALOLE', 'PEMERINTAH KABUPATEN BUTON SELATAN', ''),
(81, 'SD NEGERI 2 MOLONA ', 'PEMERINTAH KABUPATEN BUTON SELATAN', ''),
(82, 'SD NEGERI 3 BUSOA', 'PEMERINTAH KABUPATEN BUTON SELATAN', ''),
(83, 'SDN  1 MASIRI ', 'PEMERINTAH KABUPATEN BUTON SELATAN', ''),
(84, 'SDN 1 BAHARI ', 'PEMERINTAH KABUPATEN BUTON SELATAN', ''),
(85, 'SDN 1 BANGUN', 'PEMERINTAH KABUPATEN BUTON SELATAN', ''),
(86, 'SDN 1 BATU ATAS TIMUR KECAMATAN BATUATAS', 'PEMERINTAH KABUPATEN BUTON SELATAN', ''),
(87, 'SDN 1 BATUATAS BARAT ', 'PEMERINTAH KABUPATEN BUTON SELATAN', ''),
(88, 'SDN 1 BATUATAS LIWU', 'PEMERINTAH KABUPATEN BUTON SELATAN', ''),
(89, 'SDN 1 BIWINAPADA', 'PEMERINTAH KABUPATEN BUTON SELATAN', ''),
(90, 'SDN 1 BTS TIMUR', 'PEMERINTAH KABUPATEN BUTON SELATAN', ''),
(91, 'SDN 1 BURANGASI RUMBIA ', 'PEMERINTAH KABUPATEN BUTON SELATAN', ''),
(92, 'SDN 1 BUSOA', 'PEMERINTAH KABUPATEN BUTON SELATAN', ''),
(93, 'SDN 1 BWINAPADA', 'PEMERINTAH KABUPATEN BUTON SELATAN', ''),
(94, 'SDN 1 GAYA BARU ', 'PEMERINTAH KABUPATEN BUTON SELATAN', ''),
(95, 'SDN 1 GERAK MAKMUR ', 'PEMERINTAH KABUPATEN BUTON SELATAN', ''),
(96, 'SDN 1 GUNUNG SEJUK', 'PEMERINTAH KABUPATEN BUTON SELATAN', ''),
(97, 'SDN 1 HENDEA ', 'PEMERINTAH KABUPATEN BUTON SELATAN', ''),
(98, 'SDN 1 KAOFE ', 'PEMERINTAH KABUPATEN BUTON SELATAN', ''),
(99, 'SDN 1 KAOFE SELATAN', 'PEMERINTAH KABUPATEN BUTON SELATAN', ''),
(100, 'SDN 1 KAPOA ', 'PEMERINTAH KABUPATEN BUTON SELATAN', ''),
(101, 'SDN 1 KATILOMBU ', 'PEMERINTAH KABUPATEN BUTON SELATAN', ''),
(102, 'SDN 1 LALOLE', 'PEMERINTAH KABUPATEN BUTON SELATAN', ''),
(103, 'SDN 1 LAMPANAIRI', 'PEMERINTAH KABUPATEN BUTON SELATAN', ''),
(104, 'SDN 1 LAOMPO ', 'PEMERINTAH KABUPATEN BUTON SELATAN', ''),
(105, 'SDN 1 LAPANDEWA ', 'PEMERINTAH KABUPATEN BUTON SELATAN', ''),
(106, 'SDN 1 LAPANDEWA MAKMUR ', 'PEMERINTAH KABUPATEN BUTON SELATAN', ''),
(107, 'SDN 1 LAWELA ', 'PEMERINTAH KABUPATEN BUTON SELATAN', ''),
(108, 'SDN 1 LIPU ', 'PEMERINTAH KABUPATEN BUTON SELATAN', ''),
(109, 'SDN 1 LONTOI ', 'PEMERINTAH KABUPATEN BUTON SELATAN', ''),
(110, 'SDN 1 MAJAPAHIT ', 'PEMERINTAH KABUPATEN BUTON SELATAN', ''),
(111, 'SDN 1 MASIRI', 'PEMERINTAH KABUPATEN BUTON SELATAN', ''),
(112, 'SDN 1 MBANUA KECAMATAN SIOMPU BARAT', 'PEMERINTAH KABUPATEN BUTON SELATAN', ''),
(113, 'SDN 1 MOLONA ', 'PEMERINTAH KABUPATEN BUTON SELATAN', ''),
(114, 'SDN 1 POOGALAMPA', 'PEMERINTAH KABUPATEN BUTON SELATAN', ''),
(115, 'SDN 1 SANDANG PANGAN ', 'PEMERINTAH KABUPATEN BUTON SELATAN', ''),
(116, 'SDN 1 TADUASA', 'PEMERINTAH KABUPATEN BUTON SELATAN', ''),
(117, 'SDN 1 TODOMBULU ', 'PEMERINTAH KABUPATEN BUTON SELATAN', ''),
(118, 'SDN 1 TOLANDO JAYA', 'PEMERINTAH KABUPATEN BUTON SELATAN', ''),
(119, 'SDN 1 TONGALI', 'PEMERINTAH KABUPATEN BUTON SELATAN', ''),
(120, 'SDN 1 UWEMAASI', 'PEMERINTAH KABUPATEN BUTON SELATAN', ''),
(121, 'SDN 1 WACUALA', 'PEMERINTAH KABUPATEN BUTON SELATAN', ''),
(122, 'SDN 1 WAKINAMBORO ', 'PEMERINTAH KABUPATEN BUTON SELATAN', ''),
(123, 'SDN 1 WAONU ', 'PEMERINTAH KABUPATEN BUTON SELATAN', ''),
(124, 'SDN 1 WATUAMPARA ', 'PEMERINTAH KABUPATEN BUTON SELATAN', ''),
(125, 'SDN 1 WAWOANGI ', 'PEMERINTAH KABUPATEN BUTON SELATAN', ''),
(126, 'SDN 1MASIRI ', 'PEMERINTAH KABUPATEN BUTON SELATAN', ''),
(127, 'SDN 2 BAHARI ', 'PEMERINTAH KABUPATEN BUTON SELATAN', ''),
(128, 'SDN 2 BANGUN', 'PEMERINTAH KABUPATEN BUTON SELATAN', ''),
(129, 'SDN 2 BUSOA', 'PEMERINTAH KABUPATEN BUTON SELATAN', ''),
(130, 'SDN 2 GERAK MAKMUR ', 'PEMERINTAH KABUPATEN BUTON SELATAN', ''),
(131, 'SDN 2 GUNUNG SEJUK', 'PEMERINTAH KABUPATEN BUTON SELATAN', ''),
(132, 'SDN 2 KAIMBULAWA', 'PEMERINTAH KABUPATEN BUTON SELATAN', ''),
(133, 'SDN 2 LALOLE', 'PEMERINTAH KABUPATEN BUTON SELATAN', ''),
(134, 'SDN 2 LAOMPO ', 'PEMERINTAH KABUPATEN BUTON SELATAN', ''),
(135, 'SDN 2 LAPANDEWA KAINDEA ', 'PEMERINTAH KABUPATEN BUTON SELATAN', ''),
(136, 'SDN 2 MAMBULU ', 'PEMERINTAH KABUPATEN BUTON SELATAN', ''),
(137, 'SDN 2 MASIRI ', 'PEMERINTAH KABUPATEN BUTON SELATAN', ''),
(138, 'SDN 2 MOLONA ', 'PEMERINTAH KABUPATEN BUTON SELATAN', ''),
(139, 'SDN 2 TONGALI ', 'PEMERINTAH KABUPATEN BUTON SELATAN', ''),
(140, 'SDN 2 WAKINAMBORO', 'PEMERINTAH KABUPATEN BUTON SELATAN', ''),
(141, 'SDN 2 WAKINAMBORO KECAMATAN SIOMPU', 'PEMERINTAH KABUPATEN BUTON SELATAN', ''),
(142, 'SDN 3 LAOMPO', 'PEMERINTAH KABUPATEN BUTON SELATAN', ''),
(143, 'SDN 3 TONGALI ', 'PEMERINTAH KABUPATEN BUTON SELATAN', ''),
(144, 'SDN BTS LIWU ', 'PEMERINTAH KABUPATEN BUTON SELATAN', ''),
(145, 'SDN LIWU BATUATAS', 'PEMERINTAH KABUPATEN BUTON SELATAN', ''),
(146, 'SDN. 1 LAOMPO ', 'PEMERINTAH KABUPATEN BUTON SELATAN', ''),
(147, 'SDN.1 BOLA ', 'PEMERINTAH KABUPATEN BUTON SELATAN', ''),
(148, 'SDN.1 BUSOA ', 'PEMERINTAH KABUPATEN BUTON SELATAN', ''),
(149, 'SDN.1 LAPANDEWA KAINDEA ', 'PEMERINTAH KABUPATEN BUTON SELATAN', ''),
(150, 'SDN.1 LAWELA ', 'PEMERINTAH KABUPATEN BUTON SELATAN', ''),
(151, 'SDN.2 BWINAPADA', 'PEMERINTAH KABUPATEN BUTON SELATAN', ''),
(152, 'SETDA', 'PEMERINTAH KABUPATEN BUTON SELATAN', ''),
(153, 'SMP NEG. 1 BATAUGA', 'PEMERINTAH KABUPATEN BUTON SELATAN', ''),
(154, 'SMP NEG. 1 BATUATAS', 'PEMERINTAH KABUPATEN BUTON SELATAN', ''),
(155, 'SMP NEG. 1 KADATUA', 'PEMERINTAH KABUPATEN BUTON SELATAN', ''),
(156, 'SMP NEG. 1 SAMPOLAWA', 'PEMERINTAH KABUPATEN BUTON SELATAN', ''),
(157, 'SMP NEG. 2 BATAUGA', 'PEMERINTAH KABUPATEN BUTON SELATAN', ''),
(158, 'SMP NEG. 2 KADATUA', 'PEMERINTAH KABUPATEN BUTON SELATAN', ''),
(159, 'SMP NEG. 2 SAMPOLAWA', 'PEMERINTAH KABUPATEN BUTON SELATAN', ''),
(160, 'SMP NEG. 2 SIOMPU BARAT', 'PEMERINTAH KABUPATEN BUTON SELATAN', ''),
(161, 'SMP NEG. 3 BATAUGA', 'PEMERINTAH KABUPATEN BUTON SELATAN', ''),
(162, 'SMP NEG. 3 SAMPOLAWA', 'PEMERINTAH KABUPATEN BUTON SELATAN', ''),
(163, 'SMP NEG. 5 BATAUGA', 'PEMERINTAH KABUPATEN BUTON SELATAN', ''),
(164, 'SMP NEG. 6 BATAUGA', 'PEMERINTAH KABUPATEN BUTON SELATAN', ''),
(165, 'SMP NEGERI 3 BATAUGA', 'PEMERINTAH KABUPATEN BUTON SELATAN', ''),
(166, 'SMP NEGERI 5 BATAUGA', 'PEMERINTAH KABUPATEN BUTON SELATAN', ''),
(167, 'SMP NEGERI 6 BATAUGA', 'PEMERINTAH KABUPATEN BUTON SELATAN', ''),
(168, 'SMP NEGERI SATAP KAPOA', 'PEMERINTAH KABUPATEN BUTON SELATAN', ''),
(169, 'SMPN 1 BATAUGA', 'PEMERINTAH KABUPATEN BUTON SELATAN', ''),
(170, 'SMPN 1 BATUATAS', 'PEMERINTAH KABUPATEN BUTON SELATAN', ''),
(171, 'SMPN 1 KADATUA', 'PEMERINTAH KABUPATEN BUTON SELATAN', ''),
(172, 'SMPN 1 LAPANDEWA', 'PEMERINTAH KABUPATEN BUTON SELATAN', ''),
(173, 'SMPN 1 SAMPOLAWA', 'PEMERINTAH KABUPATEN BUTON SELATAN', ''),
(174, 'SMPN 1 SIOMPU', 'PEMERINTAH KABUPATEN BUTON SELATAN', ''),
(175, 'SMPN 1 SIOMPU BARAT', 'PEMERINTAH KABUPATEN BUTON SELATAN', ''),
(176, 'SMPN 2  KADATUA', 'PEMERINTAH KABUPATEN BUTON SELATAN', ''),
(177, 'SMPN 2 BATAUGA', 'PEMERINTAH KABUPATEN BUTON SELATAN', ''),
(178, 'SMPN 2 BATUATAS', 'PEMERINTAH KABUPATEN BUTON SELATAN', ''),
(179, 'SMPN 2 KADATUA', 'PEMERINTAH KABUPATEN BUTON SELATAN', ''),
(180, 'SMPN 2 LAPANDEWA', 'PEMERINTAH KABUPATEN BUTON SELATAN', ''),
(181, 'SMPN 2 SAMPOLAWA', 'PEMERINTAH KABUPATEN BUTON SELATAN', ''),
(182, 'SMPN 2 SIOMPU', 'PEMERINTAH KABUPATEN BUTON SELATAN', ''),
(183, 'SMPN 2 SIOMPU BARAT', 'PEMERINTAH KABUPATEN BUTON SELATAN', ''),
(184, 'SMPN 3  KADATUA', 'PEMERINTAH KABUPATEN BUTON SELATAN', ''),
(185, 'SMPN 3 BATAUGA', 'PEMERINTAH KABUPATEN BUTON SELATAN', ''),
(186, 'SMPN 3 LAPANDEWA', 'PEMERINTAH KABUPATEN BUTON SELATAN', ''),
(187, 'SMPN 3 SIOMPU', 'PEMERINTAH KABUPATEN BUTON SELATAN', ''),
(188, 'SMPN 4 SAMPOLAWA', 'PEMERINTAH KABUPATEN BUTON SELATAN', ''),
(189, 'SMPN 4 SATAP BATAUGA', 'PEMERINTAH KABUPATEN BUTON SELATAN', ''),
(190, 'SMPN 5 BATAUGA', 'PEMERINTAH KABUPATEN BUTON SELATAN', ''),
(191, 'SMPN 5 SAMPOLAWA', 'PEMERINTAH KABUPATEN BUTON SELATAN', ''),
(192, 'SMPN 6 BATAUGA', 'PEMERINTAH KABUPATEN BUTON SELATAN', ''),
(193, 'SMPN 6 BATAUGA  ', 'PEMERINTAH KABUPATEN BUTON SELATAN', ''),
(194, 'SMPN SATAP BAHARI', 'PEMERINTAH KABUPATEN BUTON SELATAN', ''),
(195, 'SMPN SATAP GAYA BARU', 'PEMERINTAH KABUPATEN BUTON SELATAN', ''),
(196, 'SMPN SATAP KAPOA', 'PEMERINTAH KABUPATEN BUTON SELATAN', ''),
(197, 'SMPN SATAP LONTOI', 'PEMERINTAH KABUPATEN BUTON SELATAN', ''),
(198, 'SMPN SATAP TIRA', 'PEMERINTAH KABUPATEN BUTON SELATAN', ''),
(199, 'SMPN SATU ATAP BAHARI KECAMATAN SAMPOLAWA', 'PEMERINTAH KABUPATEN BUTON SELATAN', ''),
(200, 'TK  PGRI AL MUNIR BIWINAPADA ', 'PEMERINTAH KABUPATEN BUTON SELATAN', ''),
(201, 'TK 1 BOLA', 'PEMERINTAH KABUPATEN BUTON SELATAN', ''),
(202, 'TK 1 BUSOA', 'PEMERINTAH KABUPATEN BUTON SELATAN', ''),
(203, 'TK 1 LAMPANAIRI', 'PEMERINTAH KABUPATEN BUTON SELATAN', ''),
(204, 'TK 1 MAJAPAHIT', 'PEMERINTAH KABUPATEN BUTON SELATAN', ''),
(205, 'TK 1 MASIRI', 'PEMERINTAH KABUPATEN BUTON SELATAN', ''),
(206, 'TK 1 NURHAYAT LAWELA ', 'PEMERINTAH KABUPATEN BUTON SELATAN', ''),
(207, 'TK 1 PGRI BIWINAPADA', 'PEMERINTAH KABUPATEN BUTON SELATAN', ''),
(208, 'TK 1 PGRI TONGALI ', 'PEMERINTAH KABUPATEN BUTON SELATAN', ''),
(209, 'TK 1 PKK LAOMPO', 'PEMERINTAH KABUPATEN BUTON SELATAN', ''),
(210, 'TK 1 POOGALAMPA', 'PEMERINTAH KABUPATEN BUTON SELATAN', ''),
(211, 'TK 2 AMALIA MASIRI', 'PEMERINTAH KABUPATEN BUTON SELATAN', ''),
(212, 'TK 2 TUNAS HARAPAN BUSOA', 'PEMERINTAH KABUPATEN BUTON SELATAN', ''),
(213, 'TK AL AKBAR', 'PEMERINTAH KABUPATEN BUTON SELATAN', ''),
(214, 'TK AL HIKMAH', 'PEMERINTAH KABUPATEN BUTON SELATAN', ''),
(215, 'TK AL IKHLAS KARAE', 'PEMERINTAH KABUPATEN BUTON SELATAN', ''),
(216, 'TK AL MUHAJIRIN BATUAWU', 'PEMERINTAH KABUPATEN BUTON SELATAN', ''),
(217, 'TK BANDAR BATAUGA', 'PEMERINTAH KABUPATEN BUTON SELATAN', ''),
(218, 'TK BATUPERMAI', 'PEMERINTAH KABUPATEN BUTON SELATAN', ''),
(219, 'TK CAHAYA KABURA-BURANA ', 'PEMERINTAH KABUPATEN BUTON SELATAN', ''),
(220, 'TK DHARMA BAKTI TODOMBULU ', 'PEMERINTAH KABUPATEN BUTON SELATAN', ''),
(221, 'TK DHARMA WANITA KATILOMBU ', 'PEMERINTAH KABUPATEN BUTON SELATAN', ''),
(222, 'TK DHARMA WANITA LAOMPO', 'PEMERINTAH KABUPATEN BUTON SELATAN', ''),
(223, 'TK FEISAL 2 BAHARI ', 'PEMERINTAH KABUPATEN BUTON SELATAN', ''),
(224, 'TK HARAPAN JAYA KEC. SAMPOLAWA', 'PEMERINTAH KABUPATEN BUTON SELATAN', ''),
(225, 'TK HIDAYAH', 'PEMERINTAH KABUPATEN BUTON SELATAN', ''),
(226, 'TK HIDAYAH MOLAGINA', 'PEMERINTAH KABUPATEN BUTON SELATAN', ''),
(227, 'TK KUNCUP PERTIWI ', 'PEMERINTAH KABUPATEN BUTON SELATAN', ''),
(228, 'TK LALOWATU', 'PEMERINTAH KABUPATEN BUTON SELATAN', ''),
(229, 'TK NURHIDAYAH', 'PEMERINTAH KABUPATEN BUTON SELATAN', ''),
(230, 'TK NURHIDAYAH LIPU', 'PEMERINTAH KABUPATEN BUTON SELATAN', ''),
(231, 'TK NURUL ITA', 'PEMERINTAH KABUPATEN BUTON SELATAN', ''),
(232, 'TK PGRI NURUL IQRA WAKINAMBORO', 'PEMERINTAH KABUPATEN BUTON SELATAN', ''),
(233, 'TK SINAR SEJUK', 'PEMERINTAH KABUPATEN BUTON SELATAN', ''),
(234, 'TK TUNAS MUDA KAPOA', 'PEMERINTAH KABUPATEN BUTON SELATAN', ''),
(235, 'TK TUNAS WAONU ', 'PEMERINTAH KABUPATEN BUTON SELATAN', ''),
(236, 'TK WATIGINANDA ', 'PEMERINTAH KABUPATEN BUTON SELATAN', ''),
(237, 'TK WAWOANGI', 'PEMERINTAH KABUPATEN BUTON SELATAN', ''),
(238, 'TK YAKIN BANABUNGI', 'PEMERINTAH KABUPATEN BUTON SELATAN', ''),
(239, 'UPTD DIKNAS KEC. BATAUGA', 'PEMERINTAH KABUPATEN BUTON SELATAN', ''),
(240, 'UPTD DIKNAS KEC. KADATUA', 'PEMERINTAH KABUPATEN BUTON SELATAN', ''),
(241, 'UPTD DIKNAS KEC. LAPANDEWA', 'PEMERINTAH KABUPATEN BUTON SELATAN', ''),
(242, 'UPTD DIKNAS KEC. SAMPOLAWA', 'PEMERINTAH KABUPATEN BUTON SELATAN', ''),
(243, 'UPTD DIKNAS KEC. SIOMPU', 'PEMERINTAH KABUPATEN BUTON SELATAN', ''),
(244, 'UPTD DIKNAS KEC. SIOMPU BARAT', 'PEMERINTAH KABUPATEN BUTON SELATAN', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_master_lokasi_pelatihan`
--

CREATE TABLE `tbl_master_lokasi_pelatihan` (
  `id_lokasi_pelatihan` int(50) NOT NULL,
  `nama_lokasi` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_master_lokasi_pelatihan`
--

INSERT INTO `tbl_master_lokasi_pelatihan` (`id_lokasi_pelatihan`, `nama_lokasi`) VALUES
(3, 'BALAI DIKLAT PU WIL I'),
(4, 'BALAI DIKLAT PU WIL II BANDUNG'),
(5, 'BALAI DIKLAT PU WIL III YOGYAKARTA'),
(6, 'BALAI DIKLAT PU WIL IV SURABAYA'),
(7, 'BALAI DIKLAT PU WIL V MAKASAR'),
(8, 'BALAI DIKLAT PU WIL VI JAKARTA'),
(9, 'BALAI DIKLAT PU WIL VII BANJARMASIN'),
(10, 'BALAI DIKLAT PU WIL VIII PALEMBANG'),
(11, 'BALAI DIKLAT PU WIL IX JAYAPURA'),
(12, 'LAN JAKARTA'),
(13, 'LAN SEMARANG'),
(14, 'LAN SURABAYA'),
(15, 'LAN MAKASAR'),
(16, 'LAIN-LAIN'),
(17, 'LOKASI PELATIHAN');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_master_pangkat`
--

CREATE TABLE `tbl_master_pangkat` (
  `id_pangkat` int(11) NOT NULL,
  `nm_pangkat` varchar(114) NOT NULL,
  `kode_pangkat` varchar(114) NOT NULL,
  `ket_pangkat` varchar(114) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_master_pangkat`
--

INSERT INTO `tbl_master_pangkat` (`id_pangkat`, `nm_pangkat`, `kode_pangkat`, `ket_pangkat`) VALUES
(1, 'Pembina Utama', 'IV', 'e'),
(2, 'Pembina Utama Madya', 'IV', 'd'),
(3, 'Pembina Utama Muda', 'IV', 'c'),
(4, 'Pembina Tingkat I', 'IV', 'b'),
(5, 'Pembina', 'IV', 'a'),
(6, 'Penata Tingkat I', 'III', 'd'),
(7, 'Penata', 'III', 'c'),
(8, 'Penata Muda Tingkat I', 'III', 'b'),
(9, 'Penata Muda', 'III', 'a'),
(10, 'Pengatur Tingkat I', 'II', 'd'),
(11, 'Pengatur', 'II', 'c'),
(12, 'Pengatur Muda Tingkat I', 'II', 'b'),
(13, 'Pengatur Muda', 'II', 'a'),
(14, 'Juru Tingkat I', 'I', 'd'),
(15, 'Juru', 'I', 'c'),
(16, 'Juru Muda Tingkat I', 'I', 'b'),
(17, 'Juru Muda', 'I', 'a');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_master_pelatihan`
--

CREATE TABLE `tbl_master_pelatihan` (
  `id_pelatihan` int(50) NOT NULL,
  `nama_pelatihan` varchar(150) NOT NULL,
  `level` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_master_pelatihan`
--

INSERT INTO `tbl_master_pelatihan` (`id_pelatihan`, `nama_pelatihan`, `level`) VALUES
(2, 'SESPA', '2'),
(3, 'SESPASUS', '0'),
(4, 'SESKOAD', '0'),
(5, 'KM-III', '0'),
(6, 'SEPADYA', '3'),
(7, 'KM-IV', '0'),
(8, 'SEPALA', '4'),
(9, 'SEPADA', '0'),
(10, 'SESPUT', '0'),
(11, 'TARPADNAS', '0'),
(12, 'UJIAN DINAS TK I', '0'),
(13, 'UJIAN DINAS TK II', '0'),
(14, 'UJIAN DINAS TK III', '0'),
(15, 'SPATI', '1'),
(16, 'SPAMEN (DIKLATPIM TK.II)', '2'),
(17, 'SPAMA (DIKLATPIM TK.III)', '3'),
(18, 'ADUM (DIKLATPIM TK.IV)', '4'),
(19, 'EVALUASI & PELAPORAN', '0'),
(20, 'PENATARAN P4', '0'),
(21, 'ADMINISTRASI & KEUANGAN', '0'),
(22, 'ANALISA JABATAN', '0'),
(23, 'MATERIAL MANAGEMENT', '0'),
(24, 'NETWORK PLANNING', '0'),
(25, 'PENATARAN ATLAS', '0'),
(26, 'PENGAWASAN MELEKAT', '0'),
(27, 'P.T.K.', '0'),
(28, 'PROCUREMENT', '0'),
(29, 'MANAGEMENT PROYEK', '0'),
(30, 'SCREENING', '0'),
(31, 'PUBLIC ADMINISTRATION', '0'),
(32, 'ADMINISTRASI KEPEGAWAIAN', '0'),
(33, 'ADMINISTRASI PERKANTORAN', '0'),
(34, 'AKUNTANSI', '0'),
(35, 'ADMINISTRASI TEKNIS', '0'),
(36, 'ASPAL BETON', '0'),
(37, 'BAHASA INGGRIS', '0'),
(38, 'BENDAHARAWAN', '0'),
(39, 'BENDAHARAWAN', '0'),
(40, 'BREVET', '0'),
(41, 'BREVET A', '0'),
(42, 'BREVET B', '0'),
(43, 'BREVET C', '0'),
(44, 'DRAFTER REPRODUKSI GRAFIKA', '0'),
(45, 'DRAINASE', '0'),
(46, 'DRIVER', '0'),
(47, 'E & P', '0'),
(48, 'E & P IRIGASI', '0'),
(49, 'ENGINEERING & MANAGEMENT', '0'),
(50, 'GAMBAR', '0'),
(51, 'GROUND WATER MONITORING PROCEDURE', '0'),
(52, 'HIDROMETRI', '0'),
(53, 'INSTRUKTUR DIKLAT KEPENDUDUKAN', '0'),
(54, 'INSTRUKTUR MEKANIK', '0'),
(55, 'INSTRUKTUR MEKANIK & PERALATAN', '0'),
(56, 'INSTRUKTUR OPERATOR', '0'),
(57, 'INSTRUKTUR OPERATOR PERALATAN', '0'),
(58, 'INTERPRET FOTO UDARA', '0'),
(59, 'INVENTARISASI BARANG', '0'),
(60, 'IRIGASI SEDERHANA', '0'),
(61, 'JURU AIR', '0'),
(62, 'JURU UKUR', '0'),
(63, 'KADER TEKNIK TK C (OPSETER)', '0'),
(64, 'KEARSIPAN', '0'),
(65, 'KEINSTRUKTURAN', '0'),
(66, 'KOMPUTER', '0'),
(67, 'KEPROTOKOLAN', '0'),
(68, 'KESELAMATAN & KESEHATAN KERJA', '0'),
(69, 'KETERTIBAN & KEAMANAN', '0'),
(70, 'KOMPUTER BASIC', '0'),
(71, 'KOMPUTER FORTRAN', '0'),
(72, 'KOMPUTER INTRODUCTION', '0'),
(73, 'KOMPUTER PROGRAMMING', '0'),
(74, 'MANAGEMENT LOGISTIK', '0'),
(75, 'MANDOR/FOREMAN', '0'),
(76, 'MEKANIK', '0'),
(77, 'MEKANIK LAPANGAN', '0'),
(78, 'MEKANIK LISTRIK', '0'),
(79, 'MEKANIK UMUM', '0'),
(80, 'OPERATION RESEARCH', '0'),
(81, 'OPERATOR KOMPUTER', '0'),
(82, 'OPERATOR MEKANIK', '0'),
(83, 'PADAT KARYA GAYA BARU', '0'),
(84, 'PEJABAT INTI PROYEK', '0'),
(85, 'PEMADAM KEBAKARAN', '0'),
(86, 'PEMASANGAN BATA & PELESTERAN', '0'),
(87, 'PEMBINAAN HUKUM', '0'),
(88, 'PEMIMPIN PROYEK JALAN (PPJ)', '0'),
(89, 'PENGAMAT BID PENGAIRAN', '0'),
(90, 'PENGAWASAN BANGUNAN', '0'),
(91, 'PENGETAHUAN BARANG', '0'),
(92, 'PENGGUNAAN MESIN TIK IBM', '0'),
(93, 'PENINGKATAN PENGEMUDI', '0'),
(94, 'PENYIMPANAN & PENYALURAN', '0'),
(95, 'IKMN', '0'),
(96, 'PENYUSUNAN ANGGARAN', '0'),
(97, 'PERENC DETAIL KOTA', '0'),
(98, 'PERENC SOSIAL PENGEMBANGAN AREA', '0'),
(99, 'PERENC SOSIAL PENGEMBANGAN KOTA', '0'),
(100, 'PERINTIS PERBAIKAN PERUMAHAN KOTA', '0'),
(101, 'PRATUGAS BID BINA MARGA', '0'),
(102, 'PRATUGAS BID CIPTA KARYA', '0'),
(103, 'PRATUGAS BID PENGAIRAN', '0'),
(104, 'PRATUGAS PENGAWASAN', '0'),
(105, 'PRATUGAS PERENCANAAN', '0'),
(106, 'PROFFESIONAL STAFF', '0'),
(107, 'PROG PENGAWASAN TATA PENGAIRAN', '0'),
(108, 'PROG TEKNIK MENGGAMBAR', '0'),
(109, 'QUALITY CONTROL', '0'),
(110, 'SATPAM', '0'),
(111, 'SEISMOLOGI & TEKNOLOGI GEMPA', '0'),
(112, 'SINDER BID BM', '0'),
(113, 'SISTEM AKUNTANSI', '0'),
(114, 'SURVEY & MAPPING', '0'),
(115, 'TATA KEARSIPAN', '0'),
(116, 'TEKNIS PADAT KARYA GAYA BARU', '0'),
(117, 'TEKNOLOGI BETON', '0'),
(118, 'TEKNOLOGI GEMPA', '0'),
(119, 'TENAGA INTI', '0'),
(120, 'TENAGA PELAKSANA PEMBANGUNAN PERUMAHAN RAKYAT', '0'),
(121, 'UKUR TANAH', '0'),
(122, 'VERIFIKASI', '0'),
(123, 'UKUR TANAH & PEMETAAN', '0'),
(124, 'UKUR TANAH BID KE-AIR-AN', '0'),
(125, 'UKUR TANAH BID KE-BM-AN', '0'),
(126, 'UKUR TANAH BID KE-CK-AN', '0'),
(127, 'UKUR TANAH TK A/B', '0'),
(128, 'HYDROLOGY', '0'),
(129, 'LAND CAPABILITY EVALUATION', '0'),
(130, 'PLANNING & DESIGN', '0'),
(131, 'DESIGN OF SMALL HYDRAULIC STRUCTURES', '0'),
(132, 'IRRIGATION AND DRAINAGE LAYOUT', '0'),
(133, 'OVERVIEW OF PROJECT SELECTION THROUGH TH', '0'),
(134, 'REVIEW OF SSIMP STRUCTURE DESIGNS', '0'),
(135, 'MATHEMATICAL MODEL SIMULATION', '0'),
(136, 'SITE SELECTION-GROUND WATER', '0'),
(137, 'PENGAWASAN & PELAKSANAAN KONSTRUKSI', '0'),
(138, 'CONSTRUCTION SUPERVISION', '0'),
(139, 'WELL DESIGN & WELL CONSTRUCTION', '0'),
(140, 'CONSTRUCTION SUPERVISION TRAINING', '0'),
(141, 'LAB. TECHNICIAN TRAINING', '0'),
(142, 'KERJASAMA TEKNIK ANTAR NEGARA BERKEMBANG', '0'),
(143, 'INSTITUTIONAL DEVELOPMENT', '0'),
(144, 'WOMEN IN DEVELOPMENT', '0'),
(145, 'IRIGASI TAMBAK', '0'),
(146, 'O & M - AIR TANAH', '0'),
(147, 'O & M - IRIGASI', '0'),
(148, 'OPERATION & MAINTENANCE', '0'),
(149, 'WATER OPERATION CENTRE', '0'),
(150, 'OPERATION-ADVANCED OPERATION PROJECT', '0'),
(151, 'OPERATION-BUDGETTING', '0'),
(152, 'OPERATION-INTRODUCTION & MAINTENANCE', '0'),
(153, 'OPERATION-REQUIREMENT & MAINTENANCE', '0'),
(154, 'OPERATION-WATER DISTRIBUTION', '0'),
(155, 'INFORMATION FILM', '0'),
(156, 'KEY FARMERS', '0'),
(157, 'TRAINING IN FARM MACHINERY - OPERATORS', '0'),
(158, 'TRAINING OF ACTION GROUP', '0'),
(159, 'TRAINING OF FIELD GROUPS', '0'),
(160, 'WATER USE MANAGEMENT', '0'),
(161, 'INVENTARISASI LAPANGAN', '0'),
(162, 'PENELITIAN PENGAIRAN (PTGA)', '0'),
(163, 'PENGEMBANGAN POLA SOCIO-TECHNICAL ASSOSI', '0'),
(164, 'AGRICULTURAL DEVELOPMENT', '0'),
(165, 'ENUMERATOR TRAINING', '0'),
(166, 'TRAINING OF SURVEYORS', '0'),
(167, 'AGRO-ECONOMIC ANALYSIS', '0'),
(168, 'TEKNIK PANTAI', '0'),
(169, 'COASTAL ZONE MANAGEMENT', '0'),
(170, 'O & M - RAWA', '0'),
(171, 'KEAMANAN BENDUNGAN', '0'),
(172, 'OVERVIEW OF DAM DESIGN AND CONSTRUCTION', '0'),
(173, 'PERENCANAAN & PEMBUATAN PROGRAM', '0'),
(174, 'MANAJEMEN LALU LINTAS', '0'),
(175, 'KEAMANAN JALAN', '0'),
(176, 'KEBISINGAN LALULINTAS', '0'),
(177, 'KESELAMATAN JALAN RAYA', '0'),
(178, 'PENCEMARAN UDARA', '0'),
(179, 'PARKIR', '0'),
(180, 'PENAKSIRAN CEPAT PERGERAKAN DIPERKOTAAN', '0'),
(181, 'TANAH LEMBEK', '0'),
(182, 'PENINGKATAN KEMAMPUAN TEKNISI LABORATORIUM', '0'),
(183, 'PENGENDALIAN MUTU JALAN & JEMBATAN', '0'),
(184, 'PELAKSANAAN PEKERJAAN KONSTRUKSI JALAN', '0'),
(185, 'PELAKSANAAN PERCOBAAN PENGHAMPARAN ASPAL', '0'),
(186, 'PENANGGULANGAN EROSI LERENG JALAN', '0'),
(187, 'PENGAWAS PELAKSANA KONSTRUKSI JALAN', '0'),
(188, 'OPERATOR PERALATAN JALAN', '0'),
(189, 'PENANGANAN & PERAWATAN ALAT-ALAT KONSTR.', '0'),
(190, 'DRIVING/RIDING TRAINING', '0'),
(191, 'LEGGER JALAN', '0'),
(192, 'TATA CARA PENULISAN LAPORAN', '0'),
(193, 'PEMASYARAKATAN PRODUK HASIL PUSLITBANG', '0'),
(194, 'KOMPUTERISASI INVENTARISASI BAHAN JALAN', '0'),
(195, 'INTEGRASI KOMPUTERISASI LEGER JALAN', '0'),
(196, 'MODEL PROJECT-SEMINAR', '0'),
(197, 'METODOLOGI PENELITIAN', '0'),
(198, 'PENGGUNAAN ALAT FWD', '0'),
(199, 'PENGGUNAAN X-RAY FLOURESCENE', '0'),
(200, 'DAUR ULANG KONSTRUKSI PEKERJAAN JALAN', '0'),
(201, 'PENYEMPURNAAN STANDAR SPESIFIKASI ASPAL', '0'),
(202, 'PEMELIHARAAN RUTIN DAN BERKALA', '0'),
(203, 'PENDATAAN JALAN', '0'),
(204, 'HASIL PENELITIAN ASPAL KARET DILAPANGAN', '0'),
(205, 'DESAIN JEMBATAN', '0'),
(206, 'PERENCANAAN DAN PEMROGRAMAN JEMBATAN', '0'),
(207, 'PROSEDUR UMUM', '0'),
(208, 'GENERAL HIGHWAY COURSE', '0'),
(209, 'BRIDGE PLANNING & PROGRAMMING INSTRUCTOR', '0'),
(210, 'PLANNING & PROGRAMMING WORKSHOP', '0'),
(211, 'KONSTRUKSI EKSPANSION JOINT', '0'),
(212, 'INSPEKSI KONDISI JEMBATAN', '0'),
(213, 'PENGAWASAN PEMBANGUNAN JEMBATAN', '0'),
(214, 'KONSULTAN P3KT', '0'),
(215, 'PERKUATAN JEMBATAN', '0'),
(216, 'BRIDGE ROUTINE INSPECTION', '0'),
(217, 'BRIDGE CONSTRUCTION SUPERVISION', '0'),
(218, 'PEMELIHARAAN JEMBATAN', '0'),
(219, 'PEMELIHARAAN RUTIN & BERKALA JALAN KOTA', '0'),
(220, 'PENATAAN UNTUK TROUBLE SHOOTER', '0'),
(221, 'DESIMINASI KETATABANGUNAN', '0'),
(222, 'PENGELOLAAN & PEMANFAATAN GEDUNG NEGARA', '0'),
(223, 'KEPALA SEKSI BID.PERSAMPAHAN', '0'),
(224, 'TEKNOLOGI BANGUNAN BID PEMUKIMAN', '0'),
(225, 'LAB. BIDANG PENGUJIAN', '0'),
(226, 'MANAJEMEN PEMBANGUANAN KOTA DE', '0'),
(227, 'PEMANTAPAN MATERI TEKNIS PELATIHAN', '0'),
(228, 'PENATAAN RUANG DAERAH', '0'),
(229, 'PENATAAN RUANG', '0'),
(230, 'PENATAAN RUANG KOTA METROPOLITAN', '0'),
(231, 'PENATAAN RUANG TERBUKA UMUM', '0'),
(232, 'PENGEMBANGAN PROFESI PERENCANA', '0'),
(233, 'PENYIAPAN PROGRAM P3KT', '0'),
(234, 'MANAJEMEN KAWASAN PERKOTAAN', '0'),
(235, 'PENINGKATAN KEMAMPUAN TENAGA PENATAAN', '0'),
(236, 'PENATAAN RUANG KAWASAN PARIWISATA', '0'),
(237, 'LOKAKARYA P3KT BAGI STAF PROFESIONAL', '0'),
(238, 'PENATAAN RUANG KOTA METROPOLITAN', '0'),
(239, 'PENATAAN RUANG KOTA BARU', '0'),
(240, 'PRE COURSE IUDM', '0'),
(241, 'SISTIM INFORMASI GEOGRAFI', '0'),
(242, 'DESAIN JALAN/JEMBATAN', '0'),
(243, 'TRAINING TEHNIK KOMUNIKASI', '0'),
(244, 'COMUNICATION SAMS', '0'),
(245, 'TATA KEARSIPAN DAN PERSURATAN', '0'),
(246, 'TATALAKSANA ADMINISTRASI', '0'),
(247, 'KESEKRETARIATAN', '0'),
(248, 'PENGELOLAAN ARSIP AKTIF', '0'),
(249, 'PENYEGARAN SATPAM', '0'),
(250, 'MANAJEMEN PERKANTORAN', '0'),
(251, 'INFORMASI & KOMUNIKASI', '0'),
(252, 'KEHUMASAN', '0'),
(253, 'OPERATOR TELEX', '0'),
(254, 'PENINGKATAN KEMAMPUAN BAHASA INGGRIS', '0'),
(255, 'DHARMA WANITA CONVERSATION CLASS', '0'),
(256, 'ENGLISH FOR INKINDO ENGINEERS', '0'),
(257, 'ENGLISH FOR INTERNATIONAL COOPERATION', '0'),
(258, 'ENGLISH LEVEL II', '0'),
(259, 'ENGLISH LEVEL III', '0'),
(260, 'KETERAMPILAN PEGAWAI/ BAHASA INGGRIS', '0'),
(261, 'BPBLAV', '0'),
(262, 'TRAINING OF TRAINERS', '0'),
(263, 'TEKNIK KEINSTRUKTURAN', '0'),
(264, 'INSTRUKTUR', '0'),
(265, 'TEKNIK INSTRUKSIONAL I', '0'),
(266, 'TOT FOR ENGLISH TEACHERS', '0'),
(267, 'PENGEMBANGAN KURIKULUM DAN MEDIA', '0'),
(268, 'CURRICULUM DEVELOPMENT', '0'),
(269, 'AUDIO VISUAL', '0'),
(270, 'MANAJEMEN PELATIHAN', '0'),
(271, 'INDONESIA TRAINING NETWORK (INTN)', '0'),
(272, 'PENYEGARAN PEDIKPROP', '0'),
(273, 'MONITORING DAN EVALUASI DIKLAT', '0'),
(274, 'MANAJEMEN DIKLAT', '0'),
(275, 'RENCANA DIKLAT DAERAH', '0'),
(276, 'MANAJEMEN KOMPUTER', '0'),
(277, 'PERPUSTAKAAN', '0'),
(278, 'MANAGEMENT INFORMATION SYSTEMS', '0'),
(279, 'PENGINDRAAN JAUH & SIST INFO GEOGRAFI', '0'),
(280, 'BENDAHARAWAN PENERIMA', '0'),
(281, 'MANAJEMEN KEUANGAN', '0'),
(282, 'TATA USAHA ADMINISTRASI KEUANGAN', '0'),
(283, 'PEMBUKUAN & PENYUSUNAN LAPORAN KEUANGAN', '0'),
(284, 'FINANCIAL MANAGEMENT', '0'),
(285, 'CARA PENGADAAN KONSULTAN', '0'),
(286, 'PENGADAAN JASA KONSTRUKSI', '0'),
(287, 'PENGADAAN BARANG DAN JASA KONSULTAN', '0'),
(288, 'BIMBINGAN TEKNIS IKMN', '0'),
(289, 'MANAJEMEN PERALATAN', '0'),
(290, 'PENGADAAN BARANG', '0'),
(291, 'MANAJEMEN AUDIT', '0'),
(292, 'ADMINISTRASI BANTUAN LUAR NEGERI', '0'),
(293, 'ABLN', '0'),
(294, 'PENYULUHAN ADM. PINJAMAN LUAR NEGERI', '0'),
(295, 'MANAGEMENT DEVELOPMENT', '0'),
(296, 'PERENCANAAN TENAGA KERJA', '0'),
(297, 'PSYKOLOGI TERAPAN', '0'),
(298, 'SISTEM PENILAIAN PERFORMANCE PEGAWAI', '0'),
(299, 'SIST PEMBGN. KARIER & PENGKAJIAN KINERJA', '0'),
(300, 'KESEHATAN DAN KESELAMATAN KERJA', '0'),
(301, 'MANPOWER PLANNING INFORMATION SYSTEM', '0'),
(302, 'COORDINATION OF PLANNING & PROGRAMMING', '0'),
(303, 'MANAJEMEN PROYEK', '0'),
(304, 'PEMIMPIN PROYEK FISIK/P3F', '0'),
(305, 'TECHNICAL ASPECTS OF PROJECT MANAGEMENT', '0'),
(306, 'MANAJEMEN SKILL DAN DINAMIKA KELOMPOK', '0'),
(307, 'PRAJABATAN UMUM TINGKAT I', '0'),
(308, 'PRAJABATAN UMUM TINGKAT II', '0'),
(309, 'ASPEK HUKUM', '0'),
(310, 'PRAJABATAN UMUM TINGKAT III', '0'),
(311, 'TATA CARA PEMAKAIAN STANDAR BIDANG PU', '0'),
(312, 'INFORMASI TENTANG PTUN', '0'),
(313, 'HUKUM PERBURUHAN', '0'),
(314, 'PENERAPAN HUKUM & PERUNDANG-UNDANGAN', '0'),
(315, 'KOLOKIUM HASIL PENELITIAN & PENGEMBANGAN', '0'),
(316, 'PERENCANAAN PENANGGULANGAN BENCANA ALAM', '0'),
(317, 'PREPARATION OF TENDER DOCUMENTS', '0'),
(318, 'PROSEDUR TENDER', '0'),
(319, 'GAMBAR & ANGGARAN', '0'),
(320, 'GRAFIKA', '0'),
(321, 'TEKNIK GAMBAR & ANGGARAN', '0'),
(322, 'INSTRUKTUR WORKSHOP P3KT', '0'),
(323, 'ASISTEN TEKNISI LABORATORIUM', '0'),
(324, 'TEKNISI LABORATORIUM & REKAYASA', '0'),
(325, 'PENGAWAS LAPANGAN', '0'),
(326, 'TRAINING JOB SITE (OECF)', '0'),
(327, 'VALUE CONTROL', '0'),
(328, 'QUALITY SURVEYOR', '0'),
(329, 'SUPERVISI KONSTRUKSI', '0'),
(330, 'KETERAMPILAN MEKANIK', '0'),
(331, 'KETERAMPILAN OPERATOR', '0'),
(332, 'KETERAMPILAN OPERATOR DUMP TRUCK', '0'),
(333, 'MEKANIK DASAR', '0'),
(334, 'SIMKA', '0'),
(335, 'PENINGKATAN MEKANIK OPERATOR BUMAR WHEEL', '0'),
(336, 'PENINGKATAN MEKANIK STONE CRUSHER', '0'),
(337, 'BAHAN BANGUNAN DAN LABORATORIUM', '0'),
(338, 'PENINGKATAN LABORATORIUM', '0'),
(339, 'PENGUJIAN BAHAN (LABORATORIUM)', '0'),
(340, 'PENANGGULANGAN PENDERITA GAWAT DARURAT', '0'),
(341, 'PAKET STATISTIK', '0'),
(342, 'PENCEGAHAN BAHAYA KEBAKARAN', '0'),
(343, 'ANALISA DAMPAK LINGKUNGAN', '0'),
(344, 'STONE COLOUMN SEBAGAI REDUKSI PENURUNAN', '0'),
(345, 'SIMD UNTUK MANAJER', '0'),
(346, 'SIMD UNTUK OPERATOR', '0'),
(347, 'TRAINING LABORAN', '0'),
(348, 'FUNGSI PENGT.BID.KE-PU-AN', '0'),
(349, 'PENINGK.FUNGSI.PENGAT.BID.KE-PU-AN', '0'),
(350, 'PENGEMBANGAN SISTEM PERENC & KARIER', '0'),
(351, 'BIMBINGAN TEKNIK HUKUM', '0'),
(352, 'TEKNIK PELAKS. PROG. BUDAYA KERJA', '0'),
(353, 'TEKNIK PENYUSUNAN PEDOMAN KERJA', '0'),
(354, 'PEMBINAAN TEKNIS PASCA GEMPA', '0'),
(355, 'PENANGANAN TEKNIS BID.PERSAMPAHAN', '0'),
(356, 'APPLIED ENGINEERING', '0'),
(357, 'TEKNIS PENGT. PENATAAN BANGUNAN', '0'),
(358, 'TEKNIS PENGELOLAAN ADM. LAN', '0'),
(359, 'SINKRONISASI PERENCANAAN DAN PROGRAM', '0'),
(360, 'DESIMINASI TATACARA APLK.KEU.PROYEK', '0'),
(361, 'PENGELOLAAN ADMINISTRASI PROYEK', '0'),
(362, 'MANAJEMEN KONSTRUKSI PENGAIRAN', '0'),
(363, 'INSTRUKTUR TATAGUNA AIR', '0'),
(364, 'PENGAWAS UTAMA', '0'),
(365, 'PROGRAM D.III DALAM NAGERI', '0'),
(366, 'PROGRAM D.IV', '0'),
(367, 'PROGRAM S1 DALAM NEGERI', '0'),
(368, 'PROGRAM S2 DALAM NEGERI', '0'),
(369, 'PROGRAM S3 DALAM NEGERI', '0'),
(370, 'SIM KLN', '0'),
(371, 'PEMERIKSAAN PROGRAM/KOMPREHENSHIF', '0'),
(372, 'STANDARD PENGADAAN BARANG DAN JASA', '0'),
(373, 'PENINGK.FUNGSI PEL.TUGAS BID.KE-PU-AN', '0'),
(374, 'DASAR KEARSIPAN', '0'),
(375, 'MANAJEMEN PERPUSTAKAAN', '0'),
(376, 'APRESIASI PUSDOKINFO', '0'),
(377, 'OVERSEAS TRAINING LUAR NEGERI', '0'),
(378, 'ELECTRICAL INSTALLATION & INSTRUMENT', '0'),
(379, 'WATER SUPPLY MASTER PLANNING', '0'),
(380, 'WATER SUPPLY MANAGEMENT', '0'),
(381, 'WATER TREATMENT FACILITY PLAN & DESIGN', '0'),
(382, 'DISTRIBUTION SYSTEM PLANNING & DESIGN', '0'),
(383, 'WATER PURIFICATION', '0'),
(384, 'MAINTENANCE OF PIPELINE', '0'),
(385, 'LEAKAGE CONTROL', '0'),
(386, 'PENINGKATAN KOORDINASI PERENCANAAN', '0'),
(387, 'SINKRONISASI PROGRAM', '0'),
(388, 'AIR LIMBAH', '0'),
(389, 'MECHANICAL INSTALLATION', '0'),
(390, 'BIDANG PERSAMPAHAN', '0'),
(391, 'ORGANISASI & MANAJEMEN', '0'),
(392, 'PERSYARATAN JABATAN', '0'),
(393, 'TEKNIS KEPEGAWAIAN', '0');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_master_pendidikan`
--

CREATE TABLE `tbl_master_pendidikan` (
  `id` int(11) NOT NULL,
  `pendidikan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_master_pendidikan`
--

INSERT INTO `tbl_master_pendidikan` (`id`, `pendidikan`) VALUES
(1, 'SD/MI'),
(2, 'SMP/Mts'),
(3, 'SMA/MA/SMK'),
(4, 'D1'),
(5, 'D2'),
(6, 'D3'),
(7, 'D4'),
(8, 'S1'),
(9, 'S2'),
(10, 'S3');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_master_penghargaan`
--

CREATE TABLE `tbl_master_penghargaan` (
  `id_penghargaan` int(50) NOT NULL,
  `nama_penghargaan` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_master_penghargaan`
--

INSERT INTO `tbl_master_penghargaan` (`id_penghargaan`, `nama_penghargaan`) VALUES
(2, 'BINTANG REPUBLIK INDONESIA ADIPURNA'),
(3, 'BINTANG REPUBLIK INDONESIA ADIPRADANA'),
(4, 'BINTANG REPUBLIK INDONESIA UTAMA'),
(5, 'BINTANG REPUBLIK INDONESIA PRATAMA'),
(6, 'BINTANG REPUBLIK INDONESIA NARARYA'),
(7, 'BINTANG MAHAPUTERA'),
(8, 'BINTANG MAHAPUTERA ADIPURNA'),
(9, 'BINTANG MAHAPUTERA ADIPRADANA'),
(10, 'BINTANG MAHAPUTERA UTAMA'),
(11, 'BINTANG MAHAPUTERA PRATAMA'),
(12, 'BINTANG MAHAPUTERA NARARYA'),
(13, 'BINTANG JASA'),
(14, 'BINTANG JASA UTAMA'),
(15, 'BINTANG JASA PRATAMA'),
(16, 'BINTANG JASA NARARYA'),
(17, 'BINTANG YUDHA DHARMA'),
(18, 'BINTANG YUDHA DHARMA UTAMA'),
(19, 'BINTANG YUDHA DHARMA PRATAMA'),
(20, 'BINTANG YUDHA DHARMA NARARYA'),
(21, 'BINTANG KARTIKA EKA PAKSI'),
(22, 'BINTANG KARTIKA EKA PAKSI UTAMA'),
(23, 'BINTANG KARTIKA EKA PAKSI PRATAMA'),
(24, 'BINTANG KARTIKA EKA PAKSI NARARYA'),
(25, 'BINTANG JALASENA'),
(26, 'BINTANG JALASENA UTAMA'),
(27, 'BINTANG JALASENA PRATAMA'),
(28, 'BINTANG JALASENA NARARYA'),
(29, 'BINTANG SWA BHUWANA PAKSA'),
(30, 'BINTANG SWA BHUWANA PAKSA UTAMA'),
(31, 'BINTANG SWA BHUWANA PAKSA PRATAMA'),
(32, 'BINTANG SWA BHUWANA PAKSA NARARYA'),
(33, 'BINTANG BHAYANGKARA'),
(34, 'BINTANG BHAYANGKARA UTAMA'),
(35, 'BINTANG BHAYANGKARA PRATAMA'),
(36, 'BINTANG BHAYANGKARA NARARYA'),
(37, 'BINTANG GARUDA'),
(38, 'BINTANG SEWINDU ANGKATAN PERANG RI'),
(39, 'SATYALANCANA BHAKTI'),
(40, 'SATYALANCANA TELADAN'),
(41, 'SATYALANCANA KESETIAAN'),
(42, 'SATYALANCANA KESETIAAN 8 TAHUN'),
(43, 'SATYALANCANA KESETIAAN 16 TAHUN'),
(44, 'SATYALANCANA KESETIAAN 24 TAHUN'),
(45, 'SATYALANCANA PERANG KEMERDEKAAN'),
(46, 'SATYALANCANA PERANG KEMERDEKAAN KELAS I'),
(47, 'SATYALANCANA PERANG KEMERDEKAAN KELAS II'),
(48, 'SATYALANCANA SAPTAMARGA'),
(49, 'SATYALANCANA GOM'),
(50, 'SATYALANCANA GOM KELAS I'),
(51, 'SATYALANCANA GOM KELAS II'),
(52, 'SATYALANCANA GOM KELAS III'),
(53, 'SATYALANCANA GOM KELAS IV'),
(54, 'SATYALANCANA GOM KELAS V'),
(55, 'SATYALANCANA GOM KELAS VI'),
(56, 'SATYALANCANA GOM KELAS VII'),
(57, 'SATYALANCANA GOM KELAS VIII'),
(58, 'SATYALANCANA GOM KELAS IX'),
(59, 'SATYALANCANA PERINTIS PERGERAKAN KEMERDEKAAN'),
(60, 'SATYALANCANA PERINGATAN PERJUANGAN KEMERDEKAAN'),
(61, 'SATYALANCANA PEMBANGUNAN'),
(62, 'SATYALANCANA KARYA SATYA'),
(63, 'SATYALANCANA KARYA SATYA KELAS I'),
(64, 'SATYALANCANA KARYA SATYA KELAS II'),
(65, 'SATYALANCANA KARYA SATYA KELAS III'),
(66, 'SATYALANCANA KARYA SATYA KELAS IV'),
(67, 'SATYALANCANA KARYA SATYA KELAS V'),
(68, 'SATYALANCANA KARYA SATYA XXX TAHUN'),
(69, 'SATYALANCANA KARYA SATYA XX TAHUN'),
(70, 'SATYALANCANA KARYA SATYA X TAHUN'),
(71, 'SATYALANCANA KEBAKTIAN SOSIAL'),
(72, 'SATYALANCANA KEBUDAYAAN'),
(73, 'SATYALANCANA JASA DHARMA ANGKATAN LAUT'),
(74, 'SATYALANCANA SATYA DASA WARSA POLRI'),
(75, 'SATYALANCANA JANA UTAMA'),
(76, 'SATYALANCANA KSATRYA TAMTAMA'),
(77, 'SATYALANCANA KARYA BHAKTI'),
(78, 'SATYALANCANA PRASETYA PANCA WARSA'),
(79, 'SATYALANCANA KEAMANAN'),
(80, 'SATYALANCANA WIRA KARYA'),
(81, 'SATYALANCANA SATYA DHARMA'),
(82, 'SATYALANCANA WIRA DHARMA'),
(83, 'SATYALANCANA YUDHA UTAMA KKO-AL'),
(84, 'SATYALANCANA YUDHA UTAMA KKO-AL KELAS I'),
(85, 'SATYALANCANA YUDHA UTAMA KKO-AL KELAS II'),
(86, 'SATYALANCANA DWIYA SISTHA'),
(87, 'SATYALANCANA PENEGAK'),
(88, 'SATYALANCANA PEPERA'),
(89, 'PIAGAM SATYA KARYA'),
(90, 'PIAGAM SATYA KARYA 20 TAHUN'),
(91, 'PIAGAM SATYA KARYA 30 TAHUN'),
(92, 'PIAGAM PENGHARGAAN ATAS JASA KHUSUS TEK.KEKARYAAN'),
(93, 'PIAGAM PENGHARGAAN TELADAN'),
(94, 'PIAGAM PENGHARGAAN TELADAN KEPEMIMPINAN'),
(95, 'PIAGAM PENGHARGAAN TELADAN KEPEGAWAIAN'),
(96, 'PIAGAM PENGHARGAAN TELADAN PELAK. TUGAS'),
(97, 'PIAGAM PENGHARGAAN ANUMERTA'),
(98, 'PIAGAM PENGHARGAAN KHUSUS'),
(99, 'SATYALANCANA SANTI DHARMA'),
(100, 'SATYALANCANA SEROJA'),
(101, 'SATYALANCANA PENDIDIKAN'),
(102, 'NUGRAHA SAKANTI JANA UTAMA'),
(103, 'NUGRAHA SAKANTI KSATRYA TAMTAMA'),
(104, 'NUGRAHA SAKANTI KARYA BHAKTI'),
(105, 'SAM KARYA NUGRAHA'),
(106, 'PRASAMYA PURNAKARYA NUGRAHA'),
(107, 'BINTANG SAKTI'),
(108, 'BINTANG DHARMA'),
(109, 'BINTANG GERILYA'),
(110, 'BINTANG BUDAYA PARAMA DHARMA'),
(111, 'SATYALANCANA PERISTIWA'),
(112, 'LAIN-LAIN'),
(114, 'PENGHARGAAN');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_master_ppk`
--

CREATE TABLE `tbl_master_ppk` (
  `id_ppk` int(50) NOT NULL,
  `nama_ppk` varchar(150) NOT NULL,
  `parent_satuan_kerja` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_master_ppk`
--

INSERT INTO `tbl_master_ppk` (`id_ppk`, `nama_ppk`, `parent_satuan_kerja`) VALUES
(32, 'PPK Pelaksanaan Jalan Bebas Hambatan Medan - Kuala Namu', 'PELAKSANAAN JALAN BEBAS HAMBATAN MEDAN - KUALANAMU'),
(33, 'PPK Perencanaan dan Pengawasan Jalan Bebas Hambatan Medan-Kuala Namu', 'PELAKSANAAN JALAN BEBAS HAMBATAN MEDAN - KUALANAMU'),
(34, 'PPK1 (Bts. Sumut - Simpang Kulim)', 'PELAKSANAAN JALAN NASIONAL WILAYAH I PROVINSI RIAU'),
(35, 'PPK 2 (Simpang Batam - Dumai)', 'PELAKSANAAN JALAN NASIONAL WILAYAH I PROVINSI RIAU'),
(36, 'PPK 3 (Simpang Palas - Pekanbaru)', 'PELAKSANAAN JALAN NASIONAL WILAYAH I PROVINSI RIAU'),
(37, 'PPK 4 (Jalan Subrantas Pekanbaru - Rantau Berangin - Batas Sumbar)', 'PELAKSANAAN JALAN NASIONAL WILAYAH I PROVINSI RIAU'),
(38, 'PPK 5 (Pekanbaru - Batas Kampar - Simpang Lago)', 'PELAKSANAAN JALAN NASIONAL WILAYAH II PROVINSI RIA'),
(39, 'PPK 6 (Simpang Lago - Batas Inhu - Simpang Jayapura)', 'PELAKSANAAN JALAN NASIONAL WILAYAH II PROVINSI RIA'),
(40, 'PPK 7 (Simpang Jayapura - Siberida - Batas Jambi)', 'PELAKSANAAN JALAN NASIONAL WILAYAH II PROVINSI RIA'),
(41, 'PPK 8 (Pematang Reba - Rengat - Kuala Enok)', 'PELAKSANAAN JALAN NASIONAL WILAYAH II PROVINSI RIA'),
(42, 'PPK 9 (Batas Kuansing - Taluk Kuantan - Batas Sumbar)', 'PELAKSANAAN JALAN NASIONAL WILAYAH II PROVINSI RIA'),
(43, 'PPK Perencanaan Dan Pengawasan Jalan Nasional Prov. Riau', 'PERENCANAAN DAN PENGAWASAN JALAN NASIONAL PROVINSI'),
(44, 'PPK 1 (Pulau Bintan)', 'PELAKSANAAN JALAN NASIONAL WILAYAH I PROVINSI KEPU'),
(45, 'PPK 2 (Pulau Batam dan Pulau Galang)', 'PELAKSANAAN JALAN NASIONAL WILAYAH I PROVINSI KEPU'),
(46, 'PPK 3 (Pulau Karimun dan Pulau Kundur)', 'PELAKSANAAN JALAN NASIONAL WILAYAH I PROVINSI KEPU'),
(47, 'PPK 4 (Pulau Natuna)', 'PELAKSANAAN JALAN NASIONAL WILAYAH I PROVINSI KEPU'),
(48, 'PPK Perencanaan Dan Pengawasan Jalan Nasional Prov. Kepulauan Riau', 'PERENCANAAN DAN PENGAWASAN JALAN NASIONAL PROVINSI'),
(49, 'PPK 7 (Pelaksanaan Preservasi dan Peningkatan Kapasitas Jalan dan Jembatan Nasional Payakumbuh dan Sekitarnya)', 'PELAKSANAAN JALAN NASIONAL WILAYAH I PROVINSI SUMB'),
(50, 'PPK 8 (Pelaksanaan Preservasi dan Peningkatan Kapasitas Jalan dan Jembatan Nasional Lubuk Sikaping dan Sekitarnya)', 'PELAKSANAAN JALAN NASIONAL WILAYAH I PROVINSI SUMB'),
(51, 'PPK 9 (Pelaksanaan Preservasi dan Peningkatan Kapasitas Jalan dan Jembatan Nasional Ujung Gading dan Sekitarnya)', 'PELAKSANAAN JALAN NASIONAL WILAYAH I PROVINSI SUMB'),
(52, 'PPK 10 (Pelaksanaan Preservasi dan Peningkatan Kapasitas Jalan dan Jembatan Nasional Pariaman dan Sekitarnya)', 'PELAKSANAAN JALAN NASIONAL WILAYAH I PROVINSI SUMB'),
(53, 'PPK 11 (Pembangunan jembatan kelok)', 'PELAKSANAAN JALAN NASIONAL WILAYAH I PROVINSI SUMB'),
(54, 'PPK 6 (Pelaksanaan Preservasi dan Peningkatan Kapasitas Jalan dan Jembatan Nasional Padang Panjang dan Sekitarnya)', 'PELAKSANAAN JALAN NASIONAL WILAYAH II PROVINSI SUM'),
(55, 'PPK 12 (Pelaksanaan Preservasi dan Peningkatan Kapasitas Jalan dan Jembatan Nasional Solok dan Sekitarnya)', 'PELAKSANAAN JALAN NASIONAL WILAYAH II PROVINSI SUM'),
(56, 'PPK 13 (Pelaksanaan Preservasi dan Peningkatan Kapasitas Jalan dan Jembatan Nasional Dharmasraya dan Sekitarnya)', 'PELAKSANAAN JALAN NASIONAL WILAYAH II PROVINSI SUM'),
(57, 'PPK 14 (Pelaksanaan Preservasi dan Peningkatan Kapasitas Jalan dan Jembatan Nasional Painan dan Sekitarnya)', 'PELAKSANAAN JALAN NASIONAL WILAYAH II PROVINSI SUM'),
(58, 'PPK 15 (Pelaksanaan Preservasi dan Peningkatan Kualitas Kapasitas Jalan dan Jembatan Nasional Indarapura dan Sekitarnya)', 'PELAKSANAAN JALAN NASIONAL WILAYAH II PROVINSI SUM'),
(59, 'PPK Perencanaan Dana Pengawasan Jalan Nasional Provinsi Sumatera Barat', 'PERENCANAAN DAN PENGAWASAN JALAN NASIONAL PROVINSI'),
(60, 'PPK. 2 Batas Riau - Batas Kab. Tanjab', 'PELAKSANAAN JALAN NASIONAL WILAYAH I PROVINSI JAMB');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_master_satuan_kerja`
--

CREATE TABLE `tbl_master_satuan_kerja` (
  `id_satuan_kerja` int(50) NOT NULL,
  `nama_satuan_kerja` varchar(150) NOT NULL,
  `parent_unit` varchar(50) NOT NULL,
  `alamat` varchar(114) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_master_satuan_kerja`
--

INSERT INTO `tbl_master_satuan_kerja` (`id_satuan_kerja`, `nama_satuan_kerja`, `parent_unit`, `alamat`) VALUES
(2, 'BADAN KEPEGAWAIAN DAN PENGEMBANGAN SDM', 'PEMERINTAH KABUPATEN BUTON SELATAN', ''),
(3, 'BADAN KESATUAN BANGSA DAN PEMBINAAN POLITIK', 'PEMERINTAH KABUPATEN BUTON SELATAN', ''),
(4, 'BADAN KEUANGAN DAERAH', 'PEMERINTAH KABUPATEN BUTON SELATAN', ''),
(5, 'BADAN PENELITIAN DAN PENGEMBANGAN DAERAH', 'PEMERINTAH KABUPATEN BUTON SELATAN', ''),
(6, 'BAPPEDA', 'PEMERINTAH KABUPATEN BUTON SELATAN', ''),
(7, 'BPBD', 'PEMERINTAH KABUPATEN BUTON SELATAN', ''),
(8, 'DINAS KEARSIPAN DAN PERPUSTAKAAN', 'PEMERINTAH KABUPATEN BUTON SELATAN', ''),
(9, 'DINAS KEBUDAYAAN', 'PEMERINTAH KABUPATEN BUTON SELATAN', ''),
(10, 'DINAS KELAUTAN DAN PERIKANAN', 'PEMERINTAH KABUPATEN BUTON SELATAN', ''),
(11, 'DINAS KEPENDUDUKAN DAN CAPIL', 'PEMERINTAH KABUPATEN BUTON SELATAN', ''),
(12, 'DINAS KESEHATAN', 'PEMERINTAH KABUPATEN BUTON SELATAN', ''),
(13, 'DINAS KETAHANAN PANGAN', 'PEMERINTAH KABUPATEN BUTON SELATAN', ''),
(14, 'DINAS KOMUNIKASI DAN INFORMASI', 'PEMERINTAH KABUPATEN BUTON SELATAN', ''),
(15, 'DINAS KOPERASI UKM, PERINDAG', 'PEMERINTAH KABUPATEN BUTON SELATAN', ''),
(16, 'DINAS LINGKUNGAN HIDUP', 'PEMERINTAH KABUPATEN BUTON SELATAN', ''),
(17, 'DINAS PARIWISATA DAN EKONOMI KREATIF', 'PEMERINTAH KABUPATEN BUTON SELATAN', ''),
(18, 'DINAS PEMADAM KEBAKARAN DAN PENYELAMATAN', 'PEMERINTAH KABUPATEN BUTON SELATAN', ''),
(19, 'DINAS PEMBERDAYAAN MASY. DAN DESA', 'PEMERINTAH KABUPATEN BUTON SELATAN', ''),
(20, 'DINAS PEMBERDAYAAN PEREMPUAN DAN PA', 'PEMERINTAH KABUPATEN BUTON SELATAN', ''),
(21, 'DINAS PENANAMAN MODAL DAN PTSP', 'PEMERINTAH KABUPATEN BUTON SELATAN', ''),
(22, 'DINAS PENDIDIKAN KABUPATEN BUTON SELATAN', 'PEMERINTAH KABUPATEN BUTON SELATAN', ''),
(23, 'DINAS PENGENDALIAN PENDUDUK DAN KB', 'PEMERINTAH KABUPATEN BUTON SELATAN', ''),
(24, 'DINAS PERHUBUNGAN', 'PEMERINTAH KABUPATEN BUTON SELATAN', ''),
(25, 'DINAS PERTANIAN', 'PEMERINTAH KABUPATEN BUTON SELATAN', ''),
(26, 'DINAS PERUMAHAN DAN KAWASAN PEMUKIMAN', 'PEMERINTAH KABUPATEN BUTON SELATAN', ''),
(27, 'DINAS PU DAN PENATAAN RUANG', 'PEMERINTAH KABUPATEN BUTON SELATAN', ''),
(28, 'DINAS SOSIAL', 'PEMERINTAH KABUPATEN BUTON SELATAN', ''),
(29, 'DINAS TENAGA KERJA DAN TRANSMIGRASI', 'PEMERINTAH KABUPATEN BUTON SELATAN', ''),
(30, 'DPRD', 'PEMERINTAH KABUPATEN BUTON SELATAN', ''),
(31, 'INSPEKTORAT', 'PEMERINTAH KABUPATEN BUTON SELATAN', ''),
(32, 'KANTOR KECAMATAN BATAUGA', 'PEMERINTAH KABUPATEN BUTON SELATAN', ''),
(33, 'KANTOR KECAMATAN BATUATAS', 'PEMERINTAH KABUPATEN BUTON SELATAN', ''),
(34, 'KANTOR KECAMATAN KADATUA', 'PEMERINTAH KABUPATEN BUTON SELATAN', ''),
(35, 'KANTOR KECAMATAN LAPANDEWA', 'PEMERINTAH KABUPATEN BUTON SELATAN', ''),
(36, 'KANTOR KECAMATAN SAMPOLAWA', 'PEMERINTAH KABUPATEN BUTON SELATAN', ''),
(37, 'KANTOR KECAMATAN SIOMPU', 'PEMERINTAH KABUPATEN BUTON SELATAN', ''),
(38, 'KANTOR KECAMATAN SIOMPU BARAT', 'PEMERINTAH KABUPATEN BUTON SELATAN', ''),
(39, 'KPU', 'PEMERINTAH KABUPATEN BUTON SELATAN', ''),
(40, 'PENGAWAS SEKOLAH', 'PEMERINTAH KABUPATEN BUTON SELATAN', ''),
(41, 'PUSKESMAS GERAK MAKMUR', 'PEMERINTAH KABUPATEN BUTON SELATAN', ''),
(42, 'PUSKESMAS WILAYAH BATAUGA', 'PEMERINTAH KABUPATEN BUTON SELATAN', ''),
(43, 'PUSKESMAS WILAYAH BATUATAS', 'PEMERINTAH KABUPATEN BUTON SELATAN', ''),
(44, 'PUSKESMAS WILAYAH KADATUA', 'PEMERINTAH KABUPATEN BUTON SELATAN', ''),
(45, 'PUSKESMAS WILAYAH LAPANDEWA', 'PEMERINTAH KABUPATEN BUTON SELATAN', ''),
(46, 'PUSKESMAS WILAYAH SAMPOLAWA', 'PEMERINTAH KABUPATEN BUTON SELATAN', ''),
(47, 'PUSKESMAS WILAYAH SIOMPU', 'PEMERINTAH KABUPATEN BUTON SELATAN', ''),
(48, 'PUSKESMAS WILAYAH SIOMPU BARAT', 'PEMERINTAH KABUPATEN BUTON SELATAN', ''),
(49, 'RSUD ', 'PEMERINTAH KABUPATEN BUTON SELATAN', ''),
(50, 'SATUAN POLISI PAMONG PRAJA', 'PEMERINTAH KABUPATEN BUTON SELATAN', ''),
(51, 'SD NEG. 1  KAPOA', 'PEMERINTAH KABUPATEN BUTON SELATAN', ''),
(52, 'SD NEG. 1 BIWINAPADA', 'PEMERINTAH KABUPATEN BUTON SELATAN', ''),
(53, 'SD NEG. 1 BOLA', 'PEMERINTAH KABUPATEN BUTON SELATAN', ''),
(54, 'SD NEG. 1 KAPOA', 'PEMERINTAH KABUPATEN BUTON SELATAN', ''),
(55, 'SD NEG. 1 KAPOA BARAT', 'PEMERINTAH KABUPATEN BUTON SELATAN', ''),
(56, 'SD NEG. 1 KATILOMBU', 'PEMERINTAH KABUPATEN BUTON SELATAN', ''),
(57, 'SD NEG. 1 LALOLE', 'PEMERINTAH KABUPATEN BUTON SELATAN', ''),
(58, 'SD NEG. 1 POOGALAMPA', 'PEMERINTAH KABUPATEN BUTON SELATAN', ''),
(59, 'SD NEG. 1 UWEMAASI', 'PEMERINTAH KABUPATEN BUTON SELATAN', ''),
(60, 'SD NEG. 2 BANABUNGI', 'PEMERINTAH KABUPATEN BUTON SELATAN', ''),
(61, 'SD NEG. 3 TONGALI', 'PEMERINTAH KABUPATEN BUTON SELATAN', ''),
(62, 'SD NEGERI  2 BANABUNGI', 'PEMERINTAH KABUPATEN BUTON SELATAN', ''),
(63, 'SD NEGERI  2 KAIMBULAWA', 'PEMERINTAH KABUPATEN BUTON SELATAN', ''),
(64, 'SD NEGERI  3 MOLONA', 'PEMERINTAH KABUPATEN BUTON SELATAN', ''),
(65, 'SD NEGERI 1 BANABUNGI', 'PEMERINTAH KABUPATEN BUTON SELATAN', ''),
(66, 'SD NEGERI 1 BANGUN', 'PEMERINTAH KABUPATEN BUTON SELATAN', ''),
(67, 'SD NEGERI 1 BATUATAS BARAT ', 'PEMERINTAH KABUPATEN BUTON SELATAN', ''),
(68, 'SD NEGERI 1 KAIMBULAWA', 'PEMERINTAH KABUPATEN BUTON SELATAN', ''),
(69, 'SD NEGERI 1 KATILOMBU', 'PEMERINTAH KABUPATEN BUTON SELATAN', ''),
(70, 'SD NEGERI 1 LAOMPO ', 'PEMERINTAH KABUPATEN BUTON SELATAN', ''),
(71, 'SD NEGERI 1 MOLONA', 'PEMERINTAH KABUPATEN BUTON SELATAN', ''),
(72, 'SD NEGERI 1 POOGALAMPA', 'PEMERINTAH KABUPATEN BUTON SELATAN', ''),
(73, 'SD NEGERI 1 TIRA', 'PEMERINTAH KABUPATEN BUTON SELATAN', ''),
(74, 'SD NEGERI 1 TOLANDO JAYA', 'PEMERINTAH KABUPATEN BUTON SELATAN', ''),
(75, 'SD NEGERI 1 WAMBONGI', 'PEMERINTAH KABUPATEN BUTON SELATAN', ''),
(76, 'SD NEGERI 1 WATUAMPARA', 'PEMERINTAH KABUPATEN BUTON SELATAN', ''),
(77, 'SD NEGERI 2 BANGUN', 'PEMERINTAH KABUPATEN BUTON SELATAN', ''),
(78, 'SD NEGERI 2 BUSOA', 'PEMERINTAH KABUPATEN BUTON SELATAN', ''),
(79, 'SD NEGERI 2 GUNUNG SEJUK ', 'PEMERINTAH KABUPATEN BUTON SELATAN', ''),
(80, 'SD NEGERI 2 LALOLE', 'PEMERINTAH KABUPATEN BUTON SELATAN', ''),
(81, 'SD NEGERI 2 MOLONA ', 'PEMERINTAH KABUPATEN BUTON SELATAN', ''),
(82, 'SD NEGERI 3 BUSOA', 'PEMERINTAH KABUPATEN BUTON SELATAN', ''),
(83, 'SDN  1 MASIRI ', 'PEMERINTAH KABUPATEN BUTON SELATAN', ''),
(84, 'SDN 1 BAHARI ', 'PEMERINTAH KABUPATEN BUTON SELATAN', ''),
(85, 'SDN 1 BANGUN', 'PEMERINTAH KABUPATEN BUTON SELATAN', ''),
(86, 'SDN 1 BATU ATAS TIMUR KECAMATAN BATUATAS', 'PEMERINTAH KABUPATEN BUTON SELATAN', ''),
(87, 'SDN 1 BATUATAS BARAT ', 'PEMERINTAH KABUPATEN BUTON SELATAN', ''),
(88, 'SDN 1 BATUATAS LIWU', 'PEMERINTAH KABUPATEN BUTON SELATAN', ''),
(89, 'SDN 1 BIWINAPADA', 'PEMERINTAH KABUPATEN BUTON SELATAN', ''),
(90, 'SDN 1 BTS TIMUR', 'PEMERINTAH KABUPATEN BUTON SELATAN', ''),
(91, 'SDN 1 BURANGASI RUMBIA ', 'PEMERINTAH KABUPATEN BUTON SELATAN', ''),
(92, 'SDN 1 BUSOA', 'PEMERINTAH KABUPATEN BUTON SELATAN', ''),
(93, 'SDN 1 BWINAPADA', 'PEMERINTAH KABUPATEN BUTON SELATAN', ''),
(94, 'SDN 1 GAYA BARU ', 'PEMERINTAH KABUPATEN BUTON SELATAN', ''),
(95, 'SDN 1 GERAK MAKMUR ', 'PEMERINTAH KABUPATEN BUTON SELATAN', ''),
(96, 'SDN 1 GUNUNG SEJUK', 'PEMERINTAH KABUPATEN BUTON SELATAN', ''),
(97, 'SDN 1 HENDEA ', 'PEMERINTAH KABUPATEN BUTON SELATAN', ''),
(98, 'SDN 1 KAOFE ', 'PEMERINTAH KABUPATEN BUTON SELATAN', ''),
(99, 'SDN 1 KAOFE SELATAN', 'PEMERINTAH KABUPATEN BUTON SELATAN', ''),
(100, 'SDN 1 KAPOA ', 'PEMERINTAH KABUPATEN BUTON SELATAN', ''),
(101, 'SDN 1 KATILOMBU ', 'PEMERINTAH KABUPATEN BUTON SELATAN', ''),
(102, 'SDN 1 LALOLE', 'PEMERINTAH KABUPATEN BUTON SELATAN', ''),
(103, 'SDN 1 LAMPANAIRI', 'PEMERINTAH KABUPATEN BUTON SELATAN', ''),
(104, 'SDN 1 LAOMPO ', 'PEMERINTAH KABUPATEN BUTON SELATAN', ''),
(105, 'SDN 1 LAPANDEWA ', 'PEMERINTAH KABUPATEN BUTON SELATAN', ''),
(106, 'SDN 1 LAPANDEWA MAKMUR ', 'PEMERINTAH KABUPATEN BUTON SELATAN', ''),
(107, 'SDN 1 LAWELA ', 'PEMERINTAH KABUPATEN BUTON SELATAN', ''),
(108, 'SDN 1 LIPU ', 'PEMERINTAH KABUPATEN BUTON SELATAN', ''),
(109, 'SDN 1 LONTOI ', 'PEMERINTAH KABUPATEN BUTON SELATAN', ''),
(110, 'SDN 1 MAJAPAHIT ', 'PEMERINTAH KABUPATEN BUTON SELATAN', ''),
(111, 'SDN 1 MASIRI', 'PEMERINTAH KABUPATEN BUTON SELATAN', ''),
(112, 'SDN 1 MBANUA KECAMATAN SIOMPU BARAT', 'PEMERINTAH KABUPATEN BUTON SELATAN', ''),
(113, 'SDN 1 MOLONA ', 'PEMERINTAH KABUPATEN BUTON SELATAN', ''),
(114, 'SDN 1 POOGALAMPA', 'PEMERINTAH KABUPATEN BUTON SELATAN', ''),
(115, 'SDN 1 SANDANG PANGAN ', 'PEMERINTAH KABUPATEN BUTON SELATAN', ''),
(116, 'SDN 1 TADUASA', 'PEMERINTAH KABUPATEN BUTON SELATAN', ''),
(117, 'SDN 1 TODOMBULU ', 'PEMERINTAH KABUPATEN BUTON SELATAN', ''),
(118, 'SDN 1 TOLANDO JAYA', 'PEMERINTAH KABUPATEN BUTON SELATAN', ''),
(119, 'SDN 1 TONGALI', 'PEMERINTAH KABUPATEN BUTON SELATAN', ''),
(120, 'SDN 1 UWEMAASI', 'PEMERINTAH KABUPATEN BUTON SELATAN', ''),
(121, 'SDN 1 WACUALA', 'PEMERINTAH KABUPATEN BUTON SELATAN', ''),
(122, 'SDN 1 WAKINAMBORO ', 'PEMERINTAH KABUPATEN BUTON SELATAN', ''),
(123, 'SDN 1 WAONU ', 'PEMERINTAH KABUPATEN BUTON SELATAN', ''),
(124, 'SDN 1 WATUAMPARA ', 'PEMERINTAH KABUPATEN BUTON SELATAN', ''),
(125, 'SDN 1 WAWOANGI ', 'PEMERINTAH KABUPATEN BUTON SELATAN', ''),
(126, 'SDN 1MASIRI ', 'PEMERINTAH KABUPATEN BUTON SELATAN', ''),
(127, 'SDN 2 BAHARI ', 'PEMERINTAH KABUPATEN BUTON SELATAN', ''),
(128, 'SDN 2 BANGUN', 'PEMERINTAH KABUPATEN BUTON SELATAN', ''),
(129, 'SDN 2 BUSOA', 'PEMERINTAH KABUPATEN BUTON SELATAN', ''),
(130, 'SDN 2 GERAK MAKMUR ', 'PEMERINTAH KABUPATEN BUTON SELATAN', ''),
(131, 'SDN 2 GUNUNG SEJUK', 'PEMERINTAH KABUPATEN BUTON SELATAN', ''),
(132, 'SDN 2 KAIMBULAWA', 'PEMERINTAH KABUPATEN BUTON SELATAN', ''),
(133, 'SDN 2 LALOLE', 'PEMERINTAH KABUPATEN BUTON SELATAN', ''),
(134, 'SDN 2 LAOMPO ', 'PEMERINTAH KABUPATEN BUTON SELATAN', ''),
(135, 'SDN 2 LAPANDEWA KAINDEA ', 'PEMERINTAH KABUPATEN BUTON SELATAN', ''),
(136, 'SDN 2 MAMBULU ', 'PEMERINTAH KABUPATEN BUTON SELATAN', ''),
(137, 'SDN 2 MASIRI ', 'PEMERINTAH KABUPATEN BUTON SELATAN', ''),
(138, 'SDN 2 MOLONA ', 'PEMERINTAH KABUPATEN BUTON SELATAN', ''),
(139, 'SDN 2 TONGALI ', 'PEMERINTAH KABUPATEN BUTON SELATAN', ''),
(140, 'SDN 2 WAKINAMBORO', 'PEMERINTAH KABUPATEN BUTON SELATAN', ''),
(141, 'SDN 2 WAKINAMBORO KECAMATAN SIOMPU', 'PEMERINTAH KABUPATEN BUTON SELATAN', ''),
(142, 'SDN 3 LAOMPO', 'PEMERINTAH KABUPATEN BUTON SELATAN', ''),
(143, 'SDN 3 TONGALI ', 'PEMERINTAH KABUPATEN BUTON SELATAN', ''),
(144, 'SDN BTS LIWU ', 'PEMERINTAH KABUPATEN BUTON SELATAN', ''),
(145, 'SDN LIWU BATUATAS', 'PEMERINTAH KABUPATEN BUTON SELATAN', ''),
(146, 'SDN. 1 LAOMPO ', 'PEMERINTAH KABUPATEN BUTON SELATAN', ''),
(147, 'SDN.1 BOLA ', 'PEMERINTAH KABUPATEN BUTON SELATAN', ''),
(148, 'SDN.1 BUSOA ', 'PEMERINTAH KABUPATEN BUTON SELATAN', ''),
(149, 'SDN.1 LAPANDEWA KAINDEA ', 'PEMERINTAH KABUPATEN BUTON SELATAN', ''),
(150, 'SDN.1 LAWELA ', 'PEMERINTAH KABUPATEN BUTON SELATAN', ''),
(151, 'SDN.2 BWINAPADA', 'PEMERINTAH KABUPATEN BUTON SELATAN', ''),
(152, 'SETDA', 'PEMERINTAH KABUPATEN BUTON SELATAN', ''),
(153, 'SMP NEG. 1 BATAUGA', 'PEMERINTAH KABUPATEN BUTON SELATAN', ''),
(154, 'SMP NEG. 1 BATUATAS', 'PEMERINTAH KABUPATEN BUTON SELATAN', ''),
(155, 'SMP NEG. 1 KADATUA', 'PEMERINTAH KABUPATEN BUTON SELATAN', ''),
(156, 'SMP NEG. 1 SAMPOLAWA', 'PEMERINTAH KABUPATEN BUTON SELATAN', ''),
(157, 'SMP NEG. 2 BATAUGA', 'PEMERINTAH KABUPATEN BUTON SELATAN', ''),
(158, 'SMP NEG. 2 KADATUA', 'PEMERINTAH KABUPATEN BUTON SELATAN', ''),
(159, 'SMP NEG. 2 SAMPOLAWA', 'PEMERINTAH KABUPATEN BUTON SELATAN', ''),
(160, 'SMP NEG. 2 SIOMPU BARAT', 'PEMERINTAH KABUPATEN BUTON SELATAN', ''),
(161, 'SMP NEG. 3 BATAUGA', 'PEMERINTAH KABUPATEN BUTON SELATAN', ''),
(162, 'SMP NEG. 3 SAMPOLAWA', 'PEMERINTAH KABUPATEN BUTON SELATAN', ''),
(163, 'SMP NEG. 5 BATAUGA', 'PEMERINTAH KABUPATEN BUTON SELATAN', ''),
(164, 'SMP NEG. 6 BATAUGA', 'PEMERINTAH KABUPATEN BUTON SELATAN', ''),
(165, 'SMP NEGERI 3 BATAUGA', 'PEMERINTAH KABUPATEN BUTON SELATAN', ''),
(166, 'SMP NEGERI 5 BATAUGA', 'PEMERINTAH KABUPATEN BUTON SELATAN', ''),
(167, 'SMP NEGERI 6 BATAUGA', 'PEMERINTAH KABUPATEN BUTON SELATAN', ''),
(168, 'SMP NEGERI SATAP KAPOA', 'PEMERINTAH KABUPATEN BUTON SELATAN', ''),
(169, 'SMPN 1 BATAUGA', 'PEMERINTAH KABUPATEN BUTON SELATAN', ''),
(170, 'SMPN 1 BATUATAS', 'PEMERINTAH KABUPATEN BUTON SELATAN', ''),
(171, 'SMPN 1 KADATUA', 'PEMERINTAH KABUPATEN BUTON SELATAN', ''),
(172, 'SMPN 1 LAPANDEWA', 'PEMERINTAH KABUPATEN BUTON SELATAN', ''),
(173, 'SMPN 1 SAMPOLAWA', 'PEMERINTAH KABUPATEN BUTON SELATAN', ''),
(174, 'SMPN 1 SIOMPU', 'PEMERINTAH KABUPATEN BUTON SELATAN', ''),
(175, 'SMPN 1 SIOMPU BARAT', 'PEMERINTAH KABUPATEN BUTON SELATAN', ''),
(176, 'SMPN 2  KADATUA', 'PEMERINTAH KABUPATEN BUTON SELATAN', ''),
(177, 'SMPN 2 BATAUGA', 'PEMERINTAH KABUPATEN BUTON SELATAN', ''),
(178, 'SMPN 2 BATUATAS', 'PEMERINTAH KABUPATEN BUTON SELATAN', ''),
(179, 'SMPN 2 KADATUA', 'PEMERINTAH KABUPATEN BUTON SELATAN', ''),
(180, 'SMPN 2 LAPANDEWA', 'PEMERINTAH KABUPATEN BUTON SELATAN', ''),
(181, 'SMPN 2 SAMPOLAWA', 'PEMERINTAH KABUPATEN BUTON SELATAN', ''),
(182, 'SMPN 2 SIOMPU', 'PEMERINTAH KABUPATEN BUTON SELATAN', ''),
(183, 'SMPN 2 SIOMPU BARAT', 'PEMERINTAH KABUPATEN BUTON SELATAN', ''),
(184, 'SMPN 3  KADATUA', 'PEMERINTAH KABUPATEN BUTON SELATAN', ''),
(185, 'SMPN 3 BATAUGA', 'PEMERINTAH KABUPATEN BUTON SELATAN', ''),
(186, 'SMPN 3 LAPANDEWA', 'PEMERINTAH KABUPATEN BUTON SELATAN', ''),
(187, 'SMPN 3 SIOMPU', 'PEMERINTAH KABUPATEN BUTON SELATAN', ''),
(188, 'SMPN 4 SAMPOLAWA', 'PEMERINTAH KABUPATEN BUTON SELATAN', ''),
(189, 'SMPN 4 SATAP BATAUGA', 'PEMERINTAH KABUPATEN BUTON SELATAN', ''),
(190, 'SMPN 5 BATAUGA', 'PEMERINTAH KABUPATEN BUTON SELATAN', ''),
(191, 'SMPN 5 SAMPOLAWA', 'PEMERINTAH KABUPATEN BUTON SELATAN', ''),
(192, 'SMPN 6 BATAUGA', 'PEMERINTAH KABUPATEN BUTON SELATAN', ''),
(193, 'SMPN 6 BATAUGA  ', 'PEMERINTAH KABUPATEN BUTON SELATAN', ''),
(194, 'SMPN SATAP BAHARI', 'PEMERINTAH KABUPATEN BUTON SELATAN', ''),
(195, 'SMPN SATAP GAYA BARU', 'PEMERINTAH KABUPATEN BUTON SELATAN', ''),
(196, 'SMPN SATAP KAPOA', 'PEMERINTAH KABUPATEN BUTON SELATAN', ''),
(197, 'SMPN SATAP LONTOI', 'PEMERINTAH KABUPATEN BUTON SELATAN', ''),
(198, 'SMPN SATAP TIRA', 'PEMERINTAH KABUPATEN BUTON SELATAN', ''),
(199, 'SMPN SATU ATAP BAHARI KECAMATAN SAMPOLAWA', 'PEMERINTAH KABUPATEN BUTON SELATAN', ''),
(200, 'TK  PGRI AL MUNIR BIWINAPADA ', 'PEMERINTAH KABUPATEN BUTON SELATAN', ''),
(201, 'TK 1 BOLA', 'PEMERINTAH KABUPATEN BUTON SELATAN', ''),
(202, 'TK 1 BUSOA', 'PEMERINTAH KABUPATEN BUTON SELATAN', ''),
(203, 'TK 1 LAMPANAIRI', 'PEMERINTAH KABUPATEN BUTON SELATAN', ''),
(204, 'TK 1 MAJAPAHIT', 'PEMERINTAH KABUPATEN BUTON SELATAN', ''),
(205, 'TK 1 MASIRI', 'PEMERINTAH KABUPATEN BUTON SELATAN', ''),
(206, 'TK 1 NURHAYAT LAWELA ', 'PEMERINTAH KABUPATEN BUTON SELATAN', ''),
(207, 'TK 1 PGRI BIWINAPADA', 'PEMERINTAH KABUPATEN BUTON SELATAN', ''),
(208, 'TK 1 PGRI TONGALI ', 'PEMERINTAH KABUPATEN BUTON SELATAN', ''),
(209, 'TK 1 PKK LAOMPO', 'PEMERINTAH KABUPATEN BUTON SELATAN', ''),
(210, 'TK 1 POOGALAMPA', 'PEMERINTAH KABUPATEN BUTON SELATAN', ''),
(211, 'TK 2 AMALIA MASIRI', 'PEMERINTAH KABUPATEN BUTON SELATAN', ''),
(212, 'TK 2 TUNAS HARAPAN BUSOA', 'PEMERINTAH KABUPATEN BUTON SELATAN', ''),
(213, 'TK AL AKBAR', 'PEMERINTAH KABUPATEN BUTON SELATAN', ''),
(214, 'TK AL HIKMAH', 'PEMERINTAH KABUPATEN BUTON SELATAN', ''),
(215, 'TK AL IKHLAS KARAE', 'PEMERINTAH KABUPATEN BUTON SELATAN', ''),
(216, 'TK AL MUHAJIRIN BATUAWU', 'PEMERINTAH KABUPATEN BUTON SELATAN', ''),
(217, 'TK BANDAR BATAUGA', 'PEMERINTAH KABUPATEN BUTON SELATAN', ''),
(218, 'TK BATUPERMAI', 'PEMERINTAH KABUPATEN BUTON SELATAN', ''),
(219, 'TK CAHAYA KABURA-BURANA ', 'PEMERINTAH KABUPATEN BUTON SELATAN', ''),
(220, 'TK DHARMA BAKTI TODOMBULU ', 'PEMERINTAH KABUPATEN BUTON SELATAN', ''),
(221, 'TK DHARMA WANITA KATILOMBU ', 'PEMERINTAH KABUPATEN BUTON SELATAN', ''),
(222, 'TK DHARMA WANITA LAOMPO', 'PEMERINTAH KABUPATEN BUTON SELATAN', ''),
(223, 'TK FEISAL 2 BAHARI ', 'PEMERINTAH KABUPATEN BUTON SELATAN', ''),
(224, 'TK HARAPAN JAYA KEC. SAMPOLAWA', 'PEMERINTAH KABUPATEN BUTON SELATAN', ''),
(225, 'TK HIDAYAH', 'PEMERINTAH KABUPATEN BUTON SELATAN', ''),
(226, 'TK HIDAYAH MOLAGINA', 'PEMERINTAH KABUPATEN BUTON SELATAN', ''),
(227, 'TK KUNCUP PERTIWI ', 'PEMERINTAH KABUPATEN BUTON SELATAN', ''),
(228, 'TK LALOWATU', 'PEMERINTAH KABUPATEN BUTON SELATAN', ''),
(229, 'TK NURHIDAYAH', 'PEMERINTAH KABUPATEN BUTON SELATAN', ''),
(230, 'TK NURHIDAYAH LIPU', 'PEMERINTAH KABUPATEN BUTON SELATAN', ''),
(231, 'TK NURUL ITA', 'PEMERINTAH KABUPATEN BUTON SELATAN', ''),
(232, 'TK PGRI NURUL IQRA WAKINAMBORO', 'PEMERINTAH KABUPATEN BUTON SELATAN', ''),
(233, 'TK SINAR SEJUK', 'PEMERINTAH KABUPATEN BUTON SELATAN', ''),
(234, 'TK TUNAS MUDA KAPOA', 'PEMERINTAH KABUPATEN BUTON SELATAN', ''),
(235, 'TK TUNAS WAONU ', 'PEMERINTAH KABUPATEN BUTON SELATAN', ''),
(236, 'TK WATIGINANDA ', 'PEMERINTAH KABUPATEN BUTON SELATAN', ''),
(237, 'TK WAWOANGI', 'PEMERINTAH KABUPATEN BUTON SELATAN', ''),
(238, 'TK YAKIN BANABUNGI', 'PEMERINTAH KABUPATEN BUTON SELATAN', ''),
(239, 'UPTD DIKNAS KEC. BATAUGA', 'PEMERINTAH KABUPATEN BUTON SELATAN', ''),
(240, 'UPTD DIKNAS KEC. KADATUA', 'PEMERINTAH KABUPATEN BUTON SELATAN', ''),
(241, 'UPTD DIKNAS KEC. LAPANDEWA', 'PEMERINTAH KABUPATEN BUTON SELATAN', ''),
(242, 'UPTD DIKNAS KEC. SAMPOLAWA', 'PEMERINTAH KABUPATEN BUTON SELATAN', ''),
(243, 'UPTD DIKNAS KEC. SIOMPU', 'PEMERINTAH KABUPATEN BUTON SELATAN', ''),
(244, 'UPTD DIKNAS KEC. SIOMPU BARAT', 'PEMERINTAH KABUPATEN BUTON SELATAN', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_master_status_dalam_keluarga`
--

CREATE TABLE `tbl_master_status_dalam_keluarga` (
  `id` int(11) NOT NULL,
  `status_keluarga` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_master_status_dalam_keluarga`
--

INSERT INTO `tbl_master_status_dalam_keluarga` (`id`, `status_keluarga`) VALUES
(1, 'Suami'),
(2, 'Istri'),
(3, 'Anak');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_master_status_jabatan`
--

CREATE TABLE `tbl_master_status_jabatan` (
  `id_status_jabatan` int(50) NOT NULL,
  `nama_jabatan` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_master_status_jabatan`
--

INSERT INTO `tbl_master_status_jabatan` (`id_status_jabatan`, `nama_jabatan`) VALUES
(2, 'REGULER'),
(3, 'REGULER PILIHAN (JABATAN STRUKTURAL)'),
(4, 'PILIHAN (JABATAN FUNGSIONAL)'),
(5, 'PILIHAN (PENYESUAIAN IJAZAH)'),
(6, 'GOLONGAN DARI PENGADAAN CPNS/PNS');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_master_status_kawin`
--

CREATE TABLE `tbl_master_status_kawin` (
  `id` int(11) NOT NULL,
  `status_kawin` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_master_status_kawin`
--

INSERT INTO `tbl_master_status_kawin` (`id`, `status_kawin`) VALUES
(1, 'Belum Kawin'),
(2, 'Kawin'),
(3, 'Janda'),
(4, 'Duda');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_master_status_pegawai`
--

CREATE TABLE `tbl_master_status_pegawai` (
  `id_status_pegawai` int(50) NOT NULL,
  `nama_status` varchar(150) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_master_status_pegawai`
--

INSERT INTO `tbl_master_status_pegawai` (`id_status_pegawai`, `nama_status`) VALUES
(3, 'AKTIF'),
(4, 'MENINGGAL'),
(5, 'PENSIUN'),
(6, 'CPNS'),
(7, 'MASA PERSIAPAN PENSIUN');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_master_unit_kerja`
--

CREATE TABLE `tbl_master_unit_kerja` (
  `id_unit_kerja` int(50) NOT NULL,
  `nama_unit_kerja` varchar(150) NOT NULL,
  `eselon` varchar(50) NOT NULL,
  `parent_unit` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_master_unit_kerja`
--

INSERT INTO `tbl_master_unit_kerja` (`id_unit_kerja`, `nama_unit_kerja`, `eselon`, `parent_unit`) VALUES
(1, 'DIREKTORAT JENDERAL BINA MARGA', 'I.a', ''),
(2, 'SEKRETARIAT DIREKTORAT JENDERAL BINA MARGA', 'II.a', 'DIREKTORAT JENDERAL BINA MARGA'),
(31, 'BALAI PELAKSANAAN JALAN NASIONAL XI, DITJEN BINA MARGA', 'III.b', 'DIREKTORAT JENDERAL BINA MARGA'),
(32, 'SUB BAGIAN TATA USAHA, BPJN XI, DITJEN BINA MARGA', 'IV.a', 'BALAI PELAKSANAAN JALAN NASIONAL XI, DITJEN BINA M'),
(33, 'SEKSI PERENCANAAN DAN PELAKSANA, BPJN XI, DITJEN BINA MARGA', 'IV.a', 'BALAI PELAKSANAAN JALAN NASIONAL XI, DITJEN BINA M'),
(34, 'SEKSI PENGENDALIAN SISTEM, PELAKSANAAN, PENGUJIAN DAN PERALATAN, BPJN XI, DITJEN BINA MARGA', 'IV.a', 'BALAI PELAKSANAAN JALAN NASIONAL XI, DITJEN BINA M');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_sppd_honorer`
--

CREATE TABLE `tbl_sppd_honorer` (
  `id_sppd_ld` int(11) NOT NULL,
  `id_jenis_perjadin` int(11) NOT NULL,
  `tgl_sppd` varchar(114) NOT NULL,
  `tahun` int(4) NOT NULL,
  `id_pegawai` int(11) NOT NULL,
  `no_perjadin` varchar(114) NOT NULL,
  `nomor` varchar(114) NOT NULL,
  `tgl_bukti` varchar(114) NOT NULL,
  `maksud_perjadin` text NOT NULL,
  `tujuan_perjadin` text NOT NULL,
  `kd_anggaran` varchar(114) NOT NULL,
  `id_golongan` int(11) NOT NULL,
  `id_jabatan` int(11) NOT NULL,
  `id_pangkat` int(11) NOT NULL,
  `tujuan` varchar(114) NOT NULL,
  `tgl_berangkat` varchar(114) NOT NULL,
  `tgl_kembali` varchar(114) NOT NULL,
  `lama_hari` varchar(114) NOT NULL,
  `uang_perhari` int(20) NOT NULL,
  `nama_hotel` varchar(114) NOT NULL,
  `uang_hotel` int(11) NOT NULL,
  `total_uang_hotel` int(11) NOT NULL,
  `total_uang_harian` int(11) NOT NULL,
  `keterangan_anggaran` text NOT NULL,
  `uraian_kas` text NOT NULL,
  `tempat_berangkat` varchar(114) NOT NULL,
  `pejabat_yang_memerintah` varchar(114) NOT NULL,
  `id_eselon` int(11) NOT NULL,
  `no_rek` varchar(114) NOT NULL,
  `id_pengikut` int(11) NOT NULL,
  `instansi` varchar(114) NOT NULL,
  `id_bendahara` varchar(114) NOT NULL,
  `nip_bendahara` varchar(114) NOT NULL,
  `pejabat_mengetahui` varchar(114) NOT NULL,
  `nip_pejabat_mengetahui` varchar(114) NOT NULL,
  `biaya_riil` int(11) NOT NULL,
  `dasar_pelaksanaan` text NOT NULL,
  `dasar_pelaksanaan_2` text NOT NULL,
  `dasar_pelaksanaan_3` text NOT NULL,
  `isi_laporan` text NOT NULL,
  `alat_angkutan` varchar(114) NOT NULL,
  `biaya_pergi` int(11) NOT NULL,
  `biaya_pulang` int(11) NOT NULL,
  `biaya_lain` int(11) NOT NULL,
  `biaya_akomodasi_hotel` int(11) NOT NULL,
  `biaya_representasi` int(11) NOT NULL,
  `jumlah_biaya` int(11) NOT NULL,
  `tgl_ta_berangkat` varchar(114) NOT NULL,
  `persawat_berangkat` varchar(114) NOT NULL,
  `no_tiket_berangkat` varchar(114) NOT NULL,
  `kode_book_berangkat` varchar(114) NOT NULL,
  `harga_berangkat` int(11) NOT NULL,
  `tgl_ta_kembali` varchar(114) NOT NULL,
  `pesawat_kembali` varchar(114) NOT NULL,
  `no_tiket_kembali` varchar(114) NOT NULL,
  `kode_book_kembali` varchar(114) NOT NULL,
  `harga_kembali` int(11) NOT NULL,
  `jumlah_dibayarkan` int(11) NOT NULL,
  `biaya_sisa` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_sppd_ld`
--

CREATE TABLE `tbl_sppd_ld` (
  `id_sppd_ld` int(11) NOT NULL,
  `id_jenis_perjadin` int(11) NOT NULL,
  `tgl_sppd` varchar(114) NOT NULL,
  `tahun` int(4) NOT NULL,
  `id_pegawai` int(11) NOT NULL,
  `no_perjadin` varchar(114) DEFAULT NULL,
  `nomor` varchar(114) NOT NULL,
  `tgl_bukti` varchar(114) DEFAULT NULL,
  `maksud_perjadin` text,
  `tujuan_perjadin` text NOT NULL,
  `kd_anggaran` varchar(114) DEFAULT NULL,
  `id_golongan` int(11) DEFAULT NULL,
  `id_jabatan` int(11) NOT NULL,
  `id_pangkat` int(11) NOT NULL,
  `tujuan` varchar(114) DEFAULT NULL,
  `tgl_berangkat` varchar(114) DEFAULT NULL,
  `tgl_kembali` varchar(114) DEFAULT NULL,
  `lama_hari` varchar(114) DEFAULT NULL,
  `uang_perhari` int(20) DEFAULT NULL,
  `nama_hotel` varchar(114) NOT NULL,
  `uang_hotel` int(11) NOT NULL,
  `total_uang_hotel` int(11) NOT NULL,
  `total_uang_harian` int(11) NOT NULL,
  `keterangan_anggaran` text,
  `uraian_kas` text NOT NULL,
  `tempat_berangkat` varchar(114) NOT NULL,
  `pejabat_yang_memerintah` varchar(114) NOT NULL,
  `id_eselon` int(11) NOT NULL,
  `no_rek` varchar(114) NOT NULL,
  `id_pengikut` int(11) NOT NULL,
  `instansi` varchar(114) NOT NULL,
  `id_bendahara` varchar(114) NOT NULL,
  `nip_bendahara` varchar(114) NOT NULL,
  `pejabat_mengetahui` varchar(114) NOT NULL,
  `nip_pejabat_mengetahui` varchar(114) NOT NULL,
  `biaya_riil` int(11) NOT NULL,
  `dasar_pelaksanaan` text NOT NULL,
  `dasar_pelaksanaan_2` text,
  `dasar_pelaksanaan_3` text,
  `isi_laporan` text NOT NULL,
  `alat_angkutan` varchar(114) NOT NULL,
  `biaya_pergi` int(11) NOT NULL,
  `biaya_pulang` int(11) NOT NULL,
  `biaya_lain` int(11) NOT NULL,
  `biaya_akomodasi_hotel` int(11) DEFAULT NULL,
  `biaya_representasi` int(11) NOT NULL,
  `jumlah_biaya` int(11) NOT NULL,
  `tgl_ta_berangkat` varchar(114) DEFAULT NULL,
  `pesawat_berangkat` varchar(114) DEFAULT NULL,
  `no_tiket_berangkat` varchar(114) DEFAULT NULL,
  `kode_book_berangkat` varchar(114) DEFAULT NULL,
  `harga_berangkat` int(11) DEFAULT NULL,
  `tgl_ta_kembali` varchar(114) DEFAULT NULL,
  `pesawat_kembali` varchar(114) DEFAULT NULL,
  `no_tiket_kembali` varchar(114) DEFAULT NULL,
  `kode_book_kembali` varchar(114) DEFAULT NULL,
  `harga_kembali` int(11) DEFAULT NULL,
  `jumlah_dibayarkan` int(11) DEFAULT NULL,
  `biaya_sisa` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_sppd_ld`
--

INSERT INTO `tbl_sppd_ld` (`id_sppd_ld`, `id_jenis_perjadin`, `tgl_sppd`, `tahun`, `id_pegawai`, `no_perjadin`, `nomor`, `tgl_bukti`, `maksud_perjadin`, `tujuan_perjadin`, `kd_anggaran`, `id_golongan`, `id_jabatan`, `id_pangkat`, `tujuan`, `tgl_berangkat`, `tgl_kembali`, `lama_hari`, `uang_perhari`, `nama_hotel`, `uang_hotel`, `total_uang_hotel`, `total_uang_harian`, `keterangan_anggaran`, `uraian_kas`, `tempat_berangkat`, `pejabat_yang_memerintah`, `id_eselon`, `no_rek`, `id_pengikut`, `instansi`, `id_bendahara`, `nip_bendahara`, `pejabat_mengetahui`, `nip_pejabat_mengetahui`, `biaya_riil`, `dasar_pelaksanaan`, `dasar_pelaksanaan_2`, `dasar_pelaksanaan_3`, `isi_laporan`, `alat_angkutan`, `biaya_pergi`, `biaya_pulang`, `biaya_lain`, `biaya_akomodasi_hotel`, `biaya_representasi`, `jumlah_biaya`, `tgl_ta_berangkat`, `pesawat_berangkat`, `no_tiket_berangkat`, `kode_book_berangkat`, `harga_berangkat`, `tgl_ta_kembali`, `pesawat_kembali`, `no_tiket_kembali`, `kode_book_kembali`, `harga_kembali`, `jumlah_dibayarkan`, `biaya_sisa`) VALUES
(5, 2, '2018-11-25', 2018, 35, '090/ 60 /BKPSDM.XII/2017', '', '2017-12-22', 'ASD', 'DSA', NULL, 4, 6, 4, 'Jakarta / Kendari', '2018-12-12', '2018-12-12', '7', 4000000, 'Zahra Hotel', 4000000, 28000000, 28000000, NULL, 'UIO', 'Labungkari', 'KEPALA DINAS', 24, '30.03.5.2.2.15.02', 0, 'BKPSDM', 'LA DEU SAYA', '4500000', 'SAMRIN, S.Pd., M.Pd', '', 120000, 'UIO', 'IOP', 'IOP', 'OP', 'Mobil - Kapal Laut- Pesawat', 4500000, 15750000, 0, NULL, 0, 76370000, '2018-12-12', 'LION AIR', '1233', '12000', 1000000, '2018-12-12', 'WINGS', '123333', '120000', 1000000, 5000000, 71370000),
(6, 1, '2018-11-25', 2018, 35, '', '', '', '', '', NULL, 4, 1, 4, '', '', '', '', 0, '', 0, 0, 0, NULL, '', '', '', 24, '', 0, '', '', '', '', '', 0, '', '', '', '', '', 0, 0, 0, NULL, 0, 0, '', '', '', '', 0, '', '', '', '', 0, 0, 0),
(7, 2, '2018-12-17', 2018, 36, '090/ 60 /BKPSDM.XII/2017', '', '2017-12-22', 'asd', 'asds', NULL, 7, 6, 1, 'Kota Bau-Bau', '2018-12-12', '2018-12-12', '7', 4000000, 'Zahra Hotel', 4000000, 28000000, 28000000, NULL, 'ASDASFHG', 'Labungkari', 'KEPALA DINAS', 23, '30.03.5.2.2.15.02', 0, 'BKPSDM', 'LA DEU SAYA', '4500000', 'SAMRIN, S.Pd., M.Pd', '', 15750000, 'asdss', 'eweq', 'QW23EEQ', '12312QEWQEQ', 'Mobil - Kapal Laut- Pesawat', 4500000, 4500000, 0, NULL, 0, 80750000, '2018-12-12', 'LION AIR', '1233', '12000', 1000000, '2018-12-12', 'WINGS', '123333', '120000', 2000000, 70750000, 10000000),
(8, 2, '2018-12-18', 2018, 39, '090/ 60 /BKPSDM.XII/2017', '', '2018-12-18', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'Kendari', '', 10, 6, 2, 'Kota Bau-Bau', '2018-12-12', '2018-12-12', '7', 4000000, 'Calista', 4000000, 28000000, 28000000, NULL, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'Baubau', 'KEPALA DINAS', 25, '30.03.5.2.2.15.02', 0, 'Kendari', 'LA DEU SAYA', '123123123112312', 'SAMRIN, S.Pd., M.Pd', '', 15750000, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmodtempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodoconsequat. Duis aute irure dolor in reprehenderit in voluptate velit essecillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat nonproident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'Mobil - Kapal Laut- Pesawat', 4500000, 15750000, 0, NULL, 0, 92000000, '2018-12-12', 'LION AIR', '1233', '12000', 1000000, '2018-12-12', 'WINGS', '123333', '120000', 0, 92000000, 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_status`
--

CREATE TABLE `tbl_status` (
  `id_status` int(11) NOT NULL,
  `kode_status` varchar(20) NOT NULL,
  `nm_status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_status`
--

INSERT INTO `tbl_status` (`id_status`, `kode_status`, `nm_status`) VALUES
(1, 'text-warning', 'Menuggu Verfikasi'),
(2, 'text-success', 'Telah DI Verifikasi'),
(3, 'text-danger', 'Verfikasi Di Batalkan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_users`
--

CREATE TABLE `tbl_users` (
  `id` int(11) UNSIGNED NOT NULL,
  `id_mhs_pt` int(11) DEFAULT NULL,
  `ip_address` varchar(15) NOT NULL,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `repassword` varchar(114) DEFAULT NULL,
  `salt` varchar(255) DEFAULT NULL,
  `email` varchar(100) NOT NULL,
  `activation_code` varchar(40) DEFAULT NULL,
  `forgotten_password_code` varchar(40) DEFAULT NULL,
  `forgotten_password_time` int(11) UNSIGNED DEFAULT NULL,
  `remember_code` varchar(40) DEFAULT NULL,
  `created_on` int(11) UNSIGNED NOT NULL,
  `last_login` int(11) UNSIGNED DEFAULT NULL,
  `active` tinyint(1) UNSIGNED DEFAULT NULL,
  `first_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `company` varchar(100) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `hostname` varchar(20) DEFAULT NULL,
  `port` varchar(20) DEFAULT NULL,
  `userfeeder` varchar(114) DEFAULT NULL,
  `passfeeder` varchar(114) DEFAULT NULL,
  `jabatan` int(11) NOT NULL,
  `id_pegawai` int(11) DEFAULT NULL,
  `profile` varchar(114) NOT NULL DEFAULT 'avatar.jpg',
  `cs_sekret` int(3) NOT NULL,
  `cs_mutasi` int(3) NOT NULL,
  `cs_sdm` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `tbl_users`
--

INSERT INTO `tbl_users` (`id`, `id_mhs_pt`, `ip_address`, `username`, `password`, `repassword`, `salt`, `email`, `activation_code`, `forgotten_password_code`, `forgotten_password_time`, `remember_code`, `created_on`, `last_login`, `active`, `first_name`, `last_name`, `company`, `phone`, `hostname`, `port`, `userfeeder`, `passfeeder`, `jabatan`, `id_pegawai`, `profile`, `cs_sekret`, `cs_mutasi`, `cs_sdm`) VALUES
(1, NULL, '127.0.0.1', 'administrator', '$2a$07$SeBknntpZror9uyftVopmu61qg0ms8Qv1yV6FG.kQOSM.9QhmTo36', 'password', '', 'admin@admin.com', '', NULL, NULL, NULL, 1268889823, 1578066203, 1, 'Admin', 'istrator', 'ADMIN', '08239566666', 'localhost', '8082', '091006', 'palagimatA', 3, NULL, 'avatar.jpg', 1, 1, 1),
(37, NULL, '::1', '195912311986011039', '$2y$08$zOinQSCBY4KAqRNTvT1UNuLkTm2Yfz82hIs7aUhU1JoigRl3BlGxW', 'password', NULL, 'la-amirishmh-buselkabgoid', NULL, NULL, NULL, NULL, 1578065574, NULL, 1, 'LA AMIRI.SH,MH ', 'e-SiPeKa Kab. Busel', 'e-SiPeKa Kab. Busel', '123456789', NULL, NULL, NULL, NULL, 0, NULL, 'avatar.jpg', 0, 0, 0),
(38, NULL, '::1', '197012312005022012', '$2y$08$Ur4hrWhsfONE1fOOySJDtuzNm1jP2yDiazI82t.gEOzBYetCplOKe', 'password', NULL, 'haidasptbuselkabgoid', NULL, NULL, NULL, NULL, 1578065574, NULL, 1, 'HAIDA,S.Pt', 'e-SiPeKa Kab. Busel', 'e-SiPeKa Kab. Busel', '123456789', NULL, NULL, NULL, NULL, 0, NULL, 'avatar.jpg', 0, 0, 0),
(39, NULL, '::1', '196512311986012013', '$2y$08$psbJag.RP6GlrZT8w/Ir8ungRBLdV3Qeo95mAzzzaHicgbXjrpn2G', 'password', NULL, 'nurianibuselkabgoid', NULL, NULL, NULL, NULL, 1578065575, NULL, 1, 'NURIANI', 'e-SiPeKa Kab. Busel', 'e-SiPeKa Kab. Busel', '123456789', NULL, NULL, NULL, NULL, 0, NULL, 'avatar.jpg', 0, 0, 0),
(40, NULL, '::1', '197301082005021001', '$2y$08$5qK98ms7pQ3Sh1FWj/jexepr0MurxT5JMTNdOqkpuoQX4r31UekzO', 'password', NULL, 'la-ode-firman-hamzaspdmmbuselkabgoid', NULL, NULL, NULL, NULL, 1578065576, NULL, 1, 'LA ODE FIRMAN HAMZA,S.Pd.MM', 'e-SiPeKa Kab. Busel', 'e-SiPeKa Kab. Busel', '123456789', NULL, NULL, NULL, NULL, 0, NULL, 'avatar.jpg', 0, 0, 0),
(41, NULL, '::1', '196212311983031576', '$2y$08$QKAWIazg74IeF6rTwA0H9uYuhXGG8S66/3w1EVGgqvm385gEk63ZK', 'password', NULL, 'rasidunssos-buselkabgoid', NULL, NULL, NULL, NULL, 1578065576, NULL, 1, 'RASIDUN,S,Sos ', 'e-SiPeKa Kab. Busel', 'e-SiPeKa Kab. Busel', '123456789', NULL, NULL, NULL, NULL, 0, NULL, 'avatar.jpg', 0, 0, 0),
(42, NULL, '::1', '196508161987031014', '$2y$08$KJ8cNdlbQtoiG4/B0PDbwec6wwtnUqLrlyYZYD0If.nUOBoEhl8wq', 'password', NULL, 'la-hasan-se-buselkabgoid', NULL, NULL, NULL, NULL, 1578065577, NULL, 1, 'LA HASAN, SE ', 'e-SiPeKa Kab. Busel', 'e-SiPeKa Kab. Busel', '123456789', NULL, NULL, NULL, NULL, 0, NULL, 'avatar.jpg', 0, 0, 0),
(43, NULL, '::1', '198410052011011015', '$2y$08$erWJMl0TjHa5VProebj/ye4oTIhzGooSraFlvyNnLDelyS58VpCUu', 'password', NULL, 'zabarudin-sp-buselkabgoid', NULL, NULL, NULL, NULL, 1578065577, NULL, 1, 'ZABARUDIN, SP ', 'e-SiPeKa Kab. Busel', 'e-SiPeKa Kab. Busel', '123456789', NULL, NULL, NULL, NULL, 0, NULL, 'avatar.jpg', 0, 0, 0),
(44, NULL, '::1', '198210072011012006', '$2y$08$uNl26pQvKh1WNOgp7haPS.JjNSPGhobtKB8q7Jdjr/1wS2DuRqRCW', 'password', NULL, 'wa-liyana-sebuselkabgoid', NULL, NULL, NULL, NULL, 1578065577, NULL, 1, 'WA LIYANA, SE', 'e-SiPeKa Kab. Busel', 'e-SiPeKa Kab. Busel', '123456789', NULL, NULL, NULL, NULL, 0, NULL, 'avatar.jpg', 0, 0, 0),
(45, NULL, '::1', '198310162010012006', '$2y$08$tvXhLWz6sWdkLoAwZir3c.ybfZMhv25zOlc1BgL4Eb/TuMX593L4a', 'password', NULL, 'rika-wulanda-skom-mmbuselkabgoid', NULL, NULL, NULL, NULL, 1578065577, NULL, 1, 'RIKA WULANDA, S.Kom, MM', 'e-SiPeKa Kab. Busel', 'e-SiPeKa Kab. Busel', '123456789', NULL, NULL, NULL, NULL, 0, NULL, 'avatar.jpg', 0, 0, 0),
(46, NULL, '::1', '199007102012062001', '$2y$08$MqpREny7uVRY7iytJpVgLu9XNNtcQ6j7ddMpe9ZShAB8QjRnkAJV.', 'password', NULL, 'nitawati-sstp-buselkabgoid', NULL, NULL, NULL, NULL, 1578065578, NULL, 1, 'NITAWATI, S.STP ', 'e-SiPeKa Kab. Busel', 'e-SiPeKa Kab. Busel', '123456789', NULL, NULL, NULL, NULL, 0, NULL, 'avatar.jpg', 0, 0, 0),
(47, NULL, '::1', '198504112014031003', '$2y$08$vp72t4e6vVHKZVShVvgUsOQbwt3YaM9Y4rX4qT2GITve7pPg8nmPm', 'password', NULL, 'ahmad-jamaluddin-sh-mhbuselkabgoid', NULL, NULL, NULL, NULL, 1578065578, NULL, 1, 'AHMAD JAMALUDDIN, SH., MH', 'e-SiPeKa Kab. Busel', 'e-SiPeKa Kab. Busel', '123456789', NULL, NULL, NULL, NULL, 0, NULL, 'avatar.jpg', 0, 0, 0),
(48, NULL, '::1', '196807211997022005', '$2y$08$x53wM17GIm0Nox6kWQgy7OGMFBZ8Fep.pFQ.mGZqI3VNUge35ic4O', 'password', NULL, 'wa-ode-hasiyna-sip-buselkabgoid', NULL, NULL, NULL, NULL, 1578065578, NULL, 1, 'WA ODE HASIYNA, S.IP ', 'e-SiPeKa Kab. Busel', 'e-SiPeKa Kab. Busel', '123456789', NULL, NULL, NULL, NULL, 0, NULL, 'avatar.jpg', 0, 0, 0),
(49, NULL, '::1', '197003031999032007', '$2y$08$R.3rE29xjY2SiKLNRqvbu.TttcS07/Bu9FHjg3O4/GUfHiyyF65im', 'password', NULL, 'asfasip-buselkabgoid', NULL, NULL, NULL, NULL, 1578065578, NULL, 1, 'ASFA,S.IP ', 'e-SiPeKa Kab. Busel', 'e-SiPeKa Kab. Busel', '123456789', NULL, NULL, NULL, NULL, 0, NULL, 'avatar.jpg', 0, 0, 0),
(50, NULL, '::1', '198502022012122001', '$2y$08$UK.d.oNowLmwNbCfxvoZreET3fpI4LqLo9Cl5urcVlo/cmpgMU9mu', 'password', NULL, 'suriani-buselkabgoid', NULL, NULL, NULL, NULL, 1578065579, NULL, 1, 'SURIANI ', 'e-SiPeKa Kab. Busel', 'e-SiPeKa Kab. Busel', '123456789', NULL, NULL, NULL, NULL, 0, NULL, 'avatar.jpg', 0, 0, 0),
(51, NULL, '::1', '197211192012122001', '$2y$08$N0a.Bj2g5M1RWtm/0TaQoe8Gn5qtAehBJaYQ9cjpPT6Oz9KonWaMK', 'password', NULL, 'wa-ode-sarlina-buselkabgoid', NULL, NULL, NULL, NULL, 1578065579, NULL, 1, 'WA ODE SARLINA ', 'e-SiPeKa Kab. Busel', 'e-SiPeKa Kab. Busel', '123456789', NULL, NULL, NULL, NULL, 0, NULL, 'avatar.jpg', 0, 0, 0),
(52, NULL, '::1', '198503262014072001', '$2y$08$ZFPTx.GDZDDYwYEPcQavz.kaGI.yCLcEXdHQx.Q2KQ/9Ws4waiHdO', 'password', NULL, 'fien-indriani-buselkabgoid', NULL, NULL, NULL, NULL, 1578065579, NULL, 1, 'FIEN INDRIANI ', 'e-SiPeKa Kab. Busel', 'e-SiPeKa Kab. Busel', '123456789', NULL, NULL, NULL, NULL, 0, NULL, 'avatar.jpg', 0, 0, 0),
(53, NULL, '::1', '198603232012122002', '$2y$08$DiK891BsNuUcWAYnJHQpPuZK.dFWc32AFdbikOPDZ1Ft6BjIg0quu', 'password', NULL, 'merli-widiastutibuselkabgoid', NULL, NULL, NULL, NULL, 1578065579, NULL, 1, 'MERLI WIDIASTUTI', 'e-SiPeKa Kab. Busel', 'e-SiPeKa Kab. Busel', '123456789', NULL, NULL, NULL, NULL, 0, NULL, 'avatar.jpg', 0, 0, 0),
(54, NULL, '::1', '196612312014081001', '$2y$08$Lp/HT8B8JTxXj7q08eGsBurWLKMFZM4bNuS.nR9GpQ2NhGW0/Tsje', 'password', NULL, 'la-ode-dirham-ssosbuselkabgoid', NULL, NULL, NULL, NULL, 1578065580, NULL, 1, 'LA ODE DIRHAM, S.Sos', 'e-SiPeKa Kab. Busel', 'e-SiPeKa Kab. Busel', '123456789', NULL, NULL, NULL, NULL, 0, NULL, 'avatar.jpg', 0, 0, 0),
(55, NULL, '::1', '199006262014021001', '$2y$08$IJEWXXjDuM.M4jbbVHJzw.VixeV/zOVAbsGV.wsPRsRtrDJyXIAZq', 'password', NULL, 'endy-nur-pratomo-sipbuselkabgoid', NULL, NULL, NULL, NULL, 1578065580, NULL, 1, 'ENDY NUR PRATOMO, S.IP', 'e-SiPeKa Kab. Busel', 'e-SiPeKa Kab. Busel', '123456789', NULL, NULL, NULL, NULL, 0, NULL, 'avatar.jpg', 0, 0, 0),
(56, NULL, '::1', '195901191998031002', '$2y$08$Izdt6nu0I4TKqhnqvV/d3OjWZyLRcojk8wfjShaq0d3ibbFhkwCLy', 'password', NULL, 'drs-la-ode-sadikin-buselkabgoid', NULL, NULL, NULL, NULL, 1578065580, NULL, 1, 'Drs. LA ODE SADIKIN ', 'e-SiPeKa Kab. Busel', 'e-SiPeKa Kab. Busel', '123456789', NULL, NULL, NULL, NULL, 0, NULL, 'avatar.jpg', 0, 0, 0),
(57, NULL, '::1', '197512312003121011', '$2y$08$HvlMF.dAVmdlsgiiFq87ZejpnehTYQjeiGttzszGo5fF5jR.Jj1Ae', 'password', NULL, 'la-hardin-s-pd-mmbuselkabgoid', NULL, NULL, NULL, NULL, 1578065580, NULL, 1, 'LA HARDIN, S. Pd, MM', 'e-SiPeKa Kab. Busel', 'e-SiPeKa Kab. Busel', '123456789', NULL, NULL, NULL, NULL, 0, NULL, 'avatar.jpg', 0, 0, 0),
(58, NULL, '::1', '197107072000031008', '$2y$08$tCbD1rRNlZlmfk6imuwh7OALpo9tX1APVgbrO7SmU8olOIguB8saa', 'password', NULL, 'muchsin-bil-taufikshutbuselkabgoid', NULL, NULL, NULL, NULL, 1578065581, NULL, 1, 'MUCHSIN BIL TAUFIK,S.Hut', 'e-SiPeKa Kab. Busel', 'e-SiPeKa Kab. Busel', '123456789', NULL, NULL, NULL, NULL, 0, NULL, 'avatar.jpg', 0, 0, 0),
(59, NULL, '::1', '196312151993031006', '$2y$08$ydGY0O9//ge5OYa19Is9v.h/eZhUVmOeoy0fY4B97cidTt69sSt9.', 'password', NULL, 'muhamad-nasar-sebuselkabgoid', NULL, NULL, NULL, NULL, 1578065581, NULL, 1, 'MUHAMAD NASAR, SE', 'e-SiPeKa Kab. Busel', 'e-SiPeKa Kab. Busel', '123456789', NULL, NULL, NULL, NULL, 0, NULL, 'avatar.jpg', 0, 0, 0),
(60, NULL, '::1', '196307221985032009', '$2y$08$dUVoPaTO8vbha8ncCFFl.O/.Cpv4hNjOEEsKlCyQPO8qvIqdKCaOC', 'password', NULL, 'hjhaesini-abdul-rahmanbuselkabgoid', NULL, NULL, NULL, NULL, 1578065582, NULL, 1, 'HJ.HAESINI ABDUL RAHMAN', 'e-SiPeKa Kab. Busel', 'e-SiPeKa Kab. Busel', '123456789', NULL, NULL, NULL, NULL, 0, NULL, 'avatar.jpg', 0, 0, 0),
(61, NULL, '::1', '197106121994081001', '$2y$08$UEmarxf2.p6iywrTZhDLq.4Uj9vlThg0J47WblikXDUtEhP5vqDEu', 'password', NULL, 'badihi-spdbuselkabgoid', NULL, NULL, NULL, NULL, 1578065582, NULL, 1, 'BADIHI, S.Pd', 'e-SiPeKa Kab. Busel', 'e-SiPeKa Kab. Busel', '123456789', NULL, NULL, NULL, NULL, 0, NULL, 'avatar.jpg', 0, 0, 0),
(62, NULL, '::1', '196212311984031118', '$2y$08$1BlaNFR/Qj62idA0kTOIMeS3LP4FsNUjd6C/2M8E/NhDdEXk9ZCO2', 'password', NULL, 'drs-baharudinbuselkabgoid', NULL, NULL, NULL, NULL, 1578065582, NULL, 1, 'Drs. BAHARUDIN', 'e-SiPeKa Kab. Busel', 'e-SiPeKa Kab. Busel', '123456789', NULL, NULL, NULL, NULL, 0, NULL, 'avatar.jpg', 0, 0, 0),
(63, NULL, '::1', '196013311999031013', '$2y$08$79pqf8rPkLa3cbm57.GPyuh1rwydxmSVDDmcQDr7ezfZT090brcYG', 'password', NULL, 'drssaharudin-agusbuselkabgoid', NULL, NULL, NULL, NULL, 1578065582, NULL, 1, 'Drs.SAHARUDIN AGUS', 'e-SiPeKa Kab. Busel', 'e-SiPeKa Kab. Busel', '123456789', NULL, NULL, NULL, NULL, 0, NULL, 'avatar.jpg', 0, 0, 0),
(64, NULL, '::1', '196512312006041013', '$2y$08$SArA5UtiXWp35.5IjWmKzOAn.Xq7R8y8UWzHZCeqm35CBm.wdHmuS', 'password', NULL, 'gafarudinshbuselkabgoid', NULL, NULL, NULL, NULL, 1578065583, NULL, 1, 'GAFARUDIN,SH', 'e-SiPeKa Kab. Busel', 'e-SiPeKa Kab. Busel', '123456789', NULL, NULL, NULL, NULL, 0, NULL, 'avatar.jpg', 0, 0, 0),
(65, NULL, '::1', '198003052002122007', '$2y$08$GRfbpFLROqBZFxVeqqhSTO8xKA9GuLjWR5J5MtlCUfUo4yoilc.VW', 'password', NULL, 'eriyani-maulanassosbuselkabgoid', NULL, NULL, NULL, NULL, 1578065583, NULL, 1, 'ERIYANI MAULANA,S.Sos', 'e-SiPeKa Kab. Busel', 'e-SiPeKa Kab. Busel', '123456789', NULL, NULL, NULL, NULL, 0, NULL, 'avatar.jpg', 0, 0, 0),
(66, NULL, '::1', '196310101986032023', '$2y$08$N6bIeF5ufGhkA8Dx0VeqbO.Koho/Pida1CiNTDtcPnvoqtKLb7EmK', 'password', NULL, 'sriwanibuselkabgoid', NULL, NULL, NULL, NULL, 1578065583, NULL, 1, 'SRIWANI', 'e-SiPeKa Kab. Busel', 'e-SiPeKa Kab. Busel', '123456789', NULL, NULL, NULL, NULL, 0, NULL, 'avatar.jpg', 0, 0, 0),
(67, NULL, '::1', '197907012007012010', '$2y$08$tcR8Gzsm.dWikXcOELNeaePsr/adI524VSxwSndeMpHiNzfnbWcPW', 'password', NULL, 'yeti-fausipbuselkabgoid', NULL, NULL, NULL, NULL, 1578065584, NULL, 1, 'YETI FAU,S.IP', 'e-SiPeKa Kab. Busel', 'e-SiPeKa Kab. Busel', '123456789', NULL, NULL, NULL, NULL, 0, NULL, 'avatar.jpg', 0, 0, 0),
(68, NULL, '::1', '197212312006041088', '$2y$08$U4REfR3OzrIF7aAhgYZ73O6uYydLBzrPaFk6mYOVSIPszXGZEdeSG', 'password', NULL, 'hasanbuselkabgoid', NULL, NULL, NULL, NULL, 1578065584, NULL, 1, 'HASAN', 'e-SiPeKa Kab. Busel', 'e-SiPeKa Kab. Busel', '123456789', NULL, NULL, NULL, NULL, 0, NULL, 'avatar.jpg', 0, 0, 0),
(69, NULL, '::1', '197405091993111001', '$2y$08$uWb3e.FApTC/guVMxZBNxeuoD4sB7FTrzVPhALU7Udvp3saawh29i', 'password', NULL, 'drs-ahmad-basri-apbuselkabgoid', NULL, NULL, NULL, NULL, 1578065584, NULL, 1, 'Drs. AHMAD BASRI, AP', 'e-SiPeKa Kab. Busel', 'e-SiPeKa Kab. Busel', '123456789', NULL, NULL, NULL, NULL, 0, NULL, 'avatar.jpg', 0, 0, 0),
(70, NULL, '::1', '196302121986032010', '$2y$08$cWtC7Nj5hYMMLnX8ldHJQeFWvAVyKyjqZM5lutpyOtHAY1UUx68uK', 'password', NULL, 'ariyantibuselkabgoid', NULL, NULL, NULL, NULL, 1578065585, NULL, 1, 'ARIYANTI', 'e-SiPeKa Kab. Busel', 'e-SiPeKa Kab. Busel', '123456789', NULL, NULL, NULL, NULL, 0, NULL, 'avatar.jpg', 0, 0, 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_users_groups`
--

CREATE TABLE `tbl_users_groups` (
  `id` int(11) UNSIGNED NOT NULL,
  `user_id` int(11) UNSIGNED NOT NULL,
  `group_id` mediumint(8) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `tbl_users_groups`
--

INSERT INTO `tbl_users_groups` (`id`, `user_id`, `group_id`) VALUES
(1, 1, 1),
(38, 37, 2),
(39, 38, 2),
(40, 39, 2),
(41, 40, 2),
(42, 41, 2),
(43, 42, 2),
(44, 43, 2),
(45, 44, 2),
(46, 45, 2),
(47, 46, 2),
(48, 47, 2),
(49, 48, 2),
(50, 49, 2),
(51, 50, 2),
(52, 51, 2),
(53, 52, 2),
(54, 53, 2),
(55, 54, 2),
(56, 55, 2),
(57, 56, 2),
(58, 57, 2),
(59, 58, 2),
(60, 59, 2),
(61, 60, 2),
(62, 61, 2),
(63, 62, 2),
(64, 63, 2),
(65, 64, 2),
(66, 65, 2),
(67, 66, 2),
(68, 67, 2),
(69, 68, 2),
(70, 69, 2),
(71, 70, 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_user_login`
--

CREATE TABLE `tbl_user_login` (
  `id_user_login` int(10) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `nama_lengkap` varchar(150) NOT NULL,
  `stts` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_user_login`
--

INSERT INTO `tbl_user_login` (`id_user_login`, `username`, `password`, `nama_lengkap`, `stts`) VALUES
(1, 'admin', 'ef75d152cf5d3fc1852bf5cc9dfd080f', 'Administrator', 'administrator');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_data_dp3`
--
ALTER TABLE `tbl_data_dp3`
  ADD PRIMARY KEY (`id_dp3`);

--
-- Indexes for table `tbl_data_gaji_pokok`
--
ALTER TABLE `tbl_data_gaji_pokok`
  ADD PRIMARY KEY (`id_gaji_pokok`);

--
-- Indexes for table `tbl_data_hukuman`
--
ALTER TABLE `tbl_data_hukuman`
  ADD PRIMARY KEY (`id_hukuman`);

--
-- Indexes for table `tbl_data_ijin_belajar`
--
ALTER TABLE `tbl_data_ijin_belajar`
  ADD PRIMARY KEY (`id_ijin_belajar`);

--
-- Indexes for table `tbl_data_karpeg`
--
ALTER TABLE `tbl_data_karpeg`
  ADD PRIMARY KEY (`id_karpeg`);

--
-- Indexes for table `tbl_data_karsi`
--
ALTER TABLE `tbl_data_karsi`
  ADD PRIMARY KEY (`id_karsi`);

--
-- Indexes for table `tbl_data_karsu`
--
ALTER TABLE `tbl_data_karsu`
  ADD PRIMARY KEY (`id_karsu`);

--
-- Indexes for table `tbl_data_keluarga`
--
ALTER TABLE `tbl_data_keluarga`
  ADD PRIMARY KEY (`id_data_keluarga`);

--
-- Indexes for table `tbl_data_organisasi`
--
ALTER TABLE `tbl_data_organisasi`
  ADD PRIMARY KEY (`id_organisasi`);

--
-- Indexes for table `tbl_data_pegawai`
--
ALTER TABLE `tbl_data_pegawai`
  ADD PRIMARY KEY (`id_pegawai`);

--
-- Indexes for table `tbl_data_pelatihan`
--
ALTER TABLE `tbl_data_pelatihan`
  ADD PRIMARY KEY (`id_pelatihan`);

--
-- Indexes for table `tbl_data_pendidikan`
--
ALTER TABLE `tbl_data_pendidikan`
  ADD PRIMARY KEY (`id_pendidikan`);

--
-- Indexes for table `tbl_data_penghargaan`
--
ALTER TABLE `tbl_data_penghargaan`
  ADD PRIMARY KEY (`id_penghargaan`);

--
-- Indexes for table `tbl_data_pensiun`
--
ALTER TABLE `tbl_data_pensiun`
  ADD PRIMARY KEY (`id_pensiun`);

--
-- Indexes for table `tbl_data_pidah_wilayah_kerja_masuk`
--
ALTER TABLE `tbl_data_pidah_wilayah_kerja_masuk`
  ADD PRIMARY KEY (`id_pindah_wilayah_kerja_masuk`);

--
-- Indexes for table `tbl_data_pindah_wilayah_kerja_keluar`
--
ALTER TABLE `tbl_data_pindah_wilayah_kerja_keluar`
  ADD PRIMARY KEY (`id_pindah_wilayah_kerja_keluar`);

--
-- Indexes for table `tbl_data_riwayat_eselon`
--
ALTER TABLE `tbl_data_riwayat_eselon`
  ADD PRIMARY KEY (`id_riwayat_eselon`);

--
-- Indexes for table `tbl_data_riwayat_golongan`
--
ALTER TABLE `tbl_data_riwayat_golongan`
  ADD PRIMARY KEY (`id_riwayat_golongan`);

--
-- Indexes for table `tbl_data_riwayat_jabatan`
--
ALTER TABLE `tbl_data_riwayat_jabatan`
  ADD PRIMARY KEY (`id_riwayat_jabatan`);

--
-- Indexes for table `tbl_data_riwayat_pangkat`
--
ALTER TABLE `tbl_data_riwayat_pangkat`
  ADD PRIMARY KEY (`id_riwayat_pangkat`);

--
-- Indexes for table `tbl_data_seminar`
--
ALTER TABLE `tbl_data_seminar`
  ADD PRIMARY KEY (`id_seminar`);

--
-- Indexes for table `tbl_form_ijinbelajar`
--
ALTER TABLE `tbl_form_ijinbelajar`
  ADD PRIMARY KEY (`id_form_ijinbelajar`);

--
-- Indexes for table `tbl_form_karpeg`
--
ALTER TABLE `tbl_form_karpeg`
  ADD PRIMARY KEY (`id_form_karpeg`);

--
-- Indexes for table `tbl_form_karsi`
--
ALTER TABLE `tbl_form_karsi`
  ADD PRIMARY KEY (`id_form_karsi`);

--
-- Indexes for table `tbl_form_karsu`
--
ALTER TABLE `tbl_form_karsu`
  ADD PRIMARY KEY (`id_form_karsu`);

--
-- Indexes for table `tbl_form_pensiun`
--
ALTER TABLE `tbl_form_pensiun`
  ADD PRIMARY KEY (`id_form_pensiun`);

--
-- Indexes for table `tbl_form_pindahinstansi`
--
ALTER TABLE `tbl_form_pindahinstansi`
  ADD PRIMARY KEY (`id_form_pindah`);

--
-- Indexes for table `tbl_form_pwkkeluar`
--
ALTER TABLE `tbl_form_pwkkeluar`
  ADD PRIMARY KEY (`id_form_pwkkeluar`);

--
-- Indexes for table `tbl_form_pwkmasuk`
--
ALTER TABLE `tbl_form_pwkmasuk`
  ADD PRIMARY KEY (`id_form_pwkmasuk`);

--
-- Indexes for table `tbl_form_tugasbelajar`
--
ALTER TABLE `tbl_form_tugasbelajar`
  ADD PRIMARY KEY (`id_form_tugasbelajar`);

--
-- Indexes for table `tbl_groups`
--
ALTER TABLE `tbl_groups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_honorer`
--
ALTER TABLE `tbl_honorer`
  ADD PRIMARY KEY (`id_honorer`);

--
-- Indexes for table `tbl_info_pt`
--
ALTER TABLE `tbl_info_pt`
  ADD PRIMARY KEY (`id_info_pt`);

--
-- Indexes for table `tbl_jk`
--
ALTER TABLE `tbl_jk`
  ADD PRIMARY KEY (`id_jk`);

--
-- Indexes for table `tbl_login_attempts`
--
ALTER TABLE `tbl_login_attempts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_master_agama`
--
ALTER TABLE `tbl_master_agama`
  ADD PRIMARY KEY (`id_agama`);

--
-- Indexes for table `tbl_master_eselon`
--
ALTER TABLE `tbl_master_eselon`
  ADD PRIMARY KEY (`id_eselon`);

--
-- Indexes for table `tbl_master_golongan`
--
ALTER TABLE `tbl_master_golongan`
  ADD PRIMARY KEY (`id_golongan`);

--
-- Indexes for table `tbl_master_hukuman`
--
ALTER TABLE `tbl_master_hukuman`
  ADD PRIMARY KEY (`id_hukuman`);

--
-- Indexes for table `tbl_master_jabatan`
--
ALTER TABLE `tbl_master_jabatan`
  ADD PRIMARY KEY (`id_jabatan`);

--
-- Indexes for table `tbl_master_jenis_jabatan`
--
ALTER TABLE `tbl_master_jenis_jabatan`
  ADD PRIMARY KEY (`id_jenis_jabatan`);

--
-- Indexes for table `tbl_master_lokasi_kerja`
--
ALTER TABLE `tbl_master_lokasi_kerja`
  ADD PRIMARY KEY (`id_lokasi_kerja`);

--
-- Indexes for table `tbl_master_lokasi_pelatihan`
--
ALTER TABLE `tbl_master_lokasi_pelatihan`
  ADD PRIMARY KEY (`id_lokasi_pelatihan`);

--
-- Indexes for table `tbl_master_pangkat`
--
ALTER TABLE `tbl_master_pangkat`
  ADD PRIMARY KEY (`id_pangkat`);

--
-- Indexes for table `tbl_master_pelatihan`
--
ALTER TABLE `tbl_master_pelatihan`
  ADD PRIMARY KEY (`id_pelatihan`);

--
-- Indexes for table `tbl_master_pendidikan`
--
ALTER TABLE `tbl_master_pendidikan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_master_penghargaan`
--
ALTER TABLE `tbl_master_penghargaan`
  ADD PRIMARY KEY (`id_penghargaan`);

--
-- Indexes for table `tbl_master_ppk`
--
ALTER TABLE `tbl_master_ppk`
  ADD PRIMARY KEY (`id_ppk`);

--
-- Indexes for table `tbl_master_satuan_kerja`
--
ALTER TABLE `tbl_master_satuan_kerja`
  ADD PRIMARY KEY (`id_satuan_kerja`);

--
-- Indexes for table `tbl_master_status_dalam_keluarga`
--
ALTER TABLE `tbl_master_status_dalam_keluarga`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_master_status_jabatan`
--
ALTER TABLE `tbl_master_status_jabatan`
  ADD PRIMARY KEY (`id_status_jabatan`);

--
-- Indexes for table `tbl_master_status_kawin`
--
ALTER TABLE `tbl_master_status_kawin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_master_status_pegawai`
--
ALTER TABLE `tbl_master_status_pegawai`
  ADD PRIMARY KEY (`id_status_pegawai`);

--
-- Indexes for table `tbl_master_unit_kerja`
--
ALTER TABLE `tbl_master_unit_kerja`
  ADD PRIMARY KEY (`id_unit_kerja`);

--
-- Indexes for table `tbl_sppd_honorer`
--
ALTER TABLE `tbl_sppd_honorer`
  ADD PRIMARY KEY (`id_sppd_ld`);

--
-- Indexes for table `tbl_sppd_ld`
--
ALTER TABLE `tbl_sppd_ld`
  ADD PRIMARY KEY (`id_sppd_ld`);

--
-- Indexes for table `tbl_status`
--
ALTER TABLE `tbl_status`
  ADD PRIMARY KEY (`id_status`);

--
-- Indexes for table `tbl_users`
--
ALTER TABLE `tbl_users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_users_groups`
--
ALTER TABLE `tbl_users_groups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_user_login`
--
ALTER TABLE `tbl_user_login`
  ADD PRIMARY KEY (`id_user_login`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_data_dp3`
--
ALTER TABLE `tbl_data_dp3`
  MODIFY `id_dp3` int(50) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_data_gaji_pokok`
--
ALTER TABLE `tbl_data_gaji_pokok`
  MODIFY `id_gaji_pokok` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `tbl_data_hukuman`
--
ALTER TABLE `tbl_data_hukuman`
  MODIFY `id_hukuman` int(50) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_data_karpeg`
--
ALTER TABLE `tbl_data_karpeg`
  MODIFY `id_karpeg` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_data_karsi`
--
ALTER TABLE `tbl_data_karsi`
  MODIFY `id_karsi` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_data_karsu`
--
ALTER TABLE `tbl_data_karsu`
  MODIFY `id_karsu` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_data_keluarga`
--
ALTER TABLE `tbl_data_keluarga`
  MODIFY `id_data_keluarga` int(50) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_data_organisasi`
--
ALTER TABLE `tbl_data_organisasi`
  MODIFY `id_organisasi` int(50) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_data_pegawai`
--
ALTER TABLE `tbl_data_pegawai`
  MODIFY `id_pegawai` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;
--
-- AUTO_INCREMENT for table `tbl_data_pelatihan`
--
ALTER TABLE `tbl_data_pelatihan`
  MODIFY `id_pelatihan` int(50) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_data_pendidikan`
--
ALTER TABLE `tbl_data_pendidikan`
  MODIFY `id_pendidikan` int(50) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_data_penghargaan`
--
ALTER TABLE `tbl_data_penghargaan`
  MODIFY `id_penghargaan` int(50) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_data_pensiun`
--
ALTER TABLE `tbl_data_pensiun`
  MODIFY `id_pensiun` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_data_pidah_wilayah_kerja_masuk`
--
ALTER TABLE `tbl_data_pidah_wilayah_kerja_masuk`
  MODIFY `id_pindah_wilayah_kerja_masuk` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_data_pindah_wilayah_kerja_keluar`
--
ALTER TABLE `tbl_data_pindah_wilayah_kerja_keluar`
  MODIFY `id_pindah_wilayah_kerja_keluar` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_data_riwayat_eselon`
--
ALTER TABLE `tbl_data_riwayat_eselon`
  MODIFY `id_riwayat_eselon` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_data_riwayat_golongan`
--
ALTER TABLE `tbl_data_riwayat_golongan`
  MODIFY `id_riwayat_golongan` int(100) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_data_riwayat_jabatan`
--
ALTER TABLE `tbl_data_riwayat_jabatan`
  MODIFY `id_riwayat_jabatan` int(50) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_data_riwayat_pangkat`
--
ALTER TABLE `tbl_data_riwayat_pangkat`
  MODIFY `id_riwayat_pangkat` int(50) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_data_seminar`
--
ALTER TABLE `tbl_data_seminar`
  MODIFY `id_seminar` int(50) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_form_ijinbelajar`
--
ALTER TABLE `tbl_form_ijinbelajar`
  MODIFY `id_form_ijinbelajar` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_form_karpeg`
--
ALTER TABLE `tbl_form_karpeg`
  MODIFY `id_form_karpeg` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_form_karsi`
--
ALTER TABLE `tbl_form_karsi`
  MODIFY `id_form_karsi` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_form_karsu`
--
ALTER TABLE `tbl_form_karsu`
  MODIFY `id_form_karsu` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_form_pensiun`
--
ALTER TABLE `tbl_form_pensiun`
  MODIFY `id_form_pensiun` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_form_pindahinstansi`
--
ALTER TABLE `tbl_form_pindahinstansi`
  MODIFY `id_form_pindah` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_form_pwkkeluar`
--
ALTER TABLE `tbl_form_pwkkeluar`
  MODIFY `id_form_pwkkeluar` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_form_pwkmasuk`
--
ALTER TABLE `tbl_form_pwkmasuk`
  MODIFY `id_form_pwkmasuk` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_form_tugasbelajar`
--
ALTER TABLE `tbl_form_tugasbelajar`
  MODIFY `id_form_tugasbelajar` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_groups`
--
ALTER TABLE `tbl_groups`
  MODIFY `id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;
--
-- AUTO_INCREMENT for table `tbl_honorer`
--
ALTER TABLE `tbl_honorer`
  MODIFY `id_honorer` int(5) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_info_pt`
--
ALTER TABLE `tbl_info_pt`
  MODIFY `id_info_pt` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tbl_jk`
--
ALTER TABLE `tbl_jk`
  MODIFY `id_jk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tbl_login_attempts`
--
ALTER TABLE `tbl_login_attempts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_master_agama`
--
ALTER TABLE `tbl_master_agama`
  MODIFY `id_agama` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `tbl_master_eselon`
--
ALTER TABLE `tbl_master_eselon`
  MODIFY `id_eselon` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;
--
-- AUTO_INCREMENT for table `tbl_master_golongan`
--
ALTER TABLE `tbl_master_golongan`
  MODIFY `id_golongan` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
--
-- AUTO_INCREMENT for table `tbl_master_hukuman`
--
ALTER TABLE `tbl_master_hukuman`
  MODIFY `id_hukuman` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `tbl_master_jabatan`
--
ALTER TABLE `tbl_master_jabatan`
  MODIFY `id_jabatan` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tbl_master_jenis_jabatan`
--
ALTER TABLE `tbl_master_jenis_jabatan`
  MODIFY `id_jenis_jabatan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `tbl_master_lokasi_kerja`
--
ALTER TABLE `tbl_master_lokasi_kerja`
  MODIFY `id_lokasi_kerja` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=245;
--
-- AUTO_INCREMENT for table `tbl_master_lokasi_pelatihan`
--
ALTER TABLE `tbl_master_lokasi_pelatihan`
  MODIFY `id_lokasi_pelatihan` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `tbl_master_pangkat`
--
ALTER TABLE `tbl_master_pangkat`
  MODIFY `id_pangkat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `tbl_master_pelatihan`
--
ALTER TABLE `tbl_master_pelatihan`
  MODIFY `id_pelatihan` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=396;
--
-- AUTO_INCREMENT for table `tbl_master_pendidikan`
--
ALTER TABLE `tbl_master_pendidikan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `tbl_master_penghargaan`
--
ALTER TABLE `tbl_master_penghargaan`
  MODIFY `id_penghargaan` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=115;
--
-- AUTO_INCREMENT for table `tbl_master_ppk`
--
ALTER TABLE `tbl_master_ppk`
  MODIFY `id_ppk` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=513;
--
-- AUTO_INCREMENT for table `tbl_master_satuan_kerja`
--
ALTER TABLE `tbl_master_satuan_kerja`
  MODIFY `id_satuan_kerja` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=245;
--
-- AUTO_INCREMENT for table `tbl_master_status_dalam_keluarga`
--
ALTER TABLE `tbl_master_status_dalam_keluarga`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `tbl_master_status_jabatan`
--
ALTER TABLE `tbl_master_status_jabatan`
  MODIFY `id_status_jabatan` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `tbl_master_status_kawin`
--
ALTER TABLE `tbl_master_status_kawin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `tbl_master_status_pegawai`
--
ALTER TABLE `tbl_master_status_pegawai`
  MODIFY `id_status_pegawai` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `tbl_master_unit_kerja`
--
ALTER TABLE `tbl_master_unit_kerja`
  MODIFY `id_unit_kerja` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=239;
--
-- AUTO_INCREMENT for table `tbl_sppd_honorer`
--
ALTER TABLE `tbl_sppd_honorer`
  MODIFY `id_sppd_ld` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_sppd_ld`
--
ALTER TABLE `tbl_sppd_ld`
  MODIFY `id_sppd_ld` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `tbl_status`
--
ALTER TABLE `tbl_status`
  MODIFY `id_status` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `tbl_users`
--
ALTER TABLE `tbl_users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;
--
-- AUTO_INCREMENT for table `tbl_users_groups`
--
ALTER TABLE `tbl_users_groups`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;
--
-- AUTO_INCREMENT for table `tbl_user_login`
--
ALTER TABLE `tbl_user_login`
  MODIFY `id_user_login` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
