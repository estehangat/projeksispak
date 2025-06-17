-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 17, 2025 at 07:40 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `projeksispak`
--

-- --------------------------------------------------------

--
-- Table structure for table `artikels`
--

CREATE TABLE `artikels` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `judul` varchar(255) NOT NULL,
  `ringkasan` text DEFAULT NULL,
  `url_eksternal` varchar(2048) NOT NULL,
  `penulis` varchar(255) DEFAULT NULL,
  `sumber_publikasi` varchar(255) DEFAULT NULL,
  `status` enum('draft','published') NOT NULL DEFAULT 'draft',
  `published_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `artikels`
--

INSERT INTO `artikels` (`id`, `judul`, `ringkasan`, `url_eksternal`, `penulis`, `sumber_publikasi`, `status`, `published_at`, `created_at`, `updated_at`) VALUES
(29, 'ISPA (Infeksi Saluran Pernapasan Akut): Gejala, Penyebab, dan Obat', 'ISPA adalah infeksi di saluran pernapasan yang menimbulkan gejala batuk, pilek, dan demam. ISPA sangat menular dan dapat dialami siapa saja.', 'https://www.alodokter.com/ispa', 'Tim Alodokter', 'Alodokter.com', 'published', '2024-03-15 02:00:00', '2025-06-01 03:41:45', '2025-06-01 03:41:45'),
(30, 'Kenali Gejala Umum ISPA yang Tidak Boleh Diabaikan', 'Mengetahui gejala umum ISPA membantu Anda untuk mendapatkan penanganan yang lebih cepat dan tepat, mencegah komplikasi lebih lanjut.', 'https://www.halodoc.com/kesehatan/ispa', 'Tim Halodoc', 'Halodoc.com', 'published', '2024-03-16 03:00:00', '2025-06-01 03:41:45', '2025-06-01 03:41:45'),
(31, 'Perbedaan ISPA Atas dan ISPA Bawah yang Perlu Diketahui', 'ISPA terbagi menjadi infeksi saluran napas atas dan bawah, masing-masing dengan karakteristik dan potensi tingkat keparahan yang berbeda.', 'https://www.siloamhospitals.com/informasi-siloam/artikel/ispa-atas-dan-bawah', 'Tim Medis Siloam', 'Siloam Hospitals', 'published', '2024-03-17 04:00:00', '2025-06-01 03:41:45', '2025-06-01 03:41:45'),
(32, 'Demam pada ISPA: Kapan Harus Khawatir?', 'Demam adalah respons alami tubuh terhadap infeksi. Namun, pada kondisi ISPA tertentu, demam tinggi bisa menjadi tanda bahaya.', 'https://www.klikdokter.com/info-sehat/pernapasan/kapan-demam-karena-ispa-perlu-diwaspadai', 'Tim KlikDokter', 'KlikDokter.com', 'published', '2024-03-18 05:00:00', '2025-06-01 03:41:45', '2025-06-01 03:41:45'),
(33, 'Batuk Akibat ISPA: Jenis dan Cara Meredakannya', 'Batuk merupakan gejala ISPA yang paling umum. Kenali jenis batuk Anda dan cara meredakannya dengan tepat.', 'https://www.alodokter.com/macam-macam-obat-batuk-alami-yang-ampuh-dan-aman', 'Tim Alodokter', 'Alodokter.com', 'published', '2024-03-19 06:00:00', '2025-06-01 03:41:45', '2025-06-01 03:41:45'),
(34, '7 Langkah Efektif Mencegah Penularan ISPA', 'Pencegahan adalah kunci utama. Terapkan langkah-langkah sederhana ini untuk melindungi diri dan keluarga dari ISPA.', 'https://www.halodoc.com/artikel/7-cara-mencegah-penyakit-ispa-yang-perlu-diketahui', 'Tim Halodoc', 'Halodoc.com', 'published', '2024-03-20 07:00:00', '2025-06-01 03:41:45', '2025-06-01 03:41:45'),
(35, 'Pentingnya Cuci Tangan untuk Mencegah ISPA', 'Mencuci tangan dengan sabun adalah cara sederhana namun sangat efektif untuk membunuh kuman penyebab berbagai penyakit, termasuk ISPA.', 'https://promkes.kemkes.go.id/pentingnya-mencuci-tangan-pakai-sabun', 'Kemenkes RI', 'Kemenkes RI', 'published', '2024-03-21 08:00:00', '2025-06-01 03:41:45', '2025-06-01 03:41:45'),
(36, 'Jaga Imunitas Tubuh, Kunci Utama Lawan ISPA', 'Sistem kekebalan tubuh yang prima adalah benteng pertahanan terbaik melawan berbagai infeksi, termasuk ISPA.', 'https://www.siloamhospitals.com/informasi-siloam/artikel/cara-menjaga-imun-tubuh', 'Tim Medis Siloam', 'Siloam Hospitals', 'published', '2024-03-22 09:00:00', '2025-06-01 03:41:45', '2025-06-01 03:41:45'),
(37, 'Peran Ventilasi Rumah yang Baik dalam Mencegah ISPA', 'Sirkulasi udara yang baik di dalam rumah dapat mengurangi konsentrasi kuman di udara dan mencegah penularan ISPA.', 'https://www.klikdokter.com/info-sehat/pernapasan/pentingnya-ventilasi-udara-yang-baik-untuk-kesehatan-pernapasan', 'Tim KlikDokter', 'KlikDokter.com', 'published', '2024-03-23 10:00:00', '2025-06-01 03:41:45', '2025-06-01 03:41:45'),
(38, 'Etika Batuk dan Bersin yang Benar untuk Hindari Penyebaran Kuman', 'Menerapkan etika batuk dan bersin yang benar adalah tindakan sederhana namun berdampak besar dalam mencegah penyebaran ISPA.', 'https://www.who.int/emergencies/diseases/novel-coronavirus-2019/advice-for-public', 'WHO', 'WHO.int', 'published', '2024-03-24 11:00:00', '2025-06-01 03:41:45', '2025-06-01 03:41:45'),
(39, 'ISPA pada Bayi dan Anak: Gejala yang Harus Diwaspadai Orang Tua', 'Anak-anak dan bayi lebih rentan terkena ISPA. Kenali gejala spesifik pada mereka yang memerlukan perhatian khusus.', 'https://www.alodokter.com/ispa-pada-bayi-dan-anak-gejala-dan-penanganannya', 'Tim Alodokter', 'Alodokter.com', 'published', '2024-03-25 02:00:00', '2025-06-01 03:41:45', '2025-06-01 03:41:45'),
(40, 'Cara Mengatasi Hidung Tersumbat pada Bayi Saat ISPA', 'Hidung tersumbat bisa sangat mengganggu kenyamanan bayi. Berikut cara aman untuk mengatasinya saat bayi terkena ISPA.', 'https://www.halodoc.com/artikel/cara-mengatasi-hidung-tersumbat-pada-bayi-dengan-bahan-alami', 'Tim Halodoc', 'Halodoc.com', 'published', '2024-03-26 03:00:00', '2025-06-01 03:41:45', '2025-06-01 03:41:45'),
(41, 'Amankah Memberikan Obat Batuk Pilek Tanpa Resep untuk Anak?', 'Pemberian obat bebas untuk anak perlu perhatian khusus. Ketahui mana yang aman dan kapan harus konsultasi dokter.', 'https://www.klikdokter.com/info-sehat/obat/pemberian-obat-batuk-pilek-pada-anak-perlukah', 'Tim KlikDokter', 'KlikDokter.com', 'published', '2024-03-27 04:00:00', '2025-06-01 03:41:45', '2025-06-01 03:41:45'),
(42, 'Kapan Anak dengan Gejala ISPA Perlu Dibawa ke Dokter?', 'Memahami tanda bahaya pada anak dengan ISPA penting agar penanganan medis segera diberikan jika diperlukan.', 'https://www.siloamhospitals.com/informasi-siloam/artikel/kapan-anak-sakit-harus-dibawa-ke-dokter', 'Tim Medis Siloam', 'Siloam Hospitals', 'published', '2024-03-28 05:00:00', '2025-06-01 03:41:45', '2025-06-01 03:41:45'),
(43, 'Mitos dan Fakta Seputar ISPA pada Anak', 'Banyak informasi beredar mengenai ISPA pada anak. Mana yang mitos dan mana yang fakta? Simak penjelasannya.', 'https://www.alodokter.com/komunitas/topic/mitos-dan-fakta-seputar-batuk-pilek-pada-anak', 'Tim Alodokter', 'Alodokter.com', 'published', '2024-03-29 06:00:00', '2025-06-01 03:41:45', '2025-06-01 03:41:45'),
(44, 'Influenza (Flu): Gejala, Pengobatan, dan Pencegahan', 'Flu adalah ISPA yang disebabkan virus influenza. Meskipun umum, flu bisa menyebabkan komplikasi serius pada kelompok rentan.', 'https://www.halodoc.com/kesehatan/influenza', 'Tim Halodoc', 'Halodoc.com', 'published', '2024-04-01 02:00:00', '2025-06-01 03:41:45', '2025-06-01 03:41:45'),
(45, 'Sinusitis: Saat Rongga Sinus Mengalami Peradangan', 'Sinusitis ditandai dengan hidung tersumbat, nyeri wajah, dan ingus kental. Kenali penyebab dan cara mengatasinya.', 'https://www.alodokter.com/sinusitis', 'Tim Alodokter', 'Alodokter.com', 'published', '2024-04-02 03:00:00', '2025-06-01 03:41:45', '2025-06-01 03:41:45'),
(46, 'Faringitis (Radang Tenggorokan): Penyebab dan Penanganan', 'Sakit saat menelan dan tenggorokan terasa tidak nyaman adalah gejala utama faringitis. Apa saja penyebabnya?', 'https://www.klikdokter.com/penyakit/telinga-hidung-tenggorokan/faringitis', 'Tim KlikDokter', 'KlikDokter.com', 'published', '2024-04-03 04:00:00', '2025-06-01 03:41:45', '2025-06-01 03:41:45'),
(47, 'Laringitis: Penyebab Suara Serak Hingga Hilang', 'Peradangan pada laring (kotak suara) dapat menyebabkan suara serak atau bahkan hilang sama sekali. Ini penyebab dan solusinya.', 'https://www.siloamhospitals.com/informasi-siloam/artikel/apa-itu-laringitis', 'Tim Medis Siloam', 'Siloam Hospitals', 'published', '2024-04-04 05:00:00', '2025-06-01 03:41:45', '2025-06-01 03:41:45'),
(48, 'Rhinitis: Lebih dari Sekadar Pilek Biasa', 'Rhinitis adalah peradangan pada lapisan dalam hidung. Bisa bersifat alergi maupun non-alergi. Pahami bedanya.', 'https://www.alodokter.com/rhinitis', 'Tim Alodokter', 'Alodokter.com', 'published', '2024-04-05 06:00:00', '2025-06-01 03:41:45', '2025-06-01 03:41:45'),
(49, 'Tonsilitis (Radang Amandel): Gejala dan Pilihan Terapi', 'Amandel yang meradang bisa sangat menyakitkan. Ketahui gejala tonsilitis dan berbagai pilihan pengobatannya.', 'https://www.halodoc.com/kesehatan/tonsilitis', 'Tim Halodoc', 'Halodoc.com', 'published', '2024-04-06 07:00:00', '2025-06-01 03:41:45', '2025-06-01 03:41:45'),
(50, 'Bronkitis Akut: Peradangan pada Saluran Bronkus', 'Bronkitis akut seringkali berkembang dari ISPA atas. Bagaimana gejalanya dan kapan perlu waspada?', 'https://www.klikdokter.com/penyakit/pernapasan/bronkitis-akut', 'Tim KlikDokter', 'KlikDokter.com', 'published', '2024-04-07 08:00:00', '2025-06-01 03:41:45', '2025-06-01 03:41:45'),
(51, 'Obat ISPA Alami yang Bisa Anda Coba di Rumah', 'Beberapa bahan alami dipercaya dapat membantu meredakan gejala ISPA ringan. Apa saja dan bagaimana cara menggunakannya?', 'https://www.siloamhospitals.com/informasi-siloam/artikel/obat-ispa-alami', 'Tim Medis Siloam', 'Siloam Hospitals', 'published', '2024-04-08 09:00:00', '2025-06-01 03:41:45', '2025-06-01 03:41:45'),
(52, 'Perawatan Mandiri ISPA: Istirahat dan Cairan adalah Kunci', 'Untuk ISPA ringan akibat virus, istirahat yang cukup dan asupan cairan yang memadai seringkali menjadi pengobatan terbaik.', 'https://www.alodokter.com/jangan-panik-ini-cara-mengobati-ispa-di-rumah', 'Tim Alodokter', 'Alodokter.com', 'published', '2024-04-09 10:00:00', '2025-06-01 03:41:45', '2025-06-01 03:41:45'),
(53, 'Antibiotik untuk ISPA: Kapan Sebenarnya Diperlukan?', 'Penggunaan antibiotik yang tidak tepat dapat menyebabkan resistensi. Pahami kapan antibiotik benar-benar dibutuhkan untuk ISPA.', 'https://www.halodoc.com/artikel/perlu-tahu-ini-alasan-ispa-tidak-selalu-diobati-dengan-antibiotik', 'Tim Halodoc', 'Halodoc.com', 'published', '2024-04-10 11:00:00', '2025-06-01 03:41:45', '2025-06-01 03:41:45'),
(54, 'Waspada Komplikasi ISPA pada Lansia', 'Lansia merupakan kelompok rentan yang bisa mengalami komplikasi lebih serius jika terkena ISPA. Kenali tanda-tandanya.', 'https://www.klikdokter.com/info-sehat/pernapasan/ispa-pada-lansia-ini-komplikasi-yang-perlu-diwaspadai', 'Tim KlikDokter', 'KlikDokter.com', 'published', '2024-04-11 02:00:00', '2025-06-01 03:41:45', '2025-06-01 03:41:45'),
(55, 'Polusi Udara dalam Ruangan dan Risiko ISPA', 'Tidak hanya polusi luar ruangan, kualitas udara di dalam rumah juga berpengaruh terhadap risiko ISPA. Ini tips menjaganya.', 'https://www.alodokter.com/waspadai-bahaya-polusi-udara-dalam-ruangan-bagi-kesehatan', 'Tim Alodokter', 'Alodokter.com', 'published', '2024-04-12 03:00:00', '2025-06-01 03:41:45', '2025-06-01 03:41:45'),
(56, 'Pengaruh Rokok Terhadap Saluran Pernapasan dan ISPA', 'Asap rokok, baik aktif maupun pasif, merusak saluran pernapasan dan meningkatkan kerentanan terhadap ISPA.', 'https://www.halodoc.com/artikel/rokok-dan-polusi-udara-tingkatkan-risiko-terkena-ispa', 'Tim Halodoc', 'Halodoc.com', 'published', '2024-04-13 04:00:00', '2025-06-01 03:41:45', '2025-06-01 03:41:45'),
(57, 'Tips Menjaga Kesehatan Saat Bepergian untuk Hindari ISPA', 'Saat bepergian, terutama ke tempat ramai, risiko tertular penyakit seperti ISPA meningkat. Ini tips untuk tetap sehat.', 'https://www.siloamhospitals.com/informasi-siloam/artikel/tips-menjaga-kesehatan-saat-traveling', 'Tim Medis Siloam', 'Siloam Hospitals', 'published', '2024-04-14 05:00:00', '2025-06-01 03:41:45', '2025-06-01 03:41:45'),
(58, 'Peran Penting Tidur Cukup dalam Sistem Imun dan Pencegahan ISPA', 'Kurang tidur dapat melemahkan sistem kekebalan tubuh, membuat Anda lebih mudah terserang infeksi termasuk ISPA.', 'https://www.klikdokter.com/info-sehat/pernapasan/pentingnya-tidur-cukup-untuk-cegah-ispa', 'Tim KlikDokter', 'KlikDokter.com', 'published', '2024-04-15 06:00:00', '2025-06-01 03:41:45', '2025-06-01 03:41:45'),
(59, 'Fakta Mengenai Penyebaran Virus ISPA di Tempat Umum', 'Ketahui bagaimana virus penyebab ISPA menyebar di tempat umum dan langkah apa yang bisa diambil untuk mengurangi risiko.', 'https://www.alodokter.com/informasi-penting-seputar-penularan-virus-influenza', 'Tim Alodokter', 'Alodokter.com', 'published', '2024-04-16 07:00:00', '2025-06-01 03:41:45', '2025-06-01 03:41:45'),
(60, 'Makanan untuk Meningkatkan Daya Tahan Tubuh dari ISPA', 'Beberapa jenis makanan kaya akan vitamin dan mineral yang dapat membantu memperkuat sistem imun Anda melawan ISPA.', 'https://www.halodoc.com/artikel/5-makanan-untuk-jaga-daya-tahan-tubuh-saat-cuaca-ekstrem', 'Tim Halodoc', 'Halodoc.com', 'published', '2024-04-17 08:00:00', '2025-06-01 03:41:45', '2025-06-01 03:41:45'),
(61, 'Terapi Uap Tradisional untuk Meredakan Gejala ISPA', 'Menghirup uap hangat bisa menjadi cara tradisional yang membantu melegakan hidung tersumbat dan tenggorokan.', 'https://www.klikdokter.com/info-sehat/pernapasan/manfaat-terapi-uap-untuk-meredakan-gejala-flu', 'Tim KlikDokter', 'KlikDokter.com', 'published', '2024-04-18 09:00:00', '2025-06-01 03:41:45', '2025-06-01 03:41:45'),
(62, 'Kenali Tanda Dehidrasi Saat Mengalami ISPA', 'Saat demam dan sakit, tubuh mudah kehilangan cairan. Penting untuk mengenali tanda dehidrasi dan cara mengatasinya.', 'https://www.alodokter.com/jangan-sampai-terlambat-ini-tanda-tanda-dehidrasi', 'Tim Alodokter', 'Alodokter.com', 'published', '2024-04-19 10:00:00', '2025-06-01 03:41:45', '2025-06-01 03:41:45'),
(63, 'ISPA Berulang pada Anak, Apa Penyebabnya?', 'Jika anak sering mengalami ISPA, mungkin ada faktor pemicu atau kondisi mendasar yang perlu dievaluasi lebih lanjut.', 'https://www.halodoc.com/artikel/anak-sering-batuk-pilek-normalkah', 'Tim Halodoc', 'Halodoc.com', 'published', '2024-04-20 11:00:00', '2025-06-01 03:41:45', '2025-06-01 03:41:45'),
(64, 'Pneumonia: Komplikasi ISPA yang Mengancam Jiwa', 'Pneumonia adalah infeksi paru-paru serius yang bisa menjadi komplikasi dari ISPA, terutama pada kelompok rentan.', 'https://www.siloamhospitals.com/informasi-siloam/artikel/apa-itu-pneumonia', 'Tim Medis Siloam', 'Siloam Hospitals', 'published', '2024-04-21 02:00:00', '2025-06-01 03:41:45', '2025-06-01 03:41:45'),
(65, 'Kebiasaan Sehari-hari yang Bisa Memicu ISPA Tanpa Disadari', 'Beberapa kebiasaan sepele dalam kehidupan sehari-hari ternyata bisa meningkatkan risiko Anda terkena ISPA.', 'https://www.klikdokter.com/info-sehat/hidup-sehat/kebiasaan-buruk-yang-bisa-menurunkan-daya-tahan-tubuh', 'Tim KlikDokter', 'KlikDokter.com', 'published', '2024-04-22 03:00:00', '2025-06-01 03:41:45', '2025-06-01 03:41:45'),
(66, 'Efektivitas Masker dalam Mencegah Penularan Virus ISPA', 'Masker menjadi salah satu garda terdepan pencegahan penularan penyakit pernapasan. Seberapa efektif dan jenis apa yang baik?', 'https://www.alodokter.com/memilih-masker-yang-tepat-untuk-mencegah-penularan-virus-corona', 'Tim Alodokter', 'Alodokter.com', 'published', '2024-04-23 04:00:00', '2025-06-01 03:41:45', '2025-06-01 03:41:45'),
(67, 'Suplemen Vitamin C untuk ISPA: Perlukah?', 'Vitamin C sering disebut sebagai peningkat imunitas. Apakah suplemen vitamin C efektif mencegah atau mengobati ISPA?', 'https://www.halodoc.com/artikel/benarkah-vitamin-c-ampuh-untuk-mencegah-flu', 'Tim Halodoc', 'Halodoc.com', 'published', '2024-04-24 05:00:00', '2025-06-01 03:41:45', '2025-06-01 03:41:45'),
(68, 'Mengelola ISPA Saat Hamil: Tips Aman untuk Ibu dan Janin', 'Ibu hamil perlu penanganan khusus saat sakit. Berikut tips aman mengelola ISPA selama kehamilan.', 'https://www.siloamhospitals.com/informasi-siloam/artikel/tips-aman-mengatasi-flu-saat-hamil', 'Tim Medis Siloam', 'Siloam Hospitals', 'published', '2024-04-25 06:00:00', '2025-06-01 03:41:45', '2025-06-01 03:41:45'),
(69, 'Kualitas Udara dan ISPA: Hubungan yang Perlu Diketahui', 'Paparan polusi udara, baik di luar maupun di dalam ruangan, dapat meningkatkan risiko dan memperburuk gejala ISPA.', 'https://www.klikdokter.com/info-sehat/pernapasan/dampak-buruk-polusi-udara-bagi-kesehatan-paru', 'Tim KlikDokter', 'KlikDokter.com', 'published', '2024-04-26 07:00:00', '2025-06-01 03:41:45', '2025-06-01 03:41:45'),
(70, 'Gejala Long ISPA: Apakah Ada?', 'Seperti Long COVID, beberapa orang melaporkan gejala ISPA yang menetap lebih lama. Apakah ini fenomena nyata?', 'https://www.alodokter.com/kenali-gejala-long-covid-dan-cara-mengatasinya', 'Tim Alodokter', 'Alodokter.com', 'published', '2024-04-27 08:00:00', '2025-06-01 03:41:45', '2025-06-01 03:41:45'),
(71, 'Peran Air Purifier dalam Mengurangi Risiko ISPA di Rumah', 'Air purifier diklaim dapat membersihkan udara dari partikel berbahaya. Seberapa efektif dalam mengurangi risiko ISPA?', 'https://www.halodoc.com/artikel/catat-ini-manfaat-air-purifier-untuk-kesehatan', 'Tim Halodoc', 'Halodoc.com', 'published', '2024-04-28 09:00:00', '2025-06-01 03:41:45', '2025-06-01 03:41:45'),
(72, 'Tips Pemulihan Cepat Setelah Sembuh dari ISPA', 'Setelah sembuh dari ISPA, tubuh mungkin masih membutuhkan waktu untuk pulih sepenuhnya. Ikuti tips berikut.', 'https://www.siloamhospitals.com/informasi-siloam/artikel/cara-mempercepat-pemulihan-setelah-sakit', 'Tim Medis Siloam', 'Siloam Hospitals', 'published', '2024-04-29 10:00:00', '2025-06-01 03:41:45', '2025-06-01 03:41:45'),
(73, 'Obat Herbal untuk ISPA: Mana yang Terbukti Efektif?', 'Banyak obat herbal diklaim dapat mengatasi ISPA. Mari kita lihat mana saja yang memiliki dukungan ilmiah.', 'https://www.klikdokter.com/info-sehat/alternatif/pilihan-obat-herbal-untuk-batuk-dan-pilek', 'Tim KlikDokter', 'KlikDokter.com', 'published', '2024-04-30 11:00:00', '2025-06-01 03:41:45', '2025-06-01 03:41:45'),
(74, 'Sinusitis pada Anak: Gejala dan Penanganan yang Tepat', 'Anak juga bisa mengalami sinusitis. Kenali gejalanya yang mungkin berbeda dengan orang dewasa dan cara penanganannya.', 'https://www.alodokter.com/sinusitis-pada-anak-ini-cara-mengatasinya', 'Tim Alodokter', 'Alodokter.com', 'published', '2024-05-01 02:00:00', '2025-06-01 03:41:45', '2025-06-01 03:41:45'),
(75, 'Mengenal Lebih Jauh Bronkiolitis pada Bayi', 'Bronkiolitis adalah infeksi saluran napas kecil pada paru-paru yang sering terjadi pada bayi dan anak kecil.', 'https://www.halodoc.com/kesehatan/bronkiolitis', 'Tim Halodoc', 'Halodoc.com', 'published', '2024-05-02 03:00:00', '2025-06-01 03:41:45', '2025-06-01 03:41:45'),
(76, 'Apakah ISPA Selalu Menular? Ini Faktanya', 'Sebagian besar ISPA memang menular, tetapi tingkat penularannya bisa berbeda tergantung penyebabnya. Pahami faktanya.', 'https://www.klikdokter.com/info-sehat/pernapasan/cara-penularan-ispa-yang-perlu-diwaspadai', 'Tim KlikDokter', 'KlikDokter.com', 'published', '2024-05-03 04:00:00', '2025-06-01 03:41:45', '2025-06-01 03:41:45'),
(77, 'Menjaga Pola Makan Sehat Selama Sakit ISPA', 'Asupan makanan yang tepat dapat membantu tubuh melawan infeksi dan mempercepat pemulihan saat Anda sakit ISPA.', 'https://www.siloamhospitals.com/informasi-siloam/artikel/makanan-yang-baik-dikonsumsi-saat-sakit', 'Tim Medis Siloam', 'Siloam Hospitals', 'published', '2024-05-04 05:00:00', '2025-06-01 03:41:45', '2025-06-01 03:41:45'),
(78, '7 Cara Mencegah ISPA pada Anak Akibat Polusi Udara Buruk', 'Polusi udara menjadi ancaman serius bagi kesehatan pernapasan anak. Artikel ini membahas tujuh langkah praktis yang bisa dilakukan orang tua untuk mencegah ISPA pada anak akibat paparan polusi udara.', 'https://www.haibunda.com/parenting/20230901095822-60-314764/7-cara-mencegah-ispa-pada-anak-akibat-polusi-udara-buruk', 'Tim Haibunda', 'Haibunda.com', 'published', '2023-09-01 02:58:00', '2025-06-01 03:52:25', '2025-06-01 03:52:25'),
(79, '9 Makanan yang Baik untuk Penderita ISPA', 'Saat menderita ISPA, tubuh memerlukan nutrisi yang tepat untuk mempercepat pemulihan. Kenali sembilan jenis makanan yang baik dikonsumsi untuk meredakan gejala dan meningkatkan imunitas.', 'https://www.haibunda.com/moms-life/20230905123947-76-315055/9-makanan-yang-baik-untuk-penderita-ispa', 'Tim Haibunda', 'Haibunda.com', 'published', '2023-09-05 05:39:00', '2025-06-01 03:52:25', '2025-06-01 03:52:25'),
(80, 'Tanya Jawab Komunitas Dokter: Seputar ISPA', 'Kumpulan pertanyaan dan jawaban dari dokter dan pengguna di komunitas Alodokter mengenai berbagai aspek Inspeksi Saluran Pernapasan Akut (ISPA).', 'https://www.alodokter.com/komunitas/topic/ispa-19', 'Tim Dokter Alodokter & Komunitas', 'Alodokter.com Komunitas', 'published', '2024-01-15 03:00:00', '2025-06-01 03:52:25', '2025-06-01 03:52:25'),
(81, 'Panduan Konsumsi Makanan untuk Penderita Infeksi Saluran Pernapasan', 'Apa saja makanan dan minuman yang dianjurkan dan sebaiknya dihindari ketika Anda atau keluarga mengalami infeksi saluran pernapasan? Simak panduannya di sini.', 'https://royalprogress.com/id/blog/spesialisasi-medis/paru-dan-pernapasan/apa-yang-boleh-dikonsumsi-dan-tidak-untuk-penderita-infeksi-saluran-pernapasan/', 'Tim Medis RS Royal Progress', 'RoyalProgress.com', 'published', '2024-02-10 04:00:00', '2025-06-01 03:52:25', '2025-06-01 03:52:25'),
(82, 'Diskusi Komunitas: Bagaimana Pola Makan yang Tepat Saat ISPA?', 'Berbagi tips dan pengalaman dari komunitas Alodokter mengenai pengaturan pola makan yang dapat membantu meredakan gejala dan mendukung pemulihan saat terkena ISPA.', 'https://www.alodokter.com/komunitas/topic/pola-makan-ketika-ispa', 'Komunitas Alodokter', 'Alodokter.com Komunitas', 'published', '2024-01-20 07:00:00', '2025-06-01 03:52:25', '2025-06-01 03:52:25'),
(83, 'Agar Jalur Pernapasan Aman (Saat Polusi Udara)', 'Tips dan panduan dari Kementerian Kesehatan RI untuk menjaga jalur pernapasan tetap aman, terutama saat menghadapi kondisi polusi udara yang buruk.', 'https://sehatnegeriku.kemkes.go.id/baca/blog/20240108/5044642/agar-jalur-pernapasan-aman/', 'Kementerian Kesehatan RI', 'Sehat Negeriku - Kemenkes', 'published', '2024-01-07 17:00:00', '2025-06-01 03:52:26', '2025-06-01 03:52:26'),
(84, 'Olahraga untuk Meningkatkan Fungsi Paru-Paru', 'Menjaga kesehatan paru-paru adalah hal yang penting. Artikel ini membahas jenis-jenis olahraga yang dapat membantu meningkatkan fungsi paru-paru dan kesehatan pernapasan secara keseluruhan.', 'https://www.siloamhospitals.com/informasi-siloam/artikel/olahraga-untuk-meningkatkan-fungsi-paru-paru', 'Tim Medis Siloam Hospitals', 'SiloamHospitals.com', 'published', '2023-11-09 17:00:00', '2025-06-01 03:52:26', '2025-06-01 03:52:26'),
(85, 'Vaksinasi dan ISPA: Bagaimana Vaksin Bisa Mencegah Infeksi Saluran Pernapasan?', 'Memahami peran penting vaksinasi dalam mencegah berbagai jenis Infeksi Saluran Pernapasan Akut (ISPA) dan komplikasinya.', 'https://columbiaasia.co.id/artikel/kesehatan/vaksinasi-dan-ispa-bagaimana-vaksin-bisa-mencegah-infeksi-saluran-pernapasan/', 'Tim Medis Columbia Asia', 'ColumbiaAsia.co.id', 'published', '2023-10-19 17:00:00', '2025-06-01 03:52:26', '2025-06-01 03:52:26'),
(86, 'Tindakan yang Bisa Dilakukan untuk Membantu Mengatasi ISPA', 'Artikel ini membahas berbagai tindakan mandiri dan langkah-langkah yang bisa diambil untuk membantu meredakan gejala dan mengatasi ISPA di rumah.', 'https://www.halodoc.com/artikel/tindakan-yang-bisa-dilakukan-untuk-membantu-mengatasi-ispa', 'Tim Halodoc', 'Halodoc.com', 'published', '2023-12-04 17:00:00', '2025-06-01 03:52:26', '2025-06-01 03:52:26');

-- --------------------------------------------------------

--
-- Table structure for table `aturan_ispa`
--

CREATE TABLE `aturan_ispa` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_gejala_sekarang` varchar(255) NOT NULL,
  `jawaban` enum('YA','TIDAK') NOT NULL,
  `id_gejala_selanjutnya` varchar(255) DEFAULT NULL,
  `id_penyakit_hasil` varchar(255) DEFAULT NULL,
  `is_pertanyaan_awal` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `aturan_ispa`
