-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 08, 2020 at 03:11 AM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 5.6.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rpl_olshop`
--

-- --------------------------------------------------------

--
-- Table structure for table `alamat`
--

CREATE TABLE `alamat` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `provinsi` varchar(128) NOT NULL,
  `kota` varchar(128) NOT NULL,
  `kecamatan` varchar(128) NOT NULL,
  `jalan` varchar(128) NOT NULL,
  `tempat` varchar(128) NOT NULL,
  `kodepos` int(11) NOT NULL,
  `telp` varchar(128) NOT NULL,
  `active` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `alamat`
--

INSERT INTO `alamat` (`id`, `id_user`, `provinsi`, `kota`, `kecamatan`, `jalan`, `tempat`, `kodepos`, `telp`, `active`) VALUES
(1, 2, 'Banten', 'Tangsel', 'Ciputat Timur', 'jl delima', 'kantor', 15412, '0895320298734', 1),
(2, 2, 'banten', 'tangsel', 'ciputat timur', 'jl bulak raya', 'rumah1', 15412, '0882671273612', 0),
(3, 2, 'Banten', 'Tangerang', 'jatiwarnign', 'jl jalan', 'rumah2', 15412, '087217266271', 0),
(4, 5, 'Banten', 'tangsel', 'ciputat', 'jl jalan', 'kantor', 16534, '087891286322', 0);

-- --------------------------------------------------------

--
-- Table structure for table `ceritanya_bank`
--

CREATE TABLE `ceritanya_bank` (
  `id` int(11) NOT NULL,
  `nama` varchar(128) NOT NULL,
  `no_rek` varchar(128) NOT NULL,
  `atas_nama` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ceritanya_bank`
--

INSERT INTO `ceritanya_bank` (`id`, `nama`, `no_rek`, `atas_nama`) VALUES
(1, 'BRI', '123890213', 'pink label'),
(2, 'BNI', '84391287', 'pink label'),
(3, 'BCA', '12312322', 'pink label');

-- --------------------------------------------------------

--
-- Table structure for table `checkout`
--

CREATE TABLE `checkout` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_alamat` int(11) NOT NULL,
  `id_bank` int(11) NOT NULL,
  `total_harga_semua` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `tanggal` int(11) NOT NULL,
  `upload_bukti` int(1) NOT NULL,
  `bukti` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `checkout`
--

INSERT INTO `checkout` (`id`, `id_user`, `id_alamat`, `id_bank`, `total_harga_semua`, `status`, `tanggal`, `upload_bukti`, `bukti`) VALUES
(17, 2, 3, 2, 110000, 3, 0, 1, 'bukti_2_17.png'),
(19, 5, 4, 1, 690000, 1, 0, 1, 'bukti_5_19.png'),
(20, 2, 1, 3, 20000, 1, 0, 1, 'bukti_2_20.png');

-- --------------------------------------------------------

--
-- Table structure for table `kategori_produk`
--

CREATE TABLE `kategori_produk` (
  `id` int(11) NOT NULL,
  `kategori` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kategori_produk`
--

INSERT INTO `kategori_produk` (`id`, `kategori`) VALUES
(1, 'Atasan'),
(2, 'Bawahan'),
(3, 'Hijab');

-- --------------------------------------------------------

--
-- Table structure for table `keranjang`
--

