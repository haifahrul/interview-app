-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Dec 31, 2018 at 07:30 PM
-- Server version: 5.7.24-0ubuntu0.18.04.1
-- PHP Version: 7.1.25-1+ubuntu18.04.1+deb.sury.org+1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `interview-app`
--

-- --------------------------------------------------------

--
-- Table structure for table `aspek_penilaian`
--

CREATE TABLE `aspek_penilaian` (
  `id` int(11) NOT NULL,
  `nama` longtext NOT NULL,
  `aspek_penilaian_tipe_id` int(11) NOT NULL,
  `order` tinyint(4) DEFAULT NULL,
  `is_active` tinyint(4) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `aspek_penilaian`
--

INSERT INTO `aspek_penilaian` (`id`, `nama`, `aspek_penilaian_tipe_id`, `order`, `is_active`) VALUES
(1, 'Penampilan', 1, NULL, 1),
(2, 'Suara', 1, NULL, 1),
(3, 'Gaya', 1, NULL, 1),
(4, 'Kepercayaan Diri', 1, NULL, 1),
(5, 'Motivasi Kerja', 1, NULL, 1),
(6, 'Inisiatif', 1, NULL, 1),
(7, 'Kemampuan belajar dan mengembangkan diri', 1, NULL, 1),
(8, 'Adaptasi', 1, NULL, 1),
(9, 'Pengenalan terhadap perguruan tinggi dan pekerjaan yang dilamar', 1, NULL, 1),
(10, 'Kesesuaian minat dengan posisi yang dilamar', 1, NULL, 1),
(11, 'Kesesuaian pendidikan dengan posisi yang dilamar', 1, NULL, 1),
(12, 'Kesesuaian pengalaman kerja dengan dan pengetahuan dengan posisi yang dilamar (Untuk berpengalaman kerja)', 1, NULL, 1),
(13, 'Sikap kesesuaian terhadap nilai-nilai perguruan tinggi', 2, NULL, 1),
(14, 'Selalu berusaha melakukan yang terbaik', 2, NULL, 1),
(15, 'Bersikap, bertindak dan berperilaku profesional', 2, NULL, 1),
(16, 'Bersikap peduli', 2, NULL, 1),
(17, 'Achievement', 3, NULL, 1),
(18, 'Communication', 3, NULL, 1),
(19, 'Human Relation', 3, NULL, 1),
(20, 'Planning & Organization', 3, NULL, 1),
(21, 'Teamwork', 3, NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `aspek_penilaian_tipe`
--

CREATE TABLE `aspek_penilaian_tipe` (
  `id` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `order` tinyint(4) DEFAULT NULL,
  `is_active` tinyint(4) NOT NULL DEFAULT '1' COMMENT '1. Active, 2. Non Active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `aspek_penilaian_tipe`
--

INSERT INTO `aspek_penilaian_tipe` (`id`, `nama`, `order`, `is_active`) VALUES
(1, 'Umum', 4, 1),
(2, 'Wawancara Pendalaman', 2, 1),
(3, 'Kompetensi', 3, 1);

-- --------------------------------------------------------

--
-- Table structure for table `auth_assignment`
--

CREATE TABLE `auth_assignment` (
  `item_name` varchar(64) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `user_id` varchar(64) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `created_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `auth_assignment`
--

INSERT INTO `auth_assignment` (`item_name`, `user_id`, `created_at`) VALUES
('Administrator', '2', NULL),
('Interviewer', '10', 1530715300),
('Interviewer', '15', 1530636027),
('Super User', '1', 1526294085);

-- --------------------------------------------------------

--
-- Table structure for table `auth_item`
--

CREATE TABLE `auth_item` (
  `name` varchar(64) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `type` smallint(6) NOT NULL,
  `description` text CHARACTER SET utf8 COLLATE utf8_unicode_ci,
  `rule_name` varchar(64) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `data` blob,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `auth_item`
--

INSERT INTO `auth_item` (`name`, `type`, `description`, `rule_name`, `data`, `created_at`, `updated_at`) VALUES
('/*', 2, NULL, NULL, NULL, 1543052767, 1543052767),
('/admin/*', 2, NULL, NULL, NULL, 1543052767, 1543052767),
('/admin/aspek-penilaian-tipe/*', 2, NULL, NULL, NULL, 1543052767, 1543052767),
('/admin/aspek-penilaian-tipe/create', 2, NULL, NULL, NULL, 1543052767, 1543052767),
('/admin/aspek-penilaian-tipe/delete', 2, NULL, NULL, NULL, 1543052767, 1543052767),
('/admin/aspek-penilaian-tipe/delete-items', 2, NULL, NULL, NULL, 1543052767, 1543052767),
('/admin/aspek-penilaian-tipe/index', 2, NULL, NULL, NULL, 1543052767, 1543052767),
('/admin/aspek-penilaian-tipe/update', 2, NULL, NULL, NULL, 1543052767, 1543052767),
('/admin/aspek-penilaian-tipe/view', 2, NULL, NULL, NULL, 1543052767, 1543052767),
('/admin/aspek-penilaian/*', 2, NULL, NULL, NULL, 1543052767, 1543052767),
('/admin/aspek-penilaian/create', 2, NULL, NULL, NULL, 1543052767, 1543052767),
('/admin/aspek-penilaian/delete', 2, NULL, NULL, NULL, 1543052767, 1543052767),
('/admin/aspek-penilaian/delete-items', 2, NULL, NULL, NULL, 1543052767, 1543052767),
('/admin/aspek-penilaian/index', 2, NULL, NULL, NULL, 1543052767, 1543052767),
('/admin/aspek-penilaian/update', 2, NULL, NULL, NULL, 1543052767, 1543052767),
('/admin/aspek-penilaian/view', 2, NULL, NULL, NULL, 1543052767, 1543052767),
('/admin/default/*', 2, NULL, NULL, NULL, 1543052767, 1543052767),
('/admin/default/index', 2, NULL, NULL, NULL, 1543052767, 1543052767),
('/admin/fakultas-unit/*', 2, NULL, NULL, NULL, 1543052767, 1543052767),
('/admin/fakultas-unit/create', 2, NULL, NULL, NULL, 1543052767, 1543052767),
('/admin/fakultas-unit/delete', 2, NULL, NULL, NULL, 1543052767, 1543052767),
('/admin/fakultas-unit/delete-items', 2, NULL, NULL, NULL, 1543052767, 1543052767),
('/admin/fakultas-unit/index', 2, NULL, NULL, NULL, 1543052767, 1543052767),
('/admin/fakultas-unit/update', 2, NULL, NULL, NULL, 1543052767, 1543052767),
('/admin/fakultas-unit/view', 2, NULL, NULL, NULL, 1543052767, 1543052767),
('/admin/formulir/*', 2, NULL, NULL, NULL, 1543052767, 1543052767),
('/admin/formulir/cetak', 2, NULL, NULL, NULL, 1543052767, 1543052767),
('/admin/formulir/delete', 2, NULL, NULL, NULL, 1543052767, 1543052767),
('/admin/formulir/index', 2, NULL, NULL, NULL, 1543052767, 1543052767),
('/admin/formulir/view', 2, NULL, NULL, NULL, 1543052767, 1543052767),
('/admin/jabatan/*', 2, NULL, NULL, NULL, 1543052767, 1543052767),
('/admin/jabatan/create', 2, NULL, NULL, NULL, 1543052767, 1543052767),
('/admin/jabatan/delete', 2, NULL, NULL, NULL, 1543052767, 1543052767),
('/admin/jabatan/delete-items', 2, NULL, NULL, NULL, 1543052767, 1543052767),
('/admin/jabatan/index', 2, NULL, NULL, NULL, 1543052767, 1543052767),
('/admin/jabatan/update', 2, NULL, NULL, NULL, 1543052767, 1543052767),
('/admin/jabatan/view', 2, NULL, NULL, NULL, 1543052767, 1543052767),
('/admin/jadwal-wawancara/*', 2, NULL, NULL, NULL, 1543052767, 1543052767),
('/admin/jadwal-wawancara/ajax-get-list-interviewer', 2, NULL, NULL, NULL, 1543052767, 1543052767),
('/admin/jadwal-wawancara/create', 2, NULL, NULL, NULL, 1543052767, 1543052767),
('/admin/jadwal-wawancara/delete', 2, NULL, NULL, NULL, 1543052767, 1543052767),
('/admin/jadwal-wawancara/delete-items', 2, NULL, NULL, NULL, 1543052767, 1543052767),
('/admin/jadwal-wawancara/index', 2, NULL, NULL, NULL, 1543052767, 1543052767),
('/admin/jadwal-wawancara/update', 2, NULL, NULL, NULL, 1543052767, 1543052767),
('/admin/jadwal-wawancara/view', 2, NULL, NULL, NULL, 1543052767, 1543052767),
('/admin/keputusan-tipe/*', 2, NULL, NULL, NULL, 1543052767, 1543052767),
('/admin/keputusan-tipe/create', 2, NULL, NULL, NULL, 1543052767, 1543052767),
('/admin/keputusan-tipe/delete', 2, NULL, NULL, NULL, 1543052767, 1543052767),
('/admin/keputusan-tipe/delete-items', 2, NULL, NULL, NULL, 1543052767, 1543052767),
('/admin/keputusan-tipe/index', 2, NULL, NULL, NULL, 1543052767, 1543052767),
('/admin/keputusan-tipe/update', 2, NULL, NULL, NULL, 1543052767, 1543052767),
('/admin/keputusan-tipe/view', 2, NULL, NULL, NULL, 1543052767, 1543052767),
('/admin/log-error/*', 2, NULL, NULL, NULL, 1543052767, 1543052767),
('/admin/log-error/clear-log-error', 2, NULL, NULL, NULL, 1543052767, 1543052767),
('/admin/log-error/index', 2, NULL, NULL, NULL, 1543052767, 1543052767),
('/admin/log-error/view', 2, NULL, NULL, NULL, 1543052767, 1543052767),
('/admin/mulai-interview/*', 2, NULL, NULL, NULL, 1543052767, 1543052767),
('/admin/mulai-interview/create', 2, NULL, NULL, NULL, 1543052767, 1543052767),
('/admin/mulai-interview/view', 2, NULL, NULL, NULL, 1543052767, 1543052767),
('/admin/profile/*', 2, NULL, NULL, NULL, 1543052767, 1543052767),
('/admin/profile/captcha', 2, NULL, NULL, NULL, 1543052767, 1543052767),
('/admin/profile/change-password', 2, NULL, NULL, NULL, 1543052767, 1543052767),
('/admin/profile/change-theme', 2, NULL, NULL, NULL, 1543052767, 1543052767),
('/admin/profile/error', 2, NULL, NULL, NULL, 1543052767, 1543052767),
('/admin/profile/index', 2, NULL, NULL, NULL, 1543052767, 1543052767),
('/admin/site/*', 2, NULL, NULL, NULL, 1543052767, 1543052767),
('/admin/site/about', 2, NULL, NULL, NULL, 1543052767, 1543052767),
('/admin/site/captcha', 2, NULL, NULL, NULL, 1543052767, 1543052767),
('/admin/site/contact', 2, NULL, NULL, NULL, 1543052767, 1543052767),
('/admin/site/error', 2, NULL, NULL, NULL, 1543052767, 1543052767),
('/admin/site/index', 2, NULL, NULL, NULL, 1543052767, 1543052767),
('/admin/site/lang', 2, NULL, NULL, NULL, 1543052767, 1543052767),
('/admin/site/login', 2, NULL, NULL, NULL, 1543052767, 1543052767),
('/admin/site/logout', 2, NULL, NULL, NULL, 1543052767, 1543052767),
('/admin/user-calon/*', 2, NULL, NULL, NULL, 1543052767, 1543052767),
('/admin/user-calon/create', 2, NULL, NULL, NULL, 1543052767, 1543052767),
('/admin/user-calon/delete', 2, NULL, NULL, NULL, 1543052767, 1543052767),
('/admin/user-calon/delete-items', 2, NULL, NULL, NULL, 1543052767, 1543052767),
('/admin/user-calon/download-cv', 2, NULL, NULL, NULL, 1543052767, 1543052767),
('/admin/user-calon/index', 2, NULL, NULL, NULL, 1543052767, 1543052767),
('/admin/user-calon/update', 2, NULL, NULL, NULL, 1543052767, 1543052767),
('/admin/user-calon/view', 2, NULL, NULL, NULL, 1543052767, 1543052767),
('/admin/user-interviewer/*', 2, NULL, NULL, NULL, 1543052767, 1543052767),
('/admin/user-interviewer/create', 2, NULL, NULL, NULL, 1543052767, 1543052767),
('/admin/user-interviewer/delete', 2, NULL, NULL, NULL, 1543052767, 1543052767),
('/admin/user-interviewer/delete-items', 2, NULL, NULL, NULL, 1543052767, 1543052767),
('/admin/user-interviewer/index', 2, NULL, NULL, NULL, 1543052767, 1543052767),
('/admin/user-interviewer/update', 2, NULL, NULL, NULL, 1543052767, 1543052767),
('/admin/user-interviewer/view', 2, NULL, NULL, NULL, 1543052767, 1543052767),
('/debug/*', 2, NULL, NULL, NULL, 1543052767, 1543052767),
('/debug/default/*', 2, NULL, NULL, NULL, 1543052767, 1543052767),
('/debug/default/db-explain', 2, NULL, NULL, NULL, 1543052767, 1543052767),
('/debug/default/download-mail', 2, NULL, NULL, NULL, 1543052767, 1543052767),
('/debug/default/index', 2, NULL, NULL, NULL, 1543052767, 1543052767),
('/debug/default/toolbar', 2, NULL, NULL, NULL, 1543052767, 1543052767),
('/debug/default/view', 2, NULL, NULL, NULL, 1543052767, 1543052767),
('/debug/user/*', 2, NULL, NULL, NULL, 1543052767, 1543052767),
('/debug/user/reset-identity', 2, NULL, NULL, NULL, 1543052767, 1543052767),
('/debug/user/set-identity', 2, NULL, NULL, NULL, 1543052767, 1543052767),
('/gii/*', 2, NULL, NULL, NULL, 1543052767, 1543052767),
('/gii/default/*', 2, NULL, NULL, NULL, 1543059982, 1543059982),
('/gii/default/action', 2, NULL, NULL, NULL, 1543052767, 1543052767),
('/gii/default/diff', 2, NULL, NULL, NULL, 1543052767, 1543052767),
('/gii/default/index', 2, NULL, NULL, NULL, 1543052767, 1543052767),
('/gii/default/preview', 2, NULL, NULL, NULL, 1543052767, 1543052767),
('/gii/default/view', 2, NULL, NULL, NULL, 1543052767, 1543052767),
('/gridview/*', 2, NULL, NULL, NULL, 1543052767, 1543052767),
('/gridview/export/*', 2, NULL, NULL, NULL, 1543052767, 1543052767),
('/gridview/export/download', 2, NULL, NULL, NULL, 1543052767, 1543052767),
('/log-error/*', 2, NULL, NULL, NULL, 1543052767, 1543052767),
('/log-error/clear-log-error', 2, NULL, NULL, NULL, 1543052767, 1543052767),
('/log-error/index', 2, NULL, NULL, NULL, 1543052767, 1543052767),
('/log-error/view', 2, NULL, NULL, NULL, 1543052767, 1543052767),
('/log/*', 2, NULL, NULL, NULL, 1543052767, 1543052767),
('/log/create/*', 2, NULL, NULL, NULL, 1543052767, 1543052767),
('/log/create/create', 2, NULL, NULL, NULL, 1543052767, 1543052767),
('/log/create/delete', 2, NULL, NULL, NULL, 1543052767, 1543052767),
('/log/create/delete-items', 2, NULL, NULL, NULL, 1543052767, 1543052767),
('/log/create/index', 2, NULL, NULL, NULL, 1543052767, 1543052767),
('/log/create/update', 2, NULL, NULL, NULL, 1543052767, 1543052767),
('/log/create/view', 2, NULL, NULL, NULL, 1543052767, 1543052767),
('/log/default/*', 2, NULL, NULL, NULL, 1543052767, 1543052767),
('/log/default/index', 2, NULL, NULL, NULL, 1543052767, 1543052767),
('/log/delete/*', 2, NULL, NULL, NULL, 1543052767, 1543052767),
('/log/delete/create', 2, NULL, NULL, NULL, 1543052767, 1543052767),
('/log/delete/delete', 2, NULL, NULL, NULL, 1543052767, 1543052767),
('/log/delete/delete-items', 2, NULL, NULL, NULL, 1543052767, 1543052767),
('/log/delete/index', 2, NULL, NULL, NULL, 1543052767, 1543052767),
('/log/delete/update', 2, NULL, NULL, NULL, 1543052767, 1543052767),
('/log/delete/view', 2, NULL, NULL, NULL, 1543052767, 1543052767),
('/log/download/*', 2, NULL, NULL, NULL, 1543052767, 1543052767),
('/log/download/create', 2, NULL, NULL, NULL, 1543052767, 1543052767),
('/log/download/delete', 2, NULL, NULL, NULL, 1543052767, 1543052767),
('/log/download/delete-items', 2, NULL, NULL, NULL, 1543052767, 1543052767),
('/log/download/index', 2, NULL, NULL, NULL, 1543052767, 1543052767),
('/log/download/update', 2, NULL, NULL, NULL, 1543052767, 1543052767),
('/log/download/view', 2, NULL, NULL, NULL, 1543052767, 1543052767),
('/log/events/*', 2, NULL, NULL, NULL, 1543052767, 1543052767),
('/log/events/create', 2, NULL, NULL, NULL, 1543052767, 1543052767),
('/log/events/delete', 2, NULL, NULL, NULL, 1543052767, 1543052767),
('/log/events/delete-items', 2, NULL, NULL, NULL, 1543052767, 1543052767),
('/log/events/index', 2, NULL, NULL, NULL, 1543052767, 1543052767),
('/log/events/update', 2, NULL, NULL, NULL, 1543052767, 1543052767),
('/log/events/view', 2, NULL, NULL, NULL, 1543052767, 1543052767),
('/log/login/*', 2, NULL, NULL, NULL, 1543052767, 1543052767),
('/log/login/index', 2, NULL, NULL, NULL, 1543052767, 1543052767),
('/log/login/view', 2, NULL, NULL, NULL, 1543052767, 1543052767),
('/log/main/*', 2, NULL, NULL, NULL, 1543052767, 1543052767),
('/log/print/*', 2, NULL, NULL, NULL, 1543052767, 1543052767),
('/log/print/create', 2, NULL, NULL, NULL, 1543052767, 1543052767),
('/log/print/delete', 2, NULL, NULL, NULL, 1543052767, 1543052767),
('/log/print/delete-items', 2, NULL, NULL, NULL, 1543052767, 1543052767),
('/log/print/index', 2, NULL, NULL, NULL, 1543052767, 1543052767),
('/log/print/update', 2, NULL, NULL, NULL, 1543052767, 1543052767),
('/log/print/view', 2, NULL, NULL, NULL, 1543052767, 1543052767),
('/log/sql-error/*', 2, NULL, NULL, NULL, 1543052767, 1543052767),
('/log/sql-error/index', 2, NULL, NULL, NULL, 1543052767, 1543052767),
('/log/update/*', 2, NULL, NULL, NULL, 1543052767, 1543052767),
('/log/update/create', 2, NULL, NULL, NULL, 1543052767, 1543052767),
('/log/update/delete', 2, NULL, NULL, NULL, 1543052767, 1543052767),
('/log/update/delete-items', 2, NULL, NULL, NULL, 1543052767, 1543052767),
('/log/update/index', 2, NULL, NULL, NULL, 1543052767, 1543052767),
('/log/update/update', 2, NULL, NULL, NULL, 1543052767, 1543052767),
('/log/update/view', 2, NULL, NULL, NULL, 1543052767, 1543052767),
('/log/view/*', 2, NULL, NULL, NULL, 1543052767, 1543052767),
('/log/view/create', 2, NULL, NULL, NULL, 1543052767, 1543052767),
('/log/view/delete', 2, NULL, NULL, NULL, 1543052767, 1543052767),
('/log/view/delete-items', 2, NULL, NULL, NULL, 1543052767, 1543052767),
('/log/view/index', 2, NULL, NULL, NULL, 1543052767, 1543052767),
('/log/view/update', 2, NULL, NULL, NULL, 1543052767, 1543052767),
('/log/view/view', 2, NULL, NULL, NULL, 1543052767, 1543052767),
('/pdfjs/*', 2, NULL, NULL, NULL, 1543052767, 1543052767),
('/pdfjs/default/*', 2, NULL, NULL, NULL, 1543052767, 1543052767),
('/pdfjs/default/index', 2, NULL, NULL, NULL, 1543052767, 1543052767),
('/profile/*', 2, NULL, NULL, NULL, 1543052767, 1543052767),
('/profile/captcha', 2, NULL, NULL, NULL, 1543052767, 1543052767),
('/profile/change-password', 2, NULL, NULL, NULL, 1543052767, 1543052767),
('/profile/change-theme', 2, NULL, NULL, NULL, 1543052767, 1543052767),
('/profile/error', 2, NULL, NULL, NULL, 1543052767, 1543052767),
('/profile/index', 2, NULL, NULL, NULL, 1543052767, 1543052767),
('/site/*', 2, NULL, NULL, NULL, 1543052767, 1543052767),
('/site/about', 2, NULL, NULL, NULL, 1543052767, 1543052767),
('/site/apply-lamaran', 2, NULL, NULL, NULL, 1543052767, 1543052767),
('/site/captcha', 2, NULL, NULL, NULL, 1543052767, 1543052767),
('/site/contact', 2, NULL, NULL, NULL, 1543052767, 1543052767),
('/site/error', 2, NULL, NULL, NULL, 1543052767, 1543052767),
('/site/forgot-password', 2, NULL, NULL, NULL, 1543052767, 1543052767),
('/site/index', 2, NULL, NULL, NULL, 1543052767, 1543052767),
('/site/lang', 2, NULL, NULL, NULL, 1543052767, 1543052767),
('/site/login', 2, NULL, NULL, NULL, 1543052767, 1543052767),
('/site/logout', 2, NULL, NULL, NULL, 1543052767, 1543052767),
('/userManagement/*', 2, NULL, NULL, NULL, 1543052767, 1543052767),
('/userManagement/default/*', 2, NULL, NULL, NULL, 1543052767, 1543052767),
('/userManagement/default/change-password', 2, NULL, NULL, NULL, 1543052767, 1543052767),
('/userManagement/default/create', 2, NULL, NULL, NULL, 1543052767, 1543052767),
('/userManagement/default/delete', 2, NULL, NULL, NULL, 1543052767, 1543052767),
('/userManagement/default/index', 2, NULL, NULL, NULL, 1543052767, 1543052767),
('/userManagement/default/open-banned', 2, NULL, NULL, NULL, 1543052767, 1543052767),
('/userManagement/default/update', 2, NULL, NULL, NULL, 1543052767, 1543052767),
('/userManagement/default/view', 2, NULL, NULL, NULL, 1543052767, 1543052767),
('/webmaster/*', 2, NULL, NULL, NULL, 1543052767, 1543052767),
('/webmaster/assignment/*', 2, NULL, NULL, NULL, 1543052767, 1543052767),
('/webmaster/assignment/assign', 2, NULL, NULL, NULL, 1543052767, 1543052767),
('/webmaster/assignment/index', 2, NULL, NULL, NULL, 1543052767, 1543052767),
('/webmaster/assignment/revoke', 2, NULL, NULL, NULL, 1543052767, 1543052767),
('/webmaster/assignment/view', 2, NULL, NULL, NULL, 1543052767, 1543052767),
('/webmaster/default/*', 2, NULL, NULL, NULL, 1543052767, 1543052767),
('/webmaster/default/index', 2, NULL, NULL, NULL, 1543052767, 1543052767),
('/webmaster/menu/*', 2, NULL, NULL, NULL, 1543052767, 1543052767),
('/webmaster/menu/create', 2, NULL, NULL, NULL, 1543052767, 1543052767),
('/webmaster/menu/delete', 2, NULL, NULL, NULL, 1543052767, 1543052767),
('/webmaster/menu/index', 2, NULL, NULL, NULL, 1543052767, 1543052767),
('/webmaster/menu/update', 2, NULL, NULL, NULL, 1543052767, 1543052767),
('/webmaster/menu/view', 2, NULL, NULL, NULL, 1543052767, 1543052767),
('/webmaster/permission/*', 2, NULL, NULL, NULL, 1543052767, 1543052767),
('/webmaster/permission/assign', 2, NULL, NULL, NULL, 1543052767, 1543052767),
('/webmaster/permission/create', 2, NULL, NULL, NULL, 1543052767, 1543052767),
('/webmaster/permission/delete', 2, NULL, NULL, NULL, 1543052767, 1543052767),
('/webmaster/permission/index', 2, NULL, NULL, NULL, 1543052767, 1543052767),
('/webmaster/permission/remove', 2, NULL, NULL, NULL, 1543052767, 1543052767),
('/webmaster/permission/update', 2, NULL, NULL, NULL, 1543052767, 1543052767),
('/webmaster/permission/view', 2, NULL, NULL, NULL, 1543052767, 1543052767),
('/webmaster/role/*', 2, NULL, NULL, NULL, 1543052767, 1543052767),
('/webmaster/role/assign', 2, NULL, NULL, NULL, 1543052767, 1543052767),
('/webmaster/role/create', 2, NULL, NULL, NULL, 1543052767, 1543052767),
('/webmaster/role/delete', 2, NULL, NULL, NULL, 1543052767, 1543052767),
('/webmaster/role/index', 2, NULL, NULL, NULL, 1543052767, 1543052767),
('/webmaster/role/remove', 2, NULL, NULL, NULL, 1543052767, 1543052767),
('/webmaster/role/update', 2, NULL, NULL, NULL, 1543052767, 1543052767),
('/webmaster/role/view', 2, NULL, NULL, NULL, 1543052767, 1543052767),
('/webmaster/route/*', 2, NULL, NULL, NULL, 1543052767, 1543052767),
('/webmaster/route/assign', 2, NULL, NULL, NULL, 1543052767, 1543052767),
('/webmaster/route/create', 2, NULL, NULL, NULL, 1543052767, 1543052767),
('/webmaster/route/index', 2, NULL, NULL, NULL, 1543052767, 1543052767),
('/webmaster/route/refresh', 2, NULL, NULL, NULL, 1543052767, 1543052767),
('/webmaster/route/remove', 2, NULL, NULL, NULL, 1543052767, 1543052767),
('/webmaster/rule/*', 2, NULL, NULL, NULL, 1543052767, 1543052767),
('/webmaster/rule/create', 2, NULL, NULL, NULL, 1543052767, 1543052767),
('/webmaster/rule/delete', 2, NULL, NULL, NULL, 1543052767, 1543052767),
('/webmaster/rule/index', 2, NULL, NULL, NULL, 1543052767, 1543052767),
('/webmaster/rule/update', 2, NULL, NULL, NULL, 1543052767, 1543052767),
('/webmaster/rule/view', 2, NULL, NULL, NULL, 1543052767, 1543052767),
('/webmaster/user/*', 2, NULL, NULL, NULL, 1543052767, 1543052767),
('/webmaster/user/activate', 2, NULL, NULL, NULL, 1543052767, 1543052767),
('/webmaster/user/change-password', 2, NULL, NULL, NULL, 1543052767, 1543052767),
('/webmaster/user/delete', 2, NULL, NULL, NULL, 1543052767, 1543052767),
('/webmaster/user/index', 2, NULL, NULL, NULL, 1543052767, 1543052767),
('/webmaster/user/login', 2, NULL, NULL, NULL, 1543052767, 1543052767),
('/webmaster/user/logout', 2, NULL, NULL, NULL, 1543052767, 1543052767),
('/webmaster/user/request-password-reset', 2, NULL, NULL, NULL, 1543052767, 1543052767),
('/webmaster/user/reset-password', 2, NULL, NULL, NULL, 1543052767, 1543052767),
('/webmaster/user/signup', 2, NULL, NULL, NULL, 1543052767, 1543052767),
('/webmaster/user/view', 2, NULL, NULL, NULL, 1543052767, 1543052767),
('Administrator', 1, NULL, NULL, NULL, 1505395874, 1515924499),
('Basic Access', 2, 'Akses Beranda, update profile, logout', NULL, NULL, 1530554361, 1530554361),
('Data Master', 2, 'Administraor and Super User Only', NULL, NULL, 1530554385, 1530635117),
('Interviewer', 1, NULL, NULL, NULL, 1525951080, 1530635576),
('Interviewer - Data Calon', 2, 'wihtout route delete, create & update', NULL, NULL, 1530624375, 1530635347),
('Interviewer - Hasil Wawancara', 2, NULL, NULL, NULL, 1530716940, 1530716940),
('Interviewer - Jadwal Wawancara', 2, NULL, NULL, NULL, 1543053909, 1543053948),
('Jadwal Wawancara Full Akses', 2, NULL, NULL, NULL, 1530640186, 1530640186),
('Pelamar', 1, NULL, NULL, NULL, 1543054495, 1543054495),
('Super User', 1, NULL, NULL, NULL, 1509549076, 1515924470);

-- --------------------------------------------------------

--
-- Table structure for table `auth_item_child`
--

CREATE TABLE `auth_item_child` (
  `parent` varchar(64) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `child` varchar(64) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `auth_item_child`
--

INSERT INTO `auth_item_child` (`parent`, `child`) VALUES
('Super User', '/*'),
('Data Master', '/admin/aspek-penilaian-tipe/*'),
('Data Master', '/admin/aspek-penilaian/*'),
('Basic Access', '/admin/default/index'),
('Data Master', '/admin/fakultas-unit/*'),
('Administrator', '/admin/formulir/cetak'),
('Interviewer', '/admin/formulir/cetak'),
('Administrator', '/admin/formulir/index'),
('Interviewer', '/admin/formulir/index'),
('Interviewer - Hasil Wawancara', '/admin/formulir/index'),
('Administrator', '/admin/formulir/view'),
('Interviewer', '/admin/formulir/view'),
('Interviewer - Hasil Wawancara', '/admin/formulir/view'),
('Data Master', '/admin/jabatan/*'),
('Administrator', '/admin/jadwal-wawancara/*'),
('Jadwal Wawancara Full Akses', '/admin/jadwal-wawancara/*'),
('Interviewer', '/admin/jadwal-wawancara/index'),
('Interviewer - Jadwal Wawancara', '/admin/jadwal-wawancara/index'),
('Interviewer', '/admin/jadwal-wawancara/view'),
('Interviewer - Jadwal Wawancara', '/admin/jadwal-wawancara/view'),
('Data Master', '/admin/keputusan-tipe/*'),
('Interviewer', '/admin/mulai-interview/*'),
('Administrator', '/admin/profile/*'),
('Basic Access', '/admin/profile/*'),
('Administrator', '/admin/site/*'),
('Basic Access', '/admin/site/*'),
('Administrator', '/admin/user-calon/*'),
('Interviewer - Data Calon', '/admin/user-calon/download-cv'),
('Interviewer - Data Calon', '/admin/user-calon/index'),
('Interviewer - Data Calon', '/admin/user-calon/view'),
('Administrator', '/admin/user-interviewer/*'),
('Basic Access', '/profile/*'),
('Basic Access', '/site/*'),
('Pelamar', '/site/*'),
('Administrator', 'Basic Access'),
('Interviewer', 'Basic Access'),
('Administrator', 'Data Master'),
('Interviewer', 'Interviewer - Data Calon'),
('Interviewer', 'Interviewer - Hasil Wawancara'),
('Interviewer', 'Interviewer - Jadwal Wawancara');

-- --------------------------------------------------------

--
-- Table structure for table `auth_rule`
--

CREATE TABLE `auth_rule` (
  `name` varchar(64) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `data` blob,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `fakultas_unit`
--

CREATE TABLE `fakultas_unit` (
  `id` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `is_active` tinyint(4) NOT NULL DEFAULT '1' COMMENT '1. Active, 2. Non Active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `fakultas_unit`
--

INSERT INTO `fakultas_unit` (`id`, `nama`, `is_active`) VALUES
(1, 'Fakultas Teknik', 1),
(2, 'Fakultas Kedokteran & Kesehatan', 1);

-- --------------------------------------------------------

--
-- Table structure for table `formulir`
--

CREATE TABLE `formulir` (
  `id` int(11) NOT NULL,
  `calon_id` int(11) NOT NULL,
  `interviewer_id` int(11) NOT NULL,
  `tanggal_wawancara` date NOT NULL,
  `waktu` time NOT NULL,
  `catatan` longtext,
  `keputusan_id` int(11) DEFAULT NULL,
  `keputusan_interviewer` int(11) DEFAULT NULL,
  `nilai` float DEFAULT NULL,
  `timestamp` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `formulir`
--

INSERT INTO `formulir` (`id`, `calon_id`, `interviewer_id`, `tanggal_wawancara`, `waktu`, `catatan`, `keputusan_id`, `keputusan_interviewer`, `nilai`, `timestamp`) VALUES
(232, 14, 5, '2018-01-02', '02:00:00', '', 1, NULL, 26, '2018-12-01 19:23:12'),
(233, 5, 5, '2018-01-01', '01:00:00', '', 2, NULL, 4, '2018-12-01 19:23:59'),
(234, 1, 5, '2018-01-01', '13:00:00', '', 3, NULL, 1, '2018-12-15 18:55:28');

-- --------------------------------------------------------

--
-- Table structure for table `formulir_kompetensi_posisi`
--

CREATE TABLE `formulir_kompetensi_posisi` (
  `id` int(11) NOT NULL,
  `formulir_id` int(11) DEFAULT NULL,
  `aspek_penilaian` varchar(255) DEFAULT NULL,
  `kriteria_penilaian` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `formulir_kompetensi_posisi`
--

INSERT INTO `formulir_kompetensi_posisi` (`id`, `formulir_id`, `aspek_penilaian`, `kriteria_penilaian`) VALUES
(524, 232, '', NULL),
(525, 232, '', NULL),
(526, 232, '', NULL),
(527, 233, '', NULL),
(528, 233, '', NULL),
(529, 233, '', NULL),
(530, 234, '', NULL),
(531, 234, '', NULL),
(532, 234, '', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `formulir_kriteria_penilaian`
--

CREATE TABLE `formulir_kriteria_penilaian` (
  `id` int(11) NOT NULL,
  `formulir_id` int(11) NOT NULL,
  `aspek_penilaian_id` int(11) NOT NULL,
  `kriteria_penilaian` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `formulir_kriteria_penilaian`
--

INSERT INTO `formulir_kriteria_penilaian` (`id`, `formulir_id`, `aspek_penilaian_id`, `kriteria_penilaian`) VALUES
(3802, 232, 13, 7),
(3803, 232, 14, 4),
(3804, 232, 15, 5),
(3805, 232, 16, 3),
(3806, 232, 17, 7),
(3807, 232, 18, NULL),
(3808, 232, 19, NULL),
(3809, 232, 20, NULL),
(3810, 232, 21, NULL),
(3811, 232, 1, NULL),
(3812, 232, 2, NULL),
(3813, 232, 3, NULL),
(3814, 232, 4, NULL),
(3815, 232, 5, NULL),
(3816, 232, 6, NULL),
(3817, 232, 7, NULL),
(3818, 232, 8, NULL),
(3819, 232, 9, NULL),
(3820, 232, 10, NULL),
(3821, 232, 11, NULL),
(3822, 232, 12, NULL),
(3823, 233, 13, 7),
(3824, 233, 14, 2),
(3825, 233, 15, 3),
(3826, 233, 16, 4),
(3827, 233, 17, NULL),
(3828, 233, 18, NULL),
(3829, 233, 19, NULL),
(3830, 233, 20, NULL),
(3831, 233, 21, NULL),
(3832, 233, 1, NULL),
(3833, 233, 2, NULL),
(3834, 233, 3, NULL),
(3835, 233, 4, NULL),
(3836, 233, 5, NULL),
(3837, 233, 6, NULL),
(3838, 233, 7, NULL),
(3839, 233, 8, NULL),
(3840, 233, 9, NULL),
(3841, 233, 10, NULL),
(3842, 233, 11, NULL),
(3843, 233, 12, NULL),
(3844, 234, 13, 1),
(3845, 234, 14, 1),
(3846, 234, 15, 1),
(3847, 234, 16, 1),
(3848, 234, 17, 1),
(3849, 234, 18, NULL),
(3850, 234, 19, NULL),
(3851, 234, 20, NULL),
(3852, 234, 21, NULL),
(3853, 234, 1, NULL),
(3854, 234, 2, NULL),
(3855, 234, 3, NULL),
(3856, 234, 4, NULL),
(3857, 234, 5, NULL),
(3858, 234, 6, NULL),
(3859, 234, 7, NULL),
(3860, 234, 8, NULL),
(3861, 234, 9, NULL),
(3862, 234, 10, NULL),
(3863, 234, 11, NULL),
(3864, 234, 12, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `jabatan`
--

CREATE TABLE `jabatan` (
  `id` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `is_active` tinyint(4) NOT NULL DEFAULT '1' COMMENT '1. Active, 2. Non Active',
  `is_apply` tinyint(4) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `jabatan`
--

INSERT INTO `jabatan` (`id`, `nama`, `is_active`, `is_apply`) VALUES
(1, 'HRD', 1, 2),
(2, 'Staf HRD', 1, 2),
(3, 'Dosen', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `jadwal_wawancara`
--

CREATE TABLE `jadwal_wawancara` (
  `id` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `waktu` time NOT NULL,
  `user_calon_id` int(11) NOT NULL,
  `user_interviewer_id` int(11) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '2' COMMENT '1. Sudah di Interview, 2. Belum di Interview',
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `jadwal_wawancara`
--

INSERT INTO `jadwal_wawancara` (`id`, `tanggal`, `waktu`, `user_calon_id`, `user_interviewer_id`, `status`, `timestamp`) VALUES
(12, '2018-01-01', '07:59:00', 5, 5, 1, '2018-12-15 18:44:01'),
(13, '2018-01-02', '09:00:00', 14, 5, 1, '2018-12-15 18:44:03'),
(14, '2018-01-01', '13:00:00', 1, 5, 1, '2018-12-15 18:55:28'),
(15, '2018-01-01', '03:30:00', 21, 5, 2, '2018-12-15 19:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `keputusan_tipe`
--

CREATE TABLE `keputusan_tipe` (
  `id` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `range_nilai_1` float NOT NULL,
  `range_nilai_2` float NOT NULL,
  `is_active` tinyint(4) NOT NULL DEFAULT '1' COMMENT '1. Active, 2. Non Active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `keputusan_tipe`
--

INSERT INTO `keputusan_tipe` (`id`, `nama`, `range_nilai_1`, `range_nilai_2`, `is_active`) VALUES
(1, 'Disarankan', 5, 7, 1),
(2, 'Dipertimbangkan', 4, 5, 1),
(3, 'Ditolak', 0, 4, 1);

-- --------------------------------------------------------

--
-- Table structure for table `login_attempt`
--

CREATE TABLE `login_attempt` (
  `id` int(11) NOT NULL,
  `key` varchar(50) NOT NULL,
  `amount` int(11) NOT NULL DEFAULT '1',
  `reset_at` varchar(50) NOT NULL DEFAULT '',
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `log_error`
--

CREATE TABLE `log_error` (
  `id` int(11) NOT NULL,
  `message` text,
  `data_json` text,
  `date_error` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE `menu` (
  `id` int(11) NOT NULL,
  `name` varchar(128) NOT NULL,
  `parent` int(11) DEFAULT NULL,
  `route` varchar(255) DEFAULT NULL,
  `order` int(11) DEFAULT NULL,
  `data` blob
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`id`, `name`, `parent`, `route`, `order`, `data`) VALUES
(1, 'Beranda', NULL, '/admin/site/index', 0, 0x66612d75736572),
(6, 'Pengaturan', NULL, NULL, 9, NULL),
(8, 'Configuration', 6, '/webmaster/assignment/index', 1, NULL),
(90, 'Log Error', 6, '/admin/log-error/index', 0, NULL),
(92, 'Data Master', NULL, NULL, 8, NULL),
(93, 'Aspek Penilaian', 92, '/admin/aspek-penilaian/index', NULL, NULL),
(94, 'Aspek Penilaian Tipe', 92, '/admin/aspek-penilaian-tipe/index', 2, NULL),
(95, 'Fakultas Unit', 92, '/admin/fakultas-unit/index', 3, NULL),
(96, 'Jabatan', 92, '/admin/jabatan/index', 4, NULL),
(97, 'Keputusan', 92, '/admin/keputusan-tipe/index', 5, NULL),
(98, 'Data Pelamar', NULL, '/admin/user-calon/index', 3, NULL),
(99, 'Data Interviewer', NULL, '/admin/user-interviewer/index', 4, NULL),
(101, 'Hasil Wawancara', NULL, '/admin/formulir/index', 2, NULL),
(102, 'Jadwal Wawancara', NULL, '/admin/jadwal-wawancara/index', 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `auth_key` varchar(32) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `password_hash` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `password_reset_token` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `password_default` varchar(255) DEFAULT NULL,
  `email` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` smallint(6) NOT NULL DEFAULT '10',
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `auth_key`, `password_hash`, `password_reset_token`, `password_default`, `email`, `status`, `created_at`, `updated_at`, `created_by`, `updated_by`) VALUES
(1, 'superuser', NULL, '$2y$13$IpMBKpF85EKNA/Pxqk06H.BjjOaPz/.Ol1e.PJfGYWIJoOOI0YSFO', NULL, NULL, 'superuser@gmail.com', 10, 1509549909, 1526294085, 1, 1),
(2, 'admin', NULL, '$2y$13$me/6YM31QFhxlM6DY8UYDuWnYE/EUNXpghP/xVg8ql6JiZX5LteK.', NULL, NULL, NULL, 10, NULL, NULL, NULL, NULL),
(15, 'razak@gmail.com', NULL, '$2y$13$V8In0fZUiguxIXi60JS1YOSwb0yi8EU5AYboNFWVRjAxNMFzwAjuy', NULL, 'zrxyhifa', 'razak@gmail.com', 10, 1530636027, 1543084870, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user_calon`
--

CREATE TABLE `user_calon` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `nama_calon` varchar(50) NOT NULL,
  `tanggal_lahir` date DEFAULT NULL,
  `usia` tinyint(4) NOT NULL,
  `pendidikan` longtext NOT NULL,
  `jabatan_yang_dilamar` text NOT NULL,
  `phone` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `keputusan_id` int(11) DEFAULT NULL,
  `cv` varchar(255) DEFAULT NULL,
  `cv_extension` char(50) DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '2' COMMENT '1. Sudah di Interview, 2. Belum di Interview'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user_calon`
--

INSERT INTO `user_calon` (`id`, `user_id`, `nama_calon`, `tanggal_lahir`, `usia`, `pendidikan`, `jabatan_yang_dilamar`, `phone`, `email`, `keputusan_id`, `cv`, `cv_extension`, `status`) VALUES
(1, NULL, 'Ibnu', NULL, 24, 'S1 Teknik Informatika', 'Backend Programmers\r\n', '085712345678', 'ibnu@gmail.com', NULL, 'd0d0defb889e6011987d431fe903d931c8965a85.pdf', 'pdf', 2),
(5, NULL, 'Kandidat 1', NULL, 22, '1. 2asdas\r\n12.asd', 'as', '0857', 'haifahrul@gmail.com', NULL, '63f6dd17e596a32fb491891803ba1c646d207f9c.pdf', NULL, 2),
(14, NULL, 'Kandidat 2', NULL, 22, '1. 2asdas\r\n12.asd', 'as', '0857', 'haifahrul@gmail.com', NULL, '22dbcfd6a538079a8ed0ab33e913fa18ad4fbf53.pdf', NULL, 2),
(15, NULL, 'asddasdasd', NULL, 2, 'asdasda', 'aasda', '085710568571', 'razakibnu95@gmail.com', NULL, 'c54f4b87c647fbee68faf14b543f8cf0667fb52d.pdf', NULL, 2),
(16, NULL, 'asd', NULL, 2, 'adasd', 'asd', '123', 'haifahrul@gmail.com', NULL, 'e180c592cd052aacc1e7f9d25a6bc5c979236a50.pdf', NULL, 2),
(17, NULL, 'asd', NULL, 2, 'adasd', 'asd', '123', 'haifahrul@gmail.com', NULL, '316f967062d83222e20a56ea2eb90428f2cf0ff0.pdf', NULL, 2),
(18, NULL, 'asd', NULL, 2, 'adasd', 'asd', '123', 'haifahrul@gmail.com', NULL, 'adc4082ca7d7d75f028c6a34e4b425baa864b6b2.pdf', NULL, 2),
(19, NULL, 'asd', NULL, 2, 'adasd', 'asd', '123', 'haifahrul@gmail.com', NULL, '14b45f9bed45bc9b34db5eb98ea2c1536068fae1.pdf', NULL, 2),
(20, NULL, 'asdasd', NULL, 26, 'asd', '3', '085710568571', 'haifahrul@gmail.com', NULL, '2018-12-16 01-06-00_Dosen_asdasd.zip', NULL, 2),
(21, NULL, 'Fahrul', NULL, 26, 'sada', '3', '085710568571', 'haifahrul@gmail.com', NULL, '2018-12-16 01-09-07_Dosen_ asda.zip', NULL, 2);

-- --------------------------------------------------------

--
-- Table structure for table `user_interviewer`
--

CREATE TABLE `user_interviewer` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `nama_pewawancara` varchar(50) NOT NULL,
  `jabatan_id` int(11) NOT NULL,
  `fakultas_unit_id` int(11) NOT NULL,
  `is_active` tinyint(4) NOT NULL COMMENT '1. Active, 2. Non Active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user_interviewer`
--

INSERT INTO `user_interviewer` (`id`, `user_id`, `nama_pewawancara`, `jabatan_id`, `fakultas_unit_id`, `is_active`) VALUES
(5, 15, ' Pewawancara', 1, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `user_profile`
--

CREATE TABLE `user_profile` (
  `user_id` int(11) NOT NULL,
  `firstname` varchar(50) DEFAULT NULL,
  `lastname` varchar(50) DEFAULT NULL,
  `no_telp` varchar(50) DEFAULT NULL,
  `avatar` varchar(225) DEFAULT NULL,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user_profile`
--

INSERT INTO `user_profile` (`user_id`, `firstname`, `lastname`, `no_telp`, `avatar`, `created_at`, `updated_at`, `created_by`, `updated_by`) VALUES
(1, 'AFS', '', '', '8a954ac7fa30824c1b75850d546afe256b4f6078.png', NULL, 1526294044, NULL, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `aspek_penilaian`
--
ALTER TABLE `aspek_penilaian`
  ADD PRIMARY KEY (`id`),
  ADD KEY `aspek_penilaian_tipe_id` (`aspek_penilaian_tipe_id`);

--
-- Indexes for table `aspek_penilaian_tipe`
--
ALTER TABLE `aspek_penilaian_tipe`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `auth_assignment`
--
ALTER TABLE `auth_assignment`
  ADD PRIMARY KEY (`item_name`,`user_id`);

--
-- Indexes for table `auth_item`
--
ALTER TABLE `auth_item`
  ADD PRIMARY KEY (`name`),
  ADD KEY `rule_name` (`rule_name`),
  ADD KEY `idx-auth_item-type` (`type`);

--
-- Indexes for table `auth_item_child`
--
ALTER TABLE `auth_item_child`
  ADD PRIMARY KEY (`parent`,`child`),
  ADD KEY `child` (`child`);

--
-- Indexes for table `auth_rule`
--
ALTER TABLE `auth_rule`
  ADD PRIMARY KEY (`name`);

--
-- Indexes for table `fakultas_unit`
--
ALTER TABLE `fakultas_unit`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `formulir`
--
ALTER TABLE `formulir`
  ADD PRIMARY KEY (`id`),
  ADD KEY `interviewer_id` (`interviewer_id`),
  ADD KEY `calon_id` (`calon_id`),
  ADD KEY `keputusan_id` (`keputusan_id`),
  ADD KEY `keputusan_interviewer` (`keputusan_interviewer`);

--
-- Indexes for table `formulir_kompetensi_posisi`
--
ALTER TABLE `formulir_kompetensi_posisi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `formulir_id` (`formulir_id`);

--
-- Indexes for table `formulir_kriteria_penilaian`
--
ALTER TABLE `formulir_kriteria_penilaian`
  ADD PRIMARY KEY (`id`),
  ADD KEY `formulir_wawancara_id` (`formulir_id`),
  ADD KEY `aspek_penilaian_id` (`aspek_penilaian_id`);

--
-- Indexes for table `jabatan`
--
ALTER TABLE `jabatan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jadwal_wawancara`
--
ALTER TABLE `jadwal_wawancara`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_calon_id` (`user_calon_id`),
  ADD KEY `user_interviewer_id` (`user_interviewer_id`);

--
-- Indexes for table `keputusan_tipe`
--
ALTER TABLE `keputusan_tipe`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `login_attempt`
--
ALTER TABLE `login_attempt`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `log_error`
--
ALTER TABLE `log_error`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id`),
  ADD KEY `parent` (`parent`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_calon`
--
ALTER TABLE `user_calon`
  ADD PRIMARY KEY (`id`),
  ADD KEY `keputusan` (`keputusan_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `user_interviewer`
--
ALTER TABLE `user_interviewer`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `fakultas_unit_id` (`fakultas_unit_id`),
  ADD KEY `jabatan_id` (`jabatan_id`);

--
-- Indexes for table `user_profile`
--
ALTER TABLE `user_profile`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `aspek_penilaian`
--
ALTER TABLE `aspek_penilaian`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT for table `aspek_penilaian_tipe`
--
ALTER TABLE `aspek_penilaian_tipe`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `fakultas_unit`
--
ALTER TABLE `fakultas_unit`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `formulir`
--
ALTER TABLE `formulir`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=235;
--
-- AUTO_INCREMENT for table `formulir_kompetensi_posisi`
--
ALTER TABLE `formulir_kompetensi_posisi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=533;
--
-- AUTO_INCREMENT for table `formulir_kriteria_penilaian`
--
ALTER TABLE `formulir_kriteria_penilaian`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3865;
--
-- AUTO_INCREMENT for table `jabatan`
--
ALTER TABLE `jabatan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `jadwal_wawancara`
--
ALTER TABLE `jadwal_wawancara`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `keputusan_tipe`
--
ALTER TABLE `keputusan_tipe`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `login_attempt`
--
ALTER TABLE `login_attempt`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `log_error`
--
ALTER TABLE `log_error`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=103;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `user_calon`
--
ALTER TABLE `user_calon`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT for table `user_interviewer`
--
ALTER TABLE `user_interviewer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `aspek_penilaian`
--
ALTER TABLE `aspek_penilaian`
  ADD CONSTRAINT `FK_aspek_penilaian_aspek_penilaian_tipe` FOREIGN KEY (`aspek_penilaian_tipe_id`) REFERENCES `aspek_penilaian_tipe` (`id`);

--
-- Constraints for table `auth_assignment`
--
ALTER TABLE `auth_assignment`
  ADD CONSTRAINT `auth_assignment_ibfk_1` FOREIGN KEY (`item_name`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `auth_item`
--
ALTER TABLE `auth_item`
  ADD CONSTRAINT `auth_item_ibfk_1` FOREIGN KEY (`rule_name`) REFERENCES `auth_rule` (`name`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `auth_item_child`
--
ALTER TABLE `auth_item_child`
  ADD CONSTRAINT `auth_item_child_ibfk_1` FOREIGN KEY (`parent`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `auth_item_child_ibfk_2` FOREIGN KEY (`child`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `formulir`
--
ALTER TABLE `formulir`
  ADD CONSTRAINT `FK_formulir_keputusan_tipe` FOREIGN KEY (`keputusan_id`) REFERENCES `keputusan_tipe` (`id`),
  ADD CONSTRAINT `FK_formulir_keputusan_tipe_2` FOREIGN KEY (`keputusan_interviewer`) REFERENCES `keputusan_tipe` (`id`),
  ADD CONSTRAINT `FK_formulir_user_calon` FOREIGN KEY (`calon_id`) REFERENCES `user_calon` (`id`),
  ADD CONSTRAINT `FK_formulir_user_interviewer` FOREIGN KEY (`interviewer_id`) REFERENCES `user_interviewer` (`id`);

--
-- Constraints for table `formulir_kompetensi_posisi`
--
ALTER TABLE `formulir_kompetensi_posisi`
  ADD CONSTRAINT `FK_formulir_kompetensi_posisi_formulir` FOREIGN KEY (`formulir_id`) REFERENCES `formulir` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `formulir_kriteria_penilaian`
--
ALTER TABLE `formulir_kriteria_penilaian`
  ADD CONSTRAINT `FK_formulir_kriteria_penilaian_aspek_penilaian` FOREIGN KEY (`aspek_penilaian_id`) REFERENCES `aspek_penilaian` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_formulir_kriteria_penilaian_formulir` FOREIGN KEY (`formulir_id`) REFERENCES `formulir` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `jadwal_wawancara`
--
ALTER TABLE `jadwal_wawancara`
  ADD CONSTRAINT `FK_jadwal_wawancara_user_calon` FOREIGN KEY (`user_calon_id`) REFERENCES `user_calon` (`id`),
  ADD CONSTRAINT `FK_jadwal_wawancara_user_interviewer` FOREIGN KEY (`user_interviewer_id`) REFERENCES `user_interviewer` (`id`);

--
-- Constraints for table `menu`
--
ALTER TABLE `menu`
  ADD CONSTRAINT `menu_ibfk_1` FOREIGN KEY (`parent`) REFERENCES `menu` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `user_calon`
--
ALTER TABLE `user_calon`
  ADD CONSTRAINT `FK_user_calon_keputusan_tipe` FOREIGN KEY (`keputusan_id`) REFERENCES `keputusan_tipe` (`id`),
  ADD CONSTRAINT `FK_user_calon_user` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);

--
-- Constraints for table `user_interviewer`
--
ALTER TABLE `user_interviewer`
  ADD CONSTRAINT `FK_user_interviewer_fakultas_unit` FOREIGN KEY (`fakultas_unit_id`) REFERENCES `fakultas_unit` (`id`),
  ADD CONSTRAINT `FK_user_interviewer_jabatan` FOREIGN KEY (`jabatan_id`) REFERENCES `jabatan` (`id`),
  ADD CONSTRAINT `FK_user_interviewer_user` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);

--
-- Constraints for table `user_profile`
--
ALTER TABLE `user_profile`
  ADD CONSTRAINT `FK_user_profile_user` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;