--

INSERT INTO `aturan_ispa` (`id`, `id_gejala_sekarang`, `jawaban`, `id_gejala_selanjutnya`, `id_penyakit_hasil`, `is_pertanyaan_awal`, `created_at`, `updated_at`) VALUES
(1, 'G04', 'YA', 'G07_A1', NULL, 1, NULL, NULL),
(2, 'G04', 'TIDAK', 'G09_A1', NULL, 0, NULL, NULL),
(3, 'G07_A1', 'YA', 'G01_B1', NULL, 0, NULL, NULL),
(4, 'G07_A1', 'TIDAK', 'G05_B1', NULL, 0, NULL, NULL),
(5, 'G09_A1', 'YA', 'G13_B1', NULL, 0, NULL, NULL),
(6, 'G09_A1', 'TIDAK', 'G05_B2', NULL, 0, NULL, NULL),
(7, 'G01_B1', 'YA', 'G02_C1', NULL, 0, NULL, NULL),
(8, 'G01_B1', 'TIDAK', 'G03_C1', NULL, 0, NULL, NULL),
(9, 'G05_B1', 'YA', 'G12_C1', NULL, 0, NULL, NULL),
(10, 'G05_B1', 'TIDAK', 'G02_C2', NULL, 0, NULL, NULL),
(11, 'G13_B1', 'YA', 'G14_C1', NULL, 0, NULL, NULL),
(12, 'G13_B1', 'TIDAK', 'G20_C1', NULL, 0, NULL, NULL),
(13, 'G05_B2', 'YA', 'G07_C1', NULL, 0, NULL, NULL),
(14, 'G05_B2', 'TIDAK', 'G08_C1', NULL, 0, NULL, NULL),
(15, 'G02_C1', 'YA', 'G05_D1', NULL, 0, NULL, NULL),
(16, 'G02_C1', 'TIDAK', 'G06_D1', NULL, 0, NULL, NULL),
(17, 'G03_C1', 'YA', 'G05_D2', NULL, 0, NULL, NULL),
(18, 'G03_C1', 'TIDAK', 'G06_D2', NULL, 0, NULL, NULL),
(19, 'G12_C1', 'YA', 'G18_D1', NULL, 0, NULL, NULL),
(20, 'G12_C1', 'TIDAK', 'G06_D3', NULL, 0, NULL, NULL),
(21, 'G02_C2', 'YA', 'G06_D4', NULL, 0, NULL, NULL),
(22, 'G02_C2', 'TIDAK', NULL, NULL, 0, NULL, NULL),
(23, 'G14_C1', 'YA', 'G20_D_PathP09', NULL, 0, NULL, NULL),
(24, 'G14_C1', 'TIDAK', NULL, NULL, 0, NULL, NULL),
(25, 'G20_C1', 'YA', NULL, 'P09', 0, NULL, NULL),
(26, 'G20_C1', 'TIDAK', NULL, NULL, 0, NULL, NULL),
(27, 'G07_C1', 'YA', 'G08_D1', NULL, 0, NULL, NULL),
(28, 'G07_C1', 'TIDAK', NULL, NULL, 0, NULL, NULL),
(29, 'G08_C1', 'YA', NULL, 'P05', 0, NULL, NULL),
(30, 'G08_C1', 'TIDAK', NULL, NULL, 0, NULL, NULL),
(31, 'G05_D1', 'YA', 'G08_E1', NULL, 0, NULL, NULL),
(32, 'G05_D1', 'TIDAK', 'G10_E1', NULL, 0, NULL, NULL),
(33, 'G06_D1', 'YA', 'G15_E1', NULL, 0, NULL, NULL),
(34, 'G06_D1', 'TIDAK', 'G14_E1', NULL, 0, NULL, NULL),
(35, 'G05_D2', 'YA', 'G15_E2', NULL, 0, NULL, NULL),
(36, 'G05_D2', 'TIDAK', NULL, NULL, 0, NULL, NULL),
(37, 'G06_D2', 'YA', 'G11_E1', NULL, 0, NULL, NULL),
(38, 'G06_D2', 'TIDAK', NULL, NULL, 0, NULL, NULL),
(39, 'G18_D1', 'YA', 'G19_E1', NULL, 0, NULL, NULL),
(40, 'G18_D1', 'TIDAK', NULL, NULL, 0, NULL, NULL),
(41, 'G06_D3', 'YA', NULL, 'P04', 0, NULL, NULL),
(42, 'G06_D3', 'TIDAK', NULL, NULL, 0, NULL, NULL),
(43, 'G06_D4', 'YA', NULL, 'P04', 0, NULL, NULL),
(44, 'G06_D4', 'TIDAK', NULL, NULL, 0, NULL, NULL),
(45, 'G20_D_PathP09', 'YA', NULL, 'P09', 0, NULL, NULL),
(46, 'G20_D_PathP09', 'TIDAK', NULL, NULL, 0, NULL, NULL),
(47, 'G08_D1', 'YA', NULL, 'P05', 0, NULL, NULL),
(48, 'G08_D1', 'TIDAK', NULL, NULL, 0, NULL, NULL),
(49, 'G08_E1', 'YA', 'G13_F1', NULL, 0, NULL, NULL),
(50, 'G08_E1', 'TIDAK', 'G21_F1', NULL, 0, NULL, NULL),
(51, 'G10_E1', 'YA', NULL, 'P08', 0, NULL, NULL),
(52, 'G10_E1', 'TIDAK', NULL, NULL, 0, NULL, NULL),
(53, 'G15_E1', 'YA', 'G16_F1', NULL, 0, NULL, NULL),
(54, 'G15_E1', 'TIDAK', NULL, 'P03', 0, NULL, NULL),
(55, 'G14_E1', 'YA', 'G11_F1', NULL, 0, NULL, NULL),
(56, 'G14_E1', 'TIDAK', NULL, 'P02', 0, NULL, NULL),
(57, 'G15_E2', 'YA', NULL, 'P02', 0, NULL, NULL),
(58, 'G15_E2', 'TIDAK', NULL, NULL, 0, NULL, NULL),
(59, 'G11_E1', 'YA', 'G14_F1', NULL, 0, NULL, NULL),
(60, 'G11_E1', 'TIDAK', NULL, NULL, 0, NULL, NULL),
(61, 'G19_E1', 'YA', NULL, 'P10', 0, NULL, NULL),
(62, 'G19_E1', 'TIDAK', NULL, NULL, 0, NULL, NULL),
(63, 'G13_F1', 'YA', NULL, 'P01', 0, NULL, NULL),
(64, 'G13_F1', 'TIDAK', NULL, NULL, 0, NULL, NULL),
(65, 'G21_F1', 'YA', NULL, 'P08', 0, NULL, NULL),
(66, 'G21_F1', 'TIDAK', NULL, NULL, 0, NULL, NULL),
(67, 'G16_F1', 'YA', NULL, 'P07', 0, NULL, NULL),
(68, 'G16_F1', 'TIDAK', NULL, NULL, 0, NULL, NULL),
(69, 'G14_F1', 'YA', 'G17_G1', NULL, 0, NULL, NULL),
(70, 'G14_F1', 'TIDAK', NULL, NULL, 0, NULL, NULL),
(71, 'G17_G1', 'YA', NULL, 'P06', 0, NULL, NULL),
(72, 'G17_G1', 'TIDAK', NULL, NULL, 0, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `diagnosas`
--

CREATE TABLE `diagnosas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `diagnosa_id` char(255) NOT NULL,
  `data_diagnosa` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`data_diagnosa`)),
  `kondisi` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`kondisi`)),
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `diagnosas`
--

INSERT INTO `diagnosas` (`id`, `diagnosa_id`, `data_diagnosa`, `kondisi`, `created_at`, `updated_at`) VALUES
(1, '63b35fe07d882', '[{\"value\": \"1\", \"kode_depresi\": \"P001\"}, {\"value\": \"0.9712\", \"kode_depresi\": \"P002\"}]', '[[\"G001\", \"0.4\"], [\"G002\", \"0.2\"]]', '2023-01-02 14:51:12', '2023-01-02 14:51:12');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `feedbacks`
--

CREATE TABLE `feedbacks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `rating` tinyint(4) DEFAULT NULL,
  `komentar` text NOT NULL,
  `diagnosa_penyakit` varchar(255) DEFAULT NULL,
  `sesi_diagnosa` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`sesi_diagnosa`)),
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `feedbacks`
--

