-- --------------------------------------------------------
-- Host:                         localhost
-- Server version:               5.7.24-0ubuntu0.18.04.1 - (Ubuntu)
-- Server OS:                    Linux
-- HeidiSQL Version:             9.5.0.5196
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Dumping structure for table yarsi_ibnu.aspek_penilaian
CREATE TABLE IF NOT EXISTS `aspek_penilaian` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` longtext NOT NULL,
  `aspek_penilaian_tipe_id` int(11) NOT NULL,
  `order` tinyint(4) DEFAULT NULL,
  `is_active` tinyint(4) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `aspek_penilaian_tipe_id` (`aspek_penilaian_tipe_id`),
  CONSTRAINT `FK_aspek_penilaian_aspek_penilaian_tipe` FOREIGN KEY (`aspek_penilaian_tipe_id`) REFERENCES `aspek_penilaian_tipe` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8;

-- Dumping data for table yarsi_ibnu.aspek_penilaian: ~21 rows (approximately)
/*!40000 ALTER TABLE `aspek_penilaian` DISABLE KEYS */;
REPLACE INTO `aspek_penilaian` (`id`, `nama`, `aspek_penilaian_tipe_id`, `order`, `is_active`) VALUES
	(1, 'Penampilan', 1, NULL, 1);
REPLACE INTO `aspek_penilaian` (`id`, `nama`, `aspek_penilaian_tipe_id`, `order`, `is_active`) VALUES
	(2, 'Suara', 1, NULL, 1);
REPLACE INTO `aspek_penilaian` (`id`, `nama`, `aspek_penilaian_tipe_id`, `order`, `is_active`) VALUES
	(3, 'Gaya', 1, NULL, 1);
REPLACE INTO `aspek_penilaian` (`id`, `nama`, `aspek_penilaian_tipe_id`, `order`, `is_active`) VALUES
	(4, 'Kepercayaan Diri', 1, NULL, 1);
REPLACE INTO `aspek_penilaian` (`id`, `nama`, `aspek_penilaian_tipe_id`, `order`, `is_active`) VALUES
	(5, 'Motivasi Kerja', 1, NULL, 1);
REPLACE INTO `aspek_penilaian` (`id`, `nama`, `aspek_penilaian_tipe_id`, `order`, `is_active`) VALUES
	(6, 'Inisiatif', 1, NULL, 1);
REPLACE INTO `aspek_penilaian` (`id`, `nama`, `aspek_penilaian_tipe_id`, `order`, `is_active`) VALUES
	(7, 'Kemampuan belajar dan mengembangkan diri', 1, NULL, 1);
REPLACE INTO `aspek_penilaian` (`id`, `nama`, `aspek_penilaian_tipe_id`, `order`, `is_active`) VALUES
	(8, 'Adaptasi', 1, NULL, 1);
REPLACE INTO `aspek_penilaian` (`id`, `nama`, `aspek_penilaian_tipe_id`, `order`, `is_active`) VALUES
	(9, 'Pengenalan terhadap perguruan tinggi dan pekerjaan yang dilamar', 1, NULL, 1);
REPLACE INTO `aspek_penilaian` (`id`, `nama`, `aspek_penilaian_tipe_id`, `order`, `is_active`) VALUES
	(10, 'Kesesuaian minat dengan posisi yang dilamar', 1, NULL, 1);
REPLACE INTO `aspek_penilaian` (`id`, `nama`, `aspek_penilaian_tipe_id`, `order`, `is_active`) VALUES
	(11, 'Kesesuaian pendidikan dengan posisi yang dilamar', 1, NULL, 1);
REPLACE INTO `aspek_penilaian` (`id`, `nama`, `aspek_penilaian_tipe_id`, `order`, `is_active`) VALUES
	(12, 'Kesesuaian pengalaman kerja dengan dan pengetahuan dengan posisi yang dilamar (Untuk berpengalaman kerja)', 1, NULL, 1);
REPLACE INTO `aspek_penilaian` (`id`, `nama`, `aspek_penilaian_tipe_id`, `order`, `is_active`) VALUES
	(13, 'Sikap kesesuaian terhadap nilai-nilai perguruan tinggi', 2, NULL, 1);
REPLACE INTO `aspek_penilaian` (`id`, `nama`, `aspek_penilaian_tipe_id`, `order`, `is_active`) VALUES
	(14, 'Selalu berusaha melakukan yang terbaik', 2, NULL, 1);
REPLACE INTO `aspek_penilaian` (`id`, `nama`, `aspek_penilaian_tipe_id`, `order`, `is_active`) VALUES
	(15, 'Bersikap, bertindak dan berperilaku profesional', 2, NULL, 1);
REPLACE INTO `aspek_penilaian` (`id`, `nama`, `aspek_penilaian_tipe_id`, `order`, `is_active`) VALUES
	(16, 'Bersikap peduli', 2, NULL, 1);
REPLACE INTO `aspek_penilaian` (`id`, `nama`, `aspek_penilaian_tipe_id`, `order`, `is_active`) VALUES
	(17, 'Achievement', 3, NULL, 1);
REPLACE INTO `aspek_penilaian` (`id`, `nama`, `aspek_penilaian_tipe_id`, `order`, `is_active`) VALUES
	(18, 'Communication', 3, NULL, 1);
REPLACE INTO `aspek_penilaian` (`id`, `nama`, `aspek_penilaian_tipe_id`, `order`, `is_active`) VALUES
	(19, 'Human Relation', 3, NULL, 1);
REPLACE INTO `aspek_penilaian` (`id`, `nama`, `aspek_penilaian_tipe_id`, `order`, `is_active`) VALUES
	(20, 'Planning & Organization', 3, NULL, 1);
REPLACE INTO `aspek_penilaian` (`id`, `nama`, `aspek_penilaian_tipe_id`, `order`, `is_active`) VALUES
	(21, 'Teamwork', 3, NULL, 1);
/*!40000 ALTER TABLE `aspek_penilaian` ENABLE KEYS */;

-- Dumping structure for table yarsi_ibnu.aspek_penilaian_tipe
CREATE TABLE IF NOT EXISTS `aspek_penilaian_tipe` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(50) NOT NULL,
  `order` tinyint(4) DEFAULT NULL,
  `is_active` tinyint(4) NOT NULL DEFAULT '1' COMMENT '1. Active, 2. Non Active',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- Dumping data for table yarsi_ibnu.aspek_penilaian_tipe: ~3 rows (approximately)
/*!40000 ALTER TABLE `aspek_penilaian_tipe` DISABLE KEYS */;
REPLACE INTO `aspek_penilaian_tipe` (`id`, `nama`, `order`, `is_active`) VALUES
	(1, 'Umum', 4, 1);
REPLACE INTO `aspek_penilaian_tipe` (`id`, `nama`, `order`, `is_active`) VALUES
	(2, 'Wawancara Pendalaman', 2, 1);
REPLACE INTO `aspek_penilaian_tipe` (`id`, `nama`, `order`, `is_active`) VALUES
	(3, 'Kompetensi', 3, 1);
/*!40000 ALTER TABLE `aspek_penilaian_tipe` ENABLE KEYS */;

-- Dumping structure for table yarsi_ibnu.auth_assignment
CREATE TABLE IF NOT EXISTS `auth_assignment` (
  `item_name` varchar(64) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `user_id` varchar(64) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `created_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`item_name`,`user_id`),
  CONSTRAINT `auth_assignment_ibfk_1` FOREIGN KEY (`item_name`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Dumping data for table yarsi_ibnu.auth_assignment: ~3 rows (approximately)
/*!40000 ALTER TABLE `auth_assignment` DISABLE KEYS */;
REPLACE INTO `auth_assignment` (`item_name`, `user_id`, `created_at`) VALUES
	('Administrator', '2', NULL);
REPLACE INTO `auth_assignment` (`item_name`, `user_id`, `created_at`) VALUES
	('Interviewer', '10', 1530715300);
REPLACE INTO `auth_assignment` (`item_name`, `user_id`, `created_at`) VALUES
	('Interviewer', '15', 1530636027);
REPLACE INTO `auth_assignment` (`item_name`, `user_id`, `created_at`) VALUES
	('Super User', '1', 1526294085);
/*!40000 ALTER TABLE `auth_assignment` ENABLE KEYS */;

-- Dumping structure for table yarsi_ibnu.auth_item
CREATE TABLE IF NOT EXISTS `auth_item` (
  `name` varchar(64) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `type` smallint(6) NOT NULL,
  `description` text CHARACTER SET utf8 COLLATE utf8_unicode_ci,
  `rule_name` varchar(64) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `data` blob,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`name`),
  KEY `rule_name` (`rule_name`),
  KEY `idx-auth_item-type` (`type`),
  CONSTRAINT `auth_item_ibfk_1` FOREIGN KEY (`rule_name`) REFERENCES `auth_rule` (`name`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Dumping data for table yarsi_ibnu.auth_item: ~285 rows (approximately)
/*!40000 ALTER TABLE `auth_item` DISABLE KEYS */;
REPLACE INTO `auth_item` (`name`, `type`, `description`, `rule_name`, `data`, `created_at`, `updated_at`) VALUES
	('/*', 2, NULL, NULL, NULL, 1543052767, 1543052767);
REPLACE INTO `auth_item` (`name`, `type`, `description`, `rule_name`, `data`, `created_at`, `updated_at`) VALUES
	('/admin/*', 2, NULL, NULL, NULL, 1543052767, 1543052767);
REPLACE INTO `auth_item` (`name`, `type`, `description`, `rule_name`, `data`, `created_at`, `updated_at`) VALUES
	('/admin/aspek-penilaian-tipe/*', 2, NULL, NULL, NULL, 1543052767, 1543052767);
REPLACE INTO `auth_item` (`name`, `type`, `description`, `rule_name`, `data`, `created_at`, `updated_at`) VALUES
	('/admin/aspek-penilaian-tipe/create', 2, NULL, NULL, NULL, 1543052767, 1543052767);
REPLACE INTO `auth_item` (`name`, `type`, `description`, `rule_name`, `data`, `created_at`, `updated_at`) VALUES
	('/admin/aspek-penilaian-tipe/delete', 2, NULL, NULL, NULL, 1543052767, 1543052767);
REPLACE INTO `auth_item` (`name`, `type`, `description`, `rule_name`, `data`, `created_at`, `updated_at`) VALUES
	('/admin/aspek-penilaian-tipe/delete-items', 2, NULL, NULL, NULL, 1543052767, 1543052767);
REPLACE INTO `auth_item` (`name`, `type`, `description`, `rule_name`, `data`, `created_at`, `updated_at`) VALUES
	('/admin/aspek-penilaian-tipe/index', 2, NULL, NULL, NULL, 1543052767, 1543052767);
REPLACE INTO `auth_item` (`name`, `type`, `description`, `rule_name`, `data`, `created_at`, `updated_at`) VALUES
	('/admin/aspek-penilaian-tipe/update', 2, NULL, NULL, NULL, 1543052767, 1543052767);
REPLACE INTO `auth_item` (`name`, `type`, `description`, `rule_name`, `data`, `created_at`, `updated_at`) VALUES
	('/admin/aspek-penilaian-tipe/view', 2, NULL, NULL, NULL, 1543052767, 1543052767);
REPLACE INTO `auth_item` (`name`, `type`, `description`, `rule_name`, `data`, `created_at`, `updated_at`) VALUES
	('/admin/aspek-penilaian/*', 2, NULL, NULL, NULL, 1543052767, 1543052767);
REPLACE INTO `auth_item` (`name`, `type`, `description`, `rule_name`, `data`, `created_at`, `updated_at`) VALUES
	('/admin/aspek-penilaian/create', 2, NULL, NULL, NULL, 1543052767, 1543052767);
REPLACE INTO `auth_item` (`name`, `type`, `description`, `rule_name`, `data`, `created_at`, `updated_at`) VALUES
	('/admin/aspek-penilaian/delete', 2, NULL, NULL, NULL, 1543052767, 1543052767);
REPLACE INTO `auth_item` (`name`, `type`, `description`, `rule_name`, `data`, `created_at`, `updated_at`) VALUES
	('/admin/aspek-penilaian/delete-items', 2, NULL, NULL, NULL, 1543052767, 1543052767);
REPLACE INTO `auth_item` (`name`, `type`, `description`, `rule_name`, `data`, `created_at`, `updated_at`) VALUES
	('/admin/aspek-penilaian/index', 2, NULL, NULL, NULL, 1543052767, 1543052767);
REPLACE INTO `auth_item` (`name`, `type`, `description`, `rule_name`, `data`, `created_at`, `updated_at`) VALUES
	('/admin/aspek-penilaian/update', 2, NULL, NULL, NULL, 1543052767, 1543052767);
REPLACE INTO `auth_item` (`name`, `type`, `description`, `rule_name`, `data`, `created_at`, `updated_at`) VALUES
	('/admin/aspek-penilaian/view', 2, NULL, NULL, NULL, 1543052767, 1543052767);
REPLACE INTO `auth_item` (`name`, `type`, `description`, `rule_name`, `data`, `created_at`, `updated_at`) VALUES
	('/admin/default/*', 2, NULL, NULL, NULL, 1543052767, 1543052767);
REPLACE INTO `auth_item` (`name`, `type`, `description`, `rule_name`, `data`, `created_at`, `updated_at`) VALUES
	('/admin/default/index', 2, NULL, NULL, NULL, 1543052767, 1543052767);
REPLACE INTO `auth_item` (`name`, `type`, `description`, `rule_name`, `data`, `created_at`, `updated_at`) VALUES
	('/admin/fakultas-unit/*', 2, NULL, NULL, NULL, 1543052767, 1543052767);
REPLACE INTO `auth_item` (`name`, `type`, `description`, `rule_name`, `data`, `created_at`, `updated_at`) VALUES
	('/admin/fakultas-unit/create', 2, NULL, NULL, NULL, 1543052767, 1543052767);
REPLACE INTO `auth_item` (`name`, `type`, `description`, `rule_name`, `data`, `created_at`, `updated_at`) VALUES
	('/admin/fakultas-unit/delete', 2, NULL, NULL, NULL, 1543052767, 1543052767);
REPLACE INTO `auth_item` (`name`, `type`, `description`, `rule_name`, `data`, `created_at`, `updated_at`) VALUES
	('/admin/fakultas-unit/delete-items', 2, NULL, NULL, NULL, 1543052767, 1543052767);
REPLACE INTO `auth_item` (`name`, `type`, `description`, `rule_name`, `data`, `created_at`, `updated_at`) VALUES
	('/admin/fakultas-unit/index', 2, NULL, NULL, NULL, 1543052767, 1543052767);
REPLACE INTO `auth_item` (`name`, `type`, `description`, `rule_name`, `data`, `created_at`, `updated_at`) VALUES
	('/admin/fakultas-unit/update', 2, NULL, NULL, NULL, 1543052767, 1543052767);
REPLACE INTO `auth_item` (`name`, `type`, `description`, `rule_name`, `data`, `created_at`, `updated_at`) VALUES
	('/admin/fakultas-unit/view', 2, NULL, NULL, NULL, 1543052767, 1543052767);
REPLACE INTO `auth_item` (`name`, `type`, `description`, `rule_name`, `data`, `created_at`, `updated_at`) VALUES
	('/admin/formulir/*', 2, NULL, NULL, NULL, 1543052767, 1543052767);
REPLACE INTO `auth_item` (`name`, `type`, `description`, `rule_name`, `data`, `created_at`, `updated_at`) VALUES
	('/admin/formulir/cetak', 2, NULL, NULL, NULL, 1543052767, 1543052767);
REPLACE INTO `auth_item` (`name`, `type`, `description`, `rule_name`, `data`, `created_at`, `updated_at`) VALUES
	('/admin/formulir/delete', 2, NULL, NULL, NULL, 1543052767, 1543052767);
REPLACE INTO `auth_item` (`name`, `type`, `description`, `rule_name`, `data`, `created_at`, `updated_at`) VALUES
	('/admin/formulir/index', 2, NULL, NULL, NULL, 1543052767, 1543052767);
REPLACE INTO `auth_item` (`name`, `type`, `description`, `rule_name`, `data`, `created_at`, `updated_at`) VALUES
	('/admin/formulir/view', 2, NULL, NULL, NULL, 1543052767, 1543052767);
REPLACE INTO `auth_item` (`name`, `type`, `description`, `rule_name`, `data`, `created_at`, `updated_at`) VALUES
	('/admin/jabatan/*', 2, NULL, NULL, NULL, 1543052767, 1543052767);
REPLACE INTO `auth_item` (`name`, `type`, `description`, `rule_name`, `data`, `created_at`, `updated_at`) VALUES
	('/admin/jabatan/create', 2, NULL, NULL, NULL, 1543052767, 1543052767);
REPLACE INTO `auth_item` (`name`, `type`, `description`, `rule_name`, `data`, `created_at`, `updated_at`) VALUES
	('/admin/jabatan/delete', 2, NULL, NULL, NULL, 1543052767, 1543052767);
REPLACE INTO `auth_item` (`name`, `type`, `description`, `rule_name`, `data`, `created_at`, `updated_at`) VALUES
	('/admin/jabatan/delete-items', 2, NULL, NULL, NULL, 1543052767, 1543052767);
REPLACE INTO `auth_item` (`name`, `type`, `description`, `rule_name`, `data`, `created_at`, `updated_at`) VALUES
	('/admin/jabatan/index', 2, NULL, NULL, NULL, 1543052767, 1543052767);
REPLACE INTO `auth_item` (`name`, `type`, `description`, `rule_name`, `data`, `created_at`, `updated_at`) VALUES
	('/admin/jabatan/update', 2, NULL, NULL, NULL, 1543052767, 1543052767);
REPLACE INTO `auth_item` (`name`, `type`, `description`, `rule_name`, `data`, `created_at`, `updated_at`) VALUES
	('/admin/jabatan/view', 2, NULL, NULL, NULL, 1543052767, 1543052767);
REPLACE INTO `auth_item` (`name`, `type`, `description`, `rule_name`, `data`, `created_at`, `updated_at`) VALUES
	('/admin/jadwal-wawancara/*', 2, NULL, NULL, NULL, 1543052767, 1543052767);
REPLACE INTO `auth_item` (`name`, `type`, `description`, `rule_name`, `data`, `created_at`, `updated_at`) VALUES
	('/admin/jadwal-wawancara/ajax-get-list-interviewer', 2, NULL, NULL, NULL, 1543052767, 1543052767);
REPLACE INTO `auth_item` (`name`, `type`, `description`, `rule_name`, `data`, `created_at`, `updated_at`) VALUES
	('/admin/jadwal-wawancara/create', 2, NULL, NULL, NULL, 1543052767, 1543052767);
REPLACE INTO `auth_item` (`name`, `type`, `description`, `rule_name`, `data`, `created_at`, `updated_at`) VALUES
	('/admin/jadwal-wawancara/delete', 2, NULL, NULL, NULL, 1543052767, 1543052767);
REPLACE INTO `auth_item` (`name`, `type`, `description`, `rule_name`, `data`, `created_at`, `updated_at`) VALUES
	('/admin/jadwal-wawancara/delete-items', 2, NULL, NULL, NULL, 1543052767, 1543052767);
REPLACE INTO `auth_item` (`name`, `type`, `description`, `rule_name`, `data`, `created_at`, `updated_at`) VALUES
	('/admin/jadwal-wawancara/index', 2, NULL, NULL, NULL, 1543052767, 1543052767);
REPLACE INTO `auth_item` (`name`, `type`, `description`, `rule_name`, `data`, `created_at`, `updated_at`) VALUES
	('/admin/jadwal-wawancara/update', 2, NULL, NULL, NULL, 1543052767, 1543052767);
REPLACE INTO `auth_item` (`name`, `type`, `description`, `rule_name`, `data`, `created_at`, `updated_at`) VALUES
	('/admin/jadwal-wawancara/view', 2, NULL, NULL, NULL, 1543052767, 1543052767);
REPLACE INTO `auth_item` (`name`, `type`, `description`, `rule_name`, `data`, `created_at`, `updated_at`) VALUES
	('/admin/keputusan-tipe/*', 2, NULL, NULL, NULL, 1543052767, 1543052767);
REPLACE INTO `auth_item` (`name`, `type`, `description`, `rule_name`, `data`, `created_at`, `updated_at`) VALUES
	('/admin/keputusan-tipe/create', 2, NULL, NULL, NULL, 1543052767, 1543052767);
REPLACE INTO `auth_item` (`name`, `type`, `description`, `rule_name`, `data`, `created_at`, `updated_at`) VALUES
	('/admin/keputusan-tipe/delete', 2, NULL, NULL, NULL, 1543052767, 1543052767);
REPLACE INTO `auth_item` (`name`, `type`, `description`, `rule_name`, `data`, `created_at`, `updated_at`) VALUES
	('/admin/keputusan-tipe/delete-items', 2, NULL, NULL, NULL, 1543052767, 1543052767);
REPLACE INTO `auth_item` (`name`, `type`, `description`, `rule_name`, `data`, `created_at`, `updated_at`) VALUES
	('/admin/keputusan-tipe/index', 2, NULL, NULL, NULL, 1543052767, 1543052767);
REPLACE INTO `auth_item` (`name`, `type`, `description`, `rule_name`, `data`, `created_at`, `updated_at`) VALUES
	('/admin/keputusan-tipe/update', 2, NULL, NULL, NULL, 1543052767, 1543052767);
REPLACE INTO `auth_item` (`name`, `type`, `description`, `rule_name`, `data`, `created_at`, `updated_at`) VALUES
	('/admin/keputusan-tipe/view', 2, NULL, NULL, NULL, 1543052767, 1543052767);
REPLACE INTO `auth_item` (`name`, `type`, `description`, `rule_name`, `data`, `created_at`, `updated_at`) VALUES
	('/admin/log-error/*', 2, NULL, NULL, NULL, 1543052767, 1543052767);
REPLACE INTO `auth_item` (`name`, `type`, `description`, `rule_name`, `data`, `created_at`, `updated_at`) VALUES
	('/admin/log-error/clear-log-error', 2, NULL, NULL, NULL, 1543052767, 1543052767);
REPLACE INTO `auth_item` (`name`, `type`, `description`, `rule_name`, `data`, `created_at`, `updated_at`) VALUES
	('/admin/log-error/index', 2, NULL, NULL, NULL, 1543052767, 1543052767);
REPLACE INTO `auth_item` (`name`, `type`, `description`, `rule_name`, `data`, `created_at`, `updated_at`) VALUES
	('/admin/log-error/view', 2, NULL, NULL, NULL, 1543052767, 1543052767);
REPLACE INTO `auth_item` (`name`, `type`, `description`, `rule_name`, `data`, `created_at`, `updated_at`) VALUES
	('/admin/mulai-interview/*', 2, NULL, NULL, NULL, 1543052767, 1543052767);
REPLACE INTO `auth_item` (`name`, `type`, `description`, `rule_name`, `data`, `created_at`, `updated_at`) VALUES
	('/admin/mulai-interview/create', 2, NULL, NULL, NULL, 1543052767, 1543052767);
REPLACE INTO `auth_item` (`name`, `type`, `description`, `rule_name`, `data`, `created_at`, `updated_at`) VALUES
	('/admin/mulai-interview/view', 2, NULL, NULL, NULL, 1543052767, 1543052767);
REPLACE INTO `auth_item` (`name`, `type`, `description`, `rule_name`, `data`, `created_at`, `updated_at`) VALUES
	('/admin/profile/*', 2, NULL, NULL, NULL, 1543052767, 1543052767);
REPLACE INTO `auth_item` (`name`, `type`, `description`, `rule_name`, `data`, `created_at`, `updated_at`) VALUES
	('/admin/profile/captcha', 2, NULL, NULL, NULL, 1543052767, 1543052767);
REPLACE INTO `auth_item` (`name`, `type`, `description`, `rule_name`, `data`, `created_at`, `updated_at`) VALUES
	('/admin/profile/change-password', 2, NULL, NULL, NULL, 1543052767, 1543052767);
REPLACE INTO `auth_item` (`name`, `type`, `description`, `rule_name`, `data`, `created_at`, `updated_at`) VALUES
	('/admin/profile/change-theme', 2, NULL, NULL, NULL, 1543052767, 1543052767);
REPLACE INTO `auth_item` (`name`, `type`, `description`, `rule_name`, `data`, `created_at`, `updated_at`) VALUES
	('/admin/profile/error', 2, NULL, NULL, NULL, 1543052767, 1543052767);
REPLACE INTO `auth_item` (`name`, `type`, `description`, `rule_name`, `data`, `created_at`, `updated_at`) VALUES
	('/admin/profile/index', 2, NULL, NULL, NULL, 1543052767, 1543052767);
REPLACE INTO `auth_item` (`name`, `type`, `description`, `rule_name`, `data`, `created_at`, `updated_at`) VALUES
	('/admin/site/*', 2, NULL, NULL, NULL, 1543052767, 1543052767);
REPLACE INTO `auth_item` (`name`, `type`, `description`, `rule_name`, `data`, `created_at`, `updated_at`) VALUES
	('/admin/site/about', 2, NULL, NULL, NULL, 1543052767, 1543052767);
REPLACE INTO `auth_item` (`name`, `type`, `description`, `rule_name`, `data`, `created_at`, `updated_at`) VALUES
	('/admin/site/captcha', 2, NULL, NULL, NULL, 1543052767, 1543052767);
REPLACE INTO `auth_item` (`name`, `type`, `description`, `rule_name`, `data`, `created_at`, `updated_at`) VALUES
	('/admin/site/contact', 2, NULL, NULL, NULL, 1543052767, 1543052767);
REPLACE INTO `auth_item` (`name`, `type`, `description`, `rule_name`, `data`, `created_at`, `updated_at`) VALUES
	('/admin/site/error', 2, NULL, NULL, NULL, 1543052767, 1543052767);
REPLACE INTO `auth_item` (`name`, `type`, `description`, `rule_name`, `data`, `created_at`, `updated_at`) VALUES
	('/admin/site/index', 2, NULL, NULL, NULL, 1543052767, 1543052767);
REPLACE INTO `auth_item` (`name`, `type`, `description`, `rule_name`, `data`, `created_at`, `updated_at`) VALUES
	('/admin/site/lang', 2, NULL, NULL, NULL, 1543052767, 1543052767);
REPLACE INTO `auth_item` (`name`, `type`, `description`, `rule_name`, `data`, `created_at`, `updated_at`) VALUES
	('/admin/site/login', 2, NULL, NULL, NULL, 1543052767, 1543052767);
REPLACE INTO `auth_item` (`name`, `type`, `description`, `rule_name`, `data`, `created_at`, `updated_at`) VALUES
	('/admin/site/logout', 2, NULL, NULL, NULL, 1543052767, 1543052767);
REPLACE INTO `auth_item` (`name`, `type`, `description`, `rule_name`, `data`, `created_at`, `updated_at`) VALUES
	('/admin/user-calon/*', 2, NULL, NULL, NULL, 1543052767, 1543052767);
REPLACE INTO `auth_item` (`name`, `type`, `description`, `rule_name`, `data`, `created_at`, `updated_at`) VALUES
	('/admin/user-calon/create', 2, NULL, NULL, NULL, 1543052767, 1543052767);
REPLACE INTO `auth_item` (`name`, `type`, `description`, `rule_name`, `data`, `created_at`, `updated_at`) VALUES
	('/admin/user-calon/delete', 2, NULL, NULL, NULL, 1543052767, 1543052767);
REPLACE INTO `auth_item` (`name`, `type`, `description`, `rule_name`, `data`, `created_at`, `updated_at`) VALUES
	('/admin/user-calon/delete-items', 2, NULL, NULL, NULL, 1543052767, 1543052767);
REPLACE INTO `auth_item` (`name`, `type`, `description`, `rule_name`, `data`, `created_at`, `updated_at`) VALUES
	('/admin/user-calon/download-cv', 2, NULL, NULL, NULL, 1543052767, 1543052767);
REPLACE INTO `auth_item` (`name`, `type`, `description`, `rule_name`, `data`, `created_at`, `updated_at`) VALUES
	('/admin/user-calon/index', 2, NULL, NULL, NULL, 1543052767, 1543052767);
REPLACE INTO `auth_item` (`name`, `type`, `description`, `rule_name`, `data`, `created_at`, `updated_at`) VALUES
	('/admin/user-calon/update', 2, NULL, NULL, NULL, 1543052767, 1543052767);
REPLACE INTO `auth_item` (`name`, `type`, `description`, `rule_name`, `data`, `created_at`, `updated_at`) VALUES
	('/admin/user-calon/view', 2, NULL, NULL, NULL, 1543052767, 1543052767);
REPLACE INTO `auth_item` (`name`, `type`, `description`, `rule_name`, `data`, `created_at`, `updated_at`) VALUES
	('/admin/user-interviewer/*', 2, NULL, NULL, NULL, 1543052767, 1543052767);
REPLACE INTO `auth_item` (`name`, `type`, `description`, `rule_name`, `data`, `created_at`, `updated_at`) VALUES
	('/admin/user-interviewer/create', 2, NULL, NULL, NULL, 1543052767, 1543052767);
REPLACE INTO `auth_item` (`name`, `type`, `description`, `rule_name`, `data`, `created_at`, `updated_at`) VALUES
	('/admin/user-interviewer/delete', 2, NULL, NULL, NULL, 1543052767, 1543052767);
REPLACE INTO `auth_item` (`name`, `type`, `description`, `rule_name`, `data`, `created_at`, `updated_at`) VALUES
	('/admin/user-interviewer/delete-items', 2, NULL, NULL, NULL, 1543052767, 1543052767);
REPLACE INTO `auth_item` (`name`, `type`, `description`, `rule_name`, `data`, `created_at`, `updated_at`) VALUES
	('/admin/user-interviewer/index', 2, NULL, NULL, NULL, 1543052767, 1543052767);
REPLACE INTO `auth_item` (`name`, `type`, `description`, `rule_name`, `data`, `created_at`, `updated_at`) VALUES
	('/admin/user-interviewer/update', 2, NULL, NULL, NULL, 1543052767, 1543052767);
REPLACE INTO `auth_item` (`name`, `type`, `description`, `rule_name`, `data`, `created_at`, `updated_at`) VALUES
	('/admin/user-interviewer/view', 2, NULL, NULL, NULL, 1543052767, 1543052767);
REPLACE INTO `auth_item` (`name`, `type`, `description`, `rule_name`, `data`, `created_at`, `updated_at`) VALUES
	('/debug/*', 2, NULL, NULL, NULL, 1543052767, 1543052767);
REPLACE INTO `auth_item` (`name`, `type`, `description`, `rule_name`, `data`, `created_at`, `updated_at`) VALUES
	('/debug/default/*', 2, NULL, NULL, NULL, 1543052767, 1543052767);
REPLACE INTO `auth_item` (`name`, `type`, `description`, `rule_name`, `data`, `created_at`, `updated_at`) VALUES
	('/debug/default/db-explain', 2, NULL, NULL, NULL, 1543052767, 1543052767);
REPLACE INTO `auth_item` (`name`, `type`, `description`, `rule_name`, `data`, `created_at`, `updated_at`) VALUES
	('/debug/default/download-mail', 2, NULL, NULL, NULL, 1543052767, 1543052767);
REPLACE INTO `auth_item` (`name`, `type`, `description`, `rule_name`, `data`, `created_at`, `updated_at`) VALUES
	('/debug/default/index', 2, NULL, NULL, NULL, 1543052767, 1543052767);
REPLACE INTO `auth_item` (`name`, `type`, `description`, `rule_name`, `data`, `created_at`, `updated_at`) VALUES
	('/debug/default/toolbar', 2, NULL, NULL, NULL, 1543052767, 1543052767);
REPLACE INTO `auth_item` (`name`, `type`, `description`, `rule_name`, `data`, `created_at`, `updated_at`) VALUES
	('/debug/default/view', 2, NULL, NULL, NULL, 1543052767, 1543052767);
REPLACE INTO `auth_item` (`name`, `type`, `description`, `rule_name`, `data`, `created_at`, `updated_at`) VALUES
	('/debug/user/*', 2, NULL, NULL, NULL, 1543052767, 1543052767);
REPLACE INTO `auth_item` (`name`, `type`, `description`, `rule_name`, `data`, `created_at`, `updated_at`) VALUES
	('/debug/user/reset-identity', 2, NULL, NULL, NULL, 1543052767, 1543052767);
REPLACE INTO `auth_item` (`name`, `type`, `description`, `rule_name`, `data`, `created_at`, `updated_at`) VALUES
	('/debug/user/set-identity', 2, NULL, NULL, NULL, 1543052767, 1543052767);
REPLACE INTO `auth_item` (`name`, `type`, `description`, `rule_name`, `data`, `created_at`, `updated_at`) VALUES
	('/gii/*', 2, NULL, NULL, NULL, 1543052767, 1543052767);
REPLACE INTO `auth_item` (`name`, `type`, `description`, `rule_name`, `data`, `created_at`, `updated_at`) VALUES
	('/gii/default/*', 2, NULL, NULL, NULL, 1543059982, 1543059982);
REPLACE INTO `auth_item` (`name`, `type`, `description`, `rule_name`, `data`, `created_at`, `updated_at`) VALUES
	('/gii/default/action', 2, NULL, NULL, NULL, 1543052767, 1543052767);
REPLACE INTO `auth_item` (`name`, `type`, `description`, `rule_name`, `data`, `created_at`, `updated_at`) VALUES
	('/gii/default/diff', 2, NULL, NULL, NULL, 1543052767, 1543052767);
REPLACE INTO `auth_item` (`name`, `type`, `description`, `rule_name`, `data`, `created_at`, `updated_at`) VALUES
	('/gii/default/index', 2, NULL, NULL, NULL, 1543052767, 1543052767);
REPLACE INTO `auth_item` (`name`, `type`, `description`, `rule_name`, `data`, `created_at`, `updated_at`) VALUES
	('/gii/default/preview', 2, NULL, NULL, NULL, 1543052767, 1543052767);
REPLACE INTO `auth_item` (`name`, `type`, `description`, `rule_name`, `data`, `created_at`, `updated_at`) VALUES
	('/gii/default/view', 2, NULL, NULL, NULL, 1543052767, 1543052767);
REPLACE INTO `auth_item` (`name`, `type`, `description`, `rule_name`, `data`, `created_at`, `updated_at`) VALUES
	('/gridview/*', 2, NULL, NULL, NULL, 1543052767, 1543052767);
REPLACE INTO `auth_item` (`name`, `type`, `description`, `rule_name`, `data`, `created_at`, `updated_at`) VALUES
	('/gridview/export/*', 2, NULL, NULL, NULL, 1543052767, 1543052767);
REPLACE INTO `auth_item` (`name`, `type`, `description`, `rule_name`, `data`, `created_at`, `updated_at`) VALUES
	('/gridview/export/download', 2, NULL, NULL, NULL, 1543052767, 1543052767);
REPLACE INTO `auth_item` (`name`, `type`, `description`, `rule_name`, `data`, `created_at`, `updated_at`) VALUES
	('/log-error/*', 2, NULL, NULL, NULL, 1543052767, 1543052767);
REPLACE INTO `auth_item` (`name`, `type`, `description`, `rule_name`, `data`, `created_at`, `updated_at`) VALUES
	('/log-error/clear-log-error', 2, NULL, NULL, NULL, 1543052767, 1543052767);
REPLACE INTO `auth_item` (`name`, `type`, `description`, `rule_name`, `data`, `created_at`, `updated_at`) VALUES
	('/log-error/index', 2, NULL, NULL, NULL, 1543052767, 1543052767);
REPLACE INTO `auth_item` (`name`, `type`, `description`, `rule_name`, `data`, `created_at`, `updated_at`) VALUES
	('/log-error/view', 2, NULL, NULL, NULL, 1543052767, 1543052767);
REPLACE INTO `auth_item` (`name`, `type`, `description`, `rule_name`, `data`, `created_at`, `updated_at`) VALUES
	('/log/*', 2, NULL, NULL, NULL, 1543052767, 1543052767);
REPLACE INTO `auth_item` (`name`, `type`, `description`, `rule_name`, `data`, `created_at`, `updated_at`) VALUES
	('/log/create/*', 2, NULL, NULL, NULL, 1543052767, 1543052767);
REPLACE INTO `auth_item` (`name`, `type`, `description`, `rule_name`, `data`, `created_at`, `updated_at`) VALUES
	('/log/create/create', 2, NULL, NULL, NULL, 1543052767, 1543052767);
REPLACE INTO `auth_item` (`name`, `type`, `description`, `rule_name`, `data`, `created_at`, `updated_at`) VALUES
	('/log/create/delete', 2, NULL, NULL, NULL, 1543052767, 1543052767);
REPLACE INTO `auth_item` (`name`, `type`, `description`, `rule_name`, `data`, `created_at`, `updated_at`) VALUES
	('/log/create/delete-items', 2, NULL, NULL, NULL, 1543052767, 1543052767);
REPLACE INTO `auth_item` (`name`, `type`, `description`, `rule_name`, `data`, `created_at`, `updated_at`) VALUES
	('/log/create/index', 2, NULL, NULL, NULL, 1543052767, 1543052767);
REPLACE INTO `auth_item` (`name`, `type`, `description`, `rule_name`, `data`, `created_at`, `updated_at`) VALUES
	('/log/create/update', 2, NULL, NULL, NULL, 1543052767, 1543052767);
REPLACE INTO `auth_item` (`name`, `type`, `description`, `rule_name`, `data`, `created_at`, `updated_at`) VALUES
	('/log/create/view', 2, NULL, NULL, NULL, 1543052767, 1543052767);
REPLACE INTO `auth_item` (`name`, `type`, `description`, `rule_name`, `data`, `created_at`, `updated_at`) VALUES
	('/log/default/*', 2, NULL, NULL, NULL, 1543052767, 1543052767);
REPLACE INTO `auth_item` (`name`, `type`, `description`, `rule_name`, `data`, `created_at`, `updated_at`) VALUES
	('/log/default/index', 2, NULL, NULL, NULL, 1543052767, 1543052767);
REPLACE INTO `auth_item` (`name`, `type`, `description`, `rule_name`, `data`, `created_at`, `updated_at`) VALUES
	('/log/delete/*', 2, NULL, NULL, NULL, 1543052767, 1543052767);
REPLACE INTO `auth_item` (`name`, `type`, `description`, `rule_name`, `data`, `created_at`, `updated_at`) VALUES
	('/log/delete/create', 2, NULL, NULL, NULL, 1543052767, 1543052767);
REPLACE INTO `auth_item` (`name`, `type`, `description`, `rule_name`, `data`, `created_at`, `updated_at`) VALUES
	('/log/delete/delete', 2, NULL, NULL, NULL, 1543052767, 1543052767);
REPLACE INTO `auth_item` (`name`, `type`, `description`, `rule_name`, `data`, `created_at`, `updated_at`) VALUES
	('/log/delete/delete-items', 2, NULL, NULL, NULL, 1543052767, 1543052767);
REPLACE INTO `auth_item` (`name`, `type`, `description`, `rule_name`, `data`, `created_at`, `updated_at`) VALUES
	('/log/delete/index', 2, NULL, NULL, NULL, 1543052767, 1543052767);
REPLACE INTO `auth_item` (`name`, `type`, `description`, `rule_name`, `data`, `created_at`, `updated_at`) VALUES
	('/log/delete/update', 2, NULL, NULL, NULL, 1543052767, 1543052767);
REPLACE INTO `auth_item` (`name`, `type`, `description`, `rule_name`, `data`, `created_at`, `updated_at`) VALUES
	('/log/delete/view', 2, NULL, NULL, NULL, 1543052767, 1543052767);
REPLACE INTO `auth_item` (`name`, `type`, `description`, `rule_name`, `data`, `created_at`, `updated_at`) VALUES
	('/log/download/*', 2, NULL, NULL, NULL, 1543052767, 1543052767);
REPLACE INTO `auth_item` (`name`, `type`, `description`, `rule_name`, `data`, `created_at`, `updated_at`) VALUES
	('/log/download/create', 2, NULL, NULL, NULL, 1543052767, 1543052767);
REPLACE INTO `auth_item` (`name`, `type`, `description`, `rule_name`, `data`, `created_at`, `updated_at`) VALUES
	('/log/download/delete', 2, NULL, NULL, NULL, 1543052767, 1543052767);
REPLACE INTO `auth_item` (`name`, `type`, `description`, `rule_name`, `data`, `created_at`, `updated_at`) VALUES
	('/log/download/delete-items', 2, NULL, NULL, NULL, 1543052767, 1543052767);
REPLACE INTO `auth_item` (`name`, `type`, `description`, `rule_name`, `data`, `created_at`, `updated_at`) VALUES
	('/log/download/index', 2, NULL, NULL, NULL, 1543052767, 1543052767);
REPLACE INTO `auth_item` (`name`, `type`, `description`, `rule_name`, `data`, `created_at`, `updated_at`) VALUES
	('/log/download/update', 2, NULL, NULL, NULL, 1543052767, 1543052767);
REPLACE INTO `auth_item` (`name`, `type`, `description`, `rule_name`, `data`, `created_at`, `updated_at`) VALUES
	('/log/download/view', 2, NULL, NULL, NULL, 1543052767, 1543052767);
REPLACE INTO `auth_item` (`name`, `type`, `description`, `rule_name`, `data`, `created_at`, `updated_at`) VALUES
	('/log/events/*', 2, NULL, NULL, NULL, 1543052767, 1543052767);
REPLACE INTO `auth_item` (`name`, `type`, `description`, `rule_name`, `data`, `created_at`, `updated_at`) VALUES
	('/log/events/create', 2, NULL, NULL, NULL, 1543052767, 1543052767);
REPLACE INTO `auth_item` (`name`, `type`, `description`, `rule_name`, `data`, `created_at`, `updated_at`) VALUES
	('/log/events/delete', 2, NULL, NULL, NULL, 1543052767, 1543052767);
REPLACE INTO `auth_item` (`name`, `type`, `description`, `rule_name`, `data`, `created_at`, `updated_at`) VALUES
	('/log/events/delete-items', 2, NULL, NULL, NULL, 1543052767, 1543052767);
REPLACE INTO `auth_item` (`name`, `type`, `description`, `rule_name`, `data`, `created_at`, `updated_at`) VALUES
	('/log/events/index', 2, NULL, NULL, NULL, 1543052767, 1543052767);
REPLACE INTO `auth_item` (`name`, `type`, `description`, `rule_name`, `data`, `created_at`, `updated_at`) VALUES
	('/log/events/update', 2, NULL, NULL, NULL, 1543052767, 1543052767);
REPLACE INTO `auth_item` (`name`, `type`, `description`, `rule_name`, `data`, `created_at`, `updated_at`) VALUES
	('/log/events/view', 2, NULL, NULL, NULL, 1543052767, 1543052767);
REPLACE INTO `auth_item` (`name`, `type`, `description`, `rule_name`, `data`, `created_at`, `updated_at`) VALUES
	('/log/login/*', 2, NULL, NULL, NULL, 1543052767, 1543052767);
REPLACE INTO `auth_item` (`name`, `type`, `description`, `rule_name`, `data`, `created_at`, `updated_at`) VALUES
	('/log/login/index', 2, NULL, NULL, NULL, 1543052767, 1543052767);
REPLACE INTO `auth_item` (`name`, `type`, `description`, `rule_name`, `data`, `created_at`, `updated_at`) VALUES
	('/log/login/view', 2, NULL, NULL, NULL, 1543052767, 1543052767);
REPLACE INTO `auth_item` (`name`, `type`, `description`, `rule_name`, `data`, `created_at`, `updated_at`) VALUES
	('/log/main/*', 2, NULL, NULL, NULL, 1543052767, 1543052767);
REPLACE INTO `auth_item` (`name`, `type`, `description`, `rule_name`, `data`, `created_at`, `updated_at`) VALUES
	('/log/print/*', 2, NULL, NULL, NULL, 1543052767, 1543052767);
REPLACE INTO `auth_item` (`name`, `type`, `description`, `rule_name`, `data`, `created_at`, `updated_at`) VALUES
	('/log/print/create', 2, NULL, NULL, NULL, 1543052767, 1543052767);
REPLACE INTO `auth_item` (`name`, `type`, `description`, `rule_name`, `data`, `created_at`, `updated_at`) VALUES
	('/log/print/delete', 2, NULL, NULL, NULL, 1543052767, 1543052767);
REPLACE INTO `auth_item` (`name`, `type`, `description`, `rule_name`, `data`, `created_at`, `updated_at`) VALUES
	('/log/print/delete-items', 2, NULL, NULL, NULL, 1543052767, 1543052767);
REPLACE INTO `auth_item` (`name`, `type`, `description`, `rule_name`, `data`, `created_at`, `updated_at`) VALUES
	('/log/print/index', 2, NULL, NULL, NULL, 1543052767, 1543052767);
REPLACE INTO `auth_item` (`name`, `type`, `description`, `rule_name`, `data`, `created_at`, `updated_at`) VALUES
	('/log/print/update', 2, NULL, NULL, NULL, 1543052767, 1543052767);
REPLACE INTO `auth_item` (`name`, `type`, `description`, `rule_name`, `data`, `created_at`, `updated_at`) VALUES
	('/log/print/view', 2, NULL, NULL, NULL, 1543052767, 1543052767);
REPLACE INTO `auth_item` (`name`, `type`, `description`, `rule_name`, `data`, `created_at`, `updated_at`) VALUES
	('/log/sql-error/*', 2, NULL, NULL, NULL, 1543052767, 1543052767);
REPLACE INTO `auth_item` (`name`, `type`, `description`, `rule_name`, `data`, `created_at`, `updated_at`) VALUES
	('/log/sql-error/index', 2, NULL, NULL, NULL, 1543052767, 1543052767);
REPLACE INTO `auth_item` (`name`, `type`, `description`, `rule_name`, `data`, `created_at`, `updated_at`) VALUES
	('/log/update/*', 2, NULL, NULL, NULL, 1543052767, 1543052767);
REPLACE INTO `auth_item` (`name`, `type`, `description`, `rule_name`, `data`, `created_at`, `updated_at`) VALUES
	('/log/update/create', 2, NULL, NULL, NULL, 1543052767, 1543052767);
REPLACE INTO `auth_item` (`name`, `type`, `description`, `rule_name`, `data`, `created_at`, `updated_at`) VALUES
	('/log/update/delete', 2, NULL, NULL, NULL, 1543052767, 1543052767);
REPLACE INTO `auth_item` (`name`, `type`, `description`, `rule_name`, `data`, `created_at`, `updated_at`) VALUES
	('/log/update/delete-items', 2, NULL, NULL, NULL, 1543052767, 1543052767);
REPLACE INTO `auth_item` (`name`, `type`, `description`, `rule_name`, `data`, `created_at`, `updated_at`) VALUES
	('/log/update/index', 2, NULL, NULL, NULL, 1543052767, 1543052767);
REPLACE INTO `auth_item` (`name`, `type`, `description`, `rule_name`, `data`, `created_at`, `updated_at`) VALUES
	('/log/update/update', 2, NULL, NULL, NULL, 1543052767, 1543052767);
REPLACE INTO `auth_item` (`name`, `type`, `description`, `rule_name`, `data`, `created_at`, `updated_at`) VALUES
	('/log/update/view', 2, NULL, NULL, NULL, 1543052767, 1543052767);
REPLACE INTO `auth_item` (`name`, `type`, `description`, `rule_name`, `data`, `created_at`, `updated_at`) VALUES
	('/log/view/*', 2, NULL, NULL, NULL, 1543052767, 1543052767);
REPLACE INTO `auth_item` (`name`, `type`, `description`, `rule_name`, `data`, `created_at`, `updated_at`) VALUES
	('/log/view/create', 2, NULL, NULL, NULL, 1543052767, 1543052767);
REPLACE INTO `auth_item` (`name`, `type`, `description`, `rule_name`, `data`, `created_at`, `updated_at`) VALUES
	('/log/view/delete', 2, NULL, NULL, NULL, 1543052767, 1543052767);
REPLACE INTO `auth_item` (`name`, `type`, `description`, `rule_name`, `data`, `created_at`, `updated_at`) VALUES
	('/log/view/delete-items', 2, NULL, NULL, NULL, 1543052767, 1543052767);
REPLACE INTO `auth_item` (`name`, `type`, `description`, `rule_name`, `data`, `created_at`, `updated_at`) VALUES
	('/log/view/index', 2, NULL, NULL, NULL, 1543052767, 1543052767);
REPLACE INTO `auth_item` (`name`, `type`, `description`, `rule_name`, `data`, `created_at`, `updated_at`) VALUES
	('/log/view/update', 2, NULL, NULL, NULL, 1543052767, 1543052767);
REPLACE INTO `auth_item` (`name`, `type`, `description`, `rule_name`, `data`, `created_at`, `updated_at`) VALUES
	('/log/view/view', 2, NULL, NULL, NULL, 1543052767, 1543052767);
REPLACE INTO `auth_item` (`name`, `type`, `description`, `rule_name`, `data`, `created_at`, `updated_at`) VALUES
	('/pdfjs/*', 2, NULL, NULL, NULL, 1543052767, 1543052767);
REPLACE INTO `auth_item` (`name`, `type`, `description`, `rule_name`, `data`, `created_at`, `updated_at`) VALUES
	('/pdfjs/default/*', 2, NULL, NULL, NULL, 1543052767, 1543052767);
REPLACE INTO `auth_item` (`name`, `type`, `description`, `rule_name`, `data`, `created_at`, `updated_at`) VALUES
	('/pdfjs/default/index', 2, NULL, NULL, NULL, 1543052767, 1543052767);
REPLACE INTO `auth_item` (`name`, `type`, `description`, `rule_name`, `data`, `created_at`, `updated_at`) VALUES
	('/profile/*', 2, NULL, NULL, NULL, 1543052767, 1543052767);
REPLACE INTO `auth_item` (`name`, `type`, `description`, `rule_name`, `data`, `created_at`, `updated_at`) VALUES
	('/profile/captcha', 2, NULL, NULL, NULL, 1543052767, 1543052767);
REPLACE INTO `auth_item` (`name`, `type`, `description`, `rule_name`, `data`, `created_at`, `updated_at`) VALUES
	('/profile/change-password', 2, NULL, NULL, NULL, 1543052767, 1543052767);
REPLACE INTO `auth_item` (`name`, `type`, `description`, `rule_name`, `data`, `created_at`, `updated_at`) VALUES
	('/profile/change-theme', 2, NULL, NULL, NULL, 1543052767, 1543052767);
REPLACE INTO `auth_item` (`name`, `type`, `description`, `rule_name`, `data`, `created_at`, `updated_at`) VALUES
	('/profile/error', 2, NULL, NULL, NULL, 1543052767, 1543052767);
REPLACE INTO `auth_item` (`name`, `type`, `description`, `rule_name`, `data`, `created_at`, `updated_at`) VALUES
	('/profile/index', 2, NULL, NULL, NULL, 1543052767, 1543052767);
REPLACE INTO `auth_item` (`name`, `type`, `description`, `rule_name`, `data`, `created_at`, `updated_at`) VALUES
	('/site/*', 2, NULL, NULL, NULL, 1543052767, 1543052767);
REPLACE INTO `auth_item` (`name`, `type`, `description`, `rule_name`, `data`, `created_at`, `updated_at`) VALUES
	('/site/about', 2, NULL, NULL, NULL, 1543052767, 1543052767);
REPLACE INTO `auth_item` (`name`, `type`, `description`, `rule_name`, `data`, `created_at`, `updated_at`) VALUES
	('/site/apply-lamaran', 2, NULL, NULL, NULL, 1543052767, 1543052767);
REPLACE INTO `auth_item` (`name`, `type`, `description`, `rule_name`, `data`, `created_at`, `updated_at`) VALUES
	('/site/captcha', 2, NULL, NULL, NULL, 1543052767, 1543052767);
REPLACE INTO `auth_item` (`name`, `type`, `description`, `rule_name`, `data`, `created_at`, `updated_at`) VALUES
	('/site/contact', 2, NULL, NULL, NULL, 1543052767, 1543052767);
REPLACE INTO `auth_item` (`name`, `type`, `description`, `rule_name`, `data`, `created_at`, `updated_at`) VALUES
	('/site/error', 2, NULL, NULL, NULL, 1543052767, 1543052767);
REPLACE INTO `auth_item` (`name`, `type`, `description`, `rule_name`, `data`, `created_at`, `updated_at`) VALUES
	('/site/forgot-password', 2, NULL, NULL, NULL, 1543052767, 1543052767);
REPLACE INTO `auth_item` (`name`, `type`, `description`, `rule_name`, `data`, `created_at`, `updated_at`) VALUES
	('/site/index', 2, NULL, NULL, NULL, 1543052767, 1543052767);
REPLACE INTO `auth_item` (`name`, `type`, `description`, `rule_name`, `data`, `created_at`, `updated_at`) VALUES
	('/site/lang', 2, NULL, NULL, NULL, 1543052767, 1543052767);
REPLACE INTO `auth_item` (`name`, `type`, `description`, `rule_name`, `data`, `created_at`, `updated_at`) VALUES
	('/site/login', 2, NULL, NULL, NULL, 1543052767, 1543052767);
REPLACE INTO `auth_item` (`name`, `type`, `description`, `rule_name`, `data`, `created_at`, `updated_at`) VALUES
	('/site/logout', 2, NULL, NULL, NULL, 1543052767, 1543052767);
REPLACE INTO `auth_item` (`name`, `type`, `description`, `rule_name`, `data`, `created_at`, `updated_at`) VALUES
	('/userManagement/*', 2, NULL, NULL, NULL, 1543052767, 1543052767);
REPLACE INTO `auth_item` (`name`, `type`, `description`, `rule_name`, `data`, `created_at`, `updated_at`) VALUES
	('/userManagement/default/*', 2, NULL, NULL, NULL, 1543052767, 1543052767);
REPLACE INTO `auth_item` (`name`, `type`, `description`, `rule_name`, `data`, `created_at`, `updated_at`) VALUES
	('/userManagement/default/change-password', 2, NULL, NULL, NULL, 1543052767, 1543052767);
REPLACE INTO `auth_item` (`name`, `type`, `description`, `rule_name`, `data`, `created_at`, `updated_at`) VALUES
	('/userManagement/default/create', 2, NULL, NULL, NULL, 1543052767, 1543052767);
REPLACE INTO `auth_item` (`name`, `type`, `description`, `rule_name`, `data`, `created_at`, `updated_at`) VALUES
	('/userManagement/default/delete', 2, NULL, NULL, NULL, 1543052767, 1543052767);
REPLACE INTO `auth_item` (`name`, `type`, `description`, `rule_name`, `data`, `created_at`, `updated_at`) VALUES
	('/userManagement/default/index', 2, NULL, NULL, NULL, 1543052767, 1543052767);
REPLACE INTO `auth_item` (`name`, `type`, `description`, `rule_name`, `data`, `created_at`, `updated_at`) VALUES
	('/userManagement/default/open-banned', 2, NULL, NULL, NULL, 1543052767, 1543052767);
REPLACE INTO `auth_item` (`name`, `type`, `description`, `rule_name`, `data`, `created_at`, `updated_at`) VALUES
	('/userManagement/default/update', 2, NULL, NULL, NULL, 1543052767, 1543052767);
REPLACE INTO `auth_item` (`name`, `type`, `description`, `rule_name`, `data`, `created_at`, `updated_at`) VALUES
	('/userManagement/default/view', 2, NULL, NULL, NULL, 1543052767, 1543052767);
REPLACE INTO `auth_item` (`name`, `type`, `description`, `rule_name`, `data`, `created_at`, `updated_at`) VALUES
	('/webmaster/*', 2, NULL, NULL, NULL, 1543052767, 1543052767);
REPLACE INTO `auth_item` (`name`, `type`, `description`, `rule_name`, `data`, `created_at`, `updated_at`) VALUES
	('/webmaster/assignment/*', 2, NULL, NULL, NULL, 1543052767, 1543052767);
REPLACE INTO `auth_item` (`name`, `type`, `description`, `rule_name`, `data`, `created_at`, `updated_at`) VALUES
	('/webmaster/assignment/assign', 2, NULL, NULL, NULL, 1543052767, 1543052767);
REPLACE INTO `auth_item` (`name`, `type`, `description`, `rule_name`, `data`, `created_at`, `updated_at`) VALUES
	('/webmaster/assignment/index', 2, NULL, NULL, NULL, 1543052767, 1543052767);
REPLACE INTO `auth_item` (`name`, `type`, `description`, `rule_name`, `data`, `created_at`, `updated_at`) VALUES
	('/webmaster/assignment/revoke', 2, NULL, NULL, NULL, 1543052767, 1543052767);
REPLACE INTO `auth_item` (`name`, `type`, `description`, `rule_name`, `data`, `created_at`, `updated_at`) VALUES
	('/webmaster/assignment/view', 2, NULL, NULL, NULL, 1543052767, 1543052767);
REPLACE INTO `auth_item` (`name`, `type`, `description`, `rule_name`, `data`, `created_at`, `updated_at`) VALUES
	('/webmaster/default/*', 2, NULL, NULL, NULL, 1543052767, 1543052767);
REPLACE INTO `auth_item` (`name`, `type`, `description`, `rule_name`, `data`, `created_at`, `updated_at`) VALUES
	('/webmaster/default/index', 2, NULL, NULL, NULL, 1543052767, 1543052767);
REPLACE INTO `auth_item` (`name`, `type`, `description`, `rule_name`, `data`, `created_at`, `updated_at`) VALUES
	('/webmaster/menu/*', 2, NULL, NULL, NULL, 1543052767, 1543052767);
REPLACE INTO `auth_item` (`name`, `type`, `description`, `rule_name`, `data`, `created_at`, `updated_at`) VALUES
	('/webmaster/menu/create', 2, NULL, NULL, NULL, 1543052767, 1543052767);
REPLACE INTO `auth_item` (`name`, `type`, `description`, `rule_name`, `data`, `created_at`, `updated_at`) VALUES
	('/webmaster/menu/delete', 2, NULL, NULL, NULL, 1543052767, 1543052767);
REPLACE INTO `auth_item` (`name`, `type`, `description`, `rule_name`, `data`, `created_at`, `updated_at`) VALUES
	('/webmaster/menu/index', 2, NULL, NULL, NULL, 1543052767, 1543052767);
REPLACE INTO `auth_item` (`name`, `type`, `description`, `rule_name`, `data`, `created_at`, `updated_at`) VALUES
	('/webmaster/menu/update', 2, NULL, NULL, NULL, 1543052767, 1543052767);
REPLACE INTO `auth_item` (`name`, `type`, `description`, `rule_name`, `data`, `created_at`, `updated_at`) VALUES
	('/webmaster/menu/view', 2, NULL, NULL, NULL, 1543052767, 1543052767);
REPLACE INTO `auth_item` (`name`, `type`, `description`, `rule_name`, `data`, `created_at`, `updated_at`) VALUES
	('/webmaster/permission/*', 2, NULL, NULL, NULL, 1543052767, 1543052767);
REPLACE INTO `auth_item` (`name`, `type`, `description`, `rule_name`, `data`, `created_at`, `updated_at`) VALUES
	('/webmaster/permission/assign', 2, NULL, NULL, NULL, 1543052767, 1543052767);
REPLACE INTO `auth_item` (`name`, `type`, `description`, `rule_name`, `data`, `created_at`, `updated_at`) VALUES
	('/webmaster/permission/create', 2, NULL, NULL, NULL, 1543052767, 1543052767);
REPLACE INTO `auth_item` (`name`, `type`, `description`, `rule_name`, `data`, `created_at`, `updated_at`) VALUES
	('/webmaster/permission/delete', 2, NULL, NULL, NULL, 1543052767, 1543052767);
REPLACE INTO `auth_item` (`name`, `type`, `description`, `rule_name`, `data`, `created_at`, `updated_at`) VALUES
	('/webmaster/permission/index', 2, NULL, NULL, NULL, 1543052767, 1543052767);
REPLACE INTO `auth_item` (`name`, `type`, `description`, `rule_name`, `data`, `created_at`, `updated_at`) VALUES
	('/webmaster/permission/remove', 2, NULL, NULL, NULL, 1543052767, 1543052767);
REPLACE INTO `auth_item` (`name`, `type`, `description`, `rule_name`, `data`, `created_at`, `updated_at`) VALUES
	('/webmaster/permission/update', 2, NULL, NULL, NULL, 1543052767, 1543052767);
REPLACE INTO `auth_item` (`name`, `type`, `description`, `rule_name`, `data`, `created_at`, `updated_at`) VALUES
	('/webmaster/permission/view', 2, NULL, NULL, NULL, 1543052767, 1543052767);
REPLACE INTO `auth_item` (`name`, `type`, `description`, `rule_name`, `data`, `created_at`, `updated_at`) VALUES
	('/webmaster/role/*', 2, NULL, NULL, NULL, 1543052767, 1543052767);
REPLACE INTO `auth_item` (`name`, `type`, `description`, `rule_name`, `data`, `created_at`, `updated_at`) VALUES
	('/webmaster/role/assign', 2, NULL, NULL, NULL, 1543052767, 1543052767);
REPLACE INTO `auth_item` (`name`, `type`, `description`, `rule_name`, `data`, `created_at`, `updated_at`) VALUES
	('/webmaster/role/create', 2, NULL, NULL, NULL, 1543052767, 1543052767);
REPLACE INTO `auth_item` (`name`, `type`, `description`, `rule_name`, `data`, `created_at`, `updated_at`) VALUES
	('/webmaster/role/delete', 2, NULL, NULL, NULL, 1543052767, 1543052767);
REPLACE INTO `auth_item` (`name`, `type`, `description`, `rule_name`, `data`, `created_at`, `updated_at`) VALUES
	('/webmaster/role/index', 2, NULL, NULL, NULL, 1543052767, 1543052767);
REPLACE INTO `auth_item` (`name`, `type`, `description`, `rule_name`, `data`, `created_at`, `updated_at`) VALUES
	('/webmaster/role/remove', 2, NULL, NULL, NULL, 1543052767, 1543052767);
REPLACE INTO `auth_item` (`name`, `type`, `description`, `rule_name`, `data`, `created_at`, `updated_at`) VALUES
	('/webmaster/role/update', 2, NULL, NULL, NULL, 1543052767, 1543052767);
REPLACE INTO `auth_item` (`name`, `type`, `description`, `rule_name`, `data`, `created_at`, `updated_at`) VALUES
	('/webmaster/role/view', 2, NULL, NULL, NULL, 1543052767, 1543052767);
REPLACE INTO `auth_item` (`name`, `type`, `description`, `rule_name`, `data`, `created_at`, `updated_at`) VALUES
	('/webmaster/route/*', 2, NULL, NULL, NULL, 1543052767, 1543052767);
REPLACE INTO `auth_item` (`name`, `type`, `description`, `rule_name`, `data`, `created_at`, `updated_at`) VALUES
	('/webmaster/route/assign', 2, NULL, NULL, NULL, 1543052767, 1543052767);
REPLACE INTO `auth_item` (`name`, `type`, `description`, `rule_name`, `data`, `created_at`, `updated_at`) VALUES
	('/webmaster/route/create', 2, NULL, NULL, NULL, 1543052767, 1543052767);
REPLACE INTO `auth_item` (`name`, `type`, `description`, `rule_name`, `data`, `created_at`, `updated_at`) VALUES
	('/webmaster/route/index', 2, NULL, NULL, NULL, 1543052767, 1543052767);
REPLACE INTO `auth_item` (`name`, `type`, `description`, `rule_name`, `data`, `created_at`, `updated_at`) VALUES
	('/webmaster/route/refresh', 2, NULL, NULL, NULL, 1543052767, 1543052767);
REPLACE INTO `auth_item` (`name`, `type`, `description`, `rule_name`, `data`, `created_at`, `updated_at`) VALUES
	('/webmaster/route/remove', 2, NULL, NULL, NULL, 1543052767, 1543052767);
REPLACE INTO `auth_item` (`name`, `type`, `description`, `rule_name`, `data`, `created_at`, `updated_at`) VALUES
	('/webmaster/rule/*', 2, NULL, NULL, NULL, 1543052767, 1543052767);
REPLACE INTO `auth_item` (`name`, `type`, `description`, `rule_name`, `data`, `created_at`, `updated_at`) VALUES
	('/webmaster/rule/create', 2, NULL, NULL, NULL, 1543052767, 1543052767);
REPLACE INTO `auth_item` (`name`, `type`, `description`, `rule_name`, `data`, `created_at`, `updated_at`) VALUES
	('/webmaster/rule/delete', 2, NULL, NULL, NULL, 1543052767, 1543052767);
REPLACE INTO `auth_item` (`name`, `type`, `description`, `rule_name`, `data`, `created_at`, `updated_at`) VALUES
	('/webmaster/rule/index', 2, NULL, NULL, NULL, 1543052767, 1543052767);
REPLACE INTO `auth_item` (`name`, `type`, `description`, `rule_name`, `data`, `created_at`, `updated_at`) VALUES
	('/webmaster/rule/update', 2, NULL, NULL, NULL, 1543052767, 1543052767);
REPLACE INTO `auth_item` (`name`, `type`, `description`, `rule_name`, `data`, `created_at`, `updated_at`) VALUES
	('/webmaster/rule/view', 2, NULL, NULL, NULL, 1543052767, 1543052767);
REPLACE INTO `auth_item` (`name`, `type`, `description`, `rule_name`, `data`, `created_at`, `updated_at`) VALUES
	('/webmaster/user/*', 2, NULL, NULL, NULL, 1543052767, 1543052767);
REPLACE INTO `auth_item` (`name`, `type`, `description`, `rule_name`, `data`, `created_at`, `updated_at`) VALUES
	('/webmaster/user/activate', 2, NULL, NULL, NULL, 1543052767, 1543052767);
REPLACE INTO `auth_item` (`name`, `type`, `description`, `rule_name`, `data`, `created_at`, `updated_at`) VALUES
	('/webmaster/user/change-password', 2, NULL, NULL, NULL, 1543052767, 1543052767);
REPLACE INTO `auth_item` (`name`, `type`, `description`, `rule_name`, `data`, `created_at`, `updated_at`) VALUES
	('/webmaster/user/delete', 2, NULL, NULL, NULL, 1543052767, 1543052767);
REPLACE INTO `auth_item` (`name`, `type`, `description`, `rule_name`, `data`, `created_at`, `updated_at`) VALUES
	('/webmaster/user/index', 2, NULL, NULL, NULL, 1543052767, 1543052767);
REPLACE INTO `auth_item` (`name`, `type`, `description`, `rule_name`, `data`, `created_at`, `updated_at`) VALUES
	('/webmaster/user/login', 2, NULL, NULL, NULL, 1543052767, 1543052767);
REPLACE INTO `auth_item` (`name`, `type`, `description`, `rule_name`, `data`, `created_at`, `updated_at`) VALUES
	('/webmaster/user/logout', 2, NULL, NULL, NULL, 1543052767, 1543052767);
REPLACE INTO `auth_item` (`name`, `type`, `description`, `rule_name`, `data`, `created_at`, `updated_at`) VALUES
	('/webmaster/user/request-password-reset', 2, NULL, NULL, NULL, 1543052767, 1543052767);
REPLACE INTO `auth_item` (`name`, `type`, `description`, `rule_name`, `data`, `created_at`, `updated_at`) VALUES
	('/webmaster/user/reset-password', 2, NULL, NULL, NULL, 1543052767, 1543052767);
REPLACE INTO `auth_item` (`name`, `type`, `description`, `rule_name`, `data`, `created_at`, `updated_at`) VALUES
	('/webmaster/user/signup', 2, NULL, NULL, NULL, 1543052767, 1543052767);
REPLACE INTO `auth_item` (`name`, `type`, `description`, `rule_name`, `data`, `created_at`, `updated_at`) VALUES
	('/webmaster/user/view', 2, NULL, NULL, NULL, 1543052767, 1543052767);
REPLACE INTO `auth_item` (`name`, `type`, `description`, `rule_name`, `data`, `created_at`, `updated_at`) VALUES
	('Administrator', 1, NULL, NULL, NULL, 1505395874, 1515924499);
REPLACE INTO `auth_item` (`name`, `type`, `description`, `rule_name`, `data`, `created_at`, `updated_at`) VALUES
	('Basic Access', 2, 'Akses Beranda, update profile, logout', NULL, NULL, 1530554361, 1530554361);
REPLACE INTO `auth_item` (`name`, `type`, `description`, `rule_name`, `data`, `created_at`, `updated_at`) VALUES
	('Data Master', 2, 'Administraor and Super User Only', NULL, NULL, 1530554385, 1530635117);
REPLACE INTO `auth_item` (`name`, `type`, `description`, `rule_name`, `data`, `created_at`, `updated_at`) VALUES
	('Interviewer', 1, NULL, NULL, NULL, 1525951080, 1530635576);
REPLACE INTO `auth_item` (`name`, `type`, `description`, `rule_name`, `data`, `created_at`, `updated_at`) VALUES
	('Interviewer - Data Calon', 2, 'wihtout route delete, create & update', NULL, NULL, 1530624375, 1530635347);
REPLACE INTO `auth_item` (`name`, `type`, `description`, `rule_name`, `data`, `created_at`, `updated_at`) VALUES
	('Interviewer - Hasil Wawancara', 2, NULL, NULL, NULL, 1530716940, 1530716940);
REPLACE INTO `auth_item` (`name`, `type`, `description`, `rule_name`, `data`, `created_at`, `updated_at`) VALUES
	('Interviewer - Jadwal Wawancara', 2, NULL, NULL, NULL, 1543053909, 1543053948);
REPLACE INTO `auth_item` (`name`, `type`, `description`, `rule_name`, `data`, `created_at`, `updated_at`) VALUES
	('Jadwal Wawancara Full Akses', 2, NULL, NULL, NULL, 1530640186, 1530640186);
REPLACE INTO `auth_item` (`name`, `type`, `description`, `rule_name`, `data`, `created_at`, `updated_at`) VALUES
	('Pelamar', 1, NULL, NULL, NULL, 1543054495, 1543054495);
REPLACE INTO `auth_item` (`name`, `type`, `description`, `rule_name`, `data`, `created_at`, `updated_at`) VALUES
	('Super User', 1, NULL, NULL, NULL, 1509549076, 1515924470);
/*!40000 ALTER TABLE `auth_item` ENABLE KEYS */;

-- Dumping structure for table yarsi_ibnu.auth_item_child
CREATE TABLE IF NOT EXISTS `auth_item_child` (
  `parent` varchar(64) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `child` varchar(64) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`parent`,`child`),
  KEY `child` (`child`),
  CONSTRAINT `auth_item_child_ibfk_1` FOREIGN KEY (`parent`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `auth_item_child_ibfk_2` FOREIGN KEY (`child`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Dumping data for table yarsi_ibnu.auth_item_child: ~39 rows (approximately)
/*!40000 ALTER TABLE `auth_item_child` DISABLE KEYS */;
REPLACE INTO `auth_item_child` (`parent`, `child`) VALUES
	('Super User', '/*');
REPLACE INTO `auth_item_child` (`parent`, `child`) VALUES
	('Data Master', '/admin/aspek-penilaian-tipe/*');
REPLACE INTO `auth_item_child` (`parent`, `child`) VALUES
	('Data Master', '/admin/aspek-penilaian/*');
REPLACE INTO `auth_item_child` (`parent`, `child`) VALUES
	('Basic Access', '/admin/default/index');
REPLACE INTO `auth_item_child` (`parent`, `child`) VALUES
	('Data Master', '/admin/fakultas-unit/*');
REPLACE INTO `auth_item_child` (`parent`, `child`) VALUES
	('Administrator', '/admin/formulir/cetak');
REPLACE INTO `auth_item_child` (`parent`, `child`) VALUES
	('Interviewer', '/admin/formulir/cetak');
REPLACE INTO `auth_item_child` (`parent`, `child`) VALUES
	('Administrator', '/admin/formulir/index');
REPLACE INTO `auth_item_child` (`parent`, `child`) VALUES
	('Interviewer', '/admin/formulir/index');
REPLACE INTO `auth_item_child` (`parent`, `child`) VALUES
	('Interviewer - Hasil Wawancara', '/admin/formulir/index');
REPLACE INTO `auth_item_child` (`parent`, `child`) VALUES
	('Administrator', '/admin/formulir/view');
REPLACE INTO `auth_item_child` (`parent`, `child`) VALUES
	('Interviewer', '/admin/formulir/view');
REPLACE INTO `auth_item_child` (`parent`, `child`) VALUES
	('Interviewer - Hasil Wawancara', '/admin/formulir/view');
REPLACE INTO `auth_item_child` (`parent`, `child`) VALUES
	('Data Master', '/admin/jabatan/*');
REPLACE INTO `auth_item_child` (`parent`, `child`) VALUES
	('Administrator', '/admin/jadwal-wawancara/*');
REPLACE INTO `auth_item_child` (`parent`, `child`) VALUES
	('Jadwal Wawancara Full Akses', '/admin/jadwal-wawancara/*');
REPLACE INTO `auth_item_child` (`parent`, `child`) VALUES
	('Interviewer', '/admin/jadwal-wawancara/index');
REPLACE INTO `auth_item_child` (`parent`, `child`) VALUES
	('Interviewer - Jadwal Wawancara', '/admin/jadwal-wawancara/index');
REPLACE INTO `auth_item_child` (`parent`, `child`) VALUES
	('Interviewer', '/admin/jadwal-wawancara/view');
REPLACE INTO `auth_item_child` (`parent`, `child`) VALUES
	('Interviewer - Jadwal Wawancara', '/admin/jadwal-wawancara/view');
REPLACE INTO `auth_item_child` (`parent`, `child`) VALUES
	('Data Master', '/admin/keputusan-tipe/*');
REPLACE INTO `auth_item_child` (`parent`, `child`) VALUES
	('Interviewer', '/admin/mulai-interview/*');
REPLACE INTO `auth_item_child` (`parent`, `child`) VALUES
	('Administrator', '/admin/profile/*');
REPLACE INTO `auth_item_child` (`parent`, `child`) VALUES
	('Basic Access', '/admin/profile/*');
REPLACE INTO `auth_item_child` (`parent`, `child`) VALUES
	('Administrator', '/admin/site/*');
REPLACE INTO `auth_item_child` (`parent`, `child`) VALUES
	('Basic Access', '/admin/site/*');
REPLACE INTO `auth_item_child` (`parent`, `child`) VALUES
	('Administrator', '/admin/user-calon/*');
REPLACE INTO `auth_item_child` (`parent`, `child`) VALUES
	('Interviewer - Data Calon', '/admin/user-calon/download-cv');
REPLACE INTO `auth_item_child` (`parent`, `child`) VALUES
	('Interviewer - Data Calon', '/admin/user-calon/index');
REPLACE INTO `auth_item_child` (`parent`, `child`) VALUES
	('Interviewer - Data Calon', '/admin/user-calon/view');
REPLACE INTO `auth_item_child` (`parent`, `child`) VALUES
	('Administrator', '/admin/user-interviewer/*');
REPLACE INTO `auth_item_child` (`parent`, `child`) VALUES
	('Basic Access', '/profile/*');
REPLACE INTO `auth_item_child` (`parent`, `child`) VALUES
	('Basic Access', '/site/*');
REPLACE INTO `auth_item_child` (`parent`, `child`) VALUES
	('Pelamar', '/site/*');
REPLACE INTO `auth_item_child` (`parent`, `child`) VALUES
	('Administrator', 'Basic Access');
REPLACE INTO `auth_item_child` (`parent`, `child`) VALUES
	('Interviewer', 'Basic Access');
REPLACE INTO `auth_item_child` (`parent`, `child`) VALUES
	('Administrator', 'Data Master');
REPLACE INTO `auth_item_child` (`parent`, `child`) VALUES
	('Interviewer', 'Interviewer - Data Calon');
REPLACE INTO `auth_item_child` (`parent`, `child`) VALUES
	('Interviewer', 'Interviewer - Hasil Wawancara');
REPLACE INTO `auth_item_child` (`parent`, `child`) VALUES
	('Interviewer', 'Interviewer - Jadwal Wawancara');
/*!40000 ALTER TABLE `auth_item_child` ENABLE KEYS */;

-- Dumping structure for table yarsi_ibnu.auth_rule
CREATE TABLE IF NOT EXISTS `auth_rule` (
  `name` varchar(64) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `data` blob,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Dumping data for table yarsi_ibnu.auth_rule: ~0 rows (approximately)
/*!40000 ALTER TABLE `auth_rule` DISABLE KEYS */;
/*!40000 ALTER TABLE `auth_rule` ENABLE KEYS */;

-- Dumping structure for table yarsi_ibnu.fakultas_unit
CREATE TABLE IF NOT EXISTS `fakultas_unit` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(50) NOT NULL,
  `is_active` tinyint(4) NOT NULL DEFAULT '1' COMMENT '1. Active, 2. Non Active',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- Dumping data for table yarsi_ibnu.fakultas_unit: ~2 rows (approximately)
/*!40000 ALTER TABLE `fakultas_unit` DISABLE KEYS */;
REPLACE INTO `fakultas_unit` (`id`, `nama`, `is_active`) VALUES
	(1, 'Fakultas Teknik', 1);
REPLACE INTO `fakultas_unit` (`id`, `nama`, `is_active`) VALUES
	(2, 'Fakultas Kedokteran & Kesehatan', 1);
/*!40000 ALTER TABLE `fakultas_unit` ENABLE KEYS */;

-- Dumping structure for table yarsi_ibnu.formulir
CREATE TABLE IF NOT EXISTS `formulir` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `calon_id` int(11) NOT NULL,
  `interviewer_id` int(11) NOT NULL,
  `tanggal_wawancara` date NOT NULL,
  `waktu` time NOT NULL,
  `catatan` longtext,
  `keputusan_id` int(11) DEFAULT NULL,
  `keputusan_interviewer` int(11) DEFAULT NULL,
  `nilai` float DEFAULT NULL,
  `timestamp` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `interviewer_id` (`interviewer_id`),
  KEY `calon_id` (`calon_id`),
  KEY `keputusan_id` (`keputusan_id`),
  KEY `keputusan_interviewer` (`keputusan_interviewer`),
  CONSTRAINT `FK_formulir_keputusan_tipe` FOREIGN KEY (`keputusan_id`) REFERENCES `keputusan_tipe` (`id`),
  CONSTRAINT `FK_formulir_keputusan_tipe_2` FOREIGN KEY (`keputusan_interviewer`) REFERENCES `keputusan_tipe` (`id`),
  CONSTRAINT `FK_formulir_user_calon` FOREIGN KEY (`calon_id`) REFERENCES `user_calon` (`id`),
  CONSTRAINT `FK_formulir_user_interviewer` FOREIGN KEY (`interviewer_id`) REFERENCES `user_interviewer` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=235 DEFAULT CHARSET=utf8;

-- Dumping data for table yarsi_ibnu.formulir: ~2 rows (approximately)
/*!40000 ALTER TABLE `formulir` DISABLE KEYS */;
REPLACE INTO `formulir` (`id`, `calon_id`, `interviewer_id`, `tanggal_wawancara`, `waktu`, `catatan`, `keputusan_id`, `keputusan_interviewer`, `nilai`, `timestamp`) VALUES
	(232, 14, 5, '2018-01-02', '02:00:00', '', 1, NULL, 26, '2018-12-02 02:23:12');
REPLACE INTO `formulir` (`id`, `calon_id`, `interviewer_id`, `tanggal_wawancara`, `waktu`, `catatan`, `keputusan_id`, `keputusan_interviewer`, `nilai`, `timestamp`) VALUES
	(233, 5, 5, '2018-01-01', '01:00:00', '', 2, NULL, 4, '2018-12-02 02:23:59');
REPLACE INTO `formulir` (`id`, `calon_id`, `interviewer_id`, `tanggal_wawancara`, `waktu`, `catatan`, `keputusan_id`, `keputusan_interviewer`, `nilai`, `timestamp`) VALUES
	(234, 1, 5, '2018-01-01', '13:00:00', '', 3, NULL, 1, '2018-12-16 01:55:28');
/*!40000 ALTER TABLE `formulir` ENABLE KEYS */;

-- Dumping structure for table yarsi_ibnu.formulir_kompetensi_posisi
CREATE TABLE IF NOT EXISTS `formulir_kompetensi_posisi` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `formulir_id` int(11) DEFAULT NULL,
  `aspek_penilaian` varchar(255) DEFAULT NULL,
  `kriteria_penilaian` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `formulir_id` (`formulir_id`),
  CONSTRAINT `FK_formulir_kompetensi_posisi_formulir` FOREIGN KEY (`formulir_id`) REFERENCES `formulir` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=533 DEFAULT CHARSET=utf8;

-- Dumping data for table yarsi_ibnu.formulir_kompetensi_posisi: ~6 rows (approximately)
/*!40000 ALTER TABLE `formulir_kompetensi_posisi` DISABLE KEYS */;
REPLACE INTO `formulir_kompetensi_posisi` (`id`, `formulir_id`, `aspek_penilaian`, `kriteria_penilaian`) VALUES
	(524, 232, '', NULL);
REPLACE INTO `formulir_kompetensi_posisi` (`id`, `formulir_id`, `aspek_penilaian`, `kriteria_penilaian`) VALUES
	(525, 232, '', NULL);
REPLACE INTO `formulir_kompetensi_posisi` (`id`, `formulir_id`, `aspek_penilaian`, `kriteria_penilaian`) VALUES
	(526, 232, '', NULL);
REPLACE INTO `formulir_kompetensi_posisi` (`id`, `formulir_id`, `aspek_penilaian`, `kriteria_penilaian`) VALUES
	(527, 233, '', NULL);
REPLACE INTO `formulir_kompetensi_posisi` (`id`, `formulir_id`, `aspek_penilaian`, `kriteria_penilaian`) VALUES
	(528, 233, '', NULL);
REPLACE INTO `formulir_kompetensi_posisi` (`id`, `formulir_id`, `aspek_penilaian`, `kriteria_penilaian`) VALUES
	(529, 233, '', NULL);
REPLACE INTO `formulir_kompetensi_posisi` (`id`, `formulir_id`, `aspek_penilaian`, `kriteria_penilaian`) VALUES
	(530, 234, '', NULL);
REPLACE INTO `formulir_kompetensi_posisi` (`id`, `formulir_id`, `aspek_penilaian`, `kriteria_penilaian`) VALUES
	(531, 234, '', NULL);
REPLACE INTO `formulir_kompetensi_posisi` (`id`, `formulir_id`, `aspek_penilaian`, `kriteria_penilaian`) VALUES
	(532, 234, '', NULL);
/*!40000 ALTER TABLE `formulir_kompetensi_posisi` ENABLE KEYS */;

-- Dumping structure for table yarsi_ibnu.formulir_kriteria_penilaian
CREATE TABLE IF NOT EXISTS `formulir_kriteria_penilaian` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `formulir_id` int(11) NOT NULL,
  `aspek_penilaian_id` int(11) NOT NULL,
  `kriteria_penilaian` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `formulir_wawancara_id` (`formulir_id`),
  KEY `aspek_penilaian_id` (`aspek_penilaian_id`),
  CONSTRAINT `FK_formulir_kriteria_penilaian_aspek_penilaian` FOREIGN KEY (`aspek_penilaian_id`) REFERENCES `aspek_penilaian` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_formulir_kriteria_penilaian_formulir` FOREIGN KEY (`formulir_id`) REFERENCES `formulir` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=3865 DEFAULT CHARSET=utf8;

-- Dumping data for table yarsi_ibnu.formulir_kriteria_penilaian: ~42 rows (approximately)
/*!40000 ALTER TABLE `formulir_kriteria_penilaian` DISABLE KEYS */;
REPLACE INTO `formulir_kriteria_penilaian` (`id`, `formulir_id`, `aspek_penilaian_id`, `kriteria_penilaian`) VALUES
	(3802, 232, 13, 7);
REPLACE INTO `formulir_kriteria_penilaian` (`id`, `formulir_id`, `aspek_penilaian_id`, `kriteria_penilaian`) VALUES
	(3803, 232, 14, 4);
REPLACE INTO `formulir_kriteria_penilaian` (`id`, `formulir_id`, `aspek_penilaian_id`, `kriteria_penilaian`) VALUES
	(3804, 232, 15, 5);
REPLACE INTO `formulir_kriteria_penilaian` (`id`, `formulir_id`, `aspek_penilaian_id`, `kriteria_penilaian`) VALUES
	(3805, 232, 16, 3);
REPLACE INTO `formulir_kriteria_penilaian` (`id`, `formulir_id`, `aspek_penilaian_id`, `kriteria_penilaian`) VALUES
	(3806, 232, 17, 7);
REPLACE INTO `formulir_kriteria_penilaian` (`id`, `formulir_id`, `aspek_penilaian_id`, `kriteria_penilaian`) VALUES
	(3807, 232, 18, NULL);
REPLACE INTO `formulir_kriteria_penilaian` (`id`, `formulir_id`, `aspek_penilaian_id`, `kriteria_penilaian`) VALUES
	(3808, 232, 19, NULL);
REPLACE INTO `formulir_kriteria_penilaian` (`id`, `formulir_id`, `aspek_penilaian_id`, `kriteria_penilaian`) VALUES
	(3809, 232, 20, NULL);
REPLACE INTO `formulir_kriteria_penilaian` (`id`, `formulir_id`, `aspek_penilaian_id`, `kriteria_penilaian`) VALUES
	(3810, 232, 21, NULL);
REPLACE INTO `formulir_kriteria_penilaian` (`id`, `formulir_id`, `aspek_penilaian_id`, `kriteria_penilaian`) VALUES
	(3811, 232, 1, NULL);
REPLACE INTO `formulir_kriteria_penilaian` (`id`, `formulir_id`, `aspek_penilaian_id`, `kriteria_penilaian`) VALUES
	(3812, 232, 2, NULL);
REPLACE INTO `formulir_kriteria_penilaian` (`id`, `formulir_id`, `aspek_penilaian_id`, `kriteria_penilaian`) VALUES
	(3813, 232, 3, NULL);
REPLACE INTO `formulir_kriteria_penilaian` (`id`, `formulir_id`, `aspek_penilaian_id`, `kriteria_penilaian`) VALUES
	(3814, 232, 4, NULL);
REPLACE INTO `formulir_kriteria_penilaian` (`id`, `formulir_id`, `aspek_penilaian_id`, `kriteria_penilaian`) VALUES
	(3815, 232, 5, NULL);
REPLACE INTO `formulir_kriteria_penilaian` (`id`, `formulir_id`, `aspek_penilaian_id`, `kriteria_penilaian`) VALUES
	(3816, 232, 6, NULL);
REPLACE INTO `formulir_kriteria_penilaian` (`id`, `formulir_id`, `aspek_penilaian_id`, `kriteria_penilaian`) VALUES
	(3817, 232, 7, NULL);
REPLACE INTO `formulir_kriteria_penilaian` (`id`, `formulir_id`, `aspek_penilaian_id`, `kriteria_penilaian`) VALUES
	(3818, 232, 8, NULL);
REPLACE INTO `formulir_kriteria_penilaian` (`id`, `formulir_id`, `aspek_penilaian_id`, `kriteria_penilaian`) VALUES
	(3819, 232, 9, NULL);
REPLACE INTO `formulir_kriteria_penilaian` (`id`, `formulir_id`, `aspek_penilaian_id`, `kriteria_penilaian`) VALUES
	(3820, 232, 10, NULL);
REPLACE INTO `formulir_kriteria_penilaian` (`id`, `formulir_id`, `aspek_penilaian_id`, `kriteria_penilaian`) VALUES
	(3821, 232, 11, NULL);
REPLACE INTO `formulir_kriteria_penilaian` (`id`, `formulir_id`, `aspek_penilaian_id`, `kriteria_penilaian`) VALUES
	(3822, 232, 12, NULL);
REPLACE INTO `formulir_kriteria_penilaian` (`id`, `formulir_id`, `aspek_penilaian_id`, `kriteria_penilaian`) VALUES
	(3823, 233, 13, 7);
REPLACE INTO `formulir_kriteria_penilaian` (`id`, `formulir_id`, `aspek_penilaian_id`, `kriteria_penilaian`) VALUES
	(3824, 233, 14, 2);
REPLACE INTO `formulir_kriteria_penilaian` (`id`, `formulir_id`, `aspek_penilaian_id`, `kriteria_penilaian`) VALUES
	(3825, 233, 15, 3);
REPLACE INTO `formulir_kriteria_penilaian` (`id`, `formulir_id`, `aspek_penilaian_id`, `kriteria_penilaian`) VALUES
	(3826, 233, 16, 4);
REPLACE INTO `formulir_kriteria_penilaian` (`id`, `formulir_id`, `aspek_penilaian_id`, `kriteria_penilaian`) VALUES
	(3827, 233, 17, NULL);
REPLACE INTO `formulir_kriteria_penilaian` (`id`, `formulir_id`, `aspek_penilaian_id`, `kriteria_penilaian`) VALUES
	(3828, 233, 18, NULL);
REPLACE INTO `formulir_kriteria_penilaian` (`id`, `formulir_id`, `aspek_penilaian_id`, `kriteria_penilaian`) VALUES
	(3829, 233, 19, NULL);
REPLACE INTO `formulir_kriteria_penilaian` (`id`, `formulir_id`, `aspek_penilaian_id`, `kriteria_penilaian`) VALUES
	(3830, 233, 20, NULL);
REPLACE INTO `formulir_kriteria_penilaian` (`id`, `formulir_id`, `aspek_penilaian_id`, `kriteria_penilaian`) VALUES
	(3831, 233, 21, NULL);
REPLACE INTO `formulir_kriteria_penilaian` (`id`, `formulir_id`, `aspek_penilaian_id`, `kriteria_penilaian`) VALUES
	(3832, 233, 1, NULL);
REPLACE INTO `formulir_kriteria_penilaian` (`id`, `formulir_id`, `aspek_penilaian_id`, `kriteria_penilaian`) VALUES
	(3833, 233, 2, NULL);
REPLACE INTO `formulir_kriteria_penilaian` (`id`, `formulir_id`, `aspek_penilaian_id`, `kriteria_penilaian`) VALUES
	(3834, 233, 3, NULL);
REPLACE INTO `formulir_kriteria_penilaian` (`id`, `formulir_id`, `aspek_penilaian_id`, `kriteria_penilaian`) VALUES
	(3835, 233, 4, NULL);
REPLACE INTO `formulir_kriteria_penilaian` (`id`, `formulir_id`, `aspek_penilaian_id`, `kriteria_penilaian`) VALUES
	(3836, 233, 5, NULL);
REPLACE INTO `formulir_kriteria_penilaian` (`id`, `formulir_id`, `aspek_penilaian_id`, `kriteria_penilaian`) VALUES
	(3837, 233, 6, NULL);
REPLACE INTO `formulir_kriteria_penilaian` (`id`, `formulir_id`, `aspek_penilaian_id`, `kriteria_penilaian`) VALUES
	(3838, 233, 7, NULL);
REPLACE INTO `formulir_kriteria_penilaian` (`id`, `formulir_id`, `aspek_penilaian_id`, `kriteria_penilaian`) VALUES
	(3839, 233, 8, NULL);
REPLACE INTO `formulir_kriteria_penilaian` (`id`, `formulir_id`, `aspek_penilaian_id`, `kriteria_penilaian`) VALUES
	(3840, 233, 9, NULL);
REPLACE INTO `formulir_kriteria_penilaian` (`id`, `formulir_id`, `aspek_penilaian_id`, `kriteria_penilaian`) VALUES
	(3841, 233, 10, NULL);
REPLACE INTO `formulir_kriteria_penilaian` (`id`, `formulir_id`, `aspek_penilaian_id`, `kriteria_penilaian`) VALUES
	(3842, 233, 11, NULL);
REPLACE INTO `formulir_kriteria_penilaian` (`id`, `formulir_id`, `aspek_penilaian_id`, `kriteria_penilaian`) VALUES
	(3843, 233, 12, NULL);
REPLACE INTO `formulir_kriteria_penilaian` (`id`, `formulir_id`, `aspek_penilaian_id`, `kriteria_penilaian`) VALUES
	(3844, 234, 13, 1);
REPLACE INTO `formulir_kriteria_penilaian` (`id`, `formulir_id`, `aspek_penilaian_id`, `kriteria_penilaian`) VALUES
	(3845, 234, 14, 1);
REPLACE INTO `formulir_kriteria_penilaian` (`id`, `formulir_id`, `aspek_penilaian_id`, `kriteria_penilaian`) VALUES
	(3846, 234, 15, 1);
REPLACE INTO `formulir_kriteria_penilaian` (`id`, `formulir_id`, `aspek_penilaian_id`, `kriteria_penilaian`) VALUES
	(3847, 234, 16, 1);
REPLACE INTO `formulir_kriteria_penilaian` (`id`, `formulir_id`, `aspek_penilaian_id`, `kriteria_penilaian`) VALUES
	(3848, 234, 17, 1);
REPLACE INTO `formulir_kriteria_penilaian` (`id`, `formulir_id`, `aspek_penilaian_id`, `kriteria_penilaian`) VALUES
	(3849, 234, 18, NULL);
REPLACE INTO `formulir_kriteria_penilaian` (`id`, `formulir_id`, `aspek_penilaian_id`, `kriteria_penilaian`) VALUES
	(3850, 234, 19, NULL);
REPLACE INTO `formulir_kriteria_penilaian` (`id`, `formulir_id`, `aspek_penilaian_id`, `kriteria_penilaian`) VALUES
	(3851, 234, 20, NULL);
REPLACE INTO `formulir_kriteria_penilaian` (`id`, `formulir_id`, `aspek_penilaian_id`, `kriteria_penilaian`) VALUES
	(3852, 234, 21, NULL);
REPLACE INTO `formulir_kriteria_penilaian` (`id`, `formulir_id`, `aspek_penilaian_id`, `kriteria_penilaian`) VALUES
	(3853, 234, 1, NULL);
REPLACE INTO `formulir_kriteria_penilaian` (`id`, `formulir_id`, `aspek_penilaian_id`, `kriteria_penilaian`) VALUES
	(3854, 234, 2, NULL);
REPLACE INTO `formulir_kriteria_penilaian` (`id`, `formulir_id`, `aspek_penilaian_id`, `kriteria_penilaian`) VALUES
	(3855, 234, 3, NULL);
REPLACE INTO `formulir_kriteria_penilaian` (`id`, `formulir_id`, `aspek_penilaian_id`, `kriteria_penilaian`) VALUES
	(3856, 234, 4, NULL);
REPLACE INTO `formulir_kriteria_penilaian` (`id`, `formulir_id`, `aspek_penilaian_id`, `kriteria_penilaian`) VALUES
	(3857, 234, 5, NULL);
REPLACE INTO `formulir_kriteria_penilaian` (`id`, `formulir_id`, `aspek_penilaian_id`, `kriteria_penilaian`) VALUES
	(3858, 234, 6, NULL);
REPLACE INTO `formulir_kriteria_penilaian` (`id`, `formulir_id`, `aspek_penilaian_id`, `kriteria_penilaian`) VALUES
	(3859, 234, 7, NULL);
REPLACE INTO `formulir_kriteria_penilaian` (`id`, `formulir_id`, `aspek_penilaian_id`, `kriteria_penilaian`) VALUES
	(3860, 234, 8, NULL);
REPLACE INTO `formulir_kriteria_penilaian` (`id`, `formulir_id`, `aspek_penilaian_id`, `kriteria_penilaian`) VALUES
	(3861, 234, 9, NULL);
REPLACE INTO `formulir_kriteria_penilaian` (`id`, `formulir_id`, `aspek_penilaian_id`, `kriteria_penilaian`) VALUES
	(3862, 234, 10, NULL);
REPLACE INTO `formulir_kriteria_penilaian` (`id`, `formulir_id`, `aspek_penilaian_id`, `kriteria_penilaian`) VALUES
	(3863, 234, 11, NULL);
REPLACE INTO `formulir_kriteria_penilaian` (`id`, `formulir_id`, `aspek_penilaian_id`, `kriteria_penilaian`) VALUES
	(3864, 234, 12, NULL);
/*!40000 ALTER TABLE `formulir_kriteria_penilaian` ENABLE KEYS */;

-- Dumping structure for table yarsi_ibnu.jabatan
CREATE TABLE IF NOT EXISTS `jabatan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(50) NOT NULL,
  `is_active` tinyint(4) NOT NULL DEFAULT '1' COMMENT '1. Active, 2. Non Active',
  `is_apply` tinyint(4) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- Dumping data for table yarsi_ibnu.jabatan: ~3 rows (approximately)
/*!40000 ALTER TABLE `jabatan` DISABLE KEYS */;
REPLACE INTO `jabatan` (`id`, `nama`, `is_active`, `is_apply`) VALUES
	(1, 'HRD', 1, 2);
REPLACE INTO `jabatan` (`id`, `nama`, `is_active`, `is_apply`) VALUES
	(2, 'Staf HRD', 1, 2);
REPLACE INTO `jabatan` (`id`, `nama`, `is_active`, `is_apply`) VALUES
	(3, 'Dosen', 1, 1);
/*!40000 ALTER TABLE `jabatan` ENABLE KEYS */;

-- Dumping structure for table yarsi_ibnu.jadwal_wawancara
CREATE TABLE IF NOT EXISTS `jadwal_wawancara` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tanggal` date NOT NULL,
  `waktu` time NOT NULL,
  `user_calon_id` int(11) NOT NULL,
  `user_interviewer_id` int(11) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '2' COMMENT '1. Sudah di Interview, 2. Belum di Interview',
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `user_calon_id` (`user_calon_id`),
  KEY `user_interviewer_id` (`user_interviewer_id`),
  CONSTRAINT `FK_jadwal_wawancara_user_calon` FOREIGN KEY (`user_calon_id`) REFERENCES `user_calon` (`id`),
  CONSTRAINT `FK_jadwal_wawancara_user_interviewer` FOREIGN KEY (`user_interviewer_id`) REFERENCES `user_interviewer` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;

-- Dumping data for table yarsi_ibnu.jadwal_wawancara: ~3 rows (approximately)
/*!40000 ALTER TABLE `jadwal_wawancara` DISABLE KEYS */;
REPLACE INTO `jadwal_wawancara` (`id`, `tanggal`, `waktu`, `user_calon_id`, `user_interviewer_id`, `status`, `timestamp`) VALUES
	(12, '2018-01-01', '07:59:00', 5, 5, 1, '2018-12-16 01:44:01');
REPLACE INTO `jadwal_wawancara` (`id`, `tanggal`, `waktu`, `user_calon_id`, `user_interviewer_id`, `status`, `timestamp`) VALUES
	(13, '2018-01-02', '09:00:00', 14, 5, 1, '2018-12-16 01:44:03');
REPLACE INTO `jadwal_wawancara` (`id`, `tanggal`, `waktu`, `user_calon_id`, `user_interviewer_id`, `status`, `timestamp`) VALUES
	(14, '2018-01-01', '13:00:00', 1, 5, 1, '2018-12-16 01:55:28');
REPLACE INTO `jadwal_wawancara` (`id`, `tanggal`, `waktu`, `user_calon_id`, `user_interviewer_id`, `status`, `timestamp`) VALUES
	(15, '2018-01-01', '03:30:00', 21, 5, 2, '2018-12-16 02:00:00');
/*!40000 ALTER TABLE `jadwal_wawancara` ENABLE KEYS */;

-- Dumping structure for table yarsi_ibnu.keputusan_tipe
CREATE TABLE IF NOT EXISTS `keputusan_tipe` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(50) NOT NULL,
  `range_nilai_1` float NOT NULL,
  `range_nilai_2` float NOT NULL,
  `is_active` tinyint(4) NOT NULL DEFAULT '1' COMMENT '1. Active, 2. Non Active',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- Dumping data for table yarsi_ibnu.keputusan_tipe: ~3 rows (approximately)
/*!40000 ALTER TABLE `keputusan_tipe` DISABLE KEYS */;
REPLACE INTO `keputusan_tipe` (`id`, `nama`, `range_nilai_1`, `range_nilai_2`, `is_active`) VALUES
	(1, 'Disarankan', 5, 7, 1);
REPLACE INTO `keputusan_tipe` (`id`, `nama`, `range_nilai_1`, `range_nilai_2`, `is_active`) VALUES
	(2, 'Dipertimbangkan', 4, 5, 1);
REPLACE INTO `keputusan_tipe` (`id`, `nama`, `range_nilai_1`, `range_nilai_2`, `is_active`) VALUES
	(3, 'Ditolak', 0, 4, 1);
/*!40000 ALTER TABLE `keputusan_tipe` ENABLE KEYS */;

-- Dumping structure for table yarsi_ibnu.login_attempt
CREATE TABLE IF NOT EXISTS `login_attempt` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `key` varchar(50) NOT NULL,
  `amount` int(11) NOT NULL DEFAULT '1',
  `reset_at` varchar(50) NOT NULL DEFAULT '',
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Dumping data for table yarsi_ibnu.login_attempt: ~0 rows (approximately)
/*!40000 ALTER TABLE `login_attempt` DISABLE KEYS */;
/*!40000 ALTER TABLE `login_attempt` ENABLE KEYS */;

-- Dumping structure for table yarsi_ibnu.log_error
CREATE TABLE IF NOT EXISTS `log_error` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `message` text,
  `data_json` text,
  `date_error` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Dumping data for table yarsi_ibnu.log_error: ~0 rows (approximately)
/*!40000 ALTER TABLE `log_error` DISABLE KEYS */;
/*!40000 ALTER TABLE `log_error` ENABLE KEYS */;

-- Dumping structure for table yarsi_ibnu.menu
CREATE TABLE IF NOT EXISTS `menu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(128) NOT NULL,
  `parent` int(11) DEFAULT NULL,
  `route` varchar(255) DEFAULT NULL,
  `order` int(11) DEFAULT NULL,
  `data` blob,
  PRIMARY KEY (`id`),
  KEY `parent` (`parent`),
  CONSTRAINT `menu_ibfk_1` FOREIGN KEY (`parent`) REFERENCES `menu` (`id`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=103 DEFAULT CHARSET=utf8;

-- Dumping data for table yarsi_ibnu.menu: ~14 rows (approximately)
/*!40000 ALTER TABLE `menu` DISABLE KEYS */;
REPLACE INTO `menu` (`id`, `name`, `parent`, `route`, `order`, `data`) VALUES
	(1, 'Beranda', NULL, '/admin/site/index', 0, _binary 0x66612D75736572);
REPLACE INTO `menu` (`id`, `name`, `parent`, `route`, `order`, `data`) VALUES
	(6, 'Pengaturan', NULL, NULL, 9, NULL);
REPLACE INTO `menu` (`id`, `name`, `parent`, `route`, `order`, `data`) VALUES
	(8, 'Configuration', 6, '/webmaster/assignment/index', 1, NULL);
REPLACE INTO `menu` (`id`, `name`, `parent`, `route`, `order`, `data`) VALUES
	(90, 'Log Error', 6, '/admin/log-error/index', 0, NULL);
REPLACE INTO `menu` (`id`, `name`, `parent`, `route`, `order`, `data`) VALUES
	(92, 'Data Master', NULL, NULL, 8, NULL);
REPLACE INTO `menu` (`id`, `name`, `parent`, `route`, `order`, `data`) VALUES
	(93, 'Aspek Penilaian', 92, '/admin/aspek-penilaian/index', NULL, NULL);
REPLACE INTO `menu` (`id`, `name`, `parent`, `route`, `order`, `data`) VALUES
	(94, 'Aspek Penilaian Tipe', 92, '/admin/aspek-penilaian-tipe/index', 2, NULL);
REPLACE INTO `menu` (`id`, `name`, `parent`, `route`, `order`, `data`) VALUES
	(95, 'Fakultas Unit', 92, '/admin/fakultas-unit/index', 3, NULL);
REPLACE INTO `menu` (`id`, `name`, `parent`, `route`, `order`, `data`) VALUES
	(96, 'Jabatan', 92, '/admin/jabatan/index', 4, NULL);
REPLACE INTO `menu` (`id`, `name`, `parent`, `route`, `order`, `data`) VALUES
	(97, 'Keputusan', 92, '/admin/keputusan-tipe/index', 5, NULL);
REPLACE INTO `menu` (`id`, `name`, `parent`, `route`, `order`, `data`) VALUES
	(98, 'Data Pelamar', NULL, '/admin/user-calon/index', 3, NULL);
REPLACE INTO `menu` (`id`, `name`, `parent`, `route`, `order`, `data`) VALUES
	(99, 'Data Interviewer', NULL, '/admin/user-interviewer/index', 4, NULL);
REPLACE INTO `menu` (`id`, `name`, `parent`, `route`, `order`, `data`) VALUES
	(101, 'Hasil Wawancara', NULL, '/admin/formulir/index', 2, NULL);
REPLACE INTO `menu` (`id`, `name`, `parent`, `route`, `order`, `data`) VALUES
	(102, 'Jadwal Wawancara', NULL, '/admin/jadwal-wawancara/index', 1, NULL);
/*!40000 ALTER TABLE `menu` ENABLE KEYS */;

-- Dumping structure for table yarsi_ibnu.user
CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
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
  `updated_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8;

-- Dumping data for table yarsi_ibnu.user: ~3 rows (approximately)
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
REPLACE INTO `user` (`id`, `username`, `auth_key`, `password_hash`, `password_reset_token`, `password_default`, `email`, `status`, `created_at`, `updated_at`, `created_by`, `updated_by`) VALUES
	(1, 'superuser', NULL, '$2y$13$IpMBKpF85EKNA/Pxqk06H.BjjOaPz/.Ol1e.PJfGYWIJoOOI0YSFO', NULL, NULL, 'superuser@gmail.com', 10, 1509549909, 1526294085, 1, 1);
REPLACE INTO `user` (`id`, `username`, `auth_key`, `password_hash`, `password_reset_token`, `password_default`, `email`, `status`, `created_at`, `updated_at`, `created_by`, `updated_by`) VALUES
	(2, 'admin', NULL, '$2y$13$me/6YM31QFhxlM6DY8UYDuWnYE/EUNXpghP/xVg8ql6JiZX5LteK.', NULL, NULL, NULL, 10, NULL, NULL, NULL, NULL);
REPLACE INTO `user` (`id`, `username`, `auth_key`, `password_hash`, `password_reset_token`, `password_default`, `email`, `status`, `created_at`, `updated_at`, `created_by`, `updated_by`) VALUES
	(15, 'razak@gmail.com', NULL, '$2y$13$V8In0fZUiguxIXi60JS1YOSwb0yi8EU5AYboNFWVRjAxNMFzwAjuy', NULL, 'zrxyhifa', 'razak@gmail.com', 10, 1530636027, 1543084870, NULL, NULL);
REPLACE INTO `user` (`id`, `username`, `auth_key`, `password_hash`, `password_reset_token`, `password_default`, `email`, `status`, `created_at`, `updated_at`, `created_by`, `updated_by`) VALUES
	(16, 'interviewer', NULL, '$2y$13$me/6YM31QFhxlM6DY8UYDuWnYE/EUNXpghP/xVg8ql6JiZX5LteK.', NULL, NULL, 'haifahrul@gmail.com', 10, NULL, NULL, NULL, NULL);
/*!40000 ALTER TABLE `user` ENABLE KEYS */;

-- Dumping structure for table yarsi_ibnu.user_calon
CREATE TABLE IF NOT EXISTS `user_calon` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
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
  `status` tinyint(4) NOT NULL DEFAULT '2' COMMENT '1. Sudah di Interview, 2. Belum di Interview',
  PRIMARY KEY (`id`),
  KEY `keputusan` (`keputusan_id`),
  KEY `user_id` (`user_id`),
  CONSTRAINT `FK_user_calon_keputusan_tipe` FOREIGN KEY (`keputusan_id`) REFERENCES `keputusan_tipe` (`id`),
  CONSTRAINT `FK_user_calon_user` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8;

-- Dumping data for table yarsi_ibnu.user_calon: ~10 rows (approximately)
/*!40000 ALTER TABLE `user_calon` DISABLE KEYS */;
REPLACE INTO `user_calon` (`id`, `user_id`, `nama_calon`, `tanggal_lahir`, `usia`, `pendidikan`, `jabatan_yang_dilamar`, `phone`, `email`, `keputusan_id`, `cv`, `cv_extension`, `status`) VALUES
	(1, NULL, 'Ibnu', NULL, 24, 'S1 Teknik Informatika', 'Backend Programmers\r\n', '085712345678', 'ibnu@gmail.com', NULL, 'd0d0defb889e6011987d431fe903d931c8965a85.pdf', 'pdf', 2);
REPLACE INTO `user_calon` (`id`, `user_id`, `nama_calon`, `tanggal_lahir`, `usia`, `pendidikan`, `jabatan_yang_dilamar`, `phone`, `email`, `keputusan_id`, `cv`, `cv_extension`, `status`) VALUES
	(5, NULL, 'Kandidat 1', NULL, 22, '1. 2asdas\r\n12.asd', 'as', '0857', 'haifahrul@gmail.com', NULL, '63f6dd17e596a32fb491891803ba1c646d207f9c.pdf', NULL, 2);
REPLACE INTO `user_calon` (`id`, `user_id`, `nama_calon`, `tanggal_lahir`, `usia`, `pendidikan`, `jabatan_yang_dilamar`, `phone`, `email`, `keputusan_id`, `cv`, `cv_extension`, `status`) VALUES
	(14, NULL, 'Kandidat 2', NULL, 22, '1. 2asdas\r\n12.asd', 'as', '0857', 'haifahrul@gmail.com', NULL, '22dbcfd6a538079a8ed0ab33e913fa18ad4fbf53.pdf', NULL, 2);
REPLACE INTO `user_calon` (`id`, `user_id`, `nama_calon`, `tanggal_lahir`, `usia`, `pendidikan`, `jabatan_yang_dilamar`, `phone`, `email`, `keputusan_id`, `cv`, `cv_extension`, `status`) VALUES
	(15, NULL, 'asddasdasd', NULL, 2, 'asdasda', 'aasda', '085710568571', 'razakibnu95@gmail.com', NULL, 'c54f4b87c647fbee68faf14b543f8cf0667fb52d.pdf', NULL, 2);
REPLACE INTO `user_calon` (`id`, `user_id`, `nama_calon`, `tanggal_lahir`, `usia`, `pendidikan`, `jabatan_yang_dilamar`, `phone`, `email`, `keputusan_id`, `cv`, `cv_extension`, `status`) VALUES
	(16, NULL, 'asd', NULL, 2, 'adasd', 'asd', '123', 'haifahrul@gmail.com', NULL, 'e180c592cd052aacc1e7f9d25a6bc5c979236a50.pdf', NULL, 2);
REPLACE INTO `user_calon` (`id`, `user_id`, `nama_calon`, `tanggal_lahir`, `usia`, `pendidikan`, `jabatan_yang_dilamar`, `phone`, `email`, `keputusan_id`, `cv`, `cv_extension`, `status`) VALUES
	(17, NULL, 'asd', NULL, 2, 'adasd', 'asd', '123', 'haifahrul@gmail.com', NULL, '316f967062d83222e20a56ea2eb90428f2cf0ff0.pdf', NULL, 2);
REPLACE INTO `user_calon` (`id`, `user_id`, `nama_calon`, `tanggal_lahir`, `usia`, `pendidikan`, `jabatan_yang_dilamar`, `phone`, `email`, `keputusan_id`, `cv`, `cv_extension`, `status`) VALUES
	(18, NULL, 'asd', NULL, 2, 'adasd', 'asd', '123', 'haifahrul@gmail.com', NULL, 'adc4082ca7d7d75f028c6a34e4b425baa864b6b2.pdf', NULL, 2);
REPLACE INTO `user_calon` (`id`, `user_id`, `nama_calon`, `tanggal_lahir`, `usia`, `pendidikan`, `jabatan_yang_dilamar`, `phone`, `email`, `keputusan_id`, `cv`, `cv_extension`, `status`) VALUES
	(19, NULL, 'asd', NULL, 2, 'adasd', 'asd', '123', 'haifahrul@gmail.com', NULL, '14b45f9bed45bc9b34db5eb98ea2c1536068fae1.pdf', NULL, 2);
REPLACE INTO `user_calon` (`id`, `user_id`, `nama_calon`, `tanggal_lahir`, `usia`, `pendidikan`, `jabatan_yang_dilamar`, `phone`, `email`, `keputusan_id`, `cv`, `cv_extension`, `status`) VALUES
	(20, NULL, 'asdasd', NULL, 26, 'asd', '3', '085710568571', 'haifahrul@gmail.com', NULL, '2018-12-16 01-06-00_Dosen_asdasd.zip', NULL, 2);
REPLACE INTO `user_calon` (`id`, `user_id`, `nama_calon`, `tanggal_lahir`, `usia`, `pendidikan`, `jabatan_yang_dilamar`, `phone`, `email`, `keputusan_id`, `cv`, `cv_extension`, `status`) VALUES
	(21, NULL, 'Fahrul', NULL, 26, 'sada', '3', '085710568571', 'haifahrul@gmail.com', NULL, '2018-12-16 01-09-07_Dosen_ asda.zip', NULL, 2);
/*!40000 ALTER TABLE `user_calon` ENABLE KEYS */;

-- Dumping structure for table yarsi_ibnu.user_interviewer
CREATE TABLE IF NOT EXISTS `user_interviewer` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `nama_pewawancara` varchar(50) NOT NULL,
  `jabatan_id` int(11) NOT NULL,
  `fakultas_unit_id` int(11) NOT NULL,
  `is_active` tinyint(4) NOT NULL COMMENT '1. Active, 2. Non Active',
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  KEY `fakultas_unit_id` (`fakultas_unit_id`),
  KEY `jabatan_id` (`jabatan_id`),
  CONSTRAINT `FK_user_interviewer_fakultas_unit` FOREIGN KEY (`fakultas_unit_id`) REFERENCES `fakultas_unit` (`id`),
  CONSTRAINT `FK_user_interviewer_jabatan` FOREIGN KEY (`jabatan_id`) REFERENCES `jabatan` (`id`),
  CONSTRAINT `FK_user_interviewer_user` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- Dumping data for table yarsi_ibnu.user_interviewer: ~2 rows (approximately)
/*!40000 ALTER TABLE `user_interviewer` DISABLE KEYS */;
REPLACE INTO `user_interviewer` (`id`, `user_id`, `nama_pewawancara`, `jabatan_id`, `fakultas_unit_id`, `is_active`) VALUES
	(5, 15, ' Pewawancara', 1, 1, 1);
/*!40000 ALTER TABLE `user_interviewer` ENABLE KEYS */;

-- Dumping structure for table yarsi_ibnu.user_profile
CREATE TABLE IF NOT EXISTS `user_profile` (
  `user_id` int(11) NOT NULL,
  `firstname` varchar(50) DEFAULT NULL,
  `lastname` varchar(50) DEFAULT NULL,
  `no_telp` varchar(50) DEFAULT NULL,
  `avatar` varchar(225) DEFAULT NULL,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`user_id`),
  CONSTRAINT `FK_user_profile_user` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Dumping data for table yarsi_ibnu.user_profile: ~0 rows (approximately)
/*!40000 ALTER TABLE `user_profile` DISABLE KEYS */;
REPLACE INTO `user_profile` (`user_id`, `firstname`, `lastname`, `no_telp`, `avatar`, `created_at`, `updated_at`, `created_by`, `updated_by`) VALUES
	(1, 'AFS', '', '', '8a954ac7fa30824c1b75850d546afe256b4f6078.png', NULL, 1526294044, NULL, 1);
/*!40000 ALTER TABLE `user_profile` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
