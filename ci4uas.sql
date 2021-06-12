-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 12, 2021 at 09:34 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ci4uas`
--

-- --------------------------------------------------------

--
-- Table structure for table `auth_activation_attempts`
--

CREATE TABLE `auth_activation_attempts` (
  `id` int(11) UNSIGNED NOT NULL,
  `ip_address` varchar(255) NOT NULL,
  `user_agent` varchar(255) NOT NULL,
  `token` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `auth_activation_attempts`
--

INSERT INTO `auth_activation_attempts` (`id`, `ip_address`, `user_agent`, `token`, `created_at`) VALUES
(1, '0.0.0.0', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/90.0.4430.212 Safari/537.36', '72892058d9aac1560fcbb12272b2a640', '2021-05-26 01:20:54'),
(2, '0.0.0.0', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/90.0.4430.212 Safari/537.36', '72892058d9aac1560fcbb12272b2a640', '2021-05-26 01:21:03'),
(3, '0.0.0.0', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/90.0.4430.212 Safari/537.36', '72892058d9aac1560fcbb12272b2a640', '2021-05-26 01:21:44'),
(4, '0.0.0.0', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/90.0.4430.212 Safari/537.36', '72892058d9aac1560fcbb12272b2a640', '2021-05-26 01:22:08'),
(5, '0.0.0.0', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/90.0.4430.212 Safari/537.36', '72892058d9aac1560fcbb12272b2a640', '2021-05-26 01:23:27'),
(6, '0.0.0.0', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/90.0.4430.212 Safari/537.36', '72892058d9aac1560fcbb12272b2a640', '2021-05-26 01:23:34'),
(7, '0.0.0.0', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/90.0.4430.212 Safari/537.36', NULL, '2021-05-26 01:26:59'),
(8, '0.0.0.0', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/90.0.4430.212 Safari/537.36', '72892058d9aac1560fcbb12272b2a640', '2021-05-26 01:27:12'),
(9, '0.0.0.0', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/90.0.4430.212 Safari/537.36', '72892058d9aac1560fcbb12272b2a640', '2021-05-26 01:27:12'),
(10, '0.0.0.0', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/90.0.4430.212 Safari/537.36', 'b08241058e6c278838ab398b9f570cd2', '2021-05-26 01:29:34'),
(11, '0.0.0.0', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/90.0.4430.212 Safari/537.36', 'b08241058e6c278838ab398b9f570cd2', '2021-05-26 01:30:13'),
(12, '0.0.0.0', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/90.0.4430.212 Safari/537.36', 'b08241058e6c278838ab398b9f570cd2', '2021-05-26 01:30:51'),
(13, '0.0.0.0', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/90.0.4430.212 Safari/537.36', '9a64513a8229c80680077dfe5f01e942', '2021-05-26 02:09:19'),
(14, '0.0.0.0', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/90.0.4430.212 Safari/537.36', NULL, '2021-05-26 02:09:42'),
(15, '0.0.0.0', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/90.0.4430.212 Safari/537.36', '3fc36b296fea68294a164ed46f97f1a0', '2021-05-26 23:00:33'),
(16, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/90.0.4430.212 Safari/537.36', '6815603904dc3368c1998c38cd2b37fa', '2021-05-31 02:38:47'),
(17, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.77 Safari/537.36', 'e4a269b4a9b4d9dadb193bc3d0c3d976', '2021-06-04 08:21:39'),
(18, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.77 Safari/537.36', 'e4a269b4a9b4d9dadb193bc3d0c3d976', '2021-06-04 08:21:46'),
(19, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.77 Safari/537.36', 'e4a269b4a9b4d9dadb193bc3d0c3d976', '2021-06-04 08:22:50'),
(20, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.77 Safari/537.36', 'e4a269b4a9b4d9dadb193bc3d0c3d976', '2021-06-04 08:23:54'),
(21, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.77 Safari/537.36', 'e4a269b4a9b4d9dadb193bc3d0c3d976', '2021-06-04 08:28:44'),
(22, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.77 Safari/537.36', 'e4a269b4a9b4d9dadb193bc3d0c3d976', '2021-06-04 08:28:46'),
(23, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.77 Safari/537.36', 'e4a269b4a9b4d9dadb193bc3d0c3d976', '2021-06-04 08:28:50'),
(24, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.77 Safari/537.36', '1c40f2260e7d027b72f5969751f2f907', '2021-06-04 08:30:00'),
(25, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.77 Safari/537.36', '1c40f2260e7d027b72f5969751f2f907', '2021-06-04 08:30:47'),
(26, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.77 Safari/537.36', 'c1ec0ffc45d485a94579b43bb4afd2b1', '2021-06-04 08:40:51'),
(27, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.77 Safari/537.36', 'da8fdd7fa0764ce8bf22ba26f1d6a2bc', '2021-06-11 01:25:06'),
(28, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.77 Safari/537.36', '356341fcec0a0c8d8fd170cf9ee5678e', '2021-06-11 01:47:25'),
(29, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.77 Safari/537.36', '0afc563d8efbe62d3362b684ee0f0241', '2021-06-11 03:20:20');

-- --------------------------------------------------------

--
-- Table structure for table `auth_groups`
--

CREATE TABLE `auth_groups` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `auth_groups`
--

INSERT INTO `auth_groups` (`id`, `name`, `description`) VALUES
(1, 'admin', 'Administrator'),
(2, 'member', 'Member Terdaftar');

-- --------------------------------------------------------

--
-- Table structure for table `auth_groups_permissions`
--

CREATE TABLE `auth_groups_permissions` (
  `group_id` int(11) UNSIGNED NOT NULL DEFAULT 0,
  `permission_id` int(11) UNSIGNED NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `auth_groups_permissions`
--

INSERT INTO `auth_groups_permissions` (`group_id`, `permission_id`) VALUES
(1, 1),
(1, 2),
(2, 2);

-- --------------------------------------------------------

--
-- Table structure for table `auth_groups_users`
--

CREATE TABLE `auth_groups_users` (
  `group_id` int(11) UNSIGNED NOT NULL DEFAULT 0,
  `user_id` int(11) UNSIGNED NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `auth_groups_users`
--

INSERT INTO `auth_groups_users` (`group_id`, `user_id`) VALUES
(1, 1),
(1, 19),
(2, 6),
(2, 12);

-- --------------------------------------------------------

--
-- Table structure for table `auth_logins`
--

CREATE TABLE `auth_logins` (
  `id` int(11) UNSIGNED NOT NULL,
  `ip_address` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `user_id` int(11) UNSIGNED DEFAULT NULL,
  `date` datetime NOT NULL,
  `success` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `auth_logins`
--

INSERT INTO `auth_logins` (`id`, `ip_address`, `email`, `user_id`, `date`, `success`) VALUES
(1, '0.0.0.0', 'arifpatanduk2@gmail.com', 1, '2021-05-14 14:54:19', 1),
(2, '0.0.0.0', 'arifpatanduk2@gmail.com', 1, '2021-05-14 15:20:09', 1),
(3, '0.0.0.0', 'arifpatanduk1@gmail.com', 2, '2021-05-14 15:26:42', 1),
(4, '0.0.0.0', 'arifpatanduk2@gmail.com', 1, '2021-05-14 15:42:10', 1),
(5, '0.0.0.0', 'arifpatanduk1@gmail.com', 2, '2021-05-14 15:45:25', 1),
(6, '0.0.0.0', 'arifwp', 3, '2021-05-15 05:31:07', 0),
(7, '0.0.0.0', 'arifwp', 3, '2021-05-15 05:31:18', 0),
(8, '0.0.0.0', 'arifwp', 3, '2021-05-15 05:31:35', 0),
(9, '0.0.0.0', 'arifwp', 3, '2021-05-15 05:32:08', 0),
(10, '0.0.0.0', 'arifwp', 3, '2021-05-15 05:32:31', 0),
(11, '0.0.0.0', 'arifwp', 4, '2021-05-15 06:13:51', 0),
(12, '0.0.0.0', 'arifwp', 4, '2021-05-19 01:31:27', 0),
(13, '0.0.0.0', 'arifpatanduk2@gmail.com', 1, '2021-05-26 01:02:01', 1),
(14, '0.0.0.0', 'arif@mail.com', 7, '2021-05-26 01:03:17', 1),
(15, '0.0.0.0', 'arif@mail.com', 7, '2021-05-26 01:26:59', 1),
(16, '0.0.0.0', 'arifwp', 8, '2021-05-26 01:33:15', 0),
(17, '0.0.0.0', 'arifpatanduk2@gmail.com', 1, '2021-05-26 01:54:06', 1),
(18, '0.0.0.0', 'arifwp', 11, '2021-05-26 02:00:45', 0),
(19, '0.0.0.0', 'arifpatanduk1@gmail.com', 11, '2021-05-26 02:09:42', 1),
(20, '0.0.0.0', 'arifpatanduk1@gmail.com', 11, '2021-05-26 03:16:31', 1),
(21, '0.0.0.0', 'arifpatanduk1@gmail.com', 11, '2021-05-26 03:36:39', 1),
(22, '0.0.0.0', 'arifpatanduk2@gmail.com', 1, '2021-05-26 03:41:02', 1),
(23, '0.0.0.0', 'arifpatanduk1@gmail.com', 11, '2021-05-26 22:25:05', 1),
(24, '0.0.0.0', 'arifpatanduk2@gmail.com', 1, '2021-05-26 22:25:16', 1),
(25, '0.0.0.0', 'arifp@student.uns.ac.id', 12, '2021-05-26 23:00:40', 1),
(26, '0.0.0.0', 'arifp@student.uns.ac.id', NULL, '2021-05-27 03:02:48', 0),
(27, '0.0.0.0', 'arifp@student.uns.ac.id', 12, '2021-05-27 03:02:59', 1),
(28, '::1', 'b.timur504@student.uns.ac.id', 13, '2021-05-31 02:39:00', 1),
(29, '::1', 'b.timur504@student.uns.ac.id', 13, '2021-05-31 02:39:16', 1),
(30, '::1', 'b.timur504@student.uns.ac.id', 13, '2021-05-31 03:30:30', 1),
(31, '::1', 'b.timur504@student.uns.ac.id', NULL, '2021-06-04 08:21:59', 0),
(32, '::1', 'b.timur504@student.uns.ac.id', 18, '2021-06-11 01:49:47', 1),
(33, '::1', 'b.timur504@student.uns.ac.id', NULL, '2021-06-11 01:50:51', 0),
(34, '::1', 'b.timur504@student.uns.ac.id', NULL, '2021-06-11 01:50:59', 0),
(35, '::1', 'b.timur504@student.uns.ac.id', 18, '2021-06-11 01:51:05', 1),
(36, '::1', 'b.timur504@student.uns.ac.id', NULL, '2021-06-11 02:07:07', 0),
(37, '::1', 'b.timur504@student.uns.ac.id', 18, '2021-06-11 02:07:13', 1),
(38, '::1', 'b.timur504@student.uns.ac.id', 18, '2021-06-11 02:24:12', 1),
(39, '::1', 'b.timur504@student.uns.ac.id', 18, '2021-06-11 02:27:26', 1),
(40, '::1', 'b.timur504@student.uns.ac.id', 18, '2021-06-11 02:28:05', 1),
(41, '::1', 'b.timur504@student.uns.ac.id', 19, '2021-06-11 03:21:45', 1),
(42, '::1', 'b.timur504@student.uns.ac.id', 19, '2021-06-11 03:24:31', 1),
(43, '::1', 'b.timur504@student.uns.ac.id', 19, '2021-06-11 03:26:22', 1),
(44, '::1', 'b.timur504@student.uns.ac.id', 19, '2021-06-11 03:27:17', 1),
(45, '::1', 'b.timur504@student.uns.ac.id', 19, '2021-06-12 01:27:46', 1),
(46, '::1', 'b.timur504@student.uns.ac.id', NULL, '2021-06-12 01:55:49', 0),
(47, '::1', 'b.timur504@student.uns.ac.id', 19, '2021-06-12 01:55:58', 1),
(48, '::1', 'b.timur504@student.uns.ac.id', 19, '2021-06-12 02:03:45', 1);

-- --------------------------------------------------------

--
-- Table structure for table `auth_permissions`
--

CREATE TABLE `auth_permissions` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `auth_permissions`
--

INSERT INTO `auth_permissions` (`id`, `name`, `description`) VALUES
(1, 'manage-member', 'Manajemen member'),
(2, 'manage-profile', 'Manajemen Profil User');

-- --------------------------------------------------------

--
-- Table structure for table `auth_reset_attempts`
--

CREATE TABLE `auth_reset_attempts` (
  `id` int(11) UNSIGNED NOT NULL,
  `email` varchar(255) NOT NULL,
  `ip_address` varchar(255) NOT NULL,
  `user_agent` varchar(255) NOT NULL,
  `token` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `auth_tokens`
--

CREATE TABLE `auth_tokens` (
  `id` int(11) UNSIGNED NOT NULL,
  `selector` varchar(255) NOT NULL,
  `hashedValidator` varchar(255) NOT NULL,
  `user_id` int(11) UNSIGNED NOT NULL,
  `expires` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `auth_users_permissions`
--

CREATE TABLE `auth_users_permissions` (
  `user_id` int(11) UNSIGNED NOT NULL DEFAULT 0,
  `permission_id` int(11) UNSIGNED NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `dokumen`
--

CREATE TABLE `dokumen` (
  `id` int(11) NOT NULL,
  `judul` varchar(255) NOT NULL,
  `nama_file` varchar(255) NOT NULL,
  `abstrak` text NOT NULL,
  `penulis` varchar(50) NOT NULL,
  `tahun_publikasi` int(11) NOT NULL,
  `status` varchar(50) NOT NULL DEFAULT 'Tersedia',
  `id_sub_kategori` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `dokumen`
--

INSERT INTO `dokumen` (`id`, `judul`, `nama_file`, `abstrak`, `penulis`, `tahun_publikasi`, `status`, `id_sub_kategori`, `created_at`, `updated_at`) VALUES
(1, 'Pengembangan Aplikasi Mobile', 'pengembalian_aplikasi_mobile.pdf', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum as', 'Bintang Timur', 2020, 'Tersedia', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(2, 'Pengembangan Aplikasi Web', 'pengembangan_aplikasi_web.pdf', 'Lorem bala bala bla blas lfkwlka\r\ndkskask lsldk slakdla aklasdk lskdlaksd laslkdlaksldk jtjr slakdlaskd lwksldkls', 'Arif Wiranata', 2019, 'Tersedia', 1, '2021-06-11 11:07:45', '2021-06-11 11:07:45');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `version` varchar(255) NOT NULL,
  `class` varchar(255) NOT NULL,
  `group` varchar(255) NOT NULL,
  `namespace` varchar(255) NOT NULL,
  `time` int(11) NOT NULL,
  `batch` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `version`, `class`, `group`, `namespace`, `time`, `batch`) VALUES
(1, '2017-11-20-223112', 'Myth\\Auth\\Database\\Migrations\\CreateAuthTables', 'default', 'Myth\\Auth', 1620986889, 1);

-- --------------------------------------------------------

--
-- Table structure for table `peminjaman`
--

CREATE TABLE `peminjaman` (
  `id` int(11) NOT NULL,
  `tgl_pinjam` varchar(20) NOT NULL,
  `tgl_kembali` varchar(20) NOT NULL,
  `deadline` varchar(20) NOT NULL,
  `token_pinjam` varchar(255) NOT NULL,
  `status` varchar(50) NOT NULL,
  `denda` int(11) NOT NULL,
  `id_dokumen` int(11) NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `ref_kategori`
--

CREATE TABLE `ref_kategori` (
  `id_kategori` int(11) NOT NULL,
  `jenis` varchar(50) NOT NULL,
  `denda` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ref_kategori`