INSERT INTO `feedbacks` (`id`, `nama`, `email`, `rating`, `komentar`, `diagnosa_penyakit`, `sesi_diagnosa`, `created_at`, `updated_at`) VALUES
(7, 'Budi Santoso', 'budi.santoso@example.com', 5, 'Sistemnya sangat membantu untuk diagnosa awal ISPA. Alur pertanyaannya jelas dan hasilnya cukup informatif. Saran saya mungkin bisa ditambahkan fitur konsultasi singkat dengan pakar setelah diagnosa.', 'P03', '[{\"kode_gejala\":\"G04\",\"pertanyaan\":\"Demam\",\"jawaban\":\"YA\"}, {\"kode_gejala\":\"G07_A\",\"pertanyaan\":\"Nyeri Tenggorokan\",\"jawaban\":\"YA\"}, {\"kode_gejala\":\"G01_A\",\"pertanyaan\":\"Batuk\",\"jawaban\":\"YA\"}, {\"kode_gejala\":\"G02_A\",\"pertanyaan\":\"Bersin\",\"jawaban\":\"TIDAK\"}, {\"kode_gejala\":\"G06_A\",\"pertanyaan\":\"Hidung Tersumbat\",\"jawaban\":\"TIDAK\"}, {\"kode_gejala\":\"G14_A\",\"pertanyaan\":\"Nafsu Makan Menurun\",\"jawaban\":\"YA\"}]', '2025-06-01 17:22:03', '2025-06-01 17:22:03'),
(8, NULL, NULL, NULL, 'Tampilan website sudah bagus dan mudah digunakan. Mungkin bisa ditambahkan lebih banyak artikel kesehatan terkait pencegahan ISPA.', NULL, NULL, '2025-06-01 17:22:03', '2025-06-01 17:22:03'),
(9, 'Siti Aminah', 'siti.aminah@example.net', 4, 'Cukup membantu, tapi mungkin bisa ditambahkan informasi lebih detail mengenai penanganan pertama di rumah untuk setiap penyakit.', 'P07', '[{\"kode_gejala\":\"G04\",\"pertanyaan\":\"Demam\",\"jawaban\":\"YA\"}, {\"kode_gejala\":\"G07_A\",\"pertanyaan\":\"Nyeri Tenggorokan\",\"jawaban\":\"YA\"}, {\"kode_gejala\":\"G01_A\",\"pertanyaan\":\"Batuk\",\"jawaban\":\"YA\"}, {\"kode_gejala\":\"G02_A\",\"pertanyaan\":\"Bersin\",\"jawaban\":\"TIDAK\"}, {\"kode_gejala\":\"G06_A\",\"pertanyaan\":\"Hidung Tersumbat\",\"jawaban\":\"YA\"}, {\"kode_gejala\":\"G15_A\",\"pertanyaan\":\"Pegal-pegal\",\"jawaban\":\"YA\"}, {\"kode_gejala\":\"G16_A\",\"pertanyaan\":\"Tekanan Pada Wajah dan Telinga\",\"jawaban\":\"YA\"}]', '2025-06-01 17:22:03', '2025-06-01 17:22:03');

-- --------------------------------------------------------

--
-- Table structure for table `gejala`
--

