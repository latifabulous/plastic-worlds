-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 21 Sep 2020 pada 11.21
-- Versi server: 10.4.6-MariaDB
-- Versi PHP: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `plasticworld`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `nama_admin` varchar(128) NOT NULL,
  `username_admin` varchar(128) NOT NULL,
  `email_admin` varchar(128) NOT NULL,
  `gambar_admin` varchar(128) NOT NULL,
  `password_admin` varchar(128) NOT NULL,
  `is_active_admin` int(1) NOT NULL,
  `id_role` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`id_admin`, `nama_admin`, `username_admin`, `email_admin`, `gambar_admin`, `password_admin`, `is_active_admin`, `id_role`) VALUES
(1, 'Na Jaemin', 'admin', 'admin@gmail.com', 'EWPr2J9XgAM2Fy6.png', 'b0baee9d279d34fa1dfd71aadb908c3f', 1, 1),
(2, 'Nur Izza Latifah', 'ltfff.s', 'n.latifab@gmail.com', 'x.jpg', 'b0baee9d279d34fa1dfd71aadb908c3f', 1, 1),
(3, 'Tazkiya Aulia Rachman', 'kiyot', 'kiykiy@gmail.com', 'kiya.jpg', 'b0baee9d279d34fa1dfd71aadb908c3f', 1, 1),
(4, 'L. Risman Ardiansyah', 'risemans', 'risman@gmail.com', 'risman.jpg', 'b0baee9d279d34fa1dfd71aadb908c3f', 1, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `artikel`
--

CREATE TABLE `artikel` (
  `id_artikel` int(11) NOT NULL,
  `judul_artikel` varchar(128) NOT NULL,
  `gambar_artikel` varchar(128) NOT NULL,
  `desc_artikel` text NOT NULL,
  `date_created_artikel` varchar(128) NOT NULL,
  `isi_artikel` text NOT NULL,
  `id_komunitas` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `artikel`
--

INSERT INTO `artikel` (`id_artikel`, `judul_artikel`, `gambar_artikel`, `desc_artikel`, `date_created_artikel`, `isi_artikel`, `id_komunitas`) VALUES
(5, 'Sebegini Parah Ternyata Masalah Sampah Plastik di Indonesia', 'artikel3.png', 'Masalah sampah plastik di Indonesia lagi-lagi menjadi sorotan publik.', '1591961014', '<p><span xss=removed>Masalah sampah plastik di <font color=\"#ff0000\">Indonesia</font> lagi-lagi menjadi sorotan publik. Melihat perkembangan masalah sampah plastik, agaknya pemerintah memang sudah harus mempercepat perbaikan sistem pengelolaannya.</span><br xss=removed><br xss=removed><span xss=removed>Berdasarkan penelitian yang dilakukan oleh Jenna R. Jambeck dari University of Georgia, pada tahun 2010 ada 275 juta ton sampah plastik yang dihasilkan di seluruh dunia. Sekitar 4,8-12,7 juta ton diantaranya terbuang dan mencemari laut.</span><br xss=removed><br xss=removed><span xss=removed>Indonesia memiliki populasi pesisir sebesar 187,2 juta yang setiap tahunnya menghasilkan 3,22 juta ton sampah plastik yang tak terkelola dengan baik. Sekitar 0,48-1,29 juta ton dari sampah plastik tersebut diduga mencemari lautan.</span></p>', 1),
(6, 'Pentingnya Mengolah Sampah Plastik', 'artikel2.png', 'Sampah kamu jahat :)', '1591961189', '<p xss=removed><img src=\"http://localhost/PlasticWorld/assets/img/artikel/Annotation_2020-06-12_192519.jpg\" xss=removed><span xss=removed><br></span></p><p><span xss=removed><br></span></p><p><span xss=removed>Sampah plastik menjadi masalah global yang dewasa ini mendapat perhatian lebih dari banyak negara. Sebagai material yang butuh waktu lama untuk terurai, produk berbahan plastik akan terus ada dan menumpuk di dunia dalam waktu yang lama. Berdasarkan laporan United Nations Environment Programme (UNEP) tentang plastik sekali pakai, lebih dari 400 juta ton plastik diproduksi pada 2015. Dari jumlah tersebut, 36 persen di antaranya untuk kantong kemasan sekali pakai yang kerap kita temui setiap hari. Jumlah sampah plastik yang ada di dunia saat ini sudah mencapai angka 300 juta ton dalam setahun. Mengutip dari BBC (8/8/2019), jumlah sampah plastik sebanyak ini jika dipadatkan akan sama dengan 10 kali keliling bumi. Berangkat dari masalah tersebut, lebih dari 60 negara mengambil langkah praktis dengan melakukan pembatasan penggunaan sampah plastik. Ada yang melakukan pelarangan total, ada juga yang partial lewat pengenaan cukai, seperti yang dilakukan Indonesia. Dampaknya sendiri bisa dibilang cukup signifikan. Menurut Head of UN Environment Erik Solheim, Rwanda, negara yang menjadi pionir pelarangan kantong plastik sekali pakai, saat ini menjadi salah satu negara paling bersih di dunia. Meski begitu, tidak lantas pelarangan plastik menjadi solusi pemungkas. Solheim bahkan melabeli plastik sebagai \"material ajaib\" yang \'jasa\'nya sudah banyak bagi dunia, sehingga kebiasaan manusialah yang lebih penting untuk berubah. \"Plastik bukanlah masalah. Persoalannya adalah apa yang kita lakukan dengan itu dan itu berarti tanggung jawabnya ada di kita untuk lebih bijaksana dalam menggunakan material ajaib ini,\" tuturnya. Berdasarkan kesimpulan dari laporan yang sama, pelarangan plastik idealnya perlu diimbangi dengan pengelolaan sampah dan insentif finansial untuk mengubah kebiasaan konsumen dan pelaku industri, sehingga nantinya dapat didorong terbentuknya model sirkular dalam produksi plastik, dari sampah plastik kembali menjadi plastik lagi. Laporan asosiasi manufaktur plastik, PlasticsEurope, juga menyebutkan, “Di akhir masa hidupnya, plastik masih menjadi sumber daya yang sangat berharga, karena bisa diubah menjadi bahan baku baru atau menjadi energi.\" Dalam model sirkular produksi plastik, pada fase pemakaian, plastik bisa dipakai berulang kali sebelum sepenuhnya menjadi sampah. Saat menjadi sampah pun plastik punya tiga alternatif konversi, yakni bisa menjadi sumber energi, bisa menjadi campuran bahan baku kimiawi ataupun bahan baku untuk pengolahan mekanis. Langkah-langkah penanggulangan ulang plastik inilah yang dilihat sebagai solusi untuk permasalahan plastik. Pada praktiknya, negara-negara di Eropa juga mulai menerapkan skema reproduksi dari sampah plastik. Masih merujuk data yang dipaparkan PlasticsEurope, dari total 27,1 juta ton sampah plastik yang dikumpulkan di Benua Biru pada tahun 2016, sebesar 31,1 persen didaur ulang dan 41,6 persen diolah menjadi energi. Ini membuat hanya sekitar 27,3 persen sampah plastik yang ditumpuk di tempat pembuangan akhir.</span><br xss=removed><br></p>', 1),
(7, 'Menilik Sampah Plastik yang Makin Pelik', 'artikel1.png', 'Plastik itu berbahaya untukku, kamu, dan mereka', '1591961436', '<p xss=removed><span xss=removed>Terima atau tidak, manusia bertanggung jawab pada tingginya polusi sampah plastik di dunia. Coba tengok, hampir seluruh benda yang akrab dengan kehidupan sehari-hari tak terlepas dari unsur polimer tersebut. Sampah plastik yang tidak dikelola dengan baik dan ditempatkan ditempat yang tepat pastinya akan menimbulkan dampak buruk bagi lingkungan. Bukan cuma daratan, tapi juga lautan. </span></p><p><span xss=removed><br></span></p><p><span xss=removed>Tak sedikit hewan-hewan laut dihtemukan terluka bahkan sialnya mati lantaran tak sengaja memakan plastik-plastik yang mereka kira makanan. Seperti yang terjadi baru-baru ini, Selasa (2/4/2019). Seekor paus sperma sepanjang delapan meter yang sedang hamil ditemukan mati di Sardinia, Italia. Nahasnya, ketika perut hewan mamalia tersebut dibedah, tim ilmuwan menemukan 22 kilogram sampah plastik ada di dalamnya. Disorot dunia Memang, krisis sampah plastik semakin menjadi sorotan di seluruh dunia.</span></p><p><span xss=removed>Berbagai imbauan untuk menjaga kelestarian lingkungan pun terus digalakkan. Namun, ibarat pepatah, sebesar-besarnya bumi, ditampar tak kena, upaya tersebut sepertinya kurang mempan. Malah tak jarang hanya menjadi retorika belaka, seperti yang terjadi di Indonesia, misalnya. Soal pengelolaan limbah plastik, Indonesia bisa dikatakan salah satu yang terburuk di dunia. Ini terungkap dari hasil studi Jambeck tahun 2015 yang dimuat pada laman Our World in Data. Sebanyak lebih dari tiga juta ton sampah plastik Indonesia masuk ke lautan tiap tahunnya. Bahkan, dari sumber tersebut, Indonesia dicap sebagai penyumbang sampah plastik terbesar kedua di dunia setelah Cina. Tentu ini bukanlah hal yang patut dibanggakan, bukan?</span></p>', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `event`
--

CREATE TABLE `event` (
  `id_event` int(11) NOT NULL,
  `nama_event` varchar(128) NOT NULL,
  `gambar_event` varchar(128) NOT NULL,
  `tanggal_event` varchar(128) NOT NULL,
  `tempat_event` varchar(256) NOT NULL,
  `waktu_event` varchar(128) NOT NULL,
  `kuota` int(11) NOT NULL,
  `desc_event` text NOT NULL,
  `id_komunitas` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `event`
--

INSERT INTO `event` (`id_event`, `nama_event`, `gambar_event`, `tanggal_event`, `tempat_event`, `waktu_event`, `kuota`, `desc_event`, `id_komunitas`) VALUES
(17, 'Membersihkan Laut Senggigi', 'event1.png', '2020-06-25', 'Pantai Senggigi', '10:00', 49, 'Membersihkan laut sebagian dari iman, yaitu kebersihan, yuk ikut!', 1),
(18, 'Mataram Peteng', 'event2.png', '2020-03-28', 'Rumah Masing Masing', '00:00', 1000, 'Matikan segala energi yang tidak dibutuhkan, yuk ikut!', 4),
(19, 'Daur Fest', 'event3.png', '2020-06-30', 'Hotel Santika', '11:00', 100, 'Penasaran cara mendaur yang benar? yuk ikut!', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `join_event`
--

CREATE TABLE `join_event` (
  `id` int(11) NOT NULL,
  `id_event` int(11) NOT NULL,
  `id_masyarakat` int(11) NOT NULL,
  `seat` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `join_event`
--

INSERT INTO `join_event` (`id`, `id_event`, `id_masyarakat`, `seat`) VALUES
(11, 17, 10, 1);

--
-- Trigger `join_event`
--
DELIMITER $$
CREATE TRIGGER `kuota_event` AFTER INSERT ON `join_event` FOR EACH ROW BEGIN
	UPDATE event SET kuota = kuota-NEW.seat
    WHERE id_event = NEW.id_event;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `komunitas`
--

CREATE TABLE `komunitas` (
  `id_komunitas` int(11) NOT NULL,
  `nama_komunitas` varchar(128) NOT NULL,
  `username_komunitas` varchar(128) NOT NULL,
  `email_komunitas` varchar(128) NOT NULL,
  `gambar_komunitas` varchar(128) NOT NULL,
  `alamat_komunitas` varchar(256) NOT NULL,
  `pj_komunitas` varchar(128) NOT NULL,
  `desc_komunitas` text NOT NULL,
  `nohp_komunitas` varchar(12) NOT NULL,
  `password_komunitas` varchar(256) NOT NULL,
  `is_active_komunitas` int(1) NOT NULL,
  `date_created_komunitas` varchar(128) NOT NULL,
  `id_role` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `komunitas`
--

INSERT INTO `komunitas` (`id_komunitas`, `nama_komunitas`, `username_komunitas`, `email_komunitas`, `gambar_komunitas`, `alamat_komunitas`, `pj_komunitas`, `desc_komunitas`, `nohp_komunitas`, `password_komunitas`, `is_active_komunitas`, `date_created_komunitas`, `id_role`) VALUES
(1, 'Exo-l Peduli', 'exol.peduli', 'exo.peduli@gmail.com', '37cd4defb8cfb564962cf359f2053016.png', 'Jalan bung karno', 'Nur Izza Latifah', 'Komunitas pecinta alam lingkungan hehehehehhe', '087704620821', '180bf89b5c0df35557ee2c19a96a4188', 1, '0', 3),
(4, 'Earth Hour', 'eh.mtr', 'eh@gmail.com', 'default.jpg', '', 'Jaemin', '', '087704620821', 'b0baee9d279d34fa1dfd71aadb908c3f', 1, '1591877936', 3),
(5, 'Tastura', 'tastura', 'nubeboka@best-mail.net', 'default.jpg', '', 'Tazkiya Aulia Rachman', '', '087704520821', 'b0baee9d279d34fa1dfd71aadb908c3f', 1, '1591969462', 3);

-- --------------------------------------------------------

--
-- Struktur dari tabel `masyarakat`
--

CREATE TABLE `masyarakat` (
  `id_masyarakat` int(11) NOT NULL,
  `nama_masyarakat` varchar(128) NOT NULL,
  `username_masyarakat` varchar(128) NOT NULL,
  `email_masyarakat` varchar(128) NOT NULL,
  `gambar_masyarakat` varchar(128) NOT NULL,
  `alamat_masyarakat` varchar(256) NOT NULL,
  `nohp_masyarakat` varchar(12) NOT NULL,
  `password_masyarakat` varchar(256) NOT NULL,
  `poin` int(11) NOT NULL,
  `is_active_masyarakat` int(1) NOT NULL,
  `date_created_masyarakat` int(1) NOT NULL,
  `id_role` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `masyarakat`
--

INSERT INTO `masyarakat` (`id_masyarakat`, `nama_masyarakat`, `username_masyarakat`, `email_masyarakat`, `gambar_masyarakat`, `alamat_masyarakat`, `nohp_masyarakat`, `password_masyarakat`, `poin`, `is_active_masyarakat`, `date_created_masyarakat`, `id_role`) VALUES
(9, 'riseman', 'riseman', 'risman.ardiansyah14@gmail.com', 'default.jpg', '', '111', 'b0baee9d279d34fa1dfd71aadb908c3f', 0, 1, 1591964744, 2),
(10, 'risman ardiansyah', 'risman', 'lalurisman1400@gmail.com', 'risman1.jpg', 'jalan gili air', '098712342123', '437599f1ea3514f8969f161a6606ce18', 120, 1, 1591967390, 2),
(11, 'Nur Izza Latifah', 'latifabulous', 'n.latifab@gmail.com', 'default.jpg', '', '087704620821', 'b0baee9d279d34fa1dfd71aadb908c3f', 220, 1, 1591971005, 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `penukaran_plastik`
--

CREATE TABLE `penukaran_plastik` (
  `id` int(11) NOT NULL,
  `id_umkm` int(11) NOT NULL,
  `id_masyarakat` int(11) NOT NULL,
  `total_poin` int(11) NOT NULL,
  `pet` int(11) NOT NULL,
  `hdp` int(11) NOT NULL,
  `pvc` int(11) NOT NULL,
  `ldpe` int(11) NOT NULL,
  `pp` int(11) NOT NULL,
  `ps` int(11) NOT NULL,
  `other` int(11) NOT NULL,
  `tanggal_tukar` datetime NOT NULL,
  `batas_tukar` datetime NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `penukaran_plastik`
--

INSERT INTO `penukaran_plastik` (`id`, `id_umkm`, `id_masyarakat`, `total_poin`, `pet`, `hdp`, `pvc`, `ldpe`, `pp`, `ps`, `other`, `tanggal_tukar`, `batas_tukar`, `status`) VALUES
(55, 2, 10, 220, 10, 10, 10, 10, 10, 10, 10, '2020-06-12 15:26:53', '2020-06-15 15:26:53', 1),
(56, 2, 11, 220, 0, 0, 0, 0, 0, 0, 0, '2020-06-12 16:12:11', '2020-06-15 16:12:11', 0);

--
-- Trigger `penukaran_plastik`
--
DELIMITER $$
CREATE TRIGGER `tb_poin_tambah` AFTER INSERT ON `penukaran_plastik` FOR EACH ROW BEGIN
	UPDATE masyarakat SET poin = poin+NEW.total_poin
    WHERE id_masyarakat = NEW.id_masyarakat;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `penukaran_reward`
--

CREATE TABLE `penukaran_reward` (
  `id` int(11) NOT NULL,
  `id_reward` int(11) NOT NULL,
  `id_masyarakat` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `poin` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `penukaran_reward`
--

INSERT INTO `penukaran_reward` (`id`, `id_reward`, `id_masyarakat`, `jumlah`, `poin`) VALUES
(3, 9, 9, 1, 100),
(4, 9, 10, 1, 100);

--
-- Trigger `penukaran_reward`
--
DELIMITER $$
CREATE TRIGGER `penukaran` AFTER INSERT ON `penukaran_reward` FOR EACH ROW BEGIN
	UPDATE masyarakat SET poin = poin-NEW.poin
    WHERE id_masyarakat = NEW.id_masyarakat;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `plastik`
--

CREATE TABLE `plastik` (
  `id_plastik` int(11) NOT NULL,
  `gambar_plastik` varchar(128) NOT NULL,
  `jenis_plastik` varchar(128) NOT NULL,
  `desc_plastik` text NOT NULL,
  `detail_plastik` text NOT NULL,
  `poin` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `plastik`
--

INSERT INTO `plastik` (`id_plastik`, `gambar_plastik`, `jenis_plastik`, `desc_plastik`, `detail_plastik`, `poin`) VALUES
(4, 'pet.jpeg', 'PET atau PETE (polyethylene terephthalate)', 'Botol air mineral, jus, softdrink, dan bumbu dapur.', '<p id=\"76d2\" class=\"gl gz dt as gn b go gp ha gq gr hb gs gt hc gu gv hd gw gx he gy dl\" data-selectable-paragraph=\"\" xss=removed>Plastik dengan label ini tidak berwarna atau bening, biasa digunakan untuk botol air mineral atau jus. Plastik ini lebih baik hanya digunakan satu kali dan jangan memamasukkan air panas ke dalamnya. Jika permukaan plastik sudah tidak mulus, atau terdapat baret-baret, lebih baik jangan minum air di dalamnya.</p><p id=\"1b34\" class=\"gl gz dt as gn b go gp ha gq gr hb gs gt hc gu gv hd gw gx he gy dl\" data-selectable-paragraph=\"\" xss=removed><span xss=removed>Biasa digunakan untuk botol air mineral, jus, <em class=\"id\" xss=removed>soft drink</em>, atau kecap.<br xss=removed>Tingkat bahaya dan kesulitan terurai: </span><span xss=removed>Sedang</span><font color=\"rgba(0, 0, 0, 0.83921568627451)\">.</font></p>', 2),
(6, 'hdpe.jpeg', 'HDPE (high density polyethylene)', 'Botol susu, kosmetik, shampo, tas kresek.', '<p id=\"d7be\" class=\"gl gz dt as gn b go gp ha gq gr hb gs gt hc gu gv hd gw gx he gy dl\" data-selectable-paragraph=\"\" xss=removed>HDPE plastik berwarna putih susu. Sama seperti PET atau PETE, plastik dengan kode ini juga dianjurkan untuk tidak digunakan berulang-ulang.</p><p id=\"fd24\" class=\"gl gz dt as gn b go gp ha gq gr hb gs gt hc gu gv hd gw gx he gy dl\" data-selectable-paragraph=\"\" xss=removed><span xss=removed>Biasa digunakan untuk botol susu, kosmetik, shampo, dan tas kresek.<br xss=removed>Tingkat bahaya dan kesulitan terurai: </span><span xss=removed>Sedang</span><font color=\"rgba(0, 0, 0, 0.83921568627451)\">.</font></p>', 3),
(7, 'pvc.jpeg', 'V atau PVC (polyvinyl chloride)', 'Kotak makanan plastik, mainan, shower curtain, pipa, lantai vinyl.', '<p id=\"c7ca\" class=\"gl gz dt as gn b go gp ha gq gr hb gs gt hc gu gv hd gw gx he gy dl\" data-selectable-paragraph=\"\" xss=removed>Kandungan dari PVC yaitu DEHA yang terdapat pada plastik pembungkus dapat bocor dan masuk ke makanan berminyak bila dipanaskan (jadi jangan sekali-kali memanaskan makanan yang tertutup plastik wrap). PVC berpotensi berbahaya untuk ginjal, hati, dan berat badan.</p><p id=\"ecfd\" class=\"gl gz dt as gn b go gp ha gq gr hb gs gt hc gu gv hd gw gx he gy dl\" data-selectable-paragraph=\"\" xss=removed><span xss=removed>Biasa digunakan untuk plastik wrap, kotak makan plastik, mainan, atau <em class=\"id\" xss=removed>shower curtain</em>.<br xss=removed>Tingkat bahaya dan kesulitan terurai: </span><span xss=removed>Tinggi</span><font color=\"rgba(0, 0, 0, 0.83921568627451)\">.</font></p>', 7),
(8, 'ldpe.jpeg', 'LDPE (low density polyethylene)', 'Bungkus makanan, bungkus roti, dry cleaning bag.', '<p id=\"ba19\" class=\"gl gz dt as gn b go gp ha gq gr hb gs gt hc gu gv hd gw gx he gy dl\" data-selectable-paragraph=\"\" xss=removed>Plastik jenis ini biasa dipakai untuk dijadikan barang yang memerlukan fleksibilitas tapi kuat. Jenis ini tidak dapat dihancurkan tapi aman untuk menyimpan makana <em class=\"id\" xss=removed>(food grade)</em>.</p><p id=\"5dc7\" class=\"gl gz dt as gn b go gp ha gq gr hb gs gt hc gu gv hd gw gx he gy dl\" data-selectable-paragraph=\"\" xss=removed><span xss=removed>Biasa digunakan untuk bungkus makanan, bungkus roti, dan <em class=\"id\" xss=removed>dry cleaning bag</em>.<br xss=removed>Tingkat bahaya: <span xss=removed>Rendah</span>.<br xss=removed>Kesulitan terurai: </span><span xss=removed>Sedang</span><font color=\"rgba(0, 0, 0, 0.83921568627451)\">.</font></p>', 1),
(9, 'pp.jpeg', 'PP (polypropylene)', 'Botol bayi, botol obat, sedotan, tempat margarin.', '<p id=\"623f\" class=\"gl gz dt as gn b go gp ha gq gr hb gs gt hc gu gv hd gw gx he gy dl\" data-selectable-paragraph=\"\" xss=removed>Jenis plastik ini adalah yang terbaik jika digunakan untuk menyimpan makanan, terutama untuk botol minuman atau botol susu bayi (bening/transparan). Disarankan untuk mencari simbol ini bila membeli barang-barang plastik untuk makanan.</p><p id=\"cd87\" class=\"gl gz dt as gn b go gp ha gq gr hb gs gt hc gu gv hd gw gx he gy dl\" data-selectable-paragraph=\"\" xss=removed>Biasa digunakan untuk botol bayi, botol obat, sedotan, dan tempat margarin.<br xss=removed>Tingkat bahaya dan kesulitan terurai: <span xss=removed>Rendah</span>.</p>', 1),
(10, 'ps.png', 'PS (polystyrene)', 'Cup minuman, styrofoam, cooler.', '<p id=\"19e8\" class=\"gl gz dt as gn b go gp ha gq gr hb gs gt hc gu gv hd gw gx he gy dl\" data-selectable-paragraph=\"\" xss=removed>Jenis plastik ini biasanya sebagai bahan dasar dari <em class=\"id\" xss=removed>styrofoam</em>, tempat minum sekali pakai dll. Bahan Polystyrene bisa membocorkan bahan styrine ke dalam makanan kita. Tempat makan styrofoam menghasilkan polusi saat diproduksi, menjadi sumber sampah karena penggunaannya hanya sekali pakai, tidak dapat mengurai dengan tanah, dan mengeluarkan gas beracun bila dibakar.</p><p id=\"28fa\" class=\"gl gz dt as gn b go gp ha gq gr hb gs gt hc gu gv hd gw gx he gy dl\" data-selectable-paragraph=\"\" xss=removed>Biasa digunakan untuk cup minuman, pembungkus makanan<em class=\"id\" xss=removed> take away</em>, dan <em class=\"id\" xss=removed>cooler</em>.<br xss=removed>Tingkat bahaya dan kesulitan terurai: <span xss=removed>Tinggi</span>.</p>', 3),
(11, 'other.jpeg', 'Other (biasanya polycarbonate)', 'Tumblr botol minuman, tas oven, packaging.', '<p id=\"2332\" class=\"gl gz dt as gn b go gp ha gq gr hb gs gt hc gu gv hd gw gx he gy dl\" data-selectable-paragraph=\"\" xss=removed>Jenis plastik ini biasanya ada di tempat makanan dan minuman seperti botol minum olahraga. Polycarbonate bisa mengeluarkan bahan utamanya yaitu Bisphenol-A ke dalam makanan dan minuman yang berpotensi merusak sistem hormon. Jadi sebisa mungkin hindari bahan plastik Polycarbonate.</p><p id=\"4447\" class=\"gl gz dt as gn b go gp ha gq gr hb gs gt hc gu gv hd gw gx he gy dl\" data-selectable-paragraph=\"\" xss=removed>Biasa digunakan untuk tumblr botol minuman, tas oven, atau <em class=\"id\" xss=removed>packaging</em>.<br xss=removed>Tingkat bahaya dan kesulita terurai: <span xss=removed>Tinggi</span>.</p>', 5);

-- --------------------------------------------------------

--
-- Struktur dari tabel `reward`
--

CREATE TABLE `reward` (
  `id_reward` int(11) NOT NULL,
  `nama_reward` varchar(128) NOT NULL,
  `jumlah_poin` int(11) NOT NULL,
  `gambar_reward` varchar(128) NOT NULL,
  `is_active_reward` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `reward`
--

INSERT INTO `reward` (`id_reward`, `nama_reward`, `jumlah_poin`, `gambar_reward`, `is_active_reward`) VALUES
(9, 'Mie Sedap 100 Kardus', 100, '', 0),
(10, 'Ale-Ale 1000 gelas', 200, 'event3.png', 0),
(19, 'Mie Indomie Seleramu', 300, 'maxresdefault.jpg', 1),
(20, 'Chocolatos 100000 pcs', 300, '37cd4defb8cfb564962cf359f2053016.png', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `umkm`
--

CREATE TABLE `umkm` (
  `id_umkm` int(11) NOT NULL,
  `nama_umkm` varchar(128) NOT NULL,
  `username_umkm` varchar(128) NOT NULL,
  `email_umkm` varchar(128) NOT NULL,
  `gambar_umkm` varchar(128) NOT NULL,
  `alamat_umkm` varchar(256) NOT NULL,
  `pj_umkm` varchar(128) NOT NULL,
  `desc_umkm` text NOT NULL,
  `nohp_umkm` varchar(12) NOT NULL,
  `password_umkm` varchar(256) NOT NULL,
  `is_active_umkm` int(1) NOT NULL,
  `date_created_umkm` int(1) NOT NULL,
  `id_role` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `umkm`
--

INSERT INTO `umkm` (`id_umkm`, `nama_umkm`, `username_umkm`, `email_umkm`, `gambar_umkm`, `alamat_umkm`, `pj_umkm`, `desc_umkm`, `nohp_umkm`, `password_umkm`, `is_active_umkm`, `date_created_umkm`, `id_role`) VALUES
(2, 'Yuk Ngaji', 'yuk.ngaji', 'yukngaji@info.com', 'default.jpg', '', 'Hawariyyun', '', '08987656777', 'b0baee9d279d34fa1dfd71aadb908c3f', 1, 1591454961, 4);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_accessmenu`
--

CREATE TABLE `user_accessmenu` (
  `id_accessmenu` int(11) NOT NULL,
  `id_role` int(11) NOT NULL,
  `id_menu` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user_accessmenu`
--

INSERT INTO `user_accessmenu` (`id_accessmenu`, `id_role`, `id_menu`) VALUES
(1, 1, 1),
(3, 2, 2),
(4, 3, 3),
(7, 1, 5),
(8, 1, 6),
(9, 4, 5),
(10, 4, 4),
(11, 1, 7);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_menu`
--

CREATE TABLE `user_menu` (
  `id_menu` int(11) NOT NULL,
  `nama_menu` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user_menu`
--

INSERT INTO `user_menu` (`id_menu`, `nama_menu`) VALUES
(1, 'Admin'),
(2, 'eCOBRICK'),
(3, 'Komunitas'),
(4, 'UMKM'),
(5, 'Plastik'),
(6, 'Menu'),
(7, 'Reward');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_role`
--

CREATE TABLE `user_role` (
  `id_role` int(11) NOT NULL,
  `nama_role` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user_role`
--

INSERT INTO `user_role` (`id_role`, `nama_role`) VALUES
(1, 'admin'),
(2, 'masyarakat'),
(3, 'komunitas'),
(4, 'umkm');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_submenu`
--

CREATE TABLE `user_submenu` (
  `id_submenu` int(11) NOT NULL,
  `id_menu` int(11) NOT NULL,
  `nama_submenu` varchar(128) NOT NULL,
  `url_submenu` varchar(128) NOT NULL,
  `icon_submenu` varchar(128) NOT NULL,
  `is_active_submenu` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user_submenu`
--

INSERT INTO `user_submenu` (`id_submenu`, `id_menu`, `nama_submenu`, `url_submenu`, `icon_submenu`, `is_active_submenu`) VALUES
(1, 1, 'Dashboard', 'admin', 'fas fa-fw fa-tachometer-alt', 1),
(3, 6, 'Menu Management', 'menu', 'fas fa-fw fa-folder', 1),
(4, 6, 'Submenu Management', 'menu/submenu', 'fas fa-fw fa-folder-open', 1),
(6, 1, 'Role', 'admin/role', ' fas fa-fw fa-user-cog', 1),
(8, 3, 'Dashboard', 'komunitas', 'fas fa-fw fa-tachometer-alt', 1),
(9, 3, 'Data Event', 'komunitas/event', 'fas fa-fw fa-calendar-alt', 1),
(10, 3, 'Data Artikel', 'komunitas/artikel', 'fas fa-fw fa-newspaper ', 1),
(11, 4, 'Dashboard', 'umkm', 'fas fa-fw fa-tachometer-alt', 1),
(12, 1, 'Data Masyarakat', 'admin/data_masyarakat', 'fas fa-fw fa-user', 1),
(13, 1, 'Data Komunitas', 'admin/data_komunitas', 'fas fa-fw fa-users', 1),
(14, 1, 'Data UMKM', 'admin/data_umkm', 'fas fa-fw fa-house-user', 1),
(15, 5, 'Data Plastik', 'plastik', 'fas fa-fw fa-dumpster', 1),
(16, 4, 'Data Penukaran', 'umkm/penukaran', 'fas fa-fw fa-recycle', 1),
(17, 7, 'Reward', 'admin/data_reward', 'fas fa-fw fa-gift', 1),
(18, 2, 'Jenis', 'ecobrick', 'fas fa- fa-user', 1);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indeks untuk tabel `artikel`
--
ALTER TABLE `artikel`
  ADD PRIMARY KEY (`id_artikel`);

--
-- Indeks untuk tabel `event`
--
ALTER TABLE `event`
  ADD PRIMARY KEY (`id_event`);

--
-- Indeks untuk tabel `join_event`
--
ALTER TABLE `join_event`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `komunitas`
--
ALTER TABLE `komunitas`
  ADD PRIMARY KEY (`id_komunitas`);

--
-- Indeks untuk tabel `masyarakat`
--
ALTER TABLE `masyarakat`
  ADD PRIMARY KEY (`id_masyarakat`);

--
-- Indeks untuk tabel `penukaran_plastik`
--
ALTER TABLE `penukaran_plastik`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `penukaran_reward`
--
ALTER TABLE `penukaran_reward`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `plastik`
--
ALTER TABLE `plastik`
  ADD PRIMARY KEY (`id_plastik`);

--
-- Indeks untuk tabel `reward`
--
ALTER TABLE `reward`
  ADD PRIMARY KEY (`id_reward`);

--
-- Indeks untuk tabel `umkm`
--
ALTER TABLE `umkm`
  ADD PRIMARY KEY (`id_umkm`);

--
-- Indeks untuk tabel `user_accessmenu`
--
ALTER TABLE `user_accessmenu`
  ADD PRIMARY KEY (`id_accessmenu`);

--
-- Indeks untuk tabel `user_menu`
--
ALTER TABLE `user_menu`
  ADD PRIMARY KEY (`id_menu`);

--
-- Indeks untuk tabel `user_role`
--
ALTER TABLE `user_role`
  ADD PRIMARY KEY (`id_role`);

--
-- Indeks untuk tabel `user_submenu`
--
ALTER TABLE `user_submenu`
  ADD PRIMARY KEY (`id_submenu`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `artikel`
--
ALTER TABLE `artikel`
  MODIFY `id_artikel` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `event`
--
ALTER TABLE `event`
  MODIFY `id_event` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT untuk tabel `join_event`
--
ALTER TABLE `join_event`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `komunitas`
--
ALTER TABLE `komunitas`
  MODIFY `id_komunitas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `masyarakat`
--
ALTER TABLE `masyarakat`
  MODIFY `id_masyarakat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `penukaran_plastik`
--
ALTER TABLE `penukaran_plastik`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT untuk tabel `penukaran_reward`
--
ALTER TABLE `penukaran_reward`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `plastik`
--
ALTER TABLE `plastik`
  MODIFY `id_plastik` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `reward`
--
ALTER TABLE `reward`
  MODIFY `id_reward` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT untuk tabel `umkm`
--
ALTER TABLE `umkm`
  MODIFY `id_umkm` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `user_accessmenu`
--
ALTER TABLE `user_accessmenu`
  MODIFY `id_accessmenu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `user_menu`
--
ALTER TABLE `user_menu`
  MODIFY `id_menu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `user_role`
--
ALTER TABLE `user_role`
  MODIFY `id_role` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `user_submenu`
--
ALTER TABLE `user_submenu`
  MODIFY `id_submenu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
