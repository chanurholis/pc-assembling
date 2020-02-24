-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Feb 24, 2020 at 06:00 PM
-- Server version: 5.7.29-0ubuntu0.18.04.1
-- PHP Version: 7.2.24-0ubuntu0.18.04.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pc`
--

-- --------------------------------------------------------

--
-- Table structure for table `m_brand_motherboard`
--

CREATE TABLE `m_brand_motherboard` (
  `brand_motherboard_id` int(11) NOT NULL,
  `brand_motherboard` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `m_brand_motherboard`
--

INSERT INTO `m_brand_motherboard` (`brand_motherboard_id`, `brand_motherboard`) VALUES
(1, 'MSI'),
(2, 'ASUS');

-- --------------------------------------------------------

--
-- Table structure for table `m_brand_processor`
--

CREATE TABLE `m_brand_processor` (
  `brand_processor_id` int(11) NOT NULL,
  `brand_processor` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `m_brand_processor`
--

INSERT INTO `m_brand_processor` (`brand_processor_id`, `brand_processor`) VALUES
(1, 'INTEL'),
(2, 'AMD');

-- --------------------------------------------------------

--
-- Table structure for table `m_brand_ram`
--

CREATE TABLE `m_brand_ram` (
  `brand_ram_id` int(11) NOT NULL,
  `brand_ram` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `m_brand_ram`
--

INSERT INTO `m_brand_ram` (`brand_ram_id`, `brand_ram`) VALUES
(1, 'TOSHIBA'),
(2, 'SAMSUNG');

-- --------------------------------------------------------

--
-- Table structure for table `m_brand_storage`
--

CREATE TABLE `m_brand_storage` (
  `brand_storage_id` int(11) NOT NULL,
  `brand_storage` varchar(100) NOT NULL,
  `type_storage` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `m_brand_storage`
--

INSERT INTO `m_brand_storage` (`brand_storage_id`, `brand_storage`, `type_storage`) VALUES
(1, 'TOSHIBA', 'HDD'),
(2, 'SAMSUNG', 'SSD'),
(3, 'ASUS', 'SSD');

-- --------------------------------------------------------

--
-- Table structure for table `m_casing`
--

CREATE TABLE `m_casing` (
  `casing_id` int(11) NOT NULL,
  `nama_casing` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `m_casing`
--

INSERT INTO `m_casing` (`casing_id`, `nama_casing`) VALUES
(1, 'Dazumba');

-- --------------------------------------------------------

--
-- Table structure for table `m_ddr_ram`
--

CREATE TABLE `m_ddr_ram` (
  `ddr_id` int(11) NOT NULL,
  `ddr` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `m_ddr_ram`
--

INSERT INTO `m_ddr_ram` (`ddr_id`, `ddr`) VALUES
(1, '2'),
(2, '3'),
(3, '4');

-- --------------------------------------------------------

--
-- Table structure for table `m_kapasitas_ram`
--

CREATE TABLE `m_kapasitas_ram` (
  `kapasitas_id` int(11) NOT NULL,
  `kapasitas_ram` varchar(10) NOT NULL,
  `satuan` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `m_kapasitas_ram`
--

INSERT INTO `m_kapasitas_ram` (`kapasitas_id`, `kapasitas_ram`, `satuan`) VALUES
(2, '1', 'GB'),
(4, '2', 'GB'),
(5, '4', 'GB'),
(6, '8', 'GB'),
(7, '16', 'GB');

-- --------------------------------------------------------

--
-- Table structure for table `m_kapasitas_storage`
--

CREATE TABLE `m_kapasitas_storage` (
  `kapasitas_id` int(11) NOT NULL,
  `kapasitas_storage` varchar(10) NOT NULL,
  `satuan` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `m_kapasitas_storage`
--

INSERT INTO `m_kapasitas_storage` (`kapasitas_id`, `kapasitas_storage`, `satuan`) VALUES
(1, '500', 'GB'),
(3, '1', 'TB');

-- --------------------------------------------------------

--
-- Table structure for table `m_keyboard`
--

CREATE TABLE `m_keyboard` (
  `keyboard_id` int(11) NOT NULL,
  `nama_keyboard` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `m_keyboard`
--

INSERT INTO `m_keyboard` (`keyboard_id`, `nama_keyboard`) VALUES
(1, 'Logitech I'),
(3, 'Votre'),
(4, 'Lenovo');

-- --------------------------------------------------------

--
-- Table structure for table `m_monitor`
--

CREATE TABLE `m_monitor` (
  `monitor_id` int(11) NOT NULL,
  `nama_monitor` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `m_monitor`
--

INSERT INTO `m_monitor` (`monitor_id`, `nama_monitor`) VALUES
(1, 'Logitech'),
(2, 'ASUS'),
(3, 'Samsung'),
(4, 'Acer');

-- --------------------------------------------------------

--
-- Table structure for table `m_motherboard`
--

CREATE TABLE `m_motherboard` (
  `motherboard_id` int(11) NOT NULL,
  `brand_motherboard_id` int(11) NOT NULL,
  `motherboard` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `m_motherboard`
--

INSERT INTO `m_motherboard` (`motherboard_id`, `brand_motherboard_id`, `motherboard`) VALUES
(21, 4, 'ThinkPad X240'),
(22, 1, 'MS17'),
(23, 2, 'A5US');

-- --------------------------------------------------------

--
-- Table structure for table `m_mouse`
--

CREATE TABLE `m_mouse` (
  `mouse_id` int(11) NOT NULL,
  `nama_mouse` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `m_mouse`
--

INSERT INTO `m_mouse` (`mouse_id`, `nama_mouse`) VALUES
(1, 'Logitech I'),
(2, 'Baba'),
(3, 'Votre');

-- --------------------------------------------------------

--
-- Table structure for table `m_processor`
--

CREATE TABLE `m_processor` (
  `processor_id` int(11) NOT NULL,
  `brand_processor_id` int(11) NOT NULL,
  `nama_processor` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `m_processor`
--

INSERT INTO `m_processor` (`processor_id`, `brand_processor_id`, `nama_processor`) VALUES
(20, 3, 'coba'),
(21, 2, 'Ryzen'),
(22, 1, 'Core');

-- --------------------------------------------------------

--
-- Table structure for table `m_psu`
--

CREATE TABLE `m_psu` (
  `psu_id` int(11) NOT NULL,
  `nama_psu` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `m_psu`
--

INSERT INTO `m_psu` (`psu_id`, `nama_psu`) VALUES
(1, 'EVGA SuperNOVA G3'),
(2, 'Corsair AX Series I'),
(3, 'Seasonic Focus');

-- --------------------------------------------------------

--
-- Table structure for table `m_ram`
--

CREATE TABLE `m_ram` (
  `ram_id` int(11) NOT NULL,
  `ddr_id` int(11) NOT NULL,
  `brand_ram_id` int(11) NOT NULL,
  `nama_ram` varchar(100) NOT NULL,
  `kapasitas_id` int(11) NOT NULL,
  `satuan_ram` enum('GB') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `m_ram`
--

INSERT INTO `m_ram` (`ram_id`, `ddr_id`, `brand_ram_id`, `nama_ram`, `kapasitas_id`, `satuan_ram`) VALUES
(16, 2, 1, 'TOSHIBA', 5, 'GB'),
(17, 2, 2, 'MURAH', 7, 'GB'),
(18, 2, 2, 'Samsung', 7, 'GB');

-- --------------------------------------------------------

--
-- Table structure for table `m_storage`
--

CREATE TABLE `m_storage` (
  `storage_id` int(11) NOT NULL,
  `brand_storage_id` varchar(100) NOT NULL,
  `nama_storage` varchar(100) NOT NULL,
  `kapasitas_id` varchar(20) NOT NULL,
  `type_storage` enum('HDD','SSD') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `m_storage`
--

INSERT INTO `m_storage` (`storage_id`, `brand_storage_id`, `nama_storage`, `kapasitas_id`, `type_storage`) VALUES
(7, '1', 'HDT6', '1', 'HDD'),
(12, '2', 'SANGUAN', '3', 'SSD');

-- --------------------------------------------------------

--
-- Table structure for table `m_vga`
--

CREATE TABLE `m_vga` (
  `vga_id` int(11) NOT NULL,
  `nama_vga` varchar(100) NOT NULL,
  `type_vga` enum('ADD-ON','ON-BOARD') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `m_vga`
--

INSERT INTO `m_vga` (`vga_id`, `nama_vga`, `type_vga`) VALUES
(1, 'VGA', 'ADD-ON');

-- --------------------------------------------------------

--
-- Table structure for table `rakit`
--

CREATE TABLE `rakit` (
  `rakit_id` int(11) NOT NULL,
  `user` varchar(100) NOT NULL,
  `no_indeks` varchar(100) NOT NULL,
  `processor_id` int(11) NOT NULL,
  `motherboard_id` int(11) NOT NULL,
  `ram_id` int(11) NOT NULL,
  `storage_id` int(11) NOT NULL,
  `casing_id` int(11) NOT NULL,
  `vga_id` int(11) NOT NULL,
  `psu_id` int(11) NOT NULL,
  `keyboard_id` int(11) NOT NULL,
  `mouse_id` int(11) NOT NULL,
  `monitor_id` int(11) NOT NULL,
  `tgl_input` datetime NOT NULL,
  `tgl_diserahkan` datetime NOT NULL,
  `pengguna` varchar(100) NOT NULL,
  `institusi` varchar(20) NOT NULL,
  `bukti` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rakit`