CREATE TABLE `gejala` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kode_gejala` varchar(255) NOT NULL,
  `gejala` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `gejala`
--

INSERT INTO `gejala` (`id`, `kode_gejala`, `gejala`, `created_at`, `updated_at`) VALUES
(1, 'G01', 'Batuk', '2025-06-01 14:47:21', '2025-06-01 14:47:21'),
(2, 'G02', 'Bersin', '2025-06-01 14:47:21', '2025-06-01 14:47:21'),
(3, 'G03', 'Mual', '2025-06-01 14:47:21', '2025-06-01 14:47:21'),
(4, 'G04', 'Demam', '2025-06-01 14:47:21', '2025-06-01 14:47:21'),
(5, 'G05', 'Nyeri Kepala', '2025-06-01 14:47:21', '2025-06-01 14:47:21'),
(6, 'G06', 'Hidung Tersumbat', '2025-06-01 14:47:21', '2025-06-01 14:47:21'),
(7, 'G07', 'Nyeri Tenggorokan', '2025-06-01 14:47:21', '2025-06-01 14:47:21'),
(8, 'G08', 'Berkurangnya kemampuan penciuman', '2025-06-01 14:47:21', '2025-06-01 14:47:21'),
(9, 'G09', 'Bau mulut', '2025-06-01 14:47:21', '2025-06-01 14:47:21'),
(10, 'G10', 'Hidung Meler', '2025-06-01 14:47:21', '2025-06-01 14:47:21'),
(11, 'G11', 'Lemas', '2025-06-01 14:47:21', '2025-06-01 14:47:21'),
(12, 'G12', 'Tubuh Terasa Sakit', '2025-06-01 14:47:21', '2025-06-01 14:47:21'),
(13, 'G13', 'Dahak Hijau/Kuning', '2025-06-01 14:47:21', '2025-06-01 14:47:21'),
(14, 'G14', 'Nafsu Makan Menurun', '2025-06-01 14:47:21', '2025-06-01 14:47:21'),
(15, 'G15', 'Pegal-pegal', '2025-06-01 14:47:21', '2025-06-01 14:47:21'),
(16, 'G16', 'Tekanan Pada Wajah dan Telinga', '2025-06-01 14:47:21', '2025-06-01 14:47:21'),
(17, 'G17', 'Panas Dingin', '2025-06-01 14:47:21', '2025-06-01 14:47:21'),
(18, 'G18', 'Sulit Bernapas', '2025-06-01 14:47:21', '2025-06-01 14:47:21'),
(19, 'G19', 'Sulit menelan', '2025-06-01 14:47:21', '2025-06-01 14:47:21'),
(20, 'G20', 'Pembengkakan kelenjar leher', '2025-06-01 14:47:21', '2025-06-01 14:47:21'),
(21, 'G21', 'Gangguan Tidur', '2025-06-01 14:47:21', '2025-06-01 14:47:21'),
(22, 'G07_A1', 'Nyeri Tenggorokan', '2025-06-01 14:47:21', '2025-06-01 14:47:21'),
(23, 'G09_A1', 'Bau mulut', '2025-06-01 14:47:21', '2025-06-01 14:47:21'),
(24, 'G01_B1', 'Batuk', '2025-06-01 14:47:21', '2025-06-01 14:47:21'),
(25, 'G05_B1', 'Nyeri Kepala', '2025-06-01 14:47:21', '2025-06-01 14:47:21'),
(26, 'G13_B1', 'Dahak Hijau/Kuning', '2025-06-01 14:47:21', '2025-06-01 14:47:21'),
(27, 'G05_B2', 'Nyeri Kepala', '2025-06-01 14:47:21', '2025-06-01 14:47:21'),
(28, 'G02_C1', 'Bersin', '2025-06-01 14:47:21', '2025-06-01 14:47:21'),
(29, 'G03_C1', 'Mual', '2025-06-01 14:47:21', '2025-06-01 14:47:21'),
(30, 'G12_C1', 'Tubuh Terasa Sakit', '2025-06-01 14:47:21', '2025-06-01 14:47:21'),
(31, 'G02_C2', 'Bersin', '2025-06-01 14:47:21', '2025-06-01 14:47:21'),
(32, 'G14_C1', 'Nafsu Makan Menurun', '2025-06-01 14:47:21', '2025-06-01 14:47:21'),
(33, 'G20_C1', 'Pembengkakan kelenjar leher', '2025-06-01 14:47:21', '2025-06-01 14:47:21'),
(34, 'G07_C1', 'Nyeri Tenggorokan', '2025-06-01 14:47:21', '2025-06-01 14:47:21'),
(35, 'G08_C1', 'Berkurangnya kemampuan penciuman', '2025-06-01 14:47:21', '2025-06-01 14:47:21'),
(36, 'G05_D1', 'Nyeri Kepala', '2025-06-01 14:47:21', '2025-06-01 14:47:21'),
(37, 'G06_D1', 'Hidung Tersumbat', '2025-06-01 14:47:21', '2025-06-01 14:47:21'),
(38, 'G05_D2', 'Nyeri Kepala', '2025-06-01 14:47:21', '2025-06-01 14:47:21'),
(39, 'G06_D2', 'Hidung Tersumbat', '2025-06-01 14:47:21', '2025-06-01 14:47:21'),
(40, 'G18_D1', 'Sulit Bernapas', '2025-06-01 14:47:21', '2025-06-01 14:47:21'),
(41, 'G06_D3', 'Hidung Tersumbat', '2025-06-01 14:47:21', '2025-06-01 14:47:21'),
(42, 'G06_D4', 'Hidung Tersumbat', '2025-06-01 14:47:21', '2025-06-01 14:47:21'),
(43, 'G20_D_PathP09', 'Pembengkakan kelenjar leher', '2025-06-01 14:47:21', '2025-06-01 14:47:21'),
(44, 'G08_D1', 'Berkurangnya kemampuan penciuman', '2025-06-01 14:47:21', '2025-06-01 14:47:21'),
(45, 'G08_E1', 'Berkurangnya kemampuan penciuman', '2025-06-01 14:47:21', '2025-06-01 14:47:21'),
(46, 'G10_E1', 'Hidung Meler', '2025-06-01 14:47:21', '2025-06-01 14:47:21'),
(47, 'G15_E1', 'Pegal-pegal', '2025-06-01 14:47:21', '2025-06-01 14:47:21'),
(48, 'G14_E1', 'Nafsu Makan Menurun', '2025-06-01 14:47:21', '2025-06-01 14:47:21'),
(49, 'G11_E1', 'Lemas', '2025-06-01 14:47:21', '2025-06-01 14:47:21'),
(50, 'G19_E1', 'Sulit menelan', '2025-06-01 14:47:21', '2025-06-01 14:47:21'),
(51, 'G13_F1', 'Dahak Hijau/Kuning', '2025-06-01 14:47:21', '2025-06-01 14:47:21'),
(52, 'G21_F1', 'Gangguan Tidur', '2025-06-01 14:47:21', '2025-06-01 14:47:21'),
(53, 'G16_F1', 'Tekanan Pada Wajah dan Telinga', '2025-06-01 14:47:21', '2025-06-01 14:47:21'),
(54, 'G11_F1', 'Lemas', '2025-06-01 14:47:21', '2025-06-01 14:47:21'),
(55, 'G14_F1', 'Nafsu Makan Menurun', '2025-06-01 14:47:21', '2025-06-01 14:47:21'),
(56, 'G17_G1', 'Panas Dingin', '2025-06-01 14:47:21', '2025-06-01 14:47:21');

-- --------------------------------------------------------

--
-- Table structure for table `hasil_diagnosa`
--

CREATE TABLE `hasil_diagnosa` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `penyakit_id` varchar(255) NOT NULL,
  `biodata_sesi` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`biodata_sesi`)),
  `riwayat_jawaban_sesi` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`riwayat_jawaban_sesi`)),
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `hasil_diagnosa`
--

INSERT INTO `hasil_diagnosa` (`id`, `user_id`, `penyakit_id`, `biodata_sesi`, `riwayat_jawaban_sesi`, `created_at`, `updated_at`) VALUES
(18, 9, '10', '{\"nama\":\"eka\",\"usia\":\"20\"}', '[{\"kode_gejala\":\"G04\",\"pertanyaan\":\"Demam\",\"jawaban\":\"YA\"},{\"kode_gejala\":\"G07_A1\",\"pertanyaan\":\"Nyeri Tenggorokan\",\"jawaban\":\"TIDAK\"},{\"kode_gejala\":\"G05_B1\",\"pertanyaan\":\"Nyeri Kepala\",\"jawaban\":\"YA\"},{\"kode_gejala\":\"G12_C1\",\"pertanyaan\":\"Tubuh Terasa Sakit\",\"jawaban\":\"YA\"},{\"kode_gejala\":\"G18_D1\",\"pertanyaan\":\"Sulit Bernapas\",\"jawaban\":\"YA\"},{\"kode_gejala\":\"G19_E1\",\"pertanyaan\":\"Sulit menelan\",\"jawaban\":\"YA\"}]', '2025-06-01 16:43:45', '2025-06-01 16:43:45'),
(19, 9, '1', '{\"nama\":\"ebel\",\"usia\":\"20\"}', '[{\"kode_gejala\":\"G04\",\"pertanyaan\":\"Demam\",\"jawaban\":\"YA\"},{\"kode_gejala\":\"G07_A1\",\"pertanyaan\":\"Nyeri Tenggorokan\",\"jawaban\":\"YA\"},{\"kode_gejala\":\"G01_B1\",\"pertanyaan\":\"Batuk\",\"jawaban\":\"YA\"},{\"kode_gejala\":\"G02_C1\",\"pertanyaan\":\"Bersin\",\"jawaban\":\"YA\"},{\"kode_gejala\":\"G05_D1\",\"pertanyaan\":\"Nyeri Kepala\",\"jawaban\":\"YA\"},{\"kode_gejala\":\"G08_E1\",\"pertanyaan\":\"Berkurangnya kemampuan penciuman\",\"jawaban\":\"YA\"},{\"kode_gejala\":\"G13_F1\",\"pertanyaan\":\"Dahak Hijau\\/Kuning\",\"jawaban\":\"YA\"}]', '2025-06-01 22:54:31', '2025-06-01 22:54:31'),
(20, 9, '4', '{\"nama\":\"belandini\",\"usia\":\"19\"}', '[{\"kode_gejala\":\"G04\",\"pertanyaan\":\"Demam\",\"jawaban\":\"YA\"},{\"kode_gejala\":\"G07_A1\",\"pertanyaan\":\"Nyeri Tenggorokan\",\"jawaban\":\"TIDAK\"},{\"kode_gejala\":\"G05_B1\",\"pertanyaan\":\"Nyeri Kepala\",\"jawaban\":\"TIDAK\"},{\"kode_gejala\":\"G02_C2\",\"pertanyaan\":\"Bersin\",\"jawaban\":\"YA\"},{\"kode_gejala\":\"G06_D4\",\"pertanyaan\":\"Hidung Tersumbat\",\"jawaban\":\"YA\"}]', '2025-06-09 05:35:27', '2025-06-09 05:35:27'),
(21, 9, '9', '{\"nama\":\"dini\",\"usia\":\"12\"}', '[{\"kode_gejala\":\"G04\",\"pertanyaan\":\"Demam\",\"jawaban\":\"TIDAK\"},{\"kode_gejala\":\"G09_A1\",\"pertanyaan\":\"Bau mulut\",\"jawaban\":\"YA\"},{\"kode_gejala\":\"G13_B1\",\"pertanyaan\":\"Dahak Hijau\\/Kuning\",\"jawaban\":\"YA\"},{\"kode_gejala\":\"G14_C1\",\"pertanyaan\":\"Nafsu Makan Menurun\",\"jawaban\":\"YA\"},{\"kode_gejala\":\"G20_D_PathP09\",\"pertanyaan\":\"Pembengkakan kelenjar leher\",\"jawaban\":\"YA\"}]', '2025-06-15 20:54:19', '2025-06-15 20:54:19'),
(22, 9, '9', '{\"nama\":\"ebel\",\"usia\":\"21\"}', '[{\"kode_gejala\":\"G04\",\"pertanyaan\":\"Demam\",\"jawaban\":\"TIDAK\"},{\"kode_gejala\":\"G09_A1\",\"pertanyaan\":\"Bau mulut\",\"jawaban\":\"YA\"},{\"kode_gejala\":\"G13_B1\",\"pertanyaan\":\"Dahak Hijau\\/Kuning\",\"jawaban\":\"YA\"},{\"kode_gejala\":\"G14_C1\",\"pertanyaan\":\"Nafsu Makan Menurun\",\"jawaban\":\"YA\"},{\"kode_gejala\":\"G20_D_PathP09\",\"pertanyaan\":\"Pembengkakan kelenjar leher\",\"jawaban\":\"YA\"}]', '2025-06-16 01:00:48', '2025-06-16 01:00:48');

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `kabupatens`
--

CREATE TABLE `kabupatens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `provinsi_id` bigint(20) UNSIGNED NOT NULL,
  `nama_kabupaten` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kabupatens`
--

INSERT INTO `kabupatens` (`id`, `provinsi_id`, `nama_kabupaten`, `created_at`, `updated_at`) VALUES
(1, 1, 'Kabupaten Aceh Besar', '2025-05-31 08:15:36', '2025-05-31 08:15:36'),
(2, 1, 'Kota Banda Aceh', '2025-05-31 08:15:36', '2025-05-31 08:15:36'),
(3, 1, 'Kota Sabang', '2025-05-31 08:15:36', '2025-05-31 08:15:36'),
(4, 1, 'Kabupaten Pidie', '2025-05-31 08:15:36', '2025-05-31 08:15:36'),
(5, 2, 'Kota Medan', '2025-05-31 08:15:36', '2025-05-31 08:15:36'),
(6, 2, 'Kabupaten Deli Serdang', '2025-05-31 08:15:36', '2025-05-31 08:15:36'),
(7, 2, 'Kabupaten Karo', '2025-05-31 08:15:36', '2025-05-31 08:15:36'),
(8, 2, 'Kota Pematangsiantar', '2025-05-31 08:15:36', '2025-05-31 08:15:36'),
(9, 3, 'Kota Padang', '2025-05-31 08:15:36', '2025-05-31 08:15:36'),
(10, 3, 'Kabupaten Agam', '2025-05-31 08:15:36', '2025-05-31 08:15:36'),
(11, 3, 'Kota Bukittinggi', '2025-05-31 08:15:36', '2025-05-31 08:15:36'),
(12, 3, 'Kabupaten Tanah Datar', '2025-05-31 08:15:36', '2025-05-31 08:15:36'),
(13, 4, 'Kota Pekanbaru', '2025-05-31 08:15:36', '2025-05-31 08:15:36'),
(14, 4, 'Kabupaten Kampar', '2025-05-31 08:15:36', '2025-05-31 08:15:36'),
(15, 4, 'Kota Dumai', '2025-05-31 08:15:36', '2025-05-31 08:15:36'),
(16, 4, 'Kabupaten Bengkalis', '2025-05-31 08:15:36', '2025-05-31 08:15:36'),
(17, 5, 'Kota Batam', '2025-05-31 08:15:36', '2025-05-31 08:15:36'),
(18, 5, 'Kota Tanjung Pinang', '2025-05-31 08:15:36', '2025-05-31 08:15:36'),
(19, 5, 'Kabupaten Bintan', '2025-05-31 08:15:36', '2025-05-31 08:15:36'),
(20, 5, 'Kabupaten Karimun', '2025-05-31 08:15:36', '2025-05-31 08:15:36'),
(21, 6, 'Kota Jambi', '2025-05-31 08:15:36', '2025-05-31 08:15:36'),
(22, 6, 'Kabupaten Muaro Jambi', '2025-05-31 08:15:36', '2025-05-31 08:15:36'),
(23, 6, 'Kabupaten Kerinci', '2025-05-31 08:15:36', '2025-05-31 08:15:36'),
(24, 6, 'Kabupaten Merangin', '2025-05-31 08:15:36', '2025-05-31 08:15:36'),
(25, 7, 'Kota Bengkulu', '2025-05-31 08:15:36', '2025-05-31 08:15:36'),
(26, 7, 'Kabupaten Rejang Lebong', '2025-05-31 08:15:36', '2025-05-31 08:15:36'),
(27, 7, 'Kabupaten Bengkulu Utara', '2025-05-31 08:15:36', '2025-05-31 08:15:36'),
(28, 7, 'Kabupaten Seluma', '2025-05-31 08:15:36', '2025-05-31 08:15:36'),
(29, 8, 'Kota Palembang', '2025-05-31 08:15:36', '2025-05-31 08:15:36'),
(30, 8, 'Kabupaten Ogan Komering Ilir', '2025-05-31 08:15:36', '2025-05-31 08:15:36'),
(31, 8, 'Kabupaten Muara Enim', '2025-05-31 08:15:36', '2025-05-31 08:15:36'),
(32, 8, 'Kota Prabumulih', '2025-05-31 08:15:36', '2025-05-31 08:15:36'),
(33, 9, 'Kota Pangkal Pinang', '2025-05-31 08:15:36', '2025-05-31 08:15:36'),
(34, 9, 'Kabupaten Bangka', '2025-05-31 08:15:36', '2025-05-31 08:15:36'),
(35, 9, 'Kabupaten Belitung', '2025-05-31 08:15:36', '2025-05-31 08:15:36'),
(36, 9, 'Kabupaten Bangka Tengah', '2025-05-31 08:15:36', '2025-05-31 08:15:36'),
(37, 10, 'Kota Bandar Lampung', '2025-05-31 08:15:36', '2025-05-31 08:15:36'),
(38, 10, 'Kabupaten Lampung Selatan', '2025-05-31 08:15:36', '2025-05-31 08:15:36'),
(39, 10, 'Kabupaten Lampung Tengah', '2025-05-31 08:15:36', '2025-05-31 08:15:36'),
(40, 10, 'Kota Metro', '2025-05-31 08:15:36', '2025-05-31 08:15:36'),
(75, 17, 'Kota Denpasar', '2025-05-31 08:15:36', '2025-05-31 08:15:36'),
(76, 17, 'Kabupaten Badung', '2025-05-31 08:15:36', '2025-05-31 08:15:36'),
(77, 17, 'Kabupaten Gianyar', '2025-05-31 08:15:36', '2025-05-31 08:15:36'),
(78, 17, 'Kabupaten Buleleng', '2025-05-31 08:15:36', '2025-05-31 08:15:36'),
(79, 18, 'Kota Mataram', '2025-05-31 08:15:36', '2025-05-31 08:15:36'),
(80, 18, 'Kabupaten Lombok Barat', '2025-05-31 08:15:36', '2025-05-31 08:15:36'),
(81, 18, 'Kabupaten Lombok Timur', '2025-05-31 08:15:36', '2025-05-31 08:15:36'),
(82, 18, 'Kabupaten Sumbawa', '2025-05-31 08:15:36', '2025-05-31 08:15:36'),
(83, 19, 'Kota Kupang', '2025-05-31 08:15:36', '2025-05-31 08:15:36'),
(84, 19, 'Kabupaten Timor Tengah Selatan', '2025-05-31 08:15:36', '2025-05-31 08:15:36'),
(85, 19, 'Kabupaten Sikka', '2025-05-31 08:15:36', '2025-05-31 08:15:36'),
(86, 19, 'Kabupaten Manggarai Barat', '2025-05-31 08:15:36', '2025-05-31 08:15:36'),
(87, 20, 'Kota Pontianak', '2025-05-31 08:15:36', '2025-05-31 08:15:36'),
(88, 20, 'Kabupaten Kubu Raya', '2025-05-31 08:15:36', '2025-05-31 08:15:36'),
(89, 20, 'Kota Singkawang', '2025-05-31 08:15:36', '2025-05-31 08:15:36'),
(90, 20, 'Kabupaten Sintang', '2025-05-31 08:15:36', '2025-05-31 08:15:36'),
(91, 21, 'Kota Palangka Raya', '2025-05-31 08:15:36', '2025-05-31 08:15:36'),
(92, 21, 'Kabupaten Kotawaringin Timur', '2025-05-31 08:15:36', '2025-05-31 08:15:36'),
(93, 21, 'Kabupaten Kotawaringin Barat', '2025-05-31 08:15:36', '2025-05-31 08:15:36'),
(94, 21, 'Kabupaten Kapuas', '2025-05-31 08:15:36', '2025-05-31 08:15:36'),
(95, 22, 'Kota Banjarmasin', '2025-05-31 08:15:36', '2025-05-31 08:15:36'),
(96, 22, 'Kota Banjarbaru', '2025-05-31 08:15:36', '2025-05-31 08:15:36'),
(97, 22, 'Kabupaten Banjar', '2025-05-31 08:15:36', '2025-05-31 08:15:36'),
(98, 22, 'Kabupaten Tanah Laut', '2025-05-31 08:15:36', '2025-05-31 08:15:36'),
(99, 23, 'Kota Samarinda', '2025-05-31 08:15:36', '2025-05-31 08:15:36'),
(100, 23, 'Kota Balikpapan', '2025-05-31 08:15:36', '2025-05-31 08:15:36'),
(101, 23, 'Kabupaten Kutai Kartanegara', '2025-05-31 08:15:36', '2025-05-31 08:15:36'),
(102, 23, 'Kabupaten Paser', '2025-05-31 08:15:36', '2025-05-31 08:15:36'),
(103, 24, 'Kota Tarakan', '2025-05-31 08:15:36', '2025-05-31 08:15:36'),
(104, 24, 'Kabupaten Bulungan', '2025-05-31 08:15:36', '2025-05-31 08:15:36'),
(105, 24, 'Kabupaten Malinau', '2025-05-31 08:15:36', '2025-05-31 08:15:36'),
(106, 24, 'Kabupaten Nunukan', '2025-05-31 08:15:36', '2025-05-31 08:15:36'),
(107, 25, 'Kota Gorontalo', '2025-05-31 08:15:36', '2025-05-31 08:15:36'),
(108, 25, 'Kabupaten Gorontalo', '2025-05-31 08:15:36', '2025-05-31 08:15:36'),
(109, 25, 'Kabupaten Bone Bolango', '2025-05-31 08:15:36', '2025-05-31 08:15:36'),
(110, 25, 'Kabupaten Pohuwato', '2025-05-31 08:15:36', '2025-05-31 08:15:36'),
(111, 26, 'Kota Manado', '2025-05-31 08:15:36', '2025-05-31 08:15:36'),
(112, 26, 'Kabupaten Minahasa', '2025-05-31 08:15:36', '2025-05-31 08:15:36'),
(113, 26, 'Kota Bitung', '2025-05-31 08:15:36', '2025-05-31 08:15:36'),
(114, 26, 'Kota Tomohon', '2025-05-31 08:15:36', '2025-05-31 08:15:36'),
(115, 27, 'Kota Palu', '2025-05-31 08:15:36', '2025-05-31 08:15:36'),
(116, 27, 'Kabupaten Donggala', '2025-05-31 08:15:36', '2025-05-31 08:15:36'),
(117, 27, 'Kabupaten Sigi', '2025-05-31 08:15:36', '2025-05-31 08:15:36'),
(118, 27, 'Kabupaten Poso', '2025-05-31 08:15:36', '2025-05-31 08:15:36'),
(119, 28, 'Kabupaten Mamuju', '2025-05-31 08:15:36', '2025-05-31 08:15:36'),
(120, 28, 'Kabupaten Polewali Mandar', '2025-05-31 08:15:36', '2025-05-31 08:15:36'),
(121, 28, 'Kabupaten Majene', '2025-05-31 08:15:36', '2025-05-31 08:15:36'),
(122, 28, 'Kabupaten Pasangkayu (Mamuju Utara)', '2025-05-31 08:15:36', '2025-05-31 08:15:36'),
(123, 29, 'Kota Makassar', '2025-05-31 08:15:36', '2025-05-31 08:15:36'),
(124, 29, 'Kabupaten Gowa', '2025-05-31 08:15:36', '2025-05-31 08:15:36'),
(125, 29, 'Kabupaten Maros', '2025-05-31 08:15:36', '2025-05-31 08:15:36'),
(126, 29, 'Kota Parepare', '2025-05-31 08:15:36', '2025-05-31 08:15:36'),
(127, 30, 'Kota Kendari', '2025-05-31 08:15:36', '2025-05-31 08:15:36'),
(128, 30, 'Kabupaten Konawe', '2025-05-31 08:15:36', '2025-05-31 08:15:36'),
(129, 30, 'Kota Baubau', '2025-05-31 08:15:36', '2025-05-31 08:15:36'),
(130, 30, 'Kabupaten Muna', '2025-05-31 08:15:36', '2025-05-31 08:15:36'),
(131, 31, 'Kota Ambon', '2025-05-31 08:15:36', '2025-05-31 08:15:36'),
(132, 31, 'Kabupaten Maluku Tengah', '2025-05-31 08:15:36', '2025-05-31 08:15:36'),
(133, 31, 'Kabupaten Seram Bagian Barat', '2025-05-31 08:15:36', '2025-05-31 08:15:36'),
(134, 31, 'Kota Tual', '2025-05-31 08:15:36', '2025-05-31 08:15:36'),
(135, 32, 'Kota Ternate', '2025-05-31 08:15:36', '2025-05-31 08:15:36'),
(136, 32, 'Kabupaten Halmahera Barat', '2025-05-31 08:15:36', '2025-05-31 08:15:36'),
(137, 32, 'Kota Tidore Kepulauan', '2025-05-31 08:15:36', '2025-05-31 08:15:36'),
(138, 32, 'Kabupaten Halmahera Utara', '2025-05-31 08:15:36', '2025-05-31 08:15:36'),
(139, 33, 'Kabupaten Manokwari', '2025-05-31 08:15:36', '2025-05-31 08:15:36'),
(140, 33, 'Kabupaten Fakfak', '2025-05-31 08:15:36', '2025-05-31 08:15:36'),
(141, 33, 'Kabupaten Teluk Bintuni', '2025-05-31 08:15:36', '2025-05-31 08:15:36'),
(142, 33, 'Kabupaten Kaimana', '2025-05-31 08:15:36', '2025-05-31 08:15:36'),
(143, 34, 'Kota Jayapura', '2025-05-31 08:15:36', '2025-05-31 08:15:36'),
(144, 34, 'Kabupaten Jayapura', '2025-05-31 08:15:36', '2025-05-31 08:15:36'),
(145, 34, 'Kabupaten Mimika (Timika)', '2025-05-31 08:15:36', '2025-05-31 08:15:36'),
(146, 34, 'Kabupaten Biak Numfor', '2025-05-31 08:15:36', '2025-05-31 08:15:36'),
(147, 35, 'Kabupaten Merauke', '2025-05-31 08:15:36', '2025-05-31 08:15:36'),
(148, 35, 'Kabupaten Boven Digoel', '2025-05-31 08:15:36', '2025-05-31 08:15:36'),
(149, 35, 'Kabupaten Mappi', '2025-05-31 08:15:36', '2025-05-31 08:15:36'),
(150, 35, 'Kabupaten Asmat', '2025-05-31 08:15:36', '2025-05-31 08:15:36'),
(151, 36, 'Kabupaten Nabire', '2025-05-31 08:15:36', '2025-05-31 08:15:36'),
(152, 36, 'Kabupaten Paniai', '2025-05-31 08:15:36', '2025-05-31 08:15:36'),
(153, 36, 'Kabupaten Puncak Jaya', '2025-05-31 08:15:36', '2025-05-31 08:15:36'),
(154, 36, 'Kabupaten Dogiyai', '2025-05-31 08:15:36', '2025-05-31 08:15:36'),
(155, 37, 'Kabupaten Jayawijaya (Wamena)', '2025-05-31 08:15:36', '2025-05-31 08:15:36'),
(156, 37, 'Kabupaten Lanny Jaya', '2025-05-31 08:15:36', '2025-05-31 08:15:36'),
(157, 37, 'Kabupaten Nduga', '2025-05-31 08:15:36', '2025-05-31 08:15:36'),
(158, 37, 'Kabupaten Yahukimo', '2025-05-31 08:15:36', '2025-05-31 08:15:36'),
(159, 38, 'Kota Sorong', '2025-05-31 08:15:36', '2025-05-31 08:15:36'),
(160, 38, 'Kabupaten Sorong', '2025-05-31 08:15:36', '2025-05-31 08:15:36'),
(161, 38, 'Kabupaten Raja Ampat', '2025-05-31 08:15:36', '2025-05-31 08:15:36'),
(162, 38, 'Kabupaten Sorong Selatan', '2025-05-31 08:15:36', '2025-05-31 08:15:36'),
(163, 13, 'Kabupaten Bandung', '2025-06-01 02:29:35', '2025-06-01 02:29:35'),
(164, 13, 'Kabupaten Bandung Barat', '2025-06-01 02:29:35', '2025-06-01 02:29:35'),
(165, 13, 'Kabupaten Bekasi', '2025-06-01 02:29:35', '2025-06-01 02:29:35'),
(166, 13, 'Kabupaten Bogor', '2025-06-01 02:29:35', '2025-06-01 02:29:35'),
(167, 13, 'Kabupaten Ciamis', '2025-06-01 02:29:35', '2025-06-01 02:29:35'),
(168, 13, 'Kabupaten Cianjur', '2025-06-01 02:29:35', '2025-06-01 02:29:35'),
(169, 13, 'Kabupaten Cirebon', '2025-06-01 02:29:35', '2025-06-01 02:29:35'),
(170, 13, 'Kabupaten Garut', '2025-06-01 02:29:35', '2025-06-01 02:29:35'),
(171, 13, 'Kabupaten Indramayu', '2025-06-01 02:29:35', '2025-06-01 02:29:35'),
(172, 13, 'Kabupaten Karawang', '2025-06-01 02:29:35', '2025-06-01 02:29:35'),
(173, 13, 'Kabupaten Kuningan', '2025-06-01 02:29:35', '2025-06-01 02:29:35'),
(174, 13, 'Kabupaten Majalengka', '2025-06-01 02:29:35', '2025-06-01 02:29:35'),
(175, 13, 'Kabupaten Pangandaran', '2025-06-01 02:29:35', '2025-06-01 02:29:35'),
(176, 13, 'Kabupaten Purwakarta', '2025-06-01 02:29:35', '2025-06-01 02:29:35'),
(177, 13, 'Kabupaten Subang', '2025-06-01 02:29:35', '2025-06-01 02:29:35'),
(178, 13, 'Kabupaten Sukabumi', '2025-06-01 02:29:35', '2025-06-01 02:29:35'),
(179, 13, 'Kabupaten Sumedang', '2025-06-01 02:29:35', '2025-06-01 02:29:35'),
(180, 13, 'Kabupaten Tasikmalaya', '2025-06-01 02:29:35', '2025-06-01 02:29:35'),
(181, 13, 'Kota Bandung', '2025-06-01 02:29:35', '2025-06-01 02:29:35'),
(182, 13, 'Kota Banjar', '2025-06-01 02:29:35', '2025-06-01 02:29:35'),
(183, 13, 'Kota Bekasi', '2025-06-01 02:29:35', '2025-06-01 02:29:35'),
(184, 13, 'Kota Bogor', '2025-06-01 02:29:35', '2025-06-01 02:29:35'),
(185, 13, 'Kota Cimahi', '2025-06-01 02:29:35', '2025-06-01 02:29:35'),
(186, 13, 'Kota Cirebon', '2025-06-01 02:29:35', '2025-06-01 02:29:35'),
(187, 13, 'Kota Depok', '2025-06-01 02:29:35', '2025-06-01 02:29:35'),
(188, 13, 'Kota Sukabumi', '2025-06-01 02:29:35', '2025-06-01 02:29:35'),
(189, 13, 'Kota Tasikmalaya', '2025-06-01 02:29:35', '2025-06-01 02:29:35'),
(190, 14, 'Kabupaten Banjarnegara', '2025-06-01 02:29:36', '2025-06-01 02:29:36'),
(191, 14, 'Kabupaten Banyumas', '2025-06-01 02:29:36', '2025-06-01 02:29:36'),
(192, 14, 'Kabupaten Batang', '2025-06-01 02:29:36', '2025-06-01 02:29:36'),
(193, 14, 'Kabupaten Blora', '2025-06-01 02:29:36', '2025-06-01 02:29:36'),
(194, 14, 'Kabupaten Boyolali', '2025-06-01 02:29:36', '2025-06-01 02:29:36'),
(195, 14, 'Kabupaten Brebes', '2025-06-01 02:29:36', '2025-06-01 02:29:36'),
(196, 14, 'Kabupaten Cilacap', '2025-06-01 02:29:36', '2025-06-01 02:29:36'),
(197, 14, 'Kabupaten Demak', '2025-06-01 02:29:36', '2025-06-01 02:29:36'),
(198, 14, 'Kabupaten Grobogan', '2025-06-01 02:29:36', '2025-06-01 02:29:36'),
(199, 14, 'Kabupaten Jepara', '2025-06-01 02:29:36', '2025-06-01 02:29:36'),
(200, 14, 'Kabupaten Karanganyar', '2025-06-01 02:29:36', '2025-06-01 02:29:36'),
(201, 14, 'Kabupaten Kebumen', '2025-06-01 02:29:36', '2025-06-01 02:29:36'),
(202, 14, 'Kabupaten Kendal', '2025-06-01 02:29:36', '2025-06-01 02:29:36'),
(203, 14, 'Kabupaten Klaten', '2025-06-01 02:29:36', '2025-06-01 02:29:36'),
(204, 14, 'Kabupaten Kudus', '2025-06-01 02:29:36', '2025-06-01 02:29:36'),
(205, 14, 'Kabupaten Magelang', '2025-06-01 02:29:36', '2025-06-01 02:29:36'),
(206, 14, 'Kabupaten Pati', '2025-06-01 02:29:36', '2025-06-01 02:29:36'),
(207, 14, 'Kabupaten Pekalongan', '2025-06-01 02:29:36', '2025-06-01 02:29:36'),
(208, 14, 'Kabupaten Pemalang', '2025-06-01 02:29:36', '2025-06-01 02:29:36'),
(209, 14, 'Kabupaten Purbalingga', '2025-06-01 02:29:36', '2025-06-01 02:29:36'),
(210, 14, 'Kabupaten Purworejo', '2025-06-01 02:29:36', '2025-06-01 02:29:36'),
(211, 14, 'Kabupaten Rembang', '2025-06-01 02:29:36', '2025-06-01 02:29:36'),
(212, 14, 'Kabupaten Semarang', '2025-06-01 02:29:36', '2025-06-01 02:29:36'),
(213, 14, 'Kabupaten Sragen', '2025-06-01 02:29:36', '2025-06-01 02:29:36'),
(214, 14, 'Kabupaten Sukoharjo', '2025-06-01 02:29:36', '2025-06-01 02:29:36'),
(215, 14, 'Kabupaten Tegal', '2025-06-01 02:29:36', '2025-06-01 02:29:36'),
(216, 14, 'Kabupaten Temanggung', '2025-06-01 02:29:36', '2025-06-01 02:29:36'),
(217, 14, 'Kabupaten Wonogiri', '2025-06-01 02:29:36', '2025-06-01 02:29:36'),
(218, 14, 'Kabupaten Wonosobo', '2025-06-01 02:29:36', '2025-06-01 02:29:36'),
(219, 14, 'Kota Magelang', '2025-06-01 02:29:36', '2025-06-01 02:29:36'),
(220, 14, 'Kota Pekalongan', '2025-06-01 02:29:36', '2025-06-01 02:29:36'),
(221, 14, 'Kota Salatiga', '2025-06-01 02:29:36', '2025-06-01 02:29:36'),
(222, 14, 'Kota Semarang', '2025-06-01 02:29:36', '2025-06-01 02:29:36'),
(223, 14, 'Kota Surakarta (Solo)', '2025-06-01 02:29:36', '2025-06-01 02:29:36'),
(224, 14, 'Kota Tegal', '2025-06-01 02:29:36', '2025-06-01 02:29:36'),
(225, 15, 'Kabupaten Bantul', '2025-06-01 02:29:36', '2025-06-01 02:29:36'),
(226, 15, 'Kabupaten Gunungkidul', '2025-06-01 02:29:36', '2025-06-01 02:29:36'),
(227, 15, 'Kabupaten Kulon Progo', '2025-06-01 02:29:36', '2025-06-01 02:29:36'),
(228, 15, 'Kabupaten Sleman', '2025-06-01 02:29:36', '2025-06-01 02:29:36'),
(229, 15, 'Kota Yogyakarta', '2025-06-01 02:29:36', '2025-06-01 02:29:36'),
(230, 11, 'Kabupaten Lebak', '2025-06-01 02:34:01', '2025-06-01 02:34:01'),
(231, 11, 'Kabupaten Pandeglang', '2025-06-01 02:34:01', '2025-06-01 02:34:01'),
(232, 11, 'Kabupaten Serang', '2025-06-01 02:34:01', '2025-06-01 02:34:01'),
(233, 11, 'Kabupaten Tangerang', '2025-06-01 02:34:01', '2025-06-01 02:34:01'),
(234, 11, 'Kota Cilegon', '2025-06-01 02:34:01', '2025-06-01 02:34:01'),
(235, 11, 'Kota Serang', '2025-06-01 02:34:01', '2025-06-01 02:34:01'),
(236, 11, 'Kota Tangerang', '2025-06-01 02:34:01', '2025-06-01 02:34:01'),
(237, 11, 'Kota Tangerang Selatan', '2025-06-01 02:34:01', '2025-06-01 02:34:01'),
(238, 12, 'Kabupaten Administrasi Kepulauan Seribu', '2025-06-01 02:34:01', '2025-06-01 02:34:01'),
(239, 12, 'Kota Administrasi Jakarta Barat', '2025-06-01 02:34:01', '2025-06-01 02:34:01'),
(240, 12, 'Kota Administrasi Jakarta Pusat', '2025-06-01 02:34:01', '2025-06-01 02:34:01'),
(241, 12, 'Kota Administrasi Jakarta Selatan', '2025-06-01 02:34:01', '2025-06-01 02:34:01'),
(242, 12, 'Kota Administrasi Jakarta Timur', '2025-06-01 02:34:01', '2025-06-01 02:34:01'),
(243, 12, 'Kota Administrasi Jakarta Utara', '2025-06-01 02:34:01', '2025-06-01 02:34:01'),
(244, 16, 'Kabupaten Bangkalan', '2025-06-01 02:34:01', '2025-06-01 02:34:01'),
(245, 16, 'Kabupaten Banyuwangi', '2025-06-01 02:34:01', '2025-06-01 02:34:01'),
(246, 16, 'Kabupaten Blitar', '2025-06-01 02:34:01', '2025-06-01 02:34:01'),
(247, 16, 'Kabupaten Bojonegoro', '2025-06-01 02:34:01', '2025-06-01 02:34:01'),
(248, 16, 'Kabupaten Bondowoso', '2025-06-01 02:34:01', '2025-06-01 02:34:01'),
(249, 16, 'Kabupaten Gresik', '2025-06-01 02:34:01', '2025-06-01 02:34:01'),
(250, 16, 'Kabupaten Jember', '2025-06-01 02:34:01', '2025-06-01 02:34:01'),
(251, 16, 'Kabupaten Jombang', '2025-06-01 02:34:01', '2025-06-01 02:34:01'),
(252, 16, 'Kabupaten Kediri', '2025-06-01 02:34:01', '2025-06-01 02:34:01'),
(253, 16, 'Kabupaten Lamongan', '2025-06-01 02:34:01', '2025-06-01 02:34:01'),
(254, 16, 'Kabupaten Lumajang', '2025-06-01 02:34:01', '2025-06-01 02:34:01'),
(255, 16, 'Kabupaten Madiun', '2025-06-01 02:34:01', '2025-06-01 02:34:01'),
(256, 16, 'Kabupaten Magetan', '2025-06-01 02:34:01', '2025-06-01 02:34:01'),
(257, 16, 'Kabupaten Malang', '2025-06-01 02:34:01', '2025-06-01 02:34:01'),
(258, 16, 'Kabupaten Mojokerto', '2025-06-01 02:34:01', '2025-06-01 02:34:01'),
(259, 16, 'Kabupaten Nganjuk', '2025-06-01 02:34:01', '2025-06-01 02:34:01'),
(260, 16, 'Kabupaten Ngawi', '2025-06-01 02:34:01', '2025-06-01 02:34:01'),
(261, 16, 'Kabupaten Pacitan', '2025-06-01 02:34:01', '2025-06-01 02:34:01'),
(262, 16, 'Kabupaten Pamekasan', '2025-06-01 02:34:01', '2025-06-01 02:34:01'),
(263, 16, 'Kabupaten Pasuruan', '2025-06-01 02:34:01', '2025-06-01 02:34:01'),
(264, 16, 'Kabupaten Ponorogo', '2025-06-01 02:34:01', '2025-06-01 02:34:01'),
(265, 16, 'Kabupaten Probolinggo', '2025-06-01 02:34:01', '2025-06-01 02:34:01'),
(266, 16, 'Kabupaten Sampang', '2025-06-01 02:34:01', '2025-06-01 02:34:01'),
(267, 16, 'Kabupaten Sidoarjo', '2025-06-01 02:34:01', '2025-06-01 02:34:01'),
(268, 16, 'Kabupaten Situbondo', '2025-06-01 02:34:01', '2025-06-01 02:34:01'),
(269, 16, 'Kabupaten Sumenep', '2025-06-01 02:34:01', '2025-06-01 02:34:01'),
(270, 16, 'Kabupaten Trenggalek', '2025-06-01 02:34:01', '2025-06-01 02:34:01'),
(271, 16, 'Kabupaten Tuban', '2025-06-01 02:34:01', '2025-06-01 02:34:01'),
(272, 16, 'Kabupaten Tulungagung', '2025-06-01 02:34:01', '2025-06-01 02:34:01'),
(273, 16, 'Kota Batu', '2025-06-01 02:34:01', '2025-06-01 02:34:01'),
(274, 16, 'Kota Blitar', '2025-06-01 02:34:01', '2025-06-01 02:34:01'),
(275, 16, 'Kota Kediri', '2025-06-01 02:34:01', '2025-06-01 02:34:01'),
(276, 16, 'Kota Madiun', '2025-06-01 02:34:01', '2025-06-01 02:34:01'),
(277, 16, 'Kota Malang', '2025-06-01 02:34:01', '2025-06-01 02:34:01'),
(278, 16, 'Kota Mojokerto', '2025-06-01 02:34:01', '2025-06-01 02:34:01'),
(279, 16, 'Kota Pasuruan', '2025-06-01 02:34:01', '2025-06-01 02:34:01'),
(280, 16, 'Kota Probolinggo', '2025-06-01 02:34:01', '2025-06-01 02:34:01'),
(281, 16, 'Kota Surabaya', '2025-06-01 02:34:01', '2025-06-01 02:34:01');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(5, '0001_01_01_000001_create_cache_table', 1),
(6, '0001_01_01_000002_create_jobs_table', 1),
(7, 'YYYY_MM_DD_HHMMSS_create_gejalas_table', 1),
(8, 'YYYY_MM_DD_HHMMSS_create_penyakit_table', 1),
(9, 'YYYY_MM_DD_HHMMSS_create_kondisi_users_table', 1),
(10, 'YYYY_MM_DD_HHMMSS_create_tingkat_depresis_table', 1),
(11, 'YYYY_MM_DD_HHMMSS_create_keputusans_table', 1),
(12, 'YYYY_MM_DD_HHMMSS_create_diagnosas_table', 1),
(13, 'YYYY_MM_DD_HHMMSS_create_sessions_table', 1),
(14, 'YYYY_MM_DD_HHMMSS_create_aturan_ispa_table', 2),
(15, 'YYYY_MM_DD_HHMMSS_add_deskripsi_solusi_to_penyakit_table', 2);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `penyakit`
--

CREATE TABLE `penyakit` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kode_penyakit` varchar(255) NOT NULL,
  `penyakit` varchar(255) NOT NULL,
  `deskripsi` text DEFAULT NULL,
  `solusi` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `penyakit`
