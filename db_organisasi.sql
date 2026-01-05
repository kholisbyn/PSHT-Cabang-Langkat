-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 23, 2025 at 09:25 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_organisasi`
--

-- --------------------------------------------------------

--
-- Table structure for table `berita`
--

CREATE TABLE `berita` (
  `id` int(11) NOT NULL,
  `judul` varchar(150) NOT NULL,
  `konten` text NOT NULL,
  `gambar` varchar(255) DEFAULT NULL,
  `tanggal` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `berita`
--

INSERT INTO `berita` (`id`, `judul`, `konten`, `gambar`, `tanggal`) VALUES
(3, 'Foto Bersama Perwapus Sumatera Utara Dalam Agenda Pemilihan Ketua Cabang Langkat Tahun 2025', 'Allhamdulillah telah terlaksana kegiatan pemilihan pengurus Cabang Langkat\r\nPeriode 2025-2030, yang dilaksanakan pada hari Minggu tanggal 23 Februari 2025 pukul 13:00 Wib, di kediaman Mas Sunarto\r\nYang dihadiri oleh Perwapus PSHT Sumatera Utara Kang Mas Musimin\r\nSemoga dengan terpilihnya pengurus baru ini, PSHT Cabang Langkat semakin jaya dan berkembang', '1765564280_gambar2.jpg', '2023-02-22 17:00:00'),
(4, 'Hipur Team Mengikuti SH CUP Sumut Championship 2023', 'Allhamdulillah HIPUR TEAM berhasil meraih juara 3 umum Se-Sumut\r\ndi kejuaraan SH CUP SUMUT TERATE CHAMPIONSHIP\r\ndengan pemain 12 orang mendapatkan 5 Emas 1Perunggu', '1765564386_gambar4.jpg', '2023-12-21 17:00:00'),
(9, 'Pendadaran Tahun 2024', 'Alhamdulilahh telah selesai kegiatan pendadaran calon warga PSHT CABANG LANGKAT\r\nminggu 16 juni 2024 yg di ikuti beberapa rayon dan ranting, serta pemberian wejangan atau nasehat apa makna dari sebuah proses perjalanan hingga apa itu PERSAUDARAAN\r\nyg disampaikan langsung dari KETUA CABANG LANGKAT Kang Mas Sunarto', '1765568672_gambar6.jpg', '2024-06-15 17:00:00'),
(11, 'Dokumentasi Kegiatan Pendadaran Calon Warga Baru (2025) Tk I Persaudaraan Hati Terate Cabang Langkat', 'Pada hari minggu (15/06/2025) Persaudaraan setia hati terate Cabang Langkat mengadakan Tes Calon Warga atau Uji Kelayakan Calon Warga (UKCW) untuk siswa putih Se Cabang langkat.\r\nAlhamdulilah kegiatan berjalan lancar, kondusif, sukses, bertempat di tanah lapang Desa selayang Kec.selese.\r\nKegiatan ini diikuti oleh sekitar 30 (tiga puluh) siswa persaudaraan setia hati terate (PSHT) cabang langkat.\r\nDalam kegiatan ini dihadiri oleh pengurus Cabang Langkat serta pengurus Ranting/Komisariat dan pengurus Rayon di masing masing tempat.', '1765568633_slide 1.png', '2025-06-14 17:00:00'),
(12, 'Dokumentasi Kegiatan Doa Bersama Potong Tumpeng Malam 1 Muharam', 'Pada hari Kamis Malam (26/06/2025) Persaudaraan setia hati terate Cabang Langkat mengadakan Do\'a Bersama Untuk Pendahulu PSHT.\r\nAlhamdulilah kegiatan berjalan lancar, kondusif, sukses, bertempat di Kediaman Mas Juandi atau Kwala Begumit.\r\nDalam kegiatan ini dihadiri oleh pengurus Cabang Langkat serta pengurus Ranting/Komisariat dan pengurus Rayon di masing masing tempat.', '1765568602_acara1.png', '2025-06-25 17:00:00'),
(13, 'PSHT LANGKAT Mengikuti SH CUP SUMUT', 'PSHT Langkat telah berhasil meraih JUARA UMUM 3 di Kejuaraan SH Cup Sumut dengan perolehan:\r\n9 Medali Emas\r\n7 Medali Perak\r\n11 Medali Perunggu\r\n2 Pesilat Terbaik\r\nPenghargaan ini tidak hanya menjadi kebanggaan bagi PSHT Langkat, tetapi juga bagi Kabupaten Langkat.\r\nTerima kasih kepada seluruh atlet, pelatih, dan official yang telah berjuang keras untuk mencapai prestasi ini.\r\nKami juga mengucapkan terima kasih kepada Kabid Pengembangan Kebudayaan Dinas Pariwisata Kebudayaan dan Ekonomi Kreatif yang telah memberikan dukungan dan penghargaan nya.\r\nMari kita teruskan semangat dan dedikasi untuk mencapai prestasi yang lebih tinggi lagi!', '1765568581_sh1.jpg', '2025-05-12 17:00:00'),
(14, 'Cek Ayam Jago PSHT CABANG LANGKAT 2025', 'Allhamdulilah 25 Cawa SH Terate Cabang Langkat Pada Selasa 8 Juli 2025, Selamat bergabung dan menjadi Keluarga Besar Persaudaraan Setia Hati Terate, Selamat mengabdi di organisasi dan masyarakat untuk menjadi manusia yang berbudi pekerti luhur tahu benar dan salah serta bertakwa kepada Tuhan Yang Maha Esa.\r\n', '1765568539_slide 1.jpg', '2025-07-07 17:00:00'),
(15, 'Dokumentasi Syukuran Warga Baru 2025', 'Alhamdulillah telah terlaksana Tasyakuran Warga Baru 2025 dan do\'a bersama, Minggu 5 Oktober 2025 di kediaman Rumah Kang Mas Sunarto selaku Ketua Cabang Langkat\r\n', '1765568498_1.jpg', '2025-10-04 17:00:00'),
(16, '3rd Internasional Indonesian Pencak Silat Open Championship 2025', 'Selamat Kepada Para Peserta Persaudaraan Setia Hati Terate Cabang Langkat ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ \r\nREMAJA\r\n1. Nazwa Amanda 🥇A Remaja\r\n2. ⁠Fuza Melyla 🥇B Remaja\r\n4. ⁠Budi Sahputra 🥉B Remaja\r\n5. ⁠Sri Rejeki Handayani 🥉B Remaja\r\n6. ⁠Fauzan Aditya 🥉I Remaja\r\nPRA REMAJA\r\n1.Adinda Putri🥈G Pra Remaja\r\n2. Siti Ayu Ningsih🥉A Pra Remaja\r\n4. ⁠Ulva Selviana Br Ginting 🥉H Pra Remaja\r\nUSIA DINI\r\n1.Qhaireen Salsabila🥇F Usia Dini\r\n2.Silvita Sari🥇G Usia Dini', '1765568447_t1.jpg', '2025-08-09 17:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`id`, `username`, `password`) VALUES
(1, 'kholis', '0812');

-- --------------------------------------------------------

--
-- Table structure for table `struktur_organisasi`
--

CREATE TABLE `struktur_organisasi` (
  `id` int(11) NOT NULL,
  `jabatan` varchar(100) NOT NULL,
  `nama` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `struktur_organisasi`
--

INSERT INTO `struktur_organisasi` (`id`, `jabatan`, `nama`) VALUES
(1, 'Ketua Cabang', 'Sunarto'),
(2, 'Wakil Ketua 1', 'Beni'),
(3, 'Wakil Ketua 2', 'Ridwan'),
(4, 'Wakil Ketua 3', 'Ari Iskandar S.pd'),
(5, 'Sekretaris', 'Fajar Hardiansyah S.pd'),
(6, 'Wakil Sekertaris 1', 'Sara Puspa Della'),
(7, 'Wakil Sekertaris 2', 'Anita'),
(8, 'Bendahara', 'Sri Puspa'),
(9, 'Wakil Bendahara 1', 'Dina Novita Sari'),
(10, 'Wakil Bendahara 2', 'Siti Raudah'),
(11, 'Bidang Humas', 'Hanafi,\nAzzarina Nazum,\nJusndi Arsya,\nDewa Dwi Arwana,\nKholis Bayan,\nMega Dwiana'),
(12, 'Bidang Pembinaan Organisasi', 'Nuryandi,\nSupriono'),
(13, 'Bidang Teknik Pencak Silat Ajaran', 'Yanda,\nPutra Irawan'),
(14, 'Bidang Pencak Silat Prestasi', 'Muhammad Yusuf,\nMuhammad Febri Kurniawan,\nAri Zona Tarigan S.PD'),
(15, 'Bidang Ajaran Budi Luhur', 'Gutomi,\nSugiono'),
(16, 'Bidang Kurikulum Pembelajaran', 'Ainun Jariah,\nFuza Melyla'),
(17, 'Bidang Pemberdaya Anggota', 'Winarto,\nWahyu Cahyono'),
(18, 'Bidang Bela Diri Praktis', 'Agung Lihan,\nMuhammad Alfi Syahri'),
(19, 'Lembaga Wasit Juri', 'Hudi Kusnadi'),
(20, 'Lembaga Pendidikan Dan Kepelatihan', ''),
(21, 'Pamter', 'Vitra Davianto,\nDedi Suratman,\nIrwansyah Lubis,\nNuruli Fadli AMD.KEB,\nTri Sutrisno'),
(27, 'Wakil Sekertaris 1', 'Sara Puspa Della'),
(28, 'Wakil Sekertaris 2', 'Anita'),
(29, 'Bidang Humas', 'Hanafi, Azzarina Nazum, Jusndi Arsya, Dewa Dwi Arwana, Kholis Bayan, Mega Dwiana'),
(30, 'Bidang Pembinaan Organisasi', 'Nuryandi, Supriono'),
(31, 'Pamter', 'Vitra Davianto, Dedi Suratman, Irwansyah Lubis, Nuruli Fadli AMD.KEB, Tri Sutrisno');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `berita`
--
ALTER TABLE `berita`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `struktur_organisasi`
--
ALTER TABLE `struktur_organisasi`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `berita`
--
ALTER TABLE `berita`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `struktur_organisasi`
--
ALTER TABLE `struktur_organisasi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