--

INSERT INTO `rakit` (`rakit_id`, `user`, `no_indeks`, `processor_id`, `motherboard_id`, `ram_id`, `storage_id`, `casing_id`, `vga_id`, `psu_id`, `keyboard_id`, `mouse_id`, `monitor_id`, `tgl_input`, `tgl_diserahkan`, `pengguna`, `institusi`, `bukti`) VALUES
(6, 'Admin', 'A-1-0-V-C', 21, 23, 17, 12, 1, 1, 2, 1, 2, 2, '2020-01-19 10:13:58', '2013-01-08 00:00:00', 'DOSEN', 'YPBPI', 'default.jpg'),
(7, 'Admin', 'A-1-A-D-3', 22, 23, 16, 12, 1, 1, 2, 1, 2, 2, '2020-01-19 10:11:21', '2013-01-08 00:00:00', 'SISWA MAGANG', 'POLTEKPOS', 'default.jpg'),
(8, 'Admin', 'C-D-4-D-F', 21, 23, 17, 12, 1, 1, 2, 1, 2, 2, '2020-01-19 10:19:55', '2020-12-31 00:00:00', 'STAFF', 'POLTEKPOS', 'item-190120-7791fe8803.png'),
(9, 'Member', '123457895', 22, 23, 18, 7, 1, 1, 3, 1, 1, 3, '2020-02-24 14:55:49', '2020-02-24 00:00:00', 'RIFKY', 'STIMLOG', 'default.jpg'),
(10, 'Rifky', '123456789', 21, 22, 18, 7, 1, 1, 2, 1, 3, 2, '2020-02-24 15:02:09', '2020-02-27 00:00:00', 'RIFKY A', 'STIMLOG', 'default.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `role` varchar(10) NOT NULL,
  `is_active` enum('Aktif','Tidak Aktif') NOT NULL,
  `last_login` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `role`, `is_active`, `last_login`) VALUES