--

INSERT INTO `penyakit` (`id`, `kode_penyakit`, `penyakit`, `deskripsi`, `solusi`, `created_at`, `updated_at`) VALUES
(1, 'P01', 'Sinusitis', 'Sinusitis adalah peradangan atau pembengkakan pada jaringan yang melapisi sinus. Gejala umum meliputi nyeri wajah, hidung tersumbat, dan dahak kental berwarna kuning atau hijau.', 'Istirahat cukup, minum banyak cairan, kompres hangat pada wajah, irigasi hidung dengan larutan saline, gunakan dekongestan atau semprotan hidung kortikosteroid sesuai anjuran dokter. Jika disebabkan bakteri, antibiotik mungkin diperlukan.', '2025-06-01 13:53:00', '2025-06-01 13:53:00'),
(2, 'P02', 'Faringitis', 'Faringitis adalah peradangan pada faring (bagian belakang tenggorokan), sering disebut radang tenggorokan. Gejala utama adalah nyeri tenggorokan, terutama saat menelan, bisa disertai demam dan mual.', 'Istirahat, banyak minum air hangat (seperti teh madu atau air lemon hangat), berkumur air garam hangat, hindari iritan seperti asap rokok, minum obat pereda nyeri. Antibiotik jika disebabkan infeksi bakteri.', '2025-06-01 13:53:00', '2025-06-01 13:53:00'),
(3, 'P03', 'Influenza', 'Influenza atau flu adalah infeksi virus akut yang menyerang sistem pernapasan. Gejala meliputi demam, batuk, nyeri tenggorokan, nyeri otot/badan, sakit kepala, dan lemas. Nafsu makan sering menurun.', 'Istirahat total, banyak minum cairan (air, jus, sup hangat), obat pereda demam dan nyeri (paracetamol/ibuprofen). Obat antivirus bisa diresepkan dokter pada kasus tertentu atau pada kelompok berisiko tinggi.', '2025-06-01 13:53:00', '2025-06-01 13:53:00'),
(4, 'P04', 'Laringitis', 'Laringitis adalah peradangan pada laring (kotak suara) yang menyebabkan suara serak atau hilang. Sering disertai gejala seperti demam, hidung tersumbat, dan bersin.', 'Istirahatkan suara sepenuhnya (hindari berbicara, berbisik, atau berteriak), minum banyak cairan hangat, hirup uap lembab (misalnya dari shower air panas), hindari dekongestan karena bisa mengeringkan tenggorokan.', '2025-06-01 13:53:00', '2025-06-01 13:53:00'),
(5, 'P05', 'Rhinitis', 'Rhinitis adalah peradangan pada selaput lendir hidung. Gejala umum adalah hidung meler, bersin, hidung tersumbat, dan seringkali mata berair atau gatal, bisa disertai nyeri kepala dan berkurangnya kemampuan penciuman.', 'Jika rhinitis alergi, hindari alergen pemicu dan gunakan antihistamin. Untuk rhinitis non-alergi, semprotan hidung saline, dekongestan (jangka pendek), dan istirahat bisa membantu. Identifikasi dan hindari iritan.', '2025-06-01 13:53:00', '2025-06-01 13:53:00'),
(6, 'P06', 'Tonsilitis', 'Tonsilitis adalah peradangan pada amandel (tonsil) akibat infeksi virus atau bakteri. Gejala meliputi sakit tenggorokan parah, sulit menelan, demam, panas dingin, lemas, dan kadang nafsu makan menurun.', 'Istirahat, minum cairan hangat, pereda nyeri, berkumur air garam. Antibiotik jika infeksi bakteri. Pada kasus berat atau berulang, dokter mungkin mempertimbangkan tonsilektomi (operasi pengangkatan amandel).', '2025-06-01 13:53:00', '2025-06-01 13:53:00'),
(7, 'P07', 'Batuk Pilek', 'Batuk pilek biasa (common cold) adalah infeksi virus ringan pada saluran napas atas. Gejala utama adalah batuk, hidung tersumbat atau meler, sakit tenggorokan ringan, bisa disertai pegal-pegal dan tekanan pada wajah/telinga.', 'Istirahat cukup, banyak minum cairan, gunakan pelembap udara, kumur air garam. Obat simtomatik seperti dekongestan atau pereda batuk bisa digunakan jika perlu. Biasanya sembuh sendiri dalam beberapa hari hingga seminggu.', '2025-06-01 13:53:00', '2025-06-01 13:53:00'),
(8, 'P08', 'Nasofaringitis', 'Nasofaringitis adalah peradangan pada nasofaring (area di belakang hidung dan di atas tenggorokan), sering disebut sebagai flu biasa atau pilek. Gejalanya meliputi hidung meler, bersin, batuk, sakit tenggorokan, dan demam ringan. Gangguan tidur bisa terjadi.', 'Perawatan suportif seperti istirahat yang cukup, asupan cairan yang banyak, penggunaan dekongestan atau semprotan hidung saline untuk mengatasi hidung tersumbat, dan obat pereda demam atau nyeri jika diperlukan.', '2025-06-01 13:53:00', '2025-06-01 13:53:00'),
(9, 'P09', 'Adenoiditis', 'Adenoiditis adalah peradangan pada kelenjar adenoid (terletak di bagian belakang rongga hidung). Sering terjadi pada anak-anak, menyebabkan hidung tersumbat kronis, napas melalui mulut, bau mulut, dahak kental, nafsu makan menurun, dan pembengkakan kelenjar leher.', 'Antibiotik jika disebabkan oleh infeksi bakteri. Semprotan hidung kortikosteroid dapat membantu mengurangi peradangan. Pada kasus yang parah atau kronis yang menyebabkan masalah pernapasan atau infeksi telinga berulang, adenoidektomi (operasi pengangkatan adenoid) mungkin dipertimbangkan.', '2025-06-01 13:53:00', '2025-06-01 13:53:00'),
(10, 'P10', 'Epiglottis', 'Epiglotitis adalah peradangan pada epiglotis (katup tulang rawan di pangkal lidah). Ini kondisi serius yang bisa menyumbat jalan napas. Gejala meliputi demam tinggi, sakit tenggorokan parah, sulit menelan, suara serak atau teredam, sulit bernapas, ngiler, dan tubuh terasa sakit serta lemas.', 'Ini adalah KEADAAN DARURAT MEDIS yang memerlukan penanganan segera di rumah sakit. Penanganan meliputi menjaga jalan napas tetap terbuka (mungkin memerlukan intubasi atau trakeostomi), pemberian oksigen, dan antibiotik intravena dosis tinggi.', '2025-06-01 13:53:00', '2025-06-01 13:53:00');

-- --------------------------------------------------------

--
-- Table structure for table `provinsis`
--

