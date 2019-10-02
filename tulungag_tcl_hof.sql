-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 05, 2019 at 05:06 AM
-- Server version: 5.6.43
-- PHP Version: 7.2.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tulungag_tcl_hof`
--

-- --------------------------------------------------------

--
-- Table structure for table `config`
--

CREATE TABLE `config` (
  `id_config` int(10) NOT NULL,
  `nama_config` varchar(255) NOT NULL,
  `value_config` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `config`
--

INSERT INTO `config` (`id_config`, `nama_config`, `value_config`) VALUES
(1, 'token', 'XTO7XN'),
(2, 'default_kas', '10000'),
(3, 'welcome', 'Soddom Kontol');

-- --------------------------------------------------------

--
-- Table structure for table `cookies`
--

CREATE TABLE `cookies` (
  `id_cookie` int(25) NOT NULL,
  `tgl` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `value` text NOT NULL,
  `host` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `kas_checkpoint`
--

CREATE TABLE `kas_checkpoint` (
  `id_kas` int(15) NOT NULL,
  `date` date NOT NULL,
  `amount` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Triggers `kas_checkpoint`
--
DELIMITER $$
CREATE TRIGGER `Trigger Add Data Pembayaran` AFTER INSERT ON `kas_checkpoint` FOR EACH ROW INSERT INTO `kas_detail`
(`kas_detail`.`id_kas`, `kas_detail`.`id_member`, `kas_detail`.`status`)
SELECT NEW.`id_kas` AS `id_kas`, `kas_member`.`id_member`, 0 AS `status`
FROM `kas_member` WHERE `kas_member`.`status` IS NULL
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `Trigger Delete Data Pembayaran` BEFORE DELETE ON `kas_checkpoint` FOR EACH ROW DELETE FROM `kas_detail` WHERE `id_kas` = OLD.`id_kas`
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `kas_detail`
--

CREATE TABLE `kas_detail` (
  `id_kas` int(15) NOT NULL,
  `id_member` int(15) NOT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `kas_member`
--

CREATE TABLE `kas_member` (
  `id_member` int(15) NOT NULL,
  `nickname` text NOT NULL,
  `status` varchar(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `member`
--

CREATE TABLE `member` (
  `id_member` int(10) NOT NULL,
  `nickname` varchar(255) NOT NULL,
  `id_role` int(10) NOT NULL DEFAULT '6',
  `image` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `member`
--

INSERT INTO `member` (`id_member`, `nickname`, `id_role`, `image`) VALUES
(2, 'Junx$care', 2, NULL),
(3, 'MYXZLPLTK', 3, NULL),
(4, 'KAW3', 3, NULL),
(5, 'HippoScol1', 4, NULL),
(8, 'Surya1337', 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

CREATE TABLE `message` (
  `id_message` int(10) NOT NULL,
  `name` text NOT NULL,
  `email` text NOT NULL,
  `subject` text NOT NULL,
  `message` text NOT NULL,
  `messageDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `message`
--

INSERT INTO `message` (`id_message`, `name`, `email`, `subject`, `message`, `messageDate`) VALUES
(1, 'dsdsds', 'dsds@fff.c', 'dssdsd', 'dsds', '2018-12-30 05:52:01'),
(2, 'dsadsad', 'myxzlpltk@gmail.com', 'sasasa', 'saasasas', '2018-12-30 05:54:51'),
(3, 'dasdsa', 'sadsad@a.s', 'dasdsad', 'asu lo ngewe', '2019-01-02 08:49:45'),
(4, 'dsadas', 'dsdsa@d.s', 'fsdfsdf', 'fdsfds', '2019-01-02 09:02:38'),
(5, 'dsadsa', 'dasds@dd.s', 'sdasadas', 'dsadsa', '2019-01-02 09:04:13'),
(6, 'Zeenok', 'ahmadzidny5@gmail.com', 'Gabung', 'Mau gabung mbah', '2019-01-27 12:05:10'),
(7, 'Mr.Mc', 'joarniboss@gmail.com', 'Bismillah', 'Oleh gabung ra aku,sumbangno ilmu mu mak ', '2019-03-05 11:12:30'),
(8, 'Nisa', 'nisaa.15@gmail.com', 'Tolong', 'Mas surya gimana cara gabung', '2019-03-12 10:01:42'),
(9, 'asnun185', 'energyweek159@gmail.com', 'jadi members', 'apakah saya bisa jadi members', '2019-03-18 06:03:05');

-- --------------------------------------------------------

--
-- Table structure for table `nick_sc`
--