(12, 'Admin', '$2y$10$Ap1bn46w0nLv8GMxuS4Xj.Is0POg1KhAVfgrGdC8n7OjFibgG/6uO', 'Admin', 'Aktif', '2020-02-24 17:59:28'),
(13, 'Member', '$2y$10$dPO3WX1uEv3oZIzD7Q5pe.WNkYTuyVaGpXzXeb.tFknZYoVNh/4Ja', 'Member', 'Aktif', '2020-02-24 14:53:48'),
(14, 'Rifky', '$2y$10$YKjUQvmaNkhYuGZ5Vf00GOGLrIfHiHRBWua5KZoGzJcXvAgd8bK6e', 'Member', 'Aktif', '2020-02-24 14:57:51'),
(15, 'Amelia', '$2y$10$NgJrh3N4keHI7x65OX8Ea.arAd9IlKgYxV/MBzthVg/H/77dTn4Ia', 'Admin', 'Aktif', '2020-02-24 15:00:37');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `m_brand_motherboard`
--
ALTER TABLE `m_brand_motherboard`
  ADD PRIMARY KEY (`brand_motherboard_id`);

--
-- Indexes for table `m_brand_processor`
--
ALTER TABLE `m_brand_processor`
  ADD PRIMARY KEY (`brand_processor_id`);