CREATE TABLE `provinsis` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_provinsi` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `provinsis`
--

INSERT INTO `provinsis` (`id`, `nama_provinsi`, `created_at`, `updated_at`) VALUES
(1, 'Aceh', '2025-05-31 08:08:26', '2025-05-31 08:08:26'),
(2, 'Sumatera Utara', '2025-05-31 08:08:26', '2025-05-31 08:08:26'),
(3, 'Sumatera Barat', '2025-05-31 08:08:26', '2025-05-31 08:08:26'),
(4, 'Riau', '2025-05-31 08:08:26', '2025-05-31 08:08:26'),
(5, 'Kepulauan Riau', '2025-05-31 08:08:26', '2025-05-31 08:08:26'),
(6, 'Jambi', '2025-05-31 08:08:26', '2025-05-31 08:08:26'),
(7, 'Bengkulu', '2025-05-31 08:08:26', '2025-05-31 08:08:26'),
(8, 'Sumatera Selatan', '2025-05-31 08:08:26', '2025-05-31 08:08:26'),
(9, 'Kepulauan Bangka Belitung', '2025-05-31 08:08:26', '2025-05-31 08:08:26'),
(10, 'Lampung', '2025-05-31 08:08:26', '2025-05-31 08:08:26'),
(11, 'Banten', '2025-05-31 08:08:26', '2025-05-31 08:08:26'),
(12, 'DKI Jakarta', '2025-05-31 08:08:26', '2025-05-31 08:08:26'),
(13, 'Jawa Barat', '2025-05-31 08:08:26', '2025-05-31 08:08:26'),
(14, 'Jawa Tengah', '2025-05-31 08:08:26', '2025-05-31 08:08:26'),
(15, 'DI Yogyakarta', '2025-05-31 08:08:26', '2025-05-31 08:08:26'),
(16, 'Jawa Timur', '2025-05-31 08:08:26', '2025-05-31 08:08:26'),
(17, 'Bali', '2025-05-31 08:08:26', '2025-05-31 08:08:26'),
(18, 'Nusa Tenggara Barat', '2025-05-31 08:08:26', '2025-05-31 08:08:26'),
(19, 'Nusa Tenggara Timur', '2025-05-31 08:08:26', '2025-05-31 08:08:26'),
(20, 'Kalimantan Barat', '2025-05-31 08:08:26', '2025-05-31 08:08:26'),
(21, 'Kalimantan Tengah', '2025-05-31 08:08:26', '2025-05-31 08:08:26'),
(22, 'Kalimantan Selatan', '2025-05-31 08:08:26', '2025-05-31 08:08:26'),
(23, 'Kalimantan Timur', '2025-05-31 08:08:26', '2025-05-31 08:08:26'),
(24, 'Kalimantan Utara', '2025-05-31 08:08:26', '2025-05-31 08:08:26'),
(25, 'Gorontalo', '2025-05-31 08:08:26', '2025-05-31 08:08:26'),
(26, 'Sulawesi Utara', '2025-05-31 08:08:26', '2025-05-31 08:08:26'),
(27, 'Sulawesi Tengah', '2025-05-31 08:08:26', '2025-05-31 08:08:26'),
(28, 'Sulawesi Barat', '2025-05-31 08:08:26', '2025-05-31 08:08:26'),
(29, 'Sulawesi Selatan', '2025-05-31 08:08:26', '2025-05-31 08:08:26'),
(30, 'Sulawesi Tenggara', '2025-05-31 08:08:26', '2025-05-31 08:08:26'),
(31, 'Maluku', '2025-05-31 08:08:26', '2025-05-31 08:08:26'),
(32, 'Maluku Utara', '2025-05-31 08:08:26', '2025-05-31 08:08:26'),
(33, 'Papua Barat', '2025-05-31 08:08:26', '2025-05-31 08:08:26'),
(34, 'Papua', '2025-05-31 08:08:26', '2025-05-31 08:08:26'),
(35, 'Papua Selatan', '2025-05-31 08:08:26', '2025-05-31 08:08:26'),
(36, 'Papua Tengah', '2025-05-31 08:08:26', '2025-05-31 08:08:26'),
(37, 'Papua Pegunungan', '2025-05-31 08:08:26', '2025-05-31 08:08:26'),
(38, 'Papua Barat Daya', '2025-05-31 08:08:26', '2025-05-31 08:08:26');

-- --------------------------------------------------------

--
-- Table structure for table `rumah_sakits`
--

CREATE TABLE `rumah_sakits` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_rs` varchar(255) NOT NULL,
  `alamat` text NOT NULL,
  `no_telp` varchar(255) DEFAULT NULL,
  `website_url` varchar(255) DEFAULT NULL,
  `kabupaten_id` bigint(20) UNSIGNED NOT NULL,
  `deskripsi_tambahan` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `rumah_sakits`
--