CREATE TABLE `keranjang` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_produk` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `total_harga` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `keranjang`
--

INSERT INTO `keranjang` (`id`, `id_user`, `id_produk`, `jumlah`, `total_harga`) VALUES
(1, 11, 4, 1, 340000);

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `id` int(11) NOT NULL,
  `id_checkout` int(11) NOT NULL,
  `foto` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE `produk` (
  `id` int(11) NOT NULL,
  `nama` varchar(128) NOT NULL,
  `id_sub_kategori` int(11) NOT NULL,
  `stok` int(11) NOT NULL,
  `harga` int(11) NOT NULL,
  `deskripsi` varchar(1000) NOT NULL,
  `gambar` varchar(128) NOT NULL,
  `sale` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`id`, `nama`, `id_sub_kategori`, `stok`, `harga`, `deskripsi`, `gambar`, `sale`) VALUES
(1, 'TUNIK ZANIA CREAM', 1, 10, 250000, 'Tampil gaya dengan atasan simple and elegant, pergelangan ada karetnya, memiliki ziper di belakang dan ada variasi di depan, bisa dipadankan dengan kulot atau pun skirt favorit kamu.', 'Tunikzinniacream.jpg', 0),
(2, 'TUNIK AZNI COFFEE', 1, 10, 255000, 'Tampil gaya dengan atasan simple and elegant, memiliki ziper di belakang dan ada variasi warna di bagian bawah dan lengan bawah, bisa dipadankan dengan kulot atau pun skirt favorit kamu.', 'Tunikaznicoffee.jpg', 1),
(3, 'JAKET ELMA', 2, 20, 195000, 'Model yang dirancang lebih baik untuk hijabers lengkap dengan finger style guna melindungi tangan yang semakin nyaman dipakai dan lebih elegan.', 'elma.jpg', 1),
(4, 'JAKET QADIRA', 2, 30, 235000, 'Model yang dirancang lebih baik untuk hijabers lengkap dengan finger style guna melindungi tangan yang semakin nyaman dipakai dan lebih elegan.', 'qadira.jpg', 0),
(6, 'TUNIK ZINNIA CHOCO', 1, 20, 234000, 'Tampil gaya dengan atasan simple and elegant, pergelangan ada karetnya, memiliki ziper di belakang dan ada variasi di depan, bisa dipadankan dengan kulot atau pun skirt favorit kamu.', 'Tunikzinniachoco.jpg', 0),
(18, 'DRESS ARUNA LINE PURPLE', 1, 2, 310000, 'Dress ini memliki warna yang lucu, model outer menyatu dengan variasi garis dan tali yang dapat di lepas pasang ikatannya, tangan berbentuk lurus, tetep simple dan elegant buat ke acara resmi atau ke acara kajian juga, pokok nya simple dan stylish❤️', 'MM_84.1_-_Purple_400x.jpg', 0),
(20, 'JAKET GROOVY MARVELOUS', 2, 4, 225000, 'Model yang dirancang untuk hijaber bercita rasa fashion tinggi dengan tampilan super modis. Corak warna nyentrik yang memiliki 2 sisi berlawanan, semakin berbeda, semakin percaya diri.', 'Groovy_Marvelous.jpg', 0),
(21, 'KULOT AZKA BROWN', 3, 4, 181000, 'Tampil gaya dengan kulot simple and elegant, bisa dipadu padankan dengan atasan apa saja, dan karet di belakang pinggang.', 'KULOT_AZKA_BROWN.jpg', 0),
(22, 'SKIRT RAHMA DUSTY PINK', 3, 4, 185000, 'Tampil gaya dengan skirt simple and elegant, bisa dipadu padankan dengan atasan apa saja.', 'SKIRT_RAHMA_DUSTY_PINK.jpg', 0),
(23, 'JAKET JAPAN STREET BLACK', 2, 8, 195000, 'Model Hijacket yang dibuat khusus untuk hijabers pelancong alias traveler, terutama yang menyukai negeri matahari terbit. Jaket ini didesain dengan fitur ala Jepang banget yang trendy membuat penampilan kamu semakin kawaii. (｡◕‿◕｡)', 'JAKETJAPAN.jpg', 0),
(24, 'BELLISA PISKET', 3, 4, 254000, 'Rok Rajut ini memliki warna yang lucu, bahan plisket premium yang nyaman dan lentur, di bagian pinggang memakai karet, cocok dipake ke acara resmi atau santai, tetep simple dan elegant, pokok nya simple dan stylish❤️', 'BELLISA_PISKET.jpg', 0),
(25, 'SKIRT TRISHA LACE KNIT', 3, 10, 225000, 'Rok Rajut ini memliki warna yang lucu, bahan rajut yang nyaman dan lentur, di bagian pinggang memakai karet, ada variasi renda di bagian bawah, cocok dipake ke acara resmi atau santai, saat cuaca dingin atau panas tetep masuk, tetep simple dan elegant, pokok nya simple dan stylish❤️', 'SKIRT_TRISHA_LACE_KNIT.jpg', 0),
(26, 'PANTS NISSA GREEN', 4, 3, 125800, 'Tampil gaya dengan pants simple and elegant, bisa dipadu padankan dengan atasan apa saja.', 'PANTS_NISSA_GREEN.jpg', 0),
(27, 'HIJAB PLAIN VOAL LIGHT SALMON', 6, 2, 69500, 'Voal hijab square ini dijamin bahan nya nyaman dan mudah di atur banget karna terbuat dari voal Import pilihan yg biasa di pakai print, tapi kita bikin nya warna-warna polos yg pastel n simple. Wajib punya semua ya sis, karna pasti akan kepake di semua kesempatan.', 'HIJAB_PLAIN_VOAL_LIGHT_SALMON.jpg', 0),
(28, 'HIJAB SQUARE CORNSKIN CREAM', 6, 3, 69500, 'Cornskin hijab square ini dijamin bahan nya nyaman dan mudah di atur banget karna terbuat dari bahan Cornskin Import pilihan. Wajib punya semua warna ya sis, karna pasti akan kepake di semua kesempatan.', 'HIJAB_SQUARE_CORNSKIN_CREAM.jpg', 0),
(29, 'PASHMINA VOAL BLUE DENIM', 7, 3, 69000, 'Voal hijab pashmina ini dijamin bahan nya nyaman dan mudah di atur banget karna terbuat dari voal Import pilihan yg biasa di pakai print, tapi kita bikin nya warna-warna polos yg pastel n simple. Wajib punya semua ya sis, karna pasti akan kepake di semua kesempatan.', 'PASHMINA_VOAL_BLUE_DENIM.jpg', 0),
(30, 'PASHMINA VOAL LIGHT SALMON', 7, 2, 69000, 'Voal hijab pashmina ini dijamin bahan nya nyaman dan mudah di atur banget karna terbuat dari voal Import pilihan yg biasa di pakai print, tapi kita bikin nya warna-warna polos yg pastel n simple. Wajib punya semua ya sis, karna pasti akan kepake di semua kesempatan.', 'PASHMINA_VOAL_LIGHT_SALMON.jpg', 0),
(31, 'HIJAB SQUARE CORNSKIN SOFT PURPLE', 6, 4, 69000, 'Cornskin hijab square ini dijamin bahan nya nyaman dan mudah di atur banget karna terbuat dari bahan Cornskin Import pilihan. Wajib punya semua warna ya sis, karna pasti akan kepake di semua kesempatan.', 'HIJAB_SQUARE_CORNSKIN_SOFT_PURPLE.jpg', 0),
(32, 'HIJAB SIGNATURE SCARF LAYLA', 5, 2, 125000, 'Perpaduan warna navy, ditambah dengan corak motif kekinian, bikin “Layla Scarf” dari mimamim.com ini jadi salah satu hijab yg wajib di punya deh, warna hijab nya sangat fleksibel masuk k warna baju apa aja.. yg suka earth tone wajib koleksi donk, beneran cantik banget????', 'HIJAB_SIGNATURE_SCARF_LAYLA.jpg', 0),
(33, 'HIJAB SIGNATURE SCARF FANY', 5, 4, 125000, 'Perpaduan warna light grey, ditambah dengan corak motif kekinian, bikin “Fany Scarf” dari mimamim.com ini jadi salah satu hijab yg wajib di punya deh, warna hijab nya sangat fleksibel masuk k warna baju apa aja.. yg suka earth tone wajib koleksi donk, beneran cantik banget????', 'HIJAB7.jpg', 0),
(34, 'DRESS MARISA CREAM BROWN', 1, 3, 347600, 'Tampil gaya dengan gamis muslim simple and elegant, ada variasi garis di ujung tangan, zipper di belakang pundak, model outer menyatu. Padankan dengan sepatu hak tinggi warna natural.\r\n', 'DRESS_MARISA_CREAM_BROWN.jpg', 0),
(35, 'DRESS AILEEN DUSTY PINK', 1, 3, 347600, 'Tampil gaya dengan dress casual, simple and elegant, zipper di belakang, variasi layer dibadan.Padankan dengan sepatu hak tinggi warna natural. High Quality, Syar''i dan Casual.', 'DRESS_AILEEN_DUSTY_PINK.jpg', 0),
(36, 'PANTS NISSA BLUE', 4, 2, 127500, 'Tampil gaya dengan pants simple and elegant, bisa dipadu padankan dengan atasan apa saja.\r\n', 'PANTS_NISSA_BLUE.jpg', 0),
(37, 'PANTS NISSA DUSTY PINK', 4, 3, 127500, 'Tampil gaya dengan pants simple and elegant, bisa dipadu padankan dengan atasan apa saja.', 'PANTS_NISSA_DUSTY_PINK.jpg', 0),
(38, 'JAKET BASIC GRAY RED', 2, 3, 170000, 'Tampil lebih fashionable dan tetap syar’i dengan jaket hijab rancangan pertama dari seri Hijacket® yang bergaya simple khas Eropa, didesain khusus untuk hijabers Indonesia.', 'JAKET_BASIC_GRAY_RED.jpg', 0),
(40, 'DRESS INDANA COFFEE', 1, 4, 287000, 'Tampil gaya dengan gamis muslim simple and elegant, warna yang soft,, sleting depan, bagian pergelangan tangan di serut, variasi outer menyatu dan ada talinya. Padankan dengan sepatu hak tinggi warna natural.\r\n', 'DRESS_INDANA_COFFEE.jpg', 0);

-- --------------------------------------------------------

--
-- Table structure for table `produk_checkout`
--

CREATE TABLE `produk_checkout` (
  `id` int(11) NOT NULL,
  `id_checkout` int(11) NOT NULL,
  `id_produk` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `total_harga` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `produk_checkout`
--

INSERT INTO `produk_checkout` (`id`, `id_checkout`, `id_produk`, `jumlah`, `total_harga`) VALUES
(4, 15, 2, 2, 700000),
(5, 17, 1, 1, 100000),
(6, 18, 5, 1, 120000),
(7, 19, 4, 2, 680000),
(8, 20, 8, 1, 10000);

-- --------------------------------------------------------

--
-- Table structure for table `status_checkout`
--

CREATE TABLE `status_checkout` (
  `id` int(11) NOT NULL,
  `nama_status` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `status_checkout`
--

INSERT INTO `status_checkout` (`id`, `nama_status`) VALUES
(1, 'belum dibayar'),
(2, 'telah dibayar'),
(3, 'telah dikirim'),
(4, 'telah diterima');

-- --------------------------------------------------------

--
-- Table structure for table `sub_kategori_produk`
--

CREATE TABLE `sub_kategori_produk` (
  `id` int(11) NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `sub_kategori` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sub_kategori_produk`