--
-- Indexes for table `m_brand_ram`
--
ALTER TABLE `m_brand_ram`
  ADD PRIMARY KEY (`brand_ram_id`);

--
-- Indexes for table `m_brand_storage`
--
ALTER TABLE `m_brand_storage`
  ADD PRIMARY KEY (`brand_storage_id`);

--
-- Indexes for table `m_casing`
--
ALTER TABLE `m_casing`
  ADD PRIMARY KEY (`casing_id`);

--
-- Indexes for table `m_ddr_ram`
--
ALTER TABLE `m_ddr_ram`
  ADD PRIMARY KEY (`ddr_id`);

--
-- Indexes for table `m_kapasitas_ram`
--
ALTER TABLE `m_kapasitas_ram`
  ADD PRIMARY KEY (`kapasitas_id`);

--
-- Indexes for table `m_kapasitas_storage`
--
ALTER TABLE `m_kapasitas_storage`
  ADD PRIMARY KEY (`kapasitas_id`);

--
-- Indexes for table `m_keyboard`
--
ALTER TABLE `m_keyboard`
  ADD PRIMARY KEY (`keyboard_id`);

--
-- Indexes for table `m_monitor`
--
ALTER TABLE `m_monitor`
  ADD PRIMARY KEY (`monitor_id`);

--
-- Indexes for table `m_motherboard`
--
ALTER TABLE `m_motherboard`
  ADD PRIMARY KEY (`motherboard_id`);

--
-- Indexes for table `m_mouse`
--
ALTER TABLE `m_mouse`
  ADD PRIMARY KEY (`mouse_id`);

--
-- Indexes for table `m_processor`
--
ALTER TABLE `m_processor`
  ADD PRIMARY KEY (`processor_id`),
  ADD KEY `brand_processor_id` (`brand_processor_id`),
  ADD KEY `brand_processor_id_2` (`brand_processor_id`),
  ADD KEY `brand_processor_id_3` (`brand_processor_id`);

--
-- Indexes for table `m_psu`
--
ALTER TABLE `m_psu`
  ADD PRIMARY KEY (`psu_id`);

--
-- Indexes for table `m_ram`
--
ALTER TABLE `m_ram`
  ADD PRIMARY KEY (`ram_id`);

--
-- Indexes for table `m_storage`
--
ALTER TABLE `m_storage`
  ADD PRIMARY KEY (`storage_id`);

--
-- Indexes for table `m_vga`
--
ALTER TABLE `m_vga`
  ADD PRIMARY KEY (`vga_id`);

--
-- Indexes for table `rakit`
--
ALTER TABLE `rakit`
  ADD PRIMARY KEY (`rakit_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `m_ddr_ram`
--
ALTER TABLE `m_ddr_ram`
  MODIFY `ddr_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `m_kapasitas_ram`
--
ALTER TABLE `m_kapasitas_ram`
  MODIFY `kapasitas_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `m_motherboard`
--
ALTER TABLE `m_motherboard`
  MODIFY `motherboard_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
--
-- AUTO_INCREMENT for table `m_processor`
--
ALTER TABLE `m_processor`
  MODIFY `processor_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT for table `m_ram`
--
ALTER TABLE `m_ram`
  MODIFY `ram_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `m_storage`
--
ALTER TABLE `m_storage`
  MODIFY `storage_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `m_vga`
--
ALTER TABLE `m_vga`
  MODIFY `vga_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `rakit`
--
ALTER TABLE `rakit`
  MODIFY `rakit_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