--

INSERT INTO `ref_kategori` (`id_kategori`, `jenis`, `denda`) VALUES
(1, 'Skripsi', 5000),
(2, 'PPL', 3000),
(3, 'PI', 2000);

-- --------------------------------------------------------

--
-- Table structure for table `ref_sub_kategori`
--

CREATE TABLE `ref_sub_kategori` (
  `id_sub_kategori` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `id_kategori` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ref_sub_kategori`
--

INSERT INTO `ref_sub_kategori` (`id_sub_kategori`, `nama`, `id_kategori`) VALUES
(1, 'Penelitian Kualitatif', 1),
(2, 'Penelitian Kuantitatif', 1),
(3, 'Research and Development', 1),
(4, 'Mixed Method', 1),
(5, 'RPL', 2),
(6, 'Multimedia', 2),
(7, 'Jaringan', 2),
(8, 'RPL', 3),
(9, 'Multimedia', 3),
(10, 'Jaringan', 3);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) UNSIGNED NOT NULL,
  `email` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `nama` varchar(255) DEFAULT NULL,
  `nim` varchar(255) DEFAULT NULL,
  `no_hp` varchar(255) DEFAULT NULL,
  `alamat` varchar(255) DEFAULT NULL,
  `avatar` varchar(255) NOT NULL DEFAULT 'default.png',
  `password_hash` varchar(255) NOT NULL,
  `reset_hash` varchar(255) DEFAULT NULL,
  `reset_at` datetime DEFAULT NULL,
  `reset_expires` datetime DEFAULT NULL,
  `activate_hash` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `status_message` varchar(255) DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT 0,
  `force_pass_reset` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `username`, `nama`, `nim`, `no_hp`, `alamat`, `avatar`, `password_hash`, `reset_hash`, `reset_at`, `reset_expires`, `activate_hash`, `status`, `status_message`, `active`, `force_pass_reset`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'arifpatanduk2@gmail.com', 'arifpatanduk', NULL, NULL, NULL, NULL, 'default.png', '$2y$10$flTlCVPGXkrnapFL.S49uubSX5Amzn9DSr9WMJ/4qtROxhxkErTeq', NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, '2021-05-14 14:53:23', '2021-05-14 14:53:23', NULL),
(6, 'andriapuspita9@gmail.com', 'test', NULL, NULL, NULL, NULL, 'default.png', '$2y$10$nJHjgJU.vtZ15zSeZGnb/usfmK75eLnNRiO0sSMK4SoqYlWb5ixm6', NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, '2021-05-19 02:35:15', '2021-05-26 01:30:51', NULL),
(12, 'arifp@student.uns.ac.id', 'arifp', NULL, NULL, NULL, NULL, 'default.png', '$2y$10$QF0sbYKLmNuG8J6/y52tLeECnD8aStMT9HjGmVwnnp997kt2IfkRG', NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, '2021-05-26 23:00:18', '2021-05-26 23:00:33', NULL),
(19, 'b.timur504@student.uns.ac.id', 'bintangtimurk', 'bintang', 'K3518015', '134', 'Surakarta', 'default.png', '$2y$10$d3mgWE6P/Q6vMTonpQGG6uEnntGSQ/WAk35bc0WBIsGbG/JTBGMQ2', NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, '2021-06-11 03:19:53', '2021-06-11 03:19:53', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `auth_activation_attempts`
--
ALTER TABLE `auth_activation_attempts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `auth_groups`
--
ALTER TABLE `auth_groups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `auth_groups_permissions`
--
ALTER TABLE `auth_groups_permissions`
  ADD KEY `auth_groups_permissions_permission_id_foreign` (`permission_id`),
  ADD KEY `group_id_permission_id` (`group_id`,`permission_id`);

--
-- Indexes for table `auth_groups_users`
--
ALTER TABLE `auth_groups_users`
  ADD KEY `auth_groups_users_user_id_foreign` (`user_id`),
  ADD KEY `group_id_user_id` (`group_id`,`user_id`);

--
-- Indexes for table `auth_logins`
--
ALTER TABLE `auth_logins`
  ADD PRIMARY KEY (`id`),
  ADD KEY `email` (`email`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `auth_permissions`
--
ALTER TABLE `auth_permissions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `auth_reset_attempts`
--
ALTER TABLE `auth_reset_attempts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `auth_tokens`
--
ALTER TABLE `auth_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `auth_tokens_user_id_foreign` (`user_id`),
  ADD KEY `selector` (`selector`);

--
-- Indexes for table `auth_users_permissions`
--
ALTER TABLE `auth_users_permissions`
  ADD KEY `auth_users_permissions_permission_id_foreign` (`permission_id`),
  ADD KEY `user_id_permission_id` (`user_id`,`permission_id`);

--
-- Indexes for table `dokumen`
--
ALTER TABLE `dokumen`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_sub_kategori` (`id_sub_kategori`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `peminjaman`
--
ALTER TABLE `peminjaman`
  ADD KEY `id_dokumen` (`id_dokumen`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `ref_kategori`
--
ALTER TABLE `ref_kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `ref_sub_kategori`
--
ALTER TABLE `ref_sub_kategori`
  ADD PRIMARY KEY (`id_sub_kategori`),
  ADD KEY `id_kategori` (`id_kategori`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `auth_activation_attempts`
--
ALTER TABLE `auth_activation_attempts`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `auth_groups`
--
ALTER TABLE `auth_groups`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `auth_logins`
--
ALTER TABLE `auth_logins`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `auth_permissions`
--
ALTER TABLE `auth_permissions`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `auth_reset_attempts`
--
ALTER TABLE `auth_reset_attempts`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `auth_tokens`
--
ALTER TABLE `auth_tokens`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `dokumen`
--
ALTER TABLE `dokumen`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `ref_kategori`
--
ALTER TABLE `ref_kategori`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `ref_sub_kategori`
--
ALTER TABLE `ref_sub_kategori`
  MODIFY `id_sub_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `auth_groups_permissions`
--
ALTER TABLE `auth_groups_permissions`
  ADD CONSTRAINT `auth_groups_permissions_group_id_foreign` FOREIGN KEY (`group_id`) REFERENCES `auth_groups` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `auth_groups_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `auth_permissions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `auth_groups_users`
--
ALTER TABLE `auth_groups_users`
  ADD CONSTRAINT `auth_groups_users_group_id_foreign` FOREIGN KEY (`group_id`) REFERENCES `auth_groups` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `auth_groups_users_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `auth_tokens`
--
ALTER TABLE `auth_tokens`
  ADD CONSTRAINT `auth_tokens_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `auth_users_permissions`
--
ALTER TABLE `auth_users_permissions`
  ADD CONSTRAINT `auth_users_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `auth_permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `auth_users_permissions_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `dokumen`
--
ALTER TABLE `dokumen`
  ADD CONSTRAINT `dokumen_ibfk_1` FOREIGN KEY (`id_sub_kategori`) REFERENCES `ref_sub_kategori` (`id_sub_kategori`);

--
-- Constraints for table `ref_sub_kategori`
--
ALTER TABLE `ref_sub_kategori`
  ADD CONSTRAINT `ref_sub_kategori_ibfk_1` FOREIGN KEY (`id_kategori`) REFERENCES `ref_kategori` (`id_kategori`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
