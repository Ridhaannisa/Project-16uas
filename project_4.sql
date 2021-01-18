-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 13 Nov 2020 pada 12.33
-- Versi server: 10.4.14-MariaDB
-- Versi PHP: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project_4`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori`
--

CREATE TABLE `kategori` (
  `id` int(11) NOT NULL,
  `nama` varchar(225) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `kategori`
--

INSERT INTO `kategori` (`id`, `nama`, `created_at`, `updated_at`) VALUES
(1, 'Laptop', '2020-11-12 23:29:54', '2020-11-12 23:29:54'),
(2, 'Handphone', '2020-11-12 23:30:52', '2020-11-12 23:30:52'),
(3, 'Pakaian Pria', '2020-11-12 23:31:06', '2020-11-12 23:31:06'),
(4, 'Pakaian Wanita', '2020-11-12 23:31:16', '2020-11-12 23:31:16');

-- --------------------------------------------------------

--
-- Struktur dari tabel `keranjang`
--

CREATE TABLE `keranjang` (
  `id` int(11) NOT NULL,
  `nama` varchar(225) NOT NULL,
  `harga` char(50) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `keranjang`
--

INSERT INTO `keranjang` (`id`, `nama`, `harga`, `jumlah`, `created_at`, `updated_at`) VALUES
(6, 'Poco X3 NFC 8/128 GB', '3700000', 2, '2020-11-13 04:19:52', '2020-11-13 04:19:52');

-- --------------------------------------------------------

--
-- Struktur dari tabel `produk`
--

CREATE TABLE `produk` (
  `id` int(11) NOT NULL,
  `brand` varchar(225) NOT NULL,
  `nama` varchar(225) NOT NULL,
  `harga` char(30) NOT NULL,
  `stok` int(11) NOT NULL,
  `kategori` int(11) NOT NULL,
  `deskripsi` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `produk`
--

INSERT INTO `produk` (`id`, `brand`, `nama`, `harga`, `stok`, `kategori`, `deskripsi`, `created_at`, `updated_at`) VALUES
(1, 'Xiaomi', 'Poco X3 NFC 8/128 GB', '3700000', 10, 2, 'NETWORK Technology\r\nGSM / HSPA / LTE\r\nLAUNCH Announced 2020, September 07\r\nStatus Available. Released 2020, September 08\r\nBODY Dimensions 165.3 x 76.8 x 9.4 mm (6.51 x 3.02 x 0.37 in)\r\nWeight 215 g (7.58 oz)\r\nBuild Glass front (Gorilla Glass 5), aluminum frame, plastic back\r\nSIM Hybrid Dual SIM (Nano-SIM, dual stand-by)\r\nIP53 splash-proof\r\nDISPLAY Type IPS LCD, 120Hz, HDR10, 450 nits (typ)\r\nSize 6.67 inches, 107.4 cm2 (~84.6% screen-to-body ratio)\r\nResolution 1080 x 2400 pixels, 20:9 ratio (~395 ppi density)\r\nProtection Corning Gorilla Glass 5\r\nPLATFORM OS Android 10, MIUI 12\r\nChipset Qualcomm SM7150-AC Snapdragon 732G (8 nm)\r\nCPU Octa-core (2x2.3 GHz Kryo 470 Gold & 6x1.8 GHz Kryo 470 Silver)\r\nGPU Adreno 618\r\nMEMORY Card slot microSDXC (uses shared SIM slot)\r\nInternal 64GB 6GB RAM, 128GB 6GB RAM\r\nUFS 2.1\r\nMAIN CAMERA Quad 64 MP, f/1.9, (wide), 1/1.73\", 0.8µm, PDAF\r\n13 MP, f/2.2, 119˚ (ultrawide), 1.0µm\r\n2 MP, f/2.4, (macro)\r\n2 MP, f/2.4, (depth)\r\nFeatures Dual-LED flash, HDR, panorama\r\nVideo 4K@30fps, 1080p@30/120fps, 720p@960fps; gyro-EIS\r\nSELFIE CAMERA Single 20 MP, f/2.2, (wide), 1/3.4\", 0.8µm\r\nFeatures HDR, panorama\r\nVideo 1080p@30fps\r\nSOUND Loudspeaker Yes, with stereo speakers\r\n3.5mm jack Yes\r\n24-bit/192kHz audio\r\nCOMMS WLAN Wi-Fi 802.11 a/b/g/n/ac, dual-band, Wi-Fi Direct, hotspot\r\nBluetooth 5.1, A2DP, LE\r\nGPS Yes, with A-GPS, GLONASS, BDS\r\nNFC Yes\r\nInfrared port Yes\r\nRadio FM radio, recording\r\nUSB USB Type-C 2.0, USB On-The-Go\r\nFEATURES Sensors Fingerprint (side-mounted), accelerometer, gyro, proximity, compass\r\nBATTERY Type Li-Po 5160 mAh, non-removable\r\nCharging Fast charging 33W, 62% in 30 min, 100% in 65 min (advertised)', '2020-11-12 08:35:46', '2020-11-12 08:35:46'),
(2, 'Asus', 'LAPTOP GAMING ASUS P1410CDA RYZEN 3-3250U 8GB 256GB SSD W10', '8000000', 50, 1, '- Deskripsi Asus EXPERTBOOK P1410CDA-BV3421T Ryzen 3-3250U 8GB 256GB SSD W10 BLACK\r\n- Processor AMD Ryzen 3 - 3250U ( 2.6GHz Turbo maksimal 3.5GHz)\r\n- Chipset AMD\r\n- Grafis AMD Vega 3\r\n- Memori 8GB DDR4 2400MHz(bawaan ram 4) upgradeable to 16GB DDR4\r\n- Storage 256GB SSD PCIe NVMe M.2\r\n- Display 14 Inch HD LED Backlight\r\n- Fingerprint\r\n- Resolusi HD 1366 x 768 Pixel\r\n- Konektifitas WiFi, Bluetooth, Port USB, HDMI, Card Reader, Combo Audio Jack\r\n- 2 x 2W dual speaker stereo, ICEpower, SonicMaster Audio\r\n- Kamera Webcam dengan resolusi VGA\r\n- Baterai 2 Cell 32WHr\r\n- Sistem Operasi Microsoft Windows 10 Home original\r\n- Dimensions 325 x 216 x 22.9 mm\r\n- Berat 1.5 kg\r\n- Warna Black', '2020-11-12 08:35:48', '2020-11-12 08:35:48'),
(3, 'LLACES', 'Dress Wanita - Evelyn Flare Dress', '330000', 100, 4, 'Deskripsi LLACES Clothing - Dress Wanita - Evelyn Flare Dress - Merah, S\r\n- Midi dress desain flare sleeve detail pita ikat\r\n- Warna hitam& Merah\r\n- Kerah lapel\r\n- Unlined\r\n- Regular fit\r\n- Kancing depan\r\n- Material poliester tidak transparan, ringan dan tidak stretch\r\n- Tinggi model 175cm, mengenakan ukuran S\r\n\r\nLingkar Dada x Panjang Lengan x Panjang Badan:\r\n- S (86 cm x 18 cm x 97 cm)\r\n- M (88 cm x 19 cm x 98 cm)\r\n- L (90 cm x 20 cm x 99 cm)', '2020-11-12 08:35:51', '2020-11-12 08:35:51'),
(5, 'Buble', 'Buble wrap untuk produk', '1000', 1000, 1, 'Untuk pelindung barang anda', '2020-11-12 01:36:24', '2020-11-12 01:36:24'),
(6, 'Samsung', 'Galaxy A51 6/128 GB', '4500000', 10, 2, 'Garansi resmi sein indonesia / Samsung Indonesia', '2020-11-12 08:51:45', '2020-11-12 01:51:45');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `keranjang`
--
ALTER TABLE `keranjang`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `keranjang`
--
ALTER TABLE `keranjang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `produk`
--
ALTER TABLE `produk`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