--

INSERT INTO `sub_kategori_produk` (`id`, `id_kategori`, `sub_kategori`) VALUES
(1, 1, 'gaun'),
(2, 1, 'jaket'),
(3, 2, 'rok'),
(4, 2, 'jeans'),
(5, 3, 'klasik'),
(6, 3, 'modern'),
(7, 3, 'pashmina');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `email` varchar(128) NOT NULL,
  `password` varchar(256) NOT NULL,
  `nama` varchar(128) NOT NULL,
  `gambar` varchar(128) NOT NULL,
  `tanggal` int(11) NOT NULL,
  `aktif` int(1) NOT NULL,
  `role_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `nama`, `gambar`, `tanggal`, `aktif`, `role_id`) VALUES
(1, 'admin@admin.com', '$2y$10$GW3RhCmQTzlQ7eLsw8YaF./y2REwW2YdDHlpUQOalZzcqoLG3Ci56', 'admin', 'default.png', 1575904079, 1, 1),
(2, 'wahyunurarizky@gmail.com', '$2y$10$8GMwvq8XJgFbvVV5amrrV.WkPzFyInUPjCEhOaoKRjV5QqLxKz8gm', 'wahyu nur arizky', 'default.png', 1575904290, 1, 2),
(3, 'kosong', '$2y$10$R8BI1MA2xwGJhm3XV.wrTO3rM3iYdOE159FK2tKDxwZ.uHnn67bHm', 'tamu', 'default.png', 1575904290, 1, 3),
(4, 'user2@gmail.com', '$2y$10$AWW97QP7lI8vSoHDTDc1HuYPTlxFWUjMZCsZVQsN8cb4cS/jwfFVG', 'user2', 'default.png', 1578313201, 1, 2),
(11, 'israhayu23@gmail.com', '$2y$10$vK7zkjFjAi488rgEvKkwFO1tp3KV1AWvroNp2nCA0VhbcI3SMNWR.', 'Indri Sukmawati Rahayu', 'default.png', 1578322207, 1, 2),
(12, 'lenovoyoga@gamil.com', '$2y$10$ZxhZmIdADRsPFhDrrTyNZOZoJmCl23uJx8qvWYULBYD10XBGTAqfu', 'Lenovo Yoga', 'default.png', 1578384082, 1, 2),
(13, 'israhayuuuu@gmail.com', '$2y$10$rEPHet.fGFoezO637IyOwO4Q8K/2njBQiGFtQy0h0D40S2Gw6s3Ri', 'Indri Rahayu', 'default.png', 1578384210, 1, 2),
(14, 'rahayu@gmail.com', '$2y$10$RwjPw4kgJLHWdzXxJcQBE.AyoOoP0U0.umXk92P6eraKIIDdMcVgm', 'Rahayu Putri', 'default.png', 1578389702, 1, 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `alamat`
--
ALTER TABLE `alamat`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ceritanya_bank`
--
ALTER TABLE `ceritanya_bank`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `checkout`
--
ALTER TABLE `checkout`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kategori_produk`
--
ALTER TABLE `kategori_produk`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `keranjang`
--
ALTER TABLE `keranjang`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `produk_checkout`
--
ALTER TABLE `produk_checkout`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `status_checkout`
--
ALTER TABLE `status_checkout`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sub_kategori_produk`
--
ALTER TABLE `sub_kategori_produk`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `alamat`
--
ALTER TABLE `alamat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `ceritanya_bank`
--
ALTER TABLE `ceritanya_bank`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `checkout`
--
ALTER TABLE `checkout`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `kategori_produk`
--
ALTER TABLE `kategori_produk`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `keranjang`
--
ALTER TABLE `keranjang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `produk`
--
ALTER TABLE `produk`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;
--
-- AUTO_INCREMENT for table `produk_checkout`
--
ALTER TABLE `produk_checkout`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `status_checkout`
--
ALTER TABLE `status_checkout`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `sub_kategori_produk`
--
ALTER TABLE `sub_kategori_produk`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
