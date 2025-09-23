-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 12, 2025 at 02:36 PM
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
-- Database: `game_edukasi`
--

-- --------------------------------------------------------

--
-- Table structure for table `kuis`
--

CREATE TABLE `kuis` (
  `id` int(11) NOT NULL,
  `pertanyaan` text DEFAULT NULL,
  `kategori` varchar(50) NOT NULL,
  `opsi_a` varchar(100) DEFAULT NULL,
  `opsi_b` varchar(100) DEFAULT NULL,
  `opsi_c` varchar(100) DEFAULT NULL,
  `jawaban` char(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kuis`
--

INSERT INTO `kuis` (`id`, `pertanyaan`, `kategori`, `opsi_a`, `opsi_b`, `opsi_c`, `jawaban`) VALUES
(3, 'Perangkat untuk memasukkan suara ke komputer disebut...', 'Perangkat Keras', 'Speaker', 'Headphone', 'Mikrofon', 'C'),
(4, 'Apa fungsi dari Motherboard?', 'Perangkat Keras', 'Menyimpan data permanen', 'Menghubungkan semua komponen komputer', 'Menampilkan gambar ke layar', 'B'),
(5, 'Microsoft Word adalah contoh dari perangkat lunak...', 'Software', 'Sistem Operasi', 'Aplikasi', 'Antivirus', 'B'),
(6, 'Kombinasi tombol keyboard untuk menyalin (Copy) teks adalah...', 'Software', 'Ctrl + V', 'Ctrl + C', 'Ctrl + X', 'B'),
(7, 'URL adalah singkatan dari...', 'Internet & Jaringan', 'Uniform Resource Locator', 'Universal Serial Bus', 'United Resource Link', 'A'),
(8, 'Perangkat lunak yang digunakan untuk menjelajahi internet disebut...', 'Internet & Jaringan', 'Browser', 'Search Engine', 'Firewall', 'A'),
(9, 'Satuan terkecil dalam data digital adalah...', 'Umum', 'Byte', 'Bit', 'Kilobyte', 'B'),
(10, 'Manakah yang termasuk sistem operasi?', 'Software', 'Photoshop', 'Google Chrome', 'Windows 11', 'C'),
(11, 'Perangkat yang melindungi komputer dari lonjakan listrik adalah...', 'Perangkat Keras', 'UPS (Uninterruptible Power Supply)', 'VGA Card', 'Power Cable', 'A'),
(12, 'HDMI adalah singkatan dari...', 'Perangkat Keras', 'High-Definition Multimedia Interface', 'Hyperlink Display Media Input', 'High Data Media Interconnect', 'A'),
(13, 'Apa fungsi dari SSD (Solid State Drive)?', 'Perangkat Keras', 'Memproses grafis', 'Menyimpan data dengan kecepatan tinggi', 'Menjadi memori sementara', 'B'),
(14, 'Ikon folder yang dihapus sementara di Windows akan masuk ke...', 'Software', 'My Documents', 'Control Panel', 'Recycle Bin', 'C'),
(15, 'Istilah untuk jaringan komputer yang mencakup seluruh dunia adalah...', 'Internet & Jaringan', 'LAN (Local Area Network)', 'MAN (Metropolitan Area Network)', 'Internet', 'C'),
(16, 'Siapakah penemu World Wide Web (WWW)?', 'Internet & Jaringan', 'Bill Gates', 'Tim Berners-Lee', 'Steve Jobs', 'B'),
(17, 'Ekstensi file untuk gambar yang mendukung transparansi adalah...', 'Umum', '.JPG', '.BMP', '.PNG', 'C'),
(18, 'Untuk melakukan \"Paste\" atau menempel, kombinasi tombol yang digunakan adalah...', 'Software', 'Ctrl + P', 'Ctrl + V', 'Ctrl + S', 'B'),
(19, 'Perangkat lunak yang dirancang untuk merusak sistem komputer disebut...', 'Software', 'Firewall', 'Malware', 'Freeware', 'B'),
(20, 'Proses menyalakan komputer dari keadaan mati total disebut...', 'Perangkat Keras', 'Restart', 'Sleep', 'Booting', 'C'),
(21, '1024 Kilobyte (KB) setara dengan...', 'Umum', '1 Megabyte (MB)', '1 Gigabyte (GB)', '1 Terabyte (TB)', 'A'),
(22, 'Perangkat yang mengubah sinyal digital menjadi analog untuk internet disebut...', 'Perangkat Keras', 'Router', 'Hub', 'Modem', 'C');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `kuis`
--
ALTER TABLE `kuis`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `kuis`
--
ALTER TABLE `kuis`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