INSERT INTO `rumah_sakits` (`id`, `nama_rs`, `alamat`, `no_telp`, `website_url`, `kabupaten_id`, `deskripsi_tambahan`, `created_at`, `updated_at`) VALUES
(11, 'RSUP Prof. Dr. I.G.N.G. Ngoerah (Sanglah)', 'Jl. Diponegoro, Dauh Puri Klod, Denpasar Barat, Kota Denpasar, Bali 80113', '(0361) 227911', 'https://sanglahhospitalbali.com', 75, 'Rumah sakit pusat rujukan untuk Bali dan Nusa Tenggara.', '2025-05-31 08:18:13', '2025-05-31 08:18:13'),
(12, 'RSUP H. Adam Malik Medan', 'Jl. Bunga Lau No.17, Kemenangan Tani, Medan Tuntungan, Kota Medan, Sumatera Utara 20136', '(061) 8360301', 'https://www.rsham.co.id', 5, 'Rumah sakit vertikal Kemenkes di Sumatera Utara.', '2025-05-31 08:18:13', '2025-05-31 08:18:13'),
(13, 'RSUP Dr. Wahidin Sudirohusodo Makassar', 'Jl. Perintis Kemerdekaan KM.11, Tamalanrea Indah, Tamalanrea, Kota Makassar, Sulawesi Selatan 90245', '(0411) 584681', 'https://www.rsupwahidin.com', 123, 'Rumah sakit rujukan utama di Indonesia Timur bagian tengah.', '2025-05-31 08:18:13', '2025-05-31 08:18:13'),
(14, 'RSUP Dr. Kariadi', 'Jl. Dr. Sutomo No.16, Randusari, Kec. Semarang Sel., Kota Semarang, Jawa Tengah 50244', '(024) 8413476', 'https://rskariadi.co.id', 222, 'Rumah sakit vertikal tipe A milik Kementerian Kesehatan, rujukan nasional.', '2025-06-01 02:39:12', '2025-06-01 02:39:12'),
(15, 'RS Columbia Asia Semarang', 'Jl. Siliwangi No.143, Kalibanteng Kulon, Kec. Semarang Barat, Kota Semarang, Jawa Tengah 50145', '(024) 7629999', 'https://www.columbiaasia.com/indonesia/hospitals/semarang', 222, 'Rumah sakit swasta bagian dari jaringan Columbia Asia.', '2025-06-01 02:39:12', '2025-06-01 02:39:12'),
(16, 'RS Elisabeth Semarang', 'Jl. Kawi Raya No.1, Tegalsari, Kec. Candisari, Kota Semarang, Jawa Tengah 50613', '(024) 8310076', 'https://www.elisabeth.or.id', 222, 'Rumah sakit swasta Katolik.', '2025-06-01 02:39:12', '2025-06-01 02:39:12'),
(17, 'RSUD Dr. Moewardi Surakarta', 'Jl. Kolonel Sutarto No.132, Jebres, Kec. Jebres, Kota Surakarta, Jawa Tengah 57126', '(0271) 634634', 'https://rsmoewardi.jatengprov.go.id', 223, 'Rumah sakit umum daerah kelas A milik Pemerintah Provinsi Jawa Tengah.', '2025-06-01 02:39:12', '2025-06-01 02:39:12'),
(18, 'RS PKU Muhammadiyah Surakarta', 'Jl. Ronggowarsito No.130, Kampung Baru, Kec. Ps. Kliwon, Kota Surakarta, Jawa Tengah 57131', '(0271) 714578', 'https://www.rspkusolo.com', 223, 'Rumah sakit swasta milik Muhammadiyah.', '2025-06-01 02:39:12', '2025-06-01 02:39:12'),
(19, 'RS Kasih Ibu Surakarta', 'Jl. Slamet Riyadi No.404, Purwosari, Kec. Laweyan, Kota Surakarta, Jawa Tengah 57142', '(0271) 714422', 'https://rskasihibu.com', 223, 'Rumah sakit swasta umum.', '2025-06-01 02:39:12', '2025-06-01 02:39:12'),
(20, 'RSUD Prof. Dr. Margono Soekarjo Purwokerto', 'Jl. Dr. Gumbreg No.1, Kebontebu, Berkoh, Kec. Purwokerto Sel., Kabupaten Banyumas, Jawa Tengah 53146', '(0281) 632708', 'https://rsmargono.jatengprov.go.id', 191, 'Rumah sakit umum daerah kelas B Pendidikan.', '2025-06-01 02:39:12', '2025-06-01 02:39:12'),
(21, 'RS Ananda Purwokerto', 'Jl. Pemuda No.30, Kober, Kec. Purwokerto Bar., Kabupaten Banyumas, Jawa Tengah 53132', '(0281) 636417', 'https://rsananda.co.id/', 191, 'Rumah sakit swasta.', '2025-06-01 02:39:12', '2025-06-01 02:39:12'),
(22, 'RSIA Bunda Arif Purwokerto', 'Jl. Jatiwinangun No.16, Jatiwinangun, Purwokerto Lor, Kec. Purwokerto Tim., Kabupaten Banyumas, Jawa Tengah 53111', '(0281) 627392', 'http://www.rsiabundaarif.com/', 191, 'Rumah Sakit Ibu dan Anak.', '2025-06-01 02:39:12', '2025-06-01 02:39:12'),
(23, 'RSUD Tidar Kota Magelang', 'Jl. Tidar No.30A, Kemirirejo, Kec. Magelang Tengah, Kota Magelang, Jawa Tengah 56125', '(0293) 362463', 'https://rsudtidar.magelangkota.go.id', 219, 'RSUD milik Pemerintah Kota Magelang.', '2025-06-01 02:39:12', '2025-06-01 02:39:12'),
(24, 'RSUD Muntilan Kabupaten Magelang', 'Jl. Kartini No.13, Muntilan, Kec. Muntilan, Kabupaten Magelang, Jawa Tengah 56411', '(0293) 587004', 'http://rsudmuntilan.magelangkab.go.id', 205, 'RSUD milik Pemerintah Kabupaten Magelang.', '2025-06-01 02:39:12', '2025-06-01 02:39:12'),
(25, 'RST Dr. Soedjono Magelang', 'Jl. Urip Sumoharjo No.48, Wates, Kec. Magelang Utara, Kota Magelang, Jawa Tengah 56113', '(0293) 363061', 'http://www.rstdrsoedjono.co.id/', 219, 'Rumah Sakit Tentara.', '2025-06-01 02:39:12', '2025-06-01 02:39:12'),
(26, 'RSUP Dr. Soeradji Tirtonegoro Klaten', 'Jl. KRT Dr. Soeradji Tirtonegoro No.1, Tegalyoso, Klaten Sel., Kabupaten Klaten, Jawa Tengah 57424', '(0272) 321054', 'https://rssuradji.co.id', 203, 'Rumah sakit vertikal Kemenkes.', '2025-06-01 02:39:12', '2025-06-01 02:39:12'),
(27, 'RSI Klaten', 'Jl. Klaten - Solo KM.4, Belang Wetan, Klaten Utara, Kabupaten Klaten, Jawa Tengah 57436', '(0272) 322252', 'https://www.rsiklaten.com', 203, 'Rumah Sakit Islam Klaten.', '2025-06-01 02:39:12', '2025-06-01 02:39:12'),
(28, 'RSUD Bagas Waras Klaten', 'Jl. Ir. Soekarno No.KM. 5, Buntalan, Klaten Tengah, Kabupaten Klaten, Jawa Tengah 57419', '(0272) 3359667', 'https://rsudbagaswaras.klatenkab.go.id', 203, 'RSUD milik Pemerintah Kabupaten Klaten.', '2025-06-01 02:39:12', '2025-06-01 02:39:12'),
(29, 'RSUD Dr. Loekmono Hadi Kudus', 'Jl. Dr. Lukmonohadi No.19, Cobowo, Ploso, Kec. Jati, Kabupaten Kudus, Jawa Tengah 59348', '(0291) 431831', 'http://rsudlukmonohadi.kuduskab.go.id', 204, 'RSUD milik Pemerintah Kabupaten Kudus.', '2025-06-01 02:39:12', '2025-06-01 02:39:12'),
(30, 'RS Mardi Rahayu Kudus', 'Jl. AKBP Agil Kusumadya No.110, Jati Wetan, Kec. Jati, Kabupaten Kudus, Jawa Tengah 59346', '(0291) 438234', 'https://rsmardirahayu.com', 204, 'Rumah sakit swasta.', '2025-06-01 02:39:12', '2025-06-01 02:39:12'),
(31, 'RS Aisyiyah Kudus', 'Jl. HOS Cokroaminoto No.248, Mlati Norowito, Kec. Kota Kudus, Kabupaten Kudus, Jawa Tengah 59319', '(0291) 434508', 'https://rsaisyiyahkudus.com', 204, 'Rumah sakit swasta milik Aisyiyah.', '2025-06-01 02:39:12', '2025-06-01 02:39:12'),
(32, 'RSUD Bendan Kota Pekalongan', 'Jl. Sriwijaya No.2, Bendan Kergon, Kec. Pekalongan Bar., Kota Pekalongan, Jawa Tengah 51119', '(0285) 421950', 'https://rsudbendan.pekalongankota.go.id', 220, 'RSUD milik Pemerintah Kota Pekalongan.', '2025-06-01 02:39:12', '2025-06-01 02:39:12'),
(33, 'RS H.A. Zaky Djunaid Pekalongan', 'Jl. Pelita II No.8, Panjang Wetan, Kec. Pekalongan Utara, Kota Pekalongan, Jawa Tengah 51141', '(0285) 421621', 'https://rshadjazakydjunaid.com/', 220, 'Rumah sakit swasta Islam.', '2025-06-01 02:39:12', '2025-06-01 02:39:12'),
(34, 'RS Budi Rahayu Pekalongan', 'Jl. Barito No.5, Noyontaansari, Kec. Pekalongan Tim., Kota Pekalongan, Jawa Tengah 51129', '(0285) 423425', 'https://rsbudirahayu.com/', 220, 'Rumah sakit umum swasta.', '2025-06-01 02:39:12', '2025-06-01 02:39:12'),
(35, 'RS Telogorejo Semarang', 'Jl. KH. Ahmad Dahlan, Pekunden, Kec. Semarang Tengah, Kota Semarang, Jawa Tengah 50134', '(024) 86466000', 'https://smc Telogorejo.com/', 222, 'Rumah sakit swasta tipe B.', '2025-06-01 02:43:50', '2025-06-01 02:43:50'),
(36, 'RS Dr. Oen Surakarta (Kandang Sapi)', 'Jl. Brigjend Katamso No.55, Mojosongo, Kec. Jebres, Kota Surakarta, Jawa Tengah 57128', '(0271) 642020', 'https://droenska.com/', 223, 'Rumah sakit swasta terkenal di Solo.', '2025-06-01 02:43:50', '2025-06-01 02:43:50'),
(37, 'RSUD Hj. Anna Lasmanah Banjarnegara', 'Jl. Jend. Sudirman No.20, Kutabanjarnegara, Kec. Banjarnegara, Banjarnegara, Jawa Tengah 53418', '(0286) 591449', 'http://rsud.banjarnegarakab.go.id/', 190, 'RSUD milik Pemkab Banjarnegara.', '2025-06-01 02:43:50', '2025-06-01 02:43:50'),
(38, 'RS Islam Banjarnegara', 'Jl. Raya Bawang Km. 8, Banjarnegara, Jawa Tengah', '(0286) 597002', 'http://www.rsibms.com/', 190, 'Rumah Sakit Islam di Banjarnegara.', '2025-06-01 02:43:50', '2025-06-01 02:43:50'),
(39, 'RS Emanuel Purwareja Klampok', 'Jl. Raya Klampok No.462, Purwareja, Klampok, Kabupaten Banjarnegara, Jawa Tengah 53474', '(0286) 479030', 'https://rsemanuel.com/', 190, 'Rumah sakit swasta.', '2025-06-01 02:43:50', '2025-06-01 02:43:50'),
(40, 'RSUD Batang', 'Jl. Dr. Sutomo No.42, Kauman, Kec. Batang, Kabupaten Batang, Jawa Tengah 51215', '(0285) 391008', 'http://rsud.batangkab.go.id/', 192, 'RSUD milik Pemkab Batang.', '2025-06-01 02:43:50', '2025-06-01 02:43:50'),
(41, 'RS QIM Batang', 'Jl. Urip Sumoharjo No.54, Sambong, Kec. Batang, Kabupaten Batang, Jawa Tengah 51215', '(0285) 4495222', 'https://www.qimhospital.com/', 192, 'Rumah sakit swasta.', '2025-06-01 02:43:50', '2025-06-01 02:43:50'),
(42, 'RSUD Dr. R. Soetijono Blora', 'Jl. Dr. Sutomo No.42, Tempelan, Kec. Blora, Kabupaten Blora, Jawa Tengah 58219', '(0296) 531118', 'http://rsudsoetijono.blorakab.go.id/', 193, 'RSUD milik Pemkab Blora.', '2025-06-01 02:43:50', '2025-06-01 02:43:50'),
(43, 'RS Permata Blora', 'Jl. Reksodiputro No.57, Mlangsen, Kec. Blora, Kabupaten Blora, Jawa Tengah 58215', '(0296) 532222', 'https://rspermatablora.com/', 193, 'Rumah sakit swasta.', '2025-06-01 02:43:50', '2025-06-01 02:43:50'),
(44, 'RSUD Pandan Arang Boyolali', 'Jl. Kantil No.14, Pulisen, Kec. Boyolali, Kabupaten Boyolali, Jawa Tengah 57316', '(0276) 321065', 'http://rsudpa.boyolali.go.id/', 194, 'RSUD milik Pemkab Boyolali.', '2025-06-01 02:43:50', '2025-06-01 02:43:50'),
(45, 'RS Indriati Boyolali', 'Jl. Boyolali - Semarang Km. 2, Mojosongo, Boyolali, Jawa Tengah', '(0276) 320000', 'https://rsindriati.com/', 194, 'Rumah sakit swasta.', '2025-06-01 02:43:50', '2025-06-01 02:43:50'),
(46, 'RSUD Brebes', 'Jl. Jend. Sudirman No.181, Brebes, Kec. Brebes, Kabupaten Brebes, Jawa Tengah 52212', '(0283) 671270', 'http://rsudbrebes.brebeskab.go.id/', 195, 'RSUD milik Pemkab Brebes.', '2025-06-01 02:43:50', '2025-06-01 02:43:50'),
(47, 'RS Bhakti Asih Brebes', 'Jl. P. Diponegoro No.135, Pesantunan, Kec. Wanasari, Kab. Brebes, Jawa Tengah 52252', '(0283) 671219', 'https://rsbhaktiasih.com/', 195, 'Rumah sakit swasta.', '2025-06-01 02:43:50', '2025-06-01 02:43:50'),
(48, 'RSUD Cilacap', 'Jl. Gatot Subroto No.28, Sidanegara, Kec. Cilacap Tengah, Kabupaten Cilacap, Jawa Tengah 53223', '(0282) 533018', 'https://rsud.cilacapkab.go.id/', 196, 'RSUD milik Pemkab Cilacap.', '2025-06-01 02:43:50', '2025-06-01 02:43:50'),
(49, 'RS Pertamina Cilacap', 'Jl. Setiabudi No.1, Tegalkamulyan, Kec. Cilacap Sel., Kabupaten Cilacap, Jawa Tengah 53211', '(0282) 534222', 'https://rspc.pertamedika.co.id/', 196, 'Rumah sakit milik Pertamina.', '2025-06-01 02:43:50', '2025-06-01 02:43:50'),
(50, 'RSUD Sunan Kalijaga Demak', 'Jl. Sultan Fatah No.669/50, Jogoloyo, Kec. Wonosalam, Kabupaten Demak, Jawa Tengah 59571', '(0291) 685018', 'http://rsud.demakkab.go.id/', 197, 'RSUD milik Pemkab Demak.', '2025-06-01 02:43:50', '2025-06-01 02:43:50'),
(51, 'RSUD Dr. R. Soedjati Soemodiardjo Purwodadi', 'Jl. D.I. Panjaitan No.36, Purwodadi, Kec. Purwodadi, Kabupaten Grobogan, Jawa Tengah 58111', '(0292) 421008', 'http://rsud.grobogan.go.id/', 198, 'RSUD milik Pemkab Grobogan.', '2025-06-01 02:43:50', '2025-06-01 02:43:50'),
(52, 'RSUD R.A. Kartini Jepara', 'Jl. KH. Wachid Hasyim No.1, Bapangan, Kec. Jepara, Kabupaten Jepara, Jawa Tengah 59413', '(0291) 591176', 'https://rsudkartini.jepara.go.id/', 199, 'RSUD milik Pemkab Jepara.', '2025-06-01 02:43:50', '2025-06-01 02:43:50'),
(53, 'RSUD Karanganyar', 'Jl. Lawu No.Km. 30, Popongan, Kec. Karanganyar, Kabupaten Karanganyar, Jawa Tengah 57715', '(0271) 495025', 'http://rsud.karanganyarkab.go.id/', 200, 'RSUD milik Pemkab Karanganyar.', '2025-06-01 02:43:50', '2025-06-01 02:43:50'),
(54, 'RSUD Dr. Soedirman Kebumen', 'Jl. Lingkar Selatan No.KM 3, Muktisari, Kec. Kebumen, Kabupaten Kebumen, Jawa Tengah 54317', '(0287) 381101', 'http://rsuddrsoedirman.kebumenkab.go.id/', 201, 'RSUD milik Pemkab Kebumen.', '2025-06-01 02:43:50', '2025-06-01 02:43:50'),
(55, 'RS PKU Muhammadiyah Gombong', 'Jl. Yos Sudarso No.461, Semanding, Gombong, Kec. Gombong, Kab. Kebumen, Jawa Tengah 54411', '(0287) 471393', 'http://www.pkugombong.com/', 201, 'Rumah sakit swasta.', '2025-06-01 02:43:50', '2025-06-01 02:43:50'),
(56, 'RSUD Dr. H. Soewondo Kendal', 'Jl. Laut No.21, Patukangan, Kec. Kendal, Kabupaten Kendal, Jawa Tengah 51311', '(0294) 381433', 'http://rsud.kendalkab.go.id/', 202, 'RSUD milik Pemkab Kendal.', '2025-06-01 02:43:50', '2025-06-01 02:43:50'),
(57, 'RSUD RAA Soewondo Pati', 'Jl. Dr. Susanto No.114, Pati Lor, Kec. Pati, Kabupaten Pati, Jawa Tengah 59111', '(0295) 381104', 'http://rsud.patikab.go.id/', 206, 'RSUD milik Pemkab Pati.', '2025-06-01 02:43:50', '2025-06-01 02:43:50'),
(58, 'RSUD Kajen Kabupaten Pekalongan', 'Jl. Raya Karangsari - Kajen, Karangsari, Kec. Karanganyar, Kabupaten Pekalongan, Jawa Tengah 51161', '(0285) 381630', 'https://rsudkajen.pekalongankab.go.id/', 207, 'RSUD milik Pemkab Pekalongan.', '2025-06-01 02:43:50', '2025-06-01 02:43:50'),
(59, 'RSUD Dr. M. Ashari Pemalang', 'Jl. Gatot Subroto No.43, Beji, Kec. Taman, Kabupaten Pemalang, Jawa Tengah 52361', '(0284) 321614', 'https://rsudashari.pemalangkab.go.id/', 208, 'RSUD milik Pemkab Pemalang.', '2025-06-01 02:43:50', '2025-06-01 02:43:50'),
(60, 'RSUD Goeteng Taroenadibrata Purbalingga', 'Jl. Tentara Pelajar No.22, Purbalingga Lor, Kec. Purbalingga, Kabupaten Purbalingga, Jawa Tengah 53311', '(0281) 891016', 'http://rsud.purbalinggakab.go.id/', 209, 'RSUD milik Pemkab Purbalingga.', '2025-06-01 02:43:50', '2025-06-01 02:43:50'),
(61, 'RS Harapan Ibu Purbalingga', 'Jl. Mayjend Sungkono No.KM 1, Kalikabong, Kec. Kalimanah, Kabupaten Purbalingga, Jawa Tengah 53371', '(0281) 891370', 'https://rsharapanibu.com/', 209, 'Rumah sakit swasta.', '2025-06-01 02:43:50', '2025-06-01 02:43:50'),
(62, 'RS Nirmala Purbalingga', 'Jl. Letnan Yusuf No.1A, Kandanggampang, Kec. Purbalingga, Kabupaten Purbalingga, Jawa Tengah 53319', '(0281) 8901234', 'http://rsnirmala.com/', 209, 'Rumah sakit swasta lainnya.', '2025-06-01 02:43:50', '2025-06-01 02:43:50'),
(63, 'RSUD Dr. Tjitrowardojo Purworejo', 'Jl. Jend. Sudirman No.60, Doplang, Purworejo, Kec. Purworejo, Kabupaten Purworejo, Jawa Tengah 54111', '(0275) 321032', 'https://rsud.purworejokab.go.id/', 210, 'RSUD milik Pemkab Purworejo.', '2025-06-01 02:43:50', '2025-06-01 02:43:50'),
(64, 'RSUD Dr. R. Soetrasno Rembang', 'Jl. Pahlawan No.16, Kabongan Kidul, Kec. Rembang, Kabupaten Rembang, Jawa Tengah 59219', '(0295) 691444', 'http://rsud.rembangkab.go.id/', 211, 'RSUD milik Pemkab Rembang.', '2025-06-01 02:43:50', '2025-06-01 02:43:50'),
(65, 'RSUD Ungaran Kabupaten Semarang', 'Jl. Diponegoro No.125, Genuk, Ungaran Bar., Kabupaten Semarang, Jawa Tengah 50517', '(024) 6921004', 'http://rsudungaran.semarangkab.go.id/', 212, 'RSUD milik Pemkab Semarang.', '2025-06-01 02:43:50', '2025-06-01 02:43:50'),
(66, 'RS Ken Saras', 'Jl. Soekarno Hatta Km. 29, Bergas, Kabupaten Semarang, Jawa Tengah 50552', '(024) 6922269', 'https://rskensaras.com/', 212, 'Rumah sakit swasta.', '2025-06-01 02:43:50', '2025-06-01 02:43:50'),
(67, 'RSUD dr. Soehadi Prijonegoro Sragen', 'Jl. Sukowati No.534, Magero, Sragen Tengah, Kec. Sragen, Kabupaten Sragen, Jawa Tengah 57211', '(0271) 891068', 'http://rsud.sragenkab.go.id/', 213, 'RSUD milik Pemkab Sragen.', '2025-06-01 02:43:50', '2025-06-01 02:43:50'),
(68, 'RSUD Ir. Soekarno Kabupaten Sukoharjo', 'Jl. Dr. Muwardi No.71, Gayam, Sukoharjo, Kec. Sukoharjo, Kabupaten Sukoharjo, Jawa Tengah 57514', '(0271) 593118', 'http://rsud.sukoharjokab.go.id/', 214, 'RSUD milik Pemkab Sukoharjo.', '2025-06-01 02:43:50', '2025-06-01 02:43:50'),
(69, 'RS Indriati Solo Baru', 'Jl. Palem Raya, Langenharjo, Grogol, Kabupaten Sukoharjo, Jawa Tengah 57552', '(0271) 5722000', 'https://rsindriati.com/', 214, 'Rumah sakit swasta besar di area Solo Baru.', '2025-06-01 02:43:50', '2025-06-01 02:43:50'),
(70, 'RSUD Dr. Soeselo Slawi Kabupaten Tegal', 'Jl. Dr. Soetomo No.63, Slawi Kulon, Kec. Slawi, Kabupaten Tegal, Jawa Tengah 52419', '(0283) 491016', 'https://rsudsoeselo.tegalkab.go.id/', 215, 'RSUD milik Pemkab Tegal.', '2025-06-01 02:43:50', '2025-06-01 02:43:50'),
(71, 'RSUD Temanggung', 'Jl. Gajah Mada No.1A, Temanggung II, Temanggung, Kec. Temanggung, Kabupaten Temanggung, Jawa Tengah 56218', '(0293) 491160', 'https://rsud.temanggungkab.go.id/', 216, 'RSUD milik Pemkab Temanggung.', '2025-06-01 02:43:50', '2025-06-01 02:43:50'),
(72, 'RSUD dr. Soediran Mangun Sumarso Wonogiri', 'Jl. Jend. Ahmad Yani No.40, Joho Lor, Giriwono, Kec. Wonogiri, Kabupaten Wonogiri, Jawa Tengah 57613', '(0273) 321027', 'http://rsud.wonogirikab.go.id/', 217, 'RSUD milik Pemkab Wonogiri.', '2025-06-01 02:43:50', '2025-06-01 02:43:50'),
(73, 'RSUD KRT. Setjonegoro Wonosobo', 'Jl. Setjonegoro No.1, Wonosobo Timur, Wonosobo Tim., Kec. Wonosobo, Kabupaten Wonosobo, Jawa Tengah 56311', '(0286) 321091', 'https://rsudsetjonegoro.wonosobokab.go.id/', 218, 'RSUD milik Pemkab Wonosobo.', '2025-06-01 02:43:50', '2025-06-01 02:43:50'),
(74, 'RSUD Kota Salatiga', 'Jl. Osamaliki No.19, Salatiga, Kec. Sidorejo, Kota Salatiga, Jawa Tengah 50711', '(0298) 326508', 'https://rsud.salatiga.go.id/', 221, 'RSUD milik Pemkot Salatiga.', '2025-06-01 02:43:50', '2025-06-01 02:43:50'),
(75, 'RS Paru Dr. Ario Wirawan Salatiga', 'Jl. Hasanudin No.806, Mangunsari, Sidomukti, Kota Salatiga, Jawa Tengah 50721', '(0298) 326130', 'https://rspaw.or.id/', 221, 'Rumah sakit khusus paru.', '2025-06-01 02:43:50', '2025-06-01 02:43:50'),
(76, 'RSUD Kardinah Tegal', 'Jl. KS. Tubun No.2, Kejambon, Kec. Tegal Tim., Kota Tegal, Jawa Tengah 52122', '(0283) 356067', 'https://rsudkardinah.tegalkota.go.id/', 224, 'RSUD milik Pemkot Tegal.', '2025-06-01 02:43:50', '2025-06-01 02:43:50'),
(125, 'RSUP Dr. Hasan Sadikin (RSHS)', 'Jl. Pasteur No.38, Pasteur, Kec. Sukajadi, Kota Bandung, Jawa Barat 40161', '(022) 2551111', 'https://web.rshs.or.id', 6, 'Rumah sakit pendidikan dan rujukan nasional yang berada di bawah Kementerian Kesehatan.', '2025-06-01 02:50:43', '2025-06-01 02:50:43'),
(126, 'RS Santo Borromeus', 'Jl. Ir. H. Juanda No.100, Lebakgede, Kecamatan Coblong, Kota Bandung, Jawa Barat 40132', '(022) 2552000', 'https://rsborromeus.com', 6, 'Rumah sakit swasta Katolik.', '2025-06-01 02:50:43', '2025-06-01 02:50:43'),
(127, 'RSUD Dr. Soetomo', 'Jl. Mayjen Prof. Dr. Moestopo No.6-8, Airlangga, Kec. Gubeng, Surabaya, Jawa Timur 60286', '(031) 5501078', 'https://rsudrsoetomo.jatimprov.go.id', 8, 'Rumah sakit pendidikan utama untuk Fakultas Kedokteran Universitas Airlangga dan rumah sakit rujukan utama di Indonesia Timur.', '2025-06-01 02:50:43', '2025-06-01 02:50:43'),
(172, 'RSUD Dr. Zainoel Abidin', 'Jl. Teuku Moh. Daud Beureueh No.108, Bandar Baru, Kuta Alam, Kota Banda Aceh', '(0651) 34565', 'https://rsudza.acehprov.go.id', 2, 'RS Rujukan Utama Aceh', '2025-06-01 03:01:28', '2025-06-01 03:01:28'),
(173, 'RSU Meuraxa Banda Aceh', 'Jl. Soekarno Hatta, Mibo, Banda Raya, Kota Banda Aceh', '(0651) 43078', 'https://rsudmeuraxa.acehprov.go.id/', 2, 'RSUD milik Pemkot Banda Aceh', '2025-06-01 03:01:28', '2025-06-01 03:01:28'),
(174, 'RSUD Sabang', 'Jl. Teuku Umar, Kuta Ateueh, Sukakarya, Kota Sabang', '(0652) 21303', NULL, 3, 'RSUD di Kota Sabang', '2025-06-01 03:01:28', '2025-06-01 03:01:28'),
(175, 'RSUP H. Adam Malik Medan', 'Jl. Bunga Lau No.17, Kemenangan Tani, Medan Tuntungan, Kota Medan', '(061) 8360301', 'https://www.rsham.co.id', 5, 'RS Vertikal Kemenkes', '2025-06-01 03:01:28', '2025-06-01 03:01:28'),
(176, 'RS Columbia Asia Medan', 'Jl. Listrik No.2A, Petisah Tengah, Medan Petisah, Kota Medan', '(061) 4567888', 'https://www.columbiaasia.com/indonesia/hospitals/medan', 5, 'RS Swasta Internasional', '2025-06-01 03:01:28', '2025-06-01 03:01:28'),
(177, 'RSUD Deli Serdang Lubuk Pakam', 'Jl. Sudirman No.3, Lubuk Pakam Pekan, Lubuk Pakam, Deli Serdang', '(061) 7952068', 'https://rsuddeliserdang.com/', 6, 'RSUD milik Pemkab Deli Serdang', '2025-06-01 03:01:28', '2025-06-01 03:01:28'),
(178, 'RSUP Dr. M. Djamil Padang', 'Jl. Perintis Kemerdekaan, Sawahan Timur, Padang Timur, Kota Padang', '(0751) 32371', 'https://rsdjamil.co.id', 9, 'RS Vertikal Kemenkes', '2025-06-01 03:01:28', '2025-06-01 03:01:28'),
(179, 'RS Yos Sudarso Padang', 'Jl. Situjuh I No.1, Jati Baru, Padang Timur, Kota Padang', '(0751) 33230', 'https://www.rsyossudarso.com/', 9, 'RS Swasta Katolik', '2025-06-01 03:01:28', '2025-06-01 03:01:28'),
(180, 'RSUD Dr. Achmad Mochtar Bukittinggi', 'Jl. Dr. Abdul Rivai, Bukittinggi', '(0752) 21720', 'http://rsam-bukittinggi.sumbarprov.go.id', 11, 'RSUD di Bukittinggi (ID 11 untuk Kota Bukittinggi)', '2025-06-01 03:01:28', '2025-06-01 03:01:28'),
(181, 'RSUD Arifin Achmad Pekanbaru', 'Jl. Diponegoro No.2, Sumahilang, Pekanbaru Kota, Kota Pekanbaru', '(0761) 21618', 'https://rsudarifinachmad.riau.go.id', 13, 'RSUD Provinsi Riau', '2025-06-01 03:01:28', '2025-06-01 03:01:28'),
(182, 'RS Eka Hospital Pekanbaru', 'Jl. Soekarno - Hatta Km 6.5, Karya Indah, Tapung, Kabupaten Kampar', '(0761) 6989999', 'https://www.ekahospital.com/', 14, 'RS Swasta di area Pekanbaru (masuk Kab. Kampar)', '2025-06-01 03:01:28', '2025-06-01 03:01:28'),
(183, 'RS Awal Bros Sudirman Pekanbaru', 'Jl. Jend. Sudirman No.117, Tengkerang Selatan, Bukit Raya, Kota Pekanbaru', '(0761) 47333', 'https://awalbros.com/branch/pekanbaru/', 13, 'RS Swasta Awal Bros', '2025-06-01 03:01:28', '2025-06-01 03:01:28'),
(184, 'RSUD Embung Fatimah Batam', 'Jl. Letjend Suprapto, Bukit Tempayan, Batu Aji, Kota Batam', '(0778) 364446', 'http://rsudef.batam.go.id/', 17, 'RSUD Pemkot Batam', '2025-06-01 03:01:28', '2025-06-01 03:01:28'),
(185, 'RS Awal Bros Batam', 'Jl. Gajah Mada Kav. 1, Baloi Indah, Lubuk Baja, Kota Batam', '(0778) 431777', 'https://awalbros.com/branch/batam/', 17, 'RS Swasta', '2025-06-01 03:01:28', '2025-06-01 03:01:28'),
(186, 'RSUD Raja Ahmad Tabib Tanjungpinang', 'Jl. WR. Supratman No.100, Air Raja, Tanjungpinang Timur, Kota Tanjung Pinang', '(0771) 7335203', 'https://rsudrat.kepriprov.go.id/', 18, 'RSUD Provinsi Kepri', '2025-06-01 03:01:28', '2025-06-01 03:01:28'),
(187, 'RSUD Raden Mattaher Jambi', 'Jl. Letjen Suprapto No.31, Telanaipura, Kota Jambi', '(0741) 61692', 'https://rsudradenmattaher.jambiprov.go.id', 21, 'RSUD Provinsi Jambi', '2025-06-01 03:01:28', '2025-06-01 03:01:28'),
(188, 'RS Siloam Hospitals Jambi', 'Jl. Soekarno-Hatta, Paal Merah, Jambi Selatan, Kota Jambi', '(0741) 5919000', 'https://www.siloamhospitals.com/', 21, 'RS Swasta', '2025-06-01 03:01:28', '2025-06-01 03:01:28'),
(189, 'RSUD H. Hanafie Muara Bungo', 'Jl. Sri Sudewi, Bungo Barat, Muara Bungo, Kabupaten Muaro Jambi', '(0747) 21865', 'https://rsudhanafie.com/', 22, 'RSUD di Muaro Jambi (cek nama kabupaten)', '2025-06-01 03:01:28', '2025-06-01 03:01:28'),
(190, 'RSUD M. Yunus Bengkulu', 'Jl. Bhayangkara, Sidomulyo, Gading Cempaka, Kota Bengkulu', '(0736) 52004', 'https://rsmyunus.bengkuluprov.go.id', 25, 'RSUD Provinsi Bengkulu', '2025-06-01 03:01:28', '2025-06-01 03:01:28'),
(191, 'RS Rafflesia Bengkulu', 'Jl. Mahakam Raya No.12, Lingkar Barat, Gading Cempaka, Kota Bengkulu', '(0736) 25888', 'https://rsrafflesia.com/', 25, 'RS Swasta', '2025-06-01 03:01:28', '2025-06-01 03:01:28'),
(192, 'RSUD Curup', 'Jl. Basuki Rahmat No.10, Dwi Tunggal, Curup, Kabupaten Rejang Lebong', '(0732) 21710', 'https://rsudcurup.rejanglebongkab.go.id/', 26, 'RSUD di Rejang Lebong', '2025-06-01 03:01:28', '2025-06-01 03:01:28'),
(193, 'RSUP Dr. Mohammad Hoesin Palembang', 'Jl. Jend. Sudirman KM.3,5, Sekip Jaya, Kemuning, Kota Palembang', '(0711) 354088', 'https://web.rsmh.co.id/', 29, 'RS Vertikal Kemenkes', '2025-06-01 03:01:28', '2025-06-01 03:01:28'),
(194, 'RS Myria Palembang', 'Jl. Kol. H. Burlian No.228, Sukarami, Kota Palembang', '(0711) 416272', 'http://www.rsmyria.com/', 29, 'RS Swasta', '2025-06-01 03:01:28', '2025-06-01 03:01:28'),
(195, 'RSUD Kayuagung', 'Jl. Letjend Yusuf Singadekane, Jua Jua, Kayu Agung, Kabupaten Ogan Komering Ilir', '(0712) 323889', 'http://rsud.okikab.go.id/', 30, 'RSUD di Ogan Komering Ilir', '2025-06-01 03:01:28', '2025-06-01 03:01:28'),
(196, 'RSUD Dr. (H.C.) Ir. Soekarno', 'Jl. Zipur, Air Anyir, Merawang, Kabupaten Bangka', '(0717) 4269000', 'https://rsudsoekarno.babelprov.go.id', 34, 'RSUD Provinsi Babel', '2025-06-01 03:01:28', '2025-06-01 03:01:28'),
(197, 'RSUD Depati Hamzah Pangkalpinang', 'Jl. Soekarno Hatta, Bukitbesar, Girimaya, Kota Pangkal Pinang', '(0717) 438625', 'https://rsuddepatihamzah.id/', 33, 'RSUD Pemkot Pangkalpinang', '2025-06-01 03:01:28', '2025-06-01 03:01:28'),
(198, 'RS Medika Stannia Sungailiat', 'Jl. Jend. Sudirman, Sungailiat, Kabupaten Bangka', '(0717) 92002', NULL, 34, 'RS Swasta', '2025-06-01 03:01:28', '2025-06-01 03:01:28'),
(199, 'RSUD Dr. H. Abdul Moeloek Lampung', 'Jl. Dr. Rivai No.6, Penengahan, Tanjung Karang Pusat, Kota Bandar Lampung', '(0721) 703312', 'https://rsamlampung.co.id', 37, 'RSUD Rujukan Provinsi Lampung', '2025-06-01 03:01:28', '2025-06-01 03:01:28'),
(200, 'RS Advent Bandar Lampung', 'Jl. Teuku Umar No.48, Sidodadi, Kedaton, Kota Bandar Lampung', '(0721) 703459', 'https://www.rsabl.co.id/', 37, 'RS Advent', '2025-06-01 03:01:28', '2025-06-01 03:01:28'),
(201, 'RSUD Ahmad Yani Metro', 'Jl. Jend. Ahmad Yani No.13, Imopuro, Metro Pusat, Kota Metro', '(0725) 41820', 'https://rsudaymetro.com/', 40, 'RSUD di Kota Metro (ID 40)', '2025-06-01 03:01:28', '2025-06-01 03:01:28'),
(202, 'RSUD Banten', 'Jl. Syeh Nawawi Al Bantani, Banjarsari, Cipocok Jaya, Kota Serang', '(0254) 228888', 'https://rsud.bantenprov.go.id', 235, 'RSUD Provinsi Banten (ID 235 untuk Kota Serang)', '2025-06-01 03:01:28', '2025-06-01 03:01:28'),
(203, 'RS Siloam Lippo Village', 'Jl. Siloam No.6, Bencongan, Klp. Dua, Kabupaten Tangerang', '(021) 80611900', 'https://www.siloamhospitals.com', 233, 'RS Swasta di Kab. Tangerang (ID 233)', '2025-06-01 03:01:28', '2025-06-01 03:01:28'),
(204, 'RSUD Kota Tangerang', 'Jl. Daan Mogot Km.19, Tanah Tinggi, Kota Tangerang', '(021) 29321111', 'https://rsud.tangerangkota.go.id/', 236, 'RSUD Milik Pemkot Tangerang (ID 236)', '2025-06-01 03:01:28', '2025-06-01 03:01:28'),
(205, 'RSUP Persahabatan', 'Jl. Persahabatan Raya No.1, Pisangan Tim., Pulo Gadung, Kota Jakarta Timur', '(021) 4891708', 'https://rsuppersahabatan.co.id', 242, 'RS Rujukan Pernapasan Nasional (ID 242 untuk Jaktim)', '2025-06-01 03:01:28', '2025-06-01 03:01:28'),
(206, 'RS Medistra Jakarta', 'Jl. Jend. Gatot Subroto Kav. 59, Kuningan Tim., Setiabudi, Kota Jakarta Selatan', '(021) 5210200', 'https://www.medistra.com/', 241, 'RS Swasta (ID 241 untuk Jaksel)', '2025-06-01 03:01:28', '2025-06-01 03:01:28'),
(207, 'RSUD Tarakan Jakarta', 'Jl. Kyai Caringin No.7, Cideng, Gambir, Kota Jakarta Pusat', '(021) 3503003', 'http://rstarakan.jakarta.go.id', 240, 'RSUD Pemprov DKI (ID 240 untuk Jakpus)', '2025-06-01 03:01:28', '2025-06-01 03:01:28'),
(208, 'RS Santosa Hospital Bandung Central', 'Jl. Kebon Jati No.38, Kb. Jeruk, Andir, Kota Bandung', '(022) 4248555', 'https://www.santosa-hospital.com/', 181, 'RS Swasta Besar di Bandung (ID 181 Kota Bandung)', '2025-06-01 03:01:28', '2025-06-01 03:01:28'),
(209, 'RSUD Kota Bogor', 'Jl. DR. Sumeru No.120, Menteng, Bogor Bar., Kota Bogor', '(0251) 8312292', 'https://rsud.kotabogor.go.id/', 184, 'RSUD Pemkot Bogor (ID 184 Kota Bogor)', '2025-06-01 03:01:28', '2025-06-01 03:01:28'),
(210, 'RS Mitra Keluarga Bekasi', 'Jl. Jend. Ahmad Yani, Kayuringin Jaya, Bekasi Sel., Kota Bekasi', '(021) 8853333', 'https://mitrakeluarga.com/', 183, 'RS Swasta (ID 183 Kota Bekasi)', '2025-06-01 03:01:28', '2025-06-01 03:01:28'),
(211, 'RS Panti Wilasa Citarum Semarang', 'Jl. Citarum No.98, Mlatiharjo, Semarang Tim., Kota Semarang', '(024) 3542224', 'https://www.pantwilasa-citarum.com/', 222, 'RS Swasta Kristen (ID 222 Kota Semarang)', '2025-06-01 03:01:28', '2025-06-01 03:01:28'),
(212, 'RS Dr. Oen Solo Baru', 'Komplek Perumahan Solo Baru, Madegondo, Grogol, Kabupaten Sukoharjo', '(0271) 620220', 'https://droensolobaru.com/', 214, 'RS Swasta di Sukoharjo (ID 214 Kab. Sukoharjo, dekat Solo)', '2025-06-01 03:01:28', '2025-06-01 03:01:28'),
(213, 'RSUD Banyumas', 'Jl. Rumah Sakit No.1, Kejawar, Banyumas, Kabupaten Banyumas', '(0281) 796031', 'https://rsudbanyumas.banyumaskab.go.id/', 191, 'RSUD Pemkab Banyumas (ID 191 Kab. Banyumas)', '2025-06-01 03:01:28', '2025-06-01 03:01:28'),
(214, 'RS PKU Muhammadiyah Yogyakarta', 'Jl. KH. Ahmad Dahlan No.20, Ngupasan, Gondomanan, Kota Yogyakarta', '(0274) 512653', 'https://pkujogja.com/', 229, 'RS Muhammadiyah (ID 229 Kota Yogyakarta)', '2025-06-01 03:01:28', '2025-06-01 03:01:28'),
(215, 'RSUP Dr. Soeradji Tirtonegoro Klaten (Jarak dekat ke Jogja, tapi masuk Jateng)', 'Jl. KRT Dr. Soeradji Tirtonegoro No.1, Tegalyoso, Klaten Sel., Kabupaten Klaten', '(0272) 321054', 'https://rssuradji.co.id', 203, 'RS Vertikal Kemenkes (ID 203 Kab. Klaten, Jateng)', '2025-06-01 03:01:28', '2025-06-01 03:01:28'),
(216, 'RSUD Prambanan Sleman', 'Jl. Prambanan – Piyungan Km. 7, Jobohan, Bokoharjo, Prambanan, Kabupaten Sleman', '(0274) 496002', 'https://rsudprambanan.slemankab.go.id/', 228, 'RSUD Pemkab Sleman (ID 228 Kab. Sleman)', '2025-06-01 03:01:28', '2025-06-01 03:01:28'),
(217, 'RS PHC Surabaya', 'Jl. Prapat Kurung Sel. No.1, Perak Utara, Pabean Cantian, Kota Surabaya', '(031) 3294801', 'https://rsphc.co.id/', 281, 'Rumah Sakit Pelabuhan (ID 281 Kota Surabaya)', '2025-06-01 03:01:28', '2025-06-01 03:01:28'),
(218, 'RS Lavalette Malang', 'Jl. WR Supratman No.10, Rampal Celaket, Klojen, Kota Malang', '(0341) 470805', 'https://lavalettehospital.com/', 277, 'Rumah Sakit PTPN X (ID 277 Kota Malang)', '2025-06-01 03:01:28', '2025-06-01 03:01:28'),
(219, 'RSUD Kanjuruhan Kepanjen Malang', 'Jl. Panji No.100, Penarukan, Kepanjen, Kabupaten Malang', '(0341) 395041', 'https://rsudkanjuruhan.malangkab.go.id/', 257, 'RSUD Pemkab Malang (ID 257 Kab. Malang)', '2025-06-01 03:01:28', '2025-06-01 03:01:28'),
(220, 'RS Bali Mandara', 'Jl. Bypass Ngurah Rai No.548, Sanur Kauh, Denpasar Selatan, Kota Denpasar', '(0361) 4490566', 'https://rsbm.baliprov.go.id/', 75, 'RSUD Provinsi Bali (ID 75 Kota Denpasar)', '2025-06-01 03:01:28', '2025-06-01 03:01:28'),
(221, 'RSUD Mangusada Badung', 'Jl. Raya Kapal, Kapal, Mengwi, Kabupaten Badung', '(0361) 9006813', 'https://rsudmangusada.badungkab.go.id/', 76, 'RSUD Pemkab Badung (ID 76 Kab. Badung)', '2025-06-01 03:01:28', '2025-06-01 03:01:28'),
(222, 'RSUD Inche Abdoel Moeis Samarinda', 'Jl. HAMM Rifadin, Loa Janan Ilir, Kota Samarinda', '(0541) 738181', 'https://rsudmoeis.kaltimprov.go.id/', 99, 'RSUD Provinsi Kaltim (ID 99 Kota Samarinda)', '2025-06-01 03:01:28', '2025-06-01 03:01:28'),
(223, 'RS Siloam Hospitals Balikpapan', 'Jl. MT Haryono Dalam No.23, Gn. Bahagia, Balikpapan Sel., Kota Balikpapan', '(0542) 8862999', 'https://www.siloamhospitals.com/', 100, 'RS Swasta (ID 100 Kota Balikpapan)', '2025-06-01 03:01:28', '2025-06-01 03:01:28'),
(224, 'RS Stella Maris Makassar', 'Jl. Somba OPU No.273, Maloku, Ujung Pandang, Kota Makassar', '(0411) 854321', 'https://rsstellamaris.com/', 123, 'RS Swasta Katolik (ID 123 Kota Makassar)', '2025-06-01 03:01:28', '2025-06-01 03:01:28'),
(225, 'RSUD Syekh Yusuf Gowa', 'Jl. Dr. Wahidin Sudirohusodo No.46, Sungguminasa, Somba Opu, Kabupaten Gowa', '(0411) 866255', 'https://rsudsyekhyusuf.gowakab.go.id/', 124, 'RSUD Pemkab Gowa (ID 124 Kab. Gowa)', '2025-06-01 03:01:28', '2025-06-01 03:01:28'),
(226, 'RS Provita Jayapura', 'Jl. Dr. Sam Ratulangi No.38, Bhayangkara, Jayapura Utara, Kota Jayapura', '(0967) 531179', 'https://rsprovita.com/', 143, 'RS Swasta (ID 143 Kota Jayapura)', '2025-06-01 03:01:28', '2025-06-01 03:01:28'),
(227, 'RS Mitra Masyarakat Mimika (RSMM)', 'Jl. Yos Sudarso, Timika Jaya, Mimika Baru, Kabupaten Mimika', '(0901) 3126900', 'https://www.rsmm.co.id/', 145, 'RS yang dikelola oleh Yayasan Pemberdayaan Masyarakat Amungme dan Kamoro (YPMAK) (ID 145 Kab. Mimika)', '2025-06-01 03:01:28', '2025-06-01 03:01:28'),
(230, 'RS Hermina Purwokerto', 'Jl. Yos Sudarso, Karangpucung, Purwokerto Selatan, Kabupaten Banyumas, Jawa Tengah 53142', '(0281) 7772525', 'https://herminahospitals.com/id/hospitals/purwokerto', 191, 'Bagian dari jaringan RS Hermina.', '2025-06-01 16:54:55', '2025-06-01 16:54:55');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('DEFKJxDrHyLYiDlaDOSmkFC9bvXunVEPBrtE7gpH', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/137.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiNFZSUzdHaDlIOXN4Q2NCN0poajhSNlhESWhKWlk1ZFh2Rkhadzk0SyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1750033305),
('jUrr4Xc1fTg6a2QNb9HUpYRY35DDhAjieicHxKxl', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/137.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoibG5UNGZXWHBqY2VGRkxqU0wxYWpQSDlRdWgyTGFJVEhhU3l0ZUhYNyI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJuZXciO2E6MDp7fXM6Mzoib2xkIjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMCI7fX0=', 1750035739);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `role`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin@ispasistem.com', '2025-05-31 06:14:20', '$2y$12$6NLVmJgmr/kVbIGaTJ7llePZtbjmOr5WbG6bk7EK73xdQUgXgkhXW', 'admin', 'qGQgUDqqPFUZkczTYPKwcYLVb6dO47g6DhzCLTnNfdli5m0bIDFsGKJ3IQls', '2025-05-31 06:14:20', '2025-06-01 00:59:58'),
(3, 'pakar', 'pakar@ispasistem.com', NULL, '$2y$12$uIeS7Sm9yQwYEstpbClH5uRNMiWVlQr11vGSWQ7h0ptCNYgjSyYNq', 'pakar', NULL, '2025-05-31 07:10:02', '2025-05-31 07:10:43'),
(7, 'Pakar 2', 'pakar@pakar.com', NULL, '$2y$12$fFxTOM6Q6t4Em8BEelfJD.NXRjX5SlaehjdcVBIYsDkPAb8yWEMNu', 'pakar', NULL, '2025-06-01 04:14:05', '2025-06-01 04:14:05'),
(8, 'Daiva Paundra Gevano', 'daiva3paundra@gmail.com', NULL, '$2y$12$vl7K.3B3rvqlLMjUxgYFReNf.EbqwjoojfSRJr4vtnfLoqELBvVIW', 'user', NULL, '2025-06-01 04:19:10', '2025-06-01 04:19:10'),
(9, 'ebel', 'ebelandini@gmail.com', NULL, '$2y$12$o9OOYYdrpHqCs.hxuyqR7eCCP3yqdEI2XU0ANWQmW485I5ZZ9MdfK', 'user', NULL, '2025-06-01 05:22:54', '2025-06-01 05:22:54'),
(10, 'Pakar ISPA', 'pakar@gmail.com', NULL, '12345678', 'pakar', NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `artikels`
--
ALTER TABLE `artikels`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `aturan_ispa`
--
ALTER TABLE `aturan_ispa`
  ADD PRIMARY KEY (`id`),
  ADD KEY `aturan_ispa_id_gejala_sekarang_index` (`id_gejala_sekarang`),
  ADD KEY `aturan_ispa_id_gejala_selanjutnya_index` (`id_gejala_selanjutnya`),
  ADD KEY `aturan_ispa_id_penyakit_hasil_index` (`id_penyakit_hasil`);

--
-- Indexes for table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `diagnosas`
--
ALTER TABLE `diagnosas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `diagnosas_diagnosa_id_index` (`diagnosa_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `feedbacks`
--
ALTER TABLE `feedbacks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gejala`
--
ALTER TABLE `gejala`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `gejala_kode_gejala_unique` (`kode_gejala`);

--
-- Indexes for table `hasil_diagnosa`
--
ALTER TABLE `hasil_diagnosa`
  ADD PRIMARY KEY (`id`),
  ADD KEY `hasil_diagnosa_user_id_foreign` (`user_id`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kabupatens`
--
ALTER TABLE `kabupatens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `kabupatens_nama_kabupaten_provinsi_id_unique` (`nama_kabupaten`,`provinsi_id`),
  ADD KEY `kabupatens_provinsi_id_foreign` (`provinsi_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `penyakit`
--
ALTER TABLE `penyakit`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `penyakit_kode_penyakit_unique` (`kode_penyakit`);

--
-- Indexes for table `provinsis`
--
ALTER TABLE `provinsis`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `provinsis_nama_provinsi_unique` (`nama_provinsi`);

--
-- Indexes for table `rumah_sakits`
--
ALTER TABLE `rumah_sakits`
  ADD PRIMARY KEY (`id`),
  ADD KEY `rumah_sakits_kabupaten_id_foreign` (`kabupaten_id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `artikels`
--
ALTER TABLE `artikels`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=87;

--
-- AUTO_INCREMENT for table `aturan_ispa`
--
ALTER TABLE `aturan_ispa`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;

--
-- AUTO_INCREMENT for table `diagnosas`
--
ALTER TABLE `diagnosas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `feedbacks`
--
ALTER TABLE `feedbacks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `gejala`
--
ALTER TABLE `gejala`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT for table `hasil_diagnosa`
--
ALTER TABLE `hasil_diagnosa`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `kabupatens`
--
ALTER TABLE `kabupatens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=282;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `penyakit`
--
ALTER TABLE `penyakit`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `provinsis`
--
ALTER TABLE `provinsis`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `rumah_sakits`
--
ALTER TABLE `rumah_sakits`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=234;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `hasil_diagnosa`
--
ALTER TABLE `hasil_diagnosa`
  ADD CONSTRAINT `hasil_diagnosa_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `kabupatens`
--
ALTER TABLE `kabupatens`
  ADD CONSTRAINT `kabupatens_provinsi_id_foreign` FOREIGN KEY (`provinsi_id`) REFERENCES `provinsis` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `rumah_sakits`
--
ALTER TABLE `rumah_sakits`
  ADD CONSTRAINT `rumah_sakits_kabupaten_id_foreign` FOREIGN KEY (`kabupaten_id`) REFERENCES `kabupatens` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