CREATE TABLE `nick_sc` (
  `id_nick` int(15) NOT NULL,
  `nick` varchar(255) NOT NULL,
  `urutan` int(10) NOT NULL DEFAULT '99'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `nick_sc`
--

INSERT INTO `nick_sc` (`id_nick`, `nick`, `urutan`) VALUES
(1, 'Surya1337', 0),
(2, 'KAW3', 2),
(3, 'Junx$care', 1),
(4, 'RiSecID', 4),
(5, 'HippoScol1', 5),
(7, 'Cr1m3', 6),
(9, 'Anarki1878', 7),
(10, 'RELAX_404', 8),
(11, 'MR_L0L4', 9),
(12, 'MYXZLPLTK', 3),
(14, 'SoaP3RS_KING', 10),
(15, '666Kax', 11),
(16, 'FuckQueen', 12),
(18, 'Bayu0053', 13);

-- --------------------------------------------------------

--
-- Table structure for table `partner`
--

CREATE TABLE `partner` (
  `id_partner` int(15) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `image` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `partner`
--

INSERT INTO `partner` (`id_partner`, `nama`, `image`) VALUES
(1, 'Tulungagung Cyber Link', '1.png');

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `id_role` int(10) NOT NULL,
  `nama_role` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`id_role`, `nama_role`) VALUES
(1, 'Founder'),
(2, 'Co-Founder'),
(3, 'Moderator'),
(4, 'Designer'),
(5, 'Administrator'),
(6, 'Member');

-- --------------------------------------------------------

--
-- Table structure for table `slider_text`
--

CREATE TABLE `slider_text` (
  `id_slider_text` int(10) NOT NULL,
  `isi_slider_text` text NOT NULL,
  `urutan_slider_text` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `slider_text`
--

INSERT INTO `slider_text` (`id_slider_text`, `isi_slider_text`, `urutan_slider_text`) VALUES
(5, 'Tulungagung Cyber Link', ''),
(9, 'Exploiting And Discovering Your Security', ''),
(10, 'Official Member ON Hall OF Fame', '');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(10) NOT NULL,
  `username` text NOT NULL,
  `password` varchar(1000) NOT NULL DEFAULT '$2y$10$6KQEuuoDM56uzkZjJAFKtekAhJKN654e4Oxg5KXIE9A7t4OJ80.gu',
  `role` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `username`, `password`, `role`) VALUES
(1, 'admin', '$2y$10$oGdX7jEy3aq8Ad7OAd6mjejB/yTYeGC.4GymRNbX2ymRQxktpZC4W', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `config`
--
ALTER TABLE `config`
  ADD PRIMARY KEY (`id_config`);

--
-- Indexes for table `cookies`
--
ALTER TABLE `cookies`
  ADD PRIMARY KEY (`id_cookie`);

--
-- Indexes for table `kas_checkpoint`
--
ALTER TABLE `kas_checkpoint`
  ADD PRIMARY KEY (`id_kas`);

--
-- Indexes for table `kas_detail`
--
ALTER TABLE `kas_detail`
  ADD KEY `id_kas` (`id_kas`),
  ADD KEY `id_member` (`id_member`);

--
-- Indexes for table `kas_member`
--
ALTER TABLE `kas_member`
  ADD PRIMARY KEY (`id_member`);

--
-- Indexes for table `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`id_member`),
  ADD UNIQUE KEY `nickname` (`nickname`),
  ADD KEY `id_role` (`id_role`);

--
-- Indexes for table `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`id_message`);

--
-- Indexes for table `nick_sc`
--
ALTER TABLE `nick_sc`
  ADD PRIMARY KEY (`id_nick`);

--
-- Indexes for table `partner`
--
ALTER TABLE `partner`
  ADD PRIMARY KEY (`id_partner`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id_role`);

--
-- Indexes for table `slider_text`
--
ALTER TABLE `slider_text`
  ADD PRIMARY KEY (`id_slider_text`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `config`
--
ALTER TABLE `config`
  MODIFY `id_config` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `cookies`
--
ALTER TABLE `cookies`
  MODIFY `id_cookie` int(25) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `kas_checkpoint`
--
ALTER TABLE `kas_checkpoint`
  MODIFY `id_kas` int(15) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `kas_member`
--
ALTER TABLE `kas_member`
  MODIFY `id_member` int(15) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `member`
--
ALTER TABLE `member`
  MODIFY `id_member` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `message`
--
ALTER TABLE `message`
  MODIFY `id_message` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `nick_sc`
--
ALTER TABLE `nick_sc`
  MODIFY `id_nick` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `partner`
--
ALTER TABLE `partner`
  MODIFY `id_partner` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `id_role` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `slider_text`
--
ALTER TABLE `slider_text`
  MODIFY `id_slider_text` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `kas_detail`
--
ALTER TABLE `kas_detail`
  ADD CONSTRAINT `kas_detail_ibfk_1` FOREIGN KEY (`id_kas`) REFERENCES `kas_checkpoint` (`id_kas`),
  ADD CONSTRAINT `kas_detail_ibfk_2` FOREIGN KEY (`id_member`) REFERENCES `kas_member` (`id_member`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
